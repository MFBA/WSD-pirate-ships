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
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `username` varchar(128) NOT NULL,
  `team` varchar(128) NOT NULL,
  `message` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`username`, `team`, `message`) VALUES
('fahad2', 'Green', 'hi'),
('fahad', 'Red', 'hi'),
('fahad2', 'Green', 'hi'),
('fahad2', 'Green', 'hi'),
('fahad', 'Red', 'hello'),
('fahad', 'Red', 'jhdfsd'),
('fahad', 'Red', 'gjh'),
('fahad2', 'Green', 'hkg'),
('fahad', 'Red', 'jhkj'),
('fahad', 'Red', '3456'),
('fahad', 'Red', '456'),
('fahad', 'Red', '6'),
('fahad', 'Red', 'uyg'),
('fahad', 'Red', 'y'),
('fahad2', 'Green', 'hgj'),
('fahad', 'Red', 'hg'),
('fahad2', 'Green', 'jh'),
('fahad2', 'Green', '87'),
('fahad', 'Red', 'hgh'),
('fahad', 'Red', 'khjkj'),
('fahad2', 'Green', 'hvjg'),
('fahad', 'Red', 'hjjhjk'),
('fahad', 'Red', 'jkh'),
('fahad', 'Red', 'jhhjg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
