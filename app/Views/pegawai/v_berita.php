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
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title my-0 text-white">Data Berita</h5>
            <a href="<?= base_url('pegawai/berita/add'); ?>" class="btn btn-primary btn-sm shadow-sm">Tambah</a>
        </div>
        <div class="card-body">
            <?php if (isset($berita) && count($berita) > 0) : ?>
                <div class="row">
                    <?php foreach ($berita as $beritaItem) : ?>
                        <div class="col-lg-6 mb-5">
                            <div class="d-flex align-items-center">
                                <p class="mb-2"><?= esc($beritaItem->penulis); ?> <i class="fas fa fa-angle-right" style="font-size: 0.8rem;"></i>
                                    <a href="<?= esc($beritaItem->url); ?>" target="_blank"><?= esc($beritaItem->judul); ?></a>
                                </p>
                            </div>
                            <div class="card card-berita shadow h-100">
                                <img src="<?= base_url('/assets/custom-css/img/img-upload/' . $beritaItem->file_path); ?>" class="card-img-top" alt="Gambar Berita" style="height: 350px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= esc($beritaItem->judul); ?></h5>
                                    <p class="card-text"><?= esc($beritaItem->isi); ?></p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted"><?= date('d-m-Y H:i:s', strtotime($beritaItem->tgl_publikasi)) ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p>Tidak ada berita yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>