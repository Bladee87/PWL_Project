<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'   => 'udini',
            'password'   => password_hash('udini123', PASSWORD_DEFAULT),
        ];
        $this->db->table('admin')->insert($data);
    }
}
