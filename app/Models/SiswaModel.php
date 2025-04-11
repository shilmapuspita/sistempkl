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
        $query = $this->db->table('datasiswa');

        $query->select("
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
            $query->where("JENIS_PKL", $jenisPKL);
        }

        // Filter berdasarkan tanggal mulai
        if (!empty($startDate) && !empty($endDate)) {
            $query->where("tanggal_mulai_fix >=", $startDate)
                ->where("tgl_akhir_fix <=", $endDate);
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