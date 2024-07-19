<?= $this->extend('template/templates_dosen/index'); ?>


<?= $this->section('content-dsn'); ?>

<div class="container-fluid px-0 mx-0 content-2 rounded">
    <div class="card shadow px-0">
        <div class="card-header border border-1">
            <h5 class="card-title my-0 text-white">Data Profile</h5>
        </div>
        <?php if (session()->getFlashdata('msg')) : ?>
            <div><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <div class="card-body">
            <?php if ($profile) { ?>
                <div class="d-flex align-items-center justify-content-center">
                    <div class="d-inline-block">
                        <div class="container">
                            <div class="text-center">
                                <img src="<?= base_url('uploads/' . $profile['upload_foto']); ?>" class="img-fluid rounded-circle shadow w-75 p-2 img-profile-all" alt="Logo Profile">
                                <h4 class="card-title mt-2 text-center"><?= $profile['nama_lengkap']; ?> -
                                    <?= $profile['id_user']; ?>
                                </h4>
                                <a href="<?= site_url('/dosen/profile/edit'); ?>" class="btn btn-primary btn-sm">Edit
                                    Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="nim">NIDN/NIP:</label>
                            <input type="text" class="form-control" id="nidn" name="nidn" value="<?= $profile['nidn']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap:</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $profile['nama_lengkap']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $profile['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="text" class="form-control" id="status" name="status" value="<?= $profile['status']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan:</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $profile['jabatan']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama:</label>
                            <input type="text" class="form-control" id="agama" name="agama" value="<?= $profile['agama']; ?>" readonly>
                        </div>
                    </div>
                    <div class=" col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $profile['jenis_kelamin']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir:</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $profile['tempat_lahir']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir:</label>
                            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $profile['tgl_lahir']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No Hp:</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $profile['no_hp']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $profile['alamat']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="upload_foto">Upload Foto:</label>
                            <input type="text" class="form-control" id="upload_foto" name="upload_foto" value="<?= $profile['upload_foto']; ?>" readonly>
                        </div>
                    </div>
                </div>
            <?php }; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>