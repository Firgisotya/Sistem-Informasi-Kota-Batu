-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 01:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisbat`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `kd_hotel` varchar(255) NOT NULL,
  `nm_hotel` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `sisa_kamar` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longtitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`kd_hotel`, `nm_hotel`, `alamat`, `sisa_kamar`, `harga`, `gambar`, `latitude`, `longtitude`) VALUES
('KDH-001', 'Amartahills Hotel and Resort Batu', 'Jl. Abdul Gani Atas, Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65311', 100, 900000, 'amarta.jpeg', '-7.8891981', '112.5120317');

-- --------------------------------------------------------

--
-- Table structure for table `ktgr_wisata`
--

CREATE TABLE `ktgr_wisata` (
  `id_kategori` int(100) NOT NULL,
  `nm_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ktgr_wisata`
--

INSERT INTO `ktgr_wisata` (`id_kategori`, `nm_kategori`) VALUES
(1, 'Wisata Alam'),
(2, 'Wisata Edukasi'),
(3, 'Wisata Ekosistem'),
(4, 'Taman Hiburan');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_tiket`
--

CREATE TABLE `pesan_tiket` (
  `kd_pesan` varchar(255) NOT NULL,
  `id_user` int(100) NOT NULL,
  `kd_wisata` varchar(255) NOT NULL,
  `nm_wisata` varchar(255) NOT NULL,
  `kd_tiket` varchar(255) NOT NULL,
  `nm_tiket` varchar(255) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `jml_pesan` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stok_kamar`
--

CREATE TABLE `stok_kamar` (
  `kd_kamar` varchar(255) NOT NULL,
  `id_user` int(100) NOT NULL,
  `kd_hotel` varchar(255) NOT NULL,
  `nm_hotel` varchar(255) NOT NULL,
  `tgl_tambah` date NOT NULL,
  `jml_tambah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stok_tiket`
--

CREATE TABLE `stok_tiket` (
  `kd_tambahtiket` varchar(255) NOT NULL,
  `id_user` int(100) NOT NULL,
  `kd_tiket` varchar(255) NOT NULL,
  `nm_tiket` varchar(255) NOT NULL,
  `tgl_tambah` date NOT NULL,
  `jml_tambah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `kd_tiket` varchar(255) NOT NULL,
  `nm_tiket` varchar(255) NOT NULL,
  `stok` int(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`kd_tiket`, `nm_tiket`, `stok`, `harga`) VALUES
('KDT-001', 'Reguler', 100, 100000),
('KDT-002', 'Terusan', 100, 150000),
('KDT-003', 'Sakti', 100, 450000),
('KDT-004', 'Pelajar', 100, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `nm_user` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nm_user`, `jenis_kelamin`, `tp_lahir`, `tgl_lahir`, `alamat`, `no_hp`, `email`, `foto`, `username`, `password`, `level`) VALUES
(1, 'admin', 'Laki-Laki', 'arab', '2002-02-28', 'arab', 1122334455, 'admin@admin.com', '1148650.jpg', 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'user', 'Laki-Laki', 'indonesia', '2021-12-01', 'jakarta', 0, 'user@user.com', '311019.jpg', 'user', '202cb962ac59075b964b07152d234b70', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `kd_wisata` varchar(255) NOT NULL,
  `nm_wisata` varchar(255) NOT NULL,
  `ktgr_wisata` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longtitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`kd_wisata`, `nm_wisata`, `ktgr_wisata`, `alamat`, `deskripsi`, `gambar`, `latitude`, `longtitude`) VALUES
('KDW-001', 'Jatim Park 1', 'Taman Hiburan', 'Jl. Kartika No.2, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65315', 'Taman hiburan dengan wahana, tempat makan, & pameran/pertunjukan budaya tradisional Indonesia.', 'jtp1.jpg', '-7.8889575', '112.5296176');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`kd_hotel`);

--
-- Indexes for table `ktgr_wisata`
--
ALTER TABLE `ktgr_wisata`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pesan_tiket`
--
ALTER TABLE `pesan_tiket`
  ADD PRIMARY KEY (`kd_pesan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_wisata` (`kd_wisata`),
  ADD KEY `kd_tiket` (`kd_tiket`);

--
-- Indexes for table `stok_kamar`
--
ALTER TABLE `stok_kamar`
  ADD PRIMARY KEY (`kd_kamar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_hotel` (`kd_hotel`);

--
-- Indexes for table `stok_tiket`
--
ALTER TABLE `stok_tiket`
  ADD PRIMARY KEY (`kd_tambahtiket`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_tiket` (`kd_tiket`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`kd_tiket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`kd_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ktgr_wisata`
--
ALTER TABLE `ktgr_wisata`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesan_tiket`
--
ALTER TABLE `pesan_tiket`
  ADD CONSTRAINT `pesan_tiket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pesan_tiket_ibfk_2` FOREIGN KEY (`kd_wisata`) REFERENCES `wisata` (`kd_wisata`),
  ADD CONSTRAINT `pesan_tiket_ibfk_3` FOREIGN KEY (`kd_tiket`) REFERENCES `tiket` (`kd_tiket`);

--
-- Constraints for table `stok_kamar`
--
ALTER TABLE `stok_kamar`
  ADD CONSTRAINT `stok_kamar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `stok_kamar_ibfk_2` FOREIGN KEY (`kd_hotel`) REFERENCES `hotel` (`kd_hotel`);

--
-- Constraints for table `stok_tiket`
--
ALTER TABLE `stok_tiket`
  ADD CONSTRAINT `stok_tiket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `stok_tiket_ibfk_2` FOREIGN KEY (`kd_tiket`) REFERENCES `tiket` (`kd_tiket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
