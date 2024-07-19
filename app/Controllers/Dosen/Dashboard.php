<?php

namespace App\Controllers\Dosen;

use App\Controllers\BaseController;
use App\Models\DiskusiModel;
use App\Models\DocumentModel;
use App\Models\DosenModel;
use App\Models\MateriModel;
use App\Models\PengetahuanModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $userModel, $dokumenModel, $dosenModel, $pengetahuanModel, $materiModel, $diskusiModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->dokumenModel = new DocumentModel();
        $this->dosenModel = new DosenModel();
        $this->pengetahuanModel = new PengetahuanModel();
        $this->materiModel = new MateriModel();
        $this->diskusiModel = new DiskusiModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Dosen | Dashboard',
            'active' => 'dashboard',
            'total_users' => $this->userModel->countUsers(),
            'total_pengetahuan' => $this->pengetahuanModel->countPengetahuan(),
            'total_document' => $this->dokumenModel->countDocument(),
            'total_materi' => $this->materiModel->countMateri(),
            'total_diskusi' => $this->diskusiModel->countDiskusi(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->dosenModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;


        return view('dosen/v_dashboard', $data);
    }
}
