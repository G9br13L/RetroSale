<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServicesModel;
use App\Models\UsersModel;
use App\Models\RequestsModel;

class Admin extends BaseController
{

    /**
     * Show the Admin Dashboard page
     */
    public function showDashboardPage()
    {
        try {
            // Initialize models
            $requestModel = new RequestsModel();
            $servicesModel = new ServicesModel();

            // Count active requests and services
            $requestsCount = $requestModel->where('is_active', 1)->countAllResults();
            $servicesCount = $servicesModel->where('is_active', 1)->countAllResults();
        } catch (\Exception $e) {
            // Fallback in case of errors
            $requestsCount = "Server Issue: " . $e->getMessage();
            $servicesCount = "Server Issue: " . $e->getMessage();
        }

        // Load the dashboard view with data
        return view('/admin/dashboardadmin', [
            'requestsCount' => $requestsCount,
            'servicesCount' => $servicesCount,
        ]);
    }

    public function showServicesPage()
    {
        try {
            // Persist service to database using ServicesModel
            $serviceModel = new ServicesModel();

            // Query all services that are active
            $services = $serviceModel
                ->where('is_active', 1)
                ->orderBy('id', 'ASC')
                ->findAll();

            // Count all active services
            $servicesCount = $serviceModel
                ->where('is_active', 1)
                ->countAllResults();

            // Count available services
            $availableServicesCount = $serviceModel
                ->where('is_active', 1)
                ->where('is_available', 1)
                ->countAllResults();

            // Count not available services
            $notAvailableServicesCount = $servicesCount - $availableServicesCount;
        } catch (\Exception $e) {
            // Handle errors gracefully
            $services = [];
            $servicesCount = $availableServicesCount = $notAvailableServicesCount = 0;
            log_message('error', 'Error fetching services: ' . $e->getMessage());
        }

        // Load the admin/services view
        return view('/admin/services', [
            'title' => 'Services',
            'active' => 'services',
            'services' => $services,
            'servicesCount' => $servicesCount,
            'availableServicesCount' => $availableServicesCount,
            'notAvailableServicesCount' => $notAvailableServicesCount,
        ]);
    }

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

    public function showInquiriesPage()
    {
        try {
            // --- Load Models ---
            $requestModel = new RequestsModel();
            $serviceModel = new ServicesModel();
            $userModel    = new UsersModel();

            // --- Load Accounts (Active Only) ---
            $accountList = $userModel
                ->where('account_status', 1)
                ->orderBy('id', 'ASC')
                ->findAll();

            // --- Load Services and Map by ID ---
            $services = $serviceModel->findAll();
            $serviceMap = [];
            foreach ($services as $service) {
                $serviceMap[$service->id] = $service->title;
            }

            // --- Load Requests with Service Join ---
            $requests = $requestModel
                ->select('requests.*, services.title AS service_name')
                ->join('services', 'services.id = requests.service_id', 'left')
                ->where('requests.is_active', 1)
                ->orderBy('requests.id', 'ASC')
                ->findAll();

            // --- Attach Service Names ---
            foreach ($requests as &$request) {
                $request['service_name'] = $serviceMap[$request['service_id']] ?? 'Unknown';
            }
            unset($request);

            // --- Request Counts ---
            $requestsCount = $requestModel
                ->where('is_active', 1)
                ->countAllResults();

            $today = date('Y-m-d');
            $upcomingRequestsCount = $requestModel
                ->where('is_active', 1)
                ->where('preferred_date >=', $today)
                ->countAllResults();

            $pendingRequestsCount = $requestModel
                ->where('is_active', 1)
                ->groupStart()
                ->where('status', 'pending')
                ->orWhere('status', 0)
                ->groupEnd()
                ->countAllResults();
        } catch (\Exception $e) {
            // Optional: Log the error for debugging
            log_message('error', '[AdminController::showInquiriesPage] ' . $e->getMessage());
            $requests = [];
            $requestsCount = $upcomingRequestsCount = $pendingRequestsCount = 0;
            $accountList = [];
        }

        // --- Return the view with all data ---
        return view('admin/inquiries', [
            'requests'                => $requests,
            'requestsCount'           => $requestsCount,
            'upcomingRequestsCount'   => $upcomingRequestsCount,
            'pendingRequestsCount'    => $pendingRequestsCount,
            'accountList'             => $accountList
        ]);
    }

    public function createAccount()
    {
        helper(['form', 'url']);

        $userModel = new \App\Models\UsersModel();

        // Validation rules
        $validationRules = [
            'first_name'       => 'required|min_length[2]',
            'last_name'        => 'required|min_length[2]',
            'email'            => 'required|valid_email|is_unique[users.email]',
            'password'         => 'required|min_length[8]',
            'password_confirm' => 'matches[password]',
            'type'             => 'required',
        ];

        if (!$this->validate($validationRules)) {
            // Validation failed — reload the accounts page with error messages
            return view('admin/accounts', [
                'errors' => $this->validator->getErrors(),
                'old'    => $this->request->getPost(),
                'accounts' => $userModel->where('account_status', 1)->findAll(),
                'accountsCount' => $userModel->where('account_status', 1)->countAllResults(),
                'verifiedEmailAccountsCount' => $userModel->where('account_status', 1)->where('email_activated', 1)->countAllResults(),
                'nonVerifiedEmailAccountsCount' => $userModel->where('account_status', 1)->where('email_activated', 0)->countAllResults(),
            ]);
        }

        // Handle profile image upload
        $profileImage = $this->request->getFile('profile_image');
        $imageName = 'default.png';
        if ($profileImage && $profileImage->isValid() && !$profileImage->hasMoved()) {
            $imageName = $profileImage->getRandomName();
            $profileImage->move('uploads/profile_images', $imageName);
        }

        // Prepare data for insertion
        $userData = [
            'first_name'      => $this->request->getPost('first_name'),
            'middle_name'     => $this->request->getPost('middle_name'),
            'last_name'       => $this->request->getPost('last_name'),
            'email'           => $this->request->getPost('email'),
            'password_hash'   => $this->request->getPost('password'), // <-- model hashes it automatically
            'type'            => $this->request->getPost('type'),
            'gender'          => $this->request->getPost('gender'),
            'profile_image'   => $imageName,
            'newsletter'      => $this->request->getPost('newsletter') ?? 1,
            'account_status'  => 1,
            'email_activated' => 0,
        ];

        try {
            $userModel->insert($userData);
        } catch (\Exception $e) {
            log_message('error', '[AdminController::createAccount] ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create account: ' . $e->getMessage());
        }

        return redirect()->to('/admin/accounts')->with('success', 'Account created successfully!');
    }
}
