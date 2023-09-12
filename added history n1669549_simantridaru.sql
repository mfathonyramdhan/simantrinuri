-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Sep 2023 pada 01.35
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nohp_wali` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`id_santri`, `nama`, `nisn`, `email`, `password`, `id_kelas`, `nama_wali`, `nohp_wali`) VALUES
(7, 'Abdul Jalil', '9638761635', 'abduljalil@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Kuswandi', '0895337337339'),
(8, 'Abdur Rahman Wahid', '5846706056', 'abdurrahmanwahid@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Wahyudi', '08008008008'),
(9, 'Abdurrahman', '0317245684', 'abdurrahman@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Tolak', '08008008008'),
(10, 'Amal Muttakin', '4046110561', 'amalmuttakin@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Atun', '08008008008'),
(11, 'Bagas Ardiansyah', '9278816058', 'bagasardiansyah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Ilzam', '08008008008'),
(12, 'Danil Bambang Irawan', '4255748916', 'danilbambangirawan@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Bahruddin', '08008008008'),
(13, 'Denianto', '3442296714', 'denianto@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Abdullah', '08008008008'),
(14, 'Desfi Nur Kamar', '4444237132', 'desfinurkamar@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Ahmad Rido', '08008008008'),
(15, 'Ferdi Khoirur Rozikin', '1894295822', 'ferdikhoirurrozikin@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Sutrisno', '08008008008'),
(16, 'Firdaus', '6138768024', 'firdaus@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Hardi', '08008008008'),
(17, 'Givan Vallen Tino Heriyon', '5010952963', 'givanvallentinoheriyon@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Supriyadi', '08008008008'),
(18, 'Hairul Anwar', '6638461050', 'hairulanwar@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Bayu', '08008008008'),
(19, 'Ilham Al Warid Dimas', '8159446668', 'ilhamalwariddimas@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Taryono', '08008008008'),
(20, 'Indi Fadlur Rohman', '0881850496', 'indifadlurrohman@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Supriyanto', '08008008008'),
(21, 'Indra Saputra Akbar', '9930912787', 'indrasaputraakbar@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Junaidi', '08008008008'),
(22, 'Khoirul Barizi', '7009012752', 'khoirulbarizi@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Abdul Wafi', '08008008008'),
(23, 'Maulana Hajizi', '5252325707', 'maulanahajizi@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Hartono', '08008008008'),
(24, 'Mohammad Fikriatul Ghufron', '5234590587', 'mohammadfikriatulghufron@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Badruddin', '08008008008'),
(25, 'Mohammad Syaiful Anwar', '0415976122', 'mohammadsyaifulanwar@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Samsuddin', '08008008008'),
(26, 'Muhammad Basri', '6376109157', 'muhammadbasri@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Jamhuri', '08008008008'),
(27, 'Muhammad Fatan Arrafi', '0632617725', 'muhammadfatanarrafi@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Kadir', '08008008008'),
(28, 'Muhammad Herun Nur Rosid', '4034761464', 'muhammadherunnurrosid@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Mansur', '08008008008'),
(29, 'Muhammad Rizal', '8275954451', 'muhammadrizal@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Marzuki', '08008008008'),
(30, 'Muhammad Syafi\'i', '9275488172', 'muhammadsyafi\'i@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Adi Karisnawan', '08008008008'),
(31, 'Mulhi Ilham', '1549577816', 'mulhiilham@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Suryanto', '08008008008'),
(32, 'Nailul Fikri', '9921424873', 'nailulfikri@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Umam', '08008008008'),
(33, 'Nasrul Widati Putra', '4958391222', 'nasrulwidatiputra@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'daryana', '08008008008'),
(34, 'Ragil Nur Hamid', '5027681798', 'ragilnurhamid@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Nuriedi', '08008008008'),
(35, 'Ramadhan Saputra', '0263235634', 'ramadhansaputra@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'ilham suryana', '08008008008'),
(36, 'Rizal Ghufron Hamdani', '6233133083', 'rizalghufronhamdani@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Zainal Abidin', '08008008008'),
(37, 'Samsul Arifin', '0375958821', 'samsularifin@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'sirojuddin', '08008008008'),
(38, 'Syaifur Rahman', '3180395162', 'syaifurrahman@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'lala suhara', '08008008008'),
(39, 'Futuhal Arifin', '4774099658', 'futuhalarifin@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'hendi issadiyanti', '08008008008'),
(40, 'Muhammad Alfin Nazhansyah', '4329313109', 'muhammadalfinnazhansyah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Candra Adi', '08008008008'),
(41, 'Aindi Addayrobi', '7324266878', 'aindiaddayrobi@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'ikhsan dirmansyah', '08008008008'),
(42, 'Muhammad Ilham', '3633395371', 'muhammadilham@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'ecep maman', '08008008008'),
(43, 'Ahmad Alvi', '6194176530', 'ahmadalvi@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'rian andriansyah', '08008008008'),
(44, 'Pradista Baktiar', '0070696845', 'pradistabaktiar@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Sukarno', '08008008008'),
(45, 'Rafi Ramunaf Fazli', '1770954943', 'rafiramunaffazli@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'agus fahruddin', '08008008008'),
(46, 'Totok Santoso', '8642684490', 'totoksantoso@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'huyan mulyana', '08008008008'),
(47, 'Imron Saiful Bahri', '7900557925', 'imronsaifulbahri@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'suharto abdullah', '08008008008'),
(48, 'Moh. Riko', '3574736466', 'moh.riko@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'adi suparji', '08008008008'),
(49, 'Fadli', '4172008861', 'fadli@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'alun bambang', '08008008008'),
(50, 'Firdaus Nur Ardiansyah', '0135835213', 'firdausnurardiansyah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'rio gunawan', '08008008008'),
(51, 'Moh. Iqbal Amanah', '8163149792', 'moh.iqbalamanah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'solihin darusmana', '08008008008'),
(52, 'Faidi Masruri', '0408243630', 'faidimasruri@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'dedi sumantri', '08008008008'),
(53, 'Miftahur Rohman', '7551769081', 'miftahurrohman@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'masduki', '08008008008'),
(54, 'Wiranto', '6534114821', 'wiranto@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'saeful achmad', '08008008008'),
(55, 'Dimas Kamil', '0015267170', 'dimaskamil@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'abdul rokhim', '08008008008'),
(56, 'Anis Ghufron', '0473991698', 'anisghufron@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'supendi', '08008008008'),
(57, 'Muhammad Sofil Wijdan', '2324157284', 'muhammadsofilwijdan@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'andang', '08008008008'),
(58, 'Taufikurrahman', '0198811637', 'taufikurrahman@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'heru purnomo', '08008008008'),
(59, 'Ahmad Zakariyah', '4021586639', 'ahmadzakariyah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'agus sofyan', '08008008008'),
(60, 'Zeinol Afandi', '9511498594', 'zeinolafandi@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'achmad yudi', '08008008008'),
(61, 'Ahmad Romli', '5492733358', 'ahmadromli@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'sukarna', '08008008008'),
(62, 'Indra Lesmana', '8929171319', 'indralesmana@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'dudung gumilar', '08008008008'),
(63, 'Irfan Muktashim Billah', '8167656826', 'irfanmuktashimbillah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'syukri nasution', '08008008008'),
(64, 'Amir Hidayat', '4050770480', 'amirhidayat@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'amin taufik', '08008008008'),
(65, 'Nurul Desta Arisandi', '5750882230', 'nuruldestaarisandi@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'yayan sukmana', '08008008008'),
(66, 'Miftahul Arifin', '6602100018', 'miftahularifin@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Matharis Adi', '08008008008'),
(67, 'Ahmad Firdaus', '5757853710', 'ahmadfirdaus@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'suparman', '08008008008'),
(68, 'Fatah Fajarul Huda', '8982968804', 'fatahfajarulhuda@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Syamsiyadi', '08008008008'),
(69, 'Afqoryyin Hisan Septiansyah', '7641283196', 'afqoryyinhisanseptiansyah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'asep rojali', '08008008008'),
(70, 'Moh. Amin Kurniawan', '1257509879', 'moh.aminkurniawan@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'nurman', '08008008008'),
(71, 'Faizatul Khusnia', '3363700111', 'faizatulkhusnia@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'hendra hermawan', '08008008008'),
(72, 'Fitrotun Nafisah', '3045971228', 'fitrotunnafisah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'muh hidayat', '08008008008'),
(73, 'Indana Zulfa', '5138756116', 'indanazulfa@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'zamroni pujo', '08008008008'),
(74, 'Jamilatul Hasanah', '6555867201', 'jamilatulhasanah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'zulkifli', '08008008008'),
(75, 'Khotimatul Warda', '7363067965', 'khotimatulwarda@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Sugeng Puji', '08008008008'),
(76, 'Kikin Naflah', '7147738530', 'kikinnaflah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'arnadi arkan', '08008008008'),
(77, 'Muniro Agustia Ningsih', '3649489063', 'muniroagustianingsih@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'parid hajri', '08008008008'),
(78, 'Niwati', '6804230033', 'niwati@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'ujang dedi', '08008008008'),
(79, 'Novia Nur Azizah', '3072683283', 'novianurazizah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Samsurisno', '08008008008'),
(80, 'Nur Faise', '4950726623', 'nurfaise@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'jaeni washap', '08008008008'),
(81, 'Puspita Sari', '5535583575', 'puspitasari@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'firman bayu', '08008008008'),
(82, 'Rifatul Mukarromah', '2825738315', 'rifatulmukarromah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'jana sujana', '08008008008'),
(83, 'Rizka Shofia', '7521941156', 'rizkashofia@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'suryana mansur', '08008008008'),
(84, 'Safira Ainul Yaqin', '9132491144', 'safiraainulyaqin@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'asep sutisna', '08008008008'),
(85, 'Siti Fauziah', '3096632559', 'sitifauziah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'rastoyo', '08008008008'),
(86, 'Siti Khodijah', '8085689673', 'sitikhodijah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'riswandi', '08008008008'),
(87, 'Siti Nur Aisyah', '1138550994', 'sitinuraisyah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'iwan kosasi', '08008008008'),
(88, 'Siti Nur Kamilatul M', '1435686258', 'sitinurkamilatulm@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'hakim damanik', '08008008008'),
(89, 'Siti Romiliyah', '3762778615', 'sitiromiliyah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'dani mulyadi', '08008008008'),
(90, 'Sulistia Putri', '4506834609', 'sulistiaputri@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'bunyamin', '08008008008'),
(91, 'Tazkiyatul Laili', '1245837510', 'tazkiyatullaili@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Karyoto', '08008008008'),
(92, 'Tolak Italia', '2708684031', 'tolakitalia@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Sulhaedi', '08008008008'),
(93, 'Wilda Maulida', '9805907932', 'wildamaulida@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Ari Setiawan', '08008008008'),
(94, 'Aizzatut tafqiroh', '0903487876', 'aizzatuttafqiroh@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'umar hamzah', '08008008008'),
(95, 'Alfira Faradiba', '5099715893', 'alfirafaradiba@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Sunarwadi', '08008008008'),
(96, 'Alifah Mabruroh', '2788116142', 'alifahmabruroh@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'yedi arisman', '08008008008'),
(97, 'Apriliyanti Dwi Putri', '8641433342', 'apriliyantidwiputri@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'rahman awaluddin', '08008008008'),
(98, 'Athiya Ramadhani', '4842818588', 'athiyaramadhani@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Ghazali', '08008008008'),
(99, 'Atiqoh Maulidia', '8289793225', 'atiqohmaulidia@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Agustiono', '08008008008'),
(100, 'Atiyatul Mubarokah', '6920510667', 'atiyatulmubarokah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'mustar', '08008008008'),
(101, 'Ayu Riski Ramadhani', '9733173968', 'ayuriskiramadhani@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Heru Purnomo', '08008008008'),
(102, 'Citra Natalia', '7904338145', 'citranatalia@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Sanhaji', '08008008008'),
(103, 'Deviyana Putri', '0322169130', 'deviyanaputri@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Zeinor Ridho', '08008008008'),
(104, 'Dini Kholidia', '7897831525', 'dinikholidia@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Tolak Sunarso', '08008008008'),
(105, 'Fitriatul Hasanah', '8522650542', 'fitriatulhasanah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'asep mulyana', '08008008008'),
(106, 'Humairoh', '8919758441', 'humairoh@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Faishol', '08008008008'),
(107, 'Juliyatin', '9030840889', 'juliyatin@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'sukidi', '08008008008'),
(108, 'Karunia Hidayanti', '8394929429', 'karuniahidayanti@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'eko warseno', '08008008008'),
(109, 'Lailatul Mukarromah', '4882124788', 'lailatulmukarromah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Rahmat', '08008008008'),
(110, 'Munzilatul Aflaha', '9225835957', 'munzilatulaflaha@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'dedi junaini', '08008008008'),
(111, 'Nia Ramadhani', '1482805732', 'niaramadhani@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'ramadhan', '08008008008'),
(112, 'Niro Auliyah', '9736521094', 'niroauliyah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'aep fahrudin', '08008008008'),
(113, 'Niswatul Laili', '4234188584', 'niswatullaili@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Sunoto', '08008008008'),
(114, 'Nova Selfi Wantika', '1961379947', 'novaselfiwantika@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'yusriyanto', '08008008008'),
(115, 'Rosa Umama', '7104334288', 'rosaumama@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'suhendar', '08008008008'),
(116, 'Sahila', '9637531907', 'sahila@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'rohendri', '08008008008'),
(117, 'Saniwa', '6874656981', 'saniwa@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'sujana', '08008008008'),
(118, 'Satuni', '5460689492', 'satuni@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'mujiono', '08008008008'),
(119, 'Siti Yumna', '6679476822', 'sitiyumna@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'helmi tahlim', '08008008008'),
(120, 'Suci Ramadhani', '7015315943', 'suciramadhani@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'karsono', '08008008008'),
(121, 'Sulistiyowati', '5038149557', 'sulistiyowati@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Budianto', '08008008008'),
(122, 'Warda Yunita Ningsih', '4144800262', 'wardayunitaningsih@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'ari suryanata', '08008008008'),
(123, 'Wiqayatun Najaha', '5609552949', 'wiqayatunnajaha@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'agus salim', '08008008008'),
(124, 'Zinatul Hayat', '5613364265', 'zinatulhayat@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Rahman', '08008008008'),
(125, 'Isnainil Maughfiroh', '1238162788', 'isnainilmaughfiroh@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'toyib usman', '08008008008'),
(126, 'Siti Yulinda', '9350721453', 'sitiyulinda@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'andi sukirno', '08008008008'),
(127, 'Sofiyatul Hasanah', '3039119209', 'sofiyatulhasanah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'kartono', '08008008008'),
(128, 'Novita Sari Putri', '7143431992', 'novitasariputri@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'zul fahmi', '08008008008'),
(129, 'Durrotun Nafisa', '6599802641', 'durrotunnafisa@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'budi sudrajat', '08008008008'),
(130, 'Syafa Indawati', '1568717538', 'syafaindawati@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Ramadhan', '08008008008'),
(131, 'Yunita Nurul Fajriyah', '8044180076', 'yunitanurulfajriyah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Jamsuri', '08008008008'),
(132, 'Siti Nur Hasanah', '5514748073', 'sitinurhasanah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Hermanto', '08008008008'),
(133, 'Siti Maryam', '3441200445', 'sitimaryam@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Badruddin', '08008008008'),
(134, 'Desti Yuliana', '0661758315', 'destiyuliana@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Wahyu Agung', '08008008008'),
(135, 'Devi Zahroh', '2985190547', 'devizahroh@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Wildani', '08008008008'),
(136, 'Riski Amelia', '2940678096', 'riskiamelia@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Muhlisin', '08008008008'),
(137, 'Zayyinatut Tadzkiroh', '5747819147', 'zayyinatuttadzkiroh@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Yanto', '08008008008'),
(138, 'Chika Aprilita Zulkarnaen', '9917061757', 'chikaaprilitazulkarnaen@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Heri', '08008008008'),
(139, 'Belgis Durrotul Arriqo', '2341851650', 'belgisdurrotularriqo@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Misrani', '08008008008'),
(140, 'Idia Harmida Utama', '1958073286', 'idiaharmidautama@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Misnawi', '08008008008'),
(141, 'Kaefiyatul Aeliyah', '2764811788', 'kaefiyatulaeliyah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Suwono', '08008008008'),
(142, 'Dewi Sinta', '7949839390', 'dewisinta@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Karsono', '08008008008'),
(143, 'Siti Nur Maulida', '1454761895', 'sitinurmaulida@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Harianto', '08008008008'),
(144, 'Safira', '3424291613', 'safira@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Misdam', '08008008008'),
(145, 'Wardatul Hasanah', '2757172689', 'wardatulhasanah@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 2, 'Junaidi', '08008008008'),
(146, 'Meri', '3512988913', 'meri@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 3, 'Ayah Meri', '+62 856-0461-'),
(147, 'Fathony', '9293426805', 'fathony@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'Fathony Bapak', '0895337337339'),
(148, 'Putri', '5928167594', 'putri@gmail.com', '$2y$10$1G8xa/VKxycjqFMvYfJL0uSC4ZDNTqFj20ueQ50Z0z.qIYB53G2eO', 1, 'AyahPutri', '083831720603');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_transaksi_detail` int(11) NOT NULL,
  `id_diskon` int(10) DEFAULT NULL,
  `nisn_santri` varchar(10) DEFAULT '0',
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `tagihan` int(10) DEFAULT 0,
  `terbayar` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_order`, `id_transaksi_detail`, `id_diskon`, `nisn_santri`, `tanggal_transaksi`, `tagihan`, `terbayar`) VALUES
(1, '23242S9638761635', 0, 2, '9638761635', '2023-09-10 07:17:00', 3750000, 275000),
(2, '23242S5846706056', 0, 1, '5846706056', '2023-09-10 07:17:00', 3750000, 0),
(3, '23242S0317245684', 0, 1, '0317245684', '2023-09-10 07:17:00', 3750000, 0),
(4, '23242S4046110561', 0, 1, '4046110561', '2023-09-10 07:17:00', 3750000, 0),
(5, '23242S9278816058', 0, 1, '9278816058', '2023-09-10 07:17:00', 3750000, 0),
(6, '23242S4255748916', 0, 1, '4255748916', '2023-09-10 07:17:00', 3750000, 0),
(7, '23242S3442296714', 0, 1, '3442296714', '2023-09-10 07:17:00', 3750000, 0),
(8, '23242S4444237132', 0, 1, '4444237132', '2023-09-10 07:17:00', 3750000, 0),
(9, '23242S1894295822', 0, 1, '1894295822', '2023-09-10 07:17:00', 3750000, 0),
(10, '23242S6138768024', 0, 1, '6138768024', '2023-09-10 07:17:00', 3750000, 0),
(11, '23242S5010952963', 0, 1, '5010952963', '2023-09-10 07:17:00', 3750000, 0),
(12, '23242S6638461050', 0, 1, '6638461050', '2023-09-10 07:17:00', 3750000, 0),
(13, '23242S8159446668', 0, 1, '8159446668', '2023-09-10 07:17:00', 3750000, 0),
(14, '23242S0881850496', 0, 1, '0881850496', '2023-09-10 07:17:00', 3750000, 0),
(15, '23242S9930912787', 0, 1, '9930912787', '2023-09-10 07:17:00', 3750000, 0),
(16, '23242S7009012752', 0, 1, '7009012752', '2023-09-10 07:17:00', 3750000, 0),
(17, '23242S5252325707', 0, 1, '5252325707', '2023-09-10 07:17:00', 3750000, 0),
(18, '23242S5234590587', 0, 1, '5234590587', '2023-09-10 07:17:00', 3750000, 0),
(19, '23242S0415976122', 0, 1, '0415976122', '2023-09-10 07:17:00', 3750000, 0),
(20, '23242S6376109157', 0, 1, '6376109157', '2023-09-10 07:17:00', 3750000, 0),
(21, '23242S0632617725', 0, 1, '0632617725', '2023-09-10 07:17:00', 3750000, 0),
(22, '23242S4034761464', 0, 1, '4034761464', '2023-09-10 07:17:00', 3750000, 0),
(23, '23242S8275954451', 0, 1, '8275954451', '2023-09-10 07:17:00', 3750000, 0),
(24, '23242S9275488172', 0, 1, '9275488172', '2023-09-10 07:17:00', 3750000, 0),
(25, '23242S1549577816', 0, 1, '1549577816', '2023-09-10 07:17:00', 3750000, 0),
(26, '23242S9921424873', 0, 1, '9921424873', '2023-09-10 07:17:00', 3750000, 0),
(27, '23242S4958391222', 0, 1, '4958391222', '2023-09-10 07:17:00', 3750000, 0),
(28, '23242S5027681798', 0, 1, '5027681798', '2023-09-10 07:17:00', 3750000, 0),
(29, '23242S0263235634', 0, 1, '0263235634', '2023-09-10 07:17:00', 3750000, 0),
(30, '23242S6233133083', 0, 1, '6233133083', '2023-09-10 07:17:00', 3750000, 0),
(31, '23242S0375958821', 0, 1, '0375958821', '2023-09-10 07:17:00', 3750000, 0),
(32, '23242S3180395162', 0, 1, '3180395162', '2023-09-10 07:17:00', 3750000, 0),
(33, '23242S4774099658', 0, 1, '4774099658', '2023-09-10 07:17:00', 3750000, 0),
(34, '23242S4329313109', 0, 1, '4329313109', '2023-09-10 07:17:00', 3750000, 0),
(35, '23242S7324266878', 0, 1, '7324266878', '2023-09-10 07:17:00', 3750000, 0),
(36, '23242S3633395371', 0, 1, '3633395371', '2023-09-10 07:17:00', 3750000, 0),
(37, '23242S6194176530', 0, 1, '6194176530', '2023-09-10 07:17:00', 3750000, 0),
(38, '23242S0070696845', 0, 1, '0070696845', '2023-09-10 07:17:00', 3750000, 0),
(39, '23242S1770954943', 0, 1, '1770954943', '2023-09-10 07:17:00', 3750000, 0),
(40, '23242S8642684490', 0, 1, '8642684490', '2023-09-10 07:17:00', 3750000, 0),
(41, '23242S7900557925', 0, 1, '7900557925', '2023-09-10 07:17:00', 3750000, 0),
(42, '23242S3574736466', 0, 1, '3574736466', '2023-09-10 07:17:00', 3750000, 0),
(43, '23242S4172008861', 0, 1, '4172008861', '2023-09-10 07:17:00', 3750000, 0),
(44, '23242S0135835213', 0, 1, '0135835213', '2023-09-10 07:17:00', 3750000, 0),
(45, '23242S8163149792', 0, 1, '8163149792', '2023-09-10 07:17:00', 3750000, 0),
(46, '23242S0408243630', 0, 1, '0408243630', '2023-09-10 07:17:00', 3750000, 0),
(47, '23242S7551769081', 0, 1, '7551769081', '2023-09-10 07:17:00', 3750000, 0),
(48, '23242S6534114821', 0, 1, '6534114821', '2023-09-10 07:17:00', 3750000, 0),
(49, '23242S0015267170', 0, 1, '0015267170', '2023-09-10 07:17:00', 3750000, 0),
(50, '23242S0473991698', 0, 1, '0473991698', '2023-09-10 07:17:00', 3750000, 0),
(51, '23242S2324157284', 0, 1, '2324157284', '2023-09-10 07:17:00', 3750000, 0),
(52, '23242S0198811637', 0, 1, '0198811637', '2023-09-10 07:17:00', 3750000, 0),
(53, '23242S4021586639', 0, 1, '4021586639', '2023-09-10 07:17:00', 3750000, 0),
(54, '23242S9511498594', 0, 1, '9511498594', '2023-09-10 07:17:00', 3750000, 0),
(55, '23242S5492733358', 0, 1, '5492733358', '2023-09-10 07:17:00', 3750000, 0),
(56, '23242S8929171319', 0, 1, '8929171319', '2023-09-10 07:17:00', 3750000, 0),
(57, '23242S8167656826', 0, 1, '8167656826', '2023-09-10 07:17:00', 3750000, 0),
(58, '23242S4050770480', 0, 1, '4050770480', '2023-09-10 07:17:00', 3750000, 0),
(59, '23242S5750882230', 0, 1, '5750882230', '2023-09-10 07:17:00', 3750000, 0),
(60, '23242S6602100018', 0, 1, '6602100018', '2023-09-10 07:17:00', 3750000, 0),
(61, '23242S5757853710', 0, 1, '5757853710', '2023-09-10 07:17:00', 3750000, 0),
(62, '23242S8982968804', 0, 1, '8982968804', '2023-09-10 07:17:00', 3750000, 0),
(63, '23242S7641283196', 0, 1, '7641283196', '2023-09-10 07:17:00', 3750000, 0),
(64, '23242S1257509879', 0, 1, '1257509879', '2023-09-10 07:17:00', 3750000, 0),
(65, '23242S3363700111', 0, 1, '3363700111', '2023-09-10 07:17:00', 3750000, 0),
(66, '23242S3045971228', 0, 1, '3045971228', '2023-09-10 07:17:00', 3750000, 0),
(67, '23242S5138756116', 0, 1, '5138756116', '2023-09-10 07:17:00', 3750000, 0),
(68, '23242S6555867201', 0, 1, '6555867201', '2023-09-10 07:17:00', 3750000, 0),
(69, '23242S7363067965', 0, 1, '7363067965', '2023-09-10 07:17:00', 3750000, 0),
(70, '23242S7147738530', 0, 1, '7147738530', '2023-09-10 07:17:00', 3750000, 0),
(71, '23242S3649489063', 0, 1, '3649489063', '2023-09-10 07:17:00', 3750000, 0),
(72, '23242S6804230033', 0, 1, '6804230033', '2023-09-10 07:17:00', 3750000, 0),
(73, '23242S3072683283', 0, 1, '3072683283', '2023-09-10 07:17:00', 3750000, 0),
(74, '23242S4950726623', 0, 1, '4950726623', '2023-09-10 07:17:00', 3750000, 0),
(75, '23242S5535583575', 0, 1, '5535583575', '2023-09-10 07:17:00', 3750000, 0),
(76, '23242S2825738315', 0, 1, '2825738315', '2023-09-10 07:17:00', 3750000, 0),
(77, '23242S7521941156', 0, 1, '7521941156', '2023-09-10 07:17:00', 3750000, 0),
(78, '23242S9132491144', 0, 1, '9132491144', '2023-09-10 07:17:00', 3750000, 0),
(79, '23242S3096632559', 0, 1, '3096632559', '2023-09-10 07:17:00', 3750000, 0),
(80, '23242S8085689673', 0, 1, '8085689673', '2023-09-10 07:17:00', 3750000, 0),
(81, '23242S1138550994', 0, 1, '1138550994', '2023-09-10 07:17:00', 3750000, 0),
(82, '23242S1435686258', 0, 1, '1435686258', '2023-09-10 07:17:00', 3750000, 0),
(83, '23242S3762778615', 0, 1, '3762778615', '2023-09-10 07:17:00', 3750000, 0),
(84, '23242S4506834609', 0, 1, '4506834609', '2023-09-10 07:17:00', 3750000, 0),
(85, '23242S1245837510', 0, 1, '1245837510', '2023-09-10 07:17:00', 3750000, 0),
(86, '23242S2708684031', 0, 1, '2708684031', '2023-09-10 07:17:00', 3750000, 0),
(87, '23242S9805907932', 0, 1, '9805907932', '2023-09-10 07:17:00', 3750000, 0),
(88, '23242S0903487876', 0, 1, '0903487876', '2023-09-10 07:17:00', 3750000, 0),
(89, '23242S5099715893', 0, 1, '5099715893', '2023-09-10 07:17:00', 3750000, 0),
(90, '23242S2788116142', 0, 1, '2788116142', '2023-09-10 07:17:00', 3750000, 0),
(91, '23242S8641433342', 0, 1, '8641433342', '2023-09-10 07:17:00', 3750000, 0),
(92, '23242S4842818588', 0, 1, '4842818588', '2023-09-10 07:17:00', 3750000, 0),
(93, '23242S8289793225', 0, 1, '8289793225', '2023-09-10 07:17:00', 3750000, 0),
(94, '23242S6920510667', 0, 1, '6920510667', '2023-09-10 07:17:00', 3750000, 0),
(95, '23242S9733173968', 0, 1, '9733173968', '2023-09-10 07:17:00', 3750000, 0),
(96, '23242S7904338145', 0, 1, '7904338145', '2023-09-10 07:17:00', 3750000, 0),
(97, '23242S0322169130', 0, 1, '0322169130', '2023-09-10 07:17:00', 3750000, 0),
(98, '23242S7897831525', 0, 1, '7897831525', '2023-09-10 07:17:00', 3750000, 0),
(99, '23242S8522650542', 0, 1, '8522650542', '2023-09-10 07:17:00', 3750000, 0),
(100, '23242S8919758441', 0, 1, '8919758441', '2023-09-10 07:17:00', 3750000, 0),
(101, '23242S9030840889', 0, 1, '9030840889', '2023-09-10 07:17:00', 3750000, 0),
(102, '23242S8394929429', 0, 1, '8394929429', '2023-09-10 07:17:00', 3750000, 0),
(103, '23242S4882124788', 0, 1, '4882124788', '2023-09-10 07:17:00', 3750000, 0),
(104, '23242S9225835957', 0, 1, '9225835957', '2023-09-10 07:17:00', 3750000, 0),
(105, '23242S1482805732', 0, 1, '1482805732', '2023-09-10 07:17:00', 3750000, 0),
(106, '23242S9736521094', 0, 1, '9736521094', '2023-09-10 07:17:00', 3750000, 0),
(107, '23242S4234188584', 0, 1, '4234188584', '2023-09-10 07:17:00', 3750000, 0),
(108, '23242S1961379947', 0, 1, '1961379947', '2023-09-10 07:17:00', 3750000, 0),
(109, '23242S7104334288', 0, 1, '7104334288', '2023-09-10 07:17:00', 3750000, 0),
(110, '23242S9637531907', 0, 1, '9637531907', '2023-09-10 07:17:00', 3750000, 0),
(111, '23242S6874656981', 0, 1, '6874656981', '2023-09-10 07:17:00', 3750000, 0),
(112, '23242S5460689492', 0, 1, '5460689492', '2023-09-10 07:17:00', 3750000, 0),
(113, '23242S6679476822', 0, 1, '6679476822', '2023-09-10 07:17:00', 3750000, 0),
(114, '23242S7015315943', 0, 1, '7015315943', '2023-09-10 07:17:00', 3750000, 0),
(115, '23242S5038149557', 0, 1, '5038149557', '2023-09-10 07:17:00', 3750000, 0),
(116, '23242S4144800262', 0, 1, '4144800262', '2023-09-10 07:17:00', 3750000, 0),
(117, '23242S5609552949', 0, 1, '5609552949', '2023-09-10 07:17:00', 3750000, 0),
(118, '23242S5613364265', 0, 1, '5613364265', '2023-09-10 07:17:00', 3750000, 0),
(119, '23242S1238162788', 0, 1, '1238162788', '2023-09-10 07:17:00', 3750000, 0),
(120, '23242S9350721453', 0, 1, '9350721453', '2023-09-10 07:17:00', 3750000, 0),
(121, '23242S3039119209', 0, 1, '3039119209', '2023-09-10 07:17:00', 3750000, 0),
(122, '23242S7143431992', 0, 1, '7143431992', '2023-09-10 07:17:00', 3750000, 0),
(123, '23242S6599802641', 0, 1, '6599802641', '2023-09-10 07:17:00', 3750000, 0),
(124, '23242S1568717538', 0, 1, '1568717538', '2023-09-10 07:17:00', 3750000, 0),
(125, '23242S8044180076', 0, 1, '8044180076', '2023-09-10 07:17:00', 3750000, 0),
(126, '23242S5514748073', 0, 1, '5514748073', '2023-09-10 07:17:00', 3750000, 0),
(127, '23242S3441200445', 0, 1, '3441200445', '2023-09-10 07:17:00', 3750000, 0),
(128, '23242S0661758315', 0, 1, '0661758315', '2023-09-10 07:17:00', 3750000, 0),
(129, '23242S2985190547', 0, 1, '2985190547', '2023-09-10 07:17:00', 3750000, 0),
(130, '23242S2940678096', 0, 1, '2940678096', '2023-09-10 07:17:00', 3750000, 0),
(131, '23242S5747819147', 0, 1, '5747819147', '2023-09-10 07:17:00', 3750000, 0),
(132, '23242S9917061757', 0, 1, '9917061757', '2023-09-10 07:17:00', 3750000, 0),
(133, '23242S2341851650', 0, 1, '2341851650', '2023-09-10 07:17:00', 3750000, 0),
(134, '23242S1958073286', 0, 1, '1958073286', '2023-09-10 07:17:00', 3750000, 0),
(135, '23242S2764811788', 0, 1, '2764811788', '2023-09-10 07:17:00', 3750000, 0),
(136, '23242S7949839390', 0, 1, '7949839390', '2023-09-10 07:17:00', 3750000, 0),
(137, '23242S1454761895', 0, 1, '1454761895', '2023-09-10 07:17:00', 3750000, 0),
(138, '23242S3424291613', 0, 1, '3424291613', '2023-09-10 07:17:00', 3750000, 0),
(139, '23242S2757172689', 0, 1, '2757172689', '2023-09-10 07:17:00', 3750000, 0),
(140, '23242S3512988913', 0, 1, '3512988913', '2023-09-10 07:17:00', 3750000, 0),
(141, '23242S9293426805', 0, 1, '9293426805', '2023-09-10 07:17:00', 3750000, 0),
(142, '23242S5928167594', 0, 1, '5928167594', '2023-09-10 07:17:00', 3750000, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `tagihan`, `semester`, `tahun_pelajaran`, `file_rincian_tagihan`) VALUES
(19, 3750000, 2, '2023/2024', 'frtTapel2324Sems2.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_histori`
--

CREATE TABLE `transaksi_histori` (
  `id_transaksi_histori` int(10) NOT NULL,
  `id_order` varchar(30) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `terbayar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_histori`
--

INSERT INTO `transaksi_histori` (`id_transaksi_histori`, `id_order`, `tanggal`, `terbayar`) VALUES
(2, '23242S9638761635', '2023-09-11 22:26:20', 175000),
(3, '23242S9638761635', '2023-09-11 22:27:01', 100000);

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
  ADD UNIQUE KEY `nisn` (`nisn`),
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
  ADD UNIQUE KEY `id_order` (`id_order`),
  ADD KEY `transaksi_ibfk_3` (`id_diskon`),
  ADD KEY `nisn_santri` (`nisn_santri`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- Indeks untuk tabel `transaksi_histori`
--
ALTER TABLE `transaksi_histori`
  ADD PRIMARY KEY (`id_transaksi_histori`),
  ADD KEY `id_order` (`id_order`);

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
  MODIFY `id_transaksi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `transaksi_histori`
--
ALTER TABLE `transaksi_histori`
  MODIFY `id_transaksi_histori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`nisn_santri`) REFERENCES `santri` (`nisn`);

--
-- Ketidakleluasaan untuk tabel `transaksi_histori`
--
ALTER TABLE `transaksi_histori`
  ADD CONSTRAINT `transaksi_histori_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `transaksi` (`id_order`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
