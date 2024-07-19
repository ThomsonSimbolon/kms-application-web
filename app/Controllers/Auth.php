<?php

namespace App\Controllers;

use App\Models\AktivitasModel;
use App\Models\BeritaModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use App\Models\PegawaiModel;
use App\Models\UserModel;
use App\Models\PengetahuanModel;
use CodeIgniter\Events\Events;

class Auth extends BaseController
{
    protected $helpers = ['form', 'url'];
    protected $pengetahuanModel, $beritaModel;

    public function __construct()
    {
        $this->pengetahuanModel = new PengetahuanModel();
        $this->beritaModel = new BeritaModel();
    }

    // Method controller index
    public function index()
    {
        $data = [
            'title' => 'Halaman Utama',
            'pengetahuan' => $this->pengetahuanModel->findAll(),
            'berita' => $this->beritaModel->findAll(),
        ];

        return view('auth/v_index', $data);
    }

    // Method controller untuk halaman kata_pengantar
    public function kata_pangantar()
    {
        $data = [
            'title' => 'Kata Pangantar',
        ];

        return view('auth/v_kata_pangantar', $data);
    }

    // Method controller untuk halaman sejarah
    public function sejarah()
    {
        $data = [
            'title' => 'Sejarah',
        ];

        return view('auth/v_sejarah', $data);
    }

    // Method controller untuk halaman visi_misi
    public function visi_misi()
    {
        $data = [
            'title' => 'Visi & Misi',
        ];

        return view('auth/v_visi_misi', $data);
    }

    // Method controller untuk halaman struktur_organisasi
    public function struktur_organisasi()
    {
        $data = [
            'title' => 'Struktur Organisasi',
        ];

        return view('auth/v_struktur_organisasi', $data);
    }

    // Method controller untuk halaman sumber_daya
    public function sumber_daya()
    {
        $data = [
            'title' => 'Sumber Daya',
        ];

        return view('auth/v_sumber_daya', $data);
    }

    // Method controller untuk halaman berita
    public function berita()
    {
        $data = [
            'title' => 'Berita',
            'berita' => $this->beritaModel->findAll(),
        ];

        return view('auth/v_berita', $data);
    }

    // Method function untuk detail data pengetahuan
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Pengetahuan',
            'pengetahuan' => $this->pengetahuanModel->findAll(),
            'pengetahuan' => $this->pengetahuanModel->find($id),
        ];

        return view('auth/v_detail_pengetahuan', $data);
    }

    // Fungsi untuk mendownload data yang sudah di upload
    public function download($id)
    {
        $model = new PengetahuanModel();
        $pengetahuan = $model->findAll($id);
        $pengetahuan = $model->find($id);

        $path = ROOTPATH . 'uploads/' . $pengetahuan->file_path;

        return $this->response->download($path, NULL);
    }

    public function form_login()
    {
        $data = [
            'title' => 'Form Login'
        ];

        // Memanggil library validasi
        $validation = \Config\Services::validation();

        // Aturan validasi untuk input email dan password
        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'valid_email' => 'Email tidak valid',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                    'min_length' => 'Password minimal 6 karakter',
                ],
            ],
        ];

        // Jika request adalah POST dan validasi gagal, kembalikan view dengan pesan error
        if ($this->request->getMethod() === 'post' && !$validation->setRules($rules)->run($this->request->getPost())) {
            return view('auth/v_login', [
                'validation' => $validation,
                'title' => 'Form Login'
            ]);
        }

        // Jika validasi sukses, lanjutkan ke halaman berikutnya
        return view('auth/v_login', $data);
    }


    public function login()
    {
        // Memanggil library validasi
        $validation = \Config\Services::validation();

        // Aturan validasi untuk input email dan password
        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'valid_email' => 'Email tidak valid',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                    'min_length' => 'Password minimal 6 karakter',
                ],
            ],
        ];

        // Jika request adalah POST dan validasi gagal, kembalikan view dengan pesan error
        if ($this->request->getMethod() === 'post' && !$validation->setRules($rules)->run($this->request->getPost())) {
            return view('auth/v_login', [
                'validation' => $validation,
                'title' => 'Form Login'
            ]);
        }

        // Jika validasi sukses, lanjutkan dengan proses login
        $model = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Mengambil data user dari database berdasarkan email
        $user = $model->where('email', $email)->first();

        // Cek login jika user ditemukan dan melakukan pengecekan password
        if ($user) {
            if (password_verify($password, $user->password)) {
                // Memanggil metode saveLog untuk menyimpan data ke database
                $AktivitasModel = new \App\Models\AktivitasModel();

                // Cek apakah log aktivitas sudah ada untuk id_user yang sedang login
                $cekLogAktivitas = $AktivitasModel->where('id_user', $user->id_user)->first();

                if (!$cekLogAktivitas) {
                    $AktivitasModel->saveLog($user->id_user, $user->email, $user->level);
                }

                // Jika password cocok, lakukan proses login
                session()->set('users_id', $user->id_user);
                session()->set('users_email', $user->email);
                session()->set('users_password', $user->password);
                session()->set('users_level', $user->level);
                session()->set('logged_in', true);

                // Redirect sesuai dengan level pengguna
                switch (session()->get('users_level')) {
                    case 'dosen':
                        // // Simpan id_user ke tabel tb_dosen jika belum ada
                        $dosenModel = new DosenModel();
                        $dosen = $dosenModel->where('id_user', $user->id_user)->first();

                        if (!$dosen) {
                            $data = [
                                'id_user' => $user->id_user,
                                'nama_lengkap' => '', // Isi dengan data lain yang diperlukan
                                'nidn' => '', // Isi dengan data lain yang diperlukan
                                'jabatan' => '', // Isi dengan data lain yang diperlukan
                                'agama' => '', // Isi dengan data lain yang diperlukan
                                'jenis_kelamin' => '', // Isi dengan data lain yang diperlukan
                                'tempat_lahir' => '', // Isi dengan data lain yang diperlukan
                                'tgl_lahir' => '', // Isi dengan data lain yang diperlukan
                                'no_hp' => '', // Isi dengan data lain yang diperlukan
                                'alamat' => '', // Isi dengan data lain yang diperlukan
                                'upload_foto' => '', // Isi dengan data lain yang diperlukan
                            ];

                            $dosenModel->insert($data);
                        }

                        return redirect()->to('/dosen/dashboard');
                        break;
                    case 'pegawai':
                        // // Simpan id_user ke tabel tb_dosen jika belum ada
                        $pegawaiModel = new PegawaiModel();
                        $pegawai = $pegawaiModel->where('id_user', $user->id_user)->first();

                        if (!$pegawai) {
                            $data = [
                                'id_user' => $user->id_user,
                                'nama_lengkap' => '', // Isi dengan data lain yang diperlukan
                                'nidn' => '', // Isi dengan data lain yang diperlukan
                                'jabatan' => '', // Isi dengan data lain yang diperlukan
                                'agama' => '', // Isi dengan data lain yang diperlukan
                                'jenis_kelamin' => '', // Isi dengan data lain yang diperlukan
                                'tempat_lahir' => '', // Isi dengan data lain yang diperlukan
                                'tgl_lahir' => '', // Isi dengan data lain yang diperlukan
                                'no_hp' => '', // Isi dengan data lain yang diperlukan
                                'alamat' => '', // Isi dengan data lain yang diperlukan
                                'upload_foto' => '', // Isi dengan data lain yang diperlukan
                            ];

                            $pegawaiModel->insert($data);
                        }

                        return redirect()->to('/pegawai/dashboard');
                        break;
                    case 'mahasiswa':
                        // // Simpan id_user ke tabel tb_mahasiswa jika belum ada
                        $mahasiswaModel = new MahasiswaModel();
                        $mahasiswa = $mahasiswaModel->where('id_user', $user->id_user)->first();

                        if (!$mahasiswa) {
                            $data = [
                                'id_user' => $user->id_user,
                                'nama_lengkap' => '', // Isi dengan data lain yang diperlukan
                                'nim' => '', // Isi dengan data lain yang diperlukan
                                'program_studi' => '', // Isi dengan data lain yang diperlukan
                                'tahun_angkatan' => '', // Isi dengan data lain yang diperlukan
                                'jenis_kelamin' => '', // Isi dengan data lain yang diperlukan
                                'tempat_lahir' => '', // Isi dengan data lain yang diperlukan
                                'tgl_lahir' => '', // Isi dengan data lain yang diperlukan
                                'no_hp' => '', // Isi dengan data lain yang diperlukan
                                'alamat' => '', // Isi dengan data lain yang diperlukan
                                'upload_foto' => '', // Isi dengan data lain yang diperlukan
                            ];
                            $mahasiswaModel->insert($data);
                        }

                        return redirect()->to('/mahasiswa/dashboard');
                        break;
                    default:
                    case 'admin':
                        return redirect()->to('/admin/dashboard');
                        break;
                }
            } else {
                // Jika password tidak cocok, maka akan tampilkan pesan error
                session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Password salah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                return redirect()->to('/auth/form_login');
            }
        } else {
            // Jika email tidak cocok, maka akan tampilkan pesan error
            session()->setFlashdata('msg', '<div class="alert alert-info">Email belum terdaftar</div>');
            return redirect()->to('/auth/form_login');
        }

        // Redirect ke halaman login setelah proses validasi
        return redirect()->to('/auth/form_login');
    }

    public function getIdUser()
    {
        return session()->get('users_id');
    }


    public function register()
    {
        helper(['helper', 'form']);

        // Memanggil library UserModel
        $model = new \App\Models\UserModel();

        // Menyiapkan data title untuk ditampilkan pada view
        $data['title'] = 'Form Register';


        if ($this->request->getMethod() === 'post') {
            // Menentukan aturan validasi
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email|is_unique[tb_users.email]',
                    'errors' => [
                        'required' => 'Email wajib diisi',
                        'valid_email' => 'Email tidak valid',
                        'is_unique' => 'Email sudah terdaftar',
                    ],
                ],
                'password' => [
                    'rules' => 'required|min_length[6]',
                    'errors' => [
                        'required' => 'Password wajib diisi',
                        'min_length' => 'Password minimal 6 karakter',
                    ],
                ],
                // 'level' => [
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => 'Level wajib diisi',
                //     ],
                // ],
            ];

            // Validasi input data
            if (!$this->validate($rules)) {
                return view('auth/v_register', [
                    'validation' => $this->validator,
                    'title' => 'Form Register'
                ]);
            } else {
                // Mempersiapkan data untuk dimasukkan
                $data = [
                    'email'        => $this->request->getVar('email'),
                    'password'     => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    // 'level'        => $this->request->getVar('level'),
                ];

                // Masukkan data ke dalam database

                $model = new \App\Models\UserModel(); // Pastikan untuk membuat UserModel dan mengatur tabel dan bidang yang benar

                // Redirect ke halaman sukses (atau ke mana pun Anda suka)
                if ($model->save($data)) {
                    session()->setFlashdata('msg', '<div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Akun berhasil didaftar!</strong> Silahkan login.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    return redirect()->to('auth/register')->with('success', 'Pengguna berhasil mendaftar');
                } else {
                    session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Pengguna gagal mendaftar.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    return redirect()->back()->withInput()->with('error', 'Pengguna gagal mendaftar');
                }
            }
            return redirect()->back()->withInput()->with('error', 'Pengguna gagal mendaftar');
        }

        // Menampilkan halaman view register
        return view('auth/v_register', $data);
    }

    // Metode logout
    public function logout()
    {
        // Model LogAktivitas
        $aktivitasModel = new AktivitasModel();

        // Ambil id_user dari session
        $id_user = session()->get('users_id');

        // Log aktivitas logout
        $aktivitasModel->logLogout($id_user);

        // Hapus session
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to('/');
    }
}
