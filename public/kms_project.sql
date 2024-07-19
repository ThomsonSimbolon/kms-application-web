-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 17, 2024 at 10:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aktivitas`
--

CREATE TABLE `tb_aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal_masuk` datetime DEFAULT NULL,
  `tanggal_keluar` datetime DEFAULT NULL,
  `level` enum('admin','dosen','pegawai','mahasiswa') DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_aktivitas`
--

INSERT INTO `tb_aktivitas` (`id_aktivitas`, `email`, `tanggal_masuk`, `tanggal_keluar`, `level`, `id_user`) VALUES
(6, 'simbolonthomson10@gmail.com', '2024-05-03 15:53:22', '2024-05-03 15:53:22', 'mahasiswa', 1),
(7, 'administator@gmail.com', '2024-05-03 15:53:35', '2024-05-03 15:53:35', 'admin', 4),
(8, 'supriadi@gmail.com', '2024-05-04 15:42:10', '2024-05-04 15:42:10', 'pegawai', 3),
(9, 'guntoro@gmail.com', '2024-05-05 02:19:20', '2024-05-05 02:19:20', 'dosen', 5),
(10, 'dulfianto@gmail.com', '2024-05-07 06:07:21', '2024-05-07 06:07:21', 'mahasiswa', 7),
(11, 'fitohasibuan@gmail.com', '2024-05-10 03:06:29', '2024-05-10 03:06:29', 'mahasiswa', 8),
(64, 'taslim@gmail.com', '2024-05-22 21:20:47', '2024-05-22 21:32:43', 'dosen', 9),
(65, 'jelyarta@gmail.com', '2024-06-07 01:23:09', '2024-06-07 01:26:39', 'mahasiswa', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `penulis` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `tgl_publikasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `status` enum('published','draft') NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul`, `isi`, `penulis`, `url`, `file_path`, `tgl_publikasi`, `tgl_update`, `status`) VALUES
(3, 'Seminar Teknologi Terbaru', 'Seminar teknologi terbaru akan diadakan pada tanggal 20 Mei 2024.', 'Dosen Teknologi', 'https://ojs.unm.ac.id/tekpend', '1715884446_3c48dfe406c1a14d190c.png', '2024-05-18 02:43:58', '2024-05-18 02:43:58', 'draft'),
(7, 'Seminar Programming', 'Seminar programming merupakan seminar untuk mencari bibit unggul,baik desain UI/UIX, front-end, back-end, mobile deloper junior, full stack developer junior', 'Tony', NULL, '1715886994_9756676e4b6482cd0712.png', '2024-05-17 02:16:34', '2024-05-17 02:16:34', 'draft'),
(8, 'Transformasi Digital di Era Pandemi', 'Fakultas Keguruan dan Ilmu Pendidikan Universitas Terbuka mengadakan Seminar Inovasi Pendidikan dengan tema \"Transformasi Digital di Era Pandemi\" pada 15 Juli 2024. Seminar ini bertujuan untuk membahas bagaimana teknologi digital dapat digunakan untuk men', 'Ayu Larasati', NULL, '1715936130_205121d60e43250bad8f.png', '2024-05-17 15:55:30', '2024-05-17 15:55:30', 'draft'),
(9, 'Masa Depan Kecerdasan Buatan', 'Fakultas Teknik Universitas Indonesia menggelar Seminar Teknologi AI dengan tema \"Masa Depan Kecerdasan Buatan\" pada 5 Juni 2024. Seminar ini akan membahas perkembangan terbaru dalam teknologi kecerdasan buatan dan aplikasinya di berbagai industri. Pembic', 'Rizky Pratama', NULL, '1715936927_78beadcfc82304948549.jpeg', '2024-05-17 16:08:47', '2024-05-17 16:08:47', 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `judul_dokumen` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `tgl_upload` datetime DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL,
  `status` enum('pending','diterima','ditolak') DEFAULT 'pending',
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`id_dokumen`, `nama_lengkap`, `judul_dokumen`, `deskripsi`, `file_path`, `tgl_upload`, `tgl_ubah`, `status`, `id_user`) VALUES
(20, 'Thomson', 'Codeigniter', '<p>Belajar Alur Tahapan Codeigniter 4 Dasar</p>', '1715533245_2969b81a0aafff48e0fe.png', '2024-05-13 00:00:45', '2024-05-13 00:10:00', 'diterima', 1),
(22, 'Guntoro', 'Artikel Jurnal', 'Artikel jurnal untuk acuan skripsi', '1715537484_4bc144686df48b98dfda.pdf', '2024-05-13 01:11:24', '2024-05-13 02:23:17', 'ditolak', 5),
(24, 'Supriadi', 'Artikel Journal', '<p>Pelajari artikel tersebut, guna untuk acuan skripsi anda</p>', '1715542951_1da50d3563d0efd25964.pdf', '2024-05-13 02:42:31', '2024-05-13 02:43:16', 'diterima', 3),
(25, 'Thomson Simbolon', 'Logo KMS', '<p>Logo Aplikasi KMS</p>', '1715546821_101400ad0455613eae7e.png', '2024-05-13 03:47:01', '2024-05-13 03:47:27', 'diterima', 1),
(26, 'Admin', 'Tes Motivasi Belajar', '<p>Dokumen ini merupakan dokumen untuk melakukan tes motivasi belajar bagi seluruh mahasiswa fakultas ilmu komputer</p>', '1716480424_4b72ce8b563ea43583b3.png', '2024-05-23 23:07:04', '2024-05-23 23:07:25', 'diterima', 4),
(27, 'Guntoro', 'Dokumen Jurnal', '<p>Jurnal untuk dipelajari</p>', 'Jurnal+Gede+Kohesi.pdf', '2024-06-23 14:54:02', '2024-06-23 14:54:02', 'diterima', 5),
(28, 'Admin', 'Jurnal', '<p>Jurnal penelitian</p>', 'yusrian,+3252-14190-2-CE.pdf', '2024-06-23 15:20:21', '2024-06-23 15:20:21', 'diterima', 4),
(29, 'Supriadi', 'Transkip nilai', '<p>Transkip nilai atas nama Thomson</p>', 'transkips-nilai.pdf', '2024-06-26 03:18:28', '2024-06-26 03:23:49', 'diterima', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `upload_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `id_user`, `nama_lengkap`, `nidn`, `jabatan`, `agama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `alamat`, `upload_foto`) VALUES
(1, 5, 'Guntoro', '1012018803', 'Dosen', 'Islam', 'laki-laki', 'Pekanbaru', '2024-04-29', '082253859424', 'Jln Sudarso No.45', '1714338405_cd1a6a80287ee4e4af3a.jpg'),
(27, 9, 'Taslim', '1022127601', 'Dosen', 'Islam', 'laki-laki', 'Pekanbaru', '1985-04-10', '08124273654', 'Jln Riau No.10', '1716389431_97feb7f975919984c6e3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_forum`
--

CREATE TABLE `tb_forum` (
  `id_forum` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `judul_forum` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `tgl_posting` datetime DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL,
  `status` enum('pending','diterima','ditolak') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_forum`
--

INSERT INTO `tb_forum` (`id_forum`, `id_user`, `judul_forum`, `deskripsi`, `nama_lengkap`, `tgl_posting`, `tgl_ubah`, `status`) VALUES
(11, 4, 'Artikel 1', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>', 'Admin', '2024-05-23 23:23:13', '2024-05-23 23:23:13', 'diterima'),
(12, 4, 'Artikel 2', '<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>', 'Admin', '2024-05-15 07:25:03', '2024-05-16 11:42:24', 'diterima'),
(17, 5, 'Artikel 3', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>', 'Guntoro', '2024-05-16 12:54:07', '2024-05-16 12:58:18', 'diterima'),
(18, 3, 'Artikel 4', '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'Supriadi', '2024-05-16 13:03:11', '2024-05-16 13:03:37', 'diterima'),
(19, 1, 'Artikel 6', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</p>', 'Thomson', '2024-05-16 14:05:09', '2024-05-16 14:06:43', 'diterima'),
(24, 20, 'Codeigniter 4', '<p>Bagaimana cara menggunakan codeigniter, karena saya belum paham mengenai konsep MVC nya pak. Terima Kasih...</p>', 'Jelyarta Agnes Lumiati Sinaga', '2024-06-07 02:22:44', '2024-06-07 02:22:44', 'pending'),
(25, 1, 'Artikel 8', '<p>ssssssssssssssssssssss</p>', 'Thomson', '2024-06-22 05:55:13', '2024-06-22 05:55:13', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_forum` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tgl_komentar` datetime DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `id_user`, `id_forum`, `nama_lengkap`, `komentar`, `tgl_komentar`, `tgl_ubah`) VALUES
(22, 4, 11, 'admin', 'Ini pengetahuannya mengarah kemana, belum jelas tujuannya!!!!', '2024-05-24 21:38:22', '2024-05-24 21:38:22'),
(40, 1, 11, 'Thomson', 'rgtter', '2024-06-18 14:58:37', '2024-06-18 14:58:37'),
(41, 1, 11, 'Thomson', 'sgfd', '2024-06-18 14:58:47', '2024-06-18 14:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `program_studi` enum('S1-Teknik Informatika','S1-Sistem Informasi','S1-Bisnis Digital') DEFAULT NULL,
  `tahun_angkatan` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `upload_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mhs`, `id_user`, `nama_lengkap`, `nim`, `program_studi`, `tahun_angkatan`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `alamat`, `upload_foto`) VALUES
(1, 1, 'Thomson', '2055201108', 'S1-Teknik Informatika', '2020', 'laki-laki', 'Duri', '2000-10-10', '081992143561', 'Jln Ikri Km.5', 'my-profile.jpg'),
(3, 7, 'Dulfianto', '2055201110', 'S1-Teknik Informatika', '2020', 'laki-laki', 'Kerinci', '2001-02-05', '081924672345', 'dsfsdfsd', '1715037495_0c2fb81a38f6c19677e1.jpg'),
(9, 8, 'Fito Hasibuan', '2055201116', 'S1-Teknik Informatika', '2020', 'laki-laki', 'Duri', '2002-02-05', '081362347234', 'Balai Raja', '1715288317_825e8cd9ec28611bc4b1.jpg'),
(34, 20, 'Jelyarta Agnes Lumiati Sinaga', '2055201122', 'S1-Teknik Informatika', '2022', 'perempuan', 'Duri', '2003-08-02', '082216467251', 'Jln. Sebanga Km.17', 'jelod2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `mata_kuliah` varchar(50) DEFAULT NULL,
  `judul_materi` varchar(50) DEFAULT NULL,
  `program_studi` enum('Teknik Informatika','Sistem Informasi','Sistem Digital') DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `tgl_posting` datetime DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL,
  `status` enum('pending','diterima','ditolak') DEFAULT 'pending',
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `nama_lengkap`, `mata_kuliah`, `judul_materi`, `program_studi`, `file_path`, `tgl_posting`, `tgl_ubah`, `status`, `id_user`) VALUES
(16, 'Admin', '123123', '123123', 'Sistem Informasi', '1716482564_29772ef3ec77f0d6bb17.png', '2024-05-23 23:42:44', '2024-05-23 23:51:48', 'diterima', 4),
(17, 'Admin', '1', '1', 'Teknik Informatika', '1716482671_789f9032cbd57ca0d305.png', '2024-05-23 23:44:31', '2024-05-23 23:51:50', 'diterima', 4),
(18, 'Supriadi', 'sdbfjdsh', 'shdfhjds', 'Teknik Informatika', '1716487617_1b36981b8004b4666aa0.png', '2024-05-24 01:06:57', '2024-05-24 01:11:20', 'diterima', 3),
(19, 'Guntoro', 'Pemrograman Web', 'Codeigniter 4', 'Teknik Informatika', 'Codeigniter4.png', '2024-06-23 14:59:36', '2024-06-23 15:01:59', 'diterima', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_notifikasi`
--

CREATE TABLE `tb_notifikasi` (
  `id_notif` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tgl_posting` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_notifikasi`
--

INSERT INTO `tb_notifikasi` (`id_notif`, `type`, `pesan`, `tgl_posting`) VALUES
(1, 'pengetahuan', 'Pengetahuan baru telah ditambahkan.', '2024-05-23 14:50:27'),
(2, 'pengetahuan', 'Pengetahuan baru telah ditambahkan.', '2024-06-06 15:40:45'),
(3, 'pengetahuan', 'Pengetahuan baru telah ditambahkan.', '2024-06-06 15:43:36'),
(4, 'discussion', 'Forum diskusi baru telah ditambahkan.', '2024-06-06 15:44:35'),
(5, 'discussion', 'Forum diskusi baru telah ditambahkan.', '2024-06-06 15:45:28'),
(6, 'discussion', 'Forum diskusi baru telah ditambahkan.', '2024-06-06 15:54:58'),
(7, 'discussion', 'Forum diskusi baru telah ditambahkan.', '2024-06-06 15:56:14'),
(8, 'pengetahuan', 'Pengetahuan baru telah ditambahkan.', '2024-06-17 10:55:05'),
(9, 'pengetahuan', 'Pengetahuan baru telah ditambahkan.', '2024-06-19 19:12:16'),
(10, 'dokumen', 'Dokumen baru telah ditambahkan.', '2024-06-23 08:20:21'),
(11, 'pengetahuan', 'Pengetahuan baru telah ditambahkan.', '2024-06-25 21:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `upload_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `id_user`, `nidn`, `nama_lengkap`, `jabatan`, `agama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `alamat`, `upload_foto`) VALUES
(1, 3, '101201880312', 'Supriadi', 'Staf Administrasi', 'Islam', 'laki-laki', 'Rumbai', '1995-08-05', '082265738572', 'Jln Riau No.5', '1714340807_1bdea64402587d5082ba.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengetahuan`
--

CREATE TABLE `tb_pengetahuan` (
  `id_pengetahuan` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `judul_pengetahuan` varchar(50) DEFAULT NULL,
  `jenis_pengetahuan` varchar(50) DEFAULT NULL,
  `deskripsi_pengetahuan` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `tgl_posting` datetime DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL,
  `status` enum('pending','diterima','ditolak') DEFAULT 'pending',
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengetahuan`
--

INSERT INTO `tb_pengetahuan` (`id_pengetahuan`, `nama_lengkap`, `judul_pengetahuan`, `jenis_pengetahuan`, `deskripsi_pengetahuan`, `file_path`, `tgl_posting`, `tgl_ubah`, `status`, `id_user`) VALUES
(21, '12rrrr', '12', '12', '<p>12</p>', '1718622036_2b93927c90b03e941639.pdf', '2024-06-17 18:00:36', '2024-06-17 18:00:36', 'diterima', 4),
(22, '123123', '123', '312312', '<p>123123</p>', '1718622175_218a06bfeee771e3c8b2.png', '2024-06-17 18:02:55', '2024-06-17 18:02:55', 'diterima', 4),
(26, '22', '222', '22', '<p>222</p>', '1718621705_f7fe263e7e5167632897.png', '2024-06-17 17:55:05', '2024-06-17 17:55:05', 'diterima', 4),
(27, 'Thomson', 'Penerapan Codeigniter', 'Tacit', '<p>sssss</p>', '1718824336_8c645bda97399a2b6a36.png', '2024-06-20 02:12:16', '2024-06-20 02:12:16', 'diterima', 4),
(29, 'Admin', 'asdas', 'dfsdf', '<p>Ini adalah link lorem ipsum</p><p>&nbsp;</p><p><a target=\"_blank\" href=\"https://www.lipsum.com/\">lorem ipsum</a></p>', 'lembar_persetujuan.pdf', '2024-06-26 04:16:25', '2024-06-26 04:16:25', 'diterima', 4),
(30, 'Supriadi', 'Codeigniter 4', 'Explicit', '<p>Pengetahuan dengan cara menginstal codeigniter 4 di Linux</p>', 'Codeigniter4.png', '2024-06-26 20:34:04', '2024-07-07 15:55:00', 'diterima', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` enum('admin','dosen','pegawai','mahasiswa') DEFAULT 'mahasiswa',
  `status` enum('aktif','tidak aktif') DEFAULT 'tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `email`, `password`, `level`, `status`) VALUES
(1, 'simbolonthomson10@gmail.com', '$2y$10$/9lXu7nlSi8Lud31cBZHHebylgP622Jn.8i7IXTwAc7', 'mahasiswa', 'aktif'),
(2, 'ruthmanullang01@gmail.com', '$2y$10$LwaHeNR3KrDQcCVOyRCd/.1VpojeSAP8/UQpDJxYCZe', 'mahasiswa', 'tidak aktif'),
(3, 'supriadi@gmail.com', '$2y$10$JulE.0m5Tv/U2PWSitAX1uCKW8.mMYy.dEDkqKFrXr0', 'pegawai', 'tidak aktif'),
(4, 'administator@gmail.com', '$2y$10$NgY.KErvrammaXidya6XJOIGpjAJvTCz1ePRS0IHGsN', 'admin', 'tidak aktif'),
(5, 'guntoro@gmail.com', '$2y$10$vk3iZnyx9lgHx3Wl8Vo59eMfwakEZ7xKu1XS8uXcZ2j', 'dosen', 'tidak aktif'),
(6, 'fajrizal@gmail.com', '$2y$10$V39iRIL34E89E/UReByCkuqO5uewUTUxKxQ/ZXD/NrQ', 'dosen', 'tidak aktif'),
(7, 'dulfianto@gmail.com', '$2y$10$elrxSAtvUEX9vJFzntdfSeLPZjqfq83Xjh0BeKK6Dt0', 'mahasiswa', 'tidak aktif'),
(8, 'fitohasibuan@gmail.com', '$2y$10$y4MPAPWissJIJ3IhgyNLA.veUnw.zXbBv1NWEUmBlF4', 'mahasiswa', 'tidak aktif'),
(9, 'taslim@gmail.com', '$2y$10$YallrLQzTlHSp5lNQDbfduDym6mITDPv0qrsLBPqU/j', 'dosen', 'tidak aktif'),
(10, 'rony1@gmail.com', '$2y$10$8cNEt3VKwiaIt2giSKMtzunjSJA8a2Uz5D5vuPQV4mS', 'mahasiswa', 'tidak aktif'),
(12, 'indra@gmail.com', '$2y$10$nMdeiPbKHYT9nSdq9EBwRuIZw.fOj6jk0KuOMJ2pwn7', 'mahasiswa', 'tidak aktif'),
(13, 'hendra0201@gmail.com', '$2y$10$I3jafIfKfQl1vmPqanPE9OkADHiOCUfYHQZrCNgqMat', 'mahasiswa', 'tidak aktif'),
(18, 'songaming770@gmail.com', '$2y$10$6r8H4BVJMEMNu6qM5MzzMO/TUsfcX35Vdtvdjmx3DM5', 'mahasiswa', 'tidak aktif'),
(20, 'jelyarta@gmail.com', '$2y$10$WvTB5TuJU5v1Hr9GtsKrCuukf0nwKZdiyN1rrHlw6yb', 'mahasiswa', 'tidak aktif'),
(23, 'ruben@gmail.com', '$2y$10$coWtYeLpXAQN971rZQGLE.v5.hzY7ey6TZvSrRfO7Rl', 'mahasiswa', 'tidak aktif'),
(24, 'rianto@gmail.com', '$2y$10$bnqFGRB5lYSYkOzBjyJllOfoFp4MUMykjJusf0XrI/b', 'dosen', 'tidak aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_forum`
--
ALTER TABLE `tb_forum`
  ADD PRIMARY KEY (`id_forum`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_pengetahuan`
--
ALTER TABLE `tb_pengetahuan`
  ADD PRIMARY KEY (`id_pengetahuan`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_forum`
--
ALTER TABLE `tb_forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_pengetahuan`
--
ALTER TABLE `tb_pengetahuan`
  MODIFY `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD CONSTRAINT `tb_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
