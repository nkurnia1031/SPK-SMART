-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2020 at 09:15 AM
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
-- Database: `2020_june_tasqi`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `idbooking` varchar(15) NOT NULL,
  `tgl_booking` date DEFAULT NULL,
  `idpengguna` varchar(15) DEFAULT NULL,
  `id_perawatan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` varchar(15) NOT NULL,
  `nama` varchar(30) DEFAULT NULL COMMENT 'Nama Lengkap',
  `jk` varchar(10) DEFAULT NULL COMMENT 'Jenis Kelamin',
  `alamat` varchar(40) DEFAULT NULL COMMENT 'Alamat',
  `no_hp` varchar(12) DEFAULT NULL COMMENT 'No HP',
  `email` varchar(35) DEFAULT NULL COMMENT 'Email',
  `username` varchar(15) DEFAULT NULL COMMENT 'Username',
  `password` varchar(15) DEFAULT NULL COMMENT 'Password',
  `jenis` varchar(10) DEFAULT 'Pelanggan' COMMENT 'Jenis Pengguna'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `nama`, `jk`, `alamat`, `no_hp`, `email`, `username`, `password`, `jenis`) VALUES
('P-5ef81a1707cde', 'Nama Admin', 'Laki-Laki', 'Alamat Admin', '082285610354', 'Admin@admin', 'admin', 'admin', 'Admin'),
('P-5ef836d43c594', '', 'Laki-Laki', '', '', '', '', '', 'Pelanggan'),
('P-5ef85f14966ea', 'Nama Pelanggan', 'Laki-Laki', 'alamat', '8798', '99@1', 'pelanggan', '1', 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id_perawatan` varchar(15) NOT NULL COMMENT 'ID Perawatan',
  `nama_perawatan` varchar(30) DEFAULT NULL COMMENT 'Nama Perawatan',
  `jenis_perawatan` varchar(25) DEFAULT NULL COMMENT 'Jenis Perawatan',
  `harga` int(12) DEFAULT NULL COMMENT 'Harga',
  `gambar` text COMMENT 'Gambar',
  `desk` text COMMENT 'Deskripsi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idbooking`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
