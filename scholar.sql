-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 07:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholar`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `documnet_id` int(10) NOT NULL,
  `document_path` varchar(50) DEFAULT NULL,
  `document_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donner_profile`
--

CREATE TABLE `donner_profile` (
  `donner_user_id` int(10) NOT NULL,
  `donner_business` varchar(50) DEFAULT NULL,
  `donner_uuid` varchar(50) DEFAULT NULL,
  `donner_tax_id` varchar(50) DEFAULT NULL,
  `donner_about` varchar(5000) DEFAULT NULL,
  `donner_income_range` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `metrics`
--

CREATE TABLE `metrics` (
  `metrics_id` int(10) NOT NULL,
  `metrics_name` varchar(250) DEFAULT NULL,
  `metrics_details` varchar(1000) DEFAULT NULL,
  `metrics_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scholar`
--

CREATE TABLE `scholar` (
  `scholar_id` int(10) NOT NULL,
  `scholar_name` int(50) NOT NULL,
  `scholar_created_date` int(11) NOT NULL,
  `scholar_created_by` int(10) NOT NULL DEFAULT 0,
  `scholar_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scholar_enrollment`
--

CREATE TABLE `scholar_enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `enrollment_user_id` int(10) DEFAULT NULL,
  `enrollment_scholar_id` int(10) DEFAULT NULL,
  `enrollment_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `enrollment_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scholar_list`
--

CREATE TABLE `scholar_list` (
  `scholar_list_id` int(10) NOT NULL,
  `scholar_id` int(10) DEFAULT 0,
  `scholar_list_amount` int(10) DEFAULT 0,
  `scholar_list_year` datetime DEFAULT NULL,
  `scholar_list_reg_start_date` datetime DEFAULT NULL,
  `scholar_list_reg_end_date` datetime DEFAULT NULL,
  `scholar_list_publish_date` datetime DEFAULT NULL,
  `scholar_list_announce_date` datetime DEFAULT NULL,
  `scholar_list_created_by` int(10) NOT NULL DEFAULT 0,
  `scholar_list_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `scholar_list_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_metrics`
--

CREATE TABLE `student_metrics` (
  `student_metrics_id` int(10) NOT NULL,
  `student_metrics_user_id` int(10) NOT NULL DEFAULT 0,
  `student_metrics_metrics_id` int(10) NOT NULL DEFAULT 0,
  `student_metrics_passing_year` date DEFAULT NULL,
  `student_metrics_obtained_marks` double(10,2) NOT NULL DEFAULT 0.00,
  `student_metrics_total_marks` double(10,2) NOT NULL DEFAULT 0.00,
  `student_metrics_document` int(10) NOT NULL DEFAULT 0,
  `student_metrics_is_verified` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `student_user_id` int(10) NOT NULL,
  `student_dob` date DEFAULT NULL,
  `student_father_name` varchar(50) DEFAULT NULL,
  `student_mother_name` varchar(50) DEFAULT NULL,
  `student_permanent_address` varchar(500) DEFAULT NULL,
  `student_local_address` varchar(500) DEFAULT NULL,
  `student_school_level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `type` int(10) NOT NULL DEFAULT 0,
  `fname` varchar(30) DEFAULT NULL,
  `mname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `mobile_verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `status` enum('Unverified','Active','Deleted','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `fname`, `mname`, `lname`, `email`, `mobile`, `password`, `address`, `city`, `state`, `country`, `image`, `email_verified`, `mobile_verified`, `created_date`, `updated_date`, `deleted_date`, `status`) VALUES
(1, 0, 'Kaushal', NULL, 'Sachan', 'kaushyedu@gmail.com', '894788883', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, 'public/img/user_default.png', 1, 1, '2022-12-09 18:07:48', NULL, NULL, 'Unverified'),
(2, 0, 'Kaushal', NULL, 'Sachan', 'kaushyedu2@gmail.com', '7894561232', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, 'public/img/user_default.png', 1, 0, '2022-12-09 18:57:36', NULL, NULL, 'Unverified'),
(3, 0, 'Kaushal', NULL, 'Sachan', 'kaushyedu3@gmail.com', '8978978999', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, 'public/img/user_default.png', 0, 0, '2022-12-09 19:20:19', NULL, NULL, 'Unverified'),
(4, 0, 'Kaushal', NULL, 'Sachan', 'cooldudekaushy@gmail.com', '789456123', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, 'public/img/user_default.png', 0, 0, '2022-12-09 19:20:50', NULL, NULL, 'Unverified');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `login_id` int(10) NOT NULL,
  `login_user_id` int(10) NOT NULL DEFAULT 0,
  `login_browser` varchar(500) DEFAULT NULL,
  `login_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `login_token` varchar(250) DEFAULT NULL,
  `login_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `type_id` int(10) NOT NULL,
  `type_name` varchar(50) DEFAULT NULL,
  `type_access` varchar(500) DEFAULT NULL,
  `type_status` tinyint(1) NOT NULL DEFAULT 0,
  `type_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`type_id`, `type_name`, `type_access`, `type_status`, `type_created_date`) VALUES
(1, 'Admin', '0', 1, '2022-11-11 15:20:22'),
(2, 'Donner', '1', 1, '2022-11-11 15:20:22'),
(3, 'Student', '0', 2, '2022-11-11 15:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE `user_verification` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT 0,
  `type` enum('Mail','Mobile') DEFAULT NULL,
  `token` varchar(256) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `validation_date` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_verification`
--

INSERT INTO `user_verification` (`id`, `user_id`, `type`, `token`, `created_date`, `validation_date`, `status`) VALUES
(1, 1, 'Mail', '5dbfee50919db391d8146086ba00ff86', '0000-00-00 00:00:00', NULL, 0),
(2, 2, 'Mail', 'b3fb52e80d10d48dc2cc972e978c96a9', '2022-12-09 18:57:36', NULL, 0),
(3, 3, 'Mail', 'cafe5b7d656175d151685791d462b55f', '2022-12-09 19:20:19', NULL, 1),
(4, 4, 'Mail', '79a85dc5687fc52d8d71ca0cb6fb9be3', '2022-12-09 19:20:50', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`documnet_id`);

--
-- Indexes for table `donner_profile`
--
ALTER TABLE `donner_profile`
  ADD UNIQUE KEY `donner_user_id` (`donner_user_id`);

--
-- Indexes for table `metrics`
--
ALTER TABLE `metrics`
  ADD PRIMARY KEY (`metrics_id`);

--
-- Indexes for table `scholar`
--
ALTER TABLE `scholar`
  ADD PRIMARY KEY (`scholar_id`);

--
-- Indexes for table `scholar_enrollment`
--
ALTER TABLE `scholar_enrollment`
  ADD PRIMARY KEY (`enrollment_id`);

--
-- Indexes for table `scholar_list`
--
ALTER TABLE `scholar_list`
  ADD PRIMARY KEY (`scholar_list_id`);

--
-- Indexes for table `student_metrics`
--
ALTER TABLE `student_metrics`
  ADD PRIMARY KEY (`student_metrics_id`);

--
-- Indexes for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD UNIQUE KEY `student_user_id` (`student_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user_verification`
--
ALTER TABLE `user_verification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `documnet_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metrics`
--
ALTER TABLE `metrics`
  MODIFY `metrics_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholar`
--
ALTER TABLE `scholar`
  MODIFY `scholar_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholar_enrollment`
--
ALTER TABLE `scholar_enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholar_list`
--
ALTER TABLE `scholar_list`
  MODIFY `scholar_list_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_metrics`
--
ALTER TABLE `student_metrics`
  MODIFY `student_metrics_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `login_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_verification`
--
ALTER TABLE `user_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
