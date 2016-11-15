-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2016 at 05:21 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `berat` double NOT NULL,
  `tinggi` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_deskripsi` varchar(200) NOT NULL,
  `meta_keyword` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `tgl_update` datetime NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status` enum('aktif','tidak_aktif') NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jumlah_barang`, `berat`, `tinggi`, `lebar`, `panjang`, `deskripsi`, `meta_title`, `meta_deskripsi`, `meta_keyword`, `slug`, `tgl_update`, `id_kategori`, `gambar`, `status`, `harga`) VALUES
(1, 'coba', 94, 0.3, 100, 100, 100, '100', 'coba', 'coba', 'coba,kayu,ukir', 'coba', '2016-10-02 22:15:07', 1, 'Lighthouse1.jpg', 'aktif', 150000),
(2, 'lorem ipsum', 105, 100, 100, 100, 100, 'lorem ipsum', 'lorem ipsum', 'lorem ipsum', 'lorem ipsum', 'lorem-ipsum', '2016-10-08 07:51:54', 2, 'Koala3.jpg', 'aktif', 100),
(3, 'rega', 1105, 0.5, 100, 100, 100, 'lorem ipsum', 'rere', 'rerte', 'rere', 'rega1', '2016-10-06 21:29:54', 2, 'presta2.PNG', 'aktif', 150000),
(4, 'coba', 111, 12, 11, 11, 2, 'des', 'tes', 'tes', 'tes', 'tes', '2016-10-08 07:31:25', 1, 'canvas.png', 'aktif', 12312),
(5, 'meja1', 11, 0.5, 150, 130, 110, 'desk', 'coba', 'coba', 'coba', 'coba1', '2016-10-11 05:26:31', 1, 'masha5.jpg', 'aktif', 1111),
(6, 'meja3', 150, 111, 111, 111, 111, 'aaa', 'title', 'deskr', 'title,title,title', 'title1', '2016-10-11 05:36:09', 1, 'masha-and-the-bear-coloring-pages-31-QWOY_gif.jpg', 'aktif', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi_kategori` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `meta_title` varchar(160) NOT NULL,
  `meta_deskripsi` varchar(160) NOT NULL,
  `meta_keyword` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi_kategori`, `slug`, `meta_title`, `meta_deskripsi`, `meta_keyword`) VALUES
(1, 'Meja', 'meja', 'meja', 'title', 'deskrispi', 'keyword'),
(2, 'Kursi', 'kursi', 'kursi', '', '', ''),
(3, 'Pintu', 'pintu bagus', 'pintu', 'pintu', 'bagus', 'sekali,amat');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `jml` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tranfer_ke` enum('bni','mandiri') DEFAULT NULL,
  `metode` enum('atm','internet','mobile','tranfer') DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `catatan` text,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `jml`, `tgl`, `jam`, `tranfer_ke`, `metode`, `bukti`, `catatan`, `id_transaksi`) VALUES
(1, 1010101, '2015-10-10', '10:40:00', 'bni', 'atm', '2f09df632d05840b337ef1c560d7a6ab.PNG', 'coba\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(45) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `tarif`) VALUES
(1, 'yogya', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `master_slider`
--

CREATE TABLE `master_slider` (
  `id_master_slider` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `alt_gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_slider`
--

INSERT INTO `master_slider` (`id_master_slider`, `deskripsi`, `gambar`, `alt_gambar`) VALUES
(1, 'lorem ipsum', '65322315a388a748b0114c951c8a752c.png', 'lorem ipsum'),
(2, 'aa', 'fa0edb361bdf39ce34fdda70175bf616.jpg', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_pesan` datetime DEFAULT NULL,
  `status` enum('pending','terkonfirmasi','proses','kirim') DEFAULT NULL,
  `no_resi` varchar(45) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `tranfer_ke` enum('bni','mandiri') DEFAULT NULL,
  `alamat_kirim` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `kode_pos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_pesan`, `status`, `no_resi`, `total_bayar`, `tranfer_ke`, `alamat_kirim`, `id_user`, `id_kota`, `kode_pos`) VALUES
(1, '2016-10-06 22:16:18', 'proses', NULL, 300100, 'bni', 'sss', 2, 1, 455162),
(2, '2016-10-08 07:15:13', 'pending', NULL, 150000, 'bni', 'jogja', 2, 1, 55162),
(3, '2016-10-11 06:37:48', 'pending', NULL, 150100, 'bni', 'qqq', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_barang`, `jumlah`, `harga`, `sub_total`, `id_transaksi`) VALUES
(1, 2, 1, 100, 100, 1),
(2, 1, 1, 150000, 150000, 1),
(3, 3, 1, 150000, 150000, 1),
(4, 3, 1, 150000, 150000, 2),
(5, 1, 1, 150000, 150000, 3),
(6, 2, 1, 100, 100, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(15) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `level` enum('member','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `email`, `password`, `alamat`, `no_hp`, `jenis_kelamin`, `tgl_lahir`, `level`) VALUES
(1, 'admin', 'admin', 'admin@kerincisakti.com', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, 'laki-laki', '2016-10-02', 'admin'),
(2, 'rega cajyua', 'regacg', 'rega@gmail.com', '39444744eb44843a6804d37ea223b3e1', NULL, NULL, 'laki-laki', '1981-01-01', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk_barang_kategori1_idx` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `fk_konfirmasi_transaksi1_idx` (`id_transaksi`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `master_slider`
--
ALTER TABLE `master_slider`
  ADD PRIMARY KEY (`id_master_slider`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaksi_user_idx` (`id_user`),
  ADD KEY `fk_transaksi_kota1_idx` (`id_kota`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`),
  ADD KEY `fk_transaksi_detail_transaksi2_idx` (`id_transaksi`),
  ADD KEY `fk_transaksi_detail_barang1_idx` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_slider`
--
ALTER TABLE `master_slider`
  MODIFY `id_master_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_kategori1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `fk_konfirmasi_transaksi1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_kota1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksi_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `fk_transaksi_detail_barang1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksi_detail_transaksi2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
