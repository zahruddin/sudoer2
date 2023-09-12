<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function process()
    {
        // Validasi token CSRF
        if ($this->request->getPost('csrf_test_name') !== csrf_hash()) {
            // Token CSRF tidak valid, lakukan sesuatu (misalnya, tampilkan pesan kesalahan)
            return redirect()->to('/error');
        }
        // Validasi form
        $validation = \Config\Services::validation();
        $validation->setRules([
            // 'username' => 'required|min_length[5]|is_unique[users.username]',
            'username' => 'required',
            // 'password' => 'required|min_length[8]',
            'password' => 'required',
            // 'email'    => 'required|valid_email|is_unique[users.email]',
            'email'    => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembali ke halaman registrasi dengan pesan error
            return redirect()->to('/register')->with('error', $validation->getErrors());
        }

        // Simpan data pengguna ke dalam database
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'email'    => $this->request->getPost('email'),
        ];

        $model->insert($data);

        // Alihkan pengguna ke halaman login
        return redirect()->to('/login')->with('success', 'Pendaftaran berhasil! Silakan masuk.');
    }
}
