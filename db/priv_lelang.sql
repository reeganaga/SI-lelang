-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 11 Des 2016 pada 16.25
-- Versi Server: 5.5.53-0ubuntu0.14.04.1
-- Versi PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `priv_lelang`
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
  `slug` varchar(100) NOT NULL,
  `tgl_expired` datetime NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status` enum('open','bidding','closed',' processed') NOT NULL DEFAULT 'open',
  `harga` int(11) NOT NULL,
  `harga_deal` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `fk_barang_kategori1_idx` (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jumlah_barang`, `berat`, `tinggi`, `lebar`, `panjang`, `deskripsi`, `slug`, `tgl_expired`, `id_kategori`, `gambar`, `status`, `harga`, `harga_deal`) VALUES
(15, 'pres bagus', 1, 0.5, 100, 100, 100, 'pres bagus', 'pres-bagus', '2016-11-13 21:43:31', 5, 'Screenshot_from_2016-10-05_09:00:462.png', 'open', 100000, 0),
(16, 'hjk', 56, 56, 67, 678, 78, 'hkhk', 'hjk', '2016-11-18 00:00:00', 1, 'Screenshot_from_2016-11-08_21:14:57.png', '', 345, 12345),
(17, '123', 123, 123, 123, 123, 123, '123', '123', '2016-11-17 00:00:00', 1, 'Screenshot_from_2016-10-05_09:00:463.png', '', 123, 1234547),
(18, 'barang coba', 10, 10, 100, 100, 100, 'lorem ipsum', 'barang-coba', '2016-12-11 00:00:00', 3, 'Coming-Soon.jpg', '', 150000, 151000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidding`
--

CREATE TABLE IF NOT EXISTS `bidding` (
  `id_bidding` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_bidding` datetime NOT NULL,
  `jml_bidding` int(11) NOT NULL,
  `status` enum('bidding','lose','win') NOT NULL DEFAULT 'bidding',
  PRIMARY KEY (`id_bidding`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `bidding`
--

INSERT INTO `bidding` (`id_bidding`, `id_barang`, `id_user`, `tgl_bidding`, `jml_bidding`, `status`) VALUES
(3, 17, 2, '2016-11-16 00:11:23', 123454, 'lose'),
(6, 16, 3, '2016-11-16 22:40:43', 12345, 'win'),
(7, 17, 3, '2016-11-16 22:05:53', 1234547, 'win'),
(8, 18, 3, '2016-12-11 11:54:38', 151000, 'win');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi_kategori` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi_kategori`, `slug`) VALUES
(1, 'Meja1', 'meja1', 'meja1'),
(2, 'Kursi', 'kursi', 'kursi'),
(3, 'Pintu', 'pintu bagus', 'pintu'),
(5, 'pres', 'pres', 'pres');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `jml`, `tgl`, `jam`, `tranfer_ke`, `metode`, `bukti`, `catatan`, `id_transaksi`) VALUES
(1, 1, '2016-12-12', '10:10:00', 'bni', 'atm', '0337e3f7a1fe4dcc004884ca038fae22.png', 'lunas ya pak', 17);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_pesan`, `status`, `no_resi`, `total_bayar`, `tranfer_ke`, `alamat_kirim`, `id_user`, `id_kota`, `kode_pos`) VALUES
(17, '2016-12-11 16:17:54', 'terkonfirmasi', NULL, 1397892, 'bni', 'jogja', 3, 1, 55162);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_barang`, `id_transaksi`) VALUES
(1, 16, 17),
(2, 17, 17),
(3, 18, 17);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `email`, `password`, `alamat`, `no_hp`, `jenis_kelamin`, `tgl_lahir`, `level`) VALUES
(1, 'admin', 'admin', 'admin@kerincisakti.com', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, 'laki-laki', '2016-10-02', 'admin'),
(2, 'rega cajyua', 'regacg', 'rega@gmail.com', '39444744eb44843a6804d37ea223b3e1', NULL, NULL, 'laki-laki', '1981-01-01', 'member'),
(3, 'rega', 'rega', 'rega@hotel.com', '39444744eb44843a6804d37ea223b3e1', 'jogja', '929292', 'laki-laki', '1981-01-01', 'member');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
