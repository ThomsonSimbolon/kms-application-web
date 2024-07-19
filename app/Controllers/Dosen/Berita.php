<?php

namespace App\Controllers\Dosen;

use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\DosenModel;
use CodeIgniter\Controller;

class Berita extends BaseController
{
    protected $userModel, $beritaModel, $dosenModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->beritaModel = new BeritaModel();
        $this->dosenModel = new DosenModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Dosen | Data Berita',
            'active' => 'berita',
            'beritas' => $this->beritaModel->where('status', 'draft')->findAll(), // Menampilkan dokumen dengan status bukan ditolak
            'berita' => $this->beritaModel->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('dosen/dashboard'),
                'Forum berita' => base_url('dosen/berita'),
                'Active Page' => 'Data Forum Berita'
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


        return view('dosen/v_berita', $data);
    }
}
