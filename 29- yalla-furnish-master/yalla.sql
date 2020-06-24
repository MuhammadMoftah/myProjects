-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 04:18 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yalla`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activity`, `user_id`, `created_at`, `updated_at`) VALUES
(213, 'Follow <a href=\'/showroom/4\'>Darac</a>', 18, '2019-11-06 04:13:17', '2019-11-06 04:13:17'),
(214, 'Follow <a href=\'/showroom/30\'>Verinno</a>', 4, '2019-11-06 15:25:07', '2019-11-06 15:25:07'),
(215, 'Follow <a href=\'/showroom/29\'>La Vitrine</a>', 4, '2019-11-06 15:25:08', '2019-11-06 15:25:08'),
(216, 'Follow <a href=\'/showroom/28\'>Ogawa</a>', 4, '2019-11-06 15:25:08', '2019-11-06 15:25:08'),
(217, 'Follow <a href=\'/showroom/27\'>Cube Furniture</a>', 4, '2019-11-06 15:25:10', '2019-11-06 15:25:10'),
(218, 'Follow <a href=\'/showroom/5\'>Ideal House</a>', 4, '2019-11-06 15:25:10', '2019-11-06 15:25:10'),
(219, 'Follow <a href=\'/showroom/24\'>Dibaj Fabrics</a>', 4, '2019-11-06 15:25:11', '2019-11-06 15:25:11'),
(220, 'Follow <a href=\'/showroom/25\'>ORYX Home</a>', 4, '2019-11-06 15:25:12', '2019-11-06 15:25:12'),
(221, 'Follow <a href=\'/showroom/26\'>Prado Egypt</a>', 4, '2019-11-06 15:25:13', '2019-11-06 15:25:13'),
(222, 'Follow <a href=\'/showroom/4\'>Darac</a>', 4, '2019-11-06 15:25:15', '2019-11-06 15:25:15'),
(223, 'Liked <a href=\"https://yalla-furnish.net/topic/16\">This Item</a>', 21, '2019-11-06 16:19:53', '2019-11-06 16:19:53'),
(224, 'Liked <a href=\"https://yalla-furnish.net/idea/21\">This Item</a>', 21, '2019-11-06 16:37:18', '2019-11-06 16:37:18'),
(225, 'Liked <a href=\"https://yalla-furnish.net/topic/16\">This Item</a>', 4, '2019-11-06 16:43:14', '2019-11-06 16:43:14'),
(226, 'Liked <a href=\"https://yalla-furnish.net/topic/16\">This Item</a>', 4, '2019-11-06 16:43:55', '2019-11-06 16:43:55'),
(227, 'Liked <a href=\"https://yalla-furnish.net/topic/16\">This Item</a>', 21, '2019-11-06 16:46:44', '2019-11-06 16:46:44'),
(228, 'Liked <a href=\"https://yalla-furnish.net/topic/16\">This Item</a>', 4, '2019-11-06 16:58:26', '2019-11-06 16:58:26'),
(229, 'Liked <a href=\"https://yalla-furnish.net/topic/16\">This Item</a>', 21, '2019-11-06 17:01:00', '2019-11-06 17:01:00'),
(230, 'Liked <a href=\"https://yalla-furnish.net/topic/16\">This Item</a>', 4, '2019-11-06 18:27:46', '2019-11-06 18:27:46'),
(231, 'Liked <a href=\"https://yalla-furnish.net/topic/16\">This Item</a>', 4, '2019-11-07 21:07:43', '2019-11-07 21:07:43'),
(232, 'Liked <a href=\"https://yalla-furnish.net/topic/16\">This Item</a>', 4, '2019-11-11 15:56:19', '2019-11-11 15:56:19'),
(233, 'Liked <a href=\"https://yalla-furnish.net/topic/16\">This Item</a>', 4, '2019-11-11 15:56:25', '2019-11-11 15:56:25'),
(234, 'Follow <a href=\'/UserProfile/4\'>Yalla</a>', 24, '2019-11-27 15:00:59', '2019-11-27 15:00:59'),
(235, 'Follow <a href=\'/showroom/37\'>Contistahl Group</a>', 24, '2019-11-27 15:01:29', '2019-11-27 15:01:29'),
(236, 'Follow <a href=\'/showroom/43\'>Notch</a>', 24, '2019-11-27 15:01:37', '2019-11-27 15:01:37'),
(237, 'Follow <a href=\'/showroom/42\'>TAGOURY\'S HOUSE</a>', 24, '2019-11-27 15:01:42', '2019-11-27 15:01:42'),
(238, 'Follow <a href=\'/showroom/41\'>Walnut Furniture</a>', 24, '2019-11-27 15:01:48', '2019-11-27 15:01:48'),
(239, 'Follow <a href=\'/showroom/39\'>American Furniture</a>', 24, '2019-11-27 15:01:55', '2019-11-27 15:01:55'),
(240, 'Follow <a href=\'/showroom/38\'>Meuble for French furniture</a>', 24, '2019-11-27 15:02:01', '2019-11-27 15:02:01'),
(241, 'Follow <a href=\'/showroom/40\'>Caracole Egypt</a>', 24, '2019-11-27 15:02:20', '2019-11-27 15:02:20'),
(242, 'Liked <a href=\"http://staging.yalla-furnish.net/topic/16\">This Item</a>', 4, '2019-12-30 11:33:21', '2019-12-30 11:33:21'),
(243, 'Follow <a href=\'/UserProfile/21\'>yo</a>', 25, '2019-12-30 14:42:20', '2019-12-30 14:42:20'),
(244, 'UnFollow <a href=\'/UserProfile/21\'>yo</a>', 25, '2019-12-30 14:42:38', '2019-12-30 14:42:38'),
(245, 'Liked <a href=\"http://staging.yalla-furnish.net/topic/16\">This Item</a>', 4, '2019-12-30 15:17:02', '2019-12-30 15:17:02'),
(246, 'Follow <a href=\'/UserProfile/21\'>yo</a>', 4, '2019-12-30 15:21:39', '2019-12-30 15:21:39'),
(247, 'Commented on <a href=\"http://staging.yalla-furnish.net/topic/16\">This Topic</a>', 4, '2019-12-30 15:27:01', '2019-12-30 15:27:01'),
(248, 'Follow <a href=\'/UserProfile/21\'>yo</a>', 9, '2019-12-30 15:30:03', '2019-12-30 15:30:03'),
(249, 'Follow <a href=\'/UserProfile/4\'>Yalla</a>', 9, '2019-12-30 15:33:24', '2019-12-30 15:33:24'),
(250, 'Follow <a href=\'/UserProfile/9\'>youmn</a>', 4, '2019-12-30 15:35:48', '2019-12-30 15:35:48'),
(251, 'UnFollow <a href=\'/UserProfile/9\'>youmn</a>', 4, '2019-12-30 15:36:15', '2019-12-30 15:36:15'),
(252, 'Follow <a href=\'/UserProfile/9\'>youmn</a>', 4, '2019-12-30 15:36:38', '2019-12-30 15:36:38'),
(253, 'UnFollow <a href=\'/UserProfile/9\'>youmn</a>', 4, '2019-12-30 15:36:39', '2019-12-30 15:36:39'),
(254, 'Follow <a href=\'/showroom/5\'>Ideal House</a>', 9, '2019-12-30 15:38:55', '2019-12-30 15:38:55'),
(257, 'Liked <a href=\"http://staging.yalla-furnish.net/topic/16\">This Item</a>', 25, '2019-12-30 15:43:33', '2019-12-30 15:43:33'),
(258, 'Liked <a href=\"http://staging.yalla-furnish.net/topic/20\">This Item</a>', 25, '2019-12-30 15:43:43', '2019-12-30 15:43:43'),
(259, 'Liked <a href=\"http://staging.yalla-furnish.net/topic/20\">This Item</a>', 25, '2019-12-30 15:43:59', '2019-12-30 15:43:59'),
(260, 'Liked <a href=\"http://staging.yalla-furnish.net/topic/20\">This Item</a>', 4, '2019-12-30 15:45:20', '2019-12-30 15:45:20'),
(261, 'Follow <a href=\'/UserProfile/9\'>youmn</a>', 25, '2019-12-30 15:45:22', '2019-12-30 15:45:22'),
(262, 'Follow <a href=\'/UserProfile/21\'>yo</a>', 25, '2019-12-30 15:45:34', '2019-12-30 15:45:34'),
(263, 'UnFollow <a href=\'/UserProfile/9\'>youmn</a>', 25, '2019-12-30 15:52:11', '2019-12-30 15:52:11'),
(264, 'Follow <a href=\'/showroom/5\'>Ideal House</a>', 25, '2019-12-30 15:53:23', '2019-12-30 15:53:23'),
(265, 'Follow <a href=\'/showroom/27\'>Cube Furniture</a>', 25, '2019-12-30 15:54:44', '2019-12-30 15:54:44'),
(266, 'Follow <a href=\'/UserProfile/9\'>youmn</a>', 4, '2019-12-30 16:03:08', '2019-12-30 16:03:08'),
(267, 'Liked <a href=\"http://staging.yalla-furnish.net/topic/20\">This Item</a>', 9, '2019-12-31 13:47:11', '2019-12-31 13:47:11'),
(268, 'Liked <a href=\"http://staging.yalla-furnish.net/topic/20\">This Item</a>', 9, '2019-12-31 13:47:18', '2019-12-31 13:47:18'),
(269, 'Liked <a href=\"http://staging.yalla-furnish.net/topic/16\">This Item</a>', 9, '2019-12-31 13:47:25', '2019-12-31 13:47:25'),
(270, 'Commented on <a href=\"http://staging.yalla-furnish.net/topic/20\">This Topic</a>', 9, '2019-12-31 13:50:59', '2019-12-31 13:50:59'),
(271, 'Liked <a href=\"http://staging.yalla-furnish.net/topic/23\">This Item</a>', 4, '2020-01-04 00:56:18', '2020-01-04 00:56:18'),
(272, 'Commented on <a href=\"http://staging.yalla-furnish.net/topic/20\">This Topic</a>', 4, '2020-01-04 01:00:44', '2020-01-04 01:00:44'),
(273, 'Commented on <a href=\"http://staging.yalla-furnish.net/topic/25\">This Topic</a>', 4, '2020-01-04 01:55:45', '2020-01-04 01:55:45'),
(274, 'Commented on <a href=\"http://staging.yalla-furnish.net/topic/25\">This Topic</a>', 4, '2020-01-04 01:56:03', '2020-01-04 01:56:03'),
(275, 'Liked <a href=\"http://staging.yalla-furnish.net/topic/28\">This Item</a>', 4, '2020-01-04 01:59:11', '2020-01-04 01:59:11'),
(276, 'Commented on <a href=\"http://staging.yalla-furnish.net/topic/28\">This Topic</a>', 4, '2020-01-04 02:01:53', '2020-01-04 02:01:53'),
(278, 'Liked <a href=\"http://staging.yalla-furnish.net/topic/30\">This Item</a>', 7, '2020-01-04 02:18:31', '2020-01-04 02:18:31'),
(279, 'Commented on <a href=\"http://staging.yalla-furnish.net/topic/29\">This Topic</a>', 7, '2020-01-04 02:18:50', '2020-01-04 02:18:50'),
(280, 'Commented on <a href=\"http://staging.yalla-furnish.net/topic/29\">This Topic</a>', 7, '2020-01-04 02:19:06', '2020-01-04 02:19:06'),
(281, 'Liked <a href=\"http://staging.yalla-furnish.net/topic/26\">This Item</a>', 7, '2020-01-04 02:19:37', '2020-01-04 02:19:37'),
(282, 'Follow <a href=\'/UserProfile/7\'>Maha</a>', 4, '2020-01-04 02:21:21', '2020-01-04 02:21:21'),
(283, 'UnFollow <a href=\'/UserProfile/7\'>Maha</a>', 4, '2020-01-04 02:22:27', '2020-01-04 02:22:27'),
(284, 'Follow <a href=\'/UserProfile/7\'>Maha</a>', 4, '2020-01-04 02:22:28', '2020-01-04 02:22:28'),
(285, 'Commented on <a href=\"http://staging.yalla-furnish.net/product/108\">This Product</a>', 4, '2020-01-05 00:38:43', '2020-01-05 00:38:43'),
(286, 'Commented on <a href=\"http://staging.yalla-furnish.net/product/108\">This Product</a>', 4, '2020-01-05 00:42:04', '2020-01-05 00:42:04'),
(287, 'Commented on <a href=\"http://staging.yalla-furnish.net/product/108\">This Product</a>', 4, '2020-01-05 00:42:14', '2020-01-05 00:42:14'),
(288, 'Commented on <a href=\"http://staging.yalla-furnish.net/product/108\">This Product</a>', 4, '2020-01-05 00:42:22', '2020-01-05 00:42:22'),
(289, 'Commented on <a href=\"http://staging.yalla-furnish.net/topic/31\">This Topic</a>', 4, '2020-01-05 12:07:36', '2020-01-05 12:07:36'),
(290, 'Commented on <a href=\"http://staging.yalla-furnish.net/topic/31\">This Topic</a>', 4, '2020-01-05 12:17:03', '2020-01-05 12:17:03'),
(291, 'Liked <a href=\"https://staging.yalla-furnish.net/idea/31\">This Item</a>', 4, '2020-01-09 13:41:11', '2020-01-09 13:41:11'),
(292, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/31\">This Idea</a>', 4, '2020-01-09 13:41:35', '2020-01-09 13:41:35'),
(293, 'Liked <a href=\"https://staging.yalla-furnish.net/idea/30\">This Item</a>', 4, '2020-01-09 13:42:52', '2020-01-09 13:42:52'),
(294, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:43:01', '2020-01-09 13:43:01'),
(295, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:43:54', '2020-01-09 13:43:54'),
(296, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/31\">This Idea</a>', 4, '2020-01-09 13:45:58', '2020-01-09 13:45:58'),
(297, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/31\">This Idea</a>', 4, '2020-01-09 13:46:00', '2020-01-09 13:46:00'),
(298, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/31\">This Idea</a>', 4, '2020-01-09 13:46:03', '2020-01-09 13:46:03'),
(299, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:46:05', '2020-01-09 13:46:05'),
(300, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/31\">This Idea</a>', 4, '2020-01-09 13:46:06', '2020-01-09 13:46:06'),
(301, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/31\">This Idea</a>', 4, '2020-01-09 13:46:08', '2020-01-09 13:46:08'),
(302, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/31\">This Idea</a>', 4, '2020-01-09 13:46:10', '2020-01-09 13:46:10'),
(303, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:46:11', '2020-01-09 13:46:11'),
(304, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/31\">This Idea</a>', 4, '2020-01-09 13:46:12', '2020-01-09 13:46:12'),
(305, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:46:13', '2020-01-09 13:46:13'),
(306, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/31\">This Idea</a>', 4, '2020-01-09 13:46:15', '2020-01-09 13:46:15'),
(307, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:46:16', '2020-01-09 13:46:16'),
(308, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/31\">This Idea</a>', 4, '2020-01-09 13:46:17', '2020-01-09 13:46:17'),
(309, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:46:19', '2020-01-09 13:46:19'),
(310, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/31\">This Idea</a>', 4, '2020-01-09 13:46:19', '2020-01-09 13:46:19'),
(311, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/31\">This Idea</a>', 4, '2020-01-09 13:46:21', '2020-01-09 13:46:21'),
(312, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:46:21', '2020-01-09 13:46:21'),
(313, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/31\">This Idea</a>', 4, '2020-01-09 13:46:23', '2020-01-09 13:46:23'),
(314, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:46:24', '2020-01-09 13:46:24'),
(315, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:46:28', '2020-01-09 13:46:28'),
(316, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:46:31', '2020-01-09 13:46:31'),
(317, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:46:34', '2020-01-09 13:46:34'),
(318, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:46:38', '2020-01-09 13:46:38'),
(319, 'Commented on <a href=\"https://staging.yalla-furnish.net/idea/30\">This Idea</a>', 4, '2020-01-09 13:46:41', '2020-01-09 13:46:41'),
(320, 'Liked <a href=\"https://staging.yalla-furnish.net/product/109\">This Item</a>', 4, '2020-01-09 13:53:25', '2020-01-09 13:53:25'),
(321, 'Commented on <a href=\"https://staging.yalla-furnish.net/product/109\">This Product</a>', 4, '2020-01-09 13:53:44', '2020-01-09 13:53:44'),
(322, 'Commented on <a href=\"https://staging.yalla-furnish.net/product/109\">This Product</a>', 4, '2020-01-09 13:54:11', '2020-01-09 13:54:11'),
(323, 'Commented on <a href=\"https://staging.yalla-furnish.net/product/109\">This Product</a>', 4, '2020-01-09 13:54:14', '2020-01-09 13:54:14'),
(324, 'Commented on <a href=\"https://staging.yalla-furnish.net/product/109\">This Product</a>', 4, '2020-01-09 13:54:27', '2020-01-09 13:54:27'),
(325, 'Commented on <a href=\"https://staging.yalla-furnish.net/product/109\">This Product</a>', 4, '2020-01-09 13:54:52', '2020-01-09 13:54:52'),
(326, 'Commented on <a href=\"https://staging.yalla-furnish.net/product/109\">This Product</a>', 4, '2020-01-09 13:54:54', '2020-01-09 13:54:54'),
(327, 'Commented on <a href=\"https://staging.yalla-furnish.net/product/109\">This Product</a>', 4, '2020-01-09 13:54:57', '2020-01-09 13:54:57'),
(328, 'Commented on <a href=\"https://staging.yalla-furnish.net/product/109\">This Product</a>', 4, '2020-01-09 13:54:58', '2020-01-09 13:54:58'),
(329, 'Commented on <a href=\"https://staging.yalla-furnish.net/product/75\">This Product</a>', 4, '2020-01-26 17:03:25', '2020-01-26 17:03:25'),
(330, 'Follow <a href=\'/showroom/47\'>addc</a>', 44, '2020-04-08 15:34:44', '2020-04-08 15:34:44'),
(331, 'Commented on <a href=\"https://dev.yalla-furnish.com/product/92\">This Product</a>', 44, '2020-04-08 15:35:15', '2020-04-08 15:35:15'),
(332, 'Follow <a href=\'/showroom/addc\'>addc</a>', 48, '2020-04-28 13:00:52', '2020-04-28 13:00:52'),
(333, 'Follow <a href=\'/showroom/dibaj-fabrics\'>Dibaj Fabrics</a>', 48, '2020-04-28 13:01:38', '2020-04-28 13:01:38'),
(334, 'Follow <a href=\'/showroom/ideal-house\'>Ideal House</a>', 48, '2020-04-28 13:01:40', '2020-04-28 13:01:40'),
(335, 'Follow <a href=\'/UserProfile/4\'>Yalla</a>', 32, '2020-04-29 11:11:51', '2020-04-29 11:11:51'),
(336, 'Liked <a href=\"http://localhost:8000/product/94\">This Item</a>', 32, '2020-05-04 09:19:30', '2020-05-04 09:19:30'),
(337, 'Liked <a href=\"http://localhost:8000/product/98\">This Item</a>', 32, '2020-05-04 09:20:16', '2020-05-04 09:20:16'),
(338, 'Liked <a href=\"http://localhost:8000/product/94\">This Item</a>', 32, '2020-05-04 09:21:36', '2020-05-04 09:21:36'),
(339, 'Commented on <a href=\"http://localhost:8000/product/94\">This Product</a>', 32, '2020-05-04 09:34:44', '2020-05-04 09:34:44'),
(340, 'Commented on <a href=\"http://localhost:8000/topic/32\">This Topic</a>', 32, '2020-05-04 10:02:32', '2020-05-04 10:02:32'),
(341, 'Commented on <a href=\"http://localhost:8000/topic/32\">This Topic</a>', 32, '2020-05-04 11:51:52', '2020-05-04 11:51:52'),
(342, 'Commented on <a href=\"http://localhost:8000/topic/32\">This Topic</a>', 32, '2020-05-04 11:55:39', '2020-05-04 11:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `super_admin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `super_admin`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@admin.com', '$2y$12$gEDkRmKq6iNagDevCIGb2.2W4.WRE8w7mcxpvLDzhGANLB5RgnU/C', 1, '2019-08-22 14:49:39', '2019-08-22 14:49:39'),
(3, 'admin', 'test@admin.com', '$2y$12$8Rw1pOd02BGr9otInQ1ZbumeeeDT4yq03m41A7ZXn.TV872UVQPPe', 1, NULL, NULL),
(4, 'maha saeed', 'mahasaeed.mail@gmail.com', '$2y$10$zCiWhnx6EzLuXVWg3pqUNerkudZLltLt/ev6J/9eWPk8U8nYJdZ0m', 0, '2020-01-15 11:06:10', '2020-01-15 11:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `backgrounds`
--

CREATE TABLE `backgrounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `backgrounds`
--

INSERT INTO `backgrounds` (`id`, `type`, `image`, `created_at`, `updated_at`) VALUES
(1, '1', '1_1.jpg', '2019-10-17 20:08:30', '2019-10-17 20:08:30'),
(2, '2', '2_1.jpg', '2019-10-17 20:08:31', '2019-10-17 20:08:31'),
(3, '3', '3_1.jpg', '2019-10-17 20:08:31', '2019-10-17 20:08:31'),
(4, '1', '1_2.jpg', '2019-10-17 20:08:30', '2019-10-17 20:08:30'),
(5, '1', '1_3.jpg', '2019-10-17 20:08:30', '2019-10-17 20:08:30'),
(6, '1', '1_4.jpg', '2019-10-17 20:08:30', '2019-10-17 20:08:30'),
(7, '1', '1_5.jpg', '2019-10-17 20:08:30', '2019-10-17 20:08:30'),
(8, '2', '2_2.jpg', '2019-10-17 20:08:30', '2019-10-17 20:08:30'),
(9, '2', '2_3.jpg', '2019-10-17 20:08:30', '2019-10-17 20:08:30'),
(10, '2', '2_4.jpg', '2019-10-17 20:08:30', '2019-10-17 20:08:30'),
(11, '2', '2_5.jpg', '2019-10-17 20:08:30', '2019-10-17 20:08:30'),
(12, '3', '3_2.jpg', '2019-10-17 20:08:30', '2019-10-17 20:08:30'),
(13, '3', '3_3.jpg', '2019-10-17 20:08:30', '2019-10-17 20:08:30'),
(14, '3', '3_4.jpg', '2019-10-17 20:08:30', '2019-10-17 20:08:30'),
(15, '3', '3_5.jpg', '2019-10-17 20:08:30', '2019-10-17 20:08:30'),
(16, '', '', '2019-10-17 20:08:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `private` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `name`, `private`, `user_id`, `created_at`, `updated_at`) VALUES
(15, 'MAC\'s', 0, 1, NULL, NULL),
(16, 'WhishList', 0, 1, NULL, NULL),
(17, 'Hussam\'s', 0, 2, NULL, NULL),
(18, 'WhishList', 0, 2, NULL, NULL),
(19, 'Ideas', 1, 2, '2019-09-11 13:09:38', '2019-09-11 13:09:38'),
(20, 'yara\'s', 0, 3, NULL, NULL),
(21, 'W', 1, 3, NULL, '2019-09-16 13:26:09'),
(22, 'mm', 0, 3, '2019-09-16 13:26:28', '2019-09-16 13:26:28'),
(23, 'yalla\'s', 0, 4, NULL, NULL),
(24, 'WhishList', 0, 4, NULL, NULL),
(25, 'Ahmed\'s Ideas', 0, 5, NULL, NULL),
(26, 'WhishList', 0, 5, NULL, NULL),
(27, 'sofas', 0, 2, '2019-10-19 23:53:17', '2019-10-19 23:53:17'),
(28, 'Maha\'s Ideas', 0, 6, NULL, NULL),
(29, 'WhishList', 0, 6, NULL, NULL),
(30, 'Maha\'s Ideas', 0, 7, NULL, NULL),
(31, 'WhishList', 0, 7, NULL, NULL),
(32, 'yara\'s Ideas', 0, 8, NULL, NULL),
(33, 'WhishList', 0, 8, NULL, NULL),
(34, 'aa', 0, 8, '2019-10-23 20:47:33', '2019-10-23 20:47:33'),
(35, 'bb', 1, 8, '2019-10-23 20:47:46', '2019-10-23 20:47:46'),
(36, 'cc', 0, 8, '2019-10-23 20:48:03', '2019-10-23 20:48:03'),
(37, 'dd', 1, 8, '2019-10-23 20:48:16', '2019-10-23 20:48:16'),
(38, 'ee', 0, 8, '2019-10-23 20:48:27', '2019-10-23 20:48:27'),
(39, 'ff', 1, 8, '2019-10-23 20:48:37', '2019-10-23 20:48:37'),
(40, 'gg', 0, 8, '2019-10-23 20:48:44', '2019-10-23 20:48:44'),
(41, 'Articls', 1, 4, '2019-10-24 02:35:20', '2019-10-24 02:35:20'),
(42, 'youmn\'s Ideas', 0, 9, NULL, NULL),
(43, 'WhishList', 0, 9, NULL, NULL),
(44, 'youmn\'s Ideas', 0, 10, NULL, NULL),
(45, 'WhishList', 0, 10, NULL, NULL),
(46, 'y\'s Ideas', 0, 11, NULL, NULL),
(47, 'WhishList', 0, 11, NULL, NULL),
(48, '1', 1, 11, '2019-10-30 13:14:44', '2019-10-30 13:14:44'),
(49, '2', 0, 11, '2019-10-30 13:15:30', '2019-10-30 13:15:30'),
(50, 'my board', 0, 11, '2019-10-30 13:15:41', '2019-10-30 13:15:41'),
(51, 'yar\'s Ideas', 1, 12, NULL, '2019-10-30 14:57:06'),
(52, 'WhishList', 0, 12, NULL, NULL),
(53, 'aa', 0, 12, '2019-10-30 14:59:01', '2019-10-30 14:59:01'),
(54, 'bb', 1, 12, '2019-10-30 14:59:23', '2019-10-30 14:59:23'),
(55, 'yousef\'s Ideas', 0, 13, NULL, NULL),
(56, 'WhishList', 0, 13, NULL, NULL),
(57, '3', 0, 11, '2019-10-30 17:46:01', '2019-10-30 17:46:01'),
(58, '3', 0, 11, '2019-10-30 17:46:02', '2019-10-30 17:46:02'),
(59, 'aa', 1, 4, '2019-10-31 19:36:08', '2019-10-31 19:36:08'),
(60, 'aa', 1, 4, '2019-10-31 19:36:08', '2019-10-31 19:36:08'),
(61, 'Hussam\'s Ideas', 0, 14, NULL, NULL),
(62, 'WhishList', 0, 14, NULL, NULL),
(63, 'Articls new', 0, 4, '2019-11-03 00:41:36', '2019-11-03 00:41:36'),
(64, 'Hisham\'s Ideas', 0, 15, NULL, NULL),
(65, 'WhishList', 0, 15, NULL, NULL),
(66, 'reham\'s Ideas', 0, 16, NULL, NULL),
(67, 'WhishList', 0, 16, NULL, NULL),
(68, 'Yasmin\'s Ideas', 0, 17, NULL, NULL),
(69, 'WhishList', 0, 17, NULL, NULL),
(70, 'new', 1, 4, '2019-11-04 17:39:32', '2019-11-04 17:39:32'),
(71, 'Shahd\'s Ideas', 0, 18, NULL, NULL),
(72, 'WhishList', 0, 18, NULL, NULL),
(73, 'Shaimaa\'s Ideas', 0, 19, NULL, NULL),
(74, 'WhishList', 0, 19, NULL, NULL),
(75, 'test\'s Ideas', 0, 20, NULL, NULL),
(76, 'WhishList', 0, 20, NULL, NULL),
(77, 'yo\'s Ideas', 0, 21, NULL, NULL),
(78, 'WhishList', 0, 21, NULL, NULL),
(79, 'my board', 1, 21, '2019-11-06 16:36:05', '2019-11-06 16:36:05'),
(80, 'Faten\'s Ideas', 1, 22, NULL, '2019-11-07 17:14:15'),
(81, 'WhishList', 0, 22, NULL, NULL),
(82, 'Ahmed\'s Ideas', 0, 23, NULL, NULL),
(83, 'WhishList', 0, 23, NULL, NULL),
(84, 'Mahmoud\'s Ideas', 0, 24, NULL, NULL),
(85, 'WhishList', 0, 24, NULL, NULL),
(86, 'Hisham\'s Ideas', 0, 25, NULL, NULL),
(87, 'WhishList', 0, 25, NULL, NULL),
(88, 'hhhh', 1, 7, '2020-01-04 02:19:51', '2020-01-04 02:19:51'),
(89, 'assad', 1, 4, '2020-03-02 18:07:48', '2020-03-02 18:07:48'),
(90, 'assad', 1, 4, '2020-03-02 18:07:48', '2020-03-02 18:07:48'),
(91, 'sda', 1, 4, '2020-03-02 18:08:19', '2020-03-02 18:08:19'),
(92, 'sda', 1, 4, '2020-03-02 18:08:19', '2020-03-02 18:08:19'),
(93, 'sda', 1, 4, '2020-03-02 18:08:19', '2020-03-02 18:08:19'),
(94, 'sda', 1, 4, '2020-03-02 18:08:20', '2020-03-02 18:08:20'),
(95, 'sda', 1, 4, '2020-03-02 18:08:20', '2020-03-02 18:08:20'),
(96, 'sda', 1, 4, '2020-03-02 18:08:20', '2020-03-02 18:08:20'),
(97, 'sds', 0, 4, '2020-03-02 18:09:00', '2020-03-02 18:09:00'),
(98, 'Nourhan\'s Ideas', 0, 26, NULL, NULL),
(99, 'WhishList', 0, 26, NULL, NULL),
(100, 'n\'s Ideas', 0, 27, NULL, NULL),
(101, 'WhishList', 0, 27, NULL, NULL),
(102, 'test20\'s Ideas', 0, 28, NULL, NULL),
(103, 'WhishList', 0, 28, NULL, NULL),
(104, 'n\'s Ideas', 0, 29, NULL, NULL),
(105, 'WhishList', 0, 29, NULL, NULL),
(106, 'n\'s Ideas', 0, 30, NULL, NULL),
(107, 'WhishList', 0, 30, NULL, NULL),
(108, 'n\'s Ideas', 0, 31, NULL, NULL),
(109, 'WhishList', 0, 31, NULL, NULL),
(110, 'basel\'s Ideas', 0, 32, NULL, NULL),
(111, 'WhishList', 0, 32, NULL, NULL),
(112, 'n\'s Ideas', 0, 33, NULL, NULL),
(113, 'WhishList', 0, 33, NULL, NULL),
(114, 'nn\'s Ideas', 0, 34, NULL, NULL),
(115, 'WhishList', 0, 34, NULL, NULL),
(116, 'dasnbhj\'s Ideas', 0, 35, NULL, NULL),
(117, 'WhishList', 0, 35, NULL, NULL),
(118, 'nnn\'s Ideas', 0, 36, NULL, NULL),
(119, 'WhishList', 0, 36, NULL, NULL),
(120, 'mmmm\'s Ideas', 0, 37, NULL, NULL),
(121, 'WhishList', 0, 37, NULL, NULL),
(122, 'nn\'s Ideas', 0, 38, NULL, NULL),
(123, 'WhishList', 0, 38, NULL, NULL),
(124, 'nour\'s Ideas', 0, 39, NULL, NULL),
(125, 'WhishList', 0, 39, NULL, NULL),
(126, 'noo\'s Ideas', 0, 40, NULL, NULL),
(127, 'WhishList', 0, 40, NULL, NULL),
(128, 'nour\'s Ideas', 0, 41, NULL, NULL),
(129, 'WhishList', 0, 41, NULL, NULL),
(130, 'nour\'s Ideas', 0, 42, NULL, NULL),
(131, 'WhishList', 0, 42, NULL, NULL),
(132, 'mahmoud\'s Ideas', 0, 43, NULL, NULL),
(133, 'WhishList', 0, 43, NULL, NULL),
(134, 'Veda\'s Ideas', 0, 44, NULL, NULL),
(135, 'WhishList', 0, 44, NULL, NULL),
(136, 'basel\'s Ideas', 0, 45, NULL, NULL),
(137, 'WhishList', 0, 45, NULL, NULL),
(138, 'dsahj\'s Ideas', 0, 46, NULL, NULL),
(139, 'WhishList', 0, 46, NULL, NULL),
(140, 'm\'s Ideas', 0, 47, NULL, NULL),
(141, 'WhishList', 0, 47, NULL, NULL),
(142, 'Francesca\'s Ideas', 0, 48, NULL, NULL),
(143, 'WhishList', 0, 48, NULL, NULL),
(144, 'New', 1, 48, '2020-04-28 12:59:13', '2020-04-28 12:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mob1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mob2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `showroom_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `address_ar`, `address_en`, `working_to`, `working_from`, `mob1`, `mob2`, `lat`, `lang`, `showroom_id`, `deleted_at`, `created_at`, `updated_at`, `city_id`, `district_id`, `title`) VALUES
(28, 'مصر', 'egypt', '1 AM', '1 AM', '01095863215', '25530996', NULL, NULL, 1, NULL, '2019-09-17 15:36:12', '2019-09-17 15:36:12', NULL, NULL, NULL),
(29, 'المعادي', 'Maadi', '6 AM', '10 AM', '01151236542', '01151236543', NULL, NULL, 2, NULL, '2019-10-17 20:17:01', '2019-10-17 20:17:01', NULL, NULL, NULL),
(30, 'المعادي', 'Maadi', '4 AM', '10 AM', '01234567891', '01234567892', NULL, NULL, 3, NULL, '2019-10-17 20:25:43', '2019-10-17 20:25:43', NULL, NULL, NULL),
(31, 'شارع خمسين متفرع من مصطفى كامل سموحة ابراج حياة السرايا برج ب اسكندرية', 'Khamseen St. Off Mostafa Kamel Smouha , Hayat El Saraya Towers ,Tower B , Alexandria', '1 AM', '1 AM', '01020120009', '1', NULL, NULL, 4, NULL, '2019-10-19 19:59:55', '2019-11-06 16:47:35', NULL, NULL, NULL),
(32, 'Maadi - 46 Al Laselky st, Nasr Square, Al Maadi.', 'Maadi - 46 Al Laselky st, Nasr Square, Al Maadi.', '12 AM', '11 AM', '19721', '1', NULL, NULL, 5, NULL, '2019-10-19 20:49:56', '2019-10-19 20:49:56', NULL, NULL, NULL),
(33, 'Nasr City - 96 Mustafa El-Nahes st, Doctors tower', 'Nasr City - 96 Mustafa El-Nahes st, Doctors tower', NULL, NULL, '19721', '19721', NULL, NULL, 5, NULL, '2019-10-20 18:12:51', '2019-10-20 18:12:51', NULL, NULL, NULL),
(34, 'El- Sheikh Zayed - Al Guezira Plaza, Tower 2', 'El- Sheikh Zayed - Al Guezira Plaza, Tower 2', NULL, NULL, '19721', '19721', NULL, NULL, 5, NULL, '2019-10-20 18:18:08', '2019-10-20 18:18:08', NULL, NULL, NULL),
(35, '6th of October City - 17 El-Mehwer El-Markzay. 11th Distract', '6th of October City - 17 El-Mehwer El-Markzay. 11th Distract', NULL, NULL, '19721', '1', NULL, NULL, 5, NULL, '2019-10-20 19:24:44', '2019-10-20 19:24:44', NULL, NULL, NULL),
(36, 'azxscd', 'asdc', NULL, NULL, '526833', '4523165', NULL, NULL, 6, '2019-10-30 20:51:07', '2019-10-28 17:07:33', '2019-10-30 20:51:07', NULL, NULL, NULL),
(37, 'sdcfg', 'asxdcfvg', NULL, NULL, '582', '586321', NULL, NULL, 7, '2019-10-30 20:50:03', '2019-10-28 17:12:27', '2019-10-30 20:50:03', NULL, NULL, NULL),
(38, 'jhgfds', 'nbvcxz', NULL, NULL, '52525413', '345', NULL, NULL, 8, '2019-10-30 14:08:45', '2019-10-28 17:22:05', '2019-10-30 14:08:45', NULL, NULL, NULL),
(39, 'AWSEDFGHJK', 'ASDFG', NULL, NULL, '21213516', '31213', NULL, NULL, 9, '2019-10-30 14:08:39', '2019-10-28 18:14:06', '2019-10-30 14:08:39', NULL, NULL, NULL),
(40, 'jdfkjsfkjsdhsdu', 'sdfghfdsfw', NULL, NULL, '42455154548', '2', NULL, NULL, 10, '2019-11-03 18:26:25', '2019-10-29 21:21:56', '2019-11-03 18:26:25', NULL, NULL, NULL),
(41, 'myshowroom', 'myshowroom', NULL, NULL, '42455154548', '1216654515', NULL, NULL, 11, '2019-11-03 18:26:57', '2019-10-29 21:23:06', '2019-11-03 18:26:57', NULL, NULL, NULL),
(42, 'name', 'name', NULL, NULL, '42455154548', '1216654515', NULL, NULL, 12, '2019-10-30 14:08:49', '2019-10-30 14:07:48', '2019-10-30 14:08:49', NULL, NULL, NULL),
(43, '6th of October City - 17 El-Mehwer El-Markzay. 11th Distract', '6th of October City - 17 El-Mehwer El-Markzay. 11th Distract', NULL, NULL, '1', '001', NULL, NULL, 13, '2019-11-03 18:26:48', '2019-10-30 15:43:43', '2019-11-03 18:26:48', NULL, NULL, NULL),
(44, 'shr', 'shr', NULL, NULL, '42455154548', '1216654515', NULL, NULL, 14, '2019-11-03 18:26:35', '2019-10-30 15:48:34', '2019-11-03 18:26:35', NULL, NULL, NULL),
(45, '6th of October City - 17 El-Mehwer El-Markzay. 11th Distract', '6th of October City - 17 El-Mehwer El-Markzay. 11th Distract', NULL, NULL, '010', '1244210', NULL, NULL, 15, '2019-10-30 20:27:06', '2019-10-30 18:08:09', '2019-10-30 20:27:06', NULL, NULL, NULL),
(46, 'branch2', 'branch2', NULL, NULL, '42455154548', '1216654515', NULL, NULL, 14, '2019-10-30 18:45:39', '2019-10-30 18:42:35', '2019-10-30 18:45:39', NULL, NULL, NULL),
(47, 'b1', 'b1', NULL, NULL, '1456546', '1216654515', NULL, NULL, 16, '2019-10-31 14:07:40', '2019-10-30 18:52:23', '2019-10-31 14:07:40', NULL, NULL, NULL),
(48, 'b1', 'b1', NULL, NULL, '42455154548', '1216654515', NULL, NULL, 17, '2019-10-31 14:08:08', '2019-10-30 18:55:57', '2019-10-31 14:08:08', NULL, NULL, NULL),
(49, 'b1', 'b1', NULL, NULL, '42455154548', '1216654515', NULL, NULL, 18, '2019-10-31 14:08:04', '2019-10-30 18:57:00', '2019-10-31 14:08:04', NULL, NULL, NULL),
(50, 'b1', 'b1', NULL, NULL, '42455154548', '1216654515', NULL, NULL, 19, '2019-10-31 14:07:52', '2019-10-30 18:58:07', '2019-10-31 14:07:52', NULL, NULL, NULL),
(51, 'b1', 'b1', NULL, NULL, '42455154548', '1216654515', NULL, NULL, 20, '2019-10-31 14:07:44', '2019-10-30 18:58:47', '2019-10-31 14:07:44', NULL, NULL, NULL),
(52, 'b1', 'b1', NULL, NULL, '42455154548', '1216654515', NULL, NULL, 21, '2019-10-31 14:07:47', '2019-10-30 19:15:12', '2019-10-31 14:07:47', NULL, NULL, NULL),
(53, 'b1', 'b1', NULL, NULL, '42455154548', '1216654515', NULL, NULL, 22, '2019-10-31 14:07:57', '2019-10-30 19:15:58', '2019-10-31 14:07:57', NULL, NULL, NULL),
(54, 'b1', 'b1', NULL, NULL, '42455154548', '1216654515', NULL, NULL, 23, '2019-10-31 14:08:12', '2019-10-30 19:17:37', '2019-10-31 14:08:12', NULL, NULL, NULL),
(55, 'سيتي ستارز ، المرحلة 1 ، المستوى 3 ، متجر رقم 308 ، مصر الجديدة', 'Citystars, Phase1, level 3, shop #308, Heliopolis', NULL, NULL, '01154022757', '1', NULL, NULL, 24, NULL, '2019-10-31 04:04:26', '2019-11-03 19:39:30', NULL, NULL, NULL),
(56, 'El-Sheikh Zayed', 'El-Sheikh Zayed', NULL, NULL, '01095516153', '01095516153', NULL, NULL, 25, NULL, '2019-10-31 05:15:37', '2019-10-31 05:15:37', NULL, NULL, NULL),
(57, 'HC مول العرب ، بوابة 1 - الطابق 1 ، 6 أكتوبر', 'HC Mall of Arabia, Gate 1 – 1st floor, 6th of October', NULL, NULL, '01148648707', '1', NULL, NULL, 26, NULL, '2019-10-31 14:45:30', '2019-11-03 21:48:53', NULL, NULL, NULL),
(58, '6th of October City - 17 El-Mehwer El-Markzay. 11th Distract', '6th of October City - 17 El-Mehwer El-Markzay. 11th Distract', NULL, NULL, '552', '55', NULL, NULL, 24, '2019-10-31 19:18:45', '2019-10-31 19:16:20', '2019-10-31 19:18:45', NULL, NULL, NULL),
(59, '6th of October City - 17 El-Mehwer El-Markzay. 11th Distract', '6th of October City - 17 El-Mehwer El-Markzay. 11th Distract', NULL, NULL, '2222', '2323', NULL, NULL, 24, '2019-10-31 19:21:11', '2019-10-31 19:17:39', '2019-10-31 19:21:11', NULL, NULL, NULL),
(60, 'كايرو فيستيفال سيتي مول ، الدور الأرضي محل رقم 17', 'Cairo Festival City Mall ,Ground floor Shop No. 17', NULL, NULL, '01110106592', '1', NULL, NULL, 24, NULL, '2019-10-31 19:21:48', '2019-11-03 19:37:53', NULL, NULL, NULL),
(61, '2/3 laselki st new maadi ,cairo', '2/3 laselki st new maadi ,cairo', NULL, NULL, '0225175455', '01273007400', NULL, NULL, 27, NULL, '2019-10-31 20:30:53', '2019-10-31 20:30:53', NULL, NULL, NULL),
(62, '16, 263 st, new maadi cairo', '16, 263 st, new maadi cairo', NULL, NULL, '25173232', '01283900039', NULL, NULL, 27, NULL, '2019-10-31 20:42:28', '2019-10-31 20:42:28', NULL, NULL, NULL),
(63, 'مول مصر، الدور الثاني، بوابة دي ٢، بجانب بنك سي اي بي', 'Mall Of Egypt, Floor 2, Gate D2, Beside CIB Bank', NULL, NULL, '01151946444', '1', NULL, NULL, 28, NULL, '2019-10-31 21:27:57', '2019-11-02 01:00:45', NULL, NULL, NULL),
(64, 'سيتي سنتر ألماظة ، الدور 2 ، أمام الزيتون', 'City Center Almaza ,Floor 2, In Front Of Olives', NULL, NULL, '01144739449', '1', NULL, NULL, 28, NULL, '2019-11-03 14:45:58', '2019-11-03 14:45:58', NULL, NULL, NULL),
(65, 'مول العرب ، أمام بوابة 1 ، بجوار سيارات طارق', 'Mall Of Arabia ,In Front Of Gate 1, Beside EL Tarek Cars', NULL, NULL, '01279999150', '1', NULL, NULL, 28, NULL, '2019-11-03 14:48:03', '2019-11-03 14:48:03', NULL, NULL, NULL),
(66, 'سيتي ستارز ، المرحلة 2 ، الطابق الثالث ، بجانب داماس ستور', 'City Stars ,Phase 2, 3rd Floor Beside Damas Store', NULL, NULL, '01279999170', '1', NULL, NULL, 28, NULL, '2019-11-03 14:51:17', '2019-11-03 14:51:17', NULL, NULL, NULL),
(67, 'كايرو فستيفال سيتي ، الطابق الأرضي ، أمام سمارت هومز', 'Cairo Festival City ,Ground Floor, In Front Of Smart Homes', NULL, NULL, '01099568666', '1', NULL, NULL, 28, NULL, '2019-11-03 14:53:19', '2019-11-03 14:53:19', NULL, NULL, NULL),
(68, '320 ش التسعين - القاهرة الجديدة كيرا هوم ستور', '320 El tesaeen st, new cairo Kira Home Store', NULL, NULL, '01001999916', '1', NULL, NULL, 4, NULL, '2019-11-03 17:55:01', '2020-01-04 01:13:19', 15, 17, '5th Settlement'),
(69, '17 ش الطيران  , مدينة نصر , القاهرة أمام كنتاكي', '17 El Tayaran st, Nasr city ,Cairo in front of KFC', NULL, NULL, '0222621402', '01009996262', NULL, NULL, 4, NULL, '2019-11-03 17:56:03', '2020-01-04 01:12:41', 15, 19, 'Nasr City'),
(70, 'المهندسين ، شارع عثمان بن عفان ، شارع جزيرة العرب', 'Mohandseen ,Osman Ibn Affan St. of Geziret El Arab St', NULL, NULL, '0112877171', '1', NULL, NULL, 24, NULL, '2019-11-03 19:42:14', '2019-11-03 19:42:14', NULL, NULL, NULL),
(71, '4 abdel moneim hafez st, off el nozha', '4 abdel moneim hafez st, off el nozha', NULL, NULL, '0224145414', '0224148523', NULL, NULL, 29, NULL, '2019-11-03 20:42:40', '2019-11-03 20:42:40', NULL, NULL, NULL),
(72, 'داون تاون مول ، القاهرة الجديدة ، مول داون تاون ، مبنى S3 - محل 43', 'Down town mall ,New Cairo –Downtown mall- Building S3 – Shop 43', NULL, NULL, '01155114031', '1', NULL, NULL, 26, NULL, '2019-11-03 21:50:53', '2019-11-03 21:50:53', NULL, NULL, NULL),
(73, '3/3 ش اللاسلكى، المعادى الجديدة، القاهرة', '3/3 El Laselki St., New Maadi, Cairo', NULL, NULL, '0225202033', '0225202066', NULL, NULL, 30, NULL, '2019-11-05 19:02:45', '2019-11-05 19:02:45', NULL, NULL, NULL),
(74, '29 ش جزيرة العرب، المهندسين، القاهرة', '29 Geziret El Arab St., Mohandseen, Cairo', NULL, NULL, '0233025337', '0233025338', NULL, NULL, 30, NULL, '2019-11-05 19:06:52', '2019-11-05 19:06:52', NULL, NULL, NULL),
(75, 'مول العرب - بوابة 1 ، 6 أكتوبر', 'Mall of Arabia - Gate 1, 6th of October', NULL, NULL, '0238360072', '0238360073', NULL, NULL, 30, NULL, '2019-11-05 19:09:12', '2019-11-05 19:09:12', NULL, NULL, NULL),
(76, 'شارع 263 ، المعادى الجديدة ، القاهره', '28 Road 263, New Maadi, Cairo', NULL, NULL, '0227548831', '01229124999', NULL, NULL, 30, '2019-11-06 18:01:40', '2019-11-05 19:12:18', '2019-11-06 18:01:40', NULL, NULL, NULL),
(77, 'jdfkjsfkjsdhsdu', 'sdfghfdsfw', NULL, NULL, '42455154548', '1216654515', NULL, NULL, 31, '2019-11-06 18:36:07', '2019-11-06 15:56:33', '2019-11-06 18:36:07', NULL, NULL, NULL),
(78, 'مصر الجديدة ، 42 نبيل الوداد ، أرض الجولف ، سيرة ذاتية', 'Heliopolis, 42 Nabil El Waked St , Ard El Golf , Cairo', NULL, NULL, '01227599991', '1', NULL, NULL, 32, '2019-11-06 21:45:30', '2019-11-06 21:40:37', '2019-11-06 21:45:30', NULL, NULL, NULL),
(79, 'مصر الجديدة ، 42 نبيل الوداد ، أرض الجولف ، سيرة ذاتية', 'Heliopolis, 42 Nabil El Waked St , Ard El Golf , Cairo', NULL, NULL, '01227599991', '1', NULL, NULL, 33, NULL, '2019-11-06 21:45:00', '2019-11-06 21:45:00', NULL, NULL, NULL),
(80, '107D ، كيلو 28 ، المنطقة الصناعية ، أبو رواش ، بالقرب من القرية الذكية ، الجيزة ، مصر', '107D, kilo 28, Industrial zone, Abo Rawash, Near Smart Village, Giza, Egypt', NULL, NULL, '01227957777', '01115559933', NULL, NULL, 34, NULL, '2019-11-06 22:03:08', '2019-11-06 22:03:08', NULL, NULL, NULL),
(81, 'مول العرب - بوابة 1 ، ميدان جهينة ، 6 أكتوبر', 'Mall of Arabia - Gate 1, juhayna square, 6th of October', NULL, NULL, '01281100001', '1', NULL, NULL, 35, NULL, '2019-11-06 22:13:33', '2019-11-06 22:13:33', NULL, NULL, NULL),
(82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, NULL, '2019-11-06 22:28:35', '2019-11-06 22:28:35', NULL, NULL, NULL),
(83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 37, NULL, '2019-11-06 22:33:13', '2019-11-06 22:33:13', NULL, NULL, NULL),
(84, 'بورتو كايرو مول الطريق الدائري ، التجمع الأول القاهرة الجديدة', 'porto cairo mall ring road , 1st Settlement new cairo', NULL, NULL, '01222254442', '1', NULL, NULL, 38, NULL, '2019-11-06 22:33:45', '2019-11-06 22:33:45', NULL, NULL, NULL),
(85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 39, NULL, '2019-11-06 22:42:14', '2019-11-06 22:42:14', NULL, NULL, NULL),
(86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, NULL, '2019-11-06 22:46:57', '2019-11-06 22:46:57', NULL, NULL, NULL),
(87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, NULL, '2019-11-06 22:50:28', '2019-11-06 22:50:28', NULL, NULL, NULL),
(88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 42, NULL, '2019-11-06 22:55:03', '2019-11-06 22:55:03', NULL, NULL, NULL),
(89, '.', '.', NULL, NULL, '1', '1', NULL, NULL, 43, NULL, '2019-11-06 23:08:11', '2019-11-06 23:08:11', NULL, NULL, NULL),
(90, 'Nasr city', 'Nasr city', NULL, NULL, '01122275668', '01144328890', NULL, NULL, 44, NULL, '2019-11-27 15:07:43', '2019-11-27 15:07:43', NULL, NULL, NULL),
(91, 'csdcsdcsdc', 'scsdcsd', NULL, NULL, '12313', '213123', NULL, NULL, 45, NULL, '2019-12-26 14:40:16', '2019-12-26 14:40:16', NULL, NULL, NULL),
(92, '52 Nehro, El-Bostan, Heliopolis, Egypt', '52 Nehro, El-Bostan, Heliopolis, Egypt', NULL, NULL, '01113386356', '0100512392', '30.1012704', '31.320407599999953', 46, NULL, '2019-12-30 14:44:04', '2019-12-30 14:44:04', 15, 23, NULL),
(93, 'szx', 'azx', NULL, NULL, '1', '1', '30.0991585', '31.315179700000044', 47, NULL, '2019-12-30 15:09:15', '2019-12-30 15:09:15', 15, 19, NULL),
(94, 'showroomoffers', 'showroomoffers', NULL, NULL, '1', '1', '30.06263', '31.24967', 48, NULL, '2019-12-30 15:41:54', '2019-12-31 13:00:24', 15, 23, 'test title'),
(95, 'test title', 'test title', NULL, NULL, '1', '1', '30.06263', '31.24967', 49, NULL, '2019-12-31 11:12:15', '2019-12-31 11:12:15', 26, 22, 'test title'),
(96, 'add new branch', 'add new branch', NULL, NULL, '1', '1', '30.06263', '31.24967', 48, NULL, '2019-12-31 13:01:16', '2019-12-31 13:01:16', 15, 23, 'add new branch'),
(97, '52 Nehro, El-Bostan, Heliopolis, Egypt', '52 Nehro, El-Bostan, Heliopolis, Egypt', NULL, NULL, '011', '011', '30.1012704', '31.320407599999953', 4, NULL, '2020-01-04 01:17:18', '2020-01-04 01:17:18', 15, 23, 'Heliopolis Branch'),
(98, 'fasfsafasd', 'fdsfsdf', NULL, NULL, '0212545', '021258454', '31.262431000000003', '29.985604300000002', 50, NULL, '2020-01-14 18:14:24', '2020-01-14 18:14:24', 15, 23, 'dasdsadasd'),
(99, 'dasdasdasdasd', 'dasdasdasd', NULL, NULL, '02154212457', '02154212457', '30.0679168', '31.4540032', 51, NULL, '2020-04-29 17:51:48', '2020-04-29 17:51:48', 15, 23, 'سكاي ميدتاون'),
(100, 'dasdasdasdasd', 'dasdasdasd', NULL, NULL, '02154212457', '02154212457', '30.0679168', '31.4540032', 52, '2020-05-04 12:48:58', '2020-04-29 17:56:58', '2020-05-04 12:48:58', 15, 23, 'سكاي ميدتاون'),
(101, 'dajbhdajsd', 'jdbasjhdbasjd', NULL, NULL, '928371823', '8276487324', '31.1721984', '29.877862399999998', 53, NULL, '2020-05-03 11:38:12', '2020-05-03 11:38:12', 15, 23, 'dhabdjbh'),
(102, 'dbsahdjsad', 'hbdjasbhdas', NULL, NULL, '19273823', '21983728', '31.1721984', '29.877862399999998', 54, NULL, '2020-05-03 11:39:25', '2020-05-03 11:39:25', 15, 23, 'dhbasdjh'),
(103, 'dassdsada', 'dasjbas', NULL, NULL, '12837382', '327816312', '31.1721984', '29.877862399999998', 55, NULL, '2020-05-03 11:40:44', '2020-05-03 11:40:44', 15, 23, 'dasdas'),
(104, 'sfwat ali', 'baselaly', NULL, NULL, '0127836873', '012739823', '30.0130557', '31.2088526', 52, '2020-05-04 12:55:54', '2020-05-04 12:52:25', '2020-05-04 12:55:54', 15, 23, 'mohamed ali'),
(105, 'sfwat ali', 'baselaly', NULL, NULL, '0127836873', '012739823', '30.0130557', '31.2088526', 52, '2020-05-04 12:56:45', '2020-05-04 12:52:25', '2020-05-04 12:56:45', 15, 23, 'mohamed ali'),
(106, 'asdsadasd', 'dasdsad', NULL, NULL, '2312321', '3123123', '30.1010501', '31.320999999999994', 52, '2020-05-05 10:04:40', '2020-05-04 13:12:34', '2020-05-05 10:04:40', 15, 23, 'ddsadasdasd'),
(107, 'asdsadasd', 'dasdsad', NULL, NULL, '2312321', '3123123', '30.1010501', '31.320999999999994', 52, '2020-05-05 10:04:50', '2020-05-04 13:12:35', '2020-05-05 10:04:50', 15, 23, 'ddsadasdasd'),
(108, 'test', 'test', NULL, NULL, '012783626', '012723678', '31.195135999999998', '29.9270144', 52, '2020-05-05 10:10:10', '2020-05-05 10:05:39', '2020-05-05 10:10:10', 15, 23, 'test'),
(109, 'test', 'test', NULL, NULL, '012783626', '012723678', '31.195135999999998', '29.9270144', 52, '2020-05-05 10:10:16', '2020-05-05 10:05:52', '2020-05-05 10:10:16', 15, 23, 'test'),
(110, 'jasbdhjasd', 'jdbasjhads', NULL, NULL, '012738273', '012783683', '31.195135999999998', '29.9270144', 52, '2020-05-05 10:15:08', '2020-05-05 10:10:48', '2020-05-05 10:15:08', 15, 23, 'dhavdjh'),
(111, 'jasbdhjasd', 'jdbasjhads', NULL, NULL, '012738273', '012783683', '31.195135999999998', '29.9270144', 52, '2020-05-05 10:15:12', '2020-05-05 10:10:48', '2020-05-05 10:15:12', 15, 23, 'dhavdjh'),
(112, 'dbhsajads', 'bdjabhdhj', NULL, NULL, '0215485489', '0215648795', '31.195135999999998', '29.9270144', 52, '2020-05-05 10:16:58', '2020-05-05 10:15:39', '2020-05-05 10:16:58', 15, 23, 'dashbjdjh'),
(113, 'dbhsajads', 'bdjabhdhj', NULL, NULL, '0215485489', '0215648795', '31.195135999999998', '29.9270144', 52, '2020-05-05 10:17:02', '2020-05-05 10:15:39', '2020-05-05 10:17:02', 15, 23, 'dashbjdjh'),
(114, 'kdjanskjdsad', 'jdnbakjdk', NULL, NULL, '0129837833', '1290037289', '31.195135999999998', '29.9270144', 52, '2020-05-05 10:18:15', '2020-05-05 10:17:25', '2020-05-05 10:18:15', 15, 23, 'dbhsadjh'),
(115, 'dkjasbdkas', 'bdkjbsakj', NULL, NULL, '0128378329', '0192838732', '31.195135999999998', '29.9270144', 52, '2020-05-05 10:18:48', '2020-05-05 10:18:35', '2020-05-05 10:18:48', 15, 23, 'hadsbjh'),
(116, 'jhbsadjdsa', 'jbdjsahbd', NULL, NULL, '982738338', '01141571634', '31.195135999999998', '29.9270144', 52, NULL, '2020-05-05 10:43:42', '2020-05-05 10:45:21', 15, 23, 'test'),
(117, 'djasbhdj', 'jbdsjbhdjsa', NULL, NULL, '0127398238', '0123987824', '31.195135999999998', '29.9270144', 52, NULL, '2020-05-05 10:45:53', '2020-05-05 10:45:53', 15, 23, 'jhdasbgjhb');

-- --------------------------------------------------------

--
-- Table structure for table `branches_info`
--

CREATE TABLE `branches_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches_info`
--

INSERT INTO `branches_info` (`id`, `branch_id`, `day`, `from`, `to`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 40, 'sunday', '6 PM', '1 AM', NULL, '2019-10-29 21:21:56', '2019-10-29 21:21:56'),
(2, 41, 'sunday', '6 AM', '1 AM', NULL, '2019-10-29 21:23:06', '2019-10-29 21:23:06'),
(6, 47, 'sunday', '1 AM', '1 AM', NULL, '2019-10-30 18:52:23', '2019-10-30 18:52:23'),
(7, 47, 'monday', '1 AM', '1 AM', NULL, '2019-10-30 18:52:23', '2019-10-30 18:52:23'),
(8, 47, 'tuesday', '1 AM', '1 AM', NULL, '2019-10-30 18:52:23', '2019-10-30 18:52:23'),
(9, 47, 'wednesday', '1 AM', '1 AM', NULL, '2019-10-30 18:52:23', '2019-10-30 18:52:23'),
(10, 52, 'sunday', '1 AM', '1 AM', NULL, '2019-10-30 19:15:12', '2019-10-30 19:15:12'),
(11, 52, 'monday', '1 AM', '1 AM', NULL, '2019-10-30 19:15:12', '2019-10-30 19:15:12'),
(12, 52, 'tuesday', '1 AM', '1 AM', NULL, '2019-10-30 19:15:12', '2019-10-30 19:15:12'),
(13, 52, 'wednesday', '1 AM', '1 AM', NULL, '2019-10-30 19:15:12', '2019-10-30 19:15:12'),
(14, 52, 'thursday', '1 AM', '1 AM', NULL, '2019-10-30 19:15:12', '2019-10-30 19:15:12'),
(22, 56, 'sunday', '12 AM', '8 PM', NULL, '2019-10-31 05:15:37', '2019-10-31 05:15:37'),
(23, 56, 'monday', '12 AM', '8 PM', NULL, '2019-10-31 05:15:37', '2019-10-31 05:15:37'),
(24, 56, 'tuesday', '12 AM', '8 PM', NULL, '2019-10-31 05:15:37', '2019-10-31 05:15:37'),
(25, 56, 'wednesday', '1 AM', '1 AM', NULL, '2019-10-31 05:15:37', '2019-10-31 05:15:37'),
(26, 56, 'thursday', '1 AM', '1 AM', NULL, '2019-10-31 05:15:37', '2019-10-31 05:15:37'),
(34, 61, 'sunday', '11 AM', '10 PM', NULL, '2019-10-31 20:30:53', '2019-10-31 20:30:53'),
(35, 61, 'monday', '11 AM', '10 PM', NULL, '2019-10-31 20:30:53', '2019-10-31 20:30:53'),
(36, 61, 'tuesday', '11 AM', '10 PM', NULL, '2019-10-31 20:30:53', '2019-10-31 20:30:53'),
(37, 61, 'wednesday', '11 AM', '10 PM', NULL, '2019-10-31 20:30:53', '2019-10-31 20:30:53'),
(38, 61, 'thursday', '11 AM', '10 PM', NULL, '2019-10-31 20:30:53', '2019-10-31 20:30:53'),
(39, 61, 'friday', '2 PM', '10 PM', NULL, '2019-10-31 20:30:53', '2019-10-31 20:30:53'),
(40, 61, 'saturday', '11 AM', '10 PM', NULL, '2019-10-31 20:30:53', '2019-10-31 20:30:53'),
(41, 62, 'sunday', '11 AM', '10 PM', NULL, '2019-10-31 20:42:28', '2019-10-31 20:42:28'),
(42, 62, 'monday', '11 AM', '10 PM', NULL, '2019-10-31 20:42:28', '2019-10-31 20:42:28'),
(43, 62, 'tuesday', '11 AM', '10 PM', NULL, '2019-10-31 20:42:28', '2019-10-31 20:42:28'),
(44, 62, 'wednesday', '11 AM', '10 PM', NULL, '2019-10-31 20:42:28', '2019-10-31 20:42:28'),
(45, 62, 'thursday', '11 AM', '10 PM', NULL, '2019-10-31 20:42:28', '2019-10-31 20:42:28'),
(46, 62, 'friday', '2 PM', '10 PM', NULL, '2019-10-31 20:42:28', '2019-10-31 20:42:28'),
(47, 62, 'saturday', '11 AM', '10 PM', NULL, '2019-10-31 20:42:28', '2019-10-31 20:42:28'),
(55, 63, 'sunday', '10 AM', '12 PM', NULL, '2019-11-02 01:00:45', '2019-11-02 01:00:45'),
(56, 63, 'monday', '10 AM', '12 PM', NULL, '2019-11-02 01:00:45', '2019-11-02 01:00:45'),
(57, 63, 'tuesday', '10 AM', '12 PM', NULL, '2019-11-02 01:00:45', '2019-11-02 01:00:45'),
(58, 63, 'wednesday', '10 AM', '12 PM', NULL, '2019-11-02 01:00:45', '2019-11-02 01:00:45'),
(59, 63, 'thursday', '10 AM', '12 PM', NULL, '2019-11-02 01:00:45', '2019-11-02 01:00:45'),
(60, 63, 'friday', '10 AM', '12 PM', NULL, '2019-11-02 01:00:45', '2019-11-02 01:00:45'),
(61, 63, 'saturday', '10 AM', '12 PM', NULL, '2019-11-02 01:00:45', '2019-11-02 01:00:45'),
(62, 64, 'sunday', '10 AM', '12 PM', NULL, '2019-11-03 14:45:58', '2019-11-03 14:45:58'),
(63, 64, 'monday', '10 AM', '12 PM', NULL, '2019-11-03 14:45:58', '2019-11-03 14:45:58'),
(64, 64, 'tuesday', '10 AM', '12 PM', NULL, '2019-11-03 14:45:58', '2019-11-03 14:45:58'),
(65, 64, 'wednesday', '10 AM', '12 PM', NULL, '2019-11-03 14:45:58', '2019-11-03 14:45:58'),
(66, 64, 'thursday', '10 AM', '12 PM', NULL, '2019-11-03 14:45:58', '2019-11-03 14:45:58'),
(67, 64, 'friday', '10 AM', '12 PM', NULL, '2019-11-03 14:45:58', '2019-11-03 14:45:58'),
(68, 64, 'saturday', '10 AM', '12 PM', NULL, '2019-11-03 14:45:58', '2019-11-03 14:45:58'),
(69, 65, 'sunday', '10 AM', '11 PM', NULL, '2019-11-03 14:48:03', '2019-11-03 14:48:03'),
(70, 65, 'monday', '10 AM', '11 PM', NULL, '2019-11-03 14:48:03', '2019-11-03 14:48:03'),
(71, 65, 'tuesday', '10 AM', '11 PM', NULL, '2019-11-03 14:48:03', '2019-11-03 14:48:03'),
(72, 65, 'wednesday', '10 AM', '11 PM', NULL, '2019-11-03 14:48:03', '2019-11-03 14:48:03'),
(73, 65, 'thursday', '10 AM', '11 PM', NULL, '2019-11-03 14:48:03', '2019-11-03 14:48:03'),
(74, 65, 'friday', '10 AM', '11 PM', NULL, '2019-11-03 14:48:03', '2019-11-03 14:48:03'),
(75, 65, 'saturday', '10 AM', '11 PM', NULL, '2019-11-03 14:48:03', '2019-11-03 14:48:03'),
(76, 66, 'sunday', '10 AM', '12 PM', NULL, '2019-11-03 14:51:17', '2019-11-03 14:51:17'),
(77, 66, 'monday', '10 AM', '12 PM', NULL, '2019-11-03 14:51:17', '2019-11-03 14:51:17'),
(78, 66, 'tuesday', '10 AM', '12 PM', NULL, '2019-11-03 14:51:17', '2019-11-03 14:51:17'),
(79, 66, 'wednesday', '10 AM', '12 PM', NULL, '2019-11-03 14:51:17', '2019-11-03 14:51:17'),
(80, 66, 'thursday', '10 AM', '12 PM', NULL, '2019-11-03 14:51:17', '2019-11-03 14:51:17'),
(81, 66, 'friday', '10 AM', '12 PM', NULL, '2019-11-03 14:51:17', '2019-11-03 14:51:17'),
(82, 66, 'saturday', '10 AM', '12 PM', NULL, '2019-11-03 14:51:17', '2019-11-03 14:51:17'),
(90, 60, 'sunday', '10 AM', '11 PM', NULL, '2019-11-03 19:37:53', '2019-11-03 19:37:53'),
(91, 60, 'monday', '10 AM', '11 PM', NULL, '2019-11-03 19:37:53', '2019-11-03 19:37:53'),
(92, 60, 'tuesday', '10 AM', '11 PM', NULL, '2019-11-03 19:37:53', '2019-11-03 19:37:53'),
(93, 60, 'wednesday', '10 AM', '11 PM', NULL, '2019-11-03 19:37:53', '2019-11-03 19:37:53'),
(94, 60, 'thursday', '10 AM', '11 PM', NULL, '2019-11-03 19:37:53', '2019-11-03 19:37:53'),
(95, 60, 'friday', '10 AM', '11 PM', NULL, '2019-11-03 19:37:53', '2019-11-03 19:37:53'),
(96, 60, 'saturday', '10 AM', '11 PM', NULL, '2019-11-03 19:37:53', '2019-11-03 19:37:53'),
(97, 55, 'sunday', '10 AM', '11 PM', NULL, '2019-11-03 19:39:30', '2019-11-03 19:39:30'),
(98, 55, 'monday', '10 AM', '11 PM', NULL, '2019-11-03 19:39:30', '2019-11-03 19:39:30'),
(99, 55, 'tuesday', '10 AM', '11 PM', NULL, '2019-11-03 19:39:30', '2019-11-03 19:39:30'),
(100, 55, 'wednesday', '10 AM', '11 PM', NULL, '2019-11-03 19:39:30', '2019-11-03 19:39:30'),
(101, 55, 'thursday', '10 AM', '11 PM', NULL, '2019-11-03 19:39:30', '2019-11-03 19:39:30'),
(102, 55, 'friday', '10 AM', '11 PM', NULL, '2019-11-03 19:39:30', '2019-11-03 19:39:30'),
(103, 55, 'saturday', '10 AM', '11 PM', NULL, '2019-11-03 19:39:30', '2019-11-03 19:39:30'),
(104, 70, 'sunday', '10 AM', '10 PM', NULL, '2019-11-03 19:42:14', '2019-11-03 19:42:14'),
(105, 70, 'monday', '10 AM', '10 PM', NULL, '2019-11-03 19:42:14', '2019-11-03 19:42:14'),
(106, 70, 'tuesday', '10 AM', '10 PM', NULL, '2019-11-03 19:42:14', '2019-11-03 19:42:14'),
(107, 70, 'wednesday', '10 AM', '10 PM', NULL, '2019-11-03 19:42:14', '2019-11-03 19:42:14'),
(108, 70, 'thursday', '10 AM', '10 PM', NULL, '2019-11-03 19:42:14', '2019-11-03 19:42:14'),
(109, 70, 'friday', '2 PM', '10 PM', NULL, '2019-11-03 19:42:14', '2019-11-03 19:42:14'),
(110, 70, 'saturday', '10 AM', '10 PM', NULL, '2019-11-03 19:42:14', '2019-11-03 19:42:14'),
(111, 71, 'sunday', '10 AM', '11 PM', NULL, '2019-11-03 20:42:40', '2019-11-03 20:42:40'),
(112, 71, 'monday', '10 AM', '11 PM', NULL, '2019-11-03 20:42:40', '2019-11-03 20:42:40'),
(113, 71, 'tuesday', '10 AM', '11 PM', NULL, '2019-11-03 20:42:40', '2019-11-03 20:42:40'),
(114, 71, 'wednesday', '10 AM', '11 PM', NULL, '2019-11-03 20:42:40', '2019-11-03 20:42:40'),
(115, 71, 'thursday', '10 AM', '11 PM', NULL, '2019-11-03 20:42:40', '2019-11-03 20:42:40'),
(116, 71, 'friday', '10 AM', '11 PM', NULL, '2019-11-03 20:42:40', '2019-11-03 20:42:40'),
(117, 71, 'saturday', '10 AM', '11 PM', NULL, '2019-11-03 20:42:40', '2019-11-03 20:42:40'),
(118, 57, 'sunday', '10 AM', '11 PM', NULL, '2019-11-03 21:48:53', '2019-11-03 21:48:53'),
(119, 57, 'monday', '10 AM', '11 PM', NULL, '2019-11-03 21:48:53', '2019-11-03 21:48:53'),
(120, 57, 'tuesday', '10 AM', '11 PM', NULL, '2019-11-03 21:48:53', '2019-11-03 21:48:53'),
(121, 57, 'wednesday', '10 AM', '11 PM', NULL, '2019-11-03 21:48:53', '2019-11-03 21:48:53'),
(122, 57, 'thursday', '10 AM', '11 PM', NULL, '2019-11-03 21:48:53', '2019-11-03 21:48:53'),
(123, 57, 'friday', '10 AM', '11 PM', NULL, '2019-11-03 21:48:53', '2019-11-03 21:48:53'),
(124, 57, 'saturday', '10 AM', '11 PM', NULL, '2019-11-03 21:48:53', '2019-11-03 21:48:53'),
(125, 73, 'sunday', '10 AM', '12 AM', NULL, '2019-11-05 19:02:45', '2019-11-05 19:02:45'),
(126, 73, 'monday', '10 AM', '12 AM', NULL, '2019-11-05 19:02:45', '2019-11-05 19:02:45'),
(127, 73, 'tuesday', '10 AM', '12 AM', NULL, '2019-11-05 19:02:45', '2019-11-05 19:02:45'),
(128, 73, 'wednesday', '10 AM', '12 AM', NULL, '2019-11-05 19:02:45', '2019-11-05 19:02:45'),
(129, 73, 'thursday', '10 AM', '12 AM', NULL, '2019-11-05 19:02:45', '2019-11-05 19:02:45'),
(130, 73, 'friday', '10 AM', '12 AM', NULL, '2019-11-05 19:02:45', '2019-11-05 19:02:45'),
(131, 73, 'saturday', '10 AM', '12 AM', NULL, '2019-11-05 19:02:45', '2019-11-05 19:02:45'),
(132, 74, 'sunday', '10 AM', '12 AM', NULL, '2019-11-05 19:06:52', '2019-11-05 19:06:52'),
(133, 74, 'monday', '10 AM', '12 AM', NULL, '2019-11-05 19:06:52', '2019-11-05 19:06:52'),
(134, 74, 'tuesday', '10 AM', '12 AM', NULL, '2019-11-05 19:06:52', '2019-11-05 19:06:52'),
(135, 74, 'wednesday', '10 AM', '12 AM', NULL, '2019-11-05 19:06:52', '2019-11-05 19:06:52'),
(136, 74, 'thursday', '10 AM', '12 AM', NULL, '2019-11-05 19:06:52', '2019-11-05 19:06:52'),
(137, 74, 'friday', '10 AM', '12 AM', NULL, '2019-11-05 19:06:52', '2019-11-05 19:06:52'),
(138, 74, 'saturday', '10 AM', '12 AM', NULL, '2019-11-05 19:06:52', '2019-11-05 19:06:52'),
(139, 75, 'sunday', '10 AM', '12 AM', NULL, '2019-11-05 19:09:12', '2019-11-05 19:09:12'),
(140, 75, 'monday', '10 AM', '12 AM', NULL, '2019-11-05 19:09:12', '2019-11-05 19:09:12'),
(141, 75, 'tuesday', '10 AM', '12 AM', NULL, '2019-11-05 19:09:12', '2019-11-05 19:09:12'),
(142, 75, 'wednesday', '10 AM', '12 AM', NULL, '2019-11-05 19:09:12', '2019-11-05 19:09:12'),
(143, 75, 'thursday', '10 AM', '12 AM', NULL, '2019-11-05 19:09:12', '2019-11-05 19:09:12'),
(144, 75, 'friday', '10 AM', '12 AM', NULL, '2019-11-05 19:09:12', '2019-11-05 19:09:12'),
(145, 75, 'saturday', '10 AM', '12 AM', NULL, '2019-11-05 19:09:12', '2019-11-05 19:09:12'),
(188, 31, 'sunday', '10 AM', '10 PM', NULL, '2019-11-06 16:49:06', '2019-11-06 16:49:06'),
(189, 31, 'monday', '10 AM', '10 PM', NULL, '2019-11-06 16:49:06', '2019-11-06 16:49:06'),
(190, 31, 'tuesday', '10 AM', '10 PM', NULL, '2019-11-06 16:49:06', '2019-11-06 16:49:06'),
(191, 31, 'wednesday', '10 AM', '10 PM', NULL, '2019-11-06 16:49:06', '2019-11-06 16:49:06'),
(192, 31, 'thursday', '10 AM', '10 PM', NULL, '2019-11-06 16:49:06', '2019-11-06 16:49:06'),
(193, 31, 'friday', '10 AM', '10 PM', NULL, '2019-11-06 16:49:06', '2019-11-06 16:49:06'),
(194, 31, 'saturday', '10 AM', '10 PM', NULL, '2019-11-06 16:49:06', '2019-11-06 16:49:06'),
(209, 35, 'sunday', '11 AM', '12 PM', NULL, '2019-11-06 17:54:01', '2019-11-06 17:54:01'),
(210, 35, 'monday', '11 AM', '12 PM', NULL, '2019-11-06 17:54:01', '2019-11-06 17:54:01'),
(211, 35, 'tuesday', '11 AM', '12 PM', NULL, '2019-11-06 17:54:01', '2019-11-06 17:54:01'),
(212, 35, 'wednesday', '11 AM', '12 PM', NULL, '2019-11-06 17:54:01', '2019-11-06 17:54:01'),
(213, 35, 'thursday', '11 AM', '12 PM', NULL, '2019-11-06 17:54:01', '2019-11-06 17:54:01'),
(214, 35, 'friday', '11 AM', '12 PM', NULL, '2019-11-06 17:54:01', '2019-11-06 17:54:01'),
(215, 35, 'saturday', '11 AM', '12 PM', NULL, '2019-11-06 17:54:01', '2019-11-06 17:54:01'),
(216, 78, 'sunday', '10 AM', '11 PM', NULL, '2019-11-06 21:40:37', '2019-11-06 21:40:37'),
(217, 78, 'monday', '10 AM', '11 PM', NULL, '2019-11-06 21:40:37', '2019-11-06 21:40:37'),
(218, 78, 'tuesday', '10 AM', '11 PM', NULL, '2019-11-06 21:40:37', '2019-11-06 21:40:37'),
(219, 78, 'wednesday', '10 AM', '11 PM', NULL, '2019-11-06 21:40:37', '2019-11-06 21:40:37'),
(220, 78, 'thursday', '10 AM', '11 PM', NULL, '2019-11-06 21:40:37', '2019-11-06 21:40:37'),
(221, 78, 'friday', '10 AM', '11 PM', NULL, '2019-11-06 21:40:37', '2019-11-06 21:40:37'),
(222, 78, 'saturday', '10 AM', '11 PM', NULL, '2019-11-06 21:40:37', '2019-11-06 21:40:37'),
(223, 79, 'sunday', '10 AM', '11 PM', NULL, '2019-11-06 21:45:00', '2019-11-06 21:45:00'),
(224, 79, 'monday', '10 AM', '11 PM', NULL, '2019-11-06 21:45:00', '2019-11-06 21:45:00'),
(225, 79, 'tuesday', '10 AM', '11 PM', NULL, '2019-11-06 21:45:00', '2019-11-06 21:45:00'),
(226, 79, 'wednesday', '10 AM', '11 PM', NULL, '2019-11-06 21:45:00', '2019-11-06 21:45:00'),
(227, 79, 'thursday', '10 AM', '11 PM', NULL, '2019-11-06 21:45:00', '2019-11-06 21:45:00'),
(228, 79, 'friday', '10 AM', '11 PM', NULL, '2019-11-06 21:45:00', '2019-11-06 21:45:00'),
(229, 79, 'saturday', '10 AM', '11 PM', NULL, '2019-11-06 21:45:00', '2019-11-06 21:45:00'),
(230, 80, 'sunday', '8 AM', '4 PM', NULL, '2019-11-06 22:03:08', '2019-11-06 22:03:08'),
(231, 80, 'monday', '8 AM', '4 PM', NULL, '2019-11-06 22:03:08', '2019-11-06 22:03:08'),
(232, 80, 'tuesday', '8 AM', '4 PM', NULL, '2019-11-06 22:03:08', '2019-11-06 22:03:08'),
(233, 80, 'wednesday', '8 AM', '4 PM', NULL, '2019-11-06 22:03:08', '2019-11-06 22:03:08'),
(234, 80, 'thursday', '8 AM', '4 PM', NULL, '2019-11-06 22:03:08', '2019-11-06 22:03:08'),
(235, 81, 'sunday', '10 AM', '12 PM', NULL, '2019-11-06 22:13:33', '2019-11-06 22:13:33'),
(236, 81, 'monday', '10 AM', '12 PM', NULL, '2019-11-06 22:13:33', '2019-11-06 22:13:33'),
(237, 81, 'tuesday', '10 AM', '12 PM', NULL, '2019-11-06 22:13:33', '2019-11-06 22:13:33'),
(238, 81, 'wednesday', '10 AM', '12 PM', NULL, '2019-11-06 22:13:33', '2019-11-06 22:13:33'),
(239, 81, 'thursday', '10 AM', '12 PM', NULL, '2019-11-06 22:13:33', '2019-11-06 22:13:33'),
(240, 84, 'sunday', '10 AM', '11 PM', NULL, '2019-11-06 22:33:45', '2019-11-06 22:33:45'),
(241, 84, 'monday', '10 AM', '11 PM', NULL, '2019-11-06 22:33:45', '2019-11-06 22:33:45'),
(242, 84, 'tuesday', '10 AM', '11 PM', NULL, '2019-11-06 22:33:45', '2019-11-06 22:33:45'),
(243, 84, 'wednesday', '10 AM', '11 PM', NULL, '2019-11-06 22:33:45', '2019-11-06 22:33:45'),
(244, 84, 'thursday', '10 AM', '11 PM', NULL, '2019-11-06 22:33:45', '2019-11-06 22:33:45'),
(245, 84, 'friday', '10 AM', '11 PM', NULL, '2019-11-06 22:33:45', '2019-11-06 22:33:45'),
(246, 84, 'saturday', '10 AM', '11 PM', NULL, '2019-11-06 22:33:45', '2019-11-06 22:33:45'),
(247, 90, 'sunday', '1 AM', '1 AM', NULL, '2019-11-27 15:07:43', '2019-11-27 15:07:43'),
(248, 90, 'monday', '1 AM', '1 AM', NULL, '2019-11-27 15:07:43', '2019-11-27 15:07:43'),
(249, 90, 'tuesday', '1 AM', '1 AM', NULL, '2019-11-27 15:07:43', '2019-11-27 15:07:43'),
(250, 90, 'wednesday', '1 AM', '1 AM', NULL, '2019-11-27 15:07:43', '2019-11-27 15:07:43'),
(251, 90, 'thursday', '1 AM', '1 AM', NULL, '2019-11-27 15:07:43', '2019-11-27 15:07:43'),
(252, 91, 'sunday', '1 AM', '1 AM', NULL, '2019-12-26 14:40:16', '2019-12-26 14:40:16'),
(253, 91, 'monday', '1 AM', '1 AM', NULL, '2019-12-26 14:40:16', '2019-12-26 14:40:16'),
(254, 91, 'tuesday', '1 AM', '1 AM', NULL, '2019-12-26 14:40:16', '2019-12-26 14:40:16'),
(255, 92, 'sunday', '10 AM', '1 AM', NULL, '2019-12-30 14:44:04', '2019-12-30 14:44:04'),
(256, 92, 'monday', '1 AM', '1 AM', NULL, '2019-12-30 14:44:04', '2019-12-30 14:44:04'),
(257, 92, 'tuesday', '1 AM', '1 AM', NULL, '2019-12-30 14:44:04', '2019-12-30 14:44:04'),
(258, 92, 'wednesday', '1 AM', '1 AM', NULL, '2019-12-30 14:44:04', '2019-12-30 14:44:04'),
(259, 92, 'thursday', '1 AM', '1 AM', NULL, '2019-12-30 14:44:04', '2019-12-30 14:44:04'),
(260, 92, 'friday', '1 AM', '1 AM', NULL, '2019-12-30 14:44:04', '2019-12-30 14:44:04'),
(261, 92, 'saturday', '1 AM', '1 AM', NULL, '2019-12-30 14:44:04', '2019-12-30 14:44:04'),
(262, 69, 'sunday', '10 AM', '10 PM', NULL, '2020-01-04 01:12:41', '2020-01-04 01:12:41'),
(263, 69, 'monday', '10 AM', '10 PM', NULL, '2020-01-04 01:12:41', '2020-01-04 01:12:41'),
(264, 69, 'tuesday', '10 AM', '10 PM', NULL, '2020-01-04 01:12:41', '2020-01-04 01:12:41'),
(265, 69, 'wednesday', '10 AM', '10 PM', NULL, '2020-01-04 01:12:41', '2020-01-04 01:12:41'),
(266, 69, 'thursday', '10 AM', '10 PM', NULL, '2020-01-04 01:12:41', '2020-01-04 01:12:41'),
(267, 69, 'friday', '10 AM', '10 PM', NULL, '2020-01-04 01:12:41', '2020-01-04 01:12:41'),
(268, 69, 'saturday', '10 AM', '10 PM', NULL, '2020-01-04 01:12:41', '2020-01-04 01:12:41'),
(269, 68, 'sunday', '10 AM', '10 PM', NULL, '2020-01-04 01:13:19', '2020-01-04 01:13:19'),
(270, 68, 'monday', '10 AM', '10 PM', NULL, '2020-01-04 01:13:19', '2020-01-04 01:13:19'),
(271, 68, 'tuesday', '10 AM', '10 PM', NULL, '2020-01-04 01:13:19', '2020-01-04 01:13:19'),
(272, 68, 'wednesday', '10 AM', '10 PM', NULL, '2020-01-04 01:13:19', '2020-01-04 01:13:19'),
(273, 68, 'thursday', '10 AM', '10 PM', NULL, '2020-01-04 01:13:19', '2020-01-04 01:13:19'),
(274, 68, 'friday', '10 AM', '10 PM', NULL, '2020-01-04 01:13:19', '2020-01-04 01:13:19'),
(275, 68, 'saturday', '10 AM', '10 PM', NULL, '2020-01-04 01:13:19', '2020-01-04 01:13:19'),
(276, 97, 'sunday', '1 AM', '1 AM', NULL, '2020-01-04 01:17:18', '2020-01-04 01:17:18'),
(277, 97, 'monday', '1 AM', '1 AM', NULL, '2020-01-04 01:17:18', '2020-01-04 01:17:18'),
(278, 97, 'tuesday', '1 AM', '1 AM', NULL, '2020-01-04 01:17:18', '2020-01-04 01:17:18'),
(279, 97, 'wednesday', '1 AM', '1 AM', NULL, '2020-01-04 01:17:18', '2020-01-04 01:17:18'),
(280, 97, 'thursday', '1 AM', '1 AM', NULL, '2020-01-04 01:17:18', '2020-01-04 01:17:18'),
(281, 97, 'friday', '1 AM', '1 AM', NULL, '2020-01-04 01:17:18', '2020-01-04 01:17:18'),
(282, 97, 'saturday', '1 AM', '1 AM', NULL, '2020-01-04 01:17:18', '2020-01-04 01:17:18'),
(283, 99, 'sunday', '3 AM', '1 PM', NULL, '2020-04-29 17:51:48', '2020-04-29 17:51:48'),
(284, 99, 'monday', '10 AM', '3 PM', NULL, '2020-04-29 17:51:48', '2020-04-29 17:51:48'),
(285, 99, 'tuesday', '12 AM', '3 AM', NULL, '2020-04-29 17:51:48', '2020-04-29 17:51:48'),
(286, 99, 'wednesday', '3 PM', '5 AM', NULL, '2020-04-29 17:51:48', '2020-04-29 17:51:48'),
(287, 99, 'thursday', '8 AM', '11 AM', NULL, '2020-04-29 17:51:48', '2020-04-29 17:51:48'),
(288, 99, 'friday', '10 AM', '2 AM', NULL, '2020-04-29 17:51:48', '2020-04-29 17:51:48'),
(295, 101, 'sunday', '4 AM', '1 AM', NULL, '2020-05-03 11:38:12', '2020-05-03 11:38:12'),
(296, 101, 'monday', '1 AM', '6 AM', NULL, '2020-05-03 11:38:12', '2020-05-03 11:38:12'),
(297, 101, 'tuesday', '1 AM', '8 AM', NULL, '2020-05-03 11:38:12', '2020-05-03 11:38:12'),
(298, 102, 'sunday', '1 AM', '1 AM', NULL, '2020-05-03 11:39:25', '2020-05-03 11:39:25'),
(299, 102, 'monday', '1 AM', '1 AM', NULL, '2020-05-03 11:39:25', '2020-05-03 11:39:25'),
(300, 102, 'tuesday', '1 AM', '1 AM', NULL, '2020-05-03 11:39:25', '2020-05-03 11:39:25'),
(301, 102, 'wednesday', '1 AM', '1 AM', NULL, '2020-05-03 11:39:25', '2020-05-03 11:39:25'),
(302, 103, 'sunday', '1 AM', '1 AM', NULL, '2020-05-03 11:40:44', '2020-05-03 11:40:44'),
(345, 116, 'sunday', '1 AM', '1 AM', NULL, '2020-05-05 10:45:21', '2020-05-05 10:45:21'),
(346, 116, 'monday', '1 AM', '1 AM', NULL, '2020-05-05 10:45:21', '2020-05-05 10:45:21'),
(347, 116, 'tuesday', '1 AM', '1 AM', NULL, '2020-05-05 10:45:21', '2020-05-05 10:45:21'),
(348, 117, 'sunday', '1 AM', '1 AM', NULL, '2020-05-05 10:45:53', '2020-05-05 10:45:53'),
(349, 117, 'monday', '1 AM', '1 AM', NULL, '2020-05-05 10:45:53', '2020-05-05 10:45:53'),
(350, 117, 'tuesday', '1 AM', '1 AM', NULL, '2020-05-05 10:45:53', '2020-05-05 10:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_image` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `deleted_at`, `created_at`, `updated_at`, `category_image`, `slug`) VALUES
(5, 'Bed Rooms', 'غرف نوم', NULL, '2019-09-17 15:15:31', '2020-04-02 11:00:18', '15728759035dc02e7f830e0.jpg', 'bed-rooms'),
(6, 'Dining Rooms', 'غرفة سفرة', NULL, '2019-09-17 15:18:00', '2020-04-02 11:00:18', '15729023105dc095a63374d.jpg', 'dining-rooms'),
(7, 'Home Accessories', 'الإكسسوارات المنزلية', '2019-09-23 12:30:08', '2019-09-17 15:20:00', '2019-09-23 12:30:08', NULL, NULL),
(8, 'Home Accessories', 'إكسسوارات المنزل', NULL, '2019-09-17 15:26:02', '2020-04-02 11:00:18', '15728761225dc02f5a0ab7e.jpg', 'home-accessories'),
(9, 'Tables', 'ترابيزات', NULL, '2019-09-17 15:28:33', '2020-04-02 11:00:18', '15729018425dc093d2dfc5c.jpg', 'tables'),
(10, 'Living Rooms', 'غرف المعيشة', NULL, '2019-09-23 12:42:04', '2020-04-02 11:00:18', '15728759475dc02eabd1682.jpg', 'living-rooms'),
(11, 'Salons', 'صالونات', NULL, '2019-09-23 12:42:45', '2020-04-02 11:00:18', '15728759855dc02ed1719b3.jpg', 'salons'),
(12, 'Kitchens', 'مطابخ', NULL, '2019-09-23 12:44:29', '2020-04-02 11:00:18', '15728758555dc02e4fe299f.jpg', 'kitchens'),
(13, 'Chairs', 'كراسي', NULL, '2019-09-23 12:45:32', '2020-04-02 11:00:18', '15729550915dc163d3e9e56.jpg', 'chairs'),
(14, 'Carpets', 'سجاد', NULL, '2019-09-23 12:47:50', '2020-04-02 11:00:18', '15728758915dc02e73cf1d1.jpg', 'carpets'),
(15, 'Wallpapers', 'ورق حائط', NULL, '2019-09-23 12:49:11', '2020-04-02 11:00:18', '15729638205dc185ec88c7c.jpg', 'wallpapers'),
(16, 'Windows', 'شبابيك', NULL, '2019-09-23 12:53:58', '2020-04-02 11:00:18', '15729634945dc184a66d1e8.jpg', 'windows'),
(17, 'Doors', 'أبواب', NULL, '2019-09-23 12:55:33', '2020-04-02 11:00:19', '15729624185dc180722f74d.jpg', 'doors'),
(18, 'Flooring', 'أرضيات', NULL, '2019-09-23 12:58:15', '2020-04-02 11:00:19', '15729620675dc17f1348682.jpg', 'flooring'),
(19, 'Sofas', 'كنب', NULL, '2019-09-23 12:58:27', '2020-04-02 11:00:19', '15729616155dc17d4fa00f9.jpg', 'sofas'),
(20, 'Cushions', 'مخدات', NULL, '2019-09-23 12:59:07', '2020-04-02 11:00:19', '15729614355dc17c9b651a0.jpg', 'cushions'),
(21, 'Lighting', 'إضاءة', NULL, '2019-09-23 13:01:16', '2020-04-02 11:00:19', '15729607465dc179ea92058.jpg', 'lighting'),
(22, 'Office Furniture', 'أثاث المكاتب', NULL, '2019-09-23 13:01:56', '2020-04-02 11:00:19', '15729603055dc17831984ab.jpg', 'office-furniture'),
(23, 'Storage Units', 'وحدات تخزين', NULL, '2019-09-23 13:02:32', '2020-04-02 11:00:19', '15729601815dc177b5b186c.jpg', 'storage-units'),
(24, 'Textiles', 'الأقمشة', NULL, '2019-09-23 13:03:34', '2020-04-02 11:00:19', '15729597955dc1763388fb0.jpg', 'textiles'),
(25, 'Kids Room', 'غرف الأطفال', NULL, '2019-09-23 13:07:42', '2020-04-02 11:00:19', '15729596645dc175b0f09ba.jpg', 'kids-room'),
(26, 'Curtains', 'ستائر', NULL, '2019-09-23 13:10:06', '2020-04-02 11:00:19', '15729595755dc175575fe08.jpg', 'curtains'),
(27, 'Appliances', 'أجهزة منزلية', NULL, '2019-09-23 13:11:14', '2020-04-02 11:00:19', '15729594475dc174d7e7d6d.jpg', 'appliances'),
(28, 'Paints', 'دهانات', NULL, '2019-09-23 13:11:43', '2020-04-02 11:00:19', '15729586055dc1718d5edc8.jpg', 'paints'),
(29, 'Sanitary ware', 'أدوات صحية', NULL, '2019-09-23 13:12:42', '2020-04-02 11:00:19', '15729579125dc16ed8f0527.jpg', 'sanitary-ware'),
(30, 'TV Units', 'وحدات التلفزيون', NULL, '2019-09-23 13:15:10', '2020-04-02 11:00:19', '15729571065dc16bb24665d.jpg', 'tv-units'),
(31, 'Mattress', 'مرتبات', NULL, '2019-09-23 13:15:57', '2020-04-02 11:00:19', '15729650445dc18ab43574d.jpg', 'mattress'),
(32, 'Ceramics & Tiles', 'سيراميك و بلاط', NULL, '2019-09-23 13:22:03', '2020-04-02 11:00:19', '15729563525dc168c0a421a.jpg', 'ceramics-tiles'),
(33, 'Outdoor Furniture', 'أثاث خارجي', NULL, '2019-09-23 13:27:40', '2020-04-02 11:00:19', '15729559535dc1673101182.jpg', 'outdoor-furniture'),
(34, 'Cookware', 'أدوات المطبخ', NULL, '2019-09-23 13:35:34', '2020-04-02 11:00:19', '15729558045dc1669c4379c.jpg', 'cookware'),
(35, 'Home ware', 'مفروشات', NULL, '2019-09-23 13:36:29', '2020-04-02 11:00:19', '15729555685dc165b04c1f4.jpg', 'home-ware'),
(36, 'Pouf & Bean bag', 'بوف & بين باج', NULL, '2019-09-23 13:39:33', '2020-04-02 11:00:19', '15729554305dc1652674220.jpg', 'pouf-bean-bag'),
(37, 'Electrical Supplies', 'مستلزمات كهرباء', NULL, '2019-09-24 16:29:03', '2020-04-02 11:00:19', '15729016085dc092e8d8bf6.jpg', 'electrical-supplies'),
(38, 'Home Security', 'تأمين المنزل', '2019-11-05 19:42:23', '2019-09-24 16:45:14', '2019-11-05 19:42:23', '15729007945dc08fba93035.jpg', NULL),
(39, 'corner', 'corner', '2019-10-31 16:50:20', '2019-10-31 16:48:49', '2019-10-31 16:50:20', 'category.jpg', NULL),
(40, 'Corner Sofa', 'Corner Sofa', '2019-11-05 19:42:06', '2019-10-31 16:53:50', '2019-11-05 19:42:06', '15728817825dc045763721d.jpg', NULL),
(41, 'Youth Bedrooms', 'Youth Bedrooms', '2019-10-31 21:12:25', '2019-10-31 18:49:37', '2019-10-31 21:12:25', 'category.jpg', NULL),
(42, 'Massage Chairs', 'كرسى مساج', '2019-11-05 19:20:59', '2019-11-03 14:38:57', '2019-11-05 19:20:59', '15729009415dc0904d68058.jpg', NULL),
(43, 'Massage Chairs', 'كراسى مساج', NULL, '2019-11-05 20:40:37', '2020-04-02 11:00:19', '15729612375dc17bd52e406.jpg', 'massage-chairs'),
(44, 'Dressing Rooms', 'غرف ملابس', NULL, '2020-01-06 12:49:54', '2020-04-02 11:00:19', '15783077945e1310d24f978.jpg', 'dressing-rooms');

-- --------------------------------------------------------

--
-- Table structure for table `chat_blocks`
--

CREATE TABLE `chat_blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `showroom_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_follows`
--

CREATE TABLE `chat_follows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pinnable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinnable_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_ar`, `name_en`, `deleted_at`, `created_at`, `updated_at`, `country_id`) VALUES
(15, 'القاهرة', 'Cairo', NULL, '2019-09-11 16:41:58', '2019-09-11 16:41:58', 3),
(16, 'الإسكندرية', 'Alexandria', NULL, '2019-09-11 18:18:44', '2019-09-11 18:18:44', 3),
(17, 'الإسماعيلية', 'Ismailia', NULL, '2019-09-11 18:27:47', '2019-09-11 18:27:47', 3),
(18, 'أسوان', 'Aswan', NULL, '2019-09-11 18:28:16', '2019-09-11 18:28:16', 3),
(19, 'أسيوط', 'Asyut', NULL, '2019-09-11 18:28:58', '2019-09-11 18:28:58', 3),
(20, 'الأقصر', 'Luxor', NULL, '2019-09-11 18:29:41', '2019-09-11 18:29:41', 3),
(21, 'البحيرة', 'Beheira', NULL, '2019-09-11 18:31:23', '2019-09-11 18:31:23', 3),
(22, 'الغردقة', 'Hurghada', NULL, '2019-09-11 18:31:58', '2019-09-11 18:31:58', 3),
(23, 'بني سويف', 'Beni Suef', NULL, '2019-09-11 18:32:40', '2019-09-11 18:32:40', 3),
(24, 'بورسعيد', 'Port Said', NULL, '2019-09-11 18:33:39', '2019-09-11 18:33:39', 3),
(25, 'جنوب سيناء', 'South Sinai', NULL, '2019-09-11 18:34:35', '2019-09-11 18:34:35', 3),
(26, 'الجيزة', 'Giza', NULL, '2019-09-11 18:35:03', '2019-09-11 18:35:03', 3),
(27, 'الدقهلية', 'Dakahlia', NULL, '2019-09-11 18:35:42', '2019-09-11 18:35:42', 3),
(28, 'دمياط', 'Damietta', NULL, '2019-09-11 18:36:29', '2019-09-11 18:36:29', 3),
(29, 'سوهاج', 'Sohag', NULL, '2019-09-11 18:37:00', '2019-09-11 18:37:00', 3),
(30, 'السويس', 'Suez', NULL, '2019-09-11 18:37:40', '2019-09-11 18:37:40', 3),
(31, 'الشرقية', 'Sharqia', NULL, '2019-09-11 18:40:59', '2019-09-11 18:40:59', 3),
(32, 'الغربية', 'Gharbia', NULL, '2019-09-11 18:43:06', '2019-09-11 18:43:06', 3),
(33, 'الفيوم', 'Faiyum', NULL, '2019-09-11 18:43:40', '2019-09-11 18:43:40', 3),
(34, 'القليوبية', 'Qalyubia', NULL, '2019-09-11 18:44:12', '2019-09-11 18:44:12', 3),
(35, 'قنا', 'Qena', NULL, '2019-09-11 18:45:03', '2019-09-11 18:45:03', 3),
(36, 'كفر الشيخ', 'Kafr El Sheikh', NULL, '2019-09-11 18:45:41', '2019-09-11 18:45:41', 3),
(37, 'مرسى مطروح', 'Marsa Matruh', NULL, '2019-09-11 18:46:56', '2019-09-11 18:46:56', 3),
(38, 'المنوفية', 'Monufia', NULL, '2019-09-11 18:47:18', '2019-09-11 18:47:18', 3),
(39, 'المنيا', 'Minya', NULL, '2019-09-11 18:47:47', '2019-09-11 18:47:47', 3),
(40, 'الوادي الجديد', 'New Valley', NULL, '2019-09-11 18:48:23', '2019-09-11 18:48:23', 3);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name_en`, `name_ar`, `created_at`, `updated_at`, `code`, `deleted_at`) VALUES
(4, 'Silver', 'فضي', '2019-09-17 15:51:30', '2019-11-06 19:45:08', '#C0C0C0', NULL),
(5, 'Black', 'اسود', '2019-09-22 19:00:02', '2019-09-22 19:00:02', '#000000', NULL),
(6, 'Grey', 'رمادي', '2019-09-22 19:11:36', '2019-09-22 19:11:36', '#888888', NULL),
(7, 'Multi', 'متعددة الألوان', '2019-09-22 19:25:42', '2019-11-06 19:45:42', 'nocode', NULL),
(8, 'Black and White', 'ابيض و اسود', '2019-09-22 19:27:21', '2019-11-06 19:46:17', 'no code', NULL),
(9, 'White', 'أبيض', '2019-09-22 19:30:09', '2019-09-22 19:30:09', '#FFFFFF', NULL),
(10, 'Red', 'أحمر', '2019-09-22 19:31:16', '2019-11-06 19:42:25', '#FF0000', NULL),
(11, 'Orange', 'برتقالي', '2019-09-22 19:32:30', '2019-11-06 19:42:46', '#FF8800', NULL),
(12, 'Purple', 'أرجواني', '2019-09-22 19:33:54', '2019-09-22 19:33:54', '#770077', NULL),
(13, 'Fuchsia', 'قرمزي', '2019-09-22 19:36:00', '2019-09-22 19:37:05', '#FF00FF', NULL),
(14, 'Green', 'أخضر', '2019-09-22 19:38:17', '2019-09-22 19:40:52', '#008000', NULL),
(15, 'Olive', 'زيتوني', '2019-09-22 19:40:01', '2019-09-22 19:40:01', '#888800', NULL),
(16, 'Yellow', 'أصفر', '2019-09-22 19:41:49', '2019-11-06 19:43:22', '#FFFF00', NULL),
(17, 'Blue', 'أزرق', '2019-09-22 19:43:11', '2019-11-06 19:44:02', '#0000FF', NULL),
(18, 'Dark Blue', 'كحلي', '2019-09-22 19:44:27', '2019-11-06 19:44:32', '#223366', NULL),
(19, 'Aqua = Cyan', 'أزرق مائي', '2019-09-22 19:45:36', '2019-09-22 19:45:36', '#00FFFF', NULL),
(20, 'Teal', 'تيل', '2019-09-22 19:50:04', '2019-09-22 19:50:04', '#008080', NULL),
(21, 'Brown', 'بني', '2019-10-20 17:36:45', '2019-11-06 19:41:51', '#744d26', NULL),
(22, 'Beige', 'بيج', '2019-10-20 17:43:13', '2019-11-06 19:41:19', '#e1c699', NULL),
(23, 'Off White', 'اووف وايت', '2019-10-23 15:30:33', '2019-11-06 19:40:28', '#f5f2d0', NULL),
(24, 'Turquoise', 'Turquoise', '2019-10-31 17:00:33', '2019-11-06 19:08:33', '#40E0D0', NULL),
(25, 'Pink', 'زهري', '2019-11-04 18:34:38', '2019-11-04 18:34:38', '#ffc0cb', NULL),
(26, 'Light Coral', 'مرجانى فاتح', '2019-11-05 16:05:54', '2019-11-05 16:05:54', '#E77471', NULL),
(27, 'Medium Violet Red', 'أحمر بنفسجي متوسط', '2019-11-05 17:19:04', '2019-11-05 17:19:04', '#CA226B', NULL),
(28, 'Light Sky Blue', 'ازرق سماوى فاتح', '2019-11-05 20:28:12', '2019-11-05 20:28:12', '#A0CFEC', NULL),
(29, 'khaki', 'كاكى', '2019-11-07 16:57:06', '2019-11-07 16:57:06', '#C3B091', NULL),
(30, 'Steel Blue', 'بترولى', '2019-11-11 18:04:57', '2019-11-11 18:04:57', '#2B547E', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `commentable_type`, `commentable_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 32, 'App\\ShowroomReview', 13, 'ghchgjvhgvj', '2020-04-29 10:52:27', '2020-04-29 10:52:27'),
(2, 32, 'App\\ShowroomReview', 12, 'hvbjhv', '2020-04-29 10:53:08', '2020-04-29 10:53:08'),
(3, 32, 'App\\ShowroomReview', 12, 'dabsdjhbdjada', '2020-04-29 18:56:27', '2020-04-29 18:56:27'),
(4, 32, 'App\\ShowroomReview', 11, 'chgsdvfjsdf', '2020-04-29 19:01:01', '2020-04-29 19:01:01'),
(5, 32, 'App\\ShowroomReview', 12, 'hdvajsvhdasd', '2020-04-29 19:01:19', '2020-04-29 19:01:19'),
(6, 32, 'App\\ShowroomReview', 12, 'test', '2020-04-29 19:01:27', '2020-04-29 19:01:27'),
(7, 32, 'App\\ShowroomReview', 11, 'hdbsajdhavsjdasd', '2020-04-29 19:01:58', '2020-04-29 19:01:58'),
(8, 32, 'App\\ShowroomReview', 11, 'hdbsajdhavsjdasd', '2020-04-29 19:02:03', '2020-04-29 19:02:03'),
(9, 32, 'App\\ShowroomReview', 11, 'hdbsajdhavsjdasd', '2020-04-29 19:02:08', '2020-04-29 19:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `compare_products`
--

CREATE TABLE `compare_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compare_products`
--

INSERT INTO `compare_products` (`id`, `product_id`, `created_at`, `updated_at`, `user_id`) VALUES
(19, 102, '2020-01-04 01:24:29', '2020-01-04 01:24:29', 4),
(20, 116, '2020-04-28 12:57:14', '2020-04-28 12:57:14', 48),
(21, 117, '2020-04-28 13:01:46', '2020-04-28 13:01:46', 48),
(22, 118, '2020-04-30 10:26:10', '2020-04-30 10:26:10', 32),
(23, 92, '2020-04-30 10:47:47', '2020-04-30 10:47:47', 32),
(24, 78, '2020-04-30 10:47:52', '2020-04-30 10:47:52', 32),
(25, 117, '2020-05-04 10:48:41', '2020-05-04 10:48:41', 32);

-- --------------------------------------------------------

--
-- Table structure for table `consultants`
--

CREATE TABLE `consultants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`id`, `user_id`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 4, 'test', 'test', '2020-04-02 11:02:58', '2020-04-02 11:02:58'),
(2, 27, 'Subject', 'sdfsadad', '2020-04-02 11:22:26', '2020-04-02 11:22:26'),
(3, 28, 'test', 'test@yalla.com', '2020-04-02 23:07:41', '2020-04-02 23:07:41'),
(4, 31, NULL, 'message', '2020-04-05 12:05:50', '2020-04-05 12:05:50'),
(5, 32, 'basel subject', 'basel message', '2020-04-05 12:44:32', '2020-04-05 12:44:32'),
(6, 33, NULL, 'message', '2020-04-05 12:53:02', '2020-04-05 12:53:02'),
(7, 34, NULL, 'message', '2020-04-05 12:55:39', '2020-04-05 12:55:39'),
(8, 35, 'shdvgs', 'hdbasdhjsadsad', '2020-04-05 13:04:40', '2020-04-05 13:04:40'),
(9, 36, NULL, 'message', '2020-04-05 13:04:56', '2020-04-05 13:04:56'),
(10, 37, NULL, 'message', '2020-04-05 13:10:41', '2020-04-05 13:10:41'),
(11, 38, NULL, 'message', '2020-04-05 13:29:03', '2020-04-05 13:29:03'),
(12, 40, NULL, 'message', '2020-04-05 13:35:26', '2020-04-05 13:35:26'),
(13, 41, NULL, 'message', '2020-04-05 13:50:07', '2020-04-05 13:50:07'),
(14, 42, NULL, 'message', '2020-04-05 17:13:59', '2020-04-05 17:13:59'),
(15, 48, 'one', 'yes we can do that', '2020-04-28 13:03:53', '2020-04-28 13:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `consultant_images`
--

CREATE TABLE `consultant_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consultant_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultant_images`
--

INSERT INTO `consultant_images` (`id`, `consultant_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '1585818178image5e85aa42662f0.jpg', '2020-04-02 11:02:58', '2020-04-02 11:02:58'),
(2, 2, '1585819346image5e85aed29a31a.jpg', '2020-04-02 11:22:26', '2020-04-02 11:22:26'),
(3, 2, '1585819346image5e85aed2bd1d6.jpg', '2020-04-02 11:22:26', '2020-04-02 11:22:26'),
(4, 2, '1585819346image5e85aed2cca98.jpg', '2020-04-02 11:22:26', '2020-04-02 11:22:26'),
(5, 3, '1585861661image5e86541daf0f2.jpg', '2020-04-02 23:07:41', '2020-04-02 23:07:41'),
(6, 5, '1586083472image5e89b690f3c6e.png', '2020-04-05 12:44:33', '2020-04-05 12:44:33'),
(7, 5, '1586083473image5e89b6912831f.jpg', '2020-04-05 12:44:33', '2020-04-05 12:44:33'),
(8, 13, '1586087407image5e89c5efab659.jpg', '2020-04-05 13:50:07', '2020-04-05 13:50:07'),
(9, 13, '1586087407image5e89c5eff3081.jpg', '2020-04-05 13:50:08', '2020-04-05 13:50:08'),
(10, 13, '1586087408image5e89c5f013f54.jpg', '2020-04-05 13:50:08', '2020-04-05 13:50:08'),
(11, 13, '1586087408image5e89c5f0581dd.jpg', '2020-04-05 13:50:08', '2020-04-05 13:50:08'),
(12, 13, '1586087408image5e89c5f0695ce.png', '2020-04-05 13:50:08', '2020-04-05 13:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_en`, `name_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Egypt', 'مصر', '2019-09-10 17:25:41', '2019-09-10 17:25:41', NULL),
(4, 'Germany', 'المانيا', '2019-09-10 17:50:31', '2019-09-10 17:50:31', NULL),
(5, 'Afghanistan', 'افغانستان', '2019-09-10 18:37:38', '2019-09-10 18:37:38', NULL),
(6, 'Albania', 'البانيا', '2019-09-10 18:41:40', '2020-04-08 15:51:51', '2020-04-08 15:51:51'),
(7, 'Algeria', 'الجزائر', '2019-09-10 18:43:45', '2019-09-10 18:43:45', NULL),
(8, 'Andorra', 'اندورا', '2019-09-10 18:58:38', '2019-09-10 18:58:38', NULL),
(9, 'Angola', 'انغولا', '2019-09-10 19:15:21', '2019-09-10 19:15:21', NULL),
(10, 'Argentina', 'الارجنتين', '2019-09-10 19:19:10', '2019-09-10 19:19:10', NULL),
(11, 'Armenia', 'ارمينيا', '2019-09-10 19:19:34', '2019-09-10 19:19:34', NULL),
(12, 'Australia', 'استراليا', '2019-09-10 19:21:08', '2019-09-10 19:21:08', NULL),
(13, 'Austria', 'النمسا', '2019-09-10 19:26:17', '2019-09-10 19:26:17', NULL),
(14, 'Azerbaijan', 'اذربيجان', '2019-09-10 19:31:48', '2019-09-10 19:31:48', NULL),
(15, 'The Bahamas', 'جزرالبهاما', '2019-09-10 19:36:21', '2019-09-10 19:36:21', NULL),
(16, 'Bahrain', 'البحرين', '2019-09-10 19:37:28', '2019-09-10 19:37:28', NULL),
(17, 'Bangladesh', 'بنغلاديش', '2019-09-10 19:47:35', '2019-09-10 19:47:35', NULL),
(18, 'Barbados', 'باربادوس', '2019-09-10 19:49:29', '2019-09-10 19:49:29', NULL),
(19, 'Belarus', 'بيلاروسيا', '2019-09-11 13:10:03', '2019-09-11 13:10:03', NULL),
(20, 'Belgium', 'بلجيكا', '2019-09-11 13:10:27', '2019-09-11 13:10:27', NULL),
(21, 'Belize', 'بيليز', '2019-09-11 13:10:54', '2019-09-11 13:10:54', NULL),
(22, 'Benin', 'بنين', '2019-09-11 13:11:26', '2019-09-11 13:11:26', NULL),
(23, 'Bhutan', 'بوتان', '2019-09-11 13:12:28', '2019-09-11 13:12:28', NULL),
(24, 'Bolivia', 'بوليفيا', '2019-09-11 13:13:19', '2019-09-11 13:13:19', NULL),
(25, 'Botswana', 'بوتسوانا', '2019-09-11 13:13:47', '2019-09-11 13:13:47', NULL),
(26, 'Brazil', 'البرازيل', '2019-09-11 13:14:09', '2019-09-11 13:14:09', NULL),
(27, 'Brunei', 'بروناى', '2019-09-11 13:14:34', '2019-09-11 13:14:34', NULL),
(28, 'Bulgaria', 'بلغاريا', '2019-09-11 13:18:49', '2019-09-11 13:18:49', NULL),
(29, 'Burkina Faso', 'بوركينافاسو', '2019-09-11 13:19:19', '2019-09-11 13:19:19', NULL),
(30, 'Burundi', 'بوروندي', '2019-09-11 13:20:05', '2019-09-11 13:20:05', NULL),
(31, 'Cambodia', 'كمبوديا', '2019-09-11 13:22:42', '2019-09-11 13:22:42', NULL),
(32, 'Cameroon', 'الكاميرون', '2019-09-11 13:23:53', '2019-09-11 13:23:53', NULL),
(33, 'Canada', 'كندا', '2019-09-11 13:27:02', '2019-09-11 13:27:02', NULL),
(34, 'Cape Verde', 'الرأسالاخضر', '2019-09-11 13:27:27', '2019-09-11 13:27:27', NULL),
(35, 'Central African Republic', 'جمهوريةافريقياالوسطى', '2019-09-11 13:28:09', '2019-09-11 13:28:09', NULL),
(36, 'Chad', 'تشاد', '2019-09-11 13:28:37', '2019-09-11 13:28:37', NULL),
(37, 'Chile', 'شيلي', '2019-09-11 13:29:16', '2019-09-11 13:29:16', NULL),
(38, 'China', 'الصين', '2019-09-11 13:29:35', '2019-09-11 13:29:35', NULL),
(39, 'Colombia', 'كولمبيا', '2019-09-11 13:51:56', '2019-09-11 13:51:56', NULL),
(40, 'Comoros', 'جزرالُقمـــر', '2019-09-11 13:52:25', '2019-09-11 13:52:25', NULL),
(41, 'Republic of the Congo', 'جمهوريةالكونغو', '2019-09-11 13:53:00', '2019-09-11 13:53:00', NULL),
(42, 'Democratic Republic of the Congo', 'جمهوريةالكونغوالديمقراطية', '2019-09-11 13:55:27', '2019-09-11 13:55:27', NULL),
(43, 'Ivory Coast', 'ساحل العاج', '2019-09-11 13:57:17', '2019-09-11 14:15:38', NULL),
(44, 'Croatia', 'كرواتيا', '2019-09-11 14:13:01', '2019-09-11 14:13:01', NULL),
(45, 'Cuba', 'كوبا', '2019-09-11 14:16:16', '2019-09-11 14:16:16', NULL),
(46, 'Cyprus', 'قبرص', '2019-09-11 14:17:59', '2019-09-11 14:17:59', NULL),
(47, 'Czech Republic', 'جمهورية التشيك', '2019-09-11 14:19:45', '2019-09-11 14:19:45', NULL),
(48, 'Denmark', 'الدنمارك', '2019-09-11 14:20:06', '2019-09-11 14:20:06', NULL),
(49, 'Djibouti', 'جيبوتي', '2019-09-11 14:20:26', '2019-09-11 14:20:26', NULL),
(50, 'Dominica', 'دومينيكا', '2019-09-11 14:20:52', '2019-09-11 14:20:52', NULL),
(51, 'Dominican Republic', 'الدومينيكان', '2019-09-11 14:21:11', '2019-09-11 14:21:11', NULL),
(52, 'East Timor', 'تيمورالشرقية', '2019-09-11 14:24:06', '2019-09-11 14:24:06', NULL),
(53, 'Ecuador', 'الاكوادور', '2019-09-11 14:28:17', '2019-09-11 14:28:17', NULL),
(54, 'El-Salvador', 'السفادور', '2019-09-11 14:29:14', '2019-09-11 14:29:14', NULL),
(55, 'Equatorial Guinea', 'غينيا الاستوائية', '2019-09-11 14:30:19', '2019-09-11 14:30:19', NULL),
(56, 'Estonia', 'استونيا', '2019-09-11 14:30:51', '2019-09-11 14:30:51', NULL),
(57, 'Ethiopia', 'اثيوبيا', '2019-09-11 14:34:44', '2019-09-11 14:34:44', NULL),
(58, 'Eritrea', 'اريتريا', '2019-09-11 14:35:25', '2019-09-11 14:35:25', NULL),
(59, 'Eritrea', 'اريتريا', '2019-09-11 14:35:32', '2019-09-11 14:35:32', NULL),
(60, 'Fiji', 'جزر فيجي', '2019-09-11 15:06:03', '2019-09-11 15:06:03', NULL),
(61, 'France', 'فرنسا', '2019-09-11 15:06:45', '2019-09-11 15:06:45', NULL),
(62, 'Finland', 'فنلندا', '2019-09-11 15:07:25', '2019-09-11 15:07:25', NULL),
(63, 'Gabon', 'الغابون', '2019-09-11 15:07:55', '2019-09-11 15:07:55', NULL),
(64, 'The Gambia', 'غامبيا', '2019-09-11 15:08:25', '2019-09-11 15:08:25', NULL),
(65, 'Georgia', 'جورجيا', '2019-09-11 15:09:40', '2019-09-11 15:09:40', NULL),
(66, 'Ghana', 'غانا', '2019-09-11 15:10:00', '2019-09-11 15:10:00', NULL),
(67, 'Ghana', 'غانا', '2019-09-11 15:10:16', '2019-09-11 15:10:16', NULL),
(68, 'Greece', 'اليونان', '2019-09-11 15:11:44', '2019-09-11 15:11:44', NULL),
(69, 'Grenada', 'غرانادا', '2019-09-11 15:12:16', '2019-09-11 15:12:16', NULL),
(70, 'Guatemala', 'غواتيمالا', '2019-09-11 15:12:40', '2019-09-11 15:12:40', NULL),
(71, 'Guinea', 'غينيا', '2019-09-11 15:12:58', '2019-09-11 15:12:58', NULL),
(72, 'Guinea Bissau', 'غينيا بيساو', '2019-09-11 15:13:28', '2019-09-11 15:13:28', NULL),
(73, 'Guyana', 'غويانا', '2019-09-11 15:13:47', '2019-09-11 15:13:47', NULL),
(74, 'Haiti', 'هايتي', '2019-09-11 15:15:06', '2019-09-11 15:15:06', NULL),
(75, 'Honduras', 'هندوراس', '2019-09-11 15:17:44', '2019-09-11 15:17:44', NULL),
(76, 'Hungary', 'المجر', '2019-09-11 15:19:04', '2019-09-11 15:19:04', NULL),
(77, 'Iceland', 'ايسلندا', '2019-09-11 15:19:40', '2019-09-11 15:19:40', NULL),
(78, 'India', 'الهند', '2019-09-11 15:20:29', '2019-09-11 15:20:29', NULL),
(79, 'Indonesia', 'اندونيسيا', '2019-09-11 15:20:50', '2019-09-11 15:20:50', NULL),
(80, 'Iran', 'ايران', '2019-09-11 15:21:23', '2019-09-11 15:21:23', NULL),
(81, 'Iraq', 'العراق', '2019-09-11 15:22:00', '2019-09-11 15:22:00', NULL),
(82, 'Ireland', 'ايرلندا', '2019-09-11 15:22:34', '2019-09-11 15:22:34', NULL),
(83, 'Italy', 'ايطاليا', '2019-09-11 15:24:32', '2019-09-11 15:24:32', NULL),
(84, 'Jamaica', 'جاميكا', '2019-09-11 15:25:17', '2019-09-11 15:25:17', NULL),
(85, 'Japan', 'اليابان', '2019-09-11 15:25:57', '2019-09-11 15:25:57', NULL),
(86, 'Jordan', 'الاردن', '2019-09-11 15:26:18', '2019-09-11 15:26:18', NULL),
(87, 'Kazakhstan', 'كازاخستان', '2019-09-11 15:26:37', '2019-09-11 15:26:37', NULL),
(88, 'Kenya', 'كينيا', '2019-09-11 15:27:16', '2019-09-11 15:27:16', NULL),
(89, 'Kiribati', 'كيريباتى', '2019-09-11 15:27:42', '2019-09-11 15:27:42', NULL),
(90, 'Korea, North', 'كوريا الشمالية', '2019-09-11 15:28:36', '2019-09-11 15:28:36', NULL),
(91, 'Korea, South', 'كوريا الجنوبية', '2019-09-11 15:29:03', '2019-09-11 15:29:03', NULL),
(92, 'Kuwait', 'الكويت', '2019-09-11 15:29:26', '2019-09-11 15:29:26', NULL),
(93, 'Kyrgyzstan', 'قرغيزستان', '2019-09-11 15:29:49', '2019-09-11 15:29:49', NULL),
(94, 'Laos', 'لاوس', '2019-09-11 15:30:16', '2019-09-11 15:30:16', NULL),
(95, 'Latvia', 'لاتفيا', '2019-09-11 15:30:36', '2019-09-11 15:30:36', NULL),
(96, 'Lebanon', 'لبنان', '2019-09-11 15:30:55', '2019-09-11 15:30:55', NULL),
(97, 'Liberia', 'ليبيريا', '2019-09-11 15:31:31', '2019-09-11 15:31:31', NULL),
(98, 'Libya', 'ليبيا', '2019-09-11 15:31:49', '2019-09-11 15:31:49', NULL),
(99, 'Liechtenstein', 'ليختنشتاين', '2019-09-11 15:32:14', '2019-09-11 15:32:14', NULL),
(100, 'Luxembourg', 'لوكسمبورغ', '2019-09-11 15:33:15', '2019-09-11 15:33:15', NULL),
(101, 'Macedonia', 'مقدونيا', '2019-09-11 15:33:44', '2019-09-11 15:33:44', NULL),
(102, 'Madagascar', 'مدغشقر', '2019-09-11 15:34:01', '2019-09-11 15:34:01', NULL),
(103, 'Malawi', 'مالاوى', '2019-09-11 15:34:17', '2019-09-11 15:34:17', NULL),
(104, 'Malaysia', 'ماليزيا', '2019-09-11 15:34:32', '2019-09-11 15:34:32', NULL),
(105, 'Maldives', 'جزر المالديف', '2019-09-11 15:34:58', '2019-09-11 15:34:58', NULL),
(106, 'Mali', 'مالى', '2019-09-11 15:35:20', '2019-09-11 15:35:20', NULL),
(107, 'Malta', 'جزيرة مالطا', '2019-09-11 15:35:48', '2019-09-11 15:35:48', NULL),
(108, 'Marshall Islands', 'جزر مارشال', '2019-09-11 15:36:57', '2019-09-11 15:36:57', NULL),
(109, 'Mauritania', 'موريتانيا', '2019-09-11 15:37:14', '2019-09-11 15:37:14', NULL),
(110, 'موريشيوس', 'Mauritius', '2019-09-11 15:39:42', '2019-09-11 15:39:42', NULL),
(111, 'Mexico', 'المكسيك', '2019-09-11 15:40:01', '2019-09-11 15:40:01', NULL),
(112, 'Federated States of Micronesia', 'جزر مايكرونيزيا', '2019-09-11 15:40:37', '2019-09-11 15:40:37', NULL),
(113, 'Moldova', 'مولدوفيا', '2019-09-11 15:41:20', '2019-09-11 15:41:20', NULL),
(114, 'Monaco', 'امارة موناكو', '2019-09-11 15:42:03', '2019-09-11 15:42:03', NULL),
(115, 'Mongolia', 'منغولي', '2019-09-11 15:42:22', '2019-09-11 15:42:22', NULL),
(116, 'Montenegro', 'مونتنيغرو', '2019-09-11 15:42:56', '2019-09-11 15:42:56', NULL),
(117, 'Morocco', 'المغرب', '2019-09-11 15:43:21', '2019-09-11 15:43:21', NULL),
(118, 'Mozambique', 'موزمبيق', '2019-09-11 15:44:09', '2019-09-11 15:44:09', NULL),
(119, 'Burma', 'بورما', '2019-09-11 15:44:25', '2019-09-11 15:44:25', NULL),
(120, 'Namibia', 'ناميبيا', '2019-09-11 15:44:42', '2019-09-11 15:44:42', NULL),
(121, 'Nauru', 'ناورو', '2019-09-11 15:45:03', '2019-09-11 15:45:03', NULL),
(122, 'Nepal', 'نيبال', '2019-09-11 15:45:26', '2019-09-11 15:45:26', NULL),
(123, 'Netherlands', 'هولندا', '2019-09-11 15:46:27', '2019-09-11 15:46:27', NULL),
(124, 'New Zealand', 'نيوزيلندا', '2019-09-11 15:46:41', '2019-09-11 15:46:41', NULL),
(125, 'Nicaragua', 'نيكاراغوا', '2019-09-11 15:46:59', '2019-09-11 15:46:59', NULL),
(126, 'Niger', 'النيجر', '2019-09-11 15:47:17', '2019-09-11 15:47:17', NULL),
(127, 'Nigeria', 'نيجيريا', '2019-09-11 15:47:36', '2019-09-11 15:47:36', NULL),
(128, 'Norway', 'النرويج', '2019-09-11 15:48:08', '2019-09-11 15:48:08', NULL),
(129, 'Oman', 'سلطنة عًمان', '2019-09-11 15:48:31', '2019-09-11 15:48:31', NULL),
(130, 'Pakistan', 'باكستان', '2019-09-11 15:48:53', '2019-09-11 15:48:53', NULL),
(131, 'Palau', 'بالو', '2019-09-11 15:49:07', '2019-09-11 15:49:07', NULL),
(132, 'Panama', 'بنما', '2019-09-11 15:49:39', '2019-09-11 15:49:39', NULL),
(133, 'Papua New Guinea', 'بابوا غينيا الجديدة', '2019-09-11 15:50:01', '2019-09-11 15:50:01', NULL),
(134, 'Paraguay', 'باراغواي', '2019-09-11 15:50:25', '2019-09-11 15:50:25', NULL),
(135, 'Peru', 'بيرو', '2019-09-11 15:50:39', '2019-09-11 15:50:39', NULL),
(136, 'Philippines', 'الفليبين', '2019-09-11 15:50:56', '2019-09-11 15:50:56', NULL),
(137, 'Poland', 'بولندا', '2019-09-11 15:51:22', '2019-09-11 15:51:22', NULL),
(138, 'Portugal', 'البرتغال', '2019-09-11 15:51:45', '2019-09-11 15:51:45', NULL),
(139, 'Qatar', 'قطر', '2019-09-11 15:53:07', '2019-09-11 15:53:07', NULL),
(140, 'Romania', 'رومانيا', '2019-09-11 15:54:49', '2019-09-11 15:54:49', NULL),
(141, 'Russia', 'روسيا الاتحادية', '2019-09-11 15:55:16', '2019-09-11 15:55:16', NULL),
(142, 'Rwanda', 'رواندا', '2019-09-11 15:55:59', '2019-09-11 15:55:59', NULL),
(143, 'Saint Kitts and Nevis', 'سان كيتس اند نيفز', '2019-09-11 15:56:29', '2019-09-11 15:56:29', NULL),
(144, 'Saint Lucia', 'سان لوتشيا', '2019-09-11 15:56:48', '2019-09-11 15:56:48', NULL),
(145, 'Saint Vincent and the Grenadines', 'سان فنسن وغرينادينز', '2019-09-11 15:57:10', '2019-09-11 15:57:10', NULL),
(146, 'Samoa', 'ساموا', '2019-09-11 15:57:47', '2019-09-11 15:57:47', NULL),
(147, 'San Marino', 'سان مارينو', '2019-09-11 15:58:34', '2019-09-11 15:58:34', NULL),
(148, 'Sao Tome and Principe', 'ساوتومي اند برنسيب', '2019-09-11 16:00:15', '2019-09-11 16:00:15', NULL),
(149, 'Saudi Arabia', 'السعودية', '2019-09-11 16:01:05', '2019-09-11 16:01:05', NULL),
(150, 'Senegal', 'السنغال', '2019-09-11 16:01:20', '2019-09-11 16:01:20', NULL),
(151, 'Serbia', 'صربيا', '2019-09-11 16:01:36', '2019-09-11 16:01:36', NULL),
(152, 'Seychelles', 'جزر سيشل', '2019-09-11 16:01:53', '2019-09-11 16:01:53', NULL),
(153, 'Seychelles', 'جزر سيشل', '2019-09-11 16:01:58', '2019-09-11 16:01:58', NULL),
(154, 'Sierra Leone', 'سيراليون', '2019-09-11 16:02:32', '2019-09-11 16:02:32', NULL),
(155, 'Singapore', 'سنغافورة', '2019-09-11 16:05:57', '2019-09-11 16:05:57', NULL),
(156, 'Slovakia', 'سلوفاكيا', '2019-09-11 16:06:32', '2019-09-11 16:06:32', NULL),
(157, 'Slovakia', 'سلوفاكيا', '2019-09-11 16:06:39', '2019-09-11 19:07:32', '2019-09-11 19:07:32'),
(158, 'Slovenia', 'سلوفينيا', '2019-09-11 16:07:57', '2019-09-11 16:07:57', NULL),
(159, 'Solomon Islands', 'جزر سولومون', '2019-09-11 16:08:18', '2019-09-11 16:08:18', NULL),
(160, 'Somalia', 'الصومال', '2019-09-11 16:08:35', '2019-09-11 16:08:35', NULL),
(161, 'South Africa', 'جنوب افريقيا', '2019-09-11 16:13:41', '2019-09-11 16:13:41', NULL),
(162, 'Spain', 'إسبانيا', '2019-09-11 16:14:03', '2019-09-11 16:14:03', NULL),
(163, 'Sri Lanka', 'سريلانكا', '2019-09-11 16:15:13', '2019-09-11 16:15:13', NULL),
(164, 'Sudan', 'السودان', '2019-09-11 16:16:00', '2019-09-11 16:16:00', NULL),
(165, 'Suriname', 'سورينام', '2019-09-11 16:16:19', '2019-09-11 16:16:19', NULL),
(166, 'Swaziland', 'سوازيلاند', '2019-09-11 16:16:35', '2019-09-11 16:16:35', NULL),
(167, 'Sweden', 'السويد', '2019-09-11 16:16:59', '2019-09-11 16:16:59', NULL),
(168, 'Switzerland', 'سويسرا', '2019-09-11 16:17:32', '2019-09-11 16:17:32', NULL),
(169, 'Syria', 'سوريا', '2019-09-11 16:17:56', '2019-09-11 16:17:56', NULL),
(170, 'Tajikistan', 'طاجكستان', '2019-09-11 16:18:18', '2019-09-11 16:18:18', NULL),
(171, 'Tanzania', 'تنزانيا', '2019-09-11 16:18:34', '2019-09-11 16:18:34', NULL),
(172, 'Thailand', 'تايلاند', '2019-09-11 16:19:01', '2019-09-11 16:19:01', NULL),
(173, 'Togo', 'توغو', '2019-09-11 16:19:19', '2019-09-11 16:19:19', NULL),
(174, 'Tonga', 'تونغا', '2019-09-11 16:20:36', '2019-09-11 16:20:36', NULL),
(175, 'Trinidad and Tobago', 'ترينداد وتوباغو', '2019-09-11 16:20:53', '2019-09-11 16:20:53', NULL),
(176, 'Tunisia', 'تـونس', '2019-09-11 16:23:33', '2019-09-11 16:23:33', NULL),
(177, 'Turkey', 'تركيا', '2019-09-11 16:24:05', '2019-09-11 16:24:05', NULL),
(178, 'Turkmenistan', 'تركمانستان', '2019-09-11 16:24:24', '2019-09-11 16:24:24', NULL),
(179, 'Tuvalu', 'توفالو', '2019-09-11 16:24:41', '2019-09-11 16:24:41', NULL),
(180, 'Uganda', 'اوغندا', '2019-09-11 16:25:04', '2019-09-11 16:25:04', NULL),
(181, 'Ukraine', 'اوكرانيا', '2019-09-11 16:25:26', '2019-09-11 16:25:26', NULL),
(182, 'United Arab Emirates', 'الامارات العربية المتحدة', '2019-09-11 16:25:51', '2019-09-11 16:25:51', NULL),
(183, 'United Kingdom', 'المملكة المتحدة', '2019-09-11 16:29:02', '2019-09-11 16:29:02', NULL),
(184, 'United States', 'الولايات المتحدة الامريكية', '2019-09-11 16:29:24', '2019-09-11 16:29:24', NULL),
(185, 'Uruguay', 'اورغواي', '2019-09-11 16:31:25', '2019-09-11 16:31:25', NULL),
(186, 'Uzbekistan', 'اوزباكستان', '2019-09-11 16:31:53', '2019-09-11 16:31:53', NULL),
(187, 'Vanuatu', 'فانواتو', '2019-09-11 16:32:09', '2019-09-11 19:06:30', '2019-09-11 19:06:30'),
(188, 'Vanuatu', 'فانواتو', '2019-09-11 16:33:00', '2019-09-11 16:33:00', NULL),
(189, 'Venezuela', 'فنزويلا', '2019-09-11 16:33:22', '2019-09-11 16:33:22', NULL),
(190, 'Vietnam', 'فيتنام', '2019-09-11 16:33:38', '2019-09-11 16:33:38', NULL),
(191, 'Yemen', 'اليمن', '2019-09-11 16:33:56', '2019-09-11 16:33:56', NULL),
(192, 'Zambia', 'زامبيا', '2019-09-11 16:34:19', '2019-09-11 16:34:19', NULL),
(193, 'Zimbabwe', 'زيمبابوى', '2019-09-11 16:34:30', '2019-09-11 16:34:30', NULL),
(194, 'Afghanistan', 'صص', '2020-04-08 15:52:05', '2020-04-08 15:52:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districtes`
--

CREATE TABLE `districtes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districtes`
--

INSERT INTO `districtes` (`id`, `name_ar`, `name_en`, `city_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(16, 'المعادي', 'Maadi', 15, NULL, '2019-09-11 18:21:49', '2019-09-11 18:21:49'),
(17, 'التجمع الخامس', 'The 5th Settlement', 15, NULL, '2019-10-19 19:56:16', '2019-10-19 19:56:16'),
(18, 'الدقي', 'Dokki', 26, NULL, '2019-10-20 16:38:14', '2019-11-06 19:37:35'),
(19, 'مدينة نصر', 'Nasr City', 15, NULL, '2019-10-20 16:40:08', '2019-11-06 19:37:13'),
(20, 'مدينة السادس من اكتوبر', '6th of October City', 26, NULL, '2019-10-20 18:07:58', '2019-10-20 18:07:58'),
(21, 'مدينة الشيخ زايد', 'El- Sheikh Zayed', 26, NULL, '2019-10-20 18:09:30', '2019-10-20 18:09:30'),
(22, 'المهندسين', 'Mohandseen', 26, NULL, '2019-11-03 19:27:49', '2019-11-03 19:27:49'),
(23, 'هليوبوليس', 'Heliopolis', 15, NULL, '2019-11-03 19:51:47', '2019-11-03 19:51:47');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_users`
--

CREATE TABLE `follow_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `following_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follow_users`
--

INSERT INTO `follow_users` (`id`, `follower_id`, `following_id`, `created_at`, `updated_at`) VALUES
(22, 24, 4, '2019-11-27 15:00:59', '2019-11-27 15:00:59'),
(24, 4, 21, '2019-12-30 15:21:39', '2019-12-30 15:21:39'),
(25, 9, 21, '2019-12-30 15:30:03', '2019-12-30 15:30:03'),
(26, 9, 4, '2019-12-30 15:33:24', '2019-12-30 15:33:24'),
(30, 25, 21, '2019-12-30 15:45:34', '2019-12-30 15:45:34'),
(31, 4, 9, '2019-12-30 16:03:08', '2019-12-30 16:03:08'),
(33, 4, 7, '2020-01-04 02:22:28', '2020-01-04 02:22:28'),
(34, 32, 4, '2020-04-29 11:11:51', '2020-04-29 11:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `forget_passwords`
--

CREATE TABLE `forget_passwords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forget_passwords`
--

INSERT INTO `forget_passwords` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 4, 'e02d66467eaafbcb3bb048b01492d2395e9f1b58', '2019-11-04 16:33:55', '2019-11-04 16:33:55'),
(2, 9, '9760546347166e2ee91c5d557ffd9778472c1882', '2019-12-30 14:04:04', '2019-12-30 14:04:04'),
(3, 14, 'ab7754f19972aacb518a6b89d450cddf9c90edec', '2019-12-30 14:17:36', '2019-12-30 14:17:36'),
(4, 25, '2563c8d3a1672d8e907452261333ff15f4e7dd7d', '2019-12-30 14:43:13', '2019-12-30 14:43:13'),
(5, 7, 'd5194bf8e9aa794f0e49690ef825560f4da95527', '2020-01-08 13:28:52', '2020-01-08 13:28:52'),
(6, 12, 'eb13fdc6bbb6e353cf062fb412f4c64acecdf042', '2020-01-09 21:49:17', '2020-01-09 21:49:17'),
(7, 28, '9f5cfa86344ea1ba6a84f82b8326b73909042f04', '2020-04-02 23:14:46', '2020-04-02 23:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` text COLLATE utf8mb4_unicode_ci,
  `name_en` text COLLATE utf8mb4_unicode_ci,
  `idea_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`id`, `name_ar`, `name_en`, `idea_image`, `user_id`, `deleted_at`, `created_at`, `updated_at`, `active`, `reason`) VALUES
(27, 'إغلبي الفوضى في مطبخك', 'BEAT THE MESS', '15734212975dc880f1b0628.jpg', 4, NULL, '2019-11-11 04:28:17', '2019-11-11 04:32:09', 1, NULL),
(28, 'كلاسيك', 'Classic', '15734726875dc949afd8e7a.jpg', 4, NULL, '2019-11-11 18:44:47', '2019-11-11 18:44:47', 1, NULL),
(29, 'rr', 'rr', '15734786005dc960c89b5cc.jpg', 6, NULL, '2019-11-11 15:23:20', '2019-11-11 15:23:20', 1, NULL),
(30, 'fsdfsdfsdf', 'fsdfsd', '15736547305dcc10cab45c6.jpg', 4, NULL, '2019-11-13 16:18:50', '2019-11-13 16:18:50', 1, NULL),
(31, 'hdavsbhdasg', 'xsadvhasgd', '15736548735dcc1159ecaf4.jpg', 6, NULL, '2019-11-13 16:21:14', '2019-11-13 16:21:14', 1, NULL),
(32, 'test img in text editor', 'test img in text editor', '15781771835e11129f01459.jpg', 4, NULL, '2020-01-05 00:33:03', '2020-01-05 00:33:03', 0, NULL),
(33, 'تاريخ', 'sadsa', '15831371775e5cc199be3af.jpg', 4, NULL, '2020-03-02 10:19:37', '2020-03-02 10:19:37', 1, NULL),
(34, 'عربي', 'TEST idea', '15870336775e98364d37da4.jpg', 4, NULL, '2020-04-15 13:56:13', '2020-04-16 14:29:08', 1, NULL),
(37, 'Video', 'Video', '15876379035ea16e8f45afb.jpg', 4, NULL, '2020-04-23 12:31:43', '2020-04-23 12:31:43', 1, NULL),
(39, 'test', 'test', '15884352425ead992aee231.png', NULL, NULL, '2020-05-02 16:00:43', '2020-05-02 16:09:53', 1, 'basjdasd'),
(40, '<p>svdjvsahdjasdas</p>', '<p style=\"text-align: right; \">hbasdjbkhdasd<b>d Djsahbdjsahbdjas</b></p>', '15886685325eb1287464723.jpg', 14, NULL, '2020-05-05 08:49:04', '2020-05-05 09:26:10', 1, NULL),
(41, '<p>asdasdasdasd</p>', '<p>dsadasdasd</p>', '15887559125eb27dc83950e.jpg', 32, NULL, '2020-05-06 09:05:25', '2020-05-06 09:05:25', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `idea_categories`
--

CREATE TABLE `idea_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idea_categories`
--

INSERT INTO `idea_categories` (`id`, `idea_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 33, 17, NULL, NULL),
(2, 34, 5, NULL, NULL),
(3, 35, 12, NULL, NULL),
(4, 35, 5, NULL, NULL),
(5, 34, 8, NULL, NULL),
(6, 34, 9, NULL, NULL),
(7, 34, 10, NULL, NULL),
(8, 34, 11, NULL, NULL),
(9, 34, 12, NULL, NULL),
(10, 34, 13, NULL, NULL),
(11, 34, 14, NULL, NULL),
(12, 34, 15, NULL, NULL),
(13, 36, 5, NULL, NULL),
(14, 36, 8, NULL, NULL),
(15, 36, 9, NULL, NULL),
(16, 37, 5, NULL, NULL),
(17, 37, 8, NULL, NULL),
(18, 38, 44, NULL, NULL),
(21, 39, 43, NULL, NULL),
(22, 40, 9, NULL, NULL),
(23, 40, 11, NULL, NULL),
(24, 40, 14, NULL, NULL),
(25, 41, 8, NULL, NULL),
(26, 41, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `idea_comments`
--

CREATE TABLE `idea_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idea_comments`
--

INSERT INTO `idea_comments` (`id`, `idea_id`, `user_id`, `comment`, `image`, `created_at`, `updated_at`) VALUES
(22, 31, 4, 'comment', NULL, '2020-01-09 13:45:58', '2020-01-09 13:45:58'),
(23, 31, 4, 'comment', NULL, '2020-01-09 13:46:00', '2020-01-09 13:46:00'),
(24, 31, 4, 'comment', NULL, '2020-01-09 13:46:03', '2020-01-09 13:46:03'),
(26, 31, 4, 'comment', NULL, '2020-01-09 13:46:06', '2020-01-09 13:46:06'),
(27, 31, 4, 'comment', NULL, '2020-01-09 13:46:08', '2020-01-09 13:46:08'),
(28, 31, 4, 'comment', NULL, '2020-01-09 13:46:10', '2020-01-09 13:46:10'),
(30, 31, 4, 'comment', NULL, '2020-01-09 13:46:12', '2020-01-09 13:46:12'),
(32, 31, 4, 'comment', NULL, '2020-01-09 13:46:15', '2020-01-09 13:46:15'),
(34, 31, 4, 'comment', NULL, '2020-01-09 13:46:17', '2020-01-09 13:46:17'),
(36, 31, 4, 'comment', NULL, '2020-01-09 13:46:19', '2020-01-09 13:46:19'),
(37, 31, 4, 'comment', NULL, '2020-01-09 13:46:21', '2020-01-09 13:46:21'),
(39, 31, 4, 'comment', NULL, '2020-01-09 13:46:23', '2020-01-09 13:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `idea_comment_likes`
--

CREATE TABLE `idea_comment_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `idea_comment_replies`
--

CREATE TABLE `idea_comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `idea_reply_likes`
--

CREATE TABLE `idea_reply_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reply_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imageable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `imageable_type`, `imageable_id`, `path`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'App\\Comment', 7, '15881869185ea9cf2653f0b.jpg', 32, '2020-04-29 19:02:02', '2020-04-29 19:02:02'),
(2, 'App\\Comment', 8, '15881869235ea9cf2b76e43.jpg', 32, '2020-04-29 19:02:07', '2020-04-29 19:02:07'),
(3, 'App\\Comment', 9, '15881869285ea9cf3014275.jpg', 32, '2020-04-29 19:02:12', '2020-04-29 19:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `item_id`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(60, 16, 4, 'topic', '2019-12-30 15:17:02', '2019-12-30 15:17:02'),
(63, 16, 25, 'topic', '2019-12-30 15:43:33', '2019-12-30 15:43:33'),
(65, 20, 25, 'topic', '2019-12-30 15:43:59', '2019-12-30 15:43:59'),
(66, 20, 4, 'topic', '2019-12-30 15:45:20', '2019-12-30 15:45:20'),
(68, 20, 9, 'topic', '2019-12-31 13:47:18', '2019-12-31 13:47:18'),
(69, 16, 9, 'topic', '2019-12-31 13:47:25', '2019-12-31 13:47:25'),
(70, 23, 4, 'topic', '2020-01-04 00:56:18', '2020-01-04 00:56:18'),
(71, 28, 4, 'topic', '2020-01-04 01:59:11', '2020-01-04 01:59:11'),
(72, 30, 7, 'topic', '2020-01-04 02:18:31', '2020-01-04 02:18:31'),
(73, 26, 7, 'topic', '2020-01-04 02:19:37', '2020-01-04 02:19:37'),
(74, 31, 4, 'idea', '2020-01-09 13:41:11', '2020-01-09 13:41:11'),
(76, 109, 4, 'product', '2020-01-09 13:53:25', '2020-01-09 13:53:25'),
(83, 2, 32, 'comment', '2020-04-29 19:05:37', '2020-04-29 19:05:37'),
(85, 3, 32, 'comment', '2020-04-29 19:06:27', '2020-04-29 19:06:27'),
(87, 7, 32, 'comment', '2020-04-29 19:06:38', '2020-04-29 19:06:38'),
(88, 8, 32, 'comment', '2020-04-29 19:06:41', '2020-04-29 19:06:41'),
(90, 4, 32, 'reply', '2020-04-29 19:09:57', '2020-04-29 19:09:57'),
(92, 16, 32, 'showroom_review', '2020-04-29 19:33:22', '2020-04-29 19:33:22'),
(93, 12, 32, 'showroom_review', '2020-04-29 19:34:20', '2020-04-29 19:34:20'),
(96, 94, 32, 'product', '2020-05-04 09:21:36', '2020-05-04 09:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `malls`
--

CREATE TABLE `malls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `opening_hours` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `lat` text COLLATE utf8mb4_unicode_ci,
  `lng` text COLLATE utf8mb4_unicode_ci,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `malls`
--

INSERT INTO `malls` (`id`, `name`, `about`, `image`, `cover`, `created_at`, `updated_at`, `opening_hours`, `facebook`, `twitter`, `instagram`, `location`, `lat`, `lng`, `active`) VALUES
(1, 'malls', '5 Ghenia st.\r\nEl-Montaza\r\nHeliopolis\r\nCairo Governorate, Egyp5 Ghenia st.\r\nEl-Montaza\r\nHeliopolis\r\nCairo Governorate, Egyp', '1579079021image5e1ed56d1f8e9.jpg', '1579079021image5e1ed56d61c5e.jpg', '2020-01-15 11:03:41', '2020-01-15 11:03:41', '<p><br></p>', 'Zcxvsdvzvsds', 'xcvzxbxsv', 'vsvxvsdgs', '5 Ghenia st. El-Montaza Heliopolis Cairo Governorate, Egyp', '30.100399200000002', '31.321682000000003', 1),
(2, 'Baron Mall', 'Dear guests, welcome to Baron Mall - Furniture & Beyond, your one-stop mega shop for furniture, house accessories and much more. Since we opened our doors in 2010 we have helped thousands of our customers find what they are looking for by offering them a unique mix of retail options catering to their diverse furnishing needs and tastes. By bringing together the top local national and international brands under one roof, our aim has always been to perfect the marriage between convenience and quality choice.\r\n\r\n1- Oriental Weavers\r\n2- Mostafa El Sallab\r\n3- Mazloum home\r\n4- Asfour Crystal\r\n5- French home furniture\r\n6- American Mattress\r\n7- Divano\r\n8- Bella casa\r\n9- Extreme Royal Design\r\n10- Premier home\r\n11- Zahran tefal\r\n12- Zahran furniture\r\n13- Retro\r\n14- Kilim\r\n15- Price rite\r\n16- Harmony\r\n17- Cote maison\r\n18- First marble\r\n19- Home plus\r\n20- Badry\r\n21- Samsung\r\n22- Artynova kitchens & interiors\r\n23- Living mix\r\n24- ERA culture design\r\n22- Cilantro\r\n\r\nAs an easily accessible shopping destination, with more than ample parking, Baron Mall has saved our customers countless hours in our city\'s busy traffic and has provided a distinguished, family-orientated and relaxed shopping experience.\r\n\r\nSo whether you are here today searching for furniture, floor coverings, lighting, curtains or accessories for your home, you will find it all here. You will also be able to enjoy a coffee break or a snack at Baron Mall\'s very own Cilantro, or entertain your children at the kid\'s play area. Please refer to our map to guide you through your shopping and leisure experience and in keeping with our family-orientated nature we ask you kindly to please adhere to our courteously policy below during your visit. Have a wonderful day!\r\n\r\nBaron City - Ring Road after Sama Tower, Kattameya, Cairo, Egypt.\r\nTel: + 202 29827264 - 29827273\r\nFax: + 202 22672248\r\nEmail: info@BaronMall.com\r\nWebsite: www.BaronMall.com\r\nHotline: 16354', '1579079418image5e1ed6fa69a6e.jpg', '1579079418image5e1ed6fa843ed.jpg', '2020-01-15 11:10:18', '2020-01-15 11:10:18', '<p>Saturday - Friday : From 10 AM - 12 AM</p>', 'https://www.facebook.com/BaronMall/', NULL, NULL, 'Baron City - Ring Road, after Sama Tower,Kattameya, Cairo, Egypt. (191.90 km) Cairo, Egypt', '29.9828734', '31.3397992', 1),
(3, 'malls1', '5 Ghenia st.\r\nEl-Montaza\r\nHeliopolis\r\nCairo Governorate, Egyp5 Ghenia st.\r\nEl-Montaza\r\nHeliopolis\r\nCairo Governorate, Egyp', '1579079583image5e1ed79f7431d.jpg', '1579079583image5e1ed79f967bc.jpg', '2020-01-15 11:13:03', '2020-01-15 11:13:03', NULL, NULL, NULL, NULL, NULL, '30.00191260000001', '31.1816318', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mall_showrooms`
--

CREATE TABLE `mall_showrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mall_id` bigint(20) UNSIGNED NOT NULL,
  `showroom_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mall_showrooms`
--

INSERT INTO `mall_showrooms` (`id`, `mall_id`, `showroom_id`, `created_at`, `updated_at`) VALUES
(1, 1, 49, NULL, NULL),
(2, 1, 50, NULL, NULL),
(3, 2, 50, NULL, NULL),
(4, 1, 48, NULL, NULL),
(5, 2, 48, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name_en`, `name_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Wood', 'خشب', '2019-09-17 15:44:25', '2019-11-06 19:49:06', NULL),
(5, 'NA', 'Na', '2019-10-19 20:06:43', '2019-10-19 20:06:43', NULL),
(6, 'Wool', 'صوف', '2019-11-03 21:59:39', '2019-11-03 22:00:58', '2019-11-03 22:00:58'),
(7, 'Polypropylene', 'البولي بروبلين', '2019-11-03 22:00:26', '2019-11-03 22:00:55', '2019-11-03 22:00:55'),
(8, 'Beech Wood', 'خشب زان', '2019-11-05 21:12:51', '2019-11-06 19:48:42', NULL),
(9, 'Oak Veneer', 'قشرة ارو', '2019-11-05 21:14:41', '2019-11-06 19:48:27', NULL),
(10, 'Aphrodite Johnson', 'Ryan Dickerson', '2020-04-08 15:51:19', '2020-04-08 15:51:19', NULL),
(11, '222', 'ش', '2020-04-08 15:51:29', '2020-04-08 15:51:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message_images`
--

CREATE TABLE `message_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_images`
--

INSERT INTO `message_images` (`id`, `image`, `msg_id`, `created_at`, `updated_at`) VALUES
(22, '1573031670image5dc28ef66a1d4.jpg', 56, '2019-11-06 16:14:30', '2019-11-06 16:14:30'),
(23, '1573033225image5dc295092bcc1.jpg', 57, '2019-11-06 16:40:25', '2019-11-06 16:40:25'),
(24, '1579094573image5e1f122d78f1a.jpg', 62, '2020-01-15 15:22:53', '2020-01-15 15:22:53'),
(25, '1579094625image5e1f126179ab8.jpg', 63, '2020-01-15 15:23:45', '2020-01-15 15:23:45'),
(26, '1588588297image5eafef092548b.jpg', 67, '2020-05-04 10:31:56', '2020-05-04 10:31:56'),
(27, '1588588365image5eafef4d460d9.jpg', 68, '2020-05-04 10:32:49', '2020-05-04 10:32:49'),
(28, '1588592804image5eb000a4d361f.jpg', 76, '2020-05-04 11:46:56', '2020-05-04 11:46:56'),
(29, '1588600454image5eb01e864d3b7.jpg', 82, '2020-05-04 13:54:15', '2020-05-04 13:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_07_07_103230_create_showroom_table', 1),
(3, '2019_07_07_111153_create_categories_table', 1),
(4, '2019_07_07_111208_create_styles_table', 1),
(5, '2019_07_07_112758_create_cities_table', 1),
(6, '2019_07_07_112816_create_districtes_table', 1),
(7, '2019_07_07_152030_create_branches_table', 1),
(8, '2019_07_07_152350_create_showrooms_followers_table', 1),
(9, '2019_07_08_094250_create_add_style_id_table', 1),
(10, '2019_07_09_121322_create_colors_table', 1),
(11, '2019_07_09_121335_create_materials_table', 1),
(12, '2019_07_09_123240_create_products_table', 1),
(13, '2019_07_09_133032_create_product_categories_table', 1),
(14, '2019_07_09_133257_create_product_images_table', 1),
(15, '2019_07_09_142112_create_showroom_messages_table', 1),
(16, '2019_07_11_083623_create_topics_table', 1),
(17, '2019_07_11_084028_create_topic_images_table', 1),
(18, '2019_07_11_084041_create_topic_categories_table', 1),
(19, '2019_07_11_095556_add_soft_deletes_to_topics', 1),
(20, '2019_07_11_101802_add_user_id_to_topics_table', 1),
(21, '2019_07_21_122757_create_add_sub_to_message', 1),
(22, '2019_07_28_143411_create_message_images_table', 1),
(23, '2019_07_29_104816_create_ideas_table', 1),
(24, '2019_07_29_113458_create_add_category_ideas_table', 1),
(25, '2019_07_29_121403_create_add_active_ideas_table', 1),
(26, '2019_07_30_083724_edit-in-topics-table', 1),
(27, '2019_07_30_114933_create_follow_users_table', 1),
(28, '2019_07_30_142528_create_product_branches_table', 1),
(29, '2019_07_31_093208_create_countries_table', 1),
(30, '2019_07_31_094140_add_country_field_to_products', 1),
(31, '2019_07_31_095114_create_upholsteries_table', 1),
(32, '2019_07_31_095413_edit_in_product_table', 1),
(33, '2019_07_31_112954_edit_in_products_table', 1),
(34, '2019_08_08_120502_add_rate_to_products_table', 1),
(35, '2019_08_14_095003_add-reasons-to-products', 1),
(36, '2019_08_14_133326_make-user-id-in-topics-nullable', 1),
(37, '2019_08_15_111110_add-code-to-colors-table', 1),
(38, '2019_08_19_102150_create-admin-tables', 1),
(39, '2019_08_19_150249_create-permission-table', 1),
(40, '2019_08_20_095339_edit-in-users-table', 1),
(41, '2019_08_20_122211_edit-in-ideas-table', 1),
(42, '2019_08_21_112750_add-softdeletes-to-material', 1),
(43, '2019_08_21_115512_add-soft-deletes-to-upholsteries-table', 1),
(44, '2019_08_21_132436_add-soft-deletes-to-colors', 1),
(45, '2019_08_21_135949_add-soft-deletes-to-countries', 1),
(46, '2019_08_26_101517_edit-in-user', 1),
(47, '2019_08_26_132103_add-cover-image-to-user', 1),
(48, '2019_08_26_142949_create_boards_table', 1),
(49, '2019_09_01_132208_create_activities_table', 1),
(50, '2019_09_04_102013_drop-telephone-coloumns', 1),
(51, '2019_09_08_085723_create_saved_items_table', 1),
(52, '2019_09_08_134414_edit-descriptions-in-ideas', 1),
(53, '2019_09_10_121545_create-topic-comments-table', 1),
(54, '2019_09_10_130710_create-topic-comments-likes-table', 1),
(55, '2019_09_10_130948_create-topic-comment-replies-table', 1),
(56, '2019_09_10_131107_create-topic-replies-likes-table', 1),
(57, '2019_09_10_141735_create_compare_products_table', 1),
(58, '2019_09_12_102417_create-product-comments-table', 1),
(59, '2019_09_12_102839_create-product-comment-likes-table', 1),
(60, '2019_09_12_103252_create-product-comment-replies-table', 1),
(61, '2019_09_12_103401_create-product-reply-likes-table', 1),
(62, '2019_09_12_145109_create_add_user_id_table', 1),
(63, '2019_09_15_091313_create-drop-user-id-insaved-items', 1),
(64, '2019_09_15_104303_create_user_updates_table', 1),
(65, '2019_09_16_110133_create-idea-comments-table', 1),
(66, '2019_09_16_110512_create-idea-comment-likes-table', 1),
(67, '2019_09_16_110657_create-idea-comment-replies-table', 1),
(68, '2019_09_16_110834_create-idea-reply-likes-table', 1),
(69, '2019_09_18_125325_create_showroom_reviews_table', 1),
(70, '2019_09_18_160856_create_offers_table', 1),
(71, '2019_09_19_090611_create-backgrounds-table', 1),
(72, '2019_10_03_130454_add-reasons-idea-table', 1),
(73, '2019_10_03_142705_edit-in-showrooms-table', 1),
(74, '2019_10_08_101255_create_notifications_table', 1),
(75, '2019_10_10_083708_create-product-reviews-table', 1),
(76, '2019_10_14_094726_add_reply_showroom_messages_table', 1),
(77, '2019_10_14_130348_add_read_showroom_messages_table', 1),
(78, '2019_10_15_122046_edit-in-showrooms-table', 1),
(79, '2019_10_15_145917_create-branches-info-table', 1),
(80, '2019_10_20_142324_change_product_mandatory_null_table', 1),
(81, '2019_10_21_105804_add_hidden_coloumn_user_table', 1),
(82, '2019_10_23_093036_add_category_to_shworoom_table', 1),
(83, '2019_10_23_110242_add_coloumn_to_user_registeration_table', 1),
(84, '2019_10_23_141229_date_of_birth_user_table', 1),
(85, '2019_10_23_155405_fix-districts-in-users-table', 1),
(86, '2019_10_23_171941_edit-in-products-price', 1),
(87, '2019_10_24_144151_add_approve_table', 1),
(88, '2019_10_25_214412_create-shares-table', 1),
(89, '2019_10_25_231748_create-likes-table', 1),
(90, '2019_10_28_144802_add_showrrom_id_updates_table', 1),
(91, '2019_10_28_145712_chanhe_showroom', 1),
(92, '2019_10_29_125944_add_nullable', 1),
(93, '2019_10_29_163533_add_co_showroom', 1),
(94, '2019_10_29_172611_edit-images-in-users-table', 1),
(95, '2019_10_29_173754_change-images-users-table', 1),
(96, '2019_10_30_090541_add_image_to_category', 1),
(97, '2019_11_03_143046_create_forget_passwords_table', 1),
(98, '2019_11_04_083441_add_offer_id', 1),
(99, '2019_11_28_142300_add-country-to-cities-table', 2),
(100, '2019_11_28_142825_add-city-to-users-table', 2),
(101, '2019_12_01_170520_add-locations-to-branches', 2),
(102, '2019_12_02_131916_create-showroom-categories-table', 2),
(103, '2019_12_02_132716_create-showroom-styles-table', 0),
(104, '2019_12_02_133604_drop-style-category-coloumns', 3),
(105, '2019_12_04_130119_change-locations-in-branches', 3),
(106, '2019_12_11_200457_add_title_to_branches', 3),
(107, '2019_12_11_202303_add_follow_to_showroom_messages', 3),
(108, '2019_12_16_224110_add_block_to_showroom_messages', 3),
(109, '2019_12_25_203202_remove_cat_id_from_ideas', 4),
(110, '2019_12_25_200940_create_idea_categories_table', 4),
(111, '2019_12_25_015248_create_showroom_review_likes_table', 0),
(112, '2020_01_13_133431_create-malls-table', 5),
(113, '2020_01_13_135401_create-mall-showrooms-table', 5),
(114, '2020_01_14_113150_edit-in-malls-table', 5),
(115, '2020_01_14_124347_add-lat-lng-to-malls-table', 5),
(116, '2020_01_16_121412_add_offer_id_to_saved_items', 6),
(117, '2020_01_10_102239_create_comments_table', 7),
(118, '2020_01_10_214004_create_images_table', 7),
(119, '2020_01_12_212630_create_replies_table', 7),
(120, '2020_01_21_105442_add-deactivate-to-malls-table', 7),
(121, '2020_01_21_225754_remove_follow_from_showroom_messages', 7),
(122, '2020_01_21_231117_create_chat_follows_table', 7),
(123, '2020_01_25_065823_create_chat_blocks_table', 7),
(124, '2020_01_25_071141_remove_block_from_showroom_messages', 7),
(125, '2020_01_25_162533_edit-in-topics-comments-table', 7),
(126, '2020_01_27_101919_attach_country_to_cities_table', 8),
(127, '2020_03_31_212015_add_slug_to_categories', 9),
(128, '2020_04_01_004635_add_slug_for_showrooms_table', 9),
(129, '2020_04_01_140313_create_consultant_table', 9),
(130, '2020_03_29_105913_add_paragraphs_table', 10),
(131, '2020_04_19_111142_edit_description_in_paragraphs_table', 11),
(132, '2020_04_19_114236_add_youtube_link_to_paragraphs_table', 11),
(133, '2020_04_29_192155_add_contact_name_to_showrooms_table', 12),
(134, '2020_05_03_115041_drop_notifications_table', 13),
(135, '2020_05_03_115414_create_notifications_table', 14),
(136, '2020_05_05_102613_edit_in_names_idea_table', 15),
(137, '2020_05_04_131923_create_jobs_table', 16),
(138, '2020_05_04_132607_create_failed_jobs_table', 17),
(139, '2020_05_15_125000_edit_all_tables_engine', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Admin', 2),
(1, 'App\\Admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('04234823-5408-4d45-b012-9fe381586aca', 'App\\Notifications\\SendNotification', 'App\\User', 48, '{\"assigned_user\":48,\"message\":\"showroom2 add new  branch \",\"type\":\"App\\\\Branch\",\"type_id\":112,\"url\":\"http:\\/\\/localhost:8000\\/showroom\\/showroom2\"}', NULL, '2020-05-05 10:15:39', '2020-05-05 10:15:39'),
('0e9d94d2-424e-45d8-aa7c-71e1a983bed5', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"basel Send You a Message in Darac\",\"type\":\"App\\\\Showroom\",\"type_id\":4,\"url\":\"http:\\/\\/localhost:8000\\/dashboard\\/4\\/chat\"}', NULL, '2020-05-04 11:46:56', '2020-05-04 11:46:56'),
('11136261-b9de-464f-9588-87f8e65d4d77', 'App\\Notifications\\SendNotification', 'App\\Admin', 3, '{\"assigned_user\":3,\"message\":\"New Product Added\",\"type\":\"App\\\\Product\",\"type_id\":125,\"url\":\"http:\\/\\/localhost:8000\\/admin\\/products\\/125\"}', NULL, '2020-05-04 13:16:12', '2020-05-04 13:16:12'),
('152df311-6572-4d6f-8ee1-20f69ed7d311', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"basel Send You a Message in Darac\",\"type\":\"App\\\\Showroom\",\"type_id\":4,\"url\":\"http:\\/\\/localhost:8000\\/dashboard\\/4\\/chat\"}', NULL, '2020-05-04 11:30:38', '2020-05-04 11:30:38'),
('199a0c0f-766d-42f8-b42b-991915edb32e', 'App\\Notifications\\SendNotification', 'App\\User', 32, '{\"assigned_user\":32,\"message\":\"Yalla Send You a Message in showroom2\",\"type\":\"App\\\\Showroom\",\"type_id\":52,\"url\":\"http:\\/\\/localhost:8000\\/dashboard\\/52\\/chat\"}', NULL, '2020-05-04 10:32:49', '2020-05-04 10:32:49'),
('19f3f488-a39c-439d-98ad-9dc2dffded1e', 'App\\Notifications\\SendNotification', 'App\\User', 32, '{\"assigned_user\":32,\"message\":\"Admin Approve Your Product : eweqwdqw\",\"type\":\"App\\\\Product\",\"type_id\":126,\"url\":\"http:\\/\\/localhost:8000\\/product\\/126\"}', NULL, '2020-05-04 13:24:28', '2020-05-04 13:24:28'),
('33d70895-cdbe-460f-86ec-98eedb23d540', 'App\\Notifications\\SendNotification', 'App\\User', 48, '{\"assigned_user\":48,\"message\":\"showroom2 add new  branch \",\"type\":\"App\\\\Branch\",\"type_id\":115,\"url\":\"http:\\/\\/localhost:8000\\/showroom\\/showroom2\"}', NULL, '2020-05-05 10:18:35', '2020-05-05 10:18:35'),
('383fa050-59b6-4350-b870-621d4009b5e3', 'App\\Notifications\\SendNotification', 'App\\User', 48, '{\"assigned_user\":48,\"message\":\"showroom2 add new  branch \",\"type\":\"App\\\\Branch\",\"type_id\":114,\"url\":\"http:\\/\\/localhost:8000\\/showroom\\/showroom2\"}', NULL, '2020-05-05 10:17:25', '2020-05-05 10:17:25'),
('3c55e060-4dfc-4344-abf5-c66a02f120fa', 'App\\Notifications\\SendNotification', 'App\\User', 32, '{\"assigned_user\":32,\"message\":\"Admin Approve Your Product : eweqwdqw\",\"type\":\"App\\\\Product\",\"type_id\":126,\"url\":\"http:\\/\\/localhost:8000\\/product\\/126\"}', NULL, '2020-05-04 13:24:47', '2020-05-04 13:24:47'),
('49807a45-7187-4f94-9726-63130f979a4c', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"basel Replied On G50203a2540338RE_1\",\"type\":\"App\\\\Product\",\"type_id\":94,\"url\":\"http:\\/\\/localhost:8000\\/product\\/94\"}', NULL, '2020-05-04 10:14:14', '2020-05-04 10:14:14'),
('4b809cc5-2288-4255-a26b-d3cef56c7e8e', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"basel Send You a Message in Darac\",\"type\":\"App\\\\Showroom\",\"type_id\":4,\"url\":\"http:\\/\\/localhost:8000\\/dashboard\\/4\\/chat\"}', NULL, '2020-05-04 11:30:56', '2020-05-04 11:30:56'),
('4de4894a-cf87-4fdd-ae6f-930f1c71606c', 'App\\Notifications\\SendNotification', 'App\\Admin', 4, '{\"assigned_user\":4,\"message\":\"New Product Added\",\"type\":\"App\\\\Product\",\"type_id\":126,\"url\":\"http:\\/\\/localhost:8000\\/admin\\/products\\/126\"}', NULL, '2020-05-04 13:24:04', '2020-05-04 13:24:04'),
('50bb3a33-706c-45e8-82ff-5ed5c422a546', 'App\\Notifications\\SendNotification', 'App\\User', 32, '{\"assigned_user\":32,\"message\":\"Admin Dismiss Your Product : poklsandk with Reason : bad images\",\"type\":\"App\\\\Product\",\"type_id\":123,\"url\":\"http:\\/\\/localhost:8000\\/product\\/123\"}', NULL, '2020-05-04 08:16:47', '2020-05-04 08:16:47'),
('54818d5b-f48a-4b93-8eff-e14ed5d2bf6a', 'App\\Notifications\\SendNotification', 'App\\User', 48, '{\"assigned_user\":48,\"message\":\"showroom2 add new  branch \",\"type\":\"App\\\\Branch\",\"type_id\":113,\"url\":\"http:\\/\\/localhost:8000\\/showroom\\/showroom2\"}', NULL, '2020-05-05 10:15:39', '2020-05-05 10:15:39'),
('5708cdfa-36e6-4745-996a-56a690467312', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"basel Send You a Message in Darac\",\"type\":\"App\\\\Showroom\",\"type_id\":4,\"url\":\"http:\\/\\/localhost:8000\\/dashboard\\/4\\/chat\"}', NULL, '2020-05-04 13:53:12', '2020-05-04 13:53:12'),
('5e996d68-c8d5-4b95-abe7-226af26e03c5', 'App\\Notifications\\SendNotification', 'App\\User', 32, '{\"assigned_user\":32,\"message\":\"Darac Send You a Message.\",\"type\":\"App\\\\Showroom\",\"type_id\":4,\"url\":\"http:\\/\\/localhost:8000\\/user\\/messages?showroom_id=4\"}', NULL, '2020-05-04 13:54:15', '2020-05-04 13:54:15'),
('6f8170df-ffc5-40ec-b852-c69903c5e4b3', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"basel Send You a Message in Darac\",\"type\":\"App\\\\Showroom\",\"type_id\":4,\"url\":\"http:\\/\\/localhost:8000\\/dashboard\\/4\\/chat\"}', NULL, '2020-05-04 11:25:37', '2020-05-04 11:25:37'),
('7d2edd2b-a5dc-454f-a0d9-a94d14529581', 'App\\Notifications\\SendNotification', 'App\\User', 32, '{\"assigned_user\":32,\"message\":\"Admin Approve Your Product : dasasf\",\"type\":\"App\\\\Product\",\"type_id\":125,\"url\":\"http:\\/\\/localhost:8000\\/product\\/125\"}', NULL, '2020-05-04 13:17:07', '2020-05-04 13:17:07'),
('824dfd7f-cbe2-4eb1-a26c-e8817385e223', 'App\\Notifications\\SendNotification', 'App\\User', 48, '{\"assigned_user\":48,\"message\":\"showroom2 add Offer : test related5\",\"type\":\"App\\\\Product\",\"type_id\":116,\"url\":\"http:\\/\\/localhost:8000\\/offer\\/116\"}', NULL, '2020-05-04 13:42:33', '2020-05-04 13:42:33'),
('85e700e0-3e79-428c-ac5e-b5a19899e233', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"basel Commented on G50203a2540338RE_1\",\"type\":\"App\\\\product\",\"type_id\":94,\"url\":\"http:\\/\\/localhost:8000\\/product\\/94\"}', NULL, '2020-05-04 09:34:44', '2020-05-04 09:34:44'),
('86eb2290-2d34-44a7-a4f3-35602a780f42', 'App\\Notifications\\SendNotification', 'App\\Admin', 4, '{\"assigned_user\":4,\"message\":\"New Product Added\",\"type\":\"App\\\\Product\",\"type_id\":123,\"url\":\"http:\\/\\/localhost:8000\\/admin\\/products\\/123\"}', NULL, '2020-05-03 10:50:13', '2020-05-03 10:50:13'),
('88e40759-ccf1-4eae-b9ca-6a84b8556077', 'App\\Notifications\\SendNotification', 'App\\User', 48, '{\"assigned_user\":48,\"message\":\"showroom2 add Offer : eweqwdqw\",\"type\":\"App\\\\Product\",\"type_id\":126,\"url\":\"http:\\/\\/localhost:8000\\/offer\\/126\"}', NULL, '2020-05-04 13:37:31', '2020-05-04 13:37:31'),
('899527e5-ab17-4c2f-8ec9-cfdcc5b94a94', 'App\\Notifications\\SendNotification', 'App\\Admin', 3, '{\"assigned_user\":3,\"message\":\"New Product Added\",\"type\":\"App\\\\Product\",\"type_id\":123,\"url\":\"http:\\/\\/localhost:8000\\/admin\\/products\\/123\"}', NULL, '2020-05-03 10:50:13', '2020-05-03 10:50:13'),
('8b2e3f40-e166-4fc0-b033-6ffd2489a76a', 'App\\Notifications\\SendNotification', 'App\\Admin', 2, '{\"assigned_user\":2,\"message\":\"New Showroom Added\",\"type\":\"App\\\\Showroom\",\"type_id\":55,\"url\":\"http:\\/\\/localhost:8000\\/admin\\/showrooms_details\\/55\"}', '2020-05-05 09:53:57', '2020-05-03 11:40:44', '2020-05-05 09:53:57'),
('8bd3d023-27bc-4f2b-b4b5-7a13ad8f95be', 'App\\Notifications\\SendNotification', 'App\\User', 32, '{\"assigned_user\":32,\"message\":\"Admin Dismiss Your Showroom : showroom2 with Reason : test\",\"type\":\"App\\\\Showroom\",\"type_id\":52,\"url\":\"http:\\/\\/localhost:8000\\/showroom\\/showroom2\"}', NULL, '2020-05-04 08:25:06', '2020-05-04 08:25:06'),
('96556990-ed29-4119-899c-285d0aeabfb5', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"Darac Send You a Message.\",\"type\":\"App\\\\Showroom\",\"type_id\":4,\"url\":\"http:\\/\\/localhost:8000\\/user\\/messages?showroom_id=4\"}', NULL, '2020-05-04 12:07:03', '2020-05-04 12:07:03'),
('9f2d11b3-6e85-45ce-b66f-d6e3b3c2ef63', 'App\\Notifications\\SendNotification', 'App\\User', 48, '{\"assigned_user\":48,\"message\":\"showroom2 add new  branch \",\"type\":\"App\\\\Branch\",\"type_id\":111,\"url\":\"http:\\/\\/localhost:8000\\/showroom\\/showroom2\"}', NULL, '2020-05-05 10:10:48', '2020-05-05 10:10:48'),
('a08098cb-7ca5-46c9-a23e-a54d906a0ed2', 'App\\Notifications\\SendNotification', 'App\\User', 32, '{\"assigned_user\":32,\"message\":\"Admin Approve Your Showroom : showroom2\",\"type\":\"App\\\\Showroom\",\"type_id\":52,\"url\":\"http:\\/\\/localhost:8000\\/showroom\\/showroom2\"}', NULL, '2020-05-04 08:32:58', '2020-05-04 08:32:58'),
('aa3b8af9-8dd3-48e3-a427-c7dd1fb4825a', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"basel Send You a Message in Darac\",\"type\":\"App\\\\Showroom\",\"type_id\":4,\"url\":\"http:\\/\\/localhost:8000\\/dashboard\\/4\\/chat\"}', NULL, '2020-05-04 11:31:00', '2020-05-04 11:31:00'),
('acb23212-1ab7-4eb7-9c75-ef5f5aff7543', 'App\\Notifications\\SendNotification', 'App\\Admin', 4, '{\"assigned_user\":4,\"message\":\"New Showroom Added\",\"type\":\"App\\\\Showroom\",\"type_id\":55,\"url\":\"http:\\/\\/localhost:8000\\/admin\\/showrooms_details\\/55\"}', NULL, '2020-05-03 11:40:44', '2020-05-03 11:40:44'),
('adf8a5f8-7910-45c9-8ffd-36f2199c3878', 'App\\Notifications\\SendNotification', 'App\\User', 48, '{\"assigned_user\":48,\"message\":\"showroom2 add new  branch \",\"type\":\"App\\\\Branch\",\"type_id\":109,\"url\":\"http:\\/\\/localhost:8000\\/showroom\\/showroom2\"}', NULL, '2020-05-05 10:05:52', '2020-05-05 10:05:52'),
('b36fbf75-9750-439d-b754-ed44617fb6a9', 'App\\Notifications\\SendNotification', 'App\\User', 32, '{\"assigned_user\":32,\"message\":\"Darac Send You a Message.\",\"type\":\"App\\\\Showroom\",\"type_id\":4,\"url\":\"http:\\/\\/localhost:8000\\/user\\/messages?showroom_id=4\"}', NULL, '2020-05-04 12:12:04', '2020-05-04 12:12:04'),
('b3b6cec1-f841-4f1d-965c-ce08116cf9c1', 'App\\Notifications\\SendNotification', 'App\\Admin', 3, '{\"assigned_user\":3,\"message\":\"New Showroom Added\",\"type\":\"App\\\\Showroom\",\"type_id\":55,\"url\":\"http:\\/\\/localhost:8000\\/admin\\/showrooms_details\\/55\"}', NULL, '2020-05-03 11:40:44', '2020-05-03 11:40:44'),
('b9425a1f-86f8-4998-9852-488ee7b3f340', 'App\\Notifications\\SendNotification', 'App\\Admin', 2, '{\"assigned_user\":2,\"message\":\"New Product Added\",\"type\":\"App\\\\Product\",\"type_id\":123,\"url\":\"http:\\/\\/localhost:8000\\/admin\\/products\\/123\"}', '2020-05-05 09:53:52', '2020-05-03 10:50:13', '2020-05-05 09:53:52'),
('ba4d609e-73e0-410c-83a0-c36ff4180aef', 'App\\Notifications\\SendNotification', 'App\\User', 48, '{\"assigned_user\":48,\"message\":\"showroom2 add new  branch \",\"type\":\"App\\\\Branch\",\"type_id\":108,\"url\":\"http:\\/\\/localhost:8000\\/showroom\\/showroom2\"}', NULL, '2020-05-05 10:05:40', '2020-05-05 10:05:40'),
('beaf5260-b437-4fb5-89a2-60471b3e9045', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"basel Send You a Message in Darac\",\"type\":\"App\\\\Showroom\",\"type_id\":4,\"url\":\"http:\\/\\/localhost:8000\\/dashboard\\/4\\/chat\"}', NULL, '2020-05-04 11:27:28', '2020-05-04 11:27:28'),
('c28e48f2-84d3-48e2-bc8b-569a07bdb787', 'App\\Notifications\\SendNotification', 'App\\User', 48, '{\"assigned_user\":48,\"message\":\"showroom2 add new  branch \",\"type\":\"App\\\\Branch\",\"type_id\":110,\"url\":\"http:\\/\\/localhost:8000\\/showroom\\/showroom2\"}', NULL, '2020-05-05 10:10:48', '2020-05-05 10:10:48'),
('da1e79c8-d509-437c-9d26-ee1dfa780e16', 'App\\Notifications\\SendNotification', 'App\\Admin', 3, '{\"assigned_user\":3,\"message\":\"New Product Added\",\"type\":\"App\\\\Product\",\"type_id\":126,\"url\":\"http:\\/\\/localhost:8000\\/admin\\/products\\/126\"}', NULL, '2020-05-04 13:24:04', '2020-05-04 13:24:04'),
('dc333aaa-8e81-4338-ba92-db6299c76fb3', 'App\\Notifications\\SendNotification', 'App\\User', 48, '{\"assigned_user\":48,\"message\":\"<p>test<\\/p><p><br><\\/p>\",\"type\":\"App\\\\TopicComment\",\"type_id\":45,\"url\":\"http:\\/\\/localhost:8000\\/topic\\/32\"}', NULL, '2020-05-04 11:55:39', '2020-05-04 11:55:39'),
('ddefc9d2-3f64-41bd-a5cc-ca3e3e69f65b', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"basel Add 53 to compare List\",\"type\":\"App\\\\Product\",\"type_id\":117,\"url\":\"http:\\/\\/localhost:8000\\/product\\/117\"}', NULL, '2020-05-04 10:48:41', '2020-05-04 10:48:41'),
('e3fb32b0-fbec-48a2-a6dc-0062bb732f57', 'App\\Notifications\\SendNotification', 'App\\Admin', 2, '{\"assigned_user\":2,\"message\":\"New Product Added\",\"type\":\"App\\\\Product\",\"type_id\":125,\"url\":\"http:\\/\\/localhost:8000\\/admin\\/products\\/125\"}', '2020-05-05 09:53:47', '2020-05-04 13:16:12', '2020-05-05 09:53:47'),
('e5572ba5-e095-4a5f-bd97-4d1f0b56b018', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"basel Added LCC-D-05 To his\\/her Board\",\"type\":\"App\\\\Product\",\"type_id\":\"88\",\"url\":\"http:\\/\\/localhost:8000\\/product\\/88\"}', NULL, '2020-05-04 08:46:18', '2020-05-04 08:46:18'),
('e72efe6b-2945-4b24-b395-2f5b27f81c14', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"basel Send You a Message in Darac\",\"type\":\"App\\\\Showroom\",\"type_id\":4,\"url\":\"http:\\/\\/localhost:8000\\/dashboard\\/4\\/chat\"}', NULL, '2020-05-04 13:52:56', '2020-05-04 13:52:56'),
('ef2b9a65-a01e-431e-b957-845e669f297b', 'App\\Notifications\\SendNotification', 'App\\Admin', 4, '{\"assigned_user\":4,\"message\":\"New Product Added\",\"type\":\"App\\\\Product\",\"type_id\":125,\"url\":\"http:\\/\\/localhost:8000\\/admin\\/products\\/125\"}', NULL, '2020-05-04 13:16:12', '2020-05-04 13:16:12'),
('f18f5b5c-f917-4e32-9063-85e24c344e3f', 'App\\Notifications\\SendNotification', 'App\\User', 4, '{\"assigned_user\":4,\"message\":\"basel Liked G50203a2540338RE_1\",\"type\":\"App\\\\product\",\"type_id\":94,\"url\":\"http:\\/\\/localhost:8000\\/product\\/94\"}', NULL, '2020-05-04 09:21:36', '2020-05-04 09:21:36'),
('f3589ef2-4cbf-46a2-982f-0967e7928641', 'App\\Notifications\\SendNotification', 'App\\Admin', 2, '{\"assigned_user\":2,\"message\":\"New Product Added\",\"type\":\"App\\\\Product\",\"type_id\":126,\"url\":\"http:\\/\\/localhost:8000\\/admin\\/products\\/126\"}', '2020-05-05 09:47:20', '2020-05-04 13:24:04', '2020-05-05 09:47:20'),
('f58e3501-f693-4104-bfd7-eb8b5026eabe', 'App\\Notifications\\SendNotification', 'App\\User', 32, '{\"assigned_user\":32,\"message\":\"Admin Approve Your Product : eweqwdqw\",\"type\":\"App\\\\Product\",\"type_id\":126,\"url\":\"http:\\/\\/localhost:8000\\/product\\/126\"}', '2020-05-05 09:41:52', '2020-05-04 13:37:31', '2020-05-05 09:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `expire_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `product_id`, `discount`, `start_date`, `expire_date`, `created_at`, `updated_at`) VALUES
(1, 6, 25, '2019-10-21 04:00:00', '2019-12-21 17:00:00', '2019-10-21 19:08:46', '2019-10-31 17:52:14'),
(2, 8, 25, '2019-10-23 04:00:00', '2020-01-23 17:00:00', '2019-10-23 17:11:09', '2019-10-23 17:27:13'),
(3, 9, 17, '2019-10-28 04:00:00', '2020-01-28 17:00:00', '2019-10-28 18:29:30', '2019-10-28 18:29:30'),
(4, 7, 25, '2019-10-29 04:00:00', '2019-10-31 16:00:00', '2019-10-29 20:24:02', '2019-10-29 20:24:02'),
(5, 12, 50, '2019-10-30 04:00:00', '2019-12-26 17:00:00', '2019-10-30 17:14:29', '2019-10-30 17:14:29'),
(7, 25, 40, '2019-10-31 04:00:00', '2020-03-17 16:00:00', '2019-10-31 14:22:26', '2019-10-31 14:22:26'),
(8, 26, 20, '2019-10-31 04:00:00', '2020-03-12 16:00:00', '2019-10-31 15:19:17', '2019-10-31 15:19:17'),
(9, 27, 25, '2019-10-31 04:00:00', '2020-02-12 17:00:00', '2019-10-31 16:47:29', '2019-10-31 16:47:29'),
(10, 28, 15, '2019-10-31 04:00:00', '2020-01-07 17:00:00', '2019-10-31 16:58:05', '2019-10-31 16:58:05'),
(11, 29, 25, '2019-10-31 04:00:00', '2020-01-31 17:00:00', '2019-10-31 17:31:37', '2019-10-31 17:31:37'),
(12, 30, 25, '2019-10-31 04:00:00', '2020-01-07 17:00:00', '2019-10-31 17:32:07', '2019-10-31 17:32:07'),
(13, 31, 35, '2019-10-31 04:00:00', '2020-01-31 17:00:00', '2019-10-31 17:38:21', '2019-10-31 17:38:21'),
(14, 32, 35, '2019-10-31 04:00:00', '2020-01-31 17:00:00', '2019-10-31 17:47:58', '2019-10-31 17:47:58'),
(15, 33, 30, '2019-10-31 04:00:00', '2020-01-31 17:00:00', '2019-10-31 17:58:01', '2019-10-31 17:58:01'),
(16, 34, 30, '2019-10-31 04:00:00', '2020-01-31 17:00:00', '2019-10-31 18:14:05', '2019-10-31 18:14:05'),
(17, 35, 30, '2019-10-31 04:00:00', '2020-01-31 17:00:00', '2019-10-31 18:17:24', '2019-10-31 18:17:24'),
(18, 2, 30, '2019-10-31 04:00:00', '2020-01-31 17:00:00', '2019-10-31 18:47:39', '2019-11-02 07:07:48'),
(19, 41, 20, '2019-10-31 04:00:00', '2020-01-31 17:00:00', '2019-10-31 18:52:17', '2019-10-31 18:52:17'),
(21, 42, 20, '2019-11-03 04:00:00', '2019-11-30 17:00:00', '2019-11-03 22:47:06', '2019-11-03 22:47:06'),
(23, 65, 20, '2019-11-04 05:00:00', '2020-02-04 17:00:00', '2019-11-04 16:48:21', '2019-11-04 16:48:21'),
(24, 67, 20, '2019-11-04 05:00:00', '2020-02-04 17:00:00', '2019-11-04 18:25:56', '2019-11-04 18:25:56'),
(25, 70, 20, '2019-11-05 05:00:00', '2020-02-05 17:00:00', '2019-11-05 16:13:18', '2019-11-05 16:13:18'),
(26, 71, 16, '2019-11-05 05:00:00', '2021-02-05 17:00:00', '2019-11-05 16:29:03', '2019-11-05 16:29:03'),
(27, 74, 20, '2019-11-05 05:00:00', '2021-02-05 17:00:00', '2019-11-05 17:24:53', '2019-11-05 17:24:53'),
(28, 79, 20, '2020-11-05 05:00:00', '2021-02-05 17:00:00', '2019-11-05 20:20:13', '2019-11-05 20:20:13'),
(29, 105, 14, '2019-12-30 00:00:00', '2020-01-07 12:00:00', '2019-12-30 15:46:10', '2019-12-30 15:46:10'),
(30, 106, 15, '2019-12-30 00:00:00', '2020-01-07 12:00:00', '2019-12-30 15:54:44', '2019-12-30 15:54:44'),
(31, 107, 20, '2019-12-30 00:00:00', '2019-12-31 12:00:00', '2019-12-30 15:58:57', '2019-12-30 15:58:57'),
(32, 109, 20, '2019-12-30 00:00:00', '2019-12-31 12:00:00', '2019-12-30 16:04:25', '2019-12-30 16:04:25'),
(33, 110, 22, '2019-12-30 00:00:00', '2020-01-08 12:00:00', '2019-12-30 16:20:25', '2019-12-30 16:20:25'),
(34, 117, 15, '2020-01-09 00:00:00', '2020-03-11 12:00:00', '2020-01-09 12:55:29', '2020-01-09 12:55:29'),
(35, 118, 15, '2020-01-09 00:00:00', '2020-04-15 12:00:00', '2020-01-09 12:59:11', '2020-01-09 12:59:11'),
(36, 119, 10, '2020-05-02 22:00:00', '2020-05-30 10:00:00', '2020-05-03 10:33:29', '2020-05-03 10:33:29'),
(37, 124, 12, '2020-05-03 22:00:00', '2021-05-20 10:00:00', '2020-05-04 13:14:12', '2020-05-04 13:14:12'),
(38, 125, 12, '2020-05-03 22:00:00', '2021-05-20 10:00:00', '2020-05-04 13:16:08', '2020-05-04 13:16:08'),
(39, 126, 12, '2020-05-03 22:00:00', '2021-05-26 10:00:00', '2020-05-04 13:23:53', '2020-05-04 13:41:15'),
(40, 116, 15, '2020-05-03 22:00:00', '2021-05-27 10:00:00', '2020-05-04 13:42:33', '2020-05-04 13:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `paragraphs`
--

CREATE TABLE `paragraphs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci,
  `title_ar` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `youtube_link` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paragraphs`
--

INSERT INTO `paragraphs` (`id`, `title_en`, `title_ar`, `description_en`, `description_ar`, `image`, `position`, `idea_id`, `active`, `created_at`, `updated_at`, `youtube_link`) VALUES
(1, 'TITLE', 'عنوان', 'English DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish Description', 'Arabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic DescriptionArabic Description', '15869517735e96f65de92af.png', 'right', 34, 0, '2020-04-15 13:56:14', '2020-04-16 12:43:16', NULL),
(2, 'New', 'New', 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', '15869517745e96f65e1cd93.jpg', 'bottom', 34, 0, '2020-04-15 13:56:14', '2020-04-16 12:43:33', NULL),
(3, 'New', 'New', 'DescriptionDescriptionDescription', 'DescriptionDescriptionDescription', '15869550635e970337d0634.jpg', 'top', 35, 1, '2020-04-15 14:51:03', '2020-04-15 14:51:03', NULL),
(4, 'Title one', 'Title one', '<p>English DescriptionEnglish Description<a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.google.com/\">English </a>DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish Description</p>', '', '15873037915e9c556fe86e8.jpg', 'top', 34, 1, '2020-04-19 15:43:12', '2020-04-19 15:43:12', 'https://www.youtube.com/watch?v=rlWMDYpI7fM'),
(5, 'Title', 'Title', '<p><a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://dev.yalla-furnish.com/showroom/darac\">Darac</a> Description English DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish&nbsp;</p>', '<p>English DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish DescriptionEnglish Description</p>', '15873043975e9c57cd6d040.jpg', 'right', 36, 1, '2020-04-19 15:53:17', '2020-04-23 11:58:55', 'https://www.youtube.com/embed/-RyrDIwlAZw'),
(6, 'TITLE', 'Title', '<p>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription</p>', '<p>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription</p>', '15873049335e9c59e576530.jpg', 'top', 36, 1, '2020-04-19 16:02:13', '2020-04-19 16:02:27', NULL),
(7, 'Title', 'Title', '<p>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription</p>', '<p>DescriptionDescription</p>', '15876379035ea16e8f8878f.jpg', 'right', 37, 1, '2020-04-23 12:31:43', '2020-04-23 12:37:10', 'https://www.youtube.com/embed/668nUCeBHyY'),
(8, 'title2', 'title2', '<p>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription</p>', '<p>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription</p>', '15876381565ea16f8c69be2.jpg', 'left', 37, 1, '2020-04-23 12:35:56', '2020-04-23 12:36:36', 'https://www.youtube.com/embed/668nUCeBHyY'),
(12, 'dashgvdh', 'jhbdajhbdasd', '<p>dasndvbajhb</p>', '<p>jbdjashbdsjad</p>', '15884352445ead992c086de.png', 'top', 39, 1, '2020-05-02 16:00:44', '2020-05-02 16:00:44', NULL),
(13, '<p><b>asjdbkasjbdkasbdasdnksa</b></p>', NULL, '<p>description</p>', NULL, '15886686955eb12917d648b.jpg', 'top', 40, 1, '2020-05-05 08:49:04', '2020-05-05 08:51:37', NULL),
(14, '<p>dsadasdasdasd</p>', NULL, '<p>dasdasdsadasdsa</p>', NULL, NULL, 'top', 41, 1, '2020-05-06 09:05:25', '2020-05-06 09:05:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(2, 'role-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(3, 'role-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(4, 'role-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(5, 'product-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(6, 'product-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(7, 'product-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(8, 'product-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(9, 'city-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(10, 'city-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(11, 'city-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(12, 'city-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(13, 'country-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(14, 'country-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(15, 'country-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(16, 'country-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(17, 'showroom-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(18, 'showroom-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(19, 'showroom-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(20, 'showroom-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(21, 'district-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(22, 'district-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(23, 'district-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(24, 'district-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(25, 'category-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(26, 'catgeory-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(27, 'category-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(28, 'category-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(29, 'material-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(30, 'material-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(31, 'material-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(32, 'material-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(33, 'upholstery-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(34, 'upholstery-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(35, 'upholstery-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(36, 'upholstery-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(37, 'color-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(38, 'color-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(39, 'color-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(40, 'color-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(41, 'style-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(42, 'style-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(43, 'style-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(44, 'style-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(45, 'admin-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(46, 'admin-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(47, 'admin-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(48, 'admin-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(49, 'topic-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(50, 'topic-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(51, 'topic-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(52, 'topic-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(53, 'idea-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(54, 'idea-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(55, 'idea-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(56, 'idea-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(57, 'user-list', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(58, 'user-create', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(59, 'user-edit', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(60, 'user-delete', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(61, 'approve-showroom', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34'),
(62, 'approve-product', 'web', '2019-08-22 14:48:34', '2019-08-22 14:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantee` int(11) DEFAULT NULL,
  `others` text COLLATE utf8mb4_unicode_ci,
  `showroom_id` bigint(20) UNSIGNED NOT NULL,
  `style_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approve` tinyint(4) NOT NULL DEFAULT '0',
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `upholstery_id` bigint(20) UNSIGNED NOT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '10',
  `width` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '10',
  `depth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '10',
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hidden_price` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `name_ar`, `price`, `description_en`, `description_ar`, `guarantee`, `others`, `showroom_id`, `style_id`, `material_id`, `color_id`, `deleted_at`, `created_at`, `updated_at`, `approve`, `country_id`, `upholstery_id`, `height`, `width`, `depth`, `reason`, `hidden_price`) VALUES
(1, 'Yalla-product', 'Yalla-product', 10000, 'Yalla-1', 'Yalla-1', 3, 'Yalla-1', 1, 1, 4, 10, '2019-10-19 19:45:47', '2019-09-23 15:31:34', '2019-10-19 19:45:47', 1, 3, 1, '100', '60', '40', NULL, 0),
(2, 'Carcol', 'Carcol', 60700, 'Sofa 3 = 16,600 EGP\nSofa 2 = 12,800 EGP\nChair = 6,550 EGP', 'Sofa 3 = 16,600 EGP\nSofa 2 = 12,800 EGP\nChair = 6,550 EGP', 12, NULL, 5, 1, 5, 22, NULL, '2019-10-19 21:16:11', '2019-11-02 07:07:48', 1, 3, 1, '0', '0', '0', NULL, 0),
(3, 'Camellia', 'Camellia', 32500, '.', '.', 0, NULL, 5, 1, 5, 22, NULL, '2019-10-20 17:55:56', '2019-10-21 20:10:48', 1, 3, 1, '1', '1', '1', NULL, 0),
(4, 'Comfy', 'Comfy', 18450, '.', '.', 0, NULL, 5, 1, 5, 17, NULL, '2019-10-20 19:43:25', '2019-10-20 19:49:23', 1, 3, 1, '325', '1', '233', NULL, 0),
(5, 'Mira', 'Mira', 25350, '.', '.', 0, NULL, 5, 1, 5, 22, NULL, '2019-10-20 19:59:41', '2019-10-20 20:00:27', 1, 3, 1, '1', '1', '1', NULL, 0),
(6, 'Caramel', 'Caramel', 39835, 'Dining table = 5,700 EGP\nDining Buffet = 11,150 EGP\nDining Chair = 2,171 EGP\nDining Nish = 7,450 EGP', 'Dining table = 5,700 EGP\nDining Buffet = 11,150 EGP\nDining Chair = 2,171 EGP\nDining Nish = 7,450 EGP', 12, NULL, 5, 1, 4, 21, NULL, '2019-10-21 19:08:46', '2019-10-31 17:52:14', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(7, 'Kitchen', 'Kitchen', 8666, '.', '.', 1, NULL, 5, 1, 5, 7, '2019-10-31 15:38:31', '2019-10-23 15:03:11', '2019-10-31 15:38:31', 1, 3, 1, '1', '1', '1', NULL, 1),
(8, 'Diamond', 'Diamond', 52000, 'CODE: Diamond\nDiamond master bedroom is truly a diamond piece of art ,comfortable , durable & elegant.\nThe designer respect to detail to enhanced ribbed alignments makes this upholstered head boards a magnificent masterpiece combined with luxurious inverted leather pads fills the bed room with comfort & beauty.\nThe wooden frame matches with the two wooden drawers with an elegant night stands fixed on it .\nThe wardrobe & dresser acquires the same modernized finishes imposing royalty .\nThe bedroom made of Massive wood & the inner parts are made of MDF.\n\navailability for customizing :\nThe color of the upholstered back inverted leather pads .\nThe color of the wardrobe & dresser paint .\n-----------------------------------------------------------------\nDimension:\nBed (180cm+200cm) = 10,235 EGP\nWardrobe (260cm+220cm) = 18,375 EGP\n2Ns (67cm+50cm) = 2,250 EGP\nDresser (130cm+50cm) = 5,890 EGP', 'CODE: Diamond\nDiamond master bedroom is truly a diamond piece of art ,comfortable , durable & elegant.\nThe designer respect to detail to enhanced ribbed alignments makes this upholstered head boards a magnificent masterpiece combined with luxurious inverted leather pads fills the bed room with comfort & beauty.\nThe wooden frame matches with the two wooden drawers with an elegant night stands fixed on it .\nThe wardrobe & dresser acquires the same modernized finishes imposing royalty .\nThe bedroom made of Massive wood & the inner parts are made of MDF.\n\navailability for customizing :\nThe color of the upholstered back inverted leather pads .\nThe color of the wardrobe & dresser paint .\n-----------------------------------------------------------------\nDimension:\nBed (180cm+200cm) = 10,235 EGP\nWardrobe (260cm+220cm) = 18,375 EGP\n2Ns (67cm+50cm) = 2,250 EGP\nDresser (130cm+50cm) = 5,890 EGP', 0, NULL, 5, 1, 5, 23, '2019-10-31 15:37:45', '2019-10-23 17:11:08', '2019-10-31 15:37:45', 1, 3, 1, '1', '1', '1', '5', 0),
(9, 'TV - 1100', 'TV - 1100', 14500, '.', '.', 0, NULL, 5, 1, 4, 21, '2019-10-28 18:33:39', '2019-10-28 18:29:30', '2019-10-28 18:33:39', 0, 3, 1, '1', '1', '1', NULL, 0),
(10, 'product1myshowroom', 'product1myshowroom', NULL, 'fvfvdfcd', 'dffvvvvvvesf', NULL, NULL, 10, 1, 4, 10, '2019-10-31 15:52:42', '2019-10-29 21:39:16', '2019-10-31 15:52:42', 1, 191, 1, NULL, NULL, NULL, NULL, 0),
(11, 'nny', 'nn', 2000, '.', '.', 0, NULL, 13, 1, 4, 20, '2019-10-31 15:52:24', '2019-10-30 16:07:36', '2019-10-31 15:52:24', 1, 3, 1, '1', '1', '1', NULL, 0),
(12, 'product1', 'product1', 10000, 'product1', 'product1', NULL, NULL, 14, 1, 4, 21, '2019-10-31 15:52:05', '2019-10-30 17:14:29', '2019-10-31 15:52:05', 1, 5, 1, NULL, NULL, NULL, '5', 0),
(13, 'maji', 'Maji', NULL, '.', '.', NULL, NULL, 13, 1, 4, 15, '2019-10-31 15:51:59', '2019-10-30 18:55:38', '2019-10-31 15:51:59', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(14, 'mija2', '.', NULL, '.', '.', NULL, NULL, 13, 1, 4, 4, '2019-10-31 15:49:25', '2019-10-30 19:04:17', '2019-10-31 15:49:25', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(15, 'p1', 'p1', NULL, 'zsczc', 'dvsvdv', NULL, NULL, 14, 2, 4, 15, '2019-10-31 15:44:04', '2019-10-30 20:43:13', '2019-10-31 15:44:04', 1, 13, 1, NULL, NULL, NULL, NULL, 0),
(16, 'b1', 'b1', NULL, 'fgbsz', 'dnfncv', NULL, NULL, 11, 2, 4, 11, '2019-10-30 21:14:59', '2019-10-30 20:56:42', '2019-10-30 21:14:59', 1, 11, 1, NULL, NULL, NULL, NULL, 0),
(17, 'product1', 'product1', 0, 'zdfvzvc', 'product1', 0, NULL, 4, 1, 4, 23, '2019-10-31 15:37:33', '2019-10-30 20:59:12', '2019-10-31 15:37:33', 1, 18, 1, '0', '0', '0', NULL, 0),
(18, 'Dibaj Fabrics - 01', 'Dibaj Fabrics - 01', NULL, 'Viscose is a diverse fabric with great properties for absorption that competes with cotton, the spandex provides retention of fabric and nice stretch for more comfort, viscose offers exceptional drape in comfortable relaxed looks, which perfectly suits the long summer months of the region. Viscose is also famous for its easy to dye nature and its anti-static properties.', 'Viscose is a diverse fabric with great properties for absorption that competes with cotton, the spandex provides retention of fabric and nice stretch for more comfort, viscose offers exceptional drape in comfortable relaxed looks, which perfectly suits the long summer months of the region. Viscose is also famous for its easy to dye nature and its anti-static properties.', NULL, 'Dibaj is a well-established Egyptian fabrics store which offers a rich variety of upholstery and curtains fabrics including cotton, silk, velvet, etc. We import the finest materials from Europe and South Asia besides, our rich Egyptian made collection exclusively designed and distributed by Dibaj', 24, 1, 5, 6, '2019-10-31 15:48:53', '2019-10-31 04:16:00', '2019-10-31 15:48:53', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(19, 'Dibaj Fabrics - 02', 'Dibaj Fabrics - 02', NULL, 'Egyptian cotton is a top-quality long-staple fiber that is grown in Egypt. It is predominantly cultivated in the Nile Delta where the warm dry desert climate is ideal for growing cotton. The long luxe fibers of Egyptian cotton are stronger than other varieties and more easily spun into thread. The thread’s continuous length means it is easily woven into strong, lustrous fabric. Cotton is the most common of the natural fiber family, with a wide range of items made from this practical fiber. Cotton is hypoallergenic, breathable, absorbs moisture and very easy to sanitize.', 'Egyptian cotton is a top-quality long-staple fiber that is grown in Egypt. It is predominantly cultivated in the Nile Delta where the warm dry desert climate is ideal for growing cotton. The long luxe fibers of Egyptian cotton are stronger than other varieties and more easily spun into thread. The thread’s continuous length means it is easily woven into strong, lustrous fabric. Cotton is the most common of the natural fiber family, with a wide range of items made from this practical fiber. Cotton is hypoallergenic, breathable, absorbs moisture and very easy to sanitize.', NULL, 'Cotton', 24, 1, 5, 16, '2019-10-31 15:47:46', '2019-10-31 04:24:03', '2019-10-31 15:47:46', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(20, 'Dibaj Fabrics - 03', 'Dibaj Fabrics - 03', 0, 'Egyptian cotton is a top-quality long-staple fiber that is grown in Egypt. It is predominantly cultivated in the Nile Delta where the warm dry desert climate is ideal for growing cotton. The long luxe fibers of Egyptian cotton are stronger than other varieties and more easily spun into thread. The thread’s continuous length means it is easily woven into strong, lustrous fabric. Cotton is the most common of the natural fiber family, with a wide range of items made from this practical fiber. Cotton is hypoallergenic, breathable, absorbs moisture and very easy to sanitize.', 'Egyptian cotton is a top-quality long-staple fiber that is grown in Egypt. It is predominantly cultivated in the Nile Delta where the warm dry desert climate is ideal for growing cotton. The long luxe fibers of Egyptian cotton are stronger than other varieties and more easily spun into thread. The thread’s continuous length means it is easily woven into strong, lustrous fabric. Cotton is the most common of the natural fiber family, with a wide range of items made from this practical fiber. Cotton is hypoallergenic, breathable, absorbs moisture and very easy to sanitize.', 0, NULL, 24, 1, 5, 13, '2019-10-31 15:47:31', '2019-10-31 04:28:44', '2019-10-31 15:47:31', 1, 3, 1, '0', '0', '0', NULL, 1),
(21, 'cushions', 'cushions', 150, 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', 0, NULL, 25, 1, 5, 7, '2019-10-31 15:44:48', '2019-10-31 06:14:21', '2019-10-31 15:44:48', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(22, 'cushions', 'cushions', 150, 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', NULL, NULL, 25, 1, 5, 7, '2019-10-31 06:21:53', '2019-10-31 06:20:44', '2019-10-31 06:21:53', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(23, 'cushions', 'cushions', 150, 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', NULL, NULL, 25, 1, 5, 7, '2019-10-31 15:44:36', '2019-10-31 06:26:24', '2019-10-31 15:44:36', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(24, 'cushions', 'cushions', 150, 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', NULL, NULL, 25, 1, 5, 7, '2019-10-31 15:42:42', '2019-10-31 06:28:15', '2019-10-31 15:42:42', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(25, 'diamond', 'diamond', 12000, 'adaczxxdas', 'xvsvgnhm', NULL, NULL, 14, 2, 4, 4, '2019-10-31 14:23:18', '2019-10-31 14:22:26', '2019-10-31 14:23:18', 1, 12, 1, NULL, NULL, NULL, NULL, 0),
(26, 'star', 'star', 15150, 'Bed ( W 100 cm + H 200 cm ) = 4,720 EGP\nBed ( W 120 cm + H 200 cm ) = 5.080 EGP\nStudy Disk ( W 132 cm + H 192 CM ) = 3,800 EGP\nNS ( W 42 cm + H 46 CM ) = 920 EGP\nWardrobe 3D (W 120 CM + H 212 CM ) = 6,120 EGP\nWardrobe 4D (W 160 CM + H 212 CM ) = 7,520 EGP\n\n\n=====Below Price Include =====\n(Bed 120cm+NS+Wardrobe 3D)', 'Bed ( W 100 cm + H 200 cm ) = 4,720 EGP\nBed ( W 120 cm + H 200 cm ) = 5.080 EGP\nStudy Disk ( W 132 cm + H 192 CM ) = 3,800 EGP\nNS ( W 42 cm + H 46 CM ) = 920 EGP\nWardrobe 3D (W 120 CM + H 212 CM ) = 6,120 EGP\nWardrobe 4D (W 160 CM + H 212 CM ) = 7,520 EGP\n\n\n=====Below Price Include =====\n(Bed 120cm+NS+Wardrobe 3D)', NULL, NULL, 5, 1, 5, 17, '2019-10-31 15:42:35', '2019-10-31 15:19:17', '2019-10-31 15:42:35', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(27, 'Amwaj', 'Amwaj', 26550, 'Bed = 4,750 EGP\nDressing Table = 3,300 EGP\nNightStand = 1,250 EGP\nWardrobe = 9,350 EGP', 'Bed = 4,750 EGP\nDressing Table = 3,300 EGP\nNightStand = 1,250 EGP\nWardrobe = 9,350 EGP', NULL, NULL, 5, 1, 4, 23, NULL, '2019-10-31 16:47:29', '2019-10-31 16:51:02', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(28, 'Caramel', 'Caramel', 45750, 'Caramel\r\nBed = 8,075 EGP\r\nNightstand = 2,975 EGP\r\nWardrobe = 18,065 EGP\r\nDressing Table = 6,800 EGP', 'Caramel\r\nBed = 8,075 EGP\r\nNightstand = 2,975 EGP\r\nWardrobe = 18,065 EGP\r\nDressing Table = 6,800 EGP', NULL, NULL, 5, 1, 4, 21, NULL, '2019-10-31 16:58:05', '2019-11-05 17:49:16', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(29, 'Dream', 'Dream', 19990, '.', '.', 12, NULL, 5, 1, 4, 24, NULL, '2019-10-31 17:31:37', '2019-10-31 17:34:06', 1, 3, 1, '280', NULL, '180', NULL, 0),
(30, 'Diamond', 'Diamond', 52000, 'Diamond master bedroom is truly a diamond piece of art ,comfortable , durable & elegant.\r\nThe designer respect to detail to enhanced ribbed alignments makes this upholstered head boards a magnificent masterpiece combined with luxurious inverted leather pads fills the bed room with comfort & beauty.\r\nThe wooden frame matches with the two wooden drawers with an elegant night stands fixed on it .\r\nThe wardrobe & dresser acquires the same modernized finishes imposing royalty .\r\nThe bedroom made of Massive wood & the inner parts are made of MDF.\r\n\r\navailability for customizing :\r\nThe color of the upholstered back inverted leather pads .\r\nThe color of the wardrobe & dresser paint .\r\n-----------------------------------------------------------------\r\nDimension:\r\nBed (180cm+200cm) = 10,235 EGP\r\nWardrobe (260cm+220cm) = 18,375 EGP\r\n2Ns (67cm+50cm) = 2,250 EGP\r\nDresser (130cm+50cm) = 5,890 EGP', 'Diamond master bedroom is truly a diamond piece of art ,comfortable , durable & elegant.\r\nThe designer respect to detail to enhanced ribbed alignments makes this upholstered head boards a magnificent masterpiece combined with luxurious inverted leather pads fills the bed room with comfort & beauty.\r\nThe wooden frame matches with the two wooden drawers with an elegant night stands fixed on it .\r\nThe wardrobe & dresser acquires the same modernized finishes imposing royalty .\r\nThe bedroom made of Massive wood & the inner parts are made of MDF.\r\n\r\navailability for customizing :\r\nThe color of the upholstered back inverted leather pads .\r\nThe color of the wardrobe & dresser paint .\r\n-----------------------------------------------------------------\r\nDimension:\r\nBed (180cm+200cm) = 10,235 EGP\r\nWardrobe (260cm+220cm) = 18,375 EGP\r\n2Ns (67cm+50cm) = 2,250 EGP\r\nDresser (130cm+50cm) = 5,890 EGP', NULL, NULL, 5, 1, 4, 23, NULL, '2019-10-31 17:32:07', '2019-11-05 17:51:54', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(31, 'New Comfy', 'New Comfy', 24600, '.', '.', 12, NULL, 5, 1, 4, 22, NULL, '2019-10-31 17:38:21', '2019-10-31 17:40:14', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(32, 'Rosetta', 'Rosetta', 19990, '.', '.', 12, NULL, 5, 1, 4, 16, NULL, '2019-10-31 17:47:58', '2019-10-31 17:48:16', 1, 3, 1, '340', NULL, '180', NULL, 0),
(33, 'Diamond', 'Diamond', 36900, 'Dining Table = 6,300 EGP\nDining Buffet = 7,600 EGP\nDining Chair = 1,988 EGP\nDining Nish = 6,250 EGP', 'Dining Table = 6,300 EGP\nDining Buffet = 7,600 EGP\nDining Chair = 1,988 EGP\nDining Nish = 6,250 EGP', 12, NULL, 5, 1, 4, 23, NULL, '2019-10-31 17:58:01', '2019-10-31 17:58:54', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(34, 'Majestic', 'Majestic', 34515, 'Table  - 6 Chair - Buffet (210cm+50cm', 'Table  - 6 Chair - Buffet (210cm+50cm', 12, NULL, 5, 1, 4, 21, NULL, '2019-10-31 18:14:05', '2019-10-31 18:14:17', 1, 3, 1, '190', NULL, '100', NULL, 0),
(35, 'Marina', 'Marina', 25000, '.', '.', 12, NULL, 5, 1, 4, 21, NULL, '2019-10-31 18:17:24', '2019-10-31 18:17:37', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(36, 'New 4', 'New 4', NULL, '.', '.', 12, NULL, 5, 1, 5, 20, NULL, '2019-10-31 18:24:35', '2019-10-31 18:36:58', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(37, 'New1', 'New1', NULL, '.', '.', 12, NULL, 5, 1, 5, 7, NULL, '2019-10-31 18:32:23', '2019-11-05 17:40:50', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(38, 'New2', 'New2', NULL, '.', '.', 12, NULL, 5, 1, 5, 5, NULL, '2019-10-31 18:36:43', '2019-11-05 17:45:24', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(39, 'New3', 'New3', NULL, '.', '.', 12, NULL, 5, 1, 5, 22, NULL, '2019-10-31 18:43:59', '2019-11-05 17:45:49', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(40, 'ww', 'ww', NULL, 'w', 'w', NULL, NULL, 5, 1, 5, 7, NULL, '2019-10-31 18:47:56', '2019-10-31 18:48:16', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(41, 'Star', 'Star', 15150, 'Bed ( W 100 cm + H 200 cm ) = 4,720 EGP\nBed ( W 120 cm + H 200 cm ) = 5.080 EGP\nStudy Disk ( W 132 cm + H 192 CM ) = 3,800 EGP\nNS ( W 42 cm + H 46 CM ) = 920 EGP\nWardrobe 3D (W 120 CM + H 212 CM ) = 6,120 EGP\nWardrobe 4D (W 160 CM + H 212 CM ) = 7,520 EGP\n\n\n===== Price Include =====\n(Bed 120cm+NS+Wardrobe 3D)', 'Bed ( W 100 cm + H 200 cm ) = 4,720 EGP\nBed ( W 120 cm + H 200 cm ) = 5.080 EGP\nStudy Disk ( W 132 cm + H 192 CM ) = 3,800 EGP\nNS ( W 42 cm + H 46 CM ) = 920 EGP\nWardrobe 3D (W 120 CM + H 212 CM ) = 6,120 EGP\nWardrobe 4D (W 160 CM + H 212 CM ) = 7,520 EGP\n\n\n===== Price Include =====\n(Bed 120cm+NS+Wardrobe 3D)', 12, NULL, 5, 1, 5, 7, '2019-11-02 00:28:59', '2019-10-31 18:52:16', '2019-11-02 00:28:59', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(42, 'Winter', 'Winter', 14700, 'Bed ( W 100 cm + H 200 cm ) = 4,720 EGP\r\nBed ( W 120 cm + H 200 cm ) = 5,080 EGP\r\nStudy Disk ( W 120 cm + H 190 CM ) = 3,480 EGP\r\nNS ( W 42 cm + H 46 CM ) = 920 EGP\r\nWardrobe 3D (W 120 CM + H 213 CM ) = 6,120 EGP\r\nWardrobe 4D (W 120 CM + H 213 CM ) = 7,520 EGP\r\n\r\n===== Price Include =====\r\n(Bed 100cm+NS+Wardrobe 3D)', 'Bed ( W 100 cm + H 200 cm ) = 4,720 EGP\r\nBed ( W 120 cm + H 200 cm ) = 5,080 EGP\r\nStudy Disk ( W 120 cm + H 190 CM ) = 3,480 EGP\r\nNS ( W 42 cm + H 46 CM ) = 920 EGP\r\nWardrobe 3D (W 120 CM + H 213 CM ) = 6,120 EGP\r\nWardrobe 4D (W 120 CM + H 213 CM ) = 7,520 EGP\r\n\r\n===== Price Include =====\r\n(Bed 100cm+NS+Wardrobe 3D)', 12, NULL, 5, 1, 5, 7, NULL, '2019-10-31 18:54:56', '2019-11-05 17:36:06', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(43, 'cushion', 'cushion', 150, 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', NULL, NULL, 25, 1, 5, 7, NULL, '2019-11-01 23:01:58', '2019-11-01 23:06:25', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(44, 'cushion', 'cushion', 150, 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', 0, NULL, 25, 1, 5, 7, NULL, '2019-11-01 23:04:42', '2019-11-01 23:13:26', 1, 3, 1, '40', '40', '10', NULL, 0),
(45, 'cushions', 'cushion', 150, 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', 0, NULL, 25, 1, 5, 7, NULL, '2019-11-01 23:43:15', '2019-11-01 23:43:15', 0, 3, 1, '40', '40', '10', NULL, 0),
(46, 'Smart Vogue/ OG 5568', 'Smart Vogue/ OG 5568', 39900, 'renewing your sense of well-being from head to toe. With its revolutionized Triple S-Track and the humanised Intelligent Motorised Timer technology (IMT), your body will be put at the utmost relaxed state and enjoy a holistic human live massage focusing on the tailbone until hips. This is the beauty of Smart Vogue.', 'renewing your sense of well-being from head to toe. With its revolutionized Triple S-Track and the humanised Intelligent Motorised Timer technology (IMT), your body will be put at the utmost relaxed state and enjoy a holistic human live massage focusing on the tailbone until hips. This is the beauty of Smart Vogue.', 12, 'Upright position: 146cm x 76cm x 115cm Reclined position: 195cm x 76cm x 66cm', 28, 1, 5, 21, NULL, '2019-11-03 15:11:12', '2019-11-03 15:18:24', 1, 3, 2, '76', '146', '115', NULL, 0),
(47, 'Master Drive/ 7598', 'Master Drive/ 7598', 79900, 'Drive 4D Thermo  Care Massage Chair\r\n\r\nFeel the power of massage mastery, designed by cutting-edge Japanese technology. Every component in the OGAWA Master Drive is optimized for performance, leading to an extremely accurate massage chair that precisely targets your acupunctural points – from head-to-toe, including your knees – for optimal energy restoration through human-like full-body massages.', 'Drive 4D Thermo  Care Massage Chair\r\n\r\nFeel the power of massage mastery, designed by cutting-edge Japanese technology. Every component in the OGAWA Master Drive is optimized for performance, leading to an extremely accurate massage chair that precisely targets your acupunctural points – from head-to-toe, including your knees – for optimal energy restoration through human-like full-body massages.', 12, 'Upright position: 158cm x 84cm x 121cm Reclined position: 196cm x 84cm x 105cm', 28, 1, 5, 21, NULL, '2019-11-03 15:17:55', '2019-11-05 17:34:24', 1, 3, 2, '84', '158', '121', NULL, 0),
(48, '\"My Sofa/ OS 3118 \"', '\"My Sofa/ OS 3118 \"', 23900, '\"OGAWA MYsofa massage chair, a creation designed with sophistication and elegance in mind, and equipped with a superior massage mechanism. Now with enhanced high-tech massage modes, OGAWA MYsofa can effortlessly elevate your massage \r\n\r\n\"', '\"OGAWA MYsofa massage chair, a creation designed with sophistication and elegance in mind, and equipped with a superior massage mechanism. Now with enhanced high-tech massage modes, OGAWA MYsofa can effortlessly elevate your massage \r\n\r\n\"', 12, '\"Upright position: Approx. 93.5cm x 65cm x 105cm Reclined position: Approx. 143cm x 65cm x 88cm\r\n\"', 28, 1, 5, 7, NULL, '2019-11-03 16:13:53', '2019-11-06 17:54:11', 1, 3, 2, '65', '93', '105', NULL, 0),
(49, 'OmKNEE Therapy Plus/ OF 2003', 'OmKNEE Therapy Plus/ OF 2003', 13500, 'New Ogawa Omknee Therapy Plus is equipped with four caring features to take care of your knees, legs, and feet! With customizable massage setting and improved built-in comfy rollers, your legs are sure to get the ultimate care they deserve!', 'New Ogawa Omknee Therapy Plus is equipped with four caring features to take care of your knees, legs, and feet! With customizable massage setting and improved built-in comfy rollers, your legs are sure to get the ultimate care they deserve!', 12, NULL, 28, 1, 5, 21, NULL, '2019-11-03 16:32:06', '2019-11-03 16:32:28', 1, 3, 2, NULL, NULL, NULL, NULL, 0),
(50, 'wall paper', 'wall paper', NULL, '.', '.', NULL, NULL, 4, 1, 5, 7, '2019-11-03 18:22:28', '2019-11-03 17:52:36', '2019-11-03 18:22:28', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(51, 'trycube', 'trycube', NULL, '.', '.', NULL, NULL, 27, 1, 5, 7, '2019-11-03 17:57:52', '2019-11-03 17:57:21', '2019-11-03 17:57:52', 0, 3, 4, NULL, NULL, NULL, NULL, 0),
(52, 'Brunate-BR30008', 'Brunate-BR30008', NULL, 'washable\n5 meter', 'washable\n5 meter', NULL, NULL, 4, 2, 5, 22, '2019-11-03 18:22:02', '2019-11-03 18:16:30', '2019-11-03 18:22:02', 1, 184, 4, NULL, NULL, NULL, NULL, 0),
(53, 'Brunate-BR30102', 'Brunate-BR30102', NULL, 'washable\n5 meter', 'washable\n5 meter', NULL, NULL, 4, 2, 5, 24, '2019-11-03 18:20:44', '2019-11-03 18:18:54', '2019-11-03 18:20:44', 0, 184, 4, NULL, NULL, NULL, NULL, 0),
(54, 'Brunate-BR30008', 'Brunate-BR30008', NULL, 'washable\n5 meter', 'washable\n5 meter', NULL, NULL, 4, 2, 5, 22, '2019-11-03 18:33:44', '2019-11-03 18:24:47', '2019-11-03 18:33:44', 1, 184, 4, NULL, NULL, NULL, NULL, 0),
(55, 'Brunate-BR30102', 'Brunate-BR30102', NULL, 'washable\n5 meter', 'washable\n5 meter', NULL, NULL, 4, 2, 5, 24, '2019-11-03 18:33:36', '2019-11-03 18:28:46', '2019-11-03 18:33:36', 1, 184, 4, NULL, NULL, NULL, NULL, 0),
(56, 'Brunate-BR30008', 'Brunate-BR30008', NULL, 'wahsable\n5 meter', 'wahsable\n5 meter', NULL, NULL, 4, 2, 5, 22, '2020-01-05 12:04:11', '2019-11-03 18:35:26', '2020-01-05 12:04:11', 1, 184, 4, NULL, NULL, NULL, NULL, 0),
(57, 'Brunate-BR30102', 'Brunate-BR30102', NULL, 'washable - 5 meter', 'washable - 5 meter', NULL, NULL, 4, 2, 5, 24, '2020-01-05 12:04:37', '2019-11-03 18:38:53', '2020-01-05 12:04:37', 1, 184, 4, NULL, NULL, NULL, NULL, 0),
(58, 'Brunate-BR30106', 'Brunate-BR30106', NULL, 'washable - 5 meter', 'washable - 5 meter', NULL, NULL, 4, 2, 5, 21, NULL, '2019-11-03 18:40:55', '2019-11-05 16:43:44', 1, 184, 4, NULL, NULL, NULL, NULL, 0),
(59, 'Classica-CS40002', 'Classica-CS40002', NULL, 'washable - 5 meter', 'washable - 5 meter', NULL, NULL, 4, 2, 5, 7, NULL, '2019-11-03 18:44:07', '2019-11-05 16:42:38', 1, 184, 4, NULL, NULL, NULL, NULL, 0),
(60, 'EZ wave/OF 1020', 'EZ wave/OF 1020', 13500, 'than just a slimming machine get creative and combine your home exercises with OGAWA ezWAVE for an elevated fitness experience. Powered by the versatile built-in dual-motor, Ogawa ezWAVE offers various workout combinations across 3 stepping regions- walking, jogging and running. ', 'than just a slimming machine get creative and combine your home exercises with OGAWA ezWAVE for an elevated fitness experience. Powered by the versatile built-in dual-motor, Ogawa ezWAVE offers various workout combinations across 3 stepping regions- walking, jogging and running. ', 12, NULL, 28, 1, 5, 10, '2019-11-06 23:02:48', '2019-11-03 18:49:28', '2019-11-06 23:02:48', 1, 3, 2, '46', '78', '118', NULL, 0),
(61, 'Classica-CS40102', 'Classica-CS40102', NULL, 'washable -\r\n5 meter', 'washable -\r\n5 meter', NULL, NULL, 4, 2, 5, 17, NULL, '2019-11-03 18:51:57', '2019-11-05 16:39:20', 1, 184, 4, NULL, NULL, NULL, NULL, 0),
(62, 'Classica-CS40309', 'Classica-CS40309', NULL, 'washable-\r\n5 meter', 'washable- \r\n5 meter', NULL, NULL, 4, 2, 5, 21, NULL, '2019-11-03 18:54:22', '2019-11-05 16:38:20', 1, 184, 4, NULL, NULL, NULL, NULL, 0),
(63, 'EZ tone/ OE 0968', 'EZ tone/ OE 0968', 11900, 'OGAWA Ez-Tone \r\nIntroducing the all-new OGAWA ez-Tone, an advanced oscillator designed to use whole body vibration to help your body break and eliminate stubborn fats easily, shaping it into your desired figure as well as giving you various health boosts, without needing to leave the comfort of your home.', 'OGAWA Ez-Tone \r\nIntroducing the all-new OGAWA ez-Tone, an advanced oscillator designed to use whole body vibration to help your body break and eliminate stubborn fats easily, shaping it into your desired figure as well as giving you various health boosts, without needing to leave the comfort of your home.', 12, NULL, 28, 1, 5, 9, '2019-11-06 23:02:40', '2019-11-03 19:02:59', '2019-11-06 23:02:40', 1, 3, 2, '42', '77', '133', NULL, 0),
(64, 'Dibaj 15', 'Dibaj 15', NULL, '.', '.', NULL, NULL, 24, 2, 5, 7, '2019-11-03 20:35:07', '2019-11-03 20:29:16', '2019-11-03 20:35:07', 0, 3, 1, NULL, NULL, NULL, NULL, 0),
(65, '540', '540', 26000, '2006 with incomparable distinguished history in selling modern and classic Furniture & Lighting with wide variety of collections as well as the option of manufacturing special models to meet our customers needs and expectations Cube Furniture value is “Partnership built on mutual trust and benefit”; we want our customers to see us as their trusted business partner and preferred choice. We are at Cube Furniture focus on helping our customers to improve, sustain and guide them through providing all with alternative choices in furnishing their houses and also complete solutions to adopt to their needs and fulfill with our commitments.', '2006 with incomparable distinguished history in selling modern and classic Furniture & Lighting with wide variety of collections as well as the option of manufacturing special models to meet our customers needs and expectations Cube Furniture value is “Partnership built on mutual trust and benefit”; we want our customers to see us as their trusted business partner and preferred choice. We are at Cube Furniture focus on helping our customers to improve, sustain and guide them through providing all with alternative choices in furnishing their houses and also complete solutions to adopt to their needs and fulfill with our commitments.', 12, 'Chair  5000\nSofa 3  9400\nSofa 2 6200', 27, 1, 4, 21, NULL, '2019-11-04 03:30:44', '2019-11-04 16:48:21', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(66, 'Dibaj 15', 'Dibaj 15', NULL, '.', '.', NULL, NULL, 24, 1, 5, 24, NULL, '2019-11-04 17:04:43', '2019-11-04 17:08:02', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(67, 'Bari', 'Bari', 27000, 'Sofa 3 8600\r\nSofa 2 8000\r\nChair  5000', 'Sofa 3 8600\r\nSofa 2 8000\r\nChair  5000', NULL, 'Sofa 3 2.20 cm\r\nSofa 2 1.70 cm\r\nChair  .80 cm', 27, 1, 5, 22, NULL, '2019-11-04 18:25:56', '2019-11-05 17:26:56', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(68, 'dibaj0', 'dibaj0', NULL, '.', '.', NULL, NULL, 24, 1, 5, 7, NULL, '2019-11-04 18:32:00', '2019-11-04 18:32:27', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(69, 'dibaj2', 'dibaj2', NULL, '.', '.', NULL, NULL, 24, 1, 5, 25, NULL, '2019-11-04 18:37:55', '2019-11-04 18:38:05', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(70, 'Liza', 'Liza', 28000, 'Sofa 3  9000\r\nSofa 2 8400\r\nChair 5000', 'Sofa 3  9000\r\nSofa 2 8400\r\nChair 5000', NULL, 'Sofa 3 2.20 cm\r\nSofa 2 1.70 cm\r\nChair  .80 cm', 27, 1, 4, 26, NULL, '2019-11-05 16:13:17', '2019-11-05 17:27:46', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(71, 'TV - 1200', 'TV - 1200', 7500, '.', '.', 12, NULL, 5, 1, 4, 23, NULL, '2019-11-05 16:29:03', '2019-11-05 16:29:17', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(72, 'dibaj10', 'dibaj10', NULL, '.', '.', NULL, NULL, 24, 1, 5, 7, NULL, '2019-11-05 16:33:15', '2019-11-05 16:33:27', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(73, 'Dorsino-DS20002', 'Dorsino-DS20002', NULL, 'Washable - 5 Meter', 'Washable - 5 Meter', NULL, NULL, 4, 2, 5, 22, NULL, '2019-11-05 17:00:00', '2019-11-05 17:25:44', 1, 184, 1, NULL, NULL, NULL, NULL, 0),
(74, 'Dream', 'Dream', 27000, 'Sofa 3 8600\nSofa 2 8000\nChair 5000', 'Sofa 3 8600\nSofa 2 8000\nChair 5000', NULL, 'Sofa 3 2.20 cm\nSofa 2 1.70 cm\nChair .80 cm', 27, 1, 4, 27, NULL, '2019-11-05 17:24:53', '2019-11-05 17:25:33', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(75, 'BR 103', 'BR 103', NULL, '.', '.', NULL, NULL, 29, 2, 4, 21, NULL, '2019-11-05 18:27:31', '2019-11-05 18:28:17', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(76, 'BR 104', 'BR 104', NULL, '.', '.', NULL, NULL, 29, 2, 4, 23, NULL, '2019-11-05 18:30:13', '2019-11-05 19:51:03', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(77, 'Aflatus', 'Aflatus', NULL, 'Bedroom (  bed + 2 night stands + dresser with mirror + stool +  wardrobe  )', 'Bedroom (  bed + 2 night stands + dresser with mirror + stool +  wardrobe  )', 12, NULL, 30, 2, 8, 23, NULL, '2019-11-05 19:45:35', '2019-11-06 18:15:50', 1, 3, 4, '230', '225', NULL, NULL, 0),
(78, 'DR 101', 'DR 101', NULL, '.', '.', NULL, NULL, 29, 2, 4, 21, NULL, '2019-11-05 20:11:53', '2019-11-05 20:12:06', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(79, 'Shelton', 'Shelton', 26000, 'Sofa 3 8400\nSofa 2 7400\nChair 5000', 'Sofa 3 8400\nSofa 2 7400\nChair 5000', NULL, 'Sofa 3 2.20 cm\nSofa 2 1.70 cm\nChair .80 cm', 27, 1, 4, 7, NULL, '2019-11-05 20:20:13', '2019-11-05 20:20:26', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(80, 'Dorsino-DS20802', 'Dorsino-DS20802', NULL, 'Washable - 5 Meter', 'Washable - 5 Meter', NULL, NULL, 4, 1, 5, 28, '2019-12-30 11:54:59', '2019-11-05 20:30:49', '2019-12-30 11:54:59', 1, 184, 4, NULL, NULL, NULL, NULL, 0),
(81, 'Zen Foottee/  OF 3005', 'Zen Foottee/  OF 3005', 5950, 'The new Zen foottee is the 1st foot-massager that utilizes tapping & rolling techniques & zen wisdom to let you best foot forward anywhere!', 'The new Zen foottee is the 1st foot-massager that utilizes tapping & rolling techniques & zen wisdom to let you best foot forward anywhere!', 12, NULL, 28, 1, 5, 5, '2019-11-06 23:02:33', '2019-11-05 20:46:27', '2019-11-06 23:02:33', 1, 3, 2, '41', '38', '28', NULL, 0),
(82, 'Oval', 'Oval', NULL, 'Bedroom (bed + 2 night stand + dresser with mirror + wardrobe )', 'Bedroom (bed + 2 night stand + dresser with mirror + wardrobe )', 12, 'Wood Material beech wood & oak veneer                                                                                                                                                                                             \r\nPaint Finish polyurethane', 30, 2, 8, 21, NULL, '2019-11-05 21:20:34', '2019-11-06 18:41:28', 1, 3, 4, '218', '186', NULL, '.', 0),
(83, 'Elite', 'Elite', 0, 'Bedroom (bed + 2 night stand + closed dresser with mirror +   wardrobe )', 'Bedroom (bed + 2 night stand + closed dresser with mirror +   wardrobe )', 12, NULL, 30, 2, 8, 21, NULL, '2019-11-07 15:01:00', '2019-11-07 15:53:04', 1, 3, 4, '46', '68', '60', NULL, 0),
(84, 'Lara  Kids', 'Lara  Kids', NULL, 'Bedroom (   2 beds +  night stand +   opened dresser with mirror  +  wardrobe  )', 'Bedroom (   2 beds +  night stand +   opened dresser with mirror  +  wardrobe  )', 12, 'Wood type beech wood & champagne\r\nPaint Finish champagne', 30, 2, 8, 21, NULL, '2019-11-07 15:07:04', '2019-11-07 15:24:18', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(85, 'luxury', 'luxury', NULL, 'Bedroom (  bed  +  2 night stands +   dresser with mirror )', 'Bedroom (  bed  +  2 night stands +   dresser with mirror )', 12, NULL, 30, 1, 8, 21, NULL, '2019-11-07 15:17:39', '2019-11-07 15:17:50', 1, 3, 4, '234', '240', NULL, NULL, 0),
(86, 'ELITE', 'ELITE', NULL, 'Dining room ( dining table + buffet+ buffet mirror+ display cabinet + 2  arm chair + 6 dining  chairs )', 'Dining room ( dining table + buffet+ buffet mirror+ display cabinet + 2 arm chair + 6 dining  chairs )', 12, 'Wood type beech wood & olive Root veneer Paint Finish polyurethane', 30, 2, 8, 21, NULL, '2019-11-07 15:22:22', '2019-11-07 15:22:53', 1, 3, 4, '240', '120', '80', NULL, 0),
(87, 'Target', 'Target', NULL, 'Sofa set ( 3 seater +2 seater + chair)', 'Sofa set ( 3 seater +2 seater + chair)', 12, 'Material beech wood & fabric\nFabric grey blue', 30, 1, 8, 6, NULL, '2019-11-07 15:37:54', '2019-11-07 15:43:02', 1, 3, 1, NULL, NULL, NULL, NULL, 0),
(88, 'LCC-D-05', 'LCC-D-05', NULL, 'CONSOLE', 'CONSOLE', 12, NULL, 30, 2, 8, 4, NULL, '2019-11-07 15:42:33', '2019-11-07 15:42:49', 1, 3, 4, '52', '173', '86', NULL, 0),
(89, 'LCC-D-02', 'LCC-D-02', NULL, 'CONSOLE', 'CONSOLE', 12, NULL, 30, 2, 8, 21, NULL, '2019-11-07 15:46:57', '2019-11-07 15:47:11', 1, 3, 4, '53', '140', '88', NULL, 0),
(90, 'LCT-D-03-CT', 'LCT-D-03-CT', NULL, 'Center Table', 'Center Table', 12, NULL, 30, 2, 8, 21, NULL, '2019-11-07 15:58:17', '2019-11-07 16:02:18', 1, 3, 4, '78', '140', '53', NULL, 0),
(91, 'Stretch', 'Stretch', NULL, 'Salon ( sofa  +2 arm chair  +  center table +side table)', 'Salon ( sofa  +2 arm chair  +  center table +side table)', 12, 'Material Beech wood & Fabric & Marble', 30, 2, 8, 7, '2019-12-30 16:22:59', '2019-11-07 16:12:40', '2019-12-30 16:22:59', 1, 3, 1, '85', '215', '103', NULL, 0),
(92, 'Royal', 'Royal', NULL, 'Sofa set (3seater sfoa + 2 seater sofa +  1arm chair  +  center table+side table)', 'Sofa set (3seater sfoa + 2 seater sofa +  1arm chair  +  center table+side table)', 12, NULL, 30, 2, 8, 29, NULL, '2019-11-07 16:17:07', '2019-11-07 16:58:24', 1, 3, 1, '115', '200', '75', NULL, 0),
(93, 'Fairfield-FF50301', 'Fairfield-FF50301', NULL, 'Washable - 5 Meter', 'Washable - 5 Meter', NULL, NULL, 4, 1, 5, 13, '2019-12-30 11:53:19', '2019-11-07 20:50:46', '2019-12-30 11:53:19', 1, 184, 4, NULL, NULL, NULL, NULL, 0),
(94, 'G50203a2540338RE_1', 'G50203a2540338RE_1', NULL, 'Model  Royal Keshan 8 colors \nshape Rectangle\nBack_grd Turquoise\nBorder Turquoise\nGeneral Brown', 'Model  Royal Keshan 8 colors \nshape Rectangle\nBack_grd Turquoise\nBorder Turquoise\nGeneral Brown', NULL, NULL, 26, 1, 5, 7, NULL, '2019-11-11 18:12:41', '2019-11-11 18:57:18', 1, 3, 6, '300', '200', NULL, NULL, 0),
(95, 'G50348t1540dbhRE_1', 'G50348t1540dbhRE_1', NULL, 'Model Estate\r\nShape Rectangle\r\nBack_grd Cream\r\nBorder Beige-Light\r\nGeneral Gray-Dark', 'Model Estate\r\nShape Rectangle\r\nBack_grd Cream\r\nBorder Beige-Light\r\nGeneral Gray-Dark', NULL, NULL, 26, 1, 5, 7, NULL, '2019-11-11 18:52:14', '2019-11-11 19:28:50', 1, 3, 5, '300', '200', NULL, NULL, 0),
(96, 'G50319t2540dh2RE_1', 'G50319t2540dh2RE_1', NULL, 'Model Estate \r\nShape Rectangle\r\nBack_grd Cream\r\nBorder Gray-Dark\r\nGeneral Rose', 'Model Estate \r\nShape Rectangle\r\nBack_grd Cream\r\nBorder Gray-Dark\r\nGeneral Rose', NULL, NULL, 26, 1, 5, 7, NULL, '2019-11-11 18:56:42', '2019-11-11 19:28:38', 1, 3, 5, '300', '200', NULL, NULL, 0),
(97, 'G5047503340bb0RE_1', 'G5047503340bb0RE_1', NULL, 'Model andls Shape Rectangle Back_grd Beige-Light Border Beige-Light General Rust', 'Model andls Shape Rectangle Back_grd Beige-Light Border Beige-Light General Rust', NULL, NULL, 26, 1, 5, 7, NULL, '2019-11-11 19:14:50', '2019-11-11 19:23:37', 1, 3, 5, '280', '200', NULL, NULL, 0),
(98, 'G5047520340h5hRE_1', 'G5047520340h5hRE_1', NULL, 'Model andls Shape Rectangle Back_grd Gray-Dark Border Purple-Light General Gray-Dark', 'Model andls Shape Rectangle Back_grd Gray-Dark Border Purple-Light General Gray-Dark', NULL, NULL, 26, 1, 5, 7, NULL, '2019-11-11 19:18:20', '2019-11-11 19:23:15', 1, 3, 5, '280', '200', NULL, NULL, 0),
(99, '1', '1', 0, 'Model jolyt Shape Rectangle Back_grd Gray-Dark Border Purple-Light General Rose', 'Model jolyt Shape Rectangle Back_grd Gray-Dark Border Purple-Light General Rose', 1, NULL, 26, 2, 5, 7, '2019-12-30 15:52:35', '2019-11-11 19:22:15', '2019-12-30 15:52:35', 1, 3, 5, '280', '200', '0', NULL, 0),
(100, 'Product_Test', 'Product_Test', 20000, 'THE THE THE', 'THE THE THE', 3, 'THE THE THE', 44, 1, 4, 5, NULL, '2019-11-27 15:11:29', '2019-11-27 15:11:29', 0, 3, 1, '200', '100', '50', NULL, 0),
(101, 'wall paper101', 'wall paper101', 1200, 'wall paper', 'wall paper', 0, NULL, 4, 1, 5, 7, '2019-12-30 11:29:43', '2019-12-12 17:39:00', '2019-12-30 11:29:43', 1, 3, 4, '100', '65', '200', NULL, 0),
(102, 'dasdasd', 'dasdasdasd', 20000, 'dasdasdd', 'asdasdasdasd', 12, NULL, 45, 1, 4, 18, NULL, '2019-12-26 14:43:06', '2019-12-26 14:44:47', 1, 3, 2, '112', '12', '12', NULL, 0),
(103, '3', '3', NULL, '3', '3', NULL, NULL, 36, 1, 4, 21, '2019-12-26 16:59:48', '2019-12-26 16:35:29', '2019-12-26 16:59:48', 0, 18, 1, NULL, NULL, NULL, NULL, 0),
(104, '4', '4', NULL, '4', '4', NULL, NULL, 36, 1, 5, 20, '2019-12-26 16:59:35', '2019-12-26 16:50:37', '2019-12-26 16:59:35', 0, 3, 3, NULL, NULL, NULL, NULL, 0),
(105, 'showroomoffers', 'showroomoffers', 1, 'showroomoffers', 'showroomoffers', NULL, NULL, 48, 1, 4, 15, NULL, '2019-12-30 15:46:10', '2019-12-30 15:46:10', 0, 3, 3, NULL, NULL, NULL, NULL, 0),
(106, 'offersest', 'offersest', 1000, 'offersest', 'offersest', NULL, NULL, 48, 1, 5, 15, NULL, '2019-12-30 15:54:44', '2019-12-30 15:54:44', 0, 11, 3, NULL, NULL, NULL, NULL, 0),
(107, 'try1', 'try1', 20000, 'bedroom', 'bedroom', 12, NULL, 4, 2, 4, 7, NULL, '2019-12-30 15:58:57', '2019-12-30 15:58:57', 0, 3, 1, NULL, NULL, NULL, NULL, 0),
(108, 'offersest', 'offersest', 1, 'offersest', 'offersest', NULL, NULL, 48, 1, 9, 11, NULL, '2019-12-30 16:01:26', '2019-12-30 16:25:15', 1, 4, 2, NULL, NULL, NULL, NULL, 0),
(109, 'try1', 'try1', 20000, 'bedroom', 'bedroom', 12, NULL, 4, 2, 4, 7, NULL, '2019-12-30 16:04:25', '2020-01-04 01:18:14', 1, 3, 1, '0', '0', '0', NULL, 1),
(110, 'try1', 'try1', 20000, 'tv', 'tv', 12, NULL, 4, 1, 5, 5, NULL, '2019-12-30 16:20:25', '2019-12-30 16:24:17', 1, 3, 2, NULL, NULL, NULL, NULL, 0),
(111, 'test related', 'test related', NULL, '.', '.', NULL, NULL, 47, 1, 4, 7, NULL, '2020-01-06 12:52:14', '2020-01-06 13:00:12', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(112, 'test related1', 'test related1', NULL, '.', '.', NULL, NULL, 47, 1, 4, 7, NULL, '2020-01-06 12:53:16', '2020-01-06 12:59:52', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(113, 'test related2', 'test related2', NULL, '.', '.', NULL, NULL, 47, 1, 4, 7, NULL, '2020-01-06 12:53:57', '2020-01-06 12:59:38', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(114, 'test related3', 'test related3', NULL, '.', '.', NULL, NULL, 49, 1, 4, 7, NULL, '2020-01-06 12:58:04', '2020-01-06 12:59:01', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(115, 'test related4', 'test related4', NULL, '.', '.', NULL, NULL, 49, 1, 4, 7, NULL, '2020-01-06 12:58:56', '2020-01-06 12:59:18', 1, 3, 4, NULL, NULL, NULL, NULL, 0),
(116, 'test related5', 'test related5', 1000, '.dasdasd', '.asdsadasdsad', 12, NULL, 52, 1, 4, 7, NULL, '2020-01-06 13:01:20', '2020-05-04 13:42:33', 1, 3, 5, '12', '12', '12', NULL, 0),
(117, '53', '5', 1, '<p>...</p>', '<p>..........</p>', 0, NULL, 52, 1, 5, 18, NULL, '2020-01-09 12:55:29', '2020-01-09 12:55:46', 1, 15, 2, '0', '0', '0', NULL, 0),
(118, '00', '00', 150000, '<p>0</p>', '<p>0</p>', NULL, NULL, 47, 1, 4, 21, NULL, '2020-01-09 12:59:11', '2020-01-09 12:59:22', 1, 16, 2, NULL, NULL, NULL, NULL, 0),
(119, 'product', 'product', 10000, '<p>jsabdksjabdk&nbsp; &nbsp; kjdasnkdjabsdkj&nbsp;&nbsp;&nbsp;&nbsp;</p><p>dasdhsad</p>', '<p>djashdbjasdbksad</p><p>asdhasbdjasd</p><p>asdhbjhdas</p>', 13, NULL, 52, 2, 10, 22, NULL, '2020-05-03 10:33:29', '2020-05-03 10:33:29', 0, 3, 6, '10', '101', '12', NULL, 0),
(120, 'dasjdhbasbh', 'jbdhasbdjasdb', 10000, '<p>jbdjahbdjas&nbsp; &nbsp; d</p>', '<p>dashdbjhsad</p>', 12, NULL, 52, 2, 11, 30, NULL, '2020-05-03 10:34:49', '2020-05-03 10:34:49', 0, 3, 6, '12', '12', '12', NULL, 0),
(121, 'hgsvahvdjsavhdj', 'jhbdasjhbasd', 5000, '<p>dahsvdjbsahdj&nbsp; &nbsp; uyasgduyasd</p>', '<p>dashgdjasdasd</p>', 12, NULL, 52, 2, 11, 30, NULL, '2020-05-03 10:36:41', '2020-05-03 10:36:41', 0, 3, 6, '12', '12', '12', NULL, 0),
(122, 'dhsabvdjhadsvb', 'jdbasjhbd', 10000, '<p>dasdsabhdjasd</p>', '<p>dashdbjsadsad</p>', 12, NULL, 52, 2, 11, 29, NULL, '2020-05-03 10:40:17', '2020-05-03 10:40:17', 0, 3, 6, '12', '12', '12', NULL, 0),
(123, 'poklsandk', 'kdjsankdsajd', 10000, '<p>dbhsadjaskdjk&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>dasbdkjaskdsakd</p>', 12, NULL, 52, 2, 11, 19, NULL, '2020-05-03 10:50:12', '2020-05-04 08:16:47', 0, 3, 4, '12', '12', '12', 'bad images', 0),
(124, '3213esdasd', '32ddasd', 1000, '<p>dasdasdasd</p>', '<p>dasdasdasd</p>', 12, 'dasdasd', 52, 2, 11, 14, NULL, '2020-05-04 13:14:12', '2020-05-04 13:14:12', 0, 19, 4, '12', '12', '12', NULL, 0),
(125, 'dasasf', 'adfaf', 1000, '<p>adsfasfa</p>', '<p>fafadfdasf</p>', 12, 'adsfasf', 52, 2, 9, 14, NULL, '2020-05-04 13:16:08', '2020-05-04 13:17:07', 1, 18, 3, '12', '12', '12', NULL, 0),
(126, 'eweqwdqw', 'dwqdqwdqw', 1000, '<p>dqwdqwdqwdqwd</p>', '<p>dqwdwqdwqdqwd</p>', 12, NULL, 52, 2, 8, 12, NULL, '2020-05-04 13:23:53', '2020-05-04 13:37:31', 1, 17, 2, '12', '12', '12', NULL, 0),
(127, 'djbsdjh', 'bjhdbjabdhadasd', 10000, '<p>nchbjhbcas&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>camsbckjasbkjcasc</p>', 12, '<p>dasdasd</p>', 27, 1, 4, 4, NULL, '2020-05-14 18:36:17', '2020-05-14 18:36:17', 1, 8, 2, '12', '12', '12', NULL, 0),
(128, 'djbsdjh', 'bjhdbjabdhadasd', 10000, '<p>nchbjhbcas&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>camsbckjasbkjcasc</p>', 12, '<p>dasdasd</p>', 27, 1, 4, 4, NULL, '2020-05-14 18:36:32', '2020-05-14 18:36:32', 1, 8, 2, '12', '12', '12', NULL, 0),
(129, 'djbsdjh', 'bjhdbjabdhadasd', 10000, '<p>nchbjhbcas&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>camsbckjasbkjcasc</p>', 12, '<p>dasdasd</p>', 27, 1, 4, 4, NULL, '2020-05-14 18:36:40', '2020-05-14 18:36:40', 1, 8, 2, '12', '12', '12', NULL, 0),
(130, 'shsbjh', 'sahvsdjvsha', 1000, '<p>ddjbskjdbaskj&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>dasbdkjasdbkasdasd</p>', 12, NULL, 27, 2, 8, 11, NULL, '2020-05-14 18:39:16', '2020-05-14 18:39:16', 1, 11, 2, '12', '12', '12', NULL, 0),
(131, 'xxxxxxxx', 'xxxxxxxxx', 10000, '<p>dasdasd&nbsp; &nbsp; d</p>', '<p>dasdadasd</p>', 1, NULL, 28, 2, 4, 6, NULL, '2020-05-14 18:41:27', '2020-05-14 18:41:27', 1, 12, 3, '1', '1', '1', NULL, 0),
(132, 'dashbdasjhb', 'jhbdsajhdbasjd', 10000, '<p>dasdasdasd</p>', '<p>dasdasdsad</p>', 1, NULL, 25, 1, 4, 12, NULL, '2020-05-14 18:43:42', '2020-05-14 18:43:42', 1, 11, 2, '1', '1', '1', NULL, 0),
(133, 'dashbdasjhb', 'jhbdsajhdbasjd', 10000, '<p>dasdasdasd</p>', '<p>dasdasdsad</p>', 1, NULL, 25, 1, 4, 12, NULL, '2020-05-14 18:46:50', '2020-05-14 18:46:50', 1, 11, 2, '1', '1', '1', NULL, 0),
(134, 'dashbdasjhb', 'jhbdsajhdbasjd', 10000, '<p>dasdasdasd</p>', '<p>dasdasdsad</p>', 1, NULL, 25, 1, 4, 12, NULL, '2020-05-14 18:48:19', '2020-05-14 18:48:19', 1, 11, 2, '1', '1', '1', NULL, 0),
(135, 'test fail', 'test fail', 1000, '<p>dwdqwdqwdqwdqwd</p>', '<p>dqwdqdqwdwqd</p>', 1, NULL, 26, 1, 5, 11, NULL, '2020-05-15 11:01:01', '2020-05-15 11:01:01', 1, 9, 2, '1', '1', '1', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_branches`
--

CREATE TABLE `product_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_branches`
--

INSERT INTO `product_branches` (`id`, `product_id`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 1, 28, NULL, NULL),
(2, 2, 32, NULL, NULL),
(3, 3, 32, NULL, NULL),
(4, 4, 35, NULL, NULL),
(5, 4, 33, NULL, NULL),
(6, 4, 34, NULL, NULL),
(7, 4, 32, NULL, NULL),
(8, 5, 35, NULL, NULL),
(9, 5, 33, NULL, NULL),
(10, 5, 34, NULL, NULL),
(11, 5, 32, NULL, NULL),
(12, 6, 35, NULL, NULL),
(13, 6, 33, NULL, NULL),
(14, 6, 34, NULL, NULL),
(15, 6, 32, NULL, NULL),
(16, 7, 35, NULL, NULL),
(17, 7, 33, NULL, NULL),
(18, 8, 35, NULL, NULL),
(19, 8, 33, NULL, NULL),
(20, 9, 35, NULL, NULL),
(21, 9, 33, NULL, NULL),
(22, 9, 34, NULL, NULL),
(23, 9, 32, NULL, NULL),
(24, 10, 40, NULL, NULL),
(25, 11, 43, NULL, NULL),
(26, 12, 44, NULL, NULL),
(27, 13, 43, NULL, NULL),
(28, 14, 43, NULL, NULL),
(29, 15, 44, NULL, NULL),
(30, 16, 41, NULL, NULL),
(31, 17, 31, NULL, NULL),
(32, 18, 55, NULL, NULL),
(33, 19, 55, NULL, NULL),
(34, 20, 55, NULL, NULL),
(35, 21, 56, NULL, NULL),
(36, 22, 56, NULL, NULL),
(37, 23, 56, NULL, NULL),
(38, 24, 56, NULL, NULL),
(39, 25, 44, NULL, NULL),
(40, 26, 35, NULL, NULL),
(41, 26, 33, NULL, NULL),
(42, 26, 34, NULL, NULL),
(43, 26, 32, NULL, NULL),
(44, 27, 35, NULL, NULL),
(45, 27, 33, NULL, NULL),
(46, 27, 34, NULL, NULL),
(47, 27, 32, NULL, NULL),
(48, 28, 35, NULL, NULL),
(49, 28, 33, NULL, NULL),
(50, 28, 34, NULL, NULL),
(51, 28, 32, NULL, NULL),
(52, 29, 35, NULL, NULL),
(53, 29, 33, NULL, NULL),
(54, 29, 34, NULL, NULL),
(55, 29, 32, NULL, NULL),
(56, 30, 35, NULL, NULL),
(57, 30, 33, NULL, NULL),
(58, 30, 34, NULL, NULL),
(59, 30, 32, NULL, NULL),
(60, 31, 35, NULL, NULL),
(61, 31, 33, NULL, NULL),
(62, 31, 34, NULL, NULL),
(63, 31, 32, NULL, NULL),
(64, 32, 35, NULL, NULL),
(65, 32, 33, NULL, NULL),
(66, 32, 34, NULL, NULL),
(67, 32, 32, NULL, NULL),
(68, 33, 35, NULL, NULL),
(69, 33, 33, NULL, NULL),
(70, 33, 34, NULL, NULL),
(71, 33, 32, NULL, NULL),
(72, 34, 35, NULL, NULL),
(73, 34, 33, NULL, NULL),
(74, 34, 34, NULL, NULL),
(75, 34, 32, NULL, NULL),
(76, 35, 35, NULL, NULL),
(77, 35, 33, NULL, NULL),
(78, 35, 34, NULL, NULL),
(79, 35, 32, NULL, NULL),
(80, 36, 35, NULL, NULL),
(81, 36, 33, NULL, NULL),
(82, 36, 34, NULL, NULL),
(83, 36, 32, NULL, NULL),
(84, 37, 35, NULL, NULL),
(85, 37, 33, NULL, NULL),
(86, 37, 34, NULL, NULL),
(87, 37, 32, NULL, NULL),
(88, 38, 35, NULL, NULL),
(89, 38, 33, NULL, NULL),
(90, 38, 34, NULL, NULL),
(91, 38, 32, NULL, NULL),
(92, 39, 35, NULL, NULL),
(93, 39, 33, NULL, NULL),
(94, 39, 34, NULL, NULL),
(95, 39, 32, NULL, NULL),
(96, 2, 35, NULL, NULL),
(97, 2, 33, NULL, NULL),
(98, 2, 34, NULL, NULL),
(99, 40, 35, NULL, NULL),
(100, 41, 35, NULL, NULL),
(101, 41, 33, NULL, NULL),
(102, 41, 34, NULL, NULL),
(103, 41, 32, NULL, NULL),
(104, 42, 35, NULL, NULL),
(105, 42, 33, NULL, NULL),
(106, 42, 34, NULL, NULL),
(107, 42, 32, NULL, NULL),
(108, 43, 56, NULL, NULL),
(109, 44, 56, NULL, NULL),
(110, 45, 56, NULL, NULL),
(111, 46, 67, NULL, NULL),
(112, 46, 66, NULL, NULL),
(113, 46, 64, NULL, NULL),
(114, 46, 65, NULL, NULL),
(115, 46, 63, NULL, NULL),
(116, 47, 67, NULL, NULL),
(117, 48, 67, NULL, NULL),
(118, 48, 66, NULL, NULL),
(119, 48, 64, NULL, NULL),
(120, 48, 65, NULL, NULL),
(121, 48, 63, NULL, NULL),
(122, 49, 67, NULL, NULL),
(123, 49, 66, NULL, NULL),
(124, 49, 64, NULL, NULL),
(125, 49, 65, NULL, NULL),
(126, 49, 63, NULL, NULL),
(127, 50, 31, NULL, NULL),
(128, 51, 62, NULL, NULL),
(129, 51, 61, NULL, NULL),
(130, 52, 69, NULL, NULL),
(131, 52, 68, NULL, NULL),
(132, 52, 31, NULL, NULL),
(133, 53, 69, NULL, NULL),
(134, 53, 68, NULL, NULL),
(135, 53, 31, NULL, NULL),
(136, 54, 69, NULL, NULL),
(137, 54, 68, NULL, NULL),
(138, 54, 31, NULL, NULL),
(139, 55, 69, NULL, NULL),
(140, 55, 68, NULL, NULL),
(141, 55, 31, NULL, NULL),
(142, 56, 69, NULL, NULL),
(143, 56, 68, NULL, NULL),
(144, 56, 31, NULL, NULL),
(145, 57, 69, NULL, NULL),
(146, 57, 68, NULL, NULL),
(147, 57, 31, NULL, NULL),
(148, 58, 69, NULL, NULL),
(149, 58, 68, NULL, NULL),
(150, 58, 31, NULL, NULL),
(151, 59, 69, NULL, NULL),
(152, 59, 68, NULL, NULL),
(153, 59, 31, NULL, NULL),
(154, 60, 67, NULL, NULL),
(155, 60, 66, NULL, NULL),
(156, 60, 64, NULL, NULL),
(157, 60, 65, NULL, NULL),
(158, 60, 63, NULL, NULL),
(159, 61, 69, NULL, NULL),
(160, 61, 68, NULL, NULL),
(161, 61, 31, NULL, NULL),
(162, 62, 69, NULL, NULL),
(163, 62, 68, NULL, NULL),
(164, 62, 31, NULL, NULL),
(165, 63, 67, NULL, NULL),
(166, 63, 66, NULL, NULL),
(167, 63, 64, NULL, NULL),
(168, 63, 65, NULL, NULL),
(169, 63, 63, NULL, NULL),
(170, 64, 60, NULL, NULL),
(171, 64, 55, NULL, NULL),
(172, 64, 70, NULL, NULL),
(173, 65, 62, NULL, NULL),
(174, 65, 61, NULL, NULL),
(175, 66, 60, NULL, NULL),
(176, 66, 55, NULL, NULL),
(177, 66, 70, NULL, NULL),
(178, 67, 62, NULL, NULL),
(179, 67, 61, NULL, NULL),
(180, 68, 60, NULL, NULL),
(181, 68, 55, NULL, NULL),
(182, 68, 70, NULL, NULL),
(183, 69, 60, NULL, NULL),
(184, 69, 55, NULL, NULL),
(185, 69, 70, NULL, NULL),
(186, 70, 62, NULL, NULL),
(187, 70, 61, NULL, NULL),
(188, 71, 35, NULL, NULL),
(189, 71, 33, NULL, NULL),
(190, 71, 34, NULL, NULL),
(191, 71, 32, NULL, NULL),
(192, 72, 60, NULL, NULL),
(193, 72, 55, NULL, NULL),
(194, 72, 70, NULL, NULL),
(195, 73, 69, NULL, NULL),
(196, 73, 68, NULL, NULL),
(197, 73, 31, NULL, NULL),
(198, 74, 62, NULL, NULL),
(199, 74, 61, NULL, NULL),
(200, 75, 71, NULL, NULL),
(201, 76, 71, NULL, NULL),
(202, 77, 73, NULL, NULL),
(203, 77, 74, NULL, NULL),
(204, 77, 75, NULL, NULL),
(206, 78, 71, NULL, NULL),
(207, 79, 62, NULL, NULL),
(208, 79, 61, NULL, NULL),
(209, 80, 69, NULL, NULL),
(210, 80, 68, NULL, NULL),
(211, 80, 31, NULL, NULL),
(212, 81, 67, NULL, NULL),
(213, 81, 66, NULL, NULL),
(214, 81, 64, NULL, NULL),
(215, 81, 65, NULL, NULL),
(216, 81, 63, NULL, NULL),
(217, 82, 73, NULL, NULL),
(218, 82, 74, NULL, NULL),
(219, 82, 75, NULL, NULL),
(220, 83, 73, NULL, NULL),
(221, 83, 74, NULL, NULL),
(222, 83, 75, NULL, NULL),
(223, 84, 73, NULL, NULL),
(224, 84, 74, NULL, NULL),
(225, 84, 75, NULL, NULL),
(226, 85, 73, NULL, NULL),
(227, 85, 74, NULL, NULL),
(228, 85, 75, NULL, NULL),
(229, 86, 73, NULL, NULL),
(230, 86, 74, NULL, NULL),
(231, 86, 75, NULL, NULL),
(232, 87, 73, NULL, NULL),
(233, 87, 74, NULL, NULL),
(234, 87, 75, NULL, NULL),
(235, 88, 73, NULL, NULL),
(236, 88, 74, NULL, NULL),
(237, 88, 75, NULL, NULL),
(238, 89, 73, NULL, NULL),
(239, 89, 74, NULL, NULL),
(240, 89, 75, NULL, NULL),
(241, 90, 73, NULL, NULL),
(242, 90, 74, NULL, NULL),
(243, 90, 75, NULL, NULL),
(244, 91, 73, NULL, NULL),
(245, 91, 74, NULL, NULL),
(246, 91, 75, NULL, NULL),
(247, 92, 73, NULL, NULL),
(248, 92, 74, NULL, NULL),
(249, 92, 75, NULL, NULL),
(250, 93, 69, NULL, NULL),
(251, 93, 68, NULL, NULL),
(252, 93, 31, NULL, NULL),
(253, 94, 57, NULL, NULL),
(254, 94, 72, NULL, NULL),
(255, 95, 57, NULL, NULL),
(256, 95, 72, NULL, NULL),
(257, 96, 57, NULL, NULL),
(258, 96, 72, NULL, NULL),
(259, 97, 57, NULL, NULL),
(260, 97, 72, NULL, NULL),
(261, 98, 57, NULL, NULL),
(262, 98, 72, NULL, NULL),
(263, 99, 57, NULL, NULL),
(264, 99, 72, NULL, NULL),
(265, 100, 90, NULL, NULL),
(266, 101, 69, NULL, NULL),
(267, 101, 68, NULL, NULL),
(268, 101, 31, NULL, NULL),
(269, 102, 91, NULL, NULL),
(270, 103, 82, NULL, NULL),
(271, 104, 82, NULL, NULL),
(272, 105, 94, NULL, NULL),
(273, 106, 94, NULL, NULL),
(274, 107, 69, NULL, NULL),
(275, 107, 68, NULL, NULL),
(276, 107, 31, NULL, NULL),
(277, 108, 94, NULL, NULL),
(281, 110, 69, NULL, NULL),
(282, 109, 97, NULL, NULL),
(283, 111, 93, NULL, NULL),
(284, 112, 93, NULL, NULL),
(285, 113, 93, NULL, NULL),
(286, 114, 95, NULL, NULL),
(287, 115, 95, NULL, NULL),
(289, 117, 95, NULL, NULL),
(290, 118, 93, NULL, NULL),
(291, 119, 100, NULL, NULL),
(292, 120, 100, NULL, NULL),
(293, 121, 100, NULL, NULL),
(294, 122, 100, NULL, NULL),
(295, 123, 100, NULL, NULL),
(296, 124, 106, NULL, NULL),
(297, 125, 106, NULL, NULL),
(298, 126, 106, NULL, NULL),
(299, 116, 106, NULL, NULL),
(300, 127, 62, NULL, NULL),
(301, 127, 61, NULL, NULL),
(302, 128, 62, NULL, NULL),
(303, 128, 61, NULL, NULL),
(304, 129, 62, NULL, NULL),
(305, 129, 61, NULL, NULL),
(306, 130, 62, NULL, NULL),
(307, 130, 61, NULL, NULL),
(308, 131, 66, NULL, NULL),
(309, 131, 65, NULL, NULL),
(310, 135, 57, NULL, NULL),
(311, 135, 72, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, NULL, NULL),
(2, 1, 26, NULL, NULL),
(3, 1, 27, NULL, NULL),
(5, 3, 19, NULL, NULL),
(6, 2, 11, NULL, NULL),
(7, 4, 19, NULL, NULL),
(9, 5, 19, NULL, NULL),
(10, 6, 6, NULL, NULL),
(11, 7, 12, NULL, NULL),
(12, 7, 20, NULL, NULL),
(13, 7, 21, NULL, NULL),
(14, 8, 5, NULL, NULL),
(17, 9, 30, NULL, NULL),
(18, 10, 5, NULL, NULL),
(19, 10, 8, NULL, NULL),
(20, 10, 9, NULL, NULL),
(21, 11, 6, NULL, NULL),
(22, 11, 5, NULL, NULL),
(23, 11, 8, NULL, NULL),
(24, 12, 9, NULL, NULL),
(25, 13, 6, NULL, NULL),
(26, 13, 5, NULL, NULL),
(27, 13, 8, NULL, NULL),
(28, 14, 5, NULL, NULL),
(29, 15, 8, NULL, NULL),
(30, 16, 5, NULL, NULL),
(31, 17, 9, NULL, NULL),
(32, 18, 20, NULL, NULL),
(33, 18, 24, NULL, NULL),
(34, 18, 26, NULL, NULL),
(35, 19, 13, NULL, NULL),
(36, 19, 24, NULL, NULL),
(37, 19, 26, NULL, NULL),
(38, 20, 13, NULL, NULL),
(39, 20, 24, NULL, NULL),
(40, 20, 26, NULL, NULL),
(41, 21, 24, NULL, NULL),
(42, 21, 26, NULL, NULL),
(43, 21, 35, NULL, NULL),
(44, 22, 20, NULL, NULL),
(45, 22, 24, NULL, NULL),
(46, 22, 26, NULL, NULL),
(47, 23, 24, NULL, NULL),
(48, 23, 26, NULL, NULL),
(49, 23, 35, NULL, NULL),
(50, 24, 20, NULL, NULL),
(51, 24, 24, NULL, NULL),
(52, 24, 26, NULL, NULL),
(53, 25, 5, NULL, NULL),
(54, 26, 25, NULL, NULL),
(55, 27, 5, NULL, NULL),
(57, 29, 40, NULL, NULL),
(60, 32, 40, NULL, NULL),
(61, 33, 6, NULL, NULL),
(62, 34, 6, NULL, NULL),
(63, 35, 6, NULL, NULL),
(64, 36, 12, NULL, NULL),
(68, 40, 5, NULL, NULL),
(69, 41, 41, NULL, NULL),
(71, 43, 20, NULL, NULL),
(72, 43, 24, NULL, NULL),
(73, 43, 26, NULL, NULL),
(75, 44, 20, NULL, NULL),
(76, 44, 24, NULL, NULL),
(77, 44, 26, NULL, NULL),
(78, 45, 20, NULL, NULL),
(79, 45, 24, NULL, NULL),
(80, 45, 26, NULL, NULL),
(85, 50, 28, NULL, NULL),
(86, 51, 28, NULL, NULL),
(87, 52, 15, NULL, NULL),
(88, 53, 6, NULL, NULL),
(89, 54, 6, NULL, NULL),
(90, 55, 15, NULL, NULL),
(91, 56, 15, NULL, NULL),
(92, 57, 15, NULL, NULL),
(96, 61, 15, NULL, NULL),
(97, 62, 15, NULL, NULL),
(99, 64, 20, NULL, NULL),
(100, 64, 24, NULL, NULL),
(101, 64, 26, NULL, NULL),
(102, 65, 10, NULL, NULL),
(103, 65, 13, NULL, NULL),
(104, 65, 19, NULL, NULL),
(105, 66, 20, NULL, NULL),
(106, 66, 24, NULL, NULL),
(107, 66, 26, NULL, NULL),
(108, 67, 10, NULL, NULL),
(109, 67, 13, NULL, NULL),
(110, 67, 19, NULL, NULL),
(111, 68, 20, NULL, NULL),
(112, 68, 24, NULL, NULL),
(113, 68, 26, NULL, NULL),
(114, 69, 20, NULL, NULL),
(115, 69, 24, NULL, NULL),
(116, 69, 26, NULL, NULL),
(117, 70, 10, NULL, NULL),
(118, 70, 13, NULL, NULL),
(119, 70, 19, NULL, NULL),
(120, 71, 30, NULL, NULL),
(121, 72, 20, NULL, NULL),
(122, 72, 24, NULL, NULL),
(123, 72, 26, NULL, NULL),
(124, 73, 15, NULL, NULL),
(125, 74, 10, NULL, NULL),
(126, 74, 13, NULL, NULL),
(127, 74, 19, NULL, NULL),
(128, 59, 15, NULL, NULL),
(129, 58, 15, NULL, NULL),
(131, 42, 5, NULL, NULL),
(132, 37, 12, NULL, NULL),
(133, 38, 12, NULL, NULL),
(134, 39, 12, NULL, NULL),
(135, 31, 40, NULL, NULL),
(136, 28, 5, NULL, NULL),
(137, 30, 5, NULL, NULL),
(138, 75, 5, NULL, NULL),
(140, 77, 5, NULL, NULL),
(141, 78, 6, NULL, NULL),
(142, 76, 5, NULL, NULL),
(143, 79, 10, NULL, NULL),
(144, 79, 13, NULL, NULL),
(145, 79, 19, NULL, NULL),
(146, 80, 15, NULL, NULL),
(147, 47, 43, NULL, NULL),
(148, 81, 43, NULL, NULL),
(149, 82, 5, NULL, NULL),
(150, 46, 43, NULL, NULL),
(151, 48, 43, NULL, NULL),
(152, 49, 43, NULL, NULL),
(153, 60, 43, NULL, NULL),
(154, 63, 43, NULL, NULL),
(155, 83, 5, NULL, NULL),
(158, 86, 6, NULL, NULL),
(159, 85, 5, NULL, NULL),
(160, 84, 5, NULL, NULL),
(161, 87, 10, NULL, NULL),
(162, 87, 13, NULL, NULL),
(163, 87, 19, NULL, NULL),
(164, 88, 8, NULL, NULL),
(166, 90, 9, NULL, NULL),
(167, 91, 11, NULL, NULL),
(168, 91, 13, NULL, NULL),
(169, 91, 19, NULL, NULL),
(171, 92, 11, NULL, NULL),
(172, 92, 13, NULL, NULL),
(173, 92, 19, NULL, NULL),
(174, 89, 8, NULL, NULL),
(175, 93, 15, NULL, NULL),
(176, 94, 14, NULL, NULL),
(177, 95, 14, NULL, NULL),
(179, 97, 14, NULL, NULL),
(182, 98, 14, NULL, NULL),
(183, 99, 14, NULL, NULL),
(184, 96, 14, NULL, NULL),
(185, 100, 6, NULL, NULL),
(186, 100, 5, NULL, NULL),
(187, 100, 9, NULL, NULL),
(188, 101, 15, NULL, NULL),
(189, 102, 8, NULL, NULL),
(190, 102, 9, NULL, NULL),
(191, 103, 8, NULL, NULL),
(192, 104, 6, NULL, NULL),
(193, 105, 8, NULL, NULL),
(194, 106, 9, NULL, NULL),
(195, 107, 5, NULL, NULL),
(196, 108, 10, NULL, NULL),
(197, 109, 5, NULL, NULL),
(198, 110, 6, NULL, NULL),
(199, 111, 44, NULL, NULL),
(200, 112, 44, NULL, NULL),
(201, 113, 44, NULL, NULL),
(202, 114, 44, NULL, NULL),
(203, 115, 44, NULL, NULL),
(205, 117, 6, NULL, NULL),
(206, 118, 8, NULL, NULL),
(207, 119, 24, NULL, NULL),
(208, 119, 27, NULL, NULL),
(209, 120, 24, NULL, NULL),
(210, 120, 27, NULL, NULL),
(211, 121, 19, NULL, NULL),
(212, 121, 24, NULL, NULL),
(213, 122, 6, NULL, NULL),
(214, 122, 19, NULL, NULL),
(215, 123, 6, NULL, NULL),
(216, 123, 19, NULL, NULL),
(217, 124, 24, NULL, NULL),
(218, 124, 26, NULL, NULL),
(219, 124, 27, NULL, NULL),
(220, 125, 24, NULL, NULL),
(221, 125, 27, NULL, NULL),
(222, 126, 24, NULL, NULL),
(223, 126, 26, NULL, NULL),
(224, 126, 27, NULL, NULL),
(225, 116, 6, NULL, NULL),
(226, 116, 19, NULL, NULL),
(227, 127, 8, NULL, NULL),
(228, 127, 9, NULL, NULL),
(229, 128, 8, NULL, NULL),
(230, 128, 9, NULL, NULL),
(231, 129, 8, NULL, NULL),
(232, 129, 9, NULL, NULL),
(233, 130, 10, NULL, NULL),
(234, 130, 14, NULL, NULL),
(235, 130, 18, NULL, NULL),
(236, 131, 9, NULL, NULL),
(237, 131, 10, NULL, NULL),
(238, 135, 8, NULL, NULL),
(239, 135, 10, NULL, NULL),
(240, 135, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `comment`, `image`, `created_at`, `updated_at`) VALUES
(18, 108, 4, 'comment', NULL, '2020-01-05 00:38:43', '2020-01-05 00:38:43'),
(19, 108, 4, '1', NULL, '2020-01-05 00:42:04', '2020-01-05 00:42:04'),
(20, 108, 4, '2', NULL, '2020-01-05 00:42:14', '2020-01-05 00:42:14'),
(21, 108, 4, '3', NULL, '2020-01-05 00:42:22', '2020-01-05 00:42:22'),
(22, 109, 4, 'gaegag', NULL, '2020-01-09 13:53:44', '2020-01-09 13:53:44'),
(23, 109, 4, 'cvbnm', NULL, '2020-01-09 13:54:11', '2020-01-09 13:54:11'),
(24, 109, 4, 'cvbnm', NULL, '2020-01-09 13:54:14', '2020-01-09 13:54:14'),
(25, 109, 4, 'cvbnm', NULL, '2020-01-09 13:54:27', '2020-01-09 13:54:27'),
(26, 109, 4, 'cvbnm', NULL, '2020-01-09 13:54:52', '2020-01-09 13:54:52'),
(27, 109, 4, 'cvbnm', NULL, '2020-01-09 13:54:54', '2020-01-09 13:54:54'),
(28, 109, 4, 'cvbnm', NULL, '2020-01-09 13:54:57', '2020-01-09 13:54:57'),
(29, 109, 4, 'cvbnm', NULL, '2020-01-09 13:54:58', '2020-01-09 13:54:58'),
(30, 75, 4, 'i want this please', NULL, '2020-01-26 17:03:25', '2020-01-26 17:03:25'),
(31, 92, 44, 'Yes it is good one', NULL, '2020-04-08 15:35:15', '2020-04-08 15:35:15'),
(32, 94, 32, 'test', NULL, '2020-05-04 09:34:44', '2020-05-04 09:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_comment_likes`
--

CREATE TABLE `product_comment_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_comment_replies`
--

CREATE TABLE `product_comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_comment_replies`
--

INSERT INTO `product_comment_replies` (`id`, `comment_id`, `user_id`, `reply`, `created_at`, `updated_at`) VALUES
(8, 18, 4, '123', '2020-01-05 00:40:12', '2020-01-05 00:40:12'),
(9, 32, 32, 'cdscdsdsf', '2020-05-04 10:07:52', '2020-05-04 10:07:52'),
(10, 32, 32, 'dasdasdasd', '2020-05-04 10:10:27', '2020-05-04 10:10:27'),
(11, 32, 32, 'test', '2020-05-04 10:13:04', '2020-05-04 10:13:04'),
(12, 32, 32, 'ffsdfdsfsdf', '2020-05-04 10:13:18', '2020-05-04 10:13:18'),
(13, 32, 32, 'fdsfdsfdsfdsf', '2020-05-04 10:14:14', '2020-05-04 10:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '15692382945d88ad16e295a.png', '2019-09-23 15:31:35', '2019-09-23 15:31:35'),
(2, 2, '15714981715dab28bb6f8e4.jpeg', '2019-10-19 21:16:11', '2019-10-19 21:16:11'),
(3, 2, '15714981715dab28bb7f82c.jpeg', '2019-10-19 21:16:11', '2019-10-19 21:16:11'),
(4, 2, '15714981715dab28bb8948d.jpeg', '2019-10-19 21:16:11', '2019-10-19 21:16:11'),
(5, 2, '15714981715dab28bb93439.jpeg', '2019-10-19 21:16:11', '2019-10-19 21:16:11'),
(6, 3, '15715725565dac4b4c4e8c5.jpeg', '2019-10-20 17:55:56', '2019-10-20 17:55:56'),
(7, 3, '15715725565dac4b4c62d08.jpeg', '2019-10-20 17:55:56', '2019-10-20 17:55:56'),
(8, 3, '15715725565dac4b4c6b91f.jpeg', '2019-10-20 17:55:56', '2019-10-20 17:55:56'),
(9, 3, '15715725565dac4b4c74294.jpeg', '2019-10-20 17:55:56', '2019-10-20 17:55:56'),
(10, 4, '15715790055dac647dc3457.jpeg', '2019-10-20 19:43:25', '2019-10-20 19:43:25'),
(11, 4, '15715790055dac647dd0b5a.jpeg', '2019-10-20 19:43:25', '2019-10-20 19:43:25'),
(12, 4, '15715790055dac647ddabef.jpeg', '2019-10-20 19:43:25', '2019-10-20 19:43:25'),
(13, 5, '15715799815dac684d05551.jpeg', '2019-10-20 19:59:41', '2019-10-20 19:59:41'),
(14, 5, '15715799815dac684d1172e.jpeg', '2019-10-20 19:59:41', '2019-10-20 19:59:41'),
(15, 5, '15715799815dac684d1a860.jpeg', '2019-10-20 19:59:41', '2019-10-20 19:59:41'),
(16, 6, '15716633265dadadde12a33.jpeg', '2019-10-21 19:08:46', '2019-10-21 19:08:46'),
(17, 6, '15716633265dadadde20800.jpeg', '2019-10-21 19:08:46', '2019-10-21 19:08:46'),
(18, 6, '15716633265dadadde2ba3a.jpeg', '2019-10-21 19:08:46', '2019-10-21 19:08:46'),
(19, 6, '15716633265dadadde360d7.jpeg', '2019-10-21 19:08:46', '2019-10-21 19:08:46'),
(20, 6, '15716633265dadadde404e4.jpeg', '2019-10-21 19:08:46', '2019-10-21 19:08:46'),
(21, 7, '15718213915db0174fd0926.jpeg', '2019-10-23 15:03:11', '2019-10-23 15:03:11'),
(22, 7, '15718213915db0174fdd479.jpeg', '2019-10-23 15:03:11', '2019-10-23 15:03:11'),
(23, 7, '15718213915db0174fe7188.jpeg', '2019-10-23 15:03:11', '2019-10-23 15:03:11'),
(24, 7, '15718213915db0174ff0360.jpeg', '2019-10-23 15:03:12', '2019-10-23 15:03:12'),
(25, 7, '15718213925db0175006617.jpeg', '2019-10-23 15:03:12', '2019-10-23 15:03:12'),
(26, 8, '15718290685db0354ccb65f.jpeg', '2019-10-23 17:11:08', '2019-10-23 17:11:08'),
(31, 9, '15722657705db6df2a259a1.jpeg', '2019-10-28 18:29:30', '2019-10-28 18:29:30'),
(32, 9, '15722657705db6df2a37394.jpeg', '2019-10-28 18:29:30', '2019-10-28 18:29:30'),
(33, 9, '15722657705db6df2a3fa8e.jpeg', '2019-10-28 18:29:30', '2019-10-28 18:29:30'),
(34, 10, '15723635565db85d24577b2.jpg', '2019-10-29 21:39:16', '2019-10-29 21:39:16'),
(35, 10, '15723635565db85d24664c2.jpg', '2019-10-29 21:39:16', '2019-10-29 21:39:16'),
(36, 10, '15723635565db85d246e134.jpg', '2019-10-29 21:39:16', '2019-10-29 21:39:16'),
(37, 10, '15723635565db85d2476d14.jpg', '2019-10-29 21:39:16', '2019-10-29 21:39:16'),
(38, 10, '15723635565db85d247ea02.jpg', '2019-10-29 21:39:16', '2019-10-29 21:39:16'),
(39, 11, '15724300565db960e887ede.jpeg', '2019-10-30 16:07:36', '2019-10-30 16:07:36'),
(40, 11, '15724300565db960e894a68.jpeg', '2019-10-30 16:07:36', '2019-10-30 16:07:36'),
(41, 11, '15724300565db960e89e59e.jpeg', '2019-10-30 16:07:36', '2019-10-30 16:07:36'),
(42, 11, '15724300565db960e8a8446.jpeg', '2019-10-30 16:07:36', '2019-10-30 16:07:36'),
(43, 12, '15724340695db97095b36c7.jpg', '2019-10-30 17:14:29', '2019-10-30 17:14:29'),
(44, 13, '15724401385db9884a6e450.jpeg', '2019-10-30 18:55:38', '2019-10-30 18:55:38'),
(45, 13, '15724401385db9884a7c9de.jpeg', '2019-10-30 18:55:38', '2019-10-30 18:55:38'),
(46, 13, '15724401385db9884a871aa.jpeg', '2019-10-30 18:55:38', '2019-10-30 18:55:38'),
(47, 13, '15724401385db9884a91912.jpeg', '2019-10-30 18:55:38', '2019-10-30 18:55:38'),
(48, 13, '15724401385db9884a9d647.jpeg', '2019-10-30 18:55:38', '2019-10-30 18:55:38'),
(49, 14, '15724406575db98a51f23ec.jpeg', '2019-10-30 19:04:18', '2019-10-30 19:04:18'),
(50, 14, '15724406585db98a520b36c.jpeg', '2019-10-30 19:04:18', '2019-10-30 19:04:18'),
(51, 14, '15724406585db98a52150d8.jpeg', '2019-10-30 19:04:18', '2019-10-30 19:04:18'),
(52, 15, '15724465935db9a181c7e80.jpeg', '2019-10-30 20:43:13', '2019-10-30 20:43:13'),
(53, 16, '15724474025db9a4aa7e270.jpeg', '2019-10-30 20:56:42', '2019-10-30 20:56:42'),
(54, 17, '15724475525db9a54055d28.jpeg', '2019-10-30 20:59:12', '2019-10-30 20:59:12'),
(55, 18, '15724737605dba0ba023698.jpg', '2019-10-31 04:16:00', '2019-10-31 04:16:00'),
(56, 18, '15724737605dba0ba02f20f.jpg', '2019-10-31 04:16:00', '2019-10-31 04:16:00'),
(57, 19, '15724742435dba0d8379a48.jpg', '2019-10-31 04:24:03', '2019-10-31 04:24:03'),
(58, 20, '15724745245dba0e9c74510.jpg', '2019-10-31 04:28:44', '2019-10-31 04:28:44'),
(60, 20, '15724791035dba207f3bc6e.png', '2019-10-31 05:45:03', '2019-10-31 05:45:03'),
(62, 21, '15724808615dba275dac084.jpg', '2019-10-31 06:14:21', '2019-10-31 06:14:21'),
(63, 21, '15724808615dba275db54d8.jpg', '2019-10-31 06:14:21', '2019-10-31 06:14:21'),
(64, 21, '15724808615dba275dbe601.jpg', '2019-10-31 06:14:21', '2019-10-31 06:14:21'),
(65, 21, '15724808615dba275dc2806.jpg', '2019-10-31 06:14:21', '2019-10-31 06:14:21'),
(66, 22, '15724812445dba28dc79a88.jpg', '2019-10-31 06:20:44', '2019-10-31 06:20:44'),
(67, 22, '15724812445dba28dc8b22f.jpg', '2019-10-31 06:20:44', '2019-10-31 06:20:44'),
(68, 22, '15724812445dba28dc8f5a8.jpg', '2019-10-31 06:20:44', '2019-10-31 06:20:44'),
(69, 22, '15724812445dba28dc992a3.jpg', '2019-10-31 06:20:44', '2019-10-31 06:20:44'),
(70, 23, '15724815845dba2a30cb2be.jpg', '2019-10-31 06:26:24', '2019-10-31 06:26:24'),
(71, 23, '15724815845dba2a30dd446.jpg', '2019-10-31 06:26:24', '2019-10-31 06:26:24'),
(72, 23, '15724815845dba2a30e1bb7.jpg', '2019-10-31 06:26:24', '2019-10-31 06:26:24'),
(73, 23, '15724815845dba2a30eb96a.jpg', '2019-10-31 06:26:24', '2019-10-31 06:26:24'),
(74, 24, '15724816955dba2a9f11fab.jpg', '2019-10-31 06:28:15', '2019-10-31 06:28:15'),
(75, 24, '15724816955dba2a9f1885b.jpg', '2019-10-31 06:28:15', '2019-10-31 06:28:15'),
(76, 24, '15724816955dba2a9f1ca27.jpg', '2019-10-31 06:28:15', '2019-10-31 06:28:15'),
(77, 24, '15724816955dba2a9f2700e.jpg', '2019-10-31 06:28:15', '2019-10-31 06:28:15'),
(78, 25, '15725101465dba99c297fc8.jpeg', '2019-10-31 14:22:26', '2019-10-31 14:22:26'),
(79, 25, '15725101465dba99c2b0db6.jpeg', '2019-10-31 14:22:26', '2019-10-31 14:22:26'),
(80, 25, '15725101465dba99c2bb992.jpeg', '2019-10-31 14:22:26', '2019-10-31 14:22:26'),
(81, 25, '15725101465dba99c2c4ce9.jpeg', '2019-10-31 14:22:26', '2019-10-31 14:22:26'),
(82, 25, '15725101465dba99c2cdf42.jpeg', '2019-10-31 14:22:26', '2019-10-31 14:22:26'),
(83, 26, '15725135575dbaa71548627.jpeg', '2019-10-31 15:19:17', '2019-10-31 15:19:17'),
(84, 26, '15725135575dbaa71554ef7.jpeg', '2019-10-31 15:19:17', '2019-10-31 15:19:17'),
(85, 26, '15725135575dbaa7155daee.jpeg', '2019-10-31 15:19:17', '2019-10-31 15:19:17'),
(86, 26, '15725135575dbaa7156691d.jpeg', '2019-10-31 15:19:17', '2019-10-31 15:19:17'),
(87, 27, '15725188495dbabbc118918.jpeg', '2019-10-31 16:47:29', '2019-10-31 16:47:29'),
(88, 27, '15725188495dbabbc125067.jpeg', '2019-10-31 16:47:29', '2019-10-31 16:47:29'),
(89, 27, '15725188495dbabbc12e264.jpeg', '2019-10-31 16:47:29', '2019-10-31 16:47:29'),
(90, 28, '15725194855dbabe3d60b71.jpeg', '2019-10-31 16:58:05', '2019-10-31 16:58:05'),
(91, 28, '15725194855dbabe3d6deba.jpeg', '2019-10-31 16:58:05', '2019-10-31 16:58:05'),
(92, 28, '15725194855dbabe3d77210.jpeg', '2019-10-31 16:58:05', '2019-10-31 16:58:05'),
(93, 28, '15725194855dbabe3d80f6a.jpeg', '2019-10-31 16:58:05', '2019-10-31 16:58:05'),
(94, 28, '15725194855dbabe3d8aadd.jpeg', '2019-10-31 16:58:05', '2019-10-31 16:58:05'),
(95, 29, '15725214975dbac61971e95.jpeg', '2019-10-31 17:31:37', '2019-10-31 17:31:37'),
(96, 29, '15725214975dbac6197f24f.jpeg', '2019-10-31 17:31:37', '2019-10-31 17:31:37'),
(97, 29, '15725214975dbac61988b68.jpeg', '2019-10-31 17:31:37', '2019-10-31 17:31:37'),
(98, 29, '15725214975dbac619922a3.jpeg', '2019-10-31 17:31:37', '2019-10-31 17:31:37'),
(99, 30, '15725215275dbac6372b078.jpeg', '2019-10-31 17:32:07', '2019-10-31 17:32:07'),
(100, 30, '15725215275dbac6373902b.jpeg', '2019-10-31 17:32:07', '2019-10-31 17:32:07'),
(101, 30, '15725215275dbac637448b2.jpeg', '2019-10-31 17:32:07', '2019-10-31 17:32:07'),
(102, 30, '15725215275dbac6374e415.jpeg', '2019-10-31 17:32:07', '2019-10-31 17:32:07'),
(103, 30, '15725215275dbac6375772e.jpeg', '2019-10-31 17:32:07', '2019-10-31 17:32:07'),
(104, 31, '15725219015dbac7ad4b16e.jpeg', '2019-10-31 17:38:21', '2019-10-31 17:38:21'),
(105, 31, '15725219015dbac7ad5d34b.jpeg', '2019-10-31 17:38:21', '2019-10-31 17:38:21'),
(106, 32, '15725224785dbac9ee1a6c9.jpeg', '2019-10-31 17:47:58', '2019-10-31 17:47:58'),
(107, 32, '15725224785dbac9ee27bc0.jpeg', '2019-10-31 17:47:58', '2019-10-31 17:47:58'),
(108, 32, '15725224785dbac9ee314ce.jpeg', '2019-10-31 17:47:58', '2019-10-31 17:47:58'),
(109, 32, '15725224785dbac9ee3ad4c.jpeg', '2019-10-31 17:47:58', '2019-10-31 17:47:58'),
(110, 33, '15725230815dbacc4909e47.jpeg', '2019-10-31 17:58:01', '2019-10-31 17:58:01'),
(111, 33, '15725230815dbacc4918db0.jpeg', '2019-10-31 17:58:01', '2019-10-31 17:58:01'),
(112, 33, '15725230815dbacc4922e6e.jpeg', '2019-10-31 17:58:01', '2019-10-31 17:58:01'),
(113, 33, '15725230815dbacc492e9d3.jpeg', '2019-10-31 17:58:01', '2019-10-31 17:58:01'),
(114, 34, '15725240455dbad00d27c00.jpeg', '2019-10-31 18:14:05', '2019-10-31 18:14:05'),
(115, 34, '15725240455dbad00d36849.jpeg', '2019-10-31 18:14:05', '2019-10-31 18:14:05'),
(116, 34, '15725240455dbad00d40f0c.jpeg', '2019-10-31 18:14:05', '2019-10-31 18:14:05'),
(117, 34, '15725240455dbad00d4b91b.jpeg', '2019-10-31 18:14:05', '2019-10-31 18:14:05'),
(118, 34, '15725240455dbad00d56647.jpeg', '2019-10-31 18:14:05', '2019-10-31 18:14:05'),
(119, 35, '15725242445dbad0d430348.jpeg', '2019-10-31 18:17:24', '2019-10-31 18:17:24'),
(120, 35, '15725242445dbad0d43c68e.jpeg', '2019-10-31 18:17:24', '2019-10-31 18:17:24'),
(121, 36, '15725246755dbad283c87a0.jpeg', '2019-10-31 18:24:35', '2019-10-31 18:24:35'),
(122, 36, '15725246755dbad283dd85b.jpeg', '2019-10-31 18:24:35', '2019-10-31 18:24:35'),
(123, 36, '15725246755dbad283e9c80.jpeg', '2019-10-31 18:24:35', '2019-10-31 18:24:35'),
(124, 36, '15725246755dbad283f3e98.jpeg', '2019-10-31 18:24:36', '2019-10-31 18:24:36'),
(125, 36, '15725246765dbad28409f36.jpeg', '2019-10-31 18:24:36', '2019-10-31 18:24:36'),
(126, 37, '15725251435dbad457cfbb4.jpeg', '2019-10-31 18:32:23', '2019-10-31 18:32:23'),
(127, 37, '15725251435dbad457ddda9.jpeg', '2019-10-31 18:32:23', '2019-10-31 18:32:23'),
(128, 37, '15725251435dbad457e820f.jpeg', '2019-10-31 18:32:23', '2019-10-31 18:32:23'),
(129, 38, '15725254035dbad55b5a87e.jpeg', '2019-10-31 18:36:43', '2019-10-31 18:36:43'),
(130, 38, '15725254035dbad55b68b56.jpeg', '2019-10-31 18:36:43', '2019-10-31 18:36:43'),
(131, 38, '15725254035dbad55b72fbb.jpeg', '2019-10-31 18:36:43', '2019-10-31 18:36:43'),
(132, 39, '15725258395dbad70fb39fe.jpeg', '2019-10-31 18:43:59', '2019-10-31 18:43:59'),
(133, 39, '15725258395dbad70fc12b7.jpeg', '2019-10-31 18:43:59', '2019-10-31 18:43:59'),
(134, 39, '15725258395dbad70fcb2b7.jpeg', '2019-10-31 18:43:59', '2019-10-31 18:43:59'),
(135, 40, '15725260765dbad7fc700ef.png', '2019-10-31 18:47:56', '2019-10-31 18:47:56'),
(136, 40, '15725260765dbad7fc824da.jpeg', '2019-10-31 18:47:56', '2019-10-31 18:47:56'),
(137, 40, '15725260765dbad7fc8b978.jpeg', '2019-10-31 18:47:56', '2019-10-31 18:47:56'),
(138, 40, '15725260765dbad7fc95003.jpeg', '2019-10-31 18:47:56', '2019-10-31 18:47:56'),
(139, 41, '15725263365dbad900d0d87.jpeg', '2019-10-31 18:52:16', '2019-10-31 18:52:16'),
(140, 41, '15725263365dbad900dd3f7.jpeg', '2019-10-31 18:52:16', '2019-10-31 18:52:16'),
(141, 41, '15725263365dbad900e99c1.jpeg', '2019-10-31 18:52:16', '2019-10-31 18:52:16'),
(142, 41, '15725263365dbad900f25c4.jpeg', '2019-10-31 18:52:17', '2019-10-31 18:52:17'),
(143, 42, '15725264965dbad9a03fad2.jpeg', '2019-10-31 18:54:56', '2019-10-31 18:54:56'),
(144, 42, '15725264965dbad9a04bff7.jpeg', '2019-10-31 18:54:56', '2019-10-31 18:54:56'),
(145, 42, '15725264965dbad9a054eae.jpeg', '2019-10-31 18:54:56', '2019-10-31 18:54:56'),
(146, 43, '15726277185dbc65067cc49.jpg', '2019-11-01 23:01:58', '2019-11-01 23:01:58'),
(147, 43, '15726277185dbc650689083.jpg', '2019-11-01 23:01:58', '2019-11-01 23:01:58'),
(148, 43, '15726277185dbc650692471.jpg', '2019-11-01 23:01:58', '2019-11-01 23:01:58'),
(149, 43, '15726277185dbc650696a92.jpg', '2019-11-01 23:01:58', '2019-11-01 23:01:58'),
(150, 44, '15726278825dbc65aaac9b6.jpg', '2019-11-01 23:04:42', '2019-11-01 23:04:42'),
(151, 44, '15726278825dbc65aab8bd2.jpg', '2019-11-01 23:04:42', '2019-11-01 23:04:42'),
(152, 44, '15726278825dbc65aabcec7.jpg', '2019-11-01 23:04:42', '2019-11-01 23:04:42'),
(153, 44, '15726278825dbc65aac6a39.jpg', '2019-11-01 23:04:42', '2019-11-01 23:04:42'),
(154, 45, '15726301955dbc6eb35b0d7.jpg', '2019-11-01 23:43:15', '2019-11-01 23:43:15'),
(155, 45, '15726301955dbc6eb36716d.jpg', '2019-11-01 23:43:15', '2019-11-01 23:43:15'),
(156, 46, '15727686725dbe8ba05d70b.jpeg', '2019-11-03 15:11:12', '2019-11-03 15:11:12'),
(157, 47, '15727690755dbe8d33c96ff.jpg', '2019-11-03 15:17:55', '2019-11-03 15:17:55'),
(158, 48, '15727724335dbe9a51019ac.png', '2019-11-03 16:13:53', '2019-11-03 16:13:53'),
(159, 49, '15727735265dbe9e9658d68.jpg', '2019-11-03 16:32:06', '2019-11-03 16:32:06'),
(160, 50, '15727783565dbeb1749621e.jpg', '2019-11-03 17:52:36', '2019-11-03 17:52:36'),
(161, 51, '15727786415dbeb2914ac52.jpg', '2019-11-03 17:57:21', '2019-11-03 17:57:21'),
(162, 51, '15727786415dbeb29153bfa.jpg', '2019-11-03 17:57:21', '2019-11-03 17:57:21'),
(163, 52, '15727797905dbeb70eb9e17.jpg', '2019-11-03 18:16:30', '2019-11-03 18:16:30'),
(164, 53, '15727799345dbeb79ea842f.jpg', '2019-11-03 18:18:54', '2019-11-03 18:18:54'),
(165, 54, '15727802875dbeb8ffbf432.jpg', '2019-11-03 18:24:47', '2019-11-03 18:24:47'),
(166, 55, '15727805265dbeb9ee63475.jpg', '2019-11-03 18:28:46', '2019-11-03 18:28:46'),
(167, 56, '15727809265dbebb7ea3efc.jpg', '2019-11-03 18:35:26', '2019-11-03 18:35:26'),
(168, 57, '15727811335dbebc4d156b2.jpg', '2019-11-03 18:38:53', '2019-11-03 18:38:53'),
(169, 58, '15727812555dbebcc720069.jpg', '2019-11-03 18:40:55', '2019-11-03 18:40:55'),
(170, 59, '15727814475dbebd8724eba.jpg', '2019-11-03 18:44:07', '2019-11-03 18:44:07'),
(171, 60, '15727817685dbebec8b29fe.jpg', '2019-11-03 18:49:28', '2019-11-03 18:49:28'),
(172, 60, '15727817685dbebec8b553d.jpg', '2019-11-03 18:49:28', '2019-11-03 18:49:28'),
(173, 61, '15727819175dbebf5d64a57.jpg', '2019-11-03 18:51:57', '2019-11-03 18:51:57'),
(174, 62, '15727820625dbebfeeacf61.jpg', '2019-11-03 18:54:22', '2019-11-03 18:54:22'),
(175, 63, '15727825795dbec1f39ea96.jpg', '2019-11-03 19:02:59', '2019-11-03 19:02:59'),
(176, 64, '15727877565dbed62c28497.jpg', '2019-11-03 20:29:16', '2019-11-03 20:29:16'),
(177, 65, '15728130445dbf38f4c4848.jpg', '2019-11-04 03:30:44', '2019-11-04 03:30:44'),
(178, 65, '15728130445dbf38f4d9e73.jpg', '2019-11-04 03:30:44', '2019-11-04 03:30:44'),
(179, 65, '15728130445dbf38f4eb1ee.jpg', '2019-11-04 03:30:44', '2019-11-04 03:30:44'),
(180, 65, '15728130445dbf38f4f4086.png', '2019-11-04 03:30:45', '2019-11-04 03:30:45'),
(181, 65, '15728130455dbf38f561452.png', '2019-11-04 03:30:45', '2019-11-04 03:30:45'),
(182, 66, '15728618835dbff7bb21d38.jpg', '2019-11-04 17:04:43', '2019-11-04 17:04:43'),
(183, 67, '15728667565dc00ac48fea9.jpg', '2019-11-04 18:25:56', '2019-11-04 18:25:56'),
(184, 67, '15728667565dc00ac4a883c.jpg', '2019-11-04 18:25:56', '2019-11-04 18:25:56'),
(185, 68, '15728671205dc00c30753d8.jpg', '2019-11-04 18:32:00', '2019-11-04 18:32:00'),
(186, 69, '15728674755dc00d9389bb5.jpg', '2019-11-04 18:37:55', '2019-11-04 18:37:55'),
(187, 70, '15729451975dc13d2dd2105.jpg', '2019-11-05 16:13:17', '2019-11-05 16:13:17'),
(188, 70, '15729451975dc13d2de7f54.jpg', '2019-11-05 16:13:18', '2019-11-05 16:13:18'),
(189, 71, '15729461435dc140df86790.jpeg', '2019-11-05 16:29:03', '2019-11-05 16:29:03'),
(190, 71, '15729461435dc140df91945.jpeg', '2019-11-05 16:29:03', '2019-11-05 16:29:03'),
(191, 72, '15729463955dc141db4744e.jpg', '2019-11-05 16:33:15', '2019-11-05 16:33:15'),
(192, 73, '15729480005dc148209cc4b.jpg', '2019-11-05 17:00:00', '2019-11-05 17:00:00'),
(193, 74, '15729494935dc14df519e61.jpg', '2019-11-05 17:24:53', '2019-11-05 17:24:53'),
(194, 74, '15729494935dc14df53022f.jpg', '2019-11-05 17:24:53', '2019-11-05 17:24:53'),
(195, 75, '15729532515dc15ca32b3e8.jpg', '2019-11-05 18:27:31', '2019-11-05 18:27:31'),
(196, 75, '15729532515dc15ca33c336.jpg', '2019-11-05 18:27:31', '2019-11-05 18:27:31'),
(197, 76, '15729534135dc15d455e2a0.jpg', '2019-11-05 18:30:13', '2019-11-05 18:30:13'),
(198, 76, '15729534135dc15d4571596.jpg', '2019-11-05 18:30:13', '2019-11-05 18:30:13'),
(199, 77, '15729579355dc16eefd6686.jpg', '2019-11-05 19:45:35', '2019-11-05 19:45:35'),
(200, 78, '15729595135dc17519846e9.jpg', '2019-11-05 20:11:53', '2019-11-05 20:11:53'),
(201, 78, '15729595135dc1751994f1d.jpg', '2019-11-05 20:11:53', '2019-11-05 20:11:53'),
(202, 78, '15729595135dc175199e6c6.jpg', '2019-11-05 20:11:53', '2019-11-05 20:11:53'),
(203, 79, '15729600135dc1770d10853.jpg', '2019-11-05 20:20:13', '2019-11-05 20:20:13'),
(204, 79, '15729600135dc1770d271b0.jpg', '2019-11-05 20:20:13', '2019-11-05 20:20:13'),
(205, 79, '15729600135dc1770d36b67.jpg', '2019-11-05 20:20:13', '2019-11-05 20:20:13'),
(206, 79, '15729600135dc1770d3efe6.jpg', '2019-11-05 20:20:13', '2019-11-05 20:20:13'),
(207, 80, '15729606495dc179897c6bc.jpg', '2019-11-05 20:30:49', '2019-11-05 20:30:49'),
(208, 80, '15729606495dc179898c200.jpg', '2019-11-05 20:30:49', '2019-11-05 20:30:49'),
(209, 81, '15729615875dc17d33682e3.jpg', '2019-11-05 20:46:27', '2019-11-05 20:46:27'),
(210, 82, '15729636345dc1853283359.jpg', '2019-11-05 21:20:34', '2019-11-05 21:20:34'),
(212, 84, '15731140245dc3d0a814fb3.jpg', '2019-11-07 15:07:04', '2019-11-07 15:07:04'),
(213, 84, '15731140245dc3d0a8201c2.jpg', '2019-11-07 15:07:04', '2019-11-07 15:07:04'),
(214, 85, '15731146595dc3d3233e8c1.jpg', '2019-11-07 15:17:39', '2019-11-07 15:17:39'),
(215, 86, '15731149425dc3d43e6f9d4.jpg', '2019-11-07 15:22:22', '2019-11-07 15:22:22'),
(216, 87, '15731158745dc3d7e285c99.jpg', '2019-11-07 15:37:54', '2019-11-07 15:37:54'),
(217, 88, '15731161535dc3d8f95feac.jpg', '2019-11-07 15:42:33', '2019-11-07 15:42:33'),
(218, 89, '15731164175dc3da016805d.jpg', '2019-11-07 15:46:57', '2019-11-07 15:46:57'),
(219, 83, '15731166825dc3db0a0bd74.jpg', '2019-11-07 15:51:22', '2019-11-07 15:51:22'),
(220, 90, '15731170975dc3dca9af3c2.jpg', '2019-11-07 15:58:17', '2019-11-07 15:58:17'),
(221, 91, '15731179605dc3e0087d83b.jpg', '2019-11-07 16:12:40', '2019-11-07 16:12:40'),
(222, 92, '15731182275dc3e11328ebb.jpg', '2019-11-07 16:17:07', '2019-11-07 16:17:07'),
(223, 93, '15731346465dc4213649c1a.jpg', '2019-11-07 20:50:46', '2019-11-07 20:50:46'),
(224, 94, '15734707615dc94229540a8.jpg', '2019-11-11 18:12:41', '2019-11-11 18:12:41'),
(225, 95, '15734731345dc94b6e39cae.JPG', '2019-11-11 18:52:14', '2019-11-11 18:52:14'),
(226, 96, '15734734025dc94c7aebadb.JPG', '2019-11-11 18:56:43', '2019-11-11 18:56:43'),
(227, 97, '15734744905dc950ba1b724.JPG', '2019-11-11 19:14:50', '2019-11-11 19:14:50'),
(228, 98, '15734747005dc9518c21343.JPG', '2019-11-11 19:18:20', '2019-11-11 19:18:20'),
(229, 99, '15734749355dc95277487f6.JPG', '2019-11-11 19:22:15', '2019-11-11 19:22:15'),
(230, 100, '15748602895dde76014eefa.jpg', '2019-11-27 15:11:30', '2019-11-27 15:11:30'),
(231, 100, '15748602905dde7602567c6.jpg', '2019-11-27 15:11:30', '2019-11-27 15:11:30'),
(232, 100, '15748602905dde76027078e.jpg', '2019-11-27 15:11:31', '2019-11-27 15:11:31'),
(233, 100, '15748602915dde76034bedc.jpg', '2019-11-27 15:11:31', '2019-11-27 15:11:31'),
(234, 100, '15748602915dde760367bd7.jpg', '2019-11-27 15:11:31', '2019-11-27 15:11:31'),
(235, 101, '15761651405df25f146dad4.jpg', '2019-12-12 17:39:00', '2019-12-12 17:39:00'),
(236, 102, '15773641865e04aadaeff9a.png', '2019-12-26 14:43:07', '2019-12-26 14:43:07'),
(237, 102, '15773641875e04aadb5bdc2.jpg', '2019-12-26 14:43:07', '2019-12-26 14:43:07'),
(238, 102, '15773641875e04aadb69a23.jpg', '2019-12-26 14:43:07', '2019-12-26 14:43:07'),
(239, 102, '15773641875e04aadb7bb19.jpg', '2019-12-26 14:43:07', '2019-12-26 14:43:07'),
(240, 103, '15773709295e04c531cac47.jpg', '2019-12-26 16:35:30', '2019-12-26 16:35:30'),
(241, 104, '15773718375e04c8bde8aca.JPG', '2019-12-26 16:50:38', '2019-12-26 16:50:38'),
(242, 105, '15777135705e09ffa27e0cb.jpg', '2019-12-30 15:46:10', '2019-12-30 15:46:10'),
(243, 106, '15777140845e0a01a44cc6c.jpg', '2019-12-30 15:54:44', '2019-12-30 15:54:44'),
(244, 107, '15777143375e0a02a11fece.jpg', '2019-12-30 15:58:57', '2019-12-30 15:58:57'),
(245, 108, '15777144865e0a0336919ac.jpg', '2019-12-30 16:01:26', '2019-12-30 16:01:26'),
(246, 109, '15777146655e0a03e91a71f.jpg', '2019-12-30 16:04:25', '2019-12-30 16:04:25'),
(247, 110, '15777156255e0a07a9f0a0f.jpg', '2019-12-30 16:20:26', '2019-12-30 16:20:26'),
(248, 111, '15783079345e13115ea704f.jpg', '2020-01-06 12:52:14', '2020-01-06 12:52:14'),
(249, 111, '15783079345e13115ecd716.jpg', '2020-01-06 12:52:14', '2020-01-06 12:52:14'),
(250, 112, '15783079965e13119cd2928.jpg', '2020-01-06 12:53:17', '2020-01-06 12:53:17'),
(251, 112, '15783079975e13119d1b0b1.jpg', '2020-01-06 12:53:17', '2020-01-06 12:53:17'),
(252, 113, '15783080375e1311c536a2b.jpg', '2020-01-06 12:53:57', '2020-01-06 12:53:57'),
(253, 114, '15783082845e1312bce8c76.jpg', '2020-01-06 12:58:06', '2020-01-06 12:58:06'),
(254, 115, '15783083365e1312f0521aa.jpg', '2020-01-06 12:58:57', '2020-01-06 12:58:57'),
(255, 116, '15783084805e131380aac49.jpg', '2020-01-06 13:01:21', '2020-01-06 13:01:21'),
(256, 117, '15785673295e1706a194c79.jpg', '2020-01-09 12:55:29', '2020-01-09 12:55:29'),
(257, 118, '15785675515e17077f2fbb9.jpg', '2020-01-09 12:59:11', '2020-01-09 12:59:11'),
(258, 119, '15885020095eae9df97d3a6.png', '2020-05-03 10:33:34', '2020-05-03 10:33:34'),
(259, 120, '15885020895eae9e49ba2e1.png', '2020-05-03 10:34:51', '2020-05-03 10:34:51'),
(260, 121, '15885022015eae9eb94844d.jpg', '2020-05-03 10:36:43', '2020-05-03 10:36:43'),
(261, 122, '15885024175eae9f9131845.png', '2020-05-03 10:40:18', '2020-05-03 10:40:18'),
(262, 123, '15885030125eaea1e408524.png', '2020-05-03 10:50:13', '2020-05-03 10:50:13'),
(263, 124, '15885980525eb0152480fe4.png', '2020-05-04 13:15:08', '2020-05-04 13:15:08'),
(264, 125, '15885981685eb015986e78a.jpg', '2020-05-04 13:16:12', '2020-05-04 13:16:12'),
(265, 126, '15885986335eb01769d8f48.jpg', '2020-05-04 13:24:04', '2020-05-04 13:24:04'),
(266, 127, '15894813775ebd8fa1386af.png', '2020-05-14 18:36:30', '2020-05-14 18:36:30'),
(267, 127, '15894813905ebd8fae76ae9.jpg', '2020-05-14 18:36:31', '2020-05-14 18:36:31'),
(268, 128, '15894813925ebd8fb024efd.png', '2020-05-14 18:36:38', '2020-05-14 18:36:38'),
(269, 128, '15894813985ebd8fb63e0d8.jpg', '2020-05-14 18:36:39', '2020-05-14 18:36:39'),
(270, 129, '15894814005ebd8fb81088e.png', '2020-05-14 18:36:46', '2020-05-14 18:36:46'),
(271, 129, '15894814065ebd8fbeba2e1.jpg', '2020-05-14 18:36:47', '2020-05-14 18:36:47'),
(272, 130, '15894815565ebd90548d7a3.jpg', '2020-05-14 18:39:18', '2020-05-14 18:39:18'),
(273, 130, '15894815585ebd90564e948.jpg', '2020-05-14 18:39:19', '2020-05-14 18:39:19'),
(274, 131, '15894816885ebd90d80300e.jpg', '2020-05-14 18:41:29', '2020-05-14 18:41:29'),
(275, 135, '15895404615ebe766d23110.jpg', '2020-05-15 11:01:09', '2020-05-15 11:01:09'),
(276, 135, '15895404695ebe767540939.jpg', '2020-05-15 11:01:10', '2020-05-15 11:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_reply_likes`
--

CREATE TABLE `product_reply_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reply_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `user_id`, `product_id`, `rate`, `deleted_at`, `created_at`, `updated_at`) VALUES
(16, 5, 65, 3, NULL, '2019-12-18 13:16:55', '2019-12-18 13:16:55'),
(17, 5, 118, 4, NULL, '2020-01-14 18:07:57', '2020-01-14 18:07:57'),
(18, 4, 116, 4, NULL, '2020-03-02 14:26:45', '2020-03-02 14:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `repliable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repliable_id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `repliable_type`, `repliable_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 32, 'App\\Comment', 2, 'hjbhj', '2020-04-29 11:12:09', '2020-04-29 11:12:09'),
(2, 32, 'App\\Comment', 2, 'hdgvjasdas', '2020-04-29 19:05:47', '2020-04-29 19:05:47'),
(3, 32, 'App\\Comment', 2, 'test', '2020-04-29 19:05:57', '2020-04-29 19:05:57'),
(4, 32, 'App\\Comment', 8, 'test', '2020-04-29 19:06:46', '2020-04-29 19:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', '2019-08-22 14:48:41', '2019-08-22 14:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1);

-- --------------------------------------------------------

--
-- Table structure for table `saved_items`
--

CREATE TABLE `saved_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `board_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `idea_id` bigint(20) UNSIGNED DEFAULT NULL,
  `topic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_items`
--

INSERT INTO `saved_items` (`id`, `board_id`, `product_id`, `idea_id`, `topic_id`, `deleted_at`, `created_at`, `updated_at`, `offer_id`) VALUES
(45, 77, NULL, NULL, 16, NULL, '2019-11-06 16:19:59', '2019-11-06 16:19:59', NULL),
(47, 24, NULL, NULL, 16, NULL, '2019-11-06 18:27:24', '2019-11-06 18:27:24', NULL),
(48, 70, NULL, NULL, 20, NULL, '2019-12-30 15:45:26', '2019-12-30 15:45:26', NULL),
(49, 24, 102, NULL, NULL, NULL, '2020-01-04 01:24:49', '2020-01-04 01:24:49', NULL),
(50, 30, NULL, NULL, 30, NULL, '2020-01-04 02:18:36', '2020-01-04 02:18:36', NULL),
(51, 31, NULL, NULL, 28, NULL, '2020-01-04 02:19:29', '2020-01-04 02:19:29', NULL),
(52, 88, NULL, NULL, NULL, NULL, '2020-01-04 02:19:51', '2020-01-04 02:19:51', NULL),
(53, 88, NULL, NULL, 30, NULL, '2020-01-04 02:44:15', '2020-01-04 02:44:15', NULL),
(54, 70, NULL, NULL, 28, NULL, '2020-01-05 00:09:22', '2020-01-05 00:09:22', NULL),
(55, 24, 28, NULL, NULL, NULL, '2020-01-05 00:45:33', '2020-01-05 00:45:33', NULL),
(56, 24, 27, NULL, NULL, NULL, '2020-01-05 12:26:02', '2020-01-05 12:26:02', NULL),
(57, 89, 118, NULL, NULL, NULL, '2020-03-02 18:07:48', '2020-03-02 18:07:48', NULL),
(58, 90, 118, NULL, NULL, NULL, '2020-03-02 18:07:48', '2020-03-02 18:07:48', NULL),
(59, 91, 118, NULL, NULL, NULL, '2020-03-02 18:08:19', '2020-03-02 18:08:19', NULL),
(60, 92, 118, NULL, NULL, NULL, '2020-03-02 18:08:19', '2020-03-02 18:08:19', NULL),
(61, 93, 118, NULL, NULL, NULL, '2020-03-02 18:08:19', '2020-03-02 18:08:19', NULL),
(62, 94, 118, NULL, NULL, NULL, '2020-03-02 18:08:20', '2020-03-02 18:08:20', NULL),
(63, 95, 118, NULL, NULL, NULL, '2020-03-02 18:08:20', '2020-03-02 18:08:20', NULL),
(64, 96, 118, NULL, NULL, NULL, '2020-03-02 18:08:20', '2020-03-02 18:08:20', NULL),
(65, 97, 118, NULL, NULL, NULL, '2020-03-02 18:09:00', '2020-03-02 18:09:00', NULL),
(66, 110, 94, NULL, NULL, NULL, '2020-05-04 08:42:39', '2020-05-04 08:42:39', NULL),
(67, 111, 94, NULL, NULL, NULL, '2020-05-04 08:43:09', '2020-05-04 08:43:09', NULL),
(68, 110, 92, NULL, NULL, NULL, '2020-05-04 08:43:53', '2020-05-04 08:43:53', NULL),
(69, 110, 89, NULL, NULL, NULL, '2020-05-04 08:44:56', '2020-05-04 08:44:56', NULL),
(70, 110, 88, NULL, NULL, NULL, '2020-05-04 08:46:18', '2020-05-04 08:46:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`id`, `item_id`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(12, 16, 4, 'topic', '2019-11-06 19:00:16', '2019-11-06 19:00:16'),
(13, 28, 4, 'product', '2020-01-05 00:46:32', '2020-01-05 00:46:32'),
(14, 30, 4, 'idea', '2020-01-09 13:49:04', '2020-01-09 13:49:04'),
(15, 118, 4, 'product', '2020-01-09 15:16:48', '2020-01-09 15:16:48'),
(16, 118, 4, 'product', '2020-01-09 15:17:04', '2020-01-09 15:17:04'),
(17, 118, 4, 'product', '2020-01-09 15:17:15', '2020-01-09 15:17:15'),
(18, 118, 4, 'product', '2020-01-09 15:21:56', '2020-01-09 15:21:56'),
(19, 118, 48, 'product', '2020-04-28 12:58:18', '2020-04-28 12:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `showrooms`
--

CREATE TABLE `showrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `showroom_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `showroom_coverImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instgram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `showrooms`
--

INSERT INTO `showrooms` (`id`, `name_ar`, `name_en`, `showroom_image`, `showroom_coverImage`, `website`, `instgram`, `rate`, `yt`, `tw`, `fb`, `about`, `user_id`, `district_id`, `deleted_at`, `created_at`, `updated_at`, `active`, `reason`, `approve`, `phone`, `contact_email`, `slug`, `contact_name`) VALUES
(1, 'Creator Gallery', 'Creator Gallery', '15687201725d80c52ced22d.jpg', '15687201725d80c52cee88e.jpg', 'https://www.google.com/search?q=google&rlz=1C1CHBF_enEG865EG865&oq=g&aqs=chrome.3.69i60j69i57j69i59j0l2j69i60.1644j0j7&sourceid=chrome&ie=UTF-8', 'https://www.instagram.com/?hl=en', NULL, 'https://www.youtube.com/', 'https://twitter.com/login?lang=en', 'https://www.facebook.com/Decoration.Furniture.Painting.Tables.Frames/', 'gallery store', 4, 16, '2019-10-19 19:45:28', '2019-09-17 15:36:12', '2019-10-19 19:45:28', 1, NULL, '0', NULL, NULL, NULL, NULL),
(2, 'تجربة', 'Testing', '15713218215da877dd59b4b.png', '15713218215da877dd5a82e.jpg', 'www.minvotech.com', 'www.instagram.com', NULL, 'www.youtube.com', 'www.twitter.com', 'www.facebook.com', 'This is a testing showroom', 5, 16, '2019-10-19 19:45:23', '2019-10-17 20:17:01', '2019-10-19 19:45:23', 0, NULL, '0', NULL, NULL, NULL, NULL),
(3, 'تجربة', 'Test', '15713223435da879e76996a.jpg', '15713223435da879e76a72b.jpg', 'www.minvotech.com', 'www.instagram.com', NULL, 'www.youtube.com', 'www.twitter.com', 'www.facebook.com', 'This is a testing showroom', 5, 16, '2019-10-19 19:45:17', '2019-10-17 20:25:43', '2019-10-19 19:45:17', 0, NULL, '0', NULL, NULL, NULL, NULL),
(4, 'Darac', 'Darac', '15730329775dc2941179101.png', '15729512285dc154bc7a814.jpg', 'www.daracpaints.com', NULL, NULL, NULL, NULL, NULL, 'Aboutt\r\nDarac Paints Company, we are all about the color! With an artistic approach and an eye for detail, we match beautiful with colorful interior painting. From simple to elaborate, we strive to create beautiful spaces for our clients at any budget.\r\n \r\nCompany Overview\r\nWe do believe that the effective color selection can be a powerful element in any design, so with an artistic approach we match beauty with colorful interior painting , to achieve a built interior environment and home lifestyle enhancement.\r\n \r\nWe have achieved more than 100 project annually, and more than 10 years of experience in this field ; we have a very professional workmanship and we could organize the process to keep your home livable during the project time.\r\n \r\nProducts\r\nWallpaper - Paints- 3D Wall Art & interior and exterior design-HDF Floors', 4, 19, NULL, '2019-10-19 19:59:55', '2020-04-05 13:41:45', 1, NULL, '1', NULL, NULL, 'darac', NULL),
(5, 'Ideal House', 'Ideal House', '15718637735db0bcdd98677.jpg', '15718637735db0bcdd99319.jpg', 'http://www.my-idealhouse.com', NULL, NULL, NULL, NULL, NULL, 'IDEAL HOUSE Furniture has been Established Since 2012, Specialized in Import Turkish and Chinese home furniture. However, we diverted our investments to manufacturing in conjunction with pound floating at the beginning of 2016.\nOur factory established on an area of 4000 SQM, located at 1st industrial zone, 6th of October where we produce our distinguished products of Living sets, Bedrooms, Dining Rooms and we are a Professional manufacturer of Recliners Chairs and Recliners Sofa Set.\nThe factory employs about 140 personnel among engineers, technicians and office employees.\nWe have a warehouses for a finished products, which also located at industrial zone\nOf 6th of October on an area of 2500 SQM.', 4, 19, NULL, '2019-10-19 20:49:56', '2020-04-02 11:00:32', 1, '5', '1', NULL, NULL, 'ideal-house', NULL),
(6, 'sdfghn', 'qwsdfgh', '15723345775db7ebf15496f.jpeg', 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'asd', 4, 20, '2019-10-30 20:51:07', '2019-10-28 17:07:33', '2019-10-30 20:51:07', 1, '.', '1', NULL, NULL, NULL, NULL),
(7, 'tyhujkl', 'fgbnhjmk,', NULL, 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 18, '2019-10-30 20:50:03', '2019-10-28 17:12:27', '2019-10-30 20:50:03', 0, '.', '1', NULL, NULL, NULL, NULL),
(8, 'asdcfv', 'zdfxf', NULL, 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 21, '2019-10-30 14:08:45', '2019-10-28 17:22:05', '2019-10-30 14:08:45', 1, '5', '1', NULL, NULL, NULL, NULL),
(9, 'sdfgg', 'asdfbdfdfgd', NULL, 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 19, '2019-10-30 14:08:39', '2019-10-28 18:14:06', '2019-10-30 14:08:39', 1, NULL, '1', NULL, NULL, NULL, NULL),
(10, 'my showroom', 'my showroom', '15724285295db95af16b6d1.jpg', '15724285295db95af16c5b0.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 19, '2019-11-03 18:26:25', '2019-10-29 21:21:56', '2019-11-03 18:26:25', 0, '2', '1', NULL, NULL, NULL, NULL),
(11, 'myshowroom', 'myshowroom', NULL, 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 20, '2019-11-03 18:26:57', '2019-10-29 21:23:06', '2019-11-03 18:26:57', 1, '5', '1', NULL, NULL, NULL, NULL),
(12, 'name', 'name', NULL, 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 19, '2019-10-30 14:08:49', '2019-10-30 14:07:48', '2019-10-30 14:08:49', 1, NULL, '1', NULL, NULL, NULL, NULL),
(13, 'wooden rooms', 'wooden rooms', '15724286235db95b4fa0119.jpeg', 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'showroom 7elwa', 12, 20, '2019-11-03 18:26:48', '2019-10-30 15:43:43', '2019-11-03 18:26:48', 1, '.', '1', '0100114565', NULL, NULL, NULL),
(14, 'shroom', 'shroom', '15724289145db95c72430e8.jpg', '15724289145db95c72440fa.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 19, '2019-11-03 18:26:35', '2019-10-30 15:48:34', '2019-11-03 18:26:35', 1, '5', '1', NULL, NULL, NULL, NULL),
(15, 'new wood', 'new wood', '15724372895db97d2974503.jpeg', '15724372895db97d2975f35.jpeg', NULL, NULL, NULL, 'www.youtube.com/?gl=EG', NULL, NULL, NULL, 12, 19, '2019-10-30 20:27:06', '2019-10-30 18:08:09', '2019-10-30 20:27:06', 1, NULL, '1', NULL, NULL, NULL, NULL),
(16, 'showroom1', 'showroom1', NULL, 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 21, '2019-10-31 14:07:40', '2019-10-30 18:52:23', '2019-10-31 14:07:40', 1, NULL, '1', NULL, NULL, NULL, NULL),
(17, 'showroom2', 'showroom2', NULL, 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 20, '2019-10-31 14:08:08', '2019-10-30 18:55:57', '2019-10-31 14:08:08', 1, NULL, '1', NULL, NULL, NULL, NULL),
(18, 'showroom3', 'showroom3', NULL, 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 20, '2019-10-31 14:08:04', '2019-10-30 18:57:00', '2019-10-31 14:08:04', 1, NULL, '1', NULL, NULL, NULL, NULL),
(19, 'showroom4', 'showroom4', NULL, 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 16, '2019-10-31 14:07:52', '2019-10-30 18:58:07', '2019-10-31 14:07:52', 1, NULL, '1', NULL, NULL, NULL, NULL),
(20, 'showroom5', 'showroom5', NULL, 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 20, '2019-10-31 14:07:44', '2019-10-30 18:58:47', '2019-10-31 14:07:44', 1, NULL, '1', NULL, NULL, NULL, NULL),
(21, 'showroom6', 'showroom6', NULL, 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 20, '2019-10-31 14:07:47', '2019-10-30 19:15:12', '2019-10-31 14:07:47', 1, NULL, '1', NULL, NULL, NULL, NULL),
(22, 'showroom7', 'showroom7', NULL, 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 20, '2019-10-31 14:07:57', '2019-10-30 19:15:58', '2019-10-31 14:07:57', 1, NULL, '1', NULL, NULL, NULL, NULL),
(23, 'showroom8', 'showroom8', NULL, 'cover.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 20, '2019-10-31 14:08:12', '2019-10-30 19:17:37', '2019-10-31 14:08:12', 1, NULL, '1', NULL, NULL, NULL, NULL),
(24, 'Dibaj Fabric', 'Dibaj Fabrics', '15727849785dbecb52e9156.PNG', '15729506055dc1524de23c8.jpg', 'https://www.ikea.com/us/en/planner/vimle-planner/#69292464', NULL, NULL, NULL, NULL, NULL, 'WHAT WE OFFER\nDibaj for Fabrics is the destination point for anyone looking for top quality fabrics. Dibaj fabric range is diverse, stocking high-quality\nFabrics. So no matter what the project you are seeking to\nComplete is, Dibaj has you covered!\n\nDibaj is a well-established Egyptian fabrics store which offers a rich variety of upholstery and curtains fabrics including cotton, silk, velvet, etc. We import the finest materials from Europe and South Asia besides, our rich Egyptian made collection exclusively designed and distributed by Dibaj', 4, 22, NULL, '2019-10-31 04:04:26', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'dibaj-fabrics', NULL),
(25, 'ORYX Home', 'ORYX Home', '15724773375dba19995a3cc.jpg', '15724773375dba19995b101.jpg', NULL, 'https://www.instagram.com/oryx.home', NULL, NULL, NULL, 'https://web.facebook.com/oryx.home.eg/', 'Inspire your soul by our designs. ORYX is a Cairo based provider offering unique custom designed printed fabrics. ORYX gives consumers the chance to find exclusive, exceptionally well-made designed fabrics.', 7, 21, NULL, '2019-10-31 05:15:37', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'oryx-home', NULL),
(26, 'Prado Egypt', 'Prado Egypt', '15728604925dbff24c45274.jpg', '15728608185dbff3929e9db.jpg', 'https://www.pradoegypt.com', 'https://instagram.com/pradoegypt?igshid=14c8lt53qpbfy', NULL, NULL, NULL, NULL, 'Prado Rugs is one of the leading Egyptian manufacturer and exporter of machine woven rugs to more than 20 countries worldwide. Prado Egypt founded in Belgium and transported to Egypt in 2010. Prado offers innovative products. By integrating fashionable designs with refined materials, our collections reflect current trends as well as elegant classics. \nFrom Exquisite wool rugs to a fresh synthetic range, you will find your special creation.', 4, 20, NULL, '2019-10-31 14:45:30', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'prado-egypt', NULL),
(27, 'Cube Furniture', 'Cube Furniture', '15728150225dbf40aebc4d0.png', '15728150225dbf40aebdd19.jpg', 'www.cubefurniture-eg.com', NULL, NULL, NULL, NULL, NULL, '2006 with incomparable distinguished history in selling modern and classic Furniture & Lighting with wide variety of collections as well as the option of manufacturing special models to meet our customers needs and expectations\nCube Furniture value is “Partnership built on mutual trust and benefit”; we want our customers to see us as their trusted business partner and preferred choice.\n\nWe are at Cube Furniture focus on helping our customers to improve, sustain and guide them through providing all with alternative choices in furnishing their houses and also complete solutions to adopt to their needs and fulfill with our commitments', 4, 16, NULL, '2019-10-31 20:30:53', '2020-04-02 11:00:32', 1, NULL, '1', NULL, 'cubehomefurniture@yahoo.com', 'cube-furniture', NULL),
(28, 'Ogawa', 'Ogawa', '15725356775dbafd7d6020f.jpg', 'cover.jpg', 'www.ogawaegypt.com', 'https://www.instagram.com/ogawaegypt/?hl=en', NULL, 'https://www.youtube.com/channel/UC4yFf6IOToz5YcuQJH_Sk6g?view_as=subscriber', NULL, 'https://www.facebook.com/OgawaEgypt/', 'Bio: Your Company Values, Vision and Mission.\nFrom A Humble Beginning In 1996, OGAWA Provides Personalized Lifestyle Solutions and Holistic Wellness Experiences for People around the World, so everyone can truly enjoy better, healthier living. On the global front, we had successfully replicated our business model on international platform, enabling to replica horologes share the heart of wellness with the people around the world through our wide distribution network of more than 600 wellness hubs present in 112 cities across 22 countries.\n\nOur Mission \nOGAWA is involved in the development, design, and distribution of health and wellness equipment. We are also engaged in regular research to gather information on the latest market trends through market observation and feedback obtained from our customers. In order to cater to the different needs and preferences of our customers, our Product Design & Development team is constantly conceptualizing and developing designs for new product models with quality and affordability in mind. \nOGAWA itself means \'stream\' in Japanese. Using this as our philosophy, and through our commitment in product design, quality assurance and brand building, the OGAWA brand has emerged as one of the leading brands in health and wellness equipment market.', 4, 20, NULL, '2019-10-31 21:27:57', '2020-04-02 11:00:32', 1, NULL, '1', NULL, 'cs@ogawaegypt.com', 'ogawa', NULL),
(29, 'La Vitrine', 'La Vitrine', '15729492765dc14d1c95ee1.jpg', '15729494635dc14dd759199.jpg', 'http://www.lavitrine-gallery.com', NULL, NULL, NULL, NULL, NULL, 'La Vitrine is a Gallery that creates the classic French and English Furniture in the original fashion, tailored to customers\' styles', 4, 23, NULL, '2019-11-03 20:42:40', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'la-vitrine', NULL),
(30, 'Verinno', 'Verinno', '15729553655dc164e5ed2b3.jpg', '15729553655dc164e5ee069.jpg', 'http://www.verinno.com', NULL, NULL, NULL, NULL, NULL, 'Verinno furniture is a leading company specialized in a high quality home, hotel, and office furniture since 1994.\r\n\r\nFor more than 22 years, Verinno has completed hundreds of projects; we can help you navigate the decisions and options available to create the perfect choice without wasting time and money.\r\n\r\nOur showrooms are located in Maadi, Mohandseen and Mall of Arabia. They displaying wide collection of furniture styles: classic, modern and contemporary furniture, paintings, accessories, lighting ... etc.', 4, 16, NULL, '2019-11-05 19:02:45', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'verinno', NULL),
(31, 'كلاسيك', 'Classic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, 18, '2019-11-06 18:36:07', '2019-11-06 15:56:33', '2019-11-06 18:36:07', 0, NULL, '0', NULL, NULL, NULL, NULL),
(32, 'Apex furniture', 'Apex furniture', '15730512375dc2db65b06a9.jpeg', NULL, 'www.apex.furniture.com', NULL, NULL, NULL, NULL, NULL, 'At apex we understand that each of our customers is unique and has their own tastes when it comes to the decor for their home or offices that we closely with you to understand your individual needs whether its styles, fabrics or colors. \nWe have our own factory uses high universal technology in production and the latest universal machines, the industrial experience has a big history that exceeded 50 years.', 4, 23, '2019-11-06 21:45:30', '2019-11-06 21:40:37', '2019-11-06 21:45:30', 0, NULL, '0', NULL, NULL, NULL, NULL),
(33, 'Apex furniture', 'Apex furniture', '15730515005dc2dc6c094b5.jpeg', '15730535455dc2e469cf1a4.jpg', 'www.apex.furniture.com', NULL, NULL, NULL, NULL, NULL, 'At apex we understand that each of our customers is unique and has their own tastes when it comes to the decor for their home or offices that we closely with you to understand your individual needs whether its styles, fabrics or colors. \nWe have our own factory uses high universal technology in production and the latest universal machines, the industrial experience has a big history that exceeded 50 years.', 4, 23, NULL, '2019-11-06 21:45:00', '2020-04-02 11:00:32', 1, NULL, '1', NULL, 'heliopolis@apexfurn.com', 'apex-furniture', NULL),
(34, 'Archi Touch', 'Archi Touch', '15730534215dc2e3ed6182f.jpg', '15730534215dc2e3ed625a3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Mission:\nDeveloping, manufacturing, and supplying chairs, wall cladding, partitions and wooden furniture for office, home, stores, and hotels that meets the local and international markets demands and requirements.\nBuilding strong business relationships with both our suppliers and clients, based on mutual benefits and profits.\nProviding our business to business clients with all required products and services that help them improve their own business and grow further.\nWe shall achieve the above through a team of qualified professionals, by continuously improving and developing and periodically reviewing our policy and objectives, which adhere to the international standard requirements.\n\nVision: \nTo be one of the most innovative enterprise in the furniture field, in North Africa and the middle east providing a wide range of products and variable services.\n\nValue:\nOur liability  \nAs we grow our company, we respect our environment and our employees and prioritize their wellness. We target having more healthy individuals with more satisfaction at work. We believe our employees are our most valuable assets.  \n\nOur flexibility  \nWhile maintaining our market position and growing our business, we ensure we are as flexible as possible when dealing with challenges to take both our ambitions and our clients’ expectations to new levels. \n \nOur passion  \nFurniture has been our passion for more than twenty years in which we have reflected it into our outrageous success. Our growth has only motivated us to innovate to create better products.', 4, 23, NULL, '2019-11-06 22:03:08', '2020-04-02 11:00:32', 1, NULL, '1', NULL, 'info@architouch.com', 'archi-touch', NULL),
(35, 'Home Concept Furniture Mall', 'HC Furniture Mall', '15730536995dc2e503ed3d3.jpg', '15730534245dc2e3f0aa79b.jpg', 'http://www.hcfurnituremall.com', NULL, NULL, NULL, NULL, NULL, 'HC Furniture Mall is your perfect destination for all your home needs.\n46 Stores under one roof!\nDon\'t waste a lot of time & effort because we have it all.\nHC Furniture Mall opened in 2012. Consumers have come to know The HC Furniture Mall for its fabulous selection of modern, contemporary, and traditional furniture, rugs and lighting, all under one roof – 42 incredible independent merchants over three exciting floors.\nWe’ve brought together a unique collection of retailers with over 200 brand name manufacturers to offer you incredible selection, quality and value.\nIn HC Furniture Mall we offer the one stop shopping experience in a friendly atmosphere where you can find all what you need under one roof. \nFounding date\n2012', 4, 23, NULL, '2019-11-06 22:13:33', '2020-04-02 11:00:32', 1, NULL, '1', NULL, 'cs@hcfurnituremall.com', 'hc-furniture-mall', NULL),
(36, 'Homy Furniture', 'Homy Furniture', '15730541155dc2e6a37e519.jpg', '15730541155dc2e6a37f97c.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Homey Furniture is Archi Touch\'s residential brand catering for both B2B & B2C segments. The vision behind the brand is evolving about the special needs of each client, the differences between lifestyles and personal favors & patterns in day to day life reflected on our products to offer our clients furniture that optimize their comfort, enhance their physical & psychological state & finally iconic to represent their persona.', 4, 23, NULL, '2019-11-06 22:28:35', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'homy-furniture', NULL),
(37, 'Contistahl Group', 'Contistahl Group', '15730543935dc2e7b921705.jpg', '15730543935dc2e7b922c3e.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'We are a high end brand based in Egypt offering kitchens, dressing rooms and much more. We provide innovative and functional products with premium quality to meet our costumers’ expectations. We aim to continue bringing in improvements in quality, productivity,and value to be a dependable and reliable brand.\r\nYou dream, we make it happen.', 4, 23, NULL, '2019-11-06 22:33:13', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'contistahl-group', NULL),
(38, 'Meuble for French furniture', 'Meuble for French furniture', '15730544255dc2e7d9a9015.jpg', NULL, 'https://www.erakyclassics.com/', 'https://www.instagram.com/meuble_1946/', NULL, NULL, NULL, 'https://www.facebook.com/MeubleforFrenchFurniture/', 'Meuble For French Furniture Co. one of the leading furniture manufacturing companies in Egypt since in 1946.\n \nCompany Overview\nClassic, Luxury Furniture: French, Italian and English styles\nMeuble For French Furniture Co. since 1946 one of the leading manufacturing companies in Egypt and Middle East.\nWe are specialized in producing all kind of classic furniture such as: Chairs, Sofas, Desks, Dining rooms, Bedrooms, Antiques, etc., Finished or semi-finished, custom products, hotel projects and interior design.\nOur design department’s ready to deal with all kinds of custom made orders Such as: hotel furnishing, Compounds furnishing, etc.\n- Our Factory held more than 300-370 professional talented workers and designers equipped to produce all kind of furniture.\n-All our products matches the international standards dimensions and upholstery method.\n-We use only dried natural beech wood imported from France, Natural Veneers and we import the rest of our materials upon the international standards.', 4, 22, NULL, '2019-11-06 22:33:45', '2020-04-02 11:00:32', 1, NULL, '1', NULL, 'info@meublefrenchfurniture.com', 'meuble-for-french-furniture', NULL),
(39, 'American Furniture', 'American Furniture', '15730549345dc2e9d666d40.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'American Furniture is one of the top players in the world of furniture in Egypt since 1992. Our customers find exceptional value in both the products and services we offer. Visit us to discover the top quality wood and the most diverse collections in any of our show rooms.', 4, 23, NULL, '2019-11-06 22:42:14', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'american-furniture', NULL),
(40, 'Caracole Egypt', 'Caracole Egypt', '15730552175dc2eaf144f5d.jpg', '15730552175dc2eaf145bce.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Tired of brown furniture...welcome to a new experience in high style, high value furnishings! Caracole is a portfolio of unique items that work in harmony to furnish your entire house. Every piece represents high design and independent thinking, with more than seventy-five finishes and materials: exotic woods, mixed elements and hand-applied finishes. Each piece stands alone...and speaks for itself. For example, a closed storage item might say \"bedroom dresser\" to you while serving as a \"dining room sideboard\" for your neighbor. It\'s OK! Throw the rules out the window and allow your subliminal preferences and unconditioned reflexes to make the call. And above all, have fun utilizing Caracole\'s fresh originality to make your home...YOUR home.', 4, 23, NULL, '2019-11-06 22:46:57', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'caracole-egypt', NULL),
(41, 'Walnut Furniture', 'Walnut Furniture', '15730554285dc2ebc4c5b05.jpg', '15730554285dc2ebc4c677e.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'The latest furniture mega store located in Maadi, offering the best in furniture brands from across the globe. One of the several international furniture brands that will be available at Walnut is Montigny.\r\n\r\nMontigny Furniture is a 100% french-owned and controlled company. In 2007, the company\'s founder decided to launch a production of high-end french style furniture.\r\n\r\nAfter 5 years, Montigny Furniture is distributed worldwide through high-end furniture retailers who find in our production the best quality at the best price. Countries Montigny is distributed to include:\r\nAustralia, Brazil, Canada, China, Dubai, Egypt, France, Germany, Israel, Korea, Kuwait, Lebanon, New Zealand, Poland, Romania, Russia, Saudi Arabia, Thailand, Turkey, UK, and USA.\r\n\r\nWith 10 different concepts, from the French Louis XV classic to the collection Chicago (1930\'s) and Mondrian (1950\'s), Montigny offers eclectic and original complete concepts including furniture, sofas, and decoration for the best quality interior decoration retailers all over the world.', 4, 23, NULL, '2019-11-06 22:50:28', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'walnut-furniture', NULL),
(42, 'TAGOURY\'S HOUSE', 'TAGOURY\'S HOUSE', '15730557035dc2ecd700cf8.jpg', '15730557035dc2ecd7019a8.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Tagoury’s House is a privately owned family business, now in it’s third generation. Since then, Tagoury’s House experienced a quick growth. Our company has managed to contribute greatly in the development of the furniture industry with  it’s high standard products along with elegance style, innovation and  quality. We have put a big effort and strived to exceed our customers expectations. \r\nOur philosophy is to select well deigned products to exacting standards, both traditional and modern the result is high quality furniture for a long lifespan and offering excellence.', 4, 23, NULL, '2019-11-06 22:55:03', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'tagourys-house', NULL),
(43, 'Notch', 'Notch', '15730564915dc2efebc9fc6.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 22, NULL, '2019-11-06 23:08:11', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'notch', NULL),
(44, 'Showroom_Test', 'SHowroom_Test', '15748600635dde751f54db2.jpg', '15748600635dde751f7d3ed.jpg', 'https://www.wefaq.com', 'https://www.instagram.com', NULL, 'https://www.youtube.com', 'https://www.twitter.com', 'https://www.facebook.com', NULL, 24, 23, NULL, '2019-11-27 15:07:43', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'showroom-test', NULL),
(45, 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'csdcsdcsdcsdc', 5, 23, NULL, '2019-12-26 14:40:16', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'test', NULL),
(46, 'My Showroom', 'My Showroom', '15777098445e09f11459f64.JPG', '15777098445e09f11491e77.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 16, NULL, '2019-12-30 14:44:04', '2020-04-05 12:24:42', 1, NULL, '1', NULL, NULL, 'my-showroom', NULL),
(47, 'asdc', 'addc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 23, NULL, '2019-12-30 15:09:15', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'addc', NULL),
(48, 'showroomoffersedited', 'showroomoffersedited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 23, NULL, '2019-12-30 15:41:54', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'showroomoffersedited', NULL),
(49, 'test title', 'test title', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 23, NULL, '2019-12-31 11:12:15', '2020-04-02 11:00:32', 1, NULL, '1', NULL, NULL, 'test-title', NULL),
(50, 'hgfvhgvy', 'gvhgvhg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 23, NULL, '2020-01-14 18:14:24', '2020-04-02 11:00:32', 0, NULL, '0', NULL, NULL, 'gvhgvhg', NULL),
(51, 'new showroom', 'newshowroom', '15881826945ea9bea6d1fae.jpg', '15881827055ea9beb191294.jpg', 'https://yalla-furnish.com/', 'https://yalla-furnish.com/', NULL, 'https://yalla-furnish.com/', 'https://gurayyarar.github.io/AdminBSBMaterialDesign/pages/tables/editable-table.html', 'https://gurayyarar.github.io/AdminBSBMaterialDesign/pages/tables/editable-table.html', 'test', 32, 23, NULL, '2020-04-29 17:51:48', '2020-04-29 17:51:48', 0, NULL, '0', NULL, NULL, 'new-showroom', NULL),
(52, 'showroom2', 'showroom2', '15881830115ea9bfe33e252.jpg', '15881830155ea9bfe7341a0.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, 23, NULL, '2020-04-29 17:56:58', '2020-05-04 08:33:29', 1, 'test', '1', '0121654', 'skljdls@dasds.com', 'showroom2', 'dasdasd'),
(53, 'jkdnksajasd', 'dasjhdbaksj', '15885058915eaead2324376.png', '15885058925eaead242e7f1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'dahbsajd', 32, 23, NULL, '2020-05-03 11:38:12', '2020-05-03 11:38:12', 0, NULL, '0', '87213678', 'hjbasjdsa@dasdas.com', 'dhbasdjsa', 'dashvdh'),
(54, 'jdanskjdsad', 'dashbdjh', '15885059625eaead6a12e63.jpg', '15885059645eaead6cd2fc7.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, 23, NULL, '2020-05-03 11:39:25', '2020-05-03 11:39:25', 0, NULL, '0', '823794', 'asdas@casc.com', 'kjdsahk', 'hvjhvdj'),
(55, 'jbdkasjbdk', 'dhabsdjh', NULL, '15885060425eaeadbacc18e.png', NULL, NULL, NULL, NULL, NULL, NULL, 'dadsadasd', 32, 23, NULL, '2020-05-03 11:40:44', '2020-05-03 11:40:44', 0, NULL, '0', '213123', '12qwds@dasd.com', 'kjdaksjdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `showrooms_followers`
--

CREATE TABLE `showrooms_followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `showroom_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `showrooms_followers`
--

INSERT INTO `showrooms_followers` (`id`, `user_id`, `showroom_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(57, 18, 4, NULL, '2019-11-06 04:13:17', '2019-11-06 04:13:17'),
(58, 4, 30, NULL, '2019-11-06 15:25:07', '2019-11-06 15:25:07'),
(59, 4, 29, NULL, '2019-11-06 15:25:08', '2019-11-06 15:25:08'),
(60, 4, 28, NULL, '2019-11-06 15:25:08', '2019-11-06 15:25:08'),
(61, 4, 27, NULL, '2019-11-06 15:25:10', '2019-11-06 15:25:10'),
(62, 4, 5, NULL, '2019-11-06 15:25:10', '2019-11-06 15:25:10'),
(63, 4, 24, NULL, '2019-11-06 15:25:11', '2019-11-06 15:25:11'),
(64, 4, 25, NULL, '2019-11-06 15:25:12', '2019-11-06 15:25:12'),
(65, 4, 26, NULL, '2019-11-06 15:25:13', '2019-11-06 15:25:13'),
(66, 4, 4, NULL, '2019-11-06 15:25:15', '2019-11-06 15:25:15'),
(67, 24, 37, NULL, '2019-11-27 15:01:29', '2019-11-27 15:01:29'),
(68, 24, 43, NULL, '2019-11-27 15:01:37', '2019-11-27 15:01:37'),
(69, 24, 42, NULL, '2019-11-27 15:01:42', '2019-11-27 15:01:42'),
(70, 24, 41, NULL, '2019-11-27 15:01:48', '2019-11-27 15:01:48'),
(71, 24, 39, NULL, '2019-11-27 15:01:55', '2019-11-27 15:01:55'),
(72, 24, 38, NULL, '2019-11-27 15:02:01', '2019-11-27 15:02:01'),
(73, 24, 40, NULL, '2019-11-27 15:02:20', '2019-11-27 15:02:20'),
(74, 9, 5, NULL, '2019-12-30 15:38:55', '2019-12-30 15:38:55'),
(75, 25, 5, NULL, '2019-12-30 15:53:23', '2019-12-30 15:53:23'),
(76, 25, 27, NULL, '2019-12-30 15:54:44', '2019-12-30 15:54:44'),
(77, 44, 47, NULL, '2020-04-08 15:34:43', '2020-04-08 15:34:43'),
(78, 48, 47, NULL, '2020-04-28 13:00:52', '2020-04-28 13:00:52'),
(79, 48, 24, NULL, '2020-04-28 13:01:38', '2020-04-28 13:01:38'),
(80, 48, 5, NULL, '2020-04-28 13:01:40', '2020-04-28 13:01:40'),
(81, 48, 52, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `showroom_categories`
--

CREATE TABLE `showroom_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `showroom_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `showroom_categories`
--

INSERT INTO `showroom_categories` (`id`, `showroom_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 46, 6, NULL, NULL),
(2, 46, 5, NULL, NULL),
(3, 46, 8, NULL, NULL),
(4, 46, 9, NULL, NULL),
(5, 47, 6, NULL, NULL),
(6, 47, 5, NULL, NULL),
(7, 48, 5, NULL, NULL),
(8, 49, 5, NULL, NULL),
(9, 50, 6, NULL, NULL),
(10, 50, 5, NULL, NULL),
(11, 50, 8, NULL, NULL),
(12, 46, 15, NULL, NULL),
(13, 51, 6, NULL, NULL),
(14, 51, 5, NULL, NULL),
(15, 51, 11, NULL, NULL),
(16, 51, 12, NULL, NULL),
(17, 51, 16, NULL, NULL),
(18, 51, 18, NULL, NULL),
(19, 51, 19, NULL, NULL),
(20, 51, 27, NULL, NULL),
(21, 51, 32, NULL, NULL),
(22, 51, 35, NULL, NULL),
(23, 52, 6, NULL, NULL),
(24, 52, 19, NULL, NULL),
(25, 52, 24, NULL, NULL),
(26, 52, 26, NULL, NULL),
(27, 52, 27, NULL, NULL),
(36, 55, 5, NULL, NULL),
(37, 55, 11, NULL, NULL),
(38, 55, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `showroom_messages`
--

CREATE TABLE `showroom_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_body` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `showroom_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mesage_subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply` int(11) NOT NULL DEFAULT '0',
  `read` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `showroom_messages`
--

INSERT INTO `showroom_messages` (`id`, `message_body`, `showroom_id`, `user_id`, `created_at`, `updated_at`, `mesage_subject`, `reply`, `read`) VALUES
(56, NULL, 28, 21, '2019-11-06 16:14:30', '2020-01-09 15:14:22', 'proplem', 0, '1'),
(57, NULL, 28, 21, '2019-11-06 16:40:25', '2020-01-09 15:14:22', 'subject', 1, '1'),
(58, '.', 28, 21, '2019-11-06 16:40:32', '2020-01-09 15:14:22', 'subject', 1, '1'),
(59, 'dsfsdfsd', 28, 21, '2019-11-06 16:41:02', '2020-01-09 15:14:22', 'subject', 1, '1'),
(60, 'https://www.youtube.com/watch?v=TI_nQzvjL0I&list=PLnJmxpFkOPUk26tdr8HqVY8aFm62LDWTO&index=2', 28, 21, '2019-11-06 16:41:19', '2020-01-09 15:14:22', 'subject', 1, '1'),
(61, 'nm,.', 48, 4, '2020-01-15 15:22:36', '2020-01-15 15:24:39', 'no subject', 0, '1'),
(62, NULL, 48, 4, '2020-01-15 15:22:53', '2020-01-15 15:24:39', 'no subject', 0, '1'),
(63, 'hbjhbjb', 48, 4, '2020-01-15 15:23:45', '2020-01-15 15:24:39', 'no subject', 0, '1'),
(64, 'Hshshsh', 48, 4, '2020-01-15 15:24:39', '2020-01-15 15:24:39', 'subject', 1, '1'),
(65, '<p>test</p>', 48, 4, '2020-04-02 17:07:21', '2020-04-02 17:07:21', 'no subject', 0, '1'),
(66, '<p>لقيل</p>', 47, 48, '2020-04-28 13:00:56', '2020-04-28 13:00:56', 'no subject', 0, '0'),
(67, '<p>testmessage</p>', 52, 4, '2020-05-04 10:31:37', '2020-05-04 10:33:33', 'no subject', 0, '1'),
(68, '<p>testmessage</p>', 52, 4, '2020-05-04 10:32:45', '2020-05-04 10:33:33', 'no subject', 0, '1'),
(69, '<p>test</p>', 4, 32, '2020-05-04 11:25:37', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(70, '<p>shvdjasdas</p>', 4, 32, '2020-05-04 11:27:28', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(71, '<p>dahsbvjhsavdsad</p>', 4, 32, '2020-05-04 11:30:38', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(72, '<p>dahsbvjhsavdsad</p>', 4, 32, '2020-05-04 11:30:56', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(73, '<p>test</p>', 4, 32, '2020-05-04 11:31:00', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(74, '<p>test</p>', 4, 32, '2020-05-04 11:42:49', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(75, '<p>فثسف</p>', 4, 32, '2020-05-04 11:44:42', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(76, '<p>بسبالاسشتي</p>', 4, 32, '2020-05-04 11:46:44', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(77, '<p>testdbhasjhsa</p>', 4, 32, '2020-05-04 12:07:03', '2020-05-13 11:23:29', 'subject', 1, '1'),
(78, '<p>jknkjbdakjsd</p>', 4, 32, '2020-05-04 12:12:04', '2020-05-13 11:23:29', 'subject', 1, '1'),
(79, '<p>fdsfsdfdsfsdfdsf</p>', 4, 32, '2020-05-04 13:52:15', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(80, '<p>dsdasdasdasd</p>', 4, 32, '2020-05-04 13:52:56', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(81, '<p>dasdsadasdasd</p>', 4, 32, '2020-05-04 13:53:12', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(82, '<p>test</p>', 4, 32, '2020-05-04 13:54:14', '2020-05-13 11:23:29', 'subject', 1, '1'),
(83, '<p>dhads&nbsp;dbsahdjsajdhjasdd</p>', 4, 32, '2020-05-12 11:52:16', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(84, '<p>baselalyabdelfatah</p>', 4, 32, '2020-05-12 11:52:35', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(85, '<p>daracshowroomhellocj</p>', 4, 32, '2020-05-12 11:57:02', '2020-05-13 11:23:29', 'subject', 1, '1'),
(86, '<p>test<br><br>basel<br><br>aly<br><br>text</p>', 4, 32, '2020-05-12 12:00:58', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(87, '<p>test&nbsp;basel&nbsp;aly&nbsp;text&nbsp;hello<br></p>', 4, 32, '2020-05-12 12:05:55', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(88, '<p>darac&nbsp;showroom&nbsp;in&nbsp;your&nbsp;service<br></p>', 4, 32, '2020-05-12 12:06:13', '2020-05-13 11:23:29', 'subject', 1, '1'),
(89, '<p>test<br></p>', 4, 32, '2020-05-13 10:58:50', '2020-05-13 11:23:29', 'subject', 1, '1'),
(90, '<p>basel<br></p>', 4, 32, '2020-05-13 10:58:57', '2020-05-13 11:23:29', 'subject', 1, '1'),
(91, '<p>one<br></p>', 4, 32, '2020-05-13 11:03:29', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(92, '<p>two<br></p>', 4, 32, '2020-05-13 11:03:35', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(93, '<p>three<br></p>', 4, 32, '2020-05-13 11:08:41', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(94, '<p>four<br></p>', 4, 32, '2020-05-13 11:08:47', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(95, '<p>Lorem&nbsp;Ipsumis&nbsp;simply&nbsp;dummy&nbsp;text&nbsp;of&nbsp;the&nbsp;printing&nbsp;and&nbsp;typesetting&nbsp;industry.&nbsp;Lorem&nbsp;Ipsum&nbsp;has&nbsp;been&nbsp;the&nbsp;industry\'s&nbsp;standard&nbsp;dummy&nbsp;text&nbsp;ever&nbsp;since&nbsp;the&nbsp;1500s,&nbsp;when&nbsp;an&nbsp;unknown&nbsp;printer&nbsp;took&nbsp;a&nbsp;galley&nbsp;of&nbsp;type&nbsp;and&nbsp;scrambled&nbsp;it&nbsp;to&nbsp;make&nbsp;a&nbsp;type&nbsp;specimen&nbsp;book.&nbsp;It&nbsp;has&nbsp;survived&nbsp;not&nbsp;only&nbsp;five&nbsp;centuries,&nbsp;but&nbsp;also&nbsp;the&nbsp;leap&nbsp;into&nbsp;electronic&nbsp;typesetting,&nbsp;remaining&nbsp;essentially&nbsp;unchanged.&nbsp;It&nbsp;was&nbsp;popularised&nbsp;in&nbsp;the<br></p>', 4, 32, '2020-05-13 11:14:57', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(96, '<p>tes<br></p>', 4, 32, '2020-05-13 11:22:28', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(97, '<p>test<br></p>', 4, 32, '2020-05-13 11:22:39', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(98, '<p>test<br>test<br></p>', 4, 32, '2020-05-13 11:22:53', '2020-05-13 11:23:29', 'no subject', 0, '1'),
(99, '<p>sdasdasd<br>test</p>', 4, 32, '2020-05-13 11:23:28', '2020-05-13 11:23:29', 'subject', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `showroom_reviews`
--

CREATE TABLE `showroom_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `showroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `rate` int(11) NOT NULL,
  `services` int(11) DEFAULT NULL,
  `sales` int(11) DEFAULT NULL,
  `prices` int(11) DEFAULT NULL,
  `qualities` int(11) DEFAULT NULL,
  `others` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `showroom_reviews`
--

INSERT INTO `showroom_reviews` (`id`, `user_id`, `showroom_id`, `review`, `rate`, `services`, `sales`, `prices`, `qualities`, `others`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, 4, 48, NULL, 3, 1, 1, 1, NULL, NULL, NULL, '2020-03-02 14:10:26', '2020-03-02 14:10:26'),
(12, 4, 48, 'adssadsad \r\n        adssadads', 2, 1, 1, 1, NULL, NULL, NULL, '2020-03-02 18:10:05', '2020-03-02 18:11:09'),
(16, 32, 48, 'bnxjhxvajxvashvsdhvjasdasd \r\n        dsfcscsdcdsc', 3, 1, NULL, NULL, NULL, NULL, NULL, '2020-04-29 19:33:14', '2020-04-29 19:47:03'),
(18, 32, 5, 'dsfsdfhdiuahciasc', 4, 1, 1, 1, NULL, NULL, NULL, '2020-05-07 12:51:58', '2020-05-07 12:51:58'),
(19, 32, NULL, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, '2020-05-07 13:02:25', '2020-05-07 13:02:25'),
(20, 32, NULL, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, '2020-05-07 13:10:06', '2020-05-07 13:10:06'),
(21, 32, NULL, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, '2020-05-07 13:11:11', '2020-05-07 13:11:11'),
(22, 32, 50, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, '2020-05-11 08:36:24', '2020-05-11 08:36:24'),
(23, 32, 24, 'test review', 2, 1, 1, 1, 1, 1, NULL, '2020-05-11 08:44:01', '2020-05-11 08:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `showroom_review_likes`
--

CREATE TABLE `showroom_review_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `showroom_review_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `showroom_styles`
--

CREATE TABLE `showroom_styles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `showroom_id` bigint(20) UNSIGNED NOT NULL,
  `style_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `showroom_styles`
--

INSERT INTO `showroom_styles` (`id`, `showroom_id`, `style_id`, `created_at`, `updated_at`) VALUES
(1, 46, 1, NULL, NULL),
(2, 46, 2, NULL, NULL),
(3, 47, 1, NULL, NULL),
(4, 47, 2, NULL, NULL),
(5, 48, 1, NULL, NULL),
(6, 49, 1, NULL, NULL),
(7, 50, 1, NULL, NULL),
(8, 4, 1, NULL, NULL),
(9, 51, 1, NULL, NULL),
(10, 51, 2, NULL, NULL),
(11, 52, 1, NULL, NULL),
(12, 52, 2, NULL, NULL),
(17, 55, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`id`, `name_en`, `name_ar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Modern', 'مودرن', NULL, '2019-09-17 15:29:16', '2019-11-06 19:46:48'),
(2, 'Classic', 'كلاسيك', NULL, '2019-10-30 20:04:03', '2019-10-30 20:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `body`, `link`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(16, 'test posting on the community', 'http://mezomasr.blogspot.com/p/blog-page_20.html', '2019-11-06 16:19:46', '2019-11-06 16:19:46', NULL, 21),
(18, 'test update &community', NULL, '2019-12-30 15:30:54', '2019-12-30 15:31:38', '2019-12-30 15:31:38', 9),
(19, 'test updates &community', NULL, '2019-12-30 15:32:23', '2019-12-30 15:32:33', '2019-12-30 15:32:33', 9),
(20, 'test updates & community', NULL, '2019-12-30 15:35:24', '2019-12-30 15:35:24', NULL, 9),
(21, 'showroomoffersedited showroomoffersedited showroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomofferseditedshowroomoffersedited the  end', NULL, '2019-12-31 13:58:09', '2019-12-31 13:58:31', '2019-12-31 13:58:31', 9),
(22, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, '2020-01-04 00:39:31', '2020-01-04 00:40:07', '2020-01-04 00:40:07', 4),
(23, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, '2020-01-04 00:40:38', '2020-01-04 00:40:38', NULL, 4),
(24, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).See Less', NULL, '2020-01-04 01:48:22', '2020-01-04 01:48:22', NULL, 4),
(25, 'of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex', NULL, '2020-01-04 01:55:03', '2020-01-04 01:55:03', NULL, 4),
(26, 'of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex', NULL, '2020-01-04 01:56:37', '2020-01-04 01:56:37', NULL, 4),
(27, 'of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex', NULL, '2020-01-04 01:57:04', '2020-01-04 01:57:04', NULL, 4),
(28, 'of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex', NULL, '2020-01-04 01:57:31', '2020-01-04 01:57:31', NULL, 4),
(29, '\"شقتك على طريق زويل مباشرة \"\r\n\r\nشقة 75 م ( 2 غرفة نوم + ريسبشن + حمام + مطبخ)\r\n\r\nكاملة المرافق والخدمات ( مول على 2 فدان + مساحات خضراء + حمام سباحة + ملعب كرة + kids area)\r\nالتعاقد بحصة فى الأرض.\r\nكل دة واكتر هتلاقيه متوفر لما تحجز بكمبوند أليكو سيتى وشوف بنفسك .', NULL, '2020-01-04 02:07:31', '2020-01-04 02:07:31', NULL, 4),
(30, '\"شقتك على طريق زويل مباشرة \"\r\n\r\nشقة 75 م ( 2 غرفة نوم + ريسبشن + حمام + مطبخ)\r\n\r\nكاملة المرافق والخدمات ( مول على 2 فدان + مساحات خضراء + حمام سباحة + ملعب كرة + kids area)\r\n\r\nالتعاقد بحصة فى الأرض.\r\n\r\nكل دة واكتر هتلاقيه متوفر لما تحجز بكمبوند أليكو سيتى وشوف بنفسك .\r\nWhat’s app:01117122507\r\nCall us: 01010201582', NULL, '2020-01-04 02:08:07', '2020-01-04 02:08:07', NULL, 4),
(31, 'للبيع شقة في الشيخ زايد بمساحة ٩٧ متر فى الحى ١٣ اقتصادى وتشطيب سوبر لوكس دور ٣ العمارة على ناصية و شارع رئيسي أمام كمبوند جوار وتطل على البارك مكونة من ٣ غرف وصاله كبيره ٢ قطعة وحمام ومطبخ كبير . تشطيب سوبرلوكس مطلوب ٥٦٠ الف . يوجد فيديو للشقة . 01158086000', NULL, '2020-01-04 02:16:21', '2020-01-04 02:16:21', NULL, 7),
(32, '<p>Hi there&nbsp;</p>', NULL, '2020-04-28 13:04:48', '2020-04-28 13:04:48', NULL, 48);

-- --------------------------------------------------------

--
-- Table structure for table `topic_categories`
--

CREATE TABLE `topic_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_categories`
--

INSERT INTO `topic_categories` (`id`, `topic_id`, `category_id`, `created_at`, `updated_at`) VALUES
(26, 12, 12, NULL, NULL),
(27, 12, 13, NULL, NULL),
(28, 13, 8, NULL, NULL),
(29, 13, 9, NULL, NULL),
(30, 13, 10, NULL, NULL),
(31, 14, 6, NULL, NULL),
(32, 14, 5, NULL, NULL),
(33, 14, 8, NULL, NULL),
(34, 15, 6, NULL, NULL),
(35, 16, 6, NULL, NULL),
(36, 16, 5, NULL, NULL),
(37, 16, 10, NULL, NULL),
(38, 17, 6, NULL, NULL),
(39, 17, 5, NULL, NULL),
(40, 17, 8, NULL, NULL),
(41, 18, 5, NULL, NULL),
(42, 18, 8, NULL, NULL),
(43, 18, 9, NULL, NULL),
(44, 19, 6, NULL, NULL),
(45, 19, 5, NULL, NULL),
(46, 19, 8, NULL, NULL),
(47, 20, 6, NULL, NULL),
(48, 21, 6, NULL, NULL),
(49, 21, 8, NULL, NULL),
(50, 22, 6, NULL, NULL),
(51, 22, 5, NULL, NULL),
(52, 22, 8, NULL, NULL),
(53, 23, 6, NULL, NULL),
(54, 24, 6, NULL, NULL),
(55, 25, 6, NULL, NULL),
(56, 26, 6, NULL, NULL),
(57, 27, 8, NULL, NULL),
(58, 28, 8, NULL, NULL),
(59, 29, 6, NULL, NULL),
(60, 30, 6, NULL, NULL),
(61, 31, 10, NULL, NULL),
(62, 32, 44, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topic_comments`
--

CREATE TABLE `topic_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_comments`
--

INSERT INTO `topic_comments` (`id`, `topic_id`, `user_id`, `comment`, `image`, `created_at`, `updated_at`) VALUES
(32, 16, 4, 'comment', NULL, '2019-12-30 15:27:01', '2019-12-30 15:27:01'),
(33, 20, 9, 'comment', '15777930585e0b3622e8e96.jpg', '2019-12-31 13:50:59', '2019-12-31 13:50:59'),
(34, 20, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer too', NULL, '2020-01-04 01:00:44', '2020-01-04 01:00:44'),
(35, 25, 4, 'of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan', NULL, '2020-01-04 01:55:45', '2020-01-04 01:55:45'),
(36, 25, 4, 'of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan', NULL, '2020-01-04 01:56:03', '2020-01-04 01:56:03'),
(37, 28, 4, 'of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex', NULL, '2020-01-04 02:01:53', '2020-01-04 02:01:53'),
(38, 29, 4, 'Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is tha', NULL, '2020-01-04 02:10:06', '2020-01-04 02:10:06'),
(39, 29, 7, 'للبيع شقة في الشيخ زايد بمساحة ٩٧ متر فى الحى ١٣ اقتصادى وتشطيب سوبر لوكس دور ٣ العمارة على ناصية و شارع رئيسي أمام كمبوند جوار وتطل على البارك مكونة من ٣ غرف وصاله كبيره ٢ قطعة وح', NULL, '2020-01-04 02:18:50', '2020-01-04 02:18:50'),
(40, 29, 7, 'للبيع شقة في الشيخ زايد بمساحة ٩٧ متر فى الحى ١٣ اقتصادى وتشطيب سوبر لوكس دور ٣ العمارة على ناصية و شارع رئيسي أمام كمبوند جوار وتطل على البارك مكونة من ٣ غرف وصاله كبيره ٢ قطعة وح', NULL, '2020-01-04 02:19:06', '2020-01-04 02:19:06'),
(41, 31, 4, 'Xvbhhhhf', '15782188565e11b568c99e6.jpg', '2020-01-05 12:07:36', '2020-01-05 12:07:36'),
(42, 31, 4, 'cvbnm', '15782194235e11b79f44813.jpg', '2020-01-05 12:17:03', '2020-01-05 12:17:03'),
(43, 32, 32, '<p>shdsjahsdasda</p><p><br></p>', NULL, '2020-05-04 10:02:32', '2020-05-04 10:02:32'),
(44, 32, 32, '<p>hdsabjsbdsjadajhbjhjhjds</p><p><br></p>', NULL, '2020-05-04 11:51:52', '2020-05-04 11:51:52'),
(45, 32, 32, '<p>test</p><p><br></p>', NULL, '2020-05-04 11:55:39', '2020-05-04 11:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `topic_comment_likes`
--

CREATE TABLE `topic_comment_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_comment_likes`
--

INSERT INTO `topic_comment_likes` (`id`, `comment_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 32, 4, '2019-12-30 15:27:11', '2019-12-30 15:27:11'),
(13, 37, 4, '2020-01-04 02:13:32', '2020-01-04 02:13:32'),
(14, 37, 7, '2020-01-04 02:19:32', '2020-01-04 02:19:32'),
(15, 36, 7, '2020-01-04 02:19:40', '2020-01-04 02:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `topic_comment_replies`
--

CREATE TABLE `topic_comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_comment_replies`
--

INSERT INTO `topic_comment_replies` (`id`, `comment_id`, `user_id`, `reply`, `created_at`, `updated_at`) VALUES
(18, 32, 4, 'nnnn', '2019-12-30 15:27:16', '2019-12-30 15:27:16'),
(19, 32, 25, 'kkk', '2019-12-30 15:43:12', '2019-12-30 15:43:12'),
(20, 32, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer too', '2020-01-04 01:00:04', '2020-01-04 01:00:04'),
(21, 35, 4, 'of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy tex of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan', '2020-01-04 01:55:53', '2020-01-04 01:55:53'),
(22, 38, 4, '\"شقتك على طريق زويل مباشرة \"  شقة 75 م ( 2 غرفة نوم + ريسبشن + حمام + مطبخ)  كاملة المرافق والخدمات ( مول على 2 فدان + مساحات خضراء + حمام سباحة + ملعب كرة + kids area)  التعاقد ب', '2020-01-04 02:10:13', '2020-01-04 02:10:13'),
(23, 43, 32, '<p>sbdhjhbasdsa</p><p><br></p>', '2020-05-04 10:02:37', '2020-05-04 10:02:37'),
(24, 43, 32, '<p>mcbskvbaksd</p><p><br></p>', '2020-05-09 02:55:35', '2020-05-09 02:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `topic_images`
--

CREATE TABLE `topic_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_images`
--

INSERT INTO `topic_images` (`id`, `topic_id`, `image`, `created_at`, `updated_at`) VALUES
(25, 16, '15730319865dc29032657cb.jpg', '2019-11-06 16:19:46', '2019-11-06 16:19:46'),
(26, 17, '15748486325dde487810693.jpg', '2019-11-27 11:57:12', '2019-11-27 11:57:12'),
(27, 17, '15748486325dde487838647.jpg', '2019-11-27 11:57:12', '2019-11-27 11:57:12'),
(28, 17, '15748486325dde487842345.jpg', '2019-11-27 11:57:12', '2019-11-27 11:57:12'),
(29, 18, '15777126545e09fc0ef2b19.jpg', '2019-12-30 15:30:55', '2019-12-30 15:30:55'),
(30, 19, '15777127435e09fc67ea99b.jpg', '2019-12-30 15:32:24', '2019-12-30 15:32:24'),
(31, 20, '15777129245e09fd1cf3d32.jpg', '2019-12-30 15:35:25', '2019-12-30 15:35:25'),
(32, 21, '15777934895e0b37d117e05.jpg', '2019-12-31 13:58:09', '2019-12-31 13:58:09'),
(33, 22, '15780911715e0fc2a30fae6.jpg', '2020-01-04 00:39:31', '2020-01-04 00:39:31'),
(34, 22, '15780911715e0fc2a33249c.jpg', '2020-01-04 00:39:31', '2020-01-04 00:39:31'),
(35, 22, '15780911715e0fc2a34560e.jpg', '2020-01-04 00:39:31', '2020-01-04 00:39:31'),
(36, 22, '15780911715e0fc2a34f550.jpg', '2020-01-04 00:39:31', '2020-01-04 00:39:31'),
(37, 23, '15780912385e0fc2e69e782.jpg', '2020-01-04 00:40:38', '2020-01-04 00:40:38'),
(38, 23, '15780912385e0fc2e6b676a.jpg', '2020-01-04 00:40:38', '2020-01-04 00:40:38'),
(39, 23, '15780912385e0fc2e6c75e6.jpg', '2020-01-04 00:40:38', '2020-01-04 00:40:38'),
(40, 23, '15780912385e0fc2e6d2a1f.jpg', '2020-01-04 00:40:38', '2020-01-04 00:40:38'),
(41, 24, '15780953025e0fd2c6dc51d.jpg', '2020-01-04 01:48:23', '2020-01-04 01:48:23'),
(42, 25, '15780957035e0fd4574cb5e.jpg', '2020-01-04 01:55:03', '2020-01-04 01:55:03'),
(43, 26, '15780957975e0fd4b5c35a0.jpg', '2020-01-04 01:56:37', '2020-01-04 01:56:37'),
(44, 27, '15780958245e0fd4d0ab0a8.jpg', '2020-01-04 01:57:04', '2020-01-04 01:57:04'),
(45, 28, '15780958515e0fd4ebf06fe.jpg', '2020-01-04 01:57:32', '2020-01-04 01:57:32'),
(46, 29, '15780964515e0fd7435a5c8.jpg', '2020-01-04 02:07:31', '2020-01-04 02:07:31'),
(47, 30, '15780964875e0fd767db654.jpg', '2020-01-04 02:08:08', '2020-01-04 02:08:08'),
(48, 31, '15780969815e0fd955b4c14.jpg', '2020-01-04 02:16:21', '2020-01-04 02:16:21'),
(49, 32, '15880718885ea80dd0e5c0a.png', '2020-04-28 13:04:49', '2020-04-28 13:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `topic_reply_likes`
--

CREATE TABLE `topic_reply_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reply_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_reply_likes`
--

INSERT INTO `topic_reply_likes` (`id`, `reply_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 19, 4, '2020-01-04 01:00:12', '2020-01-04 01:00:12'),
(4, 20, 4, '2020-01-04 01:00:16', '2020-01-04 01:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `upholsteries`
--

CREATE TABLE `upholsteries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upholsteries`
--

INSERT INTO `upholsteries` (`id`, `name_en`, `name_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fabric', 'قماش', '2019-09-17 15:49:09', '2019-11-01 23:29:48', NULL),
(2, 'Leather', 'جلد', '2019-11-01 23:30:19', '2019-11-01 23:30:19', NULL),
(3, 'Waterproof Fabric', 'قماش ضد الماء', '2019-11-01 23:31:37', '2019-11-01 23:31:37', NULL),
(4, 'Not Upholstered', 'بدون تنجيد', '2019-11-01 23:35:58', '2019-11-01 23:35:58', NULL),
(5, 'Polypropylene', 'البولي بروبلين', '2019-11-03 22:01:22', '2019-11-03 22:01:22', NULL),
(6, 'Wool', 'صوف', '2019-11-03 22:01:43', '2019-11-03 22:01:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content_creator` tinyint(4) NOT NULL DEFAULT '0',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cover.jpg',
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `content_creator`, `first_name`, `last_name`, `image`, `cover`, `hidden`, `gender`, `district_id`, `date`, `city_id`, `country_id`) VALUES
(1, 'McMillan@Mac.com', NULL, '$2y$10$qNujzMvAlAiTGe/vSUuCQ.5EDh0.Atd1T.wxcwMpwgJe02vdoVWwe', NULL, '2019-09-10 16:32:23', '2019-09-10 16:32:23', 0, 'MAC', 'Millan', 'user.png', 'cover.jpg', 0, NULL, 0, '2019-10-28 17:15:38', NULL, NULL),
(2, 'h.elrabbat@yalla-furnish.com', NULL, '$2y$10$u1RwtcxBHjv6aD2CrWHytuw8rXOgaXKLsLVNhzP9mG5tyJK/FmVvS', NULL, '2019-09-11 12:53:23', '2019-09-11 13:08:32', 0, 'Hussam', 'El-Rabbat', '15681929125d78b9905c4fe.jpg', '15681929125d78b99073621.png', 0, NULL, 0, '2019-10-28 17:15:38', NULL, NULL),
(3, 'yaraayman176@gmail.com', NULL, '$2y$10$dHOIiSfLI2iLj139n8tTYeQ7b1Amr5G1nrOHtFOgZII5pN8YQDpcW', NULL, '2019-09-16 13:22:28', '2019-09-16 13:22:28', 0, 'yara', 'ayman', 'user.png', 'cover.jpg', 0, NULL, 0, '2019-10-28 17:15:38', NULL, NULL),
(4, 'info@yalla-furnish.com', NULL, '$2y$10$E4e8Tba8jzKrXbLYXSGEMeQSZpUWnn508WQSjEODoCxeSoSVYL9GS', 'tl0XVLHySqvXtWvRLs2LFWNsohZPePPRbFmaW0hJujMkt3VRSCbT3znglou7', '2019-09-17 13:02:50', '2020-01-15 11:51:43', 1, 'Yalla', 'Furnish', '15714959115dab1fe730b19.png', '15714959115dab1fe731800.png', 0, 'female', 21, '2019-10-28 17:15:38', NULL, NULL),
(5, 'ahmed.dabour@minvotech.com', NULL, '$2y$12$S5BY807Z6h/ZbY/hJ/OGB.EZmBFr9zT6N3TcnqBk8Uiaek97Jlzmy', 'bF3wGAaCndjiPt8q1QRY0T37QzX3VvFzcI1U6eTom15blrkHUAy9D5pbbX5l', '2019-10-17 20:14:07', '2019-10-29 18:27:24', 0, 'Ahmed', 'Dabour', '15723520445db8302cd7205.jpg', 'cover.jpg', 0, 'male', 0, '2019-10-28 17:15:38', NULL, NULL),
(6, 'maha.saeed@yalla-furnish.com', NULL, '$2y$10$SDJRf9F/Vh8QwKjzBGB4B.LXzPBXyr12pS8FpVpU7IMzywLFhb9Hy', NULL, '2019-10-20 00:40:24', '2019-10-20 00:49:12', 1, 'Maha', 'Saeed', 'user.png', 'cover.jpg', 0, NULL, 0, '2019-10-28 17:15:38', NULL, NULL),
(7, 'momaha880@gmail.com', NULL, '$2y$10$V5DatsLUI.cSyC4EMTzP1edmxWiiCNak5O2zn/IBhGHnfN8QM5ymm', NULL, '2019-10-20 16:51:40', '2020-01-04 02:17:57', 0, 'Maha', 'Ssaeed', '15724797645dba23143aaf7.JPG', '15724797075dba22dbadd36.jpg', 1, 'female', 0, '2019-10-28 17:15:38', NULL, 3),
(8, 'yara.ayman@ayklam.com', NULL, '$2y$10$DDbmcY2C0DSJQV5V5f6baeHbi3quqtBMO/LeaKuWhYf/R9fCt4sVq', NULL, '2019-10-23 20:45:00', '2019-10-23 20:45:00', 0, 'yara', 'ayman', 'user.png', 'cover.jpg', 0, NULL, 0, '2019-10-28 17:15:38', NULL, NULL),
(9, 'youmn.hussien97@gmail.com', NULL, '$2y$10$ooegI7JNf41GJLaY/EpMuu9SixGmbECQqSYnBpHGoG3/lCGxEFUDq', NULL, '2019-10-27 20:10:02', '2019-12-30 14:10:39', 0, 'youmn', 'hussien', 'user.png', 'cover.jpg', 0, NULL, 0, '2019-10-28 17:15:38', NULL, NULL),
(10, 'youmn.hussien@yalla-furnish.com', NULL, '$2y$10$YO/uKRVUoUCPgCWUOiCGDO0ZB1I46csWvkaf103ZwFIZ32D.mTuGa', NULL, '2019-10-29 21:13:28', '2019-10-30 15:09:59', 0, 'youmn', 'hussien', '15724265995db95367ba7f9.jpg', '15724265995db95367bb686.jpg', 0, 'female', 20, '2019-10-29 15:13:28', NULL, NULL),
(11, 'youmn.hussien97@yahoo.com', NULL, '$2y$10$TicF2Jxj3NkCeuvZ.4ByLe0ILBVmEv8quu7REUqf40C3DYXhHahfm', NULL, '2019-10-30 13:04:59', '2019-10-30 13:04:59', 0, 'y', 'h', NULL, 'cover.jpg', 0, 'female', 20, '2019-10-30 07:04:59', NULL, NULL),
(12, 'proghima54@gmail.com', NULL, '$2y$10$zG/dTU5ycH1AUbqPTc0M2OqxvbCnEcXH/XUVKpYN6GJaBNbD.mN.e', NULL, '2019-10-30 14:54:09', '2019-10-30 15:07:47', 0, 'yar', 'ayman', NULL, 'cover.jpg', 0, 'female', 19, '2019-10-30 08:54:09', NULL, NULL),
(13, 'yousef@btngan.com', NULL, '$2y$10$cHr.3kFs5Czkj2R4Hl/wtOWcstpxYggcxVYR8OC/2giXnQECO1yS6', NULL, '2019-10-30 17:12:11', '2019-10-30 17:12:11', 0, 'yousef', 'ayman', NULL, 'cover.jpg', 0, 'male', 19, '2019-10-30 11:12:11', NULL, NULL),
(14, 'houssam.elrabbat@gmail.com', NULL, '$2y$10$YctR7xpctxIEj4nP6c7ZtOhtwlinwbt0LVhMlUn/3srfjAhZfMZDW', NULL, '2019-11-02 04:02:32', '2019-11-03 03:33:28', 1, 'Hussam', 'El-Rabbat', NULL, '15726458965dbcac084f3cd.jpg', 0, 'male', 19, '2019-11-01 22:02:32', NULL, NULL),
(15, 'hisham.abuzaid@yalla-furnish.com', NULL, '$2y$10$IisJRny0J/oet.CT2Bi8qeqHDAM8gr7lU98f.bQQ4fdlQt5ZD2Ulu', NULL, '2019-11-03 03:39:57', '2019-11-03 03:52:16', 0, 'Hisham', 'Abuzaid', '15727315365dbdfa90c99e1.jpeg', 'cover.jpg', 0, 'male', 16, '2019-11-02 21:39:57', NULL, NULL),
(16, 'reham.loootfy@gmail.com', NULL, '$2y$10$rGNh/oTFxy1.WGLBVNwB1.PGv44w3qn8sq6iWglfw0tJtqvGPal7S', NULL, '2019-11-03 22:42:58', '2019-11-03 22:42:58', 0, 'reham', 'lotfy', NULL, 'cover.jpg', 0, 'female', 20, '2019-11-03 15:42:58', NULL, NULL),
(17, 'hr.yasmin.anwar@gmail.com', NULL, '$2y$10$b5V1uY9KtHYuKbWaKwIU1ezmVoyqfUWqr1xfXhfGbk7.cq8rHA.mu', NULL, '2019-11-03 23:13:55', '2019-11-03 23:13:55', 0, 'Yasmin', 'Omar', NULL, 'cover.jpg', 0, 'female', 17, '2019-11-03 16:13:55', NULL, NULL),
(18, 'shahdanwar77@icloud.com', NULL, '$2y$10$OGndmpYUGZSkp3yudmNPce/wNftFsSDCq9nrfmycTUXtImxutcq3O', NULL, '2019-11-06 04:11:42', '2019-11-06 04:11:42', 0, 'Shahd', 'Anwar', NULL, 'cover.jpg', 0, 'female', 23, '2019-11-05 21:11:42', NULL, NULL),
(19, 'shaimaayasser66@gmail.com', NULL, '$2y$10$0j8wPcCzeoeGotI/ZTmX5.LYesLIz6Eo88XJYKEo2cLwTv0bTKIuG', NULL, '2019-11-06 15:02:32', '2019-11-06 15:02:32', 0, 'Shaimaa', 'Yasser', NULL, 'cover.jpg', 0, 'female', 23, '2019-11-06 08:02:32', NULL, NULL),
(20, 'test3452gfgh1478996hgfhjgf@gmail.com', NULL, '$2y$10$5oDFTsDeNcM93.FuQ0wP6emUtowHJUcBlkcAOc3hcY71DGIs2oXLq', NULL, '2019-11-06 15:04:58', '2019-11-06 15:04:58', 0, 'test', 'test', NULL, 'cover.jpg', 0, 'male', 23, '2019-11-06 08:04:58', NULL, NULL),
(21, 'youmna.hussien97@yahoo.com', NULL, '$2y$10$p4BSl3Ck9L1dMFWS1ZS6KucOLzvo/hKmKjuLYHePPrYAmsiYR1DMW', NULL, '2019-11-06 15:42:39', '2019-11-06 15:42:39', 0, 'yo', 'h', NULL, 'cover.jpg', 0, 'female', 21, '2019-11-06 08:42:39', NULL, NULL),
(22, 'faten.3000@yahoo.com', NULL, '$2y$10$8i.ysa/QIgVnU0y5ew0Aquigg0H7aV35VZRkGMzjNf2w0PYnHmuNe', NULL, '2019-11-07 17:11:08', '2019-11-07 17:11:08', 0, 'Faten', 'Essam', NULL, 'cover.jpg', 0, 'female', 23, '2019-11-07 10:11:08', NULL, NULL),
(23, 'mahmoud@gmail.com', NULL, '$2y$10$do4cAPbP0q9vKVufRijUP.n4jJEv8CsRxD2bP21cImaAlBRPPyF7.', NULL, '2019-11-11 15:52:07', '2019-11-11 15:52:07', 0, 'Ahmed', 'Gamal', NULL, 'cover.jpg', 0, 'male', 23, '2019-11-11 13:52:07', NULL, NULL),
(24, 'mahmoud.g@outlook.com', NULL, '$2y$10$2DOu0JR/EqN0qdDUdis0IeM.1n/tG47heAd4gXKgmKGLAgDj/xtkG', NULL, '2019-11-27 11:56:30', '2019-11-27 11:56:30', 0, 'Mahmoud', 'Gamal', NULL, 'cover.jpg', 0, 'male', 23, '2019-11-27 09:56:30', NULL, NULL),
(25, 'hisham.abuzaid@hotmail.com', NULL, '$2y$10$4i5caOV0YuWNPD/FBEXSxO.MhPZ0pKkQCRaynVP9jEFIgrzwdoj9q', NULL, '2019-12-30 14:40:27', '2019-12-30 14:40:27', 0, 'Hisham', 'Abuziad', NULL, 'cover.jpg', 0, 'male', NULL, '2019-12-30 12:40:27', NULL, 3),
(26, 'nourhan.waheed@minvotech.com', NULL, '$2y$10$0aEKKOlkTo9ZzhY.2mv.2edRp35cCGv/SWEMIEU.Fz7.hRAe7PLLG', NULL, '2020-04-02 11:09:06', '2020-04-02 11:09:06', 0, 'Nourhan', 'Waheed', NULL, 'cover.jpg', 0, 'female', NULL, '2020-04-02 09:09:06', 21, 3),
(27, 'n@gmail.com', NULL, '$2y$10$CpITZADcgznJPIqdXXO2bOVerUrEL0NKrEPXD1ZMu5OPjlyurwpO6', NULL, '2020-04-02 11:21:09', '2020-04-02 11:21:09', 0, 'n', 'n', NULL, 'cover.jpg', 0, 'female', NULL, '2020-04-02 09:21:09', 15, 3),
(28, 'test@yalla.com', NULL, '$2y$10$5.bw3yThyoD3hlrjf.SR4.gP37pJ7ARfOrx/KuKC4Q3ED.NvX8jfy', NULL, '2020-04-02 23:07:10', '2020-04-02 23:07:10', 0, 'test20', 'test20', NULL, 'cover.jpg', 0, 'male', NULL, '2020-04-02 21:07:10', 27, 3),
(29, 'm@gmail.com', NULL, '$2y$10$k/oTEGMVSoJY7OY/sTCQNeazt6DSRtZlEiOcgE3r9RfYBSwXAnDY2', NULL, '2020-04-05 11:52:59', '2020-04-05 11:52:59', 0, 'n', 'n', NULL, 'cover.jpg', 0, 'female', NULL, '2020-04-05 09:52:59', 15, 3),
(30, 'nn@gmail.com', NULL, '$2y$10$uzFb51AX7yX38qQCBdZM1OHt71RTZWTGkZxIBieJAQwIgqD.083aS', NULL, '2020-04-05 11:55:50', '2020-04-05 11:55:50', 0, 'n', 'n', NULL, 'cover.jpg', 0, 'female', NULL, '2020-04-05 09:55:50', 17, 3),
(31, 'nnn@gmail.com', NULL, '$2y$10$VJ8oUHOZVLxC1puIanHI6OYW87qGbeR7/bQkKQpZiXUx939v0E3SC', NULL, '2020-04-05 11:57:21', '2020-04-05 11:57:21', 0, 'n', 'n', NULL, 'cover.jpg', 0, 'female', NULL, '2020-04-05 09:57:21', 17, 3),
(32, 'basel.3ly@gmail.com', NULL, '$2y$10$E4e8Tba8jzKrXbLYXSGEMeQSZpUWnn508WQSjEODoCxeSoSVYL9GS', NULL, '2020-04-05 12:44:01', '2020-04-05 12:44:01', 1, 'basel', 'aly', NULL, 'cover.jpg', 0, 'male', NULL, '2020-04-05 10:44:01', NULL, 12),
(33, 'nnnn@gmail.com', NULL, '$2y$10$leeoE97x/n6/1Z1rbIQU/eSrKybtlg4pVlZteUo5KeMhAlzDl9i72', NULL, '2020-04-05 12:47:52', '2020-04-05 12:47:52', 0, 'n', 'n', NULL, 'cover.jpg', 0, 'female', NULL, '2020-04-05 10:47:52', 17, 3),
(34, 'nm@gmail.com', NULL, '$2y$10$KtUrigjcUQxS6dA1eZp..emA5YJVuRfJUIDMf9FkHNN3DvWToUY9a', NULL, '2020-04-05 12:55:25', '2020-04-05 12:55:25', 0, 'nn', 'nn', NULL, 'cover.jpg', 0, 'female', NULL, '2020-04-05 10:55:25', 17, 3),
(35, 'djbudw@mccjn.com', NULL, '$2y$10$/ISOy5iBo/4QoN5Dwyodwughohe603jP8zOvU/qBJuUWyo.BeqJrC', NULL, '2020-04-05 13:04:34', '2020-04-05 13:04:34', 0, 'dasnbhj', 'dsabhjvj', NULL, 'cover.jpg', 0, 'male', NULL, '2020-04-05 11:04:34', NULL, 11),
(36, 'nmm@gmail.com', NULL, '$2y$10$QnEyqUP1qWcsOyktL.nMrupiccD9NvfGjjYqf1qUWaxPqqYdan8HW', NULL, '2020-04-05 13:04:49', '2020-04-05 13:04:49', 0, 'nnn', 'nnnn', NULL, 'cover.jpg', 0, 'female', NULL, '2020-04-05 11:04:49', 17, 3),
(37, 'mm@gmail.com', NULL, '$2y$10$zylOKcn4RjZkC968MNiVguvRXPPllb5g65IKGI./U84DGoHJxQlwe', NULL, '2020-04-05 13:10:30', '2020-04-05 13:10:30', 0, 'mmmm', 'mmmm', NULL, 'cover.jpg', 0, 'female', NULL, '2020-04-05 11:10:30', 21, 3),
(38, 'nnnnn@gmail.com', NULL, '$2y$10$iJEuUMRLe/3Mat2zlWFODeck.L10QlyPw/HsJJqx5nhiztI99OKai', NULL, '2020-04-05 13:28:45', '2020-04-05 13:28:45', 0, 'nn', 'nn', NULL, 'cover.jpg', 0, 'female', NULL, '2020-04-05 11:28:45', 17, 3),
(39, 'noo@gmail.com', NULL, '$2y$10$uEEuKKjFWq89sJln5Buxt.uL73OoHxzPWn9y83ImFHb0lyQc5k2p6', NULL, '2020-04-05 13:32:48', '2020-04-05 13:32:48', 0, 'nour', 'nour', NULL, 'cover.jpg', 0, 'female', NULL, '2020-04-05 11:32:48', 17, 3),
(42, 'nooo@gmail.com', NULL, '$2y$10$n220kD9wi3jq5q2CbvX7WOr95Foc49GnwYW.DNq4Z4GU.7aBmL6cS', NULL, '2020-04-05 17:13:45', '2020-04-05 17:13:45', 0, 'nour', 'nour', NULL, 'cover.jpg', 0, 'female', NULL, '2020-04-05 15:13:46', 17, 3),
(43, 'mahmoudelsakhawy101@gmail.com', NULL, '$2y$10$YaSGkGEJCge6DbQnILRh4usHnIHDLtMmpTOps4aSpXn3nUEkfKTKu', NULL, '2020-04-07 14:31:57', '2020-04-07 14:31:57', 0, 'mahmoud', 'Elsakhawy', NULL, 'cover.jpg', 0, 'male', NULL, '2020-04-07 12:31:57', 34, 3),
(44, 'tecon@mailinator.com', NULL, '$2y$10$RvNIaqvBoVlWob9cf0IY5uAkL0zPgjSuvimwM/yKgsHQIpvviQ7f2', NULL, '2020-04-08 15:34:23', '2020-04-08 15:34:23', 0, 'Veda', 'Reese', NULL, 'cover.jpg', 0, 'male', NULL, '2020-04-08 13:34:23', NULL, 19),
(45, 'basel.3ly@gsd.com', NULL, '$2y$10$ychae3B/gcPnvTpDC3ocQuxYNC0cXasoMrRTcLkCyGKxW/4oiCcAy', NULL, '2020-04-27 10:28:43', '2020-04-27 10:28:43', 0, 'basel', 'aly', NULL, 'cover.jpg', 0, 'male', NULL, '2020-04-27 08:28:43', 21, 3),
(46, 'basel.3ly@hfgj.com', NULL, '$2y$10$p00hCEJRo8oXbZXKnQQrJO3ShqDpVcnhTRWYO6hj5vRpz1EIQyS6u', NULL, '2020-04-27 10:33:13', '2020-04-27 10:33:13', 0, 'dsahj', 'djasdsa', NULL, 'cover.jpg', 0, 'male', NULL, '2020-04-27 08:33:13', 21, 3),
(47, 'test.test@hfgj.com', NULL, '$2y$10$byRMjacs2rNVoOae46mvOuz5R9pzyW6z9CXh91g6NsK2k48YytT1m', NULL, '2020-04-27 12:50:37', '2020-04-27 12:50:37', 0, 'm', 'mm', NULL, 'cover.jpg', 0, 'male', NULL, '2020-04-27 10:50:37', 21, 3),
(48, 'hepykakutu@mailinator.com', NULL, '$2y$10$nCFNwplS8HUpHqhDk3yPJeR/KwLUCdL4yNZyEO0qz93zUIUMeSPT6', NULL, '2020-04-28 12:46:19', '2020-04-28 12:46:19', 0, 'Francesca', 'Whitley', NULL, 'cover.jpg', 0, 'male', NULL, '2020-04-28 10:46:19', NULL, 19);

-- --------------------------------------------------------

--
-- Table structure for table `user_updates`
--

CREATE TABLE `user_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `idea_id` bigint(20) UNSIGNED DEFAULT NULL,
  `topic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `showroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_updates`
--

INSERT INTO `user_updates` (`id`, `user_id`, `product_id`, `idea_id`, `topic_id`, `deleted_at`, `created_at`, `updated_at`, `showroom_id`, `offer_id`) VALUES
(107, 21, NULL, NULL, 16, NULL, '2019-11-06 16:19:46', '2019-11-06 16:19:46', NULL, NULL),
(111, NULL, 83, NULL, NULL, NULL, '2019-11-07 15:01:00', '2019-11-07 15:01:00', 30, NULL),
(112, NULL, 84, NULL, NULL, NULL, '2019-11-07 15:07:04', '2019-11-07 15:07:04', 30, NULL),
(113, NULL, 85, NULL, NULL, NULL, '2019-11-07 15:17:39', '2019-11-07 15:17:39', 30, NULL),
(114, NULL, 86, NULL, NULL, NULL, '2019-11-07 15:22:22', '2019-11-07 15:22:22', 30, NULL),
(115, NULL, 87, NULL, NULL, NULL, '2019-11-07 15:37:54', '2019-11-07 15:37:54', 30, NULL),
(116, NULL, 88, NULL, NULL, NULL, '2019-11-07 15:42:33', '2019-11-07 15:42:33', 30, NULL),
(117, NULL, 89, NULL, NULL, NULL, '2019-11-07 15:46:57', '2019-11-07 15:46:57', 30, NULL),
(118, NULL, 90, NULL, NULL, NULL, '2019-11-07 15:58:17', '2019-11-07 15:58:17', 30, NULL),
(120, NULL, 92, NULL, NULL, NULL, '2019-11-07 16:17:07', '2019-11-07 16:17:07', 30, NULL),
(122, 4, NULL, 27, NULL, NULL, '2019-11-11 04:28:17', '2019-11-11 04:32:09', NULL, NULL),
(123, NULL, 94, NULL, NULL, NULL, '2019-11-11 18:12:41', '2019-11-11 18:12:41', 26, NULL),
(124, 4, NULL, 28, NULL, NULL, '2019-11-11 18:44:47', '2019-11-11 18:44:47', NULL, NULL),
(125, NULL, 95, NULL, NULL, NULL, '2019-11-11 18:52:14', '2019-11-11 18:52:14', 26, NULL),
(126, NULL, 96, NULL, NULL, NULL, '2019-11-11 18:56:42', '2019-11-11 18:56:42', 26, NULL),
(127, NULL, 97, NULL, NULL, NULL, '2019-11-11 19:14:50', '2019-11-11 19:14:50', 26, NULL),
(128, NULL, 98, NULL, NULL, NULL, '2019-11-11 19:18:20', '2019-11-11 19:18:20', 26, NULL),
(131, NULL, 100, NULL, NULL, NULL, '2019-11-27 15:11:29', '2019-11-27 15:11:29', 44, NULL),
(133, NULL, 102, NULL, NULL, NULL, '2019-12-26 14:43:06', '2019-12-26 14:43:06', 45, NULL),
(138, 9, NULL, NULL, 20, NULL, '2019-12-30 15:35:25', '2019-12-30 15:35:25', NULL, NULL),
(139, NULL, 105, NULL, NULL, NULL, '2019-12-30 15:46:10', '2019-12-30 15:46:10', 48, NULL),
(140, NULL, NULL, NULL, NULL, NULL, '2019-12-30 15:46:10', '2019-12-30 15:46:10', 48, 105),
(141, NULL, 106, NULL, NULL, NULL, '2019-12-30 15:54:44', '2019-12-30 15:54:44', 48, NULL),
(142, NULL, NULL, NULL, NULL, NULL, '2019-12-30 15:54:44', '2019-12-30 15:54:44', 48, 106),
(143, NULL, 107, NULL, NULL, NULL, '2019-12-30 15:58:57', '2019-12-30 15:58:57', 4, NULL),
(144, NULL, NULL, NULL, NULL, NULL, '2019-12-30 15:58:57', '2019-12-30 15:58:57', 4, 107),
(145, NULL, 108, NULL, NULL, NULL, '2019-12-30 16:01:26', '2019-12-30 16:01:26', 48, NULL),
(146, NULL, 109, NULL, NULL, NULL, '2019-12-30 16:04:25', '2019-12-30 16:04:25', 4, NULL),
(147, NULL, NULL, NULL, NULL, NULL, '2019-12-30 16:04:25', '2019-12-30 16:04:25', 4, 109),
(148, NULL, 110, NULL, NULL, NULL, '2019-12-30 16:20:25', '2019-12-30 16:20:25', 4, NULL),
(149, NULL, NULL, NULL, NULL, NULL, '2019-12-30 16:20:25', '2019-12-30 16:20:25', 4, 110),
(152, 4, NULL, NULL, 23, NULL, '2020-01-04 00:40:38', '2020-01-04 00:40:38', NULL, NULL),
(153, 4, NULL, NULL, 24, NULL, '2020-01-04 01:48:23', '2020-01-04 01:48:23', NULL, NULL),
(154, 4, NULL, NULL, 25, NULL, '2020-01-04 01:55:03', '2020-01-04 01:55:03', NULL, NULL),
(155, 4, NULL, NULL, 26, NULL, '2020-01-04 01:56:37', '2020-01-04 01:56:37', NULL, NULL),
(156, 4, NULL, NULL, 27, NULL, '2020-01-04 01:57:04', '2020-01-04 01:57:04', NULL, NULL),
(157, 4, NULL, NULL, 28, NULL, '2020-01-04 01:57:32', '2020-01-04 01:57:32', NULL, NULL),
(158, 4, NULL, NULL, 29, NULL, '2020-01-04 02:07:31', '2020-01-04 02:07:31', NULL, NULL),
(159, 4, NULL, NULL, 30, NULL, '2020-01-04 02:08:08', '2020-01-04 02:08:08', NULL, NULL),
(160, 7, NULL, NULL, 31, NULL, '2020-01-04 02:16:21', '2020-01-04 02:16:21', NULL, NULL),
(161, 4, NULL, 32, NULL, NULL, '2020-01-05 00:33:03', '2020-01-05 00:33:03', NULL, NULL),
(162, NULL, 111, NULL, NULL, NULL, '2020-01-06 12:52:14', '2020-01-06 12:52:14', 47, NULL),
(163, NULL, 112, NULL, NULL, NULL, '2020-01-06 12:53:16', '2020-01-06 12:53:16', 47, NULL),
(164, NULL, 113, NULL, NULL, NULL, '2020-01-06 12:53:57', '2020-01-06 12:53:57', 47, NULL),
(165, NULL, 114, NULL, NULL, NULL, '2020-01-06 12:58:04', '2020-01-06 12:58:04', 49, NULL),
(166, NULL, 115, NULL, NULL, NULL, '2020-01-06 12:58:56', '2020-01-06 12:58:56', 49, NULL),
(167, NULL, 116, NULL, NULL, NULL, '2020-01-06 13:01:20', '2020-01-06 13:01:20', 49, NULL),
(168, NULL, 117, NULL, NULL, NULL, '2020-01-09 12:55:29', '2020-01-09 12:55:29', 49, NULL),
(169, NULL, NULL, NULL, NULL, NULL, '2020-01-09 12:55:29', '2020-01-09 12:55:29', 49, 117),
(170, NULL, 118, NULL, NULL, NULL, '2020-01-09 12:59:11', '2020-01-09 12:59:11', 47, NULL),
(171, NULL, NULL, NULL, NULL, NULL, '2020-01-09 12:59:11', '2020-01-09 12:59:11', 47, 118),
(172, 48, NULL, NULL, 32, NULL, '2020-04-28 13:04:49', '2020-04-28 13:04:49', NULL, NULL),
(174, 32, NULL, 39, NULL, NULL, '2020-05-02 16:00:44', '2020-05-02 16:00:44', NULL, NULL),
(175, NULL, 119, NULL, NULL, NULL, '2020-05-03 10:33:29', '2020-05-03 10:33:29', 52, NULL),
(176, NULL, NULL, NULL, NULL, NULL, '2020-05-03 10:33:29', '2020-05-03 10:33:29', 52, 119),
(177, NULL, 120, NULL, NULL, NULL, '2020-05-03 10:34:49', '2020-05-03 10:34:49', 52, NULL),
(178, NULL, 121, NULL, NULL, NULL, '2020-05-03 10:36:41', '2020-05-03 10:36:41', 52, NULL),
(179, NULL, 122, NULL, NULL, NULL, '2020-05-03 10:40:17', '2020-05-03 10:40:17', 52, NULL),
(180, NULL, 123, NULL, NULL, NULL, '2020-05-03 10:50:12', '2020-05-03 10:50:12', 52, NULL),
(181, NULL, 124, NULL, NULL, NULL, '2020-05-04 13:14:12', '2020-05-04 13:14:12', 52, NULL),
(182, NULL, NULL, NULL, NULL, NULL, '2020-05-04 13:14:12', '2020-05-04 13:14:12', 52, 124),
(183, NULL, 125, NULL, NULL, NULL, '2020-05-04 13:16:08', '2020-05-04 13:16:08', 52, NULL),
(184, NULL, NULL, NULL, NULL, NULL, '2020-05-04 13:16:08', '2020-05-04 13:16:08', 52, 125),
(185, NULL, 126, NULL, NULL, NULL, '2020-05-04 13:23:53', '2020-05-04 13:23:53', 52, NULL),
(186, NULL, NULL, NULL, NULL, NULL, '2020-05-04 13:23:53', '2020-05-04 13:23:53', 52, 126),
(187, NULL, NULL, NULL, NULL, NULL, '2020-05-04 13:42:33', '2020-05-04 13:42:33', 52, 116),
(188, 32, NULL, 41, NULL, NULL, '2020-05-06 09:05:25', '2020-05-06 09:05:25', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boards_user_id_foreign` (`user_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_showroom_id_foreign` (`showroom_id`),
  ADD KEY `branches_city_id_foreign` (`city_id`),
  ADD KEY `branches_district_id_foreign` (`district_id`);

--
-- Indexes for table `branches_info`
--
ALTER TABLE `branches_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_info_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_blocks`
--
ALTER TABLE `chat_blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_blocks_showroom_id_foreign` (`showroom_id`),
  ADD KEY `chat_blocks_user_id_foreign` (`user_id`);

--
-- Indexes for table `chat_follows`
--
ALTER TABLE `chat_follows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_follows_pinnable_type_pinnable_id_index` (`pinnable_type`,`pinnable_id`),
  ADD KEY `chat_follows_user_id_foreign` (`user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  ADD KEY `comments_user_id_index` (`user_id`);

--
-- Indexes for table `compare_products`
--
ALTER TABLE `compare_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compare_products_product_id_foreign` (`product_id`),
  ADD KEY `compare_products_user_id_foreign` (`user_id`);

--
-- Indexes for table `consultants`
--
ALTER TABLE `consultants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultants_user_id_foreign` (`user_id`);

--
-- Indexes for table `consultant_images`
--
ALTER TABLE `consultant_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultant_images_consultant_id_foreign` (`consultant_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districtes`
--
ALTER TABLE `districtes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districtes_city_id_foreign` (`city_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow_users`
--
ALTER TABLE `follow_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follow_users_follower_id_foreign` (`follower_id`),
  ADD KEY `follow_users_following_id_foreign` (`following_id`);

--
-- Indexes for table `forget_passwords`
--
ALTER TABLE `forget_passwords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forget_passwords_user_id_foreign` (`user_id`);

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ideas_user_id_foreign` (`user_id`);

--
-- Indexes for table `idea_categories`
--
ALTER TABLE `idea_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idea_comments`
--
ALTER TABLE `idea_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idea_comments_idea_id_foreign` (`idea_id`),
  ADD KEY `idea_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `idea_comment_likes`
--
ALTER TABLE `idea_comment_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idea_comment_likes_comment_id_foreign` (`comment_id`),
  ADD KEY `idea_comment_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `idea_comment_replies`
--
ALTER TABLE `idea_comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idea_comment_replies_comment_id_foreign` (`comment_id`),
  ADD KEY `idea_comment_replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `idea_reply_likes`
--
ALTER TABLE `idea_reply_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idea_reply_likes_reply_id_foreign` (`reply_id`),
  ADD KEY `idea_reply_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_imageable_type_imageable_id_index` (`imageable_type`,`imageable_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `malls`
--
ALTER TABLE `malls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_showrooms`
--
ALTER TABLE `mall_showrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_images`
--
ALTER TABLE `message_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message__images_msg_id_foreign` (`msg_id`);

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
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_product_id_foreign` (`product_id`);

--
-- Indexes for table `paragraphs`
--
ALTER TABLE `paragraphs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paragraphs_idea_id_foreign` (`idea_id`);

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
  ADD KEY `products_showroom_id_foreign` (`showroom_id`),
  ADD KEY `products_style_id_foreign` (`style_id`),
  ADD KEY `products_material_id_foreign` (`material_id`),
  ADD KEY `products_color_id_foreign` (`color_id`),
  ADD KEY `products_country_id_foreign` (`country_id`),
  ADD KEY `products_upholstery_id_foreign` (`upholstery_id`);

--
-- Indexes for table `product_branches`
--
ALTER TABLE `product_branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_branches_product_id_foreign` (`product_id`),
  ADD KEY `product_branches_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_comments_product_id_foreign` (`product_id`),
  ADD KEY `product_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_comment_likes`
--
ALTER TABLE `product_comment_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_comment_likes_comment_id_foreign` (`comment_id`),
  ADD KEY `product_comment_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_comment_replies`
--
ALTER TABLE `product_comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_comment_replies_comment_id_foreign` (`comment_id`),
  ADD KEY `product_comment_replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_reply_likes`
--
ALTER TABLE `product_reply_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reply_likes_reply_id_foreign` (`reply_id`),
  ADD KEY `product_reply_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_user_id_foreign` (`user_id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_repliable_type_repliable_id_index` (`repliable_type`,`repliable_id`),
  ADD KEY `replies_user_id_index` (`user_id`);

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
-- Indexes for table `saved_items`
--
ALTER TABLE `saved_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saved_items_board_id_foreign` (`board_id`),
  ADD KEY `saved_items_product_id_foreign` (`product_id`),
  ADD KEY `saved_items_idea_id_foreign` (`idea_id`),
  ADD KEY `saved_items_topic_id_foreign` (`topic_id`),
  ADD KEY `saved_items_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shares_user_id_foreign` (`user_id`);

--
-- Indexes for table `showrooms`
--
ALTER TABLE `showrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `showrooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `showrooms_followers`
--
ALTER TABLE `showrooms_followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `showrooms_followers_showroom_id_foreign` (`showroom_id`),
  ADD KEY `showrooms_followers_user_id_foreign` (`user_id`);

--
-- Indexes for table `showroom_categories`
--
ALTER TABLE `showroom_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showroom_messages`
--
ALTER TABLE `showroom_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `showroom_messages_showroom_id_foreign` (`showroom_id`),
  ADD KEY `showroom_messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `showroom_reviews`
--
ALTER TABLE `showroom_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `showroom_reviews_user_id_foreign` (`user_id`),
  ADD KEY `showroom_reviews_showroom_id_foreign` (`showroom_id`);

--
-- Indexes for table `showroom_review_likes`
--
ALTER TABLE `showroom_review_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showroom_styles`
--
ALTER TABLE `showroom_styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_user_id_foreign` (`user_id`);

--
-- Indexes for table `topic_categories`
--
ALTER TABLE `topic_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_categories_topic_id_foreign` (`topic_id`),
  ADD KEY `topic_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `topic_comments`
--
ALTER TABLE `topic_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_comments_topic_id_foreign` (`topic_id`),
  ADD KEY `topic_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `topic_comment_likes`
--
ALTER TABLE `topic_comment_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_comment_likes_comment_id_foreign` (`comment_id`),
  ADD KEY `topic_comment_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `topic_comment_replies`
--
ALTER TABLE `topic_comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_comment_replies_comment_id_foreign` (`comment_id`),
  ADD KEY `topic_comment_replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `topic_images`
--
ALTER TABLE `topic_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_images_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `topic_reply_likes`
--
ALTER TABLE `topic_reply_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_reply_likes_reply_id_foreign` (`reply_id`),
  ADD KEY `topic_reply_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `upholsteries`
--
ALTER TABLE `upholsteries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_district_id_foreign` (`district_id`),
  ADD KEY `users_city_id_foreign` (`city_id`),
  ADD KEY `users_country_id_foreign` (`country_id`);

--
-- Indexes for table `user_updates`
--
ALTER TABLE `user_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_updates_user_id_foreign` (`user_id`),
  ADD KEY `user_updates_product_id_foreign` (`product_id`),
  ADD KEY `user_updates_idea_id_foreign` (`idea_id`),
  ADD KEY `user_updates_topic_id_foreign` (`topic_id`),
  ADD KEY `user_updates_showroom_id_foreign` (`showroom_id`),
  ADD KEY `user_updates_offer_id_foreign` (`offer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `branches_info`
--
ALTER TABLE `branches_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `chat_blocks`
--
ALTER TABLE `chat_blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_follows`
--
ALTER TABLE `chat_follows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `compare_products`
--
ALTER TABLE `compare_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `consultants`
--
ALTER TABLE `consultants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `consultant_images`
--
ALTER TABLE `consultant_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `districtes`
--
ALTER TABLE `districtes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow_users`
--
ALTER TABLE `follow_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `forget_passwords`
--
ALTER TABLE `forget_passwords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `idea_categories`
--
ALTER TABLE `idea_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `idea_comments`
--
ALTER TABLE `idea_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `idea_comment_likes`
--
ALTER TABLE `idea_comment_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `idea_comment_replies`
--
ALTER TABLE `idea_comment_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `idea_reply_likes`
--
ALTER TABLE `idea_reply_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `malls`
--
ALTER TABLE `malls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
