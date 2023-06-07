-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 12:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_leakage`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(10) AUTO_INCREMENT PRIMARY KEY NULL,
  `user_id` varchar(255) NOT NULL,
  `file_id` varchar(255) NOT NULL,
  `attempt` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `user_id`, `file_id`, `attempt`) VALUES
(1, '', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `data_files`
--

CREATE TABLE `data_files` (
  `id` int(10) AUTO_INCREMENT PRIMARY KEY,
  `subject` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `receiver_id` varchar(255) NOT NULL,
  `secret_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_files`
--

INSERT INTO `data_files` (`id`, `subject`, `file_name`, `file_size`, `sender_id`, `receiver_id`, `secret_key`) VALUES
(1, 'Testing1', 'd6baf65e0b240ce177cf70da146c8dc8-Aadhaarapp_compressed.pdf', '0.13369750976562', '2', '124', '5038');

-- --------------------------------------------------------

--
-- Table structure for table `key_requests`
--

CREATE TABLE `key_requests` (
  `id` int(10) AUTO_INCREMENT PRIMARY KEY,
  `request_by_user` varchar(255) NOT NULL,
  `request_to_user` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `secret_key` varchar(255) NOT NULL,
  `status` enum('pending','rejected','shared') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `key_requests`
--

INSERT INTO `key_requests` (`id`, `request_by_user`, `request_to_user`, `file`, `secret_key`, `status`) VALUES
(11, '124', '2', '1', '5038', 'shared');

-- --------------------------------------------------------

--
-- Table structure for table `leaked_messages`
--

CREATE TABLE `leaked_messages` (
  `id` int(10) AUTO_INCREMENT PRIMARY KEY,
  `user_id` varchar(255) NOT NULL,
  `file_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leakers`
--

CREATE TABLE `leakers` (
  `id` int(10) AUTO_INCREMENT PRIMARY KEY,
  `user_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `file_id` varchar(255) NOT NULL,
  `secret_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_type` enum('user','admin') NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `admin_active` varchar(10) NOT NULL,
  `blocked` enum('0','1') NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_type`, `gender`, `mobile`, `admin_active`, `blocked`, `profile`) VALUES
(2, '19csa62', 'mohanraj.skam@gmail.com', '12345', 'user', 'male', '9876543216', '1', '0', 'user_profile.jpg'),
(4, 'user3', 'user3@gmail.com', '12345', 'user', 'female', '9616012574', '1', '0', 'user_profile.jpg'),
(111, 'admin', 'admin@gmail.com', 'kg123', 'admin', 'male', '9876543216', '1', '0', 'user_profile.jpg'),
(124, 'user1', 'user1@gmail.com', '12345', 'user', 'male', '9876543291', '1', '0', 'user_profile.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_files`
--
ALTER TABLE `data_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_requests`
--
ALTER TABLE `key_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaked_messages`
--
ALTER TABLE `leaked_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leakers`
--
ALTER TABLE `leakers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`,`password`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
