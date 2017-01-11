-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2017 at 05:42 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `brotherstraining`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting`
--

CREATE TABLE `accounting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `address0` varchar(400) NOT NULL,
  `report_type` varchar(200) NOT NULL,
  `date1` varchar(200) NOT NULL,
  `desc1` varchar(400) NOT NULL,
  `payee1` varchar(200) NOT NULL,
  `address1` varchar(400) NOT NULL,
  `amount1` decimal(10,2) NOT NULL,
  `date2` varchar(200) NOT NULL,
  `desc2` varchar(400) NOT NULL,
  `payee2` varchar(200) NOT NULL,
  `address2` varchar(400) NOT NULL,
  `amount2` decimal(10,2) NOT NULL,
  `date3` varchar(200) NOT NULL,
  `desc3` varchar(400) NOT NULL,
  `payee3` varchar(200) NOT NULL,
  `address3` varchar(400) NOT NULL,
  `amount3` decimal(10,2) NOT NULL,
  `date4` varchar(200) NOT NULL,
  `desc4` varchar(400) NOT NULL,
  `payee4` varchar(200) NOT NULL,
  `address4` varchar(400) NOT NULL,
  `amount4` decimal(10,2) NOT NULL,
  `date5` varchar(200) NOT NULL,
  `desc5` varchar(400) NOT NULL,
  `payee5` varchar(200) NOT NULL,
  `address5` varchar(400) NOT NULL,
  `amount5` decimal(10,2) NOT NULL,
  `date6` varchar(200) NOT NULL,
  `desc6` varchar(400) NOT NULL,
  `payee6` varchar(200) NOT NULL,
  `address6` varchar(400) NOT NULL,
  `amount6` decimal(10,2) NOT NULL,
  `date7` varchar(200) NOT NULL,
  `desc7` varchar(400) NOT NULL,
  `payee7` varchar(200) NOT NULL,
  `address7` varchar(400) NOT NULL,
  `amount7` decimal(10,2) NOT NULL,
  `date8` varchar(200) NOT NULL,
  `desc8` varchar(400) NOT NULL,
  `payee8` varchar(200) NOT NULL,
  `address8` varchar(400) NOT NULL,
  `amount8` decimal(10,2) NOT NULL,
  `date9` varchar(200) NOT NULL,
  `desc9` varchar(400) NOT NULL,
  `payee9` varchar(200) NOT NULL,
  `address9` varchar(400) NOT NULL,
  `amount9` decimal(10,2) NOT NULL,
  `date10` varchar(200) NOT NULL,
  `desc10` varchar(400) NOT NULL,
  `payee10` varchar(200) NOT NULL,
  `address10` varchar(400) NOT NULL,
  `amount10` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `remark` varchar(400) NOT NULL,
  `link1` varchar(300) NOT NULL,
  `link2` varchar(300) NOT NULL,
  `link3` varchar(300) NOT NULL,
  `link4` varchar(300) NOT NULL,
  `link5` varchar(300) NOT NULL,
  `date_submitted` date NOT NULL,
  `approved1` varchar(200) NOT NULL,
  `approved2` varchar(200) NOT NULL,
  `approved_date1` date NOT NULL,
  `approved_date2` date NOT NULL,
  `payment_comment1` varchar(300) NOT NULL,
  `payment_comment2` varchar(300) NOT NULL,
  `expense_paid` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `home_address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zip_code` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `marital_status` varchar(200) NOT NULL,
  `children` varchar(200) NOT NULL,
  `church_raised` varchar(200) NOT NULL,
  `date_entered_church` varchar(200) NOT NULL,
  `services` mediumtext NOT NULL,
  `training` mediumtext NOT NULL,
  `payment_method` varchar(200) NOT NULL,
  `payment_verification` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `approved_by` varchar(200) NOT NULL,
  `approved_date` datetime NOT NULL,
  `comments` mediumtext NOT NULL,
  `date_submitted` datetime NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `consecrated` tinyint(1) NOT NULL DEFAULT '0',
  `first_term` tinyint(1) NOT NULL DEFAULT '0',
  `second_term` tinyint(1) NOT NULL DEFAULT '0',
  `third_term` tinyint(1) NOT NULL DEFAULT '0',
  `occupation` varchar(200) NOT NULL,
  `language` varchar(200) NOT NULL,
  `date_saved` varchar(200) NOT NULL,
  `date_baptized` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=140 ;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `training_date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `absence_reason` varchar(200) NOT NULL,
  `makeup_date` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `attendance_id` (`user_id`,`training_date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `consecration`
--

CREATE TABLE `consecration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `response` mediumtext NOT NULL,
  `date_submitted` date NOT NULL,
  `application_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_attendance`
--

CREATE TABLE `group_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `training_date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `absence_reason` varchar(200) NOT NULL,
  `makeup_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attendance_id` (`user_id`,`training_date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `locality` varchar(255) NOT NULL,
  `reset_code` smallint(6) NOT NULL,
  `reset_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `study_groups`
--

CREATE TABLE `study_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locality` varchar(200) NOT NULL,
  `language` varchar(200) NOT NULL,
  `group_no` int(11) NOT NULL,
  `mtg_day` varchar(200) NOT NULL,
  `mtg_time` varchar(200) NOT NULL,
  `mtg_place` varchar(200) NOT NULL,
  `member_ids` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_id` (`locality`,`group_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `study_reports`
--

CREATE TABLE `study_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `language` varchar(200) NOT NULL,
  `group_no` int(11) NOT NULL,
  `lesson` varchar(200) NOT NULL,
  `attendees` varchar(400) NOT NULL,
  `absentees` varchar(400) NOT NULL,
  `excused_absentees` varchar(400) NOT NULL,
  `study_report` longtext NOT NULL,
  `suggestions` varchar(400) NOT NULL,
  `date_submitted` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;
