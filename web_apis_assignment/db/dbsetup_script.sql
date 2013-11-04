-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net

-- to use this file use PHPADMIN to create a database
-- then import this script

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

CREATE TABLE `sys_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sys_users`
-- not a secure password just an example shouldn't store the password just the hash
--

INSERT INTO `sys_users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'letmein');
