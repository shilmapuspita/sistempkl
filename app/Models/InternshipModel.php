<?php 

namespace App\Models;

use CodeIgniter\Model;

class InternshipModel extends Model
{
    protected $table = 'datapmmb';  // Nama tabel di database
    protected $primaryKey = 'ID_PKL'; // Primary key tabel
    protected $allowedFields = ['NO', 'BATCH', 'TANGGAL', 'NM_SISWA', 'LEMBAGA', 'JURUSAN', 'DIVISI', 'BAGIAN', 'TGL_AWAL', 'TGL_AKHIR', 'NAMA_PEMB']; // Kolom yang bisa diakses

    public function getPaginateData($perPage)
    {
        return $this->paginate($perPage);
    }
}


