-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 15 2016 г., 15:45
-- Версия сервера: 5.5.50
-- Версия PHP: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testDraw`
--
CREATE DATABASE IF NOT EXISTS `testDraw` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `testDraw`;

-- --------------------------------------------------------

--
-- Структура таблицы `AllDraws`
--

DROP TABLE IF EXISTS `AllDraws`;
CREATE TABLE IF NOT EXISTS `AllDraws` (
  `Id` int(11) NOT NULL,
  `drawName` varchar(50) NOT NULL,
  `Draw` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `AllDraws`
--

INSERT INTO `AllDraws` (`Id`, `drawName`, `Draw`) VALUES
(9, '12', '5_12,9_15,10_9,10_14'),
(13, '2', '1_9,7_6'),
(14, '3', '5_14,8_9'),
(15, '5', '5_14,6_12'),
(16, '132', '6_11,12_8,12_13'),
(17, '1111', '2_2,2_3,2_4,2_5,2_6,2_7,5_6,6_11,8_18,10_6');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `AllDraws`
--
ALTER TABLE `AllDraws`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `AllDraws`
--
ALTER TABLE `AllDraws`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
