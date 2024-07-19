<?= $this->extend('template/templates_dosen/index'); ?>


<?= $this->section('content-dsn'); ?>
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
    <a href="<?= base_url('dosen/pengetahuan/data-pribadi'); ?>"
        class="btn btn-primary bg-gradient-primary btn-sm shadow"><i class="fas fa-id-badge"></i> Data Pribadi</a>
</div>

<div class="container-fluid px-0 mx-0 content-2 rounded">
    <div class="card shadow px-0">
        <div class="card-header border border-1 d-flex align-items-center justify-content-between">
            <h5 class="card-title my-0 text-white">Data Pengetahuan</h5>
            <a href="<?= base_url('dosen/pengetahuan/add'); ?>" class="btn btn-primary btn-sm">Tambah</a>
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
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama Lengkap</th>
                        <th>Judul Pengetahuan</th>
                        <th>Jenis Pengetahuan</th>
                        <th>Tanggal Posting</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($p as $p) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $p->id_user ?></td>
                        <td><?= $p->nama_lengkap ?></td>
                        <td><?= $p->judul_pengetahuan ?></td>
                        <td><?= $p->jenis_pengetahuan ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($p->tgl_posting)) ?></td>
                        <td>
                            <?php if ($p->status == 'pending') : ?>
                            <span class="badge badge-warning">pending</span>
                            <?php elseif ($p->status == 'diterima') : ?>
                            <span class="badge badge-success">diterima</span>
                            <?php elseif ($p->status == 'ditolak') : ?>
                            <span class="badge badge-danger">ditolak</span>
                            <?php endif; ?>
                        </td>
                        <td class="mx-auto">
                            <a href="<?= site_url('dosen/pengetahuan/detail/' . $p->id_pengetahuan); ?>"
                                class="btn btn-sm btn-info"><i class="fas fa-eye text-center"></i> Lihat</a>
                            <a href="<?= site_url('dosen/pengetahuan/download/' . $p->id_pengetahuan) ?>"
                                class="btn btn-warning btn-sm btn-aksi"><i class="fas fa-download text-center"></i>
                                Download</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>