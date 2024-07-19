<ul class="nav flex-column side-bar text-decoration-none mx-2 py-2">
    <a href="<?= base_url('pegawai/dashboard'); ?>"
        class="sidebar-brand text-dark my-0 text-decoration-none h4 d-flex align-items-center">
        <?php if (!empty($profile) && isset($profile['upload_foto']) && !empty($profile['upload_foto'])) { ?>
        <img class="img-profile rounded side-bar-img" src="<?= base_url('uploads/' . $profile['upload_foto']) ?>">
        <?php } else { ?>
        <img class="img-profile rounded side-bar-img" src="<?= base_url('/assets/custom-css/img/user-icon.png') ?>">
        <?php } ?>
        <span class="ml-2 d-none d-lg-inline text-dark small"><?= $profile['nama_lengkap']; ?> -
            <?= $profile['nidn']; ?></span>
    </a>
    <hr>
    <li class="nav-item <?php echo ($active == 'dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/pegawai/dashboard'); ?>"><i class="fas fa-house"></i>
            Dashboard</a>
    </li>
    <li class="nav-item <?php echo ($active == 'profile') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/pegawai/profile'); ?>"><i class="fas fa-address-card"></i>
            Profile</a>
    </li>
    <li class="nav-item <?php echo ($active == 'user') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/pegawai/user'); ?>"><i class="fas fa-user-gear"></i>
            Pengguna</a>
    </li>
    <li class="nav-item <?php echo ($active == 'materi') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/pegawai/materi'); ?>"><i class="fas fa-book-open-reader"></i>
            Materi</a>
    </li>
    <li class="nav-item <?php echo ($active == 'pengetahuan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/pegawai/pengetahuan'); ?>"><i class="fas fa-book-open"></i>
            Pengetahuan</a>
    </li>
    <li class="nav-item <?php echo ($active == 'dokumen') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/pegawai/document'); ?>"><i class="fas fa-file"></i> Dokumen</a>
    </li>
    <li class="nav-item <?php echo ($active == 'discussion') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/pegawai/discussion'); ?>"><i class="fas fa-comment"></i> Forum
            Diskusi</a>
    </li>
    <li class="nav-item <?php echo ($active == 'berita') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/pegawai/berita'); ?>"><i class="fas fa-newspaper"></i> Berita</a>
    </li>
</ul>