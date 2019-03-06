-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 06 2019 г., 23:21
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `db_coctailbar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cocktail_id` int(10) unsigned NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cocktail_id` (`cocktail_id`),
  KEY `cocktail_id_2` (`cocktail_id`),
  KEY `cocktail_id_3` (`cocktail_id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `cocktail_id_4` (`cocktail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `cocktail_id`, `rating`) VALUES
(1, 1, 50);

-- --------------------------------------------------------

--
-- Структура таблицы `cocktail`
--

CREATE TABLE IF NOT EXISTS `cocktail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_coctail` varchar(255) NOT NULL,
  `fortress` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title_coctail` (`title_coctail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `cocktail`
--

INSERT INTO `cocktail` (`id`, `title_coctail`, `fortress`, `category`) VALUES
(1, 'Зеленая Фея', 36, 'Сильный');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `text_comment` text NOT NULL,
  `data_comment` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `article_id_2` (`article_id`),
  KEY `article_id_3` (`article_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `article_id`, `user_id`, `text_comment`, `data_comment`) VALUES
(1, 1, 1, 'лалалалал', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `text_article` text NOT NULL,
  `img_content` varchar(255) NOT NULL,
  `links` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `article_id_2` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`id`, `article_id`, `text_article`, `img_content`, `links`) VALUES
(1, 1, 'Это один из самых дорогих коктейлей в мире', 'img/wivbewv', 'www.1xbet.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `img`
--

INSERT INTO `img` (`id`, `img`) VALUES
(1, 'img/weivbewu');

-- --------------------------------------------------------

--
-- Структура таблицы `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `product_id_2` (`product_id`),
  KEY `product_id_3` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `ingredient`
--

INSERT INTO `ingredient` (`id`, `product_id`, `count`) VALUES
(1, 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_product` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ingredient_id_2` (`title_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title_product`, `unit`) VALUES
(1, 'Виски, пиво, лимонад', 'л');

-- --------------------------------------------------------

--
-- Структура таблицы `set_img`
--

CREATE TABLE IF NOT EXISTS `set_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img_id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `img_id` (`img_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `set_img`
--

INSERT INTO `set_img` (`id`, `img_id`, `article_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `set_ingredients`
--

CREATE TABLE IF NOT EXISTS `set_ingredients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cocktail_id` int(10) unsigned NOT NULL,
  `ingredient_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ingredient_id` (`ingredient_id`),
  KEY `cocktail_id` (`cocktail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `set_ingredients`
--

INSERT INTO `set_ingredients` (`id`, `cocktail_id`, `ingredient_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `e_mail` varchar(255) NOT NULL,
  `log` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `data_born` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `adress` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `e_mail`, `log`, `password`, `name`, `last_name`, `nickname`, `data_born`, `gender`, `adress`) VALUES
(1, 'misho_1998@mail.ru', 'Jigsaw', 'qwerty123', 'Misha', 'Duev', 'Sket4er', '1998-12-29', 1, 'ул. Картофельная, д.5');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
