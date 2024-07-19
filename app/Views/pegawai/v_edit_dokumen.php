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
            <h5 class="card-title my-0 text-white">Edit Data Dokumen</h5>
            <a href="<?= base_url('pegawai/document'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
        </div>

        <?php $validation = \Config\Services::validation(); ?>
        <div class="card-body">
            <form action="<?= site_url('pegawai/document/update/' . $dokumen->id_dokumen) ?>" method="post"
                enctype="multipart/form-data" autocomplete="off">
                <?= csrf_field() ?>
                <input type="hidden" name="id_dokumen" value="<?= $dokumen->id_dokumen; ?>">
                <div class="form-group">
                    <label for=" nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control <?= session('errors.nama_lengkap') ? 'is-invalid' : null ?>"
                        id="nama_lengkap" name="nama_lengkap"
                        value="<?= old('nama_lengkap', $dokumen->nama_lengkap); ?>">

                    <?php if (session('errors.nama_lengkap')) : ?>
                    <div class="invalid-feedback">
                        <?= session('errors.nama_lengkap') ?>
                    </div>
                    <?php endif ?>

                </div>
                <div class="form-group">
                    <label for="judul_dokumen">Judul Dokumen</label>
                    <input type="text" class="form-control <?= session('errors.judul_dokumen') ? 'is-invalid' : null ?>"
                        id="judul_dokumen" name="judul_dokumen"
                        value="<?= old('judul_dokumen', $dokumen->judul_dokumen); ?>">

                    <?php if (session('errors.judul_dokumen')) : ?>
                    <div class="invalid-feedback">
                        <?= session('errors.judul_dokumen') ?>
                    </div>
                    <?php endif ?>

                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control <?= session('errors.deskripsi') ? 'is-invalid' : null ?>"
                        id="deskripsi" name="deskripsi"><?= old('deskripsi', $dokumen->deskripsi); ?></textarea>

                    <?php if (session('errors.deskripsi')) : ?>
                    <div class="invalid-feedback">
                        <?= session('errors.deskripsi') ?>
                    </div>
                    <?php endif ?>

                </div>
                <div class="form-group">
                    <label for="file_path">File</label>
                    <div class="custom-file">
                        <input type="file"
                            class="custom-file-input <?= session('errors.file_path') ? 'is-invalid' : null ?>" id="file"
                            name="file_path">
                        <label class="custom-file-label" for="file"></label>
                        <?php if (session('errors.file_path')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.file_path') ?>
                        </div>
                        <?php endif ?>
                        <?php if ($dokumen->file_path) : ?>
                        <div class="mt-2">
                            File saat ini: <?= $dokumen->file_path ?>
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