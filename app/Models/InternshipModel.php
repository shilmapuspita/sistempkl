<?php

namespace App\Models;

use CodeIgniter\Model;

class InternshipModel extends Model
{
    protected $table = 'datapmmb';
    protected $primaryKey = 'ID_PKL';
    protected $allowedFields = [
        'NO',
        'BATCH',
        'TANGGAL',
        'NM_SISWA',
        'LEMBAGA',
        'JURUSAN',
        'DIVISI',
        'BAGIAN',
        'TGL_AWAL',
        'TGL_AKHIR',
        'NAMA_PEMB',
        'JENIS_PKL',
        'TGL_AWAL',
        'TGL_AKHIR'
    ];

    public function filterPaginateData($filters, $perPage = 10)
    {
        $builder = $this->select("
            TANGGAL as TANGGAL, 
            ID_PKL as ID,
            NO as NO,
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
        ");

        if (!empty($filters['no_surat'])) {
            $builder->where('NO', $filters['no_surat']);
        }

        if (!empty($filters['batch'])) {
            $builder->where('BATCH', $filters['batch']);
        }

        if (!empty($filters['tanggal'])) {
            $builder->where('TANGGAL', $filters['tanggal']);
        }

        if (!empty($filters['nama'])) {
            $builder->like('NM_SISWA', $filters['nama']);
        }

        if (!empty($filters['lembaga'])) {
            $builder->like('LEMBAGA', $filters['lembaga']);
        }

        if (!empty($filters['jurusan'])) {
            $builder->like('JURUSAN', $filters['jurusan']);
        }

        if (!empty($filters['divisi'])) {
            $builder->like('DIVISI', $filters['divisi']);
        }

        if (!empty($filters['bagian'])) {
            $builder->like('BAGIAN', $filters['bagian']);
        }

        if (!empty($filters['tgl_awal']) && !empty($filters['tgl_akhir'])) {
            $builder->groupStart()
                ->where('TGL_AWAL >=', $filters['tgl_awal'])
                ->where('TGL_AKHIR <=', $filters['tgl_akhir'])
                ->groupEnd();
        } elseif (!empty($filters['tgl_awal']) && empty($filters['tgl_akhir'])) {
            $builder->where('DATE(TGL_AWAL)', $filters['tgl_awal']);
        } elseif (empty($filters['tgl_awal']) && !empty($filters['tgl_akhir'])) {
            $builder->where('DATE(TGL_AKHIR)', $filters['tgl_akhir']);
        }

        if (!empty($filters['pembimbing'])) {
            $builder->like('NAMA_PEMB', $filters['pembimbing']);
        }

        return $builder->paginate($perPage);
    }

    public function getSiswaAktifByMonth($month, $year)
    {
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
