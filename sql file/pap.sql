-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2015 at 01:01 PM
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
  `username` int(9) NOT NULL DEFAULT '0',
  `year` int(4) DEFAULT NULL,
  `semester` varchar(10) NOT NULL DEFAULT '',
  `cgpa` float DEFAULT NULL,
  `max_cgpa` float DEFAULT NULL,
  `university` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`,`semester`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `username` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_type` varchar(12) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`username`, `password`, `user_type`, `name`, `email`) VALUES
(7, '21232f297a57a5a743894a0e4a801fc3', 'admin', 'H.S. Bawa', 'placements@thapar.edu'),
(766, '8bea92391bc93aa75b2ed7228de98554', 'company', 'Google', 'careers@gmail.com'),
(101203075, 'cc03e747a6afbbcbf8be7668acfebee5', 'student', 'Prisha Gupta', 'prishagupta@gmail.com'),
(101203081, '2d235ace000a3ad85f590e321c89bb99', 'coordinator', 'Rohit Saluja', 'ruhi.saluja@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `dream_status` tinyint(1) DEFAULT '0',
  `package` bigint(7) DEFAULT NULL,
  `cg_criteria` float(4,2) DEFAULT NULL,
  `description` varchar(700) DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `dream_status`, `package`, `cg_criteria`, `description`, `last_date`) VALUES
(766, 'Google', 1, 800000, 7.00, 'Testing 123', '2015-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `company_coordinator`
--

CREATE TABLE IF NOT EXISTS `company_coordinator` (
  `company_id` int(9) DEFAULT NULL,
  `roll_number` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_coordinator`
--

INSERT INTO `company_coordinator` (`company_id`, `roll_number`) VALUES
(766, 101203081);

-- --------------------------------------------------------

--
-- Table structure for table `coordinator_msg`
--

CREATE TABLE IF NOT EXISTS `coordinator_msg` (
  `message_id` int(5) NOT NULL AUTO_INCREMENT,
  `receiver` int(9) NOT NULL,
  `sender` int(9) NOT NULL DEFAULT '7',
  `message` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `label` varchar(10) NOT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_id`),
  KEY `from` (`sender`),
  KEY `receiver` (`receiver`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `coordinator_msg`
--

INSERT INTO `coordinator_msg` (`message_id`, `receiver`, `sender`, `message`, `date`, `label`, `read_status`) VALUES
(6, 101203081, 7, 'Google is the new company coming to the campus. Please collect the details of the same from me and update the company details.', '2015-06-10', 'n', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
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
  `father_name` varchar(50) DEFAULT NULL,
  `father_occupation` varchar(20) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `mother_occupation` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`username`, `year_of_pass`, `branch`, `dob`, `citizenship`, `gender`, `temp_address`, `temp_city`, `temp_state`, `temp_pin`, `permanent_address`, `permanent_city`, `permanent_state`, `permanent_pin`, `father_name`, `father_occupation`, `mother_name`, `mother_occupation`) VALUES
(101203081, 2016, 'COE', '1994-08-04', 'Indian', 'M', 'WD-207, Hostel J, Thapar Universtiy', 'Patiala', 'Punjab', 147004, 'C-2/275, Sector F, Jankipuram', 'Lucknow', 'Uttar Pradesh', 226001, 'Gp. Capt. Yogesh Saluja', 'Governmet Services', 'Mrs. Mitali Saluja', 'Home Maker');

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
  `username` int(10) NOT NULL DEFAULT '0',
  `phone_num` bigint(10) NOT NULL DEFAULT '0',
  `permanent_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_telephone`
--

INSERT INTO `student_telephone` (`username`, `phone_num`, `permanent_number`) VALUES
(101203081, 8437824996, 2730389);

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
(101, 101203072, 0),
(101, 101203081, 0),
(102, 101203081, 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE IF NOT EXISTS `timeline` (
  `event_id` int(6) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `venue` varchar(40) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `event_desc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`event_id`, `company_id`, `date`, `venue`, `time`, `event_desc`) VALUES
(6, 766, NULL, 'Auditorium', NULL, 'Online Test');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coordinator_msg`
--
ALTER TABLE `coordinator_msg`
  ADD CONSTRAINT `coordinator_msg_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `auth` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coordinator_msg_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `auth` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`username`) REFERENCES `auth` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
