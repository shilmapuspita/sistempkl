<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $DBGroup = 'default';

    public function getTotalSiswa()
    {
        return $this->db->table('datasiswa')
            ->selectCount('ID_PKL')->where('JENIS_PKL', 'PKL')
            ->get()->getRow()->ID_PKL
            +
            $this->db->table('datasiswa')
            ->selectCount('ID_PKL')->where('JENIS_PKL', 'RISET')
            ->get()->getRow()->ID_PKL
            +
            $this->db->table('datapmmb')
            ->selectCount('ID_PKL')->get()->getRow()->ID_PKL;
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
