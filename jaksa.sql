-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Jan 2018 pada 06.15
-- Versi Server: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jaksa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `idBerkas` int(25) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `namaBerkas` varchar(20) NOT NULL,
  `namaAsli` varchar(50) NOT NULL,
  `jenisFile` enum('Private','Publik') NOT NULL DEFAULT 'Publik',
  `createDate` date NOT NULL,
  `updateDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`idBerkas`, `idkategori`, `namaBerkas`, `namaAsli`, `jenisFile`, `createDate`, `updateDate`) VALUES
(1, 1, 'Berkas Perkara', 'Berkas Perkara.pdf', 'Publik', '2018-01-03', '2018-01-03'),
(2, 2, 'Undang-Undang x', 'Undang-Undang x.pdf', 'Publik', '2018-01-03', '2018-01-03'),
(3, 3, 'Berkas Perkara Y', 'Berkas Perkara Y.pdf', 'Publik', '2018-01-03', '2018-01-03'),
(4, 4, 'Undang-Undang Y', 'Undang-Undang Y.pdf', 'Publik', '2018-01-03', '2018-01-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(25) NOT NULL,
  `namaKategori` varchar(20) NOT NULL,
  `createKategori` date NOT NULL,
  `updateKategori` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idKategori`, `namaKategori`, `createKategori`, `updateKategori`) VALUES
(1, 'Kategori 1', '2017-12-09', '2017-12-09'),
(2, 'Kategori 2', '2017-12-09', '2017-12-09'),
(3, 'Kategori 3', '0000-00-00', '2017-12-21'),
(4, 'Kategori 4', '2017-12-21', '2017-12-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `idKecamatan` int(25) NOT NULL,
  `idkota` int(11) NOT NULL,
  `namaKecamatan` varchar(35) NOT NULL,
  `createDate` date NOT NULL,
  `updateDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`idKecamatan`, `idkota`, `namaKecamatan`, `createDate`, `updateDate`) VALUES
(1, 1, 'Luar DIY', '2017-12-09', '2017-12-09'),
(2, 2, 'Kotagede', '2017-12-09', '2017-12-09'),
(3, 2, 'Umbulharjo', '2017-12-09', '2017-12-09'),
(4, 6, 'Berbah', '2017-12-09', '2017-12-09'),
(5, 6, 'Cangkringan', '2017-12-09', '2017-12-09'),
(6, 6, 'Gamping', '2017-12-09', '2017-12-09'),
(7, 6, 'Godean', '2017-12-09', '2017-12-09'),
(8, 6, 'Kalasan', '2017-12-09', '2017-12-09'),
(9, 6, 'Minggir', '2017-12-09', '2017-12-09'),
(10, 6, 'Mlati', '2017-12-09', '2017-12-09'),
(11, 6, 'Moyudan', '2017-12-09', '2017-12-09'),
(12, 6, 'Ngaglik', '2017-12-09', '2017-12-09'),
(13, 6, 'Ngemplak', '2017-12-09', '2017-12-09'),
(14, 6, 'Pakem', '2017-12-09', '2017-12-09'),
(15, 6, 'Prambanan', '2017-12-09', '2017-12-09'),
(16, 6, 'Seyegan', '2017-12-09', '2017-12-09'),
(17, 6, 'Sleman', '2017-12-09', '2017-12-09'),
(18, 6, 'Tempel', '2017-12-09', '2017-12-09'),
(19, 6, 'Turi', '2017-12-09', '2017-12-09'),
(20, 2, 'Danurejan', '2017-12-09', '2017-12-09'),
(21, 2, 'Gedongtengen', '2017-12-09', '2017-12-09'),
(22, 2, 'Gondokusuman', '2017-12-09', '2017-12-09'),
(23, 2, 'Gondomanan', '2017-12-09', '2017-12-09'),
(24, 2, 'Jetis', '2017-12-09', '2017-12-09'),
(25, 2, 'Kraton', '2017-12-09', '2017-12-09'),
(26, 2, 'Mentrijeron', '2017-12-09', '2017-12-09'),
(27, 2, 'Mergangsan', '2017-12-09', '2017-12-09'),
(28, 2, 'Ngampilan', '2017-12-09', '2017-12-09'),
(29, 2, 'Pakualaman', '2017-12-09', '2017-12-09'),
(30, 2, 'Tegalrejo', '2017-12-09', '2017-12-09'),
(31, 2, 'Wirobrajan', '2017-12-09', '2017-12-09'),
(32, 3, 'Bantul', '2017-12-09', '2017-12-09'),
(33, 3, 'Senden', '2017-12-09', '2017-12-09'),
(34, 3, 'Kretek', '2017-12-09', '2017-12-09'),
(35, 3, 'Pundong', '2017-12-09', '2017-12-09'),
(36, 3, 'Imogiri', '2017-12-09', '2017-12-09'),
(37, 3, 'Dlingo', '2017-12-09', '2017-12-09'),
(38, 3, 'Pleret', '2017-12-09', '2017-12-09'),
(39, 3, 'Jetis', '2017-12-09', '2017-12-09'),
(40, 3, 'Bambanglipuro', '2017-12-09', '2017-12-09'),
(41, 3, 'Pandak', '2017-12-09', '2017-12-09'),
(42, 3, 'Pajangan', '2017-12-09', '2017-12-09'),
(43, 3, 'Sewon', '2017-12-09', '2017-12-09'),
(44, 3, 'Banguntapan', '2017-12-09', '2017-12-09'),
(45, 3, 'Piyungan', '2017-12-09', '2017-12-09'),
(46, 3, 'Sedayu', '2017-12-09', '2017-12-09'),
(47, 3, 'Srandakan', '2017-12-09', '2017-12-09'),
(48, 3, 'Kasihan', '2017-12-09', '2017-12-09'),
(49, 4, 'Gedangsari', '2017-12-09', '2017-12-09'),
(50, 4, 'Girisubo', '2017-12-09', '2017-12-09'),
(51, 4, 'Karangmojo', '2017-12-09', '2017-12-09'),
(52, 4, 'Ngawen', '2017-12-09', '2017-12-09'),
(53, 4, 'Nglimpar', '2017-12-09', '2017-12-09'),
(54, 4, 'Paliyan', '2017-12-09', '2017-12-09'),
(55, 4, 'Panggang', '2017-12-09', '2017-12-09'),
(56, 4, 'Patuk', '2017-12-09', '2017-12-09'),
(57, 4, 'Playen', '2017-12-09', '2017-12-09'),
(58, 4, 'Ponjong', '2017-12-09', '2017-12-09'),
(59, 4, 'Purwosari', '2017-12-09', '2017-12-09'),
(60, 4, 'Rongkop', '2017-12-09', '2017-12-09'),
(61, 4, 'Saptosari', '2017-12-09', '2017-12-09'),
(62, 4, 'Semanu', '2017-12-09', '2017-12-09'),
(63, 4, 'Semin', '2017-12-09', '2017-12-09'),
(64, 4, 'Tanjungsari', '2017-12-09', '2017-12-09'),
(65, 4, 'Tepus', '2017-12-09', '2017-12-09'),
(66, 4, 'Wonosari', '2017-12-09', '2017-12-09'),
(67, 5, 'Galur', '2017-12-09', '2017-12-09'),
(68, 5, 'Girimulyo', '2017-12-09', '2017-12-09'),
(69, 5, 'Kalibawang', '2017-12-09', '2017-12-09'),
(70, 5, 'Kokap', '2017-12-09', '2017-12-09'),
(71, 5, 'Lendah', '2017-12-09', '2017-12-09'),
(72, 5, 'Nanggulan', '2017-12-09', '2017-12-09'),
(73, 5, 'Panjatan', '2017-12-09', '2017-12-09'),
(74, 5, 'Samigaluh', '2017-12-09', '2017-12-09'),
(75, 5, 'Pengasih', '2017-12-09', '2017-12-09'),
(76, 5, 'Sentolo', '2017-12-09', '2017-12-09'),
(77, 5, 'Temon', '2017-12-09', '2017-12-09'),
(78, 5, 'Wates', '2017-12-09', '2017-12-09'),
(79, 6, 'Depok', '2017-12-09', '2017-12-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `idKota` int(25) NOT NULL,
  `namaKota` varchar(35) NOT NULL,
  `createDate` date NOT NULL,
  `updateDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`idKota`, `namaKota`, `createDate`, `updateDate`) VALUES
(1, 'Luar DIY', '2017-12-09', '2017-12-09'),
(2, 'Yogyakarta', '2017-12-09', '2017-12-09'),
(3, 'Bantul', '2017-12-09', '2017-12-09'),
(4, 'Gunung Kidul', '2017-12-09', '2017-12-09'),
(5, 'Kulon Progo', '2017-12-09', '2017-12-09'),
(6, 'Sleman', '2017-12-09', '2017-12-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `idPengguna` int(25) NOT NULL,
  `idkecamatan` int(11) NOT NULL,
  `namaPengguna` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `noHP` varchar(12) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `jenisKelamin` enum('L','P') NOT NULL,
  `createDate` date NOT NULL,
  `updateDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`idPengguna`, `idkecamatan`, `namaPengguna`, `alamat`, `noHP`, `tanggalLahir`, `jenisKelamin`, `createDate`, `updateDate`) VALUES
(1, 17, 'Guest', 'Jl. Parasamya No.6, ', '0800000000', '2017-11-29', 'L', '2018-01-03', '2018-01-03'),
(2, 1, 'Dinda Ayu Hanifah', 'Klaten', '08756272881', '1997-02-02', 'P', '2018-01-03', '2018-01-03'),
(3, 1, 'Aulia Feri K', 'Purworejo', '0847372883', '2018-01-03', 'P', '2018-01-03', '2018-01-03'),
(4, 1, 'Lambue Hertita', 'Medan', '08347837482', '2018-01-03', 'P', '2018-01-03', '2018-01-03'),
(5, 1, 'Aan Haris Prasetyo', 'Blimbingsari', '084732423423', '2018-01-03', 'L', '2018-01-03', '2018-01-03'),
(6, 2, 'Aziz Muslim', 'Yogyakarta', '08473286435', '2018-01-03', 'L', '2018-01-03', '2018-01-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(25) NOT NULL,
  `idPengguna` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rule` enum('Admin','Anggota','Pimpinan','Publik') NOT NULL DEFAULT 'Publik',
  `createDate` date NOT NULL,
  `updateDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `idPengguna`, `username`, `password`, `rule`, `createDate`, `updateDate`) VALUES
(1, 1, 'Guest', 'GuestAkun', 'Publik', '2018-01-03', '2018-01-03'),
(2, 2, 'dindayuu', '$2y$10$PEzpaa4LvFBB3h/KQ5OAu./rGgQZmjt8mt3WlEibJBI/pxf2YKcWa', 'Admin', '2018-01-03', '2018-01-03'),
(3, 3, 'Aulia FK', '$2y$10$gJtcDBBqwRmFB1Qx0df1gOvIccNRbGc/9ClWCwQlY8pQAroD.LT8u', 'Anggota', '2018-01-03', '2018-01-03'),
(4, 4, 'Tita', '$2y$10$VuNZfmvgv7g48QqO7csBe.eCiX7jFj/OmdWLOxR6hp0.tzcw6XgvO', 'Anggota', '2018-01-03', '2018-01-03'),
(5, 5, 'Haris', '$2y$10$HdwHrF5n5jmGk1.P13H/KesdWCd6AXVVE/vjJXMP02.PlWOU4QMZm', 'Admin', '2018-01-03', '2018-01-03'),
(6, 6, 'Asiz', '$2y$10$ubCof7Z69AA.fxcZk1UVWOseavqFgPVtxJc6W.ag/ILeSEIzgHCuW', 'Pimpinan', '2018-01-03', '2018-01-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userberkas`
--

CREATE TABLE `userberkas` (
  `idUserBerkas` int(25) NOT NULL,
  `idBerkas` varchar(25) NOT NULL,
  `idUser` varchar(25) NOT NULL,
  `createDate` date NOT NULL,
  `updateDate` date NOT NULL,
  `log` enum('Upload','Download','Open') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `userberkas`
--

INSERT INTO `userberkas` (`idUserBerkas`, `idBerkas`, `idUser`, `createDate`, `updateDate`, `log`) VALUES
(1, '1', '2', '2018-01-03', '2018-01-03', 'Upload'),
(2, '2', '2', '2018-01-03', '2018-01-03', 'Upload'),
(3, '3', '2', '2018-01-03', '2018-01-03', 'Upload'),
(4, '4', '2', '2018-01-03', '2018-01-03', 'Upload'),
(5, '1', '2', '2018-01-03', '2018-01-03', 'Open'),
(6, '1', '3', '2018-01-03', '2018-01-03', 'Open'),
(7, '1', '3', '2018-01-03', '2018-01-03', 'Download'),
(8, '4', '3', '2018-01-03', '2018-01-03', 'Open');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`idBerkas`),
  ADD KEY `jenisFile` (`jenisFile`),
  ADD KEY `jenisFile_2` (`jenisFile`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`idKecamatan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`idKota`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idPengguna`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userberkas`
--
ALTER TABLE `userberkas`
  ADD PRIMARY KEY (`idUserBerkas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `idBerkas` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `idKecamatan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `idKota` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idPengguna` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `userberkas`
--
ALTER TABLE `userberkas`
  MODIFY `idUserBerkas` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
