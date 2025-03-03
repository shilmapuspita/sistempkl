<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MentorModel;

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

    public function edit($id)
    {
        $mentor = $this->mentorModel->find($id);

        if (!$mentor) {
            session()->setFlashdata('error', 'Data mentor tidak ditemukan.');
            return redirect()->to('/mentor');
        }

        return view('admin/mentor/edit', [
            'mentor' => $mentor,
            'currentPage' => 'mentor'
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

        session()->setFlashdata('success', 'Data mentor berhasil diubah!');
        return redirect()->to('/mentor');
    }

    public function delete($id)
    {
        $mentor = $this->mentorModel->find($id);
        if (!$mentor) {
            session()->setFlashdata('error', 'Data mentor tidak ditemukan.');
            return redirect()->to('/mentor');
        }

        $this->mentorModel->delete($id);

        session()->setFlashdata('success', 'Data mentor berhasil dihapus!');
        return redirect()->to('/mentor');
    }
}