-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 08:34 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbgkp`
--
CREATE DATABASE IF NOT EXISTS `dbgkp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbgkp`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `getOneJemaat`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getOneJemaat`(IN `Id` VARCHAR(50))
    NO SQL
Select j.*, g.gereja_nama, p.pekerjaan_nama from tbjemaat j join tbgereja g on (j.jemaat_gereja_id = g.gereja_id) join tbpekerjaan p on (p.pekerjaan_nama = j.jemaat_pekerjaan_id) where Jemaat_id = Id$$

DROP PROCEDURE IF EXISTS `getOneKehadiran`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getOneKehadiran`(IN `Id` VARCHAR(50))
    NO SQL
Select g.gereja_nama, k.kehadiran_tanggal, k.kehadiran_jumlah_pria, k.kehadiran_jumlah_wanita, k.kehadiran_jumlah_persembahan from tbKehadiran k join Gereja g on (g.gereja_id = k.kehadiran_gereja_id) where kehadiran_id = Id$$

DROP PROCEDURE IF EXISTS `getOnePekerjaan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getOnePekerjaan`(IN `Id` INT(3))
    NO SQL
Select * from tbPekerjaan where Pekerjaan_id = id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbgereja`
--

DROP TABLE IF EXISTS `tbgereja`;
CREATE TABLE IF NOT EXISTS `tbgereja` (
  `Gereja_Id` varchar(50) NOT NULL,
  `Gereja_Nama` varchar(150) NOT NULL,
  `Gereja_Alamat` varchar(100) NOT NULL,
  `Gereja_Kota` varchar(50) NOT NULL,
  `Gereja_RT` varchar(3) NOT NULL,
  `Gereja_RW` varchar(3) NOT NULL,
  `Gereja_Kecamatan` varchar(50) NOT NULL,
  `Gereja_Kelurahan` varchar(50) NOT NULL,
  `Gereja_Telp` varchar(15) NOT NULL,
  `Gereja_Pemilik` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbjemaat`
--

DROP TABLE IF EXISTS `tbjemaat`;
CREATE TABLE IF NOT EXISTS `tbjemaat` (
  `Jemaat_Id` varchar(50) NOT NULL,
  `Jemaat_Nomor` varchar(50) NOT NULL,
  `Jemaat_Nama_Depan` varchar(200) NOT NULL,
  `Jemaat_Nama_Belakang` varchar(50) NOT NULL,
  `Jemaat_Nama_Keluarga` varchar(50) NOT NULL,
  `Jemaat_Jenis_Kelamin` int(1) NOT NULL,
  `Jemaat_Kota_Kelahiran` varchar(50) NOT NULL,
  `Jemaat_Tanggal_Kelahiran` varchar(50) NOT NULL,
  `Jemaat_Kota_Tinggal` varchar(50) NOT NULL,
  `Jemaat_Kelurahan_Tinggal` varchar(50) NOT NULL,
  `Jemaat_Kecamatan_Tinggal` varchar(50) NOT NULL,
  `Jemaat_RT_Tinggal` varchar(3) NOT NULL,
  `Jemaat_RW_Tinggal` varchar(3) NOT NULL,
  `Jemaat_Alamat_Tinggal` varchar(100) NOT NULL,
  `Jemaat_KodePos_Tinggal` varchar(5) NOT NULL,
  `Jemaat_Provinsi_Tinggal` varchar(50) NOT NULL,
  `Jemaat_Status_Menikah` varchar(20) NOT NULL,
  `Jemaat_Foto` varchar(50) NOT NULL,
  `Jemaat_Role` varchar(15) NOT NULL,
  `Jemaat_UserName` varchar(50) NOT NULL,
  `Jemaat_Password` varchar(20) NOT NULL,
  `Jemaat_Lock` int(1) NOT NULL,
  `Jemaat_Pekerjaan_Id` int(3) NOT NULL,
  `Jemaat_Gereja_Id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbkehadiran`
--

DROP TABLE IF EXISTS `tbkehadiran`;
CREATE TABLE IF NOT EXISTS `tbkehadiran` (
  `Kehadiran_Id` varchar(50) NOT NULL,
  `Kehadiran_Tanggal` date NOT NULL,
  `Kehadiran_Jumlah_Wanita` int(10) NOT NULL,
  `Kehadiran_Jumlah_Pria` int(10) NOT NULL,
  `Kehadiran_Jumlah_Persembahan` int(20) NOT NULL,
  `Kehadiran_Gereja_Id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpekerjaan`
--

DROP TABLE IF EXISTS `tbpekerjaan`;
CREATE TABLE IF NOT EXISTS `tbpekerjaan` (
  `Pekerjaan_Id` int(3) NOT NULL,
  `Pekerjaan_Nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpekerjaan`
--

INSERT INTO `tbpekerjaan` (`Pekerjaan_Id`, `Pekerjaan_Nama`) VALUES
(1, 'BELUM/TIDAK BEKERJA'),
(2, 'MENGURUS RUMAH TANGGA'),
(3, 'PELAJAR/MAHASISWA'),
(4, 'PENSIUNAN'),
(5, 'PEGAWAI NEGERI SIPIL'),
(6, 'TENTARA NASIONAL INDONESIA'),
(7, 'KEPOLISIAN RI'),
(8, 'PERDAGANGAN'),
(9, 'PETANI/PEKEBUN'),
(10, 'PETERNAK'),
(11, 'NELAYAN/PERIKANAN'),
(12, 'INDUSTRI'),
(13, 'KONSTRUKSI'),
(14, 'TRANSPORTASI'),
(15, 'KARYAWAN SWASTA'),
(16, 'KARYAWAN BUMN'),
(17, 'KARYAWAN BUMD'),
(18, 'KARYAWAN HONORER'),
(19, 'BURUH HARIAN LEPAS'),
(20, 'BURUH TANI/PERKEBUNAN'),
(21, 'BURUH NELAYAN/PERIKANAN'),
(22, 'BURUH PETERNAKAN'),
(23, 'PEMBANTU RUMAH TANGGA'),
(24, 'TUKANG CUKUR'),
(25, 'TUKANG LISTRIK'),
(26, 'TUKANG BATU'),
(27, 'TUKANG KAYU'),
(28, 'TUKANG SOL SEPATU'),
(29, 'TUKANG LAS/PANDAI BESI'),
(30, 'TUKANG JAHIT'),
(31, 'TUKANG GIGI'),
(32, 'PENATA RIAS'),
(33, 'PENATA BUSANA'),
(34, 'PENATA RAMBUT'),
(35, 'MEKANIK'),
(36, 'SENIMAN'),
(37, 'TABIB'),
(38, 'PARAJI'),
(39, 'PERANCANG BUSANA'),
(40, 'PENTERJEMAH'),
(41, 'IMAM MESJID'),
(42, 'PENDETA'),
(43, 'PASTOR'),
(44, 'WARTAWAN'),
(45, 'USTADZ/MUBALIGH'),
(46, 'JURU MASAK'),
(47, 'PROMOTOR ACARA'),
(48, 'ANGGOTA DPR-RI'),
(49, 'ANGGOTA DPD'),
(50, 'ANGGOTA BPK'),
(51, 'PRESIDEN'),
(52, 'WAKIL PRESIDEN'),
(53, 'ANGGOTA MAHKAMAH KONSTITUSI'),
(54, 'ANGGOTA KABINET/KEMENTERIAN'),
(55, 'DUTA BESAR'),
(56, 'GUBERNUR'),
(57, 'WAKIL GUBERNUR'),
(58, 'BUPATI'),
(59, 'WAKIL BUPATI'),
(60, 'WALIKOTA'),
(61, 'WAKIL WALIKOTA'),
(62, 'ANGGOTA DPRD PROVINSI'),
(63, 'ANGGOTA DPRD KABUPATEN/KOTA'),
(64, 'DOSEN'),
(65, 'GURU'),
(66, 'PILOT'),
(67, 'PENGACARA'),
(68, 'NOTARIS'),
(69, 'ARSITEK'),
(70, 'AKUNTAN'),
(71, 'KONSULTAN'),
(72, 'DOKTER'),
(73, 'BIDAN'),
(74, 'PERAWAT'),
(75, 'APOTEKER'),
(76, 'PSIKIATER/PSIKOLOG'),
(77, 'PENYIAR TELEVISI'),
(78, 'PENYIAR RADIO'),
(79, 'PELAUT'),
(80, 'PENELITI'),
(81, 'SOPIR'),
(82, 'PIALANG'),
(83, 'PARANORMAL'),
(84, 'PEDAGANG'),
(85, 'PERANGKAT DESA'),
(86, 'KEPALA DESA'),
(87, 'BIARAWATI'),
(88, 'WIRASWASTA'),
(89, 'LAINNYA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbgereja`
--
ALTER TABLE `tbgereja`
 ADD PRIMARY KEY (`Gereja_Id`);

--
-- Indexes for table `tbjemaat`
--
ALTER TABLE `tbjemaat`
 ADD PRIMARY KEY (`Jemaat_Id`);

--
-- Indexes for table `tbkehadiran`
--
ALTER TABLE `tbkehadiran`
 ADD PRIMARY KEY (`Kehadiran_Id`);

--
-- Indexes for table `tbpekerjaan`
--
ALTER TABLE `tbpekerjaan`
 ADD PRIMARY KEY (`Pekerjaan_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
