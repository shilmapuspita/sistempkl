<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\InternshipModel;

class InternshipController extends Controller
{
    public function showInternship()
    {
        $model = new InternshipModel();
        $data['datapmmb'] = $model->findAll(); // Ambil semua data dari tabel datapmmb

        return view('admin/siswa/intern', $data); // Kirim data ke view
    }
}
