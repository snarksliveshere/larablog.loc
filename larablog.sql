-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 12 2018 г., 19:40
-- Версия сервера: 5.7.20
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `larablog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'sdfsdf', 'sdfsdf', '2018-06-10 08:09:36', '2018-06-10 08:09:36');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(55, '2014_10_12_000000_create_users_table', 1),
(56, '2014_10_12_100000_create_password_resets_table', 1),
(57, '2018_05_19_155751_create_products_table', 1),
(58, '2018_05_26_124901_create_categories_table', 1),
(59, '2018_05_26_125421_create_tags_table', 1),
(60, '2018_05_26_125506_create_comments_table', 1),
(61, '2018_05_26_125513_create_posts_table', 1),
(62, '2018_05_26_125532_create_subscriptions_table', 1),
(63, '2018_05_26_130455_create_posts_tags_table', 1),
(64, '2018_05_27_115335_add_avatar_column__to_users', 1),
(65, '2018_05_27_124456_make_password_nullable', 1),
(66, '2018_05_27_151638_add_data_to_posts', 1),
(67, '2018_05_27_153650_add_userid_to_posts', 1),
(68, '2018_05_27_154532_add_image_to_posts', 1),
(69, '2018_05_30_184232_add_description_to_posts', 1),
(70, '2018_06_03_081323_create_orders_table', 1),
(71, '2018_06_04_102405_make_products_status_default', 2),
(72, '2018_06_04_102553_make_products_description_nullable', 3),
(73, '2018_06_05_105341_create_offers_table', 4),
(74, '2018_06_05_105746_create_offer_values_table', 5),
(75, '2018_06_05_110005_offer_products', 5),
(76, '2018_06_05_171606_add_slug_to_offers', 6),
(77, '2018_06_05_171621_add_slug_to_offer_values', 6),
(78, '2018_06_09_174930_create_offers_products_table', 7),
(79, '2018_06_10_103149_create_related_products_table', 8),
(80, '2018_06_10_103244_add_has_related_to_products', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `offers`
--

INSERT INTO `offers` (`id`, `created_at`, `updated_at`, `name`, `slug`) VALUES
(1, NULL, NULL, 'Обложка', 'oblojka'),
(3, NULL, '2018-06-07 16:39:02', 'Год публикации', 'published_years'),
(11, '2018-06-09 11:49:51', '2018-06-09 11:49:51', 'Количество страниц', 'kolichestvo-stranic');

-- --------------------------------------------------------

--
-- Структура таблицы `offers_products`
--

CREATE TABLE `offers_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `offer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `offer_value_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `offers_products`
--

INSERT INTO `offers_products` (`id`, `created_at`, `updated_at`, `offer_id`, `product_id`, `offer_value_id`) VALUES
(8, '2018-06-10 16:55:21', '2018-06-10 16:55:21', 3, 7, '14'),
(15, '2018-06-11 10:32:08', '2018-06-11 10:32:08', 11, 11, '21'),
(17, '2018-06-11 10:32:44', '2018-06-11 10:32:44', 11, 12, '21'),
(19, '2018-06-11 10:34:43', '2018-06-11 10:34:43', 11, 13, '21'),
(21, '2018-06-12 06:52:28', '2018-06-12 06:52:28', 1, 9, '26'),
(22, '2018-06-12 06:52:28', '2018-06-12 06:52:28', 3, 9, '12'),
(23, '2018-06-12 06:52:28', '2018-06-12 06:52:28', 11, 9, '22');

-- --------------------------------------------------------

--
-- Структура таблицы `offer_values`
--

CREATE TABLE `offer_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `offer_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `offer_values`
--

INSERT INTO `offer_values` (`id`, `created_at`, `updated_at`, `offer_id`, `value`, `slug`) VALUES
(12, '2018-06-09 11:19:31', '2018-06-09 11:19:31', 3, '1995', '1995'),
(14, '2018-06-09 11:19:31', '2018-06-09 11:19:31', 3, '2001', '2001'),
(15, '2018-06-09 11:19:31', '2018-06-09 11:19:31', 3, '2004', '2004'),
(19, '2018-06-09 11:49:51', '2018-06-09 11:49:51', 11, '100', '100'),
(20, '2018-06-09 11:49:51', '2018-06-09 11:49:51', 11, '150', '150'),
(21, '2018-06-09 11:49:51', '2018-06-09 11:49:51', 11, '350', '350'),
(22, '2018-06-09 11:49:51', '2018-06-09 11:49:51', 11, '400', '400'),
(23, '2018-06-11 06:10:06', '2018-06-11 09:52:14', 1, 'Мягчайшая', 'myagkaya'),
(25, '2018-06-11 06:10:06', '2018-06-11 06:10:06', 1, 'супер', 'super'),
(26, '2018-06-11 06:10:06', '2018-06-11 06:10:06', 1, 'потрепанная', 'potrepannaya'),
(30, '2018-06-11 09:13:47', '2018-06-11 09:51:48', 1, 'твердая', 'potrepannaya2');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `is_featured` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `category_id`, `status`, `views`, `is_featured`, `created_at`, `updated_at`, `date`, `user_id`, `image`, `description`) VALUES
(1, 'Quidem rerum rerum quia alias voluptatem ducimus sunt.', 'quidem-rerum-rerum-quia-alias-voluptatem-ducimus-sunt', 'Exercitationem impedit repudiandae eveniet id.', 1, 1, 3287, 0, '2018-06-04 03:15:11', '2018-06-04 03:15:11', '2017-09-08', 1, 'ins-7.jpg', NULL),
(2, 'Corporis in porro consequuntur deserunt pariatur.', 'corporis-in-porro-consequuntur-deserunt-pariatur', 'Autem et magnam reiciendis impedit quis aut.', 1, 1, 1443, 0, '2018-06-04 03:15:11', '2018-06-04 03:15:11', '2017-09-08', 1, 'ins-7.jpg', NULL),
(3, 'Tempora provident dolores sunt ea perferendis minima.', 'tempora-provident-dolores-sunt-ea-perferendis-minima', 'Minima quas earum explicabo quo labore et consequatur.', 1, 1, 148, 0, '2018-06-04 03:15:11', '2018-06-04 03:15:11', '2017-09-08', 1, 'ins-7.jpg', NULL),
(4, 'Quae unde et alias placeat excepturi tempora.', 'quae-unde-et-alias-placeat-excepturi-tempora', 'Atque dolores totam voluptas autem omnis quibusdam explicabo aperiam.', 1, 1, 2908, 0, '2018-06-04 03:15:11', '2018-06-04 03:15:11', '2017-09-08', 1, 'ins-7.jpg', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `post_tags`
--

CREATE TABLE `post_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imagePath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `hasRelated` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `user_id`, `created_at`, `updated_at`, `imagePath`, `title`, `slug`, `description`, `content`, `status`, `price`, `hasRelated`) VALUES
(1, 1, '2018-06-04 03:14:10', '2018-06-11 16:51:01', 'mockingbird.jpg', 'Убить пересмешника', 'kill-mocking-bird', '<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>', '<p>Content</p>', '1', 600, 0),
(2, 1, '2018-06-04 03:14:10', '2018-06-10 16:55:21', 'liedown.jpg', 'Lie Down in Darkness', 'liedown-darkness', 'Lie Down in Darkness is a novel by American novelist William Styron published in 1951. It was his first novel, written when he was 26 years old, and received a great deal of critical acclaim.', 'Content', '1', 500, 1),
(3, 1, '2018-06-04 03:14:10', '2018-06-12 06:40:44', 'James_Herriot__All_Things_Wise_and_Wonderful.jpg', 'All_Things_Wise_and_Wonderful', 'herriot', '“Surely no one can read Herriot without gaining a new and compassionate insight into All Things Wise and Wonderful in the world around him. A grand book.', 'Content', '1', 800, 1),
(4, 4, '2018-06-04 07:26:47', '2018-06-04 08:39:02', 'ikIvzB3xgb.jpeg', 'sdfsdfaasd', 'sdfsdf', 'sfsdfыв', 'sdfsfs\r\n              asdasв', '0', 45555, 0),
(5, 4, '2018-06-04 07:27:07', '2018-06-04 08:42:47', 'MEbE6XIc3q.jpeg', 'sdfsdf', 'sdfsdf-1', 'sdfsdf', 'sdfsdfs', '1', 12313, 0),
(6, 4, '2018-06-04 07:36:06', '2018-06-04 08:40:43', 'iJ7aFyrg16.jpeg', 'test-image', 'sdfsf', 'sdfsf', 'sdfsdf', '0', 32, 0),
(8, 4, '2018-06-04 08:43:16', '2018-06-04 08:43:16', 'TdcsieJf9q.png', 'test2', 'test2', 'ляляля', 'много раз ляляля', '1', 45645, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `related_products`
--

CREATE TABLE `related_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imagePath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `related_products`
--

INSERT INTO `related_products` (`id`, `created_at`, `updated_at`, `imagePath`, `title`, `slug`, `description`, `content`, `status`, `parent_id`, `price`) VALUES
(7, '2018-06-10 16:55:21', '2018-06-10 16:55:21', NULL, 'Раритетное издание', 'raritetnoe-izdanie', '<p>Является раритеным изданием</p>', '<p>Очень редкая книга</p>', 1, 2, 1500),
(8, '2018-06-12 06:40:44', '2018-06-12 06:40:44', NULL, 'test shit', 'test-shit', NULL, NULL, 0, 3, 123),
(9, '2018-06-12 06:52:28', '2018-06-12 06:52:28', NULL, 'Потрепанное издание', 'potrepannoe-izdanie', '<p>Lie Down in Darkness is a novel by American novelist William Styron published in 1951. It was his first novel, written when he was 26 years old, and received a great deal of critical acclaim.</p>', '<p>Потрепанная обложна - контент</p>', 0, 2, 300);

-- --------------------------------------------------------

--
-- Структура таблицы `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `status`, `remember_token`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'Mr. Caden Fritsch', 'wwaelchi@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 0, 'fNF69GxR5L', '2018-06-04 03:18:54', '2018-06-04 03:18:54', NULL),
(2, 'Mathilde Jakubowski', 'lewis27@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 0, 'UGUTuTWvLU', '2018-06-04 03:18:54', '2018-06-04 03:18:54', NULL),
(3, 'Miss Kaia Christiansen V', 'oschumm@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 0, 'a3VFBKiRGp', '2018-06-04 03:18:54', '2018-06-04 03:18:54', NULL),
(4, 'admin', 'admin@admin.com', '$2y$10$TEXzRKM93yu8LW9yxDm8hOwFXyPnIpCzt1s568B9klexhcS0YuxRG', 1, 0, 'NTl6rPmQVbKb3qy6BSINTHtscM2ueXXurrnP1hbqe5eb5IcCY82oftz9wGjB', '2018-06-04 03:19:40', '2018-06-04 03:19:41', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `offers_products`
--
ALTER TABLE `offers_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `offer_values`
--
ALTER TABLE `offer_values`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `related_products`
--
ALTER TABLE `related_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `offers_products`
--
ALTER TABLE `offers_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `offer_values`
--
ALTER TABLE `offer_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `related_products`
--
ALTER TABLE `related_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
