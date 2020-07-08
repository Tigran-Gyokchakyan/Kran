-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 08 2020 г., 08:10
-- Версия сервера: 10.4.13-MariaDB
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u944822068_kran`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blim`
--

CREATE TABLE `blim` (
  `ip` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `blim`
--

INSERT INTO `blim` (`ip`, `time`) VALUES
('37.157.214.202', 1520504440),
('212.34.244.56', 1540333283),
('37.157.214.199', 1525001876);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `wallet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` float NOT NULL,
  `ip` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `protect` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `wallet`, `password`, `balance`, `ip`, `protect`) VALUES
(1, 'admin', 'P90594086', 'tigo2018', 1000.21, '37.157.214.202', 0),
(3, 'adminnew', 'P121231232', 'adminnew', 0.5, '212.34.244.56', 0),
(4, 'poxos', 'P12312123', 'poxospoxos', 4.33, '37.157.214.202', 0),
(5, 'hakob', 'P12125452', 'poxos2018', 1.9, '37.157.214.199', 0),
(6, 'poxosik', 'P12313545', 'poxosik111', 2.24, '212.34.244.56', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
