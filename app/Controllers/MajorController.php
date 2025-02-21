<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JurusanModel; 

class MajorController extends Controller
{

    public function showJurusan()
    {
        $model = new JurusanModel();
        $data = [
            'jurusan' => $model->getPaginateData(10), // Ambil semua data dari tabel jurusan
            'pager' => $model->pager 
        ];

        return view('admin/major/major', $data); // Kirim data ke view
    }

    public function create()
    {
        return view('admin/major/create');
    }
}
