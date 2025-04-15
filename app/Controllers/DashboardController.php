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

        $bulan = $this->request->getGet('bulan') ?? date('m');
        $tahun = $this->request->getGet('tahun') ?? date('Y');

        $dataPKL = $siswaModel->getSiswaAktifByMonth($bulan, $tahun, 'PKL');
        $dataRiset = $siswaModel->getSiswaAktifByMonth($bulan, $tahun, 'RISET');
        $dataIntern = $internModel->getSiswaAktifByMonth($bulan, $tahun);

        $listTahun = $internModel->select('YEAR(TGL_AWAL) as tahun')
            ->groupBy('tahun')
            ->orderBy('tahun', 'DESC')
            ->findAll();

        $data = [
            'totalSiswa' => $dashboardmodel->getTotalSiswa(),
            'totalInstitusi' => $dashboardmodel->getTotalInstitusi(),
            'totalMentor' => $dashboardmodel->getTotalMentor(),
            'currentPage' => 'dashboard',

            // Data chart:
            'pkl' => $dataPKL,
            'riset' => $dataRiset,
            'intern' => $dataIntern,
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