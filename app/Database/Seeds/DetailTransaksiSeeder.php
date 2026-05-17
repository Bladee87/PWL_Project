<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailTransaksiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_transaksi' => 1,
                'barang_jasa'  => 'Ganti Oli Mesin',
                'harga'        => 450000,
            ],
            [
                'id_transaksi' => 1,
                'barang_jasa'  => 'Pembersihan Filter',
                'harga'        => 50000,
            ],
            [
                'id_transaksi' => 2,
                'barang_jasa'  => 'Service Berkala',
                'harga'        => 350000,
            ],
            [
                'id_transaksi' => 3,
                'barang_jasa'  => 'Ganti Ban (2 pcs)',
                'harga'        => 1200000,
            ],
            [
                'id_transaksi' => 4,
                'barang_jasa'  => 'Tune Up',
                'harga'        => 800000,
            ],
        ];

        $this->db->table('detail_transaksi')->insertBatch($data);
    }
}
