<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiswaModel;

class SiswaController extends Controller
{
    public function showSiswa()
    {
        $model = new SiswaModel();
        $data['datasiswa'] = $model->findAll(); // Ambil semua data dari tabel siswa

        return view('admin/siswa/siswa', $data); // Kirim data ke view
    }

    public function showSiswaPKL()
    {
        $model = new SiswaModel();
        $data['datasiswa'] = $model->where('JENIS_PKL', 'PKL')->findAll(); // Ambil hanya siswa PKL

        return view('admin/siswa/siswaPKL', $data);
    }

    public function showSiswaRiset()
    {
        $model = new SiswaModel();
        $data['datasiswa'] = $model->where('JENIS_PKL', 'RISET')->findAll(); // Ambil hanya siswa RISET

        return view('admin/siswa/siswaRiset', $data);
    }
}
