<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Anda dapat menambahkan logika lain yang diperlukan di sini
        return view('dashboard');
    }
    public function datauser()
    {
        $model = new UserModel(); // Gantilah dengan model yang sesuai
        $data['users'] = $model->findAll(); // Mengambil semua data pengguna
        // echo var_dump($data['users']);
        return view('data_user', $data); // Menampilkan tampilan data_user.php dengan data pengguna
    }
    public function kalender()
    {
        return view('kalender'); // Menampilkan tampilan data_user.php dengan data pengguna
    }
    public function pengaturan()
    {
        return view('pengaturan'); // Menampilkan tampilan data_user.php dengan data pengguna
    }

    public function add()
    {
        // Validasi token CSRF
        if ($this->request->getPost('csrf_test_name') !== csrf_hash()) {
            // Token CSRF tidak valid, lakukan sesuatu (misalnya, tampilkan pesan kesalahan)
            return redirect()->to('/error');
        }

        // Validasi form lainnya jika diperlukan

        $model = new UserModel(); // Gantilah dengan model yang sesuai

        $password = $this->request->getPost('password');

        // Enkripsi password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $hashedPassword, // Simpan password terenkripsi
            'email' => $this->request->getPost('email')
            // Tambahkan kolom lain yang diperlukan
        ];

        $model->insert($data);

        return redirect()->to('/datauser')->with('success', 'Data pengguna berhasil ditambahkan.');
    }
}
