-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 05:39 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation_register`
--

CREATE TABLE `accomodation_register` (
  `sn` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `SN` int(11) NOT NULL,
  `Subject` varchar(20) NOT NULL,
  `TeacherID` varchar(15) NOT NULL,
  `ClassID` varchar(10) NOT NULL,
  `Assignment` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`SN`, `Subject`, `TeacherID`, `ClassID`, `Assignment`, `Date`) VALUES
(1, '', 'HCS2351', '11', 'Read all of chapter 2 by tomorrow the 12th February 2018.', '2018-02-02 21:42:19'),
(4, '', 'HCS2351', '11', 'Read all of chapter 2 by tomorrow the 12th February 2018.', '2018-02-02 21:47:09'),
(5, 'Math', 'HCS2351', '4', 'You all have assignments that will be due very soon', '2018-02-02 21:48:02'),
(6, '', 'HCS2351', '4', 'Everyone.. Please do your assignment immediately', '2018-03-07 17:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `studentid` int(4) NOT NULL,
  `sessiond` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `daysenrolled` int(5) NOT NULL,
  `dayspresent` varchar(5) NOT NULL,
  `daysabsent` varchar(5) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendancesheet`
--

CREATE TABLE `attendancesheet` (
  `sn` int(11) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `classid` int(3) NOT NULL,
  `daysenrolled` int(5) NOT NULL,
  `present` varchar(3) NOT NULL,
  `absent` text NOT NULL,
  `session` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendancesheet`
--

INSERT INTO `attendancesheet` (`sn`, `studentid`, `classid`, `daysenrolled`, `present`, `absent`, `session`, `term`, `dateadded`) VALUES
(2, 'HCS72685', 3, 230, '220', '10', '2017/2018', '1st Term', '2018-02-08 00:23:44'),
(6, 'HCS72384', 3, 340, '1', '10', '2017/2018', '1st Term', '2018-02-08 11:49:37'),
(9, 'HCS8734', 3, 0, '0', '0', '2017/2018', '1st Term', '2018-02-08 12:22:05'),
(14, 'HCS8734', 3, 0, '0', '0', '2017/2018', '2nd Term', '2018-02-08 12:25:40'),
(22, 'HCS8545', 12, 250, '225', '25', '2017/2018', '1st Term', '2018-02-12 12:19:49'),
(23, 'HCS546', 10, 500, '490', '10', '2017/2018', '1st Term', '2018-02-12 13:25:28'),
(24, 'HCS7438', 4, 400, '230', '30', '2017/2018', '1st Term', '2018-02-15 11:13:54'),
(26, 'HCS643', 11, 100, '10', '90', '2017/2018', '1st Term', '2018-02-18 14:07:37'),
(27, 'HCS643', 11, 100, '10', '90', '2017/2018', '2nd Term', '2018-02-18 14:07:52'),
(28, 'HCS7665', 4, 200, '190', '10', '2017/2018', '1st Term', '2018-04-08 13:11:14'),
(29, 'HCS643', 11, 350, '330', '20', '2017/2018', '3rd Term', '2018-03-11 17:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `boarder`
--

CREATE TABLE `boarder` (
  `sn` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `term` varchar(20) NOT NULL,
  `session` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classteachersetting`
--

CREATE TABLE `classteachersetting` (
  `Role` varchar(15) NOT NULL,
  `TeacherID` varchar(15) NOT NULL,
  `DirectMessaging` varchar(2) NOT NULL,
  `TakeAttendance` varchar(2) NOT NULL,
  `NewsLetters` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conduct`
--

CREATE TABLE `conduct` (
  `id` int(11) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `conduct` varchar(20) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cts`
--

CREATE TABLE `cts` (
  `TeacherID` varchar(10) NOT NULL,
  `ClassID` varchar(20) NOT NULL,
  `SubjectsTaking` text NOT NULL,
  `Credential` varchar(100) NOT NULL,
  `TeacherEmail` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `Address` text NOT NULL,
  `Privileged` int(11) NOT NULL,
  `TeacherName` varchar(80) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currentsession`
--

CREATE TABLE `currentsession` (
  `sn` int(11) NOT NULL,
  `Term` varchar(10) NOT NULL,
  `Session` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `debtregister`
--

CREATE TABLE `debtregister` (
  `sn` int(11) NOT NULL,
  `StudentID` varchar(10) NOT NULL,
  `ClassID` varchar(10) NOT NULL,
  `Term` varchar(20) NOT NULL,
  `Session` varchar(20) NOT NULL,
  `amountExpected` varchar(10) NOT NULL,
  `Amountpaid` varchar(10) NOT NULL,
  `AmountOwed` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `defaultmessage`
--

CREATE TABLE `defaultmessage` (
  `defaultmessage` text NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_category`
--

CREATE TABLE `fee_category` (
  `Fee_Cat_ID` int(11) NOT NULL,
  `Class` varchar(15) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `Year` varchar(10) NOT NULL,
  `Item` varchar(30) NOT NULL,
  `Fee` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_transaction`
--

CREATE TABLE `fee_transaction` (
  `SN` int(11) NOT NULL,
  `DatePaid` varchar(20) NOT NULL,
  `Bank` varchar(40) NOT NULL,
  `TellerNumber` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `student_id` varchar(15) NOT NULL,
  `class_id` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `Term` varchar(20) NOT NULL,
  `Session` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `receiptID` varchar(20) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_transaction`
--

INSERT INTO `fee_transaction` (`SN`, `DatePaid`, `Bank`, `TellerNumber`, `date`, `student_id`, `class_id`, `description`, `Term`, `Session`, `amount`, `receiptID`, `dateadded`) VALUES
(1, '2018-02-08', 'Rand Merchant Bank', '83477', '2018-02-10 08:58:16', '15', '3', 'Part Payment for school fees', 'First Term', '2015/2016', '50000', '63477', '2018-02-10 08:00:27'),
(2, '2018-02-09', 'Access Bank', '23423456645', '2018-02-10 13:30:59', '9', '3', 'School fees', 'First Term', '2015/2016', '25000', '66427736', '2018-02-10 12:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `gradebyclass`
--

CREATE TABLE `gradebyclass` (
  `id` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `classid` int(4) NOT NULL,
  `session` varchar(15) NOT NULL,
  `term` varchar(20) NOT NULL,
  `aggregatescore` int(5) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradebyclass`
--

INSERT INTO `gradebyclass` (`id`, `studentid`, `classid`, `session`, `term`, `aggregatescore`, `dateadded`) VALUES
(1, 'HCS8734', 4, '2017/2018', '1st Term', 124, '2018-03-14 14:30:44'),
(2, 'HCS7438', 4, '2017/2018', '1st Term', 155, '2018-03-14 14:30:44'),
(3, 'HCS7665', 4, '2017/2018', '1st Term', 150, '2018-03-14 14:30:44'),
(22, 'HCS8734', 4, '2015/2016', '1st Term', 0, '2018-03-14 14:44:31'),
(23, 'HCS7438', 4, '2015/2016', '1st Term', 0, '2018-03-14 14:44:31'),
(24, 'HCS7665', 4, '2015/2016', '1st Term', 0, '2018-03-14 14:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `gradebysubject`
--

CREATE TABLE `gradebysubject` (
  `gradeid` int(11) NOT NULL,
  `studentid` varchar(15) NOT NULL,
  `subjectid` int(5) NOT NULL,
  `classid` int(3) NOT NULL,
  `session` varchar(12) NOT NULL,
  `term` varchar(12) NOT NULL,
  `aggregatescore` int(5) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradebysubject`
--

INSERT INTO `gradebysubject` (`gradeid`, `studentid`, `subjectid`, `classid`, `session`, `term`, `aggregatescore`, `dateadded`) VALUES
(10, 'HCS8734', 89, 4, '2017/2018', '1st Term', 45, '2018-03-10 12:21:37'),
(11, 'HCS7438', 89, 4, '2017/2018', '1st Term', 88, '2018-03-10 12:21:37'),
(12, 'HCS7665', 89, 4, '2017/2018', '1st Term', 86, '2018-03-10 12:21:37'),
(157, 'HCS8734', 89, 4, '2015/2016', '1st Term', 0, '2018-03-11 16:53:21'),
(158, 'HCS7438', 89, 4, '2015/2016', '1st Term', 0, '2018-03-11 16:53:21'),
(159, 'HCS7665', 89, 4, '2015/2016', '1st Term', 0, '2018-03-11 16:53:21'),
(169, 'HCS643', 85, 11, '2017/2018', '1st Term', 0, '2018-03-14 13:07:26'),
(170, 'HCS643', 87, 11, '2017/2018', '1st Term', 0, '2018-03-14 13:07:35'),
(171, 'HCS643', 78, 11, '2017/2018', '1st Term', 31, '2018-03-14 13:09:08'),
(175, 'HCS8734', 0, 0, '2017/2018', '', 0, '2018-03-14 14:34:58'),
(176, 'HCS7438', 0, 0, '2017/2018', '', 0, '2018-03-14 14:34:58'),
(177, 'HCS7665', 0, 0, '2017/2018', '', 0, '2018-03-14 14:34:58'),
(181, 'HCS8734', 89, 0, '2017/2018', '', 99, '2018-03-14 14:36:01'),
(182, 'HCS7438', 89, 0, '2017/2018', '', 100, '2018-03-14 14:36:01'),
(183, 'HCS7665', 89, 0, '2017/2018', '', 100, '2018-03-14 14:36:01'),
(193, 'HCS8734', 90, 4, '2017/2018', '1st Term', 25, '2018-03-14 14:45:15'),
(194, 'HCS7438', 90, 4, '2017/2018', '1st Term', 55, '2018-03-14 14:45:15'),
(195, 'HCS7665', 90, 4, '2017/2018', '1st Term', 50, '2018-03-14 14:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `graderes`
--

CREATE TABLE `graderes` (
  `id` int(11) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `classid` varchar(5) NOT NULL,
  `subjectid` varchar(4) NOT NULL,
  `firstsecondthirdexam` varchar(10) NOT NULL,
  `result` varchar(4) NOT NULL,
  `teacherid` varchar(4) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `graderes`
--

INSERT INTO `graderes` (`id`, `studentid`, `term`, `session`, `classid`, `subjectid`, `firstsecondthirdexam`, `result`, `teacherid`, `dateadded`) VALUES
(18, 'HCS643', '1st Term', '2017/2018', '11', '37', 'first', '3', '', '2018-02-19 11:31:30'),
(19, 'HCS643', '1st Term', '2017/2018', '11', '37', 'second', '3', '', '2018-02-19 11:31:37'),
(20, 'HCS643', '1st Term', '2017/2018', '11', '37', 'third', '3', '', '2018-02-19 11:31:43'),
(21, 'HCS643', '1st Term', '2017/2018', '11', '38', 'first', '5', '', '2018-02-19 11:31:55'),
(25, 'HCS643', '1st Term', '2017/2018', '11', '38', 'second', '10', '', '2018-02-19 11:32:27'),
(30, 'HCS643', '1st Term', '2017/2018', '11', '39', 'first', '6', '', '2018-02-19 11:32:45'),
(31, 'HCS643', '1st Term', '2017/2018', '11', '39', 'second', '4', '', '2018-02-19 11:32:46'),
(33, 'HCS643', '1st Term', '2017/2018', '11', '39', 'third', '6', '', '2018-02-19 11:33:07'),
(38, 'HCS643', '1st Term', '2017/2018', '11', '38', 'third', '12', '', '2018-02-19 11:33:21'),
(40, 'HCS643', '1st Term', '2017/2018', '11', '40', 'first', '4', '', '2018-02-19 11:33:32'),
(41, 'HCS643', '1st Term', '2017/2018', '11', '40', 'second', '10', '', '2018-02-19 11:33:35'),
(42, 'HCS643', '1st Term', '2017/2018', '11', '40', 'third', '20', '', '2018-02-19 11:33:37'),
(43, 'HCS643', '1st Term', '2017/2018', '11', '42', 'first', '14', '', '2018-02-19 11:33:40'),
(45, 'HCS643', '1st Term', '2017/2018', '11', '42', 'second', '8', '', '2018-02-19 11:33:47'),
(46, 'HCS643', '1st Term', '2017/2018', '11', '42', 'third', '7', '', '2018-02-19 11:33:48'),
(47, 'HCS643', '1st Term', '2017/2018', '11', '44', 'first', '5', '', '2018-02-19 11:33:50'),
(49, 'HCS643', '1st Term', '2017/2018', '11', '44', 'second', '4', '', '2018-02-19 11:33:54'),
(50, 'HCS643', '1st Term', '2017/2018', '11', '44', 'third', '2', '', '2018-02-19 11:33:56'),
(51, 'HCS643', '1st Term', '2017/2018', '11', '45', 'first', '5', '', '2018-02-19 11:33:57'),
(52, 'HCS643', '1st Term', '2017/2018', '11', '45', 'second', '5', '', '2018-02-19 11:33:58'),
(53, 'HCS643', '1st Term', '2017/2018', '11', '45', 'third', '23', '', '2018-02-19 11:33:59'),
(54, 'HCS643', '1st Term', '2017/2018', '11', '46', 'first', '13', '', '2018-02-19 11:34:00'),
(55, 'HCS643', '1st Term', '2017/2018', '11', '46', 'second', '10', '', '2018-02-19 11:34:01'),
(56, 'HCS643', '1st Term', '2017/2018', '11', '46', 'third', '17', '', '2018-02-19 11:34:01'),
(57, 'HCS643', '1st Term', '2017/2018', '11', '47', 'first', '10', '', '2018-02-19 11:34:02'),
(58, 'HCS643', '1st Term', '2017/2018', '11', '47', 'second', '2', '', '2018-02-19 11:34:03'),
(59, 'HCS643', '1st Term', '2017/2018', '11', '47', 'third', '16', '', '2018-02-19 11:34:04'),
(60, 'HCS643', '1st Term', '2017/2018', '11', '48', 'first', '5', '', '2018-02-19 11:34:06'),
(61, 'HCS643', '1st Term', '2017/2018', '11', '48', 'second', '15', '', '2018-02-19 11:34:07'),
(62, 'HCS643', '1st Term', '2017/2018', '11', '48', 'third', '10', '', '2018-02-19 11:34:08'),
(63, 'HCS643', '1st Term', '2017/2018', '11', '49', 'first', '4', '', '2018-02-19 11:34:10'),
(64, 'HCS643', '1st Term', '2017/2018', '11', '49', 'second', '5', '', '2018-02-19 11:34:11'),
(65, 'HCS643', '1st Term', '2017/2018', '11', '49', 'third', '6', '', '2018-02-19 11:34:12'),
(66, 'HCS643', '1st Term', '2017/2018', '11', '50', 'first', '3', '', '2018-02-19 11:34:15'),
(67, 'HCS643', '1st Term', '2017/2018', '11', '50', 'second', '6', '', '2018-02-19 11:34:16'),
(68, 'HCS643', '1st Term', '2017/2018', '11', '50', 'third', '2', '', '2018-02-19 11:34:17'),
(69, 'HCS643', '1st Term', '2017/2018', '11', '51', 'first', '5', '', '2018-02-19 11:34:18'),
(70, 'HCS643', '1st Term', '2017/2018', '11', '51', 'second', '6', '', '2018-02-19 11:34:19'),
(71, 'HCS643', '1st Term', '2017/2018', '11', '51', 'third', '2', '', '2018-02-19 11:34:20'),
(72, 'HCS643', '1st Term', '2017/2018', '11', '52', 'first', '2', '', '2018-02-19 11:34:21'),
(73, 'HCS643', '1st Term', '2017/2018', '11', '52', 'second', '5', '', '2018-02-19 11:34:22'),
(74, 'HCS643', '1st Term', '2017/2018', '11', '52', 'third', '6', '', '2018-02-19 11:34:23'),
(75, 'HCS643', '1st Term', '2017/2018', '11', '53', 'first', '6', '', '2018-02-19 11:34:24'),
(76, 'HCS643', '1st Term', '2017/2018', '11', '53', 'second', '4', '', '2018-02-19 11:34:25'),
(77, 'HCS643', '1st Term', '2017/2018', '11', '53', 'third', '3', '', '2018-02-19 11:34:25'),
(78, 'HCS643', '1st Term', '2017/2018', '11', '54', 'first', '5', '', '2018-02-19 11:34:26'),
(79, 'HCS643', '1st Term', '2017/2018', '11', '54', 'second', '2', '', '2018-02-19 11:34:27'),
(80, 'HCS643', '1st Term', '2017/2018', '11', '54', 'third', '5', '', '2018-02-19 11:34:28'),
(81, 'HCS643', '1st Term', '2017/2018', '11', '56', 'first', '5', '', '2018-02-19 11:34:29'),
(82, 'HCS643', '1st Term', '2017/2018', '11', '56', 'second', '6', '', '2018-02-19 11:34:30'),
(83, 'HCS643', '1st Term', '2017/2018', '11', '56', 'third', '18', '', '2018-02-19 11:34:31'),
(84, 'HCS643', '1st Term', '2017/2018', '11', '57', 'first', '14', '', '2018-02-19 11:34:33'),
(125, 'HCS643', '1st Term', '2017/2018', '11', '57', 'second', '5', '', '2018-02-19 11:45:42'),
(126, 'HCS643', '1st Term', '2017/2018', '11', '57', 'third', '10', '', '2018-02-19 11:45:46'),
(127, 'HCS643', '1st Term', '2017/2018', '11', '89', 'first', '4', '', '2018-02-19 11:45:48'),
(130, 'HCS7438', '1st Term', '2017/2018', '4', '89', 'first', '4', '', '2018-02-19 13:57:15'),
(133, 'HCS7438', '1st Term', '2017/2018', '4', '89', 'second', '2', '', '2018-02-19 13:57:48'),
(135, 'HCS7438', '1st Term', '2017/2018', '4', '89', 'third', '12', '', '2018-02-19 13:57:51'),
(147, 'HCS643', '1st Term', '2017/2018', '11', '79', 'first', '5', '', '2018-02-19 14:12:45'),
(148, 'HCS643', '1st Term', '2017/2018', '11', '79', 'second', '8', '', '2018-02-19 14:12:46'),
(150, 'HCS643', '1st Term', '2017/2018', '11', '79', 'third', '16', '', '2018-02-19 14:12:54'),
(163, 'HCS643', '1st Term', '2017/2018', '11', '89', 'second', '5', '', '2018-02-19 14:14:10'),
(164, 'HCS643', '1st Term', '2017/2018', '11', '89', 'third', '4', '', '2018-02-19 14:14:11'),
(166, 'HCS643', '1st Term', '2017/2018', '11', '78', 'first', '6', '', '2018-02-19 14:14:27'),
(167, 'HCS643', '1st Term', '2017/2018', '11', '78', 'second', '8', '', '2018-02-19 14:14:30'),
(168, 'HCS643', '1st Term', '2017/2018', '11', '78', 'third', '16', '', '2018-02-19 14:14:37'),
(187, 'HCS7438', '1st Term', '2017/2018', '4', '89', 'exam', '5', '', '2018-02-25 08:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `sn` int(11) NOT NULL,
  `TeacherID` varchar(10) NOT NULL,
  `StudentID` varchar(10) NOT NULL,
  `ClassID` varchar(20) NOT NULL,
  `SubjectID` varchar(30) NOT NULL,
  `ClassExercise` varchar(3) NOT NULL,
  `Assignment` varchar(3) NOT NULL,
  `Quiz` varchar(3) NOT NULL,
  `FirstTest` int(2) NOT NULL,
  `SecondTest` int(2) NOT NULL,
  `Project` varchar(3) NOT NULL,
  `Exam` int(3) NOT NULL,
  `totalscore` varchar(3) NOT NULL,
  `Grade` varchar(2) NOT NULL,
  `Position` varchar(6) NOT NULL,
  `Term` varchar(10) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `publishStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `historiesid` int(11) NOT NULL,
  `hospid` varchar(15) NOT NULL,
  `histtype` varchar(20) NOT NULL,
  `histcontent` varchar(25) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `historydetails`
--

CREATE TABLE `historydetails` (
  `historyid` int(11) NOT NULL,
  `hospitalid` varchar(25) NOT NULL,
  `historytype` varchar(50) NOT NULL,
  `historycontent` text NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historydetails`
--

INSERT INTO `historydetails` (`historyid`, `hospitalid`, `historytype`, `historycontent`, `dateadded`) VALUES
(1, 'sdsdf', 'dfbdfg', 'dfgdfg', '2018-03-12 16:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `linkages`
--

CREATE TABLE `linkages` (
  `ID` int(11) NOT NULL,
  `ParentID` varchar(10) NOT NULL,
  `StudentID` varchar(10) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `linkages`
--

INSERT INTO `linkages` (`ID`, `ParentID`, `StudentID`, `Status`) VALUES
(1, 'HCS5339RK', 'HCS8734', 1),
(2, 'HCS5339RK', 'HCS7665', 1),
(3, 'HCS5339RK', 'HCS546', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `sn` int(11) NOT NULL,
  `content` text NOT NULL,
  `subject` varchar(40) NOT NULL,
  `datesent` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`sn`, `content`, `subject`, `datesent`) VALUES
(1, '<p>Hi there,</p><p><br></p><p>We are always here, Thanks for reaching out last week.</p>', 'Newsletters this month', '2018-01-16 13:00:22'),
(2, '<p>Hi there, We are always here. Thanks for all&nbsp;</p>', 'Hi', '2018-01-16 13:01:41'),
(3, '<p>Hi there</p>', 'Hello parents', '2018-01-24 00:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `nexttermbegins`
--

CREATE TABLE `nexttermbegins` (
  `id` int(11) NOT NULL,
  `term` varchar(20) NOT NULL,
  `session` varchar(15) NOT NULL,
  `nextermbegins` varchar(100) NOT NULL,
  `classid` varchar(5) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parentsregister`
--

CREATE TABLE `parentsregister` (
  `ParentID` varchar(10) NOT NULL,
  `ParentSurname` varchar(20) NOT NULL,
  `ParentFirstname` varchar(20) NOT NULL,
  `ParentName` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `religion` varchar(15) NOT NULL,
  `status` int(2) NOT NULL,
  `emailnotification` int(2) NOT NULL,
  `newslettersubscription` int(2) NOT NULL,
  `officeaddress` text NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parentsregister`
--

INSERT INTO `parentsregister` (`ParentID`, `ParentSurname`, `ParentFirstname`, `ParentName`, `Email`, `Password`, `phoneNumber`, `religion`, `status`, `emailnotification`, `newslettersubscription`, `officeaddress`, `occupation`, `dateadded`) VALUES
('', 'Olaitan', 'David', 'Olaitan David', 'jkagbede@gmail.com', 'OIHLHL', '07055518205', 'Christianity', 1, 1, 1, 'Bacita', 'Medical Doctor', '2018-03-13 10:42:48'),
('HCS5339RF', 'Olowop', 'Ologun', 'Olowop Ologun', 'jiasdhf@gjiasd.com', 'NNLIBF', '07030494094', 'Christianity', 1, 1, 1, 'Ibrahim Taiwo road, Bacita', 'Medical Doctor', '2018-01-23 11:52:12'),
('HCS5339RK', 'Ibrahim Omotola', 'James Adetula', 'Ibrahim Omotola James Adetula', 'james321@yahoo.com', 'Gbegi_123', '07055518208', '', 1, 0, 0, '', '', '2018-01-23 11:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `paycatbreakdown`
--

CREATE TABLE `paycatbreakdown` (
  `breakdownid` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `session` varchar(15) NOT NULL,
  `amount` int(7) NOT NULL,
  `remark` varchar(40) NOT NULL,
  `paytype` varchar(15) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paycatbreakdown`
--

INSERT INTO `paycatbreakdown` (`breakdownid`, `description`, `session`, `amount`, `remark`, `paytype`, `dateadded`) VALUES
(1, 'Grade 1 - 2017/2018', '', 70000, 'Tuition', 'Sessional', '2018-02-25 11:33:24'),
(2, 'Grade 1 - 2017/2018', '', 0, 'End Of Year Party', 'Sessional', '2018-02-25 11:35:07'),
(3, 'Grade 1 - 2017/2018', '', 1000, 'Textbooks', 'Sessional', '2018-02-25 11:35:39'),
(13, 'Grade 1 - 2017/2018', '', 1000, 'Stationeries', 'Optional', '2018-02-25 13:33:11'),
(14, 'Grade 1 - 2017/2018', '', 1000, 'Development Levy', 'Optional', '2018-02-25 13:33:26'),
(15, 'Grade 1 - 2017/2018', '', 1000, 'Registration Form', 'Optional', '2018-02-25 13:33:42'),
(16, 'Grade 1 - 2017/2018', '', 1000, 'Uniform/Tie', 'Optional', '2018-02-25 13:33:58'),
(17, 'Grade 1 - 2017/2018', '', 1000, 'SportsWear', 'Optional', '2018-02-25 13:34:12'),
(18, 'Grade 1 - 2017/2018', '', 5000, 'Cardigan', 'Optional', '2018-02-25 13:34:29'),
(19, 'Grade 1 - 2017/2018', '', 1500, 'School Bus Arepo', 'Optional', '2018-02-25 13:34:54'),
(20, 'Grade 1 - 2017/2018', '', 20000, 'School Bus Magboro/Wawa/Punch/MFM', 'Optional', '2018-02-25 13:35:47'),
(21, 'Grade 1 - 2017/2018', '', 20000, 'School Bus Ibafo/Makogi', 'Optional', '2018-02-25 13:36:06'),
(22, 'Grade 1 - 2017/2018', '', 5000, 'Lunch', 'Optional', '2018-02-25 13:36:22'),
(23, 'Grade 1 - 2017/2018', '', 5000, 'Club', 'Optional', '2018-02-25 13:36:32'),
(24, 'Grade 1 - 2017/2018', '', 10000, 'Excursion', 'Optional', '2018-02-25 13:36:45'),
(25, 'Grade 1 - 2017/2018', '', 4000, 'Customized socks', 'Optional', '2018-02-25 13:37:07'),
(26, 'Grade 1 - 2017/2018', '', 5000, 'PTA Levy', 'Sessional', '2018-02-25 13:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `paymentcategory`
--

CREATE TABLE `paymentcategory` (
  `categoryid` int(11) NOT NULL,
  `paymentname` varchar(30) NOT NULL,
  `session` varchar(10) NOT NULL,
  `paymentdescription` text NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentcategory`
--

INSERT INTO `paymentcategory` (`categoryid`, `paymentname`, `session`, `paymentdescription`, `dateadded`) VALUES
(7, 'Grade 1', '2017/2018', '', '2018-02-25 11:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `paymentsmade`
--

CREATE TABLE `paymentsmade` (
  `id` int(11) NOT NULL,
  `itemid` int(4) NOT NULL,
  `amountpaid` varchar(6) NOT NULL,
  `stdid` int(4) NOT NULL,
  `term` varchar(15) NOT NULL,
  `session` varchar(15) NOT NULL,
  `datv` date NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentsmade`
--

INSERT INTO `paymentsmade` (`id`, `itemid`, `amountpaid`, `stdid`, `term`, `session`, `datv`, `dateadded`) VALUES
(1, 1, '50000', 20, 'First term', '2017/2018', '2018-02-27', '2018-02-27 05:37:37'),
(2, 16, '500', 20, 'First term', '2017/2018', '2018-02-27', '2018-02-27 05:37:56'),
(3, 16, '500', 20, 'First term', '2017/2018', '2018-02-26', '2018-02-27 05:40:35'),
(5, 18, '5000', 20, 'First term', '2017/2018', '2018-02-27', '2018-02-27 14:10:56'),
(6, 1, '60000', 25, 'First term', '2017/2018', '2018-03-04', '2018-03-04 12:47:35'),
(7, 3, '1000', 25, 'First term', '2017/2018', '2018-03-04', '2018-03-04 12:48:04'),
(8, 13, '1000', 25, 'First term', '2017/2018', '2018-03-04', '2018-03-04 12:48:14'),
(9, 18, '5000', 25, 'First term', '2017/2018', '2018-03-04', '2018-03-04 12:48:23'),
(10, 1, '10000', 25, 'First term', '2017/2018', '2018-04-08', '2018-04-08 12:50:25'),
(11, 1, '10000', 20, 'First term', '2017/2018', '2018-03-06', '2018-03-06 15:17:42'),
(12, 1, '40000', 24, 'First term', '2017/2018', '2018-03-06', '2018-03-06 17:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `payschoolbill`
--

CREATE TABLE `payschoolbill` (
  `schoolbillid` int(11) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `term` varchar(15) NOT NULL,
  `billitemid` int(3) NOT NULL,
  `billitemamount` int(7) NOT NULL,
  `paymentmade` int(7) NOT NULL,
  `datepaid` date NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payschoolbill`
--

INSERT INTO `payschoolbill` (`schoolbillid`, `studentid`, `session`, `term`, `billitemid`, `billitemamount`, `paymentmade`, `datepaid`, `dateadded`) VALUES
(2, '20', '2017/2018', 'First term', 2, 0, 0, '0000-00-00', '2018-02-26 07:12:52'),
(8, '20', '2017/2018', 'First term', 1, 70000, 0, '0000-00-00', '2018-02-26 12:36:21'),
(9, '20', '2017/2018', 'First term', 3, 1000, 0, '0000-00-00', '2018-02-26 12:36:25'),
(10, '20', '2017/2018', 'First term', 14, 1000, 0, '0000-00-00', '2018-02-26 12:36:29'),
(11, '20', '2017/2018', 'First term', 16, 1000, 0, '0000-00-00', '2018-02-26 12:36:32'),
(12, '20', '2017/2018', 'First term', 18, 5000, 0, '0000-00-00', '2018-02-26 12:36:36'),
(15, '20', '2017/2018', 'First term', 22, 5000, 0, '0000-00-00', '2018-02-26 19:32:13'),
(16, '20', '2017/2018', 'First term', 3, 1000, 0, '0000-00-00', '2018-02-26 19:32:21'),
(17, '20', '2017/2018', 'First term', 24, 10000, 0, '0000-00-00', '2018-02-26 19:33:06'),
(18, '25', '2017/2018', 'First term', 1, 70000, 0, '0000-00-00', '2018-03-04 12:46:07'),
(19, '25', '2017/2018', 'First term', 3, 1000, 0, '0000-00-00', '2018-03-04 12:46:11'),
(20, '25', '2017/2018', 'First term', 13, 1000, 0, '0000-00-00', '2018-03-04 12:46:15'),
(21, '25', '2017/2018', 'First term', 18, 5000, 0, '0000-00-00', '2018-03-04 12:46:21'),
(22, '24', '2017/2018', 'First term', 1, 70000, 0, '0000-00-00', '2018-03-06 17:26:31'),
(23, '24', '2017/2018', 'First term', 3, 1000, 0, '0000-00-00', '2018-03-06 17:26:39'),
(24, '24', '2017/2018', 'First term', 13, 1000, 0, '0000-00-00', '2018-03-06 17:26:42'),
(25, '24', '2017/2018', 'First term', 20, 20000, 0, '0000-00-00', '2018-03-06 17:26:46'),
(26, '24', '2017/2018', 'First term', 15, 1000, 0, '0000-00-00', '2018-03-06 17:26:50'),
(27, '24', '2017/2018', 'First term', 24, 10000, 0, '0000-00-00', '2018-03-06 17:26:56'),
(28, '24', '2017/2018', 'First term', 26, 5000, 0, '0000-00-00', '2018-03-06 17:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `playnurresult`
--

CREATE TABLE `playnurresult` (
  `id` int(11) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `classid` int(10) NOT NULL,
  `subjectid` int(5) NOT NULL,
  `firstsecondthirdexam` varchar(20) NOT NULL,
  `result` varchar(4) NOT NULL,
  `teacherid` int(2) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playnurresult`
--

INSERT INTO `playnurresult` (`id`, `studentid`, `term`, `session`, `classid`, `subjectid`, `firstsecondthirdexam`, `result`, `teacherid`, `dateadded`) VALUES
(31, 'HCS7438', '1st Term', '2017/2018', 4, 89, 'second', '8', 0, '2018-03-03 09:29:30'),
(32, 'HCS7438', '1st Term', '2017/2018', 4, 89, 'third', '10', 0, '2018-03-03 09:29:34'),
(33, 'HCS7438', '1st Term', '2017/2018', 4, 89, 'first', '5', 0, '2018-03-03 09:29:36'),
(37, 'HCS7438', '1st Term', '2017/2018', 4, 89, 'exam', '65', 0, '2018-03-03 10:21:16'),
(39, 'HCS546', '1st Term', '2017/2018', 10, 60, '', 'E', 0, '2018-03-03 13:34:44'),
(40, 'HCS546', '2nd Term', '2017/2018', 10, 60, '', 'R', 0, '2018-03-03 13:34:45'),
(41, 'HCS546', '3rd Term', '2017/2018', 10, 60, '', 'W', 0, '2018-03-03 13:34:48'),
(42, 'HCS546', '1st Term', '2017/2018', 10, 61, '', 'F', 0, '2018-03-03 13:34:51'),
(43, 'HCS546', '2nd Term', '2017/2018', 10, 61, '', 'E', 0, '2018-03-03 13:34:52'),
(44, 'HCS546', '3rd Term', '2017/2018', 10, 61, '', 'G', 0, '2018-03-03 13:34:56'),
(45, 'HCS546', '1st Term', '2017/2018', 10, 62, '', 'D', 0, '2018-03-03 13:34:57'),
(46, 'HCS546', '2nd Term', '2017/2018', 10, 62, '', 'S', 0, '2018-03-03 13:34:58'),
(47, 'HCS546', '3rd Term', '2017/2018', 10, 62, '', 'G', 0, '2018-03-03 13:34:59'),
(48, 'HCS546', '3rd Term', '2017/2018', 10, 63, '', 'N', 0, '2018-03-03 13:34:59'),
(49, 'HCS546', '2nd Term', '2017/2018', 10, 63, '', 'V', 0, '2018-03-03 13:35:00'),
(50, 'HCS546', '1st Term', '2017/2018', 10, 63, '', 'N', 0, '2018-03-03 13:35:01'),
(51, 'HCS546', '1st Term', '2017/2018', 10, 64, '', 'D', 0, '2018-03-03 13:35:02'),
(52, 'HCS546', '2nd Term', '2017/2018', 10, 64, '', 'S', 0, '2018-03-03 13:35:02'),
(53, 'HCS546', '3rd Term', '2017/2018', 10, 64, '', 'F', 0, '2018-03-03 13:35:03'),
(54, 'HCS7665', '1st Term', '2017/2018', 4, 89, 'first', '6', 0, '2018-04-08 13:11:53'),
(55, 'HCS7665', '1st Term', '2017/2018', 4, 89, 'second', '5', 0, '2018-04-08 13:11:53'),
(56, 'HCS7665', '1st Term', '2017/2018', 4, 89, 'third', '15', 0, '2018-04-08 13:11:54'),
(63, 'HCS7665', '1st Term', '2017/2018', 4, 89, 'exam', '60', 0, '2018-04-08 13:13:22'),
(66, 'HCS8734', '1st Term', '2017/2018', 4, 89, 'exam', '45', 0, '2018-03-10 12:34:10'),
(67, 'HCS72384', '1st Term', '2017/2018', 3, 37, '', '', 0, '2018-03-11 17:34:46'),
(69, 'HCS546', '1st Term', '2017/2018', 10, 60, 'first', '8', 0, '2018-03-14 06:58:06'),
(70, 'HCS546', '1st Term', '2017/2018', 10, 60, 'second', '4', 0, '2018-03-14 06:58:07'),
(71, 'HCS546', '1st Term', '2017/2018', 10, 60, 'third', '15', 0, '2018-03-14 06:58:09'),
(73, 'HCS643', '1st Term', '2017/2018', 11, 37, 'first', '10', 0, '2018-03-14 13:08:00'),
(74, 'HCS643', '1st Term', '2017/2018', 11, 37, 'second', '8', 0, '2018-03-14 13:08:01'),
(75, 'HCS643', '1st Term', '2017/2018', 11, 37, 'third', '15', 0, '2018-03-14 13:08:03'),
(77, 'HCS643', '1st Term', '2017/2018', 11, 78, 'first', '4', 0, '2018-03-14 13:08:54'),
(78, 'HCS643', '1st Term', '2017/2018', 11, 78, 'second', '8', 0, '2018-03-14 13:08:55'),
(79, 'HCS643', '1st Term', '2017/2018', 11, 78, 'third', '19', 0, '2018-03-14 13:08:57'),
(86, 'HCS7438', '1st Term', '2017/2018', 4, 90, 'exam', '55', 0, '2018-03-14 14:38:34'),
(87, 'HCS8734', '1st Term', '2017/2018', 4, 90, 'exam', '25', 0, '2018-03-14 14:38:57'),
(88, 'HCS7665', '1st Term', '2017/2018', 4, 90, 'exam', '50', 0, '2018-03-14 14:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `portalmessage`
--

CREATE TABLE `portalmessage` (
  `SN` int(11) NOT NULL,
  `senderID` varchar(10) NOT NULL,
  `Recipient` varchar(10) NOT NULL,
  `MessageContent` text NOT NULL,
  `Date` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `registeredDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portalmessage`
--

INSERT INTO `portalmessage` (`SN`, `senderID`, `Recipient`, `MessageContent`, `Date`, `status`, `registeredDate`) VALUES
(1, '', 'Admin', '(Parent) - Mar/5/2018<hr style=>zxcxc', 'Mar/5/2018', 0, '2018-03-05 10:51:25'),
(2, '', 'Admin', '(Parent) - Mar/5/2018<hr style=>zxcxc', 'Mar/5/2018', 0, '2018-03-05 10:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `preregisteredstudents`
--

CREATE TABLE `preregisteredstudents` (
  `SN` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Class` varchar(10) NOT NULL,
  `Address` text NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `registeredBy` varchar(20) NOT NULL,
  `RegDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schclass`
--

CREATE TABLE `schclass` (
  `SN` int(11) NOT NULL,
  `ClassName` varchar(20) NOT NULL,
  `schooltype` int(1) NOT NULL,
  `addinfo` varchar(5) NOT NULL,
  `paymentcatid` int(2) NOT NULL,
  `ClassTeacher` varchar(50) NOT NULL,
  `reportcardtemplate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schclass`
--

INSERT INTO `schclass` (`SN`, `ClassName`, `schooltype`, `addinfo`, `paymentcatid`, `ClassTeacher`, `reportcardtemplate`) VALUES
(3, 'PLAY GROUP', 1, '', 0, 'HCS2351', ''),
(4, 'GRADE 1', 4, '', 0, 'HCS2351', ''),
(5, 'GRADE 2', 4, '', 0, 'HCS4311', ''),
(6, 'GRADE 3', 4, '', 0, '', ''),
(7, 'GRADE 4', 4, '', 0, 'HCS6663', ''),
(8, 'GRADE 6', 4, '', 0, '', ''),
(9, 'GRADE 5', 4, '', 0, '', ''),
(10, 'NURSERY 1', 3, '1', 3, 'HCS2351', ''),
(11, 'NURSERY 2', 3, '2', 3, 'HCS2351', ''),
(12, 'RECEPTION', 2, '', 0, 'HCS2351', '');

-- --------------------------------------------------------

--
-- Table structure for table `schooladmin`
--

CREATE TABLE `schooladmin` (
  `SN` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Status` int(11) NOT NULL,
  `Role` varchar(25) NOT NULL,
  `SchID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schooladmin`
--

INSERT INTO `schooladmin` (`SN`, `Username`, `Password`, `Name`, `Status`, `Role`, `SchID`) VALUES
(1, 'jkagbede@gmail.com', 'Gbegi_1236', 'Dr. Kayode Agbede', 1, 'Admin', 'AGIC0001');

-- --------------------------------------------------------

--
-- Table structure for table `schoolevents`
--

CREATE TABLE `schoolevents` (
  `SN` int(11) NOT NULL,
  `eventName` varchar(40) NOT NULL,
  `eventDescription` varchar(140) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `publish` varchar(2) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolevents`
--

INSERT INTO `schoolevents` (`SN`, `eventName`, `eventDescription`, `startDate`, `endDate`, `publish`, `dateCreated`) VALUES
(4, 'HAVARD GRADUATION CEREMONY', '...', '2018-03-16', '2018-03-30', '1', '2018-03-02 18:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `schoolinfo`
--

CREATE TABLE `schoolinfo` (
  `id` int(11) NOT NULL,
  `schoolname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `schoolproprietor` varchar(40) NOT NULL,
  `schoolproprietress` varchar(40) NOT NULL,
  `signature` varchar(50) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolinfo`
--

INSERT INTO `schoolinfo` (`id`, `schoolname`, `address`, `schoolproprietor`, `schoolproprietress`, `signature`, `dateadded`) VALUES
(1, 'Havard Children School', 'Plot 38, Aribido Oshola Street, KM 32 Along Lagos-Ibadan Express Way, Arepo, Ogun State', 'Mr. Ibiyemi', 'Mrs. A.V Ibiyemi', 'images/teachersignature/tableleader.png', '2018-02-07 14:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `schoolresumes`
--

CREATE TABLE `schoolresumes` (
  `id` int(11) NOT NULL,
  `term` varchar(15) NOT NULL,
  `session` varchar(15) NOT NULL,
  `nextermbegins` varchar(100) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolresumes`
--

INSERT INTO `schoolresumes` (`id`, `term`, `session`, `nextermbegins`, `dateadded`) VALUES
(1, '1st Term', '2017/2018', '15th November 2018', '2018-03-14 15:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `schooltypes`
--

CREATE TABLE `schooltypes` (
  `typeid` int(11) NOT NULL,
  `typename` varchar(15) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schooltypes`
--

INSERT INTO `schooltypes` (`typeid`, `typename`, `dateadded`) VALUES
(1, 'Playgroup', '2018-01-29 15:11:50'),
(2, 'Reception', '2018-01-29 15:11:50'),
(3, 'Nursery', '2018-01-29 15:12:11'),
(4, 'Grades', '2018-01-29 15:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `schstaff`
--

CREATE TABLE `schstaff` (
  `SN` int(11) NOT NULL,
  `StaffName` varchar(60) NOT NULL,
  `StaffID` varchar(20) NOT NULL,
  `StaffAddress` text NOT NULL,
  `StaffPhone` varchar(15) NOT NULL,
  `StaffCredentials` varchar(200) NOT NULL,
  `StaffEmail` varchar(30) NOT NULL,
  `StaffPassword` varchar(20) NOT NULL,
  `signature` varchar(150) NOT NULL,
  `Role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schstaff`
--

INSERT INTO `schstaff` (`SN`, `StaffName`, `StaffID`, `StaffAddress`, `StaffPhone`, `StaffCredentials`, `StaffEmail`, `StaffPassword`, `signature`, `Role`) VALUES
(1, 'Mr. Toyin Olatayo', 'HCS2351', 'Bacita, Kwara State', '07054123361', 'M.Sc.', 'jkagbede@gmail.com', 'Amazing441/', 'images/teachersignature/Barack-Obama-signature-svg.jpg', ''),
(2, 'Ibrahim Olaitan', 'HCS4311', 'Ibrahim Taiwo road', '080634663477', 'M.Sc', 'jiji@hht.com', 'Amazing788@', 'images/teachersignature/tableleader.png', 'Bursar'),
(3, 'Mr. Adediran Olatinwo', 'HCS6663', 'Bacita', '08035462364', 'M.Sc accounting, Havard', 'github@gitty.com', 'Amazing459', 'images/teachersignature/tableleader.png', 'Bursar');

-- --------------------------------------------------------

--
-- Table structure for table `schstdstrack`
--

CREATE TABLE `schstdstrack` (
  `trackid` int(11) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `classid` int(3) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schstudent`
--

CREATE TABLE `schstudent` (
  `StudentID` int(11) NOT NULL,
  `schoolid` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Middlename` varchar(50) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `dateofbirth` date NOT NULL,
  `gender` varchar(7) NOT NULL,
  `ClassID` int(3) NOT NULL,
  `HomeAddress` text NOT NULL,
  `lga` varchar(25) NOT NULL,
  `stateoforigin` varchar(20) NOT NULL,
  `EmailAddress` varchar(30) NOT NULL,
  `Prevschools` text NOT NULL,
  `Bloodgroup` varchar(10) NOT NULL,
  `Genotype` varchar(10) NOT NULL,
  `nationality` varchar(35) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `healthstatus` varchar(20) NOT NULL,
  `passportphoto` varchar(150) NOT NULL,
  `dateSaved` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schstudent`
--

INSERT INTO `schstudent` (`StudentID`, `schoolid`, `Surname`, `Middlename`, `Firstname`, `dateofbirth`, `gender`, `ClassID`, `HomeAddress`, `lga`, `stateoforigin`, `EmailAddress`, `Prevschools`, `Bloodgroup`, `Genotype`, `nationality`, `religion`, `healthstatus`, `passportphoto`, `dateSaved`) VALUES
(9, 'HCS72384', 'Ibrahim', 'James', 'Thomas', '2018-02-01', 'Male', 3, 'Ilorin', 'Oyun', 'Kwara', '', 'James brown School', 'O+', 'AA', 'Nigerian', 'Christianity', 'Great shape', 'images/passportphoto/i_love_you.jpg', '2018-02-03 13:36:53'),
(15, 'HCS72685', 'Olotu', 'James', 'Thomass', '2018-02-14', 'Female', 3, 'Ilorin', 'Oyun', 'Kwara', '', 'James brown Schoolh', 'O+', 'AA', 'Nigerian', 'Christianity', 'Great shapes', 'images/passportphoto/afr1.JPG', '2018-02-03 15:34:39'),
(20, 'HCS8734', 'Alanni', 'Temitope', 'Ibrahim', '2018-02-01', 'Female', 4, 'Ahmadu Bello', 'Oyun', 'Kwara', '', 'NIYAMCO', 'O+', 'AA', 'Nigerian', 'Christianity', 'Great health', '', '2018-02-03 16:06:33'),
(21, 'HCS8545', 'Emmanuel', 'Olukotun', 'Ibrahim', '2010-06-09', 'Female', 12, 'Arepo Lagos', 'Oyun', 'Kwara', '', 'Ibrahim School', 'O+', 'AA', 'Nigerian', 'Christianity', 'Very healthy', 'images/passportphoto/African-American-Nursing-Scholarship-Student.jpg', '2018-02-07 17:09:46'),
(22, 'HCS643', 'Temilola', 'Banji', 'Olatayo', '2018-02-01', 'Male', 11, 'Ahmadu Bello, Bacita', 'Ibadan', 'Oyo', '', 'Nil', 'O+', 'AA', 'Libya', 'Christianity', 'Healthy', 'images/passportphoto/afr1.JPG', '2018-02-08 19:55:16'),
(23, 'HCS546', 'Olotu', 'O', 'Olugbenga', '2012-02-08', 'Male', 10, 'Ibrahim Taiwo Rd', 'Oyun', 'Kwara', '', 'UNILORIN', 'O', 'AS', 'Nigeria', 'Christianity', 'O Positive', 'images/passportphoto/Navya.JPG', '2018-02-12 13:35:27'),
(24, 'HCS7438', 'Ibrahim', 'Tolani', 'James', '2018-02-01', 'Male', 4, '64/65 Ahmadu Bello', 'Oyun', 'Kwara', '', 'Onireke schools', 'O+', 'AA', 'Nigerian', 'Christianity', 'Healthy', 'images/passportphoto/business-meeting.jpg', '2018-02-15 10:34:40'),
(25, 'HCS7665', 'Agbede', 'Joseph', 'Kayode', '2018-03-01', 'Male', 4, 'Arepo express way', 'Agege', 'Lagos', '', 'Havilah', 'O+', 'AA', 'Nigerian', 'Christianity', 'Okay', 'images/passportphoto/6686290_xxl.jpg', '2018-03-04 13:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `scorable`
--

CREATE TABLE `scorable` (
  `scoreid` int(11) NOT NULL,
  `obtainablescore` varchar(5) NOT NULL,
  `obtainedscore` varchar(5) NOT NULL,
  `percentage` varchar(5) NOT NULL,
  `session` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffrole`
--

CREATE TABLE `staffrole` (
  `roleid` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentclassinfo`
--

CREATE TABLE `studentclassinfo` (
  `studentclassid` int(11) NOT NULL,
  `studentschoolid` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `paymentstructureid` int(4) NOT NULL,
  `classid` int(2) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentclassinfo`
--

INSERT INTO `studentclassinfo` (`studentclassid`, `studentschoolid`, `session`, `paymentstructureid`, `classid`, `dateadded`) VALUES
(3, 'HCS72384', '2017/2018', 0, 3, '2018-02-03 12:36:53'),
(4, 'HCS72685', '2017/2018', 0, 3, '2018-02-03 14:34:39'),
(5, 'HCS8734', '2017/2018', 0, 3, '2018-02-03 15:06:33'),
(6, 'HCS8545', '2017/2018', 0, 12, '2018-02-07 16:09:46'),
(7, 'HCS643', '2017/2018', 3, 11, '2018-02-08 18:55:16'),
(8, 'HCS546', '2017/2018', 3, 10, '2018-02-12 12:35:27'),
(9, 'HCS7438', '2017/2018', 0, 4, '2018-02-15 09:34:40'),
(10, 'HCS7665', '2017/2018', 0, 4, '2018-03-04 12:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `subjectcat`
--

CREATE TABLE `subjectcat` (
  `catid` int(11) NOT NULL,
  `schooltypeid` int(2) NOT NULL,
  `subjectcatname` varchar(40) NOT NULL,
  `catdescription` text NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectcat`
--

INSERT INTO `subjectcat` (`catid`, `schooltypeid`, `subjectcatname`, `catdescription`, `dateadded`) VALUES
(1, 2, 'READING READINESS', '(Basic concepts word Analysis, Fluency, Systematic Vocabulary Development)', '2018-01-29 15:26:18'),
(2, 2, 'LISTENING AND SPEAKING', '', '2018-01-29 15:26:18'),
(3, 2, 'BASIC CONCEPTS', '', '2018-01-29 15:26:45'),
(4, 2, 'WRITING', '', '2018-01-29 15:26:45'),
(5, 2, 'SOCIAL SKILL', '', '2018-01-29 15:27:24'),
(6, 2, 'SOCIAL STUDIES AND SCIENCE', '', '2018-01-29 15:27:24'),
(9, 3, 'Slimey', '', '2018-01-30 12:27:41'),
(10, 3, 'STUDY AND WORK SKILLS', '', '2018-01-30 13:13:33'),
(11, 3, 'HEALTH TRAINING', '', '2018-01-30 13:21:36'),
(12, 3, 'HEALTH TRAINING', '', '2018-01-30 13:21:36'),
(13, 12, 'READING READINESS', '', '2018-02-12 12:02:41'),
(14, 10, 'Nursery 1', '', '2018-02-12 13:19:11'),
(15, 10, 'General Assessment', '', '2018-02-12 13:21:49'),
(16, 11, 'NUR 2 SUBJECTS', '', '2018-02-12 14:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sn` int(11) NOT NULL,
  `SubjectID` varchar(20) NOT NULL,
  `subjectcode` varchar(10) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCategoryid` varchar(3) NOT NULL,
  `Subjectgroup` int(3) NOT NULL,
  `Compulsory` varchar(20) NOT NULL,
  `TeacherID` varchar(10) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sn`, `SubjectID`, `subjectcode`, `SubjectName`, `SubjectCategoryid`, `Subjectgroup`, `Compulsory`, `TeacherID`, `dateadded`) VALUES
(2, '', '', 'Maintain firm grip of toys and', '3', 1, 'Mandatory', '', '2018-02-15 10:22:38'),
(4, '', '', 'Can open and close a book', '3', 2, 'Mandatory', '', '2018-02-15 10:22:38'),
(5, '', '', 'Observes nap time and playtime', '3', 2, 'Mandatory', '', '2018-02-15 10:22:38'),
(6, '', '', 'Understands and follows basic ', '3', 3, 'Mandatory', '', '2018-02-15 10:22:38'),
(8, '', '', 'Sound identification', '3', 3, 'Mandatory', '', '2018-02-15 10:22:38'),
(24, '', '', 'Identifying object', '3', 3, 'Mandatory', '', '2018-02-15 10:22:38'),
(36, '', '', 'Forms pre-writing strokes', '3', 3, 'Mandatory', '', '2018-02-15 10:22:38'),
(37, '', 'REC3241', 'Recognizes similarities and differences', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(38, '', '', 'Scribbles', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(39, 'PLAYCan', '', 'Can name items in the class', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(40, 'PLAYCan', '', 'Can paint and colour with little assistance', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(42, 'PLAYReca', '', 'Recalls basic frequently used words like come, bye, mom, take, dad', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(44, 'PLAYList', '', 'Listens to the teacher', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(45, 'PLAYStay', '', 'Stays on task', '3', 0, 'Mandatory', 'HCS2351', '2018-02-15 10:22:38'),
(46, 'PLAYComp', '', 'Completes and returns homework', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(47, 'PLAYDemo', '', 'Demonstrates organizational skills', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(48, 'PLAYInit', '', 'Initiates own leisure time a ctivities', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(49, 'PLAYFini', '', 'Finishes one activity before starting another', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(50, 'PLAYCan', '', 'Can work independently', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(51, 'PLAYCan', '', 'Can share', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(52, 'PLAYAcce', '', 'Accepts responsibility', '3', 0, 'Mandatory', 'HCS2351', '2018-02-15 10:22:38'),
(53, 'PLAYWork', '', 'Works and plays with others', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(54, 'PLAYIden', '', 'Identifies Primary Colours/shapes', '3', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(55, '3Anot', '', 'Another PlaygroupSubj', '3', 3, 'Mandatory', '', '2018-02-15 10:22:38'),
(56, '11Lite', '', 'Literacy', '11', 0, 'Mandatory', 'HCS4311', '2018-02-15 10:22:38'),
(57, '11Math', 'NWS8823', 'Mathematics', '11', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(59, '12Phon', 'PA', 'Phonemic Awareness', '12', 13, 'Mandatory', '', '2018-02-15 10:22:38'),
(60, '10Numb', 'numwork', 'Number work Numeracy activities', '10', 14, 'Mandatory', '', '2018-02-15 10:22:38'),
(61, '10Soun', 'numwork', 'Sound/Social Habit literacy activities', '10', 14, 'Mandatory', '', '2018-02-15 10:22:38'),
(62, '10Scie', 'numwork', 'Science', '10', 14, 'Mandatory', '', '2018-02-15 10:22:38'),
(63, '10Soci', 'numwork', 'Social Habit', '10', 14, 'Mandatory', '', '2018-02-15 10:22:38'),
(64, '10Crea', 'numwork', 'Creative Activities', '10', 14, 'Mandatory', '', '2018-02-15 10:22:38'),
(65, '10CRK/', 'numwork', 'CRK/Morals', '10', 14, 'Mandatory', '', '2018-02-15 10:22:38'),
(66, '10Hand', 'numwork', 'Handwriting', '10', 14, 'Mandatory', '', '2018-02-15 10:22:38'),
(67, '10Dict', 'numwork', 'Diction', '10', 14, 'Mandatory', '', '2018-02-15 10:22:38'),
(68, '10Sens', 'numwork', 'Sensorial e.g Shapes, Colour Sensory activities', '10', 14, 'Mandatory', '', '2018-02-15 10:22:38'),
(69, '10Rhym', 'numwork', 'Rhyme', '10', 14, 'Mandatory', '', '2018-02-15 10:22:38'),
(70, '10Atti', 'attl', 'Attitube e.g towards learning', '10', 15, 'Mandatory', '', '2018-02-15 10:22:38'),
(71, '10Beha', 'attl', 'Behaviour (Ettiquet)', '10', 15, 'Mandatory', '', '2018-02-15 10:22:38'),
(72, '10Comm', 'attl', 'Communication skills', '10', 15, 'Mandatory', '', '2018-02-15 10:22:38'),
(73, '10Punc', 'attl', 'Punctuality', '10', 15, 'Mandatory', '', '2018-02-15 10:22:38'),
(74, '10Grou', 'attl', 'Group work', '10', 15, 'Mandatory', '', '2018-02-15 10:22:38'),
(75, '10Soci', 'attl', 'Social Skills', '10', 15, 'Mandatory', '', '2018-02-15 10:22:38'),
(76, '10Writ', 'attl', 'Writing skills', '10', 15, 'Mandatory', '', '2018-02-15 10:22:38'),
(78, '11NUME', 'Nur2', 'NUMERACY', '11', 16, 'Mandatory', '', '2018-02-15 10:22:38'),
(79, '11PRIM', 'Nur2', 'PRIMARY SCIENCE', '11', 16, 'Mandatory', '', '2018-02-15 10:22:38'),
(80, '11INFO', 'Nur2', 'INFO. & COMM TECH (ICT)', '11', 16, 'Mandatory', '', '2018-02-15 10:22:38'),
(81, '11DICT', 'Nur2', 'DICTION', '11', 16, 'Mandatory', '', '2018-02-15 10:22:38'),
(82, '11FREN', 'Nur2', 'FRENCH', '11', 16, 'Mandatory', '', '2018-02-15 10:22:38'),
(83, '11SOCI', 'Nur2', 'SOCIAL STUDIES', '11', 16, 'Mandatory', '', '2018-02-15 10:22:38'),
(84, '11SENS', 'Nur2', 'SENSORIAL', '11', 16, 'Mandatory', '', '2018-02-15 10:22:38'),
(85, '11C.R.', 'Nur2', 'C.R.K/MORAL INSTRUCTION', '11', 16, 'Mandatory', '', '2018-02-15 10:22:38'),
(86, '11CREA', 'Nur2', 'CREATIVE ARTS', '11', 16, 'Mandatory', '', '2018-02-15 10:22:38'),
(87, '11HAND', 'Nur2', 'HANDWRITING', '11', 16, 'Mandatory', '', '2018-02-15 10:22:38'),
(88, '11PROJ', 'Nur2', 'PROJECT', '11', 16, 'Mandatory', '', '2018-02-15 10:22:38'),
(89, '4Math', 'MAT202', 'Mathematics', '4', 0, 'Mandatory', '', '2018-02-15 10:22:38'),
(90, '4Scie', 'SCE121', 'Science', '4', 0, 'Mandatory', '', '2018-03-14 14:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `teacherscomment`
--

CREATE TABLE `teacherscomment` (
  `id` int(11) NOT NULL,
  `teacherid` int(2) NOT NULL,
  `session` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `comment` varchar(80) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherscomment`
--

INSERT INTO `teacherscomment` (`id`, `teacherid`, `session`, `term`, `studentid`, `comment`, `dateadded`) VALUES
(1, 0, '2017/2018', '1st Term', 'HCS72685', 'He has done very well this term', '2018-02-20 16:41:00'),
(4, 4, '2017/2018', '1st Term', 'HCS546', '', '2018-02-20 17:53:00'),
(5, 4, '2017/2018', '1st Term', 'HCS8545', 'Student is doing amazing!', '2018-02-20 18:10:04'),
(6, 0, '2017/2018', '1st Term', 'HCS643', 'Excellent student', '2018-02-21 10:42:36'),
(9, 0, '2017/2018', '1st Term', 'HCS7438', 'Hi there.. this student is amazing', '2018-02-21 11:00:03'),
(11, 4, '2017/2018', '3rd Term', 'HCS7438', 'HI', '2018-02-21 11:02:53'),
(13, 0, '2017/2018', '1st Term', 'HCS8734', 'Hi there', '2018-03-14 07:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `termcalendar`
--

CREATE TABLE `termcalendar` (
  `sn` int(11) NOT NULL,
  `term` varchar(30) NOT NULL,
  `year` varchar(6) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `timeframe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation_register`
--
ALTER TABLE `accomodation_register`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendancesheet`
--
ALTER TABLE `attendancesheet`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `studentid` (`studentid`,`classid`,`session`,`term`);

--
-- Indexes for table `boarder`
--
ALTER TABLE `boarder`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `classteachersetting`
--
ALTER TABLE `classteachersetting`
  ADD UNIQUE KEY `TeacherID` (`TeacherID`);

--
-- Indexes for table `conduct`
--
ALTER TABLE `conduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cts`
--
ALTER TABLE `cts`
  ADD PRIMARY KEY (`TeacherID`),
  ADD UNIQUE KEY `TeacherEmail` (`TeacherEmail`);

--
-- Indexes for table `currentsession`
--
ALTER TABLE `currentsession`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `debtregister`
--
ALTER TABLE `debtregister`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `StudentID` (`StudentID`,`Term`,`Session`);

--
-- Indexes for table `defaultmessage`
--
ALTER TABLE `defaultmessage`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `fee_category`
--
ALTER TABLE `fee_category`
  ADD PRIMARY KEY (`Fee_Cat_ID`),
  ADD UNIQUE KEY `Class` (`Class`,`Session`,`Year`,`Item`,`Fee`);

--
-- Indexes for table `fee_transaction`
--
ALTER TABLE `fee_transaction`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `receiptID` (`receiptID`);

--
-- Indexes for table `gradebyclass`
--
ALTER TABLE `gradebyclass`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentid` (`studentid`,`session`,`term`);

--
-- Indexes for table `gradebysubject`
--
ALTER TABLE `gradebysubject`
  ADD PRIMARY KEY (`gradeid`),
  ADD UNIQUE KEY `studentid` (`studentid`,`subjectid`,`classid`,`session`,`term`);

--
-- Indexes for table `graderes`
--
ALTER TABLE `graderes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentid` (`studentid`,`term`,`session`,`classid`,`subjectid`,`firstsecondthirdexam`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `TeacherID` (`TeacherID`,`StudentID`,`ClassID`,`SubjectID`,`Term`,`Session`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`historiesid`);

--
-- Indexes for table `historydetails`
--
ALTER TABLE `historydetails`
  ADD PRIMARY KEY (`historyid`),
  ADD UNIQUE KEY `hospitalid` (`hospitalid`,`historytype`);

--
-- Indexes for table `linkages`
--
ALTER TABLE `linkages`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ParentID` (`ParentID`,`StudentID`),
  ADD UNIQUE KEY `ParentID_2` (`ParentID`,`StudentID`),
  ADD UNIQUE KEY `ParentID_3` (`ParentID`,`StudentID`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `subject` (`subject`);

--
-- Indexes for table `nexttermbegins`
--
ALTER TABLE `nexttermbegins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parentsregister`
--
ALTER TABLE `parentsregister`
  ADD PRIMARY KEY (`ParentID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `paycatbreakdown`
--
ALTER TABLE `paycatbreakdown`
  ADD PRIMARY KEY (`breakdownid`),
  ADD UNIQUE KEY `description` (`description`,`amount`,`remark`);

--
-- Indexes for table `paymentcategory`
--
ALTER TABLE `paymentcategory`
  ADD PRIMARY KEY (`categoryid`),
  ADD UNIQUE KEY `paymentname` (`paymentname`);

--
-- Indexes for table `paymentsmade`
--
ALTER TABLE `paymentsmade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payschoolbill`
--
ALTER TABLE `payschoolbill`
  ADD PRIMARY KEY (`schoolbillid`);

--
-- Indexes for table `playnurresult`
--
ALTER TABLE `playnurresult`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentid` (`studentid`,`term`,`session`,`classid`,`subjectid`,`firstsecondthirdexam`);

--
-- Indexes for table `portalmessage`
--
ALTER TABLE `portalmessage`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `preregisteredstudents`
--
ALTER TABLE `preregisteredstudents`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `schclass`
--
ALTER TABLE `schclass`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `ClassName` (`ClassName`),
  ADD UNIQUE KEY `ClassName_2` (`ClassName`);

--
-- Indexes for table `schooladmin`
--
ALTER TABLE `schooladmin`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `schoolevents`
--
ALTER TABLE `schoolevents`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `eventName` (`eventName`,`eventDescription`,`startDate`,`endDate`);

--
-- Indexes for table `schoolinfo`
--
ALTER TABLE `schoolinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolresumes`
--
ALTER TABLE `schoolresumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schooltypes`
--
ALTER TABLE `schooltypes`
  ADD PRIMARY KEY (`typeid`);

--
-- Indexes for table `schstaff`
--
ALTER TABLE `schstaff`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `StaffEmail` (`StaffEmail`);

--
-- Indexes for table `schstdstrack`
--
ALTER TABLE `schstdstrack`
  ADD PRIMARY KEY (`trackid`);

--
-- Indexes for table `schstudent`
--
ALTER TABLE `schstudent`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `scorable`
--
ALTER TABLE `scorable`
  ADD PRIMARY KEY (`scoreid`);

--
-- Indexes for table `staffrole`
--
ALTER TABLE `staffrole`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `studentclassinfo`
--
ALTER TABLE `studentclassinfo`
  ADD PRIMARY KEY (`studentclassid`);

--
-- Indexes for table `subjectcat`
--
ALTER TABLE `subjectcat`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `SubjectName` (`SubjectName`,`SubjectCategoryid`);

--
-- Indexes for table `teacherscomment`
--
ALTER TABLE `teacherscomment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `session` (`session`,`term`,`studentid`);

--
-- Indexes for table `termcalendar`
--
ALTER TABLE `termcalendar`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `term` (`term`,`year`,`activity`,`timeframe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodation_register`
--
ALTER TABLE `accomodation_register`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendancesheet`
--
ALTER TABLE `attendancesheet`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `boarder`
--
ALTER TABLE `boarder`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conduct`
--
ALTER TABLE `conduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currentsession`
--
ALTER TABLE `currentsession`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `debtregister`
--
ALTER TABLE `debtregister`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `defaultmessage`
--
ALTER TABLE `defaultmessage`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fee_category`
--
ALTER TABLE `fee_category`
  MODIFY `Fee_Cat_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fee_transaction`
--
ALTER TABLE `fee_transaction`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gradebyclass`
--
ALTER TABLE `gradebyclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `gradebysubject`
--
ALTER TABLE `gradebysubject`
  MODIFY `gradeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
--
-- AUTO_INCREMENT for table `graderes`
--
ALTER TABLE `graderes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `historiesid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `historydetails`
--
ALTER TABLE `historydetails`
  MODIFY `historyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `linkages`
--
ALTER TABLE `linkages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nexttermbegins`
--
ALTER TABLE `nexttermbegins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paycatbreakdown`
--
ALTER TABLE `paycatbreakdown`
  MODIFY `breakdownid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `paymentcategory`
--
ALTER TABLE `paymentcategory`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `paymentsmade`
--
ALTER TABLE `paymentsmade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `payschoolbill`
--
ALTER TABLE `payschoolbill`
  MODIFY `schoolbillid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `playnurresult`
--
ALTER TABLE `playnurresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `portalmessage`
--
ALTER TABLE `portalmessage`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `preregisteredstudents`
--
ALTER TABLE `preregisteredstudents`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schclass`
--
ALTER TABLE `schclass`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `schooladmin`
--
ALTER TABLE `schooladmin`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schoolevents`
--
ALTER TABLE `schoolevents`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `schoolinfo`
--
ALTER TABLE `schoolinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schoolresumes`
--
ALTER TABLE `schoolresumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schooltypes`
--
ALTER TABLE `schooltypes`
  MODIFY `typeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `schstaff`
--
ALTER TABLE `schstaff`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `schstdstrack`
--
ALTER TABLE `schstdstrack`
  MODIFY `trackid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schstudent`
--
ALTER TABLE `schstudent`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `scorable`
--
ALTER TABLE `scorable`
  MODIFY `scoreid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staffrole`
--
ALTER TABLE `staffrole`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentclassinfo`
--
ALTER TABLE `studentclassinfo`
  MODIFY `studentclassid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subjectcat`
--
ALTER TABLE `subjectcat`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `teacherscomment`
--
ALTER TABLE `teacherscomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `termcalendar`
--
ALTER TABLE `termcalendar`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
