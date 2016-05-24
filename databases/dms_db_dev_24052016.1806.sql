-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2016 at 12:06 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents1`
--

CREATE TABLE IF NOT EXISTS `documents1` (
  `d_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `dt_id` int(11) NOT NULL,
  `dc_id` int(11) NOT NULL,
  `d_name` varchar(200) NOT NULL,
  `d_link` varchar(200) NOT NULL,
  `d_size` varchar(200) NOT NULL,
  `d_datetime` datetime NOT NULL,
  `d_desc` varchar(500) NOT NULL,
  `d_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `document_class`
--

CREATE TABLE IF NOT EXISTS `document_class` (
  `dc_id` int(11) NOT NULL,
  `dc_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_class`
--

INSERT INTO `document_class` (`dc_id`, `dc_desc`) VALUES
(1, 'Private'),
(2, 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `document_type`
--

CREATE TABLE IF NOT EXISTS `document_type` (
  `dt_id` int(11) NOT NULL,
  `dt_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_type`
--

INSERT INTO `document_type` (`dt_id`, `dt_desc`) VALUES
(1, 'File'),
(2, 'Image');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE IF NOT EXISTS `users1` (
  `u_id` int(11) NOT NULL,
  `u_fullname` varchar(200) NOT NULL,
  `u_username` varchar(200) NOT NULL,
  `u_password` varchar(200) NOT NULL,
  `u_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents1`
--
ALTER TABLE `documents1`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `document_class`
--
ALTER TABLE `document_class`
  ADD PRIMARY KEY (`dc_id`);

--
-- Indexes for table `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`dt_id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents1`
--
ALTER TABLE `documents1`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `document_class`
--
ALTER TABLE `document_class`
  MODIFY `dc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `document_type`
--
ALTER TABLE `document_type`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
