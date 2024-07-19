<?php

namespace App\Controllers\Pegawai;

use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\PegawaiModel;

class Setting extends BaseController
{
    protected $userModel, $pegawaiModel, $mahasiswaModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->mahasiswaModel = new MahasiswaModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $session = session();
        $id_user = $session->get('users_id'); // Mengambil id_user dari session
        $level = $session->get('users_level'); // Mengambil level dari session

        $data = [
            'title' => 'Pegawai | Data Setting',
            'active' => 'setting',
            'setting' => $this->userModel->find($id_user, $level),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Setting' => base_url('pegawai/setting'),
                'Active Page' => 'Data setting',
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

        return view('pegawai/v_setting', $data);
    }

    // Method function untuk edit data setting
    public function edit()
    {
        $session = session();
        $id_user = $session->get('users_id');
        $level = $session->get('users_level');

        $data = [
            'title' => 'Edit Setitng',
            'active' => 'setting',
            'setting' => $this->userModel->find($id_user, $level),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Setting' => base_url('pegawai/setting'),
                'Active Page' => 'Edit setting'
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

        return view('pegawai/v_edit_setting', $data);
    }

    // Method function untuk update data setting
    public function update()
    {
        // Validasi input
        $validationRules = [
            'nama_lengkap' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/pegawai/setting')->withInput()->with('errors', $this->validator);
        }


        $id_user = $this->request->getPost('id_user');
        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        // Jika password tidak diubah, maka password yang akan diupdate adalah password yang lama
        if (empty($data['password'])) {
            unset($data['password']);
        }

        if ($this->userModel->update($id_user, $data)) {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil diubah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            return redirect()->to('/pegawai/setting')->with('success', 'Data berhasil diubah.');
        } else {
            session()->setFlashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data gagal diubah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            return redirect()->to('/pegawai/setting')->with('error', 'Data gagal diubah.');
        }
    }
}
