<?php

namespace App\Controllers\Dosen;

use App\Controllers\BaseController;
use App\Models\NotifikasiModel;

class Notifikasi extends BaseController
{
    protected $notifikasiModel, $dosenModel, $userModel;

    public function __construct()
    {
        $this->notifikasiModel = new NotifikasiModel();
        $this->dosenModel = new \App\Models\DosenModel();
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
                'Dashboard' => base_url('dosen/dashboard'),
                'Notifikasi' => base_url('dosen/notifikasi'),
                'Active Page' => 'Data Notifikasi',
            ],
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->dosenModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('dosen/v_notifikasi', $data);
    }
}
