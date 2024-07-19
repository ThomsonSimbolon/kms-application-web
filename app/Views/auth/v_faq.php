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

    <link rel="stylesheet" href="<?= base_url('/assets/ckeditor5/ckeditor5.css'); ?>" />

    <!-- Link untuk memanggil custom css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/custom-css/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/custom-css/css/style3.css">
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

    <!-- Link untuk memanggil dataTables -->
    <link href="<?= base_url() ?>/assets/sb-admin/templates/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="<?= base_url() ?>/assets/sb-admin/templates/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url() ?>/assets/sb-admin/templates/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- End Link untuk memanggil dataTables -->

    <!-- Link bootstrap-icon -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/bootstrap-icons/font/bootstrap-icons.min.css">
    <!-- End Link bootstrap-icon -->

</head>

<body id="page-top">
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/'); ?>">
                    <img src="<?= base_url('assets/custom-css/img/logo_kms.png'); ?>" class="img-fluid"
                        style="width: 50px;" alt="Logo">
                    KMS-App
                </a>
                <button class="navbar-toggler shadow-none border border-0" type="button" data-toggle="collapse"
                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item nav-1">
                            <a class="nav-link" href="<?= base_url('/'); ?>">Beranda</a>
                        </li>
                        <li class="nav-item nav-1 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Kata Pengantar</a>
                                <a class="dropdown-item" href="#">Sejarah</a>
                                <a class="dropdown-item" href="#">Visi Dan Misi</a>
                            </div>
                        </li>
                        <li class="nav-item nav-1">
                            <a class="nav-link" href="#">FAQ</a>
                        </li>
                        <li class="nav-item nav-1">
                            <a class="nav-link" href="<?= base_url('auth/register'); ?>">Registrasi</a>
                        </li>
                        <li class="nav-item nav-1">
                            <a class="nav-link" href="<?= base_url('auth/form_login'); ?>">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid mt-3">
            <div class="text-center mb-4">
                <h2 class="text-primary font-weight-bold">FAQ</h2>
            </div>
            <div class="card shadow">
                <div class="card-header card-header-faq border border-1">
                    <h5 class="card-title my-0"><i class="fas fa-question"></i> Frequently Asked Questions</h5>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark"
                                        type="button" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="false" aria-controls="collapseOne">
                                        Apa itu aplikasi sistem manajemen pengetahuan?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <ul>
                                            <li>Aplikasi sistem manajemen pengetahuan adalah platform yang membantu
                                                mengumpulkan,
                                                menyimpan, mengelola, dan berbagi pengetahuan di dalam organisasi atau
                                                institusi
                                                pendidikan.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark"
                                        type="button" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Bagaimana cara kerja aplikasi ini dalam mendukung proses pembelajaran?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <ul>
                                            <li>Aplikasi ini menyediakan akses mudah ke berbagai sumber daya
                                                pembelajaran,
                                                memungkinkan kolaborasi antar pengguna, dan menyediakan alat untuk
                                                mengatur dan
                                                mencari informasi dengan efisien.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark"
                                        type="button" data-toggle="collapse" data-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Siapa saja yang dapat menggunakan aplikasi ini?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <ul>
                                            <li>Aplikasi ini dapat digunakan oleh mahasiswa, dosen, dan staf
                                                administrasi di
                                                Fakultas Ilmu Komputer yang membutuhkan manajemen pengetahuan.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark"
                                        type="button" data-toggle="collapse" data-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                        Bagaimana cara memulai menggunakan aplikasi ini?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <ul>
                                            <li>
                                                <strong>Mendaftar:</strong> Membuat akun pengguna dengan mengisi
                                                informasi yang
                                                diperlukan.
                                            </li>
                                            <li>
                                                <strong>Login:</strong> Masuk ke dalam sistem menggunakan akun yang
                                                telah
                                                dibuat.
                                            </li>
                                            <li>
                                                <strong>Jelajahi konten:</strong> Mulai mencari dan mengakses materi
                                                pembelajaran yang tersedia.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark"
                                        type="button" data-toggle="collapse" data-target="#collapseFive"
                                        aria-expanded="false" aria-controls="collapseFive">
                                        Apa keuntungan utama menggunakan aplikasi ini untuk mahasiswa?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <ul>
                                            <li>Mahasiswa dapat dengan mudah mengakses materi pembelajaran
                                                dan pengetahuan, berkolaborasi dengan dosen,pegawai ataupun teman
                                                sekelas, dan
                                                mendapatkan solusi dari dosen secara efisien.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark"
                                        type="button" data-toggle="collapse" data-target="#collapseSix"
                                        aria-expanded="false" aria-controls="collapseSix">
                                        Bagaimana aplikasi ini membantu dosen dalam proses pembelajaran?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <ul>
                                            <li>Memudahkan dosen dalam menambahkan atau mengunggah materi,pengetahuan
                                                dan
                                                dokumen
                                                pembelajaran dengan efisien.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSeven">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark"
                                        type="button" data-toggle="collapse" data-target="#collapseSeven"
                                        aria-expanded="false" aria-controls="collapseSeven">
                                        Apakah aplikasi ini dapat diakses melalui perangkat seluler?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <ul>
                                            <li>Ya, aplikasi ini memiliki versi seluler yang memungkinkan pengguna untuk
                                                mengakses sistem melalui smartphone atau tablet.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingEight">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark"
                                        type="button" data-toggle="collapse" data-target="#collapseEight"
                                        aria-expanded="false" aria-controls="collapseEight">
                                        Bagaimana cara mengunggah dan berbagi materi pembelajaran di aplikasi ini?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <ul>
                                            <li>Pengguna dapat mengunggah dokumen, video, dan berbagai jenis file
                                                lainnya
                                                melalui fitur unggah pada aplikasi, serta membagikannya dengan pengguna
                                                lain
                                                melalui fitur berbagi.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingNine">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark"
                                        type="button" data-toggle="collapse" data-target="#collapseNine"
                                        aria-expanded="false" aria-controls="collapseNine">
                                        Bagaimana cara mendapatkan bantuan jika mengalami masalah dengan aplikasi?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseNine" class="collapse" aria-labelledby="headingSeven"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <ul>
                                            <li>Pengguna dapat menghubungi tim dukungan melalui fitur bantuan dalam
                                                aplikasi,
                                                mengirim email ke dukungan teknis, atau mengakses panduan pengguna.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTen">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark"
                                        type="button" data-toggle="collapse" data-target="#collapseTen"
                                        aria-expanded="false" aria-controls="collapseTen">
                                        Bagaimana cara memperbarui informasi pribadi di aplikasi ini?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTen" class="collapse" aria-labelledby="headingSTen"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <ul>
                                            <li>Pengguna dapat memperbarui informasi pribadi mereka melalui pengaturan
                                                akun atau
                                                profile di dalam aplikasi.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingEleven">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark"
                                        type="button" data-toggle="collapse" data-target="#collapseEleven"
                                        aria-expanded="false" aria-controls="collapseEleven">
                                        Bagaimana cara mencari materi, pengetahuan, dokumen atau informasi yang
                                        dibutuhkan di
                                        dalam aplikasi?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseEleven" class="collapse" aria-labelledby="headingSeven"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <ul>
                                            <li>Pengguna dapat menggunakan fitur pencarian yang tersedia untuk menemukan
                                                materi
                                                atau informasi yang dibutuhkan dengan cepat dan efisien.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwelve">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark"
                                        type="button" data-toggle="collapse" data-target="#collapseTwelve"
                                        aria-expanded="false" aria-controls="collapseTwelve">
                                        Apa saja fitur kolaborasi yang tersedia di aplikasi ini?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwelve" class="collapse" aria-labelledby="headinTwelve"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <ul>
                                            <li>Aplikasi ini menyediakan fitur-fitur seperti forum diskusi untuk
                                                memfasilitasi
                                                kolaborasi antar pengguna.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-0 mt-5">
        <div class="text-center mb-4">
            <h2 class="text-primary font-weight-bold">Images</h2>
        </div>
        <!-- Carousel image-responsive Set Interval -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="img-box img-responsive" src="<?= base_url('assets/custom-css/img/5.png'); ?>"
                        alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="img-box img-responsive" src="<?= base_url('assets/custom-css/img/6.png'); ?>"
                        alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="img-box img-responsive" src="<?= base_url('assets/custom-css/img/7.png'); ?>"
                        alt="Fourth slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- End Carousel image-responsive Set Interval -->

    </div>

    <!-- Footer -->
    <!-- <footer class="page-footer font-small bg-light text-dark position-absolute" style="width: 100%; bottom: 0;">
            <div class="footer-copyright text-center py-3">
                <span>Copyright &copy; KMS-App 2024</span>
            </div>
        </footer> -->
    </div>
    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Fakultas Ilmu Komputer</h5>
                    <p>Menjadi Fakultas Ilmu Komputer unggul di wilayah Sumatera berlandaskan
                        nilai-nilai budaya melayu
                        pada tahun 2025.</p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Quick Links</h5>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Home</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">About</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Services</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Contact</a>
                    </p>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Useful links</h5>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Your Account</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">KMS</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">FAQ</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Help</a>
                    </p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Contact</h5>
                    <p>
                        <i class="fas fa-home mr-3"></i> Jl.Yos Sudarso No.KM.8,Umban Sari,Kec.Rumbai,Kota
                        Pekanbaru
                    </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> fasilkom@unilak.ac.id
                    </p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> +628117532015
                    </p>
                </div>
            </div>

            <hr class="mb-4">
            <div class="row align-items-center">
                <div class="col-md-7 col-lg-8">
                    <p class="text-center text-md-left">© 2024 Copyright:
                        <a href="#" class="text-white" style="text-decoration: none;">
                            <strong>KMS-App ~ Fakultas Ilmu Komputer</strong>
                        </a>
                    </p>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="text-center text-md-right">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
                                        class="fab fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
                                        class="fab fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
                                        class="fab fa-google-plus"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
                                        class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


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


    <!-- Page level plugins -->
    <script src="<?= base_url() ?>/assets/sb-admin/templates/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/sb-admin/templates/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/sb-admin/templates/datatables-responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="<?= base_url() ?>/assets/sb-admin/templates/datatables-responsive/js/responsive.bootstrap4.min.js">
    </script>
    <script src="<?= base_url() ?>/assets/sb-admin/templates/datatables-buttons/js/dataTables.buttons.min.js">
    </script>
    <script src="<?= base_url() ?>/assets/sb-admin/templates/datatables-buttons/js/buttons.bootstrap4.min.js">
    </script>
    <script src="<?= base_url() ?>/assets/sb-admin/templates/datatables-buttons/js/buttons.html5.min.js">
    </script>
    <script src="<?= base_url() ?>/assets/sb-admin/templates/datatables-buttons/js/buttons.print.min.js">
    </script>
    <script src="<?= base_url() ?>/assets/sb-admin/templates/datatables-buttons/js/buttons.colVis.min.js">
    </script>
    <!-- End Page level plugins -->

    <!-- Script javascript untuk memanggil jqueryTable -->
    <script src="<?= base_url() ?>/assets/sb-admin/js/demo/datatables-demo.js"></script>
    <!-- End script javascript untuk memanggil jqueryTable -->
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

    <script>
    $(document).ready(function() {
        function generateCalendar(month, year) {
            var daysInMonth = new Date(year, month + 1, 0).getDate();
            var firstDay = new Date(year, month).getDay();
            var calendar =
                '<table class="table table-responsive-lg calendar"><thead><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr></thead><tbody><tr>';
            var date = 1;

            for (var i = 0; i < 6; i++) {
                for (var j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDay) {
                        calendar += '<td></td>';
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        var today = new Date();
                        var isToday = date === today.getDate() && year === today.getFullYear() && month ===
                            today.getMonth() ? 'today' : '';
                        calendar += `<td class="${isToday}">${date}</td>`;
                        date++;
                    }
                }
                if (date > daysInMonth) {
                    break;
                }
                calendar += '</tr><tr>';
            }
            calendar += '</tr></tbody></table>';
            $('#calendar').html(calendar);
        }

        var today = new Date();
        generateCalendar(today.getMonth(), today.getFullYear());
    });
    </script>


</body>

</html>