-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2013 at 11:57 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

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
  `image` blob,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mosqueculturalliablee`
--

INSERT INTO `mosqueculturalliablee` (`Id`, `name`, `family`, `mosqueName`, `email`, `password`, `tel`, `mobile`, `mosqueAddress`, `image`) VALUES
(3, 'ahmad', 'ahmadi', 'Haghani', 'ahmadi@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 987, NULL, 't', 0x3d3f5554462d383f423f3f3d),
(9, 'a', 'b', 'a', 'a@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 956, NULL, 't', 0x3d3f5554462d383f423f3f3d),
(10, 'er', '', 't', 'test@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 0, '', 0x3d3f5554462d383f423f3f3d),
(11, '???', '????', '???? ???', 'ali@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 222, 222, '??????? ???? ???', 0x3d3f5554462d383f423f3f3d);

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

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentCode`, `parentName`, `parentFamily`, `homePhone`, `mobileNum`, `password`, `email`) VALUES
(1000100010, '????', '?????', 222, 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'akbari@yahoo.com'),
(2147483647, 'reza', 'rahmati', 987, 12, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'rahmati@yahoo.com');

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
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`actId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `refrencepoint`
--

INSERT INTO `refrencepoint` (`actId`, `actPoint`, `actTopic`, `userID`) VALUES
(1, 10, '???? ????? ??? ? ???', 1),
(2, 10, '???? ????? ???? ? ???', 1),
(3, 5, '???? ?? ???? ????? ????', 1),
(4, 10, '????? ????', 1),
(5, 5, '??? ?? ??? ????? ????', 1),
(6, 5, '????? ?????? ?? ?????', 2),
(7, 10, '??? ?? ??????? ?? ?? ????', 2),
(8, 10, '??? ?? ????? ?????? ????', 3),
(9, 5, '???? ? ???? ????', 3),
(10, 5, '????? ?? ???? ??????', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE IF NOT EXISTS `reward` (
  `rewardTopic` varchar(255) NOT NULL,
  `neededPoint` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  PRIMARY KEY (`rewardTopic`),
  KEY `Id` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`rewardTopic`, `neededPoint`, `Id`) VALUES
('????? ???????', 100, 11),
('?????????', 1000, 11),
('??? ????? ?????', 500, 11),
('???? ??????', 250, 11);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `schoolId` int(11) NOT NULL,
  `schoolName` varchar(255) NOT NULL,
  `schoolPhone` int(11) NOT NULL,
  `schoolAddress` text NOT NULL,
  `teacherName` varchar(255) NOT NULL,
  `teacherFamily` varchar(255) NOT NULL,
  `teacherPhone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`schoolId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolId`, `schoolName`, `schoolPhone`, `schoolAddress`, `teacherName`, `teacherFamily`, `teacherPhone`, `email`, `password`) VALUES
(777, '????', 123, '????????', '?????', '??????', 4544, 'masoudi@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(12356, 'tn', 1567, 'aaa', 'te', 'tf', 12569, 'jalali@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

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
  `address` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `picture` blob,
  `parentCode` int(10) NOT NULL,
  `Id` int(11) NOT NULL,
  `schoolId` int(11) DEFAULT NULL,
  PRIMARY KEY (`stCode`),
  KEY `student_ibfk_1` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stName`, `stFamily`, `fatherName`, `stCode`, `school`, `address`, `birthdate`, `picture`, `parentCode`, `Id`, `schoolId`) VALUES
('?????', '?????', '????', 7563892, '????', '??????', '0000-00-00', NULL, 1000100010, 11, 777),
('?????', '??????', '?????', 10020020, '????', '?????', '0000-00-00', NULL, 10010010, 3, 2),
('???', '????', '???????', 20003004, 'tn', '???????', '0000-00-00', NULL, 30030030, 3, 12356);

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
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `mosqueculturalliablee` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
