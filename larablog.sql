-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 26 2018 г., 22:30
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
(1, 'Марсоходы', 'sdfsdf', '2018-06-10 08:09:36', '2018-06-26 15:32:28'),
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

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `user_id`, `post_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 4, 2, 1, '2018-06-24 05:58:19', '2018-06-24 05:58:38');

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
(11, '2018-06-09 11:49:51', '2018-06-09 11:49:51', 'Количество страниц', 'kolichestvo-stranic'),
(16, '2018-06-24 10:55:55', '2018-06-24 10:55:55', 'snarks', 'snarks');

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
(21, '2018-06-12 06:52:28', '2018-06-12 06:52:28', 1, 9, '26'),
(22, '2018-06-12 06:52:28', '2018-06-12 06:52:28', 3, 9, '12'),
(23, '2018-06-12 06:52:28', '2018-06-12 06:52:28', 11, 9, '22'),
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
(30, '2018-06-11 09:13:47', '2018-06-11 09:51:48', 1, 'твердая', 'potrepannaya2'),
(37, '2018-06-24 10:55:55', '2018-06-24 10:55:55', 16, 'aaa', 'aaa');

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
(1, 'Три поколения марсоходов на планете Марс', 'quidem-rerum-rerum-quia-alias-voluptatem-ducimus-sunt', '<p><em>В рамках Mars Exploration Rover Project (слева) на поверхность Марса приземлились марсоходы Spirit и Opportunity в 2004 году. В рамках Mars Science Laboratory Project (справа) на поверхность Марса приземлился марсоход Curiosity в августе 2012 года. Предоставлено: NASA/JPL-Caltech.</em></p>\r\n\r\n<p>Марсоходы NASA прошли долгий путь с точки зрения размеров и возможностей после возрождения исследований&nbsp;поверхности Красной Планеты&nbsp;за прошедшие 15 лет с 1997 и по 2012 годы.</p>\r\n\r\n<p>Чтобы представить себе то по-настоящему прекрасное чувство, как сильно учёные и инженеры NASA расширили своё искусство за столь короткий срок - когда совпадали сила воли и существующее финансирование, чтобы исследовать другой мир - внимательно посмотрите на эти фотографии, показывающие три поколения марсоходов NASA; а именно марсоход первого поколения Mars Pathfinder (MPF), марсоход второго поколения Mars Exploration Rover (MER) и марсоход третьего новейшего поколения Mars Science Laboratory (MSL).</p>\r\n\r\n<p>Недавно опубликованные фотографии демонстрируют их размеры бок о бок для сравнения Mars Pathfinder, приземлившегося в 1997 году, Mars Exploration Rover, приземлившегося в 2004 году, и Mars Science Laboratory, приземлившегося в 2012 году. Это прототипы, стоящие в &quot;Марсианском&nbsp;дворе&quot; Лаборатории Реактивного Движения NASA в Пасадене, Калифорния, США, где научные команды проводят моделирование миссий.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/3gen_image2.jpg\" class=\"img-responsive\" /></p>\r\n\r\n<p>Это был огромный скачок в развитии научного и технологического потенциала от поколения к поколению.</p>\r\n\r\n<p><em>Марсоход Sojourner (&quot;Соджорнер&quot;) - первый марсоход NASA, проводящий исследование камня по прозвищу &quot;Yogi&quot; научные прибором Alpha Proton X-ray Spectrometer (APXS) вскоре после приземления на Марсе 4 июля 1997 года. Sojorner был всего 65 см в длину, размером с микроволновку. Предоставлено: NASA.</em></p>\r\n\r\n<p>Просто поразительное увеличение размеров - от микроволновки до автомобиля!</p>\r\n\r\n<p>Запасной марсоход &quot;Мари Кюри&quot; и настоящий масроход &quot;Соджорнер&quot; на Марсе - оба 65 см в длину, размером с микроволновку. Марсоходы MER Spirit и Opportunity и марсоход &quot;Surface System Test Bed&quot; имеют длину уже 1,6 м, размером с гольф-кар. Марсоход MSL Curiosity и марсоход &quot;Vehicle System Test Bed&quot; &nbsp;- 3 метра в длину, размером с автомобиль.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/3gen_image3.jpg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>Вид сбоку трёх поколений марсоходов; спереди первый марсоход &quot;Sojourner&quot;, слева тестовый образец марсохода Mars Exploration Rover, справа тестовый образец марсохода Mars Science Laboratory. Предоставлено:&nbsp;NASA/JPL-Caltech.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Своими глазами вы можете засвидетельствовать быструю смену поколений марсоходов, если у вас будет возможность посетить Туристический Комплекс Космического Центра Кеннеди и прогуляться по выставке с полномасштабными моделями всех трёх марсоходов NASA.</p>\r\n\r\n<p>Все марсоходы были запущены со стартовых площадок базы ВВС США &quot;Мыс Канаверал&quot;, Флорида, США.</p>\r\n\r\n<p>Марсоходы Sojourner, Spirit и&nbsp;Opportunity&nbsp;были запущены на ракете Delta II с Космического Стартового Комплекса 17 в 1996 и 2003 годах. Curiosity был запущен на ракете Atlas V с Космического Стартового Комплекса 41 в 2011 году.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/3gen_image4.jpg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>На этой фотографии три поколения марсоходов рядом с выдающимися инженерами, чтобы представить себе их размер. На переднем плане запасной марсоход первого марсохода Sojourner. Слева тестовый марсоход Mars Exploration Rover Project, работающий двойником марсоходов Spirit и Opportunity. Справа тестовый марсоход Mars Science Laboratory, аналог Curiosity, работающего сейчас на Марсе с момента его приземления в августе 2012 года. Инженеры, работающие в Лаборатории реактивного Движения - Matt Robinson слева и Wesley Kuykenball справа. Предоставлено: NASA/JPL-Caltech.</em></p>\r\n\r\n<p>Opportunity на сегодняшний день всё ещё исследует Марс - уже 12 лет 9 месяцев, хотя изначально планировалось, что он прослужит всего 90 дней. Curiosity трудится уже 4 года 3 месяца. А Sojourner проработал всего 83 дня. Кто следующий? С нетерпением ждём четвёртое поколение марсоходов.</p>', 1, 1, 3287, 0, '2018-06-04 03:15:11', '2018-06-26 15:51:44', '2018-06-13', 1, '/images/post/1.jpeg', '<p>Три поколения марсоходов на&nbsp;планете Марс&lt;&nbsp;с 1997 по 2012, созданные в Лаборатории Реактивного Движения NASA в Пасадене, Калифорния, США. Неподвижная марсианская станция Mars Pathfinder Project (&quot;Марсопроходец&quot;)&nbsp; с марсоходом Sojourner (на переднем плане) на борту первым приземлились на Марсе в 1997 году.</p>'),
(2, 'Марсоходы — лучшие автомобили в истории человечества.', 'corporis-in-porro-consequuntur-deserunt-pariatur', '<p>Вы думаете, что самым современным автомобилем в мире является Bugatti Veyron? Или болиды Формулы-1? Ничего подобного! Несмотря на всю свою &laquo;крутизну&raquo;, это все же обычные машины. Да, благодаря таким моделям, автопром делает постоянные маленькие шаги вперед. Но они не позволяют сделать огромного прыжка для всего человечества. А неуклюжее и довольно странное транспортное средство, под названием Curiosity, его осуществило! Ведь Curiosity ездит не по планете Земля. Это новейший марсоход, который на прошлой неделе не просто успешно &laquo;примарсился&raquo;, но и начал передавать нам первые фотографии. А это значит, что один из самых сложных в истории всей космонавтики проектов увенчался успехом.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Создание нового марсохода заняло много времени. Конкурс на проект марсианского автомобиля был объявлен еще в апреле 2004 года. В итоге созданием марсохода занялись инженеры двух промышленных &laquo;монстров&raquo; Boeing и Lockheed Martin. Изначально предполагалось, что марсоход отправится в путь в 2009 году, однако из-за всевозможных проблем старт было решено перенести на 2011 год. Кстати, интересно, что название Curiosity (в переводе &laquo;Любопытство&raquo;) было придумано&hellip; 12-летней школьницей по имени Клара Ма, которая выиграла специально организованный конкурс. Среди других потенциальных имен (возможно, они будут использованы в будущем) были: Wonder (&laquo;Чудо&raquo;), Sunrise (&laquo;Восход&raquo;), Adventure (&laquo;Приключение&raquo;), Journey (&laquo;Путешествие&raquo;), Pursuit (&laquo;Стремление&raquo;), Vision (&laquo;Видение&raquo;), Amelia и Perception (&laquo;Восприятие&raquo;).</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image2.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Среди всех планет Солнечной системы Марс (четвертая планета от Солнца) больше остальных похож на Землю (третья планета от Солнца). На Марсе существует атмосфера, которая, правда, состоит в основном из углекислого газа. Плюс к этому атмосфера очень разрежена. Но при этом температура на планете не такая уж и низкая, как может показаться. В среднем минус 50 градусов, но, скажем, на экваторе в полдень речь идет уже о плюс 20 градусах (но на полюсах зимой температура падает до минус 153).</em></p>\r\n\r\n<p>Разумеется, Curiosity мало похож на привычные нам автомобили. На первый взгляд. И все же это настоящее транспортное средство, которое имеет колеса (их тут шесть), независимые подвески, двигатель, аккумулятор и так далее. Причем, если все предыдущие марсоходы были больше похожи на игрушки, то Curiosity даже по своим габаритам напоминает легковой автомобиль. Его длина около трех метров, а масса порядка 900 кг. Это в пять раз тяжелее предыдущих американских марсоходов Spirit и Opportunity.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image3.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>В автомобильном мире тенденция такова, что каждое следующее поколение машины крупнее предыдущего. Это справедливо и для марсоходов: американский первенец Sojourner &mdash; самый маленький, а Curiosity &mdash; самый большой. Промежуточное положение занимает Opportunity.</em></p>\r\n\r\n<p>И такие габариты заставили инженеров NASA разрабатывать принципиально новый способ посадки на далекую планету. Ведь, если раньше использовалась схема, при которой на твердую поверхность садилась платформа, с которой съезжал марсоход, то в случае с Curiosity стало понятно, что подобная платформа окажется слишком большой. Поэтому был придуман так называемый &laquo;небесный кран&raquo;, благодаря которому Curiosity &laquo;примарсился&raquo; непосредственно на свои собственные колеса, &mdash; специальная реактивная платформа после отстрела парашюта зависла над Марсом, спустила Curiosity на специальных тросах (они затем были отрезаны) и отлетела в сторону. И новая схема посадки очень интересна. По словам экспертов NASA, она позволяет отправлять на Марс объекты, которые крупнее Curiosity. Гораздо крупнее.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image4.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>Curiosity десантировался на Марс 6 августа этого года. Место посадки &mdash; 154-километровый кратер Гейла, в центре которого находится пик Эолида высотой 5 км. Считается, что когда-то кратер Гейла был морем. А это значит, что на его поверхности могли сохраниться разнообразные минералы. Предполагается, что к 10-му солу все десять главных инструментов Curiosity начнут функционировать. А к 30-му солу начнет работу двухметровая рука-манипулятор, которая станет собирать образцы грунта и отправлять их в минилаборатории для исследования. Что такое сол? Так называются марсианские сутки, которые длятся 24,66 земных часов. Кстати, год на Марсе длится 687 земных суток.</em></p>\r\n\r\n<p>Если вы еще не поняли, о чем сейчас идет речь, то вот вам еще одна подсказка &mdash; главной задачей Curiosity является не столько изучение минералов и фотографирование Красной планеты. Целью Curiosity является&hellip; &mdash; внимание! &mdash; подготовка к освоению ее человеком! Да-да, это не шутка. Пока в NASA с опаской говорят о своих планах на будущее, но никто не сомневается, что следующей глобальной целью является высадка человека на Марс. Причем, не просто высадка, а создание на планете целой базы для работы на протяжении долгого времени (ведь только полет до Марса длится около 9 месяцев).</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image5.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>Марсоход Curiosity уже начал работу. Пока он еще не занялся исследованием грунта и поиском воды, однако первые фотографии Красной планеты уже получены. Curiosity оснащен несколькими камерами, которые позволяют не только делать фотографии, но и отвечают за ориентирование марсохода на планете, ищут препятствия и помогают разрабатывать маршрут.</em></p>\r\n\r\n<p>Еще одной интересной особенностью Curiosity является &laquo;топливо&raquo; для двигателей. Раньше для подобных транспортных средств использовали солнечные батареи. Однако Curiosity слишком крупный и тяжелый (кстати, 900 кг &mdash; это его земная масса, на Марсе он весит 340 кг), и солнечных батарей ему просто бы не хватило. Именно поэтому для работы двигателей и разнообразного исследовательского оборудования на новом марсоходе используется энергия распада плутония-238, которой хватит для того, чтобы вырабатывать 2,5 кВт∙час тепловой энергии и 125 Вт электрической. В NASA говорят, что 4,5 килограммов плутония хватит на 14 лет работы (правда, американцы пока с осторожностью говорят о том, что Curiosity будет работать около двух лет &mdash; мол, дальше видно будет).</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image6.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>Одна из камер, под названием ChemCam, предназначена для работы со специальным лазером, который при помощи луча испаряет вещества, которые находятся на планете. ChemCam по спектру излучения определяет химический состав этих веществ.</em></p>\r\n\r\n<p>Что даст автомобиль, под названием Curiosity, нам? Пока ничего. На данный момент, это не более чем чистая наука. Однако &mdash; и можете в этом не сомневаться &mdash; именно такие проекты как Curiosity позволяют человечеству развиваться и придумывать что-то новое. Несмотря на всю свою кажущуюся скромность, Curiosity можно поставить на одну планку с такими величайшими достижениями человечества, как полет Гагарина или высадка человека на Луну.</p>\r\n\r\n<p><strong>Автопарк Марса</strong></p>\r\n\r\n<p>Первым небесным объектом, куда человеку удалось отправить самоходное транспортное средство, стал естественный спутник Земли. Речь идет о &laquo;Луноходе-1&raquo;, который был создан советскими учёными. На поверхность Луны межпланетная станция доставила планетоход 10 ноября 1970 года, причём, управляли восьмиколёсной машиной с Земли пятеро (!) человек: командир, водитель, оператор антенны, штурман и бортинженер. Что представлял собой луноход? Фактически автомобиль! Масса &mdash; 900 кг, длина шасси &mdash; 2215 мм, ширина колеи &mdash; 1600 мм, диаметр колёс &mdash; больше полуметра, а максимальная скорость движения по лунной поверхности составляла 4 км/ч.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image7.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>&laquo;Луноход-1&raquo; катался по спутнику Земли до 30 сентября 1971 года, а его &laquo;сменщик&raquo;, &laquo;Луноход-2&raquo;, исследовал Луну с 15 января по 4 июня 1973-го.</em></p>\r\n\r\n<p>Интересно, что и на поверхность Марса первым высадился тоже советский планетоход! Машина со сложным названием &laquo;Прибор оценки проходимости &mdash; Марс&raquo; (сокращённо &mdash; ПрОП-М) достиг Красной планеты 27 ноября 1971 года, однако свою миссию провалил: спускаемый аппарат разбился при посадке&hellip; Причём, попытка повторно высадиться на четвёртую планету от Солнца была предпринята совсем скоро, 2 декабря, но учёных подвела&hellip; погода. Аппарат успел отработать только 20 секунд, после чего хитроумную технику уничтожила пылевая буря.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image8.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>Советские марсоходы (их было два) свою миссию не выполнили, после чего программа по освоению Марса была приостановлена.</em></p>\r\n\r\n<p>Советский марсоход выглядел как компактная коробочка (габариты &mdash; 25 см х 22 см х 4 см), которая ориентировалась благодаря датчикам (аппарат самостоятельно определял, с какой стороны находится препятствие) и шагала (!) по поверхности при помощи пары лыж. Но двигался планетоход неспешно, со скоростью 1 м/ч, а после каждого пройденного метра останавливался, чтобы получить команду из Центра управления. Отметим, что команды поступали не самому прибору, а спускаемому аппарату, с которым &laquo;исследователь&raquo; соединялся 15-метровым кабелем.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image9.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>Малыш Sojourner (масса во время операции на Марсе &mdash; 10,6 кг, длина &mdash; 65 см) исследует свой первый &mdash; на поверхности Красной планеты &mdash; камень.</em></p>\r\n\r\n<p>После неудачных попыток СССР в освоении Марса земляне взяли тайм-аут, и следующий планетоход высадился на грунт небесного тела только 4 июля 1997 года. России на этот момент было не до масштабных космических программ, поэтому эстафету приняли американцы: штатовский Sojourner (в честь Трут Соджорнер, боровшейся за права чернокожих) совершил посадку 4 июля 1997, но, по техническим причинам, марсоход отделился от посадочного аппарата только 5 июля, а на исследование Красной планеты отправился 6 июля, располагая спектрометром для изучения химсостава пород.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image10.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>Круговая панорама равнины Хриса, снятая камерой спускаемого аппарата, который доставил на Красную планету марсоход Sojourner.</em></p>\r\n\r\n<p>От шагающей схемы, которую отрабатывали советские специалисты, американцы предпочли отказаться и оснастили &laquo;Соджойнера&raquo; колёсами, а точнее &mdash; шестью 13-сантиметровыми &laquo;катками&raquo;, каждый из которых вращался самостоятельно. Внутри машины прятались 11 моторов постоянного тока мощностью 3,2 Вт (которые питались от солнечной батареи): в движение марсоход приводили 6 двигателей, ещё 4 задавали направление движения, а последний опускал и поднимал спектрометр. Инженеры наделили исследователя Марса изрядной проходимостью &mdash; он наклонялся на 45&deg; без опрокидывания и уверенно преодолевал препятствия высотой до 20 см.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image11.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>Sojourner направляется к каменному образованию под названием &laquo;Йоги&raquo; &mdash; это второй по счёту объект, исследованный американской машиной.</em></p>\r\n\r\n<p>Свою &laquo;командировку&raquo; &laquo;Соджорнер&raquo; закончил 17 сентября 1997 года &mdash; именно тогда специалистам NASA удалось связаться со своим детищем последний раз. За это время марсоход при помощи спектрометра изучил несколько камней и сделал 550 фотографий. Результаты исследований, проведённых &laquo;марсопроходцем&raquo;, окончательно убедили учёных, что на этой планете было &laquo;влажно и тепло&raquo;. Американские налогоплательщики тоже остались довольны: стоимость программы, давшей хорошие результаты, оказалась сравнительно невысокой &mdash; 287 миллионов долларов.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image12.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>Марсоход Opportunity складывают в защитный спускаемый аппарат (справа) и ракетой &laquo;Дельта-2&raquo; отправляют на четвёртую планету от Солнца.</em></p>\r\n\r\n<p>Два следующих аппарата, Spirit (второе название &mdash; MER-A, Mars Exploration Rover &mdash; A) и Opportunity (или MER-B), были близнецами. Это поколение марсоходов также осталось шестиколёсным, но получило гораздо больший набор оборудования: к спектрометру и камерам прибавились микроскоп и бур. Интересно, что пробуксовка, с которой борются автомобилисты, для планетоходов стала благом, &mdash; &laquo;буксуя&raquo; одним из колёс, &laquo;Спирит&raquo; выкапывал грунт для исследований. В остальном, по части устройства, ничего нового &mdash; для каждого колеса &mdash; по одному электромотору, отдельные двигатели для поворота машины и привода &laquo;серворуки&raquo;, держащей приборы.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image13.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>Сверху &mdash; посадочная платформа планетохода Spirit, а снизу &mdash; панорама 200-метрового кратера Бонневиль, сделанная камерой самоходной машины.</em><br />\r\n    <br />\r\n    Сначала, 4 января 2004 года, на Марс высадился &laquo;Спирит&raquo;, а 25 января 2004 года, до места назначения добрался &laquo;Оппортьюнити&raquo;, который приземлился на другой стороне планеты. В рамках этой миссии планировалось изучение осадочных пород, однако таковые найдены не были. Зато MER-A впервые на Красной планете пробурил отверстие, а MER-B выкопал первую на этом небесном теле траншею и &laquo;увидел&raquo; тонкие, похожие на земные, облака. В конце 2009 года Spirit попытался преодолеть дюну, но застрял так, что выбраться из песчаной ловушки не сумел. Зато Opportunity продолжает работать!</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image14.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p><em>Спускаемый аппарат остался пустым (справа), а Opportunity отправился на изучение планеты, включая Огненный утёс кратера Выносливость (слева внизу).</em></p>\r\n\r\n<p>По &laquo;неведомым дорожкам&raquo; Opportunity успел накатать без малого 35 тысяч метров, изучая почву и образцы горных пород, а также делая панорамные фотографии, поэтому сейчас на марсианской поверхности находится пара действующих &laquo;исследователей&raquo; &mdash; &laquo;Оппортьюнити&raquo; и &laquo;Куриосити&raquo;. Таким образом, за время исследований Марса на этой планете работали четыре марсохода, включая американского новичка. В обозримом будущем четвёртую планету от Солнца посетят и несколько новых вездеходов: на 2018 год намечены посадки российского &laquo;Марс-Астера&raquo; и европейского ExoMars, а в 2022-м на Землю хотят доставить образцы инопланетного грунта.</p>\r\n\r\n<p>Они назвали это &quot;Семь минут ужаса&quot;. На расстоянии более 53 миллионов километров от Земли капсула с марсоходом Curiosity прошла сквозь тонкую атмосферу Марса &ndash; закончилось восьмимесячное путешествие на крейсерской скорости 36 200 км/ч. Развернулся 16-метровый парашют. Четыре двигателя включились, чтобы притормозить капсулу. Космический корабль превратился в лифт, который осторожно опустил груз ценой в $2,5 млрд на поверхность Красной планеты. Чуть быстрее &ndash; и годы труда пошли бы прахом: марсоход весом почти в тонну саморазобрался бы от удара. И в далеком будущем какой-нибудь неземной слизняк нашел бы в пустыне россыпи гигантского конструктора.</p>\r\n\r\n<p>Собрав все воедино, наш марсианский собрат по разуму увидел бы машину размером с Range Rover. На шести 20-дюймовых титановых колесах, обутых в металлические &quot;шины&quot; с протектором. Колеса крепятся к шасси паучьими ножками подвески. Спереди &quot;рука&quot; &ndash; один из десяти бортовых инструментов. Машина собирает и складывает в себя камни, а после анализирует их в мобильной лаборатории. Ее камеры способны рассмотреть самый тоненький волосок. Есть лазер дальнобойностью в семь метров: он превращает вещество планеты в тонкую пыль, и марсоход исследует ее молекулярный состав. Марсоход питается от ядерного реактора на плутонии.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image15.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p>Задача этого аппарата, как и всех остальных, выяснить, есть ли жизнь на Марсе. Им командуют парни из NASA &ndash; пилоты. В команде их шестнадцать, они работают посменно, по марсианскому времени. Марсианский день (или &quot;солнечный&quot;) на 40 минут дольше, чем земной, и каждый рабочий день начинается со все более заметным опозданием. Расстройство биоритмов гарантировано, хоть они на работу не летают, а ходят пешком. А работа у них &ndash; рулить самой крутой на свете машиной с дистанционным управлением. Но сигнал идет в среднем 13 минут, то есть в реальном времени не погоняешь.</p>\r\n\r\n<p>&quot;Ты видишь камень и жмешь на тормоз, а марсоход уже на нем, &ndash; объясняет Мэтт Хеверли, один из пилотов марсохода. &ndash; Поэтому мы просто планируем маршрут, потом пишем список простых текстовых команд&hellip; &laquo;проехать один метр&raquo;, &laquo;повернуть налево&raquo;, &laquo;сфотографировать&raquo; и так далее&quot;. Мэтт и команда общаются с марсоходом дважды в день: один раз утром, чтобы выдать инструкции оптом, и один раз вечером, когда марсоход по е-мейл отчитывается о проделанной работе.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image16.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Только вчера они увидели результаты первого похода Curiosity. Это черно-белое фото со следами шин марсохода, которые на азбуке Морзе составляют буквы J-P-L (это и послание к зеленым человечкам, и метка для расчета расстояния). &quot;Мы просто сидим, ждем данных, &ndash; говорит Мэтт. &ndash; Только увидев фото, поймешь, сработал или нет наш симулятор. Какое облегчение увидеть, что он сделал все, как просили!&quot; Марсоход проехал совсем немного. &quot;Вообще-то он почти стоит на месте. Наша абсолютная максимальная скорость &ndash; 160 метров в час&quot;. Марсоход движется очень медленно, амортизаторы ему не нужны. Вместо них у него очень хитроумная кинематическая система рычагов и шарниров, благодаря которой вес аккуратно распределяется на все шесть колес, когда марсоход пробирается по камням иногда даже полуметровой высоты.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image17.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p>Внутри у него сложные мозги с системой распознавания поверхности вроде Terrain Response на Land Rover. Только эту делали в NASA. Получив текстовую команду, марсоход раскладывает ее на 4000 параметров и соображает, как выполнить. Здесь его учили на слежавшемся твердом грунте, но, двигаясь по Марсу, он ползет по мягкому песку и субстратам, которые невозможно воссоздать на Земле. Одни датчики отслеживают углы крена, другие &ndash; скорость рулевых актуаторов. Если машина встречает неожиданное препятствие, то она останавливается и спрашивает, что делать.</p>\r\n\r\n<p>Время от времени камеры на мачте делают снимки инопланетного пейзажа в высоком разрешении. Они перед вами. Но в журнале нельзя увидеть стереоверсию, трехмерную &quot;сетку ландшафта&quot;, которую пилоты видят в своих окулярах. На плоском изображении трудно понять, насколько далек горизонт или близок горный хребет. Еще одно измерение и умная анимация помогают вычислить самый безопасный путь по повер хности Марса. Все, что ниже 25 см, не страшно. Но среди больших глыб или в мягком грунте марсоход может застрять. Чтобы такого не случилось, NASA наняла геймеров. Они помогают интерпретировать снимки.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/image18.jpeg\" class=\"img-responsive\" /></p>\r\n\r\n<p>&quot;Самый опасный момент &ndash; когда оставляешь его работать&quot;, &ndash; говорит Мэтт, который отвечает за безопасность Curiosity. Как большинство пилотов, он инженер-механик и относится к управлению этой машиной хладнокровно и бесстрастно. Никакой фантастики. Мэтту просто нравятся роботы. &quot;Я люблю роботов, таких, которые пылесосят пол, варят кузова автомобилей и ездят по Марсу, &ndash; говорит он. &ndash; Все это потрясающие машины&quot;.</p>\r\n\r\n<p>А если с марсоходом что-нибудь случится? Со времен &quot;Аполлона&quot;, когда инженеры ломали и чинили копии моделей на Земле, приматывая скотчем крылья лунохода, а потом отправляли радиосигнал астронавтам на Луну, техника ушла далеко вперед. Но и на этот раз копии у них есть. Есть даже такая, которая на Земле весит столько же, сколько Curiosity на Марсе, где притяжение слабее. Эту копию называют Страшилой, потому что у нее нет мозгов. Она помогает решить одну из главных проблем марсохода &ndash; пробуксовку колес. &quot;Мы используем систему motion-tracking, как в Голливуде. С ней мы видим, какая была пробуксовка, и заносим это в программу&quot;.</p>\r\n\r\n<p>&quot;Исследования &ndash; это всегда риск. Мы находим новое, но оно может быть опасно&quot;. Восхитительный парадокс. Но с такими пилотами, как Мэтт, у Curiosity есть хороший шанс за два года пройти глубокие каньоны и преодолеть пик Маунт-Шарп высотой в пять с половиной метров. Правда, любая ошибка может стать последней. Ведь техпомощь на Марс не пошлешь&hellip;</p>', 1, 1, 1443, 0, '2018-06-04 03:15:11', '2018-06-26 16:04:15', '2018-06-11', 1, '/images/post/2.jpeg', '<p>Вы думаете, что самым современным автомобилем в мире является Bugatti Veyron? Или болиды Формулы-1? Ничего подобного! Несмотря на всю свою &laquo;крутизну&raquo;, это все же обычные машины. Да, благодаря таким моделям, автопром делает постоянные маленькие шаги вперед. Но они не позволяют сделать огромного прыжка для всего человечества.</p>'),
(3, 'Opportunity. Марафон длиной 14 лет', 'tempora-provident-dolores-sunt-ea-perferendis-minima', '<p>На поверхность Марса опустился 25 января 2004 года тремя неделями позже первого марсохода Спирит, успешно доставленного в другой район Марса, смещенный по долготе примерно на 180 градусов. &laquo;Оппортьюнити&raquo; совершил посадку в кратере Игл, на плато Меридиана.</p>\r\n\r\n<p>Название марсоходу, в рамках традиционного конкурса НАСА, было дано 9-летней девочкой российского происхождения Софи Коллиз, родившейся в Сибири и удочерённой американской семьёй из Аризоны.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/Opportunity-946x710.jpg\" class=\"img-responsive\" /></p>\r\n\r\n<p>На сегодняшний день &laquo;Оппортьюнити&raquo; продолжает эффективно функционировать, уже более чем в 50 раз превысив запланированный срок в 90 сол, проехав к началу сентября 2017 года 45 км, всё это время получая энергию только от солнечных батарей. Очистка солнечных панелей от пыли происходит за счёт естественного ветра Марса, что позволяет марсоходу производить геологические исследования планеты. В конце апреля 2010 года продолжительность миссии достигла 2246 сол, что сделало её самой длительной среди аппаратов, работавших на поверхности &laquo;красной планеты&raquo; (предыдущий рекорд принадлежал автоматической марсианской станции Викинг-1, проработавшей с 1976 по 1982 год).</p>', 1, 1, 148, 0, '2018-06-04 03:15:11', '2018-06-26 16:20:39', '2018-04-19', 1, '/images/post/3.jpeg', '<p>Второй марсоход космического агентства НАСА из двух, запущенных США в рамках проекта Mars Exploration Rover. Был выведен с помощью ракеты-носителя Дельта-2 7 июля 2003 года.</p>'),
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
(4, 3, 1, NULL, NULL),
(5, 4, 1, NULL, NULL),
(6, 4, 2, NULL, NULL),
(7, 2, 1, NULL, NULL);

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
(1, 1, '2018-06-04 03:14:10', '2018-06-24 09:54:58', '/images/product/1.jpeg', 'Убить пересмешника', 'kill-mocking-bird', '<p>&laquo;Уби́ть пересме́шника&raquo; &mdash; роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию</p>', '<p>Content</p>', '1', 600, 1, '3'),
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
(2, NULL, '2018-06-26 15:27:38', NULL, '/images/productcategory/2.jpeg', 'Марсоходы', 'vtoraya-kategoriya', '<p>Описание второй категорииукцк</p>', '<p>Контент второй категории</p>'),
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
(11, '2018-06-14 14:08:17', '2018-06-14 14:08:17', NULL, 'ляляля', 'lyalyalya', NULL, NULL, 1, 2, 120),
(12, '2018-06-24 09:54:58', '2018-06-24 10:49:41', NULL, 'text', 'text', NULL, NULL, 0, 1, 890),
(13, '2018-06-24 10:55:39', '2018-06-24 11:03:32', NULL, 'new tst', 'new-tst', NULL, NULL, 0, 1, 24234);

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
(1, 'Марсоходы', 'pervyy-teg', '2018-06-23 09:55:45', '2018-06-26 15:28:38'),
(2, 'Техника', 'vtoroy-teg', '2018-06-23 09:55:56', '2018-06-26 15:29:00');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `offers_products`
--
ALTER TABLE `offers_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `offer_values`
--
ALTER TABLE `offer_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
