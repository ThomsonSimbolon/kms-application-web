<?php

namespace App\Controllers\Admin;

use App\Models\MahasiswaModel;
use App\Controllers\BaseController;

class mahasiswaController extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->findAll(),
            'level' => session()->get('users_level'),
            'active' => 'riwayat',
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Mahasiswa' => base_url('admin/mahasiswa'),
                'Active Page' => 'Data Mahasiswa'
            ]
        ];

        return view('admin/v_data_mahasiswa', $data);
    }

    // Method controller untuk inspect data mahasiswa
    public function inspect($id)
    {
        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->find($id),
            'level' => session()->get('users_level'),
            'active' => 'riwayat',
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Mahasiswa' => base_url('admin/mahasiswa'),
                'Active Page' => 'Data Mahasiswa'
            ]
        ];

        return view('admin/v_data_mahasiswa_inspect', $data);
    }
}
