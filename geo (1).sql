-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 15 2015 г., 11:01
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `geo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `User_info`
--

CREATE TABLE IF NOT EXISTS `User_info` (
  `ID` mediumint(5) NOT NULL AUTO_INCREMENT,
  `IP` varchar(16) NOT NULL,
  `OS` varchar(255) NOT NULL,
  `Browser` varchar(150) NOT NULL,
  `Lat_coords` float(9,6) NOT NULL,
  `Lon_coords` float(9,6) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `User_info`
--

INSERT INTO `User_info` (`ID`, `IP`, `OS`, `Browser`, `Lat_coords`, `Lon_coords`) VALUES
(6, '127.0.0.1', 'Chrome 42.0.2311.135', 'Windows NT build 9200 (Windows 8.1 Business Edition)', 55.939999, 37.349998),
(7, '127.0.0.1', 'Chrome 42.0.2311.135', 'Windows NT build 9200 (Windows 8.1 Business Edition)', 55.939999, 37.349998);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
