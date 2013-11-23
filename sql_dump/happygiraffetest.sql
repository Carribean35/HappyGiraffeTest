-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 23 2013 г., 18:23
-- Версия сервера: 5.5.29
-- Версия PHP: 5.4.6-1ubuntu1.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `happygiraffetest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `module_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `left_key` (`module_id`,`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `title`, `link`) VALUES
(1, 'Реми Хадли', '/img/foto1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`) VALUES
(1, 'Новый Subaru WRX представили в Лос-Анджелесе', 'На автосалоне в Лос-Анджелесе Subaru показала новую генерацию седана WRX, который получил новый двигатель, новую коробку и новую внешность. До премьеры, когда компания только показала тизеры грядущей новинки, мы услышали много скепсиса относительно автоспортивных характеристик автомобиля, мол, "Subaru WRX уже не тот". Сегодня мы можем хоть с какой-то долей объективности сказать о том, чего ждать от нового WRX на раллийном треке.\r\n<br>\r\nС появлением нового Subaru WRX мы знакомимся с новой философией спортивных автомобилей японской компании. Она звучит так: "Бескомпромиссная мощность под вашим контролем". Subaru WRX в его нынешней версии имеет 265-сильный горизонтально-оппозитный двигатель объёмом 2.5 литра, который работал в паре только с пятиступенчатой механической коробкой. На новом поколении седана мы видим "оппозитник" на 2.0 литра, с которого удалось снять 272 л.с. Что же, довольно неплохо, если добавить к этому то, что показатели экономичности и экологичности улучшились.');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
