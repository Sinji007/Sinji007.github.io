-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 04:54 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wallpaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(3, 'admin', 'admin', 'Refrian Fajri');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `idanggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tgldaftar` datetime NOT NULL,
  PRIMARY KEY (`idanggota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`idanggota`, `nama`, `email`, `password`, `tgldaftar`) VALUES
(3, 'Refrian Fajri', 'user', 'user', '2024-01-25 19:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `idgambar` int(11) NOT NULL AUTO_INCREMENT,
  `idkat` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `nama` text NOT NULL,
  `resolusi` text NOT NULL,
  `foto` text NOT NULL,
  `tglgambar` datetime NOT NULL,
  PRIMARY KEY (`idgambar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`idgambar`, `idkat`, `idadmin`, `nama`, `resolusi`, `foto`, `tglgambar`) VALUES
(8, 7, 2, 'Pohon', '1920x1200', 'peakpx.jpg', '2024-01-25 05:49:16'),
(9, 7, 2, 'Pohon 2', '2560x1600', 'peakpx (11).jpg', '2024-01-25 05:50:07'),
(10, 7, 2, 'Pegunungan1', '2048x1365', 'peakpx (10).jpg', '2024-01-25 05:51:22'),
(11, 9, 2, 'Pohon 3', '1680x1050', 'peakpx (9).jpg', '2024-01-25 05:52:16'),
(12, 8, 2, 'Mobil', '1080x2340', 'peakpx (8).jpg', '2024-01-25 05:52:57'),
(13, 8, 2, 'mobil 2', '1080x1349', 'peakpx (7).jpg', '2024-01-25 05:53:48'),
(14, 7, 2, 'Computer', '1080x1349', 'peakpx (6).jpg', '2024-01-25 05:54:26'),
(15, 7, 2, 'Keyboard', '1920x1053', 'peakpx (5).jpg', '2024-01-25 05:55:28'),
(16, 7, 2, 'Computer2', '3840x2160', 'peakpx (4).jpg', '2024-01-25 05:56:55'),
(18, 7, 2, 'Keyboard 2 ', '3573x2680', 'peakpx (3).jpg', '2024-01-25 05:59:20'),
(19, 9, 2, 'Bumi', '7680x4320', 'peakpx (2).jpg', '2024-01-25 06:00:09'),
(20, 9, 2, 'Bumi 2', '1920x1080', 'peakpx (1).jpg', '2024-01-25 06:00:53'),
(23, 7, 2, 'Kota', '1230x2430', '1.jpg', '2024-01-25 10:20:09'),
(24, 9, 2, 'Kota2', '3573x2680', '2.jpg', '2024-01-25 10:20:30'),
(25, 9, 2, 'kota3', '1080x1349', '33 (1).jpg', '2024-01-25 10:20:45'),
(26, 8, 2, 'Kota4', '2040X1080', '33 (2).jpg', '2024-01-25 10:21:09'),
(27, 9, 2, 'computer123', '1080x1349', '2e.jpg', '2024-01-25 10:23:24'),
(28, 9, 2, 'goku', '2040X1080', 'dbdb.jpg', '2024-01-25 10:23:46'),
(29, 9, 2, 'Computer12', '3573x2680', 'sdvf.jpg', '2024-01-25 10:24:11'),
(30, 7, 2, 'Computer324', '3573x2680', 'rge.jpg', '2024-01-25 10:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `idkat` int(11) NOT NULL AUTO_INCREMENT,
  `idadmin` int(11) NOT NULL,
  `namakat` varchar(50) NOT NULL,
  `ketkat` text NOT NULL,
  `tglkat` datetime NOT NULL,
  PRIMARY KEY (`idkat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkat`, `idadmin`, `namakat`, `ketkat`, `tglkat`) VALUES
(7, 2, 'LAYAR : LAPTOP', 'FULL HD', '2024-01-21 18:55:04'),
(8, 2, 'LAYAR : HP', '2K', '2024-01-21 18:55:31'),
(9, 2, 'LAYAR : TV', '4K', '2024-01-24 08:01:41');
