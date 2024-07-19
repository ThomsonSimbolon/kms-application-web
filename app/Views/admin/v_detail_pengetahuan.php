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
                    <h5 class="card-title my-0 text-primary">Detail Data Pengetahuan</h5>
                    <a href="<?= base_url('admin/pengetahuan'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
                </div>
                <div class="card-body">
                    <?= csrf_field() ?>
                    <input type="hidden" id="id_pengetahuan" name="id_pengetahuan">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control <?= session('errors.nama_lengkap') ? 'is-invalid' : null ?>" id="nama_lengkap" name="nama_lengkap" value="<?= $pengetahuan->nama_lengkap; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="judul_pengetahuan">Judul Pengetahuan</label>
                        <input type="text" class="form-control" id="judul_pengetahuan" name="judul_pengetahuan" value="<?= $pengetahuan->judul_pengetahuan; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jenis_pengetahuan">Jenis Pengetahuan</label>
                        <input type="text" class="form-control" id="jenis_pengetahuan" name="jenis_pengetahuan" value="<?= $pengetahuan->jenis_pengetahuan; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_pengetahuan">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi_pengetahuan" cols="30" rows="10" readonly><?= $pengetahuan->deskripsi_pengetahuan; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file_path">File:</label>
                        <input type="text" class="form-control" id="file_path" name="file_path" value="<?= $pengetahuan->file_path ?>" readonly>
                        <?php
                        $fileExtension = pathinfo($pengetahuan->file_path, PATHINFO_EXTENSION);
                        if ($fileExtension == 'pdf') {
                            echo '<a href="' . base_url('uploads/' . $pengetahuan->file_path) . '" class="btn btn-sm btn-info mt-2" target="_blank">Lihat Dokumen PDF</a>';
                        } elseif ($fileExtension == 'docx' || $fileExtension == 'doc') {
                            echo '<a href="' . base_url('uploads/' . $pengetahuan->file_path) . '" class="btn btn-sm btn-info mt-2" target="_blank">Lihat Dokumen Word</a>';
                        } else {
                            echo '
                            <div class="mt-2 d-flex align-items-center justify-content-center">
                            <img src="' . base_url('uploads/' . $pengetahuan->file_path) . '" class="img-fluid rounded" alt="Gambar Dokumen">
                            </div>
                            ';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="tgl_posting">Tanggal Posting:</label>
                        <input type="text" class="form-control" id="tgl_posting" name="tgl_posting" value="<?= $pengetahuan->tgl_posting ?>" readonly>
                    </div>
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