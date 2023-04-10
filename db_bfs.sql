-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2023 at 06:36 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bfs`
--

-- --------------------------------------------------------

--
-- Table structure for table `armadas`
--

CREATE TABLE `armadas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_sopir` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_lambung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kendaraan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` int NOT NULL,
  `tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `armadas`
--

INSERT INTO `armadas` (`id`, `nama_sopir`, `status`, `no_pol`, `no_lambung`, `jenis_kendaraan`, `volume`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'Solikin', 'PNS', 'W 8292 NP ', '1', 'Dump truck', 13, '2018', '2021-10-19 04:15:00', '2021-10-19 04:15:00'),
(2, 'Pujo Hariyanto', 'THL', 'W 8305 NP ', '2', 'Dump truck', 10, '2018', '2021-10-20 04:15:00', '2021-10-20 04:15:00'),
(3, 'Choirul Huda', 'THL', 'W 8247 PP', '3', 'Dump truck', 12, '2013', '2021-10-21 04:15:00', '2021-10-21 04:15:00'),
(4, 'Moh. Maslukhin', 'PNS ', 'W 8299 NP', '4', 'Dump truck', 13, '2018', '2021-10-22 04:15:00', '2021-10-22 04:15:00'),
(5, 'Yudi Hariantono', 'THL', 'W 8349 NP', '5', 'Dump truck', 13, '2019', '2021-10-23 04:15:00', '2021-10-23 04:15:00'),
(6, 'Muhammad Ikhsan Taqiuddin', 'PNS', 'W 8408 PP', '6', 'Dump truck', 12, '2016', '2021-10-24 04:15:00', '2021-10-24 04:15:00'),
(7, 'Nungki Prasetyo', 'THL', 'W 8246 PP', '7', 'Dump truck', 10, '2013', '2021-10-25 04:15:00', '2021-10-25 04:15:00'),
(8, 'Khoirul Anang', 'THL', 'W 8361 PP', '8', 'Dump truck', 10, '2015', '2021-10-26 04:15:00', '2021-10-26 04:15:00'),
(9, 'Karjani', 'THL', 'W 8309 NP', '9', 'Dump truck', 11, '2018', '2021-10-27 04:15:00', '2021-10-27 04:15:00'),
(10, 'Moh Alinudin', 'THL', 'W 8362 PP', '10', 'Dump truck', 12, '2015', '2021-10-28 04:15:00', '2021-10-28 04:15:00'),
(11, 'Arfan Agus Tanto', 'THL', 'W 8249 PP', '11', 'Dump truck', 9, '2013', '2021-10-29 04:15:00', '2021-10-29 04:15:00'),
(12, 'Mohamad Fatakah', 'PNS', 'W 8294 NP', '12', 'Dump truck', 8, '2018', '2021-10-30 04:15:00', '2021-10-30 04:15:00'),
(13, 'Fachrul Roji', 'PNS', 'W 8310 NP', '13', 'Dump truck', 12, '2018', '2021-10-31 04:15:00', '2021-10-31 04:15:00'),
(14, 'Dani Bagus Saputro', 'THL', 'W 8297 NP', '14', 'Dump truck', 14, '2018', '2021-11-01 04:15:00', '2021-11-01 04:15:00'),
(15, 'Aminin', 'PNS', 'W 8308 NP', '15', 'Dump truck', 14, '2019', '2021-11-02 04:15:00', '2021-11-02 04:15:00'),
(16, 'M. Syamsul Arif', 'THL', 'W 8304 NP', '16', 'Dump truck', 11, '2018', '2021-11-03 04:15:00', '2021-11-03 04:15:00'),
(17, 'Adi Kurniawan', 'THL', 'W 8248 PP', '17', 'Dump truck', 10, '2013', '2021-11-04 04:15:00', '2021-11-04 04:15:00'),
(18, 'Tarmuji', 'PNS', 'W 8407 PP', '18', 'Dump truck', 9, '2016', '2021-11-05 04:15:00', '2021-11-05 04:15:00'),
(19, 'Miskan', 'PNS', 'W 8521 PP', '19', 'Dump truck', 9, '2013', '2021-11-06 04:15:00', '2021-11-06 04:15:00'),
(20, 'Subandi', 'THL', 'W 8295 NP', '20', 'Dump truck', 14, '2018', '2021-11-07 04:15:00', '2021-11-07 04:15:00'),
(21, 'Ridho Panoto', 'THL', 'W 8302 NP', '21', 'Dump truck', 12, '2018', '2021-11-08 04:15:00', '2021-11-08 04:15:00'),
(22, 'Arsiadi', 'THL', 'W 8363 PP', '22', 'Dump truck', 13, '2015', '2021-11-09 04:15:00', '2021-11-09 04:15:00'),
(23, 'Suwanto', 'THL', 'W 8306 NP', '23', 'Dump truck', 13, '2018', '2021-11-10 04:15:00', '2021-11-10 04:15:00'),
(24, 'Abdul Munip', 'PNS', 'W 8293 NP', '24', 'Dump truck', 13, '2018', '2021-11-11 04:15:00', '2021-11-11 04:15:00'),
(25, 'Wibowo Edi Santoso', 'THL', 'W 8405 PP', '25', 'Dump truck', 8, '2016', '2021-11-12 04:15:00', '2021-11-12 04:15:00'),
(26, 'Sugiyanto', 'PNS', 'W 8365 PP', '26', 'Dump truck', 10, '2015', '2021-11-13 04:15:00', '2021-11-13 04:15:00'),
(27, 'Bambang Wijanarko', 'THL', 'W 8296 NP', '27', 'Dump truck', 14, '2018', '2021-11-14 04:15:00', '2021-11-14 04:15:00'),
(28, 'Rokhmat Wahyudi', 'THL', 'W 8311 NP', '28', 'Dump truck', 13, '2018', '2021-11-15 04:15:00', '2021-11-15 04:15:00'),
(29, 'Yoyon Ernomo', 'THL', 'W 8251 PP', '29', 'Dump truck', 10, '2013', '2021-11-16 04:15:00', '2021-11-16 04:15:00'),
(30, 'Totok Wardoyo', 'THL', 'W 8072 PP', '30', 'Dump truck', 11, '2011', '2021-11-17 04:15:00', '2021-11-17 04:15:00'),
(31, 'Yoyok Supriyono', 'THL', 'W 8255 PP', '31', 'Dump truck', 10, '2013', '2021-11-18 04:15:00', '2021-11-18 04:15:00'),
(32, 'Supeno', 'THL', 'W 8254 PP', '32', 'Dump truck', 13, '2013', '2021-11-19 04:15:00', '2021-11-19 04:15:00'),
(33, 'Alip Sutikno', 'THL', 'W 8250 PP', '33', 'Dump truck', 10, '2013', '2021-11-20 04:15:00', '2021-11-20 04:15:00'),
(34, 'Arief Rohman', 'THL', 'W 8252 PP', '34', 'Dump truck', 14, '2013', '2021-11-21 04:15:00', '2021-11-21 04:15:00'),
(35, 'Saipul Arif', 'THL', 'W 8301 NP', '35', 'Dump truck', 12, '2018', '2021-11-22 04:15:00', '2021-11-22 04:15:00'),
(36, 'Adi Sucipto', 'THL', 'W 8364 PP', '36', 'Dump truck', 14, '2015', '2021-11-23 04:15:00', '2021-11-23 04:15:00'),
(37, 'Moch.Hermawan', 'THL', 'W 8108 PP', '37', 'Dump truck', 8, '2012', '2021-11-24 04:15:00', '2021-11-24 04:15:00'),
(38, 'Sugeng Priambodo', 'THL', 'W 8303 NP', '38', 'Dump truck', 14, '2018', '2021-11-25 04:15:00', '2021-11-25 04:15:00'),
(39, 'Nur Kholis', 'PNS', 'W 8432 NP', '39', 'Dump truck', 10, '2019', '2021-11-26 04:15:00', '2021-11-26 04:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasilrute`
--

CREATE TABLE `hasilrute` (
  `id` int NOT NULL,
  `tanggal` date NOT NULL,
  `id_armada` int NOT NULL,
  `id_asal` int NOT NULL,
  `id_tujuan` int NOT NULL,
  `volume` int NOT NULL,
  `jarak` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kecamatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` int NOT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `longtitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `nama_tempat`, `Kecamatan`, `volume`, `latitude`, `longtitude`, `created_at`, `updated_at`) VALUES
(1, 'Dlhk kota sidoarjo', 'buduran', 0, '-7.432484', '112.72769', '2021-10-19 16:15:00', '2021-10-19 16:15:00'),
(2, 'Tps Wadungasih Berseri ', 'buduran', 6, '-7.419945', '112.7315995', '2021-10-20 16:15:00', '2021-10-20 16:15:00'),
(3, 'Depo Desa Buduran Rw.02 Buduran Sidoarjo', 'buduran', 4, '-7.428623', '112.723114', '2021-10-21 16:15:00', '2021-10-21 16:15:00'),
(4, 'Depo Bursa Kupang Sidoarjo Jl. Raya Tebel Sruni Gedangan Sidoarjo', 'buduran', 5, '-7.4095856', '112.7270188', '2021-10-22 16:15:00', '2021-10-22 16:15:00'),
(5, 'Tps 3r Sidokerto', 'buduran', 5, '-7.427615', '112.711109', '2021-10-23 16:15:00', '2021-10-23 16:15:00'),
(6, 'Depo Dusun Banjar Rt.4 Rw.4 Buduran Sidoarjo', 'buduran', 2, '-7.412741', '112.725288', '2021-10-24 16:15:00', '2021-10-24 16:15:00'),
(7, 'Tps 3r Sidomulyo', 'buduran', 4, '-7.4249909', '112.7315995', '2021-10-25 16:15:00', '2021-10-25 16:15:00'),
(8, 'Tps 3r Prasung', 'buduran', 3, '-7.422076', '112.748749', '2021-10-26 16:15:00', '2021-10-26 16:15:00'),
(9, 'Depo Dusun Kemantren Rw.3 Buduran Sidoarjo', 'buduran', 2, '-7.42704', '112.723322', '2021-10-27 16:15:00', '2021-10-27 16:15:00'),
(10, 'Tps Desa Balongbendo (Ratatek) Ds. Swaluh', 'balongbendo', 4, '-7.416308', '112.54166', '2021-10-28 16:15:00', '2021-10-28 16:15:00'),
(11, 'Tps Balongdowo ', 'candi', 2, '-7.485496', '112.730137', '2021-10-29 16:15:00', '2021-10-29 16:15:00'),
(12, 'Depo Perum Graha Candi Mas Rw.05 Gelam', 'candi', 6, '-7.4867001', '112.7107433', '2021-10-30 16:15:00', '2021-10-30 16:15:00'),
(13, 'Depo Perumahan Mutiara Prima Raya Candi Sidoarjo', 'candi', 6, '-7.4778093', '112.7104932', '2021-10-31 16:15:00', '2021-10-31 16:15:00'),
(14, 'Tps 3r Ngampelsari', 'candi', 5, '-7.4939554', '112.7167022', '2021-11-01 16:15:00', '2021-11-01 16:15:00'),
(15, 'Depo Perumahan Tas 4 Ds. Jambangan Candi Sidoarjo', 'candi', 6, '-7.46413', '112.684278', '2021-11-02 16:15:00', '2021-11-02 16:15:00'),
(16, 'Perum Tni Al Rw.05 Karangtanjung Candi Sidoarjo', 'candi', 2, '-7.477367', '112.701596', '2021-11-03 16:15:00', '2021-11-03 16:15:00'),
(17, 'Tpst Ketajen ', 'gedangan', 6, '-7.3856575', '112.7360686', '2021-11-04 16:15:00', '2021-11-04 16:15:00'),
(18, 'Ds. Sawotratap Rt.01 & Rt.04 Rw.05 ', 'gedangan', 2, '-7.374269', '112.735339', '2021-11-05 16:15:00', '2021-11-05 16:15:00'),
(19, 'Sampah Liar Jl Raya Waru + Gedangan', 'gedangan', 6, '-7.364511', '112.729579', '2021-11-06 16:15:00', '2021-11-06 16:15:00'),
(20, 'Tps 3r Gedangan', 'gedangan', 4, '-7.3933814', '112.7330892', '2021-11-07 16:15:00', '2021-11-07 16:15:00'),
(21, 'Tps 3r Kebonsikep', 'gedangan', 6, '-7.390629', '112.723074', '2021-11-08 16:15:00', '2021-11-08 16:15:00'),
(22, 'Tps 3r Seruni', 'gedangan', 4, '-7.3977218', '112.7226611', '2021-11-09 16:15:00', '2021-11-09 16:15:00'),
(23, 'Tps 3r Tebel', 'gedangan', 4, '-7.4074918', '112.72862', '2021-11-10 16:15:00', '2021-11-10 16:15:00'),
(24, 'Tps Karangbong', 'gedangan', 2, '-7.403149', '112.714927', '2021-11-11 16:15:00', '2021-11-11 16:15:00'),
(25, 'Tps 3r Kedungsumur ', 'krembung', 6, '-7.536443', '112.654276', '2021-11-12 16:15:00', '2021-11-12 16:15:00'),
(26, 'Tps 3r Desa Tambak Rejo', 'krembung', 6, '-7.543776', '112.650361', '2021-11-13 16:15:00', '2021-11-13 16:15:00'),
(27, 'Tps 3r Jenggot', 'krembung', 2, '-7.514208', '112.653447', '2021-11-14 16:15:00', '2021-11-14 16:15:00'),
(28, 'Tps 3r Desa Ploso', 'krembung', 2, '-7.4348302', '112.6422128', '2021-11-15 16:15:00', '2021-11-15 16:15:00'),
(29, 'Tps 3r Terik', 'krian', 3, '-7.414473', '112.602283', '2021-11-16 16:15:00', '2021-11-16 16:15:00'),
(30, 'Tps 3r Junwangi', 'krian', 5, '-7.4064444', '112.606456', '2021-11-17 16:15:00', '2021-11-17 16:15:00'),
(31, 'Tps 3r Tambak Kemerakan', 'krian', 6, '-7.401012', '112.583199', '2021-11-18 16:15:00', '2021-11-18 16:15:00'),
(32, 'Tps 3r Keluran Krian (Krengseng Wilayah Desa Mulyodadi)', 'krian', 2, '-7.4247316', '112.6288119', '2021-11-19 16:15:00', '2021-11-19 16:15:00'),
(33, 'Tps Kemangsen', 'krian', 3, '-7.411169', '112.569028', '2021-11-20 16:15:00', '2021-11-20 16:15:00'),
(34, 'Tps 3r Katerungan', 'krian', 6, '-7.418858', '112.58401', '2021-11-21 16:15:00', '2021-11-21 16:15:00'),
(35, 'Tps 3r Terungkulon', 'krian', 4, '-7.401209', '112.605558', '2021-11-22 16:15:00', '2021-11-22 16:15:00'),
(36, 'Tps 3r Perumtas 5 Bendotretek', 'krian', 2, '-7.448605', '112.5587624', '2021-11-23 16:15:00', '2021-11-23 16:15:00'),
(37, 'Dsn. Ngaglik Rt.09 Rw.03 Ds. Sedenganmijen Krian Sidoarjo', 'krian', 4, '-7.428208', '112.587359', '2021-11-24 16:15:00', '2021-11-24 16:15:00'),
(38, 'Depo Pasar Hewan Krian + Depo Dsn Ngingas', 'krian', 4, '-7.413532', '112.57608', '2021-11-25 16:15:00', '2021-11-25 16:15:00'),
(39, 'Tps Rutan Perempuan Kelas Iia Porong', 'porong', 2, '-7.5487336', '112.6715554', '2021-11-26 16:15:00', '2021-11-26 16:15:00'),
(40, 'Tps Kedungboto', 'porong', 2, '-7.511273', '112.66819', '2021-11-27 16:15:00', '2021-11-27 16:15:00'),
(41, 'Perumahan Griya Prambon Asri', 'prambon', 4, '-7.4410131', '112.575192', '2021-11-28 16:15:00', '2021-11-28 16:15:00'),
(42, 'Tps Perumahan Graha Indraprasta Prambon Sidoarjo', 'prambon', 3, '-7.435867', '112.576096', '2021-11-29 16:15:00', '2021-11-29 16:15:00'),
(43, 'Tps 3r Kragan', 'sedati', 6, '-7.4090561', '112.7464965', '2021-11-30 16:15:00', '2021-11-30 16:15:00'),
(44, 'Tps Pasar Desa Betro', 'sedati', 4, '-7.393749', '112.761114', '2021-12-01 16:15:00', '2021-12-01 16:15:00'),
(45, 'Tps 3r Sedati Gede', 'sedati', 4, '-7.3808411', '112.7554346', '2021-12-02 16:15:00', '2021-12-02 16:15:00'),
(46, 'Tps 3r Desa Pranti', 'sedati', 2, '-7.3691674', '112.7852277', '2021-12-03 16:15:00', '2021-12-03 16:15:00'),
(47, 'Tps Pasar Suko', 'Sidoarjo', 4, '-7.4454797', '112.6793353', '2021-12-04 16:15:00', '2021-12-04 16:15:00'),
(48, 'Depo Sekardangan', 'Sidoarjo', 5, '-7.464231', '112.723405', '2021-12-05 16:15:00', '2021-12-05 16:15:00'),
(49, 'Tpst Taman Pinang ', 'Sidoarjo', 5, '-7.4564173', '112.7081434', '2021-12-06 16:15:00', '2021-12-06 16:15:00'),
(50, 'Tps Praloyo ', 'Sidoarjo', 3, '-7.472016', '112.739199', '2021-12-07 16:15:00', '2021-12-07 16:15:00'),
(51, 'Perm Villa Jasmin II', 'sidoarjo', 2, '-7.445606', '112.6694134', '2021-12-08 16:15:00', '2021-12-08 16:15:00'),
(52, 'Tps 3r Kawasan Lingkar Timur', 'sidoarjo', 2, '-7.4610224', '112.7420274', '2021-12-09 16:15:00', '2021-12-09 16:15:00'),
(53, 'Tps Kemiri (Tps 3r Margo Rukun)', 'sidoarjo', 6, '-7.443674', '112.735932', '2021-12-10 16:15:00', '2021-12-10 16:15:00'),
(54, 'Depo Pesantren Bumi Sholawat', 'Sidoarjo', 5, '-7.451188', '112.666239', '2021-12-11 16:15:00', '2021-12-11 16:15:00'),
(55, 'Tps 3r Kawasan Banjarbendo', 'Sidoarjo', 5, '-7.4521504', '112.6958457', '2021-12-12 16:15:00', '2021-12-12 16:15:00'),
(56, 'Depo Perum Taman Pinang', 'Sidoarjo', 6, '-7.458578', '112.703502', '2021-12-13 16:15:00', '2021-12-13 16:15:00'),
(57, 'Tps Kemiri Mbah Men Desa Kemiri Sidoarjo', 'sidoarjo', 4, '-7.435342', '112.7303516', '2021-12-14 16:15:00', '2021-12-14 16:15:00'),
(58, 'Tps 3r Banjarbendo Bahkti Bumi Ii Sidoarjo', 'sidoarjo', 5, '-7.457823', '112.7371826', '2021-12-15 16:15:00', '2021-12-15 16:15:00'),
(59, 'Penyisiran Sampah Liar Jalan Protokol 1 Kota Sidoarjo', 'sidoarjo', 5, '-7.445375', '112.715785', '2021-12-16 16:15:00', '2021-12-16 16:15:00'),
(60, 'Taman Pinang - Gading Fajar (Sampah Liar)', 'sidoarjo', 3, '-7.4663231', '112.7012971', '2021-12-17 16:15:00', '2021-12-17 16:15:00'),
(61, 'Tps Desa Bluru Kidul Psjbk Sidoarjo', 'sidoarjo', 2, '-7.4512472', '112.7360686', '2021-12-18 16:15:00', '2021-12-18 16:15:00'),
(62, 'Depo Perum Sidokare Rw.07', 'sidoarjo', 2, '-7.4667514', '112.7034374', '2021-12-19 16:15:00', '2021-12-19 16:15:00'),
(63, 'Perum Griya Bhayangkara', 'Sukodono', 2, '-7.377683', '112.683895', '2021-12-20 16:15:00', '2021-12-20 16:15:00'),
(64, 'Tps 3r Desa Sidorejo', 'sukodono', 6, '-7.374544', '112.606913', '2021-12-21 16:15:00', '2021-12-21 16:15:00'),
(65, 'Tps 3r Desa Suruh', 'Sukodono', 6, '-7.4049961', '112.6809479', '2021-12-22 16:15:00', '2021-12-22 16:15:00'),
(66, 'Tps 3r Plumbungan', 'Sukodono', 2, '-7.393494', '112.6600907', '2021-12-23 16:15:00', '2021-12-23 16:15:00'),
(67, 'Tps 3r Sarirogo', 'Sukodono', 5, '-7.4277073', '112.6809479', '2021-12-24 16:15:00', '2021-12-24 16:15:00'),
(68, 'Tps 3r Masangan Wetan', 'sukodono', 4, '-7.3914287', '112.6988252', '2021-12-25 16:15:00', '2021-12-25 16:15:00'),
(69, 'Depo Rusunawa Wonocolo', 'Taman', 4, '-7.347866', '112.697417', '2021-12-26 16:15:00', '2021-12-26 16:15:00'),
(70, 'Tps 3r Desa Tawangsari Rt.09 Rw.02 Taman Sidoarjo', 'taman', 2, '-7.354714', '112.6779684', '2021-12-27 16:15:00', '2021-12-27 16:15:00'),
(71, 'Tps Krembangan Rt.16 / Rw.04 Taman Sidoarjo', 'taman', 6, '-7.353413', '112.66867', '2021-12-28 16:15:00', '2021-12-28 16:15:00'),
(72, 'Depo Geluran Sepanjang', 'taman', 4, '-7.362506', '112.689429', '2021-12-29 16:15:00', '2021-12-29 16:15:00'),
(73, 'Tps 3r Sambibulu', 'taman', 6, '-7.3728391', '112.6690296', '2021-12-30 16:15:00', '2021-12-30 16:15:00'),
(74, 'Penyisiran Sampah Liar Jl Raya Trosobo 2 Taman', 'taman', 2, '-7.3723674', '112.6423851', '2021-12-31 16:15:00', '2021-12-31 16:15:00'),
(75, 'Tps 3r Kawasan Taman', 'taman', 2, '-7.3662972', '112.673499', '2022-01-01 16:15:00', '2022-01-01 16:15:00'),
(76, 'Depo Perum Permata Tanggulangin', 'tanggulangin', 4, '-7.503658', '112.706227', '2022-01-02 16:15:00', '2022-01-02 16:15:00'),
(77, 'Tps 3r Gelang', 'tulangan', 4, '-7.497705', '112.652272', '2022-01-03 16:15:00', '2022-01-03 16:15:00'),
(78, 'Tps 3r Medalem', 'tulangan', 2, '-7.471335', '112.660782', '2022-01-04 16:15:00', '2022-01-04 16:15:00'),
(79, 'Tps 3r Kepuh Kemiri', 'tulangan', 4, '-7.446229', '112.6325054', '2022-01-05 16:15:00', '2022-01-05 16:15:00'),
(80, 'Tps 3r Kepatihan', 'tulangan', 6, '-7.486008', '112.660473', '2022-01-06 16:15:00', '2022-01-06 16:15:00'),
(81, 'Tps 3r Kawasan Bumi Lestari Tulangan Sidoarjo', 'tulangan', 6, '-7.477936', '112.654526', '2022-01-07 16:15:00', '2022-01-07 16:15:00'),
(82, 'Tps 3r Kenongo', 'tulangan', 4, '-7.487144', '112.651199', '2022-01-08 16:15:00', '2022-01-08 16:15:00'),
(83, 'Tps 3r Modong + Depo Perum Graha Pesona', 'tulangan', 3, '-7.45538', '112.648829', '2022-01-09 16:15:00', '2022-01-09 16:15:00'),
(84, 'Tps 3r Kedondong', 'tulangan', 6, '-7.479779', '112.682406', '2022-01-10 16:15:00', '2022-01-10 16:15:00'),
(85, 'Depo Perum Surya Kencana', 'tulangan', 2, '-7.4635329', '112.6720092', '2022-01-11 16:15:00', '2022-01-11 16:15:00'),
(86, 'Tps Desa Bandilan (Depan Unsuri)', 'waru', 5, '-7.348286', '112.732922', '2022-01-12 16:15:00', '2022-01-12 16:15:00'),
(87, 'Sisir Sampah Liar (Waru - Kedungrejo) ', 'waru', 4, '-7.351124', '112.736105', '2022-01-13 16:15:00', '2022-01-13 16:15:00'),
(88, 'Tps Perum Pp Legi & Depo Perum Pondok Maspion Pp Legi', 'waru', 4, '-7.362226', '112.714724', '2022-01-14 16:15:00', '2022-01-14 16:15:00'),
(89, 'Tps 3r Brebek', 'waru', 6, '-7.3427222', '112.7613933', '2022-01-15 16:15:00', '2022-01-15 16:15:00'),
(90, 'Rumah Tahanan Kelas I Sby', 'waru', 4, '-7.3546389', '112.7109797', '2022-01-16 16:15:00', '2022-01-16 16:15:00'),
(91, 'Tps 3r Kepuhkiriman', 'waru', 3, '-7.3528001', '112.7613933', '2022-01-17 16:15:00', '2022-01-17 16:15:00'),
(92, 'Tps 3r Ngingas', 'waru', 6, '-7.358386', '112.739146', '2022-01-18 16:15:00', '2022-01-18 16:15:00'),
(93, 'Tps Desa Kedung Rejo Rw.03 Waru Sidoarjo', 'waru', 3, '-7.3518656', '112.7315995', '2022-01-19 16:15:00', '2022-01-19 16:15:00'),
(94, 'Tps 3r Deltasari', 'waru', 4, '-7.362546', '112.745533', '2022-01-20 16:15:00', '2022-01-20 16:15:00'),
(95, 'Tps 3r Desa Dukuhsari', 'jabon', 5, '-7.5564852', '112.72862', '2022-01-21 16:15:00', '2022-01-21 16:15:00'),
(96, 'Tps Desa Permisan', 'jabon', 6, '-7.539438', '112.741818', '2022-01-22 16:15:00', '2022-01-22 16:15:00'),
(97, 'TPA Jabon', 'jabon', 0, '-7.5472291', '112.7589947', '2022-01-23 16:15:00', '2022-01-23 16:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2021_10_17_155223_location', 1),
(18, '2021_10_19_064848_create_armadas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_armada` int NOT NULL,
  `id_tujuan` int NOT NULL,
  `status` varchar(250) NOT NULL,
  `volume` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tampungrute`
--

CREATE TABLE `tampungrute` (
  `id` int NOT NULL,
  `tanggal` date NOT NULL,
  `id_armada` int NOT NULL,
  `id_asal` int NOT NULL,
  `id_tujuan` int NOT NULL,
  `volume` int NOT NULL,
  `jarak` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fahreal Bernov', 'crustercrew', 'fahrealbernov@gmail.com', NULL, '$2y$10$u9qXFZ0MnSlnXY159O9zneJpUBCxQvUqowHspnX7xZcBEnJh.fP1m', NULL, '2021-10-19 08:47:31', '2021-10-19 08:47:31'),
(2, 'chandra', 'chandra', 'chandra@gmail.com', NULL, '$2y$10$uXZEQjZ6BnWXkaEj/snvfOVzCDqGlCtBeJ2SefxiVRNEO.V.KdTqK', NULL, '2021-12-06 23:38:50', '2021-12-06 23:38:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armadas`
--
ALTER TABLE `armadas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hasilrute`
--
ALTER TABLE `hasilrute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tampungrute`
--
ALTER TABLE `tampungrute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `armadas`
--
ALTER TABLE `armadas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasilrute`
--
ALTER TABLE `hasilrute`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=561;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tampungrute`
--
ALTER TABLE `tampungrute`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=998;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
