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
            <h5 class="card-title my-0 text-white">Tambah Pengetahuan</h5>
            <a href="<?= base_url('pegawai/pengetahuan'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
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
            <form action="<?= site_url('pegawai/pengetahuan/create/') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control <?= session('errors.nama_lengkap') ? 'is-invalid' : null ?>" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" autofocus>

                    <?php if (session('errors.nama_lengkap')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.nama_lengkap') ?>
                        </div>
                    <?php endif ?>

                </div>
                <div class="form-group">
                    <label for="judul_pengetahuan">Judul Pengetahuan</label>
                    <input type="text" class="form-control <?= session('errors.judul_pengetahuan') ? 'is-invalid' : null ?>" id="judul_pengetahuan" name="judul_pengetahuan" placeholder="Masukkan judul pengetahuan" autofocus>

                    <?php if (session('errors.judul_pengetahuan')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.judul_pengetahuan') ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="jenis_pengetahuan">Jenis Pengetahuan</label>
                    <input type="text" class="form-control <?= session('errors.jenis_pengetahuan') ? 'is-invalid' : null ?>" id="jenis_pengetahuan" name="jenis_pengetahuan" placeholder="Masukkan jenis pengetahuan">

                    <?php if (session('errors.jenis_pengetahuan')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.jenis_pengetahuan') ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="deskripsi_pengetahuan">Deskripsi</label>
                    <textarea class="form-control <?= session('errors.deskripsi_pengetahuan') ? 'is-invalid' : null ?>" id="deskripsi_pengetahuan" name="deskripsi_pengetahuan" cols="30" rows="10" placeholder="Masukkan deskripsi"></textarea>

                    <?php if (session('errors.deskripsi_pengetahuan')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.deskripsi_pengetahuan') ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="file">File</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= session('errors.file_path') ? 'is-invalid' : '' ?>" id="file" name="file_path">
                        <label class="custom-file-label" for="file">Choose file</label>
                        <?php if (session('errors.file_path')) : ?>
                            <div class="invalid-feedback">
                                <?= session('errors.file_path') ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>