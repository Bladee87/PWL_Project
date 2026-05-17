<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_pelanggan' => 1,
                'nama_mobil'   => 'Avanza',
                'no_polisi'    => 'B 1234 ABC',
                'merek_mobil'  => 'Toyota',
                'tipe_mobil'   => 'MPV',
            ],
            [
                'id_pelanggan' => 2,
                'nama_mobil'   => 'Xpander',
                'no_polisi'    => 'D 5678 DEF',
                'merek_mobil'  => 'Mitsubishi',
                'tipe_mobil'   => 'MPV',
            ],
            [
                'id_pelanggan' => 3,
                'nama_mobil'   => 'Brio',
                'no_polisi'    => 'L 9012 GHI',
                'merek_mobil'  => 'Honda',
                'tipe_mobil'   => 'Hatchback',
            ],
            [
                'id_pelanggan' => 4,
                'nama_mobil'   => 'Pajero Sport',
                'no_polisi'    => 'AB 3456 JKL',
                'merek_mobil'  => 'Mitsubishi',
                'tipe_mobil'   => 'SUV',
            ],
            [
                'id_pelanggan' => 5,
                'nama_mobil'   => 'Civic',
                'no_polisi'    => 'H 7890 MNO',
                'merek_mobil'  => 'Honda',
                'tipe_mobil'   => 'Sedan',
            ],
        ];

        $this->db->table('kendaraan')->insertBatch($data);
    }
}
