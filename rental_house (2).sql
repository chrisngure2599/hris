-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 13, 2019 at 04:08 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house_id` int(11) NOT NULL,
  `cutomer_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `booked_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `client_name` varchar(25) NOT NULL,
  `cost` decimal(24,2) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `house_id` (`house_id`),
  KEY `cutomer_id` (`cutomer_id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `house_id`, `cutomer_id`, `owner_id`, `booked_date`, `from_date`, `to_date`, `client_name`, `cost`, `status`) VALUES
(39, 26, 3, 2, '2019-06-27 21:53:25', '2019-06-27', '2019-06-30', 'mama mama', '6700.00', 'Denied'),
(40, 24, 4, 2, '2019-06-28 11:31:10', '2019-06-29', '2019-06-30', 'jb jb', '6700.00', 'Approved'),
(41, 27, 3, 2, '2019-06-29 11:07:24', '2019-06-12', '2019-06-12', 'mama mama', '20000.00', 'Denied'),
(42, 28, 3, 2, '2019-06-30 12:28:54', '2019-07-02', '2019-07-06', 'mama mama', '50000.00', 'Pending'),
(43, 6, 8, 9, '2019-09-10 02:03:58', '2019-09-10', '2019-09-28', 'Miriam malle', '17.00', 'Pending'),
(44, 7, 8, 9, '2019-09-10 12:50:02', '2019-09-12', '2019-11-06', 'Miriam malle', '3000.00', 'Pending'),
(45, 6, 8, 9, '2019-09-10 13:02:53', '2019-10-09', '2019-10-10', 'Miriam malle', '17.00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`client_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

DROP TABLE IF EXISTS `house`;
CREATE TABLE IF NOT EXISTS `house` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  `house_image` varchar(200) NOT NULL,
  `number_of_rooms` int(3) NOT NULL,
  `location` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Available',
  `house_description` text NOT NULL,
  `price_per_time` decimal(24,2) NOT NULL,
  `minimum_time` varchar(30) NOT NULL,
  `time_type` varchar(30) NOT NULL,
  `dateuploaded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dateupdated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`id`, `type`, `house_image`, `number_of_rooms`, `location`, `status`, `house_description`, `price_per_time`, `minimum_time`, `time_type`, `dateuploaded`, `dateupdated`, `user_id`) VALUES
(5, 'selfcontainer', 'fb words.png', 4, 'ngulelo', 'Available', 'Nzurii', '3000.00', '30000', 'per Month', '2019-08-29 14:51:26', '2019-08-29 14:51:26', 9),
(6, 'Kama ya kina peter', '86.jpg', 4, 'Pale njiro', 'Booked', 'Na wewe unataka maelekezo ya nini???', '17.00', '10', 'per Month', '2019-09-09 19:42:02', '2019-09-09 19:42:02', 9),
(7, 'selfcontainer', 'Exterior.jpg', 4, 'kilomberos', 'Booked', ',ckjks', '3000.00', '30000', 'per Year', '2019-09-09 20:02:34', '2019-09-09 20:02:34', 9);

-- --------------------------------------------------------

--
-- Table structure for table `house_images`
--

DROP TABLE IF EXISTS `house_images`;
CREATE TABLE IF NOT EXISTS `house_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `house_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `house_id` (`house_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `image` text,
  `uploaded_on` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

DROP TABLE IF EXISTS `owners`;
CREATE TABLE IF NOT EXISTS `owners` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`owner_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `type` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `joining_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `gender`, `dob`, `country`, `city`, `type`, `phone`, `joining_date`) VALUES
(2, 'joy', 'Joy', 'Leon', 'joylee@yahoo.com', '$2y$10$wJ1K7LfX65kSj/wSCcK6HOKoS49ADBaTQ9W6H5AepgXexJ5NfYvzm', 'Female', '2010-10-05', 'Tanzania', 'Arusha', 'Landlord', '0657268208', '2019-05-20 03:40:47'),
(6, 'malulu', 'peter', 'malulu', 'petermmalulu@gmail.com', '$2y$10$wJ1K7LfX65kSj/wSCcK6HOKoS49ADBaTQ9W6H5AepgXexJ5NfYvzm', 'Male', '2019-10-02', '', '', 'Admin', '0679745810', '2019-08-19 23:30:51'),
(8, 'male12', 'Miriam', 'malle', 'miriwju@lku.ccs', '$2y$10$wJ1K7LfX65kSj/wSCcK6HOKoS49ADBaTQ9W6H5AepgXexJ5NfYvzm', 'Male', '2019-08-22', 'Tanznia', 'mwanza', 'Tenants', '3456890', '2019-08-21 12:53:13'),
(9, 'landlord', 'Peter', 'malulu', 'chris@test.com', '$2y$10$wovsjmowaZQqJYrDQF4aLODo3cPsxnw5qnZHymkuSBzBb6gTPewBu', 'Male', '2019-08-15', 'Tanznia', 'kilimanjaro', 'Landlord', '0234568', '2019-08-27 17:40:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
