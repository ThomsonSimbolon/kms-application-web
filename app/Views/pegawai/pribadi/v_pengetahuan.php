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
    <div class="card shadow px-0">
        <div class="card-header border border-1 d-flex align-items-center justify-content-between">
            <h5 class="card-title my-0 text-white">Data Pribadi</h5>
            <a href="<?= base_url('pegawai/pengetahuan'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
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
                        <th>ID User</th>
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
                    foreach ($pengetahuans as $pengetahuan) : ?>
                    <?php if ($pengetahuan->status === 'diterima') : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pengetahuan->id_user; ?></td>
                        <td><?= $pengetahuan->nama_lengkap ?></td>
                        <td><?= $pengetahuan->judul_pengetahuan ?></td>
                        <td><?= $pengetahuan->jenis_pengetahuan ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($pengetahuan->tgl_posting)) ?></td>
                        <td>
                            <?php if ($pengetahuan->status == 'diterima') : ?>
                            <span class="badge badge-success">diterima</span>
                            <?php elseif ($pengetahuan->status == 'ditolak') : ?>
                            <span class="badge badge-danger">ditolak</span>
                            <?php else : ?>
                            <span class="badge badge-warning">pending</span>
                            <?php endif; ?>
                        </td>
                        <td class="mx-auto">
                            <a href="<?= site_url('pegawai/pengetahuan/detail/' . $pengetahuan->id_pengetahuan); ?>"
                                class="btn btn-sm btn-info"><i class="fas fa-eye text-center"></i> Lihat</a>
                            <a href="<?= site_url('pegawai/pengetahuan/edit/' . $pengetahuan->id_pengetahuan); ?>"
                                class="btn btn-sm btn-warning"><i class="fas fa-edit text-center"></i> Edit</a>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>