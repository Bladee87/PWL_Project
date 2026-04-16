<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKendaraanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id_mobil' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'id_pelanggan' => [
            'type'       => 'INT',
            'constraint' => 11,
            'unsigned'   => true,
        ],
        'nama_mobil' => [
            'type'       => 'VARCHAR',
            'constraint' => '100',
        ],
        'no_polisi' => [
            'type'       => 'VARCHAR',
            'constraint' => '20',
        ],
        'merek_mobil' => [
            'type'       => 'VARCHAR',
            'constraint' => '50',
        ],
        'tipe_mobil' => [
            'type'       => 'VARCHAR',
            'constraint' => '50',
        ],
    ]);
    $this->forge->addKey('id_mobil', true);
    // Relasi ke tabel pelanggan
    $this->forge->addForeignKey('id_pelanggan', 'pelanggan', 'id_pelanggan', 'CASCADE', 'CASCADE');
    $this->forge->createTable('kendaraan');
    }

    public function down()
    {
        $this->forge->dropTable('kendaraan');
    }
}
