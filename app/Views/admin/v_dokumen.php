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
        <a href="<?= base_url('admin/document/validasi'); ?>" class="btn btn-success bg-gradient-success btn-sm shadow"><i class="fas fa-list"></i> Validasi</a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title my-0 text-primary">Data Dokumen</h5>
                    <a href="<?= site_url('admin/document/add/'); ?>" class="btn btn-primary btn-sm shadow-sm">Tambah</a>
                </div>
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
                                <th>No.</th>
                                <th>Nama Lengkap</th>
                                <th>Judul Dokumen</th>
                                <!-- <th>Deskripsi</th> -->
                                <th>File</th>
                                <th>Tanggal Upload</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($dokumen  as $d) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d->nama_lengkap; ?></td>
                                    <td><?= $d->judul_dokumen; ?></td>
                                    <!-- <td class="d-none"><?= $d->deskripsi; ?></td> -->
                                    <td><?= $d->file_path; ?></td>
                                    <td><?= date('d-m-Y H:i:s', strtotime($d->tgl_upload)) ?></td>
                                    <td>
                                        <?php if ($d->status == 'pending') : ?>
                                            <span class="badge badge-warning">pending</span>
                                        <?php elseif ($d->status == 'diterima') : ?>
                                            <span class="badge badge-success">diterima</span>
                                        <?php elseif ($d->status == 'ditolak') : ?>
                                            <span class="badge badge-danger">ditolak</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="mx-auto">
                                        <a href="<?= site_url('admin/document/detail/' . $d->id_dokumen) ?>" class="btn btn-info btn-sm"><i class="fas fa-eye text-center"></i></a>
                                        <a href="<?= site_url('admin/document/edit/' . $d->id_dokumen); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit text-center"></i></a>
                                        <a href="<?= site_url('admin/document/delete/' . $d->id_dokumen) ?>" class="btn btn-danger btn-sm" id="hapusBtn2"><i class="fas fa-trash text-center"></i></a>
                                        <a href="<?= site_url('admin/document/download/' . $d->id_dokumen) ?>" class="btn btn-warning btn-sm btn-aksi"><i class="fas fa-download text-center"></i></a>
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