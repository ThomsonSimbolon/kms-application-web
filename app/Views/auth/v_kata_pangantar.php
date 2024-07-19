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
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">
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
                        <!-- Dropdown -->
                        <li class="nav-item dropdown nav-1">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profile
                            </a>
                            <div class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?= base_url('/kata_pengantar'); ?>">Kata Pengantar</a>
                                <a class="dropdown-item" href="<?= base_url('/sejarah'); ?>">Sejarah</a>
                                <a class="dropdown-item" href="<?= base_url('/visi_misi'); ?>">Visi Dan Misi</a>
                                <a class="dropdown-item" href="<?= base_url('/struktur_organisasi'); ?>">Struktur
                                    Organisasi</a>
                            </div>
                        </li>
                        <li class="nav-item nav-1">
                            <a class="nav-link" href="<?= base_url('/berita'); ?>">Berita</a>
                        </li>
                        <li class="nav-item nav-1">
                            <a class="nav-link" href="<?= base_url('auth/register'); ?>">Registrasi</a>
                        </li>
                        <li class="nav-item nav-1">
                            <a class="nav-link" href="<?= base_url('auth/form_login'); ?>">Login</a>
                        </li>
                        <!-- <li class="nav-item shadow-sm rounded mx-1 mt-1 mb-1">
                            <a class="nav-link my-auto text-center btn btn-sm btn-secondary text-light rounded w-100"
                                href="">Registrasi</a>
                        </li>
                        <li class="nav-item shadow-sm rounded mx-1 mt-1 mb-1">
                            <a class="nav-link my-auto text-center text-light btn btn-sm btn-index2 rounded w-100"
                                href="">Login</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <div class="breadcrumb-area py-5"
            style="background-image: linear-gradient( 111.4deg,  rgba(7,7,9,1) 6.5%, rgba(27,24,113,1) 93.2% ); color: #fff !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-text">
                            <h1 class="text-center">KMS-APP</h1>
                            <h1 class="text-center">FAKULTAS ILMU KOMPUTER</h1>
                            <div class="breadcrumb-bar text-center text-light">
                                <a href="<?= base_url('/'); ?>" class="text-white">Beranda</a>
                                <span class="mx-2">/</span>
                                <span class="text-white">Kata Pengantar</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section kata pengantar -->
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center mb-4 text-judul">
                <h2 class="text-primary font-weight-bold text-uppercase heading-content">Kata Pengantar</h2>
            </div>
            <div class="row p-3">
                <div class="col-lg-12 col-md-12 col-12">
                    <p style="margin-top: 0; font-size: 1.2rem; text-align: justify;">Assalamu’alaikum Wr. Wb.</p>
                    <p style="margin-top: 0; font-size: 1.2rem; text-align: justify;">
                        Selamat datang di kampus Fakultas Ilmu Komputer Universitas Lancang Kuning. Fakultas Ilmu
                        Komputer Universitas Lancang Kuning menyelenggarakan Program pendidikan S-1 untuk 3 program
                        studi sebagai berikut :
                    </p>
                    <ul class="list-unstyled ml-4">
                        <li style="margin-top: 0; margin-bottom: 0; font-size: 1.1rem; text-align: justify;">Teknik
                            Informatika (TI)</li>
                        <li style="margin-top: 0; margin-bottom: 0; font-size: 1.1rem; text-align: justify;">Sistem
                            Informasi (SI)</li>
                        <li style="margin-top: 0; margin-bottom: 0; font-size: 1.1rem; text-align: justify;">Bisnis
                            Digital
                            (BisDi)</li>
                    </ul>
                    <p style="margin-top: 0; font-size: 1.2rem; text-align: justify;">
                        Pada saat ini jumlah Mahasiswa Aktif Fakultas Ilmu Komputer mencapai 855 mahasiswa dari Program
                        Studi Teknik Informatika sebanyak 557 Mahasiswa, dari Program Studi Sistem Informasi sebanyak
                        298
                        Mahasiswa. Jumlah Alumni sampai dengan Angkatan Ke XXII berjumlah 1.649 Lulusan, Kurikulum
                        program
                        S-1 Fakultas Ilmu Komputer dirancang berdasarkan Kurikulum Nasional, tanpa mengabaikan standar
                        internasional. Pengembangan kurikulum yang dilakukan setiap 2 tahun sekali selalu memperhatikan
                        kebutuhan “users” dan perubahan lingkungan yang begitu cepat dalam menghadapi era Millenial
                        baru.
                    </p>
                </div>
            </div>
        </div>

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
    document.addEventListener("DOMContentLoaded", function() {
        var navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    });
    </script>

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