-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2025 at 07:13 AM
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
-- Database: `4021db`
--
CREATE DATABASE IF NOT EXISTS `4021db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `4021db`;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `a_id` int(6) NOT NULL,
  `a_fullname` varchar(255) NOT NULL,
  `a_salary` float NOT NULL,
  `a_phone` int(10) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_address` varchar(255) NOT NULL,
  `a_birthday` varchar(255) NOT NULL,
  `a_education_level` varchar(255) NOT NULL,
  `a_gpa` float NOT NULL,
  `a_skills` varchar(255) NOT NULL,
  `a_experience` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`a_id`, `a_fullname`, `a_salary`, `a_phone`, `a_email`, `a_address`, `a_birthday`, `a_education_level`, `a_gpa`, `a_skills`, `a_experience`) VALUES
(1, 'นางสาวสุรีรัตน์ เกษกัน', 20000, 63000000, '66010914021@msu.ac.th', 'ท่าขอนยาง', '0000-00-00', '', 3.41, '0', ''),
(2, 'นางสาวสุรีรัตน์ เกษกัน', 20000, 63000000, '66010914021@msu.ac.th', 'ท่าขอนยาง', '0000-00-00', '', 3.41, 'ภาษาc', ''),
(3, 'นางสาวสุรีรัตน์ เกษกัน', 25000, 63000000, '66010914021@msu.ac.th', 'ท่าขอนยาง', '0000-00-00', '', 0, 'ภาษาC', ''),
(4, 'นางสาวสุรีรัตน์ เกษกัน', 25000, 63000000, '66010914021@msu.ac.th', 'ท่าขอนยาง', '0000-00-00', '', 3.41, 'ภาษาC', ''),
(5, 'นางสาวสุรีรัตน์ เกษกัน', 30000, 63000000, '66010914021@msu.ac.th', 'ท่าขอนยาง', '0000-00-00', '', 3.41, 'ภาษาC', ''),
(6, 'นางสาวสุรีรัตน์ เกษกัน', 30000, 63000000, '66010914021@msu.ac.th', 'ท่าขอนยาง', '0000-00-00', '', 3.41, 'ภาษาC', ''),
(7, 'นางสาวสุรีรัตน์ เกษกัน', 25000, 63000000, '66010914021@msu.ac.th', 'ท่าขอนยาง', '0000-00-00', '', 3.41, 'ภาษา', ''),
(8, 'นางสาวสุรีรัตน์ เกษกัน', 15000, 63000000, '66010914021@msu.ac.th', 'ท่าขอนยาง', '0000-00-00', '', 3.5, 'คอมพิวเตอร์', ''),
(9, 'นางสาวสุรีรัตน์ เกษกัน', 30000, 63000000, '66010914021@msu.ac.th', 'ท่าขอนยาง', '', '', 3.41, 'ไม่มี', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `r_id` int(6) NOT NULL,
  `r_fullname` varchar(255) NOT NULL,
  `r_phone` int(10) NOT NULL,
  `r_height` int(10) NOT NULL,
  `r_address` varchar(255) NOT NULL,
  `r_birthday` varchar(255) NOT NULL,
  `r_color` varchar(255) NOT NULL,
  `r_major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `r_fullname`, `r_phone`, `r_height`, `r_address`, `r_birthday`, `r_color`, `r_major`) VALUES
(1, 'สุรีรัตน์ เกษกัน', 63000000, 169, 'ท่าขอนยาง', '2017-02-01', '#563d7c', 'การบัญชี');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `a_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
