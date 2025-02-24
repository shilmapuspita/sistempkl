<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminController extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function register()
    {
        return view('admin/register');
    }

    public function processRegister()
    {
        $adminModel = new AdminModel();

        $data = [
            'username' => $this->request->getPost('username'),
            // 'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $adminModel->insert($data);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function login()
    {
        return view('admin/login');
    }

    public function processLogin()
    {
        $session = session();
        $adminModel = new AdminModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $adminModel->where('username', $username)->first();

        if ($admin) {
            if (password_verify($password, $admin['password'])) { // Cek hash password
                $session->set([
                    'admin_id' => $admin['id_admin'],
                    'admin_username' => $admin['username'],
                    'logged_in' => true
                ]);
                return redirect()->to('/admin/dashboard');
            } else {
                $session->setFlashdata('error', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }


    public function logout()
    {
        session()->destroy();
        
        return redirect()->to('/');
    }
}
