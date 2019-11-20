-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 07:22 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgkp`
--
CREATE DATABASE IF NOT EXISTS `dbgkp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbgkp`;

-- --------------------------------------------------------

--
-- Table structure for table `tbgereja`
--

DROP TABLE IF EXISTS `tbgereja`;
CREATE TABLE `tbgereja` (
  `Id_Gereja` varchar(50) NOT NULL,
  `Nama_Gereja` varchar(150) NOT NULL,
  `Alamat_Gereja` varchar(100) NOT NULL,
  `Kota_Gereja` varchar(50) NOT NULL,
  `RT_Gereja` varchar(3) NOT NULL,
  `RW_Gereja` varchar(3) NOT NULL,
  `Kecamatan_Gereja` varchar(50) NOT NULL,
  `Kelurahan_Gereja` varchar(50) NOT NULL,
  `Telp_Gereja` varchar(15) NOT NULL,
  `Pemilik_Gereja_` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbjemaat`
--

DROP TABLE IF EXISTS `tbjemaat`;
CREATE TABLE `tbjemaat` (
  `Id_Jemaat` varchar(50) NOT NULL,
  `Nama_Depan_Jemaat` varchar(100) NOT NULL,
  `Nama_Belakang_Jemaat` varchar(50) NOT NULL,
  `Nama_Keluarga_Jemaat` varchar(50) NOT NULL,
  `Kota_Kelahiran_Jemaat` varchar(50) NOT NULL,
  `Tanggal_Kelahiran_Jemaat` varchar(50) NOT NULL,
  `Usia_Jemaat` varchar(10) NOT NULL,
  `Kota_Tinggal_Jemaat` varchar(50) NOT NULL,
  `Kelurahan_Tinggal_Jemaat` varchar(50) NOT NULL,
  `Kecamatan_Tinggal_Jemaat` varchar(50) NOT NULL,
  `RT_Tinggal_Jemaat` varchar(3) NOT NULL,
  `RW_Tinggal_Jemaat` varchar(3) NOT NULL,
  `Alamat_Tinggal_Jemaat` varchar(100) NOT NULL,
  `KodePos_Tinggal_Jemaat` varchar(5) NOT NULL,
  `Provinsi_Tinggal_Jemaat` varchar(50) NOT NULL,
  `Id_Pekerjaan_Jemaat` int(3) NOT NULL,
  `Status_Menikah_Jemaat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbkehadiran`
--

DROP TABLE IF EXISTS `tbkehadiran`;
CREATE TABLE `tbkehadiran` (
  `Id_Kehadiran` varchar(50) NOT NULL,
  `Tanggal_Kehadiran` varchar(25) NOT NULL,
  `Jumlah_Wanita` int(10) NOT NULL,
  `Jumlah_Pria` int(10) NOT NULL,
  `Jumlah_ Persembahan` int(20) NOT NULL,
  `Id_Gereja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpekerjaan`
--

DROP TABLE IF EXISTS `tbpekerjaan`;
CREATE TABLE `tbpekerjaan` (
  `Id_Pekerjaan` int(3) NOT NULL,
  `Nama_Pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpekerjaan`
--

INSERT INTO `tbpekerjaan` (`Id_Pekerjaan`, `Nama_Pekerjaan`) VALUES
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
  ADD PRIMARY KEY (`Id_Gereja`);

--
-- Indexes for table `tbjemaat`
--
ALTER TABLE `tbjemaat`
  ADD PRIMARY KEY (`Id_Jemaat`);

--
-- Indexes for table `tbkehadiran`
--
ALTER TABLE `tbkehadiran`
  ADD PRIMARY KEY (`Id_Kehadiran`);

--
-- Indexes for table `tbpekerjaan`
--
ALTER TABLE `tbpekerjaan`
  ADD PRIMARY KEY (`Id_Pekerjaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
