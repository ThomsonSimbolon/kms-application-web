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
        <div class="card-header border border-1">
            <h5 class="card-title my-0 text-white">Data Dokumen</h5>
        </div>
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
                            <span class="badge badge-success"><?= $d->status ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="mx-auto">
                            <a href="<?= site_url('mahasiswa/document/detail/' . $d->id_dokumen) ?>"
                                class="btn btn-info btn-sm"><i class="fas fa-eye text-center"></i> Lihat</a>
                            <a href="<?= site_url('mahasiswa/document/download/' . $d->id_dokumen) ?>"
                                class="btn btn-warning btn-sm btn-aksi"><i class="fas fa-download text-center"></i>
                                Download</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>