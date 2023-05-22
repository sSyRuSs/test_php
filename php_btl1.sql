-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 07:48 PM
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
(7, 'Colt&#039;s Manufacturing Company, LLC'),
(8, 'Heckler &amp; Koch'),
(9, 'FN Herstal'),
(10, 'Smith &amp; Wesson'),
(11, 'Beretta'),
(12, 'Glock Ges.m.b.H'),
(13, 'Remington Arms Company, LLC'),
(14, 'SIG Sauer, Inc.'),
(15, 'Mossberg &amp; Sons'),
(16, 'Ruger'),
(17, 'Browning Arms Company'),
(18, 'Savage Arms'),
(19, 'Winchester Repeating Arms Company'),
(20, 'Taurus Holdings, Inc.'),
(21, 'Benelli Armi SpA'),
(22, 'Bushmaster Firearms International'),
(23, 'Barrett Firearms Manufacturing, Inc.'),
(24, 'Kalashnikov Concern');

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
(17, 7, 'vloldjqv3m7kjgkdflrqsn55dn', 'Samsung A32', 78888, 5, '1920x1080.jpg'),
(21, 34, 'vuulonqm34r1vl41m52u8dv2j3', 'HK416', 2599000, 4, '1c51cdaca9.jpg'),
(22, 33, 'vuulonqm34r1vl41m52u8dv2j3', 'AWM 2020', 2699000, 6, '931d4025c3.jpg');

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
(1, 'Stock'),
(2, 'LMG'),
(3, 'SMG'),
(4, 'Shotgun'),
(6, 'Assult Rifle'),
(7, 'Muzzle'),
(8, 'Grip'),
(9, 'Magazine'),
(10, 'Laser/Flash'),
(11, 'Scope'),
(13, 'Sniper'),
(14, 'Pistol');

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
  `proDes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`proID`, `proName`, `proPrice`, `image`, `proQuantity`, `catID`, `brandID`, `proDes`) VALUES
(20, 'ACR J10', 1850000, '64a7c8bb91.jpg', 10, 6, 22, 'Uy lực: ~85m/s Trọng Lượng: 2.2kg Chiều Dài: 78-85cm(khi kéo báng)  Gear: Gen 9 (custom) Báng có thể gập. Sức chứa băng đạn: 160 viên Tốc độ xả: 800/min (viên/phút)'),
(24, 'HK 416D FULL OPTION', 1649000, 'd9923dfb4a.jpg', 10, 6, 8, 'Uy lực: 60m/s Trọng Lượng: 1.9kg Chiều Dài: 101 cm Sức chứa băng đạn: 150 viên kèm pin sạc 7,4 vol'),
(25, 'AK47', 2900000, '47013fdd42.jpg', 10, 6, 24, 'Uy lực: 80m/s Trọng Lượng: 2.2kg Chiều Dài: 90cm Gear: bánh răng kim loại Sức chứa băng đạn: 200 Tốc độ xả: ~ 970 viên /1phút'),
(26, 'MP5K Báng gập', 689999, 'b6defc985b.jpg', 10, 3, 8, 'Uy lực: ~45m/s Trọng Lượng: 1kg Chiều Dài: 80cm Sức chứa băng đạn: ~50-70 viên Tốc độ xả: 300-400/min (viên/phút)'),
(27, 'Barrett M8A21', 1499000, 'c378ae8950.jpg', 10, 13, 23, 'Uy lực: ~65m/s Trọng Lượng: 2,1kg Chiều Dài: 140cm Gear: Gen 8 Chất liệu: Full Nylon Tốc độ xả đạn: 600-800/min Sức chứa băng đạn: ~160 viên'),
(28, 'M16A3 ', 1350000, '07e3eb0cd4.jpg', 10, 6, 17, 'Uy lực: ~60m/s Trọng Lượng: 1.7kg Chiều Dài: 90cm Gear: Gen 8 (custom) Sức chứa băng đạn: 100 viên Tốc độ xả: ~600/min (viên/phút)'),
(29, 'M249 ', 1500000, '0ea2f24d06.jpg', 10, 2, 17, 'Uy lực: ~68m/s Trọng Lượng: 1,5kg Chiều Dài: 80cm~95cm(khi kéo báng)  Sức chứa băng đạn: ~1500 viên Tốc độ xả: 900/min (viên/phút)'),
(30, 'Glock 18', 730000, 'aae18a3b94.jpg', 10, 14, 12, 'Uy lực: ~40m/s Trọng Lượng: 0.7kg Chiều Dài: 25cm'),
(31, 'Combat Master TTI 2011- UDL 2011', 1049000, 'cf730ef97b.jpg', 10, 14, 7, 'Tỷ lệ 1 : 1  Cực nhiều kim loại  Văng shell như thật  Nặng lên tới hơn 600 grammm'),
(32, 'Remingtion MSR', 3099000, 'e1c0a9598d.jpg', 10, 13, 13, 'Uy lực: 75 - 85m/s Trọng Lượng: 2.9kg Chiều Dài: 110-120cm(khi kéo báng)  Gear: thay được lò xo Sức chứa băng đạn: 40 viên'),
(33, 'AWM 2020', 2699000, '931d4025c3.jpg', 10, 13, 19, 'Trọng Lượng: 2.4 kg Chiều Dài: 130m Sức chứa băng đạn: 5 viên'),
(34, 'HK416', 2599000, '1c51cdaca9.jpg', 10, 6, 8, 'Uy lực: ~80m/s Trọng Lượng: 2,1kg Chiều Dài: 70cm~80cm(khi kéo báng)  Gear: Gear HK (custom) Tốc độ xả đạn: ~900/min Sức chứa băng đạn: 150viên'),
(35, 'P90', 1399000, '7356de904a.jpg', 10, 3, 16, 'Uy lực: 65m/s\r\nTrọng Lượng: 1.4kg\r\nChiều Dài:50cm\r\nGear: tương đương j8\r\nSức chứa băng đạn: 200 viên\r\nChưa bao gồm pin và sạc.');

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
(8, 'thanhlong05', 'abc', 'Ho Chi Minh', 'Vietnam', '0986607814', 'thanhlong054@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'long123', 'abc', 'Ho Chi Minh', 'Vietnam', '0986607814', 'thanhlong1393@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'longadmin', 'abc', 'Ho Chi Minh', 'Vietnam', '0986607814', 'thanhlong1393@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'long123', 'abc', 'Ho Chi Minh', 'Vietnam', '0986607814', 'thanhlong1393@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

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
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `proID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
