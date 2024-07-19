<?= $this->extend('template/templates_admin/index'); ?>


<?= $this->section('content-admin'); ?>
<div class="container-fluid">
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
                        <h5 class="card-title my-0 text-primary">Detail Data Materi</h5>
                        <a href="<?= base_url('admin/materi'); ?>" class="text-danger"><i
                                class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="card-body">
                        <?= csrf_field() ?>
                        <input type="hidden" id="id_pengetahuan" name="id_pengetahuan">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                value="<?= $materi->nama_lengkap; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="mata_kuliah">Mata Kuliah</label>
                            <input type="text" class="form-control" id="mata_kuliah" name="mata_kuliah"
                                value="<?= $materi->mata_kuliah; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="judul_materi">Judul Materi</label>
                            <input type="text" class="form-control" id="judul_materi" name="judul_materi"
                                value="<?= $materi->judul_materi; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="program_studi">Program Studi</label>
                            <input type="text" class="form-control" id="program_studi" name="program_studi"
                                value="<?= $materi->program_studi; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="file_path">File:</label>
                            <input type="text" class="form-control" id="file_path" name="file_path"
                                value="<?= $materi->file_path ?>" readonly>
                            <?php
                            $fileExtension = pathinfo($materi->file_path, PATHINFO_EXTENSION);
                            if ($fileExtension == 'pdf') {
                                echo '<a href="' . base_url('uploads/' . $materi->file_path) . '" class="btn btn-sm btn-info mt-2" target="_blank">Lihat Dokumen PDF</a>';
                            } elseif ($fileExtension == 'docx' || $fileExtension == 'doc') {
                                echo '<a href="' . base_url('uploads/' . $materi->file_path) . '" class="btn btn-sm btn-info mt-2" target="_blank">Lihat Dokumen Word</a>';
                            } else {
                                echo '
                                <div class="mt-2 d-flex align-items-center justify-content-center">
                                <img src="' . base_url('uploads/' . $materi->file_path) . '" class="img-fluid rounded" alt="Gambar Dokumen">
                                </div>
                                ';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="tgl_posting">Tanggal Posting:</label>
                            <input type="text" class="form-control" id="tgl_posting" name="tgl_posting"
                                value="<?= $materi->tgl_posting ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>