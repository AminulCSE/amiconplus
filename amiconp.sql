-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 25, 2020 at 02:29 AM
-- Server version: 8.0.18
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amiconp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `created_at`, `updated_at`) VALUES
(1, 'maj noor', '0176932150', 'majnoor@gmail.com', 'Coxbazar', NULL, NULL),
(2, 'Abul', '4325345345', 'abul@gmail.com', 'Syleth', NULL, NULL),
(5, 'Kader', '01785656656', 'kader@gmail.com', 'Syleth cantonment', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `email`, `designation`, `basic_salary`, `address`, `image`, `created_at`, `updated_at`) VALUES
(9, 'Md Ripon', '0178215452', 'ripon2020@gmail.com', 'Worker/ Mechnic', '12000', 'Barishal', 'admin/images/employees/1680306775181515.png', '2020-10-11 19:16:55', '2020-10-11 19:16:55'),
(8, 'Aminul islam peal', '01787377982', 'pealrana63@gmail.com', 'Designer/ Manager', NULL, 'Kishoreganj, Gochihata, Danapatoly', 'admin/images/employees/1680306572099138.jpg', '2020-10-11 19:13:41', '2020-10-11 19:13:41'),
(10, 'Sohel', '01784825825', 'sohel@gmail.com', 'Mistry/ Mechanic', NULL, 'Issharganj, Mymensight', 'admin/images/employees/1680306829578313.png', '2020-10-11 19:17:47', '2020-10-11 19:17:47'),
(11, 'Monir', '01782854562', 'monir@gmail.com', 'Leaver/ Helper', NULL, 'Syleth', 'admin/images/employees/1680306886702615.png', '2020-10-11 19:18:41', '2020-10-11 19:18:41'),
(12, 'Tanvir', '01782854562', 'tanivir@gmail.com', 'Customer Service', NULL, 'Barishal', 'admin/images/employees/1680306968846844.png', '2020-10-11 19:19:59', '2020-10-11 19:19:59'),
(13, 'Liton', '01832453824', 'liton@gmail.com', 'Sales Representative', '15000', 'Barishal', 'admin/images/employees/1680307092897160.png', '2020-10-11 19:21:58', '2020-10-11 19:21:58'),
(15, 'Peal', '017856546566', 'peal@gmail.com', 'Designer', '15000', 'Kishoreganj, Gochihata, Danapatoly', 'admin/images/employees/1680687604471564.png', '2020-10-16 00:10:02', '2020-10-16 00:10:02'),
(16, 'Riaz', '01478454656', 'riaz@gmail.com', 'Saler', '15000', 'Nuakhali', 'admin/images/employees/1681216546371468.png', '2020-10-21 20:17:20', '2020-10-21 20:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `emply_attendances`
--

DROP TABLE IF EXISTS `emply_attendances`;
CREATE TABLE IF NOT EXISTS `emply_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `att_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `att_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `att_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emply_attendances`
--

INSERT INTO `emply_attendances` (`id`, `user_id`, `att_date`, `att_year`, `att_month`, `attendance`, `overtime`, `edit_date`, `created_at`, `updated_at`) VALUES
(80, 16, '24/10/20', '2020', 'October', 'Friday', NULL, '24_10_20', '2020-10-24 16:17:19', NULL),
(79, 15, '24/10/20', '2020', 'October', 'Friday', NULL, '24_10_20', '2020-10-24 16:17:19', NULL),
(78, 13, '24/10/20', '2020', 'October', 'Friday', NULL, '24_10_20', '2020-10-24 16:17:19', NULL),
(77, 12, '24/10/20', '2020', 'October', 'Friday', NULL, '24_10_20', '2020-10-24 16:17:19', NULL),
(76, 11, '24/10/20', '2020', 'October', 'Friday', NULL, '24_10_20', '2020-10-24 16:17:19', NULL),
(75, 10, '24/10/20', '2020', 'October', 'Friday', NULL, '24_10_20', '2020-10-24 16:17:19', NULL),
(74, 8, '24/10/20', '2020', 'October', 'Friday', NULL, '24_10_20', '2020-10-24 16:17:19', NULL),
(73, 9, '24/10/20', '2020', 'October', 'Friday', NULL, '24_10_20', '2020-10-24 16:17:19', NULL),
(72, 16, '23/10/20', '2020', 'October', 'Present', NULL, '23_10_20', '2020-10-23 03:35:28', '2020-10-23 01:11:39'),
(71, 15, '23/10/20', '2020', 'October', 'Friday', NULL, '23_10_20', '2020-10-23 03:35:28', NULL),
(70, 13, '23/10/20', '2020', 'October', 'Friday', NULL, '23_10_20', '2020-10-23 03:35:28', NULL),
(69, 12, '23/10/20', '2020', 'October', 'Friday', NULL, '23_10_20', '2020-10-23 03:35:28', NULL),
(68, 11, '23/10/20', '2020', 'October', 'Friday', NULL, '23_10_20', '2020-10-23 03:35:28', NULL),
(67, 10, '23/10/20', '2020', 'October', 'Friday', NULL, '23_10_20', '2020-10-23 03:35:28', NULL),
(66, 8, '23/10/20', '2020', 'October', 'Friday', NULL, '23_10_20', '2020-10-23 03:35:28', NULL),
(65, 9, '23/10/20', '2020', 'October', 'Friday', NULL, '23_10_20', '2020-10-23 03:35:28', NULL),
(64, 13, '16/10/20', '2020', 'October', 'Friday', '7', '16_10_20', '2020-10-16 05:36:41', '2020-10-23 01:11:27'),
(63, 12, '16/10/20', '2020', 'October', 'Friday', '5', '16_10_20', '2020-10-16 05:36:41', '2020-10-15 23:48:01'),
(62, 11, '16/10/20', '2020', 'October', 'Friday', '4', '16_10_20', '2020-10-16 05:36:41', '2020-10-15 23:54:25'),
(61, 10, '16/10/20', '2020', 'October', 'Friday', '2', '16_10_20', '2020-10-16 05:36:41', '2020-10-15 23:48:01'),
(60, 8, '16/10/20', '2020', 'October', 'Friday', '5', '16_10_20', '2020-10-16 05:36:41', '2020-10-15 23:54:32'),
(59, 9, '16/10/20', '2020', 'October', 'Friday', '3', '16_10_20', '2020-10-16 05:36:41', '2020-10-15 23:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_09_030106_create_employees_table', 2),
(7, '2020_10_09_101518_create_empl_attendances_table', 3),
(8, '2020_10_10_020528_create_emply_attendances_table', 4),
(9, '2020_10_11_165948_create_orders_table', 5),
(10, '2020_10_16_062914_create_salaries_table', 5),
(11, '2020_10_23_092920_create_customers_table', 5),
(12, '2020_10_23_112150_create_orders_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dalivary_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `customer_id`, `order_description`, `quantity`, `unit_price`, `discount`, `paid`, `dalivary_date`, `order_month`, `order_year`, `order_status`, `created_at`, `updated_at`) VALUES
(1, '23/October/2020', '1', '1. Baking crest 7\"x9\" shagorer dau. golden fram chingri.', '2', '2500', '10', '1000', '2020-10-26', 'October', '2020', '0', NULL, NULL),
(2, '23/October/2020', '2', '1. honour board namepalte ss 26g', '2', '500', NULL, NULL, '2020-10-27', 'October', '2020', '0', NULL, NULL),
(3, '23/October/2020', '1', '1.sdfsdfsdfsdfsdfsdfsdf', '3', '200', '20', '180', '2020-10-27', 'October', '2020', '1', NULL, NULL),
(4, '23/October/2020', '1', '1. ll rights reserved.ll rights reserved.ll rights reserved.', '10', '520', '20', '500', '2020-10-28', 'October', '2020', '1', NULL, NULL),
(5, '23/October/2020', '2', 'sdfsdf', '3', '120', NULL, '250', '2020-10-29', 'October', '2020', '0', NULL, NULL),
(6, '24/October/2020', '1', 'sdfsdf', '43', '33', '3', '33', '2020-10-25', 'October', '2020', '0', NULL, NULL),
(7, '24/October/2020', '5', '1. Stone namplate 21\"x29\" size white stone.', '4', '10000', NULL, '15000', '2020-10-25', '', '', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

DROP TABLE IF EXISTS `salaries`;
CREATE TABLE IF NOT EXISTS `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `total_salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime_salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aminul islam peal', 'pealrana63@gmail.com', NULL, '$2y$10$poNHU6jef2plKciSDnMNQOmQLT6hYk3SmdmJmZfQGA58wxgf7UECK', NULL, '2020-10-09 04:21:42', '2020-10-09 04:21:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
