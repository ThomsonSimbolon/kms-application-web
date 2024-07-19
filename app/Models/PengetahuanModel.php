<?php

namespace App\Models;

use CodeIgniter\Model;

class PengetahuanModel extends Model
{
    protected $table            = 'tb_pengetahuan';
    protected $primaryKey       = 'id_pengetahuan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_lengkap', 'judul_pengetahuan', 'jenis_pengetahuan', 'deskripsi_pengetahuan', 'file_path', 'tgl_posting', 'tgl_ubah', 'status', 'id_user'];

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
    public function getAllPengetahuan()
    {
        return $this->findAll();
    }

    // Model fungsi untuk update data pengetahuan
    public function updatePengetahuan($id, $data)
    {
        return $this->set($data)->where('id_pengetahuan', $id)->update();
    }

    public function getApprovedPengetahuan()
    {
        return $this->where('status', 'diterima')->findAll();
    }

    public function updatePengetahuanStatus($id, $status)
    {
        $this->set(['status' => $status])->where('id_pengetahuan', $id)->update();
    }

    public function getPengetahuanByUser($id_user)
    {
        return $this->where('id_user', $id_user)->findAll();
    }

    // Model fungsi untuk delete data pengetahuan
    public function deletePengetahuan($id)
    {
        return $this->where('id_pengetahuan', $id)->delete();
    }


    // Fungsi untuk mengambil seluruh data pengetahuan yang ada di database
    public function countPengetahuan()
    {
        return $this->countAll();
    }

    // Fungsi untuk menghitung data pengetahuan berdasarkan bulan
    public function getMonthlyCounts()
    {
        return $this->select('MONTH(tgl_posting) as month, COUNT(*) as count')
            ->groupBy('MONTH(tgl_posting)')
            ->get()
            ->getResultArray();
    }
}
