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
                    <h4 class="card-title my-0 text-primary">Edit Data Berita</h4>
                    <a href="<?= base_url('admin/berita'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
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
                    <form action="<?= site_url('admin/berita/update/' . $berita->id_berita) ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                        <?= csrf_field() ?>
                        <input type="hidden" id="id_berita" name="id_berita" value="<?= $berita->id_berita; ?>">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control  <?= session('errors.judul') ? 'is-invalid' : null ?>" id="nama_lengkap" name="judul" value="<?= old('judul', $berita->judul); ?>" placeholder="Masukkan judul...">
                            <?php if (session('errors.judul')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.judul') ?>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <textarea class="form-control  <?= session('errors.isi') ? 'is-invalid' : null ?>" id="deskripsi" name="isi" rows="5"><?= old('isi', $berita->isi); ?></textarea>
                            <?php if (session('errors.isi')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.isi') ?>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input type="text" class="form-control  <?= session('errors.penulis') ? 'is-invalid' : null ?>" id="penulis" name="penulis" value="<?= old('penulis', $berita->penulis); ?>" placeholder="Masukkan penulis...">
                            <?php if (session('errors.penulis')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.penulis') ?>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" class="form-control  <?= session('errors.url') ? 'is-invalid' : null ?>" id="url" name="url" value="<?= old('url', $berita->url); ?>" placeholder="Masukkan url...">
                            <?php if (session('errors.url')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.url') ?>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="form-group">
                            <label for="file_path">File</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file_path" value="<?= $berita->file_path; ?>">
                                <label class="custom-file-label" for="file"><?= $berita->file_path; ?></label>
                                <?php if ($berita->file_path) : ?>
                                    <div class="mt-2">
                                        File saat ini: <?= $berita->file_path ?>
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
    CKEDITOR.replace('isi');
</script>
<?= $this->endSection(); ?>