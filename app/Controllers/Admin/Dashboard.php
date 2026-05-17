<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DetailTransaksiModel;
use App\Models\KendaraanModel;
use App\Models\PelangganModel;
use App\Models\TransaksiModel;
use App\Models\AdminModel;

class Dashboard extends BaseController
{
    protected $detailTransaksiModel;
    protected $kendaraanModel;
    protected $pelangganModel;
    protected $transaksiModel;
    protected $adminModel;

    public function __construct()
    {
        $this->detailTransaksiModel = new DetailTransaksiModel();
        $this->kendaraanModel = new KendaraanModel();
        $this->pelangganModel = new PelangganModel();
        $this->transaksiModel = new TransaksiModel();
        $this->adminModel = new AdminModel();
    }

    public function index(): string
    {
        $data['title'] = 'Dashboard';
        return view('templates/head', $data)
            . view('templates/sidebar')
            . view('templates/topbar')
            . view('templates/content')
            . view('templates/footer');
    }

    public function tables(): string
    {
        $data['title'] = 'Tables Example';
        return view('templates/head', $data)
            . view('templates/sidebar')
            . view('templates/topbar')
            . view('templates/tables')
            . view('templates/footer');
    }

    // --- Detail Transaksi CRUD ---
    public function detailTransaksi()
    {
        $data = [
            'title' => 'Detail Transaksi',
            'detail_transaksi' => $this->detailTransaksiModel->findAll(),
            'transaksi' => $this->transaksiModel->findAll()
        ];
        return view('templates/head', $data)
            . view('templates/sidebar')
            . view('templates/topbar')
            . view('admin/viewDetailTransaksi', $data)
            . view('templates/footer');
    }

    public function saveDetailTransaksi()
    {
        $rules = [
            'barang_jasa' => 'required|alpha_numeric_space|min_length[3]|max_length[50]',
            'harga' => 'required|numeric|greater_than_equal_to[0]'
        ];

        $message = [
            'barang_jasa' => [
                'required' => 'Barang/Jasa harus diisi.',
                'alpha_numeric_space' => 'Barang/Jasa hanya boleh mengandung huruf, angka, dan spasi.',
                'min_length' => 'Barang/Jasa minimal 3 karakter.',
                'max_length' => 'Barang/Jasa maksimal 50 karakter.'
            ],
            'harga' => [
                'required' => 'Harga harus diisi.',
                'numeric' => 'Harga harus berupa angka.',
                'greater_than_equal_to' => 'Harga harus lebih besar dari 0.'
            ]
        ];

        if (!$this->validate($rules, $message)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back();
        }

        $this->detailTransaksiModel->save([
            'id_transaksi' => $this->request->getPost('id_transaksi'),
            'barang_jasa' => $this->request->getPost('barang_jasa'),
            'harga' => $this->request->getPost('harga'),
        ]);
        return redirect()->to('/admin/detail-transaksi');
    }

    public function deleteDetailTransaksi($id)
    {
        $this->detailTransaksiModel->delete($id);
        return redirect()->to('/admin/detail-transaksi');
    }

    public function updateDetailTransaksi()
    {
        $id = $this->request->getPost('id_detail_transaksi');

        $rules = [
            'barang_jasa' => 'required|alpha_numeric_space|min_length[3]|max_length[50]',
            'harga' => 'required|numeric|greater_than_equal_to[0]'
        ];

        $message = [
            'barang_jasa' => [
                'required' => 'Barang/Jasa harus diisi.',
                'alpha_numeric_space' => 'Barang/Jasa hanya boleh mengandung huruf, angka, dan spasi.',
                'min_length' => 'Barang/Jasa minimal 3 karakter.',
                'max_length' => 'Barang/Jasa maksimal 50 karakter.'
            ],
            'harga' => [
                'required' => 'Harga harus diisi.',
                'numeric' => 'Harga harus berupa angka.',
                'greater_than_equal_to' => 'Harga harus lebih besar dari 0.'
            ]
        ];

        if (!$this->validate($rules, $message)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back();
        }

        $this->detailTransaksiModel->update($id, [
            'id_transaksi' => $this->request->getPost('id_transaksi'),
            'barang_jasa' => $this->request->getPost('barang_jasa'),
            'harga' => $this->request->getPost('harga'),
        ]);
        return redirect()->to('/admin/detail-transaksi');
    }

    // --- Kendaraan CRUD ---
    public function kendaraan()
    {
        $data = [
            'title' => 'Data Kendaraan',
            'kendaraan' => $this->kendaraanModel->findAll(),
            'pelanggan' => $this->pelangganModel->findAll()
        ];
        return view('templates/head', $data)
            . view('templates/sidebar')
            . view('templates/topbar')
            . view('admin/viewKendaraan', $data)
            . view('templates/footer');
    }

    public function saveKendaraan()
    {
        $rules = [
            'nama_mobil' => 'required|alpha_numeric_space|min_length[4]|max_length[50]',
            'no_polisi' => 'required|max_length[12]|alpha_numeric_space',
            'merek_mobil' => 'required|alpha_space|min_length[3]|max_length[25]',
            'tipe_mobil' => 'required|in_list[Sedan,MPV,SUV,Hatchback]'
        ];

        $message = [
            'nama_mobil' => [
                'required' => 'Nama Mobil harus diisi.',
                'alpha_numeric_space' => 'Nama Mobil hanya boleh mengandung huruf, angka, dan spasi.',
                'min_length' => 'Nama Mobil minimal 4 karakter.',
                'max_length' => 'Nama Mobil maksimal 50 karakter.'
            ],
            'no_polisi' => [
                'required' => 'No Polisi harus diisi.',
                'max_length' => 'No Polisi maksimal 12 karakter.',
                'alpha_numeric_space' => 'No Polisi hanya boleh mengandung huruf, angka, dan spasi.'
            ],
            'merek_mobil' => [
                'required' => 'Merek Mobil harus diisi.',
                'alpha_space' => 'Merek Mobil hanya boleh mengandung huruf dan spasi.',
                'min_length' => 'Merek Mobil minimal 3 karakter.',
                'max_length' => 'Merek Mobil maksimal 25 karakter.'
            ],
            'tipe_mobil' => [
                'required' => 'Tipe Mobil harus diisi.',
                'in_list' => 'Tipe Mobil harus salah satu dari: Sedan, MPV, SUV, Hatchback.'
            ]
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->kendaraanModel->save([
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'nama_mobil' => $this->request->getPost('nama_mobil'),
            'no_polisi' => $this->request->getPost('no_polisi'),
            'merek_mobil' => $this->request->getPost('merek_mobil'),
            'tipe_mobil' => $this->request->getPost('tipe_mobil'),
        ]);
        return redirect()->to('/admin/kendaraan');
    }

    public function deleteKendaraan($id)
    {
        $this->kendaraanModel->delete($id);
        return redirect()->to('/admin/kendaraan');
    }

    public function updateKendaraan()
    {
        $id = $this->request->getPost('id_mobil');

        $message = [
            'nama_mobil' => [
                'required' => 'Nama Mobil harus diisi.',
                'alpha_numeric_space' => 'Nama Mobil hanya boleh mengandung huruf, angka, dan spasi.',
                'min_length' => 'Nama Mobil minimal 4 karakter.',
                'max_length' => 'Nama Mobil maksimal 50 karakter.'
            ],
            'no_polisi' => [
                'required' => 'No Polisi harus diisi.',
                'max_length' => 'No Polisi maksimal 12 karakter.',
                'alpha_numeric_space' => 'No Polisi hanya boleh mengandung huruf, angka, dan spasi.'
            ],
            'merek_mobil' => [
                'required' => 'Merek Mobil harus diisi.',
                'alpha_space' => 'Merek Mobil hanya boleh mengandung huruf dan spasi.',
                'min_length' => 'Merek Mobil minimal 3 karakter.',
                'max_length' => 'Merek Mobil maksimal 25 karakter.'
            ],
            'tipe_mobil' => [
                'required' => 'Tipe Mobil harus diisi.',
                'in_list' => 'Tipe Mobil harus salah satu dari: Sedan, MPV, SUV, Hatchback.'
            ]
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->kendaraanModel->update($id, [
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'nama_mobil' => $this->request->getPost('nama_mobil'),
            'no_polisi' => $this->request->getPost('no_polisi'),
            'merek_mobil' => $this->request->getPost('merek_mobil'),
            'tipe_mobil' => $this->request->getPost('tipe_mobil'),
        ]);
        return redirect()->to('/admin/kendaraan');
    }

    // --- Pelanggan CRUD ---
    public function pelanggan()
    {
        $data = [
            'title' => 'Data Pelanggan',
            'pelanggan' => $this->pelangganModel->findAll()
        ];
        return view('templates/head', $data)
            . view('templates/sidebar')
            . view('templates/topbar')
            . view('admin/viewPelanggan', $data)
            . view('templates/footer');
    }

    public function savePelanggan()
    {
        $rules = [
            'nama_pelanggan' => 'required|alpha_space|min_length[3]|max_length[50]',
            'no_telpon' => 'required|numeric|min_length[10]|max_length[15]'
        ];

        $message = [
            'no_telpon' => [
                'required' => 'No Telpon harus diisi.',
                'numeric' => 'No Telpon harus berupa angka.',
                'min_length' => 'No Telpon minimal 10 digit.',
                'max_length' => 'No Telpon maksimal 15 digit.'
            ],
            'nama_pelanggan' => [
                'required' => 'Nama Pelanggan harus diisi.',
                'alpha_space' => 'Nama Pelanggan hanya boleh mengandung huruf dan spasi.',
                'min_length' => 'Nama Pelanggan minimal 3 karakter.',
                'max_length' => 'Nama Pelanggan maksimal 50 karakter.'
            ],
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->pelangganModel->save([
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
            'no_telpon' => $this->request->getPost('no_telpon'),
        ]);

        return redirect()->to('/admin/pelanggan');
    }

    public function deletePelanggan($id)
    {
        $this->pelangganModel->delete($id);
        return redirect()->to('/admin/pelanggan');
    }

    public function updatePelanggan()
    {
        $id = $this->request->getPost('id_pelanggan');

        $rules = [
            'nama_pelanggan' => 'required|alpha_space|min_length[3]|max_length[50]',
            'alamat_pelanggan' => 'required|alpha_numeric_space|min_length[5]|max_length[100]',
            'no_telpon' => 'required|numeric|min_length[10]|max_length[15]'
        ];

        $message = [
            'no_telpon' => [
                'required' => 'No Telpon harus diisi.',
                'numeric' => 'No Telpon harus berupa angka.',
                'min_length' => 'No Telpon minimal 10 digit.',
                'max_length' => 'No Telpon maksimal 15 digit.'
            ],
            'nama_pelanggan' => [
                'required' => 'Nama Pelanggan harus diisi.',
                'alpha_space' => 'Nama Pelanggan hanya boleh mengandung huruf dan spasi.',
                'min_length' => 'Nama Pelanggan minimal 3 karakter.',
                'max_length' => 'Nama Pelanggan maksimal 50 karakter.'
            ],
            'alamat_pelanggan' => [
                'required' => 'Alamat Pelanggan harus diisi.',
                'alpha_numeric_space' => 'Alamat Pelanggan hanya boleh mengandung huruf, angka, dan spasi.',
                'min_length' => 'Alamat Pelanggan minimal 5 karakter.',
                'max_length' => 'Alamat Pelanggan maksimal 100 karakter.'
            ]
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->pelangganModel->update($id, [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
            'no_telpon' => $this->request->getPost('no_telpon'),
        ]);
        return redirect()->to('/admin/pelanggan');
    }

    // --- Transaksi CRUD ---
    public function transaksi()
    {
        $data = [
            'title' => 'Data Transaksi',
            'transaksi' => $this->transaksiModel->findAll(),
            'kendaraan' => $this->kendaraanModel->findAll()
        ];
        return view('templates/head', $data)
            . view('templates/sidebar')
            . view('templates/topbar')
            . view('admin/viewTransaksi', $data)
            . view('templates/footer');
    }

    public function saveTransaksi()
    {
        $rules = [
            'total_km' => 'required|numeric|greater_than_equal_to[0]',
            'total_harga' => 'required|numeric|greater_than_equal_to[0]'
        ];

        $message = [
            'total_km' => [
                'required' => 'Total KM harus diisi.',
                'numeric' => 'Total KM harus berupa angka.',
                'greater_than_equal_to' => 'Total KM harus lebih besar dari 0.'
            ],
            'total_harga' => [
                'required' => 'Total Harga harus diisi.',
                'numeric' => 'Total Harga harus berupa angka.',
                'greater_than_equal_to' => 'Total Harga harus lebih besar dari 0.'
            ]
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->transaksiModel->save([
            'id_mobil' => $this->request->getPost('id_mobil'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'total_km' => $this->request->getPost('total_km'),
            'total_harga' => $this->request->getPost('total_harga'),
        ]);
        return redirect()->to('/admin/transaksi');
    }

    public function deleteTransaksi($id)
    {
        $this->transaksiModel->delete($id);
        return redirect()->to('/admin/transaksi');
    }

    public function updateTransaksi()
    {
        $id = $this->request->getPost('id_transaksi');

         $rules = [
            'total_km' => 'required|numeric|greater_than[0]',
            'total_harga' => 'required|numeric|greater_than[0]'
        ];

        $message = [
            'total_km' => [
                'required' => 'Total KM harus diisi.',
                'numeric' => 'Total KM harus berupa angka.',
                'greater_than_equal_to' => 'Total KM harus lebih besar dari 0.'
            ],
            'total_harga' => [
                'required' => 'Total Harga harus diisi.',
                'numeric' => 'Total Harga harus berupa angka.',
                'greater_than_equal_to' => 'Total Harga harus lebih besar dari 0.'
            ]
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->transaksiModel->update($id, [
            'id_mobil' => $this->request->getPost('id_mobil'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'total_km' => $this->request->getPost('total_km'),
            'total_harga' => $this->request->getPost('total_harga'),
        ]);
        return redirect()->to('/admin/transaksi');
    }

    // --- User CRUD ---
    public function user()
    {
        $data = [
            'title' => 'Data User',
            'user' => $this->adminModel->findAll()
        ];
        return view('templates/head', $data)
            . view('templates/sidebar')
            . view('templates/topbar')
            . view('admin/viewUser', $data)
            . view('templates/footer');
    }

    public function saveUser()
    {

        $rules = [
            'nama_admin' => 'required|alpha_space|min_length[3]|max_length[50]',
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[20]|is_unique[admin.username]',
            'password' => 'required|min_length[6]',
            'no_telpon' => 'required|numeric|min_length[10]|max_length[15]'
        ];

        $message = [
            'nama_admin' => [
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
            'no_telpon' => [
                'required' => 'Nomor telepon harus diisi.',
                'numeric' => 'Nomor telepon hanya boleh mengandung angka.',
                'min_length' => 'Nomor telepon minimal 10 karakter!',
                'max_length' => 'Nomor telepon maksimal 15 karakter!'
            ]
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->adminModel->save([
            'nama_admin' => $this->request->getPost('nama_admin'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'no_telpon' => $this->request->getPost('no_telpon'),
        ]);
        return redirect()->to('/admin/user');
    }

    public function deleteUser($id)
    {
        $this->adminModel->delete($id);
        return redirect()->to('/admin/user');
    }

    public function updateUser()
    {
        $id = $this->request->getPost('id_admin');
        $rules = [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[20]|',
            'password' => 'required|min_length[6]',
            'no_telpon' => 'required|numeric|min_length[10]|max_length[15]'
        ];

        $message = [
            'username' => [
                'required' => 'Username harus diisi.',
                'alpha_numeric_space' => 'Username hanya boleh mengandung huruf, angka, dan spasi.',
                'min_length' => 'Username minimal 3 karakter!',
                'max_length' => 'Username maksimal 20 karakter!',
                
            ],
            'password' => [
                'required' => 'Password harus diisi.',
                'min_length' => 'Password minimal 6 karakter!'
            ],
            'no_telpon' => [
                'required' => 'Nomor telepon harus diisi.',
                'numeric' => 'Nomor telepon hanya boleh mengandung angka.',
                'min_length' => 'Nomor telepon minimal 10 karakter!',
                'max_length' => 'Nomor telepon maksimal 15 karakter!'
            ]
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_admin' => $this->request->getPost('nama_admin'),
            'username' => $this->request->getPost('username'),
            'no_telpon' => $this->request->getPost('no_telpon'),
        ];
        
        $password = $this->request->getPost('password');
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);

        $this->adminModel->update($id, $data);
        return redirect()->to('/admin/user');
    }
}