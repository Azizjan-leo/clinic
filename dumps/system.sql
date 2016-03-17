-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 17, 2016 at 04:50 AM
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
-- Table structure for table `Comments_general`
--

CREATE TABLE IF NOT EXISTS `Comments_general` (
  `Comment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Text` varchar(500) NOT NULL,
  PRIMARY KEY (`Comment_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `Comments_general`
--

INSERT INTO `Comments_general` (`Comment_ID`, `Date`, `Text`) VALUES
(16, '2016-02-13', 'ajodawij'),
(17, '2016-02-13', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibu'),
(18, '2016-02-13', 'С„РѕС†РІС€С„РІС†РѕС‰С€С†С„РІРѕС‰С„С†С€РѕРІС‰'),
(19, '2016-02-13', 'works'),
(20, '2016-02-14', 'awdwadwad'),
(22, '2016-02-13', 'awdawdwa'),
(23, '2016-02-13', 'Hello!');

-- --------------------------------------------------------

--
-- Table structure for table `Diagnosis`
--

CREATE TABLE IF NOT EXISTS `Diagnosis` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Symptoms` text NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Diagnosis`
--

INSERT INTO `Diagnosis` (`ID`, `Name`, `Symptoms`, `Description`) VALUES
(1, 'Loh po jizni etoy', '', 'Just loh koroche'),
(2, 'Bla bla', 'Headache', 'Bla bla bla');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
  `Emp_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Class` int(11) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `Middle_Name` varchar(30) DEFAULT NULL,
  `Prof` int(3) NOT NULL,
  `CarierStart` date NOT NULL,
  `Category` int(1) DEFAULT '5',
  `Phone_num` varchar(13) DEFAULT NULL,
  `Passport_data` varchar(30) NOT NULL,
  `Receipt_Date` date NOT NULL,
  `Image` varchar(50) NOT NULL,
  `CurriculumVitae` text NOT NULL,
  PRIMARY KEY (`Emp_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`Emp_ID`, `Class`, `First_Name`, `Surname`, `Middle_Name`, `Prof`, `CarierStart`, `Category`, `Phone_num`, `Passport_data`, `Receipt_Date`, `Image`, `CurriculumVitae`) VALUES
(1, 1, 'Azizjan', 'Ayupov', 'Hamidovich', 6, '2015-04-02', 5, '+996702647002', 'AN 234-344', '2016-03-13', 'Photo1096.jpg', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla '),
(3, 3, 'Sergey', 'Durakov', 'Ivanovich', 3, '0000-00-00', NULL, '+996702647002', 'AN 10-01', '2016-02-13', '', ''),
(5, 2, 'Sigmund', 'Freud', '', 5, '0000-00-00', 5, '+996702647002', 'AN 345-456', '2016-03-12', 'Sigmund Freud.jpg', ''),
(24, 3, 'A', 'A', 'A', 3, '2016-03-15', 5, '+996702647002', 'AN 343-234', '2016-03-15', 'Фото1064.jpg', 'абвгдеёжзийклмнопрст'),
(25, 2, 'Azizjan', 'Ayupov', 'Hamidovich', 1, '2016-03-15', 3, '+996702647002', 'AN 343-234', '2016-03-15', 'Фото1064.jpg', 'bla bla bla');

-- --------------------------------------------------------

--
-- Table structure for table `Emp_comments`
--

CREATE TABLE IF NOT EXISTS `Emp_comments` (
  `Emp_comments_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Text` text NOT NULL,
  PRIMARY KEY (`Emp_comments_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Order`
--

CREATE TABLE IF NOT EXISTS `Order` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `DoctorId` int(10) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `PatientId` int(11) DEFAULT NULL,
  `VisitorId` int(11) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(30) NOT NULL,
  `Middle_Name` varchar(30) DEFAULT NULL,
  `Second_Name` varchar(30) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Gender` tinyint(1) NOT NULL DEFAULT '1',
  `Insurance_Category` int(10) DEFAULT NULL,
  `Diagnosis` int(11) NOT NULL,
  `Virus` tinyint(1) NOT NULL,
  `Receipt_Date` date NOT NULL,
  `Prof` varchar(25) NOT NULL,
  `Address` varchar(70) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Care_Doctor` int(5) NOT NULL,
  `Care_Doctor_Prof` int(5) NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `Comment` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `First_Name`, `Middle_Name`, `Second_Name`, `Birth_Date`, `Gender`, `Insurance_Category`, `Diagnosis`, `Virus`, `Receipt_Date`, `Prof`, `Address`, `Phone`, `Email`, `Care_Doctor`, `Care_Doctor_Prof`, `Photo`, `Comment`) VALUES
(19, 'Azizjan', 'Hamidovich', 'Ayupov', '2016-03-01', 1, 2, 2, 0, '2016-03-15', 'Programmer', 'Bishkek', '+996702568963', 'litpulla@mail.ru', 1, 6, '20151211_231550.jpg', 'sd sd'),
(21, 'Azizjan', 'Hamidovich', 'Ayupov', '2016-03-01', 1, 1, 1, 1, '2016-03-15', 'Programmer', 'Bishkek', '+996702568963', 'litpulla@mail.ru', 1, 6, '20151211_231550.jpg', 'bla bla');

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE IF NOT EXISTS `Staff` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `IsDoctor` tinyint(1) NOT NULL,
  `Salary` double NOT NULL,
  `Unit` int(1) NOT NULL,
  `Image` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`Id`, `Name`, `IsDoctor`, `Salary`, `Unit`, `Image`) VALUES
(1, 'Surgeon', 1, 100.5, 1, ''),
(2, 'Pediatrician', 1, 150, 2, ''),
(3, 'Cleaner', 0, 200, 1, ''),
(4, 'Ophthalmologist', 1, 1000, 1, ''),
(5, 'Psychologist', 1, 1200, 1, '430910.png'),
(6, 'Admin', 0, 15000, 1, 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Symptoms`
--

CREATE TABLE IF NOT EXISTS `Symptoms` (
  `Symptom_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Symptom_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Symptoms`
--

INSERT INTO `Symptoms` (`Symptom_ID`, `Name`, `Description`) VALUES
(1, '0', '0'),
(2, 'Headache', 'Headache');

-- --------------------------------------------------------

--
-- Table structure for table `UserClasses`
--

CREATE TABLE IF NOT EXISTS `UserClasses` (
  `Id` int(3) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `UserClasses`
--

INSERT INTO `UserClasses` (`Id`, `Name`) VALUES
(1, 'Admin'),
(2, 'Doctor'),
(3, 'Service'),
(4, 'Patient');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Class` int(3) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Id`, `Class`, `Password`) VALUES
(1, 1, '123'),
(24, 3, '123'),
(25, 2, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
