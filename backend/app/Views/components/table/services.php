<?php
// Component: components/table/services.php
// Data contract:
// $services: array of associative arrays (from ServicesModel)
?>

<?php
// Pagination logic
$page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$per_page = isset($_GET['per_page']) ? max(1, (int) $_GET['per_page']) : 5;

// Filter only active services
$activeServices = array_values(array_filter($services ?? [], fn($s) => (int) ($s['is_active'] ?? 0) === 1));
$total = count($activeServices);
$total_pages = max(1, ceil($total / $per_page));
$page = min($page, $total_pages);
$start = ($page - 1) * $per_page;
$pageItems = array_slice($activeServices, $start, $per_page);

// Helper for building query params
function querySetter(array $overrides = []): string
{
    $q = array_merge($_GET, $overrides);
    return http_build_query($q);
}
?>

<div class="bg-gray-50 shadow backdrop-blur-sm border border-gray-200 rounded-2xl overflow-hidden">
    <div class="p-5 overflow-x-auto">
        <table class="w-full min-w-[640px] text-gray-700 text-left">
            <thead class="bg-gray-100 border-gray-200 border-b text-gray-700 text-sm uppercase">
                <tr>
                    <th class="p-3 font-semibold">Service Name</th>
                    <th class="p-3 font-semibold">Description</th>
                    <th class="p-3 font-semibold">Price</th>
                    <th class="p-3 font-semibold">Availability</th>
                    <th class="p-3 font-semibold text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (empty($pageItems)) : ?>
                    <tr>
                        <td colspan="5" class="p-4 text-gray-500 text-center">No services found.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($pageItems as $service): ?>
                        <tr class="hover:bg-gray-100/70 transition-colors duration-150">
                            <td class="p-3 font-medium"><?= esc($service['name']) ?></td>
                            <td class="p-3 text-gray-600"><?= esc($service['description'] ?: '—') ?></td>
                            <td class="p-3 font-semibold text-gray-800">₱<?= number_format((float) $service['price'], 2) ?></td>
                            <td class="p-3">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full
                                    <?= ((int) $service['is_active'] === 1) ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-600' ?>">
                                    <?= ((int) $service['is_active'] === 1) ? 'Available' : 'Unavailable' ?>
                                </span>
                            </td>
                            <td class="p-3 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="<?= site_url('admin/services/view/' . $service['id']) ?>"
                                        class="inline-flex justify-center items-center bg-gray-600/80 hover:bg-gray-600 rounded-lg w-8 h-8 text-white transition duration-200"
                                        title="View">
                                        <i class="text-sm fa-solid fa-eye"></i>
                                    </a>
                                    <a href="<?= site_url('admin/services/edit/' . $service['id']) ?>"
                                        class="inline-flex justify-center items-center bg-indigo-600/80 hover:bg-indigo-600 rounded-lg w-8 h-8 text-white transition duration-200"
                                        title="Edit">
                                        <i class="text-sm fa-solid fa-pen"></i>
                                    </a>
                                    <a href="<?= site_url('admin/services/delete/' . $service['id']) ?>"
                                        class="inline-flex justify-center items-center bg-red-600/80 hover:bg-red-600 rounded-lg w-8 h-8 text-white transition duration-200"
                                        title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this service?');">
                                        <i class="text-sm fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center bg-gray-100 p-4 border-gray-200 border-t text-sm">
        <div class="flex items-center gap-2">
            <form method="get" class="flex items-center gap-2">
                <label for="per_page" class="text-gray-600">Show</label>
                <select id="per_page" name="per_page" class="p-1.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-400"
                    onchange="this.form.submit()">
                    <option value="5" <?= $per_page == 5 ? 'selected' : '' ?>>5</option>
                    <option value="10" <?= $per_page == 10 ? 'selected' : '' ?>>10</option>
                    <option value="20" <?= $per_page == 20 ? 'selected' : '' ?>>20</option>
                </select>
                <input type="hidden" name="page" value="1" />
                <span class="text-gray-600">per page</span>
            </form>
        </div>

        <div class="flex items-center gap-1">
            <?php if ($total_pages > 1): ?>
                <?php $startP = max(1, $page - 2);
                $endP = min($total_pages, $page + 2); ?>
                <a href="?<?= querySetter(['page' => max(1, $page - 1), 'per_page' => $per_page]) ?>"
                    class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-200 <?= $page <= 1 ? 'opacity-50 pointer-events-none' : '' ?>">
                    Prev
                </a>
                <?php for ($p = $startP; $p <= $endP; $p++): ?>
                    <a href="?<?= querySetter(['page' => $p, 'per_page' => $per_page]) ?>"
                        class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-200 <?= $p == $page ? 'bg-indigo-600 text-white border-indigo-600' : '' ?>">
                        <?= $p ?>
                    </a>
                <?php endfor; ?>
                <a href="?<?= querySetter(['page' => min($total_pages, $page + 1), 'per_page' => $per_page]) ?>"
                    class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-200 <?= $page >= $total_pages ? 'opacity-50 pointer-events-none' : '' ?>">
                    Next
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>