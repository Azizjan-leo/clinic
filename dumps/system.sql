-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2016 at 07:02 AM
-- Server version: 5.7.11
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
-- Table structure for table `Advisers`
--

CREATE TABLE IF NOT EXISTS `Advisers` (
  `id` int(11) NOT NULL,
  `DoctorId` int(11) NOT NULL,
  `PatientId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Diagnosis`
--

INSERT INTO `Diagnosis` (`ID`, `Name`, `Description`) VALUES
(13, 'Cerebral Palsy', 'Reaching the expected developmental benchmarks of infancy and childhood – sitting, rolling over, crawling, standing and walking – are a matter of great joy for parents, but what if a child’s developmental timetable seems delayed? There are many tell-tale signs that a child may have Cerebral Palsy, but those factors can be indicative of many conditions'),
(14, 'Benign Prostatic Hyperplasia', 'An enlarged prostate gland . The prostate gland surrounds the urethra, the tube that carries urine from the bladder out of the body. As the prostate gets bigger, it may squeeze or partly block the urethra');

-- --------------------------------------------------------

--
-- Table structure for table `Diagnosis_symptoms`
--

CREATE TABLE IF NOT EXISTS `Diagnosis_symptoms` (
  `ID` int(11) NOT NULL,
  `Diagnosis_ID` int(11) NOT NULL,
  `Symptom_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Diagnosis_symptoms`
--

INSERT INTO `Diagnosis_symptoms` (`ID`, `Diagnosis_ID`, `Symptom_ID`) VALUES
(11, 13, 3),
(12, 13, 4),
(13, 13, 5),
(14, 13, 6),
(15, 13, 7),
(16, 13, 8),
(17, 13, 9),
(18, 13, 10),
(19, 13, 11),
(20, 13, 12),
(21, 14, 13);

-- --------------------------------------------------------

--
-- Table structure for table `Doctor_Patient_relationships`
--

CREATE TABLE IF NOT EXISTS `Doctor_Patient_relationships` (
  `Id` int(11) NOT NULL,
  `Emp_ID` int(11) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `Rating_changed` tinyint(1) DEFAULT NULL,
  `Advise_or_Treat` int(1) DEFAULT NULL COMMENT '0 - none 1 - advising 2 - treating'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Doctor_Patient_relationships`
--

INSERT INTO `Doctor_Patient_relationships` (`Id`, `Emp_ID`, `Patient_ID`, `Rating_changed`, `Advise_or_Treat`) VALUES
(8, 25, 19, 1, 1),
(9, 5, 39, 2, NULL),
(10, 25, 39, 1, 2),
(11, 32, 19, 2, NULL),
(12, 25, 21, 2, 1),
(13, 25, 37, 0, 2);

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
-- Table structure for table `Ord`
--

CREATE TABLE IF NOT EXISTS `Ord` (
  `Id` int(11) NOT NULL,
  `DoctorId` int(10) NOT NULL,
  `PatientId` int(11) DEFAULT NULL,
  `UnregVisitorId` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ord`
--

INSERT INTO `Ord` (`Id`, `DoctorId`, `PatientId`, `UnregVisitorId`, `Date`, `Time`) VALUES
(67, 25, 19, 0, '2016-05-29', '10:30:00'),
(68, 25, 19, 0, '2016-05-29', '22:30:00'),
(70, 25, 19, 0, '2016-05-29', '03:00:22'),
(71, 25, 19, 0, '2016-05-29', '03:00:22'),
(72, 25, 19, 0, '2016-05-22', '20:30:00'),
(85, 25, 19, 0, '2016-04-27', '08:00:00'),
(86, 25, 19, 0, '2016-04-27', '08:00:00'),
(87, 25, 19, 0, '2016-04-28', '08:30:00'),
(88, 25, 19, 0, '2016-04-29', '09:30:00'),
(89, 25, 19, 0, '2016-04-30', '11:00:00'),
(90, 25, 19, 0, '2016-04-27', '09:00:00'),
(91, 25, 19, 0, '2016-04-27', '09:00:00'),
(92, 25, 19, 0, '2016-04-27', '09:00:00'),
(93, 25, 19, 0, '2016-04-27', '09:00:00'),
(94, 25, 19, 0, '2016-04-28', '09:30:00'),
(95, 25, 19, 0, '2016-04-28', '09:30:00'),
(96, 25, 19, 0, '2016-04-27', '08:00:00'),
(97, 25, 19, 0, '2016-04-27', '08:00:00'),
(98, 25, 19, 0, '2016-04-30', '11:30:00'),
(99, 25, 19, 0, '2016-06-01', '16:30:00'),
(100, 25, 19, 0, '2016-06-01', '16:30:00'),
(101, 25, 19, 0, '2016-04-30', '11:30:00'),
(102, 25, 19, 0, '2016-05-01', '07:00:00'),
(103, 25, 19, 0, '2016-04-30', '15:00:00'),
(104, 25, 0, 55, '2016-04-27', '08:30:00'),
(105, 25, 0, 56, '2016-04-27', '13:00:00'),
(106, 25, 0, 57, '2016-04-27', '13:30:00'),
(107, 25, 21, 0, '2016-05-15', '10:00:00'),
(108, 25, 21, 0, '2016-04-29', '10:00:00'),
(109, 25, 19, 0, '2016-07-03', '12:00:00'),
(110, 25, 19, 0, '2016-07-04', '10:30:00');

--
-- Triggers `Ord`
--
DELIMITER $$
CREATE TRIGGER `delete_organization` BEFORE DELETE ON `ord`
 FOR EACH ROW BEGIN
  DELETE FROM UnregVisitors WHERE Id = OLD.UnregVisitorId; 
END
$$
DELIMITER ;

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
  `Advisers` tinyint(1) DEFAULT NULL COMMENT 'If a patient has advisers here will 1 and we start to search him being sure he exists',
  `Care_Doctor_Prof` int(5) NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `Comment` varchar(150) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `First_Name`, `Middle_Name`, `Second_Name`, `Birth_Date`, `Gender`, `Insurance_Category`, `Diagnosis`, `Virus`, `Receipt_Date`, `Prof`, `Address`, `Phone`, `Email`, `Care_Doctor`, `Advisers`, `Care_Doctor_Prof`, `Photo`, `Comment`) VALUES
(19, 'Azizjan', 'Hamidovich', 'Ayupov', '2016-03-01', 1, 2, 13, 0, '2016-03-15', 'Programmer', 'Bishkek', '+996702568963', 'litpulla@mail.ru', 1, NULL, 6, '20151211_231550.jpg', 'sd sd'),
(21, 'Devid', '', 'Duhovnyi', '2016-03-01', 1, 1, 1, 1, '2016-03-15', 'Programmer', 'Bishkek', '+996702568963', 'litpulla@mail.ru', 1, NULL, 6, '20151211_231550.jpg', 'bla bla'),
(37, 'Kamilla', '', 'Munurova', '2005-02-28', 0, 0, 2, 0, '2016-03-20', 'Cook', 'Bishkek Orto-Say', '+996702942932', 'litpulla@mail.ru', 25, NULL, 0, 'Фото0195.jpg', 'Beautiful girl.'),
(38, 'Hamid', 'Kasymovich', 'Ayupov', '1963-05-22', 1, 0, 2, 0, '2016-03-20', 'Builder', 'Bishkek Orto-Say', '+996702568963', 'litpulla@mail.ru', 25, NULL, 0, 'Photo0086.jpg', ''),
(39, 'John', '', 'Fly', '2016-03-24', 1, 0, 2, 1, '2016-03-24', 'Actor', 'New Jersey', '+12661157', 'blabla@mail.ru', 25, NULL, 0, 'image.jpg', 'No comment.');

-- --------------------------------------------------------

--
-- Table structure for table `Patient_diagnosis`
--

CREATE TABLE IF NOT EXISTS `Patient_diagnosis` (
  `ID` int(11) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `Diagnosis_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Patient_diagnosis`
--

INSERT INTO `Patient_diagnosis` (`ID`, `Patient_ID`, `Diagnosis_ID`) VALUES
(1, 19, 13),
(2, 21, 13),
(3, 21, 14);

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
(25, 10, 9);

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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Schedule`
--

INSERT INTO `Schedule` (`Day_ID`, `Emp_ID`, `Day`, `Start`, `Lunch_Start`, `Lunch_End`, `End`) VALUES
(32, 25, 'Mon', '08:00:00', '12:00:00', '13:00:00', '17:00:00'),
(33, 25, 'Tue', '08:00:00', '12:00:00', '13:00:00', '17:00:00'),
(34, 25, 'Wed', '08:00:00', '12:00:00', '13:00:00', '17:00:00'),
(35, 25, 'Thu', '08:00:00', '12:00:00', '13:00:00', '17:00:00'),
(38, 32, 'Mon', '08:00:00', '12:00:00', '13:00:00', '16:00:00'),
(39, 32, 'Tue', '08:00:00', '12:00:00', '13:00:00', '16:00:00'),
(40, 32, 'Wed', '08:00:00', '12:00:00', '13:00:00', '16:00:00'),
(41, 32, 'Thu', '08:00:00', '12:00:00', '13:00:00', '16:00:00'),
(42, 32, 'Fri', '08:00:00', '12:00:00', '13:00:00', '16:00:00'),
(43, 32, 'Sat', '08:00:00', '12:00:00', '13:00:00', '16:00:00'),
(46, 25, 'Fri', '08:00:00', '00:00:00', '00:00:00', '13:00:00'),
(47, 25, 'Sun', '07:00:00', '00:00:00', '00:00:00', '23:00:00');

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
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Symptoms`
--

INSERT INTO `Symptoms` (`ID`, `Name`, `Description`) VALUES
(2, 'Headache', 'Headache'),
(3, 'Hypotonia', 'Decreased muscle tone or tension (flaccid, relaxed, or floppy limbs)'),
(4, 'Hypertonia', 'Increased muscle tone or tension (stiff or rigid limbs)'),
(5, 'Dystonia', 'Fluctuating muscle tone or tension (too loose at times and too tight at others)'),
(6, 'Muscle spasms', 'Sometimes painful, involuntary muscular contraction'),
(7, 'Abnormal neck or truncal tone', 'Decreased hypotonic or increased hypertonic, depending on age and Cerebral Palsy type'),
(8, 'Mixed', 'The trunk of the body may be hypotonic while the arms and legs are hypertonic'),
(9, 'Fixed joints', 'Joints that are effectively fused together preventing proper motion'),
(10, 'Clonus', 'Muscular spasms with regular contractions'),
(11, 'Ankle/foot clonus', 'Spasmodic abnormal movement of the foot'),
(12, 'Wrist clonus', 'Spasmodic movement of the hand'),
(13, 'Problems with urination', 'A need to pee more often, especially at night. Dribbling, leaking, or an urgent need to go. Trouble starting to pee, or a weak stream');

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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COMMENT='All clinic non-registered patients';

--
-- Dumping data for table `UnregVisitors`
--

INSERT INTO `UnregVisitors` (`Id`, `First_Name`, `Middle_Name`, `Second_Name`, `Phone`) VALUES
(55, 'Kio', '', 'Kasuka', '+996123123000'),
(56, 'Koli', '', 'Ko', '+996566566566'),
(57, 'Sk', '', 'Lini', '+996121212121');

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
(39, 4, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Advisers`
--
ALTER TABLE `Advisers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `Diagnosis_symptoms`
--
ALTER TABLE `Diagnosis_symptoms`
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
-- Indexes for table `Ord`
--
ALTER TABLE `Ord`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Patient_diagnosis`
--
ALTER TABLE `Patient_diagnosis`
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
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT for table `Advisers`
--
ALTER TABLE `Advisers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Comments_general`
--
ALTER TABLE `Comments_general`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `Diagnosis`
--
ALTER TABLE `Diagnosis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Diagnosis_symptoms`
--
ALTER TABLE `Diagnosis_symptoms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `Doctor_Patient_relationships`
--
ALTER TABLE `Doctor_Patient_relationships`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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
-- AUTO_INCREMENT for table `Ord`
--
ALTER TABLE `Ord`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `Patient_diagnosis`
--
ALTER TABLE `Patient_diagnosis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Schedule`
--
ALTER TABLE `Schedule`
  MODIFY `Day_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `Staff`
--
ALTER TABLE `Staff`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Symptoms`
--
ALTER TABLE `Symptoms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `UnregVisitors`
--
ALTER TABLE `UnregVisitors`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
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
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`%` EVENT `delete_ord` ON SCHEDULE EVERY 1 DAY STARTS '2016-04-27 23:59:59' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM `Ord` WHERE `Date` < DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
