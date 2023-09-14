-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 03:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus-ticket-manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_company_published_ticket`
--

CREATE TABLE `bus_company_published_ticket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `b_comp_ticket_from` varchar(255) NOT NULL,
  `b_comp_ticket_to` varchar(255) NOT NULL,
  `b_comp_ticket_seat` int(11) NOT NULL,
  `b_comp_ticket_date` datetime NOT NULL,
  `b_comp_ticket_price` int(11) NOT NULL,
  `b_comp_ticket_author_id` int(11) NOT NULL,
  `b_comp_ticket_author_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `all_seats` longtext NOT NULL,
  `empty_seats` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_company_published_ticket`
--

INSERT INTO `bus_company_published_ticket` (`id`, `b_comp_ticket_from`, `b_comp_ticket_to`, `b_comp_ticket_seat`, `b_comp_ticket_date`, `b_comp_ticket_price`, `b_comp_ticket_author_id`, `b_comp_ticket_author_name`, `created_at`, `updated_at`, `all_seats`, `empty_seats`) VALUES
(36, 'Dhaka', 'Dhaka', 40, '2023-08-15 21:24:00', 1000, 5, 'bus1', '2023-08-15 15:16:13', '2023-08-15 15:16:13', 'a:40:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:11;i:12;i:12;i:13;i:13;i:14;i:14;i:15;i:15;i:16;i:16;i:17;i:17;i:18;i:18;i:19;i:19;i:20;i:20;i:21;i:21;i:22;i:22;i:23;i:23;i:24;i:24;i:25;i:25;i:26;i:26;i:27;i:27;i:28;i:28;i:29;i:29;i:30;i:30;i:31;i:31;i:32;i:32;i:33;i:33;i:34;i:34;i:35;i:35;i:36;i:36;i:37;i:37;i:38;i:38;i:39;i:39;i:40;}', 'a:40:{i:1;b:1;i:2;b:0;i:3;b:0;i:4;b:0;i:5;b:1;i:6;b:0;i:7;b:0;i:8;b:0;i:9;b:0;i:10;b:0;i:11;b:0;i:12;b:0;i:13;b:0;i:14;b:0;i:15;b:0;i:16;b:0;i:17;b:0;i:18;b:0;i:19;b:0;i:20;b:0;i:21;b:0;i:22;b:0;i:23;b:0;i:24;b:0;i:25;b:0;i:26;b:0;i:27;b:0;i:28;b:0;i:29;b:0;i:30;b:0;i:31;b:0;i:32;b:0;i:33;b:0;i:34;b:0;i:35;b:0;i:36;b:0;i:37;b:0;i:38;b:0;i:39;b:0;i:40;b:0;}'),
(37, 'Rajshahi', 'Rajshahi', 4, '2023-08-17 21:30:00', 999, 5, 'bus1', '2023-08-15 15:18:00', '2023-08-15 15:18:00', 'a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;}', 'a:4:{i:1;b:1;i:2;b:0;i:3;b:0;i:4;b:0;}'),
(38, 'Rajshahi', 'Rajshahi', 36, '2023-08-18 22:12:00', 998, 5, 'bus1', '2023-08-15 16:12:20', '2023-08-15 16:12:20', 'a:36:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:11;i:12;i:12;i:13;i:13;i:14;i:14;i:15;i:15;i:16;i:16;i:17;i:17;i:18;i:18;i:19;i:19;i:20;i:20;i:21;i:21;i:22;i:22;i:23;i:23;i:24;i:24;i:25;i:25;i:26;i:26;i:27;i:27;i:28;i:28;i:29;i:29;i:30;i:30;i:31;i:31;i:32;i:32;i:33;i:33;i:34;i:34;i:35;i:35;i:36;}', 'a:36:{i:1;b:0;i:2;b:0;i:3;b:0;i:4;b:0;i:5;b:0;i:6;b:0;i:7;b:0;i:8;b:0;i:9;b:0;i:10;b:0;i:11;b:0;i:12;b:0;i:13;b:0;i:14;b:0;i:15;b:0;i:16;b:0;i:17;b:0;i:18;b:0;i:19;b:0;i:20;b:0;i:21;b:0;i:22;b:0;i:23;b:0;i:24;b:0;i:25;b:0;i:26;b:0;i:27;b:0;i:28;b:0;i:29;b:0;i:30;b:0;i:31;b:0;i:32;b:0;i:33;b:0;i:34;b:0;i:35;b:0;i:36;b:0;}');

-- --------------------------------------------------------

--
-- Table structure for table `bus_routes`
--

CREATE TABLE `bus_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_routes`
--

INSERT INTO `bus_routes` (`id`, `route_name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', NULL, NULL),
(3, 'Rajshahi', NULL, NULL),
(4, 'Barishal', NULL, NULL),
(5, 'Rangpur', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) NOT NULL,
  `bus_comp_id` bigint(20) NOT NULL,
  `bus_comp_name` varchar(255) NOT NULL,
  `shopping_item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `b_comp_ticket_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `ticket_id`, `bus_comp_id`, `bus_comp_name`, `shopping_item_id`, `quantity`, `created_at`, `updated_at`, `b_comp_ticket_date`) VALUES
(24, 6, 36, 5, 'bus1', 1030, 4, '2023-08-15 15:16:52', '2023-08-15 15:22:29', '2023-08-15 21:24:00'),
(25, 6, 37, 5, 'bus1', 1033, 2, '2023-08-15 15:22:21', '2023-08-15 16:09:18', '2023-08-17 21:30:00'),
(26, 6, 36, 5, 'bus1', 1031, 3, '2023-08-15 15:22:29', '2023-08-15 15:22:29', '2023-08-15 21:24:00'),
(27, 6, 36, 5, 'bus1', 1032, 1, '2023-08-15 15:22:29', '2023-08-15 15:22:29', '2023-08-15 21:24:00'),
(28, 6, 36, 5, 'bus1', 1034, 3, '2023-08-15 15:22:30', '2023-08-15 15:22:30', '2023-08-15 21:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_bought_ticket`
--

CREATE TABLE `customer_bought_ticket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TicketID` bigint(20) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `bus_comp_id` bigint(20) UNSIGNED NOT NULL,
  `bus_comp_name` varchar(255) NOT NULL,
  `number_of_seats` int(11) NOT NULL,
  `cancel_ticket_request` tinyint(1) NOT NULL DEFAULT 0,
  `seats` longtext NOT NULL,
  `total_price` int(11) NOT NULL,
  `b_comp_ticket_date` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_bought_ticket`
--

INSERT INTO `customer_bought_ticket` (`id`, `TicketID`, `customer_id`, `customer_name`, `bus_comp_id`, `bus_comp_name`, `number_of_seats`, `cancel_ticket_request`, `seats`, `total_price`, `b_comp_ticket_date`, `updated_at`, `created_at`) VALUES
(94, 37, 6, 'aa', 5, 'bus1', 36, 0, 'a:1:{i:0;s:1:\"4\";}', 999, '2023-08-17 15:30:00', '2023-08-15 16:09:41', '2023-08-15 16:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `customer_ticket`
--

CREATE TABLE `customer_ticket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_04_140412_create_customer_ticket_table', 1),
(7, '2023_07_04_140751_create_bus_company_published_ticket_table', 1),
(8, '2023_07_04_141035_create_bus_routes_table', 1),
(9, '2023_07_04_144610_create_add_role_to_users_table', 1),
(10, '2023_07_11_080003_create_shopping_items_table', 2),
(11, '2023_07_11_083322_create_shopping_items_table', 3),
(17, '2023_07_11_095804_create_shopping_items_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('kazialrefatpranta@gmail.com', '$2y$10$q1H5n1ihC.i6whtitOihKOTUtdHbo0NvJ4oRlFWTOCQ2cOKoWqGYa', '2023-08-11 08:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` bigint(20) UNSIGNED NOT NULL,
  `bus_comp_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `customer_name` varchar(20) NOT NULL,
  `company_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `bus_comp_id`, `customer_id`, `review`, `rating`, `created_at`, `updated_at`, `customer_name`, `company_name`) VALUES
(22, 2, 6, 'nice interior', 4, '2023-08-15 15:57:15', '2023-08-15 15:57:15', 'aa', 'bds'),
(23, 5, 6, 'good bus', 5, '2023-08-15 15:57:35', '2023-08-15 15:57:35', 'aa', 'bus1'),
(24, 5, 6, '12', 1, '2023-08-15 16:09:54', '2023-08-15 16:09:54', 'aa', 'bus1');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_items`
--

CREATE TABLE `shopping_items` (
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) NOT NULL,
  `bus_comp_id` bigint(20) NOT NULL,
  `bus_comp_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopping_items`
--

INSERT INTO `shopping_items` (`item_id`, `ticket_id`, `bus_comp_id`, `bus_comp_name`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1030, 36, 5, 'bus1', 'water', 10.00, '2023-08-15 15:16:27', '2023-08-15 15:16:27'),
(1031, 36, 5, 'bus1', 'coke', 10.00, '2023-08-15 15:18:13', '2023-08-15 15:18:13'),
(1032, 36, 5, 'bus1', 'banana', 10.00, '2023-08-15 15:18:18', '2023-08-15 15:18:18'),
(1033, 37, 5, 'bus1', 'coke', 10.00, '2023-08-15 15:18:29', '2023-08-15 15:18:29'),
(1034, 36, 5, 'bus1', 'banana', 10.00, '2023-08-15 15:18:36', '2023-08-15 15:18:36'),
(1035, 38, 5, 'bus1', 'chips', 10.00, '2023-08-15 16:12:58', '2023-08-15 16:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'u', 'user1@bracu.com', NULL, '$2y$10$ZFcdpjjyYcqpbOxCk4Ot6OI.1MdBDGYW56DdDHEGJnAveD7R6nvGq', 'mzW6WusG90szSIaYBq6GuvshP0SMEW8yLreR5WSCL13TlkdXekfUXFRZ7UKr', '2023-07-04 08:51:46', '2023-08-11 06:49:49', 'Customer'),
(2, 'bds', 'abc@gmail.com', NULL, '$2y$10$c5d4Lq1zFIiZhDIIQ2gGxuqK.Glce2vu6ukoymyFkj5VjjrmB9CsS', NULL, '2023-07-04 09:53:09', '2023-08-07 08:36:37', 'Brand'),
(3, 'admin', 'admin@gmail.com', NULL, '$2y$10$eivgX1T1x/ubzRJ7z6BD/elViUpEm6wd9x1LxqiPp5ThgxyqxNTtS', NULL, '2023-07-30 06:06:38', '2023-07-30 06:06:38', 'Admin'),
(4, 'qwe', 'qwe@gmail.com', NULL, '$2y$10$H3f1WSNFtRaX78..aPDnjespTIjTfeL/e7E7m3kzsFy6.MbjNdRl.', NULL, '2023-08-07 08:41:58', '2023-08-07 08:41:58', 'Customer'),
(5, 'buss', 'bus@gmail.com', NULL, '$2y$10$3cng7pdsFqdueQRmxvh0SuQ/EH/pGrI/1qUWkvAwo0cwrc8yRSQay', '97eFBUsN17DngnJNZBfAmVeKLxcWC5Xfr7WsfWy2Ye83Cn6NZUUBmLcpBYz6', '2023-08-07 08:51:28', '2023-08-15 16:13:21', 'Brand'),
(6, 'aaaaa', 'a@a.com', NULL, '$2y$10$VWlEzpj54ZTo15NtkI.lbetGF3Q178Gdy7DRAswTIfBF0C3OP8Ecy', NULL, '2023-08-10 22:34:43', '2023-08-15 16:10:13', 'Customer'),
(7, 'pranta', 'kazialrefatpranta@gmail.com', NULL, '$2y$10$WBJiHBZpyyCGXathqMR9fehAsZNVcd6H0zsOdfSc2F3fkmVeYKSmm', NULL, '2023-08-11 08:31:48', '2023-08-11 08:31:48', 'Customer'),
(8, 'user', 'user@gmail.com', NULL, '$2y$10$HBxYKLE1nvtU4pUizigHmuRKLZfJzUkg8CyzzDSBrmwszEkMBADza', NULL, '2023-08-14 07:56:11', '2023-08-14 12:40:29', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_company_published_ticket`
--
ALTER TABLE `bus_company_published_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_user_id_foreign` (`user_id`);

--
-- Indexes for table `customer_bought_ticket`
--
ALTER TABLE `customer_bought_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_ticket`
--
ALTER TABLE `customer_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `shopping_items`
--
ALTER TABLE `shopping_items`
  ADD PRIMARY KEY (`item_id`);

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
-- AUTO_INCREMENT for table `bus_company_published_ticket`
--
ALTER TABLE `bus_company_published_ticket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `bus_routes`
--
ALTER TABLE `bus_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer_bought_ticket`
--
ALTER TABLE `customer_bought_ticket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `customer_ticket`
--
ALTER TABLE `customer_ticket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `shopping_items`
--
ALTER TABLE `shopping_items`
  MODIFY `item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1036;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
