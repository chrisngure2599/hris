-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 09:55 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hris`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house_id` int(11) NOT NULL,
  `cutomer_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `booked_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `house_type` varchar(254) NOT NULL,
  `client_name` varchar(25) NOT NULL,
  `cost` decimal(24,2) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `house_id` (`house_id`),
  KEY `cutomer_id` (`cutomer_id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `house_id`, `cutomer_id`, `owner_id`, `booked_date`, `from_date`, `to_date`, `house_type`, `client_name`, `cost`, `status`) VALUES
(39, 26, 3, 2, '2019-06-27 21:53:25', '2019-06-27', '2019-06-30', 'Bungalo', 'mama mama', '6700.00', 'Approved'),
(40, 24, 4, 2, '2019-06-28 11:31:10', '2019-06-29', '2019-06-30', 'bulo', 'jb jb', '6700.00', 'Approved'),
(41, 27, 3, 2, '2019-06-29 11:07:24', '2019-06-12', '2019-06-12', 'normal', 'mama mama', '20000.00', 'Denied'),
(42, 28, 3, 2, '2019-06-30 12:28:54', '2019-07-02', '2019-07-06', 'normal', 'mama mama', '50000.00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`client_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

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
  `dateuploaded` timestamp NOT NULL,
  `dateupdated` timestamp NOT NULL,
  `user_id` int(11) NOT NULL,
  `fance` varchar(20) NOT NULL,
  `security` varchar(20) NOT NULL,
  `ac` varchar(20) NOT NULL,
  `tiles` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`id`, `type`, `house_image`, `number_of_rooms`, `location`, `status`, `house_description`, `price_per_time`, `minimum_time`, `time_type`, `dateuploaded`, `dateupdated`, `user_id`, `fance`, `security`, `ac`, `tiles`) VALUES
(23, 'selfcontained', 'nyumba7.jpg', 2, 'kilombero', 'Available', 'kitchen and single public toilet, the house have parking of three cars ,we have water 24/7 electricity and solar  ', '123000.00', '1 year  ', 'per Year', '2019-06-27 13:14:35', '0000-00-00 00:00:00', 2, '', '', '', ''),
(24, 'bulo', '85.jpg', 3, 'Mianzini', 'Booked', 'the house has electricity 24 hours, availability of water solar systems and is near social services like father babu hospital', '6700.00', '3 months', 'per Month', '2019-06-27 13:15:59', '0000-00-00 00:00:00', 2, '', '', '', ''),
(25, 'Single Floor Building', 'nyumba8.jpg', 9, 'arusha urban', 'Available', '3 self contained rooms ,3 independent rooms , kitchen and single public toilet, the house have parking of three cars ,we have water 24/7 electricity and solar  ', '34000.00', '1 year ', 'per Month', '2019-06-27 13:17:08', '0000-00-00 00:00:00', 2, '', '', '', ''),
(26, 'Bungalo', 'index56.jpg', 4, 'Mianzini', 'Booked', 'kitchen and single public toilet, the house have parking of three cars ,we have water 24/7 electricity and solar  ', '6700.00', '3 months', 'per Month', '2019-06-27 13:18:09', '0000-00-00 00:00:00', 2, '', '', '', ''),
(27, 'normal', 'nyumba10.jpg', 1, 'matejoo', 'Booked', 'security, solar near social services', '20000.00', '3 months', 'per Month', '2019-06-27 13:21:38', '0000-00-00 00:00:00', 2, '', '', '', ''),
(28, 'normal', 'nyumba 5.jpg', 3, 'matejoo', 'Booked', 'the house has good for family', '50000.00', '3 months ', 'per Year', '2019-06-27 13:23:33', '0000-00-00 00:00:00', 2, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `house_images`
--

CREATE TABLE IF NOT EXISTS `house_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `house_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `house_id` (`house_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `image` text,
  `uploaded_on` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE IF NOT EXISTS `owners` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`owner_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
  `joining_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `gender`, `dob`, `country`, `city`, `type`, `phone`, `joining_date`) VALUES
(1, 'mary', 'Mary', 'Chuwa', 'chuwamary951@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male', '1997-12-11', 'Tanzanian', 'Arusha', 'Admin', '0788749437', '2019-05-22 00:09:01'),
(2, 'joy', 'Joy', 'Leon', 'joylee@yahoo.com', '202cb962ac59075b964b07152d234b70', 'Female', '2010-10-05', 'Tanzania', 'Arusha', 'Landlord', '0657268208', '2019-05-20 03:40:47'),
(3, 'imama', 'mama', 'mama', 'marykimanya@gmail.com', '202cb962ac59075b964b07152d234b70', 'Female', '2019-05-07', 'uk', 'uk', 'Tenants', '0657268204', '2019-05-20 12:10:44'),
(4, 'jb', 'jb', 'jb', 'chuwamary95@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male', '2019-05-02', 'Tanzania', 'morogoro', 'Tenants', '0757268205', '2019-05-29 12:45:26'),
(5, 'baraka', 'sophia', 'chuwa', 'chuwamary995@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male', '1981-08-22', 'uk', 'new', 'Tenants', '0719930740', '2019-06-19 12:06:23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
