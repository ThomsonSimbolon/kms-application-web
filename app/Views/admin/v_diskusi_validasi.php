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
                    <h5 class="card-title my-0 text-primary">Validasi Forum Diskusi</h5>
                    <a href="<?= base_url('admin/discussion'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
                </div>

                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert" id="success-alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <?php if (empty($diskusis)) : ?>
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Data forum diskusi kosong</h2>
                            </div>
                        </div>
                    <?php else : ?>
                        <?php foreach ($diskusis as $diskusi) : ?>
                            <div class="card shadow-sm" style="margin-top: 20px;">
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
                                            Post: <?= date('d-m-Y H:i:s', strtotime($diskusi->tgl_posting)) ?>
                                        </small></p>
                                    <?php if ($diskusi->status == 'pending') : ?>
                                        <a href="<?= base_url('admin/discussion/approve/' . $diskusi->id_forum); ?>" class="btn btn-sm btn-success">Terima</a>
                                        <a href="<?= base_url('admin/discussion/reject/' . $diskusi->id_forum); ?>" class="btn btn-sm btn-danger">Tolak</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>