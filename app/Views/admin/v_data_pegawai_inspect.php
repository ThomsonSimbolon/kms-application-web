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
                    <h5 class="card-title my-0 text-primary">Data Pegawai</h5>
                    <a href="<?= base_url('admin/pegawai'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
                </div>
                <div class="card-body">
                    <?php csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="id_user">ID User</label>
                                <input type="text" class="form-control" id="id_user" name="id_user" value="<?= old('id_user', $pegawai['id_user']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap', $pegawai['nama_lengkap']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nidn">NIDN</label>
                                <input type="text" class="form-control" id="nidn" name="nidn" value="<?= old('nidn', $pegawai['nidn']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= old('jabatan', $pegawai['jabatan']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input type="text" class="form-control" id="agama" name="agama" value="<?= old('agama', $pegawai['agama']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= old('jenis_kelamin', $pegawai['jenis_kelamin']); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir', $pegawai['tempat_lahir']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir', $pegawai['tgl_lahir']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= old('no_hp', $pegawai['no_hp']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat', $pegawai['alamat']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="upload_foto">Foto</label>
                                    </div>
                                    <div class="col-lg-12">
                                        <img src="<?= base_url('uploads/' . $pegawai['upload_foto']) ?>" class="img-fluid rounded shadow" width="125px" height="125px">
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