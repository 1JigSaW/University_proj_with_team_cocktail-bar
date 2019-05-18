-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 18 2019 г., 17:12
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `cocktail_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`id`, `article_id`, `text_article`, `links`) VALUES
(1, 1, 'Одни бармены называют этот коктейль угощением безумцев, так как спиртное в сочетании с энергетиками дает непредсказуемый результат, другие – уверяют, что благодаря всего одной порции напитка можно веселиться всю ночь, не чувствуя усталости. Приготовить коктейль «Зеленая Фея» достаточно просто, главное достать ингредиенты – нужным составом алкогольных напитков укомплектован далеко не каждый домашний бар.\nВремя, место появления и автор рецепта неизвестны. Предполагается, что коктейль получил название из-за характерного зеленого, ближе к изумрудному цвету, который дает абсент в сочетании с Блю Курасао и дынным ликером.\nДо начала XX века за способность вызывать галлюцинации «зеленой феей» называли абсент. Некоторое время напиток даже был под запретом почти во всех странах Европы. Потом производители научились очищать абсент от наркотического вещества – туйона (содержится в полыни), и он снова поступил в продажу. Современный абсент в плане галлюцинаций безопасен.', 'wikienx.ru/eda-i-napitki/vina-i-spirtnye-napitki/110166-zelenaja-feja-koktejl-dlja-gurmanov.html'),
(4, 2, 'Секрет популярности алкогольного коктейля на долгие годы – подбор правильных составляющих и пропорций. В истории часто бывало так, что случайно смешивая ингредиенты, получался алкогольный напиток с идеальным вкусом, который становился знаменитым на долгие годы.\nИменно так произошло с коктейлем «Дайкири» — существуют три версии об истории его создания, но все они интересны и оригинальны. Основа напитка – ром, сок лайма и дробленый лед. По желанию можно добавлять фруктовые соки. Существует множество разновидностей коктейля – рецепты приготовления коктейля описаны в данной статье.\n\nИстория коктейля\nВерсия 1: на Кубе есть маленький городок Дайкири, в одном из баров которого в начале 20 века случайно закончился джин. Находчивый бармен без зазрения совести заменил его ромом, но, чтобы не разочаровать посетителей, он добавил в него сахар, лаймовый сок и лед. Коктейль, названный в честь кубинского городка быстро стал популярным.Поклонники: Эрнест Хемингуэй (писатель),  Джон Кеннеди (президент) и многие – многие другие.', 'alcofan.com/istoriya-i-recept-koktejlya-dajkiri.html'),
(5, 3, 'На данный момент коктейль Б-52 считается неотъемлемым атрибутом клубной жизни, его подают во всех приличных барах мира. Дальше я расскажу об истории, способах употребления и двух основных рецептах этого знаменитого напитка, покорившего миллионы любителей спиртного на всех континентах.\r\n\r\nИсторическая справка. B-52 – алкогольный коктейль с приятным сладковатым вкусом, состоящий из трех слоев ликеров (кофейного, сливочного и апельсинового), которые наливаются в равных пропорциях. Напиток создан в 1955 году в одном из баров Малибу. Его назвали в честь американского стратегического бомбардировщика Боинг B-52 Stratofortress, который как раз в том году поступил на вооружение армии США.', 'ru.wikipedia.org/wiki/Б-52_(коктейль)'),
(6, 4, 'В последние несколько лет одним из самых модных коктейлей считается кубинский Мохито (Mojito). Теперь чтобы насладиться его неповторимым вкусом необязательно идти в бар. Я расскажу о технологии приготовления Мохито в домашних условиях. Узнав все тонкости, вы сможете сделать этот коктейль у себя на кухне. Мы рассмотрим алкогольный и безалкогольный рецепты.\r\n\r\nИсторическая справка. Коктейль «Мохито» является усовершенствованной версией напитка «Драк», рецепт которого придумал известный пират Ф. Дрейк. Морские разбойники настаивали ром на лайме и мяте. Полученный напиток помогал им бороться с инфекционными заболеваниями в морских походах.\r\nВ 1942 году семейство Мартинес открыло в Гаване собственный бар La Bodeguita del Medio. Главной изюминкой заведения стал коктейль «Мохито» (с испанского слово mojito переводится как «немного влажный»), который отличался от пиратского рецепта одним дополнительным ингредиентом – газировкой (содовой). Вкусный умеренно крепкий коктейль быстро стал популярным и распространился по всему миру, а бар Мартинесов успешно работает до сих пор.', 'ru.wikipedia.org/wiki/Мохито\n'),
(7, 5, 'Любители экзотического спиртного ценят этот коктейль за оригинальный цвет, насыщенный вкус и простоту приготовления. Сделать коктейль «Голубая лагуна» в домашних условиях может любой начинающий бармен. В классическом рецепте используются легкодоступные ингредиенты, при их смешивании получается настоящий шедевр.\r\nИсторическая справка. Рецепт «Голубой лагуны» в 1960 году придумал американский бармен Энди МакЭлхон. Сначала считалось, что коктейль назван в честь одноименного фильма, который в то время был весьма популярен. Но позже выяснилось, что кино не имеет к напитку никакого отношения. «Голубая лагуна» – это термальный курорт в Исландии, где когда-то побывал МакЭлхон. Цвет полученного коктейля напомнил ему увиденные там красоты.\r\nПо еще одной версии «Голубую лагуну» впервые сделал французский художник Поль Гоген, после того как врачи запретили ему пить абсент. Переехав на Таити, он начал экспериментировать со смешиванием разных алкогольных напитков. Но эта гипотеза не нашла подтверждения, так и оставшись легендой.', 'ru.inshaker.com/cocktails/314-golubaya-laguna\n'),
(8, 6, 'Рецепт этого коктейля придумали не в России. Благодаря умеренной крепости с приятным молочным послевкусием он стал хитом западных дискотек 80-х годов. Доступность ингредиентов и простота приготовления позволяют насладиться коктейлем «Белый русский» в домашних условиях.\nИсторическая справка. «Белый русский» назван в честь белогвардейцев, бежавших за границу после поражения в гражданской войне. На Западе их называли «white russians». В пособиях для барменов первая версия коктейля встречается в 1930 году. Тогда он назывался «Белый медведь». Его готовили из водки, джина и какао-ликера. В 1950 году американские бармены модифицировали рецепт, после чего дали напитку его современное название.\nВ 1998 году на экраны вышел новый фильм братьев Коэнов «Большой Лебовски». Главный герой Джеффри «Чувак» Лебовски обожал пить молочный коктейль с водкой и кофейным ликером. Ценителям кино нравится делать «Белый русский» одновременно с главным героем, они утверждают, что так лучше чувствуют происходящее на экране. Также в сериале «Сверхъестественное» этот коктейль готовит Эйнштейн в раю.', 'ru.wikipedia.org/wiki/Белый_русский\n'),
(9, 7, 'Вначале 70-х годов прошлого века об этом коктейле знал лишь ограниченный круг лиц подпольных американских тусовок. Но стоило напитку однажды появиться на телевизионном экране, как о нем заговорил весь мир. Теперь «Космополитен» считается одним из лучших женских коктейлей.\r\n\r\nИсторическая справка. Изначально коктейль «Космополитен» создавался для поддержки алкогольного бренда Absolut Citron (водки с лимонным вкусом). Но рецепт так и не стал популярным, со временем о нем быстро забыли. Напиток «прижился» лишь в некоторых неформальных группах США.\r\nНо по-настоящему популярным «Космополитен» стал только после выхода на экран в 1998 году культового сериала «Секс в большом городе», героини которого почти в каждой серии пили этот коктейль, делясь женскими секретами.\r\nВторое рождение «Космополитену» дала женщина-бармен из Флориды Черил Кук, решившая придумать чисто женский коктейль, который стал бы альтернативой мартини. Черил смешала цитрусовую водку Absolut Citron, апельсиновый ликер Трипл-сек, клюквенный и лимонный соки. Но и этот рецепт быстро вышел из моды.\r\n', 'ru.inshaker.com/cocktails/29-kosmopoliten\n'),
(10, 8, 'Простой в приготовлении коктейль, который принято подавать на аперитив. Имеет красивый внешний вид и оригинальный запоминающийся вкус. Из-за высокой крепости (29-30 градусов) считается больше мужским напитком, хотя на одну часть состоит из сладкого вермута. Всё это о коктейле «Негрони», рецептом которого гордятся итальянцы.\r\n\r\nИсторическая справка. Коктейль «Негрони» придумал граф Камилло Негрони, родившийся в 1868 году в семье флорентийских аристократов. Будучи военным, он много путешествовал по миру, пробуя спиртное разных стран. Со временем у Негрони появилось два любимых напитка: лондонский джин и коктейль «Американо», состоящий из содовой, мартини Россо и биттера Кампари.\r\nВ 1919 году Негрони приехал на родину во Флоренцию. Он зашел в свой любимый бар «Casoni» и попросил старого друга Фоско Скарселли приготовить ему «Американо», но вместо содовой добавить джин для увеличения крепости. Полученный коктейль понравился не только графу, но и другим гостям. В 1948 году рецепт назвали в честь создателя.\r\nВо время светских приемов Негрони пил только свой коктейль. Он просил барменов украшать бокал долькой апельсина, чтобы не путать его с «Американо», который внешним видом очень похож на «Негрони», но традиционно украшается лимоном.', 'samogonman.com/koktejli/kak-pravilno-prigotovit-koktejl-negroni-negroni-sostav-i-klassicheskij-sposob-prigotovleniya-napitka.html\n'),
(11, 9, 'Тропический коктейль с грозным названием на основе трех видов рома. Соки скрывают жгучий привкус крепкого алкоголя, делая напиток мягким, но эта мягкость обманчива. «Зомби» быстро опьяняет, а иногда и вовсе валит с ног.\r\nИсторическая справка. Рецепт коктейля «Зомби» придумал в 1934 году владелец известного в Калифорнии бара Дон Бич (Don Beach). По одной из версий напиток получил название благодаря быстрому опьяняющему эффекту. Две порции превращают большинство посетителей в зомби. Еще этот коктейль иногда используется как средство от похмелья. По составу и вкусу он похож на «Май Тай». Сразу после появления «Зомби» стал популярным на родине. В 30-х годах он часто мелькал в голливудских фильмах или герои кино упоминали о нем.', 'gradusinfo.ru/alkogol/koktejli/s-romom/zombi-v-domashnix-usloviyax.html\n'),
(12, 10, 'Традиционный русский алкогольный коктейль, названный в честь актера Михаила Сергеевича Боярского. Бюджетный состав, простота приготовления и хорошо сбалансированный вкус сделали этот напиток хитом многих домашних вечеринок и праздников на открытом воздухе.\r\nИсторическая справка. Согласно самой правдоподобной версии коктейль «Боярский» придумали в 2004 году на музыкальном фестивале «Казантип» в Крыму. После выступления питерская группа «ILWT» отдыха в одном из баров. Музыкантам надоело пить чистую водку, тогда бармен предложил добавить сироп Гренадин (на основе гранатового сока). Во время дегустации коктейля посетители выкрикивали реплики из фильмов, в которых снялся Михаил Боярский, так и появилось название.\r\nПо другой версии рецепт предложил на «Казантипе» оставшийся неизвестным врач-нарколог, который хотел создать идеальное спиртное для праздника. Также выдвигается гипотеза, что автором коктейля является сам Михаил Боярский, но актер никогда публично не подтверждал своё отношение к напитку.\r\nКак пить. Из-за высокой крепости коктейль «Боярский» подают в стопках (шотах) и пьют залпом. После того как стопка опустеет, нужно ударить рукой по столу и прокричать: «Тысяча чертей!» или «Каналья!».', 'alcofan.com/kak-sdelat-koktejl-boyarskij.html\n');

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `img`
--

INSERT INTO `img` (`id`, `img`) VALUES
(1, 'zel.jpg'),
(2, 'dai.jpg'),
(3, 'b52.jpg'),
(4, 'moxito.jpg'),
(5, 'gollag.jpg'),
(6, 'rus.jpg'),
(7, 'cosmos.jpg'),
(8, 'negr.jpg'),
(9, 'zombie.jpg'),
(10, 'boyar.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

--
-- Дамп данных таблицы `popular`
--

INSERT INTO `popular` (`id`, `article_id`) VALUES
(105, 1),
(106, 2),
(107, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `sum`, `article_id`) VALUES
(1, 1, 0, 1),
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
(60, 14, -1, 2),
(61, 14, 1, 4);

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
