-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2013 at 11:26 PM
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
  `image` blob,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mosqueculturalliablee`
--

INSERT INTO `mosqueculturalliablee` (`Id`, `name`, `family`, `mosqueName`, `email`, `password`, `tel`, `mobile`, `mosqueAddress`, `image`) VALUES
(3, 'احمد', 'احمدی', 'حقانی', 'ahmadi@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 987, NULL, 'چهار راه فرهنگ', 0x3d3f5554462d383f423f3f3d),
(9, 'جعفر', 'مجیدی', 'شفا', 'majidi@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 956, 63542, 'ولیعصر', 0x3d3f5554462d383f423f3f3d),
(10, 'حسین', 'حسینی', 'قائم آل محمد', 'hoseini@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 756, 2587, 'میدان شهداء', 0x3d3f5554462d383f423f3f3d),
(11, 'علی', 'علوی', 'امام علی', 'ali@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 222, 222, 'بزرگراه امام علی', 0x3d3f5554462d383f423f3f3d);

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
(1000100010, 'اکبر', 'اکبری', 222, 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'akbari@yahoo.com'),
(2147483647, 'رضا', 'رحمتی', 987, 12, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'rahmati@yahoo.com');

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

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`actId`, `stCode`, `year`, `month`, `pcounter`) VALUES
(1, 1002002000, 2013, 12, 2),
(2, 1002002000, 2013, 12, 2),
(3, 1002002000, 2013, 12, 1),
(2, 1236547896, 2013, 12, 2),
(3, 1236547896, 2013, 12, 2),
(4, 1236547896, 2013, 12, 2),
(5, 1236547896, 2013, 12, 2),
(4, 1002002000, 2013, 12, 1),
(5, 1002002000, 2013, 12, 1),
(1, 1236547896, 2013, 12, 1),
(1, 2147483647, 2013, 12, 1),
(2, 2147483647, 2013, 12, 2),
(3, 2147483647, 2013, 12, 1),
(5, 2147483647, 2013, 12, 1);

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
(1, 10, 'نماز جماعت ظهر و عصر', 1),
(2, 10, 'نماز جماعت مغرب و عشا', 1),
(3, 5, 'شرکت در جلسه هفتگی قرآن', 1),
(4, 10, 'تکبیر گفتن', 1),
(5, 5, 'کمک در حفظ نظافت مسجد', 1),
(6, 5, 'رعایت انضباط در مدرسه', 2),
(7, 10, 'کمک به همکلاسی ها در دروس', 2),
(8, 10, 'کمک در انجام کارهای منزل', 3),
(9, 5, 'تمیز و مرتب بودن', 3),
(10, 5, 'انجام به موقع تکالیف', 3);

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
('تی شرت', 400, 3),
('خودنویس', 300, 3),
('فلش', 2000, 3),
('لوازم التحریر', 100, 11),
('ماشین حساب', 1000, 3),
('میکروسکوپ', 1000, 11),
('نرم افزار قرآنی', 500, 11),
('کتاب داستان', 250, 11);

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
(777, 'پویا', 123, 'پاسداران', 'مسعود', 'مسعودی', 4544, 'masoudi@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(12356, 'شهید بهشتی', 1567, 'شهید مدنی', 'فرهاد', 'جلالی', 12569, 'jalali@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

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
('مرتضی', 'مرتضوی', 'مصطفی', 1002002000, 'رضوی', 'تهران', '0000-00-00', NULL, 1058963010, 3, 2),
('اسد', 'اسدی', 'اسدالله', 1236547896, 'tn', 'اسدآباد', '0000-00-00', NULL, 1012500010, 3, 12356),
('احسان', 'اکبری', 'اکبر', 2147483647, 'پویا', 'قیطریه', '0000-00-00', NULL, 1000100010, 11, 777);

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
