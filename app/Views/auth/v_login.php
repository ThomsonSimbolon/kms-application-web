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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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

    <!-- Link bootstrap-icon -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/bootstrap-icons/font/bootstrap-icons.min.css">
    <!-- End Link bootstrap-icon -->

</head>

<body class="d-flex justify-content-center align-items-center bg-body">

    <div class="container-fluid container-login">
        <div class="card shadow">
            <div class="card-header text-h3 py-2">
                <h3 class="card-title text-center d-flex justify-content-center align-items-center">
                    <img src="<?= base_url('/assets/custom-css/img/logo_kms.png') ?>"
                        class="d-inline-block img-fluid pt-0 pb-0 mt-0 mb-0 mr-2" alt="Logo"
                        style="max-width: 70px !important; width: 100% !important;">
                    KMS-App
                </h3>
            </div>

            <div class="card-body">
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= site_url('/auth/login'); ?>" method="post" class="needs-validation" novalidate>
                    <?= csrf_field(); ?>
                    <!-- Notifikasi error message -->
                    <?php if (session()->getFlashdata('msg')) : ?>
                    <div><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope env-login"></span>
                                </div>
                            </div>
                            <input type="email"
                                class="form-control shadow-none rounded-right <?= $validation->hasError('email') ? 'is-invalid' : null ?>"
                                id="email" name="email" value="<?= old('email') ?>" placeholder="Email..." autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->getError('email') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <input type="password"
                                class="form-control shadow-none rounded-right <?= $validation->hasError('password') ? 'is-invalid' : null ?>"
                                id="password" name="password" value="<?= old('password') ?>" placeholder="Password...">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="showPasswordCheck">
                        <label class="form-check-label" for="showPasswordCheck">Tampilkan password</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-login text-white w-100 shadow">Login</button>
                </form>
                <hr />
                <p class="text-center my-0 text-gray-600">
                    Belum punya akun?
                    <a href="<?= site_url('/auth/register'); ?>"
                        class="p-footer text-decoration-none font-weight-bold"><i class="fas fa-registered"></i>
                        Register</a>
                </p>
                <p class="text-center my-0 text-gray-600">
                    <a href="/" class="text-decoration-none font-weight-bold"><i class="fas fa-house"></i> Home</a>
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

    <script>
    function showPass() {
        var password = document.getElementById("password");
        var icon = document.getElementById("toggleIcon");

        if (password.type === "password") {
            password.type = "text";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        } else {
            password.type = "password";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        }
    }
    </script>

</body>

</html>