<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'datasiswa';  // Nama tabel di database
    protected $primaryKey = 'ID_PKL'; // Primary key tabel
    protected $allowedFields = ['NM_SISWA','TANGGAL', 'JENIS_PKL', 'LEMBAGA', 'JURUSAN', 'DIVISI', 'BAGIAN', 'TGL_AWAL', 'TGL_AKHIR', 'NAMA_PEMB']; // Kolom yang bisa diakses
    
}
