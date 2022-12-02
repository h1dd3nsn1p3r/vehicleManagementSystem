-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2022 at 03:58 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `color_id` int NOT NULL AUTO_INCREMENT,
  `color_name` varchar(100) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `purchase_date` timestamp NOT NULL,
  `branch_id` int NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `song`
--

DROP TABLE IF EXISTS `song`;
CREATE TABLE IF NOT EXISTS `song` (
  `id` int NOT NULL AUTO_INCREMENT,
  `artist` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `track` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `artist`, `track`, `link`) VALUES
(2, 'Jessy Lanza', 'Kathy Lee', 'http://vimeo.com/73455369'),
(3, 'The Orwells', 'In my Bed (live)', 'http://www.youtube.com/watch?v=8tA_2qCGnmE'),
(4, 'L\'Orange & Stik Figa', 'Smoke Rings', 'https://www.youtube.com/watch?v=Q5teohMyGEY'),
(5, 'Labyrinth Ear', 'Navy Light', 'http://www.youtube.com/watch?v=a9qKkG7NDu0'),
(6, 'Bon Hiver', 'Wolves (Kill them with Colour Remix)', 'http://www.youtube.com/watch?v=5GXAL5mzmyw'),
(7, 'Detachments', 'Circles (Martyn Remix)', 'http://www.youtube.com/watch?v=UzS7Gvn7jJ0'),
(8, 'Dillon & Dirk von Loetzow', 'Tip Tapping (Live at ZDF Aufnahmezustand)', 'https://www.youtube.com/watch?v=hbrOLsgu000'),
(9, 'Dillon', 'Contact Us (Live at ZDF Aufnahmezustand)', 'https://www.youtube.com/watch?v=E6WqTL2Up3Y'),
(10, 'Tricky', 'Hey Love (Promo Edit)', 'http://www.youtube.com/watch?v=OIsCGdW49OQ'),
(11, 'Compuphonic', 'Sunset feat. Marques Toliver (DJ T. Remix)', 'http://www.youtube.com/watch?v=Ue5ZWSK9r00'),
(12, 'Ludovico Einaudi', 'Divenire (live @ Royal Albert Hall London)', 'http://www.youtube.com/watch?v=X1DRDcGlSsE'),
(13, 'Maxxi Soundsystem', 'Regrets we have no use for (Radio1 Rip)', 'https://soundcloud.com/maxxisoundsystem/maxxi-soundsystem-ft-name-one'),
(14, 'Beirut', 'Nantes (Fredo & Thang Remix)', 'https://www.youtube.com/watch?v=ojV3oMAgGgU'),
(15, 'Buku', 'All Deez', 'http://www.youtube.com/watch?v=R0bN9JRIqig'),
(16, 'Pilocka Krach', 'Wild Pete', 'http://www.youtube.com/watch?v=4wChP_BEJ4s'),
(17, 'Mount Kimbie', 'Here to stray (live at Pitchfork Music Festival Paris)', 'http://www.youtube.com/watch?v=jecgI-zEgIg'),
(18, 'Kool Savas', 'King of Rap (2012) / Ein Wunder', 'http://www.youtube.com/watch?v=mTqc6UTG1eY&hd=1'),
(19, 'Chaim feat. Meital De Razon', 'Love Rehab (Original Mix)', 'http://www.youtube.com/watch?v=MJT1BbNFiGs'),
(20, 'Emika', 'Searching', 'http://www.youtube.com/watch?v=oscuSiHfbwo'),
(21, 'Emika', 'Sing to me', 'http://www.youtube.com/watch?v=k9sDBZm8pgk'),
(22, 'George Fitzgerald', 'Thinking of You', 'http://www.youtube.com/watch?v=-14B8l49iKA'),
(23, 'Disclosure', 'You & Me (Flume Edit)', 'http://www.youtube.com/watch?v=OUkkaqSNduU'),
(24, 'Crystal Castles', 'Doe Deer', 'http://www.youtube.com/watch?v=zop0sWrKJnQ'),
(25, 'Tok Tok vs. Soffy O.', 'Missy Queens Gonna Die', 'http://www.youtube.com/watch?v=EN0Tnw5zy6w'),
(26, 'Fink', 'Maker (Synapson Remix)', 'http://www.youtube.com/watch?v=Dyd-cUkj4Nk'),
(27, 'Flight Facilities (ft. Christine Hoberg)', 'Clair De Lune', 'http://www.youtube.com/watch?v=Jcu1AHaTchM'),
(28, 'Karmon', 'Turning Point (Original Mix)', 'https://www.youtube.com/watch?v=-tB-zyLSPEo'),
(29, 'Shuttle Life', 'The Birds', 'http://www.youtube.com/watch?v=-I3m3cWDEtM');

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
  `vec_mfd_date` date NOT NULL,
  `vec_color_id` int NOT NULL,
  `vec_branch_id` int NOT NULL,
  PRIMARY KEY (`vec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vechile_details`
--

INSERT INTO `vechile_details` (`vec_id`, `vec_name`, `vec_price`, `vec_model`, `vec_mfd_date`, `vec_color_id`, `vec_branch_id`) VALUES
(3, 'Fortuner', 1000.00, 'FOS56', '2022-12-15', 1, 1),
(4, 'Kia', 13000.00, 'EVY67', '2022-12-15', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
