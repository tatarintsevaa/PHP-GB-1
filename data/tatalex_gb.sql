-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 03 2020 г., 23:27
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
(44, 4, 1, '2vuj33tcgoo82ce4jjdnpk6migoidqkl');

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
(141, 'Алексей', 'Тест 1', '2');

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
(30, '01.jpg', 0),
(31, '02.jpg', 0),
(32, '03.jpg', 0),
(33, '04.jpg', 0),
(34, '05.jpg', 0),
(35, '06.jpg', 0),
(36, '07.jpg', 5),
(37, '08.jpg', 0),
(38, '09.jpg', 0),
(39, '10.jpg', 0),
(40, '11.jpg', 8),
(41, '12.jpg', 0),
(42, '13.jpg', 0),
(43, '14.jpg', 0),
(44, '15.jpg', 0),
(45, 'newImage.jpg', 0);

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
-- Структура таблицы `ordres`
--

CREATE TABLE `ordres` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `ordres`
--

INSERT INTO `ordres` (`id`, `session_id`, `name`, `phone`) VALUES
(4, '8l29aq5njh520abkctrvjgli127nf36u', 'Алексей', '123123'),
(9, 'vamj30vkapjd0jnovkehsjaoqklhmo8k', 'test3', '987987987'),
(10, '8l29aq5njh520abkctrvjgli127nf36u', 'Alexey', '123123123'),
(11, 'jusrj8f65h4u33bkel95tufick59uh13', 'Bdfy', '654654'),
(12, 'eieajfadv614gvkm2fumcj5h95j4tvh0', 'Alexey', '123123'),
(13, 'eji7sesaved1n92q3l1lmtq737f50i5g', 'Алексей', '12123'),
(14, 'tvobbjkropbod42cga1afq3tgdds522i', 'Alexey', '12321312'),
(15, 'mkdjl59vblhct0821acq1s7lma9tm87k', '123', '12312312'),
(16, 'mkdjl59vblhct0821acq1s7lma9tm87k', '123', '12312312'),
(17, 'mkdjl59vblhct0821acq1s7lma9tm87k', '123', '12312312'),
(18, 'mkdjl59vblhct0821acq1s7lma9tm87k', '123', '12312312'),
(19, 'mkdjl59vblhct0821acq1s7lma9tm87k', '123', '12312312'),
(20, 'mkdjl59vblhct0821acq1s7lma9tm87k', 'Алексей', '213123'),
(21, '2vuj33tcgoo82ce4jjdnpk6migoidqkl', 'Алексей', '234');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$9RdrvTsN7RaXh9YJBj2FeuRmx8nOkXYNTWjPRHbrDWPc8Lsxm2lie', 'admin');

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
-- Индексы таблицы `ordres`
--
ALTER TABLE `ordres`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

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
-- AUTO_INCREMENT для таблицы `ordres`
--
ALTER TABLE `ordres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
