<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MahasiswaModel;
use App\Controllers\BaseController;
use App\Models\PengetahuanModel;

class Pengetahuan extends BaseController
{
    protected $userModel, $mahasiswaModel, $pengetahuanModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->mahasiswaModel = new MahasiswaModel();
        $this->pengetahuanModel = new PengetahuanModel();
    }

    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $id_user = session()->get('users_id');

        $data = [
            'title' => 'Data Pengetahuan',
            'active' => 'pengetahuan',
            'pengetahuans' => $this->pengetahuanModel->getPengetahuanByUser($id_user), // Ambil data dokumen dari session
            'p' => $this->pengetahuanModel->where('status', 'diterima')->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('mahasiswa/dashboard'),
                'Pengetahuan' => base_url('mahasiswa/pengetahuan'),
                'Active Page' => 'Data pengetahuan'
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


        return view('mahasiswa/v_pengetahuan', $data);
    }

    // Method function untuk detail data pengetahuan
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Pengetahuan',
            'active' => 'pengetahuan',
            'pengetahuan' => $this->pengetahuanModel->findAll(),
            'pengetahuan' => $this->pengetahuanModel->find($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('mahasiswa/dashboard'),
                'Pengetahuan' => base_url('mahasiswa/pengetahuan'),
                'Active Page' => 'Deta pengetahuan'
            ],
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->mahasiswaModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('mahasiswa/v_detail_pengetahuan', $data);
    }

    // Fungsi untuk mendownload data yang sudah di upload
    public function download($id)
    {
        $model = new PengetahuanModel();
        $pengetahuan = $model->findAll($id);
        $pengetahuan = $model->find($id);

        $path = ROOTPATH . 'public/uploads/' . $pengetahuan->file_path;

        return $this->response->download($path, NULL);
    }
}