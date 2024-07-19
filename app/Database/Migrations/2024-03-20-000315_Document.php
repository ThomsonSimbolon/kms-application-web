<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Document extends Migration
{
    public function up()
    {
        // Create table dokumen
        $this->forge->addField([
            'id_dokumen' => [
                'type' => 'INT',
                'constraint' => 25,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'file_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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

        $this->forge->addKey('id_dokumen', true);
        $this->forge->createTable('dokumen');
    }

    public function down()
    {
        //
        $this->forge->dropTable('dokumen');
    }
}
