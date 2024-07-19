<?php

namespace App\Controllers\Dosen;

use App\Models\UserModel;

use App\Controllers\BaseController;
use App\Models\DiskusiModel;
use App\Models\DosenModel;
use App\Models\KomentarModel;
use CodeIgniter\Controller;

class Discussion extends BaseController
{
    protected $userModel, $dosenModel, $diskusiModel, $komentarModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->dosenModel = new DosenModel();
        $this->diskusiModel = new DiskusiModel();
        $this->komentarModel = new KomentarModel();
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
            'title' => 'dosen | Data Diskusi',
            'active' => 'discussion',
            'diskusis' => $this->diskusiModel->getDiskusiByUser($id_user), // Ambil data dokumen dari session
            'd' => $this->diskusiModel->where('status', 'diterima')->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'breadcrumb' => [
                'Dashboard' => base_url('dosen/dashboard'),
                'Forum Diskusi' => base_url('dosen/discussion'),
                'Active Page' => 'Data forum diskusi'
            ]
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

        session()->set('nama_lengkap', $nama_lengkap);

        return view('dosen/v_diskusi', $data);
    }

    // Method function untuk menampilkan halaman tambah data forum diskusi
    public function add()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'dosen | Data Diskusi',
            'active' => 'discussion',
            'diskusi' => $this->diskusiModel->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'validation' => \Config\Services::validation(),
            'breadcrumb' => [
                'Dashboard' => base_url('dosen/dashboard'),
                'Forum Diskusi' => base_url('dosen/discussion'),
                'Active Page' => 'Data Forum Diskusi'
            ]
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

        session()->set('nama_lengkap', $nama_lengkap);

        return view('dosen/v_tambah_diskusi', $data);
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
            'status' => 'pending'
        ];

        if ($this->diskusiModel->insert($data)) {
            session()->setFlashdata('pesan', 'Data diskusi berhasil ditambahkan dan sedang diproses.');
            return redirect()->to('/dosen/discussion');
        } else {
            session()->setFlashdata('pesan', 'Data diskusi gagal ditambahkan.');
            return redirect()->to('/dosen/discussion');
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
            'title' => 'dosen | Data Diskusi',
            'active' => 'discussion',
            'diskusi' => $this->diskusiModel->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'validation' => \Config\Services::validation(),
            'diskusi' => $this->diskusiModel->find($id),
            'breadcrumb' => [
                'Dashboard' => base_url('dosen/dashboard'),
                'Forum Diskusi' => base_url('dosen/discussion'),
                'Active Page' => 'Edit Forum Diskusi'
            ]
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

        session()->set('nama_lengkap', $nama_lengkap);

        return view('dosen/v_edit_diskusi', $data);
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
            session()->setFlashdata('pesan', 'Data diskusi berhasil diubah.');
            return redirect()->to('/dosen/discussion');
        } else {
            session()->setFlashdata('pesan', 'Data diskusi gagal diubah.');
            return redirect()->to('/dosen/discussion');
        }
    }

    public function pribadi()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        // Mengambil id_user dari session
        $id_user = session()->get('users_id');

        $data = [
            'title' => 'dosen | Data Diskusi',
            'active' => 'discussion',
            'diskusis' => $this->diskusiModel->getDiskusiByUser($id_user), // Ambil data dokumen dari session
            'd' => $this->diskusiModel->where('status', 'diterima')->findAll(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('dosen/dashboard'),
                'Forum Diskusi' => base_url('dosen/discussion'),
                'Active Page' => 'Data forum diskusi'
            ]
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

        session()->set('nama_lengkap', $nama_lengkap);

        return view('dosen/v_diskusi_pribadi', $data);
    }

    // Fungsi untuk menampilkan detail data diskusi
    public function detail($id)
    {
        $data = [
            'title' => 'Dosen | Detail Data Diskusi',
            'active' => 'discussion',
            'diskusi' => $this->diskusiModel->find($id),
            'komentar' => $this->komentarModel->getKomentarByDiskusi($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'id_forum' => $id,
            'subtitle' => 'materi',
            'breadcrumb' => [
                'Dashboard' => base_url('Dosen/dashboard'),
                'Forum Diskusi' => base_url('Dosen/discussion'),
                'Active Page' => 'Detail Data Diskusi'
            ]
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

        session()->set('nama_lengkap', $nama_lengkap);

        return view('dosen/v_detail_diskusi', $data);
    }

    // Fungsi untuk menampilkan detail data diskusi
    public function detailPribadi($id)
    {

        // $id = session()->get('users_id');

        $data = [
            'title' => 'Detail Data Pribadi',
            'active' => 'discussion',
            'diskusi' => $this->diskusiModel->find($id),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'id_forum' => $id,
            'subtitle' => 'materi',
            'breadcrumb' => [
                'Dashboard' => base_url('Dosen/dashboard'),
                'Forum Diskusi' => base_url('Dosen/discussion'),
                'Active Page' => 'Detail Data Pribadi'
            ]
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

        session()->set('nama_lengkap', $nama_lengkap);

        return view('dosen/pribadi/v_detail_diskusi_pribadi', $data);
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

        // Ambil nama lengkap dari session
        $nama_lengkap = session()->get('nama_lengkap');


        $this->komentarModel->save([
            'id_forum'     => $this->request->getPost('id_forum'),
            'id_user'      => $this->request->getPost('id_user'),
            'nama_lengkap' => $nama_lengkap,
            'komentar'     => $this->request->getPost('komentar'),
            'tgl_komentar' => date('Y-m-d H:i:s'),
            'tgl_ubah'     => date('Y-m-d H:i:s')
        ]);

        // Jika berhasil maka akan dikembalikan ke halaman default dan juga mengirimkan notfikikasi
        return redirect()->to('/dosen/discussion/detail/' . $this->request->getPost('id_forum'))->with('success', 'Data komentar berhasil ditambahkan.');

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
            return redirect()->to('/dosen/discussion/detail/' . $this->request->getPost('id_forum'))->with('success', 'Komentar berhasil diubah.');
        } else {
            return redirect()->back()->with('error', 'Gagal diubah komentar.');
        }

        return redirect()->back()->with('error', 'Data komentar gagal diubah.');
    }

    // Method function untuk menghapus data forum
    public function delete($id)
    {
        $this->diskusiModel->delete($id);
        session()->setFlashdata('pesan', 'Data diskusi berhasil dihapus.');
        return redirect()->to('/dosen/discussion');
    }
}
