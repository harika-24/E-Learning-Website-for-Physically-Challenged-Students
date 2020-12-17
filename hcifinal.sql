-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2019 at 06:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hci`
--

-- --------------------------------------------------------

--
-- Table structure for table `blind`
--

CREATE TABLE `blind` (
  `NAME` varchar(20) NOT NULL,
  `AGE` int(2) NOT NULL,
  `USERNAME` varchar(25) NOT NULL,
  `PASSWORD` varchar(25) NOT NULL,
  `DOB` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blind`
--

INSERT INTO `blind` (`NAME`, `AGE`, `USERNAME`, `PASSWORD`, `DOB`) VALUES
('AKHIL MURTHY', 19, '10001', 'akhil', '24/04/1999'),
('RITHIK', 20, '10002', 'hello', '24/04/1999');

-- --------------------------------------------------------

--
-- Table structure for table `blindstudentcourse`
--

CREATE TABLE `blindstudentcourse` (
  `COURSECODE` varchar(7) NOT NULL,
  `STUDENTID` varchar(5) NOT NULL,
  `MARKS` int(2) NOT NULL,
  `TEACHERID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blindstudentcourse`
--

INSERT INTO `blindstudentcourse` (`COURSECODE`, `STUDENTID`, `MARKS`, `TEACHERID`) VALUES
('MAT1001', '10001', 10, 'vijaya'),
('PHY1001', '10001', 0, 'pallavi');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `COURSECODE` varchar(7) NOT NULL,
  `MARKS` int(2) NOT NULL,
  `TEACHER` varchar(20) NOT NULL,
  `STUDENT` varchar(25) NOT NULL,
  `LOCATION` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`COURSECODE`, `MARKS`, `TEACHER`, `STUDENT`, `LOCATION`) VALUES
('MAT1001', 7, 'vijaya', 'vijay', 'uploads/student/MAT1001/vijay.txt'),
('MAT1001', 7, 'vijaya', 'vijay', 'uploads/student/MAT1001/vijay.txt'),
('MAT1001', 7, 'vijaya', '10001', 'uploads/student/MAT1001/10001.txt'),
('PHY1001', 8, 'pallavi', 'vinu', 'uploads/student/PHY1001/vinu.txt'),
('PHY1001', 8, 'pallavi', 'vinu', 'uploads/student/PHY1001/vinu.txt'),
('MAT1001', 10, 'vijaya', 'vijay', 'uploads/student/MAT1001/vijay.txt'),
('MAT1001', 10, 'vijaya', '10001', 'uploads/student/MAT1001/10001.txt');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `COURSECODE` varchar(7) NOT NULL,
  `COURSENAME` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`COURSECODE`, `COURSENAME`) VALUES
('MAT1001', 'DISCRETE MATHS'),
('PHY1001', 'PHYSICS'),
('CHY1001', 'ENGINEERING CHEMISTRY'),
('CSE1001', 'PYTHON'),
('CSE2001', 'C++'),
('CSE3001', 'SOFTWARE');

-- --------------------------------------------------------

--
-- Table structure for table `courseteacher`
--

CREATE TABLE `courseteacher` (
  `COURSECODE` varchar(7) NOT NULL,
  `TEACHER` varchar(25) NOT NULL,
  `STATUS` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseteacher`
--

INSERT INTO `courseteacher` (`COURSECODE`, `TEACHER`, `STATUS`) VALUES
('PHY1001', 'anu', 0),
('PHY1001', 'pallavi', 0),
('CHY1001', 'vijaya', 0),
('CHY1001', 'anu', 0),
('MAT1001', 'vijaya', 2),
('CSE3001', 'anu', 0),
('CSE3001', 'pallavi', 0),
('CSE2001', 'ramu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mat1001vijaya`
--

CREATE TABLE `mat1001vijaya` (
  `QUESTIONNO` int(2) DEFAULT NULL,
  `QUESTION` varchar(150) DEFAULT NULL,
  `OPTIONA` varchar(30) DEFAULT NULL,
  `OPTIONB` varchar(30) DEFAULT NULL,
  `OPTIONC` varchar(30) DEFAULT NULL,
  `OPTIOND` varchar(30) DEFAULT NULL,
  `KEYQ` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mat1001vijaya`
--

INSERT INTO `mat1001vijaya` (`QUESTIONNO`, `QUESTION`, `OPTIONA`, `OPTIONB`, `OPTIONC`, `OPTIOND`, `KEYQ`) VALUES
(1, 'question 1', 'a', 'b', 'c', 'd', 'c'),
(2, 'question 2', 'a', 'b', 'c', 'd', 'c'),
(3, 'question 3', 'a', 'b', 'c', 'd', 'd'),
(4, 'question 4', 'a', 'b', 'c', 'd', 'a'),
(5, 'question 5', 'a', 'b', 'c', 'd', 'c'),
(6, 'question 6', 'a', 'b', 'c', 'd', 'c'),
(7, 'question 7', 'a', 'b', 'c', 'd', 'd'),
(8, 'question 8', 'a', 'b', 'c', 'd', 'a'),
(9, 'question 9', 'a', 'b', 'c', 'd', 'c'),
(10, 'question 10', 'a', 'b', 'c', 'd', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `NAME` varchar(20) NOT NULL,
  `AGE` int(2) NOT NULL,
  `USERNAME` varchar(25) NOT NULL,
  `PASSWORD` varchar(25) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `COURSES` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`NAME`, `AGE`, `USERNAME`, `PASSWORD`, `DOB`, `COURSES`) VALUES
('VIJAY', 20, 'vijay', 'vijay', '20/09/1999', 0),
('vinu', 20, 'vinu', 'vinu', '20/03/1999', 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentcourse`
--

CREATE TABLE `studentcourse` (
  `COURSECODE` varchar(7) NOT NULL,
  `STUDENTID` varchar(25) NOT NULL,
  `MARKS` int(2) NOT NULL DEFAULT '0',
  `TEACHERID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentcourse`
--

INSERT INTO `studentcourse` (`COURSECODE`, `STUDENTID`, `MARKS`, `TEACHERID`) VALUES
('MAT1001', 'vijay', 10, 'vijaya'),
('PHY1001', 'vijay', 0, 'anu'),
('PHY1001', 'vinu', 8, 'pallavi'),
('CHY1001', 'vijay', 0, 'anu');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `NAME` varchar(20) NOT NULL,
  `AGE` int(2) NOT NULL,
  `USERNAME` varchar(25) NOT NULL,
  `PASSWORD` varchar(25) NOT NULL,
  `DOB` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`NAME`, `AGE`, `USERNAME`, `PASSWORD`, `DOB`) VALUES
('VIJAYAKUMAR', 32, 'vijaya', 'vijay', '28/09/1998'),
('ANU', 20, 'anu', 'anu', '15/02/1998'),
('Pallavi', 19, 'pallavi', 'pallavi', '10/02/1999'),
('RAMU', 42, 'ramu', 'ramu', '10/05/1974');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `COURSECODE` varchar(7) NOT NULL,
  `TEACHER` varchar(20) NOT NULL,
  `TOPIC` varchar(25) NOT NULL,
  `LOCATION` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`COURSECODE`, `TEACHER`, `TOPIC`, `LOCATION`) VALUES
('PHY1001', 'anu', 'MODULE 1', 'uploads/PHY1001/anu/MODULE 1.txt'),
('MAT1001', 'vijaya', 'RELAXATION', 'uploads/MAT1001/vijaya/RELAXATION.txt');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
