<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'datasiswa';  // Nama tabel di database
    protected $primaryKey = 'ID_PKL'; // Primary key tabel
    protected $allowedFields = ['NM_SISWA','TANGGAL', 'JENIS_PKL', 'LEMBAGA', 'JURUSAN', 'DIVISI', 'BAGIAN', 'TGL_AWAL', 'TGL_AKHIR', 'NAMA_PEMB', 'status']; // Kolom yang bisa diakses
    
    // Fungsi untuk mengambil data siswa berdasarkan jenis PKL
    // public function getSiswaByJenisPKL($jenis_pkl = null)
    // {
    //     if ($jenis_pkl) {
    //         return $this->where('JENIS_PKL', $jenis_pkl)->findAll();
    //     }
    //     return $this->findAll();
    // }
}
