-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 05:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`cell`, `team`, `redships`, `greenships`, `yellowships`) VALUES
('0', 'Red', 1, 1, 0),
('1', 'Red', 1, 1, 0),
('2', 'Red', 0, 0, 0),
('3', 'Red', 0, 0, 0),
('4', 'Red', 0, 0, 0),
('5', 'Red', 0, 0, 0),
('6', 'Red', 0, 0, 0),
('7', 'Red', 0, 0, 0),
('8', 'Red', 0, 0, 0),
('9', 'Red', 0, 0, 0),
('10', 'Red', 1, 1, 0),
('11', 'Red', 1, 1, 0),
('12', 'Red', 0, 1, 0),
('13', 'Green', 0, 1, 0),
('14', 'Red', 0, 0, 0),
('15', 'Red', 0, 0, 0),
('16', 'Red', 0, 0, 0),
('17', 'Red', 0, 0, 0),
('18', 'Red', 0, 0, 0),
('19', 'Red', 0, 0, 0),
('20', 'Green', 1, 1, 0),
('21', 'Red', 1, 1, 0),
('22', 'Red', 0, 1, 0),
('23', 'Green', 0, 1, 0),
('24', 'Red', 0, 0, 0),
('25', 'Red', 0, 0, 0),
('26', 'Red', 0, 0, 0),
('27', 'Red', 0, 0, 0),
('28', 'Red', 0, 0, 0),
('29', 'Red', 0, 0, 0),
('30', 'Green', 1, 1, 0),
('31', 'Green', 1, 1, 0),
('32', 'Red', 0, 1, 0),
('33', 'Green', 1, 1, 0),
('34', 'Red', 0, 0, 0),
('35', 'Red', 0, 0, 0),
('36', 'Red', 0, 0, 0),
('37', 'Red', 0, 0, 0),
('38', 'Red', 0, 0, 0),
('39', 'Red', 0, 0, 0),
('40', 'Red', 1, 0, 0),
('41', 'Green', 1, 1, 0),
('42', 'Green', 0, 1, 0),
('43', 'Red', 0, 1, 0),
('44', 'Green', 0, 1, 0),
('45', 'Green', 0, 0, 0),
('46', 'Green', 0, 0, 0),
('47', 'Green', 0, 0, 0),
('48', 'Red', 0, 0, 0),
('49', 'Red', 0, 0, 0),
('50', 'Red', 1, 0, 0),
('51', '', 0, 0, 0),
('52', 'Green', 0, 1, 0),
('53', 'Red', 0, 1, 0),
('54', 'Green', 0, 1, 0),
('55', 'Red', 0, 0, 0),
('56', 'Green', 0, 0, 0),
('57', 'Red', 0, 0, 0),
('58', 'Red', 0, 0, 0),
('59', 'Red', 0, 0, 0),
('60', 'Red', 1, 0, 0),
('61', 'Red', 1, 0, 0),
('62', '', 0, 0, 0),
('63', 'Red', 0, 0, 0),
('64', 'Red', 0, 0, 0),
('65', 'Red', 0, 0, 0),
('66', 'Red', 0, 0, 0),
('67', 'Green', 0, 0, 0),
('68', 'Red', 0, 0, 0),
('69', 'Red', 0, 0, 0),
('70', 'Red', 1, 0, 0),
('71', 'Red', 1, 0, 0),
('72', 'Red', 0, 0, 0),
('73', 'Red', 0, 0, 0),
('74', 'Red', 0, 0, 0),
('75', 'Red', 0, 0, 0),
('76', 'Green', 0, 0, 0),
('77', 'Green', 0, 0, 0),
('78', 'Green', 0, 0, 0),
('79', 'Red', 0, 0, 0),
('80', '', 0, 0, 0),
('81', '', 0, 0, 0),
('82', 'Red', 0, 0, 0),
('83', '', 0, 0, 0),
('84', 'Green', 0, 0, 0),
('85', 'Green', 0, 0, 0),
('86', 'Green', 0, 0, 0),
('87', 'Green', 0, 0, 0),
('88', 'Green', 0, 0, 0),
('89', 'Red', 0, 0, 0),
('90', '', 0, 0, 0),
('91', '', 0, 0, 0),
('92', '', 0, 0, 0),
('93', '', 0, 0, 0),
('94', 'Green', 0, 0, 0),
('95', 'Green', 0, 0, 0),
('96', 'Green', 0, 0, 0),
('97', 'Green', 0, 0, 0),
('98', 'Green', 0, 0, 0),
('99', 'Green', 0, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
