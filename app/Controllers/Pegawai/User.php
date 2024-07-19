<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\DocumentModel;
use App\Models\MateriModel;
use App\Models\PegawaiModel;
use App\Models\PengetahuanModel;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel, $pengetahuanModel, $dokumenModel, $materiModel, $pegawaiModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pengetahuanModel = new PengetahuanModel();
        $this->dokumenModel = new DocumentModel();
        $this->materiModel = new MateriModel();
        $this->pegawaiModel = new PegawaiModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Data Pengguna',
            'active' => 'user',
            'u' => $this->userModel->findAll(),  // Mengambil semua pengguna
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Pengguna' => base_url('pegawai/user'),
                'Active Page' => 'Data Pengguna'
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

        return view('pegawai/v_user', $data);
    }

    // fungsi untuk menambahkan user
    public function create()
    {
        $model = new \App\Models\UserModel();

        $data['title'] = 'Tambah Data Pengguna';
        $data['active'] = 'user';
        $data['subtitle'] = 'User';


        $data = [
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getVar('level'),
            // 'created_at' => $this->request->getVar('created_at'),
            // 'updated_at' => $this->request->getVar('updated_at')
        ];

        if ($model->insert($data)) {
            // Menampilkan pesan berhasil pengguna ditambah
            session()->setFlashdata('pesan', 'Pengguna berhasil ditambah');
            return redirect()->to('/pegawai/user')->with('success', 'Pengguna berhasil ditambahkan');
        } else {
            // Menampilkan pesan gagal pengguna ditambah
            session()->setFlashdata('pesan', 'Pengguna gagal ditambah');
            return redirect()->back()->withInput()->with('error', 'Pengguna gagal ditambahkan');
        }
    }

    // fungsi untuk mengedit user
    public function edit($id)
    {
        $data['title'] = 'Edit Data Pengguna';
        $data['active'] = 'user';
        $data['subtitle'] = 'User';
        $userModel = new UserModel();
        $data['u'] = $userModel->getUserById($id);
        $data['level'] = session()->get('users_level');


        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->pegawaiModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('pegawai/v_edit_user', $data);
    }

    // fungsi untuk edit user
    public function update($id)
    {
        $userModel = new UserModel();

        $data = [
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getVar('level'),
        ];

        if ($userModel->updateUser($id, $data)) {
            // Menampilkan pesan gagal pengguna diubah
            session()->setFlashdata('pesan', 'Pengguna gagal diubah');
            return redirect()->back()->withInput()->with('error', 'Data pengguna gagal diperbarui');
        } else {
            // Menampilkan pesan berhasil pengguna diubah
            session()->setFlashdata('pesan', 'Pengguna berhasil diubah');
            return redirect()->to('/pegawai/user')->with('success', 'Data pengguna berhasil diperbarui');
        }
    }


    // Method function untuk menampilkan detail data user
    public function detail($id)
    {
        // Array data user
        $data = [
            'title' => 'Detail Data Pengguna',
            'active'  => 'user',
            'u' => $this->userModel->getUserById($id),
            // 'user' => $this->userModel->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Pengguna' => base_url('pegawai/user'),
                'Active Page' => 'Detail data pengguna'
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

        return view('pegawai/v_detail_user', $data);
    }
}
