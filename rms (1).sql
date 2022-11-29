-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2022 at 07:26 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `table_name` int(30) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `total_amount` float NOT NULL,
  `discount` float NOT NULL,
  `sgst` float NOT NULL,
  `cgst` float NOT NULL,
  `net_payable_amount` float NOT NULL,
  `discount_type` int(30) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_bill_table` (`table_name`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `table_name`, `customer_name`, `customer_email`, `date`, `total_amount`, `discount`, `sgst`, `cgst`, `net_payable_amount`, `discount_type`, `payment_status`) VALUES
(31, 4, 'w', '', '2022-07-09', 400, 32, 9.2, 9.2, 386.4, 2, 'PAID'),
(32, 4, 'w', '', '2022-07-09', 12, 0, 0.3, 0.3, 12.6, 1, 'PAID'),
(33, 4, 'w', '', '2022-07-09', 24, 0, 0.6, 0.6, 25.2, 1, 'PAID'),
(34, 4, 'q', '', '2022-07-10', 636, 0, 15.9, 15.9, 667.8, 3, 'PAID'),
(35, 2, 'xxx', '', '2022-07-10', 1000, 100, 22.5, 22.5, 945, 5, 'PAID'),
(36, 4, 'a', '', '2022-07-10', 812, 40.6, 19.285, 19.285, 809.97, 1, 'PAID'),
(37, 4, 'q', '', '2022-07-09', 600, 30, 14.25, 14.25, 598.5, 1, 'PAID'),
(38, 4, 'q', '', '2022-07-09', 36, 0, 0.9, 0.9, 37.8, 3, 'PAID'),
(39, 4, 'we', '', '2022-07-09', 600, 0, 15, 15, 630, 3, 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(30) NOT NULL,
  `item_description` varchar(200) NOT NULL,
  `item_price` float NOT NULL,
  `item_catagory` int(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_name` (`item_name`),
  KEY `FK_Item_Cat` (`item_catagory`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `item_description`, `item_price`, `item_catagory`, `status`) VALUES
(4, 'PANEER TIKKA ', 'Cubed Indian cheese marinated in yogurt, garlic and ginger', 200, 5, 'Available'),
(6, 'NAAN ', 'White flour hand tossed bread with butter', 100, 8, 'Available'),
(7, 'ROTI', 'Whole wheat bread with butter \"V\" Available', 70, 8, 'Available'),
(8, 'VEGETABLE BIRYANI ', 'Vegetables in a lightly spiced sauce, with herbs, baked with basmati rice', 250, 7, 'Available'),
(9, 'CHICKEN BIRYANI ', 'Boneless chicken in a ligthly spiced sauce, with herbs, baked with basmati rice', 270, 7, 'Available'),
(11, 'DAL TADKA', 'Red lentils cooked with onion & tomatoes ', 200, 5, 'Available'),
(14, 'CHAAT PAPDI  ', 'Fried papdi mixed with onions, tomatoes, mint, tamarind & yogurt	', 150, 6, 'Not Available'),
(16, 'KIMA', '1234', 12, 3, 'Available'),
(17, 'K', 'k', 1, 5, 'Available'),
(18, 'ANA', 'test', 100, 3, 'Available'),
(19, 'TEST2', 'test2', 1, 3, 'Available'),
(20, 'Q', 'q', 12, 3, 'Available'),
(21, 'TEST', 't', 1, 3, 'Not Available'),
(23, 'TEST1', 'q', 1, 3, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `item_catagory`
--

DROP TABLE IF EXISTS `item_catagory`;
CREATE TABLE IF NOT EXISTS `item_catagory` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `manage_by` int(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `FK_Cat_Admin` (`manage_by`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_catagory`
--

INSERT INTO `item_catagory` (`id`, `name`, `manage_by`) VALUES
(3, 'NON-VEG', 8),
(5, 'VEG', 8),
(6, 'APPETIZERS', 8),
(7, 'BIRYANI', 8),
(8, 'BREADS', 8),
(9, 'TEST', 8);

-- --------------------------------------------------------

--
-- Table structure for table `rms_admin`
--

DROP TABLE IF EXISTS `rms_admin`;
CREATE TABLE IF NOT EXISTS `rms_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile_no` int(13) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rms_admin`
--

INSERT INTO `rms_admin` (`id`, `name`, `email`, `mobile_no`, `gender`, `address`, `password`) VALUES
(8, 'Mr. Admin', 'ADMIN@ADMIN', 1234567890, 'Female', 'jorhat', '123');

-- --------------------------------------------------------

--
-- Table structure for table `rms_discount`
--

DROP TABLE IF EXISTS `rms_discount`;
CREATE TABLE IF NOT EXISTS `rms_discount` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `percentage` float NOT NULL,
  `name` varchar(30) NOT NULL,
  `purchese amount` float NOT NULL,
  `manage by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `fk_admin_discount` (`manage by`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rms_discount`
--

INSERT INTO `rms_discount` (`id`, `percentage`, `name`, `purchese amount`, `manage by`) VALUES
(1, 5, 'NORMAL', 100, 8),
(2, 8, 'FAMILY', 100, 8),
(3, 0, 'N0 DISCOUNT', 0, 8),
(5, 10, 'SPACIAL', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `rms_has`
--

DROP TABLE IF EXISTS `rms_has`;
CREATE TABLE IF NOT EXISTS `rms_has` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `order_id` int(30) NOT NULL,
  `table_id` int(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_has_order` (`order_id`),
  KEY `FK_has_table` (`table_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rms_has`
--

INSERT INTO `rms_has` (`id`, `order_id`, `table_id`) VALUES
(1, 35, 4),
(2, 36, 4),
(3, 37, 4),
(4, 38, 4),
(5, 39, 4),
(6, 40, 2),
(7, 41, 2),
(8, 42, 2),
(9, 43, 2),
(10, 44, 2),
(11, 45, 2),
(12, 46, 2),
(13, 47, 2),
(14, 48, 2),
(15, 49, 2),
(16, 50, 4),
(17, 51, 4),
(18, 52, 2),
(19, 53, 2),
(20, 54, 2),
(21, 55, 4),
(22, 56, 4),
(23, 57, 4),
(24, 58, 4),
(25, 59, 4),
(26, 60, 4),
(27, 61, 4),
(28, 62, 4),
(29, 63, 4),
(30, 64, 4),
(31, 65, 4),
(32, 66, 4),
(33, 67, 4),
(34, 68, 4),
(35, 69, 4),
(36, 70, 4),
(37, 71, 4),
(38, 72, 4),
(39, 73, 4),
(40, 74, 4),
(41, 75, 4),
(42, 76, 4),
(43, 77, 2),
(44, 78, 2),
(45, 79, 4),
(46, 80, 4),
(47, 81, 2),
(48, 82, 4),
(49, 83, 2),
(50, 84, 4),
(51, 85, 4),
(52, 86, 4),
(53, 87, 4),
(54, 88, 4),
(55, 89, 4),
(56, 90, 2),
(57, 91, 2),
(58, 92, 2),
(59, 93, 4),
(60, 94, 4),
(61, 95, 4),
(62, 96, 4),
(63, 97, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rms_jobrole`
--

DROP TABLE IF EXISTS `rms_jobrole`;
CREATE TABLE IF NOT EXISTS `rms_jobrole` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `salary` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rms_jobrole`
--

INSERT INTO `rms_jobrole` (`id`, `name`, `salary`) VALUES
(1, 'CHEFF', 10000),
(2, 'MANAGER', 12000),
(3, 'CLEANER', 1200),
(4, 'TEST', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rms_order`
--

DROP TABLE IF EXISTS `rms_order`;
CREATE TABLE IF NOT EXISTS `rms_order` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `table_name` int(30) NOT NULL,
  `item` int(30) NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL,
  `order_date` date NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `manage_by` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_order_table` (`table_name`),
  KEY `FK_order_admin` (`manage_by`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rms_order`
--

INSERT INTO `rms_order` (`id`, `table_name`, `item`, `quantity`, `price`, `order_date`, `payment_status`, `manage_by`) VALUES
(16, 2, 16, 1, 12, '2006-07-22', 'PAID', 8),
(17, 2, 14, 1, 150, '2006-07-22', 'PAID', 8),
(18, 4, 16, 1, 12, '2006-07-22', 'PAID', 8),
(19, 4, 17, 1, 1, '2006-07-22', 'PAID', 8),
(20, 2, 4, 1, 200, '2006-07-22', 'PAID', 8),
(21, 2, 4, 1, 200, '2006-07-22', 'PAID', 8),
(22, 4, 16, 1, 12, '2006-07-22', 'PAID', 8),
(23, 4, 4, 1, 200, '2006-07-22', 'PAID', 8),
(24, 2, 14, 1, 150, '2006-07-22', 'PAID', 8),
(25, 4, 6, 1, 100, '2006-07-22', 'PAID', 8),
(26, 4, 16, 1, 12, '2006-07-22', 'PAID', 8),
(27, 4, 11, 1, 200, '2006-07-22', 'PAID', 8),
(28, 2, 4, 1, 200, '2006-07-22', 'PAID', 8),
(29, 2, 11, 1, 200, '2006-07-22', 'PAID', 8),
(30, 4, 16, 1, 12, '2006-07-22', 'PAID', 8),
(31, 4, 4, 1, 200, '2006-07-22', 'PAID', 8),
(32, 4, 14, 1, 150, '2006-07-22', 'PAID', 8),
(33, 4, 8, 1, 250, '2006-07-22', 'PAID', 8),
(34, 4, 7, 1, 70, '2006-07-22', 'PAID', 8),
(35, 4, 16, 1, 12, '2006-07-22', 'PAID', 8),
(36, 4, 4, 1, 200, '2006-07-22', 'PAID', 8),
(37, 4, 14, 1, 150, '2006-07-22', 'PAID', 8),
(38, 4, 9, 1, 270, '2006-07-22', 'PAID', 8),
(39, 4, 6, 1, 100, '2006-07-22', 'PAID', 8),
(40, 2, 16, 1, 12, '2006-07-22', 'PAID', 8),
(41, 2, 4, 1, 200, '2006-07-22', 'PAID', 8),
(42, 2, 14, 1, 150, '2006-07-22', 'PAID', 8),
(43, 2, 8, 1, 250, '2006-07-22', 'PAID', 8),
(44, 2, 7, 1, 70, '2006-07-22', 'PAID', 8),
(45, 2, 6, 1, 100, '2006-07-22', 'PAID', 8),
(46, 2, 16, 1, 12, '2006-07-22', 'PAID', 8),
(47, 2, 4, 1, 200, '2006-07-22', 'PAID', 8),
(48, 2, 6, 2, 200, '2006-07-22', 'PAID', 8),
(49, 2, 9, 1, 270, '2006-07-22', 'PAID', 8),
(50, 4, 16, 1, 12, '2007-07-22', 'PAID', 8),
(51, 4, 4, 1, 200, '2007-07-22', 'PAID', 8),
(52, 2, 14, 1, 150, '2007-07-22', 'PAID', 8),
(53, 2, 9, 1, 270, '2007-07-22', 'PAID', 8),
(54, 2, 9, 1, 270, '2007-07-22', 'PAID', 8),
(55, 4, 16, 1, 12, '2007-07-22', 'PAID', 8),
(56, 4, 14, 1, 150, '2007-07-22', 'PAID', 8),
(57, 4, 16, 1, 12, '2007-07-22', 'PAID', 8),
(58, 4, 14, 1, 150, '2007-07-22', 'PAID', 8),
(59, 4, 17, 1, 1, '2007-07-22', 'PAID', 8),
(60, 4, 14, 3, 450, '2007-07-22', 'PAID', 8),
(61, 4, 4, 1, 200, '2007-07-22', 'PAID', 8),
(62, 4, 11, 1, 200, '2007-07-22', 'PAID', 8),
(63, 4, 16, 1, 12, '2007-07-22', 'PAID', 8),
(64, 4, 14, 2, 300, '2007-07-22', 'PAID', 8),
(65, 4, 16, 1, 12, '2007-07-22', 'PAID', 8),
(66, 4, 11, 1, 200, '2007-07-22', 'PAID', 8),
(67, 4, 11, 1, 200, '2007-07-22', 'PAID', 8),
(68, 4, 14, 1, 150, '2007-07-22', 'PAID', 8),
(69, 4, 11, 1, 200, '2007-07-22', 'PAID', 8),
(70, 4, 17, 1, 1, '2007-07-22', 'PAID', 8),
(71, 4, 18, 1, 100, '2007-07-22', 'PAID', 8),
(72, 4, 16, 1, 12, '2022-07-08', 'PAID', 8),
(73, 4, 16, 1, 12, '2022-07-08', 'PAID', 8),
(74, 4, 16, 0.5, 6, '2022-07-08', 'PAID', 8),
(75, 4, 18, 1, 100, '2022-07-08', 'PAID', 8),
(76, 4, 19, 1, 1, '2022-07-08', 'PAID', 8),
(77, 2, 16, 1, 12, '2022-07-08', 'PAID', 8),
(78, 2, 9, 1, 270, '2022-07-08', 'PAID', 8),
(79, 4, 16, 1, 12, '2022-07-08', 'PAID', 8),
(80, 4, 14, 1, 150, '2022-07-08', 'PAID', 8),
(81, 2, 16, 1, 12, '2022-07-09', 'PAID', 8),
(82, 4, 4, 2, 400, '2022-07-09', 'PAID', 8),
(83, 2, 4, 2, 400, '2022-07-09', 'PAID', 8),
(84, 4, 4, 2, 400, '2022-07-09', 'PAID', 8),
(85, 4, 16, 1, 12, '2022-07-09', 'PAID', 8),
(86, 4, 16, 1, 12, '2022-07-09', 'PAID', 8),
(87, 4, 16, 1, 12, '2022-07-09', 'PAID', 8),
(88, 4, 16, 3, 36, '2022-07-09', 'PAID', 8),
(89, 4, 11, 3, 600, '2022-07-09', 'PAID', 8),
(90, 2, 11, 3, 600, '2022-07-09', 'PAID', 8),
(91, 2, 7, 5, 350, '2022-07-09', 'PAID', 8),
(92, 2, 6, 0.5, 50, '2022-07-09', 'PAID', 8),
(93, 4, 16, 1, 12, '2022-07-09', 'PAID', 8),
(94, 4, 11, 4, 800, '2022-07-09', 'PAID', 8),
(95, 4, 11, 3, 600, '2022-07-09', 'PAID', 8),
(96, 4, 16, 3, 36, '2022-07-09', 'PAID', 8),
(97, 4, 11, 3, 600, '2022-07-09', 'PAID', 8);

-- --------------------------------------------------------

--
-- Table structure for table `rms_tables`
--

DROP TABLE IF EXISTS `rms_tables`;
CREATE TABLE IF NOT EXISTS `rms_tables` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rms_tables`
--

INSERT INTO `rms_tables` (`id`, `name`) VALUES
(4, 'TABLE-ONE'),
(2, 'TABLE-TWO');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `mobile_no` int(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `job_role` int(30) NOT NULL,
  `salary` float NOT NULL,
  `manage_by` int(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_staff_admin` (`manage_by`),
  KEY `FK_staff_job_role` (`job_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `mobile_no`, `email`, `gender`, `address`, `job_role`, `salary`, `manage_by`) VALUES
(1, 'Q', 1234, 'q@q', 'Male', 'x', 2, 12000, 8),
(2, 'AA', 1234, 'aa@aa', 'Male', 'asdfg', 2, 12000, 8);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `FK_bill_table` FOREIGN KEY (`table_name`) REFERENCES `rms_tables` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `FK_Item_Cat` FOREIGN KEY (`item_catagory`) REFERENCES `item_catagory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item_catagory`
--
ALTER TABLE `item_catagory`
  ADD CONSTRAINT `FK_Cat_Admin` FOREIGN KEY (`manage_by`) REFERENCES `rms_admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rms_discount`
--
ALTER TABLE `rms_discount`
  ADD CONSTRAINT `fk_admin_discount` FOREIGN KEY (`manage by`) REFERENCES `rms_admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rms_has`
--
ALTER TABLE `rms_has`
  ADD CONSTRAINT `FK_has_order` FOREIGN KEY (`order_id`) REFERENCES `rms_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_has_table` FOREIGN KEY (`table_id`) REFERENCES `rms_tables` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rms_order`
--
ALTER TABLE `rms_order`
  ADD CONSTRAINT `FK_order_admin` FOREIGN KEY (`manage_by`) REFERENCES `rms_admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_order_table` FOREIGN KEY (`table_name`) REFERENCES `rms_tables` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `FK_staff_admin` FOREIGN KEY (`manage_by`) REFERENCES `rms_admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_staff_job_role` FOREIGN KEY (`job_role`) REFERENCES `rms_jobrole` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
