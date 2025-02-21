<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function login()
    {
        $adminModel = new \App\Models\AdminModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $adminModel->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            // Password benar, lanjutkan login
            session()->set('admin_id', $admin['id_admin']);
            return redirect()->to('/admin/dashboard')->with('success', 'Login berhasil!');
        } else {
            return redirect()->back()->with('error', 'Username atau password salah.');
        }
    }


    public function register()
    {
        $adminModel = new \App\Models\AdminModel();

        $password = $this->request->getPost('password');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash password sebelum disimpan

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $hashedPassword // Simpan hash password
        ];

        if ($adminModel->insert($data)) {
            return redirect()->to('/admin/login')->with('success', 'Registrasi berhasil, silakan login.');
        } else {
            return redirect()->back()->with('error', 'Registrasi gagal, coba lagi.');
        }
    }
}
