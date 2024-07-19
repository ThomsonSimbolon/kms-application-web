<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskusiModel extends Model
{
    protected $table            = 'tb_forum';
    protected $primaryKey       = 'id_forum';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'judul_forum', 'deskripsi', 'nama_lengkap', 'tgl_posting', 'tgl_ubah', 'status'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tgl_posting';
    protected $updatedField  = 'tgl_ubah';

    public function __construct()
    {
        parent::__construct();

        // Set default timezone to 'Asia/Jakarta'
        date_default_timezone_set('Asia/Jakarta');
    }

    // Model fungsi untuk menampilkan semua data yang ada di database
    public function getForumAll()
    {
        return $this->findAll();
    }

    // Model fungsi untuk update data forum
    public function updateDiskusi($id, $data)
    {
        return $this->set($data)->where('id_forum', $id)->update();
    }

    public function getApprovedDiskusi()
    {
        return $this->where('status', 'diterima')->findAll();
    }

    public function updateDiskusiStatus($id, $status)
    {
        $this->set(['status' => $status])->where('id_forum', $id)->update();
    }

    public function getDiskusiByUser($id_user)
    {
        return $this->where('id_user', $id_user)->findAll();
    }

    // Model fungsi untuk delete data forum diskusi
    public function deleteForum($id)
    {
        return $this->where('id_forum', $id)->delete();
    }

    // // Fungsi untuk mengambil seluruh data diskusi yang ada di database
    public function countDiskusi()
    {
        return $this->countAll();
    }
}
