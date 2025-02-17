<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiswaModel;

class SiswaController extends Controller
{
    public function showSiswa()
    {
        $model = new LembagaModel();
        $data['datasiswa'] = $model->findAll(); // Ambil semua data dari tabel siswa

        return view('admin/siswa', $data); // Kirim data ke view
    }
}
