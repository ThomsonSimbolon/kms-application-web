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
                    <h5 class="card-title my-0 text-primary">Log Aktivitas</h5>
                    <a href="<?= site_url('admin/dashboard'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover text-nowrap table-responsive-lg" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID User</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($LogAktivitas as $log) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $log['id_user'] ?></td>
                                    <td><?= $log['email'] ?></td>
                                    <td><?= $log['level'] ?></td>
                                    <td><?= $log['tanggal_masuk'] ?></td>
                                    <td><?= $log['tanggal_keluar'] ?></td>
                                    <td class="mx-auto">
                                        <a href="<?= site_url('admin/LogAktivitas/delete/' . $log['id_aktivitas']) ?>" class="btn btn-danger btn-sm" id="hapusBtn3"><i class="fas fa-trash text-center"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>