-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2017 at 11:35 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `category_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `category_link` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `unique` (`category_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_link`, `parent_id`, `sort_order`) VALUES
(1, 'Home', '', 0, 0),
(2, 'Tutorials', '#', 0, 1),
(3, 'Java', 'java', 2, 1),
(4, 'Liferay', 'liferay', 2, 1),
(5, 'Frameworks', '#', 0, 2),
(6, 'JSF', 'jsf', 5, 2),
(7, 'Struts', 'struts', 5, 2),
(8, 'Spring', 'spring', 5, 2),
(9, 'Hibernate', 'hibernate', 5, 2),
(10, 'Webservices', '#', 2, 3),
(11, 'REST', 'rest', 10, 3),
(12, 'SOAP', 'soap', 10, 3),
(13, 'Contact', 'contact', 0, 4),
(14, 'About', 'about', 0, 5),
(15, 'test', '', 1, 0),
(17, 'Rajdip', '', 1, 0),
(18, 'PHP', '', 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
