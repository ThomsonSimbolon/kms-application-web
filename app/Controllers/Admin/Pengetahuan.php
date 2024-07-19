<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DocumentModel;
use App\Models\MahasiswaModel;
use App\Models\MateriModel;
use App\Models\NotifikasiModel;
use App\Models\PengetahuanModel;
use App\Models\UserModel;

class Pengetahuan extends BaseController
{
    protected $userModel, $mahasiswaModel, $pengetahuanModel, $dokumenModel, $materiModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->mahasiswaModel = new MahasiswaModel();
        $this->pengetahuanModel = new PengetahuanModel();
        $this->dokumenModel = new DocumentModel();
        $this->materiModel = new MateriModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Data Pengetahuan',
            'active' => 'pengetahuan',
            'pengetahuan' => $this->pengetahuanModel->where('status', 'pending')->findAll(), // Menampilkan dokumen dengan status bukan ditolak
            'p' => $this->pengetahuanModel->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Pengetahuan' => base_url('admin/pengetahuan'),
                'Active Page' => 'Data Pengetahuan'
            ]
        ];

        return view('admin/v_pengetahuan', $data);
    }

    // Method function untuk validasi pengetahuan
    public function validation()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Validasi Data Pengetahuan',
            'active' => 'pengetahuan',
            'pengetahuan' => $this->pengetahuanModel->where('status', 'pending')->findAll(), // Menampilkan dokumen dengan status bukan ditolak
            'p' => $this->pengetahuanModel->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Pengetahuan' => base_url('admin/pengetahuan'),
                'Active Page' => 'Validasi Pengetahuan'
            ]
        ];


        return view('admin/validasi/v_pengetahuan', $data);
    }

    // Method function untuk menambah data pengetahuan
    public function add()
    {
        $data = [
            'title' => 'Tambah Pengetahuan',
            'active' => 'pengetahuan',
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'pengetahuan' => $this->pengetahuanModel->findAll(),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Pengetahuan' => base_url('admin/pengetahuan'),
                'Active Page' => 'Tambah Data Pengetahuan'
            ],
            'validation' => \Config\Services::validation()
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->mahasiswaModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;


        return view('admin/v_tambah_pengetahuan', $data);
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
                    'required' => '{field} wajib diisi'
                ]
            ],
            'judul_pengetahuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'jenis_pengetahuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'deskripsi_pengetahuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
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
            'status' => 'diterima',
            'id_user' => session()->get('users_id'),
        ];

        if ($this->pengetahuanModel->insert($data)) {
            // Jika berhasil, tambahkan notifikasi
            $notifikasiModel = new NotifikasiModel();
            $notifikasiModel->save([
                'type' => 'pengetahuan',
                'pesan' => 'Pengetahuan baru telah ditambahkan.'
            ]);

            // Menampilkan pesan materi berhasil ditambah
            session()->setFlashdata('pesan', 'Pengetahuan berhasil ditambahkan');
            return redirect()->to(site_url('admin/pengetahuan'))->with('pesan', 'Data pengetahuan berhasil ditambahkan');
        } else {
            // Menampilkan pesan materi gagal ditambah
            session()->setFlashdata('pesan', 'Pengetahuan gagal ditambahkan');
            return redirect()->to(site_url('admin/pengetahuan'))->with('pesan', 'Data pengetahuan berhasil ditambahkan');
        }
    }

    // Method function untuk edit data pengetahuan
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pengetahuan',
            'active' => 'pengetahuan',
            'pengetahuan' => $this->pengetahuanModel->findAll(),
            'pengetahuan' => $this->pengetahuanModel->find($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Pengetahuan' => base_url('admin/pengetahuan'),
                'Active Page' => 'Edit Data pengetahuan'
            ],
        ];

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');
        $user = $this->userModel->find($id_user);
        $profile = $this->userModel->where('id_user', $id_user)->first();
        $profile = $this->mahasiswaModel->getProfile($id_user);
        // // // Menggabungkan data yang akan dikirim ke view dalam satu array
        $data['profile'] = $profile;
        $data['user'] = $user;

        return view('admin/v_edit_pengetahuan', $data);
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
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'judul_pengetahuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'jenis_pengetahuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'deskripsi_pengetahuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
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

        if ($this->pengetahuanModel->updatePengetahuan($id, $data)) {
            // Menampilkan pesan pengetahuan berhasil diubah
            session()->setFlashdata('pesan', 'Pengetahuan berhasil diubah');
            return redirect()->to('admin/pengetahuan')->with('pesan', 'Data pengetahuan berhasil diubah');
        } else {
            // Menampilkan pesan pengetahuan gagal diubah
            session()->setFlashdata('pesan', 'Pengetahuan gagal diubah');
            return redirect()->to('/admin/pengetahuan')->with('pesan', 'Pengetahuan gagal diubah');
        }
    }

    public function approvePengetahuan($id_pengetahuan)
    {
        $this->pengetahuanModel->update($id_pengetahuan, ['status' => 'diterima']);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to(site_url('admin/pengetahuan'))->with('success', 'Pengetahuan berhasil diterima.');
    }

    public function rejectPengetahuan($id_pengetahuan)
    {
        $this->pengetahuanModel->update($id_pengetahuan, ['status' => 'ditolak']);

        // Redirect atau tampilkan pesan ditolak
        return redirect()->to(site_url('admin/pengetahuan'))->with('ditolak', 'Pengetahuan berhasil ditolak.');
    }

    // Method function untuk detail data pengetahuan
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Pengetahuan',
            'active' => 'pengetahuan',
            'pengetahuan' => $this->pengetahuanModel->findAll(),
            'pengetahuan' => $this->pengetahuanModel->find($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Pengetahuan' => base_url('admin/pengetahuan'),
                'Active Page' => 'Detail Data pengetahuan'
            ],
        ];


        return view('admin/v_detail_pengetahuan', $data);
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

    // Method function untuk hapus data pengetahuan
    public function delete($id)
    {
        $this->pengetahuanModel->deletePengetahuan($id);
        return redirect()->to(site_url('admin/pengetahuan'))->with('pesan', 'Data pengetahuan berhasil dihapus');
    }
}
