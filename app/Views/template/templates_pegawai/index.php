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
    <link rel="stylesheet" href="<?= base_url() ?>/assets/custom-css/css/style-2.css">
    <!-- End Link untuk memanggi custom css -->

    <!-- Link untuk memanggil favicon css -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/custom-css/img/favicon.png" type="image/x-icon">
    <!-- End Link untuk memanggi favicon css -->

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

    <!-- Ckeditor5 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/ckeditor5/dist/browser/ckeditor5.css">
    <!-- End Ckeditor5 -->

</head>

<body id="page-top">

    <div class="wrapper">
        <!-- Top Bar -->
        <?= $this->include('template/templates_pegawai/topbar'); ?>
        <!-- End Top Bar -->

        <div class="container-fluid mt-2">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-3 mt-2">
                    <div class="content-1 bg-light rounded side-bar">
                        <div class="card px-0 shadow">
                            <!-- Sidebar -->
                            <?= $this->include('template/templates_pegawai/sidebar'); ?>
                            <!-- End of Sidebar -->
                        </div>
                    </div>
                </div>


                <div class="col-lg-9 mt-2">
                    <!-- Section Content -->
                    <?= $this->renderSection('content-pgw'); ?>
                    <!-- End Section Content -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="sticky-footer bottom-0 py-3 mt-3">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; KMS-App 2024</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Script js untuk memanggil jquery template sb-admin -->
    <script src="<?= base_url() ?>/assets/sb-admin/templates/jquery/jquery.min.js"></script>
    <!-- End script js untuk memanggil jquery template sb-admin -->

    <!-- Script js bootstrap untuk memanggil template sb-admin -->
    <script src="<?= base_url() ?>/assets/sb-admin/templates/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- End script js bootstrap untuk memanggil template sb-admin -->

    <!-- Script js untuk memanggil jquery template sb-admin -->
    <script src="<?= base_url() ?>/assets/sb-admin/templates/jquery-easing/jquery.easing.min.js"></script>
    <!-- End script js untuk memanggil jquery template sb-admin -->

    <!-- Script js khusus untuk memanggil semua halaman di template sb-admin -->
    <script src="<?= base_url() ?>/assets/sb-admin/js/sb-admin-2.min.js"></script>
    <!-- End script js khusus untuk memanggil semua halaman -->

    <!-- Plugin untuk memanggil tingkat halaman pada template sb-admin -->
    <script src="<?= base_url() ?>/assets/sb-admin/templates/chart.js/Chart.min.js"></script>
    <!-- End plugin untuk memanggil tingkat halaman pada template sb-admin di template sb-admin -->

    <!-- Script js untuk memanggil chart di template sb-admin -->
    <!-- <script src="<?= base_url() ?>/assets/sb-admin/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>/assets/sb-admin/js/demo/chart-pie-demo.js"></script> -->
    <!-- End script js untuk memanggil chart di template sb-admin -->

    <!-- Script js untuk memanggil javascript eksternal -->
    <script src="<?= base_url() ?>/assets/custom-css/js/main.js"></script>
    <!-- End script js untuk memanggil javascript eksternal -->

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
    $(document).ready(function() {
        $('.toggle-password').click(function() {
            var id = $(this).data('id');
            var input = $('#password' + id);
            var icon = $(this).find('i');
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                input.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
    </script>

    <!-- Script untuk memanggil ckeditor -->
    <script type="importmap">
        {
			"imports": {
				"ckeditor5": "<?= base_url(); ?>/assets/ckeditor5/dist/browser/ckeditor5.js",
				"ckeditor5/": "<?= base_url(); ?>/assets/ckeditor5/dist/browser/"
			}
		}
	</script>

    <script type="module">
    import {
        ClassicEditor,
        AccessibilityHelp,
        Alignment,
        Autoformat,
        AutoLink,
        Autosave,
        BlockQuote,
        Bold,
        Essentials,
        FindAndReplace,
        FontBackgroundColor,
        GeneralHtmlSupport,
        Heading,
        HorizontalLine,
        Indent,
        IndentBlock,
        Italic,
        Link,
        List,
        Paragraph,
        PasteFromOffice,
        SelectAll,
        TextTransformation,
        Underline,
        Undo
    } from 'ckeditor5';

    const editorConfig = {
        toolbar: {
            items: [
                'undo',
                'redo',
                '|',
                'findAndReplace',
                'selectAll',
                '|',
                'heading',
                '|',
                'fontBackgroundColor',
                '|',
                'bold',
                'italic',
                'underline',
                '|',
                'horizontalLine',
                'link',
                'blockQuote',
                '|',
                'alignment',
                '|',
                'bulletedList',
                'numberedList',
                'indent',
                'outdent',
                '|',
                'accessibilityHelp'
            ],
            shouldNotGroupWhenFull: false
        },
        plugins: [
            AccessibilityHelp,
            Alignment,
            Autoformat,
            AutoLink,
            Autosave,
            BlockQuote,
            Bold,
            Essentials,
            FindAndReplace,
            FontBackgroundColor,
            GeneralHtmlSupport,
            Heading,
            HorizontalLine,
            Indent,
            IndentBlock,
            Italic,
            Link,
            List,
            Paragraph,
            PasteFromOffice,
            SelectAll,
            TextTransformation,
            Underline,
            Undo
        ],
        heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        htmlSupport: {
            allow: [{
                name: /^.*$/,
                styles: true,
                attributes: true,
                classes: true
            }]
        }
    };

    ClassicEditor.create(document.querySelector('#deskripsi'), editorConfig);
    </script>
    <!-- End script untuk memanggil ckeditor -->
</body>

</html>