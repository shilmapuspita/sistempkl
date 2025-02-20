<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KaUrusanModel;

class KaUrusanController extends Controller
{
    public function showUrdiklat()
    {
        $model = new KaUrusanModel();
        $data['urdiklat'] = $model->findAll(); // Ambil semua data dari tabel lembaga

        return view('admin/urdiklat', $data); // Kirim data ke view
    }

    public function show($id)
    {
        $model = new KaUrusanModel();
        $data['urdiklat'] = $model->getUrdiklatById($id);

        if (!$data['urdiklat']) {
            return redirect()->to('/error'); // Redirect jika data tidak ditemukan
        }

        return view('urdiklat', $data);
    }
}
