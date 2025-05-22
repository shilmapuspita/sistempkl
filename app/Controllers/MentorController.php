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
        $db = \Config\Database::connect();

        $divisi1 = $db->table('datasiswa')->select('divisi')->groupBy('divisi')->get()->getResultArray();
        $divisi2 = $db->table('datapmmb')->select('divisi')->groupBy('divisi')->get()->getResultArray();

        $bagian1 = $db->table('datasiswa')->select('bagian')->groupBy('bagian')->get()->getResultArray();
        $bagian2 = $db->table('datapmmb')->select('bagian')->groupBy('bagian')->get()->getResultArray();

        $allDivisi = array_merge(array_column($divisi1, 'divisi'), array_column($divisi2, 'divisi'));
        $allBagian = array_merge(array_column($bagian1, 'bagian'), array_column($bagian2, 'bagian'));

        $divisiBersih = array_filter($allDivisi, function ($item) {
            return preg_match('/[a-zA-Z0-9]/', $item);
        });

        $bagianBersih = array_filter($allBagian, function ($item) {
            return preg_match('/[a-zA-Z0-9]/', $item);
        });

        $divisiBersih = array_unique($divisiBersih);
        sort($divisiBersih);

        $bagianBersih = array_unique($bagianBersih);
        sort($bagianBersih);

        return view('admin/mentor/create', [
            'currentPage' => 'mentor',
            'divisiList' => $divisiBersih,
            'bagianList' => $bagianBersih,
        ]);
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

    public function edit($id)
    {
        $mentor = $this->mentorModel->find($id);

        if (!$mentor) {
            return redirect()->to('/mentor')->with('error', 'Data mentor tidak ditemukan!');
        }

        $db = \Config\Database::connect();

        // Ambil divisi dan bagian dari dua tabel
        $divisi1 = $db->table('datasiswa')->select('divisi')->groupBy('divisi')->get()->getResultArray();
        $divisi2 = $db->table('datapmmb')->select('divisi')->groupBy('divisi')->get()->getResultArray();

        $bagian1 = $db->table('datasiswa')->select('bagian')->groupBy('bagian')->get()->getResultArray();
        $bagian2 = $db->table('datapmmb')->select('bagian')->groupBy('bagian')->get()->getResultArray();

        // Gabungkan dan bersihkan data
        $allDivisi = array_merge(array_column($divisi1, 'divisi'), array_column($divisi2, 'divisi'));
        $allBagian = array_merge(array_column($bagian1, 'bagian'), array_column($bagian2, 'bagian'));

        $divisiBersih = array_filter($allDivisi, fn($item) => preg_match('/[a-zA-Z0-9]/', $item));
        $bagianBersih = array_filter($allBagian, fn($item) => preg_match('/[a-zA-Z0-9]/', $item));

        $divisiBersih = array_unique($divisiBersih);
        sort($divisiBersih);

        $bagianBersih = array_unique($bagianBersih);

        sort($bagianBersih);

        return view('admin/mentor/edit', [
            'mentor' => $mentor,
            'currentPage' => 'mentor',
            'divisiList' => $divisiBersih,
            'bagianList' => $bagianBersih,
        ]);
    }

    public function update($id)
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

        $this->mentorModel->update($id, $data);

        session()->setFlashdata('success', 'Data mentor berhasil diperbarui!');
        return redirect()->to('/mentor');
    }

    public function delete($id)
    {
        $mentor = $this->mentorModel->find($id);

        if (!$mentor) {
            return redirect()->to('/mentor')->with('error', 'Data mentor tidak ditemukan!');
        }

        $this->mentorModel->delete($id);

        session()->setFlashdata('success', 'Data mentor berhasil dihapus!');
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

                // Cek apakah semua kolom kosong, jika ya, skip
                if (
                    empty(trim($row['A'])) && empty(trim($row['B'])) && empty(trim($row['C'])) &&
                    empty(trim($row['D'])) && empty(trim($row['E'])) && empty(trim($row['F'])) && empty(trim($row['G']))
                ) {
                    continue;
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
