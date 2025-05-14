<?php

namespace App\Models;

use CodeIgniter\Model;

class MentorModel extends Model
{
    protected $table = 'pembimbing';
    protected $primaryKey = 'ID_PEMBIMBING';

    protected $allowedFields = [
        'NIP',
        'NAMA',
        'DIVISI',
        'BAGIAN',
        'NIP_ATASAN',
        'NAMA_ATASAN',
        'NAMA_JABATAN'
    ];

    public function getPaginateData($perPage)
    {
        return $this->orderBy('ID_PEMBIMBING', 'ASC')->paginate($perPage);
    }

    public function getDivisiUnik()
    {
        return $this->select('DIVISI')
            ->distinct()
            ->orderBy('DIVISI', 'ASC')
            ->findAll();
    }

    public function getBagianUnik()
    {
        return $this->select('BAGIAN')
            ->distinct()
            ->orderBy('BAGIAN', 'ASC')
            ->findAll();
    }
}