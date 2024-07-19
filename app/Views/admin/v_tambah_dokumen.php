<?= $this->extend('template/templates_admin/index'); ?>


<?= $this->section('content-admin'); ?>
<div class="container-fluid">
    <!-- Halaman untuk menampilkan tambah data dokumen -->
    <div class="d-flex align-items-center justify-content-center">
        <div class="card shadow" style="width: 750px;">
            <div class="card-body">
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
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="card-title my-0 text-primary">Tambah Data Dokumen</h4>
                        <a href="<?= base_url('admin/document'); ?>" class="text-danger"><i
                                class="fa-solid fa-xmark"></i></a>
                    </div>
                    <?php $validation = \Config\Services::validation(); ?>
                    <div class="card-body">
                        <form action="<?= site_url('admin/document/upload') ?>" method="post"
                            enctype="multipart/form-data" autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text"
                                    class="form-control <?= session('errors.nama_lengkap') ? 'is-invalid' : null ?>"
                                    id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap') ?>"
                                    placeholder="Masukkan nama lengkap" autofocus>
                                <?php if (session('errors.nama_lengkap')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.nama_lengkap') ?>
                                </div>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="judul_dokumen">Judul Dokumen</label>
                                <input type="text"
                                    class="form-control <?= session('errors.judul_dokumen') ? 'is-invalid' : null ?>"
                                    id="judul_dokumen" name="judul_dokumen" value="<?= old('judul_dokumen') ?>"
                                    placeholder="Masukkan judul dokumen">
                                <?php if (session('errors.judul_dokumen')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.judul_dokumen') ?>
                                </div>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control <?= session('errors.deskripsi') ? 'is-invalid' : null ?>"
                                    id="deskripsi" name="deskripsi"
                                    placeholder="Masukkan deskripsi"><?= old('deskripsi') ?></textarea>
                                <?php if (session('errors.deskripsi')) : ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.deskripsi') ?>
                                </div>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="file">File</label>
                                <div class="custom-file">
                                    <input type="file"
                                        class="custom-file-input <?= session('errors.file_path') ? 'is-invalid' : '' ?>"
                                        id="file" name="file_path">
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
        </div>
    </div>
</div>

<!-- Script untuk memanggil ckeditor -->
<script src="<?= base_url(); ?>/assets/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('deskripsi');
</script>
<?= $this->endSection(); ?>