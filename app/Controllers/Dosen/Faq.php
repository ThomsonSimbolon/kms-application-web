<?php

namespace App\Controllers\Dosen;

use App\Controllers\BaseController;
use App\Models\DosenModel;
use App\Models\UserModel;

class Faq extends BaseController
{
    protected $userModel, $dosenModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->dosenModel = new DosenModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Dosen | Data FAQ',
            'active' => 'faq',
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('dosen/dashboard'),
                'FAQ' => base_url('dosen/faq'),
                'Active Page' => 'Data FAQ',
            ]
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->dosenModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;


        return view('dosen/v_faq', $data);
    }
}
