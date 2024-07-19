<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NotifikasiModel;

class Notifikasi extends BaseController
{
    protected $notifikasiModel;

    public function __construct()
    {
        $this->notifikasiModel = new NotifikasiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Notifikasi',
            'notifikasi' => $this->notifikasiModel->findAll(),
            'active' => 'notifikasi',
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Notifikasi' => base_url('admin/notifikasi'),
                'Active Page' => 'Data Notifikasi',
            ],
        ];

        return view('admin/v_notifikasi', $data);
    }

    public function delete()
    {
        $notifikasiModel = new NotifikasiModel();
        $notifikasiModel->truncate(); // Menghapus semua data dari tabel notifikasi

        return redirect()->back()->with('success', 'Semua pemberitahuan berhasil dihapus.');
    }
}
