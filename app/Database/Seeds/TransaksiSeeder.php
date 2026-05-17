<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_mobil'       => 1,
                'tanggal_masuk'  => '2024-04-01',
                'tanggal_keluar' => '2024-04-02',
                'total_km'       => 15000,
                'total_harga'    => 500000,
            ],
            [
                'id_mobil'       => 2,
                'tanggal_masuk'  => '2024-04-05',
                'tanggal_keluar' => '2024-04-05',
                'total_km'       => 20000,
                'total_harga'    => 350000,
            ],
            [
                'id_mobil'       => 3,
                'tanggal_masuk'  => '2024-04-10',
                'tanggal_keluar' => '2024-04-12',
                'total_km'       => 10000,
                'total_harga'    => 1200000,
            ],
            [
                'id_mobil'       => 4,
                'tanggal_masuk'  => '2024-04-15',
                'tanggal_keluar' => '2024-04-16',
                'total_km'       => 45000,
                'total_harga'    => 800000,
            ],
            [
                'id_mobil'       => 5,
                'tanggal_masuk'  => '2024-04-20',
                'tanggal_keluar' => null,
                'total_km'       => 30000,
                'total_harga'    => 0,
            ],
        ];

        $this->db->table('transaksi')->insertBatch($data);
    }
}
