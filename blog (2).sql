-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2021 at 02:12 PM
-- Server version: 5.7.36-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0-male,1-female',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `parent_id`, `name`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'india', '1', 1, '2021-12-08 18:30:00', '2021-12-02 18:30:00'),
(2, 0, 'us', '1', 1, '2021-12-15 18:30:00', '2021-12-16 18:30:00'),
(3, 1, 'Gujarat', '1', 1, '2021-12-15 18:30:00', NULL),
(4, 1, 'Maharashtra', '1', 1, '2021-12-14 18:30:00', '2021-12-09 18:30:00'),
(5, 3, 'Surat', '1', 1, '2021-12-09 18:30:00', NULL),
(6, 3, 'Ahmedabad', '1', 1, '2021-12-22 18:30:00', NULL),
(7, 3, 'Rajkot', '1', 1, '2021-12-22 18:30:00', NULL),
(8, 4, 'Mumbai', '1', 1, '2021-12-22 18:30:00', NULL),
(9, 4, 'pune', '1', 1, '2021-12-22 18:30:00', NULL),
(10, 2, 'California', '1', 1, '2021-12-22 18:30:00', NULL),
(11, 2, 'New York', '1', 1, '2021-12-22 18:30:00', NULL),
(12, 10, 'Los Angeles', '1', 1, '2021-12-22 18:30:00', NULL),
(13, 10, 'San Diego', '1', 1, '2021-12-22 18:30:00', NULL),
(14, 11, 'Oneonta', '1', 1, '2021-12-22 18:30:00', NULL),
(15, 11, 'Middletown', '1', 1, '2021-12-22 18:30:00', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_11_121229_create_roles_table', 1),
(8, '2021_12_13_090143_location', 3),
(10, '2014_10_12_000000_create_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('parulvaghela9537@gmail.com', '$2y$10$/buDXPQeg5xTn3kMDlu7GuZZhw/fi27J1fOelHNGMlgFi4Cx3RW7C', '2021-12-20 03:46:09');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2021-12-08 18:30:00', '2021-12-30 18:30:00'),
(2, 'user1', 'user1', '2021-12-14 00:45:16', '2021-12-14 00:45:16'),
(3, 'user2', 'user2', '2021-12-14 00:45:23', '2021-12-14 00:45:23'),
(4, 'sdfds', 'dfdsf', '2021-12-14 05:33:59', '2021-12-14 05:33:59'),
(5, 'fvdfv', 'dfdf', '2021-12-14 05:34:02', '2021-12-14 05:34:02'),
(6, 'fdfvd', 'fdf', '2021-12-14 05:34:05', '2021-12-14 05:34:05'),
(7, 'ffvgdf', 'fvgdfgvdfgdf', '2021-12-14 05:34:08', '2021-12-14 05:34:08'),
(8, 'hello', 'fvgdfgvdfgdf', '2021-12-14 05:35:15', '2021-12-14 05:35:15'),
(9, 'hellogbhf', 'gfbhg', '2021-12-14 05:35:21', '2021-12-14 05:35:21'),
(10, 'gfbhgbh', 'fgbhfg', '2021-12-14 05:35:24', '2021-12-14 05:35:24'),
(11, 'fgbhfg', 'fgbhfg', '2021-12-14 05:35:28', '2021-12-14 05:35:28'),
(12, 'fgfgf', 'gfg', '2021-12-14 05:35:31', '2021-12-14 05:35:31'),
(13, 'gbhfg', 'gfg', '2021-12-14 05:35:34', '2021-12-14 05:35:34'),
(14, 'fghfg', 'ghfg', '2021-12-14 05:35:37', '2021-12-14 05:35:37'),
(15, 'ghbfgbh', 'fgbhfg', '2021-12-14 05:35:44', '2021-12-14 05:35:44'),
(16, 'fgbhfgghfg', 'fgfg', '2021-12-14 05:35:50', '2021-12-14 05:35:50'),
(17, 'gfbhfgfgfg', 'fghfgfg', '2021-12-14 05:35:54', '2021-12-14 05:35:54'),
(18, 'gfghfg', 'fghfhfhf', '2021-12-14 05:35:58', '2021-12-14 05:35:58'),
(19, 'ghbfgbfgfgh', 'fvgdfgvdfgdf', '2021-12-14 05:36:05', '2021-12-14 05:36:05'),
(20, 'ghhhhhhhhhhhhhhhh', 'sfdsdsds', '2021-12-14 05:36:08', '2021-12-14 05:36:08'),
(21, 'hhhhhhhhhhhhhh', 'hhhhhhhhhh', '2021-12-14 05:36:12', '2021-12-14 05:36:12'),
(22, 'helloiiiii', 'kkkkkhkjh', '2021-12-14 05:56:56', '2021-12-14 05:56:56'),
(23, 'hellosdxsds', 'dsdsd', '2021-12-17 00:00:59', '2021-12-17 00:00:59'),
(24, 'aaaa', 'gbfgg', '2021-12-17 00:02:57', '2021-12-17 00:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '0-male,1-female',
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filepath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0-delete,1-exist',
  `active_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0-active,1-decative',
  `addedby` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `gender`, `city`, `state`, `country`, `email_verified_at`, `password`, `filepath`, `status`, `active_status`, `addedby`, `remember_token`, `forget_code`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 'admin@gmail.com', 0, 0, 0, 0, NULL, '$2y$10$3ulgJUk./2iLAlymg5HB3.x/YFssTD9mYspQjV00NctdNtQoAXy12', 'uploads/1639460927download.jpeg', 1, 1, 1, 'KIZrZOYTsMTjv4nC3lmCjk5qcaJgilUvJMWsxuzQsDdoRIHQWYt27y2xFRAk', NULL, '2021-12-14 00:18:47', '2021-12-14 00:18:47'),
(2, 'hellouser1', 2, 'hellouser1@gmail.com', 0, 13, 10, 2, NULL, '$2y$10$mINXvriMB1WfNiNZT8ahl.qanZ24BNeXWM16FbfnpK4TBN16IYI.u', 'uploads/1639462629download (1).jpeg', 1, 1, 1, NULL, NULL, '2021-12-14 00:47:09', '2021-12-14 03:21:28'),
(3, 'hellouser2', 3, 'hellouser2', 1, 5, 3, 1, NULL, '$2y$10$fS2DGlcwOP/qqhv/1Lckseu6XfNR4ySJ3bQG3mW8k.43fAOfoBIK2', 'uploads/1639462722download (1).jpeg', 1, 1, 1, NULL, NULL, '2021-12-14 00:48:42', '2021-12-14 03:21:45'),
(4, 'user', 2, 'sdsfcsdf@gmail.com', 0, 13, 10, 2, NULL, '$2y$10$kVXDGqlwQO4Pr5JLd/WSEeC/EzbU4C3MVfi9dnPX9oplFPh8BB8Au', 'uploads/1639732286tree-736885__480.jpg', 1, 1, 1, NULL, NULL, '2021-12-17 03:41:27', '2021-12-17 03:41:27'),
(5, 'parul', 1, 'parulvaghssla9537@gmail.com', 1, 6, 3, 1, NULL, '$2y$10$QDdwq5cJi1.GsBPMrpvqoOp8mDJshK8fSKbfBerDsjrVzvWfWWTgG', 'uploads/1639733080download (1).jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 03:54:40', '2021-12-17 03:54:40'),
(6, 'user', 2, 'parulvaghdddela9537@gmail.com', 1, 6, 3, 1, NULL, '$2y$10$OXuesDph7SkazwInMavdw.ijsFKPE5xzuIT/qHBoM660C7vEb65Gy', 'uploads/1639733214download (1).jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 03:56:54', '2021-12-17 03:56:54'),
(7, 'gfgbhfg', 1, 'parulvagheddla9537@gmail.com', 1, 5, 3, 1, NULL, '$2y$10$hiBe5yTMtmZMED9SsWA9FuDFJPEgggaJLAuKje7VoS.yI3yA482D2', 'uploads/1639733330download (1).jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 03:58:50', '2021-12-17 03:58:50'),
(8, 'ghbfgbh', 2, 'admggggggggggggin@gmail.com', 0, 8, 4, 1, NULL, '$2y$10$aHMRetojEDZ71gG99ZsdYu6Y5AvxTfvRksFf2T6M2mEYwfwrR8Kxa', 'uploads/1639733428download (1).jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 04:00:28', '2021-12-17 04:00:28'),
(9, 'user', 2, 'parsssssulvaghela9537@gmail.com', 0, 5, 3, 1, NULL, '$2y$10$Qfu3P1.jcHYU8j57Z/R8h.vPDtoEzWeCYm3gvhw69oLFHJ/6.ixFi', 'uploads/1639733461download.jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 04:01:01', '2021-12-17 04:01:01'),
(10, 'fgdf', 3, 'parrrulvaghela9537@gmail.com', 0, 12, 10, 2, NULL, '$2y$10$QzmZC.54KWo2Wqv9IyfN2OWAJErj0IEFOYal39PaTVBljLzo5Oplm', 'uploads/1639736565download.jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 04:52:45', '2021-12-17 04:52:45'),
(11, 'fgdf', 3, 'paruffflvaghela9537@gmail.com', 0, 12, 10, 2, NULL, '$2y$10$VHvnZMvRUF5Ok8vfVOZQpO5d5Q3mgXeDYR6Merfcq4N58Medznv1W', 'uploads/1639736687download.jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 04:54:47', '2021-12-17 04:54:47'),
(12, 'sdfsdf', 2, 'parulvadddghela9537@gmail.com', 1, 5, 3, 1, NULL, '$2y$10$Y1p8pt5LKSt5dw1wNgn3Y.jtj4mcomaLQCd5Y/vf2P501hnxIXIf.', 'uploads/1639736793tree-736885__480.jpg', 0, 1, 1, NULL, NULL, '2021-12-17 04:56:33', '2021-12-21 04:16:25'),
(13, 'gbh', 2, 'ggguser@gmail.com', 1, 5, 3, 1, NULL, '$2y$10$Hy6vRtAm/tEFd43K0.onOua7li9A94N3xNbqZOXdaLT9GAFfKkpJu', 'uploads/1639737035download.jpeg', 0, 1, 1, NULL, NULL, '2021-12-17 05:00:35', '2021-12-21 03:57:19'),
(14, 'fsdsd', 1, 'hellofffuser1@gmail.com', 1, 5, 3, 1, NULL, '$2y$10$hmziQp5DeceCzR27DAkuKOO0o5UgmbbtBuklSj.zY5vWDFgM9VXd6', 'uploads/1639737184download.jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 05:03:04', '2021-12-17 05:03:04'),
(15, 'ffgvfdf', 1, 'sdsfffffcsdf@gmail.com', 1, 5, 3, 1, NULL, '$2y$10$VWJKmLZdByYPe.5Nn.KFVOE2FByrNuxZqjO8J2B/65dWwzuF8gzQG', 'uploads/1639740151download (1).jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 05:52:31', '2021-12-17 05:52:31'),
(16, 'dfgvdf', 1, 'dfdgf@gmail.com', 1, 5, 3, 1, NULL, '$2y$10$zJzTsxZuihoREbxcvvBpqOJWG8AkOzQJk5vrrAs2PwDH8lMtEeyoK', 'uploads/1639740243download (1).jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 05:54:03', '2021-12-17 05:54:03'),
(17, 'fffvf', 1, 'parulvaghela9537@gmail.com', 1, 5, 3, 1, NULL, '$2y$10$LasAAY.j14j.bgU5qL7GRuPLpplh/YKWuh.3oosXaLBD.0IhIo0BC', 'uploads/1639740322download.jpeg', 1, 1, 1, NULL, '', '2021-12-17 05:55:22', '2021-12-20 06:00:01'),
(18, 'bvgfg', 1, 'bfgfgf', 1, 6, 3, 1, NULL, '$2y$10$uWQgmYUkt811DhfJCGPxreO8iBm1GUZvAw1dFeKZ6apRMX6neaHSe', 'uploads/1639742383download (1).jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 06:29:43', '2021-12-17 06:29:43'),
(20, 'vdxfvfdf', 1, 'vfdfvgdf@gmail.com', 1, 5, 3, 1, NULL, '$2y$10$7kohH3bVd3hDZLd05/zX5Ob5pSFcITEPRuahT4cuNVhuuQF88se1a', 'uploads/1639742474download (1).jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 06:31:14', '2021-12-17 06:31:14'),
(22, 'dfdf', 1, 'dgdfgvdf@gmail.com', 1, 5, 3, 1, NULL, '$2y$10$fFD9.g5zybuHb3tE8KNa9ekgkZyQsSCkYqcv6iD3b5y5KWOVAZ5Z2', 'uploads/1639742729download.jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 06:35:29', '2021-12-17 06:35:29'),
(24, 'fgvdfvgdf', 1, 'dfgdfgvd@gmail.com', 1, 5, 3, 1, NULL, '$2y$10$wI59m9Q7i5f037/RTbATheedqvWnVzK94wQktTk70x9BEfrqdKmE6', 'uploads/1639742862download (1).jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 06:37:42', '2021-12-17 06:37:42'),
(26, 'fdvgfgvd', 1, 'fvgdf@gmail.com', 0, 12, 10, 2, NULL, '$2y$10$sMRX4GXvxYPE0kaVC6jkIeDcXYoBNXimRLGoHgIm193p6zlW3nipi', 'uploads/1639742905tree-736885__480.jpg', 1, 1, 1, NULL, NULL, '2021-12-17 06:38:25', '2021-12-17 06:38:25'),
(27, 'sdfvdsfv', 1, 'ghhjbjmh', 1, 5, 3, 1, NULL, '$2y$10$dLiLz30QrmZX3Gje1Ys/y.fT0uW5AwZsPmTFEQPv.z4woTJ1CaSse', 'uploads/1639743486download (1).jpeg', 1, 1, 1, NULL, NULL, '2021-12-17 06:48:06', '2021-12-17 06:48:06'),
(28, 'fhbgfg', 2, 'fgfgf', 1, 5, 3, 1, NULL, '$2y$10$RgyBckvapbpoFZvIcT2Do.O2gCZ3aOY34sg94sWsgeprRqqzsESqa', 'uploads/1639744183download (1).jpeg', 0, 1, 1, NULL, NULL, '2021-12-17 06:59:43', '2021-12-21 04:01:35'),
(29, 'dfgbdfd', 2, 'fdfgdf', 0, 5, 3, 1, NULL, '$2y$10$513ptQeC/z8SFDohgMPi9uS3bQp85LKZ3.OuxNunDLSs721pKzA9m', 'uploads/1639744599tree-736885__480.jpg', 0, 1, 1, NULL, NULL, '2021-12-17 07:06:39', '2021-12-21 04:17:08'),
(30, 'fghbfg', 1, 'hnfghfghf', 1, 5, 3, 1, NULL, '$2y$10$.Et/7gYzum6yq2maou3F6.4E/22HVdaOn9mBG.Z.IfMc7z3EReL9i', 'uploads/1639746112tree-736885__480.jpg', 1, 1, 1, NULL, NULL, '2021-12-17 07:31:52', '2021-12-17 07:31:52'),
(32, 'hfghbfgh', 2, 'fghfgh', 0, 5, 3, 1, NULL, '$2y$10$Q6mNTWDCs9GPq.2S1FiqyOaSx835MPaKCN./pa321TXw.b/NeskSu', 'uploads/1639746170tree-736885__480.jpg', 0, 1, 1, NULL, NULL, '2021-12-17 07:32:50', '2021-12-21 04:16:56'),
(34, 'bhfghfg', 1, 'gfgf', 1, 5, 3, 1, NULL, '$2y$10$y.q92tnUDY9j56LyB52.9eb1D/r/6UW4clQcYY66racrmhEAlKAsW', 'uploads/1639746262tree-736885__480.jpg', 1, 1, 1, NULL, NULL, '2021-12-17 07:34:22', '2021-12-17 07:34:22'),
(35, 'vivebom', 1, 'vivebom122@swsguide.com', 0, 0, 0, 0, NULL, '$2y$10$jpzubz3aT.gsYGRgChWytuR2nvyav8yam2FPKneFCZIZRamAN6yUu', 'uploads/1639993828download (1).jpeg', 1, 1, 1, NULL, NULL, '2021-12-20 04:20:28', '2021-12-20 04:25:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
