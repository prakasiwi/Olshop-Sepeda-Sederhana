-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2019 pada 09.56
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(250) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
('ADMN001', 'Hafidz Arrayyan', 'hafidzarrayyan', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` varchar(300) NOT NULL,
  `kode_sepeda` varchar(300) NOT NULL,
  `jumlah` double NOT NULL,
  `harga_beli` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `kode_sepeda`, `jumlah`, `harga_beli`) VALUES
('848315042019', 'SPD0001', 4, 400000),
('480215042019', 'SPD0005', 2, 5700000),
('311616042019', 'SPD0003', 2, 850000),
('311616042019', 'SPD0004', 1, 8500000),
('311616042019', 'SPD0002', 3, 1375000),
('731522042019', 'SPD0002', 2, 1375000),
('731522042019', 'SPD0003', 2, 850000),
('105922042019', 'SPD0002', 3, 1375000),
('615924042019', 'SPD0002', 1, 1375000),
('88628042019', 'SPD0002', 4, 1375000),
('88628042019', 'SPD0005', 6, 5700000),
('770429042019', 'SPD0001', 1, 400000),
('895429042019', 'SPD0001', 2, 400000),
('779430042019', 'SPD0001', 4, 400000),
('954730042019', 'SPD0002', 1, 1375000),
('954730042019', 'SPD0003', 1, 850000),
('173530042019', 'SPD0001', 4, 400000),
('539130042019', 'SPD0003', 24647656, 850000),
('840330042019', 'SPD0002', 900, 1375000),
('134630042019', 'SPD0001', 23456789, 400000),
('272230042019', 'SPD0005', 2.345680997654321e15, 5700000),
('777330042019', 'SPD0004', 9000000000000, 8500000);

--
-- Trigger `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `detail_transaksi` FOR EACH ROW UPDATE sepeda SET stok = stok - NEW.jumlah
WHERE kode_sepeda = NEW.kode_sepeda
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` varchar(250) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `kontak` varchar(250) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama`, `username`, `password`, `kontak`, `alamat`, `gambar`) VALUES
('12345', 'Hafidz Arrayyan', 'hafidzarrayyan', '202cb962ac59075b964b07152d234b70', '081278984523', 'Jl. Danau Ranau XI', '12345-533.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sepeda`
--

CREATE TABLE `sepeda` (
  `kode_sepeda` varchar(250) NOT NULL,
  `merk_sepeda` varchar(300) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `harga` double NOT NULL,
  `stok` double NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sepeda`
--

INSERT INTO `sepeda` (`kode_sepeda`, `merk_sepeda`, `deskripsi`, `harga`, `stok`, `gambar`) VALUES
('SPD0001', 'Sepeda Gunung POLYGON Xtrada8', 'Sepeda ini masih baru anti kw kw CLUB', 400000, -23456746, 'SPD0001-533.png'),
('SPD0002', 'SEPEDA MTB ALLOY PRIMERA ', 'SEPEDA MTB TERPOPULER SE-BUKALAPAK TERJUAL LEBIH DARI 600 PCS  Free ongkir untuk JAWA dan BALI.   Frame Alluminium (ALLOY) ringan, kokoh, tidak akan pernah karat Rem Mekanik Double Cakram Fork Suspensi 21 Speed Transmission Primera Shifter RD Original Shimano Tourney AS Bearing Ban Quick Release Vel', 1375000, -792, 'SPD0002-94.jpeg'),
('SPD0003', 'BMX SENATOR THUNDERBOLT', 'Free ongkir wilayah Jawa dan Bali  Sudah termasuk BMX STEP(Jalu)   Frame Hi Ten Steel Rem VBRAKE Stem Oversized Velg 20 inch Stang BMX  Untuk Gosend dan Grab harap konfirmasi dulu via chat Kiriman JNE dikirim menggunakan JNE JTR', 850000, -24647429, 'SPD0003-18.jpeg'),
('SPD0004', 'Fullbike Mondraker Finalist Brand Spanyol Like New Not Polygon Thrill Mosso Adrenaline Orbea Giant Lapierre Bmc', '	 Like New jrg pakai Brand Spanyol ruingan spec sbb * Frame Mondraker Finalist Custolite size 26 Uk M * Fork Rockshox Recon Air remote trav 120 * Shifter Sram X7 3x10 * Fd Sram X7 3s * Rd Sram X7 10s * Sproket Sram 1030 10s 11-36T * Crank Sram X7 22-33-44 * Brake Elixir 5 * Handlebar Kore Durox 760m', 8500000, -8999999999850, 'SPD0004-179.webp'),
('SPD0005', 'SEPEDA GUNUNG 27.5 THRILL RAVAGE 5.0 MY2018 SATIN GREY BLACK.', 'THRILL RAVAGE 5.0 2018 HADIR DENGAN WARNA YANG LEBIH MENARIK, MENGGUNAKAN FORK RST W/LOCK OUT,SERTA REM HIDOLIS YANG PAKEM UNTUK SEGALA MEDAN...  SPESIFIKASI UMUM: FRAME:NEO-GEOMETRY IN-TUBE CABLE ROUTER FORK:RST BLAZE HLO 100MM TRAVEL SHIFTER:SHIMANO ACERA SL-M3000 2x9SP BRAKE:SHIMANO BR-M315 HIDRA', 5700000, -2.345680997654202e15, 'SPD0005-997.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(250) NOT NULL,
  `id_pembeli` varchar(300) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pembeli`, `tgl`) VALUES
('105922042019', '12345', '2019-04-22'),
('134630042019', '12345', '2019-04-30'),
('173530042019', '12345', '2019-04-30'),
('272230042019', '12345', '2019-04-30'),
('311616042019', '12345', '2019-04-16'),
('480215042019', '12345', '2019-04-15'),
('539130042019', '12345', '2019-04-30'),
('615924042019', '12345', '2019-04-24'),
('731522042019', '12345', '2019-04-22'),
('770429042019', '12345', '2019-04-29'),
('777330042019', '12345', '2019-04-30'),
('779430042019', '12345', '2019-04-30'),
('840330042019', '12345', '2019-04-30'),
('848315042019', '12345', '2019-04-15'),
('88628042019', '12345', '2019-04-28'),
('895429042019', '12345', '2019-04-29'),
('954730042019', '12345', '2019-04-30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `kode_sepeda` (`kode_sepeda`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `sepeda`
--
ALTER TABLE `sepeda`
  ADD PRIMARY KEY (`kode_sepeda`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`kode_sepeda`) REFERENCES `sepeda` (`kode_sepeda`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
