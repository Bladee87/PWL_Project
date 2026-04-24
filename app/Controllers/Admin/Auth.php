<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('admin/login');
    }

    public function register(): string
    {
        return view('admin/register'); 
    }

    public function saveLogin(){
        // inisialisasi dan ambil data dari form
        $model = new \App\Models\AdminModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // memberikan Aturan Validasi
        $rules = [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[20]|',
            'password' => 'required|min_length[6]'
        ];

        // memberikan pesan ketika error
        $message = [
            'username' => [
                'required' => 'Username harus diisi.',
                'alpha_numeric_space' => 'Username hanya boleh mengandung huruf, angka, dan spasi.',
                'min_length' => 'Username minimal 3 karakter!',
                'max_length' => 'Username maksimal 20 karakter!'
            ],
            'password' => [
                'required' => 'Password harus diisi.',
                'min_length' => 'Password minimal 6 karakter!'
            ] 
        ];
                
        if(!$this->validate($rules, $message)) {
            // Kembali ke halaman Login dan memberikan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Mencari data berdasarkan username di database
        $admin = $model->where('username', $username)->first();
        if ($admin) {
            // Validasi Password
            if (password_verify($password, $admin['password'])) {
                // Membuat Sesi baru
                $sessionData = [
                    'id_admin' => $admin['id_admin'],
                    'username' => $admin['username'],
                    'isLoggedIn' => true
                ];
                // Menyimpan Sesi
                session()->set($sessionData);
                // Kembali ke halaman Login dan memberikan pesan success
                return redirect()->to('/admin/dashboard')->with('success', 'Login berhasil!');
            } else {
                // Kembali ke halaman Login dan memberikan pesan error
                return redirect()->back()->withInput()->with('error', ['password' => 'Password salah!']);
            }
        } else {
            // Kembali ke halaman Login dan memberikan pesan error
            return redirect()->back()->withInput()->with('errors', ['username' => 'Username tidak terdaftar!']);
        }
    }

    public function saveRegister() {
        // memberikan Aturan Validasi
        $rules = [
            'name' => 'required|alpha_space|min_length[3]|max_length[50]',
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[20]|is_unique[admin.username]',
            'password' => 'required|min_length[6]',
            'telephone' => 'required|numeric|min_length[10]|max_length[15]'
        ];

        // memberikan pesan ketika error
        $message = [
            'name' => [
                'required' => 'Nama harus diisi.',
                'alpha_space' => 'Nama hanya boleh mengandung huruf dan spasi.',
                'min_length' => 'Nama minimal 3 karakter!',
                'max_length' => 'Nama maksimal 50 karakter!'
            ],
            'username' => [
                'required' => 'Username harus diisi.',
                'alpha_numeric_space' => 'Username hanya boleh mengandung huruf, angka, dan spasi.',
                'min_length' => 'Username minimal 3 karakter!',
                'max_length' => 'Username maksimal 20 karakter!',
                'is_unique' => 'Username sudah dipakai. Silahkan coba lagi!'
                
            ],
            'password' => [
                'required' => 'Password harus diisi.',
                'min_length' => 'Password minimal 6 karakter!'
            ],
            'telephone' => [
                'required' => 'Nomor telepon harus diisi.',
                'numeric' => 'Nomor telepon hanya boleh mengandung angka.',
                'min_length' => 'Nomor telepon minimal 10 karakter!',
                'max_length' => 'Nomor telepon maksimal 15 karakter!'
            ]
        ];

        if (!$this->validate($rules, $message)) {
            // Kembali ke halaman Login dan memberikan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
            // inisiasi dan mengambil data dari form
            $model = new \App\Models\AdminModel();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $telephone = $this->request->getPost('telephone');

            // Menyimpan Ke dalam Database
            $model->save([
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'telephone' => $telephone
            ]);

            // Kembali ke halaman Login
            return redirect()->to('/admin/login')->with('success', 'Registrasi berhasil! Silakan login.');
        }
    }

    public function logout(){
        // Mengambil sesi di dashboard
        $session = session();

        // Menghancurkan sesi
        $session->destroy();

        // Kembali ke halaman Login
        return redirect()->to('/admin/login')->with('logout', 'Anda Berhasil Logout');
    }
}

?>