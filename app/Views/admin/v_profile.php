<?= $this->extend('template/templates_admin/index'); ?>


<?= $this->section('content-admin'); ?>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-center">
        <div class="card shadow border-top-warning" style="width: 800px;">
            <div class="card-body">
                <div class="card border-bottom-primary">
                    <div class="card-header">
                        <h5 class="card-title my-0 text-primary">Data Profile</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <?php if ($profile) { ?>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="d-inline-block">
                                    <div class="container">
                                        <div class="text-center">
                                            <img src="<?= base_url('/assets/custom-css/img/admin_icon.png'); ?>" class="img-fluid rounded-circle  shadow" alt="Logo Profile" style="width: 250px;">
                                            <h4 class="card-title mt-2 text-center"><?= $profile->id_user; ?> -
                                                <?= $level; ?>
                                            </h4>
                                            <a href="<?= site_url('/admin/profile/edit'); ?>" class="btn btn-primary btn-sm">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $profile->email; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level:</label>
                                        <input type="text" class="form-control" id="level" name="level" value="<?= $profile->level; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <input type="text" class="form-control" id="status" name="status" value="<?= $profile->status; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content-admin'); ?>