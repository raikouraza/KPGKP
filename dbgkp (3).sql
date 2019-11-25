-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 09:37 AM
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
DROP PROCEDURE IF EXISTS `gerejaDel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `gerejaDel`(IN ID varchar(50))
begin
  if (trim(ID)='') then
    select 'Data tidak lengkap !' as ErrMsg;
  else 
    if (exists(select * from tbGereja where md5(gereja_ID)=ID)) then
      delete from tbGereja where md5(gereja_ID)=ID;
      select 'Data telah dihapus !' as ErrMsg;
	else 
      select 'Data tidak dikenal !' as ErrMsg;
    end if;
  end if;
end$$

DROP PROCEDURE IF EXISTS `gerejaGet`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `gerejaGet`(IN keyword varchar(50), kondisi decimal(1))
begin
  if (kondisi <-1) or (kondisi > 1) then
    select 'Data tidak lengkap !' as ErrMsg;
  else 
    drop table if exists temp1; drop table if exists temp2;
    create temporary table temp1 as 
      select md5(gereja_ID) as id, gereja_Nama as nama, gereja_Alamat as alamat, gereja_Kota as kota, gereja_RT as RT, 
             gereja_RW as RW, gereja_Kecamatan as camat, gereja_Kelurahan as lurah, gereja_KodePos as kodePos, 
             gereja_Telp as telp, gereja_Email as email, gereja_Pemilik as pemilik, gereja_Jenis as jenisID,
             case(gereja_Jenis)
               when 0 then 'Milik Sendiri'
               when 1 then 'Sewa'
               when 2 then 'Dipinjamkan'
             end as jenisTxt, gereja_Status as statusID, if(gereja_Status = 0,'Tidak Aktif','Aktif') as statusTxt
      from tbGereja; 
    create temporary table temp2 as select * from temp1; delete from temp2;    
    if (trim(keyword)<>'') then
      insert into temp2 select * from temp1 where (id = keyword) or (nama like concat('%',keyword,'%')); 
      delete from temp1; insert into temp1 select * from temp2; delete from temp2;
	end if;
    if (kondisi <> -1) then delete from temp1 where (statusID <> kondisi); end if;
    select 'Data ditemukan !' as ErrMsg, temp1.*  from temp1; drop table temp1; drop table temp2;
  end if;
end$$

DROP PROCEDURE IF EXISTS `gerejaSet`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `gerejaSet`(IN ID varchar(50), nama varchar(150), alamat varchar(100), kota varchar(50), rt varchar(3), 
       rw  varchar(3), kecamatan varchar(50), kelurahan varchar(50), kodepos varchar(5), telp varchar(15), email varchar(100),
       jenis decimal(1), pemilik varchar(250), kondisi decimal(1))
begin
   declare nomor varchar(3);
   if (trim(nama)='') then
     select 'Nama gereja tidak boleh kosong' as ErrMsg;
   else
     if (trim(id)='') then
       set id = concat(concat(year(now()), right(concat('0',month(now())),2), right(concat('0',day(now())),2)));
       select ifnull(max(right(gereja_ID,3)),0)+1 into nomor from tbgereja where gereja_ID like concat(id, '%');
       set id = concat(id, right(concat('000',nomor),3));
       insert into tbGereja(gereja_ID) values (id);
       set id = md5(id);
     end if;
     update tbGereja set gereja_Nama=nama, gereja_Alamat=alamat, gereja_Kota=kota, gereja_RT=rt, gereja_RW=rw, 
            gereja_Kecamatan=kecamatan, gereja_Kelurahan=kelurahan, gereja_KodePos=kodepos, gereja_Telp=telp, 
            gereja_Email=email, gereja_Jenis=jenis, gereja_Pemilik = pemilik, gereja_Status=kondisi 
      where md5(gereja_ID) = id; 
     select 'Data sudah disimpan' as ErrMsg;
   end if;
end$$

DROP PROCEDURE IF EXISTS `jemaatGetAll`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `jemaatGetAll`()
begin
	Select md5(j.jemaat_ID) as id, j.jemaat_Nomor as nomor, j.jemaat_Nama_Depan as nama, j.jemaat_Jenis_Kelamin as jeniskelamin, j.jemaat_Kota_Kelahiran as kotalahir, j.jemaat_Tanggal_Kelahiran as tgllahir , j.jemaat_Kota_Tinggal as kota, j.jemaat_Keluharan_Tinggal as kelurahan, jemaat_RT_Tinggal as rt, j.jemaat_RW_Tinggal as rw, j.jemaat_Alamat_Tinggal as alamat, j.jemaat_KodePos_Tinggal as kodepos, j.jemaat_Provinsi_Tinggal as provinsi, j.jemaat_Status_Menikah as stat, j.jemaat_Foto as foto, j.jemaat_Role as role, j.jemaat_UserName as uname, j.jemaat_Password as pwd, j.jemaat_Lock as lck, j.jemaat_Status_Baptis as statbaptis, j.jemaat_Telp as telp, j.jemaat_Pendidikan as pendidikan, j.jemaat_NoKK as kk, j.jemaat_pekerjaan_ID as pid, j.jemaat_gereja_ID as gid , j , p.pekerjaan_nama, g.gereja_nama from tbJemaat j join tbGereja g on (j.jemaat_gereja_id = g.gereja_id) join tbPekerjaan p on (p.pekerjaan_id = j.jemaat_pekerjaan_id);
end$$

DROP PROCEDURE IF EXISTS `jemaatGetOne`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `jemaatGetOne`(IN ID varchar(50))
begin
	Select md5(j.jemaat_ID) as id, j.jemaat_Nomor as nomor, j.jemaat_Nama_Depan as nama, j.jemaat_Jenis_Kelamin as jeniskelamin, j.jemaat_Kota_Kelahiran as kotalahir, j.jemaat_Tanggal_Kelahiran as tgllahir , j.jemaat_Kota_Tinggal as kota, j.jemaat_Keluharan_Tinggal as kelurahan, jemaat_RT_Tinggal as rt, j.jemaat_RW_Tinggal as rw, j.jemaat_Alamat_Tinggal as alamat, j.jemaat_KodePos_Tinggal as kodepos, j.jemaat_Provinsi_Tinggal as provinsi, j.jemaat_Status_Menikah as stat, j.jemaat_Foto as foto, j.jemaat_Role as role, j.jemaat_UserName as uname, j.jemaat_Password as pwd, j.jemaat_Lock as lck, j.jemaat_Status_Baptis as statbaptis, j.jemaat_Telp as telp, j.jemaat_Pendidikan as pendidikan, j.jemaat_NoKK as kk, j.jemaat_pekerjaan_ID as pid, j.jemaat_gereja_ID as gid , j , p.pekerjaan_nama, g.gereja_nama from tbJemaat j join tbGereja g on (j.jemaat_gereja_id = g.gereja_id) join tbPekerjaan p on (p.pekerjaan_id = j.jemaat_pekerjaan_id) where j.jemaat_Id = ID;
end$$

DROP PROCEDURE IF EXISTS `jemaatSet`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `jemaatSet`(IN id varchar(50), nmr varchar(50), nmdepan varchar(200), jnskelamin integer(1), kotakel varchar(50), tglkel date, kotating varchar(50), kelurahan varchar(50), kecamatan varchar(50), rt varchar(3), rw varchar(3), alamat varchar(100), kodepos varchar(5), provinsi varchar(50), stat varchar(20), foto varchar(100), role varchar(15), uname varchar(50), pwd varchar(50), lck integer(1), telp varchar(15), pendidikan varchar(10), nokk varchar(16), pekerjaanid integer(3), gerejaid varchar(50) )
begin
   declare nomor varchar(4);
   if (trim(gerejaid)='' ) then
     select 'idGereja tidak boleh kosong' as ErrMsg;
   else
     if (trim(id)='') then
       set id = concat('J-',concat(year(now()), right(concat('0',month(now())),2), right(concat('0',day(now())),2)));
       select ifnull(max(right(kehadiran_ID,3)),0)+1 into nomor from tbKehadiran where kehadiran_ID like concat(id, '%');
       set id = concat(id, right(concat('0000',nomor),3));
       -- select id;
       insert into tbJemaat(jemaat_ID) values (id);
     end if;
     update tbJemaat set jemaat_Nomor = nmr, jemaat_Nama_Depan = nmdepan, jemaat_Jenis_Kelamin = jnskelamin, jemaat_Kota_Kelahiran = kotakel, jemaat_Tanggal_Kelahiran = tglkel, jemaat_Kota_Tinggal = kotating ,jemaat_Kelurahan_Tinggal = kelurahan, jemaat_Kecamatan_Tinggal = kecamatan, jemaat_Rt_Tinggal = rt, jemaat_Rw_Tinggal = rw, jemaat_Alamat_Tinggal = alamat, jemaat_KodePos_Tinggal = kodepos, jemaat_Provinsi_Tinggal = provinsi, jemaat_Status_Menikah = stat, jemaat_Foto = foto, jemaat_Role = role, jemaat_UserName = uname, jemaat_Password = pwd, jemaat_Lock = lck, jemaat_Telp=telp, jemaat_Pendidikan = pendidikan, jemaat_NoKK = nokk, jemaat_pekerjaan_ID = pekerjaanid, jemaat_gereja_ID = gerejaid WHERE jemaat_ID = id; 
     select 'Data sudah disimpan' as ErrMsg;
   end if;
end$$

DROP PROCEDURE IF EXISTS `kehadiranDel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `kehadiranDel`(IN ID varchar(50))
begin
	if (trim(ID)='') then
    select 'Data tidak lengkap !' as ErrMsg;
  else 
    if (exists(select * from tbKehadiran where md5(kehadiran_ID)=ID)) then
      delete from tbKehadiran where md5(kehadiran_ID)=ID;
      select 'Data telah dihapus !' as ErrMsg;
	else 
      select 'Data tidak dikenal !' as ErrMsg;
    end if;
  end if;
end$$

DROP PROCEDURE IF EXISTS `kehadiranGet`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `kehadiranGet`(IN ID varchar(50))
begin
	Select * from tbKehadiran where Kehadiran_Id = ID;
end$$

DROP PROCEDURE IF EXISTS `kehadiranGetAll`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `kehadiranGetAll`()
begin
	Select md5(k.kehadiran_ID) as id, k.kehadiran_Tanggal as tgl, k.kehadiran_Jumlah_Wanita as jmlwanita, k.kehadiran_Jumlah_Pria as jmlpria, k.kehadiran_Jumlah_Persembahan as persembahan, k.kehadiran_Gereja_Id as gerejaid, g.gereja_nama from tbKehadiran k join tbgereja g on (k.kehadiran_Gereja_Id = g.gereja_ID);
end$$

DROP PROCEDURE IF EXISTS `kehadiranSet`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `kehadiranSet`(IN id varchar(50), tgl date ,jmlwanita integer,jmlpria integer,jmlpersembahan integer,idGereja varchar(50))
begin
   declare nomor varchar(3);
   if (trim(idGereja)='') then
     select 'Id Gereja tidak boleh kosong' as ErrMsg;
   else
     if (trim(id)='') then
       set id = concat('K-',concat(year(now()), right(concat('0',month(now())),2), right(concat('0',day(now())),2)));
       select ifnull(max(right(kehadiran_ID,3)),0)+1 into nomor from tbKehadiran where kehadiran_ID like concat(id, '%');
       set id = concat(id, right(concat('000',nomor),3));
       -- select id;
       insert into tbkehadiran(kehadiran_ID) values (id);
     end if;
     update tbKehadiran set kehadiran_Tanggal = tgl, kehadiran_Jumlah_Wanita = jmlwanita, kehadiran_Jumlah_Pria=jmlpria,kehadiran_Jumlah_Persembahan=jmlpersembahan,kehadiran_Gereja_Id=idgereja where kehadiran_ID = id; 
     select 'Data sudah disimpan' as ErrMsg;
   end if;
end$$

DROP PROCEDURE IF EXISTS `PekerjaanGetAll`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PekerjaanGetAll`()
begin
	Select * from tbPekerjaan;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbgereja`
--

DROP TABLE IF EXISTS `tbgereja`;
CREATE TABLE IF NOT EXISTS `tbgereja` (
  `gereja_ID` varchar(50) NOT NULL,
  `gereja_Nama` varchar(150) NOT NULL,
  `gereja_Alamat` varchar(100) DEFAULT NULL,
  `gereja_Kota` varchar(50) DEFAULT NULL,
  `gereja_RT` varchar(3) DEFAULT NULL,
  `gereja_RW` varchar(3) DEFAULT NULL,
  `gereja_Kecamatan` varchar(50) DEFAULT NULL,
  `gereja_Kelurahan` varchar(50) DEFAULT NULL,
  `gereja_KodePos` varchar(5) DEFAULT NULL,
  `gereja_Telp` varchar(15) DEFAULT NULL,
  `gereja_Email` varchar(100) DEFAULT NULL,
  `gereja_Jenis` decimal(1,0) DEFAULT '0',
  `gereja_Pemilik` varchar(250) DEFAULT NULL,
  `gereja_Status` decimal(1,0) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbjemaat`
--

DROP TABLE IF EXISTS `tbjemaat`;
CREATE TABLE IF NOT EXISTS `tbjemaat` (
  `jemaat_ID` varchar(50) NOT NULL,
  `jemaat_Nomor` varchar(50) DEFAULT NULL,
  `jemaat_Nama_Depan` varchar(200) NOT NULL,
  `jemaat_Nama_Belakang` varchar(50) DEFAULT NULL,
  `jemaat_Nama_Keluarga` varchar(50) DEFAULT NULL,
  `jemaat_Jenis_Kelamin` int(1) NOT NULL,
  `jemaat_Kota_Kelahiran` varchar(50) DEFAULT NULL,
  `jemaat_Tanggal_Kelahiran` varchar(50) DEFAULT NULL,
  `jemaat_Kota_Tinggal` varchar(50) DEFAULT NULL,
  `jemaat_Kelurahan_Tinggal` varchar(50) DEFAULT NULL,
  `jemaat_Kecamatan_Tinggal` varchar(50) DEFAULT NULL,
  `jemaat_RT_Tinggal` varchar(3) DEFAULT NULL,
  `jemaat_RW_Tinggal` varchar(3) DEFAULT NULL,
  `jemaat_Alamat_Tinggal` varchar(100) DEFAULT NULL,
  `jemaat_KodePos_Tinggal` varchar(5) DEFAULT NULL,
  `jemaat_Provinsi_Tinggal` varchar(50) DEFAULT NULL,
  `jemaat_Status_Menikah` int(1) NOT NULL DEFAULT '0',
  `jemaat_Foto` varchar(50) DEFAULT NULL,
  `jemaat_Role` varchar(15) DEFAULT NULL,
  `jemaat_UserName` varchar(50) DEFAULT NULL,
  `jemaat_Password` varchar(20) DEFAULT NULL,
  `jemaat_Lock` int(1) DEFAULT NULL,
  `jemaat_Status_Baptis` varchar(10) NOT NULL,
  `jemaat_Telp` varchar(15) DEFAULT NULL,
  `jemaat_Pendidikan` varchar(10) DEFAULT NULL,
  `jemaat_NoKK` varchar(16) NOT NULL,
  `jemaat_pekerjaan_ID` int(3) NOT NULL,
  `jemaat_gereja_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbjemaat`
--

INSERT INTO `tbjemaat` (`jemaat_ID`, `jemaat_Nomor`, `jemaat_Nama_Depan`, `jemaat_Nama_Belakang`, `jemaat_Nama_Keluarga`, `jemaat_Jenis_Kelamin`, `jemaat_Kota_Kelahiran`, `jemaat_Tanggal_Kelahiran`, `jemaat_Kota_Tinggal`, `jemaat_Kelurahan_Tinggal`, `jemaat_Kecamatan_Tinggal`, `jemaat_RT_Tinggal`, `jemaat_RW_Tinggal`, `jemaat_Alamat_Tinggal`, `jemaat_KodePos_Tinggal`, `jemaat_Provinsi_Tinggal`, `jemaat_Status_Menikah`, `jemaat_Foto`, `jemaat_Role`, `jemaat_UserName`, `jemaat_Password`, `jemaat_Lock`, `jemaat_Status_Baptis`, `jemaat_Telp`, `jemaat_Pendidikan`, `jemaat_NoKK`, `jemaat_pekerjaan_ID`, `jemaat_gereja_ID`) VALUES
('J-20191119001', '202', 'Oceb Yehezkiel', '', '', 1, 'Bandung', '1999-02-12', '', 'Agar-Agar', 'Cilarang', '002', '001', 'Istana Anyar no 1a', '40213', 'Jawa Barat', 0, '123.png', 'admin', 'yehezkiel', 'password', 0, '', '', '', '', 42, 'G-20191119001');

-- --------------------------------------------------------

--
-- Table structure for table `tbkehadiran`
--

DROP TABLE IF EXISTS `tbkehadiran`;
CREATE TABLE IF NOT EXISTS `tbkehadiran` (
  `kehadiran_ID` varchar(50) NOT NULL DEFAULT '',
  `kehadiran_Tanggal` date NOT NULL,
  `kehadiran_Jumlah_Wanita` int(10) NOT NULL,
  `kehadiran_Jumlah_Pria` int(10) NOT NULL,
  `kehadiran_Jumlah_Persembahan` int(20) NOT NULL,
  `kehadiran_Gereja_Id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkehadiran`
--

INSERT INTO `tbkehadiran` (`kehadiran_ID`, `kehadiran_Tanggal`, `kehadiran_Jumlah_Wanita`, `kehadiran_Jumlah_Pria`, `kehadiran_Jumlah_Persembahan`, `kehadiran_Gereja_Id`) VALUES
('K-20191119001', '2019-11-19', 10, 25, 15000, 'G-20191119001'),
('K-20191119002', '2019-11-19', 11, 25, 15000, 'G-20191119001'),
('K-20191119003', '2019-11-19', 12, 15, 15000, 'G-20191119001'),
('K-20191119004', '0000-00-00', 0, 0, 0, ''),
('K-20191119005', '0000-00-00', 0, 0, 0, ''),
('K-20191119006', '0000-00-00', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbpekerjaan`
--

DROP TABLE IF EXISTS `tbpekerjaan`;
CREATE TABLE IF NOT EXISTS `tbpekerjaan` (
  `pekerjaan_ID` int(3) NOT NULL,
  `pekerjaan_Nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpekerjaan`
--

INSERT INTO `tbpekerjaan` (`pekerjaan_ID`, `pekerjaan_Nama`) VALUES
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
 ADD PRIMARY KEY (`gereja_ID`);

--
-- Indexes for table `tbjemaat`
--
ALTER TABLE `tbjemaat`
 ADD PRIMARY KEY (`jemaat_ID`);

--
-- Indexes for table `tbkehadiran`
--
ALTER TABLE `tbkehadiran`
 ADD PRIMARY KEY (`kehadiran_ID`);

--
-- Indexes for table `tbpekerjaan`
--
ALTER TABLE `tbpekerjaan`
 ADD PRIMARY KEY (`pekerjaan_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
