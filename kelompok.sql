-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 06:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelompok`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(255) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `email`, `password`, `username`, `phone`, `gender`, `status`) VALUES
(4593, 'admin@gmail.com', 'admin', 'Admin Aplikasi', '085xxxxxxxxx', 'Laki Laki', 'admin'),
(5044, 'dewa@gmail.com', 'dewa', 'dewa', '082', 'Laki Laki', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(255) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `nowa` varchar(500) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peta`
--

CREATE TABLE `peta` (
  `id` int(255) NOT NULL,
  `kecamatan` varchar(500) NOT NULL,
  `tglkejadian` date NOT NULL,
  `deskripsi` text NOT NULL,
  `latlokasi` varchar(500) NOT NULL,
  `longlokasi` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `idPelapor` int(255) NOT NULL,
  `month` varchar(500) NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peta`
--

INSERT INTO `peta` (`id`, `kecamatan`, `tglkejadian`, `deskripsi`, `latlokasi`, `longlokasi`, `status`, `idPelapor`, `month`, `file`) VALUES
(2689, 'Binawidya', '2024-06-16', 'parkir liar', '0.5651430041887865', '101.41342163085938', 'Belum', 4593, 'December', '66683b8700c07.jpg'),
(3405, 'Payung Sekaki', '2024-06-07', 'parkir liar', '0.5699922001572388', '101.42153263092041', 'Belum', 4593, 'February', '666838956b070.jpg'),
(3907, 'Binawidya', '2024-06-05', 'parkir liar', '0.5690051959979034', '101.42660200595856', 'Ditanggapi', 5044, 'October', '66606ac35458f.jpg'),
(5435, 'Binawidya', '2024-06-16', 'parkir liar', '0.5651430041887865', '101.41342163085938', 'Belum', 4593, 'September', '66683b9375533.jpg'),
(9076, 'Binawidya', '2024-06-16', 'parkir liar', '0.5651430041887865', '101.41342163085938', 'Belum', 4593, 'May', '66683ba8b0219.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peta`
--
ALTER TABLE `peta`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
