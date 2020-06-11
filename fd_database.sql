-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 11, 2020 lúc 10:44 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan_php_dienmay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `barnd_id` int(11) NOT NULL,
  `brand_name` varchar(45) DEFAULT NULL,
  `brand_img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`barnd_id`, `brand_name`, `brand_img`) VALUES
(1, 'Samsung', NULL),
(2, 'Toshiba', NULL),
(3, 'LG', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Tivi'),
(2, 'Máy Giặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `brands_barnd_id` int(11) NOT NULL,
  `categories_category_id` int(11) NOT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_quantity` varchar(45) DEFAULT NULL,
  `product_danhgia` float DEFAULT NULL,
  `product_image` varchar(200) DEFAULT NULL,
  `product_baohanh` int(11) DEFAULT NULL,
  `product_noisx` varchar(45) DEFAULT NULL,
  `product_tienich` varchar(200) DEFAULT NULL,
  `product_congsuat` varchar(45) DEFAULT NULL,
  `product_kichthuoc` varchar(45) DEFAULT NULL,
  `product_khoiluong` varchar(45) DEFAULT NULL,
  `product_tietkiendien` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `brands_barnd_id`, `categories_category_id`, `product_price`, `product_quantity`, `product_danhgia`, `product_image`, `product_baohanh`, `product_noisx`, `product_tienich`, `product_congsuat`, `product_kichthuoc`, `product_khoiluong`, `product_tietkiendien`) VALUES
(1, 'tivi 1', 3, 1, 200000, '200', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'máy giặt 1', 1, 2, 1200000, '20', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'máy giặt 2', 2, 2, 4232000, '0', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'tivi 2', 1, 1, 1323000, '4', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'abc', 2, 1, 0, '', 0, '', 0, '', '', '', '', '', ''),
(6, 'abc', 2, 1, 0, '', 0, '', 0, '', '', '', '', '', ''),
(7, 'abc', 2, 1, 0, '', 0, '', 0, '', '', '', '', '', ''),
(8, 'abc', 2, 1, 0, '', 0, '', 0, '', '', '', '', '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`barnd_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_products_categories_idx` (`categories_category_id`),
  ADD KEY `fk_products_brands1_idx` (`brands_barnd_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `barnd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_brands1` FOREIGN KEY (`brands_barnd_id`) REFERENCES `brands` (`barnd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`categories_category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
