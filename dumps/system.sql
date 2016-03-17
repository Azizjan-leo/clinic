-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 13 2016 г., 14:35
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `system`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Comments_general`
--

CREATE TABLE IF NOT EXISTS `Comments_general` (
  `Comment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date DEFAULT NULL,
  `Text` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Comment_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `Comments_general`
--

INSERT INTO `Comments_general` (`Comment_ID`, `Date`, `Text`) VALUES
(16, '2016-02-13', 'ajodawij'),
(17, '2016-02-13', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibu'),
(18, '2016-02-13', 'С„РѕС†РІС€С„РІС†РѕС‰С€С†С„РІРѕС‰С„С†С€РѕРІС‰'),
(19, '2016-02-13', 'works'),
(20, '2016-02-14', 'awdwadwad'),
(22, '2016-02-13', 'awdawdwa');

-- --------------------------------------------------------

--
-- Структура таблицы `Diagnoses`
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
-- Структура таблицы `Employee`
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
-- Структура таблицы `Emp_comments`
--

CREATE TABLE IF NOT EXISTS `Emp_comments` (
  `Emp_comments_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Text` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Emp_comments_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
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
-- Структура таблицы `Staff`
--

CREATE TABLE IF NOT EXISTS `Staff` (
  `Staff_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` int(11) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  `Unit` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`Staff_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `Symptoms`
--

CREATE TABLE IF NOT EXISTS `Symptoms` (
  `Symptom_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` int(11) DEFAULT NULL,
  `Description` int(11) DEFAULT NULL,
  PRIMARY KEY (`Symptom_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `SystAccess`
--

CREATE TABLE IF NOT EXISTS `SystAccess` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `SystAccess`
--

INSERT INTO `SystAccess` (`id`, `name`, `password`) VALUES
(1, 'admin', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
