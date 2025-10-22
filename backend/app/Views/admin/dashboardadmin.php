<?php
// Page: admin/dashboard_admin
// Data contract:
// $requestsCount: int
// $servicesCount: int
?>

<!doctype html>
<html lang="en">
<?= view('components/head', ['title' => 'Admin Dashboard']) ?>

<body class="admin-body">

    <!-- Header -->
    <?= view('components/header') ?>

    <main class="mx-auto px-6 py-10 max-w-6xl">
        <div class="md:flex md:space-x-6">
            <!-- Sidebar / Aside -->
            <?= view('components/aside/admin_manager', ['active' => 'dashboard']) ?>

            <!-- Main Content -->
            <section class="flex-1">
                <h2 class="mb-6 font-semibold text-2xl">Admin Dashboard</h2>

                <?php if (!is_numeric($requestsCount) || !is_numeric($servicesCount)) : ?>
                    <?= view('components/cards/card', [
                        'title' => 'Dashboard Error',
                        'value' => 'Invalid data received.'
                    ]) ?>
                <?php else : ?>
                    <!-- Statistics Section -->
                    <div class="gap-4 grid grid-cols-1 sm:grid-cols-3">
                        <?= view('components/cards/card_stat', [
                            'title' => 'Total Inquiries',
                            'value' => $requestsCount
                        ]) ?>
                        <?= view('components/cards/card_stat', [
                            'title' => 'Total Services',
                            'value' => $servicesCount
                        ]) ?>
                        <?= view('components/cards/card_stat', [
                            'title' => 'Upcoming / Scheduled',
                            'value' => 0,
                            'subtitle' => 'Preferred date ≥ today'
                        ]) ?>
                    </div>

                    <!-- Management Section -->
                    <div class="gap-4 grid grid-cols-1 md:grid-cols-2 mt-6">
                        <!-- Services Management -->
                        <div class="bg-white shadow p-5 rounded-lg">
                            <h3 class="font-semibold text-lg">Services Management</h3>
                            <p class="mt-2 text-gray-600 text-sm">
                                Edit, update, or add new funeral services from the services management panel.
                            </p>
                            <div class="mt-3">
                                <a href="/admin/services" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded text-white transition">
                                    Manage Services
                                </a>
                            </div>
                        </div>

                        <!-- System Notes / Activity -->
                        <div class="bg-white shadow p-5 rounded-lg">
                            <h3 class="font-semibold text-lg">Recent Notes</h3>
                            <p class="mt-2 text-gray-600 text-sm">
                                No recent system notes yet. This section can display logs, user activity, or recent inquiries.
                            </p>
                            <div class="mt-3">
                                <button class="bg-gray-200 hover:bg-gray-300 px-3 py-2 rounded text-gray-800 text-sm transition">
                                    View Logs
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>
</body>

</html>