<?= $this->extend('template/templates_admin/index'); ?>


<?= $this->section('content-admin'); ?>
<div class="container-fluid">


    <div class="d-flex align-items-center justify-content-center">
        <div class="card shadow" style="width: 500px;">
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
                    <div class="card-header">
                        <h4 class="card-title my-0 text-primary">Edit Data Setting</h4>
                    </div>

                    <!-- Notifikasi berhasil ubah data setting -->
                    <?php if (session()->getFlashdata('msg')) : ?>
                    <div><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>

                    <!-- Notifikasi gagal ubah data setting -->
                    <?php if (session()->getFlashdata('error')) : ?>
                    <?= session()->getFlashdata('error') ?>
                    <?php endif; ?>

                    <div class="card-body">
                        <form action="<?= site_url('admin/setting/update'); ?>" method="post">
                            <input type="hidden" name="id_user" value="<?= $setting->id_user; ?>">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?= $setting->email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="<?= $setting->password; ?>">
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <input type="text" class="form-control" id="level" name="level"
                                    value="<?= $setting->level; ?>" readonly>
                            </div>
                            <a href="<?= site_url('admin/setting'); ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>