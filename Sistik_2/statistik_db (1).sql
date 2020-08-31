-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2020 at 05:37 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

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
  `tabel_id` int(11) NOT NULL,
  `baris_induk` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baris_data`
--

INSERT INTO `baris_data` (`baris_id`, `baris_nm`, `tabel_id`, `baris_induk`, `created`) VALUES
(22, 'Sinjai Selatan', 7, 0, '2020-08-19 09:43:00'),
(23, 'Sinjai Utara', 7, 0, '2020-08-19 09:43:07'),
(24, 'Sinjai Tengah', 7, 0, '2020-08-19 09:43:15'),
(25, 'Jenis Permukaan', 10, 0, '2020-08-24 10:40:38'),
(31, 'Kondisi Jalan', 10, 0, '2020-08-24 11:59:20'),
(33, 'Di Aspal', 10, 25, '2020-08-24 14:32:11'),
(35, 'Tanah', 10, 25, '2020-08-24 14:32:39'),
(36, 'Tidak Di Rinci', 10, 31, '2020-08-24 14:32:50'),
(37, 'Pasir', 10, 25, '2020-08-24 14:45:51'),
(45, 'Sinjai Timur', 7, 0, '2020-08-26 10:35:51'),
(48, 'Baris Tiga', 7, 45, '2020-08-26 10:36:56'),
(49, 'baris', 7, 0, '2020-08-26 11:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `isi_data`
--

CREATE TABLE `isi_data` (
  `isi_id` int(11) NOT NULL,
  `isi_value` varchar(255) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `tabel_id` int(11) NOT NULL,
  `baris_id` int(11) NOT NULL,
  `kolom_id` int(11) NOT NULL
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
(435, '1', 0, 2020, 7, 22, 5),
(437, '2', 0, 2020, 7, 22, 6),
(439, '3', 0, 2020, 7, 22, 7),
(441, '4', 0, 2020, 7, 22, 8),
(443, '5', 0, 2020, 7, 23, 5),
(445, '6', 0, 2020, 7, 23, 6),
(447, '7', 0, 2020, 7, 23, 7),
(449, '8', 0, 2020, 7, 23, 8),
(451, '9', 0, 2020, 7, 24, 5),
(453, '10', 0, 2020, 7, 24, 6),
(455, '11', 0, 2020, 7, 24, 7),
(457, '12', 0, 2020, 7, 24, 8),
(459, '', 0, 2020, 7, 45, 5),
(461, '', 0, 2020, 7, 45, 6),
(463, '', 0, 2020, 7, 45, 7),
(465, '', 0, 2020, 7, 45, 8),
(467, '13', 0, 2020, 7, 48, 5),
(469, '14', 0, 2020, 7, 48, 6),
(471, '15', 0, 2020, 7, 48, 7),
(473, '16', 0, 2020, 7, 48, 8),
(475, '99', 0, 2020, 7, 49, 5),
(477, '99', 0, 2020, 7, 49, 6),
(479, '99', 0, 2020, 7, 49, 7),
(481, '99', 0, 2020, 7, 49, 8);

-- --------------------------------------------------------

--
-- Table structure for table `kolom_data`
--

CREATE TABLE `kolom_data` (
  `kolom_id` int(11) NOT NULL,
  `kolom_nm` varchar(255) NOT NULL,
  `kolom_tipe` enum('Angka','Text') NOT NULL,
  `tabel_id` int(11) NOT NULL,
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
(11, 'Jalan Kabupaten', 'Angka', 10, '2020-08-24 14:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_data`
--

CREATE TABLE `tabel_data` (
  `tabel_id` int(11) NOT NULL,
  `tabel_nm` varchar(255) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `unit_nm` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_data`
--

INSERT INTO `tabel_data` (`tabel_id`, `tabel_nm`, `unit_id`, `unit_nm`, `created`) VALUES
(7, 'Jumlah Kepemilikan Akta Kelahiran', 730710, 'Badan Penanggulangan Bencana Daerah', '2020-08-12 11:05:23'),
(10, 'Daftar Panjang Jalan Menurut Keadaan dan Status Jalan (Km)', 730724, 'Dinas Pekerjaan Umum dan Penataan Ruang', '2020-08-18 14:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_data`
--

CREATE TABLE `tahun_data` (
  `tahun_id` int(11) NOT NULL,
  `tahun` int(4) NOT NULL
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
  MODIFY `baris_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `isi_data`
--
ALTER TABLE `isi_data`
  MODIFY `isi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

--
-- AUTO_INCREMENT for table `kolom_data`
--
ALTER TABLE `kolom_data`
  MODIFY `kolom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tabel_data`
--
ALTER TABLE `tabel_data`
  MODIFY `tabel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tahun_data`
--
ALTER TABLE `tahun_data`
  MODIFY `tahun_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
