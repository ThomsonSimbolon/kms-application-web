<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table            = 'tb_dosen';
    protected $primaryKey       = 'id_dosen';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'nama_lengkap', 'nidn',  'jabatan', 'agama', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'no_hp', 'alamat', 'upload_foto'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function getProfile($id_user)
    {
        return $this->select('tb_dosen.*, tb_users.*')
            ->join('tb_users', 'tb_users.id_user = tb_dosen.id_user', 'inner')
            ->where('tb_dosen.id_user', $id_user)
            ->get()
            ->getRowArray();
    }

    // Fungsi untuk menampilkan semua data yang ada di tabel 
    public function getProfileByUserId($id_user)
    {
        return $this->where('id_user', $id_user)->first();
    }

    public function updateProfile($id_dosen, $data)
    {
        // Update data in tb_dosen
        $this->db->table('tb_dosen')
            ->where('id_dosen', $id_dosen)
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

    public function insertDosen($data)
    {
        return $this->insert($data);
    }
}
