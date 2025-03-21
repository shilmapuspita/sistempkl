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
        $query = $this->siswaModel->select("
        TANGGAL as TGL_DAFTAR, 
        ID_PKL as ID,
        NM_SISWA, 
        JENIS_PKL, 
        LEMBAGA, 
        JURUSAN, 
        DIVISI, 
        BAGIAN, 
        TGL_AWAL as TGL_MULAI, 
        TGL_AKHIR, 
        NAMA_PEMB,
        (CASE 
            WHEN TGL_AWAL > CURDATE() THEN 'Belum Mulai'
            WHEN TGL_AWAL <= CURDATE() AND TGL_AKHIR >= CURDATE() THEN 'Aktif'
            ELSE 'Sudah Selesai'
        END) as STATUS
    ")->where('JENIS_PKL', 'PKL');

        // Ambil data dari GET
        $nama_siswa = $this->request->getGet('nama_siswa');
        $lembaga = $this->request->getGet('lembaga');
        $jurusan = $this->request->getGet('jurusan');
        $divisi = $this->request->getGet('divisi');
        $bagian = $this->request->getGet('bagian');
        $pembimbing = $this->request->getGet('pembimbing');
        $status = $this->request->getGet('status');
        $tanggal_awal = $this->request->getGet('tanggal_mulai');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');
        $tanggal_daftar = $this->request->getGet('tanggal_daftar');

        // Tambahkan filter ke query jika ada input
        if (!empty($nama_siswa)) {
            $query->like('NM_SISWA', $nama_siswa);
        }
        if (!empty($lembaga)) {
            $query->where('LEMBAGA', $lembaga);
        }
        if (!empty($jurusan)) {
            $query->where('JURUSAN', $jurusan);
        }
        if (!empty($divisi)) {
            $query->where('DIVISI', $divisi);
        }
        if (!empty($bagian)) {
            $query->where('BAGIAN', $bagian);
        }
        if (!empty($status)) {
            $query->having('STATUS', $status); 
        }
        if (!empty($pembimbing)) {
            $query->where('NAMA_PEMB', $pembimbing);
        }
        if (!empty($tanggal_awal)) {
            $query->where("DATE(STR_TO_DATE(TGL_AWAL, '%d %M %Y')) >=", "DATE(STR_TO_DATE('$tanggal_awal', '%Y-%m-%d'))");
        }
        if (!empty($tanggal_akhir)) {
            $query->where("DATE(STR_TO_DATE(TGL_AKHIR, '%d %M %Y')) <=", "DATE(STR_TO_DATE('$tanggal_akhir', '%Y-%m-%d'))");
        }
        if (!empty($tanggal_daftar)) {
            $query->where("DATE(TANGGAL) >=", "DATE('$tanggal_daftar')");
        }        

        $data = [
            'datasiswa' => $query->paginate(10),
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
        return redirect()->to(base_url('siswa/PKL'));
    }

    public function editSiswaPKL($id)
    {
        $siswa = $this->siswaModel->find($id);

        if (!$siswa) {
            return redirect()->to(base_url('siswaPKL'))->with('error', 'Data tidak ditemukan!');
        }

        $siswa['TGL_AWAL'] = date('Y-m-d', strtotime($siswa['TGL_AWAL']));
        $siswa['TGL_AKHIR'] = date('Y-m-d', strtotime($siswa['TGL_AKHIR']));

        $data = [
            'siswa' => $siswa,
            'currentPage' => 'siswaPKL'
        ];

        return view('admin/siswa/PKL/edit', $data);
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
        return redirect()->to(base_url('siswa/PKL'));
    }

    public function deleteSiswaPKL($id)
    {
        if (!$this->siswaModel->find($id)) {
            return redirect()->to(base_url('siswaPKL'))->with('error', 'Data tidak ditemukan.');
        }

        $this->siswaModel->delete($id);
        session()->setFlashdata('success', 'Data siswa PKL berhasil dihapus!');
        return redirect()->to(base_url('siswa/PKL'));
    }

    // =================== Siswa Riset =================== //

    public function showSiswaRiset()
    {
        $model = new SiswaModel();
        $data = [
            'datasiswa' => $model->getFilteredData(10, 'RISET'),
            'pager' => $model->pager,
            'currentPage' => 'siswaRiset'
        ];

        return view('admin/siswa/riset/siswaRiset', $data);
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
        return redirect()->to(base_url('siswa/riset'));
    }

    public function editSiswaRiset($id)
    {
        $siswa = $this->siswaModel->find($id);

        if (!$siswa) {
            return redirect()->to(base_url('siswaRiset'))->with('error', 'Data tidak ditemukan!');
        }

        $siswa['TGL_AWAL'] = date('Y-m-d', strtotime($siswa['TGL_AWAL']));
        $siswa['TGL_AKHIR'] = date('Y-m-d', strtotime($siswa['TGL_AKHIR']));

        $data = [
            'siswa' => $siswa,
            'currentPage' => 'siswaRiset'
        ];

        return view('admin/siswa/Riset/edit', $data);
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
        return redirect()->to(base_url('siswa/riset'));
    }

    public function deleteSiswaRiset($id)
    {
        if (!$this->siswaModel->find($id)) {
            return redirect()->to(base_url('siswaRiset'))->with('error', 'Data tidak ditemukan.');
        }

        $this->siswaModel->delete($id);
        session()->setFlashdata('success', 'Data siswa riset berhasil dihapus!');
        return redirect()->to(base_url('siswa/riset'));
    }
}
