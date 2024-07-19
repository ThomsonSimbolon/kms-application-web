<?= $this->extend('template/templates_admin/index'); ?>


<?= $this->section('content-admin'); ?>

<div class="container-fluid">
    <div class="row d-flex  justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="card-title my-0 text-primary">Edit Profile</h4>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('/admin/profile/update'); ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id_user" value="<?= $profile->id_user; ?>">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label for="id_user" class="form-label">ID User:</label>
                                    <input type="text" class="form-control" id="id_user" name="id_user"
                                        value="<?= $profile->id_user;?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?= old('email') ?? $profile->email; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="level" class="form-label">Level:</label>
                                    <select class="form-control" id="level" name="level">
                                        <option value="admin" <?= $profile->level == 'admin' ? 'selected' : ''; ?>>Admin
                                        </option>
                                        <option value="dosen" <?= $profile->level == 'dosen' ? 'selected' : ''; ?>>Dosen
                                        </option>
                                        <option value="pegawai" <?= $profile->level == 'pegawai' ? 'selected' : ''; ?>>
                                            Pegawai</option>
                                        <option value="mahasiswa"
                                            <?= $profile->level == 'mahasiswa' ? 'selected' : ''; ?>>
                                            Mahasiswa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <input type="text" class="form-control" id="status" name="status"
                                        value="<?= old('status') ?? $profile->status; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <a href="<?= site_url('/admin/profile'); ?>" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content-admin'); ?>