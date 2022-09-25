-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 12:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gokyo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `commision_rate` double(8,2) NOT NULL DEFAULT 0.00,
  `banner` varchar(200) DEFAULT NULL,
  `icon` varchar(200) DEFAULT NULL,
  `featured` int(11) NOT NULL DEFAULT 0,
  `top` int(11) NOT NULL DEFAULT 0,
  `digital` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(200) NOT NULL,
  `meta_title` varchar(200) DEFAULT NULL,
  `meta_description` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `parent`, `commision_rate`, `banner`, `icon`, `featured`, `top`, `digital`, `slug`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'JNiYY', 'Category', 0, 0.00, NULL, NULL, 0, 0, 0, 'XVR', NULL, NULL, '2022-08-01 11:18:02', '2022-08-01 11:18:02'),
(2, 'UUSic', 'Category', 0, 0.00, NULL, NULL, 0, 0, 0, 'Dkp', NULL, NULL, '2022-08-01 11:18:02', '2022-08-01 11:18:02'),
(3, 'Ghler', 'Category', 0, 0.00, NULL, NULL, 0, 0, 0, '249', NULL, NULL, '2022-08-01 11:18:02', '2022-08-01 11:18:02'),
(4, 'Nwffz', 'Category', 0, 0.00, NULL, NULL, 0, 0, 0, 'V8x', NULL, NULL, '2022-08-01 11:18:02', '2022-08-01 11:18:02'),
(5, 'eW2pp', 'Category', 0, 0.00, NULL, NULL, 0, 0, 0, 'xfQ', NULL, NULL, '2022-08-01 11:18:02', '2022-08-01 11:18:02'),
(6, '7gDmJ', 'SubCategory', 1, 0.00, NULL, NULL, 0, 0, 0, 'sX1', NULL, NULL, '2022-08-01 11:18:10', '2022-08-01 11:18:10'),
(7, 'ztmxL', 'SubCategory', 1, 0.00, NULL, NULL, 0, 0, 0, 'ZqM', NULL, NULL, '2022-08-01 11:18:10', '2022-08-01 11:18:10'),
(8, '1efos', 'SubCategory', 1, 0.00, NULL, NULL, 0, 0, 0, 'KE3', NULL, NULL, '2022-08-01 11:18:10', '2022-08-01 11:18:10'),
(9, 'HPG5C', 'SubCategory', 1, 0.00, NULL, NULL, 0, 0, 0, 'cvy', NULL, NULL, '2022-08-01 11:18:10', '2022-08-01 11:18:10'),
(10, '84o4o', 'SubCategory', 1, 0.00, NULL, NULL, 0, 0, 0, '8Av', NULL, NULL, '2022-08-01 11:18:10', '2022-08-01 11:18:10'),
(11, 'GUszD', 'SubSubCategory', 6, 0.00, NULL, NULL, 0, 0, 0, 'SIq', NULL, NULL, '2022-08-01 11:18:24', '2022-08-01 11:18:24'),
(12, '2E5s4', 'SubSubCategory', 6, 0.00, NULL, NULL, 0, 0, 0, 'Bpl', NULL, NULL, '2022-08-01 11:18:24', '2022-08-01 11:18:24'),
(13, 'nGo3c', 'SubSubCategory', 6, 0.00, NULL, NULL, 0, 0, 0, 'd2c', NULL, NULL, '2022-08-01 11:18:24', '2022-08-01 11:18:24'),
(14, 'u2wpp', 'SubSubCategory', 6, 0.00, NULL, NULL, 0, 0, 0, 'Dvr', NULL, NULL, '2022-08-01 11:18:24', '2022-08-01 11:18:24'),
(15, 'Qqpfv', 'SubSubCategory', 6, 0.00, NULL, NULL, 0, 0, 0, 'YuM', NULL, NULL, '2022-08-01 11:18:24', '2022-08-01 11:18:24'),
(16, 'kiRVj', 'SubSubSubCategory', 12, 0.00, NULL, NULL, 0, 0, 0, 'umG', NULL, NULL, '2022-08-01 11:20:18', '2022-08-01 11:20:18'),
(17, 'Ho1jO', 'SubSubSubCategory', 12, 0.00, NULL, NULL, 0, 0, 0, 'ty1', NULL, NULL, '2022-08-01 11:20:18', '2022-08-01 11:20:18'),
(18, 'dKsIg', 'SubSubSubCategory', 12, 0.00, NULL, NULL, 0, 0, 0, 'HEh', NULL, NULL, '2022-08-01 11:20:18', '2022-08-01 11:20:18'),
(19, '3qwIA', 'SubSubSubCategory', 12, 0.00, NULL, NULL, 0, 0, 0, 'QGW', NULL, NULL, '2022-08-01 11:20:18', '2022-08-01 11:20:18'),
(20, 'pNV93', 'SubSubSubCategory', 12, 0.00, NULL, NULL, 0, 0, 0, 'QqB', NULL, NULL, '2022-08-01 11:20:18', '2022-08-01 11:20:18'),
(21, 'zk7lX', 'SubSubSubSubCategory', 16, 0.00, NULL, NULL, 0, 0, 0, 'h09', NULL, NULL, '2022-08-01 11:20:32', '2022-08-01 11:20:32'),
(22, 'hGzB0', 'SubSubSubSubCategory', 16, 0.00, NULL, NULL, 0, 0, 0, '90g', NULL, NULL, '2022-08-01 11:20:32', '2022-08-01 11:20:32'),
(23, '44EpX', 'SubSubSubSubCategory', 16, 0.00, NULL, NULL, 0, 0, 0, 'UDU', NULL, NULL, '2022-08-01 11:20:32', '2022-08-01 11:20:32'),
(24, 'uq96u', 'SubSubSubSubCategory', 16, 0.00, NULL, NULL, 0, 0, 0, 'Xid', NULL, NULL, '2022-08-01 11:20:32', '2022-08-01 11:20:32'),
(25, '08uLQ', 'SubSubSubSubCategory', 16, 0.00, NULL, NULL, 0, 0, 0, 'Qly', NULL, NULL, '2022-08-01 11:20:32', '2022-08-01 11:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) NOT NULL,
  `question` varchar(200) DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'xMqXHEsLW7', '0yM5HGKtyT', NULL, NULL, '2022-07-31 18:43:07', '2022-07-31 18:45:06'),
(2, 'nsSiQW7sXo', 'qpbUPmhJwR', NULL, NULL, '2022-07-31 18:45:14', '2022-07-31 18:45:14'),
(3, 'Lh12sh1VV4', 'hh3CBjYkzp', NULL, NULL, '2022-08-01 07:28:39', '2022-08-01 07:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `is_new` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `message`, `is_new`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test', 'test@test.com', 9845590200, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, '2022-08-03 12:01:16', '2022-08-07 18:32:38', NULL),
(2, 'Test 22', 'test@test.com', 9845590200, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2022-08-03 12:01:16', '2022-08-11 07:26:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asdf', 'asdf', '202207310946.png', NULL, NULL, '2022-07-31 09:46:12', '2022-07-31 09:46:12'),
(2, '1234', '1234', '202207311028.jpg', 1, '2022-07-31 17:34:52', '2022-07-31 09:50:39', '2022-07-31 17:34:52'),
(3, 'sadf', 'asf', NULL, 1, '2022-07-31 18:47:04', '2022-07-31 17:46:51', '2022-07-31 18:47:04'),
(4, 'sadf', 'asf', NULL, 1, '2022-07-31 18:47:11', '2022-07-31 17:47:03', '2022-07-31 18:47:11'),
(5, '1', '1', NULL, 1, '2022-07-31 18:47:18', '2022-07-31 17:47:15', '2022-07-31 18:47:18'),
(6, 'z', 'z', '202207311749.jpg', 1, NULL, '2022-07-31 17:49:43', '2022-07-31 17:49:43'),
(7, '123', '123', '202207311801.jpg', 1, NULL, '2022-07-31 17:58:02', '2022-07-31 18:01:50'),
(8, 't1a', 't1a', '202207311820.jpg', 1, '2022-08-11 06:42:09', '2022-07-31 18:20:36', '2022-08-11 06:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `opening_hours` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `phone`, `mobile`, `email`, `opening_hours`, `location`, `address`, `instagram`, `facebook`, `twitter`, `youtube`, `logo`, `created_at`, `updated_at`) VALUES
(1, 981111111122, 98111111112, 'example@gmail.com2', 'Mon – Sat, 8AM – 5PM2', 'location2', 'Akeshedhaara, Kathmandu, Nepal2', 'instagram2', 'facebook2', 'twitter2', 'youtube2', '202208111051.jpg', '2022-08-11 09:30:45', '2022-08-11 10:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `image`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asdf', 'asdf', '202207310946.png', NULL, '2022-07-31 18:24:33', '2022-07-31 09:46:12', '2022-07-31 18:24:33'),
(2, '1234', '1234', '202207311028.jpg', 1, '2022-07-31 17:34:52', '2022-07-31 09:50:39', '2022-07-31 17:34:52'),
(3, 't188', 't188', '202207311822.jpg', 1, NULL, '2022-07-31 18:22:35', '2022-07-31 18:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '123', 'admin@gmail.com', '2022-07-25 06:05:27', '$2y$10$dx1I1.AKvy9e5EUYPFsp8OsccOM3MoN/PeOdja4yb/ubZCbLQFOUy', 'q0jiNGjplXgcCiovbvZDQXfnzzd1J3CFdkqAaZS5BQvyupo9haiECeADzakX', NULL, '2022-07-25 06:05:27', '2022-07-29 05:50:38'),
(3, 'asdf123', 'ingrail-staff@gmail.com', NULL, 'eyJpdiI6InY3OFRzOHZ6ZlR1eGRJc2xBTExlVlE9PSIsInZhbHVlIjoiZVpYK1hIdk85NkZjVC9xcHRzVFJFUT09IiwibWFjIjoiZmM3ODMwMjBiNWU0N2JiMDlmM2NlZmIwZDhhNTYyZjJjZjNlOTUwZDE0YWU3ZmNmZTc5MDcxZTE5OTAxODA1OSIsInRhZyI6IiJ9', NULL, NULL, '2022-07-29 03:08:02', '2022-07-29 05:49:24'),
(5, 'asdf', 'admin2@gmail.com', NULL, 'eyJpdiI6ImUyMGVGTXVYQUNrSkhhdkJXTm9aL3c9PSIsInZhbHVlIjoibkorK295K3VFTlg3M0F4bnZ3R3pOdz09IiwibWFjIjoiZWJhMzA3NDNjYTQ0NGU0ZjlmZjBjNmYxODZmODg2Y2FkNDRiODVjYWZkYWI1OTEzNjMwYWUwN2Q1N2EwOTk4ZSIsInRhZyI6IiJ9', NULL, NULL, '2022-07-29 03:32:38', '2022-07-29 05:54:06'),
(7, 'eee', 'eee@eee.eee', NULL, 'eyJpdiI6IlVpNlNiUzc2MnpqTmRsaXBqNjA5MVE9PSIsInZhbHVlIjoiRTdLS3g0SHRXSGtjTS8wMjBkc0w1dz09IiwibWFjIjoiYzhkZTgzZTgwOWQ3NjRkMWQwYTliYzg4YWIwYjA3MmM1MTIzODNhNTc0YjRmMjZhY2JiMmNjN2MwMTFjOTQ2YSIsInRhZyI6IiJ9', NULL, '2022-08-03 05:58:31', '2022-08-02 05:36:15', '2022-08-03 00:13:31'),
(8, 'ypkf1qYS5U', 'nsr1i@v1sf.com', NULL, 'eyJpdiI6IlJzY0xmdVpSelNRSVJ0NlBqeTNwU0E9PSIsInZhbHVlIjoiVllFNjZlQ2MxVUxnenZCaEtoRjVxZz09IiwibWFjIjoiMmFiOWMxM2E3NWUzMGI2Y2UzOTFmMmRlZTNkYjY1MzY0NzBlMmFhNGZhMjhhNTJiMWVkNzZkYjU4N2QzN2VmNiIsInRhZyI6IiJ9', NULL, NULL, '2022-08-02 06:21:10', '2022-08-02 06:21:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
