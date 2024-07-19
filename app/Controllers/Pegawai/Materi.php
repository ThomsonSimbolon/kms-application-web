<?php

namespace App\Controllers\Pegawai;

use App\Models\materiModel;
use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class Materi extends BaseController
{
    protected $materiModel, $userModel, $PegawaiModel;

    public function __construct()
    {
        $this->materiModel = new MateriModel();
        $this->userModel = new UserModel();
        $this->PegawaiModel = new PegawaiModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }
        // Mengambil id_user dari session
        $id_user = session()->get('users_id');

        $data = [
            'title' => 'Data Materi',
            'active' => 'materi',
            'subtitle' => 'materi',
            'materies' => $this->materiModel->getMateriByUser($id_user), // Ambil data dokumen dari session
            'm' => $this->materiModel->where('status', 'diterima')->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Materi' => base_url('pegawai/materi'),
                'Active Page' => 'Data Materi'
            ]
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->PegawaiModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('pegawai/v_materi', $data);
    }

    // Method function untuk menampilkan data pribadi
    public function pribadi()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');

        $data = [
            'title' => 'Data Materi',
            'active' => 'materi',
            'subtitle' => 'materi',
            'materies' => $this->materiModel->getMateriByUser($id_user), // Ambil data dokumen dari session
            'm' => $this->materiModel->where('status', 'diterima')->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Materi' => base_url('pegawai/materi'),
                'Active Page' => 'Data Pribadi'
            ]
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->PegawaiModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('pegawai/pribadi/v_materi', $data);
    }

    // Method function untuk add data materi
    public function add()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Tambah Data Materi',
            'active' => 'materi',
            'subtitle' => 'materi',
            'materi' => $this->materiModel->findAll(),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Materi' => base_url('pegawai/materi'),
                'Active Page' => 'Tambah Data Materi',
            ],
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->PegawaiModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('pegawai/v_tambah_materi', $data);
    }

    // Method function untuk post data data materi
    public function create()
    {
        // Validasi input
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $validation->setRules([
                'nama_lengkap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'mata_kuliah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'judul_materi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'program_studi' => [
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
                session()->setFlashdata('failed', 'Data pengetahuan gagal diubah');
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

            // Simpan data ke database
            $data = [
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'mata_kuliah' => $this->request->getVar('mata_kuliah'),
                'judul_materi' => $this->request->getVar('judul_materi'),
                'program_studi' => $this->request->getVar('program_studi'),
                'file_path' => $originalName, // Gunakan $originalName sebagai nama file yang disimpan di database
                'tgl_upload' => date('Y-m-d H:i:s'),
                'tgl_ubah' => date('Y-m-d H:i:s'),
                'status' => 'pending',
                'id_user' => session()->get('users_id'),

            ];

            if ($this->materiModel->insert($data)) {
                // Menampilkan pesan materi berhasil ditambah
                session()->setFlashdata('pesan', 'Data berhasil ditambahkan dan sedang diproses.');
                return redirect()->to('/pegawai/materi')->with('success', 'Data berhasil ditambahkan dan sedang diproses.');
            } else {
                // Menampilkan pesan materi gagal ditambah
                session()->setFlashdata('pesan', 'Data gagal ditambahkan');
                return redirect()->to('/pegawai/materi')->with('error', 'Data gagal ditambahkan');
            }
        }
    }

    public function edit($id)
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Edit Data Materi',
            'active' => 'materi',
            'subtitle' => 'edit materi',
            'materi' => $this->materiModel->find($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Materi' => base_url('pegawai/materi'),
                'Active Page' => 'Edit Materi'
            ]
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->PegawaiModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;


        return view('pegawai/v_edit_materi', $data);
    }

    // Method function untuk post edit data materi
    public function update($id)
    {
        // Validasi input
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $validation->setRules([
                'nama_lengkap' => 'required',
                'mata_kuliah' => 'required',
                'judul_materi' => 'required',
                'program_studi' => 'required',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
                session()->setFlashdata('failed', 'Data pengetahuan gagal diubah');
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            // Ambil data materi dari database berdasarkan Id
            $materi = $this->materiModel->find($id);
            if (!$materi) {
                session()->setFlashdata('pesan', 'Materi tidak ditemukan');
                return redirect()->to('/dosen/materi')->with('error', 'Materi tidak ditemukan');
            }
            // Proses upload file
            $file_path = $this->request->getFile('file_path');
            if ($file_path->isValid() && !$file_path->hasMoved()) {
                // Dapatkan nama file asli
                $originalName = $file_path->getClientName();
                // Pindahkan file ke folder uploads dengan nama asli
                $file_path->move(ROOTPATH . 'public/uploads', $originalName);
            }

            // Simpan data ke database
            $data = [
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'mata_kuliah' => $this->request->getVar('mata_kuliah'),
                'judul_materi' => $this->request->getVar('judul_materi'),
                'program_studi' => $this->request->getVar('program_studi'),
                'file_path' => isset($originalName) ? $originalName : $materi['file_path'],
                'tgl_upload' => date('Y-m-d H:i:s'),
                'tgl_ubah' => date('Y-m-d H:i:s'),
            ];

            if ($this->materiModel->update($id, $data)) {
                // Menampilkan pesan materi berhasil diubah
                session()->setFlashdata('pesan', 'Data berhasil diubah');
                return redirect()->to('/pegawai/materi')->with('success', 'Data berhasil diubah');
            } else {
                // Menampilkan pesan materi gagal diubah
                session()->setFlashdata('pesan', 'Data gagal diubah');
                return redirect()->to('/pegawai/materi')->with('error', 'Data gagal diubah');
            }
        }
    }

    // Fungsi untuk menampilkan detail data materi
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Materi',
            'active' => 'materi',
            'materi' => $this->materiModel->find($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'id_materi' => $id,
            'subtitle' => 'materi',
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Materi' => base_url('pegawai/materi'),
                'Active Page' => 'Detail Data Materi'
            ]
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->PegawaiModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('pegawai/v_detail_materi', $data);
    }


    // Fungsi untuk mendownload data yang sudah di upload
    public function download($id)
    {
        $model = new materiModel();
        $materi = $model->getmateriById($id);
        $materi = $model->find($id);

        $path = ROOTPATH . 'public/uploads/' . $materi['file_path'];

        return $this->response->download($path, NULL);
    }

    // Fungsi untuk menghapus data
    public function delete($id)
    {
        $this->materiModel->deleteMateri($id);

        session()->setFlashdata('pesan', 'Data pengguna berhasil dihapus');
        return redirect()->to('/pegawai/materi')->with('success', 'Materi berhasil dihapus');
    }
}
