-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2012 at 03:29 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_category_category`
--

CREATE TABLE IF NOT EXISTS `tb_category_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category_child` int(11) DEFAULT NULL,
  `id_category_parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_category_section`
--

CREATE TABLE IF NOT EXISTS `tb_category_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE IF NOT EXISTS `tb_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment_content`
--

CREATE TABLE IF NOT EXISTS `tb_comment_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_content` int(11) DEFAULT NULL,
  `id_comment` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment_room`
--

CREATE TABLE IF NOT EXISTS `tb_comment_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_room` int(11) DEFAULT NULL,
  `id_comment` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_content`
--

CREATE TABLE IF NOT EXISTS `tb_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `order` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `is_comment` bit(1) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_like_room`
--

CREATE TABLE IF NOT EXISTS `tb_like_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) DEFAULT NULL,
  `mark` int(11) DEFAULT NULL,
  `id_room` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `$titleGoogleMap` varchar(255) DEFAULT NULL,
  `stick` bit(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Table structure for table `tb_section`
--

CREATE TABLE IF NOT EXISTS `tb_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
