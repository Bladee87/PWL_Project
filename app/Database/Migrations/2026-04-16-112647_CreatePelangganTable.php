<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePelangganTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id_pelanggan' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'nama_pelanggan' => [
            'type'       => 'VARCHAR',
            'constraint' => '100',
        ],
        'alamat_pelanggan' => [
            'type'       => 'TEXT',
            'null'       => true,
        ],
        'no_telpon' => [
            'type'       => 'VARCHAR',
            'constraint' => '15',
        ],
    ]);
    $this->forge->addKey('id_pelanggan', true);
    $this->forge->createTable('pelanggan');
    }

    public function down()
    {
        $this->forge->dropTable('pelanggan');
    }
}
