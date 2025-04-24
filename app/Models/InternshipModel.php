<?php

namespace App\Models;

use CodeIgniter\Model;

class InternshipModel extends Model
{
    protected $table = 'datapmmb';
    protected $primaryKey = 'ID_PKL';
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
        TGL_AWAL, 
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

        $start = "$year-$month-01";
        $end = date('Y-m-t', strtotime($start));

        return $this->select("CONCAT(DIVISI, ' - ', BAGIAN) as divisi_bagian")
            ->select("COUNT(*) as jumlah")
            ->where("TGL_AWAL <=", $end)
            ->where("TGL_AKHIR >=", $start)
            ->groupBy("divisi_bagian")
            ->findAll();
    }
}
