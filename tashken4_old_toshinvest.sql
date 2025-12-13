-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2025 at 09:56 PM
-- Server version: 10.4.34-MariaDB-log-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tashken4_old_toshinvest`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_users`
--

CREATE TABLE `api_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_by` mediumint(9) NOT NULL,
  `token_valid_period` mediumint(9) NOT NULL DEFAULT 10,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Renovation Projects', 'renovation-projects', '2024-12-11 18:00:32', '2024-12-11 18:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name_uz` varchar(255) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `region_id`, `name_uz`, `name_ru`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Uchtepa', 'Учтепинский', '01', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(2, 1, 'Bektemir', 'Бектемирский', '02', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(3, 1, 'Chilonzor', 'Чиланзарский', '03', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(4, 1, 'Yashnobod', 'Яшнабадский', '04', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(5, 1, 'Yakkasaroy', 'Яккасарайский', '05', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(6, 1, 'Sergeli', 'Сергелийский', '06', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(7, 1, 'Yunusobod', 'Юнусабадский', '07', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(8, 1, 'Olmazor', 'Олмазарский', '08', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(9, 1, 'Mirzo Ulug‘bek', 'Мирзо Улугбекский', '09', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(10, 1, 'Shayxontohur', 'Шайхантахурский', '10', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(11, 1, 'Mirobod', 'Мирабадский', '11', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(12, 1, 'Yangihayot', 'Янгихаётский', '12', '2024-12-11 18:00:31', '2024-12-11 18:00:31');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `field` varchar(255) NOT NULL,
  `old_value` text DEFAULT NULL,
  `new_value` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `model_type`, `model_id`, `field`, `old_value`, `new_value`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Project', 7, 'elon_fayl', 'not_exists', 'project_images/pratakol/H4Vl7tyFWi6sIK6MeaZf9tUYuDft8DjtP27AzPtl.pdf', 1, '2024-12-11 18:15:46', '2024-12-11 18:15:46'),
(2, 'App\\Models\\Project', 7, 'status', '1_step', 'step_1', 1, '2024-12-11 18:15:46', '2024-12-11 18:15:46'),
(3, 'App\\Models\\Project', 7, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:15:46', 1, '2024-12-11 18:15:46', '2024-12-11 18:15:46'),
(4, 'App\\Models\\Project', 8, 'elon_fayl', 'not_exists', 'project_images/pratakol/8kf9Vdaf1AHQPIUGxZuW6YCKmlZ0vQehdU4ts6Og.pdf', 1, '2024-12-11 18:17:00', '2024-12-11 18:17:00'),
(5, 'App\\Models\\Project', 8, 'status', '1_step', 'step_1', 1, '2024-12-11 18:17:00', '2024-12-11 18:17:00'),
(6, 'App\\Models\\Project', 8, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:17:00', 1, '2024-12-11 18:17:00', '2024-12-11 18:17:00'),
(7, 'App\\Models\\Project', 9, 'elon_fayl', 'not_exists', 'project_images/pratakol/DCBpVynRERWkuhIT0x9hw04ZW8V8bvahEyV9zw5C.pdf', 1, '2024-12-11 18:17:57', '2024-12-11 18:17:57'),
(8, 'App\\Models\\Project', 9, 'status', '1_step', 'step_1', 1, '2024-12-11 18:17:57', '2024-12-11 18:17:57'),
(9, 'App\\Models\\Project', 9, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:17:57', 1, '2024-12-11 18:17:57', '2024-12-11 18:17:57'),
(10, 'App\\Models\\Project', 10, 'elon_fayl', 'not_exists', 'project_images/pratakol/VuOr0p5MaoZu2yehsR26PiOCZcgVOXgEr2gmdKKr.pdf', 1, '2024-12-11 18:18:11', '2024-12-11 18:18:11'),
(11, 'App\\Models\\Project', 10, 'status', '1_step', 'step_1', 1, '2024-12-11 18:18:11', '2024-12-11 18:18:11'),
(12, 'App\\Models\\Project', 10, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:18:11', 1, '2024-12-11 18:18:11', '2024-12-11 18:18:11'),
(13, 'App\\Models\\Project', 11, 'elon_fayl', 'not_exists', 'project_images/pratakol/UN8YC1VfQJzKnhKWN6QPE6u9liDzI3CgcXLjNegO.pdf', 1, '2024-12-11 18:19:01', '2024-12-11 18:19:01'),
(14, 'App\\Models\\Project', 11, 'status', '1_step', 'step_1', 1, '2024-12-11 18:19:01', '2024-12-11 18:19:01'),
(15, 'App\\Models\\Project', 11, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:19:01', 1, '2024-12-11 18:19:01', '2024-12-11 18:19:01'),
(16, 'App\\Models\\Project', 12, 'elon_fayl', 'not_exists', 'project_images/pratakol/BaxQs3hjizyP824JZjikfkLTSHtuwHfMTEOmNTsj.pdf', 1, '2024-12-11 18:19:13', '2024-12-11 18:19:13'),
(17, 'App\\Models\\Project', 12, 'status', '1_step', 'step_1', 1, '2024-12-11 18:19:13', '2024-12-11 18:19:13'),
(18, 'App\\Models\\Project', 12, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:19:13', 1, '2024-12-11 18:19:13', '2024-12-11 18:19:13'),
(19, 'App\\Models\\Project', 13, 'elon_fayl', 'not_exists', 'project_images/pratakol/eKyuKuTjGHxbbAQFJgrlbBvXS5GcV8wOMJMaqjNb.pdf', 1, '2024-12-11 18:19:25', '2024-12-11 18:19:25'),
(20, 'App\\Models\\Project', 13, 'status', '1_step', 'step_1', 1, '2024-12-11 18:19:25', '2024-12-11 18:19:25'),
(21, 'App\\Models\\Project', 13, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:19:25', 1, '2024-12-11 18:19:25', '2024-12-11 18:19:25'),
(22, 'App\\Models\\Project', 14, 'deleted', '{\"id\":14,\"category_id\":null,\"unique_number\":null,\"district\":null,\"street\":null,\"mahalla\":null,\"land\":null,\"investor_initiative_date\":null,\"company_name\":null,\"contact_person\":null,\"hokim_resolution_no\":null,\"elon_fayl\":null,\"pratakol_fayl\":null,\"qoshimcha_fayl\":null,\"implementation_period\":null,\"status\":null,\"srok_realizatsi\":null,\"start_date\":null,\"end_date\":null,\"second_stage_start_date\":null,\"second_stage_end_date\":null,\"created_at\":\"2024-12-11T16:00:32.000000Z\",\"updated_at\":\"2024-12-11T16:00:32.000000Z\"}', NULL, 1, '2024-12-11 18:19:38', '2024-12-11 18:19:38'),
(23, 'App\\Models\\Project', 28, 'deleted', '{\"id\":28,\"category_id\":null,\"unique_number\":null,\"district\":null,\"street\":null,\"mahalla\":null,\"land\":null,\"investor_initiative_date\":null,\"company_name\":null,\"contact_person\":null,\"hokim_resolution_no\":null,\"elon_fayl\":null,\"pratakol_fayl\":null,\"qoshimcha_fayl\":null,\"implementation_period\":null,\"status\":null,\"srok_realizatsi\":null,\"start_date\":null,\"end_date\":null,\"second_stage_start_date\":null,\"second_stage_end_date\":null,\"created_at\":\"2024-12-11T16:00:32.000000Z\",\"updated_at\":\"2024-12-11T16:00:32.000000Z\"}', NULL, 1, '2024-12-11 18:19:44', '2024-12-11 18:19:44'),
(24, 'App\\Models\\Project', 15, 'elon_fayl', 'not_exists', 'project_images/pratakol/0hvkgHf9COn5LRuFZ9Jp4FOHhRrBcdbdOe3JY6Oq.pdf', 1, '2024-12-11 18:21:54', '2024-12-11 18:21:54'),
(25, 'App\\Models\\Project', 15, 'pratakol_fayl', 'not_exists', 'project_images/zikrhtt5C4WlIDMpX6gFAiMbl1rZ9KuwJjO5xpVO.pdf', 1, '2024-12-11 18:21:54', '2024-12-11 18:21:54'),
(26, 'App\\Models\\Project', 15, 'status', '2_step', 'step_1', 1, '2024-12-11 18:21:54', '2024-12-11 18:21:54'),
(27, 'App\\Models\\Project', 15, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:21:54', 1, '2024-12-11 18:21:54', '2024-12-11 18:21:54'),
(28, 'App\\Models\\Project', 16, 'district', 'Сергелийский ', 'Сергелийский', 1, '2024-12-11 18:22:57', '2024-12-11 18:22:57'),
(29, 'App\\Models\\Project', 16, 'elon_fayl', 'not_exists', 'project_images/pratakol/yVHpinLiW1R4FzcHiFDiZROGZeClSKC2QH1keXG2.pdf', 1, '2024-12-11 18:22:57', '2024-12-11 18:22:57'),
(30, 'App\\Models\\Project', 16, 'pratakol_fayl', 'not_exists', 'project_images/O9cKbneC0Gu6wRplL8ubtS4UBAg3fEckiPPPB3ZM.pdf', 1, '2024-12-11 18:22:57', '2024-12-11 18:22:57'),
(31, 'App\\Models\\Project', 16, 'status', '2_step', 'step_1', 1, '2024-12-11 18:22:57', '2024-12-11 18:22:57'),
(32, 'App\\Models\\Project', 16, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:22:57', 1, '2024-12-11 18:22:57', '2024-12-11 18:22:57'),
(33, 'App\\Models\\Project', 17, 'elon_fayl', 'not_exists', 'project_images/pratakol/rdc3vi0ENFNZP8S98jSj1W8D92mLMZw2kvWDRBKC.pdf', 1, '2024-12-11 18:23:52', '2024-12-11 18:23:52'),
(34, 'App\\Models\\Project', 17, 'pratakol_fayl', 'not_exists', 'project_images/HkjkCHczeGUYEZV1DD1fYA62FeN4Mrnwhavzrls9.pdf', 1, '2024-12-11 18:23:52', '2024-12-11 18:23:52'),
(35, 'App\\Models\\Project', 17, 'status', '2_step', 'step_1', 1, '2024-12-11 18:23:52', '2024-12-11 18:23:52'),
(36, 'App\\Models\\Project', 17, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:23:52', 1, '2024-12-11 18:23:52', '2024-12-11 18:23:52'),
(37, 'App\\Models\\Project', 18, 'elon_fayl', 'not_exists', 'project_images/pratakol/Py90u0I1iviym29eAVVfFPdI3NtYDswxP2hXL2WV.pdf', 1, '2024-12-11 18:25:15', '2024-12-11 18:25:15'),
(38, 'App\\Models\\Project', 18, 'pratakol_fayl', 'not_exists', 'project_images/Zk1Z7S6UtqbVb4uhKbkOJOTeVna2rjVWm3gjvgKZ.pdf', 1, '2024-12-11 18:25:15', '2024-12-11 18:25:15'),
(39, 'App\\Models\\Project', 18, 'status', '2_step', 'step_1', 1, '2024-12-11 18:25:15', '2024-12-11 18:25:15'),
(40, 'App\\Models\\Project', 18, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:25:15', 1, '2024-12-11 18:25:15', '2024-12-11 18:25:15'),
(41, 'App\\Models\\Project', 19, 'district', 'Мирабадский ', 'Мирабадский', 1, '2024-12-11 18:31:55', '2024-12-11 18:31:55'),
(42, 'App\\Models\\Project', 19, 'elon_fayl', 'not_exists', 'project_images/pratakol/IwGFuIUBMPbpY3nve4ZYeLKG1t2c0meDy0O9dKrV.pdf', 1, '2024-12-11 18:31:55', '2024-12-11 18:31:55'),
(43, 'App\\Models\\Project', 19, 'pratakol_fayl', 'not_exists', 'project_images/uj7SbCI3HvC8xOOJAiGr8StwEBG4bvSWPnijEeld.jpg', 1, '2024-12-11 18:31:55', '2024-12-11 18:31:55'),
(44, 'App\\Models\\Project', 19, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:31:55', 1, '2024-12-11 18:31:55', '2024-12-11 18:31:55'),
(45, 'App\\Models\\Project', 20, 'elon_fayl', 'not_exists', 'project_images/pratakol/clcArK7Sf31OyxR7bY2prvvDfkyKWfeCbcNBUKgz.pdf', 1, '2024-12-11 18:34:10', '2024-12-11 18:34:10'),
(46, 'App\\Models\\Project', 20, 'pratakol_fayl', 'not_exists', 'project_images/jm7oVx0C2Z9CACXUlrETWfGDxQhxeMhbyj6TuBNW.pdf', 1, '2024-12-11 18:34:10', '2024-12-11 18:34:10'),
(47, 'App\\Models\\Project', 20, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:34:10', 1, '2024-12-11 18:34:10', '2024-12-11 18:34:10'),
(48, 'App\\Models\\Project', 21, 'elon_fayl', 'not_exists', 'project_images/pratakol/dAS3knvot2fVYek1A7eXV5EiWqzYAF6aJt3ZzBuo.pdf', 1, '2024-12-11 18:35:22', '2024-12-11 18:35:22'),
(49, 'App\\Models\\Project', 21, 'pratakol_fayl', 'not_exists', 'project_images/NiOHSPxdaXgnypS2lDdlcJuXTvV14ZjOkPQ5bEun.pdf', 1, '2024-12-11 18:35:22', '2024-12-11 18:35:22'),
(50, 'App\\Models\\Project', 21, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:35:22', 1, '2024-12-11 18:35:22', '2024-12-11 18:35:22'),
(51, 'App\\Models\\Project', 22, 'elon_fayl', 'not_exists', 'project_images/pratakol/2Z1c84qFqGsJqdZi9AEFlqHT2qkGmacLUq7rHF7c.pdf', 1, '2024-12-11 18:40:59', '2024-12-11 18:40:59'),
(52, 'App\\Models\\Project', 22, 'pratakol_fayl', 'not_exists', 'project_images/kcnRkDu4o5EbvkxIlu36I7FRqw4x6vjTdS5pG5n7.pdf', 1, '2024-12-11 18:40:59', '2024-12-11 18:40:59'),
(53, 'App\\Models\\Project', 22, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:40:59', 1, '2024-12-11 18:40:59', '2024-12-11 18:40:59'),
(54, 'App\\Models\\Project', 23, 'district', 'Чиланзарский ', 'Чиланзарский', 1, '2024-12-11 18:41:58', '2024-12-11 18:41:58'),
(55, 'App\\Models\\Project', 23, 'elon_fayl', 'not_exists', 'project_images/pratakol/6V2Q1ee18U2u00hifQzSm6K8z60bZj4NIMUpmIGY.pdf', 1, '2024-12-11 18:41:58', '2024-12-11 18:41:58'),
(56, 'App\\Models\\Project', 23, 'pratakol_fayl', 'not_exists', 'project_images/g4TOmoNygFC2zFNWMi2eTM0XMquEK1v7QrgH8Ubs.pdf', 1, '2024-12-11 18:41:58', '2024-12-11 18:41:58'),
(57, 'App\\Models\\Project', 23, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:41:58', 1, '2024-12-11 18:41:58', '2024-12-11 18:41:58'),
(58, 'App\\Models\\Project', 24, 'elon_fayl', 'not_exists', 'project_images/pratakol/9LkrYLQOk5hTT3w3JTyrxVSLwtgLxgSxtgbkslmg.pdf', 1, '2024-12-11 18:42:53', '2024-12-11 18:42:53'),
(59, 'App\\Models\\Project', 24, 'pratakol_fayl', 'not_exists', 'project_images/eZd2krFEFP7OHJsUuzAGSuckBkDKmfg2zyFvs2Uf.jpg', 1, '2024-12-11 18:42:53', '2024-12-11 18:42:53'),
(60, 'App\\Models\\Project', 24, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:42:53', 1, '2024-12-11 18:42:53', '2024-12-11 18:42:53'),
(61, 'App\\Models\\Project', 25, 'district', 'Юнусабадский ', 'Юнусабадский', 1, '2024-12-11 18:44:41', '2024-12-11 18:44:41'),
(62, 'App\\Models\\Project', 25, 'elon_fayl', 'not_exists', 'project_images/pratakol/tMHS3ZgGXUZcOWob6PDAx0ofroxJxqcuBXhbOjTR.pdf', 1, '2024-12-11 18:44:41', '2024-12-11 18:44:41'),
(63, 'App\\Models\\Project', 25, 'pratakol_fayl', 'not_exists', 'project_images/qBKe09dzdSb8tpDaV0T3JCnoWpl3caOI7pFNUO0N.pdf', 1, '2024-12-11 18:44:41', '2024-12-11 18:44:41'),
(64, 'App\\Models\\Project', 25, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:44:41', 1, '2024-12-11 18:44:41', '2024-12-11 18:44:41'),
(65, 'App\\Models\\Project', 26, 'district', 'Чиланзарский ', 'Чиланзарский', 1, '2024-12-11 18:46:01', '2024-12-11 18:46:01'),
(66, 'App\\Models\\Project', 26, 'elon_fayl', 'not_exists', 'project_images/pratakol/yIgMg2ZDcOdvPzlQ7eqEpf4R1SOncNQHYBZ2m1dj.pdf', 1, '2024-12-11 18:46:01', '2024-12-11 18:46:01'),
(67, 'App\\Models\\Project', 26, 'pratakol_fayl', 'not_exists', 'project_images/Mm2j6JfJKn2kdmiE5E44lsupqPhx68urzB0uWoG1.pdf', 1, '2024-12-11 18:46:01', '2024-12-11 18:46:01'),
(68, 'App\\Models\\Project', 26, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:46:01', 1, '2024-12-11 18:46:01', '2024-12-11 18:46:01'),
(69, 'App\\Models\\Project', 27, 'elon_fayl', 'not_exists', 'project_images/pratakol/oIo7xmb8iBnQmRNKYnqQQJ4Rb4cDK9kgkckQ6JnJ.pdf', 1, '2024-12-11 18:46:55', '2024-12-11 18:46:55'),
(70, 'App\\Models\\Project', 27, 'pratakol_fayl', 'not_exists', 'project_images/GTVRwjgWwWNngPG9cF8xpqRnpjjp0GLPHl6zBIQr.pdf', 1, '2024-12-11 18:46:55', '2024-12-11 18:46:55'),
(71, 'App\\Models\\Project', 27, 'updated_at', '2024-12-11 21:00:32', '2024-12-11 21:46:55', 1, '2024-12-11 18:46:55', '2024-12-11 18:46:55'),
(72, 'App\\Models\\Project', 33, 'land', 'not_exists', '8.23', 1, '2024-12-11 19:22:48', '2024-12-11 19:22:48'),
(73, 'App\\Models\\Project', 33, 'updated_at', '2024-12-11 22:22:10', '2024-12-11 22:22:48', 1, '2024-12-11 19:22:48', '2024-12-11 19:22:48'),
(74, 'App\\Models\\Project', 35, 'elon_fayl', 'not_exists', 'project_images/pratakol/mPGjHbwIxzFpBPtZP60xfyoSBv94LGGEg5UeNPHY.pdf', 1, '2024-12-12 07:15:34', '2024-12-12 07:15:34'),
(75, 'App\\Models\\Project', 35, 'updated_at', '2024-12-12 10:14:44', '2024-12-12 10:15:34', 1, '2024-12-12 07:15:34', '2024-12-12 07:15:34'),
(76, 'App\\Models\\Project', 22, 'comment', 'not_exists', '2024 йил 07 ноябрь куни бўлиб ўтган Яшнабод тyманини Тарнов Боши МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “Poytaxt Eco Stroy” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “Poytaxt Eco Stroy” МЧЖ томонидан тақдим этилган таклифи рад этилди.', 1, '2024-12-12 11:45:45', '2024-12-12 11:45:45'),
(77, 'App\\Models\\Project', 22, 'status', '2_step', 'completed', 1, '2024-12-12 11:45:45', '2024-12-12 11:45:45'),
(78, 'App\\Models\\Project', 22, 'updated_at', '2024-12-11 23:40:59', '2024-12-12 16:45:45', 1, '2024-12-12 11:45:45', '2024-12-12 11:45:45'),
(79, 'App\\Models\\Project', 24, 'comment', 'not_exists', '2024 йил 7 ноябрь куни бўлиб ўтган Яккасарой тyманини Белариқ МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “Megapolis Biznes servise” ва “Murad buildings” МЧЖлар томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “Murad buildings” МЧЖ томонидан тақдим этилган таклифи маъқулланди.', 1, '2024-12-12 11:46:11', '2024-12-12 11:46:11'),
(80, 'App\\Models\\Project', 24, 'status', '2_step', 'completed', 1, '2024-12-12 11:46:11', '2024-12-12 11:46:11'),
(81, 'App\\Models\\Project', 24, 'updated_at', '2024-12-11 23:42:53', '2024-12-12 16:46:11', 1, '2024-12-12 11:46:11', '2024-12-12 11:46:11'),
(82, 'App\\Models\\Project', 25, 'comment', 'not_exists', '2024 йил 21 октябрь куни бўлиб ўтган Юнусобод тyманини Қашғар МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “DREAM VISUALIZATION” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “DREAM VISUALIZATION” МЧЖ томонидан тақдим этилган таклифи маъқулланди.', 1, '2024-12-12 11:46:40', '2024-12-12 11:46:40'),
(83, 'App\\Models\\Project', 25, 'status', '2_step', 'completed', 1, '2024-12-12 11:46:40', '2024-12-12 11:46:40'),
(84, 'App\\Models\\Project', 25, 'updated_at', '2024-12-11 23:44:41', '2024-12-12 16:46:40', 1, '2024-12-12 11:46:40', '2024-12-12 11:46:40'),
(85, 'App\\Models\\Project', 26, 'comment', 'not_exists', '2024 йил 21 октябрь куни бўлиб ўтган Чилонзор тyманини Катта Қозиробод МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “ISAAR DEVELOPMENT” МЧЖ ва “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда ISAAR DEVELOPMENT” МЧЖ ва “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган таклифлари маъқулланди.', 1, '2024-12-12 11:47:01', '2024-12-12 11:47:01'),
(86, 'App\\Models\\Project', 26, 'status', '2_step', 'completed', 1, '2024-12-12 11:47:01', '2024-12-12 11:47:01'),
(87, 'App\\Models\\Project', 26, 'updated_at', '2024-12-11 23:46:01', '2024-12-12 16:47:01', 1, '2024-12-12 11:47:01', '2024-12-12 11:47:01'),
(88, 'App\\Models\\Project', 27, 'comment', 'not_exists', '2024 йил 7 ноябрь куни бўлиб ўтган Яккасарой тyманини Хамид Сулаймонов МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “GRIFFIN DEVELOPMENT ADVISORY” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “GRIFFIN DEVELOPMENT ADVISORY” МЧЖ томонидан тақдим этилган таклифи маъқулланди.', 1, '2024-12-12 11:47:27', '2024-12-12 11:47:27'),
(89, 'App\\Models\\Project', 27, 'status', '2_step', 'completed', 1, '2024-12-12 11:47:27', '2024-12-12 11:47:27'),
(90, 'App\\Models\\Project', 27, 'updated_at', '2024-12-11 23:46:55', '2024-12-12 16:47:27', 1, '2024-12-12 11:47:27', '2024-12-12 11:47:27'),
(91, 'App\\Models\\Project', 2, 'district', 'Юнусобадский ', 'Юнусабадский', 1, '2024-12-12 12:04:41', '2024-12-12 12:04:41'),
(92, 'App\\Models\\Project', 2, 'updated_at', '2024-12-11 23:00:32', '2024-12-12 17:04:41', 1, '2024-12-12 12:04:41', '2024-12-12 12:04:41'),
(93, 'App\\Models\\Project', 3, 'district', 'Юнусободский', 'Юнусабадский', 1, '2024-12-12 12:04:51', '2024-12-12 12:04:51'),
(94, 'App\\Models\\Project', 3, 'updated_at', '2024-12-11 23:00:32', '2024-12-12 17:04:51', 1, '2024-12-12 12:04:51', '2024-12-12 12:04:51'),
(95, 'App\\Models\\Project', 16, 'district', 'Сергели', 'Сергелий', 1, '2024-12-12 12:42:04', '2024-12-12 12:42:04'),
(96, 'App\\Models\\Project', 16, 'updated_at', '2024-12-11 23:22:57', '2024-12-12 17:42:04', 1, '2024-12-12 12:42:04', '2024-12-12 12:42:04'),
(97, 'App\\Models\\Project', 8, 'district', 'Яккасарай', 'Яшнабад', 1, '2024-12-16 10:14:36', '2024-12-16 10:14:36'),
(98, 'App\\Models\\Project', 8, 'updated_at', '2024-12-11 23:17:00', '2024-12-16 15:14:36', 1, '2024-12-16 10:14:36', '2024-12-16 10:14:36'),
(99, 'App\\Models\\Project', 9, 'district', 'Яккасарай', 'Яшнабад', 1, '2024-12-16 10:14:51', '2024-12-16 10:14:51'),
(100, 'App\\Models\\Project', 9, 'updated_at', '2024-12-11 23:17:57', '2024-12-16 15:14:51', 1, '2024-12-16 10:14:51', '2024-12-16 10:14:51'),
(101, 'App\\Models\\Project', 10, 'district', 'Яккасарай', 'Яшнабад', 1, '2024-12-16 10:15:05', '2024-12-16 10:15:05'),
(102, 'App\\Models\\Project', 10, 'updated_at', '2024-12-11 23:18:11', '2024-12-16 15:15:05', 1, '2024-12-16 10:15:05', '2024-12-16 10:15:05'),
(103, 'App\\Models\\Project', 7, 'status', '1_step', 'archived', 1, '2024-12-16 10:23:43', '2024-12-16 10:23:43'),
(104, 'App\\Models\\Project', 7, 'updated_at', '2024-12-11 23:15:46', '2024-12-16 15:23:43', 1, '2024-12-16 10:23:43', '2024-12-16 10:23:43'),
(105, 'App\\Models\\Project', 42, 'elon_fayl', 'not_exists', 'project_images/pratakol/Ilj8cmIZL2JNlrhoZGIbp9nWHDS6gB2NIeEAZ3qq.pdf', 1, '2024-12-16 10:59:15', '2024-12-16 10:59:15'),
(106, 'App\\Models\\Project', 42, 'updated_at', '2024-12-16 15:52:48', '2024-12-16 15:59:15', 1, '2024-12-16 10:59:15', '2024-12-16 10:59:15'),
(107, 'App\\Models\\Project', 33, 'second_stage_start_date', '2025-01-06 00:00:00', '', 1, '2024-12-18 11:39:52', '2024-12-18 11:39:52'),
(108, 'App\\Models\\Project', 33, 'second_stage_end_date', '2025-01-27 00:00:00', '', 1, '2024-12-18 11:39:52', '2024-12-18 11:39:52'),
(109, 'App\\Models\\Project', 33, 'updated_at', '2024-12-12 00:22:48', '2024-12-18 16:39:52', 1, '2024-12-18 11:39:52', '2024-12-18 11:39:52'),
(110, 'App\\Models\\Project', 1, 'second_stage_end_date', '2024-01-15 00:00:00', '0005-01-15 00:00:00', 1, '2024-12-20 10:17:00', '2024-12-20 10:17:00'),
(111, 'App\\Models\\Project', 1, 'updated_at', '2024-12-11 23:00:32', '2024-12-20 15:17:00', 1, '2024-12-20 10:17:00', '2024-12-20 10:17:00'),
(112, 'App\\Models\\Project', 1, 'second_stage_end_date', '0005-01-15 00:00:00', '2025-01-15 00:00:00', 1, '2024-12-20 10:17:12', '2024-12-20 10:17:12'),
(113, 'App\\Models\\Project', 1, 'updated_at', '2024-12-20 15:17:00', '2024-12-20 15:17:12', 1, '2024-12-20 10:17:12', '2024-12-20 10:17:12'),
(114, 'App\\Models\\Project', 2, 'second_stage_end_date', '2024-01-15 00:00:00', '2025-01-15 00:00:00', 1, '2024-12-20 10:17:38', '2024-12-20 10:17:38'),
(115, 'App\\Models\\Project', 2, 'updated_at', '2024-12-12 17:04:41', '2024-12-20 15:17:38', 1, '2024-12-20 10:17:38', '2024-12-20 10:17:38'),
(116, 'App\\Models\\Project', 3, 'second_stage_end_date', '2024-01-15 00:00:00', '2025-01-15 00:00:00', 1, '2024-12-20 10:17:46', '2024-12-20 10:17:46'),
(117, 'App\\Models\\Project', 3, 'updated_at', '2024-12-12 17:04:51', '2024-12-20 15:17:46', 1, '2024-12-20 10:17:46', '2024-12-20 10:17:46'),
(118, 'App\\Models\\Project', 4, 'second_stage_end_date', '2024-01-15 00:00:00', '2025-01-15 00:00:00', 1, '2024-12-20 10:17:54', '2024-12-20 10:17:54'),
(119, 'App\\Models\\Project', 4, 'updated_at', '2024-12-11 23:00:32', '2024-12-20 15:17:54', 1, '2024-12-20 10:17:54', '2024-12-20 10:17:54'),
(120, 'App\\Models\\Project', 5, 'second_stage_end_date', '2024-01-15 00:00:00', '2025-01-15 00:00:00', 1, '2024-12-20 10:18:22', '2024-12-20 10:18:22'),
(121, 'App\\Models\\Project', 5, 'updated_at', '2024-12-11 23:00:32', '2024-12-20 15:18:22', 1, '2024-12-20 10:18:22', '2024-12-20 10:18:22'),
(122, 'App\\Models\\Project', 6, 'second_stage_end_date', '2024-01-15 00:00:00', '2025-01-15 00:00:00', 1, '2024-12-20 10:18:31', '2024-12-20 10:18:31'),
(123, 'App\\Models\\Project', 6, 'updated_at', '2024-12-11 23:00:32', '2024-12-20 15:18:31', 1, '2024-12-20 10:18:31', '2024-12-20 10:18:31'),
(124, 'App\\Models\\Project', 39, 'status', '1_step', 'archive', 1, '2025-01-27 12:39:22', '2025-01-27 12:39:22'),
(125, 'App\\Models\\Project', 39, 'updated_at', '2024-12-12 12:21:53', '2025-01-27 17:39:22', 1, '2025-01-27 12:39:22', '2025-01-27 12:39:22'),
(126, 'App\\Models\\Project', 39, 'qoshimcha_fayl', 'not_exists', 'project_images/qoshimcha/zohp4q21LxcvLT7taIi0l3ydjSUvJ1P2GUpaaksn.pdf', 1, '2025-01-27 12:39:52', '2025-01-27 12:39:52'),
(127, 'App\\Models\\Project', 39, 'updated_at', '2025-01-27 17:39:22', '2025-01-27 17:39:52', 1, '2025-01-27 12:39:52', '2025-01-27 12:39:52'),
(128, 'App\\Models\\Project', 41, 'qoshimcha_fayl', 'not_exists', 'project_images/qoshimcha/b1y2x29AR9grgprmv9q9ZjSkK75MvW27OAYiIL5a.pdf', 1, '2025-01-27 12:45:26', '2025-01-27 12:45:26'),
(129, 'App\\Models\\Project', 41, 'status', '1_step', 'archive', 1, '2025-01-27 12:45:26', '2025-01-27 12:45:26'),
(130, 'App\\Models\\Project', 41, 'updated_at', '2024-12-12 12:24:48', '2025-01-27 17:45:26', 1, '2025-01-27 12:45:26', '2025-01-27 12:45:26'),
(131, 'App\\Models\\Project', 40, 'qoshimcha_fayl', 'not_exists', 'project_images/qoshimcha/e4elycZmOdZYJ6Vo0qusizg3ie4VhYY9JNKNdbOG.pdf', 1, '2025-01-27 12:46:04', '2025-01-27 12:46:04'),
(132, 'App\\Models\\Project', 40, 'status', '1_step', 'archive', 1, '2025-01-27 12:46:04', '2025-01-27 12:46:04'),
(133, 'App\\Models\\Project', 40, 'updated_at', '2024-12-12 12:22:58', '2025-01-27 17:46:04', 1, '2025-01-27 12:46:04', '2025-01-27 12:46:04'),
(134, 'App\\Models\\Project', 45, 'start_date', 'not_exists', '2025-01-28 00:00:00', 1, '2025-01-27 13:21:08', '2025-01-27 13:21:08'),
(135, 'App\\Models\\Project', 45, 'end_date', 'not_exists', '2025-02-04 00:00:00', 1, '2025-01-27 13:21:08', '2025-01-27 13:21:08'),
(136, 'App\\Models\\Project', 45, 'updated_at', '2025-01-27 18:20:19', '2025-01-27 18:21:08', 1, '2025-01-27 13:21:08', '2025-01-27 13:21:08'),
(137, 'App\\Models\\Project', 45, 'district', 'Чилонзарский район', 'Чилонзар', 1, '2025-01-28 07:27:39', '2025-01-28 07:27:39'),
(138, 'App\\Models\\Project', 45, 'updated_at', '2025-01-27 18:21:08', '2025-01-28 12:27:39', 1, '2025-01-28 07:27:39', '2025-01-28 07:27:39'),
(139, 'App\\Models\\Project', 44, 'district', 'Чилонзарский район', 'Чилонзар', 1, '2025-01-28 07:27:47', '2025-01-28 07:27:47'),
(140, 'App\\Models\\Project', 44, 'updated_at', '2025-01-27 18:19:56', '2025-01-28 12:27:47', 1, '2025-01-28 07:27:47', '2025-01-28 07:27:47'),
(141, 'App\\Models\\Project', 43, 'district', 'Бектемирский район', 'Бектемир', 1, '2025-01-28 07:27:55', '2025-01-28 07:27:55'),
(142, 'App\\Models\\Project', 43, 'updated_at', '2025-01-27 18:17:48', '2025-01-28 12:27:55', 1, '2025-01-28 07:27:55', '2025-01-28 07:27:55'),
(143, 'App\\Models\\Project', 45, 'district', 'Чилонзар', 'Чиланзар', 1, '2025-01-28 07:28:56', '2025-01-28 07:28:56'),
(144, 'App\\Models\\Project', 45, 'updated_at', '2025-01-28 12:27:39', '2025-01-28 12:28:56', 1, '2025-01-28 07:28:56', '2025-01-28 07:28:56'),
(145, 'App\\Models\\Project', 44, 'district', 'Чилонзар', 'Чиланзар', 1, '2025-01-28 07:29:11', '2025-01-28 07:29:11'),
(146, 'App\\Models\\Project', 44, 'updated_at', '2025-01-28 12:27:47', '2025-01-28 12:29:11', 1, '2025-01-28 07:29:11', '2025-01-28 07:29:11'),
(147, 'App\\Models\\Project', 40, 'district', 'Чилонзар', 'Чиланзар', 1, '2025-01-28 07:29:21', '2025-01-28 07:29:21'),
(148, 'App\\Models\\Project', 40, 'updated_at', '2025-01-27 17:46:04', '2025-01-28 12:29:21', 1, '2025-01-28 07:29:21', '2025-01-28 07:29:21'),
(149, 'App\\Models\\Project', 39, 'district', 'Чилонзар', 'Чиланзар', 1, '2025-01-28 07:29:31', '2025-01-28 07:29:31'),
(150, 'App\\Models\\Project', 39, 'updated_at', '2025-01-27 17:39:52', '2025-01-28 12:29:31', 1, '2025-01-28 07:29:31', '2025-01-28 07:29:31'),
(151, 'App\\Models\\Project', 38, 'district', 'Чилонзар', 'Чиланзар', 1, '2025-01-28 07:29:41', '2025-01-28 07:29:41'),
(152, 'App\\Models\\Project', 38, 'updated_at', '2024-12-12 12:20:55', '2025-01-28 12:29:41', 1, '2025-01-28 07:29:41', '2025-01-28 07:29:41'),
(153, 'App\\Models\\Project', 37, 'district', 'Чилонзар', 'Чиланзар', 1, '2025-01-28 07:29:49', '2025-01-28 07:29:49'),
(154, 'App\\Models\\Project', 37, 'updated_at', '2024-12-12 12:19:57', '2025-01-28 12:29:49', 1, '2025-01-28 07:29:49', '2025-01-28 07:29:49'),
(155, 'App\\Models\\Project', 20, 'comment', 'not_exists', '2024 йил 21 ноябрь куни бўлиб ўтган Мирзо Улуғбек тyманини Навнихол 1 МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган таклифи маъқулланди.', 1, '2025-02-04 12:21:59', '2025-02-04 12:21:59'),
(156, 'App\\Models\\Project', 20, 'updated_at', '2024-12-11 23:34:10', '2025-02-04 17:21:59', 1, '2025-02-04 12:21:59', '2025-02-04 12:21:59'),
(157, 'App\\Models\\Project', 20, 'status', '2_step', 'completed', 1, '2025-02-04 12:23:26', '2025-02-04 12:23:26'),
(158, 'App\\Models\\Project', 20, 'updated_at', '2025-02-04 17:21:59', '2025-02-04 17:23:26', 1, '2025-02-04 12:23:26', '2025-02-04 12:23:26'),
(159, 'App\\Models\\Project', 21, 'comment', 'not_exists', '2024 йил 21 ноябрь куни бўлиб ўтган Мирзо Улуғбек тyманини Навнихол 2 МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “DOMPROF-STROY” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “DOMPROF-STROY” МЧЖ томонидан тақдим этилган таклифи рад этилди.', 1, '2025-02-04 12:25:41', '2025-02-04 12:25:41'),
(160, 'App\\Models\\Project', 21, 'status', '2_step', 'completed', 1, '2025-02-04 12:25:41', '2025-02-04 12:25:41'),
(161, 'App\\Models\\Project', 21, 'updated_at', '2024-12-11 23:35:22', '2025-02-04 17:25:41', 1, '2025-02-04 12:25:41', '2025-02-04 12:25:41'),
(162, 'App\\Models\\Project', 21, 'comment', '2024 йил 21 ноябрь куни бўлиб ўтган Мирзо Улуғбек тyманини Навнихол 2 МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “DOMPROF-STROY” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “DOMPROF-STROY” МЧЖ томонидан тақдим этилган таклифи рад этилди.', '2024 йил 21 ноябрь куни бўлиб ўтган Мирзо Улуғбек тyманини Навнихол 2 МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “ MOYA TERRITORIYA GROUP ” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “ MOYA TERRITORIYA GROUP” МЧЖ томонидан тақдим этилган таклифи рад этилди.', 1, '2025-02-04 12:29:45', '2025-02-04 12:29:45'),
(163, 'App\\Models\\Project', 21, 'updated_at', '2025-02-04 17:25:41', '2025-02-04 17:29:45', 1, '2025-02-04 12:29:45', '2025-02-04 12:29:45'),
(164, 'App\\Models\\Project', 19, 'comment', 'not_exists', '2024 йил 21 ноябрь куни бўлиб ўтган Миробод тyманини Искиқлолобод МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “DOMPROF-STROY” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “DOMPROF-STROY” МЧЖ томонидан тақдим этилган таклифи рад этилди.', 1, '2025-02-04 12:35:13', '2025-02-04 12:35:13'),
(165, 'App\\Models\\Project', 19, 'status', '2_step', 'completed', 1, '2025-02-04 12:35:13', '2025-02-04 12:35:13'),
(166, 'App\\Models\\Project', 19, 'updated_at', '2024-12-11 23:31:55', '2025-02-04 17:35:13', 1, '2025-02-04 12:35:13', '2025-02-04 12:35:13'),
(167, 'App\\Models\\Project', 17, 'comment', 'not_exists', '2024 йил 14 декабрь куни бўлиб ўтган Яккасарой тyманини Кушбеги МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “DIAMOND PLATINUM”, “VODIY DURDONASI 1” ва “BUKHARA STROYCENTR” МЧЖлар томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “VODIY DURDONASI 1” МЧЖ томонидан тақдим этилган таклифи маъқулланди.', 1, '2025-02-04 12:36:46', '2025-02-04 12:36:46'),
(168, 'App\\Models\\Project', 17, 'status', '2_step', 'completed', 1, '2025-02-04 12:36:46', '2025-02-04 12:36:46'),
(169, 'App\\Models\\Project', 17, 'updated_at', '2024-12-11 23:23:52', '2025-02-04 17:36:46', 1, '2025-02-04 12:36:46', '2025-02-04 12:36:46'),
(170, 'App\\Models\\Project', 8, 'qoshimcha_fayl', 'not_exists', 'project_images/qoshimcha/wJHQM6ZxKwtZzeXonOrQqXHbIgMuNMY2S2Y9SXmc.pdf', 1, '2025-02-04 12:42:30', '2025-02-04 12:42:30'),
(171, 'App\\Models\\Project', 8, 'status', '1_step', 'archive', 1, '2025-02-04 12:42:30', '2025-02-04 12:42:30'),
(172, 'App\\Models\\Project', 8, 'updated_at', '2024-12-16 15:14:36', '2025-02-04 17:42:30', 1, '2025-02-04 12:42:30', '2025-02-04 12:42:30'),
(173, 'App\\Models\\Project', 11, 'qoshimcha_fayl', 'not_exists', 'project_images/qoshimcha/AqvJLLwMXnkuG3KnK6XtIQ1nc18hhgSRRr11TFPL.pdf', 1, '2025-02-04 12:44:38', '2025-02-04 12:44:38'),
(174, 'App\\Models\\Project', 11, 'updated_at', '2024-12-11 23:19:01', '2025-02-04 17:44:38', 1, '2025-02-04 12:44:38', '2025-02-04 12:44:38'),
(175, 'App\\Models\\Project', 11, 'status', '1_step', 'archive', 1, '2025-02-04 12:45:58', '2025-02-04 12:45:58'),
(176, 'App\\Models\\Project', 11, 'updated_at', '2025-02-04 17:44:38', '2025-02-04 17:45:58', 1, '2025-02-04 12:45:58', '2025-02-04 12:45:58'),
(177, 'App\\Models\\Project', 17, 'comment', '2024 йил 14 декабрь куни бўлиб ўтган Яккасарой тyманини Кушбеги МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “DIAMOND PLATINUM”, “VODIY DURDONASI 1” ва “BUKHARA STROYCENTR” МЧЖлар томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “VODIY DURDONASI 1” МЧЖ томонидан тақдим этилган таклифи маъқулланди.', '2024 йил 14 декабрь куни бўлиб ўтган Яккасарой тyмани Кушбеги МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “DIAMOND PLATINUM” МЧЖ, “VODIY DURDONASI 1” МЧЖ ва “BUKHARA STROYCENTR” МЧЖлар томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “VODIY DURDONASI 1” МЧЖ томонидан тақдим этилган таклиф маъқулланди.', 1, '2025-02-04 13:02:58', '2025-02-04 13:02:58'),
(178, 'App\\Models\\Project', 17, 'updated_at', '2025-02-04 17:36:46', '2025-02-04 18:02:58', 1, '2025-02-04 13:02:58', '2025-02-04 13:02:58'),
(179, 'App\\Models\\Project', 19, 'comment', '2024 йил 21 ноябрь куни бўлиб ўтган Миробод тyманини Искиқлолобод МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “DOMPROF-STROY” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “DOMPROF-STROY” МЧЖ томонидан тақдим этилган таклифи рад этилди.', '2024 йил 21 ноябрь куни бўлиб ўтган Миробод тyмани Искиқлолобод МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “DOMPROF-STROY” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “DOMPROF-STROY” МЧЖ томонидан тақдим этилган таклиф рад этилди.', 1, '2025-02-04 13:03:43', '2025-02-04 13:03:43'),
(180, 'App\\Models\\Project', 19, 'updated_at', '2025-02-04 17:35:13', '2025-02-04 18:03:43', 1, '2025-02-04 13:03:43', '2025-02-04 13:03:43'),
(181, 'App\\Models\\Project', 20, 'comment', '2024 йил 21 ноябрь куни бўлиб ўтган Мирзо Улуғбек тyманини Навнихол 1 МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган таклифи маъқулланди.', '2024 йил 21 ноябрь куни бўлиб ўтган Мирзо Улуғбек тyмани Навнихол 1 МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган таклиф маъқулланди.', 1, '2025-02-04 13:04:25', '2025-02-04 13:04:25'),
(182, 'App\\Models\\Project', 20, 'updated_at', '2025-02-04 17:23:26', '2025-02-04 18:04:25', 1, '2025-02-04 13:04:25', '2025-02-04 13:04:25'),
(183, 'App\\Models\\Project', 21, 'comment', '2024 йил 21 ноябрь куни бўлиб ўтган Мирзо Улуғбек тyманини Навнихол 2 МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “ MOYA TERRITORIYA GROUP ” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “ MOYA TERRITORIYA GROUP” МЧЖ томонидан тақдим этилган таклифи рад этилди.', '2024 йил 21 ноябрь куни бўлиб ўтган Мирзо Улуғбек тyмани Навнихол 2 МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “ MOYA TERRITORIYA GROUP ” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “ MOYA TERRITORIYA GROUP” МЧЖ томонидан тақдим этилган таклиф рад этилди.', 1, '2025-02-04 13:08:34', '2025-02-04 13:08:34'),
(184, 'App\\Models\\Project', 21, 'updated_at', '2025-02-04 17:29:45', '2025-02-04 18:08:34', 1, '2025-02-04 13:08:34', '2025-02-04 13:08:34'),
(185, 'App\\Models\\Project', 42, 'qoshimcha_fayl', 'not_exists', 'project_images/qoshimcha/G5q2LM7OCR99V2AVD2XGBQcqbYjfcp4vhZeKXp6c.pdf', 1, '2025-02-05 12:01:06', '2025-02-05 12:01:06'),
(186, 'App\\Models\\Project', 42, 'status', '1_step', '2_step', 1, '2025-02-05 12:01:06', '2025-02-05 12:01:06'),
(187, 'App\\Models\\Project', 42, 'second_stage_start_date', 'not_exists', '2025-01-06 00:00:00', 1, '2025-02-05 12:01:06', '2025-02-05 12:01:06'),
(188, 'App\\Models\\Project', 42, 'second_stage_end_date', 'not_exists', '2025-01-27 00:00:00', 1, '2025-02-05 12:01:06', '2025-02-05 12:01:06'),
(189, 'App\\Models\\Project', 42, 'updated_at', '2024-12-16 15:59:15', '2025-02-05 17:01:06', 1, '2025-02-05 12:01:06', '2025-02-05 12:01:06'),
(190, 'App\\Models\\Project', 42, 'pratakol_fayl', 'not_exists', 'project_images/A0qNC18oPaydazCXucJ2ZsLHzBDeShU9V9hNDKcz.pdf', 1, '2025-02-05 12:02:22', '2025-02-05 12:02:22'),
(191, 'App\\Models\\Project', 42, 'updated_at', '2025-02-05 17:01:06', '2025-02-05 17:02:22', 1, '2025-02-05 12:02:22', '2025-02-05 12:02:22'),
(192, 'App\\Models\\Project', 38, 'pratakol_fayl', 'not_exists', 'project_images/xSiF1zhLI6g25lLbIZNhPovidG3tGIbS7V13tmWb.pdf', 1, '2025-02-05 12:07:44', '2025-02-05 12:07:44'),
(193, 'App\\Models\\Project', 38, 'status', '1_step', '2_step', 1, '2025-02-05 12:07:44', '2025-02-05 12:07:44'),
(194, 'App\\Models\\Project', 38, 'second_stage_start_date', 'not_exists', '2025-01-06 00:00:00', 1, '2025-02-05 12:07:44', '2025-02-05 12:07:44'),
(195, 'App\\Models\\Project', 38, 'second_stage_end_date', 'not_exists', '2025-01-27 00:00:00', 1, '2025-02-05 12:07:44', '2025-02-05 12:07:44'),
(196, 'App\\Models\\Project', 38, 'updated_at', '2025-01-28 12:29:41', '2025-02-05 17:07:44', 1, '2025-02-05 12:07:44', '2025-02-05 12:07:44'),
(197, 'App\\Models\\Project', 37, 'pratakol_fayl', 'not_exists', 'project_images/zomuzfrv5Zqt7W7osW7RIztzjY9p9qNAHTwA9cVP.pdf', 1, '2025-02-05 12:10:14', '2025-02-05 12:10:14'),
(198, 'App\\Models\\Project', 37, 'status', '1_step', 'archive', 1, '2025-02-05 12:10:14', '2025-02-05 12:10:14'),
(199, 'App\\Models\\Project', 37, 'second_stage_start_date', 'not_exists', '2025-01-06 00:00:00', 1, '2025-02-05 12:10:14', '2025-02-05 12:10:14'),
(200, 'App\\Models\\Project', 37, 'second_stage_end_date', 'not_exists', '2025-01-27 00:00:00', 1, '2025-02-05 12:10:14', '2025-02-05 12:10:14'),
(201, 'App\\Models\\Project', 37, 'updated_at', '2025-01-28 12:29:49', '2025-02-05 17:10:14', 1, '2025-02-05 12:10:14', '2025-02-05 12:10:14'),
(202, 'App\\Models\\Project', 36, 'pratakol_fayl', 'not_exists', 'project_images/4pgY5DKQLZJ3xo4jmDi7iL2zUqth9Wee2baugrDO.pdf', 1, '2025-02-05 12:11:32', '2025-02-05 12:11:32'),
(203, 'App\\Models\\Project', 36, 'status', '1_step', 'archive', 1, '2025-02-05 12:11:32', '2025-02-05 12:11:32'),
(204, 'App\\Models\\Project', 36, 'updated_at', '2024-12-12 12:18:06', '2025-02-05 17:11:32', 1, '2025-02-05 12:11:32', '2025-02-05 12:11:32'),
(205, 'App\\Models\\Project', 35, 'pratakol_fayl', 'not_exists', 'project_images/xgmf78DWyjnqfeHCNo2x7hjO6hiHOvjiWezWMzKM.pdf', 1, '2025-02-05 12:12:56', '2025-02-05 12:12:56'),
(206, 'App\\Models\\Project', 35, 'status', '1_step', '2_step', 1, '2025-02-05 12:12:56', '2025-02-05 12:12:56'),
(207, 'App\\Models\\Project', 35, 'second_stage_start_date', 'not_exists', '2025-01-06 00:00:00', 1, '2025-02-05 12:12:56', '2025-02-05 12:12:56'),
(208, 'App\\Models\\Project', 35, 'second_stage_end_date', 'not_exists', '2025-01-27 00:00:00', 1, '2025-02-05 12:12:56', '2025-02-05 12:12:56'),
(209, 'App\\Models\\Project', 35, 'updated_at', '2024-12-12 12:15:34', '2025-02-05 17:12:56', 1, '2025-02-05 12:12:56', '2025-02-05 12:12:56'),
(210, 'App\\Models\\Project', 34, 'pratakol_fayl', 'not_exists', 'project_images/WLpMwO6ldfSeIHjNPWIYLlzYwTjnEPH1jdxld83s.pdf', 1, '2025-02-05 12:14:52', '2025-02-05 12:14:52'),
(211, 'App\\Models\\Project', 34, 'status', '1_step', '2_step', 1, '2025-02-05 12:14:52', '2025-02-05 12:14:52'),
(212, 'App\\Models\\Project', 34, 'second_stage_start_date', 'not_exists', '2025-01-06 00:00:00', 1, '2025-02-05 12:14:52', '2025-02-05 12:14:52'),
(213, 'App\\Models\\Project', 34, 'second_stage_end_date', 'not_exists', '2025-01-27 00:00:00', 1, '2025-02-05 12:14:52', '2025-02-05 12:14:52'),
(214, 'App\\Models\\Project', 34, 'updated_at', '2024-12-12 00:23:52', '2025-02-05 17:14:52', 1, '2025-02-05 12:14:52', '2025-02-05 12:14:52'),
(215, 'App\\Models\\Project', 33, 'pratakol_fayl', 'not_exists', 'project_images/rOEsV6Q3HRdnMRUPMSpN6PSMRnTFfjN2U90hrM0U.pdf', 1, '2025-02-05 12:16:42', '2025-02-05 12:16:42'),
(216, 'App\\Models\\Project', 33, 'status', '1_step', '2_step', 1, '2025-02-05 12:16:42', '2025-02-05 12:16:42'),
(217, 'App\\Models\\Project', 33, 'second_stage_start_date', 'not_exists', '2025-01-06 00:00:00', 1, '2025-02-05 12:16:42', '2025-02-05 12:16:42'),
(218, 'App\\Models\\Project', 33, 'second_stage_end_date', 'not_exists', '2025-01-27 00:00:00', 1, '2025-02-05 12:16:42', '2025-02-05 12:16:42'),
(219, 'App\\Models\\Project', 33, 'updated_at', '2024-12-18 16:39:52', '2025-02-05 17:16:42', 1, '2025-02-05 12:16:42', '2025-02-05 12:16:42'),
(220, 'App\\Models\\Project', 1, 'pratakol_fayl', 'not_exists', 'project_images/3yqEyOEH7alfHllrkM3W2ossLzAsnKstJyndMsWL.pdf', 1, '2025-02-05 12:18:05', '2025-02-05 12:18:05'),
(221, 'App\\Models\\Project', 1, 'status', '1_step', '2_step', 1, '2025-02-05 12:18:05', '2025-02-05 12:18:05'),
(222, 'App\\Models\\Project', 1, 'second_stage_start_date', 'not_exists', '2024-12-23 00:00:00', 1, '2025-02-05 12:18:05', '2025-02-05 12:18:05'),
(223, 'App\\Models\\Project', 1, 'second_stage_end_date', 'not_exists', '2025-01-15 00:00:00', 1, '2025-02-05 12:18:05', '2025-02-05 12:18:05'),
(224, 'App\\Models\\Project', 1, 'updated_at', '2024-12-20 15:17:12', '2025-02-05 17:18:05', 1, '2025-02-05 12:18:05', '2025-02-05 12:18:05'),
(225, 'App\\Models\\Project', 3, 'pratakol_fayl', 'not_exists', 'project_images/uz3eRQndTEmywv7mToLM6TO2tJ8uXxkqgtLxOtF1.pdf', 1, '2025-02-05 12:21:37', '2025-02-05 12:21:37'),
(226, 'App\\Models\\Project', 3, 'status', '1_step', '2_step', 1, '2025-02-05 12:21:37', '2025-02-05 12:21:37'),
(227, 'App\\Models\\Project', 3, 'second_stage_start_date', 'not_exists', '2024-12-23 00:00:00', 1, '2025-02-05 12:21:37', '2025-02-05 12:21:37'),
(228, 'App\\Models\\Project', 3, 'second_stage_end_date', 'not_exists', '2025-01-15 00:00:00', 1, '2025-02-05 12:21:37', '2025-02-05 12:21:37'),
(229, 'App\\Models\\Project', 3, 'updated_at', '2024-12-20 15:17:46', '2025-02-05 17:21:37', 1, '2025-02-05 12:21:37', '2025-02-05 12:21:37'),
(230, 'App\\Models\\Project', 4, 'pratakol_fayl', 'not_exists', 'project_images/SBcZKyj859jYVEWUr7aPGvbhl8T6qfi0jIlaUlQ4.pdf', 1, '2025-02-05 12:26:00', '2025-02-05 12:26:00'),
(231, 'App\\Models\\Project', 4, 'status', '1_step', '2_step', 1, '2025-02-05 12:26:00', '2025-02-05 12:26:00'),
(232, 'App\\Models\\Project', 4, 'second_stage_start_date', 'not_exists', '2024-12-23 00:00:00', 1, '2025-02-05 12:26:00', '2025-02-05 12:26:00'),
(233, 'App\\Models\\Project', 4, 'second_stage_end_date', 'not_exists', '2025-01-15 00:00:00', 1, '2025-02-05 12:26:00', '2025-02-05 12:26:00'),
(234, 'App\\Models\\Project', 4, 'updated_at', '2024-12-20 15:17:54', '2025-02-05 17:26:00', 1, '2025-02-05 12:26:01', '2025-02-05 12:26:01'),
(235, 'App\\Models\\Project', 38, 'pratakol_fayl', 'project_images/xSiF1zhLI6g25lLbIZNhPovidG3tGIbS7V13tmWb.pdf', 'project_images/VJarfDxg7nFd2nmGjb8VOyFKoLugyvb0JczRArLb.pdf', 1, '2025-02-05 12:27:46', '2025-02-05 12:27:46'),
(236, 'App\\Models\\Project', 38, 'updated_at', '2025-02-05 17:07:44', '2025-02-05 17:27:46', 1, '2025-02-05 12:27:46', '2025-02-05 12:27:46'),
(237, 'App\\Models\\Project', 5, 'pratakol_fayl', 'not_exists', 'project_images/6mpjtFeGpKizXssb8SsiflQSD0uHokX6VkOX8uTf.pdf', 1, '2025-02-05 12:29:33', '2025-02-05 12:29:33'),
(238, 'App\\Models\\Project', 5, 'status', '1_step', 'archive', 1, '2025-02-05 12:29:33', '2025-02-05 12:29:33'),
(239, 'App\\Models\\Project', 5, 'updated_at', '2024-12-20 15:18:22', '2025-02-05 17:29:32', 1, '2025-02-05 12:29:33', '2025-02-05 12:29:33'),
(240, 'App\\Models\\Project', 6, 'pratakol_fayl', 'not_exists', 'project_images/eIUbiEG4a47AuyZ2692JaqDhuIj9EWVPU9b1QiR8.pdf', 1, '2025-02-05 12:31:51', '2025-02-05 12:31:51'),
(241, 'App\\Models\\Project', 6, 'status', '1_step', '2_step', 1, '2025-02-05 12:31:51', '2025-02-05 12:31:51'),
(242, 'App\\Models\\Project', 6, 'second_stage_start_date', 'not_exists', '2024-12-23 00:00:00', 1, '2025-02-05 12:31:51', '2025-02-05 12:31:51'),
(243, 'App\\Models\\Project', 6, 'second_stage_end_date', 'not_exists', '2025-01-15 00:00:00', 1, '2025-02-05 12:31:51', '2025-02-05 12:31:51'),
(244, 'App\\Models\\Project', 6, 'updated_at', '2024-12-20 15:18:31', '2025-02-05 17:31:51', 1, '2025-02-05 12:31:51', '2025-02-05 12:31:51'),
(245, 'App\\Models\\Project', 2, 'pratakol_fayl', 'not_exists', 'project_images/qwNczJq4PR8mVsdq7neho4laDMidgg2hUQ6xPk4G.pdf', 1, '2025-02-05 12:33:06', '2025-02-05 12:33:06'),
(246, 'App\\Models\\Project', 2, 'status', '1_step', '2_step', 1, '2025-02-05 12:33:06', '2025-02-05 12:33:06'),
(247, 'App\\Models\\Project', 2, 'second_stage_start_date', 'not_exists', '2024-12-23 00:00:00', 1, '2025-02-05 12:33:06', '2025-02-05 12:33:06'),
(248, 'App\\Models\\Project', 2, 'second_stage_end_date', 'not_exists', '2025-01-15 00:00:00', 1, '2025-02-05 12:33:06', '2025-02-05 12:33:06'),
(249, 'App\\Models\\Project', 2, 'updated_at', '2024-12-20 15:17:38', '2025-02-05 17:33:06', 1, '2025-02-05 12:33:06', '2025-02-05 12:33:06'),
(250, 'App\\Models\\Project', 9, 'pratakol_fayl', 'not_exists', 'project_images/8lPzpioLb8Z0eHvj5Y6v0NfgLo6wszad0uF6DMx6.pdf', 1, '2025-02-05 12:36:38', '2025-02-05 12:36:38'),
(251, 'App\\Models\\Project', 9, 'status', '1_step', '2_step', 1, '2025-02-05 12:36:38', '2025-02-05 12:36:38'),
(252, 'App\\Models\\Project', 9, 'second_stage_start_date', 'not_exists', '2024-12-04 00:00:00', 1, '2025-02-05 12:36:38', '2025-02-05 12:36:38'),
(253, 'App\\Models\\Project', 9, 'second_stage_end_date', 'not_exists', '2025-01-06 00:00:00', 1, '2025-02-05 12:36:38', '2025-02-05 12:36:38'),
(254, 'App\\Models\\Project', 9, 'updated_at', '2024-12-16 15:14:51', '2025-02-05 17:36:38', 1, '2025-02-05 12:36:38', '2025-02-05 12:36:38'),
(255, 'App\\Models\\Project', 10, 'pratakol_fayl', 'not_exists', 'project_images/FbCEpU5DzihFKS3BR6bVyBD43ze6xmlSn1H3QmuM.pdf', 1, '2025-02-05 12:45:05', '2025-02-05 12:45:05'),
(256, 'App\\Models\\Project', 10, 'status', '1_step', '2_step', 1, '2025-02-05 12:45:05', '2025-02-05 12:45:05'),
(257, 'App\\Models\\Project', 10, 'second_stage_start_date', 'not_exists', '2024-12-04 00:00:00', 1, '2025-02-05 12:45:05', '2025-02-05 12:45:05'),
(258, 'App\\Models\\Project', 10, 'second_stage_end_date', 'not_exists', '2025-01-06 00:00:00', 1, '2025-02-05 12:45:05', '2025-02-05 12:45:05'),
(259, 'App\\Models\\Project', 10, 'updated_at', '2024-12-16 15:15:05', '2025-02-05 17:45:05', 1, '2025-02-05 12:45:05', '2025-02-05 12:45:05'),
(260, 'App\\Models\\Project', 12, 'pratakol_fayl', 'not_exists', 'project_images/x3N0fxnOZ3E9jFGP3mxWwQAWgaoxMyHhQWFOst16.pdf', 1, '2025-02-05 12:49:38', '2025-02-05 12:49:38'),
(261, 'App\\Models\\Project', 12, 'status', '1_step', '2_step', 1, '2025-02-05 12:49:38', '2025-02-05 12:49:38'),
(262, 'App\\Models\\Project', 12, 'second_stage_start_date', 'not_exists', '2024-12-04 00:00:00', 1, '2025-02-05 12:49:38', '2025-02-05 12:49:38'),
(263, 'App\\Models\\Project', 12, 'second_stage_end_date', 'not_exists', '2025-01-06 00:00:00', 1, '2025-02-05 12:49:38', '2025-02-05 12:49:38'),
(264, 'App\\Models\\Project', 12, 'updated_at', '2024-12-11 23:19:13', '2025-02-05 17:49:38', 1, '2025-02-05 12:49:38', '2025-02-05 12:49:38'),
(265, 'App\\Models\\Project', 13, 'pratakol_fayl', 'not_exists', 'project_images/58OvNnf1JimEvVc0kBjDwc8vNViilpZGGrHrRpZI.pdf', 1, '2025-02-05 12:51:04', '2025-02-05 12:51:04'),
(266, 'App\\Models\\Project', 13, 'status', '1_step', '2_step', 1, '2025-02-05 12:51:04', '2025-02-05 12:51:04'),
(267, 'App\\Models\\Project', 13, 'second_stage_start_date', 'not_exists', '2024-12-23 00:00:00', 1, '2025-02-05 12:51:04', '2025-02-05 12:51:04'),
(268, 'App\\Models\\Project', 13, 'second_stage_end_date', 'not_exists', '2025-01-15 00:00:00', 1, '2025-02-05 12:51:04', '2025-02-05 12:51:04'),
(269, 'App\\Models\\Project', 13, 'updated_at', '2024-12-11 23:19:25', '2025-02-05 17:51:04', 1, '2025-02-05 12:51:04', '2025-02-05 12:51:04'),
(270, 'App\\Models\\Project', 42, 'qoshimcha_fayl', 'project_images/qoshimcha/G5q2LM7OCR99V2AVD2XGBQcqbYjfcp4vhZeKXp6c.pdf', '', 1, '2025-02-05 13:07:55', '2025-02-05 13:07:55'),
(271, 'App\\Models\\Project', 42, 'updated_at', '2025-02-05 17:02:22', '2025-02-05 18:07:55', 1, '2025-02-05 13:07:55', '2025-02-05 13:07:55'),
(272, 'App\\Models\\Project', 42, 'qoshimcha_fayl', 'not_exists', 'project_images/qoshimcha_fayl/b3je1D3tlgKqkA7lv88OmxwLmLtTZ5r6KIswdpoa.pdf', 1, '2025-02-06 09:47:53', '2025-02-06 09:47:53'),
(273, 'App\\Models\\Project', 42, 'status', '2_step', 'archive', 1, '2025-02-06 09:47:53', '2025-02-06 09:47:53'),
(274, 'App\\Models\\Project', 42, 'updated_at', '2025-02-05 18:07:55', '2025-02-06 14:47:53', 1, '2025-02-06 09:47:53', '2025-02-06 09:47:53'),
(275, 'App\\Models\\Project', 42, 'pratakol_fayl', 'project_images/A0qNC18oPaydazCXucJ2ZsLHzBDeShU9V9hNDKcz.pdf', '', 1, '2025-02-06 09:49:40', '2025-02-06 09:49:40'),
(276, 'App\\Models\\Project', 42, 'updated_at', '2025-02-06 14:47:53', '2025-02-06 14:49:40', 1, '2025-02-06 09:49:40', '2025-02-06 09:49:40'),
(277, 'App\\Models\\Project', 3, 'end_date', '2024-12-16 00:00:00', '', 1, '2025-02-06 10:37:58', '2025-02-06 10:37:58'),
(278, 'App\\Models\\Project', 3, 'second_stage_end_date', '2025-01-15 00:00:00', '', 1, '2025-02-06 10:37:58', '2025-02-06 10:37:58'),
(279, 'App\\Models\\Project', 3, 'updated_at', '2025-02-05 17:21:37', '2025-02-06 15:37:58', 1, '2025-02-06 10:37:58', '2025-02-06 10:37:58'),
(280, 'App\\Models\\Project', 2, 'end_date', '2024-12-16 00:00:00', '', 1, '2025-02-06 10:40:09', '2025-02-06 10:40:09'),
(281, 'App\\Models\\Project', 2, 'second_stage_end_date', '2025-01-15 00:00:00', '', 1, '2025-02-06 10:40:09', '2025-02-06 10:40:09'),
(282, 'App\\Models\\Project', 2, 'updated_at', '2025-02-05 17:33:06', '2025-02-06 15:40:09', 1, '2025-02-06 10:40:09', '2025-02-06 10:40:09'),
(283, 'App\\Models\\Project', 46, 'elon_fayl', 'project_images/elon/6sMfbSBRUU6lI3suLx9xDAgppaaj1equrx3zLDwv.pdf', 'project_images/elon_fayl/Ps549stUnmbt6ETRTk5yTOSILVcfNQMFpUJQaJ2l.pdf', 1, '2025-02-11 12:18:02', '2025-02-11 12:18:02'),
(284, 'App\\Models\\Project', 46, 'updated_at', '2025-02-11 12:29:03', '2025-02-11 17:18:02', 1, '2025-02-11 12:18:02', '2025-02-11 12:18:02'),
(285, 'App\\Models\\Project', 46, 'mahalla', 'Навнихол', 'Навнихол-2', 1, '2025-02-11 12:22:31', '2025-02-11 12:22:31'),
(286, 'App\\Models\\Project', 46, 'updated_at', '2025-02-11 17:18:02', '2025-02-11 17:22:31', 1, '2025-02-11 12:22:31', '2025-02-11 12:22:31'),
(287, 'App\\Models\\Project', 47, 'elon_fayl', 'project_images/elon/ExXgmDpjEhBEhcZMaFaQIDQr6uxafB2Kt5DbVcyP.pdf', 'project_images/elon_fayl/M3PkYhbrT56r7tdCO4EcB6xERaqTbgXVhx4conq3.pdf', 1, '2025-02-12 06:23:39', '2025-02-12 06:23:39');
INSERT INTO `histories` (`id`, `model_type`, `model_id`, `field`, `old_value`, `new_value`, `user_id`, `created_at`, `updated_at`) VALUES
(288, 'App\\Models\\Project', 47, 'updated_at', '2025-02-11 17:21:41', '2025-02-12 11:23:39', 1, '2025-02-12 06:23:39', '2025-02-12 06:23:39'),
(289, 'App\\Models\\Project', 6, 'second_stage_end_date', '2025-01-15 00:00:00', '2025-03-03 00:00:00', 1, '2025-02-13 07:24:12', '2025-02-13 07:24:12'),
(290, 'App\\Models\\Project', 6, 'updated_at', '2025-02-05 17:31:51', '2025-02-13 12:24:12', 1, '2025-02-13 07:24:12', '2025-02-13 07:24:12'),
(291, 'App\\Models\\Project', 2, 'end_date', 'not_exists', '2024-12-16 00:00:00', 1, '2025-02-13 07:26:09', '2025-02-13 07:26:09'),
(292, 'App\\Models\\Project', 2, 'updated_at', '2025-02-06 15:40:09', '2025-02-13 12:26:09', 1, '2025-02-13 07:26:09', '2025-02-13 07:26:09'),
(293, 'App\\Models\\Project', 3, 'end_date', 'not_exists', '2024-12-16 00:00:00', 1, '2025-02-13 07:27:06', '2025-02-13 07:27:06'),
(294, 'App\\Models\\Project', 3, 'second_stage_end_date', 'not_exists', '2025-03-03 00:00:00', 1, '2025-02-13 07:27:06', '2025-02-13 07:27:06'),
(295, 'App\\Models\\Project', 3, 'updated_at', '2025-02-06 15:37:58', '2025-02-13 12:27:06', 1, '2025-02-13 07:27:06', '2025-02-13 07:27:06'),
(296, 'App\\Models\\Project', 35, 'second_stage_end_date', '2025-01-27 00:00:00', '2025-03-03 00:00:00', 1, '2025-02-13 07:28:41', '2025-02-13 07:28:41'),
(297, 'App\\Models\\Project', 35, 'updated_at', '2025-02-05 17:12:56', '2025-02-13 12:28:41', 1, '2025-02-13 07:28:41', '2025-02-13 07:28:41'),
(298, 'App\\Models\\Project', 47, 'elon_fayl', 'project_images/elon_fayl/M3PkYhbrT56r7tdCO4EcB6xERaqTbgXVhx4conq3.pdf', 'project_images/elon_fayl/ZeOgZYMQUw7cmOqbtfLyBu9jnNwQAbH1lpHHhrPu.pdf', 1, '2025-02-17 07:42:31', '2025-02-17 07:42:31'),
(299, 'App\\Models\\Project', 47, 'updated_at', '2025-02-12 11:23:39', '2025-02-17 12:42:31', 1, '2025-02-17 07:42:31', '2025-02-17 07:42:31'),
(300, 'App\\Models\\Project', 10, 'second_stage_end_date', '2025-01-06 00:00:00', '2025-03-17 00:00:00', 1, '2025-02-17 10:20:24', '2025-02-17 10:20:24'),
(301, 'App\\Models\\Project', 10, 'updated_at', '2025-02-05 17:45:05', '2025-02-17 15:20:24', 1, '2025-02-17 10:20:24', '2025-02-17 10:20:24'),
(302, 'App\\Models\\Project', 2, 'second_stage_end_date', 'not_exists', '2025-03-17 00:00:00', 1, '2025-02-17 10:21:22', '2025-02-17 10:21:22'),
(303, 'App\\Models\\Project', 2, 'updated_at', '2025-02-13 12:26:09', '2025-02-17 15:21:22', 1, '2025-02-17 10:21:22', '2025-02-17 10:21:22'),
(304, 'App\\Models\\Project', 48, 'end_date', 'not_exists', '2025-02-28 00:00:00', 1, '2025-02-19 09:43:47', '2025-02-19 09:43:47'),
(305, 'App\\Models\\Project', 48, 'updated_at', '2025-02-19 14:42:19', '2025-02-19 14:43:46', 1, '2025-02-19 09:43:47', '2025-02-19 09:43:47'),
(306, 'App\\Models\\Project', 43, 'pratakol_fayl', 'not_exists', 'project_images/pratakol_fayl/ccnHetbf476HU2cPZMG3zJXQFhhLz77FbMD2xrrE.pdf', 1, '2025-02-19 12:06:56', '2025-02-19 12:06:56'),
(307, 'App\\Models\\Project', 43, 'status', '1_step', '2_step', 1, '2025-02-19 12:06:56', '2025-02-19 12:06:56'),
(308, 'App\\Models\\Project', 43, 'second_stage_start_date', 'not_exists', '2025-02-14 00:00:00', 1, '2025-02-19 12:06:56', '2025-02-19 12:06:56'),
(309, 'App\\Models\\Project', 43, 'second_stage_end_date', 'not_exists', '2025-03-02 00:00:00', 1, '2025-02-19 12:06:56', '2025-02-19 12:06:56'),
(310, 'App\\Models\\Project', 43, 'updated_at', '2025-01-28 12:27:55', '2025-02-19 17:06:56', 1, '2025-02-19 12:06:56', '2025-02-19 12:06:56'),
(311, 'App\\Models\\Project', 45, 'pratakol_fayl', 'not_exists', 'project_images/pratakol_fayl/R6DTqB7BFmMa8As7Bov45JRhHxYNf2TezOUcUQKs.pdf', 1, '2025-02-19 12:08:40', '2025-02-19 12:08:40'),
(312, 'App\\Models\\Project', 45, 'second_stage_start_date', 'not_exists', '2025-02-14 00:00:00', 1, '2025-02-19 12:08:40', '2025-02-19 12:08:40'),
(313, 'App\\Models\\Project', 45, 'second_stage_end_date', 'not_exists', '2025-04-02 00:00:00', 1, '2025-02-19 12:08:40', '2025-02-19 12:08:40'),
(314, 'App\\Models\\Project', 45, 'updated_at', '2025-01-28 12:28:56', '2025-02-19 17:08:40', 1, '2025-02-19 12:08:40', '2025-02-19 12:08:40'),
(315, 'App\\Models\\Project', 43, 'second_stage_end_date', '2025-03-02 00:00:00', '2025-04-02 00:00:00', 1, '2025-02-19 12:09:06', '2025-02-19 12:09:06'),
(316, 'App\\Models\\Project', 43, 'updated_at', '2025-02-19 17:06:56', '2025-02-19 17:09:06', 1, '2025-02-19 12:09:06', '2025-02-19 12:09:06'),
(317, 'App\\Models\\Project', 45, 'status', '1_step', '2_step', 1, '2025-02-19 12:09:45', '2025-02-19 12:09:45'),
(318, 'App\\Models\\Project', 45, 'updated_at', '2025-02-19 17:08:40', '2025-02-19 17:09:45', 1, '2025-02-19 12:09:45', '2025-02-19 12:09:45'),
(319, 'App\\Models\\Project', 44, 'pratakol_fayl', 'not_exists', 'project_images/pratakol_fayl/xCbRBmLFsTL0j0abYx2NNUFfAPu4wFBaUM6ink2l.pdf', 1, '2025-02-19 12:10:43', '2025-02-19 12:10:43'),
(320, 'App\\Models\\Project', 44, 'status', '1_step', '2_step', 1, '2025-02-19 12:10:43', '2025-02-19 12:10:43'),
(321, 'App\\Models\\Project', 44, 'second_stage_start_date', 'not_exists', '2025-02-14 00:00:00', 1, '2025-02-19 12:10:43', '2025-02-19 12:10:43'),
(322, 'App\\Models\\Project', 44, 'second_stage_end_date', 'not_exists', '2025-04-02 00:00:00', 1, '2025-02-19 12:10:43', '2025-02-19 12:10:43'),
(323, 'App\\Models\\Project', 44, 'updated_at', '2025-01-28 12:29:11', '2025-02-19 17:10:43', 1, '2025-02-19 12:10:43', '2025-02-19 12:10:43'),
(324, 'App\\Models\\Project', 47, 'pratakol_fayl', 'not_exists', 'project_images/pratakol_fayl/rB6AkK2nVtdscZd17JG85Du7CsxKW75YbqNTMJJP.pdf', 1, '2025-02-24 07:41:02', '2025-02-24 07:41:02'),
(325, 'App\\Models\\Project', 47, 'updated_at', '2025-02-17 12:42:31', '2025-02-24 12:41:02', 1, '2025-02-24 07:41:02', '2025-02-24 07:41:02'),
(326, 'App\\Models\\Project', 46, 'pratakol_fayl', 'not_exists', 'project_images/pratakol_fayl/MnTzg9zortDMLvyBxsckz48gp338z2moX1xKwLhB.pdf', 1, '2025-02-24 07:42:12', '2025-02-24 07:42:12'),
(327, 'App\\Models\\Project', 46, 'updated_at', '2025-02-11 17:22:31', '2025-02-24 12:42:12', 1, '2025-02-24 07:42:12', '2025-02-24 07:42:12'),
(328, 'App\\Models\\Project', 46, 'status', '1_step', '2_step', 1, '2025-02-25 04:50:54', '2025-02-25 04:50:54'),
(329, 'App\\Models\\Project', 46, 'second_stage_start_date', 'not_exists', '2025-02-25 00:00:00', 1, '2025-02-25 04:50:54', '2025-02-25 04:50:54'),
(330, 'App\\Models\\Project', 46, 'second_stage_end_date', 'not_exists', '2025-03-17 00:00:00', 1, '2025-02-25 04:50:54', '2025-02-25 04:50:54'),
(331, 'App\\Models\\Project', 46, 'updated_at', '2025-02-24 12:42:12', '2025-02-25 09:50:54', 1, '2025-02-25 04:50:54', '2025-02-25 04:50:54'),
(332, 'App\\Models\\Project', 47, 'status', '1_step', '2_step', 1, '2025-02-25 04:51:14', '2025-02-25 04:51:14'),
(333, 'App\\Models\\Project', 47, 'second_stage_start_date', 'not_exists', '2025-02-25 00:00:00', 1, '2025-02-25 04:51:14', '2025-02-25 04:51:14'),
(334, 'App\\Models\\Project', 47, 'second_stage_end_date', 'not_exists', '2025-03-17 00:00:00', 1, '2025-02-25 04:51:14', '2025-02-25 04:51:14'),
(335, 'App\\Models\\Project', 47, 'updated_at', '2025-02-24 12:41:02', '2025-02-25 09:51:14', 1, '2025-02-25 04:51:14', '2025-02-25 04:51:14'),
(336, 'App\\Models\\Project', 47, 'status', '2_step', '1_step', 1, '2025-02-25 04:55:09', '2025-02-25 04:55:09'),
(337, 'App\\Models\\Project', 47, 'second_stage_start_date', '2025-02-25 00:00:00', '', 1, '2025-02-25 04:55:09', '2025-02-25 04:55:09'),
(338, 'App\\Models\\Project', 47, 'second_stage_end_date', '2025-03-17 00:00:00', '', 1, '2025-02-25 04:55:09', '2025-02-25 04:55:09'),
(339, 'App\\Models\\Project', 47, 'updated_at', '2025-02-25 09:51:14', '2025-02-25 09:55:09', 1, '2025-02-25 04:55:09', '2025-02-25 04:55:09'),
(340, 'App\\Models\\Project', 46, 'status', '2_step', '1_step', 1, '2025-02-25 04:55:36', '2025-02-25 04:55:36'),
(341, 'App\\Models\\Project', 46, 'second_stage_start_date', '2025-02-25 00:00:00', '', 1, '2025-02-25 04:55:36', '2025-02-25 04:55:36'),
(342, 'App\\Models\\Project', 46, 'second_stage_end_date', '2025-03-17 00:00:00', '', 1, '2025-02-25 04:55:36', '2025-02-25 04:55:36'),
(343, 'App\\Models\\Project', 46, 'updated_at', '2025-02-25 09:50:54', '2025-02-25 09:55:36', 1, '2025-02-25 04:55:36', '2025-02-25 04:55:36'),
(344, 'App\\Models\\Project', 46, 'pratakol_fayl', 'project_images/pratakol_fayl/MnTzg9zortDMLvyBxsckz48gp338z2moX1xKwLhB.pdf', 'project_images/pratakol_fayl/Oy4JgMPFLDT8v6xhqTAtASoeJ3nKiAXKq9R0tm2Q.pdf', 1, '2025-02-25 06:40:30', '2025-02-25 06:40:30'),
(345, 'App\\Models\\Project', 46, 'updated_at', '2025-02-25 09:55:36', '2025-02-25 11:40:30', 1, '2025-02-25 06:40:30', '2025-02-25 06:40:30'),
(346, 'App\\Models\\Project', 46, 'status', '1_step', '2_step', 1, '2025-02-26 08:51:26', '2025-02-26 08:51:26'),
(347, 'App\\Models\\Project', 46, 'second_stage_start_date', 'not_exists', '2025-02-26 00:00:00', 1, '2025-02-26 08:51:26', '2025-02-26 08:51:26'),
(348, 'App\\Models\\Project', 46, 'second_stage_end_date', 'not_exists', '2025-04-14 00:00:00', 1, '2025-02-26 08:51:26', '2025-02-26 08:51:26'),
(349, 'App\\Models\\Project', 46, 'updated_at', '2025-02-25 11:40:30', '2025-02-26 13:51:26', 1, '2025-02-26 08:51:26', '2025-02-26 08:51:26'),
(350, 'App\\Models\\Project', 47, 'status', '1_step', '2_step', 1, '2025-02-26 08:51:54', '2025-02-26 08:51:54'),
(351, 'App\\Models\\Project', 47, 'second_stage_start_date', 'not_exists', '2025-02-26 00:00:00', 1, '2025-02-26 08:51:54', '2025-02-26 08:51:54'),
(352, 'App\\Models\\Project', 47, 'second_stage_end_date', 'not_exists', '2025-04-14 00:00:00', 1, '2025-02-26 08:51:54', '2025-02-26 08:51:54'),
(353, 'App\\Models\\Project', 47, 'updated_at', '2025-02-25 09:55:09', '2025-02-26 13:51:54', 1, '2025-02-26 08:51:54', '2025-02-26 08:51:54'),
(354, 'App\\Models\\Project', 27, 'comment', '2024 йил 7 ноябрь куни бўлиб ўтган Яккасарой тyманини Хамид Сулаймонов МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “GRIFFIN DEVELOPMENT ADVISORY” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “GRIFFIN DEVELOPMENT ADVISORY” МЧЖ томонидан тақдим этилган таклифи маъқулланди.', '2024 йил 21 октябрь куни бўлиб ўтган Яккасарой тyманини Хамид Сулаймонов МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “GRIFFIN DEVELOPMENT ADVISORY” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “GRIFFIN DEVELOPMENT ADVISORY” МЧЖ томонидан тақдим этилган таклифи маъқулланди.', 1, '2025-03-04 11:40:16', '2025-03-04 11:40:16'),
(355, 'App\\Models\\Project', 27, 'updated_at', '2024-12-12 16:47:27', '2025-03-04 16:40:16', 1, '2025-03-04 11:40:16', '2025-03-04 11:40:16'),
(356, 'App\\Models\\Project', 26, 'comment', '2024 йил 21 октябрь куни бўлиб ўтган Чилонзор тyманини Катта Қозиробод МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “ISAAR DEVELOPMENT” МЧЖ ва “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда ISAAR DEVELOPMENT” МЧЖ ва “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган таклифлари маъқулланди.', '2024 йил 10 октябрь куни бўлиб ўтган Чилонзор тyманини Катта Қозиробод МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “ISAAR DEVELOPMENT” МЧЖ ва “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда ISAAR DEVELOPMENT” МЧЖ ва “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган таклифлари маъқулланди.', 1, '2025-03-04 11:41:39', '2025-03-04 11:41:39'),
(357, 'App\\Models\\Project', 26, 'updated_at', '2024-12-12 16:47:01', '2025-03-04 16:41:39', 1, '2025-03-04 11:41:39', '2025-03-04 11:41:39'),
(358, 'App\\Models\\Project', 36, 'pratakol_fayl', 'project_images/4pgY5DKQLZJ3xo4jmDi7iL2zUqth9Wee2baugrDO.pdf', 'project_images/pratakol_fayl/J2Wkr4yvFuxmsIJhLA4wBlC6IV5n3oO6pbdXYcO0.pdf', 1, '2025-03-05 11:12:34', '2025-03-05 11:12:34'),
(359, 'App\\Models\\Project', 36, 'updated_at', '2025-02-05 17:11:32', '2025-03-05 16:12:34', 1, '2025-03-05 11:12:34', '2025-03-05 11:12:34'),
(360, 'App\\Models\\Project', 34, 'pratakol_fayl', 'project_images/WLpMwO6ldfSeIHjNPWIYLlzYwTjnEPH1jdxld83s.pdf', 'project_images/pratakol_fayl/aTOTD4yLmasq6Z70NbxISR0oiQFfmIGIik0K5s5f.pdf', 1, '2025-03-05 11:14:42', '2025-03-05 11:14:42'),
(361, 'App\\Models\\Project', 34, 'updated_at', '2025-02-05 17:14:52', '2025-03-05 16:14:42', 1, '2025-03-05 11:14:42', '2025-03-05 11:14:42'),
(362, 'App\\Models\\Project', 48, 'pratakol_fayl', 'not_exists', 'project_images/pratakol_fayl/B8RuACpl2cQX86wH2jg7HRNxg7alk9uu8ddIVPBP.pdf', 1, '2025-03-06 12:47:19', '2025-03-06 12:47:19'),
(363, 'App\\Models\\Project', 48, 'status', '1_step', '2_step', 1, '2025-03-06 12:47:19', '2025-03-06 12:47:19'),
(364, 'App\\Models\\Project', 48, 'second_stage_start_date', 'not_exists', '2025-03-06 00:00:00', 1, '2025-03-06 12:47:19', '2025-03-06 12:47:19'),
(365, 'App\\Models\\Project', 48, 'second_stage_end_date', 'not_exists', '2025-04-30 00:00:00', 1, '2025-03-06 12:47:19', '2025-03-06 12:47:19'),
(366, 'App\\Models\\Project', 48, 'updated_at', '2025-02-19 14:43:46', '2025-03-06 17:47:19', 1, '2025-03-06 12:47:19', '2025-03-06 12:47:19'),
(367, 'App\\Models\\Project', 19, 'contact_person', 'not_exists', 'O\'tkir aka tamonidan', 1, '2025-03-11 05:13:16', '2025-03-11 05:13:16'),
(368, 'App\\Models\\Project', 19, 'status', 'completed', 'archive', 1, '2025-03-11 05:13:16', '2025-03-11 05:13:16'),
(369, 'App\\Models\\Project', 19, 'updated_at', '2025-02-04 18:03:43', '2025-03-11 10:13:16', 1, '2025-03-11 05:13:16', '2025-03-11 05:13:16'),
(370, 'App\\Models\\Project', 20, 'contact_person', 'not_exists', 'O\'tkir aka tamonidan', 1, '2025-03-11 05:13:39', '2025-03-11 05:13:39'),
(371, 'App\\Models\\Project', 20, 'status', 'completed', 'archive', 1, '2025-03-11 05:13:39', '2025-03-11 05:13:39'),
(372, 'App\\Models\\Project', 20, 'updated_at', '2025-02-04 18:04:25', '2025-03-11 10:13:39', 1, '2025-03-11 05:13:39', '2025-03-11 05:13:39'),
(373, 'App\\Models\\Project', 21, 'contact_person', 'not_exists', 'O\'tkir aka tamonidan', 1, '2025-03-11 05:13:54', '2025-03-11 05:13:54'),
(374, 'App\\Models\\Project', 21, 'status', 'completed', 'archive', 1, '2025-03-11 05:13:54', '2025-03-11 05:13:54'),
(375, 'App\\Models\\Project', 21, 'updated_at', '2025-02-04 18:08:34', '2025-03-11 10:13:54', 1, '2025-03-11 05:13:54', '2025-03-11 05:13:54'),
(376, 'App\\Models\\Project', 22, 'contact_person', 'not_exists', 'O\'tkir aka tamonidan', 1, '2025-03-11 05:14:09', '2025-03-11 05:14:09'),
(377, 'App\\Models\\Project', 22, 'status', 'completed', 'archive', 1, '2025-03-11 05:14:09', '2025-03-11 05:14:09'),
(378, 'App\\Models\\Project', 22, 'updated_at', '2024-12-12 16:45:45', '2025-03-11 10:14:09', 1, '2025-03-11 05:14:09', '2025-03-11 05:14:09'),
(379, 'App\\Models\\Project', 3, 'second_stage_end_date', '2025-03-03 00:00:00', '2025-03-15 00:00:00', 1, '2025-03-12 11:46:41', '2025-03-12 11:46:41'),
(380, 'App\\Models\\Project', 3, 'updated_at', '2025-02-13 12:27:06', '2025-03-12 16:46:41', 1, '2025-03-12 11:46:42', '2025-03-12 11:46:42'),
(381, 'App\\Models\\Project', 10, 'second_stage_end_date', '2025-03-17 00:00:00', '2025-04-14 00:00:00', 1, '2025-03-12 11:47:29', '2025-03-12 11:47:29'),
(382, 'App\\Models\\Project', 10, 'updated_at', '2025-02-17 15:20:24', '2025-03-12 16:47:29', 1, '2025-03-12 11:47:29', '2025-03-12 11:47:29'),
(383, 'App\\Models\\Project', 44, 'second_stage_end_date', '2025-04-02 00:00:00', '2025-04-07 00:00:00', 1, '2025-04-11 16:18:22', '2025-04-11 16:18:22'),
(384, 'App\\Models\\Project', 44, 'updated_at', '2025-02-19 17:10:43', '2025-04-11 21:18:22', 1, '2025-04-11 16:18:22', '2025-04-11 16:18:22'),
(385, 'App\\Models\\Project', 12, 'comment', 'not_exists', '2025 йил 20 март куни бўлиб ўтган Яшнобод тумани Мумтоз МФЙ (3,20 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича танлов комиссияси якуний босқичида “TEMUR INVEST BIZNES” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди. Ушбу танловда “TEMUR INVEST BIZNES” МЧЖ тақдим этган лойиҳа комиссия аъзолари томонидан бир овоздан мақулланди.', 1, '2025-04-22 14:05:23', '2025-04-22 14:05:23'),
(386, 'App\\Models\\Project', 12, 'status', '2_step', 'completed', 1, '2025-04-22 14:05:23', '2025-04-22 14:05:23'),
(387, 'App\\Models\\Project', 12, 'updated_at', '2025-02-05 17:49:38', '2025-04-22 19:05:23', 1, '2025-04-22 14:05:23', '2025-04-22 14:05:23'),
(388, 'App\\Models\\Project', 9, 'comment', 'not_exists', '2025 йил 20 март куни бўлиб ўтган Яшнобод тумани Илтифот 2 МФЙ (2,28 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича танлов комиссияси якуний босқичида “MEMOR HOUSE” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди. Ушбу танловда “MEMOR HOUSE” МЧЖ тақдим этган лойиҳа комиссия аъзолари томонидан бир овоздан мақулланди.', 1, '2025-04-22 14:05:58', '2025-04-22 14:05:58'),
(389, 'App\\Models\\Project', 9, 'status', '2_step', 'completed', 1, '2025-04-22 14:05:58', '2025-04-22 14:05:58'),
(390, 'App\\Models\\Project', 9, 'updated_at', '2025-02-05 17:36:38', '2025-04-22 19:05:58', 1, '2025-04-22 14:05:58', '2025-04-22 14:05:58'),
(391, 'App\\Models\\Project', 18, 'comment', 'not_exists', '3. 2025 йил 20 март куни бўлиб ўтган Мирзо Улуғбек тумани Дархон МФЙ (0,40 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича танлов комиссияси якуний босқичида “KATTA DARXON STROY” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди. Ушбу танловда “KATTA DARXON STROY” МЧЖ тақдим этган лойиҳа комиссия аъзолари томонидан бир овоздан рад этилди.', 1, '2025-04-24 13:58:42', '2025-04-24 13:58:42'),
(392, 'App\\Models\\Project', 18, 'status', '2_step', 'completed', 1, '2025-04-24 13:58:42', '2025-04-24 13:58:42'),
(393, 'App\\Models\\Project', 18, 'updated_at', '2024-12-11 23:25:15', '2025-04-24 18:58:42', 1, '2025-04-24 13:58:42', '2025-04-24 13:58:42'),
(394, 'App\\Models\\Project', 9, 'comment', '2025 йил 20 март куни бўлиб ўтган Яшнобод тумани Илтифот 2 МФЙ (2,28 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича танлов комиссияси якуний босқичида “MEMOR HOUSE” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди. Ушбу танловда “MEMOR HOUSE” МЧЖ тақдим этган лойиҳа комиссия аъзолари томонидан бир овоздан мақулланди.', '2025 йил 20 март куни бўлиб ўтган Яшнобод тумани Илтифот 2 МФЙ (2,28 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича танлов комиссияси якуний босқичида “MEMOR HAUSE” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди. Ушбу танловда “MEMOR HAUSE” МЧЖ тақдим этган лойиҳа комиссия аъзолари томонидан бир овоздан мақулланди.', 1, '2025-04-30 10:46:27', '2025-04-30 10:46:27'),
(395, 'App\\Models\\Project', 9, 'updated_at', '2025-04-22 19:05:58', '2025-04-30 15:46:27', 1, '2025-04-30 10:46:27', '2025-04-30 10:46:27'),
(396, 'App\\Models\\Project', 49, 'street', 'Чарҳ Камолон-1', '', 1, '2025-05-07 08:12:50', '2025-05-07 08:12:50'),
(397, 'App\\Models\\Project', 49, 'mahalla', 'not_exists', 'Чарҳ Камолон-1', 1, '2025-05-07 08:12:50', '2025-05-07 08:12:50'),
(398, 'App\\Models\\Project', 49, 'updated_at', '2025-05-07 13:09:30', '2025-05-07 13:12:50', 1, '2025-05-07 08:12:50', '2025-05-07 08:12:50'),
(399, 'App\\Models\\Project', 43, 'comment', 'not_exists', '2025 йил 25 март куни бўлиб ўтган Бектемир тумани “Хусайн Байқаро 1” МФЙ (2,77 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “OLTIN BALIQ” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди. Ушбу танловда “OLTIN BALIQ” МЧЖ (СТИР: 304811633) тақдим этган лойиҳа Комиссия аъзолари  томонидан мақулланди.', 1, '2025-05-07 12:42:49', '2025-05-07 12:42:49'),
(400, 'App\\Models\\Project', 43, 'status', '2_step', 'completed', 1, '2025-05-07 12:42:49', '2025-05-07 12:42:49'),
(401, 'App\\Models\\Project', 43, 'updated_at', '2025-02-19 17:09:06', '2025-05-07 17:42:49', 1, '2025-05-07 12:42:49', '2025-05-07 12:42:49'),
(402, 'App\\Models\\Project', 33, 'comment', 'not_exists', '2025 йил 25 март куни бўлиб ўтган Бектемир тумани “Хусайн Байқаро 2” МФЙ (8,23 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “COMFORT CONSTRUCTION” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди.  Ушбу танловда “COMFORT CONSTRUCTION” МЧЖ (СТИР: 304345270) тақдим этган лойиҳа Комиссия аъзолари томонидан мақулланди.', 1, '2025-05-07 12:43:10', '2025-05-07 12:43:10'),
(403, 'App\\Models\\Project', 33, 'status', '2_step', 'completed', 1, '2025-05-07 12:43:10', '2025-05-07 12:43:10'),
(404, 'App\\Models\\Project', 33, 'updated_at', '2025-02-05 17:16:42', '2025-05-07 17:43:10', 1, '2025-05-07 12:43:10', '2025-05-07 12:43:10'),
(405, 'App\\Models\\Project', 4, 'comment', 'not_exists', '2025 йил 25 март куни бўлиб ўтган Мирзо Улуғбек тумани “Буюк Ипак Йўли” МФЙ (2,0 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “KAPITAL START” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди.  Ушбу танловда “KAPITAL START” МЧЖ (СТИР: 305399425) тақдим этган лойиҳа Комиссия аъзолари томонидан рад этилди.', 1, '2025-05-07 12:43:36', '2025-05-07 12:43:36'),
(406, 'App\\Models\\Project', 4, 'status', '2_step', 'completed', 1, '2025-05-07 12:43:36', '2025-05-07 12:43:36'),
(407, 'App\\Models\\Project', 4, 'updated_at', '2025-02-05 17:26:00', '2025-05-07 17:43:36', 1, '2025-05-07 12:43:36', '2025-05-07 12:43:36'),
(408, 'App\\Models\\Project', 38, 'comment', 'not_exists', '2025 йил 25 март куни бўлиб ўтган Мирзо Улуғбек тумани “Наққошлик” МФЙ (1,0 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “BEST TALL HOUSE” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди.  Ушбу танловда “BEST TALL HOUSE” МФЙ (СТИР:31036143332) тақдим этган лойиҳа Комиссия аъзолари томонидан мақулланди.', 1, '2025-05-07 12:43:55', '2025-05-07 12:43:55'),
(409, 'App\\Models\\Project', 38, 'status', '2_step', 'completed', 1, '2025-05-07 12:43:55', '2025-05-07 12:43:55'),
(410, 'App\\Models\\Project', 38, 'updated_at', '2025-02-05 17:27:46', '2025-05-07 17:43:55', 1, '2025-05-07 12:43:55', '2025-05-07 12:43:55'),
(411, 'App\\Models\\Project', 49, 'elon_fayl', 'project_images/elon/cY5mnphmIHcMQmqY6IlUAypNPaepAmT3Hla0t8Ot.pdf', 'project_images/elon_fayl/NwNzLCWMUhB2vxPvbEOQJz7S3SSNR7Uexq75LSs3.pdf', 1, '2025-05-13 13:51:07', '2025-05-13 13:51:07'),
(412, 'App\\Models\\Project', 49, 'updated_at', '2025-05-07 13:12:50', '2025-05-13 18:51:07', 1, '2025-05-13 13:51:07', '2025-05-13 13:51:07'),
(413, 'App\\Models\\Project', 3, 'comment', 'not_exists', '2025 йил 25 март куни бўлиб ўтган Юнусобод тумани «Бўзсув» МФЙ (4,20 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “ЭЗДАР РEНОВАТИОН” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.  Ушбу танловда “ЭЗДАР РEНОВАТИОН” МФЙ (СТИР: 311675325) тақдим этган лойиҳа Комиссия аъзолари томонидан рад этилди.', 1, '2025-05-16 14:34:23', '2025-05-16 14:34:23'),
(414, 'App\\Models\\Project', 3, 'status', '2_step', 'archive', 1, '2025-05-16 14:34:23', '2025-05-16 14:34:23'),
(415, 'App\\Models\\Project', 3, 'updated_at', '2025-03-12 16:46:41', '2025-05-16 19:34:23', 1, '2025-05-16 14:34:23', '2025-05-16 14:34:23'),
(416, 'App\\Models\\Project', 3, 'comment', '2025 йил 25 март куни бўлиб ўтган Юнусобод тумани «Бўзсув» МФЙ (4,20 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “ЭЗДАР РEНОВАТИОН” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.  Ушбу танловда “ЭЗДАР РEНОВАТИОН” МФЙ (СТИР: 311675325) тақдим этган лойиҳа Комиссия аъзолари томонидан рад этилди.', '2025 йил 25 март куни бўлиб ўтган Юнусобод тумани “Бўзсув” МФЙ (4,20 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “EZDAR RENOVATION” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.  Ушбу танловда “EZDAR RENOVATION” МФЙ (СТИР: 311675325) тақдим этган лойиҳа Комиссия аъзолари томонидан рад этилди.', 1, '2025-05-16 14:44:17', '2025-05-16 14:44:17'),
(417, 'App\\Models\\Project', 3, 'updated_at', '2025-05-16 19:34:23', '2025-05-16 19:44:17', 1, '2025-05-16 14:44:17', '2025-05-16 14:44:17'),
(418, 'App\\Models\\Project', 3, 'comment', '2025 йил 25 март куни бўлиб ўтган Юнусобод тумани “Бўзсув” МФЙ (4,20 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “EZDAR RENOVATION” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.  Ушбу танловда “EZDAR RENOVATION” МФЙ (СТИР: 311675325) тақдим этган лойиҳа Комиссия аъзолари томонидан рад этилди.', '2025 йил 25 март куни бўлиб ўтган Юнусобод тумани “Бўзсув” МФЙ (4,20 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “EZDAR RENOVATION” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.  Ушбу танловда “EZDAR RENOVATION” МЧЖ (СТИР: 311675325) тақдим этган лойиҳа Комиссия аъзолари томонидан рад этилди.', 1, '2025-05-16 14:46:52', '2025-05-16 14:46:52'),
(419, 'App\\Models\\Project', 3, 'updated_at', '2025-05-16 19:44:17', '2025-05-16 19:46:52', 1, '2025-05-16 14:46:52', '2025-05-16 14:46:52'),
(420, 'App\\Models\\Project', 35, 'comment', 'not_exists', '2025 йил 20 март куни бўлиб ўтган Яккасарой тумани “Абдулла Қаҳҳор” МФЙ (0,32 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “SALAR CAPITAL RENTING” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.  Ушбу танловда “SALAR CAPITAL RENTING” МЧЖ (СТИР: 311699872) тақдим этган лойиҳа Комиссия аъзолари томонидан мақулланди.', 1, '2025-05-16 17:02:46', '2025-05-16 17:02:46'),
(421, 'App\\Models\\Project', 35, 'status', '2_step', 'completed', 1, '2025-05-16 17:02:46', '2025-05-16 17:02:46'),
(422, 'App\\Models\\Project', 35, 'updated_at', '2025-02-13 12:28:41', '2025-05-16 22:02:46', 1, '2025-05-16 17:02:46', '2025-05-16 17:02:46'),
(423, 'App\\Models\\Project', 46, 'comment', 'not_exists', '2025 йил 18 апрел куни бўлиб ўтган Мирзо Улуғбек тумани “Навниҳол-2” МФЙ (3,30 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “MOYA TERRITORIYA GROUP” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.  Ушбу танловда “MOYA TERRITORIYA GROUP” МЧЖ (СТИР:305482964) тақдим этган лойиҳа Комиссия аъзолари томонидан мақулланди.', 1, '2025-05-21 07:14:08', '2025-05-21 07:14:08'),
(424, 'App\\Models\\Project', 46, 'status', '2_step', 'completed', 1, '2025-05-21 07:14:08', '2025-05-21 07:14:08'),
(425, 'App\\Models\\Project', 46, 'updated_at', '2025-02-26 13:51:26', '2025-05-21 12:14:08', 1, '2025-05-21 07:14:08', '2025-05-21 07:14:08'),
(426, 'App\\Models\\Project', 48, 'comment', 'not_exists', '2025 йил 21 апрел куни бўлиб ўтган Яккасарой тумани “Шоҳжаҳон” МФЙ (4,56 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида   “SHENG KE-INTERNATIONAL” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.   Ушбу танловда “SHENG KE-INTERNATIONAL” МЧЖ (СТИР: 311344887)  тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 1, '2025-05-22 05:21:15', '2025-05-22 05:21:15'),
(427, 'App\\Models\\Project', 48, 'status', '2_step', 'completed', 1, '2025-05-22 05:21:15', '2025-05-22 05:21:15'),
(428, 'App\\Models\\Project', 48, 'updated_at', '2025-03-06 17:47:19', '2025-05-22 10:21:15', 1, '2025-05-22 05:21:15', '2025-05-22 05:21:15'),
(429, 'App\\Models\\Project', 47, 'comment', 'not_exists', '2025 йил 21 апрел куни бўлиб ўтган Яшнобод тумани “Илтифот-1” МФЙ (9,6 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида   “HAMSA CONSERN” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.   Ушбу танловда “HAMSA CONSERN” МЧЖ (СТИР: 307535404)  тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 1, '2025-05-22 05:21:53', '2025-05-22 05:21:53'),
(430, 'App\\Models\\Project', 47, 'status', '2_step', 'completed', 1, '2025-05-22 05:21:53', '2025-05-22 05:21:53'),
(431, 'App\\Models\\Project', 47, 'updated_at', '2025-02-26 13:51:54', '2025-05-22 10:21:53', 1, '2025-05-22 05:21:53', '2025-05-22 05:21:53'),
(432, 'App\\Models\\Project', 13, 'comment', 'not_exists', '2025 йил 25 март куни бўлиб ўтган Шайхонтоҳур тумани “Самарқанд Дарвоза” МФЙ (28,89 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида   “BEST-TALL-HOUSE” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.   Ушбу танловда “BEST-TALL-HOUSE” МЧЖ (СТИР: 310361432)  тақдим этган лойиҳа Комиссия аъзолари томонидан рад этилди.', 1, '2025-05-22 05:22:26', '2025-05-22 05:22:26'),
(433, 'App\\Models\\Project', 13, 'status', '2_step', 'archive', 1, '2025-05-22 05:22:26', '2025-05-22 05:22:26'),
(434, 'App\\Models\\Project', 13, 'updated_at', '2025-02-05 17:51:04', '2025-05-22 10:22:26', 1, '2025-05-22 05:22:26', '2025-05-22 05:22:26'),
(435, 'App\\Models\\Project', 16, 'comment', 'not_exists', '2025 йил 20 март куни бўлиб ўтган Сергели тумани “Олтинводий” МФЙ (1,83 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида   “ZHONG TUO” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.   Ушбу танловда “ZHONG TUO” МЧЖ (СТИР: 310099909)  тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 1, '2025-05-22 05:22:59', '2025-05-22 05:22:59'),
(436, 'App\\Models\\Project', 16, 'status', '2_step', 'completed', 1, '2025-05-22 05:22:59', '2025-05-22 05:22:59'),
(437, 'App\\Models\\Project', 16, 'updated_at', '2024-12-12 17:42:04', '2025-05-22 10:22:59', 1, '2025-05-22 05:22:59', '2025-05-22 05:22:59'),
(438, 'App\\Models\\Project', 49, 'status', '1_step', '2_step', 1, '2025-05-28 15:12:43', '2025-05-28 15:12:43'),
(439, 'App\\Models\\Project', 49, 'second_stage_start_date', 'not_exists', '2025-05-27 00:00:00', 1, '2025-05-28 15:12:43', '2025-05-28 15:12:43'),
(440, 'App\\Models\\Project', 49, 'second_stage_end_date', 'not_exists', '2025-07-09 00:00:00', 1, '2025-05-28 15:12:43', '2025-05-28 15:12:43'),
(441, 'App\\Models\\Project', 49, 'updated_at', '2025-05-13 18:51:07', '2025-05-28 20:12:43', 1, '2025-05-28 15:12:43', '2025-05-28 15:12:43'),
(442, 'App\\Models\\Project', 49, 'pratakol_fayl', 'not_exists', 'project_images/pratakol_fayl/4PvoWmrDeMZHCl1Mrw5TMXkPG7EoPUUoriuNIpiS.jpg', 1, '2025-05-29 09:59:28', '2025-05-29 09:59:28'),
(443, 'App\\Models\\Project', 49, 'updated_at', '2025-05-28 20:12:43', '2025-05-29 14:59:28', 1, '2025-05-29 09:59:28', '2025-05-29 09:59:28'),
(444, 'App\\Models\\Project', 23, 'comment', 'not_exists', '2024 йил 07 ноябрь куни бўлиб ўтган Чилонзор тyманини Тарнов Шарк МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “Pelican motorss” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “Pelican motorss” МЧЖ томонидан тақдим этилган таклифи рад этилди.', 1, '2025-07-04 13:48:13', '2025-07-04 13:48:13'),
(445, 'App\\Models\\Project', 23, 'updated_at', '2024-12-11 23:41:58', '2025-07-04 18:48:13', 1, '2025-07-04 13:48:13', '2025-07-04 13:48:13'),
(446, 'App\\Models\\Project', 23, 'status', '2_step', 'archive', 1, '2025-07-04 13:53:54', '2025-07-04 13:53:54'),
(447, 'App\\Models\\Project', 23, 'updated_at', '2025-07-04 18:48:13', '2025-07-04 18:53:54', 1, '2025-07-04 13:53:54', '2025-07-04 13:53:54'),
(448, 'App\\Models\\Project', 45, 'comment', 'not_exists', '2025 йил 23 май куни бўлиб ўтган Чилонзор тумани “Лутий” МФЙ (1,64 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида “MIR SKAZOK” МЧЖ ва “NEW CIVIL CONSTRUCTION”МЧЖ биргаликда тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “MIR SKAZOK” МЧЖ (СТИР: 20592775) “NEW CIVIL CONSTRUCTION”МЧЖ биргаликда(СТИР: 305071146) тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 1, '2025-07-04 14:25:18', '2025-07-04 14:25:18'),
(449, 'App\\Models\\Project', 45, 'updated_at', '2025-02-19 17:09:45', '2025-07-04 19:25:18', 1, '2025-07-04 14:25:18', '2025-07-04 14:25:18'),
(450, 'App\\Models\\Project', 45, 'comment', '2025 йил 23 май куни бўлиб ўтган Чилонзор тумани “Лутий” МФЙ (1,64 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида “MIR SKAZOK” МЧЖ ва “NEW CIVIL CONSTRUCTION”МЧЖ биргаликда тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “MIR SKAZOK” МЧЖ (СТИР: 20592775) “NEW CIVIL CONSTRUCTION”МЧЖ биргаликда(СТИР: 305071146) тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 'Прошел 2 этапа', 1, '2025-07-04 16:11:21', '2025-07-04 16:11:21'),
(451, 'App\\Models\\Project', 45, 'updated_at', '2025-07-04 19:25:18', '2025-07-04 21:11:21', 1, '2025-07-04 16:11:21', '2025-07-04 16:11:21'),
(452, 'App\\Models\\Project', 4, 'status', 'completed', 'archive', 1, '2025-07-09 07:29:34', '2025-07-09 07:29:34'),
(453, 'App\\Models\\Project', 4, 'updated_at', '2025-05-07 17:43:36', '2025-07-09 12:29:34', 1, '2025-07-09 07:29:34', '2025-07-09 07:29:34'),
(454, 'App\\Models\\Project', 4, 'comment', '2025 йил 25 март куни бўлиб ўтган Мирзо Улуғбек тумани “Буюк Ипак Йўли” МФЙ (2,0 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “KAPITAL START” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди.  Ушбу танловда “KAPITAL START” МЧЖ (СТИР: 305399425) тақдим этган лойиҳа Комиссия аъзолари томонидан рад этилди.', '', 1, '2025-07-09 07:33:05', '2025-07-09 07:33:05'),
(455, 'App\\Models\\Project', 4, 'updated_at', '2025-07-09 12:29:34', '2025-07-09 12:33:05', 1, '2025-07-09 07:33:05', '2025-07-09 07:33:05'),
(456, 'App\\Models\\Project', 26, 'comment', '2024 йил 10 октябрь куни бўлиб ўтган Чилонзор тyманини Катта Қозиробод МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “ISAAR DEVELOPMENT” МЧЖ ва “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда ISAAR DEVELOPMENT” МЧЖ ва “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган таклифлари маъқулланди.', '2024 йил 10 октябрь куни бўлиб ўтган Чилонзор тyманини Катта Қозиробод МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “ISAAR DEVELOPMENT” МЧЖ ва “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда ISSAAR DEVELOPMENT” МЧЖ ва “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган таклифлари маъқулланди.', 1, '2025-07-15 08:18:42', '2025-07-15 08:18:42'),
(457, 'App\\Models\\Project', 26, 'updated_at', '2025-03-04 16:41:39', '2025-07-15 13:18:42', 1, '2025-07-15 08:18:42', '2025-07-15 08:18:42'),
(458, 'App\\Models\\Project', 4, 'comment', 'not_exists', '2025 йил 25 март куни бўлиб ўтган Мирзо Улуғбек тумани “Буюк Ипак Йўли” МФЙ (2,0 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича  якуний босқичда  “KAPITAL START” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди ҳамда маъқулланди.', 1, '2025-07-15 13:20:43', '2025-07-15 13:20:43'),
(459, 'App\\Models\\Project', 4, 'status', 'archive', 'completed', 1, '2025-07-15 13:20:43', '2025-07-15 13:20:43'),
(460, 'App\\Models\\Project', 4, 'updated_at', '2025-07-09 12:33:05', '2025-07-15 18:20:43', 1, '2025-07-15 13:20:43', '2025-07-15 13:20:43'),
(461, 'App\\Models\\Project', 50, 'pratakol_fayl', 'not_exists', 'project_images/pratakol_fayl/PXnWbqlGIkUNOb6ke9CYRlzE7KAnMOrdW136JD5K.jpg', 1, '2025-07-28 04:31:11', '2025-07-28 04:31:11'),
(462, 'App\\Models\\Project', 50, 'status', '1_step', '2_step', 1, '2025-07-28 04:31:11', '2025-07-28 04:31:11'),
(463, 'App\\Models\\Project', 50, 'updated_at', '2025-05-23 11:12:09', '2025-07-28 09:31:11', 1, '2025-07-28 04:31:11', '2025-07-28 04:31:11'),
(464, 'App\\Models\\Project', 51, 'pratakol_fayl', 'not_exists', 'project_images/pratakol_fayl/mvZWH1Iy0NTDr4c4LXpLLiwFbyCBW6EqvXAgRqxJ.jpg', 1, '2025-07-28 04:31:34', '2025-07-28 04:31:34'),
(465, 'App\\Models\\Project', 51, 'status', '1_step', '2_step', 1, '2025-07-28 04:31:34', '2025-07-28 04:31:34'),
(466, 'App\\Models\\Project', 51, 'updated_at', '2025-05-23 11:13:19', '2025-07-28 09:31:34', 1, '2025-07-28 04:31:34', '2025-07-28 04:31:34'),
(467, 'App\\Models\\Project', 50, 'second_stage_start_date', 'not_exists', '2025-07-10 00:00:00', 1, '2025-07-28 09:29:25', '2025-07-28 09:29:25'),
(468, 'App\\Models\\Project', 50, 'second_stage_end_date', 'not_exists', '2025-08-21 00:00:00', 1, '2025-07-28 09:29:25', '2025-07-28 09:29:25'),
(469, 'App\\Models\\Project', 50, 'updated_at', '2025-07-28 09:31:11', '2025-07-28 14:29:25', 1, '2025-07-28 09:29:25', '2025-07-28 09:29:25'),
(470, 'App\\Models\\Project', 51, 'second_stage_start_date', 'not_exists', '2025-07-10 00:00:00', 1, '2025-07-28 09:29:51', '2025-07-28 09:29:51'),
(471, 'App\\Models\\Project', 51, 'second_stage_end_date', 'not_exists', '2025-08-21 00:00:00', 1, '2025-07-28 09:29:51', '2025-07-28 09:29:51'),
(472, 'App\\Models\\Project', 51, 'updated_at', '2025-07-28 09:31:34', '2025-07-28 14:29:51', 1, '2025-07-28 09:29:51', '2025-07-28 09:29:51'),
(473, 'App\\Models\\Project', 45, 'comment', 'Прошел 2 этапа', '2025 йил 23 май куни бўлиб ўтган Чилонзор тумани “Лутфий” МФЙ (1,64 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида “MIR SKAZOK” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “MIR SKAZOK” МЧЖ (СТИР: 205921775) тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 1, '2025-07-28 09:43:41', '2025-07-28 09:43:41'),
(474, 'App\\Models\\Project', 45, 'status', '2_step', 'completed', 1, '2025-07-28 09:43:41', '2025-07-28 09:43:41'),
(475, 'App\\Models\\Project', 45, 'updated_at', '2025-07-04 21:11:21', '2025-07-28 14:43:41', 1, '2025-07-28 09:43:41', '2025-07-28 09:43:41'),
(476, 'App\\Models\\Project', 44, 'geolocation', 'not_exists', 'bekzodaka (botraka) renovation', 1, '2025-07-28 09:50:11', '2025-07-28 09:50:11'),
(477, 'App\\Models\\Project', 44, 'comment', 'not_exists', '2025 йил 18 апрел  куни бўлиб ўтган Чилонзор тумани “Тирсакобод” МФЙ (2,50 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида “ABDURAXMON-ISHONCH-AGRO-FAYZ” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “ABDURAXMON-ISHONCH-AGRO-FAYZ” МЧЖ (СТИР: 30755404) тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 1, '2025-07-28 09:50:11', '2025-07-28 09:50:11'),
(478, 'App\\Models\\Project', 44, 'status', '2_step', 'completed', 1, '2025-07-28 09:50:11', '2025-07-28 09:50:11'),
(479, 'App\\Models\\Project', 44, 'updated_at', '2025-04-11 21:18:22', '2025-07-28 14:50:11', 1, '2025-07-28 09:50:11', '2025-07-28 09:50:11'),
(480, 'App\\Models\\Project', 45, 'geolocation', 'not_exists', 'bekzodaka (botraka) renovation', 1, '2025-07-28 09:50:31', '2025-07-28 09:50:31'),
(481, 'App\\Models\\Project', 45, 'updated_at', '2025-07-28 14:43:41', '2025-07-28 14:50:31', 1, '2025-07-28 09:50:31', '2025-07-28 09:50:31'),
(482, 'App\\Models\\Project', 1, 'geolocation', 'not_exists', 'bekzodaka (botraka) renovation', 1, '2025-07-28 09:58:37', '2025-07-28 09:58:37'),
(483, 'App\\Models\\Project', 1, 'comment', 'not_exists', '2025 йил 25 март  куни бўлиб ўтган Шайхонтоҳур тумани “Лабзак” МФЙ (1,46 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида “FOOTBALL HOUSE” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “FOOTBALL HOUSE” МЧЖ (СТИР: 310655270) тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 1, '2025-07-28 09:58:37', '2025-07-28 09:58:37'),
(484, 'App\\Models\\Project', 1, 'status', '2_step', 'completed', 1, '2025-07-28 09:58:37', '2025-07-28 09:58:37'),
(485, 'App\\Models\\Project', 1, 'updated_at', '2025-02-05 17:18:05', '2025-07-28 14:58:37', 1, '2025-07-28 09:58:37', '2025-07-28 09:58:37'),
(486, 'App\\Models\\Project', 2, 'comment', 'not_exists', 'Юнусобод тумани “Буюк Турон” МФЙ (2,43 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича “ZHONG WANG Construction” МЧЖ томонидан  лойиҳа белгиланган муддатда тақдим этилмагани учун  “ZHONG WANG Construction” МЧЖ (СТИР: 311623792) таклифи рад этилди', 1, '2025-07-28 11:30:35', '2025-07-28 11:30:35'),
(487, 'App\\Models\\Project', 2, 'status', '2_step', 'archive', 1, '2025-07-28 11:30:35', '2025-07-28 11:30:35'),
(488, 'App\\Models\\Project', 2, 'updated_at', '2025-02-17 15:21:22', '2025-07-28 16:30:35', 1, '2025-07-28 11:30:35', '2025-07-28 11:30:35'),
(489, 'App\\Models\\Project', 10, 'comment', 'not_exists', 'Яшнобод тумани “Илтифот-3” МФЙ (2,51 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича “Mega House Stroy Lyuks” МЧЖ томонидан  лойиҳа белгиланган муддатда тақдим этилмагани учун  “Mega House Stroy Lyuks” МЧЖ (СТИР: 306286043) таклифи рад этилди', 1, '2025-07-28 11:31:08', '2025-07-28 11:31:08'),
(490, 'App\\Models\\Project', 10, 'status', '2_step', 'archive', 1, '2025-07-28 11:31:08', '2025-07-28 11:31:08'),
(491, 'App\\Models\\Project', 10, 'updated_at', '2025-03-12 16:47:29', '2025-07-28 16:31:08', 1, '2025-07-28 11:31:08', '2025-07-28 11:31:08'),
(492, 'App\\Models\\Project', 15, 'geolocation', 'not_exists', 'bekzodaka (botraka) renovation', 1, '2025-07-28 11:34:44', '2025-07-28 11:34:44'),
(493, 'App\\Models\\Project', 15, 'comment', 'not_exists', 'Яккасарой тумани “Тўқимачи-1” МФЙ (0,25 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича “World Max Trade” МЧЖ, \"Sharq\"МЧЖ лар томонидан  биргаликда  белгиланган муддатда лойиҳа тақдим этилмагани учун  “World Max Trade” МЧЖ (СТИР: 306076344), \"Sharq\"МЧЖ лар   таклифи рад этилди', 1, '2025-07-28 11:34:44', '2025-07-28 11:34:44'),
(494, 'App\\Models\\Project', 15, 'status', '2_step', 'archive', 1, '2025-07-28 11:34:44', '2025-07-28 11:34:44'),
(495, 'App\\Models\\Project', 15, 'updated_at', '2024-12-11 23:21:54', '2025-07-28 16:34:44', 1, '2025-07-28 11:34:44', '2025-07-28 11:34:44'),
(496, 'App\\Models\\Project', 10, 'geolocation', 'not_exists', 'bekzodaka (botraka) renovation', 1, '2025-07-28 11:34:57', '2025-07-28 11:34:57'),
(497, 'App\\Models\\Project', 10, 'updated_at', '2025-07-28 16:31:08', '2025-07-28 16:34:57', 1, '2025-07-28 11:34:57', '2025-07-28 11:34:57'),
(498, 'App\\Models\\Project', 2, 'geolocation', 'not_exists', 'bekzodaka (botraka) renovation', 1, '2025-07-28 11:35:11', '2025-07-28 11:35:11'),
(499, 'App\\Models\\Project', 2, 'updated_at', '2025-07-28 16:30:35', '2025-07-28 16:35:11', 1, '2025-07-28 11:35:11', '2025-07-28 11:35:11'),
(500, 'App\\Models\\Project', 34, 'geolocation', 'not_exists', 'bekzodaka (botraka) renovation', 1, '2025-07-28 11:58:17', '2025-07-28 11:58:17'),
(501, 'App\\Models\\Project', 34, 'comment', 'not_exists', 'Яккасарой  тумани “Конститутсия” МФЙ (0,3 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича “KNK EUROINVEST” МЧЖ томонидан  лойиҳа белгиланган муддатда тақдим этилмагани учун  “KNK EUROINVEST” МЧЖ (СТИР: 309802094) таклифи рад этилди', 1, '2025-07-28 11:58:17', '2025-07-28 11:58:17'),
(502, 'App\\Models\\Project', 34, 'status', '2_step', 'archive', 1, '2025-07-28 11:58:17', '2025-07-28 11:58:17'),
(503, 'App\\Models\\Project', 34, 'updated_at', '2025-03-05 16:14:42', '2025-07-28 16:58:17', 1, '2025-07-28 11:58:17', '2025-07-28 11:58:17'),
(504, 'App\\Models\\Project', 6, 'geolocation', 'not_exists', 'bekzodaka (botraka) renovation', 1, '2025-07-28 11:58:45', '2025-07-28 11:58:45'),
(505, 'App\\Models\\Project', 6, 'comment', 'not_exists', 'Шайхонтоҳур  тумани “Тахтапул” МФЙ (1,0 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича “Build Max” МЧЖ томонидан  лойиҳа белгиланган муддатда тақдим этилмагани учун  “Build Max” МЧЖ (СТИР: 303500371) таклифи рад этилди', 1, '2025-07-28 11:58:45', '2025-07-28 11:58:45'),
(506, 'App\\Models\\Project', 6, 'status', '2_step', 'archive', 1, '2025-07-28 11:58:45', '2025-07-28 11:58:45'),
(507, 'App\\Models\\Project', 6, 'updated_at', '2025-02-13 12:24:12', '2025-07-28 16:58:45', 1, '2025-07-28 11:58:45', '2025-07-28 11:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_05_183451_create_permission_tables', 1),
(5, '2021_06_10_115905_create_api_users_table', 1),
(6, '2021_06_30_131020_create_tokens_table', 1),
(7, '2024_03_29_214017_create_regions_table', 1),
(8, '2024_03_29_214018_create_districts_table', 1),
(9, '2024_03_29_214019_create_streets_table', 1),
(10, '2024_06_20_175028_create_messages_table', 1),
(11, '2024_07_18_270126_create_orders_table', 1),
(12, '2024_08_01_203912_create_products_table', 1),
(13, '2024_08_12_161259_create_histories_table', 1),
(14, '2024_12_08_224656_create_news_table', 1),
(15, '2024_12_09_183149_create_categories_table', 1),
(16, '2024_12_09_183154_create_projects_table', 1),
(17, '2024_12_09_183158_create_project_stages_table', 1),
(18, '2024_12_09_183201_create_project_documents_table', 1),
(19, '2024_12_12_161102_add_location_columns_to_projects_table_name', 2),
(20, '2025_12_11_191500_create_page_views_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 3),
(6, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 2),
(6, 'App\\Models\\User', 3),
(7, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 2),
(7, 'App\\Models\\User', 3),
(8, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 2),
(8, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(4, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `content`, `link`, `published_at`, `created_at`, `updated_at`) VALUES
(1, '«TASHKENT INVEST» во главе стратегии городского развития', 'https://static.tildacdn.com/tild3065-6139-4836-b865-376162366533/__2024-05-15__23425A.png', 'В свете стратегических планов Президента Узбекистана Шавката Мирзиёева по социально-экономическому развитию столицы, Ташкент принял решение вернуться в рейтинги международного агентства Fitch и войти к 2030 году в топ 50 городов мира для комфортного проживания. Этот шаг становится важным элементом стратегии, направленной на улучшение позиций города не только в индексах Fitch, но и в других мировых оценочных рейтингах.\n\n                        На этом фоне решение о создании в мае 2023 года компании АО «Tashkent Invest Company» при учредительстве столичного хокимията выглядит весьма смелым и неординарным. Цель компании — стать ключевым инструментом для привлечения инвестиций и реализации стратегических реформ в городском хозяйстве. Партнёрство с международными и внутренними инвесторами, осуществление проектов в области экологии, градостроения и цифровизации — вот лишь несколько направлений работы «Tashkent Invest».\n\n                        Подробнее о том, как столица готовится стать центром экономического и городского развития, читайте в материале редакции The Mag.\n\n                        В 2023 году с запуском компании «Tashkent Invest» Ташкент вступил в новую фазу развития. Такое решение было принято Указом Президента Республики Узбекистан от 26 июля о развитии Ташкента до 2030 года. Этот шаг призван стать частью амбициозной стратегии, направленной на создание сбалансированной и процветающей городской среды, в которой жители и гости столицы смогут наслаждаться современными технологиями и высоким качеством жизни.\n\n\n                        К 2030 году Ташкент, согласно планам, должен войти в топ 50 наиболее удобных для проживания городов по рейтингу Economist Intelligence Unit (сейчас он на 157-м месте), объём ВВП предполагается довести до 500 трлн сумов (с 178,9 трлн сумов). Планируются проекты в сфере промышленности и услуг на сумму 40 млрд долларов, увеличение объёма экспорта отраслей промышленности, услуг и туризма до 7,5 млрд сумов, расширение и полная модернизация инженерно-коммуникационных сетей.', 'https://toshkentinvest.uz/tpost/hy1cya0s11-tashkent-invest-vo-glave-strategii-gorod', '2024-12-11 18:00:32', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(2, 'Ташкент в топ-50 городов мира', 'https://static.tildacdn.com/tild3034-3663-4534-b032-356432373931/Tashkent-City_name_s.jpg', 'Мы поговорили со специалистами из «Компания Ташкент Инвест», которые собираются сделать столицу Узбекистана одним из самых удобных для проживания городов мира, заняв соответствующие позиции в рейтинге Economist Intelligence Unit.\n\n            Чтобы войти в лучшие 50 городов мира, эксперты «Компания Ташкент Инвест» займутся привлечением внешних инвестиций и повышением туристической привлекательности, цифровизацией столицы, «нормализацией» базаров, благоустройством набережных.\n\n            Изменения будут касаться также общественного транспорта, озеленения территорий, создания новых сити-парков, реорганизации каналов, обновления дорожного покрытия и многого другого: к 2030 году Ташкент должен стать настоящим «умным городом».\n\n            Читайте в нашем материале, как столь масштабный план планируют осуществить уже совсем скоро, и что для этого понадобится.', 'https://toshkentinvest.uz/tpost/552dltdp01-tashkent-v-top-50-gorodov-mira', '2024-12-09 18:00:32', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(3, 'Депутаты кенгаша Ташкента одобрили выделение 1 трлн сумов на формирование уставного капитала', 'https://static.tildacdn.com/tild3030-3035-4561-b935-346537663037/162914_62206f66143f5.jpg', 'Кенгаш народных депутатов Ташкента на заседании 12 февраля одобрил выделение 1 трлн сумов на формирование уставного капитала государственной компании «Ташкент инвест», которая должна стать «мостом» между хокимиятом столицы и бизнесом.\n\n            1,18 млрд сумов решено направить на покупку запчастей для транспорта Специализированного управления по эксплуатации, содержанию и ремонту городских центральных улиц.\n\n            Ещё 151,79 млн сумов выделяется Главному управлению благоустройства для ремонта стены вокруг отдела по использованию транспортных средств в махалле «Олтинводий» в Сергелийском районе.\n\n            Напомним, АО «Ташкент инвест» было создано указом президента в конце июля прошлого года при учредительстве хокимията. Её уставной капитал должен был поэтапно составить 1 трлн сумов за счёт дополнительных источников городского бюджета на основании решений кенгаша.\n\n            За направление средств на проекты и другие цели, а также привлечение кредитов банков и международных финансовых институтов будет отвечать наблюдательный совет компании.\n\n            Основными направлениями работы «Ташкент инвест» определены:\n\n            анализ состояния имущества городского и районных хокимиятов, а также их предприятий и учреждений (муниципальное имущество), выявление имеющихся ресурсов и возможностей, разработка предложений по их эффективному использованию;\n            управление муниципальными активами, реализация проектов государственно-частного партнёрства на их основе в качестве государственного партнёра и их сдача в аренду и управление предпринимателям, мониторинг и оценка их эффективности;\n            повышение инвестиционной привлекательности объектов муниципальной собственности, реализация инвестпроектов на их основе с инвесторами;\n            участие в финансировании перспективных проектов предпринимателей, связанных с развитием инфраструктуры Ташкента, исходя из их финансовой привлекательности и эффективности;\n            организация разработки программ развития и реновации отдельных районов Ташкента, мастер-плана и проектной документации объектов, запланированных к строительству и другие.', 'https://toshkentinvest.uz/tpost/isj0glos31-deputati-kengasha-tashkenta-odobrili-vid', '2024-12-09 18:00:32', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(4, 'Создан Фонд развития Ташкента', 'https://static.tildacdn.com/tild3638-6139-4133-a662-306137326333/congress_hall.jpg', 'Компания также будет управлять Фондом развития инфраструктуры предпринимательства при хокимияте, который переименовывается в Фонд развития Ташкента. Его цели — «финансирование инфаструктурных проектов и оперативное решение неотложных вопросов в коммунальной и иных сферах повседневной жизни населения».\n\n            Источниками финансирования фонда станут:\n\n            доходы от проектов, финансируемых фондом, в том числе выручка от продажи созданных активов «Ташкент инвест»;\n            доходы от проектов ГЧП, в которых компания хокимията участвовала в качестве государственного партнёра;\n            70% средств, полученных от приватизации земельных участков несельскохозяйственного назначения в Ташкенте и реализации права аренды участков через аукцион, за вычетом расходов, определяемых правительством, а также часть, которая направляется в бюджет района, на территории которой расположена земля. Исключение — специальные экономические зоны, малые, молодёжные, промышленные и деловые зоны и территории business city;\n            50% от суммы штрафов за нарушения Правил дорожного движения, зафиксированные средствами фото- и видеофиксации в Ташкенте, которые перечисляются в местный бюджет города;\n            часть специальной надбавки, установленной к тарифам на услуги питьевого водоснабжения и канализации;\n            20% от установленной законодательством платы за размещение объектов наружной рекламы и информации в Ташкенте;\n            100% платы за разработку архитектурно-планировочного задания на проектирование строительства или реконструкции градостроительного объекта для покрытия части затрат на создание инженерно-коммуникационных сетей и транспортной инфраструктуры в столице;\n            доходы от размещения денег в банках;\n            отчисления из части перевыполненного плана по доходам городского бюджета;\n            спонсорские пожертвования физических и юридических лиц, гранты международных финансовых институтов и иностранных организаций.\n\n            Деньги фонда будут тратиться на реализацию проектов ГЧП, перспективных проектов, связанных с развитием инфраструктуры Ташкента, программы развития и реновации отдельных районов столицы, разработку мастер-плана и проектной документации строящихся объектов, строительство, реконструкцию, капитальный ремонт и оснащение объектов экономики и социальной сферы, благоустройство и озеленение территорий.\n\n            Фонд также будет направлять средства на создание инфраструктуры (вода, канализация, электричество, газ и автодороги) в строящихся массивах «Новый Узбекистан», массивах, включённых в госпрограммы жилищного строительства, а также в специальных экономических зонах и малых промзонах (питьевая вода и канализация, электроснабжение, сети природного газа и автомобильные дороги).\n\n            Деньги также будут выделятьс на обеспечение инженерно-коммуникационных сетей для объектов стоимостью более 200 млрд сумов, где доля собственных средств инвестора составляет не менее 25%. В этот список входят и проекты, включённые в инвестиционные программы, а также проекты придорожной инфраструктуры вдоль автомобильных дорог международного и республиканского значения.', 'https://toshkentinvest.uz/tpost/s22u9ic521-sozdan-fond-razvitiya-tashkenta', '2024-12-09 18:00:32', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(5, 'Специальная госкомпания станет «мостом» между хокимиятом Ташкента и бизнесом', 'https://static.tildacdn.com/tild6464-3337-4864-b164-643761313036/upscaled_image.png', 'При учредительстве столичного хокимията создаётся специальная компания в форме акционерного общества «Ташкент инвест», которая должна служить «мостом» между администрацией города и предпринимателями. Об этом говорится в указе президента Узбекистана от 26 июля о развитии Ташкента до 2030 года.\n\n            Уставной капитал компании поэтапно составит 1 трлн сумов за счёт дополнительных источников городского бюджета на основании решений кенгаша.\n\n            За направление средств на проекты и другие цели, а также привлечение кредитов банков и международных финансовых институтов будет отвечать наблюдательный совет компании.\n\n            Основными направлениями работы «Ташкент инвест» определены:\n\n            анализ состояния имущества Ташкентского городского и районных хокимиятов, а также их предприятий и учреждений (муниципальное имущество), выявление имеющихся ресурсов и возможностей, разработка предложений по их эффективному использованию;\n            управление муниципальными активами, реализация проектов государственно-частного партнёрства на их основе в качестве государственного партнёра и их сдача в аренду и управление предпринимателям, мониторинг и оценка их эффективности;\n            повышение инвестиционной привлекательности объектов муниципальной собственности, реализация инвестпроектов на их основе с инвесторами.\n            участие в финансировании перспективных проектов предпринимателей, связанных с развитием инфраструктуры Ташкента, исходя из их финансовой привлекательности и эффективности.\n            организация разработки программ развития и реновации отдельных районов Ташкента, мастер-плана и проектной документации объектов, запланированных к строительству.\n            анализ деятельности предприятий госсектора Ташкента, разработка предложений по трансформации их деятельности.\n            координация работ по строительству и реконструкции в Ташкенте и процессов подключения к инфраструктурным сетям.\n\n            Документом утверждены механизмы реализации проектов между «Ташкент инвест» и предпринимателями на базе земельных участков.\n\n            Предусмотрено, что Кабинет министров сдаёт компании земли в аренду на срок не более 49 лет. «Ташкент инвест» оценивает стоимость этих участков через оценочные организации.\n\n            После оформления мастер-плана инвестиционного проекта, проектных документов и других разрешений земельные участки выставляются на электронный аукцион для реализации на них проектов совместно с «Ташкент инвест» по её заказу.\n\n            Цена, сформировавшаяся по итогам аукциона, станет вкладом победителя аукциона в уставный капитал хозяйственного общества, которое должно быть создано в течение года. При этом доля компании хокимията в капитале создаваемого хозобщества будет составлять до 50%. Как она будет сформирована, не уточняется.\n\n            В учредительных документах созданного предприятия доля «Ташкент инвест» может быть отчуждена путём продажи или получения части построенного объекта или его стоимости. При этом стоимость доли не должна быть меньше стоимости госактива, сформированного на аукционе.\n\n            Компания «Ташкент инвест» на базе предоставляемых ей земельных участков для реализации совместных инвестпроектов сможет создавать простые товарищества с победителями аукционов, без образования хозяйственного общества.', 'https://toshkentinvest.uz/tpost/uzpea9heo1-spetsialnaya-goskompaniya-stanet-mostom', '2024-12-09 18:00:32', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(6, '“SUMEC International Technology & Trade Co., Ltd” компанияси Бошқарув раиси Ху Хайцзин билан учрашув ўтказилди.', '[\"\\/storage\\/news\\/images\\/1754394762_nN0aeXFwlf.png\",\"\\/storage\\/news\\/images\\/1754394762_FNnuL5L3tE.png\",\"\\/storage\\/news\\/images\\/1754394762_YAMStsAdJg.png\"]', 'Учрашув давомида савдо-иқтисодий шерикликни ривожлантириш ҳамда махсус инвестицион платформа яратиш орқали 1 млн. АҚШ долл.дан кам бўлмаган миқдордаги инвестиция лойиҳаларини молиялаштириш, тижорат биноларини ва инфратузилма объектларини қуриш, компания технологияларини жалб қилган ҳолда саноат зоналарини ривожлантириш, энергетика ва транспорт инфратузилмасини модернизация қилиш йўналишида қўшма лойиҳаларни амалга ошириш, шунингдек, 2025 йилнинг IV чорагида “Ўзбекистон-Хитой қўшма бизнес-форуми”ни ўтказиш масалалари муҳокама қилинди. Якунда Тошкент Инвест Компанияси АЖ ва “SUMEC International Technology & Trade Co., Ltd” компанияси билан умумий қиймати 100 млн. АҚШ долл.лик “Янги Авлод Махсус саноат зонаси”нинг инвестиция салоҳиятини Хитой компаниялари ўртасида тарғиб қилиш, шунингдек, Тошкент шаҳридаги Кичик саноат зоналари ҳудудида амалга оширилаётган инвестиция лойиҳаларини қўллаб-қувватлаш учун молиявий ресурсларни жалб қилиш бўйича келишув имзоланди.\r\n     Келгусида, икки давлат ўртасида савдони ривожлантириш мақсадида  давлат ва хусусий секторнинг биргаликдаги лойиҳаларини ривожлантириш учун ўзаро узвий ҳамкорлик қилишга келишиб олинди.', NULL, '2025-08-05 11:32:00', '2025-08-05 11:33:03', '2025-08-05 11:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` enum('created','updated','deleted') DEFAULT NULL,
  `action_timestamp` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `unique_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE `page_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `page_url` varchar(500) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `referer` varchar(500) DEFAULT NULL,
  `visited_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `page_views`
--

INSERT INTO `page_views` (`id`, `ip_address`, `page_url`, `page_name`, `country`, `country_code`, `city`, `region`, `latitude`, `longitude`, `user_agent`, `referer`, `visited_at`, `created_at`, `updated_at`) VALUES
(1, '5.133.120.24', 'https://toshkentinvest.uz', '/', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-11 14:51:22', '2025-12-11 14:51:22', '2025-12-11 14:51:22'),
(2, '5.133.120.24', 'https://toshkentinvest.uz/open_tender_notice', 'open_tender_notice', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://toshkentinvest.uz/', '2025-12-11 14:51:25', '2025-12-11 14:51:25', '2025-12-11 14:51:25'),
(3, '5.133.120.24', 'https://toshkentinvest.uz/open_tender_notice', 'open_tender_notice', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://toshkentinvest.uz/', '2025-12-11 14:51:32', '2025-12-11 14:51:32', '2025-12-11 14:51:32'),
(4, '5.133.120.24', 'https://toshkentinvest.uz/open_tender_notice', 'open_tender_notice', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', NULL, '2025-12-11 14:53:00', '2025-12-11 14:53:00', '2025-12-11 14:53:00'),
(5, '5.133.120.24', 'https://toshkentinvest.uz/open_tender_notice', 'open_tender_notice', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://toshkentinvest.uz/', '2025-12-11 14:55:28', '2025-12-11 14:55:28', '2025-12-11 14:55:28'),
(6, '5.133.120.24', 'https://toshkentinvest.uz/open_tender_notice', 'open_tender_notice', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://toshkentinvest.uz/', '2025-12-11 14:55:51', '2025-12-11 14:55:51', '2025-12-11 14:55:51'),
(7, '5.133.120.24', 'https://toshkentinvest.uz', '/', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://toshkentinvest.uz/open_tender_notice', '2025-12-11 14:56:00', '2025-12-11 14:56:00', '2025-12-11 14:56:00'),
(8, '162.120.188.255', 'https://www.toshkentinvest.uz', '/', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2995', '69.2401', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://www.google.com/', '2025-12-11 15:03:08', '2025-12-11 15:03:08', '2025-12-11 15:03:08'),
(9, '162.120.188.255', 'https://toshkentinvest.uz', '/', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2995', '69.2401', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://www.google.com/', '2025-12-11 15:03:11', '2025-12-11 15:03:11', '2025-12-11 15:03:11'),
(10, '84.54.70.101', 'https://www.toshkentinvest.uz/struktura', 'struktura', 'Uzbekistan', 'UZ', 'Juma Shahri', 'Samarqand Region', '39.7161', '66.6642', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://www.toshkentinvest.uz/', '2025-12-11 15:03:21', '2025-12-11 15:03:21', '2025-12-11 15:03:21'),
(11, '84.54.70.101', 'https://www.toshkentinvest.uz/board', 'board', 'Uzbekistan', 'UZ', 'Juma Shahri', 'Samarqand Region', '39.7161', '66.6642', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://www.toshkentinvest.uz/struktura', '2025-12-11 15:05:05', '2025-12-11 15:05:05', '2025-12-11 15:05:05'),
(12, '84.54.70.101', 'https://www.toshkentinvest.uz/board', 'board', 'Uzbekistan', 'UZ', 'Juma Shahri', 'Samarqand Region', '39.7161', '66.6642', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://www.toshkentinvest.uz/struktura', '2025-12-11 15:05:05', '2025-12-11 15:05:05', '2025-12-11 15:05:05'),
(13, '103.151.172.30', 'https://www.toshkentinvest.uz', '/', 'Hong Kong', 'HK', 'Mong Kok', 'Yau Tsim Mong District', '22.316', '114.172', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36 EdgA/141.0.0.0', NULL, '2025-12-11 15:11:24', '2025-12-11 15:11:24', '2025-12-11 15:11:24'),
(14, '103.151.172.30', 'https://www.toshkentinvest.uz/investoram', 'investoram', 'Hong Kong', 'HK', 'Mong Kok', 'Yau Tsim Mong District', '22.316', '114.172', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36 EdgA/141.0.0.0', 'https://www.toshkentinvest.uz/', '2025-12-11 15:12:11', '2025-12-11 15:12:11', '2025-12-11 15:12:11'),
(15, '103.151.172.30', 'https://www.toshkentinvest.uz/investment-project', 'investment-project', 'Hong Kong', 'HK', 'Mong Kok', 'Yau Tsim Mong District', '22.316', '114.172', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36 EdgA/141.0.0.0', 'https://www.toshkentinvest.uz/investoram', '2025-12-11 15:12:34', '2025-12-11 15:12:34', '2025-12-11 15:12:34'),
(16, '98.92.211.115', 'http://toshkentinvest.uz', '/', 'United States', 'US', 'Ashburn', 'Virginia', '39.0438', '-77.4874', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', NULL, '2025-12-11 15:19:16', '2025-12-11 15:19:16', '2025-12-11 15:19:16'),
(17, '5.133.120.24', 'https://toshkentinvest.uz/open_tender_notice', 'open_tender_notice', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', NULL, '2025-12-11 15:32:10', '2025-12-11 15:32:10', '2025-12-11 15:32:10'),
(18, '66.249.74.41', 'https://www.toshkentinvest.uz', '/', 'United States', 'US', 'Oskaloosa', 'Iowa', '41.2946', '-92.6442', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.7390.122 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', NULL, '2025-12-11 15:34:25', '2025-12-11 15:34:25', '2025-12-11 15:34:25'),
(19, '34.21.68.228', 'https://www.toshkentinvest.uz', '/', 'United States', 'US', 'Washington', 'Washington, D.C.', '38.9071', '-77.0368', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 PTST/251202.154650', NULL, '2025-12-11 15:37:15', '2025-12-11 15:37:15', '2025-12-11 15:37:15'),
(20, '34.21.68.228', 'https://www.toshkentinvest.uz', '/', 'United States', 'US', 'Washington', 'Washington, D.C.', '38.9071', '-77.0368', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML like Gecko) Chrome/143.0.0.0 Safari/537.36 PTST/251202.154650', NULL, '2025-12-11 15:37:54', '2025-12-11 15:37:54', '2025-12-11 15:37:54'),
(21, '5.133.120.24', 'https://toshkentinvest.uz/open_tender_notice', 'open_tender_notice', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', NULL, '2025-12-11 15:40:27', '2025-12-11 15:40:27', '2025-12-11 15:40:27'),
(22, '198.244.240.123', 'http://toshkentinvest.uz/key_performance_indicators', 'key_performance_indicators', 'United Kingdom', 'GB', 'London', 'England', '51.5081', '-0.1278', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', NULL, '2025-12-11 15:57:55', '2025-12-11 15:57:55', '2025-12-11 15:57:55'),
(23, '43.153.36.110', 'https://toshkentinvest.uz', '/', 'United States', 'US', 'Santa Clara', 'California', '37.353', '-121.9544', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'http://www.tashkentinvest.com', '2025-12-11 16:00:02', '2025-12-11 16:00:02', '2025-12-11 16:00:02'),
(24, '5.133.120.24', 'https://toshkentinvest.uz/open_tender_notice', 'open_tender_notice', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', NULL, '2025-12-11 16:01:57', '2025-12-11 16:01:57', '2025-12-11 16:01:57'),
(25, '43.130.15.147', 'http://www.toshkentinvest.uz', '/', 'United States', 'US', 'Santa Clara', 'California', '37.353', '-121.9544', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', NULL, '2025-12-11 16:06:17', '2025-12-11 16:06:17', '2025-12-11 16:06:17'),
(26, '66.249.74.40', 'https://www.toshkentinvest.uz/language/uz', 'language/uz', 'United States', 'US', 'Oskaloosa', 'Iowa', '41.2946', '-92.6442', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.7390.122 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', NULL, '2025-12-11 16:23:43', '2025-12-11 16:23:43', '2025-12-11 16:23:43'),
(27, '66.249.74.39', 'https://www.toshkentinvest.uz', '/', 'United States', 'US', 'Oskaloosa', 'Iowa', '41.2946', '-92.6442', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.7390.122 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', NULL, '2025-12-11 16:23:44', '2025-12-11 16:23:44', '2025-12-11 16:23:44'),
(28, '58.253.40.78', 'https://toshkentinvest.uz', '/', 'China', 'CN', 'Guangzhou', 'Guangdong', '23.1181', '113.2539', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.6478.114 Safari/537.36', 'http://tashkentinvest.com/', '2025-12-11 16:24:41', '2025-12-11 16:24:41', '2025-12-11 16:24:41'),
(29, '43.153.48.240', 'https://toshkentinvest.uz/open_tender_notice', 'open_tender_notice', 'United States', 'US', 'Santa Clara', 'California', '37.353', '-121.9544', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', NULL, '2025-12-11 16:25:04', '2025-12-11 16:25:04', '2025-12-11 16:25:04'),
(30, '123.119.248.103', 'https://toshkentinvest.uz', '/', 'China', 'CN', 'Beijing', 'Beijing', '39.911', '116.395', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.6478.114 Safari/537.36', 'http://tashkentinvest.com/', '2025-12-11 16:25:10', '2025-12-11 16:25:10', '2025-12-11 16:25:10'),
(31, '95.108.213.107', 'https://toshkentinvest.uz/supervisory-board', 'supervisory-board', 'Russia', 'RU', 'Moscow', 'Moscow', '55.7342', '37.5859', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', NULL, '2025-12-11 16:29:05', '2025-12-11 16:29:05', '2025-12-11 16:29:05'),
(32, '147.135.213.175', 'https://toshkentinvest.uz/assessment_system', 'assessment_system', 'France', 'FR', 'Roubaix', 'Hauts-de-France', '50.6924', '3.20113', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', NULL, '2025-12-11 16:40:26', '2025-12-11 16:40:26', '2025-12-11 16:40:26'),
(33, '5.133.120.24', 'https://toshkentinvest.uz/open_tender_notice', 'open_tender_notice', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', NULL, '2025-12-11 16:40:43', '2025-12-11 16:40:43', '2025-12-11 16:40:43'),
(34, '5.133.120.24', 'https://toshkentinvest.uz/language/uz', 'language/uz', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://toshkentinvest.uz/open_tender_notice', '2025-12-11 16:42:34', '2025-12-11 16:42:34', '2025-12-11 16:42:34'),
(35, '5.133.120.24', 'https://toshkentinvest.uz/open_tender_notice', 'open_tender_notice', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://toshkentinvest.uz/open_tender_notice', '2025-12-11 16:42:35', '2025-12-11 16:42:35', '2025-12-11 16:42:35'),
(36, '5.133.120.24', 'https://toshkentinvest.uz/language/en', 'language/en', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://toshkentinvest.uz/open_tender_notice', '2025-12-11 16:42:54', '2025-12-11 16:42:54', '2025-12-11 16:42:54'),
(37, '5.133.120.24', 'https://toshkentinvest.uz/open_tender_notice', 'open_tender_notice', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://toshkentinvest.uz/open_tender_notice', '2025-12-11 16:42:54', '2025-12-11 16:42:54', '2025-12-11 16:42:54'),
(38, '5.133.120.24', 'https://toshkentinvest.uz/language/ru', 'language/ru', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://toshkentinvest.uz/open_tender_notice', '2025-12-11 16:43:00', '2025-12-11 16:43:00', '2025-12-11 16:43:00'),
(39, '5.133.120.24', 'https://toshkentinvest.uz/open_tender_notice', 'open_tender_notice', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://toshkentinvest.uz/open_tender_notice', '2025-12-11 16:43:00', '2025-12-11 16:43:00', '2025-12-11 16:43:00'),
(40, '43.155.195.141', 'https://toshkentinvest.uz/assessment_system', 'assessment_system', 'South Korea', 'KR', 'Seoul', 'Seoul', '37.5658', '126.978', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', NULL, '2025-12-11 16:43:41', '2025-12-11 16:43:41', '2025-12-11 16:43:41'),
(41, '5.133.120.24', 'https://toshkentinvest.uz', '/', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://toshkentinvest.uz/open_tender_notice', '2025-12-11 16:44:57', '2025-12-11 16:44:57', '2025-12-11 16:44:57'),
(42, '5.133.120.24', 'https://toshkentinvest.uz/ustav', 'ustav', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://toshkentinvest.uz/', '2025-12-11 16:45:31', '2025-12-11 16:45:31', '2025-12-11 16:45:31'),
(43, '170.106.147.63', 'http://www.toshkentinvest.uz/spisok', 'spisok', 'United States', 'US', 'Santa Clara', 'California', '37.353', '-121.9544', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', NULL, '2025-12-11 16:53:44', '2025-12-11 16:53:44', '2025-12-11 16:53:44'),
(44, '5.133.120.24', 'https://toshkentinvest.uz', '/', 'Uzbekistan', 'UZ', 'Tashkent', 'Tashkent', '41.2615', '69.2177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-11 16:56:24', '2025-12-11 16:56:24', '2025-12-11 16:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `title`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'permission.show', NULL, 'web', '2024-12-11 18:00:30', '2024-12-11 18:00:30'),
(2, 'permission.edit', NULL, 'web', '2024-12-11 18:00:30', '2024-12-11 18:00:30'),
(3, 'permission.add', NULL, 'web', '2024-12-11 18:00:30', '2024-12-11 18:00:30'),
(4, 'permission.delete', NULL, 'web', '2024-12-11 18:00:30', '2024-12-11 18:00:30'),
(5, 'roles.show', NULL, 'web', '2024-12-11 18:00:30', '2024-12-11 18:00:30'),
(6, 'roles.edit', NULL, 'web', '2024-12-11 18:00:30', '2024-12-11 18:00:30'),
(7, 'roles.add', NULL, 'web', '2024-12-11 18:00:30', '2024-12-11 18:00:30'),
(8, 'roles.delete', NULL, 'web', '2024-12-11 18:00:30', '2024-12-11 18:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` enum('created','updated','deleted') DEFAULT NULL,
  `action_timestamp` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tuman_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `baholash_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invest_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `yer_uchastkasi_raqami` varchar(255) DEFAULT NULL,
  `tuman` varchar(255) DEFAULT NULL,
  `mahalla` varchar(255) DEFAULT NULL,
  `manzil` varchar(255) DEFAULT NULL,
  `maydoni` decimal(8,4) DEFAULT NULL,
  `mulk_huquqi` varchar(255) DEFAULT NULL,
  `ixtisosligi` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `tuman_date` date DEFAULT NULL,
  `does_he_putted_tuman_info` tinyint(1) NOT NULL DEFAULT 0,
  `tahmini_baholangan_qiymat` decimal(15,2) DEFAULT NULL,
  `narx_sotix_som` decimal(15,2) DEFAULT NULL,
  `narx_sotix_usd` decimal(15,2) DEFAULT NULL,
  `baholash_date` date DEFAULT NULL,
  `does_he_putted_baholash_info` tinyint(1) NOT NULL DEFAULT 0,
  `taklif_sotix_usd` decimal(15,2) DEFAULT NULL,
  `taklif_date` date DEFAULT NULL,
  `does_he_putted_taklif_info` tinyint(1) NOT NULL DEFAULT 0,
  `tasdiqlangan_narx` decimal(15,2) DEFAULT NULL,
  `tasdiqlangan_date` date DEFAULT NULL,
  `does_he_putted_tasdiqlangan_info` tinyint(1) NOT NULL DEFAULT 0,
  `shartnoma_raqami` varchar(255) DEFAULT NULL,
  `shartnoma_sanasi` date DEFAULT NULL,
  `atsenka_elektron` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unique_number` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `mahalla` varchar(255) DEFAULT NULL,
  `land` decimal(10,2) DEFAULT NULL,
  `investor_initiative_date` date DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `hokim_resolution_no` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `geolocation` text DEFAULT NULL,
  `geo_image` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `elon_fayl` varchar(255) DEFAULT NULL,
  `pratakol_fayl` varchar(255) DEFAULT NULL,
  `qoshimcha_fayl` varchar(255) DEFAULT NULL,
  `implementation_period` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1_step',
  `srok_realizatsi` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `second_stage_start_date` date DEFAULT NULL,
  `second_stage_end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `unique_number`, `district`, `street`, `mahalla`, `land`, `investor_initiative_date`, `company_name`, `contact_person`, `hokim_resolution_no`, `latitude`, `longitude`, `geolocation`, `geo_image`, `comment`, `elon_fayl`, `pratakol_fayl`, `qoshimcha_fayl`, `implementation_period`, `status`, `srok_realizatsi`, `start_date`, `end_date`, `second_stage_start_date`, `second_stage_end_date`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Шайхантахур', NULL, 'Лабзак', 1.46, NULL, NULL, NULL, NULL, NULL, NULL, 'bekzodaka (botraka) renovation', NULL, '2025 йил 25 март  куни бўлиб ўтган Шайхонтоҳур тумани “Лабзак” МФЙ (1,46 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида “FOOTBALL HOUSE” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “FOOTBALL HOUSE” МЧЖ (СТИР: 310655270) тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 'project_images/pratakol/WdiXNRG7EHM33VhFsJ3UDYViD7RJfTMSs3x6BgKs.pdf', 'project_images/3yqEyOEH7alfHllrkM3W2ossLzAsnKstJyndMsWL.pdf', NULL, NULL, 'completed', 36, '2024-12-06', '2024-12-16', '2024-12-23', '2025-01-15', '2024-12-11 18:00:32', '2025-07-28 09:58:37'),
(2, NULL, NULL, 'Юнусабад', NULL, 'Буюк Турон', 2.43, NULL, NULL, NULL, NULL, NULL, NULL, 'bekzodaka (botraka) renovation', NULL, 'Юнусобод тумани “Буюк Турон” МФЙ (2,43 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича “ZHONG WANG Construction” МЧЖ томонидан  лойиҳа белгиланган муддатда тақдим этилмагани учун  “ZHONG WANG Construction” МЧЖ (СТИР: 311623792) таклифи рад этилди', 'project_images/pratakol/FmOTCvJVKPItFlaMHRZxeYK4wDQmPQk5qsx1BkAG.pdf', 'project_images/qwNczJq4PR8mVsdq7neho4laDMidgg2hUQ6xPk4G.pdf', NULL, NULL, 'archive', 36, '2024-12-06', '2024-12-16', '2024-12-23', '2025-03-17', '2024-12-11 18:00:32', '2025-07-28 11:35:11'),
(3, NULL, NULL, 'Юнусабад', NULL, 'Бўзсув', 4.20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 25 март куни бўлиб ўтган Юнусобод тумани “Бўзсув” МФЙ (4,20 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “EZDAR RENOVATION” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.  Ушбу танловда “EZDAR RENOVATION” МЧЖ (СТИР: 311675325) тақдим этган лойиҳа Комиссия аъзолари томонидан рад этилди.', 'project_images/pratakol/zNtmClpFsBpdk6XUMNWUS8t4EImAkpyvUr9yu5LB.pdf', 'project_images/uz3eRQndTEmywv7mToLM6TO2tJ8uXxkqgtLxOtF1.pdf', NULL, NULL, 'archive', 48, '2024-12-06', '2024-12-16', '2024-12-23', '2025-03-15', '2024-12-11 18:00:32', '2025-05-16 14:46:52'),
(4, NULL, NULL, 'Мирзо-Улугбек', NULL, 'Буюк Ипак Йўли', 2.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 25 март куни бўлиб ўтган Мирзо Улуғбек тумани “Буюк Ипак Йўли” МФЙ (2,0 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича  якуний босқичда  “KAPITAL START” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди ҳамда маъқулланди.', 'project_images/pratakol/dICwrKgvK74hLQ7v7BCy0R4aHN9AyotwgTMpgHSX.pdf', 'project_images/SBcZKyj859jYVEWUr7aPGvbhl8T6qfi0jIlaUlQ4.pdf', NULL, NULL, 'completed', 36, '2024-12-06', '2024-12-16', '2024-12-23', '2025-01-15', '2024-12-11 18:00:32', '2025-07-15 13:20:43'),
(5, NULL, NULL, 'Мирзо-Улугбек', NULL, 'Бешкапа', 3.70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_images/pratakol/QO36EbofoQbpRR0UrqsBtWIPzuiuMrm0O5ukz3qD.pdf', 'project_images/6mpjtFeGpKizXssb8SsiflQSD0uHokX6VkOX8uTf.pdf', NULL, NULL, 'archive', 48, '2024-12-06', '2024-12-16', NULL, NULL, '2024-12-11 18:00:32', '2025-02-05 12:29:32'),
(6, NULL, NULL, 'Шайхантахур', NULL, 'Тахтапул', 1.00, NULL, NULL, NULL, NULL, NULL, NULL, 'bekzodaka (botraka) renovation', NULL, 'Шайхонтоҳур  тумани “Тахтапул” МФЙ (1,0 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича “Build Max” МЧЖ томонидан  лойиҳа белгиланган муддатда тақдим этилмагани учун  “Build Max” МЧЖ (СТИР: 303500371) таклифи рад этилди', 'project_images/pratakol/gfQ9ZB0l0aPVepTSS38SQl4HVUbNF4qb8XE4UVY2.pdf', 'project_images/eIUbiEG4a47AuyZ2692JaqDhuIj9EWVPU9b1QiR8.pdf', NULL, NULL, 'archive', 24, '2024-12-06', '2024-12-16', '2024-12-23', '2025-03-03', '2024-12-11 18:00:32', '2025-07-28 11:58:45'),
(7, NULL, NULL, 'Яккасарай', NULL, 'Тўқимачи-2', 0.40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_images/pratakol/H4Vl7tyFWi6sIK6MeaZf9tUYuDft8DjtP27AzPtl.pdf', NULL, NULL, NULL, 'archive', 36, '2024-12-02', '2024-12-10', '2024-12-16', '2025-01-06', '2024-12-11 18:00:32', '2024-12-16 10:23:43'),
(8, NULL, NULL, 'Яшнабад', NULL, 'Илтифот-1', 9.60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_images/pratakol/8kf9Vdaf1AHQPIUGxZuW6YCKmlZ0vQehdU4ts6Og.pdf', NULL, 'project_images/qoshimcha/wJHQM6ZxKwtZzeXonOrQqXHbIgMuNMY2S2Y9SXmc.pdf', NULL, 'archive', 48, '2024-11-20', '2024-11-27', NULL, NULL, '2024-12-11 18:00:32', '2025-02-04 12:42:30'),
(9, NULL, NULL, 'Яшнабад', NULL, 'Илтифот-2', 2.28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 20 март куни бўлиб ўтган Яшнобод тумани Илтифот 2 МФЙ (2,28 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича танлов комиссияси якуний босқичида “MEMOR HAUSE” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди. Ушбу танловда “MEMOR HAUSE” МЧЖ тақдим этган лойиҳа комиссия аъзолари томонидан бир овоздан мақулланди.', 'project_images/pratakol/DCBpVynRERWkuhIT0x9hw04ZW8V8bvahEyV9zw5C.pdf', 'project_images/8lPzpioLb8Z0eHvj5Y6v0NfgLo6wszad0uF6DMx6.pdf', NULL, NULL, 'completed', 36, '2024-11-20', '2024-11-27', '2024-12-04', '2025-01-06', '2024-12-11 18:00:32', '2025-04-30 10:46:27'),
(10, NULL, NULL, 'Яшнабад', NULL, 'Илтифот-3', 2.51, NULL, NULL, NULL, NULL, NULL, NULL, 'bekzodaka (botraka) renovation', NULL, 'Яшнобод тумани “Илтифот-3” МФЙ (2,51 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича “Mega House Stroy Lyuks” МЧЖ томонидан  лойиҳа белгиланган муддатда тақдим этилмагани учун  “Mega House Stroy Lyuks” МЧЖ (СТИР: 306286043) таклифи рад этилди', 'project_images/pratakol/VuOr0p5MaoZu2yehsR26PiOCZcgVOXgEr2gmdKKr.pdf', 'project_images/FbCEpU5DzihFKS3BR6bVyBD43ze6xmlSn1H3QmuM.pdf', NULL, NULL, 'archive', 36, '2024-11-20', '2024-11-27', '2024-12-04', '2025-04-14', '2024-12-11 18:00:32', '2025-07-28 11:34:57'),
(11, NULL, NULL, 'Яшнабад', NULL, 'Олмос', 3.70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_images/pratakol/UN8YC1VfQJzKnhKWN6QPE6u9liDzI3CgcXLjNegO.pdf', NULL, 'project_images/qoshimcha/AqvJLLwMXnkuG3KnK6XtIQ1nc18hhgSRRr11TFPL.pdf', NULL, 'archive', 36, '2024-11-20', '2024-11-27', NULL, NULL, '2024-12-11 18:00:32', '2025-02-04 12:45:58'),
(12, NULL, NULL, 'Яшнабад', NULL, 'Мумтоз', 3.20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 20 март куни бўлиб ўтган Яшнобод тумани Мумтоз МФЙ (3,20 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича танлов комиссияси якуний босқичида “TEMUR INVEST BIZNES” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди. Ушбу танловда “TEMUR INVEST BIZNES” МЧЖ тақдим этган лойиҳа комиссия аъзолари томонидан бир овоздан мақулланди.', 'project_images/pratakol/BaxQs3hjizyP824JZjikfkLTSHtuwHfMTEOmNTsj.pdf', 'project_images/x3N0fxnOZ3E9jFGP3mxWwQAWgaoxMyHhQWFOst16.pdf', NULL, NULL, 'completed', 36, '2024-11-20', '2024-11-27', '2024-12-04', '2025-01-06', '2024-12-11 18:00:32', '2025-04-22 14:05:23'),
(13, NULL, NULL, 'Шайхантахур', NULL, 'Самарқанд Дарвоза-1', 28.89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 25 март куни бўлиб ўтган Шайхонтоҳур тумани “Самарқанд Дарвоза” МФЙ (28,89 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида   “BEST-TALL-HOUSE” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.   Ушбу танловда “BEST-TALL-HOUSE” МЧЖ (СТИР: 310361432)  тақдим этган лойиҳа Комиссия аъзолари томонидан рад этилди.', 'project_images/pratakol/eKyuKuTjGHxbbAQFJgrlbBvXS5GcV8wOMJMaqjNb.pdf', 'project_images/58OvNnf1JimEvVc0kBjDwc8vNViilpZGGrHrRpZI.pdf', NULL, NULL, 'archive', 120, '2024-11-19', '2024-11-26', '2024-12-23', '2025-01-15', '2024-12-11 18:00:32', '2025-05-22 05:22:26'),
(15, NULL, NULL, 'Яккасарай', NULL, 'Тўқимачи-1', 0.25, NULL, NULL, NULL, NULL, NULL, NULL, 'bekzodaka (botraka) renovation', NULL, 'Яккасарой тумани “Тўқимачи-1” МФЙ (0,25 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича “World Max Trade” МЧЖ, \"Sharq\"МЧЖ лар томонидан  биргаликда  белгиланган муддатда лойиҳа тақдим этилмагани учун  “World Max Trade” МЧЖ (СТИР: 306076344), \"Sharq\"МЧЖ лар   таклифи рад этилди', 'project_images/pratakol/0hvkgHf9COn5LRuFZ9Jp4FOHhRrBcdbdOe3JY6Oq.pdf', 'project_images/zikrhtt5C4WlIDMpX6gFAiMbl1rZ9KuwJjO5xpVO.pdf', NULL, NULL, 'archive', 24, '2024-11-12', '2024-11-19', '2024-11-25', '2024-12-16', '2024-12-11 18:00:32', '2025-07-28 11:34:44'),
(16, NULL, NULL, 'Сергелий', NULL, 'Олтинводий', 1.83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 20 март куни бўлиб ўтган Сергели тумани “Олтинводий” МФЙ (1,83 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида   “ZHONG TUO” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.   Ушбу танловда “ZHONG TUO” МЧЖ (СТИР: 310099909)  тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 'project_images/pratakol/yVHpinLiW1R4FzcHiFDiZROGZeClSKC2QH1keXG2.pdf', 'project_images/O9cKbneC0Gu6wRplL8ubtS4UBAg3fEckiPPPB3ZM.pdf', NULL, NULL, 'completed', 36, '2024-10-21', '2024-10-28', '2024-11-11', '2024-12-02', '2024-12-11 18:00:32', '2025-05-22 05:22:59'),
(17, NULL, NULL, 'Яккасарай', NULL, 'Кушбеги', 2.14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024 йил 14 декабрь куни бўлиб ўтган Яккасарой тyмани Кушбеги МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “DIAMOND PLATINUM” МЧЖ, “VODIY DURDONASI 1” МЧЖ ва “BUKHARA STROYCENTR” МЧЖлар томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “VODIY DURDONASI 1” МЧЖ томонидан тақдим этилган таклиф маъқулланди.', 'project_images/pratakol/rdc3vi0ENFNZP8S98jSj1W8D92mLMZw2kvWDRBKC.pdf', 'project_images/HkjkCHczeGUYEZV1DD1fYA62FeN4Mrnwhavzrls9.pdf', NULL, NULL, 'completed', 36, '2024-10-21', '2024-10-28', '2024-11-11', '2024-12-02', '2024-12-11 18:00:32', '2025-02-04 13:02:58'),
(18, NULL, NULL, 'Мирзо-Улугбек', NULL, 'Дархон', 0.40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3. 2025 йил 20 март куни бўлиб ўтган Мирзо Улуғбек тумани Дархон МФЙ (0,40 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича танлов комиссияси якуний босқичида “KATTA DARXON STROY” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди. Ушбу танловда “KATTA DARXON STROY” МЧЖ тақдим этган лойиҳа комиссия аъзолари томонидан бир овоздан рад этилди.', 'project_images/pratakol/Py90u0I1iviym29eAVVfFPdI3NtYDswxP2hXL2WV.pdf', 'project_images/Zk1Z7S6UtqbVb4uhKbkOJOTeVna2rjVWm3gjvgKZ.pdf', NULL, NULL, 'completed', 24, '2024-10-21', '2024-10-28', '2024-11-11', '2024-12-02', '2024-12-11 18:00:32', '2025-04-24 13:58:42'),
(19, NULL, NULL, 'Мирабад', NULL, 'Истиклолобод', 0.79, NULL, NULL, 'O\'tkir aka tamonidan', NULL, NULL, NULL, NULL, NULL, '2024 йил 21 ноябрь куни бўлиб ўтган Миробод тyмани Искиқлолобод МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “DOMPROF-STROY” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “DOMPROF-STROY” МЧЖ томонидан тақдим этилган таклиф рад этилди.', 'project_images/pratakol/IwGFuIUBMPbpY3nve4ZYeLKG1t2c0meDy0O9dKrV.pdf', 'project_images/uj7SbCI3HvC8xOOJAiGr8StwEBG4bvSWPnijEeld.jpg', NULL, NULL, 'archive', 36, '2024-09-25', '2024-10-03', '2024-10-14', '2024-11-04', '2024-12-11 18:00:32', '2025-03-11 05:13:16'),
(20, NULL, NULL, 'Мирзо-Улугбек', NULL, 'Навнихол-1', 7.00, NULL, NULL, 'O\'tkir aka tamonidan', NULL, NULL, NULL, NULL, NULL, '2024 йил 21 ноябрь куни бўлиб ўтган Мирзо Улуғбек тyмани Навнихол 1 МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган таклиф маъқулланди.', 'project_images/pratakol/clcArK7Sf31OyxR7bY2prvvDfkyKWfeCbcNBUKgz.pdf', 'project_images/jm7oVx0C2Z9CACXUlrETWfGDxQhxeMhbyj6TuBNW.pdf', NULL, NULL, 'archive', 48, '2024-09-25', '2024-10-03', '2024-10-14', '2024-11-04', '2024-12-11 18:00:32', '2025-03-11 05:13:39'),
(21, NULL, NULL, 'Мирзо-Улугбек', NULL, 'Навнихол-2', 3.30, NULL, NULL, 'O\'tkir aka tamonidan', NULL, NULL, NULL, NULL, NULL, '2024 йил 21 ноябрь куни бўлиб ўтган Мирзо Улуғбек тyмани Навнихол 2 МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “ MOYA TERRITORIYA GROUP ” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “ MOYA TERRITORIYA GROUP” МЧЖ томонидан тақдим этилган таклиф рад этилди.', 'project_images/pratakol/dAS3knvot2fVYek1A7eXV5EiWqzYAF6aJt3ZzBuo.pdf', 'project_images/NiOHSPxdaXgnypS2lDdlcJuXTvV14ZjOkPQ5bEun.pdf', NULL, NULL, 'archive', 36, '2024-09-25', '2024-10-03', '2024-10-14', '2024-11-04', '2024-12-11 18:00:32', '2025-03-11 05:13:54'),
(22, NULL, NULL, 'Яшнабад', NULL, 'Тарновбоши', 0.31, NULL, NULL, 'O\'tkir aka tamonidan', NULL, NULL, NULL, NULL, NULL, '2024 йил 07 ноябрь куни бўлиб ўтган Яшнабод тyманини Тарнов Боши МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “Poytaxt Eco Stroy” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “Poytaxt Eco Stroy” МЧЖ томонидан тақдим этилган таклифи рад этилди.', 'project_images/pratakol/2Z1c84qFqGsJqdZi9AEFlqHT2qkGmacLUq7rHF7c.pdf', 'project_images/kcnRkDu4o5EbvkxIlu36I7FRqw4x6vjTdS5pG5n7.pdf', NULL, NULL, 'archive', 24, '2024-09-24', '2024-10-02', '2024-10-14', '2024-11-04', '2024-12-11 18:00:32', '2025-03-11 05:14:09'),
(23, NULL, NULL, 'Чиланзар', NULL, 'Шарк', 1.25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024 йил 07 ноябрь куни бўлиб ўтган Чилонзор тyманини Тарнов Шарк МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “Pelican motorss” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “Pelican motorss” МЧЖ томонидан тақдим этилган таклифи рад этилди.', 'project_images/pratakol/6V2Q1ee18U2u00hifQzSm6K8z60bZj4NIMUpmIGY.pdf', 'project_images/g4TOmoNygFC2zFNWMi2eTM0XMquEK1v7QrgH8Ubs.pdf', NULL, NULL, 'archive', 36, '2024-09-25', '2024-10-03', '2024-10-14', '2024-11-04', '2024-12-11 18:00:32', '2025-07-04 13:53:54'),
(24, NULL, NULL, 'Яккасарай', NULL, 'Беларик', 1.20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024 йил 7 ноябрь куни бўлиб ўтган Яккасарой тyманини Белариқ МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “Megapolis Biznes servise” ва “Murad buildings” МЧЖлар томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “Murad buildings” МЧЖ томонидан тақдим этилган таклифи маъқулланди.', 'project_images/pratakol/9LkrYLQOk5hTT3w3JTyrxVSLwtgLxgSxtgbkslmg.pdf', 'project_images/eZd2krFEFP7OHJsUuzAGSuckBkDKmfg2zyFvs2Uf.jpg', NULL, NULL, 'completed', 36, '2024-09-25', '2024-10-03', '2024-10-14', '2024-11-04', '2024-12-11 18:00:32', '2024-12-12 11:46:11'),
(25, NULL, NULL, 'Юнусабад', NULL, 'Қашғар', 0.12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024 йил 21 октябрь куни бўлиб ўтган Юнусобод тyманини Қашғар МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “DREAM VISUALIZATION” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “DREAM VISUALIZATION” МЧЖ томонидан тақдим этилган таклифи маъқулланди.', 'project_images/pratakol/tMHS3ZgGXUZcOWob6PDAx0ofroxJxqcuBXhbOjTR.pdf', 'project_images/qBKe09dzdSb8tpDaV0T3JCnoWpl3caOI7pFNUO0N.pdf', NULL, NULL, 'completed', 24, '2024-09-05', '2024-09-12', '2024-09-17', '2024-10-07', '2024-12-11 18:00:32', '2024-12-12 11:46:40'),
(26, NULL, NULL, 'Чиланзар', NULL, 'Катта Қозиробод', 3.77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024 йил 10 октябрь куни бўлиб ўтган Чилонзор тyманини Катта Қозиробод МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “ISAAR DEVELOPMENT” МЧЖ ва “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда ISSAAR DEVELOPMENT” МЧЖ ва “NUR HAYAT NEW CLASSICS” МЧЖ томонидан тақдим этилган таклифлари маъқулланди.', 'project_images/pratakol/yIgMg2ZDcOdvPzlQ7eqEpf4R1SOncNQHYBZ2m1dj.pdf', 'project_images/Mm2j6JfJKn2kdmiE5E44lsupqPhx68urzB0uWoG1.pdf', NULL, NULL, 'completed', 36, '2024-09-05', '2024-09-12', '2024-09-17', '2024-10-07', '2024-12-11 18:00:32', '2025-07-15 08:18:42'),
(27, NULL, NULL, 'Яккасарай', NULL, 'Хамид Сулаймонов', 0.63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024 йил 21 октябрь куни бўлиб ўтган Яккасарой тyманини Хамид Сулаймонов МФЙ ҳудудида реновация лойиҳасини амалга ошириш бўйича Энг яхши таклифлар асосида ҳамкорни танлаб олиш учун Танловни ўтказиш бўйича танлов комиссияси якуний босқичида “GRIFFIN DEVELOPMENT ADVISORY” МЧЖ томонидан тақдим этилган ҳужжатлар куриб чиқилди. Ушбу танловда “GRIFFIN DEVELOPMENT ADVISORY” МЧЖ томонидан тақдим этилган таклифи маъқулланди.', 'project_images/pratakol/oIo7xmb8iBnQmRNKYnqQQJ4Rb4cDK9kgkckQ6JnJ.pdf', 'project_images/GTVRwjgWwWNngPG9cF8xpqRnpjjp0GLPHl6zBIQr.pdf', NULL, NULL, 'completed', 24, '2024-09-06', '2024-09-13', '2024-09-20', '2024-10-08', '2024-12-11 18:00:32', '2025-03-04 11:40:16'),
(29, NULL, NULL, 'Мирабад', NULL, 'Абдурауф Фитрат', 12.90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'archive', 60, '2024-11-20', '2024-11-27', '2024-12-04', '2024-12-25', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(30, NULL, NULL, 'Шайхантахур', NULL, 'Лабзак', 1.46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'archive', 36, '2024-11-12', '2024-11-19', '2024-11-25', '2024-12-09', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(31, NULL, NULL, 'Яшнабад', NULL, 'Тарновбоши', 0.31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'archive', 24, '2024-09-05', '2024-09-12', '2024-09-17', '2024-10-07', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(32, NULL, NULL, 'Шайхантахур', NULL, 'Лабзак', 2.60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'archive', 36, '2024-09-25', '2024-10-03', '2024-10-10', '2024-10-31', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(33, NULL, NULL, 'Бектемир', NULL, 'Хусайн Байқаро 2', 8.23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 25 март куни бўлиб ўтган Бектемир тумани “Хусайн Байқаро 2” МФЙ (8,23 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “COMFORT CONSTRUCTION” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди.  Ушбу танловда “COMFORT CONSTRUCTION” МЧЖ (СТИР: 304345270) тақдим этган лойиҳа Комиссия аъзолари томонидан мақулланди.', 'project_images/elon/1w2XdS57sGoYd9GLWsvPgmaccl6wzPmuZQP5dKQh.pdf', 'project_images/rOEsV6Q3HRdnMRUPMSpN6PSMRnTFfjN2U90hrM0U.pdf', NULL, NULL, 'completed', NULL, '2024-12-11', '2024-12-18', '2025-01-06', '2025-01-27', '2024-12-11 19:22:10', '2025-05-07 12:43:10'),
(34, NULL, NULL, 'Яккасарай', NULL, 'Конституция', 0.30, NULL, NULL, NULL, NULL, NULL, NULL, 'bekzodaka (botraka) renovation', NULL, 'Яккасарой  тумани “Конститутсия” МФЙ (0,3 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича “KNK EUROINVEST” МЧЖ томонидан  лойиҳа белгиланган муддатда тақдим этилмагани учун  “KNK EUROINVEST” МЧЖ (СТИР: 309802094) таклифи рад этилди', 'project_images/elon/Tw6SAaLiXc6LatNrBZcz6lLeAE9vaa9E4frOyVCq.pdf', 'project_images/pratakol_fayl/aTOTD4yLmasq6Z70NbxISR0oiQFfmIGIik0K5s5f.pdf', NULL, NULL, 'archive', NULL, '2024-12-11', '2024-12-18', '2025-01-06', '2025-01-27', '2024-12-11 19:23:52', '2025-07-28 11:58:17'),
(35, NULL, NULL, 'Яккасарай', NULL, 'Абдулла Каххор', 0.32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 20 март куни бўлиб ўтган Яккасарой тумани “Абдулла Қаҳҳор” МФЙ (0,32 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “SALAR CAPITAL RENTING” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.  Ушбу танловда “SALAR CAPITAL RENTING” МЧЖ (СТИР: 311699872) тақдим этган лойиҳа Комиссия аъзолари томонидан мақулланди.', 'project_images/pratakol/mPGjHbwIxzFpBPtZP60xfyoSBv94LGGEg5UeNPHY.pdf', 'project_images/xgmf78DWyjnqfeHCNo2x7hjO6hiHOvjiWezWMzKM.pdf', NULL, NULL, 'completed', NULL, '2024-12-11', '2024-12-18', '2025-01-06', '2025-03-03', '2024-12-12 07:14:44', '2025-05-16 17:02:46'),
(36, NULL, NULL, 'Яккасарaй', NULL, 'Юнус Ражабий', 7.30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_images/elon/6zOYbbJvjbGWPZRDFJMzKlG5w8HwZbJw3fbg8OQS.pdf', 'project_images/pratakol_fayl/J2Wkr4yvFuxmsIJhLA4wBlC6IV5n3oO6pbdXYcO0.pdf', NULL, NULL, 'archive', NULL, '2024-12-11', '2024-12-18', NULL, NULL, '2024-12-12 07:18:06', '2025-03-05 11:12:34'),
(37, NULL, NULL, 'Чиланзар', NULL, 'Чилонзор МФЙ', 0.30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_images/elon/vOpK1eLKDf8bDIQI3LUztBbADx0pzrCFMhPCO1jf.pdf', 'project_images/zomuzfrv5Zqt7W7osW7RIztzjY9p9qNAHTwA9cVP.pdf', NULL, NULL, 'archive', NULL, '2024-12-11', '2024-12-18', '2025-01-06', '2025-01-27', '2024-12-12 07:19:57', '2025-02-05 12:10:14'),
(38, NULL, NULL, 'Чиланзар', NULL, 'Наққошлик', 1.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 25 март куни бўлиб ўтган Мирзо Улуғбек тумани “Наққошлик” МФЙ (1,0 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “BEST TALL HOUSE” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди.  Ушбу танловда “BEST TALL HOUSE” МФЙ (СТИР:31036143332) тақдим этган лойиҳа Комиссия аъзолари томонидан мақулланди.', 'project_images/elon/V71Dt7c5ERUqiirJ3iZkTFTXgKRaIPOX0IXyzapv.pdf', 'project_images/VJarfDxg7nFd2nmGjb8VOyFKoLugyvb0JczRArLb.pdf', NULL, NULL, 'completed', NULL, '2024-12-11', '2024-12-18', '2025-01-06', '2025-01-27', '2024-12-12 07:20:55', '2025-05-07 12:43:55'),
(39, NULL, NULL, 'Чиланзар', NULL, 'Лутфий', 1.64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_images/elon/g47U4o5biXiiUf7bkHIbMBOMtMoR1IfBlxVA4weS.pdf', NULL, 'project_images/qoshimcha/zohp4q21LxcvLT7taIi0l3ydjSUvJ1P2GUpaaksn.pdf', NULL, 'archive', NULL, '2024-12-11', '2024-12-18', NULL, NULL, '2024-12-12 07:21:53', '2025-01-28 07:29:31'),
(40, NULL, NULL, 'Чиланзар', NULL, 'Тирсакабод', 2.50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_images/elon/NsIKH58YTqLRzJ9BUpi7oqLZNALIepjGJvC50Q7F.pdf', NULL, 'project_images/qoshimcha/e4elycZmOdZYJ6Vo0qusizg3ie4VhYY9JNKNdbOG.pdf', NULL, 'archive', NULL, '2024-12-11', '2024-12-18', NULL, NULL, '2024-12-12 07:22:58', '2025-01-28 07:29:21'),
(41, NULL, NULL, 'Бектемир', NULL, 'Хусайн Байқаро 1', 2.77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_images/elon/LG7EKiLYftdwxdDf7AEtcc2h9TlMRHEA4zgaC4Nv.pdf', NULL, 'project_images/qoshimcha/b1y2x29AR9grgprmv9q9ZjSkK75MvW27OAYiIL5a.pdf', NULL, 'archive', NULL, '2024-12-11', '2024-12-18', NULL, NULL, '2024-12-12 07:24:48', '2025-01-27 12:45:26'),
(42, NULL, NULL, 'Яккасарай', NULL, 'Тўқимачи-2', 0.40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_images/pratakol/Ilj8cmIZL2JNlrhoZGIbp9nWHDS6gB2NIeEAZ3qq.pdf', NULL, 'project_images/qoshimcha_fayl/b3je1D3tlgKqkA7lv88OmxwLmLtTZ5r6KIswdpoa.pdf', NULL, 'archive', 36, '2024-12-16', '2024-12-23', '2025-01-06', '2025-01-27', '2024-12-16 10:52:48', '2025-02-06 09:49:40'),
(43, NULL, NULL, 'Бектемир', 'Хусайн Байқаро', 'Хусайн Байқаро 1', 2.77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 25 март куни бўлиб ўтган Бектемир тумани “Хусайн Байқаро 1” МФЙ (2,77 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “OLTIN BALIQ” МЧЖ томонидан тақдим этилган хужжатлар кўриб чиқилди. Ушбу танловда “OLTIN BALIQ” МЧЖ (СТИР: 304811633) тақдим этган лойиҳа Комиссия аъзолари  томонидан мақулланди.', 'project_images/elon/ryo6DQYthhNddGPy1fHD9Dap29xe6wV8PeCT6R5q.pdf', 'project_images/pratakol_fayl/ccnHetbf476HU2cPZMG3zJXQFhhLz77FbMD2xrrE.pdf', NULL, NULL, 'completed', NULL, '2025-01-28', '2025-02-04', '2025-02-14', '2025-04-02', '2025-01-27 13:17:48', '2025-05-07 12:42:49'),
(44, NULL, NULL, 'Чиланзар', NULL, 'Тирсакабод', 2.50, NULL, NULL, NULL, NULL, NULL, NULL, 'bekzodaka (botraka) renovation', NULL, '2025 йил 18 апрел  куни бўлиб ўтган Чилонзор тумани “Тирсакобод” МФЙ (2,50 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида “ABDURAXMON-ISHONCH-AGRO-FAYZ” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “ABDURAXMON-ISHONCH-AGRO-FAYZ” МЧЖ (СТИР: 30755404) тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 'project_images/elon/LjC00IiQumypmKKLIn8Pzf29OFY72T3j1E3EPlJY.pdf', 'project_images/pratakol_fayl/xCbRBmLFsTL0j0abYx2NNUFfAPu4wFBaUM6ink2l.pdf', NULL, NULL, 'completed', NULL, '2025-01-28', '2025-02-04', '2025-02-14', '2025-04-07', '2025-01-27 13:19:56', '2025-07-28 09:50:11'),
(45, NULL, NULL, 'Чиланзар', NULL, 'Лутфий', 1.64, NULL, NULL, NULL, NULL, NULL, NULL, 'bekzodaka (botraka) renovation', NULL, '2025 йил 23 май куни бўлиб ўтган Чилонзор тумани “Лутфий” МФЙ (1,64 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида “MIR SKAZOK” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “MIR SKAZOK” МЧЖ (СТИР: 205921775) тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 'project_images/elon/A7hRqICSje2tBFhHMMbZEXHYdk2sGf9MHinxTPAz.pdf', 'project_images/pratakol_fayl/R6DTqB7BFmMa8As7Bov45JRhHxYNf2TezOUcUQKs.pdf', NULL, NULL, 'completed', NULL, '2025-01-28', '2025-02-04', '2025-02-14', '2025-04-02', '2025-01-27 13:20:19', '2025-07-28 09:50:31'),
(46, 1, NULL, 'Мирзо-Улугбек', NULL, 'Навнихол-2', 3.30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 18 апрел куни бўлиб ўтган Мирзо Улуғбек тумани “Навниҳол-2” МФЙ (3,30 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида  “MOYA TERRITORIYA GROUP” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.  Ушбу танловда “MOYA TERRITORIYA GROUP” МЧЖ (СТИР:305482964) тақдим этган лойиҳа Комиссия аъзолари томонидан мақулланди.', 'project_images/elon_fayl/Ps549stUnmbt6ETRTk5yTOSILVcfNQMFpUJQaJ2l.pdf', 'project_images/pratakol_fayl/Oy4JgMPFLDT8v6xhqTAtASoeJ3nKiAXKq9R0tm2Q.pdf', NULL, NULL, 'completed', NULL, '2025-02-11', '2025-02-18', '2025-02-26', '2025-04-14', '2025-02-11 07:29:03', '2025-05-21 07:14:08'),
(47, 1, NULL, 'Яшнабад', NULL, 'Илтифот-1', 9.60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 21 апрел куни бўлиб ўтган Яшнобод тумани “Илтифот-1” МФЙ (9,6 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида   “HAMSA CONSERN” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.   Ушбу танловда “HAMSA CONSERN” МЧЖ (СТИР: 307535404)  тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 'project_images/elon_fayl/ZeOgZYMQUw7cmOqbtfLyBu9jnNwQAbH1lpHHhrPu.pdf', 'project_images/pratakol_fayl/rB6AkK2nVtdscZd17JG85Du7CsxKW75YbqNTMJJP.pdf', NULL, NULL, 'completed', NULL, '2025-02-11', '2025-02-18', '2025-02-26', '2025-04-14', '2025-02-11 12:21:41', '2025-05-22 05:21:53'),
(48, 1, NULL, 'Яккасарай', NULL, 'Шоҳжаҳон', 4.56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 21 апрел куни бўлиб ўтган Яккасарой тумани “Шоҳжаҳон” МФЙ (4,56 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида   “SHENG KE-INTERNATIONAL” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди.   Ушбу танловда “SHENG KE-INTERNATIONAL” МЧЖ (СТИР: 311344887)  тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 'project_images/elon/GfL1vA7CJCyEZ7Zw9m5MwHRii0B8nbUyFWeCtE9j.pdf', 'project_images/pratakol_fayl/B8RuACpl2cQX86wH2jg7HRNxg7alk9uu8ddIVPBP.pdf', NULL, NULL, 'completed', NULL, '2025-02-19', '2025-02-28', '2025-03-06', '2025-04-30', '2025-02-19 09:42:19', '2025-05-22 05:21:15'),
(49, NULL, NULL, 'Чиланзар', NULL, 'Чарҳ Камолон-1', 4.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025 йил 07 август куни бўлиб ўтган Чилонзор тумани “Чарх Камолон-1 ” МФЙ (4 га) ҳудудида реновация лойиҳасини амалга ошириш бўйича энг яхши таклифлар асосида ҳамкорни танлаб олиш учун танловни ўтказиш бўйича Танлов комиссияси якуний босқичида “UNICRAFT” МЧЖ томонидан тақдим этилган ҳужжатлар кўриб чиқилди. Ушбу танловда “UNICRAFT” МЧЖ (СТИР: 307548554) тақдим этган лойиҳа Комиссия аъзолари томонидан маъқулланди.', 'project_images/elon_fayl/NwNzLCWMUhB2vxPvbEOQJz7S3SSNR7Uexq75LSs3.pdf', 'project_images/pratakol_fayl/4PvoWmrDeMZHCl1Mrw5TMXkPG7EoPUUoriuNIpiS.jpg', NULL, NULL, 'completed', NULL, '2025-05-07', '2025-05-14', '2025-05-27', '2025-07-09', '2025-05-07 08:09:30', '2025-08-08 06:40:14'),
(50, NULL, NULL, 'Яшнобод', NULL, 'Амир Темур', 8.90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_images/elon/qqzfAVr9Lfvmbhz1xbY2zh9pKtP8wWeRDKyiqdwU.pdf', 'project_images/pratakol_fayl/PXnWbqlGIkUNOb6ke9CYRlzE7KAnMOrdW136JD5K.jpg', NULL, NULL, '2_step', NULL, '2025-05-22', '2025-05-29', '2025-07-10', '2025-08-21', '2025-05-23 06:12:09', '2025-07-28 09:29:25'),
(51, NULL, NULL, 'Мирзо Улуғбек', NULL, 'Олтинтепа', 8.15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_images/elon/Jbf1hNNREB8iScIzz5306yDdJo3yvxRQ3ho56NbP.pdf', 'project_images/pratakol_fayl/mvZWH1Iy0NTDr4c4LXpLLiwFbyCBW6EqvXAgRqxJ.jpg', NULL, NULL, '2_step', NULL, '2025-05-22', '2025-05-29', '2025-07-10', '2025-08-21', '2025-05-23 06:13:19', '2025-07-28 09:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `project_documents`
--

CREATE TABLE `project_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_stages`
--

CREATE TABLE `project_stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `protocol_signed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_uz` varchar(255) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `static_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name_uz`, `name_ru`, `static_id`, `created_at`, `updated_at`) VALUES
(1, 'Toshkent Shahri', 'Тошкент шаҳри', 1, '2024-12-11 18:00:31', '2024-12-11 18:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', 'Tashkent Invest', '2024-12-11 18:00:30', '2024-12-11 18:00:30'),
(2, 'Baholash', 'web', 'Baholash', '2024-12-11 18:00:30', '2024-12-11 18:00:30'),
(3, 'TumanHokimligi', 'web', 'Tuman Hokimligi', '2024-12-11 18:00:30', '2024-12-11 18:00:30'),
(4, 'InvestXodim', 'web', 'Tashkent Invest Xodim', '2024-12-11 18:00:30', '2024-12-11 18:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `streets`
--

CREATE TABLE `streets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `streets`
--

INSERT INTO `streets` (`id`, `district_id`, `name`, `name_ru`, `type`, `code`, `comment`, `created_at`, `updated_at`) VALUES
(1, 3, '1-Qatortol MFY', '1-Катортол МСГ', 'МСГ', '103-0085', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(2, 3, '1-Katta Chilonzor MFY', '1-Катта Чилонзор МСГ', 'МСГ', '103-0086', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(3, 3, '1-Charx Kamolon MFY', '1-Чарх Камолон МСГ', 'МСГ', '103-0087', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(4, 3, '2-Qatortol MFY', '2-Катортол МСГ', 'МСГ', '103-0088', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(5, 3, '2-Katta Chilonzor MFY', '2-Катта Чилонзор МСГ', 'МСГ', '103-0089', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(6, 3, '2-Charx Kamolon MFY', '2-Чарх Камолон МСГ', 'МСГ', '103-0090', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(7, 3, '3-Katta Chilonzor MFY', '3-Катта Чилонзор МСГ', 'МСГ', '103-0091', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(8, 3, '3-Charx Kamolon MFY', '3-Чарх Камолон МСГ', 'МСГ', '103-0092', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(9, 7, 'Barhayot MFY', 'Barhayot МСГ', 'МСГ', '107-0139', 'Тошкент шахар кенгашининг 20.08.2022 й., VI-69-226-14-0-K/22-сонли карорига асосан узгартирилган, аввалги номи Янгихаёт', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(10, 2, 'Bektemir MFY', 'Bektemir МСГ', 'МСГ', '102-0023', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(11, 8, 'Chinniobod МФЙ', 'Chinniobod МСГ', 'МСГ', '108-0153', 'бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(12, 8, 'Elparvar МФЙ', 'Elparvar МСГ', 'МСГ', '108-0154', 'бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(13, 6, 'Eshonbuloq MFY', 'Eshonbuloq МСГ', 'МСГ', '106-0113', 'бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(14, 6, 'Eski jaloyir MFY', 'Eski jaloyir МСГ', 'МСГ', '106-0106', 'бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(15, 6, 'Farog\'atli МФЙ', 'Farog\'atli МСГ', 'МСГ', '106-0080', 'аввалги номи (Хонобод МСГ), 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(16, 9, 'Geologlar MFY', 'Geologlar МСГ', 'МСГ', '109-0134', 'Қибрай тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(17, 9, 'Gulzorobod MFY', 'Gulzorobod МСГ', 'МСГ', '109-0139', 'Қибрай тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(18, 9, 'Ijodkor MFY', 'Ijodkor МСГ', 'МСГ', '109-0132', 'Қибрай тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(19, 9, 'Iqtidor MFY', 'Iqtidor МСГ', 'МСГ', '109-0137', 'Қибрай тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(20, 6, 'Izzatli MFY', 'Izzatli МСГ', 'МСГ', '106-0112', 'бывш зангиота, бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(21, 9, 'Jasorat MFY', 'Jasorat МСГ', 'МСГ', '109-0146', 'Қибрай тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(22, 1, 'Katta Cho\'ponota MFY', 'Katta Cho\'ponota МСГ', 'МСГ', '101-0131', 'Кайта номланган 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(23, 8, 'Kaykovus МФЙ', 'Kaykovus МСГ', 'МСГ', '108-0155', 'бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(24, 6, 'Kengmakon MFY', 'Kengmakon МСГ', 'МСГ', '106-0107', 'бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(25, 9, 'Ko\'hna mevazor MFY', 'Ko\'hna mevazor МСГ', 'МСГ', '109-0136', 'Қибрай тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(26, 6, 'Ko\'hna qumariq МФЙ', 'Ko\'hna qumariq МСГ', 'МСГ', '106-0109', '29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(27, 2, 'Musaffo MFY', 'Musaffo МСГ', 'МСГ', '102-0040', 'Ўртачирчиқ тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(28, 2, 'Nurli yo\'l MFY', 'Nurli yo\'l МСГ', 'МСГ', '102-0041', 'Ўртачирчиқ тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(29, 4, 'Qalqon МФЙ', 'Qalqon МСГ', 'МСГ', '104-0160', '11.10.2022 й, VI-71-260-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(30, 6, 'Qumariq МФЙ', 'Qumariq МСГ', 'МСГ', '106-0064', '29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(31, 6, 'Qut-baraka MFY', 'Qut-baraka МСГ', 'МСГ', '106-0105', 'бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(32, 6, 'Sadoqat MFY', 'Sadoqat МСГ', 'МСГ', '106-0110', 'бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(33, 9, 'Sarbon MFY', 'Sarbon МСГ', 'МСГ', '109-0138', 'Қибрай тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(34, 2, 'Sohil MFY', 'Sohil МСГ', 'МСГ', '102-0039', 'Ўртачирчиқ тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(35, 6, 'Sultonobod МФЙ', 'Sultonobod МСГ', 'МСГ', '106-0108', 'бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(36, 9, 'Temuriylar MFY', 'Temuriylar МСГ', 'МСГ', '109-0141', 'Қибрай тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(37, 2, 'Ustozlar MFY', 'Ustozlar МСГ', 'МСГ', '102-0037', 'Ўртачирчиқ тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(38, 6, 'Xontepa MFY', 'Xontepa МСГ', 'МСГ', '106-0114', 'бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(39, 2, 'Zabardast MFY', 'Zabardast МСГ', 'МСГ', '102-0038', 'Ўртачирчиқ тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(40, 9, 'Zakovat MFY', 'Zakovat МСГ', 'МСГ', '109-0135', 'Қибрай тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(41, 8, 'Zamondosh МФЙ', 'Zamondosh МСГ', 'МСГ', '108-0152', 'бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(42, 8, 'Zarxal МФЙ', 'Zarxal МСГ', 'МСГ', '108-0156', 'бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(43, 6, 'Ziyolilar MFY', 'Ziyolilar МСГ', 'МСГ', '106-0118', 'бывш зангиота, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(44, 2, 'Abay MFY', 'Абай МСГ', 'МСГ', '102-0022', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(45, 11, 'Abdulla Avloniy MFY', 'Абдулла Авлоний МСГ', 'МСГ', '111-0061', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(46, 5, 'Abdulla Qahhor MFY', 'Абдулла Каххор МСГ', 'МСГ', '105-0028', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(47, 1, 'Abdulla Qodiriy MFY', 'Абдулла Кодирий МСГ', 'МСГ', '101-0085', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(48, 11, 'Abdurauf Fitrat MFY', 'Абдурауф Фитрат МСГ', 'МСГ', '111-0062', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(49, 8, 'Abu Bakr Shoshiy MFY', 'Абу Бакр Шоший МСГ', 'МСГ', '108-0113', 'аввалги номи Исмоил Шоший МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(50, 9, 'Avayxon MFY', 'Авайхон МСГ', 'МСГ', '109-0076', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(51, 4, 'Aviasozlar MFY', 'Авиасозлар МСГ', 'МСГ', '104-0094', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(52, 7, 'Adolat MFY', 'Адолат МСГ', 'МСГ', '107-0084', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(53, 9, 'Azamat MFY', 'Азамат МСГ', 'МСГ', '109-0077', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(54, 7, 'Akbarobod MFY', 'Акбаробод МСГ', 'МСГ', '107-0085', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(55, 4, 'Al-Buhoriy MFY', 'Ал-Бухорий МСГ', 'МСГ', '104-0095', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(56, 4, 'Alimkent MFY', 'Алимкент МСГ', 'МСГ', '104-0124', 'аввалги номи Мирзо Улуғбек МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(57, 1, 'Alixonto‘ra Sog‘uniy MFY', 'Алихонтура Согуний МСГ', 'МСГ', '101-0086', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(58, 9, 'Alisher Navoiy MFY', 'Алишер Навоий МСГ', 'МСГ', '109-0078', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(59, 9, 'Alisherobod MFY', 'Алишеробод МСГ', 'МСГ', '109-0131', 'Қибрай тумани', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(60, 8, 'Allon MFY', 'Аллон МСГ', 'МСГ', '108-0095', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(61, 9, 'Alpomish MFY', 'Алпомиш МСГ', 'МСГ', '109-0079', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(62, 6, 'Al-Farg‘oniy MFY', 'Ал-Фаргоний МСГ', 'МСГ', '106-0054', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(63, 12, 'Al-Farg‘oniy MFY', 'Ал-Фаргоний МСГ', 'МСГ', '112-0017', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(64, 9, 'Al-Farobiy MFY', 'Ал-Фаробий МСГ', 'МСГ', '109-0080', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(65, 3, 'Al-Xorazmiy MFY', 'Ал-Хоразмий МСГ', 'МСГ', '103-0094', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(66, 4, 'Amir Temur MFY', 'Амир Темур МСГ', 'МСГ', '104-0097', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(67, 7, 'Anorzor MFY', 'Анорзор МСГ', 'МСГ', '107-0093', 'Г.Абдулаев МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(68, 4, 'Arg‘in MFY', 'Аргин МСГ', 'МСГ', '104-0158', 'Қибрай тумани', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(69, 5, 'Armug‘on MFY', 'Армугон МСГ', 'МСГ', '105-0045', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(70, 9, 'Asaka MFY', 'Асака МСГ', 'МСГ', '109-0106', 'аввалги номи Салар МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(71, 4, 'Asalobod MFY', 'Асалобод МСГ', 'МСГ', '104-0098', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(72, 6, 'Asrobod MFY', 'Асробод МСГ', 'МСГ', '106-0071', 'аввалги номи Обод МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(73, 7, 'Astrobod MFY', 'Астробод МСГ', 'МСГ', '107-0086', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(74, 11, 'At-Termiziy MFY', 'Ат-Термизий МСГ', 'МСГ', '111-0063', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(75, 11, 'Afrosiyob MFY', 'Афросиёб МСГ', 'МСГ', '111-0064', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(76, 8, 'Ahil MFY', 'Ахил МСГ', 'МСГ', '108-0096', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(77, 9, 'Ahillik MFY', 'Ахиллик МСГ', 'МСГ', '109-0081', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(78, 7, 'Ahilobod MFY', 'Ахилобод МСГ', 'МСГ', '107-0087', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(79, 7, 'Ahmad Donish MFY', 'Ахмад Дониш МСГ', 'МСГ', '107-0088', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(80, 9, 'Ahmad Yugnakiy MFY', 'Ахмад Югнакий МСГ', 'МСГ', '109-0082', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(81, 4, 'Ahmad Yassaviy MFY', 'Ахмад Яссавий МСГ', 'МСГ', '104-0099', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(82, 8, 'Achaobod MFY', 'Ачаобод МСГ', 'МСГ', '108-0097', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(83, 11, 'Bayot MFY', 'Баёт МСГ', 'МСГ', '111-0075', 'аввалги номи Матонат МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(84, 11, 'Baynalminal MFY', 'Байналминал МСГ', 'МСГ', '111-0065', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(85, 11, 'Banokatiy MFY', 'Банокатий МСГ', 'МСГ', '111-0080', 'аввалги номи Навбаҳор МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(86, 4, 'Barkamol MFY', 'Баркамол МСГ', 'МСГ', '104-0105', 'аввалги номи Бобур МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(87, 11, 'Barotxo‘ja MFY', 'Баротхужа МСГ', 'МСГ', '111-0066', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(88, 9, 'Bahor MFY', 'Бахор МСГ', 'МСГ', '109-0084', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(89, 3, 'Bahoriston MFY', 'Бахористон МСГ', 'МСГ', '103-0095', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(90, 7, 'Beg‘ubor MFY', 'Бегубор МСГ', 'МСГ', '107-0099', 'аввалги номи Иттифоқ МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(91, 3, 'Bek to‘pi MFY', 'Бек тупи МСГ', 'МСГ', '103-0096', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(92, 1, 'Bekobod MFY', 'Бекобод МСГ', 'МСГ', '101-0088', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(93, 5, 'Belariq MFY', 'Беларик МСГ', 'МСГ', '105-0027', 'аввалги номи Абдулла Авлоний МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(94, 10, 'Beltepa MFY', 'Белтепа МСГ', 'МСГ', '110-0072', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(95, 8, 'Beruniy MFY', 'Беруний МСГ', 'МСГ', '108-0099', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(96, 4, 'Behizor MFY', 'Бехизор МСГ', 'МСГ', '104-0101', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(97, 4, 'Besh Bola MFY', 'Беш Бола МСГ', 'МСГ', '104-0102', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(98, 4, 'Beshariq MFY', 'Бешарик МСГ', 'МСГ', '104-0151', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(99, 3, 'Beshyog‘och MFY', 'Бешёгоч МСГ', 'МСГ', '103-0097', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(100, 1, 'Beshqayrag‘och MFY', 'Бешкайрагоч МСГ', 'МСГ', '101-0089', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(101, 9, 'Beshkapa MFY', 'Бешкапа МСГ', 'МСГ', '109-0085', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(102, 3, 'Beshqo‘rg‘on MFY', 'Бешкургон МСГ', 'МСГ', '103-0098', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(103, 3, 'Beshchinor MFY', 'Бешчинор МСГ', 'МСГ', '103-0125', 'аввалг номи Хамза МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(104, 11, 'Bilimdon MFY', 'Билимдон МСГ', 'МСГ', '111-0068', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(105, 7, 'Billur MFY', 'Биллур МСГ', 'МСГ', '107-0107', 'аввалги номи Наврўз МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(106, 2, 'Binokor MFY', 'Бинокор МСГ', 'МСГ', '102-0024', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(107, 12, 'Binokor MFY', 'Бинокор МСГ', 'МСГ', '112-0009', 'Куйичирчик тумани', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(108, 6, 'Birdamlik MFY', 'Бирдамлик МСГ', 'МСГ', '106-0103', 'аввалги Зиёкор МФЙ (Ҳалқ депутатлари Тошкент шаҳар Кенгашининг 2020 йил 22 сентябрдаги 164/20-6-cон қарорига асосан)', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(109, 4, 'Birlashgan MFY', 'Бирлашган МСГ', 'МСГ', '104-0104', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(110, 1, 'Birlik MFY', 'Бирлик МСГ', 'МСГ', '101-0090', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(111, 11, 'Birodarlik MFY', 'Биродарлик МСГ', 'МСГ', '111-0069', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(112, 7, 'Bobodehqon MFY', 'Бободехкон МСГ', 'МСГ', '107-0090', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(113, 5, 'Bobur MFY', 'Бобур МСГ', 'МСГ', '105-0029', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(114, 4, 'Bog\'bon MFY', 'Богбон МСГ', 'МСГ', '104-0155', 'Қибрай тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(115, 3, 'Bog‘zor MFY', 'Богзор МСГ', 'МСГ', '103-0099', 'аввалги номи Боғистон МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(116, 7, 'Bog‘ibo‘ston MFY', 'Богибустон МСГ', 'МСГ', '107-0112', 'аввалги номи Оқ-қўрғон МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(117, 9, 'Bog‘imaydon MFY', 'Богимайдон МСГ', 'МСГ', '109-0111', 'аввалги номи Умид МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(118, 1, 'Bog‘iston MFY', 'Богистон МСГ', 'МСГ', '101-0091', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(119, 1, 'Bog‘ichinor MFY', 'Богичинор МСГ', 'МСГ', '101-0092', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(120, 7, 'Bog‘ishamol MFY', 'Богишамол МСГ', 'МСГ', '107-0091', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(121, 7, 'Bog‘ieʼram MFY', 'Богиэърам МСГ', 'МСГ', '107-0145', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(122, 10, 'Bog‘ko‘cha MFY', 'Богкуча МСГ', 'МСГ', '110-0073', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(123, 1, 'Bog‘obod MFY', 'Богобод МСГ', 'МСГ', '101-0093', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(124, 5, 'Bog‘saroy MFY', 'Богсарой МСГ', 'МСГ', '105-0038', 'аввалги номи Туркистон МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(125, 7, 'Bodomzor MFY', 'Бодомзор МСГ', 'МСГ', '107-0092', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(126, 4, 'Boyqo‘rg‘on MFY', 'Бойкургон МСГ', 'МСГ', '104-0106', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(127, 4, 'Boysun MFY', 'Бойсун МСГ', 'МСГ', '104-0107', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(128, 3, 'Botirma MFY', 'Ботирма МСГ', 'МСГ', '103-0084', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(129, 5, 'Boshliq MFY', 'Бошлик МСГ', 'МСГ', '105-0030', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(130, 9, 'Bo‘z MFY', 'Буз МСГ', 'МСГ', '109-0087', 'аввалги номи Бўз-2 МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(131, 7, 'Bo‘zsuv MFY', 'Бузсув МСГ', 'МСГ', '107-0104', 'аввалги номи Минг Ўрик МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(132, 4, 'Bunyodkor MFY', 'Бунёдкор МСГ', 'МСГ', '104-0108', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(133, 6, 'Bunyodobod MFY', 'Бунёдобод МСГ', 'МСГ', '106-0085', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(134, 3, 'Bo‘rijar MFY', 'Бурижар МСГ', 'МСГ', '103-0100', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(135, 10, 'Buston MFY', 'Бустон МСГ', 'МСГ', '110-0074', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(136, 8, 'Bustonobod MFY', 'Бустонабад МСГ', 'МСГ', '108-0102', 'аввалги номи Бўстон МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(137, 9, 'Buyuk ipak yo‘li MFY', 'Буюк ипак йули МСГ', 'МСГ', '109-0083', 'аввалги номи Аҳмад Яссавий МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(138, 7, 'Buyuk Turon MFY', 'БуюкТурон МСГ', 'МСГ', '107-0121', 'аввалги номи Турон МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(139, 1, 'Vatan MFY', 'Ватан МСГ', 'МСГ', '101-0094', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(140, 4, 'Vatandosh MFY', 'Ватандош МСГ', 'МСГ', '104-0141', 'аввалги номи Усмон Носир МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(141, 1, 'Vatanparvar MFY', 'Ватанпарвар МСГ', 'МСГ', '101-0095', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(142, 6, 'Viqor MFY', 'Викор МСГ', 'МСГ', '106-0101', 'аввалги номи Полвонёр МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(143, 12, 'Viqor MFY', 'Викор МСГ', 'МСГ', '112-0016', 'аввалги номи Полвонёр МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(144, 3, 'Gavxar MFY', 'Гавхар МСГ', 'МСГ', '103-0133', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(145, 7, 'G‘ayratiy MFY', 'Гайратий МСГ', 'МСГ', '107-0094', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(146, 8, 'Gʼalaba MFY', 'Галаба МСГ', 'МСГ', '108-0103', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(147, 8, 'Gʼani Aʼzamov MFY', 'Гани Аъзамов МСГ', 'МСГ', '108-0104', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(148, 9, 'Geofizika MFY', 'Геофизика МСГ', 'МСГ', '109-0133', 'Қибрай тумани', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(149, 4, 'Go‘zal MFY', 'Гузал МСГ', 'МСГ', '104-0109', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(150, 1, 'Guzar MFY', 'Гузар МСГ', 'МСГ', '101-0096', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(151, 8, 'Guzarboshi MFY', 'Гузарбоши МСГ', 'МСГ', '108-0105', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(152, 2, 'Gulbog‘ MFY', 'Гулбог МСГ', 'МСГ', '102-0036', 'Юкоричирчик тумани', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(153, 10, 'Gulbozor MFY', 'Гулбозор МСГ', 'МСГ', '110-0075', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(154, 8, 'Gulzor MFY', 'Гулзор МСГ', 'МСГ', '108-0106', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(155, 3, 'Guliston MFY', 'Гулистон МСГ', 'МСГ', '103-0102', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(156, 10, 'Gulobod MFY', 'Гулобод МСГ', 'МСГ', '110-0076', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(157, 9, 'Gulsanam MFY', 'Гулсанам МСГ', 'МСГ', '109-0086', 'аввалги номи Бобур МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(158, 8, 'Gulsaroy MFY', 'Гулсарой МСГ', 'МСГ', '108-0108', 'аввалги номи Дўстлик МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(159, 6, 'Gulshanobod MFY', 'Гулшанобод МСГ', 'МСГ', '106-0097', '2020 йил 19 август 149/18-6-сонли карор булиниши хисоби', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(160, 12, 'Gulshanobod MFY', 'Гулшанобод МСГ', 'МСГ', '112-0005', 'Зангиота тумани', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(161, 8, 'Guruch Arik MFY', 'Гуруч Арик МСГ', 'МСГ', '108-0107', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(162, 1, 'Davlatobod MFY', 'Давлатобод МСГ', 'МСГ', '101-0097', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(163, 5, 'Damariq MFY', 'Дамарик МСГ', 'МСГ', '105-0031', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(164, 6, 'Daryobo‘yi MFY', 'Дарёбуйи МСГ', 'МСГ', '106-0056', 'аввалги номи Бахор МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(165, 9, 'Darxon MFY', 'Дархон МСГ', 'МСГ', '109-0089', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(166, 2, 'Hovli bog‘ MFY', 'Дача МСГ', 'МСГ', '102-0025', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(167, 1, 'Degriz MFY', 'Дегриз МСГ', 'МСГ', '101-0098', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(168, 3, 'Diyor MFY', 'Диёр МСГ', 'МСГ', '103-0136', 'Халқ депутатлари Тошкент шаҳар Кенгашининг 18.10.2021 й. VI-48-87-14-0-K/21-сонли қарори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(169, 1, 'Diyorobod MFY', 'Диёробод МСГ', 'МСГ', '101-0144', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(170, 1, 'Diydor MFY', 'Дийдор МСГ', 'МСГ', '101-0143', 'аввалги номи Ковунчи МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(171, 4, 'Dilbog‘ MFY', 'Дилбог МСГ', 'МСГ', '104-0100', 'аввалги номи Баҳор МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(172, 5, 'Dilbuloq MFY', 'Дилбулоқ МСГ', 'МСГ', '105-0047', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(173, 3, 'Dilobod MFY', 'Дилобод МСГ', 'МСГ', '103-0104', 'аввалги номи Дўстлик МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(174, 3, 'Dombrobod MFY', 'Домбробод МСГ', 'МСГ', '103-0103', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(175, 4, 'Donishmand MFY', 'Донишманд МСГ', 'МСГ', '104-0111', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(176, 6, 'Do‘stlik MFY', 'Дустлик МСГ', 'МСГ', '106-0059', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(177, 12, 'Do‘stlik MFY', 'Дустлик МСГ', 'МСГ', '112-0019', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(178, 4, 'Do‘stobod MFY', 'Дустобод МСГ', 'МСГ', '104-0112', 'аввалги номи Дўстлик МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(179, 6, 'Yorqin hayot MFY', 'Ёркин хаёт МСГ', 'МСГ', '106-0060', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(180, 12, 'Yorqin hayot MFY', 'Ёркин хаёт МСГ', 'МСГ', '112-0033', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(181, 4, 'Yosh avlod MFY', 'Ёш авлод МСГ', 'МСГ', '104-0115', '29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори, аввалги номи Икбол', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(182, 8, 'Yoshlik MFY', 'Ёшлик МСГ', 'МСГ', '108-0109', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(183, 12, 'Jaloir MFY', 'Жалоир МСГ', 'МСГ', '112-0011', 'Ўртачирчик тумани', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(184, 10, 'Jangox MFY', 'Жангох МСГ', 'МСГ', '110-0077', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(185, 10, 'Jarariq MFY', 'Жарарик МСГ', 'МСГ', '110-0078', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(186, 4, 'Jarboshi MFY', 'Жарбоши МСГ', 'МСГ', '104-0152', 'Қибрай тумани', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(187, 1, 'Jarbuloq MFY', 'Жарбулок МСГ', 'МСГ', '101-0099', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(188, 4, 'Jarqo‘rg‘on MFY', 'Жаркургон МСГ', 'МСГ', '104-0113', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(189, 8, 'Jiydali MFY', 'Жийдали МСГ', 'МСГ', '108-0098', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(190, 7, 'Jomiy MFY', 'Жомий МСГ', 'МСГ', '107-0097', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(191, 6, 'Jo‘nariq MFY', 'Жунарик МСГ', 'МСГ', '106-0053', 'аввалги номи Алишер Навоий МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(192, 4, 'Jo‘rabek MFY', 'Журабек МСГ', 'МСГ', '104-0114', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(193, 1, 'Jurjoniy MFY', 'Журжоний МСГ', 'МСГ', '101-0100', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(194, 11, 'Zaminobod MFY', 'Заминабад МСГ', 'МСГ', '111-0071', 'аввалги номи Дўстлик МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(195, 10, 'Zangiota MFY', 'Зангиота МСГ', 'МСГ', '110-0079', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(196, 1, 'Zarafshon MFY', 'Зарафшон МСГ', 'МСГ', '101-0139', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(197, 12, 'Zarbdor MFY', 'Зарбдор МСГ', 'МСГ', '112-0025', '20.08.2022 йилдаги кенгаш карори 2021 йил 19 феврал 298/34-6-сонли карор Халк депутатлари кенгаши', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(198, 1, 'Zargarlik MFY', 'Заргарлик МСГ', 'МСГ', '101-0141', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(199, 3, 'Zarqo‘rg‘on MFY', 'Заркургон МСГ', 'МСГ', '103-0118', 'аввалги номи Нўғой-Қўрғон МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(200, 10, 'Zafarobod MFY', 'Зафаробод МСГ', 'МСГ', '110-0080', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(201, 8, 'Ziyo MFY', 'Зиё МСГ', 'МСГ', '108-0110', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(202, 8, 'Ziyokor MFY', 'Зиёкор МСГ', 'МСГ', '108-0151', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(203, 11, 'Ziyonur MFY', 'Зиёнур МСГ', 'МСГ', '111-0084', 'аввалги номи Олмазор МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(204, 6, 'Ziynat MFY', 'Зийнат МСГ', 'МСГ', '106-0057', 'аввалги номи Бобур МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(205, 2, 'Zilola MFY', 'Зилола МСГ', 'МСГ', '102-0026', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(206, 1, 'Zulfizar MFY', 'Зулфизар МСГ', 'МСГ', '101-0101', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(207, 10, 'Ibn Sino MFY', 'Ибн Сино МСГ', 'МСГ', '110-0081', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(208, 1, 'Ibrat MFY', 'Ибрат МСГ', 'МСГ', '101-0102', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(209, 8, 'Ibrohim ota MFY', 'Иброхим ота МСГ', 'МСГ', '108-0111', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(210, 2, 'Iykota MFY', 'Ийкота МСГ', 'МСГ', '102-0035', 'Юкоричирчик тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(211, 2, 'Iqbol MFY', 'Икбол МСГ', 'МСГ', '102-0027', 'авалги номи Истиқбол МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(212, 10, 'Ilg\'or MFY', 'Илгор МСГ', 'МСГ', '110-0082', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(213, 4, 'Iltifot MFY', 'Илтифот МСГ', 'МСГ', '104-0116', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(214, 11, 'Inoqobod MFY', 'Инокоабад МСГ', 'МСГ', '111-0067', 'аввалги номи Баҳор МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(215, 10, 'Ipakchi MFY', 'Ипакчи МСГ', 'МСГ', '110-0083', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(216, 8, 'Islom ota MFY', 'Ислом ота МСГ', 'МСГ', '108-0112', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(217, 7, 'Islomobod MFY', 'Исломобод МСГ', 'МСГ', '107-0098', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(218, 8, 'Istiqbol MFY', 'Истикбол МСГ', 'МСГ', '108-0114', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(219, 4, 'Istiqlol MFY', 'Истиклол МСГ', 'МСГ', '104-0117', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(220, 11, 'Istiqlolobod MFY', 'Истиклолабад МСГ', 'МСГ', '111-0072', 'аввалги номи Истиқлол МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(221, 1, 'Istirohat MFY', 'Истирохат МСГ', 'МСГ', '101-0103', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(222, 6, 'Ittifoq MFY', 'Иттифок МСГ', 'МСГ', '106-0061', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(223, 7, 'Iftihor MFY', 'Ифтихор МСГ', 'МСГ', '107-0111', 'аввалги номи Оқибат МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(224, 7, 'Yo‘layriq MFY', 'Йулайрик МСГ', 'МСГ', '107-0136', 'аввалги номи Шодлик МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(225, 6, 'Yo‘ldosh MFY', 'Йулдош МСГ', 'МСГ', '106-0062', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(226, 12, 'Yo‘ldosh MFY', 'Йулдош МСГ', 'МСГ', '112-0014', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(227, 7, 'Qadrdon MFY', 'Кадрдон МСГ', 'МСГ', '107-0096', 'аввалги номи Дўстлик МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(228, 4, 'Qadriyat MFY', 'Кадрият МСГ', 'МСГ', '104-0139', '29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори аввалги номи, куксарой, Умид МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(229, 10, 'Kamolon darvoza MFY', 'Камолон Дарбоза МСГ', 'МСГ', '110-0071', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(230, 9, 'Kamolot MFY', 'Камолот МСГ', 'МСГ', '109-0125', 'аввалги номи Яланғочота МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(231, 3, 'Qatortol MFY', 'Катортол МСГ', 'МСГ', '103-0105', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(232, 10, 'Katta bog\' MFY', 'Катта бог МСГ', 'МСГ', '110-0085', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(233, 3, 'Katta Do\'mbirobod MFY', 'Катта Домбробод МСГ', 'МСГ', '103-0106', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(234, 10, 'Katta Jarariq MFY', 'Катта Жарарик МСГ', 'МСГ', '110-0096', 'аввалги номи Октепа МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(235, 1, 'Katta Qa\'ni MFY', 'Катта Каъни МСГ', 'МСГ', '101-0104', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(236, 3, 'Katta Kozirobod MFY', 'Катта Козиробод МСГ', 'МСГ', '103-0107', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(237, 9, 'Katta Qorasuv MFY', 'Катта Кора-су МСГ', 'МСГ', '109-0090', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(238, 4, 'Katta Qo\'yliq MFY', 'Катта Куйлик МСГ', 'МСГ', '104-0118', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(239, 3, 'Katta Navbahor MFY', 'Катта Навбахор МСГ', 'МСГ', '103-0137', 'Халқ депутатлари Тошкент шаҳар Кенгашининг 18.10.2021 й. VI-48-87-14-0-K/21-сонли қарори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(240, 10, 'Katta oqtepa MFY', 'Катта Октепа МСГ', 'МСГ', '110-0111', 'аввалги номи Чупонота МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(241, 3, 'Katta Olmazor MFY', 'Катта Олмазор МСГ', 'МСГ', '103-0120', 'аввалги номи Олмазор МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(242, 9, 'Katta Oltintepa MFY', 'Катта Олтинтепа МСГ', 'МСГ', '109-0091', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(243, 7, 'Katta Xasanboy MFY', 'Катта Хасанбой МСГ', 'МСГ', '107-0146', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(244, 3, 'Katta Xirmontepa MFY', 'Катта Хирмонтепа МСГ', 'МСГ', '103-0108', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(245, 10, 'Katta xovuz MFY', 'Катта ховуз МСГ', 'МСГ', '110-0086', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(246, 9, 'Katta Yalong\'och-ota MFY', 'Катта Ялангочота МСГ', 'МСГ', '109-0092', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(247, 4, 'Katta Yangiobod MFY', 'Катта Янгиобод МСГ', 'МСГ', '104-0119', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(248, 7, 'Qashqar MFY', 'Кашкар МСГ', 'МСГ', '107-0100', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(249, 6, 'Qipchoq MFY', 'Кипчок МСГ', 'МСГ', '106-0063', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(250, 12, 'Qipchoq MFY', 'Кипчок МСГ', 'МСГ', '112-0020', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(251, 3, 'Kichik Xirmontepa MFY', 'Кичик Хирмонтепа МСГ', 'МСГ', '103-0109', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(252, 8, 'Qichqiriq MFY', 'Кичкирик МСГ', 'МСГ', '108-0116', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(253, 1, 'Qoziguzar MFY', 'Козигузар МСГ', 'МСГ', '101-0105', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(254, 3, 'Qozirobod MFY', 'Козиробод МСГ', 'МСГ', '103-0138', 'Халқ депутатлари Тошкент шаҳар Кенгашининг 18.10.2021 й. VI-48-87-14-0-K/21-сонли қарори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(255, 10, 'Kamolon MFY', 'Комолон МСГ', 'МСГ', '110-0087', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(256, 5, 'Konstitutsiya MFY', 'Конституция МСГ', 'МСГ', '105-0032', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(257, 8, 'Qorasaroy MFY', 'Корасарой МСГ', 'МСГ', '108-0118', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(258, 11, 'Qora-suv MFY', 'Кора-су МСГ', 'МСГ', '111-0073', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(259, 10, 'Qoratosh MFY', 'Коратош МСГ', 'МСГ', '110-0088', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(260, 1, 'Qor Yog\'di MFY', 'Кори ёгди МСГ', 'МСГ', '101-0106', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(261, 10, 'Kox ota MFY', 'Кохота МСГ', 'МСГ', '110-0089', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(262, 6, 'Qubay-tepa MFY', 'Кубай тепа МСГ', 'МСГ', '106-0086', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(263, 8, 'Quyosh MFY', 'Куёш МСГ', 'МСГ', '108-0094', 'аввалги номи Алишер Навоий МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(264, 1, 'Quyi Darxon MFY', 'Куйи Дархон МСГ', 'МСГ', '101-0107', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(265, 4, 'Qo\'yliqobod MFY', 'Куйликобод МСГ', 'МСГ', '104-0120', 'аввалги номи Қўйлиқ ота МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(266, 11, 'Qo\'yliq ota MFY', 'Куйлик-ота МСГ', 'МСГ', '111-0074', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(267, 1, 'Ko\'ksaroy MFY', 'Куксарой МСГ', 'МСГ', '101-0108', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(268, 10, 'Ko\'kcha darvoza MFY', 'Кукча Дарвоза МСГ', 'МСГ', '110-0084', 'аввалги номи Исломобод МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(269, 10, 'Ko\'kcha MFY', 'Кукча МСГ', 'МСГ', '110-0090', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(270, 1, 'Ko\'kcha Oqtepa MFY', 'Кукча октепа МСГ', 'МСГ', '101-0109', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(271, 7, 'Kulolqo\'rg\'on MFY', 'Кулолкургон МСГ', 'МСГ', '107-0101', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(272, 1, 'Qo\'rg\'ontepa MFY', 'Кургонтепа МСГ', 'МСГ', '101-0110', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(273, 3, 'Ko\'rkam MFY', 'Куркам МСГ', 'МСГ', '103-0139', 'Халқ депутатлари Тошкент шаҳар Кенгашининг 18.10.2021 й. VI-48-87-14-0-K/21-сонли қарори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(274, 1, 'Ko\'rkamobod MFY', 'Куркамобод МСГ', 'МСГ', '101-0111', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(275, 6, 'Quruvchilar MFY', 'Курувчилар МСГ', 'МСГ', '106-0099', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(276, 3, 'Ko\'tarma MFY', 'Кутарма МСГ', 'МСГ', '103-0110', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(277, 1, 'Ko\'xna Cho\'ponota MFY', 'Кухна Чупонота МСГ', 'МСГ', '101-0112', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(278, 6, 'Qo\'sh-qo\'rgon MFY', 'Куш кургон МСГ', 'МСГ', '106-0065', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(279, 5, 'Qushbegi MFY', 'Кушбеги МСГ', 'МСГ', '105-0033', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(280, 8, 'Qo\'shtut MFY', 'Куштут МСГ', 'МСГ', '108-0119', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(281, 7, 'Qo\'shchinor MFY', 'Кушчинор МСГ', 'МСГ', '107-0102', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(282, 10, 'Labzak MFY', 'Лабзак МСГ', 'МСГ', '110-0091', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(283, 1, 'Latifguzar MFY', 'Латифгузар МСГ', 'МСГ', '101-0113', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(284, 9, 'Lashkarbegi MFY', 'Лашкарбеги МСГ', 'МСГ', '109-0094', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(285, 11, 'Lolazor MFY', 'Лолазор МСГ', 'МСГ', '111-0070', 'аввалги номи Боғишамол МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(286, 3, 'Lutfiy MFY', 'Лутфий МСГ', 'МСГ', '103-0111', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(287, 6, 'Madadkor MFY', 'Мададкор МСГ', 'МСГ', '106-0058', 'аввалги номи Гулистон МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(288, 6, 'Madaniyat MFY', 'Маданият МСГ', 'МСГ', '106-0066', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(289, 2, 'Majnuntol MFY', 'Мажнунтол МСГ', 'МСГ', '102-0028', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(290, 10, 'Mannon Uyg\'ur MFY', 'Маннон Уйгур МСГ', 'МСГ', '110-0092', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(291, 6, 'Marxamat MFY', 'Мархамат МСГ', 'МСГ', '106-0096', '2020 йил 19 август 149/18-6-сонли карор булиниши хисоби', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(292, 12, 'Marxamat MFY', 'Мархамат МСГ', 'МСГ', '112-0032', '2020 йил 19 август 149/18-6-сонли карор булиниши хисоби', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(293, 7, 'Matonat MFY', 'Матонат МСГ', 'МСГ', '107-0103', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(294, 4, 'Maxmur MFY', 'Махмур МСГ', 'МСГ', '104-0121', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(295, 4, 'Mashinasozlar MFY', 'Машинасозлар МСГ', 'МСГ', '104-0122', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(296, 12, 'Mash\'al MFY', 'Машъал МСГ', 'МСГ', '112-0028', '20.08.2022 йилги кенгаш карори  2021 йил 19 феврал 298/34-6-сонли карор Халк депутатлари кенгаши', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(297, 4, 'Ma\'rifat MFY', 'Маърифат МСГ', 'МСГ', '104-0123', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(298, 3, 'Mevazor MFY', 'Мевазор МСГ', 'МСГ', '103-0112', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(299, 5, 'Meros MFY', 'Мерос МСГ', 'МСГ', '105-0044', 'аввалги номи Яккасарой-2 МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(300, 7, 'Mehnatobod MFY', 'Меҳнатобод МСГ', 'МСГ', '107-0142', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(301, 3, 'Mexrjon MFY', 'Мехржон МСГ', 'МСГ', '103-0113', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(302, 6, 'Mehrigiyo MFY', 'Мехригиё МСГ', 'МСГ', '106-0082', 'аввалги номи Ш.Бурхонов МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(303, 11, 'Ming o\'rik MFY', 'Минг Урик МСГ', 'МСГ', '111-0076', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(304, 9, 'Minglola MFY', 'Минглола МСГ', 'МСГ', '109-0097', 'аввалги номи Наврўз МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(305, 7, 'Mingchinor MFY', 'Мингчинор МСГ', 'МСГ', '107-0131', 'аввалги номи Чинор МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(306, 7, 'Minor MFY', 'Минор МСГ', 'МСГ', '107-0105', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(307, 8, 'Mirza G\'olib MFY', 'Мирза Голиб МСГ', 'МСГ', '108-0120', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(308, 9, 'Mirzakalon Ismoiliy MFY', 'Мирзакалон Исмоилий МСГ', 'МСГ', '109-0095', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(309, 7, 'M.Ulug\'bek MFY', 'Мирзо Улугбек МСГ', 'МСГ', '107-0106', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(310, 2, 'Mirishkor MFY', 'Миришкор МСГ', 'МСГ', '102-0029', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(311, 11, 'Mirobod MFY', 'Миробод МСГ', 'МСГ', '111-0077', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(312, 8, 'Miskin MFY', 'Мискин МСГ', 'МСГ', '108-0121', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(313, 11, 'Movarounnaxr MFY', 'Мовароуннахр МСГ', 'МСГ', '111-0078', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(314, 8, 'Moyarik MFY', 'Мойарик МСГ', 'МСГ', '108-0122', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(315, 4, 'Mohinur MFY', 'Мохинур МСГ', 'МСГ', '104-0125', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(316, 4, 'Mohirlar МФЙ', 'Мохирлар МСГ', 'МСГ', '104-0156', 'Қибрай тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(317, 5, 'Muqumiy MFY', 'Мукумий МСГ', 'МСГ', '105-0034', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(318, 4, 'Mumtoz MFY', 'Мумтоз МСГ', 'МСГ', '104-0126', 'аввалги номи Муқумий МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(319, 9, 'Munavvarqori MFY', 'Мунаввар кори МСГ', 'МСГ', '109-0096', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(320, 7, 'Murruvat MFY', 'Мурувват МСГ', 'МСГ', '107-0110', 'аввалги номи Ойбек МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(321, 8, 'Mustaqillik MFY', 'Мустакиллик МСГ', 'МСГ', '108-0123', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(322, 9, 'Mustaqillik MFY', 'Мустакиллик МСГ', 'МСГ', '109-0129', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(323, 5, 'Muxandislar MFY', 'Мухандислар МСГ', 'МСГ', '105-0040', 'аввалги номи Усмон Носир МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(324, 4, 'Muxtor Ashrafiy MFY', 'Мухтор Ашрафий МСГ', 'МСГ', '104-0129', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(325, 3, 'Navbahor MFY', 'Навбахор МСГ', 'МСГ', '103-0114', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(326, 6, 'Navqiron MFY', 'Навкирон МСГ', 'МСГ', '106-0068', 'аввалги номи Наврўз МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(327, 12, 'Navqiron MFY', 'Навкирон МСГ', 'МСГ', '112-0026', 'аввалги номи Наврўз МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(328, 9, 'Navnihol MFY', 'Навнихол МСГ', 'МСГ', '109-0128', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(329, 11, 'Navro\'z MFY', 'Навруз МСГ', 'МСГ', '111-0081', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(330, 4, 'Navro\'zobod MFY', 'Наврузобод МСГ', 'МСГ', '104-0130', 'аввалги номи Наврўз МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(331, 1, 'Nayman MFY', 'Найман МСГ', 'МСГ', '101-0114', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(332, 3, 'Naqqoshlik MFY', 'Наккошлик МСГ', 'МСГ', '103-0116', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(333, 8, 'Namuna MFY', 'Намуна МСГ', 'МСГ', '108-0125', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(334, 3, 'Nafosat MFY', 'Нафосат МСГ', 'МСГ', '103-0093', 'аввалги номи 8-мавзе МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(335, 6, 'Nilufar MFY', 'Нилуфар МСГ', 'МСГ', '106-0069', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(336, 8, 'Nixol MFY', 'Нихол МСГ', 'МСГ', '108-0126', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(337, 1, 'Nishabariq MFY', 'Нишабарик МСГ', 'МСГ', '101-0115', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(338, 3, 'Novza MFY', 'Новза МСГ', 'МСГ', '103-0117', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(339, 4, 'Nodira MFY', 'Нодира МСГ', 'МСГ', '104-0131', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(340, 9, 'Nodirabegim MFY', 'Нодирабегим МСГ', 'МСГ', '109-0098', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(341, 6, 'Nomdanak MFY', 'Номданак МСГ', 'МСГ', '106-0111', 'бывш зангиота', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(342, 6, 'Nog\'ay-qo\'rgon MFY', 'Нугой Қургон МСГ', 'МСГ', '106-0070', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(343, 9, 'Nur MFY', 'Нур МСГ', 'МСГ', '109-0099', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(344, 2, 'Nurafshon MFY', 'Нурафшон МСГ', 'МСГ', '102-0030', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(345, 7, 'Nurmakon MFY', 'Нурмакон МСГ', 'МСГ', '107-0144', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(346, 1, 'Nurobod MFY', 'Нуробод МСГ', 'МСГ', '101-0116', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(347, 6, 'Nurhayot MFY', 'Нурхаёт МСГ', 'МСГ', '106-0084', 'аввалги номи Янги хаёт МФЙ', '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(348, 10, 'Obinazir MFY', 'Обиназир МСГ', 'МСГ', '110-0094', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(349, 7, 'Obod MFY', 'Обод МСГ', 'МСГ', '107-0109', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(350, 11, 'Oybek MFY', 'Ойбек МСГ', 'МСГ', '111-0082', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(351, 9, 'Oydin MFY', 'Ойдин МСГ', 'МСГ', '109-0142', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(352, 4, 'Oydinko\'l MFY', 'Ойдинкул МСГ', 'МСГ', '104-0132', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(353, 1, 'Oq masjid MFY', 'Ок масжид МСГ', 'МСГ', '101-0117', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(354, 9, 'Oqibat MFY', 'Окибат МСГ', 'МСГ', '109-0100', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(355, 9, 'Oqqo\'rg\'on MFY', 'Ок-кургон МСГ', 'МСГ', '109-0101', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(356, 10, 'Oqilon MFY', 'Оклон МСГ', 'МСГ', '110-0095', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(357, 3, 'Oq-tepa MFY', 'Октепа МСГ', 'МСГ', '103-0119', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(358, 7, 'Oqtepa MFY', 'Октепа МСГ', 'МСГ', '107-0113', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(359, 11, 'Oq uy MFY', 'Ок-уй МСГ', 'МСГ', '111-0083', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(360, 9, 'Oliy Himmat MFY', 'Олий химмат МСГ', 'МСГ', '109-0112', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(361, 10, 'Olim xo\'jaev MFY', 'Олим Хужаев МСГ', 'МСГ', '110-0097', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(362, 9, 'Olimlar MFY', 'Олимлар МСГ', 'МСГ', '109-0102', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(363, 8, 'Olimpiya MFY', 'Олимпия МСГ', 'МСГ', '108-0128', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(364, 10, 'Olmazor MFY', 'Олмазор МСГ', 'МСГ', '110-0098', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(365, 9, 'Olmachi MFY', 'Олмачи МСГ', 'МСГ', '109-0103', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(366, 4, 'Olmos MFY', 'Олмос МСГ', 'МСГ', '104-0133', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(367, 6, 'Oltin vodiy MFY', 'Олтин Водий МСГ', 'МСГ', '106-0073', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(368, 11, 'Oltinko\'l MFY', 'Олтинкул МСГ', 'МСГ', '111-0085', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(369, 8, 'Oltinsoy MFY', 'Олтинсой МСГ', 'МСГ', '108-0124', 'аввалги номи Навбахор МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(370, 9, 'Oltintepa MFY', 'Олтинтепа МСГ', 'МСГ', '109-0104', 'аввалги номи Олтинтепа-10 МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(371, 2, 'Oltintopgan MFY', 'Олтинтопган МСГ', 'МСГ', '102-0031', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(372, 6, 'Olchazor MFY', 'Олчазор МСГ', 'МСГ', '106-0104', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(373, 12, 'Olchazor MFY', 'Олчазор МСГ', 'МСГ', '112-0013', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(374, 8, 'Orzu MFY', 'Орзу МСГ', 'МСГ', '108-0100', 'аввалги номи Беруний майдони МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(375, 6, 'Oriyat MFY', 'Орият МСГ', 'МСГ', '106-0095', '2020 йил 19 август 149/18-6-сонли карор булиниши хисоби', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(376, 12, 'Oriyat MFY', 'Орият МСГ', 'МСГ', '112-0004', 'Зангиота тумани', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(377, 7, 'Otchopar-1 MFY', 'Отчопар-1 МСГ', 'МСГ', '107-0114', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(378, 7, 'Otchopar-2 MFY', 'Отчопар-2 МСГ', 'МСГ', '107-0115', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(379, 4, 'Parvoz MFY', 'Парвоз МСГ', 'МСГ', '104-0134', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(380, 11, 'Parvona MFY', 'Парвона МСГ', 'МСГ', '111-0086', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(381, 6, 'Past darxon MFY', 'Паст дархон МСГ', 'МСГ', '106-0087', 'бывш зангиота', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(382, 12, 'Past darxon MFY', 'Паст дархон МСГ', 'МСГ', '112-0021', 'бывш зангиота', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(383, 9, 'Pastki-yuz MFY', 'Пастки юз МСГ', 'МСГ', '109-0140', 'Қибрай тумани', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(384, 8, 'Paxta MFY', 'Пахта МСГ', 'МСГ', '108-0129', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(385, 1, 'Paxtakor MFY', 'Пахтакор МСГ', 'МСГ', '101-0118', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(386, 9, 'Podshobog\' MFY', 'Подшобог МСГ', 'МСГ', '109-0093', 'аввалги номи Гулистон МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(387, 7, 'Posira MFY', 'Посира МСГ', 'МСГ', '107-0116', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(388, 5, 'Rakat MFY', 'Ракат МСГ', 'МСГ', '105-0035', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(389, 5, 'Rakatboshi MFY', 'Ракатбоши МСГ', 'МСГ', '105-0039', 'аввалги номи Ўрикзор МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(390, 7, 'Registon MFY', 'Регистон МСГ', 'МСГ', '107-0147', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(391, 2, 'Rohat MFY', 'Рохат МСГ', 'МСГ', '102-0032', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(392, 9, 'Sayram MFY', 'Сайрам МСГ', 'МСГ', '109-0105', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(393, 11, 'Salar MFY', 'Салар МСГ', 'МСГ', '111-0087', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(394, 10, 'Samarqand darvoza MFY', 'Самарканд Дарвоза МСГ', 'МСГ', '110-0099', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(395, 11, 'Sariko\'l MFY', 'Саракул МСГ', 'МСГ', '111-0088', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32');
INSERT INTO `streets` (`id`, `district_id`, `name`, `name_ru`, `type`, `code`, `comment`, `created_at`, `updated_at`) VALUES
(396, 10, 'Sarxumdon MFY', 'Сархумдон МСГ', 'МСГ', '110-0100', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(397, 6, 'Saxovat MFY', 'Саховат МСГ', 'МСГ', '106-0072', 'аввалги номи Оқибат МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(398, 8, 'Sebzor MFY', 'Себзор МСГ', 'МСГ', '108-0130', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(399, 7, 'Sevinch MFY', 'Севинч МСГ', 'МСГ', '107-0118', 'аввалги номи Тинчлик МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(400, 4, 'Semurg\' MFY', 'Семург МСГ', 'МСГ', '104-0127', 'аввалги номи Мустақиллик МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(401, 7, 'Sobirobod MFY', 'Собиробод МСГ', 'МСГ', '107-0117', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(402, 6, 'Sofdil MFY', 'Софдил МСГ', 'МСГ', '106-0074', 'аввалги номи Темир йўлчи МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(403, 6, 'Sohibqiron MFY', 'Сохибкирон МСГ', 'МСГ', '106-0055', 'аввалги номи Амир Темур МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(404, 6, 'Sug\'diyona MFY', 'Сугдиёна МСГ', 'МСГ', '106-0100', 'аввалги номи Обихаёт МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(405, 10, 'Suzuk ota MFY', 'Сузукота МСГ', 'МСГ', '110-0101', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(406, 9, 'Sultoniya MFY', 'Султония МСГ', 'МСГ', '109-0088', 'аввалги номиГулзор МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(407, 8, 'Tabassum MFY', 'Табассум МСГ', 'МСГ', '108-0131', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(408, 1, 'Taqachi MFY', 'Такачи МСГ', 'МСГ', '101-0119', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(409, 8, 'Taraqqiyot MFY', 'Тараккиёт МСГ', 'МСГ', '108-0132', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(410, 4, 'Tarnov boshi MFY', 'Тарнов Боши МСГ', 'МСГ', '104-0136', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(411, 10, 'Taxtapul MFY', 'Тахтапул МСГ', 'МСГ', '110-0102', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(412, 6, 'Tashabbus MFY', 'Ташаббус МСГ', 'МСГ', '106-0091', 'бывш зангиота', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(413, 12, 'Tashabbus MFY', 'Ташаббус МСГ', 'МСГ', '112-0030', 'бывш зангиота', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(414, 4, 'TashIsti MFY', 'Ташисти МСГ', 'МСГ', '104-0153', 'Қибрай тумани', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(415, 11, 'Temiryo\'lchilar MFY', 'Темирйулчилар МСГ', 'МСГ', '111-0089', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(416, 5, 'Tepa MFY', 'Тепа МСГ', 'МСГ', '105-0036', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(417, 8, 'Tepaguzar MFY', 'Тепагузар МСГ', 'МСГ', '108-0127', 'аввалги номи Обод МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(418, 1, 'Tepaqo\'rg\'on MFY', 'Тепақўрғон МСГ', 'МСГ', '101-0140', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(419, 7, 'Tiklanish MFY', 'Тикланиш МСГ', 'МСГ', '107-0095', 'аввалги номи Гулистон МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(420, 10, 'Tinchlik MFY', 'Тинчлик МСГ', 'МСГ', '110-0103', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(421, 1, 'Tinchlikobod MFY', 'Тинчликобод МСГ', 'МСГ', '101-0120', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(422, 3, 'Tirsakobod MFY', 'Тирсакобод МСГ', 'МСГ', '103-0122', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(423, 4, 'Tovkentepa MFY', 'Товкентепа МСГ', 'МСГ', '104-0154', 'Қибрай тумани', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(424, 11, 'Tolariq MFY', 'Тол-арик МСГ', 'МСГ', '111-0090', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(425, 4, 'Tong MFY', 'Тонг МСГ', 'МСГ', '104-0128', 'аввалги номи Мустақилликнинг 10 йиллиги МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(426, 11, 'Tong Yulduzi MFY', 'Тонг юлдузи МСГ', 'МСГ', '111-0095', 'аввалги номи Шарқ Юлдузи МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(427, 12, 'Toshkent MFY', 'Тошкент МСГ', 'МСГ', '112-0006', 'Зангиота тумани', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(428, 9, 'Traktorsozlar MFY', 'Тракторсозлар МСГ', 'МСГ', '109-0107', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(429, 4, 'Tuzel MFY', 'Тузел МСГ', 'МСГ', '104-0137', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(430, 4, 'To\'y tepa MFY', 'Туйтепа МСГ', 'МСГ', '104-0138', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(431, 5, 'To\'qimachi MFY', 'Тукимачи МСГ', 'МСГ', '105-0037', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(432, 7, 'Turkiston MFY', 'Туркистон МСГ', 'МСГ', '107-0119', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(433, 7, 'Turk-Qo\'rg\'on MFY', 'Турк-кургон МСГ', 'МСГ', '107-0120', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(434, 9, 'Turon MFY', 'Турон МСГ', 'МСГ', '109-0108', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(435, 7, 'Uvaysiy MFY', 'Увайси МСГ', 'МСГ', '107-0122', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(436, 10, 'O\'zbekiston MFY', 'Узбекистон МСГ', 'МСГ', '110-0104', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(437, 7, 'O\'zbekiston Mustaqilligi MFY', 'Узбекистон Мустакиллиги МСГ', 'МСГ', '107-0123', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(438, 6, 'O\'zgarish MFY', 'Узгариш МСГ', 'МСГ', '106-0076', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(439, 9, 'Uyg\'onish MFY', 'Уйгониш МСГ', 'МСГ', '109-0109', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(440, 4, 'Uysozlar MFY', 'Уйсозлар МСГ', 'МСГ', '104-0103', 'аввалги номи Бинокор МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(441, 10, 'O\'qchi MFY', 'Укчи МСГ', 'МСГ', '110-0105', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(442, 4, 'O\'qchi Olmazor MFY', 'Укчи-Олмазор МСГ', 'МСГ', '104-0149', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(443, 9, 'Ulug\'bek MFY', 'Улугбек МСГ', 'МСГ', '109-0110', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(444, 8, 'Umid MFY', 'Умид МСГ', 'МСГ', '108-0134', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(445, 8, 'Universitet MFY', 'Университет МСГ', 'МСГ', '108-0135', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(446, 10, 'O\'rda MFY', 'Урда МСГ', 'МСГ', '110-0106', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(447, 1, 'O\'rikzor MFY', 'Урикзор МСГ', 'МСГ', '101-0121', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(448, 4, 'O\'rta Masjid MFY', 'Урта Масжид МСГ', 'МСГ', '104-0140', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(449, 7, 'Usta-Shirin MFY', 'Уста Ширин МСГ', 'МСГ', '107-0125', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(450, 1, 'O\'tkir MFY', 'Уткур МСГ', 'МСГ', '101-0122', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(451, 7, 'Uch-Qaxramon MFY', 'Уч-Кахрамон МСГ', 'МСГ', '107-0126', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(452, 1, 'Uchtepa MFY', 'Учтепа МСГ', 'МСГ', '101-0123', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(453, 6, 'Uchuvchilar MFY', 'Учувчилар МСГ', 'МСГ', '106-0077', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(454, 4, 'Uchchinor МФЙ', 'Уччинор МСГ', 'МСГ', '104-0159', 'Қибрай тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(455, 4, 'Fazogir MFY', 'Фазогир МСГ', 'МСГ', '104-0150', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(456, 12, 'Fayzli MFY', 'Файзли МСГ', 'МСГ', '112-0018', '2021 йил 19 феврал 298/34-6-сонли карор Халк депутатлари кенгаши аввалги номи Дарёбўйи МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(457, 6, 'Fayzli MFY', 'Файзли МСГ', 'МСГ', '106-0115', 'бывш зангиота', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(458, 11, 'Fayziobod MFY', 'Файзобод МСГ', 'МСГ', '111-0092', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(459, 11, 'Farovon MFY', 'Фаровон МСГ', 'МСГ', '111-0091', 'аввалги номи Ўзбекистон МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(460, 1, 'Farxod MFY', 'Фарход МСГ', 'МСГ', '101-0124', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(461, 9, 'Feruza MFY', 'Феруза МСГ', 'МСГ', '109-0113', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(462, 4, 'Fidoiylar MFY', 'Фидойилар МСГ', 'МСГ', '104-0143', 'аввалги номи Харбийлар МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(463, 3, 'Fidokor MFY', 'Фидокор МСГ', 'МСГ', '103-0134', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(464, 7, 'Firdavsiy MFY', 'Фирдавси МСГ', 'МСГ', '107-0127', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(465, 1, 'Foziltepa MFY', 'Фозилтепа МСГ', 'МСГ', '101-0138', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(466, 11, 'Furqat MFY', 'Фуркат МСГ', 'МСГ', '111-0093', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(467, 8, 'Xofiz Ko\'xakiy MFY', 'Х.Кухакий МСГ', 'МСГ', '108-0136', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(468, 9, 'Xabib Abdullaev MFY', 'Хабиб Абдуллаев МСГ', 'МСГ', '109-0114', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(469, 6, 'Xabibiy MFY', 'Хабибий МСГ', 'МСГ', '106-0078', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(470, 10, 'Xadra MFY', 'Хадра МСГ', 'МСГ', '110-0107', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(471, 8, 'Hazrati imom MFY', 'Хазрати Имом МСГ', 'МСГ', '108-0115', 'аввалги номи Истиклол МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(472, 3, 'Xayrabod MFY', 'Хайрабод МСГ', 'МСГ', '103-0123', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(473, 1, 'Xayratiy MFY', 'Хайратий МСГ', 'МСГ', '101-0125', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(474, 7, 'Xalqabog\' MFY', 'Халкабог МСГ', 'МСГ', '107-0124', 'аввалги номи Умид МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(475, 6, 'Xalqabod MFY', 'Халкабод МСГ', 'МСГ', '106-0079', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(476, 3, 'Xalqlar Do\'stligi MFY', 'Халклар Дустлиги МСГ', 'МСГ', '103-0124', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(477, 1, 'Hamdo\'st MFY', 'Хамдўст МСГ', 'МСГ', '101-0142', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(478, 9, 'Xamid Olimjon MFY', 'Хамид Олимжон МСГ', 'МСГ', '109-0115', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(479, 5, 'Hamid Sulaymon MFY', 'Хамид Сулаймон МСГ', 'МСГ', '105-0041', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(480, 7, 'Xamkorobod MFY', 'Хамкоробод МСГ', 'МСГ', '107-0089', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(481, 7, 'Xasanboy MFY', 'Хасанбой МСГ', 'МСГ', '107-0128', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(482, 8, 'Xastimom MFY', 'Хастимом МСГ', 'МСГ', '108-0137', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(483, 7, 'Xiyobon tepa MFY', 'Хиёбон тепа МСГ', 'МСГ', '107-0129', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(484, 4, 'Hilol MFY', 'Хилол МСГ', 'МСГ', '104-0157', 'Қибрай тумани, 29.06.2022 й, VI-66-176-14-0-K/22 сони Тош, ш кенгаш карори', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(485, 3, 'Xirmontepa MFY', 'Хирмонтепа МСГ', 'МСГ', '103-0126', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(486, 8, 'Xislat MFY', 'Хислат МСГ', 'МСГ', '108-0138', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(487, 1, 'Xojiobod MFY', 'Хожиобод МСГ', 'МСГ', '101-0126', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(488, 1, 'Xondamir MFY', 'Хондамир МСГ', 'МСГ', '101-0127', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(489, 6, 'Xonobod MFY', 'Хонобод МСГ', 'МСГ', '106-0116', 'бывш зангиота, янги номи кенгашда тасдиқланмаган', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(490, 6, 'Xonobodtepa MFY', 'Хонободтепа МСГ', 'МСГ', '106-0117', 'бывш зангиота', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(491, 3, 'Xonto\'pi MFY', 'Хонтўпи МСГ', 'МСГ', '103-0121', 'аввалги номи Тинчлик МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(492, 8, 'Xonchorbog\' MFY', 'Хончорбог МСГ', 'МСГ', '108-0139', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(493, 4, 'Xosiyatli MFY', 'Хосиятли МСГ', 'МСГ', '104-0096', 'аввалги номи Алишер Навоий МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(494, 10, 'Xuvaydo MFY', 'Хувайдо МСГ', 'МСГ', '110-0108', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(495, 12, 'Xo\'ja Uchqun MFY', 'Хужаучкун МСГ', 'МСГ', '112-0010', 'Ўртачирчик тумани', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(496, 6, 'Xumo MFY', 'Хумо МСГ', 'МСГ', '106-0090', 'бывш зангиота', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(497, 12, 'Xumo MFY', 'Хумо МСГ', 'МСГ', '112-0027', 'бывш зангиота', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(498, 9, 'Xumoyun MFY', 'Хумоюн МСГ', 'МСГ', '109-0117', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(499, 1, 'Xuroson MFY', 'Хуросон МСГ', 'МСГ', '101-0128', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(500, 1, 'Xurshid MFY', 'Хуршид МСГ', 'МСГ', '101-0129', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(501, 2, 'Husayn Boyqaro MFY', 'Хусайн Бойкаро МСГ', 'МСГ', '102-0033', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(502, 7, 'Husniobod MFY', 'Хусниобод МСГ', 'МСГ', '107-0130', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(503, 12, 'Xushnud MFY', 'Хушнуд МСГ', 'МСГ', '112-0007', '2021 йил 19 феврал 298/34-6-сонли карор Халк депутатлари кенгаши аввалги номи Тошкент-1 МФЙ зангиота тумани', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(504, 10, 'Chaqar MFY', 'Чакар МСГ', 'МСГ', '110-0109', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(505, 8, 'Chamanbog\' MFY', 'Чаманбог МСГ', 'МСГ', '108-0093', 'аввалги номи А.Яссавий МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(506, 1, 'Chamanzor MFY', 'Чаманзор МСГ', 'МСГ', '101-0130', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(507, 6, 'Charog\'on MFY', 'Чарогон МСГ', 'МСГ', '106-0067', 'аввалги номи Мустақиллик МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(508, 12, 'Charog\'on MFY', 'Чарогон МСГ', 'МСГ', '112-0031', 'аввалги номи Мустақиллик МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(509, 10, 'Charxnovza MFY', 'Чархновза МСГ', 'МСГ', '110-0093', 'аввалги номи Новза МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(510, 2, 'Chashma MFY', 'Чашма МСГ', 'МСГ', '102-0034', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(511, 8, 'Chig\'atoy Darboza MFY', 'Чигатой дарбоза МСГ', 'МСГ', '108-0140', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(512, 8, 'Chig\'atoy-Oqtepa MFY', 'Чигатой октепа МСГ', 'МСГ', '108-0141', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(513, 3, 'Chilonzor MFY', 'Чилонзор МСГ', 'МСГ', '103-0127', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(514, 8, 'Chilto\'g\'on MFY', 'Чилтугон МСГ', 'МСГ', '108-0142', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(515, 8, 'Chimboy MFY', 'Чимбой МСГ', 'МСГ', '108-0143', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(516, 9, 'Chimyon MFY', 'Чимён МСГ', 'МСГ', '109-0127', 'аввалги номи Янги хаёт МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(517, 9, 'Chingeldi MFY', 'Чингелди МСГ', 'МСГ', '109-0145', 'Қибрай тумани', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(518, 11, 'Chinor MFY', 'Чинор МСГ', 'МСГ', '111-0094', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(519, 6, 'Chorbog\' MFY', 'Чорбог МСГ', 'МСГ', '106-0102', 'аввалги номи Хаётобод МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(520, 12, 'Chorbog\' MFY', 'Чорбог МСГ', 'МСГ', '112-0015', 'аввалги номи Хаётобод МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(521, 10, 'Chorsu MFY', 'Чорсу МСГ', 'МСГ', '110-0110', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(522, 12, 'Chortoq MFY', 'Чорток МСГ', 'МСГ', '112-0008', 'Янгийўл тумани', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(523, 6, 'Choshtepa MFY', 'Чоштепа МСГ', 'МСГ', '106-0081', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(524, 12, 'Choshtepa MFY', 'Чоштепа МСГ', 'МСГ', '112-0023', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(525, 8, 'Chuqursoy MFY', 'Чукурсой МСГ', 'МСГ', '108-0144', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(526, 4, 'Cho\'lpon MFY', 'Чулпон МСГ', 'МСГ', '104-0144', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(527, 3, 'Cho\'pon-ota MFY', 'Чупонота МСГ', 'МСГ', '103-0128', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(528, 8, 'Chustiy MFY', 'Чустий МСГ', 'МСГ', '108-0145', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(529, 7, 'Shayx Shivli MFY', 'Шайх Шивли МСГ', 'МСГ', '107-0133', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(530, 10, 'Shayxontohur MFY', 'Шайхонтохур МСГ', 'МСГ', '110-0112', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(531, 9, 'Shalola MFY', 'Шалола МСГ', 'МСГ', '109-0118', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(532, 3, 'Sharaf MFY', 'Шараф МСГ', 'МСГ', '103-0129', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(533, 1, 'Sharq Guli MFY', 'Шарк Гули МСГ', 'МСГ', '101-0132', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(534, 3, 'Sharq MFY', 'Шарк МСГ', 'МСГ', '103-0130', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(535, 3, 'Sharq tongi MFY', 'Шарк Тонги МСГ', 'МСГ', '103-0131', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(536, 7, 'Sharq xaqiqati MFY', 'Шарк хакикати МСГ', 'МСГ', '107-0134', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(537, 1, 'Sharq Yulduzi MFY', 'Шарк Юлдузи МСГ', 'МСГ', '101-0133', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(538, 11, 'SH.Rashidov MFY', 'Шароф Рашидов МСГ', 'МСГ', '111-0096', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(539, 9, 'Shaxriobod MFY', 'Шахриобод МСГ', 'МСГ', '109-0119', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(540, 9, 'Shaxrisabz MFY', 'Шахрисабз МСГ', 'МСГ', '109-0120', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(541, 7, 'Shaxriston MFY', 'Шахристон МСГ', 'МСГ', '107-0135', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(542, 1, 'Shirin MFY', 'Ширин МСГ', 'МСГ', '101-0134', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(543, 4, 'Shirinobod MFY', 'Ширинобод МСГ', 'МСГ', '104-0135', 'аввалги номи Тараққиёт МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(544, 8, 'Shifokorlar MFY', 'Шифокорлар МСГ', 'МСГ', '108-0146', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(545, 8, 'Shodiyona MFY', 'Шодиёна МСГ', 'МСГ', '108-0147', 'аввалги номи Шодлик МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(546, 10, 'Shodlik MFY', 'Шодлик МСГ', 'МСГ', '110-0113', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(547, 8, 'Shon-Shuxrat MFY', 'Шон-шухрат МСГ', 'МСГ', '108-0148', 'аввалги номи Шухрат МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(548, 10, 'Shofayzi MFY', 'Шофайз МСГ', 'МСГ', '110-0114', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(549, 1, 'Shofayzibog\'i MFY', 'Шофайзбоги МСГ', 'МСГ', '101-0135', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(550, 1, 'Shaftolizor MFY', 'Шофтолизор МСГ', 'МСГ', '101-0136', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(551, 5, 'Shoxjoxon MFY', 'Шохжахон МСГ', 'МСГ', '105-0046', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(552, 4, 'Shohimardon MFY', 'Шохимардон МСГ', 'МСГ', '104-0110', 'аввалги номи Гулистон МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(553, 4, 'Shohsanam MFY', 'Шохсанам МСГ', 'МСГ', '104-0148', 'аввалги номи Янгиобод МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(554, 7, 'Shosh-tepa MFY', 'Шоштепа МСГ', 'МСГ', '107-0132', 'аввалги номи Чош-тепа МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(555, 6, 'Shukrona MFY', 'Шукрона МСГ', 'МСГ', '106-0052', 'аввалги номи Абудурахмон Жомий МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(556, 9, 'Shukur Burxonov MFY', 'Шукур Бурхонов МСГ', 'МСГ', '109-0121', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(557, 9, 'Sho\'rtepa MFY', 'Шуртепа МСГ', 'МСГ', '109-0122', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(558, 3, 'Shuxrat MFY', 'Шухрат МСГ', 'МСГ', '103-0135', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(559, 6, 'Ezgulik MFY', 'Эзгулик МСГ', 'МСГ', '106-0075', 'аввалги номи Тинчлик МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(560, 9, 'Elobod MFY', 'Элобод МСГ', 'МСГ', '109-0130', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(561, 10, 'Eski Jarariq MFY', 'Эски Жарарик МСГ', 'МСГ', '110-0115', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(562, 8, 'Eski shaxar MFY', 'Эски шахар МСГ', 'МСГ', '108-0149', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(563, 10, 'Eshonguzar MFY', 'Эшонгузар МСГ', 'МСГ', '110-0116', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(564, 9, 'Yuzrabot MFY', 'Юзробод МСГ', 'МСГ', '109-0123', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(565, 8, 'Yukori Beshqo\'rg\'on MFY', 'Юкори Бешкургон МСГ', 'МСГ', '108-0101', 'аввалги номи Бешкургон МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(566, 6, 'Yuqori Darhon MFY', 'Юкори дархон МСГ', 'МСГ', '106-0088', 'бывш зангиота', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(567, 8, 'Yuqori Sebzor MFY', 'Юкори Себзор МСГ', 'МСГ', '108-0133', 'аввалги номи Тахтапул МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(568, 11, 'Yuksalish MFY', 'Юксалиш МСГ', 'МСГ', '111-0079', 'аввалги номи Мустақиллик МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(569, 5, 'Yunus Rajabiy MFY', 'Юнус Ражабий МСГ', 'МСГ', '105-0042', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(570, 7, 'Yunusobod MFY', 'Юнусобод МСГ', 'МСГ', '107-0137', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(571, 7, 'Yunus ota MFY', 'Юнусота МСГ', 'МСГ', '107-0138', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(572, 7, 'Yurtobod MFY', 'Юртобод МСГ', 'МСГ', '107-0108', 'аввалги номи Нодирабегим МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(573, 1, 'Yusuf Sakkokiy MFY', 'Юсуф Саккокий МСГ', 'МСГ', '101-0137', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(574, 3, 'Yakkabog\' MFY', 'Яккабог МСГ', 'МСГ', '103-0132', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(575, 5, 'Yakkasaroy MFY', 'Яккасарой МСГ', 'МСГ', '105-0043', 'аввалги Яккасарой-1', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(576, 3, 'Yakkatut MFY', 'Яккатут МСГ', 'МСГ', '103-0115', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(577, 9, 'Yalong\'och MFY', 'Ялангоч МСГ', 'МСГ', '109-0124', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(578, 9, 'Yangi Avayxon MFY', 'Янги Авайхон МСГ', 'МСГ', '109-0126', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(579, 10, 'Yangi Beltepa MFY', 'Янги Белтепа МСГ', 'МСГ', '110-0117', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(580, 6, 'Yangi Bunyodobod MFY', 'Янги Бунёдобод МСГ', 'МСГ', '106-0098', '2021 йил 19 феврал 298/34-6-сонли карор Халк депутатлари кенгаши', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(581, 12, 'Yangi Gulzor MFY', 'Янги Гулзор МСГ', 'МСГ', '112-0012', 'Ўртачирчик тумани (20.08.2022 йилдаги кенгаш карори)', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(582, 4, 'Yangi Davr MFY', 'Янги Давр МСГ', 'МСГ', '104-0145', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(583, 10, 'Yangi Jarariq MFY', 'Янги жарариқ МСГ', 'МСГ', '110-0121', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(584, 10, 'Yangi kamolon MFY', 'Янги Камолон МСГ', 'МСГ', '110-0118', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(585, 9, 'Yangi Kamolot MFY', 'Янги Камолот МСГ', 'МСГ', '109-0143', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(586, 11, 'Yangi Mirobod MFY', 'Янги Миробод МСГ', 'МСГ', '111-0097', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(587, 9, 'Yangi Olmachi MFY', 'Янги Олмачи МСГ', 'МСГ', '109-0144', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(588, 8, 'Yangi Sebzor MFY', 'Янги себзор МСГ', 'МСГ', '108-0150', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(589, 6, 'Yangi Sergeli MFY', 'Янги Сергели МСГ', 'МСГ', '106-0083', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(590, 8, 'Yangi Toshkent MFY', 'Янги Тошкент МСГ', 'МСГ', '108-0117', 'аввалги номи Комилжон Гофуров МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(591, 6, 'Yangi Turmush MFY', 'Янги турмуш МСГ', 'МСГ', '106-0093', '2020 йил 19 август 149/18-6-сонли карор булиниши хисоби', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(592, 12, 'Yangi Turmush MFY', 'Янги турмуш МСГ', 'МСГ', '112-0022', '2020 йил 19 август 149/18-6-сонли карор булиниши хисоби', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(593, 6, 'Yangi Umid MFY', 'Янги Умид МСГ', 'МСГ', '106-0092', 'бывш зангиота', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(594, 12, 'Yangi Umid MFY', 'Янги Умид МСГ', 'МСГ', '112-0002', 'Зангиота тумани', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(595, 6, 'Yangi xayot MFY', 'Янги Хаёт МСГ', 'МСГ', '106-0094', '2020 йил 19 август 149/18-6-сонли карор булиниши хисоби', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(596, 6, 'Yangi Choshtepa MFY', 'Янги Чоштепа МСГ', 'МСГ', '106-0089', 'Чоштепадан ажралди', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(597, 12, 'Yangi Choshtepa MFY', 'Янги Чоштепа МСГ', 'МСГ', '112-0024', 'Чоштепадан ажралди', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(598, 10, 'Yangi shahar MFY', 'Янги шахар МСГ', 'МСГ', '110-0119', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(599, 7, 'Yangiariq MFY', 'Янги-арик МСГ', 'МСГ', '107-0140', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(600, 7, 'Yangibog\' MFY', 'Янгибог МСГ', 'МСГ', '107-0141', 'аввалги номи Янгиобод МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(601, 12, 'Yangi Darxon MFY', 'Янгидархон МСГ', 'МСГ', '112-0001', '2021 йил 19 феврал 298/34-6-сонли карор Халк депутатлари кенгаши аввалги номи Дархон МФЙ, Паст Дархон МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(602, 11, 'Yangi Zamon MFY', 'Янгизамон МСГ', 'МСГ', '111-0098', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(603, 1, 'Yangiyo\'l MFY', 'Янгийул МСГ', 'МСГ', '101-0087', 'аввалги номи Ал-Хоразмий МФЙ', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(604, 11, 'Yangi Qo\'yliq MFY', 'Янги-куйлик МСГ', 'МСГ', '111-0099', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(605, 4, 'Yangiqo\'rg\'on MFY', 'Янгикурғон МСГ', 'МСГ', '104-0146', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(606, 4, 'Yanginur MFY', 'Янгинур МСГ', 'МСГ', '104-0147', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(607, 10, 'Yangi obod MFY', 'Янгиобод МСГ', 'МСГ', '110-0120', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(608, 7, 'Yangitarnov MFY', 'Янгитарнов МСГ', 'МСГ', '107-0143', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(609, 12, 'Yangixayot MFY', 'Янгихаёт МСГ', 'МСГ', '112-0003', 'Зангиота тумани', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(610, 12, 'Yangihayot MFY', 'Янгихаёт МСГ', 'МСГ', '112-0029', '2020 йил 19 август 149/18-6-сонли карор булиниши хисоби', '2024-12-11 18:00:32', '2024-12-11 18:00:32'),
(611, 4, 'Yashnobod MFY', 'Яшнабад МСГ', 'МСГ', '104-0142', NULL, '2024-12-11 18:00:32', '2024-12-11 18:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `token_expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `theme` varchar(30) NOT NULL DEFAULT 'default',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `theme`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@example.com', NULL, '$2y$10$jNtf7LPNqjaRBg34A921NOuGIlRI6TKlDZihNzQnWVHBtysJcEHEa', 'default', 'vR9ALUBuCOV3XZoiLNmJlo6dIiNIzPLTidZ4Nf9MWk5bx8fEtqCR8boTGj20', '2024-12-11 18:00:30', '2024-12-11 18:00:30'),
(2, 'Baholash', 'baholash@gmail.com', NULL, '$2y$10$pdwrMRh2SKgXc/Xx8csX8eunpDgiGVYME38Y48Zmztkny9fla5a/6', 'default', NULL, '2024-12-11 18:00:30', '2024-12-11 18:00:30'),
(3, 'Javohir', 'javohir@tashkentinvest.com', NULL, '$2y$10$qLkY5X3Hr5lOm4bllSJS0..0IFEpWKCPryEll98n3671g6ii3cSr6', 'default', NULL, '2024-12-11 18:00:30', '2024-12-11 18:00:30'),
(4, 'Uchtepa', 'uchtepa@hokimligi.uz', NULL, '$2y$10$8vUfA36U9HifTzkzJKnEQe7SHAO7TeG2ahemC5mpEFX4HfV5OVj1S', 'default', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(5, 'Bektemir', 'bektemir@hokimligi.uz', NULL, '$2y$10$TNpDYZ5yeVijMZgy2SA65.NprC.BkLdqyU7vpY3z7NLpIDAOTcJ.a', 'default', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(6, 'Chilonzor', 'chilonzor@hokimligi.uz', NULL, '$2y$10$rnOl37xqTzGMjnngu55oXO/xUMChBjNtIGx/7G3D69AO1uC9XMB46', 'default', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(7, 'Yashnobod', 'yashnobod@hokimligi.uz', NULL, '$2y$10$kAbvucJFRsyw2cgp5Ad5zuycJmhxUdn43i2PnMZFdQXyrPX.4021i', 'default', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(8, 'Yakkasaroy', 'yakkasaroy@hokimligi.uz', NULL, '$2y$10$c9ngZmrdR6vTi//gjybxe.ykYB/k5dauVXIYdRTgkhp0Gao7zJtga', 'default', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(9, 'Sergeli', 'sergeli@hokimligi.uz', NULL, '$2y$10$gcJx5CZ4kUzm1xa7FV3eP.hjTC80GeqV2mVItmBewY.bRp/awlmm2', 'default', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(10, 'Yunusobod', 'yunusobod@hokimligi.uz', NULL, '$2y$10$xp8gz5yp2kLu0JTWk1wSXeXaes4Y6lmg0ehzHfQ8w2P31SOdy76.i', 'default', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(11, 'Olmazor', 'olmazor@hokimligi.uz', NULL, '$2y$10$JXnHPF.JW4k2gkItwJirTeZNYjVT8.m8wHr6EzmrxYhRi.082aZ7e', 'default', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(12, 'Mirzo Ulugbek', 'mirzo.ulugbek@hokimligi.uz', NULL, '$2y$10$PnzjSEZ5VrHEvcXTFiTX8eJnmdFqDOS/lUutKgEqLl/tbL1IgmVOS', 'default', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(13, 'Shayxontohur', 'shayxontohur@hokimligi.uz', NULL, '$2y$10$rLydRKpfmvNZAzjY/Kug4u26uGUNu0cmhvCxtaOIbQ1wFBWEhBx/S', 'default', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(14, 'Mirobod', 'mirobod@hokimligi.uz', NULL, '$2y$10$5RfEZj0VQw4oAKBSppI5s.tSZWnACNhbG23WjmbLfHWbtxkYCRBxS', 'default', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31'),
(15, 'Yangihayot', 'yangihayot@hokimligi.uz', NULL, '$2y$10$w8LLTPSGo173lrlZBCeP/OpyM/koThYdzlUvxCPsmvC/EuhnapRfW', 'default', NULL, '2024-12-11 18:00:31', '2024-12-11 18:00:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_users`
--
ALTER TABLE `api_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `api_users_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_region_id_foreign` (`region_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_unique_code_unique` (`unique_code`);

--
-- Indexes for table `page_views`
--
ALTER TABLE `page_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_views_ip_address_index` (`ip_address`),
  ADD KEY `page_views_page_url_index` (`page_url`),
  ADD KEY `page_views_country_code_index` (`country_code`),
  ADD KEY `page_views_visited_at_index` (`visited_at`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_tuman_user_id_foreign` (`tuman_user_id`),
  ADD KEY `products_baholash_user_id_foreign` (`baholash_user_id`),
  ADD KEY `products_invest_user_id_foreign` (`invest_user_id`),
  ADD KEY `products_tuman_index` (`tuman`),
  ADD KEY `products_mahalla_index` (`mahalla`),
  ADD KEY `products_manzil_index` (`manzil`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_category_id_foreign` (`category_id`);

--
-- Indexes for table `project_documents`
--
ALTER TABLE `project_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_documents_project_id_foreign` (`project_id`);

--
-- Indexes for table `project_stages`
--
ALTER TABLE `project_stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_stages_project_id_foreign` (`project_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `streets`
--
ALTER TABLE `streets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `streets_district_id_foreign` (`district_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tokens_token_unique` (`token`);

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
-- AUTO_INCREMENT for table `api_users`
--
ALTER TABLE `api_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `project_documents`
--
ALTER TABLE `project_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_stages`
--
ALTER TABLE `project_stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `streets`
--
ALTER TABLE `streets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=612;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_baholash_user_id_foreign` FOREIGN KEY (`baholash_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_invest_user_id_foreign` FOREIGN KEY (`invest_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_tuman_user_id_foreign` FOREIGN KEY (`tuman_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `project_documents`
--
ALTER TABLE `project_documents`
  ADD CONSTRAINT `project_documents_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_stages`
--
ALTER TABLE `project_stages`
  ADD CONSTRAINT `project_stages_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `streets`
--
ALTER TABLE `streets`
  ADD CONSTRAINT `streets_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
