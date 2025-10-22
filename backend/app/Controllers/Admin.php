<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServicesModel;
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
}
