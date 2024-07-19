<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentModel extends Model
{
    protected $table            = 'tb_dokumen';
    protected $primaryKey       = 'id_dokumen';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_lengkap', 'judul_dokumen', 'deskripsi', 'file_path', 'tgl_upload', 'tgl_ubah', 'status', 'id_user'];

    // protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tgl_upload';
    protected $updatedField  = 'tgl_ubah';

    public function __construct()
    {
        parent::__construct();

        // Set default timezone to 'Asia/Jakarta'
        date_default_timezone_set('Asia/Jakarta');
    }

    public function getDocument()
    {
        // Mengambil banyak data
        return $this->findAll();
        return $this->db->table('tb_dokumen')->get()->getResultArray();
    }

    public function getDocumentById($id)
    {
        return $this->find($id);
        return $this->db->table('tb_dokumen')->get()->getResultArray();
    }

    public function updateDocument($id, $data)
    {
        $this->update($id, $data);
    }

    public function getApprovedDocuments()
    {
        return $this->where('status', 'diterima')->findAll();
    }

    public function updateDocumentStatus($id, $status)
    {
        $this->set(['status' => $status])->where('id_dokumen', $id)->update();
    }

    public function getDocumentsByUser($id_user)
    {
        return $this->where('id_user', $id_user)->findAll();
    }

    public function deleteDocument($id)
    {
        return $this->db->table('tb_dokumen')->delete(['id_dokumen' => $id]);
        return $this->db->table($this->table)->where(['id_dokumen', $id])->delete();
    }


    // Fungsi untuk mengamnil data dokumen yang ada di database
    public function countDocument()
    {
        return $this->countAll();
    }

    // Fungsi untuk menghitung data pengetahuan berdasarkan bulan
    public function getMonthlyCounts()
    {
        return $this->select('MONTH(tgl_upload) as month, COUNT(*) as count')
            ->groupBy('MONTH(tgl_upload)')
            ->get()
            ->getResultArray();
    }
}
