<<<<<<< HEAD
-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 08:04 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myspk`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kepala_keluarga`
--

CREATE TABLE `data_kepala_keluarga` (
  `ID_PENDUDUK` int(5) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `ALAMAT` varchar(100) NOT NULL,
  `JUMLAH_ANGGOTA_KELUARGA` int(11) NOT NULL,
  `STATUS_KPL_KELUARGA` varchar(15) NOT NULL,
  `PEKERJAAN` varchar(50) NOT NULL,
  `PENDIDIKAN_TERAKHIR` varchar(10) NOT NULL,
  `PENGHASILAN` int(11) NOT NULL,
  `SUMBER_PENERANGAN` varchar(15) NOT NULL,
  `BAHAN_BAKAR_MASAK` varchar(15) NOT NULL,
  `MEMBELI_PAKAIAN` varchar(6) NOT NULL,
  `SUMBER_AIR` varchar(10) NOT NULL,
  `JENIS_DINDING` varchar(20) NOT NULL,
  `JENIS_LANTAI` varchar(20) NOT NULL,
  `KEMAMPUAN_BEROBAT` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_kriteria`
--

CREATE TABLE `detail_kriteria` (
  `ID_KRITERIA` int(11) NOT NULL,
  `NILAI_KRITERIA` varchar(20) NOT NULL,
  `BOBOT_NILAI_KRITERIA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ir`
--

CREATE TABLE `ir` (
  `JUMLAH` int(11) NOT NULL,
  `NILAI` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `ID_KRITERIA` int(5) NOT NULL,
  `NAMA_KRITERIA` varchar(20) NOT NULL,
  `BOBOT_KRITERIA` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_penduduk`
--

CREATE TABLE `kriteria_penduduk` (
  `ID_PENDUDUK` int(5) NOT NULL,
  `ID_KRITERIA` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `USER_NAME` varchar(16) NOT NULL,
  `USER_PSW` char(16) DEFAULT NULL,
  `USER_ROLE` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `KRITERIA1` int(5) NOT NULL,
  `KRITERIA2` int(5) NOT NULL,
  `NILAI_ANALISA_KRITERIA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_penduduk`
--

CREATE TABLE `perbandingan_penduduk` (
  `ID` int(11) NOT NULL,
  `PENDUDUK1` int(5) NOT NULL,
  `ID_KRITERIA` int(5) NOT NULL,
  `PENDUDUK2` int(5) NOT NULL,
  `NILAI` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pv_kriteria`
--

CREATE TABLE `pv_kriteria` (
  `ID_KRITERIA` int(5) NOT NULL,
  `NILAI` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pv_penduduk`
--

CREATE TABLE `pv_penduduk` (
  `ID_KRITERIA` int(5) DEFAULT NULL,
  `ID_PENDUDUK` int(5) DEFAULT NULL,
  `NILAI` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kepala_keluarga`
--
ALTER TABLE `data_kepala_keluarga`
  ADD PRIMARY KEY (`ID_PENDUDUK`);

--
-- Indexes for table `detail_kriteria`
--
ALTER TABLE `detail_kriteria`
  ADD KEY `FK_RELATIONSHIP_7` (`ID_KRITERIA`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`ID_KRITERIA`);

--
-- Indexes for table `kriteria_penduduk`
--
ALTER TABLE `kriteria_penduduk`
  ADD PRIMARY KEY (`ID_KRITERIA`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`USER_NAME`);

--
-- Indexes for table `perbandingan_penduduk`
--
ALTER TABLE `perbandingan_penduduk`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kepala_keluarga`
--
ALTER TABLE `data_kepala_keluarga`
  MODIFY `ID_PENDUDUK` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `ID_KRITERIA` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perbandingan_penduduk`
--
ALTER TABLE `perbandingan_penduduk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kriteria`
--
ALTER TABLE `detail_kriteria`
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_KRITERIA`) REFERENCES `kriteria` (`ID_KRITERIA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
=======
/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     04/02/2020 10:04:41                          */
/*==============================================================*/


drop table if exists DATA_KEPALA_KELUARGA;

drop table if exists DETAIL_KRITERIA;

drop table if exists IR;

drop table if exists KRITERIA;

drop table if exists LOGIN;

drop table if exists PERBANDINGAN_KRITERIA;

drop table if exists PERBANDINGAN_PENDUDUK;

drop table if exists PV_KRITERIA;

drop table if exists PV_PENDUDUK;

/*==============================================================*/
/* Table: DATA_KEPALA_KELUARGA                                  */
/*==============================================================*/
create table DATA_KEPALA_KELUARGA
(
   ID_PENDUDUK          varchar(12) not null,
   NAMA                 varchar(100) not null,
   ALAMAT               varchar(100) not null,
   JUMLAH_ANGGOTA_KELUARGA int not null,
   STATUS_KPL_KELUARGA  varchar(15) not null,
   PEKERJAAN            varchar(50) not null,
   PENDIDIKAN_TERAKHIR  varchar(10) not null,
   PENGHASILAN          int not null,
   SUMBER_PENERANGAN    varchar(15) not null,
   BAHAN_BAKAR_MASAK    varchar(15) not null,
   MEMBELI_PAKAIAN      varchar(6) not null,
   SUMBER_AIR           varchar(10) not null,
   JENIS_DINDING        varchar(20) not null,
   JENIS_LANTAI         varchar(20) not null,
   KEMAMPUAN_BEROBAT    varchar(15) not null,
   primary key (ID_PENDUDUK)
);

/*==============================================================*/
/* Table: DETAIL_KRITERIA                                       */
/*==============================================================*/
create table DETAIL_KRITERIA
(
   ID_KRITERIA          char(7) not null,
   NILAI_KRITERIA       varchar(20) not null,
   BOBOT_NILAI_KRITERIA int not null
);

/*==============================================================*/
/* Table: IR                                                    */
/*==============================================================*/
create table IR
(
   JUMLAH               int not null,
   NILAI                float not null
);

/*==============================================================*/
/* Table: KRITERIA                                              */
/*==============================================================*/
create table KRITERIA
(
   ID_KRITERIA          char(7) not null,
   ID_PENDUDUK          varchar(12),
   NAMA_KRITERIA        varchar(20) not null,
   BOBOT_KRITERIA       decimal(6) not null,
   primary key (ID_KRITERIA)
);

/*==============================================================*/
/* Table: LOGIN                                                 */
/*==============================================================*/
create table LOGIN
(
   USER_NAME            varchar(16) not null,
   USER_PSW             char(16),
   USER_ROLE            varchar(30),
   primary key (USER_NAME)
);

/*==============================================================*/
/* Table: PERBANDINGAN_KRITERIA                                 */
/*==============================================================*/
create table PERBANDINGAN_KRITERIA
(
   KRITERIA1            char(7) not null,
   KRITERIA2            char(7) not null,
   NILAI_ANALISA_KRITERIA int
);

/*==============================================================*/
/* Table: PERBANDINGAN_PENDUDUK                                 */
/*==============================================================*/
create table PERBANDINGAN_PENDUDUK
(
   ID                   int not null,
   PENDUDUK1            varchar(12) not null,
   ID_KRITERIA          char(7) not null,
   PENDUDUK2            varchar(12) not null,
   NILAI                float,
   primary key (ID)
);

/*==============================================================*/
/* Table: PV_KRITERIA                                           */
/*==============================================================*/
create table PV_KRITERIA
(
   ID_KRITERIA          char(7) not null,
   NILAI                float
);

/*==============================================================*/
/* Table: PV_PENDUDUK                                           */
/*==============================================================*/
create table PV_PENDUDUK
(
   ID_KRITERIA          char(7),
   ID_PENDUDUK          varchar(12),
   NILAI                float
);

alter table DETAIL_KRITERIA add constraint FK_RELATIONSHIP_7 foreign key (ID_KRITERIA)
      references KRITERIA (ID_KRITERIA) on delete restrict on update restrict;

alter table KRITERIA add constraint FK_RELATIONSHIP_2 foreign key (ID_PENDUDUK)
      references DATA_KEPALA_KELUARGA (ID_PENDUDUK) on delete restrict on update restrict;

alter table PERBANDINGAN_KRITERIA add constraint FK_RELATIONSHIP_5 foreign key (KRITERIA2)
      references KRITERIA (ID_KRITERIA) on delete restrict on update restrict;

alter table PERBANDINGAN_KRITERIA add constraint FK_RELATIONSHIP_6 foreign key (KRITERIA1)
      references KRITERIA (ID_KRITERIA) on delete restrict on update restrict;

alter table PERBANDINGAN_PENDUDUK add constraint FK_RELATIONSHIP_10 foreign key (ID_KRITERIA)
      references KRITERIA (ID_KRITERIA) on delete restrict on update restrict;

alter table PERBANDINGAN_PENDUDUK add constraint FK_RELATIONSHIP_8 foreign key (PENDUDUK2)
      references DATA_KEPALA_KELUARGA (ID_PENDUDUK) on delete restrict on update restrict;

alter table PERBANDINGAN_PENDUDUK add constraint FK_RELATIONSHIP_9 foreign key (PENDUDUK1)
      references DATA_KEPALA_KELUARGA (ID_PENDUDUK) on delete restrict on update restrict;

alter table PV_KRITERIA add constraint FK_RELATIONSHIP_13 foreign key (ID_KRITERIA)
      references KRITERIA (ID_KRITERIA) on delete restrict on update restrict;

alter table PV_PENDUDUK add constraint FK_RELATIONSHIP_11 foreign key (ID_KRITERIA)
      references KRITERIA (ID_KRITERIA) on delete restrict on update restrict;

alter table PV_PENDUDUK add constraint FK_RELATIONSHIP_12 foreign key (ID_PENDUDUK)
      references DATA_KEPALA_KELUARGA (ID_PENDUDUK) on delete restrict on update restrict;

>>>>>>> parent of 9c9fda9... add db
