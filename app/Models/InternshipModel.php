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

    public function getSiswaAktifByMonth($month, $year)
{
    return $this->select("DIVISI, BAGIAN")
        ->select("COUNT(*) as total")
        ->where("MONTH(TGL_AWAL)", $month)
        ->where("YEAR(TGL_AWAL)", $year)
        ->where("TGL_AWAL <=", date('Y-m-t')) // aktif bulan ini dan seterusnya
        ->where("TGL_AKHIR >=", date('Y-m-01'))
        ->groupBy("DIVISI, BAGIAN")
        ->findAll();
}

}


