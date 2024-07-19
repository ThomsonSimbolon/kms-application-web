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
<div class="container-fluid px-0 mx-0 content-2 rounded">
    <div class="card shadow px-0">
        <div class="card-header border border-1 d-flex align-items-center justify-content-between">
            <h5 class="card-title my-0 text-white">Edit Data Diskusi</h5>
            <a href="<?= base_url('dosen/discussion'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
        </div>

        <!-- Notifikasi berhasil tambah pengetahuan -->
        <?php if (session('success')) : ?>
        <div class="alert alert-success" role="alert" id="success-alert">
            <?= session('success'); ?>
        </div>
        <?php endif; ?>

        <!-- Notifikasi gagal tambah pengetahuan -->
        <?php if (session('failed')) : ?>
        <div class="alert alert-danger" role="alert" id="error-alert">
            <?= session('failed'); ?>
        </div>
        <?php endif; ?>

        <?php $validation = \Config\Services::validation(); ?>
        <div class="card-body">
            <form action="<?= site_url('dosen/discussion/update/' . $diskusi->id_forum); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control  <?= session('errors.nama_lengkap') ? 'is-invalid' : null ?>"
                        id="nama_lengkap" name="nama_lengkap"
                        value="<?= old('nama_lengkap', $diskusi->nama_lengkap); ?>">
                    <?php if (session('errors.nama_lengkap')) : ?>
                    <div class="invalid-feedback">
                        <?= session('errors.nama_lengkap') ?>
                    </div>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="judul_forum">Judul Diskusi</label>
                    <input type="text" class="form-control  <?= session('errors.judul_forum') ? 'is-invalid' : null ?>"
                        id="judul_forum" name="judul_forum" value="<?= old('judul_forum', $diskusi->judul_forum); ?>">
                    <?php if (session('errors.judul_forum')) : ?>
                    <div class="invalid-feedback">
                        <?= session('errors.judul_forum') ?>
                    </div>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control  <?= session('errors.deskripsi') ? 'is-invalid' : null ?>"
                        id="deskripsi" name="deskripsi"
                        rows="3"><?= old('deskripsi', $diskusi->deskripsi); ?></textarea>
                    <?php if (session('errors.deskripsi')) : ?>
                    <div class="invalid-feedback">
                        <?= session('errors.deskripsi') ?>
                    </div>
                    <?php endif ?>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>