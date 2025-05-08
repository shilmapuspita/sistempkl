<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminController extends BaseController
{
    protected $adminModel;
    protected $session;
 
    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->session = session();
    }

    public function index()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $data = [
            'title' => 'Dashboard',
            'currentPage' => 'dashboard',
            'username' => $this->session->get('admin_username')
        ];

        return view('admin/dashboard', $data);
    }

    public function register()
    {
        return view('admin/register', [
            'title' => 'Register',
            'currentPage' => 'register'
        ]);
    }

    public function processRegister()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|is_unique[admin.username]',
            'password' => 'required|min_length[6]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('admin/register')->withInput()->with('errors', $validation->getErrors());
        }

        $this->adminModel->insert([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function login()
    {
        if ($this->session->get('logged_in')) {
            return redirect()->to('/admin/dashboard');
        }

        return view('admin/login', [
            'title' => 'Login',
            'currentPage' => 'login'
        ]);
    }


    public function processLogin()
    {
        // Pastikan pengguna belum login
        if ($this->session->get('logged_in')) {
            return redirect()->to('/admin/dashboard');
        }

        // Validasi input
        $validationRules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/login')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Cari user berdasarkan username
        $admin = $this->adminModel->where('username', $this->request->getPost('username'))->first();

        if (!$admin) {
            return redirect()->to('/login')->with('error', 'Username tidak ditemukan.');
        }

        // Verifikasi password
        if (!password_verify($this->request->getPost('password'), $admin['password'])) {
            return redirect()->to('/login')->with('error', 'Password salah.');
        }

        // Pastikan email & foto diambil dari database dengan benar
        $email = isset($admin['email']) ? $admin['email'] : 'admin@example.com';
        $foto  = isset($admin['foto']) && !empty($admin['foto']) ? $admin['foto'] : 'default.jpg';

        // Set session
        $this->session->set([
            'admin_id'  => $admin['id_admin'],
            'username'  => $admin['username'],
            'email'     => $email,
            'foto'      => $foto,
            'logged_in' => true
        ]);

        // Set flashdata sukses
        session()->setFlashdata('success', 'Selamat datang, ' . $admin['username'] . '!');

        return redirect()->to('/admin/dashboard')->with('success', 'Selamat datang, ' . $admin['username'] . '!');
    }

    public function logout()
    {
        session()->setFlashdata('success', 'Anda telah logout.');
        session()->destroy();
        return redirect()->to('/login');
    }

    public function profile()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil data admin dari database berdasarkan ID sesi
        $admin = $this->adminModel->getAdminById($this->session->get('admin_id'));

        return view('admin/profile', [
            'title'       => 'Profile',
            'currentPage' => 'profile',
            'admin'       => $admin,
        ]);
    }


    public function editProfile()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $admin = $this->adminModel->find($this->session->get('admin_id'));

        return view('admin/edit_profile', [
            'title'       => 'Edit Profile',
            'currentPage' => 'edit_profile',
            'admin'       => $admin
        ]);
    }

    public function updateProfile()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $id = $this->session->get('admin_id');

        // Validasi input
        $validationRules = [
            'username' => 'required|min_length[3]',
            'email'    => 'required|valid_email',
            'foto'     => 'permit_empty|is_image[foto]|max_size[foto,2048]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data admin dari database
        $admin = $this->adminModel->find($id);
        if (!$admin) {
            return redirect()->back()->with('error', 'Data admin tidak ditemukan.');
        }

        // Data yang akan diperbarui
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
        ];

        // Update password jika ada input baru
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        // Upload Foto Profil Baru
        $foto = $this->request->getFile('foto');
        $uploadPath = 'uploads/profile_pictures/';

        // Pastikan folder ada
        if (!is_dir(FCPATH . $uploadPath)) {
            mkdir(FCPATH . $uploadPath, 0777, true);
        }

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Hapus foto lama jika bukan default.jpg
            if (!empty($admin['foto']) && $admin['foto'] !== 'default.jpg') {
                $oldFotoPath = FCPATH . $uploadPath . $admin['foto'];
                if (is_file($oldFotoPath)) {
                    unlink($oldFotoPath);
                }
            }

            // Simpan foto baru
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . $uploadPath, $newName);
            $data['foto'] = $newName;
        }

        // Update database
        $this->adminModel->update($id, $data);

        // Ambil ulang data setelah update
        $updatedAdmin = $this->adminModel->find($id);

        // Perbarui session dengan data terbaru
        $this->session->set([
            'username' => $updatedAdmin['username'],
            'email'    => $updatedAdmin['email'],
            'foto'     => !empty($updatedAdmin['foto']) ? $updatedAdmin['foto'] : 'default.jpg',
            'logged_in' => true
        ]);

        return redirect()->to('admin/profile')->with('success', 'Profil berhasil diperbarui!');
    }
}