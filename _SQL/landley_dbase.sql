-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2018 at 07:47 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landley_dbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_04_065928_create_rooms_table', 1),
(4, '2018_12_04_154947_create_residents_table', 1),
(5, '2018_12_04_160155_create_owners_table', 1),
(6, '2018_12_04_160640_create_repairs_table', 1),
(7, '2018_12_05_074851_create_transactions_table', 1),
(8, '2018_12_10_002019_create_violations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `roomNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDate` date DEFAULT NULL,
  `emailAddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `houseNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rep` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repPhoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `room_id`, `roomNo`, `firstName`, `middleName`, `lastName`, `birthDate`, `emailAddress`, `mobileNumber`, `houseNumber`, `barangay`, `municipality`, `province`, `zip`, `rep`, `repPhoneNumber`, `created_at`, `updated_at`) VALUES
(1, 1, 'GF 01', 'VIOLETA', NULL, 'KING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-11 08:18:23', '2018-12-13 08:38:56'),
(2, 2, 'GF 10', 'KENNETH', NULL, 'LU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-11 08:35:12', '2018-12-13 08:38:44'),
(3, 86, 'CA 3B', 'NENITA', NULL, 'PATTAO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-13 08:18:24', '2018-12-13 08:38:15'),
(4, 87, 'BLK 1 616', 'JOHN', NULL, 'MACLI-ING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-13 08:36:51', '2018-12-13 08:37:45'),
(5, 89, '214', 'PERLITA', NULL, 'MARTINEZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-13 08:47:02', '2018-12-13 08:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repairs`
--

CREATE TABLE `repairs` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED DEFAULT NULL,
  `resident_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateReported` date DEFAULT NULL,
  `dateStarted` date DEFAULT NULL,
  `dateFinished` date DEFAULT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endorsedTo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalCost` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `roomNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDate` date DEFAULT NULL,
  `emailAddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `houseNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yearLevel` int(11) DEFAULT NULL,
  `guardian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardianPhoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `room_id`, `roomNo`, `firstName`, `middleName`, `lastName`, `birthDate`, `emailAddress`, `mobileNumber`, `houseNumber`, `barangay`, `municipality`, `province`, `zip`, `school`, `course`, `yearLevel`, `guardian`, `guardianPhoneNumber`, `img`, `created_at`, `updated_at`) VALUES
(1, 1, 'GF 01', 'MARKY', NULL, 'MANDAGAN', '1974-01-17', NULL, '09260294328', NULL, NULL, NULL, NULL, NULL, 'University of Cordilleras', 'BS-ECE', NULL, 'Nympha Mandagan', '09260294328', 'noimage.jpg', '2018-12-11 08:33:56', '2018-12-13 08:40:14'),
(6, 86, 'CA 3B', 'LORIANO', NULL, 'DANILO', '1949-08-28', NULL, '09278422442', '#4 DONA PILAR COMPOUND FILINVEST RD', 'BATASAN HILLS', 'QUEZON CITY', NULL, NULL, NULL, NULL, NULL, 'AYRAH DATUIN', '09278422442', 'noimage.jpg', '2018-12-13 08:19:46', '2018-12-13 08:39:52'),
(3, 2, 'GF 10', 'ALLYZA JEAN', NULL, 'TIANGCO', '1998-01-31', 'allyzajeantiangco@gmail.com', '09151340437', NULL, 'Talavera', 'Nueva Ecija', NULL, NULL, 'University of Baguio', 'Med Tecg', NULL, 'Father', '09976720907', 'noimage.jpg', '2018-12-11 08:33:56', '2018-12-13 08:39:18'),
(7, 87, 'BLK 1 616', 'KIMBERLY ANN', NULL, 'GUILAS', '1999-11-05', 'kimgls@icloud.com', '09482108521', '1277 CAMIA ST.', 'STA. MARIA SUBD', 'MABALACAT CITY', 'PAMPANGA', NULL, NULL, NULL, NULL, 'MYLENE GUILAS', '09062790211', 'noimage.jpg', '2018-12-13 08:42:56', '2018-12-14 16:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `roomNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortTermRent` int(11) NOT NULL,
  `longTermRent` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomNo`, `building`, `status`, `shortTermRent`, `longTermRent`, `size`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 'GF 01', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-10 20:17:05', '2018-12-11 07:52:49'),
(2, 'GF 10', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-10 20:26:36', '2018-12-11 07:50:58'),
(3, '3F 04', 'wharton', 'vacant', 12000, 10000, 20, 2, '2018-12-11 07:51:28', '2018-12-11 07:53:03'),
(4, '4F 07', 'wharton', 'vacant', 12000, 10000, 20, 2, '2018-12-11 07:51:52', '2018-12-11 07:51:52'),
(5, '5F 06', 'wharton', 'vacant', 12000, 10000, 20, 2, '2018-12-11 07:52:17', '2018-12-11 07:54:02'),
(6, 'GF 11', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-11 10:08:01', '2018-12-11 10:08:01'),
(7, 'GF 17', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-11 10:08:35', '2018-12-11 10:08:35'),
(8, 'GF 18', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-11 10:09:15', '2018-12-11 10:09:15'),
(9, 'GF 19', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-11 10:09:38', '2018-12-11 10:09:38'),
(10, 'GF 29', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-11 10:10:09', '2018-12-11 10:10:09'),
(11, '2F-2', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-11 10:10:47', '2018-12-11 10:10:47'),
(12, '2F 3', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-11 10:11:11', '2018-12-11 10:11:11'),
(13, '2F 9', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-11 10:11:43', '2018-12-11 10:11:43'),
(14, '2F 10', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-11 10:12:11', '2018-12-11 10:12:11'),
(15, '2F 12', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-11 10:12:28', '2018-12-11 10:12:28'),
(16, '2F 13', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-11 10:12:44', '2018-12-11 10:12:44'),
(17, '2F 18', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-11 10:14:14', '2018-12-11 10:14:14'),
(19, '2F 27', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:30:23', '2018-12-12 06:30:23'),
(20, '3F 09', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:30:47', '2018-12-12 06:30:47'),
(21, '3F 10', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:31:07', '2018-12-12 06:31:07'),
(22, '3F 12', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:31:22', '2018-12-12 06:31:22'),
(23, '3F 14', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:31:37', '2018-12-12 06:31:37'),
(24, '3F 21', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:32:07', '2018-12-12 06:32:07'),
(25, '3F 28', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:32:22', '2018-12-12 06:32:22'),
(26, '4F 01', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:32:43', '2018-12-12 06:32:43'),
(27, '4F 08', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:33:06', '2018-12-12 06:33:06'),
(28, '4F 20', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:33:26', '2018-12-12 06:33:26'),
(29, '4F 24', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:33:41', '2018-12-12 06:33:41'),
(30, '4F 25', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:33:58', '2018-12-12 06:33:58'),
(31, '5F 01', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:34:25', '2018-12-12 06:34:25'),
(32, '5F 08', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:34:39', '2018-12-12 06:34:39'),
(33, '5F 30', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:34:58', '2018-12-12 06:34:58'),
(34, '5F 18', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:35:18', '2018-12-12 06:35:18'),
(35, '5F 29', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:35:33', '2018-12-12 06:35:33'),
(36, '6F 11', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:35:46', '2018-12-12 06:35:46'),
(37, '6F 13', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:36:00', '2018-12-12 06:36:00'),
(38, '6F 15', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:36:18', '2018-12-12 06:36:18'),
(39, '6F 17', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:36:34', '2018-12-12 06:36:34'),
(40, '6F 26', 'wharton', 'occupied', 12000, 10000, 20, 2, '2018-12-12 06:36:51', '2018-12-12 06:36:51'),
(41, 'LGA East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 06:38:00', '2018-12-12 06:38:00'),
(42, 'LGB East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 06:38:17', '2018-12-12 06:38:17'),
(43, 'LGC East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 06:38:35', '2018-12-12 06:38:35'),
(44, 'LGD East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 06:38:49', '2018-12-12 06:38:49'),
(45, 'LGE East', 'harvard', 'occupied', 7800, 6000, 20, 2, '2018-12-12 06:39:06', '2018-12-12 06:39:06'),
(46, 'LGF East', 'harvard', 'occupied', 7800, 6000, 20, 2, '2018-12-12 06:39:37', '2018-12-12 06:39:37'),
(47, 'LGG East', 'harvard', 'occupied', 7800, 6000, 20, 2, '2018-12-12 06:39:57', '2018-12-12 06:39:57'),
(48, 'LGK East', 'harvard', 'occupied', 7800, 6000, 20, 2, '2018-12-12 06:40:16', '2018-12-12 06:40:16'),
(49, 'LGO East', 'harvard', 'occupied', 7800, 6000, 20, 2, '2018-12-12 06:40:35', '2018-12-12 06:40:35'),
(50, 'LGP East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 06:40:50', '2018-12-12 06:41:32'),
(51, 'LGQ East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 06:41:05', '2018-12-12 06:41:44'),
(52, 'LGR East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 06:41:22', '2018-12-12 06:41:22'),
(53, 'LG 06 West', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:10:50', '2018-12-12 10:10:50'),
(54, 'LGB West', 'harvard', 'occupied', 7800, 6000, 20, 2, '2018-12-12 10:11:07', '2018-12-12 10:11:07'),
(55, 'LGC West', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:11:25', '2018-12-12 10:11:25'),
(56, 'LGG West', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:11:55', '2018-12-12 10:11:55'),
(57, 'LGH West', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:17:37', '2018-12-12 10:17:37'),
(58, 'LGK West', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:17:52', '2018-12-12 10:17:52'),
(59, 'UGA East', 'wharton', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:19:10', '2018-12-12 10:19:10'),
(60, 'UGE East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:19:37', '2018-12-12 10:19:37'),
(61, 'UGG East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:20:20', '2018-12-12 10:20:20'),
(62, 'UGH East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:20:47', '2018-12-12 10:20:47'),
(63, 'UGK East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:21:02', '2018-12-12 10:21:02'),
(64, 'UGL East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:22:09', '2018-12-12 10:22:09'),
(65, 'UGN East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:22:23', '2018-12-12 10:22:23'),
(66, 'UGO East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:22:44', '2018-12-12 10:22:44'),
(67, 'UGP East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:23:05', '2018-12-12 10:23:05'),
(68, 'UGQ East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:23:37', '2018-12-12 10:23:37'),
(69, 'UGR East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:24:17', '2018-12-12 10:24:17'),
(70, 'UGA West', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:24:45', '2018-12-12 10:24:45'),
(71, 'UGB West', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:25:00', '2018-12-12 10:25:42'),
(72, 'UGC West', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:25:16', '2018-12-12 10:25:30'),
(73, 'UGG West', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:26:34', '2018-12-12 10:26:34'),
(74, 'UGI West', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:26:51', '2018-12-12 10:26:51'),
(75, 'UGJ West', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:27:06', '2018-12-12 10:27:06'),
(76, 'GLA East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:27:23', '2018-12-12 10:27:23'),
(77, 'GLB East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:27:48', '2018-12-12 10:27:48'),
(78, 'GLC East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:28:01', '2018-12-12 10:28:01'),
(79, 'GLE East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:28:16', '2018-12-12 10:28:16'),
(80, 'GLG East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:28:30', '2018-12-12 10:28:30'),
(81, 'GLI East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:29:31', '2018-12-12 10:29:31'),
(82, 'GLJ East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:29:55', '2018-12-12 10:29:55'),
(83, 'GLK East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:30:10', '2018-12-12 10:30:10'),
(84, 'GLL East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 10:30:29', '2018-12-12 10:30:29'),
(85, 'GLP East', 'harvard', 'occupied', 7800, 6000, 15, 2, '2018-12-12 11:02:14', '2018-12-12 11:02:14'),
(86, 'CA 3B', 'colorado', 'occupied', 9000, 8000, 25, 2, '2018-12-13 08:17:55', '2018-12-13 08:17:55'),
(87, 'BLK 1 616', 'manors', 'occupied', 17000, 16000, 25, 2, '2018-12-13 08:36:26', '2018-12-13 08:36:26'),
(88, 'BLK 1 614', 'manors', 'occupied', 16000, 15000, 25, 2, '2018-12-13 08:44:51', '2018-12-13 08:44:51'),
(89, '214', 'loft', 'occupied', 16000, 15000, 15, 2, '2018-12-13 08:46:27', '2018-12-13 08:46:27'),
(90, 'BLK 1 518', 'manors', 'occupied', 17000, 16000, 25, 2, '2018-12-13 08:50:21', '2018-12-13 08:50:21'),
(91, '209', 'loft', 'occupied', 14000, 13000, 25, 2, '2018-12-13 08:50:50', '2018-12-13 08:50:50'),
(92, 'BLK 2 512', 'manors', 'occupied', 17000, 16000, 25, 2, '2018-12-13 08:51:18', '2018-12-13 08:51:18'),
(93, 'BLK 1 117', 'manors', 'occupied', 16000, 15000, 25, 2, '2018-12-13 08:51:46', '2018-12-13 08:51:46'),
(94, 'CC 3D', 'colorado', 'occupied', 16000, 15000, 25, 2, '2018-12-13 08:52:12', '2018-12-13 08:52:12'),
(95, '202 D', 'manors', 'occupied', 14000, 13000, 25, 2, '2018-12-13 08:53:08', '2018-12-13 08:53:08'),
(96, 'CB 4B', 'arkansas', 'occupied', 17600, 16400, 25, 2, '2018-12-13 08:53:40', '2018-12-13 08:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `transDate` date NOT NULL,
  `room_id` int(10) UNSIGNED DEFAULT NULL,
  `resident_id` int(10) UNSIGNED DEFAULT NULL,
  `transStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moveInDate` date NOT NULL,
  `moveOutDate` date NOT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initialSecDep` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transDate`, `room_id`, `resident_id`, `transStatus`, `moveInDate`, `moveOutDate`, `term`, `initialSecDep`, `created_at`, `updated_at`) VALUES
(4, '2018-12-11', 2, 3, 'active', '2018-01-20', '2019-01-20', 'longTerm', 2000, '2018-12-11 08:34:45', '2018-12-11 08:34:45'),
(3, '2018-12-11', 1, 1, 'active', '2016-12-28', '2019-05-28', 'longTerm', 0, '2018-12-11 08:24:35', '2018-12-11 08:24:35'),
(6, '2018-02-13', 86, 6, 'active', '2018-02-13', '2019-02-13', 'longTerm', 0, '2018-12-13 08:35:14', '2018-12-13 08:35:14'),
(7, '2018-12-13', 87, 7, 'active', '2018-09-22', '2018-09-22', 'longTerm', 0, '2018-12-13 08:43:52', '2018-12-13 08:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `mobileNumber`, `position`, `email_verified_at`, `password`, `img`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Landley', 'Bernardo', 'webmaster@marthaservices.com', '09752826318', 'leasingOfficer', '2018-12-10 20:16:49', '$2y$10$eQHyAynILS5j.4CNW03UhuZpamMDN.LpBe4uVKw7ouUWZEkbPahe6', NULL, 'QuLvW2tB1yJ5YxENo0PZcjTVwgSs33srWyqRzsEbl5kuET4JYYT1jKOUKKkc', '2018-12-10 20:15:35', '2018-12-10 20:16:49'),
(2, 'Arleen', 'Fatton', 'leasingassist@marthaservices.com', '09461620033', 'leasingOfficer', '2018-12-11 06:00:00', '$2y$10$I0BJqfTlHjj1nWLwbabh0OywsGTLeIYvKnFWJ/jPeHhdPZjqkJUhG', NULL, 'S7Px1Crquz3GolojwzpKLVJ66mxAFulbmLdkmo0f7fTX1DwpyDoDoPHMd12m', '2018-12-12 07:49:41', '2018-12-12 07:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE `violations` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED DEFAULT NULL,
  `resident_id` int(10) UNSIGNED DEFAULT NULL,
  `dateReported` date DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateCommitted` date DEFAULT NULL,
  `reportedBy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fine` int(11) DEFAULT NULL,
  `actionTaken` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owners_emailaddress_unique` (`emailAddress`),
  ADD UNIQUE KEY `owners_mobilenumber_unique` (`mobileNumber`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repairs_room_id_foreign` (`room_id`),
  ADD KEY `repairs_resident_id_foreign` (`resident_id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `residents_emailaddress_unique` (`emailAddress`),
  ADD UNIQUE KEY `residents_mobilenumber_unique` (`mobileNumber`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_roomno_unique` (`roomNo`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_room_id_foreign` (`room_id`),
  ADD KEY `transactions_resident_id_foreign` (`resident_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobilenumber_unique` (`mobileNumber`);

--
-- Indexes for table `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `violations_room_id_foreign` (`room_id`),
  ADD KEY `violations_resident_id_foreign` (`resident_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `repairs`
--
ALTER TABLE `repairs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
