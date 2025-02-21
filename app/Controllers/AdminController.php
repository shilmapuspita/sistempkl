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
        return view('admin/login');
    }

    public function processRegister()
    {
        $adminModel = new \App\Models\AdminModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $adminModel->insert($data);

        return redirect()->to('/admin/login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
