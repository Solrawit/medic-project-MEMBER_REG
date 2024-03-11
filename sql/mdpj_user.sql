-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 08:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mdpj_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `mdpj_user`
--

CREATE TABLE `mdpj_user` (
  `user_id` int(10) NOT NULL COMMENT 'ไอดีผู้ใช้',
  `user_username` varchar(30) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `user_password` varchar(50) NOT NULL COMMENT 'รหัสผ่าน',
  `user_name` varchar(60) NOT NULL COMMENT 'ชื่อ',
  `user_surname` varchar(60) NOT NULL COMMENT 'นามสกุล',
  `user_sex` enum('ชาย','หญิง') NOT NULL COMMENT 'เพศ',
  `user_email` varchar(100) DEFAULT NULL COMMENT 'อีเมล์',
  `user_level` enum('member','admin') NOT NULL DEFAULT 'member' COMMENT 'ระดับผู้ใช้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mdpj_user`
--

INSERT INTO `mdpj_user` (`user_id`, `user_username`, `user_password`, `user_name`, `user_surname`, `user_sex`, `user_email`, `user_level`) VALUES
(1, 'admin', 'cdc1a44d6977019f2183492370fc49f7', 'สรวิชญ์', 'ช่วงชู', 'ชาย', '164405241019-st@rmutsb.ac.th', 'admin'),
(2, 'admin123', 'cdc1a44d6977019f2183492370fc49f7', 'Solrawit', 'Chungchoo', 'ชาย', 'fewfew@gmail.com', 'member'),
(3, 'solrawit', 'cdc1a44d6977019f2183492370fc49f7', 'test', 'test', 'หญิง', 'fewfew@gmail.com', 'member'),
(4, 'member', 'cdc1a44d6977019f2183492370fc49f7', 'fewfew', 'gregre', 'ชาย', 'fewfew@gmail.com', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mdpj_user`
--
ALTER TABLE `mdpj_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mdpj_user`
--
ALTER TABLE `mdpj_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีผู้ใช้', AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
