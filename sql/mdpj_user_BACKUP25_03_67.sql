-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 08:55 PM
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
(4, 'member', 'cdc1a44d6977019f2183492370fc49f7', 'fewfew', 'gregre', 'ชาย', 'fewfew@gmail.com', 'member'),
(20, 'testtest', '05a671c66aefea124cc08b76ea6d30bb', 'test', 'test', 'ชาย', 'testtest@gmail.com', 'member'),
(21, 'member123', 'cdc1a44d6977019f2183492370fc49f7', 'member', 'member', 'ชาย', 'fewfewfew@gmail.com', 'member'),
(22, '164405241019', 'c0f29a68fb4b729d1f52a89f46f25381', 'Flyaway', 'Omg', 'ชาย', 'fdsaxsc@gmail.com', 'member'),
(23, 'itest', '80795e1b17f053032770c0eea9839d91', 'itest', 'zaza', 'หญิง', '8198fewf@gmail.com', 'member'),
(24, 'ttt', 'cdc1a44d6977019f2183492370fc49f7', 'ดำไดำไ', 'ดำไดำไ', 'ชาย', 'ttttt@gmail.com', 'member'),
(25, '123', '250cf8b51c773f3f8dc8b4be867a9a02', '123', '456', 'ชาย', '123456@gmail.com', 'member'),
(26, 'yyy', 'f0a4058fd33489695d53df156b77c724', 'tot55810', 'hhhh', 'ชาย', 'feoiwfj@gmail.com', 'member'),
(27, 'root', 'cdc1a44d6977019f2183492370fc49f7', 'sdq', 'dqwdw', 'ชาย', 'dqwdwq@gmail.com', 'member'),
(28, 'lol55810', 'e10adc3949ba59abbe56e057f20f883e', 'Eiei', 'lnwza', 'ชาย', 'dwqdwq@gmail.com', 'member'),
(29, 'test123', '202cb962ac59075b964b07152d234b70', '123', '123', 'ชาย', '123@gmail.com', 'member'),
(30, 'test1234', '202cb962ac59075b964b07152d234b70', '123', '123', 'ชาย', '123@gmail.com', 'member'),
(31, 'test12345', '202cb962ac59075b964b07152d234b70', '123', '123', 'ชาย', '123@gmail.com', 'member'),
(32, 'test123456', '202cb962ac59075b964b07152d234b70', '123', '123', 'ชาย', '123@gmail.com', 'member'),
(33, 'test1234567', '202cb962ac59075b964b07152d234b70', '123', '123', 'ชาย', '123@gmail.com', 'member'),
(34, 'test12346789789', '202cb962ac59075b964b07152d234b70', '123', '123', 'ชาย', '123@gmail.com', 'member'),
(35, 'test12346789789123', '202cb962ac59075b964b07152d234b70', '123', '123', 'ชาย', '123@gmail.com', 'member'),
(36, 'admin789456', 'cdc1a44d6977019f2183492370fc49f7', 'ดำไดำไ', 'ดำไดำไ', 'ชาย', '123456@gmail.com', 'member'),
(37, 'admin78945656', '202cb962ac59075b964b07152d234b70', 'ดำไดำไ', 'ดำไดำไ', 'ชาย', '123456@gmail.com', 'member'),
(38, 'admin78945656few', '202cb962ac59075b964b07152d234b70', 'ดำไดำไ', 'ดำไดำไ', 'ชาย', '123456@gmail.com', 'member'),
(39, 'adminfewfewfew', 'cdc1a44d6977019f2183492370fc49f7', '123', '123', 'ชาย', 'feoiwfj@gmail.com', 'member'),
(40, 'gregervfvx', 'cdc1a44d6977019f2183492370fc49f7', 'gergervcx', 'gergerfc', 'ชาย', 'dwqdwq@gmail.com', 'member'),
(41, 'adminfewfewxc', 'cdc1a44d6977019f2183492370fc49f7', 'fewdd', 'sddd', 'ชาย', 'feoiwfj@gmail.com', 'member'),
(42, '156156156', '035581cada24fa97d92e5311dd90d386', 'gfer', 'greger', 'ชาย', 'pasitza115@gmail.com', 'member'),
(43, 'adminwewwww', '9b74c98f4fdde86dcf1ba9c4b5957d52', 'fewfwefew', 'fewfewfwefew', 'ชาย', 'fewfwefew@gmail.com', 'member'),
(45, 'root123456', '25f9e794323b453885f5181f1b624d0b', 'Hisammex', 'GGmode', 'ชาย', '123@gmail.com', 'member');

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
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีผู้ใช้', AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
