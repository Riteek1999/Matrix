-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2020 at 06:33 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsfeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `isfollowing`
--

CREATE TABLE `isfollowing` (
  `id` int(11) NOT NULL,
  `follower` varchar(250) NOT NULL,
  `isfollowing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `isfollowing`
--

INSERT INTO `isfollowing` (`id`, `follower`, `isfollowing`) VALUES
(58, '3', 3),
(72, '13', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `tweets` text NOT NULL,
  `userid` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `tweets`, `userid`, `datetime`) VALUES
(1, 'This is great!!', 3, '2020-01-24 16:38:02'),
(2, 'I am loving it:-)', 4, '2020-01-24 18:38:02'),
(4, 'This news feed app is great;-)', 3, '2020-01-27 19:07:18'),
(6, 'Aniket and Anirudh are my roomie;-)', 3, '2020-01-28 09:35:07'),
(7, 'This is matrix news feed!', 4, '2020-01-28 18:26:48'),
(8, 'Hello today is MONDAY;-(', 12, '2020-01-28 18:30:13'),
(9, 'I am having fun here.', 12, '2020-01-28 18:30:34'),
(10, 'Hey I am khuraffatiii!!!', 13, '2020-01-28 18:31:55'),
(11, 'get that SHIT inside your head*-*', 13, '2020-01-28 18:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(3, 'irshad', 'ir@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'rita', 'rita@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'aniket', 'aj@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(6, 'sunidhi', 's@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(7, 'xyz', 'x@gmail.com', 'd16fb36f0911f878998c136191af705e'),
(8, 'xyz', 'x@gmail.com', 'd16fb36f0911f878998c136191af705e'),
(9, 'anirudh', 'anirudh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(10, 'anirudh', 'anirudh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'RITEEKA', 'ri@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'rahul', 'rahul@gmail.com', '439ed537979d8e831561964dbbbd7413'),
(13, 'ankit', 'ankit@gmail.com', '447d2c8dc25efbc493788a322f1a00e7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `isfollowing`
--
ALTER TABLE `isfollowing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
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
-- AUTO_INCREMENT for table `isfollowing`
--
ALTER TABLE `isfollowing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
