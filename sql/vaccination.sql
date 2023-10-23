-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2023 at 05:00 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccination`
--

-- --------------------------------------------------------

--
-- Table structure for table `healthcenter`
--

DROP TABLE IF EXISTS `healthcenter`;
CREATE TABLE IF NOT EXISTS `healthcenter` (
  `hid` int NOT NULL AUTO_INCREMENT,
  `hname` varchar(30) NOT NULL,
  `hregion` varchar(20) NOT NULL,
  `himage` varchar(400) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`hid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `healthcenter`
--

INSERT INTO `healthcenter` (`hid`, `hname`, `hregion`, `himage`, `description`, `status`) VALUES
(1, 'General Hospital', 'Ernakulam', 'govtmedicalcollege.jpeg', 'General Hospital, Ernakulam is a state-owned hospital, with excellent super speciality facilities for training and treatment in cardiology, ctvs, nephrology, urology along with internal medicine, general surgery in Kochi, India. It is managed as part of the public health system of the government of Kerala. ', 1),
(2, 'General Hospital', 'Ernakulam', 'govtmedicalcollege.jpeg', 'General Hospital, Ernakulam is a state-owned hospital, with excellent super speciality facilities for training and treatment in cardiology, ctvs, nephrology, urology along with internal medicine, general surgery in Kochi, India. It is managed as part of the public health system of the government of Kerala. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `pname` varchar(30) NOT NULL,
  `phone` char(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`pid`, `pname`, `phone`, `username`, `password`) VALUES
(1, 'yaseen', '9898989898', 'yaseen@gmail.com', '1234'),
(2, 'abhsihek', '8989898989', 'abhishek@gmail.com', '1234'),
(3, 'abhidev', '9898989898', 'abhidev@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `sid` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `hname` varchar(30) NOT NULL,
  `vname` varchar(30) NOT NULL,
  `quantity` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

DROP TABLE IF EXISTS `vaccine`;
CREATE TABLE IF NOT EXISTS `vaccine` (
  `vid` int NOT NULL AUTO_INCREMENT,
  `vname` varchar(30) NOT NULL,
  `vage` int NOT NULL,
  `vimage` varchar(400) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`vid`, `vname`, `vage`, `vimage`, `description`, `status`) VALUES
(1, 'Hepatitis B', 1, 'hepA.jpg', 'Hepatitis B is a vaccine-preventable liver infection caused by the hepatitis B virus (HBV) that can lead to chronic infection causing cirrhosis, liver cancer and death. All medically stable infants weighing ≥2,000 grams are recommended to receive the hepatitis B vaccine within the first 24 hours following birth.', 2),
(2, 'Hepatitis B', 1, 'hepA.jpg', 'Hepatitis B is a vaccine-preventable liver infection caused by the hepatitis B virus (HBV) that can lead to chronic infection causing cirrhosis, liver cancer and death. All medically stable infants weighing ≥2,000 grams are recommended to receive the hepatitis B vaccine within the first 24 hours following birth.', 2),
(3, 'Hepatitis A', 1, '1dcaf94d591ecf5aeb4a9787e7bbe454_9c72cd24bcaa97e.jpg', 'Hepatitis A is a vaccine-preventable liver infection caused by the hepatitis A virus (HAV). HAV is found in the stool and blood of people who are infected. Hepatitis A is very contagious.', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
