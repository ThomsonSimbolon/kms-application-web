<?php

namespace App\Controllers\Mahasiswa;

use App\Models\materiModel;
use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class Materi extends BaseController
{
    protected $materiModel, $userModel, $MahasiswaModel;

    public function __construct()
    {
        $this->materiModel = new MateriModel();
        $this->userModel = new UserModel();
        $this->MahasiswaModel = new MahasiswaModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');

        $data = [
            'title' => 'Data Materi',
            'active' => 'materi',
            'subtitle' => 'materi',
            'materies' => $this->materiModel->getMateriByUser($id_user), // Ambil data dokumen dari session
            'm' => $this->materiModel->where('status', 'diterima')->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('mahasiswa/dashboard'),
                'Materi' => base_url('mahasiswa/materi'),
                'Active Page' => 'Data Materi'
            ]
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->MahasiswaModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('mahasiswa/v_materi', $data);
    }

    // Fungsi untuk menampilkan detail data materi
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Materi',
            'active' => 'materi',
            'materi' => $this->materiModel->find($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'id_materi' => $id,
            'subtitle' => 'materi',
            'breadcrumb' => [
                'Dashboard' => base_url('mahasiswa/dashboard'),
                'Materi' => base_url('mahasiswa/materi'),
                'Active Page' => 'Detail Data Materi'
            ]
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->MahasiswaModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('mahasiswa/v_detail_materi', $data);
    }


    // Fungsi untuk mendownload data yang sudah di upload
    public function download($id)
    {
        // Validasi apakah pengguna adalah mahasiswa
        if (session()->get('user_level') !== 'mahasiswa') {
            return redirect()->to('/');
        }

        $model = new materiModel();
        $materi = $model->getmateriById($id);
        $materi = $model->find($id);

        $path = ROOTPATH . 'public/uploads/' . $materi['file_path'];

        return $this->response->download($path, NULL);
    }
}