<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiswaModel;
use DateTime;

class SiswaController extends Controller
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function showSiswaPKL()
    {
        $this->siswaModel->select("
        TANGGAL as TGL_DAFTAR, 
        ID_PKL as ID,
        NM_SISWA, 
        JENIS_PKL, 
        LEMBAGA, 
        JURUSAN, 
        DIVISI, 
        BAGIAN, 
        tanggal_mulai_fix, 
        tgl_akhir_fix, 
        NAMA_PEMB,
        (CASE 
            WHEN tanggal_mulai_fix > CURDATE() THEN 'Belum Mulai'
            WHEN tanggal_mulai_fix <= CURDATE() AND tgl_akhir_fix >= CURDATE() THEN 'Aktif'
            ELSE 'Sudah Selesai'
        END) as STATUS
    ")->where('JENIS_PKL', 'PKL');

        //ambil inputan filter
        $nama_siswa = $this->request->getGet('nama_siswa');
        $lembaga = $this->request->getGet('lembaga');
        $jurusan = $this->request->getGet('jurusan');
        $divisi = $this->request->getGet('divisi');
        $bagian = $this->request->getGet('bagian');
        $pembimbing = $this->request->getGet('pembimbing');
        $status = $this->request->getGet('status');
        $tanggal_awal = $this->request->getGet('tanggal_mulai_fix');
        $tanggal_akhir = $this->request->getGet('tgl_akhir_fix');
        $tanggal_daftar = $this->request->getGet('tanggal_daftar');

        //filter sesuai dari inputan
        if (!empty($nama_siswa)) {
            $this->siswaModel->like('NM_SISWA', $nama_siswa);
        }
        if (!empty($lembaga)) {
            $this->siswaModel->like('LEMBAGA', $lembaga);
        }
        if (!empty($jurusan)) {
            $this->siswaModel->like('JURUSAN', $jurusan);
        }
        if (!empty($divisi)) {
            $this->siswaModel->like('DIVISI', $divisi);
        }
        if (!empty($bagian)) {
            $this->siswaModel->like('BAGIAN', $bagian);
        }
        if (!empty($status)) {
            $this->siswaModel->having('STATUS', $status);
        }
        if (!empty($pembimbing)) {
            $this->siswaModel->like('NAMA_PEMB', $pembimbing);
        }

        if (!empty($tanggal_awal)) {
            $this->siswaModel->where("DATE(tanggal_mulai_fix) ", $tanggal_awal);
        }
        if (!empty($tanggal_akhir)) {
            $this->siswaModel->where("DATE(tgl_akhir_fix) ", $tanggal_akhir);
        }
        if (!empty($tanggal_daftar)) {
            $this->siswaModel->where("DATE(TANGGAL)", $tanggal_daftar);
        }

        $data = [
            'datasiswa' => $this->siswaModel->paginate(10),
            'pager' => $this->siswaModel->pager,
            'currentPage' => $this->request->getVar('page') ?? 1
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
            'tanggal_mulai_fix' => $this->request->getPost('tanggal_mulai_fix'),
            'tgl_akhir_fix' => $this->request->getPost('tgl_akhir_fix'),
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

        $siswa['tanggal_mulai_fix'] = date('Y-m-d', strtotime($siswa['tanggal_mulai_fix']));
        $siswa['tgl_akhir_fix'] = date('Y-m-d', strtotime($siswa['tgl_akhir_fix']));

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
            'tanggal_mulai_fix' => $this->request->getPost('tanggal_mulai_fix'),
            'tgl_akhir_fix' => $this->request->getPost('tgl_akhir_fix'),
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
        $this->siswaModel->select("
        TANGGAL as TGL_DAFTAR, 
        ID_PKL as ID,
        NM_SISWA, 
        JENIS_PKL, 
        LEMBAGA, 
        JURUSAN, 
        DIVISI, 
        BAGIAN, 
        tanggal_mulai_fix, 
        tgl_akhir_fix, 
        NAMA_PEMB,
        (CASE 
            WHEN tanggal_mulai_fix > CURDATE() THEN 'Belum Mulai'
            WHEN tanggal_mulai_fix <= CURDATE() AND tgl_akhir_fix >= CURDATE() THEN 'Aktif'
            ELSE 'Sudah Selesai'
        END) as STATUS
    ")->where('JENIS_PKL', 'RISET');

        // Ambil input filter
        $nama_siswa     = $this->request->getGet('nama_siswa');
        $lembaga        = $this->request->getGet('lembaga');
        $jurusan        = $this->request->getGet('jurusan');
        $divisi         = $this->request->getGet('divisi');
        $bagian         = $this->request->getGet('bagian');
        $pembimbing     = $this->request->getGet('pembimbing');
        $status         = $this->request->getGet('status');
        $tanggal_awal   = $this->request->getGet('tanggal_mulai');
        $tanggal_akhir  = $this->request->getGet('tanggal_akhir');
        $tanggal_daftar = $this->request->getGet('tanggal_daftar');

        // Apply filter sesuai input
        if (!empty($nama_siswa)) {
            $this->siswaModel->like('NM_SISWA', $nama_siswa);
        }
        if (!empty($lembaga)) {
            $this->siswaModel->like('LEMBAGA', $lembaga);
        }
        if (!empty($jurusan)) {
            $this->siswaModel->like('JURUSAN', $jurusan);
        }
        if (!empty($divisi)) {
            $this->siswaModel->like('DIVISI', $divisi);
        }
        if (!empty($bagian)) {
            $this->siswaModel->like('BAGIAN', $bagian);
        }
        if (!empty($pembimbing)) {
            $this->siswaModel->like('NAMA_PEMB', $pembimbing);        
        }
        if (!empty($status)) {
            $this->siswaModel->having('STATUS', $status);
        }
        if (!empty($tanggal_awal)) {
            $this->siswaModel->where("DATE(tanggal_mulai_fix) ", $tanggal_awal);
        }
        if (!empty($tanggal_akhir)) {
            $this->siswaModel->where("DATE(tgl_akhir_fix) ", $tanggal_akhir);
        }
        if (!empty($tanggal_daftar)) {
            $this->siswaModel->where("DATE(TANGGAL)", $tanggal_daftar);
        }

        $data = [
            'datasiswa' => $this->siswaModel->paginate(10),
            'pager' => $this->siswaModel->pager,
            'currentPage' => $this->request->getVar('page') ?? 1
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
            'tanggal_mulai_fix' => $this->request->getPost('tanggal_mulai_fix'),
            'tgl_akhir_fix' => $this->request->getPost('tgl_akhir_fix'),
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

        $siswa['tanggal_mulai_fix'] = date('Y-m-d', strtotime($siswa['tanggal_mulai_fix']));
        $siswa['tgl_akhir_fix'] = date('Y-m-d', strtotime($siswa['tgl_akhir_fix']));

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
            'tanggal_mulai_fix' => $this->request->getPost('tanggal_mulai_fix'),
            'tgl_akhir_fix' => $this->request->getPost('tgl_akhir_fix'),
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
