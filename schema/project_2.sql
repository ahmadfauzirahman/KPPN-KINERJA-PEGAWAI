-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2018 at 02:58 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cek` ()  BEGIN
UPDATE tindaklanjut SET status='On-Track' WHERE `tanggalPenyelesaian` > CURRENT_DATE;
UPDATE tindaklanjut SET status='Alert' WHERE `tanggalPenyelesaian` = CURRENT_DATE + INTERVAL 3 DAY;
UPDATE tindaklanjut SET status='Alert' WHERE `tanggalPenyelesaian` = CURRENT_DATE + INTERVAL 2 DAY;
UPDATE tindaklanjut SET status='Alert' WHERE `tanggalPenyelesaian` = CURRENT_DATE + INTERVAL 1 DAY;
UPDATE tindaklanjut SET status='Off-Track' WHERE `tanggalPenyelesaian` = CURRENT_DATE ;
UPDATE tindaklanjut SET status='Done' WHERE `tanggalPenyelesaian` < CURRENT_DATE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `kegiatanID` int(11) NOT NULL,
  `kegiatanWaktu` date NOT NULL,
  `agendaKegiatan` text NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `status` enum('Telah Dilaksanakan','Dilaksanakan') NOT NULL,
  `file` text,
  `anggarandana` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`kegiatanID`, `kegiatanWaktu`, `agendaKegiatan`, `tempat`, `pic`, `status`, `file`, `anggarandana`) VALUES
(3, '2018-09-28', 'asdasda', 'Pekanbaru', 'Ahmad Fauzi Rahman', 'Telah Dilaksanakan', 'format_kalkulasi.csv', 'asdsadas'),
(4, '2018-10-02', 'sadad', 'sadsa', 'asdas', 'Dilaksanakan', '2018-09-23-Screenshot from 2018-07-08 21-59-24.png', 'asdsadas');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `hak_akses` enum('Admin','User','Kasubag Umum','Pencairan Dana','Seksi Bank','MSKI','VERA') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `nip`, `alamat`, `nohp`, `email`, `status`, `password`, `hak_akses`) VALUES
(1, 'Ahmad Fauzi Rahman', '11451105806', 'Jalan Kutilang Sakti Perum Puri II No.29', '085215664033', 'ahmad.fauzi.rahman@students.uin-suska.ac.id', 'Aktif', '11451105806', 'Admin'),
(2, '1111', '1111', '111', '1111', '111@gmail.com', 'Aktif', '1111', 'Kasubag Umum'),
(3, '2222', '2222', '2222', '2222', '2222@gmail.com', 'Aktif', '2222', 'Pencairan Dana'),
(4, '3333', '3333', '3333', '3333', '3333@gmail.com', 'Aktif', '3333', 'Seksi Bank'),
(5, '4444', '4444', '4444', '4444', '4444@gmail.com', 'Aktif', '4444', 'MSKI'),
(6, '5555', '5555', '5555', '5555', '5555@gmail.com', 'Aktif', '5555', 'VERA');

-- --------------------------------------------------------

--
-- Table structure for table `rapat`
--

CREATE TABLE `rapat` (
  `rapatID` int(11) NOT NULL,
  `rapatNama` text NOT NULL,
  `rapatTanggal` date NOT NULL,
  `rapatTema` text NOT NULL,
  `statusRapat` enum('Dilaksanakan','Selesai') NOT NULL,
  `file` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rapat`
--

INSERT INTO `rapat` (`rapatID`, `rapatNama`, `rapatTanggal`, `rapatTema`, `statusRapat`, `file`) VALUES
(1, 'Pembuatan Aplikasi ', '2018-09-19', 'Pembuatan Aplikasi Pengawasan Khusus Internal KPPN Pekanbaru', 'Dilaksanakan', NULL),
(2, 'Rapat Tentang Aplikasi', '2018-09-20', 'SBN', 'Selesai', NULL),
(3, 'Rapat Tentang Aplikasi', '2018-09-18', 'Tentang Aplikasi', 'Selesai', NULL),
(4, 'rapat', '2018-09-24', 'asdsasa', 'Dilaksanakan', 'contoh.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tindaklanjut`
--

CREATE TABLE `tindaklanjut` (
  `idTindak` int(11) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `tanggalRapat` date NOT NULL,
  `hasilKesepatakanRapat` text NOT NULL,
  `tanggalPenyelesaian` date NOT NULL,
  `status` enum('Off-Track','On-Track','Alert','Done','Not Status') NOT NULL,
  `unit` enum('Kasubag Umum','Pencairan Dana','Seksi Bank','MSKI','VERA') NOT NULL,
  `syarat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindaklanjut`
--

INSERT INTO `tindaklanjut` (`idTindak`, `tema`, `tanggalRapat`, `hasilKesepatakanRapat`, `tanggalPenyelesaian`, `status`, `unit`, `syarat`) VALUES
(1, '1', '2018-09-19', 'Pembuatan Aplikasi Disetujuii', '2018-09-12', 'Done', 'Pencairan Dana', NULL),
(2, '1', '2018-09-01', 'Berhasil', '2018-09-04', 'Done', 'MSKI', NULL),
(3, '1', '2018-09-09', 'asdasdas', '2018-09-16', 'Done', 'Seksi Bank', NULL),
(4, '1', '2018-09-16', 'sdsads', '2018-09-16', 'Done', 'MSKI', NULL),
(5, '1', '2018-09-15', 'asdadas', '2018-09-22', 'On-Track', 'MSKI', NULL),
(6, '1', '2018-09-20', 'YEs', '2018-09-21', 'Alert', 'Kasubag Umum', NULL),
(7, '1', '2018-09-20', 'YEs', '2018-09-20', 'Alert', 'VERA', NULL),
(8, '1', '2018-09-18', 'Berhasil', '2018-09-20', 'Alert', 'Kasubag Umum', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Vjrp1DOPCgUhR0RFUOmGNJ5T-wZ3lR0t', '$2y$13$czF5t3LxrnQftO8eXTuok.IH4eC9k/9OQh/oPRcC4C1lJL3YvCjjK', NULL, 'admin@gmail.com', 10, 1534566509, 1534566509);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`kegiatanID`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rapat`
--
ALTER TABLE `rapat`
  ADD PRIMARY KEY (`rapatID`);

--
-- Indexes for table `tindaklanjut`
--
ALTER TABLE `tindaklanjut`
  ADD PRIMARY KEY (`idTindak`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `kegiatanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rapat`
--
ALTER TABLE `rapat`
  MODIFY `rapatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tindaklanjut`
--
ALTER TABLE `tindaklanjut`
  MODIFY `idTindak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `statusCek` ON SCHEDULE EVERY 10 SECOND STARTS '2018-09-01 00:00:00' ENDS '2020-12-28 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL cek()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
