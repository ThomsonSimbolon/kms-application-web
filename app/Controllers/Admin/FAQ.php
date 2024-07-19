<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;

use App\Controllers\BaseController;
use CodeIgniter\Controller;

class FAQ extends BaseController
{
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Data FAQ',
            'active' => 'faq',
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'FAQ' => base_url('admin/faq'),
                'Active Page' => 'Data FAQ',
            ]
        ];

        return view('admin/v_faq', $data);
    }
}
