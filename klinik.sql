-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2016 at 04:57 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `klinik`
--
CREATE DATABASE IF NOT EXISTS `klinik` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `klinik`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE IF NOT EXISTS `tbl_anggota` (
  `id_anggota` int(10) NOT NULL AUTO_INCREMENT,
  `id_dusun` int(10) NOT NULL,
  `nama_anggota` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tgl_lahir` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `notelp` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `nama_bayi` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_ayah` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `id_dusun`, `nama_anggota`, `tempat_lahir`, `tgl_lahir`, `alamat`, `notelp`, `nama_bayi`, `nama_ayah`) VALUES
(1, 2, 'Nafisah', 'Pamekasan', '1987-05-20', 'Palesangger Pamekasan', '081935153690', 'Nailatul Ma''rifa', 'Abdullah Assegaf'),
(3, 1, 'Dewi Prastika Mulyanti', 'Pamekasan', '1998-07-24', 'Palesangger Pegantenan Pamekasan', '087750695944', 'Farhan', 'Jamal'),
(4, 2, 'Muniati', 'Pamekasan', '1970-05-20', 'Palesangger Pegantenan Pamekasan', '081939249410', 'Jamal Huzair', 'Samsul');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dusun`
--

CREATE TABLE IF NOT EXISTS `tbl_dusun` (
  `id_dusun` int(10) NOT NULL AUTO_INCREMENT,
  `nama_dusun` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dusun`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_dusun`
--

INSERT INTO `tbl_dusun` (`id_dusun`, `nama_dusun`) VALUES
(2, 'Dusun Morpenang'),
(3, 'Kendal'),
(4, 'Somor Pote');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ibuhamil`
--

CREATE TABLE IF NOT EXISTS `tbl_ibuhamil` (
  `id_ibuhamil` int(10) NOT NULL AUTO_INCREMENT,
  `id_dusun` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_suami` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_ibuhamil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_ibuhamil`
--

INSERT INTO `tbl_ibuhamil` (`id_ibuhamil`, `id_dusun`, `nama`, `nama_suami`, `alamat`, `notelp`) VALUES
(1, 3, 'Susanti', 'Santoso', 'Palesangger Laok', '081935153690');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE IF NOT EXISTS `tbl_kegiatan` (
  `id_kegiatan` int(10) NOT NULL AUTO_INCREMENT,
  `isi_kegiatan` text NOT NULL,
  `tgl_kegiatan` varchar(20) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(15) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tgl_alarm` varchar(20) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id_kegiatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `isi_kegiatan`, `tgl_kegiatan`, `hari`, `jam`, `tempat`, `tgl_alarm`, `status`) VALUES
(1, 'Pemberian Imunisasi Ulang Untuk Mencegah Vaksin Palsu', '2016-07-25', 'Senin', '08:00', 'Puskesmas Pegantenan', '2016-07-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelahiran`
--

CREATE TABLE IF NOT EXISTS `tbl_kelahiran` (
  `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT,
  `id_dusun` int(10) NOT NULL,
  `nama_pasien` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_melahirkan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `jk_anak` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `berat` double NOT NULL,
  `proses_kelahiran` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `nama_suami` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kelahiran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_kelahiran`
--

INSERT INTO `tbl_kelahiran` (`id_kelahiran`, `id_dusun`, `nama_pasien`, `tgl_melahirkan`, `jk_anak`, `berat`, `proses_kelahiran`, `nama_suami`) VALUES
(1, 1, 'Fatimah', '2016-06-23', 'Laki-Laki', 3.2, 'Normal', 'Sa''dullah'),
(2, 2, 'Juma''ani', '2016-07-23', 'Perempuan', 2.8, 'Operasi', 'Johan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_layanan`
--

CREATE TABLE IF NOT EXISTS `tbl_layanan` (
  `id_layanan` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_layanan` varchar(200) NOT NULL,
  PRIMARY KEY (`id_layanan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_layanan`
--

INSERT INTO `tbl_layanan` (`id_layanan`, `jenis_layanan`) VALUES
(1, 'Pemeriksaan Ibu Hamil'),
(2, 'Penanganan Proses Melahirkan'),
(3, 'Layanan KB'),
(4, 'Pemeriksaan Balita');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemeriksaan`
--

CREATE TABLE IF NOT EXISTS `tbl_pemeriksaan` (
  `id_pemeriksaan` int(10) NOT NULL AUTO_INCREMENT,
  `id_ibuhamil` int(10) NOT NULL,
  `tgl_periksa` varchar(30) NOT NULL,
  `tgl_periksa_ulang` varchar(30) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id_pemeriksaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_pemeriksaan`
--

INSERT INTO `tbl_pemeriksaan` (`id_pemeriksaan`, `id_ibuhamil`, `tgl_periksa`, `tgl_periksa_ulang`, `status`) VALUES
(3, 1, '2016-07-01', '2016-08-01', 0),
(4, 1, '2016-08-01', '2016-09-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tabel`
--

CREATE TABLE IF NOT EXISTS `tbl_tabel` (
  `id_tabel` int(5) NOT NULL AUTO_INCREMENT,
  `nama_tabel` varchar(100) NOT NULL,
  `kolom` text NOT NULL,
  PRIMARY KEY (`id_tabel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_tabel`
--

INSERT INTO `tbl_tabel` (`id_tabel`, `nama_tabel`, `kolom`) VALUES
(1, 'tbl_anggota', 'id_anggota,id_dusun,nama_anggota,tempat_lahir,tgl_lahir,alamat,notelp,nama_bayi,nama_ayah'),
(2, 'tbl_dusun', 'id_dusun,nama_dusun'),
(3, 'tbl_kelahiran', 'id_kelahiran,id_dusun,nama_pasien,tgl_melahirkan,jk_anak,berat,proses_kelahiran,nama_suami'),
(4, 'tbl_layanan', 'id_layanan,jenis_layanan'),
(5, 'tbl_kegiatan', 'id_kegiatan,isi_kegiatan,tgl_kegiatan,hari,jam,tempat,tgl_alarm,status'),
(6, 'tbl_user', 'id_user,username,password'),
(7, 'tbl_ibuhamil', 'id_ibuhamil,id_dusun,nama,nama_suami,alamat,notelp'),
(8, 'tbl_pemeriksaan', 'id_pemeriksaan,id_ibuhamil,tgl_periksa,tgl_periksa_ulang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`) VALUES
(11, 'dewi', 'dewi'),
(13, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
