-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 08:45 AM
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
('KDH-001', 'Amartahills Hotel and Resort Batu', 'Jl. Abdul Gani Atas, Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65311', 106, 900000, 'amarta.jpeg', '-7.8891981', '112.5120317'),
('KDH-002', 'Apple Green Hotel', 'Jl. Diponegoro No.8, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65314', 105, 500000, 'applegreen.jpeg', '-7.877591', '112.5304509'),
('KDH-003', 'ASTON Inn Batu', 'Jl. Abdul Gani Atas No.42, Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65311', 100, 800000, 'aston.jpeg', '-7.8825551', '112.5177306'),
('KDH-004', 'Golden Tulip Holland Resort Batu', 'Komplek, Jl. Bukit Panderman Hill Jl. Cherry No.10, Temas, Kec. Batu, Kota Batu, Jawa Timur 65314', 100, 1000000, 'goldentulip.jpeg', '-7.8918215', '112.5210428');

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
  `tgl_tambah` varchar(255) NOT NULL,
  `jml_tambah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_kamar`
--

INSERT INTO `stok_kamar` (`kd_kamar`, `id_user`, `kd_hotel`, `nm_hotel`, `tgl_tambah`, `jml_tambah`) VALUES
('TBK-001', 1, 'KDH-002', 'Apple Green Hotel', '15-12-2021 12:48:03', 5);

--
-- Triggers `stok_kamar`
--
DELIMITER $$
CREATE TRIGGER `tambah_kamar` AFTER INSERT ON `stok_kamar` FOR EACH ROW BEGIN
	UPDATE hotel SET sisa_kamar = sisa_kamar + new.jml_tambah WHERE hotel.kd_hotel = new.kd_hotel;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stok_tiket`
--

CREATE TABLE `stok_tiket` (
  `kd_tambahtiket` varchar(255) NOT NULL,
  `id_user` int(100) NOT NULL,
  `kd_tiket` varchar(255) NOT NULL,
  `nm_tiket` varchar(255) NOT NULL,
  `tgl_tambah` varchar(255) NOT NULL,
  `jml_tambah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_tiket`
--

INSERT INTO `stok_tiket` (`kd_tambahtiket`, `id_user`, `kd_tiket`, `nm_tiket`, `tgl_tambah`, `jml_tambah`) VALUES
('TBT-001', 1, 'KDT-001', 'Reguler', '15-12-2021 12:47:34', 5);

--
-- Triggers `stok_tiket`
--
DELIMITER $$
CREATE TRIGGER `tambah_tiket` AFTER INSERT ON `stok_tiket` FOR EACH ROW BEGIN
	UPDATE tiket SET stok = stok + new.jml_tambah WHERE tiket.kd_tiket = new.kd_tiket;
END
$$
DELIMITER ;

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
('KDT-001', 'Reguler', 107, 100000),
('KDT-002', 'Terusan', 105, 150000),
('KDT-003', 'Sakti', 105, 450000),
('KDT-004', 'Pelajar', 103, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_hotel`
--

CREATE TABLE `transaksi_hotel` (
  `kd_transaksi` varchar(255) NOT NULL,
  `id_user` int(100) NOT NULL,
  `kd_hotel` varchar(255) NOT NULL,
  `hotel` varchar(255) NOT NULL,
  `tgl_transaksi` varchar(255) NOT NULL,
  `jml_transaksi` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_hotel`
--

INSERT INTO `transaksi_hotel` (`kd_transaksi`, `id_user`, `kd_hotel`, `hotel`, `tgl_transaksi`, `jml_transaksi`, `total`, `pembayaran`, `bukti`) VALUES
('TH-001', 2, 'KDH-001', 'Amartahills Hotel and Resort Batu', '14-12-2021 16:13:59', 2, 1800000, 'BCA', 'download.jpg'),
('TH-002', 2, 'KDH-001', 'Amartahills Hotel and Resort Batu', '15-12-2021 12:44:31', 2, 1800000, 'BCA', 'download.jpg');

--
-- Triggers `transaksi_hotel`
--
DELIMITER $$
CREATE TRIGGER `kurang_kamar` AFTER UPDATE ON `transaksi_hotel` FOR EACH ROW BEGIN
	UPDATE hotel SET sisa_kamar = sisa_kamar - NEW.jml_transaksi WHERE hotel.kd_hotel = NEW.kd_hotel;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_wisata`
--

CREATE TABLE `transaksi_wisata` (
  `kd_transaksi` varchar(255) NOT NULL,
  `id_user` int(100) NOT NULL,
  `kd_wisata` varchar(255) NOT NULL,
  `kd_tiket` varchar(255) DEFAULT NULL,
  `tiket` varchar(255) NOT NULL,
  `tgl_transaksi` varchar(255) NOT NULL,
  `jml_transaksi` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_wisata`
--

INSERT INTO `transaksi_wisata` (`kd_transaksi`, `id_user`, `kd_wisata`, `kd_tiket`, `tiket`, `tgl_transaksi`, `jml_transaksi`, `total`, `pembayaran`, `bukti`) VALUES
('TR-001', 2, 'KDW-001', 'KDT-001', 'Reguler', '14-12-2021 16:12:51', 3, 300000, 'BCA', 'download.jpg'),
('TR-002', 2, 'KDW-002', 'KDT-001', 'Reguler', '15-12-2021 12:41:44', 5, 500000, 'BCA', 'download.jpg'),
('TR-003', 2, 'KDW-002', 'KDT-002', 'Terusan', '23-12-2021 20:48:58', 5, 750000, 'BRI', '311019.jpg');

--
-- Triggers `transaksi_wisata`
--
DELIMITER $$
CREATE TRIGGER `kurang_tiket` AFTER UPDATE ON `transaksi_wisata` FOR EACH ROW BEGIN
	UPDATE tiket SET stok = stok - NEW.jml_transaksi WHERE tiket.kd_tiket = NEW.kd_tiket;
END
$$
DELIMITER ;

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
(1, 'admin', 'Laki-Laki', 'arab', '2002-02-28', 'arab', 1122334455, 'admin@admin.com', '1148650.jpg', 'admin', '123', 'admin'),
(2, 'user', 'Laki-Laki', 'indonesia', '2021-12-01', 'jakarta', 1111111, 'user@user.com', '311019.jpg', 'user', '123', 'user');

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
('KDW-001', 'Jatim Park 1', 'Taman Hiburan', 'Jl. Kartika No.2, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65315', 'Taman hiburan dengan wahana, tempat makan, & pameran/pertunjukan budaya tradisional Indonesia.', 'jtp1.jpg', '-7.8889575', '112.5296176'),
('KDW-002', 'Jatim Park 2', 'Wisata Edukasi', 'Jl. Oro-Oro Ombo No.9, Temas, Kec. Batu, Kota Batu, Jawa Timur 65315', 'Taman hiburan dengan kegiatan pendidikan seputar ilmu pengetahuan alam & biologi, termasuk kebun binatang.', 'jtp2.jpg', '-7.8889522', '112.5274289'),
('KDW-003', 'Jatim Park 3', 'Wisata Edukasi', 'Jl. Ir. Soekarno No.144, Beji, Kec. Junrejo, Kota Batu, Jawa Timur 65236', 'Taman hiburan populer dengan atraksi dinosaurus, museum lilin, kedai camilan & pameran teknologi.', 'jtp3.jpg', '-7.8971285', '112.550914'),
('KDW-004', 'Batu Night Spectacular', 'Taman Hiburan', 'Jl. Oro-Oro Ombo No.10, Oro-Oro Ombo, Kec. Batu, Kota Batu, Jawa Timur 65316', 'Taman hiburan yang menyediakan banyak wahana permainan', 'bns.jpg', '-7.8968494', '112.5324013'),
('KDW-005', 'Museum Angkut', 'Wisata Edukasi', 'Jl. Terusan Sultan Agung No.2, Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65314', 'Museum unik yang menampilkan adegan & karakter film Hollywood, serta mobil, tank, & moped.', 'museum.jpg', '-7.878608', '112.5175892');

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
-- Indexes for table `transaksi_hotel`
--
ALTER TABLE `transaksi_hotel`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_hotel` (`kd_hotel`);

--
-- Indexes for table `transaksi_wisata`
--
ALTER TABLE `transaksi_wisata`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_wisata` (`kd_wisata`),
  ADD KEY `kd_tiket` (`kd_tiket`);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

--
-- Constraints for table `transaksi_hotel`
--
ALTER TABLE `transaksi_hotel`
  ADD CONSTRAINT `transaksi_hotel_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksi_hotel_ibfk_2` FOREIGN KEY (`kd_hotel`) REFERENCES `hotel` (`kd_hotel`);

--
-- Constraints for table `transaksi_wisata`
--
ALTER TABLE `transaksi_wisata`
  ADD CONSTRAINT `transaksi_wisata_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksi_wisata_ibfk_2` FOREIGN KEY (`kd_wisata`) REFERENCES `wisata` (`kd_wisata`),
  ADD CONSTRAINT `transaksi_wisata_ibfk_3` FOREIGN KEY (`kd_tiket`) REFERENCES `tiket` (`kd_tiket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
