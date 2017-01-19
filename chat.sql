-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2017 at 11:28 AM
-- Server version: 10.0.28-MariaDB-1
-- PHP Version: 7.0.12-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_chats`
--

CREATE TABLE `tb_chats` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(250) NOT NULL,
  `date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_chats`
--

INSERT INTO `tb_chats` (`chat_id`, `user_id`, `text`, `date`) VALUES
(1, 1, 'dwad', '2017-01-16 09:21:44'),
(2, 1, 'Lol #25', '2017-01-16 09:25:32'),
(3, 1, 'Lol #25', '2017-01-16 09:25:55'),
(4, 1, 'dwad #44 #43', '2017-01-16 09:26:55'),
(5, 1, '#38', '2017-01-16 09:42:57'),
(9, 1, '#05 #05 #06 #06 #27 #27', '2017-01-16 09:53:57'),
(10, 1, 'Hii', '2017-01-16 10:06:33'),
(11, 2, 'uyy #04 #04', '2017-01-16 10:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(30) NOT NULL,
  `last_action` varchar(30) NOT NULL,
  `online` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `username`, `password`, `email`, `avatar`, `last_action`, `online`) VALUES
(1, 'supian', '$2y$10$ol1Y25Rdhh7pSfRM4J3cnu6a/ZfwouuV0XH2Vj63nAyxGtznWGCUO', 'privcodes@gmail.com', 'default.jpg', '1484532393', 0),
(2, 'wahid', '$2y$10$/llvONDrsrET79CrLTvcoe5Iat/6yvgPKQjvlPFu4z9YdgKDVY8Be', 'wahid@gmail.com', 'default.jpg', '1484532442', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_chats`
--
ALTER TABLE `tb_chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_chats`
--
ALTER TABLE `tb_chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
