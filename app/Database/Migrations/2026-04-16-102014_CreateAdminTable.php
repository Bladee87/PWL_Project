<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id_admin' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'nama_admin' => [
            'type'       => 'VARCHAR',
            'constraint' => '100',
        ],
        'username' => [
            'type'       => 'VARCHAR',
            'constraint' => '50',
        ],
        'password' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'no_telpon' => [
            'type'       => 'VARCHAR',
            'constraint' => '15',
        ],
    ]);
    $this->forge->addKey('id_admin', true); // Primary Key
    $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
