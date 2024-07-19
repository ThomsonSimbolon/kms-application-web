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

    <div class="mb-3">
        <a href="<?= base_url('admin/materi/validasi'); ?>" class="btn btn-success bg-gradient-success btn-sm shadow"><i class="fas fa-list"></i> Validasi</a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title my-0 text-primary">Data Materi</h5>
                    <a href="<?= base_url('admin/materi/add'); ?>" class="btn btn-primary btn-sm">Tambah</a>

                </div>
                <!-- Notifikasi data berhasil ditambahkan -->
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert" id="success-alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>

                <!-- Notifikasi approve data diterima -->
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <!-- Notifikasi approve data ditolak -->
                <?php if (session()->getFlashdata('ditolak')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('ditolak') ?>
                    </div>
                <?php endif; ?>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover text-nowrap table-responsive-lg" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
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
                            foreach ($m as $m) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $m->nama_lengkap ?></td>
                                    <td><?= $m->mata_kuliah ?></td>
                                    <td><?= $m->judul_materi ?></td>
                                    <td><?= $m->program_studi ?></td>
                                    <td><?= date('d-m-Y H:i:s', strtotime($m->tgl_posting)) ?></td>
                                    <td>
                                        <?php if ($m->status == 'pending') : ?>
                                            <span class="badge badge-warning">pending</span>
                                        <?php elseif ($m->status == 'diterima') : ?>
                                            <span class="badge badge-success">diterima</span>
                                        <?php elseif ($m->status == 'ditolak') : ?>
                                            <span class="badge badge-danger">ditolak</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="mx-auto">
                                        <a href="<?= site_url('admin/materi/detail/' . $m->id_materi); ?>" class="btn btn-sm btn-info"><i class="fas fa-eye text-center"></i></a>
                                        <a href="<?= site_url('admin/materi/edit/' . $m->id_materi); ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit text-center"></i></a>
                                        <a href="<?= site_url('admin/materi/delete/' . $m->id_materi); ?>" class="btn btn-sm btn-danger" id="hapusBtn7"><i class="fas fa-trash text-center"></i></a>
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