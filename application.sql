-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 05:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `basics`
--

CREATE TABLE `basics` (
  `basic_id` bigint(20) UNSIGNED NOT NULL,
  `basic_title` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_subtitle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_flogo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basics`
--

INSERT INTO `basics` (`basic_id`, `basic_title`, `basic_subtitle`, `basic_details`, `basic_logo`, `basic_favicon`, `basic_flogo`, `basic_status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin Dashboard', NULL, 'logo_1613817418.jpg', 'favicon_1613817419.png', 'flogo_1613817419.png', 1, NULL, '2021-02-20 10:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(10) UNSIGNED NOT NULL,
  `expcate_id` int(11) NOT NULL,
  `expense_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_date` date NOT NULL,
  `expense_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `expcate_id`, `expense_details`, `expense_amount`, `expense_date`, `expense_slug`, `expense_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'good', '300', '2021-07-16', '1626701564-good', 1, '2021-07-19 13:32:44', NULL),
(2, 1, '...', '10', '2021-07-28', '1627722281-', 1, '2021-07-31 09:04:41', NULL),
(3, 2, 'good', '10000', '2022-01-27', '1643362748-good', 1, '2021-09-12 05:00:18', '2022-01-28 09:39:08'),
(4, 1, 'Well', '5000', '2022-01-22', '1643362616-well', 1, '2021-10-23 11:30:58', '2022-01-28 09:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `expcate_id` bigint(20) UNSIGNED NOT NULL,
  `expcate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expcate_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expcate_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expcate_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`expcate_id`, `expcate_name`, `expcate_remarks`, `expcate_slug`, `expcate_status`, `created_at`, `updated_at`) VALUES
(1, 'Book', '...', '1626701537-book', 1, '2021-07-19 13:32:17', NULL),
(2, 'Laptop', '...', '1631422787-laptop', 1, '2021-09-12 04:59:47', NULL);

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
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `income_id` int(10) UNSIGNED NOT NULL,
  `incate_id` int(11) NOT NULL,
  `income_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income_date` date NOT NULL,
  `income_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`income_id`, `incate_id`, `income_details`, `income_amount`, `income_date`, `income_slug`, `income_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Good', '50000', '2021-08-12', '1626701509-good', 1, '2021-07-19 13:31:49', NULL),
(2, 2, '...', '20', '2021-08-12', '1627722204-', 1, '2021-07-31 09:03:24', NULL),
(3, 2, 'good', '2000', '2021-09-12', '1631422753-good', 1, '2021-09-12 04:59:13', NULL),
(4, 2, 'Well', '3000', '2021-10-23', '1634988548-well', 1, '2021-10-23 11:29:08', NULL),
(5, 3, 'Mobile', '20000', '2022-01-21', '1643362709-mobile', 1, '2022-01-28 09:34:12', '2022-01-28 09:38:29'),
(6, 5, 'Laptop', '5000', '2022-01-24', '1643362580-laptop', 1, '2022-01-28 09:34:33', '2022-01-28 09:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `income_categories`
--

CREATE TABLE `income_categories` (
  `incate_id` int(10) UNSIGNED NOT NULL,
  `incate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incate_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incate_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incate_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_categories`
--

INSERT INTO `income_categories` (`incate_id`, `incate_name`, `incate_remarks`, `incate_slug`, `incate_status`, `created_at`, `updated_at`) VALUES
(1, 'zumon', '..', '1614258605-zumon', 1, '2021-08-12 13:10:05', NULL),
(2, 'Laptop', 'good Product', '1626701454-laptop', 1, '2021-08-12 13:30:54', NULL),
(3, 'Mobile', NULL, '1626701462-mobile', 1, '2021-07-19 13:31:02', NULL),
(4, 'Mobile', '...', '1631422716-mobile', 1, '2021-09-12 04:58:36', NULL),
(5, 'Laptop', 'good', '1634988469-laptop', 1, '2021-10-23 11:27:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loaners`
--

CREATE TABLE `loaners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_25_080056_create_income_categories_table', 1),
(5, '2021_01_25_105923_create_incomes_table', 1),
(6, '2021_01_25_150855_create_expense_categories_table', 1),
(7, '2021_01_25_193955_create_expenses_table', 1),
(8, '2021_01_26_123003_create_loaners_table', 1),
(9, '2021_01_28_123607_create_basics_table', 1),
(10, '2021_02_05_154223_create_admins_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `status`, `pic`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Zumon Hossain', 'zumonhossain10@gmail.com', NULL, NULL, '$2y$10$OTtEYbHfCIpuIJTe8D5W2uWkOicGTAFqKa9h.Vihizwst.p2FENoS', 1, NULL, NULL, '2021-09-12 04:56:00', '2021-09-12 04:56:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basics`
--
ALTER TABLE `basics`
  ADD PRIMARY KEY (`basic_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`expcate_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `income_categories`
--
ALTER TABLE `income_categories`
  ADD PRIMARY KEY (`incate_id`);

--
-- Indexes for table `loaners`
--
ALTER TABLE `loaners`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `basics`
--
ALTER TABLE `basics`
  MODIFY `basic_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `expcate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `income_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `income_categories`
--
ALTER TABLE `income_categories`
  MODIFY `incate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loaners`
--
ALTER TABLE `loaners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
