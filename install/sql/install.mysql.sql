-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 29, 2012 at 07:29 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `jelix_jmenu`
--

-- --------------------------------------------------------

--
-- Table structure for table `jmenu_menu`
--

CREATE TABLE IF NOT EXISTS `jmenu_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `locale` varchar(100) DEFAULT NULL,
  `attributes` text,
  `is_sub` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

-- --------------------------------------------------------

--
-- Table structure for table `jmenu_item`
--

CREATE TABLE IF NOT EXISTS `jmenu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` int(11) NOT NULL,
  `submenu` int(11) DEFAULT NULL,
  `text` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `linkattrs` text,
  `wrapperattrs` text,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `submenu` (`submenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

