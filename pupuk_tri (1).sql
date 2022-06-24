-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2022 pada 06.29
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `anggota_kel_tani`
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
-- Struktur dari tabel `biaya_lain`
--

CREATE TABLE `biaya_lain` (
  `ID_BL` int(20) NOT NULL,
  `Tanggal` varchar(20) NOT NULL,
  `ID_SM` int(20) DEFAULT NULL,
  `ID_PJ` int(20) DEFAULT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `biaya_lain`
--

INSERT INTO `biaya_lain` (`ID_BL`, `Tanggal`, `ID_SM`, `ID_PJ`, `Total`) VALUES
(1, 'Tue, 21 Jun 2022', 6, 0, 200000),
(2, 'Tue, 21 Jun 2022', 7, 0, 150000),
(3, 'Tue, 21 Jun 2022', 8, 0, 300000),
(4, 'Tue, 21 Jun 2022', 0, 1, 75000),
(5, 'Tue, 21 May 2022', 0, 2, 150000),
(6, 'Tue, 21 May 2022', 0, 5, 100000),
(7, 'Tue, 21 Jun 2022 ', 0, 6, 200000),
(8, 'Tue, 21 Jun 2022 ', 0, 7, 120000),
(9, 'Tue, 21 Jun 2022 ', 0, 10, 100000),
(10, 'Tue, 21 Jun 2022 ', 0, 11, 100000),
(11, 'Tue, 21 Jun 2022 ', 9, 0, 450000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kel_tani`
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
-- Dumping data untuk tabel `data_kel_tani`
--

INSERT INTO `data_kel_tani` (`ID_KT`, `NIK`, `Nama_Kel`, `Nama_Ketua`, `Alamat`, `Telp`, `Foto`) VALUES
(1, '89756456789', 'Tani Sudibjo', 'Komaruddin', 'Sumberpucung Malang', '0894545454', '62b12514650a7.'),
(2, '34354564646', 'Tani Makmur', 'Julidin', 'Malang', '5467545646', '62b1252ba460a.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pupuk`
--

CREATE TABLE `data_pupuk` (
  `ID_PK` int(20) NOT NULL,
  `Jenis_Pupuk` varchar(50) DEFAULT NULL,
  `Stok` int(20) DEFAULT NULL,
  `Harga` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pupuk`
--

INSERT INTO `data_pupuk` (`ID_PK`, `Jenis_Pupuk`, `Stok`, `Harga`) VALUES
(1, 'UREA', 320, 50000),
(2, 'PHONSKA', 63, 20000),
(3, 'KOMPOS', 84, 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `ID_PJ` int(10) NOT NULL,
  `ID_KT` varchar(10) DEFAULT NULL,
  `ID_AKT` varchar(30) DEFAULT NULL,
  `ID_KEY` varchar(10) NOT NULL,
  `Tanggal` varchar(20) NOT NULL,
  `Total` int(20) NOT NULL,
  `Dibayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`ID_PJ`, `ID_KT`, `ID_AKT`, `ID_KEY`, `Tanggal`, `Total`, `Dibayar`) VALUES
(1, '1', '0', 'vvXqJ', 'Tue, 21 Jun 2022 ', 1400000, 1400000),
(2, '2', '0', 'ZtocH', 'Tue, 21 May 2022 ', 1460000, 800000),
(3, '0', 'Mufid', 'uzL2n', 'Tue, 21 Jun 2022 ', 320000, 320000),
(4, '0', 'Maulana', 'gECvT', 'Tue, 21 Jun 2022 ', 1000000, 500000),
(5, '0', 'Umar Bakri', 'K59jn', 'Tue, 21 May 2022 ', 1200000, 1000000),
(6, '1', '0', '6uEWs', 'Tue, 21 Jun 2022 ', 1300000, 1300000),
(7, '2', '0', 'BHTjg', 'Tue, 21 Jun 2022 ', 360000, 360000),
(8, '1', '0', 'D4cYs', 'Tue, 21 Jun 2022 ', 600000, 600000),
(9, '0', 'Maulana', 'izVql', 'Tue, 21 Jun 2022 ', 280000, 280000),
(10, '2', '0', 'eGLWt', 'Tue, 21 Jun 2022 ', 300000, 300000),
(11, '0', 'Maulana', 'aAqqu', 'Tue, 21 Jun 2022 ', 500000, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang`
--

CREATE TABLE `piutang` (
  `ID_PT` int(20) NOT NULL,
  `Tanggal` varchar(20) NOT NULL,
  `ID_KEY` varchar(20) NOT NULL,
  `ID_KT` int(20) NOT NULL,
  `ID_AKT` varchar(30) NOT NULL,
  `Debit` int(20) NOT NULL,
  `Kredit` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `piutang`
--

INSERT INTO `piutang` (`ID_PT`, `Tanggal`, `ID_KEY`, `ID_KT`, `ID_AKT`, `Debit`, `Kredit`) VALUES
(1, 'Tue, 21 Jun 2022', 'ZtocH', 2, '0', 0, 660000),
(2, 'Tue, 21 Jun 2022', 'gECvT', 0, 'Maulana', 0, 500000),
(3, 'Tue, 21 Jun 2022', 'K59jn', 0, 'Umar Bakri', 0, 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_keluar`
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
-- Dumping data untuk tabel `stok_keluar`
--

INSERT INTO `stok_keluar` (`ID_SK`, `key_transaksi`, `Tanggal`, `ID_KT`, `ID_AKT`, `ID_PK`, `Jumlah_Keluar`, `Harga`) VALUES
(3, '7bY9', 'Mon, 13 Jun 2022 ', 0, 'Mahrus ali', 5, 5, 55000),
(4, 'jdN1', 'Mon, 13 Jun 2022 ', 4, '', 5, 20, 50000),
(5, 'ZYSf', 'Mon, 13 Jun 2022 ', 0, 'Naruto', 5, 4, 55000),
(6, '3oM26', 'Thu, 16 Jun 2022 ', 0, 'Marwan Zaheed', 5, 20, 50000),
(7, 'vvXqJ', 'Tue, 21 Jun 2022 ', 1, '', 1, 16, 50000),
(8, 'vvXqJ', 'Tue, 21 Jun 2022 ', 1, '', 3, 20, 30000),
(9, 'vvXqJ', 'Tue, 21 Jun 2022 ', 1, '', 2, 5, 20000),
(10, 'ZtocH', 'Tue, 21 Jun 2022 ', 2, '', 3, 12, 30000),
(11, 'ZtocH', 'Tue, 21 Jun 2022 ', 2, '', 2, 5, 20000),
(12, 'ZtocH', 'Tue, 21 Jun 2022 ', 2, '', 1, 20, 50000),
(13, 'uzL2n', 'Tue, 21 Jun 2022 ', 0, 'Mufid', 3, 2, 30000),
(14, 'uzL2n', 'Tue, 21 Jun 2022 ', 0, 'Mufid', 2, 3, 20000),
(15, 'uzL2n', 'Tue, 21 Jun 2022 ', 0, 'Mufid', 1, 4, 50000),
(16, 'gECvT', 'Tue, 21 Jun 2022 ', 0, 'Maulana', 3, 10, 30000),
(17, 'gECvT', 'Tue, 21 Jun 2022 ', 0, 'Maulana', 2, 10, 20000),
(18, 'gECvT', 'Tue, 21 Jun 2022 ', 0, 'Maulana', 1, 10, 50000),
(19, 'K59jn', 'Tue, 21 Jun 2022 ', 0, 'Umar Bakri', 2, 10, 20000),
(20, 'K59jn', 'Tue, 21 Jun 2022 ', 0, 'Umar Bakri', 1, 20, 50000),
(21, '6uEWs', 'Tue, 21 Jun 2022 ', 1, '', 1, 20, 50000),
(22, '6uEWs', 'Tue, 21 Jun 2022 ', 1, '', 3, 10, 30000),
(23, 'BHTjg', 'Tue, 21 Jun 2022 ', 2, '', 3, 12, 30000),
(24, 'D4cYs', 'Tue, 21 Jun 2022 ', 1, '', 1, 12, 50000),
(25, 'izVql', 'Tue, 21 Jun 2022 ', 0, 'Maulana', 1, 4, 50000),
(26, 'izVql', 'Tue, 21 Jun 2022 ', 0, 'Maulana', 2, 4, 20000),
(27, 'eGLWt', 'Tue, 21 Jun 2022 ', 2, '', 3, 10, 30000),
(28, 'aAqqu', 'Tue, 21 Jun 2022 ', 0, 'Maulana', 1, 10, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_masuk`
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
-- Dumping data untuk tabel `stok_masuk`
--

INSERT INTO `stok_masuk` (`ID_SM`, `Tanggal`, `ID_PK`, `Nama_Pengirim`, `Jumlah_Masuk`, `Nominal`) VALUES
(5, 'Mon, 13 May 2022 ', 5, 'UD MAKMUR', 160, 16000000),
(6, 'Tue, 21 Jun 2022 ', 3, 'UD BERKAH JAYA', 160, 4500000),
(7, 'Tue, 21 Jun 2022 ', 2, 'UD Agro Wiyata', 100, 2000000),
(8, 'Tue, 21 Jun 2022 ', 1, 'UD Maju Bersama', 160, 7000000),
(9, 'Tue, 21 Jun 2022 ', 1, 'UD BERKAH', 160, 8000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Id`, `Nama`, `User_Name`, `Password`, `Status`, `Gambar`, `Alamat`, `Perusahaan`, `Job`, `Tentang`, `No_telp`) VALUES
(1, 'Juned', 'admin', 'admin123', 1, 'jun.jpeg', 'Dampit', 'UD. Tri L', 'Pemilik Perusahaan', 'UD. Tri L adalah perusahaan yang menangani penjualan pupuk dengan mendistribusikan pada masyarakat melalui Kelompok Tani pada setiap daerah', '0812334254');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_kel_tani`
--
ALTER TABLE `anggota_kel_tani`
  ADD PRIMARY KEY (`ID_AKT`);

--
-- Indeks untuk tabel `biaya_lain`
--
ALTER TABLE `biaya_lain`
  ADD PRIMARY KEY (`ID_BL`);

--
-- Indeks untuk tabel `data_kel_tani`
--
ALTER TABLE `data_kel_tani`
  ADD PRIMARY KEY (`ID_KT`) USING BTREE;

--
-- Indeks untuk tabel `data_pupuk`
--
ALTER TABLE `data_pupuk`
  ADD PRIMARY KEY (`ID_PK`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`ID_PJ`);

--
-- Indeks untuk tabel `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`ID_PT`);

--
-- Indeks untuk tabel `stok_keluar`
--
ALTER TABLE `stok_keluar`
  ADD PRIMARY KEY (`ID_SK`);

--
-- Indeks untuk tabel `stok_masuk`
--
ALTER TABLE `stok_masuk`
  ADD PRIMARY KEY (`ID_SM`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota_kel_tani`
--
ALTER TABLE `anggota_kel_tani`
  MODIFY `ID_AKT` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `biaya_lain`
--
ALTER TABLE `biaya_lain`
  MODIFY `ID_BL` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `data_kel_tani`
--
ALTER TABLE `data_kel_tani`
  MODIFY `ID_KT` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_pupuk`
--
ALTER TABLE `data_pupuk`
  MODIFY `ID_PK` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `ID_PJ` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `piutang`
--
ALTER TABLE `piutang`
  MODIFY `ID_PT` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stok_keluar`
--
ALTER TABLE `stok_keluar`
  MODIFY `ID_SK` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `stok_masuk`
--
ALTER TABLE `stok_masuk`
  MODIFY `ID_SM` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
