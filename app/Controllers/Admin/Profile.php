<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\adminModel;
use App\Models\DosenModel;
use App\Models\PegawaiModel;
use App\Models\DocumentModel;
use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\MateriModel;
use App\Models\PengetahuanModel;

class Profile extends BaseController
{
    protected $userModel, $dokumenModel, $adminModel, $dosenModel, $pegawaiModel, $pengetahuanModel, $materiModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->dokumenModel = new DocumentModel();
        $this->dosenModel = new DosenModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->pengetahuanModel = new PengetahuanModel();
        $this->materiModel = new MateriModel();
    }

    public function index()
    {
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);

        $data = [
            'title' => 'Profile',
            'active' => 'profile',
            // 'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'id_user' => session()->get('users_id'),
            'profile' => $user
        ];

        // Get id_user from session
        // $id_user = session()->get('users_id');
        // $data['user'] = $this->userModel->find($id_user);

        return view('admin/v_profile', $data);
    }

    public function edit()
    {
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);

        $data = [
            'title' => 'Edit Profile',
            'active' => 'profile',
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'profile' => $user
        ];

        // // Get id_user from session
        // $id_user = session()->get('users_id');
        // $data['user'] = $this->userModel->find($id_user);


        return view('admin/v_edit_profile', $data);
    }


    public function update()
    {
        // Get id_user from session
        $id_user = session()->get('users_id');

        // Get user data from tb_users
        $user = $this->userModel->find($id_user);


        if (is_array($user)) {
            $user = (object) $user;
        }

        $rules = [
            'nama_lengkap' => 'required',
            'email' => 'required|valid_email',
            'status' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Update data in tb_users
        $user->nama_lengkap = $this->request->getPost('nama_lengkap');
        $user->email = $this->request->getPost('email');
        $user->status = $this->request->getPost('status');
        $this->userModel->save($user);

        // Update session data for top bar
        $session = session();
        $session->set('users_nama_lengkap', $user->nama_lengkap);

        return redirect()->to('/admin/profile')->with('success', 'Profile berhasil diubah');
    }
}
