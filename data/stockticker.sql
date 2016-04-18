-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:4710
-- Generation Time: Apr 17, 2016 at 03:31 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockticker`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE IF NOT EXISTS `certificates` (
  `player` varchar(20) NOT NULL,
  `stock` varchar(10) NOT NULL,
  `quantity` int(3) NOT NULL,
  `certificate` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `role`) VALUES
('Joe', 'Joe', 'banana', 'player'),
('GODMODE', 'Omnipotent', 'godlike', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`certificate`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
