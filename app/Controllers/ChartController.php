<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\InternshipModel;
use App\Models\SiswaModel;

class ChartController extends BaseController
{
    public function aktif() 
{
    $bulan = $this->request->getGet('bulan') ?? date('m');
    $tahun = $this->request->getGet('tahun') ?? date('Y');

    $siswaModel = new SiswaModel();
    $internModel = new InternshipModel();

    $dataPKL   = $siswaModel->getSiswaAktifByMonth($bulan, $tahun, 'PKL');
    $dataRiset = $siswaModel->getSiswaAktifByMonth($bulan, $tahun, 'RISET');
    $dataIntern = $internModel->getSiswaAktifByMonth($bulan, $tahun);

    // Gabungkan jadi satu array dengan kunci divisi-bagian
    $combined = [];

    // PKL
    foreach ($dataPKL as $row) {
        $key = $row['DIVISI'].'-'.$row['BAGIAN'];
        $combined[$key]['divisi'] = $row['DIVISI'];
        $combined[$key]['bagian'] = $row['BAGIAN'];
        $combined[$key]['pkl'] = $row['total'] ?? 0;
        $combined[$key]['riset'] = 0;
        $combined[$key]['intern'] = 0;
    }

    // Riset
    foreach ($dataRiset as $row) {
        $key = $row['DIVISI'].'-'.$row['BAGIAN'];
        if (!isset($combined[$key])) {
            $combined[$key]['divisi'] = $row['DIVISI'];
            $combined[$key]['bagian'] = $row['BAGIAN'];
            $combined[$key]['pkl'] = 0;
            $combined[$key]['intern'] = 0;
        }
        $combined[$key]['riset'] = $row['total'] ?? 0;
    }

    // Intern
    foreach ($dataIntern as $row) {
        $key = $row['DIVISI'].'-'.$row['BAGIAN'];
        if (!isset($combined[$key])) {
            $combined[$key]['divisi'] = $row['DIVISI'];
            $combined[$key]['bagian'] = $row['BAGIAN'];
            $combined[$key]['pkl'] = 0;
            $combined[$key]['riset'] = 0;
        }
        $combined[$key]['intern'] = $row['total'] ?? 0;
    }

    $data = [
        'chartData' => array_values($combined),
        'bulan' => $bulan,
        'tahun' => $tahun
    ];

    return view('admin/chart_aktif', $data);
}
}
