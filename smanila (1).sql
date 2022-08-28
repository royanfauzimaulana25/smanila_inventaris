-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2022 pada 04.57
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smanila`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `asetlancar`
--

CREATE TABLE `asetlancar` (
  `idbarang` int(10) NOT NULL,
  `kodebarang` text NOT NULL,
  `namabarang` text NOT NULL,
  `kategori` text NOT NULL,
  `jumlah` int(50) NOT NULL,
  `barangmasuk` int(100) NOT NULL,
  `barangkeluar` int(100) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `asetlancar`
--

INSERT INTO `asetlancar` (`idbarang`, `kodebarang`, `namabarang`, `kategori`, `jumlah`, `barangmasuk`, `barangkeluar`, `satuan`) VALUES
(2, '01.22', 'Lampu', 'Elektronik', 999, 0, 0, ''),
(5, '01.24', 'Meja ', 'Mebel', 102, 95, 0, 'set'),
(28, '01.26', 'Lemari', 'Mebel', 0, 0, 0, ''),
(29, '01.27', 'Lemari', 'Mebel', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `asettetap`
--

CREATE TABLE `asettetap` (
  `id` int(10) DEFAULT NULL,
  `idbarang` text NOT NULL,
  `namabarang` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi` text NOT NULL,
  `jumlah` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, 'nopri.staff@sarpras.com', 'bismillah123'),
(2, 'vhsusanto@gmail.com', 'viohevens28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `asetlancar`
--
ALTER TABLE `asetlancar`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `asetlancar`
--
ALTER TABLE `asetlancar`
  MODIFY `idbarang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
