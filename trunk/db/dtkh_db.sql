-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2012 at 10:40 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dtkh_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `id_duong_phuong`
--

CREATE TABLE IF NOT EXISTS `id_duong_phuong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_duong` int(11) DEFAULT NULL,
  `id_phuong` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_account`
--

CREATE TABLE IF NOT EXISTS `tb_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `avartar` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `registerdate` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_account`
--

INSERT INTO `tb_account` (`id`, `firstname`, `lastname`, `birthday`, `address`, `phone`, `avartar`, `email`, `username`, `password`, `registerdate`, `updated`, `role`, `status`) VALUES
(1, 'Chung', 'Nguyen', '2012-03-24 00:00:00', 'Hải Dương', '111111111111111111', '111111111111111111', 'nhchung.it@gmail.com', 'nhchung', '2441990', '2012-03-29 00:00:00', '2012-03-21 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_baothongtinsai`
--

CREATE TABLE IF NOT EXISTS `tb_baothongtinsai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idroom` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `status` int(11) NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_baothongtinsai`
--

INSERT INTO `tb_baothongtinsai` (`id`, `idroom`, `name`, `email`, `text`, `status`, `updated`) VALUES
(1, 22, '127.0.0.1', '', '', 1, '2042-01-20 00:00:00'),
(2, 22, 'dsdsd', 'dsdsdsd', 'sdsdsdsd', 1, '2042-01-20 00:00:00'),
(3, 23, 'dsd', 'sdsds', 'dsdsds', 1, '2042-01-20 00:00:00'),
(4, 22, 'dsds', 'dsds', 'dsdsds', 1, '2042-01-20 00:00:00'),
(5, 22, 'dsd', 'sdsd', 'sdsdsd', 1, '2042-01-20 00:00:00'),
(6, 28, 'Nguyễn Hữu Chung', 'thienphuc1410@gmail.com', 'Đây là thông tin sai sự thật về Phòng trọ', 1, '2042-01-20 00:00:00'),
(7, 22, 'dsd', 'sdsds', 'dsdsds', 1, '2042-01-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE IF NOT EXISTS `tb_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idroom` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_comment`
--

INSERT INTO `tb_comment` (`id`, `idroom`, `title`, `content`, `name`, `email`, `updated`, `status`) VALUES
(7, 28, 'dsds', 'dsds', 'dsd', 'dsds', '2042-01-20 00:00:00', 0),
(8, 28, 'dsds', 'dsds', 'dsd', 'dsds', '2042-01-20 00:00:00', 0),
(9, 28, 'dsds', 'dsds', 'dsd', 'dsds', '2042-01-20 00:00:00', 0),
(10, 28, 'dsds', 'dsds', 'dsd', 'dsds', '2042-01-20 00:00:00', 0),
(11, 28, 'dsds', 'dsds', 'dsd', 'dsds', '2042-01-20 00:00:00', 0),
(12, 28, 'dsds', 'dsds', 'dsd333', 'dsds', '2042-01-20 00:00:00', 0),
(13, 23, 'dsds', 'sdsd', 'đsd', 'dsds', '2062-01-25 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_duong`
--

CREATE TABLE IF NOT EXISTS `tb_duong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tb_duong`
--

INSERT INTO `tb_duong` (`id`, `name`, `order`, `updated`, `status`) VALUES
(11, 'Văn Cao', 0, '0000-00-00 00:00:00', 1),
(13, 'Phan Chu Trinh', 0, '2032-01-21 00:00:00', 1),
(14, 'Hoàng Quốc Việt', 0, '2032-01-21 00:00:00', 1),
(15, 'Lê Lợi', 0, '2032-01-21 00:00:00', 1),
(16, 'Phan Huy Trứ', 0, '2032-01-21 00:00:00', 1),
(17, 'An Cựu', 0, '2032-01-21 00:00:00', 1),
(18, 'An Hòa', 0, '2032-01-21 00:00:00', 1),
(19, 'Hải Triều', 0, '2032-01-21 00:00:00', 1),
(21, 'Hùng Vương', 0, '2032-01-21 00:00:00', 1),
(22, 'Phan Chu Trinh', 0, '2032-01-21 00:00:00', 1),
(23, 'Bà triệu', 0, '2032-01-22 00:00:00', 1),
(24, 'Đặng Văn Ngữ', 0, '2032-01-22 00:00:00', 1),
(25, 'Nguyễn Đức Tịnh', 0, '2032-01-22 00:00:00', 1),
(26, 'An Dương Vương', 0, '2032-01-22 00:00:00', 1),
(27, 'Lương Văn Can', 0, '2032-01-22 00:00:00', 1),
(28, 'Ngự Bình', 0, '2032-01-22 00:00:00', 1),
(29, 'Phan Đình Phùng', 0, '2032-01-22 00:00:00', 1),
(30, 'Nguyễn Huệ', 0, '2032-01-22 00:00:00', 1),
(31, 'Duy Tân', 0, '2032-01-22 00:00:00', 1),
(32, 'Trần Phú', 0, '2032-01-22 00:00:00', 1),
(33, 'Đống Đa', 0, '2032-01-22 00:00:00', 1),
(34, 'Trần Quang Khải', 0, '2032-01-22 00:00:00', 1),
(35, 'Hoàng Quốc Việt', 0, '2032-01-22 00:00:00', 1),
(36, 'Trần Quang Khải', 0, '2032-01-22 00:00:00', 1),
(37, 'Hàn Mặc Tử', 0, '2032-01-22 00:00:00', 1),
(38, 'Nguyễn Lộ Trạch', 0, '2032-01-22 00:00:00', 1),
(39, 'Nguyễn Công Trứ', 0, '2032-01-22 00:00:00', 1),
(40, 'Dương Văn An', 0, '2032-01-22 00:00:00', 1),
(41, 'Chu Văn An', 0, '2032-01-22 00:00:00', 1),
(42, 'Lê Thánh Tôn', 0, '2032-01-22 00:00:00', 1),
(43, 'Nguyễn Sinh Cung', 0, '2032-01-22 00:00:00', 1),
(44, 'Hoàng Diệu', 0, '2032-01-22 00:00:00', 1),
(45, 'Ngô Thời Nhậm', 0, '2032-01-22 00:00:00', 1),
(46, 'Lý Thường Kiệt', 0, '2032-01-22 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_like_room`
--

CREATE TABLE IF NOT EXISTS `tb_like_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `mark` int(11) DEFAULT NULL,
  `id_room` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_like_room`
--

INSERT INTO `tb_like_room` (`id`, `name`, `mark`, `id_room`, `email`) VALUES
(1, 'Chung Nguyễn', 4, 22, 'nhchung.it@gmail.com'),
(2, 'Nguyễn Hữu Chung', 4, 22, 'nhchung.it@gmail.com'),
(3, 'Nguyễn Hữu Chung', 3, 22, 'nhchung.it@gmail.com'),
(4, 'Nguyễn Hữu Chung', 4, 22, 'nhchung.it@gmail.com'),
(5, 'Nguyễn Hữu Chung', 4, 22, 'nhchung.it@gmail.com'),
(6, 'Nguyễn Hữu Chung', 4, 22, 'nhchung.it@gmail.com'),
(7, 'Chung Nguyễn', 4, 22, 'nhchung.it@gmail.com'),
(8, 'Chung Nguyễn', 5, 22, 'nhchung.it@gmail.com'),
(9, 'Chung Nguyễn', 5, 24, 'nhchung.it@gmail.com'),
(10, 'Chung Nguyễn', 5, 23, 'nhchung.it@gmail.com'),
(11, 'Chung Nguyễn', 5, 23, 'nhchung.it@gmail.com'),
(12, 'dsds', 4, 22, 'dsdsd'),
(13, 'dsds', 4, 22, 'dsdsd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_phuong`
--

CREATE TABLE IF NOT EXISTS `tb_phuong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tb_phuong`
--

INSERT INTO `tb_phuong` (`id`, `name`, `order`, `updated`, `status`) VALUES
(14, 'An Cựu', 0, '2032-01-21 00:00:00', 1),
(15, 'Hương Sơ', 0, '2032-01-21 00:00:00', 1),
(16, 'Kim Long', 0, '2032-01-21 00:00:00', 1),
(17, 'Phú Bình', 0, '2032-01-21 00:00:00', 1),
(18, 'Phú Cát', 0, '2032-01-21 00:00:00', 1),
(19, 'Phú Hậu', 0, '2032-01-21 00:00:00', 1),
(20, 'Phú Hiệp', 0, '2032-01-21 00:00:00', 1),
(21, 'Phú Hòa', 0, '2032-01-21 00:00:00', 1),
(22, 'Phú Hội', 0, '2032-01-21 00:00:00', 1),
(23, 'Phú Nhuận', 0, '2032-01-21 00:00:00', 1),
(24, 'Phú Thuận', 0, '2032-01-21 00:00:00', 1),
(25, 'Phước Vĩnh', 0, '2032-01-21 00:00:00', 1),
(26, 'Đúc', 0, '2032-01-21 00:00:00', 1),
(27, 'Tây Lộc', 0, '2032-01-21 00:00:00', 1),
(28, 'Thuận Hòa', 0, '2032-01-21 00:00:00', 1),
(29, 'Thuận Lộc', 0, '2032-01-21 00:00:00', 1),
(30, 'Thuận Thành', 0, '2032-01-21 00:00:00', 1),
(31, 'Vĩnh Ninh', 0, '2032-01-21 00:00:00', 1),
(32, 'Trường An', 0, '2032-01-21 00:00:00', 1),
(33, 'Vỹ Dạ', 0, '2032-01-21 00:00:00', 1),
(34, 'Xuân Phú', 0, '2032-01-21 00:00:00', 1),
(36, 'Hương Long', 0, '2032-01-21 00:00:00', 1),
(37, 'Thủy Biều', 0, '2032-01-21 00:00:00', 1),
(38, 'Thủy Xuân', 0, '2032-01-21 00:00:00', 1),
(39, 'Thủy An', 0, '2032-01-21 00:00:00', 1),
(40, 'Phú Hội', 0, '2032-01-22 00:00:00', 1),
(41, 'Vĩ Dạ', 0, '2032-01-22 00:00:00', 1),
(42, 'An Đông', 0, '2032-01-22 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE IF NOT EXISTS `tb_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `name`, `updated`, `status`) VALUES
(1, 'Administrator', '2012-03-24 00:00:00', 1),
(2, 'User', '2012-03-24 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_room`
--

CREATE TABLE IF NOT EXISTS `tb_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `shortdescription` text,
  `description` text,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `new` bit(1) DEFAULT NULL,
  `is_phong_khep_kin` bit(1) DEFAULT NULL,
  `sonha` varchar(255) DEFAULT NULL,
  `kiet` varchar(255) DEFAULT NULL,
  `tongsophong` tinyint(4) DEFAULT NULL,
  `sophongcontrong` tinyint(4) DEFAULT NULL,
  `tenchunha` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `idduong` int(11) NOT NULL,
  `idphuong` int(11) NOT NULL,
  `dt_nha` varchar(45) DEFAULT NULL,
  `dt_didong` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gioi_tinh_thue` int(11) DEFAULT NULL,
  `gia_phong_max` int(11) DEFAULT NULL,
  `gia_phong_min` int(11) DEFAULT NULL,
  `giadien` int(11) DEFAULT NULL,
  `gia_nuoc` int(11) DEFAULT NULL,
  `gan_cho` bit(1) DEFAULT NULL,
  `gan_duong` bit(1) DEFAULT NULL,
  `internet` bit(1) DEFAULT NULL,
  `isGoogleMap` bit(1) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `contentGoogleMap` text,
  `titleGoogleMap` varchar(255) DEFAULT NULL,
  `stick` bit(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `view` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `tb_room`
--

INSERT INTO `tb_room` (`id`, `title`, `shortdescription`, `description`, `anh_dai_dien`, `new`, `is_phong_khep_kin`, `sonha`, `kiet`, `tongsophong`, `sophongcontrong`, `tenchunha`, `address`, `idduong`, `idphuong`, `dt_nha`, `dt_didong`, `email`, `gioi_tinh_thue`, `gia_phong_max`, `gia_phong_min`, `giadien`, `gia_nuoc`, `gan_cho`, `gan_duong`, `internet`, `isGoogleMap`, `longitude`, `latitude`, `contentGoogleMap`, `titleGoogleMap`, `stick`, `order`, `create_by`, `create_date`, `updated_by`, `updated`, `view`, `status`) VALUES
(17, 'Phòng trọ 46A/246 Hùng Vương', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '46A', '246', 8, 1, 'Châu Viết Thống', '46A 246 Hùng Vương An Cựu', 21, 14, ' 0543811263', 'N/A', 'N/A', -1, 1000000, 350000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 46A/246 Hùng Vương', 'Phòng trọ 46A/246 Hùng Vương', '1', 0, 1, '2032-01-21 00:00:00', 0, '2032-01-21 00:00:00', 1, 1),
(20, 'Phòng trọ 5/34 Hải Triều', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '5', '34', 7, 0, 'Trương Minh Khể', '5 34 Hải Triều An Cựu', 19, 14, ' 0543814522', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 5/34 Hải Triều', 'Phòng trọ 5/34 Hải Triều', '1', 0, 1, '2032-01-21 00:00:00', 0, '2032-01-21 00:00:00', 1, 1),
(21, 'Phòng trọ 28/246 Hùng Vương', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '28', '246', 14, 1, ' Thân Trọng Hiến', '28 246 Hùng Vương An Cựu', 21, 14, 'N/A', ' 0905511808', 'N/A', -1, 1000000, 500000, 2, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 28/246 Hùng Vương', 'Phòng trọ 28/246 Hùng Vương', '1', 0, 1, '2032-01-21 00:00:00', 0, '2032-01-21 00:00:00', 0, 1),
(22, 'Phòng trọ 46B/246 Hùng Vương', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '46B', '246', 10, 0, ' Trần Thị Lý Như', '46B 246 Hùng Vương An Cựu', 21, 14, 'N/A', '0979820476', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 46B/246 Hùng Vương', 'Phòng trọ 46B/246 Hùng Vương', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 8, 1),
(23, 'Phòng trọ 31/246 Hùng Vương', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '31', '246', 5, 0, 'Trần Gắng', '31 246 Hùng Vương An Cựu', 21, 14, ' 0543833850', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 31/246 Hùng Vương', 'Phòng trọ 31/246 Hùng Vương', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 4, 1),
(24, 'Phòng trọ 10/350 Phan Chu Trinh', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '10', '350', 5, 1, 'Nguyễn Thị Nghĩa', '10 350 Phan Chu Trinh An Cựu', 13, 14, '0543810656', 'N/A', 'N/A', -1, 1000000, 400000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 10/350 Phan Chu Trinh', 'Phòng trọ 10/350 Phan Chu Trinh', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 4, 1),
(25, 'Phòng trọ 67/187 Hùng Vương', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '67', '187', 3, 0, 'Trần Thị Quy', '67 187 Hùng Vương An Cựu', 21, 14, '0543884186', 'N/A', 'N/A', -1, 1000000, 500000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 67/187 Hùng Vương', 'Phòng trọ 67/187 Hùng Vương', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 1, 1),
(26, 'Phòng trọ 13/187 Hùng Vương', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '13', '187', 3, 2, 'Nguyễn Xuân Dễ', '13 187 Hùng Vương An Cựu', 21, 14, '0543820183', 'N/A', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 13/187 Hùng Vương', 'Phòng trọ 13/187 Hùng Vương', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 2, 1),
(28, 'Phòng trọ 9/16/246 Hùng Vương', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '9/16', '246', 9, 0, 'Trương Thị Túy', '9/16 246 Hùng Vương An Cựu', 21, 14, 'N/A', '0935782929', 'N/A', -1, 1000000, 500000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 9/16/246 Hùng Vương', 'Phòng trọ 9/16/246 Hùng Vương', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 4, 1),
(29, 'Phòng trọ 23/205 Bà Triệu', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '23', '205', 5, 0, 'Ngô Tá Năm', '23 205 Bà triệu An Cựu', 23, 14, '0543810140', 'N/A', 'N/A', -1, 1000000, 500000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 23/205 Bà Triệu', 'Phòng trọ 23/205 Bà Triệu', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(30, 'Phòng trọ 51 Nguyễn Đức Tịnh', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '51', 'N/A', 3, 1, 'Nguyễn Minh', '51 N/A Nguyễn Đức Tịnh An Cựu', 25, 14, 'N/A', ' 0986558759', 'N/A', -1, 1000000, 500000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 51 Nguyễn Đức Tịnh', 'Phòng trọ 51 Nguyễn Đức Tịnh', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(31, ' Phòng trọ 39/111 Đặng Văn Ngữ', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '39', '111', 5, 1, 'Dì Tuyết', '39 111 Đặng Văn Ngữ An Cựu', 24, 14, '0543812088', 'N/A', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', ' Phòng trọ 39/111 Đặng Văn Ngữ', ' Phòng trọ 39/111 Đặng Văn Ngữ', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(32, 'Phòng trọ 37/33 An Dương Vương', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '37', '33', 7, 2, ' Lưu Thị Duyên', '37 33 An Dương Vương An Cựu', 26, 14, '0543848045', 'N/A', 'N/A', -1, 1000000, 350000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 37/33 An Dương Vương', 'Phòng trọ 37/33 An Dương Vương', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(33, 'Phòng trọ 65/33 An Dương Vương', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '65', '33', 4, 0, 'Dương Văn Sa', '65 33 An Dương Vương An Cựu', 26, 14, '0543601096', 'N/A', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 65/33 An Dương Vương', 'Phòng trọ 65/33 An Dương Vương', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(34, 'Phòng trọ 6/336 Phan Chu Trinh', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '6', '336', 4, 1, 'Huỳnh Thuận', '6 336 Phan Chu Trinh An Cựu', 13, 14, 'N/A', '0923069205', 'N/A', -1, 1000000, 500000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 6/336 Phan Chu Trinh', 'Phòng trọ 6/336 Phan Chu Trinh', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(35, 'Phòng trọ 24 Lương Văn Can', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '24', 'N/A', 10, 2, 'Trương Văn Lập', '24 N/A Lương Văn Can An Cựu', 27, 14, 'N/A', '0914490327', 'N/A', -1, 1000000, 350000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 24 Lương Văn Can', 'Phòng trọ 24 Lương Văn Can', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(36, 'Phòng trọ 48/27 Ngự Bình', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '48', '27', 2, 1, ' Lê Thị Phương Thảo', '48 27 Ngự Bình An Cựu', 28, 14, '0543813406', 'N/A', 'N/A', -1, 1000000, 500000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 48/27 Ngự Bình', 'Phòng trọ 48/27 Ngự Bình', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(37, ' Phòng trọ 83/33 An Dương Vương', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '83', '33', 8, 1, 'Phan Thị Nghĩa', '83 33 An Dương Vương An Cựu', 26, 14, '0543811649', 'N/A', 'N/A', -1, 1000000, 450000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', ' Phòng trọ 83/33 An Dương Vương', ' Phòng trọ 83/33 An Dương Vương', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(38, 'Phòng trọ 91/33 An Dương Vương', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '91', '33', 10, 0, 'Ngô Hữu Dữ', '91 33 An Dương Vương An Cựu', 26, 14, '0543824950', 'N/A', 'N/A', -1, 1000000, 500000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 91/33 An Dương Vương', 'Phòng trọ 91/33 An Dương Vương', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(39, ' Phòng trọ 8/5/137 Phan Đình Phùng', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '8/5', '137', 8, 0, 'N/A', '8/5 137 Văn Cao An Cựu', 11, 14, 'N/A', ' 0982069992', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', ' Phòng trọ 8/5/137 Phan Đình Phùng', ' Phòng trọ 8/5/137 Phan Đình Phùng', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(40, 'Phòng trọ 41/266 Phan Chu Trinh', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '41', '266', 7, 0, 'Ngô Viết Vững ', '41 266 Phan Chu Trinh An Cựu', 13, 14, '0543836053', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 41/266 Phan Chu Trinh', 'Phòng trọ 41/266 Phan Chu Trinh', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(41, ' Phòng trọ 21/85 Nguyễn Huệ', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '21', '85', 8, 0, 'La Văn Thọ', '21 85 Nguyễn Huệ An Cựu', 30, 14, '0543823330', 'N/A', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', ' Phòng trọ 21/85 Nguyễn Huệ', ' Phòng trọ 21/85 Nguyễn Huệ', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 1, 1),
(42, 'Phòng trọ 77 Duy Tân', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '77', 'N/A', 7, 0, 'Nguyễn Thị Giàu', '77 N/A Duy Tân An Cựu', 31, 14, '0543848002', 'N/A', 'N/A', -1, 1000000, 400000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 77 Duy Tân', 'Phòng trọ 77 Duy Tân', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(43, 'Phòng trọ 39/81 Nguyễn Huệ', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '39', '81', 5, 0, 'Nguyễn Anh', '39 81 Nguyễn Huệ An Cựu', 30, 14, ' 0543849920', 'N/A', 'N/A', -1, 1000000, 450000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 39/81 Nguyễn Huệ', 'Phòng trọ 39/81 Nguyễn Huệ', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(44, 'Phòng trọ 26A/59 An Dương Vương', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '26A', '59', 8, 0, 'Nguyễn Thị Cẩm Vân', '26A 59 An Dương Vương An Cựu', 26, 14, ' 0543826997', 'N/A', 'N/A', -1, 1000000, 350000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 26A/59 An Dương Vương', 'Phòng trọ 26A/59 An Dương Vương', '0', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(45, 'Phòng trọ 26A/59 An Dương Vương', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '26A', '59', 8, 0, 'Nguyễn Thị Cẩm Vân', '26A 59 An Dương Vương An Cựu', 26, 14, ' 0543826997', 'N/A', 'N/A', -1, 1000000, 350000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 26A/59 An Dương Vương', 'Phòng trọ 26A/59 An Dương Vương', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(46, 'Phòng trọ 20/8/266 Phan Chu Trinh', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '20/8', '266', 4, 0, 'Lê Văn Dũng', '20/8 266 Phan Chu Trinh An Cựu', 13, 14, 'N/A', '0904619923', 'N/A', -1, 1000000, 600000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 20/8/266 Phan Chu Trinh', 'Phòng trọ 20/8/266 Phan Chu Trinh', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 2, 1),
(47, 'Phòng trọ 3/85 Nguyễn Huệ', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '3', '85', 7, 2, 'Tôn Nữ Thị Hạnh', '3 85 Nguyễn Huệ An Cựu', 30, 14, 'N/A', '0986789905', 'N/A', -1, 1200000, 800000, 3000, 3000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 3/85 Nguyễn Huệ', 'Phòng trọ 3/85 Nguyễn Huệ', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 1, 1),
(48, 'Phòng trọ 79 Duy Tân', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '79', 'N/A', 6, 0, 'Nguyễn Ngọc Tân', '79 N/A Duy Tân An Cựu', 31, 14, '0543848614', 'N/A', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 79 Duy Tân', 'Phòng trọ 79 Duy Tân', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(49, ' Phòng trọ 59 Duy Tân', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '59', 'N/A', 8, 0, 'Nguyễn Ngọc Tâm', '59 N/A Duy Tân An Cựu', 31, 14, 'N/A', ' 0914340118', 'N/A', -1, 1000000, 450000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', ' Phòng trọ 59 Duy Tân', ' Phòng trọ 59 Duy Tân', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(50, 'Phòng trọ 59/30 Ngự Bình', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '59', '30', 3, 3, 'Phạm Quang Anh', '59 30 Ngự Bình An Cựu', 28, 14, '0543516301', 'N/A', 'N/A', -1, 450000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 59/30 Ngự Bình', 'Phòng trọ 59/30 Ngự Bình', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(51, 'Phòng trọ 11/99 Duy Tân', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '11', '99', 3, 0, ' Bùi Quang Tri', '11 99 Duy Tân An Cựu', 31, 14, '0543812190', 'N/A', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 11/99 Duy Tân', 'Phòng trọ 11/99 Duy Tân', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(52, 'Phòng trọ 33 Duy Tân', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '33', 'N/A', 8, 0, 'Nguyễn Ngọc Dũng', '33 N/A Duy Tân An Cựu', 31, 14, ' 0543826054', 'N/A', 'N/A', -1, 1000000, 500000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 33 Duy Tân', 'Phòng trọ 33 Duy Tân', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(53, 'Phòng trọ 16/23/131 Trần Phú', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '16/23', '131', 6, 2, ' Võ Văn Hiền', '16/23 131 Trần Phú An Cựu', 32, 14, '0543887553', 'N/A', 'N/A', -1, 1000000, 300000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 16/23/131 Trần Phú', 'Phòng trọ 16/23/131 Trần Phú', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(54, 'Phòng trọ 2/4/107 Duy Tân', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '2/4', '107', 17, 0, 'Lưu Thị Tý', '2/4 107 Duy Tân An Cựu', 31, 14, '0543821035', 'N/A', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 2/4/107 Duy Tân', 'Phòng trọ 2/4/107 Duy Tân', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(55, 'Phòng trọ 7/89 Duy Tân', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '7', '89', 7, 3, 'Hồ Ngọc Hải', '7 89 Duy Tân An Cựu', 31, 14, '0543811283', 'N/A', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 7/89 Duy Tân', 'Phòng trọ 7/89 Duy Tân', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(56, 'Phòng trọ 132 Hải Triều', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '132', 'N/A', 8, 5, 'A. Hùng', '132 N/A Hải Triều An Cựu', 19, 14, 'N/A', ' 0983418161', 'N/A', -1, 500000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 132 Hải Triều', 'Phòng trọ 132 Hải Triều', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 1, 1),
(57, 'Phòng trọ 39 Trần Quang Khải', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '39', 'N/A', 5, 0, 'bác sĩ Tùng', '39 N/A Trần Quang Khải An Cựu', 34, 14, 'N/A', ' 01678789773', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 39 Trần Quang Khải', 'Phòng trọ 39 Trần Quang Khải', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(58, 'Phòng trọ 13/44 Duy Tân', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '13', '44', 3, 0, 'Nguyễn Văn Phú', '13 44 Duy Tân An Cựu', 31, 14, 'N/A', '0906722307', 'N/A', -1, 1000000, 500000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 13/44 Duy Tân', 'Phòng trọ 13/44 Duy Tân', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(59, 'Phòng trọ 59/30 Ngự Bình', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '59', '30', 3, 0, 'Phạm Quang Anh', '59 30 Ngự Bình An Cựu', 28, 14, '0543516301', 'N/A', 'N/A', -1, 450000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 59/30 Ngự Bình', 'Phòng trọ 59/30 Ngự Bình', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(60, 'Phòng trọ 11/99 Duy Tân', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '11', '99', 3, 0, 'Bùi Quang Tri', '11 99 Duy Tân An Cựu', 31, 14, ' 0543812190', 'N', 'N/A', -1, 1000000, 500000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 11/99 Duy Tân', 'Phòng trọ 11/99 Duy Tân', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(62, 'Phòng trọ 15/73 Lương Văn Can', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '15', '73', 1, 1, 'Chú', '15 73 Lương Văn Can An Cựu', 27, 14, 'N/A', 'N/A', 'N/A', -1, 300000, 200000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 15/73 Lương Văn Can', 'Phòng trọ 15/73 Lương Văn Can', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(63, 'Phòng trọ 132 Hải Triều', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '132', 'N/A', 8, 5, 'A. Hùng', '132 N/A Hải Triều An Cựu', 19, 14, 'N/A', '0983418161', 'N/A', -1, 500000, 400000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 132 Hải Triều', 'Phòng trọ 132 Hải Triều', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 1, 1),
(64, 'Phòng trọ 49/7 Bà Triệu', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '49', '7', 6, 2, ' Nguyễn Thị Trinh', '49 7 Bà triệu An Cựu', 23, 14, '0543815313', 'N/A', 'N/A', -1, 500000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 49/7 Bà Triệu', 'Phòng trọ 49/7 Bà Triệu', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(65, 'Phòng trọ 2/48 Trần Quang Khải', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '2', '48', 5, 0, ' Hòa', '2 48 Trần Quang Khải Phú Hội', 34, 22, '', '0905052629', 'N/A', -1, 1000000, 450000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 2/48 Trần Quang Khải', 'Phòng trọ 2/48 Trần Quang Khải', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(66, 'Phòng trọ 5/37 Hàn Mặc Tử', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '5', '37', 4, 0, 'Nguyễn Thị Mão', '5 37 Hàn Mặc Tử Vỹ Dạ', 37, 33, '0543828657', 'N/A', 'N/A', -1, 1000000, 400000, 3000, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 5/37 Hàn Mặc Tử', 'Phòng trọ 5/37 Hàn Mặc Tử', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(67, 'Phòng trọ 5/116 Nguyễn Lộ Trạch', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '5', '116', 5, 0, ' Nguyễn Tất Phúc', '5 116 Nguyễn Lộ Trạch Xuân Phú', 38, 34, 'N/A', ' 01674715887', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 5/116 Nguyễn Lộ Trạch', 'Phòng trọ 5/116 Nguyễn Lộ Trạch', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(68, 'Phòng trọ 5D/1 Văn Cao', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '5D', '1', 13, 0, ' Nguyễn Thị Đạt', '5D 1 Văn Cao Xuân Phú', 11, 34, '0543811775', 'N/A', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 5D/1 Văn Cao', 'Phòng trọ 5D/1 Văn Cao', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(69, 'Phòng trọ 6/14/7 Nguyễn Công Trứ', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '6/17', '4', 15, 0, 'Nguyễn Kim Long', '6/17 4 Nguyễn Công Trứ Phú Hội', 39, 22, ' 0543829978', 'N/A', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 6/14/7 Nguyễn Công Trứ', 'Phòng trọ 6/14/7 Nguyễn Công Trứ', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(70, 'Phòng trọ 6/118 Nguyễn Lộ Trạch', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '6', '118', 7, 0, 'Nguyễn Dương Hoàng Bảo', '6 118 Nguyễn Lộ Trạch Xuân Phú', 38, 34, '0543815331', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 6/118 Nguyễn Lộ Trạch', 'Phòng trọ 6/118 Nguyễn Lộ Trạch', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(71, 'Phòng trọ 13 Trần Quang Khải', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '13', 'N/A', 10, 0, 'Tường Vy', '13 N/A Trần Quang Khải Phú Hội', 36, 22, '0543821547', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 13 Trần Quang Khải', 'Phòng trọ 13 Trần Quang Khải', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(72, 'Phòng trọ 18/03 Nguyễn Công Trứ', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '18', '3', 5, 0, 'Trương Đình Điểm', '18 3 Nguyễn Công Trứ Phú Hội', 39, 22, '0543810908', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 18/03 Nguyễn Công Trứ', 'Phòng trọ 18/03 Nguyễn Công Trứ', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(73, 'Phòng trọ 21/3 Văn Cao', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '21', '3', 4, 0, ' Ngô Văn Thúc', '21 3 Văn Cao Xuân Phú', 11, 34, '0543810144', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 21/3 Văn Cao', 'Phòng trọ 21/3 Văn Cao', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(74, 'Phòng trọ 21 Nguyễn Lộ Trạch', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '21', 'N/A', 5, 2, 'Nguyễn Hữu Minh', '21 N/A Nguyễn Lộ Trạch Xuân Phú', 38, 34, 'N/A', ' 0923054189', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 21 Nguyễn Lộ Trạch', 'Phòng trọ 21 Nguyễn Lộ Trạch', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(75, 'Phòng trọ 22/17 Hàn Mặc Tử', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '22', '17', 11, 0, 'Nguyễn Thị Lan Anh', '22 17 Hàn Mặc Tử Vĩ Dạ', 37, 41, 'N/A', '01658219286', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 22/17 Hàn Mặc Tử', 'Phòng trọ 22/17 Hàn Mặc Tử', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(76, 'Phòng trọ 23/205 Bà Triệu', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '23', '205', 5, 0, ' Ngô Tá Năm', '23 205 Bà triệu Xuân Phú', 23, 34, '0543810140', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 23/205 Bà Triệu', 'Phòng trọ 23/205 Bà Triệu', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(77, 'Phòng trọ 27/37 Hàn Mặc Tử', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '27', '37', 8, 0, 'Lương Văn Rê', '27 37 Hàn Mặc Tử Vĩ Dạ', 37, 41, ' 0543832656', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 27/37 Hàn Mặc Tử', 'Phòng trọ 27/37 Hàn Mặc Tử', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(78, 'Phòng trọ 29/3 Dương Văn An', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '29', '3', 13, 3, 'Trương Đình Vĩ', '29 3 Dương Văn An Xuân Phú', 40, 34, '0543845398', 'N/A', 'N/A', -1, 300000, 250000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 29/3 Dương Văn An', 'Phòng trọ 29/3 Dương Văn An', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(79, 'Phòng trọ 29 Chu Văn An', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '29', '', 6, 1, ' Võ Thanh Nhàn', '29  Chu Văn An Phú Hội', 41, 22, ' 0543833990', 'N/A', 'N/A', -1, 1000000, 300000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 29 Chu Văn An', 'Phòng trọ 29 Chu Văn An', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(80, 'Phòng trọ 33 Bà Triệu', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '33', '', 6, 3, 'Nguyễn Thị Phương', '33  Bà triệu Xuân Phú', 23, 34, ' 0543813749', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 33 Bà Triệu', 'Phòng trọ 33 Bà Triệu', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(81, 'Phòng trọ 41/13 Hàn Mặc Tử', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '41', '13', 9, 0, ' Nguyễn Văn Hợi', '41 13 Hàn Mặc Tử Vỹ Dạ', 37, 33, '0543826775', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 41/13 Hàn Mặc Tử', 'Phòng trọ 41/13 Hàn Mặc Tử', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(82, 'Phòng trọ 42/8 Nguyễn Lộ Trạch', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '42', '8', 10, 0, 'Trần Văn Thạnh', '42 8 Nguyễn Lộ Trạch Xuân Phú', 38, 34, '0543811142', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 42/8 Nguyễn Lộ Trạch', 'Phòng trọ 42/8 Nguyễn Lộ Trạch', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(83, 'Phòng trọ 48/106 Nguyễn Lộ Trạch', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '48', '106', 4, 1, 'N/A', '48 106 Nguyễn Lộ Trạch Xuân Phú', 38, 34, '0543816667', 'N/A', 'N/A', -1, 400000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 48/106 Nguyễn Lộ Trạch', 'Phòng trọ 48/106 Nguyễn Lộ Trạch', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(84, 'Phòng trọ 50A Nguyễn Lộ Trạch', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '50A', '', 16, 0, 'Lê Văn Minh', '50A  Nguyễn Lộ Trạch Xuân Phú', 38, 34, 'N/A', '0987229624', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 50A Nguyễn Lộ Trạch', 'Phòng trọ 50A Nguyễn Lộ Trạch', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 1, 1),
(85, 'Phòng trọ 58/11 Dương Văn An', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '58', '11', 8, 0, ' Nguyễn Trường Sơn', '58 11 Dương Văn An Xuân Phú', 40, 34, 'N/A', '0913420229', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 58/11 Dương Văn An', 'Phòng trọ 58/11 Dương Văn An', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(86, ' Phòng trọ 81/2 Bà Triệu', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '81', '2', 5, 0, 'Mai Xuân Tý', '81 2 Bà triệu Xuân Phú', 23, 34, '0543820582', 'N/A', 'N/A', -1, 1000000, 450000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', ' Phòng trọ 81/2 Bà Triệu', ' Phòng trọ 81/2 Bà Triệu', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(87, 'Phòng trọ 116A Nguyễn Lộ Trạch', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '116A', '', 10, 1, 'Lê Đình Phận', '116A  Nguyễn Lộ Trạch Xuân Phú', 38, 34, 'N/A', ' 01698740122', 'N/A', -1, 1000000, 350000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 116A Nguyễn Lộ Trạch', 'Phòng trọ 116A Nguyễn Lộ Trạch', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(88, 'Phòng trọ o Rơi', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '', '', 1, 1, 'Chế Thị Rơi', '  Hàn Mặc Tử Vỹ Dạ', 37, 33, ' 0543897376', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ o Rơi', 'Phòng trọ o Rơi', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(89, 'Phòng trọ 06/115 Lê Thánh Tôn', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '6', '115', 14, 0, 'Nguyễn Thị Hoa', '6 115 Lê Thánh Tôn Thuận Lộc', 42, 29, 'N/A', '0957242171', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 06/115 Lê Thánh Tôn', 'Phòng trọ 06/115 Lê Thánh Tôn', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(90, 'Phòng trọ 32 Lê Thánh Tôn', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '32', '', 15, 0, 'Lương Toàn', '32  Lê Thánh Tôn Thuận Thành', 42, 30, '0543535948', 'N/A', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 32 Lê Thánh Tôn', 'Phòng trọ 32 Lê Thánh Tôn', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(91, 'Phòng trọ 282 Nguyễn Sinh Cung', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '282', '', 0, 2, '', '282  Nguyễn Sinh Cung Thuận Thành', 43, 30, '0543848503', '01683001070', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 282 Nguyễn Sinh Cung', 'Phòng trọ 282 Nguyễn Sinh Cung', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 1, 1),
(92, 'Phòng trọ 117 Nguyễn Sinh Cung', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '117', '', 9, 0, 'Nguyễn Bá Huy Hào', '117  Nguyễn Sinh Cung Vỹ Dạ', 43, 33, 'N/A', ' 0905829900', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 117 Nguyễn Sinh Cung', 'Phòng trọ 117 Nguyễn Sinh Cung', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(93, 'Phòng trọ 6/138 Nguyễn Sinh Cung', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '6', '138', 4, 0, 'Cô Hương', '6 138 Nguyễn Sinh Cung Vỹ Dạ', 43, 33, '0543845155', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 6/138 Nguyễn Sinh Cung', 'Phòng trọ 6/138 Nguyễn Sinh Cung', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(94, 'Phòng trọ 3/64 Hoàng Diệu', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '3', '64', 8, 0, 'Phan Cảnh Liêm', '3 64 Hoàng Diệu Vỹ Dạ', 44, 33, '0543529932', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 3/64 Hoàng Diệu', 'Phòng trọ 3/64 Hoàng Diệu', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(95, 'Phòng trọ 12 Ngô Thời Nhậm', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '12', '', 3, 2, '', '12  Ngô Thời Nhậm Thuận Hòa', 45, 28, 'N/A', ' 01225511448', 'N/A', -1, 1000000, 300000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 12 Ngô Thời Nhậm', 'Phòng trọ 12 Ngô Thời Nhậm', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(96, 'Phòng trọ 118 Nguyễn Sinh Cung', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '118', '', 8, 3, 'Lân', '118  Nguyễn Sinh Cung Vỹ Dạ', 43, 33, '0543833497', 'N/A', 'N/A', -1, 1000000, 350000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 118 Nguyễn Sinh Cung', 'Phòng trọ 118 Nguyễn Sinh Cung', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1);
INSERT INTO `tb_room` (`id`, `title`, `shortdescription`, `description`, `anh_dai_dien`, `new`, `is_phong_khep_kin`, `sonha`, `kiet`, `tongsophong`, `sophongcontrong`, `tenchunha`, `address`, `idduong`, `idphuong`, `dt_nha`, `dt_didong`, `email`, `gioi_tinh_thue`, `gia_phong_max`, `gia_phong_min`, `giadien`, `gia_nuoc`, `gan_cho`, `gan_duong`, `internet`, `isGoogleMap`, `longitude`, `latitude`, `contentGoogleMap`, `titleGoogleMap`, `stick`, `order`, `create_by`, `create_date`, `updated_by`, `updated`, `view`, `status`) VALUES
(97, 'Phòng trọ 128 Nguyễn Sinh Cung', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '128', '', 8, 2, 'Vĩnh Cờ', '128  Nguyễn Sinh Cung Vỹ Dạ', 43, 33, '0543846961', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 128 Nguyễn Sinh Cung', 'Phòng trọ 128 Nguyễn Sinh Cung', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(98, ' Phòng trọ 2/48 Trần Quang Khải', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '2', '48', 5, 0, 'Hòa', '2 48 Trần Quang Khải Phú Hội', 36, 40, 'N/A', '0905052629', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', ' Phòng trọ 2/48 Trần Quang Khải', ' Phòng trọ 2/48 Trần Quang Khải', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(99, ' Phòng trọ 51 Nguyễn Đức Tịnh', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '51', '', 3, 1, 'Nguyễn Minh', '51  Nguyễn Đức Tịnh Thủy An', 25, 39, 'N/A', ' 0986558759', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', ' Phòng trọ 51 Nguyễn Đức Tịnh', ' Phòng trọ 51 Nguyễn Đức Tịnh', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(100, ' Phòng trọ 14/36 Đống Đa', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '14', '36', 6, 0, 'Nguyễn Đình Khương Duy', '14 36 Đống Đa Phú Nhuận', 33, 23, 'N/A', '01254512141', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', ' Phòng trọ 14/36 Đống Đa', ' Phòng trọ 14/36 Đống Đa', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(101, 'Phòng trọ 26/36 Đống Đa', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '26', '36', 4, 0, 'Trần Thị Hoa', '26 36 Đống Đa Phú Nhuận', 33, 23, 'N/A', '0905596373', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 26/36 Đống Đa', 'Phòng trọ 26/36 Đống Đa', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(102, 'Phòng trọ 39/81 Nguyễn Huệ', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '39', '81', 5, 0, 'Nguyễn Anh', '39 81 Nguyễn Huệ Phú Nhuận', 30, 23, '0543849920', 'N/A', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 39/81 Nguyễn Huệ', 'Phòng trọ 39/81 Nguyễn Huệ', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(103, 'Phòng trọ 21C/36 Đống Đa', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '21C', '36', 6, 0, ' Lê Hoài Anh', '21C 36 Đống Đa Phú Nhuận', 33, 23, 'N/A', ' 0905826884', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 21C/36 Đống Đa', 'Phòng trọ 21C/36 Đống Đa', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(104, 'Phòng trọ 39/111 Đặng Văn Ngữ', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '39', '111', 5, 1, ' Dì Tuyết', '39 111 Đặng Văn Ngữ An Đông', 24, 42, '0543812088', 'N/A', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 39/111 Đặng Văn Ngữ', 'Phòng trọ 39/111 Đặng Văn Ngữ', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(105, 'Phòng trọ 12 Ngô Thời Nhậm', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '12', '', 3, 1, '', '12  Ngô Thời Nhậm Thuận Hòa', 45, 28, 'N/A', '01225511448', 'N/A', -1, 1000000, 500000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 12 Ngô Thời Nhậm', 'Phòng trọ 12 Ngô Thời Nhậm', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1),
(106, 'Phòng trọ 3/64 Hoàng Diệu', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', 'Phòng trọ giá tương đối, còn mới, có lát gạch men, chủ nhà cung cấp cho mỗi phòng ghế và bàn học', '', '1', '1', '3', '64', 8, 0, 'Phan Cảnh Liêm', '3 64 Hoàng Diệu Tây Lộc', 44, 27, ' 0543529932', 'N/A', 'N/A', -1, 1000000, 400000, 2500, 2000, '1', '0', '1', '1', '107.593827', '16.463692', 'Phòng trọ 3/64 Hoàng Diệu', 'Phòng trọ 3/64 Hoàng Diệu', '1', 0, 1, '2032-01-22 00:00:00', 0, '2032-01-22 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_room_duong`
--

CREATE TABLE IF NOT EXISTS `tb_room_duong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_room` int(11) DEFAULT NULL,
  `id_duong` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_room_phuong`
--

CREATE TABLE IF NOT EXISTS `tb_room_phuong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_room` int(11) DEFAULT NULL,
  `id_phuong` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_room_truong`
--

CREATE TABLE IF NOT EXISTS `tb_room_truong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_room` int(11) DEFAULT NULL,
  `id_truong` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_truong`
--

CREATE TABLE IF NOT EXISTS `tb_truong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tb_truong`
--

INSERT INTO `tb_truong` (`id`, `name`, `order`, `updated`, `status`) VALUES
(16, 'Đại Học Khoa Học', 0, '2032-01-21 00:00:00', 1),
(17, 'Đại Học Sư Phạm', 0, '2032-01-21 00:00:00', 1),
(18, 'Đại Học Y Dược', 0, '2032-01-21 00:00:00', 1),
(19, 'Đại Học Nghệ Thuật', 0, '2032-01-21 00:00:00', 1),
(20, 'Đại Học Kinh Tế', 0, '2032-01-21 00:00:00', 1),
(21, 'Đại Học Ngoại Ngữ', 0, '2032-01-21 00:00:00', 1),
(22, 'Đại Học Dân Lập Phú Xuân', 0, '2032-01-21 00:00:00', 1),
(23, 'Khoa Giáo Dục Thể Chất', 0, '2032-01-21 00:00:00', 1),
(24, 'Kho Du Lịch', 0, '2032-01-21 00:00:00', 1),
(25, 'Khoa Luật', 0, '2032-01-21 00:00:00', 1),
(26, 'Cao Đẳng Sư Phạm', 0, '2032-01-21 00:00:00', 1),
(27, 'Cao Đẳng Y Tế', 0, '2032-01-21 00:00:00', 1),
(28, 'Cao Đẳng Công Nghiệp', 0, '2032-01-21 00:00:00', 1),
(29, 'Cao Đẳng Nghề Du Lịch', 0, '2032-01-21 00:00:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
