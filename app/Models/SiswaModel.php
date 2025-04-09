<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'datasiswa';
    protected $primaryKey = 'ID_PKL';
    protected $allowedFields = ['NM_SISWA', 'TANGGAL', 'JENIS_PKL', 'LEMBAGA', 'JURUSAN', 'DIVISI', 'BAGIAN', 'TGL_AWAL', 'TGL_AKHIR', 'NAMA_PEMB'];

    // Fungsi untuk mengambil data dengan filter tanggal dan pagination
    public function getFilteredData($perPage, $jenisPKL = null, $startDate = null, $endDate = null, $regDate = null)
    {
        $query = $this->db->table('datasiswa');

        $query = $this->select("
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
            END as STATUS
        ");

        // **Filter berdasarkan jenis PKL (agar halaman PKL dan Riset terpisah)**
        if (!empty($jenisPKL)) {
            $query->where("JENIS_PKL", $jenisPKL);
        }

        // Filter berdasarkan tanggal mulai
        if (!empty($startDate) && !empty($endDate)) {
            $query->where("TGL_AWAL >=", $startDate)
                ->where("TGL_AKHIR <=", $endDate);
        }

        if (!empty($regDate)) {
            die("Tanggal Filter: " . $regDate);
            $regDate = date('Y-m-d', strtotime(str_replace('/', '-', $regDate)));
            $query->where("DATE(TANGGAL)", $regDate);
        }
        
        // Debugging query
        echo $query->getCompiledSelect();
        exit;
        
        return $query->paginate($perPage);        
    }
}