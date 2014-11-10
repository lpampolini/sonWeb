-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2014 at 12:52 AM
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
-- Table structure for table `Species`
--

CREATE TABLE IF NOT EXISTS `Species` (
  `ID` int(4) DEFAULT NULL,
  `Code` varchar(4) DEFAULT NULL,
  `SPCLABN` varchar(7) DEFAULT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `CONV2` float DEFAULT NULL,
  `CONV3` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Species`
--

INSERT INTO `Species` (`ID`, `Code`, `SPCLABN`, `Name`, `CONV2`, `CONV3`) VALUES
(2, '10', 'LAM', 'lampreys', 0, 0),
(3, '14', 'SEL', 'sea lamprey', 1.18, 2),
(4, '30', '', 'sturgeons', 0, 0),
(5, '31', 'LST', 'lake sturgeon', 1.54, 2),
(6, '32', 'CAV', 'caviar', 1, 1),
(7, '33', '', '', 0, 0),
(8, '41', 'LNG', 'longnose gar', 1.18, 2),
(9, '50', '', 'bowfins', 0, 0),
(10, '51', 'BWF', 'bowfin', 1.18, 2),
(11, '61', 'ALW', 'alewife', 1.18, 2),
(12, '63', 'GZS', 'gizzard shad', 1.18, 2),
(13, '64', '', '', 0, 0),
(14, '70', '', 'salmon & trout subfamily', 0, 0),
(15, '71', 'PKS', 'pink salmon', 1.18, 2),
(16, '73', 'COS', 'coho salmon', 1.18, 2),
(17, '75', 'CHS', 'chinook salmon', 1.18, 2),
(18, '76', 'RBT', 'rainbow trout', 1.18, 2),
(19, '77', 'ATS', 'Atlantic salmon', 1.18, 2),
(20, '78', 'BRT', 'brown trout', 1.18, 2),
(21, '80', 'BRC', 'brook trout', 1.18, 2),
(22, '81', 'LKC', 'lake trout', 1.18, 2),
(23, '84', '', 'Oncorhynchus sp.', 0, 0),
(24, '90', '', '', 0, 0),
(25, '91', 'WHF', 'lake whitefish', 1.1, 2),
(26, '93', 'LKH', 'lake herring', 1.18, 2),
(27, '94', 'BLT', 'bloater', 1.15, 2),
(28, '98', '', 'Nipigon cisco', 0, 0),
(29, '102', 'RWF', 'round whitefish', 1.18, 2),
(30, '103', '', 'chub', 0, 0),
(31, '121', 'RBS', 'rainbow smelt', 1.18, 2),
(32, '131', 'NPK', 'northern pike', 1.25, 2),
(33, '132', 'MSK', 'muskellunge', 1.25, 2),
(34, '134', '', 'esox sp.', 0, 0),
(35, '150', '', 'mooneyes', 0, 0),
(36, '160', '', 'suckers', 0, 0),
(37, '162', 'LNS', 'longnose sucker', 1.18, 2),
(38, '163', 'WHS', 'white sucker', 1.18, 2),
(39, '166', '', 'bigmouth buffalo', 0, 0),
(40, '171', '', 'shorthead redhorse', 0, 0),
(41, '177', '', 'redfin suckers', 0, 0),
(42, '186', 'CRP', 'common carp', 1.18, 2),
(43, '231', '', 'carps and minnows', 0, 0),
(44, '233', 'BBH', 'brown bullhead', 1.25, 2),
(45, '234', 'CHC', 'channel catfish', 1.25, 2),
(46, '238', '', 'Hybopsis sp.', 0, 0),
(47, '243', '', 'Ameiurus sp.', 0, 0),
(48, '251', 'AME', 'American eel', 1.18, 2),
(49, '271', 'BBT', 'burbot', 1.18, 2),
(50, '291', 'TRP', 'trout-perch', 1.18, 2),
(51, '300', '', 'temperate basses', 0, 0),
(52, '301', '', 'white perch', 0, 0),
(53, '302', '', 'white bass', 0, 0),
(54, '311', 'RCB', 'rock bass', 1.18, 2),
(55, '313', '', 'pumpkinseed', 0, 0),
(56, '316', 'SMB', 'smallmouth bass', 1.18, 2),
(57, '317', 'LMB', 'largemouth bass', 1.18, 2),
(58, '320', '', 'Lepomis sp.', 0, 0),
(59, '321', '', 'Micropterus sp.', 0, 0),
(60, '322', '', 'Pomoxis sp.', 0, 0),
(61, '331', 'YLP', 'yellow perch', 1.25, 2),
(62, '332', '', '', 0, 0),
(63, '333', '', 'blue pike', 0, 0),
(64, '334', 'WAL', 'walleye', 1.25, 2),
(65, '350', 'RUF', 'ruffe', 1.18, 2),
(66, '366', '', 'round goby', 0, 0),
(67, '371', 'DRM', 'freshwater drum', 1.18, 2),
(68, '381', 'MSC', 'mottled sculpin', 1.18, 2),
(69, '382', 'SSC', 'slimy sculpin', 1.18, 2),
(70, '383', 'PSC', 'spoonhead sculpin', 1.18, 2),
(71, '384', 'DSC', 'deepwater sculpin', 1.18, 2),
(72, '750', '', 'PERCH hybrids', 0, 0),
(73, '810', '', '', 0, 0),
(74, '910', '', '', 0, 0),
(75, '998', 'ROE', 'roe', 1, 1),
(76, '999', '???', 'any species', 1.18, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
