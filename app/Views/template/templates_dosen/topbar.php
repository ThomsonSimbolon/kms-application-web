<nav class="navbar shadow navbar-expand-lg sticky-top top-0 py-3 navbar-light bg-light">
    <div class="container-fluid pr-0">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('dosen/dashboard'); ?>"><img
                src="<?= base_url('assets/custom-css/img/logo_kms.png'); ?>" class="img-fluid logo" alt="" />
            <span class="ml-2">KMS-App</span></a>
        <button class="navbar-toggler shadow-none border border-0" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto my-auto">
                <li class="nav-item nav-1 <?php echo ($active == 'dashboard') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('/dosen/dashboard') ?>">Dashboard</a>
                </li>
                <li class="nav-item nav-1 <?php echo ($active == 'materi') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('/dosen/materi'); ?>">Materi</a>
                </li>
                <li class="nav-item nav-1 <?php echo ($active == 'pengetahuan') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('/dosen/pengetahuan') ?>">Pengetahuan</a>
                </li>
                <li class="nav-item nav-1 <?php echo ($active == 'dokumen') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('/dosen/document') ?>">Dokumen</a>
                </li>
                <li class="nav-item nav-1 <?php echo ($active == 'discussion') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('/dosen/discussion') ?>">Forum Diskusi</a>
                </li>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown arrow">
                    <a class="nav-link dropdown-toggle" href="" id="menuDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Informasi
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="menuDropdown">
                        <a class="dropdown-item text-gray-700" href="<?= base_url('dosen/berita') ?>">
                            <i class="fas fa-newspaper fa-sm fa-fw mr-2 text-gray-400"></i>
                            Berita
                        </a>
                        <a class="dropdown-item text-gray-700" href="<?= base_url('dosen/faq'); ?>">
                            <i class="fas fa-question fa-sm fa-fw mr-2 text-gray-400"></i>
                            FAQ
                        </a>
                    </div>
                </li>

                <!-- Nav Item - Notifikasi -->
                <?php

                use App\Models\NotifikasiModel;

                $notifikasiModel = new NotifikasiModel();
                $notifikasi = $notifikasiModel->orderBy('tgl_posting', 'DESC')->findAll(5);  // Menampilkan 5 notifikasi terbaru
                ?>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter"><?= count($notifikasi) ?>+</span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <h6 class="dropdown-header">
                            Notifikasi
                        </h6>
                        <?php foreach ($notifikasi as $notifikasi) : ?>
                        <?php
                            // Tentukan ikon berdasarkan tipe notifikasi
                            $iconClass = '';
                            switch ($notifikasi->type) {
                                case 'materi':
                                    $iconClass = 'fas fa-book-open-reader';
                                    break;
                                case 'pengetahuan':
                                    $iconClass = 'fas fa-book-open';
                                    break;
                                case 'dokumen':
                                    $iconClass = 'fas fa-folder-open';
                                    break;
                                case 'discussion':
                                    $iconClass = 'fas fa-comments';
                                    break;
                                case 'berita':
                                    $iconClass = 'fas fa-newspaper';
                                    break;
                                default:
                                    $iconClass = 'fas fa-info-circle'; // Default icon jika tipe tidak dikenali
                                    break;
                            }
                            ?>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="<?= $iconClass ?> text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500"><?= $notifikasi->tgl_posting ?></div>
                                <div class="small text-gray-700"><?= $notifikasi->pesan ?></div>
                            </div>
                        </a>
                        <?php endforeach; ?>
                        <a class="dropdown-item text-center small text-gray-500"
                            href="<?= base_url('dosen/notifikasi'); ?>">Tampilkan Semua Notifikasi</a>
                    </div>
                </li>

                <li class="nav-item dropdown arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-dark small"><?= $profile['nama_lengkap']; ?> |
                            <?= $profile['nidn']; ?> |</span>
                        <?php if (!empty($profile) && isset($profile['upload_foto']) && !empty($profile['upload_foto'])) { ?>
                        <img class="img-profile rounded-circle logo-profile"
                            src="<?= base_url('uploads/' . $profile['upload_foto']) ?>">
                        <?php } else { ?>
                        <img class="img-profile rounded-circle logo-profile"
                            src="<?= base_url('/assets/custom-css/img/user-icon.png') ?>">
                        <?php } ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item text-gray-700" href="<?= base_url('dosen/profile') ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item text-gray-700" href="<?= base_url('dosen/setting'); ?>">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item text-gray-700" href="#" id="logoutBtn">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>