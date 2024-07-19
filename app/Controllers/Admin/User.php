<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;

use App\Controllers\BaseController;
use App\Models\DocumentModel;
use App\Models\MateriModel;
use App\Models\PengetahuanModel;
use CodeIgniter\Controller;
use Config\Session;

class User extends BaseController
{
    protected $userModel, $pengetahuanModel, $dokumenModel, $materiModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pengetahuanModel = new PengetahuanModel();
        $this->dokumenModel = new DocumentModel();
        $this->materiModel = new MateriModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Data Pengguna',
            'active'  => 'user',
            'user' => $this->userModel->getUsers(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Pengguna' => base_url('admin/user'),
                'Active Page' => 'Data pengguna'
            ]

        ];

        return view('admin/v_user', $data);
    }

    // fungsi untuk menambahkan user
    public function create()
    {
        $model = new \App\Models\UserModel();

        $data['title'] = 'Tambah Data Pengguna';
        $data['active'] = 'user';
        $data['subtitle'] = 'User';


        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getVar('level'),
            // 'created_at' => $this->request->getVar('created_at'),
            // 'updated_at' => $this->request->getVar('updated_at')
        ];

        if ($model->insert($data)) {
            // Menampilkan pesan berhasil pengguna ditambah
            session()->setFlashdata('pesan', 'Pengguna berhasil ditambah');
            return redirect()->to('/admin/user')->with('success', 'Pengguna berhasil ditambahkan');
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
        $data['user'] = $userModel->getUserById($id);
        $data['level'] = session()->get('users_level');

        return view('admin/v_edit_user', $data);
    }

    // fungsi untuk edit user
    public function update($id)
    {
        $userModel = new UserModel();

        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
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
            return redirect()->to('/admin/user')->with('success', 'Data pengguna berhasil diperbarui');
        }
    }

    // fungsi untuk status aktif user
    public function approve($userId)
    {
        $userModel = new UserModel();
        $userModel->update($userId, ['status' => 'aktif']);

        return redirect()->to('/admin/user'); // Sesuaikan dengan route yang menampilkan daftar mahasiswa
    }

    public function disapprove($userId)
    {
        $userModel = new UserModel();
        $userModel->update($userId, ['status' => 'tidak aktif']);

        return redirect()->to('/admin/user'); // Sesuaikan dengan route yang menampilkan daftar mahasiswa
    }

    // Method function untuk menampilkan detail data user
    public function detail($id)
    {
        // Array data user
        $data = [
            'title' => 'Detail Data Pengguna',
            'active'  => 'user',
            'user' => $this->userModel->getUserById($id),
            // 'user' => $this->userModel->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Pengguna' => base_url('admin/user'),
                'Active Page' => 'Detail data pengguna'
            ]
        ];

        return view('admin/v_detail_user', $data);
    }


    // fungsi untuk menghapus user
    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->deleteUser($id);

        return redirect()->to('/admin/user')->with('success', 'User berhasil dihapus');
    }
}
