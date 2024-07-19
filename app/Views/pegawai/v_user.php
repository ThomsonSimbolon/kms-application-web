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
            <!-- Tambah Data User -->
            <h5 class="card-title my-0 text-white">Data Pengguna</h5>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert" id="success-alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
        <?php endif; ?>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover text-nowrap table-responsive-lg" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php if (is_array($u)) : ?>
                    <?php foreach ($u as $p) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->id_user; ?></td>
                        <td><?= $p->email; ?></td>
                        <td><?= $p->level; ?></td>
                        <td>
                            <?php if ($p->status === 'aktif') : ?>
                            <span class="badge badge-sm badge-success">Aktif</span>
                            <?php else : ?>
                            <span class="badge badge-sm badge-warning">Tidak Aktif</span>
                            <?php endif; ?>
                        </td>
                        <td class="mx-auto">
                            <a href="<?= site_url('pegawai/user/detail/' . $p->id_user); ?>"
                                class="btn btn-info btn-sm"><i class="fas fa-eye text-center"></i> Lihat</a>
                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editModal<?= $p->id_user ?>"><i class="fas fa-pencil-alt text-center"></i>
                                Edit</a>
                        </td>
                    </tr>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $p->id_user ?>" data-backdrop="static"
                        data-keyboard="false" tabindex="-1" role="dialog"
                        aria-labelledby="editModalLabel<?= $p->id_user ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?= $p->id_user ?>">Edit User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form Edit User -->
                                    <form action="<?= site_url('pegawai/user/update/' . $p->id_user) ?>" method="post">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="<?= $p->email; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password" class="form-control"
                                                    id="password<?= $p->id_user ?>" value="<?= $p->password; ?>"
                                                    required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary toggle-password"
                                                        type="button" data-id="<?= $p->id_user ?>"><i
                                                            class="fa fa-eye"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="hashedPassword">Hashed Password</label>
                                            <input type="text" class="form-control" name="hashedPassword"
                                                id="hashedPassword<?= $p->id_user ?>" value="<?= $p->password; ?>"
                                                readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="level">Level</label>
                                            <select class="form-control" name="level">
                                                <option value="pegawai"
                                                    <?= $p->level == 'pegawai' ? 'selected' : ''; ?>>pegawai
                                                </option>
                                                <option value="dosen" <?= $p->level == 'dosen' ? 'selected' : ''; ?>>
                                                    Dosen
                                                </option>
                                                <option value="pegawai"
                                                    <?= $p->level == 'pegawai' ? 'selected' : ''; ?>>Pegawai
                                                </option>
                                                <option value="mahasiswa"
                                                    <?= $p->level == 'mahasiswa' ? 'selected' : ''; ?>>Mahasiswa
                                                </option>
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                                        </div>
                                    </form>
                                    <!-- End form Edit User -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="5">Tidak ada data pengguna</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>