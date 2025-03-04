<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'datasiswa';  // Nama tabel di database
    protected $primaryKey = 'ID_PKL'; // Primary key tabel
    protected $allowedFields = ['NM_SISWA','TANGGAL', 'JENIS_PKL', 'LEMBAGA', 'JURUSAN', 'DIVISI', 'BAGIAN', 'TGL_AWAL', 'TGL_AKHIR', 'NAMA_PEMB']; // Kolom yang bisa diakses

    // Menambahkan fungsi untuk pagination
    public function getPaginateData($perPage)
    {
        return $this->select("
        TANGGAL as TGL_DAFTAR, 
        ID_PKL as ID,
        NM_SISWA, 
        JENIS_PKL, 
        LEMBAGA, 
        JURUSAN, 
        DIVISI, 
        BAGIAN, 
        TGL_AWAL as TGL_MULAI, 
        TGL_AKHIR, 
        NAMA_PEMB,
        CASE 
            WHEN TGL_AWAL > CURDATE() THEN 'Belum Mulai'
            WHEN TGL_AWAL <= CURDATE() AND TGL_AKHIR >= CURDATE() THEN 'Aktif'
            ELSE 'Sudah Selesai'
        END as STATUS")->paginate($perPage);
    }
}
