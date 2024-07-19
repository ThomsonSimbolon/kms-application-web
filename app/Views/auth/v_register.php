<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="KMS | Fakultas Ilmu Komputer">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Link css untuk memanggil fontawesome icon -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/fontawesome-free-6.5.1-web/css/all.min.css">
    <!-- End Link css untuk memanggil fontawesome icon -->

    <!-- Link untuk memanggil google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- End Link untuk memanggil google font -->

    <!-- Link css untuk memanggil template admin -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/sb-admin/css/sb-admin-2.min.css">
    <!-- End Link css untuk memanggil template admin -->

    <!-- Link untuk memanggil custom css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/custom-css/css/style.css">
    <!-- End Link untuk memanggi custom css -->

    <!-- Link untuk memanggil favicon css -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/custom-css/img/favicon.png" type="image/x-icon">
    <!-- End Link untuk memanggi favicon css -->

    <!-- Link untuk memanggil Bootstrap 5.3.2 css -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/bootstrap-5.3.2/css/bootstrap.min.css"> -->
    <!-- End Link untuk memanggil Bootstrap 5.3.2 css -->

    <!-- Link untuk memanggil SweetAlert -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/sweetalert2/dist/sweetalert2.min.css">
    <!-- End Link untuk memanggil SweetAlert -->
</head>

<body class="bg-body">

    <div class="container-fluid px-2 bg-regis">
        <div class="card shadow wrapper-regis">
            <div class="card-header text-h3 py-2">
                <h3 class="card-title text-center d-flex justify-content-center align-items-center">
                    <img src="<?= base_url('/assets/custom-css/img/logo_kms.png') ?>" class="d-inline-block img-fluid pt-0 pb-0 mt-0 mb-0 mr-2" alt="Logo" style="max-width: 70px !important; width: 100% !important;">
                    KMS-Registration
                </h3>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('msg')) : ?>
                    <div><?= session()->getFlashdata('msg') ?></div>
                <?php endif; ?>
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= site_url('/auth/register') ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : null ?>" name="email" id="email" value="<?= old('email'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : null ?>" name="password" id="password" value="<?= old('password'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password') ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-register text-white shadow w-100">Registration</button>
                </form>
                <hr />
                <p class="text-center my-0 text-gray-600">
                    Sudah punya akun?
                    <a href="<?= base_url('auth/form_login'); ?>" class="text-decoration-none font-weight-bold"><i class="fas fa-right-to-bracket"></i> Login</a>
                </p>
                <p class="text-center my-0 text-gray-600">
                    <a href="<?= base_url('/'); ?>" class="text-decoration-none font-weight-bold"><i class="fas fa-house"></i> Home</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/assets/sb-admin/templates/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/sb-admin/templates/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/assets/sb-admin/templates/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/assets/sb-admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="<?= base_url() ?>/assets/sb-admin/templates/chart.js/Chart.min.js"></script> -->

    <!-- Memanggil Chart Melalui Javascript Template Admin 2 -->
    <!-- <script src="<?= base_url() ?>/assets/sb-admin/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>/assets/sb-admin/js/demo/chart-pie-demo.js"></script> -->

    <!-- Memanggil Javascript Eksternal -->
    <script src="<?= base_url() ?>/assets/custom-css/js/main.js"></script>
    <!-- End Memanggil Javascript Eksternal -->

    <!-- Memanggil Javascript Bootstrap 5.3.2 -->
    <!-- <script src="<?= base_url() ?>/assets/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script> -->
    <!-- End Memanggil Javascript Bootstrap 5.3.2  -->

    <!-- Script js untuk memanggil sweetalert -->
    <script src="<?= base_url() ?>/assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- End Script js untuk memanggil sweetalert -->
</body>

</html>