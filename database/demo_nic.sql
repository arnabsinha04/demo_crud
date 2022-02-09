-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 08:46 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_nic`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_gender`
--

CREATE TABLE `ci_gender` (
  `gender_id` int(20) NOT NULL,
  `gender_name` varchar(20) NOT NULL,
  `g_name` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_gender`
--

INSERT INTO `ci_gender` (`gender_id`, `gender_name`, `g_name`) VALUES
(1, 'Male', 'M'),
(2, 'Female', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `ci_user_authentication`
--

CREATE TABLE `ci_user_authentication` (
  `login_id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(20) NOT NULL,
  `user_role` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `is_delete` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_user_authentication`
--

INSERT INTO `ci_user_authentication` (`login_id`, `username`, `password`, `salt`, `user_role`, `user_id`, `status`, `is_delete`) VALUES
(1, 'admin', 'bd296c4e6018c97f25b8c6738dfed944fec2b926', 'y5be', 1, 1, 1, 0),
(12, '9002163820', 'af9d29004c18eec30c2a0f0921f139f9e73da6c4', 'yd62', 2, 22, 1, 0),
(13, '9803282383', '8bcfde568adbfe294f6fdbf6d9c1cd5f0733fcdd', '5CjR', 2, 23, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_user_details`
--

CREATE TABLE `ci_user_details` (
  `emp_user_id` int(20) NOT NULL,
  `emp_code` varchar(30) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_user_details`
--

INSERT INTO `ci_user_details` (`emp_user_id`, `emp_code`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `email_id`, `mobile_no`, `gender`, `created_on`, `is_deleted`) VALUES
(22, 'WB/EMP/2021Arn7010234', 'Arnab', 'Kumar', 'Sinha', '1993-04-07', 'arnabsinha04@gmail.com', '9002163820', 'Male', '2021-11-25 19:32:34', 0),
(23, 'WB/EMP/2021MIN7010414', 'Mina', '', 'Kumari', '2021-11-01', 'mina@gmail.com', '9803282383', 'Female', '2021-11-25 19:35:45', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_gender`
--
ALTER TABLE `ci_gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `ci_user_authentication`
--
ALTER TABLE `ci_user_authentication`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `ci_user_details`
--
ALTER TABLE `ci_user_details`
  ADD PRIMARY KEY (`emp_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_gender`
--
ALTER TABLE `ci_gender`
  MODIFY `gender_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ci_user_authentication`
--
ALTER TABLE `ci_user_authentication`
  MODIFY `login_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ci_user_details`
--
ALTER TABLE `ci_user_details`
  MODIFY `emp_user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
