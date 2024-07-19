<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
    protected $table            = 'tb_materi';
    protected $primaryKey       = 'id_materi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_lengkap', 'mata_kuliah', 'judul_materi', 'program_studi', 'file_path', 'tgl_posting', 'tgl_ubah', 'status', 'id_user'];

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
    public function getAllMateri()
    {
        return $this->findAll();
    }

    // Model fungsi untuk update data materi
    public function updateMateri($id, $data)
    {
        return $this->set($data)->where('id_materi', $id)->update();
    }

    public function getApprovedMateri()
    {
        return $this->where('status', 'diterima')->findAll();
    }

    public function updateMateriStatus($id, $status)
    {
        $this->set(['status' => $status])->where('id_materi', $id)->update();
    }

    public function getMateriByUser($id_user)
    {
        return $this->where('id_user', $id_user)->findAll();
    }

    // Model fungsi untuk delete data materi
    public function deleteMateri($id)
    {
        return $this->where('id_materi', $id)->delete();
    }

    // Fungsi untuk mengambil seluruh data materi yang ada di database
    public function countMateri()
    {
        return $this->countAll();
    }

    // Fungsi untuk menghitung data materi berdasarkan bulan
    public function getMonthlyCounts()
    {
        return $this->select('MONTH(tgl_posting) as month, COUNT(*) as count')
            ->groupBy('MONTH(tgl_posting)')
            ->get()
            ->getResultArray();
    }
}
