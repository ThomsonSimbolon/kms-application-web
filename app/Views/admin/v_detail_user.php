<?= $this->extend('template/templates_admin/index'); ?>


<?= $this->section('content-admin'); ?>
<div class="container-fluid">


    <div class="d-flex align-items-center justify-content-center">
        <div class="card shadow" style="width: 750px;">
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
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title my-0 text-primary">Detail Data Pengguna</h5>
                        <a href="<?= base_url('admin/user'); ?>" class="text-danger"><i
                                class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="card-body">
                        <?= csrf_field() ?>
                        <input type="hidden" id="id_user" name="id_user">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?= isset($user->email) ? $user->email : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <input type="text" class="form-control" id="level" name="level"
                                value="<?= isset($user->level) ? $user->level : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status"
                                value="<?= isset($user->status) ? $user->status : ''; ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>