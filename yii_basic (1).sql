-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 28 2017 г., 14:52
-- Версия сервера: 10.1.28-MariaDB
-- Версия PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii_basic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1511776847),
('m171127_103446_create_user_table', 1511779026);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `auth_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `amount`, `auth_key`, `created_at`, `updated_at`) VALUES
(1, 'sadas', '321', 'Mcc6DXoKcUPI8uDOB04h7hQ-9WMhqwy3', 1511782735, 1511858741),
(2, 'rememberMe', '6', 'LfMkylg5rzX5BcY5_MK32uU0VDOye3oW', 1511782874, 1511789305),
(3, 'username', '8', 'xDRYnSJPHFg6UbLSt0Uk91XjVdqBLbtM', 1511782920, 1511791535),
(4, 'asdas', '0', '9A4wEJ4zxSZIqqNIrY53jPrVurMToSvt', 1511783281, 1511783281),
(5, 'rememberMe1', '6', '0i8aGGvm88bmj6NM8eWpuDRT0wfC53Nt', 1511783296, 1511789579),
(6, 'asd', '0', 'Ah8kXddBW_MdcU-Suegg8fgkf_fWGWev', 1511783457, 1511783457),
(11, 'asd222', '0', 'Qr-bijwqrwxzX2lRgaQ9K7Fy0APYu8w4', 1511786574, 1511786574),
(12, 'asd1', '526', 'APR6DcgCFDpLAONdjm-UQHHuPU26PxEM', 1511787957, 1511849626),
(13, 'asd3', '221', 'apgephbXY9FMhoX4955RX0TQoN9GBj5T', 1511787968, 1511849630),
(14, 'adas', '-836', '_AKrOEhNYVbpkwUxcX0mimwNMx7ffcXT', 1511848987, 1511849630),
(16, 'username22', '0', 'knrWDXh3qOka4AQIynZPrAwGmuFlJPVz', 1511858687, 1511858687),
(17, '334', '-244', 'UdZ8hPgEAOZcXkBe5kpGCMcUdFQ9cZKG', 1511858729, 1511858741),
(18, 'adsad', '0', '3lXppupSIwp6IijFQTPcFfl7pRBZDFkX', 1511860984, 1511860984),
(19, 'asd2', '0', 'U9yIf0fScnNi4fhy7GksqX2HsALYWq3_', 1511862095, 1511862095),
(20, 'admin', '0', 'nuoS7TS-qd6H756NOE5ws9vkkHPjc41e', 1511862349, 1511862349),
(21, 'admin22', '0', 'Cx3dsf0-3rDDCXShYzU_ESGAIrkJBkbK', 1511863249, 1511863249),
(22, 'admin222', '0', 'l5btrrfU-lFxDl_OX0QmkzlNcltm1Ip1', 1511863768, 1511863768),
(23, 'admin222222', '0', 'psAy1UrJd_hu_pR6BQgmZwv1xMN0Wwhd', 1511863880, 1511863880),
(24, 'admin22222', '0', 'otwvHgq4JY0amMJQ5tQcmmzJR-lNY_4F', 1511876447, 1511876447),
(25, 'admin2222112', '0', '5cz1oj_eK0MX0ex-X-Od-3YV6nLtb93k', 1511876655, 1511876655),
(26, 'admin2222112222222', '0', 'BjaMrPM1XhrnR7FiNfQa9l2-yz1dabDa', 1511877096, 1511877096);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
