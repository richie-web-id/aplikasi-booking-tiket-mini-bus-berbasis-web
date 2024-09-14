-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2024 pada 09.50
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_bus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `PNR` varchar(13) NOT NULL,
  `bayar` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `register`
--

CREATE TABLE `register` (
  `userid` varchar(50) NOT NULL COMMENT 'userid',
  `name` varchar(50) NOT NULL COMMENT 'name',
  `email` varchar(50) NOT NULL COMMENT 'email',
  `password` varchar(50) NOT NULL COMMENT 'password',
  `address` varchar(500) NOT NULL COMMENT 'address',
  `contact` varchar(50) NOT NULL COMMENT 'contact'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `register`
--

INSERT INTO `register` (`userid`, `name`, `email`, `password`, `address`, `contact`) VALUES
('AbhijeetMuneshwar', 'Abhijeet Ashok Muneshwar', 'openingknots@gmail.com', 'ABHIJ33T@1', 'Sphurti Vihar, B wing, Survey no. 16, 4/3, 2nd floor, block no. 4, Ambegaon Pathar, Pune ? 411046.', '9174112881'),
('anis', 'anis', 'bebe80@gmail.com', '123', 'mks', '0825121311'),
('cak', 'cak', 'new@new.in', '123', 'mks', '0854124510'),
('hubner', 'hubner', 'hubner@gmail.com', '123', 'england', '0852152066'),
('imin', 'imin', 'new@new.in', '123', 'jakarta', '0852152066'),
('ivar', 'ivar', 'new@new.in', '123', 'mks', '0852152066'),
('lady', 'lady', 'new@new.in', '123', 'jakarta', '0852152066'),
('mahfud', 'mahfud', 'new@new.in', '123', 'mks', '0852152066'),
('messi', 'messi', 'new@new.in', '123', 'mks', '0825121311'),
('Mohit', 'Abhijeet Ashok Muneshwar', 'openingknots@gmail.com', 'Mohit', 'Sphurti Vihar, B wing, Survey no. 16, 4/3, 2nd floor, block no. 4, Ambegaon Pathar, Pune ? 411046.', '9174112881'),
('nisa', 'nisa', 'nisa@gmail.com', '123', 'makassar', '0811545008'),
('omon', 'omon', 'omon@gmail.com', '123', 'arab', '0854124510'),
('prabowo', 'prabowo', 'ucu@yahoo.com', '123', 'jakarta', '0825121311'),
('suyash', 'Suyash', 'suyash@gmal.com', 'suyash', 'NITK', '7984561200'),
('wowo', 'wowo', 'bebe80@gmail.com', '123', 'mks', '0825121311');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `asal` varchar(250) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `tgl` date NOT NULL,
  `jam` varchar(250) NOT NULL,
  `tarif` varchar(250) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id_rute`, `asal`, `tujuan`, `tgl`, `jam`, `tarif`, `kapasitas`) VALUES
(1, 'makassar', 'pinrang', '2024-02-03', '09.00', '130000', 8),
(2, 'makassar', 'pinrang', '2024-02-03', '15.00', '130000', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `seat`
--

CREATE TABLE `seat` (
  `userid` varchar(50) NOT NULL COMMENT 'userid',
  `number` int(10) NOT NULL COMMENT 'seat number',
  `PNR` varchar(13) NOT NULL COMMENT 'PNR',
  `date` date NOT NULL COMMENT 'date of booking',
  `id_rute` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `seat`
--

INSERT INTO `seat` (`userid`, `number`, `PNR`, `date`, `id_rute`) VALUES
('lady', 1, '2024-02-03-1', '2024-02-03', 0),
('lady', 2, '2024-02-03-2', '2024-02-03', 0),
('imin', 3, '2024-02-03-3', '2024-02-03', 0),
('cak', 4, '2024-02-03-4', '2024-02-03', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
