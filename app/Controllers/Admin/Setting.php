<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\DocumentModel;
use App\Models\MateriModel;
use App\Models\PengetahuanModel;
use CodeIgniter\Controller;

class Setting extends BaseController
{
    protected $userModel, $materiModel, $pengetahuanModel, $dokumenModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->materiModel = new MateriModel();
        $this->pengetahuanModel = new PengetahuanModel();
        $this->dokumenModel = new DocumentModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $session = session();
        $id_user = $session->get('users_id');
        $level = $session->get('users_level');

        $data = [
            'title' => 'Data Setting',
            'active' => 'setting',
            'setting' => $this->userModel->find($id_user, $level),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Setting' => base_url('admin/setting'),
                'Active Page' => 'Data setting'
            ]
        ];


        return view('admin/v_setting', $data);
    }

    // Method function untuk edit data setting
    public function edit()
    {
        $session = session();
        $id_user = $session->get('users_id');
        $level = $session->get('users_level');

        $data = [
            'title' => 'Edit Setitng',
            'active' => 'setting',
            'setting' => $this->userModel->find($id_user, $level),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Setting' => base_url('admin/setting'),
                'Active Page' => 'Edit setting'
            ]
        ];

        return view('admin/v_edit_setting', $data);
    }

    // Method function untuk update data setting
    public function update()
    {
        // Validasi input
        $validationRules = [
            'nama_lengkap' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/admin/setting')->withInput()->with('errors', $this->validator);
        }


        $id_user = $this->request->getPost('id_user');
        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        // Jika password tidak diubah, maka password yang akan diupdate adalah password yang lama
        if (empty($data['password'])) {
            unset($data['password']);
        }

        if ($this->userModel->update($id_user, $data)) {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           Data berhasil diubah.
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
            return redirect()->to('/admin/setting')->with('success', 'Data berhasil diubah.');
        } else {
            session()->setFlashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Data gagal diubah.
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
            return redirect()->to('/admin/setting')->with('error', 'Data gagal diubah.');
        }
    }
}
