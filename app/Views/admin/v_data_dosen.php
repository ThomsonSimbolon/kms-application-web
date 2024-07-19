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
                    <h5 class="card-title my-0 text-primary">Data Dosen</h5>
                </div>
                <div class="card-body table-responsive-lg">
                    <table class="table table-striped table-hover text-nowrap table-responsive" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID User</th>
                                <th>Nama Lengkap</th>
                                <th>NIDN</th>
                                <th>Jabatan</th>
                                <th>Agama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>No Hp</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($dosen as $d) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d['id_user'] ?></td>
                                    <td><?= $d['nama_lengkap'] ?></td>
                                    <td><?= $d['nidn'] ?></td>
                                    <td><?= $d['jabatan'] ?></td>
                                    <td><?= $d['agama'] ?></td>
                                    <td><?= $d['jenis_kelamin'] ?></td>
                                    <td><?= $d['tempat_lahir'] ?></td>
                                    <td><?= $d['tgl_lahir'] ?></td>
                                    <td><?= $d['no_hp'] ?></td>
                                    <td><?= $d['alamat'] ?></td>
                                    <td>
                                        <img src="<?= base_url('uploads/' . $d['upload_foto']) ?>" class="img-fluid rounded shadow" width="30px" height="30px">
                                    </td>
                                    <td class="mx-auto">
                                        <a href="<?= base_url('admin/dosen/inspect/' . $d['id_dosen']); ?>" class="btn btn-info btn-sm shadow"><i class="fas fa-eye"></i></a>
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