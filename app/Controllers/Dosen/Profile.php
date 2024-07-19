<?php

namespace App\Controllers\Dosen;

use App\Models\UserModel;
use App\Models\DosenModel;
use App\Models\DocumentModel;
use App\Controllers\BaseController;

class Profile extends BaseController
{
    protected $userModel, $dokumenModel, $mahasiswaModel, $dosenModel, $pegawaiModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->dokumenModel = new DocumentModel();
        $this->dosenModel = new DosenModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Dosen | Data Profile',
            'active' => 'profile',
            'nama_lengkap' => session()->get('users_nama_lengkap'),
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->dosenModel->getProfile($id_user);
        $nama_lengkap = $profile['nama_lengkap'];
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        // Simpan nama lengkap ke dalam session
        session()->set('nama_lengkap', $nama_lengkap);

        if (!$user) {
            return redirect()->to('/auth');
        }

        $dataDosen = $this->dosenModel->where('id_user', $id_user)->first();

        if (!$dataDosen) {
            $data = [
                'id_user' => $user['id_user'],
            ];

            $this->dosenModel->insert($data);
        }

        return view('dosen/v_profile', $data);
    }

    public function edit()
    {

        $data = [
            'title' => 'Edit Profile',
            'active' => 'profile',
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('dosen/dashboard'),
                'Profile' => base_url('dosen/profile'),
                'Active Page' => 'Edit Data Profile'
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


        return view('dosen/v_edit_profile', $data);
    }


    public function update()
    {
        // Get id_user from session
        $id_user = session()->get('users_id');
        $id_dosen = session()->get('id_dosen');

        // Get data mahasiswa from tb_mahasiswa and tb_users
        $profile = $this->dosenModel->getProfile($id_user);

        // if (is_array($profile)) {
        //     $profile = (object) $profile;
        // }


        // Validate the data (you can add more validation rules as needed)
        $validationRules = [
            'nama_lengkap' => 'required',
            'nidn' => 'required',
            'jabatan' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required|valid_email',
            'alamat' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $upload_foto = $this->request->getFile('upload_foto');
        if ($upload_foto && $upload_foto->isValid() && !$upload_foto->hasMoved()) {
            $newName = $upload_foto->getClientName();
            $upload_foto->move(ROOTPATH . 'public/uploads', $newName);
            $profile['upload_foto'] = $newName;
        }

        // Update data in tb_dosen
        $this->dosenModel->update($profile['id_dosen'], [
            'id_user' => $this->request->getPost('id_user'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nidn' => $this->request->getPost('nidn'),
            'jabatan' => $this->request->getPost('jabatan'),
            'agama' => $this->request->getPost('agama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'upload_foto' => isset($newName) ? $newName : $profile['upload_foto'],
        ]);



        // Update data in tb_users
        $this->userModel->updateUsers($id_user, [
            'email' => $this->request->getPost('email'),
            'status' => $this->request->getPost('status'),
        ]);

        $session = session();
        $session->set('users_nama_lengkap', $this->request->getPost('nama_lengkap'));

        // Redirect ke halaman profile
        session()->setFlashdata('msg', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data profile berhasil diubah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        return redirect()->to('/dosen/profile')->with('success', 'Data profile berhasil diubah');
    }
}
