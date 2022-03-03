-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 12:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(4) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `parent_id` tinyint(4) DEFAULT NULL,
  `sort_order` tinyint(4) DEFAULT NULL,
  `picture` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `site_title`, `meta_desc`, `meta_key`, `parent_id`, `sort_order`, `picture`) VALUES
(1, 'Loài Hoa', '', '', 'loai-hoa', 0, 0, '2022/02/11/11gna31d6_hoa.jpg'),
(2, 'Phong Cảnh', NULL, NULL, 'phong-canh', 0, 1, '2022/02/21/c5AhBcB72_phong_canh.png'),
(3, 'Hoa Hồng', 'Tranh Hoa Hồng', NULL, 'tranh-hoa-hong', 1, 1, NULL),
(4, 'Hoa Sen', NULL, NULL, 'tranh-hoa-sen', 1, 2, NULL),
(5, 'Hoa Lan', NULL, NULL, 'hoa-lan', 1, 0, NULL),
(6, 'Hoa Cúc', NULL, NULL, 'hoa-cuc', 1, 0, NULL),
(7, 'Hoa TuLip', NULL, NULL, 'hoa-tulip', 1, 0, NULL),
(8, 'Hướng Dương', NULL, NULL, 'huong-duong', 1, 0, ''),
(9, 'Mẫu Đơn', NULL, NULL, 'mau-don', 1, 0, ''),
(13, 'Tranh Hoa Đào', NULL, NULL, 'tranh-hoa-dao', 1, 0, ''),
(14, 'HOA SỮA', NULL, NULL, 'hoa-sua', 1, 0, 'picturebase.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` tinyint(4) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cat_id` tinyint(4) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `discount` decimal(10,0) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `image_list` text DEFAULT NULL,
  `view` tinyint(4) DEFAULT 0,
  `slug` varchar(100) DEFAULT NULL,
  `buy` tinyint(4) DEFAULT 0,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `cat_id`, `price`, `content`, `discount`, `image`, `image_list`, `view`, `slug`, `buy`, `created`) VALUES
(4, 'Bộ ba Tranh Trái Tim Tình yêu', 3, '1090000', 'Bộ ba Tranh Trái Tim Tình yêu dành cho đôi lứa tuyệt đẹp', '0', '2022/02/18/hac555997_bo_ba_hoa_hong_trai_timx300.jpg', '2022/02/18/7492g4733_bo_ba_hoa_hong_trai_timx500.jpg', 0, 'bo-ba-tranh-trai-tim-tinh-yeu', 0, '2022-02-18'),
(5, 'Tranh Hoa Sen trắng VZ232', 4, '1340000', 'Tranh Hoa Sen trắng tuyệt đẹp', '0', '2022/02/18/6g9604891_tranh-hoa-sen-trang-VZ23210011589_360x.jpg', '2022/02/18/AB698667h_tranh-hoa-sen-trang-VZ23210011589_576x.jpg,2022/02/18/6d490b5n7_tranh-hoa-sen-trang-VZ23210011589_576x1.jpg', 0, 'tranh-hoa-sen-trang-vz232', 0, '2022-02-18'),
(6, 'Tranh Đầm Hoa Sen - VR201', 4, '1030000', '', '100000', '2022/02/18/54d3c6db3_tranh-dam-hoa-sen-VR20110227901_288x.jpg', '2022/02/18/h29b16408_tranh-dam-hoa-sen-VR20110227901_720x.jpg,2022/02/18/b60858b5g_tranh-dam-hoa-sen-VR20110227901_720x1.jpg', 0, 'tranh-dam-hoa-sen-vr201', 0, '2022-02-18'),
(7, 'Tranh Bông Hoa Hướng Dương - VR279', 8, '1350000', '', '0', '2022/02/18/gAn5d1Bag_tranh-bong-hoa-huong-duong-VR279-10236600_360x.jpg', '2022/02/18/nAb64b04A_tranh-bong-hoa-huong-duong-VR279-10236600_576x.jpg,2022/02/18/20cBa8h16_tranh-bong-hoa-huong-duong-VR279-10236600_576x1.jpg', 0, 'tranh-bong-hoa-huong-duong-vr279', 0, '2022-02-18'),
(8, 'Bộ 5 Tranh Những Chậu Hoa Lan - VV339', 5, '1260000', '', '0', '2022/02/18/agh33A2a8_bo_5_tranh_nhung_chau_hoa_lan-10064678_288x.jpg', '2022/02/18/d9n5520h4_bo_5_tranh_nhung_chau_hoa_lan-10064678.jpg,2022/02/18/A8hA03dgd_bo_5_tranh_nhung_chau_hoa_lan-10064678_288x1.jpg', 0, 'bo-5-tranh-nhung-chau-hoa-lan-vv339', 0, '2022-02-18'),
(9, 'Tranh Sơn Dầu Phong Cảnh Thu Vàng - SH150', 2, '3900000', '', '0', '2022/02/18/c3273hAan_tranh_son_dau_thu_vang_SH150_360x.jpg', '2022/02/18/b3Bb2nB0g_tranh_son_dau_thu_vang_SH150_750x.jpg,2022/02/18/2dc8ac16A_tranh_son_dau_thu_vang_SH150_750x1.jpg', 0, 'tranh-son-dau-phong-canh-thu-vang-sh150', 0, '2022-02-18'),
(10, 'Tranh Sơn Dầu Vệt Nắng - SH119', 2, '3900000', '', '0', '2022/02/18/4532274c5_son_dau_small.jpg', '2022/02/18/1ha0d8nh4_IMG_1336_1500x.jpg,2022/02/18/dc89569h8_IMG_1336_1500x_1.jpg', 0, 'tranh-son-dau-vet-nang-sh119', 0, '2022-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(4) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`) VALUES
(1, 'admin', 'admin123', 'admin@gmail.com', 'AnhVu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
