-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 04 Feb 2023 pada 01.10
-- Versi server: 5.7.34
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` varchar(5) NOT NULL,
  `nama_buku` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_penerbit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `nama_buku`, `harga`, `stok`, `id_kategori`, `id_penerbit`) VALUES
('B1001', 'Bisnis Online', 10, 10, 1, 'SP01'),
('B1002', 'Etika Bisnis dan Tanggung Jawab Sosial', 67500, 20, 1, 'SP01'),
('B1003', 'Bisnis Bayam Sehat', 80000, 20, 2, 'SP01'),
('B1004', 'Binsissss', 50000, 20, 3, 'SP02'),
('K1001', 'Analisis & Perancangan Sistem Informasi', 50000, 60, 2, 'SP01'),
('K1002', 'Artifical Intelligence', 45000, 60, 1, 'SP01'),
('K2003', 'Autocad 3 Dimensi', 40000, 25, 2, 'SP01'),
('K3004', 'Cloud Computing Technology', 85000, 15, 2, 'SP01'),
('N1001', 'Cahaya Di Penjuru Hati', 68000, 10, 3, 'SP02'),
('N1002', 'Aku Ingin Cerita', 48000, 12, 3, 'SP03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(2) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Bisnis'),
(2, 'Keilmuan'),
(3, 'Novel'),
(4, 'Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penerbit`
--

CREATE TABLE `tbl_penerbit` (
  `id_penerbit` varchar(6) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_penerbit`
--

INSERT INTO `tbl_penerbit` (`id_penerbit`, `nama`, `alamat`, `kota`, `telepon`) VALUES
('SP01', 'Penerbit Informatika', 'JI. Buah Batu No. 121', 'Bandung', '0813-2220-1946'),
('SP02', 'Andi Offset', 'JI. Suryalaya IX No.3', 'Bandung', '0878-3903-0688'),
('SP03', 'Danendra', 'JI Moch. Toha 44', 'Bandung', '022-5201215');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
