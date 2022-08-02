-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2022 at 03:34 PM
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
(9, 'Fri, 15 Jul 2022 ', 9, 0, 350000),
(10, 'Sat, 16 Jul 2022 ', 10, 0, 350000),
(11, 'Sat, 16 Jul 2022 ', 11, 0, 150000),
(12, 'Mon, 18 Jul 2022 ', 12, 0, 350000),
(13, 'Tue, 19 Jul 2022 ', 13, 0, 150000),
(14, 'Tue, 19 Jul 2022 ', 14, 0, 450000),
(15, 'Wed, 20 Jul 2022 ', 15, 0, 150000),
(16, 'Wed, 20 Jul 2022 ', 16, 0, 350000),
(17, 'Wed, 20 Jul 2022 ', 17, 0, 150000),
(18, 'Tue, 26 Jul 2022 ', 0, 42, 350000);

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
(3, '00099999999999999', 'SUBUR MAKMUR (p pendik)', 'P PENDIK/ P SUMARSONO', 'POJOK', '0859186053279', '62cfa173d60f0.'),
(4, '09990000000000', 'MAKMUR JAYA (p idrus)', 'P IDRUS', 'POJOK', '085334246323', '62cfa1f829a40.'),
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
(1, 'phonska', 267, 119000, 1),
(2, 'urea', 6, 116500, 1);

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
(9, 0, 'sutarman ', 'StpEP', 'Fri, 15 Jul 2022 ', 750000, 750000),
(10, 3, '0', 'GY7fj', 'Sat, 16 Jul 2022 ', 9520000, 0),
(11, 4, '0', '4zGCV', 'Sat, 16 Jul 2022 ', 9520000, 9520000),
(12, 0, 'abd rosid', 'zn3YG', 'Sat, 16 Jul 2022 ', 600000, 600000),
(13, 0, 'setiono', '9dqjJ', 'Sat, 16 Jul 2022 ', 240000, 240000),
(14, 2, '0', '6eThi', 'Mon, 18 Jul 2022 ', 19040000, 0),
(15, 0, 'bu lurah pojok', 'Xpk51', 'Mon, 18 Jul 2022 ', 3750000, 3700000),
(16, 0, 'masruf', 'HzxNW', 'Mon, 18 Jul 2022 ', 125000, 125000),
(17, 0, 'p takim', 'PItTy', 'Mon, 18 Jul 2022 ', 1250000, 1000000),
(18, 0, 'kj luqbari', '8j965', 'Mon, 18 Jul 2022 ', 7500000, 7500000),
(19, 0, 'supriadi', 'JmQSe', 'Mon, 18 Jul 2022 ', 125000, 125000),
(20, 0, 'bla bla', 'BV2Ts', 'Tue, 19 Jul 2022 ', 250000, 250000),
(21, 0, 'ibuk', 'RmUZr', 'Tue, 19 Jul 2022 ', 250000, 0),
(22, 4, '0', 'pCTlV', 'Tue, 19 Jul 2022 ', 9420000, 0),
(23, 3, '0', 'C3sRp', 'Tue, 19 Jul 2022 ', 9420000, 0),
(24, 0, 'ngelak', 'cGM7D', 'Tue, 19 Jul 2022 ', 1250000, 1250000),
(25, 2, '0', 'QXcjw', 'Wed, 20 Jul 2022 ', 19040000, 0),
(26, 0, 'bu lurah pojok', '80HmD', 'Wed, 20 Jul 2022 ', 2690000, 2690000),
(27, 0, 'p takim', '64HGO', 'Thu, 21 Jul 2022 ', 980000, 980000),
(28, 0, 'suroso', 'nEwi0', 'Thu, 21 Jul 2022 ', 120000, 120000),
(29, 0, 'bapak ', 'rEonG', 'Thu, 21 Jul 2022 ', 360000, 360000),
(30, 2, '0', '1Rq5Q', 'Fri, 22 Jul 2022 ', 9320000, 0),
(31, 1, '0', 'MdsIg', 'Fri, 22 Jul 2022 ', 9320000, 0),
(32, 0, 'lasemin', 'W4IiE', 'Fri, 22 Jul 2022 ', 120000, 120000),
(33, 0, 'umi', 'AoZko', 'Fri, 22 Jul 2022 ', 500000, 500000),
(34, 0, 'sriama', 'yajEy', 'Sat, 23 Jul 2022 ', 120000, 120000),
(35, 0, 'bpk', 'lw7Ai', 'Sun, 24 Jul 2022 ', 1500000, 1500000),
(36, 0, 'pak men', 'BeI6W', 'Sun, 24 Jul 2022 ', 360000, 360000),
(37, 0, 'kj sri', 'lOXkd', 'Mon, 25 Jul 2022 ', 1500000, 1500000),
(38, 0, 'people', 'TVsmM', 'Mon, 25 Jul 2022 ', 500000, 500000),
(39, 0, 'grangsil', 'PaGf2', 'Mon, 25 Jul 2022 ', 250000, 250000),
(40, 0, 'p sutarman', 'mXL9w', 'Mon, 25 Jul 2022 ', 780000, 780000),
(41, 0, 'elsa', 'DKRHG', 'Mon, 25 Jul 2022 ', 500000, 500000),
(42, 2, '0', 'XXH1S', 'Tue, 26 Jul 2022 ', 17775000, 0),
(43, 0, 'people', '6J7mE', 'Tue, 26 Jul 2022 ', 250000, 250000),
(44, 0, 'bjro', '1XMnJ', 'Thu, 28 Jul 2022 ', 479000, 479000),
(45, 0, 'uladan', 'xYzsM', 'Thu, 28 Jul 2022 ', 750000, 750000),
(46, 0, 'people', 'lyS1M', 'Fri, 29 Jul 2022 ', 120000, 120000),
(47, 0, 'p takim', 'XOlnj', 'Sat, 30 Jul 2022 ', 375000, 375000),
(48, 0, 'grangsil', 'l0gdc', 'Sat, 30 Jul 2022 ', 120000, 120000),
(49, 0, 'b lurah', 'AghIe', 'Mon, 1 Aug 2022 ', 2000000, 2000000),
(50, 0, 'grangsil', 'Kh1BG', 'Tue, 2 Aug 2022 ', 125000, 125000),
(51, 2, '0', 'uCEDK', 'Tue, 2 Aug 2022 ', 9520000, 0),
(52, 3, '0', 'hGRgY', 'Tue, 2 Aug 2022 ', 9520000, 0),
(53, 0, 'lasenu', 'K9ict', 'Tue, 2 Aug 2022 ', 250000, 250000),
(54, 0, 'abs', 'BpQgO', 'Tue, 2 Aug 2022 ', 119000, 119000);

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
(4, 1, '', 'rM41L', 0, 19040000, 'Fri, 15 Jul 2022 '),
(5, 3, '', 'GY7fj', 0, 9520000, 'Sat, 16 Jul 2022 '),
(6, 2, '', '6eThi', 0, 19040000, 'Mon, 18 Jul 2022 '),
(7, 0, 'bu lurah pojok', 'Xpk51', 0, 50000, 'Mon, 18 Jul 2022 '),
(8, 0, 'p takim', 'PItTy', 0, 250000, 'Mon, 18 Jul 2022 '),
(9, 2, '', 'vGmMy', 19040000, 0, 'Mon, 18 Jul 2022 '),
(10, 0, 'bu lurah pojok', 'qMIxP', 50000, 0, 'Mon, 18 Jul 2022 '),
(11, 0, 'ibuk', 'RmUZr', 0, 250000, 'Tue, 19 Jul 2022 '),
(12, 0, 'ibuk', 'Uhklo', 250000, 0, 'Tue, 19 Jul 2022 '),
(13, 4, '', 'pCTlV', 0, 9420000, 'Tue, 19 Jul 2022 '),
(14, 3, '', 'C3sRp', 0, 9420000, 'Tue, 19 Jul 2022 '),
(15, 2, '', 'QXcjw', 0, 19040000, 'Wed, 20 Jul 2022 '),
(16, 4, '', 'bU0aM', 9420000, 0, 'Wed, 20 Jul 2022 '),
(17, 3, '', 'p51AW', 17000000, 0, 'Wed, 20 Jul 2022 '),
(18, 2, '', 'cLVKh', 19040000, 0, 'Wed, 20 Jul 2022 '),
(19, 0, 'p takim', 'AzKr7', 250000, 0, 'Thu, 21 Jul 2022 '),
(20, 2, '', '1Rq5Q', 0, 9320000, 'Fri, 22 Jul 2022 '),
(21, 1, '', 'MdsIg', 0, 9320000, 'Fri, 22 Jul 2022 '),
(22, 1, '', 'GmGTS', 15800000, 0, 'Mon, 25 Jul 2022 '),
(23, 2, '', 'IQ8y8', 9320000, 0, 'Tue, 26 Jul 2022 '),
(24, 2, '', 'XXH1S', 0, 17775000, 'Tue, 26 Jul 2022 '),
(25, 2, '', 'xpZsg', 17775000, 0, 'Tue, 26 Jul 2022 '),
(26, 3, '', 'V9ATi', 1940000, 0, 'Fri, 29 Jul 2022 '),
(27, 2, '', 'uCEDK', 0, 9520000, 'Tue, 2 Aug 2022 '),
(28, 3, '', 'hGRgY', 0, 9520000, 'Tue, 2 Aug 2022 '),
(29, 3, '', '04LaR', 9520000, 0, 'Tue, 2 Aug 2022 '),
(30, 2, '', 'QuhBP', 9520000, 0, 'Tue, 2 Aug 2022 ');

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
(10, 'StpEP', 'Fri, 15 Jul 2022 ', 0, 'sutarman ', 2, 6, 125000),
(11, 'GY7fj', 'Sat, 16 Jul 2022 ', 3, '', 1, 80, 119000),
(12, '4zGCV', 'Sat, 16 Jul 2022 ', 4, '', 1, 80, 119000),
(13, 'zn3YG', 'Sat, 16 Jul 2022 ', 0, 'abd rosid', 2, 5, 120000),
(14, '9dqjJ', 'Sat, 16 Jul 2022 ', 0, 'setiono', 2, 2, 120000),
(15, '6eThi', 'Mon, 18 Jul 2022 ', 2, '', 1, 160, 119000),
(16, 'Xpk51', 'Mon, 18 Jul 2022 ', 0, 'bu lurah pojok', 1, 30, 125000),
(17, 'HzxNW', 'Mon, 18 Jul 2022 ', 0, 'masruf', 2, 1, 125000),
(18, 'PItTy', 'Mon, 18 Jul 2022 ', 0, 'p takim', 1, 10, 125000),
(19, '8j965', 'Mon, 18 Jul 2022 ', 0, 'kj luqbari', 2, 30, 125000),
(20, '8j965', 'Mon, 18 Jul 2022 ', 0, 'kj luqbari', 1, 30, 125000),
(21, 'JmQSe', 'Mon, 18 Jul 2022 ', 0, 'supriadi', 2, 1, 125000),
(22, 'BV2Ts', 'Tue, 19 Jul 2022 ', 0, 'bla bla', 1, 2, 125000),
(23, 'RmUZr', 'Tue, 19 Jul 2022 ', 0, 'ibuk', 1, 1, 125000),
(24, 'RmUZr', 'Tue, 19 Jul 2022 ', 0, 'ibuk', 2, 1, 125000),
(25, 'pCTlV', 'Tue, 19 Jul 2022 ', 4, '', 2, 40, 116500),
(26, 'pCTlV', 'Tue, 19 Jul 2022 ', 4, '', 1, 40, 119000),
(27, 'C3sRp', 'Tue, 19 Jul 2022 ', 3, '', 2, 40, 116500),
(28, 'C3sRp', 'Tue, 19 Jul 2022 ', 3, '', 1, 40, 119000),
(29, 'cGM7D', 'Tue, 19 Jul 2022 ', 0, 'ngelak', 1, 10, 125000),
(30, 'QXcjw', 'Wed, 20 Jul 2022 ', 2, '', 1, 160, 119000),
(31, '80HmD', 'Wed, 20 Jul 2022 ', 0, 'bu lurah pojok', 2, 12, 120000),
(32, '80HmD', 'Wed, 20 Jul 2022 ', 0, 'bu lurah pojok', 1, 10, 125000),
(33, '64HGO', 'Thu, 21 Jul 2022 ', 0, 'p takim', 2, 4, 120000),
(34, '64HGO', 'Thu, 21 Jul 2022 ', 0, 'p takim', 1, 4, 125000),
(35, 'nEwi0', 'Thu, 21 Jul 2022 ', 0, 'suroso', 2, 1, 120000),
(36, 'rEonG', 'Thu, 21 Jul 2022 ', 0, 'bapak ', 1, 3, 120000),
(37, '1Rq5Q', 'Fri, 22 Jul 2022 ', 2, '', 2, 80, 116500),
(38, 'MdsIg', 'Fri, 22 Jul 2022 ', 1, '', 2, 80, 116500),
(39, 'W4IiE', 'Fri, 22 Jul 2022 ', 0, 'lasemin', 2, 1, 120000),
(40, 'AoZko', 'Fri, 22 Jul 2022 ', 0, 'umi', 1, 4, 125000),
(41, 'yajEy', 'Sat, 23 Jul 2022 ', 0, 'sriama', 1, 1, 120000),
(42, 'lw7Ai', 'Sun, 24 Jul 2022 ', 0, 'bpk', 1, 12, 125000),
(43, 'BeI6W', 'Sun, 24 Jul 2022 ', 0, 'pak men', 1, 3, 120000),
(44, 'lOXkd', 'Mon, 25 Jul 2022 ', 0, 'kj sri', 1, 12, 125000),
(45, 'TVsmM', 'Mon, 25 Jul 2022 ', 0, 'people', 1, 4, 125000),
(46, 'PaGf2', 'Mon, 25 Jul 2022 ', 0, 'grangsil', 1, 2, 125000),
(47, 'mXL9w', 'Mon, 25 Jul 2022 ', 0, 'p sutarman', 2, 6, 130000),
(48, 'DKRHG', 'Mon, 25 Jul 2022 ', 0, 'elsa', 1, 4, 125000),
(49, 'XXH1S', 'Tue, 26 Jul 2022 ', 2, '', 2, 30, 116500),
(50, 'XXH1S', 'Tue, 26 Jul 2022 ', 2, '', 1, 120, 119000),
(51, '6J7mE', 'Tue, 26 Jul 2022 ', 0, 'people', 1, 2, 125000),
(52, '1XMnJ', 'Thu, 28 Jul 2022 ', 0, 'bjro', 2, 3, 120000),
(53, '1XMnJ', 'Thu, 28 Jul 2022 ', 0, 'bjro', 1, 1, 119000),
(54, 'xYzsM', 'Thu, 28 Jul 2022 ', 0, 'uladan', 1, 6, 125000),
(55, 'lyS1M', 'Fri, 29 Jul 2022 ', 0, 'people', 1, 1, 120000),
(56, 'XOlnj', 'Sat, 30 Jul 2022 ', 0, 'p takim', 2, 3, 125000),
(57, 'l0gdc', 'Sat, 30 Jul 2022 ', 0, 'grangsil', 1, 1, 120000),
(58, 'AghIe', 'Mon, 1 Aug 2022 ', 0, 'b lurah', 1, 16, 125000),
(59, 'Kh1BG', 'Tue, 2 Aug 2022 ', 0, 'grangsil', 1, 1, 125000),
(60, 'uCEDK', 'Tue, 2 Aug 2022 ', 2, '', 1, 80, 119000),
(61, 'hGRgY', 'Tue, 2 Aug 2022 ', 3, '', 1, 80, 119000),
(62, 'K9ict', 'Tue, 2 Aug 2022 ', 0, 'lasenu', 1, 2, 125000),
(63, 'BpQgO', 'Tue, 2 Aug 2022 ', 0, 'abs', 1, 1, 119000);

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
(9, 'Fri, 15 Jul 2022 ', 1, 'p budi', 160, 17854500, 0),
(10, 'Sat, 16 Jul 2022 ', 1, 'p rusdi', 160, 17854500, 0),
(11, 'Sat, 16 Jul 2022 ', 1, 'p supri', 160, 17854500, 0),
(12, 'Mon, 18 Jul 2022 ', 1, 'p budi', 160, 17854500, 0),
(13, 'Tue, 19 Jul 2022 ', 1, 'bambang ( tanggal18)', 160, 17854500, 0),
(14, 'Tue, 19 Jul 2022 ', 1, 'bambang', 160, 17854500, 0),
(15, 'Wed, 20 Jul 2022 ', 1, 'bambang', 160, 17854500, 0),
(16, 'Wed, 20 Jul 2022 ', 1, 'bambang/', 160, 17854500, 0),
(17, 'Wed, 20 Jul 2022 ', 1, 'p supri', 160, 17854500, 0);

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
  MODIFY `ID_BL` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `ID_PJ` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `ID_PT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `stok_keluar`
--
ALTER TABLE `stok_keluar`
  MODIFY `ID_SK` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  MODIFY `ID_SM` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
