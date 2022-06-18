-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 12:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pupuk_tri`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kel_tani`
--

CREATE TABLE `anggota_kel_tani` (
  `ID_AKT` int(20) NOT NULL,
  `ID_KT` int(20) DEFAULT NULL,
  `NIK` int(50) DEFAULT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `Telp` int(20) DEFAULT NULL,
  `Foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biaya_lain`
--

CREATE TABLE `biaya_lain` (
  `ID_BL` int(20) NOT NULL,
  `ID_SM` int(20) DEFAULT NULL,
  `ID_PJ` int(20) DEFAULT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biaya_lain`
--

INSERT INTO `biaya_lain` (`ID_BL`, `ID_SM`, `ID_PJ`, `Total`) VALUES
(1, 1, 0, 200000),
(2, 0, 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `data_kel_tani`
--

CREATE TABLE `data_kel_tani` (
  `ID_KT` int(50) NOT NULL,
  `NIK` varchar(50) DEFAULT NULL,
  `Nama_Kel` varchar(100) DEFAULT NULL,
  `Nama_Ketua` varchar(50) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `Telp` varchar(50) DEFAULT NULL,
  `Foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kel_tani`
--

INSERT INTO `data_kel_tani` (`ID_KT`, `NIK`, `Nama_Kel`, `Nama_Ketua`, `Alamat`, `Telp`, `Foto`) VALUES
(1, '7687678687687', 'UD ALAM BERKAH', 'Marsidi', 'Malang', '0855567890788', '62ad31f646c22.');

-- --------------------------------------------------------

--
-- Table structure for table `data_pupuk`
--

CREATE TABLE `data_pupuk` (
  `ID_PK` int(20) NOT NULL,
  `Jenis_Pupuk` varchar(50) DEFAULT NULL,
  `Stok` int(20) DEFAULT NULL,
  `Harga` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pupuk`
--

INSERT INTO `data_pupuk` (`ID_PK`, `Jenis_Pupuk`, `Stok`, `Harga`) VALUES
(1, 'UREA', 136, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `ID_PJ` int(10) NOT NULL,
  `ID_KT` int(10) DEFAULT NULL,
  `ID_AKT` varchar(30) DEFAULT NULL,
  `ID_KEY` varchar(10) NOT NULL,
  `Tanggal` varchar(20) NOT NULL,
  `Total` int(20) NOT NULL,
  `Dibayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`ID_PJ`, `ID_KT`, `ID_AKT`, `ID_KEY`, `Tanggal`, `Total`, `Dibayar`) VALUES
(1, 1, '0', 'pwVHf', 'Sat, 18 Jun 2022 ', 1000000, 1000000),
(2, 0, 'Mufid', 'c0yKf', 'Sat, 18 Jun 2022 ', 200000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `ID_PT` int(10) NOT NULL,
  `ID_KT` int(10) DEFAULT NULL,
  `ID_AKT` varchar(30) DEFAULT NULL,
  `ID_KEY` varchar(20) NOT NULL,
  `Debit` int(20) NOT NULL,
  `Kredit` int(20) NOT NULL,
  `Tanggal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`ID_PT`, `ID_KT`, `ID_AKT`, `ID_KEY`, `Debit`, `Kredit`, `Tanggal`) VALUES
(1, 0, 'Mufid', 'c0yKf', 0, 100000, 'Sat, 18 Jun 2022 ');

-- --------------------------------------------------------

--
-- Table structure for table `stok_keluar`
--

CREATE TABLE `stok_keluar` (
  `ID_SK` int(20) NOT NULL,
  `key_transaksi` varchar(20) NOT NULL,
  `Tanggal` varchar(100) DEFAULT NULL,
  `ID_KT` int(20) DEFAULT NULL,
  `ID_AKT` varchar(30) DEFAULT NULL,
  `ID_PK` int(20) DEFAULT NULL,
  `Jumlah_Keluar` int(100) DEFAULT NULL,
  `Harga` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_keluar`
--

INSERT INTO `stok_keluar` (`ID_SK`, `key_transaksi`, `Tanggal`, `ID_KT`, `ID_AKT`, `ID_PK`, `Jumlah_Keluar`, `Harga`) VALUES
(1, 'pwVHf', 'Sat, 18 Jun 2022 ', 1, '', 1, 20, 50000),
(2, 'c0yKf', 'Sat, 18 Jun 2022 ', 0, 'Mufid', 1, 4, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk`
--

CREATE TABLE `stok_masuk` (
  `ID_SM` int(20) NOT NULL,
  `Tanggal` varchar(50) DEFAULT NULL,
  `ID_PK` int(20) DEFAULT NULL,
  `Nama_Pengirim` varchar(100) DEFAULT NULL,
  `Jumlah_Masuk` int(100) DEFAULT NULL,
  `Nominal` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_masuk`
--

INSERT INTO `stok_masuk` (`ID_SM`, `Tanggal`, `ID_PK`, `Nama_Pengirim`, `Jumlah_Masuk`, `Nominal`) VALUES
(1, 'Sat, 18 Jun 2022 ', 1, 'UD ALAM BERKAH', 160, 8000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` int(2) NOT NULL,
  `Gambar` varchar(50) NOT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `Perusahaan` varchar(50) DEFAULT NULL,
  `Job` varchar(50) DEFAULT NULL,
  `Tentang` varchar(500) DEFAULT NULL,
  `No_telp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Nama`, `User_Name`, `Password`, `Status`, `Gambar`, `Alamat`, `Perusahaan`, `Job`, `Tentang`, `No_telp`) VALUES
(1, 'Juned', 'admin', 'admin123', 1, 'jun.jpeg', 'Dampit', 'UD. Tri L', 'Pemilik Perusahaan', 'UD. Tri L adalah perusahaan yang menangani penjualan pupuk dengan mendistribusikan pada masyarakat melalui Kelompok Tani pada setiap daerah', '0812334254');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_kel_tani`
--
ALTER TABLE `anggota_kel_tani`
  ADD PRIMARY KEY (`ID_AKT`);

--
-- Indexes for table `biaya_lain`
--
ALTER TABLE `biaya_lain`
  ADD PRIMARY KEY (`ID_BL`);

--
-- Indexes for table `data_kel_tani`
--
ALTER TABLE `data_kel_tani`
  ADD PRIMARY KEY (`ID_KT`) USING BTREE;

--
-- Indexes for table `data_pupuk`
--
ALTER TABLE `data_pupuk`
  ADD PRIMARY KEY (`ID_PK`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`ID_PJ`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`ID_PT`);

--
-- Indexes for table `stok_keluar`
--
ALTER TABLE `stok_keluar`
  ADD PRIMARY KEY (`ID_SK`);

--
-- Indexes for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  ADD PRIMARY KEY (`ID_SM`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_kel_tani`
--
ALTER TABLE `anggota_kel_tani`
  MODIFY `ID_AKT` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biaya_lain`
--
ALTER TABLE `biaya_lain`
  MODIFY `ID_BL` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_kel_tani`
--
ALTER TABLE `data_kel_tani`
  MODIFY `ID_KT` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_pupuk`
--
ALTER TABLE `data_pupuk`
  MODIFY `ID_PK` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `ID_PJ` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `ID_PT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stok_keluar`
--
ALTER TABLE `stok_keluar`
  MODIFY `ID_SK` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  MODIFY `ID_SM` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
