<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
    protected $table            = 'tb_notifikasi';
    protected $primaryKey       = 'id_notif';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['type', 'pesan', 'tgl_posting'];



    // Model fungsi untuk menampilkan semua data yang ada di database

}
