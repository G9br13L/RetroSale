<?php
// Page: components/aside/admin_manager
// Data contract:
// $active: string | null
?>

<?php
$session = session();
$user = $session->get('user') ?? null;
?>

<div class="mb-6 xl:mb-0 w-full xl:w-64 xl:min-w-64">
    <div class="bg-gray-100 shadow-sm p-5 border border-gray-200 rounded-2xl">
        <!-- User Info -->
        <div class="mb-4 pb-3 border-gray-300 border-b">
            <?php if ($user): ?>
                <h4 class="font-semibold text-gray-800 text-lg">
                    <?= esc($user['first_name'] . ' ' . $user['last_name']) ?>
                </h4>
                <h5 class="text-gray-500 text-xs uppercase tracking-wide"><?= esc($user['type']) ?></h5>
            <?php else: ?>
                <h4 class="font-semibold text-gray-800 text-lg">Guest</h4>
                <h5 class="text-gray-500 text-xs uppercase tracking-wide">Not Logged In</h5>
            <?php endif; ?>
        </div>

        <!-- Navigation -->
        <nav class="space-y-1 font-medium text-sm">
            <a href="/admin/dashboard"
                class="block py-2.5 px-3 rounded-lg transition-all duration-200
               <?php echo $active === 'dashboard'
                    ? 'bg-red-600 text-white shadow-sm'
                    : 'text-gray-700 hover:bg-red-100 hover:text-red-700'; ?>">
                Dashboard
            </a>

            <a href="/admin/inquiries"
                class="block py-2.5 px-3 rounded-lg transition-all duration-200
               <?php echo $active === 'inquiries'
                    ? 'bg-red-600 text-white shadow-sm'
                    : 'text-gray-700 hover:bg-red-100 hover:text-red-700'; ?>">
                Inquiries
            </a>

            <a href="/admin/services"
                class="block py-2.5 px-3 rounded-lg transition-all duration-200
               <?php echo $active === 'services'
                    ? 'bg-red-600 text-white shadow-sm'
                    : 'text-gray-700 hover:bg-red-100 hover:text-red-700'; ?>">
                Services
            </a>

            <a href="/admin/accounts"
                class="block py-2.5 px-3 rounded-lg transition-all duration-200
               <?php echo $active === 'accounts'
                    ? 'bg-red-600 text-white shadow-sm'
                    : 'text-gray-700 hover:bg-red-100 hover:text-red-700'; ?>">
                Accounts
            </a>
        </nav>
    </div>
</div>