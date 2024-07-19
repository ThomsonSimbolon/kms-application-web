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
                    <h5 class="card-title my-0 text-primary">Validasi Dokumen</h5>
                    <a href="<?= base_url('admin/document'); ?>" class="text-danger"><i class="fa-solid fa-xmark"></i></a>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover text-nowrap table-responsive-lg" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Judul Dokumen</th>
                                <th>Deskripsi</th>
                                <th>File</th>
                                <th>Tanggal Upload</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($documents  as $document) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $document->nama_lengkap; ?></td>
                                    <td><?= $document->judul_dokumen; ?></td>
                                    <td><?= $document->deskripsi; ?></td>
                                    <td><?= $document->file_path; ?></td>
                                    <td><?= date('d-m-Y H:i:s', strtotime($document->tgl_upload)) ?></td>
                                    <td>
                                        <?php if ($document->status == 'pending') : ?>
                                            <span class="badge badge-warning">pending</span>
                                        <?php elseif ($document->status == 'diterima') : ?>
                                            <span class="badge badge-success">diterima</span>
                                        <?php elseif ($document->status == 'ditolak') : ?>
                                            <span class="badge badge-danger">ditolak</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="mx-auto">
                                        <?php if ($document->status != 'diterima') : ?>
                                            <a href="<?= base_url('admin/document/approve/' . $document->id_dokumen); ?>" class="btn btn-sm btn-success">Terima</a>
                                        <?php endif; ?>
                                        <?php if ($document->status != 'ditolak') : ?>
                                            <a href="<?= base_url('admin/document/reject/' . $document->id_dokumen); ?>" class="btn btn-sm btn-danger">Tolak</a>
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