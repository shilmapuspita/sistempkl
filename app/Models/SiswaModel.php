<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'datasiswa';
    protected $primaryKey = 'ID_PKL';
    protected $allowedFields = ['NM_SISWA', 'TANGGAL', 'JENIS_PKL', 'LEMBAGA', 'JURUSAN', 'DIVISI', 'BAGIAN', 'tanggal_mulai_fix', 'tgl_akhir_fix', 'NAMA_PEMB'];

    // Fungsi untuk mengambil data dengan filter tanggal dan pagination
    public function getFilteredData($perPage, $jenisPKL = null, $startDate = null, $endDate = null, $regDate = null)
    {
        $builder = $this;

        $builder = $builder->select("
            TANGGAL as TGL_DAFTAR, 
            ID_PKL as ID,
            NM_SISWA, 
            JENIS_PKL, 
            LEMBAGA, 
            JURUSAN, 
            DIVISI, 
            BAGIAN, 
            tanggal_mulai_fix, 
            tgl_akhir_fix, 
            NAMA_PEMB,
            CASE 
                WHEN tanggal_mulai_fix > CURDATE() THEN 'Belum Mulai'
                WHEN tanggal_mulai_fix <= CURDATE() AND tgl_akhir_fix >= CURDATE() THEN 'Aktif'
                ELSE 'Sudah Selesai'
            END as STATUS
        ");

        // Filter jenis PKL
        if (!empty($jenisPKL)) {
            $builder = $builder->where("JENIS_PKL", $jenisPKL);
        }

        // Filter tanggal mulai dan akhir
        if (!empty($startDate) && !empty($endDate)) {
            $builder = $builder->where("tanggal_mulai_fix >=", $startDate)
                               ->where("tgl_akhir_fix <=", $endDate);
        }

        // Filter berdasarkan tanggal pendaftaran
        if (!empty($regDate)) {
            $regDate = date('Y-m-d', strtotime(str_replace('/', '-', $regDate)));
            $builder = $builder->where("DATE(TANGGAL)", $regDate);
        }

        return $builder->paginate($perPage);
    }

    public function getSiswaAktifByMonth($month, $year, $jenis)
{
    // Pastikan $month dalam format 2 digit (01, 02, ..., 12)
    $month = str_pad($month, 2, '0', STR_PAD_LEFT);

    // Hitung awal dan akhir bulan yang diminta
    $start = "$year-$month-01";
    $end = date('Y-m-t', strtotime($start)); // t = last day of the month

    return $this->select("CONCAT(DIVISI, ' - ', BAGIAN) as divisi_bagian")
        ->select("COUNT(*) as jumlah")
        ->where("JENIS_PKL", $jenis)
        ->where("tanggal_mulai_fix <=", $end)   // Siswa mulai sebelum atau pas akhir bulan
        ->where("tgl_akhir_fix >=", $start)     // Siswa selesai setelah atau pas awal bulan
        ->groupBy("divisi_bagian")
        ->findAll();
}

}


