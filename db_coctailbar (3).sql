-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 21 2019 г., 00:14
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_coctailbar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) UNSIGNED NOT NULL,
  `cocktail_id` int(10) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `cocktail_id`, `rating`) VALUES
(1, 1, 50),
(2, 2, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `cocktail`
--

CREATE TABLE `cocktail` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_coctail` varchar(255) NOT NULL,
  `fortress` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cocktail`
--

INSERT INTO `cocktail` (`id`, `title_coctail`, `fortress`, `category`) VALUES
(1, 'Зеленая Фея', 36, 'Сильный'),
(2, 'Дайкирилел', 1, 'Острые');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `text_comment` text NOT NULL,
  `data_comment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `article_id`, `user_id`, `text_comment`, `data_comment`) VALUES
(1, 1, 1, 'лалалалал', '0000-00-00 00:00:00'),
(12, 0, 0, 'dwerg', '2019-03-10 22:42:48'),
(23, 0, 0, 'dsfds', '2019-03-15 19:08:40'),
(24, 0, 0, 'erfer', '2019-03-15 19:08:43'),
(25, 0, 0, 'Ñ‹', '2019-03-15 19:21:20'),
(26, 0, 0, 'qq', '2019-03-15 19:40:58'),
(27, 0, 0, 'qq', '2019-03-15 19:42:02'),
(28, 0, 0, 'qq', '2019-03-15 19:42:52'),
(29, 0, 0, 'sadsda', '2019-03-15 19:42:56'),
(30, 0, 0, 'sdsdsadsa', '2019-03-15 19:44:35'),
(31, 0, 0, 'qq', '2019-03-15 19:49:09'),
(32, 0, 0, 'qq', '2019-03-15 19:49:10'),
(33, 0, 0, 'qq', '2019-03-15 19:49:12'),
(34, 0, 0, 'wqdqw', '2019-03-15 19:57:31'),
(35, 0, 0, 'q', '2019-03-15 20:40:06'),
(36, 0, 0, 'zax', '2019-03-15 22:12:40'),
(37, 0, 0, '', '2019-03-16 07:33:45'),
(38, 0, 0, 'Ð»Ð°Ð»Ð°', '2019-03-17 10:12:00'),
(39, 0, 0, 'Ð»Ð°Ð»Ð°', '2019-03-17 10:14:29'),
(40, 0, 0, 'weffewfewf', '2019-03-17 19:13:36'),
(41, 0, 0, 'asdsad', '2019-03-17 19:34:15'),
(42, 0, 0, 'zaza', '2019-03-17 19:37:47'),
(43, 1, 0, 'sqws', '2019-03-17 19:38:32'),
(44, 2, 0, 'qwsqw', '2019-03-17 19:38:39'),
(45, 1, 0, 'Очень вкусный коктейль!', '2019-03-19 20:52:31'),
(61, 1, 2, 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ', '2019-03-20 22:33:32'),
(62, 1, 2, 'jhvshef', '2019-03-20 22:37:11'),
(63, 2, 2, 'Саня привет', '2019-03-20 22:37:28'),
(64, 2, 1, 'fwefwe', '2019-03-20 22:37:54'),
(65, 1, 1, 'Денис тоже привет', '2019-03-20 22:54:06'),
(66, 2, 2, 'Влад картофель', '2019-03-20 22:54:58');

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

CREATE TABLE `content` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `text_article` text NOT NULL,
  `img_content` varchar(255) NOT NULL,
  `links` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`id`, `article_id`, `text_article`, `img_content`, `links`) VALUES
(1, 1, 'Это один из самых дорогих коктейлей в мире\r\nОдни бармены называют этот коктейль угощением безумцев, так как спиртное в сочетании с энергетиками дает непредсказуемый результат, другие – уверяют, что благодаря всего одной порции напитка можно веселиться всю ночь, не чувствуя усталости. Приготовить коктейль «Зеленая Фея» достаточно просто, главное достать ингредиенты – нужным составом алкогольных напитков укомплектован далеко не каждый домашний бар.\r\n\r\nВремя, место появления и автор рецепта неизвестны. Предполагается, что коктейль получил название из-за характерного зеленого, ближе к изумрудному цвету, который дает абсент в сочетании с Блю Курасао и дынным ликером.\r\n\r\nДо начала XX века за способность вызывать галлюцинации «зеленой феей» называли абсент. Некоторое время напиток даже был под запретом почти во всех странах Европы. Потом производители научились очищать абсент от наркотического вещества – туйона (содержится в полыни), и он снова поступил в продажу. Современный абсент в плане галлюцинаций безопасен.', 'green.jpg', 'www.1xbet.ru'),
(2, 2, 'lalalalal', 'asdsasad', 'adsadsad');

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE `img` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `img`
--

INSERT INTO `img` (`id`, `img`) VALUES
(1, 'img/weivbewu');

-- --------------------------------------------------------

--
-- Структура таблицы `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ingredient`
--

INSERT INTO `ingredient` (`id`, `product_id`, `count`) VALUES
(1, 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_product` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title_product`, `unit`) VALUES
(1, 'Виски, пиво, лимонад', 'л');

-- --------------------------------------------------------

--
-- Структура таблицы `set_img`
--

CREATE TABLE `set_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `set_img`
--

INSERT INTO `set_img` (`id`, `img_id`, `article_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `set_ingredients`
--

CREATE TABLE `set_ingredients` (
  `id` int(10) UNSIGNED NOT NULL,
  `cocktail_id` int(10) UNSIGNED NOT NULL,
  `ingredient_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `set_ingredients`
--

INSERT INTO `set_ingredients` (`id`, `cocktail_id`, `ingredient_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `log` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `data_born` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `log`, `password`, `data_born`) VALUES
(1, 'Jigsaw', 'qwerty123', '1998-12-29'),
(2, 'a', 'aa', '2019-03-12');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cocktail_id` (`cocktail_id`);

--
-- Индексы таблицы `cocktail`
--
ALTER TABLE `cocktail`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Индексы таблицы `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredient_id` (`title_product`) USING BTREE;

--
-- Индексы таблицы `set_img`
--
ALTER TABLE `set_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_id` (`img_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Индексы таблицы `set_ingredients`
--
ALTER TABLE `set_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredient_id` (`ingredient_id`),
  ADD KEY `cocktail_id` (`cocktail_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `cocktail`
--
ALTER TABLE `cocktail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `content`
--
ALTER TABLE `content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `img`
--
ALTER TABLE `img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `set_img`
--
ALTER TABLE `set_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `set_ingredients`
--
ALTER TABLE `set_ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
