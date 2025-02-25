<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LembagaModel;

class LembagaController extends Controller
{
    public function showLembaga()
    {
        $model = new LembagaModel();
        $data = [
            'lembaga' => $model->getPaginateData(10), // Ambil semua data dari tabel lembaga
            'pager' => $model->pager
        ];

        return view('admin/lembaga/lembaga', $data); // Kirim data ke view
    }

    public function create()
    {
        return view('admin/lembaga/create');
    }

    public function store()
    {
        $validation = $this->validate([
            'nama_lembaga'          => 'required',
            'alamat'         => 'required',
            'kontak'       => 'required|numeric',
            'email'       => 'required',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'NAMA_LEMBAGA'          => $this->request->getPost('nama_lembaga'),
            'ALAMAT_LEMBAGA'         => $this->request->getPost('alamat'),
            'TELP_LEMBAGA'       => $this->request->getPost('kontak'),
            'EMAIL_LEMBAGA'       => $this->request->getPost('email'),
        ];

        $lembagaModel = new LembagaModel();
        $lembagaModel->insert($data);

        return redirect()->to('/lembaga')->with('success', 'Data institusi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $lembagaModel = new LembagaModel();
        $lembaga = $lembagaModel->find($id);

        if (!$lembaga) {
            return redirect()->to('/lembaga')->with('errors', 'Data tidak ditemukan.');
        }

        return view('admin/lembaga/edit', ['lembaga' => $lembaga]);
    }


    public function update($id)
    {
        $validation = $this->validate([
            'nama_lembaga'          => 'required',
            'alamat'         => 'required',
            'kontak'       => 'required',
            'email'       => 'required',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $lembagaModel = new LembagaModel();
        $lembagaModel->update($id, [
            'NAMA_LEMBAGA'          => $this->request->getPost('nama_lembaga'),
            'ALAMAT_LEMBAGA'         => $this->request->getPost('alamat'),
            'TELP_LEMBAGA'       => $this->request->getPost('kontak'),
            'EMAIL_LEMBAGA'       => $this->request->getPost('email'),
        ]);

        return redirect()->to('/lembaga')->with('success', 'Data lembaga berhasil diubah!');
    }

    public function delete($id)
    {
        $lembagaModel = new LembagaModel();

        $lembaga = $lembagaModel->find($id);
        if (!$lembaga) {
            return redirect()->to('/lembaga')->with('error', 'Data lembaga tidak ditemukan.');
        }

        $lembagaModel->delete($id);

        return redirect()->to('/lembaga')->with('success', 'Data lembaga berhasil dihapus!');
    }
}
