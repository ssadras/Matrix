-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2020 at 06:38 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matrix_judge`
--

-- --------------------------------------------------------

--
-- Table structure for table `problemsets`
--

DROP TABLE IF EXISTS `problemsets`;
CREATE TABLE IF NOT EXISTS `problemsets` (
  `problemset_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `time` int(3) NOT NULL,
  `storage` int(3) NOT NULL,
  PRIMARY KEY (`problemset_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sample_tcs`
--

DROP TABLE IF EXISTS `sample_tcs`;
CREATE TABLE IF NOT EXISTS `sample_tcs` (
  `testcase_id` int(11) NOT NULL AUTO_INCREMENT,
  `input` text NOT NULL,
  `output` text NOT NULL,
  `problemset_id` int(11) NOT NULL,
  PRIMARY KEY (`testcase_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `testcases`
--

DROP TABLE IF EXISTS `testcases`;
CREATE TABLE IF NOT EXISTS `testcases` (
  `testcase_id` int(11) NOT NULL AUTO_INCREMENT,
  `input` text NOT NULL,
  `output` text NOT NULL,
  `problemset_id` int(11) NOT NULL,
  PRIMARY KEY (`testcase_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
