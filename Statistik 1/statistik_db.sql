-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2020 at 03:25 AM
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
  `judul_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baris_data`
--

INSERT INTO `baris_data` (`baris_id`, `baris_nm`, `judul_id`) VALUES
(1, 'baris satu', 0),
(2, 'Baris Dua', 0);

-- --------------------------------------------------------

--
-- Table structure for table `isi_data`
--

CREATE TABLE `isi_data` (
  `isi_id` int(11) NOT NULL,
  `isi_nm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `judul_data`
--

CREATE TABLE `judul_data` (
  `judul_id` int(11) NOT NULL,
  `judul_nm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judul_data`
--

INSERT INTO `judul_data` (`judul_id`, `judul_nm`) VALUES
(1, 'Judul Dua'),
(2, 'Judul Sepuluh'),
(3, 'Judul Sebelas'),
(4, 'Judul Empat'),
(5, 'Judul Lima'),
(6, 'Judul Lima'),
(7, 'Judul Enam');

-- --------------------------------------------------------

--
-- Table structure for table `kolom_data`
--

CREATE TABLE `kolom_data` (
  `kolom_id` int(11) NOT NULL,
  `kolom_nm` varchar(255) NOT NULL,
  `judul_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`isi_id`);

--
-- Indexes for table `judul_data`
--
ALTER TABLE `judul_data`
  ADD PRIMARY KEY (`judul_id`);

--
-- Indexes for table `kolom_data`
--
ALTER TABLE `kolom_data`
  ADD PRIMARY KEY (`kolom_id`);

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
  MODIFY `baris_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `isi_data`
--
ALTER TABLE `isi_data`
  MODIFY `isi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judul_data`
--
ALTER TABLE `judul_data`
  MODIFY `judul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kolom_data`
--
ALTER TABLE `kolom_data`
  MODIFY `kolom_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun_data`
--
ALTER TABLE `tahun_data`
  MODIFY `tahun_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
