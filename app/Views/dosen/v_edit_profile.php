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
            <h5 class="card-title my-0 text-white">Edit Profile</h5>
            <a href="<?= site_url('/dosen/profile'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <?php if (session()->getFlashdata('msg')) : ?>
        <div><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <div class="card-body">
            <?php if ($profile) { ?>
            <form action="<?= site_url('/dosen/profile/update'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_dosen" id="id_dosen" value="<?= $profile['id_dosen']; ?>">
                <input type="hidden" name="id_user" id="id_user" value="<?= $profile['id_user']; ?>">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="id_user" class="form-label">ID User:</label>
                            <input type="text" class="form-control" id="id_user" name="id_user"
                                value="<?= $profile['id_user']; ?> - <?= $profile['nama_lengkap']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nidn">NIDN/NIP:</label>
                            <input type="text" class="form-control" id="nidn" name="nidn"
                                value="<?= $profile['nidn']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap:</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                value="<?= $profile['nama_lengkap']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?= $profile['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="text" class="form-control" id="status" name="status"
                                value="<?= $profile['status']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan:</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                value="<?= $profile['jabatan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama:</label>
                            <input type="text" class="form-control" id="agama" name="agama"
                                value="<?= $profile['agama']; ?>">
                        </div>
                    </div>
                    <div class=" col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="jenis_kelamin" class="form-label">Jenis
                                Kelamin:</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                value="<?= $profile['jenis_kelamin']; ?>">
                                <option selected disabled>-- Jenis Kelamin ---</option>
                                <option value="laki-laki"
                                    <?= $profile['jenis_kelamin'] == 'laki-laki' ? 'selected' : ''; ?>>
                                    Laki-laki</option>
                                <option value="perempuan"
                                    <?= $profile['jenis_kelamin'] == 'perempuan' ? 'selected' : ''; ?>>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir:</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="<?= $profile['tempat_lahir']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir:</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                value="<?= $profile['tgl_lahir']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Hp:</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp"
                                value="<?= $profile['no_hp']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="<?= $profile['alamat']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="upload_foto">Upload Foto:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="upload_foto" name="upload_foto"
                                    value="<?= $profile['upload_foto']; ?>">
                                <label class="custom-file-label"
                                    for="upload_foto"><?= $profile['upload_foto']; ?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="card shadow" style="width: 5rem;">
                                <img src="<?= base_url('uploads/' . $profile['upload_foto']); ?>" class="card-img"
                                    alt="Foto Profil">
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= site_url('/dosen/profile'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <?php }; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>