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

        $builder->select("
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

        if (!empty($jenisPKL)) {
            $builder = $builder->where("JENIS_PKL", $jenisPKL);
        }

        // Filter tanggal mulai dan akhir
        if (!empty($startDate) && !empty($endDate)) {
            $builder = $builder->where("tanggal_mulai_fix >=", $startDate)
                               ->where("tgl_akhir_fix <=", $endDate);
            $builder->where("JENIS_PKL", $jenisPKL);
        }

        if (!empty($startDate) && !empty($endDate)) {
            $builder->where("tanggal_mulai_fix >=", $startDate)
                ->where("tgl_akhir_fix <=", $endDate);
        }

        // Filter berdasarkan tanggal pendaftaran
        if (!empty($regDate)) {
            $regDate = date('Y-m-d', strtotime(str_replace('/', '-', $regDate)));
            $builder = $builder->where("DATE(TANGGAL)", $regDate);
            $builder->where("DATE(TANGGAL)", $regDate);
        }

        return $builder->paginate($perPage);
    }
    public function getSiswaAktifByMonth($month, $year)
{
    return $this->select("DIVISI, BAGIAN")
        ->select("COUNT(*) as total")
        ->whereIn("JENIS_PKL", ['PKL', 'RISET'])
        ->where("MONTH(tanggal_mulai_fix)", $month)
        ->where("YEAR(tanggal_mulai_fix)", $year)
        ->where("tanggal_mulai_fix <=", date('Y-m-t'))
        ->where("tgl_akhir_fix >=", date('Y-m-01'))
        ->groupBy("DIVISI, BAGIAN")
        ->findAll();
}
}
