<?php
// Component: components/table/accounts.php
// Data contract:
// $accounts: object array (items can be arrays or objects/Entities)
?>

<?php
// Pagination logic
$page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$per_page = isset($_GET['per_page']) ? max(1, (int) $_GET['per_page']) : 10;

$dataToUse = $accounts ?? [];

// Filter out deleted or inactive
$active = array_values(array_filter($dataToUse, function ($u) {
    if (is_array($u)) {
        return ($u['account_status'] ?? 1) != 0;
    }
    if (is_object($u)) {
        if (isset($u->account_status)) return $u->account_status != 0;
        if (method_exists($u, 'getAccountStatus')) return $u->getAccountStatus() != 0;
    }
    return true;
}));

$total = count($active);
$total_pages = (int) max(1, ceil($total / $per_page));
if ($page > $total_pages) $page = $total_pages;

$start = ($page - 1) * $per_page;
$pageAccounts = array_slice($active, $start, $per_page);

function querySetter(array $overrides = [])
{
    $q = array_merge($_GET, $overrides);
    return http_build_query($q);
}
?>

<div class="bg-white shadow rounded-lg overflow-hidden">
    <div class="p-4 overflow-x-auto">
        <table class="accounts-table w-full min-w-[800px] text-left border-collapse">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase tracking-wide">
                <tr>
                    <th class="p-3">Profile</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Type</th>
                    <th class="p-3 text-center">Email Activated</th>
                    <th class="p-3 text-center">Status</th>
                    <th class="p-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pageAccounts)) : ?>
                    <tr>
                        <td class="p-3 text-gray-500 text-center" colspan="7">No accounts found</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($pageAccounts as $account): ?>
                        <?php
                        // Handle object/array access
                        $firstName = is_array($account) ? $account['first_name'] : $account->first_name;
                        $middleName = is_array($account) ? $account['middle_name'] ?? '' : ($account->middle_name ?? '');
                        $lastName = is_array($account) ? $account['last_name'] : $account->last_name;
                        $email = is_array($account) ? $account['email'] : $account->email;
                        $type = is_array($account) ? $account['type'] : $account->type;
                        $emailActivated = is_array($account) ? $account['email_activated'] : $account->email_activated;
                        $profileImage = is_array($account) ? ($account['profile_image'] ?? '') : ($account->profile_image ?? '');
                        $status = is_array($account) ? $account['account_status'] : $account->account_status;
                        $name = trim($firstName . ' ' . ($middleName ? strtoupper($middleName[0]) . '. ' : '') . $lastName);
                        ?>
                        <tr class="hover:bg-gray-50 border-t transition">
                            <td class="p-3">
                                <?php if ($profileImage): ?>
                                    <img src="/<?= esc($profileImage) ?>" alt="<?= esc($name) ?>"
                                        class="border border-gray-200 rounded-full w-10 h-10 object-cover">
                                <?php else: ?>
                                    <div class="flex justify-center items-center bg-gray-200 rounded-full w-10 h-10 font-semibold text-gray-600">
                                        <?= strtoupper(substr($firstName, 0, 1)) ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="p-3 font-medium text-gray-800"><?= esc($name) ?></td>
                            <td class="p-3 text-gray-700"><?= esc($email) ?></td>
                            <td class="p-3 text-gray-700"><?= ucfirst(esc($type)) ?></td>
                            <td class="p-3 text-center">
                                <?php if ((string)$emailActivated === "1"): ?>
                                    <span class="bg-green-100 px-2 py-1 rounded-full font-semibold text-green-800 text-xs">Yes</span>
                                <?php else: ?>
                                    <span class="bg-red-100 px-2 py-1 rounded-full font-semibold text-red-800 text-xs">No</span>
                                <?php endif; ?>
                            </td>
                            <td class="p-3 text-center">
                                <?php if ((int)$status === 1): ?>
                                    <span class="bg-blue-100 px-2 py-1 rounded-full font-semibold text-blue-800 text-xs">Active</span>
                                <?php else: ?>
                                    <span class="bg-gray-200 px-2 py-1 rounded-full font-semibold text-gray-700 text-xs">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class="flex justify-center gap-2 p-3 text-center">
                                <?= view('components/modal/accounts/update', ['account' => $account]) ?>
                                <?= view('components/modal/accounts/delete', ['account' => $account]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination Footer -->
    <div class="bg-gray-50 p-4 border-t">
        <div class="flex sm:flex-row flex-col justify-between items-center gap-3">
            <!-- Per page selector -->
            <form method="get" class="flex items-center gap-2">
                <label for="per_page" class="text-gray-700 text-sm">Show</label>
                <select id="per_page" name="per_page" class="p-1 border rounded text-sm" onchange="this.form.submit()">
                    <option value="5" <?= $per_page == 5 ? 'selected' : ''; ?>>5</option>
                    <option value="10" <?= $per_page == 10 ? 'selected' : ''; ?>>10</option>
                    <option value="20" <?= $per_page == 20 ? 'selected' : ''; ?>>20</option>
                </select>
                <input type="hidden" name="page" value="1" />
                <span class="text-gray-700 text-sm">per page</span>
            </form>

            <!-- Pagination links -->
            <?php if ($total_pages > 1): ?>
                <div class="flex items-center gap-1">
                    <a class="px-3 py-1 border rounded text-sm <?= ($page <= 1) ? 'opacity-50 pointer-events-none' : 'hover:bg-gray-100'; ?>"
                        href="?<?= querySetter(['page' => max(1, $page - 1), 'per_page' => $per_page]); ?>">Prev</a>

                    <?php $startP = max(1, $page - 3);
                    $endP = min($total_pages, $page + 3); ?>
                    <?php for ($p = $startP; $p <= $endP; $p++): ?>
                        <a class="px-3 py-1 border rounded text-sm <?= ($p == $page) ? 'bg-blue-600 text-white' : 'hover:bg-gray-100'; ?>"
                            href="?<?= querySetter(['page' => $p, 'per_page' => $per_page]); ?>"><?= $p ?></a>
                    <?php endfor; ?>

                    <a class="px-3 py-1 border rounded text-sm <?= ($page >= $total_pages) ? 'opacity-50 pointer-events-none' : 'hover:bg-gray-100'; ?>"
                        href="?<?= querySetter(['page' => min($total_pages, $page + 1), 'per_page' => $per_page]); ?>">Next</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>