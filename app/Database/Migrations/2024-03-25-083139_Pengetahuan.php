<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengetahuan extends Migration
{
    public function up()
    {
        // Create table pengetahuan
        $this->forge->addField([
            'id_pengetahuan' => [
                'type' => 'INT',
                'constraint' => 25,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'jenis_pengetahuan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tgl_posting' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'persetujuan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tgl_persetujuan' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => 20,
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

        $this->forge->addKey('id_pengetahuan', true);
        $this->forge->createTable('pengetahuan');
    }

    public function down()
    {
        //
        $this->forge->dropTable('pengetahuan');
    }
}