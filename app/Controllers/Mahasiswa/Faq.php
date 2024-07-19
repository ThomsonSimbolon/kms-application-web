<?php

namespace App\Controllers\Mahasiswa;

use App\Models\MahasiswaModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Faq extends BaseController
{
    protected $userModel, $mahasiswaModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->mahasiswaModel = new MahasiswaModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }


        $data = [
            'title' => 'Mahasiswa',
            'active' => 'faq',
            'nama_lengkap' => session()->get('users.nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('mahasiswa/dashboard'),
                'Pengetahuan' => base_url('mahasiswa/faq'),
                'Active Page' => 'Data faq'
            ]
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->mahasiswaModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        // Determine the type of user and pass the correct profile data to the view
        $profile = null;
        if ($this->mahasiswaModel) {
            $profile = $this->mahasiswaModel;
        }


        return view('mahasiswa/v_faq', $data);
    }

    // public function create()
    // {
    //     $data['title'] = 'Admin / Tambah Data User';
    //     $data['active'] = 'user';
    //     $data['subtitle'] = 'User';

    //     $model = new \App\Models\UserModel();

    //     $data = [
    //         'nama_lengkap' => $this->request->getVar('nama_lengkap'),
    //         'email' => $this->request->getVar('email'),
    //         'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
    //         'level' => $this->request->getVar('level'),
    //     ];

    //     $model->insert($data);

    //     return redirect()->to('/admin/user')->with('success', 'User berhasil ditambahkan');
    // }
}
