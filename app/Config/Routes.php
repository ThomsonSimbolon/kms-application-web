<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Auth;

/**
 * @var RouteCollection $routes
 */

$routes->get('create-db', function () {
    $forge = \Config\Database::forge();
    if ($forge->createDatabase('kms_project')) {
        echo 'Database created!';
    }
});

$routes->get('/', 'Auth::index');

// Routes Auth Login

$routes->get('/', 'Auth::index');
// $routes->get('/', 'Auth::pengetahuan');
$routes->get('/kata_pengantar', 'Auth::kata_pangantar');
$routes->get('/sejarah', 'Auth::sejarah');
$routes->get('/visi_misi', 'Auth::visi_misi');
$routes->get('/struktur_organisasi', 'Auth::struktur_organisasi');
$routes->get('/sumber_daya', 'Auth::sumber_daya');
$routes->get('/berita', 'Auth::berita');
$routes->get('/faq', 'Auth::faq');
$routes->get('/download/(:num)', 'Auth::download/$1');
$routes->get('/detail/(:num)', 'Auth::detail/$1');
$routes->get('auth/form_login', 'Auth::form_login');
$routes->post('auth/login', 'Auth::login/$1');
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/register', 'Auth::register/$1');
$routes->get('auth/logout', 'Auth::logout');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');

// // Routes group Administrators
// $routes->addRedirect('admin', 'Dashboard::index');
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    // Bagian routes untuk dashboard
    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('profile', 'Profile::index');
    $routes->get('profile/edit/', 'Profile::edit');
    $routes->post('profile/update/', 'Profile::update');

    // Bagian routes untuk user
    $routes->get('user', 'User::index');
    $routes->get('approve/(:num)', 'User::approve/$1');
    $routes->get('disapprove/(:num)', 'User::disapprove/$1');
    $routes->get('user/add', 'User::create'); // Menyesuaikan route untuk menampilkan form tambah user
    $routes->post('user/add', 'User::create'); // Menyesuaikan route untuk menyimpan data user baru

    $routes->get('user/edit/(:num)', 'User::edit/$1');
    $routes->post('user/update/(:num)', 'User::update/$1');
    $routes->get('user/delete/(:num)', 'User::delete/$1');
    $routes->delete('user/(:num)/delete', 'User::delete/$1');
    $routes->post('user/(:num)/activate', 'User::activate/$1');
    $routes->post('user/(:num)/deactivate', 'User::deactivate/$1');
    $routes->post('user/delete', 'User::delete/$1');
    $routes->get('user/detail/(:num)', 'User::detail/$1');

    // Bagian routes untuk daftar riwayat dosen user
    $routes->get('dosen', 'DosenController::index');
    $routes->get('dosen/inspect/(:num)', 'DosenController::inspect/$1');

    // Bagian routes untuk daftar riwayat pegawai user
    $routes->get('pegawai', 'PegawaiController::index');
    $routes->get('pegawai/inspect/(:num)', 'PegawaiController::inspect/$1');

    // Bagian routes untuk daftar riwayat mahasiswa user
    $routes->get('mahasiswa', 'MahasiswaController::index');
    $routes->get('mahasiswa/inspect/(:num)', 'MahasiswaController::inspect/$1');

    // Bagian routes untuk pengetahuan
    $routes->get('pengetahuan', 'Pengetahuan::index');
    $routes->get('pengetahuan/validasi', 'Pengetahuan::validation');
    $routes->get('pengetahuan/approve/(:num)', 'Pengetahuan::approvePengetahuan/$1'); // Routes untuk menyetujui data yang dikirim
    $routes->post('pengetahuan/approve/(:num)', 'Pengetahuan::approvePengetahuan/$1'); // Routes untuk menyetujui data yang dikirim
    $routes->get('pengetahuan/reject/(:num)', 'Pengetahuan::rejectPengetahuan/$1'); // Routes untuk menolak data yang dikirim
    $routes->post('pengetahuan/reject/(:num)', 'Pengetahuan::rejectPengetahuan/$1'); // Routes untuk menolak data yang dikirim
    $routes->get('pengetahuan/add', 'Pengetahuan::add'); // Menyesuaikan route untuk menampilkan form tambah pengetahuan
    $routes->post('pengetahuan/create', 'Pengetahuan::create'); // Menyesuaikan route untuk menyimpan data pengetahuan baru
    $routes->get('pengetahuan/edit/(:num)', 'Pengetahuan::edit/$1');
    $routes->post('pengetahuan/update/(:num)', 'Pengetahuan::update/$1');
    $routes->get('pengetahuan/delete/(:num)', 'Pengetahuan::delete/$1');
    $routes->delete('pengetahuan/(:num)/delete', 'Pengetahuan::delete/$1');
    $routes->get('pengetahuan/detail/(:num)', 'Pengetahuan::detail/$1');

    // Bagian routes untuk materi
    $routes->get('materi', 'Materi::index');
    $routes->get('materi/validasi', 'Materi::validation');
    $routes->get('materi/approve/(:num)', 'Materi::approveMateri/$1'); // Routes untuk menyetujui data yang dikirim
    $routes->post('materi/approve/(:num)', 'Materi::approveMateri/$1'); // Routes untuk menyetujui data yang dikirim
    $routes->get('materi/reject/(:num)', 'Materi::rejectMateri/$1'); // Routes untuk menolak data yang dikirim
    $routes->post('materi/reject/(:num)', 'Materi::rejectMateri/$1'); // Routes untuk menolak data yang dikirim
    $routes->get('materi/add', 'Materi::add'); // Menyesuaikan route untuk menampilkan form tambah pengetahuan
    $routes->post('materi/create', 'Materi::create'); // Menyesuaikan route untuk menyimpan data pengetahuan baru
    $routes->get('materi/edit/(:num)', 'Materi::edit/$1');
    $routes->post('materi/update/(:num)', 'Materi::update/$1');
    $routes->get('materi/delete/(:num)', 'Materi::delete/$1');
    $routes->delete('materi/(:num)/delete', 'Materi::delete/$1');
    $routes->get('materi/detail/(:num)', 'Materi::detail/$1');

    // // Bagian routes untuk diskusi
    $routes->get('discussion', 'Discussion::index');
    $routes->get('discussion/validasi', 'Discussion::validation');
    $routes->get('discussion/add', 'Discussion::add');
    $routes->post('discussion/create', 'Discussion::create');
    $routes->get('discussion/edit/(:num)', 'Discussion::edit/$1');
    $routes->post('discussion/update/(:num)', 'Discussion::update/$1');
    $routes->get('discussion/delete/(:num)', 'Discussion::delete/$1');
    $routes->delete('discussion/(:num)/delete', 'Discussion::delete/$1');
    $routes->get('discussion/validation', 'Discussion::validation');
    $routes->get('discussion/approve/(:num)', 'Discussion::approveDiskusi/$1'); // Routes untuk menyetujui data yang dikirim
    $routes->post('discussion/approve/(:num)', 'Discussion::approveDiskusi/$1'); // Routes untuk menyetujui data yang dikirim
    $routes->get('discussion/reject/(:num)', 'Discussion::rejectDiskusi/$1'); // Routes untuk menolak data yang dikirim
    $routes->post('discussion/reject/(:num)', 'Discussion::rejectDiskusi/$1'); // Routes untuk menolak data yang dikirim
    $routes->get('discussion/detail/(:num)', 'Discussion::detail/$1');
    $routes->post('discussion/detail/komentar', 'Discussion::tambahKomentar');
    $routes->post('discussion/detail/komentar/update/(:num)', 'Discussion::updateKomentar/$1'); // Routes untuk post data komentar yang dikirim
    $routes->get('discussion/detail/deleteKomentar/(:num)', 'Discussion::deleteKomentar/$1');
    $routes->post('discussion/detail/deleteKomentar/(:num)', 'Discussion::deleteKomentar/$1');

    // // Bagian routes untuk berita
    $routes->get('berita', 'Berita::index');
    $routes->get('berita/add', 'Berita::add');
    $routes->post('berita/create', 'Berita::create');
    $routes->get('berita/edit/(:num)', 'Berita::edit/$1');
    $routes->post('berita/update/(:num)', 'Berita::update/$1');
    $routes->get('berita/delete/(:num)', 'Berita::delete/$1');
    $routes->delete('berita/(:num)/delete', 'Berita::delete/$1');
    $routes->get('berita/validation', 'Berita::validation');
    $routes->get('berita/approve/(:num)', 'Berita::approveBerita/$1'); // Routes untuk menyetujui data yang dikirim
    $routes->post('berita/approve/(:num)', 'Berita::approveBerita/$1'); // Routes untuk menyetujui data yang dikirim
    $routes->get('berita/reject/(:num)', 'Berita::rejectBerita/$1'); // Routes untuk menolak data yang dikirim
    $routes->post('berita/reject/(:num)', 'Berita::rejectBerita/$1'); // Routes untuk menolak data yang dikirim

    // Bagian routes untuk dokument
    $routes->get('document', 'Document::Index');
    $routes->get('document/validasi', 'Document::validation');
    $routes->get('document/approve/(:num)', 'Document::approveDocument/$1');
    $routes->post('document/approve/(:num)', 'Document::approveDocument/$1');
    $routes->get('document/reject/(:num)', 'Document::rejectDocument/$1');
    $routes->post('document/reject/(:num)', 'Document::rejectDocument/$1');
    $routes->get('document/add', 'Document::add');
    $routes->post('document/upload', 'Document::upload');
    $routes->get('document/edit/(:num)', 'Document::edit/$1');
    $routes->post('document/update/(:num)', 'Document::update/$1');
    $routes->get('document/delete/(:num)', 'Document::delete/$1');
    $routes->delete('document/(:num)/delete', 'Document::delete/$1');
    $routes->get('document/download/(:num)', 'Document::download/$1');
    $routes->get('document/detail/(:num)', 'Document::detail/$1');
    $routes->post('document/(:num)/deleteAll', 'Document::deleteAll/$1');

    // Bagian routes untuk log activity
    $routes->get('LogAktivitas', 'LogAktivitas::index');
    $routes->get('LogAktivitas/insert(:num)', 'LogAktivitas::insertLog/$1');
    $routes->get('LogAktivitas/(:num)', 'LogAktivitas::show/$1');
    $routes->get('LogAktivitas/delete/(:num)', 'LogAktivitas::delete/$1');
    $routes->delete('LogAktivitas/(:num)/delete', 'LogAktivitas::delete/$1');

    // Bagian routes untuk setting
    $routes->get('setting', 'Setting::index');
    $routes->get('setting/edit', 'Setting::edit');
    $routes->post('setting/update', 'Setting::update');
    $routes->delete('setting/(:num)', 'Setting::delete/$1');

    // Bagian routes untuk notifikasi
    $routes->get('notifikasi', 'Notifikasi::index');
    $routes->get('notifikasi/delete-all', 'Notifikasi::delete'); // Route untuk menghapus semua pemberitahuan
    $routes->post('notifikasi/delete-all', 'Notifikasi::delete');


    // Bagian routes untuk faq
    $routes->get('faq', 'Faq::index');
    $routes->get('faq/(:num)', 'Faq::show/$1');
    $routes->get('faq/(:num)/add', 'Faq::add/$1');
    $routes->post('faq/(:num)', 'Faq::update/$1');
    $routes->delete('faq/(:num)', 'Faq::delete/$1');
    $routes->post('faq/(:num)/activate', 'Faq::activate/$1');
    $routes->post('faq/(:num)/deactivate', 'Faq::deactivate/$1');
    $routes->post('faq/(:num)/delete', 'Faq::delete/$1');
    $routes->post('faq/(:num)/restore', 'Faq::restore/$1');
    $routes->post('faq/(:num)/forceDelete', 'Faq::forceDelete/$1');
});

// Routes group Dosen
$routes->group('dosen', ['namespace' => 'App\Controllers\Dosen'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('profile', 'Profile::index');
    $routes->get('profile/edit/', 'Profile::edit');
    $routes->post('profile/update/', 'Profile::update');

    // Bagian routes untuk pengetahuan
    $routes->get('pengetahuan', 'Pengetahuan::index');
    $routes->get('pengetahuan/data-pribadi', 'Pengetahuan::pribadi');
    $routes->get('pengetahuan/add', 'Pengetahuan::add'); // Menyesuaikan route untuk menampilkan form tambah pengetahuan
    $routes->post('pengetahuan/create', 'Pengetahuan::create'); // Menyesuaikan route untuk menyimpan data pengetahuan baru
    $routes->get('pengetahuan/edit/(:num)', 'Pengetahuan::edit/$1');
    $routes->post('pengetahuan/update/(:num)', 'Pengetahuan::update/$1');
    $routes->get('pengetahuan/download/(:num)', 'Pengetahuan::download/$1');
    $routes->get('pengetahuan/delete/(:num)', 'Pengetahuan::delete/$1');
    $routes->delete('pengetahuan/(:num)/delete', 'Pengetahuan::delete/$1');
    $routes->get('pengetahuan/detail/(:num)', 'Pengetahuan::detail/$1');

    // Bagian routes untuk materi
    $routes->get('materi', 'Materi::index');
    $routes->get('materi/data-pribadi', 'Materi::pribadi');
    $routes->get('materi/add', 'Materi::add'); // Menyesuaikan route untuk menampilkan form tambah materi
    $routes->post('materi/create', 'Materi::create'); // Menyesuaikan route untuk menyimpan data materi baru
    $routes->get('materi/edit/(:num)', 'Materi::edit/$1');
    $routes->post('materi/update/(:num)', 'Materi::update/$1');
    $routes->get('materi/delete/(:num)', 'Materi::delete/$1');
    $routes->get('materi/download/(:num)', 'Materi::download/$1');
    $routes->delete('materi/(:num)/delete', 'Materi::delete/$1');
    $routes->get('materi/detail/(:num)', 'Materi::detail/$1');

    // Bagian routes untuk dokument
    $routes->get('document', 'Document::index');
    $routes->get('document/data-pribadi', 'Document::pribadi');
    $routes->get('document/add', 'Document::add');
    $routes->post('document/upload', 'Document::upload');
    $routes->get('document/edit/(:num)', 'Document::edit/$1');
    $routes->post('document/update/(:num)', 'Document::update/$1');
    $routes->get('document/delete/(:num)', 'Document::delete/$1');
    $routes->delete('document/(:num)/delete', 'Document::delete/$1');
    $routes->get('document/download/(:num)', 'Document::download/$1');
    $routes->get('document/detail/(:num)', 'Document::detail/$1');

    // // Bagian routes untuk diskusi
    $routes->get('discussion', 'Discussion::index');
    $routes->get('discussion/add', 'Discussion::add');
    $routes->post('discussion/create', 'Discussion::create');
    $routes->get('discussion/edit/(:num)', 'Discussion::edit/$1');
    $routes->post('discussion/update/(:num)', 'Discussion::update/$1');
    $routes->get('discussion/delete/(:num)', 'Discussion::delete/$1');
    $routes->delete('discussion/(:num)/delete', 'Discussion::delete/$1');
    $routes->get('discussion/pribadi', 'Discussion::pribadi');
    $routes->get('discussion/detail-pribadi/(:num)', 'Discussion::detailPribadi/$1');
    $routes->get('discussion/detail/(:num)', 'Discussion::detail/$1');
    $routes->post('discussion/detail/komentar', 'Discussion::tambahKomentar');
    $routes->post('discussion/detail/komentar/update/(:num)', 'Discussion::updateKomentar/$1'); // Routes untuk post data komentar yang dikirim

    // Bagian routes untuk berita
    $routes->get('berita', 'Berita::index');

    // Bagian routes untuk faq
    $routes->get('faq', 'Faq::index');
    $routes->get('faq/(:num)', 'Faq::show/$1');
    $routes->get('faq/(:num)/add', 'Faq::add/$1');
    $routes->post('faq/(:num)', 'Faq::update/$1');
    $routes->delete('faq/(:num)', 'Faq::delete/$1');
    $routes->post('faq/(:num)/activate', 'Faq::activate/$1');
    $routes->post('faq/(:num)/deactivate', 'Faq::deactivate/$1');
    $routes->post('faq/(:num)/delete', 'Faq::delete/$1');
    $routes->post('faq/(:num)/restore', 'Faq::restore/$1');
    $routes->post('faq/(:num)/forceDelete', 'Faq::forceDelete/$1');


    // Bagian routes untuk setting
    $routes->get('setting', 'Setting::index');
    $routes->get('setting/edit', 'Setting::edit');
    $routes->post('setting/update', 'Setting::update');
    $routes->delete('setting/(:num)', 'Setting::delete/$1');

    // Bagian routes untuk notifikasi
    $routes->get('notifikasi', 'Notifikasi::index');
});

// Routes group Pegawai
$routes->group('pegawai', ['namespace' => 'App\Controllers\Pegawai'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('profile', 'Profile::index');
    $routes->get('profile/edit/', 'Profile::edit');
    $routes->post('profile/update/', 'Profile::update');

    // Bagian routes untuk user
    $routes->get('user', 'User::index');
    $routes->get('user/edit/(:num)', 'User::edit/$1');
    $routes->post('user/update/(:num)', 'User::update/$1');
    $routes->get('user/detail/(:num)', 'User::detail/$1');

    // Bagian routes untuk pengetahuan
    $routes->get('pengetahuan', 'Pengetahuan::index');
    $routes->get('pengetahuan/data-pribadi', 'Pengetahuan::pribadi');
    $routes->get('pengetahuan/add', 'Pengetahuan::add'); // Menyesuaikan route untuk menampilkan form tambah pengetahuan
    $routes->post('pengetahuan/create', 'Pengetahuan::create'); // Menyesuaikan route untuk menyimpan data pengetahuan baru
    $routes->get('pengetahuan/edit/(:num)', 'Pengetahuan::edit/$1');
    $routes->post('pengetahuan/update/(:num)', 'Pengetahuan::update/$1');
    $routes->get('pengetahuan/delete/(:num)', 'Pengetahuan::delete/$1');
    $routes->delete('pengetahuan/(:num)/delete', 'Pengetahuan::delete/$1');
    $routes->get('pengetahuan/detail/(:num)', 'Pengetahuan::detail/$1');
    $routes->get('pengetahuan/download/(:num)', 'Pengetahuan::download/$1');

    // Bagian routes untuk materi
    $routes->get('materi', 'Materi::index');
    $routes->get('materi/data-pribadi', 'Materi::pribadi');
    $routes->get('materi/add', 'Materi::add'); // Menyesuaikan route untuk menampilkan form tambah materi
    $routes->post('materi/create', 'Materi::create'); // Menyesuaikan route untuk menyimpan data materi baru
    $routes->get('materi/edit/(:num)', 'Materi::edit/$1');
    $routes->post('materi/update/(:num)', 'Materi::update/$1');
    $routes->get('materi/delete/(:num)', 'Materi::delete/$1');
    $routes->delete('materi/(:num)/delete', 'Materi::delete/$1');
    $routes->get('materi/detail/(:num)', 'Materi::detail/$1');

    // Bagian routes untuk dokument
    $routes->get('document', 'Document::index');
    $routes->get('document/data-pribadi', 'Document::pribadi');
    $routes->get('document/add', 'Document::add');
    $routes->post('document/upload', 'Document::upload');
    $routes->get('document/edit/(:num)', 'Document::edit/$1');
    $routes->post('document/update/(:num)', 'Document::update/$1');
    $routes->get('document/delete/(:num)', 'Document::delete/$1');
    $routes->delete('document/(:num)/delete', 'Document::delete/$1');
    $routes->get('document/download/(:num)', 'Document::download/$1');
    $routes->get('document/detail/(:num)', 'Document::detail/$1');

    // // Bagian routes untuk diskusi
    $routes->get('discussion', 'Discussion::index');
    $routes->get('discussion/add', 'Discussion::add');
    $routes->post('discussion/create', 'Discussion::create');
    $routes->get('discussion/edit/(:num)', 'Discussion::edit/$1');
    $routes->post('discussion/update/(:num)', 'Discussion::update/$1');
    $routes->get('discussion/delete/(:num)', 'Discussion::delete/$1');
    $routes->delete('discussion/(:num)/delete', 'Discussion::delete/$1');
    $routes->get('discussion/pribadi', 'Discussion::pribadi');
    $routes->get('discussion/detail-pribadi/(:num)', 'Discussion::detailPribadi/$1');
    $routes->get('discussion/detail/(:num)', 'Discussion::detail/$1');
    $routes->post('discussion/detail/komentar', 'Discussion::tambahKomentar');
    $routes->post('discussion/detail/komentar/update/(:num)', 'Discussion::updateKomentar/$1'); // Routes untuk post data komentar yang dikirim

    // Bagian routes untuk berita
    $routes->get('berita', 'Berita::index');
    $routes->get('berita/add', 'Berita::add');
    $routes->post('berita/create', 'Berita::create');
    $routes->get('berita/edit/(:num)', 'Berita::edit/$1');
    $routes->post('berita/update/(:num)', 'Berita::update/$1');
    $routes->get('berita/delete/(:num)', 'Berita::delete/$1');
    $routes->delete('berita/(:num)/delete', 'Berita::delete/$1');
    $routes->get('berita/validation', 'Berita::validation');
    $routes->get('berita/approve/(:num)', 'Berita::approveBerita/$1'); // Routes untuk menyetujui data yang dikirim
    $routes->post('berita/approve/(:num)', 'Berita::approveBerita/$1'); // Routes untuk menyetujui data yang dikirim
    $routes->get('berita/reject/(:num)', 'Berita::rejectBerita/$1'); // Routes untuk menolak data yang dikirim
    $routes->post('berita/reject/(:num)', 'Berita::rejectBerita/$1'); // Routes untuk menolak data yang dikirim

    // Bagian routes untuk faq
    $routes->get('faq', 'Faq::index');
    $routes->get('faq/(:num)', 'Faq::show/$1');
    $routes->get('faq/(:num)/add', 'Faq::add/$1');
    $routes->post('faq/(:num)', 'Faq::update/$1');
    $routes->delete('faq/(:num)', 'Faq::delete/$1');
    $routes->post('faq/(:num)/activate', 'Faq::activate/$1');
    $routes->post('faq/(:num)/deactivate', 'Faq::deactivate/$1');
    $routes->post('faq/(:num)/delete', 'Faq::delete/$1');
    $routes->post('faq/(:num)/restore', 'Faq::restore/$1');
    $routes->post('faq/(:num)/forceDelete', 'Faq::forceDelete/$1');


    // Bagian routes untuk setting
    $routes->get('setting', 'Setting::index');
    $routes->get('setting/edit', 'Setting::edit');
    $routes->post('setting/update', 'Setting::update');
    $routes->delete('setting/(:num)', 'Setting::delete/$1');
    $routes->post('setting/(:num)/activate', 'Setting::activate/$1');
    $routes->post('setting/(:num)/deactivate', 'Setting::deactivate/$1');
    $routes->post('setting/(:num)/delete', 'Setting::delete/$1');
    $routes->post('setting/(:num)/restore', 'Setting::restore/$1');
    $routes->post('setting/(:num)/forceDelete', 'Setting::forceDelete/$1');

    // Bagian routes untuk notifikasi
    $routes->get('notifikasi', 'Notifikasi::index');
});

// Routes group Mahasiswa
$routes->group('mahasiswa', ['namespace' => 'App\Controllers\Mahasiswa'], function ($routes) {
    // Bagian routes untuk dashboard
    $routes->get('dashboard', 'Dashboard::index');
    // $routes->get('mahasiswa/dashboard/profile/(:num)', 'Mahasiswa\Dashboard::profile/$1');

    $routes->get('profile', 'Profile::index');
    $routes->get('profile/edit/', 'Profile::edit');
    $routes->post('profile/update/', 'Profile::update');

    // Bagian routes untuk pengetahuan
    $routes->get('pengetahuan', 'Pengetahuan::index');
    // $routes->get('pengetahuan/add', 'Pengetahuan::add'); // Menyesuaikan route untuk menampilkan form tambah pengetahuan
    // $routes->post('pengetahuan/create', 'Pengetahuan::create'); // Menyesuaikan route untuk menyimpan data pengetahuan baru
    // $routes->get('pengetahuan/edit/(:num)', 'Pengetahuan::edit/$1');
    // $routes->post('pengetahuan/update/(:num)', 'Pengetahuan::update/$1');
    // $routes->get('pengetahuan/delete/(:num)', 'Pengetahuan::delete/$1');
    // $routes->delete('pengetahuan/(:num)/delete', 'Pengetahuan::delete/$1');
    $routes->get('pengetahuan/detail/(:num)', 'Pengetahuan::detail/$1');
    $routes->get('pengetahuan/download/(:num)', 'Pengetahuan::download/$1');

    // Bagian routes untuk materi
    $routes->get('materi', 'Materi::index');
    // $routes->get('materi/add', 'Materi::add'); // Menyesuaikan route untuk menampilkan form tambah materi
    // $routes->post('materi/create', 'Materi::create'); // Menyesuaikan route untuk menyimpan data materi baru
    // $routes->get('materi/edit/(:num)', 'Materi::edit/$1');
    // $routes->post('materi/update/(:num)', 'Materi::update/$1');
    // $routes->get('materi/delete/(:num)', 'Materi::delete/$1');
    // $routes->delete('materi/(:num)/delete', 'Materi::delete/$1');
    $routes->get('materi/detail/(:num)', 'Materi::detail/$1');

    // Bagian routes untuk dokument
    $routes->get('document', 'Document::Index');
    // $routes->get('document/add', 'Document::add');
    // $routes->post('document/upload', 'Document::upload');
    // $routes->get('document/edit/(:num)', 'Document::edit/$1');
    // $routes->post('document/update/(:num)', 'Document::update/$1');
    // $routes->get('document/delete/(:num)', 'Document::delete/$1');
    // $routes->delete('document/(:num)/delete', 'Document::delete/$1');
    // $routes->get('document/download/(:num)', 'Document::download/$1');
    $routes->get('document/detail/(:num)', 'Document::detail/$1');
    // $routes->post('document/(:num)/deleteAll', 'Document::deleteAll/$1');

    // // Bagian routes untuk diskusi
    $routes->get('discussion', 'Discussion::index');
    $routes->get('discussion/add', 'Discussion::add');
    $routes->post('discussion/create', 'Discussion::create');
    $routes->get('discussion/edit/(:num)', 'Discussion::edit/$1');
    $routes->post('discussion/update/(:num)', 'Discussion::update/$1');
    // $routes->get('discussion/delete/(:num)', 'Discussion::delete/$1');
    // $routes->delete('discussion/(:num)/delete', 'Discussion::delete/$1');
    $routes->get('discussion/pribadi', 'Discussion::pribadi');
    $routes->get('discussion/detail_pribadi/(:num)', 'Discussion::detail_pribadi/$1');
    $routes->get('discussion/detail/(:num)', 'Discussion::detail/$1');
    $routes->post('discussion/detail/komentar', 'Discussion::tambahKomentar');
    $routes->post('discussion/detail/komentar/update/(:num)', 'Discussion::updateKomentar/$1'); // Routes untuk post data komentar yang dikirim

    // Bagian routes untuk berita
    $routes->get('berita', 'Berita::index');

    // Bagian routes untuk faq
    $routes->get('faq', 'Faq::index');
    $routes->get('faq/(:num)', 'Faq::show/$1');

    // Bagian routes untuk setting
    $routes->get('setting', 'Setting::index');
    $routes->get('setting/edit', 'Setting::edit');
    $routes->post('setting/update', 'Setting::update');
    $routes->delete('setting/(:num)', 'Setting::delete/$1');

    // Bagian routes untuk notifikasi
    $routes->get('notifikasi', 'Notifikasi::index');
});


$routes->get('404_override', 'Auth::notFound');
