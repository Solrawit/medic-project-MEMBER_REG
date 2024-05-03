-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 10:50 PM
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
  `user_level` enum('member','admin') NOT NULL DEFAULT 'member' COMMENT 'ระดับผู้ใช้',
  `alert_time` time DEFAULT NULL COMMENT 'เวลาแจ้งเตือน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mdpj_user`
--

INSERT INTO `mdpj_user` (`user_id`, `user_username`, `user_password`, `user_name`, `user_surname`, `user_sex`, `user_email`, `user_level`, `alert_time`) VALUES
(1, 'admin', 'cdc1a44d6977019f2183492370fc49f7', 'สรวิชญ์', 'ช่วงชู', 'ชาย', '164405241019-st@rmutsb.ac.th', 'admin', '03:46:00'),
(2, 'admin123', 'cdc1a44d6977019f2183492370fc49f7', 'Solrawit', 'Chungchoo', 'ชาย', 'fewfew@gmail.com', 'member', NULL),
(3, 'solrawit', 'cdc1a44d6977019f2183492370fc49f7', 'test', 'test', 'หญิง', 'fewfew@gmail.com', 'member', NULL),
(4, 'member', 'cdc1a44d6977019f2183492370fc49f7', 'fewfew', 'gregre', 'ชาย', 'fewfew@gmail.com', 'member', NULL),
(20, 'testtest', '05a671c66aefea124cc08b76ea6d30bb', 'test', 'test', 'ชาย', 'testtest@gmail.com', 'member', NULL),
(21, 'member123', 'cdc1a44d6977019f2183492370fc49f7', 'member', 'member', 'ชาย', 'fewfewfew@gmail.com', 'member', NULL),
(22, '164405241019', 'c0f29a68fb4b729d1f52a89f46f25381', 'Flyaway', 'Omg', 'ชาย', 'fdsaxsc@gmail.com', 'member', NULL),
(23, 'itest', '80795e1b17f053032770c0eea9839d91', 'itest', 'zaza', 'หญิง', '8198fewf@gmail.com', 'member', NULL),
(24, 'ttt', 'cdc1a44d6977019f2183492370fc49f7', 'ดำไดำไ', 'ดำไดำไ', 'ชาย', 'ttttt@gmail.com', 'member', NULL),
(25, '123', '250cf8b51c773f3f8dc8b4be867a9a02', '123', '456', 'ชาย', '123456@gmail.com', 'member', NULL),
(26, 'yyy', 'f0a4058fd33489695d53df156b77c724', 'tot55810', 'hhhh', 'ชาย', 'feoiwfj@gmail.com', 'member', NULL),
(27, 'root', 'cdc1a44d6977019f2183492370fc49f7', 'sdq', 'dqwdw', 'ชาย', 'dqwdwq@gmail.com', 'member', NULL),
(28, 'lol55810', 'e10adc3949ba59abbe56e057f20f883e', 'Eiei', 'lnwza', 'ชาย', 'dwqdwq@gmail.com', 'member', NULL),
(29, 'test123', '202cb962ac59075b964b07152d234b70', '123', '123', 'ชาย', '123@gmail.com', 'member', NULL),
(31, 'test12345', '202cb962ac59075b964b07152d234b70', '123', '123', 'ชาย', '123@gmail.com', 'member', NULL),
(33, 'test1234567', '202cb962ac59075b964b07152d234b70', '123', '123', 'ชาย', '123@gmail.com', 'member', NULL),
(34, 'test12346789789', '202cb962ac59075b964b07152d234b70', '123', '123', 'ชาย', '123@gmail.com', 'member', NULL),
(35, 'test12346789789123', '202cb962ac59075b964b07152d234b70', '123', '123', 'ชาย', '123@gmail.com', 'member', NULL),
(36, 'admin789456', 'cdc1a44d6977019f2183492370fc49f7', 'ดำไดำไ', 'ดำไดำไ', 'ชาย', '123456@gmail.com', 'member', NULL),
(37, 'admin78945656', '202cb962ac59075b964b07152d234b70', 'ดำไดำไ', 'ดำไดำไ', 'ชาย', '123456@gmail.com', 'member', NULL),
(38, 'admin78945656few', '202cb962ac59075b964b07152d234b70', 'ดำไดำไ', 'ดำไดำไ', 'ชาย', '123456@gmail.com', 'member', NULL),
(39, 'adminfewfewfew', 'cdc1a44d6977019f2183492370fc49f7', '123', '123', 'ชาย', 'feoiwfj@gmail.com', 'member', NULL),
(40, 'gregervfvx', 'cdc1a44d6977019f2183492370fc49f7', 'gergervcx', 'gergerfc', 'ชาย', 'dwqdwq@gmail.com', 'member', NULL),
(41, 'adminfewfewxc', 'cdc1a44d6977019f2183492370fc49f7', 'fewdd', 'sddd', 'ชาย', 'feoiwfj@gmail.com', 'member', NULL),
(42, '156156156', '035581cada24fa97d92e5311dd90d386', 'gfer', 'greger', 'ชาย', 'pasitza115@gmail.com', 'member', NULL),
(43, 'adminwewwww', '123', 'fewfwefew', 'fewfewfwefew', 'ชาย', 'fewfwefew@gmail.com', 'member', NULL),
(47, 'solrawit123', '202cb962ac59075b964b07152d234b70', 'Solrwait', 'Chungchoo', 'ชาย', '164405241019-st@rmutsb.ac.th', 'admin', NULL),
(48, 'qqqqqqqqqqqqq', '1233a5207fc5b0a6ef97deca8bba95fa', 'qqqqqq', 'qqqqqqq', 'ชาย', 'qqqq@gmail.com', 'admin', '03:20:00'),
(49, '', '', '', '', '', NULL, 'member', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `line_user_id` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `line_user_id`, `display_name`, `picture_url`, `email`, `login_time`, `created_at`) VALUES
(1, 'U92e8a6ba279132dfccb4a176a794823a', 'Solrawit', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', '', '2024-03-28 03:02:33', '2024-03-28 02:02:33'),
(2, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', '', '2024-03-28 03:03:40', '2024-03-28 02:03:40'),
(3, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', '', '2024-03-28 03:06:08', '2024-03-28 02:06:08'),
(4, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', '', '2024-03-28 03:06:50', '2024-03-28 02:06:50'),
(5, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', '', '2024-03-28 03:09:39', '2024-03-28 02:09:39'),
(6, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', '', '2024-03-28 03:11:23', '2024-03-28 02:11:23'),
(7, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', '', '2024-03-28 03:11:39', '2024-03-28 02:11:39'),
(8, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', '', '2024-03-28 03:12:07', '2024-03-28 02:12:07'),
(9, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', '', '2024-03-28 03:14:04', '2024-03-28 02:14:04'),
(10, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', '', '2024-03-28 03:15:25', '2024-03-28 02:15:25'),
(11, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', '', '2024-03-28 03:17:20', '2024-03-28 02:17:20'),
(12, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', '', '2024-03-28 03:17:35', '2024-03-28 02:17:35'),
(13, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', NULL, '2024-03-28 03:19:17', '2024-03-28 02:19:17'),
(14, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', NULL, '2024-03-28 03:21:07', '2024-03-28 02:21:07'),
(15, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', NULL, '2024-03-28 03:27:02', '2024-03-28 02:27:02'),
(16, '', '', '', NULL, '2024-03-28 03:32:21', '2024-03-28 02:32:21'),
(17, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', NULL, '2024-03-28 03:33:19', '2024-03-28 02:33:19'),
(18, '', '', '', NULL, '2024-03-28 03:34:53', '2024-03-28 02:34:53'),
(19, '', '', '', NULL, '2024-03-28 03:35:58', '2024-03-28 02:35:58'),
(20, '', '', '', NULL, '2024-03-28 03:36:17', '2024-03-28 02:36:17'),
(21, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', NULL, '2024-03-28 03:36:59', '2024-03-28 02:36:59'),
(22, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', NULL, '2024-03-28 03:38:27', '2024-03-28 02:38:27'),
(23, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', NULL, '2024-03-28 03:39:43', '2024-03-28 02:39:43'),
(24, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', NULL, '2024-03-29 08:40:19', '2024-03-29 07:40:19'),
(25, 'U92e8a6ba279132dfccb4a176a794823a', 'nextgen.f_m', 'https://profile.line-scdn.net/0hBVjxEYWJHXlHAQ0am8xjBjdRHhNkcERraGFWHHYJREopYgorbDAFTSEISk56Mg4oO2AGGyAJQEFLEmofWVfhTUAxQEh7NFouaWdSlg', NULL, '2024-03-29 08:44:59', '2024-03-29 07:44:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mdpj_user`
--
ALTER TABLE `mdpj_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mdpj_user`
--
ALTER TABLE `mdpj_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีผู้ใช้', AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
