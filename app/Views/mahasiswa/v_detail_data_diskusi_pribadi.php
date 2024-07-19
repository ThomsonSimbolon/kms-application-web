<?= $this->extend('template/templates_mahasiswa/index'); ?>


<?= $this->section('content-mhs'); ?>
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
            <h5 class="card-title my-0 text-white">Detail Data Pribadi</h5>
            <a href="<?= base_url('mahasiswa/discussion/pribadi'); ?>" class="text-danger"><i
                    class="fa-solid fa-xmark"></i></a>
        </div>
        <div class="card-body">
            <?= csrf_field(); ?>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                    value="<?= old('nama_lengkap', $diskusi->nama_lengkap); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="judul_forum">Judul Diskusi</label>
                <input type="text" class="form-control" id="judul_forum" name="judul_forum"
                    value="<?= old('judul_forum', $diskusi->judul_forum); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                    readonly><?= old('deskripsi', $diskusi->deskripsi); ?></textarea>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>