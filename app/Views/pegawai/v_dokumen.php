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

<div class="mb-3">
    <a href="<?= base_url('pegawai/document/data-pribadi'); ?>"
        class="btn btn-primary bg-gradient-primary btn-sm shadow"><i class="fas fa-id-badge"></i> Data Pribadi</a>
</div>

<div class="container-fluid px-0 mx-0 content-2 rounded">
    <div class="card shadow px-0">
        <div class="card-header border border-1 d-flex align-items-center justify-content-between">
            <h5 class="card-title my-0 text-white">Data Dokumen</h5>
            <a href="<?= site_url('pegawai/document/add/'); ?>" class="btn btn-primary btn-sm shadow-sm">Tambah</a>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert" id="success-alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
        <?php endif; ?>
        <div class="card-body table-responsive-lg">
            <table class="table table-striped table-hover text-nowrap table-responsive" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID User</th>
                        <th>Nama Lengkap</th>
                        <th>Judul Dokumen</th>
                        <th>File</th>
                        <th>Tanggal Upload</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($dokumen as $d) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->id_user; ?></td>
                        <td><?= $d->nama_lengkap; ?></td>
                        <td><?= $d->judul_dokumen; ?></td>
                        <td><?= $d->file_path; ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($d->tgl_upload)); ?></td>
                        <td>
                            <?php if ($d->status == 'diterima') : ?>
                            <span class="badge badge-success">diterima</span>
                            <?php endif; ?>
                        </td>
                        <td class="mx-auto">
                            <a href="<?= site_url('pegawai/document/detail/' . $d->id_dokumen) ?>"
                                class="btn btn-info btn-sm"><i class="fas fa-eye text-center"></i> Lihat</a>
                            <a href="<?= site_url('pegawai/document/download/' . $d->id_dokumen) ?>"
                                class="btn btn-warning btn-sm btn-aksi"><i class="fas fa-download text-center"></i>
                                Download</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>