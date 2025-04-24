<?php

namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\SiswaModel;
use App\Models\InternshipModel;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $dashboardmodel = new DashboardModel();
        $siswaModel = new SiswaModel();
        $internModel = new InternshipModel();

        // Format bulan biar jadi dua digit
        $bulan = str_pad($this->request->getGet('bulan') ?? date('m'), 2, '0', STR_PAD_LEFT);
        $tahun = $this->request->getGet('tahun') ?? date('Y');

        // Ambil data aktif berdasarkan jenis dan waktu ini diambil dari model
        $rawPKL = $siswaModel->getSiswaAktifByMonth($bulan, $tahun, 'PKL');
        $rawRiset = $siswaModel->getSiswaAktifByMonth($bulan, $tahun, 'RISET');
        $rawIntern = $internModel->getSiswaAktifByMonth($bulan, $tahun);

        // menggabungkan divisi_bagian dari semua sumber
        $divisiBagian = [];

        foreach (array_merge($rawPKL, $rawRiset, $rawIntern) as $item) {
            $divisiBagian[] = $item['divisi_bagian'];
        }

        $divisiBagian = array_unique($divisiBagian);
        sort($divisiBagian);

        // Fungsi bantuan untuk mapping
        function mapJumlah($source, $divisiList)
        {
            $map = array_column($source, 'jumlah', 'divisi_bagian');
            $result = [];

            foreach ($divisiList as $key) {
                $result[] = isset($map[$key]) ? (int)$map[$key] : 0;
            }

            return $result;
        }

        $dataPKL = mapJumlah($rawPKL, $divisiBagian);
        $dataRiset = mapJumlah($rawRiset, $divisiBagian);
        $dataIntern = mapJumlah($rawIntern, $divisiBagian);

        // menampilkan tahun dengan minimal tahun 2013 dan otomatis diperbarui setiap tahunya
        $db = \Config\Database::connect();

        $queryTahun = $db->query("
        SELECT MIN(tahun) AS min_tahun, MAX(tahun) AS max_tahun FROM (
            SELECT YEAR(TGL_AWAL) AS tahun FROM datasiswa
            UNION ALL
            SELECT YEAR(TGL_AWAL) AS tahun FROM datapmmb
        ) AS semua_tahun
        ");

        $tahunResult = $queryTahun->getRow();
        $minTahun = max(2013, $tahunResult->min_tahun ?? date('Y'));
        $maxTahun = max($tahunResult->max_tahun ?? date('Y'), date('Y')); // pastikan minimal tahun sekarang

        $listTahun = range($minTahun, $maxTahun);


        // ini untuk informasi total keseluruhan siswa, mentor dan institusi
        $data = [
            'totalSiswa' => $dashboardmodel->getTotalSiswa(),
            'totalInstitusi' => $dashboardmodel->getTotalInstitusi(),
            'totalMentor' => $dashboardmodel->getTotalMentor(),
            'currentPage' => 'dashboard',
            'username' => session()->get('username'),

            // Data tambahan untuk Chart.js
            'pkl' => $dataPKL,
            'riset' => $dataRiset,
            'intern' => $dataIntern,
            'divisi_bagian' => $divisiBagian,

            // Untuk dropdown filter
            'bulan' => $bulan,
            'tahun' => $tahun,
            'list_tahun' => $listTahun,
        ];

        return view('admin/dashboard', $data);
    }
}
