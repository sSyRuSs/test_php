-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 11:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_btl1`
--

-- --------------------------------------------------------

--
-- Table structure for table `php_admin`
--

CREATE TABLE `php_admin` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(255) NOT NULL,
  `AdminEmail` varchar(255) NOT NULL,
  `AdminUser` varchar(255) NOT NULL,
  `AdminPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `php_admin`
--

INSERT INTO `php_admin` (`AdminID`, `AdminName`, `AdminEmail`, `AdminUser`, `AdminPass`) VALUES
(1, 'NguyexenLong', 'long123@gmail.com', 'long123', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandID` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandID`, `brandName`) VALUES
(3, 'Samsung'),
(4, 'Apple'),
(5, 'Realmi'),
(6, 'Oppo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartID` int(11) NOT NULL,
  `proID` int(11) NOT NULL,
  `sID` varchar(255) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `proPrice` int(255) NOT NULL,
  `proQuantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartID`, `proID`, `sID`, `proName`, `proPrice`, `proQuantity`, `image`) VALUES
(16, 14, 'vloldjqv3m7kjgkdflrqsn55dn', 'Iphone 12', 78888, 6, '4ff6ff6831.png'),
(17, 7, 'vloldjqv3m7kjgkdflrqsn55dn', 'Samsung A32', 78888, 5, '1920x1080.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catID`, `catName`) VALUES
(1, 'Tablet'),
(2, 'Smart Phone'),
(3, 'Laptop'),
(4, 'PC'),
(6, 'Telephone');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `proID` int(11) NOT NULL,
  `proName` tinytext NOT NULL,
  `proPrice` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `proQuantity` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `proDes` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`proID`, `proName`, `proPrice`, `image`, `proQuantity`, `catID`, `brandID`, `proDes`) VALUES
(5, 'Iphone 12', 78888, '1920x1080.jpg', 0, 2, 4, 'dfds'),
(7, 'Samsung A32', 78888, '1920x1080.jpg', 123, 4, 5, 'asoufhskdu'),
(10, 'Iphone 12', 78888, '.png', 123, 4, 5, 'het hang'),
(11, 'Iphone 12', 78888, '.png', 123, 4, 5, 'dfds'),
(12, 'Iphone 12', 78888, '.png', 123, 4, 5, 'het hang'),
(13, 'Iphone 12', 78888, 'd70892b694.png', 123, 4, 5, 'het hang'),
(14, 'Iphone 12', 78888, '4ff6ff6831.png', 123, 4, 5, 'asoufhskdu'),
(15, 'Iphone 12', 78888, '3fe2f08e00.png', 123, 4, 5, 'asoufhskdu'),
(17, 'Samsung A32', 78888, 'dafc181bc9.jpg', 123, 4, 5, 'dfds'),
(18, 'Iphone 12', 78888, '4bb5790310.jpg', 123, 4, 4, 'dfds'),
(19, 'Iphione 13', 9999999, '96fa09c100.jpg', 10, 4, 5, 'het hang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `userPhone` varchar(10) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userID`, `userName`, `address`, `city`, `country`, `userPhone`, `userEmail`, `userPass`) VALUES
(2, 'admin', 'abc', 'Ho Chi Minh', 'Vietnam', '0986607814', 'thanchau10902@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'admin', 'abc', 'Ho Chi Minh', 'Vietnam', '0986607814', 'thanchau10902@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'longadmin', 'abc', 'Ho Chi Minh', 'Vietnam', '0901881935', 'duyennk20062007@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'longadmin', 'abc', 'Ho Chi Minh', 'Vietnam', '0901881935', 'duyennk20062007@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'long123456', 'abc', 'Ho Chi Minh', 'Vietnam', '0986607814', 'thanhlong054@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'long043', 'abc', 'Ho Chi Minh', 'Vietnam', '0986607814', 'thanhlong054@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'thanhlong05', 'abc', 'Ho Chi Minh', 'Vietnam', '0986607814', 'thanhlong054@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `php_admin`
--
ALTER TABLE `php_admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`proID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `php_admin`
--
ALTER TABLE `php_admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `proID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
