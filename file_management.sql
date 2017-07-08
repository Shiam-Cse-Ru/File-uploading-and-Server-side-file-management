-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2017 at 11:16 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `album_name` varchar(30) NOT NULL,
  `action` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `user_id`, `album_name`, `action`, `created_date`) VALUES
(10, 19, 'Timeline photos', 1, '2017-06-09 07:18:12'),
(11, 19, 'profile pics', 0, '2017-06-09 07:18:33'),
(13, 19, 'Birthday', 1, '2017-06-09 09:34:17'),
(22, 20, 'John Smith', 1, '2017-06-09 09:51:20'),
(23, 18, 'john photo', 1, '2017-06-10 10:19:54'),
(24, 22, 'my photo', 1, '2017-06-11 06:50:55'),
(25, 25, 'tour photo', 1, '2017-07-09 03:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `album_id`, `name`, `location`, `created_date`) VALUES
(20, 10, 'photo1', '551200.jpg', '2017-06-09 07:37:55'),
(21, 11, 'profile pics', '662722.jpg', '2017-06-09 07:38:42'),
(22, 12, 'tour', '799395.jpg', '2017-06-09 07:39:56'),
(23, 10, 'photo2', '98284.jpg', '2017-06-09 09:12:05'),
(24, 13, 'bday', '51608.jpg', '2017-06-09 09:34:56'),
(25, 13, '1', '682752.jpg', '2017-06-09 09:35:56'),
(26, 13, '12', '606199.jpg', '2017-06-09 09:36:06'),
(27, 13, '11', '113436.jpg', '2017-06-09 09:36:17'),
(28, 13, 'bd', '573090.jpg', '2017-06-09 09:36:38'),
(29, 22, '123', '231055.jpg', '2017-06-09 09:54:11'),
(30, 23, 'john photo', '363095.jpg', '2017-06-10 10:20:24'),
(31, 24, 'tour sundorban', '134289.jpg', '2017-06-11 06:51:36'),
(32, 26, 'shiam photos', '847900.jpg', '2017-06-11 06:59:25'),
(33, 28, 'sdfsddgfd', '351875.jpg', '2017-06-11 07:04:37'),
(34, 28, 'assf', '28316.jpg', '2017-06-11 07:04:59'),
(35, 25, 'cox''s bazar', '287578.jpg', '2017-07-09 03:11:03'),
(36, 25, 'bandorban', '670344.jpg', '2017-07-09 03:15:28'),
(37, 25, 'inani beach', '549279.jpg', '2017-07-09 03:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_date`) VALUES
(18, 'John Smith', 'john@gmail.com', '827ccb0eea8a706c4c34', '2017-06-09 06:59:28'),
(19, 'shiam', 'shiam_cse_ru@yahoo.com', '827ccb0eea8a706c4c34', '2017-06-09 07:00:53'),
(20, 'asm shiam', 'shilon@yahoo.com', '81dc9bdb52d04dc20036', '2017-06-09 07:26:53'),
(21, 'Abdullah Al Shiam', 'shiamcse@gmail.com', '81dc9bdb52d04dc20036', '2017-06-11 06:47:29'),
(22, 'kamal', 'shiam@yahoo.com', '81dc9bdb52d04dc20036', '2017-06-11 06:49:56'),
(23, 'john', 'johnsmith@yahoo.com', '81dc9bdb52d04dc20036', '2017-06-11 06:55:13'),
(24, 'asmshiam', 'asm@yahoo.com', '81dc9bdb52d04dc20036', '2017-06-11 06:58:31'),
(25, 'Rahman', 'rahman@gmail.com', '81dc9bdb52d04dc20036', '2017-07-09 03:05:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
