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
                    <h4 class="card-title my-0 text-primary">Tambah Data Diskusi</h4>
                    <a href="<?= base_url('admin/discussion'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
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
                    <form action="<?= site_url('admin/discussion/create'); ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control  <?= session('errors.nama_lengkap') ? 'is-invalid' : null ?>" id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap'); ?>">
                            <?php if (session('errors.nama_lengkap')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.nama_lengkap') ?>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="form-group">
                            <label for="judul_forum">Judul Diskusi</label>
                            <input type="text" class="form-control  <?= session('errors.judul_forum') ? 'is-invalid' : null ?>" id="judul_forum" name="judul_forum" value="<?= old('judul_forum'); ?>">
                            <?php if (session('errors.judul_forum')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.judul_forum') ?>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control  <?= session('errors.deskripsi') ? 'is-invalid' : null ?>" id="deskripsi" name="deskripsi" rows="3"><?= old('deskripsi'); ?></textarea>
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
    </div>
</div>

<!-- Script untuk memanggil ckeditor -->
<script src="<?= base_url(); ?>/assets/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
</script>
<?= $this->endSection(); ?>