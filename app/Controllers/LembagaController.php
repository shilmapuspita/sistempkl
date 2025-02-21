<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LembagaModel;

class LembagaController extends Controller
{
    public function showLembaga()
    {
        $model = new LembagaModel();
        $data = [
        'lembaga' => $model->getPaginateData(10), // Ambil semua data dari tabel lembaga
        'pager' => $model->pager
        ];
        
        return view('admin/lembaga/lembaga', $data); // Kirim data ke view
    }
}
