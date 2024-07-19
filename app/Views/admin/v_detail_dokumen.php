<?= $this->extend('template/templates_admin/index'); ?>


<?= $this->section('content-admin'); ?>
<div class="container-fluid">
    <!-- Halaman untuk menampilkan / show data berdasarkan Id -->
    <div class="d-flex align-items-center justify-content-center">
        <div class="card shadow" style="width: 800px;">
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
                        <h4 class="card-title my-0 text-primary">Detail Data Dokumen</h4>
                        <a href="<?= base_url('admin/document'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_dokumen">Id Dokumen:</label>
                            <input type="text" class="form-control" id="id_dokumen" name="id_dokumen" value="<?= $dokumen->id_dokumen ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Dokumen:</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $dokumen->nama_lengkap ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="judul_dokumen">Judul Dokumen:</label>
                            <input type="text" class="form-control" id="judul_dokumen" name="judul_dokumen" value="<?= $dokumen->judul_dokumen ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="form-label">Deskripsi:</label>
                            <textarea class="form-control" id="deskripsi" readonly name="deskripsi"><?= $dokumen->deskripsi; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file_path">File:</label>
                            <input type="text" class="form-control" id="file_path" name="file_path" value="<?= $dokumen->file_path ?>" readonly>
                            <?php
                            $fileExtension = pathinfo($dokumen->file_path, PATHINFO_EXTENSION);
                            if ($fileExtension == 'pdf') {
                                echo '<a href="' . base_url('uploads/' . $dokumen->file_path) . '" class="btn btn-sm btn-info mt-2" target="_blank">Lihat Dokumen PDF</a>';
                            } elseif ($fileExtension == 'docx' || $fileExtension == 'doc') {
                                echo '<a href="' . base_url('uploads/' . $dokumen->file_path) . '" class="btn btn-sm btn-info mt-2" target="_blank">Lihat Dokumen Word</a>';
                            } else {
                                echo '<img src="' . base_url('uploads/' . $dokumen->file_path) . '" class="img-fluid" alt="Gambar Dokumen">';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="tgl_upload">Tanggal Posting:</label>
                            <input type="text" class="form-control" id="tgl_upload" name="tgl_upload" value="<?= $dokumen->tgl_upload ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Status:</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $dokumen->status ?>" readonly>
                        </div>
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