-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Sep 2023 pada 15.17
-- Versi server: 10.6.14-MariaDB-cll-lve
-- Versi PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `n1669549_simantridaru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `role` int(1) DEFAULT 2,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `role`, `email`, `password`) VALUES
(1, 'Meri', 1, 'admin@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO'),
(9, 'Bendahara', 2, 'bendahara@gmail.com', '$2y$10$5CnFAVo.fmwUomC6q5I6vOHaMlYUYRjxCyKSJ9DnXpMixONKYBv2.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `diskon_id` int(100) NOT NULL,
  `diskon_deskripsi` varchar(255) NOT NULL,
  `diskon_persentase` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`diskon_id`, `diskon_deskripsi`, `diskon_persentase`) VALUES
(1, 'Tanpa Potongan', 0),
(2, 'Keluarga Pengasuh', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`) VALUES
(1, 'MQ Tahsin'),
(2, 'MQ Tahfidz'),
(3, 'MQ Qur\'ani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `keterangan`) VALUES
(2, 'ND. ZAINI SY, S.Kom., S.Ak.', 'Verifikator'),
(4, 'INDI FADLUR ROHMAN, S.H.', 'Administrator Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama_wali` varchar(255) DEFAULT NULL,
  `nohp_wali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`id_santri`, `nama`, `nisn`, `email`, `password`, `id_kelas`, `nama_wali`, `nohp_wali`) VALUES
(7, 'Abdul Jalil', '0011223344', 'abduljalil@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Kuswandi', '085604619906'),
(8, 'Abdur Rahman Wahid', NULL, NULL, NULL, 2, 'Wahyudi', '08008008008'),
(9, 'Abdurrahman', NULL, NULL, NULL, 3, 'Tolak', '08008008008'),
(10, 'Amal Muttakin', NULL, NULL, NULL, 2, 'Atun', '08008008008'),
(11, 'Bagas Ardiansyah', NULL, NULL, NULL, 3, 'Ilzam', '08008008008'),
(12, 'Danil Bambang Irawan', NULL, NULL, NULL, 3, 'Bahruddin', '08008008008'),
(13, 'Denianto', NULL, NULL, NULL, 2, 'Abdullah', '08008008008'),
(14, 'Desfi Nur Kamar', NULL, NULL, NULL, 3, 'Ahmad Rido', '08008008008'),
(15, 'Ferdi Khoirur Rozikin', NULL, NULL, NULL, 1, 'Sutrisno', '08008008008'),
(16, 'Firdaus', NULL, NULL, NULL, 3, 'Hardi', '08008008008'),
(17, 'Givan Vallen Tino Heriyon', NULL, NULL, NULL, 2, 'Supriyadi', '08008008008'),
(18, 'Hairul Anwar', NULL, NULL, NULL, 3, 'Bayu', '08008008008'),
(19, 'Ilham Al Warid Dimas', NULL, NULL, NULL, 3, 'Taryono', '08008008008'),
(20, 'Indi Fadlur Rohman', NULL, NULL, NULL, 2, 'Supriyanto', '08008008008'),
(21, 'Indra Saputra Akbar', NULL, NULL, NULL, 1, 'Junaidi', '08008008008'),
(22, 'Khoirul Barizi', NULL, NULL, NULL, 3, 'Abdul Wafi', '08008008008'),
(23, 'Maulana Hajizi', NULL, NULL, NULL, 3, 'Hartono', '08008008008'),
(24, 'Mohammad Fikriatul Ghufron', NULL, NULL, NULL, 2, 'Badruddin', '08008008008'),
(25, 'Mohammad Syaiful Anwar', NULL, NULL, NULL, 3, 'Samsuddin', '08008008008'),
(26, 'Muhammad Basri', NULL, NULL, NULL, 3, 'Jamhuri', '08008008008'),
(27, 'Muhammad Fatan Arrafi', NULL, NULL, NULL, 2, 'Kadir', '08008008008'),
(28, 'Muhammad Herun Nur Rosid', NULL, NULL, NULL, 1, 'Mansur', '08008008008'),
(29, 'Muhammad Rizal', NULL, NULL, NULL, 3, 'Marzuki', '08008008008'),
(30, 'Muhammad Syafi\'i', NULL, NULL, NULL, 1, 'Adi Karisnawan', '08008008008'),
(31, 'Mulhi Ilham', NULL, NULL, NULL, 3, 'Suryanto', '08008008008'),
(32, 'Nailul Fikri', NULL, NULL, NULL, 2, 'Umam', '08008008008'),
(33, 'Nasrul Widati Putra', NULL, NULL, NULL, 3, 'daryana', '08008008008'),
(34, 'Ragil Nur Hamid', NULL, NULL, NULL, 3, 'Nuriedi', '08008008008'),
(35, 'Ramadhan Saputra', NULL, NULL, NULL, 3, 'ilham suryana', '08008008008'),
(36, 'Rizal Ghufron Hamdani', NULL, NULL, NULL, 2, 'Zainal Abidin', '08008008008'),
(37, 'Samsul Arifin', NULL, NULL, NULL, 3, 'sirojuddin', '08008008008'),
(38, 'Syaifur Rahman', NULL, NULL, NULL, 3, 'lala suhara', '08008008008'),
(39, 'Futuhal Arifin', NULL, NULL, NULL, 1, 'hendi issadiyanti', '08008008008'),
(40, 'Muhammad Alfin Nazhansyah', NULL, NULL, NULL, 1, 'Candra Adi', '08008008008'),
(41, 'Aindi Addayrobi', NULL, NULL, NULL, 3, 'ikhsan dirmansyah', '08008008008'),
(42, 'Muhammad Ilham', NULL, NULL, NULL, 2, 'ecep maman', '08008008008'),
(43, 'Ahmad Alvi', NULL, NULL, NULL, 2, 'rian andriansyah', '08008008008'),
(44, 'Pradista Baktiar', NULL, NULL, NULL, 2, 'Sukarno', '08008008008'),
(45, 'Rafi Ramunaf Fazli', NULL, NULL, NULL, 1, 'agus fahruddin', '08008008008'),
(46, 'Totok Santoso', NULL, NULL, NULL, 3, 'huyan mulyana', '08008008008'),
(47, 'Imron Saiful Bahri', NULL, NULL, NULL, 2, 'suharto abdullah', '08008008008'),
(48, 'Moh. Riko', NULL, NULL, NULL, 2, 'adi suparji', '08008008008'),
(49, 'Fadli', NULL, NULL, NULL, 3, 'alun bambang', '08008008008'),
(50, 'Firdaus Nur Ardiansyah', NULL, NULL, NULL, 2, 'rio gunawan', '08008008008'),
(51, 'Moh. Iqbal Amanah', NULL, NULL, NULL, 2, 'solihin darusmana', '08008008008'),
(52, 'Faidi Masruri', NULL, NULL, NULL, 3, 'dedi sumantri', '08008008008'),
(53, 'Miftahur Rohman', NULL, NULL, NULL, 1, 'masduki', '08008008008'),
(54, 'Wiranto', NULL, NULL, NULL, 2, 'saeful achmad', '08008008008'),
(55, 'Dimas Kamil', NULL, NULL, NULL, 3, 'abdul rokhim', '08008008008'),
(56, 'Anis Ghufron', NULL, NULL, NULL, 3, 'supendi', '08008008008'),
(57, 'Muhammad Sofil Wijdan', NULL, NULL, NULL, 2, 'andang', '08008008008'),
(58, 'Taufikurrahman', NULL, NULL, NULL, 2, 'heru purnomo', '08008008008'),
(59, 'Ahmad Zakariyah', NULL, NULL, NULL, 1, 'agus sofyan', '08008008008'),
(60, 'Zeinol Afandi', NULL, NULL, NULL, 3, 'achmad yudi', '08008008008'),
(61, 'Ahmad Romli', NULL, NULL, NULL, 3, 'sukarna', '08008008008'),
(62, 'Indra Lesmana', NULL, NULL, NULL, 2, 'dudung gumilar', '08008008008'),
(63, 'Irfan Muktashim Billah', NULL, NULL, NULL, 3, 'syukri nasution', '08008008008'),
(64, 'Amir Hidayat', NULL, NULL, NULL, 1, 'amin taufik', '08008008008'),
(65, 'Nurul Desta Arisandi', NULL, NULL, NULL, 3, 'yayan sukmana', '08008008008'),
(66, 'Miftahul Arifin', NULL, NULL, NULL, 2, 'Matharis Adi', '08008008008'),
(67, 'Ahmad Firdaus', NULL, NULL, NULL, 3, 'suparman', '08008008008'),
(68, 'Fatah Fajarul Huda', NULL, NULL, NULL, 3, 'Syamsiyadi', '08008008008'),
(69, 'Afqoryyin Hisan Septiansyah', NULL, NULL, NULL, 2, 'asep rojali', '08008008008'),
(70, 'Moh. Amin Kurniawan', NULL, NULL, NULL, 3, 'nurman', '08008008008'),
(71, 'Faizatul Khusnia', NULL, NULL, NULL, 2, 'hendra hermawan', '08008008008'),
(72, 'Fitrotun Nafisah', NULL, NULL, NULL, 2, 'muh hidayat', '08008008008'),
(73, 'Indana Zulfa', NULL, NULL, NULL, 3, 'zamroni pujo', '08008008008'),
(74, 'Jamilatul Hasanah', NULL, NULL, NULL, 1, 'zulkifli', '08008008008'),
(75, 'Khotimatul Warda', NULL, NULL, NULL, 1, 'Sugeng Puji', '08008008008'),
(76, 'Kikin Naflah', NULL, NULL, NULL, 3, 'arnadi arkan', '08008008008'),
(77, 'Muniro Agustia Ningsih', NULL, NULL, NULL, 3, 'parid hajri', '08008008008'),
(78, 'Niwati', NULL, NULL, NULL, 3, 'ujang dedi', '08008008008'),
(79, 'Novia Nur Azizah', NULL, NULL, NULL, 2, 'Samsurisno', '08008008008'),
(80, 'Nur Faise', NULL, NULL, NULL, 3, 'jaeni washap', '08008008008'),
(81, 'Puspita Sari', NULL, NULL, NULL, 1, 'firman bayu', '08008008008'),
(82, 'Rifatul Mukarromah', NULL, NULL, NULL, 3, 'jana sujana', '08008008008'),
(83, 'Rizka Shofia', NULL, NULL, NULL, 1, 'suryana mansur', '08008008008'),
(84, 'Safira Ainul Yaqin', NULL, NULL, NULL, 3, 'asep sutisna', '08008008008'),
(85, 'Siti Fauziah', NULL, NULL, NULL, 2, 'rastoyo', '08008008008'),
(86, 'Siti Khodijah', NULL, NULL, NULL, 1, 'riswandi', '08008008008'),
(87, 'Siti Nur Aisyah', NULL, NULL, NULL, 2, 'iwan kosasi', '08008008008'),
(88, 'Siti Nur Kamilatul M', NULL, NULL, NULL, 1, 'hakim damanik', '08008008008'),
(89, 'Siti Romiliyah', NULL, NULL, NULL, 3, 'dani mulyadi', '08008008008'),
(90, 'Sulistia Putri', NULL, NULL, NULL, 1, 'bunyamin', '08008008008'),
(91, 'Tazkiyatul Laili', NULL, NULL, NULL, 2, 'Karyoto', '08008008008'),
(92, 'Tolak Italia', NULL, NULL, NULL, 1, 'Sulhaedi', '08008008008'),
(93, 'Wilda Maulida', NULL, NULL, NULL, 3, 'Ari Setiawan', '08008008008'),
(94, 'Aizzatut tafqiroh', NULL, NULL, NULL, 2, 'umar hamzah', '08008008008'),
(95, 'Alfira Faradiba', NULL, NULL, NULL, 2, 'Sunarwadi', '08008008008'),
(96, 'Alifah Mabruroh', NULL, NULL, NULL, 1, 'yedi arisman', '08008008008'),
(97, 'Apriliyanti Dwi Putri', NULL, NULL, NULL, 1, 'rahman awaluddin', '08008008008'),
(98, 'Athiya Ramadhani', NULL, NULL, NULL, 2, 'Ghazali', '08008008008'),
(99, 'Atiqoh Maulidia', NULL, NULL, NULL, 2, 'Agustiono', '08008008008'),
(100, 'Atiyatul Mubarokah', NULL, NULL, NULL, 2, 'mustar', '08008008008'),
(101, 'Ayu Riski Ramadhani', NULL, NULL, NULL, 1, 'Heru Purnomo', '08008008008'),
(102, 'Citra Natalia', NULL, NULL, NULL, 1, 'Sanhaji', '08008008008'),
(103, 'Deviyana Putri', NULL, NULL, NULL, 2, 'Zeinor Ridho', '08008008008'),
(104, 'Dini Kholidia', NULL, NULL, NULL, 2, 'Tolak Sunarso', '08008008008'),
(105, 'Fitriatul Hasanah', NULL, NULL, NULL, 3, 'asep mulyana', '08008008008'),
(106, 'Humairoh', NULL, NULL, NULL, 2, 'Faishol', '08008008008'),
(107, 'Juliyatin', NULL, NULL, NULL, 2, 'sukidi', '08008008008'),
(108, 'Karunia Hidayanti', NULL, NULL, NULL, 3, 'eko warseno', '08008008008'),
(109, 'Lailatul Mukarromah', NULL, NULL, NULL, 1, 'Rahmat', '08008008008'),
(110, 'Munzilatul Aflaha', NULL, NULL, NULL, 2, 'dedi junaini', '08008008008'),
(111, 'Nia Ramadhani', NULL, NULL, NULL, 2, 'ramadhan', '08008008008'),
(112, 'Niro Auliyah', NULL, NULL, NULL, 3, 'aep fahrudin', '08008008008'),
(113, 'Niswatul Laili', NULL, NULL, NULL, 1, 'Sunoto', '08008008008'),
(114, 'Nova Selfi Wantika', NULL, NULL, NULL, 3, 'yusriyanto', '08008008008'),
(115, 'Rosa Umama', NULL, NULL, NULL, 3, 'suhendar', '08008008008'),
(116, 'Sahila', NULL, NULL, NULL, 1, 'rohendri', '08008008008'),
(117, 'Saniwa', NULL, NULL, NULL, 3, 'sujana', '08008008008'),
(118, 'Satuni', NULL, NULL, NULL, 2, 'mujiono', '08008008008'),
(119, 'Siti Yumna', NULL, NULL, NULL, 3, 'helmi tahlim', '08008008008'),
(120, 'Suci Ramadhani', NULL, NULL, NULL, 2, 'karsono', '08008008008'),
(121, 'Sulistiyowati', NULL, NULL, NULL, 1, 'Budianto', '08008008008'),
(122, 'Warda Yunita Ningsih', NULL, NULL, NULL, 3, 'ari suryanata', '08008008008'),
(123, 'Wiqayatun Najaha', NULL, NULL, NULL, 1, 'agus salim', '08008008008'),
(124, 'Zinatul Hayat', NULL, NULL, NULL, 2, 'Rahman', '08008008008'),
(125, 'Isnainil Maughfiroh', NULL, NULL, NULL, 3, 'toyib usman', '08008008008'),
(126, 'Siti Yulinda', NULL, NULL, NULL, 1, 'andi sukirno', '08008008008'),
(127, 'Sofiyatul Hasanah', NULL, NULL, NULL, 2, 'kartono', '08008008008'),
(128, 'Novita Sari Putri', NULL, NULL, NULL, 1, 'zul fahmi', '08008008008'),
(129, 'Durrotun Nafisa', NULL, NULL, NULL, 3, 'budi sudrajat', '08008008008'),
(130, 'Syafa Indawati', NULL, NULL, NULL, 2, 'Ramadhan', '08008008008'),
(131, 'Yunita Nurul Fajriyah', NULL, NULL, NULL, 3, 'Jamsuri', '08008008008'),
(132, 'Siti Nur Hasanah', NULL, NULL, NULL, 1, 'Hermanto', '08008008008'),
(133, 'Siti Maryam', NULL, NULL, NULL, 1, 'Badruddin', '08008008008'),
(134, 'Desti Yuliana', NULL, NULL, NULL, 1, 'Wahyu Agung', '08008008008'),
(135, 'Devi Zahroh', NULL, NULL, NULL, 3, 'Wildani', '08008008008'),
(136, 'Riski Amelia', NULL, NULL, NULL, 3, 'Muhlisin', '08008008008'),
(137, 'Zayyinatut Tadzkiroh', NULL, NULL, NULL, 1, 'Yanto', '08008008008'),
(138, 'Chika Aprilita Zulkarnaen', NULL, NULL, NULL, 3, 'Heri', '08008008008'),
(139, 'Belgis Durrotul Arriqo', NULL, NULL, NULL, 2, 'Misrani', '08008008008'),
(140, 'Idia Harmida Utama', NULL, NULL, NULL, 3, 'Misnawi', '08008008008'),
(141, 'Kaefiyatul Aeliyah', NULL, NULL, NULL, 2, 'Suwono', '08008008008'),
(142, 'Dewi Sinta', NULL, NULL, NULL, 3, 'Karsono', '08008008008'),
(143, 'Siti Nur Maulida', NULL, NULL, NULL, 3, 'Harianto', '08008008008'),
(144, 'Safira', NULL, NULL, NULL, 1, 'Misdam', '08008008008'),
(145, 'Wardatul Hasanah', NULL, NULL, NULL, 2, 'Junaidi', '08008008008'),
(146, 'Meri', NULL, NULL, NULL, 3, 'Ayah Meri', '+62 856-0461-9906'),
(147, 'Fathony', NULL, NULL, NULL, 1, 'Fathony Bapak', '0895337337339'),
(148, 'Putri', NULL, NULL, NULL, 1, 'AyahPutri', '083831720603');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `akte_notaris` varchar(255) DEFAULT NULL,
  `sk_menkumham` varchar(255) DEFAULT NULL,
  `piagam_kandepag` varchar(255) DEFAULT NULL,
  `no_statistik` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama`, `alamat`, `no_hp`, `akte_notaris`, `sk_menkumham`, `piagam_kandepag`, `no_statistik`, `email`, `facebook`, `instagram`, `twitter`) VALUES
(1, 'PONDOK PESANTREN NURUL IMAN', 'Jalan PP Nurul Iman No 01 Seletreng Kapongan Situbondo Jawa Timur Indonesia 68362', '(0338) 3958585 / 5509636', 'Muhammad Yusuf Ibrahim, S.H., M.Kn. No. 01', 'AHU-0015607.AH.01.04. Tahun 2015', 'KW.13.5/02/PP.00.7/224/2004', '512 351 211 064', 'ppnuruliman@yahoo.com', 'https://www.facebook.com/ppnuruliman', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(20) NOT NULL,
  `id_order` varchar(30) NOT NULL,
  `status_transaksi` varchar(5) NOT NULL,
  `id_diskon` int(10) DEFAULT NULL,
  `id_santri` int(11) NOT NULL,
  `id_transaksi_detail` int(11) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `b1` varchar(10) DEFAULT '0',
  `b2` varchar(10) DEFAULT '0',
  `b3` varchar(10) DEFAULT '0',
  `b4` varchar(10) DEFAULT '0',
  `b5` varchar(10) DEFAULT '0',
  `b6` varchar(10) DEFAULT '0',
  `nominal` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_order`, `status_transaksi`, `id_diskon`, `id_santri`, `id_transaksi_detail`, `tanggal_transaksi`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `nominal`) VALUES
(199, '4E612JXZ3R', '1', 2, 147, 9, '2023-09-05 06:52:22', '243000', '243000', '243000', '243000', '110000', '', '1458000'),
(200, 'EZN1KXYQ67', '1', 1, 10, 9, '2023-09-04 12:05:19', '100000', '', '', '', '', '', '1620000'),
(201, 'JHA8UIGOKN', '1', 1, 10, 9, '2023-09-04 12:07:35', '100000', '', '', '', '', '', '1620000'),
(202, '9X1GF6WT3E', '1', 1, 147, 11, '2023-09-05 06:41:50', '120000', '', '', '', '', '', '2550000'),
(203, 'KV5PNBEYGD', '1', 1, 147, 9, '2023-09-05 06:42:12', '135000', '', '', '', '', '', '1620000'),
(204, 'NX8UEKPF0Z', '1', 1, 147, 11, '2023-09-05 06:43:01', '145000', '', '', '', '', '', '2550000'),
(206, 'P4LN2MT5WH', '1', 1, 136, 9, '2023-09-07 07:03:07', '150000', '', '', '', '', '', '1620000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `tagihan` int(100) DEFAULT 0,
  `semester` int(1) DEFAULT NULL,
  `tahun_pelajaran` varchar(255) DEFAULT '0',
  `file_rincian_tagihan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `tagihan`, `semester`, `tahun_pelajaran`, `file_rincian_tagihan`) VALUES
(9, 1620000, 1, '2023/2024', 'RincianTagihanTapel20232024Sems1.pdf'),
(11, 2550000, 2, '2024/2025', NULL),
(12, 2000000, 1, '2025/2026', 'RincianTagihanTapel20252026Sems1.pdf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`diskon_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`),
  ADD KEY `id_class` (`id_kelas`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_siswa` (`id_santri`),
  ADD KEY `transaksi_ibfk_2` (`id_transaksi_detail`),
  ADD KEY `transaksi_ibfk_3` (`id_diskon`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `diskon_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD CONSTRAINT `santri_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `santri` (`id_santri`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_transaksi_detail`) REFERENCES `transaksi_detail` (`id_transaksi_detail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_diskon`) REFERENCES `diskon` (`diskon_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
