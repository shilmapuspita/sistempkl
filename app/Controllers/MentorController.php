<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MentorModel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class MentorController extends BaseController
{
    protected $mentorModel;

    public function __construct()
    {
        $this->mentorModel = new MentorModel();
    }

    public function showMentor()
    {
        $data = [
            'pembimbing' => $this->mentorModel->getPaginateData(10),
            'pager' => $this->mentorModel->pager,
            'currentPage' => 'mentor'
        ];

        return view('admin/mentor/mentor', $data);
    }

    public function create()
    {
        return view('admin/mentor/create', ['currentPage' => 'mentor']);
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'nip'          => 'required|regex_match[/^[A-Za-z0-9.,?+\-\s]+$/]',
            'nama'         => 'required',
            'divisi'       => 'required',
            'bagian'       => 'required',
            'nip_atasan'   => 'required|regex_match[/^[A-Za-z0-9.,?+\-\s]+$/]',
            'nama_atasan'  => 'required',
            'nama_jabatan' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'NIP'          => strtoupper(esc($this->request->getPost('nip'))),
            'NAMA'         => strtoupper(esc($this->request->getPost('nama'))),
            'DIVISI'       => strtoupper(esc($this->request->getPost('divisi'))),
            'BAGIAN'       => strtoupper(esc($this->request->getPost('bagian'))),
            'NIP_ATASAN'   => strtoupper(esc($this->request->getPost('nip_atasan'))),
            'NAMA_ATASAN'  => strtoupper(esc($this->request->getPost('nama_atasan'))),
            'NAMA_JABATAN' => strtoupper(esc($this->request->getPost('nama_jabatan'))),
        ];

        $this->mentorModel->insert($data);

        session()->setFlashdata('success', 'Data mentor berhasil ditambahkan!');
        return redirect()->to('/mentor');
    }

    //buat upload file
    public function upload()
    {
        $file = $this->request->getFile('excel_file');

        // Cek apakah file diunggah
        if (!$file || $file->getError() == 4) {
            return redirect()->to('/mentor')->with('error', 'Tidak ada file yang diunggah!');
        }

        // Cek ekstensi yang diperbolehkan
        $allowedExtensions = ['xls', 'xlsx'];
        if (!in_array($file->getExtension(), $allowedExtensions)) {
            return redirect()->to('/mentor')->with('error', 'Format file harus .xls atau .xlsx!');
        }

        // Cek ukuran file (max 2MB)
        if ($file->getSize() > 2097152) {
            return redirect()->to('/mentor')->with('error', 'Ukuran file terlalu besar (max 2MB)!');
        }

        try {
            // Load file Excel
            $spreadsheet = IOFactory::load($file->getTempName());
            $sheet = $spreadsheet->getActiveSheet();
            $mentorModel = new MentorModel();

            // Ambil data dalam bentuk array
            $dataRows = $sheet->toArray(null, true, true, true);

            // Cek apakah jumlah kolom sesuai dengan header
            if (count($dataRows) < 2) {
                return redirect()->to('/mentor')->with('error', 'File kosong atau tidak memiliki data!');
            }

            // Loop mulai dari baris ke-2 (skip header)
            for ($i = 2; $i <= count($dataRows); $i++) {
                $row = $dataRows[$i];

                // Pastikan jumlah kolom sesuai
                if (count($row) < 7) {
                    continue; // Skip baris yang tidak lengkap
                }

                // Insert ke database
                $mentorModel->insert([
                    'NIP'          => strtoupper(trim($row['A'])),
                    'NAMA'         => strtoupper(trim($row['B'])),
                    'DIVISI'       => strtoupper(trim($row['C'])),
                    'BAGIAN'       => strtoupper(trim($row['D'])),
                    'NIP_ATASAN'   => strtoupper(trim($row['E'])),
                    'NAMA_ATASAN'  => strtoupper(trim($row['F'])),
                    'NAMA_JABATAN' => strtoupper(trim($row['G'])),
                ]);
            }

            return redirect()->to('/mentor')->with('success', 'Data mentor berhasil diunggah!');
        } catch (\Exception $e) {
            return redirect()->to('/mentor')->with('error', 'Error saat memproses file: ' . $e->getMessage());
        }
    }
}
