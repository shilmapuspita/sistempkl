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
        return $this->select("
        TANGGAL as TGL_DAFTAR, 
        ID_PKL as ID,
        NO as NO_SURAT,
        BATCH,
        NM_SISWA, 
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
        END as STATUS
        ")->paginate($perPage);
    }
}


