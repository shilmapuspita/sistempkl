<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $dashboardmodel = new DashboardModel();

        $data = [
            'totalSiswa' => $dashboardmodel->getTotalSiswa(),
            'totalInstitusi' => $dashboardmodel->getTotalInstitusi(),
            'totalMentor' => $dashboardmodel->getTotalMentor(),
            'currentPage' => 'dashboard' 
        ];

        return view('admin/dashboard', $data);
    }
}
