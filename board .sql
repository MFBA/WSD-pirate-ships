-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2023 at 03:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `board`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `cell` varchar(128) NOT NULL,
  `team` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`cell`, `team`) VALUES
('0', 'Green'),
('1', 'Red'),
('2', ''),
('3', ''),
('4', 'Red'),
('5', ''),
('6', ''),
('7', ''),
('8', ''),
('9', ''),
('10', ''),
('11', 'Green'),
('12', ''),
('13', 'Red'),
('14', 'Red'),
('15', ''),
('16', 'Red'),
('17', ''),
('18', ''),
('19', 'Red'),
('20', 'Green'),
('21', 'Green'),
('22', 'Green'),
('23', 'Red'),
('24', ''),
('25', 'Red'),
('26', 'Red'),
('27', ''),
('28', ''),
('29', ''),
('30', ''),
('31', 'Green'),
('32', 'Red'),
('33', ''),
('34', 'Red'),
('35', 'Red'),
('36', 'Red'),
('37', 'Red'),
('38', ''),
('39', ''),
('40', ''),
('41', 'Red'),
('42', 'Green'),
('43', 'Red'),
('44', ''),
('45', ''),
('46', 'Red'),
('47', ''),
('48', ''),
('49', ''),
('50', ''),
('51', 'Red'),
('52', 'Red'),
('53', 'Red'),
('54', 'Red'),
('55', 'Red'),
('56', 'Red'),
('57', 'Red'),
('58', ''),
('59', ''),
('60', 'Red'),
('61', 'Green'),
('62', 'Red'),
('63', ''),
('64', 'Green'),
('65', ''),
('66', 'Red'),
('67', ''),
('68', ''),
('69', ''),
('70', ''),
('71', ''),
('72', ''),
('73', 'Green'),
('74', ''),
('75', 'Red'),
('76', ''),
('77', ''),
('78', ''),
('79', ''),
('80', 'Red'),
('81', 'Red'),
('82', ''),
('83', ''),
('84', ''),
('85', 'Red'),
('86', ''),
('87', 'Red'),
('88', ''),
('89', ''),
('90', ''),
('91', ''),
('92', ''),
('93', ''),
('94', ''),
('95', ''),
('96', ''),
('97', ''),
('98', ''),
('99', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
