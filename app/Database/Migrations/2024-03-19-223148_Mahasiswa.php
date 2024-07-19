<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        // Create mahasiswa table
        $this->forge->addField([
            'id_mahasiswa' => [
                'type'           => 'INT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nim' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jurusan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'semester' => [
                'type'       => 'INT',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tgl_lahir' => [
                'type'       => 'DATE',
                'null'       => true,
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Aktif', 'Tidak_Aktif', 'Cuti'],
                'default'    => 'Aktif',
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
        $this->forge->addKey('id_mahasiswa', true);
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        //
        $this->forge->dropTable('mahasiswa');
    }
}