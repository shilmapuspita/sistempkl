<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiswaModel;

    class SiswaController extends Controller
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    // =================== Siswa PKL =================== //

    public function showSiswaPKL()
    {
        $data = [
            'datasiswa' => $this->siswaModel->where('JENIS_PKL', 'PKL')->paginate(10),
            'pager' => $this->siswaModel->pager,
            'currentPage' => 'siswaPKL'
        ];

        return view('admin/siswa/PKL/siswaPKL', $data);
    }

    public function createSiswaPKL()
    {
        
        $data = [
            'title' => 'Tambah Siswa PKL',
            'currentPage' => 'siswaPKL',
        ];

        return view('admin/siswa/PKL/create', $data);
    }

    public function storeSiswaPKL()
    {
        $data = [
            'ID_PKL' => $this->request->getPost('ID_PKL'),
            'NM_SISWA' => strtoupper($this->request->getPost('NM_SISWA')),
            'TANGGAL' => $this->request->getPost('TANGGAL'),
            'JENIS_PKL' => 'PKL',
            'LEMBAGA' => strtoupper($this->request->getPost('LEMBAGA')),
            'JURUSAN' => strtoupper($this->request->getPost('JURUSAN')),
            'DIVISI' => strtoupper($this->request->getPost('DIVISI')),
            'BAGIAN' => strtoupper($this->request->getPost('BAGIAN')),
            'TGL_AWAL' => $this->request->getPost('TGL_AWAL'),
            'TGL_AKHIR' => $this->request->getPost('TGL_AKHIR'),
            'NAMA_PEMB' => strtoupper($this->request->getPost('NAMA_PEMB')),
        ];

        $this->siswaModel->insert($data);
        session()->setFlashdata('success', 'Data siswa PKL berhasil ditambahkan!');
        return redirect()->to(base_url('siswaPKL'));
    }

    public function editSiswaPKL($id)
    {
        $siswa = $this->siswaModel->find($id);

        if (!$siswa) {
            return redirect()->to(base_url('siswaPKL'))->with('error', 'Data tidak ditemukan!');
        }

        $siswa['TGL_AWAL'] = date('Y-m-d', strtotime($siswa['TGL_AWAL']));
        $siswa['TGL_AKHIR'] = date('Y-m-d', strtotime($siswa['TGL_AKHIR']));
        
        return view('admin/siswa/PKL/edit', ['siswa' => $siswa]);
    }

    public function updateSiswaPKL($id)
    {
        if (!$this->siswaModel->find($id)) {
            return redirect()->to(base_url('siswaPKL'))->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'NM_SISWA' => strtoupper($this->request->getPost('NM_SISWA')),
            'TANGGAL' => $this->request->getPost('TANGGAL'),
            'LEMBAGA' => strtoupper($this->request->getPost('LEMBAGA')),
            'JURUSAN' => strtoupper($this->request->getPost('JURUSAN')),
            'DIVISI' => strtoupper($this->request->getPost('DIVISI')),
            'BAGIAN' => strtoupper($this->request->getPost('BAGIAN')),
            'TGL_AWAL' => $this->request->getPost('TGL_AWAL'),
            'TGL_AKHIR' => $this->request->getPost('TGL_AKHIR'),
            'NAMA_PEMB' => strtoupper($this->request->getPost('NAMA_PEMB')),
        ];

        $this->siswaModel->update($id, $data);
        session()->setFlashdata('success', 'Data siswa PKL berhasil diperbarui!');
        return redirect()->to(base_url('siswaPKL'));
    }

    public function deleteSiswaPKL($id)
    {
        if (!$this->siswaModel->find($id)) {
            return redirect()->to(base_url('siswaPKL'))->with('error', 'Data tidak ditemukan.');
        }

        $this->siswaModel->delete($id);
        session()->setFlashdata('success', 'Data siswa PKL berhasil dihapus!');
        return redirect()->to(base_url('siswaPKL'));
    }

    // =================== Siswa Riset =================== //

    public function showSiswaRiset()
    {
        $data = [
            'datasiswa' => $this->siswaModel->where('JENIS_PKL', 'RISET')->paginate(10),
            'pager' => $this->siswaModel->pager,
            'currentPage' => 'siswaRiset'
        ];

        return view('admin/siswa/Riset/siswaRiset', $data);
    }

    public function createSiswaRiset()
    {
        $data = [
            'title' => 'Tambah Siswa Riset',
            'currentPage' => 'siswaRiset',
        ];

        return view('admin/siswa/Riset/create', $data);
    }

    public function storeSiswaRiset()
    {
        $data = [
            'ID_PKL' => $this->request->getPost('ID_PKL'),
            'NM_SISWA' => strtoupper($this->request->getPost('NM_SISWA')),
            'TANGGAL' => $this->request->getPost('TANGGAL'),
            'JENIS_PKL' => 'RISET',
            'LEMBAGA' => strtoupper($this->request->getPost('LEMBAGA')),
            'JURUSAN' => strtoupper($this->request->getPost('JURUSAN')),
            'DIVISI' => strtoupper($this->request->getPost('DIVISI')),
            'BAGIAN' => strtoupper($this->request->getPost('BAGIAN')),
            'TGL_AWAL' => $this->request->getPost('TGL_AWAL'),
            'TGL_AKHIR' => $this->request->getPost('TGL_AKHIR'),
            'NAMA_PEMB' => strtoupper($this->request->getPost('NAMA_PEMB')),
        ];

        $this->siswaModel->insert($data);
        session()->setFlashdata('success', 'Data siswa riset berhasil ditambahkan!');
        return redirect()->to(base_url('siswaRiset'));

    }

    public function editSiswaRiset($id)
    {
        $siswa = $this->siswaModel->find($id);

        if (!$siswa) {
            return redirect()->to(base_url('siswaRiset'))->with('error', 'Data tidak ditemukan!');
        }

        $siswa['TGL_AWAL'] = date('Y-m-d', strtotime($siswa['TGL_AWAL']));
        $siswa['TGL_AKHIR'] = date('Y-m-d', strtotime($siswa['TGL_AKHIR']));

        return view('admin/siswa/Riset/edit', ['siswa' => $siswa]);
    }

    public function updateSiswaRiset($id)
    {
        if (!$this->siswaModel->find($id)) {
            return redirect()->to(base_url('siswaRiset'))->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'NM_SISWA' => strtoupper($this->request->getPost('NM_SISWA')),
            'TANGGAL' => $this->request->getPost('TANGGAL'),
            'LEMBAGA' => strtoupper($this->request->getPost('LEMBAGA')),
            'JURUSAN' => strtoupper($this->request->getPost('JURUSAN')),
            'DIVISI' => strtoupper($this->request->getPost('DIVISI')),
            'BAGIAN' => strtoupper($this->request->getPost('BAGIAN')),
            'TGL_AWAL' => $this->request->getPost('TGL_AWAL'),
            'TGL_AKHIR' => $this->request->getPost('TGL_AKHIR'),
            'NAMA_PEMB' => strtoupper($this->request->getPost('NAMA_PEMB')),
        ];

        $this->siswaModel->update($id, $data);
        session()->setFlashdata('success', 'Data siswa riset berhasil diperbarui!');
        return redirect()->to(base_url('siswaRiset'));
    }

    public function deleteSiswaRiset($id)
    {
        if (!$this->siswaModel->find($id)) {
            return redirect()->to(base_url('siswaRiset'))->with('error', 'Data tidak ditemukan.');
        }

        $this->siswaModel->delete($id);
        session()->setFlashdata('success', 'Data siswa riset berhasil dihapus!');
        return redirect()->to(base_url('siswaRiset'));
    }
}