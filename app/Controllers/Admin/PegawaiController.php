<?php

namespace App\Controllers\Admin;

use App\Models\PegawaiModel;
use App\Controllers\BaseController;

class PegawaiController extends BaseController
{
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Pegawai',
            'pegawai' => $this->pegawaiModel->findAll(),
            'level' => session()->get('users_level'),
            'active' => 'riwayat',
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Pegawai' => base_url('admin/pegawai'),
                'Active Page' => 'Data Pegawai'
            ]
        ];

        return view('admin/v_data_pegawai', $data);
    }

    // Method controller untuk inspect data pegawai
    public function inspect($id)
    {
        $data = [
            'title' => 'Data Pegawai',
            'pegawai' => $this->pegawaiModel->find($id),
            'level' => session()->get('users_level'),
            'active' => 'riwayat',
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Pegawai' => base_url('admin/pegawai'),
                'Active Page' => 'Data Pegawai'
            ]
        ];

        return view('admin/v_data_pegawai_inspect', $data);
    }
}
