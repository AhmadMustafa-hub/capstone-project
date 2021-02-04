-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 03:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emall`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_fullname` varchar(50) NOT NULL,
  `admin_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_fullname`, `admin_image`) VALUES
(1, 'ahmad@gmail.com', '123456789', 'Ahmad Mustafa', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_image`) VALUES
(8, 'Women Fashion', 'Every thing women\'s need', 'fashion.png'),
(9, 'Men\'s Clothing', 'Every thing men\'s need', 'mens.jpg'),
(10, 'Cellphones & Telecommunication', 'Collection Of the best phones in the world', 'cell2.jpg'),
(11, 'Computer & Office', 'Hp, Apple, Dell, and more....', 'comp.png'),
(12, 'Kids', 'Every thing your kids need', 'pro.jpg'),
(13, 'Beauty & Health', 'Beauty Products', 'category-4.jpg'),
(14, 'Family', 'Family Products', 'category-3.jpg'),
(15, 'Automobiles & Motorcycles', 'Automobiles & Motorcycles Products', '195978.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(5) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_password` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_email`, `cust_name`, `cust_password`, `mobile`, `address`) VALUES
(2, 'ali@gmail.com', 'Ali', '123456', '0775768343', 'zarqa');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(5) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `cust_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `cust_id`) VALUES
(30, '2021-01-30', 3),
(31, '2021-02-03', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_det_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_det_id`, `order_id`, `pro_id`, `vendor_id`, `qty`, `total`, `date`) VALUES
(34, 30, 13, 4, 2, 1800, '2021-01-30'),
(35, 31, 12, 4, 1, 15, '2021-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(5) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_price` varchar(50) NOT NULL,
  `pro_image` text NOT NULL,
  `cat_id` int(5) NOT NULL,
  `vendor_id` int(5) NOT NULL,
  `qty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_desc`, `pro_price`, `pro_image`, `cat_id`, `vendor_id`, `qty`) VALUES
(8, 'pants', 'The drape knitting wide-legged pants suit two-piece women new winter cashmere sweater wide-legged pants western style suits', '19 ', 'pants.jpg', 8, 4, '70'),
(9, 'Women Jacket', '2021 New Women Winter Warm Faux Fur Coat Thick Women Long Coat Turn Down Collar Women Warm Coat Casaco Feminino', '39', 'jacket.jpeg', 8, 4, '33'),
(10, 'Men Sets', 'Men\'s Autumn Winter Sets Zipper Hoodie+pants Two Pieces Casual Tracksuit Male Sportswear Gym Brand Clothing Sweat Suit', '39', 'sets.jpg', 9, 4, '100'),
(11, 'Sweater', 'MIACAWOR Winter Warm Wool Sweater For Men Patchwork Pullover Men Knitted Jumper Sweater O-Neck Sueter Hombre Men Clothing Y286', '15', 'images.jpg', 9, 4, '70'),
(12, 'kids shirt', 'kids shirt', '15', 'تنزيل.jpg', 12, 4, '100'),
(13, 'I phone 12', 'Red I Phone 12-mini- 64G', '900', 'iphone-12-red-select-2020.png', 10, 5, '25'),
(14, 'samsung note 20 ultra', 'samsung note 20 ultra', '900', '4_3_Teaser_Samsung_Galaxy_Note20_Ultra_5G_SM-N986B_MysticWhite.jpg', 10, 5, '25'),
(15, 'Laptop Dell', 'Inspiron 3593-Core i5 10th Generation Inspiron 3593-Core i5 10th Generation', '500', '3593--3-1200x1200.jpg', 11, 6, '25'),
(17, 'MacBook Air Apple', 'Pay over time, interest-free for your MacBook Air with Apple Card Monthly Installments. Free delivery. Select a model or customize your own.', '750', 'macbook-air-og-202011.jpg', 11, 6, '25');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_email` varchar(50) NOT NULL,
  `vendor_password` varchar(50) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `vendor_phone` varchar(50) NOT NULL,
  `trade_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_email`, `vendor_password`, `vendor_name`, `vendor_phone`, `trade_name`) VALUES
(4, 'moaad@gmail.com', '123456', 'Moaad', '0775768343', 'Clothes'),
(5, 'hussam@gmail.com', '123456', 'Hussam', '0775807596', 'cell phones'),
(6, 'mustafaahmad653@gmail.com', '123456789', 'Ahmad Mustafa', '0796565847', 'Computers & Laptops'),
(7, 'mahmoud@gmail.com', '123456', 'Mahmoud', '0785637900', 'Automobiles ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_det_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
