<?php

namespace App\Controllers\Mahasiswa;

use App\Models\UserModel;
use App\Models\MahasiswaModel;
use App\Controllers\BaseController;
use CodeIgniter\Controller;

class Setting extends BaseController
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

        $session = session();
        $id_user = $session->get('users_id'); // Mengambil id_user dari session
        $level = $session->get('users_level'); // Mengambil level dari session

        $data = [
            'title' => 'Setitng',
            'active' => 'setting',
            'setting' => $this->userModel->find($id_user, $level),
            'nama_lengkap' => session()->get('nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('mahasiswa/dashboard'),
                'Setting' => base_url('mahasiswa/setting'),
                'Active Page' => 'Data setting'
            ]
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->mahasiswaModel->getProfile($id_user);
        $nama_lengkap = $profile['nama_lengkap'];
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        // Simpan nama lengkap ke dalam session
        session()->set('nama_lengkap', $nama_lengkap);

        return view('mahasiswa/v_setting', $data);
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
            'nama_lengkap' => session()->get('nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('mahasiswa/dashboard'),
                'Setting' => base_url('mahasiswa/setting'),
                'Active Page' => 'Edit setting'
            ]
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->mahasiswaModel->getProfile($id_user);
        $nama_lengkap = $profile['nama_lengkap'];
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        // Simpan nama lengkap ke dalam session
        session()->set('nama_lengkap', $nama_lengkap);
        return view('mahasiswa/v_edit_setting', $data);
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
            return redirect()->to('/mahasiswa/setting')->withInput()->with('errors', $this->validator);
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

        $this->userModel->update($id_user, $data);

        return redirect()->to('/mahasiswa/setting')->with('success', 'Data berhasil diubah.');
    }
}
