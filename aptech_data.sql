-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2025 at 02:30 PM
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
(1, 'Kids', 'girldress.jpg'),
(2, 'Women', 'Womens.jpg'),
(3, 'Men', 'menshirt.jpg'),
(4, 'Watches', 'watch.jpg'),
(5, 'Hand Bags', 'handbagwomen.jpg');

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
(1, 'Watch', 'Water-proof and best quality', 2, 4000, 4, 'watch.jpg'),
(2, 'Hand Bags', 'A stylish and practical items', 5, 6000, 5, 'handbags.jpg'),
(3, 'Kids Wear', 'Casual wear to special ocassion', 10, 2500, 1, 'kidswear.jpg'),
(4, 'Coat-pant ', 'Elegand  Bold and Modern look', 3, 5000, 2, 'Womens.jpg'),
(5, 'Mens-Shirts', 'Classic black & grey check shirt ', 6, 1500, 3, 'menshirt.jpg'),
(6, 'Black & White Dress', 'Elegant black and white party dress for girls with', 10, 3000, 1, 'girldress.jpg'),
(7, 'Pastel Mint Floral D', 'Pastel Mint Floral Embroidered Baby Dress', 15, 2540, 1, 'floraldress.jpg'),
(8, 'Boys’ Casual Wear', 'Trendy boys’ outfit combo casual set ', 10, 4550, 1, 'boys.jpg'),
(9, 'Boho Knitwear Set', 'Boho chic and top set maxi skirt', 10, 1500, 2, 'boho.jpg'),
(10, 'Chic Striped Midi Dr', 'Elegant sleeveless striped midi dress ', 15, 5000, 2, 'dresses-data.jpg'),
(11, 'Black Dress', 'Elegant black dress with comfort and wear anywhere', 15, 6500, 2, 'blackdress.jpg'),
(12, 'Classic Black Formal', 'Stylish black slim-fit mens coat for formal wear', 20, 5000, 3, 'Menscoat.jpg'),
(13, 'Dark Grey T-Shirt', 'Soft, stylish dark grey t-shirt for casual comfort', 4, 650, 3, 't-shirt.jpg'),
(14, 'Plain Round Neck T-S', 'Pack of 5 plain cotton t-shirts for everyday comfo', 5, 850, 3, 'plain-t-shirt.jpg'),
(15, 'Stainless Steel Watc', 'Luxurious with durable and stylish design', 1, 1500, 4, 'watch3.jpg'),
(16, 'Black Strap Watch', 'Mesh strap watch for a modern, classy style', 2, 2800, 4, 'watch4.jpg'),
(17, 'Luxurious Sports Wat', 'Sports watch black & rose gold for a premium look', 50, 4500, 4, 'watch5.jpg'),
(19, 'Pastel Blue Mini Bag', 'Compact and stylish pastel blue handbag', 30, 2200, 5, 'Hbags.jpg'),
(20, 'Red Chain Sling Bag', 'Trendy red sling bag with a gold chain ', 25, 2000, 5, 'Handcarrybag.jpg'),
(21, 'Elegant White Bag', 'Elegant white handbag with gold details', 20, 3000, 5, 'purse.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`cart_id`, `user_id`, `product_id`, `product_price`, `product_qty`) VALUES
(1, 2, 20, 2000, 5),
(2, 2, 17, 4500, 10),
(3, 3, 15, 1500, 6),
(4, 3, 14, 850, 4),
(5, 2, 19, 2200, 5),
(6, 2, 2, 6000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `registration_form`
--

CREATE TABLE `registration_form` (
  `Id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Status` varchar(20) DEFAULT 'unverified',
  `Role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration_form`
--

INSERT INTO `registration_form` (`Id`, `Name`, `Email`, `Password`, `Status`, `Role`) VALUES
(2, 'Zubaida', 'zubaida@gmail.com', '8905', 'verified', 'user'),
(3, 'Zain', 'zain@gmail.com', '7426', 'verified', 'user'),
(4, 'Eesha', 'eesha@gmail.com', '9876', 'unverified', 'user'),
(5, 'laiba', 'laiba@gmail.com', '8756724', 'unverified', 'user'),
(6, 'Ali', 'ali@gmail.com', '4862658', 'unverified', 'user'),
(7, 'Hassan', 'hassan@gmail.com', '47565', 'unverified', 'user'),
(9, 'Ayesha', 'ayesha@gmail.com', '12345', 'unverified', 'user'),
(10, 'Maya', 'maya@gmail.com', '1234', 'verified', 'admin'),
(11, 'Zainab', 'zainab@gmail.com', '120', 'verified', 'admin');

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
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_category`
--
ALTER TABLE `add_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registration_form`
--
ALTER TABLE `registration_form`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  ADD CONSTRAINT `add_to_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration_form` (`Id`),
  ADD CONSTRAINT `add_to_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `add_product` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
