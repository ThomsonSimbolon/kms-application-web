<?php

namespace App\Models;

use CodeIgniter\Model;

class AktivitasModel extends Model
{
    protected $table            = 'tb_aktivitas';
    protected $primaryKey       = 'id_aktivitas';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'email', 'tanggal_masuk', 'tanggal_keluar', 'level'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_masuk';
    protected $updatedField  = 'tanggal_keluar';

    public function __construct()
    {
        parent::__construct();

        // Set default timezone to 'Asia/Jakarta'
        date_default_timezone_set('Asia/Jakarta');
    }


    public function getAktivitas()
    {
        return $this->findAll();
        return $this->db->table('tb_aktivitas')->get()->getResultArray();
    }



    // Metode untuk menyimpan atau memperbarui log aktivitas saat login
    public function saveLog($id_user, $email, $level)
    {
        // Cek apakah ada entri yang belum memiliki tgl_keluar untuk id_user yang sama
        $existingLog = $this->where('id_user', $id_user)
            ->where('tanggal_keluar', null)
            ->first();

        if ($existingLog) {
            // Update entri yang ada dengan tgl_masuk baru
            $this->update($existingLog['id_aktivitas'], ['tanggal_masuk' => date('Y-m-d H:i:s')]);
        } else {
            // Insert entri baru
            $data = [
                'id_user' => $id_user,
                'email' => $email,
                'level' => $level,
                'tanggal_masuk' => date('Y-m-d H:i:s'),
                'tanggal_keluar' => null,
            ];
            $this->insert($data);
        }
    }

    // Metode untuk mengupdate log aktivitas saat logout
    public function logLogout($id_user)
    {
        $log = $this->where('id_user', $id_user)
            ->where('tanggal_keluar', null)
            ->first();

        if ($log) {
            $data = [
                'tanggal_keluar' => date('Y-m-d H:i:s')
            ];
            $this->update($log['id_aktivitas'], $data);
        }
    }

    public function getLogs()
    {
        return $this->db->table('tb_aktivitas')
            ->select('tb_aktivitas.*, tb_users.id_user, tb_users.email, tb_users.level')
            ->join('tb_users', 'tb_users.id_user = tb_aktivitas.id_user', 'inner')
            ->get()
            ->getResultArray();
    }

    public function deleteAktivitas($id)
    {
        return $this->db->table('tb_aktivitas')->delete(['id_aktivitas' => $id]);
        return $this->db->table($this->table)->where(['id_aktivitas', $id])->delete();
    }

    // public function saveLog($id_user, $email, $level)
    // {
    //     $data = [
    //         'id_user' => $id_user,
    //         'email' => $email,
    //         'level' => $level,
    //         'tanggal_masuk' => date('Y-m-d H:i:s'),
    //         'tanggal_keluar' => date('Y-m-d H:i:s'),
    //     ];

    //     $this->insert($data);
    // }
}
