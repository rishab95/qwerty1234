-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2015 at 10:32 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE pap;

USE pap;

--
-- Database: `pap`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE IF NOT EXISTS `academic` (
  `username` int(11) NOT NULL DEFAULT '0',
  `class` varchar(7) NOT NULL DEFAULT '',
  `year` int(4) DEFAULT NULL,
  `univ_diploma` varchar(20) DEFAULT NULL,
  `marks` float DEFAULT NULL,
  `max_marks` float DEFAULT NULL,
  `board` varchar(5) NOT NULL DEFAULT '',
  `division` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`username`,`class`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`username`, `class`, `year`, `univ_diploma`, `marks`, `max_marks`, `board`, `division`) VALUES
(101203072, '10', 2007, NULL, 90, 100, 'cbse', 'first'),
(101203072, '12', 2009, NULL, 95, 100, 'cbse', 'first'),
(101203075, '10', 2010, NULL, 85.5, 100, 'CBSE', 'first'),
(101203075, '12', 2012, NULL, 83, 100, 'CBSE', 'first'),
(101203081, '10', 2012, NULL, 90, 100, 'cbse', 'first'),
(101203081, '12', 2012, NULL, 90, 100, 'cbse', 'first');

-- --------------------------------------------------------

--
-- Table structure for table `academic_btech`
--

CREATE TABLE IF NOT EXISTS `academic_btech` (
  `username` int(11) NOT NULL DEFAULT '0',
  `year` int(4) DEFAULT NULL,
  `semester` varchar(10) NOT NULL DEFAULT '',
  `cgpa` float DEFAULT NULL,
  `max_cgpa` float DEFAULT NULL,
  `university` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`,`semester`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_btech`
--

INSERT INTO `academic_btech` (`username`, `year`, `semester`, `cgpa`, `max_cgpa`, `university`) VALUES
(101203075, 2012, '1', 7.2, 10, 'thapar'),
(101203075, 2013, '2', 7.2, 10, 'thapar'),
(101203075, 2013, '3', 7.2, 10, 'thapar'),
(101203075, 2014, '4', 7.2, 10, 'thapar'),
(101203075, 2014, '5', 7.2, 10, 'thapar'),
(101203075, 2015, '6', 7.2, 10, 'thapar'),
(101203081, 2012, '1', 8, 10, 'thapar'),
(101203081, 2013, '2', 8, 10, 'thapar'),
(101203081, 2013, '3', 8, 10, 'thapar'),
(101203081, 2014, '4', 8, 10, 'thapar'),
(101203081, 2014, '5', 8, 10, 'thapar'),
(101203081, 2015, '6', 8, 10, 'thapar');

-- --------------------------------------------------------

--
-- Table structure for table `academic_mtech`
--

CREATE TABLE IF NOT EXISTS `academic_mtech` (
  `username` int(11) NOT NULL DEFAULT '0',
  `year` int(4) DEFAULT NULL,
  `semester` varchar(10) NOT NULL DEFAULT '',
  `cgpa` float DEFAULT NULL,
  `max_cgpa` float DEFAULT NULL,
  `division` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`username`,`semester`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acad_achieve`
--

CREATE TABLE IF NOT EXISTS `acad_achieve` (
  `achieve_id` int(11) NOT NULL DEFAULT '0',
  `username` int(11) NOT NULL DEFAULT '0',
  `achievement_description` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`achieve_id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_achieve`
--

INSERT INTO `acad_achieve` (`achieve_id`, `username`, `achievement_description`) VALUES
(1, 101203075, ''),
(2, 101203075, ''),
(3, 101203075, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `username` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`username`, `password`, `user_type`, `name`, `email`) VALUES
(101203072, 'e8d3d3ecac9dd3f1dffd3fc964fb3760', 'student', 'Tanushree Gupta', 'tanushree@gmail.com'),
(101203075, '098f6bcd4621d373cade4e832627b4f6', 'student', 'prisha', 'prishagupta21@gmail.com'),
(101203081, 'cc03e747a6afbbcbf8be7668acfebee5', 'student', 'Rohit Saluja', 'ruhi.saluja@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(20) DEFAULT NULL,
  `dream_status` tinyint(1) DEFAULT NULL,
  `package` int(11) DEFAULT NULL,
  `cg_criteria` float DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `other_criteria` varchar(30) DEFAULT NULL,
  `company_link` varchar(30) DEFAULT NULL,
  `company_profile` varchar(50) DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `dream_status`, `package`, `cg_criteria`, `password`, `other_criteria`, `company_link`, `company_profile`, `last_date`) VALUES
(100, 'Microsoft', 1, 18, 7, 'test', NULL, NULL, NULL, '2016-08-04'),
(101, 'google', 1, 100000, 7, 'test123', NULL, NULL, NULL, '2015-04-30'),
(102, 'facebook', 0, 90000, 7.5, 'test12345', NULL, NULL, NULL, '2015-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `curricular_activity`
--

CREATE TABLE IF NOT EXISTS `curricular_activity` (
  `activity_id` int(11) NOT NULL DEFAULT '0',
  `username` int(11) NOT NULL DEFAULT '0',
  `activity_description` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`activity_id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curricular_activity`
--

INSERT INTO `curricular_activity` (`activity_id`, `username`, `activity_description`) VALUES
(1, 101203075, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `other_info`
--

CREATE TABLE IF NOT EXISTS `other_info` (
  `info_id` int(11) NOT NULL DEFAULT '0',
  `username` int(11) NOT NULL DEFAULT '0',
  `info_description` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`info_id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_info`
--

INSERT INTO `other_info` (`info_id`, `username`, `info_description`) VALUES
(1, 101203075, 'hello'),
(2, 101203075, 'helloooo');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL DEFAULT '0',
  `username` int(11) NOT NULL DEFAULT '0',
  `project_description` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`project_id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `username`, `project_description`) VALUES
(1, 101203075, 'hiiiiiiiiii'),
(2, 101203075, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `name` varchar(40) DEFAULT NULL,
  `username` int(11) NOT NULL DEFAULT '0',
  `year_of_pass` int(11) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `citizenship` varchar(15) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `temp_address` varchar(100) DEFAULT NULL,
  `temp_city` varchar(25) DEFAULT NULL,
  `temp_state` varchar(25) DEFAULT NULL,
  `temp_pin` int(6) DEFAULT NULL,
  `permanent_address` varchar(100) DEFAULT NULL,
  `permanent_city` varchar(25) DEFAULT NULL,
  `permanent_state` varchar(25) DEFAULT NULL,
  `permanent_pin` int(6) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `father_occupation` varchar(20) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `mother_occupation` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `username`, `year_of_pass`, `branch`, `dob`, `citizenship`, `gender`, `temp_address`, `temp_city`, `temp_state`, `temp_pin`, `permanent_address`, `permanent_city`, `permanent_state`, `permanent_pin`, `email`, `father_name`, `father_occupation`, `mother_name`, `mother_occupation`) VALUES
('Tanushree Gupta', 101203072, 2016, 'cse', '1990-04-14', 'indian', 'f', 'power colony no.2', 'patiala', 'punjab', 147001, 'power colony no.2', 'patiala', 'punjab', 147001, 'tanushree@gmail.com', 'sham Gupta', 'Dy. CAO', 'Samita Gupta', 'lecturer'),
('Prisha Gupta', 101203075, 2016, 'coe', '1995-01-21', 'Indian', 'F', 'power colony no.2', 'Patiala', 'Punjab', 147001, 'power colony no.2', 'Patiala', 'Punjab', 147001, 'prishagupta@gmail.com', 'Sham Gupta', 'Dy. CAO', 'Samita Gupta', 'Lecturer'),
('Rohit saluja', 101203081, 2016, 'cse', '1994-08-15', 'indian', 'm', 'thapar university', 'patiala', 'punjab', 147001, 'ekta colony', 'bhuj', 'gujrat', 123456, 'ruhi.saluja@gmail.com', 'uncle ji', 'army', 'aunty ji', 'housewife');

-- --------------------------------------------------------

--
-- Table structure for table `student_language`
--

CREATE TABLE IF NOT EXISTS `student_language` (
  `username` int(11) NOT NULL DEFAULT '0',
  `lang_name` varchar(10) NOT NULL DEFAULT '',
  `lang_understand` tinyint(1) DEFAULT NULL,
  `lang_read` tinyint(1) DEFAULT NULL,
  `lang_write` tinyint(1) DEFAULT NULL,
  `lang_speak` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`lang_name`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_language`
--

INSERT INTO `student_language` (`username`, `lang_name`, `lang_understand`, `lang_read`, `lang_write`, `lang_speak`) VALUES
(101203075, 'english', 1, 1, 1, 1),
(101203081, 'enlish', 1, 1, 1, 1),
(101203081, 'hindi', 1, 1, 1, 1),
(101203072, 'punjabi', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_telephone`
--

CREATE TABLE IF NOT EXISTS `student_telephone` (
  `username` int(10) NOT NULL DEFAULT '0',
  `phone_num` bigint(10) NOT NULL DEFAULT '0',
  `permanent_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_telephone`
--

INSERT INTO `student_telephone` (`username`, `phone_num`, `permanent_number`) VALUES
(101203075, 9417232343, 1203948),
(101203081, 1234567890, 1234567890),
(101203072, 12345689, 124659236);

-- --------------------------------------------------------

--
-- Table structure for table `stu_eligible`
--

CREATE TABLE IF NOT EXISTS `stu_eligible` (
  `company_id` int(11) NOT NULL DEFAULT '0',
  `username` int(11) NOT NULL DEFAULT '0',
  `applied` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`company_id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_eligible`
--

INSERT INTO `stu_eligible` (`company_id`, `username`, `applied`) VALUES
(100, 101203075, 1),
(101, 101203072, 0),
(101, 101203081, 0),
(102, 101203081, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stu_schedule`
--

CREATE TABLE IF NOT EXISTS `stu_schedule` (
  `company_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `venue` varchar(40) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `event_descp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_schedule`
--

INSERT INTO `stu_schedule` (`company_id`, `date`, `venue`, `time`, `event_descp`) VALUES
(100, '2031-01-15', 'ccct lab', '07:00:00', 'test'),
(101, '2015-04-07', 'citm', '03:00:00', 'test'),
(102, '2015-04-15', 'pg lab', '03:00:00', 'test');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`username`) REFERENCES `auth` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
