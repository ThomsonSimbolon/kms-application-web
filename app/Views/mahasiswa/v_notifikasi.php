<?= $this->extend('template/templates_mahasiswa/index'); ?>


<?= $this->section('content-mhs'); ?>
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
            <h5 class="card-title my-0 text-white">Data Notifikasi</h5>
            <a href="<?= base_url('mahasiswa/dashboard'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <div class="card-body">
            <?php if (isset($notifikasi) && count($notifikasi) > 0) : ?>
                <div class="row">
                    <?php foreach ($notifikasi as $key => $value) : ?>
                        <div class="col-lg-12">
                            <div class="card shadow mb-2">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $value->type ?></h4>
                                    <p class="card-text"><?= $value->pesan ?></p>
                                </div>
                                <div class="card-footer bg-white py-2">
                                    <p class="card-text"><?= $value->tgl_posting; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p>Tidak ada notifikasi yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>