-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 12 2019 г., 01:50
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
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `cocktail_id` (`cocktail_id`),
  KEY `cocktail_id_2` (`cocktail_id`),
  KEY `cocktail_id_3` (`cocktail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `cocktail_id`) VALUES
(1, 1),
(2, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `cocktail`
--

INSERT INTO `cocktail` (`id`, `title_coctail`, `fortress`, `category`) VALUES
(1, 'Зеленая Фея', 36, 'Сильный'),
(2, 'Дайкири', 100, 'Крутой');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text_comment` text NOT NULL,
  `data_comment` datetime NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`,`user_id`),
  KEY `user_id` (`user_id`),
  KEY `article_id_2` (`article_id`),
  KEY `user_id_2` (`user_id`),
  KEY `article_id_3` (`article_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `text_comment`, `data_comment`, `article_id`, `user_id`) VALUES
(68, '&Ntilde;', '2019-03-25 15:16:37', 2, 3),
(69, 'qwewerty', '2019-03-25 15:24:50', 1, 3),
(70, 'qwewerty', '2019-03-25 15:25:04', 1, 3),
(71, 'ewfew', '2019-03-25 13:25:25', 2, 3),
(72, 'qweqewtgegrs', '2019-03-25 13:24:59', 2, 3),
(73, 'qweqewtgegrs', '2019-03-25 12:26:12', 2, 3),
(74, '&ETH;&deg;&Ntilde;', '2019-03-25 12:27:16', 2, 3),
(75, '&ETH;&frac14;&ETH;&cedil;&Ntilde;', '2019-03-25 12:28:01', 2, 3),
(76, '&Ntilde;', '2019-03-25 12:33:12', 2, 3),
(77, '&ETH;&deg;&ETH;&cedil;&ETH;&sup2;&ETH;&deg;', '2019-03-25 12:34:25', 2, 3),
(78, '&Ntilde;', '2019-03-25 12:38:30', 2, 3),
(79, '&Ntilde;', '2019-03-25 12:38:59', 2, 3),
(80, '&Ntilde;', '2019-03-25 12:41:09', 1, 3),
(81, 'sad', '2019-04-01 12:55:43', 2, 4),
(82, 'qwerty', '2019-04-11 02:13:55', 2, 1),
(83, 'qqq', '2019-04-11 02:21:16', 2, 1),
(84, 'qqq', '2019-04-11 02:30:17', 2, 1),
(85, 'qqq', '2019-04-11 02:33:11', 2, 1),
(86, 'qqq', '2019-04-11 02:33:34', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `text_article` text NOT NULL,
  `links` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `article_id_2` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`id`, `article_id`, `text_article`, `links`) VALUES
(1, 1, 'Это один из самых дорогих коктейлей в мире', 'www.1xbet.ru'),
(4, 2, 'существует ли система администрирования, подобная phpMyAdmin в которой можно задать связи между таблицами и гибко её администрировать?\r\n\r\nЗамечания к вышесказанному.\r\nПредполагаю что неполно объяснил, что именно нужно, поэтому дополню примером.\r\n\r\nНапример есть табличка учета пользователей `USERS` с полями:\r\n`ID` - уникальный идентификатор пользователя,\r\n`NAME`- имя пользователя,\r\n`AGE`- возраст,\r\n`STREETS_ID` - идентификатор улицы на которой живет.\r\n\r\nИ есть табличка учета городских улиц, где эти пользователи живут `STREETS` с полями:\r\n`ID` - уникальный идентификатор улицы,\r\n`NAME` - название улицы.\r\n\r\nПоэтому хочу спросить - существует ли движок управления базами данных, который позволит учесть эти связи. Чтобы во время добавления пользователя появлялось выподающее меню, которое бы подхватило список имеющихся улиц.\r\n\r\nВозможно сам phpMyAdmin может такое делать?\r\nЕсли да, то где почитать?', 'www.jigsaw.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `img`
--

INSERT INTO `img` (`id`, `img`) VALUES
(1, 'green.jpg'),
(2, 'dai.jpg');

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
-- Структура таблицы `popular`
--

CREATE TABLE IF NOT EXISTS `popular` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `article_id_2` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
(1, 'Виски', 'л');

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `sum` int(11) NOT NULL,
  `article_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`user_id`),
  KEY `user_id` (`user_id`),
  KEY `article_id_2` (`article_id`),
  KEY `article_id_3` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `sum`, `article_id`) VALUES
(1, 1, 110101010, 1),
(2, 2, 1, 2),
(3, 4, 1, 1),
(4, 1, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `set_img`
--

CREATE TABLE IF NOT EXISTS `set_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img_id` int(10) unsigned NOT NULL,
  `content_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `img_id` (`img_id`),
  KEY `article_id` (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `set_img`
--

INSERT INTO `set_img` (`id`, `img_id`, `content_id`) VALUES
(1, 1, 1),
(2, 2, 4);

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
  `log` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `data_born` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `log`, `password`, `data_born`) VALUES
(1, 'Jigsaw', 'qwerty123', '1998-12-29'),
(2, 'aa', 'a', '2019-03-04'),
(3, 'qwe', '1', '0000-00-00'),
(4, 'a', 'aa', '3121-02-21');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`cocktail_id`) REFERENCES `cocktail` (`id`);

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

--
-- Ограничения внешнего ключа таблицы `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

--
-- Ограничения внешнего ключа таблицы `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `ingredient_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `popular`
--
ALTER TABLE `popular`
  ADD CONSTRAINT `popular_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

--
-- Ограничения внешнего ключа таблицы `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `set_img`
--
ALTER TABLE `set_img`
  ADD CONSTRAINT `set_img_ibfk_4` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`),
  ADD CONSTRAINT `set_img_ibfk_3` FOREIGN KEY (`img_id`) REFERENCES `img` (`id`);

--
-- Ограничения внешнего ключа таблицы `set_ingredients`
--
ALTER TABLE `set_ingredients`
  ADD CONSTRAINT `set_ingredients_ibfk_4` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id`),
  ADD CONSTRAINT `set_ingredients_ibfk_3` FOREIGN KEY (`cocktail_id`) REFERENCES `cocktail` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
