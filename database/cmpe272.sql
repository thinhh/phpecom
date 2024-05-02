-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 05:58 AM
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
-- Database: `cmpe272`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(14, 4, 5, 2, '2024-04-11 22:52:23'),
(27, 7, 6, 2, '2024-04-26 04:53:46'),
(28, 7, 3, 2, '2024-04-26 19:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `create_at`) VALUES
(1, 'Adidas', 'Adidas', 'All types of Adidas', 1, 1, '1712531526.jpg', 'Adidas', 'All types of Adidas', 'Adidas, Clothing, Footwear', '2024-04-03 22:20:34'),
(3, 'Nike', 'Nike', 'All types of Nike', 1, 1, '1712530625.png', 'Nike ', 'All types of Nike', 'Nike, Clothing, Footwear', '2024-04-03 23:44:48'),
(11, 'Lenovo', 'Lenovo', 'All types of Item from Lenovo', 1, 1, '1712425719.jpg', 'Lenovo', 'All item of Lenovo', 'Lenovo, Electronic, Laptops', '2024-04-06 17:48:39'),
(12, 'Apple', 'Apple', 'All type of Apple Products', 1, 1, '1712436146.jpg', 'Apple', 'All type of Apple', 'Apple, Electronic', '2024-04-06 17:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(2, 'GoCommerce929111111', 7, 'user1name', 'user1@mail.com', '1111111', 'user1address', 1234, 3096, 'COD', ' ', 0, NULL, '2024-04-13 00:02:39'),
(3, 'GoCommerce12193456789', 3, 'user2name', 'user2@yahoo.com', '123456789', 'user2address', 1144, 2335, 'COD', ' ', 0, NULL, '2024-04-13 00:04:48'),
(4, 'GoCommerce76683456789', 7, 'user1', 'user1@mail.com', '123456789', 'user1.address', 1111, 3495, 'COD', ' ', 0, NULL, '2024-04-13 05:19:22'),
(5, 'GoCommerce62071111', 7, 'user1', 'user@1email.com', '111111', 'user1newaddress', 12374, 198, 'COD', ' ', 0, NULL, '2024-04-15 18:48:34'),
(6, 'GoCommerce2899111', 7, 'user1', 'user1@mail.com', '11111', 'user1address', 14789, 900, 'COD', ' ', 0, NULL, '2024-04-15 19:01:14'),
(8, 'GoCommerce4595sa', 8, 'aaa', 'aasa@mail', 'aasa', 'aaaaa', 0, 699, 'COD', ' ', 0, NULL, '2024-04-15 19:21:06'),
(9, 'GoCommerce18311111', 8, 'bbbb', 'bbb@mail.com', '111111', 'bbbbb', 1111, 75, 'Paid By Paypal', '6U498428RV202043P', 0, NULL, '2024-04-15 19:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`) VALUES
(3, 2, 3, 4, 699, '2024-04-13 00:02:39'),
(4, 2, 8, 1, 300, '2024-04-13 00:02:39'),
(5, 3, 5, 2, 99, '2024-04-13 00:04:48'),
(6, 3, 3, 3, 699, '2024-04-13 00:04:48'),
(7, 3, 6, 2, 20, '2024-04-13 00:04:48'),
(8, 4, 3, 5, 699, '2024-04-13 05:19:22'),
(9, 5, 5, 2, 99, '2024-04-15 18:48:34'),
(10, 6, 8, 3, 300, '2024-04-15 19:01:14'),
(11, 7, 6, 3, 20, '2024-04-15 19:08:46'),
(12, 7, 8, 2, 300, '2024-04-15 19:08:46'),
(13, 7, 2, 3, 25, '2024-04-15 19:08:46'),
(14, 8, 3, 1, 699, '2024-04-15 19:21:06'),
(15, 9, 2, 3, 25, '2024-04-15 19:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `hits` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `hits`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(2, 3, 'Nike T-shirt', 'Nike T-shirt', 'Description of Nike Tshirt', 'This is Nike Tshirt Description', 50, 25, '1712437405.png', 14, 31, 1, 1, 'Nike', 'Nike, Tshirt, Clothing,  ', 'Nike Tshirt', '2024-04-06 21:03:25'),
(3, 11, 'Lenovo Thinkpad', 'Lenovo Thinkpad', 'Description of Lenovo Laptop Thinkpad', 'This is Lenovo Laptop Thinkpad Description', 999, 699, '1712437595.jpeg', 14, 31, 1, 1, 'Lenovo', 'Lenovo, Laptop, Electronic', 'lenovo', '2024-04-06 21:06:35'),
(4, 12, 'Iphone X', 'IphoneX', 'Description of Iphone X ', 'This is Iphone X Description', 999, 699, '1712437920.jpg', 20, 18, 1, 1, 'Apple', 'Iphone, Apple, Electronic', 'Iphone X ', '2024-04-06 21:12:00'),
(5, 12, 'Apple Airpod ', 'Apple Airpod', 'Description of Apple Airpod', 'This is Apple Airpod Description', 200, 99, '1712443945.jpeg', 18, 20, 1, 1, 'Apple', 'apple, electronic, airpod', 'apple airpod', '2024-04-06 21:43:12'),
(6, 1, 'Adidas Shoes', 'Adidas Shoes', 'Description Adidas Shoes', 'This is Adidas Shoes Description ', 50, 20, '1712536106.png', 17, 8, 1, 1, 'Adidas', 'adidas, shoes, footwear', 'adidas Shoes', '2024-04-08 00:26:20'),
(7, 1, 'Adidas Tshirt', 'Adidas Tshirt', 'Description of Tshirt By Adidas', 'This is Tshirt By Adidas Description', 50, 20, '1712536270.jpeg', 20, 8, 1, 0, 'Adidas', 'Adidas Tshirt', 'Adidas Tshirt', '2024-04-08 00:31:10'),
(8, 12, 'Apple Prod 1', 'Apple Prod 1', 'Description of Apple Prod 1', 'This is the description of Apple Prod 1', 999, 300, '1712870744.jpg', 15, 28, 1, 1, 'Apple Prod 1', 'Apple, Prod1', 'Description of Apple Prod 1', '2024-04-11 21:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_review` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `prod_id`, `user_name`, `user_review`, `created_at`) VALUES
(4, 3, 'user1', 'Ok laptop for good price', '2024-04-26 19:12:21'),
(5, 3, 'user2', 'Ok price', '2024-04-26 19:12:49'),
(6, 3, 'user3', 'Ok price', '2024-04-26 19:13:18'),
(7, 3, 'user4', 'user4 review on lenovo laptop', '2024-04-26 19:13:38'),
(8, 2, 'user2', 'nice tshirt, very comfy', '2024-04-26 19:27:06'),
(9, 4, 'user11', 'iphone is very good', '2024-04-26 19:32:47'),
(10, 4, 'user1', 'Massive discount', '2024-04-26 19:33:14'),
(11, 6, 'thinh', 'good running shoes for good price', '2024-04-26 19:52:53'),
(12, 8, 'user1', 'good apple prod 1', '2024-04-30 23:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `home_address` varchar(250) NOT NULL,
  `home_phone` varchar(100) NOT NULL,
  `cell_phone` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_as` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `home_address`, `home_phone`, `cell_phone`, `email`, `password`, `created_at`, `role_as`) VALUES
(3, 'user2', '2', 'someaddress', '2222222', '2222222', 'user2@yahoo.com', '123456', '2024-04-03 01:00:58', 0),
(4, 'admin1', 'admin1', 'admin1', 'admin1', 'admin1', 'admin1@email.com', '123456', '2024-04-03 04:06:09', 1),
(7, 'user1', '1', 'user1address', '123456', '123456', 'user1@mail.com', '123456', '2024-04-06 17:36:57', 0),
(8, 'user3', '3', 'user3address', '12345678911', '12345678911', 'user3@mail.com', '123456789', '2024-04-14 22:35:15', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
