<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\UserModel;

class Faq extends BaseController
{
    protected $userModel, $pegawaiModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pegawaiModel = new PegawaiModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Data FAQ',
            'active' => 'faq',
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'FAQ' => base_url('pegawai/faq'),
                'Active Page' => 'Data FAQ',
            ]
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->pegawaiModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;


        return view('pegawai/v_faq', $data);
    }
}
