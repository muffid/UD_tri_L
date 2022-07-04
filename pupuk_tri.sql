-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2022 pada 03.39
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
  `Tanggal` varchar(20) DEFAULT NULL,
  `ID_SM` int(20) DEFAULT NULL,
  `ID_PJ` int(20) DEFAULT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pupuk`
--

CREATE TABLE `data_pupuk` (
  `ID_PK` int(20) NOT NULL,
  `Jenis_Pupuk` varchar(50) DEFAULT NULL,
  `Stok` int(20) DEFAULT NULL,
  `Harga` int(100) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang`
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
  `Nominal` int(100) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Admin', 'admin', '123', 1, 'De.jpg', '', 'Nama Perusahaan', '', '', '');

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
  MODIFY `ID_BL` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_kel_tani`
--
ALTER TABLE `data_kel_tani`
  MODIFY `ID_KT` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_pupuk`
--
ALTER TABLE `data_pupuk`
  MODIFY `ID_PK` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `ID_PJ` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `piutang`
--
ALTER TABLE `piutang`
  MODIFY `ID_PT` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stok_keluar`
--
ALTER TABLE `stok_keluar`
  MODIFY `ID_SK` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stok_masuk`
--
ALTER TABLE `stok_masuk`
  MODIFY `ID_SM` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
