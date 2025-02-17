<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LembagaModel;

class LembagaController extends Controller
{
    public function showLembaga()
    {
        $model = new LembagaModel();
        $data['lembaga'] = $model->findAll(); // Ambil semua data dari tabel lembaga

        return view('admin/lembaga', $data); // Kirim data ke view
    }
}
