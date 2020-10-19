-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2020 at 12:13 PM
-- Server version: 10.3.17-MariaDB-0+deb10u1
-- PHP Version: 7.3.9-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `statistik_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `baris_data`
--

CREATE TABLE `baris_data` (
  `baris_id` int(11) NOT NULL,
  `baris_nm` varchar(255) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `_tabel_id` int(11) NOT NULL,
  `baris_induk` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baris_data`
--

INSERT INTO `baris_data` (`baris_id`, `baris_nm`, `jenis_id`, `_tabel_id`, `baris_induk`, `created`) VALUES
(101, 'Januari', 100, 0, 0, '2020-10-13 09:29:03'),
(102, 'Februari', 100, 0, 0, '2020-10-13 09:29:11'),
(103, 'Maret', 100, 0, 0, '2020-10-13 09:29:17'),
(104, 'April', 100, 0, 0, '2020-10-13 09:29:23'),
(105, 'Mei', 100, 0, 0, '2020-10-13 09:29:27'),
(106, 'Juni', 100, 0, 0, '2020-10-13 09:29:32'),
(107, 'Juli', 100, 0, 0, '2020-10-13 09:29:38'),
(108, 'Agustus', 100, 0, 0, '2020-10-13 09:29:43'),
(109, 'September', 100, 0, 0, '2020-10-13 09:29:50'),
(110, 'Oktober', 100, 0, 0, '2020-10-13 09:29:56'),
(111, 'November', 100, 0, 0, '2020-10-13 09:30:04'),
(112, 'Desember', 100, 0, 0, '2020-10-13 09:30:10'),
(122, 'K U D', 1011, 0, 0, '2020-10-16 10:05:45'),
(123, 'KPRI / KPN', 1011, 0, 0, '2020-10-16 10:05:55'),
(124, 'KOPKAR', 1011, 0, 0, '2020-10-16 10:06:04'),
(125, 'KSU', 1011, 0, 0, '2020-10-16 10:06:12'),
(126, 'KSP', 1011, 0, 0, '2020-10-16 10:06:21'),
(127, 'KOPPAS', 1011, 0, 0, '2020-10-16 10:06:30'),
(128, 'KOPWAN', 1011, 0, 0, '2020-10-16 10:06:38'),
(129, 'KOPONTREN', 1011, 0, 0, '2020-10-16 10:06:46'),
(130, 'LAINNYA', 1011, 0, 0, '2020-10-16 10:06:53'),
(131, 'Puskesmas Manipi', 105, 0, 113, '2020-10-16 11:13:03'),
(132, 'Puskesmas Borong Kompleks', 105, 0, 119, '2020-10-16 11:13:29'),
(133, 'Puskesmas Samataring', 105, 0, 115, '2020-10-16 11:13:48'),
(134, 'Puskesmas Panaikang', 105, 0, 115, '2020-10-16 11:13:58'),
(135, 'Puskesmas Kampala', 105, 0, 115, '2020-10-16 11:14:10'),
(138, 'Hotel Melati', 1012, 0, 136, '2020-10-16 11:19:55'),
(139, 'Hotel Bintang 2', 1012, 0, 136, '2020-10-16 11:20:15'),
(201, 'Sinjai Barat', 101, 0, 0, '2020-10-16 09:16:17'),
(202, 'Sinjai Borong', 101, 0, 0, '2020-10-16 09:17:03'),
(203, 'Sinjai Selatan', 101, 0, 0, '2020-10-16 09:16:25'),
(204, 'Tellulumpoe', 101, 0, 0, '2020-10-16 09:17:53'),
(205, 'Sinjai Timur', 101, 0, 0, '2020-10-16 09:16:33'),
(206, 'Sinjai Tengah', 101, 0, 0, '2020-10-16 09:16:40'),
(207, 'Sinjai Utara', 101, 0, 0, '2020-10-16 09:16:48'),
(208, 'Bulupoddo', 101, 0, 0, '2020-10-16 09:16:56'),
(209, 'Pulau Sembilan', 101, 0, 0, '2020-10-16 09:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `isi_data`
--

CREATE TABLE `isi_data` (
  `isi_id` int(11) NOT NULL,
  `isi_value` varchar(255) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `tabel_id` int(11) NOT NULL,
  `baris_id` bigint(11) NOT NULL,
  `kolom_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi_data`
--

INSERT INTO `isi_data` (`isi_id`, `isi_value`, `bulan`, `tahun`, `tabel_id`, `baris_id`, `kolom_id`, `created`) VALUES
(1029, 'Tassililu', 0, 2020, 25, 113, 26, '2020-10-19 01:48:20'),
(1031, '135,53', 0, 2020, 25, 113, 27, '2020-10-19 01:48:20'),
(1033, '16,53', 0, 2020, 25, 113, 29, '2020-10-19 01:48:20'),
(1035, 'Pasir Putih', 0, 2020, 25, 119, 26, '2020-10-19 01:48:21'),
(1037, '66,97', 0, 2020, 25, 119, 27, '2020-10-19 01:48:21'),
(1039, '8,17', 0, 2020, 25, 119, 29, '2020-10-19 01:48:21'),
(1041, 'Samataring', 0, 2020, 25, 115, 26, '2020-10-19 01:48:21'),
(1043, '71,88', 0, 2020, 25, 115, 27, '2020-10-19 01:48:21'),
(1045, '8,77', 0, 2020, 25, 115, 29, '2020-10-19 01:48:21'),
(1047, 'Bikeru', 0, 2020, 25, 114, 26, '2020-10-19 01:48:21'),
(1049, '131,99', 0, 2020, 25, 114, 27, '2020-10-19 01:48:21'),
(1051, '16,10', 0, 2020, 25, 114, 29, '2020-10-19 01:48:21'),
(1053, 'Samenre', 0, 2020, 25, 116, 26, '2020-10-19 01:48:21'),
(1055, '129,70', 0, 2020, 25, 116, 27, '2020-10-19 01:48:21'),
(1057, '15,82', 0, 2020, 25, 116, 29, '2020-10-19 01:48:21'),
(1059, 'Balangnipa', 0, 2020, 25, 117, 26, '2020-10-19 01:48:21'),
(1061, '29,57', 0, 2020, 25, 117, 27, '2020-10-19 01:48:21'),
(1063, '3,61', 0, 2020, 25, 117, 29, '2020-10-19 01:48:21'),
(1065, 'Lamatti Riattang', 0, 2020, 25, 118, 26, '2020-10-19 01:48:22'),
(1067, '99,47', 0, 2020, 25, 118, 27, '2020-10-19 01:48:22'),
(1069, '12,13', 0, 2020, 25, 118, 29, '2020-10-19 01:48:22'),
(1071, 'Pulau Harapan', 0, 2020, 25, 120, 26, '2020-10-19 01:48:22'),
(1073, '7,55', 0, 2020, 25, 120, 27, '2020-10-19 01:48:22'),
(1075, '0,92', 0, 2020, 25, 120, 29, '2020-10-19 01:48:22'),
(1077, 'Mannanti', 0, 2020, 25, 121, 26, '2020-10-19 01:48:22'),
(1079, '147,30', 0, 2020, 25, 121, 27, '2020-10-19 01:48:22'),
(1081, '17,96', 0, 2020, 25, 121, 29, '2020-10-19 01:48:22'),
(1165, '1717', 0, 2020, 26, 113, 32, '2020-10-19 02:07:59'),
(1167, '6261', 0, 2020, 26, 113, 33, '2020-10-19 02:07:59'),
(1169, '5575', 0, 2020, 26, 113, 34, '2020-10-19 02:07:59'),
(1171, '156', 0, 2020, 26, 119, 32, '2020-10-19 02:07:59'),
(1173, '4273', 0, 2020, 26, 119, 33, '2020-10-19 02:07:59'),
(1175, '2268', 0, 2020, 26, 119, 34, '2020-10-19 02:07:59'),
(1177, '2128', 0, 2020, 26, 115, 30, '2020-10-19 02:07:59'),
(1179, '3210', 0, 2020, 26, 115, 31, '2020-10-19 02:07:59'),
(1181, '1850', 0, 2020, 26, 115, 32, '2020-10-19 02:07:59'),
(1183, '12687', 0, 2020, 26, 114, 32, '2020-10-19 02:07:59'),
(1185, '512', 0, 2020, 26, 114, 33, '2020-10-19 02:07:59'),
(1187, '616', 0, 2020, 26, 116, 31, '2020-10-19 02:07:59'),
(1189, '9419', 0, 2020, 26, 116, 32, '2020-10-19 02:07:59'),
(1191, '2935', 0, 2020, 26, 116, 33, '2020-10-19 02:08:00'),
(1193, '1513', 0, 2020, 26, 117, 30, '2020-10-19 02:08:00'),
(1195, '1444', 0, 2020, 26, 117, 31, '2020-10-19 02:08:00'),
(1197, '1716', 0, 2020, 26, 118, 31, '2020-10-19 02:08:00'),
(1199, '6597', 0, 2020, 26, 118, 32, '2020-10-19 02:08:00'),
(1201, '1634', 0, 2020, 26, 118, 33, '2020-10-19 02:08:00'),
(1203, '612', 0, 2020, 26, 120, 30, '2020-10-19 02:08:00'),
(1205, '134', 0, 2020, 26, 120, 31, '2020-10-19 02:08:00'),
(1207, '387', 0, 2020, 26, 121, 30, '2020-10-19 02:08:00'),
(1209, '2474', 0, 2020, 26, 121, 31, '2020-10-19 02:08:00'),
(1211, '11869', 0, 2020, 26, 121, 32, '2020-10-19 02:08:00'),
(1213, '9', 0, 2019, 28, 113, 35, '2020-10-19 02:25:07'),
(1215, '8', 0, 2019, 28, 119, 35, '2020-10-19 02:25:07'),
(1217, '13', 0, 2019, 28, 115, 35, '2020-10-19 02:25:07'),
(1219, '11', 0, 2019, 28, 114, 35, '2020-10-19 02:25:08'),
(1221, '11', 0, 2019, 28, 116, 35, '2020-10-19 02:25:08'),
(1223, '6', 0, 2019, 28, 117, 35, '2020-10-19 02:25:08'),
(1225, '7', 0, 2019, 28, 118, 35, '2020-10-19 02:25:08'),
(1227, '4', 0, 2019, 28, 120, 35, '2020-10-19 02:25:08'),
(1229, '11', 0, 2019, 28, 121, 35, '2020-10-19 02:25:08'),
(1231, '4', 0, 2020, 29, 113, 36, '2020-10-19 02:47:03'),
(1233, '8', 0, 2020, 29, 113, 37, '2020-10-19 02:47:03'),
(1235, '12', 0, 2020, 29, 113, 38, '2020-10-19 02:47:03'),
(1237, '5', 0, 2020, 29, 119, 36, '2020-10-19 02:47:03'),
(1239, '6', 0, 2020, 29, 119, 37, '2020-10-19 02:47:03'),
(1241, '11', 0, 2020, 29, 119, 38, '2020-10-19 02:47:03'),
(1243, '8', 0, 2020, 29, 115, 36, '2020-10-19 02:47:03'),
(1245, '5', 0, 2020, 29, 115, 37, '2020-10-19 02:47:03'),
(1247, '13', 0, 2020, 29, 115, 38, '2020-10-19 02:47:03'),
(1249, '6', 0, 2020, 29, 114, 36, '2020-10-19 02:47:03'),
(1251, '13', 0, 2020, 29, 114, 37, '2020-10-19 02:47:04'),
(1253, '19', 0, 2020, 29, 114, 38, '2020-10-19 02:47:04'),
(1255, '6', 0, 2020, 29, 116, 36, '2020-10-19 02:47:04'),
(1257, '16', 0, 2020, 29, 116, 37, '2020-10-19 02:47:04'),
(1259, '22', 0, 2020, 29, 116, 38, '2020-10-19 02:47:04'),
(1261, '7', 0, 2020, 29, 117, 36, '2020-10-19 02:47:04'),
(1263, '10', 0, 2020, 29, 117, 37, '2020-10-19 02:47:04'),
(1265, '17', 0, 2020, 29, 117, 38, '2020-10-19 02:47:04'),
(1267, '6', 0, 2020, 29, 118, 36, '2020-10-19 02:47:04'),
(1269, '2', 0, 2020, 29, 118, 37, '2020-10-19 02:47:04'),
(1271, '8', 0, 2020, 29, 118, 38, '2020-10-19 02:47:04'),
(1273, '1', 0, 2020, 29, 120, 36, '2020-10-19 02:47:04'),
(1275, '2', 0, 2020, 29, 120, 37, '2020-10-19 02:47:04'),
(1277, '3', 0, 2020, 29, 120, 38, '2020-10-19 02:47:04'),
(1279, '5', 0, 2020, 29, 121, 36, '2020-10-19 02:47:05'),
(1281, '9', 0, 2020, 29, 121, 37, '2020-10-19 02:47:05'),
(1283, '14', 0, 2020, 29, 121, 38, '2020-10-19 02:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_data`
--

CREATE TABLE `jenis_data` (
  `jenis_id` int(11) NOT NULL,
  `jenis_nm` varchar(50) NOT NULL,
  `jenis_ket` varchar(200) NOT NULL,
  `jenis_locked` int(11) NOT NULL DEFAULT 0,
  `jenis_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_data`
--

INSERT INTO `jenis_data` (`jenis_id`, `jenis_nm`, `jenis_ket`, `jenis_locked`, `jenis_created`) VALUES
(100, 'Bulan', 'Data Bulanan', 1, '2020-10-01 17:16:48'),
(101, 'Kecamatan', 'Data Kecamatan', 0, '2020-10-01 17:16:48'),
(105, 'Puskesmas', 'Data Puskesmas', 0, '2020-10-01 17:21:13'),
(1011, 'Koperasi', 'Data Koperasi', 0, '2020-10-16 02:04:21'),
(1012, 'Pajak Daerah', 'Data Pajak Daerah ', 0, '2020-10-16 03:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_data`
--

CREATE TABLE `kategori_data` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(100) NOT NULL,
  `kategori_default` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori_data`
--

INSERT INTO `kategori_data` (`kategori_id`, `kategori_nama`, `kategori_default`) VALUES
(1, 'Geografi dan Iklim', 1),
(2, 'Pemerintahan', 1),
(3, 'Penduduk dan Ketenagakerjaan ', 1),
(4, 'Sosial dan Kesejahteraan Rakyat', 1),
(5, 'Pertanian, Kehutanan, Peternakan dan Perikanan', 1),
(6, 'Pertambangan dan Energi', 1),
(7, 'Pariwisata', 1),
(8, 'Sistem Neraca Regional', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kolom_data`
--

CREATE TABLE `kolom_data` (
  `kolom_id` int(11) NOT NULL,
  `kolom_nm` varchar(255) NOT NULL,
  `kolom_sat` varchar(10) DEFAULT NULL,
  `kolom_tipe` enum('Angka','Text') NOT NULL DEFAULT 'Angka',
  `tabel_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kolom_data`
--

INSERT INTO `kolom_data` (`kolom_id`, `kolom_nm`, `kolom_sat`, `kolom_tipe`, `tabel_id`, `created`) VALUES
(0, 'Jumlah Koperasi', 'Unit', 'Angka', 21, '2020-10-16 10:02:57'),
(9, 'Jalan Nasional', '', 'Angka', 10, '2020-08-24 14:04:04'),
(10, 'Jalan Provinsi', '', 'Angka', 10, '2020-08-24 14:04:16'),
(11, 'Jalan Kabupaten', '', 'Angka', 10, '2020-08-24 14:04:36'),
(12, 'Kecepatan', '', 'Text', 12, '2020-10-02 02:39:06'),
(13, 'Waktu', '', 'Angka', 12, '2020-10-02 02:46:50'),
(14, 'Kendaraan Roda Empat', NULL, 'Angka', 18, '2020-10-16 09:41:17'),
(15, 'Kendaraan Roda Dua', NULL, 'Angka', 18, '2020-10-16 09:41:26'),
(17, 'Koperasi', NULL, 'Angka', 22, '2020-10-16 10:10:01'),
(18, 'Anggota Penuh', NULL, 'Angka', 22, '2020-10-16 10:10:11'),
(19, 'Simpanan', NULL, 'Angka', 22, '2020-10-16 10:10:20'),
(20, 'Jumlah Anggota', 'Orang', 'Angka', 21, '2020-10-16 10:15:30'),
(21, 'Target', 'Rp.', 'Angka', 23, '2020-10-16 11:17:22'),
(22, 'Realisasi', 'Rp.', 'Angka', 23, '2020-10-16 11:17:36'),
(23, 'Koperasi', 'Unit', 'Angka', 24, '2020-10-16 11:36:59'),
(24, 'Anggota Penuh', 'Orang', 'Angka', 24, '2020-10-16 11:37:18'),
(25, 'Simpanan', 'Rp.', 'Angka', 24, '2020-10-16 11:38:07'),
(26, 'Ibukota Kecamatan', '_', 'Text', 25, '2020-10-19 09:31:31'),
(27, 'Luas', 'km2', 'Angka', 25, '2020-10-19 09:35:33'),
(29, 'Persentase Terhadap Luas Kabupaten', '%', 'Angka', 25, '2020-10-19 09:43:53'),
(30, '<25', 'Ha', 'Angka', 26, '2020-10-19 09:51:32'),
(31, '25-100', 'Ha', 'Angka', 26, '2020-10-19 09:52:13'),
(32, '100-500', 'Ha', 'Angka', 26, '2020-10-19 09:52:31'),
(33, '500-1000', 'Ha', 'Angka', 26, '2020-10-19 10:02:19'),
(34, '>1000', 'Ha', 'Angka', 26, '2020-10-19 10:02:36'),
(35, 'Jumlah Desa/Kelurahan', '', 'Angka', 28, '2020-10-19 10:22:49'),
(36, 'Negeri', '', 'Angka', 29, '2020-10-19 10:43:36'),
(37, 'Swasta', '', 'Angka', 29, '2020-10-19 10:43:52'),
(38, 'Jumlah', '', 'Angka', 29, '2020-10-19 10:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_data`
--

CREATE TABLE `tabel_data` (
  `tabel_id` int(11) NOT NULL,
  `tabel_nm` varchar(255) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `kategori_id` varchar(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_data`
--

INSERT INTO `tabel_data` (`tabel_id`, `tabel_nm`, `unit_id`, `jenis_id`, `kategori_id`, `created`, `deleted`) VALUES
(25, 'Luas Daerah dan Jumlah Pulau Menurut Kecamatan', 730714, 101, '1', '2020-10-19 09:25:45', NULL),
(26, 'Tinggi Wilayah dan Jarak ke Ibukota', 730714, 101, '1', '2020-10-19 09:27:06', NULL),
(27, 'Jumlah Desa/Kelurahan Menurut Kecamatan ', 730714, 101, '2', '2020-10-19 10:06:50', '2020-10-19 10:18:00'),
(28, 'Jumlah Desa/Kelurahan Menurut Kecamatan ', 730714, 101, '2', '2020-10-19 10:20:08', NULL),
(29, 'Jumlah Sekolah, Guru, Murid TK', 730723, 101, '4', '2020-10-19 10:42:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_data`
--

CREATE TABLE `tahun_data` (
  `tahun_id` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baris_data`
--
ALTER TABLE `baris_data`
  ADD PRIMARY KEY (`baris_id`);

--
-- Indexes for table `isi_data`
--
ALTER TABLE `isi_data`
  ADD PRIMARY KEY (`isi_id`),
  ADD UNIQUE KEY `Unik` (`tabel_id`,`baris_id`,`kolom_id`);

--
-- Indexes for table `jenis_data`
--
ALTER TABLE `jenis_data`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `kategori_data`
--
ALTER TABLE `kategori_data`
  ADD PRIMARY KEY (`kategori_id`) USING BTREE;

--
-- Indexes for table `kolom_data`
--
ALTER TABLE `kolom_data`
  ADD PRIMARY KEY (`kolom_id`);

--
-- Indexes for table `tabel_data`
--
ALTER TABLE `tabel_data`
  ADD PRIMARY KEY (`tabel_id`);

--
-- Indexes for table `tahun_data`
--
ALTER TABLE `tahun_data`
  ADD PRIMARY KEY (`tahun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baris_data`
--
ALTER TABLE `baris_data`
  MODIFY `baris_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `isi_data`
--
ALTER TABLE `isi_data`
  MODIFY `isi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1284;

--
-- AUTO_INCREMENT for table `jenis_data`
--
ALTER TABLE `jenis_data`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT for table `kategori_data`
--
ALTER TABLE `kategori_data`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kolom_data`
--
ALTER TABLE `kolom_data`
  MODIFY `kolom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tabel_data`
--
ALTER TABLE `tabel_data`
  MODIFY `tabel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tahun_data`
--
ALTER TABLE `tahun_data`
  MODIFY `tahun_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
