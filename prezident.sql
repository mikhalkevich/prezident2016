-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.35-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных yii2
CREATE DATABASE IF NOT EXISTS `yii2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `yii2`;


-- Дамп структуры для таблица yii2.candidats
CREATE TABLE IF NOT EXISTS `candidats` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `picture` tinytext,
  `name` tinytext,
  `about` tinytext,
  `status` enum('show','hide') DEFAULT 'hide',
  `raiting` int(11) NOT NULL,
  `biografy` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii2.candidats: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `candidats` DISABLE KEYS */;
INSERT INTO `candidats` (`id`, `picture`, `name`, `about`, `status`, `raiting`, `biografy`) VALUES
	(6, 'luntik.jpg', 'Лунтик', 'Родился на луне. Сразу после рождения упал на землю', 'show', 0, NULL);
/*!40000 ALTER TABLE `candidats` ENABLE KEYS */;


-- Дамп структуры для таблица yii2.votes
CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `candidat_id` int(10) DEFAULT '0',
  `ip` tinytext,
  `protiv_za` enum('protiv','za') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii2.votes: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
INSERT INTO `votes` (`id`, `candidat_id`, `ip`, `protiv_za`) VALUES
	(6, 6, '127.0.5.1', 'za'),
	(7, 6, '127.0.4.1', 'protiv'),
	(8, 6, '127.0.1.1', 'protiv'),
	(9, 6, '127.0.6.1', 'protiv'),
	(10, 6, '127.0.2.1', 'protiv'),
	(11, 6, '127.0.3.1', 'protiv'),
	(12, 6, '127.0.0.1', 'za');
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
