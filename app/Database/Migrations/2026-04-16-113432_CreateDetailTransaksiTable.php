<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDetailTransaksiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id_detail_transaksi' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'id_transaksi' => [
            'type'       => 'INT',
            'constraint' => 11,
            'unsigned'   => true,
        ],
        'barang_jasa' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'harga' => [
            'type'       => 'DECIMAL',
            'constraint' => '12,2',
        ],
    ]);
    $this->forge->addKey('id_detail_transaksi', true);
    $this->forge->addForeignKey('id_transaksi', 'transaksi', 'id_transaksi', 'CASCADE', 'CASCADE');
    $this->forge->createTable('detail_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('detail_transaksi');
    }
}
