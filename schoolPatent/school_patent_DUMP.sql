-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 08 2023 г., 16:33
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
-- База данных: `school_patent`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adresses`
--

CREATE TABLE `adresses` (
  `id` int NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `street` text NOT NULL,
  `house` text NOT NULL,
  `apartment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `adresses`
--

INSERT INTO `adresses` (`id`, `country`, `city`, `street`, `house`, `apartment`) VALUES
(2, 'Россия', 'Москва', 'Льва', '17', '31');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `id_address` int NOT NULL,
  `number` int NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `full_title` text NOT NULL,
  `snils` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `id_address`, `number`, `first_name`, `last_name`, `middle_name`, `full_title`, `snils`) VALUES
(1, 2, 12314, 'Андрей', 'Алексеев', '', '', ''),
(2, 2, 12314, 'Георгий', 'Леваков', '', '', ''),
(3, 2, 13123, 'Олег', 'Ватутин', '', '', ''),
(4, 2, 13123, 'Олег', 'Ватутин', '', '', ''),
(5, 2, 13123, 'Олег', 'Ватутин', '', '', ''),
(6, 2, 13123, 'Олег', 'Ватутин', '', '', ''),
(7, 2, 13123, 'Олег', 'Ватутин', '', '', ''),
(8, 2, 13123, 'Олег', 'Ватутин', '', '', ''),
(9, 2, 13123, 'Олег', 'Ватутин', '', '', ''),
(10, 2, 13123, 'Олег', 'Ватутин', '', '', ''),
(11, 2, 13123, 'Олег', 'Ватутин', '', '', ''),
(12, 2, 13123, 'Олег', 'Ватутин', '', '', ''),
(13, 2, 13123, 'Олег', 'Ватутин', '', '', ''),
(14, 2, 13123, 'Олег', 'Ватутин', '', '', ''),
(15, 2, 13123, 'Олег', 'Ватутин', '', '', ''),
(16, 2, 13123, 'Олег', 'Ватутин', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `patents`
--

CREATE TABLE `patents` (
  `id` int NOT NULL,
  `id_participant` int NOT NULL,
  `id_representative` int NOT NULL,
  `presentation_link` text NOT NULL,
  `annotation` text NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `patents`
--

INSERT INTO `patents` (`id`, `id_participant`, `id_representative`, `presentation_link`, `annotation`, `accepted`) VALUES
(1, 1, 2, '', '', 0),
(2, 1, 1, '', '', 0),
(3, 1, 1, '', '', 1),
(4, 1, 1, '', '', 0),
(5, 1, 1, '', '', 0),
(6, 10, 4, '', '', 0),
(7, 10, 4, '', '', 0),
(8, 10, 4, '', '', 0),
(9, 10, 4, '', '', 1),
(10, 10, 4, '', '', 0),
(11, 10, 4, '', '', 0),
(12, 10, 4, '', '', 0),
(13, 10, 4, '', '', 0),
(14, 10, 4, '', '', 0),
(15, 10, 4, '', '', 0),
(16, 10, 4, '', '', 0),
(17, 10, 4, '', '', 0),
(18, 10, 4, '', '', 0),
(19, 10, 4, '', '', 0),
(20, 10, 4, '', '', 0),
(21, 10, 4, '', '', 0),
(22, 10, 4, '', '', 0),
(23, 10, 4, '', '', 0),
(24, 10, 4, '', '', 0),
(25, 10, 4, '', '', 0),
(26, 10, 4, '', '', 0),
(27, 10, 4, '', '', 0),
(28, 10, 4, '', '', 0),
(29, 10, 4, '', '', 1),
(30, 10, 4, '', '', 0),
(31, 10, 4, '', '', 0),
(32, 10, 4, '', '', 0),
(33, 10, 4, '', '', 0),
(34, 10, 4, '', '', 0),
(35, 10, 4, '', '', 0),
(36, 10, 4, '', '', 0),
(37, 10, 4, '', '', 0),
(38, 10, 4, '', '', 0),
(39, 10, 4, '', '', 0),
(40, 10, 4, '', '', 0),
(41, 10, 4, '', '', 0),
(42, 10, 4, '', '', 0),
(43, 10, 4, '', '', 0),
(44, 10, 4, '', '', 1),
(45, 10, 4, '', '', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_address` (`id_address`);

--
-- Индексы таблицы `patents`
--
ALTER TABLE `patents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_contact` (`id_representative`,`id_participant`),
  ADD KEY `id_participant` (`id_participant`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `patents`
--
ALTER TABLE `patents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`id_address`) REFERENCES `adresses` (`id`);

--
-- Ограничения внешнего ключа таблицы `patents`
--
ALTER TABLE `patents`
  ADD CONSTRAINT `patents_ibfk_1` FOREIGN KEY (`id_participant`) REFERENCES `contacts` (`id`),
  ADD CONSTRAINT `patents_ibfk_2` FOREIGN KEY (`id_representative`) REFERENCES `contacts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
