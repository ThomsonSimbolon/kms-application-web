<?= $this->extend('template/templates_mahasiswa/index'); ?>


<?= $this->Section('content-mhs'); ?>
<div class="container-fluid px-0 mx-0 content-2 rounded">
    <div class="card shadow px-0">
        <div class="card-header border border-1">
            <h1 class="h5 card-text">Dashboard</h1>
        </div>
        <div class="card-body pb-0">
            <!-- Content Row -->
            <div class="row">

                <!-- Card Materi -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Materi</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_materi; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book-open-reader fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Pengetahuan -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Pengetahuan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pengetahuan; ?></div>
                                    <div class="row no-gutters align-items-center"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book-open fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Dokumen -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Dokumen
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                <?= $total_document; ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Card Diskusi -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-secondary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Diskusi
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                <?= $total_diskusi; ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Content Row -->
            <div class="card-footer bg-transparent pt-0">
                <div class="row">
                    <div class="col-lg">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="<?= base_url('assets/custom-css/img/logo_kms.png'); ?>" class="img-fluid px-2" alt="Logo Favicon" style="z-index: 1000; max-width: 400px !important; width: 100% !important;">
                        </div>
                        <div class="row d-flex-align-items-center justify-content-center text-center">
                            <div class="col-md">
                                <div class="container w-50 text-center mt-2">
                                    <marquee behavior="" direction="">
                                        <h3 class="card-text">Selamat Datang Di Halaman Mahasiswa</h3>
                                    </marquee>
                                </div>
                                <p class="text-gray-500">
                                    Aplikasi Sistem Manajemen Pengetahuan
                                    <br>
                                    Untuk Mendukung Proses Pembelajaran
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?= $this->endSection(); ?>