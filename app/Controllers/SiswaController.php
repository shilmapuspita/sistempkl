<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiswaModel;
use App\Models\MentorModel;
use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SiswaController extends Controller
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function showSiswaPKL()
    {
        // Select data siswa PKL
        $this->siswaModel->select("
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
        (CASE 
            WHEN tanggal_mulai_fix > CURDATE() THEN 'Belum Mulai'
            WHEN tanggal_mulai_fix <= CURDATE() AND tgl_akhir_fix >= CURDATE() THEN 'Aktif'
            ELSE 'Sudah Selesai'
        END) as STATUS
    ")->where('JENIS_PKL', 'PKL');

        // Ambil filter dari URL
        $nama_siswa = $this->request->getGet('nama_siswa');
        $lembaga = $this->request->getGet('lembaga');
        $jurusan = $this->request->getGet('jurusan');
        $divisi = $this->request->getGet('divisi');
        $bagian = $this->request->getGet('bagian');
        $pembimbing = $this->request->getGet('pembimbing');
        $status = $this->request->getGet('status');
        $tanggal_awal = $this->request->getGet('tanggal_mulai_fix');
        $tanggal_akhir = $this->request->getGet('tgl_akhir_fix');
        $tanggal_daftar = $this->request->getGet('tanggal_daftar');

        // Terapkan filter
        if (!empty($nama_siswa)) {
            $this->siswaModel->like('NM_SISWA', $nama_siswa);
        }
        if (!empty($lembaga)) {
            $this->siswaModel->like('LEMBAGA', $lembaga);
        }
        if (!empty($jurusan)) {
            $this->siswaModel->like('JURUSAN', $jurusan);
        }
        if (!empty($divisi)) {
            $this->siswaModel->like('DIVISI', $divisi);
        }
        if (!empty($bagian)) {
            $this->siswaModel->like('BAGIAN', $bagian);
        }
        if (!empty($status)) {
            $this->siswaModel->having('STATUS', $status);
        }
        if (!empty($pembimbing)) {
            $this->siswaModel->like('NAMA_PEMB', $pembimbing);
        }

        if (!empty($tanggal_awal)) {
            $this->siswaModel->where("DATE(tanggal_mulai_fix)", $tanggal_awal);
        }
        if (!empty($tanggal_akhir)) {
            $this->siswaModel->where("DATE(tgl_akhir_fix)", $tanggal_akhir);
        }
        if (!empty($tanggal_daftar)) {
            $this->siswaModel->where("DATE(TANGGAL)", $tanggal_daftar);
        }

        // Ambil daftar lembaga untuk dropdown di modal ekspor
        $lembagaList = $this->siswaModel
            ->select('LEMBAGA')
            ->groupBy('LEMBAGA')
            ->orderBy('LEMBAGA', 'ASC')
            ->findAll();

        // Kirim data ke view
        $data = [
            'datasiswa' => $this->siswaModel->paginate(10),
            'pager' => $this->siswaModel->pager,
            'currentPage' => $this->request->getVar('page') ?? 1,
            'lembagaList' => $lembagaList
        ];

        return view('admin/siswa/PKL/siswaPKL', $data);
    }

    public function createSiswaPKL()
    {
        $mentorModel = new MentorModel();

        $data = [
            'title' => 'Tambah Siswa PKL',
            'currentPage' => 'siswaPKL',
            'divisi' => $mentorModel->getDivisiUnik(),
            'bagian' => $mentorModel->getBagianUnik()
        ];

        return view('admin/siswa/PKL/create', $data);
    }

    public function storeSiswaPKL()
    {
        $data = [
            'ID_PKL' => $this->request->getPost('ID_PKL'),
            'NM_SISWA' => strtoupper($this->request->getPost('NM_SISWA')),
            'TANGGAL' => $this->request->getPost('TANGGAL'),
            'JENIS_PKL' => 'PKL',
            'LEMBAGA' => strtoupper($this->request->getPost('LEMBAGA')),
            'JURUSAN' => strtoupper($this->request->getPost('JURUSAN')),
            'DIVISI' => strtoupper($this->request->getPost('DIVISI')),
            'BAGIAN' => strtoupper($this->request->getPost('BAGIAN')),
            'tanggal_mulai_fix' => $this->request->getPost('tanggal_mulai_fix'),
            'tgl_akhir_fix' => $this->request->getPost('tgl_akhir_fix'),
            'NAMA_PEMB' => strtoupper($this->request->getPost('NAMA_PEMB')),
        ];

        $this->siswaModel->insert($data);
        session()->setFlashdata('success', 'Data siswa PKL berhasil ditambahkan!');
        return redirect()->to(base_url('siswa/PKL'));
    }

    public function editSiswaPKL($id)
    {
        $siswa = $this->siswaModel->find($id);

        if (!$siswa) {
            return redirect()->to(base_url('siswaPKL'))->with('error', 'Data tidak ditemukan!');
        }

        $siswa['tanggal_mulai_fix'] = !empty($siswa['tanggal_mulai_fix']) ? date('Y-m-d', strtotime($siswa['tanggal_mulai_fix'])) : '';
        $siswa['tgl_akhir_fix'] = !empty($siswa['tgl_akhir_fix']) ? date('Y-m-d', strtotime($siswa['tgl_akhir_fix'])) : '';

        $mentorModel = new MentorModel();
        $divisiList = array_column($mentorModel->getDivisiUnik(), 'DIVISI');
        $bagianList = array_column($mentorModel->getBagianUnik(), 'BAGIAN');

        $data = [
            'title' => 'Edit Siswa PKL',
            'siswa' => $siswa,
            'divisiList' => $divisiList,
            'bagianList' => $bagianList,
            'currentPage' => 'siswaPKL'
        ];

        return view('admin/siswa/PKL/edit', $data);
    }

    public function updateSiswaPKL($id)
    {
        if (!$this->siswaModel->find($id)) {
            return redirect()->to(base_url('siswaPKL'))->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'NM_SISWA' => strtoupper($this->request->getPost('NM_SISWA')),
            'TANGGAL' => $this->request->getPost('TANGGAL'),
            'LEMBAGA' => strtoupper($this->request->getPost('LEMBAGA')),
            'JURUSAN' => strtoupper($this->request->getPost('JURUSAN')),
            'DIVISI' => strtoupper($this->request->getPost('DIVISI')),
            'BAGIAN' => strtoupper($this->request->getPost('BAGIAN')),
            'tanggal_mulai_fix' => $this->request->getPost('tanggal_mulai_fix'),
            'tgl_akhir_fix' => $this->request->getPost('tgl_akhir_fix'),
            'NAMA_PEMB' => strtoupper($this->request->getPost('NAMA_PEMB')),
        ];

        $this->siswaModel->update($id, $data);
        session()->setFlashdata('success', 'Data siswa PKL berhasil diperbarui!');
        return redirect()->to(base_url('siswa/PKL'));
    }

    public function deleteSiswaPKL($id)
    {
        if (!$this->siswaModel->find($id)) {
            return redirect()->to(base_url('siswaPKL'))->with('error', 'Data tidak ditemukan.');
        }

        $this->siswaModel->delete($id);
        session()->setFlashdata('success', 'Data siswa PKL berhasil dihapus!');
        return redirect()->to(base_url('siswa/PKL'));
    }

    // =================== Siswa Riset =================== //

    public function showSiswaRiset()
    {
        $this->siswaModel->select("
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
        (CASE 
            WHEN tanggal_mulai_fix > CURDATE() THEN 'Belum Mulai'
            WHEN tanggal_mulai_fix <= CURDATE() AND tgl_akhir_fix >= CURDATE() THEN 'Aktif'
            ELSE 'Sudah Selesai'
        END) as STATUS
    ")->where('JENIS_PKL', 'RISET');

        $nama_siswa     = $this->request->getGet('nama_siswa');
        $lembaga        = $this->request->getGet('lembaga');
        $jurusan        = $this->request->getGet('jurusan');
        $divisi         = $this->request->getGet('divisi');
        $bagian         = $this->request->getGet('bagian');
        $pembimbing     = $this->request->getGet('pembimbing');
        $status         = $this->request->getGet('status');
        $tanggal_awal   = $this->request->getGet('tanggal_mulai');
        $tanggal_akhir  = $this->request->getGet('tgl_akhir_fix');
        $tanggal_daftar = $this->request->getGet('tanggal_daftar');

        if (!empty($nama_siswa)) {
            $this->siswaModel->like('NM_SISWA', $nama_siswa);
        }
        if (!empty($lembaga)) {
            $this->siswaModel->like('LEMBAGA', $lembaga);
        }
        if (!empty($jurusan)) {
            $this->siswaModel->like('JURUSAN', $jurusan);
        }
        if (!empty($divisi)) {
            $this->siswaModel->like('DIVISI', $divisi);
        }
        if (!empty($bagian)) {
            $this->siswaModel->like('BAGIAN', $bagian);
        }
        if (!empty($pembimbing)) {
            $this->siswaModel->like('NAMA_PEMB', $pembimbing);
        }
        if (!empty($status)) {
            $this->siswaModel->having('STATUS', $status);
        }
        if (!empty($tanggal_awal)) {
            $this->siswaModel->where("DATE(tanggal_mulai_fix)", $tanggal_awal);
        }
        if (!empty($tanggal_akhir)) {
            $this->siswaModel->where("DATE(tgl_akhir_fix)", $tanggal_akhir);
        }
        if (!empty($tanggal_daftar)) {
            $this->siswaModel->where("DATE(TANGGAL)", $tanggal_daftar);
        }

        $lembagaList = $this->siswaModel
            ->select('LEMBAGA')
            ->groupBy('LEMBAGA')
            ->orderBy('LEMBAGA', 'ASC')
            ->findAll();

        $data = [
            'datasiswa' => $this->siswaModel->paginate(10),
            'pager' => $this->siswaModel->pager,
            'currentPage' => $this->request->getVar('page') ?? 1,
            'lembagaList' => $lembagaList
        ];

        return view('admin/siswa/riset/siswaRiset', $data);
    }


    public function createSiswaRiset()
    {
        $mentorModel = new MentorModel();

        $data = [
            'title' => 'Tambah Siswa Riset',
            'currentPage' => 'siswaRiset',
            'divisi' => $mentorModel->getDivisiUnik(),
            'bagian' => $mentorModel->getBagianUnik()
        ];

        return view('admin/siswa/Riset/create', $data);
    }

    public function storeSiswaRiset()
    {
        $data = [
            'ID_PKL' => $this->request->getPost('ID_PKL'),
            'NM_SISWA' => strtoupper($this->request->getPost('NM_SISWA')),
            'TANGGAL' => $this->request->getPost('TANGGAL'),
            'JENIS_PKL' => 'RISET',
            'LEMBAGA' => strtoupper($this->request->getPost('LEMBAGA')),
            'JURUSAN' => strtoupper($this->request->getPost('JURUSAN')),
            'DIVISI' => strtoupper($this->request->getPost('DIVISI')),
            'BAGIAN' => strtoupper($this->request->getPost('BAGIAN')),
            'tanggal_mulai_fix' => ($this->request->getPost('tanggal_mulai_fix')),
            'tgl_akhir_fix' => ($this->request->getPost('tgl_akhir_fix')),
            'NAMA_PEMB' => strtoupper($this->request->getPost('NAMA_PEMB')),
        ];

        $this->siswaModel->insert($data);
        session()->setFlashdata('success', 'Data siswa riset berhasil ditambahkan!');
        return redirect()->to(base_url('siswa/riset'));
    }

    public function editSiswaRiset($id)
    {
        $siswa = $this->siswaModel->find($id);

        if (!$siswa) {
            return redirect()->to(base_url('siswaRiset'))->with('error', 'Data tidak ditemukan!');
        }

        $siswa['tanggal_mulai_fix'] = !empty($siswa['tanggal_mulai_fix']) ? date('Y-m-d', strtotime($siswa['tanggal_mulai_fix'])) : '';
        $siswa['tgl_akhir_fix'] = !empty($siswa['tgl_akhir_fix']) ? date('Y-m-d', strtotime($siswa['tgl_akhir_fix'])) : '';

        $mentorModel = new MentorModel();
        $divisiList = array_column($mentorModel->getDivisiUnik(), 'DIVISI');
        $bagianList = array_column($mentorModel->getBagianUnik(), 'BAGIAN');

        $data = [
            'title' => 'Edit Siswa Riset',
            'siswa' => $siswa,
            'divisiList' => $divisiList,
            'bagianList' => $bagianList,
            'currentPage' => 'siswaRiset'
        ];

        return view('admin/siswa/riset/edit', $data);
    }

    public function updateSiswaRiset($id)
    {
        if (!$this->siswaModel->find($id)) {
            return redirect()->to(base_url('siswaRiset'))->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'NM_SISWA' => strtoupper($this->request->getPost('NM_SISWA')),
            'TANGGAL' => $this->request->getPost('TANGGAL'),
            'LEMBAGA' => strtoupper($this->request->getPost('LEMBAGA')),
            'JURUSAN' => strtoupper($this->request->getPost('JURUSAN')),
            'DIVISI' => strtoupper($this->request->getPost('DIVISI')),
            'BAGIAN' => strtoupper($this->request->getPost('BAGIAN')),
            'tanggal_mulai_fix' => $this->request->getPost('tanggal_mulai_fix'),
            'tgl_akhir_fix' => $this->request->getPost('tgl_akhir_fix'),
            'NAMA_PEMB' => strtoupper($this->request->getPost('NAMA_PEMB')),
        ];

        $this->siswaModel->update($id, $data);
        session()->setFlashdata('success', 'Data siswa riset berhasil diperbarui!');
        return redirect()->to(base_url('siswa/riset'));
    }

    public function deleteSiswaRiset($id)
    {
        if (!$this->siswaModel->find($id)) {
            return redirect()->to(base_url('siswaRiset'))->with('error', 'Data tidak ditemukan.');
        }

        $this->siswaModel->delete($id);
        session()->setFlashdata('success', 'Data siswa riset berhasil dihapus!');
        return redirect()->to(base_url('siswa/riset'));
    }

    public function exportFormPKL()
    {
        $rawList = $this->siswaModel->select('LEMBAGA')->findAll();
        $uniqueLembaga = [];

        foreach ($rawList as $item) {
            $lembagaRaw = $item['LEMBAGA'] ?? '';
            $key = mb_strtolower(trim($lembagaRaw));
            if ($key === '') continue;
            if (!isset($uniqueLembaga[$key])) {
                $uniqueLembaga[$key] = trim($lembagaRaw);
            }
        }

        natcasesort($uniqueLembaga);

        $lembagaList = [];
        foreach ($uniqueLembaga as $val) {
            $lembagaList[] = ['LEMBAGA' => $val];
        }

        return view('admin/siswa/PKL/ekspor', [
            'currentPage' => 'siswaPKL',
            'lembagaList' => $lembagaList,
        ]);
    }

    public function exportSiswaPKL()
    {
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');
        $divisi = $this->request->getPost('divisi');
        $pembimbing = $this->request->getPost('pembimbing');
        $lembaga = $this->request->getPost('lembaga');

        // Pastikan minimal satu filter diisi
        if (empty($start_date) && empty($end_date) && empty($divisi) && empty($pembimbing) && empty($lembaga)) {
            return redirect()->back()->with('error', 'Minimal satu filter harus diisi untuk ekspor data.');
        }

        $query = $this->siswaModel
            ->select("TANGGAL as TGL_DAFTAR, ID_PKL as ID, NM_SISWA, JENIS_PKL, LEMBAGA, JURUSAN, DIVISI, BAGIAN, tanggal_mulai_fix, tgl_akhir_fix, NAMA_PEMB,
            (CASE 
                WHEN tanggal_mulai_fix > CURDATE() THEN 'Belum Mulai'
                WHEN tanggal_mulai_fix <= CURDATE() AND tgl_akhir_fix >= CURDATE() THEN 'Aktif'
                ELSE 'Sudah Selesai'
            END) as STATUS")
            ->where('JENIS_PKL', 'PKL');

        // Filter fleksibel
        if (!empty($start_date)) {
            $query->where('tanggal_mulai_fix >=', $start_date);
        }

        if (!empty($end_date)) {
            $query->where('tgl_akhir_fix <=', $end_date);
        }

        if (!empty($divisi)) {
            $query->where('DIVISI', $divisi);
        }

        if (!empty($pembimbing)) {
            $query->where('NAMA_PEMB', $pembimbing);
        }

        if (!empty($lembaga)) {
            $query->where('LEMBAGA', $lembaga);
        }

        $siswa = $query->findAll();

        if (empty($siswa)) {
            return redirect()->back()->with('error', 'Data tidak ditemukan. Silakan cek kembali filter yang digunakan.');
        }

        // Buat file Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Lembaga');
        $sheet->setCellValue('D1', 'Jurusan');
        $sheet->setCellValue('E1', 'Divisi');
        $sheet->setCellValue('F1', 'Bagian');
        $sheet->setCellValue('G1', 'Tanggal Mulai');
        $sheet->setCellValue('H1', 'Tanggal Selesai');
        $sheet->setCellValue('I1', 'Pembimbing');
        $sheet->setCellValue('J1', 'Status');

        $row = 2;
        foreach ($siswa as $s) {
            $sheet->setCellValue('A' . $row, $s['ID']);
            $sheet->setCellValue('B' . $row, $s['NM_SISWA']);
            $sheet->setCellValue('C' . $row, $s['LEMBAGA']);
            $sheet->setCellValue('D' . $row, $s['JURUSAN']);
            $sheet->setCellValue('E' . $row, $s['DIVISI']);
            $sheet->setCellValue('F' . $row, $s['BAGIAN']);
            $sheet->setCellValue('G' . $row, $s['tanggal_mulai_fix']);
            $sheet->setCellValue('H' . $row, $s['tgl_akhir_fix']);
            $sheet->setCellValue('I' . $row, $s['NAMA_PEMB']);
            $sheet->setCellValue('J' . $row, $s['STATUS']);
            $row++;
        }

        // Output ke Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'data_siswa_pkl.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }

    public function exportFormRiset()
    {
        return view('admin/siswa/riset/siswaRiset', [
            'currentPage' => 'siswaRiset',
        ]);
    }

    public function exportSiswaRiset()
    {
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');
        $divisi = $this->request->getPost('divisi');
        $pembimbing = $this->request->getPost('pembimbing');
        $lembaga = $this->request->getPost('lembaga');

        if (empty($start_date) && empty($end_date) && empty($divisi) && empty($pembimbing) && empty($lembaga)) {
    return redirect()->back()->with('error', 'Minimal satu filter harus diisi untuk ekspor data.');
}

        $query = $this->siswaModel
            ->select("TANGGAL as TGL_DAFTAR, ID_PKL as ID, NM_SISWA, JENIS_PKL, LEMBAGA, JURUSAN, DIVISI, BAGIAN, tanggal_mulai_fix, tgl_akhir_fix, NAMA_PEMB,
            (CASE 
                WHEN tanggal_mulai_fix > CURDATE() THEN 'Belum Mulai'
                WHEN tanggal_mulai_fix <= CURDATE() AND tgl_akhir_fix >= CURDATE() THEN 'Aktif'
                ELSE 'Sudah Selesai'
            END) as STATUS")
            ->where('JENIS_PKL', 'Riset');

        if (!empty($start_date) && !empty($end_date)) {
            $query->where('tanggal_mulai_fix >=', $start_date)
                ->where('tgl_akhir_fix <=', $end_date);
        }

        if (!empty($divisi)) {
            $query->where('DIVISI', $divisi);
        }

        if (!empty($pembimbing)) {
            $query->where('NAMA_PEMB', $pembimbing);
        }

        if (!empty($lembaga)) {
            $query->like('LEMBAGA', $lembaga);
        }

        $siswa = $query->findAll();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Lembaga');
        $sheet->setCellValue('D1', 'Jurusan');
        $sheet->setCellValue('E1', 'Divisi');
        $sheet->setCellValue('F1', 'Bagian');
        $sheet->setCellValue('G1', 'Tanggal Mulai');
        $sheet->setCellValue('H1', 'Tanggal Selesai');
        $sheet->setCellValue('I1', 'Pembimbing');
        $sheet->setCellValue('J1', 'Status');

        $row = 2;
        foreach ($siswa as $s) {
            $sheet->setCellValue('A' . $row, $s['ID']);
            $sheet->setCellValue('B' . $row, $s['NM_SISWA']);
            $sheet->setCellValue('C' . $row, $s['LEMBAGA']);
            $sheet->setCellValue('D' . $row, $s['JURUSAN']);
            $sheet->setCellValue('E' . $row, $s['DIVISI']);
            $sheet->setCellValue('F' . $row, $s['BAGIAN']);
            $sheet->setCellValue('G' . $row, $s['tanggal_mulai_fix']);
            $sheet->setCellValue('H' . $row, $s['tgl_akhir_fix']);
            $sheet->setCellValue('I' . $row, $s['NAMA_PEMB']);
            $sheet->setCellValue('J' . $row, $s['STATUS']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_siswa_riset.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
