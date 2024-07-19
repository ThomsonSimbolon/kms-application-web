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
            <h5 class="card-title my-0 text-white">Edit Data Setting</h5>
            <a href="<?= base_url('mahasiswa/setting'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
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
            <form action="<?= site_url('mahasiswa/setting/update'); ?>" method="post">
                <input type="hidden" name="id_user" value="<?= $setting->id_user; ?>">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $setting->email; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        value="<?= $setting->password; ?>">
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <input type="text" class="form-control" id="level" name="level" value="<?= $setting->level; ?>"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="status">Level</label>
                    <input type="text" class="form-control" id="status" name="status" value="<?= $setting->status; ?>"
                        readonly>
                </div>

                <div class="form-group d-flex align-items-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>