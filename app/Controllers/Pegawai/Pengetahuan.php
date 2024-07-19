<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\PengetahuanModel;
use App\Models\UserModel;

class Pengetahuan extends BaseController
{
    protected $userModel, $pegawaiModel, $pengetahuanModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->pengetahuanModel = new PengetahuanModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $id_user = session()->get('users_id');

        $data = [
            'title' => 'Data Pengetahuan',
            'active' => 'pengetahuan',
            'pengetahuans' => $this->pengetahuanModel->getPengetahuanByUser($id_user), // Ambil data dokumen dari session
            'p' => $this->pengetahuanModel->where('status', 'diterima')->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Pengetahuan' => base_url('pegawai/pengetahuan'),
                'Active Page' => 'Data Pengetahuan'
            ]
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->pegawaiModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;


        return view('pegawai/v_pengetahuan', $data);
    }

    // Method function untuk menampilkan data pribadi pengetahuan
    public function pribadi()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $id_user = session()->get('users_id');

        $data = [
            'title' => 'Validasi Pengetahuan',
            'active' => 'pengetahuan',
            'pengetahuans' => $this->pengetahuanModel->getPengetahuanByUser($id_user), // Ambil data dokumen dari session
            'p' => $this->pengetahuanModel->where('status', 'diterima')->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Pengetahuan' => base_url('pegawai/pengetahuan'),
                'Active Page' => 'Data Pribadi'
            ]
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->pegawaiModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;


        return view('pegawai/pribadi/v_pengetahuan', $data);
    }

    // Method function untuk menambah data pengetahuan
    public function add()
    {
        $data = [
            'title' => 'Tambah Data Pengetahuan',
            'active' => 'pengetahuan',
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'pengetahuan' => $this->pengetahuanModel->findAll(),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Pengetahuan' => base_url('pegawai/pengetahuan'),
                'Active Page' => 'Tambah Pengetahuan'
            ],
            'validation' => \Config\Services::validation()
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->pegawaiModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;


        return view('pegawai/v_tambah_pengetahuan', $data);
    }

    // Method function untuk post data pengetahuan
    public function create()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'judul_pengetahuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jenis_pengetahuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'deskripsi_pengetahuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'file_path' => [
                'rules' => 'uploaded[file_path]|max_size[file_path,1024]|ext_in[file_path,png,jpg,jpeg,pdf,doc,docx]',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'Ukuran file terlalu besar. Maksimal 1MB',
                    'ext_in' => 'Hanya file PNG, JPG, JPEG, PDF, DOC, atau DOCX yang diizinkan'
                ]
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
            session()->setFlashdata('failed', 'Data pengetahuan gagal ditambahkan');
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Proses upload file
        $file_path = $this->request->getFile('file_path');
        if ($file_path->isValid() && !$file_path->hasMoved()) {
            // Dapatkan nama file asli
            $originalName = $file_path->getClientName();
            // Pindahkan file ke folder uploads dengan nama asli
            $file_path->move(ROOTPATH . 'public/uploads', $originalName);
        }

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'judul_pengetahuan' => $this->request->getPost('judul_pengetahuan'),
            'jenis_pengetahuan' => $this->request->getPost('jenis_pengetahuan'),
            'deskripsi_pengetahuan' => $this->request->getPost('deskripsi_pengetahuan'),
            'file_path' => $originalName,
            'tgl_posting' => date('Y-m-d H:i:s'),
            'tgl_ubah' => date('Y-m-d H:i:s'),
            'status' => 'pending',
            'id_user' => session()->get('users_id')
        ];

        if ($this->pengetahuanModel->insert($data)) {
            // Menampilkan pesan materi berhasil ditambah
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan dan sedang diproses.');
            return redirect()->to('/pegawai/pengetahuan')->with('success', 'Data berhasil ditambahkan dan sedang diproses.');
        } else {
            // Menampilkan pesan materi gagal ditambah
            session()->setFlashdata('pesan', 'Data gagal ditambahkan');
            return redirect()->to('/pegawai/pengetahuan')->with('error', 'Data gagal ditambahkan');
        }


        // return redirect()->to(site_url('pegawai/pengetahuan'))->with('success', 'Data pengetahuan berhasil disimpan');
    }

    // Method function untuk edit data pengetahuan
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Pengetahuan',
            'active' => 'pengetahuan',
            'pengetahuan' => $this->pengetahuanModel->findAll(),
            'pengetahuan' => $this->pengetahuanModel->find($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Pengetahuan' => base_url('pegawai/pengetahuan'),
                'Active Page' => 'Edit Pengetahuan'
            ],
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->pegawaiModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('pegawai/v_edit_pengetahuan', $data);
    }

    // Method function untuk update data pengetahuan
    public function update($id)
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'judul_pengetahuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jenis_pengetahuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'deskripsi_pengetahuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
            session()->setFlashdata('failed', 'Data pengetahuan gagal diubah');
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }


        // Ambil data materi dari database berdasarkan Id
        $pengetahuan = $this->pengetahuanModel->find($id);
        if (!$pengetahuan) {
            session()->setFlashdata('pesan', 'Pengetahuan tidak ditemukan');
            return redirect()->to('/admin/pengetahuan')->with('error', 'Pengetahuan tidak ditemukan');
        }

        // Proses upload file
        $file_path = $this->request->getFile('file_path');
        if ($file_path->isValid() && !$file_path->hasMoved()) {
            // Dapatkan nama file asli
            $originalName = $file_path->getClientName();
            // Pindahkan file ke folder uploads dengan nama asli
            $file_path->move(ROOTPATH . 'public/uploads', $originalName);
        }

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'judul_pengetahuan' => $this->request->getPost('judul_pengetahuan'),
            'jenis_pengetahuan' => $this->request->getPost('jenis_pengetahuan'),
            'deskripsi_pengetahuan' => $this->request->getPost('deskripsi_pengetahuan'),
            'file_path' => isset($originalName) ? $originalName : $pengetahuan->file_path,
            'tgl_posting' => date('Y-m-d H:i:s'),
            'tgl_ubah' => date('Y-m-d H:i:s'),
        ];

        $this->pengetahuanModel->updatePengetahuan($id, $data);

        return redirect()->to(site_url('pegawai/pengetahuan'))->with('success', 'Data pengetahuan berhasil diubah');
    }

    // Method function untuk hapus data pengetahuan
    public function delete($id)
    {
        $this->pengetahuanModel->deletePengetahuan($id);
        return redirect()->to(site_url('pegawai/pengetahuan'))->with('success', 'Data pengetahuan berhasil dihapus');
    }

    // Method function untuk detail data pengetahuan
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Pengetahuan',
            'active' => 'pengetahuan',
            'pengetahuan' => $this->pengetahuanModel->findAll(),
            'pengetahuan' => $this->pengetahuanModel->find($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Pengetahuan' => base_url('pegawai/pengetahuan'),
                'Active Page' => 'Deta Pengetahuan'
            ],
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->pegawaiModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('pegawai/v_detail_pengetahuan', $data);
    }

    // Fungsi untuk mendownload data yang sudah di upload
    public function download($id)
    {
        $model = new PengetahuanModel();
        $pengetahuan = $model->findAll($id);
        $pengetahuan = $model->find($id);

        $path = ROOTPATH . 'public/uploads/' . $pengetahuan->file_path;

        return $this->response->download($path, NULL);
    }
}
