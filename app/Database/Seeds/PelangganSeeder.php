<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_pelanggan'   => 'Andi Wijaya',
                'alamat_pelanggan' => 'Jl. Merdeka No. 1, Jakarta',
                'no_telpon'        => '085612345678',
            ],
            [
                'nama_pelanggan'   => 'Santi Rahayu',
                'alamat_pelanggan' => 'Jl. Mawar No. 12, Bandung',
                'no_telpon'        => '085612345679',
            ],
            [
                'nama_pelanggan'   => 'Joko Susilo',
                'alamat_pelanggan' => 'Jl. Melati No. 5, Surabaya',
                'no_telpon'        => '085612345680',
            ],
            [
                'nama_pelanggan'   => 'Rina Fitriani',
                'alamat_pelanggan' => 'Jl. Dahlia No. 8, Yogyakarta',
                'no_telpon'        => '085612345681',
            ],
            [
                'nama_pelanggan'   => 'Heri Gunawan',
                'alamat_pelanggan' => 'Jl. Kenanga No. 3, Semarang',
                'no_telpon'        => '085612345682',
            ],
        ];

        $this->db->table('pelanggan')->insertBatch($data);
    }
}
