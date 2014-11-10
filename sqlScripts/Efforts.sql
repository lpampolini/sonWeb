-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2014 at 04:36 AM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `son_project_Dan`
--

-- --------------------------------------------------------

--
-- Table structure for table `Efforts`
--

CREATE TABLE IF NOT EXISTS `Efforts` (
  `ID` int(3) DEFAULT NULL,
  `EffortNumber` varchar(14) DEFAULT NULL,
  `Fisherman` varchar(11) DEFAULT NULL,
  `Boat` varchar(3) DEFAULT NULL,
  `EDate` varchar(16) DEFAULT NULL,
  `GRID` int(4) DEFAULT NULL,
  `LATLONG` varchar(9) DEFAULT NULL,
  `R_CODE` varchar(2) DEFAULT NULL,
  `SPCTRG` int(2) DEFAULT NULL,
  `GRTP` varchar(2) DEFAULT NULL,
  `GRLEN5` int(4) DEFAULT NULL,
  `GRHTM` int(2) DEFAULT NULL,
  `MESH5` decimal(2,1) DEFAULT NULL,
  `GRDEP5` int(3) DEFAULT NULL,
  `SIDEP5` int(3) DEFAULT NULL,
  `SETYPE` varchar(6) DEFAULT NULL,
  `Duration` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Efforts`
--

INSERT INTO `Efforts` (`ID`, `EffortNumber`, `Fisherman`, `Boat`, `EDate`, `GRID`, `LATLONG`, `R_CODE`, `SPCTRG`, `GRTP`, `GRLEN5`, `GRHTM`, `MESH5`, `GRDEP5`, `SIDEP5`, `SETYPE`, `Duration`) VALUES
(1, '2013-SAU-00001', 'Ritchie Ste', 'tug', '2013-02-25 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(2, '2013-SAU-00002', 'Ritchie Ste', 'tug', '2013-02-24 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(3, '2013-SAU-00003', 'Ritchie Ste', 'tug', '2013-02-22 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(4, '2013-SAU-00004', 'Ritchie Ste', 'tug', '2013-02-13 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(5, '2013-SAU-00005', 'Ritchie Ste', 'tug', '2013-02-06 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(6, '2013-SAU-00006', 'Ritchie Ste', 'tug', '2013-03-29 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(7, '2013-SAU-00007', 'Ritchie Ste', 'tug', '2013-03-26 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(8, '2013-SAU-00008', 'Ritchie Ste', 'tug', '2013-03-24 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(9, '2013-SAU-00009', 'Ritchie Ste', 'tug', '2013-03-09 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(10, '2013-SAU-00010', 'Ritchie Ste', 'tug', '2013-03-07 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(11, '2013-SAU-00011', 'Ritchie Ste', 'tug', '2013-03-04 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(12, '2013-SAU-00012', 'Ritchie Ste', 'tug', '2013-04-28 23:00', 2133, '4439/8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(13, '2013-SAU-00013', 'Ritchie Ste', 'tug', '2013-04-26 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(14, '2013-SAU-00014', 'Ritchie Ste', 'tug', '2013-06-19 23:00', 2231, '4434/8136', 'SB', 91, 'GL', 3900, 50, 4.5, 140, 140, 'bottom', 24),
(15, '2013-SAU-00015', 'Ritchie Ste', 'tug', '2013-06-12 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(16, '2013-SAU-00016', 'Ritchie Ste', 'tug', '2013-06-09 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(17, '2013-SAU-00017', 'Ritchie Ste', 'tug', '2013-06-07 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(18, '2013-SAU-00018', 'Ritchie Ste', 'tug', '2013-06-06 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(19, '2013-SAU-00019', 'Ritchie Ste', 'tug', '2013-06-04 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(20, '2013-SAU-00020', 'Ritchie Ste', 'tug', '2013-06-03 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(21, '2013-SAU-00021', 'Ritchie Ste', 'tug', '2013-05-31 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(22, '2013-SAU-00022', 'Ritchie Ste', 'tug', '2013-05-30 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(23, '2013-SAU-00023', 'Ritchie Ste', 'tug', '2013-05-27 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(24, '2013-SAU-00024', 'Ritchie Ste', 'tug', '2013-05-22 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(25, '2013-SAU-00025', 'Ritchie Ste', 'tug', '2013-05-20 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(26, '2013-SAU-00026', 'Ritchie Ste', 'tug', '2013-05-09 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(27, '2013-SAU-00027', 'Ritchie Ste', 'tug', '2013-05-07 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(28, '2013-SAU-00028', 'Ritchie Ste', 'tug', '2013-05-06 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(29, '2013-SAU-00029', 'Ritchie Ste', 'tug', '2013-05-05 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(30, '2013-SAU-00030', 'Ritchie Ste', 'tug', '2013-06-04 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(31, '2013-SAU-00031', 'Ritchie Ste', 'tug', '2013-05-02 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(32, '2013-SAU-00032', 'Ritchie Ste', 'tug', '2013-04-30 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 145, 145, 'bottom', 24),
(33, '2013-SAU-00033', 'Ritchie Ste', 'tug', '2013-04-09 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(34, '2013-SAU-00034', 'Ritchie Ste', 'tug', '2013-04-21 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(35, '2013-SAU-00035', 'Ritchie Ste', 'tug', '2013-04-23 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(36, '2013-SAU-00036', 'Ritchie Ste', 'tug', '2013-04-25 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 145, 145, 'bottom', 24),
(37, '2013-SAU-00037', 'Ritchie Ste', 'tug', '2013-03-04 23:00', 2233, '4434-8129', 'SB', 91, 'GL', 6000, 50, 4.5, 160, 160, 'bottom', 24),
(38, '2013-SAU-00038', 'Ritchie Cas', 'tug', '2013-02-23 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 4000, 50, 4.5, 160, 160, 'bottom', 24),
(39, '2013-SAU-00039', 'Ritchie Cas', 'tug', '2013-02-24 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 6000, 50, 4.5, 170, 170, 'bottom', 24),
(40, '2013-SAU-00040', 'Ritchie Cas', 'tug', '2013-03-03 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 6000, 50, 4.5, 170, 170, 'bottom', 24),
(41, '2013-SAU-00041', 'Ritchie Cas', 'tug', '2013-03-07 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 6000, 50, 4.5, 170, 170, 'bottom', 24),
(42, '2013-SAU-00042', 'Ritchie Cas', 'tug', '2013-03-10 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 6000, 50, 4.5, 170, 170, 'bottom', 24),
(43, '2013-SAU-00043', 'Ritchie Cas', 'tug', '2013-03-17 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 6000, 50, 4.5, 170, 170, 'bottom', 24),
(44, '2013-SAU-00044', 'Ritchie Cas', 'tug', '2013-03-21 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 6000, 50, 4.5, 170, 170, 'bottom', 24),
(45, '2013-SAU-00045', 'Ritchie Cas', 'tug', '2013-03-22 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 6000, 50, 4.5, 170, 170, 'bottom', 24),
(46, '2013-SAU-00046', 'Ritchie Cas', 'tug', '2013-03-26 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 6000, 50, 4.5, 170, 170, 'bottom', 24),
(47, '2013-SAU-00047', 'Ritchie Cas', 'tug', '2013-03-31 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 6000, 50, 4.5, 170, 170, 'bottom', 24),
(48, '2013-SAU-00048', 'Ritchie Cas', 'tug', '2013-05-06 23:00', 2134, '4438-8124', 'SB', 91, 'GL', 5000, 50, 4.5, 100, 100, 'bottom', 24),
(49, '2013-SAU-00049', 'Ritchie Cas', 'tug', '2013-05-09 23:00', 2134, '4438-8124', 'SB', 91, 'GL', 5000, 50, 4.5, 100, 100, 'bottom', 24),
(50, '2013-SAU-00050', 'Ritchie Cas', 'tug', '2013-05-21 23:00', 2134, '4438-8124', 'SB', 91, 'GL', 5000, 50, 4.5, 100, 100, 'bottom', 24),
(51, '2013-SAU-00051', 'Ritchie Cas', 'tug', '2013-06-18 23:00', 2233, '4432-8129', 'SB', 91, 'GL', 4500, 50, 4.5, 150, 150, 'bottom', 24),
(52, '2013-SAU-00052', 'Ritchie Cas', 'tug', '2013-06-13 23:00', 2233, '4434-8129', 'SB', 91, 'GL', 4500, 50, 4.5, 150, 150, 'bottom', 24),
(53, '2013-SAU-00053', 'Ritchie Cas', 'tug', '2013-06-11 23:00', 2233, '4432-8129', 'SB', 91, 'GL', 4500, 50, 4.5, 150, 150, 'bottom', 24),
(54, '2013-SAU-00054', 'Ritchie Cas', 'tug', '2013-06-09 23:00', 2233, '4432-8129', 'SB', 91, 'GL', 4500, 50, 4.5, 150, 150, 'bottom', 24),
(55, '2013-SAU-00055', 'Ritchie Cas', 'tug', '2013-03-23 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 6000, 50, 4.5, 170, 170, 'bottom', 24),
(56, '2013-SAU-00056', 'Ritchie Cas', 'tug', '2013-06-11 23:00', 2234, '4434-8123', 'SB', 91, 'GL', 200, 50, 4.5, 130, 130, 'bottom', 24),
(57, '2013-SAU-00057', 'Ritchie Ste', 'tug', '2013-06-18 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 3900, 50, 4.5, 140, 140, 'bottom', 24),
(58, '2013-SAU-00058', 'Ritchie Ste', 'tug', '2013-03-23 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(59, '2013-SAU-00059', 'Ritchie Ste', 'tug', '2013-03-25 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 4300, 50, 4.5, 180, 180, 'bottom', 24),
(60, '2013-SAU-00060', 'Ritchie Cas', 'tug', '2013-03-23 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 6000, 50, 4.5, 170, 170, 'bottom', 24),
(61, '2013-SAU-00061', 'Ritchie Cas', 'tug', '2013-03-27 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 6000, 50, 4.5, 170, 170, 'bottom', 24),
(62, '2013-SAU-00062', 'Ritchie Ste', 'tug', '2013-07-27 23:00', 2332, '4422-8139', 'SB', 91, 'GL', 8000, 50, 4.5, 400, 400, 'bottom', 24),
(63, '2013-SAU-00063', 'Robichaud A', 'tug', '2013-02-12 23:00', 2144, '4439-8034', 'NB', 91, 'GL', 6000, 50, 5.0, 300, 300, 'bottom', 24),
(64, '2013-SAU-00064', 'Nadjiwon, G', 'tug', '2013-01-29 23:00', 2146, '4437-8022', 'NB', 91, 'GL', 6000, 75, 5.0, 150, 150, 'bottom', 24),
(65, '2013-SAU-00065', 'Nadjiwon, G', 'tug', '2013-02-13 23:00', 2146, '4437-8022', 'NB', 91, 'GL', 6000, 75, 5.0, 150, 150, 'bottom', 24),
(66, '2013-SAU-00066', 'Nadjiwon, G', 'tug', '2013-02-20 23:00', 2146, '4437-8022', 'NB', 91, 'GL', 6000, 75, 5.0, 150, 150, 'bottom', 24),
(67, '2013-SAU-00067', 'Nadjiwon, G', 'tug', '2013-02-21 23:00', 2146, '4437-8022', 'NB', 91, 'GL', 6000, 75, 5.0, 150, 150, 'bottom', 24),
(68, '2013-SAU-00068', 'Nadjiwon, G', 'tug', '2013-03-06 23:00', 2146, '4437-8022', 'NB', 91, 'GL', 6000, 75, 5.0, 150, 150, 'bottom', 24),
(69, '2013-SAU-00069', 'Nadjiwon, G', 'tug', '2013-03-10 23:00', 2146, '4437-8022', 'NB', 91, 'GL', 6000, 75, 5.0, 150, 150, 'bottom', 24),
(70, '2013-SAU-00070', 'Nadjiwon, G', 'tug', '2013-03-12 23:00', 2146, '4437-8022', 'NB', 91, 'GL', 6000, 75, 5.0, 150, 150, 'bottom', 24),
(71, '2013-SAU-00071', 'Nadjiwon, G', 'tug', '2013-03-13 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 6000, 50, 5.0, 175, 175, 'bottom', 24),
(72, '2013-SAU-00072', 'Nadjiwon, G', 'tug', '2013-03-14 23:00', 2034, '4442-8124', 'FI', 91, 'GL', 4000, 50, 5.0, 150, 150, 'bottom', 24),
(73, '2013-SAU-00073', 'Nadjiwon, G', 'tug', '2013-03-16 23:00', 2034, '4442-8124', 'FI', 91, 'GL', 4000, 50, 5.0, 150, 150, 'bottom', 24),
(74, '2013-SAU-00074', 'Nadjiwon, G', 'tug', '2013-03-22 23:00', 2034, '4442-8124', 'FI', 91, 'GL', 4000, 50, 5.0, 150, 150, 'bottom', 24),
(75, '2013-SAU-00075', 'Nadjiwon, G', 'tug', '2013-03-23 23:00', 2034, '4442-8124', 'FI', 91, 'GL', 4000, 50, 5.0, 150, 150, 'bottom', 24),
(76, '2013-SAU-00076', 'Nadjiwon, G', 'tug', '2013-03-24 23:00', 2034, '4442-8124', 'FI', 91, 'GL', 4000, 50, 5.0, 150, 150, 'bottom', 24),
(77, '2013-SAU-00077', 'Nadjiwon, G', 'tug', '2013-03-25 23:00', 2034, '4442-8124', 'FI', 91, 'GL', 4000, 50, 5.0, 150, 150, 'bottom', 24),
(78, '2013-SAU-00078', 'Nadjiwon, G', 'tug', '2013-03-26 23:00', 2034, '4442-8124', 'FI', 91, 'GL', 4000, 50, 5.0, 15, 150, 'bottom', 24),
(79, '2013-SAU-00079', 'Nadjiwon, G', 'tug', '2013-03-27 23:00', 2133, '4439-8129', 'SB', 91, 'GL', 6000, 50, 5.0, 175, 175, 'bottom', 24),
(80, '2013-SAU-00080', 'Nadjiwon, G', 'tug', '2013-04-08 23:00', 2233, '4433-8129', 'SB', 91, 'GL', 4000, 50, 5.0, 140, 140, 'bottom', 24),
(81, '2013-SAU-00081', 'Nadjiwon, G', 'tug', '2013-04-07 23:00', 2233, '4433-8129', 'SB', 91, 'GL', 4000, 50, 5.0, 140, 140, 'bottom', 24),
(82, '2013-SAU-00082', 'Nadjiwon, G', 'tug', '2013-04-11 23:00', 2233, '4433-8129', 'SB', 91, 'GL', 4000, 50, 5.0, 140, 140, 'bottom', 24),
(83, '2013-SAU-00083', 'Nadjiwon, G', 'tug', '2013-04-15 23:00', 2233, '4433-8129', 'SB', 91, 'GL', 4000, 50, 5.0, 140, 140, 'bottom', 24),
(84, '2013-SAU-00084', 'Nadjiwon, G', 'tug', '2013-04-16 23:00', 2233, '4433-8129', 'SB', 91, 'GL', 4000, 50, 5.0, 140, 140, 'bottom', 24),
(85, '2013-SAU-00085', 'Nadjiwon, G', 'tug', '2013-04-17 23:00', 2233, '4433-8129', 'SB', 91, 'GL', 4000, 50, 5.0, 140, 140, 'bottom', 24),
(86, '2013-SAU-00086', 'Nadjiwon, G', 'tug', '2013-04-23 23:00', 2233, '4433-8129', 'SB', 91, 'GL', 4000, 50, 5.0, 140, 140, 'bottom', 24),
(87, '2013-SAU-00087', 'Nadjiwon, G', 'tug', '2013-04-24 23:00', 2233, '4433-8129', 'SB', 91, 'GL', 4000, 50, 5.0, 140, 140, 'bottom', 24),
(88, '2013-SAU-00088', 'Nadjiwon, G', 'tug', '2013-04-30 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(89, '2013-SAU-00089', 'Nadjiwon, G', 'tug', '2013-05-02 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(90, '2013-SAU-00090', 'Nadjiwon, G', 'tug', '2013-05-04 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(91, '2013-SAU-00091', 'Nadjiwon, G', 'tug', '2013-05-06 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(92, '2013-SAU-00092', 'Nadjiwon, G', 'tug', '2013-05-24 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(93, '2013-SAU-00093', 'Nadjiwon, G', 'tug', '2013-05-25 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(94, '2013-SAU-00094', 'Nadjiwon, G', 'tug', '2013-05-26 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(95, '2013-SAU-00095', 'Nadjiwon, G', 'tug', '2013-05-30 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(96, '2013-SAU-00096', 'Nadjiwon, G', 'tug', '2013-06-01 23:00', 2629, '4407-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(97, '2013-SAU-00097', 'Ritchie Cas', 'tug', '2013-03-24 23:00', 2232, '4431-8132', 'SB', 91, 'GL', 6000, 50, 4.5, 170, 170, 'bottom', 24),
(98, '2013-SAU-00098', 'Ritchie Cas', 'tug', '2013-07-30 23:00', 2133, '4438-8126', 'SB', 91, 'GL', 3500, 50, 4.5, 120, 120, 'bottom', 24),
(99, '2013-SAU-00099', 'Ritchie Cas', 'tug', '2013-07-01 23:00', 2133, '4438-8126', 'SB', 91, 'GL', 3500, 50, 4.5, 120, 120, 'bottom', 24),
(100, '2013-SAU-00100', 'Ritchie Cas', 'tug', '2013-08-06 23:00', 2133, '4438-8126', 'SB', 91, 'GL', 3500, 50, 4.5, 120, 120, 'bottom', 24),
(101, '2013-SAU-00101', 'Ritchie Cas', 'tug', '2013-08-22 23:00', 2234, '4433-8124', 'SB', 91, 'GL', 3500, 50, 4.5, 54, 54, 'bottom', 24),
(102, '2013-SAU-00102', 'Ritchie Cas', 'tug', '2013-08-25 23:00', 2133, '4438-8126', 'SB', 91, 'GL', 3500, 50, 4.5, 120, 120, 'bottom', 24),
(103, '2013-SAU-00103', 'Ritchie Cas', 'tug', '2013-08-27 23:00', 2133, '4438-8126', 'SB', 91, 'GL', 3500, 50, 4.5, 120, 120, 'bottom', 24),
(104, '2013-SAU-00104', 'Ritchie Cas', 'tug', '2013-08-29 23:00', 2133, '4438-8126', 'SB', 91, 'GL', 3500, 50, 4.5, 120, 120, 'bottom', 24),
(105, '2013-SAU-00105', 'Ritchie Ste', 'tug', '2013-06-26 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 140, 140, 'bottom', 24),
(106, '2013-SAU-00106', 'Ritchie Ste', 'tug', '2013-07-30 23:00', 2231, '4434-8136', 'SB', 91, 'GL', 4000, 50, 4.5, 140, 140, 'bottom', 24),
(107, '2013-SAU-00107', 'Ritchie Ste', 'tug', '2013-07-01 23:00', 2033, '4443-8126', 'FI', 91, 'GL', 8000, 50, 4.5, 120, 120, 'bottom', 24),
(108, '2013-SAU-00108', 'Ritchie Ste', 'tug', '2013-08-04 23:00', 2033, '4443-8126', 'SB', 91, 'GL', 8000, 50, 4.5, 120, 120, 'bottom', 24),
(109, '2013-SAU-00109', 'Ritchie Ste', 'tug', '2013-08-06 23:00', 2033, '4443-8126', 'SB', 91, 'GL', 8000, 50, 4.5, 120, 120, 'bottom', 24),
(110, '2013-SAU-00110', 'Ritchie Ste', 'tug', '2013-08-08 23:00', 2033, '4443-8126', 'FI', 91, 'GL', 8000, 50, 4.5, 120, 120, 'bottom', 24),
(111, '2013-SAU-00111', 'Ritchie Ste', 'tug', '2013-08-11 23:00', 2033, '4443-8126', 'FI', 91, 'GL', 8000, 50, 4.5, 120, 120, 'bottom', 24),
(112, '2013-SAU-00112', 'Ritchie Ste', 'tug', '2013-08-15 23:00', 2033, '4443-8126', 'FI', 91, 'GL', 8000, 50, 4.5, 120, 120, 'bottom', 24),
(113, '2013-SAU-00113', 'Ritchie Ste', 'tug', '2013-08-18 23:00', 2033, '4443-8126', 'FI', 91, 'GL', 8000, 50, 4.5, 120, 120, 'bottom', 24),
(114, '2013-SAU-00114', 'Ritchie Ste', 'tug', '2013-08-19 23:00', 2033, '4443-8126', 'FI', 91, 'GL', 8000, 50, 4.5, 120, 120, 'bottom', 24),
(115, '2013-SAU-00115', 'Ritchie Ste', 'tug', '2013-08-20 23:00', 2033, '4443-8126', 'FI', 91, 'GL', 8000, 50, 4.5, 120, 120, 'bottom', 24),
(116, '2013-SAU-00116', 'Ritchie Ste', 'tug', '2013-09-08 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(117, '2013-SAU-00117', 'Ritchie Ste', 'tug', '2013-09-09 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(118, '2013-SAU-00118', 'Ritchie Ste', 'tug', '2013-09-10 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(119, '2013-SAU-00119', 'Ritchie Ste', 'tug', '2013-09-12 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(120, '2013-SAU-00120', 'Ritchie Ste', 'tug', '2013-09-17 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(121, '2013-SAU-00121', 'Ritchie Ste', 'tug', '2013-09-18 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(122, '2013-SAU-00122', 'Ritchie Cas', 'tug', '2013-09-23 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(123, '2013-SAU-00123', 'Ritchie Ste', 'tug', '2013-09-25 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(124, '2013-SAU-00124', 'Akiwenzie, ', 'tug', '2013-09-04 23:00', 2043, '4441-8038', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(125, '2013-SAU-00125', 'Akiwenzie, ', 'tug', '2013-08-22 23:00', 2042, '4444-8043', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(126, '2013-SAU-00126', 'Akiwenzie, ', 'tug', '2013-08-23 23:00', 2042, '4444-8043', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(127, '2013-SAU-00127', 'Akiwenzie, ', 'tug', '2013-08-24 23:00', 2042, '4444-8043', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(128, '2013-SAU-00128', 'Akiwenzie, ', 'tug', '2013-08-26 23:00', 2042, '4444-8043', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(129, '2013-SAU-00129', 'Akiwenzie, ', 'tug', '2013-08-27 23:00', 2042, '4444-8043', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(130, '2013-SAU-00130', 'Akiwenzie, ', 'tug', '2013-08-28 23:00', 2042, '4444-8043', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(131, '2013-SAU-00131', 'Akiwenzie, ', 'tug', '2013-08-29 23:00', 2042, '4444-8043', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(132, '2013-SAU-00132', 'Akiwenzie, ', 'tug', '2013-08-31 23:00', 2043, '4441-8038', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(133, '2013-SAU-00133', 'Akiwenzie, ', 'tug', '2013-09-02 23:00', 2043, '4441-8038', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(134, '2013-SAU-00134', 'Akiwenzie, ', 'tug', '2013-09-03 23:00', 2043, '4441-8038', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(135, '2013-SAU-00135', 'Akiwenzie, ', 'tug', '2013-09-05 23:00', 2043, '4441-8038', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(136, '2013-SAU-00136', 'Akiwenzie, ', 'tug', '2013-09-06 23:00', 2043, '4441-8038', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(137, '2013-SAU-00137', 'Akiwenzie, ', 'tug', '2013-09-09 23:00', 2043, '4441-8038', 'NB', 91, 'GL', 4000, 50, 5.0, 100, 100, 'bottom', 24),
(138, '2013-SAU-00138', 'Nadjiwon, G', 'tug', '2013-05-29 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(139, '2013-SAU-00139', 'Nadjiwon, G', 'tug', '2013-05-23 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(140, '2013-SAU-00140', 'Nadjiwon, G', 'tug', '2013-05-14 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(141, '2013-SAU-00141', 'Nadjiwon, G', 'tug', '2013-06-09 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(142, '2013-SAU-00142', 'Nadjiwon, G', 'tug', '2013-06-11 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(143, '2013-SAU-00143', 'Nadjiwon, G', 'tug', '2013-06-13 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(144, '2013-SAU-00144', 'Nadjiwon, G', 'tug', '2013-06-14 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(145, '2013-SAU-00145', 'Nadjiwon, G', 'tug', '2013-06-16 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(146, '2013-SAU-00146', 'Nadjiwon, G', 'tug', '2013-06-18 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(147, '2013-SAU-00147', 'Nadjiwon, G', 'tug', '2013-06-19 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(148, '2013-SAU-00148', 'Nadjiwon, G', 'tug', '2013-06-19 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(149, '2013-SAU-00149', 'Nadjiwon, G', 'tug', '2013-06-23 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(150, '2013-SAU-00150', 'Nadjiwon, G', 'tug', '2013-06-25 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(151, '2013-SAU-00151', 'Nadjiwon, G', 'tug', '2013-06-26 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(152, '2013-SAU-00152', 'Nadjiwon, G', 'tug', '2013-06-27 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(153, '2013-SAU-00153', 'Nadjiwon, G', 'tug', '2013-06-27 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(154, '2013-SAU-00154', 'Nadjiwon, G', 'tug', '2013-06-30 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(155, '2013-SAU-00155', 'Nadjiwon, G', 'tug', '2013-07-01 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(156, '2013-SAU-00156', 'Nadjiwon, G', 'tug', '2013-07-02 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(157, '2013-SAU-00157', 'Nadjiwon, G', 'tug', '2013-07-04 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(158, '2013-SAU-00158', 'Nadjiwon, G', 'tug', '2013-07-07 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(159, '2013-SAU-00159', 'Nadjiwon, G', 'tug', '2013-07-09 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(160, '2013-SAU-00160', 'Nadjiwon, G', 'tug', '2013-07-10 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(161, '2013-SAU-00161', 'Nadjiwon, G', 'tug', '2013-07-11 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(162, '2013-SAU-00162', 'Nadjiwon, G', 'tug', '2013-07-12 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(163, '2013-SAU-00163', 'Nadjiwon, G', 'tug', '2013-07-13 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(164, '2013-SAU-00164', 'Nadjiwon, G', 'tug', '2013-07-14 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(165, '2013-SAU-00165', 'Nadjiwon, G', 'tug', '2013-07-16 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(166, '2013-SAU-00166', 'Nadjiwon, G', 'tug', '2013-07-18 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(167, '2013-SAU-00167', 'Nadjiwon, G', 'tug', '2013-07-21 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(168, '2013-SAU-00168', 'Nadjiwon, G', 'tug', '2013-07-30 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(169, '2013-SAU-00169', 'Nadjiwon, G', 'tug', '2013-08-01 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(170, '2013-SAU-00170', 'Nadjiwon, G', 'tug', '2013-08-04 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(171, '2013-SAU-00171', 'Nadjiwon, G', 'tug', '2013-08-06 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(172, '2013-SAU-00172', 'Nadjiwon, G', 'tug', '2013-08-08 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(173, '2013-SAU-00173', 'Nadjiwon, G', 'tug', '2013-08-11 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(174, '2013-SAU-00174', 'Nadjiwon, G', 'tug', '2013-08-13 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(175, '2013-SAU-00175', 'Nadjiwon, G', 'tug', '2013-08-14 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(176, '2013-SAU-00176', 'Nadjiwon, G', 'tug', '2013-08-17 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(177, '2013-SAU-00177', 'Nadjiwon, G', 'tug', '2013-08-18 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(178, '2013-SAU-00178', 'Nadjiwon, G', 'tug', '2013-08-20 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(179, '2013-SAU-00179', 'Nadjiwon, G', 'tug', '2013-08-22 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(180, '2013-SAU-00180', 'Nadjiwon, G', 'tug', '2013-08-23 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(181, '2013-SAU-00181', 'Nadjiwon, G', 'tug', '2013-08-24 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(182, '2013-SAU-00182', 'Nadjiwon, G', 'tug', '2013-08-25 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(183, '2013-SAU-00183', 'Nadjiwon, G', 'tug', '2013-08-29 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(184, '2013-SAU-00184', 'Nadjiwon, G', 'tug', '2013-08-30 23:00', 2629, '4411-8152', 'DP', 91, 'GL', 3000, 75, 5.0, 140, 140, 'bottom', 24),
(185, '2013-SAU-00185', 'Nadjiwon, G', 'tug', '2013-08-31 23:00', 2233, '4433-8128', 'SB', 91, 'GL', 6000, 50, 5.0, 110, 110, 'bottom', 24),
(186, '2013-SAU-00186', 'Nadjiwon, G', 'tug', '2013-09-02 23:00', 2233, '4433-8128', 'SB', 91, 'GL', 6000, 50, 5.0, 110, 110, 'bottom', 24),
(187, '2013-SAU-00187', 'Ritchie Ste', 'tug', '2013-09-25 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(188, '2013-SAU-00188', 'Ritchie Ste', 'tug', '2013-10-02 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(189, '2013-SAU-00189', 'Ritchie Ste', 'tug', '2013-10-04 23:00', 2134, '4439-8124', 'FI', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(190, '2013-SAU-00190', 'Ritchie Ste', 'tug', '2013-10-03 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(191, '2013-SAU-00191', 'Ritchie Ste', 'tug', '2013-10-30 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(192, '2013-SAU-00192', 'Ritchie Ste', 'tug', '2013-11-03 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(193, '2013-SAU-00193', 'Ritchie Ste', 'tug', '2013-11-19 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(194, '2013-SAU-00194', 'Ritchie Ste', 'tug', '2013-11-20 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(195, '2013-SAU-00195', 'Ritchie Ste', 'tug', '2013-11-21 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(196, '2013-SAU-00196', 'Ritchie Ste', 'tug', '2013-12-01 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(197, '2013-SAU-00197', 'Ritchie Ste', 'tug', '2013-12-03 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(198, '2013-SAU-00198', 'Ritchie Ste', 'tug', '2013-09-24 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(199, '2013-SAU-00199', 'Ritchie Ste', 'tug', '2013-12-23 23:00', 2134, '4439-8124', 'SB', 91, 'GL', 6000, 50, 4.5, 120, 120, 'bottom', 24),
(200, '2013-SAU-00200', 'Robichaud A', 'tug', '2013-12-02 23:00', 2146, '4435-8021', 'NB', 91, 'GL', 3000, 50, 5.0, 20, 20, 'bottom', 24),
(201, '2013-SAU-00201', 'Robichaud A', 'tug', '2013-12-03 23:00', 2146, '4435-8021', 'NB', 91, 'GL', 3000, 50, 5.0, 20, 20, 'bottom', 24),
(202, '2013-SAU-00202', 'Robichaud A', 'tug', '2013-12-04 23:00', 2146, '4435-8021', 'NB', 91, 'GL', 3000, 50, 5.0, 20, 20, 'bottom', 24),
(203, '2013-SAU-00203', 'Robichaud A', 'tug', '2013-12-17 23:00', 2146, '4435-8021', 'NB', 91, 'GL', 3000, 50, 5.0, 20, 20, 'bottom', 24),
(204, '2013-SAU-00204', 'Robichaud A', 'tug', '2013-12-19 23:00', 2146, '4435-8021', 'NB', 91, 'GL', 3000, 50, 5.0, 20, 20, 'bottom', 24),
(205, '2013-SAU-00205', 'Robichaud A', 'tug', '2013-12-22 23:00', 2146, '4435-8021', 'NB', 91, 'GL', 3000, 50, 5.0, 20, 20, 'bottom', 24),
(206, '2013-SAU-00206', 'Robichaud A', 'tug', '2013-12-23 23:00', 2146, '4435-8021', 'NB', 91, 'GL', 3000, 50, 5.0, 20, 20, 'bottom', 24),
(207, '2013-SAU-00207', 'Akiwenzie, ', 'tug', '2013-12-01 23:00', 2143, '4439-8036', 'NB', 91, 'GL', 3500, 75, 5.0, 103, 103, 'bottom', 24),
(208, '2013-SAU-00208', 'Akiwenzie, ', 'tug', '2013-12-02 23:00', 2143, '4439-8036', 'NB', 91, 'GL', 3500, 75, 5.0, 103, 103, 'bottom', 24),
(209, '2013-SAU-00209', 'Akiwenzie, ', 'tug', '2013-12-11 23:00', 2143, '4439-8036', 'NB', 91, 'GL', 3500, 75, 5.0, 103, 103, 'bottom', 24),
(210, '2013-SAU-00210', 'Akiwenzie, ', 'tug', '2013-12-17 23:00', 2143, '4439-8036', 'NB', 91, 'GL', 3500, 75, 5.0, 103, 103, 'bottom', 24),
(211, '2013-SAU-00211', 'Akiwenzie, ', 'tug', '2013-12-27 23:00', 2143, '4439-8036', 'NB', 91, 'GL', 3500, 75, 5.0, 103, 103, 'bottom', 24),
(212, '2013-SAU-00212', 'Akiwenzie, ', 'tug', '2013-12-28 23:00', 2143, '4439-8036', 'NB', 91, 'GL', 3500, 75, 5.0, 103, 103, 'bottom', 24);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;