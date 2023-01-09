-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2023 at 02:19 PM
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
  `team` varchar(128) NOT NULL,
  `redships` int(128) NOT NULL,
  `greenships` int(128) NOT NULL,
  `yellowships` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`cell`, `team`, `redships`, `greenships`, `yellowships`) VALUES
('0', 'Green', 1, 1, 0),
('1', 'Green', 1, 1, 0),
('2', '', 0, 0, 0),
('3', '', 0, 0, 0),
('4', '', 0, 0, 0),
('5', '', 0, 0, 0),
('6', '', 0, 0, 0),
('7', '', 0, 0, 0),
('8', '', 0, 0, 0),
('9', '', 0, 0, 0),
('10', '', 0, 0, 0),
('11', 'Green', 1, 1, 0),
('12', '', 0, 0, 0),
('13', 'Red', 1, 0, 0),
('14', '', 0, 0, 0),
('15', '', 0, 0, 0),
('16', '', 0, 0, 0),
('17', '', 0, 0, 0),
('18', '', 0, 0, 0),
('19', '', 0, 0, 0),
('20', 'Green', 0, 1, 0),
('21', 'Green', 1, 1, 0),
('22', '', 0, 0, 0),
('23', 'Red', 1, 0, 0),
('24', '', 0, 0, 0),
('25', '', 0, 0, 0),
('26', '', 0, 0, 0),
('27', '', 0, 0, 0),
('28', '', 0, 0, 0),
('29', '', 0, 0, 0),
('30', '', 0, 0, 0),
('31', 'Green', 1, 1, 0),
('32', 'Green', 1, 1, 0),
('33', '', 0, 0, 0),
('34', 'Green', 0, 1, 0),
('35', '', 0, 0, 0),
('36', '', 0, 0, 0),
('37', '', 0, 0, 0),
('38', '', 0, 0, 0),
('39', '', 0, 0, 0),
('40', '', 0, 0, 0),
('41', 'Green', 0, 1, 0),
('42', 'Green', 0, 1, 0),
('43', '', 0, 0, 0),
('44', '', 0, 0, 0),
('45', '', 0, 0, 0),
('46', '', 0, 0, 0),
('47', '', 0, 0, 0),
('48', '', 0, 0, 0),
('49', '', 0, 0, 0),
('50', '', 0, 0, 0),
('51', '', 0, 0, 0),
('52', '', 0, 0, 0),
('53', '', 0, 0, 0),
('54', '', 0, 0, 0),
('55', '', 0, 0, 0),
('56', '', 0, 0, 0),
('57', '', 0, 0, 0),
('58', '', 0, 0, 0),
('59', '', 0, 0, 0),
('60', '', 0, 0, 0),
('61', '', 0, 0, 0),
('62', '', 0, 0, 0),
('63', '', 0, 0, 0),
('64', '', 0, 0, 0),
('65', '', 0, 0, 0),
('66', '', 0, 0, 0),
('67', '', 0, 0, 0),
('68', '', 0, 0, 0),
('69', '', 0, 0, 0),
('70', '', 0, 0, 0),
('71', '', 0, 0, 0),
('72', '', 0, 0, 0),
('73', '', 0, 0, 0),
('74', '', 0, 0, 0),
('75', '', 0, 0, 0),
('76', '', 0, 0, 0),
('77', '', 0, 0, 0),
('78', '', 0, 0, 0),
('79', '', 0, 0, 0),
('80', '', 0, 0, 0),
('81', '', 0, 0, 0),
('82', '', 0, 0, 0),
('83', '', 0, 0, 0),
('84', '', 0, 0, 0),
('85', '', 0, 0, 0),
('86', '', 0, 0, 0),
('87', '', 0, 0, 0),
('88', '', 0, 0, 0),
('89', '', 0, 0, 0),
('90', '', 0, 0, 0),
('91', '', 0, 0, 0),
('92', '', 0, 0, 0),
('93', '', 0, 0, 0),
('94', '', 0, 0, 0),
('95', '', 0, 0, 0),
('96', '', 0, 0, 0),
('97', '', 0, 0, 0),
('98', '', 0, 0, 0),
('99', '', 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;