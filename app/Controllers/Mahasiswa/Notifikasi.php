<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\NotifikasiModel;

class Notifikasi extends BaseController
{
    protected $notifikasiModel, $mahasiswaModel, $userModel;

    public function __construct()
    {
        $this->notifikasiModel = new NotifikasiModel();
        $this->mahasiswaModel = new \App\Models\MahasiswaModel();
        $this->userModel = new \App\Models\UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Notifikasi',
            'notifikasi' => $this->notifikasiModel->findAll(),
            'active' => 'notifikasi',
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('mahasiswa/dashboard'),
                'Notifikasi' => base_url('mahasiswa/notifikasi'),
                'Active Page' => 'Data Notifikasi',
            ],
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->mahasiswaModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('mahasiswa/v_notifikasi', $data);
    }
}
