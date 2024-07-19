<?= $this->extend('template/templates_pegawai/index'); ?>


<?= $this->section('content-pgw'); ?>
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
    <div class="card shadow">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title my-0 text-white">Detail Data Pengguna</h5>
            <a href="<?= base_url('pegawai/user'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <div class="card-body">
            <?= csrf_field() ?>
            <input type="hidden" id="id_user" name="id_user">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email"
                    value="<?= isset($u->email) ? $u->email : ''; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <input type="text" class="form-control" id="level" name="level"
                    value="<?= isset($u->level) ? $u->level : ''; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" name="status"
                    value="<?= isset($u->status) ? $u->status : ''; ?>" readonly>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>