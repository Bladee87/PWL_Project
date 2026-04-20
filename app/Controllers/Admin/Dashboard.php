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
        $data = [
            'nama_admin' => $this->request->getPost('nama_admin'),
            'username' => $this->request->getPost('username'),
            'no_telpon' => $this->request->getPost('no_telpon'),
        ];
        
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->adminModel->update($id, $data);
        return redirect()->to('/admin/user');
    }
}