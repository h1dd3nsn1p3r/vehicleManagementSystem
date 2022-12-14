-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2022 at 11:44 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toyota`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `branch_id` int NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(250) NOT NULL,
  `branch_phone` bigint NOT NULL,
  `branch_email` varchar(250) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`, `branch_phone`, `branch_email`) VALUES
(1, 'Koteshowr', 9860746850, 'kot@toyota.com.np'),
(2, 'Teku', 9860746450, 'teku@toyota.com.np'),
(3, 'Ratnapark', 9860756870, 'ratnapark@toyota.com.np'),
(4, 'Butwal', 9860566850, 'butwal@toyota.com.np'),
(5, 'Biratnagar', 9880746850, 'brt@toyota.com.np'),
(7, 'Dharan', 9860753878, 'dharan@toyota.com.np'),
(8, 'Dhangadi', 9860753870, 'dhangadi@toyota.com.np');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `color_id` int NOT NULL AUTO_INCREMENT,
  `color_name` varchar(100) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color_name`) VALUES
(1, 'Red'),
(2, 'White'),
(3, 'Black'),
(4, 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

DROP TABLE IF EXISTS `customer_details`;
CREATE TABLE IF NOT EXISTS `customer_details` (
  `cust_id` int NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(250) NOT NULL,
  `cust_email` varchar(250) NOT NULL,
  `cust_phone` bigint NOT NULL,
  `cust_address` varchar(500) NOT NULL,
  `vechile_id` int NOT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `branch_id` int NOT NULL,
  PRIMARY KEY (`cust_id`),
  KEY `vehicle_id` (`vechile_id`),
  KEY `branch_id` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`cust_id`, `cust_name`, `cust_email`, `cust_phone`, `cust_address`, `vechile_id`, `purchase_date`, `branch_id`) VALUES
(7, 'Ivan Subedi', 'ivaan@subedi.com', 9870564790, 'Balkot, Bhaktapur', 3, '2022-01-02', 1),
(8, 'Shyam Thapa', 'shyam@domain.com', 9880564790, 'Biratnagar', 8, '2022-09-04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

DROP TABLE IF EXISTS `employee_details`;
CREATE TABLE IF NOT EXISTS `employee_details` (
  `emp_id` int NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(250) NOT NULL,
  `emp_address` varchar(250) NOT NULL,
  `emp_email` varchar(250) NOT NULL,
  `emp_join_date` date NOT NULL,
  `emp_phone` bigint NOT NULL,
  `emp_salary` float(10,2) NOT NULL,
  `emp_branch` int NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`) VALUES
(1, 'anujsubedi', '5f4dcc3b5aa765d61d8327deb882cf99', 'Anuj Subedi');

-- --------------------------------------------------------

--
-- Table structure for table `vechile_details`
--

DROP TABLE IF EXISTS `vechile_details`;
CREATE TABLE IF NOT EXISTS `vechile_details` (
  `vec_id` int NOT NULL AUTO_INCREMENT,
  `vec_name` varchar(250) NOT NULL,
  `vec_price` float(10,2) NOT NULL,
  `vec_model` varchar(250) NOT NULL,
  `vec_mfd_date` varchar(250) NOT NULL,
  `vec_color_id` int NOT NULL,
  `vec_branch_id` int NOT NULL,
  PRIMARY KEY (`vec_id`),
  KEY `vec_color_id` (`vec_color_id`),
  KEY `vec_branch_id` (`vec_branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vechile_details`
--

INSERT INTO `vechile_details` (`vec_id`, `vec_name`, `vec_price`, `vec_model`, `vec_mfd_date`, `vec_color_id`, `vec_branch_id`) VALUES
(3, 'Fortuner', 67000.00, 'FOST6', '2018-01-16', 2, 2),
(4, 'Avalon', 13000.00, 'EVY67', '2017-09-12', 1, 1),
(5, 'Corolla', 57899.00, 'TKIS07', '2022-07-05', 1, 1),
(7, 'Foxo', 45000.00, 'HTS89', '2022-03-14', 1, 1),
(8, 'Yaris', 5600.00, 'RT99', '2022-01-01', 1, 1),
(10, 'Lester 1956 Sports Edition', 560000.00, 'SPO7', '2022-12-12', 1, 1),
(14, 'Sienna', 44000.00, 'SIN9', '1994-01-02', 3, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD CONSTRAINT `branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `vehicle_id` FOREIGN KEY (`vechile_id`) REFERENCES `vechile_details` (`vec_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `vechile_details`
--
ALTER TABLE `vechile_details`
  ADD CONSTRAINT `vec_branch_id` FOREIGN KEY (`vec_branch_id`) REFERENCES `branches` (`branch_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `vec_color_id` FOREIGN KEY (`vec_color_id`) REFERENCES `colors` (`color_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
