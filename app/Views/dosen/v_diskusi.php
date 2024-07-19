<?= $this->extend('template/templates_dosen/index'); ?>


<?= $this->section('content-dsn'); ?>
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

<div class="mb-3">
    <a href="<?= base_url('dosen/discussion/pribadi'); ?>"
        class="btn btn-primary bg-gradient-primary border-0 btn-sm shadow-sm"><i class="fas fa-id-badge"></i> Data
        Pribadi</a>
</div>

<div class="container-fluid px-0 mx-0 content-2 rounded">
    <div class="card shadow px-0">
        <div class="card-header border border-1 d-flex align-items-center justify-content-between">
            <h5 class="card-title my-0 text-white">Forum Diskusi</h5>
            <a href="<?= base_url('dosen/discussion/add'); ?>" class="btn btn-primary btn-sm shadow-sm">Tambah</a>
        </div>

        <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert" id="success-alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
        <?php endif; ?>
        <div class="card-body">
            <?php if (empty($d)) : ?>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Data forum diskusi kosong</h2>
                </div>
            </div>
            <?php else : ?>
            <?php foreach ($d as $d) : ?>
            <div class="card shadow-sm" style="margin-top: 20px;">
                <div class="card-body">
                    <h1 class="card-title" style="font-size: 25px;"><?= old('judul_forum', $d->judul_forum); ?>
                    </h1>
                    <p class="card-text text-justify" style="font-size: 16px;">
                        <?= old('deskripsi', $d->deskripsi); ?></p>
                    <p class="card-text"><small class="text-muted" style="font-size: 14px;">
                            Nama: <?= old('nama_lengkap', $d->nama_lengkap); ?> -
                            <?= old('id_user', $d->id_user); ?>
                        </small></p>
                    <p class="card-text"><small class="text-muted" style="font-size: 14px;">
                            Post: <?= date('d-m-Y H:i:s', strtotime($d->tgl_posting)) ?>
                        </small></p>
                    <a href="<?= site_url('dosen/discussion/detail/' . $d->id_forum); ?>"
                        class="btn btn-info btn-sm shadow-sm"><i class="fas fa-eye"></i> Lihat</a>
                </div>
                <div class="card-footer p-2 d-flex align-items-center">
                    <p class="card-text text-gray-500"><small class="text-muted" style="font-size: 10px;">
                            Status: <?= $d->status; ?>
                        </small></p>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>