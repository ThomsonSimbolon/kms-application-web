<?= $this->extend('template/templates_pegawai/index'); ?>


<?= $this->section('content-pgw'); ?>

<!-- Topbar Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <?php foreach ($breadcrumb as $key => $link) : ?>
            <?php if ($key === 'Active Page') : ?>
                <li class="breadcrumb-item active" aria-current="page"><?= $link ?></li>
            <?php else : ?>
                <li class="breadcrumb-item"><a href="<?= $link ?>"><?= $key ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ol>
</nav>

<div class="container-fluid px-0 mx-0 content-2 rounded">
    <div class="card shadow px-0">
        <div class="card-header border border-1 d-flex align-items-center justify-content-between">
            <h5 class="card-title my-0 text-white">Detail Diskusi Pribadi</h5>
            <a href="<?= base_url('dosen/discussion/pribadi'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <div class="card-body">
            <!-- Ini adalah halaman konten forum diskusi -->
            <div class="card shadow-sm">

                <div class="card-body">
                    <h1 class="card-title" style="font-size: 25px;">
                        <?= old('judul_forum', $diskusi->judul_forum); ?>
                    </h1>
                    <p class="card-text text-justify" style="font-size: 16px;">
                        <?= old('deskripsi', $diskusi->deskripsi); ?></p>
                    <p class="card-text"><small class="text-muted" style="font-size: 14px;">
                            Nama: <?= old('nama_lengkap', $diskusi->nama_lengkap); ?> -
                            <?= old('id_user', $diskusi->id_user); ?>
                        </small></p>
                    <p class="card-text"><small class="text-muted" style="font-size: 14px;">
                            Post: (<?= date('d-m-Y H:i:s', strtotime($diskusi->tgl_posting)) ?>)
                        </small></p>
                </div>
                <div class="card-footer py-1">
                    <p class="card-text text-gray-500 mb-1"><small class="text-muted" style="font-size: 12px;">
                            Status: <?= $diskusi->status; ?>
                        </small></p>
                </div>
            </div>
            <!-- End halaman konten forum diskusi -->
        </div>
    </div>
</div>

<?= $this->endSection(); ?>