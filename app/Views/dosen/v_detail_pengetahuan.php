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
            <h5 class="card-title my-0 text-white">Detail Data Pengetahuan</h5>
            <a href="<?= base_url('dosen/pengetahuan'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <div class="card-body">
            <?= csrf_field() ?>
            <input type="hidden" id="id_pengetahuan" name="id_pengetahuan">
            <div class="form-group">
                <label for="judul_pengetahuan">Judul Pengetahuan</label>
                <input type="text" class="form-control" id="judul_pengetahuan" name="judul_pengetahuan"
                    value="<?= old('judul_pengetahuan', $pengetahuan->judul_pengetahuan); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="jenis_pengetahuan">Jenis Pengetahuan</label>
                <input type="text" class="form-control" id="jenis_pengetahuan" name="jenis_pengetahuan"
                    value="<?= old('jenis_pengetahuan', $pengetahuan->jenis_pengetahuan); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="deskripsi_pengetahuan">Deskripsi</label>
                <textarea class="form-control" id="deskripsi_pengetahuan" name="deskripsi_pengetahuan" cols="30"
                    rows="10"
                    readonly><?= old('deskripsi_pengetahuan', $pengetahuan->deskripsi_pengetahuan); ?></textarea>
            </div>
            <div class="form-group">
                <label for="file_path">File:</label>
                <input type="text" class="form-control" id="file_path" name="file_path"
                    value="<?= $pengetahuan->file_path ?>" readonly>
                <?php
                if (empty($pengetahuan->file_path)) {
                    echo '<p class="text-danger mt-2">File tidak ditemukan</p>';
                } else {
                    $fileExtension = pathinfo($pengetahuan->file_path, PATHINFO_EXTENSION);
                    if ($fileExtension == 'pdf') {
                        echo '<a href="' . base_url('uploads/' . $pengetahuan->file_path) . '" class="btn btn-sm btn-info mt-2" target="_blank">Lihat Dokumen PDF</a>';
                    } elseif ($fileExtension == 'docx' || $fileExtension == 'doc') {
                        echo '<a href="' . base_url('uploads/' . $pengetahuan->file_path) . '" class="btn btn-sm btn-info mt-2" target="_blank">Lihat Dokumen Word</a>';
                    } else {
                        echo '<img src="' . base_url('uploads/' . $pengetahuan->file_path) . '" class="img-fluid" alt="Gambar Dokumen">';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>