<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiswaModel;

    class SiswaController extends Controller
{
    public function showSiswa()
    {
        $model = new SiswaModel();
        $data = [
            'datasiswa' => $model->getPaginateData(10), // menampilkan 10 data perhalaman
            'pager' => $model->pager //menggunakan pagination bawaan CI
        ];

        return view('admin/siswa/siswa', $data); // Kirim data ke view
    }

    public function showSiswaPKL()
    {
        $model = new SiswaModel();
        $data = [
        'datasiswa' => $model->where('JENIS_PKL', 'PKL')->getPaginateData(10), // Ambil hanya siswa PKL dan tampilkan 10 data per halaman
        'pager' => $model->pager
        ];

        return view('admin/siswa/siswaPKL', $data);
    }

    public function showSiswaRiset()
    {
        $model = new SiswaModel();
        $data = [
            'datasiswa' => $model->where('JENIS_PKL', 'RISET')->getPaginateData(10), // Ambil hanya siswa RISET
            'pager' => $model->pager
        ];

        return view('admin/siswa/siswaRiset', $data);
    }
}
