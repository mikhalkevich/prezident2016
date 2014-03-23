-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 28 2014 г., 16:19
-- Версия сервера: 5.5.35-log
-- Версия PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yii`
--

-- --------------------------------------------------------

--
-- Структура таблицы `candidats`
--

CREATE TABLE IF NOT EXISTS `candidats` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `picture` tinytext,
  `name` tinytext,
  `about` tinytext,
  `status` enum('show','hide') DEFAULT 'hide',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `candidats`
--

INSERT INTO `candidats` (`id`, `picture`, `name`, `about`, `status`) VALUES
(6, 'luka.jpg', 'Александр Григорьевич Лукашенко', 'Действующий Президент Республики Беларусь', 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `candidat_id` int(10) DEFAULT '0',
  `ip` tinytext,
  `protiv_za` enum('protiv','za') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `votes`
--

INSERT INTO `votes` (`id`, `candidat_id`, `ip`, `protiv_za`) VALUES
(6, 6, '127.0.5.1', 'za'),
(7, 6, '127.0.4.1', 'protiv'),
(8, 6, '127.0.1.1', 'protiv'),
(9, 6, '127.0.6.1', 'protiv'),
(10, 6, '127.0.2.1', 'protiv'),
(11, 6, '127.0.3.1', 'protiv'),
(12, 6, '127.0.0.1', 'za');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
