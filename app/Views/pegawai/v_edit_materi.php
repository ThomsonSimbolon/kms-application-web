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
            <h5 class="card-title my-0 text-white">Edit Data Materi</h5>
            <a href="<?= base_url('pegawai/materi'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <?php $validation = \Config\Services::validation(); ?>
        <div class="card-body">
            <form action="<?= site_url('pegawai/materi/update/' . $materi->id_materi) ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                <?= csrf_field() ?>
                <input type="hidden" name="id_materi" value="<?= $materi->id_materi; ?>">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control <?= session('errors.nama_lengkap') ? 'is-invalid' : null ?>" id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap', $materi->nama_lengkap) ?>" placeholder="Masukkan nama lengkap" autofocus>
                    <?php if (session('errors.nama_lengkap')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.nama_lengkap') ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="mata_kuliah">Mata Kuliah</label>
                    <input type="text" class="form-control <?= session('errors.mata_kuliah') ? 'is-invalid' : null ?>" id="mata_kuliah" name="mata_kuliah" value="<?= old('mata_kuliah', $materi->mata_kuliah) ?>" placeholder="Masukkan mata kuliah" autofocus>
                    <?php if (session('errors.mata_kuliah')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.mata_kuliah') ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="judul_materi">Judul Materi</label>
                    <input type="text" class="form-control <?= session('errors.judul_materi') ? 'is-invalid' : null ?>" id="judul_materi" name="judul_materi" value="<?= old('judul_materi', $materi->judul_materi) ?>" placeholder="Masukkan judul materi">
                    <?php if (session('errors.judul_materi')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.judul_materi') ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="program_studi">Program Studi</label>
                    <select class="form-control <?= session('errors.program_studi') ? 'is-invalid' : null ?>" aria-label="Default select example" id="program_studi" name="program_studi" value="<?= old('program_studi', $materi->program_studi); ?>">
                        <option selected disabled>-- Program Studi --</option>
                        <option value="Teknik Informatika" <?= $materi->program_studi == 'Teknik Informatika' ? 'selected' : ''; ?>>
                            Teknik
                            Informatika</option>
                        <option value="Sistem Informasi" <?= $materi->program_studi == 'Sistem Informasi' ? 'selected' : ''; ?>>
                            Sistem
                            Informasi</option>
                        <option value="Sistem Digital" <?= $materi->program_studi == 'Sistem Digital' ? 'selected' : ''; ?>>Sistem
                            Digital</option>
                    </select>
                    <?php if (session('errors.program_studi')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.program_studi') ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="file_path">File</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file_path" value="<?= $materi->file_path; ?>">
                        <label class="custom-file-label" for="file"><?= $materi->file_path; ?></label>
                        <?php if ($materi->file_path) : ?>
                            <div class="mt-2">
                                File saat ini: <?= $materi->file_path ?>
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