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
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` int(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `img`, `price`, `category`, `time`) VALUES
(16, 'Makhni Paneer Biryani', 'Makhni Paneer Biryani.jpg', 58, 'veg', '2020-08-29 16:37:47'),
(17, 'Masala Bhindi', 'Bhindi-Masala.jpg', 25, 'veg', '2020-08-29 16:39:52'),
(18, 'Dal Makhani', 'Dal Makhani.jpg', 64, 'veg', '2020-08-29 16:40:32'),
(19, 'Vegetarian Khow Suey', 'Vegetarian Khow Suey.jpg', 67, 'veg', '2020-08-29 16:41:59'),
(20, ' Grilled Chicken', 'Grilled Chicken.jpg', 102, 'nonveg', '2020-08-29 16:43:51'),
(21, 'Pina Colada Pork Ribs', 'Pina Colada.jpg', 115, 'nonveg', '2020-08-29 16:44:57'),
(22, 'Tandoori Lamb Chops', 'Tandoori.jpg', 125, 'nonveg', '2020-08-29 16:46:07'),
(23, 'Curried Parmesan Fish Fingers', 'Curried.jpg', 145, 'nonveg', '2020-08-29 16:47:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
