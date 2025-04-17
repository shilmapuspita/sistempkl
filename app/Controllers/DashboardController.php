<?php

namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\SiswaModel;
use App\Models\InternshipModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $dashboardmodel = new DashboardModel();
        $siswaModel = new SiswaModel();
        $internModel = new InternshipModel();

        // Format bulan agar dua digit
        $bulan = str_pad($this->request->getGet('bulan') ?? date('m'), 2, '0', STR_PAD_LEFT);
        $tahun = $this->request->getGet('tahun') ?? date('Y');

        // Ambil data aktif berdasarkan jenis dan waktu
        $rawPKL = $siswaModel->getSiswaAktifByMonth($bulan, $tahun, 'PKL');
        $rawRiset = $siswaModel->getSiswaAktifByMonth($bulan, $tahun, 'RISET');
        $rawIntern = $internModel->getSiswaAktifByMonth($bulan, $tahun);

        // Gabungkan divisi_bagian dari semua sumber
        $divisiBagian = [];

        foreach (array_merge($rawPKL, $rawRiset, $rawIntern) as $item) {
            $divisiBagian[] = $item['divisi_bagian'];
        }

        $divisiBagian = array_unique($divisiBagian);
        sort($divisiBagian);

        // Fungsi bantu untuk mapping
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

        $listTahun = $internModel->select('YEAR(TGL_AWAL) as tahun')
            ->groupBy('tahun')
            ->orderBy('tahun', 'DESC')
            ->findAll();

        // Bagian ini dipertahankan utuh
        $data = [
            'totalSiswa' => $dashboardmodel->getTotalSiswa(),
            'totalInstitusi' => $dashboardmodel->getTotalInstitusi(),
            'totalMentor' => $dashboardmodel->getTotalMentor(),
            'currentPage' => 'dashboard',

            // Data tambahan untuk Chart.js
            'pkl' => $dataPKL,
            'riset' => $dataRiset,
            'intern' => $dataIntern,
            'divisi_bagian' => $divisiBagian,

            // Untuk dropdown filter
            'bulan' => $bulan,
            'tahun' => $tahun,
            'list_tahun' => array_column($listTahun, 'tahun'),
        ];

{
    if (!session()->get('logged_in')) {
        return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $dashboardmodel = new DashboardModel();

    $data = [
        'totalSiswa' => $dashboardmodel->getTotalSiswa(),
        'totalInstitusi' => $dashboardmodel->getTotalInstitusi(),
        'totalMentor' => $dashboardmodel->getTotalMentor(),
        'currentPage' => 'dashboard',
        'username' => session()->get('username'), // atau admin_username jika itu yang kamu simpan
    ];

    return view('admin/dashboard', $data);
}
}