<nav class="navbar navbar-expand navbar-dark  topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search position-relative">
        <div class="input-group">
            <input type="text" id="searchInput" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-light border border-left" type="button">
                    <i class="fas fa-search fa-sm text-gray-700"></i>
                </button>
            </div>
        </div>
        <div id="searchResults" class="list-group position-absolute w-100 mt-1 bg-white shadow-sm"
            style="z-index: 1000;"></div>
    </form> -->


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Notifikasi -->
        <?php

        use App\Models\NotifikasiModel;

        $notifikasiModel = new NotifikasiModel();
        $notifikasi = $notifikasiModel->orderBy('tgl_posting', 'DESC')->findAll(5);  // Menampilkan 5 notifikasi terbaru
        ?>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?= count($notifikasi) ?>+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
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
                    href="<?= base_url('admin/notifikasi'); ?>">Tampilkan Semua Notifikasi</a>
            </div>
        </li>

        <!-- Nav Item - Faq -->
        <li class="nav-item dropdown">
            <a class="nav-link" href="<?= base_url('admin/faq'); ?>">
                <i class="fas fa-question fa-fw"></i>
            </a>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-light small"><?= $level; ?>
                    |</span>
                <img class="img-profile rounded-circle" src="<?= base_url('/assets/custom-css/img/admin_icon.png'); ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item text-gray-700" href="<?= base_url('admin/profile') ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item text-gray-700" href="<?= base_url('/admin/setting'); ?>">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item text-gray-700" href="<?= base_url('/admin/LogAktivitas'); ?>">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Log Aktivitas
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-gray-700" href="#" id="logoutBtn">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>