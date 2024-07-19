<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table            = 'tb_komentar';
    protected $primaryKey       = 'id_komentar';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'id_forum', 'nama_lengkap', 'komentar', 'tgl_komentar', 'tgl_ubah'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tgl_komentar';
    protected $updatedField  = 'tgl_ubah';

    public function __construct()
    {
        parent::__construct();

        // Set default timezone to 'Asia/Jakarta'
        date_default_timezone_set('Asia/Jakarta');
    }

    // Model fungsi untuk menampilkan semua data yang ada di database
    public function getAllKomentar()
    {
        return $this->findAll();
    }

    // Model fungsi untuk mengambil data dari forum diskusi
    public function getKomentarByDiskusi($id)
    {
        return $this->where('id_forum', $id)->findAll();
    }

    // Model fungsi untuk update data komentar
    public function updateKomentar($id_komentar)
    {
        return $this->where('id_komentar', $id_komentar)->update();
    }

    // Model fungsi untuk delete data komentar
    public function deleteKomentar($id)
    {
        return $this->db->table($this->table)
            ->where('id_komentar', $id)
            ->delete();
    }
}
