-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 11 2021 г., 19:53
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `holiday`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dates`
--

CREATE TABLE `dates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `dates`
--

INSERT INTO `dates` (`id`, `user_id`, `start_date`, `end_date`, `is_confirmed`) VALUES
(3, 2, '2021-04-12', '2021-04-13', 0),
(4, 3, '2021-04-19', '2021-05-03', 0),
(5, 2, '2021-04-23', '2021-04-18', 1),
(6, 4, '2021-04-19', '2021-04-23', 1),
(7, 3, '2021-04-12', '2021-05-07', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `is_admin`) VALUES
(2, 'Владимир', 'Истомин', 'verdant24@yandex.ru', '$2y$12$VWo.pbSuA85uDQ28cM.qz.QojO0fNzVX9YyoTyT3Q/btMQp3luUhe', 1),
(3, 'Дарья', 'Софронова', 'dasha.sofronova@mail.ru', '$2y$12$/Z1TG.OEJaftIB2v6PCq0eqrp883V7sNL7d9GynTtNwT.yqKkX9WO', 0),
(4, 'Каспер', 'Истомин', 'casper@casper.com', '$2y$12$ak1swjHEsIZafrrd1YXY5e0an5uweELuYurGk548.5/vBdV8ldZhG', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dates`
--
ALTER TABLE `dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
