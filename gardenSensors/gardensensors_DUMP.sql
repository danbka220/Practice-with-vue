-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 08 2023 г., 16:31
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gardensensors`
--

-- --------------------------------------------------------

--
-- Структура таблицы `info`
--

CREATE TABLE `info` (
  `id` int NOT NULL,
  `temperature` float NOT NULL,
  `humidity` float NOT NULL,
  `luminosity` float NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `info`
--

INSERT INTO `info` (`id`, `temperature`, `humidity`, `luminosity`, `date`) VALUES
(35, 24, 40, 499.63, '2023-05-08 01:46:46'),
(36, 24, 40, 499.63, '2023-05-08 01:46:51'),
(37, 24, 40, 499.63, '2023-05-08 01:46:55'),
(38, 24, 40, 499.63, '2023-05-08 01:46:59'),
(39, 24, 40, 499.63, '2023-05-08 01:47:04'),
(40, 67.1, 40, 27795.1, '2023-05-08 01:47:09'),
(41, 68.8, 15.5, 27795.1, '2023-05-08 01:47:13'),
(42, 68.8, 15.5, 27795.1, '2023-05-08 01:47:18'),
(43, 68.8, 15.5, 27795.1, '2023-05-08 01:47:23'),
(44, 68.8, 15.5, 27795.1, '2023-05-08 01:47:27'),
(45, 24, 40, 499.63, '2023-05-08 16:16:13'),
(46, 24, 40, 499.63, '2023-05-08 16:16:17'),
(47, 80, 40, 499.63, '2023-05-08 16:16:22'),
(48, 80, 40, 499.63, '2023-05-08 16:16:26'),
(49, 5.9, 40, 499.63, '2023-05-08 16:16:34'),
(50, 5.9, 40, 499.63, '2023-05-08 16:16:39'),
(51, 5.9, 40, 499.63, '2023-05-08 16:17:14'),
(52, 5.9, 24.5, 3983.17, '2023-05-08 16:17:18'),
(53, 5.9, 24.5, 3983.17, '2023-05-08 16:17:23'),
(54, 5.9, 24.5, 3983.17, '2023-05-08 16:17:27'),
(55, 5.9, 24.5, 3983.17, '2023-05-08 16:17:32'),
(56, 5.9, 24.5, 3983.17, '2023-05-08 16:17:36'),
(57, 5.9, 24.5, 3983.17, '2023-05-08 16:17:41'),
(58, 24, 40, 499.63, '2023-05-08 16:22:26'),
(59, 24, 40, 499.63, '2023-05-08 16:23:09');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `info`
--
ALTER TABLE `info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
