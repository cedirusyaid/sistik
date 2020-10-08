-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 02, 2020 at 03:16 AM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

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
  `baris_id` int NOT NULL,
  `baris_nm` varchar(255) NOT NULL,
  `jenis_id` int NOT NULL,
  `_tabel_id` int NOT NULL,
  `baris_induk` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baris_data`
--

INSERT INTO `baris_data` (`baris_id`, `baris_nm`, `jenis_id`, `_tabel_id`, `baris_induk`, `created`) VALUES
(22, 'Sinjai Selatan', 0, 7, 0, '2020-08-19 09:43:00'),
(23, 'Sinjai Utara', 0, 7, 0, '2020-08-19 09:43:07'),
(24, 'Sinjai Tengah', 0, 7, 0, '2020-08-19 09:43:15'),
(25, 'Jenis Permukaan', 0, 10, 0, '2020-08-24 10:40:38'),
(31, 'Kondisi Jalan', 0, 10, 0, '2020-08-24 11:59:20'),
(33, 'Di Aspal', 0, 10, 25, '2020-08-24 14:32:11'),
(35, 'Tanah', 0, 10, 25, '2020-08-24 14:32:39'),
(36, 'Tidak Di Rinci', 0, 10, 31, '2020-08-24 14:32:50'),
(37, 'Pasir', 0, 10, 25, '2020-08-24 14:45:51'),
(45, 'Sinjai Timur', 0, 7, 0, '2020-08-26 10:35:51'),
(48, 'Baris Tiga', 0, 7, 45, '2020-08-26 10:36:56'),
(49, 'baris', 0, 7, 0, '2020-08-26 11:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `isi_data`
--

CREATE TABLE `isi_data` (
  `isi_id` int NOT NULL,
  `isi_value` varchar(255) NOT NULL,
  `bulan` int NOT NULL,
  `tahun` year NOT NULL,
  `tabel_id` int NOT NULL,
  `baris_id` int NOT NULL,
  `kolom_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi_data`
--

INSERT INTO `isi_data` (`isi_id`, `isi_value`, `bulan`, `tahun`, `tabel_id`, `baris_id`, `kolom_id`) VALUES
(315, '1', 0, 2020, 10, 33, 9),
(317, '2', 0, 2020, 10, 33, 10),
(319, '3', 0, 2020, 10, 33, 11),
(321, '4', 0, 2020, 10, 35, 9),
(323, '5', 0, 2020, 10, 35, 10),
(325, '6', 0, 2020, 10, 35, 11),
(327, '10', 0, 2020, 10, 36, 9),
(329, '11', 0, 2020, 10, 36, 10),
(331, '12', 0, 2020, 10, 36, 11),
(333, '7', 0, 2020, 10, 37, 9),
(335, '8', 0, 2020, 10, 37, 10),
(337, '9', 0, 2020, 10, 37, 11),
(363, '13', 0, 2020, 7, 38, 5),
(365, '14', 0, 2020, 7, 38, 6),
(367, '15', 0, 2020, 7, 38, 7),
(369, '16', 0, 2020, 7, 38, 8),
(371, '', 0, 2020, 7, 41, 5),
(373, '', 0, 2020, 7, 41, 6),
(375, '', 0, 2020, 7, 41, 7),
(377, '', 0, 2020, 7, 41, 8),
(379, '17', 0, 2020, 7, 42, 5),
(381, '18', 0, 2020, 7, 42, 6),
(383, '19', 0, 2020, 7, 42, 7),
(385, '20', 0, 2020, 7, 42, 8),
(387, '21', 0, 2020, 7, 43, 5),
(389, '22', 0, 2020, 7, 43, 6),
(391, '23', 0, 2020, 7, 43, 7),
(393, '24', 0, 2020, 7, 43, 8),
(627, '1', 0, 2020, 7, 22, 5),
(629, '2', 0, 2020, 7, 22, 6),
(631, '3', 0, 2020, 7, 22, 7),
(633, '4', 0, 2020, 7, 22, 8),
(635, '5', 0, 2020, 7, 23, 5),
(637, '6', 0, 2020, 7, 23, 6),
(639, '7', 0, 2020, 7, 23, 7),
(641, '8', 0, 2020, 7, 23, 8),
(643, '9', 0, 2020, 7, 24, 5),
(645, '10', 0, 2020, 7, 24, 6),
(647, '11', 0, 2020, 7, 24, 7),
(649, '12', 0, 2020, 7, 24, 8),
(651, '', 0, 2020, 7, 45, 5),
(653, '', 0, 2020, 7, 45, 6),
(655, '', 0, 2020, 7, 45, 7),
(657, '', 0, 2020, 7, 45, 8),
(659, '13', 0, 2020, 7, 48, 5),
(661, '14', 0, 2020, 7, 48, 6),
(663, '15', 0, 2020, 7, 48, 7),
(665, '16', 0, 2020, 7, 48, 8),
(667, '99', 0, 2020, 7, 49, 5),
(669, '99', 0, 2020, 7, 49, 6),
(671, '99', 0, 2020, 7, 49, 7),
(673, '99', 0, 2020, 7, 49, 8);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_data`
--

CREATE TABLE `jenis_data` (
  `jenis_id` int NOT NULL,
  `jenis_nm` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_ket` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_data`
--

INSERT INTO `jenis_data` (`jenis_id`, `jenis_nm`, `jenis_ket`, `jenis_created`) VALUES
(101, 'Bulan', 'Data Bulanan', '2020-10-01 17:16:48'),
(102, 'Kecamatan', 'Data Kecamatan', '2020-10-01 17:16:48'),
(105, 'Puskesmas', 'Data Puskesmas', '2020-10-01 17:21:13'),
(106, 'Polsek', 'Data Polsek', '2020-10-01 17:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `kolom_data`
--

CREATE TABLE `kolom_data` (
  `kolom_id` int NOT NULL,
  `kolom_nm` varchar(255) NOT NULL,
  `kolom_tipe` enum('Angka','Text') NOT NULL,
  `tabel_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kolom_data`
--

INSERT INTO `kolom_data` (`kolom_id`, `kolom_nm`, `kolom_tipe`, `tabel_id`, `created`) VALUES
(5, 'Memiliki', 'Angka', 7, '2020-08-19 09:43:21'),
(6, 'Tidak Memiliki', 'Angka', 7, '2020-08-19 09:43:35'),
(7, 'Jumlah Penduduk', 'Angka', 7, '2020-08-19 09:43:44'),
(8, 'Persentase', 'Angka', 7, '2020-08-19 09:43:52'),
(9, 'Jalan Nasional', 'Angka', 10, '2020-08-24 14:04:04'),
(10, 'Jalan Provinsi', 'Angka', 10, '2020-08-24 14:04:16'),
(11, 'Jalan Kabupaten', 'Angka', 10, '2020-08-24 14:04:36'),
(12, 'Kecepatan', 'Angka', 12, '2020-10-02 02:39:06'),
(13, 'Waktu', 'Angka', 12, '2020-10-02 02:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_data`
--

CREATE TABLE `tabel_data` (
  `tabel_id` int NOT NULL,
  `tabel_nm` varchar(255) NOT NULL,
  `unit_id` int NOT NULL,
  `jenis_id` int NOT NULL,
  `_unit_nm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_data`
--

INSERT INTO `tabel_data` (`tabel_id`, `tabel_nm`, `unit_id`, `jenis_id`, `_unit_nm`, `created`) VALUES
(7, 'Jumlah Kepemilikan Akta Kelahiran', 730710, 101, 'Badan Penanggulangan Bencana Daerah', '2020-08-12 11:05:23'),
(10, 'Daftar Panjang Jalan Menurut Keadaan dan Status Jalan (Km)', 730724, 102, 'Dinas Pekerjaan Umum dan Penataan Ruang', '2020-08-18 14:26:12'),
(12, 'adfw', 730715, 0, 'Badan Pendapatan Daerah', '2020-10-02 02:02:03'),
(13, 'baru', 730709, 101, '', '2020-10-02 02:18:35'),
(14, 'sew', 730729, 102, '', '2020-10-02 02:18:55'),
(15, 'wsfef', 730746, 101, '', '2020-10-02 03:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_data`
--

CREATE TABLE `tahun_data` (
  `tahun_id` int NOT NULL,
  `tahun` int NOT NULL
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
  MODIFY `baris_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `isi_data`
--
ALTER TABLE `isi_data`
  MODIFY `isi_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=674;

--
-- AUTO_INCREMENT for table `jenis_data`
--
ALTER TABLE `jenis_data`
  MODIFY `jenis_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `kolom_data`
--
ALTER TABLE `kolom_data`
  MODIFY `kolom_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tabel_data`
--
ALTER TABLE `tabel_data`
  MODIFY `tabel_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tahun_data`
--
ALTER TABLE `tahun_data`
  MODIFY `tahun_id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
