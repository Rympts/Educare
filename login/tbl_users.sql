-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 03:23 PM
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
(10000018, 'Morales', 'Bogart', 'bm@gmail.com', '$2y$10$N6K5XBZopte/6KzenP0oKO/ScwVAScQulR0a/F1RUl8OoPeU3f9YC', '2024-03-03', '20:19:42', '2000-01-01', '00:00:00', 1, '', 'Admin', '2000-01-01', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
(10000019, 'Pelayo', 'Ron Ryniel', 'pelayo@gmail.com', '$2y$10$mi2jZGobROy4M9CzdbXJCOU9sgDIdu90Wvt44pIyT6IV1uW/xULfK', '2024-03-03', '20:22:15', '2024-03-03', '21:24:19', 1, '', 'Teacher', '2003-04-25', 'Male', 20, '09949706024', 'Married', 'Brgy palaka Valladolid', 'Baptist', '6103', 'Masters Teacher', 'Betters', 'Goodies', 'Greatest', 'Legendary', '320245643_5714636305272779_5212765905513408486_n.jpg');

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
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000020;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
