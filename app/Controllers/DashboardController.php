<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class DashboardController extends BaseController
{
    public function index()
{
    if (!session()->get('logged_in')) {
        return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $dashboardmodel = new DashboardModel();

    $data = [
        'totalSiswa' => $dashboardmodel->getTotalSiswa(),
        'totalInstitusi' => $dashboardmodel->getTotalInstitusi(),
        'totalMentor' => $dashboardmodel->getTotalMentor(),
        'currentPage' => 'dashboard',
        'username' => session()->get('username'), // atau admin_username jika itu yang kamu simpan
    ];

    return view('admin/dashboard', $data);
}
}