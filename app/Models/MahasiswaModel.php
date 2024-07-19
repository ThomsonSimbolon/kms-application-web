<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table            = 'tb_mahasiswa';
    protected $primaryKey       = 'id_mhs';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'nama_lengkap', 'nim',   'program_studi', 'tahun_angkatan', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'no_hp', 'alamat', 'upload_foto'];

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
        return $this->select('tb_mahasiswa.*, tb_users.*')
            ->join('tb_users', 'tb_users.id_user = tb_mahasiswa.id_user', 'inner')
            ->where('tb_mahasiswa.id_user', $id_user)
            ->get()
            ->getRowArray();
    }

    // Fungsi untuk menampilkan semua data yang ada di tabel 
    public function getProfileByUserId($id_user)
    {
        return $this->where('id_user', $id_user)->first();
    }

    public function updateProfile($id_mhs, $data)
    {
        // Update data in tb_mahasiswa
        $this->db->table('tb_mahasiswa')
            ->where('id_mhs', $id_mhs)
            ->update($data);

        // Update data in tb_users
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

    public function insertMahasiswa($data)
    {
        return $this->insert($data);
    }
}
