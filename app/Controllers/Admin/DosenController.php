<?php

namespace App\Controllers\Admin;

use App\Models\DosenModel;
use App\Controllers\BaseController;

class DosenController extends BaseController
{
    protected $dosenModel;

    public function __construct()
    {
        $this->dosenModel = new DosenModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Dosen',
            'dosen' => $this->dosenModel->findAll(),
            'level' => session()->get('users_level'),
            'active' => 'riwayat',
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Dosen' => base_url('admin/dosen'),
                'Active Page' => 'Data Dosen'
            ]
        ];

        return view('admin/v_data_dosen', $data);
    }

    // Method controller untuk inspect data dosen
    public function inspect($id)
    {
        $data = [
            'title' => 'Data Dosen',
            'dosen' => $this->dosenModel->find($id),
            'level' => session()->get('users_level'),
            'active' => 'riwayat',
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Dosen' => base_url('admin/dosen'),
                'Active Page' => 'Data Dosen'
            ]
        ];

        return view('admin/v_data_dosen_inspect', $data);
    }
}
