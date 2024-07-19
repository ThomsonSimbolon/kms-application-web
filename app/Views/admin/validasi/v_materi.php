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
                    <h5 class="card-title my-0 text-primary">Validasi Materi</h5>
                    <a href="<?= base_url('admin/materi'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover text-nowrap table-responsive-lg" id="dataTable"
                        width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID User</th>
                                <th>Nama Lengkap</th>
                                <th>Mata Kuliah</th>
                                <th>Judul Materi</th>
                                <th>Program Studi</th>
                                <th>Tanggal Posting</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($materies  as $materi) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $materi->id_user ?></td>
                                <td><?= $materi->nama_lengkap ?></td>
                                <td><?= $materi->mata_kuliah ?></td>
                                <td><?= $materi->judul_materi ?></td>
                                <td><?= $materi->program_studi ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($materi->tgl_posting)) ?></td>
                                <td>
                                    <?php if ($materi->status == 'pending') : ?>
                                    <span class="badge badge-warning">pending</span>
                                    <?php elseif ($materi->status == 'diterima') : ?>
                                    <span class="badge badge-success">diterima</span>
                                    <?php elseif ($materi->status == 'ditolak') : ?>
                                    <span class="badge badge-danger">ditolak</span>
                                    <?php endif; ?>
                                </td>
                                <td class="mx-auto">
                                    <?php if ($materi->status != 'diterima') : ?>
                                    <a href="<?= base_url('admin/materi/approve/' . $materi->id_materi); ?>"
                                        <?php endif; ?> class="btn btn-sm btn-success">Terima</a>
                                    <?php if ($materi->status != 'ditolak') : ?>
                                    <a href="<?= base_url('admin/materi/reject/' . $materi->id_materi); ?>"
                                        class="btn btn-sm btn-danger">Tolak</a>
                                    <?php endif; ?>
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