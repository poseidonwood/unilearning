-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2021 at 01:36 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skmicoid_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `e_certificate`
--

CREATE TABLE `e_certificate` (
  `kode` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `no_certificate` varchar(50) NOT NULL,
  `no_lisensi` varchar(100) NOT NULL,
  `nama_certificate` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `tanggal_expired` date NOT NULL,
  `note` varchar(200) NOT NULL,
  `files` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e_certificate`
--

INSERT INTO `e_certificate` (`kode`, `nip`, `no_certificate`, `no_lisensi`, `nama_certificate`, `pic`, `provider`, `tanggal_terbit`, `tanggal_expired`, `note`, `files`) VALUES
('CE001', '', 'SER-123-X231', '', 'Surat Ijin Usaha Mantap', 'Karyawannya', 'DPR', '2021-02-01', '2022-10-12', 'Tenang masih setahun', '1.jpg,2.jpg,3.jpg'),
('CE009', '', '123123', '', 'Asdasd', '123123', 'asdasd', '2021-02-02', '2021-02-26', 'asdasda', ''),
('CE010', '', 'DE12345', '', 'Design & Environment', '123456', 'UNESCO', '2020-07-01', '2021-07-01', 'Tes aja. Hapus ya kalo sudah selesai...', '');

-- --------------------------------------------------------

--
-- Table structure for table `e_certificate_files`
--

CREATE TABLE `e_certificate_files` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `files` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` int(25) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `department` varchar(200) NOT NULL,
  `linemanager` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama`, `email`, `telepon`, `department`, `linemanager`, `location`, `photo`, `created_at`, `update_at`, `status`) VALUES
(1111, 'Panjul', '', '', 'Karyawan', 2222, '', '', '2021-02-09 13:15:46', '2021-02-09 13:15:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nip` int(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('KARYAWAN','LINE MANAGER','TRAINER','ADMIN','SUPER ADMIN') NOT NULL,
  `status` enum('aktif','non-aktif') NOT NULL,
  `tanggal_terbit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `email`, `password`, `role`, `status`, `tanggal_terbit`) VALUES
(1, 1111, 'karyawan@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'KARYAWAN', 'aktif', '2021-02-09 10:27:32'),
(2, 2222, 'linemanager@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'LINE MANAGER', 'aktif', '2021-02-08 10:27:42'),
(3, 3333, 'trainer@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'TRAINER', 'aktif', '2021-02-04 10:27:47'),
(4, 4444, 'admin@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'ADMIN', 'aktif', '2021-02-03 10:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `users_lupapas`
--

CREATE TABLE `users_lupapas` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `token_status` enum('EXPIRED','VALID','','') NOT NULL,
  `status_akun` enum('SUCCESS','NOT USED','','') NOT NULL,
  `created_at` datetime NOT NULL,
  `expired_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_lupapas`
--

INSERT INTO `users_lupapas` (`id`, `id_user`, `email_user`, `token`, `token_status`, `status_akun`, `created_at`, `expired_at`) VALUES
(7, '1', 'karyawan@gmail.com', '601a57483f724', 'EXPIRED', 'NOT USED', '2021-02-03 14:56:56', '2021-02-03 15:56:56'),
(8, '1', 'karyawan@gmail.com', '601a6c105400e', 'EXPIRED', 'NOT USED', '2021-02-03 16:25:36', '2021-02-03 17:25:36'),
(9, '1', 'karyawan@gmail.com', '601a6c48d8b9d', 'EXPIRED', 'NOT USED', '2021-02-03 16:26:32', '2021-02-03 16:48:32'),
(10, '3', 'trainer@gmail.com', '601a74145d4d6', 'EXPIRED', 'NOT USED', '2021-02-03 16:59:48', '2021-02-03 17:59:48'),
(11, '1', 'karyawan@gmail.com', '601a74eed4de6', 'EXPIRED', 'NOT USED', '2021-02-03 17:03:26', '2021-02-03 18:03:26'),
(12, '1', 'karyawan@gmail.com', '601a75ae4502f', 'EXPIRED', 'NOT USED', '2021-02-03 17:06:38', '2021-02-03 18:06:38'),
(13, '1', 'karyawan@gmail.com', '601a771e4a6be', 'EXPIRED', 'NOT USED', '2021-02-03 17:12:46', '2021-02-03 18:12:46'),
(14, '3', 'trainer@gmail.com', '601a7fcf54f39', 'EXPIRED', 'NOT USED', '2021-02-03 17:49:51', '2021-02-03 18:49:51'),
(15, '3', 'trainer@gmail.com', '601a89bbef8bd', 'EXPIRED', '', '2021-02-03 18:32:11', '2021-02-03 19:32:11'),
(16, '2', 'linemanager@gmail.com', '601a8bdb6994f', 'EXPIRED', '', '2021-02-03 18:41:15', '2021-02-03 19:41:15'),
(17, '1', 'karyawan@gmail.com', '601a9197bb507', 'EXPIRED', 'NOT USED', '2021-02-03 19:05:43', '2021-02-03 20:05:43'),
(18, '1', 'karyawan@gmail.com', '601a92978e5da', 'EXPIRED', '', '2021-02-03 19:09:59', '2021-02-03 20:09:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `e_certificate`
--
ALTER TABLE `e_certificate`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `e_certificate_files`
--
ALTER TABLE `e_certificate_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `users_lupapas`
--
ALTER TABLE `users_lupapas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `e_certificate_files`
--
ALTER TABLE `e_certificate_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_lupapas`
--
ALTER TABLE `users_lupapas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
