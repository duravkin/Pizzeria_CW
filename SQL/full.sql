-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 16 2023 г., 17:37
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `web1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `drink`
--

CREATE TABLE `drink` (
  `id_drink` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `item_in_cart`
--

CREATE TABLE `item_in_cart` (
  `id_item_in_cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pizza`
--

CREATE TABLE `pizza` (
  `id_pizza` int(11) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `pizza`
--

INSERT INTO `pizza` (`id_pizza`, `title`, `size`, `price`) VALUES
(1, 'Margarite', 45, 299.9),
(2, '?????????', 45, 499.9),
(3, '?????? ????', 35, 399.9),
(4, '????????', 35, 399.9),
(5, '????????', 45, 449.9),
(6, '????', 55, 749.9),
(7, 'Mix', 45, 599.9),
(9, '4_сыра', 30, 200);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `home` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `surname`, `name`, `city`, `street`, `home`) VALUES
(1, 'Дуравкин', 'Артём', 'Белгород', 'Студенческая', '14'),
(2, 'Иванов', 'Иван', 'Белгород', 'Некрасова', '18/1'),
(3, 'Алексеев', 'Иван', 'Воронеж', 'Ленина', '1б'),
(4, 'Петров', 'Пётр', 'Воронеж', 'Садовая', '100'),
(5, 'Иванов', 'Михаил', 'Белгород', 'Некрасова', '18/2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Индексы таблицы `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`id_drink`);

--
-- Индексы таблицы `item_in_cart`
--
ALTER TABLE `item_in_cart`
  ADD PRIMARY KEY (`id_item_in_cart`);

--
-- Индексы таблицы `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id_pizza`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
