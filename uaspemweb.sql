-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Agu 2023 pada 15.09
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uaspemweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datawarga`
--

CREATE TABLE `datawarga` (
  `id_warga` int(11) NOT NULL,
  `nik` bigint(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datawarga`
--

INSERT INTO `datawarga` (`id_warga`, `nik`, `nama`, `alamat`) VALUES
(3, 337270872112, 'Solekan', 'gang Atlas V RT01/RW02 Kel.Jupiter Kec.Mars'),
(4, 337182717654, 'Samudi', 'gang Atlas V RT01/RW02 Kel.Jupiter Kec.Mars'),
(6, 337187387654, 'Dahsilah', 'gang Atlas V RT01/RW02 Kel.Jupiter Kec.Mars'),
(7, 337165717654, 'Sutrisno', 'gang Atlas V RT01/RW02 Kel.Jupiter Kec.Mars'),
(8, 337182843654, 'Bayu Kucir', 'gang Atlas V RT01/RW02 Kel.Jupiter Kec.Mars'),
(9, 337165417654, 'Solikin', 'gang Atlas V RT01/RW02 Kel.Jupiter Kec.Mars'),
(10, 337182717231, 'Mujiono', 'gang Atlas V RT01/RW02 Kel.Jupiter Kec.Mars'),
(11, 337232717659, 'Nugroho', 'gang Atlas V RT01/RW02 Kel.Jupiter Kec.Mars'),
(12, 337182987652, 'Suprianto', 'gang Atlas V RT01/RW02 Kel.Jupiter Kec.Mars'),
(13, 337182485656, 'Juwanto', 'gang Atlas V RT01/RW02 Kel.Jupiter Kec.Mars');

-- --------------------------------------------------------

--
-- Struktur dari tabel `twarga`
--

CREATE TABLE `twarga` (
  `id_warga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `uraian` varchar(200) NOT NULL,
  `ditulis` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `twarga`
--

INSERT INTO `twarga` (`id_warga`, `tanggal`, `uraian`, `ditulis`, `kelurahan`, `kecamatan`) VALUES
(2, '2023-06-01', 'Penyuluhan', 'Kepala Desa Atlas', 'Jupiter', 'Mars'),
(3, '2023-06-07', 'Koordinasi', 'Kepala Desa Atlas', 'Jupiter', 'Mars'),
(8, '2023-05-04', 'Sosialisasi', 'Kepala Desa Atlas', 'Jupiter', 'Mars'),
(9, '2023-05-13', 'Pelatihan', 'Kepala Desa Atlas', 'Jupiter', 'Mars'),
(10, '2023-05-30', 'Rapat RT', 'Kepala Desa Atlas', 'Jupiter', 'Mars'),
(13, '2023-05-07', 'Rapat RW', 'Kepala Desa Atlas', 'Jupiter', 'Mars');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Age`, `Password`) VALUES
(1, 'pian aja', '123@gmail.com', 18, '123'),
(2, 'bububa', 'bb@cc.dd', 11, '123'),
(3, 'pphhh', 'pp@pp.pp', 21, '11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datawarga`
--
ALTER TABLE `datawarga`
  ADD PRIMARY KEY (`id_warga`);

--
-- Indeks untuk tabel `twarga`
--
ALTER TABLE `twarga`
  ADD PRIMARY KEY (`id_warga`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datawarga`
--
ALTER TABLE `datawarga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `twarga`
--
ALTER TABLE `twarga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
