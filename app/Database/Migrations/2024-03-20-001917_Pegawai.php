<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
    public function up()
    {
        // Create table pegawai
        $this->forge->addField([
            'id_pegawai' => [
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
                'constraint' => 25,
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
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

        $this->forge->addKey('id_pegawai', true);
        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        //
        $this->forge->dropTable('pegawai');
    }
}