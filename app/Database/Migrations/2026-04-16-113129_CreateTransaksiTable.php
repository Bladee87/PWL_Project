<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id_transaksi' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'id_mobil' => [
            'type'       => 'INT',
            'constraint' => 11,
            'unsigned'   => true,
        ],
        'tanggal_masuk' => [
            'type' => 'DATE',
        ],
        'tanggal_keluar' => [
            'type' => 'DATE',
            'null' => true,
        ],
        'total_km' => [
            'type'       => 'INT',
            'constraint' => 11,
        ],
        'total_harga' => [
            'type'       => 'DECIMAL',
            'constraint' => '12,2',
            'default'    => 0.00,
        ],
    ]);
    $this->forge->addKey('id_transaksi', true);
    $this->forge->addForeignKey('id_mobil', 'kendaraan', 'id_mobil', 'CASCADE', 'CASCADE');
    $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
