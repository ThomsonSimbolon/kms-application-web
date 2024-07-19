<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\NotifikasiModel;

class Notifikasi extends BaseController
{
    protected $notifikasiModel, $pegawaiModel, $userModel;

    public function __construct()
    {
        $this->notifikasiModel = new NotifikasiModel();
        $this->pegawaiModel = new \App\Models\PegawaiModel();
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
                'Dashboard' => base_url('pegawai/dashboard'),
                'Notifikasi' => base_url('pegawai/notifikasi'),
                'Active Page' => 'Data Notifikasi',
            ],
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->pegawaiModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('pegawai/v_notifikasi', $data);
    }
}
