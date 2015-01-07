-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2014 at 04:41 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pi`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `pesan_kesan` longtext NOT NULL,
  `tgl_isi` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `user` varchar(30) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `nama` longtext NOT NULL,
  `deskripsi` longtext NOT NULL,
  `harga` varchar(20) NOT NULL,
  `disc` int(3) NOT NULL DEFAULT '0',
  `fasilitas` longtext NOT NULL,
  `lokasi` longtext NOT NULL,
  `image_sample` longtext NOT NULL,
  `kategori` longtext NOT NULL,
  `stok` varchar(10) NOT NULL DEFAULT 'Tersedia',
  `tgl_post` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id` varchar(20) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama_user` longtext NOT NULL,
  `hp_user` varchar(13) NOT NULL,
  `id_paket` int(10) NOT NULL,
  `nama_paket` longtext NOT NULL,
  `kategori_paket` longtext NOT NULL,
  `image_paket` longtext NOT NULL,
  `harga_paket` varchar(20) NOT NULL,
  `disc` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `tgl_booking` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_batal` datetime NOT NULL,
  `pembayaran` int(20) NOT NULL,
  `nama_rekening` longtext NOT NULL,
  `bank` longtext NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` longtext NOT NULL,
  `hp` varchar(12) NOT NULL,
  `pass` longtext NOT NULL,
  `level` int(2) NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT '2',
  `registrasi` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `alamat`, `hp`, `pass`, `level`, `aktif`, `registrasi`) VALUES
(17, 'MAFATIKHUL HABIBI', 'mafatikhulhabibi@gmail.com', 'Jln Dewi Sartika No 19 Semarang', '081542168864', '9325dbfd78b84fd9a2244fdd3c378e27', 1, 0, '2014-12-18 12:54:19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
