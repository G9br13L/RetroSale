<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UsersModel;

class Admin extends BaseController
{
    public function showAccountsPage()
    {
        try {
            // Initialize UsersModel
            $userModel = new UsersModel();

            // Fetch active user accounts ordered by ID ascending
            $accounts = $userModel
                ->where('account_status', 1)
                ->orderBy('id', 'ASC')
                ->findAll();

            // Count all active accounts
            $accountsCount = $userModel->where('account_status', 1)->countAllResults();

            // Count verified and non-verified email accounts
            $verifiedEmailAccountsCount = $userModel
                ->where('account_status', 1)
                ->where('email_activated', 1)
                ->countAllResults();

            $nonVerifiedEmailAccountsCount = $accountsCount - $verifiedEmailAccountsCount;
        } catch (\Exception $e) {
            // Handle errors gracefully
            $accounts = [];
            $accountsCount = $verifiedEmailAccountsCount = $nonVerifiedEmailAccountsCount = 0;
            log_message('error', 'Error fetching accounts: ' . $e->getMessage());
        }

        // Load the admin/accounts view
        return view('admin/accounts', [
            'title' => 'Accounts',
            'active' => 'accounts',
            'accounts' => $accounts,
            'accountsCount' => $accountsCount,
            'verifiedEmailAccountsCount' => $verifiedEmailAccountsCount,
            'nonVerifiedEmailAccountsCount' => $nonVerifiedEmailAccountsCount,
        ]);
    }
}
