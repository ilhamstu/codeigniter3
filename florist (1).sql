-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 01:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `florist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_kirim`
--

CREATE TABLE `tbl_biaya_kirim` (
  `idBiayaKirim` int(5) NOT NULL,
  `idKurir` int(5) DEFAULT NULL,
  `idKotaTujuan` int(4) DEFAULT NULL,
  `biaya` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_biaya_kirim`
--

INSERT INTO `tbl_biaya_kirim` (`idBiayaKirim`, `idKurir`, `idKotaTujuan`, `biaya`) VALUES
(43, 8, 15, 45000),
(47, 8, 14, 45000),
(48, 8, 16, 30000),
(49, 20, 15, 35000),
(50, 10, 15, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `idDetailOrder` int(5) NOT NULL,
  `idOrder` int(5) DEFAULT NULL,
  `idProduk` int(5) DEFAULT NULL,
  `jumlah` int(5) NOT NULL,
  `subtotal` int(10) NOT NULL,
  `idKota` int(4) DEFAULT NULL,
  `almt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_order`
--

INSERT INTO `tbl_detail_order` (`idDetailOrder`, `idOrder`, `idProduk`, `jumlah`, `subtotal`, `idKota`, `almt`) VALUES
(6, 15, 31, 3, 45000, 15, 'Jalan coba coba'),
(7, 16, 32, 3, 150000, 15, NULL),
(8, 17, 31, 0, 0, 24, NULL),
(9, 18, 32, 2, 100000, 16, 'Jln. Rindu ini');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_iklan`
--

CREATE TABLE `tbl_iklan` (
  `idIklan` int(11) NOT NULL,
  `idProduk` int(11) NOT NULL,
  `kata` text NOT NULL,
  `stat` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_iklan`
--

INSERT INTO `tbl_iklan` (`idIklan`, `idProduk`, `kata`, `stat`) VALUES
(2, 31, 'Dicoba dulu', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `idKat` int(5) NOT NULL,
  `namaKat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`idKat`, `namaKat`) VALUES
(25, 'Hias'),
(26, 'Pegunungan'),
(28, 'Gift'),
(30, 'Taman'),
(31, 'Bucket');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `idKonfirmasi` int(5) NOT NULL,
  `idOrder` int(5) DEFAULT NULL,
  `buktiTransfer` varchar(100) DEFAULT NULL,
  `validasi` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_konfirmasi`
--

INSERT INTO `tbl_konfirmasi` (`idKonfirmasi`, `idOrder`, `buktiTransfer`, `validasi`) VALUES
(1, 1, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota`
--

CREATE TABLE `tbl_kota` (
  `idKota` int(4) NOT NULL,
  `namaKota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kota`
--

INSERT INTO `tbl_kota` (`idKota`, `namaKota`) VALUES
(13, 'Yogyakarta'),
(14, 'Manado'),
(15, 'Mataram'),
(16, 'Surabaya'),
(18, 'Jakarta'),
(24, 'Banjarmasin'),
(25, 'Samarinda'),
(26, 'Lampung'),
(27, 'Kupang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurir`
--

CREATE TABLE `tbl_kurir` (
  `idKurir` int(5) NOT NULL,
  `namaKurir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kurir`
--

INSERT INTO `tbl_kurir` (`idKurir`, `namaKurir`) VALUES
(8, 'LionParsel'),
(10, 'SiCepat'),
(20, 'IndahExpress');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `idKonsumen` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `namaKonsumen` varchar(50) NOT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `idKota` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tlpn` varchar(20) DEFAULT NULL,
  `status` enum('admin','member') NOT NULL,
  `qa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`idKonsumen`, `username`, `passwd`, `namaKonsumen`, `alamat`, `idKota`, `email`, `tlpn`, `status`, `qa`) VALUES
(5, 'admin', 'admin', 'Admin', 'Jln. Kenangan dan segalanya', 15, 'admin@florist.com', '087864123456', 'admin', ''),
(10, 'adot', '12345', 'Muhammad Rohmadi Ilham', 'jalan jalan', 15, 'dunckles123@gmail.com', '', 'member', 'Ilham'),
(13, 'ilham', '12345', 'Ilham Dunckles', 'jalan ditempat', 13, 'dunckles123@gmail.com', '087564283882', 'member', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `idOrder` int(5) NOT NULL,
  `idKonsumen` int(5) DEFAULT NULL,
  `tglOrder` datetime DEFAULT NULL,
  `statusOrder` enum('Belum Bayar','Dikemas','Dikirim','Diterima','Selesai','Dibatalkan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`idOrder`, `idKonsumen`, `tglOrder`, `statusOrder`) VALUES
(1, 10, '2021-07-17 00:00:00', 'Belum Bayar'),
(2, 10, '2021-07-29 00:00:00', 'Belum Bayar'),
(15, 10, '2021-07-29 10:58:12', 'Belum Bayar'),
(16, 10, '2021-07-29 11:00:56', 'Belum Bayar'),
(17, 10, '2021-07-29 15:01:02', 'Dibatalkan'),
(18, 10, '2021-07-29 16:27:06', 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `idPembayaran` int(5) NOT NULL,
  `idDetailOrder` int(5) DEFAULT NULL,
  `idKonsumen` int(5) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`idPembayaran`, `idDetailOrder`, `idKonsumen`, `total`) VALUES
(10, 6, 10, 85000),
(11, 9, 10, 130000),
(12, NULL, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `idProduk` int(5) NOT NULL,
  `idKat` int(5) DEFAULT NULL,
  `namaProduk` varchar(50) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(5) DEFAULT NULL,
  `deskripsiProduk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`idProduk`, `idKat`, `namaProduk`, `foto`, `harga`, `stok`, `deskripsiProduk`) VALUES
(31, 28, 'Bunga Mawar', 'red-roses-34.jpg', 15000, 15, 'Bunga ini berasal dari florist yang bernama Mawardi'),
(32, 26, 'Bunga Edelweis', '3397369635.jpg', 50000, 10, 'Murni dari pegunungan'),
(33, 25, 'Bunga Melati', 'scent-of-jasmine-5267074_1920.jpg', 25000, 13, 'Belum ada'),
(41, 30, 'Bunga Matahari', 'bunga2.jpg', 60000, 23, 'Menghasilkan biji matahari yang sangat berlimpah'),
(42, 25, 'Bunga Kemuning', 'image_20210116-11151-1c7tj20.jpg', 15000, 15, 'Cocok untuk menambah koleksi ditaman anda'),
(43, 25, 'Bunga Alamanda', 'bunga.jpg', 40000, 8, 'Tanaman hias untuk dirumah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wish`
--

CREATE TABLE `tbl_wish` (
  `idWish` int(11) NOT NULL,
  `idKonsumen` int(11) DEFAULT NULL,
  `idProduk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wish`
--

INSERT INTO `tbl_wish` (`idWish`, `idKonsumen`, `idProduk`) VALUES
(1, 10, 33),
(4, 10, 32),
(5, 10, 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  ADD PRIMARY KEY (`idBiayaKirim`),
  ADD KEY `fk_kotatu` (`idKotaTujuan`),
  ADD KEY `fk_kurir` (`idKurir`);

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`idDetailOrder`),
  ADD KEY `fk_orderd` (`idOrder`),
  ADD KEY `fk_produkd` (`idProduk`),
  ADD KEY `fk_dokota` (`idKota`);

--
-- Indexes for table `tbl_iklan`
--
ALTER TABLE `tbl_iklan`
  ADD PRIMARY KEY (`idIklan`),
  ADD KEY `fk_ip` (`idProduk`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`idKat`);

--
-- Indexes for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`idKonfirmasi`),
  ADD KEY `fk_orderk` (`idOrder`);

--
-- Indexes for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  ADD PRIMARY KEY (`idKota`);

--
-- Indexes for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  ADD PRIMARY KEY (`idKurir`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`idKonsumen`),
  ADD KEY `fk_kota` (`idKota`) USING BTREE;

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `fk_membero` (`idKonsumen`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`idPembayaran`),
  ADD KEY `fk_pdo` (`idDetailOrder`),
  ADD KEY `fk_puser` (`idKonsumen`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD KEY `fk_kategori` (`idKat`);

--
-- Indexes for table `tbl_wish`
--
ALTER TABLE `tbl_wish`
  ADD PRIMARY KEY (`idWish`),
  ADD KEY `fk_wp` (`idProduk`),
  ADD KEY `fk_wk` (`idKonsumen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  MODIFY `idBiayaKirim` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `idDetailOrder` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_iklan`
--
ALTER TABLE `tbl_iklan`
  MODIFY `idIklan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `idKat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  MODIFY `idKonfirmasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `idKota` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  MODIFY `idKurir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `idKonsumen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `idOrder` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `idPembayaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `idProduk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_wish`
--
ALTER TABLE `tbl_wish`
  MODIFY `idWish` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  ADD CONSTRAINT `fk_kotatu` FOREIGN KEY (`idKotaTujuan`) REFERENCES `tbl_kota` (`idKota`),
  ADD CONSTRAINT `fk_kurir` FOREIGN KEY (`idKurir`) REFERENCES `tbl_kurir` (`idKurir`);

--
-- Constraints for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD CONSTRAINT `fk_dokota` FOREIGN KEY (`idKota`) REFERENCES `tbl_kota` (`idKota`),
  ADD CONSTRAINT `fk_dorder` FOREIGN KEY (`idOrder`) REFERENCES `tbl_order` (`idOrder`),
  ADD CONSTRAINT `fk_produkd` FOREIGN KEY (`idProduk`) REFERENCES `tbl_produk` (`idProduk`);

--
-- Constraints for table `tbl_iklan`
--
ALTER TABLE `tbl_iklan`
  ADD CONSTRAINT `fk_ip` FOREIGN KEY (`idProduk`) REFERENCES `tbl_produk` (`idProduk`);

--
-- Constraints for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD CONSTRAINT `fk_orderk` FOREIGN KEY (`idOrder`) REFERENCES `tbl_order` (`idOrder`);

--
-- Constraints for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD CONSTRAINT `fk_kota` FOREIGN KEY (`idKota`) REFERENCES `tbl_kota` (`idKota`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_membero` FOREIGN KEY (`idKonsumen`) REFERENCES `tbl_member` (`idKonsumen`);

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `fk_pdo` FOREIGN KEY (`idDetailOrder`) REFERENCES `tbl_detail_order` (`idDetailOrder`),
  ADD CONSTRAINT `fk_puser` FOREIGN KEY (`idKonsumen`) REFERENCES `tbl_member` (`idKonsumen`);

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`idKat`) REFERENCES `tbl_kategori` (`idKat`);

--
-- Constraints for table `tbl_wish`
--
ALTER TABLE `tbl_wish`
  ADD CONSTRAINT `fk_wk` FOREIGN KEY (`idKonsumen`) REFERENCES `tbl_member` (`idKonsumen`),
  ADD CONSTRAINT `fk_wp` FOREIGN KEY (`idProduk`) REFERENCES `tbl_produk` (`idProduk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
