-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2016 at 05:01 PM
-- Server version: 5.5.41-log
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `system`
--

-- --------------------------------------------------------

--
-- Table structure for table `Diagnoses`
--

CREATE TABLE IF NOT EXISTS `Diagnoses` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Blood_test` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
  `Emp_ID` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(30) DEFAULT NULL,
  `Middle_Name` varchar(30) DEFAULT NULL,
  `Second_Name` varchar(30) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Prof` int(11) DEFAULT NULL,
  PRIMARY KEY (`Emp_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `First_name` varchar(30) DEFAULT NULL,
  `Middle_name` varchar(30) DEFAULT NULL,
  `Second_name` varchar(30) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Adress` varchar(100) DEFAULT NULL,
  `Card_ID` int(11) DEFAULT NULL,
  `Care_Doctor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE IF NOT EXISTS `Staff` (
  `Staff_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` int(11) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  PRIMARY KEY (`Staff_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Symptoms`
--

CREATE TABLE IF NOT EXISTS `Symptoms` (
  `Symptom_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` int(11) DEFAULT NULL,
  `Description` int(11) DEFAULT NULL,
  PRIMARY KEY (`Symptom_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `SystAccess`
--

CREATE TABLE IF NOT EXISTS `SystAccess` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `SystAccess`
--

INSERT INTO `SystAccess` (`id`, `name`, `password`) VALUES
(1, 'admin', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
