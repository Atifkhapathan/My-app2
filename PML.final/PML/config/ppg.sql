-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 10:34 PM
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
-- Database: `ppg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `auname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `auname`, `password`) VALUES
(1, 'AOSZ', '786');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `otp_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` bigint(10) NOT NULL,
  `otpstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`otp_id`, `email`, `otp`, `otpstatus`) VALUES
(20, 'omansayyad29@gmail.com', 11632, 1),
(21, 'romansayyad099@gmail.com', 40795, 1),
(22, 'romansayyad099@gmail.com', 40795, 1),
(23, '', 59626, 0),
(24, 'omansayyad29@gmail.com', 11632, 1),
(25, 'omansayyad29@gmail.com', 11632, 1);

-- --------------------------------------------------------

--
-- Table structure for table `passes`
--

CREATE TABLE `passes` (
  `pass_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pass_type` varchar(20) DEFAULT NULL,
  `pass_zone` varchar(50) DEFAULT NULL,
  `class` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `pass_cost` decimal(10,2) DEFAULT NULL,
  `pass_status` varchar(20) DEFAULT NULL,
  `adh` bigint(20) NOT NULL,
  `adhar_document_path` varchar(255) DEFAULT NULL,
  `other_document_path` varchar(255) DEFAULT NULL,
  `bonafide_document_path` varchar(255) DEFAULT NULL,
  `id_card_document_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Comment` varchar(100) DEFAULT NULL,
  `validity_start` date DEFAULT NULL,
  `validity_end` date DEFAULT NULL,
  `approval_status` varchar(8) NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `passes`
--

INSERT INTO `passes` (`pass_id`, `user_id`, `dob`, `pass_type`, `pass_zone`, `class`, `course`, `pass_cost`, `pass_status`, `adh`, `adhar_document_path`, `other_document_path`, `bonafide_document_path`, `id_card_document_path`, `created_at`, `updated_at`, `Comment`, `validity_start`, `validity_end`, `approval_status`) VALUES
(10, 13, '0000-00-00', 'daily', 'pp', '', '', 50.00, 'Active', 111111111111, 'April 22 all PYQP.pdf', '', '', '', '2023-12-18 10:08:32', '2023-12-18 10:09:53', '', '2023-12-18', '2023-12-18', 'Active'),
(11, 13, '0000-00-00', 'monthly', 'pp', '', '', 1200.00, 'Active', 111111111111, 'April 22 all PYQP.pdf', '', '', '', '2023-12-18 10:36:05', '2023-12-18 10:43:58', '', '2023-12-18', '2024-01-18', 'Active'),
(12, 13, '1957-12-04', 'senior', 'pmrda', '', '', 500.00, 'Active', 111111111111, 'OOSE_Mid Term 11Jan 2023 (1).pdf', '', '', '', '2023-12-18 18:10:13', '2023-12-18 21:28:32', 'welcome', '2023-12-19', '2024-01-19', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `account_status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `name`, `email`, `phone`, `password`, `account_status`, `created_at`, `updated_at`, `photo`) VALUES
(13, 'oman@123', 'Oman Sayyad', 'omansayyad29@gmail.com', 8378036177, '11111111', 'active', '2023-12-18 14:29:48', NULL, 'Type 1.png'),
(16, 'roman@123', 'Roman Sayyad', 'romansayyad099@gmail.com', 9834111377, '11111111', 'active', '2023-12-18 22:52:22', NULL, 'knapsack2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`otp_id`);

--
-- Indexes for table `passes`
--
ALTER TABLE `passes`
  ADD PRIMARY KEY (`pass_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `passes`
--
ALTER TABLE `passes`
  MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `passes`
--
ALTER TABLE `passes`
  ADD CONSTRAINT `passes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
