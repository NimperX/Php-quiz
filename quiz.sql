-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2016 at 07:08 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE IF NOT EXISTS `codes` (
  `school_id` int(5) NOT NULL AUTO_INCREMENT,
  `schoolname` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `code` varchar(10) NOT NULL,
  `claimed_by` varchar(20) NOT NULL,
  PRIMARY KEY (`school_id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `MIC`
--

CREATE TABLE IF NOT EXISTS `MIC` (
  `school` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `telno` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qhistory`
--

CREATE TABLE IF NOT EXISTS `qhistory` (
  `id` int(2) NOT NULL,
  `q1` int(2) NOT NULL,
  `a1` varchar(4) NOT NULL,
  `q2` int(2) NOT NULL,
  `a2` varchar(4) NOT NULL,
  `q3` int(2) NOT NULL,
  `a3` varchar(4) NOT NULL,
  `q4` int(2) NOT NULL,
  `a4` varchar(4) NOT NULL,
  `q5` int(2) NOT NULL,
  `a5` varchar(4) NOT NULL,
  `q6` int(2) NOT NULL,
  `a6` varchar(4) NOT NULL,
  `q7` int(2) NOT NULL,
  `a7` varchar(4) NOT NULL,
  `q8` int(2) NOT NULL,
  `a8` varchar(4) NOT NULL,
  `q9` int(2) NOT NULL,
  `a9` varchar(4) NOT NULL,
  `q10` int(2) NOT NULL,
  `a10` varchar(4) NOT NULL,
  `q11` int(2) NOT NULL,
  `a11` varchar(4) NOT NULL,
  `q12` int(2) NOT NULL,
  `a12` varchar(4) NOT NULL,
  `q13` int(2) NOT NULL,
  `a13` varchar(4) NOT NULL,
  `q14` int(2) NOT NULL,
  `a14` varchar(4) NOT NULL,
  `q15` int(2) NOT NULL,
  `a15` varchar(4) NOT NULL,
  `q16` int(2) NOT NULL,
  `a16` varchar(4) NOT NULL,
  `q17` int(2) NOT NULL,
  `a17` varchar(4) NOT NULL,
  `q18` int(2) NOT NULL,
  `a18` varchar(4) NOT NULL,
  `q19` int(2) NOT NULL,
  `a19` varchar(4) NOT NULL,
  `q20` int(2) NOT NULL,
  `a20` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qno` int(11) NOT NULL AUTO_INCREMENT,
  `q` text NOT NULL,
  `an1` text NOT NULL,
  `an2` text NOT NULL,
  `an3` text NOT NULL,
  `an4` text NOT NULL,
  `cran` text NOT NULL,
  PRIMARY KEY (`qno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q`, `an1`, `an2`, `an3`, `an4`, `cran`) VALUES
('UNIVAC is', 'Universal Automatic Computer', 'Universal Array Computer', 'Unique Automatic Computer', 'Unvalued Automatic Computer', 'a'),
('The basic operations performed by a computer are', 'Arithmetic operation', 'Logical operation', 'Storage and relative', 'All the above', 'd'),
('The two major types of computer chips are', 'External memory chip', 'Primary memory chip', 'Microprocessor chip', 'Both b and c', 'd'),
('Microprocessors as switching devices are for which generation computers', 'First Generation', 'Second Generation', 'Third Generation', 'Fourth Generation', 'd'),
('What is the main difference between a mainframe and a super computer?', 'Super computer is much larger than mainframe computers', 'Super computers are much smaller than mainframe computers', 'Supercomputers are focused to execute few programs as fast as possible while mainframe uses its power to execute as many programs concurrently', 'Supercomputers are focused to execute as many programs as possible while mainframe uses its power to execute few programs as fast as possible.', 'c'),
('ASCII and EBCDIC are the popular character coding systems. What does EBCDIC stand for?', 'Extended Binary Coded Decimal Interchange Code', 'Extended Bit Code Decimal Interchange Code', 'Extended Bit Case Decimal Interchange Code', 'Extended Binary Case Decimal Interchange Code', 'a'),
('The brain of any computer system is', 'ALU', 'Memory', 'CPU', 'Control unit', 'c'),
('Storage capacity of magnetic disk depends on', 'tracks per inch of surface', 'bits per inch of tracks', 'disk pack in disk surface', 'All of above', 'd'),
('The two kinds of main memory are:', 'Primary and secondary', 'Random and sequential', 'ROM and RAM', 'All of above', 'c'),
('A storage area used to store data to a compensate for the difference in speed at which the different units can handle data is', 'Memory', 'Buffer', 'Accumulator', 'Address', 'b'),
('UNIX is','A computer language','An operating system','An application software','A web browser','b')
;

-- --------------------------------------------------------

--
-- Table structure for table `sqd`
--

CREATE TABLE IF NOT EXISTS `sqd` (
  `id` int(11) NOT NULL,
  `complete` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `blank` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `ph2` text NOT NULL,
  `online` text NOT NULL,
  `other` text NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `team_id` int(5) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `school` varchar(100) NOT NULL,
  `leader` varchar(100) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `telno1` varchar(12) NOT NULL,
  `roll1` varchar(30) NOT NULL,
  `mem2` varchar(100) NOT NULL,
  `address2` varchar(300) NOT NULL,
  `telno2` varchar(12) NOT NULL,
  `roll2` varchar(30) NOT NULL,
  `mem3` varchar(100) NOT NULL,
  `address3` varchar(300) NOT NULL,
  `telno3` varchar(12) NOT NULL,
  `roll3` varchar(30) NOT NULL,
  `mem4` varchar(100) NOT NULL,
  `address4` varchar(300) NOT NULL,
  `telno4` varchar(12) NOT NULL,
  `roll4` varchar(30) NOT NULL,
  PRIMARY KEY (`team_id`),
  UNIQUE KEY (`team_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `school` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `telno` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
