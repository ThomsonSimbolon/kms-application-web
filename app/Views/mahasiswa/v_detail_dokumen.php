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
            <h4 class="card-title my-0 text-primary">Detail Data Dokumen</h4>
            <a href="<?= base_url('mahasiswa/document'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="id_dokumen">Id Dokumen:</label>
                <input type="text" class="form-control" id="id_dokumen" name="id_dokumen"
                    value="<?= $dokumen->id_dokumen ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Dokumen:</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                    value="<?= $dokumen->nama_lengkap ?>" readonly>
            </div>
            <div class="form-group">
                <label for="judul_dokumen">Judul Dokumen:</label>
                <input type="text" class="form-control" id="judul_dokumen" name="judul_dokumen"
                    value="<?= $dokumen->judul_dokumen ?>" readonly>
            </div>
            <div class="form-group">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" readonly name="deskripsi"
                    rows="3"><?= $dokumen->deskripsi; ?></textarea>
            </div>
            <div class="form-group">
                <label for="file_path">File:</label>
                <input type="text" class="form-control" id="file_path" name="file_path"
                    value="<?= $dokumen->file_path ?>" readonly>
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
                <input type="text" class="form-control" id="tgl_upload" name="tgl_upload"
                    value="<?= $dokumen->tgl_upload ?>" readonly>
            </div>
            <div class="form-group">
                <label for="keterangan">Status:</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan"
                    value="<?= $dokumen->status ?>" readonly>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>