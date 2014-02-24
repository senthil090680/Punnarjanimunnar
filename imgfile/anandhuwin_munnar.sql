-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2013 at 10:33 PM
-- Server version: 5.1.56-community
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `anandhuwin_munnar`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE IF NOT EXISTS `customer_details` (
  `Cust_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Cust_Name` varchar(100) NOT NULL,
  `Cust_Address` varchar(100) NOT NULL,
  `Email_ID` varchar(100) NOT NULL,
  `Age` int(10) NOT NULL,
  `Sex` enum('male','female') NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `regards` varchar(100) NOT NULL,
  `team` varchar(100) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Cust_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE IF NOT EXISTS `event_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Event_name` varchar(100) NOT NULL,
  `Remarks` text NOT NULL,
  `Class_one_rate` varchar(100) NOT NULL,
  `Class_two_rate` varchar(100) NOT NULL,
  `Class_three_rate` varchar(100) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`id`, `Event_name`, `Remarks`, `Class_one_rate`, `Class_two_rate`, `Class_three_rate`, `stamp`) VALUES
(14, 'E1', 'test', '40', '50', '60', '2012-12-31 02:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `event_ticket`
--

CREATE TABLE IF NOT EXISTS `event_ticket` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Ticket_Uniq_ID` int(10) NOT NULL,
  `Ticket_ID` varchar(100) NOT NULL,
  `Ticket_Rate_ID` varchar(100) NOT NULL,
  `Payment_Status` enum('paid','unpaid') NOT NULL,
  `ticket_status` enum('booked','confirmed','cancel') NOT NULL,
  `Remarks` text NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`Ticket_Uniq_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_timing`
--

CREATE TABLE IF NOT EXISTS `event_timing` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Event_ID` varchar(100) NOT NULL,
  `Location_ID` varchar(100) NOT NULL,
  `Event_Timings` date NOT NULL,
  `time` time NOT NULL,
  `ampm` varchar(100) NOT NULL,
  `Remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `event_timing`
--

INSERT INTO `event_timing` (`id`, `Event_ID`, `Location_ID`, `Event_Timings`, `time`, `ampm`, `Remarks`) VALUES
(15, '14', '18', '2013-01-15', '02:00:00', 'AM', 'f'),
(14, '14', '18', '2012-12-31', '10:45:00', 'AM', ''),
(16, 'Choose...', 'Choose...', '2013-01-06', '07:00:00', 'PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `location_master`
--

CREATE TABLE IF NOT EXISTS `location_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Auditorium_Name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `Class_one_No_Seat` varchar(100) NOT NULL,
  `Class_two_No_Seat` varchar(100) NOT NULL,
  `Class_three_No_Seat` varchar(100) NOT NULL,
  `Remarks` text NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `location_master`
--

INSERT INTO `location_master` (`id`, `Auditorium_Name`, `city`, `address`, `Class_one_No_Seat`, `Class_two_No_Seat`, `Class_three_No_Seat`, `Remarks`, `stamp`) VALUES
(18, 'A1', 'CHENNAI', 'CHENNAI', '12', '14', '15', 'TEST', '2012-12-28 17:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `seating_a`
--

CREATE TABLE IF NOT EXISTS `seating_a` (
  `seating_id` int(10) NOT NULL AUTO_INCREMENT,
  `Event_timing_id` int(10) NOT NULL,
  `seating_place` varchar(100) NOT NULL,
  PRIMARY KEY (`seating_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `seating_a`
--

INSERT INTO `seating_a` (`seating_id`, `Event_timing_id`, `seating_place`) VALUES
(12, 0, '1C'),
(13, 0, '2C'),
(14, 0, '6A'),
(15, 0, '6A'),
(16, 0, '6B'),
(17, 0, '6C'),
(18, 0, '4A'),
(19, 0, '5A'),
(20, 0, '6A'),
(21, 0, '3A'),
(22, 0, '2B'),
(23, 0, '1C'),
(24, 0, '3A'),
(25, 0, '4A'),
(26, 0, '2B'),
(27, 0, '3A'),
(28, 0, '3B'),
(29, 0, '3A'),
(30, 0, '4A'),
(31, 0, '6A'),
(32, 0, '7A'),
(33, 9, '1C'),
(34, 9, '2C'),
(35, 9, '3A'),
(36, 9, '4A'),
(37, 12, '1I'),
(38, 12, '2I'),
(39, 12, '3I'),
(40, 12, '4I'),
(41, 12, '1I'),
(42, 12, '2I'),
(43, 12, '3I'),
(44, 12, '4I'),
(45, 12, '5I'),
(46, 12, '3F'),
(47, 12, '4F'),
(48, 12, '5F'),
(49, 12, '6F'),
(50, 12, '6I'),
(51, 12, '7I'),
(52, 12, '6I'),
(53, 12, '7I'),
(54, 13, '5J'),
(55, 13, '6J'),
(56, 13, '1J'),
(57, 13, '2J'),
(58, 13, '3J'),
(59, 13, '4J'),
(60, 13, '1I'),
(61, 13, '2I'),
(62, 13, '2D'),
(63, 13, '3D'),
(64, 13, '4D'),
(65, 13, '13C'),
(66, 13, '12C'),
(67, 13, '11C'),
(68, 14, '1G'),
(69, 14, '2G'),
(70, 14, '1F'),
(71, 14, '2F'),
(72, 14, '3F'),
(73, 14, '4F'),
(74, 14, '2D'),
(75, 14, '3D'),
(76, 14, '4D'),
(77, 14, '2D'),
(78, 14, '3D'),
(79, 14, '4D'),
(80, 14, '2A'),
(81, 14, '3A'),
(82, 14, '4A'),
(83, 14, '2E'),
(84, 14, '4E'),
(85, 14, '5E'),
(86, 14, '5D'),
(87, 14, '6D'),
(88, 14, '7D'),
(89, 14, '8D'),
(90, 14, '12G'),
(91, 14, '11G'),
(92, 14, '10G'),
(93, 14, '11E'),
(94, 14, '10E'),
(95, 14, '9E'),
(96, 14, '12C'),
(97, 14, '11C'),
(98, 14, '10C'),
(99, 14, '9C'),
(100, 14, '5H'),
(101, 14, '7H'),
(102, 14, '9H'),
(103, 14, '11I'),
(104, 14, '10I'),
(105, 14, '9I'),
(106, 14, '1A'),
(107, 14, '2A'),
(108, 14, '3A'),
(109, 14, '4A'),
(110, 14, '2D'),
(111, 14, '3D'),
(112, 14, '4D'),
(113, 14, '161'),
(114, 14, '162'),
(115, 14, '1D'),
(116, 14, '12F'),
(117, 14, '11F'),
(118, 14, '10F'),
(119, 14, '6B'),
(120, 14, '2C'),
(121, 14, '5C'),
(122, 14, '7C'),
(123, 14, '3D'),
(124, 14, '5E'),
(125, 14, '8F'),
(126, 14, '4H'),
(127, 14, '6I');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_rate`
--

CREATE TABLE IF NOT EXISTS `tickets_rate` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Event_ID` varchar(100) NOT NULL,
  `Location_ID` varchar(100) NOT NULL,
  `Type_Class` enum('Class I',' Class II','Class III') NOT NULL,
  `Ticket_Rate` varchar(100) NOT NULL,
  `Remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_details`
--

CREATE TABLE IF NOT EXISTS `ticket_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `seating_id` varchar(100) NOT NULL,
  `ticket_number` varchar(100) NOT NULL,
  `event_timing_id` int(10) NOT NULL,
  `payment_status` enum('paid','not paid','cancelled') NOT NULL DEFAULT 'not paid',
  `date_of_registration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `ticket_details`
--

INSERT INTO `ticket_details` (`id`, `seating_id`, `ticket_number`, `event_timing_id`, `payment_status`, `date_of_registration`) VALUES
(28, '29', '1335', 0, 'not paid', '2012-12-22 15:58:45'),
(27, '28', '2891', 0, 'not paid', '2012-12-22 15:55:41'),
(26, '27', '2891', 0, 'not paid', '2012-12-22 15:55:41'),
(25, '26', '2246', 0, 'not paid', '2012-12-22 15:52:47'),
(24, '25', '2563', 0, 'not paid', '2012-12-22 15:49:40'),
(23, '24', '2563', 0, 'not paid', '2012-12-22 15:49:40'),
(22, '23', '1139', 0, 'not paid', '2012-12-22 15:46:57'),
(21, '22', '1139', 0, 'not paid', '2012-12-22 15:46:57'),
(20, '21', '1139', 0, 'not paid', '2012-12-22 15:46:57'),
(29, '30', '1335', 0, 'not paid', '2012-12-22 15:58:45'),
(30, '31', '1297', 0, 'not paid', '2012-12-22 16:38:37'),
(31, '32', '1297', 0, 'not paid', '2012-12-22 16:38:37'),
(32, '33', '2998', 9, 'not paid', '2012-12-23 03:13:27'),
(33, '34', '2998', 9, 'not paid', '2012-12-23 03:13:27'),
(34, '35', '2756', 9, 'not paid', '2012-12-23 03:22:39'),
(35, '36', '2756', 9, 'not paid', '2012-12-23 03:22:39'),
(36, '37', '3603', 12, 'not paid', '2012-12-25 13:57:55'),
(37, '38', '3603', 12, 'not paid', '2012-12-25 13:57:55'),
(38, '39', '3603', 12, 'not paid', '2012-12-25 13:57:55'),
(39, '40', '3603', 12, 'not paid', '2012-12-25 13:57:55'),
(40, '41', '1567', 12, 'not paid', '2012-12-25 13:58:00'),
(41, '42', '1567', 12, 'not paid', '2012-12-25 13:58:00'),
(42, '43', '1567', 12, 'not paid', '2012-12-25 13:58:00'),
(43, '44', '1567', 12, 'not paid', '2012-12-25 13:58:00'),
(44, '45', '1567', 12, 'not paid', '2012-12-25 13:58:00'),
(45, '46', '1265', 12, 'not paid', '2012-12-27 10:02:22'),
(46, '47', '1265', 12, 'not paid', '2012-12-27 10:02:22'),
(47, '48', '1265', 12, 'not paid', '2012-12-27 10:02:22'),
(48, '49', '1265', 12, 'not paid', '2012-12-27 10:02:22'),
(49, '50', '1097', 12, 'not paid', '2012-12-28 16:28:38'),
(50, '51', '1097', 12, 'not paid', '2012-12-28 16:28:38'),
(51, '52', '2064', 12, 'not paid', '2012-12-28 16:30:00'),
(52, '53', '2064', 12, 'not paid', '2012-12-28 16:30:00'),
(53, '54', '2598', 13, 'not paid', '2012-12-28 17:52:22'),
(54, '55', '2598', 13, 'not paid', '2012-12-28 17:52:22'),
(55, '56', '1302', 13, 'not paid', '2012-12-28 18:35:57'),
(56, '57', '1302', 13, 'not paid', '2012-12-28 18:35:57'),
(57, '58', '1302', 13, 'not paid', '2012-12-28 18:35:57'),
(58, '59', '1302', 13, 'not paid', '2012-12-28 18:35:57'),
(59, '60', '3117', 13, 'paid', '2012-12-29 13:56:52'),
(60, '61', '3117', 13, 'paid', '2012-12-29 13:56:52'),
(61, '62', '3396', 13, 'not paid', '2012-12-29 06:55:07'),
(62, '63', '3396', 13, 'not paid', '2012-12-29 06:55:07'),
(63, '64', '3396', 13, 'not paid', '2012-12-29 06:55:07'),
(64, '65', '3445', 13, 'not paid', '2012-12-29 13:29:55'),
(65, '66', '3445', 13, 'not paid', '2012-12-29 13:29:55'),
(66, '67', '3445', 13, 'not paid', '2012-12-29 13:29:55'),
(67, '68', '3146', 14, 'not paid', '2012-12-31 02:44:13'),
(68, '69', '3146', 14, 'not paid', '2012-12-31 02:44:13'),
(69, '70', '2217', 14, 'not paid', '2013-01-01 02:31:55'),
(70, '71', '2217', 14, 'not paid', '2013-01-01 02:31:55'),
(71, '72', '2217', 14, 'not paid', '2013-01-01 02:31:55'),
(72, '73', '2217', 14, 'not paid', '2013-01-01 02:31:55'),
(73, '74', '2408', 14, 'paid', '2013-01-01 13:49:16'),
(74, '75', '2408', 14, 'paid', '2013-01-01 13:49:16'),
(75, '76', '2408', 14, 'paid', '2013-01-01 13:49:16'),
(76, '77', '2688', 14, 'not paid', '2013-01-01 13:49:29'),
(77, '78', '2688', 14, 'not paid', '2013-01-01 13:49:29'),
(78, '79', '2688', 14, 'not paid', '2013-01-01 13:49:29'),
(79, '80', '1372', 14, 'paid', '2013-01-01 15:06:54'),
(80, '81', '1372', 14, 'paid', '2013-01-01 15:06:54'),
(81, '82', '1372', 14, 'paid', '2013-01-01 15:06:54'),
(82, '83', '3665', 14, 'not paid', '2013-01-01 15:33:36'),
(83, '84', '3665', 14, 'not paid', '2013-01-01 15:33:36'),
(84, '85', '3665', 14, 'not paid', '2013-01-01 15:33:36'),
(85, '86', '2806', 14, 'paid', '2013-01-01 15:39:16'),
(86, '87', '2806', 14, 'paid', '2013-01-01 15:39:16'),
(87, '88', '2806', 14, 'paid', '2013-01-01 15:39:16'),
(88, '89', '2806', 14, 'paid', '2013-01-01 15:39:16'),
(89, '90', '3345', 14, 'not paid', '2013-01-02 06:45:51'),
(90, '91', '3345', 14, 'not paid', '2013-01-02 06:45:51'),
(91, '92', '3345', 14, 'not paid', '2013-01-02 06:45:51'),
(92, '93', '2799', 14, 'not paid', '2013-01-02 11:14:28'),
(93, '94', '2799', 14, 'not paid', '2013-01-02 11:14:28'),
(94, '95', '2799', 14, 'not paid', '2013-01-02 11:14:28'),
(95, '96', '1512', 14, 'not paid', '2013-01-02 11:20:12'),
(96, '97', '1512', 14, 'not paid', '2013-01-02 11:20:12'),
(97, '98', '1512', 14, 'not paid', '2013-01-02 11:20:12'),
(98, '99', '1512', 14, 'not paid', '2013-01-02 11:20:12'),
(99, '100', '3988', 14, 'paid', '2013-01-02 16:32:58'),
(100, '101', '3988', 14, 'paid', '2013-01-02 16:32:58'),
(101, '102', '3988', 14, 'paid', '2013-01-02 16:32:58'),
(102, '103', '3656', 14, 'not paid', '2013-01-05 07:30:52'),
(103, '104', '3656', 14, 'not paid', '2013-01-05 07:30:52'),
(104, '105', '3656', 14, 'not paid', '2013-01-05 07:30:52'),
(105, '106', '3229', 14, 'not paid', '2013-01-05 07:57:31'),
(106, '107', '3229', 14, 'not paid', '2013-01-05 07:57:31'),
(107, '108', '3229', 14, 'not paid', '2013-01-05 07:57:31'),
(108, '109', '3229', 14, 'not paid', '2013-01-05 07:57:31'),
(109, '110', '1616', 14, 'paid', '2013-01-05 08:02:10'),
(110, '111', '1616', 14, 'paid', '2013-01-05 08:02:10'),
(111, '112', '1616', 14, 'paid', '2013-01-05 08:02:10'),
(112, '113', '3251', 14, 'not paid', '2013-01-05 11:37:31'),
(113, '114', '3251', 14, 'not paid', '2013-01-05 11:37:31'),
(114, '115', '1914', 14, 'not paid', '2013-01-05 16:36:14'),
(115, '116', '2640', 14, 'not paid', '2013-01-05 17:04:50'),
(116, '117', '2640', 14, 'not paid', '2013-01-05 17:04:50'),
(117, '118', '2640', 14, 'not paid', '2013-01-05 17:04:50'),
(118, '119', '2547', 14, 'not paid', '2013-01-12 10:32:38'),
(119, '120', '2547', 14, 'not paid', '2013-01-12 10:32:38'),
(120, '121', '2547', 14, 'not paid', '2013-01-12 10:32:38'),
(121, '122', '2547', 14, 'not paid', '2013-01-12 10:32:38'),
(122, '123', '2547', 14, 'not paid', '2013-01-12 10:32:38'),
(123, '124', '2547', 14, 'not paid', '2013-01-12 10:32:38'),
(124, '125', '2547', 14, 'not paid', '2013-01-12 10:32:38'),
(125, '126', '2547', 14, 'not paid', '2013-01-12 10:32:38'),
(126, '127', '2547', 14, 'not paid', '2013-01-12 10:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE IF NOT EXISTS `user_registration` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile_number` int(10) NOT NULL,
  `type_of_user` enum('user','admin') NOT NULL DEFAULT 'user',
  `active` enum('y','n') NOT NULL DEFAULT 'n',
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `name`, `email`, `password`, `mobile_number`, `type_of_user`, `active`, `registration_date`) VALUES
(31, 'balakumar', 'assurebala@gmail.com', 'bala', 23434, 'user', 'n', '2012-12-29 09:34:54'),
(30, 'balakumar', 'master.php5@gmail.com', 'YmFsYWt1bWFy', 2147483647, 'user', 'n', '2012-12-29 06:50:20'),
(29, 'sun1', 'sunsecurity84@gmail.com', 'c3Vu', 456365, 'user', 'n', '2012-12-29 06:49:46'),
(28, '1', '1', 'MQ==', 1, 'user', 'n', '2012-12-29 06:47:43'),
(27, 'balakumar', 'assurebala@gmail.com', 'balakumar', 2434, 'user', 'n', '2012-12-28 16:12:06'),
(32, 'TEST', 'assurebala@gmail.com', 'bala', 8345, 'user', 'n', '2012-12-29 13:16:56'),
(33, '1', '1', '1', 1, 'user', 'n', '2013-01-01 15:36:32'),
(34, 'narayan', 'narukorappath@yahoo.co.uk', 'korappan', 2147483647, 'user', 'n', '2013-01-02 11:05:02'),
(35, 'raj', 'raj.itvijay@gmail.com', 'avemaria2420', 2147483647, 'user', 'n', '2013-01-05 11:35:26'),
(36, 'lekshminarayanan', '', '', 0, 'user', 'n', '2013-01-18 12:01:28'),
(37, 'lekshminarayanan', 'lekshminarayanan', 'muthu@2007', 2147483647, 'user', 'n', '2013-01-18 12:02:42'),
(38, 'rajshan', 'rajshan_lbn@yahoo.com', 'avemaria2420', 2147483647, 'user', 'n', '2013-01-26 10:43:18'),
(39, 'sushant', 'sushantkabadar@gmail.com', 'gprs2012', 2147483647, 'user', 'n', '2013-01-27 08:56:33'),
(40, 'lekshminarayanan', 'lekshmikorappath@gmail.com', 'narayanan1975', 2147483647, 'user', 'n', '2013-01-29 09:01:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
