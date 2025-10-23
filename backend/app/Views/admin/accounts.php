<?php
// Page: admin/accounts
// Data contract:
// $accounts: string | object array
// $accountsCount: string | number
// $verifiedEmailAccountsCount: string | number
// $nonVerfiedEmailAccountsCount: string | number
?>
<!doctype html>
<html lang="en">
<?= view('components/head', ['title' => 'Admin — Accounts']) ?>

<body class="w-full min-h-screen font-sans text-slate-900 admin-accounts-body">

    <!-- Header -->
    <?= view('components/header') ?>

    <main class="px-10 py-10 w-full">

        <div class="md:flex md:space-x-6">
            <!-- Sidebar -->
            <?= view('components/aside/admin_manager', ['active' => 'accounts']) ?>

            <!-- Main Content -->
            <section class="flex-1">
                <h2 class="mb-6 font-semibold text-2xl">Accounts Management</h2>

                <?php if (is_string($accounts)) : ?>
                    <?= view('components/cards/card', [
                        'title' => 'Error Loading Accounts',
                        'value' => $accounts
                    ]) ?>
                <?php else : ?>
                    <!-- Statistics Section -->
                    <div class="gap-4 grid grid-cols-1 md:grid-cols-3 mb-6" id="accountStats">
                        <?= view('components/cards/card_stat', [
                            'title' => 'Total Accounts',
                            'value' => $accountsCount
                        ]) ?>
                        <?= view('components/cards/card_stat', [
                            'title' => 'Verified Accounts',
                            'value' => $verifiedEmailAccountsCount
                        ]) ?>
                        <?= view('components/cards/card_stat', [
                            'title' => 'Not Verified Accounts',
                            'value' => $nonVerifiedEmailAccountsCount
                        ]) ?>

                    </div>

                    <!-- Management Tools -->
                    <div class="flex justify-end gap-3 mb-4">
                        <!-- Create New Account Modal -->
                        <?= view('components/modal/accounts/create') ?>
                    </div>

                    <!-- Filter + Search + Sort Controls -->
                    <?= view('components/control_panels/filter_search_sort/accounts') ?>

                    <!-- Accounts Table -->
                    <?= view('components/table/accounts', ['accounts' => $accounts]) ?>
                <?php endif; ?>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>
</body>

</html>