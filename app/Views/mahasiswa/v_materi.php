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
            <h5 class="card-title my-0 text-white">Data Materi</h5>
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
                        <td><?= $m->id_user; ?></td>
                        <td><?= $m->nama_lengkap ?></td>
                        <td><?= $m->mata_kuliah ?></td>
                        <td><?= $m->judul_materi ?></td>
                        <td><?= $m->program_studi ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($m->tgl_posting)) ?></td>
                        <td>
                            <?php if ($m->status == 'diterima') : ?>
                            <span class="badge badge-success"><?= $m->status ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="mx-auto">
                            <a href="<?= site_url('mahasiswa/materi/detail/' . $m->id_materi); ?>"
                                class="btn btn-sm btn-info"><i class="fas fa-eye text-center"></i> Lihat</a>
                            <a href="<?= site_url('mahasiswa/materi/download/' . $m->id_materi) ?>"
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