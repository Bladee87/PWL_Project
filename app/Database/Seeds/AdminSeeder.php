<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_admin' => 'Udin Sedunia',
                'username'   => 'udini',
                'password'   => password_hash('udini123', PASSWORD_DEFAULT),
                'no_telpon'  => '081234567890',
            ],
            [
                'nama_admin' => 'Budi Santoso',
                'username'   => 'budi',
                'password'   => password_hash('budi123', PASSWORD_DEFAULT),
                'no_telpon'  => '081234567891',
            ],
            [
                'nama_admin' => 'Siti Aminah',
                'username'   => 'siti',
                'password'   => password_hash('siti123', PASSWORD_DEFAULT),
                'no_telpon'  => '081234567892',
            ],
            [
                'nama_admin' => 'Agus Pratama',
                'username'   => 'agus',
                'password'   => password_hash('agus123', PASSWORD_DEFAULT),
                'no_telpon'  => '081234567893',
            ],
            [
                'nama_admin' => 'Dewi Lestari',
                'username'   => 'dewi',
                'password'   => password_hash('dewi123', PASSWORD_DEFAULT),
                'no_telpon'  => '081234567894',
            ],
        ];

        // Using Query Builder
        $this->db->table('admin')->insertBatch($data);
    }
}
