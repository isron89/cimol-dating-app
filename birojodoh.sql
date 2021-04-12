-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 29 Des 2020 pada 07.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `birojodoh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `idakun` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `namadepan` varchar(50) DEFAULT NULL,
  `namabelakang` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `jeniskelamin` varchar(255) DEFAULT NULL,
  `tempatlahir` varchar(255) NOT NULL DEFAULT '',
  `tanggallahir` date NOT NULL DEFAULT '0000-00-00',
  `goldarah` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `hobi` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `pendidikanterakhir` varchar(20) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`idakun`, `username`, `namadepan`, `namabelakang`, `foto`, `jeniskelamin`, `tempatlahir`, `tanggallahir`, `goldarah`, `alamat`, `kota`, `provinsi`, `hobi`, `status`, `pendidikanterakhir`, `bio`) VALUES
(1, 'yessy', 'Yessy', 'Fitrianto', 'muslimah22.jpg', 'P', 'Surabaya', '2018-05-09', 'AB', 'Surabaya', 'Surabaya', 'Jawa Timur', 'Jalan jalan', 'Lajang', 'S1/D4', 'Terimakasih Ya Allah '),
(3, 'paroke', 'Paroke', 'Nimadinaga', 'muslim2.jpg', 'L', 'Gresik', '2019-02-16', 'o', 'Gresik', 'Gresik', 'Jawa Timur', 'Jalan jalan', 'Lajang', 'S1/D4', 'Be my self'),
(4, 'ayu', 'Ayu', 'Citra', 'muslimah1.jpg', 'P', 'Semarang', '2020-12-15', 'B', 'Semarang', 'Semarang', 'Jawa Tengah', 'Makan', 'Lajang', 'S3', 'Penelitian terbaik adalah jodoh'),
(6, 'isron', 'Muhammad', 'Isron', 'muslim1.jpg', 'L', 'Mojokerto', '2001-06-15', 'o', 'Mojokerto', 'Mojokerto', 'jawa Timur', 'Makan', 'Lajang', '', 'Mencoba mencari jakpot'),
(7, 'siti', 'Siti', 'Inka Mufsidah', 'muslimah3.jpg', 'P', '', '0000-00-00', 'o', NULL, 'Lamongan', 'Jawa Timur', 'Makan', 'Lajang', NULL, 'Be your self'),
(8, 'risma', 'Risma', 'Nurfatma', 'user.png', 'P', '', '0000-00-00', 'o', NULL, NULL, 'jawa barat', NULL, 'Lajang', NULL, 'Be your self'),
(9, 'admin', 'Hussein', 'Isron', 'usercowo.png', 'L', 'Jombang', '1999-12-13', 'O', 'Jalan Jaya Negara', 'Mojokerto', 'Jawa Timur', 'Makan', 'Lajang', 'S1/D4', 'Hidup anda adalah masalah'),
(10, 'sahrul', 'Syahrul', 'Irfan', 'keutamaan solat duha.jpg', 'L', 'Jawa Timur', '0000-00-00', 'A', 'Sidoarjo', 'Sidoarjo', 'Jawa Timur', 'Jalan jalan', 'Duda', 'S2', 'ok'),
(11, 'jhjh', 'jkjk', 'admin', 'user.png', 'L', '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, 'Lajang', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `love`
--

CREATE TABLE `love` (
  `Id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `likers` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `love`
--

INSERT INTO `love` (`Id`, `username`, `likers`) VALUES
(1, 'siti', '0'),
(3, 'risma', '0'),
(4, 'admin', '0'),
(5, 'disza', '0'),
(6, 'i', '0'),
(7, 'latifah', '0'),
(8, 'jatnika', '0'),
(32, 'disza', 'i'),
(33, 'admin', 'disza'),
(34, 'risma', 'sahrul'),
(35, 'latifah', 'sahrul'),
(36, 'isni', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `privacy` varchar(255) DEFAULT NULL,
  `idpengirim` varchar(11) NOT NULL DEFAULT '0',
  `idpenerima` varchar(11) NOT NULL DEFAULT '0',
  `isi` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `username`, `privacy`, `idpengirim`, `idpenerima`, `isi`) VALUES
(71, 'i', NULL, 'i', 'isni', 'hai'),
(72, 'isni', NULL, 'isni', 'i', 'iya a'),
(73, 'admin', NULL, 'admin', 'isni', 'ok'),
(74, 'admin', NULL, 'admin', 'yessy', 'ui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `idpengirim` varchar(255) DEFAULT NULL,
  `jenis` int(11) DEFAULT 0,
  `judul` varchar(255) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `jawab` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `idpengirim`, `jenis`, `judul`, `isi`, `jawab`) VALUES
(2, 'isni', 0, 'Cara Logout', 'Bagaimana cara logout', 'Klik logout di sebelah kanan atas'),
(3, 'i', 2, 'Mengubah Nama Username', 'Izin ubah username saya menjadi ikmal', 'kami telah mengubah nama username anda,. :)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_pesan`
--

CREATE TABLE `tmp_pesan` (
  `Id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pengirim` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `lihat` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_pesan`
--

INSERT INTO `tmp_pesan` (`Id`, `username`, `pengirim`, `tujuan`, `isi`, `lihat`) VALUES
(7, 'i', 'i', 'isni', 'tetew', '1'),
(8, 'isni', 'i', 'isni', 'tetew', '1'),
(9, 'isni', 'isni', 'i', 'tetew', '1'),
(10, 'i', 'isni', 'i', 'tetew', '1'),
(11, 'isni', 'isni', 'i', 'tetew', '1'),
(12, 'i', 'isni', 'i', 'tetew', '1'),
(13, 'isni', 'isni', 'i', 'tetew', '1'),
(14, 'i', 'isni', 'i', 'tetew', '1'),
(15, 'i', 'i', 'isni', 'uy uy uy', '1'),
(16, 'isni', 'i', 'isni', 'uy uy uy', '1'),
(17, 'i', 'i', 'isni', 'hai', '1'),
(18, 'isni', 'i', 'isni', 'hai', '1'),
(19, 'i', 'i', 'isni', 'hai', '1'),
(20, 'isni', 'i', 'isni', 'hai', '1'),
(21, 'isni', 'isni', 'i', 'iya a', '1'),
(22, 'i', 'isni', 'i', 'iya a', '1'),
(23, 'admin', 'admin', 'isni', 'ok', '1'),
(24, 'isni', 'admin', 'isni', 'ok', '1'),
(25, 'admin', 'admin', 'yessy', 'ui', '1'),
(26, 'yessy', 'admin', 'yessy', 'ui', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `online` int(11) NOT NULL DEFAULT 1,
  `level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `online`, `level`) VALUES
(3, 'paroke', 'paroke', 0, NULL),
(6, 'ayu', 'ayu', 0, NULL),
(7, 'isron', 'isron', 0, NULL),
(10, 'siti', 'siti', 0, NULL),
(11, 'risma', 'risma', 0, NULL),
(12, 'yessy', 'yessy', 0, NULL),
(13, 'admin', 'admin', 0, 'admin'),
(14, 'sahrul', 'sahrul', 0, NULL),
(15, 'jhjh', '123', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idakun`);

--
-- Indeks untuk tabel `love`
--
ALTER TABLE `love`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tmp_pesan`
--
ALTER TABLE `tmp_pesan`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `idakun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `love`
--
ALTER TABLE `love`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tmp_pesan`
--
ALTER TABLE `tmp_pesan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
