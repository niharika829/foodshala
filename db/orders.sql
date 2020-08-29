-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2020 at 07:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(6) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `tel` int(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `entry_date` date NOT NULL,
  `entry_time` time NOT NULL,
  `cardholder` text NOT NULL,
  `cardnumber` varchar(50) NOT NULL,
  `userorder` varchar(70) NOT NULL,
  `amount` int(50) NOT NULL,
  `orderid` int(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `tel`, `address`, `entry_date`, `entry_time`, `cardholder`, `cardnumber`, `userorder`, `amount`, `orderid`, `action`, `time`) VALUES
(3, 'ema@gmail.com', 1234567890, 'uk', '2020-08-29', '03:25:00', 'ema', '1234-1234-1223-1234', 'Pina Colada Pork Ribs , Tandoori Lamb Chops , ', 240, 5318, 'confirmed', '2020-08-29 16:55:39'),
(4, 'serra@gmail.com', 2147483647, 'auckland', '2020-09-17', '03:27:00', 'serra', '1111-2222-3333-4444', 'Makhni Paneer Biryani , Dal Makhani , Vegetarian Khow Suey , ', 189, 7248, 'wait for the response', '2020-08-29 16:52:43'),
(5, 'john@gmail.com', 2147483647, 'LA', '2020-09-01', '02:27:00', 'john', '2345-4563-2341-7689', 'Pina Colada Pork Ribs , Dal Makhani ,  Grilled Chicken , Makhni Paneer', 339, 6199, 'cancelled', '2020-08-29 16:56:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
