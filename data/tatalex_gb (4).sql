-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 12 2020 г., 02:54
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tatalex_gb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_good` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `session_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_good`, `qty`, `session_id`) VALUES
(29, 3, 1, '4thsinu3sq9d3krkfnufqbm3shdfdso4'),
(30, 2, 3, '4thsinu3sq9d3krkfnufqbm3shdfdso4'),
(31, 4, 4, '4thsinu3sq9d3krkfnufqbm3shdfdso4'),
(33, 2, 1, '4gv3s5jv956uqn69rf19tj7iqass1tc8'),
(34, 3, 2, '4gv3s5jv956uqn69rf19tj7iqass1tc8'),
(36, 2, 2, '8l29aq5njh520abkctrvjgli127nf36u'),
(37, 1, 1, '8l29aq5njh520abkctrvjgli127nf36u'),
(38, 3, 3, 'vamj30vkapjd0jnovkehsjaoqklhmo8k'),
(39, 2, 4, 'vamj30vkapjd0jnovkehsjaoqklhmo8k'),
(40, 1, 2, 'vamj30vkapjd0jnovkehsjaoqklhmo8k'),
(41, 4, 2, 'eieajfadv614gvkm2fumcj5h95j4tvh0'),
(42, 3, 3, 'mkdjl59vblhct0821acq1s7lma9tm87k'),
(43, 4, 1, 'mkdjl59vblhct0821acq1s7lma9tm87k'),
(44, 4, 1, '2vuj33tcgoo82ce4jjdnpk6migoidqkl'),
(45, 2, 5, 'g59vq9lrquogq2ua3o35lo485an4eniq'),
(52, 3, 1, '3n40nosfndr3js5q1opjeethskachj7j'),
(53, 2, 1, '3n40nosfndr3js5q1opjeethskachj7j'),
(58, 3, 3, '02somsgtinkdotdghp7rbmdkruunfp2h'),
(59, 2, 2, '02somsgtinkdotdghp7rbmdkruunfp2h'),
(74, 2, 1, 'q8itkv4a47lh8j9maot8g7ru0hit3bth'),
(75, 3, 1, 'jlr4v07h58lnm6de31s81of1f0ndngee'),
(76, 4, 1, 'jlr4v07h58lnm6de31s81of1f0ndngee'),
(84, 3, 3, 'j5dd2a5r9o5svi267u106m9oimmac44n');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `feedback` text NOT NULL,
  `id_goods` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`, `id_goods`) VALUES
(1, 'Вася', 'Я первый', '1'),
(2, 'Петр', 'Все норм', '2'),
(138, 'Алексей ', 'супер', '2'),
(139, 'Иван', 'Привет', '1'),
(141, 'Алексей', 'Тест 1', '2'),
(146, 'Алексей', '123', ''),
(147, 'Алексей', '123', ''),
(187, 'Алексей ', '45546', '3'),
(190, 'Алексей', '123', '3'),
(193, 'Алексей ', '45546', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `views`) VALUES
(30, '01.jpg', 5),
(31, '02.jpg', 0),
(32, '03.jpg', 0),
(33, '04.jpg', 0),
(34, '05.jpg', 0),
(35, '06.jpg', 0),
(36, '07.jpg', 9),
(37, '08.jpg', 0),
(38, '09.jpg', 0),
(39, '10.jpg', 0),
(40, '11.jpg', 9),
(41, '12.jpg', 0),
(42, '13.jpg', 0),
(43, '14.jpg', 0),
(44, '15.jpg', 0),
(45, 'newImage.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `image`, `description`) VALUES
(1, 'Картина №1', 150, '01.jpg', 'Подробное описание Картины 1'),
(2, 'Картина №2', 100, '02.jpg', 'Подробное описание Картины 2'),
(3, 'Картина №3', 145, '03.jpg', 'Подробное описание картины 3'),
(4, 'Картина №4', 126, '04.jpg', 'Подробное описание картины 4');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `name`, `phone`, `status`) VALUES
(4, '8l29aq5njh520abkctrvjgli127nf36u', 'Иван', '909090909', 1),
(5, 'j5dd2a5r9o5svi267u106m9oimmac44n', 'Алексей ', '123123123', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hash` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$GcuyBCmU9ja9qoU3nbvsaeaHoP3/sV5tDgY759yEGmGzrS8CdMXVy', '3024459095e430b1e9559b2.68207953');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
