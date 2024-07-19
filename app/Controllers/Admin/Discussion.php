<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;

use App\Controllers\BaseController;
use App\Models\DiskusiModel;
use App\Models\DocumentModel;
use App\Models\MateriModel;
use App\Models\PengetahuanModel;
use App\Models\KomentarModel;
use App\Models\NotifikasiModel;
use CodeIgniter\Controller;

class Discussion extends BaseController
{
    protected $userModel, $diskusiModel, $materiModel, $pengetahuanModel, $dokumenModel, $komentarModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->diskusiModel = new DiskusiModel();
        $this->materiModel = new MateriModel();
        $this->pengetahuanModel = new PengetahuanModel();
        $this->dokumenModel = new DocumentModel();
        $this->komentarModel = new KomentarModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Data Diskusi',
            'active' => 'discussion',
            'diskusis' => $this->diskusiModel->where('status', 'pending')->findAll(), // Menampilkan dokumen dengan status bukan ditolak
            'diskusi' => $this->diskusiModel->where('status', 'diterima')->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Forum Diskusi' => base_url('admin/discussion'),
                'Active Page' => 'Data forum diskusi'
            ]
        ];


        return view('admin/v_diskusi', $data);
    }

    // Method function untuk menampilkan halaman tambah data forum diskusi
    public function add()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Tambah Data Diskusi',
            'active' => 'discussion',
            'diskusi' => $this->diskusiModel->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'validation' => \Config\Services::validation(),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Forum Diskusi' => base_url('admin/discussion'),
                'Active Page' => 'Tambah Data Forum Diskusi'
            ]
        ];

        return view('admin/v_tambah_diskusi', $data);
    }

    // Method function untuk menambahkan data forum diskusi
    public function create()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        // Aturan validasi input
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'judul_forum' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
            session()->setFlashdata('failed', 'Data forum gagal ditambahkan');
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'id_user' => session()->get('users_id'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'judul_forum' => $this->request->getPost('judul_forum'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tgl_posting' => date('Y-m-d H:i:s'),
            'tgl_ubah' => date('Y-m-d H:i:s'),
            'status' => 'diterima',
        ];

        if ($this->diskusiModel->insert($data)) {
            // Jika berhasil, tambahkan notifikasi
            $notifikasiModel = new NotifikasiModel();
            $notifikasiModel->save([
                'type' => 'discussion',
                'pesan' => 'Forum diskusi baru telah ditambahkan.'
            ]);

            // Jika berhasil, maka akan menampilkan notifikasi data berhasil ditambahkan
            session()->setFlashdata('pesan', 'Data diskusi berhasil ditambahkan dan sedang diproses.');
            return redirect()->to('/admin/discussion');
        } else {
            // Jika gagal, maka akan menampilkan notifikasi data gagal ditambahkan
            session()->setFlashdata('pesan', 'Data diskusi gagal ditambahkan.');
            return redirect()->to('/admin/discussion');
        }
    }

    // Method function untuk menampilkan halaman edit data forum
    public function edit($id)
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Edit Data Diskusi',
            'active' => 'discussion',
            'diskusi' => $this->diskusiModel->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'validation' => \Config\Services::validation(),
            'diskusi' => $this->diskusiModel->find($id),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Forum Diskusi' => base_url('admin/discussion'),
                'Active Page' => 'Edit Forum Diskusi'
            ]
        ];

        return view('admin/v_edit_diskusi', $data);
    }

    // Method function untuk mengubah data forum
    public function update($id)
    {
        // Aturan validasi input
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'judul_forum' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
            session()->setFlashdata('failed', 'Data forum gagal ditambahkan');
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'id_user' => session()->get('users_id'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'judul_forum' => $this->request->getPost('judul_forum'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tgl_posting' => date('Y-m-d H:i:s'),
            'tgl_ubah' => date('Y-m-d H:i:s'),
        ];

        if ($this->diskusiModel->update($id, $data)) {
            // Jika berhasil, tambahkan notifikasi
            session()->setFlashdata('pesan', 'Data diskusi berhasil diubah.');
            return redirect()->to('/admin/discussion');
        } else {
            // Jika gagal, maka akan menampilkan notifikasi data gagal ditambahkan
            session()->setFlashdata('pesan', 'Data diskusi gagal diubah.');
            return redirect()->to('/admin/discussion');
        }
    }

    public function validation()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Admin | Data Diskusi',
            'active' => 'discussion',
            'diskusis' => $this->diskusiModel->where('status', 'pending')->findAll(), // Menampilkan dokumen dengan status bukan ditolak
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Forum Diskusi' => base_url('admin/discussion'),
                'Active Page' => 'Validasi Forum Diskusi'
            ]
        ];

        return view('admin/v_diskusi_validasi', $data);
    }

    public function approveDiskusi($id_forum)
    {
        $this->diskusiModel->update($id_forum, ['status' => 'diterima']);

        // Set flashdata untuk notifikasi sukses
        session()->setFlashdata('success', 'Diskusi telah diterima.');

        // Redirect atau tampilkan pesan sukses
        return redirect()->to(site_url('admin/discussion'));
    }

    public function rejectDiskusi($id_forum)
    {
        $this->diskusiModel->update($id_forum, ['status' => 'ditolak']);

        // Set flashdata untuk notifikasi sukses
        session()->setFlashdata('error', 'Diskusi telah ditolak.');

        return redirect()->to(site_url('admin/discussion'));
    }

    // Fungsi untuk menampilkan detail data diskusi
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Diskusi',
            'active' => 'discussion',
            'diskusi' => $this->diskusiModel->find($id),
            'komentar' => $this->komentarModel->getKomentarByDiskusi($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'id_forum' => $id,
            'subtitle' => 'materi',
            'breadcrumb' => [
                'Dashboard' => base_url('Admin/dashboard'),
                'Forum Diskusi' => base_url('Admin/discussion'),
                'Active Page' => 'Detail Data Diskusi'
            ]
        ];

        return view('admin/v_detail_diskusi', $data);
    }

    // Method function untuk tambah data komentar
    public function tambahKomentar()
    {
        // Aturan validasi input
        $validation = \Config\Services::validation();

        $validation->setRules([
            'id_forum'    => 'required',
            'id_user'     => 'required',
            // 'komentar'    => 'required',
            'komentar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
        ]);

        if ($this->request->getMethod() === 'post' && !$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
            session()->setFlashdata('failed', 'Data komentar gagal ditambahkan');
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->komentarModel->save([
            'id_forum'     => $this->request->getPost('id_forum'),
            'id_user'      => $this->request->getPost('id_user'),
            'nama_lengkap' => session()->get('users_level'),
            'komentar'     => $this->request->getPost('komentar'),
            'tgl_komentar' => date('Y-m-d H:i:s'),
            'tgl_ubah'     => date('Y-m-d H:i:s')
        ]);

        // Jika berhasil maka akan dikembalikan ke halaman default dan juga mengirimkan notfikikasi
        return redirect()->to('/admin/discussion/detail/' . $this->request->getPost('id_forum'))->with('success', 'Data komentar berhasil ditambahkan.');

        // Jika gagal maka akan dikembalikan ke inputan dan juga menampilkan notifikasi error
        return redirect()->back()->with('error', 'Data komentar gagal ditambahkan.');
    }

    // Method function untuk update data komentar
    public function updateKomentar($id_komentar)
    {
        // Aturan validasi input
        $validation = \Config\Services::validation();

        $validation->setRules([
            // 'komentar'    => 'required',
            'komentar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
        ]);

        if ($this->request->getMethod() === 'post' && !$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
            session()->setFlashdata('failed', 'Data edit komentar gagal ditambahkan');
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'komentar'     => $this->request->getPost('komentar'),
            'tgl_komentar' => date('Y-m-d H:i:s'),
            'tgl_ubah'     => date('Y-m-d H:i:s')
        ];

        if ($this->komentarModel->update($id_komentar, $data)) {
            return redirect()->to('/admin/discussion/detail/' . $this->request->getPost('id_forum'))->with('success', 'Komentar berhasil diubah.');
        } else {
            return redirect()->back()->with('error', 'Gagal diubah komentar.');
        }

        return redirect()->back()->with('error', 'Data komentar gagal diubah.');
    }

    // Method function untuk menghapusn data komentar
    public function deleteKomentar($id)
    {
        // Cek apakah id_komentar valid
        if (!empty($id)) {
            // Hapus komentar berdasarkan id_komentar
            $deleted = $this->komentarModel->delete($id);

            // Cek apakah komentar berhasil dihapus
            if ($deleted) {
                // Jika berhasil, alihkan kembali ke halaman detail diskusi
                return redirect()->back()->with('hapus', 'Komentar berhasil dihapus.');
                session()->setFlashdata('hapus', 'Data komentar berhasil dihapus.');
            } else {
                // Jika gagal, kembalikan dengan pesan error
                return redirect()->back()->with('error', 'Gagal menghapus komentar.');
            }
        } else {
            // Jika id_komentar tidak valid, kembalikan dengan pesan error
            return redirect()->back()->with('error', 'ID komentar tidak valid.');
        }

        session()->setFlashdata('pesan', 'Data komentar berhasil dihapus.');
        return redirect()->to('/admin/discussion/detail/')->with('pesan', 'Data komentar berhasil dihapus.');
    }

    // Method function untuk menghapus data forum
    public function delete($id)
    {
        $this->diskusiModel->delete($id);
        session()->setFlashdata('pesan', 'Data diskusi berhasil dihapus.');
        return redirect()->to('/admin/discussion');
    }
}
