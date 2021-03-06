-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 12:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$IlqK567HAyX.qwL8I9OuieKmbslSGCJCxVXV0gluVgb.cKoxpIF1G', '2021-07-28 11:27:02', '2021-07-29 10:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `total` float NOT NULL,
  `payment` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_user`, `id_customer`, `date_order`, `total`, `payment`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-07-24', 260000, 'COD', NULL, -1, '2021-07-30 11:10:14', '2021-07-30 10:12:01'),
(2, 2, 2, '2021-07-29', 1040000, 'ATM', NULL, 2, '2021-07-30 11:10:12', '2021-07-29 11:23:03'),
(3, 1, 5, '2021-07-30', 1440000, 'ATM', NULL, 0, '2021-07-30 11:04:09', '2021-07-30 11:04:09'),
(4, 1, 6, '2021-07-30', 1030000, 'ATM', NULL, 0, '2021-07-30 11:06:52', '2021-07-30 11:06:52'),
(5, 1, 8, '2021-07-30', 240000, 'COD', NULL, 0, '2021-07-30 11:09:10', '2021-07-30 11:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 260000, '2021-07-29 06:05:29', '2021-07-24 09:51:43'),
(2, 2, 2, 2, 260000, '2021-07-29 06:06:56', '2021-07-29 06:06:29'),
(3, 2, 7, 2, 260000, '2021-07-29 06:06:57', '2021-07-29 06:06:29'),
(4, 3, 4, 1, 260000, '2021-07-30 11:04:09', '2021-07-30 11:04:09'),
(5, 3, 5, 1, 260000, '2021-07-30 11:04:09', '2021-07-30 11:04:09'),
(6, 3, 6, 1, 280000, '2021-07-30 11:04:09', '2021-07-30 11:04:09'),
(7, 3, 47, 1, 340000, '2021-07-30 11:04:09', '2021-07-30 11:04:09'),
(8, 3, 49, 1, 300000, '2021-07-30 11:04:09', '2021-07-30 11:04:09'),
(9, 4, 31, 1, 350000, '2021-07-30 11:06:52', '2021-07-30 11:06:52'),
(10, 4, 33, 1, 380000, '2021-07-30 11:06:52', '2021-07-30 11:06:52'),
(11, 4, 34, 1, 300000, '2021-07-30 11:06:52', '2021-07-30 11:06:52'),
(12, 5, 16, 1, 240000, '2021-07-30 11:09:10', '2021-07-30 11:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(1, 'L?? Ng???c Ho??ng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 08:26:30', '2021-07-24 09:51:43'),
(2, 'L?? Ng???c Ho??ng', 'Men', '19t1021077@husc.edu.vn', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 08:26:34', '2021-07-29 06:06:29'),
(3, 'L?? Ng???c Ho??ng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 10:12:49', '2021-07-30 10:12:49'),
(4, 'L?? Ng???c Ho??ng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 11:03:47', '2021-07-30 11:03:47'),
(5, 'L?? Ng???c Ho??ng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 11:04:09', '2021-07-30 11:04:09'),
(6, 'L?? Ng???c Ho??ng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 11:06:52', '2021-07-30 11:06:52'),
(7, 'L?? Ng???c Ho??ng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 11:07:23', '2021-07-30 11:07:23'),
(8, 'L?? Ng???c Ho??ng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 11:09:10', '2021-07-30 11:09:10');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_08_24_172321_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('2de1a0f443da78134a0cbb7c498102be36e7fde35791a9c2692f80ad06350fb70dafc722a8e86e0e', 3, '943aa033-ec18-48f8-a16b-a7a6ae5526fd', NULL, '[]', 0, '2021-08-24 09:20:21', '2021-08-24 09:20:21', '2022-08-24 16:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('943aa033-da57-4fd0-93cc-0a0dc8582cfb', NULL, 'Laravel Personal Access Client', '3Tdl89JBkj2r6MANudrHi1rLaqB2kwuiwU3iwA09', NULL, 'http://localhost', 1, 0, 0, '2021-08-24 08:52:47', '2021-08-24 08:52:47'),
('943aa033-ec18-48f8-a16b-a7a6ae5526fd', NULL, 'Laravel Password Grant Client', 'NhidWs0AdfSw3rJvGff9eF0nyFNUi940FjB7x6lK', 'users', 'http://localhost', 0, 1, 0, '2021-08-24 08:52:47', '2021-08-24 08:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(12, '943aa033-da57-4fd0-93cc-0a0dc8582cfb', '2021-08-24 08:52:47', '2021-08-24 08:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('992c17c5a476de23fc65d1a567dcd53dcd34301a321f06a7b8402fc00b660bbe471071db21d3cc5b', '2de1a0f443da78134a0cbb7c498102be36e7fde35791a9c2692f80ad06350fb70dafc722a8e86e0e', 0, '2022-08-24 16:20:21');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` float NOT NULL,
  `promotion_price` float NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(1, '??o thun Venus', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 220000, 'ao-thun-1.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-29 10:14:52'),
(2, '??o thun ??en tr??n', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 260000, 'ao-thun-2.jpg', '??o', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(3, '??o thun cotton', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 220000, 'ao-thun-3.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(4, '??o thun Teelab H?? N???i', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 0, 'ao-thun-4.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(5, '??o thun Asos', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 0, 'ao-thun-5.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(6, '??o thun OverDose', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 280000, 'ao-thun-6.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(7, '??o thun n??? tay l???', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 0, 'ao-thun-7.jpg', '??o', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(8, '??o thun tr??n t??m', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 250000, 'ao-thun-8.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(9, '??o thun NY/MLB', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 250000, 'ao-thun-9.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(10, '??o thun Dior', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 0, 'ao-thun-10.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(11, '??o thun Celine', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 280000, 'ao-thun-11.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(12, '??o thun tay l??? m??o', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 280000, 'ao-thun-12.jpg', '??o', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(13, '??o thun Wash Acid', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 280000, 'ao-thun-13.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(14, '??o thun tr???ng Th??i Lan', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 320000, 'ao-thun-14.jpg', '??o', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(15, '??o thun Arizona', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 220000, 'ao-thun-15.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(16, '??o ph??ng form r???ng', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 240000, 'ao-phong-1.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(17, '??o ph??ng Mixi', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 0, 'ao-phong-2.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(18, '??o ph??ng Slam', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 0, 'ao-phong-3.jpg', '??o', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(19, '??o ph??ng phi h??nh gia', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 0, 'ao-phong-4.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(20, '??o ph??ng tr??n tr???ng', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 250000, 'ao-phong-5.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(21, '??o ph??ng du l???ch', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 250000, 'ao-phong-6.jpg', '??o', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(22, '??o ph??ng n??? n?? th??u ch???', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 0, 'ao-phong-7.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(23, '??o ph??ng Chorme', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 0, 'ao-phong-8.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(24, '??o ph??ng Oversize', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 270000, 'ao-phong-9.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(25, '??o ph??ng Loose l???ch c??? sau', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 0, 'ao-phong-10.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(26, '??o ph??ng Ori tr??n tr???ng', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 280000, 'ao-phong-11.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(27, '??o ph??ng Comfort Plus', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 220000, 0, 'ao-phong-12.jpg', '??o', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(28, '??o ph??ng Pitbull', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 0, 'ao-phong-13.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(29, '??o ph??ng MLB xanh loang m??u', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 250000, 'ao-phong-14.jpg', '??o', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(30, '??o ph??ng m??o Samurai', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 250000, 'ao-phong-15.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(31, '??o s?? mi c??ng s???', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 380000, 350000, 'ao-so-mi-1.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(32, '??o s?? mi tay ng???n', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 380000, 350000, 'ao-so-mi-2.jpg', '??o', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(33, '??o s?? mi tr??n Lados', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 380000, 0, 'ao-so-mi-3.jpg', '??o', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(34, '??o s?? mi c??? t??u', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 300000, 'ao-so-mi-4.jpg', '??o', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(35, '??o s?? mi ??en d??i tay', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 300000, 'ao-so-mi-5.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(36, '??o s?? mi n??? tr???ng', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 300000, 'ao-so-mi-6.jpg', '??o', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(37, '??o s?? mi Jeep', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 330000, 'ao-so-mi-7.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(38, '??o s?? mi Oxford c??? c??i n??t', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 330000, 'ao-so-mi-8.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(39, '??o s?? mi n??? n??t b???c', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 330000, 'ao-so-mi-9.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(40, '??o s?? mi c??? ve ng???n tay', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 330000, 'ao-so-mi-10.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(41, '??o s?? mi Thom Browne', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 330000, 'ao-so-mi-11.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(42, '??o s?? mi t??m', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 0, 'ao-so-mi-12.jpg', '??o', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(43, '??o s?? mi ??en tr???ng', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 0, 'ao-so-mi-13.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(44, '??o s?? mi n??? h???ng', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 0, 'ao-so-mi-14.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(45, '??o s?? mi ??en k??? s???c', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 0, 'ao-so-mi-15.jpg', '??o', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(46, 'Qu???n jean n??? ???ng r???ng', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 340000, 0, 'quan-jean-1.jpg', 'qu???n', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(47, 'Qu???n jean xanh r??ch', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 340000, 0, 'quan-jean-2.jpg', 'qu???n', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(48, 'Qu???n jean xanh tr???ng', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 300000, 'quan-jean-3.jpg', 'qu???n', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(49, 'Qu???n jean xanh nh???t r??ch ?????u g???i', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 300000, 'quan-jean-4.jpg', 'qu???n', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(50, 'Qu???n jean n??? xanh bi???n', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-5.jpg', 'qu???n', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(51, 'Qu???n jean Yody', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-6.jpg', 'qu???n', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(52, 'Qu???n jean x??m ??en', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-7.jpg', 'qu???n', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(53, 'Qu???n jean skinny', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-8.jpg', 'qu???n', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(54, 'Qu???n jean in logo', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-9.jpg', 'qu???n', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(55, 'Qu???n jean slim cropped r??ch g???i', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-10.jpg', 'qu???n', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(56, 'Qu???n jean n??? l??ng cao', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-11.jpg', 'qu???n', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(57, 'Qu???n jean Vi???t Ti???n', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 400000, 380000, 'quan-jean-12.jpg', 'qu???n', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(58, 'Qu???n jean n??? 9 t???c', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 0, 'quan-jean-13.jpg', 'qu???n', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(59, 'Qu???n jean x??m', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 0, 'quan-jean-14.jpg', 'qu???n', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(60, 'Qu???n jean n??? ???ng su??ng', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 320000, 'quan-jean-15.jpg', 'qu???n', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(61, 'V??y ti???u th?? tr???ng tr??? vai', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 450000, 420000, 'vay-1.jpg', 'v??y', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(62, 'V??y x??e th???t n??', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 450000, 420000, 'vay-2.jpg', 'v??y', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(63, 'V??y Charme c??ng ch??a', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 420000, 0, 'vay-3.jpg', 'v??y', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(64, 'Ch??n v??y ng???n', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 460000, 450000, 'vay-4.jpg', 'v??y', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(65, 'Ch??n v??y 2 t???ng', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 460000, 0, 'vay-5.jpg', 'v??y', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(66, 'Ch??n v??y nhung ????nh c??c', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 450000, 449000, 'vay-6.jpg', 'v??y', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(67, 'Ch??n v??y d??i x??e nh??n', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 430000, 0, 'vay-7.jpg', 'v??y', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(68, 'V??y x??e xanh li???n th??n', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 435000, 0, 'vay-8.jpg', 'v??y', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(69, 'V??y loan c??? tim 5 t???ng', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 490000, 0, 'vay-9.jpg', 'v??y', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(70, 'Ch??n v??y ng???n th??? thao', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 475000, 455000, 'vay-10.jpg', 'v??y', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(71, 'V??y x??e ??en li???n th??n', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 465000, 460000, 'vay-11.jpg', 'v??y', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(72, 'V??y mullet', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 450000, 0, 'vay-12.jpg', 'v??y', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(73, 'V??y x??e hoa nh??n ch??n', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 410000, 0, 'vay-13.jpg', 'v??y', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(74, 'Ch??n v??y ch??? A', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 400000, 0, 'vay-14.jpg', 'v??y', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(75, 'Ch??n v??y nhung', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 425000, 424000, 'vay-15.jpg', 'v??y', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'index', 'slider-image-01.png', '2021-07-26 12:49:10', '2021-07-26 12:49:10'),
(2, 'index', 'slider-image-02.png', '2021-07-26 12:49:10', '2021-07-26 12:49:10'),
(3, 'index', 'slider-image-03.png', '2021-07-26 12:49:10', '2021-07-26 12:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '??o thun', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 'ao-thun.jpg', NULL, NULL),
(2, '??o ph??ng', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 'ao-phong.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, '??o s?? mi', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 'ao-so-mi.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Qu???n jean', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 'quan-jean.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'V??y', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 'vay.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'M??', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', '', '2016-10-25 17:19:00', NULL),
(7, 'Gi??y', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', '', '2016-10-25 17:19:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'L?? Ng???c Ho??ng', 'lengochoang681@gmail.com', NULL, '$2y$10$OsSi2VPv0i8PhgOyC0pIge.EYnHiEnLIKrFQq/Zk7de7RWfiOARva', '0935229074', '134 Truong Chinh St.', NULL, '2021-07-28 02:25:29', '2021-07-30 01:52:58'),
(2, 'Ho??ng L?? Ng???c', '19t1021077@husc.edu.vn', NULL, '$2y$10$EY5ArVYAcpQZZYqsEIyMPOiQlGFLhJqzzEu0X.0AST4FK.LvGElVe', '0935229074', '134 Truong Chinh St.', NULL, '2021-07-28 02:47:04', '2021-07-28 03:55:23'),
(3, 'user', 'example@gmail.com', NULL, '$2y$10$Wv3J.COOuejx5a0UYiO3/.6xky4L4Ue0JNdfc.Sa0zHr92o6mBDP2', '0123456789', '1 St.', NULL, '2021-07-30 02:48:50', '2021-07-30 02:48:50'),
(4, 'admin', 'admin@gmail.com', NULL, '$2y$10$bKkv79e3wqa4MLyaOJ6LyerYRX2L8.rx9NYlmPz1xZFXcbimS4wr2', '0123456789', '2 St.', NULL, '2021-08-19 04:03:47', '2021-08-19 04:03:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`),
  ADD KEY `bills_ibfk_3` (`id_user`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
