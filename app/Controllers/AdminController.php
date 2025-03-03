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
        $data = [
            'title' => 'Dashboard',
            'currentPage' => 'dashboard'
        ];
        return view('admin/dashboard', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
            'currentPage' => 'register'
        ];
        return view('admin/register', $data);
    }

    public function processRegister()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|is_unique[admin.username]',
            'password' => 'required|min_length[6]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/register')->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan data ke database
        $this->adminModel->insert([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function login()
    {
        $data = [
            'title' => 'Login',
            'currentPage' => 'login'
        ];
        return view('admin/login', $data);
    }

    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validasi input
        if (!$username || !$password) {
            return redirect()->to('/login')->with('error', 'Username dan password wajib diisi.');
        }

        // Cek di database
        $admin = $this->adminModel->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            // Set session login
            $this->session->set([
                'admin_id' => $admin['id_admin'],
                'admin_username' => $admin['username'],
                'logged_in' => true
            ]);

            return redirect()->to('/admin/dashboard')->with('success', 'Login berhasil.');
        } else {
            return redirect()->to('/login')->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah logout.');
    }
}
