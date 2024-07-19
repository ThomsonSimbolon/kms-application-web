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
    <div class="card shadow px-0fa">
        <div class="card-header border border-1 d-flex align-items-center justify-content-between">
            <h4 class="card-title my-0 text-white">Detail Data Diskusi</h4>
            <a href="<?= base_url('mahasiswa/discussion'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
        </div>

        <!-- Notifikasi berhasil tambah pengetahuan -->
        <?php if (session('success')) : ?>
        <div class="alert alert-success" role="alert" id="success-alert">
            <?= session('success'); ?>
        </div>
        <?php endif; ?>

        <!-- Notifikasi berhasil hapus pengetahuan -->
        <?php if (session('hapus')) : ?>
        <div class="alert alert-danger" role="alert" id="danger-alert">
            <?= session('hapus'); ?>
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
            <!-- Ini adalah halaman konten forum diskusi -->
            <div class="card shadow-sm">
                <div class="card-header my-0">
                    <p class="card-text text-white"><small class="text-muted"
                            style="color: #fff !important; font-size: 10px;">
                            Status: <?= $diskusi->status; ?>
                        </small></p>
                </div>
                <div class="card-body">
                    <h1 class="card-title" style="font-size: 25px;">
                        <?= old('judul_forum', $diskusi->judul_forum); ?>
                    </h1>
                    <p class="card-text text-justify" style="font-size: 16px;">
                        <?= old('deskripsi', $diskusi->deskripsi); ?></p>
                    <p class="card-text"><small class="text-muted" style="font-size: 14px;">
                            Nama: <?= old('nama_lengkap', $diskusi->nama_lengkap); ?> -
                            <?= old('id_user', $diskusi->id_user); ?>
                        </small></p>
                    <p class="card-text"><small class="text-muted" style="font-size: 14px;">
                            Post: (<?= date('d-m-Y H:i:s', strtotime($diskusi->tgl_posting)) ?>)
                        </small></p>
                </div>
                <div class="card-footer mt-0 mb-0 pb-0 bg-transparent">
                    <!-- Ini adalah halaman konten komentar -->
                    <form action="<?= site_url('mahasiswa/discussion/detail/komentar'); ?>" method="post" class="my-1"
                        autocomplete="off">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_forum" value="<?= $diskusi->id_forum; ?>">
                        <!-- Hidden field to pass id_forum -->
                        <input type="hidden" name="id_user" value="<?= session()->get('users_id'); ?>">
                        <!-- Hidden field to pass id_user -->
                        <div class="row mb-3 d-flex align-items-center justify-content-between">
                            <div class="col-md-2 col-lg-1">
                                <label for="komentar" class="form-label text-center">Komentar</label>
                            </div>
                            <div class="col-md-10 col-lg-11">
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control shadow-none border-1 border-primary <?= session('errors.komentar') ? 'is-invalid' : null ?>"
                                        id="komentar" name="komentar" value="<?= old('komentar'); ?>"
                                        placeholder="Masukkan komentar">
                                    <div class="input-group-append">
                                        <button type="submit"
                                            class="btn btn-outline-primary shadow-none bg-transparent border-1 d-block"
                                            id="button-addon2">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- End halaman konten komentar -->
                </div>
            </div>
            <!-- End halaman konten forum diskusi -->

            <!-- Menampilkan komentar -->
            <div class="card shadow-sm mt-4">
                <div class="card-header">
                    <h5 class="card-title my-0 text-white">Komentar</h5>
                </div>
                <div class="card-body">
                    <?php if (!empty($komentar)) : ?>
                    <?php foreach ($komentar as $comment) : ?>
                    <div class="mb-2">
                        <p><strong><?= esc($comment->nama_lengkap); ?></strong> <small
                                class="text-muted">(<?= date('d-m-Y H:i:s', strtotime($comment->tgl_komentar)); ?>)</small>
                        </p>
                        <p><?= esc($comment->komentar); ?></p>
                    </div>
                    <hr>

                    <!-- Modal -->
                    <?php foreach ($komentar as $comment) : ?>
                    <div class="modal fade" id="editKomentar<?= $comment->id_komentar ?>" data-backdrop="static"
                        data-keyboard="false" tabindex="-1" aria-labelledby="editKomentarLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-white my-0" id="editKomentarLabel">Edit
                                        Komentar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form
                                        action="<?= site_url('mahasiswa/discussion/detail/komentar/update/' . $comment->id_komentar); ?>"
                                        method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="id_komentar" id="id_komentar"
                                            value="<?= $comment->id_komentar; ?>">
                                        <input type="hidden" name="id_forum" value="<?= $diskusi->id_forum; ?>">
                                        <div class="form-group">
                                            <label for="id_forum">ID Diskusi</label>
                                            <input type="text" name="id_forum" id="id_forum" class="form-control"
                                                value="<?= old('id_forum', $comment->id_forum); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="komentar">Komentar</label>
                                            <textarea name="komentar" id="komentar" class="form-control"
                                                required><?= old('komentar', $comment->komentar); ?></textarea>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endforeach; ?>
                    <?php else : ?>
                    <p class="text-muted">Belum ada komentar.</p>
                    <?php endif; ?>
                </div>
            </div>
            <!-- End menampilkan komentar -->
        </div>
    </div>
</div>

<?= $this->endSection(); ?>