-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 04:44 PM
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
  `Tanggal` varchar(20) DEFAULT NULL,
  `ID_SM` int(20) DEFAULT NULL,
  `ID_PJ` int(20) DEFAULT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biaya_lain`
--

INSERT INTO `biaya_lain` (`ID_BL`, `Tanggal`, `ID_SM`, `ID_PJ`, `Total`) VALUES
(7, 'Wed, 13 Jul 2022 ', 7, 0, 150000),
(8, 'Thu, 14 Jul 2022 ', 8, 0, 350000),
(9, 'Fri, 15 Jul 2022 ', 9, 0, 350000);

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
(1, '000000000000008', 'LESTARI', 'P YAYAN ', 'SUMBER SARI , JEGONG', '085257276556', '62c7fa1ea4d9e.'),
(2, '979769986896', 'BAROKAH', ' P WASIDI', ' jambangan', '0907896869', '62cf8d152dfa5.'),
(3, '00099999999999999', 'SUBUR MAKMUR', 'P PENDIK/ P SUMARSONO', 'POJOK', '0859186053279', '62cfa173d60f0.'),
(4, '09990000000000', 'MAKMUR JAYA', 'P IDRUS', 'POJOK', '085334246323', '62cfa1f829a40.'),
(5, '00000000000008', 'KARYA MAKMUR', 'P GITO / B JUMIK', 'GRANGSIL', '085755450110', '62cfa30257744.');

-- --------------------------------------------------------

--
-- Table structure for table `data_pupuk`
--

CREATE TABLE `data_pupuk` (
  `ID_PK` int(20) NOT NULL,
  `Jenis_Pupuk` varchar(50) DEFAULT NULL,
  `Stok` int(20) DEFAULT NULL,
  `Harga` int(100) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pupuk`
--

INSERT INTO `data_pupuk` (`ID_PK`, `Jenis_Pupuk`, `Stok`, `Harga`, `Status`) VALUES
(1, 'phonska', 0, 119000, 1),
(2, 'urea', 346, 116500, 1);

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
(1, 1, '0', 'HiIob', 'Sun, 26 Jun 2022 ', 12218000, 0),
(3, 2, '0', 'wgAbL', 'Thu, 14 Jul 2022 ', 19040000, 19040000),
(4, 0, 'p misjan', 'bCLxL', 'Thu, 14 Jul 2022 ', 240000, 240000),
(5, 0, 'lasenu', 'U6Uk7', 'Thu, 14 Jul 2022 ', 240000, 240000),
(6, 0, 'sumiati', 'pRPSV', 'Thu, 14 Jul 2022 ', 240000, 240000),
(7, 1, '0', 'rM41L', 'Fri, 15 Jul 2022 ', 19040000, 0),
(8, 0, 'djari', 'g8txl', 'Fri, 15 Jul 2022 ', 240000, 240000),
(9, 0, 'sutarman ', 'StpEP', 'Fri, 15 Jul 2022 ', 750000, 750000);

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
(1, 1, '', 'HiIob', 0, 12218000, 'Sun, 26 Jun 2022 '),
(3, 1, '', 'Fq12I', 10550000, 0, 'Mon, 11 Jul 2022 '),
(4, 1, '', 'rM41L', 0, 19040000, 'Fri, 15 Jul 2022 ');

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
(1, 'HiIob', 'Sun, 26 Jun 2022 ', 1, '', 2, 13, 116000),
(2, 'HiIob', 'Sun, 26 Jun 2022 ', 1, '', 1, 90, 119000),
(4, 'wgAbL', 'Thu, 14 Jul 2022 ', 2, '', 1, 160, 119000),
(5, 'bCLxL', 'Thu, 14 Jul 2022 ', 0, 'p misjan', 2, 2, 120000),
(6, 'U6Uk7', 'Thu, 14 Jul 2022 ', 0, 'lasenu', 2, 2, 120000),
(7, 'pRPSV', 'Thu, 14 Jul 2022 ', 0, 'sumiati', 2, 2, 120000),
(8, 'rM41L', 'Fri, 15 Jul 2022 ', 1, '', 1, 160, 119000),
(9, 'g8txl', 'Fri, 15 Jul 2022 ', 0, 'djari', 2, 2, 120000),
(10, 'StpEP', 'Fri, 15 Jul 2022 ', 0, 'sutarman ', 2, 6, 125000);

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
  `Nominal` int(100) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_masuk`
--

INSERT INTO `stok_masuk` (`ID_SM`, `Tanggal`, `ID_PK`, `Nama_Pengirim`, `Jumlah_Masuk`, `Nominal`, `Status`) VALUES
(1, 'Fri, 10 Jun 2022 ', 1, 'bambang', 90, 10043190, 0),
(2, 'Sun, 26 Jun 2022 ', 2, 'bambang', 13, 1418183, 0),
(3, 'Fri, 10 Jun 2022 ', 2, 'bambang stok juni', 200, 21818200, 0),
(7, 'Wed, 13 Jul 2022 ', 2, 'bambang', 160, 17454500, 0),
(8, 'Thu, 14 Jul 2022 ', 1, 'p rusdi', 160, 17854500, 0),
(9, 'Fri, 15 Jul 2022 ', 1, 'p budi', 160, 17854500, 0);

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
(1, 'M junaidi ilyas', 'admin', '123', 1, 'De.jpg', 'jl simpang ngurawan ,RT 11 RW 03 DAMPIT , MALANG', 'UD TRI L', '', '', '081945956184');

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
  MODIFY `ID_BL` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_kel_tani`
--
ALTER TABLE `data_kel_tani`
  MODIFY `ID_KT` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_pupuk`
--
ALTER TABLE `data_pupuk`
  MODIFY `ID_PK` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `ID_PJ` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `ID_PT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stok_keluar`
--
ALTER TABLE `stok_keluar`
  MODIFY `ID_SK` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  MODIFY `ID_SM` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
