<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JurusanModel;

class MajorController extends Controller
{

    public function showJurusan()
    {
        $model = new JurusanModel();
        $data = [
            'jurusan' => $model->getPaginateData(10),
            'pager' => $model->pager,
            'currentPage' => 'major'
        ];

        return view('admin/major/major', $data);
    }


    public function create()
    {
        $data = [
            'title' => 'Tambah Jurusan',
            'currentPage' => 'major',
        ];

        return view('admin/major/create', $data);
    }

    public function store()
    {
        $validation = $this->validate([
            'nama_jurusan'          => 'required',
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
            'jurusan' => $jurusan,
            'title' => 'Tambah Jurusan',
            'currentPage' => 'major',
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
