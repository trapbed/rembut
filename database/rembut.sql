-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 22 2025 г., 13:51
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rembut`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `exemplar_id` bigint UNSIGNED NOT NULL,
  `type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `product_id`, `exemplar_id`, `type`, `date`, `place`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 'Не греется, соответственно не гладит', '2025-01-22 09:39:12', 'Уфа, Рихарда Зорге 18', '2025-01-22 08:39:12', '2025-01-22 08:39:12'),
(2, 1, 1, 3, 'Не греется, соответственно не гладит', '2025-01-22 09:39:12', 'Уфа, Рихарда Зорге 18', '2025-01-22 08:39:12', '2025-01-22 08:39:12'),
(3, 1, 1, 3, 'Не греется, соответственно не гладит', '2025-01-22 09:39:12', 'Уфа, Рихарда Зорге 18', '2025-01-22 08:39:12', '2025-01-22 08:39:12'),
(4, 1, 1, 3, 'Не греется, соответственно не гладит', '2025-01-22 09:39:12', 'Уфа, Рихарда Зорге 18', '2025-01-22 08:39:12', '2025-01-22 08:39:12');

-- --------------------------------------------------------

--
-- Структура таблицы `exemplars`
--

CREATE TABLE `exemplars` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `exemplars`
--

INSERT INTO `exemplars` (`id`, `name`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Все', NULL, '', '2025-01-16 10:11:32', '2025-01-16 10:11:32'),
(2, 'LG', 3, '', '2025-01-16 10:15:08', '2025-01-16 10:15:08'),
(3, 'Xiaomi', 1, '', '2025-01-16 10:15:08', '2025-01-16 10:15:08'),
(6, 'Bosch', 4, '', '2025-01-16 10:16:08', '2025-01-16 10:16:08'),
(7, 'Smeg', 4, '', '2025-01-16 10:16:08', '2025-01-16 10:16:08'),
(8, 'Smeg', 2, 'washing_machine_smeg.png', '2025-01-16 10:18:46', '2025-01-16 10:18:46'),
(9, 'Smeg', 1, '', '2025-01-16 10:18:46', '2025-01-16 10:18:46'),
(10, 'Samsung', 2, 'washing_machine_samsung.png', '2025-01-22 11:59:29', '2025-01-22 12:00:00'),
(11, 'Siemens', 2, 'washing_machine_siemens.png', '2025-01-22 12:01:05', '2025-01-22 12:01:05');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2025_01_16_073607_create_products_table', 1),
(4, '2025_01_16_073615_create_exemplar_table', 1),
(5, '2025_01_17_071820_create_spares_table', 1),
(6, '2025_01_18_071742_create_applications_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Утюги', 'iron.png', '2025-01-16 10:13:46', '2025-01-16 10:13:46'),
(2, 'Стиральные машины', 'washing_machine.png', '2025-01-16 10:13:46', '2025-01-16 10:13:46'),
(3, 'Микроволновки', 'microwave.png', '2025-01-16 10:14:16', '2025-01-16 10:14:16'),
(4, 'Холодильники', 'fridge.png', '2025-01-16 10:14:16', '2025-01-16 10:14:16');

-- --------------------------------------------------------

--
-- Структура таблицы `spares`
--

CREATE TABLE `spares` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint UNSIGNED NOT NULL,
  `manafacturer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exemplar_id` bigint UNSIGNED NOT NULL,
  `weight` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `spares`
--

INSERT INTO `spares` (`id`, `name`, `amount`, `manafacturer`, `exemplar_id`, `weight`, `created_at`, `updated_at`) VALUES
(1, 'Шурупы', 120, 'Simple Manufacturer', 1, '0.05', '2025-01-16 10:12:05', '2025-01-16 10:12:05'),
(2, 'Фум-лента', 30, 'Simple Manufacturer', 1, '30.00', '2025-01-16 10:12:52', '2025-01-16 10:12:52');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@mail.ru', NULL, 'useruser', NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_user_id_foreign` (`user_id`),
  ADD KEY `applications_product_id_foreign` (`product_id`),
  ADD KEY `applications_exemplar_id_foreign` (`exemplar_id`);

--
-- Индексы таблицы `exemplars`
--
ALTER TABLE `exemplars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exemplars_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `spares`
--
ALTER TABLE `spares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spares_exemplar_id_foreign` (`exemplar_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `exemplars`
--
ALTER TABLE `exemplars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `spares`
--
ALTER TABLE `spares`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_exemplar_id_foreign` FOREIGN KEY (`exemplar_id`) REFERENCES `exemplars` (`id`),
  ADD CONSTRAINT `applications_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `exemplars`
--
ALTER TABLE `exemplars`
  ADD CONSTRAINT `exemplars_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `spares`
--
ALTER TABLE `spares`
  ADD CONSTRAINT `spares_exemplar_id_foreign` FOREIGN KEY (`exemplar_id`) REFERENCES `exemplars` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
