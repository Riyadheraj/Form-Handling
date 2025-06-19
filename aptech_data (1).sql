-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2025 at 08:02 AM
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
-- Database: `aptech_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_category`
--

CREATE TABLE `add_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) DEFAULT NULL,
  `cat_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_category`
--

INSERT INTO `add_category` (`cat_id`, `cat_name`, `cat_image`) VALUES
(3, 'Women', 'blog-03.jpg'),
(4, 'watches', 'banner-07.jpg'),
(6, 'bags', 'images.jpg'),
(7, 'Men', 'images (1).jpg'),
(8, 'Kids', 'Catlog-Boys-kids-wear.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(20) DEFAULT NULL,
  `p_description` varchar(50) DEFAULT NULL,
  `p_qty` int(11) DEFAULT NULL,
  `p_price` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `p_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`p_id`, `p_name`, `p_description`, `p_qty`, `p_price`, `cat_id`, `p_image`) VALUES
(1, 'watch', 'best quality product', 1, 10000, 4, 'watch.jpg'),
(2, 'bag', 'women hand bag', 2, 5000, 3, 'images.jpg'),
(3, 'women shopping bag', 'bestquality product', 2, 5000, 6, 'content-pixie-ZB4eQcNqVUs-unsplash.jpg'),
(4, 'women shopping bag', 'bestquality product', 3, 10000, 3, 'ali-ahmadi-rihy34eSbvw-unsplash.jpg'),
(5, 't-shirt', 'bestquality product', 5, 20000, 7, 'mediamodifier-mPBz-O58ZPw-unsplash.jpg'),
(6, 'shirts', 'formal dress', 3, 20000, 7, 'l-s-R0LzhF574gU-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `Product_price` int(11) DEFAULT NULL,
  `Product_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`cart_id`, `user_id`, `product_id`, `Product_price`, `Product_qty`) VALUES
(1, 2, 5, 20000, 3),
(2, 2, 3, 5000, 4),
(3, 2, 4, 10000, 1),
(4, 2, 2, 5000, 3),
(5, 6, 4, 10000, 3),
(6, 6, 1, 10000, 3),
(7, 6, 1, 10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration_form`
--

CREATE TABLE `registration_form` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'unverified',
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration_form`
--

INSERT INTO `registration_form` (`id`, `Name`, `Email`, `Password`, `status`, `role`) VALUES
(2, 'areeb', 'areeb@gmail.com', '1235', 'verified', 'user'),
(3, 'hanzala', 'hanzala@gmail.com', '7865876', 'verified', 'user'),
(4, 'faiza', 'faiza@gmail.com', '1324567', 'unverified', 'user'),
(6, 'haya', 'haya@gmail.com', '334', 'verified', 'user'),
(7, 'abc', 'abc@gmail.com', '676-079', 'unverified', 'user'),
(8, 'huda', 'huda@gmail.com', '674567354', 'unverified', 'user'),
(11, 'uzair', 'uzair@gmail.com', '54657', 'unverified', 'user'),
(12, 'anas', 'anas@gmail.com', '1234', 'unverified', 'user'),
(13, 'anis', 'anis@gmail.com', '123456', 'unverified', 'user'),
(14, 'rayyan', 'rayyan@gmail.com', '1268', 'unverified', 'user'),
(15, 'hasan', 'hasan@gmail.com', '2424', 'unverified', 'user'),
(16, 'saira', 'saira@gmail.com', '123', 'verified', 'admin'),
(17, 'ayesha', 'ayesha@gmail.com', '12345', 'verified', 'admin'),
(18, 'fasahat', 'fasahat@gmail.com', '234', 'verified', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_category`
--
ALTER TABLE `add_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `registration_form`
--
ALTER TABLE `registration_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_category`
--
ALTER TABLE `add_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registration_form`
--
ALTER TABLE `registration_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_product`
--
ALTER TABLE `add_product`
  ADD CONSTRAINT `add_product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `add_category` (`cat_id`);

--
-- Constraints for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD CONSTRAINT `add_to_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration_form` (`id`),
  ADD CONSTRAINT `add_to_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `add_product` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
