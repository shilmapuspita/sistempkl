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
            'datapmmb' => $model->getPaginateData(10), // Ambil semua data dari tabel datapmmb
            'pager' => $model->pager
        ];

        return view('admin/siswa/intern/intern', $data); // Kirim data ke view
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
            'NAMA_JURUSAN'          => $this->request->getPost('nama_jurusan'),
        ];

        $jurusanModel = new JurusanModel();
        $jurusanModel->insert($data);

        return redirect()->to('/major')->with('success', 'Data jurusan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jurusanModel = new JurusanModel();
        $jurusan = $jurusanModel->find($id);

        if (!$jurusan) {
            return redirect()->to('/major')->with('errors', 'Data Jurusan tidak ditemukan.');
        }

        $data = [
            'jurusan' => $jurusan
        ];

        return view('admin/major/edit', $data);
    }

    public function update($id)
    {
        $validation = $this->validate([
            'nama_jurusan'        => 'required',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $jurusanModel = new JurusanModel();
        $jurusanModel->update($id, [
            'NAMA_JURUSAN'          => $this->request->getPost('nama_jurusan'),
        ]);

        return redirect()->to('/major')->with('success', 'Data jurusan berhasil diubah!');
    }

    public function delete($id)
    {
        $jurusanModel = new JurusanModel();

        $jurusan = $jurusanModel->find($id);
        if (!$jurusan) {
            return redirect()->to('/major')->with('error', 'Data Jurusan tidak ditemukan.');
        }

        $jurusanModel->delete($id);

        return redirect()->to('/major')->with('success', 'Data jurusan berhasil dihapus!');
    }
}
