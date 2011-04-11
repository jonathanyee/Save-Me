-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2011 at 07:57 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `saveme`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `url` varchar(500) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`,`body`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `userarticles`
--

CREATE TABLE `userarticles` (
  `uid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`uid`,`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;