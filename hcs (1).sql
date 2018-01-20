-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2018 at 05:34 PM
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
  `StudentID` varchar(10) NOT NULL,
  `Assignment` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendancesheet`
--

CREATE TABLE `attendancesheet` (
  `sn` int(11) NOT NULL,
  `ClassID` varchar(10) NOT NULL,
  `TeacherID` varchar(10) NOT NULL,
  `Date` varchar(15) NOT NULL,
  `Present` text NOT NULL,
  `Absent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `receiptID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `linkages`
--

CREATE TABLE `linkages` (
  `ID` int(11) NOT NULL,
  `ParentID` varchar(10) NOT NULL,
  `StudentID` varchar(10) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, '<p>Hi there, We are always here. Thanks for all&nbsp;</p>', 'Hi', '2018-01-16 13:01:41');

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
  `status` int(2) NOT NULL,
  `emailnotification` int(2) NOT NULL,
  `newslettersubscription` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ClassTeacher` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schstudent`
--

CREATE TABLE `schstudent` (
  `StudentID` varchar(10) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `StudentName` varchar(50) NOT NULL,
  `ClassID` varchar(20) NOT NULL,
  `Term` varchar(20) NOT NULL,
  `Session` varchar(20) NOT NULL,
  `Border` int(2) NOT NULL,
  `HomeAddress` text NOT NULL,
  `EmailAddress` varchar(30) NOT NULL,
  `dateSaved` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sn` int(11) NOT NULL,
  `SubjectID` varchar(10) NOT NULL,
  `SubjectName` varchar(30) NOT NULL,
  `SubjectCategory` varchar(20) NOT NULL,
  `Compulsory` varchar(20) NOT NULL,
  `TeacherID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjectteachers`
--

CREATE TABLE `subjectteachers` (
  `SN` int(11) NOT NULL,
  `TeacherID` varchar(15) NOT NULL,
  `SubjectID` varchar(15) NOT NULL,
  `TeacherName` varchar(60) NOT NULL,
  `TeacherEmail` varchar(50) NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `Credential` text NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `attendancesheet`
--
ALTER TABLE `attendancesheet`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `ClassID` (`ClassID`,`Date`);

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
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `TeacherID` (`TeacherID`,`StudentID`,`ClassID`,`SubjectID`,`Term`,`Session`);

--
-- Indexes for table `linkages`
--
ALTER TABLE `linkages`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ParentID` (`ParentID`,`StudentID`),
  ADD UNIQUE KEY `ParentID_2` (`ParentID`,`StudentID`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `subject` (`subject`);

--
-- Indexes for table `parentsregister`
--
ALTER TABLE `parentsregister`
  ADD PRIMARY KEY (`ParentID`),
  ADD UNIQUE KEY `Email` (`Email`);

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
-- Indexes for table `schstaff`
--
ALTER TABLE `schstaff`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `StaffEmail` (`StaffEmail`);

--
-- Indexes for table `schstudent`
--
ALTER TABLE `schstudent`
  ADD PRIMARY KEY (`StudentID`),
  ADD UNIQUE KEY `StudentID` (`StudentID`,`StudentName`,`ClassID`),
  ADD UNIQUE KEY `StudentID_2` (`StudentID`,`StudentName`,`ClassID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `SubjectName` (`SubjectName`,`SubjectCategory`),
  ADD UNIQUE KEY `SubjectID` (`SubjectID`);

--
-- Indexes for table `subjectteachers`
--
ALTER TABLE `subjectteachers`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `SubjectID` (`SubjectID`,`TeacherName`,`TeacherEmail`),
  ADD UNIQUE KEY `SubjectID_2` (`SubjectID`);

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
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendancesheet`
--
ALTER TABLE `attendancesheet`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `boarder`
--
ALTER TABLE `boarder`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `linkages`
--
ALTER TABLE `linkages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `portalmessage`
--
ALTER TABLE `portalmessage`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `preregisteredstudents`
--
ALTER TABLE `preregisteredstudents`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schclass`
--
ALTER TABLE `schclass`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
-- AUTO_INCREMENT for table `schstaff`
--
ALTER TABLE `schstaff`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjectteachers`
--
ALTER TABLE `subjectteachers`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `termcalendar`
--
ALTER TABLE `termcalendar`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
