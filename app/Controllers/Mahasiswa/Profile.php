<?php

namespace App\Controllers\Mahasiswa;

use App\Models\UserModel;
use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use App\Models\PegawaiModel;
use App\Models\DocumentModel;
use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Profile extends BaseController
{
    protected $userModel, $dokumenModel, $mahasiswaModel, $dosenModel, $pegawaiModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->dokumenModel = new DocumentModel();
        $this->mahasiswaModel = new MahasiswaModel();
        $this->dosenModel = new DosenModel();
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Profile',
            'active' => 'profile',
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            // 'profile' => $this->mahasiswaModel->getAllMahasiswa()
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->mahasiswaModel->getProfile($id_user);
        $nama_lengkap = $profile['nama_lengkap'];
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        // Simpan nama lengkap ke dalam session
        session()->set('nama_lengkap', $nama_lengkap);

        if (!$user) {
            return redirect()->to('/auth');
        }

        $dataMahasiswa = $this->mahasiswaModel->where('id_user', $id_user)->first();

        if (!$dataMahasiswa) {
            $data = [
                'id_user' => $user['id_user'],
            ];

            $this->mahasiswaModel->insertMahasiswa($data);
        }

        return view('mahasiswa/v_profile', $data);
    }

    public function edit()
    {

        $data = [
            'title' => 'Edit Profile',
            'active' => 'profile',
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('mahasiswa/dashboard'),
                'Profile' => base_url('mahasiswa/profile'),
                'Active Page' => 'Edit profile'
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

        return view('mahasiswa/v_edit_profile', $data);
    }


    public function update()
    {
        // Get id_user from session
        $id_user = session()->get('users_id');
        $id_mhs = session()->get('id_mhs');

        // Get data mahasiswa from tb_mahasiswa and tb_users
        $profile = $this->mahasiswaModel->getProfile($id_user);

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'nim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'program_studi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tahun_angkatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'upload_foto' => [
                'rules' => 'uploaded[upload_foto]|max_size[upload_foto,1024]|ext_in[upload_foto,png,jpg,jpeg]|max_dims[upload_foto,530,530]',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'Ukuran file terlalu besar. Maksimal 1MB',
                    'ext_in' => 'Hanya file PNG, JPG, atau JPEG yang diizinkan',
                    'max_dims' => 'Dimensi gambar harus maksimal 530x530 piksel',
                ]
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
            session()->setFlashdata('failed', 'Data profile gagal ditambahkan');
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $upload_foto = $this->request->getFile('upload_foto');
        if ($upload_foto && $upload_foto->isValid() && !$upload_foto->hasMoved()) {
            $newName = $upload_foto->getClientName();
            $upload_foto->move(ROOTPATH . 'public/uploads/', $newName);
            $profile['upload_foto'] = $newName;
        }

        // Update data in tb_mahasiswa
        $this->mahasiswaModel->update($profile['id_mhs'], [
            'id_user' => $this->request->getPost('id_user'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nim' => $this->request->getPost('nim'),
            'program_studi' => $this->request->getPost('program_studi'),
            'tahun_angkatan' => $this->request->getPost('tahun_angkatan'),
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

        // $session = session();
        // $session->set('nama_lengkap', $this->request->getPost('nama_lengkap'));

        // Redirect ke halaman profile
        session()->setFlashdata('msg', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data profile berhasil diubah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        return redirect()->to('/mahasiswa/profile')->with('success', 'Data Profile berhasil diubah');
    }
}
