<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JurusanModel; 

class MajorController extends Controller
{

    public function showJurusan()
    {
        $model = new JurusanModel();
        $data['jurusan'] = $model->findAll(); // Ambil semua data dari tabel jurusan

        return view('admin/major/major', $data); // Kirim data ke view
    }
}
