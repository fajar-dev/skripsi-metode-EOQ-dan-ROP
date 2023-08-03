-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Agu 2023 pada 05.33
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `pemesanan_id` varchar(20) NOT NULL,
  `produk_kode` varchar(20) NOT NULL,
  `pemesanan_jumlah` int(11) NOT NULL,
  `pemesanan_status` enum('pending','batal','selesai') NOT NULL DEFAULT 'pending',
  `pemesanan_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`pemesanan_id`, `produk_kode`, `pemesanan_jumlah`, `pemesanan_status`, `pemesanan_tanggal`) VALUES
('PM01201809111', 'BR022018091110', 311, 'selesai', '2023-08-02 09:11:06'),
('PM02201809257', 'BR04201809253', 22, 'selesai', '2018-09-25 04:51:10'),
('PM03201809252', 'BR022018091110', 22, 'selesai', '2023-08-02 08:40:01'),
('PM04201809254', 'BR04201809253', 22, 'selesai', '2018-09-25 05:00:12'),
('PM05202308023', 'BR03201809110', 1, 'selesai', '2023-08-02 08:46:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
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
-- Dumping data untuk tabel `permintaan`
--

INSERT INTO `permintaan` (`permintaan_id`, `produk_kode`, `supplier_id`, `permintaan_jumlah`, `permintaan_biaya`, `permintaan_tanggal`) VALUES
('PM01201809115', 'BR012018091110', 2, 10, 10440000, '2018-09-11 08:12:28'),
('PM02201809255', 'BR04201809253', 2, 30, 750000, '2018-09-25 04:16:25'),
('PM03202308021', 'BR022018091110', 2, 1, 1111500, '2023-08-02 08:42:35'),
('PM04202308022', 'BR012018091110', 2, 1, 1044000, '2023-08-02 08:43:05'),
('PM05202308022', 'BR022018091110', 2, 12, 13338000, '2023-08-02 08:56:19'),
('PM06202308025', 'BR012018091110', 2, 10000, 2147483647, '2023-08-02 09:13:08'),
('PM07202308024', 'BR012018091110', 2, 222, 231768000, '2023-08-02 09:13:40'),
('PM08202308024', 'BR04201809253', 2, 12345, 308625000, '2023-08-02 09:15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persediaan`
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
-- Dumping data untuk tabel `persediaan`
--

INSERT INTO `persediaan` (`persediaan_id`, `produk_kode`, `persediaan_eoq`, `persediaan_rop`, `persediaan_ss`, `persediaan_tanggal`) VALUES
(9, 'BR012018091110', 222.64088914043, 375030, 125010, '0000-00-00 00:00:00'),
(12, 'BR022018091110', 198.93440824911, 318780, 106260, '0000-00-00 00:00:00'),
(13, 'BR03201809110', 311.99762769136, 403200, 134400, '0000-00-00 00:00:00'),
(14, 'BR022018091110', 136.46787820354, 150030, 50010, '0000-00-00 00:00:00'),
(15, 'BR012018091110', 4.4528177828086, 180, 60, '0000-00-00 00:00:00'),
(16, 'BR012018091110', 4.4528177828086, 180, 60, '0000-00-00 00:00:00'),
(17, 'BR04201809253', 21.908902300207, 52.5, 18, '0000-00-00 00:00:00'),
(18, 'BR022018091110', 1.3646787820354, 90, 30, '2023-08-02 08:42:35'),
(19, 'BR012018091110', 1.4081046199376, 90, 30, '2023-08-02 08:43:05'),
(20, 'BR022018091110', 4.7273859729931, 180, 60, '2023-08-02 08:56:19'),
(21, 'BR012018091110', 140.81046199376, 150030, 50010, '2023-08-02 09:13:08'),
(22, 'BR012018091110', 20.980286313421, 3330, 1110, '2023-08-02 09:13:40'),
(23, 'BR04201809253', 444.43222205416, 21609, 7203, '2023-08-02 09:15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
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
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`produk_kode`, `produk_nama`, `produk_harga`, `produk_stok`, `produk_bpesan`, `produk_bsimpan`, `produk_leadtime`) VALUES
('BR012018091110', 'Grade YI', 1044000, -9983, 103500, 10, 60),
('BR022018091110', 'Grade JK', 1111500, 881, 103500, 10, 60),
('BR03201809110', 'Grade MI', 571500, 3, 103500, 10, 60),
('BR04201809253', 'Produk1', 25000, -12281, 20000, 10, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_nama` varchar(50) NOT NULL,
  `supplier_tel` char(12) NOT NULL,
  `supplier_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_nama`, `supplier_tel`, `supplier_alamat`) VALUES
(2, 'adityads', '082222', 'aaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(25) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_nama` varchar(25) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_tel` char(12) NOT NULL,
  `user_alamat` text NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `user_foto` varchar(50) NOT NULL DEFAULT 'team_1.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_email`, `user_tel`, `user_alamat`, `user_role`, `user_foto`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin', 'admin@gmail.com', '12345678', 'Jl. admin', 'admin', 'team_1.jpg'),
(3, 'user', '202cb962ac59075b964b07152d234b70', 'user', 'user@aaa.com', '123', 'aaaaa', 'user', 'team_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`),
  ADD KEY `produk_kode` (`produk_kode`);

--
-- Indeks untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`permintaan_id`),
  ADD KEY `produk_kode` (`produk_kode`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indeks untuk tabel `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`persediaan_id`),
  ADD KEY `persediaan_ibfk_1` (`produk_kode`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_kode`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `persediaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`produk_kode`) REFERENCES `produk` (`produk_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`produk_kode`) REFERENCES `produk` (`produk_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permintaan_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `persediaan`
--
ALTER TABLE `persediaan`
  ADD CONSTRAINT `persediaan_ibfk_1` FOREIGN KEY (`produk_kode`) REFERENCES `produk` (`produk_kode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
