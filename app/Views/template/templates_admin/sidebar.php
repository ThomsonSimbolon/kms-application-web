<ul class="navbar-nav sidebar accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand text-dark d-flex align-items-center justify-content-center" href="/admin/dashboard">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('/assets/custom-css/img/logo_kms.png') ?>" class="img-fluid rounded py-1" alt="Brand Image">
        </div>
        <div class="sidebar-brand-text">KMS-App</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider horizontal my-1">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item nav-v <?php echo ($active == 'dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/dashboard') ?>">
            <i class="fas fa-fw fa-house-chimney"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Profile -->
    <li class="nav-item nav-v <?php echo ($active == 'profile') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/profile') ?>">
            <i class="fas fa-fw fa-id-card"></i>
            <span>Profile</span>
        </a>
    </li>

    <!-- Nav Item - Data Pengguna -->
    <li class="nav-item nav-v <?php echo ($active == 'user') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/user'); ?>">
            <i class="fas fa-fw fa-users-gear"></i>
            <span>Pengguna</span>
        </a>
    </li>

    <!-- Nav Item - Pages Data Pribadi User -->
    <li class="nav-item nav-v <?php echo ($active == 'riwayat') ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user-gear"></i>
            <span>Daftar Riwayat</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Lihat Data Pengguna</h6>
                <a class="collapse-item" href="<?= base_url('/admin/dosen'); ?>">Data Dosen</a>
                <a class="collapse-item" href="<?= base_url('/admin/pegawai'); ?>">Data Pegawai</a>
                <a class="collapse-item" href="<?= base_url('/admin/mahasiswa'); ?>">Data Mahasiswa</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Materi -->
    <li class="nav-item nav-v <?php echo ($active == 'materi') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/materi'); ?>">
            <i class="fas fa-fw fa-book-open-reader"></i>
            <span>Materi</span>
        </a>
    </li>

    <!-- Nav Item - Data Pengetahuan -->
    <li class="nav-item nav-v <?php echo ($active == 'pengetahuan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/pengetahuan'); ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Pengetahuan</span>
        </a>
    </li>

    <!-- Nav Item - Data Dokumen -->
    <li class="nav-item nav-v <?php echo ($active == 'dokumen') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/document'); ?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Dokumen</span></a>
    </li>

    <!-- Nav Item - Forum Diskusi -->
    <li class="nav-item nav-v <?php echo ($active == 'discussion') ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="<?= base_url('/admin/discussion'); ?>">
            <i class="fas fa-fw fa-user-group"></i>
            <span>Forum Diskusi</span>
        </a>
    </li>

    <!-- Nav Item -  Berita -->
    <li class="nav-item nav-v <?php echo ($active == 'berita') ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="<?= base_url('/admin/berita'); ?>">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Berita</span>
        </a>
    </li>

    <!-- Nav Item - Forum Diskusi -->
    <li class="nav-item nav-v <?php echo ($active == 'LogActivity') ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="<?= base_url('/admin/LogAktivitas'); ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Log Aktivitas</span>
        </a>
    </li>


    <!-- Nav Item - Setting / Pengaturan -->
    <li class="nav-item nav-v <?php echo ($active == 'setting') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/setting'); ?>">
            <i class="fas fa-fw fa-gear"></i>
            <span>Setting</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>