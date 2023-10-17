-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2021 at 09:26 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin1', 'admin1', '27-07-2021 08:26:08 PM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(3, 'Demo test', 7, 6, 600, '2019-06-29', '9:15 AM', '2019-06-23 18:31:28', 1, 0, '0000-00-00 00:00:00'),
(4, 'Ayurveda', 5, 5, 8050, '2019-11-08', '1:00 PM', '2019-11-05 10:28:54', 1, 1, '0000-00-00 00:00:00'),
(5, 'Dermatologist', 9, 7, 500, '2019-11-30', '5:30 PM', '2019-11-10 18:41:34', 1, 0, '2019-11-10 18:48:30'),
(6, 'Dermatologist', 9, 9, 500, '2021-07-27', '1:00 AM', '2021-07-21 19:56:14', 0, 1, '2021-07-22 09:20:03'),
(7, 'Dermatologist', 11, 11, 1000, '2021-07-26', '3:00 PM', '2021-07-22 09:26:07', 0, 1, '2021-07-28 10:53:13'),
(8, 'Dermatologist', 11, 9, 1000, '2021-07-22', '3:15 PM', '2021-07-22 09:27:28', 1, 1, NULL),
(9, 'Dermatologist', 11, 10, 1000, '2021-07-24', '6:00 PM', '2021-07-23 12:21:41', 0, 1, '2021-07-23 13:55:28'),
(10, 'Homeopath', 4, 10, 700, '2021-07-20', '7:30 PM', '2021-07-23 13:56:07', 0, 1, '2021-07-23 13:57:02'),
(11, 'General Physician', 3, 10, 1200, '2021-07-25', '3:30 AM', '2021-07-23 13:56:32', 0, 1, '2021-07-23 13:57:03'),
(12, 'General Physician', 3, 10, 1200, '2021-07-25', '3:30 AM', '2021-07-23 13:56:56', 0, 1, '2021-07-23 13:57:06'),
(13, 'Dermatologist', 11, 11, 1000, '2021-08-01', '4:00 PM', '2021-07-28 10:32:40', 0, 1, '2021-07-28 10:53:18'),
(14, 'Dermatologist', 11, 11, 1000, '2021-07-31', '4:30 PM', '2021-07-28 10:55:22', 1, 1, NULL),
(15, 'Dermatologist', 11, 10, 1000, '2021-08-24', '8:15 AM', '2021-08-22 14:37:17', 0, 1, '2021-08-29 10:00:14'),
(16, 'Dermatologist', 11, 10, 1000, '2021-08-31', '1:30 AM', '2021-08-26 10:57:58', 1, 1, NULL),
(17, 'General Physician', 3, 10, 1200, '2021-08-30', '3:30 PM', '2021-08-29 09:58:53', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'Dentist', 'Anuj', 'New Delhi', '500', 8285703354, 'anuj.lpu1@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2016-12-29 06:25:37', '2019-06-30 12:11:05'),
(2, 'Homeopath', 'Sarita Pandey', 'Varanasi', '600', 2147483647, 'sarita@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2016-12-29 06:51:51', '0000-00-00 00:00:00'),
(3, 'General Physician', 'Nitesh Kumar', 'Ghaziabad', '1200', 8523699999, 'nitesh@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:43:35', '0000-00-00 00:00:00'),
(4, 'Homeopath', 'Vijay Verma', 'New Delhi', '700', 25668888, 'vijay@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:45:09', '0000-00-00 00:00:00'),
(5, 'Ayurveda', 'Sanjeev', 'Gurugram', '8050', 442166644646, 'sanjeev@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:47:07', '0000-00-00 00:00:00'),
(6, 'General Physician', 'Amrita', 'New Delhi India', '2500', 45497964, 'amrita@test.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:52:50', '0000-00-00 00:00:00'),
(7, 'Demo test', 'abc ', 'New Delhi India', '200', 852888888, 'test@demo.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 08:08:58', '2019-06-23 18:17:25'),
(8, 'Ayurveda', 'Test Doctor', 'Xyz Abc New Delhi', '600', 1234567890, 'test@test.com', '202cb962ac59075b964b07152d234b70', '2019-06-23 17:57:43', '2019-06-23 18:06:06'),
(9, 'Dermatologist', 'Anuj kumar', 'New Delhi India 110001', '500', 1234567890, 'anujk@test.com', 'f925916e2754e5e03f75dd58a5733251', '2019-11-10 18:37:47', '2019-11-10 18:38:10'),
(11, 'Dermatologist', 'devan', 'abc', '1000', 456789210, 'devan@abc.com', 'e19d5cd5af0378da05f63f891c7467af', '2021-07-22 09:24:44', '2021-08-15 15:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

DROP TABLE IF EXISTS `doctorslog`;
CREATE TABLE IF NOT EXISTS `doctorslog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(20, NULL, 'devan', 0x3a3a3100000000000000000000000000, '2021-07-22 09:23:02', NULL, 0),
(21, NULL, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-22 09:23:36', NULL, 0),
(22, 11, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-22 09:24:55', '22-07-2021 02:56:28 PM', 1),
(23, 11, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-22 09:26:37', NULL, 1),
(24, 11, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-22 09:29:08', NULL, 1),
(25, NULL, 'navinross1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-22 09:31:34', NULL, 0),
(26, NULL, 'navinross1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-22 09:31:41', NULL, 0),
(27, 11, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-22 09:31:57', NULL, 1),
(28, 11, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-22 19:20:56', '23-07-2021 12:55:17 AM', 1),
(29, 11, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-22 19:29:40', NULL, 1),
(30, NULL, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-23 12:17:04', NULL, 0),
(31, NULL, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-23 12:17:11', NULL, 0),
(32, NULL, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-23 12:17:20', NULL, 0),
(33, 11, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-23 12:18:43', NULL, 1),
(34, 11, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-23 12:22:51', '23-07-2021 07:24:53 PM', 1),
(35, 11, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-23 13:57:26', '23-07-2021 07:28:21 PM', 1),
(36, 11, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-23 13:59:09', '23-07-2021 07:44:50 PM', 1),
(37, NULL, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-25 11:59:12', NULL, 0),
(38, 11, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-25 11:59:24', '25-07-2021 05:29:54 PM', 1),
(39, NULL, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-28 10:39:56', NULL, 0),
(40, NULL, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-28 10:40:03', NULL, 0),
(41, 11, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-28 10:40:44', '28-07-2021 04:22:34 PM', 1),
(42, 11, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-28 10:56:07', '28-07-2021 05:22:36 PM', 1),
(43, NULL, 'devan@abc.com', 0x3132372e302e302e3100000000000000, '2021-08-15 15:33:43', NULL, 0),
(44, 11, 'devan@abc.com', 0x3132372e302e302e3100000000000000, '2021-08-15 15:35:22', '15-08-2021 09:15:23 PM', 1),
(45, 11, 'devan@abc.com', 0x3132372e302e302e3100000000000000, '2021-08-16 16:13:45', '16-08-2021 09:48:22 PM', 1),
(46, 11, 'devan@abc.com', 0x3132372e302e302e3100000000000000, '2021-08-26 20:35:27', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

DROP TABLE IF EXISTS `doctorspecilization`;
CREATE TABLE IF NOT EXISTS `doctorspecilization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Gynecologist/Obstetrician', '2016-12-28 06:37:25', '0000-00-00 00:00:00'),
(2, 'General Physician', '2016-12-28 06:38:12', '0000-00-00 00:00:00'),
(3, 'Dermatologist', '2016-12-28 06:38:48', '0000-00-00 00:00:00'),
(4, 'Homeopath', '2016-12-28 06:39:26', '0000-00-00 00:00:00'),
(5, 'Ayurveda', '2016-12-28 06:39:51', '0000-00-00 00:00:00'),
(6, 'Dentist', '2016-12-28 06:40:08', '0000-00-00 00:00:00'),
(7, 'Ear-Nose-Throat (Ent) Specialist', '2016-12-28 06:41:18', '0000-00-00 00:00:00'),
(9, 'Demo test', '2016-12-28 07:37:39', '0000-00-00 00:00:00'),
(10, 'Bones Specialist demo', '2017-01-07 08:07:53', '0000-00-00 00:00:00'),
(11, 'Test', '2019-06-23 17:51:06', '2019-06-23 17:55:06'),
(12, 'Dermatologist', '2019-11-10 18:36:36', '2019-11-10 18:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

DROP TABLE IF EXISTS `tblcontactus`;
CREATE TABLE IF NOT EXISTS `tblcontactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `AdminRemark` mediumtext,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `IsRead` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'test user', 'test@gmail.com', 2523523522523523, ' This is sample text for the test.', '2019-06-29 19:03:08', 'Test Admin Remark', '2019-06-30 12:55:23', 1),
(2, 'Anuj kumar', 'phpgurukulofficial@gmail.com', 1111111111111111, ' This is sample text for testing.  This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing.', '2019-06-30 13:06:50', NULL, NULL, NULL),
(3, 'fdsfsdf', 'fsdfsd@ghashhgs.com', 3264826346, 'sample text   sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  ', '2019-11-10 18:53:48', 'vfdsfgfd', '2019-11-10 18:54:04', 1),
(4, 'EDWIN KAMI', 'EDWIN@BBQ.COM', 9645133320, ' KOLLAAM NALLA SITE', '2021-07-28 11:54:02', NULL, NULL, NULL),
(5, 'hitesh', 'hitesh@abc.com', 7412589630, ' nthannu', '2021-08-25 11:16:43', 'ok', '2021-08-25 11:17:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

DROP TABLE IF EXISTS `tblmedicalhistory`;
CREATE TABLE IF NOT EXISTS `tblmedicalhistory` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(2, 3, '120/185', '80/120', '85 Kg', '101 degree', '#Fever, #BP high\r\n1.Paracetamol\r\n2.jocib tab\r\n', '2019-11-06 04:20:07'),
(3, 2, '90/120', '92/190', '86 kg', '99 deg', '#Sugar High\r\n1.Petz 30', '2019-11-06 04:31:24'),
(4, 1, '125/200', '86/120', '56 kg', '98 deg', '# blood pressure is high\r\n1.koil cipla', '2019-11-06 04:52:42'),
(5, 1, '96/120', '98/120', '57 kg', '102 deg', '#Viral\r\n1.gjgjh-1Ml\r\n2.kjhuiy-2M', '2019-11-06 04:56:55'),
(6, 4, '90/120', '120', '56', '98 F', '#blood sugar high\r\n#Asthma problem', '2019-11-06 14:38:33'),
(7, 5, '80/120', '120', '85', '98.6', 'Rx\r\n\r\nAbc tab\r\nxyz Syrup', '2019-11-10 18:50:23'),
(8, 6, '100', '120', '80', '1500', 'scen aanu probem manasalayilla', '2021-07-22 19:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

DROP TABLE IF EXISTS `tblpatient`;
CREATE TABLE IF NOT EXISTS `tblpatient` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(1, 1, 'Manisha Jha', 4558968789, 'test@gmail.com', 'Female', '\"\"J&K Block J-127, Laxmi Nagar New Delhi', 26, 'She is diabetic patient', '2019-11-04 21:38:06', '2019-11-06 06:48:05'),
(2, 5, 'Raghu Yadav', 9797977979, 'raghu@gmail.com', 'Male', 'ABC Apartment Mayur Vihar Ph-1 New Delhi', 39, 'No', '2019-11-05 10:40:13', '2019-11-05 11:53:45'),
(3, 7, 'Mansi', 9878978798, 'jk@gmail.com', 'Female', '\"fdghyj', 46, 'No', '2019-11-05 10:49:41', '2019-11-05 11:58:59'),
(4, 7, 'Manav Sharma', 9888988989, 'sharma@gmail.com', 'Male', 'L-56,Ashok Nagar New Delhi-110096', 45, 'He is long suffered by asthma', '2019-11-06 14:33:54', '2019-11-06 14:34:31'),
(5, 9, 'John', 1234567890, 'john@test.com', 'male', 'Test ', 25, 'THis is sample text for testing.', '2019-11-10 18:49:24', NULL),
(6, 11, 'navin', 124587960, 'navinross1@gmail.com', 'Male', 'abkjdhbas', 20, 'dandruff', '2021-07-22 19:24:00', '2021-07-22 19:30:25'),
(7, 11, 'navin', 7412589630, 'navinross110@gmail.com', 'Male', 'asew qwert', 22, 'minor dandruff', '2021-07-23 13:58:18', '2021-07-23 13:59:38'),
(8, 11, 'EDWIN', 9645133320, 'edwin@anc.com', '', 'asd qwery', 20, 'hairfall', '2021-07-28 10:42:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

DROP TABLE IF EXISTS `userlog`;
CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(24, NULL, 'navinross110@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-21 19:53:23', NULL, 0),
(25, NULL, 'navin', 0x3a3a3100000000000000000000000000, '2021-07-21 19:55:07', NULL, 0),
(26, 9, 'navinross1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-21 19:55:20', '22-07-2021 01:26:37 AM', 1),
(27, NULL, 'navin', 0x3a3a3100000000000000000000000000, '2021-07-22 09:16:23', NULL, 0),
(28, NULL, 'navinross110@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-22 09:16:32', NULL, 0),
(29, NULL, 'navinross1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-22 09:17:03', NULL, 0),
(30, 9, 'navinross1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-22 09:17:11', NULL, 1),
(31, 9, 'navinross1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-22 09:27:08', '22-07-2021 02:58:48 PM', 1),
(32, 9, 'navinross1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-22 09:30:17', '22-07-2021 03:00:49 PM', 1),
(33, 9, 'navinross1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-22 19:25:44', NULL, 1),
(34, 9, 'navinross1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-22 19:26:09', '23-07-2021 12:59:30 AM', 1),
(35, 9, 'navinross1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-22 19:30:45', NULL, 1),
(36, 10, 'navinross110@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-23 12:21:14', '23-07-2021 05:51:47 PM', 1),
(37, 10, 'navinross110@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-23 13:55:04', '23-07-2021 07:27:16 PM', 1),
(38, NULL, 'navinross1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-23 13:58:31', NULL, 0),
(39, 10, 'navinross110@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-23 13:58:40', '23-07-2021 07:28:59 PM', 1),
(40, 10, 'navinross110@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-23 14:15:01', '23-07-2021 09:46:23 PM', 1),
(41, NULL, 'navinross1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-28 10:26:59', NULL, 0),
(42, NULL, 'navinross1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-28 10:27:20', NULL, 0),
(43, NULL, 'navinross110@gmail.com', 0x3a3a3100000000000000000000000000, '2021-07-28 10:27:30', NULL, 0),
(44, NULL, 'devan@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-28 10:27:42', NULL, 0),
(45, 11, 'edwin@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-28 10:28:49', '28-07-2021 04:09:45 PM', 1),
(46, 11, 'edwin@abc.com', 0x3a3a3100000000000000000000000000, '2021-07-28 10:52:47', '28-07-2021 04:25:56 PM', 1),
(47, NULL, 'navin', 0x3132372e302e302e3100000000000000, '2021-07-29 06:22:55', NULL, 0),
(48, NULL, 'navinross1@gmail.com', 0x3132372e302e302e3100000000000000, '2021-07-29 06:23:22', NULL, 0),
(49, NULL, 'navin', 0x3132372e302e302e3100000000000000, '2021-07-29 06:37:37', NULL, 0),
(50, 10, 'navinross110@gmail.com', 0x3132372e302e302e3100000000000000, '2021-07-29 06:38:10', '29-07-2021 12:09:32 PM', 1),
(51, 10, 'navinross110@gmail.com', 0x3132372e302e302e3100000000000000, '2021-08-15 15:48:54', NULL, 1),
(52, 10, 'navinross110@gmail.com', 0x3132372e302e302e3100000000000000, '2021-08-16 16:42:45', NULL, 1),
(53, NULL, 'devan@abc.com', 0x3132372e302e302e3100000000000000, '2021-08-16 22:39:55', NULL, 0),
(54, NULL, 'devan@abc.com', 0x3132372e302e302e3100000000000000, '2021-08-16 22:40:24', NULL, 0),
(55, NULL, 'devan@abc.com', 0x3132372e302e302e3100000000000000, '2021-08-16 22:40:45', NULL, 0),
(56, 10, 'navinross110@gmail.com', 0x3132372e302e302e3100000000000000, '2021-08-22 14:36:30', NULL, 1),
(57, 10, 'navinross110@gmail.com', 0x3132372e302e302e3100000000000000, '2021-08-22 16:40:59', NULL, 1),
(58, 10, 'navinross110@gmail.com', 0x3132372e302e302e3100000000000000, '2021-08-25 11:07:26', '25-08-2021 04:37:35 PM', 1),
(59, 10, 'navinross110@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-26 10:57:25', NULL, 1),
(60, 10, 'navinross110@gmail.com', 0x3132372e302e302e3100000000000000, '2021-08-27 07:53:08', '27-08-2021 01:23:34 PM', 1),
(61, 10, 'navinross110@gmail.com', 0x3132372e302e302e3100000000000000, '2021-08-27 18:39:34', '28-08-2021 01:27:04 AM', 1),
(62, 10, 'navinross110@gmail.com', 0x3132372e302e302e3100000000000000, '2021-08-29 09:58:36', '29-08-2021 03:30:17 PM', 1),
(63, 10, 'navinross110@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-30 14:27:47', NULL, 1),
(64, 10, 'navinross110@gmail.com', 0x3132372e302e302e3100000000000000, '2021-08-31 09:58:37', NULL, 1),
(65, 10, 'navinross110@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 12:56:49', NULL, 1),
(66, 10, 'navinross110@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 14:24:52', NULL, 1),
(67, 10, 'navinross110@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-05 15:46:32', NULL, 1),
(68, 10, 'navinross110@gmail.com', 0x3132372e302e302e3100000000000000, '2021-09-07 21:41:56', NULL, 1),
(69, 10, 'navinross110@gmail.com', 0x3132372e302e302e3100000000000000, '2021-09-09 17:33:29', NULL, 1),
(70, 10, 'navinross110@gmail.com', 0x3132372e302e302e3100000000000000, '2021-09-18 00:54:52', '18-09-2021 06:33:39 AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(2, 'Sarita pandey', 'New Delhi India', 'Delhi', 'female', 'test@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2016-12-30 05:34:39', '0000-00-00 00:00:00'),
(3, 'Amit', 'New Delhi', 'New delhi', 'male', 'amit@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 06:36:53', '0000-00-00 00:00:00'),
(4, 'Rahul Singh', 'New Delhi', 'New delhi', 'male', 'rahul@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:41:14', '0000-00-00 00:00:00'),
(5, 'Amit kumar', 'New Delhi India', 'Delhi', 'male', 'amit12@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 08:00:26', '0000-00-00 00:00:00'),
(6, 'Test user', 'New Delhi', 'Delhi', 'male', 'tetuser@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-06-23 18:24:53', '2019-06-23 18:36:09'),
(7, 'John', 'USA', 'Newyork', 'male', 'john@test.com', 'f925916e2754e5e03f75dd58a5733251', '2019-11-10 18:40:21', '2019-11-10 18:40:51'),
(10, 'navin', 'asad qwer', 'Chalakudy', 'male', 'navinross110@gmail.com', 'e19d5cd5af0378da05f63f891c7467af', '2021-07-23 12:21:02', NULL),
(11, 'EDWIN', 'asad qwery', 'Chalakudy', 'male', 'edwin@abc.com', 'e19d5cd5af0378da05f63f891c7467af', '2021-07-28 10:28:24', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
