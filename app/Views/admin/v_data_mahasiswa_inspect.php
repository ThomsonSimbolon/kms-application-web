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

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title my-0 text-primary">Data Mahasiswa</h5>
                    <a href="<?= base_url('admin/mahasiswa'); ?>" class="text-danger"><i
                            class="fa-solid fa-xmark"></i></a>
                </div>
                <div class="card-body">
                    <?php csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="id_user">ID User</label>
                                <input type="text" class="form-control" id="id_user" name="id_user"
                                    value="<?= old('id_user', $mahasiswa['id_user']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                    value="<?= old('nama_lengkap', $mahasiswa['nama_lengkap']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim"
                                    value="<?= old('nim', $mahasiswa['nim']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="program_studi">Program Studi</label>
                                <input type="text" class="form-control" id="program_studi" name="program_studi"
                                    value="<?= old('program_studi', $mahasiswa['program_studi']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tahun_angkatan">Angkatan</label>
                                <input type="text" class="form-control" id="tahun_angkatan" name="tahun_angkatan"
                                    value="<?= old('tahun_angkatan', $mahasiswa['tahun_angkatan']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                    value="<?= old('jenis_kelamin', $mahasiswa['jenis_kelamin']); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                    value="<?= old('tempat_lahir', $mahasiswa['tempat_lahir']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                    value="<?= old('tgl_lahir', $mahasiswa['tgl_lahir']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                    value="<?= old('no_hp', $mahasiswa['no_hp']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="<?= old('alamat', $mahasiswa['alamat']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="upload_foto">Foto</label>
                                    </div>
                                    <div class="col-lg-12">
                                        <img src="<?= base_url('uploads/' . $mahasiswa['upload_foto']) ?>"
                                            class="img-fluid rounded shadow" width="125px" height="125px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>