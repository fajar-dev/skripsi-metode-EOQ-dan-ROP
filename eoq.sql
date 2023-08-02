-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 11:18 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eoq`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `pemesanan_id` varchar(20) NOT NULL,
  `produk_kode` varchar(20) NOT NULL,
  `pemesanan_jumlah` int(11) NOT NULL,
  `pemesanan_status` enum('pending','batal','selesai') NOT NULL DEFAULT 'pending',
  `pemesanan_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`pemesanan_id`, `produk_kode`, `pemesanan_jumlah`, `pemesanan_status`, `pemesanan_tanggal`) VALUES
('PM01201809111', 'BR022018091110', 311, 'pending', '2018-09-11 08:24:39'),
('PM02201809257', 'BR04201809253', 22, 'selesai', '2018-09-25 04:51:10'),
('PM03201809252', 'BR022018091110', 22, 'batal', '2018-09-25 04:57:25'),
('PM04201809254', 'BR04201809253', 22, 'selesai', '2018-09-25 05:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `permintaan_id` varchar(20) NOT NULL,
  `produk_kode` varchar(20) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `permintaan_jumlah` int(11) NOT NULL,
  `permintaan_biaya` int(11) NOT NULL,
  `permintaan_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`permintaan_id`, `produk_kode`, `supplier_id`, `permintaan_jumlah`, `permintaan_biaya`, `permintaan_tanggal`) VALUES
('PM01201809115', 'BR012018091110', 2, 10, 10440000, '2018-09-11 08:12:28'),
('PM02201809255', 'BR04201809253', 2, 30, 750000, '2018-09-25 04:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE `persediaan` (
  `persediaan_id` int(11) NOT NULL,
  `produk_kode` varchar(20) NOT NULL,
  `persediaan_eoq` double NOT NULL,
  `persediaan_rop` double NOT NULL,
  `persediaan_ss` int(11) NOT NULL,
  `persediaan_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`persediaan_id`, `produk_kode`, `persediaan_eoq`, `persediaan_rop`, `persediaan_ss`, `persediaan_tanggal`) VALUES
(9, 'BR012018091110', 222.64088914043, 375030, 125010, '0000-00-00 00:00:00'),
(12, 'BR022018091110', 198.93440824911, 318780, 106260, '0000-00-00 00:00:00'),
(13, 'BR03201809110', 311.99762769136, 403200, 134400, '0000-00-00 00:00:00'),
(14, 'BR022018091110', 136.46787820354, 150030, 50010, '0000-00-00 00:00:00'),
(15, 'BR012018091110', 4.4528177828086, 180, 60, '0000-00-00 00:00:00'),
(16, 'BR012018091110', 4.4528177828086, 180, 60, '0000-00-00 00:00:00'),
(17, 'BR04201809253', 21.908902300207, 52.5, 18, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_kode` varchar(20) NOT NULL,
  `produk_nama` varchar(25) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_stok` int(11) NOT NULL,
  `produk_bpesan` int(11) NOT NULL,
  `produk_bsimpan` int(11) NOT NULL,
  `produk_leadtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_kode`, `produk_nama`, `produk_harga`, `produk_stok`, `produk_bpesan`, `produk_bsimpan`, `produk_leadtime`) VALUES
('BR012018091110', 'Grade YI', 1044000, 240, 103500, 10, 60),
('BR022018091110', 'Grade JK', 1111500, 250, 103500, 10, 60),
('BR03201809110', 'Grade MI', 571500, 2, 103500, 10, 60),
('BR04201809253', 'Produk1', 25000, 64, 20000, 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_nama` varchar(50) NOT NULL,
  `supplier_tel` char(12) NOT NULL,
  `supplier_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_nama`, `supplier_tel`, `supplier_alamat`) VALUES
(2, 'adityads', '082222', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(25) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_nama` varchar(25) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_tel` char(12) NOT NULL,
  `user_alamat` text NOT NULL,
  `user_role` enum('admin','gudang','pimpinan') NOT NULL,
  `user_foto` varchar(50) NOT NULL DEFAULT 'team_1.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_email`, `user_tel`, `user_alamat`, `user_role`, `user_foto`) VALUES
(1, 'adityads', '202cb962ac59075b964b07152d234b70', 'Aditya Dharmawan Saputraa', 'adityads@ymail.com', '082371373347', 'Jl. pangeran ayin', 'admin', 'team_1.jpg'),
(2, 'gudang', '202cb962ac59075b964b07152d234b70', 'Rahman', 'rahman@aa.com', '123', 'aaaaa', 'gudang', '8332adf5309cc886fba1a76dc85dcd51.jpg'),
(3, 'pimpinan', '202cb962ac59075b964b07152d234b70', 'pimpin', 'budi@aaa.com', '123', 'aaaaa', 'pimpinan', 'team_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`),
  ADD KEY `produk_kode` (`produk_kode`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`permintaan_id`),
  ADD KEY `produk_kode` (`produk_kode`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`persediaan_id`),
  ADD KEY `persediaan_ibfk_1` (`produk_kode`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_kode`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `persediaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`produk_kode`) REFERENCES `produk` (`produk_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`produk_kode`) REFERENCES `produk` (`produk_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permintaan_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD CONSTRAINT `persediaan_ibfk_1` FOREIGN KEY (`produk_kode`) REFERENCES `produk` (`produk_kode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
