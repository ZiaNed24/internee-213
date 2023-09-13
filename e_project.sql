-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 02:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `jewelery_products`
--

CREATE TABLE `jewelery_products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `jew_sub_id` int(11) NOT NULL,
  `jew_images` varchar(200) DEFAULT NULL,
  `jew_price` varchar(20) NOT NULL,
  `jew_datetime` datetime DEFAULT current_timestamp(),
  `jew_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jewelery_products`
--

INSERT INTO `jewelery_products` (`id`, `name`, `jew_sub_id`, `jew_images`, `jew_price`, `jew_datetime`, `jew_status`) VALUES
(1, 'coin necklaces', 1, 'jeww.webp', '3000', '2022-11-04 21:50:39', 'out'),
(2, 'Cross necklaces.', 2, 'aest1.jpeg', '2000', '2022-11-04 21:50:39', 'sale'),
(3, 'Initial necklaces', 3, 'necklace2.jpg', '2500', '2022-11-04 21:51:07', ''),
(4, 'Pearl necklaces', 1, 'necklace3.jpg', '1500', '2022-11-04 21:51:56', ''),
(5, 'Sterling silver necklaces', 2, 'necklace4.jpg', '1700', '2022-11-04 21:51:56', 'out'),
(6, 'Zodiac necklaces', 3, 'necklace5.jpg', '3000', '2022-11-04 21:52:23', 'out'),
(7, ' Figaro', 4, 'pendent2.png', '2000', '2022-11-04 21:53:58', 'sale'),
(8, 'curb', 5, 'pendent3.png', '1000', '2022-11-04 21:53:58', 'out'),
(9, 'd box chains', 6, 'pendent5.png', '2430', '2022-11-04 21:55:28', 'sale'),
(10, 'pendent5.png', 5, 'pendent6.png', '1200', '2022-11-04 21:55:28', 'sale'),
(11, 'Pave Setting', 10, 'ring1.png', '500', '2022-11-04 21:57:29', ''),
(12, 'Three Stone Rings ', 10, 'ring22.jpg', '1000', '2022-11-04 21:57:29', ''),
(13, 'Halo Rings', 11, 'ring10.jpg', '1900', '2022-11-04 21:58:16', 'sale'),
(14, 'Bezel Setting ', 12, 'ring9.jpg', '1400', '2022-11-04 21:58:16', 'sale'),
(15, 'Diamond Solitaire ', 11, 'ring6.jpg', '2390', '2022-11-04 21:59:19', 'out'),
(16, 'Eternity Band Rings', 12, 'ring4.png', '1290', '2022-11-04 21:59:19', 'out'),
(18, 'ring4.png', 12, 'ring3.png', '1200', '2022-11-04 22:00:06', 'sale'),
(19, 'Rings In Rose Gold', 11, 'ring2.png', '3000', '2022-11-04 22:00:36', 'sale'),
(20, 'studs.', 7, 'top1.png', '500', '2022-11-04 22:02:31', 'sale'),
(21, 'hoops', 9, 'top2.png', '600', '2022-11-04 22:02:31', 'out'),
(22, 'dangles and drops.', 8, 'top3.png', '700', '2022-11-04 22:03:18', ''),
(23, 'climbers', 7, 'top4.png', '999', '2022-11-04 22:03:18', 'out'),
(24, 'Ear Cuffs.', 8, 'top5.png', '1500', '2022-11-04 22:04:26', ''),
(25, 'Ear Cuffs.', 8, 'top6.png', '1900', '2022-11-04 22:04:26', 'sale'),
(26, 'Jhumkas', 16, 'earing1.jpg', '500', '2022-11-04 22:06:07', 'out'),
(27, 'Drop Earrings.', 17, 'earing5.jpg', '1000', '2022-11-04 22:06:07', ''),
(28, 'Colorful Statement Earrings', 18, 'earing2.jpg', '1200', '2022-11-04 22:07:07', 'sale'),
(29, 'Sculptural Earrings.', 17, 'earing3.jpg', '1000', '2022-11-04 22:07:07', 'sale'),
(30, 'Celestial Earrings', 17, 'earing7.jpg', '2500', '2022-11-04 22:07:28', 'out'),
(31, 'Charm Bracelets', 13, 'bracelet0.jpg', '300', '2022-11-04 22:10:10', ''),
(32, 'Beaded Bracelets', 14, 'bracelet4.jpg', '400', '2022-11-04 22:10:10', 'sale'),
(33, 'Bangle Bracelets', 15, 'bracelet5.jpg', '600', '2022-11-04 22:11:01', 'out'),
(34, 'Cuff Bracelets', 13, 'bracelet6.jpg', '1000', '2022-11-04 22:11:01', 'out'),
(35, 'Pearl Bracelets.', 14, 'bracelet11.jpg', '1200', '2022-11-04 22:11:27', 'out'),
(36, 'Chain Link Bracelets', 15, 'bracelet1.png', '1699', '2022-11-04 22:12:25', 'out'),
(37, 'Slider Bracelets', 13, 'bracelet2.png', '1200', '2022-11-04 22:12:25', 'sale');

-- --------------------------------------------------------

--
-- Table structure for table `jewelery_sub`
--

CREATE TABLE `jewelery_sub` (
  `id` int(11) NOT NULL,
  `jewelery_name` varchar(100) NOT NULL,
  `jewelery_brand` varchar(100) NOT NULL,
  `jew_discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jewelery_sub`
--

INSERT INTO `jewelery_sub` (`id`, `jewelery_name`, `jewelery_brand`, `jew_discount`) VALUES
(1, 'Necklace', 'tiffani', 0.2),
(2, 'Necklace', 'Cartier', 0.2),
(3, 'Necklace', 'Bulgari', 0.3),
(4, 'Pendent', 'Harry Winston', 0.45),
(5, 'Pendent', 'Foundrae', 0.21),
(6, 'Pendent', 'Gucci', 0.55),
(7, 'tops', 'Chopard', 0.5),
(8, 'Tops', 'Graff', 0.11),
(9, 'tops', 'Buccellati', 0.12),
(10, 'Rings', 'Graffio.', 0.13),
(11, 'Rings', 'Channel', 0.14),
(12, 'Rings', 'Dior', 0.15),
(13, 'Bracelet', 'Bvlgari.', 0.16),
(14, 'Bracelet', 'David Yurman', 0.1),
(15, 'Bracelet', 'Chopardioksa', 0.2),
(16, 'earings', 'Co.', 0.3),
(17, 'earings', 'max', 0.5),
(18, 'earings', 'sheen', 0.3);

-- --------------------------------------------------------

--
-- Table structure for table `makeup_category`
--

CREATE TABLE `makeup_category` (
  `id` int(11) NOT NULL,
  `category_type` varchar(100) NOT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makeup_category`
--

INSERT INTO `makeup_category` (`id`, `category_type`, `discount`) VALUES
(1, 'lipstick', 0.1),
(2, 'Foundation', 0.2),
(3, 'Priemer', 0.1),
(4, 'Moisturizer', 0.5),
(6, 'Serums', 0.4),
(7, 'Eye Shadow Palate', 0.1),
(8, 'Blush', 0.2),
(9, 'Bronzer', 0.3),
(12, 'Face Powder', 0.4),
(13, 'Setting Powder', 0.5),
(15, 'Highlighter', 0.6),
(16, 'Lip Liner', 0.7),
(17, 'Eye liner', 0.8),
(18, 'Mascara', 0.3),
(19, 'eyelashes', 0.2),
(20, 'Brushes Set', 0.1),
(21, 'Makeup set', 0.3),
(22, 'Contour', 0.4),
(23, 'sunscreens', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `makeup_products`
--

CREATE TABLE `makeup_products` (
  `id` int(11) NOT NULL,
  `mk_cat_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `images` varchar(50) DEFAULT NULL,
  `price` varchar(20) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makeup_products`
--

INSERT INTO `makeup_products` (`id`, `mk_cat_id`, `product_name`, `images`, `price`, `datetime`, `status`) VALUES
(1, 1, 'matte as hell', 'lipstick.jpg', '2300', '2022-10-24 23:11:03', 'sale'),
(2, 1, 'RENEE Madness PH Sti', 'lipstick4.jpg', '3000', '2022-10-24 23:11:03', 'sale'),
(3, 1, ' LAKMÉ Liquid Lipsti', 'lipstick01.jpg', '3600', '2022-10-24 23:37:19', 'out'),
(4, 1, 'L\'Oreal Paris Color ', 'lipstick9.jpg', '4500', '2022-10-24 23:37:19', 'sale'),
(5, 1, 'NARS Lipstick in Dol', 'lipstick09.jpg', '2500', '2022-10-24 23:37:52', 'sale'),
(6, 2, 'True Life Foundation', 'foundation.jpg', '5000', '2022-10-24 23:38:54', 'out'),
(7, 2, 'High Fives Foundatio', 'foundation3.jpg', '8500', '2022-10-24 23:40:04', 'sale'),
(8, 2, 'Maybelline Fit Me Ma', 'foundation9.jpg', '9600', '2022-10-24 23:40:04', 'sale'),
(9, 2, 'Giorgio Armani Beaut', 'foundation11.jpg', '1399', '2022-10-24 23:41:05', 'out'),
(10, 2, 'Shiseido Synchro Ski', 'foundation12.jpg', '1299', '2022-10-24 23:41:05', 'out'),
(11, 2, 'Estée Lauder Double ', 'product12.jpg', '2500', '2022-10-24 23:44:32', 'sale'),
(12, 1, 'Nyx Professional Mak', 'product2.jpg', '2200', '2022-10-24 23:45:53', 'sale'),
(13, 1, 'Smashbox Always On L', 'product13.jpg', '1000', '2022-10-24 23:45:53', 'sale'),
(14, 3, 'Milk Makeup Hydro Gr', 'priemer.jpg', '4000', '2022-10-24 23:47:29', 'sale'),
(15, 3, 'Embryolisse Lait Crè', 'product16.jpg', '5000', '2022-10-24 23:47:29', 'out'),
(16, 4, 'Maybelline New York.', 'product11.jpg', '1499', '2022-10-24 23:49:42', 'out'),
(17, 4, 'Essence.', 'product12.jpg', '900', '2022-10-24 23:49:42', 'sale'),
(18, 4, 'Makeup Revolution.', 'moisturiser2.jpg', '4500', '2022-10-24 23:50:42', ''),
(19, 4, 'Relove By Revolution', 'moisturser3.jpg', '3999', '2022-10-24 23:50:42', ''),
(20, 6, 'EltaMD Skin Recovery', 'serum.jpg', '7800', '2022-10-24 23:52:30', ''),
(21, 6, 'SkinCeuticals C E Fe', 'serum8.jpg', '3500', '2022-10-24 23:52:30', ''),
(23, 6, 'The INKEY List Retin', 'serum7.jpg', '5466', '2022-10-24 23:53:22', 'sale'),
(24, 6, 'Biossance Squalane +', 'serum9.jpg', '6599', '2022-10-24 23:55:22', 'sale'),
(25, 6, 'Neutrogena.', 'serum33.jpg', '4555', '2022-10-24 23:55:22', 'out'),
(26, 7, 'Kaleidoscope', 'eyeshadow.jpg', '4000', '2022-10-24 23:57:35', 'sale'),
(27, 7, 'Fantasyland.', 'eyeshadow2.jpg', '5000', '2022-10-24 23:57:35', ''),
(28, 8, 'Maybelline', 'blush.jpg', '2300', '2022-10-24 23:58:55', ''),
(29, 8, 'Westman Atelier.', 'blush1.jpg', '700', '2022-10-24 23:58:55', 'sale'),
(31, 8, 'Anastasia Beverly Hi', 'blushh.jpg', '500', '2022-10-25 00:00:07', ''),
(32, 9, 'NYL', 'bronze11.jpg', '560', '2022-10-25 00:02:14', ''),
(33, 12, 'Swiss Beauty Ultra F', 'product5.jpg', '2100', '2022-10-25 00:06:56', 'sale'),
(34, 12, 'MATTE FINISHING LOOS', 'facepowder.jpg', '600', '2022-10-25 00:06:56', 'sale'),
(35, 12, 'KAIASHA PERFECT MATT', 'facepowder2.jpg', '3000', '2022-10-25 00:07:48', 'sale'),
(36, 12, 'Stay Matte Finish', 'facepowder5.jpg', '500', '2022-10-25 00:07:48', ''),
(37, 13, 'Atiqa Odho', 'product8.jpg', '1200', '2022-10-25 00:09:25', 'sale'),
(38, 13, ' Laura Mercier,', 'settingpowder.jpg', '1000', '2022-10-25 00:09:25', ''),
(39, 15, 'COVER FX Perfect', 'highlighter.jpg', '2000', '2022-10-25 00:11:30', ''),
(40, 15, 'COVER FX Perfect', 'highlighter2.jpg', '500', '2022-10-25 00:11:30', 'sale'),
(41, 15, 'PAT McGRATH LABS ', 'highlighter3.jpg', '999', '2022-10-25 00:12:16', ''),
(42, 15, 'BOBBI BROWN Sheer', 'product14.jpg', '999', '2022-10-25 00:12:16', 'sale'),
(43, 17, 'Revlon So Fierce Vin', 'eyeliner1.jpg', '999', '2022-10-25 00:14:06', 'sale'),
(44, 17, 'Shiseido Kajal InkAr', 'eyeliner44.jpg', '699', '2022-10-25 00:14:06', ''),
(45, 16, 'bout Face Line Artis', 'liner.jpg', '456', '2022-10-25 00:15:39', ''),
(46, 16, 'Pat McGrath Precisio', 'liner3.jpg', '560', '2022-10-25 00:15:39', 'out'),
(47, 18, 'Essence Lash Princes', 'mascara1.jpg', '899', '2022-10-25 00:18:27', ''),
(48, 18, 'Glossier Lash Slick.', 'mascara06.jpg', '1000', '2022-10-25 00:18:27', ''),
(49, 18, 'Benefit Cosmetics “T', 'mascara7.jpg', '230', '2022-10-25 00:19:09', ''),
(50, 19, 'Lash Doll.', 'curler1.jpg', '200', '2022-10-25 00:20:15', ''),
(51, 19, 'Platinum Lashes.', 'curler2.jpg', '600', '2022-10-25 00:20:15', ''),
(52, 19, 'Flirt Lashes.', 'lash1.jpg', '670', '2022-10-25 00:21:29', ''),
(53, 19, 'curler NYX', 'lash2.jpg', '700', '2022-10-25 00:21:29', ''),
(54, 19, 'NARS ', 'lash3.jpg', '450', '2022-10-25 00:21:53', ''),
(55, 20, 'RENEE Powder Brush', 'brush.jpg', '300', '2022-10-25 00:23:10', ''),
(56, 20, 'PAC Blending Foundat', 'brushset2.jpg', '400', '2022-10-25 00:23:10', ''),
(57, 20, 'Pro Arte Precision', 'brushset3.jpg', '800', '2022-10-25 00:24:02', 'sale'),
(58, 20, 'MAC Cosmetics Duo Fi', 'brushset4.jpg', '400', '2022-10-25 00:24:02', ''),
(59, 21, 'e.l.f. Cosmetics', 'wholeset3.jpg', '5000', '2022-10-25 00:25:34', ''),
(60, 21, 'fie. Cosmetics', 'wholeset2.jpg', '4000', '2022-10-25 00:25:34', 'sale'),
(61, 21, 'MARIO F1', 'set.jpg', '6000', '2022-10-25 00:26:34', ''),
(62, 21, ' BAREMINERALS Suprem', 'product15.jpg', '5999', '2022-10-25 00:26:34', ''),
(63, 22, 'REAL TECHNIQUES ', 'contour.jpg', '599', '2022-10-25 00:29:31', ''),
(64, 22, 'SHISEIDO Daiya Fude ', 'contour4.jpg', '399', '2022-10-25 00:29:31', 'sale'),
(65, 23, 'CeraVe Hydrating Sun', 'sunscreem3.jpg', '800', '2022-10-25 00:31:40', ''),
(66, 23, 'Nivea Sun Protect & ', 'product3.jpg', '700', '2022-10-25 00:31:40', 'sale'),
(67, 23, 'Neutrogena Sunscreen', 'product1.jpg', '1900', '2022-10-25 00:32:29', 'sale'),
(68, 23, 'U-veil Sunblock ', 'product7.jpg', '4000', '2022-10-25 00:32:29', 'out');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_items` int(11) NOT NULL,
  `total_amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_no`, `user_id`, `no_items`, `total_amount`, `status`, `order_date`) VALUES
(81, '2211-1', 5, 2, '12000', 'Receiving', '2022-11-14 19:32:07'),
(82, '2211-2', 4, 4, '11510', 'pending', '2022-11-14 21:54:28'),
(83, '2211-3', 4, 2, '27700', 'pending', '2022-11-15 19:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Courier_company` varchar(50) NOT NULL,
  `m_id` int(11) DEFAULT NULL,
  `j_id` int(11) DEFAULT NULL,
  `price` varchar(50) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `order_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `quantity`, `Courier_company`, `m_id`, `j_id`, `price`, `total_amount`, `order_id`, `datetime`) VALUES
(99, 2, 'TCS', 26, NULL, '4000', '8000', 81, '2022-11-14 19:32:07'),
(100, 2, 'TCS', NULL, 2, '2000', '4000', 81, '2022-11-14 19:32:07'),
(101, 2, 'TCS', 45, NULL, '456', '912', 82, '2022-11-14 21:54:28'),
(102, 2, 'TCS', 1, NULL, '2300', '4600', 82, '2022-11-14 21:54:28'),
(103, 2, 'TCS', NULL, 2, '2000', '4000', 82, '2022-11-14 21:54:28'),
(104, 2, 'TCS', 41, NULL, '999', '1998', 82, '2022-11-14 21:54:28'),
(105, 5, 'TCS', 11, NULL, '2500', '12500', 83, '2022-11-15 19:14:13'),
(106, 8, 'TCS', 67, NULL, '1900', '15200', 83, '2022-11-15 19:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `registration_tb`
--

CREATE TABLE `registration_tb` (
  `id` int(11) NOT NULL,
  `u_f_name` varchar(50) NOT NULL,
  `u_l_name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `u_address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_tb`
--

INSERT INTO `registration_tb` (`id`, `u_f_name`, `u_l_name`, `country`, `u_address`, `city`, `email_address`, `company`, `phone_number`, `password`, `datetime`, `role`) VALUES
(4, 'iqra', 'ilyas', 'pakistan', 'alamna', 'karachi', 'iqra@gmail.com', 'aptech', '0343545435', '123', '2022-11-12 13:56:21', 0),
(5, 'iqra', 'ilyas', 'pakistan', 'alamna', 'karachi', 'iqrailyas@gmail.com', 'aptech', '0343545435', '1234', '2022-11-12 13:56:21', 1),
(6, 'aqsa', 'ilyas', 'pakistan', 'alamna', 'karachi', 'aqsailyas@gmail.com', 'aptech', '0343545435', '1234', '2022-11-12 13:56:21', 0),
(7, 'maria', 'admin', 'pakistan', 'sec11a', 'karachi', 'maria@gmail.com', 'aptech', '986546597', 'admin', '2022-11-15 17:18:16', 1),
(8, 'jenny', 'jennifer', 'pakistan', 'karachi', 'karachi', 'jenny@gmail.com', 'aptech', '4785748', 'admin', '2022-11-15 17:18:16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jewelery_products`
--
ALTER TABLE `jewelery_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jew_sub_id` (`jew_sub_id`);

--
-- Indexes for table `jewelery_sub`
--
ALTER TABLE `jewelery_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makeup_category`
--
ALTER TABLE `makeup_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makeup_products`
--
ALTER TABLE `makeup_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mk_cat_id` (`mk_cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `j_id` (`j_id`);

--
-- Indexes for table `registration_tb`
--
ALTER TABLE `registration_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jewelery_products`
--
ALTER TABLE `jewelery_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `jewelery_sub`
--
ALTER TABLE `jewelery_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `makeup_category`
--
ALTER TABLE `makeup_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `makeup_products`
--
ALTER TABLE `makeup_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `registration_tb`
--
ALTER TABLE `registration_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jewelery_products`
--
ALTER TABLE `jewelery_products`
  ADD CONSTRAINT `jewelery_products_ibfk_1` FOREIGN KEY (`jew_sub_id`) REFERENCES `jewelery_sub` (`id`);

--
-- Constraints for table `makeup_products`
--
ALTER TABLE `makeup_products`
  ADD CONSTRAINT `makeup_products_ibfk_1` FOREIGN KEY (`mk_cat_id`) REFERENCES `makeup_category` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration_tb` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`m_id`) REFERENCES `makeup_products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_4` FOREIGN KEY (`j_id`) REFERENCES `jewelery_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
