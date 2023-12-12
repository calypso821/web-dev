drop database if exists web_project;
create database web_project;
use web_project;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE TABLE `users` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `username` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

INSERT INTO `users` VALUES 
(1, 'matic', 'matic.knez84@gmail.com', 'user', '$2y$10$UsIXnb2dOCBLsnwBwGOlhuw2ffIoWcHPrTI7dTpkztuiTcOHfEAoq'),  -- pass1234   
(2, 'nejc', 'matic.knez84@gmail.com', 'student', '$2y$10$r0PrTFgj8yFPYy1VwvIoj.309SYaXqDaF/EJARooyhat/1gPw0zo2'),  -- vaje
(3, 'skrt', 'matic.knez84@gmail.com', 'TurboSlayer', '$2y$10$a7Z8PswCgLB4oJU6s3CSlOfk9Fx7keYGB62rdlNujmkhcc5zJJ1R6'), -- test1234
(4, 'Matija', 'matic.knez84@gmail.com', 'IronMerc', '$2y$10$uNX4LteXMoJZIQUkaHycaO/JlWaE33A096bDjUpopJF3lFu3loC3e'), -- 1234test
(5, 'Pavlo', 'matic.knez84@gmail.com', 'CrashTV', '$2y$10$6QZqRs9p/3mOUEVSnu60MuVBeYa24mt945zAIZaWj0amcNwsw7uxC'); -- password

CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `author` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `description` varchar(45) NOT NULL,
  `image_name` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `votes` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`author_id`) REFERENCES `users`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE `votes` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`project_id`) REFERENCES `projects`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `projects` VALUES 
(1, 1, 'One-Page Layout or design', 'user', 'file1.txt', "pic1.jpg", 'WebDev', 0, "2021-12-22 17:16:18"),
(2, 1, 'Custom google maps theme', 'user', 'file2.txt', "pic2.png", 'WebDev', 0, "2022-02-06 17:16:18"),
(3, 2, 'Wall Climber Glass Cleaner Robot', 'student', 'file3.txt',"pic3.jpg", 'Hardware', 0, "2021-10-06 17:16:18"),
(4, 1, 'Floating Sun Tracker Hydraulic Solar Panel', 'user', 'file4.txt',"pic4.jpg", 'Other', 0, "2022-03-09 17:16:18"),
(5, 4, 'Still be a Human', 'IronMerc', 'file5.txt',"pic5.png", 'GameDev', 0, "2022-01-06 17:16:18"),
(6, 1, 'Starship Simulator', 'user', 'file6.txt',"pic6.png", 'GameDev', 0, "2022-03-08 17:16:18"),
(7, 4, 'Housing Price Predictions', 'IronMerc', 'file7.txt',"pic7.jpg", 'DataMining', 0, "2022-01-22 17:16:18"),
(8, 4, 'Students Performance Dataset', 'IronMerc', 'file8.txt',"pic8.png", 'DataMining', 0, "2022-02-24 17:16:18"),
(9, 5, 'Android Bluetooth-based Chatting App', 'CrashTV', 'file9.txt',"pic9.jpg", 'MobileApp', 0, "2022-04-28 17:16:18"),
(10, 5, 'Currency Converter', 'CrashTV', 'file10.txt',"pic10.jpg", 'MobileApp', 0, "2022-03-10 17:16:18"),
(11, 3, 'Home Automation System using Arduino Uno', 'TurboSlayer', 'file11.txt', "pic11.jpg", 'Hardware', 0, "2022-05-10 17:16:18");


INSERT INTO `votes` VALUES 
/* id, project_id, user_id, value */ 

/* Project1 */ 
(1, 1, 1, 1),
(2, 1, 2, -1),
(3, 1, 3, 1),
(4, 1, 4, -1),
/* Project2 */ 
(5, 2, 1, 1),
(6, 2, 2, 1),
(7, 2, 3, 1),
(8, 2, 4, -1),
/* Project3 */ 
(9, 3, 1, -1),
(10, 3, 2, -1),
(11, 3, 3, -1),
(12, 3, 4, -1),
/* Project4 */ 
(13, 4, 1, 1),
(14, 4, 2, -1),
(15, 4, 3, -1),
(16, 4, 4, -1),
/* Project5 */ 
(17, 5, 1, 1),
(18, 5, 2, 1),
(19, 5, 3, 1),
/* Project6 */ 
(20, 6, 1, 1),
(21, 6, 2, 1),
(22, 6, 3, 1),
(23, 6, 4, 1),
(24, 6, 5, 1),
/* Project7 */ 
(25, 7, 1, 1),
(26, 7, 2, -1),
(27, 7, 3, 1),
(28, 7, 4, -1),
(29, 7, 5, 1),
/* Project8 */ 
(30, 8, 1, 1),
(31, 8, 2, -1),
(32, 8, 5, -1),
/* Project9 */ 
(33, 9, 1, -1),
(34, 9, 2, -1),
(35, 9, 5, 1),
/* Project10 */ 
(36, 10, 1, 1),
(37, 10, 2, 1),
(38, 10, 3, 1),
(39, 10, 4, 1),
(40, 10, 5, 1),

(41, 11, 4, 1),
(42, 11, 5, 1);



