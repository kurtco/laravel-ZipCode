-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2016 at 10:30 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mulu`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `zipcode`, `location`) VALUES
(1, 'Michael', '85273', 'America/Phoenix'),
(2, 'James', '85750', 'America/Phoenix'),
(3, 'Brian', '85751', 'America/Phoenix'),
(4, 'Nicholas', '85383', 'America/Phoenix'),
(5, 'Jennifer', '85716', 'America/Phoenix'),
(6, 'Christopher', '85014', 'America/Phoenix'),
(7, 'Michael', '85751', 'America/Phoenix'),
(8, 'Patricia', '95032', 'America/Los_Angeles'),
(9, 'Beth', '94556', 'America/Los_Angeles'),
(10, 'Cathy', '92260', 'America/Los_Angeles'),
(11, 'Harold', '92120', 'America/Los_Angeles'),
(12, 'Robin', '94062', 'America/Los_Angeles'),
(13, 'James', '95503', 'America/Los_Angeles'),
(14, 'Douglas', '32159', 'America/Los_Angeles'),
(15, 'Illene', '31140', 'America/New_York'),
(16, 'Wllliam', '33417', 'America/Florida'),
(17, 'Lynn', '32789', 'America/New_York'),
(18, 'Leonie', '33417', 'America/New_York'),
(19, 'Katherin', '32034', 'America/New_York'),
(20, 'Melissa', '30516', 'America/New_York'),
(21, 'Kimberly', '30345', 'America/New_York'),
(22, 'Richard', '30606', 'America/New_York'),
(23, 'Richard', '30312', 'America/New_York'),
(24, 'Ayn', '31901', 'America/New_York'),
(25, 'Bruce', '31410', 'America/New_York'),
(26, 'Fred', '89451', 'America/Los_Angeles'),
(27, 'Robert', '89110', 'America/Los_Angeles'),
(28, 'David', '89042', 'America/Los_Angeles'),
(29, 'Maureen', '89074', 'America/Los_Angeles'),
(30, 'Mary Sue', '89705', 'America/Los_Angeles'),
(31, 'Janet', '89114', 'America/Los_Angeles'),
(32, 'John', '89145', 'America/Los_Angeles'),
(33, 'Rand', '12580', 'America/New_York'),
(34, 'Kathy', '10604', 'America/New_York'),
(35, 'Susan', '13601', 'America/New_York'),
(36, 'Robin', '10021', 'America/New_York'),
(37, 'Peter', '12550', 'America/New_York'),
(38, 'Diana', '10603', 'America/New_York'),
(39, 'Richard', '12018', 'America/New_York');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
