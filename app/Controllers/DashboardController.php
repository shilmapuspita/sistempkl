<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\LembagaModel;

class DashboardController extends BaseController
{
    public function index()
    {
        // Ambil data dari model
        $siswaModel = new \App\Models\SiswaModel();
        $datasiswa = $siswaModel->findAll();

        // Kirim data ke view
        return view('dashboard/index', ['datasiswa' => $datasiswa]);
    }
}
