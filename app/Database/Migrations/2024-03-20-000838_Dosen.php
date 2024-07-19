<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
    public function up()
    {
        // Create table dosen
        $this->forge->addField([
            'id_dosen' => [
                'type' => 'INT',
                'constraint' => 25,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_dosen', true);
        $this->forge->createTable('dosen');
    }

    public function down()
    {
        //
        $this->forge->dropTable('dosen');
    }
}