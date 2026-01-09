-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2026 at 05:32 PM
-- Server version: 8.4.2
-- PHP Version: 8.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestbook_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-admin@battuta.co.id|127.0.0.1', 'i:2;', 1767969241),
('laravel-cache-admin@battuta.co.id|127.0.0.1:timer', 'i:1767969241;', 1767969241),
('laravel-cache-admin@guestbook.ac.id|127.0.0.1', 'i:2;', 1766995442),
('laravel-cache-admin@guestbook.ac.id|127.0.0.1:timer', 'i:1766995442;', 1766995442);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `event_category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` int NOT NULL DEFAULT '100',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_category_id`, `title`, `description`, `event_date`, `location`, `quota`, `created_at`, `updated_at`) VALUES
(2, 1, 'Bisik (Baca Buku Asik)', 'baca buku asik dengan diskusi dan perform personal branding dari peserta', '2026-01-10 08:00:00', 'Pos Bloc Medan', 10, '2026-01-07 20:44:59', '2026-01-09 10:09:48'),
(3, 2, 'Temu Ramah Mahasiswa Fakultas Teknologi', 'temu ramah mahasiswa membahas pengenalan program studi, fakultas struktural dll.', '2026-01-10 09:00:00', 'Ruang Seminar Universitas Battuta', 10, '2026-01-07 20:49:23', '2026-01-09 10:10:17'),
(4, 2, 'Workshop Pembuatan Ludo', 'Ada deh', '2026-01-16 15:32:00', 'Battuta', 20, '2026-01-08 01:33:03', '2026-01-08 01:33:03'),
(5, 1, 'Tausiyah Menyambut Bulan Ramadhan', 'pokonya datang aja lah', '2026-01-12 08:30:00', 'Masjid Qonitin', 15, '2026-01-08 02:46:53', '2026-01-09 07:51:43'),
(6, 2, 'Rapat UKM', 'rapat aja pokonya', '2026-01-12 21:25:00', 'Universitas Battuta', 10, '2026-01-08 07:27:33', '2026-01-08 07:27:33'),
(7, 1, 'Seminar Pengembangan diri', 'seminar lah pokoknya', '2026-01-16 09:00:00', 'Gedung Serba Guna', 20, '2026-01-08 07:50:25', '2026-01-08 07:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Umum', '2025-12-26 02:51:36', '2025-12-26 02:51:36'),
(2, 'Mahasiswa', '2025-12-26 02:51:36', '2025-12-26 02:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_21_072746_event_categories', 1),
(5, '2025_12_21_104015_create_events_table', 1),
(6, '2025_12_21_104042_create_registrations_table', 1),
(7, '2025_12_22_072825_student_details', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@guestbook.co.id', '$2y$12$4x8xELtnjsikf9bVNZDq7eLPPi9NW2ZdA1fqNapSXhDF8uwtVNvEK', '2025-12-29 01:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_attended` tinyint(1) NOT NULL DEFAULT '0',
  `attended_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `event_id`, `name`, `email`, `whatsapp`, `qr_code_token`, `is_attended`, `attended_at`, `created_at`, `updated_at`) VALUES
(5, 2, 'Jihan', 'jihan@gmail.com', '08883536836', 'F4vNieAIla', 0, NULL, '2026-01-09 00:10:19', '2026-01-09 00:10:19'),
(6, 2, 'Andre Admaja', 'andre@gmail.com', '08135536836', 'JbdlCSfMqv', 0, NULL, '2026-01-09 00:12:56', '2026-01-09 00:12:56'),
(7, 2, 'Davita', 'davita@gmail.com', '0895603255245', '82AG162HY5', 0, NULL, '2026-01-09 00:17:00', '2026-01-09 00:17:00'),
(8, 2, 'Lia', 'lia@gmail.com', '0895803254245', 'wpm45C69iI', 0, NULL, '2026-01-09 00:18:20', '2026-01-09 00:18:20'),
(9, 2, 'Kiky', 'kiky@gmail.com', '082363720188', 'HjEw6NOznN', 0, NULL, '2026-01-09 00:20:04', '2026-01-09 00:20:04'),
(10, 2, 'intan', 'intan@gmail.com', '087219864873', 'JyCU0YqUZo', 0, NULL, '2026-01-09 00:22:38', '2026-01-09 00:22:38'),
(11, 2, 'Mayang', 'mayang@gmail.com', '082342516354', 'IXcTcCeZg4', 0, NULL, '2026-01-09 00:23:42', '2026-01-09 00:23:42'),
(12, 2, 'Dina', 'dina@gmail.com', '082342517354', 'tgl5puRXSR', 0, NULL, '2026-01-09 00:37:07', '2026-01-09 00:37:07'),
(13, 2, 'Andi Pratama', 'andi.pratama@gmail.com', '081234567801', 'NlA1S90sZ5', 0, NULL, '2026-01-09 00:55:52', '2026-01-09 00:55:52'),
(14, 2, 'Santoso', 'udi.santoso@yahoo.com', '081345678902', '9en1rOT8CY', 0, NULL, '2026-01-09 00:56:32', '2026-01-09 00:56:32'),
(24, 5, 'Yanto Subagio', 'yanto.s@outlook.com', '081356789025', 'lQbU8vJu7m', 0, NULL, '2026-01-09 01:25:12', '2026-01-09 01:25:12'),
(25, 5, 'Zainal Abidin', 'zainal.abidin@gmail.com', '087890123426', 'gOipITbKIK', 0, NULL, '2026-01-09 01:26:24', '2026-01-09 01:26:24'),
(26, 5, 'Aditya Nugraha', 'aditya.nugraha@yahoo.com', '089601234527', 'X5DnWq7F9I', 0, NULL, '2026-01-09 01:26:57', '2026-01-09 01:26:57'),
(27, 5, 'Bella Saphira', 'bella.s@gmail.com', '081267890128', 'GVaNzMlQjS', 0, NULL, '2026-01-09 01:27:42', '2026-01-09 01:27:42'),
(28, 5, 'Candra Wijaya', 'candra.w@hotmail.com', '082123456729', 'IwAr1MgpZN', 0, NULL, '2026-01-09 01:28:10', '2026-01-09 01:28:10'),
(29, 5, 'Dian Sastro', 'dian.sastro@gmail.com', '085634567830', '8prru10RSH', 0, NULL, '2026-01-09 01:28:47', '2026-01-09 01:28:47'),
(30, 5, 'Erwin Gutawa', 'erwin.gutawa@yahoo.com', '081945678931', '3ZRsWFjfGz', 0, NULL, '2026-01-09 01:31:32', '2026-01-09 01:31:32'),
(31, 5, 'Farah Quinn', 'arah.quinn@gmail.com', '081356789032', 'XC4LJ83bOz', 0, NULL, '2026-01-09 01:32:06', '2026-01-09 01:32:06'),
(32, 3, 'Maudy Ayunda', 'maudy.a@univ.ac.id', '082156789063', 'AIBg9Sc2lH', 0, NULL, '2026-01-09 02:17:39', '2026-01-09 02:17:39'),
(33, 3, 'Nicholas Saputra', 'nicholas.s@univ.ac.id', '085789012364', 'N0bIgJLJA2', 0, NULL, '2026-01-09 02:23:58', '2026-01-09 02:23:58'),
(34, 3, 'Pevita Pearce', 'pevita.p@univ.ac.id', '081267890166', 'KhUexXl3F5', 0, NULL, '2026-01-09 02:25:13', '2026-01-09 02:25:13'),
(35, 3, 'Qibil Changcuters', 'qibil.c@univ.ac.id', '087789012367', 'GudQBWeaYQ', 0, NULL, '2026-01-09 02:26:21', '2026-01-09 02:26:21'),
(36, 3, 'Reza Rahadian', 'reza.r@univ.ac.id', '081390123468', 'JHKnaQkJSl', 0, NULL, '2026-01-09 02:28:36', '2026-01-09 02:28:36'),
(37, 3, 'Sherina Munaf', 'sherina.m@univ.ac.id', '082363720180', 'o5FzeLKzxR', 0, NULL, '2026-01-09 02:33:23', '2026-01-09 02:33:23'),
(38, 3, 'Yuki Kato', 'yuki.k@univ.ac.id', '081356789075', 'ICXNFr12pY', 0, NULL, '2026-01-09 02:35:52', '2026-01-09 02:35:52'),
(39, 5, 'Novri', 'novri@gmail.com', '082363720188', 'EntyEvyBgD', 0, NULL, '2026-01-09 07:49:13', '2026-01-09 07:49:13'),
(40, 5, 'dimas', 'dimas@gmail.com', '08326574874', '6LjbpdIWr3', 0, NULL, '2026-01-09 07:50:21', '2026-01-09 07:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LXM8hkK4amP6fdPLZYFPAmfT1mLupXVAGXDbTuln', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY2tvZTlPMEJPYlFVaGdCbzRIMGFrb2JKR29IbWJjMUltdDg5b1lzZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vZ3Vlc3Rib29rLWFwcC50ZXN0L2V2ZW50cyI7czo1OiJyb3V0ZSI7czoxMjoiZXZlbnRzLmluZGV4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1767979043);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` bigint UNSIGNED NOT NULL,
  `registration_id` bigint UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `registration_id`, `nim`, `university`, `major`, `semester`, `created_at`, `updated_at`) VALUES
(1, 32, '2106345124', 'Universitas battuta', 'Teknik Informatika', 5, '2026-01-09 02:17:39', '2026-01-09 02:17:39'),
(2, 33, '190100001', 'Universitas battuta', 'Teknik Informatika', 5, '2026-01-09 02:23:58', '2026-01-09 02:23:58'),
(3, 34, '2301890123', 'Universitas battuta', 'Desain Kom. Visual', 5, '2026-01-09 02:25:13', '2026-01-09 02:25:13'),
(4, 35, '1101190001', 'Universitas battuta', 'Sistem Informasi', 5, '2026-01-09 02:26:21', '2026-01-09 02:26:21'),
(5, 36, '21100012', 'Universitas Indonesia', 'Teknik Informatika', 5, '2026-01-09 02:28:36', '2026-01-09 02:28:36'),
(6, 37, '0101119001', 'Universitas Indonesia', 'Teknik Informatika', 5, '2026-01-09 02:33:23', '2026-01-09 02:33:23'),
(7, 38, '1920224100', 'Universitas battuta', 'Teknik Informatika', 5, '2026-01-09 02:35:52', '2026-01-09 02:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@guestbook.co.id', '2025-12-26 02:51:35', '$2y$12$5xZfH0gS5lZqfdT5z/iqwuPPHN7rpEkYg.eV6ZdJksVhXiIaEDX2e', '0P3daYpCGFUtVhlVAKTpeV89q6wApjdhkO4V6qdzfsp4oaOZ6XEzF9osEN8v', '2025-12-26 02:51:36', '2025-12-26 02:53:09');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_event_category_id_foreign` (`event_category_id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registrations_qr_code_token_unique` (`qr_code_token`),
  ADD KEY `registrations_event_id_foreign` (`event_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_details_registration_id_foreign` (`registration_id`);

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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_event_category_id_foreign` FOREIGN KEY (`event_category_id`) REFERENCES `event_categories` (`id`);

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
  ADD CONSTRAINT `student_details_registration_id_foreign` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
