-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 13 Nov 2016 pada 11.18
-- Versi Server: 5.5.53-0ubuntu0.14.04.1
-- Versi PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `tokoonline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
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
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `fk_barang_kategori1_idx` (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jumlah_barang`, `berat`, `tinggi`, `lebar`, `panjang`, `deskripsi`, `meta_title`, `meta_deskripsi`, `meta_keyword`, `slug`, `tgl_update`, `id_kategori`, `gambar`, `status`, `harga`) VALUES
(1, 'coba', 92, 0.3, 100, 100, 100, '100', 'coba', 'coba', 'coba,kayu,ukir', 'coba', '2016-10-02 22:15:07', 1, 'Lighthouse1.jpg', 'aktif', 150000),
(2, 'lorem ipsum', 103, 100, 100, 100, 100, 'lorem ipsum', 'lorem ipsum', 'lorem ipsum', 'lorem ipsum', 'lorem-ipsum', '2016-10-08 07:51:54', 2, 'Koala3.jpg', 'aktif', 100),
(3, 'rega', 1105, 0.5, 100, 100, 100, 'lorem ipsum', 'rere', 'rerte', 'rere', 'rega1', '2016-10-06 21:29:54', 2, 'presta2.PNG', 'aktif', 150000),
(4, 'coba', 110, 12, 11, 11, 2, 'des', 'tes', 'tes', 'tes', 'tes', '2016-10-08 07:31:25', 1, 'canvas.png', 'aktif', 12312),
(5, 'meja1', 10, 0.5, 150, 130, 110, 'desk', 'coba', 'coba', 'coba', 'coba1', '2016-10-11 05:26:31', 1, 'masha5.jpg', 'aktif', 1111),
(6, 'meja3', 150, 111, 111, 111, 111, 'aaa', 'title', 'deskr', 'title,title,title', 'title1', '2016-10-11 05:36:09', 1, 'masha-and-the-bear-coloring-pages-31-QWOY_gif.jpg', 'aktif', 150000),
(7, 'hu', 8, 12, 12, 12, 12, 'jdjdj', 'hi', 'hi', 'hi', 'hi', '2016-10-23 08:10:48', 1, 'Screenshot_from_2016-10-14_09:53:08.png', 'aktif', 12),
(8, '123', 123, 123, 23, 23, 12, '23', '879', '879', '879', '7879', '2016-10-23 21:08:51', 1, 'Screenshot_from_2016-10-05_09:00:46.png', 'aktif', 234),
(10, '9', 9, 9, 9, 9, 9, '9', '9', '9', '9', '9', '2016-10-26 07:21:40', 1, 'woman.jpg', 'aktif', 9),
(11, '8', 8, 88, 8, 8, 8, '8', '9', '9', '9', '9', '2016-10-26 07:21:26', 1, '726-imported-1443570266-726-imported-1443554736-face_top1.jpg', 'aktif', 8),
(12, '8', 8, 8, 8, 8, 8, '8', '9', '9', '9', '9', '2016-10-27 20:06:12', 1, 'Screenshot_from_2016-10-25_21:11:46.png', 'aktif', 8),
(13, '67', 67, 67, 676, 76, 76, '76', 'meta title', 'meta deskripsi', 'meta keyword', 'slug-barang', '2016-10-29 20:02:59', 1, 'marker_follettco.png', 'aktif', 67),
(14, '98', 98, 98, 98, 98, 98, '98', 'title', 'deskripsi', 'keyword', 'slug1231', '2016-10-29 20:10:30', 1, 'Screenshot_from_2016-10-05_09:00:461.png', 'aktif', 98);

-- --------------------------------------------------------

--
-- Struktur dari tabel `default_seo`
--

CREATE TABLE IF NOT EXISTS `default_seo` (
  `id_default_seo` int(11) NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(160) NOT NULL,
  `meta_keyword` varchar(160) NOT NULL,
  `meta_deskripsi` varchar(160) NOT NULL,
  PRIMARY KEY (`id_default_seo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `default_seo`
--

INSERT INTO `default_seo` (`id_default_seo`, `meta_title`, `meta_keyword`, `meta_deskripsi`) VALUES
(1, 'lorem ipsum dolor sit amet', 'lorem ipsum dolor sit amet', 'lorem ipsum dolor sit amet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi_kategori` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `meta_title` varchar(160) NOT NULL,
  `meta_deskripsi` varchar(160) NOT NULL,
  `meta_keyword` varchar(160) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi_kategori`, `slug`, `meta_title`, `meta_deskripsi`, `meta_keyword`) VALUES
(1, 'Meja', 'meja', 'meja', 'title', 'deskrispi', 'keyword'),
(2, 'Kursi', 'kursi', 'kursi', 'kursi', 'kursi', 'kursi'),
(3, 'Pintu', 'pintu bagus', 'pintu', 'pintu', 'bagus', 'sekali,amat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT,
  `jml` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tranfer_ke` enum('bni','mandiri') DEFAULT NULL,
  `metode` enum('atm','internet','mobile','tranfer') DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `catatan` text,
  `id_transaksi` int(11) NOT NULL,
  PRIMARY KEY (`id_konfirmasi`),
  KEY `fk_konfirmasi_transaksi1_idx` (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `jml`, `tgl`, `jam`, `tranfer_ke`, `metode`, `bukti`, `catatan`, `id_transaksi`) VALUES
(1, 1010101, '2015-10-10', '10:40:00', 'bni', 'atm', '2f09df632d05840b337ef1c560d7a6ab.PNG', 'coba\r\n', 1),
(2, 8181818, '2016-10-24', '10:10:00', 'bni', 'atm', '4704ae99f0920397238f9c6bc0dbf72f.png', 'catatan', 4),
(3, 191919, '2016-10-19', '02:00:00', 'bni', 'atm', '25743d262150965eccb4d9c27d3f7fa1.png', 'lunas', 5),
(4, 2346, '2016-10-06', '10:10:00', 'bni', 'atm', 'f1d903a5e61ef276eab60080823560cd.png', 'aa', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(45) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `tarif`) VALUES
(1, 'yogya', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_slider`
--

CREATE TABLE IF NOT EXISTS `master_slider` (
  `id_master_slider` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `alt_gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_master_slider`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `master_slider`
--

INSERT INTO `master_slider` (`id_master_slider`, `deskripsi`, `gambar`, `alt_gambar`) VALUES
(1, 'lorem ipsum', '65322315a388a748b0114c951c8a752c.png', 'lorem ipsum'),
(2, 'aa', 'fa0edb361bdf39ce34fdda70175bf616.jpg', 'aa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pesan` datetime DEFAULT NULL,
  `status` enum('pending','terkonfirmasi','proses','kirim') DEFAULT NULL,
  `no_resi` varchar(45) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `tranfer_ke` enum('bni','mandiri') DEFAULT NULL,
  `alamat_kirim` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `fk_transaksi_user_idx` (`id_user`),
  KEY `fk_transaksi_kota1_idx` (`id_kota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_pesan`, `status`, `no_resi`, `total_bayar`, `tranfer_ke`, `alamat_kirim`, `id_user`, `id_kota`, `kode_pos`) VALUES
(1, '2016-10-06 22:16:18', 'proses', NULL, 300100, 'bni', 'sss', 2, 1, 455162),
(2, '2016-10-08 07:15:13', 'terkonfirmasi', NULL, 150000, 'bni', 'jogja', 2, 1, 55162),
(3, '2016-10-11 06:37:48', 'pending', NULL, 150100, 'bni', 'qqq', 2, 1, 0),
(4, '2016-10-23 08:12:23', 'terkonfirmasi', NULL, 48, 'bni', 'jogja', 2, 1, 55162),
(5, '2016-10-23 21:09:50', 'terkonfirmasi', NULL, 163423, 'bni', 'Nitikan UH 6 / 317', 2, 1, 12121),
(6, '2016-10-24 21:36:09', 'pending', NULL, 150000, 'bni', 'rrr', 2, 1, 61616),
(7, '2016-10-24 21:41:21', 'pending', NULL, 100, 'bni', 'asa', 2, 1, 121),
(8, '2016-10-24 21:42:45', 'pending', NULL, 100, 'bni', 'wdw', 2, 1, 111);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `id_transaksi` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi_detail`),
  KEY `fk_transaksi_detail_transaksi2_idx` (`id_transaksi`),
  KEY `fk_transaksi_detail_barang1_idx` (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_barang`, `jumlah`, `harga`, `sub_total`, `id_transaksi`) VALUES
(1, 2, 1, 100, 100, 1),
(2, 1, 1, 150000, 150000, 1),
(3, 3, 1, 150000, 150000, 1),
(4, 3, 1, 150000, 150000, 2),
(5, 1, 1, 150000, 150000, 3),
(6, 2, 1, 100, 100, 3),
(7, 7, 4, 12, 48, 4),
(8, 1, 1, 150000, 150000, 5),
(9, 4, 1, 12312, 12312, 5),
(10, 5, 1, 1111, 1111, 5),
(11, 1, 1, 150000, 150000, 6),
(12, 2, 1, 100, 100, 7),
(13, 2, 1, 100, 100, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(15) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `level` enum('member','admin') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `email`, `password`, `alamat`, `no_hp`, `jenis_kelamin`, `tgl_lahir`, `level`) VALUES
(1, 'admin', 'admin', 'admin@kerincisakti.com', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, 'laki-laki', '2016-10-02', 'admin'),
(2, 'rega cajyua', 'regacg', 'rega@gmail.com', '39444744eb44843a6804d37ea223b3e1', NULL, NULL, 'laki-laki', '1981-01-01', 'member');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_kategori1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `fk_konfirmasi_transaksi1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_kota1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksi_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `fk_transaksi_detail_barang1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksi_detail_transaksi2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
