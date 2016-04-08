-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2016 at 03:21 PM
-- Server version: 5.5.48
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments_general`
--

CREATE TABLE IF NOT EXISTS `Comments_general` (
  `Comment_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Text` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

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
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Symptoms` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Diagnosis`
--

INSERT INTO `Diagnosis` (`ID`, `Name`, `Symptoms`, `Description`) VALUES
(1, 'Loh po jizni etoy', '', 'Just loh koroche'),
(2, 'Bla bla', 'Headache', 'Bla bla bla');

-- --------------------------------------------------------

--
-- Table structure for table `Doctor_Patient_relationships`
--

CREATE TABLE IF NOT EXISTS `Doctor_Patient_relationships` (
  `Id` int(11) NOT NULL,
  `Emp_ID` int(11) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `Rating_changed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Doctor_Patient_relationships`
--

INSERT INTO `Doctor_Patient_relationships` (`Id`, `Emp_ID`, `Patient_ID`, `Rating_changed`) VALUES
(4, 25, 19, 1),
(5, 25, 19, 1),
(6, 25, 19, 1),
(7, 25, 19, 1),
(8, 25, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
  `Emp_ID` int(11) NOT NULL,
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
  `CurriculumVitae` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`Emp_ID`, `Class`, `First_Name`, `Surname`, `Middle_Name`, `Prof`, `CarierStart`, `Category`, `Phone_num`, `Passport_data`, `Receipt_Date`, `Image`, `CurriculumVitae`) VALUES
(1, 1, 'Azizjan', 'Ayupov', 'Hamidovich', 6, '2015-04-02', 5, '+996702647002', 'AN 234-344', '2016-03-13', 'Photo1096.jpg', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla '),
(3, 3, 'Sergey', 'Durakov', 'Ivanovich', 3, '0000-00-00', NULL, '+996702647002', 'AN 10-01', '2016-02-13', '', ''),
(5, 2, 'Sigmund', 'Freud', '', 5, '0000-00-00', 5, '+996702647002', 'AN 345-456', '2016-03-12', 'Sigmund Freud.jpg', ''),
(24, 3, 'A', 'A', 'A', 3, '2016-03-15', 5, '+996702647002', 'AN 343-234', '2016-03-15', 'Фото1064.jpg', 'абвгдеёжзийклмнопрст'),
(25, 2, 'Azizjan', 'Ayupov', 'Hamidovich', 1, '2013-09-17', 3, '+996702647002', 'AN 343-234', '2016-03-15', 'Photo1084.jpg', 'bla bla bla'),
(29, 2, 'Sanabar', 'Sydyq', 'Tursun', 2, '1992-08-16', 1, '+996702647002', 'AN 343-234', '2016-03-19', 'apa.jpg', 'wdwwdwd'),
(32, 2, 'Sanabar', 'Sydyq', 'Tursun', 2, '1992-08-16', 1, '+996702647002', 'AN 343-234', '2016-03-19', 'apa.jpg', 'bla bla bla'),
(33, 3, 'Гость', 'sa', 'No', 3, '2016-03-20', 1, '+996702647002', 'AN 343-234', '2016-03-20', 'admin.jpg', 'bbbbbbbb'),
(34, 3, 'Гость', 'sa', 'No', 3, '2016-03-20', 1, '+996702647002', 'AN 343-234', '2016-03-20', 'admin.jpg', 'bbbbbbbb'),
(35, 2, '12', '12', '12', 1, '2016-03-20', 1, '12', '12', '2016-03-20', 'admin.jpg', '12');

-- --------------------------------------------------------

--
-- Table structure for table `Emp_comments`
--

CREATE TABLE IF NOT EXISTS `Emp_comments` (
  `Emp_comments_ID` int(11) NOT NULL,
  `Emp_ID` int(5) NOT NULL,
  `Patient_Id` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Emp_comments`
--

INSERT INTO `Emp_comments` (`Emp_comments_ID`, `Emp_ID`, `Patient_Id`, `Date`, `Text`) VALUES
(1, 5, 19, '2016-03-17 02:26:25', 'Awesome doctor!'),
(3, 5, 21, '2016-03-17 06:17:28', 'Yeah!'),
(9, 25, 21, '2016-03-17 09:33:12', 'Normal doctor. If I was a girl I exactly will fall to love with him...'),
(10, 29, 19, '2016-03-26 14:16:46', 'Awesome doctor!'),
(11, 29, 19, '2016-03-26 14:16:50', 'Awesome doctor!');

-- --------------------------------------------------------

--
-- Table structure for table `Order`
--

CREATE TABLE IF NOT EXISTS `Order` (
  `Id` int(11) NOT NULL,
  `DoctorId` int(10) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `PatientId` int(11) DEFAULT NULL,
  `UnregVisitorId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Order`
--

INSERT INTO `Order` (`Id`, `DoctorId`, `Date`, `PatientId`, `UnregVisitorId`) VALUES
(1, 5, NULL, 19, 0),
(2, 25, NULL, 0, 1),
(8, 25, NULL, 21, 0),
(9, 5, NULL, NULL, 3),
(10, 5, NULL, 21, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `ID` int(11) NOT NULL,
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
  `Comment` varchar(150) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `First_Name`, `Middle_Name`, `Second_Name`, `Birth_Date`, `Gender`, `Insurance_Category`, `Diagnosis`, `Virus`, `Receipt_Date`, `Prof`, `Address`, `Phone`, `Email`, `Care_Doctor`, `Care_Doctor_Prof`, `Photo`, `Comment`) VALUES
(19, 'Azizjan', 'Hamidovich', 'Ayupov', '2016-03-01', 1, 2, 2, 0, '2016-03-15', 'Programmer', 'Bishkek', '+996702568963', 'litpulla@mail.ru', 1, 6, '20151211_231550.jpg', 'sd sd'),
(21, 'Devid', '', 'Duhovnyi', '2016-03-01', 1, 1, 1, 1, '2016-03-15', 'Programmer', 'Bishkek', '+996702568963', 'litpulla@mail.ru', 1, 6, '20151211_231550.jpg', 'bla bla'),
(37, 'Kamilla', '', 'Munurova', '2005-02-28', 0, 0, 2, 0, '2016-03-20', 'Cook', 'Bishkek Orto-Say', '+996702942932', 'litpulla@mail.ru', 25, 0, 'Photo37.jpg', 'Beautiful girl.'),
(38, 'Hamid', 'Kasymovich', 'Ayupov', '1963-05-22', 1, 0, 2, 0, '2016-03-20', 'Builder', 'Bishkek Orto-Say', '+996702568963', 'litpulla@mail.ru', 25, 0, 'Photo0086.jpg', ''),
(39, 'John', '', 'Fly', '2016-03-24', 1, 0, 2, 1, '2016-03-24', 'Actor', 'New Jersey', '+12661157', 'blabla@mail.ru', 25, 0, 'image.jpg', 'No comment.');

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE IF NOT EXISTS `Rating` (
  `Emp_ID` int(11) NOT NULL,
  `Likes` int(10) DEFAULT '0',
  `Dislikes` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` (`Emp_ID`, `Likes`, `Dislikes`) VALUES
(25, 9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `Reception`
--

CREATE TABLE IF NOT EXISTS `Reception` (
  `Emp_ID` int(10) NOT NULL,
  `Time` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Reception`
--

INSERT INTO `Reception` (`Emp_ID`, `Time`) VALUES
(25, 30),
(32, 30);

-- --------------------------------------------------------

--
-- Table structure for table `Schedule`
--

CREATE TABLE IF NOT EXISTS `Schedule` (
  `Day_ID` int(10) NOT NULL,
  `Emp_ID` int(10) NOT NULL,
  `Day` varchar(3) NOT NULL,
  `Start` time NOT NULL,
  `Lunch_Start` time DEFAULT NULL,
  `Lunch_End` time DEFAULT NULL,
  `End` time DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Schedule`
--

INSERT INTO `Schedule` (`Day_ID`, `Emp_ID`, `Day`, `Start`, `Lunch_Start`, `Lunch_End`, `End`) VALUES
(32, 25, 'Mon', '08:00:00', '12:00:00', '13:00:00', '17:00:00'),
(33, 25, 'Tue', '08:00:00', '12:00:00', '13:00:00', '17:00:00'),
(34, 25, 'Wed', '08:00:00', '12:00:00', '13:00:00', '17:00:00'),
(35, 25, 'Thu', '08:00:00', '12:00:00', '13:00:00', '17:00:00'),
(36, 25, 'Fri', '08:00:00', '12:00:00', '13:00:00', '17:00:00'),
(38, 32, 'Mon', '08:00:00', '12:00:00', '13:00:00', '16:00:00'),
(39, 32, 'Tue', '08:00:00', '12:00:00', '13:00:00', '16:00:00'),
(40, 32, 'Wed', '08:00:00', '12:00:00', '13:00:00', '16:00:00'),
(41, 32, 'Thu', '08:00:00', '12:00:00', '13:00:00', '16:00:00'),
(42, 32, 'Fri', '08:00:00', '12:00:00', '13:00:00', '16:00:00'),
(43, 32, 'Sat', '08:00:00', '12:00:00', '13:00:00', '16:00:00'),
(44, 25, 'Sat', '09:00:00', '12:00:00', '13:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE IF NOT EXISTS `Staff` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Salary` double NOT NULL,
  `Unit` int(1) NOT NULL,
  `Image` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`Id`, `Name`, `Salary`, `Unit`, `Image`) VALUES
(1, 'Surgeon', 100.5, 1, 'surg.jpg'),
(2, 'Pediatrician', 150, 2, 'Pediatr.jpg'),
(4, 'Ophthalmologist', 1000, 1, 'Ophthalmologist.jpg'),
(5, 'Psychologist', 1200, 1, '430910.png');

-- --------------------------------------------------------

--
-- Table structure for table `Symptoms`
--

CREATE TABLE IF NOT EXISTS `Symptoms` (
  `Symptom_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Symptoms`
--

INSERT INTO `Symptoms` (`Symptom_ID`, `Name`, `Description`) VALUES
(1, '0', '0'),
(2, 'Headache', 'Headache');

-- --------------------------------------------------------

--
-- Table structure for table `UnregVisitors`
--

CREATE TABLE IF NOT EXISTS `UnregVisitors` (
  `Id` int(11) NOT NULL,
  `First_Name` varchar(25) DEFAULT NULL,
  `Middle_Name` varchar(25) DEFAULT NULL,
  `Second_Name` varchar(25) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='All clinic non-registered patients';

--
-- Dumping data for table `UnregVisitors`
--

INSERT INTO `UnregVisitors` (`Id`, `First_Name`, `Middle_Name`, `Second_Name`, `Phone`) VALUES
(1, 'Kamilla', '', 'Munurova', '+996702942932'),
(2, 'Yusupova', 'Erkinovna', 'Guzyal', '+996702647002'),
(3, 'Guzyal', 'Erkinovna', 'Yusupova', '+996702647002');

-- --------------------------------------------------------

--
-- Table structure for table `UserClasses`
--

CREATE TABLE IF NOT EXISTS `UserClasses` (
  `Id` int(3) NOT NULL,
  `Name` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
  `Id` int(11) NOT NULL,
  `Class` int(3) NOT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Id`, `Class`, `Password`) VALUES
(1, 1, '123'),
(5, 2, '123'),
(19, 4, '123'),
(21, 4, '123'),
(24, 3, '123'),
(25, 2, '123'),
(32, 2, '123'),
(33, 3, NULL),
(34, 3, NULL),
(35, 2, NULL),
(36, 4, NULL),
(37, 4, NULL),
(38, 4, NULL),
(39, 4, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments_general`
--
ALTER TABLE `Comments_general`
  ADD PRIMARY KEY (`Comment_ID`);

--
-- Indexes for table `Diagnosis`
--
ALTER TABLE `Diagnosis`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Doctor_Patient_relationships`
--
ALTER TABLE `Doctor_Patient_relationships`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`Emp_ID`);

--
-- Indexes for table `Emp_comments`
--
ALTER TABLE `Emp_comments`
  ADD PRIMARY KEY (`Emp_comments_ID`);

--
-- Indexes for table `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Rating`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`Emp_ID`);

--
-- Indexes for table `Reception`
--
ALTER TABLE `Reception`
  ADD PRIMARY KEY (`Emp_ID`);

--
-- Indexes for table `Schedule`
--
ALTER TABLE `Schedule`
  ADD PRIMARY KEY (`Day_ID`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Symptoms`
--
ALTER TABLE `Symptoms`
  ADD PRIMARY KEY (`Symptom_ID`);

--
-- Indexes for table `UnregVisitors`
--
ALTER TABLE `UnregVisitors`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `UserClasses`
--
ALTER TABLE `UserClasses`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments_general`
--
ALTER TABLE `Comments_general`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `Diagnosis`
--
ALTER TABLE `Diagnosis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Doctor_Patient_relationships`
--
ALTER TABLE `Doctor_Patient_relationships`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `Emp_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `Emp_comments`
--
ALTER TABLE `Emp_comments`
  MODIFY `Emp_comments_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Order`
--
ALTER TABLE `Order`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `Schedule`
--
ALTER TABLE `Schedule`
  MODIFY `Day_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `Staff`
--
ALTER TABLE `Staff`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Symptoms`
--
ALTER TABLE `Symptoms`
  MODIFY `Symptom_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `UnregVisitors`
--
ALTER TABLE `UnregVisitors`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `UserClasses`
--
ALTER TABLE `UserClasses`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
