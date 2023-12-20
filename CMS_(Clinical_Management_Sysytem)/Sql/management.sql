-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2023 at 07:32 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `doc_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `has_password` varchar(255) NOT NULL,
  `gender` int NOT NULL,
  `doc_speaciality` int NOT NULL,
  `doc_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`doc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doc_id`, `first_name`, `last_name`, `user_name`, `password`, `has_password`, `gender`, `doc_speaciality`, `doc_created_at`) VALUES
(26, 'Noor-', 'ul-Hassan', 'noor778@gmail.com', '$2y$10$94BNa.4xPQxTipzp7TZbd.jR17SYFMqDTpAVT/jXFy0HKt6J/AMS6', '1234567', 1, 2, '2023-11-25 18:13:47'),
(25, 'Saad', 'Imtiaz', 'saad1233@gmail.com', '$2y$10$cMO/sWyOBwpMF.vlsHjcGOZFiK2Rr9GGpgvzDj/q0NO1FF5RA.R.G', '123456', 1, 5, '2023-11-25 18:04:54'),
(24, 'Asad ', 'Khan', 'asad@gmail.com', '$2y$10$zb/t5vgapBb29bb6J/u1iOyZI2YUT8Xep7iq3bCyEP7Y9NX3O9HfS', '123456', 1, 5, '2023-11-25 17:35:05'),
(23, 'Hadeed', 'Haider', 'hadeedmahr@gmail.com', '$2y$10$c/MISWnvGKmBwGtKKLouR.VZOgxPCVUpIRbwm8tTrhAq.G6xcuf/u', '123456', 1, 7, '2023-11-25 10:31:10'),
(27, 'Hammad', 'Ali', 'hammad786@gmail.com', '$2y$10$rqfhA89QiKi6OHBpDjNg..m5EGzGivP0X8pJqSz/Ht5pOR5H0MgDy', '12345678', 1, 3, '2023-12-01 16:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `created_at`) VALUES
(0, 'user', '2023-11-17 17:09:08'),
(1, 'Admin', '2023-11-17 17:09:33'),
(2, 'Super_Admin', '2023-11-17 17:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

DROP TABLE IF EXISTS `speciality`;
CREATE TABLE IF NOT EXISTS `speciality` (
  `speciality_id` int NOT NULL AUTO_INCREMENT,
  `speciality_name` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`speciality_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`speciality_id`, `speciality_name`, `status`, `created_at`) VALUES
(1, 'Gynecologist', 1, '2023-11-25 06:57:49'),
(2, 'Dentist', 1, '2023-11-25 06:58:07'),
(3, 'Dermatologist', 1, '2023-11-25 06:58:18'),
(4, 'Cardiologist', 1, '2023-11-25 06:58:28'),
(5, 'Neurologist', 1, '2023-11-25 06:59:17'),
(6, 'ENT Specialist', 1, '2023-11-25 06:59:31'),
(7, 'Pediatrician', 1, '2023-11-25 06:59:46'),
(8, 'Gastroenterologist', 1, '2023-11-25 07:00:00'),
(9, 'Hello', 1, '2023-11-28 15:59:57'),
(10, 'Hello', 1, '2023-11-28 16:00:49'),
(11, 'kfksd', 1, '2023-11-28 16:06:58'),
(12, 'jsdfjd', 1, '2023-12-01 16:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `password` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `Name`, `password`) VALUES
(33, 'hadeedmahr@gmail.com', 123456),
(33, 'asad@gmail.com', 123456),
(33, 'saad1233@gmail.com', 123456),
(33, 'noor778@gmail.com', 1234567),
(33, 'hammad786@gmail.com', 12345678),
(33, 'hadeedmahr@gmail.com', 123456),
(33, 'asad@gmail.com', 123456),
(33, 'saad1233@gmail.com', 123456),
(33, 'noor778@gmail.com', 1234567),
(33, 'hammad786@gmail.com', 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `Gender` int NOT NULL DEFAULT '1',
  `role` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `about`, `image`, `Gender`, `role`, `status`, `created_at`) VALUES
(1, 'Umer', 'Faiz Jami~', 'uk448404@gmail.com', '$2y$10$LaABIezJiFcvWx451BGu2.5uvYfAILqRgz7kDt28pJW48cnG9GHBu', 'I am Web Developer doing software Development in Shifa International Hospital, From 3 Months.', 'b02fd18687affcf2995e938b6f9a9fa2.jpeg', 1, 2, 1, '2023-11-15 16:47:44'),
(27, 'Noor-', 'ul-Hassan', 'noor778@gmail.com', '$2y$10$94BNa.4xPQxTipzp7TZbd.jR17SYFMqDTpAVT/jXFy0HKt6J/AMS6', 'M.B.B.S', '60897b7fed21b1b1bf4b2516635dfcd8.jpeg', 1, 1, 1, '2023-12-01 16:51:46'),
(26, 'Noor-', 'ul-Hassan', 'noor778@gmail.com', '$2y$10$94BNa.4xPQxTipzp7TZbd.jR17SYFMqDTpAVT/jXFy0HKt6J/AMS6', '', '', 1, 1, 0, '2023-11-25 18:13:47'),
(24, 'Asad ', 'Khan', 'asad@gmail.com', '$2y$10$zb/t5vgapBb29bb6J/u1iOyZI2YUT8Xep7iq3bCyEP7Y9NX3O9HfS', '', '090bfc68be56cbcfc2ca6fe1eada5bb0.jpeg', 1, 1, 1, '2023-11-25 17:35:05'),
(25, 'Saad', 'Imtiaz', 'saad1233@gmail.com', '$2y$10$cMO/sWyOBwpMF.vlsHjcGOZFiK2Rr9GGpgvzDj/q0NO1FF5RA.R.G', '', '', 1, 1, 0, '2023-11-25 18:04:54'),
(23, 'Hadeed', 'Haider', 'hadeedmahr@gmail.com', '$2y$10$c/MISWnvGKmBwGtKKLouR.VZOgxPCVUpIRbwm8tTrhAq.G6xcuf/u', '', 'e15594abbad33bf9b83a5656c473586d.jpg', 1, 1, 1, '2023-11-25 10:31:10'),
(28, 'Junaid', 'Khan', 'junaid786@gmail.com', '$2y$10$JssK1S2LAXjT4i9lLN3TnO3VkV0MuNUp9JrTeUZvjovP6P3/pG5Wm', '', '', 1, 0, 0, '2023-12-01 16:57:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
