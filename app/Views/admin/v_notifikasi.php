<?= $this->extend('template/templates_admin/index'); ?>


<?= $this->section('content-admin'); ?>
<div class="container-fluid">
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

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title my-0 text-primary">Data Notifikasi</h5>
                    <a href="<?= base_url('admin/dashboard'); ?>" class="text-danger"><i
                            class="fa-solid fa-xmark"></i></a>
                </div>
                <div class="card-body">
                    <?php if (isset($notifikasi) && count($notifikasi) > 0) : ?>
                    <div class="row">
                        <?php foreach ($notifikasi as $key => $value) : ?>
                        <div class="col-lg-12">
                            <a href="<?= base_url($value->type) ?>" class="text-decoration-none text-gray-600">
                                <div class="card shadow mb-2">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= $value->type ?></h4>
                                        <p class="card-text"><?= $value->pesan ?></p>
                                    </div>
                                    <div class="card-footer bg-white py-2">
                                        <p class="card-text"><?= $value->tgl_posting; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php else : ?>
                    <p>Tidak ada notifikasi yang tersedia.</p>
                    <?php endif; ?>
                </div>
                <div class="card-footer">
                    <a href="<?= site_url('admin/notifikasi/delete-all') ?>" class="btn btn-sm btn-danger shadow"><i
                            class="fas fa-trash"></i> Hapus Semua</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>