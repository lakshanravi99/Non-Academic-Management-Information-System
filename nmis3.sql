-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 08:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nmis3`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrative_notifications`
--

CREATE TABLE `administrative_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `single_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faculty_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `administrative_read_users`
--

CREATE TABLE `administrative_read_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allusers`
--

CREATE TABLE `allusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allusers`
--

INSERT INTO `allusers` (`id`, `emp_id`, `fname`, `password`, `usertype`, `status`, `place`, `created_at`, `updated_at`) VALUES
(1, 'NA001', 'lakshitha', '12345678', 'superAdmin', 'active', '*', NULL, NULL),
(61, 'NA002', 'HarshadewaDean', '12345678', 'Dean', 'active', '*', '2022-08-23 02:09:40', '2022-08-23 02:09:40'),
(70, 'NA003', 'SubashICT', '12345678', 'HOD', 'Active', 'ICT', '2022-08-23 23:25:26', '2022-08-23 23:25:26'),
(82, 'NA004', 'NirashaET', '12345678', 'HOD', 'Active', 'ET', '2022-09-14 01:59:50', '2022-09-14 01:59:50'),
(86, 'NA005', 'MenuraBST', '12345678', 'HOD', 'Active', 'BST', '2022-09-22 19:26:30', '2022-09-22 19:26:30'),
(87, 'NA006', 'Ruwan', '12345678', 'HOD', 'Active', 'Securrity', '2022-10-09 01:43:38', '2022-10-09 01:43:38'),
(88, 'NA007', 'Anton', '12345678', 'HOD', 'Active', 'Dean Office', '2022-10-09 01:44:58', '2022-10-09 01:44:58'),
(89, 'NA008', 'Anjali', '12345678', 'HOD', 'Active', 'Finance', '2022-10-09 02:48:41', '2022-10-09 02:48:41'),
(90, 'NA009', 'Waruna', '12345678', 'HOD', 'Active', 'Maintain', '2022-10-09 02:49:14', '2022-10-09 02:49:14'),
(91, 'NA010', 'Waruna', '12345678', 'HOD', 'Active', 'MultiDisciplanary', '2022-10-09 02:49:37', '2022-10-09 02:49:37'),
(92, 'NA011', 'Sameeera', '12345678', 'HOD', 'Active', 'Library', '2022-10-09 02:50:08', '2022-10-09 02:50:08'),
(93, 'NA012', 'test', '12345678', 'Genaral', 'Active', 'ICT', '2022-10-09 02:51:34', '2022-10-09 02:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `appliciants`
--

CREATE TABLE `appliciants` (
  `appliciant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `initial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT ' ',
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `initial_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_address_line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_address_line2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `current_address_line3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `permenent_address_line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permenent_address_line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `permenent_address_line3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `permenant_mobile` int(11) NOT NULL,
  `current_mobile` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `police_division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `civil_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_as_at_closing_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driving_licen_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `driving_licen_issuing_date` date DEFAULT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hight` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT ' ',
  `chest` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `sport_qualification` longtext COLLATE utf8mb4_unicode_ci DEFAULT '',
  `guilty_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guilty_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT '',
  `application_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'PENDING',
  `status_update_by` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selected_for_job` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'PENDING',
  `selected_by` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciants`
--

INSERT INTO `appliciants` (`appliciant_id`, `user_id`, `designation_id`, `season_id`, `initial`, `fname`, `mname`, `lname`, `initial_name`, `gender`, `current_address_line1`, `current_address_line2`, `current_address_line3`, `permenent_address_line1`, `permenent_address_line2`, `permenent_address_line3`, `permenant_mobile`, `current_mobile`, `email`, `nic`, `police_division`, `dob`, `civil_status`, `age_as_at_closing_date`, `driving_licen_no`, `driving_licen_issuing_date`, `citizenship`, `hight`, `chest`, `sport_qualification`, `guilty_status`, `guilty_description`, `application_status`, `status_update_by`, `selected_for_job`, `selected_by`, `created_at`, `updated_at`) VALUES
(21, 16, 1, 1, 'U.A.M.T', 'Mudeesha', 'Tharindu', 'Dilshan', 'UAA', 'mr', 'fredtghb', 'eghb', 'ergbf', '10', 'dc', 'edcsfw', 761234567, 722168550, 'mudee@gmail.com', '789867564v', 'Batapola', '2022-08-12', 'unmarried', '4 Years, 4 Months, 4 Days', 'fv', '2022-08-23', 'by Decent', '2 Feets, 3 Inches', '45', 'red', 'yes', 'dcfr', 'approved', 'NA001', 'PENDING', NULL, '2022-08-28 03:20:52', '2022-09-13 06:45:46'),
(23, 17, 2, 1, 'erd', 'f', 'f', 'f', 'fr', 'mr', 'fr', 'f', 'fde', 'edf', 'fde', 'f', 778596321, 781234567, 'mudee@gmail.com', '789867564v', 'Batapola', '2022-09-08', 'unmarried', '3 Years, 3 Months, 3 Days', '23', '2022-09-22', 'by Decent', '3 Feets, 3 Inches', '4', 'gh', 'yes', 'frgt', 'approved', 'NA001', 'rejected', NULL, '2022-09-02 10:48:31', '2022-09-13 06:46:13'),
(24, 1, 1, 1, 'Test1', 'Mudeesha', 'aws', 'qwd', 'eff', 'mr', 'ewfe', 'g', 'ggyg', 'gg', 'gg', 'ygg', 778569321, 776585963, 'appliciant1@gmail.com', 'njnkn', 'Taha', '2022-09-02', 'unmarried', '3 Years, 3 Months, 3 Days', 'acs', '2022-09-01', 'by Decent', '4 Feets, 4 Inches', '4', 'jnkjnk', 'yes', 'asc', 'PENDING', NULL, 'PENDING', NULL, '2022-09-13 06:48:55', '2022-09-13 06:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `appliciant_al_examinations`
--

CREATE TABLE `appliciant_al_examinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appliciant_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `index_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciant_al_examinations`
--

INSERT INTO `appliciant_al_examinations` (`id`, `appliciant_id`, `subject`, `grade`, `year`, `index_no`, `edit_status`, `created_at`, `updated_at`) VALUES
(1, 20, 'Engineering Technology', 'A', 2017, '123456', NULL, '2022-08-24 08:17:21', '2022-08-24 08:17:21'),
(2, 24, 'ICT', 'A', 2016, '123', NULL, '2022-09-13 06:51:06', '2022-09-13 06:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `appliciant_employment_records`
--

CREATE TABLE `appliciant_employment_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appliciant_id` bigint(20) UNSIGNED NOT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `edit_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciant_employment_records`
--

INSERT INTO `appliciant_employment_records` (`id`, `appliciant_id`, `post`, `institute`, `from`, `to`, `edit_status`, `created_at`, `updated_at`) VALUES
(1, 20, 'junior SE', 'ABC', '2022-08-10', '2022-08-09', NULL, '2022-08-24 08:32:13', '2022-08-24 08:32:13'),
(2, 24, 'asc', 'asc', '2022-09-08', '2022-09-21', NULL, '2022-09-13 06:52:48', '2022-09-13 06:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `appliciant_exams`
--

CREATE TABLE `appliciant_exams` (
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `mark_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `edit_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciant_exams`
--

INSERT INTO `appliciant_exams` (`exam_id`, `season_id`, `test_id`, `date`, `time`, `mark_limit`, `edit_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-09-06', '19:36:00', '80', '0', '4', '0', '2022-09-04 05:33:49', '2022-09-04 05:33:49'),
(2, 1, 2, '2022-09-07', '22:36:00', '70', '0', '4', '0', '2022-09-04 05:34:19', '2022-09-04 05:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `appliciant_exam_users`
--

CREATE TABLE `appliciant_exam_users` (
  `mark_id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `appliciant_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `marks` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciant_exam_users`
--

INSERT INTO `appliciant_exam_users` (`mark_id`, `season_id`, `appliciant_id`, `exam_id`, `marks`, `status`, `edit_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 1, 21, 1, 78, 'FAILED', '1', '4', '4', '2022-09-04 05:57:13', '2022-09-04 05:57:30'),
(5, 1, 21, 2, 80, 'PASS', '0', '4', '0', '2022-09-04 05:58:41', '2022-09-04 05:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `appliciant_ol_examinations`
--

CREATE TABLE `appliciant_ol_examinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appliciant_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shy` int(11) NOT NULL,
  `edit_status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciant_ol_examinations`
--

INSERT INTO `appliciant_ol_examinations` (`id`, `appliciant_id`, `subject`, `grade`, `year`, `index_no`, `shy`, `edit_status`, `created_at`, `updated_at`) VALUES
(1, 20, 'Sinhala', 'B', '2014', '123456', 1, NULL, '2022-08-24 08:08:56', '2022-08-24 08:08:56'),
(2, 20, 'Sinhala', 'A', '2015', '54321', 2, NULL, '2022-08-24 08:09:33', '2022-08-24 08:09:33'),
(3, 24, 'A', 'A', '2016', '789', 1, NULL, '2022-09-13 06:50:33', '2022-09-13 06:50:33'),
(4, 24, '123', 'B', '4', '123', 2, NULL, '2022-09-13 06:50:49', '2022-09-13 06:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `appliciant_other_education`
--

CREATE TABLE `appliciant_other_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appliciant_id` bigint(20) UNSIGNED NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `effective_date` date NOT NULL,
  `edit_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciant_other_education`
--

INSERT INTO `appliciant_other_education` (`id`, `appliciant_id`, `institute`, `course`, `from`, `to`, `effective_date`, `edit_status`, `created_at`, `updated_at`) VALUES
(1, 20, 'ESOFT', 'ict', '2022-08-16', '2022-08-11', '2022-09-01', NULL, '2022-08-24 08:21:38', '2022-08-24 08:21:38'),
(3, 24, 'ABC', 'aa', '2022-09-22', '2022-09-08', '2022-09-01', NULL, '2022-09-13 06:51:58', '2022-09-13 06:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `appliciant_present_occaptions`
--

CREATE TABLE `appliciant_present_occaptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appliciant_id` bigint(20) UNSIGNED NOT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_drawn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_where` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciant_present_occaptions`
--

INSERT INTO `appliciant_present_occaptions` (`id`, `appliciant_id`, `post`, `institute`, `salary_drawn`, `from_where`, `edit_status`, `created_at`, `updated_at`) VALUES
(1, 20, 'SE', 'XYZ', '20000', '2022-08-04', NULL, '2022-08-24 08:37:38', '2022-08-24 08:37:38'),
(2, 24, 'sas', 'wddw', '123', 'sacs', NULL, '2022-09-13 06:54:24', '2022-09-13 06:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `appliciant_professional_qualifications`
--

CREATE TABLE `appliciant_professional_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appliciant_id` bigint(20) UNSIGNED NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `effective_date` date NOT NULL,
  `edit_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciant_professional_qualifications`
--

INSERT INTO `appliciant_professional_qualifications` (`id`, `appliciant_id`, `institute`, `course`, `from`, `to`, `effective_date`, `edit_status`, `created_at`, `updated_at`) VALUES
(1, 20, 'Verchuca', 'ICT', '2022-08-04', '2022-08-04', '2022-08-04', NULL, '2022-08-24 08:26:01', '2022-08-24 08:26:01'),
(2, 24, 'dc', 'asc', '2022-09-01', '2022-09-02', '2022-09-08', NULL, '2022-09-13 06:52:31', '2022-09-13 06:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `appliciant_references`
--

CREATE TABLE `appliciant_references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appliciant_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciant_references`
--

INSERT INTO `appliciant_references` (`id`, `appliciant_id`, `name`, `designation`, `address`, `telephone`, `edit_status`, `created_at`, `updated_at`) VALUES
(1, 20, 'Mahinda Rajapaksha', 'Presedent', 'colombo', '0112856963', NULL, '2022-08-24 08:38:33', '2022-08-24 08:38:33'),
(8, 20, 'tfg', 'gh', 'h', 'vh', NULL, '2022-08-24 09:01:11', '2022-08-24 09:01:11'),
(9, 24, 'BC', '123', 'qe', '0771654856', NULL, '2022-09-13 06:53:44', '2022-09-13 06:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `appliciant_school_attendeds`
--

CREATE TABLE `appliciant_school_attendeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appliciant_id` bigint(20) UNSIGNED NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `edit_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciant_school_attendeds`
--

INSERT INTO `appliciant_school_attendeds` (`id`, `appliciant_id`, `school`, `from`, `to`, `edit_status`, `created_at`, `updated_at`) VALUES
(7, 20, 'MR/Mahinda Rajapaksha collage', '2022-08-04', '2022-08-12', NULL, '2022-08-24 08:01:22', '2022-08-24 08:01:22'),
(8, 21, 'd', '2022-08-29', '2022-09-06', NULL, '2022-09-02 10:48:54', '2022-09-02 10:48:54'),
(9, 24, 'School', '2022-09-23', '2022-09-14', NULL, '2022-09-13 06:50:15', '2022-09-13 06:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `appliciant_self_notifications`
--

CREATE TABLE `appliciant_self_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciant_self_notifications`
--

INSERT INTO `appliciant_self_notifications` (`id`, `user_id`, `name`, `description`, `active`, `created_at`, `updated_at`) VALUES
(8, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 08:50:19', '2022-08-23 10:15:54'),
(9, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 08:50:52', '2022-08-23 10:15:57'),
(10, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 08:55:43', '2022-08-23 10:15:58'),
(11, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 09:02:42', '2022-08-23 10:16:00'),
(12, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 10:12:25', '2022-08-23 10:16:02'),
(13, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 10:15:33', '2022-08-23 10:16:04'),
(14, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 10:16:09', '2022-08-23 10:50:23'),
(15, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 10:24:09', '2022-08-23 10:51:25'),
(16, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 10:26:34', '2022-08-23 10:51:27'),
(17, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 10:31:19', '2022-08-23 10:50:11'),
(18, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 10:49:03', '2022-08-23 10:51:28'),
(19, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 10:50:11', '2022-08-23 10:51:29'),
(20, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 10:50:24', '2022-08-23 10:51:30'),
(21, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-23 10:51:40', '2022-08-24 06:16:45'),
(22, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-24 06:16:30', '2022-08-24 06:16:47'),
(23, 15, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-24 07:17:51', '2022-08-24 08:00:37'),
(24, 15, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-24 08:00:19', '2022-08-24 08:00:41'),
(25, 17, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-08-28 03:20:52', '2022-08-28 03:21:30'),
(26, 17, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 1, '2022-08-29 09:23:12', '2022-08-29 09:23:12'),
(27, 17, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 1, '2022-09-02 10:48:31', '2022-09-02 10:48:31'),
(28, 1, 'Submit the Job Application', 'Hello (Appliciant name), You have successfully Submitted the job Application in Non-acedamic management system of university of Ruhuna.', 0, '2022-09-13 06:48:55', '2022-09-13 06:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `appliciant_tests`
--

CREATE TABLE `appliciant_tests` (
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_part` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciant_tests`
--

INSERT INTO `appliciant_tests` (`test_id`, `designation_id`, `test_name`, `test_part`, `test_type`, `edit_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tec officer 1', '1', 'Written', '0', '', '0', NULL, NULL),
(2, 1, 'Tec officer', '2', 'practical', '0', '', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appliciant_university_education`
--

CREATE TABLE `appliciant_university_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appliciant_id` bigint(20) UNSIGNED NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effective_date` date NOT NULL,
  `edit_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliciant_university_education`
--

INSERT INTO `appliciant_university_education` (`id`, `appliciant_id`, `institute`, `degree`, `class`, `year`, `effective_date`, `edit_status`, `created_at`, `updated_at`) VALUES
(1, 20, 'University of Ruhuna', 'BICT', '1st', '2018', '2022-08-26', NULL, '2022-08-24 08:18:01', '2022-08-24 08:18:01'),
(2, 24, 'qwe', 'bio', 'A', '6', '2022-09-15', NULL, '2022-09-13 06:51:41', '2022-09-13 06:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `attendences`
--

CREATE TABLE `attendences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrival_time` time NOT NULL,
  `leave_time` time DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendences`
--

INSERT INTO `attendences` (`id`, `emp_id`, `fname`, `arrival_time`, `leave_time`, `status`, `date`, `created_at`, `updated_at`) VALUES
(19, 'NA001', 'lakshitha', '00:00:13', '00:00:15', 'present', '2022-08-13', '2022-08-23 23:28:14', '2022-08-23 23:28:14'),
(20, 'NA002', 'lakshan', '00:00:13', '00:00:15', 'present', '2022-08-13', '2022-08-23 23:28:14', '2022-08-23 23:28:14'),
(21, 'NA003', 'mudeesha', '00:00:13', '00:00:15', 'absent', '2022-08-13', '2022-08-23 23:28:14', '2022-08-23 23:28:14'),
(29, 'NA001', 'Lakshitha', '10:28:07', '10:29:18', 'present', '2022-08-24', '2022-09-13 10:15:26', '2022-09-13 10:15:26'),
(36, 'NA002', 'Lakshan', '11:50:22', '11:52:13', 'present', '2022-09-14', '2022-09-14 00:52:44', '2022-09-14 00:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `casual_leaves`
--

CREATE TABLE `casual_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `initiate_date` date DEFAULT NULL,
  `leave_start_day` date NOT NULL,
  `leave_end_day` date NOT NULL,
  `Reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `casual_leaves`
--

INSERT INTO `casual_leaves` (`id`, `emp_id`, `usertype`, `Place`, `count`, `initiate_date`, `leave_start_day`, `leave_end_day`, `Reason`, `Status`, `created_at`, `updated_at`) VALUES
(2, 'NA003', 'Genaral', 'ICT', 4, '2022-07-21', '2022-07-22', '2022-07-24', 'Private Reason', 'Approved', '2022-07-14 09:00:03', '2022-07-14 09:00:03'),
(6, 'NA003', 'Genaral', 'ICT', 3, NULL, '2022-07-17', '2022-07-20', 'Family Commitment', 'Rejected', '2022-07-17 05:52:30', '2022-07-17 05:52:30'),
(7, 'NA004', 'Genaral', 'ET', 0, NULL, '2022-07-17', '2022-07-17', 'Family Commitment', 'Pending', '2022-07-17 06:05:31', '2022-07-17 06:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comment_id` int(10) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Comment_id`, `text`, `emp_id`, `post_id`, `created_at`, `updated_at`) VALUES
(7, 'Update 4', 'NA002', '10', '2022-07-04 22:06:23', '2022-07-04 22:06:23'),
(11, 'Hi', 'NA002', '11', '2022-07-08 07:24:23', '2022-07-08 07:24:23'),
(14, 'flower', 'NA002', '11', '2022-07-08 07:59:14', '2022-07-08 07:59:14'),
(15, 'shakes', 'NA002', '11', '2022-07-08 07:59:23', '2022-07-08 07:59:23'),
(16, 'kaves', 'NA002', '11', '2022-07-08 07:59:37', '2022-07-08 07:59:37'),
(17, 'Cisco', 'NA002', '12', '2022-07-09 00:03:09', '2022-07-09 00:03:09'),
(18, 'Next', 'NA002', '12', '2022-07-09 00:03:18', '2022-07-09 00:03:18'),
(37, 'Tested Notify', 'NA002', '14', '2022-07-11 23:14:42', '2022-07-11 23:14:42'),
(41, 'Planet', 'NA002', '16', '2022-07-12 00:16:53', '2022-07-12 00:16:53'),
(43, 'Mudeesha', 'NA002', '16', '2022-07-29 06:42:59', '2022-07-29 06:42:59'),
(44, 'Tv', 'NA001', '14', '2022-08-03 10:02:06', '2022-08-03 10:02:06'),
(45, 'TV2', 'NA001', '14', '2022-08-05 01:24:16', '2022-08-05 01:24:16'),
(46, 'New Technology', 'NA001', '14', '2022-08-05 20:44:07', '2022-08-05 20:44:07'),
(48, 'Test Mudeeshaz Notification', 'NA002', '16', '2022-08-05 20:49:40', '2022-08-05 20:49:40'),
(50, 'lakshitha lion', 'NA001', '23', '2022-08-23 12:37:49', '2022-08-23 12:37:49'),
(51, 'Test', 'NA001', '16', '2022-08-23 12:38:23', '2022-08-23 12:38:23'),
(52, 'Test', 'NA001', '23', '2022-08-23 13:05:07', '2022-08-23 13:05:07'),
(53, 'T', 'NA001', '23', '2022-08-23 13:05:53', '2022-08-23 13:05:53'),
(54, 'Nice one', 'NA002', '23', '2022-08-23 13:12:41', '2022-08-23 13:12:41'),
(55, 'I not like to this circular', 'NA004', '24', '2022-08-23 19:18:35', '2022-08-23 19:18:35'),
(56, 'Bus Topology', 'NA004', '14', '2022-08-23 19:28:03', '2022-08-23 19:28:03'),
(57, 'Congratulations !', 'NA001', '25', '2022-08-23 19:28:53', '2022-08-23 19:28:53'),
(58, 'I also dont like this circular', 'NA001', '24', '2022-08-23 19:29:13', '2022-08-23 19:29:13'),
(59, 'Presentation', 'NA001', '26', '2022-08-23 23:37:45', '2022-08-23 23:37:45'),
(60, 'Test', 'NA001', '24', '2022-08-23 23:41:20', '2022-08-23 23:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `complain_id` int(10) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`complain_id`, `emp_id`, `description`, `picture`, `created_at`, `updated_at`) VALUES
(4, 'NA001', 'Reagarding Security', '1660802064.png', '2022-08-18 00:24:24', '2022-08-18 00:24:24'),
(6, 'NA001', 'Test Complian', NULL, '2022-08-21 23:22:04', '2022-08-21 23:22:04'),
(7, 'NA001', 'Test Complian', NULL, '2022-08-21 23:22:19', '2022-08-21 23:22:19'),
(8, 'NA004', 'Test With', '1661143964.png', '2022-08-21 23:22:45', '2022-08-21 23:22:45'),
(10, 'NA012', 'test', NULL, '2022-10-09 03:07:29', '2022-10-09 03:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `faculty_id`, `department_name`, `edit_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'ICT', '0', NULL, '0', NULL, NULL),
(2, 1, 'ET', '0', NULL, '0', NULL, NULL),
(7, 1, 'BST', '0', NULL, '0', NULL, NULL),
(8, 1, 'MultiDisciplanary', '0', NULL, '0', NULL, NULL),
(9, 1, 'Library', '0', NULL, '0', NULL, NULL),
(10, 1, 'Dean Office', '0', NULL, '0', NULL, NULL),
(11, 1, 'Security', '0', NULL, '0', NULL, NULL),
(12, 1, 'Finance', '0', NULL, '0', NULL, NULL),
(13, 1, 'Maintain', '0', NULL, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `designation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cadre` int(11) DEFAULT 0,
  `current_count` int(11) NOT NULL DEFAULT 0,
  `vacancies` int(11) NOT NULL DEFAULT 0,
  `edit_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`designation_id`, `designation_name`, `qualification`, `details`, `age`, `salary`, `cadre`, `current_count`, `vacancies`, `edit_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Technical Officer', '(a) National Diploma in Technology or equivalent qualifications and have at\nLeast four years experience in the relevant field after obtaining such\nqualifications.\nNOTE : Period of in-plant training will not be counted for the four years’\n experience\n(b) National Certificate in Technology or equivalent qualifications and have\nat Least four years experience in the relevant field after obtaining such\nqualifications.', 'Installs, modifies, and makes minor repairs to computer hardware and software systems. Resolves tickets representing staff-generated technical requests or problems and troubleshoots technical and process issues to maintain productivity.', 'Not more than 45 years.', 'Rs. 28,185 – 6 x 335 ; 13 x 438 – 35,889 p.m. [U-MT 1(I)] (Salary Scale for 2017 as per Commission Circular No. 17/2016) ** In addition to the Basic salary, the Cost of living allowance and other approved allowances will be paid to the selected candid', 560, 420, 10, '0', NULL, '0', NULL, NULL),
(2, 'Lab AssistentLab Assistent', '(i) Ability to read and write. \r\n\r\n(ii) Should be conversant with – \r\n(a) Detecting faults, repairs and assembly of materials, transformers and all types of machinery and appliances, cables, wires and their ratings, measuring instruments and their uses, various types of wiring, joining, testing meters and small transformers ; \r\n(b) Reading and understanding drawings and diagrams. Reading scales and record fractional dimensions; \r\n(c) Care and the use of the tools in the trade \r\n\r\n(iii) Not less than 2 years ‘experience as an Electrician in a Government  Department, State Corporation or in a recognized establishment', 'Lab assistants are responsible for helping technologists and scientists during lab tests and research. These highly-analytical professionals\' possess in-depth knowledge of basic laboratory techniques and equipment. Their duties include processing samples, classifying results, and recording findings.', 'Not more than 45 years', 'Rs. 21,356 – 16x192 –24,428p.m. [U-PL 3(III)] (Salary Scale for 2017 as per Commission Circular No. 17/2016) ** In addition to the Basic salary, the Cost of living allowance and other approved allowances will be paid to the selected candidate/s. S', 201, 180, 10, '0', NULL, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `appliciant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_postal_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_postal_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `police_division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `age_as_at_closing_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driving_licen_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driving_licen_issuing_date` date NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fingerprint_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `user_id`, `appliciant_id`, `faculty_id`, `department_id`, `designation_id`, `fname`, `mname`, `lname`, `gender`, `place`, `emp_pic`, `civil_status`, `current_postal_address`, `permanent_postal_address`, `current_mobile`, `permanent_mobile`, `police_division`, `email`, `dob`, `age_as_at_closing_date`, `citizenship`, `nic`, `driving_licen_no`, `driving_licen_issuing_date`, `salary`, `status`, `fingerprint_id`, `created_at`, `updated_at`) VALUES
('NA001', 1, 1, 1, 1, 1, 'Lakshitha', 'kasun', 'Dananjaya', 'Male', 'ICT', '1656913185.jpg', 'Unmarried', 'Kumari,Kongala,Hakmana', 'Kumari,Kongala,Hakmana', '0702228130', '0702228130', 'Hakmana', 'lakshithaisuru.dilshan2@gmail.com', '1998-10-04', '24', 'Sri Lanka', '982780489V', 'N9865236', '2017-10-05', '500000', 'Active', 1, '2022-08-05 04:21:39', '2022-09-14 01:09:19'),
('NA002', 2, 2, 1, 1, 1, 'Lakshan', 'Ravindu', 'Mohottala', 'Male', 'ICT', '1657362738.jpg', 'Sri Lanka', 'Gajamangoda,Kirinda', 'Gajamangoda,Kirinda', '0713767449', '0713767449', 'Hakmana', 'ravindumohottala@gmail.com', '2022-08-05', '23y 5m 7d', 'Sri Lanka', '199900910281', 'N975621556', '2017-12-02', '500000', 'Active', 2, '2022-08-05 04:21:39', NULL),
('NA003', 3, 3, 1, 1, 1, 'Mudeesha', 'Tharindu', 'Dilshan', 'Male', 'ICT', 'ithead.jpg', 'Unmarried', 'Ambalangoda', 'Ambalangoda', '072462926', '07264884', 'Ambalangoda', 'mudeeshatharindudilshan@gmail.com', '1997-07-05', '25y 10m 2d', 'Sri Lanka', '97524522V', 'N6514651', '0000-00-00', '50000', 'Active', 3, '2022-08-06 02:28:55', NULL),
('NA004', 4, 4, 1, 1, 2, 'Nirasha', 'Dilshani', 'Senevirathna', 'Female', 'ET', '289921946_1060893321507303_6180700595397191393_n.jpg', 'Unmarried', 'Weligama', 'Weligama', '071-5588999', '071-5588999', 'Weligama', 'nirasha@gmail.com', '1997-07-05', '24', 'Sri Lanka', '9845612848V', '123684N', '2022-10-04', '50000', 'active', 4, NULL, NULL),
('NA005', NULL, NULL, 1, NULL, NULL, 'Menura', 'Maheepala', 'Gamlath', 'Male', 'BST', '1664100712.jpg', 'Unmarried', 'Matugama', 'Matugama', '0745641321', '132186123', 'Kaluatara', 'menura@gmail.com', '2022-09-18', '28', 'Sri Lanka', '6454163641V', '1235438543V', '2022-09-18', '50000', 'Active', 4, '2022-09-18 03:05:00', '2022-09-18 03:05:00'),
('NA006', NULL, NULL, 1, NULL, NULL, 'Ruwan', 'Prasad', 'Nayanajith', 'Male', 'Security', '1665303231.jpg', 'Unmarried', 'Kumari,kongala,Hakmana', 'Kumari,kongala,Hakmana', '0745641321', '0775645896', 'Hakmana', 'ruwan@gmail.com', '2022-10-09', '24', 'Sri Lanka', '6454163641V', '45613465N', '2022-10-09', '50000', 'Active', 5, '2022-10-09 01:20:07', '2022-10-09 01:20:07'),
('NA007', NULL, NULL, 1, NULL, NULL, 'Anton', 'de', 'Silva', 'Male', 'Dean Office', '1665298362.jpg', 'Unmarried', 'Kumari,kongala,Hakmana', 'Kumari,kongala,Hakmana', '0745641321', '0775645896', 'Kaluatara', 'anton@gmail.com', '2022-10-09', '25', 'Sri Lanka', '6454163641V', '45613465N', '2022-10-09', '50000', 'Active', 6, '2022-10-09 01:22:42', '2022-10-09 01:22:42'),
('NA008', NULL, NULL, 1, NULL, NULL, 'Anajali', 'Miyushi', 'Silva', 'Female', 'Finance', '1665298482.jpg', 'Unmarried', 'Kumari,kongala,Hakmana', 'Kumari,kongala,Hakmana', '0745641321', '0775645896', 'Kaluatara', 'anajli@gmail.com', '2022-10-09', '28', 'Sri Lanka', '6454163641V', '45613465N', '2022-10-09', '50000', 'Active', 7, '2022-10-09 01:24:42', '2022-10-09 01:24:42'),
('NA009', NULL, NULL, 1, NULL, NULL, 'Waruna', 'Dilshan', 'Mohottala', 'Male', 'Maintain', '1665298580.jpg', 'Unmarried', 'Kumari,kongala,Hakmana', 'Kumari,kongala,Hakmana', '0745641321', '0775645896', 'Matara', 'waruna@gmail.com', '2022-10-09', '26', 'Sri Lanka', '6454163641V', '45613465N', '2022-10-09', '60000', 'Active', 8, '2022-10-09 01:26:20', '2022-10-09 01:26:20'),
('NA010', NULL, NULL, 1, NULL, NULL, 'Gamini', 'Sunanda', 'Aluthkohupitiya', 'Male', 'MultiDisciplanary', '1665298705.jpg', 'Unmarried', 'Kumari,kongala,Hakmana', 'Kumari,kongala,Hakmana', '0745641321', '0775645896', 'Matara', 'gamini@gmail.com', '2022-10-09', '25', 'Sri Lanka', '6454163641V', '45613465N', '2022-10-09', '60000', 'Active', 9, '2022-10-09 01:28:01', '2022-10-09 01:28:01'),
('NA011', NULL, NULL, 1, NULL, NULL, 'Sameera', 'Gamunu', 'Jagathpriya', 'Male', 'Library', '1665298849.jpg', 'Unmarried', 'Kumari,kongala,Hakmana', 'Kumari,kongala,Hakmana', '0745641321', '0775645896', 'Matara', 'sameera@gmail.com', '2022-10-09', '25', 'Sri Lanka', '6454163641V', '45613465N', '2022-10-09', '50000', 'Active', 10, '2022-10-09 01:30:11', '2022-10-09 01:30:11'),
('NA012', NULL, NULL, 1, NULL, NULL, 'Test', 'Genaral', 'Employee', 'Male', 'ICT', '1665299524.jpg', 'Unmarried', 'Kumari,kongala,Hakmana', 'Kumari,kongala,Hakmana', '0745641321', '0775645896', 'Kaluatara', 'test@gmail.com', '2022-10-09', '28', 'Sri Lanka', '6454163641V', '45613465N', '2022-10-09', '50000', 'Active', 11, '2022-10-09 01:42:04', '2022-10-09 01:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `employee_self_notifications`
--

CREATE TABLE `employee_self_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`faculty_id`, `faculty_name`, `address`, `edit_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Technology', 'technology faculty,godava,kaburupitiya', '0', NULL, '0', NULL, NULL),
(2, 'Humanities and Social Sciences', 'Wellamadama,Matara', '0', NULL, '0', NULL, NULL);

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
-- Table structure for table `half_day_leaves`
--

CREATE TABLE `half_day_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` float NOT NULL,
  `initiate_date` date DEFAULT NULL,
  `leave_start_day` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `leave_end_day` datetime NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `Reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `half_day_leaves`
--

INSERT INTO `half_day_leaves` (`id`, `emp_id`, `usertype`, `Place`, `count`, `initiate_date`, `leave_start_day`, `leave_end_day`, `Status`, `Reason`, `created_at`, `updated_at`) VALUES
(9, 'NA002', 'Genaral', 'ICT', 0.5, '2022-07-15', '2022-09-17 19:44:33', '2022-07-18 00:00:00', 'Approved', 'Go to Home', '2022-07-15 01:50:43', '2022-07-15 01:50:43'),
(12, 'NA002', 'Genaral', 'ICT', 0.5, NULL, '2022-09-17 19:44:38', '2022-07-18 18:59:00', 'Rejected', 'Family Commitment', '2022-07-18 01:20:19', '2022-07-18 01:20:19'),
(13, 'NA004', 'Genaral', 'ET', 0.5, NULL, '2022-09-17 19:44:44', '2022-07-18 22:05:00', 'Pending', 'Family Commitment', '2022-07-18 07:36:09', '2022-07-18 07:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_time` time NOT NULL,
  `date` date NOT NULL,
  `leave_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_counts`
--

CREATE TABLE `leave_counts` (
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_leave` int(11) NOT NULL DEFAULT 24,
  `casual_leave` float NOT NULL DEFAULT 24,
  `medical_leave` int(11) NOT NULL DEFAULT 21,
  `subbatical_leave` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_counts`
--

INSERT INTO `leave_counts` (`emp_id`, `short_leave`, `casual_leave`, `medical_leave`, `subbatical_leave`, `created_at`, `updated_at`) VALUES
('NA001', 21, 35, 21, 0, NULL, NULL),
('NA002', 24, 24, 21, 0, '2022-08-23 02:09:40', '2022-08-23 02:09:40'),
('NA003', 24, 24, 21, 0, '2022-08-23 23:25:26', '2022-08-23 23:25:26'),
('NA004', 24, 24, 21, 0, '2022-09-14 01:59:50', '2022-09-14 01:59:50'),
('NA005', 24, 24, 21, 0, '2022-09-22 19:26:30', '2022-09-22 19:26:30'),
('NA006', 24, 24, 21, 0, '2022-10-09 01:43:38', '2022-10-09 01:43:38'),
('NA007', 24, 24, 21, 0, '2022-10-09 01:44:58', '2022-10-09 01:44:58'),
('NA008', 24, 24, 21, 0, '2022-10-09 02:48:41', '2022-10-09 02:48:41'),
('NA009', 24, 24, 21, 0, '2022-10-09 02:49:14', '2022-10-09 02:49:14'),
('NA010', 24, 24, 21, 0, '2022-10-09 02:49:37', '2022-10-09 02:49:37'),
('NA011', 24, 24, 21, 0, '2022-10-09 02:50:08', '2022-10-09 02:50:08'),
('NA012', 24, 24, 21, 0, '2022-10-09 02:51:34', '2022-10-09 02:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `leave_reasons`
--

CREATE TABLE `leave_reasons` (
  `id` int(11) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `usertype` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_reasons`
--

INSERT INTO `leave_reasons` (`id`, `reason`, `usertype`) VALUES
(1, 'Family Commitment', 'all'),
(2, 'Examinations', 'all'),
(3, 'Personal Emergency', 'all'),
(4, 'Study Purpose', 'all'),
(5, 'Other', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `medical_leaves`
--

CREATE TABLE `medical_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `initiate_date` date DEFAULT NULL,
  `leave_start_day` date NOT NULL,
  `leave_end_day` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `medical_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'noimage.png',
  `Reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_leaves`
--

INSERT INTO `medical_leaves` (`id`, `emp_id`, `usertype`, `Place`, `count`, `initiate_date`, `leave_start_day`, `leave_end_day`, `status`, `medical_file`, `Reason`, `created_at`, `updated_at`) VALUES
(11, 'NA004', 'admin', 'ET', 3, NULL, '2022-08-22', '2022-08-25', 'Pending', '1661139092.jpg', 'Examinations', '2022-08-21 21:37:53', '2022-08-21 21:37:53'),
(12, 'NA001', 'admin', 'ICT', 10, NULL, '2022-08-13', '2022-08-03', 'Pending', '1661318795.jpg', 'Family Commitment', '2022-08-23 23:56:35', '2022-08-23 23:56:35'),
(13, 'NA001', 'admin', 'ICT', 2, NULL, '2022-09-13', '2022-09-15', 'Pending', 'noimage.png', 'Family Commitment', '2022-09-12 13:55:49', '2022-09-12 13:55:49');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2022_06_29_134325_create_sessions_table', 1),
(10, '2022_06_30_110522_create_employees_table', 1),
(11, '2022_06_30_124156_create_allusers_table', 1),
(12, '2022_06_30_132453_create_attendences_table', 1),
(13, '2022_06_30_134854_create_leaves_table', 1),
(14, '2022_06_30_135320_create_posts_table', 1),
(15, '2022_06_30_135851_create_comments_table', 1),
(16, '2022_06_30_141946_create_reactions_table', 1),
(17, '2022_06_30_142507_create_requests_table', 1),
(18, '2022_06_30_142825_create_complains_table', 1),
(19, '2022_06_30_143014_create_raves_table', 1),
(20, '2022_07_01_121025_create_request_lists_table', 2),
(21, '2022_07_08_061038_create_socialmediaprofiles_table', 3),
(22, '2022_07_09_054921_create_socialmediaprofiles_table', 4),
(23, '2022_07_10_022231_create_complains_table', 5),
(24, '2022_07_10_035959_create_user_types_table', 6),
(25, '2022_07_10_040457_create_user_types_table', 7),
(26, '2022_07_10_150639_create_request_types_table', 8),
(27, '2022_07_11_165714_create_leave_types_table', 9),
(28, '2022_07_12_040514_create_social_media_notifications_table', 10),
(29, '2022_07_12_042948_create_social_media_notifications_table', 11),
(30, '2022_07_12_044307_create_social_media_notifications_table', 12),
(31, '2022_07_13_115740_create_leave_counts_table', 13),
(32, '2022_07_13_120157_create_short_leaves_table', 13),
(33, '2022_07_13_120224_create_casual_leaves_table', 13),
(34, '2022_07_13_120307_create_medical_leaves_table', 13),
(35, '2022_07_13_120334_create_half_day_leaves_table', 13),
(36, '2022_07_13_121909_create_leave_counts_table', 14),
(37, '2022_07_13_121919_create_short_leaves_table', 15),
(38, '2022_07_13_121927_create_casual_leaves_table', 15),
(39, '2022_07_13_121953_create_medical_leaves_table', 15),
(40, '2022_07_13_122015_create_half_day_leaves_table', 15),
(41, '2022_07_13_150123_create_short_leaves_table', 16),
(42, '2022_07_13_151038_create_short_leaves_table', 17),
(43, '2022_07_14_135807_create_casual_leaves_table', 18),
(44, '2022_07_14_150459_create_medical_leaves_table', 19),
(45, '2022_07_14_180230_create_half_day_leaves_table', 20),
(46, '2022_07_14_233805_create_notices_table', 21),
(47, '2022_07_14_234223_create_notices_table', 22),
(48, '2022_07_20_052750_create_personalfile_types_table', 23),
(49, '2022_07_25_084450_create_faculties_table', 24),
(50, '2022_07_25_084635_create_departments_table', 25),
(51, '2022_07_25_084718_create_designations_table', 26),
(52, '2022_07_25_084919_create_recruitment_seasons_table', 27),
(53, '2022_07_25_085101_create_recruitment_vacancies_table', 28),
(54, '2022_07_25_085220_create_appliciants_table', 29),
(55, '2022_07_25_085330_create_appliciant_tests_table', 30),
(56, '2022_07_25_085421_create_recruitment_season_tests_table', 31),
(57, '2022_07_25_085459_create_appliciant_exams_table', 32),
(58, '2022_07_25_085531_create_appliciant_exam_users_table', 33),
(59, '2022_07_26_163338_create_vehicles_table', 34),
(60, '2022_07_26_170640_create_request_vehicles_table', 35),
(61, '2022_07_28_111259_create_request_chats_table', 36),
(62, '2022_07_28_114432_create_request_chats_table', 37),
(63, '2022_07_30_054929_create_self_notifications_table', 38),
(64, '2022_07_30_055513_create_appliciant_school_attendeds_table', 39),
(65, '2022_07_30_062543_create_appliciant_ol_examinations_table', 40),
(66, '2022_07_30_062944_create_appliciant_al_examinations_table', 41),
(67, '2022_07_30_063023_create_appliciant_university_education_table', 42),
(68, '2022_07_30_063122_create_appliciant_other_education_table', 43),
(69, '2022_07_30_063218_create_appliciant_professional_qualifications_table', 44),
(70, '2022_07_30_063538_create_appliciant_employment_records_table', 45),
(71, '2022_07_30_063619_create_appliciant_present_occaptions_table', 46),
(72, '2022_07_30_063642_create_appliciant_references_table', 47),
(73, '2022_07_25_085461_create_appliciant_exams_table', 48),
(74, '2022_07_25_085533_create_appliciant_exam_users_table', 49),
(75, '2020_05_21_300001_create_faculties_table', 50),
(76, '2020_05_23_120341_create_designations_table', 51),
(77, '2020_05_21_300002_create_departments_table', 52),
(78, '2020_05_23_120342_create_designations_table', 53),
(79, '2022_06_30_110525_create_employees_table', 54),
(80, '2022_08_11_105618_create_rave_users_table', 55),
(81, '2022_08_11_104953_create_rave_comments_table', 56),
(82, '2020_05_23_120346_create_recruitment_seasons_table', 57),
(83, '2022_06_30_000008_create_appliciant_exam_users_table', 58),
(84, '2020_05_23_120347_create_recruitment_seasons_table', 59),
(85, '2022_09_09_020309_create_request_vehicles_table', 60),
(86, '2022_09_10_023123_create_request_promotions_table', 61),
(87, '2022_09_10_070213_create_request_prom_current_position_grades_table', 62),
(88, '2022_09_10_091111_create_request_prom_service_details_table', 63),
(89, '2022_09_09_024846_create_request_transfers_table', 64),
(90, '2022_09_11_145325_create_request_transfer_loans_table', 65),
(91, '2022_09_11_184924_create_request_transfer_expect_companies_table', 66),
(92, '2022_07_26_115406_create_request_insurances_table', 67),
(93, '2022_09_12_022043_create_request_insurances_table', 68);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `emp_id`, `usertype`, `access`, `text`, `file`, `created_at`, `updated_at`) VALUES
(2, 'NA001', 'Admin', 'all', 'System will be shutdown to day night.for maintain', 'dfg.pdf', '2022-07-14 23:54:44', NULL),
(3, 'NA001', 'Admin', 'Genaral', 'Test Genaral Notice', '1659243791.pdf', NULL, NULL),
(4, 'NA001', 'admin', 'All', 'Tested All Notice', '1659527081.pdf', '2022-08-03 06:14:41', '2022-08-03 06:14:41'),
(5, 'NA001', 'admin', 'Admin', 'To All Admin Come to Main Technical officers Room', '1659679852.pdf', '2022-08-05 00:40:53', '2022-08-05 00:40:53'),
(6, 'NA001', 'admin', 'Genaral', 'Genaral Users Come to the SAR Room', '1659682027.pdf', '2022-08-05 01:17:07', '2022-08-05 01:17:07'),
(8, 'NA001', 'admin', 'All', 'Test Download', '1661135419.pdf', '2022-08-21 21:00:19', '2022-08-21 21:00:19'),
(10, 'NA001', 'admin', 'All', 'System will be down', '1663120189.pdf', '2022-09-13 20:19:49', '2022-09-13 20:19:49');

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
-- Table structure for table `personalfiles`
--

CREATE TABLE `personalfiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filetype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personalfiles`
--

INSERT INTO `personalfiles` (`id`, `emp_id`, `filetype`, `file`, `description`, `created_at`, `updated_at`) VALUES
(3, 'NA001', 'Promotion', 'abc.pdf', NULL, NULL, NULL),
(18, 'NA002', 'Appoiment', '1658577225.pdf', NULL, '2022-07-23 06:23:45', '2022-07-23 06:23:45'),
(19, 'NA003', 'Other', '1658577572.pdf', NULL, '2022-07-23 06:29:32', '2022-07-23 06:29:32'),
(21, 'NA003', 'Increment', '1659243681.pdf', NULL, '2022-07-30 23:31:21', '2022-07-30 23:31:21'),
(22, 'NA003', 'PoliceReport', '1659243708.pdf', NULL, '2022-07-30 23:31:48', '2022-07-30 23:31:48'),
(23, 'NA003', 'Secret', '1659243730.pdf', NULL, '2022-07-30 23:32:10', '2022-07-30 23:32:10'),
(24, 'NA003', 'Confidential', '1659243747.pdf', NULL, '2022-07-30 23:32:27', '2022-07-30 23:32:27'),
(25, 'NA003', 'Duty', '1659243791.pdf', NULL, '2022-07-30 23:33:11', '2022-07-30 23:33:11'),
(27, 'NA001', 'Promotion', '1661087266.html', NULL, '2022-08-21 07:37:46', '2022-08-21 07:37:46'),
(28, 'NA001', 'Appoiment', '1661087692.pdf', 'Test description', '2022-08-21 07:44:52', '2022-08-21 07:44:52'),
(33, 'NA001', 'Appoiment', '1661089585.pdf', 'Testiiiiiii', '2022-08-21 08:16:25', '2022-08-21 08:16:25'),
(44, 'NA004', 'Appoiment', '1663119443.pdf', 'Test Personal File', '2022-09-13 20:07:23', '2022-09-13 20:07:23'),
(45, 'NA003', 'Appoiment', '1663140844.pdf', 'Test Demostration', '2022-09-14 02:04:05', '2022-09-14 02:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `personalfile_types`
--

CREATE TABLE `personalfile_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filetype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personalfile_types`
--

INSERT INTO `personalfile_types` (`id`, `filetype`, `created_at`, `updated_at`) VALUES
(1, 'Appication', NULL, NULL),
(2, 'Police Report', NULL, NULL),
(3, 'Increments', NULL, NULL),
(4, 'Promotion', NULL, NULL),
(5, 'Setting Letters', NULL, NULL),
(6, 'Appoiment', NULL, NULL);

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `react_count` int(11) DEFAULT 0,
  `comment_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `emp_id`, `fname`, `date`, `time`, `title`, `location`, `description`, `picture`, `react_count`, `comment_count`, `created_at`, `updated_at`) VALUES
(8, 'NA002', 'Ravindu', NULL, NULL, 'xxxx', 'xxxx', 'xxxxx', '1656991894.jpg', 1, NULL, '2022-07-04 22:01:34', '2022-07-04 22:01:34'),
(14, 'NA002', 'Ravindu', NULL, NULL, 'More', 'Matara', 'More', '1657348470.jpg', 2, NULL, '2022-07-09 01:04:30', '2022-08-23 19:28:03'),
(16, 'NA003', 'Mudeesha', NULL, NULL, 'Circular', 'Galle', 'New One', '1657604364.jpg', 2, NULL, '2022-07-12 00:09:24', '2022-08-23 12:38:23'),
(22, 'NA001', 'lakshitha', NULL, NULL, 'Discuss with Vice Chancellor', 'University of Ruhuna', 'Discuss with Vice Chancellor our requests....', '1661303567.jpg', 2, NULL, '2022-08-22 10:44:17', '2022-08-23 19:42:47'),
(23, 'NA001', 'lakshitha', NULL, NULL, 'Final Presenatation', 'Matara', 'NAMS', '1661278010.jpg', 1, NULL, '2022-08-23 12:27:48', '2022-08-23 13:12:41'),
(24, 'NA002', 'Ravindu', NULL, NULL, 'New Circular', 'Matara', 'I dont like to this circualr', '1661300751.jpg', 3, NULL, '2022-08-23 18:55:51', '2022-08-23 23:41:20'),
(25, 'NA004', 'Nirasha', NULL, NULL, 'My Graduation', 'Tangalle', 'HNDIT', '1661302606.jpg', 2, NULL, '2022-08-23 19:25:41', '2022-08-23 19:28:53'),
(26, 'NA001', 'lakshitha', NULL, NULL, '.ZDKNZMFV', 'S,D M', '.S D', '1663016333.jpg', 2, NULL, '2022-08-23 23:37:16', '2022-09-12 15:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `raves`
--

CREATE TABLE `raves` (
  `rave_id` int(10) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raves`
--

INSERT INTO `raves` (`rave_id`, `emp_id`, `rate_count`, `rate_to`, `created_at`, `updated_at`) VALUES
(16, 'NA001', '3', 'NA001', '2022-09-13 01:11:47', '2022-09-13 01:11:47'),
(17, 'NA001', '4', 'NA002', '2022-09-13 01:12:00', '2022-09-13 01:12:00'),
(18, 'NA002', '2', 'NA001', '2022-09-13 01:32:12', '2022-09-13 01:32:12'),
(19, 'NA001', '3', 'NA003', '2022-09-13 09:32:40', '2022-09-13 09:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `rave_comments`
--

CREATE TABLE `rave_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rave_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rave_comments`
--

INSERT INTO `rave_comments` (`id`, `rave_id`, `content`, `from_id`, `to_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Rsve Comment', 'NA001', 'NA002', '2022-08-11 11:22:29', NULL),
(2, NULL, 'Test', 'NA001', 'NA001', '2022-08-22 20:07:50', '2022-08-22 20:07:50'),
(3, NULL, 'Nice Person', 'NA001', 'NA003', '2022-09-13 09:32:31', '2022-09-13 09:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `rave_users`
--

CREATE TABLE `rave_users` (
  `rave_id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `react_id` int(10) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`react_id`, `emp_id`, `post_id`, `created_at`, `updated_at`) VALUES
(231, 'NA001', 9, '2022-08-18 01:24:29', '2022-08-18 01:24:29'),
(240, 'NA003', 15, '2022-08-18 01:28:06', '2022-08-18 01:28:06'),
(245, 'NA003', 16, '2022-08-18 01:41:05', '2022-08-18 01:41:05'),
(246, 'NA003', 3, '2022-08-18 01:43:14', '2022-08-18 01:43:14'),
(285, 'NA001', 8, '2022-08-22 10:08:40', '2022-08-22 10:08:40'),
(290, 'NA001', 18, '2022-08-22 10:30:48', '2022-08-22 10:30:48'),
(291, 'NA001', 21, '2022-08-22 10:43:49', '2022-08-22 10:43:49'),
(294, 'NA001', 16, '2022-08-22 11:02:47', '2022-08-22 11:02:47'),
(297, 'NA001', 14, '2022-08-22 11:05:09', '2022-08-22 11:05:09'),
(298, 'NA001', 22, '2022-08-23 00:30:51', '2022-08-23 00:30:51'),
(299, 'NA001', 23, '2022-08-23 12:28:17', '2022-08-23 12:28:17'),
(300, 'NA002', 16, NULL, NULL),
(302, 'NA002', 24, '2022-08-23 18:56:01', '2022-08-23 18:56:01'),
(303, 'NA004', 16, NULL, NULL),
(304, 'NA004', 24, '2022-08-23 19:19:12', '2022-08-23 19:19:12'),
(305, 'NA004', 22, '2022-08-23 19:19:18', '2022-08-23 19:19:18'),
(306, 'NA004', 25, '2022-08-23 19:25:44', '2022-08-23 19:25:44'),
(307, 'NA004', 14, '2022-08-23 19:28:06', '2022-08-23 19:28:06'),
(308, 'NA001', 25, '2022-08-23 19:28:41', '2022-08-23 19:28:41'),
(310, 'NA001', 26, '2022-08-23 23:37:32', '2022-08-23 23:37:32'),
(311, 'NA002', 26, '2022-08-23 23:42:13', '2022-08-23 23:42:13'),
(313, 'NA001', 24, '2022-09-12 13:21:17', '2022-09-12 13:21:17'),
(314, 'NA001', 27, '2022-09-12 15:19:48', '2022-09-12 15:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_seasons`
--

CREATE TABLE `recruitment_seasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `currently_active` int(11) NOT NULL DEFAULT 0,
  `edit_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruitment_seasons`
--

INSERT INTO `recruitment_seasons` (`id`, `season`, `start_date`, `end_date`, `currently_active`, `edit_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Intake 1', '2022-09-01', '2022-09-14', 1, '0', NULL, '0', NULL, '2022-09-14 01:46:34'),
(2, 'intake 2', '2022-09-14', '2022-09-22', 0, '0', '4', '0', '2022-09-04 07:32:27', '2022-09-04 07:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_season_tests`
--

CREATE TABLE `recruitment_season_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `mark_limit` int(11) NOT NULL,
  `edit_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_vacancies`
--

CREATE TABLE `recruitment_vacancies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `vacancies` int(11) DEFAULT NULL,
  `edit_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruitment_vacancies`
--

INSERT INTO `recruitment_vacancies` (`id`, `season_id`, `designation_id`, `vacancies`, `edit_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 60, '0', '4', '0', NULL, NULL),
(2, 1, 2, 20, '0', '4', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(10) UNSIGNED NOT NULL,
  `req_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `req_type`, `description`, `priority`, `status`, `emp_id`, `created_at`, `updated_at`) VALUES
(1, 'Transport', 'I Transport go to wellamadama premises', 'HIGH', 'Pending', 'NA001', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_chats`
--

CREATE TABLE `request_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_chats`
--

INSERT INTO `request_chats` (`id`, `msg`, `emp_id`, `selector`, `request_id`, `created_at`, `updated_at`) VALUES
(2, 'Hiiiiiiiii', 'NA001', 'admin', '1', '2022-07-28 06:18:48', '2022-07-28 06:18:48'),
(3, 'Hiiii2', 'NA001', 'admin', '1', '2022-07-28 06:29:31', '2022-07-28 06:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `request_insurances`
--

CREATE TABLE `request_insurances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `official_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_scheme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_lists`
--

CREATE TABLE `request_lists` (
  `request_id` int(10) UNSIGNED NOT NULL,
  `req_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_lists`
--

INSERT INTO `request_lists` (`request_id`, `req_type`, `description`, `priority`, `status`, `emp_id`, `created_at`, `updated_at`) VALUES
(2, 'Transport', 'Need Transport', 'High', 'approved', 'NA001', NULL, NULL),
(3, 'Leave', 'Test 2', 'High', 'Pending', 'NA002', '2022-07-04 05:26:18', '2022-07-04 05:26:18'),
(4, 'Leave', 'Test2', 'High', 'Pending', 'NA002', '2022-07-04 05:28:33', '2022-07-04 05:28:33'),
(6, 'Transport', 'Need Traacker2', 'High', 'Pending', 'NA002', '2022-07-20 02:01:05', '2022-07-20 02:01:05'),
(7, 'Transport', 'Need BMW', 'Low', 'Pending', 'NA002', '2022-07-20 03:54:06', '2022-07-20 03:54:06'),
(9, 'Furniture', 'I need Furniture', 'High', 'Approved', 'NA002', '2022-07-20 06:12:12', '2022-07-20 06:12:12'),
(10, 'Transfer', 'Transfer need to another campus', 'High', 'Rejected', 'NA002', '2022-07-20 06:24:45', '2022-07-20 06:24:45'),
(11, 'Insurance', 'Test Insurance request', 'High', 'Approved', 'NA002', '2022-07-20 06:30:34', '2022-07-20 06:30:34'),
(12, 'Promotion', 'Test Promotion', 'High', 'Pending', 'NA002', '2022-07-20 06:37:18', '2022-07-20 06:37:18'),
(13, 'Increment', 'Increments Test', 'High', 'Pending', 'NA002', '2022-07-20 07:00:17', '2022-07-20 07:00:17'),
(14, 'Other', 'Other Test', 'High', 'Approved', 'NA002', '2022-07-20 07:03:35', '2022-07-20 07:03:35'),
(15, 'Furniture', 'I need 2 Chairs for ICt Lab spc Computer Chairs', 'High', 'Approved', 'NA002', '2022-07-28 20:42:27', '2022-07-28 20:42:27'),
(16, 'Other', 'Other Test', 'High', 'Pending', 'NA002', '2022-07-30 23:29:07', '2022-07-30 23:29:07'),
(18, 'Furniture', 'Need Chair', 'High', 'Rejected', 'NA003', '2022-08-19 19:39:22', '2022-08-19 19:39:22'),
(19, 'Transfer', 'Need Transfer for another faculty', 'High', 'Pending', 'NA003', '2022-08-19 19:44:14', '2022-08-19 19:44:14'),
(21, 'Promotion', 'NeeD promotion', 'High', 'Pending', 'NA003', '2022-08-19 20:09:24', '2022-08-19 20:09:24'),
(22, 'Increment', 'Need Increment', 'High', 'Pending', 'NA003', '2022-08-19 20:09:39', '2022-08-19 20:09:39'),
(25, 'Furniture', 'Need Table', 'High', 'Pending', 'NA001', '2022-08-21 22:43:53', '2022-08-21 22:43:53'),
(26, 'Furniture', 'Wants', 'High', 'Pending', 'NA001', '2022-08-21 22:45:54', '2022-08-21 22:45:54'),
(27, 'Transfer', 'Test Done', 'High', 'Pending', 'NA001', '2022-08-21 23:02:20', '2022-08-21 23:02:20'),
(28, 'Furniture', 'Test Furniture Request', 'High', 'Pending', 'NA001', '2022-08-21 23:05:57', '2022-08-21 23:05:57'),
(29, 'Insurance', 'Test Done 2', 'High', 'Pending', 'NA001', '2022-08-21 23:06:52', '2022-08-21 23:06:52'),
(30, 'Promotion', 'Need It', 'High', 'Pending', 'NA001', '2022-08-21 23:15:32', '2022-08-21 23:15:32'),
(31, 'Increment', 'Test Done 2', 'High', 'Pending', 'NA001', '2022-08-21 23:16:52', '2022-08-21 23:16:52'),
(32, 'Other', 'Test done2', 'High', 'Pending', 'NA001', '2022-08-21 23:17:56', '2022-08-21 23:17:56'),
(33, 'Furniture', 'Test', 'High', 'Pending', 'NA001', '2022-08-21 23:45:21', '2022-08-21 23:45:21'),
(34, 'Transfer', 'Test alignment', 'High', 'Pending', 'NA001', '2022-08-21 23:58:43', '2022-08-21 23:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `request_promotions`
--

CREATE TABLE `request_promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(11) NOT NULL,
  `post_confirm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_position_grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_join_present_post` date NOT NULL,
  `expect_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `done_study_or_abroad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_start_date` date DEFAULT NULL,
  `leave_end_date` date DEFAULT NULL,
  `grade_of_expect_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_promotions`
--

INSERT INTO `request_promotions` (`id`, `emp_id`, `name`, `mobile`, `post_confirm`, `current_position`, `current_position_grade`, `date_of_join_present_post`, `expect_post`, `done_study_or_abroad`, `leave_start_date`, `leave_end_date`, `grade_of_expect_post`, `other`, `status`, `created_at`, `updated_at`) VALUES
(28, 'NA002', 'Lakshitha Dilshan', 702222200, 'on', 'admin', 'A', '2022-09-13', 'Admin', 'on', '2022-09-13', '2022-09-13', 'A', 'xc xc', 'Pending', '2022-09-13 05:11:44', '2022-09-13 05:11:44'),
(30, 'NA004', 'lkhjbdsl', 702222200, 'on', 'odujv', 'ksbef', '2022-09-14', 'skdbjc', 'on', '2022-09-14', '2022-09-14', 'A', 'lkdns', 'Pending', '2022-09-13 21:38:34', '2022-09-13 21:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `request_prom_current_position_grades`
--

CREATE TABLE `request_prom_current_position_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `application_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_prom_current_position_grades`
--

INSERT INTO `request_prom_current_position_grades` (`id`, `emp_id`, `grade`, `from`, `to`, `application_id`, `position`, `created_at`, `updated_at`) VALUES
(28, 'NA002', 'A', '2022-09-13', '2022-09-13', NULL, 'MA', '2022-09-13 05:11:58', '2022-09-13 05:11:58'),
(29, 'NA001', 'A', '2022-09-14', '2022-09-14', NULL, 'MA', '2022-09-13 13:45:59', '2022-09-13 13:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `request_prom_service_details`
--

CREATE TABLE `request_prom_service_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_prom_service_details`
--

INSERT INTO `request_prom_service_details` (`id`, `emp_id`, `application_id`, `university`, `position`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 'NA001', NULL, 'Ruhuna', 'Admin', '2022-09-10', '2022-09-10', '2022-09-10 04:02:20', '2022-09-10 04:02:20'),
(12, 'NA002', NULL, 'Ruhuna', 'MA', '2022-09-13', '2022-09-13', '2022-09-13 05:08:04', '2022-09-13 05:08:04'),
(13, 'NA002', NULL, 'Kalaniya', 'MA', '2022-09-13', '2022-09-13', '2022-09-13 05:12:15', '2022-09-13 05:12:15'),
(17, 'NA001', NULL, 'Ruhuna', 'MA', '2022-09-14', '2022-09-14', '2022-09-13 13:46:57', '2022-09-13 13:46:57'),
(20, 'NA005', NULL, 'Kalaniya', 'MA', '2022-09-23', '2022-09-23', '2022-09-22 20:07:27', '2022-09-22 20:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `request_transfers`
--

CREATE TABLE `request_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `fname` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permenant_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempory_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(11) NOT NULL,
  `martial_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Present_position_date_of_appointment` date NOT NULL,
  `Date_confirmed_in_present_post` date NOT NULL,
  `name_of_current_working_institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_faculty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Length_of_service_years` int(11) NOT NULL,
  `Length_of_service_months` int(11) NOT NULL,
  `Length_of_service_days` int(11) NOT NULL,
  `transfered_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partners_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_for_transfer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_transfers`
--

INSERT INTO `request_transfers` (`id`, `emp_id`, `dob`, `fname`, `permenant_address`, `tempory_address`, `mobile`, `martial_status`, `present_position`, `Present_position_date_of_appointment`, `Date_confirmed_in_present_post`, `name_of_current_working_institute`, `current_faculty`, `Length_of_service_years`, `Length_of_service_months`, `Length_of_service_days`, `transfered_reason`, `partner_position`, `partners_place`, `reason_for_transfer`, `status`, `created_at`, `updated_at`) VALUES
(25, 'NA002', '2022-09-14', 'uowhenf', 'kvjj', 'uikvuki', 702222200, 'Unmarried', 'iukv', '2022-09-13', '2022-09-13', 'jkb,kk', 'j l,', 1, 1, 1, 'khb', 'kjb', '.m', 'mn', 'Pending', '2022-09-13 04:32:15', '2022-09-13 04:32:15'),
(26, 'NA004', '2022-09-18', 'lkbajr', 'lsjdn c', 'qlknw', 702222200, 'Unmarried', 'sjdlv', '2022-09-14', '2022-09-14', 'lsekf', 'lekkf', 1, 1, 1, 'kjdv```', 'ljndf', 'kjdbs', 'lsncn', 'Pending', '2022-09-13 21:30:53', '2022-09-13 21:30:53'),
(27, 'NA005', '2022-09-19', 'Menura Maheepala', 'Matugama', 'Matugama', 702222200, 'Unmarried', 'Normal', '2022-09-23', '2022-09-23', 'Ruhuna', 'ICT', 1, 1, 1, 'Promotion', 'teacher', 'MCC', 'other', 'Pending', '2022-09-22 20:06:24', '2022-09-22 20:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `request_transfer_expect_companies`
--

CREATE TABLE `request_transfer_expect_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_transfer_expect_companies`
--

INSERT INTO `request_transfer_expect_companies` (`id`, `emp_id`, `company`, `application_id`, `created_at`, `updated_at`) VALUES
(1, 'NA001', 'Peradeniya University', NULL, '2022-09-11 13:34:06', '2022-09-11 13:34:06'),
(4, 'NA002', 'Ruhuna', NULL, '2022-09-13 05:07:01', '2022-09-13 05:07:01'),
(5, 'NA001', 'Ruhuna', NULL, '2022-09-13 13:29:53', '2022-09-13 13:29:53'),
(6, 'NA005', 'Peradeniya University', NULL, '2022-09-22 20:06:34', '2022-09-22 20:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `request_transfer_loans`
--

CREATE TABLE `request_transfer_loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remain_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remain_monthss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remain_years` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_transfer_loans`
--

INSERT INTO `request_transfer_loans` (`id`, `emp_id`, `loan`, `remain_days`, `remain_monthss`, `remain_years`, `application_id`, `created_at`, `updated_at`) VALUES
(1, 'NA001', 'Co-op', '2', '2', '10', NULL, '2022-09-11 10:49:03', '2022-09-11 10:49:03'),
(7, 'NA001', 'Pplz', '1', '1', '1', NULL, '2022-09-12 14:27:46', '2022-09-12 14:27:46'),
(9, 'NA002', 'Pplz', '1', '1', '1', NULL, '2022-09-13 05:07:46', '2022-09-13 05:07:46'),
(10, 'NA001', 'Co-op', '1', '1', '1', NULL, '2022-09-13 13:29:41', '2022-09-13 13:29:41'),
(11, 'NA005', 'Co-op', '1', '1', '1', NULL, '2022-09-22 20:06:50', '2022-09-22 20:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `request_types`
--

CREATE TABLE `request_types` (
  `request_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_types`
--

INSERT INTO `request_types` (`request_id`, `request_type`, `created_at`, `updated_at`) VALUES
('Req001', 'Meeting', NULL, NULL),
('Req002', 'Transport', NULL, NULL),
('Req003', 'Furniture', NULL, NULL),
('Req004', 'Medicine', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_vehicles`
--

CREATE TABLE `request_vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Availability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fromv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tov` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `seats` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '5',
  `HOD_status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `Dean_status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `VC_status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `hodreason` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deanreason` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_vehicles`
--

INSERT INTO `request_vehicles` (`id`, `name`, `description`, `priority`, `Availability`, `status`, `emp_id`, `fromv`, `tov`, `time`, `seats`, `HOD_status`, `Dean_status`, `VC_status`, `hodreason`, `deanreason`, `created_at`, `updated_at`) VALUES
(1, 'Van', 'Testt', 'High', NULL, 'Pending', 'NA001', 'Wellamadama', 'Faculty  of Arts', '2022-09-09 07:52:00', '5', 'Approved', 'Approved', 'Pending', 'test hod', NULL, '2022-09-08 20:53:36', '2022-09-08 20:53:36'),
(6, 'Van', 'Testiiiiiiiiiiiiiiiii', 'High', NULL, 'Rejected', 'NA002', 'Wellamadama', 'Faculty  of Technology', '2022-09-13 16:02:00', '5', 'Rejected', 'Rejected', 'Pending', NULL, NULL, '2022-09-13 05:03:36', '2022-09-13 05:03:36'),
(7, 'Van', 'Tesr', 'High', NULL, 'Pending', 'NA004', 'TT', 'TT', '2022-09-13 22:46:00', '2', 'Approved', 'Pending', 'Pending', NULL, 'Test dean1', '2022-09-13 11:47:00', '2022-09-13 11:47:00'),
(11, 'Van', 'Immdiate', 'High', NULL, 'Pending', 'NA005', 'Technology Faculty', 'Wellamadama Main', '2022-09-25 17:47:00', '2', 'Approved', 'Approved', 'Pending', 'Good', 'Good', '2022-09-25 06:47:22', '2022-09-25 06:47:22'),
(12, 'Van', 'test', 'High', NULL, 'Pending', 'NA012', 'Wellamadama', 'Faculty  of Technology', '2022-10-09 13:54:00', '4', 'Rejected', 'Pending', 'Pending', 'Not Available Vehicles', NULL, '2022-10-09 02:54:09', '2022-10-09 02:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `self_notifications`
--

CREATE TABLE `self_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cdcRZfrc1sivylJdf4AN5otidwLM38aC6BmGkAH7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTozMDp7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9Vc2VyUmVxdWVzdG1vZHVsZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJ4MmlxcHpyM2ZBcm9PcGpzN2JpanFSM0tNbFdVV3dQMlh1anRvcnh4IjtzOjk6ImxpZ2h0bW9kZSI7czo1OiJsaWdodCI7czoxMzoibGlnaHRtb2RlaWNvbiI7czoxODoiZmlyc3QtcXVhcnRlci1tb29uIjtzOjU6InBsYWNlIjtzOjE6IioiO3M6NToiaW5kZXgiO3M6MDoiIjtzOjY6Im1hbmFnZSI7czowOiIiO3M6ODoiZW1wbG95ZWUiO3M6MDoiIjtzOjc6InJlcXVlc3QiO3M6MTc6InNpZGUtbWVudS0tYWN0aXZlIjtzOjg6ImNvbXBsYWluIjtzOjA6IiI7czo0OiJyYXZlIjtzOjA6IiI7czo2OiJzb2NpYWwiO3M6MDoiIjtzOjY6Im1vYmlsZSI7czowOiIiO3M6Njoibm90aWNlIjtzOjA6IiI7czo4OiJwZXJzb25hbCI7czowOiIiO3M6NToibGVhdmUiO3M6MDoiIjtzOjk6InVzZXJuYW1lZSI7czo5OiJsYWtzaGl0aGEiO3M6NjoiZW1wX2lkIjtzOjU6Ik5BMDAxIjtzOjg6InVzZXJ0eXBlIjtzOjEwOiJzdXBlckFkbWluIjtzOjY6InByb3BpYyI7czoxNDoiMTY1NjkxMzE4NS5qcGciO3M6MTA6InVzZXJfZW1haWwiO3M6MzM6Imxha3NoaXRoYWlzdXJ1LmRpbHNoYW4yQGdtYWlsLmNvbSI7czo3OiJ1c2VyX2lkIjtzOjU6Ik5BMDAxIjtzOjE0OiJlbXBsb3llZV9lbWFpbCI7czozMzoibGFrc2hpdGhhaXN1cnUuZGlsc2hhbjJAZ21haWwuY29tIjtzOjExOiJlbXBsb3llZV9pZCI7czo1OiJOQTAwMSI7czoxMzoiZW1wbG95ZWVfbmFtZSI7czo5OiJsYWtzaGl0aGEiO3M6MjQ6ImVtcGxveWVlX2RlcGFydG1lbnRfbmFtZSI7czozOiJJQ1QiO3M6MjE6ImVtcGxveWVlX2ZhY3VsdHlfbmFtZSI7czoxMDoiVGVjaG5vbG9neSI7czoyNToiZW1wbG95ZWVfZGVzaWduYXRpb25fbmFtZSI7czoxNzoiVGVjaG5pY2FsIE9mZmljZXIiO3M6OToiYXR0ZWRhbmNlIjtzOjA6IiI7fQ==', 1675582393);

-- --------------------------------------------------------

--
-- Table structure for table `short_leaves`
--

CREATE TABLE `short_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `initiate_date` date DEFAULT NULL,
  `leave_start_day` time NOT NULL,
  `leave_end_day` time NOT NULL,
  `Reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `comment` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `short_leaves`
--

INSERT INTO `short_leaves` (`id`, `emp_id`, `usertype`, `Place`, `count`, `initiate_date`, `leave_start_day`, `leave_end_day`, `Reason`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(11, 'NA002', 'Genaral', 'ICT', 1, NULL, '12:17:00', '12:17:00', 'Family Commitment', 'Pending', 'Test', '2022-07-19 01:17:59', '2022-07-19 01:17:59'),
(13, 'NA001', 'admin', 'ICT', 1, NULL, '14:11:00', '15:11:00', 'Examinations', 'Pending', 'Test', '2022-08-17 03:11:19', '2022-08-17 03:11:19'),
(15, 'NA001', 'admin', 'ICT', 1, NULL, '05:42:00', '06:42:00', 'Study Purpose', 'Rejected', NULL, '2022-08-18 18:44:52', '2022-08-18 18:44:52'),
(17, 'NA004', 'admin', 'ET', 1, NULL, '10:59:00', '02:55:00', 'Examinations', 'Rejected', NULL, '2022-08-23 06:30:29', '2022-08-23 06:30:29'),
(23, 'NA001', 'superAdmin', '*', 1, NULL, '13:00:00', '15:29:00', 'Family Commitment', 'Pending', NULL, '2022-09-17 08:35:13', '2022-09-17 08:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `socialmediaprofiles`
--

CREATE TABLE `socialmediaprofiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profilepic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'noimage.jpg',
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcount` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialmediaprofiles`
--

INSERT INTO `socialmediaprofiles` (`id`, `profilepic`, `bio`, `username`, `postcount`, `name`, `emp_id`, `email`, `insta`, `twitter`, `created_at`, `updated_at`) VALUES
(1, '1661317852.jpg', 'White', 'lakshitha', 3, 'Lakshitha isuru', 'NA001', 'lakshithaisuru.dilshan2@gmail.com', 'lakshith', 'lakshithtweet', '2022-07-09 05:50:43', NULL),
(14, '1657362738.jpg', 'White', 'ravi', 0, 'Mohottala Ravindu', 'NA002', 'ravi@gmail.com', 'raveedot', 'raveetweeet', '2022-08-23 02:09:40', '2022-08-23 02:09:40'),
(22, '', '', 'Mudeesha', 0, 'Mudeesha', 'NA003', 'mudeeshatharindudilshan@gmail.com', '', '', '2022-08-23 23:25:26', '2022-08-23 23:25:26'),
(31, '', '', 'Nirasha', 0, 'Nirasha', 'NA004', 'nirasha@gmail.com', '', '', '2022-09-14 01:59:50', '2022-09-14 01:59:50'),
(32, '', '', 'Menura', 0, 'Menura', 'NA005', 'menura@gmail.com', '', '', '2022-09-22 19:26:30', '2022-09-22 19:26:30'),
(33, '', '', 'Ruwan', 0, 'Ruwan', 'NA006', 'ruwan@gmail.com', '', '', '2022-10-09 01:43:38', '2022-10-09 01:43:38'),
(34, '', '', 'Anton', 0, 'Anton', 'NA007', 'anton@gmail.com', '', '', '2022-10-09 01:44:58', '2022-10-09 01:44:58'),
(35, '', '', 'Anjali', 0, 'Anjali', 'NA008', 'anajli@gmail.com', '', '', '2022-10-09 02:48:41', '2022-10-09 02:48:41'),
(36, '', '', 'Waruna', 0, 'Waruna', 'NA009', 'waruna@gmail.com', '', '', '2022-10-09 02:49:14', '2022-10-09 02:49:14'),
(37, '', '', 'Waruna', 0, 'Waruna', 'NA010', 'gamini@gmail.com', '', '', '2022-10-09 02:49:37', '2022-10-09 02:49:37'),
(38, '', '', 'Sameeera', 0, 'Sameeera', 'NA011', 'sameera@gmail.com', '', '', '2022-10-09 02:50:08', '2022-10-09 02:50:08'),
(39, '', '', 'test', 0, 'test', 'NA012', 'test@gmail.com', '', '', '2022-10-09 02:51:34', '2022-10-09 02:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_notifications`
--

CREATE TABLE `social_media_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `did_people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media_notifications`
--

INSERT INTO `social_media_notifications` (`id`, `text`, `pic_people`, `to_people`, `did_people`, `created_at`, `updated_at`) VALUES
(1, 'Commented on your More photo', 'R.jpg', 'NA002', 'Ravindu', '2022-07-11 23:14:42', '2022-07-11 23:14:42'),
(2, 'Commented on your Update photo', 'R.jpg', 'NA001', 'Ravindu', '2022-07-11 23:16:01', '2022-07-11 23:16:01'),
(3, 'Commented on your Done photo', 'b.jpg', 'NA002', 'Mudeesha', '2022-07-12 00:14:25', '2022-07-12 00:14:25'),
(4, 'Commented on your Fill photo', 'mudeesha.jpg', 'NA002', 'Mudeesha', '2022-07-12 00:16:22', '2022-07-12 00:16:22'),
(5, 'Commented on your Circular photo', 'R.jpg', 'NA003', 'Ravindu', '2022-07-12 00:16:53', '2022-07-12 00:16:53'),
(6, 'Commented on your Good AfterNoon photo', 'R.jpg', 'NA002', 'Ravindu', '2022-07-20 09:14:19', '2022-07-20 09:14:19'),
(7, 'Commented on your Circular photo', 'R.jpg', 'NA003', 'Ravindu', '2022-07-29 06:42:59', '2022-07-29 06:42:59'),
(8, 'Commented on your More photo', '1659152093.jpg', 'NA002', 'lakshitha', '2022-08-03 10:02:06', '2022-08-03 10:02:06'),
(9, 'Commented on your More photo', '1656913185.jpg', 'NA002', 'lakshitha', '2022-08-05 01:24:16', '2022-08-05 01:24:16'),
(10, 'Commented on your More photo', '1656913185.jpg', 'NA002', 'lakshitha', '2022-08-05 20:44:07', '2022-08-05 20:44:07'),
(11, 'Commented on your Update photo', '1657362738.jpg', 'NA001', 'Ravindu', '2022-08-05 20:44:53', '2022-08-05 20:44:53'),
(12, 'Commented on your Circular photo', '1657362738.jpg', 'NA003', 'Ravindu', '2022-08-05 20:49:40', '2022-08-05 20:49:40'),
(13, 'Commented on your Test photo', '1656913185.jpg', 'NA001', 'lakshitha', '2022-08-22 10:43:43', '2022-08-22 10:43:43'),
(14, 'Commented on your Final Presenatation photo', '1656913185.jpg', 'NA001', 'lakshitha', '2022-08-23 12:37:49', '2022-08-23 12:37:49'),
(15, 'Commented on your Circular photo', '1656913185.jpg', 'NA003', 'lakshitha', '2022-08-23 12:38:23', '2022-08-23 12:38:23'),
(16, 'Commented on your Final Presenatation photo', '1656913185.jpg', 'NA001', 'lakshitha', '2022-08-23 13:05:07', '2022-08-23 13:05:07'),
(17, 'Commented on your Final Presenatation photo', '1656913185.jpg', 'NA001', 'lakshitha', '2022-08-23 13:05:53', '2022-08-23 13:05:53'),
(18, 'Commented on your Final Presenatation photo', '1657362738.jpg', 'NA001', 'Ravindu', '2022-08-23 13:12:41', '2022-08-23 13:12:41'),
(19, 'Commented on your New Circular photo', '289921946_1060893321507303_6180700595397191393_n.jpg', 'NA002', 'Nirasha', '2022-08-23 19:18:35', '2022-08-23 19:18:35'),
(20, 'Commented on your More photo', '289921946_1060893321507303_6180700595397191393_n.jpg', 'NA002', 'Nirasha', '2022-08-23 19:28:03', '2022-08-23 19:28:03'),
(21, 'Commented on your My Graduation photo', '1656913185.jpg', 'NA004', 'lakshitha', '2022-08-23 19:28:53', '2022-08-23 19:28:53'),
(22, 'Commented on your New Circular photo', '1656913185.jpg', 'NA002', 'lakshitha', '2022-08-23 19:29:13', '2022-08-23 19:29:13'),
(23, 'Commented on your Today Final Presentation photo', '1656913185.jpg', 'NA001', 'lakshitha', '2022-08-23 23:37:45', '2022-08-23 23:37:45'),
(24, 'Commented on your New Circular photo', '1656913185.jpg', 'NA002', 'lakshitha', '2022-08-23 23:41:20', '2022-08-23 23:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'appliciant 1', 'appliciant1@gmail.com', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'appliciant2', 'appliciant@gmail.com', NULL, '987456321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Mudeesha', 'mudeeshatharindudilshan@gmail.com', NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Nirasha', 'nirasha@gmail.com', NULL, '12345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'exampleapp', 'exam@gmail.com', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-23 22:35:05', '2022-08-23 22:35:05'),
(6, 'appliciant11', 'appliciant11@gmail.com', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-23 23:16:15', '2022-08-23 23:16:15'),
(8, 'kk', 'kk@gmail.com', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-24 03:07:55', '2022-08-24 03:07:55'),
(13, 'Aththa', 'aththavisthara@gmail.com', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-24 07:00:37', '2022-08-24 07:00:37'),
(14, 'vinod', 'jayasooriya@gmaail.com', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-24 07:02:31', '2022-08-24 07:02:31'),
(15, 'Sasindu', 'sasividu@gmail.com', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-24 07:08:16', '2022-08-24 07:08:16'),
(16, 'Menura', 'menura@gmail.com', NULL, '12345678', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-24 09:05:38', '2022-08-24 09:05:38'),
(17, 'Mudeesha', 'mudee@gmail.com', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-28 03:08:58', '2022-08-28 03:08:58'),
(18, 'test', 'test@gmail.com', NULL, '12345678', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-04 20:36:55', '2022-09-04 20:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `usertype_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`usertype_id`, `usertype`, `created_at`, `updated_at`) VALUES
('a001', 'Admin', '2022-07-10 08:36:34', NULL),
('g002', 'Genaral', '2022-07-09 18:30:00', NULL),
('g003', 'HOD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Van', 'Available', NULL, NULL),
(2, 'Bike', 'Not Available', NULL, NULL),
(3, 'Nissan Van', 'Available', NULL, NULL),
(4, 'BMW Car', 'Available', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrative_notifications`
--
ALTER TABLE `administrative_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrative_notifications_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `administrative_read_users`
--
ALTER TABLE `administrative_read_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrative_read_users_notification_id_foreign` (`notification_id`),
  ADD KEY `administrative_read_users_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `allusers`
--
ALTER TABLE `allusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `allusers_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `appliciants`
--
ALTER TABLE `appliciants`
  ADD PRIMARY KEY (`appliciant_id`),
  ADD KEY `appliciants_user_id_foreign` (`user_id`),
  ADD KEY `appliciants_designation_id_foreign` (`designation_id`),
  ADD KEY `appliciants_season_id_foreign` (`season_id`),
  ADD KEY `appliciants_email_foreign` (`email`);

--
-- Indexes for table `appliciant_al_examinations`
--
ALTER TABLE `appliciant_al_examinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appliciant_al_examinations_appliciant_id_foreign` (`appliciant_id`);

--
-- Indexes for table `appliciant_employment_records`
--
ALTER TABLE `appliciant_employment_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appliciant_employment_records_appliciant_id_foreign` (`appliciant_id`);

--
-- Indexes for table `appliciant_exams`
--
ALTER TABLE `appliciant_exams`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `appliciant_exams_season_id_foreign` (`season_id`),
  ADD KEY `appliciant_exams_test_id_foreign` (`test_id`);

--
-- Indexes for table `appliciant_exam_users`
--
ALTER TABLE `appliciant_exam_users`
  ADD PRIMARY KEY (`mark_id`),
  ADD KEY `appliciant_exam_users_season_id_foreign` (`season_id`),
  ADD KEY `appliciant_exam_users_appliciant_id_foreign` (`appliciant_id`),
  ADD KEY `appliciant_exam_users_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `appliciant_ol_examinations`
--
ALTER TABLE `appliciant_ol_examinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appliciant_ol_examinations_appliciant_id_foreign` (`appliciant_id`);

--
-- Indexes for table `appliciant_other_education`
--
ALTER TABLE `appliciant_other_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appliciant_other_education_appliciant_id_foreign` (`appliciant_id`);

--
-- Indexes for table `appliciant_present_occaptions`
--
ALTER TABLE `appliciant_present_occaptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appliciant_present_occaptions_appliciant_id_foreign` (`appliciant_id`);

--
-- Indexes for table `appliciant_professional_qualifications`
--
ALTER TABLE `appliciant_professional_qualifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appliciant_professional_qualifications_appliciant_id_foreign` (`appliciant_id`);

--
-- Indexes for table `appliciant_references`
--
ALTER TABLE `appliciant_references`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appliciant_references_appliciant_id_foreign` (`appliciant_id`);

--
-- Indexes for table `appliciant_school_attendeds`
--
ALTER TABLE `appliciant_school_attendeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appliciant_school_attendeds_appliciant_id_foreign` (`appliciant_id`);

--
-- Indexes for table `appliciant_self_notifications`
--
ALTER TABLE `appliciant_self_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appliciant_self_notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `appliciant_tests`
--
ALTER TABLE `appliciant_tests`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `appliciant_tests_designation_id_foreign` (`designation_id`);

--
-- Indexes for table `appliciant_university_education`
--
ALTER TABLE `appliciant_university_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appliciant_university_education_appliciant_id_foreign` (`appliciant_id`);

--
-- Indexes for table `attendences`
--
ALTER TABLE `attendences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendences_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `casual_leaves`
--
ALTER TABLE `casual_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `casual_leaves_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_id`),
  ADD KEY `comments_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`complain_id`),
  ADD KEY `complains_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `departments_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_self_notifications`
--
ALTER TABLE `employee_self_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_self_notifications_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `half_day_leaves`
--
ALTER TABLE `half_day_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `half_day_leaves_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `leave_counts`
--
ALTER TABLE `leave_counts`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `leave_reasons`
--
ALTER TABLE `leave_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_leaves`
--
ALTER TABLE `medical_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medical_leaves_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notices_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personalfiles`
--
ALTER TABLE `personalfiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personalfiles_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `personalfile_types`
--
ALTER TABLE `personalfile_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `raves`
--
ALTER TABLE `raves`
  ADD PRIMARY KEY (`rave_id`),
  ADD KEY `raves_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `rave_comments`
--
ALTER TABLE `rave_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rave_comments_rave_id_foreign` (`rave_id`),
  ADD KEY `rave_comments_from_id_foreign` (`from_id`),
  ADD KEY `rave_comments_to_id_foreign` (`to_id`);

--
-- Indexes for table `rave_users`
--
ALTER TABLE `rave_users`
  ADD PRIMARY KEY (`rave_id`),
  ADD KEY `rave_users_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`react_id`),
  ADD KEY `reactions_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `recruitment_seasons`
--
ALTER TABLE `recruitment_seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitment_season_tests`
--
ALTER TABLE `recruitment_season_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruitment_season_tests_season_id_foreign` (`season_id`),
  ADD KEY `recruitment_season_tests_test_id_foreign` (`test_id`);

--
-- Indexes for table `recruitment_vacancies`
--
ALTER TABLE `recruitment_vacancies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruitment_vacancies_season_id_foreign` (`season_id`),
  ADD KEY `recruitment_vacancies_designation_id_foreign` (`designation_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `requests_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `request_chats`
--
ALTER TABLE `request_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_insurances`
--
ALTER TABLE `request_insurances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `request_lists`
--
ALTER TABLE `request_lists`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `request_lists_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `request_promotions`
--
ALTER TABLE `request_promotions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `request_prom_current_position_grades`
--
ALTER TABLE `request_prom_current_position_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_prom_current_position_grades_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `request_prom_service_details`
--
ALTER TABLE `request_prom_service_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_prom_service_details_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `request_transfers`
--
ALTER TABLE `request_transfers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `request_transfer_expect_companies`
--
ALTER TABLE `request_transfer_expect_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_transfer_expect_companies_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `request_transfer_loans`
--
ALTER TABLE `request_transfer_loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_transfer_loans_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `request_types`
--
ALTER TABLE `request_types`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `request_vehicles`
--
ALTER TABLE `request_vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_vehicles_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `self_notifications`
--
ALTER TABLE `self_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `self_notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `short_leaves`
--
ALTER TABLE `short_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `short_leaves_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `socialmediaprofiles`
--
ALTER TABLE `socialmediaprofiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socialmediaprofiles_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `social_media_notifications`
--
ALTER TABLE `social_media_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`usertype_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrative_notifications`
--
ALTER TABLE `administrative_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `administrative_read_users`
--
ALTER TABLE `administrative_read_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `allusers`
--
ALTER TABLE `allusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `appliciants`
--
ALTER TABLE `appliciants`
  MODIFY `appliciant_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `appliciant_al_examinations`
--
ALTER TABLE `appliciant_al_examinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appliciant_employment_records`
--
ALTER TABLE `appliciant_employment_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appliciant_exams`
--
ALTER TABLE `appliciant_exams`
  MODIFY `exam_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appliciant_exam_users`
--
ALTER TABLE `appliciant_exam_users`
  MODIFY `mark_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appliciant_ol_examinations`
--
ALTER TABLE `appliciant_ol_examinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appliciant_other_education`
--
ALTER TABLE `appliciant_other_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appliciant_present_occaptions`
--
ALTER TABLE `appliciant_present_occaptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appliciant_professional_qualifications`
--
ALTER TABLE `appliciant_professional_qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appliciant_references`
--
ALTER TABLE `appliciant_references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `appliciant_school_attendeds`
--
ALTER TABLE `appliciant_school_attendeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `appliciant_self_notifications`
--
ALTER TABLE `appliciant_self_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `appliciant_tests`
--
ALTER TABLE `appliciant_tests`
  MODIFY `test_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appliciant_university_education`
--
ALTER TABLE `appliciant_university_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendences`
--
ALTER TABLE `attendences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `casual_leaves`
--
ALTER TABLE `casual_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `complain_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `designation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_self_notifications`
--
ALTER TABLE `employee_self_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `faculty_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `half_day_leaves`
--
ALTER TABLE `half_day_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_reasons`
--
ALTER TABLE `leave_reasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medical_leaves`
--
ALTER TABLE `medical_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personalfiles`
--
ALTER TABLE `personalfiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `personalfile_types`
--
ALTER TABLE `personalfile_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `raves`
--
ALTER TABLE `raves`
  MODIFY `rave_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rave_comments`
--
ALTER TABLE `rave_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rave_users`
--
ALTER TABLE `rave_users`
  MODIFY `rave_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `react_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `recruitment_seasons`
--
ALTER TABLE `recruitment_seasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recruitment_season_tests`
--
ALTER TABLE `recruitment_season_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruitment_vacancies`
--
ALTER TABLE `recruitment_vacancies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_chats`
--
ALTER TABLE `request_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request_insurances`
--
ALTER TABLE `request_insurances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `request_lists`
--
ALTER TABLE `request_lists`
  MODIFY `request_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `request_promotions`
--
ALTER TABLE `request_promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `request_prom_current_position_grades`
--
ALTER TABLE `request_prom_current_position_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `request_prom_service_details`
--
ALTER TABLE `request_prom_service_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `request_transfers`
--
ALTER TABLE `request_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `request_transfer_expect_companies`
--
ALTER TABLE `request_transfer_expect_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request_transfer_loans`
--
ALTER TABLE `request_transfer_loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `request_vehicles`
--
ALTER TABLE `request_vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `self_notifications`
--
ALTER TABLE `self_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `short_leaves`
--
ALTER TABLE `short_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `socialmediaprofiles`
--
ALTER TABLE `socialmediaprofiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `social_media_notifications`
--
ALTER TABLE `social_media_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrative_notifications`
--
ALTER TABLE `administrative_notifications`
  ADD CONSTRAINT `administrative_notifications_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `administrative_read_users`
--
ALTER TABLE `administrative_read_users`
  ADD CONSTRAINT `administrative_read_users_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `administrative_read_users_notification_id_foreign` FOREIGN KEY (`notification_id`) REFERENCES `administrative_notifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `allusers`
--
ALTER TABLE `allusers`
  ADD CONSTRAINT `allusers_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `appliciants`
--
ALTER TABLE `appliciants`
  ADD CONSTRAINT `appliciants_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`designation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appliciants_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `appliciants_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `recruitment_seasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appliciants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_insurances`
--
ALTER TABLE `request_insurances`
  ADD CONSTRAINT `request_insurances_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `request_promotions`
--
ALTER TABLE `request_promotions`
  ADD CONSTRAINT `request_promotions_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `request_prom_current_position_grades`
--
ALTER TABLE `request_prom_current_position_grades`
  ADD CONSTRAINT `request_prom_current_position_grades_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `request_prom_service_details`
--
ALTER TABLE `request_prom_service_details`
  ADD CONSTRAINT `request_prom_service_details_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `request_transfers`
--
ALTER TABLE `request_transfers`
  ADD CONSTRAINT `request_transfers_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `request_transfer_expect_companies`
--
ALTER TABLE `request_transfer_expect_companies`
  ADD CONSTRAINT `request_transfer_expect_companies_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `request_transfer_loans`
--
ALTER TABLE `request_transfer_loans`
  ADD CONSTRAINT `request_transfer_loans_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `request_vehicles`
--
ALTER TABLE `request_vehicles`
  ADD CONSTRAINT `request_vehicles_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
