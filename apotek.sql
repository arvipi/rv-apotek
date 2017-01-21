-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2016 at 02:32 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `Obat`
--

CREATE TABLE `Obat` (
  `kodeobat` varchar(11) NOT NULL,
  `jenisobat` varchar(255) NOT NULL,
  `takaranobat` varchar(200) NOT NULL,
  `hargaobat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Obat`
--

INSERT INTO `Obat` (`kodeobat`, `jenisobat`, `takaranobat`, `hargaobat`) VALUES
('CA231', 'Pil', '3 Pil/hari', '50000'),
('LOL123', 'Racun', '100Kali/Hari', '1000'),
('MUA987', 'Serbuk', '1jt Serbuk/Hari', '2500000'),
('RVP147', 'Herbal', '1/hari', '14000'),
('TY331', 'Kapsul', '2 Kapsul/hari', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `Petugas`
--

CREATE TABLE `Petugas` (
  `kodepetugas` int(11) NOT NULL,
  `namapetugas` varchar(255) NOT NULL,
  `userpetugas` varchar(255) NOT NULL,
  `passpetugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Petugas`
--

INSERT INTO `Petugas` (`kodepetugas`, `namapetugas`, `userpetugas`, `passpetugas`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `Transaksi`
--

CREATE TABLE `Transaksi` (
  `id` int(11) NOT NULL,
  `kodeobat` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `namadokter` varchar(255) NOT NULL,
  `jumlahobat` int(11) NOT NULL,
  `biaya` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Transaksi`
--

INSERT INTO `Transaksi` (`id`, `kodeobat`, `tanggal`, `namadokter`, `jumlahobat`, `biaya`) VALUES
(1, 'CA231', '2016-12-07', 'Dr. Sammy', 3, '150000'),
(2, 'TY331', '2016-12-12', 'Boss Ricko', 4, '100000'),
(3, 'RVP147', '2016-12-14', 'Rakha', 1, '14000'),
(4, 'LOL123', '2016-12-18', 'Syalala', 5, '5000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Obat`
--
ALTER TABLE `Obat`
  ADD PRIMARY KEY (`kodeobat`);

--
-- Indexes for table `Petugas`
--
ALTER TABLE `Petugas`
  ADD PRIMARY KEY (`kodepetugas`);

--
-- Indexes for table `Transaksi`
--
ALTER TABLE `Transaksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kodeobat` (`kodeobat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Petugas`
--
ALTER TABLE `Petugas`
  MODIFY `kodepetugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Transaksi`
--
ALTER TABLE `Transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Transaksi`
--
ALTER TABLE `Transaksi`
  ADD CONSTRAINT `Transaksi_ibfk_1` FOREIGN KEY (`kodeobat`) REFERENCES `Obat` (`kodeobat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
