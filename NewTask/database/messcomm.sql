-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 15 2021 г., 16:36
-- Версия сервера: 5.5.62-log
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `messcomm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` bigint(12) NOT NULL,
  `message_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `message_id`, `comment`, `Name`) VALUES
(78, 45, 'ghjghjghj', 'ghjghjghj'),
(79, 45, 'ghjghj', 'gfhjtyut5y6ut'),
(80, 45, '475658765', '345436');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` bigint(12) NOT NULL,
  `heading` text NOT NULL,
  `author` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `heading`, `author`, `message`) VALUES
(41, 'Кто любит Цветы?', 'Анна', 'Я очень сильно люблю цветы а вы? Какие вам больше по нраву. Мне вот Тюльпаны'),
(42, 'gdhfghfghf', 'dsgfgdsf', 'dfggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggdfgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;gggggggggggggggggggggggggggggggdfgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;ggggggggggggggggggggggggggggggg'),
(43, 'dgfdf', 'ghjghjgjh', 'ghkjhkjhkjhkj'),
(44, 'fghghf', 'ghghjgjh', 'gjhghjghj'),
(45, 'hkjhkj', 'hkjhjk', 'hjkhjkhkj'),
(46, 'tghkjghjk', 'hjlhnjk,.l', 'jkl;jk;.k;'),
(47, 'tyit46587474534537', 'ityitit', 'dfghghfrty'),
(48, '22453', '14', 'bvn');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
