<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MentorModel;

class MentorController extends BaseController
{
    public function showMentor()
    {
        $model = new MentorModel();
        $data = [
            'pembimbing' => $model->getPaginateData(10),
            'pager' => $model->pager
        ];

        return view('admin/mentor/mentor', $data);
    }

    public function create()
    {
        return view('admin/mentor/create');
    }

    public function store()
    {
        $validation = $this->validate([
            'nip'          => 'required|numeric',
            'nama'         => 'required',
            'divisi'       => 'required',
            'bagian'       => 'required',
            'nip_atasan'   => 'required|numeric',
            'nama_atasan'  => 'required',
            'nama_jabatan' => 'required',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'NIP'          => $this->request->getPost('nip'),
            'NAMA'         => $this->request->getPost('nama'),
            'DIVISI'       => $this->request->getPost('divisi'),
            'BAGIAN'       => $this->request->getPost('bagian'),
            'NIP_ATASAN'   => $this->request->getPost('nip_atasan'),
            'NAMA_ATASAN'  => $this->request->getPost('nama_atasan'),
            'NAMA_JABATAN' => $this->request->getPost('nama_jabatan'),
        ];

        $mentorModel = new MentorModel();
        $mentorModel->insert($data);

        return redirect()->to('/mentor')->with('success', 'Data mentor berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mentorModel = new MentorModel();
        $mentor = $mentorModel->find($id);

        if (!$mentor) {
            return redirect()->to('/mentor')->with('errors', 'Data mentor tidak ditemukan.');
        }

        $data = [
            'mentor' => $mentor
        ];

        return view('admin/mentor/edit', $data);
    }

    public function update($id)
    {
        $validation = $this->validate([
            'nip'        => 'required|numeric',
            'nama'       => 'required',
            'divisi'     => 'required',
            'bagian'     => 'required',
            'nip_atasan' => 'required|numeric',
            'nama_atasan' => 'required',
            'nama_jabatan' => 'required',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $mentorModel = new MentorModel();
        $mentorModel->update($id, [
            'NIP'          => $this->request->getPost('nip'),
            'NAMA'         => $this->request->getPost('nama'),
            'DIVISI'       => $this->request->getPost('divisi'),
            'BAGIAN'       => $this->request->getPost('bagian'),
            'NIP_ATASAN'   => $this->request->getPost('nip_atasan'),
            'NAMA_ATASAN'  => $this->request->getPost('nama_atasan'),
            'NAMA_JABATAN' => $this->request->getPost('nama_jabatan'),
        ]);

        return redirect()->to('/mentor')->with('success', 'Data mentor berhasil diubah!');
    }

    public function delete($id)
    {
        $mentorModel = new MentorModel();

        $mentor = $mentorModel->find($id);
        if (!$mentor) {
            return redirect()->to('/mentor')->with('error', 'Data mentor tidak ditemukan.');
        }

        $mentorModel->delete($id);

        return redirect()->to('/mentor')->with('success', 'Data mentor berhasil dihapus!');
    }
}
