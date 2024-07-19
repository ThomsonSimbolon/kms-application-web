<?php

namespace App\Controllers\Admin;

use App\Models\DocumentModel;

use App\Controllers\BaseController;
use App\Models\MateriModel;
use App\Models\NotifikasiModel;
use App\Models\PengetahuanModel;
use CodeIgniter\Controller;

class Document extends BaseController
{
    protected $model, $materiModel, $pengetahuanModel;

    public function __construct()
    {
        $this->model = new DocumentModel();
        $this->materiModel = new MateriModel();
        $this->pengetahuanModel = new PengetahuanModel();
    }
    public function index()
    {
        // Cek apakah pengguna sudah login atau belum
        if (!session('logged_in')) {
            // Jika belum, redirect ke halaman autentikasi
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Data Dokumen',
            'active' => 'dokumen',
            'subtitle' => 'dokumen',
            'documents' => $this->model->where('status', 'pending')->findAll(), // Menampilkan dokumen dengan status bukan ditolak
            'dokumen' => $this->model->findAll(), // Menampilkan dokumen
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Dokumen' => base_url('admin/document'),
                'Active Page' => 'Data dokumen'
            ],
        ];


        return view('admin/v_dokumen', $data);
    }

    // Method function untuk validasi pengetahuan
    public function validation()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Data Dokumen',
            'active' => 'pengetahuan',
            'documents' => $this->model->where('status', 'pending')->findAll(), // Menampilkan dokumen dengan status bukan ditolak
            'd' => $this->model->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Dokumen' => base_url('admin/document'),
                'Active Page' => 'Validasi Dokumen'
            ]
        ];


        return view('admin/validasi/v_dokumen', $data);
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
            'dokumen' => $this->model->findAll(),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Dokumen' => base_url('admin/document'),
                'Active Page' => 'Tambah Data Dokumen',
            ],
        ];


        return view('admin/v_tambah_dokumen', $data);
    }

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
                'status' => 'diterima',
                'id_user' => session()->get('users_id'),
            ];

            if ($this->model->insert($data)) {
                // Jika berhasil, tambahkan notifikasi
                $notifikasiModel = new NotifikasiModel();
                $notifikasiModel->save([
                    'type' => 'dokumen',
                    'pesan' => 'Dokumen baru telah ditambahkan.'
                ]);

                // Menampilkan pesan dokumen berhasil ditambah
                session()->setFlashdata('pesan', 'Dokumen berhasil ditambahkan');
                return redirect()->to('/admin/document')->with('pesan', 'Dokumen berhasil ditambahkan');
            } else {
                // Menampilkan pesan dokumen gagal ditambah
                session()->setFlashdata('pesan', 'Dokumen gagal ditambahkan');
                return redirect()->to('/admin/document')->with('error', 'Dokumen gagal ditambahkan');
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
            'dokumen' => $this->model->find($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Dokumen' => base_url('admin/document'),
                'Active Page' => 'Edit dokumen'
            ]
        ];

        return view('admin/v_edit_dokumen', $data);
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
            $dokumen = $this->model->find($id);
            if (!$dokumen) {
                session()->setFlashdata('pesan', 'Dokumen tidak ditemukan');
                return redirect()->to('/admin/document')->with('error', 'Dokumen tidak ditemukan');
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

            if ($this->model->update($id, $data)) {
                // Menampilkan pesan dokumen berhasil diubah
                session()->setFlashdata('pesan', 'Dokumen berhasil diubah');
                return redirect()->to('/admin/document')->with('success', 'Dokumen berhasil diubah');
            } else {
                // Menampilkan pesan dokumen gagal diubah
                session()->setFlashdata('pesan', 'Dokumen gagal diubah');
                return redirect()->to('/admin/document')->with('error', 'Dokumen gagal diubah');
            }
        }
    }

    public function approveDocument($id_document)
    {
        $this->model->update($id_document, ['status' => 'diterima']);

        // Redirect atau tampilkan notifikasi sukses
        return redirect()->to(site_url('admin/document'))->with('success', 'Dokumen berhasil diterima.');
        session()->setFlashdata('success', 'Dokumen berhasil diterima.');
    }

    public function rejectDocument($id_document)
    {
        $this->model->update($id_document, ['status' => 'ditolak']);

        // Redirect atau tampilkan notifikasi sukses
        return redirect()->to(site_url('admin/document'))->with('ditolak', 'Materi berhasil ditolak.');
        session()->setFlashdata('ditolak', 'Materi berhasil ditolak.');
    }

    // Fungsi untuk menampilkan detail data dokumen
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Dokumen',
            'active' => 'dokumen',
            'dokumen' => $this->model->getDocumentById($id),
            'id_dokumen' => $id,
            'subtitle' => 'dokumen',
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Dokumen' => base_url('admin/document'),
                'Active Page' => 'Detail Data Dokumen'
            ]
        ];

        return view('admin/v_detail_dokumen', $data);
    }


    // Fungsi untuk mendownload data yang sudah di upload
    public function download($id)
    {
        $model = new DocumentModel();
        $dokumen = $model->getDocumentById($id);
        $dokumen = $model->find($id);

        $path = ROOTPATH . 'public/uploads/' . $dokumen['file_path'];

        return $this->response->download($path, NULL);
    }

    // Fungsi untuk menghapus data
    public function delete($id)
    {
        $model = new DocumentModel();
        $model->deleteDocument($id);

        session()->setFlashdata('pesan', 'Data pengguna berhasil dihapus');
        return redirect()->to('/admin/document')->with('success', 'Dokumen berhasil dihapus');
    }
}
