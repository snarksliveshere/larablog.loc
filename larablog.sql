-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 23 2018 г., 19:53
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

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
(1, 'Первая постовая категория', 'sdfsdf', '2018-06-10 08:09:36', '2018-06-23 09:51:35'),
(2, 'Вторая постовая категория', 'vtoraya-postovaya-kategoriya', '2018-06-23 09:51:47', '2018-06-23 09:51:47');

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
(80, '2018_06_10_103244_add_has_related_to_products', 8),
(81, '2018_06_16_134451_create_product_categories_table', 9),
(82, '2018_06_16_135511_add_category_to_product', 10),
(83, '2018_06_16_162154_add_email_phone_status_to_orders', 11);

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
(23, '2018-06-12 06:52:28', '2018-06-12 06:52:28', 11, 9, '22'),
(24, '2018-06-14 14:05:50', '2018-06-14 14:05:50', 1, 10, '23'),
(25, '2018-06-14 14:05:50', '2018-06-14 14:05:50', 3, 10, '12'),
(26, '2018-06-14 14:08:17', '2018-06-14 14:08:17', 1, 11, '23');

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
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `user_id`, `cart`, `address`, `name`, `payment_id`, `email`, `phone`, `status`) VALUES
(1, '2018-06-16 06:32:39', '2018-06-16 14:45:03', 5, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:1;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:600;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:12:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-11 19:51:01\";s:9:\"imagePath\";s:15:\"mockingbird.jpg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;}s:11:\"\0*\0original\";a:12:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-11 19:51:01\";s:9:\"imagePath\";s:15:\"mockingbird.jpg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:600;}', 'test_address', 'test_order3', NULL, 'test@test.test', '23423424', 1),
(3, '2018-06-16 13:38:48', '2018-06-16 13:38:48', 4, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:2;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:500;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:2;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:48:25\";s:9:\"imagePath\";s:22:\"/images/product/2.jpeg\";s:5:\"title\";s:20:\"Lie Down in Darkness\";s:4:\"slug\";s:16:\"liedown-darkness\";s:11:\"description\";s:198:\"<p>Lie Down in Darkness is a novel by American novelist William Styron published in 1951. It was his first novel, written when he was 26 years old, and received a great deal of critical acclaim.</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:500;s:10:\"hasRelated\";i:1;s:11:\"category_id\";s:1:\"2\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:2;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:48:25\";s:9:\"imagePath\";s:22:\"/images/product/2.jpeg\";s:5:\"title\";s:20:\"Lie Down in Darkness\";s:4:\"slug\";s:16:\"liedown-darkness\";s:11:\"description\";s:198:\"<p>Lie Down in Darkness is a novel by American novelist William Styron published in 1951. It was his first novel, written when he was 26 years old, and received a great deal of critical acclaim.</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:500;s:10:\"hasRelated\";i:1;s:11:\"category_id\";s:1:\"2\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:500;}', 'кукаываыва', 'admin', NULL, 'admin@admin.com', '23423423', 0),
(4, '2018-06-16 14:25:17', '2018-06-16 14:35:49', 4, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:3:{i:1;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:600;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}i:2;a:3:{s:3:\"qty\";i:3;s:5:\"price\";i:1500;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:2;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:48:25\";s:9:\"imagePath\";s:22:\"/images/product/2.jpeg\";s:5:\"title\";s:20:\"Lie Down in Darkness\";s:4:\"slug\";s:16:\"liedown-darkness\";s:11:\"description\";s:198:\"<p>Lie Down in Darkness is a novel by American novelist William Styron published in 1951. It was his first novel, written when he was 26 years old, and received a great deal of critical acclaim.</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:500;s:10:\"hasRelated\";i:1;s:11:\"category_id\";s:1:\"2\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:2;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:48:25\";s:9:\"imagePath\";s:22:\"/images/product/2.jpeg\";s:5:\"title\";s:20:\"Lie Down in Darkness\";s:4:\"slug\";s:16:\"liedown-darkness\";s:11:\"description\";s:198:\"<p>Lie Down in Darkness is a novel by American novelist William Styron published in 1951. It was his first novel, written when he was 26 years old, and received a great deal of critical acclaim.</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:500;s:10:\"hasRelated\";i:1;s:11:\"category_id\";s:1:\"2\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}i:3;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:800;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:3;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:48:34\";s:9:\"imagePath\";s:22:\"/images/product/3.jpeg\";s:5:\"title\";s:29:\"All_Things_Wise_and_Wonderful\";s:4:\"slug\";s:7:\"herriot\";s:11:\"description\";s:166:\"<p>&ldquo;Surely no one can read Herriot without gaining a new and compassionate insight into All Things Wise and Wonderful in the world around him. A grand book.</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:800;s:10:\"hasRelated\";i:1;s:11:\"category_id\";s:1:\"2\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:3;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:48:34\";s:9:\"imagePath\";s:22:\"/images/product/3.jpeg\";s:5:\"title\";s:29:\"All_Things_Wise_and_Wonderful\";s:4:\"slug\";s:7:\"herriot\";s:11:\"description\";s:166:\"<p>&ldquo;Surely no one can read Herriot without gaining a new and compassionate insight into All Things Wise and Wonderful in the world around him. A grand book.</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:800;s:10:\"hasRelated\";i:1;s:11:\"category_id\";s:1:\"2\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:5;s:10:\"totalPrice\";i:2900;}', 'ааааааа', 'admin', NULL, 'admin@admin.com', '4545444', 1),
(5, '2018-06-17 04:48:16', '2018-06-17 04:48:16', 4, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:4:{i:7;a:5:{s:3:\"qty\";i:1;s:5:\"price\";i:1500;s:4:\"item\";O:18:\"App\\RelatedProduct\":26:{s:11:\"\0*\0fillable\";a:6:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";i:5;s:9:\"parent_id\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:7;s:10:\"created_at\";s:19:\"2018-06-10 19:55:21\";s:10:\"updated_at\";s:19:\"2018-06-16 15:49:07\";s:9:\"imagePath\";s:29:\"/images/relatedproduct/7.jpeg\";s:5:\"title\";s:35:\"Раритетное издание\";s:4:\"slug\";s:18:\"raritetnoe-izdanie\";s:11:\"description\";s:59:\"<p>Является раритеным изданием</p>\";s:7:\"content\";s:41:\"<p>Очень редкая книга</p>\";s:6:\"status\";i:1;s:9:\"parent_id\";i:2;s:5:\"price\";i:1500;}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:7;s:10:\"created_at\";s:19:\"2018-06-10 19:55:21\";s:10:\"updated_at\";s:19:\"2018-06-16 15:49:07\";s:9:\"imagePath\";s:29:\"/images/relatedproduct/7.jpeg\";s:5:\"title\";s:35:\"Раритетное издание\";s:4:\"slug\";s:18:\"raritetnoe-izdanie\";s:11:\"description\";s:59:\"<p>Является раритеным изданием</p>\";s:7:\"content\";s:41:\"<p>Очень редкая книга</p>\";s:6:\"status\";i:1;s:9:\"parent_id\";i:2;s:5:\"price\";i:1500;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:9:\"parent_id\";i:2;s:12:\"parent_title\";s:20:\"Lie Down in Darkness\";}i:1;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:600;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}i:2;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:500;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:2;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:48:25\";s:9:\"imagePath\";s:22:\"/images/product/2.jpeg\";s:5:\"title\";s:20:\"Lie Down in Darkness\";s:4:\"slug\";s:16:\"liedown-darkness\";s:11:\"description\";s:198:\"<p>Lie Down in Darkness is a novel by American novelist William Styron published in 1951. It was his first novel, written when he was 26 years old, and received a great deal of critical acclaim.</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:500;s:10:\"hasRelated\";i:1;s:11:\"category_id\";s:1:\"2\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:2;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:48:25\";s:9:\"imagePath\";s:22:\"/images/product/2.jpeg\";s:5:\"title\";s:20:\"Lie Down in Darkness\";s:4:\"slug\";s:16:\"liedown-darkness\";s:11:\"description\";s:198:\"<p>Lie Down in Darkness is a novel by American novelist William Styron published in 1951. It was his first novel, written when he was 26 years old, and received a great deal of critical acclaim.</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:500;s:10:\"hasRelated\";i:1;s:11:\"category_id\";s:1:\"2\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}i:11;a:5:{s:3:\"qty\";i:1;s:5:\"price\";i:120;s:4:\"item\";O:18:\"App\\RelatedProduct\":26:{s:11:\"\0*\0fillable\";a:6:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";i:5;s:9:\"parent_id\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:11;s:10:\"created_at\";s:19:\"2018-06-14 17:08:17\";s:10:\"updated_at\";s:19:\"2018-06-14 17:08:17\";s:9:\"imagePath\";N;s:5:\"title\";s:12:\"ляляля\";s:4:\"slug\";s:9:\"lyalyalya\";s:11:\"description\";N;s:7:\"content\";N;s:6:\"status\";i:1;s:9:\"parent_id\";i:2;s:5:\"price\";i:120;}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:11;s:10:\"created_at\";s:19:\"2018-06-14 17:08:17\";s:10:\"updated_at\";s:19:\"2018-06-14 17:08:17\";s:9:\"imagePath\";N;s:5:\"title\";s:12:\"ляляля\";s:4:\"slug\";s:9:\"lyalyalya\";s:11:\"description\";N;s:7:\"content\";N;s:6:\"status\";i:1;s:9:\"parent_id\";i:2;s:5:\"price\";i:120;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:9:\"parent_id\";i:2;s:12:\"parent_title\";s:20:\"Lie Down in Darkness\";}}s:8:\"totalQty\";i:4;s:10:\"totalPrice\";i:2720;}', 'oalal', 'admin', NULL, 'admin@admin.com', '777', 0),
(6, '2018-06-17 05:56:29', '2018-06-17 05:56:29', 4, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:2:{i:2;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:500;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:2;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:48:25\";s:9:\"imagePath\";s:22:\"/images/product/2.jpeg\";s:5:\"title\";s:20:\"Lie Down in Darkness\";s:4:\"slug\";s:16:\"liedown-darkness\";s:11:\"description\";s:198:\"<p>Lie Down in Darkness is a novel by American novelist William Styron published in 1951. It was his first novel, written when he was 26 years old, and received a great deal of critical acclaim.</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:500;s:10:\"hasRelated\";i:1;s:11:\"category_id\";s:1:\"2\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:2;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:48:25\";s:9:\"imagePath\";s:22:\"/images/product/2.jpeg\";s:5:\"title\";s:20:\"Lie Down in Darkness\";s:4:\"slug\";s:16:\"liedown-darkness\";s:11:\"description\";s:198:\"<p>Lie Down in Darkness is a novel by American novelist William Styron published in 1951. It was his first novel, written when he was 26 years old, and received a great deal of critical acclaim.</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:500;s:10:\"hasRelated\";i:1;s:11:\"category_id\";s:1:\"2\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}i:1;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:600;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:2;s:10:\"totalPrice\";i:1100;}', 'dasdassd', 'admin', NULL, 'aasdsadasdn@admin.com', 'adada', 0),
(7, '2018-06-17 05:57:24', '2018-06-17 05:57:24', 4, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:1;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:600;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:600;}', 'sdfsdf', 'admin', NULL, 'admin@admin.com', 'sdfs', 0),
(8, '2018-06-17 05:58:19', '2018-06-17 05:58:19', 4, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:1;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:600;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:600;}', '333', 'admin', NULL, 'ad3333min@admin.com', '333', 0),
(9, '2018-06-17 09:44:55', '2018-06-17 09:44:55', 4, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:2:{i:7;a:5:{s:3:\"qty\";i:3;s:5:\"price\";i:4500;s:4:\"item\";O:18:\"App\\RelatedProduct\":26:{s:11:\"\0*\0fillable\";a:6:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";i:5;s:9:\"parent_id\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:7;s:10:\"created_at\";s:19:\"2018-06-10 19:55:21\";s:10:\"updated_at\";s:19:\"2018-06-16 15:49:07\";s:9:\"imagePath\";s:29:\"/images/relatedproduct/7.jpeg\";s:5:\"title\";s:35:\"Раритетное издание\";s:4:\"slug\";s:18:\"raritetnoe-izdanie\";s:11:\"description\";s:59:\"<p>Является раритеным изданием</p>\";s:7:\"content\";s:41:\"<p>Очень редкая книга</p>\";s:6:\"status\";i:1;s:9:\"parent_id\";i:2;s:5:\"price\";i:1500;}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:7;s:10:\"created_at\";s:19:\"2018-06-10 19:55:21\";s:10:\"updated_at\";s:19:\"2018-06-16 15:49:07\";s:9:\"imagePath\";s:29:\"/images/relatedproduct/7.jpeg\";s:5:\"title\";s:35:\"Раритетное издание\";s:4:\"slug\";s:18:\"raritetnoe-izdanie\";s:11:\"description\";s:59:\"<p>Является раритеным изданием</p>\";s:7:\"content\";s:41:\"<p>Очень редкая книга</p>\";s:6:\"status\";i:1;s:9:\"parent_id\";i:2;s:5:\"price\";i:1500;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:9:\"parent_id\";i:2;s:12:\"parent_title\";s:20:\"Lie Down in Darkness\";}i:1;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:600;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:4;s:10:\"totalPrice\";i:5100;}', 'qweqewwqe', 'admin', NULL, 'admin@admin.com', 'qwewqewqe', 0),
(10, '2018-06-17 09:47:47', '2018-06-17 09:47:47', 4, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:7;a:5:{s:3:\"qty\";i:1;s:5:\"price\";i:1500;s:4:\"item\";O:18:\"App\\RelatedProduct\":26:{s:11:\"\0*\0fillable\";a:6:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";i:5;s:9:\"parent_id\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:7;s:10:\"created_at\";s:19:\"2018-06-10 19:55:21\";s:10:\"updated_at\";s:19:\"2018-06-16 15:49:07\";s:9:\"imagePath\";s:29:\"/images/relatedproduct/7.jpeg\";s:5:\"title\";s:35:\"Раритетное издание\";s:4:\"slug\";s:18:\"raritetnoe-izdanie\";s:11:\"description\";s:59:\"<p>Является раритеным изданием</p>\";s:7:\"content\";s:41:\"<p>Очень редкая книга</p>\";s:6:\"status\";i:1;s:9:\"parent_id\";i:2;s:5:\"price\";i:1500;}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:7;s:10:\"created_at\";s:19:\"2018-06-10 19:55:21\";s:10:\"updated_at\";s:19:\"2018-06-16 15:49:07\";s:9:\"imagePath\";s:29:\"/images/relatedproduct/7.jpeg\";s:5:\"title\";s:35:\"Раритетное издание\";s:4:\"slug\";s:18:\"raritetnoe-izdanie\";s:11:\"description\";s:59:\"<p>Является раритеным изданием</p>\";s:7:\"content\";s:41:\"<p>Очень редкая книга</p>\";s:6:\"status\";i:1;s:9:\"parent_id\";i:2;s:5:\"price\";i:1500;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:9:\"parent_id\";i:2;s:12:\"parent_title\";s:20:\"Lie Down in Darkness\";}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:1500;}', 'wefwf', 'admin', NULL, 'admin@admin.com', 'wefw', 0),
(11, '2018-06-17 09:48:20', '2018-06-17 09:48:20', 4, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:1;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:600;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:600;}', 'rtyry', 'admin', NULL, 'admin@admin.com', 'ryrty', 0),
(12, '2018-06-23 05:02:42', '2018-06-23 05:02:42', 4, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:1;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:600;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:5:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";i:4;s:7:\"content\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:1;s:7:\"user_id\";i:1;s:10:\"created_at\";s:19:\"2018-06-04 06:14:10\";s:10:\"updated_at\";s:19:\"2018-06-16 15:47:41\";s:9:\"imagePath\";s:22:\"/images/product/1.jpeg\";s:5:\"title\";s:35:\"Убить пересмешника\";s:4:\"slug\";s:17:\"kill-mocking-bird\";s:11:\"description\";s:343:\"<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>\";s:7:\"content\";s:14:\"<p>Content</p>\";s:6:\"status\";s:1:\"1\";s:5:\"price\";i:600;s:10:\"hasRelated\";i:0;s:11:\"category_id\";s:1:\"3\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:600;}', 'gdfgdf', 'admin', NULL, 'admin@admin.com', '354345', 0);

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
(1, 'Quidem rerum rerum quia alias voluptatem ducimus sunt.', 'quidem-rerum-rerum-quia-alias-voluptatem-ducimus-sunt', '<p>Exercitationem impedit repudiandae eveniet id.</p>', 1, 1, 3287, 0, '2018-06-04 03:15:11', '2018-06-23 05:11:10', '2017-09-08', 1, '/images/post/1.jpeg', NULL),
(2, 'Corporis in porro consequuntur deserunt pariatur.', 'corporis-in-porro-consequuntur-deserunt-pariatur', '<p>Autem et magnam reiciendis impedit quis aut.</p>', 1, 1, 1443, 0, '2018-06-04 03:15:11', '2018-06-23 05:15:22', '2017-09-08', 1, '/images/post/2.jpeg', NULL),
(3, 'Tempora provident dolores sunt ea perferendis minima.', 'tempora-provident-dolores-sunt-ea-perferendis-minima', '<p>Minima quas earum explicabo quo labore et consequatur.</p>', 2, 1, 148, 0, '2018-06-04 03:15:11', '2018-06-23 09:51:59', '2017-09-08', 1, '/images/post/3.jpeg', NULL),
(4, 'Quae unde et alias placeat excepturi tempora.', 'quae-unde-et-alias-placeat-excepturi-tempora', '<p>Atque dolores totam voluptas autem omnis quibusdam explicabo aperiam.</p>', 2, 1, 2908, 0, '2018-06-04 03:15:11', '2018-06-23 09:52:06', '2017-09-08', 1, '/images/post/4.jpeg', NULL);

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

--
-- Дамп данных таблицы `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 4, 1, NULL, NULL),
(6, 4, 2, NULL, NULL);

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
  `hasRelated` int(11) NOT NULL DEFAULT '0',
  `category_id` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `user_id`, `created_at`, `updated_at`, `imagePath`, `title`, `slug`, `description`, `content`, `status`, `price`, `hasRelated`, `category_id`) VALUES
(1, 1, '2018-06-04 03:14:10', '2018-06-16 12:47:41', '/images/product/1.jpeg', 'Убить пересмешника', 'kill-mocking-bird', '<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>', '<p>Content</p>', '1', 600, 0, '3'),
(2, 1, '2018-06-04 03:14:10', '2018-06-23 08:17:28', '/images/product/2.jpeg', 'Lie Down in Darkness', 'liedown-darkness', '<p>Глава американской&nbsp;<a href=\"https://lenta.ru/tags/spacex\" target=\"_blank\">компании SpaceX</a>&nbsp;<a href=\"https://lenta.ru/tags/mask-ilon\" target=\"_blank\">Илон Маск</a>&nbsp;раскрыл планы на будущее сверхтяжелой ракеты-носителя Falcon Heavy.</p>', '<p>Глава американской&nbsp;<a href=\"https://lenta.ru/tags/spacex\" target=\"_blank\">компании SpaceX</a>&nbsp;<a href=\"https://lenta.ru/tags/mask-ilon\" target=\"_blank\">Илон Маск</a>&nbsp;раскрыл планы на будущее сверхтяжелой ракеты-носителя Falcon Heavy. Об этом сообщает SpaceNews с предполетной конференции, посвященной ее первому запуску.</p>\r\n\r\n<p>Бизнесмен заявил, что одной из важнейших целей пуска станет демонстрация ВВС США возможностей Falcon Heavy по выведению космических аппаратов непосредственно на геостационарную орбиту, а также в дальний космос. В частности, вторая ступень носителя вместе с полезной нагрузкой будет совершать шестичасовые маневры на околоземной орбите, сопровождающиеся работой в экстремальных условиях (прохождение сквозь радиационные пояса Земли).</p>\r\n\r\n<p>Также Falcon Heavy отправит полезную нагрузку &mdash; автомобиль Tesla Roadster &mdash; на вытянутую околосолнечную орбиту, пересекающую траектории движений Земли и Марса. Вероятность вывести ее непосредственно на околомарсианскую орбиту Маск назвал крайне малой. В случае успеха этого проекта в 2018 году произойдет еще два пуска Falcon Heavy. Речь идет о миссиях Arabsat 6A (в интересах Саудовской Аравии) и Space Test Program 2 (для ВВС США).</p>', '1', 500, 1, '2'),
(3, 1, '2018-06-04 03:14:10', '2018-06-16 12:48:34', '/images/product/3.jpeg', 'All_Things_Wise_and_Wonderful', 'herriot', '<p>&ldquo;Surely no one can read Herriot without gaining a new and compassionate insight into All Things Wise and Wonderful in the world around him. A grand book.</p>', '<p>Content</p>', '1', 800, 1, '2'),
(4, 4, '2018-06-04 07:26:47', '2018-06-23 04:57:23', '/images/product/4.jpeg', 'sdfsdfaasd', 'sdfsdf', '<p>sfsdfыв</p>', '<p>sdfsfs asdasв</p>', '0', 45555, 0, '2'),
(5, 4, '2018-06-04 07:27:07', '2018-06-23 04:57:30', '/images/product/5.jpeg', 'sdfsdf', 'sdfsdf-1', '<p>sdfsdf</p>', '<p>sdfsdfs</p>', '1', 12313, 0, '3'),
(6, 4, '2018-06-04 07:36:06', '2018-06-23 04:57:38', '/images/product/6.jpeg', 'test-image', 'sdfsf', '<p>sdfsf</p>', '<p>sdfsdf</p>', '0', 32, 0, '2'),
(8, 4, '2018-06-04 08:43:16', '2018-06-23 04:57:51', '/images/product/8.jpeg', 'test2', 'test2', '<p>ляляля</p>', '<p>много раз ляляля</p>', '1', 45645, 0, '4');

-- --------------------------------------------------------

--
-- Структура таблицы `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `imagePath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_categories`
--

INSERT INTO `product_categories` (`id`, `created_at`, `updated_at`, `product_id`, `imagePath`, `title`, `slug`, `description`, `content`) VALUES
(2, NULL, '2018-06-23 04:44:26', NULL, '/images/productcategory/2.jpeg', 'Первая категория', 'vtoraya-kategoriya', '<p>Описание второй категорииукцк</p>', '<p>Контент второй категории</p>'),
(3, '2018-06-16 11:26:21', '2018-06-23 04:44:34', NULL, '/images/productcategory/3.jpeg', 'Вторая категория', 'tretya-kategoriya', '<p>вапвапвап</p>', '<p>впвапвап</p>'),
(4, '2018-06-16 11:58:15', '2018-06-23 04:44:43', NULL, '/images/productcategory/4.jpeg', 'Третья категория', 'tot-jlyf-rfntujhbz', '<p>fghfg</p>', '<p>fghfghfgh</p>');

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
(7, '2018-06-10 16:55:21', '2018-06-16 12:49:07', '/images/relatedproduct/7.jpeg', 'Раритетное издание', 'raritetnoe-izdanie', '<p>Является раритеным изданием</p>', '<p>Очень редкая книга</p>', 1, 2, 1500),
(8, '2018-06-12 06:40:44', '2018-06-12 06:40:44', NULL, 'test shit', 'test-shit', NULL, NULL, 0, 3, 123),
(9, '2018-06-12 06:52:28', '2018-06-14 14:04:40', NULL, 'Потрепанное издание', 'potrepannoe-izdanie', '<p>Lie Down in Darkness is a novel by American novelist William Styron published in 1951. It was his first novel, written when he was 26 years old, and received a great deal of critical acclaim.</p>', '<p>Потрепанная обложна - контент</p>', 1, 2, 456),
(10, '2018-06-14 14:05:50', '2018-06-16 14:52:55', '/images/relatedproduct/10.jpeg', 'Новое', 'novoe', '<p>Другое описание</p>', '<p>Другой контент</p>', 1, 2, 780),
(11, '2018-06-14 14:08:17', '2018-06-14 14:08:17', NULL, 'ляляля', 'lyalyalya', NULL, NULL, 1, 2, 120);

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

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Первый тэг', 'pervyy-teg', '2018-06-23 09:55:45', '2018-06-23 09:55:45'),
(2, 'Второй тэг', 'vtoroy-teg', '2018-06-23 09:55:56', '2018-06-23 09:55:56');

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
(4, 'admin', 'admin@admin.com', '$2y$10$TEXzRKM93yu8LW9yxDm8hOwFXyPnIpCzt1s568B9klexhcS0YuxRG', 1, 0, 'NTl6rPmQVbKb3qy6BSINTHtscM2ueXXurrnP1hbqe5eb5IcCY82oftz9wGjB', '2018-06-04 03:19:40', '2018-06-23 13:53:13', '8b7EkRDubT.png'),
(5, 'test', 'test@test.test', '$2y$10$dgTed.sPMJOMt/PWMm2NmeTArsq.iGzuufIVwBQsfF7nZ7QoxI94S', 0, 0, 'wZTsBuIUtvR3TFQwwfrPDH1XzwSHP82KEMSuSoA5MJYlgJoxR7molqZuGrUQ', '2018-06-16 06:31:26', '2018-06-16 06:31:26', NULL);

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
-- Индексы таблицы `product_categories`
--
ALTER TABLE `product_categories`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `offers_products`
--
ALTER TABLE `offers_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `offer_values`
--
ALTER TABLE `offer_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `related_products`
--
ALTER TABLE `related_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
