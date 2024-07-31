
 -- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 13, 2014 at 02:37 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `majax`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_uploads`
--

CREATE TABLE IF NOT EXISTS `user_uploads` (
  `image_name` varchar(255) NOT NULL,
  `user_id_fk` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

