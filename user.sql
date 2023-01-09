-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2023 at 03:21 PM
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
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `team` varchar(128) NOT NULL,
  `shipcell` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `team`, `shipcell`) VALUES
('fahad', 'ff5ebd2c152ed505b7297cb95b2bbc48caea99897ae39e8a781886f822c148f6', 'Red', 87),
('fahad2', 'ff5ebd2c152ed505b7297cb95b2bbc48caea99897ae39e8a781886f822c148f6', 'Green', 22),
('umairrkhn', 'f4e5cb46c14e342ea1b248dc9cd137c5df0a185c9c82ef3a6eeb990c87939f51', 'Green', 66),
('fahad3', 'ff5ebd2c152ed505b7297cb95b2bbc48caea99897ae39e8a781886f822c148f6', 'Green', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
