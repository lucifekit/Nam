-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2016 at 11:40 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsv`
--

-- --------------------------------------------------------

--
-- Table structure for table `dmsanpham`
--

CREATE TABLE `dmsanpham` (
  `id_dm` int(10) NOT NULL,
  `ten_dm` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmsanpham`
--

INSERT INTO `dmsanpham` (`id_dm`, `ten_dm`) VALUES
(1, 'Masstel'),
(2, 'Mobiistar'),
(3, 'Zono'),
(4, 'Lenovo'),
(5, 'HTC'),
(6, 'FPT'),
(7, 'Blackberry'),
(8, 'Bavapen'),
(9, 'Philips'),
(10, 'Archos'),
(11, 'Mobiado'),
(12, 'Vertu'),
(13, 'QMobile');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `kh_id` int(11) NOT NULL,
  `kh_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kh_quanly` int(11) NOT NULL,
  `kh_thongtin` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`kh_id`, `kh_name`, `kh_quanly`, `kh_thongtin`) VALUES
(5, 'khach hang 1', 1, '123'),
(6, 'test', 2, '123'),
(7, 'Đức Huy ', 1, 'Hải Dương');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang_gia`
--

CREATE TABLE `khachhang_gia` (
  `kg_id` int(11) NOT NULL,
  `kg_khachhang` int(11) NOT NULL,
  `kg_sanpham` int(11) NOT NULL,
  `kg_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang_gia`
--

INSERT INTO `khachhang_gia` (`kg_id`, `kg_khachhang`, `kg_sanpham`, `kg_gia`) VALUES
(1, 3, 1, 1),
(2, 3, 2, 1),
(3, 3, 3, 1),
(4, 3, 4, 1),
(5, 3, 5, 1),
(6, 3, 6, 1),
(7, 3, 7, 1),
(8, 3, 8, 1),
(9, 3, 9, 1),
(10, 3, 10, 1),
(11, 3, 11, 1),
(12, 3, 12, 1),
(13, 3, 13, 1),
(14, 3, 14, 1),
(15, 3, 15, 1),
(16, 3, 16, 1),
(17, 3, 17, 1),
(18, 3, 18, 1),
(19, 3, 19, 1),
(20, 3, 20, 1),
(21, 3, 21, 1),
(22, 3, 22, 1),
(23, 3, 23, 1),
(24, 3, 24, 1),
(25, 3, 25, 1),
(26, 3, 26, 1),
(27, 3, 27, 1),
(28, 3, 28, 2),
(29, 3, 29, 2),
(30, 3, 30, 2),
(31, 3, 31, 2),
(32, 3, 32, 2),
(33, 3, 33, 1),
(34, 3, 34, 1),
(35, 3, 35, 1),
(36, 3, 36, 1),
(37, 3, 37, 1),
(38, 4, 1, 1),
(39, 4, 2, 1),
(40, 4, 3, 1),
(41, 4, 4, 1),
(42, 4, 5, 1),
(43, 4, 6, 1),
(44, 4, 7, 1),
(45, 4, 8, 1),
(46, 4, 9, 1),
(47, 4, 10, 1),
(48, 4, 11, 1),
(49, 4, 12, 1),
(50, 4, 13, 1),
(51, 4, 14, 1),
(52, 4, 15, 1),
(53, 4, 16, 1),
(54, 4, 17, 1),
(55, 4, 18, 1),
(56, 4, 19, 1),
(57, 4, 20, 1),
(58, 4, 21, 1),
(59, 4, 22, 1),
(60, 4, 23, 1),
(61, 4, 24, 1),
(62, 4, 25, 1),
(63, 4, 26, 1),
(64, 4, 27, 1),
(65, 4, 28, 1),
(66, 4, 29, 1),
(67, 4, 30, 1),
(68, 4, 31, 1),
(69, 4, 32, 1),
(70, 4, 33, 1),
(71, 4, 34, 1),
(72, 4, 35, 1),
(73, 4, 36, 1),
(74, 4, 37, 1),
(75, 5, 1, 2),
(76, 5, 2, 2),
(77, 5, 3, 2),
(78, 5, 4, 2),
(79, 5, 5, 2),
(80, 5, 6, 1),
(81, 5, 7, 1),
(82, 5, 8, 1),
(83, 5, 9, 1),
(84, 5, 10, 1),
(85, 5, 11, 1),
(86, 5, 12, 1),
(87, 5, 13, 1),
(88, 5, 14, 1),
(89, 5, 15, 1),
(90, 5, 16, 1),
(91, 5, 32, 1),
(92, 5, 17, 3),
(93, 5, 18, 3),
(94, 5, 19, 3),
(95, 5, 20, 3),
(96, 5, 21, 3),
(97, 5, 22, 3),
(98, 5, 23, 1),
(99, 5, 24, 1),
(100, 5, 25, 1),
(101, 5, 26, 1),
(102, 5, 27, 1),
(103, 5, 28, 2),
(104, 5, 29, 2),
(105, 5, 30, 2),
(106, 5, 31, 2),
(107, 5, 33, 1),
(108, 5, 34, 1),
(109, 5, 35, 1),
(110, 5, 36, 1),
(111, 5, 37, 1),
(112, 6, 1, 3),
(113, 6, 2, 3),
(114, 6, 3, 3),
(115, 6, 4, 3),
(116, 6, 5, 3),
(117, 6, 6, 2),
(118, 6, 7, 2),
(119, 6, 8, 2),
(120, 6, 9, 2),
(121, 6, 10, 2),
(122, 6, 11, 2),
(123, 6, 12, 2),
(124, 6, 13, 2),
(125, 6, 14, 2),
(126, 6, 15, 2),
(127, 6, 16, 2),
(128, 6, 32, 2),
(129, 6, 17, 1),
(130, 6, 18, 1),
(131, 6, 19, 1),
(132, 6, 20, 1),
(133, 6, 21, 1),
(134, 6, 22, 1),
(135, 6, 23, 2),
(136, 6, 24, 2),
(137, 6, 25, 2),
(138, 6, 26, 2),
(139, 6, 27, 2),
(140, 6, 28, 1),
(141, 6, 29, 1),
(142, 6, 30, 1),
(143, 6, 31, 1),
(144, 6, 33, 1),
(145, 6, 34, 1),
(146, 6, 35, 1),
(147, 6, 36, 1),
(148, 6, 37, 1),
(149, 7, 1, 1),
(150, 7, 2, 1),
(151, 7, 3, 1),
(152, 7, 4, 1),
(153, 7, 5, 1),
(154, 7, 6, 1),
(155, 7, 7, 1),
(156, 7, 8, 1),
(157, 7, 9, 1),
(158, 7, 10, 1),
(159, 7, 11, 1),
(160, 7, 12, 3),
(161, 7, 13, 3),
(162, 7, 14, 3),
(163, 7, 15, 3),
(164, 7, 16, 3),
(165, 7, 32, 3),
(166, 7, 17, 1),
(167, 7, 18, 1),
(168, 7, 19, 1),
(169, 7, 20, 1),
(170, 7, 21, 1),
(171, 7, 22, 1),
(172, 7, 23, 1),
(173, 7, 24, 1),
(174, 7, 25, 1),
(175, 7, 26, 1),
(176, 7, 27, 1),
(177, 7, 28, 1),
(178, 7, 29, 1),
(179, 7, 30, 1),
(180, 7, 31, 1),
(181, 7, 33, 1),
(182, 7, 34, 1),
(183, 7, 35, 1),
(184, 7, 36, 1),
(185, 7, 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(10) NOT NULL,
  `id_dm` int(10) NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anh_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia_sp` int(10) NOT NULL,
  `gia_sp_2` int(11) NOT NULL,
  `gia_sp_3` int(11) NOT NULL,
  `gia_sp_4` int(11) NOT NULL,
  `gia_sp_5` int(11) NOT NULL,
  `bao_hanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phu_kien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tinh_trang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyen_mai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT '1',
  `is_new` tinyint(4) NOT NULL DEFAULT '0',
  `dac_biet` int(1) NOT NULL,
  `chi_tiet_sp` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `id_dm`, `ten_sp`, `anh_sp`, `gia_sp`, `gia_sp_2`, `gia_sp_3`, `gia_sp_4`, `gia_sp_5`, `bao_hanh`, `phu_kien`, `tinh_trang`, `khuyen_mai`, `trang_thai`, `is_new`, `dac_biet`, `chi_tiet_sp`) VALUES
(1, 1, 'IPhone 3GS 32G Màu Đen', 'IPhone-3GS-32G-Mau-Den.jpg', 123456, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 0, 0, 1, '<p>Tất cả c&aacute;c sản phẩm Điện thoại của Vietpro Mobile Shop đều l&agrave; c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, được bảo h&agrave;nh 12 th&aacute;ng tr&ecirc;n to&agrave;n quốc.</p>'),
(2, 1, 'iPhone 4 16G Quốc Tế Trắng', 'iPhone-4-16G-Quoc-Te-Trang.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(3, 1, 'iPhone 5 16GB Quốc Tế Đen', 'iPhone-5-16GB-Quoc-Te-Den.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(4, 1, 'iPhone 5C 16GB Blue', 'iPhone-5C-16GB-Blue.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 1, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(5, 1, 'iPhone 5S 32GB Quốc tế Màu Trắng', 'iPhone-5S-32GB-Quoc-te-Mau-Trang.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(6, 2, 'Samsung Galaxy Note N7000 pink', 'Sam-Galaxy-Note-N7000-pink.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(7, 2, 'Samsung Galaxy Note 2 đen', 'samsung-galaxy-note-2-den.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(8, 2, 'Samsung Galaxy Note 3', 'samsung-galaxy-note-3.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(9, 2, 'Samsung Galaxy S2', 'samsung-galaxy-s2.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(10, 2, 'Samsung Galaxy S3', 'samsung-galaxy-s3.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(11, 2, 'Samsung Galaxy S4', 'samsung-galaxy-s4-galaxy.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(12, 3, 'Sony Arc S (LT18i) Trắng', 'Sony-arc-S-LT18i-Trang.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(13, 3, 'Sony Arc S', 'Sony-Arc-S.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(14, 3, 'Sony X10', 'sony-x10.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(15, 3, 'Sony Xperia TX (LT29i) Đen', 'Sony-Xperia-TX-LT29i-Den.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(16, 3, 'Sony Xperia Z Màu Đen', 'Sony-Xperia-Z-Mau-Den.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(17, 4, 'LG F160 Optimus LTE 2', 'LG-F160-Optimus-LTE-2.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(18, 4, 'LG LTE 3 (LG F260)', 'LG-LTE-3-LG F260.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(19, 4, 'LG Optimus 2X SU660', 'LG-optimus-2x-SU660.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(20, 4, 'LG Optimus 3D SU760', 'LG-Optimus-3D-SU760.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(21, 4, 'LG Optimus G', 'LG-Optimus-G.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(22, 4, 'LG Optimus L7(LG P705)', 'LG-Optimus-L7LG P705.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(23, 5, 'HTC EVO 3D', 'HTC-EVO-3D.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(24, 5, 'HTC One Đen 16GB công ty FPT', 'HTC-One-Den-16GB-cong-ty-FPT.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(25, 5, 'HTC One Trắng 16GB công ty FPT', 'HTC-One-Trang-16GB-cong-ty-FPT.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(26, 5, 'HTC one x white', 'htc-one-x-white.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(27, 5, 'HTC Windows Phone 8S', 'HTC-Windows-Phone-8S.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(28, 6, 'Lumia 800 đen', 'lumia-800-den.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(29, 6, 'Lumia 900 trắng', 'lumia-900-trang.jpg', 8600000, 696969, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(30, 6, 'Lumia 920 hồng', 'lumia-920-hong.jpg', 9000000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, '<p>Tất cả c&aacute;c sản phẩm Điện thoại của Vietpro Mobile Shop đều l&agrave; c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, được bảo h&agrave;nh 12 th&aacute;ng tr&ecirc;n to&agrave;n quốc.</p>'),
(31, 6, 'Lumia 800 mau trắng', 'lumia-800-mau-trang.jpeg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(32, 3, 'Nokia 8800 Sirocco Gold', 'Nokia-8800-Sirocco-Gold.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, '<p>Tất cả c&aacute;c sản phẩm đều l&agrave; c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, được bảo h&agrave;nh 12 th&aacute;ng tr&ecirc;n to&agrave;n quốc.</p>'),
(33, 7, 'Blackberry 8820', 'Blackberry-8820.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, '<p>Tất cả c&aacute;c sản phẩm đều l&agrave; c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, được bảo h&agrave;nh 12 th&aacute;ng tr&ecirc;n to&agrave;n quốc.</p>'),
(34, 7, 'Blackberry 8830', 'Blackberry-8830.jpeg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, '<p>Tất cả c&aacute;c sản phẩm Điện thoại đều l&agrave; c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, được bảo h&agrave;nh 12 th&aacute;ng tr&ecirc;n to&agrave;n quốc.</p>'),
(35, 7, 'Blackberry Bold 9000', 'Blackberry-Bold-9000.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, '<p>Tất cả c&aacute;c sản phẩm Điện thoại đều l&agrave; c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, được bảo h&agrave;nh 12 th&aacute;ng tr&ecirc;n to&agrave;n quốc.</p>'),
(36, 7, 'BlackBerry Bold 9700', 'BlackBerry-Bold-9700.jpg', 8600000, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, '<p>M&agrave;n h&igrave;nh: 5'', cpu: l&otilde;i tứ</p>'),
(37, 7, 'BlackBerry Curve 3G 9300', 'BlackBerry-Curve-3G-9300.jpg', 12345, 8600000, 8600000, 0, 0, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 1, 0, 1, '<p>Tất cả c&aacute;c sản phẩm Điện thoại của đều l&agrave; c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, được bảo h&agrave;nh 12 th&aacute;ng tr&ecirc;n to&agrave;n quốc.</p>'),
(38, 1, 'N660', 'a105 (1).png', 1990000, 0, 0, 0, 0, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Ốp lưng', 1, 0, 1, '<p>HD 5.5&quot;, pin 2200mAh</p>');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id_thanhvien` int(10) NOT NULL,
  `tai_khoan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen_truy_cap` int(1) NOT NULL,
  `disable` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`id_thanhvien`, `tai_khoan`, `mat_khau`, `quyen_truy_cap`, `disable`) VALUES
(1, 'admin', 'admin', 2, 0),
(2, 'nam_it', '123456', 1, 1),
(3, 'phong', '12345', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dmsanpham`
--
ALTER TABLE `dmsanpham`
  ADD PRIMARY KEY (`id_dm`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`kh_id`);

--
-- Indexes for table `khachhang_gia`
--
ALTER TABLE `khachhang_gia`
  ADD PRIMARY KEY (`kg_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id_thanhvien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dmsanpham`
--
ALTER TABLE `dmsanpham`
  MODIFY `id_dm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `kh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `khachhang_gia`
--
ALTER TABLE `khachhang_gia`
  MODIFY `kg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id_thanhvien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
