-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2016 at 04:26 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `buyer_id` varchar(1000) NOT NULL,
  `product_name` text NOT NULL,
  `product_value` int(30) NOT NULL,
  `seller_name` varchar(30) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(1000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `tokenid` int(11) NOT NULL,
  `logs_text` text NOT NULL,
  `timeoflog` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`tokenid`, `logs_text`, `timeoflog`) VALUES
(1, 'New User Registration : rushabh6792@gmail.com -- Contact : 9004196353', '2016-09-18 09:02:38'),
(2, 'New User Registration : ganeshzore@gmail.com -- Contact : 9969366181', '2016-09-18 09:03:12'),
(3, 'New Seller Registration : Aditya Computers -- Contact : iamrushabh6792@gmail.com and 9967584353', '2016-09-18 09:04:39'),
(4, 'New Seller Registration : Shubhu Computers -- Contact : shubham.upadhyay@gmail.com and 9932892789', '2016-09-18 09:06:26'),
(5, 'New Seller Registration : Mehta and Daughters.Ltd -- Contact : priyanka.mehta@gmail.com and 293648723', '2016-09-18 12:42:28'),
(6, 'New Seller Registration : Karan Computing -- Contact : karan.kalbhor@gmail.com and 2347825', '2016-09-18 12:43:20'),
(7, 'New Product from Seller: Karan Computing : SanDisk Cruzer Blade Pack of 2 16 GB Pen Drive added. Quantity : 10 & Price : Rs.595', '2016-09-18 12:44:49'),
(8, 'New Product from Seller: Karan Computing : TP-LINK Archer C3200  (Black) added. Quantity : 4 & Price : Rs.17000', '2016-09-18 12:45:33'),
(9, 'New Product from Seller: Shubhu Computers : SAMSUNG 81cm (32) Full HD Smart, Curved LED TV added. Quantity : 20 & Price : Rs.43500', '2016-09-18 12:46:46'),
(10, 'New Product from Seller: Shubhu Computers : LYF WIND 3 added. Quantity : 30 & Price : Rs.6999', '2016-09-18 12:47:24'),
(11, 'New Product from Seller: Shubhu Computers : Epson L220 Multi-function Inkjet Printer(Black) added. Quantity : 32 & Price : Rs.10799', '2016-09-18 12:48:31'),
(12, 'New Product from Seller: Aditya Computers : SAMSUNG Gear IconX Blue Smart Headphones  added. Quantity : 7 & Price : Rs.13499', '2016-09-18 12:49:35'),
(13, 'New Product from Seller: Aditya Computers : Apple iPhone 6S Plus  added. Quantity : 10 & Price : Rs.49990', '2016-09-18 12:50:40'),
(14, 'New Product from Seller: Aditya Computers : Motorola Moto 360 Sport Smartwatch added. Quantity : 3 & Price : Rs.18499', '2016-09-18 12:51:17'),
(15, 'New Product from Seller: Karan Computing : Micromax 21.5 inch LED - MM215FH76 Monitor   added. Quantity : 40 & Price : Rs.7499', '2016-09-18 12:52:54'),
(16, 'New Product from Seller: Aditya Computers : SAMSUNG Galaxy J5 - 6 (New 2016 Edition)  added. Quantity : 10 & Price : Rs.11990', '2016-09-18 12:53:40'),
(17, 'Product Bought : TP-LINK Archer C3200  (Black) by rushabh6792@gmail.com', '2016-09-18 13:10:22'),
(18, 'Product Bought : SAMSUNG Gear IconX Blue Smart Headphones  by rushabh6792@gmail.com', '2016-09-18 13:10:22'),
(19, 'Product Bought : Apple iPhone 6S Plus  by rushabh6792@gmail.com', '2016-09-18 13:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `Seller_name` varchar(100) NOT NULL,
  `product_title` varchar(1000) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(30) NOT NULL,
  `upload_file` varchar(1000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Seller_name`, `product_title`, `product_desc`, `product_price`, `quantity`, `upload_file`, `time`) VALUES
(1, 'Karan Computing', 'SanDisk Cruzer Blade Pack of 2 16 GB Pen Drive', 'USB 2.0|16 GB Plastic For Desktop Computer Color:Red, Black', 595, 10, 'sandisk-cruzer-blade-pack-of-2-original-imaedbf3pxrtzngt.jpeg', '2016-09-18 12:44:49'),
(2, 'Karan Computing', 'TP-LINK Archer C3200  (Black)', 'Type: Wireless Without modem 3200 Mbps Speed Frequency: 2.4 GHz, 5 GHz External Antenna 2 USB Ports', 17000, 3, 'tp-link-archer-c3200-original-imaeh7mngzypvspj.jpeg', '2016-09-18 13:10:22'),
(3, 'Shubhu Computers', 'SAMSUNG 81cm (32) Full HD Smart, Curved LED TV', 'Full HD | 1920 x 1080 Resolution 20 W Speaker Output 1 Optical Audio Output', 43500, 20, 'samsung-32j6300-original-imaekydyqhs3hy4c.jpeg', '2016-09-18 12:46:46'),
(4, 'Shubhu Computers', 'LYF WIND 3', '2 GB RAM | 16 GB ROM | Expandable Upto 32 GB 5.5 inch HD Display 8MP Primary Camera | 2MP Front 2920 mAh Li-Ion Polymer Battery Android Lollipop', 6999, 30, 'lyf-wind-3-na-original-imaekz59zyrzfhyr.jpeg', '2016-09-18 12:47:24'),
(5, 'Shubhu Computers', 'Epson L220 Multi-function Inkjet Printer(Black)', 'Printer: Inkjet Output: Color Interface: USB', 10799, 32, 'epson-l220-original-imae7ccrv9h3gucc.jpeg', '2016-09-18 12:48:31'),
(6, 'Aditya Computers', 'SAMSUNG Gear IconX Blue Smart Headphones ', 'Wireless Earbuds Water Resistant Fitness Tracker Control with a Touch', 13499, 6, 'gear-iconx-samsung-original-imaehwk4zhnhypj7.jpeg', '2016-09-18 13:10:22'),
(7, 'Aditya Computers', 'Apple iPhone 6S Plus ', '2 GB RAM | 16 GB ROM 5.5 inch Full HD Display 12MP Primary Camera | 5MP Front 2750 mAh Li-Ion Battery iOS', 49990, 9, 'apple-iphone-6s-plus-na-original-imaeby7yqedxtcwv.jpeg', '2016-09-18 13:10:23'),
(8, 'Aditya Computers', 'Motorola Moto 360 Sport Smartwatch', 'Bluetooth Support Waterproof Fitness & Outdoor', 18499, 3, 'ap3631ab1k8-motorola-original-imaeg57knxjgggwp.jpeg', '2016-09-18 12:51:17'),
(9, 'Karan Computing', 'Micromax 21.5 inch LED - MM215FH76 Monitor  ', 'Display Type: LED 21.5 inch Full HD Display Response Time: 5 ms', 7499, 40, 'micromax-mm215fh76-mm215fh76-original-imaebjefctamheyf.jpeg', '2016-09-18 12:52:54'),
(10, 'Aditya Computers', 'SAMSUNG Galaxy J5 - 6 (New 2016 Edition) ', '2 GB RAM | 16 GB ROM | Expandable Upto 128 GB 5.2 inch HD Display 13MP Primary Camera | 5MP Front 3100 mAh Li-Ion Battery Android Marshmallow', 11990, 10, 'samsung-galaxy-j5-2016-sm-j510fzkuins-original-imaeg8czxypfsu4t.jpeg', '2016-09-18 12:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `sellerlogs`
--

CREATE TABLE `sellerlogs` (
  `id` int(11) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `log_text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellerlogs`
--

INSERT INTO `sellerlogs` (`id`, `email_id`, `log_text`, `time`) VALUES
(1, 'iamrushabh6792@gmail.com', 'Logged in', '2016-09-18 12:37:52'),
(2, 'shubham.upadhyay@gmail.com', 'Logged in', '2016-09-18 12:38:02'),
(3, 'karan.kalbhor@gmail.com', 'Logged in', '2016-09-18 12:44:02'),
(4, 'karan.kalbhor@gmail.com', 'New Product from Seller: Karan Computing : SanDisk Cruzer Blade Pack of 2 16 GB Pen Drive added. Quantity : 10 & Price : Rs.595', '2016-09-18 12:44:49'),
(5, 'karan.kalbhor@gmail.com', 'New Product from Seller: Karan Computing : TP-LINK Archer C3200  (Black) added. Quantity : 4 & Price : Rs.17000', '2016-09-18 12:45:33'),
(6, 'shubham.upadhyay@gmail.com', 'Logged in', '2016-09-18 12:46:02'),
(7, 'shubham.upadhyay@gmail.com', 'New Product from Seller: Shubhu Computers : SAMSUNG 81cm (32) Full HD Smart, Curved LED TV added. Quantity : 20 & Price : Rs.43500', '2016-09-18 12:46:46'),
(8, 'shubham.upadhyay@gmail.com', 'New Product from Seller: Shubhu Computers : LYF WIND 3 added. Quantity : 30 & Price : Rs.6999', '2016-09-18 12:47:24'),
(9, 'shubham.upadhyay@gmail.com', 'New Product from Seller: Shubhu Computers : Epson L220 Multi-function Inkjet Printer(Black) added. Quantity : 32 & Price : Rs.10799', '2016-09-18 12:48:31'),
(10, 'iamrushabh6792@gmail.com', 'Logged in', '2016-09-18 12:48:55'),
(11, 'iamrushabh6792@gmail.com', 'New Product from Seller: Aditya Computers : SAMSUNG Gear IconX Blue Smart Headphones  added. Quantity : 7 & Price : Rs.13499', '2016-09-18 12:49:35'),
(12, 'iamrushabh6792@gmail.com', 'New Product from Seller: Aditya Computers : Apple iPhone 6S Plus  added. Quantity : 10 & Price : Rs.49990', '2016-09-18 12:50:40'),
(13, 'iamrushabh6792@gmail.com', 'New Product from Seller: Aditya Computers : Motorola Moto 360 Sport Smartwatch added. Quantity : 3 & Price : Rs.18499', '2016-09-18 12:51:17'),
(14, 'karan.kalbhor@gmail.com', 'Logged in', '2016-09-18 12:51:39'),
(15, 'karan.kalbhor@gmail.com', 'Logged in', '2016-09-18 12:52:00'),
(16, 'karan.kalbhor@gmail.com', 'New Product from Seller: Karan Computing : Micromax 21.5 inch LED - MM215FH76 Monitor   added. Quantity : 40 & Price : Rs.7499', '2016-09-18 12:52:53'),
(17, 'iamrushabh6792@gmail.com', 'Logged in', '2016-09-18 12:53:06'),
(18, 'iamrushabh6792@gmail.com', 'New Product from Seller: Aditya Computers : SAMSUNG Galaxy J5 - 6 (New 2016 Edition)  added. Quantity : 10 & Price : Rs.11990', '2016-09-18 12:53:40'),
(19, 'iamrushabh6792@gmail.com', 'Logged in', '2016-09-18 13:13:05'),
(20, 'iamrushabh6792@gmail.com', 'Logged in', '2016-09-18 13:20:23'),
(21, 'priyanka.mehta@gmail.com', 'Logged in', '2016-09-18 13:20:49'),
(22, 'shubham.upadhyay@gmail.com', 'Logged in', '2016-09-18 13:22:09'),
(23, 'iamrushabh6792@gmail.com', 'Logged in', '2016-09-18 13:22:18'),
(24, 'priyanka.mehta@gmail.com', 'Logged in', '2016-09-18 13:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `seller_name` varchar(30) NOT NULL,
  `pass_key` varchar(50) NOT NULL,
  `address_details` text NOT NULL,
  `doj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone_number` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `email_id`, `seller_name`, `pass_key`, `address_details`, `doj`, `phone_number`, `status`) VALUES
(1, 'iamrushabh6792@gmail.com', 'Aditya Computers', 'rootuser', 'Kanak Sawali, Near Nadkarni Hospital, Line Ali, Old Panvel', '2016-09-18 09:04:39', '9967584353', 'Confirmed'),
(2, 'shubham.upadhyay@gmail.com', 'Shubhu Computers', 'shubha,', 'Shop No 121, Near Ghansoli Railway Station, Ghansoli - 139738', '2016-09-18 09:06:26', '9932892789', 'Confirmed'),
(3, 'priyanka.mehta@gmail.com', 'Mehta and Daughters.Ltd', 'mehta', 'Kharghar Kolivada, Kaghargar', '2016-09-18 12:42:28', '293648723', 'Confirmed'),
(4, 'karan.kalbhor@gmail.com', 'Karan Computing', 'karan', 'Dombhivali East', '2016-09-18 12:43:20', '2347825', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `settlement`
--

CREATE TABLE `settlement` (
  `id` int(11) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `product_name` text NOT NULL,
  `amount` int(100) NOT NULL,
  `commission` int(100) NOT NULL,
  `shipping` int(100) NOT NULL,
  `collection` int(100) NOT NULL,
  `fixed_fee` int(100) NOT NULL,
  `marketplace` int(100) NOT NULL,
  `service` int(100) NOT NULL,
  `total_ded` int(100) NOT NULL,
  `settle_value` int(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settlement`
--

INSERT INTO `settlement` (`id`, `seller_name`, `product_name`, `amount`, `commission`, `shipping`, `collection`, `fixed_fee`, `marketplace`, `service`, `total_ded`, `settle_value`, `time`) VALUES
(1, 'Aditya Computers', 'Apple iPhone 6S Plus ', 49990, 4999, 30, 1250, 30, 6309, 946, 7255, 42735, '2016-09-18 13:10:54'),
(2, 'Aditya Computers', 'SAMSUNG Gear IconX Blue Smart Headphones ', 13499, 1350, 30, 337, 30, 1747, 262, 2009, 11490, '2016-09-18 13:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `seller_name` varchar(1000) NOT NULL,
  `product_name` text NOT NULL,
  `product_image` text NOT NULL,
  `price_paid` int(100) NOT NULL,
  `settle_status` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `email_id`, `seller_name`, `product_name`, `product_image`, `price_paid`, `settle_status`, `time`) VALUES
(1, 'rushabh6792@gmail.com', 'Karan Computing', 'TP-LINK Archer C3200  (Black)', 'tp-link-archer-c3200-original-imaeh7mngzypvspj.jpeg', 17000, 'Pending', '2016-09-18 13:10:22'),
(2, 'rushabh6792@gmail.com', 'Aditya Computers', 'SAMSUNG Gear IconX Blue Smart Headphones ', 'gear-iconx-samsung-original-imaehwk4zhnhypj7.jpeg', 13499, 'Settled', '2016-09-18 13:11:00'),
(3, 'rushabh6792@gmail.com', 'Aditya Computers', 'Apple iPhone 6S Plus ', 'apple-iphone-6s-plus-na-original-imaeby7yqedxtcwv.jpeg', 49990, 'Settled', '2016-09-18 13:10:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `pass_key` varchar(40) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `address_details` text NOT NULL,
  `doj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users Table';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email_id`, `pass_key`, `first_name`, `last_name`, `phone_number`, `address_details`, `doj`) VALUES
(1, 'admin@catalog.com', 'admin', 'Admin', 'Admin', '121', 'Catalog.Ltd', '2016-09-18 08:58:54'),
(3, 'ganeshzore@gmail.com', 'zore', 'Ganesh', 'Zore', '9969366181', 'Worli, Mumbai', '2016-09-18 09:03:12'),
(2, 'rushabh6792@gmail.com', 'rootuser', 'Rushabh', 'Wadkar', '9004196353', 'Kanak Sawali, Near Nadkarni Hospital, Line Ali, Old Panvel', '2016-09-18 09:02:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`tokenid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellerlogs`
--
ALTER TABLE `sellerlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `settlement`
--
ALTER TABLE `settlement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `tokenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sellerlogs`
--
ALTER TABLE `sellerlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settlement`
--
ALTER TABLE `settlement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
