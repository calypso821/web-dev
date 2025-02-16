-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2025 at 07:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--
CREATE DATABASE IF NOT EXISTS `web_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `web_project`;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `author` varchar(45) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `description` varchar(45) NOT NULL,
  `image_name` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `votes` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `author_id`, `title`, `author`, `description`, `image_name`, `category`, `votes`, `date`) VALUES
(1, 1, 'One-Page Layout or design', 'user', 'file1.txt', 'pic1.jpg', 'WebDev', 0, '2021-12-22 17:16:18'),
(2, 1, 'Custom google maps theme', 'user', 'file2.txt', 'pic2.png', 'WebDev', 0, '2022-02-06 17:16:18'),
(3, 2, 'Wall Climber Glass Cleaner Robot', 'student', 'file3.txt', 'pic3.jpg', 'Hardware', 0, '2021-10-06 17:16:18'),
(4, 1, 'Floating Sun Tracker Hydraulic Solar Panel', 'user', 'file4.txt', 'pic4.jpg', 'Other', 0, '2022-03-09 17:16:18'),
(5, 4, 'Still be a Human', 'IronMerc', 'file5.txt', 'pic5.png', 'GameDev', 0, '2022-01-06 17:16:18'),
(6, 1, 'Starship Simulator', 'user', 'file6.txt', 'pic6.png', 'GameDev', 0, '2022-03-08 17:16:18'),
(7, 4, 'Housing Price Predictions', 'IronMerc', 'file7.txt', 'pic7.jpg', 'DataMining', 0, '2022-01-22 17:16:18'),
(8, 4, 'Students Performance Dataset', 'IronMerc', 'file8.txt', 'pic8.png', 'DataMining', 0, '2022-02-24 17:16:18'),
(9, 5, 'Android Bluetooth-based Chatting App', 'CrashTV', 'file9.txt', 'pic9.jpg', 'MobileApp', 0, '2022-04-28 17:16:18'),
(10, 5, 'Currency Converter', 'CrashTV', 'file10.txt', 'pic10.jpg', 'MobileApp', 0, '2022-03-10 17:16:18'),
(11, 3, 'Home Automation System using Arduino Uno', 'TurboSlayer', 'file11.txt', 'pic11.jpg', 'Hardware', 0, '2022-05-10 17:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'guest', 'test.mail99@gmail.com', 'user', '$2y$10$UsIXnb2dOCBLsnwBwGOlhuw2ffIoWcHPrTI7dTpkztuiTcOHfEAoq'),
(2, 'nejc', 'test.mail99@gmail.com', 'student', '$2y$10$r0PrTFgj8yFPYy1VwvIoj.309SYaXqDaF/EJARooyhat/1gPw0zo2'),
(3, 'skrt', 'test.mail99@gmail.com', 'TurboSlayer', '$2y$10$a7Z8PswCgLB4oJU6s3CSlOfk9Fx7keYGB62rdlNujmkhcc5zJJ1R6'),
(4, 'Matija', 'test.mail99@gmail.com', 'IronMerc', '$2y$10$uNX4LteXMoJZIQUkaHycaO/JlWaE33A096bDjUpopJF3lFu3loC3e'),
(5, 'Pavlo', 'test.mail99@gmail.com', 'CrashTV', '$2y$10$6QZqRs9p/3mOUEVSnu60MuVBeYa24mt945zAIZaWj0amcNwsw7uxC');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `project_id`, `user_id`, `value`) VALUES
(1, 1, 1, 1),
(2, 1, 2, -1),
(3, 1, 3, 1),
(4, 1, 4, -1),
(5, 2, 1, 1),
(6, 2, 2, 1),
(7, 2, 3, 1),
(8, 2, 4, -1),
(9, 3, 1, -1),
(10, 3, 2, -1),
(11, 3, 3, -1),
(12, 3, 4, -1),
(13, 4, 1, 1),
(14, 4, 2, -1),
(15, 4, 3, -1),
(16, 4, 4, -1),
(17, 5, 1, 1),
(18, 5, 2, 1),
(19, 5, 3, 1),
(20, 6, 1, 1),
(21, 6, 2, 1),
(22, 6, 3, 1),
(23, 6, 4, 1),
(24, 6, 5, 1),
(25, 7, 1, 1),
(26, 7, 2, -1),
(27, 7, 3, 1),
(28, 7, 4, -1),
(29, 7, 5, 1),
(30, 8, 1, 1),
(31, 8, 2, -1),
(32, 8, 5, -1),
(33, 9, 1, -1),
(34, 9, 2, -1),
(35, 9, 5, 1),
(36, 10, 1, 1),
(37, 10, 2, 1),
(38, 10, 3, 1),
(39, 10, 4, 1),
(40, 10, 5, 1),
(41, 11, 4, 1),
(42, 11, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `project_id` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
