-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 11:21 PM
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
-- Database: `db_wbapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `user_lastname` varchar(180) NOT NULL DEFAULT '',
  `user_firstname` varchar(180) NOT NULL DEFAULT '',
  `user_email` varchar(180) NOT NULL DEFAULT '',
  `user_password` varchar(180) NOT NULL DEFAULT '',
  `user_date_added` date NOT NULL DEFAULT '2000-01-01',
  `user_time_added` time NOT NULL DEFAULT '00:00:00',
  `user_date_updated` date NOT NULL DEFAULT '2000-01-01',
  `user_time_updated` time NOT NULL DEFAULT '00:00:00',
  `user_status` int(1) NOT NULL DEFAULT 0,
  `user_token` varchar(255) NOT NULL DEFAULT '',
  `user_access` varchar(255) NOT NULL DEFAULT '',
  `user_dob` date NOT NULL DEFAULT '2000-01-01',
  `user_sex` varchar(10) NOT NULL DEFAULT '',
  `user_age` int(3) NOT NULL DEFAULT 0,
  `user_contact_number` varchar(20) NOT NULL DEFAULT '',
  `user_marital_status` varchar(20) NOT NULL DEFAULT '',
  `user_address` text NOT NULL,
  `user_religion` varchar(50) NOT NULL DEFAULT '',
  `user_zip_code` varchar(10) NOT NULL DEFAULT '',
  `user_position` varchar(255) NOT NULL DEFAULT '',
  `user_career_history` text NOT NULL,
  `user_cover_letter` text NOT NULL,
  `user_application` text NOT NULL,
  `user_skills` varchar(255) NOT NULL DEFAULT '',
  `user_profile_image` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_lastname`, `user_firstname`, `user_email`, `user_password`, `user_date_added`, `user_time_added`, `user_date_updated`, `user_time_updated`, `user_status`, `user_token`, `user_access`, `user_dob`, `user_sex`, `user_age`, `user_contact_number`, `user_marital_status`, `user_address`, `user_religion`, `user_zip_code`, `user_position`, `user_career_history`, `user_cover_letter`, `user_application`, `user_skills`, `user_profile_image`) VALUES
(10000008, 'Traigo', 'Rose May', 'rt@gnail.com', '', '2024-02-25', '23:59:54', '2000-01-01', '00:00:00', 1, '', 'Teacher', '2002-08-19', 'Female', 21, '09762987564', 'Married', 'Tabao', 'Baptist', '6104', 'DefaultPosition', 'Best', 'Good', 'Better', 'Legendary', ''),
(10000006, 'Ron', 'Pelayo', 'rp@gmail.com', '123', '2024-02-25', '22:29:31', '2024-02-25', '23:32:06', 1, '', 'Masters Teacher', '0003-04-25', 'Male', 20, '09949706024', 'Single', 'Palaka', 'Baptist', '6103', '', 'Best Teacher', 'YOu will never regret having me ', 'Better', 'Legendary', ''),
(10000009, 'Mombay', 'Dave Martins', 'dm@gmail.com', '123', '2024-02-26', '00:03:00', '2024-02-26', '00:53:06', 1, '', 'Teacher', '2002-04-22', 'Male', 21, '09675982741', 'Single', 'Valladolid', 'Catholic', '6103', '', 'Goods', 'Hire na ahh', 'Bakod', 'Tanda', ''),
(10000010, 'Pelayo', 'Rympts', 'rympts@gmail.com', '123', '2024-02-26', '00:55:03', '2000-01-01', '00:00:00', 1, '', 'Teacher', '2003-04-25', 'Male', 20, '09949706024`', 'Single', 'Palaka', 'Baptist', '6103', 'DefaultPosition', 'Goods lang', 'Kwa a nako', 'Te PLano MO', 'Bakudon', ''),
(10000011, 'TRaigo', 'Mary Jane', 'mt@gmail.com', '123', '2024-02-26', '06:18:34', '2024-02-26', '06:19:46', 1, '', 'Senior Teacher', '2000-12-29', 'Female', 23, '09568439027', 'Married', 'Tabao Valladolid', 'Catholic', '6104', '', 'Good and well', 'Hire na', 'A graduate of pagka gvago mo', 'Legendary', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000012;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
