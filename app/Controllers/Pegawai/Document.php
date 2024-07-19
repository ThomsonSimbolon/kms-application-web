<?php

namespace App\Controllers\Pegawai;

use App\Models\DocumentModel;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\UserModel;

class Document extends BaseController
{
    protected $dokumenModel, $userModel, $pegawaiModel;

    public function __construct()
    {
        $this->dokumenModel = new DocumentModel();
        $this->userModel = new UserModel();
        $this->pegawaiModel = new PegawaiModel();
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
            'title' => 'Data Dokumen',
            'active' => 'dokumen',
            'subtitle' => 'dokumen',
            'documents' => $this->dokumenModel->getDocumentsByUser($id_user), // Ambil data dokumen dari session
            'dokumen' => $this->dokumenModel->where('status', 'diterima')->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Dokumen' => base_url('pegawai/document'),
                'Active Page' => 'Data dokumen'
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


        return view('pegawai/v_dokumen', $data);
    }

    // Method function untuk menampilkan data pribadi dokumen
    public function pribadi()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');

        $data = [
            'title' => 'Dokumen',
            'active' => 'dokumen',
            'subtitle' => 'dokumen',
            'documents' => $this->dokumenModel->getDocumentsByUser($id_user), // Ambil data dokumen dari session
            'dokumen' => $this->dokumenModel->where('status', 'diterima')->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Dokumen' => base_url('pegawai/document'),
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

        return view('pegawai/pribadi/v_dokumen', $data);
    }

    // Method function untuk add data dokumen
    public function add()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Tambah Data Dokumen',
            'active' => 'dokumen',
            'subtitle' => 'dokumen',
            'dokumen' => $this->dokumenModel->findAll(),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Dokumen' => base_url('pegawai/document'),
                'Active Page' => 'Tambah Data Dokumen',
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

        return view('pegawai/v_tambah_dokumen', $data);
    }

    // Method function untuk post data dokumen
    public function upload()
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
                'judul_dokumen' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'deskripsi' => [
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
                'judul_dokumen' => $this->request->getVar('judul_dokumen'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'file_path' => $originalName, // Gunakan $originalName sebagai nama file yang disimpan di database
                'tgl_upload' => date('Y-m-d H:i:s'),
                'tgl_ubah' => date('Y-m-d H:i:s'),
                'status' => 'pending',
                'id_user' => session()->get('users_id'),
            ];

            if ($this->dokumenModel->insert($data)) {
                // Menampilkan pesan dokumen berhasil ditambah
                session()->setFlashdata('pesan', 'Data berhasil ditambahkan dan sedang diproses.');
                return redirect()->to('/pegawai/document')->with('success', 'Data berhasil ditambahkan dan sedang diproses.');
            } else {
                // Menampilkan pesan dokumen gagal ditambah
                session()->setFlashdata('pesan', 'Data gagal ditambahkan');
                return redirect()->to('/pegawai/document')->with('error', 'Data gagal ditambahkan');
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
            'title' => 'Edit Data Dokumen',
            'active' => 'dokumen',
            'subtitle' => 'edit dokumen',
            'dokumen' => $this->dokumenModel->find($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Dokumen' => base_url('pegawai/document'),
                'Active Page' => 'Edit dokumen'
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

        return view('pegawai/v_edit_dokumen', $data);
    }

    // Method function untuk post edit data dokumen
    public function update($id)
    {
        // Validasi input
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $validation->setRules([
                'nama_lengkap' => 'required',
                'judul_dokumen' => 'required',
                'deskripsi' => 'required',
                'file_path' => 'uploaded[file_path]|max_size[file_path,1024]|ext_in[file_path,png,jpg,jpeg,pdf,doc,docx]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
                session()->setFlashdata('failed', 'Data pengetahuan gagal diubah');
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            // Ambil data dokumen dari database berdasarkan Id
            $dokumen = $this->dokumenModel->find($id);
            if (!$dokumen) {
                session()->setFlashdata('pesan', 'Dokumen tidak ditemukan');
                return redirect()->to('/dosen/document')->with('error', 'Dokumen tidak ditemukan');
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
                'judul_dokumen' => $this->request->getVar('judul_dokumen'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'file_path' => isset($originalName) ? $originalName : $dokumen['file_path'],
                'tgl_upload' => date('Y-m-d H:i:s'),
                'tgl_ubah' => date('Y-m-d H:i:s')
            ];

            if ($this->dokumenModel->update($id, $data)) {
                // Menampilkan pesan dokumen berhasil diubah
                session()->setFlashdata('pesan', 'Dokumen berhasil diubah');
                return redirect()->to('/pegawai/document')->with('success', 'Dokumen berhasil diubah');
            } else {
                // Menampilkan pesan dokumen gagal diubah
                session()->setFlashdata('pesan', 'Dokumen gagal diubah');
                return redirect()->to('/pegawai/document')->with('error', 'Dokumen gagal diubah');
            }
        }
    }

    // Fungsi untuk menampilkan detail data dokumen
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Dokumen',
            'active' => 'dokumen',
            'dokumen' => $this->dokumenModel->getDocumentById($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'id_dokumen' => $id,
            'subtitle' => 'dokumen',
            'breadcrumb' => [
                'Dashboard' => base_url('pegawai/dashboard'),
                'Dokumen' => base_url('pegawai/document'),
                'Active Page' => 'Detail Data Dokumen'
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

        return view('pegawai/v_detail_dokumen', $data);
    }

    // Fungsi untuk mendownload data yang sudah di upload
    public function download($id)
    {
        $dokumen = $this->dokumenModel->getDocumentById($id);
        $dokumen = $this->dokumenModel->find($id);

        $path = ROOTPATH . 'public/uploads/' . $dokumen['file_path'];

        return $this->response->download($path, NULL);
    }

    // Fungsi untuk menghapus data
    public function delete($id)
    {
        $model = new DocumentModel();
        $model->deleteDocument($id);

        session()->setFlashdata('pesan', 'Data pengguna berhasil dihapus');
        return redirect()->to('/pegawai/document')->with('success', 'Dokumen berhasil dihapus');
    }
}
