-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2014 at 05:51 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sky`
--
CREATE DATABASE IF NOT EXISTS `sky` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sky`;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `mosqueId` int(11) NOT NULL,
  `actId` int(11) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mosqueId`,`actId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`mosqueId`, `actId`, `counter`) VALUES
(3, 1, 3),
(3, 2, 1),
(3, 3, 4),
(3, 4, 2),
(3, 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `SenderName` varchar(255) DEFAULT NULL,
  `SenderMail` varchar(255) NOT NULL,
  `ReceiverMail` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Body` longtext CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `SendDate` date NOT NULL,
  `SendTime` time NOT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentId`, `SenderName`, `SenderMail`, `ReceiverMail`, `Category`, `Subject`, `Body`, `Status`, `SendDate`, `SendTime`) VALUES
(1, 'اکبر اکبری', 'akbari@yahoo.com', 'ali@yahoo.com', 'پیام', 'سلام', 'سلام \r\n\r\nسوالی درباره وضعیت فرزند خود دارم\r\nلطفا در اسرع وقت پاسخ دهید\r\n\r\nبا تشکر\r\n', 0, '2013-12-20', '20:20:00'),
(2, 'علی علوی', 'ali@yahoo.com', 'akbari@yahoo.com', 'انتقاد', 'پاسخ', 'سلام\r\n\r\nپیام شما مشاهده گردید\r\nپاسخ شما ارسال شد\r\n\r\nبا تشکر', 0, '2013-12-27', '08:08:00'),
(3, 'احمد احمدی', 'ahmadi@yahoo.com', 'ali@yahoo.com', 'پیشنهاد', 'یک پیشنهاد', 'با عرض سلام\r\n\r\nپیشنهادی درباره جوایز بچه ها دارم\r\n\r\nبا تشکر', 0, '2013-04-01', '06:09:00'),
(4, 'مسعود مسعودی', 'masoudi@yahoo.com', 'ali@yahoo.com', 'پیام', 'وضعیت دانش آموز احسان اکبری', 'با سلام\r\n\r\nوضعیت دانش آموز احسان اکبری در مدرسه به شرح زیر است :\r\n....\r\n\r\nبا تشکر از زحمات شما', 0, '2013-12-23', '00:00:00'),
(5, 'احمد احمدی', 'ahmadi@yahoo.com', 'ali@yahoo.com', 'انتقاد', 'یک انتقاد سازنده', 'با سلام\r\nاین یک انتقاد سازنده است\r\n\r\nبا تشکر', 0, '2013-04-01', '06:10:09'),
(7, 'فرهاد جلالی', 'jalali@yahoo.com', 'ahmadi@yahoo.com', 'پیام', 'سلام', 'خسته نباشید', 0, '2014-01-06', '16:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `googlemap`
--

CREATE TABLE IF NOT EXISTS `googlemap` (
  `Id` int(11) NOT NULL,
  `lat` decimal(18,15) NOT NULL DEFAULT '35.443140000000000',
  `lng` decimal(18,15) NOT NULL DEFAULT '51.300844000000000',
  UNIQUE KEY `id` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `googlemap`
--

INSERT INTO `googlemap` (`Id`, `lat`, `lng`) VALUES
(3, '35.443140000000000', '54.300844000000000'),
(9, '35.443140000000000', '51.300844000000000'),
(10, '35.443140000000000', '51.300844000000000'),
(11, '35.443140000000000', '51.300844000000000');

-- --------------------------------------------------------

--
-- Table structure for table `moscolact`
--

CREATE TABLE IF NOT EXISTS `moscolact` (
  `mosqueId` int(11) NOT NULL,
  `actId` int(11) NOT NULL,
  `actda` varchar(20) CHARACTER SET utf8 NOT NULL,
  `actcount` int(11) NOT NULL,
  PRIMARY KEY (`mosqueId`,`actId`,`actda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moscolact`
--

INSERT INTO `moscolact` (`mosqueId`, `actId`, `actda`, `actcount`) VALUES
(3, 1, '۱۳۹۲/۱۰/۰۱', 1),
(3, 1, '۱۳۹۲/۱۰/۱۰', 2),
(3, 1, '۱۳۹۲/۱۰/۱۸', 2),
(3, 1, '۱۳۹۲/۱۰/۲۶', 1),
(3, 2, '۱۳۹۲/۱۰/۱۱', 1),
(3, 2, '۱۳۹۲/۱۰/۲۵', 2),
(3, 2, '۱۳۹۲/۱۰/۲۶', 1);

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
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mosqueculturalliablee`
--

INSERT INTO `mosqueculturalliablee` (`Id`, `name`, `family`, `mosqueName`, `email`, `password`, `tel`, `mobile`, `mosqueAddress`, `image`, `status`) VALUES
(3, 'احمد', 'احمدی', 'حقانی', 'ahmadi@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 987, NULL, 'چهار راه فرهنگ', 0x3d3f5554462d383f423f3f3d, 1),
(9, 'جعفر', 'مجیدی', 'شفا', 'majidi@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 956, 63542, 'ولیعصر', 0x3d3f5554462d383f423f3f3d, 1),
(10, 'حسین', 'حسینی', 'قائم آل محمد', 'hoseini@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 756, 2587, 'میدان شهداء', 0x3d3f5554462d383f423f3f3d, 1),
(11, 'علی', 'علوی', 'امام علی', 'ali@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 222, 222, 'بزرگراه امام علی', 0x3d3f5554462d383f423f3f3d, 0);

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
-- Table structure for table `participantcounter`
--

CREATE TABLE IF NOT EXISTS `participantcounter` (
  `Id` int(11) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  KEY `id` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE IF NOT EXISTS `point` (
  `actId` int(11) NOT NULL,
  `stCode` int(10) NOT NULL,
  `pcounter` int(11) NOT NULL,
  `da` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`actId`,`stCode`,`da`),
  KEY `point_ibfk_1` (`actId`),
  KEY `stCode` (`stCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`actId`, `stCode`, `pcounter`, `da`) VALUES
(5, 2147483647, 1, '۱۳۹۲/۱۰/۱۹'),
(7, 2147483647, 1, '۱۳۹۲/۱۰/۱۱');

-- --------------------------------------------------------

--
-- Table structure for table `refrencepoint`
--

CREATE TABLE IF NOT EXISTS `refrencepoint` (
  `actId` int(11) NOT NULL AUTO_INCREMENT,
  `actPoint` int(11) NOT NULL,
  `actTopic` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `collective` tinyint(1) NOT NULL,
  PRIMARY KEY (`actId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `refrencepoint`
--

INSERT INTO `refrencepoint` (`actId`, `actPoint`, `actTopic`, `userID`, `collective`) VALUES
(1, 10, 'نماز جماعت ظهر و عصر', 1, 1),
(2, 10, 'نماز جماعت مغرب و عشا', 1, 1),
(3, 5, 'شرکت در جلسه هفتگی قرآن', 1, 1),
(4, 10, 'تکبیر گفتن', 1, 0),
(5, 5, 'کمک در حفظ نظافت مسجد', 1, 0),
(6, 5, 'رعایت انضباط در مدرسه', 2, 0),
(7, 10, 'کمک به همکلاسی ها در دروس', 2, 0),
(8, 10, 'کمک در انجام کارهای منزل', 3, 0),
(9, 5, 'تمیز و مرتب بودن', 3, 0),
(10, 5, 'انجام به موقع تکالیف', 3, 0),
(11, 15, 'شرکت در اردو', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE IF NOT EXISTS `reward` (
  `rewardTopic` varchar(255) NOT NULL,
  `neededPoint` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  PRIMARY KEY (`rewardTopic`,`Id`),
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
-- Table structure for table `schcolact`
--

CREATE TABLE IF NOT EXISTS `schcolact` (
  `schoolId` int(11) NOT NULL,
  `actId` int(11) NOT NULL,
  `actda` varchar(20) CHARACTER SET utf8 NOT NULL,
  `actcount` int(11) NOT NULL,
  PRIMARY KEY (`schoolId`,`actId`,`actda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schcolact`
--

INSERT INTO `schcolact` (`schoolId`, `actId`, `actda`, `actcount`) VALUES
(12356, 11, '۱۳۹۲/۱۰/۱۰', 1);

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
  `birthdate` varchar(20) DEFAULT NULL,
  `picture` blob,
  `parentCode` int(10) NOT NULL,
  `Id` int(11) NOT NULL,
  `schoolId` int(11) DEFAULT NULL,
  `regda` varchar(20) NOT NULL,
  PRIMARY KEY (`stCode`),
  KEY `student_ibfk_1` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stName`, `stFamily`, `fatherName`, `stCode`, `school`, `address`, `birthdate`, `picture`, `parentCode`, `Id`, `schoolId`, `regda`) VALUES
('مجید', 'مجیدی', 'ماجد', 2147483647, 'شهید بهشتی', 'خیابان فرجام', '۱۳۸۳/۱۰/۱۸', NULL, 1234211233, 3, 12356, '۱۳۹۲/۱۰/۱۶');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `googlemap`
--
ALTER TABLE `googlemap`
  ADD CONSTRAINT `googlemap_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `mosqueculturalliablee` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participantcounter`
--
ALTER TABLE `participantcounter`
  ADD CONSTRAINT `participantcounter_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `mosqueculturalliablee` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `mosqueculturalliablee` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
