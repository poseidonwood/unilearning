-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2021 at 03:23 PM
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
('CE010', '4444', 'DE12345', '123123123', 'Design & Environment', '3333', 'UNESCO', '2020-07-01', '2021-07-01', 'Tes aja. Hapus ya kalo sudah selesai...', ''),
('CE015', '11', '112312', '123123123132', 'asdasdasd', '22', 'LPK BABASTUDIO CEMPAKA MAS', '2021-02-18', '2021-02-26', 'testasd', 'logo.jpg'),
('CE016', '1111', 'Test', '123123', 'asdasd', '22', '123123', '2021-02-12', '2021-02-19', 'test', 'Screenshot_from_2021-02-08_10-44-39.png'),
('CE017', '11', '1122334455', '123123123132', 'asdasd', '11', 'LPK BABASTUDIO CEMPAKA MAS', '2021-02-11', '2021-02-12', 'test', 'Screenshot_from_2020-10-15_23-39-48.png'),
('CE018', '5555', '12', '121', '1213', '1010', 'qeasd', '2021-02-25', '2021-02-25', 'asd', 'Screenshot_from_2020-09-14_23-32-12.png');

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
-- Table structure for table `e_certificate_revisi`
--

CREATE TABLE `e_certificate_revisi` (
  `kode` varchar(50) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `no_certificate` varchar(50) NOT NULL,
  `no_sio` varchar(100) NOT NULL,
  `jenis_lisensi` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `tanggal_terbit` date DEFAULT NULL,
  `tanggal_expired` date DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `files` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e_certificate_revisi`
--

INSERT INTO `e_certificate_revisi` (`kode`, `employee_id`, `no_certificate`, `no_sio`, `jenis_lisensi`, `pic`, `provider`, `tanggal_terbit`, `tanggal_expired`, `note`, `files`) VALUES
('CE0001', '00001111', 'ABC-111', 'NO-11212', 'Design & Environment', '00001112', 'KEMENAKER', '2021-01-02', '2021-08-02', 'Note test 1', '00001111CE0001.jpg'),
('CE0002', '00001112', 'ABC-110', 'NO-11211', 'Design & Environment', '00001113', 'KEMENAKER', '2021-01-03', '2021-08-03', 'Note test 2', '00001112CE0002.jpg'),
('CE0003', '00001113', 'ABC-109', 'NO-11210', 'Design & Environment', '00001114', 'KEMENAKER', '2021-01-04', '2021-08-04', 'Note test 3', '00001113CE0003.jpg'),
('CE0004', '00001114', 'ABC-108', 'NO-11209', 'Design & Environment', '00001115', 'KEMENAKER', '2021-01-05', '2021-08-05', 'Note test 4', '00001114CE0004.jpg'),
('CE0005', '00001115', 'ABC-107', 'NO-11208', 'Design & Environment', '00001116', 'KEMENAKER', '2021-01-06', '2021-08-06', 'Note test 5', '00001115CE0005.jpg'),
('CE0006', '00001116', 'ABC-106', 'NO-11207', 'Design & Environment', '00001117', 'KEMENAKER', '2021-01-07', '2021-08-07', 'Note test 6', '00001116CE0006.jpg'),
('CE0007', '00001117', 'ABC-105', 'NO-11206', 'Design & Environment', '00001118', 'KEMENAKER', '2021-01-08', '2021-08-08', 'Note test 7', '00001117CE0007.jpg'),
('CE0008', '00001118', 'ABC-104', 'NO-11205', 'Design & Environment', '00001112', 'KEMENAKER', '2021-01-09', '2021-08-09', 'Note test 8', '00001118CE0008.jpg'),
('CE0009', '00001119', 'ABC-103', 'NO-11204', 'Design & Environment', '00001113', 'KEMENAKER', '2021-01-10', '2021-08-10', 'Note test 9', '00001119CE0009.jpg'),
('CE0010', '00001120', 'ABC-102', 'NO-11203', 'Design & Environment', '00001114', 'KEMENAKER', '2021-01-11', '2021-08-11', 'Note test 10', '00001120CE0010.jpg'),
('CE0011', '00001121', 'ABC-101', 'NO-11202', 'Design & Environment', '00001115', 'KEMENAKER', '2021-01-12', '2021-08-12', 'Note test 11', '00001121CE0011.jpg'),
('CE0012', '00001122', 'ABC-100', 'NO-11201', 'Design & Environment', '00001116', 'KAMPUNG INGGRIS', '2021-01-13', '2021-08-13', 'Note test 12', '00001122CE0012.jpg'),
('CE0013', '00001123', 'ABC-99', 'NO-11200', 'Design & Environment', '00001117', 'KAMPUNG INGGRIS', '2021-01-14', '2021-08-14', 'Note test 13', '00001123CE0013.jpg'),
('CE0014', '00001124', 'ABC-98', 'NO-11199', 'Programming Web', '00001118', 'KAMPUNG INGGRIS', '2021-01-15', '2021-08-15', 'Note test 14', '00001124CE0014.jpg'),
('CE0015', '00001125', 'ABC-97', 'NO-11198', 'Programming Web', '00001112', 'KAMPUNG INGGRIS', '2021-01-16', '2021-08-16', 'Note test 15', '00001125CE0015.jpg'),
('CE0016', '00001126', 'ABC-96', 'NO-11197', 'Programming Web', '00001113', 'KAMPUNG INGGRIS', '2021-01-17', '2021-08-17', 'Note test 16', '00001126CE0016.jpg'),
('CE0017', '00001127', 'ABC-95', 'NO-11196', 'Programming Web', '00001114', 'KAMPUNG INGGRIS', '2021-01-18', '2021-08-18', 'Note test 17', '00001127CE0017.jpg'),
('CE0018', '00001128', 'ABC-94', 'NO-11195', 'Programming Web', '00001115', 'KAMPUNG INGGRIS', '2021-01-19', '2021-08-19', 'Note test 18', '00001128CE0018.jpg'),
('CE0019', '00001129', 'ABC-93', 'NO-11194', 'Programming Web', '00001116', 'KAMPUNG INGGRIS', '2021-01-20', '2021-08-20', 'Note test 19', '00001129CE0019.jpg'),
('CE0020', '00001130', 'ABC-92', 'NO-11193', 'Programming Web', '00001117', 'KAMPUNG INGGRIS', '2021-01-21', '2021-08-21', 'Note test 20', '00001130CE0020.jpg'),
('CE0021', '00001131', 'ABC-91', 'NO-11192', 'Programming Web', '00001118', 'KAMPUNG INGGRIS', '2021-01-22', '2021-08-22', 'Note test 21', '00001131CE0021.jpg'),
('CE0022', '00001132', 'ABC-90', 'NO-11191', 'Programming Web', '00001112', 'KAMPUNG INGGRIS', '2021-01-23', '2021-08-23', 'Note test 22', '00001132CE0022.jpg'),
('CE0023', '00001133', 'ABC-89', 'NO-11190', 'Programming Web', '00001113', 'KAMPUNG INGGRIS', '2021-01-24', '2021-08-24', 'Note test 23', '00001133CE0023.jpg'),
('CE0024', '00001134', 'ABC-88', 'NO-11189', 'Programming Web', '00001114', 'KAMPUNG INGGRIS', '2021-01-25', '2021-08-25', 'Note test 24', '00001134CE0024.jpg'),
('CE0025', '00001135', 'ABC-87', 'NO-11188', 'Programming Web', '00001115', 'KAMPUNG INGGRIS', '2021-01-26', '2021-08-26', 'Note test 25', '00001135CE0025.jpg');

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
  `status` enum('aktif','non-aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama`, `email`, `telepon`, `department`, `linemanager`, `location`, `photo`, `created_at`, `update_at`, `status`) VALUES
(22, 'Siti', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(33, 'Eri', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(44, 'Dilla', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(55, 'Soffia', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(111, 'Doni', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(222, 'Diki', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(333, 'Leo', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(444, 'Putri', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(555, 'Mira', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(666, 'Rahma', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(777, 'Silmi', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(888, 'Reza', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(999, 'Arif', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(1010, 'Febri Kukuh Santoso', 'santosofebrikukuh@gmail.com', '6282335494254', 'LM', 8888, 'PC', 'defaultuser.jpg', '2021-02-16 16:54:35', '0000-00-00 00:00:00', 'aktif'),
(2222, 'Amir', '', '8192121211', 'ENG', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(5555, 'Febri Kukuh Santoso', 'santosofebrikukuh@gmail.com', '6282335494254', 'ENG', 7777, 'PW', '1d78069a794e7f924e404ffeebda6438.png', '2021-02-09 12:56:07', '2021-02-17 07:54:15', 'aktif'),
(6666, 'Ghifari', 'ghifari@gmail.com', '6285759864587', 'LM', 1010, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2021-02-20 12:36:18', 'aktif'),
(7777, 'P. Sukmo', 'sukmo.skmi@gmail.com', '6281210910303', 'LM', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(8888, 'Mila', '', '8192121211', 'LM', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(9999, 'Nita', '', '8192121211', 'LM', 2222, 'PW', 'defaultuser.jpg', '2020-02-10 00:00:00', '2020-02-10 00:00:00', 'aktif'),
(121212, 'Devi Indah', 'deviindah@gmail.com', '628222222', 'LM', 1010, 'PC', 'defaultuser.jpg', '2021-02-22 16:01:22', '0000-00-00 00:00:00', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_department`
--

CREATE TABLE `karyawan_department` (
  `id` int(11) NOT NULL,
  `code` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `ket` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan_department`
--

INSERT INTO `karyawan_department` (`id`, `code`, `department`, `ket`, `created_at`) VALUES
(1, 'ENG', 'ENGINGEERING', 'Ini adalah bagian dari engineering', '2021-02-14 17:44:57'),
(2, 'IT', 'IT', 'Ini adalah bagian dari IT', '2021-02-14 17:45:14'),
(3, 'LM', 'LINE MANAGER', 'Ini adalah bagian dari LINE MANAGER', '2021-02-14 17:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_revisi`
--

CREATE TABLE `karyawan_revisi` (
  `employee_id` int(25) NOT NULL,
  `image` varchar(50) NOT NULL,
  `employee_name` varchar(200) NOT NULL,
  `business_title` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `linemanager` int(11) NOT NULL,
  `linemanager_name` varchar(200) NOT NULL,
  `factory` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `status` enum('active','non-active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `whitelist_ip` text DEFAULT NULL,
  `status` enum('T','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `whitelist_ip`, `status`) VALUES
(1, '128.0.0.1', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `materi_cat_id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `video` varchar(200) NOT NULL,
  `document` varchar(200) NOT NULL,
  `passinggrade` int(10) NOT NULL,
  `durasi` int(10) NOT NULL,
  `author` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `materi_cat_id`, `judul`, `isi`, `video`, `document`, `passinggrade`, `durasi`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 'Keselamatan dan Kesehatan Kerja', 'Keselamatan dan Kesehatan Kerja (K3) adalah suatu pemikiran dan upaya untuk menjamin keutuhan dan kesempurnaan jasmani maupun rohani tenaga kerja khususnya dan manusia pada umumnya serta hasil karya dan budaya menuju masyarakat adil dan makmur.', 'video.mp4', 'materi1.pdf', 80, 120, '5555', '2021-02-16 17:08:58', '0000-00-00 00:00:00'),
(2, 2, 'Pencegahan Covid 19', 'Keselamatan dan Kesehatan Kerja (K3) adalah suatu pemikiran dan upaya untuk menjamin keutuhan dan kesempurnaan jasmani maupun rohani tenaga kerja khususnya dan manusia pada umumnya serta hasil karya dan budaya menuju masyarakat adil dan makmur.', 'video.mp4', 'materi1.pdf', 80, 120, '1010', '2021-02-16 17:08:58', '0000-00-00 00:00:00'),
(3, 2, 'Penanganan Covid 19', 'Ini penanganan covid', 'video.mp4', 'materi1.pdf', 80, 120, '1010', '2021-02-16 17:08:58', '0000-00-00 00:00:00'),
(4, 3, 'Ini materi Test', 'Ini deskripsi test', 'video.mp4', 'materi1.pdf', 80, 120, '1010', '2021-02-16 17:08:58', '0000-00-00 00:00:00'),
(5, 2, 'Test Materi', 'Ini test materi ya', 'video.mp4', 'materi1.pdf', 70, 120, '1010', '2021-02-23 08:16:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `materi_category`
--

CREATE TABLE `materi_category` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL,
  `author` int(10) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi_category`
--

INSERT INTO `materi_category` (`id`, `nama`, `deskripsi`, `foto`, `status`, `author`, `created_at`) VALUES
(1, 'GENERALL-ALL', 'Description : Berisi materi materi pelatihan yang mencakup pengetahuan umum ', 'tmb.jpg', 'AKTIF', 5555, '2021-02-16 20:39:10'),
(2, 'COVID19', 'pencegahan covi1d19', '23b4f4b25a708d2f01d85d22f6a1dbdf.jpg', 'AKTIF', 1010, '2021-02-20 20:51:39'),
(3, 'Test', 'asdasd', '6aa9cb0f4455cf2c7601f9ad45d97591.png', 'AKTIF', 1010, '2021-02-20 20:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `materi_jawabanlog`
--

CREATE TABLE `materi_jawabanlog` (
  `id` int(10) NOT NULL,
  `materi_id` int(10) NOT NULL,
  `materi_soal_id` int(10) NOT NULL,
  `jawaban` enum('BENAR','SALAH') NOT NULL,
  `soal` enum('pretest','posttest') NOT NULL,
  `participant` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi_jawabanlog`
--

INSERT INTO `materi_jawabanlog` (`id`, `materi_id`, `materi_soal_id`, `jawaban`, `soal`, `participant`, `created_at`) VALUES
(76, 1, 1, 'BENAR', 'pretest', '5555', '2021-02-20 13:43:09'),
(77, 1, 2, 'BENAR', 'pretest', '5555', '2021-02-20 13:43:09'),
(78, 1, 4, 'SALAH', 'pretest', '5555', '2021-02-20 13:43:09'),
(79, 1, 5, 'SALAH', 'pretest', '5555', '2021-02-20 13:43:09'),
(80, 1, 6, 'SALAH', 'pretest', '5555', '2021-02-20 13:43:09'),
(81, 1, 8, 'SALAH', 'posttest', '5555', '2021-02-20 13:43:59'),
(82, 1, 9, 'BENAR', 'posttest', '5555', '2021-02-20 13:43:59'),
(83, 1, 12, 'SALAH', 'posttest', '5555', '2021-02-20 13:43:59'),
(84, 1, 11, 'SALAH', 'posttest', '5555', '2021-02-20 13:43:59'),
(85, 1, 10, 'BENAR', 'posttest', '5555', '2021-02-20 13:43:59'),
(86, 1, 8, 'SALAH', 'posttest', '5555', '2021-02-20 14:32:38'),
(87, 1, 9, 'SALAH', 'posttest', '5555', '2021-02-20 14:32:38'),
(88, 1, 12, 'SALAH', 'posttest', '5555', '2021-02-20 14:32:38'),
(89, 1, 11, 'SALAH', 'posttest', '5555', '2021-02-20 14:32:38'),
(90, 1, 10, 'SALAH', 'posttest', '5555', '2021-02-20 14:32:38'),
(111, 2, 23, 'SALAH', 'pretest', '121212', '2021-02-22 16:20:27'),
(112, 2, 25, 'BENAR', 'pretest', '121212', '2021-02-22 16:20:27'),
(113, 2, 27, 'SALAH', 'pretest', '121212', '2021-02-22 16:20:27'),
(114, 2, 24, 'SALAH', 'pretest', '121212', '2021-02-22 16:20:27'),
(115, 2, 26, 'BENAR', 'pretest', '121212', '2021-02-22 16:20:27'),
(116, 2, 29, 'BENAR', 'posttest', '121212', '2021-02-22 16:20:47'),
(117, 2, 30, 'BENAR', 'posttest', '121212', '2021-02-22 16:20:47'),
(118, 2, 32, 'SALAH', 'posttest', '121212', '2021-02-22 16:20:47'),
(119, 2, 28, 'SALAH', 'posttest', '121212', '2021-02-22 16:20:47'),
(120, 2, 31, 'BENAR', 'posttest', '121212', '2021-02-22 16:20:47'),
(121, 2, 0, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:28'),
(122, 2, 0, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:28'),
(123, 2, 0, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:28'),
(124, 2, 0, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:28'),
(125, 2, 0, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:28'),
(126, 2, 0, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:34'),
(127, 2, 0, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:34'),
(128, 2, 0, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:34'),
(129, 2, 0, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:34'),
(130, 2, 0, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:34'),
(131, 2, 25, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:47'),
(132, 2, 26, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:47'),
(133, 2, 23, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:47'),
(134, 2, 27, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:47'),
(135, 2, 24, 'SALAH', 'pretest', '1010', '2021-02-23 01:18:47'),
(136, 3, 17, 'BENAR', 'pretest', '9999', '2021-02-23 11:36:23'),
(137, 3, 16, 'BENAR', 'pretest', '9999', '2021-02-23 11:36:23'),
(138, 3, 15, 'SALAH', 'pretest', '9999', '2021-02-23 11:36:23'),
(139, 3, 14, 'BENAR', 'pretest', '9999', '2021-02-23 11:36:23'),
(140, 3, 13, 'SALAH', 'pretest', '9999', '2021-02-23 11:36:23'),
(141, 3, 20, 'BENAR', 'posttest', '9999', '2021-02-23 11:37:08'),
(142, 3, 19, 'BENAR', 'posttest', '9999', '2021-02-23 11:37:08'),
(143, 3, 21, 'SALAH', 'posttest', '9999', '2021-02-23 11:37:08'),
(144, 3, 22, 'SALAH', 'posttest', '9999', '2021-02-23 11:37:08'),
(145, 3, 18, 'SALAH', 'posttest', '9999', '2021-02-23 11:37:08'),
(146, 2, 23, 'BENAR', 'pretest', '9999', '2021-02-23 11:38:17'),
(147, 2, 26, 'BENAR', 'pretest', '9999', '2021-02-23 11:38:17'),
(148, 2, 24, 'SALAH', 'pretest', '9999', '2021-02-23 11:38:17'),
(149, 2, 27, 'SALAH', 'pretest', '9999', '2021-02-23 11:38:17'),
(150, 2, 25, 'SALAH', 'pretest', '9999', '2021-02-23 11:38:17'),
(151, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:13'),
(152, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:13'),
(153, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:13'),
(154, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:13'),
(155, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:13'),
(156, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:19'),
(157, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:19'),
(158, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:19'),
(159, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:19'),
(160, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:19'),
(161, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:23'),
(162, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:23'),
(163, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:23'),
(164, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:23'),
(165, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:23'),
(166, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:46'),
(167, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:46'),
(168, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:46'),
(169, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:46'),
(170, 5, 0, 'SALAH', 'pretest', '9999', '2021-02-23 11:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `materi_soal`
--

CREATE TABLE `materi_soal` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(200) NOT NULL,
  `answer_option` text NOT NULL,
  `materi_id` int(10) NOT NULL,
  `category_soal` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `queue` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi_soal`
--

INSERT INTO `materi_soal` (`id`, `question`, `answer`, `answer_option`, `materi_id`, `category_soal`, `author`, `queue`, `created_at`, `update_at`) VALUES
(1, 'Istilah demokrasi berasal dari bahasa Yunani, yaitu dari kata demos dan kratos,\r\nyang dimaksud kratos dalam pengertian demokrasi adalah', 'Kedaulatan', 'Birokrasi,Rakyat,Memerintah,Kedaulatan', 1, 'pretest', '5555', 819, '2021-02-15 00:00:00', '0000-00-00 00:00:00'),
(2, 'Permulaan penerapan demokrasi murni ditemukan di negara', 'Yunani', 'Yunani,Romawi,Amerika Serikat,Inggris', 1, 'pretest', '5555', 619, '2021-02-15 00:00:00', '0000-00-00 00:00:00'),
(3, 'Landasan konstitusional pelaksanaan demokrasi di Indonesia adalah', 'UUD 1945 pasal 28', 'UUD 1945 pasal 26,UUD 1945 pasal 27,UUD 1945 pasal 28,UUD 1945 pasal 29', 1, 'pretest', '5555', 4, '2021-02-15 00:00:00', '0000-00-00 00:00:00'),
(4, 'Sistem demokrasi yang dalam menyalurkan kehendaknya, rakyat memilih wakil-\r\nwakil mereka untuk duduk dalam parlemen dikenal dengan nama', 'Demokrasi tidak langsung', 'Demokrasi langsung,Demokrasi tidak langsung,Demokrasi referendum,Demokrasi materiil', 1, 'pretest', '5555', 976, '2021-02-15 00:00:00', '0000-00-00 00:00:00'),
(5, 'Prinsip pemerintahan demokrasi yaitu adanya supremasi hukum yang\r\nbermakna.', 'Setiap orang sama di dalam hukum', 'Hukum ditegakkan oleh penegak hukum,Hukum dipahami oleh seluruh rakyat,Terdapat lembaga penegak hukum,Setiap orang sama di dalam hukum', 1, 'pretest', '5555', 751, '2021-02-15 00:00:00', '0000-00-00 00:00:00'),
(6, 'Sistem pemerintahan dimana kedaulatan berada di tangan rakyat disebut', 'Demokrasi', 'Parlementer,Otokrasi,Demokrasi,Oligarki', 1, 'pretest', '5555', 342, '2021-02-15 00:00:00', '0000-00-00 00:00:00'),
(7, 'Hasil dari 9 x 50 ÷ 30 adalah….', '5', '5,40,15,35', 1, 'posttest', '5555', 1, '2021-02-15 17:22:39', '0000-00-00 00:00:00'),
(8, 'Soal matematika: Hasil dari 172 – 152 adalah….', '64', '4,16,64,128', 1, 'posttest', '5555', 179, '2021-02-15 17:23:17', '0000-00-00 00:00:00'),
(9, '1 3/4 , diubah ke persen menjadi….', '175%', '125%,145%,165%,175%', 1, 'posttest', '5555', 110, '2021-02-15 17:24:46', '0000-00-00 00:00:00'),
(10, 'Hasil dari 70 – (–25) adalah….', '95', '-95,-45,45,95', 1, 'posttest', '5555', 17, '2021-02-15 17:25:33', '0000-00-00 00:00:00'),
(11, 'Kebun Pak Warno berbentuk persegi panjang dengan ukuran panjang 4,2 dam dan lebar 370 dm. Keliling kebun Pak Warno adalah…meter', '158', '85,124,225,83', 1, 'posttest', '5555', 25, '2021-02-15 17:27:01', '0000-00-00 00:00:00'),
(12, 'Banyak siswa di sekolah Mekar Sari 210 orang, yang terdiri dari 6 kelas dengan jumlah\r\n\r\nperkelas sama. Di kelas tiga bertambah 2 siswa pindahan. Maka jumlah siswa di kelas tiga adalah….', '37', '37,38,39,40', 1, 'posttest', '5555', 63, '2021-02-15 17:28:01', '0000-00-00 00:00:00'),
(13, 'Apa itu Covid ? ', 'Corona Virus Disease 2019 ', 'Corona Virus Disease 2019 ,Congor Nya,Gk tau,Nyerah', 3, 'pretest', '1010', 483, '2021-02-22 15:00:19', '0000-00-00 00:00:00'),
(14, '1+1', '2', '1,2,4,3', 3, 'pretest', '1010', 873, '2021-02-22 15:00:19', '0000-00-00 00:00:00'),
(15, '2+2 ? ', '4', '4,3,2,1', 3, 'pretest', '1010', 497, '2021-02-22 15:00:19', '0000-00-00 00:00:00'),
(16, '2+3 ? ', '5', '3,2,5,7', 3, 'pretest', '1010', 874, '2021-02-22 15:00:19', '0000-00-00 00:00:00'),
(17, '1 x 1 ?', '1', '10,12,9,1', 3, 'pretest', '1010', 29, '2021-02-22 15:00:19', '0000-00-00 00:00:00'),
(18, '3 + 3', '6', '9,8,7,6', 3, 'posttest', '1010', 37, '2021-02-22 15:40:14', '0000-00-00 00:00:00'),
(19, 'kapan hari kemerdekaan negara indonesia', '17 agustus', '26 juli,1 mei ,7 november,17 agustus', 3, 'posttest', '1010', 797, '2021-02-22 15:40:14', '0000-00-00 00:00:00'),
(20, '18 x 2 =', '36', '20,36,45,78', 3, 'posttest', '1010', 862, '2021-02-22 15:40:14', '0000-00-00 00:00:00'),
(21, 'Siapa presiden pertama Indonesia', 'Ir. Soekarno', 'Ir. Soekarno,budi utomo,jokowi,megawati', 3, 'posttest', '1010', 498, '2021-02-22 15:40:14', '0000-00-00 00:00:00'),
(22, 'hari pendidikan nasional diperingati setiap tanggal', '2 Mei ', '17 agustus,28 juli,2 Mei ,8 januari', 3, 'posttest', '1010', 420, '2021-02-22 15:40:14', '0000-00-00 00:00:00'),
(23, 'Membantu ibu menyapu halaman rumah termasuk kerja sama di lingkungan?', 'rumah', 'sekolah,rumah,lapangan,kantor', 2, 'pretest', '1010', 445, '2021-02-22 15:48:44', '0000-00-00 00:00:00'),
(24, 'dalam kerja sama kita harus memiliki sikap', 'saling tolong menolong', 'saling tolong menolong,saling membenci,saling bertengkar,saling mengejek', 2, 'pretest', '1010', 55, '2021-02-22 15:48:44', '0000-00-00 00:00:00'),
(25, 'tari saman berasal dari daerah', 'aceh', 'bali,papua,sulawesi,aceh', 2, 'pretest', '1010', 471, '2021-02-22 15:48:44', '0000-00-00 00:00:00'),
(26, 'rukun islam ada?', '5', '7,5,11,2', 2, 'pretest', '1010', 423, '2021-02-22 15:48:44', '0000-00-00 00:00:00'),
(27, 'Padi dan kapas adalah lambang pancasila ke', 'lima', 'lima,empat,dua,satu', 2, 'pretest', '1010', 760, '2021-02-22 15:48:44', '0000-00-00 00:00:00'),
(28, 'Berapakah FPB dan KPK dari 126 dan 198 ', '18 dan 1386', '19 dan 1438,18 dan 1683,18 dan 1386,19 dan 1376', 2, 'posttest', '1010', 377, '2021-02-22 15:58:54', '0000-00-00 00:00:00'),
(29, 'patung merupakan karya seni rupa', '3 dimensi', '1 dimensi ,2 dimensi,3 dimensi, kerajinan', 2, 'posttest', '1010', 865, '2021-02-22 15:58:54', '0000-00-00 00:00:00'),
(30, 'keramik di jawa tengah sebagian besar terbuat dari', 'tanah liat', 'semen,tanah liat,kapur,logam', 2, 'posttest', '1010', 522, '2021-02-22 15:58:54', '0000-00-00 00:00:00'),
(31, 'After January is….', 'February', 'February,March,September,May', 2, 'posttest', '1010', 167, '2021-02-22 15:58:54', '0000-00-00 00:00:00'),
(32, 'blue ocean dalam bahasa indonesia berarti', 'samudera biru', 'langit biru,rumah biru,samudera biru,hutan biru', 2, 'posttest', '1010', 519, '2021-02-22 15:58:54', '0000-00-00 00:00:00'),
(33, 'Kenapa bumi itu bulat?', 'Takdir', 'Gk tau,Ntah kenapa,Nyerah,Takdir', 4, 'pretest', '1010', 772, '2021-02-23 13:12:01', '0000-00-00 00:00:00'),
(34, '10 + 10 ', '20', '21,19,12,20', 4, 'pretest', '1010', 623, '2021-02-23 13:12:01', '0000-00-00 00:00:00'),
(35, '10:2', '5', '1,2,5,3', 4, 'pretest', '1010', 328, '2021-02-23 13:12:01', '0000-00-00 00:00:00'),
(36, '2x + x = ', '3x', '1z,2v,2v,3x', 4, 'pretest', '1010', 293, '2021-02-23 13:12:01', '0000-00-00 00:00:00'),
(37, 'Penemu lampu', 'Gak tau', 'Gak tau,Belum beli,Tidak tau dimana,ntah', 4, 'pretest', '1010', 156, '2021-02-23 13:12:01', '0000-00-00 00:00:00'),
(38, 'Tahun berapa Titanic tenggelam di Samudra Atlantik pada 15 April, dalam pelayaran perdananya dari Southampton?', '1912', '1928,1923,1912,1911', 4, 'posttest', '1010', 202, '2021-02-23 13:17:42', '0000-00-00 00:00:00'),
(39, 'Berapa banyak nafas yang diambil tubuh manusia setiap hari?', '20,000 setiap hari', '1,000 setiap hari,10,000 setiap hari,20,000 setiap hari,30,000 setiap hari', 4, 'posttest', '1010', 293, '2021-02-23 13:17:42', '0000-00-00 00:00:00'),
(40, 'Apa nama film 2015 tentang seorang perbatasan pada ekspedisi perdagangan bulu pada tahun 1820-an dan perjuangannya untuk bertahan hidup setelah dianiaya oleh beruang?', 'The Revenant', 'The Revenant,The Godfather,The Avenger,The Guys', 4, 'posttest', '1010', 644, '2021-02-23 13:17:42', '0000-00-00 00:00:00'),
(41, 'Apa nama panggilan klub sepakbola Bradford City?', 'Bantams', 'Bustom,Bantams,Barids,Barats', 4, 'posttest', '1010', 860, '2021-02-23 13:17:42', '0000-00-00 00:00:00'),
(42, 'Siapa yang menjatuhkan palu dan bulu di Bulan untuk menunjukkan bahwa tanpa udara mereka jatuh dengan kecepatan yang sama?', 'David R. Scott', 'David R. Scott,David Luwis,David Costa,David Nurbiyanto', 4, 'posttest', '1010', 18, '2021-02-23 13:17:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message_format`
--

CREATE TABLE `message_format` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `fungsi` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_format`
--

INSERT INTO `message_format` (`id`, `message`, `fungsi`, `created_at`, `status`) VALUES
(2, 'Hai {{nama}},\r\nAkun anda berhasil di daftar kan ke E-LEARNING UNILEVER.\r\nSilahkan login ke {{domain}} dan masukkan data NIP anda dengan password anda : *{{password}}* \r\n\r\n\r\nTerimakasih.\r\nTEAM E-LEARNING UNILEVER.', 'user_add', '2021-02-14 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `message_log`
--

CREATE TABLE `message_log` (
  `id` int(11) NOT NULL,
  `message` int(11) NOT NULL,
  `sendto` int(11) NOT NULL,
  `sendby` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

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
(34, 5555, 'santosofebrikukuh@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'KARYAWAN', 'aktif', '2021-02-16 12:46:15'),
(35, 1010, 'santosofebrikukuh@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'TRAINER', 'aktif', '2021-02-16 20:45:51'),
(36, 6666, 'ghifari@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'LINE MANAGER', 'aktif', '2021-02-20 12:36:42'),
(37, 121212, 'deviindah@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'KARYAWAN', 'aktif', '2021-02-22 16:01:49'),
(38, 9999, 'test@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'KARYAWAN', 'aktif', '2021-02-23 11:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `users_loglogin`
--

CREATE TABLE `users_loglogin` (
  `id_log` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `start_login` datetime DEFAULT NULL,
  `end_login` datetime DEFAULT NULL,
  `selisih_waktu` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `map` varchar(200) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_loglogin`
--

INSERT INTO `users_loglogin` (`id_log`, `id_user`, `email`, `nama`, `start_login`, `end_login`, `selisih_waktu`, `device`, `ip`, `map`, `status`) VALUES
(9714, '1375', 'santosofebrikukuh@gmail.com', 'Febri Kukuh Santoso', '2020-08-24 15:39:35', '2020-08-24 15:41:33', '1.97 minute', 'Chrome 84.0.4147.135 | Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', '::1 | ', '', 'LOGOUT'),
(9715, '5555', 'santosofebrikukuh@gmail.com', 'Febri Kukuh Santoso', '2021-02-24 17:00:04', '2021-02-24 17:01:33', '0', 'Chrome 88.0.4324.146', '127.0.0.1', 'https://www.latlong.net/c/?lat=&long=', 'LOGOUT'),
(9716, '5555', 'santosofebrikukuh@gmail.com', 'Febri Kukuh Santoso', '2021-02-24 17:02:16', '2021-02-24 17:02:44', '0', 'Chrome 88.0.4324.146', '127.0.0.1', 'https://www.latlong.net/c/?lat=-8.1717811&long=112.5252771', 'LOGOUT'),
(9717, '5555', 'santosofebrikukuh@gmail.com', 'Febri Kukuh Santoso', '2021-02-25 13:09:00', '0000-00-00 00:00:00', '0', 'Safari 604.1', '127.0.0.1', 'https://www.latlong.net/c/?lat=&long=', 'LOGIN');

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

-- --------------------------------------------------------

--
-- Table structure for table `users_materi_category`
--

CREATE TABLE `users_materi_category` (
  `id` int(10) NOT NULL,
  `materi_cat_id` int(10) NOT NULL,
  `materi_cat_name` varchar(100) NOT NULL,
  `nip` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_materi_category`
--

INSERT INTO `users_materi_category` (`id`, `materi_cat_id`, `materi_cat_name`, `nip`, `created_at`, `update_at`) VALUES
(8, 1, '', 5555, '2021-02-23 10:10:07', '0000-00-00 00:00:00'),
(9, 2, '', 121212, '2021-02-23 10:10:27', '0000-00-00 00:00:00'),
(10, 2, 'COVID19', 5555, '2021-02-23 10:26:36', '0000-00-00 00:00:00'),
(11, 2, 'COVID19', 9999, '2021-02-23 11:34:40', '0000-00-00 00:00:00'),
(12, 3, 'Test', 9999, '2021-02-23 13:05:15', '0000-00-00 00:00:00'),
(13, 3, 'Test', 121212, '2021-02-23 13:09:22', '0000-00-00 00:00:00'),
(14, 3, 'Test', 5555, '2021-02-23 13:09:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_materi_potition`
--

CREATE TABLE `users_materi_potition` (
  `id` int(10) NOT NULL,
  `materi_id` int(10) NOT NULL,
  `materi_cat_id` int(10) NOT NULL,
  `nip` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `materi_potition` enum('pretest','materi','posttest','final') NOT NULL,
  `start_test` datetime NOT NULL,
  `end_test` datetime NOT NULL,
  `expired_test` datetime NOT NULL,
  `result` enum('LULUS','TIDAK LULUS','ONGOING') NOT NULL,
  `pretest` int(11) NOT NULL,
  `posttest` int(11) NOT NULL,
  `passinggrade` int(11) NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_materi_potition`
--

INSERT INTO `users_materi_potition` (`id`, `materi_id`, `materi_cat_id`, `nip`, `nama`, `materi_potition`, `start_test`, `end_test`, `expired_test`, `result`, `pretest`, `posttest`, `passinggrade`, `update_at`) VALUES
(1, 1, 1, 5555, 'Febri Kukuh Santoso', 'final', '2021-02-19 18:38:49', '2021-02-20 14:32:38', '2021-02-20 14:00:39', 'TIDAK LULUS', 40, 40, 70, '2021-02-16 00:00:00'),
(2, 2, 2, 121212, 'Devi Indah', 'final', '2021-02-22 18:38:49', '2021-02-22 16:20:47', '2021-02-22 17:00:39', 'TIDAK LULUS', 40, 60, 80, '2021-02-16 00:00:00'),
(3, 3, 2, 5555, 'Febri Kukuh Santoso', 'pretest', '2021-02-23 11:22:03', '0000-00-00 00:00:00', '2021-02-23 13:22:03', 'ONGOING', 0, 0, 80, '0000-00-00 00:00:00'),
(4, 2, 2, 5555, 'Febri Kukuh Santoso', 'pretest', '2021-02-23 11:22:27', '0000-00-00 00:00:00', '2021-02-23 13:22:27', 'ONGOING', 0, 0, 80, '0000-00-00 00:00:00'),
(5, 3, 2, 9999, 'Nita', 'final', '2021-02-23 11:35:43', '2021-02-23 11:37:08', '2021-02-23 13:35:43', 'TIDAK LULUS', 60, 40, 80, '0000-00-00 00:00:00'),
(6, 2, 2, 9999, 'Nita', 'materi', '2021-02-23 11:37:33', '0000-00-00 00:00:00', '2021-02-23 13:37:33', 'ONGOING', 40, 0, 80, '0000-00-00 00:00:00'),
(7, 5, 2, 5555, 'Febri Kukuh Santoso', 'pretest', '2021-02-23 11:44:37', '0000-00-00 00:00:00', '2021-02-23 13:44:37', 'ONGOING', 0, 0, 70, '0000-00-00 00:00:00'),
(8, 5, 2, 9999, 'Nita', 'posttest', '2021-02-23 11:47:53', '0000-00-00 00:00:00', '2021-02-23 13:47:53', 'ONGOING', 0, 0, 70, '0000-00-00 00:00:00'),
(10, 4, 3, 5555, 'Febri Kukuh Santoso', 'pretest', '2021-02-23 13:23:31', '0000-00-00 00:00:00', '2021-02-23 15:23:31', 'ONGOING', 0, 0, 80, '0000-00-00 00:00:00'),
(11, 4, 3, 9999, 'Nita', 'pretest', '2021-02-23 15:59:39', '0000-00-00 00:00:00', '2021-02-23 17:59:39', 'ONGOING', 0, 0, 80, '0000-00-00 00:00:00');

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
-- Indexes for table `e_certificate_revisi`
--
ALTER TABLE `e_certificate_revisi`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `karyawan_department`
--
ALTER TABLE `karyawan_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan_revisi`
--
ALTER TABLE `karyawan_revisi`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi_category`
--
ALTER TABLE `materi_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi_jawabanlog`
--
ALTER TABLE `materi_jawabanlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi_soal`
--
ALTER TABLE `materi_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_format`
--
ALTER TABLE `message_format`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_log`
--
ALTER TABLE `message_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `users_loglogin`
--
ALTER TABLE `users_loglogin`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `users_lupapas`
--
ALTER TABLE `users_lupapas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_materi_category`
--
ALTER TABLE `users_materi_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_materi_potition`
--
ALTER TABLE `users_materi_potition`
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
-- AUTO_INCREMENT for table `karyawan_department`
--
ALTER TABLE `karyawan_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `materi_category`
--
ALTER TABLE `materi_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materi_jawabanlog`
--
ALTER TABLE `materi_jawabanlog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `materi_soal`
--
ALTER TABLE `materi_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `message_format`
--
ALTER TABLE `message_format`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message_log`
--
ALTER TABLE `message_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users_loglogin`
--
ALTER TABLE `users_loglogin`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9718;

--
-- AUTO_INCREMENT for table `users_lupapas`
--
ALTER TABLE `users_lupapas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users_materi_category`
--
ALTER TABLE `users_materi_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_materi_potition`
--
ALTER TABLE `users_materi_potition`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
