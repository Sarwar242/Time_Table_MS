-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2020 at 07:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetabledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$itcOUoXE10nQljHjebFwj..YKmFZ08UnX2O5Q7yN8oibrXiIrL4nq', NULL, '2020-02-25 18:39:40', '2020-02-25 18:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Networking Lab', 1, NULL, '2020-02-29 11:25:33'),
(2, 'Programming Lab', 1, NULL, '2020-02-29 11:25:24'),
(3, 'Mobile Computing Lab', 1, NULL, '2020-02-29 11:25:38'),
(4, 'AOT', 1, NULL, '2020-02-29 11:25:28'),
(5, 'Classroom1', 0, '2020-02-29 11:45:36', '2020-02-29 11:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'open||holiday',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Sunday', 'open', '2020-02-27 15:43:54', '2020-02-27 15:43:54'),
(2, 'Monday', 'open', '2020-02-27 15:44:26', '2020-02-27 15:44:26'),
(3, 'Tuesday', 'open', '2020-02-27 15:44:53', '2020-02-27 15:44:53'),
(4, 'Wednesday', 'open', '2020-02-27 15:45:49', '2020-02-27 15:45:49'),
(5, 'Thursday', 'open', '2020-02-27 15:46:20', '2020-02-27 15:46:20'),
(6, 'Friday', 'holiday', '2020-02-27 15:46:43', '2020-02-27 15:46:43'),
(7, 'Saturday', 'holiday', '2020-02-27 15:47:57', '2020-02-27 15:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'CSE', '2020-02-27 16:06:36', '2020-02-27 16:06:36'),
(2, 'EEE', '2020-02-27 16:06:47', '2020-02-27 16:06:47'),
(3, 'ME', NULL, NULL),
(4, 'MATH', NULL, NULL),
(5, 'Physics', NULL, NULL),
(6, 'Chemistry', NULL, NULL);

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
(4, '2020_02_25_181008_create_admins_table', 1),
(5, '2020_02_25_200705_create_teachers_table', 2),
(8, '2020_02_27_151748_create_days_table', 4),
(10, '2020_02_27_152639_create_departments_table', 4),
(11, '2020_02_27_152957_create_periods_table', 4),
(14, '2020_02_26_151323_create_subjects_table', 5),
(15, '2020_02_27_183408_teacher_subject', 6),
(19, '2020_02_28_065547_create_routines_table', 8),
(20, '2020_02_26_134453_create_classrooms_table', 9),
(21, '2020_02_27_152123_create_semesters_table', 9);

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
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `number`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, '8.30am - 10.00am', '2020-02-27 15:52:37', '2020-02-27 15:52:37'),
(2, 2, '10.00am - 11.30am', '2020-02-27 15:55:21', '2020-02-27 15:55:21'),
(3, 3, '11.30am - 1.00pm', '2020-02-28 19:21:15', '2020-02-28 19:21:15'),
(4, 4, '2.00pm - 3.30pm', '2020-02-28 19:21:40', '2020-02-28 19:21:40'),
(5, 5, '3.30pm - 5.00pm', '2020-02-28 19:22:12', '2020-02-28 19:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_id` bigint(20) UNSIGNED NOT NULL,
  `period_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `day_id`, `period_id`, `semester_id`, `subject_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 1, 1, 2, '2020-02-28 10:20:12', '2020-02-28 10:20:12'),
(3, 3, 1, 1, 1, 4, '2020-02-28 10:20:32', '2020-02-28 10:20:32'),
(23, 4, 1, 1, 4, 9, '2020-02-29 05:04:37', '2020-02-29 05:04:37'),
(24, 1, 1, 7, 7, 9, '2020-02-29 05:41:24', '2020-02-29 05:41:24'),
(25, 2, 2, 7, 7, 9, '2020-02-29 05:41:36', '2020-02-29 05:41:36'),
(26, 2, 2, 1, 4, 9, '2020-02-29 12:38:48', '2020-02-29 12:38:48'),
(27, 5, 5, 1, 4, 9, '2020-02-29 12:38:59', '2020-02-29 12:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `classroom_id`, `created_at`, `updated_at`) VALUES
(1, 'semester1', 1, '2020-02-27 09:49:16', '2020-02-29 11:25:34'),
(2, 'semester2', 2, '2020-02-27 09:49:38', '2020-02-29 11:25:24'),
(3, 'semester3', 4, '2020-02-27 09:49:47', '2020-02-29 11:25:29'),
(4, 'semester4', NULL, '2020-02-27 09:49:57', '2020-02-29 11:24:49'),
(5, 'semester5', NULL, '2020-02-27 09:50:16', '2020-02-27 09:50:16'),
(6, 'semester6', NULL, '2020-02-27 09:50:41', '2020-02-27 09:50:41'),
(7, 'semester7', NULL, '2020-02-27 09:50:55', '2020-02-27 09:50:55'),
(8, 'semester8', 3, '2020-02-27 09:50:55', '2020-02-29 11:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'THEORY||LAB',
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `isAlloted` tinyint(1) NOT NULL DEFAULT 0,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_code`, `subject_name`, `course_type`, `department_id`, `isAlloted`, `semester_id`, `created_at`, `updated_at`) VALUES
(1, 'CSE001', 'Fundamentals of Computers', 'THEORY', 1, 0, 1, '2020-02-27 16:23:51', '2020-02-27 16:23:51'),
(4, 'CSE2208', 'Architechture', 'THEORY', 1, 0, 1, '2020-02-27 12:50:29', '2020-02-27 12:50:29'),
(5, 'CSE2210', 'Architechture Lab', 'LAB', 1, 0, 4, '2020-02-27 12:51:02', '2020-02-27 12:51:02'),
(6, '12re', 'test', 'THEORY', 2, 0, 3, '2020-02-29 05:40:11', '2020-02-29 05:40:11'),
(7, 'as', 'sa', 'LAB', 3, 0, 7, '2020-02-29 05:40:27', '2020-02-29 05:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_teacher`
--

INSERT INTO `subject_teacher` (`id`, `teacher_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(28, 4, 1, NULL, NULL),
(29, 9, 4, NULL, NULL),
(30, 2, 1, NULL, NULL),
(31, 9, 7, NULL, NULL),
(32, 4, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '$2y$10$QbMD9a1bl32n.0s7cYP1JurukXi1zFUdDWcfUZOSSfCqEwvaGa5Yy',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `faculty_number`, `name`, `alias`, `designation`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'T001', 'Prof. Mohammad Sarosh Umar', 'MSU', 'Professor', '12345678', ' 	saroshumar@gmail.com', '$2y$10$QbMD9a1bl32n.0s7cYP1JurukXi1zFUdDWcfUZOSSfCqEwvaGa5Yy', '2020-02-25 20:50:25', '2020-02-25 20:50:25'),
(4, 'T002', 'Prof. Nesar Ahmad', 'NA', 'Assistant Professor', '12345678', 'nesarahmad@gmail.com', '$2y$10$QbMD9a1bl32n.0s7cYP1JurukXi1zFUdDWcfUZOSSfCqEwvaGa5Yy', '2020-02-25 15:10:08', '2020-02-25 15:10:08'),
(6, 'T003', 'Prof. Ash Mohammad Abbas', 'AMA', 'Professor', '12345678', 'ashmabbas@gmail.com', '$2y$10$QbMD9a1bl32n.0s7cYP1JurukXi1zFUdDWcfUZOSSfCqEwvaGa5Yy', '2020-02-25 15:11:33', '2020-02-25 15:11:33'),
(9, 'T004', 'Prof. M.M. Sufyan Beg', 'SB', 'Professor', '12345678', 'mmsufyanbeg@gmail.com', '$2y$10$QbMD9a1bl32n.0s7cYP1JurukXi1zFUdDWcfUZOSSfCqEwvaGa5Yy', '2020-02-27 08:56:34', '2020-02-27 08:56:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `routines_day_id_foreign` (`day_id`),
  ADD KEY `routines_period_id_foreign` (`period_id`),
  ADD KEY `routines_semester_id_foreign` (`semester_id`),
  ADD KEY `routines_teacher_id_foreign` (`teacher_id`),
  ADD KEY `routines_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semesters_classroom_id_foreign` (`classroom_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_semester_id_foreign` (`semester_id`),
  ADD KEY `subjects_department_id_foreign` (`department_id`);

--
-- Indexes for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_teacher_teacher_id_foreign` (`teacher_id`),
  ADD KEY `subject_teacher_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `routines`
--
ALTER TABLE `routines`
  ADD CONSTRAINT `routines_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `routines_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `routines_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `routines_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `routines_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `semesters`
--
ALTER TABLE `semesters`
  ADD CONSTRAINT `semesters_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjects_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD CONSTRAINT `subject_teacher_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
