<?php

namespace App\Controllers\Mahasiswa;

use App\Models\DocumentModel;
use App\Models\MahasiswaModel;
use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\Controller;

class Document extends BaseController
{
    protected $dokumenModel, $mahasiswaModel, $userModel;

    public function __construct()
    {
        $this->dokumenModel = new DocumentModel();
        $this->mahasiswaModel = new MahasiswaModel();
        $this->userModel = new UserModel();
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
            'title' => 'Data Dokumen',
            'active' => 'dokumen',
            'subtitle' => 'dokumen',
            'documents' => $this->dokumenModel->getDocumentsByUser($id_user), // Ambil data dokumen dari session
            'dokumen' => $this->dokumenModel->where('status', 'diterima')->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('mahasiswa/dashboard'),
                'Dokumen' => base_url('mahasiswa/document'),
                'Active Page' => 'Data Dokumen',
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


        return view('mahasiswa/v_dokumen', $data);
    }

    // Fungsi untuk menampilkan detail data dokumen 
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Dokumen',
            'active' => 'dokumen',
            'dokumen' => $this->dokumenModel->getDocumentById($id),
            'id_dokumen' => $id,
            'subtitle' => 'dokumen',
            'breadcrumb' => [
                'Dashboard' => base_url('mahasiswa/dashboard'),
                'Dokumen' => base_url('mahasiswa/document'),
                'Active Page' => 'Detail dokumen'
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

        return view('mahasiswa/v_detail_dokumen', $data);
    }

    // Fungsi untuk mendownload data yang sudah di upload
    public function download($id)
    {
        $model = new DocumentModel();
        $dokumen = $model->getDocumentById($id);
        $dokumen = $model->find($id);

        $path = ROOTPATH . 'public/uploads/' . $dokumen['file_path'];

        return $this->response->download($path, NULL);
    }
}
