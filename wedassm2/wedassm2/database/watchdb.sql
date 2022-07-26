-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 26, 2020 lúc 01:49 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `watchdb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Singapore'),
(4, 'Austria'),
(5, 'China'),
(6, 'Japan'),
(7, '	 Switzerland'),
(8, 'Vietnam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(5, 'admin', '6cf1fb395f25cb27fa8edfd4ccfca189'),
(7, 'hoang', '6cf1fb395f25cb27fa8edfd4ccfca189');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `watch`
--

CREATE TABLE `watch` (
  `watch_id` int(11) NOT NULL,
  `watch_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `watch_amount` int(50) NOT NULL,
  `watch_price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `watch_year` int(11) NOT NULL,
  `watch_brand` int(11) NOT NULL,
  `watch_image` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `watch`
--

INSERT INTO `watch` (`watch_id`, `watch_name`, `watch_amount`, `watch_price`, `watch_year`, `watch_brand`, `watch_image`) VALUES
(20, 'AG-L5002 G-MOP-L', 10, '4.220.000', 2019, 1, 'unnamed.png'),
(21, 'PA5001A', 5, '9.694.000', 2018, 4, 'PA5001A.png'),
(23, 'DM6305B5', 3, '3.850.000', 2019, 5, '344942409_6305b5.png'),
(24, 'CT-NH8350-08A', 10, '4.990.000', 2019, 5, 'citizen.png'),
(25, 'EQB-510D-1ADR', 9, '12.308.000', 2019, 6, 'casio1.png'),
(26, 'AT-61352.45.21', 4, '9.980.000', 2018, 7, 'AT-61352.45.21.png'),
(27, 'PA5002E', 6, '11.359.000', 2020, 4, 'PA5002E.png'),
(28, 'DM3645B5IG-R', 15, '4.080.000', 2019, 5, 'DM3645B5IG-R.png'),
(29, 'AG-G101 G-BU', 8, '5.472.500', 2019, 8, 'AG-G101.png'),
(30, 'CT-BI1054-55A', 8, '3.420.000', 2019, 6, 'CT-BI1054-55A.png'),
(31, 'PA5003B', 10, '11.007.000', 2018, 4, 'PA5003B.png'),
(32, 'MTS-100D-1AV', 10, '1.970.000', 2019, 6, 'MTS-100D-1AV.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `watch`
--
ALTER TABLE `watch`
  ADD PRIMARY KEY (`watch_id`),
  ADD KEY `student_class` (`watch_brand`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `watch`
--
ALTER TABLE `watch`
  MODIFY `watch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `watch`
--
ALTER TABLE `watch`
  ADD CONSTRAINT `watch_ibfk_1` FOREIGN KEY (`watch_brand`) REFERENCES `brand` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
