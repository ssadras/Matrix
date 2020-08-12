-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 12, 2020 at 12:03 PM
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
-- Database: `matrix_core`
--

-- --------------------------------------------------------

--
-- Table structure for table `adverts`
--

DROP TABLE IF EXISTS `adverts`;
CREATE TABLE IF NOT EXISTS `adverts` (
  `advert_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `msg` text NOT NULL,
  `link` varchar(300) NOT NULL,
  `pic` varchar(50) NOT NULL,
  PRIMARY KEY (`advert_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_probs_ans`
--

DROP TABLE IF EXISTS `users_probs_ans`;
CREATE TABLE IF NOT EXISTS `users_probs_ans` (
  `uspran_id` int(11) NOT NULL AUTO_INCREMENT,
  `testcase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`uspran_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
