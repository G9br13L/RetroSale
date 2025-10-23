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
}
