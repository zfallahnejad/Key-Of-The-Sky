-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2013 at 09:12 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skykeey`
--
CREATE DATABASE IF NOT EXISTS `skykeey` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `skykeey`;

-- --------------------------------------------------------

--
-- Table structure for table `mosqueculturalliablee`
--

CREATE TABLE IF NOT EXISTS `mosqueculturalliablee` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `family` varchar(30) NOT NULL,
  `mosqueName` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `pasword` tinytext NOT NULL,
  `confirmPassword` tinytext NOT NULL,
  `tel` int(11) NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `mosqueAddress` text NOT NULL,
  `image` blob,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mosqueculturalliablee`
--

INSERT INTO `mosqueculturalliablee` (`Id`, `name`, `family`, `mosqueName`, `email`, `pasword`, `confirmPassword`, `tel`, `mobile`, `mosqueAddress`, `image`) VALUES
(5, 'atena', 'sami', 'Alzahra', 'atena@masjed.com', '=?UTF-8?B?bWluYQ==?=', '=?UTF-8?B?bWluYQ==?=', 22098012, NULL, 'Tehran', 0x3d3f5554462d383f423f3f3d),
(6, 'Aram', 'Jafari', 'Alrasol', 'aram@yah.com', '=?UTF-8?B?cG8=?=', '=?UTF-8?B?cG8=?=', 9797, NULL, 'Tehran', 0x3d3f5554462d383f423f3f3d);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
