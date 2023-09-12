<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel; // Import model UserModel

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {
        // Validasi token CSRF
        if ($this->request->getPost('csrf_test_name') !== csrf_hash()) {
            // Token CSRF tidak valid, lakukan sesuatu (misalnya, tampilkan pesan kesalahan)
            return redirect()->to('/error');
        }
        // Import UserModel dan buat instance
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // Autentikasi berhasil, set session dan alihkan ke halaman beranda
            session()->set('logged_in', true);
            return redirect()->to('/dashboard');
        } else {
            // Autentikasi gagal, kembali ke halaman login dengan pesan error
            return redirect()->to('/login')->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        // Hapus sesi (session) pengguna
        session()->destroy();

        // Alihkan pengguna ke halaman login atau halaman lain yang sesuai
        return redirect()->to('/login')->with('success', 'Anda telah berhasil keluar.');
    }
}
