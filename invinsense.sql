-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 06:53 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercise_table`
--

CREATE TABLE `exercise_table` (
  `id` int(11) NOT NULL,
  `exercise_title` varchar(20) NOT NULL,
  `exercise_question_answer` text NOT NULL,
  `author` int(50) NOT NULL,
  `members_name` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercise_table`
--

INSERT INTO `exercise_table` (`id`, `exercise_title`, `exercise_question_answer`, `author`, `members_name`, `is_active`, `created_date`) VALUES
(1, 'The Quick Fix', '{\"What is Sue\\u2019s response in this scenario?\":\"Test Test\",\"Does your organization have a formal change control policy?\":\"Test Test\",\"Does your organization have the ability to \\u201croll back\\u201d patches in the event of unanticipated negative impacts?\":\"Test\",\"Processes tested\":\"08-June-2021\",\"Threat actor\":\"Amit\",\"Asset impacted\":\"None\"}', 1, '', 1, '2021-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('direct','google','facebook','twitter','linkedin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'direct',
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `pass`, `picture`, `created`, `modified`) VALUES
(1, 'google', '103558471475734124768', 'Amit', 'Shah', 'amit.r.shah.2005@gmail.com', NULL, 'https://lh3.googleusercontent.com/a-/AOh14GiVdJ4n3v0kn6rk034HnsEUHOBXMDVPp5D6TDsb6w=s96-c', '2021-05-08 23:23:43', NULL),
(2, 'direct', NULL, 'amit', 'shah', 'amit@gmail.com', '0cb1eb413b8f7cee17701a37a1d74dc3', NULL, '2021-05-08 23:27:11', NULL),
(3, 'facebook', '4075077432556607', 'Amit', 'Shah', 'amit.r.shah.2005@gmail.com', NULL, 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=4075077432556607&height=200&ext=1623088669&hash=AeSPGpZpTLLBVbzKdQs', '2021-05-08 23:27:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exercise_table`
--
ALTER TABLE `exercise_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exercise_table`
--
ALTER TABLE `exercise_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
