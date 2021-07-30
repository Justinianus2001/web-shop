-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 01:14 PM
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
(1, 'Lê Ngọc Hoàng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 08:26:30', '2021-07-24 09:51:43'),
(2, 'Lê Ngọc Hoàng', 'Men', '19t1021077@husc.edu.vn', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 08:26:34', '2021-07-29 06:06:29'),
(3, 'Lê Ngọc Hoàng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 10:12:49', '2021-07-30 10:12:49'),
(4, 'Lê Ngọc Hoàng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 11:03:47', '2021-07-30 11:03:47'),
(5, 'Lê Ngọc Hoàng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 11:04:09', '2021-07-30 11:04:09'),
(6, 'Lê Ngọc Hoàng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 11:06:52', '2021-07-30 11:06:52'),
(7, 'Lê Ngọc Hoàng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 11:07:23', '2021-07-30 11:07:23'),
(8, 'Lê Ngọc Hoàng', 'Men', 'lengochoang681@gmail.com', '134 Truong Chinh St.', '0935229074', NULL, '2021-07-30 11:09:10', '2021-07-30 11:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Áo thun Venus', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 220000, 'ao-thun-1.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-29 10:14:52'),
(2, 'Áo thun đen trơn', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 260000, 'ao-thun-2.jpg', 'áo', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(3, 'Áo thun cotton', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 220000, 'ao-thun-3.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(4, 'Áo thun Teelab Hà Nội', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 0, 'ao-thun-4.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(5, 'Áo thun Asos', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 0, 'ao-thun-5.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(6, 'Áo thun OverDose', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 280000, 'ao-thun-6.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(7, 'Áo thun nữ tay lỡ', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 0, 'ao-thun-7.jpg', 'áo', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(8, 'Áo thun trơn tím', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 250000, 'ao-thun-8.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(9, 'Áo thun NY/MLB', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 250000, 'ao-thun-9.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(10, 'Áo thun Dior', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 0, 'ao-thun-10.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(11, 'Áo thun Celine', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 280000, 'ao-thun-11.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(12, 'Áo thun tay lỡ mèo', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 280000, 'ao-thun-12.jpg', 'áo', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(13, 'Áo thun Wash Acid', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 280000, 'ao-thun-13.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(14, 'Áo thun trắng Thái Lan', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 320000, 'ao-thun-14.jpg', 'áo', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(15, 'Áo thun Arizona', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 220000, 'ao-thun-15.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(16, 'Áo phông form rộng', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 240000, 'ao-phong-1.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(17, 'Áo phông Mixi', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 0, 'ao-phong-2.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(18, 'Áo phông Slam', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 0, 'ao-phong-3.jpg', 'áo', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(19, 'Áo phông phi hành gia', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 0, 'ao-phong-4.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(20, 'Áo phông trơn trắng', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 250000, 'ao-phong-5.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(21, 'Áo phông du lịch', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 260000, 250000, 'ao-phong-6.jpg', 'áo', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(22, 'Áo phông nữ nơ thêu chữ', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 0, 'ao-phong-7.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(23, 'Áo phông Chorme', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 0, 'ao-phong-8.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(24, 'Áo phông Oversize', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 270000, 'ao-phong-9.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(25, 'Áo phông Loose lệch cổ sau', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 250000, 0, 'ao-phong-10.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(26, 'Áo phông Ori trơn trắng', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 280000, 'ao-phong-11.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(27, 'Áo phông Comfort Plus', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 220000, 0, 'ao-phong-12.jpg', 'áo', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(28, 'Áo phông Pitbull', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 0, 'ao-phong-13.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(29, 'Áo phông MLB xanh loang màu', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 250000, 'ao-phong-14.jpg', 'áo', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(30, 'Áo phông mèo Samurai', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 280000, 250000, 'ao-phong-15.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(31, 'Áo sơ mi công sở', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 380000, 350000, 'ao-so-mi-1.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(32, 'Áo sơ mi tay ngắn', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 380000, 350000, 'ao-so-mi-2.jpg', 'áo', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(33, 'Áo sơ mi trơn Lados', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 380000, 0, 'ao-so-mi-3.jpg', 'áo', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(34, 'Áo sơ mi cổ tàu', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 300000, 'ao-so-mi-4.jpg', 'áo', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(35, 'Áo sơ mi đen dài tay', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 300000, 'ao-so-mi-5.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(36, 'Áo sơ mi nữ trắng', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 300000, 'ao-so-mi-6.jpg', 'áo', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(37, 'Áo sơ mi Jeep', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 330000, 'ao-so-mi-7.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(38, 'Áo sơ mi Oxford cổ cài nút', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 330000, 'ao-so-mi-8.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(39, 'Áo sơ mi nữ nút bọc', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 330000, 'ao-so-mi-9.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(40, 'Áo sơ mi cổ ve ngắn tay', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 330000, 'ao-so-mi-10.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(41, 'Áo sơ mi Thom Browne', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 330000, 'ao-so-mi-11.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(42, 'Áo sơ mi tím', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 0, 'ao-so-mi-12.jpg', 'áo', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(43, 'Áo sơ mi đen trắng', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 0, 'ao-so-mi-13.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(44, 'Áo sơ mi nữ hồng', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 0, 'ao-so-mi-14.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(45, 'Áo sơ mi đen kẻ sọc', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 0, 'ao-so-mi-15.jpg', 'áo', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(46, 'Quần jean nữ ống rộng', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 340000, 0, 'quan-jean-1.jpg', 'quần', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(47, 'Quần jean xanh rách', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 340000, 0, 'quan-jean-2.jpg', 'quần', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(48, 'Quần jean xanh trắng', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 300000, 'quan-jean-3.jpg', 'quần', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(49, 'Quần jean xanh nhạt rách đầu gối', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 320000, 300000, 'quan-jean-4.jpg', 'quần', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(50, 'Quần jean nữ xanh biển', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-5.jpg', 'quần', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(51, 'Quần jean Yody', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-6.jpg', 'quần', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(52, 'Quần jean xám đen', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-7.jpg', 'quần', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(53, 'Quần jean skinny', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-8.jpg', 'quần', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(54, 'Quần jean in logo', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-9.jpg', 'quần', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(55, 'Quần jean slim cropped rách gối', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-10.jpg', 'quần', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(56, 'Quần jean nữ lưng cao', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 0, 'quan-jean-11.jpg', 'quần', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(57, 'Quần jean Việt Tiến', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 400000, 380000, 'quan-jean-12.jpg', 'quần', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(58, 'Quần jean nữ 9 tấc', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 0, 'quan-jean-13.jpg', 'quần', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(59, 'Quần jean xám', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 300000, 0, 'quan-jean-14.jpg', 'quần', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(60, 'Quần jean nữ ống suông', 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 350000, 320000, 'quan-jean-15.jpg', 'quần', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(61, 'Váy tiểu thư trắng trễ vai', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 450000, 420000, 'vay-1.jpg', 'váy', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(62, 'Váy xòe thắt nơ', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 450000, 420000, 'vay-2.jpg', 'váy', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(63, 'Váy Charme công chúa', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 420000, 0, 'vay-3.jpg', 'váy', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(64, 'Chân váy ngắn', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 460000, 450000, 'vay-4.jpg', 'váy', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(65, 'Chân váy 2 tầng', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 460000, 0, 'vay-5.jpg', 'váy', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(66, 'Chân váy nhung đính cúc', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 450000, 449000, 'vay-6.jpg', 'váy', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(67, 'Chân váy dài xòe nhún', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 430000, 0, 'vay-7.jpg', 'váy', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(68, 'Váy xòe xanh liền thân', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 435000, 0, 'vay-8.jpg', 'váy', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(69, 'Váy loan cổ tim 5 tầng', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 490000, 0, 'vay-9.jpg', 'váy', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(70, 'Chân váy ngắn thể thao', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 475000, 455000, 'vay-10.jpg', 'váy', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(71, 'Váy xòe đen liền thân', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 465000, 460000, 'vay-11.jpg', 'váy', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(72, 'Váy mullet', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 450000, 0, 'vay-12.jpg', 'váy', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(73, 'Váy xòe hoa nhún chân', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 410000, 0, 'vay-13.jpg', 'váy', 1, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(74, 'Chân váy chữ A', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 400000, 0, 'vay-14.jpg', 'váy', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22'),
(75, 'Chân váy nhung', 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 425000, 424000, 'vay-15.jpg', 'váy', 0, '2021-07-24 12:02:22', '2021-07-24 12:02:22');

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
(1, 'Áo thun', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 'ao-thun.jpg', NULL, NULL),
(2, 'Áo phông', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 'ao-phong.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'Áo sơ mi', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 'ao-so-mi.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Quần jean', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 'quan-jean.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'Váy', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', 'vay.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'Mũ', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', '', '2016-10-25 17:19:00', NULL),
(7, 'Giày', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi blanditiis iure doloribus labore.', '', '2016-10-25 17:19:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lê Ngọc Hoàng', 'lengochoang681@gmail.com', '$2y$10$OsSi2VPv0i8PhgOyC0pIge.EYnHiEnLIKrFQq/Zk7de7RWfiOARva', '0935229074', '134 Truong Chinh St.', NULL, '2021-07-28 09:25:29', '2021-07-30 08:52:58'),
(2, 'Hoàng Lê Ngọc', '19t1021077@husc.edu.vn', '$2y$10$EY5ArVYAcpQZZYqsEIyMPOiQlGFLhJqzzEu0X.0AST4FK.LvGElVe', '0935229074', '134 Truong Chinh St.', NULL, '2021-07-28 09:47:04', '2021-07-28 10:55:23'),
(3, 'user', 'example@gmail.com', '$2y$10$Wv3J.COOuejx5a0UYiO3/.6xky4L4Ue0JNdfc.Sa0zHr92o6mBDP2', '0123456789', '1 St.', NULL, '2021-07-30 09:48:50', '2021-07-30 09:48:50');

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
