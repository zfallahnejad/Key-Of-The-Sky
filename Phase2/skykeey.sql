-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2013 at 12:39 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

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
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`commentId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mosqueculturalliablee`
--

CREATE TABLE IF NOT EXISTS `mosqueculturalliablee` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `mosqueName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `mosqueAddress` text NOT NULL,
  `image` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mosqueculturalliablee`
--

INSERT INTO `mosqueculturalliablee` (`Id`, `name`, `family`, `mosqueName`, `email`, `password`, `tel`, `mobile`, `mosqueAddress`, `image`) VALUES
(1, 'ahmad', 'ahmadi', 'Haghani', 'ahmad@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 987, NULL, 'tehran', '=?UTF-8?B??=');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `parentCode` int(11) NOT NULL,
  `parentName` varchar(255) NOT NULL,
  `parentFamily` varchar(255) NOT NULL,
  `homePhone` int(11) NOT NULL,
  `mobileNum` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`parentCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE IF NOT EXISTS `point` (
  `actId` int(11) NOT NULL,
  `stCode` int(10) NOT NULL,
  `year` year(4) NOT NULL,
  `month` int(2) NOT NULL,
  `pcounter` int(11) NOT NULL,
  KEY `point_ibfk_1` (`actId`),
  KEY `stCode` (`stCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `refrencepoint`
--

CREATE TABLE IF NOT EXISTS `refrencepoint` (
  `actId` int(11) NOT NULL AUTO_INCREMENT,
  `actPoint` int(11) NOT NULL,
  `actTopic` varchar(255) NOT NULL,
  PRIMARY KEY (`actId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE IF NOT EXISTS `reward` (
  `rewardId` int(11) NOT NULL AUTO_INCREMENT,
  `rewardTopic` varchar(255) NOT NULL,
  `neededPoint` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  PRIMARY KEY (`rewardId`),
  KEY `Id` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `schoolId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolName` varchar(255) NOT NULL,
  `schoolPhone` int(11) NOT NULL,
  `schoolAddress` text NOT NULL,
  `teacherName` varchar(255) NOT NULL,
  `teacherFamily` varchar(255) NOT NULL,
  `teacherPhone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`schoolId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stName` varchar(255) NOT NULL,
  `stFamily` varchar(255) NOT NULL,
  `fatherName` varchar(255) NOT NULL,
  `stCode` int(11) NOT NULL,
  `school` varchar(255) NOT NULL,
  `mosque` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `birthdate` year(4) NOT NULL,
  `picture` text,
  `parentCode` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `schoolId` int(11) DEFAULT NULL,
  PRIMARY KEY (`stCode`),
  KEY `student_ibfk_1` (`parentCode`),
  KEY `Id` (`Id`),
  KEY `schoolId` (`schoolId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `point`
--
ALTER TABLE `point`
  ADD CONSTRAINT `point_ibfk_1` FOREIGN KEY (`actId`) REFERENCES `refrencepoint` (`actId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `point_ibfk_2` FOREIGN KEY (`stCode`) REFERENCES `student` (`stCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reward`
--
ALTER TABLE `reward`
  ADD CONSTRAINT `reward_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `mosqueculturalliablee` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`parentCode`) REFERENCES `parent` (`parentCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`Id`) REFERENCES `mosqueculturalliablee` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`schoolId`) REFERENCES `school` (`schoolId`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
