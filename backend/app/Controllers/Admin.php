<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServicesModel;
use App\Models\UsersModel;
use App\Models\RequestsModel;


class Admin extends BaseController
{
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
}
