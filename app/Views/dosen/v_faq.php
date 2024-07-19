<?= $this->extend('template/templates_dosen/index'); ?>

<?= $this->section('content-dsn'); ?>
<div class="container-fluid px-0 mx-0 rounded faq">
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

    <div class="card shadow">
        <div class="card-header card-header-faq border border-1">
            <h5 class="card-title text-white my-0">Frequently Asked Questions</h5>
        </div>
        <div class="card-body">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Apa itu aplikasi sistem manajemen pengetahuan?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="container-fluid">
                                <ul>
                                    <li>Aplikasi sistem manajemen pengetahuan adalah platform yang membantu
                                        mengumpulkan,
                                        menyimpan, mengelola, dan berbagi pengetahuan di dalam organisasi atau institusi
                                        pendidikan.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Bagaimana cara kerja aplikasi ini dalam mendukung proses pembelajaran?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="container-fluid">
                                <ul>
                                    <li>Aplikasi ini menyediakan akses mudah ke berbagai sumber daya pembelajaran,
                                        memungkinkan kolaborasi antar pengguna, dan menyediakan alat untuk mengatur dan
                                        mencari informasi dengan efisien.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Siapa saja yang dapat menggunakan aplikasi ini?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="container-fluid">
                                <ul>
                                    <li>Aplikasi ini dapat digunakan oleh mahasiswa, dosen, dan staf administrasi di
                                        Fakultas Ilmu Komputer yang membutuhkan manajemen pengetahuan.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Bagaimana cara memulai menggunakan aplikasi ini?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="container-fluid">
                                <ul>
                                    <li>
                                        <strong>Mendaftar:</strong> Membuat akun pengguna dengan mengisi informasi yang
                                        diperlukan.
                                    </li>
                                    <li>
                                        <strong>Login:</strong> Masuk ke dalam sistem menggunakan akun yang telah
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
                            <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Apa keuntungan utama menggunakan aplikasi ini untuk mahasiswa?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="container-fluid">
                                <ul>
                                    <li>Mahasiswa dapat dengan mudah mengakses materi pembelajaran
                                        dan pengetahuan, berkolaborasi dengan dosen,pegawai ataupun teman sekelas, dan
                                        mendapatkan solusi dari dosen secara efisien.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Bagaimana aplikasi ini membantu dosen dalam proses pembelajaran?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="container-fluid">
                                <ul>
                                    <li>Memudahkan dosen dalam menambahkan atau mengunggah materi,pengetahuan dan
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
                            <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Apakah aplikasi ini dapat diakses melalui perangkat seluler?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
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
                            <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Bagaimana cara mengunggah dan berbagi materi pembelajaran di aplikasi ini?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="container-fluid">
                                <ul>
                                    <li>Pengguna dapat mengunggah dokumen, video, dan berbagai jenis file lainnya
                                        melalui fitur unggah pada aplikasi, serta membagikannya dengan pengguna lain
                                        melalui fitur berbagi.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingNine">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                Bagaimana cara mendapatkan bantuan jika mengalami masalah dengan aplikasi?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseNine" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="container-fluid">
                                <ul>
                                    <li>Pengguna dapat menghubungi tim dukungan melalui fitur bantuan dalam aplikasi,
                                        mengirim email ke dukungan teknis, atau mengakses panduan pengguna.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTen">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                Bagaimana cara memperbarui informasi pribadi di aplikasi ini?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTen" class="collapse" aria-labelledby="headingSTen" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="container-fluid">
                                <ul>
                                    <li>Pengguna dapat memperbarui informasi pribadi mereka melalui pengaturan akun atau
                                        profile di dalam aplikasi.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingEleven">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                Bagaimana cara mencari materi, pengetahuan, dokumen atau informasi yang dibutuhkan di
                                dalam aplikasi?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseEleven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="container-fluid">
                                <ul>
                                    <li>Pengguna dapat menggunakan fitur pencarian yang tersedia untuk menemukan materi
                                        atau informasi yang dibutuhkan dengan cepat dan efisien.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwelve">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed shadow-none text-dark" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                Apa saja fitur kolaborasi yang tersedia di aplikasi ini?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwelve" class="collapse" aria-labelledby="headinTwelve" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="container-fluid">
                                <ul>
                                    <li>Aplikasi ini menyediakan fitur-fitur seperti forum diskusi untuk memfasilitasi
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


<?= $this->endSection(); ?>