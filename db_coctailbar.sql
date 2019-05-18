-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 18 2019 г., 16:23
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `cocktail`
--

INSERT INTO `cocktail` (`id`, `title_coctail`, `fortress`, `category`) VALUES
(1, 'Зеленая Фея', 65, 'крепкоалкогольный'),
(2, 'Дайкири', 23, 'слабоалкогольный'),
(3, 'Б-52', 25, 'крепкоалкогольный'),
(4, 'Мохито', 10, 'слабоалкогольный'),
(5, 'Голубая лагуна', 20, 'слабоалкогольный'),
(6, 'Белый русский', 32, 'крепкоалкогольный'),
(7, 'Космополитен', 30, 'крепкоалкогольный'),
(8, 'Негрони', 29, 'крепкоалкогольный'),
(9, 'Зомби', 48, 'крепокоалкогольный'),
(10, 'Боярский', 40, 'крепкоалкогольный');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

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
(86, 'qqq', '2019-04-11 02:33:34', 2, 1),
(87, 'Очень вкусный коктейль!', '2019-05-18 12:12:40', 1, 12),
(88, 'Очень вкусный коктейль!', '2019-05-18 12:13:53', 1, 12),
(89, 'asocnvlwsknciewncewnjewncjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2019-05-18 12:14:33', 1, 12),
(90, 'erw2ertre', '2019-05-18 12:34:14', 1, 13),
(91, 'dsdfdsf', '2019-05-18 12:34:24', 1, 13),
(92, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '2019-05-18 12:34:38', 1, 13),
(93, 'sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssddddddddddddddd', '2019-05-18 12:45:09', 1, 13),
(94, 'dsdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2019-05-18 12:45:59', 1, 13),
(95, 'sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssddddddddddddddd', '2019-05-18 12:47:40', 1, 13),
(96, 'sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssddddddddddddddd', '2019-05-18 12:51:21', 1, 13),
(97, 'eweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '2019-05-18 12:58:05', 1, 13);

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
(1, 'zel.jpg'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

--
-- Дамп данных таблицы `popular`
--

INSERT INTO `popular` (`id`, `article_id`) VALUES
(103, 1),
(104, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_product` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ingredient_id_2` (`title_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title_product`, `type`) VALUES
(1, 'Виски', 'drink'),
(2, 'Водка', 'drink'),
(3, 'Пиво', 'drink'),
(4, 'Лимон', 'product'),
(5, 'Лайм', 'product'),
(6, 'Лёд', 'product'),
(7, 'Серебряная текила', 'drink'),
(8, 'Абсент', 'drink'),
(9, 'Белый ром', 'drink'),
(10, 'Ликер блю кюрасао', 'drink'),
(11, 'Дынный ликер', 'drink'),
(12, 'Энергетик', 'drink'),
(13, 'Коктейльная вишня', 'product'),
(14, 'Сахарный сироп', 'product');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `sum`, `article_id`) VALUES
(1, 1, 110101010, 1),
(2, 2, 1, 2),
(3, 4, 1, 1),
(4, 1, 1, 2),
(5, 6, -1, 1),
(6, 7, 1, 2),
(7, 7, -1, 1),
(8, 8, -1, 1),
(9, 8, 1, 2),
(10, 1, -1, 1),
(11, 1, -1, 1),
(12, 1, -1, 1),
(13, 1, -1, 1),
(14, 1, -1, 1),
(15, 1, -1, 1),
(16, 1, 1, 2),
(17, 1, 1, 2),
(18, 1, 1, 2),
(19, 1, 1, 2),
(20, 1, -1, 2),
(21, 1, -1, 2),
(22, 1, 1, 2),
(23, 1, 1, 2),
(24, 1, 1, 2),
(25, 1, -1, 2),
(26, 1, -1, 2),
(27, 1, 1, 2),
(28, 1, 1, 2),
(29, 1, -1, 2),
(30, 1, -1, 2),
(31, 1, 1, 2),
(32, 1, 1, 2),
(33, 1, 1, 2),
(34, 1, 1, 2),
(35, 1, -1, 2),
(36, 1, -1, 2),
(37, 9, 1, 2),
(38, 9, 1, 2),
(39, 9, -1, 2),
(40, 9, -1, 2),
(41, 9, -1, 2),
(42, 9, 1, 2),
(43, 9, 1, 2),
(44, 9, 1, 1),
(45, 10, 1, 1),
(46, 10, 1, 1),
(47, 10, 1, 2),
(48, 10, 1, 2),
(49, 11, -1, 1),
(50, 11, 1, 2),
(51, 11, 1, 2),
(52, 12, 1, 1),
(53, 12, 1, 1),
(54, 12, 1, 1),
(55, 12, -1, 2),
(56, 13, 1, 1),
(57, 13, -1, 2),
(58, 13, -1, 2),
(59, 14, -1, 1),
(60, 14, -1, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `set_ingredients`
--

INSERT INTO `set_ingredients` (`id`, `cocktail_id`, `ingredient_id`) VALUES
(1, 1, 7),
(2, 1, 8),
(3, 1, 2),
(4, 1, 9),
(5, 1, 10),
(6, 1, 11),
(7, 1, 4),
(8, 1, 12),
(9, 1, 6),
(10, 1, 13),
(13, 2, 9),
(14, 2, 14),
(15, 2, 5),
(16, 2, 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `log`, `password`, `data_born`) VALUES
(1, 'Jigsaw', 'qwerty123', '1998-12-29'),
(2, 'aa', 'a', '2019-03-04'),
(3, 'qwe', '1', '0000-00-00'),
(4, 'a', 'aa', '3121-02-21'),
(5, '321', '12321', '2011-02-28'),
(6, 'a', 'a', '1111-01-01'),
(7, 'b', 'b', '0001-01-01'),
(8, 'c', 'c', '0001-01-01'),
(9, '123', '123', '2005-02-12'),
(10, 'x', 'x', '0000-00-00'),
(11, '1', '1', '1111-11-11'),
(12, '2', '2', '2222-02-22'),
(13, 'ы', 'ы', '1111-11-11'),
(14, 'z', 'z', '0000-00-00');

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
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

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
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

--
-- Ограничения внешнего ключа таблицы `set_img`
--
ALTER TABLE `set_img`
  ADD CONSTRAINT `set_img_ibfk_3` FOREIGN KEY (`img_id`) REFERENCES `img` (`id`),
  ADD CONSTRAINT `set_img_ibfk_4` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`);

--
-- Ограничения внешнего ключа таблицы `set_ingredients`
--
ALTER TABLE `set_ingredients`
  ADD CONSTRAINT `set_ingredients_ibfk_3` FOREIGN KEY (`cocktail_id`) REFERENCES `cocktail` (`id`),
  ADD CONSTRAINT `set_ingredients_ibfk_4` FOREIGN KEY (`ingredient_id`) REFERENCES `product` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
