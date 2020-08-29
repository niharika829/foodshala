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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(50) NOT NULL,
  `menuid` int(50) NOT NULL,
  `userid` int(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` int(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `menuid`, `userid`, `useremail`, `name`, `img`, `price`, `category`, `time`) VALUES
(36, 21, 3, 'ema@gmail.com', 'Pina Colada Pork Ribs', 'Pina Colada.jpg', 115, 'nonveg', '2020-08-29 16:49:44'),
(37, 22, 3, 'ema@gmail.com', 'Tandoori Lamb Chops', 'Tandoori.jpg', 125, 'nonveg', '2020-08-29 16:49:47'),
(39, 16, 4, 'serra@gmail.com', 'Makhni Paneer Biryani', 'Makhni Paneer Biryani.jpg', 58, 'veg', '2020-08-29 16:51:19'),
(40, 18, 4, 'serra@gmail.com', 'Dal Makhani', 'Dal Makhani.jpg', 64, 'veg', '2020-08-29 16:51:23'),
(41, 19, 4, 'serra@gmail.com', 'Vegetarian Khow Suey', 'Vegetarian Khow Suey.jpg', 67, 'veg', '2020-08-29 16:51:27'),
(42, 21, 5, 'john@gmail.com', 'Pina Colada Pork Ribs', 'Pina Colada.jpg', 115, 'nonveg', '2020-08-29 16:53:14'),
(43, 18, 5, 'john@gmail.com', 'Dal Makhani', 'Dal Makhani.jpg', 64, 'veg', '2020-08-29 16:53:17'),
(44, 20, 5, 'john@gmail.com', ' Grilled Chicken', 'Grilled Chicken.jpg', 102, 'nonveg', '2020-08-29 16:53:20'),
(45, 16, 5, 'john@gmail.com', 'Makhni Paneer Biryani', 'Makhni Paneer Biryani.jpg', 58, 'veg', '2020-08-29 16:53:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
