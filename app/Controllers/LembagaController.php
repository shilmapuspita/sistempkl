<?php

namespace App\Controllers;

use App\Models\LembagaModel;

class LembagaController extends BaseController
{
    protected $lembagaModel;

    public function __construct()
    {
        $this->lembagaModel = new LembagaModel();
    }

    public function showLembaga()
    {
        $data = [
            'currentPage' => 'lembaga',
            'lembaga' => $this->lembagaModel->paginate(10),
            'pager' => $this->lembagaModel->pager
        ];

        return view('admin/lembaga/lembaga', $data);
    }

    public function create()
    {
        return view('admin/lembaga/create', ['currentPage' => 'lembaga']);
    }

    public function store()
    {
        $rules = [
            'nama_lembaga' => 'required',
            'alamat' => 'required',
            'kontak' => 'required|numeric',
            'email' => 'required|valid_email'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'NAMA_LEMBAGA' => esc($this->request->getPost('nama_lembaga')),
            'ALAMAT_LEMBAGA' => esc($this->request->getPost('alamat')),
            'TELP_LEMBAGA' => esc($this->request->getPost('kontak')),
            'EMAIL_LEMBAGA' => esc($this->request->getPost('email')),
        ];

        $this->lembagaModel->insert($data);

        return redirect()->to('/lembaga')->with('success', 'Data institusi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $lembaga = $this->lembagaModel->find($id);

        if (!$lembaga) {
            return redirect()->to('/lembaga')->with('error', 'Data tidak ditemukan.');
        }

        return view('admin/lembaga/edit', ['lembaga' => $lembaga, 'currentPage' => 'lembaga']);
    }

    public function update($id)
    {
        $rules = [
            'nama_lembaga' => 'required',
            'alamat' => 'required',
            'kontak' => 'required|numeric',
            'email' => 'required|valid_email'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'NAMA_LEMBAGA' => esc($this->request->getPost('nama_lembaga')),
            'ALAMAT_LEMBAGA' => esc($this->request->getPost('alamat')),
            'TELP_LEMBAGA' => esc($this->request->getPost('kontak')),
            'EMAIL_LEMBAGA' => esc($this->request->getPost('email')),
        ];

        $this->lembagaModel->update($id, $data);

        return redirect()->to('/lembaga')->with('success', 'Data lembaga berhasil diubah!');
    }

    public function delete($id)
    {
        $lembaga = $this->lembagaModel->find($id);
        if (!$lembaga) {
            return redirect()->to('/lembaga')->with('error', 'Data lembaga tidak ditemukan.');
        }

        $this->lembagaModel->delete($id);

        return redirect()->to('/lembaga')->with('success', 'Data lembaga berhasil dihapus!');
    }
}
