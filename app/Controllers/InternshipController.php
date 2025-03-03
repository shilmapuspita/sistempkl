<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\InternshipModel;

class InternshipController extends Controller
{
    public function showInternship()
    {
        $model = new InternshipModel();
        $data = [
            'datapmmb' => $model->getPaginateData(10), 
            'pager' => $model->pager,
            'currentPage' => 'internship'
        ];

        return view('admin/siswa/intern/intern', $data); 
    }

    public function create()
    {
        return view('admin/siswa/intern/create');
    }

    public function store()
    {
        $validation = $this->validate([
            'no_surat'          => 'required|numeric',
            'batch'             => 'required|numeric',
            'tanggal'             => 'required',
            'nama'             => 'required',
            'lembaga'             => 'required',
            'jurusan'             => 'required',
            'divisi'             => 'required',
            'bagian'             => 'required',
            'tgl_awal'             => 'required',
            'tgl_akhir'             => 'required',
            'nama_pemb'             => 'required',
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
            'TGL_AWAL'      => strtoupper(esc($this->request->getPost('tgl_awal'))),
            'TGL_AKHIR'     => strtoupper(esc($this->request->getPost('tgl_akhir'))),
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
            return redirect()->to('/intern')->with('errors', 'Data Mahasiswa tidak ditemukan.');
        }

        $data = [
            'intern' => $intern
        ];

        return view('admin/siswa/intern/edit', $data);
    }

    public function update($id)
    {
        $validation = $this->validate([
            'no_surat'          => 'required|numeric',
            'batch'             => 'required|numeric',
            'tanggal'             => 'required',
            'nama'             => 'required',
            'lembaga'             => 'required',
            'jurusan'             => 'required',
            'divisi'             => 'required',
            'bagian'             => 'required',
            'tgl_awal'             => 'required',
            'tgl_akhir'             => 'required',
            'nama_pemb'             => 'required',
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
            'DIVISI'        => strtoupper(esc($this->request->getPost('divisi'))),
            'BAGIAN'        => strtoupper(esc($this->request->getPost('bagian'))),
            'TGL_AWAL'      => strtoupper(esc($this->request->getPost('tgl_awal'))),
            'TGL_AKHIR'     => strtoupper(esc($this->request->getPost('tgl_akhir'))),
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
}
