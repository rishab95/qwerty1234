-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2015 at 02:11 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pap`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_10`
--

CREATE TABLE IF NOT EXISTS `academic_10` (
  `username` int(11) NOT NULL DEFAULT '0',
  `board` varchar(5) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `academic_12`
--

CREATE TABLE IF NOT EXISTS `academic_12` (
  `username` int(11) NOT NULL DEFAULT '0',
  `univ` varchar(20) DEFAULT NULL,
  `marks_diploma` int(11) DEFAULT NULL,
  `board` varchar(5) DEFAULT NULL,
  `marks_12` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `academic_btech`
--

CREATE TABLE IF NOT EXISTS `academic_btech` (
  `username` int(11) NOT NULL DEFAULT '0',
  `first_sem` float(2,2) DEFAULT NULL,
  `second_sem` float(2,2) DEFAULT NULL,
  `third_sem` float(2,2) NOT NULL,
  `fourth_sem` float(2,2) NOT NULL,
  `fifth_sem` float(2,2) NOT NULL,
  `sixth_sem` float(2,2) NOT NULL,
  `seventh_sem` float(2,2) DEFAULT NULL,
  `eighth_sem` float(2,2) DEFAULT NULL,
  `cgpa` float(2,2) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `academic_mtech`
--

CREATE TABLE IF NOT EXISTS `academic_mtech` (
  `username` int(11) NOT NULL DEFAULT '0',
  `univ_btech` varchar(30) DEFAULT NULL,
  `first_sem` float(2,2) NOT NULL,
  `second_sem` float(2,2) NOT NULL,
  `third_sem` float(2,2) NOT NULL,
  `fourth_sem` float(2,2) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acad_achieve`
--

CREATE TABLE IF NOT EXISTS `acad_achieve` (
  `achieve_id` varchar(20) NOT NULL,
  `username` int(11) DEFAULT NULL,
  `achievement_description` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`achieve_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(101203075, '098f6bcd4621d373cade4e832627b4f6', 'student', 'prisha', 'prishagupta21@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(20) DEFAULT NULL,
  `dream_status` tinyint(1) DEFAULT NULL,
  `package` int(11) DEFAULT NULL,
  `cg_criteria` float(2,2) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `other_criteria` varchar(30) DEFAULT NULL,
  `company_link` varchar(30) DEFAULT NULL,
  `company_profile` varchar(50) DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `curricular_activity`
--

CREATE TABLE IF NOT EXISTS `curricular_activity` (
  `activity_id` varchar(20) NOT NULL,
  `username` int(11) DEFAULT NULL,
  `activity_description` varchar(40) DEFAULT NULL,
  `activity_from` date DEFAULT NULL,
  `activity_to` date DEFAULT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other_info`
--

CREATE TABLE IF NOT EXISTS `other_info` (
  `info_id` varchar(20) NOT NULL,
  `username` int(11) DEFAULT NULL,
  `info_description` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` varchar(20) NOT NULL,
  `username` int(11) DEFAULT NULL,
  `project_description` varchar(40) DEFAULT NULL,
  `project_from` date DEFAULT NULL,
  `project_to` date DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `company_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `venue` varchar(40) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `event_descp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`company_id`, `date`, `venue`, `time`, `event_descp`) VALUES
(100, '2031-01-15', 'ccct lab', '07:00:00', 'test');

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
  `permanent_address` varchar(100) DEFAULT NULL,
  `permanent_city` varchar(25) DEFAULT NULL,
  `permanent_state` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `father_occupation` varchar(20) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `mother_occupation` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `student_telephone`
--

CREATE TABLE IF NOT EXISTS `student_telephone` (
  `username` int(11) NOT NULL DEFAULT '0',
  `phone_num` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`,`phone_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
