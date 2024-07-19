<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'tb_pegawai';
    protected $primaryKey       = 'id_pegawai';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'nama_lengkap', 'nidn', 'jabatan', 'agama', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'no_hp', 'alamat', 'upload_foto'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];


    public function getProfile($id_user)
    {
        return $this->select('tb_pegawai.*, tb_users.*')
            ->join('tb_users', 'tb_users.id_user = tb_pegawai.id_user', 'inner')
            ->where('tb_pegawai.id_user', $id_user)
            ->get()
            ->getRowArray();
    }

    // Fungsi untuk menampilkan semua data yang ada di tabel 
    public function getProfileByUserId($id_user)
    {
        return $this->where('id_user', $id_user)->first();
    }

    public function updateProfile($id_pegawai, $data)
    {
        // Update data in tb_dosen
        $this->db->table('tb_pegawai')
            ->where('id_pegawai', $id_pegawai)
            ->update($data);

        // Update data dari tb_users
        $this->db->table('tb_users')
            ->where('id_user', $data['id_user'])
            ->update([
                'email' => $data['email'],
                'status' => $data['status'],
                'password' => $data['password'],
                'level' => $data['level']

            ]);

        return true;
    }

    public function insertPegawai($data)
    {
        return $this->insert($data);
    }
}
