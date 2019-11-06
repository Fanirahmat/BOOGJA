-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Sep 2019 pada 16.42
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boogja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(50) NOT NULL,
  `id_order` int(50) NOT NULL,
  `id_masakan` int(100) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `id_restoran` int(100) NOT NULL,
  `no_meja` int(50) NOT NULL,
  `status_total_order` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(255) NOT NULL,
  `nama_kasir` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_level` int(50) NOT NULL,
  `id_restoran` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama_kasir`, `username`, `password`, `id_level`, `id_restoran`) VALUES
(1, 'Ubaidillah', 'ubed', '123', 2, 3),
(2, 'Riski', 'riski', '123', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(50) NOT NULL,
  `nama_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` int(50) NOT NULL,
  `nama_masakan` varchar(100) NOT NULL,
  `gambar_masakan` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `id_restoran` int(111) NOT NULL,
  `status_masakan` varchar(50) NOT NULL,
  `stok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `nama_masakan`, `gambar_masakan`, `harga`, `id_restoran`, `status_masakan`, `stok`) VALUES
(9, 'Ceker Kecap', 'ceker.jpg', '6000', 1, 'ada', ''),
(11, 'Nasi Goreng Jawa', 'nasi_goreng_jawa.jpg', '11000', 2, 'ada', ''),
(12, 'Nasi Goreng Saus Tiram', 'nasi-goreng-saus-tiram.jpg', '10000', 3, 'ada', ''),
(13, 'Nasi Goreng Saus Tiram', 'nasi-goreng-saus-tiram1.jpg', '8000', 2, 'habis', ''),
(14, 'Nasi Macan', 'nasi-kucing-1.jpg', '8000', 2, 'ada', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(50) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_actived` int(1) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`, `alamat`, `telp`, `username`, `password`, `is_actived`, `date_created`) VALUES
(41, 'Mohammad Fani', 'mohammad_fani_26rpl@student.smktelkom-mlg.sch.id', 'JL. Danau Buyan G7 D7, Sawojajar, Malang', '085000000000', 'fani', '$2y$10$T2Bmuvi0NpJ/.YaXf5NwReu9ho0.tTzorXKT4A6W0wleRmTb.tR1S', 1, '2019-09-17 21:27:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(50) NOT NULL,
  `nama_pengurus` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(111) NOT NULL,
  `id_level` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `nama_pengurus`, `username`, `password`, `id_level`) VALUES
(1, 'fani Rahmat', 'fani', '123', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_meja`
--

CREATE TABLE `pesanan_meja` (
  `id_pesanan` int(100) NOT NULL,
  `id_restoran` int(100) NOT NULL,
  `no_meja` varchar(50) NOT NULL,
  `username` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `restoran`
--

CREATE TABLE `restoran` (
  `id_restoran` int(100) NOT NULL,
  `nama_restoran` varchar(100) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `alamat_restoran` varchar(150) NOT NULL,
  `status` enum('Buka','Tutup','','') NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `restoran`
--

INSERT INTO `restoran` (`id_restoran`, `nama_restoran`, `gambar`, `alamat_restoran`, `status`, `jam_buka`, `jam_tutup`) VALUES
(1, 'Mulyo Redjo', 'food1-100.jpg', 'Jl. Mawar 23', 'Buka', '09:00:00', '20:00:00'),
(2, 'Dewi Kahyangan', 'food2-100.jpg', 'Jl. Danau Ranau', 'Buka', '07:00:00', '22:00:00'),
(3, 'Warung ABC', 'food3-100.jpg', 'jl. Malangj', 'Tutup', '07:00:00', '09:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restoran_meja`
--

CREATE TABLE `restoran_meja` (
  `id_meja` int(11) NOT NULL,
  `id_restoran` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `status_meja` enum('tersedia','dipakai','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `restoran_meja`
--

INSERT INTO `restoran_meja` (`id_meja`, `id_restoran`, `no_meja`, `status_meja`) VALUES
(1, 1, 1, 'dipakai'),
(2, 1, 2, 'tersedia'),
(3, 1, 3, 'dipakai'),
(4, 2, 1, 'dipakai'),
(5, 2, 2, 'tersedia'),
(6, 2, 3, 'tersedia'),
(7, 2, 4, 'tersedia'),
(8, 3, 1, 'dipakai'),
(9, 3, 2, 'tersedia'),
(10, 3, 3, 'tersedia'),
(11, 3, 4, 'tersedia'),
(12, 3, 5, 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(50) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `id_pelanggan` int(50) NOT NULL,
  `total_bayar` varchar(150) NOT NULL,
  `bukti` varchar(50) NOT NULL,
  `status_order` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_masakan` (`id_masakan`),
  ADD KEY `id_restoran` (`id_restoran`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_restoran` (`id_restoran`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`),
  ADD KEY `id_restoran` (`id_restoran`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `pesanan_meja`
--
ALTER TABLE `pesanan_meja`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_restoran` (`id_restoran`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id_restoran`);

--
-- Indexes for table `restoran_meja`
--
ALTER TABLE `restoran_meja`
  ADD PRIMARY KEY (`id_meja`),
  ADD KEY `relasi_restoran` (`id_restoran`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_masakan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan_meja`
--
ALTER TABLE `pesanan_meja`
  MODIFY `id_pesanan` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restoran`
--
ALTER TABLE `restoran`
  MODIFY `id_restoran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `restoran_meja`
--
ALTER TABLE `restoran_meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_masakan`) REFERENCES `masakan` (`id_masakan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `tb_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_order_ibfk_3` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD CONSTRAINT `kasir_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kasir_ibfk_2` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `masakan`
--
ALTER TABLE `masakan`
  ADD CONSTRAINT `masakan_ibfk_1` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan_meja`
--
ALTER TABLE `pesanan_meja`
  ADD CONSTRAINT `pesanan_meja_ibfk_1` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `restoran_meja`
--
ALTER TABLE `restoran_meja`
  ADD CONSTRAINT `relasi_restoran` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`);

--
-- Ketidakleluasaan untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
