-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 10:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(3, 'habibi', '1740749130.png', '2025-02-28 07:25:30', '2025-02-28 07:25:30'),
(4, 'fhk', '1740753077.png', '2025-02-28 08:31:17', '2025-02-28 08:31:17'),
(6, 'grre', '1740753103.png', '2025-02-28 08:31:43', '2025-02-28 08:31:43'),
(7, 'ddd', '1740754306.png', '2025-02-28 08:51:46', '2025-02-28 08:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:2;', 1740668535),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1740668535;', 1740668535),
('ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4', 'i:1;', 1740517405),
('ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4:timer', 'i:1740517405;', 1740517405),
('c1dfd96eea8cc2b62785275bca38ac261256e278', 'i:1;', 1740517679),
('c1dfd96eea8cc2b62785275bca38ac261256e278:timer', 'i:1740517678;', 1740517678);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(23, 3, 14, '2025-02-24 03:58:32', '2025-02-24 03:58:32'),
(26, 3, 13, '2025-02-24 04:59:04', '2025-02-24 04:59:04'),
(27, 3, 12, '2025-02-24 04:59:04', '2025-02-24 04:59:04'),
(28, 3, 6, '2025-02-24 11:54:53', '2025-02-24 11:54:53'),
(29, 3, 5, '2025-02-24 11:54:58', '2025-02-24 11:54:58'),
(40, 1, 14, '2025-02-27 13:25:27', '2025-02-27 13:25:27'),
(41, 1, 14, '2025-02-27 15:49:22', '2025-02-27 15:49:22'),
(42, 1, 14, '2025-02-28 04:56:36', '2025-02-28 04:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Men', '2025-02-19 13:08:11', '2025-02-19 13:08:11'),
(4, 'Women', '2025-02-19 13:17:49', '2025-02-19 13:17:49'),
(11, 'Electronic', '2025-02-21 12:53:46', '2025-02-21 12:53:46'),
(12, 'Kids', '2025-02-23 12:06:44', '2025-02-23 12:06:44'),
(13, 'Watch', '2025-02-24 14:44:55', '2025-02-24 14:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_19_175035_create_categories_table', 2),
(5, '2025_02_21_160749_create_products_table', 3),
(6, '2025_02_23_121700_create_carts_table', 4),
(8, '2025_02_24_071953_create_orders_table', 5),
(9, '2025_02_27_152201_add_payment_status_to_orders_table', 6),
(10, '2025_02_27_151747_add_payment_status_to_orders_table--table=orders', 7),
(11, '2025_02_28_125350_create_banners_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'in Progress',
  `code` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'cash on delivery',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `status`, `code`, `user_id`, `product_id`, `payment_status`, `created_at`, `updated_at`) VALUES
(6, 'omer', '001234', 'badhhn', 'Delivered', NULL, 3, 5, 'cash on delivery', NULL, '2025-02-25 04:42:46'),
(7, 'weed', '014141014', 'dhaka', 'On The Way', NULL, 1, 6, 'cash on delivery', '2025-02-25 02:50:30', '2025-02-25 04:33:45'),
(8, 'salman', '01145022', 'sdarq ', 'in Progress', NULL, 3, 12, 'cash on delivery', NULL, NULL),
(9, 'rock', '10212551', 'bnkwjl mwjbkjwn', 'in Progress', NULL, 1, 10, 'cash on delivery', '2025-02-25 02:50:35', NULL),
(11, 'Omer Bin Wahid Latifi', '0162826516', 'bashundhara', 'in Progress', NULL, 1, 5, 'cash on delivery', '2025-02-27 13:15:31', '2025-02-27 13:15:31'),
(12, 'Omer Bin Wahid Latifi', '0162826516', 'bashundhara', 'in Progress', NULL, 1, 14, 'cash on delivery', '2025-02-27 13:15:31', '2025-02-27 13:15:31'),
(13, 'Omer Bin Wahid Latifi', '0162826516', 'bashundhara', 'in Progress', NULL, 1, 14, 'Paid', '2025-02-27 13:20:14', '2025-02-27 13:20:14'),
(14, 'Omer Bin Wahid Latifi', '0162826516', 'bashundhara', 'in Progress', NULL, 1, 13, 'Paid', '2025-02-27 13:20:14', '2025-02-27 13:20:14'),
(15, 'Omer Bin Wahid Latifi', '0162826516', 'bashundhara', 'On The Way', NULL, 1, 12, 'Paid', '2025-02-27 13:20:15', '2025-02-27 16:01:35'),
(16, 'Omer Bin Wahid Latifi', '0162826516', 'bashundhara', 'Delivered', NULL, 1, 14, 'Paid', '2025-02-27 13:22:25', '2025-02-27 16:01:31'),
(17, 'Omer Bin Wahid Latifi', '0162826516', 'bashundhara', 'in Progress', NULL, 1, 13, 'Paid', '2025-02-27 13:22:25', '2025-02-27 13:22:25'),
(18, 'Omer Bin Wahid Latifi', '0162826516', 'bashundhara', 'Delivered', NULL, 1, 12, 'Paid', '2025-02-27 13:22:25', '2025-02-27 16:01:24'),
(19, 'Omer Bin Wahid Latifi', '0162826516', 'bashundhara', 'On The Way', NULL, 1, 10, 'Paid', '2025-02-27 13:22:25', '2025-02-27 16:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('mdtahim1234@gmail.com', '$2y$12$SPMOHbrXlaKNtQS2Pd1tuew1M9ZPjuYSfwcdGsS6MOh9eIPQlz49a', '2025-02-25 13:36:06'),
('omerlatifi6637@gmail.com', '$2y$12$r43Kc/zyg.gtMCaoDRwzduv7oXXlPYxnOURSLoou10OQW1ENuc6CG', '2025-02-25 13:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `category`, `quantity`, `created_at`, `updated_at`) VALUES
(5, 'Pant', 'Export Quality', '1740222641.jpg', '1000', 'Women', '12', '2025-02-22 05:10:41', '2025-02-22 05:10:41'),
(6, 'One PLUS', 'Best Forever', '1740232618.jpeg', '10000', 'Electronic', '12', '2025-02-22 07:56:58', '2025-02-22 07:56:58'),
(10, 'Router', 'Tp Link Super Laptop', '1740239972.png', '1000', 'Electronic', '10', '2025-02-22 08:18:51', '2025-02-22 09:59:32'),
(12, 'watch', 'fdgetgd dfgert', '1740333708.png', '500', 'Electronic', '50', '2025-02-23 12:01:48', '2025-02-23 12:01:48'),
(13, 'Product Nfdsfame', 'safasf', '1740333863.png', '1200', 'Kids', '10', '2025-02-23 12:04:23', '2025-02-23 12:04:23'),
(14, 'Formal Pant', 'Seems like Hero\'s Pant', '1740335817.jpg', '10000', 'Men', '5', '2025-02-23 12:36:57', '2025-02-23 12:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('akLMTC1GaBWdvsB4p5J7DOTTg7NecoUXgFbBPSjy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS3I4VjJkaEdwaWxlTWhZdzQ5VEVFaDVNU2lqZVkxb3o1SkFuRWhwcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9fQ==', 1740754314),
('w1GFTFsryHNV2qlfNmMN2GnRMXNMmvNqFyOx6Ffj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid3BUUEU2WE8wVFNBd1R1a29GY3R6NUFwMlJPZkUydkF4eEIwYTUyaSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740779766);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `usertype`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Omer Bin Wahid Latifi', 'user', 'omerlatifi6637@gmail.com', '0162826516', 'bashundhara', '2025-02-27 09:01:59', '$2y$12$bw/UvX5jaAznSdwEuf8GcudRSrnAFdf1DhwdUBikULb9UJL.r4/L6', NULL, '2025-02-17 02:13:37', '2025-02-27 09:01:59'),
(2, 'Omer latifi', 'admin', 'mdtahim1234@gmail.com', '018866', 'Bashundhara', NULL, '$2y$12$AJyHmiSBaNCPmEn/9ZdEeuOIubv8PkD2hhhpeFSpksqsrV/L5rQqy', NULL, '2025-02-17 02:23:45', '2025-02-17 02:23:45'),
(3, 'Boss', 'user', 'omer420@gmail.com', '01628265168', 'হাসান হোল্ডিংস (১৫ তলা) ৫২/১ নিউ ইস্কাটন রোড, ঢাকা-১০০', NULL, '$2y$12$.C9rjw9NgABYQjI2qVWiJ.OH64YAr31nMLWiXYRNYC6EBZbY4ana2', NULL, '2025-02-23 02:57:03', '2025-02-23 02:57:03'),
(5, 'ron', 'user', 'ron.production.bd@gmail.com', '01628265166', 'Bashundhara', NULL, '$2y$12$PG0pL7Fy.0p3EGqwfWINA.7NjrN4bZBif0mAZx3mVxwJcuRDTBE8e', NULL, '2025-02-25 14:58:44', '2025-02-25 14:58:44'),
(6, 'iqra', 'user', 'iqrazaman6637@gmail.com', '01628265166', 'Bashundhara', '2025-02-25 15:06:59', '$2y$12$iSZ6OvTCKIGbQpZYAJhl6Oco91rLDosYgBRchoRa8ntv/6ZAcA1Q6', NULL, '2025-02-25 15:06:03', '2025-02-25 15:06:59'),
(7, 'Omer Bin Wahid Latifi', 'user', 'mehedihasan545@gmail.com', '01628265168', 'Bashundhara', NULL, '$2y$12$msE/B7dlFsr99n65mXfxK.R/f2771c3g2z8EEvEtyUeMyFcI6qzm2', NULL, '2025-02-25 15:39:51', '2025-02-25 15:39:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
