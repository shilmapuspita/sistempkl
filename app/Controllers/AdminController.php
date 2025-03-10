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
            return redirect()->to('/register')->withInput()->with('errors', $validation->getErrors());
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
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (!$username || !$password) {
            return redirect()->to('/login')->with('error', 'Username dan password wajib diisi.');
        }

        // Cari user berdasarkan username
        $admin = $this->adminModel->where('username', $username)->first();

        if (!$admin) {
            return redirect()->to('/login')->with('error', 'Username tidak ditemukan.');
        }

        // Verifikasi password
        if (!password_verify($password, $admin['password'])) {
            return redirect()->to('/login')->with('error', 'Password salah.');
        }

        // Ambil foto profil atau gunakan default
        $profilePicture = !empty($admin['profile_picture']) ? $admin['profile_picture'] : 'default.jpg';

        // Set session dengan foto profil
        session()->set([
            'admin_id'       => $admin['id_admin'],
            'username'       => $admin['username'],
            'profile_picture' => $profilePicture, // Simpan foto di session
            'logged_in'      => true
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
        'foto'     => 'permit_empty|is_image[foto]|max_size[foto,2048]',
        'password' => 'permit_empty|min_length[6]',
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Ambil data admin
    $admin = $this->adminModel->find($id);
    if (!$admin) {
        return redirect()->back()->with('error', 'Data admin tidak ditemukan.');
    }

    // Siapkan data yang akan diperbarui
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
    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $uploadPath = 'uploads/profile_pictures/'; // Pastikan folder ini ada di public/

        // Hapus foto lama jika ada dan bukan default.jpg
        $oldFoto = isset($admin['foto']) ? $admin['foto'] : 'default.jpg';
        if ($oldFoto !== 'default.jpg' && file_exists(FCPATH . $uploadPath . $oldFoto)) {
            unlink(FCPATH . $uploadPath . $oldFoto);
        }

        // Simpan foto baru
        $newName = $foto->getRandomName();
        $foto->move(FCPATH . $uploadPath, $newName);
        $data['foto'] = $newName;
    } else {
        // Pakai foto lama atau default.jpg
        $data['foto'] = isset($admin['foto']) && !empty($admin['foto']) ? $admin['foto'] : 'default.jpg';
    }

    // Update database
    $this->adminModel->update($id, $data);

    // Perbarui session dengan gambar default jika kosong
    $this->session->set([
        'username' => $data['username'],
        'email'    => $data['email'],
        'foto'     => isset($data['foto']) && !empty($data['foto']) ? $data['foto'] : 'default.jpg',
    ]);

    return redirect()->to('admin/edit_profile')->with('success', 'Profil berhasil diperbarui!');
}
}