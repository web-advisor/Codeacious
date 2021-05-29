-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 09:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeacious`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `pin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table for Storing user profile details';

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `userid`, `fname`, `lname`, `phone`, `address`, `city`, `state`, `country`, `pin`) VALUES
(2, 2, 'Iker', 'Casillas', '93800983901', 'Madrid Lane', 'San Marino', 'Madrid', 'Spain', '102910'),
(3, 3, 'John', 'Doe', '', 'Central Perk ', 'Madelline', 'LA', 'USA', '01020'),
(4, 4, 'Lionel', 'Messi', '12912912', 'Buinos', 'Aires', 'Buinos Aires', 'Argentina', '90-090998'),
(5, 5, 'Amar', 'Sinha', '983211891', 'Mulk Road, New Light Colony, Block A', 'Delhi', 'Delhi (UT)', 'India', '110095'),
(6, 6, 'Aditi', 'Galyani', '10280292', 'East Jafrabad', 'Delhi', 'Delhi(UT)', 'India', '110093'),
(7, 7, 'Adil', 'Rashid', '19892189', 'Old Trafford', 'London', 'London', 'UK', '222222'),
(8, 8, 'Komal', 'Kamal', '19839113', 'GC-14', 'Gaur City 2', 'Uttar Pradesh', 'India', '121095'),
(9, 9, 'Kiran', 'Karmakar', '213011231', 'New Bandra Colony', 'Mumbai', 'Maharashtra', 'India', '0000002'),
(10, 10, 'Amartya', 'Jain', '91801921', 'Andheri', 'Mumbai', 'Maharashtra', 'India', '000001'),
(11, 11, 'Jia', 'Mirza', '979889', 'Nashik', 'Mumbai', 'Maharashtra', 'India', '000032'),
(12, 12, 'River', 'Dale', '123192381', 'RiverDale', 'Minnesota', 'CA', 'USA', '09121');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `code`) VALUES
(2, 'casillas', 'iker@gmail.com', '9c838f4157e528ccc8e40cd4a14b2c52', '55b37c'),
(3, 'john', 'john@doe.com', '6ca5aa150571b1d8ea72e8bf9edc3a0c', '218a0a'),
(4, 'messi', 'messi@fcb.co.es', 'aae774b2417ef469520af734e40583e4', 'd840cc'),
(5, 'amar', 'amar@gmail.com', '8b6b3f819910029a6aa3b91899eaa341', '8d5e95'),
(6, 'aditi', 'aditi@op.co', '8672d36888066aed78a4ee591373dfba', '0f28b5'),
(7, 'adil', 'adil@gm.co.uk', '0847778f7291d620b1be2111dec69d62', 'ca7591'),
(8, 'komal', 'komal@kamal.co.ko', '8f985b12ecc53690fedbcf3827c8da44', '89f0fd'),
(9, 'kiran', 'kiran@gmail.com', '769ba13db7e00d13e0a52c244fd73afb', 'ec5aa0'),
(10, 'amartya', 'amartya@jain.co.ji', 'ab036c43734ba265c0ac873e6ed9ea88', 'd82c8d'),
(11, 'jia_mirza', 'jina@haina.com', '2514e2e083af32ee7ee9dc9531a6abce', '58d4d1'),
(12, 'rover', 'river@dale.com', 'a883470428e7370a010c888e96f5c7b5', '72b32a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
