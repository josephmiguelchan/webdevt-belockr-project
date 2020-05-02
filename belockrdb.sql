-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 07:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belockrdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockers`
--

CREATE TABLE `lockers` (
  `locker_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lockers`
--

INSERT INTO `lockers` (`locker_id`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 18:23:41'),
(2, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 18:23:41'),
(3, 'TAFT 4th', 'Closed', '2020-04-30 18:23:41', '2020-05-01 20:24:20'),
(4, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-05-01 20:20:36'),
(5, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 23:36:34'),
(6, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 18:23:41'),
(7, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 18:23:41'),
(8, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 18:23:41'),
(9, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 18:23:41'),
(10, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 18:23:41'),
(11, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 18:23:41'),
(12, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 18:23:41'),
(13, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-05-01 16:50:09'),
(14, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 18:23:41'),
(15, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 18:23:41'),
(16, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 18:23:41'),
(17, 'TAFT 4th', 'Open', '2020-04-30 18:23:41', '2020-04-30 18:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userlevel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2020_04_25_151211_create_failed_jobs_table', 1),
(2, '2020_04_25_152320_create_users_table', 1),
(3, '2020_04_26_090130_create_logins_table', 1),
(4, '2020_04_30_143803_create_transactions_table', 2),
(5, '2020_04_30_144546_create_transactions_table', 3),
(6, '2020_04_30_150506_create_transactions_table', 4),
(7, '2020_05_01_000402_create_lockers_table', 5),
(8, '2020_05_01_000738_create_students_table', 6),
(9, '2020_05_01_015749_create_lockers_table', 7),
(10, '2020_05_01_031011_create_staff_table', 8),
(11, '2020_05_02_041603_create_staff_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `staff_code` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_code`, `first_name`, `middle_name`, `last_name`, `email`, `status`, `created_at`, `updated_at`) VALUES
(6, '36a13aee-58b9-4bc0-bb56-ccf366944e68', 'Janice', 'De Leon', 'Soriano', 'jansoriano@benilde.edu.ph', 'Active', '2020-05-01 20:16:24', '2020-05-01 20:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `student_code` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_code`, `first_name`, `middle_name`, `last_name`, `course`, `year_level`, `email`, `created_at`, `updated_at`) VALUES
(11817284, '367ebdab-2b88-47ca-a095-1eac28983b21', 'Rosa', 'Lin', 'Da', 'Bachelor of Science in Business Administration (BSBA) major in Business Intelligence and Analytics', '1', 'rosa.da@benilde.edu.ph', '2020-05-01 16:28:13', '2020-05-01 16:28:13'),
(11817466, '916d07c5-61f6-4deb-9736-aab8a3bd0163', 'Joseph Miguel', 'Lumbao', 'Chan', 'Bachelor of Science in Information Systems', '2', 'josephmiguel.chan@benilde.edu.ph', '2020-04-30 17:44:52', '2020-04-30 17:44:52'),
(11818167, '61aeef38-45d4-4544-aade-c2e579dcece2', 'Edryl Dominique', 'Briones', 'Reyes', 'Bachelor of Science in Information Systems', '2', 'edryldominique.reyes@benilde.edu.ph', '2020-05-01 16:29:26', '2020-05-01 16:29:26'),
(11818256, 'da430fb0-f786-4409-96d1-7f24e0a4a444', 'Aira Mae', 'Laron', 'Sumagui', 'Bachelor of Science in Information Systems', '2', 'airamae.sumagui@benilde.edu.ph', '2020-05-01 04:41:26', '2020-05-01 16:30:54'),
(11818518, '5df8195f-0cde-41d7-b58c-3d12906b7c3b', 'Ma. Sophia Ann', 'Manaois', 'Endaya', 'Bachelor of Science in Information Systems', '2', 'masophiaann.endaya@benilde.edu.ph', '2020-05-01 16:30:36', '2020-05-01 16:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `locker_id` int(11) NOT NULL,
  `step` decimal(2,1) NOT NULL,
  `receipt_img` blob DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `code`, `student_id`, `locker_id`, `step`, `receipt_img`, `status`, `comment`, `staff_id`, `created_at`, `updated_at`) VALUES
(11817468, '90d0e0de-d79f-4796-8ebf-b0524483180d', 11817284, 3, '2.1', NULL, 'Reservation Declined', 'Upon review of your reservation status, you are not eligible for locker rental reservation this term. Please email us if you think there has been a mistake.', 6, '2020-04-30 12:43:02', '2020-04-30 23:35:29'),
(11817470, 'f89737bf-c005-4e77-98df-2a5d8efdc75b', 11972831, 7, '3.1', NULL, 'Reservation Declined', 'Your receipt was reviewed by our staff and we have found that your receipt no. does not match any transaction record in the finance department. Kindly double check and reupload your receipt no.', 6, '2020-04-30 12:43:02', '2020-04-30 23:44:08'),
(11817471, 'f1e13524-cb57-460a-8ebf-7af09370278f', 11819021, 4, '2.0', NULL, 'Pending Payment', 'Your reservation has been received and reviewed by our staff. You may now pay your corresponding locker fee at the finance department. After paying, please upload your official receipt immediately.', 6, '2020-04-30 12:43:02', '2020-05-01 02:05:25'),
(11817472, '84df3680-602a-4cec-ad9c-5875e0e46a5b', 11817223, 5, '2.1', NULL, 'Reservation Declined', 'Upon review of your reservation status, you are not eligible for locker rental reservation this term. Please email us if you think there has been a mistake.', 6, '2020-04-30 12:43:02', '2020-04-30 23:36:34'),
(11817480, '44e904e9-9e1b-46cf-a645-2220cb183bf0', 11817466, 3, '4.0', 0x726563656970745f323032304d6179303230343034303530352e6a7067, 'Locker Reserved Successfully', 'Thank you for choosing Belockr. You may now use your locker for one (1) term only. Kindly vacate your belongings in your locker before the end of semester.', 6, '2020-05-01 20:20:59', '2020-05-01 20:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userlevel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `username_verified_at`, `password`, `userlevel`, `created_at`, `updated_at`) VALUES
(1, '11818256', NULL, '$2y$10$pdMRwuSY.ksyyqhnEiJ9uu8Sovhfvt1FW9Ec2yVnb7yyy.o404DHq', 'Student', '2020-04-30 01:51:04', '2020-04-30 01:51:04'),
(3, 'admin', NULL, '$2y$10$ZhwygOa06Ajm3FE/S31uJOtvbU/pP6ghR4hiuonHz/6jvgOtLmUIK', 'Admin', '2020-04-30 01:56:59', '2020-04-30 01:56:59'),
(4, '11817466', NULL, '$2y$10$1/hhfaQB1gUGlwbk06wNVOq.qvx1VF/RoCstorPpd5FK9tVi60nkq', 'Student', '2020-04-30 01:57:50', '2020-04-30 01:57:50'),
(6, 'lso', NULL, '$2y$10$YWt2yFMYkpC/EL9hisenreDvg.KGmdW2YAYeTNnAbkRoUq3Mhth/W', 'Staff', '2020-04-30 01:55:58', '2020-04-30 01:55:58'),
(8, '11817284', NULL, '$2y$10$H.JWEYolipIzfCX9CB5QRekdyK3HE4Oq11wsCSb9gwE.t4IC.dkPW', 'Student', '2020-05-01 16:48:50', '2020-05-01 16:48:50'),
(9, '11819021', NULL, '$2y$10$CKtCurJNusLZzMSGc.ldLeTQH1/.PJwqqTLqaPo4zDiJ4PK0WGhLu', 'Student', '2020-05-01 16:48:50', '2020-05-01 16:48:50'),
(10, '11818167', NULL, '$2y$10$9lssHsZ90is0Gid6MNd7e.L3dXAokSkI1RbfacVrBU6EY9l07W5wq', 'Student', '2020-05-01 16:48:50', '2020-05-01 16:48:50'),
(11, '11818518', NULL, '$2y$10$h2e.TI5aSU5IHNZAFrhPwONvojP7rv2QFU9ZlYJkhu5fUJzlHY6.y', 'Student', '2020-05-01 16:48:50', '2020-05-01 16:48:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lockers`
--
ALTER TABLE `lockers`
  ADD PRIMARY KEY (`locker_id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logins_username_unique` (`username`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockers`
--
ALTER TABLE `lockers`
  MODIFY `locker_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11818519;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11817481;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
