<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class Berita extends BaseController
{
    protected $userModel, $beritaModel, $MahasiswaModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->beritaModel = new BeritaModel();
        $this->MahasiswaModel = new MahasiswaModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Mahasiswa | Data Berita',
            'active' => 'berita',
            'beritas' => $this->beritaModel->where('status', 'draft')->findAll(), // Menampilkan dokumen dengan status bukan ditolak
            'berita' => $this->beritaModel->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('mahasiswa/dashboard'),
                'Forum berita' => base_url('mahasiswa/berita'),
                'Active Page' => 'Data Forum Berita'
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


        return view('mahasiswa/v_berita', $data);
    }
}
