-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 06 2022 г., 08:40
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yiitest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `addurl`
--

CREATE TABLE `addurl` (
  `id` int NOT NULL,
  `url_name` text,
  `url_new_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `addurl`
--

INSERT INTO `addurl` (`id`, `url_name`, `url_new_name`) VALUES
(1, 'https://docs.google.com/document/d/1iqu82SKCKdkdxyTTQN8v6Y7Myb7oJTemeNXE7ZgPU9A/edit', 'http://chat.class-mst.keenetic.pro/0ef76bcc69cd1e98fb7f76719da5a4bc'),
(12, 'http://cccp-blog.com/koding/php-uznat-ip-adres?ysclid=l58x5jkcej283705375', 'http://chat.class-mst.keenetic.pro/481d41fb2be9f82aa685ab0abbc188af'),
(13, 'https://yandex.ru/', 'http://chat.class-mst.keenetic.pro/30b7df27e9f842b33cf9e517c98a075e');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1656996407),
('m130524_201442_init', 1656996414),
('m190124_110200_add_verification_token_column_to_user_table', 1656996414),
('m220705_165139_create_addurl_table', 1657040156),
('m220705_165657_create_urlget_table', 1657040415),
('m220706_012121_create_urlget_table', 1657070725);

-- --------------------------------------------------------

--
-- Структура таблицы `urlget`
--

CREATE TABLE `urlget` (
  `id` int NOT NULL,
  `url_name` text,
  `date` datetime DEFAULT NULL,
  `ip` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `urlget`
--

INSERT INTO `urlget` (`id`, `url_name`, `date`, `ip`) VALUES
(1, 'https://docs.google.com/document/d/1iqu82SKCKdkdxyTTQN8v6Y7Myb7oJTemeNXE7ZgPU9A/edit', '2022-07-06 00:00:00', NULL),
(2, 'https://docs.google.com/document/d/1iqu82SKCKdkdxyTTQN8v6Y7Myb7oJTemeNXE7ZgPU9A/edit', '2022-07-06 00:00:00', NULL),
(3, 'http://cccp-blog.com/koding/php-uznat-ip-adres?ysclid=l58x5jkcej283705375', '2022-07-06 00:00:00', NULL),
(4, 'http://cccp-blog.com/koding/php-uznat-ip-adres?ysclid=l58x5jkcej283705375', '2022-07-06 00:00:00', NULL),
(5, 'http://cccp-blog.com/koding/php-uznat-ip-adres?ysclid=l58x5jkcej283705375', '2022-07-06 00:00:00', NULL),
(6, 'http://cccp-blog.com/koding/php-uznat-ip-adres?ysclid=l58x5jkcej283705375', '2022-05-05 00:00:00', NULL),
(7, 'http://cccp-blog.com/koding/php-uznat-ip-adres?ysclid=l58x5jkcej283705375', '2022-05-05 00:00:00', NULL),
(8, 'http://cccp-blog.com/koding/php-uznat-ip-adres?ysclid=l58x5jkcej283705375', '2022-04-04 00:00:00', NULL),
(9, 'https://docs.google.com/document/d/1iqu82SKCKdkdxyTTQN8v6Y7Myb7oJTemeNXE7ZgPU9A/edit', '2022-04-04 00:00:00', NULL),
(10, 'https://docs.google.com/document/d/1iqu82SKCKdkdxyTTQN8v6Y7Myb7oJTemeNXE7ZgPU9A/edit', '2022-04-04 00:00:00', NULL),
(11, 'https://yandex.ru/', '2022-07-06 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `addurl`
--
ALTER TABLE `addurl`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `urlget`
--
ALTER TABLE `urlget`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `addurl`
--
ALTER TABLE `addurl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `urlget`
--
ALTER TABLE `urlget`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
