-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2025 at 03:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(65, 1, 'royal paytan ', 2000, 1, 'collection3.jpg'),
(66, 1, 'chhapal', 1800, 1, 'collection5.jpeg'),
(69, 3, 'Dark Elite Textured', 2000, 1, 'collection12.jpeg'),
(70, 3, 'Festival Glow Black', 1400, 1, 'collection9.jpeg'),
(71, 3, 'Classic Handmade Brown', 1200, 1, 'collection2.jpeg'),
(72, 1, 'Classic Handmade Brown', 1200, 1, 'collection2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(10, 1, 'prathamesh', 'prathameshlavhate02@gmail.com', '8999054381', 'thank');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(10, 1, 'prathamesh', '8999054381', 'prathameshlavhate02@gmail.com', 'cash on delivery', 'flat no. 1008, kotoli, kolhapur, india - 416230', ', apple (1) ', 200, '27-Jul-2025', 'completed'),
(11, 3, 'Vivek lavhate', '9356467029', 'viveklavhate10@gmail.com', 'cash on delivery', 'flat no. 1007, kotoli, kolhapur, India - 416230', ', Classic Handmade Brown (1) , Dark Heritage Tickle (1) ', 2500, '29-Jul-2025', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `discount_percent` int(11) DEFAULT 0,
  `is_popular` tinyint(1) DEFAULT 0,
  `is_bestseller` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `discount_percent`, `is_popular`, `is_bestseller`) VALUES
(9, 'Classic Handmade Brown', 1200, 'collection2.jpeg', 0, 0, 0),
(10, 'Urban Slim Black', 1500, 'collection3.jpg', 0, 0, 0),
(11, 'Dark Heritage Tickle', 1300, 'collection5.jpeg', 0, 0, 0),
(12, 'Kingly Turban Style', 1800, 'collection6.jpeg', 0, 0, 0),
(13, 'Classic Carved Rust', 1750, 'collection7.jpg', 0, 0, 0),
(14, 'Mustard Handheld Premium', 1350, 'collection8.jpg', 0, 0, 0),
(15, 'Festival Glow Black', 1400, 'collection9.jpeg', 0, 0, 0),
(16, 'Rani Pink Bridal', 1200, 'collection10.jpeg', 0, 0, 0),
(17, 'Rustic Duo Braided', 1750, 'collection11.jpeg', 0, 0, 0),
(18, 'Dark Elite Textured', 2000, 'collection12.jpeg', 0, 0, 0),
(20, 'Pointed Toe Designer', 1550, 'collection15.png', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'prathamesh', 'prathameshlavhate02@gmail.com', '7e16036a55664f22e6511e460ee09d4f', 'user'),
(2, 'prathamesh', 'prathameshlavhate@gmail.com', '155d328d7db586cf215aca5e8088dfed', 'admin'),
(3, 'Vivek lavhate', 'viveklavhate10@gmail.com', 'cd3afef9b8b89558cd56638c3631868a', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
