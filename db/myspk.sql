-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2020 at 03:33 PM
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

--
-- Dumping data for table `data_kepala_keluarga`
--

INSERT INTO `data_kepala_keluarga` (`ID_PENDUDUK`, `NAMA`, `ALAMAT`, `JUMLAH_ANGGOTA_KELUARGA`, `STATUS_KPL_KELUARGA`, `PEKERJAAN`, `PENDIDIKAN_TERAKHIR`, `PENGHASILAN`, `SUMBER_PENERANGAN`, `BAHAN_BAKAR_MASAK`, `MEMBELI_PAKAIAN`, `SUMBER_AIR`, `JENIS_DINDING`, `JENIS_LANTAI`, `KEMAMPUAN_BEROBAT`) VALUES
(1, 'Sukiman', 'Wonorejo', 2, 'Hidup', 'Kuli Bangunan', 'SMA', 1000000, 'Listrik', 'kayu bakar', 'Ya', 'PDAM', 'Bata', 'Keramik', 'Ya');

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
  `BOBOT_KRITERIA` decimal(6,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`ID_KRITERIA`, `NAMA_KRITERIA`, `BOBOT_KRITERIA`) VALUES
(6, 'Jenis lantai', NULL),
(8, 'SUMBER AIR', NULL),
(10, 'PENGHASILAN', NULL),
(11, 'PEKERJAAN', NULL),
(12, 'SUMBER PENERANGAN', NULL);

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

--
-- Dumping data for table `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`KRITERIA1`, `KRITERIA2`, `NILAI_ANALISA_KRITERIA`) VALUES
(6, 8, 0);

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
  MODIFY `ID_PENDUDUK` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `ID_KRITERIA` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
