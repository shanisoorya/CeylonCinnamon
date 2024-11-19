-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 12:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shani`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `image`) VALUES
(1, 'iio', '0.00', 'A7I2783.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_qty` varchar(11) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_qty`, `product_image`) VALUES
(31, 'Ceylone Cinnamon Oill', '1000', '2', 'mn1.jpg'),
(32, 'Ceylone Cinnamon Leaves', '500', '1', 'mn2.jpg'),
(37, 'Ceylone Cinnamon Stick', '45', '45', 'antique-cafe-bg-01.jpg'),
(38, 'Ceylone Cinnamon Soap', '1500', '20', 'A7I2783.jpg'),
(41, 'Ceylone Cinnamon Powder', '500', '45', 'antique-cafe-bg-0kl.png'),
(42, 'Ceylone Cinnamon Spray', '500', '2', 'CinnamonSpiceRoomSpray4_2400x.jpg'),
(43, 'Ceylone Cinnamon Oill', '500', '4', 'benefits-of-cinnamon-and-honey.jpg'),
(44, 'bark oil', '3240', '100', 'mn1.jpg'),
(45, 'oil2', '50', '10', 'e3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `name`, `email`, `message`) VALUES
(1, 'praveen', 'praveenmaleeesha@gmail.com', 'asaida?'),
(2, 'shanika', 'shanikahansi02@gmail.com', 'mama ohomada order eka daganne ?'),
(3, 'nikinui', 'niki@gmail.com', 'asaida godak?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'shani hansi', 'shanikahansi02@gmail.com', 'eff7d5dba32b4da32d9a67a519434d3f', 'user'),
(2, 'er', 'shanikahansi02@gmail.com', '3d4044d65abdda407a92991f1300ec97', 'admin'),
(3, 'kalani', 'kala02@gmail.com', '16ec114932520d2b9c18a28121d515af', 'admin'),
(4, 'chami', 'shanikahansi02@gmail.com', '6226f7cbe59e99a90b5cef6f94f966fd', 'user'),
(5, 'shanika', 'shani@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(6, 'shani hansi', 'shanikahansi02@gmail.com', '1f28e49f34e2406fdb6d6158eebd793b', 'user'),
(7, 'sandu', 'shanikahansi02@gmail.com', 'd0fa06cd93335c8cae357ffe5cd1c4e9', 'user'),
(8, 'xc', 'shanikahansi02@gmail.com', '831c4baa8a44083a6434b892d573846b', 'user'),
(9, 'bawa', 'shanikahansi02@gmail.com', 'f970e2767d0cfe75876ea857f92e319b', 'user'),
(10, 'sanduni', 'shani@gmail.com', '6226f7cbe59e99a90b5cef6f94f966fd', 'admin'),
(11, 'mama', 'mama@gmail.com', 'a086c6d1f2f9f620f7e0faa2f0a14762', 'admin'),
(12, 'shani hansi', 'shanikahansi02@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(13, 'shani', 'shanihani02@gmail.com', '6c8349cc7260ae62e3b1396831a8398f', 'admin'),
(14, 'shani', 'shanihani02@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'admin'),
(15, 'nish', 'ni@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(16, 'shani', 'shanihani02@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
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
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
