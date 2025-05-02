<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $DBGroup = 'default';

    public function getTotalSiswa()
{
    $today = date('Y-m-d');

    // PKL Aktif
    $pklAktif = $this->db->table('datasiswa')
        ->selectCount('ID_PKL')
        ->where('JENIS_PKL', 'PKL')
        ->where('tanggal_mulai_fix <=', $today)
        ->where('tgl_akhir_fix >=', $today)
        ->get()->getRow()->ID_PKL;

    // RISET Aktif
    $risetAktif = $this->db->table('datasiswa')
        ->selectCount('ID_PKL')
        ->where('JENIS_PKL', 'RISET')
        ->where('tanggal_mulai_fix <=', $today)
        ->where('tgl_akhir_fix >=', $today)
        ->get()->getRow()->ID_PKL;

    // INTERNSHIP Aktif
    $internAktif = $this->db->table('datapmmb')
        ->selectCount('ID_PKL')
        ->where('TGL_AWAL <=', $today)
        ->where('TGL_AKHIR >=', $today)
        ->get()->getRow()->ID_PKL;

    return $pklAktif + $risetAktif + $internAktif;
}


    public function getTotalInstitusi()
    {
        return $this->db->table('lembaga')
            ->selectCount('ID_LEMBAGA')->get()->getRow()->ID_LEMBAGA;
    }

    public function getTotalMentor()
    {
        return $this->db->table('pembimbing')
            ->selectCount('ID_PEMBIMBING')->get()->getRow()->ID_PEMBIMBING;
    }
}
