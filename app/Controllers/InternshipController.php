<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\InternshipModel;

class InternshipController extends Controller
{
    public function showInternship()
    {
        $model = new InternshipModel();
        $data = [
            'datapmmb' => $model->getPaginateData(10), // Ambil semua data dari tabel datapmmb
            'pager' => $model->pager
        ];

        return view('admin/siswa/intern', $data); // Kirim data ke view
    }
}
