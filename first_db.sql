-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 06:12 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `first_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_tbl`
--

CREATE TABLE `list_tbl` (
  `id` int(11) NOT NULL,
  `details` text NOT NULL,
  `date_posted` varchar(30) NOT NULL,
  `time_posted` time NOT NULL,
  `date_edited` varchar(30) NOT NULL,
  `time_edited` time NOT NULL,
  `public` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_tbl`
--

INSERT INTO `list_tbl` (`id`, `details`, `date_posted`, `time_posted`, `date_edited`, `time_edited`, `public`) VALUES
(1, 'Stream MOONLIGHT by SB19', 'April 29, 2024', '09:15:06', 'May 04, 2024', '09:22:26', 'yes'),
(2, 'Proposal Defense: Last 2 Weeks', 'April 29, 2024', '09:16:02', 'May 19, 2024', '21:05:57', 'yes'),
(4, 'asdasd', 'April 29, 2024', '09:16:17', '', '00:00:00', 'no'),
(6, 'it\'s working', 'May 01, 2024', '06:58:57', 'May 01, 2024', '07:01:26', 'yes'),
(7, 'time checheckk', 'May 01, 2024', '07:02:45', '', '00:00:00', 'yes'),
(9, 'noww', 'May 01, 2024', '07:21:19', 'May 01, 2024', '07:25:44', 'yes'),
(11, 'nye nye nyeeee', 'May, 02, 2024', '08:32:36', 'May 04, 2024', '10:51:21', 'yes'),
(13, 'time check', 'May, 02, 2024', '08:40:33', '', '00:00:00', 'no'),
(14, 'Goodluck po', 'May, 02, 2024', '18:40:42', 'May 04, 2024', '10:50:10', 'yes'),
(15, 'be fixed🦖', 'May, 03, 2024', '00:49:18', '', '00:00:00', 'yes'),
(16, '', 'May, 03, 2024', '01:02:15', 'May 04, 2024', '10:19:57', 'no'),
(17, 'yann na🧎‍♂️', 'May, 03, 2024', '12:13:56', 'May 04, 2024', '01:05:56', 'yes'),
(18, 'yeah eee', 'May, 04, 2024', '02:05:11', '', '00:00:00', 'yes'),
(19, 'stream moonlight by SB19', 'May, 04, 2024', '09:11:00', '', '00:00:00', 'yes'),
(21, 'uuuuuuuuuuuu', 'May, 04, 2024', '09:27:33', 'May 19, 2024', '21:01:38', 'yes'),
(22, 'bwak bwak bwak bwk', 'May, 04, 2024', '09:27:34', 'May 04, 2024', '10:33:25', 'yes'),
(24, 'bugsh🚑', 'May, 04, 2024', '21:57:55', 'May 04, 2024', '22:00:22', 'yes'),
(25, 'ok', 'May, 10, 2024', '14:13:46', 'May 10, 2024', '14:15:33', 'yes'),
(26, 'time check', 'May, 19, 2024', '21:00:34', '', '00:00:00', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `username`, `password`) VALUES
(2, 'mee', '111'),
(3, 'abra', '000'),
(5, 'aaj', '123'),
(6, 'AAA', '000'),
(13, 'new', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_tbl`
--
ALTER TABLE `list_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_tbl`
--
ALTER TABLE `list_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
