<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\InternshipModel;
use App\Models\MentorModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class InternshipController extends Controller
{
    protected $InternshipModel;

    public function __construct()
    {
        $this->InternshipModel = new InternshipModel();
    }
    public function showInternship()
    {
        $model = new InternshipModel();

        $model->select("
        TANGGAL as TGL_DAFTAR, 
        ID_PKL as ID,
        NM_SISWA,  
        LEMBAGA, 
        JURUSAN, 
        DIVISI, 
        BAGIAN, 
        TGL_AWAL, 
        TGL_AKHIR, 
        NAMA_PEMB,
        (CASE 
            WHEN TGL_AWAL> CURDATE() THEN 'Belum Mulai'
            WHEN TGL_AKHIR <= CURDATE() AND TGL_AKHIR>= CURDATE() THEN 'Aktif'
            ELSE 'Sudah Selesai'
        END) as STATUS
    ");

        $no_surat     = $this->request->getGet('no_surat');
        $batch        = $this->request->getGet('batch');
        $tanggal      = $this->request->getGet('tanggal');
        $nama         = $this->request->getGet('nama');
        $lembaga      = $this->request->getGet('lembaga');
        $jurusan      = $this->request->getGet('jurusan');
        $divisi       = $this->request->getGet('divisi');
        $bagian       = $this->request->getGet('bagian');
        $tgl_awal     = $this->request->getGet('tgl_awal');
        $tgl_akhir    = $this->request->getGet('tgl_akhir');
        $pembimbing   = $this->request->getGet('pembimbing');
        $status       = $this->request->getGet('status'); 

        if (!empty($no_surat)) {
            $model->like('no_surat', $no_surat);
        }
        if (!empty($batch)) {
            $model->like('batch', $batch);
        }
        if (!empty($tanggal)) {
            $model->where("DATE(TANGGAL)", $tanggal);
        }
        if (!empty($nama)) {
            $model->like('NM_SISWA', $nama);
        }
        if (!empty($lembaga)) {
            $model->like('LEMBAGA', $lembaga);
        }
        if (!empty($jurusan)) {
            $model->like('JURUSAN', $jurusan);
        }
        if (!empty($divisi)) {
            $model->like('DIVISI', $divisi);
        }
        if (!empty($bagian)) {
            $model->like('BAGIAN', $bagian);
        }
        if (!empty($pembimbing)) {
            $model->like('NAMA_PEMB', $pembimbing);
        }
        if (!empty($status)) {
            $model->having('STATUS', $status);
        }
        if (!empty($tgl_awal)) {
            $model->where("DATE(TGL_AWAL) >=", $tgl_awal);
        }
        if (!empty($tgl_akhir)) {
            $model->where("DATE(TGL_AKHIR) <=", $tgl_akhir);
        }

        $lembagaList = $model
            ->select('LEMBAGA')
            ->groupBy('LEMBAGA')
            ->orderBy('LEMBAGA', 'ASC')
            ->findAll();

        $data = [
            'datapmmb'    => $model->paginate(10),
            'pager'       => $model->pager,
            'currentPage' => $this->request->getVar('page') ?? 1,
            'lembagaList' => $lembagaList
        ];

        return view('admin/siswa/intern/intern', $data);
    }

    public function create()
    {
        $mentorModel = new MentorModel();

        $data = [
            'title' => 'Tambah Siswa Intern',
            'currentPage' => 'intern',
            'divisi' => $mentorModel->getDivisiUnik(),
            'bagian' => $mentorModel->getBagianUnik()
        ];

        return view('admin/siswa/intern/create', $data);
    }

    public function store()
    {
        $validation = $this->validate([
            'no_surat'          => 'required|numeric',
            'batch'             => 'required|numeric',
            'tanggal'           => 'required',
            'nama'              => 'required',
            'lembaga'           => 'required',
            'jurusan'           => 'required',
            'divisi'            => 'required',
            'bagian'            => 'required',
            'TGL_AWAL'          => 'required',
            'TGL_AKHIR'         => 'required',
            'nama_pemb'         => 'required',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'NO'            => strtoupper(esc($this->request->getPost('no_surat'))),
            'BATCH'         => strtoupper(esc($this->request->getPost('batch'))),
            'TANGGAL'       => strtoupper(esc($this->request->getPost('tanggal'))),
            'NM_SISWA'      => strtoupper(esc($this->request->getPost('nama'))),
            'LEMBAGA'       => strtoupper(esc($this->request->getPost('lembaga'))),
            'JURUSAN'       => strtoupper(esc($this->request->getPost('jurusan'))),
            'DIVISI'        => strtoupper(esc($this->request->getPost('divisi'))),
            'BAGIAN'        => strtoupper(esc($this->request->getPost('bagian'))),
            'TGL_AWAL'      => strtoupper(esc($this->request->getPost('TGL_AWAL'))),
            'TGL_AKHIR'     => strtoupper(esc($this->request->getPost('TGL_AKHIR'))),
            'NAMA_PEMB'     => strtoupper(esc($this->request->getPost('nama_pemb'))),
        ];

        $internModel = new InternshipModel();
        $internModel->insert($data);

        return redirect()->to('/intern')->with('success', 'Data Mahasiswa Internship berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $internModel = new InternshipModel();
        $intern = $internModel->find($id);

        if (!$intern) {
            return redirect()->to(base_url('intern'))->with('error', 'Data tidak ditemukan!');
        }

        $mentorModel = new MentorModel();
        $divisiList = array_column($mentorModel->getDivisiUnik(), 'DIVISI');
        $bagianList = array_column($mentorModel->getBagianUnik(), 'BAGIAN');

        $data = [
            'title' => 'Edit Siswa Intern',
            'intern' => $intern,
            'divisiList' => $divisiList,
            'bagianList' => $bagianList,
            'currentPage' => 'intern',
        ];

        return view('admin/siswa/intern/edit', $data);
    }


    public function update($id)
    {
        $validation = $this->validate([
            'no_surat'          => 'required|numeric',
            'batch'             => 'required|numeric',
            'tanggal'           => 'required',
            'nama'              => 'required',
            'lembaga'           => 'required',
            'jurusan'           => 'required',
            'DIVISI'            => 'required',
            'BAGIAN'            => 'required',
            'TGL_AWAL'          => 'required',
            'TGL_AKHIR'         => 'required',
            'nama_pemb'         => 'required',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $internModel = new InternshipModel();
        $internModel->update($id, [
            'NO'            => strtoupper(esc($this->request->getPost('no_surat'))),
            'BATCH'         => strtoupper(esc($this->request->getPost('batch'))),
            'TANGGAL'       => strtoupper(esc($this->request->getPost('tanggal'))),
            'NM_SISWA'      => strtoupper(esc($this->request->getPost('nama'))),
            'LEMBAGA'       => strtoupper(esc($this->request->getPost('lembaga'))),
            'JURUSAN'       => strtoupper(esc($this->request->getPost('jurusan'))),
            'DIVISI'        => strtoupper(esc($this->request->getPost('DIVISI'))),
            'BAGIAN'        => strtoupper(esc($this->request->getPost('BAGIAN'))),
            'TGL_AWAL'      => strtoupper(esc($this->request->getPost('TGL_AWAL'))),
            'TGL_AKHIR'     => strtoupper(esc($this->request->getPost('TGL_AKHIR'))),
            'NAMA_PEMB'     => strtoupper(esc($this->request->getPost('nama_pemb'))),
        ]);

        return redirect()->to('/intern')->with('success', 'Data Mahasiswa Internship berhasil diubah!');
    }

    public function delete($id)
    {
        $internModel = new InternshipModel();

        $intern = $internModel->find($id);
        if (!$intern) {
            return redirect()->to('/intern')->with('error', 'Data Mahasiswa tidak ditemukan.');
        }

        $internModel->delete($id);

        return redirect()->to('/intern')->with('success', 'Data Mahasiswa berhasil dihapus!');
    }

    public function exportFormIntern()
    {
        return view('admin/siswa/Intern/siswaIntern', [
            'currentPage' => 'siswaIntern',
        ]);
    }

    public function exportSiswaIntern()
{
    $start_date = $this->request->getPost('start_date');
    $end_date = $this->request->getPost('end_date');
    $divisi = $this->request->getPost('divisi');
    $pembimbing = $this->request->getPost('pembimbing');
    $lembaga = $this->request->getPost('lembaga');

    if (empty($start_date) && empty($end_date) && empty($divisi) && empty($pembimbing) && empty($lembaga)) {
        return redirect()->back()->with('error', 'Minimal satu filter harus diisi untuk ekspor data.');
    }

    $internModel = new InternshipModel();

    $query = $internModel
        ->select("TANGGAL as TGL_DAFTAR, ID_PKL as ID, NM_SISWA, LEMBAGA, JURUSAN, DIVISI, BAGIAN, TGL_AWAL, TGL_AKHIR, NAMA_PEMB,
            (CASE 
                WHEN TGL_AWAL > CURDATE() THEN 'Belum Mulai'
                WHEN TGL_AWAL <= CURDATE() AND TGL_AKHIR >= CURDATE() THEN 'Aktif'
                ELSE 'Sudah Selesai'
            END) as STATUS");

    if (!empty($start_date) && !empty($end_date)) {
        $query->where('TGL_AWAL >=', $start_date)
            ->where('TGL_AWAL <=', $end_date);
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

    $headers = ['ID', 'Nama', 'Lembaga', 'Jurusan', 'Divisi', 'Bagian', 'Tanggal Mulai', 'Tanggal Selesai', 'Pembimbing', 'Status'];
    $col = 'A';
    foreach ($headers as $header) {
        $sheet->setCellValue($col . '1', $header);
        $col++;
    }

    $row = 2;
    foreach ($siswa as $s) {
        $sheet->setCellValue('A' . $row, $s['ID']);
        $sheet->setCellValue('B' . $row, $s['NM_SISWA']);
        $sheet->setCellValue('C' . $row, $s['LEMBAGA']);
        $sheet->setCellValue('D' . $row, $s['JURUSAN']);
        $sheet->setCellValue('E' . $row, $s['DIVISI']);
        $sheet->setCellValue('F' . $row, $s['BAGIAN']);
        $sheet->setCellValue('G' . $row, $s['TGL_AWAL']);
        $sheet->setCellValue('H' . $row, $s['TGL_AKHIR']);
        $sheet->setCellValue('I' . $row, $s['NAMA_PEMB']);
        $sheet->setCellValue('J' . $row, $s['STATUS']);
        $row++;
    }

    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $filename = 'data_siswa_intern.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit();
}
}