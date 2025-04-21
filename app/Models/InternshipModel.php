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
    // Format bulan ke dua digit, misalnya "04"
    $month = str_pad($month, 2, '0', STR_PAD_LEFT);

    // Dapatkan awal dan akhir bulan berdasarkan input
    $start = "$year-$month-01";
    $end = date('Y-m-t', strtotime($start)); // tanggal terakhir di bulan tsb

    return $this->select("CONCAT(DIVISI, ' - ', BAGIAN) as divisi_bagian")
        ->select("COUNT(*) as jumlah")
        ->where("TGL_AWAL <=", $end)   // Sudah mulai sebelum/tepat akhir bulan
        ->where("TGL_AKHIR >=", $start) // Belum selesai sebelum awal bulan
        ->groupBy("divisi_bagian")
        ->findAll();
}

}


