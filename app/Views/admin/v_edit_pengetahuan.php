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

    <div class="card shadow">
        <div class="card-body">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title my-0 text-primary">Edit Data Pengetahuan</h5>
                    <a href="<?= base_url('admin/pengetahuan'); ?>" class="text-danger"><i
                            class="fa-solid fa-xmark"></i></a>
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
                    <form action="<?= site_url('admin/pengetahuan/update/' . $pengetahuan->id_pengetahuan) ?>"
                        method="post" enctype="multipart/form-data" autocomplete="off">
                        <?= csrf_field() ?>
                        <input type="hidden" id="id_pengetahuan" name="id_pengetahuan">
                        <div class="form-group row col-md-4">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text"
                                class="form-control <?= session('errors.nama_lengkap') ? 'is-invalid' : null ?>"
                                id="nama_lengkap" name="nama_lengkap" value="<?= $pengetahuan->nama_lengkap; ?>">

                            <?php if (session('errors.nama_lengkap')) : ?>
                            <div class="invalid-feedback">
                                <?= session('errors.nama_lengkap') ?>
                            </div>
                            <?php endif ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="judul_pengetahuan">Judul Pengetahuan</label>
                                <input type="text"
                                    class="form-control <?= session('errors.judul_pengetahuan') ? 'is-invalid' : null ?>"
                                    id="judul_pengetahuan" name="judul_pengetahuan"
                                    value="<?= $pengetahuan->judul_pengetahuan; ?>">

                                <?php if (session('errors.judul_pengetahuan')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.judul_pengetahuan') ?>
                                </div>
                                <?php endif ?>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="jenis_pengetahuan">Jenis Pengetahuan</label>
                                <input type="text"
                                    class="form-control <?= session('errors.jenis_pengetahuan') ? 'is-invalid' : null ?>"
                                    id="jenis_pengetahuan" name="jenis_pengetahuan"
                                    value="<?= $pengetahuan->jenis_pengetahuan; ?>">

                                <?php if (session('errors.jenis_pengetahuan')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.jenis_pengetahuan') ?>
                                </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_pengetahuan">Deskripsi</label>
                            <textarea
                                class="form-control <?= session('errors.deskripsi_pengetahuan') ? 'is-invalid' : null ?>"
                                id="deskripsi" name="deskripsi_pengetahuan" cols="30"
                                rows="10"><?= $pengetahuan->deskripsi_pengetahuan; ?></textarea>

                            <?php if (session('errors.deskripsi_pengetahuan')) : ?>
                            <div class="invalid-feedback">
                                <?= session('errors.deskripsi_pengetahuan') ?>
                            </div>
                            <?php endif ?>
                        </div>

                        <div class="form-group">
                            <label for="file_path">File</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file_path"
                                    value="<?= $pengetahuan->file_path; ?>">
                                <label class="custom-file-label" for="file"><?= $pengetahuan->file_path; ?></label>
                                <?php if ($pengetahuan->file_path) : ?>
                                <div class="mt-2">
                                    File saat ini: <?= $pengetahuan->file_path ?>
                                </div>
                                <?php endif ?>
                            </div>
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
CKEDITOR.replace('deskripsi_pengetahuan', {
    extraPlugins: 'link',
});
</script>
<?= $this->endSection(); ?>