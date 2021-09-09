-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2019 at 02:59 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `assetcategory`
--

CREATE TABLE `assetcategory` (
  `id` int(11) NOT NULL,
  `assetcategory` varchar(50) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assetitems`
--

CREATE TABLE `assetitems` (
  `id` int(11) NOT NULL,
  `assetname` varchar(150) NOT NULL,
  `assetcategory` varchar(4) NOT NULL,
  `quantity` varchar(5) NOT NULL
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
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`SN`, `Subject`, `TeacherID`, `ClassID`, `Assignment`, `Date`) VALUES
(1, '', 'HCS7722', '11', 'Divide 2 by 3', '2018-04-12 12:55:11'),
(2, '', 'HCS6739', '17', 'ahdkfadfjkad', '2018-06-07 12:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `studentid` int(20) NOT NULL,
  `sessiond` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `daysenrolled` int(5) NOT NULL,
  `dayspresent` varchar(5) NOT NULL,
  `daysabsent` varchar(5) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendancesheet`
--

CREATE TABLE `attendancesheet` (
  `SN` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `classid` int(3) NOT NULL,
  `daysenrolled` int(5) NOT NULL,
  `present` varchar(3) NOT NULL,
  `absent` text NOT NULL,
  `session` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classmedal`
--

CREATE TABLE `classmedal` (
  `classmedal` int(11) NOT NULL,
  `session` varchar(15) NOT NULL,
  `term` varchar(15) NOT NULL,
  `studentid` varchar(15) NOT NULL,
  `medal` varchar(100) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conduct`
--

CREATE TABLE `conduct` (
  `id` int(11) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `session` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `conduct` varchar(20) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
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
  `StudentID` varchar(20) NOT NULL,
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
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discountid` int(11) NOT NULL,
  `stdid` varchar(15) NOT NULL,
  `session` varchar(15) NOT NULL,
  `term` varchar(15) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `date` date NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `class_id` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `Term` varchar(20) NOT NULL,
  `Session` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `receiptID` varchar(20) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `aggregatescore` float NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gradebysubject`
--

CREATE TABLE `gradebysubject` (
  `gradeid` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `subjectid` int(5) NOT NULL,
  `classid` int(3) NOT NULL,
  `session` varchar(12) NOT NULL,
  `term` varchar(12) NOT NULL,
  `aggregatescore` int(5) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `graderes`
--

CREATE TABLE `graderes` (
  `id` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `term` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `classid` varchar(5) NOT NULL,
  `subjectid` varchar(4) NOT NULL,
  `firstsecondthirdexam` varchar(10) NOT NULL,
  `result` varchar(4) NOT NULL,
  `teacherid` varchar(4) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `sn` int(11) NOT NULL,
  `TeacherID` varchar(10) NOT NULL,
  `StudentID` varchar(20) NOT NULL,
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
  `ParentID` varchar(20) NOT NULL,
  `StudentID` varchar(20) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `sn` int(11) NOT NULL,
  `content` text NOT NULL,
  `subject` varchar(200) NOT NULL,
  `datesent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`sn`, `content`, `subject`, `datesent`) VALUES
(1, '<div class=\"WordSection1\">\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">Dear\nHonourable Parents,<o:p></o:p></span></p>\n\n<div>\n\n<table cellspacing=\"0\" cellpadding=\"0\" hspace=\"0\" vspace=\"0\" align=\"left\">\n <tbody><tr>\n  <td valign=\"top\" align=\"left\" style=\"padding-top:0in;padding-right:0in;\n  padding-bottom:0in;padding-left:0in\">\n  <p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify;line-height:\n  51.35pt;mso-line-height-rule:exactly;page-break-after:avoid;vertical-align:\n  baseline;mso-element:dropcap-dropped;mso-element-wrap:around;mso-element-anchor-vertical:\n  paragraph;mso-element-anchor-horizontal:column;mso-height-rule:exactly;\n  mso-element-linespan:3\"><span style=\"font-size: 69pt; font-family: &quot;Courier New&quot;;\">T<o:p></o:p></span></p>\n  </td>\n </tr>\n</tbody></table>\n\n</div>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">he Lord is\ntruly our Ebenezer for bringing us thus far since the beginning of this\nacademic session. It has been a wonderful year filled with exciting and\neducative activities. His banner over us knows no bound. God be praised\nforever!<o:p></o:p></span></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">I am very\npleased to welcome you to the third and final term of the 2017/2018 academic\nsession. This term represents the promotional term where all the terminal\nresults will be divided by three.<o:p></o:p></span></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">We want all\nour parents to work along with us in order to achieve an excellent performance\nand we equally promise not to relent on our effort. <o:p></o:p></span></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><b><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">GRADUATION AND PRIZE GIVING DAY<o:p></o:p></span></b></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">Itâ€™s that\ntime of the year when we bid our grade 6 pupils goodbye and welcome our Nursery\n2 pupils to grade 1. We also, on this day, award outstanding performances among\npupils and staff.<o:p></o:p></span></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><b><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">EXTRA CURRICULAR ACTIVITIES ~ CLUBS<o:p></o:p></span></b></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">We shall\nmaintain the same clubs ran in the previous term, so pupils can remain or\nchange to the club they desire.<o:p></o:p></span></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><b><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">FEES<o:p></o:p></span></b></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">I implore\nall to make payment on time. Kindly give school fees payment a priority among\nall other commitments. We cannot run the school smoothly without your prompt\npayment. May God continue to enrich your wallets.<o:p></o:p></span></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><b><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">SCHOOL BUS<o:p></o:p></span></b></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">Please\nendeavour to get your children ready as early as possible for pick-up so as not\nto cause delay and lateness for other pupils.<o:p></o:p></span></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><b><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">CORRESPONDENCE<o:p></o:p></span></b></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">All further\ncorrespondence with parents will be via email, phone and the communication\nbook.<o:p></o:p></span></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><b><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">TIMING <o:p></o:p></span></b></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">Life is all\nabout time. There is a right time for everything. Now is the time to put in the\nnecessary effort and ensure family values, culture, etiquettes and morals. This\nis the time to build the childâ€™s self-esteem and help him become confident and\nwell adjusted. Now is the time to create a literacy filled, emotionally safe\nenvironment and spend a quality time to assist homework, reinforce what was\nlearnt and encourage daily 20 minutes reading time. All these things are doable\nif your heart is in them. <o:p></o:p></span></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">Finally,\nyou will find the academic calendar and synopsis for this term attached with\nthis letter. Thank you for your support as we look forward to another\nsuccessful term. <o:p></o:p></span></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">Warm\ngreetings from all of us at HCS<o:p></o:p></span></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><v:shapetype id=\"_x0000_t75\" coordsize=\"21600,21600\" o:spt=\"75\" o:preferrelative=\"t\" path=\"m@4@5l@4@11@9@11@9@5xe\" filled=\"f\" stroked=\"f\" style=\"font-family: &quot;Courier New&quot;;\">\n <v:stroke joinstyle=\"miter\">\n <v:formulas>\n  <v:f eqn=\"if lineDrawn pixelLineWidth 0\">\n  <v:f eqn=\"sum @0 1 0\">\n  <v:f eqn=\"sum 0 0 @1\">\n  <v:f eqn=\"prod @2 1 2\">\n  <v:f eqn=\"prod @3 21600 pixelWidth\">\n  <v:f eqn=\"prod @3 21600 pixelHeight\">\n  <v:f eqn=\"sum @0 0 1\">\n  <v:f eqn=\"prod @6 1 2\">\n  <v:f eqn=\"prod @7 21600 pixelWidth\">\n  <v:f eqn=\"sum @8 21600 0\">\n  <v:f eqn=\"prod @7 21600 pixelHeight\">\n  <v:f eqn=\"sum @10 21600 0\">\n </v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:formulas>\n <v:path o:extrusionok=\"f\" gradientshapeok=\"t\" o:connecttype=\"rect\">\n <o:lock v:ext=\"edit\" aspectratio=\"t\">\n</o:lock></v:path></v:stroke></v:shapetype><v:shape id=\"_x0000_s1026\" type=\"#_x0000_t75\" style=\"position:absolute;\n left:0;text-align:left;margin-left:106.65pt;margin-top:7.1pt;width:151.5pt;\n height:73.6pt;z-index:-251656704\">\n <v:imagedata src=\"file:///C:UsersKoolJayAppDataLocalTempmsohtmlclip1\01clip_image001.emz\" o:title=\"\" style=\"font-family: &quot;Courier New&quot;;\">\n</v:imagedata></v:shape><!--[if gte mso 9]><xml>\n <o:OLEObject Type=\"Embed\" ProgID=\"CorelDraw.Graphic.18\" ShapeID=\"_x0000_s1026\"\n  DrawAspect=\"Content\" ObjectID=\"_1586245796\">\n </o:OLEObject>\n</xml><![endif]--><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">Thank you.<o:p></o:p></span></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:6.0pt;text-align:justify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">&nbsp;<o:p></o:p></span></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\njustify;line-height:normal\"><b><span style=\"font-size: 13pt; font-family: &quot;Courier New&quot;;\">&nbsp;&nbsp; <v:shape id=\"_x0000_i1025\" type=\"#_x0000_t75\" style=\"width:70.5pt;height:33pt\">\n <v:imagedata src=\"file:///C:UsersKoolJayAppDataLocalTempmsohtmlclip1\01clip_image002.jpg\" o:title=\"madam signature\">\n</v:imagedata></v:shape><o:p></o:p></span></b></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\njustify;line-height:normal\"><b><span style=\"font-size: 13pt; font-family: &quot;Courier New&quot;;\">Mrs.\nA. V. Ibiyemi<o:p></o:p></span></b></p>\n\n<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt;text-align:\njustify\"><span style=\"font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;\">Proprietress<o:p></o:p></span></p>\n\n</div><p>\n\n<span style=\"font-size:13.0pt;mso-bidi-font-size:14.0pt;line-height:107%;\nfont-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:Calibri;\nmso-ansi-language:EN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\"><br clear=\"all\" style=\"page-break-before:always;mso-break-type:section-break\"></span></p>', 'Promotional Term Newsletter', '2018-04-26 10:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `nexttermbegins`
--

CREATE TABLE `nexttermbegins` (
  `id` int(11) NOT NULL,
  `term` varchar(20) NOT NULL,
  `session` varchar(15) NOT NULL,
  `nexttermbegins` varchar(100) NOT NULL,
  `classid` varchar(5) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oldreports`
--

CREATE TABLE `oldreports` (
  `reportid` int(11) NOT NULL,
  `classid` varchar(10) CHARACTER SET latin1 NOT NULL,
  `resulttype` varchar(20) CHARACTER SET latin1 NOT NULL,
  `studentid` varchar(20) CHARACTER SET latin1 NOT NULL,
  `session` varchar(15) CHARACTER SET latin1 NOT NULL,
  `term` varchar(20) CHARACTER SET latin1 NOT NULL,
  `reportcard` varchar(150) CHARACTER SET latin1 NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `othercomment`
--

CREATE TABLE `othercomment` (
  `id` int(11) NOT NULL,
  `session` varchar(15) NOT NULL,
  `term` varchar(15) NOT NULL,
  `stdid` varchar(15) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `othercomment`
--

INSERT INTO `othercomment` (`id`, `session`, `term`, `stdid`, `comment`, `dateadded`) VALUES
(1, '2017/2018', '1st Term', '482', 'PROJECT-EXCELLENT', '0000-00-00 00:00:00'),
(2, '2017/2018', '1st Term', 'NR1423', 'Project -Excellent', '0000-00-00 00:00:00'),
(3, '2017/2018', '1st Term', 'NR1505', 'Project -Excellent', '0000-00-00 00:00:00'),
(4, '2017/2018', '2nd Term', 'NR1459', 'PROJECT-E', '0000-00-00 00:00:00'),
(5, '2017/2018', '1st Term', 'NR1481', 'Project -Excellent', '0000-00-00 00:00:00'),
(6, '2017/2018', '2nd Term', 'NR1427', 'PROJECT-E', '0000-00-00 00:00:00'),
(7, '2017/2018', '1st Term', 'NR1407', 'Project -Excellent', '2018-03-21 09:01:26'),
(8, '2017/2018', '2nd Term', 'NR1506', 'PROJECT-S', '0000-00-00 00:00:00'),
(9, '2017/2018', '2nd Term', 'NR1460', 'PROJECT-S', '0000-00-00 00:00:00'),
(10, '2017/2018', '1st Term', 'NR1447', 'Project -Excellent.', '0000-00-00 00:00:00'),
(11, '2017/2018', '2nd Term', 'NR1448', 'PROJECT-E', '0000-00-00 00:00:00'),
(12, '2017/2018', '1st Term', 'NR1461', 'Project - Excellent', '0000-00-00 00:00:00'),
(13, '2017/2018', '2nd Term', 'NR1455', 'PROJECT-E', '0000-00-00 00:00:00'),
(14, '2017/2018', '2nd Term', 'NR1405', 'PROJECT-S', '0000-00-00 00:00:00'),
(15, '2017/2018', '1st Term', 'NR1446', 'Project -Excellent', '2018-03-21 09:48:18'),
(16, '2017/2018', '1st Term', 'NR1499', 'Project -Excellent', '0000-00-00 00:00:00'),
(17, '2017/2018', '2nd Term', 'NR1457', 'PROJECT-E', '2018-03-21 10:10:47'),
(18, '2017/2018', '2nd Term', 'NR1529', 'PROJECT-E', '0000-00-00 00:00:00'),
(19, '2017/2018', '2nd Term', 'NR1482', 'PROJECT-E', '0000-00-00 00:00:00'),
(20, '2017/2018', '2nd Term', 'NR1532', 'PROJECT-E', '0000-00-00 00:00:00'),
(21, '2017/2018', '2nd Term', 'NR1528', 'Project -Excellent', '0000-00-00 00:00:00'),
(22, '2017/2018', '2nd Term', 'NR1504', 'Project -Excellent', '2018-03-23 07:52:34'),
(23, '2017/2018', '2nd Term', 'NR1508', 'PROJECT-S', '0000-00-00 00:00:00'),
(24, '2017/2018', '2nd Term', 'NR1491', 'Project -Satisfactory', '2018-03-21 10:49:03'),
(25, '2017/2018', '2nd Term', 'NR1577', 'PROJECT-E', '0000-00-00 00:00:00'),
(26, '2017/2018', '2nd Term', 'NR1541', 'Project -', '2018-03-23 08:28:03'),
(27, '2017/2018', '2nd Term', 'NR1596', 'PROJECT-E', '0000-00-00 00:00:00'),
(28, '2017/2018', '2nd Term', 'NR1440', 'Project -Excellent', '0000-00-00 00:00:00'),
(29, '2017/2018', '1st Term', 'NR1528', 'Project -Excellent.', '0000-00-00 00:00:00'),
(30, '2017/2018', '2nd Term', 'NR1423', 'Project -Excellent', '0000-00-00 00:00:00'),
(31, '2017/2018', '2nd Term', 'NR1461', 'Project -Excellent', '0000-00-00 00:00:00'),
(32, '2017/2018', '2nd Term', 'NR1481', 'Project -Excellent', '0000-00-00 00:00:00'),
(33, '2017/2018', '2nd Term', 'NR1446', 'Project - Excellent', '0000-00-00 00:00:00'),
(34, '2017/2018', '2nd Term', 'NR1447', 'Project -Excellent', '0000-00-00 00:00:00'),
(35, '2017/2018', '2nd Term', 'NR1505', 'Project - Excellent.', '0000-00-00 00:00:00'),
(36, '2017/2018', '2nd Term', 'NR1499', 'Project -Excellent', '2018-03-23 08:44:15'),
(37, '2017/2018', '2nd Term', 'NR1407', 'Project -Excellent', '0000-00-00 00:00:00'),
(38, '2018/2019', '3rd Term', 'NR1596', '', '2018-04-19 14:52:00'),
(39, '2017/2018', '3rd Term', 'NR1596', 'PROJECT-EXCELLENT', '2018-07-11 11:53:40'),
(136, '2017/2018', '3rd Term', 'NR1459', 'PROJECT-SATISFACTORY', '2018-07-10 11:46:27'),
(156, '2017/2018', '3rd Term', 'NR1455', 'PROJECT-EXCELLENT', '2018-07-10 11:53:37'),
(172, '2017/2018', '3rd Term', 'NR1506', 'PROJECT-SATISFACTORY', '2018-07-10 12:01:03'),
(186, '2017/2018', '3rd Term', 'NR1529', 'PROJECT-EXCELLENT', '2018-07-10 12:05:31'),
(192, '2017/2018', '3rd Term', 'NR1577', 'PROJECT-SATISFACTORY', '2018-07-10 12:10:49'),
(201, '2017/2018', '3rd Term', 'NR1532', 'PROJECT-EXCELLENT', '2018-07-10 12:22:11'),
(221, '2017/2018', '3rd Term', 'NR1405', 'PROJECT-EXCELLENT', '2018-07-10 12:27:22'),
(243, '2017/2018', '3rd Term', 'NR1427', 'PROJECT-SATISFACTORY', '2018-07-10 12:36:49'),
(282, '2017/2018', '3rd Term', 'NR1471', 'PROJECT-EXCELLENT', '0000-00-00 00:00:00'),
(283, '2017/2018', '3rd Term', 'NR1482', 'PROJECT-SATISFACTORY', '2018-07-11 11:31:52'),
(294, '2017/2018', '3rd Term', 'NR1508', 'PROJECT-SATISFACTORY', '2018-07-11 11:38:49'),
(341, '2017/2018', '3rd Term', 'NR1457', 'PROJECT-EXCELLENT', '2018-07-11 11:45:03'),
(344, '2017/2018', '3rd Term', 'NR1460', 'PROJECT-EXCELLENT', '2018-07-11 11:50:33'),
(374, '2017/2018', '3rd Term', 'NR1448', 'PROJECT-SATISFACTORY', '2018-07-11 12:07:38'),
(375, '2017/2018', '3rd Term', 'NR1528', 'PROJECT-EXCELLENT', '2018-07-13 09:12:42'),
(378, '2017/2018', '3rd Term', 'NR1407', 'PROJECT-EXCELLENT', '2018-07-13 09:10:18'),
(384, '2017/2018', '3rd Term', 'NR1491', 'PROJECT-SATISFACTORY', '2018-07-13 09:16:27'),
(389, '2017/2018', '3rd Term', 'NR1504', 'PROJECT-EXCELLENT', '2018-07-13 09:22:09'),
(392, '2017/2018', '3rd Term', 'NR1423', 'PROJECT-EXCELLENT', '2018-07-13 09:27:53'),
(406, '2017/2018', '3rd Term', 'NR1461', 'PROJECT-EXCELLENT', '2018-07-13 09:32:53'),
(414, '2017/2018', '3rd Term', 'NR1481', 'PROJECT-EXCELLENT', '2018-07-13 09:37:47'),
(420, '2017/2018', '3rd Term', 'NR1446', 'PROJECT-SATISFACTORY', '2018-07-13 09:41:48'),
(428, '2017/2018', '3rd Term', 'NR1541', 'PROJECT-EXCELLENT', '2018-07-13 09:48:40'),
(431, '2017/2018', '3rd Term', 'NR1440', 'PROJECT-EXCELLENT', '2018-07-13 09:52:27'),
(434, '2017/2018', '3rd Term', 'NR1447', 'PROJECT-SATISFACTORY', '0000-00-00 00:00:00'),
(435, '2017/2018', '3rd Term', 'NR1625', 'PROJECT-EXCELLENT', '2018-07-13 10:38:13'),
(438, '2017/2018', '3rd Term', 'NR1505', 'PROJECT-SATISFACTORY', '2018-07-13 10:07:22'),
(449, '2017/2018', '3rd Term', 'NR1499', 'PROJECT-EXCELLENT', '2018-07-13 10:13:00'),
(450, '2018/2019', '1st Term', 'RC0121', 'PROJECT: SATISFACTORY', '2018-12-03 12:20:23'),
(466, '2018/2019', '1st Term', 'RC0126', 'PROJECT - SATISFACTORY', '2018-12-03 11:01:16'),
(470, '2018/2019', '1st Term', 'RC0585', 'PROJECT-SATISFACTORY', '2018-12-03 11:00:28'),
(483, '2018/2019', '1st Term', 'RC0123', 'PROJECT - SATISFACTORY', '0000-00-00 00:00:00'),
(484, '2018/2019', '1st Term', 'RC0530', 'PROJECT-EXCELLENT', '2018-12-03 11:07:49'),
(493, '2018/2019', '1st Term', 'RC0128', 'PROJECT - EXCELLENT ', '0000-00-00 00:00:00'),
(494, '2018/2019', '1st Term', 'RC0122', 'PROJECT-SATISFACTORY', '2018-12-03 11:16:14'),
(511, '2018/2019', '1st Term', 'RC0130', 'PROJECT - EXCELLENT', '0000-00-00 00:00:00'),
(512, '2018/2019', '1st Term', 'RC0125', 'PROJECT-SATISFACTORY', '2018-12-03 11:22:02'),
(524, '2018/2019', '1st Term', 'RC0144', 'NIL', '2018-12-03 11:25:35'),
(526, '2018/2019', '1st Term', 'NR1662', 'PROJECT - EXCELLENT', '0000-00-00 00:00:00'),
(528, '2018/2019', '1st Term', 'RC0142', 'PROJECT - EXCELLENT', '0000-00-00 00:00:00'),
(529, '2018/2019', '1st Term', 'RC0127', 'PROJECT-EXCELLENT', '2018-12-03 11:30:42'),
(532, '2018/2019', '1st Term', 'RC0132', 'PROJECT - EXCELLENT', '2018-12-03 11:44:58'),
(535, '2018/2019', '1st Term', 'RC0129', 'PROJECT-SATISFACTORY', '2018-12-03 11:40:17'),
(555, '2018/2019', '1st Term', 'RC0141', 'PROJECT-EXCELLENT', '2018-12-03 11:46:15'),
(558, '2018/2019', '1st Term', 'RC0133', 'PROJECT - EXCELLENT', '0000-00-00 00:00:00'),
(559, '2018/2019', '1st Term', 'RC0131', 'PROJECT-EXCELLENT', '2018-12-03 11:52:47'),
(562, '2018/2019', '1st Term', 'RC0623', 'PROJECT - SATISFACTORY', '0000-00-00 00:00:00'),
(563, '2018/2019', '1st Term', 'RC0137', 'PROJECT-EXCELLENT', '2018-12-03 11:56:35'),
(581, '2018/2019', '1st Term', 'NRI668', 'PROJECT - EXCELLENT', '0000-00-00 00:00:00'),
(582, '2018/2019', '1st Term', 'RC0138', 'PROJECT-SATISFACTORY', '2018-12-03 12:01:41'),
(584, '2018/2019', '1st Term', 'RC0140', 'PROJECT - EXCELLENT', '0000-00-00 00:00:00'),
(586, '2018/2019', '1st Term', 'RC0139', 'PROJECT-EXCELLENT', '2018-12-03 12:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `parentsregister`
--

CREATE TABLE `parentsregister` (
  `ParentID` int(10) NOT NULL,
  `ParentSurname` varchar(20) NOT NULL,
  `ParentFirstname` varchar(20) NOT NULL,
  `ParentName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `mPhoneNumber` varchar(100) NOT NULL,
  `religion` varchar(15) NOT NULL,
  `status` int(2) NOT NULL,
  `emailnotification` int(2) NOT NULL,
  `newslettersubscription` int(2) NOT NULL,
  `officeaddress` text NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parentsregister`
--

INSERT INTO `parentsregister` (`ParentID`, `ParentSurname`, `ParentFirstname`, `ParentName`, `Email`, `Password`, `PhoneNumber`, `mPhoneNumber`, `religion`, `status`, `emailnotification`, `newslettersubscription`, `officeaddress`, `occupation`, `dateadded`) VALUES
(1, 'Ibiyemi', 'Adebimpe Victoria', 'Ibiyemi Adebimpe Victoria', 'ibiyemibb@yahoo.com', 'ANDIAG', '08035696773', '', 'Christianity', 1, 1, 1, 'Plot 12 Taiwo Oguns', 'Teaching', '2019-09-03 11:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `paycatbreakdown`
--

CREATE TABLE `paycatbreakdown` (
  `breakdownid` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `session` varchar(15) NOT NULL,
  `amount` int(7) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `paytype` varchar(15) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paycatbreakdown`
--

INSERT INTO `paycatbreakdown` (`breakdownid`, `description`, `session`, `amount`, `remark`, `paytype`, `dateadded`) VALUES
(1, 'JSS 1 - 2019/2020', '', 130000, 'Tuition', 'Terminal', '2019-09-04 09:21:53'),
(2, 'JSS 1 - 2019/2020', '', 10000, 'PTA', 'Sessional', '2019-09-04 09:23:20'),
(3, 'JSS 1 - 2019/2020', '', 5000, 'Application pack', 'Once', '2019-09-04 09:23:51'),
(4, 'JSS 1 - 2019/2020', '', 10000, 'Development Levy', 'Sessional', '2019-09-04 09:24:15'),
(6, 'JSS 1 - 2019/2020', '', 42000, 'Uniform', 'Once', '2019-09-04 09:25:08'),
(7, 'JSS 1 - 2019/2020', '', 10000, 'Party', 'Terminal', '2019-09-04 09:25:46'),
(8, 'JSS 1 - 2019/2020', '', 10000, 'Co-curricular', 'Terminal', '2019-09-04 09:25:55'),
(9, 'JSS 1 - 2019/2020', '', 50000, 'Books and Supplies', 'Sessional', '2019-09-04 09:26:16'),
(11, 'JSS 1 - 2019/2020', '', 30000, 'Lunch', 'Optional', '2019-09-04 09:32:53'),
(12, 'JSS 1 - 2019/2020', '', 25000, 'Bus (Arepo)', 'Optional', '2019-09-04 09:33:07'),
(13, 'JSS 1 - 2019/2020', '', 15000, 'Bus (Arepo - One way)', 'Optional', '2019-09-04 09:33:34'),
(15, 'JSS 1 - 2019/2020', '', 30000, 'Bus (Warwa/Punch/Magboro)', 'Optional', '2019-09-04 09:34:00'),
(16, 'JSS 1 - 2019/2020', '', 35000, 'Bus (Others) ', 'Optional', '2019-09-04 09:34:23'),
(17, 'JSS 1 - 2019/2020', '', 20000, 'Bus (Others - One way) ', 'Optional', '2019-09-04 09:34:50'),
(18, 'JSS 2 - 2019/2020', '', 130000, 'Tuition', 'Terminal', '2019-09-18 13:41:21'),
(19, 'JSS 3 - 2019/2020', '', 130000, 'Tuition', 'Terminal', '2019-09-18 13:41:34'),
(20, 'SSS 1 - 2019/2020', '', 130000, 'Tuition', 'Terminal', '2019-09-18 13:41:39'),
(21, 'SSS 2 - 2019/2020', '', 130000, 'Tuition', 'Terminal', '2019-09-18 13:41:45'),
(22, 'SSS 3 - 2019/2020', '', 130000, 'Tuition', 'Terminal', '2019-09-18 13:42:18'),
(25, 'JSS 2 - 2019/2020', '', 10000, 'PTA', 'Sessional', '2019-09-18 13:42:52'),
(26, 'JSS 3 - 2019/2020', '', 10000, 'PTA', 'Sessional', '2019-09-18 13:42:56'),
(27, 'SSS 1 - 2019/2020', '', 10000, 'PTA', 'Sessional', '2019-09-18 13:43:00'),
(28, 'SSS 2 - 2019/2020', '', 10000, 'PTA', 'Sessional', '2019-09-18 13:43:04'),
(29, 'SSS 3 - 2019/2020', '', 10000, 'PTA', 'Sessional', '2019-09-18 13:43:08'),
(30, 'SSS 3 - 2019/2020', '', 5000, 'Application Pack', 'Once', '2019-09-18 13:43:29'),
(31, 'SSS 2 - 2019/2020', '', 5000, 'Application Pack', 'Once', '2019-09-18 13:43:33'),
(32, 'SSS 1 - 2019/2020', '', 5000, 'Application Pack', 'Once', '2019-09-18 13:43:38'),
(33, 'JSS 3 - 2019/2020', '', 5000, 'Application Pack', 'Once', '2019-09-18 13:43:43'),
(35, 'JSS 2 - 2019/2020', '', 5000, 'Application Pack', 'Once', '2019-09-18 13:43:52'),
(38, 'JSS 2 - 2019/2020', '', 10000, 'Development levy', 'Sessional', '2019-09-18 13:44:44'),
(39, 'JSS 3 - 2019/2020', '', 10000, 'Development levy', 'Sessional', '2019-09-18 13:44:58'),
(40, 'SSS 1 - 2019/2020', '', 10000, 'Development levy', 'Sessional', '2019-09-18 13:45:08'),
(41, 'SSS 2 - 2019/2020', '', 10000, 'Development levy', 'Sessional', '2019-09-18 13:45:16'),
(42, 'SSS 3 - 2019/2020', '', 10000, 'Development levy', 'Sessional', '2019-09-18 13:45:26'),
(43, 'SSS 3 - 2019/2020', '', 42000, 'Uniform', 'Once', '2019-09-18 13:45:59'),
(44, 'SSS 2 - 2019/2020', '', 42000, 'Uniform', 'Once', '2019-09-18 13:46:12'),
(45, 'SSS 1 - 2019/2020', '', 42000, 'Uniform', 'Once', '2019-09-18 13:46:21'),
(46, 'JSS 3 - 2019/2020', '', 42000, 'Uniform', 'Once', '2019-09-18 13:46:30'),
(47, 'JSS 2 - 2019/2020', '', 42000, 'Uniform', 'Once', '2019-09-18 13:46:39'),
(50, 'JSS 2 - 2019/2020', '', 10000, 'Party', 'Terminal', '2019-09-18 13:48:03'),
(51, 'JSS 3 - 2019/2020', '', 10000, 'Party', 'Terminal', '2019-09-18 13:48:15'),
(52, 'SSS 1 - 2019/2020', '', 10000, 'Party', 'Terminal', '2019-09-18 13:48:26'),
(53, 'SSS 2 - 2019/2020', '', 10000, 'Party', 'Terminal', '2019-09-18 13:48:36'),
(54, 'SSS 3 - 2019/2020', '', 10000, 'Party', 'Terminal', '2019-09-18 13:48:45'),
(55, 'SSS 3 - 2019/2020', '', 10000, 'Co-curricular', 'Terminal', '2019-09-18 13:49:12'),
(56, 'SSS 2 - 2019/2020', '', 10000, 'Co-curricular', 'Terminal', '2019-09-18 13:49:21'),
(57, 'SSS 1 - 2019/2020', '', 10000, 'Co-curricular', 'Terminal', '2019-09-18 13:49:32'),
(58, 'JSS 3 - 2019/2020', '', 10000, 'Co-curricular', 'Terminal', '2019-09-18 13:49:42'),
(59, 'JSS 2 - 2019/2020', '', 10000, 'Co-curricular', 'Terminal', '2019-09-18 13:49:50'),
(62, 'JSS 2 - 2019/2020', '', 50000, 'Books and supplies', 'Sessional', '2019-09-18 13:50:44'),
(63, 'JSS 3 - 2019/2020', '', 50000, 'Books and supplies', 'Sessional', '2019-09-18 13:50:57'),
(65, 'SSS 1 - 2019/2020', '', 50000, 'Books and supplies', 'Sessional', '2019-09-18 13:51:14'),
(66, 'SSS 2 - 2019/2020', '', 50000, 'Books and supplies', 'Sessional', '2019-09-18 13:51:21'),
(67, 'SSS 3 - 2019/2020', '', 50000, 'Books and supplies', 'Sessional', '2019-09-18 13:51:30'),
(69, 'SSS 3 - 2019/2020', '', 30000, 'Lunch', 'Optional', '2019-09-18 13:55:15'),
(70, 'SSS 2 - 2019/2020', '', 30000, 'Lunch', 'Optional', '2019-09-18 13:55:36'),
(73, 'SSS 1 - 2019/2020', '', 30000, 'Lunch', 'Optional', '2019-09-18 13:56:16'),
(74, 'JSS 3 - 2019/2020', '', 30000, 'Lunch', 'Optional', '2019-09-18 13:56:25'),
(75, 'JSS 2 - 2019/2020', '', 30000, 'Lunch', 'Optional', '2019-09-18 13:56:33'),
(77, 'JSS 3 - 2019/2020', '', 30000, 'External Exam', 'Once', '2019-09-18 13:57:24'),
(78, 'JSS 3 - 2019/2020', '', 25000, 'Bus (Arepo)', 'Terminal', '2019-09-18 13:57:47'),
(79, 'SSS 3 - 2019/2020', '', 25000, 'Bus (Arepo)', 'Terminal', '2019-09-18 13:57:52'),
(80, 'SSS 2 - 2019/2020', '', 25000, 'Bus (Arepo)', 'Terminal', '2019-09-18 13:57:56'),
(81, 'SSS 1 - 2019/2020', '', 25000, 'Bus (Arepo)', 'Terminal', '2019-09-18 13:58:00'),
(83, 'JSS 2 - 2019/2020', '', 25000, 'Bus (Arepo)', 'Terminal', '2019-09-18 13:58:09'),
(85, 'JSS 1 - 2019/2020', '', 30000, 'Bus (Punch/Warewa/Magboro)', 'Terminal', '2019-09-18 13:58:51'),
(87, 'JSS 2 - 2019/2020', '', 30000, 'Bus (Punch/Warewa/Magboro)', 'Terminal', '2019-09-18 13:59:15'),
(88, 'JSS 3 - 2019/2020', '', 30000, 'Bus (Punch/Warewa/Magboro)', 'Terminal', '2019-09-18 13:59:20'),
(90, 'SSS 1 - 2019/2020', '', 30000, 'Bus (Punch/Warewa/Magboro)', 'Terminal', '2019-09-18 14:01:34'),
(91, 'SSS 2 - 2019/2020', '', 30000, 'Bus (Punch/Warewa/Magboro)', 'Terminal', '2019-09-18 14:01:41'),
(92, 'SSS 3 - 2019/2020', '', 30000, 'Bus (Punch/Warewa/Magboro)', 'Terminal', '2019-09-18 14:01:47'),
(93, 'SSS 3 - 2019/2020', '', 35000, 'Bus (Others)', 'Terminal', '2019-09-18 14:02:43'),
(95, 'SSS 2 - 2019/2020', '', 35000, 'Bus (Others)', 'Terminal', '2019-09-18 14:03:05'),
(96, 'SSS 1 - 2019/2020', '', 35000, 'Bus (Others)', 'Terminal', '2019-09-18 14:03:14'),
(97, 'JSS 3 - 2019/2020', '', 35000, 'Bus (Others)', 'Terminal', '2019-09-18 14:03:21'),
(98, 'JSS 2 - 2019/2020', '', 35000, 'Bus (Others)', 'Terminal', '2019-09-18 14:03:29'),
(100, 'JSS 1 - 2019/2020', '', 15000, 'Bus (Arepo)one way', 'Terminal', '2019-09-18 14:04:21'),
(101, 'JSS 2 - 2019/2020', '', 15000, 'Bus (Arepo)one way', 'Terminal', '2019-09-18 14:04:41'),
(102, 'JSS 3 - 2019/2020', '', 15000, 'Bus (Arepo) one way', 'Terminal', '2019-09-18 14:05:04'),
(103, 'SSS 1 - 2019/2020', '', 15000, 'Bus (Arepo) one way', 'Terminal', '2019-09-18 14:05:13'),
(104, 'SSS 2 - 2019/2020', '', 15000, 'Bus (Arepo) one way', 'Terminal', '2019-09-18 14:05:21'),
(105, 'SSS 3 - 2019/2020', '', 15000, 'Bus (Arepo) one way', 'Terminal', '2019-09-18 14:05:30'),
(106, 'SSS 3 - 2019/2020', '', 20000, 'Bus (Others) one way', 'Terminal', '2019-09-18 14:06:02'),
(107, 'SSS 2 - 2019/2020', '', 20000, 'Bus (Others) one way', 'Terminal', '2019-09-18 14:06:10'),
(109, 'SSS 1 - 2019/2020', '', 20000, 'Bus (Others) one way', 'Terminal', '2019-09-18 14:06:29'),
(110, 'JSS 3 - 2019/2020', '', 20000, 'Bus (Others) one way', 'Terminal', '2019-09-18 14:06:37'),
(111, 'JSS 2 - 2019/2020', '', 20000, 'Bus (Others) one way', 'Terminal', '2019-09-18 14:06:46'),
(112, 'JSS 1 - 2019/2020', '', 20000, 'Bus (Others) one way', 'Terminal', '2019-09-18 14:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `paymentcategory`
--

CREATE TABLE `paymentcategory` (
  `categoryid` int(11) NOT NULL,
  `paymentname` varchar(30) NOT NULL,
  `session` varchar(15) NOT NULL,
  `paymentdescription` text NOT NULL,
  `term` varchar(20) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentcategory`
--

INSERT INTO `paymentcategory` (`categoryid`, `paymentname`, `session`, `paymentdescription`, `term`, `dateadded`) VALUES
(1, 'JSS 1', '2019/2020', 'Mandatory', 'ft', '2019-09-04 09:20:54'),
(2, 'JSS 2', '2019/2020', 'Mandatory', 'ft', '2019-09-04 09:22:22'),
(3, 'JSS 3', '2019/2020', 'Mandatory', 'ft', '2019-09-04 09:22:29'),
(4, 'SSS 1', '2019/2020', 'Mandatory', 'ft', '2019-09-04 09:22:37'),
(5, 'SSS 2', '2019/2020', 'Mandatory', 'ft', '2019-09-04 09:22:42'),
(6, 'SSS 3', '2019/2020', 'Mandatory', 'ft', '2019-09-04 09:22:46');

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
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payschoolbill`
--

CREATE TABLE `payschoolbill` (
  `schoolbillid` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `session` varchar(10) NOT NULL,
  `term` varchar(15) NOT NULL,
  `billitemid` int(3) NOT NULL,
  `billitemamount` int(7) NOT NULL,
  `paymentmade` int(7) NOT NULL,
  `datepaid` date NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playnurresult`
--

CREATE TABLE `playnurresult` (
  `id` int(11) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `term` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `classid` int(10) NOT NULL,
  `subjectid` varchar(5) NOT NULL,
  `firstsecondthirdexam` varchar(20) NOT NULL,
  `result` varchar(4) NOT NULL,
  `teacherid` int(2) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playnurresult`
--

INSERT INTO `playnurresult` (`id`, `studentid`, `term`, `session`, `classid`, `subjectid`, `firstsecondthirdexam`, `result`, `teacherid`, `dateadded`) VALUES
(1, 'HHS2019/001', '1st Term', '2019/2020', 32, '12', 'first', '10', 0, '2019-10-09 13:13:31'),
(2, 'HHS2019/002', '1st Term', '2019/2020', 32, '12', 'second', '0', 0, '2019-10-09 13:13:32'),
(5, 'HHS2019/003', '1st Term', '2019/2020', 32, '12', 'third', '10', 0, '2019-10-09 13:13:38'),
(6, 'HHS2019/001', '1st Term', '2019/2020', 32, '12', 'second', '10', 0, '2019-10-09 13:31:07'),
(9, 'HHS2019/001', '1st Term', '2019/2020', 32, '12', 'third', '10', 0, '2019-10-09 13:31:13'),
(13, 'HHS2019/024', '1st Term', '2019/2020', 32, '12', 'exam', '0', 0, '2019-10-15 08:23:41');

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
  `registeredDate` timestamp NOT NULL DEFAULT current_timestamp()
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
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promotedtable`
--

CREATE TABLE `promotedtable` (
  `promoted` int(11) NOT NULL,
  `studentid` varchar(15) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `session` varchar(20) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `proprietresscomment`
--

CREATE TABLE `proprietresscomment` (
  `int` int(11) NOT NULL,
  `session` varchar(15) NOT NULL,
  `term` varchar(15) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `stdid` varchar(15) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
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
(24, 'EXIT', 4, '', 0, 'HCS4693', ''),
(29, 'JSS 1', 5, '', 0, 'HCS6807', ''),
(30, 'JSS 2', 5, '', 0, 'HCS5823', ''),
(31, 'JSS 3', 5, '', 0, 'HCS7779', ''),
(32, 'SSS 1', 6, '', 0, 'HCS7555', ''),
(33, 'SSS 2', 6, '', 0, 'HCS4693', ''),
(34, 'SSS 3', 6, '', 0, '', '');

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
(1, 'havard', '12345', 'Administrator', 1, 'Admin', 'HCS12345');

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
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schoolresumes`
--

CREATE TABLE `schoolresumes` (
  `id` int(11) NOT NULL,
  `term` varchar(15) NOT NULL,
  `session` varchar(15) NOT NULL,
  `nextermbegins` varchar(100) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolresumes`
--

INSERT INTO `schoolresumes` (`id`, `term`, `session`, `nextermbegins`, `dateadded`) VALUES
(1, '1st Term', '2017/2018', '23rd April, 2018', '2018-03-21 02:14:11'),
(2, '2nd Term', '2017/2018', '23rd April 2018', '2018-03-21 02:34:54'),
(3, '3rd Term', '2017/2018', 'Monday, 17th September, 2018', '2018-07-09 11:26:38'),
(4, '1st Term', '2018/2019', 'Monday, 7th January, 2019', '2018-12-03 13:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `schooltypes`
--

CREATE TABLE `schooltypes` (
  `typeid` int(11) NOT NULL,
  `typename` varchar(15) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schooltypes`
--

INSERT INTO `schooltypes` (`typeid`, `typename`, `dateadded`) VALUES
(1, 'Playgroup', '2018-04-12 11:47:10'),
(2, 'Reception', '2018-04-12 11:47:10'),
(3, 'Nursery', '2018-04-12 11:47:21'),
(4, 'Grades', '2018-04-12 11:47:21'),
(5, 'JSS', '2018-06-04 08:49:54'),
(6, 'SSS', '2018-06-04 08:49:54');

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
(25, 'Agunbiade Feyisayo', 'HCS1079', 'No 4 Aribido street', '08064465427', '-', 'agunbiadefeyisayo83@yahoo.com', 'admin', '', 'Bursar'),
(26, 'Abimbola Ayodeji', 'HCS7555', 'Magboro', '08134327417', 'B.Ed', 'bimboladxtreme@gmail.com', 'HCS655A', '', 'Teacher'),
(27, 'Famadewa Taiwo', 'HCS5823', 'Arepo', '080', 'B.Sc', 'taiwoben80@yahoo.com', '12345', '', 'Teacher'),
(29, 'OLATEJU,OLABISI OYELEKE', 'HCS4826', '4,ola oladipupo street. Ashimolowo, mowe, Ogunstate.', 'O8032207879', 'P.G.D.E / HND.', 'olateju111@yahoo.com', 'HCS5105', '', 'Teacher'),
(31, 'Akwaowoh Mfon Naomi.', 'HCS7430', '5,Oluwole street,mogede quarters,Ibafo Ogunstate', '08132113371', 'B.Tech', 'Naomimfon2016@gmail.com', 'HCS328/', '', 'Teacher'),
(32, 'JOHN,QUEEN UDOH', 'HCS2507', '17,Bendel street, Ereko quarters,Ibafo Ogunstate', '08063036980', 'B.SC(B.ED) POLITICAL SCI.EDUCATION.', 'ekassybery@gmail.com', 'HCS739;', '', 'Teacher'),
(33, 'ADEBOMI AFOLASHADE ABIDEMI', 'HCS7779', '14,Kayode Oseni street,Martins,Akute Road Ogunstate', '08164364209', 'B.SC(B.ED) Economic.', 'CYNTHIAADEBOMI@GMAIL.COM', 'HCS5602', '', 'Teacher'),
(34, 'WILLIAMS, SAMUEL OLUWASEUN.', 'HCS6807', '16 Daramola olu street, Arepo,  Ogunstate', '08093582483', 'B.SC Biochemistry.', 'samueliwilliams291@gmail.com', 'HCS9353', '', 'Teacher'),
(35, 'DUNTOYE DAMILOLA', 'HCS4853', '5,olajide Agboola street, iyana ipaja, lagos', '07069505463', 'B.ED (English)', 'dammieduntoye@gmail.com', 'HCS795:', '', 'Teacher'),
(36, 'Balogun samuel .o', 'HCS9243', '12 Jimoh Akinsanya street', '07066370325', 'Bsc.(ED) Economics', 'samfunc@hotmail.com', 'HCS929/', '', 'Teacher'),
(37, 'AKEREJOLA M.B', 'HCS4693', '11,Akinola st jabope oremeji ibafo', '08023817238', 'H.N.D (PGDE)', 'deleakerejola@yahoo.com', 'HCS594?', '', 'Teacher'),
(39, 'OYESAKIN OLAYINKA A', 'HCS4964', 'flat 2 block3 new est rd rccg camp.', '08038114583', 'NCE.B.SC.MSC.', 'oyesakinyinkagenius@gmail.com', 'HCS962;', '', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `schstdstrack`
--

CREATE TABLE `schstdstrack` (
  `trackid` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `session` varchar(10) NOT NULL,
  `classid` int(3) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
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
  `dateSaved` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schstudent`
--

INSERT INTO `schstudent` (`StudentID`, `schoolid`, `Surname`, `Middlename`, `Firstname`, `dateofbirth`, `gender`, `ClassID`, `HomeAddress`, `lga`, `stateoforigin`, `EmailAddress`, `Prevschools`, `Bloodgroup`, `Genotype`, `nationality`, `religion`, `healthstatus`, `passportphoto`, `dateSaved`) VALUES
(1, 'HHS2019/001', 'IBIYEMI', 'ESTHER', 'AYOMIDE', '2006-06-03', 'Female', 32, 'PLOT 38,ARIBIDO OSHOLA STREET,AREPO', 'ORIADE', 'OSUN', 'ibiyemiaa@yahoo.com, ibiyemibb', 'BABCOCK HIGH SCHOOL', 'B RHESUS', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'HEALTHY', '', '2019-10-09 14:52:57'),
(2, 'HHS2019/002', 'IBIYEMI', 'MARY', 'IFEOLUWA', '2007-07-28', 'Female', 31, 'PLOT 38, ARIBIDO OSHOLA STREET,AREPO', 'ORIADE', 'OSUN', 'ibiyemiaa@yahoo.com, ibiyemibb', 'BABCOCK HIGH SCHOOL', 'B RHESUS', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'VERY OKAY', '', '2019-10-09 15:11:28'),
(3, 'HHS2019/003', 'ODUKWE', 'DANIEL', 'CHUKWUEMEKA', '2005-05-03', 'Male', 33, '16,JOURNALIST PHASE 1 AREPO', 'KOSOFE', 'LAGOS', '', 'GREAT BLESSINGS SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'Good', '', '2019-10-10 08:38:54'),
(4, 'HHS2019/004', 'ODUKWE', '', 'DAVID', '2005-05-03', 'Male', 32, '16,JOURNALIST PHASE 1 AREPO', 'KOSOFE', 'LAGOS', '', 'GREAT BLESSINGS SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 08:46:27'),
(5, 'HHS2019/005', 'AKINGBESOTE', 'DIDEOLUWA', 'TEMITAYO', '2009-05-03', 'Female', 29, 'PLOT 37, BAYO OYEDE STREET, AREPO OGUN STATE', 'OJO LOCAL GOVERNMENT LAGO', 'LAGOS', 'tenniolaadeyemo@yahoo.com', 'FUTURE EDGE INTERNATIONAL SCHOOL.', 'AA', 'O+', 'NIGERIAN', 'CHRISTIANITY', 'Good', '', '2019-10-10 08:50:36'),
(6, 'HHS2019/006', 'ALLI', 'SINMISOLA', 'ESTHER', '2009-06-26', 'Female', 29, '16,BAYO OYEDE STREET,AREPO OGUN STATE', 'IBADAN SOUTH EAST', 'OYO STATE', 'simeon07alli@yahoo.com', 'HAVARD CHILDREN SCHOOL', 'AA', 'O', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 08:54:43'),
(7, 'HHS2019/007', 'SOLUADE', 'ANITA', 'OMOFOYINSOLA', '2009-09-25', 'Female', 29, 'PLOT 31,TAIWO OGUNS STREET, AREPO OGUN STATE', 'ABEOKUTA NORTH L.G', 'OGUN STATE', 'Hypumping@gmail.com', 'HAVARD CHILDREN SCHOOL', 'O POSITIVE', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'NORMAL', '', '2019-10-10 09:00:04'),
(8, 'HHS2019/008', 'ADEYI', 'ISAAC', 'IGOCHE', '2009-06-23', 'Male', 29, '2,MALACHAI CLOSE JOURNALIST PHASE 2', 'OTUKPO', 'BENUE STATE', 'achkwu.adeyi@gmail.com, adaade', 'HAVARD CHILDREN SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 09:08:38'),
(9, 'HHS2019/009', 'ADEYI', 'EMMANUEL', 'ADEYI', '2006-12-03', 'Male', 31, '2,MALACHAIN CLOSE JOURNALIST PHASE 2 AREPO', 'OTUKPO', 'BENUE STATE', 'achukwu.adeyi@gmail.com, adaad', 'CHAMPIONS SCHOOLS', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 09:14:00'),
(11, 'HHS2019/010', 'IWUAGWU', 'PRECIOUS', 'UGOMMA', '1999-09-02', 'Female', 32, 'THIS DAY AVENUE NUJ PHASE 1 AREPO', 'IKADRU', 'IMO STATE', 'nnenwa50@hotmail.com', 'SPRINGWORTH SCHOOL', 'O POSITIVE', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 09:40:46'),
(12, 'HHS2019/011', 'HUSSEIN', 'TOLUWANIMI', 'DEBORAH', '2008-05-18', 'Female', 30, 'PLOT 8,ASSOCIATION ROAD,VOERA ESTATE.AREPO', 'ATIBA', 'OYO STATE', 'ayan_hussein@yahoo.co.uk', 'SKYCREST HIGH SCHOOL', 'O POSITIVE', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 09:45:03'),
(13, 'HHS2019/012', 'KANU', 'FAVOUR', 'CHIOMA', '0000-00-00', 'Female', 33, 'NO2,SPORTS DAY AVENUE NUJ PHASE 1', '', '', '', '', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 09:49:59'),
(14, 'HHS2019/013', 'OSUAFOR', 'KAMSIYOCHUKWU', 'BRIANNA', '2008-11-29', 'Female', 29, 'NO 2,SPORTS DAY AVENUE NUJ PHASE 1 AREPO', 'AGUATA', 'ANAMBRA', 'uzoryellow@gmail.com', 'ROLE MODEL SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 09:52:47'),
(15, 'HHS2019/014', 'OJEKEMI', 'ABIOLA', 'AYOOLUWATOMIWA', '2008-04-15', 'Male', 31, 'PLOT 1047 BALOGUN OLORUNFEMI CRESCENT AREPO OGUN STATE', 'AYEDADE', 'OSUN', 'deoluesq@yahoo.com, oluwatomis', 'WELL SPRING COLLEGE', 'B+', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'VERY WELL', '', '2019-10-10 09:56:59'),
(16, 'HHS2019/015', 'DAUDA', 'MOHAMMED', 'AHMED', '2009-05-10', 'Male', 29, '48,DARAMOLA OLU STREET, AREPO', 'KABBA/BUNU', 'KOGI STATE', 'LiyaLiya1@yahoo.com', 'OLIVE CRESCENT SCHOOL', 'O+', 'AA', 'NIGERIAN', 'ISLAM', 'HEALTHY+', '', '2019-10-10 10:03:01'),
(17, 'HHS2019/016', 'ERHABOR', 'ORIEKOSE', 'MARVELLOUS', '2008-04-07', 'Male', 31, 'BLOCK 27,THIS DAY STREET, JOURNALIST  ESTATE PHASE 1', 'ORHIOMWON', 'EDO', 'friday@markcelenz.com', 'LENS BRIDGE', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 10:26:04'),
(18, 'HHS2019/017', 'ABEGUNDE', 'IREOLUWATOMIWA', 'JOSHUA', '2005-12-18', 'Male', 32, '3A,OLUSOLA ONI STREET,BERA ESTATE,AREPO', 'AIYEKIRE', 'EKITI', 'olatunboto@hotmail.com', 'CHAMPIONS INTL SCHOOL', 'A', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 10:35:35'),
(19, 'HHS2019/018', 'ABEGUNDE', 'MOFIYINFOLUWA', 'PAUL', '2008-01-02', 'Male', 31, '3A,OLUSOLA ONI STREET,BERA ESTATE,AREPO.', 'AIYEKIRE', 'EKITI', 'olatunboto@hotmail.com', 'CHAMPIONS INTL SCHOOL', 'A', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 10:39:46'),
(20, 'HHS2019/019', 'ANIBABA', 'BOLARINWA', 'BIBABATIFE', '2007-08-07', 'Male', 31, '21B, THIS DAY AVENUE,JOURNALIST ESTATE PHASE 1', 'SURULERE', 'LAGOS STATE', 'Biolaajasaoluwa@gmail.com', 'CALVARY HIGH SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'PERFECT', '', '2019-10-10 10:43:24'),
(21, 'HHS2019/020', 'OREKOYA', 'OLUWADARASIMI', 'ADEMOLA', '2009-10-03', 'Male', 29, 'NO 2,JIMOH AKINSANYA STREET, AREPO.', 'IJEBU IFE', 'OGUN STATE', 'busbis04@yahoo.com', 'TRINITY KIDS SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 10:47:01'),
(22, 'HHS2019/021', 'OBANLA', 'OLUWADAMILOLA', 'OBANLA', '2008-03-28', 'Male', 30, 'UNITY STREET HOUSE FOUR', 'AKOKO NORTH WEST', 'ONDO STATE', 'bunmiboyede.bb@gmail.com', 'KINGS COLLEGE LAGOS', 'O POSITIVE', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'LESS STREESS', '', '2019-10-10 10:50:48'),
(23, 'HHS2019/022', 'ADEAGBO', 'ADESEWA', 'RODIYYAH', '2008-10-17', 'Female', 30, 'PLOT 2,UNIQUE ESTATE INAWA/ AREPO', 'ONA ARA', 'OYO STATE', 'adeyinkaadijatadeagbo@gmail.co', 'TAKBIR COLLEGE IBADAN', 'O POSITIVE', 'AS', 'NIGERIAN', 'ISLAM', 'GOOD', '', '2019-10-10 11:03:01'),
(24, 'HHS2019/023', 'AJIBOLA', 'EMMANUEL', 'OLUWADAMILOLA', '2008-04-01', 'Male', 30, '3,ALAAFIATAYO CLOSE HAVANNA ESTATE, AREPO TOWN', 'IKOLE', 'EKITI STATE', 'olusolaajibola@yahoo.com', 'WELL SPRING COLLEGE OMOLE PHASE 2', '', '', 'NIGERIAN', 'CHRISTIANITY', 'OKAY', '', '2019-10-10 12:59:46'),
(25, 'HHS2019/024', 'SHAOLA', 'OLAYINKA', 'SAMUEL', '2006-07-11', 'Male', 32, 'NO 31A,ASSOCIATION VOERA ESTATE AREPO', 'OBOKUN', 'OSUN', 'olayinkas@yahoo.com', 'ISOLOG SCHOOLS OJODU', 'O POSITIVE', 'AS', 'NIGERIAN', 'CHRISTIANITY', 'EXCELLENT', '', '2019-10-10 13:03:48'),
(26, 'HHS2019/025', 'AKIN-OLUDIRAN', 'BLESSED', 'AYOIFEOLUWA', '2009-05-20', 'Female', 29, '1,REHOBOTH CRESENT VOERA ESTATE, AREPO', 'IBADAN SOUTH WEST', 'OYO STATE', 'akinolu1@yahoo.com, obussy@yah', 'STRAIGHTGATE SCHOOL', '', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'PERFECT', '', '2019-10-10 13:09:43'),
(27, 'HHS2019/026', 'AKIN-OLUDIRAN', 'EUNICE', 'IREAYOOLUWA', '2007-10-09', 'Female', 30, '1,REHOBOTH CRESCENT VOERA ESTATE,AREPO', 'IBADAN SOUTH WEST', 'OYO STATE', 'akinolo1@yahoo.com, obussy@yah', 'SKYCREST HIGH SCHOOL', 'A RHESUS O', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'PERFECT', '', '2019-10-10 13:15:55'),
(28, 'HHS2019/027', 'OPE', 'OLUWADEMILADE', 'CHARLES', '2005-08-02', 'Male', 32, '35,BAYO OYEDE STREET,AREPO', 'IJEBU NORTH EAST', 'OGUN STATE', 'krisope1@yahoo.com', 'CMS GRAMMAR SCHOOL', 'O POSITIVE', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 13:22:16'),
(29, 'HHS2019/028', 'ALLI', 'OLAMILEKAN', 'ABDUL-HAMID', '2009-05-23', 'Male', 29, 'PLOT 7,BLOCK 39 FORTHRIGHT GARDENS BEHIND PUNCH PLACE MAGBORO.', 'EPE', 'LAGOS STATE', '', 'FUNKTOB SCHOOL', '', 'SC', 'NIGERIAN', 'ISLAM', 'GOOD', '', '2019-10-10 13:35:06'),
(31, 'HHS2019/029', 'ALLI', 'TEMITOPE', 'HALIMAT', '2006-11-16', 'Female', 32, 'PLOT 7,BLOCK 39 FORTHRIGHT GARDENS BEHIND PUNCH PLACE MAGBORO.', 'EPE ', 'LAGOS STATE', '', 'FUNKTOB SCHOOLS.', '', 'AS', 'NIGERIAN', 'ISLAM', 'GOOD', '', '2019-10-10 13:41:20'),
(32, 'HHS2019/030', 'OLAOMO', 'MOFIYINFOLUWA', 'DANIEL', '2009-05-30', 'Male', 29, 'PLOT 1035B,FEMI BALOGUN STREET, GLORYLAND ESTATE,AREPO.', 'ATIBA', 'OYO STATE', 'adekunleolaomo@yahoo.com', 'HAVARD CHILDREN SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', '', '', '2019-10-10 13:49:03'),
(33, 'HHS2019/031', 'OLAOMO', 'MOFOPEFOLUWA', 'DAVID', '2009-05-30', 'Male', 29, 'PLOT 1035B,FEMI BALOGUN STREET, GLORYLAND ESTATE AREPO.', 'ATIBA', 'OYO STATE', 'adekunleolaomo@yahoo.com', 'HAVARD CHILDREN SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 13:54:26'),
(34, 'HHS2019/032', 'OMONIME', 'ERIBODE', 'GLORY', '2005-10-16', 'Female', 32, 'NO 8A,ABIOLA BOLAJI STREET,PRAISE HILL ESTATE AREPO', 'BRUTU', 'DELTA', 'maryyak39s@yahoo.com, happines', 'INT SCIENCE& TECH COLLEGE SAMINKA KADUNA', '', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 14:07:26'),
(35, 'HHS2019/033', 'ADEGUNWA', 'TIMILEHIN', 'MIRIAN', '2010-01-01', 'Female', 29, 'BLOCK R,FLAT 106,YAWAHAB ESTATE AREPO.', 'OJOKORO', 'OGUN STATE', 'mronke62@yahoo.co.uk', 'BLUE STONE BRITISH ACADEMY', 'O POSITIVE', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 14:22:06'),
(36, 'HHS2019/034', 'IMARALU', 'OSAGHAE', 'HADRIAN', '2009-02-27', 'Male', 29, 'BLOCK AD, FLAT 191,DANBIDE MILLENNIUM ESTATE', 'ESAN WEST', 'EDO STATE', 'imoscy@yahoo.com', 'HAVARD CHILDREN SCHOOL', '', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 14:25:30'),
(37, 'HHS2019/035', 'TOBUN', 'BEATRICE', 'AYOMIDE', '2009-12-23', 'Female', 29, 'PLOT 11,BLOCK H.I VOERA ESTATE,AREPO', 'EPE', 'LAGOS', 'lasmick@gmail.com', 'WISESTARS SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'OKAY', '', '2019-10-10 14:29:52'),
(38, 'HHS2019/036', 'SONUGA', 'NIFEMI', 'FERANMI', '2006-02-04', 'Female', 33, '39,BEACHLAND ROAD AREPO', '', 'OGUN STATE', '', 'SPRINGWORTH SCHOOL', 'O POSITIVE', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'VERY FINE', '', '2019-10-10 14:39:18');

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
  `studentid` varchar(20) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffrole`
--

CREATE TABLE `staffrole` (
  `roleid` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentclassinfo`
--

CREATE TABLE `studentclassinfo` (
  `studentclassid` int(11) NOT NULL,
  `studentschoolid` varchar(10) NOT NULL,
  `session` int(10) NOT NULL,
  `paymentstructureid` int(4) NOT NULL,
  `classid` varchar(2) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentclassinfo`
--

INSERT INTO `studentclassinfo` (`studentclassid`, `studentschoolid`, `session`, `paymentstructureid`, `classid`, `dateadded`) VALUES
(1, 'HCS432STD', 2017, 0, '1', '2018-03-18 17:58:00'),
(2, '423', 2017, 0, '4', '2018-03-19 11:58:43'),
(3, '505', 2017, 0, '4', '2018-03-19 11:59:12'),
(4, '481', 2017, 0, '4', '2018-03-19 11:59:48'),
(5, '407', 2017, 0, '4', '2018-03-19 12:00:20'),
(6, '447', 2017, 0, '4', '2018-03-19 12:00:46'),
(7, '461', 2017, 0, '4', '2018-03-19 12:01:08'),
(8, '446', 2017, 0, '4', '2018-03-19 12:01:36'),
(9, '499', 2017, 0, '4', '2018-03-19 12:02:07'),
(10, '528', 2017, 0, '4', '2018-03-19 12:02:35'),
(11, '504', 2017, 0, '4', '2018-03-19 12:02:55'),
(12, '541', 2017, 0, '4', '2018-03-19 12:03:29'),
(13, '491', 2017, 0, '4', '2018-03-19 12:03:51'),
(14, '491', 2017, 0, '4', '2018-03-19 12:03:51'),
(15, '440', 2017, 0, '4', '2018-03-19 12:04:19'),
(16, '459', 2017, 0, '5', '2018-03-19 12:34:42'),
(17, '427', 2017, 0, '5', '2018-03-19 12:35:13'),
(18, '506', 2017, 0, '5', '2018-03-19 12:35:36'),
(19, '460', 2017, 0, '5', '2018-03-19 12:36:04'),
(20, '448', 2017, 0, '5', '2018-03-19 12:36:37'),
(21, '455', 2017, 0, '5', '2018-03-19 12:37:23'),
(22, '405', 2017, 0, '5', '2018-03-19 12:37:54'),
(23, '471', 2017, 0, '5', '2018-03-19 12:38:22'),
(24, '457', 2017, 0, '5', '2018-03-19 12:38:53'),
(25, '529', 2017, 0, '5', '2018-03-19 12:39:14'),
(26, '482', 2017, 0, '5', '2018-03-19 12:39:40'),
(27, '532', 2017, 0, '5', '2018-03-19 12:40:09'),
(28, '508', 2017, 0, '5', '2018-03-19 12:43:31'),
(29, '577', 2017, 0, '5', '2018-03-19 12:43:53'),
(30, '596', 2017, 0, '5', '2018-03-19 12:44:21'),
(31, '321', 2017, 0, '7', '2018-03-20 09:29:23'),
(32, '408', 2017, 0, '7', '2018-03-20 09:29:52'),
(33, '537', 2017, 0, '7', '2018-03-20 09:30:21'),
(34, '329', 2017, 0, '7', '2018-03-20 09:30:42'),
(35, '386', 2017, 0, '7', '2018-03-20 09:31:12'),
(36, '430', 2017, 0, '7', '2018-03-20 09:31:34'),
(37, '489', 2017, 0, '7', '2018-03-20 09:32:22'),
(38, '359', 2017, 0, '7', '2018-03-20 09:32:41'),
(39, '568', 2017, 0, '7', '2018-03-20 09:33:25'),
(40, '547', 2017, 0, '7', '2018-03-20 09:33:42'),
(41, '382', 2017, 0, '7', '2018-03-20 09:34:19'),
(42, '456', 2017, 0, '7', '2018-03-20 09:34:46'),
(43, '345', 2017, 0, '7', '2018-03-20 09:35:11'),
(44, '408', 2017, 0, '6', '2018-03-20 09:36:21'),
(45, '516', 2017, 0, '6', '2018-03-20 09:36:57'),
(46, '418', 2017, 0, '6', '2018-03-20 09:38:02'),
(47, '360', 2017, 0, '6', '2018-03-20 09:38:20'),
(48, '581', 2017, 0, '6', '2018-03-20 09:38:42'),
(49, '467', 2017, 0, '6', '2018-03-20 09:39:03'),
(50, '527', 2017, 0, '6', '2018-03-20 09:39:33'),
(51, '369', 2017, 0, '6', '2018-03-20 09:39:48'),
(52, '600', 2017, 0, '6', '2018-03-20 09:40:04'),
(53, '346', 2017, 0, '6', '2018-03-20 09:40:24'),
(54, '413', 2017, 0, '6', '2018-03-20 09:40:50'),
(55, '468', 2017, 0, '6', '2018-03-20 09:41:11'),
(56, '322', 2017, 0, '6', '2018-03-20 09:41:33'),
(57, '597', 2017, 0, '6', '2018-03-20 09:42:34'),
(58, '391', 2017, 0, '6', '2018-03-20 09:43:11'),
(59, '611', 2017, 0, '7', '2018-03-20 09:44:15'),
(60, '388', 2017, 0, '6', '2018-03-20 09:46:46'),
(61, '4110', 2017, 0, '9', '2018-03-20 22:54:59'),
(62, '331', 2017, 0, '9', '2018-03-20 23:02:38'),
(63, '438', 2017, 0, '9', '2018-03-20 23:03:22'),
(64, '419', 2017, 0, '9', '2018-03-20 23:03:53'),
(65, '287', 2017, 0, '9', '2018-03-20 23:04:46'),
(66, '327', 2017, 0, '9', '2018-03-20 23:05:17'),
(67, '559', 2017, 0, '9', '2018-03-20 23:06:01'),
(68, '578', 2017, 0, '9', '2018-03-20 23:07:06'),
(69, '498', 2017, 0, '9', '2018-03-20 23:07:47'),
(70, '612', 2017, 0, '8', '2018-03-20 23:09:20'),
(71, '565', 2017, 0, '8', '2018-03-20 23:09:44'),
(72, '558', 2017, 0, '8', '2018-03-20 23:10:30'),
(73, '410', 2017, 0, '8', '2018-03-20 23:10:56'),
(74, '441', 2017, 0, '8', '2018-03-20 23:11:28'),
(75, '304', 2017, 0, '8', '2018-03-20 23:12:15'),
(76, '296', 2017, 0, '8', '2018-03-20 23:12:42'),
(77, '527', 2017, 0, '8', '2018-03-20 23:13:09'),
(78, '299', 2017, 0, '8', '2018-03-20 23:13:34'),
(79, '311', 2017, 0, '8', '2018-03-20 23:13:57'),
(80, '469', 2017, 0, '8', '2018-03-20 23:14:24'),
(81, '353', 2017, 0, '9', '2018-03-20 23:15:21'),
(82, '229', 2017, 0, '11', '2018-03-20 23:56:57'),
(83, '188', 2017, 0, '11', '2018-03-20 23:58:39'),
(84, '590', 2017, 0, '11', '2018-03-20 23:59:28'),
(85, '223', 2017, 0, '11', '2018-03-20 23:59:51'),
(86, '509', 2017, 0, '11', '2018-03-21 00:00:46'),
(87, '232', 2017, 0, '11', '2018-03-21 00:01:12'),
(88, '107', 2017, 0, '11', '2018-03-21 00:01:46'),
(89, 'GD2395', 2017, 0, '11', '2018-03-21 00:08:56'),
(90, 'GD2193', 2017, 0, '11', '2018-03-21 00:09:29'),
(91, 'GD2194', 2017, 0, '11', '2018-03-21 00:09:57'),
(92, 'GD2303', 2017, 0, '11', '2018-03-21 00:10:30'),
(93, 'GD2437', 2017, 0, '11', '2018-03-21 00:18:32'),
(94, 'GD2352', 2017, 0, '10', '2018-03-21 00:19:52'),
(95, 'GD2282', 2017, 0, '10', '2018-03-21 00:20:23'),
(96, 'GD2269', 2017, 0, '10', '2018-03-21 00:20:56'),
(97, 'GD2227', 2017, 0, '10', '2018-03-21 00:21:26'),
(98, 'GD2430', 2017, 0, '10', '2018-03-21 00:22:01'),
(99, 'GD2497', 2017, 0, '10', '2018-03-21 00:27:28'),
(100, 'GD2338', 2017, 0, '10', '2018-03-21 00:28:56'),
(101, 'GD2211', 2017, 0, '10', '2018-03-21 00:29:26'),
(102, 'GD2342', 2017, 0, '10', '2018-03-21 00:29:54'),
(103, 'GD2278', 2017, 0, '10', '2018-03-21 00:30:30'),
(104, 'GD2234', 2017, 0, '10', '2018-03-21 00:31:21'),
(105, 'GD2280', 2017, 0, '10', '2018-03-21 00:31:49'),
(106, 'GD2553', 2017, 0, '10', '2018-03-21 00:32:22'),
(107, 'GD2586', 2017, 0, '10', '2018-03-21 00:32:50'),
(108, 'GD2466', 2017, 0, '10', '2018-03-21 00:33:28'),
(109, 'GD2292', 2017, 0, '10', '2018-03-21 00:34:08'),
(110, 'GD2432', 2017, 0, '10', '2018-03-21 00:34:34'),
(111, 'GD2276', 2017, 0, '10', '2018-03-21 00:35:00'),
(112, 'GD2542', 2017, 0, '10', '2018-03-21 00:35:59'),
(113, 'GD2567', 2017, 0, '10', '2018-03-21 00:36:42'),
(114, 'GD2524', 2017, 0, '10', '2018-03-21 00:37:25'),
(115, 'GD2539', 2017, 0, '10', '2018-03-21 00:38:20'),
(116, 'GD2593', 2017, 0, '11', '2018-03-21 00:39:08'),
(117, 'GD2531', 2017, 0, '11', '2018-03-21 00:39:57'),
(118, 'GD2579', 2017, 0, '11', '2018-03-21 00:40:44'),
(119, 'GD2485', 2017, 0, '11', '2018-03-21 00:41:20'),
(120, 'GD6097', 2017, 0, '17', '2018-03-21 01:07:27'),
(121, 'GD6053', 2017, 0, '17', '2018-03-21 01:10:15'),
(122, 'GD6486', 2017, 0, '17', '2018-03-21 01:11:07'),
(123, 'GD6377', 2017, 0, '17', '2018-03-21 01:11:31'),
(124, 'GD6025', 2017, 0, '17', '2018-03-21 01:11:58'),
(125, 'PG0572', 2017, 0, '1', '2018-03-21 03:03:35'),
(126, 'PG0575', 2017, 0, '1', '2018-03-21 03:04:08'),
(127, 'PG0598', 2017, 0, '1', '2018-03-21 03:04:39'),
(128, 'PG0599', 2017, 0, '1', '2018-03-21 03:05:04'),
(129, 'PG0594', 2017, 0, '1', '2018-03-21 03:05:48'),
(130, 'PG0606', 2017, 0, '1', '2018-03-21 03:06:19'),
(131, 'PG0607', 2017, 0, '1', '2018-03-21 03:06:57'),
(132, 'PG0610', 2017, 0, '1', '2018-03-21 03:07:30'),
(133, 'PG0617', 2017, 0, '1', '2018-03-21 03:07:57'),
(134, 'GD0065', 2017, 0, '16', '2018-03-21 14:23:56'),
(135, 'GD0285', 2017, 0, '16', '2018-03-21 14:24:26'),
(136, 'GD0538', 2017, 0, '16', '2018-03-21 14:25:10'),
(137, 'GD0523', 2017, 0, '16', '2018-03-21 14:25:57'),
(138, 'GD0571', 2017, 0, '16', '2018-03-21 14:26:44'),
(139, 'GD0417', 2017, 0, '16', '2018-03-21 14:27:11'),
(140, 'GD5576', 2017, 0, '16', '2018-03-21 14:27:42'),
(141, 'GD5290', 2017, 0, '16', '2018-03-21 14:28:56'),
(142, 'GD5012', 2017, 0, '16', '2018-03-21 14:30:29'),
(143, 'GD5435', 2017, 0, '16', '2018-03-21 14:31:01'),
(144, 'GD5564', 2017, 0, '16', '2018-03-21 14:31:30'),
(145, 'GD5426', 2017, 0, '16', '2018-03-21 14:32:18'),
(146, 'GD5239', 2017, 0, '16', '2018-03-21 14:32:55'),
(147, 'GD5583', 2017, 0, '16', '2018-03-21 14:34:36'),
(148, 'GD5545', 2017, 0, '16', '2018-03-21 14:36:36'),
(149, 'GD5618', 2017, 0, '16', '2018-03-21 14:37:12'),
(150, 'GD4158', 2017, 0, '15', '2018-03-22 06:54:16'),
(151, 'GD4158', 2017, 0, '15', '2018-03-22 06:54:56'),
(152, 'GD4201', 2017, 0, '15', '2018-03-22 06:55:16'),
(153, 'GD4510', 2017, 0, '15', '2018-03-22 06:57:24'),
(154, 'GD4014', 2017, 0, '15', '2018-03-22 07:01:08'),
(155, 'GD4117', 2017, 0, '15', '2018-03-22 07:04:03'),
(156, 'GD4248', 2017, 0, '15', '2018-03-22 07:04:34'),
(157, 'GD4248', 2017, 0, '15', '2018-03-22 07:04:34'),
(158, 'GD4463', 2017, 0, '15', '2018-03-22 07:05:10'),
(159, 'GD4213', 2017, 0, '15', '2018-03-22 07:06:52'),
(160, 'GD4478', 2017, 0, '15', '2018-03-22 07:14:39'),
(161, 'GD4416', 2017, 0, '15', '2018-03-22 07:17:01'),
(162, 'GD4496', 2017, 0, '15', '2018-03-22 07:17:46'),
(163, 'GD4439', 2017, 0, '15', '2018-03-22 07:18:35'),
(164, 'GD4305', 2017, 0, '15', '2018-03-22 07:19:01'),
(165, 'GD4305', 2017, 0, '15', '2018-03-22 07:19:01'),
(166, 'GD4378', 2017, 0, '15', '2018-03-22 07:19:34'),
(167, 'GD4162', 2017, 0, '15', '2018-03-22 07:20:00'),
(168, 'GD4184', 2017, 0, '15', '2018-03-22 07:20:29'),
(169, 'GD4584', 2017, 0, '15', '2018-03-22 07:20:54'),
(170, 'GD4587', 2017, 0, '15', '2018-03-22 07:21:25'),
(171, 'GD4087', 2017, 0, '15', '2018-03-22 07:22:03'),
(172, 'GD4415', 2017, 0, '15', '2018-03-22 07:23:10'),
(173, 'GD4415', 2017, 0, '14', '2018-03-22 07:23:18'),
(174, 'GD4207', 2017, 0, '14', '2018-03-22 07:25:47'),
(175, 'GD4472', 2017, 0, '14', '2018-03-22 07:34:54'),
(176, 'GD4479', 2017, 0, '14', '2018-03-22 07:45:18'),
(177, 'GD5576', 2017, 0, '16', '2018-03-22 07:46:28'),
(178, 'GD4252', 2017, 0, '14', '2018-03-22 07:47:45'),
(179, 'GD4070', 2017, 0, '14', '2018-03-22 07:48:15'),
(180, 'GD4197', 2017, 0, '14', '2018-03-22 07:50:49'),
(181, 'GD4152', 2017, 0, '14', '2018-03-22 07:51:38'),
(182, 'GD4166', 2017, 0, '14', '2018-03-22 07:53:11'),
(183, 'GD4104', 2017, 0, '14', '2018-03-22 07:53:50'),
(184, 'GD4444', 2017, 0, '14', '2018-03-22 07:54:49'),
(185, 'GD4219', 2017, 0, '14', '2018-03-22 07:55:26'),
(186, 'GD4146', 2017, 0, '14', '2018-03-22 07:56:02'),
(187, 'GD4476', 2017, 0, '14', '2018-03-22 07:56:53'),
(188, 'GD4595', 2017, 0, '14', '2018-03-22 07:57:28'),
(189, 'GD4157', 2017, 0, '14', '2018-03-22 08:08:11'),
(190, 'GD3173', 2017, 0, '12', '2018-03-22 08:11:20'),
(191, 'GD3154', 2017, 0, '13', '2018-03-22 08:11:56'),
(192, 'GD3096', 2017, 0, '13', '2018-03-22 08:12:44'),
(193, 'GD3428', 2017, 0, '13', '2018-03-22 08:13:22'),
(194, 'GD3428', 2017, 0, '13', '2018-03-22 08:13:42'),
(195, 'GD2229', 2017, 0, '11', '2018-03-22 08:19:14'),
(196, 'GD2188', 2017, 0, '11', '2018-03-22 08:22:49'),
(197, 'GD2590', 2017, 0, '11', '2018-03-22 08:25:01'),
(198, 'GD2223', 2017, 0, '11', '2018-03-22 08:26:10'),
(199, 'GD2509', 2017, 0, '11', '2018-03-22 08:27:25'),
(200, 'GD2232', 2017, 0, '11', '2018-03-22 08:28:09'),
(201, 'GD2107', 2017, 0, '11', '2018-03-22 08:29:42'),
(202, 'GD3163', 2017, 0, '13', '2018-03-22 08:30:21'),
(203, 'GD3Adekunl', 2017, 0, '13', '2018-03-22 08:31:02'),
(204, 'GD2395', 2017, 0, '11', '2018-03-22 08:31:21'),
(205, 'GD2193', 2017, 0, '11', '2018-03-22 08:32:00'),
(206, 'GD3286', 2017, 0, '13', '2018-03-22 08:32:25'),
(207, 'GD2194', 2017, 0, '11', '2018-03-22 08:33:07'),
(208, 'GD3424', 2017, 0, '13', '2018-03-22 08:33:08'),
(209, 'GD3403', 2017, 0, '13', '2018-03-22 08:33:53'),
(210, 'GD2303', 2017, 0, '11', '2018-03-22 08:33:59'),
(211, 'GD3089', 2017, 0, '13', '2018-03-22 08:34:24'),
(212, 'GD2437', 2017, 0, '11', '2018-03-22 08:35:10'),
(213, 'GD3536', 2017, 0, '12', '2018-03-22 08:35:14'),
(214, 'GD3474', 2017, 0, '12', '2018-03-22 08:35:48'),
(215, 'GD2352', 2017, 0, '11', '2018-03-22 08:36:01'),
(216, 'GD3064', 2017, 0, '12', '2018-03-22 08:36:24'),
(217, 'GD3160', 2017, 0, '12', '2018-03-22 08:36:59'),
(218, 'GD3493', 2017, 0, '12', '2018-03-22 08:37:24'),
(219, 'GD2542', 2017, 0, '11', '2018-03-22 08:37:29'),
(220, 'GD3206', 2017, 0, '12', '2018-03-22 08:37:53'),
(221, 'GD3241', 2017, 0, '12', '2018-03-22 08:38:19'),
(222, 'GD3134', 2017, 0, '12', '2018-03-22 08:38:58'),
(223, 'GD3592', 2017, 0, '13', '2018-03-22 08:39:30'),
(224, 'GD3562', 2017, 0, '13', '2018-03-22 08:40:03'),
(225, 'GD2524', 2017, 0, '11', '2018-03-22 08:40:38'),
(226, 'GD3591', 2017, 0, '12', '2018-03-22 08:40:39'),
(227, 'GD3293', 2017, 0, '13', '2018-03-22 08:41:15'),
(228, 'GD3566', 2017, 0, '13', '2018-03-22 08:42:14'),
(229, 'GD2593', 2017, 0, '11', '2018-03-22 08:42:30'),
(230, 'GD2485', 2017, 0, '11', '2018-03-22 08:44:04'),
(231, 'GD2531', 2017, 0, '11', '2018-03-22 08:45:30'),
(232, 'GD2282', 2017, 0, '10', '2018-03-22 08:47:55'),
(233, 'GD3563', 2017, 0, '12', '2018-03-22 08:48:55'),
(234, 'GD3574', 2017, 0, '12', '2018-03-22 08:49:24'),
(235, 'GD2269', 2017, 0, '10', '2018-03-22 08:49:47'),
(236, 'GD3561', 2017, 0, '12', '2018-03-22 08:50:24'),
(237, 'GD3615', 2017, 0, '13', '2018-03-22 08:50:57'),
(238, 'GD2227', 2017, 0, '10', '2018-03-22 08:52:39'),
(239, 'GD2497', 2017, 0, '10', '2018-03-22 08:53:24'),
(240, 'GD2338', 2017, 0, '10', '2018-03-22 08:53:58'),
(241, 'GD2211', 2017, 0, '10', '2018-03-22 08:55:12'),
(242, 'GD2342', 2017, 0, '10', '2018-03-22 08:55:49'),
(243, 'GD2278', 2017, 0, '10', '2018-03-22 08:56:35'),
(244, 'GD3561', 2017, 0, '12', '2018-03-22 08:57:47'),
(245, 'GD2234', 2017, 0, '10', '2018-03-22 08:58:11'),
(246, 'GD2280', 2017, 0, '10', '2018-03-22 08:59:31'),
(247, 'GD2553', 2017, 0, '10', '2018-03-22 09:00:10'),
(248, 'GD2586', 2017, 0, '10', '2018-03-22 09:01:35'),
(249, 'GD2292', 2017, 0, '10', '2018-03-22 09:02:58'),
(250, 'GD2466', 2017, 0, '10', '2018-03-22 09:04:11'),
(251, 'GD2432', 2017, 0, '10', '2018-03-22 09:05:23'),
(252, 'GD1331', 2017, 0, '9', '2018-03-22 09:05:41'),
(253, 'GD1438', 2017, 0, '9', '2018-03-22 09:06:14'),
(254, 'GD2539', 2017, 0, '10', '2018-03-22 09:06:43'),
(255, 'GD1419', 2017, 0, '9', '2018-03-22 09:06:47'),
(256, 'GD1353', 2017, 0, '9', '2018-03-22 09:07:13'),
(257, 'GD1287', 2017, 0, '9', '2018-03-22 09:08:08'),
(258, 'GD2567', 2017, 0, '10', '2018-03-22 09:08:11'),
(259, 'GD1261', 2017, 0, '9', '2018-03-22 09:08:39'),
(260, 'GD1327', 2017, 0, '9', '2018-03-22 09:09:00'),
(261, 'GD2579', 2017, 0, '10', '2018-03-22 09:09:39'),
(262, 'GD2229', 2017, 0, '11', '2018-03-22 10:13:43'),
(263, 'GD1462', 2017, 0, '8', '2018-03-22 10:31:00'),
(264, 'GD1582', 2017, 0, '9', '2018-03-22 10:33:52'),
(265, 'GD1495', 2017, 0, '8', '2018-03-22 10:37:09'),
(266, 'GD3250', 2017, 0, '13', '2018-03-22 12:02:17'),
(267, 'PG84385', 2017, 0, '8', '2018-03-24 15:20:52'),
(268, 'RC0530', 2017, 0, '2', '2018-03-26 10:16:51'),
(269, 'RC0585', 2017, 0, '3', '2018-03-26 10:17:53'),
(270, 'RC0121', 2017, 0, '3', '2018-03-28 09:08:10'),
(271, 'RC0122', 2017, 0, '3', '2018-03-28 09:08:49'),
(272, 'RC0128', 2017, 0, '2', '2018-03-28 09:09:49'),
(273, 'RC0129', 2017, 0, '2', '2018-03-28 09:13:09'),
(274, 'RC0130', 2017, 0, '2', '2018-03-28 09:13:31'),
(275, 'RC0131', 2017, 0, '2', '2018-03-28 09:13:56'),
(276, 'RC0133', 2017, 0, '2', '2018-03-28 09:14:45'),
(277, 'RC0140', 2017, 0, '2', '2018-03-28 09:15:17'),
(278, 'RC0141', 2017, 0, '2', '2018-03-28 09:15:42'),
(279, 'RC0142', 2017, 0, '2', '2018-03-28 09:16:05'),
(280, 'RC0123', 2017, 0, '3', '2018-03-28 09:53:12'),
(281, 'RC0125', 2017, 0, '3', '2018-03-28 09:59:18'),
(282, 'RC0126', 2017, 0, '3', '2018-03-28 10:00:08'),
(283, 'RC0127', 2017, 0, '3', '2018-03-28 10:00:32'),
(284, 'RC0132', 2017, 0, '3', '2018-03-28 10:01:17'),
(285, 'RC0137', 2017, 0, '3', '2018-03-28 10:01:53'),
(286, 'RC0138', 2017, 0, '3', '2018-03-28 10:02:24'),
(287, 'RC0139', 2017, 0, '3', '2018-03-28 10:02:40'),
(288, 'RC0143', 2017, 0, '3', '2018-03-28 10:03:27'),
(289, 'RC0144', 2017, 0, '3', '2018-03-28 10:04:22'),
(290, 'J1222', 2017, 0, '18', '2018-04-11 08:04:00'),
(291, 'HCSGGDT', 2018, 0, '8', '2018-04-11 11:58:49'),
(292, 'GD13333', 2017, 0, '8', '2018-04-11 13:53:10'),
(293, 'HCS88473', 2017, 0, '8', '2018-04-12 11:52:03'),
(294, 'HCS88473q', 2017, 0, '6', '2018-04-12 11:52:39'),
(295, 'JS12345', 2017, 0, '22', '2018-04-19 13:22:58'),
(296, 'GD5619', 2017, 0, '16', '2018-04-24 14:49:08'),
(297, 'PG0626', 2017, 0, '1', '2018-04-25 10:01:07'),
(298, 'NR1625', 2017, 0, '4', '2018-04-25 10:04:45'),
(299, 'NR2624', 2017, 0, '6', '2018-04-25 10:09:04'),
(300, 'GD1620', 2017, 0, '9', '2018-04-25 10:37:13'),
(301, 'PG0621', 2017, 0, '1', '2018-04-25 10:39:36'),
(302, 'PG0622', 2017, 0, '1', '2018-04-25 10:40:16'),
(303, 'RC0623', 2017, 0, '2', '2018-04-25 10:42:55'),
(304, 'TST12345', 2017, 0, '11', '2018-05-10 11:57:37'),
(305, 'TEST1111', 2017, 0, '25', '2018-06-04 08:33:54'),
(306, 'TEST112', 2017, 0, '26', '2018-06-04 08:34:14'),
(307, 'GD6627', 2016, 0, '17', '2018-06-07 12:26:35'),
(308, 'PG0629', 2018, 0, '1', '2018-07-10 11:17:10'),
(309, '', 2018, 0, '1', '2018-09-26 11:45:28'),
(310, 'PGO630', 2018, 0, '1', '2018-09-26 11:46:07'),
(311, 'PGO631', 2018, 0, '1', '2018-09-26 11:55:57'),
(312, 'PGO632', 2018, 0, '1', '2018-09-27 09:25:57'),
(313, 'PGO633', 2018, 0, '1', '2018-09-27 09:32:43'),
(314, 'PGO634', 2018, 0, '1', '2018-09-27 09:34:10'),
(315, 'PGO635', 2018, 0, '1', '2018-09-27 09:39:23'),
(316, 'PGO636', 2018, 0, '1', '2018-09-27 09:43:43'),
(317, 'PGO67', 2018, 0, '1', '2018-09-27 09:54:14'),
(318, 'PGO637', 2018, 0, '1', '2018-09-27 09:58:47'),
(319, 'PGO638', 2018, 0, '1', '2018-09-27 10:04:51'),
(320, 'PGO639', 2018, 0, '1', '2018-09-27 10:08:17'),
(321, 'GD1640', 2018, 0, '9', '2018-09-27 10:12:42'),
(322, 'RCO641', 2018, 0, '3', '2018-09-27 10:17:17'),
(323, 'NR2642', 2018, 0, '6', '2018-09-27 10:21:35'),
(324, 'NR2644', 2018, 0, '7', '2018-09-27 10:36:40'),
(325, 'RCO643', 2018, 0, '3', '2018-09-27 10:39:37'),
(326, 'GD3645', 2018, 0, '12', '2018-09-27 10:44:00'),
(327, 'RCO646', 2018, 0, '3', '2018-09-27 10:49:33'),
(328, 'RCO647', 2018, 0, '3', '2018-09-27 10:53:29'),
(329, 'NUR2O648', 2018, 0, '6', '2018-09-27 10:57:29'),
(330, 'NR2O648', 2018, 0, '6', '2018-09-27 10:57:58'),
(331, 'NR2649', 2018, 0, '6', '2018-09-27 11:00:24'),
(332, 'NR2648', 2018, 0, '6', '2018-09-27 11:02:32'),
(333, 'GD4649', 2018, 0, '15', '2018-09-27 11:24:25'),
(334, 'GD2650', 2018, 0, '15', '2018-09-27 11:28:20'),
(335, 'GD2651', 2018, 0, '11', '2018-09-27 11:33:36'),
(336, 'GD2652', 2018, 0, '11', '2018-09-27 11:38:57'),
(337, 'GD2653', 2018, 0, '13', '2018-09-27 11:49:29'),
(338, 'NR2654', 2018, 0, '6', '2018-09-27 11:58:31'),
(339, 'RCO655', 2018, 0, '2', '2018-09-27 12:05:39'),
(340, 'GD2656', 2018, 0, '10', '2018-09-28 07:01:23'),
(341, 'RCO657', 2018, 0, '2', '2018-10-02 06:34:23'),
(342, 'PGO665', 2018, 0, '1', '2018-10-08 10:15:07'),
(343, 'GD2658', 2018, 0, '10', '2018-10-08 10:19:06'),
(344, 'NR2659', 2018, 0, '6', '2018-10-08 10:20:45'),
(345, 'GD2660', 2018, 0, '11', '2018-10-08 10:27:11'),
(346, 'RC0661', 2018, 0, '3', '2018-10-08 10:33:21'),
(347, 'NR1662', 2018, 0, '4', '2018-10-08 10:35:26'),
(348, 'RCO663', 2018, 0, '2', '2018-10-08 10:46:01'),
(349, 'RCO64', 2018, 0, '2', '2018-10-08 10:47:11'),
(350, 'RC0666', 2018, 0, '2', '2018-10-24 13:39:03'),
(351, 'RC0667', 2018, 0, '2', '2018-10-30 14:37:18'),
(352, 'PG0669', 2018, 0, '1', '2018-10-30 14:41:17'),
(353, 'NRI668', 2018, 0, '1', '2018-10-30 14:45:17'),
(354, 'RC0670', 2018, 0, '2', '2018-12-04 07:46:16'),
(355, 'GD4671', 2018, 0, '14', '2019-01-15 10:47:16'),
(356, 'GD1672', 2018, 0, '9', '2019-01-15 10:50:41'),
(357, 'GD2673', 2018, 0, '11', '2019-01-15 10:51:56'),
(358, 'PG0674', 2018, 0, '1', '2019-01-15 10:57:25'),
(359, 'PG0675', 2018, 0, '1', '2019-01-15 10:58:17'),
(360, 'PG0675', 2018, 0, '1', '2019-01-15 11:00:34'),
(361, 'PG0674', 2018, 0, '1', '2019-01-15 11:01:04'),
(362, 'PG0676', 2018, 0, '1', '2019-01-15 11:04:39'),
(363, 'PG0677', 2018, 0, '1', '2019-01-15 11:08:16'),
(364, 'PG0678', 2018, 0, '1', '2019-01-15 11:10:17'),
(365, 'PG0679', 2018, 0, '1', '2019-01-15 11:12:49'),
(366, 'NUR2680', 2018, 0, '7', '2019-01-15 11:15:08'),
(367, 'GRD2681', 2018, 0, '11', '2019-01-15 11:16:37'),
(368, 'PG0682', 2018, 0, '1', '2019-01-15 11:35:35'),
(369, 'RC0683', 2018, 0, '1', '2019-01-15 11:38:56'),
(370, 'NR1684', 2018, 0, '5', '2019-01-15 11:42:55'),
(371, 'RC0685', 2018, 0, '3', '2019-01-15 11:45:00'),
(372, 'GD1686', 2018, 0, '8', '2019-02-12 05:52:17'),
(373, 'NR2687', 2018, 0, '8', '2019-02-12 05:57:26'),
(374, 'GD2688', 2018, 0, '10', '2019-02-12 06:00:47'),
(375, 'HHS2019/00', 2019, 0, '32', '2019-09-03 11:41:46'),
(376, 'HHS2019/00', 2019, 0, '29', '2019-09-04 09:30:53'),
(377, 'HHS2019/00', 2019, 0, '35', '2019-09-18 12:56:03'),
(378, 'HHS2019/00', 2019, 0, '32', '2019-09-18 13:37:18'),
(379, 'HHS2019/00', 2019, 0, '32', '2019-10-09 14:52:57'),
(380, 'HHS2019/00', 2019, 0, '31', '2019-10-09 15:11:28'),
(381, 'HHS2019/00', 2019, 0, '33', '2019-10-10 08:38:54'),
(382, 'HHS2019/00', 2019, 0, '32', '2019-10-10 08:46:27'),
(383, 'HHS2019/00', 2019, 0, '41', '2019-10-10 08:50:37'),
(384, 'HHS2019/00', 2019, 0, '29', '2019-10-10 08:54:43'),
(385, 'HHS2019/00', 2019, 0, '29', '2019-10-10 09:00:04'),
(386, 'HHS2019/00', 2019, 0, '29', '2019-10-10 09:08:38'),
(387, 'HHS2019/00', 2019, 0, '31', '2019-10-10 09:14:00'),
(388, 'HHS2019/01', 2019, 0, '32', '2019-10-10 09:18:45'),
(389, 'HHS2019/01', 2019, 0, '32', '2019-10-10 09:40:46'),
(390, 'HHS2019/01', 2019, 0, '30', '2019-10-10 09:45:03'),
(391, 'HHS2019/01', 2019, 0, '33', '2019-10-10 09:49:59'),
(392, 'HHS2019/01', 2019, 0, '29', '2019-10-10 09:52:47'),
(393, 'HHS2019/01', 2019, 0, '31', '2019-10-10 09:56:59'),
(394, 'HHS2019/01', 2019, 0, '29', '2019-10-10 10:03:01'),
(395, 'HHS2019/01', 2019, 0, '31', '2019-10-10 10:26:04'),
(396, 'HHS2019/01', 2019, 0, '32', '2019-10-10 10:35:35'),
(397, 'HHS2019/01', 2019, 0, '31', '2019-10-10 10:39:46'),
(398, 'HHS2019/01', 2019, 0, '31', '2019-10-10 10:43:24'),
(399, 'HHS2019/02', 2019, 0, '29', '2019-10-10 10:47:01'),
(400, 'HHS2019/02', 2019, 0, '30', '2019-10-10 10:50:48'),
(401, 'HHS2019/02', 2019, 0, '30', '2019-10-10 11:03:01'),
(402, 'HHS2019/02', 2019, 0, '30', '2019-10-10 12:59:46'),
(403, 'HHS2019/02', 2019, 0, '32', '2019-10-10 13:03:48'),
(404, 'HHS2019/02', 2019, 0, '29', '2019-10-10 13:09:43'),
(405, 'HHS2019/02', 2019, 0, '30', '2019-10-10 13:15:55'),
(406, 'HHS2019/02', 2019, 0, '32', '2019-10-10 13:22:16'),
(407, 'HHS2019/02', 2019, 0, '29', '2019-10-10 13:35:06'),
(408, 'HHS2019/02', 2019, 0, '32', '2019-10-10 13:41:20'),
(409, 'HHS2019/03', 2019, 0, '29', '2019-10-10 13:49:03'),
(410, 'HHS2019/03', 2019, 0, '29', '2019-10-10 13:54:27'),
(411, 'HHS2019/03', 2019, 0, '32', '2019-10-10 14:07:26'),
(412, 'HHS2019/03', 2019, 0, '29', '2019-10-10 14:22:06'),
(413, 'HHS2019/03', 2019, 0, '29', '2019-10-10 14:25:30'),
(414, 'HHS2019/03', 2019, 0, '29', '2019-10-10 14:29:52'),
(415, 'HHS2019/03', 2019, 0, '33', '2019-10-10 14:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `subjectcat`
--

CREATE TABLE `subjectcat` (
  `catid` int(11) NOT NULL,
  `schooltypeid` int(2) NOT NULL,
  `subjectcatname` varchar(40) NOT NULL,
  `catdescription` text NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectcat`
--

INSERT INTO `subjectcat` (`catid`, `schooltypeid`, `subjectcatname`, `catdescription`, `dateadded`) VALUES
(4, 29, 'ENGLISH-JSS1', '', '2019-09-12 13:14:36'),
(5, 29, 'CIVICS-JSS1', '', '2019-09-12 13:14:43'),
(6, 29, 'BST-JSS1', '', '2019-09-12 13:14:47'),
(7, 29, 'BST-JSS1', '', '2019-09-12 13:14:47'),
(8, 29, 'BST-JSS1', '', '2019-09-12 13:14:48'),
(9, 29, 'SOS-JSS1', '', '2019-09-12 13:14:54'),
(10, 29, 'CCA-JSS1', '', '2019-09-12 13:15:05'),
(11, 29, 'ICT-JSS1', '', '2019-09-12 13:15:10'),
(12, 29, 'HISTORY-JSS1', '', '2019-09-12 13:15:15'),
(13, 29, 'ENGLISH-JSS1', '', '2019-09-18 11:26:04'),
(14, 30, 'ENGLISH-JSS2', '', '2019-09-18 11:26:22'),
(15, 31, 'ENGLISH-JSS3', '', '2019-09-18 11:26:29'),
(16, 32, 'ENGLISH-SS1', '', '2019-09-18 11:26:38'),
(17, 33, 'ENGLISH-SS2', '', '2019-09-18 11:26:54'),
(18, 34, 'ENGLISH-SS3', '', '2019-09-18 11:27:01'),
(26, 32, 'MATHS-SSS1', '', '2019-09-18 11:29:03'),
(30, 29, 'BASIC SCI-JSS1', '', '2019-09-18 11:30:59'),
(31, 29, 'BASIC SCI-JSS1', '', '2019-09-18 11:31:00'),
(32, 30, 'BASIC SCI-JSS2', '', '2019-09-18 11:31:11'),
(33, 30, 'BASIC SCI-JSS2', '', '2019-09-18 11:33:56'),
(34, 30, 'BASIC SCI-JSS2', '', '2019-09-18 11:33:58'),
(35, 30, 'BASIC SCI-JSS2', '', '2019-09-18 11:34:16'),
(36, 31, 'BASIC SCI-JSS3', '', '2019-09-18 11:34:30'),
(37, 29, 'BASIC TECH-JSS1', '', '2019-09-18 11:35:01'),
(38, 30, 'BASIC TECH-JSS2', '', '2019-09-18 11:35:13'),
(39, 30, 'BASIC TECH-JSS2', '', '2019-09-18 11:35:14'),
(40, 31, 'BASIC TECH-JSS3', '', '2019-09-18 11:35:24'),
(41, 31, 'BASIC TECH-JSS3', '', '2019-09-18 11:35:24'),
(42, 29, 'PHYSICAL& HEALTH EDUC-JSS11', '', '2019-09-18 11:36:33'),
(43, 30, 'PHYSICAL& HEALTH EDUC-JSS2', '', '2019-09-18 11:36:52'),
(44, 31, 'PHYSICAL& HEALTH EDUC-JSS32', '', '2019-09-18 11:37:07'),
(45, 29, 'CREATIVE ART(CCA) JSS1', '', '2019-09-18 11:38:31'),
(46, 30, 'CREATIVE ART(CCA) JSS2', '', '2019-09-18 11:38:42'),
(47, 31, 'CREATIVE ART(CCA) JSS3', '', '2019-09-18 11:38:54'),
(48, 31, 'CREATIVE ART(CCA) JSS3', '', '2019-09-18 11:38:55'),
(49, 31, 'CREATIVE ART(CCA) JSS3', '', '2019-09-18 11:38:56'),
(50, 29, 'COMP-STUDIES JSS1', '', '2019-09-18 11:39:56'),
(51, 29, 'COMP-STUDIES JSS1', '', '2019-09-18 11:39:56'),
(52, 30, 'COMP-STUDIES JSS2', '', '2019-09-18 11:40:07'),
(53, 30, 'COMP-STUDIES JSS2', '', '2019-09-18 11:40:07'),
(54, 31, 'COMP-STUDIES JSS3', '', '2019-09-18 11:40:17'),
(55, 31, 'COMP-STUDIES JSS3', '', '2019-09-18 11:40:17'),
(56, 29, 'YORUBA LANG JSS1', '', '2019-09-18 11:42:33'),
(57, 30, 'YORUBA LANG JSS2', '', '2019-09-18 11:42:46'),
(58, 30, 'YORUBA LANG JSS2', '', '2019-09-18 11:42:46'),
(59, 31, 'YORUBA LANG JSS3', '', '2019-09-18 11:43:01'),
(60, 32, 'YORUBA LANG SS1', '', '2019-09-18 11:43:22'),
(61, 33, 'YORUBA LANG SS2', '', '2019-09-18 11:43:32'),
(62, 33, 'YORUBA LANG SS2', '', '2019-09-18 11:43:33'),
(63, 33, 'YORUBA LANG SS2', '', '2019-09-18 11:43:33'),
(64, 34, 'YORUBA LANG SS3', '', '2019-09-18 11:43:45'),
(65, 29, 'SOCIAL STD JSS1', '', '2019-09-18 11:44:52'),
(66, 30, 'SOCIAL STD JSS2', '', '2019-09-18 11:45:03'),
(67, 30, 'SOCIAL STD JSS2', '', '2019-09-18 11:45:04'),
(68, 31, 'SOCIAL STD JSS3', '', '2019-09-18 11:45:18'),
(69, 29, 'CIVIC EDUC JSS1', '', '2019-09-18 11:47:59'),
(70, 30, 'CIVIC EDUC JSS2', '', '2019-09-18 11:48:13'),
(71, 30, 'CIVIC EDUC JSS2', '', '2019-09-18 11:48:19'),
(72, 31, 'CIVIC EDUC JSS3', '', '2019-09-18 11:48:29'),
(73, 31, 'CIVIC EDUC JSS3', '', '2019-09-18 11:49:16'),
(74, 32, 'CIVIC EDUC SS1', '', '2019-09-18 11:49:36'),
(75, 33, 'CIVIC EDUC SS2', '', '2019-09-18 11:49:48'),
(76, 34, 'CIVIC EDUC SS3', '', '2019-09-18 11:49:58'),
(77, 29, 'HISTORY JSS1', '', '2019-09-18 11:50:26'),
(78, 30, 'HISTORY JSS2', '', '2019-09-18 11:50:38'),
(79, 31, 'HISTORY JSS3', '', '2019-09-18 11:50:48'),
(80, 29, 'AGRIC-SCI JSS1', '', '2019-09-18 11:51:35'),
(81, 30, 'AGRIC-SCI JSS2', '', '2019-09-18 11:51:46'),
(82, 31, 'AGRIC-SCI JSS3', '', '2019-09-18 11:51:55'),
(83, 32, 'ANIMAL HUSBANDRY SS1', '', '2019-09-18 11:52:58'),
(84, 33, 'ANIMAL HUSBANDRY SS2', '', '2019-09-18 11:53:08'),
(85, 34, 'ANIMAL HUSBANDRY SS3', '', '2019-09-18 11:53:19'),
(86, 29, 'HOME ECONOMIC JSS1', '', '2019-09-18 11:57:14'),
(87, 30, 'HOME ECONOMIC JSS2', '', '2019-09-18 11:57:33'),
(88, 31, 'HOME ECONOMIC JSS3', '', '2019-09-18 11:57:42'),
(89, 31, 'HOME ECONOMIC JSS3', '', '2019-09-18 11:58:00'),
(90, 32, 'BIOLOGY SS1', '', '2019-09-18 11:59:17'),
(91, 33, 'BIOLOGY SS2', '', '2019-09-18 11:59:27'),
(92, 34, 'BIOLOGY SS3', '', '2019-09-18 11:59:38'),
(93, 32, 'PHYSICS SS1', '', '2019-09-18 12:00:06'),
(94, 33, 'PHYSICS SS2', '', '2019-09-18 12:00:19'),
(95, 34, 'PHYSICS SS3', '', '2019-09-18 12:00:33'),
(96, 34, 'PHYSICS SS3', '', '2019-09-18 12:00:45'),
(97, 32, 'CHEMISTRY SS1', '', '2019-09-18 12:01:10'),
(98, 32, 'CHEMISTRY SS1', '', '2019-09-18 12:01:12'),
(99, 33, 'CHEMISTRY SS2', '', '2019-09-18 12:01:42'),
(100, 34, 'CHEMISTRY SS3', '', '2019-09-18 12:02:11'),
(101, 32, 'TECH-DRAWING  SS1', '', '2019-09-18 12:03:24'),
(102, 33, 'TECH-DRAWING  SS2', '', '2019-09-18 12:03:33'),
(103, 34, 'TECH-DRAWING  SS3', '', '2019-09-18 12:03:45'),
(104, 32, 'DATA PROC (ICT)  SS1', '', '2019-09-18 12:04:58'),
(105, 33, 'DATA PROC (ICT)  SS2', '', '2019-09-18 12:05:09'),
(106, 34, 'DATA PROC (ICT)  SS3', '', '2019-09-18 12:05:19'),
(107, 32, 'COMMERCE  SS1', '', '2019-09-18 12:05:51'),
(108, 33, 'COMMERCE  SS2', '', '2019-09-18 12:06:01'),
(109, 34, 'COMMERCE  SS3', '', '2019-09-18 12:06:12'),
(110, 32, 'GOVT  SS1', '', '2019-09-18 12:06:59'),
(111, 33, 'GOVT  SS2', '', '2019-09-18 12:07:09'),
(112, 34, 'GOVT  SS3', '', '2019-09-18 12:07:20'),
(113, 32, 'FIN-ACCT  SS1', '', '2019-09-18 12:08:02'),
(114, 33, 'FIN-ACCT  SS2', '', '2019-09-18 12:08:15'),
(115, 34, 'FIN-ACCT  SS3', '', '2019-09-18 12:08:26'),
(116, 29, 'BUSN- STUDIES JS1', '', '2019-09-18 12:12:42'),
(117, 30, 'BUSN- STUDIES JS2', '', '2019-09-18 12:12:52'),
(118, 31, 'BUSN- STUDIES JS3', '', '2019-09-18 12:13:01'),
(119, 31, 'BUSN- STUDIES JS3', '', '2019-09-18 12:14:14'),
(120, 31, 'BUSN- STUDIES JS3', '', '2019-09-18 12:14:48'),
(121, 31, 'BUSN- STUDIES JS3', '', '2019-09-18 12:15:35'),
(122, 29, 'C.R.K JS1', '', '2019-09-18 12:17:33'),
(123, 30, 'C.R.K JS2', '', '2019-09-18 12:17:44'),
(124, 31, 'C.R.K JS3', '', '2019-09-18 12:17:53'),
(125, 32, 'C.R.K', '', '2019-09-18 12:18:19'),
(126, 33, 'C.R.K', '', '2019-09-18 12:18:24'),
(127, 34, 'C.R.K', '', '2019-09-18 12:18:30'),
(128, 32, 'LITT-IN-ENG', '', '2019-09-18 12:19:03'),
(129, 33, 'LITT-IN-ENG', '', '2019-09-18 12:19:10'),
(130, 34, 'LITT-IN-ENG', '', '2019-09-18 12:19:16'),
(131, 34, 'LITT-IN-ENG', '', '2019-09-18 12:19:16'),
(132, 34, 'LITT-IN-ENG', '', '2019-09-18 12:19:34'),
(133, 29, 'FRENCH', '', '2019-09-18 13:41:01'),
(134, 30, 'FRENCH', '', '2019-09-18 13:41:11'),
(135, 31, 'FRENCH', '', '2019-09-18 13:41:20'),
(136, 31, 'FRENCH', '', '2019-09-18 13:41:42'),
(137, 31, 'FRENCH JSS3', '', '2019-09-18 13:41:55'),
(138, 30, 'FRENCH JSS2', '', '2019-09-18 13:42:05'),
(139, 29, 'FRENCH JSS1', '', '2019-09-18 13:42:15'),
(140, 29, 'FRENCH JSS1', '', '2019-09-18 13:42:15'),
(141, 29, 'FRENCH JSS1', '', '2019-09-18 13:42:16'),
(142, 29, 'FRENCH JSS1', '', '2019-09-18 13:42:18'),
(143, 29, 'MUSIC JSS1', '', '2019-09-18 13:43:03'),
(144, 30, 'MUSIC JSS2', '', '2019-09-18 13:43:14'),
(145, 31, 'MUSIC JSS3', '', '2019-09-18 13:43:33'),
(146, 32, 'AGRIC- SCIEN SSI', '', '2019-09-18 13:50:29'),
(147, 32, 'AGRIC- SCIEN SS2', '', '2019-09-18 13:50:44'),
(148, 34, 'AGRIC- SCIEN SS3', '', '2019-09-18 13:50:55'),
(149, 34, 'AGRIC- SCIEN SS3', '', '2019-09-18 13:52:40'),
(150, 32, 'AGRIC- SCIEN SS1', '', '2019-09-18 13:52:53'),
(151, 33, 'AGRIC- SCIEN SS2', '', '2019-09-18 13:53:02'),
(152, 32, 'AGRIC- SCIEN SS1', '', '2019-09-18 14:09:35'),
(153, 33, 'AGRIC- SCIEN SS2', '', '2019-09-18 14:09:47'),
(154, 34, 'AGRIC- SCIEN SS3', '', '2019-09-18 14:09:57');

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
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sn`, `SubjectID`, `subjectcode`, `SubjectName`, `SubjectCategoryid`, `Subjectgroup`, `Compulsory`, `TeacherID`, `dateadded`) VALUES
(12, '32AGRI', '', 'AGRIC SCIENCE', '32', 25, 'Mandatory', 'HCS2507', '2019-09-18 13:49:22'),
(21, '29MATH', '', 'MATHEMATICS', '29', 19, 'Mandatory', '', '2019-09-18 14:48:38'),
(22, '29ENGL', '', 'ENGLISH LANGUAGE', '29', 13, 'Mandatory', '', '2019-09-18 14:48:55'),
(23, '29BASI', '', 'BASIC SCIENCE', '29', 30, 'Mandatory', '', '2019-09-18 14:49:24'),
(24, '29P.H.', '', 'P.H.E', '29', 30, 'Mandatory', '', '2019-09-18 14:50:31');

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
  `comment` varchar(255) NOT NULL,
  `resulttype` varchar(100) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherscomment`
--

INSERT INTO `teacherscomment` (`id`, `teacherid`, `session`, `term`, `studentid`, `comment`, `resulttype`, `dateadded`) VALUES
(1, 0, '2017/2018', '1st Term', '527', 'Excellent result. Keep the ball rolling.', 'fullterm', '2018-03-20 19:26:07'),
(2, 0, '2017/2018', '1st Term', '527', 'Great Performance. Keep it up', 'midterm', '2018-03-20 19:26:27'),
(3, 0, '2017/2018', '1st Term', '360', 'Bravo! You are the best.', 'midterm', '2018-03-20 21:12:59'),
(4, 0, '2017/2018', '1st Term', '360', 'This is extraordinary! Keep it up.', 'fullterm', '2018-03-20 21:14:19'),
(5, 0, '2017/2018', '1st Term', '581', 'A good perform. You can do better', 'midterm', '2018-03-20 21:16:37'),
(6, 0, '2017/2018', '1st Term', '581', 'Good result. YOu can do better.', 'fullterm', '2018-03-20 21:18:03'),
(7, 0, '2017/2018', '2nd Term', '581', 'This is far better. Keep it up.', 'midterm', '2018-03-20 21:20:45'),
(8, 0, '2017/2018', '2nd Term', '581', 'Great work son. You need to work more on your deficient subjects.', 'fullterm', '2018-03-20 21:22:18'),
(9, 0, '2017/2018', '1st Term', '456', 'This is a good result. Keep it up', 'midterm', '2018-03-20 21:52:04'),
(10, 0, '2017/2018', '1st Term', '456', 'Good result. You can do better', 'fullterm', '2018-03-20 21:53:15'),
(11, 0, '2017/2018', '1st Term', '482', 'Cool and calm you are. keep it up', '', '2018-03-20 21:59:55'),
(12, 0, '1st Term', '527', 'Great Perf', '', '2017/2018', '2018-03-20 23:06:59'),
(13, 0, '2017/2018', '1st Term', '469', 'You are great.', 'midterm', '2018-03-20 23:25:49'),
(14, 0, '2017/2018', '1st Term', '469', 'Good performance. You can do better', 'terminal', '2018-03-20 23:28:00'),
(15, 0, '2017/2018', '2nd Term', '469', 'Good result', 'midterm', '2018-03-20 23:33:26'),
(16, 0, '2017/2018', '2nd Term', '469', 'Excellent result. Keep up the good work', 'terminal', '2018-03-20 23:34:25'),
(17, 0, '2017/2018', '1st Term', '327', 'This is an incredible result.', 'midterm', '2018-03-20 23:36:46'),
(18, 0, '2017/2018', '1st Term', '327', 'Great result.', 'terminal', '2018-03-20 23:37:49'),
(19, 0, '2017/2018', '2nd Term', '327', 'good result', 'midterm', '2018-03-20 23:39:46'),
(20, 0, '2017/2018', '2nd Term', '327', 'Wonderful result.', 'terminal', '2018-03-20 23:40:47'),
(21, 0, '2017/2018', '1st Term', 'GD6097', 'Good result. Keep it up.', 'midterm', '2018-03-21 01:19:18'),
(22, 0, '2017/2018', '1st Term', 'GD6097', 'Great performance', 'terminal', '2018-03-21 01:21:20'),
(23, 0, '2017/2018', '2nd Term', 'GD6097', 'A very good performance.', 'midterm', '2018-03-21 01:23:08'),
(24, 0, '2017/2018', '2nd Term', 'GD6097', 'This is a commendable performance. Keep it up.', 'terminal', '2018-03-21 01:24:25'),
(25, 0, '2017/2018', '1st Term', 'NR2456', 'GOOD RESULT.KEEP IT UP.', 'midterm', '2018-03-21 05:15:18'),
(26, 0, '2017/2018', '1st Term', 'NR2456', 'Ameerah has really impressed me. Keep it up.', 'fullterm', '2018-03-21 05:16:48'),
(27, 0, '2017/2018', '1st Term', 'NR2527', 'A good performance.Keep it up.', 'midterm', '2018-03-21 08:35:45'),
(28, 0, '2017/2018', '1st Term', 'NR2322', 'A good result.Keep it up', 'midterm', '2018-03-21 08:39:51'),
(29, 0, '2017/2018', '1st Term', 'NR1423', 'Tiwatope is intelligent and always ready to do more tsaks.', '', '2018-03-21 08:42:23'),
(30, 0, '2017/2018', '1st Term', 'NR2418', 'A good result.Keep it up.', 'midterm', '2018-03-21 08:43:17'),
(31, 0, '2017/2018', '1st Term', 'NR2329', 'EXCELLENT.KEEP IT UP.', 'midterm', '2018-03-21 08:44:32'),
(32, 0, '2017/2018', '1st Term', 'NR2581', 'A good result.Keep it up.', 'midterm', '2018-03-21 08:46:22'),
(33, 0, '2017/2018', '1st Term', 'NR2321', 'KEEP THE FLAG HIGH MY DEAR.', 'midterm', '2018-03-21 08:47:29'),
(34, 0, '2017/2018', '2nd Term', 'NR1459', 'Inioiuwa is always cheerful and intelligent.', '', '2018-03-21 08:48:24'),
(35, 0, '2017/2018', '1st Term', 'NR2408', 'A good performance.', 'midterm', '2018-03-21 08:48:37'),
(36, 0, '2017/2018', '1st Term', 'NR1505', 'Olamide is a well natured girl and has really improved academically..', '', '2018-03-21 08:49:13'),
(37, 0, '2017/2018', '1st Term', 'NR2537', 'KEEP THE FLAG HIGH MY DEAR.', 'midterm', '2018-03-21 08:51:08'),
(38, 0, '2017/2018', '1st Term', 'NR2360', 'A good performance.', 'midterm', '2018-03-21 08:51:47'),
(39, 0, '2017/2018', '2nd Term', 'NR1427', 'Ejabowefon is friendly and smart.', '', '2018-03-21 08:55:40'),
(40, 0, '2017/2018', '1st Term', 'NR2382', 'GOOD RESULT.KEEP IT UP.', 'midterm', '2018-03-21 08:55:57'),
(41, 0, '2017/2018', '1st Term', 'NR2369', 'A good result.Keep it up.', 'midterm', '2018-03-21 08:56:59'),
(42, 0, '2017/2018', '1st Term', 'NR1481', 'David is intelligent and has positive attitude towards learning.Keep it  up.', '', '2018-03-21 08:57:01'),
(43, 0, '2017/2018', '1st Term', 'NR2346', 'A good result.Keep it up.', 'midterm', '2018-03-21 08:59:21'),
(44, 0, '2017/2018', '2nd Term', 'NR1506', 'Sarah is obedient and intelligent.', '', '2018-03-21 09:01:10'),
(45, 0, '2017/2018', '1st Term', 'NR2489', 'GOOD RESULT.KEEP IT UP.', 'midterm', '2018-03-21 09:01:59'),
(46, 0, '2017/2018', '1st Term', 'NR2467', 'A good result.Keep it up.', 'midterm', '2018-03-21 09:03:17'),
(47, 0, '2017/2018', '1st Term', 'NR2568', 'GOOD RESULT.KEEP IT UP.', 'midterm', '2018-03-21 09:05:45'),
(48, 0, '2017/2018', '1st Term', 'NR2468', 'A good result.Keep it up.', 'midterm', '2018-03-21 09:08:10'),
(49, 0, '2017/2018', '1st Term', 'NR1407', 'Moyinoluwa is intelligent and has positive attitude towards learning.  learning.', '', '2018-03-21 09:10:00'),
(50, 0, '2017/2018', '1st Term', 'NR2547', 'KEEP IT UP MY DEAR.', 'midterm', '2018-03-21 09:10:34'),
(51, 0, '2017/2018', '1st Term', 'NR2600', 'A good performance.', 'midterm', '2018-03-21 09:10:45'),
(52, 0, '2017/2018', '2nd Term', 'NR1460', 'Jomiloju is friendly and has become more hardworking especially in number work.', '', '2018-03-21 09:13:23'),
(53, 0, '2017/2018', '1st Term', 'NR2430', 'GOOD RESULT.KEEP IT UP.', 'midterm', '2018-03-21 09:13:54'),
(54, 0, '2017/2018', '1st Term', 'NR2516', 'An excellent result.', 'midterm', '2018-03-21 09:14:16'),
(55, 0, '2017/2018', '1st Term', 'NR2345', 'GOOD RESULT.KEEP IT UP.', 'midterm', '2018-03-21 09:17:44'),
(56, 0, '2017/2018', '1st Term', 'NR2413', 'A good result.Keep it up.', 'midterm', '2018-03-21 09:17:59'),
(57, 0, '2017/2018', '1st Term', 'NR1447', 'Ayomidesire is intelligent and has really improved in her writing skills.', '', '2018-03-21 09:20:17'),
(58, 0, '2017/2018', '1st Term', 'NR2359', 'GOOD RESULT.KEEP IT UP.', 'midterm', '2018-03-21 09:20:38'),
(59, 0, '2017/2018', '1st Term', 'NR2391', 'A good result.Keep it up.', 'midterm', '2018-03-21 09:21:40'),
(60, 0, '2017/2018', '1st Term', 'NR2386', 'GOOD RESULT. KEEP IT UP.', 'midterm', '2018-03-21 09:23:48'),
(61, 0, '2017/2018', '2nd Term', 'NR1448', 'Demilade is friendly  and intelligent.', '', '2018-03-21 09:24:40'),
(62, 0, '2017/2018', '1st Term', 'NR2527', 'KANYINSOLA IS AN ACTIVE GIRL.A BEAUTIFUL PERFORMANCE.', 'fullterm', '2018-03-21 09:28:20'),
(63, 0, '2017/2018', '1st Term', 'NR2322', 'SUREFUNMI IS A LOVELY GIRL.SHE JUST NEED TO WORK ON HER READING.', 'fullterm', '2018-03-21 09:31:35'),
(64, 0, '2017/2018', '1st Term', 'NR2329', 'Organised and attentive,Oluwadamilare is a responsible pupil but needs to put mo', 'fullterm', '2018-03-21 09:33:06'),
(65, 0, '2017/2018', '2nd Term', 'NR1455', 'Nathan is expressive and has improved in numberwork activities.', '', '2018-03-21 09:34:57'),
(66, 0, '2017/2018', '1st Term', 'NR2418', 'ELOZINO IS SELF DISCIPLINED AND LOVABLE.SHE HAS PERFORMANCE VERY WELL IN HER.', 'fullterm', '2018-03-21 09:35:01'),
(67, 0, '2017/2018', '1st Term', 'NR2321', 'Reading aloud is a speacial pleasure for Tiwa.His enthusiasm and effort is refle', 'fullterm', '2018-03-21 09:37:16'),
(68, 0, '2017/2018', '1st Term', 'NR2581', 'OLAOLUWA IS FRIENDLY AND LOVABLE.HE HAS A GOOD GRADE.KEEP IT UP.', 'fullterm', '2018-03-21 09:42:19'),
(69, 0, '2017/2018', '1st Term', 'NR1461', 'Michelle is good academically and has really improved in her writing skills.', '', '2018-03-21 09:42:56'),
(70, 0, '2017/2018', '1st Term', 'NR2408', 'TIMILEHIN HAS DONE EXCELLENTLY WELL. KEEP IT UP.', 'fullterm', '2018-03-21 09:45:06'),
(71, 0, '2017/2018', '1st Term', 'NR2537', 'Organised and attentive,Oreoluwa is a responsible pupil but needs to put more ef', 'fullterm', '2018-03-21 09:46:17'),
(72, 0, '2017/2018', '1st Term', 'NR2360', 'ALEX IS WELL -MANNERED AND KINDHEARTED.', 'fullterm', '2018-03-21 09:46:39'),
(73, 0, '2017/2018', '2nd Term', 'NR1405', 'Chibuike is friendly and has  become more hardworking in class activities.', '', '2018-03-21 09:48:20'),
(74, 0, '2017/2018', '1st Term', 'NR2382', 'Somoto is calm and she has improved in an amazing way.Keep improving and keep re', 'fullterm', '2018-03-21 09:51:12'),
(75, 0, '2017/2018', '1st Term', 'NR2369', 'SHARON IS FRIENDLY AND LOVABLE.KEEP UP THE GOOD WORK.', 'fullterm', '2018-03-21 09:52:34'),
(76, 0, '2017/2018', '1st Term', 'NR2489', 'Jason has really impressed me with his performance but needs to put more effort ', 'fullterm', '2018-03-21 09:55:12'),
(77, 0, '2017/2018', '1st Term', 'NR2346', 'COREY IS AN ACTIVE BOY.A BEAUTIFUL PERFORMANCE.', 'fullterm', '2018-03-21 09:55:25'),
(78, 0, '2017/2018', '1st Term', 'NR1446', 'Efechukwu is good academically but needs to be ready to do more tasks.', '', '2018-03-21 09:57:13'),
(79, 0, '2017/2018', '1st Term', 'NR2568', 'Emmanuella is an active class menber.Her learning habits are quite remakable.Kee', 'fullterm', '2018-03-21 09:58:43'),
(80, 0, '2017/2018', '2nd Term', 'NR1471', 'Naomi is cheerful and has improved in her class activities.', '', '2018-03-21 09:58:59'),
(81, 0, '2017/2018', '1st Term', 'NR2467', 'TAIWO IS FRIENDLY AND LOVABLE.DO NOT RELENT YOUR EFFORT.', 'fullterm', '2018-03-21 10:00:22'),
(82, 0, '2017/2018', '1st Term', 'NR2547', 'Organised and attentive,Moyato is a responsible pupil but needs to put more effo', 'fullterm', '2018-03-21 10:02:37'),
(83, 0, '2017/2018', '1st Term', 'NR2468', 'KEHINDE IS HELPFUL  AND SINCERE.SHE NEED TO WORK ON HER WEAK SUBJECTS.', 'fullterm', '2018-03-21 10:03:17'),
(84, 0, '2017/2018', '1st Term', 'NR2600', 'BISOLA IS FRIENDLY AND LOVABLE.SHE HAS A VERY GOOD GRADE.KEEP IT UP.', 'fullterm', '2018-03-21 10:06:18'),
(85, 0, '2017/2018', '1st Term', 'NR2430', 'Daniel has done greatly in his academices.A beautiful performance keep it up.', 'fullterm', '2018-03-21 10:06:23'),
(86, 0, '2017/2018', '1st Term', 'NR2597', 'Good performance.Keep it up.', 'midterm', '2018-03-21 10:09:41'),
(87, 0, '2017/2018', '1st Term', 'NR2345', 'Joshua has really impressed me with his performance but needs to put more effort', 'fullterm', '2018-03-21 10:10:06'),
(88, 0, '2017/2018', '1st Term', 'NR2597', 'NELSON IS AN ACTIVE BOY.HE NEEDS TO WORK ON READING AND SPELLINGS.', 'fullterm', '2018-03-21 10:11:59'),
(89, 0, '2017/2018', '2nd Term', 'NR1457', 'Olaoluwa is friendly and has become more hardworking in numberwork.', '', '2018-03-21 10:12:32'),
(90, 0, '2017/2018', '1st Term', 'NR2359', 'Araoluwa is intelligent and brilliant.She has great potentials and has performed', 'fullterm', '2018-03-21 10:13:54'),
(91, 0, '2017/2018', '1st Term', 'NR2516', 'OLUWABIYI IS AN ACTIVE BOY.A BEAUTIFUL PERFORMANCE.', 'fullterm', '2018-03-21 10:16:18'),
(92, 0, '2017/2018', '1st Term', 'NR1499', 'Boluwatife is intelligent  and his really dong well academically..', '', '2018-03-21 10:19:37'),
(93, 0, '2017/2018', '2nd Term', 'NR1529', 'Mofeoluwa is  neat and intelligent.', '', '2018-03-21 10:19:56'),
(94, 0, '2017/2018', '1st Term', 'NR2386', 'Organized and attentive,Eniola is a responsible pupil but needs to put more effo', 'fullterm', '2018-03-21 10:20:37'),
(95, 0, '2017/2018', '1st Term', 'NR2413', 'TOLUWANIMI IS SELF-DISCIPLINE AND SINCERE.', 'fullterm', '2018-03-21 10:21:36'),
(96, 0, '2017/2018', '1st Term', 'NR2391', 'IFEOLUWADUNSI IS FRIENDLY AND LOVABLE.HE NEEDS TO BRACE UP NEXT TERM.', 'fullterm', '2018-03-21 10:25:50'),
(97, 0, '2017/2018', '2nd Term', 'NR2456', 'Bravo!Keep it up my dear.', 'midterm', '2018-03-21 10:27:33'),
(98, 0, '2017/2018', '2nd Term', 'NR1482', 'Zane is friendly and intelligent.', '', '2018-03-21 10:28:13'),
(99, 0, '2017/2018', '2nd Term', 'NR2329', 'Bravo!Keep it up.', 'midterm', '2018-03-21 10:29:44'),
(100, 0, '2017/2018', '2nd Term', 'NR2321', 'Wow!You are great my boy.', 'midterm', '2018-03-21 10:31:40'),
(101, 0, '2017/2018', '2nd Term', 'NR2537', 'Bravo! Keep the flag high my son.', 'midterm', '2018-03-21 10:34:13'),
(102, 0, '2017/2018', '2nd Term', 'NR1532', 'Eyimofe is always neat and intelligent.', '', '2018-03-21 10:36:38'),
(103, 0, '2017/2018', '2nd Term', 'NR2382', 'Good result.Keep it up my dear.', 'midterm', '2018-03-21 10:36:45'),
(104, 0, '2017/2018', '2nd Term', 'NR1528', 'Taiwo is good academically and has improved in his writing skills.', '', '2018-03-21 10:38:10'),
(105, 0, '2017/2018', '2nd Term', 'NR2489', 'Good result.Keep it up.', 'midterm', '2018-03-21 10:39:21'),
(106, 0, '2017/2018', '2nd Term', 'NR2568', 'Good result.Keep it up my honey.', 'midterm', '2018-03-21 10:42:11'),
(107, 0, '2017/2018', '2nd Term', 'NR2547', 'Bravo! Keep it up.', 'midterm', '2018-03-21 10:44:34'),
(108, 0, '2017/2018', '2nd Term', 'NR1504', 'Masud is good academically but needs to be ready to do more tasks.', '', '2018-03-21 10:44:35'),
(109, 0, '2017/2018', '2nd Term', 'NR1508', 'Iyanuoluwa is outspoken and always participating in learning activities.', '', '2018-03-21 10:46:49'),
(110, 0, '2017/2018', '2nd Term', 'NR1491', 'Emillia is good academically but needs to be ready to do more tasks.', '', '2018-03-21 10:53:04'),
(111, 0, '2017/2018', '2nd Term', 'NR2430', 'Wow! Keep it up.', 'midterm', '2018-03-21 10:53:06'),
(112, 0, '2017/2018', '2nd Term', 'NR2611', 'Bravo! Keep it up my dear.', 'midterm', '2018-03-21 10:55:45'),
(113, 0, '2017/2018', '2nd Term', 'NR2322', 'GOOD RESULT KEEP IT UP.', 'midterm', '2018-03-21 10:57:18'),
(114, 0, '2017/2018', '2nd Term', 'NR2345', 'Keep it up my son.', 'midterm', '2018-03-21 10:59:16'),
(115, 0, '2017/2018', '2nd Term', 'NR2418', 'BRAVO.KEEP IT UP.', 'midterm', '2018-03-21 11:00:48'),
(116, 0, '2017/2018', '2nd Term', 'NR1577', 'Precious is friendly and has become more hardworking in numberwork.', '', '2018-03-21 11:01:00'),
(117, 0, '2017/2018', '2nd Term', 'NR2359', 'Bravo! Keep it up.', 'midterm', '2018-03-21 11:02:44'),
(118, 0, '2017/2018', '2nd Term', 'NR2581', 'GOOD RESULT.KEEP IT UP.', 'midterm', '2018-03-21 11:04:12'),
(119, 0, '2017/2018', '2nd Term', 'GD6053', 'Good performance', 'midterm', '2018-03-21 11:05:17'),
(120, 0, '2017/2018', '2nd Term', 'NR2386', 'Bravo! Keep it up.', 'midterm', '2018-03-21 11:05:19'),
(121, 0, '2017/2018', '2nd Term', 'NR2388', 'GOOD RESULT .KEEP IT UP.', 'midterm', '2018-03-21 11:08:11'),
(122, 0, '2017/2018', '2nd Term', 'GD6377', 'Good performance.', 'midterm', '2018-03-21 11:10:06'),
(123, 0, '2017/2018', '2nd Term', 'NR2408', 'GOOD RESULT.KEEP IT UP.', 'midterm', '2018-03-21 11:10:38'),
(124, 0, '2017/2018', '2nd Term', 'NR1596', 'Naomi is friendly and intelligent.', '', '2018-03-21 11:12:42'),
(125, 0, '2017/2018', '2nd Term', 'NR2456', 'Ameerah is intelligent and friendly. She has great potentials and has performed brilliantly.', 'fullterm', '2018-03-21 11:14:30'),
(126, 0, '2017/2018', '2nd Term', 'NR2360', 'AN IMPRESIVE RESULT.KEEP IT UP.', 'midterm', '2018-03-21 11:14:33'),
(127, 0, '2017/2018', '2nd Term', 'NR1541', 'Damisire is good academically and always listen to correction.', '', '2018-03-21 11:16:01'),
(128, 0, '2017/2018', '2nd Term', 'NR2369', 'AN IMPRESIVE RESULT.KEEP IT UP.', 'midterm', '2018-03-21 11:17:44'),
(129, 0, '2017/2018', '2nd Term', 'GD6486', 'Good performance', 'midterm', '2018-03-21 11:18:32'),
(130, 0, '2017/2018', '2nd Term', 'NR2329', 'Oluwadamilare is a very talented pupil who is confident enough in his skills.', 'fullterm', '2018-03-21 11:19:23'),
(131, 0, '2017/2018', '2nd Term', 'NR2346', 'GOOD PERFORMANCE.KEEP IT UP.', 'midterm', '2018-03-21 11:21:10'),
(132, 0, '2017/2018', '2nd Term', 'GD6025', 'Great performance', 'midterm', '2018-03-21 11:22:45'),
(133, 0, '2017/2018', '2nd Term', 'NR1440', 'Olamiposi is good academically and always listen to correction.', '', '2018-03-21 11:24:13'),
(134, 0, '2017/2018', '2nd Term', 'NR2321', 'Tiwa has done brilliantly well. He is a pleasure to have in class. Keep it up my dear.', 'fullterm', '2018-03-21 11:24:26'),
(135, 0, '2017/2018', '2nd Term', 'NR2467', 'GOOD RESULT.KEEP IT UP.', 'midterm', '2018-03-21 11:25:23'),
(136, 0, '2017/2018', '2nd Term', 'NR2468', 'AN IMPRESIVE RESULT.KEEP IT UP.', 'midterm', '2018-03-21 11:26:48'),
(137, 0, '2017/2018', '2nd Term', 'NR2537', 'This is a brilliant performance. Ireoluwa loves challenges. Keep it up my son.', 'fullterm', '2018-03-21 11:29:11'),
(138, 0, '2017/2018', '2nd Term', 'NR2600', 'GOOD RESULT. KEEP IT UP.', 'midterm', '2018-03-21 11:30:49'),
(139, 0, '2017/2018', '2nd Term', 'NR2597', 'GOOD RESULT.KEEP IT UP.', 'midterm', '2018-03-21 11:34:40'),
(140, 0, '2017/2018', '2nd Term', 'GD6053', 'You are really pulling your weight. Please keep it up.', 'terminal', '2018-03-21 11:35:52'),
(141, 0, '2017/2018', '2nd Term', 'NR2382', 'Somto is delightful in class. She participates in class activities but needs to put more effort in her weak subjects.', 'fullterm', '2018-03-21 11:36:30'),
(142, 0, '2017/2018', '2nd Term', 'GD6377', 'Your performance is highly commendable. Keep up the good work.', 'terminal', '2018-03-21 11:38:50'),
(143, 0, '2017/2018', '2nd Term', 'NR2516', 'EXCELLENT RESULT.KEEP IT UP.', 'midterm', '2018-03-21 11:39:02'),
(144, 0, '2017/2018', '2nd Term', 'NR2413', 'GOOD RESULT.KEEP IT UP.', 'midterm', '2018-03-21 11:41:01'),
(145, 0, '2017/2018', '2nd Term', 'NR2489', 'Jason shows enthusiasm for learning and has a cheerful attitude. Keep it up my son.', 'fullterm', '2018-03-21 11:41:25'),
(146, 0, '2017/2018', '2nd Term', 'GD6486', 'Your performance is highly commendable. Keep it up.', 'terminal', '2018-03-21 11:42:35'),
(147, 0, '2017/2018', '2nd Term', 'NR2391', 'GOOD RESULT.KEEP IT UP.', 'midterm', '2018-03-21 11:42:59'),
(148, 0, '2017/2018', '2nd Term', 'NR2568', 'Emmanuella is delightful in class but needs to put more effort in weak subjects.', 'fullterm', '2018-03-21 11:45:24'),
(149, 0, '2017/2018', '2nd Term', 'GD6025', 'You have really done well, the sky is your spring board. Keep it up.', 'terminal', '2018-03-21 11:47:36'),
(150, 0, '2017/2018', '2nd Term', 'NR2527', 'KANYINSOLA IS A WONDERFUL HELPER. SHE IS A LIVELY GIRL.', 'fullterm', '2018-03-21 11:48:24'),
(151, 0, '2017/2018', '2nd Term', 'NR2547', 'Moyato shows enthusiasm for learning and has a cheerful attitude. Keep it up my dear.', 'fullterm', '2018-03-21 11:50:10'),
(152, 0, '2017/2018', '2nd Term', 'NR2322', 'SUREFUNMI HAS MADE A GREAT IMPROVEMENT. KEEP IT UP.', 'fullterm', '2018-03-21 11:52:17'),
(153, 0, '2017/2018', '2nd Term', 'NR2430', 'Daniel is a promising child. He is a pleasure to have in class. Keep it up my son.', 'fullterm', '2018-03-21 11:57:21'),
(154, 0, '2017/2018', '2nd Term', 'NR2418', 'THIS IS AN EXCELLENT PERFORMANCE. KEEP IT ROLLING.', 'fullterm', '2018-03-21 11:57:39'),
(155, 0, '2017/2018', '2nd Term', 'NR2611', 'Lanre shows enthusiasm for learning and has a cheerful attitude but needs to put more effort in reading.', 'fullterm', '2018-03-21 12:03:14'),
(156, 0, '2017/2018', '2nd Term', 'NR2581', 'OLA IS AN ACTIVE BOY. HE PARTICIPATES IN CLASS ACTIVITIES.', 'fullterm', '2018-03-21 12:05:10'),
(157, 0, '2017/2018', '2nd Term', 'NR2388', 'TOLUWANIMI HAS DONE HER BEST. SHE JUST NEEDS TO WORK ON HER WEAK SUBJECTS.', 'fullterm', '2018-03-21 12:08:28'),
(158, 0, '2017/2018', '2nd Term', 'NR2345', 'Joshua is delightful in class. He participates in class activities. Keep it up my dear.', 'fullterm', '2018-03-21 12:09:56'),
(159, 0, '2017/2018', '2nd Term', 'NR2408', 'TIMI HAS POSITIVE ATTITUDE TOWARDS LEARNING, BRAVO.', 'fullterm', '2018-03-21 12:15:15'),
(160, 0, '2017/2018', '2nd Term', 'NR2359', 'Reading aloud is a special pleasure for Araoluwa. Keep it up my dear.', 'fullterm', '2018-03-21 12:16:11'),
(161, 0, '2017/2018', '2nd Term', 'NR2360', 'ALEX PARTICIPATES IN CLASS ACTIVITES. GOOD RESULT.', 'fullterm', '2018-03-21 12:19:23'),
(162, 0, '2017/2018', '2nd Term', 'NR2386', 'Eniola is a very talented pupil who is confident enough in his skills. Keep it up.', 'fullterm', '2018-03-21 12:21:27'),
(163, 0, '2017/2018', '2nd Term', 'NR2369', 'SHARON IS A GOOD READER. THIS IS A BEAUTIFUL PERFORMANCE.', 'fullterm', '2018-03-21 12:22:24'),
(164, 0, '2017/2018', '2nd Term', 'NR2346', 'COREY HAS IMPROVED IN READING. KEEP IT UP.', 'fullterm', '2018-03-21 12:26:59'),
(165, 0, '2017/2018', '2nd Term', 'NR2467', 'TAIWO IS LOVING AND KINDHEARTED. GOOD RESULT.', 'fullterm', '2018-03-21 12:31:30'),
(166, 0, '2017/2018', '2nd Term', 'NR2527', 'This is a good result. Keep it up.', 'midterm', '2018-03-21 12:34:17'),
(167, 0, '2017/2018', '2nd Term', 'NR2468', 'KEHINDE IS WELL-MANNERED AND CARING. GOOD RESULT.', 'fullterm', '2018-03-21 12:34:36'),
(168, 0, '2017/2018', '2nd Term', 'NR2600', 'BISOLA IS A GENTLE AND KINDHEARTED GIRL. GOOD RESULT.', 'fullterm', '2018-03-21 12:37:39'),
(169, 0, '2017/2018', '2nd Term', 'NR2597', 'NELSON HAS A LOVING HEART. GOOD RESULT. KEEP IT UP.', 'fullterm', '2018-03-21 12:41:31'),
(170, 0, '2017/2018', '2nd Term', 'NR2516', 'AN EXCELLENT RESULT. KEEP THE BALL ROLLING.', 'fullterm', '2018-03-21 12:43:29'),
(171, 0, '2017/2018', '2nd Term', 'NR2413', 'TOLU DID HIS BEST. HE NEEDS TO WORK ON THE WEAK SUBJECT.', 'fullterm', '2018-03-21 12:48:00'),
(172, 0, '2017/2018', '2nd Term', 'NR2391', 'DANIEL HAS DONE HIS BEST. HE JUST NEEDS TO WORK ON THE WEAK SUBJECTS.', 'fullterm', '2018-03-21 12:53:49'),
(173, 0, '2017/2018', '1st Term', 'GD4201', 'FOYINSOLA HAS WORKED HARDER COMPARED TO MID TEST.KEEP MOVING MY GIRL', 'midterm', '2018-03-22 07:15:20'),
(174, 0, '2017/2018', '1st Term', 'GD4463', 'GOLD HAS REALLY IMPROVED IN HER ACADEMICS.KEEP PLYING GIRL.', 'midterm', '2018-03-22 07:22:09'),
(175, 0, '2017/2018', '1st Term', 'GD4248', 'YANMIFE HAS REALLY IMPROVED.KEEP THE BALL ROLLING.', 'midterm', '2018-03-22 07:27:17'),
(176, 0, '2017/2018', '1st Term', 'GD4158', 'FIKUNMI HAS DONE SO WELL.KEEP IT UP DEAR.THE SKY IS JUST A STEPPING STONE.', 'midterm', '2018-03-22 07:33:01'),
(177, 0, '2017/2018', '1st Term', 'GD6053', 'Satisfactory performance', 'midterm', '2018-03-22 07:33:27'),
(178, 0, '2017/2018', '1st Term', 'GD4014', 'KOFOWOROLA IS GRADUALLY IMPROVING BUT I STILL NEED HER TO DO MORE.', 'midterm', '2018-03-22 07:38:32'),
(179, 0, '2017/2018', '1st Term', 'GD4087', 'VERY GOOD PERFORMANCE, KEEP IT UP.', 'midterm', '2018-03-22 07:41:17'),
(180, 0, '2017/2018', '1st Term', 'GD6053', 'You tried.', 'terminal', '2018-03-22 07:42:12'),
(181, 0, '2017/2018', '1st Term', 'GD4415', 'EXCELLENT PERFORMANCE, KEEP IT UP.', 'midterm', '2018-03-22 07:48:42'),
(182, 0, '2017/2018', '1st Term', 'GD6377', 'Good performance.', 'midterm', '2018-03-22 07:49:17'),
(183, 0, '2017/2018', '1st Term', 'GD4510', 'ERINAYO HAS A YERY GOOD ATTITUDE TOWARDS LEARNING AND HAS REALLY IMPROVED.', 'midterm', '2018-03-22 07:49:20'),
(184, 0, '2017/2018', '1st Term', 'GD6377', 'A wonderful performance', 'terminal', '2018-03-22 07:52:41'),
(185, 0, '2017/2018', '1st Term', 'GD4207', 'JOSHUA NEEDS TO WORK HARDER, GOOD RESULT.', 'midterm', '2018-03-22 07:52:53'),
(186, 0, '2017/2018', '1st Term', 'GD4584', 'ISAAC HAS REALLY IMPROVED BUT NEEDS TO DO MORE COME NEXT TERM.', 'midterm', '2018-03-22 07:56:45'),
(187, 0, '2017/2018', '1st Term', 'GD6486', 'Good result.', 'midterm', '2018-03-22 07:59:32'),
(188, 0, '2017/2018', '1st Term', 'GD4416', 'KEHINDE DOES VERY WELL IN CLASS.ALWAYS READY TO KNOW MORE', 'midterm', '2018-03-22 08:02:31'),
(189, 0, '2017/2018', '1st Term', 'GD6486', 'Good performance.', 'terminal', '2018-03-22 08:03:09'),
(190, 0, '2017/2018', '1st Term', 'GD4472', 'OPEOLUWA NEEDS TO WORK HARDER, GOOD RESULT.', 'midterm', '2018-03-22 08:03:25'),
(191, 0, '2017/2018', '1st Term', 'GD4305', 'NIFEMI IS AN INTELLIGENT GIRL.SHE IS AN EXCELLENT PERFORMER.', 'midterm', '2018-03-22 08:07:54'),
(192, 0, '2017/2018', '1st Term', 'GD6025', 'A wonderrful performance', 'midterm', '2018-03-22 08:09:02'),
(193, 0, '2017/2018', '1st Term', 'GD6025', 'A graet performance.', 'terminal', '2018-03-22 08:11:38'),
(194, 0, '2017/2018', '1st Term', 'GD5583', 'A good performance.', 'midterm', '2018-03-22 08:13:19'),
(195, 0, '2017/2018', '1st Term', 'GD5576', 'A good result.', 'midterm', '2018-03-22 08:18:12'),
(196, 0, '2017/2018', '1st Term', 'GD4184', 'DIVINE IS VERY CALM AND INTELLIGENT.KEEP UP THE GOOD  WORK.', 'midterm', '2018-03-22 08:19:02'),
(197, 0, '2017/2018', '1st Term', 'GD4595', 'BRILLIANT PERFORMANCE, KEEP IT UP.', 'midterm', '2018-03-22 08:19:45'),
(198, 0, '2017/2018', '1st Term', 'GD5285', 'A good result.', 'midterm', '2018-03-22 08:23:07'),
(199, 0, '2017/2018', '1st Term', 'GD4146', 'GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 08:24:39'),
(200, 0, '2017/2018', '1st Term', 'GD4587', 'DARASIMI HAS REALLY MADE ME PROUD BUT AM SURE WOULD DO MOREW COME NEXT TERM.', 'midterm', '2018-03-22 08:24:40'),
(201, 0, '2017/2018', '1st Term', 'GD5538', 'work harder for better grades.', 'midterm', '2018-03-22 08:28:03'),
(202, 0, '2017/2018', '1st Term', 'GD4219', 'VERY GOOD PERFORMANCE,KEEP IT UP.', 'midterm', '2018-03-22 08:30:47'),
(203, 0, '2017/2018', '1st Term', 'GD4162', 'AYOMIPO HAS REALLY GROWN ACADEMICALLY.', 'midterm', '2018-03-22 08:33:25'),
(204, 0, '2017/2018', '1st Term', 'GD5571', 'A good performance.', 'midterm', '2018-03-22 08:33:42'),
(205, 0, '2017/2018', '1st Term', 'GD4444', 'ANU NEEDS TOWORK HARDER FOR BETTER RESULT TERM.', 'midterm', '2018-03-22 08:37:12'),
(206, 0, '2017/2018', '1st Term', 'GD5564', 'A good performance.', 'midterm', '2018-03-22 08:40:42'),
(207, 0, '2017/2018', '1st Term', 'GD4104', 'VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 08:42:02'),
(208, 0, '2017/2018', '1st Term', 'GD4439', 'TUNBUYI HAS DONE VERY WELL BUT NEEDS TO WORK MORE ON SOME SUBJECTS.', 'midterm', '2018-03-22 08:45:23'),
(209, 0, '2017/2018', '1st Term', 'GD4252', 'GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 08:46:24'),
(210, 0, '2017/2018', '1st Term', 'GD5417', 'An excellent performance.', 'midterm', '2018-03-22 08:47:12'),
(211, 0, '2017/2018', '1st Term', 'GD4479', 'VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 08:51:21'),
(212, 0, '2017/2018', '1st Term', 'GD4378', 'DAVID HAS TRIED BUT STILL NEEDS TO DO MORE TO ATTAIN MORE.', 'midterm', '2018-03-22 08:51:45'),
(213, 0, '2017/2018', '1st Term', 'GD5239', 'a very good performance.', 'midterm', '2018-03-22 08:53:57'),
(214, 0, '2017/2018', '1st Term', 'GD4157', 'EXCELLENT RESULT,KEEP IT UP.', 'midterm', '2018-03-22 08:54:25'),
(215, 0, '2017/2018', '1st Term', 'GD4478', 'DANIEL IS AN EXCELLENT PERFORMER WHO HAS A GREAT ZEAL.', 'midterm', '2018-03-22 08:55:33'),
(216, 0, '2017/2018', '1st Term', 'GD4152', 'GOOD RESULT,KEEP IT UP.', 'midterm', '2018-03-22 08:59:27'),
(217, 0, '2017/2018', '1st Term', 'GD4117', 'PRAISE HAS DONE WELL..KEEP MOVING ON.', 'midterm', '2018-03-22 09:01:18'),
(218, 0, '2017/2018', '1st Term', 'GD4070', 'BRILLIANT PERFORMANCE, KEEP IT UP.', 'midterm', '2018-03-22 09:04:55'),
(219, 0, '2017/2018', '1st Term', 'GD5545', 'A very good performance.', 'midterm', '2018-03-22 09:06:10'),
(220, 0, '2017/2018', '1st Term', 'GD4197', 'DEMILADE NEEDS TO WORK HARDER  FOR BETTER RESULT NEXT TERM', 'midterm', '2018-03-22 09:10:16'),
(221, 0, '2017/2018', '1st Term', 'GD4213', 'TIMILEHIN NEEDS TO BE MORE STABLE TO ATTAIN MORE IN HIS ACADEMICS', 'midterm', '2018-03-22 09:12:32'),
(222, 0, '2017/2018', '1st Term', 'GD4476', 'JOBA NEEDS TO BE MORE CALM. GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 09:14:17'),
(223, 0, '2017/2018', '1st Term', 'GD5435', 'work harder.', 'midterm', '2018-03-22 09:16:40'),
(224, 0, '2017/2018', '1st Term', 'GD4496', 'MAYOMIKUN NEEDS TO TAKE HER WORK MORE SERIOUSLY.', 'midterm', '2018-03-22 09:17:55'),
(225, 0, '2017/2018', '1st Term', 'GD4595', 'BRILLIANT RESULT, KEEP IT UP.', 'terminal', '2018-03-22 09:22:02'),
(226, 0, '2017/2018', '1st Term', 'GD4496', 'MAYOMIKUN NEEDS TO TAKE HER WORK MORE SERIOUSLY.', 'terminal', '2018-03-22 09:24:20'),
(227, 0, '2017/2018', '1st Term', 'GD5065', 'keep up the momentum.', 'midterm', '2018-03-22 09:26:56'),
(228, 0, '2017/2018', '1st Term', 'GD4213', 'TIMILEHIN NEEDS TO BE MORE STABLE TO ATTAIN MORE ACADEMICALLY.', 'terminal', '2018-03-22 09:39:39'),
(229, 0, '2017/2018', '1st Term', 'GD4117', 'PRAISE HAS DONE WELL.KEEP MOVING ON.', 'terminal', '2018-03-22 09:44:10'),
(230, 0, '2017/2018', '1st Term', 'GD4439', 'TUNBUYI HAS DONE VERY WELL BUT NEEDS TO WORK MORE ON SOME SUBJECTS.', 'terminal', '2018-03-22 09:46:59'),
(231, 0, '2017/2018', '1st Term', 'GD4146', 'VERY GOOD RESULT, KEEP IT UP.', 'terminal', '2018-03-22 09:48:42'),
(232, 0, '2017/2018', '1st Term', 'GD4478', 'DANIEL IS AN EXCELLENT PERFORMER WHO HAS A GREAT ZEAL.', 'terminal', '2018-03-22 09:51:00'),
(233, 0, '2017/2018', '1st Term', 'GD4219', 'A VERY BRILLIANT PERFORMANCE,KEEPIT UP.', 'terminal', '2018-03-22 09:53:38'),
(234, 0, '2017/2018', '1st Term', 'GD3561', 'MOYOSOREOLUWA HAS IMPROVED, SHE CAN DO BETTER NEXT TERM.', 'midterm', '2018-03-22 09:55:36'),
(235, 0, '2017/2018', '1st Term', 'GD4444', 'ANU NEEDS TO WORK HARDER FOR BETTER RESULT NEXT TERM.', 'terminal', '2018-03-22 09:59:11'),
(236, 0, '2017/2018', '1st Term', 'GD4378', 'DAVID HAS TRIED BUT STILL NEEDS TO DO MORE TO ATTAIN MORE.', 'terminal', '2018-03-22 10:00:29'),
(237, 0, '2017/2018', '1st Term', 'GD4104', 'GOOD RESULT, KEEP IT UP.', 'terminal', '2018-03-22 10:02:33'),
(238, 0, '2017/2018', '1st Term', 'GD4252', 'A VERY GOOD PERFORMANCE, KEEP IT UP.', 'terminal', '2018-03-22 10:05:35'),
(239, 0, '2017/2018', '1st Term', 'GD4162', 'AYOMIPO HAS REALLY GROWN ACADEMICALLY', 'terminal', '2018-03-22 10:08:20'),
(240, 0, '2017/2018', '1st Term', 'GD5426', 'A very good performance.', 'midterm', '2018-03-22 10:09:26'),
(241, 0, '2017/2018', '1st Term', 'GD4587', 'DARASIMI HAS REALLY MADE ME PROUD BUT AM SURE WOULD DO MORE COME NEXT TERM.', 'terminal', '2018-03-22 10:11:46'),
(242, 0, '2017/2018', '1st Term', 'GD4184', 'DIVINE IS VERY CALM AND INTELLIGENT.KEEP UP THE GOOD WORK.', 'terminal', '2018-03-22 10:14:00'),
(243, 0, '2017/2018', '1st Term', 'GD4479', 'GOOD RESULT, KEEP IT UP.', 'terminal', '2018-03-22 10:15:43'),
(244, 0, '2017/2018', '1st Term', 'GD4305', 'NIFEMI IS AN INTELLIGENT GIRL.SHE IS AN EXCELLENT PERFORMER.', 'terminal', '2018-03-22 10:17:39'),
(245, 0, '2017/2018', '1st Term', 'GD2593', 'Good performance', 'midterm', '2018-03-22 10:17:45'),
(246, 0, '2017/2018', '1st Term', 'GD5523', 'work harder for better grades.', 'midterm', '2018-03-22 10:18:36'),
(247, 0, '2017/2018', '1st Term', 'GD3574', 'JOMILOJU HAS A GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 10:20:03'),
(248, 0, '2017/2018', '1st Term', 'GD4416', 'KEHINDE DOES VERY WELL IN CLASS,ALWAYS READY TO KNOW MORE.', 'terminal', '2018-03-22 10:22:05'),
(249, 0, '2017/2018', '1st Term', 'GD4472', 'OPE IS POTENTIAL LEADER, HE NEEDS TO WORK HARDER.GOOD RESULT.', 'terminal', '2018-03-22 10:24:35'),
(250, 0, '2017/2018', '1st Term', 'GD4584', 'ISAAC HAS REALLY IMPROVED BUT NEEDS TO DO MORE COME NEXT TERM.', 'terminal', '2018-03-22 10:26:26'),
(251, 0, '2017/2018', '1st Term', 'GD4157', 'EXCELLENT RESULT,KEEP IT UP.', 'terminal', '2018-03-22 10:26:32'),
(252, 0, '2017/2018', '1st Term', 'GD4207', 'JOSHUA NEEDS TO WORK HARDER, GOOD RESULT.', 'terminal', '2018-03-22 10:29:46'),
(253, 0, '2017/2018', '1st Term', 'GD4152', 'GOOD RESULT,KEEP IT UP.', 'terminal', '2018-03-22 10:31:40'),
(254, 0, '2017/2018', '1st Term', 'GD4510', 'ERINAYO HAS A VERY GOOD ATTITUDE TOWARDS LEARNING AND HAS REALLY IMPROVED.', 'terminal', '2018-03-22 10:32:15'),
(255, 0, '2017/2018', '1st Term', 'GD4415', 'EXCELLENT PERFORMANCE, KEEP IT UP.', 'terminal', '2018-03-22 10:34:37'),
(256, 0, '2017/2018', '1st Term', 'GD3574', 'JOMILOJU HAS A GOOD RESULT, KEEP IMPROVING NEXT TERM.', 'terminal', '2018-03-22 10:36:19'),
(257, 0, '2017/2018', '1st Term', 'GD4087', 'VERY GOOD PERFORMANCE, KEEP IT UP.', 'terminal', '2018-03-22 10:36:46'),
(258, 0, '2017/2018', '1st Term', 'GD4014', 'KOFOWOROLA IS GRADUALLY IMPROVING BUT I STILL NEED HER TO DO MORE', 'terminal', '2018-03-22 10:37:01'),
(259, 0, '2017/2018', '1st Term', 'GD5012', 'a good performance.', 'midterm', '2018-03-22 10:37:49'),
(260, 0, '2017/2018', '1st Term', 'GD2593', 'Great performance.', 'terminal', '2018-03-22 10:39:00'),
(261, 0, '2017/2018', '1st Term', 'GD4070', 'A VERY BRILLIANT PERFORMANCE, KEEP IT UP.', 'terminal', '2018-03-22 10:40:29'),
(262, 0, '2017/2018', '1st Term', 'GD4158', 'FIKUNMI HAS DONE SO WELL.KEEP IT UP DEAR,THE SKY IS JUST A STEPPING STONE.', 'terminal', '2018-03-22 10:41:10'),
(263, 0, '2017/2018', '1st Term', 'GD3561', 'MOYOSOREOLUWA HAS IMPROVED, SHE CAN DO BETTER NEXT TERM.', 'terminal', '2018-03-22 10:41:58'),
(264, 0, '2017/2018', '1st Term', 'GD4197', 'DEMILADE NEEDS TO WORK HARDER FOR BETTER RESULT NEXT TERM.', 'terminal', '2018-03-22 10:44:05'),
(265, 0, '2017/2018', '1st Term', 'GD2531', 'Good performance.', 'midterm', '2018-03-22 10:44:35'),
(266, 0, '2017/2018', '1st Term', 'GD4248', 'YANMIFE  HAS REALLY IMPROVED.KEEP THE BALL ROLLING.', 'terminal', '2018-03-22 10:46:18'),
(267, 0, '2017/2018', '1st Term', 'GD5290', 'keep up the momentum.', 'midterm', '2018-03-22 10:46:29'),
(268, 0, '2017/2018', '1st Term', 'GD2531', 'Great performance', 'terminal', '2018-03-22 10:47:17'),
(269, 0, '2017/2018', '2nd Term', 'GD2593', 'Thia is a very good result', 'midterm', '2018-03-22 10:47:34'),
(270, 0, '2017/2018', '1st Term', 'GD4476', 'BRILLIANT PERFORMANCE, KEEP IT UP.', 'terminal', '2018-03-22 10:47:39'),
(271, 0, '2017/2018', '1st Term', 'GD5290', 'Keep up the momentum and work harder.', 'terminal', '2018-03-22 10:51:05'),
(272, 0, '2017/2018', '1st Term', 'GD2437', 'good performance.', 'midterm', '2018-03-22 10:51:37'),
(273, 0, '2017/2018', '1st Term', 'GD3474', 'CHUKUMA HAS A GREAT RESULT, KEEP THE FLAG FLYING.', 'midterm', '2018-03-22 10:51:38'),
(274, 0, '2017/2018', '1st Term', 'GD4463', 'GOLD HAS REALLY IMPROVED IN HER ACADEMICS.KEEP FLYING GIRL.', 'terminal', '2018-03-22 10:53:04'),
(275, 0, '2017/2018', '2nd Term', 'GD2593', 'Esther is improving by the day and I am very proud of her performance.', 'terminal', '2018-03-22 10:53:54'),
(276, 0, '2017/2018', '1st Term', 'GD2437', 'Great performance.', 'terminal', '2018-03-22 10:53:59'),
(277, 0, '2017/2018', '1st Term', 'GD5012', 'Apade needs to keep up the momentum and work harder.', 'terminal', '2018-03-22 10:54:27'),
(278, 0, '2017/2018', '1st Term', 'GD3474', 'CHUKUMA HAS A GREAT RESULT, KEEP THE FLAG FLYING.', 'terminal', '2018-03-22 10:56:00'),
(279, 0, '2017/2018', '1st Term', 'GD2553', 'good result', 'midterm', '2018-03-22 10:56:16'),
(280, 0, '2017/2018', '1st Term', 'GD5523', 'Mary is an active class member. She needs to put in more effort for better grade', 'terminal', '2018-03-22 10:57:49'),
(281, 0, '2017/2018', '1st Term', 'GD2107', 'Good performance', 'midterm', '2018-03-22 10:58:58'),
(282, 0, '2017/2018', '1st Term', 'GD4201', 'FOYINSOLA HAS WORKED HARDER COMPARED TO MID TEST.KEEP MOVING MY GIRL.', 'terminal', '2018-03-22 10:59:23'),
(283, 0, '2017/2018', '1st Term', 'GD2107', 'Great performance.', 'terminal', '2018-03-22 11:00:57'),
(284, 0, '2017/2018', '1st Term', 'GD5426', 'Motun needs to keep up the momentum and work harder for better grades.', 'terminal', '2018-03-22 11:01:31'),
(285, 0, '2017/2018', '2nd Term', 'GD4476', 'A VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 11:02:36'),
(286, 0, '2017/2018', '1st Term', 'GD3134', 'SIMILOLUWA HAS AN IMPRESSIVE RESULT, KEEP IT UP.', 'midterm', '2018-03-22 11:03:18'),
(287, 0, '2017/2018', '1st Term', 'GD2553', 'An excellent performance.Keep it up', 'terminal', '2018-03-22 11:04:18'),
(288, 0, '2017/2018', '1st Term', 'GD5065', 'Jeremiah needs to keep up the momentum.', 'terminal', '2018-03-22 11:04:20'),
(289, 0, '2017/2018', '1st Term', 'GD2485', 'Good performance.', 'midterm', '2018-03-22 11:06:52'),
(290, 0, '2017/2018', '1st Term', 'GD5435', 'Semilore needs to keep up the momentum and work harder for better grades.', 'terminal', '2018-03-22 11:07:23'),
(291, 0, '2017/2018', '1st Term', 'GD3134', 'SIMILOLUWA HAS AN IMPRESSIVE RESULT, KEEP IT UP.', 'terminal', '2018-03-22 11:07:36'),
(292, 0, '2017/2018', '1st Term', 'GD1527', 'Ayomidimeji jas performed greatly. Keep up the good work next term', 'midterm', '2018-03-22 11:07:37'),
(293, 0, '2017/2018', '2nd Term', 'GD2531', 'a very good result.', 'midterm', '2018-03-22 11:08:47'),
(294, 0, '2017/2018', '1st Term', 'GD2485', 'Great performance.', 'terminal', '2018-03-22 11:09:02'),
(295, 0, '2017/2018', '2nd Term', 'GD4087', 'A VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 11:09:28'),
(296, 0, '2017/2018', '2nd Term', 'GD2531', 'An excellent performance. Do not relent on your effort.', 'terminal', '2018-03-22 11:11:19'),
(297, 0, '2017/2018', '1st Term', 'GD2280', 'good result', 'midterm', '2018-03-22 11:12:17'),
(298, 0, '2017/2018', '1st Term', 'GD5545', 'Hadrian needs to keep up the momentum.', 'terminal', '2018-03-22 11:12:49'),
(299, 0, '2017/2018', '2nd Term', 'GD4158', 'FIKUNMIS PERFORMANCE IS OUTSTANDING.', 'midterm', '2018-03-22 11:12:51'),
(300, 0, '2017/2018', '2nd Term', 'GD4415', 'AN IMPRESSIVE PERFORMANCE, KEEP IT UP.', 'midterm', '2018-03-22 11:13:12'),
(301, 0, '2017/2018', '1st Term', 'GD2303', 'Good performance.', 'midterm', '2018-03-22 11:13:28'),
(302, 0, '2017/2018', '1st Term', 'GD1527', 'Ayomidimeji has performed greatly. Keep up the good work next term.', 'terminal', '2018-03-22 11:13:55'),
(303, 0, '2017/2018', '1st Term', 'GD1261', 'Good result.', 'midterm', '2018-03-22 11:14:19'),
(304, 0, '2017/2018', '1st Term', 'GD5239', 'Olamide needs to keep up the momentum and work harder.', 'terminal', '2018-03-22 11:15:19'),
(305, 0, '2017/2018', '2nd Term', 'GD4158', 'THE SKY IS JUST A STEPPING STONE. KEEP SOARING HIGH.', 'terminal', '2018-03-22 11:15:27'),
(306, 0, '2017/2018', '1st Term', 'GD2303', 'Great performance.', 'terminal', '2018-03-22 11:15:31'),
(307, 0, '2017/2018', '2nd Term', 'GD2437', 'Modesire is really making good improvement in her studies.', 'midterm', '2018-03-22 11:15:41'),
(308, 0, '2017/2018', '1st Term', 'GD3563', 'FIKAYO HAS A GOOD RESULT,BUT NEEDS TO IMPROVE NEXT TERM.', 'midterm', '2018-03-22 11:16:04'),
(309, 0, '2017/2018', '2nd Term', 'GD4207', 'GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 11:18:07'),
(310, 0, '2017/2018', '1st Term', 'GD2280', 'An excellent performance. Keep it up.', 'terminal', '2018-03-22 11:18:13'),
(311, 0, '2017/2018', '1st Term', 'GD5417', 'keep up the momentum Mofeoluwa.', 'terminal', '2018-03-22 11:18:19'),
(312, 0, '2017/2018', '1st Term', 'GD2194', 'Good', 'midterm', '2018-03-22 11:18:47'),
(313, 0, '2017/2018', '1st Term', 'GD1261', 'Your performance is highly commendable,please keep it up', 'terminal', '2018-03-22 11:19:14'),
(314, 0, '2017/2018', '2nd Term', 'GD2437', 'This is a good result. Keep shining on come next term!', 'terminal', '2018-03-22 11:19:18'),
(315, 0, '2017/2018', '1st Term', 'GD2194', 'Good', 'terminal', '2018-03-22 11:21:01'),
(316, 0, '2017/2018', '1st Term', 'GD1495', 'Good result.', 'midterm', '2018-03-22 11:24:28'),
(317, 0, '2017/2018', '2nd Term', 'GD4157', 'AN IMPRESSIVE PERFORMANCE, KEEP IT UP.', 'midterm', '2018-03-22 11:25:00'),
(318, 0, '2017/2018', '1st Term', 'GD3563', 'FIKAYO HAS A GOOD RESULT,BUT NEEDS TO IMPROVE NEXT TERM.', 'terminal', '2018-03-22 11:25:49'),
(319, 0, '2017/2018', '1st Term', 'GD2232', 'Good performance.', 'midterm', '2018-03-22 11:26:10'),
(320, 0, '2017/2018', '1st Term', 'GD1327', 'Good results', 'midterm', '2018-03-22 11:27:18'),
(321, 0, '2017/2018', '1st Term', 'GD2232', 'Good', 'terminal', '2018-03-22 11:27:56'),
(322, 0, '2017/2018', '1st Term', 'GD2234', 'Good result.', 'midterm', '2018-03-22 11:28:13'),
(323, 0, '2017/2018', '1st Term', 'GD1495', 'An excellent performance. Keep the ball rolling.', 'terminal', '2018-03-22 11:28:17'),
(324, 0, '2017/2018', '1st Term', 'GD2509', 'Good.', 'midterm', '2018-03-22 11:30:31'),
(325, 0, '2017/2018', '1st Term', 'GD1327', 'Your performance is highly commendable, please keep it up.', 'terminal', '2018-03-22 11:31:49'),
(326, 0, '2017/2018', '1st Term', 'GD2509', 'Good', 'terminal', '2018-03-22 11:32:15'),
(327, 0, '2017/2018', '1st Term', 'GD3536', 'OREOLUWA HAS A GREAT RESULT, KEEP IT UP NEXT TERM.', 'midterm', '2018-03-22 11:33:13'),
(328, 0, '2017/2018', '1st Term', 'GD5564', 'Feranmi needs to keep up the momentum and work harder for a better grade.', 'terminal', '2018-03-22 11:35:00'),
(329, 0, '2017/2018', '1st Term', 'GD2524', 'Good.', 'midterm', '2018-03-22 11:35:29'),
(330, 0, '2017/2018', '1st Term', 'GD1469', 'Good result', 'midterm', '2018-03-22 11:36:37'),
(331, 0, '2017/2018', '1st Term', 'GD2524', 'Good.', 'terminal', '2018-03-22 11:38:30'),
(332, 0, '2017/2018', '1st Term', 'GD3536', 'OREOLUWA HAS A GREAT RESULT, KEEP IT UP NEXT TERM.', 'terminal', '2018-03-22 11:38:33'),
(333, 0, '2017/2018', '2nd Term', 'GD4472', 'GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 11:40:07'),
(334, 0, '2017/2018', '1st Term', 'GD2234', 'Y0ur performance is commendable,please work harder nect term.', 'terminal', '2018-03-22 11:40:35'),
(335, 0, '2017/2018', '1st Term', 'GD1582', 'Good result.', 'midterm', '2018-03-22 11:40:55'),
(336, 0, '2017/2018', '1st Term', 'GD1469', 'Damilola has performed greatly but needs to be vocal in the class.', 'terminal', '2018-03-22 11:41:05'),
(337, 0, '2017/2018', '1st Term', 'GD2542', 'Good', 'midterm', '2018-03-22 11:42:10'),
(338, 0, '2017/2018', '1st Term', 'GD5571', 'Damilola needs to keep up the momentum and work harder for better grades.', 'terminal', '2018-03-22 11:42:39'),
(339, 0, '2017/2018', '1st Term', 'GD1582', 'This is an impressive performance, please keep up the good work.', 'terminal', '2018-03-22 11:42:56'),
(340, 0, '2017/2018', '2nd Term', 'GD2107', 'A very good result.', 'midterm', '2018-03-22 11:43:04'),
(341, 0, '2017/2018', '1st Term', 'GD2542', 'Good.', 'terminal', '2018-03-22 11:44:11'),
(342, 0, '2017/2018', '2nd Term', 'GD2107', 'Amir has done wonderfully well. Keep striving for the best!', 'terminal', '2018-03-22 11:44:20'),
(343, 0, '2017/2018', '1st Term', 'GD3089', 'DAVID HAS A GREAT POTENTIAL IN HIM, HE CAN DO BETTER NEXT TERM.', 'midterm', '2018-03-22 11:44:41'),
(344, 0, '2017/2018', '1st Term', 'GD2432', 'Good result.', 'midterm', '2018-03-22 11:46:14'),
(345, 0, '2017/2018', '2nd Term', 'GD4152', 'A VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 11:46:50'),
(346, 0, '2017/2018', '1st Term', 'GD2223', 'Good.', 'midterm', '2018-03-22 11:46:58'),
(347, 0, '2017/2018', '1st Term', 'GD1565', 'Good result.', 'midterm', '2018-03-22 11:48:18'),
(348, 0, '2017/2018', '1st Term', 'GD2223', 'Good', 'terminal', '2018-03-22 11:48:40'),
(349, 0, '2017/2018', '1st Term', 'GD3089', 'DAIVD HAS A GREAT POTENTIAL IN HIM, HE CAN DO BETTER NEXT TERM.', 'terminal', '2018-03-22 11:48:59'),
(350, 0, '2017/2018', '1st Term', 'GD5538', 'Solomon needs to put in more effort for better grades.', 'terminal', '2018-03-22 11:49:06'),
(351, 0, '2017/2018', '1st Term', 'GD2432', 'A  very good performance. Keep it up.', 'terminal', '2018-03-22 11:49:51'),
(352, 0, '2017/2018', '2nd Term', 'GD2485', 'This is a very good result!', 'midterm', '2018-03-22 11:50:37'),
(353, 0, '2017/2018', '1st Term', 'GD2590', 'Good', 'midterm', '2018-03-22 11:51:42'),
(354, 0, '2017/2018', '1st Term', 'GD3154', 'TENIOLA HAS DONE VERY WELL BUT NEEDS TO PUT IN MORE EFFORT', 'midterm', '2018-03-22 11:51:50'),
(355, 0, '2017/2018', '2nd Term', 'GD4587', 'DARASIMI HAS POTENTIAL', 'midterm', '2018-03-22 11:51:51'),
(356, 0, '2017/2018', '1st Term', 'GD1565', 'Goodness is brilliant and he has good attitude towards learning. Keep the ball r', 'terminal', '2018-03-22 11:52:24'),
(357, 0, '2017/2018', '2nd Term', 'GD4070', 'AN IMPRESSIVE PERFORMANCE, KEEP IT UP.', 'midterm', '2018-03-22 11:52:36'),
(358, 0, '2017/2018', '1st Term', 'GD5285', 'Damilola needs to keep up the momentum.', 'terminal', '2018-03-22 11:52:39'),
(359, 0, '2017/2018', '1st Term', 'GD2590', 'Good', 'terminal', '2018-03-22 11:53:12'),
(360, 0, '2017/2018', '1st Term', 'GD1438', 'Good result', 'midterm', '2018-03-22 11:53:43'),
(361, 0, '2017/2018', '1st Term', 'GD2278', 'Agood performance.', 'midterm', '2018-03-22 11:54:45'),
(362, 0, '2017/2018', '1st Term', 'GD2193', 'Good', 'midterm', '2018-03-22 11:55:51'),
(363, 0, '2017/2018', '1st Term', 'GD3173', 'DIVINE HAS AN IMPRESSIVE RESULT, KEEP IT UP.', 'midterm', '2018-03-22 11:56:05'),
(364, 0, '2017/2018', '1st Term', 'GD5576', 'Keep up the momentum Deborah.', 'terminal', '2018-03-22 11:56:27'),
(365, 0, '2017/2018', '2nd Term', 'GD4197', 'A GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 11:57:02'),
(366, 0, '2017/2018', '1st Term', 'GD2193', 'Good', 'terminal', '2018-03-22 11:57:25'),
(367, 0, '2017/2018', '1st Term', 'GD1558', 'Good  result.', 'midterm', '2018-03-22 11:58:04'),
(368, 0, '2017/2018', '1st Term', 'GD1438', 'Your performance is commendable, please keep up the good work.', 'terminal', '2018-03-22 11:58:06'),
(369, 0, '2017/2018', '1st Term', 'GD3096', 'THIS IS AN IMPRSSIVE PERFORMANCE', 'midterm', '2018-03-22 11:58:33'),
(370, 0, '2017/2018', '2nd Term', 'GD4587', 'DARASIMI KEEPS IMPROVING BY THE DAY', 'terminal', '2018-03-22 11:58:46'),
(371, 0, '2017/2018', '1st Term', 'GD2278', 'This is a wonderful performance, please keep it up.', 'terminal', '2018-03-22 11:59:31'),
(372, 0, '2017/2018', '1st Term', 'GD2188', 'Good', 'midterm', '2018-03-22 12:00:20'),
(373, 0, '2017/2018', '2nd Term', 'GD2485', 'Eri-Ifeoluwa has the potentials but gets distracted easily.', 'terminal', '2018-03-22 12:00:37'),
(374, 0, '2017/2018', '1st Term', 'GD3173', 'DIVINE HAS AN IMPRESSIVE RESULT, KEEP IT UP.', 'terminal', '2018-03-22 12:01:03'),
(375, 0, '2017/2018', '1st Term', 'GD5583', 'Mueezat needs to keep up the momentum and work harder for better grades.', 'terminal', '2018-03-22 12:01:14'),
(376, 0, '2017/2018', '1st Term', 'GD2188', 'Good', 'terminal', '2018-03-22 12:02:02'),
(377, 0, '2017/2018', '1st Term', 'GD1558', 'A good result. You can do better next term.', 'terminal', '2018-03-22 12:02:25'),
(378, 0, '2017/2018', '1st Term', 'GD2352', 'Good', 'midterm', '2018-03-22 12:04:29'),
(379, 0, '2017/2018', '2nd Term', 'GD4252', 'TEMI NEEDS TO WORK HARDER FOR BETTER RESULT.', 'midterm', '2018-03-22 12:04:44'),
(380, 0, '2017/2018', '2nd Term', 'GD2303', 'Aderinsola has done well. Keep striving for a better reuslt .', 'midterm', '2018-03-22 12:06:09'),
(381, 0, '2017/2018', '1st Term', 'GD2567', 'A good performance', 'midterm', '2018-03-22 12:06:26'),
(382, 0, '2017/2018', '1st Term', 'GD2352', 'Good', 'terminal', '2018-03-22 12:06:35'),
(383, 0, '2017/2018', '2nd Term', 'GD4213', 'GOOD RESULT', 'midterm', '2018-03-22 12:06:52'),
(384, 0, '2017/2018', '1st Term', 'GD3241', 'TOCHI HAS AN EXCELLENT RESULT, KEEP IT UP.', 'midterm', '2018-03-22 12:08:20'),
(385, 0, '2017/2018', '1st Term', 'GD2395', 'Good', 'midterm', '2018-03-22 12:09:08'),
(386, 0, '2017/2018', '1st Term', 'GD2567', 'A very good result. Keep it up.', 'terminal', '2018-03-22 12:10:32'),
(387, 0, '2017/2018', '1st Term', 'GD2395', 'Good', 'terminal', '2018-03-22 12:10:48'),
(388, 0, '2017/2018', '1st Term', 'GD1612', '', 'midterm', '2018-03-22 12:11:10'),
(389, 0, '2017/2018', '2nd Term', 'GD2303', 'Aderinsola keeps improving by the day. She is ever ready to learn.', 'terminal', '2018-03-22 12:12:59'),
(390, 0, '2017/2018', '1st Term', 'GD2229', 'Good.', 'midterm', '2018-03-22 12:14:08'),
(391, 0, '2017/2018', '1st Term', 'GD3241', 'TOCHI HAS AN EXCELLENT RESULT, KEEP IT UIP.', 'terminal', '2018-03-22 12:14:21'),
(392, 0, '2017/2018', '2nd Term', 'GD4104', 'AN IMPRESSIVE PERFORMANCE, KEEP IT UP.', 'midterm', '2018-03-22 12:14:56'),
(393, 0, '2017/2018', '1st Term', 'GD3154', 'THIS IS AN IMPRESSIVE PERFORMANCE', 'terminal', '2018-03-22 12:15:05'),
(394, 0, '2017/2018', '1st Term', 'GD2229', 'Good.', 'terminal', '2018-03-22 12:15:59'),
(395, 0, '2017/2018', '1st Term', 'GD1612', '', 'terminal', '2018-03-22 12:16:38'),
(396, 0, '2017/2018', '1st Term', 'GD3096', 'THIS IS A GOOD PERFORMANCE', 'terminal', '2018-03-22 12:17:54'),
(397, 0, '2017/2018', '1st Term', 'GD1462', 'Good result.', 'midterm', '2018-03-22 12:18:02'),
(398, 0, '2017/2018', '2nd Term', 'GD4213', 'TIMILEHIN IS REALLY TRYING BUT CAN DO MORE', 'terminal', '2018-03-22 12:18:36'),
(399, 0, '2017/2018', '2nd Term', 'GD4444', 'ANU NEEDS TOWORK HARDER FOR BETTER RESULT NEXT TERM.', 'midterm', '2018-03-22 12:20:16'),
(400, 0, '2017/2018', '1st Term', 'GD3206', 'TENIOLA HAS AN EXCELLENT RESULT, KEEP THE FLAG FLYING.', 'midterm', '2018-03-22 12:21:58'),
(401, 0, '2017/2018', '1st Term', 'GD2342', 'A good performance.', 'midterm', '2018-03-22 12:22:25'),
(402, 0, '2017/2018', '1st Term', 'GD3250', 'ADEFOLARIN,YOU ARE DEAR AS CLAER AS THE MOONLIGHT.', 'midterm', '2018-03-22 12:24:38'),
(403, 0, '2017/2018', '1st Term', 'GD1462', 'Divine has performed wonderfully. Do not relent next term.', 'terminal', '2018-03-22 12:25:19'),
(404, 0, '2017/2018', '1st Term', 'GD2342', 'The sky is indeed your spring board, keep it up boy.', 'terminal', '2018-03-22 12:26:12'),
(405, 0, '2017/2018', '2nd Term', 'GD4219', 'A VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 12:26:25'),
(406, 0, '2017/2018', '1st Term', 'GD3206', 'TENIOLA HAS AN EXCELLENT RESULT, KEEP THE FLAG FLYING.', 'terminal', '2018-03-22 12:26:46'),
(407, 0, '2017/2018', '1st Term', 'GD1578', 'Good result', 'midterm', '2018-03-22 12:27:06'),
(408, 0, '2017/2018', '1st Term', 'GD3250', 'KEEP UP THE GOOD WORK', 'terminal', '2018-03-22 12:28:48'),
(409, 0, '2017/2018', '2nd Term', 'GD2194', 'She has performed brilliantly .', 'midterm', '2018-03-22 12:29:20'),
(410, 0, '2017/2018', '1st Term', 'GD2211', 'Agood result.', 'midterm', '2018-03-22 12:30:13'),
(411, 0, '2017/2018', '1st Term', 'GD1311', 'Good result.', 'midterm', '2018-03-22 12:30:38'),
(412, 0, '2017/2018', '1st Term', 'GD1578', 'Boluwatife can actually perform better than this.Please buckle up against next t', 'terminal', '2018-03-22 12:31:37'),
(413, 0, '2017/2018', '1st Term', 'GD3293', 'This is an impressive performance', 'midterm', '2018-03-22 12:32:17'),
(414, 0, '2017/2018', '1st Term', 'GD1287', 'Good result', 'midterm', '2018-03-22 12:33:06');
INSERT INTO `teacherscomment` (`id`, `teacherid`, `session`, `term`, `studentid`, `comment`, `resulttype`, `dateadded`) VALUES
(415, 0, '2017/2018', '1st Term', 'GD3493', 'MOFESADE HAS A GREAT RESULT, KEEP IT UP.', 'midterm', '2018-03-22 12:33:41'),
(416, 0, '2017/2018', '2nd Term', 'GD4146', 'GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 12:34:06'),
(417, 0, '2017/2018', '1st Term', 'GD5618', 'work harder for a better grade.', 'midterm', '2018-03-22 12:34:23'),
(418, 0, '2017/2018', '1st Term', 'GD2211', 'This is a very good performance, please keep up the good work.', 'terminal', '2018-03-22 12:35:56'),
(419, 0, '2017/2018', '1st Term', 'GD1311', 'Pamilerin has performed excellently. Keep it up.', 'terminal', '2018-03-22 12:37:16'),
(420, 0, '2017/2018', '1st Term', 'GD3493', 'MOFESADE HAS A GREAT RESULT, KEEP IT UP.', 'terminal', '2018-03-22 12:37:39'),
(421, 0, '2017/2018', '2nd Term', 'GD4595', 'A VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 12:38:13'),
(422, 0, '2017/2018', '2nd Term', 'GD4162', 'AYOMIPO HAS POTENTIALS.', 'midterm', '2018-03-22 12:38:36'),
(423, 0, '2017/2018', '2nd Term', 'GD2194', 'Emotitie has performed brilliantly this term. Brace up for the best come next term.', 'terminal', '2018-03-22 12:39:21'),
(424, 0, '2017/2018', '1st Term', 'GD3293', 'BOLU IS AN EXCELLENT CHILD WITH GREAT POTENTIAL', 'terminal', '2018-03-22 12:39:31'),
(425, 0, '2017/2018', '1st Term', 'GD1287', 'This is a brillant performance, please keep it up.', 'terminal', '2018-03-22 12:41:13'),
(426, 0, '2017/2018', '1st Term', 'GD5618', 'Keep up the momentum and work harder.', 'terminal', '2018-03-22 12:42:02'),
(427, 0, '2017/2018', '1st Term', 'GD1331', 'Good result', 'midterm', '2018-03-22 12:42:07'),
(428, 0, '2017/2018', '1st Term', 'GD1304', 'Good result.', 'midterm', '2018-03-22 12:42:33'),
(429, 0, '2017/2018', '1st Term', 'GD2338', 'A good performance.', 'midterm', '2018-03-22 12:44:16'),
(430, 0, '2017/2018', '1st Term', 'GD3591', 'AYOMIDE HAS IMPROVED IN HIS ACADEMICS, KEEP IT UP.', 'midterm', '2018-03-22 12:44:49'),
(431, 0, '2017/2018', '2nd Term', 'GD2232', 'This is a very good result.', 'midterm', '2018-03-22 12:45:40'),
(432, 0, '2017/2018', '1st Term', 'GD1304', 'An excellent performance. Keep the flag flying.', 'terminal', '2018-03-22 12:47:31'),
(433, 0, '2017/2018', '1st Term', 'GD3591', 'AYOMIDE HAS IMPROVED IN HIS ACADEMICS, KEEP IT UP.', 'terminal', '2018-03-22 12:49:18'),
(434, 0, '2017/2018', '1st Term', 'GD3163', 'A BRILLANT PERFORMANCE', 'midterm', '2018-03-22 12:49:26'),
(435, 0, '2017/2018', '1st Term', 'GD1331', 'Tolulope performed beautifully but needs to improve on his writing skills.', 'terminal', '2018-03-22 12:50:18'),
(436, 0, '2017/2018', '1st Term', 'GD1299', 'Good result.', 'midterm', '2018-03-22 12:51:50'),
(437, 0, '2017/2018', '2nd Term', 'GD4162', 'AYOMIPO HAS GOOD ATTITUDE  TOWARDS LEARNING.', 'terminal', '2018-03-22 12:52:44'),
(438, 0, '2017/2018', '1st Term', 'GD3163', 'AYOMIDE IS AN EXCELLENT PERFORMANCE WHO HAS A GREAT ZEAL', 'terminal', '2018-03-22 12:54:55'),
(439, 0, '2017/2018', '1st Term', 'GD3064', 'FIYINFOLUWA HAS A GREAT RESULT, KEEP IT UP.', 'midterm', '2018-03-22 12:55:23'),
(440, 0, '2017/2018', '1st Term', 'GD2338', 'This is a very good performance, please keep it up.', 'terminal', '2018-03-22 12:55:44'),
(441, 0, '2017/2018', '1st Term', 'GD1299', 'A very good result. Keep it up next term.', 'terminal', '2018-03-22 12:56:07'),
(442, 0, '2017/2018', '2nd Term', 'GD5583', 'work harder.', 'midterm', '2018-03-22 12:56:15'),
(443, 0, '2017/2018', '2nd Term', 'GD4510', 'GOOD RESULT', 'midterm', '2018-03-22 12:57:02'),
(444, 0, '2017/2018', '1st Term', 'GD1353', 'Good result', 'midterm', '2018-03-22 12:57:32'),
(445, 0, '2017/2018', '1st Term', 'GD3064', 'FIYINFOLUWA HAS A GREAT RESULT, KEEP IT UP.', 'terminal', '2018-03-22 12:58:39'),
(446, 0, '2017/2018', '2nd Term', 'GD2232', 'Enoch has earned  very good grades this term. Strive for the best come next term.', 'terminal', '2018-03-22 12:58:48'),
(447, 0, '2017/2018', '1st Term', 'GD3428', 'THIS IS A VERY COMMENABLE AND IMPRESSIVE PERFORMANCE', 'midterm', '2018-03-22 13:00:06'),
(448, 0, '2017/2018', '2nd Term', 'GD4510', 'ERINAYO IS VERY INTELLIGENT AND QUITE INQUISITIVE.', 'terminal', '2018-03-22 13:00:48'),
(449, 0, '2017/2018', '1st Term', 'GD1410', 'Good result.', 'midterm', '2018-03-22 13:00:52'),
(450, 0, '2017/2018', '1st Term', 'GD1353', 'This is a commendable performance, please keep it up.', 'terminal', '2018-03-22 13:01:41'),
(451, 0, '2017/2018', '1st Term', 'GD1419', 'Good result', 'midterm', '2018-03-22 13:02:33'),
(452, 0, '2017/2018', '1st Term', 'GD3160', 'INIOLUWA HAS AN IMPRESSIVE RESULT, KEEP IT UP.', 'midterm', '2018-03-22 13:02:56'),
(453, 0, '2017/2018', '1st Term', 'GD3428', 'DANIEL IS AN EXCELLENT CHILD WITH PERFORMANCE', 'terminal', '2018-03-22 13:03:06'),
(454, 0, '2017/2018', '1st Term', 'GD1410', 'An excellent performance. Keep it up next term.', 'terminal', '2018-03-22 13:03:32'),
(455, 0, '2017/2018', '2nd Term', 'GD5065', 'Keep up the momentum and work harder.', 'midterm', '2018-03-22 13:04:33'),
(456, 0, '2017/2018', '1st Term', 'GD3160', 'INIOLUWA HAS AN IMPRESSIVE RESULT, KEEP IT UP.', 'terminal', '2018-03-22 13:06:47'),
(457, 0, '2017/2018', '1st Term', 'GD3424', 'DAMILOLA IS AN EXCELLENT CHILD WITH GREAT POTENTIAL', 'midterm', '2018-03-22 13:07:58'),
(458, 0, '2017/2018', '2nd Term', 'GD2509', 'Saad has done very well.keep it up!', 'midterm', '2018-03-22 13:08:35'),
(459, 0, '2017/2018', '1st Term', 'GD1419', 'You have done well, but push harder come next term.', 'terminal', '2018-03-22 13:08:50'),
(460, 0, '2017/2018', '1st Term', 'GD3424', 'THIS IS A VERY COMMENABLE AND IMPRESSIVE PERFORMANCE', 'terminal', '2018-03-22 13:09:32'),
(461, 0, '2017/2018', '2nd Term', 'GD4378', 'ISAAC HAS POTENTIALS.', 'midterm', '2018-03-22 13:09:43'),
(462, 0, '2017/2018', '1st Term', 'GD1441', 'Good result.', 'midterm', '2018-03-22 13:12:58'),
(463, 0, '2017/2018', '1st Term', 'GD1498', 'Good result.', 'midterm', '2018-03-22 13:13:30'),
(464, 0, '2017/2018', '1st Term', 'GD2497', 'Agood [performance.', 'midterm', '2018-03-22 13:14:03'),
(465, 0, '2017/2018', '2nd Term', 'GD5417', 'An excellent performance, keep it up.', 'midterm', '2018-03-22 13:14:49'),
(466, 0, '2017/2018', '1st Term', 'GD1441', 'An excellent performance. Keep it up.', 'terminal', '2018-03-22 13:15:04'),
(467, 0, '2017/2018', '2nd Term', 'GD4378', 'DAVID  HAS REALLY IMPROVED ACADEMICALLY BUT NEEDS TO WORK MORE ON HIS NUMERACY.', 'terminal', '2018-03-22 13:15:52'),
(468, 0, '2017/2018', '2nd Term', 'GD2509', 'Saad has done very well. Do not relent come next term.', 'terminal', '2018-03-22 13:16:03'),
(469, 0, '2017/2018', '1st Term', 'GD2497', 'A very good performance. Keep it up.', 'terminal', '2018-03-22 13:17:23'),
(470, 0, '2017/2018', '1st Term', 'GD1498', 'This performance is outstanding, please keep it up.', 'terminal', '2018-03-22 13:17:47'),
(471, 0, '2017/2018', '2nd Term', 'GD3561', 'MOYOSORE HAS A GOOD RESULT,SHE CAN DO BETTER.', 'midterm', '2018-03-22 13:18:16'),
(472, 0, '2017/2018', '1st Term', 'GD3286', 'THIS IS A  VERY GOOD RESULT', 'midterm', '2018-03-22 13:20:54'),
(473, 0, '2017/2018', '1st Term', 'GD1296', 'Good result.', 'midterm', '2018-03-22 13:20:56'),
(474, 0, '2017/2018', '2nd Term', 'GD5545', 'Keep up the momentum.', 'midterm', '2018-03-22 13:21:09'),
(475, 0, '2017/2018', '2nd Term', 'GD3561', 'MOYOSORE HAS A GOOD RESULT, DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 13:23:18'),
(476, 0, '2017/2018', '1st Term', 'GD3286', 'DARASIMI IS A GREAT CHILD WITH EXCELLENT PERFORMANCE', 'terminal', '2018-03-22 13:23:35'),
(477, 0, '2017/2018', '1st Term', 'GD2579', 'An excellent performance.', 'midterm', '2018-03-22 13:24:00'),
(478, 0, '2017/2018', '2nd Term', 'GD4584', 'ISAACHAS REALLY IMPROVED THIS TERM.', 'midterm', '2018-03-22 13:24:09'),
(479, 0, '2017/2018', '1st Term', 'GD1296', 'Good result. Keep learning', 'terminal', '2018-03-22 13:24:10'),
(480, 0, '2017/2018', '1st Term', 'GD3403', 'THIS IS A VERY GOOD PERFORMANCE', 'midterm', '2018-03-22 13:25:39'),
(481, 0, '2017/2018', '2nd Term', 'GD2542', 'Inioluwa has really tried this term.', 'midterm', '2018-03-22 13:26:16'),
(482, 0, '2017/2018', '1st Term', 'GD3403', 'KELECHI IS A WONDERFUL CHILD WITH GREAT POTNETIAL.', 'terminal', '2018-03-22 13:27:44'),
(483, 0, '2017/2018', '1st Term', 'GD2579', 'An excellence performance. Keep it up.', 'terminal', '2018-03-22 13:27:51'),
(484, 0, '2017/2018', '2nd Term', 'GD4584', 'ISAAC HAS REALLY IMPROVED THIS TERM.', 'terminal', '2018-03-22 13:28:12'),
(485, 0, '2017/2018', '2nd Term', 'GD5285', 'work harder for betther grades.', 'midterm', '2018-03-22 13:28:59'),
(486, 0, '2017/2018', '2nd Term', 'GD3574', 'JOMILOJU HAS A GOOD RESULT.', 'midterm', '2018-03-22 13:29:24'),
(487, 0, '2017/2018', '1st Term', 'GD3562', 'AYANFE HAS DONE WELL BUT NEEDS TO PUT IN MORE EFFORT', 'midterm', '2018-03-22 13:31:18'),
(488, 0, '2017/2018', '2nd Term', 'GD1527', 'Good performance.', 'midterm', '2018-03-22 13:31:49'),
(489, 0, '2017/2018', '2nd Term', 'GD3574', 'JOMILOJU HAS A VERY GOOD RESULT, DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 13:33:09'),
(490, 0, '2017/2018', '1st Term', 'GD3562', 'AYANFE HAS DONE WELL BUT NEEDS TO PUT IN MORE EFFORT', 'terminal', '2018-03-22 13:33:12'),
(491, 0, '2017/2018', '2nd Term', 'GD4117', 'PRAISE GETS BETTER BY THE DAY', 'midterm', '2018-03-22 13:33:18'),
(492, 0, '2017/2018', '1st Term', 'GD2292', 'A good result.', 'midterm', '2018-03-22 13:33:38'),
(493, 0, '2017/2018', '2nd Term', 'GD1527', 'Ayomidimeji has performed excellently. Keep it up next term.', 'terminal', '2018-03-22 13:35:20'),
(494, 0, '2017/2018', '2nd Term', 'GD1327', 'Good result.', 'midterm', '2018-03-22 13:35:28'),
(495, 0, '2017/2018', '1st Term', 'GD3592', 'HABBEB IS A GREAT CHILD WHO HAS A GREAT ZEAL', 'midterm', '2018-03-22 13:36:38'),
(496, 0, '2017/2018', '2nd Term', 'GD3474', 'CHUKUMA HAS A GREAT RESULT, KEEP IT UP.', 'midterm', '2018-03-22 13:36:41'),
(497, 0, '2017/2018', '1st Term', 'GD3592', 'HABBEB IS A GERAT CHILD WHO HAS GREAT ZEAL', 'terminal', '2018-03-22 13:38:44'),
(498, 0, '2017/2018', '2nd Term', 'GD2542', 'Inioluwa has potentials and needs to be encouraged. Work harder come next term!', 'terminal', '2018-03-22 13:40:16'),
(499, 0, '2017/2018', '2nd Term', 'GD5523', 'work harder for better grades.', 'midterm', '2018-03-22 13:40:18'),
(500, 0, '2017/2018', '2nd Term', 'GD4197', 'GOOD RESULT BUT DEMILADE NEEDS TO BE MORE ORGANIZED.', 'terminal', '2018-03-22 13:40:47'),
(501, 0, '2017/2018', '2nd Term', 'GD1495', 'Good result.', 'midterm', '2018-03-22 13:41:05'),
(502, 0, '2017/2018', '2nd Term', 'GD1327', 'AN EXCELLENT RESULT, KEEP IT UP JUSTA.', 'terminal', '2018-03-22 13:42:36'),
(503, 0, '2017/2018', '2nd Term', 'GD3474', 'CHUKUMA HAS AN EXCELLENT RESULT, KEEP IT UP.', 'terminal', '2018-03-22 13:42:52'),
(504, 0, '2017/2018', '2nd Term', 'GD4117', 'PRAISE KEEPS IMPROVING BY THE DAY.', 'terminal', '2018-03-22 13:42:59'),
(505, 0, '2017/2018', '2nd Term', 'GD2223', 'Ayomitide has done greatly,keep it up!', 'midterm', '2018-03-22 13:43:32'),
(506, 0, '2017/2018', '1st Term', 'GD3566', 'SAMUEL IS A WONDERFUL CHILD WITH GREAT POTENTIAL', 'midterm', '2018-03-22 13:44:28'),
(507, 0, '2017/2018', '2nd Term', 'GD1495', 'Tikunmi has performed greatly. Keep the flag flying.', 'terminal', '2018-03-22 13:46:42'),
(508, 0, '2017/2018', '1st Term', 'GD3566', 'SAMUEL IS A GREAT CHILD WHO HAS GREAT POTENTIAL', 'terminal', '2018-03-22 13:46:45'),
(509, 0, '2017/2018', '2nd Term', 'GD2223', 'Ayomitide is an excellent child with potentials. Keep working hard.', 'terminal', '2018-03-22 13:47:29'),
(510, 0, '2017/2018', '2nd Term', 'GD4184', 'DIVINE IS AN EXCELLENT PERFORMER.', 'midterm', '2018-03-22 13:48:03'),
(511, 0, '2017/2018', '2nd Term', 'GD5571', 'Work harder for better grades.', 'midterm', '2018-03-22 13:48:36'),
(512, 0, '2017/2018', '1st Term', 'GD2586', 'A good performance.', 'midterm', '2018-03-22 13:49:08'),
(513, 0, '2017/2018', '2nd Term', 'GD3563', 'FIKAYO HAS A GOOD RESULT,HE CAN DO BETTER.', 'midterm', '2018-03-22 13:49:48'),
(514, 0, '2017/2018', '2nd Term', 'GD1261', 'GOOD RESULT.', 'midterm', '2018-03-22 13:49:58'),
(515, 0, '2017/2018', '2nd Term', 'GD1469', 'Good result.', 'midterm', '2018-03-22 13:51:18'),
(516, 0, '2017/2018', '1st Term', 'GD2586', 'A very good performance. Keep it up.', 'terminal', '2018-03-22 13:51:28'),
(517, 0, '2017/2018', '2nd Term', 'GD4476', 'A VERY BRILLIANT PERFORMANCE, KEEP IT UP.', 'terminal', '2018-03-22 13:52:42'),
(518, 0, '2017/2018', '2nd Term', 'GD3563', 'FIKAYO HAS A GOOD RESULT, KEEP IMPROVING NEXT TERM.', 'terminal', '2018-03-22 13:53:55'),
(519, 0, '2017/2018', '2nd Term', 'GD2590', 'Oladotun is an excellent child with great potentials!', 'terminal', '2018-03-22 13:54:36'),
(520, 0, '2017/2018', '2nd Term', 'GD5435', 'Semilore needs to work harder.', 'midterm', '2018-03-22 13:55:38'),
(521, 0, '2017/2018', '2nd Term', 'GD4184', 'DIVINE IS A GREAT PERFORMER.', 'terminal', '2018-03-22 13:56:45'),
(522, 0, '2017/2018', '2nd Term', 'GD4070', 'A VERY IMPRESSIVE PERFORMANCE, KEEP IT UP.', 'terminal', '2018-03-22 13:56:45'),
(523, 0, '2017/2018', '2nd Term', 'GD1469', 'Damilola has great potentials but needs to be more out spoken.', 'terminal', '2018-03-22 13:56:52'),
(524, 0, '2017/2018', '1st Term', 'GD2269', 'A good performance.', 'midterm', '2018-03-22 13:58:15'),
(525, 0, '2017/2018', '2nd Term', 'GD1261', 'DARASIMI PERFOMANCE HAS REACHED NEW HIEGHT, KEEP IT UP DEAR.', 'terminal', '2018-03-22 13:59:29'),
(526, 0, '2017/2018', '2nd Term', 'GD3536', 'OREOLUWA HAS A VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 14:00:30'),
(527, 0, '2017/2018', '2nd Term', 'GD4087', 'AN IMPRESSIVE PERFORMANCE, KEEP IT UP.', 'terminal', '2018-03-22 14:01:10'),
(528, 0, '2017/2018', '2nd Term', 'GD4248', 'YANMIFE NEEDS TO WORK MORE ON SOME OF HER SUBJECTS.', 'midterm', '2018-03-22 14:02:29'),
(529, 0, '2017/2018', '1st Term', 'GD2269', 'Your performance is highly commendable, please keep up the good work.', 'terminal', '2018-03-22 14:02:30'),
(530, 0, '2017/2018', '2nd Term', 'GD3536', 'OREOLUWA HAS REALLY  IMPROVED THIS TERM,KEEPS IT UP.', 'terminal', '2018-03-22 14:04:17'),
(531, 0, '2017/2018', '2nd Term', 'GD1565', 'Good result.', 'midterm', '2018-03-22 14:04:17'),
(532, 0, '2017/2018', '2nd Term', 'GD4248', 'YANMIFE NEEDS TO WORK MORE ON SOME OF HER SUBJECTS', 'terminal', '2018-03-22 14:04:24'),
(533, 0, '2017/2018', '2nd Term', 'GD2193', 'Olamide is making great progress,keep it up dear.', 'midterm', '2018-03-22 14:05:24'),
(534, 0, '2017/2018', '2nd Term', 'GD1582', 'GOOD RESULTS.', 'midterm', '2018-03-22 14:05:26'),
(535, 0, '2017/2018', '1st Term', 'GD2282', 'A good result.', 'midterm', '2018-03-22 14:07:09'),
(536, 0, '2017/2018', '2nd Term', 'GD2193', 'Olamide has done greatly this term. Keep it up come next term.', 'terminal', '2018-03-22 14:07:15'),
(537, 0, '2017/2018', '2nd Term', 'GD4415', 'A VERY IMPRESSIVE PERFORMANCE, KEEP IT UP.', 'terminal', '2018-03-22 14:07:43'),
(538, 0, '2017/2018', '2nd Term', 'GD4496', 'I FEEL MAYOMIKUN CAN PERFORM BETTER PROPERLY MONITORED.', 'midterm', '2018-03-22 14:08:14'),
(539, 0, '2017/2018', '2nd Term', 'GD3163', 'AYOMIDE IS AN EXCELLENT PERFORMANCE WHO HAS GREAT ZEAL', 'midterm', '2018-03-22 14:09:05'),
(540, 0, '2017/2018', '2nd Term', 'GD1565', 'Goodness has good attitude towards class activities and he has perfomed excellently well.', 'terminal', '2018-03-22 14:09:18'),
(541, 0, '2017/2018', '2nd Term', 'GD3089', 'DAVID HAS A GREAT POTENTIAL, KEEPS IMPROVING NEXT TERM.', 'midterm', '2018-03-22 14:09:42'),
(542, 0, '2017/2018', '1st Term', 'GD2282', 'An excellent performance. Keep it up.', 'terminal', '2018-03-22 14:10:26'),
(543, 0, '2017/2018', '2nd Term', 'GD5618', 'A good performance but work harder.', 'midterm', '2018-03-22 14:11:18'),
(544, 0, '2017/2018', '2nd Term', 'GD4152', 'A BRILLIANT PERFORMANCE, KEEP IT UP.', 'terminal', '2018-03-22 14:12:01'),
(545, 0, '2017/2018', '2nd Term', 'GD4496', 'I FEEL MAYOMIKUN CAN PERFORM BETTER IF PROPERLY MONITORED.', 'terminal', '2018-03-22 14:12:23'),
(546, 0, '2017/2018', '2nd Term', 'GD3163', 'AYOMIDE HAS DONE WONDERFULLY WELL THIS TERM BUT DONT RELENT IN DOING MORE COME NEXT TERM.', 'terminal', '2018-03-22 14:12:45'),
(547, 0, '2017/2018', '2nd Term', 'GD1582', 'A HIGHLY COMMENDABLE RESULTS, KEEP IT MOVING.', 'terminal', '2018-03-22 14:12:50'),
(548, 0, '2017/2018', '2nd Term', 'GD2188', 'David keeps improving in his grades by the day. Keep it up and do not relent.', 'terminal', '2018-03-22 14:13:29'),
(549, 0, '2017/2018', '2nd Term', 'GD1558', 'Good result.', 'midterm', '2018-03-22 14:13:34'),
(550, 0, '2017/2018', '1st Term', 'GD2466', 'A good performance.', 'midterm', '2018-03-22 14:14:31'),
(551, 0, '2017/2018', '2nd Term', 'GD4207', 'A VERY GOOD RESULT, KEEP IT UP.', 'terminal', '2018-03-22 14:15:19'),
(552, 0, '2017/2018', '2nd Term', 'GD1438', 'GOOD RESULTS.', 'midterm', '2018-03-22 14:16:11'),
(553, 0, '2017/2018', '2nd Term', 'GD4305', 'NIFEMI IS VERY INTELLIGENT. SHE DOES HER WORK DILIGENTLY', 'midterm', '2018-03-22 14:16:14'),
(554, 0, '2017/2018', '2nd Term', 'GD3424', 'THIS IS A GOOD PERFORMANCE', 'midterm', '2018-03-22 14:16:17'),
(555, 0, '2017/2018', '2nd Term', 'GD2352', 'Demilade is an excellent child with great potentials.', 'midterm', '2018-03-22 14:17:00'),
(556, 0, '2017/2018', '1st Term', 'GD2466', 'An excellent performance. Keep it up.', 'terminal', '2018-03-22 14:17:40'),
(557, 0, '2017/2018', '2nd Term', 'GD4305', 'NIFEMI IS VERY INTELLIGENT. SHE DOES HER WORK DILIGENTLY.', 'terminal', '2018-03-22 14:17:53'),
(558, 0, '2017/2018', '2nd Term', 'GD5538', 'put in more effort.', 'midterm', '2018-03-22 14:18:13'),
(559, 0, '2017/2018', '2nd Term', 'GD3089', 'DAVID HAS A GOOD RESULT, KEEPS IMPROVING NEXT TERM.', 'terminal', '2018-03-22 14:18:35'),
(560, 0, '2017/2018', '2nd Term', 'GD1558', 'Moyin has stepped up his game. Keep improving.', 'terminal', '2018-03-22 14:18:50'),
(561, 0, '2017/2018', '2nd Term', 'GD3424', 'DAMILOLA IS AN EXCELLENT CHILD WITH GREAT POTENTIALS.', 'terminal', '2018-03-22 14:19:40'),
(562, 0, '2017/2018', '2nd Term', 'GD2352', 'Demilade is an excellent performer with great potientials. Ride on my champion!', 'terminal', '2018-03-22 14:20:43'),
(563, 0, '2017/2018', '2nd Term', 'GD4157', 'A VERY IMPRESSIVE PERFORMANCE, KEEP IT UP.', 'terminal', '2018-03-22 14:20:56'),
(564, 0, '2017/2018', '1st Term', 'GD2539', 'A very good result.', 'midterm', '2018-03-22 14:22:18'),
(565, 0, '2017/2018', '2nd Term', 'GD1462', 'Good result.', 'midterm', '2018-03-22 14:22:21'),
(566, 0, '2017/2018', '2nd Term', 'GD4416', 'KEHINDE IS CALM AND VERY HARDWORKING.', 'midterm', '2018-03-22 14:22:37'),
(567, 0, '2017/2018', '2nd Term', 'GD3286', 'THIS IS A VERY GOOD PERFORMANCE', 'midterm', '2018-03-22 14:24:16'),
(568, 0, '2017/2018', '2nd Term', 'GD2395', 'She has performed execellently,keep flying girl!', 'midterm', '2018-03-22 14:24:33'),
(569, 0, '2017/2018', '2nd Term', 'GD4416', 'KEHINDE IS CALM, INTELLIGENT AND HARDWORKING.', 'terminal', '2018-03-22 14:24:35'),
(570, 0, '2017/2018', '2nd Term', 'GD1462', 'Divine has performed excellently. Keep the ball rolling.', 'terminal', '2018-03-22 14:25:29'),
(571, 0, '2017/2018', '2nd Term', 'GD4472', 'A VERY GOOD RESULT, KEEP IT UP.', 'terminal', '2018-03-22 14:25:37'),
(572, 0, '2017/2018', '1st Term', 'GD2539', 'A very good performance . Keep it up.', 'terminal', '2018-03-22 14:26:22'),
(573, 0, '2017/2018', '2nd Term', 'GD3286', 'DARASIMI HAS DONE VERY WELL. KEEP IT UP.', 'terminal', '2018-03-22 14:27:26'),
(574, 0, '2017/2018', '2nd Term', 'GD1311', 'Good result', 'midterm', '2018-03-22 14:28:11'),
(575, 0, '2017/2018', '2nd Term', 'GD4439', 'VERY GOOD', 'midterm', '2018-03-22 14:28:12'),
(576, 0, '2017/2018', '2nd Term', 'GD2395', 'Toluwanimi is an excellent performer with great potentials. Keep the ball rolling.', 'terminal', '2018-03-22 14:28:55'),
(577, 0, '2017/2018', '2nd Term', 'GD1438', 'A POSITIVE IMPROVMENT IN DAMISIS RESULT, KEEP UP THE GOOD WORK.', 'terminal', '2018-03-22 14:29:53'),
(578, 0, '2017/2018', '2nd Term', 'GD2539', 'A good result.', 'midterm', '2018-03-22 14:31:05'),
(579, 0, '2017/2018', '2nd Term', 'GD3173', 'DIVINE HAS A GREAT RESULT.', 'midterm', '2018-03-22 14:31:21'),
(580, 0, '2017/2018', '2nd Term', 'GD4439', 'TUNBUYI HAS REALLY TRIED THIS TERM.', 'terminal', '2018-03-22 14:31:21'),
(581, 0, '2017/2018', '2nd Term', 'GD4479', 'A VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2018-03-22 14:31:50'),
(582, 0, '2017/2018', '2nd Term', 'GD4479', 'AN IMPRESSIVE PERFORMANCE, KEEP IT UP.', 'terminal', '2018-03-22 14:33:50'),
(583, 0, '2017/2018', '2nd Term', 'GD3096', 'GOOD PERFORMANCE BUT YOU CAN DO BETTER', 'midterm', '2018-03-22 14:33:54'),
(584, 0, '2017/2018', '2nd Term', 'GD3173', 'DIVINE HAS AN EXCELLENT RESULT, DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 14:34:02'),
(585, 0, '2017/2018', '2nd Term', 'GD4478', 'GOOD', 'midterm', '2018-03-22 14:34:21'),
(586, 0, '2017/2018', '2nd Term', 'GD2229', 'Ezekiel is improving by the day.', 'midterm', '2018-03-22 14:35:56'),
(587, 0, '2017/2018', '2nd Term', 'GD3096', 'A GOOD PERFORMANCE BUT YOU CAN DO BETTER.', 'terminal', '2018-03-22 14:36:04'),
(588, 0, '2017/2018', '2nd Term', 'GD4478', 'DANIEL IS AN EXCELLENT PERFORMER. KEEP IT UP DEAR!', 'terminal', '2018-03-22 14:36:19'),
(589, 0, '2017/2018', '2nd Term', 'GD2539', 'An excellent performance. Do not relent in your effort.', 'terminal', '2018-03-22 14:36:38'),
(590, 0, '2017/2018', '2nd Term', 'GD1311', 'Pamilerin has a positive performance in his academics. Keep it up.', 'terminal', '2018-03-22 14:36:45'),
(591, 0, '2017/2018', '2nd Term', 'GD4252', 'GOOD RESULT, KEEP IT UP.', 'terminal', '2018-03-22 14:37:48'),
(592, 0, '2017/2018', '2nd Term', 'GD3134', 'SIMILOLUWA HAS AN EXCELLENT RESULT.', 'midterm', '2018-03-22 14:38:48'),
(593, 0, '2017/2018', '2nd Term', 'GD5426', 'A good performance.', 'midterm', '2018-03-22 14:39:54'),
(594, 0, '2017/2018', '2nd Term', 'GD4014', 'GOOD', 'midterm', '2018-03-22 14:40:05'),
(595, 0, '2017/2018', '2nd Term', 'GD2229', 'Ezekiel has improved positively in his performance. Strive for the best come next term.', 'terminal', '2018-03-22 14:40:08'),
(596, 0, '2017/2018', '2nd Term', 'GD1612', 'AN ACCURATE RESULTS.', 'midterm', '2018-03-22 14:40:16'),
(597, 0, '2017/2018', '2nd Term', 'GD3154', 'A GOOD PERFORMANCE BUT YOU CAN DO BETTER', 'midterm', '2018-03-22 14:40:55'),
(598, 0, '2017/2018', '2nd Term', 'GD1304', 'Good result', 'midterm', '2018-03-22 14:41:42'),
(599, 0, '2017/2018', '2nd Term', 'GD2497', 'A good performance. Keep it up.', 'midterm', '2018-03-22 14:41:59'),
(600, 0, '2017/2018', '2nd Term', 'GD3134', 'SIMILOLUWA HAS AN EXCELLENT RESULT. KEEP IT UP.', 'terminal', '2018-03-22 14:42:05'),
(601, 0, '2017/2018', '2nd Term', 'GD4014', 'KOFO IS REALLY PULLING HER WEIGHT IN THE CLASS.', 'terminal', '2018-03-22 14:42:47'),
(602, 0, '2017/2018', '2nd Term', 'GD4104', 'AN IMPRESSIVE PERFORMANCE ,KEEP IT UP.', 'terminal', '2018-03-22 14:45:02'),
(603, 0, '2017/2018', '2nd Term', 'GD1304', 'Abayomi has an outstanding  result. Keep the flag flying.', 'terminal', '2018-03-22 14:45:36'),
(604, 0, '2017/2018', '2nd Term', 'GD1612', 'THIS IS A HIGHLY COMMENDABLE PERFORMANCE. KEEP UP YOUR EXCELLENT WORK.', 'terminal', '2018-03-22 14:46:05'),
(605, 0, '2017/2018', '2nd Term', 'GD4463', 'GOOD', 'midterm', '2018-03-22 14:46:15'),
(606, 0, '2017/2018', '2nd Term', 'GD2497', 'A fantastic performance. . Do not relent in your effort.', 'terminal', '2018-03-22 14:46:47'),
(607, 0, '2017/2018', '2nd Term', 'GD3241', 'TOCHI HAS AN EXCELLENT RESULT, KEEP THE FLAG FLYING.', 'midterm', '2018-03-22 14:46:50'),
(608, 0, '2017/2018', '2nd Term', 'GD4463', 'GOLD REALLY DID WELL THIS TERM COMPARED TO LAST TERM.', 'terminal', '2018-03-22 14:49:05'),
(609, 0, '2017/2018', '2nd Term', 'GD4444', 'ANU NEEDS TO WORK HARDER FOR BETTER RESULT.', 'terminal', '2018-03-22 14:49:13'),
(610, 0, '2017/2018', '2nd Term', 'GD3241', 'TOCHI HAS AN EXCELLENT RESULT, DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 14:50:21'),
(611, 0, '2017/2018', '2nd Term', 'GD1299', 'Good result.', 'midterm', '2018-03-22 14:50:41'),
(612, 0, '2017/2018', '2nd Term', 'GD2567', 'A good performance.', 'midterm', '2018-03-22 14:51:28'),
(613, 0, '2017/2018', '2nd Term', 'GD4201', 'GOOD', 'midterm', '2018-03-22 14:51:38'),
(614, 0, '2017/2018', '2nd Term', 'GD4201', 'FOYINSOLA KEEPS IMPROVING BY THE DAY.', 'terminal', '2018-03-22 14:53:36'),
(615, 0, '2017/2018', '2nd Term', 'GD4219', 'A VERY GOOD RESULT, KEEP IT UP.', 'terminal', '2018-03-22 14:54:34'),
(616, 0, '2017/2018', '2nd Term', 'GD3206', 'TENIOLA HAS AN EXCELLENT RESULT, KEEP THE FLAG FLYING.', 'midterm', '2018-03-22 14:55:32'),
(617, 0, '2017/2018', '2nd Term', 'GD4146', 'A VERY GOOD RESULT, KEEP IT UP.', 'terminal', '2018-03-22 14:56:54'),
(618, 0, '2017/2018', '2nd Term', 'GD1299', 'Adesope has performed excellently. Keep it up.', 'terminal', '2018-03-22 14:57:37'),
(619, 0, '2017/2018', '2nd Term', 'GD1578', 'GOOD RESULTS.', 'midterm', '2018-03-22 14:58:15'),
(620, 0, '2017/2018', '2nd Term', 'GD3206', 'TENIOLA HAS AN EXCELLENT RESULT, KEEP THE FLAG FLYING.', 'terminal', '2018-03-22 14:58:54'),
(621, 0, '2017/2018', '2nd Term', 'GD3154', 'TENIOLA IS A GREAT CHILD WITH GREAT POTENTIAL', 'terminal', '2018-03-22 14:59:10'),
(622, 0, '2017/2018', '2nd Term', 'GD2567', 'Naomi has improved. She can do better if there is more support.', 'terminal', '2018-03-22 14:59:45'),
(623, 0, '2017/2018', '2nd Term', 'GD5290', 'A good performance.', 'midterm', '2018-03-22 14:59:45'),
(624, 0, '2017/2018', '2nd Term', 'GD4595', 'A VERY GOOD RESULT, KEEP IT UP.', 'terminal', '2018-03-22 14:59:51'),
(625, 0, '2017/2018', '2nd Term', 'GD1410', 'Good result.', 'midterm', '2018-03-22 15:00:48'),
(626, 0, '2017/2018', '2nd Term', 'GD3493', 'MOFESADE HAS A GREAT RESULT.', 'midterm', '2018-03-22 15:01:24'),
(627, 0, '2017/2018', '2nd Term', 'GD2211', 'A good result.', 'midterm', '2018-03-22 15:02:53'),
(628, 0, '2017/2018', '2nd Term', 'GD5576', 'A very good performance.', 'midterm', '2018-03-22 15:03:08'),
(629, 0, '2017/2018', '2nd Term', 'GD3493', 'MOFESADE HAS A GREAT RESULT, DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 15:03:25'),
(630, 0, '2017/2018', '2nd Term', 'GD1410', 'Eniola has positive attitude towards class activities and has performed excellently.', 'terminal', '2018-03-22 15:04:08'),
(631, 0, '2017/2018', '2nd Term', 'GD1578', 'BOLU HAS RAPIDLY IMPROVED IN HER PERFORMANCE, KEEP IT UP.', 'terminal', '2018-03-22 15:04:15'),
(632, 0, '2017/2018', '2nd Term', 'GD2211', 'An excellent perfoermance. Do not relent in your effort.', 'terminal', '2018-03-22 15:04:56'),
(633, 0, '2017/2018', '2nd Term', 'GD3250', 'ADEFOLARIN HAS DONE VERY WEL BUT NEEDS TO PUT IN MORE EFFORT', 'midterm', '2018-03-22 15:07:05'),
(634, 0, '2017/2018', '2nd Term', 'GD3591', 'AYOMIDE HAS A GOOD RESULT.', 'midterm', '2018-03-22 15:07:14'),
(635, 0, '2017/2018', '2nd Term', 'GD2292', 'A good performance. Keep it up.', 'midterm', '2018-03-22 15:07:31'),
(636, 0, '2017/2018', '2nd Term', 'GD1441', 'Good result.', 'midterm', '2018-03-22 15:07:41'),
(637, 0, '2017/2018', '2nd Term', 'GD2524', 'This is a commendable result. Keep working hard.', 'terminal', '2018-03-22 15:07:44'),
(638, 0, '2017/2018', '2nd Term', 'GD5012', 'work harder for a better grade.', 'midterm', '2018-03-22 15:08:12'),
(639, 0, '2017/2018', '2nd Term', 'GD1287', 'GOOD RESULTS', 'midterm', '2018-03-22 15:08:57'),
(640, 0, '2017/2018', '2nd Term', 'GD2292', 'An excellent performance. Do not relent in your effort.', 'terminal', '2018-03-22 15:09:30'),
(641, 0, '2017/2018', '2nd Term', 'GD3250', 'THIS IS A GOOD PERFORMANCE. YOU NEED TO PUT IN MORE EFFORT NEXT TERM.', 'terminal', '2018-03-22 15:09:50'),
(642, 0, '2017/2018', '2nd Term', 'GD3591', 'AYOMIDE HAS A COMMENDABLE RESULT,KEEPS IMPROVING .', 'terminal', '2018-03-22 15:09:58'),
(643, 0, '2017/2018', '2nd Term', 'GD1441', 'Your performance is highly commendable. Keep it up.', 'terminal', '2018-03-22 15:10:51'),
(644, 0, '2017/2018', '2nd Term', 'GD2432', 'A good performance.', 'midterm', '2018-03-22 15:11:23'),
(645, 0, '2017/2018', '2nd Term', 'GD3064', 'FIYINFOLUWA HAS A VERY GOOD RESULT.', 'midterm', '2018-03-22 15:13:08'),
(646, 0, '2017/2018', '2nd Term', 'GD2432', 'An excellent result. Do not relent in your effort.', 'terminal', '2018-03-22 15:13:32'),
(647, 0, '2017/2018', '2nd Term', 'GD5564', 'Work harder.', 'midterm', '2018-03-22 15:13:44'),
(648, 0, '2017/2018', '2nd Term', 'GD1296', 'Good result.', 'midterm', '2018-03-22 15:14:00'),
(649, 0, '2017/2018', '2nd Term', 'GD3293', 'BOLU HAS DONE GOOD FOR HERSELF BUT NEEDS TO PUT IN MORE EFFORT', 'midterm', '2018-03-22 15:14:16'),
(650, 0, '2017/2018', '2nd Term', 'GD1287', 'KELVIN HAS A BRILLANT PERFORMANCE, KEEP ON MOVING.', 'terminal', '2018-03-22 15:14:41'),
(651, 0, '2017/2018', '2nd Term', 'GD2278', 'A good performance.', 'midterm', '2018-03-22 15:16:11'),
(652, 0, '2017/2018', '2nd Term', 'GD3293', 'THIS IS A GOOD PERFORMANCE. YOU NEED TO PUT IN MORE EFFORT NEXT TERM.', 'terminal', '2018-03-22 15:16:42'),
(653, 0, '2017/2018', '2nd Term', 'GD2278', 'An excellent performance. Do not relent in yor effort.', 'terminal', '2018-03-22 15:18:00'),
(654, 0, '2017/2018', '2nd Term', 'GD3064', 'FIYINFOLUWA HAS A GREAT RESULT, KEEPS IMPROVING NEXT TERM.', 'terminal', '2018-03-22 15:18:10'),
(655, 0, '2017/2018', '2nd Term', 'GD1296', 'Feranmi has a good result but needs to be more focus in his academics next term.', 'terminal', '2018-03-22 15:18:16'),
(656, 0, '2017/2018', '2nd Term', 'GD5239', 'A very good performance.', 'midterm', '2018-03-22 15:20:34'),
(657, 0, '2017/2018', '2nd Term', 'GD2586', 'A good result.', 'midterm', '2018-03-22 15:20:34'),
(658, 0, '2017/2018', '2nd Term', 'GD1353', 'KANYINSOLA HAS PERFORMED BRILLANTLY THIS TERM.GOOD RESULT.', 'terminal', '2018-03-22 15:21:06'),
(659, 0, '2017/2018', '2nd Term', 'GD1331', 'GOOD RESULTS.', 'midterm', '2018-03-22 15:21:47'),
(660, 0, '2017/2018', '2nd Term', 'GD3160', 'INIOLUWA HAS  A GREAT RESULT, KEEP IT UP.', 'midterm', '2018-03-22 15:21:58'),
(661, 0, '2017/2018', '2nd Term', 'GD2586', 'An execellent  performance.Do not relent in your effort.', 'terminal', '2018-03-22 15:23:47'),
(662, 0, '2017/2018', '2nd Term', 'GD1353', 'Good result.', 'midterm', '2018-03-22 15:23:54'),
(663, 0, '2017/2018', '2nd Term', 'GD3566', 'SAMUEL IS AN EXCELLENT CHILD WITH GREAT POTENTIAL', 'midterm', '2018-03-22 15:23:56'),
(664, 0, '2017/2018', '2nd Term', 'GD3160', 'INIOLUWA HAS A COMMENDABLE RESULT, DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 15:25:22'),
(665, 0, '2017/2018', '2nd Term', 'GD1331', 'TOLU HAS GREATLY IMPROVED IN HIS PERFORMANCE. KEEP IT UP.', 'terminal', '2018-03-22 15:25:32'),
(666, 0, '2017/2018', '2nd Term', 'GD3566', 'THIS IS A GOOD PERFORMANCE. KEEP IT UP.', 'terminal', '2018-03-22 15:26:30'),
(667, 0, '2017/2018', '2nd Term', 'GD1419', 'Good result.', 'midterm', '2018-03-22 15:26:45'),
(668, 0, '2017/2018', '2nd Term', 'GD5583', 'Mueezat needs to work harder.', 'terminal', '2018-03-22 15:27:36'),
(669, 0, '2017/2018', '2nd Term', 'GD2234', 'A good performance.', 'midterm', '2018-03-22 15:28:14'),
(670, 0, '2017/2018', '2nd Term', 'GD1419', 'Good result but Stephanie needs to work harder next term.', 'terminal', '2018-03-22 15:29:15'),
(671, 0, '2017/2018', '2nd Term', 'GD5065', 'Jerry needs to work harder.', 'terminal', '2018-03-22 15:29:35'),
(672, 0, '2017/2018', '2nd Term', 'GD1498', 'GOOD RESULT.', 'midterm', '2018-03-22 15:31:38'),
(673, 0, '2017/2018', '2nd Term', 'GD5417', 'Keep up the Momentum.', 'terminal', '2018-03-22 15:31:42'),
(674, 0, '2017/2018', '2nd Term', 'GD3403', 'KELECHI IA AN EXCELLENT PERFORMANCE WHO HAS A GREAT ZEAL', 'midterm', '2018-03-22 15:32:27'),
(675, 0, '2017/2018', '2nd Term', 'GD2234', 'A very good performance. Do not relent in your effort.', 'terminal', '2018-03-22 15:32:49'),
(676, 0, '2017/2018', '2nd Term', 'GD1498', 'A BRILLIANT PERFORMANCE. KEEP IT UP.', 'terminal', '2018-03-22 15:35:50'),
(677, 0, '2017/2018', '2nd Term', 'GD3403', 'KELECHI HAS DONE WELL  THIS TERM BUT SHOULD NOT RELENT.', 'terminal', '2018-03-22 15:36:03'),
(678, 0, '2017/2018', '2nd Term', 'GD2466', 'A GOOD PERFORMANCE.', 'midterm', '2018-03-22 15:36:11'),
(679, 0, '2017/2018', '2nd Term', 'GD5545', 'Keep up the momentum Haddy.', 'terminal', '2018-03-22 15:36:39'),
(680, 0, '2017/2018', '2nd Term', 'GD2466', 'AN EXCELLENT PERFORMANCE. DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 15:37:53'),
(681, 0, '2017/2018', '2nd Term', 'GD5285', 'Dammy should not relent and work harder.', 'terminal', '2018-03-22 15:39:42'),
(682, 0, '2017/2018', '2nd Term', 'GD3615', 'OREOLUWA NEEDS TO TAKE HER WORK SERIOUSLY', 'midterm', '2018-03-22 15:39:55'),
(683, 0, '2017/2018', '2nd Term', 'GD2553', 'A GOOD PERFORMANCE.', 'midterm', '2018-03-22 15:40:03'),
(684, 0, '2017/2018', '2nd Term', 'GD5523', 'Keep up the momentum.', 'terminal', '2018-03-22 15:41:34'),
(685, 0, '2017/2018', '2nd Term', 'GD2553', 'AN EXCELLENT PERFORMANCE. DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 15:42:19'),
(686, 0, '2017/2018', '2nd Term', 'GD3615', 'OREOLUWA HAS PERFORMED WELL BUT NEEDS TO TAKE HER STUDIES MORE SERIOUSLY.', 'terminal', '2018-03-22 15:42:25'),
(687, 0, '2017/2018', '2nd Term', 'GD5571', 'Dammy needs to work harder.', 'terminal', '2018-03-22 15:44:18'),
(688, 0, '2017/2018', '2nd Term', 'GD2579', 'A GOOD PERFORMANCE.', 'midterm', '2018-03-22 15:44:59'),
(689, 0, '2017/2018', '2nd Term', 'GD5435', 'Semilore should keep up the hardwork and never relent.', 'terminal', '2018-03-22 15:46:48'),
(690, 0, '2017/2018', '2nd Term', 'GD3428', 'DAN', 'midterm', '2018-03-22 15:47:04'),
(691, 0, '2017/2018', '2nd Term', 'GD2579', 'AN EXCELLENT PERFORMANCE. DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 15:47:32'),
(692, 0, '2017/2018', '2nd Term', 'GD5618', 'Obaro needs to keep up the momentum and work harder.', 'terminal', '2018-03-22 15:49:11'),
(693, 0, '2017/2018', '2nd Term', 'GD2269', 'A VERY GOOD PERFORMANCE.', 'midterm', '2018-03-22 15:50:56'),
(694, 0, '2017/2018', '2nd Term', 'GD3428', 'DANIEL IS A GREAT PERFORMER WITH GREAT POTENTIALS.', 'terminal', '2018-03-22 15:51:02'),
(695, 0, '2017/2018', '2nd Term', 'GD5538', 'Solomon needs to work harder.', 'terminal', '2018-03-22 15:51:05'),
(696, 0, '2017/2018', '2nd Term', 'GD2269', 'AN EXCELLENT PERFORMANCE. DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 15:53:10'),
(697, 0, '2017/2018', '2nd Term', 'GD5426', 'Motun needs to work harder.', 'terminal', '2018-03-22 15:53:39'),
(698, 0, '2017/2018', '2nd Term', 'GD2342', 'A GOOD PERFORMANCE.', 'midterm', '2018-03-22 15:55:02'),
(699, 0, '2017/2018', '2nd Term', 'GD5290', 'Ose needs to keep up the momentum.', 'terminal', '2018-03-22 15:55:16'),
(700, 0, '2017/2018', '2nd Term', 'GD2342', 'AN EXCELLENT PERFORMANCE. DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 15:56:35'),
(701, 0, '2017/2018', '2nd Term', 'GD5576', 'Keep up the good performance.', 'terminal', '2018-03-22 15:57:10'),
(702, 0, '2017/2018', '2nd Term', 'GD3562', 'AYANFE NEEDS TO PUT MORE EFFORT IN HER STUDIES', 'midterm', '2018-03-22 15:57:25'),
(703, 0, '2017/2018', '2nd Term', 'GD2282', 'A VERY GOOD PERFORMANCE.', 'midterm', '2018-03-22 15:58:29'),
(704, 0, '2017/2018', '2nd Term', 'GD5012', 'Apade needs to work harder.', 'terminal', '2018-03-22 15:59:15'),
(705, 0, '2017/2018', '2nd Term', 'GD2282', 'AN EXCELLENT PERFORMANCE. DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 16:00:49'),
(706, 0, '2017/2018', '2nd Term', 'GD3562', 'AYANFE NEEDS TO PUT IN MORE EFFORT IN HER STUDIES.', 'terminal', '2018-03-22 16:01:00'),
(707, 0, '2017/2018', '2nd Term', 'GD5564', 'Feranmi needs to work harder to obtain better grades.', 'terminal', '2018-03-22 16:01:15'),
(708, 0, '2017/2018', '2nd Term', 'GD5239', 'Olamide needs to keep up the momentum.', 'terminal', '2018-03-22 16:02:59'),
(709, 0, '2017/2018', '2nd Term', 'GD2338', 'AN EXCELLENT PERFORMANCE.', 'midterm', '2018-03-22 16:04:21'),
(710, 0, '2017/2018', '2nd Term', 'GD3592', 'HABEEB IS AN EXCELLENT PERFORMANCE WHO HAS GREAT ZEAL', 'midterm', '2018-03-22 16:05:43'),
(711, 0, '2017/2018', '2nd Term', 'GD2338', 'AN EXCELLENT PERFORMANCE. DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 16:06:48'),
(712, 0, '2017/2018', '2nd Term', 'GD3592', 'HABEEB IS AN EXCELLENT PERFORMER.', 'terminal', '2018-03-22 16:09:33'),
(713, 0, '2017/2018', '2nd Term', 'GD2280', 'AN EXCELLENT PERFORMANCE. KEEP IT UP.', 'midterm', '2018-03-22 16:11:58'),
(714, 0, '2017/2018', '2nd Term', 'GD2280', 'AN EXCELLENT PERFORMANCE. DO NOT RELENT IN YOUR EFFORT.', 'terminal', '2018-03-22 16:14:44'),
(715, 0, '2017/2018', '1st Term', 'NR1528', 'Ifeoluwa is a brilliant child and has positive attitude towards learning.', '', '2018-03-23 07:39:39'),
(716, 0, '2017/2018', '2nd Term', 'NR1423', 'Tiwatope is  very intelligent and has positive attitude towards learning.', '', '2018-03-23 08:05:04'),
(717, 0, '2017/2018', '2nd Term', 'NR1461', 'Michelle is a brilliant child and has improved in her writing skills.', '', '2018-03-23 08:12:54'),
(718, 0, '2017/2018', '2nd Term', 'NR1481', 'David is very intelligent and has positive attitude towards learning.', '', '2018-03-23 08:17:25'),
(719, 0, '2017/2018', '2nd Term', 'NR1446', 'Efechukwu is academically good, but needs to be ready to do more tasks.', '', '2018-03-23 08:23:58'),
(720, 0, '2017/2018', '2nd Term', 'NR1447', 'Ayomidesire is a brilliant child and has positive attitude towards learning.', '', '2018-03-23 08:37:59'),
(721, 0, '2017/2018', '2nd Term', 'NR1505', 'Olamide is academically good and has greatly improved in her writing skills.', '', '2018-03-23 08:42:07'),
(722, 0, '2017/2018', '2nd Term', 'NR1499', 'Boluwatife is a brilliant child and has positive attitude towards learning.', '', '2018-03-23 08:45:25'),
(723, 0, '2017/2018', '2nd Term', 'NR1407', 'Moyinoluwa is a brilliant child and has positive attitude towards learning.', '', '2018-03-23 08:50:44'),
(724, 0, '2017/2018', '1st Term', 'GD3615', '', 'midterm', '2018-03-23 10:01:03'),
(725, 0, '2017/2018', '1st Term', 'GD3615', '', 'terminal', '2018-03-23 10:04:05'),
(726, 0, '2017/2018', '1st Term', 'RC0530', 'Ireayomi is an intelligent boy. He is always eager to learn.', '', '2018-03-26 10:20:21'),
(727, 0, '2017/2018', '1st Term', 'RC0585', 'Getrude is a good girl and always arrives at school with a smile.', '', '2018-03-26 10:22:33'),
(728, 0, '1st Term', 'PG0599', '', '', '2017/2018', '2018-03-26 10:33:56'),
(729, 0, '2017/2018', '1st Term', 'PG0599', 'Anjolaoluwalaye is always active and responsive during class activities.', '', '2018-03-27 14:04:50'),
(730, 0, '2017/2018', '2nd Term', 'RC0530', 'Ireayomi is an intelligent boy and has improved well this term.', '', '2018-03-28 10:08:42'),
(731, 0, '2017/2018', '1st Term', 'PG0575', 'Samuel is intelligent and friendly, he has a positive attitude towards learning.', '', '2018-03-28 10:18:32'),
(732, 0, '2017/2018', '2nd Term', 'PG0575', 'Samuel is brillant,friendly and  has  really  improved academically.', '', '2018-03-28 10:26:51'),
(733, 0, '2017/2018', '2nd Term', 'RC0585', 'Getrude is brilliant, friendly and has zeal for learning.', '', '2018-03-28 10:30:08'),
(734, 0, '2017/2018', '1st Term', 'RC0121', 'Oluwashetemipe is brilliant and friendly,he does his activities cheerfully', '', '2018-03-28 10:30:49'),
(735, 0, '2017/2018', '1st Term', 'PG0594', 'Liam is always neat and active academically.', '', '2018-03-28 10:34:36'),
(736, 0, '2017/2018', '2nd Term', 'RC0121', 'Oluwashetemipe is brilliant and always eager to learn', '', '2018-03-28 10:38:09'),
(737, 0, '2017/2018', '1st Term', 'RC0122', 'Victoria is intelligent and friendly, but needs more encouragement in her expression.', '', '2018-03-28 10:39:35'),
(738, 0, '2017/2018', '2nd Term', 'PG0594', 'Liam is friendly and has improved in his academic performance.', '', '2018-03-28 10:41:46'),
(739, 0, '2017/2018', '1st Term', 'RC0126', 'Damiloju is intelligent and friendly,she does her work cheerfully', '', '2018-03-28 10:49:51'),
(740, 0, '2017/2018', '2nd Term', 'RC0122', 'Victoria is intelligent, calm and always eager to learn.', '', '2018-03-28 10:50:48'),
(741, 0, '2017/2018', '2nd Term', 'PG0607', 'Tamilore is active and she is eager to learn.', '', '2018-03-28 10:53:59'),
(742, 0, '2017/2018', '2nd Term', 'RC0126', 'Damilojus performance this term is outstanding.keep the flag flying.', '', '2018-03-28 10:54:35'),
(743, 0, '2017/2018', '2nd Term', 'RC0128', 'Oluwatoyosi is intellient,brilliant and has the ability to do better next term', '', '2018-03-28 11:02:06'),
(744, 0, '2017/2018', '1st Term', 'PG0572', 'Franklin is loveable and very active in the class.', '', '2018-03-28 11:05:38'),
(745, 0, '2017/2018', '1st Term', 'RC0123', 'Joshua is intelligent and accomodating.He has postivie attitude towards learning.', '', '2018-03-28 11:07:28'),
(746, 0, '2017/2018', '2nd Term', 'PG0572', 'Fraklin is friendly and has positive attitude towards learning.', '', '2018-03-28 11:10:14'),
(747, 0, '2017/2018', '2nd Term', 'RC0123', 'Joshua is brilliant,calm and has interest in learning.', '', '2018-03-28 11:10:39'),
(748, 0, '2017/2018', '1st Term', 'RC0128', 'Oluwatoyosi isa smart boy and does his activies with joy.', '', '2018-03-28 11:11:13'),
(749, 0, '2017/2018', '2nd Term', 'RC0143', 'Joshua is intelligent,friendly and has ability to do better next term', '', '2018-03-28 11:17:37'),
(750, 0, '2017/2018', '1st Term', 'PG0617', 'Erere is very active and loveable', '', '2018-03-28 11:18:48'),
(751, 0, '2017/2018', '1st Term', 'RC0129', 'Paul is intelligent,friendly and arrives school  each day with a smile', '', '2018-03-28 11:23:01'),
(752, 0, '2017/2018', '2nd Term', 'RC0129', 'Pauls performance this term is outstanding', '', '2018-03-28 11:25:30'),
(753, 0, '2017/2018', '1st Term', 'RC0125', 'Morola is intelligent and friendly.She is always eager to do more task.', '', '2018-03-28 11:26:17'),
(754, 0, '2017/2018', '2nd Term', 'PG0610', 'Funmilola is friendly and always eager to learn.', '', '2018-03-28 11:27:14'),
(755, 0, '2017/2018', '2nd Term', 'RC0125', 'Morolas performance this term is outstanding.keep the flag flying.', '', '2018-03-28 11:27:55'),
(756, 0, '2017/2018', '2nd Term', 'PG0599', 'Anjolaoluwalaye has improved academically and he responds to question very well in class.', '', '2018-03-28 11:35:21'),
(757, 0, '2017/2018', '2nd Term', 'RC0141', 'Oluwatomi is brilliant,lovable and does his work with excitement.', '', '2018-03-28 11:35:38'),
(758, 0, '2017/2018', '2nd Term', 'RC0144', 'Jenrola is intelligent,friendly and has positive attitude towards learning.', '', '2018-03-28 11:36:04'),
(759, 0, '2017/2018', '1st Term', 'RC0127', 'zeeyad is brilliant and friendly.He arrives school each day with a smile.', '', '2018-03-28 11:46:36'),
(760, 0, '2017/2018', '1st Term', 'RC0130', 'Alex is intelligent,lovable and does his work cheerfully.', '', '2018-03-28 11:49:57'),
(761, 0, '2017/2018', '2nd Term', 'RC0127', 'zeeyad is intelligent,calm and always eagar to do more task.', '', '2018-03-28 11:51:28'),
(762, 0, '2017/2018', '2nd Term', 'RC0130', 'Alexander is an intelligent boy and has postive attitude towards learning.', '', '2018-03-28 11:53:01'),
(763, 0, '2017/2018', '1st Term', 'RC0132', 'Richard is brilliant and accomdating.He has ethusiasm for learning.', '', '2018-03-28 12:02:54'),
(764, 0, '2017/2018', '1st Term', 'RC0131', 'Jaden isintelligent,friendly and does his work with excitement', '', '2018-03-28 12:03:02'),
(765, 0, '2017/2018', '2nd Term', 'RC0131', 'Jaden is intelligent, friendly and has done greatly well this term.', '', '2018-03-28 12:06:45'),
(766, 0, '2017/2018', '2nd Term', 'RC0132', 'Richard is intelligent,calm and eager to do more task. keep the flag flying', '', '2018-03-28 12:07:13'),
(767, 0, '2017/2018', '1st Term', 'RC0137', 'Rachael is a good girl.She has ethusiasm for learning.', '', '2018-03-29 07:06:26'),
(768, 0, '2017/2018', '2nd Term', 'RC0142', 'Sholafunmi is intelligent,lovableand does her work with joy.', '', '2018-03-29 07:06:34'),
(769, 0, '2017/2018', '2nd Term', 'RC0137', 'Rachael is brilliant,accomodating,and has postive attitude towards learning..', '', '2018-03-29 07:10:34'),
(770, 0, '2017/2018', '1st Term', 'RC0133', 'Hephzibah is intelligent,and accomodating and has postive attitude towards learning .', '', '2018-03-29 07:19:31'),
(771, 0, '2017/2018', '1st Term', 'RC0138', 'Araoluwa is an intelligent girl.She is always learn.', '', '2018-03-29 07:19:54'),
(772, 0, '2017/2018', '2nd Term', 'RC0133', 'Hephzibah is a good girl and does her work with excitement.', '', '2018-03-29 07:22:13'),
(773, 0, '2017/2018', '2nd Term', 'RC0138', 'Araoluwa is friendly and does her work cheerfully.', '', '2018-03-29 07:24:17'),
(774, 0, '2017/2018', '2nd Term', 'RC0140', 'Adebares academic performance has greatly improved this term.', '', '2018-03-29 07:31:22'),
(775, 0, '2017/2018', '1st Term', 'RC0139', 'Godwin is intelligent and loveable,though needs more encouragement.', '', '2018-03-29 07:32:05'),
(776, 0, '2017/2018', '2nd Term', 'RC0139', 'Godwin is friendly and has improved greatly academically.', '', '2018-03-29 07:34:55'),
(777, 0, '2017/2018', '1st Term', 'RC0140', 'Adebare is brilliant and lovable but needs encouragement from home.', '', '2018-03-29 07:35:02'),
(778, 0, '2018/2019', '1st Term', 'PG0599', 'Anjola is brilliant and friendly. He always responds positively towards learning.', '', '2018-03-31 12:07:00'),
(779, 0, '2017/2018', '3rd Term', 'GD6097', 'This is a very good performance. More work to be done in Literacy and Numeracy.', 'midterm', '2018-04-11 08:52:20'),
(780, 0, '2017/2018', '3rd Term', 'GD6097', 'Nifemi has improved alot. Wishing her greater height in the new level of academics.', 'terminal', '2018-04-11 08:56:58'),
(781, 0, '2017/2018', '1st Term', 'GD13333', 'good', 'midterm', '2018-04-11 13:55:16'),
(782, 0, '2017/2018', '1st Term', 'GD13333', 'great', 'terminal', '2018-04-11 13:56:11'),
(783, 0, '2017/2018', '1st Term', 'HCS88473q', 'Great', 'fullterm', '2018-04-12 11:57:50'),
(784, 0, '2018/2019', '1st Term', 'GD13333', '', 'midterm', '2018-04-12 16:33:53'),
(785, 0, '2018/2019', '1st Term', 'GD5285', '', 'midterm', '2018-04-12 16:46:00'),
(786, 0, '2018/2019', '1st Term', 'GD5285', '', 'terminal', '2018-04-12 16:46:54'),
(787, 0, '1st Term', 'RC0142', '', '', '2017/2018', '2018-04-12 17:31:59'),
(788, 0, '2017/2018', '3rd Term', 'GD3154', 'A GOOD RESULT', 'midterm', '2018-04-13 13:23:02'),
(789, 0, '2017/2018', '3rd Term', 'GD3154', 'A good result. keep it up in the next class', 'terminal', '2018-04-13 13:24:37'),
(790, 0, '2018/2019', '1st Term', 'GD6097', '', 'midterm', '2018-04-13 15:46:18'),
(791, 0, '2018/2019', '1st Term', 'GD6097', '', 'terminal', '2018-04-13 15:46:51'),
(792, 0, '2018/2019', '1st Term', 'NR2456', '', 'fullterm', '2018-04-19 11:08:01'),
(793, 0, '2018/2019', '3rd Term', 'NR1596', '', '', '2018-04-19 14:51:26'),
(794, 0, '2018/2019', '3rd Term', 'PG0599', '', '', '2018-04-19 14:54:42'),
(795, 0, '2018/2019', '3rd Term', 'RC0530', '', '', '2018-04-19 14:56:15'),
(796, 0, '2018/2019', '3rd Term', 'NR2456', '', 'fullterm', '2018-04-19 14:57:54'),
(797, 0, '2017/2018', '1st Term', 'NR1596', '', '', '2018-04-19 15:30:34'),
(798, 0, '2017/2018', '3rd Term', 'JS12345', 'Test\'s performance has greatly improved this term.', 'terminal', '2018-04-22 16:44:58'),
(799, 0, '2018/2019', '3rd Term', 'TST12345', '', 'terminal', '2018-05-10 12:06:04'),
(800, 0, '2018/2019', '1st Term', 'TEST1111', 'Great result. ', 'midterm', '2018-06-04 08:36:56'),
(801, 0, '2018/2019', '1st Term', 'TEST1111', 'You can do better.', 'terminal', '2018-06-04 08:37:29'),
(802, 0, '2018/2019', '1st Term', 'TEST112', 'Good', 'midterm', '2018-06-04 08:38:59'),
(803, 0, '2018/2019', '1st Term', 'TEST112', 'Excellent', 'terminal', '2018-06-04 08:39:23'),
(804, 0, '2017/2018', '3rd Term', 'NR2527', 'Kanyinsola did well in her test. Keep the spirit up.', 'midterm', '2018-06-05 06:53:20'),
(805, 0, '2017/2018', '3rd Term', 'NR2322', 'Surefunmi did her best in the test. Brace up in the exams.', 'midterm', '2018-06-05 06:59:51'),
(806, 0, '2017/2018', '3rd Term', 'NR2418', 'Zino has done her best in the test. She needs to be encouraged.', 'midterm', '2018-06-05 07:05:17'),
(807, 0, '2017/2018', '3rd Term', 'NR2581', 'Ola has done his best. He needs to be encouraged.', 'midterm', '2018-06-05 07:08:33'),
(808, 0, '2017/2018', '3rd Term', 'NR2388', 'Toluwanimi has earned a good grade. Keep it up.', 'midterm', '2018-06-05 07:15:02'),
(813, 0, '2017/2018', '3rd Term', 'NR2408', 'Timilehin\'s score has shown his effort in the test. Keep it up.', 'midterm', '2018-06-05 07:20:53'),
(814, 0, '2017/2018', '3rd Term', 'NR2360', 'Alex\'s performance has shown his effort in the test. Keep the flag flying.', 'midterm', '2018-06-05 07:26:33'),
(815, 0, '2017/2018', '3rd Term', 'NR2369', 'Sharon has a great pontential in learning. Keep the spirit up.', 'midterm', '2018-06-05 07:30:58'),
(816, 0, '2017/2018', '3rd Term', 'NR2346', 'Corey has done his best in the test. He just needs to work on the weak subject. Well done.', 'midterm', '2018-06-05 07:38:03'),
(817, 0, '2017/2018', '3rd Term', 'NR2597', 'Nelson has done his best in the test. He needs to work on his spelling and reading skills.', 'midterm', '2018-06-05 07:42:32'),
(818, 0, '2017/2018', '3rd Term', 'NR2516', 'Oluwabiyi\'s performance is very impressive. Please keep the flag flying. Do not relent.', 'midterm', '2018-06-05 07:47:39'),
(819, 0, '2017/2018', '3rd Term', 'NR2624', 'Rimimola has done his best in the test. He needs to work on his reading and spellings.', 'midterm', '2018-06-05 07:58:14'),
(820, 0, '2017/2018', '3rd Term', 'NR2413', 'Tolu has done his best in this test. He needs to be encouraged.', 'midterm', '2018-06-05 08:04:21'),
(821, 0, '2017/2018', '3rd Term', 'NR2456', 'She should be given every encouragement to keep the flag high.', 'midterm', '2018-06-05 08:05:17'),
(823, 0, '2017/2018', '3rd Term', 'NR2391', 'Ifeoluwadunsi has great pontentials in learning. He needs to be encouraged.', 'midterm', '2018-06-05 08:18:46'),
(828, 0, '2017/2018', '3rd Term', 'NR2329', 'I feel confident that Damilare will continue to give his best effort.', 'midterm', '2018-06-05 08:31:10'),
(829, 0, '2017/2018', '3rd Term', 'NR2321', 'You are a future challenger. Keep up the good work.', 'midterm', '2018-06-05 08:38:09');
INSERT INTO `teacherscomment` (`id`, `teacherid`, `session`, `term`, `studentid`, `comment`, `resulttype`, `dateadded`) VALUES
(830, 0, '2017/2018', '1st Term', 'TEST1111', 'greate result', 'terminal', '2018-06-05 10:41:27'),
(831, 0, '2017/2018', '3rd Term', 'GD1327', 'This is a very good performance. Keep it up.', 'midterm', '2018-06-05 13:41:07'),
(833, 0, '2017/2018', '3rd Term', 'GD1261', 'This is a good result. Do not relent.', 'midterm', '2018-06-05 13:49:49'),
(834, 0, '2018/2019', '3rd Term', 'GD1527', 'Good result.', 'midterm', '2018-06-05 13:53:33'),
(836, 0, '2017/2018', '3rd Term', 'GD1582', 'This is certainly not your best, you can do better. Keep it up.', 'midterm', '2018-06-05 13:55:23'),
(838, 0, '2017/2018', '3rd Term', 'GD2593', 'Esther has got a good result, do not relent.', 'midterm', '2018-06-05 13:56:42'),
(840, 0, '2018/2019', '3rd Term', 'GD1565', 'Good result.', 'midterm', '2018-06-05 13:59:22'),
(865, 0, '2017/2018', '3rd Term', 'GD1438', 'This is certainly not your best, you can do better.', 'midterm', '2018-06-05 14:02:19'),
(866, 0, '2017/2018', '3rd Term', 'GD2553', 'A very good performance.', 'midterm', '2018-06-05 14:02:30'),
(867, 0, '2017/2018', '3rd Term', 'GD4201', 'FOYINSOLA HAS PERFORMED WELL.', 'midterm', '2018-06-05 14:02:47'),
(868, 0, '2018/2019', '3rd Term', 'GD1558', 'Good performance.', 'midterm', '2018-06-05 14:03:58'),
(869, 0, '2017/2018', '3rd Term', 'GD1612', 'You are the best. Keep up the good work.', 'midterm', '2018-06-05 14:05:36'),
(870, 0, '2017/2018', '3rd Term', 'GD4162', 'AYOMIPO HAS DONE WELL.', 'midterm', '2018-06-05 14:06:01'),
(872, 0, '2017/2018', '3rd Term', 'GD2280', 'An excellent performance.', 'midterm', '2018-06-05 14:08:24'),
(873, 0, '2017/2018', '3rd Term', 'GD2531', 'This is a good  result, keep working at it.', 'midterm', '2018-06-05 14:09:24'),
(874, 0, '2018/2019', '3rd Term', 'GD1462', 'Good performance.', 'midterm', '2018-06-05 14:11:26'),
(875, 0, '2017/2018', '3rd Term', 'GD4496', 'MAYOMIKUN\'S PERFORMANCE HAS IMPROVED.', 'midterm', '2018-06-05 14:11:34'),
(876, 0, '2017/2018', '3rd Term', 'GD2234', 'A very good performance.', 'midterm', '2018-06-05 14:14:04'),
(877, 0, '2017/2018', '3rd Term', 'GD4184', 'DIVINE HAS DONE WELL', 'midterm', '2018-06-05 14:14:48'),
(878, 0, '2017/2018', '3rd Term', 'GD1620', 'This is certainly not your best, you can do better.', 'midterm', '2018-06-05 14:15:31'),
(880, 0, '2017/2018', '3rd Term', 'GD2437', 'Modesire is really improving by the day.', 'midterm', '2018-06-05 14:17:21'),
(881, 0, '2018/2019', '3rd Term', 'GD1311', 'Good performance', 'midterm', '2018-06-05 14:17:52'),
(882, 0, '2017/2018', '3rd Term', 'GD4463', 'GOLD KEEPS IMPROVING BY THE DAY.', 'midterm', '2018-06-05 14:18:49'),
(883, 0, '2017/2018', '3rd Term', 'GD2432', 'An excellent performance.', 'midterm', '2018-06-05 14:19:10'),
(901, 0, '2017/2018', '3rd Term', 'GD4478', 'DANIEL KEEPS IMPROVING BY THE DAY', 'midterm', '2018-06-05 14:21:34'),
(917, 0, '2017/2018', '3rd Term', 'GD2107', 'Amir has really done well, do not relent.', 'midterm', '2018-06-05 14:23:11'),
(924, 0, '2017/2018', '3rd Term', 'GD1578', 'This is certainly not your best, do not relent.', 'midterm', '2018-06-05 14:26:08'),
(925, 0, '2017/2018', '3rd Term', 'GD4439', 'TUNBUYI IS  A GOAL GETTER', 'midterm', '2018-06-05 14:26:20'),
(926, 0, '2017/2018', '3rd Term', 'GD2485', 'Eriifeoluwa is making good progress, keep it up.', 'midterm', '2018-06-05 14:26:56'),
(930, 0, '2017/2018', '3rd Term', 'GD2278', 'An excellent performance.', 'midterm', '2018-06-05 14:29:33'),
(936, 0, '2017/2018', '3rd Term', 'GD4248', 'YANMIFE HAS DONE VERY WELL.', 'midterm', '2018-06-05 14:31:30'),
(937, 0, '2018/2019', '3rd Term', 'GD1304', 'Great performance.', 'midterm', '2018-06-05 14:31:34'),
(944, 0, '2017/2018', '3rd Term', 'GD2567', 'A very good performance.', 'midterm', '2018-06-05 14:33:46'),
(945, 0, '2017/2018', '3rd Term', 'GD1287', 'This is a very good performance. Do not relent.', 'midterm', '2018-06-05 14:33:58'),
(946, 0, '2017/2018', '3rd Term', 'GD2303', 'Aderinsola is making great effort and she has done well.', 'midterm', '2018-06-05 14:34:12'),
(947, 0, '2017/2018', '3rd Term', 'GD4158', 'FIKUNMI IS A GOAL GETTER', 'midterm', '2018-06-05 14:34:19'),
(949, 0, '2017/2018', '3rd Term', 'GD2342', 'An excellent performance. ', 'midterm', '2018-06-05 14:38:19'),
(953, 0, '2017/2018', '3rd Term', 'GD2194', 'This is a very good result, keep trying. ', 'midterm', '2018-06-05 14:40:38'),
(954, 0, '2017/2018', '3rd Term', 'GD1527', 'Good performance.', 'midterm', '2018-06-05 14:41:02'),
(955, 0, '2017/2018', '3rd Term', 'GD1331', 'A very good performance, do not relent.', 'midterm', '2018-06-05 14:41:12'),
(956, 0, '2017/2018', '3rd Term', 'GD4014', 'KOFO NEEDS TO BUCKLE UP', 'midterm', '2018-06-05 14:41:49'),
(957, 0, '2017/2018', '3rd Term', 'GD2338', 'An excellent performance. ', 'midterm', '2018-06-05 14:42:26'),
(960, 0, '2017/2018', '3rd Term', 'GD4416', 'KEHINDE HAS REALLY DONE WELL', 'midterm', '2018-06-05 14:45:05'),
(961, 0, '2017/2018', '3rd Term', 'GD1565', 'Great performance.', 'midterm', '2018-06-05 14:45:18'),
(962, 0, '2017/2018', '3rd Term', 'GD2497', 'An excellent performance. ', 'midterm', '2018-06-05 14:47:00'),
(963, 0, '2017/2018', '3rd Term', 'GD2232', 'This is a very good result, keep working at it. ', 'midterm', '2018-06-05 14:47:48'),
(964, 0, '2017/2018', '3rd Term', 'GD4587', 'DARASIMI HAS DONE WELL', 'midterm', '2018-06-05 14:48:39'),
(965, 0, '2017/2018', '3rd Term', 'GD1353', 'A  very good result, keep it up.', 'midterm', '2018-06-05 14:49:33'),
(966, 0, '2017/2018', '3rd Term', 'GD2579', 'An excellent performance. ', 'midterm', '2018-06-05 14:49:56'),
(967, 0, '2017/2018', '3rd Term', 'GD1558', 'Good result.', 'midterm', '2018-06-05 14:50:24'),
(968, 0, '2017/2018', '3rd Term', 'GD4584', 'ISAAC KEEPS IMPROVING BY THE DAY', 'midterm', '2018-06-05 14:51:31'),
(969, 0, '2017/2018', '3rd Term', 'GD2509', '', 'midterm', '2018-06-05 14:52:20'),
(971, 0, '2017/2018', '3rd Term', 'GD2292', 'An excellent performance. ', 'midterm', '2018-06-05 14:53:59'),
(973, 0, '2017/2018', '3rd Term', 'GD4305', 'NIFEMI IS A GOAL GETTER', 'midterm', '2018-06-05 14:54:29'),
(975, 0, '2017/2018', '3rd Term', 'GD1462', 'Good performance.', 'midterm', '2018-06-05 14:55:48'),
(976, 0, '2017/2018', '3rd Term', 'GD1419', 'Good performance.', 'midterm', '2018-06-05 14:56:05'),
(977, 0, '2017/2018', '3rd Term', 'GD2524', 'This is a good result, keep it up. ', 'midterm', '2018-06-05 14:56:44'),
(978, 0, '2017/2018', '3rd Term', 'GD2269', 'An excellent performance. ', 'midterm', '2018-06-05 14:58:10'),
(979, 0, '2017/2018', '3rd Term', 'GD4213', 'TIMILEHIN NEEDS TO WORK MORE', 'midterm', '2018-06-05 14:58:17'),
(980, 0, '2017/2018', '3rd Term', 'GD1498', 'Irewolede, you are the best. Keep the candle burning.', 'midterm', '2018-06-05 14:59:14'),
(981, 0, '2017/2018', '3rd Term', 'GD1311', 'This is a wonderful performance. Keep it up.', 'midterm', '2018-06-05 15:00:34'),
(982, 0, '2017/2018', '3rd Term', 'GD4117', 'PRAISE IS A GOAL GETTER', 'midterm', '2018-06-05 15:01:00'),
(983, 0, '2017/2018', '3rd Term', 'GD2282', 'An excellent performance. ', 'midterm', '2018-06-05 15:02:02'),
(984, 0, '2017/2018', '3rd Term', 'GD2542', 'Inioluwa is making good progress, do not relent. ', 'midterm', '2018-06-05 15:02:12'),
(986, 0, '2017/2018', '3rd Term', 'GD2466', 'An excellent performance. ', 'midterm', '2018-06-05 15:04:55'),
(987, 0, '2017/2018', '3rd Term', 'GD2223', 'Good result, keep it up. ', 'midterm', '2018-06-05 15:05:12'),
(988, 0, '2017/2018', '3rd Term', 'GD1304', 'Great performance.', 'midterm', '2018-06-05 15:05:34'),
(989, 0, '2017/2018', '3rd Term', 'GD1410', 'Great performance. Keep it up.', 'midterm', '2018-06-05 15:08:40'),
(990, 0, '2017/2018', '3rd Term', 'GD2539', 'An excellent performance. ', 'midterm', '2018-06-05 15:09:02'),
(991, 0, '2017/2018', '3rd Term', 'GD2590', 'Oladotun  has done greatly, keep it up. ', 'midterm', '2018-06-05 15:10:13'),
(992, 0, '2017/2018', '3rd Term', 'GD1296', 'Good result.', 'midterm', '2018-06-05 15:10:34'),
(994, 0, '2017/2018', '3rd Term', 'GD4157', '', 'midterm', '2018-06-05 15:11:24'),
(995, 0, '2017/2018', '3rd Term', 'GD1441', 'Good performance.', 'midterm', '2018-06-05 15:12:26'),
(996, 0, '2017/2018', '3rd Term', 'NR2537', 'This is a very good result. Keep it up.', 'midterm', '2018-06-06 06:49:50'),
(997, 0, '2017/2018', '3rd Term', 'GD4595', 'Brilliant performance, Joseph needs to work harder on his handwritting.', 'midterm', '2018-06-06 06:52:53'),
(998, 0, '2017/2018', '3rd Term', 'NR2382', 'Somto should put more effort in her weak subject.', 'midterm', '2018-06-06 06:56:52'),
(999, 0, '2017/2018', '3rd Term', 'GD4070', 'Brilliant result, keep it up my dear.', 'midterm', '2018-06-06 06:58:32'),
(1000, 0, '2017/2018', '3rd Term', 'NR2489', 'My dear, keep up the good work.', 'midterm', '2018-06-06 07:01:46'),
(1002, 0, '2017/2018', '3rd Term', 'GD4087', 'Brilliant result, keep it up my dear.', 'midterm', '2018-06-06 07:04:58'),
(1003, 0, '2017/2018', '3rd Term', 'NR2568', 'This is a very good result . Keep it up.', 'midterm', '2018-06-06 07:05:10'),
(1007, 0, '2017/2018', '3rd Term', 'NR2547', 'Moyato should be given every encouragement to keep the flag high.', 'midterm', '2018-06-06 07:09:45'),
(1008, 0, '2017/2018', '3rd Term', 'GD4415', 'Excellent result, keep it up.', 'midterm', '2018-06-06 07:09:47'),
(1009, 0, '2017/2018', '3rd Term', 'NR2430', 'This is a very good result. Keep it up.', 'midterm', '2018-06-06 07:13:13'),
(1010, 0, '2017/2018', '3rd Term', 'GD4152', 'Brilliant result, keep it up my dear.', 'midterm', '2018-06-06 07:16:06'),
(1011, 0, '2017/2018', '3rd Term', 'NR2611', 'This is a good result. Put more effort in your weak subject.', 'midterm', '2018-06-06 07:18:05'),
(1012, 0, '2017/2018', '3rd Term', 'GD4207', 'Brilliant result, keep it up my dear.', 'midterm', '2018-06-06 07:21:31'),
(1013, 0, '2017/2018', '3rd Term', 'NR2345', 'Joshua should put more effort in reading.', 'midterm', '2018-06-06 07:22:23'),
(1014, 0, '2017/2018', '3rd Term', 'NR2359', 'This is a very good result. Keep it up.', 'midterm', '2018-06-06 07:25:26'),
(1015, 0, '2017/2018', '3rd Term', 'GD4472', 'Brilliant result, keep it up my dear.', 'midterm', '2018-06-06 07:26:49'),
(1016, 0, '2017/2018', '3rd Term', 'NR2386', 'Keep up the good work my dear.', 'midterm', '2018-06-06 07:28:47'),
(1017, 0, '2017/2018', '3rd Term', 'GD4479', 'Brilliant performance, keep it up my dear.', 'midterm', '2018-06-06 07:31:37'),
(1022, 0, '2017/2018', '3rd Term', 'GD4252', 'Brilliant performance, work harder on your weak subject.', 'midterm', '2018-06-06 07:37:50'),
(1026, 0, '2017/2018', '3rd Term', 'GD4104', 'Brilliant performance, keep it up my dear.', 'midterm', '2018-06-06 07:43:47'),
(1027, 0, '2017/2018', '3rd Term', 'GD2193', 'VERY GOOD. ', 'midterm', '2018-06-06 13:44:49'),
(1028, 0, '2017/2018', '3rd Term', 'GD2188', 'This is a good result, keep working at it. ', 'midterm', '2018-06-06 13:49:55'),
(1029, 0, '2017/2018', '3rd Term', 'GD2352', 'This is a very beautiful result, keep the flag high. ', 'midterm', '2018-06-06 13:53:12'),
(1031, 0, '2017/2018', '3rd Term', 'GD2395', 'This is a good result, do not relent your effort. ', 'midterm', '2018-06-06 13:56:54'),
(1032, 0, '2018/2019', '3rd Term', 'GD3561', '', 'midterm', '2018-06-06 13:58:57'),
(1041, 0, '2017/2018', '3rd Term', 'GD3592', 'A GOOD RESULT', 'midterm', '2018-06-06 14:00:02'),
(1042, 0, '2017/2018', '3rd Term', 'GD1495', 'Great performance. Keep it up.', 'midterm', '2018-06-06 14:00:10'),
(1045, 0, '2017/2018', '3rd Term', 'GD2229', 'This is a good result. ', 'midterm', '2018-06-06 14:00:25'),
(1046, 0, '2017/2018', '3rd Term', 'GD4510', 'ERINAYO KEEPS IMPROVING BY THE DAY', 'midterm', '2018-06-06 14:03:15'),
(1047, 0, '2017/2018', '3rd Term', 'GD3561', 'MOYOSORE HAS IMPROVED THIS TERM.', 'midterm', '2018-06-06 14:04:39'),
(1048, 0, '2017/2018', '3rd Term', 'GD3428', 'THIS IS A GOOD RESULT.KEEP IT UP.', 'midterm', '2018-06-06 14:04:54'),
(1049, 0, '2017/2018', '3rd Term', 'GD3574', 'JOMILOJU HAS IMPROVED THIS TERM, KEEP IT UP.', 'midterm', '2018-06-06 14:08:35'),
(1050, 0, '2017/2018', '3rd Term', 'GD3615', 'WORK HARDER TO IMPROVE YOUR GRADES', 'midterm', '2018-06-06 14:11:21'),
(1051, 0, '2017/2018', '3rd Term', 'GD3474', 'CHUKUMA HAS AN EXCELLENT RESULT, KEEP IT UP.', 'midterm', '2018-06-06 14:13:53'),
(1060, 0, '2017/2018', '3rd Term', 'GD3403', 'THIS IS A GOOD RESULT.', 'midterm', '2018-06-06 14:14:44'),
(1063, 0, '2017/2018', '3rd Term', 'GD3134', 'SIMILOLUWA HAS AN EXCELLENT RESULT.', 'midterm', '2018-06-06 14:19:52'),
(1064, 0, '2017/2018', '3rd Term', 'GD3566', 'A GOOD RESULT.KEEP WORKING AT IT.', 'midterm', '2018-06-06 14:20:34'),
(1065, 0, '2017/2018', '3rd Term', 'GD3250', 'A GOOD RESULT.', 'midterm', '2018-06-06 14:26:18'),
(1066, 0, '2017/2018', '3rd Term', 'GD3536', 'OREOLUWA HAS IMPROVED THIS TERM. KEEP IT UP.', 'midterm', '2018-06-06 14:30:04'),
(1067, 0, '2017/2018', '3rd Term', 'GD3293', 'A GOOD RESULT.', 'midterm', '2018-06-06 14:30:23'),
(1068, 0, '2017/2018', '3rd Term', 'GD3173', 'DIVINE HAS A GREAT RESULT.', 'midterm', '2018-06-06 14:32:58'),
(1069, 0, '2017/2018', '3rd Term', 'GD3096', 'A GOOD RESULT. ', 'midterm', '2018-06-06 14:33:37'),
(1070, 0, '2017/2018', '3rd Term', 'GD3241', 'TOCHI HAS AN EXCELLENT RESULT. KEEP IT UP.', 'midterm', '2018-06-06 14:35:55'),
(1071, 0, '2017/2018', '3rd Term', 'GD3163', 'AN EXCELLENT RESULT.', 'midterm', '2018-06-06 14:37:06'),
(1072, 0, '2017/2018', '3rd Term', 'GD3206', 'TENIOLA HAS AN EXCELLENT RESULT. KEEP IT UP.', 'midterm', '2018-06-06 14:38:54'),
(1073, 0, '2017/2018', '3rd Term', 'GD3563', 'FIKAYO HAS IMPROVED THIS TERM.', 'midterm', '2018-06-06 14:41:11'),
(1074, 0, '2017/2018', '3rd Term', 'GD3424', 'A GOOD RESULT.', 'midterm', '2018-06-06 14:41:28'),
(1075, 0, '2017/2018', '3rd Term', 'GD3493', 'MOFESADE HAS A GREAT RESULT.', 'midterm', '2018-06-06 14:44:03'),
(1076, 0, '2017/2018', '3rd Term', 'GD3286', 'A GOOD RESULT', 'midterm', '2018-06-06 14:46:24'),
(1077, 0, '2017/2018', '3rd Term', 'GD3591', 'AYOMIDE HAS REALLY IMPROVED THIS TERM.KEEP IT UP.', 'midterm', '2018-06-06 14:48:19'),
(1078, 0, '2017/2018', '3rd Term', 'GD3064', 'FIYINFOLUWA HAS A GREAT RESULT.', 'midterm', '2018-06-06 14:51:17'),
(1079, 0, '2017/2018', '3rd Term', 'GD3562', 'A GOOD RESULT.', 'midterm', '2018-06-06 14:51:27'),
(1080, 0, '2017/2018', '3rd Term', 'GD3160', 'INIOLUWA HAS A GREAT RESULT. ', 'midterm', '2018-06-06 14:54:24'),
(1081, 0, '2017/2018', '3rd Term', 'GD3089', 'DAVID HAS A GOOD RESULT. KEEP IMPROVING.', 'midterm', '2018-06-06 14:57:55'),
(1082, 0, '2018/2019', '1st Term', 'GD4476', 'A good performance. keep it up.', 'midterm', '2018-06-07 10:50:47'),
(1083, 0, '2018/2019', '1st Term', 'GD4197', 'Good result, keep working on your weak subjects.', 'midterm', '2018-06-07 10:58:28'),
(1084, 0, '2018/2019', '1st Term', 'GD4146', 'Good result, keep working on your weak subjects.', 'midterm', '2018-06-07 11:01:51'),
(1085, 0, '2018/2019', '1st Term', 'GD4219', 'A good performance. Do not relent.', 'midterm', '2018-06-07 11:06:15'),
(1086, 0, '2018/2019', '1st Term', 'GD4444', 'Work harder to improve your grades.', 'midterm', '2018-06-07 11:12:05'),
(1087, 0, '2017/2018', '3rd Term', 'GD4476', 'A good result, keep it up.', 'midterm', '2018-06-07 11:24:38'),
(1088, 0, '2017/2018', '3rd Term', 'GD4197', 'Good result,keep it up.', 'midterm', '2018-06-07 11:27:52'),
(1089, 0, '2017/2018', '3rd Term', 'GD4219', 'Brilliant performance, keep it up my dear.', 'midterm', '2018-06-07 11:34:32'),
(1090, 0, '2017/2018', '3rd Term', 'GD4146', 'Good result, keep working on your weak subjects.', 'midterm', '2018-06-07 11:38:03'),
(1098, 0, '2017/2018', '3rd Term', 'GD6486', 'A good performance but you really need to work harder in those subjects you are weak.', 'midterm', '2018-06-07 12:11:07'),
(1099, 0, '2017/2018', '3rd Term', 'GD6025', 'This is a very good performance but you should work harder for the examination.', 'midterm', '2018-06-07 12:15:42'),
(1100, 0, '2017/2018', '3rd Term', 'GD6053', 'This is a very great improvement on your performance. Keep it up.', 'midterm', '2018-06-07 12:19:38'),
(1101, 0, '2017/2018', '3rd Term', 'GD6627', 'A good performance. Please work harder on those weak areas.', 'midterm', '2018-06-07 12:31:51'),
(1102, 0, '2017/2018', '3rd Term', 'GD5545', 'A good performance Hadrian. Keep it up.', 'midterm', '2018-06-07 12:32:06'),
(1103, 0, '2017/2018', '3rd Term', 'GD5564', 'Do not relent and put in more effort.', 'midterm', '2018-06-07 12:36:00'),
(1104, 0, '2017/2018', '3rd Term', 'GD5576', 'Keep up the momentum.', 'midterm', '2018-06-07 12:39:47'),
(1105, 0, '2017/2018', '3rd Term', 'GD2586', 'An excellent performance.', 'midterm', '2018-06-08 07:07:14'),
(1107, 0, '2017/2018', '3rd Term', 'GD5426', 'Motun should not relent.  Work harder.', 'midterm', '2018-06-08 07:21:46'),
(1108, 0, '2017/2018', '3rd Term', 'GD5012', 'Apade, do not relent. You can do better.', 'midterm', '2018-06-08 07:28:10'),
(1110, 0, '2017/2018', '3rd Term', 'GD5417', 'Keep up the momentum.', 'midterm', '2018-06-08 07:34:03'),
(1111, 0, '2017/2018', '3rd Term', 'GD5619', 'Toluwani needs to work harder for better grades.', 'midterm', '2018-06-08 07:38:16'),
(1112, 0, '2017/2018', '3rd Term', 'GD5583', 'Mueezat needs to work harder for better grades.', 'midterm', '2018-06-08 07:42:08'),
(1113, 0, '2017/2018', '3rd Term', 'GD5571', 'Dami needs to work harder for better grades.', 'midterm', '2018-06-08 07:49:28'),
(1114, 0, '2017/2018', '3rd Term', 'GD5239', 'Keep up the momentum.', 'midterm', '2018-06-08 07:58:33'),
(1115, 0, '2017/2018', '3rd Term', 'GD5538', 'Solomon needs to work harder.', 'midterm', '2018-06-08 08:03:22'),
(1116, 0, '2017/2018', '3rd Term', 'GD5285', 'Damilola needs to work harder to improve her grades.', 'midterm', '2018-06-08 08:07:23'),
(1117, 0, '2017/2018', '3rd Term', 'GD5435', 'Keep up the momentum and work harder.', 'midterm', '2018-06-08 08:13:23'),
(1118, 0, '2017/2018', '3rd Term', 'GD5290', 'Keep up the momentum and work harder.', 'midterm', '2018-06-08 08:17:01'),
(1122, 0, '2017/2018', '3rd Term', 'GD5523', 'Keep working harder and do not relent.', 'midterm', '2018-06-08 08:22:50'),
(1126, 0, '2017/2018', '3rd Term', 'GD5618', 'Keep up the momentum and work harder.', 'midterm', '2018-06-08 08:31:04'),
(1142, 0, '2017/2018', '3rd Term', 'GD5065', 'Jeremiah needs to work harder for better grades.', 'midterm', '2018-06-08 08:50:01'),
(1143, 0, '2017/2018', '3rd Term', 'RC0530', ' Ireayomi is an intelligent boy. He is always eager to learn.', '', '2018-07-09 11:06:07'),
(1144, 0, '2017/2018', '3rd Term', 'PG0626', 'Michael is very active and  eager to learn. ', '', '2018-07-09 11:07:40'),
(1147, 0, '2017/2018', '3rd Term', 'RC0121', 'Shetemipe is brilliant, friendly and does his work with excitement.', '', '2018-07-09 11:19:48'),
(1148, 0, '3rd Term', 'RC0530', '', '', '2017/2018', '2018-07-09 11:20:05'),
(1154, 0, '3rd Term', 'RC0530', 'Ireayomi i', '', '2017/2018', '2018-07-09 11:21:33'),
(1156, 0, '2017/2018', '3rd Term', 'RC0585', 'Gertrude is brilliant, friendly and always happy to be in school.', '', '2018-07-09 11:24:22'),
(1158, 0, '3rd Term', 'RC0585', 'Gertrude i', '', '2017/2018', '2018-07-09 11:29:44'),
(1159, 0, '3rd Term', 'RC0585', 'Gertrudef ', '', '2017/2018', '2018-07-09 11:29:52'),
(1160, 0, '2017/2018', '3rd Term', 'PG0599', 'Anjolaoluwalaye is always responsive during class activities. He has performed very well.', '', '2018-07-09 11:30:01'),
(1170, 0, '2017/2018', '3rd Term', 'RC0122', 'Victoria is an intelligent girl. She loves to participate in the class.', '', '2018-07-09 11:37:51'),
(1171, 0, '2017/2018', '3rd Term', 'RC0126', 'Damiloju is intelligent, loveable and has shown self confidence in writing. ', '', '2018-07-09 11:42:19'),
(1172, 0, '2017/2018', '3rd Term', 'PG0575', 'Samuel is brillant and loves participating in class.', '', '2018-07-09 11:43:21'),
(1173, 0, '2017/2018', '3rd Term', 'RC0128', 'Olatoyosi is brilliant and vocal.', '', '2018-07-09 11:46:19'),
(1176, 0, '2017/2018', '3rd Term', 'RC0143', 'Joshua is brilliant, friendly and always eager to do more task. Keep the flag flying.', '', '2018-07-09 11:57:02'),
(1177, 0, '2017/2018', '3rd Term', 'PG0594', ' Liam is intelligent. He responds to questions very well in the class.', '', '2018-07-09 11:57:04'),
(1178, 0, '2017/2018', '3rd Term', 'RC0129', 'Paul is academically and socially good. ', '', '2018-07-09 11:58:45'),
(1186, 0, '2017/2018', '3rd Term', 'RC0141', 'Oluwatomi is intelligent and accomodating. He has done well this term.', '', '2018-07-09 12:11:17'),
(1192, 0, '2017/2018', '3rd Term', 'RC0123', 'Joshua is brilliant, calm and needs to be more active in class..', '', '2018-07-09 12:15:35'),
(1206, 0, '2017/2018', '3rd Term', 'RC0125', 'Morolaoluwa is intelligent, friendly and has shown self confidence in writing.', '', '2018-07-09 12:25:16'),
(1207, 0, '2017/2018', '3rd Term', 'RC0130', 'Alexandria has greatly improved in his academics this term.', '', '2018-07-09 12:27:46'),
(1208, 0, '2017/2018', '3rd Term', 'PG0607', 'Tamilore is intelligent and accommodating.', '', '2018-07-09 12:30:00'),
(1209, 0, '2017/2018', '3rd Term', 'RC0144', 'Jenrola is friendly and her academic performance has greatly improved.', '', '2018-07-09 12:32:09'),
(1212, 0, '2017/2018', '3rd Term', 'PG0572', 'Franklin is intelligent and has improved in his academic performance.', '', '2018-07-09 12:38:57'),
(1213, 0, '2017/2018', '3rd Term', 'RC0127', 'Zeeyad is intelligent and calm. He participates well in class.', '', '2018-07-09 12:43:23'),
(1215, 0, '2017/2018', '3rd Term', 'PG0617', 'Erere is calm and has greatly improved in his academic performance.', '', '2018-07-09 12:48:12'),
(1227, 0, '3rd Term', 'RC0130', 'Alexandria', '', '2017/2018', '2018-07-09 12:57:05'),
(1228, 0, '2017/2018', '3rd Term', 'PG0610', 'Funmilola is friendly. He responds to questions in class.', '', '2018-07-09 12:57:27'),
(1232, 0, '2017/2018', '3rd Term', 'RC0131', 'Jaden is brilliant and calm. ', '', '2018-07-09 13:01:23'),
(1234, 0, '2017/2018', '3rd Term', 'RC0142', 'Sholafunmi is briiliant, calm and has improved greatly in her academics.', '', '2018-07-10 11:36:07'),
(1235, 0, '2017/2018', '3rd Term', 'NR1596', 'Naomi is good academically and friendly.', '', '2018-07-10 11:38:45'),
(1237, 0, '2017/2018', '3rd Term', 'NR1459', 'Inioluwa is intelligent and cheerful.', '', '2018-07-10 11:47:36'),
(1238, 0, '2017/2018', '3rd Term', 'RC0133', 'Hephzibah is intelligent, loveable and arrives to school each day with a smile.', '', '2018-07-10 11:49:12'),
(1241, 0, '2017/2018', '3rd Term', 'NR1455', 'Nathan is smart, vocal and kind.', '', '2018-07-10 11:53:41'),
(1250, 0, '2017/2018', '3rd Term', 'RC0140', 'Adebare is smart and vocal.', '', '2018-07-10 12:01:00'),
(1251, 0, '2017/2018', '3rd Term', 'NR1506', 'Sarah is intelligent, obedient and friendly.', '', '2018-07-10 12:01:11'),
(1258, 0, '2017/2018', '3rd Term', 'NR1529', 'Mofeoluwa is intelligent and friendly.', '', '2018-07-10 12:05:36'),
(1270, 0, '2017/2018', '3rd Term', 'RC0132', 'Richard is intelligent, confident and has excellent manners.', '', '2018-07-10 12:09:10'),
(1271, 0, '2017/2018', '3rd Term', 'NR1577', ' Precious is friendly and has improved in her academic performance.', '', '2018-07-10 12:10:58'),
(1286, 0, '2017/2018', '3rd Term', 'NR1532', 'Eyimofe is intelligent and friendly.', '', '2018-07-10 12:23:45'),
(1288, 0, '2017/2018', '3rd Term', 'RC0623', 'Bridget is brilliant, calm and has positive attitude towards learning.', '', '2018-07-10 12:27:25'),
(1293, 0, '2017/2018', '3rd Term', 'NR1405', 'Chibuike is jovial and doing more academically than before.', '', '2018-07-10 12:33:32'),
(1298, 0, '2017/2018', '3rd Term', 'PG0621', 'Morayomi is friendly, loveable and always eager to learn.', '', '2018-07-10 12:36:23'),
(1299, 0, '2017/2018', '3rd Term', 'NR1427', 'Ejabowefon is smart, neat and vocal.', '', '2018-07-10 12:36:52'),
(1307, 0, '2017/2018', '3rd Term', 'RC0137', 'Rachael is friendly and her academic performance has greatly improved.', '', '2018-07-10 12:37:50'),
(1310, 0, '2017/2018', '3rd Term', 'NR1471', ' Naomi is kind and has a good attitude towards learning.', '', '2018-07-10 12:44:08'),
(1320, 0, '2017/2018', '3rd Term', 'PG0622', 'Morolake is friendly. She shows interest in learning.', '', '2018-07-10 12:44:40'),
(1323, 0, '2017/2018', '3rd Term', 'RC0138', 'Araoluwa is friendly and  has improved academically.', '', '2018-07-10 12:47:06'),
(1346, 0, '2018/2019', '3rd Term', 'PG0629', 'Zahra is intelligent, active and is eager to learn.', '', '2018-07-10 12:53:59'),
(1358, 0, '2017/2018', '3rd Term', 'RC0139', 'Godwin is smart, vocal and has improved academically.', '', '2018-07-10 13:01:24'),
(1360, 0, '2017/2018', '3rd Term', 'PG0629', 'Zahra is intelligent and eager to learn.', '', '2018-07-11 11:26:52'),
(1361, 0, '2017/2018', '3rd Term', 'NR1482', 'Zane is intelligent and  friendly.', '', '2018-07-11 11:31:55'),
(1377, 0, '2017/2018', '3rd Term', 'NR1508', 'Iyanuoluwa  is sociable and has a good attitude towards learning.', '', '2018-07-11 11:40:59'),
(1378, 0, '2017/2018', '3rd Term', 'NR1457', 'Olaoluwa is calm and has improved in his academic performance.', '', '2018-07-11 11:46:54'),
(1379, 0, '2017/2018', '3rd Term', 'NR1460', 'Jomiloju is intelligent and friendly.', '', '2018-07-11 11:50:39'),
(1410, 0, '2017/2018', '3rd Term', 'NR1448', 'Demilade is intelligent and friendly.', '', '2018-07-11 12:07:48'),
(1411, 0, '2017/2018', '3rd Term', 'GD1327', 'Impressive performance. Continue to blossom in your next class.', 'terminal', '2018-07-13 07:23:09'),
(1412, 0, '2017/2018', '3rd Term', 'GD1261', 'Darasimi, the sky is certainly your starting point if you will not relent.', 'terminal', '2018-07-13 07:28:14'),
(1413, 0, '2017/2018', '3rd Term', 'GD1582', 'Go and make more positive impact as you move to the next class.', 'terminal', '2018-07-13 07:31:32'),
(1417, 0, '2017/2018', '3rd Term', 'GD1438', 'A VERY ENCOURAGING PERFORMANCE. KEEP IT UP AND DO NOT RELENT IN YOUR NEXT CLASS', 'terminal', '2018-07-13 07:40:41'),
(1419, 0, '2017/2018', '3rd Term', 'GD4201', 'Foyinsola has a cheering demeanor that has made her a friend to many in the class.', 'terminal', '2018-07-13 07:43:34'),
(1420, 0, '2017/2018', '3rd Term', 'GD1620', 'THIS IS CERTAINLY NOT YOUR BEST IF YOU WILL NOT RELENT.', 'terminal', '2018-07-13 07:47:36'),
(1423, 0, '2017/2018', '3rd Term', 'GD3561', 'MOYOSORE HAS REALLY IMPROVED, KEEP IT UP IN YOUR  NEXT CLASS.', 'terminal', '2018-07-13 07:53:06'),
(1424, 0, '2017/2018', '3rd Term', 'GD1578', 'BOLUWATIFE,YOU WILL GO PLACES IF YOU WILL NOT RELENT IN YOUR NEXT CLASS.', 'terminal', '2018-07-13 07:53:21'),
(1427, 0, '2017/2018', '3rd Term', 'GD1287', 'KELVIN IS A WONDERFUL BOY AND I\'M HAPPY TO HAVE HAD  HIM IN MY CLASS.', 'terminal', '2018-07-13 07:57:29'),
(1430, 0, '2017/2018', '3rd Term', 'NR2527', 'KANYINSOLA IS SOCIABLE AND CARING. KEEP IT UP. ', 'fullterm', '2018-07-13 08:01:54'),
(1431, 0, '2017/2018', '3rd Term', 'GD1331', 'Tolulope assumes responsibility well. Go and excel in your next class.', 'terminal', '2018-07-13 08:04:05'),
(1433, 0, '2017/2018', '3rd Term', 'GD4162', 'Ayomipo is an active listner and has really improved on his relationship with his peers.', 'terminal', '2018-07-13 08:05:19'),
(1435, 0, '2017/2018', '3rd Term', 'GD6486', 'Jibodu has proved that with hard work nothing is impossible. Keep up the good work in college.', 'terminal', '2018-07-13 08:11:19'),
(1436, 0, '2017/2018', '3rd Term', 'NR2456', 'Ameerah\'s spirited participation in class activities is an evidence of her growing confidence but should use her summer constructively with lots of reading.', 'fullterm', '2018-07-13 08:12:30'),
(1440, 0, '2017/2018', '3rd Term', 'GD4496', 'Mayomikun has many insightful ideas but needs to take her academics more seriously.', 'terminal', '2018-07-13 08:14:41'),
(1442, 0, '2017/2018', '3rd Term', 'GD4595', 'BRILLIANT PERFORMANCE, KEEP IT UP.', 'terminal', '2018-07-13 08:16:36'),
(1443, 0, '2017/2018', '3rd Term', 'GD3574', 'JOMILOJU HAS  IMPROVED THIS TERM. KEEP IT UP IN YOUR NEXT CLASS.', 'terminal', '2018-07-13 08:17:18'),
(1445, 0, '2017/2018', '3rd Term', 'GD5545', 'Hadrian is fun and interesting to be with in the classroom.', 'terminal', '2018-07-13 08:19:16'),
(1446, 0, '2017/2018', '3rd Term', 'GD6627', 'Faid has shown great tenacity is his academics but more work still need to be done in Numeracy. I wish you greater exploit in the college.', 'terminal', '2018-07-13 08:19:58'),
(1447, 0, '2017/2018', '3rd Term', 'GD4184', 'Divine uses common sense to solve equations independently and in a posiitive manner.', 'terminal', '2018-07-13 08:20:03'),
(1449, 0, '2017/2018', '3rd Term', 'GD1353', 'Kanyinsola assumes responsibilities well in class. The sky is your starting point.', 'terminal', '2018-07-13 08:20:39'),
(1453, 0, '2017/2018', '3rd Term', 'GD1419', 'A good result. Do not relent in your next class.', 'terminal', '2018-07-13 08:24:11'),
(1455, 0, '2017/2018', '3rd Term', 'GD3474', 'CHUKUMA HAS AN EXCELLENT RESULT. KEEP FLYING HIGH IN YOUR NEXT CLASS.', 'terminal', '2018-07-13 08:26:56'),
(1456, 0, '2017/2018', '3rd Term', 'GD1498', 'Irewolede is maintaining grade level expectation. Do not relent in your next class.', 'terminal', '2018-07-13 08:26:59'),
(1457, 0, '2017/2018', '3rd Term', 'GD5564', 'Posi is caring and kind.', 'terminal', '2018-07-13 08:28:29'),
(1458, 0, '2017/2018', '3rd Term', 'GD4463', 'Gold pays attention to detail in daily work.', 'terminal', '2018-07-13 08:29:58'),
(1460, 0, '2017/2018', '3rd Term', 'GD6025', 'Damilola has really done well for himself. His attitude towards work has improved greatly. I wish you greater achievement in the college.', 'terminal', '2018-07-13 08:30:48'),
(1461, 0, '2017/2018', '3rd Term', 'GD1527', 'Ayomidimeji has performed greatly. Keep it up in your next class.', 'terminal', '2018-07-13 08:31:24'),
(1462, 0, '2017/2018', '3rd Term', 'GD5576', 'Deborah is calm and obedient.', 'terminal', '2018-07-13 08:31:32'),
(1463, 0, '2017/2018', '3rd Term', 'GD3134', 'SINMILOLUWA HAS AN EXCELLENT RESULT. KEEP IT UP IN YOUR NEXT CLASS.', 'terminal', '2018-07-13 08:32:28'),
(1464, 0, '2017/2018', '3rd Term', 'GD4444', 'Anu neds to work harder on her weak subjects.', 'midterm', '2018-07-13 08:34:30'),
(1465, 0, '2017/2018', '3rd Term', 'NR2322', 'SUREFUNMI  HAS GOOD PONTENTIALS TOWARDS LEARNING. SHE  NEEDS TO BRACE UP  IN THE NEXT CLASS..', 'fullterm', '2018-07-13 08:36:05'),
(1466, 0, '2017/2018', '3rd Term', 'GD6053', 'Esther has improved greatly in her academics. Please keep up the good work in college.', 'terminal', '2018-07-13 08:36:30'),
(1467, 0, '2017/2018', '3rd Term', 'GD5426', 'Motun is caring and very interesting to be with in the classroom.', 'terminal', '2018-07-13 08:36:54'),
(1468, 0, '2017/2018', '3rd Term', 'GD1612', 'Temilorun has earned a very fine report card, do not relent in your next class.', 'terminal', '2018-07-13 08:37:39'),
(1469, 0, '2017/2018', '3rd Term', 'GD4478', 'Daniel is an active listner and important member of group discussions. He enjoys asking questions that show understanding.', 'terminal', '2018-07-13 08:38:04'),
(1474, 0, '2017/2018', '3rd Term', 'GD1495', 'Tikunmi is a brilliant girl and has performed excellently. Keep the ball rolling in your next class.', 'terminal', '2018-07-13 08:39:15'),
(1478, 0, '2017/2018', '3rd Term', 'NR2329', 'Damilare\'s determined effort in reading has encouraged him to read alot. He is enjoying his thrilling new achievement and should be given every encouragement to keep it up.', 'fullterm', '2018-07-13 08:41:58'),
(1479, 0, '2017/2018', '3rd Term', 'GD3563', 'FIKAYOMI HAS IMPROVED, KEEP IMPROVING IN YOUR NEXT CLASS.', 'terminal', '2018-07-13 08:42:02'),
(1481, 0, '2017/2018', '3rd Term', 'GD5012', 'Apade is respectful and obedient.', 'terminal', '2018-07-13 08:42:49'),
(1483, 0, '2017/2018', '3rd Term', 'GD4146', 'Judith has shown high committment this term.Good result, keep it up.', 'terminal', '2018-07-13 08:45:30'),
(1484, 0, '3rd Term', 'RC0126', 'Damiloju i', '', '2017/2018', '2018-07-13 08:46:31'),
(1485, 0, '2017/2018', '3rd Term', 'GD5417', 'Mofe is jovial and interesting.', 'terminal', '2018-07-13 08:46:36'),
(1492, 0, '2017/2018', '3rd Term', 'NR2321', 'Tiwaloluwa is an active leader and a future challenger. Please, keep it up.', 'fullterm', '2018-07-13 08:47:47'),
(1493, 0, '2017/2018', '3rd Term', 'GD3536', 'OREOLUWA HAS REALLY IMPROVED, DO NOT RELENT.', 'terminal', '2018-07-13 08:48:29'),
(1494, 0, '2017/2018', '3rd Term', 'NR2418', 'ELOZINO IS A GOOD READER. SHE HAS A FINE PERFORMANCE.', 'fullterm', '2018-07-13 08:48:44'),
(1500, 0, '2017/2018', '3rd Term', 'GD4439', 'Tunbuyi has made very good academic progress this session.', 'terminal', '2018-07-13 08:51:30'),
(1501, 0, '2017/2018', '3rd Term', 'NR2537', ' Ireoluwa\'s enthusiasm and desire to do all his work is admirable. Keep it up.', 'fullterm', '2018-07-13 08:53:00'),
(1502, 0, '2017/2018', '3rd Term', 'GD5619', 'Toluwani is respectful and obedient.', 'terminal', '2018-07-13 08:53:04'),
(1503, 0, '2017/2018', '3rd Term', 'NR2581', 'OLAOLUWA HAS REALLY IMPROVED IN HIS PERFORMANCE. PLEASE DO NOT RELENT IN THE NEXT CLASS.', 'fullterm', '2018-07-13 08:53:24'),
(1504, 0, '2017/2018', '3rd Term', 'GD4219', 'BRAVO! Excellent performance, keep it up in your next class.', 'terminal', '2018-07-13 08:53:39'),
(1507, 0, '2017/2018', '3rd Term', 'GD5583', 'Mueezat is friendly and considerate.', 'terminal', '2018-07-13 08:55:29'),
(1509, 0, '2017/2018', '3rd Term', 'GD4248', 'Yanmife shows perseverance in all she does.', 'terminal', '2018-07-13 08:55:56'),
(1511, 0, '2017/2018', '3rd Term', 'GD1565', 'Goodness is a reserved child. He has performed greatly.', 'terminal', '2018-07-13 08:56:12'),
(1513, 0, '3rd Term', 'RC0137', 'Rachael is', '', '2017/2018', '2018-07-13 08:57:01'),
(1514, 0, '2017/2018', '3rd Term', 'GD4104', 'EXCELLENT PERFORMANCE, KEEP IT UP.', 'terminal', '2018-07-13 08:57:58'),
(1516, 0, '2017/2018', '3rd Term', 'NR2388', 'TOLUWANIMI HAS IMPROVED IN HER READING SKILLS. SHE JUST NEEDS TO WORK ON HER SPELLINGS IN THE NEXT CLASS.', 'fullterm', '2018-07-13 09:00:03'),
(1517, 0, '2017/2018', '3rd Term', 'NR2382', 'Somto has done brilliantly well but should use her summer constructively with lots of reading activities.', 'fullterm', '2018-07-13 09:01:02'),
(1518, 0, '2017/2018', '3rd Term', 'GD4252', 'Temi needs to work harder on his handwriting.Good result, Keep it up.', 'terminal', '2018-07-13 09:01:32'),
(1519, 0, '2017/2018', '3rd Term', 'GD3089', 'DAVID HAS A GREAT POTENTIAL, KEEP IMPROVING.', 'terminal', '2018-07-13 09:01:37'),
(1520, 0, '2017/2018', '3rd Term', 'GD5571', 'Damilola is respectful and very funny.', 'terminal', '2018-07-13 09:02:00'),
(1521, 0, '2017/2018', '3rd Term', 'GD4158', 'Fikunmi has done a nice job all through, taking pride in his work and completing assignments with quality in mind.', 'terminal', '2018-07-13 09:02:17'),
(1523, 0, '2017/2018', '3rd Term', 'GD1558', 'Moyin has really improved academically. Keep it up in your next class.', 'terminal', '2018-07-13 09:04:43'),
(1524, 0, '2017/2018', '3rd Term', 'GD3173', 'DIVINE HAS AN EXCELLENT RESULT, KEEP IT UP.', 'terminal', '2018-07-13 09:04:56'),
(1525, 0, '2017/2018', '3rd Term', 'GD4157', 'Fifunmi is a self motivated worker who actively engages in working carefully and conscientiously.', 'terminal', '2018-07-13 09:05:42'),
(1527, 0, '2017/2018', '3rd Term', 'NR1528', ' Ifeoluwa is always neat, cheerful and has a positive attitude towads learning..', '', '2018-07-13 09:06:38'),
(1528, 0, '2017/2018', '3rd Term', 'GD5239', 'Olamide is calm and attentive in class.', 'terminal', '2018-07-13 09:06:40'),
(1530, 0, '2017/2018', '3rd Term', 'NR2408', 'TIMILEHIN HAS A GOOD HEART TOWARDS LEARNINIG. DO NOT RELAX IN YOUR NEXT CLASS.', 'fullterm', '2018-07-13 09:07:21'),
(1531, 0, '2017/2018', '3rd Term', 'NR2489', 'This is a positive development and your support has been helpful in achieving this. ', 'fullterm', '2018-07-13 09:08:05'),
(1534, 0, '2017/2018', '3rd Term', 'GD4014', 'Kofo conveys her thoughts and ideas clearly but needs to work more on answering some technical questions.', 'terminal', '2018-07-13 09:09:41'),
(1535, 0, '2017/2018', '3rd Term', 'GD5538', 'Solomon is very attentive in the classroom.', 'terminal', '2018-07-13 09:10:17'),
(1536, 0, '2017/2018', '3rd Term', 'NR1407', 'Moyinoluwa is intelligent and calm.', '', '2018-07-13 09:10:24'),
(1541, 0, '2017/2018', '3rd Term', 'GD4479', 'David has consistently maintained high grades, excellent result, keep it up.', 'terminal', '2018-07-13 09:11:32'),
(1544, 0, '2017/2018', '3rd Term', 'GD4510', 'Erinayo tackles new challenges eagerly and with a positive attitude.', 'terminal', '2018-07-13 09:11:59'),
(1546, 0, '2017/2018', '3rd Term', 'NR2568', 'Emmanulla\'s enthusiasm and desire to do all her work is admirable. Keep it up.', 'fullterm', '2018-07-13 09:14:03'),
(1547, 0, '2017/2018', '3rd Term', 'NR2360', 'ALEX IS A LIVELY CHILD. HE IS FUN OF NUMERICAL WORKS. CONTINUE TO PROGRESS IN YOUR NEXT CLASS.', 'fullterm', '2018-07-13 09:14:04'),
(1549, 0, '2017/2018', '3rd Term', 'GD4472', 'A very good result, keep it up.', 'terminal', '2018-07-13 09:14:26'),
(1552, 0, '2017/2018', '3rd Term', 'GD4416', 'Kehinde uses details to expand upon the great written thoughts she is already putting on paper.', 'terminal', '2018-07-13 09:15:20'),
(1553, 0, '2017/2018', '3rd Term', 'GD5285', 'Damilola is very calm and attentive.', 'terminal', '2018-07-13 09:15:30'),
(1554, 0, '2017/2018', '3rd Term', 'GD3241', 'TOCHI HAS AN EXCELLENT RESULT. KEEP THE BALL ROLLING.', 'terminal', '2018-07-13 09:15:37'),
(1555, 0, '2017/2018', '3rd Term', 'NR1491', 'Emillia is friendly and has improved in  her academic performance.', '', '2018-07-13 09:16:32'),
(1557, 0, '2017/2018', '3rd Term', 'GD1462', 'Divine is intelligent and responsible. He had performed greatly.', 'terminal', '2018-07-13 09:16:55'),
(1559, 0, '2017/2018', '3rd Term', 'GD4587', 'Darasimi has greatly improved, especially in the area of Handwriting and Mathematics.', 'terminal', '2018-07-13 09:18:03'),
(1562, 0, '2017/2018', '3rd Term', 'GD3206', 'TENIOLA HAS AN EXCELLENT RESULT, KEEP FLYING HIGH IN YOUR NEXT CLASS.', 'terminal', '2018-07-13 09:19:34'),
(1563, 0, '2017/2018', '3rd Term', 'GD4207', 'Joshua has consistently maintained high performance, excellent result, keep it up.', 'terminal', '2018-07-13 09:19:49'),
(1564, 0, '2017/2018', '3rd Term', 'GD5065', 'Jeremiah is attentive and takes to corrections.', 'terminal', '2018-07-13 09:20:13'),
(1567, 0, '2017/2018', '3rd Term', 'GD4584', 'Isaac has shown great improvement in spelling and word work over the past terms.', 'terminal', '2018-07-13 09:20:44'),
(1568, 0, '2017/2018', '3rd Term', 'NR2547', 'Moyato demonstrates an excellent class attitude and always puts forth her best effort.', 'fullterm', '2018-07-13 09:20:53'),
(1570, 0, '2017/2018', '3rd Term', 'NR1504', 'Masud is friendly and has improved in his learning activities.', '', '2018-07-13 09:22:16'),
(1575, 0, '2017/2018', '3rd Term', 'GD2553', 'Pemisire is a pleasant and focused pupil. Keep it up.', 'terminal', '2018-07-13 09:23:14'),
(1576, 0, '2017/2018', '3rd Term', 'GD4305', 'Nifemi has made great progress across the curriculum since the beginning of the session.', 'terminal', '2018-07-13 09:23:23'),
(1577, 0, '2017/2018', '3rd Term', 'GD3493', 'MOFESADE HAS A GREAT RESULT, KEEP IMPROVING.', 'terminal', '2018-07-13 09:23:23'),
(1578, 0, '2017/2018', '3rd Term', 'NR2369', 'SHARON DOES WELL IN CLASS. SHE NEEDS TO CONCENTRATE DURING TEACHING. DO NOT RELAX IN THE NEXT CLASS.', 'fullterm', '2018-07-13 09:24:32'),
(1581, 0, '2017/2018', '3rd Term', 'GD5435', 'Semilore is an interesting pupil to be with in the classroom.', 'terminal', '2018-07-13 09:25:26'),
(1582, 0, '2017/2018', '3rd Term', 'GD4213', 'Timilehin has made great progress across the curriculum this term.', 'terminal', '2018-07-13 09:25:36'),
(1583, 0, '2017/2018', '3rd Term', 'GD1311', 'Pamilerin has performed beautifully in his academics. Keep it up.', 'terminal', '2018-07-13 09:25:46'),
(1586, 0, '2017/2018', '3rd Term', 'NR2430', 'Daniel is an active leader. He has done brilliantly well but should use his summer constructively with lots of reading activities.', 'fullterm', '2018-07-13 09:27:25'),
(1587, 0, '2017/2018', '3rd Term', 'GD4117', 'Praise demonstrates behaviour that sets the standard for the class.', 'terminal', '2018-07-13 09:27:50'),
(1588, 0, '2017/2018', '3rd Term', 'GD5290', 'Ose is calm and attentive in the class.', 'terminal', '2018-07-13 09:27:51'),
(1589, 0, '2017/2018', '3rd Term', 'NR1423', 'Diekoloreoluwa is kind and intelligent. ', '', '2018-07-13 09:28:03'),
(1591, 0, '2017/2018', '3rd Term', 'GD3591', 'AYOMIDE HAS A GREAT RESULT, BUT NEEDS TO WORK HARDER IN YOUR NEXT CLASS.', 'terminal', '2018-07-13 09:28:38'),
(1593, 0, '2017/2018', '3rd Term', 'NR2346', 'COREY IS A HANDSOME BOY WITH GREAT PONTENTIALS IN HIM. HOWEVER, HE NEEDS TO WORK ON THE WEAK SUBJECTS.', 'fullterm', '2018-07-13 09:29:12'),
(1594, 0, '2017/2018', '3rd Term', 'GD4152', 'Sinmi has consistently maintained high grades, keep it up in your next class. ', 'terminal', '2018-07-13 09:29:58'),
(1596, 0, '2017/2018', '3rd Term', 'GD1304', 'Abayomi is brave and resilient. Keep it up in your next class.', 'terminal', '2018-07-13 09:31:36'),
(1597, 0, '2017/2018', '3rd Term', 'GD5618', 'Obaro is respectful and friendly.', 'terminal', '2018-07-13 09:32:17'),
(1598, 0, '2017/2018', '3rd Term', 'NR1461', 'Michelle is friendly and has good attitude towards learning.', '', '2018-07-13 09:33:21'),
(1600, 0, '2017/2018', '3rd Term', 'NR2597', 'NELSON HAS A GOOD HEART TOWARDS LEARNING. HE NEEDS MORE CONCENTRATION IN HIS ACADEMICS.', 'fullterm', '2018-07-13 09:34:01'),
(1601, 0, '2017/2018', '3rd Term', 'GD3064', 'FIYINFOLUWA HAS GREAT RESULT, BUT NEEDS TO WORK HARDER IN THE NEXT CLASS.', 'terminal', '2018-07-13 09:34:06'),
(1603, 0, '2017/2018', '3rd Term', 'NR2611', 'Lanre is an active leader. She has done brilliantly well but should use her summer constructively with lots of reading. ', 'fullterm', '2018-07-13 09:34:44'),
(1604, 0, '2017/2018', '3rd Term', 'GD4415', 'Taiwo has consistently maintained high grades. Excellent result, keep it up.', 'terminal', '2018-07-13 09:36:12'),
(1606, 0, '2017/2018', '3rd Term', 'NR1481', 'David is brilliant an friendly.', '', '2018-07-13 09:37:52'),
(1609, 0, '2017/2018', '3rd Term', 'NR2516', 'AN EXCELLENT PERFORMANCE. KEEP THE FLAG FLYING.', 'fullterm', '2018-07-13 09:39:24'),
(1610, 0, '2017/2018', '3rd Term', 'GD1410', 'Eniola is brave and resilient. She has performed greatly.', 'terminal', '2018-07-13 09:40:05'),
(1611, 0, '2017/2018', '3rd Term', 'GD4087', 'Ephraim has consistently maintained high grades.Excellent result,keep it up.', 'terminal', '2018-07-13 09:40:18'),
(1613, 0, '2017/2018', '3rd Term', 'NR2345', 'Joshua has done brilliantly well but should use his summer constructively with lots of reading activities.', 'fullterm', '2018-07-13 09:40:28'),
(1614, 0, '2017/2018', '3rd Term', 'GD3160', 'INIOLUWA HAS A GREAT RESULT, KEEP IT UP IN YOUR NEXT CLASS.', 'terminal', '2018-07-13 09:40:32'),
(1615, 0, '2017/2018', '3rd Term', 'NR1446', 'Efechukwu is friendly and has good attitude towards learning activities.', '', '2018-07-13 09:42:59'),
(1616, 0, '2017/2018', '3rd Term', 'NR2359', 'Araoluwa is actively engaged in the learning process. Her project on transportation was well researched and written.', 'fullterm', '2018-07-13 09:45:09'),
(1618, 0, '2017/2018', '3rd Term', 'GD4070', 'Ireoluwa has consistently maintained high grades.Excellent result, keep it up.', 'terminal', '2018-07-13 09:47:26'),
(1619, 0, '2017/2018', '3rd Term', 'GD2280', 'Chaniel has good manners and excellence towards academics.', 'terminal', '2018-07-13 09:47:38'),
(1621, 0, '2017/2018', '3rd Term', 'NR1541', 'Damisire is friendly, calm and intelligent.', '', '2018-07-13 09:48:48'),
(1627, 0, '2017/2018', '3rd Term', 'GD1441', 'Iremide is a wonderful and lovable child. She has good attitude towards academics.', 'terminal', '2018-07-13 09:49:02'),
(1630, 0, '2017/2018', '3rd Term', 'NR2624', 'RIMIMOLA HAS A GOOD HEART TOWARDS LEARNING. HE NEEDS TO WORK ON THE SIGHT WORDS AND SPELLINGS. PLEASE BRACE UP IN THE NEXT CLASS.', 'fullterm', '2018-07-13 09:50:33'),
(1631, 0, '2017/2018', '3rd Term', 'GD4197', 'Demilade needs to work harder in her weak subjects. Good result.', 'terminal', '2018-07-13 09:50:52'),
(1632, 0, '2017/2018', '3rd Term', 'NR2386', 'Eniola  is enjoying his thrilling new achievement and should be given every encouragement to keep it.', 'fullterm', '2018-07-13 09:52:25'),
(1633, 0, '2017/2018', '3rd Term', 'NR1440', 'Deborah is calm and has a good attitude towards learning..', '', '2018-07-13 09:52:34'),
(1637, 0, '2017/2018', '3rd Term', 'GD2234', 'Korede\'s written work has improved. Keep it up.', 'terminal', '2018-07-13 09:54:30'),
(1638, 0, '2017/2018', '3rd Term', 'GD4476', 'Brilliant performance,keep the flag flying in your new class.', 'terminal', '2018-07-13 09:54:30'),
(1639, 0, '2017/2018', '3rd Term', 'GD1296', 'Feranmi is an intelligent child but needs to take his academics seriously in his next class.', 'terminal', '2018-07-13 09:54:30'),
(1640, 0, '2017/2018', '3rd Term', 'NR2413', 'TOLUWANIMI IS A FRIENDLY CHILD. HE ENJOYS READING SHORT STORY BOOKS. HE HAS EARNED A GOOD GRADE. DO NOT RELAX IN THE NEXT CLASS.', 'fullterm', '2018-07-13 09:55:02'),
(1643, 0, '2017/2018', '3rd Term', 'NR1447', '', '', '2018-07-13 09:59:09'),
(1645, 0, '2017/2018', '3rd Term', 'GD2432', 'Eniola has improved over the past quarter. Keep it up.', 'terminal', '2018-07-13 10:01:37'),
(1646, 0, '2017/2018', '3rd Term', 'NR2391', 'IFEOLUWADUNSI IS A CHEERFUL BOY. HE HAS A KIND HEART. HOWEVER, HE NEEDS TO WORK ON HIS WEAK SUBJECTS. BRACE UP IN YOUR NEXT CLASS.', 'fullterm', '2018-07-13 10:02:07'),
(1647, 0, '2017/2018', '3rd Term', 'NR1625', 'Adeoluwa is friendly, outspoken and has a good attitude towards academics.', '', '2018-07-13 10:04:44'),
(1648, 0, '2017/2018', '3rd Term', 'GD2278', 'Seyitoju is an active and focused pupil. Keep it up.', 'terminal', '2018-07-13 10:04:48'),
(1649, 0, '2017/2018', '3rd Term', 'GD2567', 'Naomi will benefit from practicing her reading and comprehension skills.', 'terminal', '2018-07-13 10:06:49'),
(1651, 0, '2017/2018', '3rd Term', 'NR1505', 'Olamide is lively and has a positive attitude towards  learning activities.', '', '2018-07-13 10:07:29'),
(1658, 0, '2017/2018', '3rd Term', 'GD2342', 'Tomilayo possesses good self discipline towards academics. Keep it up.', 'terminal', '2018-07-13 10:09:03'),
(1659, 0, '2017/2018', '3rd Term', 'NR1499', 'Boluwatife is friendly and brilliant.', '', '2018-07-13 10:13:04'),
(1666, 0, '2017/2018', '3rd Term', 'GD2466', 'Joy\'s excellent attitude is reflected in the work she does.', 'terminal', '2018-07-13 10:25:55'),
(1668, 0, '2017/2018', '3rd Term', 'GD2593', 'Esther is very active and responsive in the class. ', 'terminal', '2018-07-13 10:51:06'),
(1669, 0, '2017/2018', '3rd Term', 'GD2531', 'Obatofarati shows self-confidence in writing,he is cooperative and well mannered. ', 'terminal', '2018-07-13 10:54:24'),
(1670, 0, '2017/2018', '3rd Term', 'GD2437', 'MODESIRE HAS DONE VERY WELL. SHE IS EVER  READY TO LEARN. ', 'terminal', '2018-07-13 10:55:48'),
(1671, 0, '2017/2018', '3rd Term', 'GD2107', 'Amir has matured nicely this year academically and socially. ', 'terminal', '2018-07-13 10:57:01'),
(1672, 0, '2017/2018', '3rd Term', 'GD2485', 'This is a beautiful performance. Do not relent in your new class. ', 'terminal', '2018-07-13 10:58:15'),
(1673, 0, '2017/2018', '3rd Term', 'GD2303', 'Aderinsola has made nice progress this term. ', 'terminal', '2018-07-13 10:59:29'),
(1675, 0, '2017/2018', '3rd Term', 'GD2194', 'Emotite is a wonderful girl and I\'m happy to have had her in my class because she made some fine contributions to the class.', 'terminal', '2018-07-13 11:00:47'),
(1676, 0, '2017/2018', '3rd Term', 'GD4444', 'Anu needs to work harder for better result.', 'terminal', '2018-07-13 11:00:57'),
(1677, 0, '2017/2018', '3rd Term', 'GD2232', 'Enoch has earned a brilliant  report card. keep up the excellent work in your new class. ', 'terminal', '2018-07-13 11:03:21'),
(1678, 0, '2017/2018', '3rd Term', 'GD2509', 'Saad has shown interest and improved in his studies. keep it up. ', 'terminal', '2018-07-13 11:09:53'),
(1679, 0, '2017/2018', '3rd Term', 'GD2542', ' There is a noticeable improvement in Inioluwa\'s studies and  habits this term, which is very encouraging.', 'terminal', '2018-07-13 11:11:18'),
(1680, 0, '2017/2018', '3rd Term', 'GD2223', ' Ayomitide is a pleasant,conscientious student.', 'terminal', '2018-07-13 11:13:21'),
(1681, 0, '2017/2018', '3rd Term', 'GD2590', 'Oladotun has earned brilliant report. gaining more self confidence. ', 'terminal', '2018-07-13 11:14:53'),
(1683, 0, '2017/2018', '3rd Term', 'GD2193', 'Esther has matured nicely this year, academically and socially, i\'m happy to have had her in my class. ', 'terminal', '2018-07-13 11:17:54'),
(1685, 0, '2017/2018', '3rd Term', 'GD2188', 'David has made a nice progress this reporting period. Do not relent in your new class. ', 'terminal', '2018-07-13 11:19:57'),
(1687, 0, '2017/2018', '3rd Term', 'GD2352', 'Damilade has made many fine contributions to the class and I\'m happy to have had her in my class. ', 'terminal', '2018-07-13 11:29:17'),
(1688, 0, '2017/2018', '3rd Term', 'GD2395', ' With Toluwanimi\'s friendly and cooperative attitude, she will always be a pleasant addition to any class.', 'terminal', '2018-07-13 11:30:41'),
(1690, 0, '2017/2018', '3rd Term', 'GD2229', 'He is active and focused towards his academics, keep it up. ', 'terminal', '2018-07-13 11:32:36'),
(1695, 0, '2017/2018', '3rd Term', 'GD2338', ' Mayowa has made many great contributions to the class. He is an inspiration to his classmates. Keep it up.', 'terminal', '2018-07-13 11:51:04'),
(1696, 0, '2017/2018', '3rd Term', 'GD2579', 'Feranmi has self-confidence and good manners towards academics. Keep it up.', 'terminal', '2018-07-13 11:55:16'),
(1697, 0, '2017/2018', '3rd Term', 'GD2292', 'Ewaoluwa has shown great contributions in class. Keep it up.', 'terminal', '2018-07-13 11:59:07'),
(1698, 0, '2017/2018', '3rd Term', 'GD2586', 'Daniel is a model pupil I am so proud of him. Keep it up.', 'terminal', '2018-07-13 12:01:56');
INSERT INTO `teacherscomment` (`id`, `teacherid`, `session`, `term`, `studentid`, `comment`, `resulttype`, `dateadded`) VALUES
(1699, 0, '2017/2018', '3rd Term', 'GD2269', 'David is a model pupil and I am so proud of him. Keep it up.', 'terminal', '2018-07-13 12:08:23'),
(1708, 0, '2017/2018', '3rd Term', 'GD2282', 'Olamide is focused and organized in his studies. Keep it up.', 'terminal', '2018-07-13 12:20:17'),
(1710, 0, '2017/2018', '3rd Term', 'GD2539', 'Semilore is a pleasant and focused pupil. Keep it up.', 'terminal', '2018-07-13 12:29:05'),
(1723, 0, '2017/2018', '3rd Term', 'GD2497', 'Kelvin is active and focused. Keep it up.', 'terminal', '2018-07-13 13:21:51'),
(1730, 0, '2017/2018', '3rd Term', 'GD3592', 'A good performance. Do not relent in the next class', 'terminal', '2018-07-16 06:35:34'),
(1734, 0, '2017/2018', '3rd Term', 'GD3428', 'A good result. Do not relent in the next class', 'terminal', '2018-07-16 06:40:24'),
(1736, 0, '2017/2018', '3rd Term', 'GD3615', 'A good result. Double your effort in the next class', 'terminal', '2018-07-16 06:45:37'),
(1738, 0, '2017/2018', '3rd Term', 'GD3403', 'A good result. Double your effort in the next class', 'terminal', '2018-07-16 06:48:24'),
(1743, 0, '2017/2018', '3rd Term', 'GD3566', 'A good result. Double your effort in the next class', 'terminal', '2018-07-16 06:54:14'),
(1745, 0, '2017/2018', '3rd Term', 'GD3250', 'A good result. Double your effort in the next class', 'terminal', '2018-07-16 06:58:51'),
(1751, 0, '2017/2018', '3rd Term', 'GD3293', 'Satisfactory. Double your effort in the next class', 'terminal', '2018-07-16 07:03:23'),
(1756, 0, '2017/2018', '3rd Term', 'GD3096', 'Satisfactory. Double your effort in the next class', 'terminal', '2018-07-16 07:07:18'),
(1759, 0, '2017/2018', '3rd Term', 'GD3163', 'A good performance. Do not not relent in the next class', 'terminal', '2018-07-16 07:10:25'),
(1760, 0, '2017/2018', '3rd Term', 'GD3424', 'A good result. Do not relent in the next class', 'terminal', '2018-07-16 07:14:44'),
(1761, 0, '2017/2018', '3rd Term', 'GD3286', 'A good result. Do not relent in the next class', 'terminal', '2018-07-16 07:19:04'),
(1762, 0, '2017/2018', '3rd Term', 'GD3562', 'Satisfactory. Do not relent in the next class', 'terminal', '2018-07-16 07:23:14'),
(1792, 0, '2018/2019', '3rd Term', 'GD4157', '', 'midterm', '2018-07-16 09:15:16'),
(1793, 0, '2018/2019', '1st Term', 'GD5538', 'You have started on a very strong footing, please keep it up.', 'midterm', '2018-10-30 09:32:59'),
(1794, 0, '2018/2019', '1st Term', 'GD5426', 'You have started on a very strong footing, please keep it up.', 'midterm', '2018-10-30 09:37:00'),
(1795, 0, '2018/2019', '1st Term', 'GD5564', 'You have started on a very strong footing, please keep it up.', 'midterm', '2018-10-30 09:40:45'),
(1796, 0, '2018/2019', '1st Term', 'GD5619', 'You have started on a very strong footing, please work harder in those ares that you are weak.', 'midterm', '2018-10-30 09:44:26'),
(1797, 0, '2018/2019', '1st Term', 'GD5571', 'You can achieve more if you put in extra efforts.', 'midterm', '2018-10-30 09:48:39'),
(1798, 0, '2018/2019', '1st Term', 'GD5435', 'You have started on a very strong footing, please work harder in those areas you are weak.', 'midterm', '2018-10-30 09:52:28'),
(1799, 0, '2018/2019', '1st Term', 'GD5545', 'You have started on a very strong footing, please keep it up and work harder in those weak areas.', 'midterm', '2018-10-30 09:56:04'),
(1800, 0, '2018/2019', '1st Term', 'GD5065', ' up and work harder on tho', 'midterm', '2018-10-30 09:59:30'),
(1803, 0, '2018/2019', '1st Term', 'GD4201', 'A good performance. keep it up', 'midterm', '2018-10-30 10:07:46'),
(1806, 0, '2018/2019', '1st Term', 'GD4104', 'An excellent work. keep it up.', 'midterm', '2018-10-30 10:15:14'),
(1807, 0, '2018/2019', '1st Term', 'GD4463', 'A good performance. Keep it up.', 'midterm', '2018-10-30 10:19:08'),
(1808, 0, '2018/2019', '1st Term', 'GD4478', 'A good performance. Keep it up.', 'midterm', '2018-10-30 10:28:12'),
(1809, 0, '2018/2019', '1st Term', 'GD4479', 'A good performance. Keep it up.', 'midterm', '2018-10-30 10:33:14'),
(1810, 0, '2018/2019', '1st Term', 'GD4070', 'Great Performance!! Keep it up. Ireoluwa', 'midterm', '2018-10-30 10:40:45'),
(1811, 0, '2018/2019', '1st Term', 'GD4439', 'A good performance. keep it up.', 'midterm', '2018-10-30 10:42:16'),
(1812, 0, '2018/2019', '1st Term', 'GD4472', 'Work harder and do not relent.', 'midterm', '2018-10-30 10:45:29'),
(1813, 0, '2018/2019', '1st Term', 'GD4158', 'An excellent performance. Keep it up.', 'midterm', '2018-10-30 10:49:11'),
(1814, 0, '2018/2019', '1st Term', 'GD4252', 'Good Perforance, Temiloluwa.', 'midterm', '2018-10-30 10:50:26'),
(1815, 0, '2018/2019', '1st Term', 'GD4584', 'Good Performance, Issac.', 'midterm', '2018-10-30 11:01:10'),
(1816, 0, '2018/2019', '1st Term', 'GD4595', 'Great Performance, Joseph. keep getting better.', 'midterm', '2018-10-30 11:09:05'),
(1817, 0, '2018/2019', '1st Term', 'GD4415', 'Super Performance!!! Taiwo, Keep shining.', 'midterm', '2018-10-30 11:17:24'),
(1818, 0, '2018/2019', '1st Term', 'GD4207', 'A good performance. Keep it up and do not relent.', 'midterm', '2018-10-30 11:17:52'),
(1819, 0, '2018/2019', '1st Term', 'GD4152', 'A good performance. Keep it up.', 'midterm', '2018-10-30 11:21:57'),
(1820, 0, '2018/2019', '1st Term', 'GD4117', 'Great Performance!! Praise.', 'midterm', '2018-10-30 11:24:26'),
(1821, 0, '2018/2019', '1st Term', 'GD4087', 'A good performance. Keep it up.', 'midterm', '2018-10-30 11:25:43'),
(1822, 0, '2018/2019', '1st Term', 'GD4213', 'Work harder to improve your grades.', 'midterm', '2018-10-30 11:29:18'),
(1823, 0, '2018/2019', '1st Term', 'GD4496', 'Good Performance,  Try harder next time. Mayomikun', 'midterm', '2018-10-30 11:35:11'),
(1825, 0, '2018/2019', '1st Term', 'GD4157', 'An excellent performance. Keep it up.', 'midterm', '2018-10-30 11:40:22'),
(1826, 0, '2018/2019', '1st Term', 'GD4416', 'Great Performance!! Kehinde. keep it up.', 'midterm', '2018-10-30 11:42:37'),
(1827, 0, '2018/2019', '1st Term', 'GD4248', 'A good performance. Keep it up.', 'midterm', '2018-10-30 11:46:39'),
(1829, 0, '2018/2019', '1st Term', 'GD4184', 'Excellent Performance!! Divine.', 'midterm', '2018-10-30 11:50:19'),
(1830, 0, '2018/2019', '1st Term', 'GD4510', 'An excellent performance. Keep it up.', 'midterm', '2018-10-30 11:56:06'),
(1831, 0, '2018/2019', '1st Term', 'GD4162', 'Excellent Performance!! Ayomipo.', 'midterm', '2018-10-30 11:59:43'),
(1837, 0, '2018/2019', '1st Term', 'GD3160', 'keep it up.', 'midterm', '2018-10-30 12:19:34'),
(1838, 0, '2018/2019', '1st Term', 'GD3566', 'keep it up.', 'midterm', '2018-10-30 12:23:10'),
(1839, 0, '2018/2019', '1st Term', 'GD3574', 'keep it up.', 'midterm', '2018-10-30 12:27:34'),
(1840, 0, '2018/2019', '1st Term', 'GD3163', 'Keep it up.', 'midterm', '2018-10-30 12:32:43'),
(1841, 0, '2018/2019', '1st Term', 'GD2650', 'This is a good result', 'midterm', '2018-10-30 12:36:36'),
(1842, 0, '2018/2019', '1st Term', 'GD3474', 'Keep it up.', 'midterm', '2018-10-30 12:36:50'),
(1843, 0, '2018/2019', '1st Term', 'GD1331', 'This is a good result, keep striving.', 'midterm', '2018-10-30 12:42:27'),
(1844, 0, '2018/2019', '1st Term', 'GD1582', 'This is a good result. Keep it up.', 'midterm', '2018-10-30 12:44:22'),
(1847, 0, '2018/2019', '1st Term', 'NR2456', 'EXCELLENT PERFORMANCE KEEP IT UP.', 'midterm', '2018-10-30 12:45:51'),
(1849, 0, '2018/2019', '1st Term', 'GD1612', 'This is a very brilliant result.', 'midterm', '2018-10-30 12:47:45'),
(1850, 0, '2018/2019', '1st Term', 'NR1596', 'A VERY GOOD RESULT.', 'midterm', '2018-10-30 12:48:58'),
(1852, 0, '2018/2019', '1st Term', 'NR2322', 'THIS IS A GOOD RESULT.', 'midterm', '2018-10-30 12:52:00'),
(1854, 0, '2018/2019', '1st Term', 'NR2527', 'EXCELLENT PERFORMANCE, KEEP IT UP.', 'midterm', '2018-10-30 12:52:45'),
(1858, 0, '2018/2019', '1st Term', 'NR1459', 'A VERY GOOD RESULT. KEEP IT UP.', 'midterm', '2018-10-30 12:55:43'),
(1859, 0, '2018/2019', '1st Term', 'NR2418', 'AN EXCELLENT PERFORMANCE, KEEP IT UP.', 'midterm', '2018-10-30 12:58:07'),
(1860, 0, '2018/2019', '1st Term', 'NR2581', 'THIS IS A GOOD RESULT.', 'midterm', '2018-10-30 12:58:29'),
(1861, 0, '2018/2019', '1st Term', 'NR1528', 'A VERY GOOD RESULT. KEEP IT UP .', 'midterm', '2018-10-30 12:59:19'),
(1863, 0, '2018/2019', '1st Term', 'GD1565', 'This is a wonderful result.', 'midterm', '2018-10-30 12:59:37'),
(1864, 0, '2018/2019', '1st Term', 'GD2656', 'Good result.Do not  relent in your efforts.', 'midterm', '2018-10-30 13:00:17'),
(1865, 0, '2018/2019', '1st Term', 'NR2329', 'THIS IS A VERY GOOD PERFORMANCE.', 'midterm', '2018-10-30 13:02:57'),
(1866, 0, '2018/2019', '1st Term', 'NR1529', 'BRAVO ! KEEP IT UP .', 'midterm', '2018-10-30 13:03:01'),
(1867, 0, '2018/2019', '1st Term', 'NR2388', 'AN EXCELLENT PERFORMANCE, KEEP IT UP.', 'midterm', '2018-10-30 13:03:06'),
(1869, 0, '2018/2019', '1st Term', 'GD2652', 'Execellent result.', 'midterm', '2018-10-30 13:06:09'),
(1870, 0, '2018/2019', '1st Term', 'NR2360', 'THIS IS A WONDERFUL PERFORMANCE.', 'midterm', '2018-10-30 13:06:19'),
(1872, 0, '2018/2019', '1st Term', 'NR1491', 'A VERY GOOD RESULT . KEEP IT UP .', 'midterm', '2018-10-30 13:07:33'),
(1873, 0, '2018/2019', '1st Term', 'NR2408', 'AN EXCELLENT PERFORMANCE, KEEP IT UP.', 'midterm', '2018-10-30 13:07:50'),
(1874, 0, '2018/2019', '1st Term', 'GD1462', 'Excellent result!', 'midterm', '2018-10-30 13:09:01'),
(1875, 0, '2018/2019', '1st Term', 'GD1438', 'Excellent result.', 'midterm', '2018-10-30 13:09:01'),
(1876, 0, '2018/2019', '1st Term', 'NR1504', 'A VERY GOOD RESULT .', 'midterm', '2018-10-30 13:10:32'),
(1877, 0, '2018/2019', '1st Term', 'GD3561', 'Very good result, keep it up.', 'midterm', '2018-10-30 13:11:02'),
(1879, 0, '2018/2019', '1st Term', 'GD1261', 'EXECELLENT RESULT!', 'midterm', '2018-10-30 13:13:03'),
(1880, 0, '2018/2019', '1st Term', 'NR2346', 'THIS IS A GOOD RESULT.', 'midterm', '2018-10-30 13:13:26'),
(1881, 0, '2018/2019', '1st Term', 'NR2321', 'AN EXCELLENT PERFORMANCE, KEEP IT UP.', 'midterm', '2018-10-30 13:13:31'),
(1882, 0, '2018/2019', '1st Term', 'NR1423', 'AN EXCELLENT RESULT . KEEP IT UP . ', 'midterm', '2018-10-30 13:13:54'),
(1883, 0, '2018/2019', '1st Term', 'GD1495', 'GREAT RESULT!', 'midterm', '2018-10-30 13:16:11'),
(1885, 0, '2018/2019', '1st Term', 'NR1461', 'AN EXCELLENT RESULT .', 'midterm', '2018-10-30 13:17:44'),
(1886, 0, '2018/2019', '1st Term', 'NR2568', 'THIS IS A GOOD RESULT.', 'midterm', '2018-10-30 13:18:20'),
(1888, 0, '2018/2019', '1st Term', 'GD1620', 'Good result.Keep it up.', 'midterm', '2018-10-30 13:19:20'),
(1889, 0, '2018/2019', '1st Term', 'NR1471', 'A GOOD RESULT . ', 'midterm', '2018-10-30 13:20:31'),
(1890, 0, '2018/2019', '1st Term', 'GD1327', 'EXECELLENT RESULT!', 'midterm', '2018-10-30 13:20:37'),
(1891, 0, '2018/2019', '1st Term', 'GD1640', 'AN EXCELLENT PERFORMANCE, KEEP IT UP.', 'midterm', '2018-10-30 13:21:29'),
(1893, 0, '2018/2019', '1st Term', 'NR1440', 'A VERY GOOD RESULT .', 'midterm', '2018-10-30 13:24:10'),
(1894, 0, '2018/2019', '1st Term', 'NR2547', 'THIS IS A WONDERFUL PERFORMANCE.', 'midterm', '2018-10-30 13:25:02'),
(1895, 0, '2018/2019', '1st Term', 'GD3536', 'Very good result, keep it up.', 'midterm', '2018-10-30 13:26:01'),
(1896, 0, '2018/2019', '1st Term', 'GD2660', 'THIS IS A GOOD RESULT.', 'midterm', '2018-10-30 13:26:02'),
(1898, 0, '2018/2019', '1st Term', 'GD1578', 'Good result. keep up the good work.', 'midterm', '2018-10-30 13:26:32'),
(1901, 0, '2018/2019', '1st Term', 'NR2489', 'A VERY GOOD PERFORMANCE, KEEP IT UP.', 'midterm', '2018-10-30 13:28:05'),
(1902, 0, '2018/2019', '1st Term', 'NR2644', 'A VERY GOOD RESULT. ', 'midterm', '2018-10-30 13:28:18'),
(1903, 0, '2018/2019', '1st Term', 'NR2516', 'AN EXCELLENT PERFORMANCE.DO NOT RELENT', 'midterm', '2018-10-30 13:28:37'),
(1906, 0, '2018/2019', '1st Term', 'NR1448', 'A VERY GOOD RESULT . ', 'midterm', '2018-10-30 13:31:23'),
(1907, 0, '2018/2019', '1st Term', 'NR2611', 'DO NOT RELENT. YOU CAN DO BETTER THAN THIS .', 'midterm', '2018-10-30 13:32:52'),
(1908, 0, '2018/2019', '1st Term', 'GD3615', 'Very good result, keep it up.', 'midterm', '2018-10-30 13:33:09'),
(1909, 0, '2018/2019', '1st Term', 'GD1353', 'Great performance!', 'midterm', '2018-10-30 13:33:16'),
(1911, 0, '2018/2019', '1st Term', 'NR2597', 'A VERY GOOD PERFORMANCE.', 'midterm', '2018-10-30 13:34:00'),
(1913, 0, '2018/2019', '1st Term', 'NR1482', 'A VERY GOOD RESULT. KEEP IT UP .', 'midterm', '2018-10-30 13:34:35'),
(1915, 0, '2018/2019', '1st Term', 'GD3403', 'Excellent result, keep it up.', 'midterm', '2018-10-30 13:37:14'),
(1916, 0, '2018/2019', '1st Term', 'NR1505', 'A VERY GOOD RESULT . ', 'midterm', '2018-10-30 13:38:29'),
(1917, 0, '2018/2019', '1st Term', 'NR2345', 'THIS IS A GOOD RESULT.', 'midterm', '2018-10-30 13:38:58'),
(1918, 0, '2018/2019', '1st Term', 'NR2430', 'AN EXCELLENT PERFORMANCE, KEEP IT UP.', 'midterm', '2018-10-30 13:39:05'),
(1919, 0, '2018/2019', '1st Term', 'GD1311', 'Excellent performance.', 'midterm', '2018-10-30 13:40:16'),
(1921, 0, '2018/2019', '1st Term', 'GD2593', 'Very Good result.', 'midterm', '2018-10-30 13:41:13'),
(1922, 0, '2018/2019', '1st Term', 'GD3250', 'Good result, keep it up.', 'midterm', '2018-10-30 13:41:14'),
(1923, 0, '2018/2019', '1st Term', 'NR2386', 'THIS IS A WONDERFUL PERFORMANCE.KEEP IT UP.', 'midterm', '2018-10-30 13:42:28'),
(1927, 0, '2018/2019', '1st Term', 'GD3293', 'Excellent result, keep it up.', 'midterm', '2018-10-30 13:46:03'),
(1928, 0, '2018/2019', '1st Term', 'GD2553', 'Very Good', 'midterm', '2018-10-30 13:46:33'),
(1929, 0, '2018/2019', '1st Term', 'NR1460', 'A VERY GOOD RESULT . KEEP IT UP . ', 'midterm', '2018-10-30 13:47:04'),
(1931, 0, '2018/2019', '1st Term', 'GD2280', 'Excellent result.keep it up.', 'midterm', '2018-10-30 13:47:25'),
(1932, 0, '2018/2019', '1st Term', 'GD1296', 'Good performance.', 'midterm', '2018-10-30 13:47:42'),
(1933, 0, '2018/2019', '1st Term', 'NR2624', 'A VERY GOOD PERFORMANCE.', 'midterm', '2018-10-30 13:49:40'),
(1934, 0, '2018/2019', '1st Term', 'GD2278', 'Good', 'midterm', '2018-10-30 13:51:22'),
(1935, 0, '2018/2019', '1st Term', 'GD2234', 'Good result.', 'midterm', '2018-10-30 13:51:52'),
(1936, 0, '2018/2019', '1st Term', 'GD2651', 'DO NOT RELENT. YOU CAN DO BETTER.', 'midterm', '2018-10-30 13:52:47'),
(1937, 0, '2018/2019', '1st Term', 'GD1558', 'Excellent performance. Keep up the good work.', 'midterm', '2018-10-30 13:53:35'),
(1940, 0, '2018/2019', '1st Term', 'GD2107', 'Very Good', 'midterm', '2018-10-30 13:54:54'),
(1941, 0, '2018/2019', '1st Term', 'GD2531', 'Ecellent result. keep it up.', 'midterm', '2018-10-30 13:55:53'),
(1942, 0, '2018/2019', '1st Term', 'NR2359', 'AN EXCELLENT PERFORMANCE, KEEP IT UP.', 'midterm', '2018-10-30 13:56:18'),
(1943, 0, '2018/2019', '1st Term', 'GD2485', 'Very Good', 'midterm', '2018-10-30 13:57:52'),
(1944, 0, '2018/2019', '1st Term', 'GD3493', 'keep up the good work.', 'midterm', '2018-10-30 13:58:54'),
(1945, 0, '2018/2019', '1st Term', 'NR1455', 'AN EXCELLENT RESULT. KEEP IT UP .', 'midterm', '2018-10-30 13:59:23'),
(1946, 0, '2018/2019', '1st Term', 'NR2413', 'AN EXCELLENT PERFORMANCE, KEEP IT UP.', 'midterm', '2018-10-30 13:59:43'),
(1947, 0, '2018/2019', '1st Term', 'GD2437', 'Good result.', 'midterm', '2018-10-30 14:00:14'),
(1948, 0, '2018/2019', '1st Term', 'GD2223', 'Very Good', 'midterm', '2018-10-30 14:00:48'),
(1949, 0, '2018/2019', '1st Term', 'GD3089', 'Good result, keep it up.', 'midterm', '2018-10-30 14:01:10'),
(1950, 0, '2018/2019', '1st Term', 'GD1527', 'Excellent performance. A job well done!', 'midterm', '2018-10-30 14:02:20'),
(1951, 0, '2018/2019', '1st Term', 'NR1506', '', 'midterm', '2018-10-30 14:02:42'),
(1952, 0, '2018/2019', '1st Term', 'GD1441', 'EXECELLENT RESULT!', 'midterm', '2018-10-30 14:02:48'),
(1954, 0, '2018/2019', '1st Term', 'GD2586', 'Good', 'midterm', '2018-10-30 14:03:46'),
(1955, 0, '2018/2019', '1st Term', 'NR2391', 'A VERY GOOD PERFORMANCE.', 'midterm', '2018-10-30 14:03:48'),
(1956, 0, '2018/2019', '1st Term', 'GD3096', 'Good result, keep it up.', 'midterm', '2018-10-30 14:05:01'),
(1957, 0, '2018/2019', '1st Term', 'GD3286', 'Darasimi keeps improving .', 'midterm', '2018-10-30 14:05:33'),
(1958, 0, '2018/2019', '1st Term', 'NR2642', '', 'midterm', '2018-10-30 14:05:50'),
(1959, 0, '2018/2019', '1st Term', 'GD2567', 'Good result.', 'midterm', '2018-10-30 14:05:55'),
(1960, 0, '2018/2019', '1st Term', 'GD2282', 'Good', 'midterm', '2018-10-30 14:07:31'),
(1961, 0, '2018/2019', '1st Term', 'NR1407', '', 'midterm', '2018-10-30 14:08:43'),
(1962, 0, '2018/2019', '1st Term', 'GD3563', 'FIKAYOMI NEEDS TO WORK MORE.', 'midterm', '2018-10-30 14:10:10'),
(1963, 0, '2018/2019', '1st Term', 'GD2229', 'Good', 'midterm', '2018-10-30 14:10:11'),
(1964, 0, '2018/2019', '1st Term', 'GD2342', 'Excellent result.', 'midterm', '2018-10-30 14:10:29'),
(1965, 0, '2018/2019', '1st Term', 'GD1304', 'Brilliant performance.Keep it up.', 'midterm', '2018-10-30 14:10:53'),
(1967, 0, '2018/2019', '1st Term', 'NR1577', 'A GOOD RESULT . ', 'midterm', '2018-10-30 14:12:53'),
(1968, 0, '2018/2019', '1st Term', 'GD2395', 'Very Good', 'midterm', '2018-10-30 14:13:28'),
(1969, 0, '2018/2019', '1st Term', 'GD3173', 'Excellent result, keep it up.', 'midterm', '2018-10-30 14:15:13'),
(1970, 0, '2018/2019', '1st Term', 'NR2654', 'THIS IS A GOOD RESULT. ', 'midterm', '2018-10-30 14:15:32'),
(1971, 0, '2018/2019', '1st Term', 'GD2539', 'Good', 'midterm', '2018-10-30 14:15:50'),
(1972, 0, '2018/2019', '1st Term', 'GD2303', 'Very good result.', 'midterm', '2018-10-30 14:16:13'),
(1973, 0, '2018/2019', '1st Term', 'GD1410', 'Great result! A job well done.', 'midterm', '2018-10-30 14:17:07'),
(1974, 0, '2018/2019', '1st Term', 'GD2194', 'Very Good', 'midterm', '2018-10-30 14:18:10'),
(1976, 0, '2018/2019', '1st Term', 'GD2232', 'Excellent result.', 'midterm', '2018-10-30 14:19:43'),
(1977, 0, '2018/2019', '1st Term', 'GD2292', 'Good', 'midterm', '2018-10-30 14:20:21'),
(1978, 0, '2018/2019', '1st Term', 'NR1532', 'A VERY GOOD RESULT . KEEP IT UP . ', 'midterm', '2018-10-30 14:20:22'),
(1979, 0, '2018/2019', '1st Term', 'GD3424', 'Excellent result, keep it up.', 'midterm', '2018-10-30 14:20:53'),
(1980, 0, '2018/2019', '1st Term', 'GD3428', 'DANIEL IS GOOD TO GO.', 'midterm', '2018-10-30 14:21:30'),
(1981, 0, '2018/2019', '1st Term', 'GD2432', 'Good', 'midterm', '2018-10-30 14:22:27'),
(1982, 0, '2018/2019', '1st Term', 'NR1405', 'A VERY GOOD RESULT .', 'midterm', '2018-10-30 14:23:38'),
(1983, 0, '2018/2019', '1st Term', 'GD2509', 'VERY GOOD RESULT.', 'midterm', '2018-10-30 14:23:39'),
(1984, 0, '2018/2019', '1st Term', 'GD3206', 'Excellent result, keep it up.', 'midterm', '2018-10-30 14:25:05'),
(1985, 0, '2018/2019', '1st Term', 'GD2653', 'Good', 'midterm', '2018-10-30 14:25:30'),
(1986, 0, '2018/2019', '1st Term', 'NR1427', 'AN EXCELLENT RESULT . KEEP IT UP . ', 'midterm', '2018-10-30 14:26:07'),
(1987, 0, '2018/2019', '1st Term', 'GD3134', 'KEEP IT UP', 'midterm', '2018-10-30 14:26:21'),
(1988, 0, '2018/2019', '1st Term', 'GD2338', 'GREAT RESULT.', 'midterm', '2018-10-30 14:26:59'),
(1989, 0, '2018/2019', '1st Term', 'NR2659', 'A VERY GOOD RESULT . ', 'midterm', '2018-10-30 14:28:52'),
(1990, 0, '2018/2019', '1st Term', 'GD4649', 'TIMILEHIN KEEPS IMPROVING BY THE DAY.', 'midterm', '2018-10-30 14:29:38'),
(1991, 0, '2018/2019', '1st Term', 'GD2497', 'GOOD RESULT.', 'midterm', '2018-10-30 14:30:09'),
(1994, 0, '2018/2019', '1st Term', 'NR2648', 'A VERY GOOD RESULT . ', 'midterm', '2018-10-30 14:31:57'),
(1996, 0, '2018/2019', '1st Term', 'GD3592', 'HABEEB IS GOOD TO GO', 'midterm', '2018-10-30 14:33:24'),
(1997, 0, '2018/2019', '1st Term', 'GD2579', 'GREAT RESULT.', 'midterm', '2018-10-30 14:33:34'),
(1999, 0, '2018/2019', '1st Term', 'NR1481', 'THIS IS AN EXCELLENT RESULT.', 'midterm', '2018-10-30 14:34:57'),
(2000, 0, '2018/2019', '1st Term', 'GD3645', 'GREAT RESULT. ', 'midterm', '2018-10-30 14:36:26'),
(2001, 0, '2018/2019', '1st Term', 'NR1446', 'A GOOD RESULT .', 'midterm', '2018-10-30 14:37:16'),
(2002, 0, '2018/2019', '1st Term', 'GD3562', 'DEBORAH NEEDS TO WORK HARDER', 'midterm', '2018-10-30 14:39:25'),
(2003, 0, '2018/2019', '1st Term', 'GD2193', 'VERY GOOD RESULT.', 'midterm', '2018-10-30 14:39:31'),
(2006, 0, '2018/2019', '1st Term', 'NR1625', 'A VERY GOOD RESULT. KEEP IT UP .', 'midterm', '2018-10-30 14:40:10'),
(2007, 0, '2018/2019', '1st Term', 'GD2188', 'VERY GOOD RESULT.', 'midterm', '2018-10-30 14:42:19'),
(2008, 0, '2018/2019', '1st Term', 'GD3064', 'FIYINFOLUWA HAS DONE WELL', 'midterm', '2018-10-30 14:42:59'),
(2009, 0, '2018/2019', '1st Term', 'NR1457', 'A VERY GOOD RESULT .', 'midterm', '2018-10-30 14:43:12'),
(2010, 0, '2018/2019', '1st Term', 'NR1508', 'A VERY GOOD RESULT .', 'midterm', '2018-10-30 14:45:41'),
(2011, 0, '2018/2019', '1st Term', 'GD2269', 'VERY  GOOD RESULT.', 'midterm', '2018-10-30 14:46:51'),
(2012, 0, '2018/2019', '1st Term', 'GD2466', '', 'midterm', '2018-10-30 14:49:30'),
(2013, 0, '2018/2019', '1st Term', 'GD3154', 'keep it up.', 'midterm', '2018-10-30 15:52:19'),
(2014, 0, '2018/2019', '1st Term', 'PG0629', 'Zahra is intelligent and accommodatng. She has positive attitude towards learning.', '', '2018-12-03 10:46:43'),
(2015, 0, '2018/2019', '1st Term', 'RC0121', 'SHETEMIPE HAS GOOD ATTITUDE TOWARDS CLASS ACTIVITIES.', '', '2018-12-03 10:50:14'),
(2041, 0, '2018/2019', '1st Term', 'PG0626', 'Michael is friendly and has positive attitude towards learning.', '', '2018-12-03 10:59:08'),
(2042, 0, '2018/2019', '1st Term', 'RC0646', 'Nora is brilliant and calm. She has ability to do better next term.', '', '2018-12-03 10:59:26'),
(2043, 0, '2018/2019', '1st Term', 'RC0585', 'Gertrude is neat and always ready to learn.', '', '2018-12-03 11:00:48'),
(2045, 0, '2018/2019', '1st Term', 'RC0126', ' DAMILOJU\'S PERFORMANCE THIS TERM IS EXCELLENT. KEEP IT UP.', '', '2018-12-03 11:00:50'),
(2052, 0, '2018/2019', '1st Term', 'RC0123', 'JOSHUA HAS GREAT POTENTIALS. HE HAS PERFORMED BEAUTIFULLY THIS TERM. KEEP IT UP.', '', '2018-12-03 11:07:06'),
(2053, 0, '2018/2019', '1st Term', 'RC0641', 'Jamaldeen is intelligent and friendly. He responds well during class activities.', '', '2018-12-03 11:08:50'),
(2054, 0, '2018/2019', '1st Term', 'RC0657', 'Blossom is a friendly boy and he has positive attitude towards learning. ', '', '2018-12-03 11:10:02'),
(2055, 0, '2018/2019', '1st Term', 'RC0530', 'Ireayomi is friendly and always eager to learn.', '', '2018-12-03 11:10:32'),
(2057, 0, '2018/2019', '1st Term', 'RC0122', 'Victoria is always neat and calm.', '', '2018-12-03 11:16:17'),
(2062, 0, '2018/2019', '1st Term', 'RC0128', 'TOYOSI IS FRIENDLY AND VOCAL.', '', '2018-12-03 11:18:01'),
(2064, 0, '2018/2019', '1st Term', 'RC0125', 'Morola is friendly and smart.', '', '2018-12-03 11:22:11'),
(2066, 0, '2018/2019', '1st Term', 'RC0130', 'ALEX IS AN INTELLIGENT CHILD. HE IS ALWAYS READY TO LEARN.', '', '2018-12-03 11:22:44'),
(2068, 0, '2018/2019', '1st Term', 'RC0144', 'Jenrola is always reserved and intelligent.', '', '2018-12-03 11:25:38'),
(2070, 0, '2018/2019', '1st Term', 'RC0655', 'Obanijesu is friendly, intelligent and has positive attitude towards learning.', '', '2018-12-03 11:26:28'),
(2071, 0, '2018/2019', '1st Term', 'NR1662', 'JAMES IS A RESERVED CHILD. HE HAS GOOD ATTITUDE TOWARDS CLASS ACTIVITIES.', '', '2018-12-03 11:26:41'),
(2074, 0, '2018/2019', '1st Term', 'PG0638', 'Jessica is friendly, loveable and eager to learn.', '', '2018-12-03 11:29:27'),
(2076, 0, '2018/2019', '1st Term', 'RC0142', 'SHOLAFUNMI HAS GREAT POTENTIALS. SHE HAS PERFORMED EXCELLENTLY THIS TERM. KEEP IT UP.', '', '2018-12-03 11:30:28'),
(2077, 0, '2018/2019', '1st Term', 'RC0127', 'Zeeyad is cheerful and brilliant.', '', '2018-12-03 11:31:00'),
(2080, 0, '2018/2019', '1st Term', 'RC0129', 'Paul is friendly and intelligent.', '', '2018-12-03 11:40:22'),
(2083, 0, '2018/2019', '1st Term', 'PG0637', 'Iremisinposi is very active and she is eager to learn.', '', '2018-12-03 11:40:37'),
(2084, 0, '2018/2019', '1st Term', 'PG0575', 'Samuel is intelligent and active. He participates well in the class.', '', '2018-12-03 11:41:12'),
(2087, 0, '2018/2019', '1st Term', 'RC0141', 'Oluwatomi is always neat and intelligent.', '', '2018-12-03 11:46:21'),
(2089, 0, '2018/2019', '1st Term', 'RC0132', 'RICHARD IS A BRILLIANT CHILD. HE HAS GOOD ATTITUDE TOWARDS CLASS ACTIVITIES.', '', '2018-12-03 11:47:44'),
(2091, 0, '2018/2019', '1st Term', 'PG0617', 'Erere is brilliant and calm. He has positive attitude towards learning.', '', '2018-12-03 11:50:30'),
(2092, 0, '2018/2019', '1st Term', 'RC0133', 'HEPHZIBAH HAS GREAT POTENTIALS. SHE HAS GOOD ATTITUDE TOWARDS LEARNING.', '', '2018-12-03 11:50:47'),
(2093, 0, '2018/2019', '1st Term', 'RC0666', 'David is a brilliant boy and he has positive attitude towards learning.', '', '2018-12-03 11:51:07'),
(2094, 0, '2018/2019', '1st Term', 'RC0131', 'Jaden is friendly and intelligent.', '', '2018-12-03 11:52:51'),
(2100, 0, '2018/2019', '1st Term', 'PG0631', 'Diekoniseoluwa is calm and friendly. He is learning at is own pace.', '', '2018-12-03 11:54:08'),
(2101, 0, '2018/2019', '1st Term', 'RC0623', 'BRIDGET IS A RESERVED CHILD. SHE HAS GOOD ATTITUDE TOWARDS LEARNING.', '', '2018-12-03 11:55:24'),
(2102, 0, '2018/2019', '1st Term', 'RC0137', 'Rachael is calm and intelligent.', '', '2018-12-03 11:56:41'),
(2105, 0, '2018/2019', '1st Term', 'NRI668', 'JOAN IS A BRILLIANT CHILD. SHE HAS PERFORMED GREATLY THIS TERM. KEEP IT UP.', '', '2018-12-03 11:58:07'),
(2107, 0, '2018/2019', '1st Term', 'RC0663', 'Taiwo is a friendly girl and she is eager to learn. ', '', '2018-12-03 11:58:50'),
(2108, 0, '2018/2019', '1st Term', 'RC0138', 'Araoluwa is friendly and always ready to learn.', '', '2018-12-03 12:01:47'),
(2110, 0, '2018/2019', '1st Term', 'PG0669', 'Adrian is very active and eager to learn.', '', '2018-12-03 12:02:33'),
(2111, 0, '2018/2019', '1st Term', 'RC0140', 'ADEBARE HAS IMPROVED ACADEMICALLY. DO NOT RELENT NEXT TERM.', '', '2018-12-03 12:02:55'),
(2113, 0, '2018/2019', '1st Term', 'PG0621', 'Morayomi is brilliant and friendly. She is eager to learn.', '', '2018-12-03 12:03:55'),
(2114, 0, '2018/2019', '1st Term', 'RC064', 'Kehinde is brillant. She has positive attitude towards learning.', '', '2018-12-03 12:04:09'),
(2115, 0, '2018/2019', '1st Term', 'RC0139', 'Godwin is vocal and friendly.', '', '2018-12-03 12:07:45'),
(2119, 0, '2018/2019', '1st Term', 'PG0632', 'Demilade is a promising child and has positive attitude towards learning.', '', '2018-12-03 12:08:20'),
(2121, 0, '2018/2019', '1st Term', 'PG0622', 'Moralake is calm and friendly. She has ability to do better next term.', '', '2018-12-03 12:12:22'),
(2122, 0, '2018/2019', '1st Term', 'RC0661', 'Ifeoluwa is friendly, brilliant and has positive attitude towards learning.', '', '2018-12-03 12:13:59'),
(2123, 0, '2018/2019', '1st Term', 'PG0639', 'Treasure is friendly and eager to learn.', '', '2018-12-03 12:15:17'),
(2125, 0, '2018/2019', '1st Term', 'RC0667', 'Ayooluwa is intelligent and friendly. He does his work with excitment.', '', '2018-12-03 12:19:27'),
(2126, 0, '2018/2019', '1st Term', 'PG0665', 'Oluwatise is friendly and always eager to learn.', '', '2018-12-03 12:22:24'),
(2127, 0, '2018/2019', '1st Term', 'PG0594', 'Liam is friendly, intelligent and has positive attitude toward learning.', '', '2018-12-03 12:27:09'),
(2128, 0, '2018/2019', '1st Term', 'PG0633', 'Oluwatomisin is very active and eager to learn', '', '2018-12-03 12:29:24'),
(2129, 0, '2018/2019', '1st Term', 'RC0643', 'Emmanuella is intelligent, loveable and has positive attitude towards learning.', '', '2018-12-03 12:32:52'),
(2130, 0, '2018/2019', '1st Term', 'PG0634', 'Oluwatofunmi is calm and eager to learn.', '', '2018-12-03 12:33:26'),
(2131, 0, '2018/2019', '1st Term', 'PG0607', 'Tamilore is friendly and vocal.', '', '2018-12-03 12:36:10'),
(2132, 0, '2018/2019', '1st Term', 'PG0636', 'Maria Faustina is intelligent and accomondating. keep the candle light burning my girl.', '', '2018-12-03 12:39:32'),
(2133, 0, '2018/2019', '1st Term', 'RC0647', 'Judah is intelligent and friendly. He has a good attitude towards learning.', '', '2018-12-03 12:41:19'),
(2135, 0, '2018/2019', '1st Term', 'PG0635', 'Hezekiah is very active and eager to learn.', '', '2018-12-03 12:49:36'),
(2136, 0, '2018/2019', '1st Term', 'PG0572', 'Franklin is calm, friendly and has positive attitude towards learning. ', '', '2018-12-03 12:50:10'),
(2137, 0, '2018/2019', '1st Term', 'PG0630', 'Nora is friendly, loveable and always eager to learn.', '', '2018-12-03 12:56:28'),
(2138, 0, '2018/2019', '1st Term', 'PG0610', 'Funmilola is friendly and brillant.', '', '2018-12-03 12:57:32'),
(2139, 0, '2018/2019', '1st Term', 'GD5538', 'You have done well but you need to work more on those weak areas against  next term.', 'terminal', '2018-12-05 09:35:14'),
(2140, 0, '2018/2019', '1st Term', 'GD5426', 'Your performance is commendable but you need to work more on those weak areas.', 'terminal', '2018-12-05 09:44:40'),
(2142, 0, '2018/2019', '1st Term', 'GD5564', 'Your performance is highly commendable but you should work harder in those weak areas.', 'terminal', '2018-12-05 09:48:28'),
(2145, 0, '2018/2019', '1st Term', 'GD5619', 'This is a very good performance, keep up the good work and work harder in your Numeracy and Quantitative.', 'terminal', '2018-12-05 09:52:31'),
(2149, 0, '2018/2019', '1st Term', 'GD5571', 'You have improved greatly but you can still do better.', 'terminal', '2018-12-05 10:02:23'),
(2151, 0, '2018/2019', '1st Term', 'GD5435', 'Semilore has improved greatly, but there is still room for improvement.', 'terminal', '2018-12-05 10:05:52'),
(2161, 0, '2018/2019', '1st Term', 'GD5545', 'This is an impressive performance, please keep it up and work harder in those areas you are weak.', 'terminal', '2018-12-05 10:11:31'),
(2163, 0, '2018/2019', '1st Term', 'GD5065', 'This is an impressive performance, please keep it and work harder.', 'terminal', '2018-12-05 10:15:23'),
(2178, 0, '2018/2019', '1st Term', 'NR2537', 'THIS IS A WONDERFUL RESULT.', 'midterm', '2018-12-05 13:56:52'),
(2180, 0, '2018/2019', '1st Term', 'GD4157', 'An excellent performance. Keep up the momentum.', 'terminal', '2018-12-05 13:58:36'),
(2181, 0, '2018/2019', '1st Term', 'GD1287', 'GREAT RESULT. ', 'midterm', '2018-12-05 14:01:22'),
(2182, 0, '2018/2019', '1st Term', 'GD4158', 'An excellent performance. Keep up the momentum.', 'terminal', '2018-12-05 14:02:41'),
(2183, 0, '2018/2019', '1st Term', 'NR2369', 'this is definitely not your best. Do not relent', 'midterm', '2018-12-05 14:03:24'),
(2184, 0, '2018/2019', '1st Term', 'GD2658', 'This is a good result. Keep up the good work.', 'midterm', '2018-12-05 14:05:11'),
(2185, 0, '2018/2019', '1st Term', 'GD2650', 'A good result. Tamilore has  great potentials.  ', 'terminal', '2018-12-05 14:08:04'),
(2187, 0, '2018/2019', '1st Term', 'NR2456', 'An excellent performance. keep the ball rolling.', 'terminal', '2018-12-05 14:10:59'),
(2188, 0, '2018/2019', '1st Term', 'GD2656', 'He is greatly improving. He is friendly and active. ', 'terminal', '2018-12-05 14:11:18'),
(2191, 0, '2018/2019', '1st Term', 'GD4070', 'An outstanding performance, keep shining, Ireoluwa. ', 'terminal', '2018-12-05 14:16:58'),
(2192, 0, '2018/2019', '1st Term', 'NR2527', 'An excellent performance. keep up the good work.', 'terminal', '2018-12-05 14:18:18'),
(2193, 0, '2018/2019', '1st Term', 'GD1331', 'A Good result, Keep progressing! ', 'terminal', '2018-12-05 14:18:43'),
(2194, 0, '2018/2019', '1st Term', 'GD1527', 'His attitude towards school work is excellent. Great performance. ', 'terminal', '2018-12-05 14:19:42'),
(2195, 0, '2018/2019', '1st Term', 'GD3574', 'FIYINFOLUWA KEEPS IMPROVING BY THE DAY. ', 'terminal', '2018-12-05 14:21:50'),
(2196, 0, '2018/2019', '1st Term', 'NR2322', 'THIS IS A GOOD RESULT. KEEP IT UP.', 'terminal', '2018-12-05 14:22:44'),
(2197, 0, '2018/2019', '1st Term', 'GD1287', 'An execellent result. keep shining, Kelvin. ', 'terminal', '2018-12-05 14:22:48'),
(2198, 0, '2018/2019', '1st Term', 'GD4252', 'A good result, keep moving up,  Temiloluwa.', 'terminal', '2018-12-05 14:23:08'),
(2199, 0, '2018/2019', '1st Term', 'NR2418', 'An excellent performance. keep up the good work.', 'terminal', '2018-12-05 14:24:05'),
(2200, 0, '2018/2019', '1st Term', 'GD1558', 'A good result. He has a great potential and works towards achieving it.', 'terminal', '2018-12-05 14:24:38'),
(2202, 0, '2018/2019', '1st Term', 'NR2581', 'THIS IS A VERY GOOD RESULT. DO NOT RELENT.', 'terminal', '2018-12-05 14:25:38'),
(2204, 0, '2018/2019', '1st Term', 'NR2329', 'A VERY GOOD PERFORMANCE. DO NOT RELENT', 'terminal', '2018-12-05 14:26:51'),
(2208, 0, '2018/2019', '1st Term', 'GD1612', 'His grades are super. He is intelligent and helpful. ', 'terminal', '2018-12-05 14:30:13'),
(2209, 0, '2018/2019', '1st Term', 'NR2360', 'SWEET AND EXCELLENT PERFORMANCE. DO NOT RELENT', 'terminal', '2018-12-05 14:30:28'),
(2210, 0, '2018/2019', '1st Term', 'GD1582', 'An excellent performance. He is friendly and active.', 'terminal', '2018-12-05 14:30:46'),
(2211, 0, '2018/2019', '1st Term', 'NR2388', 'An intelligent performance. keep up the good work.', 'terminal', '2018-12-05 14:30:55'),
(2212, 0, '2018/2019', '1st Term', 'GD4207', 'An excellent piece of work, keep it up.', 'terminal', '2018-12-05 14:32:20'),
(2213, 0, '2018/2019', '1st Term', 'NR2537', 'THIS IS A WONDERFUL PERFORMANCE. DO NOT RELENT. ', 'terminal', '2018-12-05 14:33:04'),
(2214, 0, '2018/2019', '1st Term', 'GD4584', 'A good result, keep moving up, Isaac. ', 'terminal', '2018-12-05 14:33:24'),
(2216, 0, '2018/2019', '1st Term', 'GD4087', 'An excellent work, keep it up.', 'terminal', '2018-12-05 14:34:31'),
(2218, 0, '2018/2019', '1st Term', 'NR2369', 'A GOOD RESULT. DO NOT RELENT', 'terminal', '2018-12-05 14:35:15'),
(2219, 0, '2018/2019', '1st Term', 'NR2408', 'An intelligent performance. keep moving higher.', 'terminal', '2018-12-05 14:36:25'),
(2220, 0, '2018/2019', '1st Term', 'NR2346', 'A very good result. Keep progressing.', 'terminal', '2018-12-05 14:37:34'),
(2221, 0, '2018/2019', '1st Term', 'GD4479', 'An excellent performance, keep it up.', 'terminal', '2018-12-05 14:37:42'),
(2222, 0, '2018/2019', '1st Term', 'GD2651', 'He is improving gradually, He is obedient and respectful. ', 'terminal', '2018-12-05 14:37:52'),
(2223, 0, '2018/2019', '1st Term', 'GD3474', 'CHUKUMA HAS A GREAT ATTITUDE AND A POSITIVE APPROACH TOWARDS LEARNING. ', 'terminal', '2018-12-05 14:39:13'),
(2225, 0, '2018/2019', '1st Term', 'GD4478', 'an excellent performance, keep it up.', 'terminal', '2018-12-05 14:40:50'),
(2226, 0, '2018/2019', '1st Term', 'GD4595', 'An excellent performance, keep shining, Joseph.', 'terminal', '2018-12-05 14:40:54'),
(2227, 0, '2018/2019', '1st Term', 'GD1565', 'A Wonderful result. He has a good attitude toward learning. ', 'terminal', '2018-12-05 14:41:55'),
(2228, 0, '2018/2019', '1st Term', 'NR2568', 'THIS IS A GOOD RESULT. KEEP PROGRESSING.', 'terminal', '2018-12-05 14:42:17'),
(2230, 0, '2018/2019', '1st Term', 'GD4219', 'An excellent performance, keep it up.', 'terminal', '2018-12-05 14:43:03'),
(2231, 0, '2018/2019', '1st Term', 'GD1462', 'A great result, keep it up. Good grades.', 'terminal', '2018-12-05 14:43:52'),
(2232, 0, '2018/2019', '1st Term', 'GD4415', 'An outstanding performance, keep on shining, Taiwo. ', 'terminal', '2018-12-05 14:43:58'),
(2233, 0, '2018/2019', '1st Term', 'NR2321', 'An intelligent performance. keep on progressing.', 'terminal', '2018-12-05 14:44:50'),
(2234, 0, '2018/2019', '1st Term', 'GD4152', 'An excellent performance, keep it up.', 'terminal', '2018-12-05 14:45:20'),
(2236, 0, '2018/2019', '1st Term', 'NR2547', 'KEEP UP THIS GOOD WORK AND DO NOT RELENT.', 'terminal', '2018-12-05 14:46:18'),
(2238, 0, '2018/2019', '1st Term', 'GD1640', 'An excellent performance. keep on progressing.', 'terminal', '2018-12-05 14:48:23'),
(2239, 0, '2018/2019', '1st Term', 'GD3134', 'SINMI HAS A GREAT POTENTIAL.  ', 'terminal', '2018-12-05 14:48:39'),
(2240, 0, '2018/2019', '1st Term', 'GD1441', 'she has earned  a fine result. She is pleasant and friendly. ', 'terminal', '2018-12-05 14:49:07'),
(2241, 0, '2018/2019', '1st Term', 'NR2516', ' THE SKY IS YOUR STARTING POINT, DO NOT RELENT MY BOY. ', 'terminal', '2018-12-05 14:50:07'),
(2242, 0, '2018/2019', '1st Term', 'GD4476', 'Joba has a positive attitude towards learning. Keep it up.', 'terminal', '2018-12-05 14:50:15'),
(2243, 0, '2018/2019', '1st Term', 'GD4117', 'An excellent result, shine on, Praise.', 'terminal', '2018-12-05 14:50:54'),
(2244, 0, '2018/2019', '1st Term', 'GD2652', 'A great result, She is friendly and cheerful in class. ', 'terminal', '2018-12-05 14:52:52'),
(2245, 0, '2018/2019', '1st Term', 'NR2611', 'THIS IS A GOOD RESULT. KEEP IT UP.', 'terminal', '2018-12-05 14:53:26'),
(2246, 0, '2018/2019', '1st Term', 'GD4472', 'Ope has shown an encouraging desie towards learning. Keep it up.', 'terminal', '2018-12-05 14:53:55'),
(2247, 0, '2018/2019', '1st Term', 'GD3154', 'TENILOA KEEPS IMPROVING BY THE DAY.  ', 'terminal', '2018-12-05 14:53:56'),
(2248, 0, '2018/2019', '1st Term', 'GD1311', 'A great performance. He is always active and  ready to learn.', 'terminal', '2018-12-05 14:55:36'),
(2249, 0, '2018/2019', '1st Term', 'GD4104', 'Seyitan is friendly and cheerful. Keep up the momentum.', 'terminal', '2018-12-05 14:57:35'),
(2250, 0, '2018/2019', '1st Term', 'GD4496', 'A good result., keep progressing, Mayomikun. ', 'terminal', '2018-12-05 14:57:46'),
(2251, 0, '2018/2019', '1st Term', 'NR2489', 'A very good performance. Keep on progressing.', 'terminal', '2018-12-05 14:58:06'),
(2252, 0, '2018/2019', '1st Term', 'GD1438', 'A  very good result, she keeps improving by the day. ', 'terminal', '2018-12-05 14:58:07'),
(2253, 0, '2018/2019', '1st Term', 'NR2386', 'THIS IS A WONDERFUL PERFORMANCE, DO NOT RELENT', 'terminal', '2018-12-05 14:59:31'),
(2254, 0, '2018/2019', '1st Term', 'GD3563', 'FIKAYOMI HAS POTENTIAL BUT NEEDS TO BE MORE SERIOUS WITH HIS ACADEMICS. ', 'terminal', '2018-12-05 15:00:06'),
(2255, 0, '2018/2019', '1st Term', 'GD1620', 'He has a good attitude towards learning. He is consistenly progressing.', 'terminal', '2018-12-05 15:00:20'),
(2256, 0, '2018/2019', '1st Term', 'NR2597', 'A good performance. keep on progressing.', 'terminal', '2018-12-05 15:11:07'),
(2257, 0, '2018/2019', '1st Term', 'GD4439', 'Tunbuyi has pleasant attitude towards learning.', 'terminal', '2018-12-05 15:11:36'),
(2258, 0, '2018/2019', '1st Term', 'GD4416', 'An excellent performance, keep the flag flying, Kehinde.', 'terminal', '2018-12-05 15:12:32'),
(2259, 0, '2018/2019', '1st Term', 'GD3592', 'HABEEB IS CONSISTENTLY PROGRESSING. ', 'terminal', '2018-12-05 15:12:39'),
(2260, 0, '2018/2019', '1st Term', 'GD1261', 'Darasimi is a sweet and co-operative girl. An excellent result.  ', 'terminal', '2018-12-05 15:14:03'),
(2261, 0, '2018/2019', '1st Term', 'GD4463', 'Gold has a cheerful attitude towards learning.', 'terminal', '2018-12-05 15:14:08'),
(2262, 0, '2018/2019', '1st Term', 'GD4201', 'Foyin is friendly and cheerful in class.', 'terminal', '2018-12-05 15:16:24'),
(2263, 0, '2018/2019', '1st Term', 'GD3428', 'DANIEL HAS GOOD ATTITUDE TOWARDS LEARNING.  ', 'terminal', '2018-12-05 15:16:48'),
(2264, 0, '2018/2019', '1st Term', 'GD1304', 'Great performance. He is intelligent and has a positive approach towards learning.', 'terminal', '2018-12-05 15:17:14'),
(2266, 0, '2018/2019', '1st Term', 'GD1495', 'A Wonderful result, keep the flag flying. ', 'terminal', '2018-12-05 15:20:36'),
(2267, 0, '2018/2019', '1st Term', 'NR2430', 'An excellent performance. Keep on progressing.', 'terminal', '2018-12-05 15:20:50'),
(2268, 0, '2018/2019', '1st Term', 'GD4213', 'Timilehin has shown an encouraging desire towards learning.', 'terminal', '2018-12-05 15:21:27'),
(2270, 0, '2018/2019', '1st Term', 'GD3566', 'SAMUEL HAS GREAT DISPOSITION TOWARDS LEARNING. ', 'terminal', '2018-12-05 15:21:58'),
(2274, 0, '2018/2019', '1st Term', 'GD2658', 'A good result. She has a good attitude towards learning.', 'terminal', '2018-12-05 15:24:00'),
(2275, 0, '2018/2019', '1st Term', 'GD3163', 'AYOMIDE HAS EARNED A BEAUTIFUL RESULT. ', 'terminal', '2018-12-05 15:25:19'),
(2276, 0, '2018/2019', '1st Term', 'GD4184', '', 'terminal', '2018-12-05 15:25:42'),
(2277, 0, '2018/2019', '1st Term', 'GD1327', 'She has earned a very beautiful result, She is pleasant and friendly. ', 'terminal', '2018-12-05 15:26:26'),
(2278, 0, '2018/2019', '1st Term', 'NR2624', 'An excellent performance. Keep on progressing.', 'terminal', '2018-12-05 15:27:35'),
(2279, 0, '2018/2019', '1st Term', 'GD1578', 'A good result. She is friendly and active.', 'terminal', '2018-12-05 15:28:15'),
(2281, 0, '2018/2019', '1st Term', 'GD4649', 'TIMILEHIN HAS GREAT POTENTIAL AND HE IS WORKING TOWARDS ACHIEVING MORE. ', 'terminal', '2018-12-05 15:30:00'),
(2282, 0, '2018/2019', '1st Term', 'GD2660', 'A good result, she is making steady progress academically. ', 'terminal', '2018-12-05 15:30:09'),
(2286, 0, '2018/2019', '1st Term', 'GD1410', 'Eniola has earned a fine result. She is pleasant and friendly.', 'terminal', '2018-12-05 15:33:05'),
(2287, 0, '2018/2019', '1st Term', 'GD3493', 'MOFESADE KEEPS IMPROVING BY THE DAY. ', 'terminal', '2018-12-05 15:34:11'),
(2288, 0, '2018/2019', '1st Term', 'NR2359', 'An excellent performance. Keep on progressing.', 'terminal', '2018-12-05 15:36:35'),
(2289, 0, '2018/2019', '1st Term', 'GD3064', 'FIYINFOLUWA  KEEPS IMPROVING BY THE DAY. ', 'terminal', '2018-12-05 15:37:44'),
(2290, 0, '2018/2019', '1st Term', 'NR2345', 'THIS IS A GOOD RESULT. KEEP IT UP.', 'terminal', '2018-12-05 15:38:23'),
(2291, 0, '2018/2019', '1st Term', 'GD1353', 'A very good result, she is consistently progressing.', 'terminal', '2018-12-05 15:38:51'),
(2292, 0, '2018/2019', '1st Term', 'GD3160', 'INIOLUWA IS BEGINNING TO SHOW PASSION FOR STUDY. ', 'terminal', '2018-12-05 15:40:10'),
(2293, 0, '2018/2019', '1st Term', 'NR2413', 'An excellent performance. Keep on progressing.', 'terminal', '2018-12-05 15:40:20'),
(2294, 0, '2018/2019', '1st Term', 'GD3286', 'DARASIMI IS AN EXCELLENY PERFORMER.  ', 'terminal', '2018-12-05 15:42:59'),
(2295, 0, '2018/2019', '1st Term', 'NR2391', 'A very good performance. Keep on progressing.', 'terminal', '2018-12-05 15:44:08'),
(2296, 0, '2018/2019', '1st Term', 'GD1296', 'A good result. He is friendly and active.', 'terminal', '2018-12-05 15:44:48'),
(2297, 0, '2018/2019', '1st Term', 'GD3562', 'DEBORAH HAS GREAT POTENTIAL BUT NEEDS TO BE MORE SERIOUS WITH HER STUDIES. ', 'terminal', '2018-12-05 15:45:49'),
(2298, 0, '2018/2019', '1st Term', 'RC0670', 'Tijesu is a brilliant boy.', '', '2018-12-06 10:41:24'),
(2302, 0, '2018/2019', '1st Term', 'GD4162', 'An excellent result, keep moving up,   Ayomipo. ', 'terminal', '2018-12-06 11:01:05'),
(2304, 0, '2018/2019', '1st Term', 'GD4444', 'A good result, keep progressing, Anuoluwapo.', 'terminal', '2018-12-06 11:07:39'),
(2305, 0, '2018/2019', '1st Term', 'GD4510', 'An intelligent result, keep shining, Erinayo. ', 'terminal', '2018-12-06 11:10:42'),
(2307, 0, '2018/2019', '1st Term', 'GD4248', 'An excellent performance, keep moving on , Yanmife. ', 'terminal', '2018-12-06 11:14:09'),
(2310, 0, '2018/2019', '1st Term', 'GD3561', 'Moyo is very calm and highly attentively in the class.', 'terminal', '2018-12-06 11:22:56'),
(2314, 0, '2018/2019', '1st Term', 'GD3241', 'A very good result, keep it up.', 'midterm', '2018-12-06 11:43:06'),
(2319, 0, '2018/2019', '1st Term', 'GD3536', 'Brilliant performance, keep it up.', 'terminal', '2018-12-06 11:58:23'),
(2320, 0, '2018/2019', '1st Term', 'GD3615', 'A very good result, keep it up.', 'terminal', '2018-12-06 12:02:53'),
(2323, 0, '2018/2019', '1st Term', 'GD3403', 'Excellent performance, keep it up.', 'terminal', '2018-12-06 12:06:39'),
(2328, 0, '2018/2019', '1st Term', 'GD2229', 'Ezekiel has a good result, Keep improving. ', 'terminal', '2018-12-06 12:09:36'),
(2333, 0, '2018/2019', '1st Term', 'GD3250', 'Adefolarin has improved drastically, however, there is room for more improvement. Good result.', 'terminal', '2018-12-06 12:13:33'),
(2341, 0, '2018/2019', '1st Term', 'GD3293', 'Bolu is a potential star to watch out for. A very good result, keep it up. ', 'terminal', '2018-12-06 12:22:37'),
(2347, 0, '2018/2019', '1st Term', 'GD2593', 'ESTHER HAS A GOOD RESULT, KEEP IMPROVING.  ', 'terminal', '2018-12-06 12:39:52'),
(2349, 0, '2018/2019', '1st Term', 'GD3096', 'Oreoluwa needs to be more calm in the class. Good result.', 'terminal', '2018-12-06 12:44:13'),
(2350, 0, '2018/2019', '1st Term', 'GD3173', 'Excellent performance, keep it up.', 'terminal', '2018-12-06 12:46:57'),
(2354, 0, '2018/2019', '1st Term', 'GD3241', 'Excellent performance, keep it up.', 'terminal', '2018-12-06 12:50:19'),
(2356, 0, '2018/2019', '1st Term', 'GD2280', 'CHANIEL HAS AN EXCELLENT RESULT. KEEP IT UP. ', 'terminal', '2018-12-06 12:51:27'),
(2359, 0, '2018/2019', '1st Term', 'GD2234', 'KOREDE HAS POTENTIALS IN HIM. KEEP IMPROVING NEXT TERM. ', 'terminal', '2018-12-06 12:55:25'),
(2360, 0, '2018/2019', '1st Term', 'GD3424', 'Excellent performance, keep it up.', 'terminal', '2018-12-06 12:56:18'),
(2362, 0, '2018/2019', '1st Term', 'GD2531', 'OBATOFARATI HAS AN EXCELLENT RESULT. KEEP IT UP. ', 'terminal', '2018-12-06 12:58:07'),
(2366, 0, '2018/2019', '1st Term', 'GD2437', 'MODESIRE HAS A GREAT POTENTIAL. ', 'terminal', '2018-12-06 13:02:04'),
(2370, 0, '2018/2019', '1st Term', 'GD3206', 'Excellent performance, keep it up.', 'terminal', '2018-12-06 13:04:22'),
(2371, 0, '2018/2019', '1st Term', 'GD2567', 'NAOMI HAS A GREAT POTENTIAL IN HER, KEEP IMPROVING. ', 'terminal', '2018-12-06 13:04:31'),
(2374, 0, '2018/2019', '1st Term', 'GD2342', 'TOMILAYO HAS AN EXCELLENT RESULT. KEEP FLYING. ', 'terminal', '2018-12-06 13:09:27'),
(2375, 0, '2018/2019', '1st Term', 'GD3089', 'David needs to put more effort on his speed. Good result.', 'terminal', '2018-12-06 13:11:36'),
(2377, 0, '2018/2019', '1st Term', 'GD2303', 'ADERINSOLA HAS A GREAT RESULT, KEEP IMPROVING. ', 'terminal', '2018-12-06 13:12:58'),
(2383, 0, '2018/2019', '1st Term', 'GD2232', 'ENOCH HAS AN OUTSTANDING RESULT, KEEP IT UP. ', 'terminal', '2018-12-06 13:14:45'),
(2385, 0, '2018/2019', '1st Term', 'GD2282', 'Olamide has an excellent result. Keep shining. ', 'terminal', '2018-12-06 13:16:09'),
(2390, 0, '2018/2019', '1st Term', 'GD2586', 'Daniel has a good result and also a great potential.  ', 'terminal', '2018-12-06 13:19:51'),
(2392, 0, '2018/2019', '1st Term', 'GD2223', 'Ayomitide has an excellent result. Keep shining. ', 'terminal', '2018-12-06 13:20:51'),
(2393, 0, '2018/2019', '1st Term', 'GD2509', 'SAAD HAS A GREAT RESULT. KEEP IT UP. ', 'terminal', '2018-12-06 13:21:30'),
(2394, 0, '2018/2019', '1st Term', 'GD2107', 'Amir has an outstanding result, keep it up. ', 'terminal', '2018-12-06 13:23:33'),
(2395, 0, '2018/2019', '1st Term', 'GD2278', 'Seyitoju has a good result, keep improving. ', 'terminal', '2018-12-06 13:24:21'),
(2396, 0, '2018/2019', '1st Term', 'GD2338', 'MAYOWA HAS A GREAT RESULT, HE IS HELPFUL IN CLASS. ', 'terminal', '2018-12-06 13:24:26'),
(2397, 0, '2018/2019', '1st Term', 'GD2553', 'Pemisire has a great result, Keep shining. ', 'terminal', '2018-12-06 13:26:08'),
(2398, 0, '2018/2019', '1st Term', 'GD2395', 'Toluwanimi has an outstanding result and a great zeal towards learning. ', 'terminal', '2018-12-06 13:27:37'),
(2399, 0, '2018/2019', '1st Term', 'GD2497', 'KELVIN HAS A POTENTIAL IN HIM. KEEP IMPROVING. ', 'terminal', '2018-12-06 13:27:50'),
(2400, 0, '2018/2019', '1st Term', 'GD2292', 'Ewaoluwa has an excellent result and also a great attitude towards learning. ', 'terminal', '2018-12-06 13:30:21'),
(2401, 0, '2018/2019', '1st Term', 'GD2579', 'FERANMI HAS A GREAT RESULT AND ALSO A GOOD ATTITUDE TOWARDS LEARNING.  ', 'terminal', '2018-12-06 13:30:55'),
(2402, 0, '2018/2019', '1st Term', 'GD2194', 'Emotite has an excellent result, keep shining. ', 'terminal', '2018-12-06 13:32:05'),
(2403, 0, '2018/2019', '1st Term', 'GD2432', 'Eniola has a good result, keep improving. ', 'terminal', '2018-12-06 13:33:09'),
(2404, 0, '2018/2019', '1st Term', 'GD3645', 'IREOLUWATOMIWA HAS A GREAT RESULT, KEEP SHINNING. ', 'terminal', '2018-12-06 13:33:48'),
(2405, 0, '2018/2019', '1st Term', 'GD2653', 'Okikiola has a good result and a good attitude towards learning. ', 'terminal', '2018-12-06 13:35:05'),
(2406, 0, '2018/2019', '1st Term', 'GD2193', 'OLAMIDE HAS A GREAT RESULT, KEEP FLYING  NEXT TERM. ', 'terminal', '2018-12-06 13:37:12'),
(2407, 0, '2018/2019', '1st Term', 'GD2188', 'DAVID HAS A GREAT RESULT AND A CALM ATTITUDE IN CLASS. ', 'terminal', '2018-12-06 13:42:32'),
(2408, 0, '2018/2019', '1st Term', 'GD2269', 'DAVID HAS A GREAT RESULT, KEEP IMPROVING NEXT TERM. ', 'terminal', '2018-12-06 13:44:11'),
(2411, 0, '2018/2019', '1st Term', 'GD2466', 'JOY HAS A WILLING AND CONSISTENT ATTITUDE TOWARDS LEARNING.  ', 'terminal', '2018-12-06 13:51:08'),
(2422, 0, '2018/2019', '1st Term', 'GD2485', 'Eri-Ife has an excellent result, keep shining. ', 'terminal', '2018-12-06 14:28:16'),
(2430, 0, '2018/2019', '1st Term', 'GD2539', 'Semilore has a good result, keep improving. ', 'terminal', '2018-12-06 14:33:13'),
(2438, 0, '2018/2019', '1st Term', 'NR1596', 'She is a very talented child who is confident enough in her skills.', 'fullterm', '2018-12-07 08:22:33'),
(2439, 0, '2018/2019', '1st Term', 'NR1459', 'An excellent result. Keep it up.', 'fullterm', '2018-12-07 08:26:34'),
(2440, 0, '2018/2019', '1st Term', 'NR1528', 'Ifeoluwa is delightful in class.He participates in class activities.', 'fullterm', '2018-12-07 08:42:17'),
(2441, 0, '2018/2019', '1st Term', 'NR1529', 'He is a very talented child who is confident enough in his skills.', 'fullterm', '2018-12-07 08:47:39'),
(2442, 0, '2018/2019', '1st Term', 'NR1491', 'This has been a good term for Emillia. Keep it up my dear.', 'fullterm', '2018-12-07 08:54:02'),
(2443, 0, '2018/2019', '1st Term', 'NR1504', 'This has been a good term for Masud.He is delightful in class.', 'fullterm', '2018-12-07 08:59:12'),
(2444, 0, '2018/2019', '1st Term', 'NR1423', 'She has done brilliantly well.She is a pleasure to have in class.', 'fullterm', '2018-12-07 09:11:29'),
(2445, 0, '2018/2019', '1st Term', 'NR1461', 'Michelle has done brilliantly well.Keep it up my dear.', 'fullterm', '2018-12-07 09:19:57');
INSERT INTO `teacherscomment` (`id`, `teacherid`, `session`, `term`, `studentid`, `comment`, `resulttype`, `dateadded`) VALUES
(2452, 0, '2018/2019', '1st Term', 'NR1471', 'There is a noticeable improvement in her academic. Keep it up.', 'fullterm', '2018-12-07 09:30:54'),
(2454, 0, '2018/2019', '1st Term', 'NR1440', 'Deborah is doing very well in class.She has had a good term.', 'fullterm', '2018-12-07 09:41:38'),
(2455, 0, '2018/2019', '1st Term', 'NR1460', 'jomiloju has done brilliantly well. she is a pleasure to have in class. ', 'fullterm', '2018-12-07 09:47:21'),
(2456, 0, '2018/2019', '1st Term', 'NR2659', 'THIS IS A GOOD RESULT. KEEP UP THE GOOD WORK.', 'fullterm', '2018-12-07 09:49:58'),
(2458, 0, '2018/2019', '1st Term', 'NR1405', 'THE SKY IS YOUR STARTING POINT. ', 'fullterm', '2018-12-07 09:54:21'),
(2459, 0, '2018/2019', '1st Term', 'NR2644', 'Gabriela is a very talented child who is confident enough in her skills.', 'fullterm', '2018-12-07 09:55:55'),
(2461, 0, '2018/2019', '1st Term', 'NR1625', 'THIS HAS BEEN A PRODUCTIVE TERM FOR ADE. KEEP UP THE GOOD WORK.', 'fullterm', '2018-12-07 09:57:39'),
(2464, 0, '2018/2019', '1st Term', 'NR2648', 'THIS IS A GOOD RESULT.', 'fullterm', '2018-12-07 10:01:18'),
(2466, 0, '2018/2019', '1st Term', 'NR1448', 'Demilade has made satisfactory progress this term.She is a responsible pupil.', 'fullterm', '2018-12-07 10:03:53'),
(2467, 0, '2018/2019', '1st Term', 'NR1482', 'Zane\'s commendable performance must be encouraged.Keep it up.', 'fullterm', '2018-12-07 10:11:34'),
(2468, 0, '2018/2019', '1st Term', 'NR1506', 'SARAH\'S COMMENDABLE PERFORMANCE MUST BE ENCOURAGE. ', 'fullterm', '2018-12-07 10:12:50'),
(2469, 0, '2018/2019', '1st Term', 'NR1505', 'Olamide is a promising child. She learns at her pace .', 'fullterm', '2018-12-07 10:20:56'),
(2470, 0, '2018/2019', '1st Term', 'NR1532', 'EYIMOFE \'S LEARNING HABITS ARE QUITE REMARKABLE KEEP IT UP.', 'fullterm', '2018-12-07 10:22:11'),
(2471, 0, '2018/2019', '1st Term', 'NR1577', 'THIS IS A GOOD RESULT. ', 'fullterm', '2018-12-07 10:32:52'),
(2475, 0, '2018/2019', '1st Term', 'NR1427', 'EJABOWEFOR \'S APPROACH TO WORK IS WELL ORGANISED.SHE FOLLOWS DIRECTIONS WITH CARE KEEP IT UP.', 'fullterm', '2018-12-07 10:45:52'),
(2476, 0, '2018/2019', '1st Term', 'NR2642', 'THIS HAS BEEN A PRODUCTIVE TERM FOR KELVIN. IN WRITING HE STILL NEEDS TO IMPROVE MORE.', 'fullterm', '2018-12-07 10:53:28'),
(2480, 0, '2018/2019', '1st Term', 'NR1481', 'DAVID SHOWS MORE CONFIDENCE IN HIS SCHOOL WORKS. YOUR CONTINUED SUPPORT AT HOME  HAS HELPED HIM ALOT IN SCHOOL KEEP IT UP.', 'fullterm', '2018-12-07 11:04:07'),
(2481, 0, '2018/2019', '1st Term', 'NR1508', ' IYANU \'S PROGRESS   IN ACADEMIC AREAS CONTINUES TO IMPROVE BUT   NEEDS  TO PUT MORE EFFORT IN READING.', 'fullterm', '2018-12-07 11:14:33'),
(2482, 0, '2018/2019', '1st Term', 'NR2654', 'SHE WORKS EAGERLY AND DELIGENTLY ON ALL SUBJECTS.', 'fullterm', '2018-12-07 11:20:38'),
(2483, 0, '2018/2019', '1st Term', 'NR1446', 'EFECHUKWU IS A PROMISING CHILD. SHE LEARNS AT HER PACE.', 'fullterm', '2018-12-07 11:26:59'),
(2484, 0, '2018/2019', '1st Term', 'NR1407', 'MOYINOLUWA IS A VERY TALENTED CHILD WHO IS CONFIDENT ENOUGH IN HER SKILLS.', 'fullterm', '2018-12-07 11:30:19'),
(2485, 0, '2018/2019', '1st Term', 'NR1455', 'NATHAN\'S HAS MADE SATISFACTORY PROGRESS THIS TERM. ', 'fullterm', '2018-12-07 11:37:05'),
(2486, 0, '2018/2019', '1st Term', 'NR1457', 'OLAOLUWA HAS MADE SATISFACTORY PROGRESS THIS TERM.BRAVO', 'fullterm', '2018-12-07 11:39:50'),
(2487, 0, '2018/2019', '2nd Term', 'GD5426', 'You did well but you have relented a little, please try harder.', 'midterm', '2019-02-12 09:54:35'),
(2488, 0, '2018/2019', '2nd Term', 'GD5564', 'You did well but you can still perform better.', 'midterm', '2019-02-12 09:58:43'),
(2489, 0, '2018/2019', '2nd Term', 'GD5619', 'You really need to buckle up and perform better in the exams.', 'midterm', '2019-02-12 10:02:52'),
(2490, 0, '2018/2019', '2nd Term', 'GD5571', 'Dammy is really improving, just keep up this pace and work harder.', 'midterm', '2019-02-12 10:06:36'),
(2491, 0, '2018/2019', '2nd Term', 'GD5435', 'Semilore really did well this time, just keep up the momentum and do more.', 'midterm', '2019-02-12 10:10:08'),
(2492, 0, '2018/2019', '2nd Term', 'GD5545', 'You did well, pay more attention on those areas you scored low.', 'midterm', '2019-02-12 10:13:58'),
(2493, 0, '2019/2020', '1st Term', 'NR1459', 'An excellent performance. Keep the ball rolling.', 'midterm', '2019-02-12 11:53:33'),
(2494, 0, '2019/2020', '1st Term', 'NR1455', 'An excellent  performance.Keep it up.', 'midterm', '2019-02-12 11:54:53'),
(2495, 0, '2018/2019', '2nd Term', 'NR1459', 'An excellent performance. Keep the ball rolling.', 'midterm', '2019-02-12 11:56:54'),
(2496, 0, '2019/2020', '1st Term', 'NR1506', 'An excellent performance.Keep it up.', 'midterm', '2019-02-12 11:57:54'),
(2497, 0, '2018/2019', '2nd Term', 'NR1528', 'An excellent performance. Keep the ball rolling.', 'midterm', '2019-02-12 12:01:42'),
(2498, 0, '2019/2020', '1st Term', 'NR2642', 'An impresive performance don\'t relent in your perfomance.', 'midterm', '2019-02-12 12:02:44'),
(2499, 0, '2019/2020', '1st Term', 'NR1407', 'An impresive performance.Do not relent.', 'midterm', '2019-02-12 12:04:46'),
(2500, 0, '2018/2019', '2nd Term', 'NR1529', 'An excellent performance. keep up the talent.', 'midterm', '2019-02-12 12:05:55'),
(2503, 0, '2018/2019', '2nd Term', 'NR1491', 'An impressive performance. Keep up the good work.', 'midterm', '2019-02-12 12:13:29'),
(2504, 0, '2018/2019', '2nd Term', 'NR1506', 'An excellent performanc.Keep it up.', 'midterm', '2019-02-12 12:13:33'),
(2505, 0, '2018/2019', '2nd Term', 'NR1455', 'An excellent performance.Keep it flying.', 'midterm', '2019-02-12 12:16:07'),
(2506, 0, '2018/2019', '2nd Term', 'NR1504', 'A very good performance. Keep up the good work.', 'midterm', '2019-02-12 12:17:43'),
(2507, 0, '2018/2019', '2nd Term', 'NR2642', 'An impresive performance. Keep it up.', 'midterm', '2019-02-12 12:18:59'),
(2508, 0, '2018/2019', '2nd Term', 'NR1407', 'An impresive performance,Keep it up.', 'midterm', '2019-02-12 12:21:48'),
(2509, 0, '2018/2019', '2nd Term', 'NUR2680', 'An impressive performance. Keep up the good work.', 'midterm', '2019-02-12 12:24:03'),
(2510, 0, '2018/2019', '2nd Term', 'NR1577', 'A very good performance.Do not relent in your effort.', 'midterm', '2019-02-12 12:27:08'),
(2511, 0, '2018/2019', '2nd Term', 'NR2654', 'An impresive performance.Keep it up.', 'midterm', '2019-02-12 12:31:04'),
(2512, 0, '2018/2019', '2nd Term', 'NR1423', 'An excellent performance. Keep up the talent.', 'midterm', '2019-02-12 12:31:47'),
(2513, 0, '2018/2019', '2nd Term', 'NR1532', 'An impresive performance. Keep it up.', 'midterm', '2019-02-12 12:33:15'),
(2514, 0, '2018/2019', '2nd Term', 'NR1405', 'An excellent result. Keep it up.', 'midterm', '2019-02-12 12:34:30'),
(2515, 0, '2018/2019', '2nd Term', 'NR1461', 'An excellent performance. Keep up the talent.', 'midterm', '2019-02-12 12:34:49'),
(2517, 0, '2018/2019', '2nd Term', 'NR1427', 'An excellent performance. Keep it up.', 'midterm', '2019-02-12 12:41:36'),
(2518, 0, '2018/2019', '2nd Term', 'NR2659', 'An impresive performance. Keep it up.', 'midterm', '2019-02-12 12:47:14'),
(2519, 0, '2018/2019', '2nd Term', 'NR1471', 'An impressive performance. Keep up the good work.', 'midterm', '2019-02-12 12:48:22'),
(2520, 0, '2018/2019', '2nd Term', 'NR2648', 'An impresive performance', 'midterm', '2019-02-12 12:52:08'),
(2521, 0, '2018/2019', '2nd Term', 'NR1460', 'An excellent performance. Keep up the good work.', 'midterm', '2019-02-12 12:54:07'),
(2522, 0, '2018/2019', '2nd Term', 'NR1481', 'An excellent performance. Keep it up.', 'midterm', '2019-02-12 12:59:05'),
(2524, 0, '2019/2020', '2nd Term', 'NR1446', 'A good result. Work on your literacy skill.', 'midterm', '2019-02-12 13:07:34'),
(2525, 0, '2018/2019', '2nd Term', 'NR2644', 'An excellent performance. Keep up the talent.', 'midterm', '2019-02-12 13:10:11'),
(2526, 0, '2019/2020', '2nd Term', 'NR1625', 'An impresive performance .Keep it up.', 'midterm', '2019-02-12 13:13:53'),
(2527, 0, '2019/2020', '2nd Term', 'NR1457', 'A very good perfomance. Do not relent in your effort. ', 'midterm', '2019-02-12 13:18:54'),
(2528, 0, '2018/2019', '2nd Term', 'NR1482', 'An excellent performance. Keep up the good work.', 'midterm', '2019-02-12 13:21:02'),
(2530, 0, '2018/2019', '2nd Term', 'NR1505', 'An impressive performance. Keep up the good work.', 'midterm', '2019-02-12 13:24:35'),
(2531, 0, '2018/2019', '2nd Term', 'NR1440', 'An excellent performance. Keep up the good work.', 'midterm', '2019-02-12 13:27:21'),
(2532, 0, '2019/2020', '2nd Term', 'NR1508', 'Iyanuoluwa has a good grade. Keep it up.', 'midterm', '2019-02-12 13:27:57'),
(2535, 0, '2019/2020', '2nd Term', 'NR2322', 'A GOOD PERFORMANCE. KEEP IT UP', 'midterm', '2019-02-12 13:57:18'),
(2536, 0, '2018/2019', '2nd Term', 'NR2527', 'GOOD RESULT', 'midterm', '2019-02-12 13:58:48'),
(2537, 0, '2019/2020', '2nd Term', 'NR2581', 'THIS IS GOOD PERFORMANCE. KEEP IT UP', 'midterm', '2019-02-12 14:02:31'),
(2538, 0, '2019/2020', '2nd Term', 'GD3561', 'A VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2019-02-12 14:02:48'),
(2539, 0, '2018/2019', '2nd Term', 'NR2418', 'GOOD RESULT', 'midterm', '2019-02-12 14:03:39'),
(2541, 0, '2018/2019', '2nd Term', 'GD3574', 'A GOOD RESULT.', 'midterm', '2019-02-12 14:06:37'),
(2542, 0, '2019/2020', '2nd Term', 'NR2329', 'AN EXCELLENT PERFORMANCE', 'midterm', '2019-02-12 14:07:19'),
(2543, 0, '2018/2019', '2nd Term', 'NR2388', 'GOOD RESULT', 'midterm', '2019-02-12 14:09:34'),
(2544, 0, '2019/2020', '1st Term', 'GD4415', 'An execellent performance.', 'midterm', '2019-02-12 14:10:55'),
(2546, 0, '2019/2020', '2nd Term', 'GD4671', 'A VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2019-02-12 14:12:35'),
(2548, 0, '2018/2019', '2nd Term', 'NR2408', 'GOOD RESULT', 'midterm', '2019-02-12 14:16:16'),
(2549, 0, '2018/2019', '2nd Term', 'NR2322', 'GOOD PERFORMANCE. KEEP IT UP', 'midterm', '2019-02-12 14:18:05'),
(2550, 0, '2018/2019', '2nd Term', 'GD4207', 'An impressive performance', 'midterm', '2019-02-12 14:18:36'),
(2552, 0, '2018/2019', '2nd Term', 'GD3561', 'A VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2019-02-12 14:19:11'),
(2553, 0, '2018/2019', '2nd Term', 'GD3474', 'GOOD RESULT.', 'midterm', '2019-02-12 14:19:22'),
(2554, 0, '2018/2019', '2nd Term', 'GD4415', 'An impressive  performance,  keep shining. ', 'midterm', '2019-02-12 14:19:41'),
(2555, 0, '2018/2019', '2nd Term', 'GD2650', 'This is  a good result, keep it up. ', 'midterm', '2019-02-12 14:19:59'),
(2556, 0, '2018/2019', '2nd Term', 'NR2321', 'GOOD RESULT. ', 'midterm', '2019-02-12 14:20:38'),
(2557, 0, '2018/2019', '2nd Term', 'GD2656', 'Goodness has improved greatly in his academics keep it up.', 'midterm', '2019-02-12 14:21:44'),
(2558, 0, '2018/2019', '2nd Term', 'GD4152', 'An impressive performance, keep it up.', 'midterm', '2019-02-12 14:22:38'),
(2559, 0, '2018/2019', '2nd Term', 'NR2581', 'GOOD RESULT. KEEP IT UP', 'midterm', '2019-02-12 14:23:40'),
(2560, 0, '2018/2019', '2nd Term', 'GD1640', 'GOOD RESULT. ', 'midterm', '2019-02-12 14:24:14'),
(2562, 0, '2018/2019', '2nd Term', 'GD3293', 'AN IMPRESSIVE PERFORMANCE, KEEP IT UP.', 'midterm', '2019-02-12 14:24:30'),
(2563, 0, '2018/2019', '2nd Term', 'GD3134', 'AN EXCELLENT RESULT', 'midterm', '2019-02-12 14:24:32'),
(2567, 0, '2018/2019', '2nd Term', 'GD4478', 'An impressive performance, keep it up.', 'midterm', '2019-02-12 14:26:07'),
(2569, 0, '2018/2019', '2nd Term', 'GD1331', 'This is an impressive result. ', 'midterm', '2019-02-12 14:26:41'),
(2570, 0, '2018/2019', '2nd Term', 'GD4584', 'An execellent result, keep puttting in your best. ', 'midterm', '2019-02-12 14:28:35'),
(2571, 0, '2018/2019', '2nd Term', 'GD3403', 'AN IMPRESSIVE PERFORMANCE, KEEP IT UP.', 'midterm', '2019-02-12 14:29:05'),
(2572, 0, '2018/2019', '2nd Term', 'GD4219', 'An impressive performance, keep it up.', 'midterm', '2019-02-12 14:30:03'),
(2573, 0, '2018/2019', '2nd Term', 'NR2597', 'GOOD RESULT. ', 'midterm', '2019-02-12 14:30:17'),
(2574, 0, '2018/2019', '2nd Term', 'GD2229', 'Ezekiel has a good result.Keep improving.', 'midterm', '2019-02-12 14:30:27'),
(2575, 0, '2018/2019', '2nd Term', 'GD1527', 'Good performance. kudos to you.', 'midterm', '2019-02-12 14:30:46'),
(2576, 0, '2018/2019', '2nd Term', 'GD2280', 'EXCELLENT RESULT, KEEP IT UP. ', 'midterm', '2019-02-12 14:31:04'),
(2577, 0, '2018/2019', '2nd Term', 'NR2456', 'GOOD PERFORMANCE. . KEEP IT UP', 'midterm', '2019-02-12 14:31:10'),
(2578, 0, '2018/2019', '2nd Term', 'GD3154', 'TENIOLA KEEPS IMPROVING BY THE DAY', 'midterm', '2019-02-12 14:31:20'),
(2582, 0, '2018/2019', '2nd Term', 'GD4157', 'An excellent result, keep it up.', 'midterm', '2019-02-12 14:33:01'),
(2583, 0, '2018/2019', '2nd Term', 'GD3424', 'AN IMPRESSIVE PERFORMANCE , KEEP IT UP.', 'midterm', '2019-02-12 14:33:26'),
(2584, 0, '2018/2019', '2nd Term', 'NR2430', 'GOOD RESULT. ', 'midterm', '2019-02-12 14:33:44'),
(2585, 0, '2018/2019', '2nd Term', 'GD2282', 'Olamide has a satisfactory result.Keep improving.', 'midterm', '2019-02-12 14:33:48'),
(2586, 0, '2018/2019', '2nd Term', 'GD2234', 'GOOD RESULT. ', 'midterm', '2019-02-12 14:36:03'),
(2587, 0, '2018/2019', '2nd Term', 'GD2586', 'Daniel has a good result.Keep improving.', 'midterm', '2019-02-12 14:36:49'),
(2588, 0, '2018/2019', '2nd Term', 'GD4476', 'A very good performance, keep it up.', 'midterm', '2019-02-12 14:36:49'),
(2589, 0, '2018/2019', '2nd Term', 'GD3173', 'AN IMPRESSIVE PERFORMANCE , KEEP IT UP.', 'midterm', '2019-02-12 14:36:52'),
(2590, 0, '2018/2019', '2nd Term', 'GD1558', 'Good result keep it up.', 'midterm', '2019-02-12 14:36:55'),
(2591, 0, '2018/2019', '2nd Term', 'NR2329', 'AN EXCELLENT PERFORMANCE. DO NOT RELENT', 'midterm', '2019-02-12 14:36:58'),
(2592, 0, '2018/2019', '2nd Term', 'GD1672', 'GOOD RESULT. ', 'midterm', '2019-02-12 14:37:45'),
(2593, 0, '2018/2019', '2nd Term', 'NR2360', 'A WONDERFUL PERFORMANCE. DO NOT RELENT.', 'midterm', '2019-02-12 14:39:55'),
(2594, 0, '2018/2019', '2nd Term', 'GD2223', 'Ayomitide has a good reslt.Keep improving.', 'midterm', '2019-02-12 14:40:07'),
(2595, 0, '2018/2019', '2nd Term', 'GD3563', 'GREAT RESULT', 'midterm', '2019-02-12 14:40:22'),
(2596, 0, '2018/2019', '2nd Term', 'GD2651', 'Good performance. ', 'midterm', '2019-02-12 14:40:24'),
(2597, 0, '2018/2019', '2nd Term', 'GD4416', 'An outstanding performance,   keep soaring high. ', 'midterm', '2019-02-12 14:40:30'),
(2599, 0, '2018/2019', '2nd Term', 'NR2624', 'GOOD RESULT. ', 'midterm', '2019-02-12 14:41:07'),
(2600, 0, '2018/2019', '2nd Term', 'GD3089', 'GOOD RESULT, KEEP IT UP.', 'midterm', '2019-02-12 14:42:09'),
(2601, 0, '2018/2019', '2nd Term', 'GD1582', 'Good  result keep it up.', 'midterm', '2019-02-12 14:43:04'),
(2602, 0, '2018/2019', '2nd Term', 'GD2485', 'Oluwatomisin has a good result.Keep improving.', 'midterm', '2019-02-12 14:43:19'),
(2603, 0, '2018/2019', '2nd Term', 'GD2531', 'EXCELLENT RESULT. ', 'midterm', '2019-02-12 14:43:29'),
(2604, 0, '2018/2019', '2nd Term', 'NR2537', 'A GOOD PERFORMANCE. KEEP IT UP. ', 'midterm', '2019-02-12 14:44:06'),
(2605, 0, '2018/2019', '2nd Term', 'NR2359', 'GOOD RESULT. ', 'midterm', '2019-02-12 14:44:29'),
(2606, 0, '2018/2019', '2nd Term', 'GD2107', 'Amir has a good result.Keep improving', 'midterm', '2019-02-12 14:46:25'),
(2607, 0, '2018/2019', '2nd Term', 'GD1565', 'Execellent result. ', 'midterm', '2019-02-12 14:46:35'),
(2608, 0, '2018/2019', '2nd Term', 'GD3250', 'GOOD RESULT, KEEP  IT UP.', 'midterm', '2019-02-12 14:46:39'),
(2609, 0, '2018/2019', '2nd Term', 'GD4248', 'A brilliant result,  keep putting in more effort.', 'midterm', '2019-02-12 14:47:28'),
(2610, 0, '2018/2019', '2nd Term', 'GD4472', 'A very good performance.', 'midterm', '2019-02-12 14:47:47'),
(2611, 0, '2018/2019', '2nd Term', 'GD1462', 'Great performance! ', 'midterm', '2019-02-12 14:47:57'),
(2612, 0, '2018/2019', '2nd Term', 'GD2437', 'GOOD RESULT. ', 'midterm', '2019-02-12 14:48:32'),
(2613, 0, '2018/2019', '2nd Term', 'GD2278', 'Seyitoju has a good result. Keep improving.', 'midterm', '2019-02-12 14:49:46'),
(2615, 0, '2018/2019', '2nd Term', 'GD4671', 'GOOD RESULT, KEEP IT UP.', 'midterm', '2019-02-12 14:50:22'),
(2616, 0, '2018/2019', '2nd Term', 'GD3592', 'GOOD RESULT', 'midterm', '2019-02-12 14:50:46'),
(2618, 0, '2018/2019', '2nd Term', 'GD1686', 'GOOD RESULT. ', 'midterm', '2019-02-12 14:51:05'),
(2619, 0, '2018/2019', '2nd Term', 'NR2369', 'GOOD RESULT. KEEP IT UP. ', 'midterm', '2019-02-12 14:51:25'),
(2620, 0, '2018/2019', '2nd Term', 'GD2553', 'Pemisire has a good result. Keep improving.', 'midterm', '2019-02-12 14:52:40'),
(2622, 0, '2018/2019', '2nd Term', 'GD3536', 'A VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2019-02-12 14:53:54'),
(2623, 0, '2018/2019', '2nd Term', 'GD3428', 'GOOD RESULT', 'midterm', '2019-02-12 14:54:12'),
(2624, 0, '2018/2019', '2nd Term', 'GD2567', 'GOOD RESULT, KEEP IMPROVING. ', 'midterm', '2019-02-12 14:54:30'),
(2625, 0, '2018/2019', '2nd Term', 'GD1311', 'Good perforance keep it up.', 'midterm', '2019-02-12 14:55:09'),
(2626, 0, '2018/2019', '2nd Term', 'GD4184', 'An intelligent performance, keep soaring high. ', 'midterm', '2019-02-12 14:55:17'),
(2627, 0, '2018/2019', '2nd Term', 'GD2395', 'Toluwani has a good result. Keep improving. ', 'midterm', '2019-02-12 14:55:45'),
(2629, 0, '2018/2019', '2nd Term', 'NR2346', 'GOOD RESULT. KEEP IT UP.', 'midterm', '2019-02-12 14:57:05'),
(2630, 0, '2018/2019', '2nd Term', 'GD4463', 'An impressive performance, keep it up.', 'midterm', '2019-02-12 14:57:45'),
(2631, 0, '2018/2019', '2nd Term', 'GD2292', 'Ewaoluwa has a good result. Keep improving. ', 'midterm', '2019-02-12 14:58:13'),
(2632, 0, '2018/2019', '2nd Term', 'GD2342', 'EXCELLENT RESULT. ', 'midterm', '2019-02-12 14:59:38'),
(2633, 0, '2018/2019', '2nd Term', 'GD2194', 'Emotite has a good result. Keep improving.', 'midterm', '2019-02-12 15:01:00'),
(2634, 0, '2018/2019', '2nd Term', 'GD4510', 'An intellent performance, keep putting in your best.', 'midterm', '2019-02-12 15:01:06'),
(2635, 0, '2018/2019', '2nd Term', 'GD4439', 'An impressive performance, keep it up.', 'midterm', '2019-02-12 15:01:20'),
(2636, 0, '2018/2019', '2nd Term', 'GD1620', 'This is a good result, dont relent in your effort.', 'midterm', '2019-02-12 15:01:23'),
(2637, 0, '2018/2019', '2nd Term', 'GD3615', 'A VERY GOOD RESULT, KEEP IT UP.', 'midterm', '2019-02-12 15:01:24'),
(2638, 0, '2018/2019', '2nd Term', 'NR2568', 'GOOD PERFORMANCE . DO NOT RELENT', 'midterm', '2019-02-12 15:01:25'),
(2640, 0, '2018/2019', '2nd Term', 'GD3566', 'GOOD RESULT', 'midterm', '2019-02-12 15:03:07'),
(2642, 0, '2018/2019', '2nd Term', 'GD2432', 'Eniola has a good result. Keep improving. ', 'midterm', '2019-02-12 15:04:01'),
(2643, 0, '2018/2019', '2nd Term', 'GD2303', 'VERY GOOD RESULT. ', 'midterm', '2019-02-12 15:04:18'),
(2645, 0, '2018/2019', '2nd Term', 'GD3206', 'AN EXCELLENT RESULT, KEEP IT UP.', 'midterm', '2019-02-12 15:05:21'),
(2646, 0, '2018/2019', '2nd Term', 'NR2516', 'A WONDERFUL PERFORMANCE .KEEP IT UP.', 'midterm', '2019-02-12 15:05:57'),
(2647, 0, '2018/2019', '2nd Term', 'GD2653', 'Okikiola has a good result. Keep improving. ', 'midterm', '2019-02-12 15:07:24'),
(2648, 0, '2018/2019', '2nd Term', 'GD2232', 'GREAT RESULT, KEEP IT UP. ', 'midterm', '2019-02-12 15:07:34'),
(2649, 0, '2018/2019', '2nd Term', 'GRD2681', 'This is a verry good result. ', 'midterm', '2019-02-12 15:09:26'),
(2650, 0, '2018/2019', '2nd Term', 'GD3096', 'GOOD RESULT, KEEP IT UP.', 'midterm', '2019-02-12 15:09:49'),
(2651, 0, '2018/2019', '2nd Term', 'GD4070', 'An impressive performance, keep shining dearie. ', 'midterm', '2019-02-12 15:09:57'),
(2652, 0, '2018/2019', '2nd Term', 'GD1304', 'Great performance. keep up the good work.', 'midterm', '2019-02-12 15:10:07'),
(2653, 0, '2018/2019', '2nd Term', 'GD3163', 'GOOD RESULT', 'midterm', '2019-02-12 15:10:27'),
(2654, 0, '2018/2019', '2nd Term', 'GD2509', 'GREAT RESULT, KEEP IT UP. ', 'midterm', '2019-02-12 15:10:40'),
(2655, 0, '2018/2019', '2nd Term', 'NR2611', 'GOOD  RESULT .DO NOT RESULT', 'midterm', '2019-02-12 15:11:15'),
(2656, 0, '2018/2019', '2nd Term', 'GD2658', 'Good result keep it up always.', 'midterm', '2019-02-12 15:14:56'),
(2657, 0, '2018/2019', '2nd Term', 'GD2338', 'VERY GOOD RESULT. ', 'midterm', '2019-02-12 15:14:57'),
(2660, 0, '2018/2019', '2nd Term', 'GD4649', 'GOOD RESULT', 'midterm', '2019-02-12 15:15:05'),
(2664, 0, '2018/2019', '2nd Term', 'NR2345', 'GOOD RESULT.', 'midterm', '2019-02-12 15:15:09'),
(2667, 0, '2018/2019', '2nd Term', 'GD2497', 'GOOD RESULT. ', 'midterm', '2019-02-12 15:15:14'),
(2674, 0, '2018/2019', '2nd Term', 'GD4117', 'An outstanding performance, keep shining, dearie', 'midterm', '2019-02-12 15:16:26'),
(2675, 0, '2018/2019', '2nd Term', 'GD2652', 'This is a beautiful result. ', 'midterm', '2019-02-12 15:17:12'),
(2676, 0, '2018/2019', '2nd Term', 'NR2391', 'GOOD RESULT.', 'midterm', '2019-02-12 15:20:06'),
(2677, 0, '2018/2019', '2nd Term', 'GD3493', 'A GOOD RESULT', 'midterm', '2019-02-12 15:20:09'),
(2678, 0, '2018/2019', '2nd Term', 'GD4104', 'An impressive performance, keep it up.', 'midterm', '2019-02-12 15:20:26'),
(2679, 0, '2018/2019', '2nd Term', 'GD3645', 'OUTSTANDING RESULT. ', 'midterm', '2019-02-12 15:21:02'),
(2680, 0, '2018/2019', '2nd Term', 'GD1438', 'A very good result. ', 'midterm', '2019-02-12 15:21:25'),
(2681, 0, '2018/2019', '2nd Term', 'GD2579', 'GREAT RESULT. ', 'midterm', '2019-02-12 15:22:57'),
(2682, 0, '2018/2019', '2nd Term', 'GD1578', 'Good result.', 'midterm', '2019-02-12 15:23:05'),
(2684, 0, '2018/2019', '2nd Term', 'GD4201', 'A very good performance, keep it up.', 'midterm', '2019-02-12 15:24:52'),
(2685, 0, '2018/2019', '2nd Term', 'GD1261', 'This is a very beautiful result. ', 'midterm', '2019-02-12 15:25:15'),
(2686, 0, '2018/2019', '2nd Term', 'NR2386', 'THIS IS A GOOD RESULT. ', 'midterm', '2019-02-12 15:25:40'),
(2687, 0, '2018/2019', '2nd Term', 'GD4162', 'A brilliant performance, keep it up. ', 'midterm', '2019-02-12 15:25:55'),
(2688, 0, '2018/2019', '2nd Term', 'GD3064', 'GOOD RESULT', 'midterm', '2019-02-12 15:26:50'),
(2689, 0, '2018/2019', '2nd Term', 'GD1495', 'Excellent result. ', 'midterm', '2019-02-12 15:28:21'),
(2690, 0, '2018/2019', '2nd Term', 'GD1410', 'Excellent performance. keep it up.', 'midterm', '2019-02-12 15:28:27'),
(2691, 0, '2018/2019', '2nd Term', 'GD2466', 'OUTSTANDING RESULT. ', 'midterm', '2019-02-12 15:28:33'),
(2692, 0, '2018/2019', '2nd Term', 'GD4158', 'An impressive performance, keep it up.', 'midterm', '2019-02-12 15:28:47'),
(2693, 0, '2018/2019', '2nd Term', 'GD2193', 'GREAT RESULT. KEEP IMPROVING. ', 'midterm', '2019-02-12 15:29:25'),
(2694, 0, '2018/2019', '2nd Term', 'GD4479', 'An impressive performance,  keep it up.', 'midterm', '2019-02-12 15:31:54'),
(2695, 0, '2018/2019', '2nd Term', 'GD2688', 'Good performance.', 'midterm', '2019-02-12 15:32:16'),
(2696, 0, '2018/2019', '2nd Term', 'GD1327', 'This  is a wonderful result. ', 'midterm', '2019-02-12 15:32:22'),
(2697, 0, '2018/2019', '2nd Term', 'GD4252', 'An improved performance, keep getting better darling.', 'midterm', '2019-02-12 15:33:11'),
(2699, 0, '2018/2019', '2nd Term', 'GD2269', 'VERY GOOD RESULT. ', 'midterm', '2019-02-12 15:39:13'),
(2700, 0, '2018/2019', '2nd Term', 'GD2188', 'VERY GOOD RESULT. ', 'midterm', '2019-02-12 15:39:18'),
(2704, 0, '2018/2019', '2nd Term', 'GD3160', 'GOOD RESULT', 'midterm', '2019-02-12 15:41:07'),
(2706, 0, '2018/2019', '2nd Term', 'GD1353', 'Good performance.', 'midterm', '2019-02-12 15:42:27'),
(2707, 0, '2018/2019', '2nd Term', 'GD1612', 'This is a brilliant result. ', 'midterm', '2019-02-12 15:42:28'),
(2708, 0, '2018/2019', '2nd Term', 'GD2660', 'This is  a very good result.  ', 'midterm', '2019-02-12 15:43:21'),
(2710, 0, '2018/2019', '2nd Term', 'GD4087', 'An impressive performance, keep it up.', 'midterm', '2019-02-12 15:43:34'),
(2721, 0, '2018/2019', '2nd Term', 'GD2673', 'This is a very beautiful result. ', 'midterm', '2019-02-12 15:47:51'),
(2726, 0, '2018/2019', '2nd Term', 'GD1296', 'Good performance, do not relent in your efforts.', 'midterm', '2019-02-12 15:48:48'),
(2727, 0, '2018/2019', '2nd Term', 'GD4213', 'A good performance, keep it up.', 'midterm', '2019-02-12 15:48:55'),
(2728, 0, '2018/2019', '2nd Term', 'GD1441', 'This is a very good performance.', 'midterm', '2019-02-12 15:49:37'),
(2732, 0, '2018/2019', '2nd Term', 'GD4444', 'A good result, keep improving dearie. ', 'midterm', '2019-02-12 15:50:15'),
(2733, 0, '2018/2019', '2nd Term', 'GD3562', 'GOOD RESULT', 'midterm', '2019-02-12 15:50:38'),
(2735, 0, '2018/2019', '2nd Term', 'GD4496', 'A good result, keep improving dearie.', 'midterm', '2019-02-12 16:00:40');

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
-- Indexes for table `assetcategory`
--
ALTER TABLE `assetcategory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assetcategory` (`assetcategory`);

--
-- Indexes for table `assetitems`
--
ALTER TABLE `assetitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assetname` (`assetname`,`assetcategory`);

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
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `studentid` (`studentid`,`classid`,`session`,`term`);

--
-- Indexes for table `classmedal`
--
ALTER TABLE `classmedal`
  ADD PRIMARY KEY (`classmedal`),
  ADD UNIQUE KEY `session` (`session`,`term`,`studentid`);

--
-- Indexes for table `conduct`
--
ALTER TABLE `conduct`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discountid`),
  ADD UNIQUE KEY `stdid` (`stdid`,`session`,`term`);

--
-- Indexes for table `fee_category`
--
ALTER TABLE `fee_category`
  ADD PRIMARY KEY (`Fee_Cat_ID`),
  ADD UNIQUE KEY `Class` (`Class`,`Session`,`Year`,`Item`);

--
-- Indexes for table `fee_transaction`
--
ALTER TABLE `fee_transaction`
  ADD PRIMARY KEY (`SN`);

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
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `linkages`
--
ALTER TABLE `linkages`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ParentID` (`ParentID`,`StudentID`);

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
-- Indexes for table `oldreports`
--
ALTER TABLE `oldreports`
  ADD PRIMARY KEY (`reportid`),
  ADD UNIQUE KEY `resulttype` (`resulttype`,`studentid`,`session`,`term`),
  ADD UNIQUE KEY `reportcard` (`reportcard`),
  ADD UNIQUE KEY `reportcard_2` (`reportcard`);

--
-- Indexes for table `othercomment`
--
ALTER TABLE `othercomment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `session` (`session`,`term`,`stdid`);

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
  ADD UNIQUE KEY `paymentname` (`paymentname`,`session`);

--
-- Indexes for table `paymentsmade`
--
ALTER TABLE `paymentsmade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payschoolbill`
--
ALTER TABLE `payschoolbill`
  ADD PRIMARY KEY (`schoolbillid`),
  ADD UNIQUE KEY `studentid` (`studentid`,`session`,`term`,`billitemid`);

--
-- Indexes for table `playnurresult`
--
ALTER TABLE `playnurresult`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentid` (`studentid`,`term`,`session`,`subjectid`,`firstsecondthirdexam`);

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
-- Indexes for table `promotedtable`
--
ALTER TABLE `promotedtable`
  ADD PRIMARY KEY (`promoted`),
  ADD UNIQUE KEY `studentid` (`studentid`,`session`);

--
-- Indexes for table `proprietresscomment`
--
ALTER TABLE `proprietresscomment`
  ADD PRIMARY KEY (`int`),
  ADD UNIQUE KEY `session` (`session`,`term`,`stdid`);

--
-- Indexes for table `schclass`
--
ALTER TABLE `schclass`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `ClassName` (`ClassName`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `term` (`term`,`session`);

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
  ADD PRIMARY KEY (`StudentID`),
  ADD UNIQUE KEY `schoolid` (`schoolid`);

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
  ADD UNIQUE KEY `session` (`session`,`term`,`studentid`,`resulttype`);

--
-- Indexes for table `termcalendar`
--
ALTER TABLE `termcalendar`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assetcategory`
--
ALTER TABLE `assetcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assetitems`
--
ALTER TABLE `assetitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendancesheet`
--
ALTER TABLE `attendancesheet`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classmedal`
--
ALTER TABLE `classmedal`
  MODIFY `classmedal` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discountid` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `gradebyclass`
--
ALTER TABLE `gradebyclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gradebysubject`
--
ALTER TABLE `gradebysubject`
  MODIFY `gradeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `graderes`
--
ALTER TABLE `graderes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nexttermbegins`
--
ALTER TABLE `nexttermbegins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oldreports`
--
ALTER TABLE `oldreports`
  MODIFY `reportid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `othercomment`
--
ALTER TABLE `othercomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=587;

--
-- AUTO_INCREMENT for table `parentsregister`
--
ALTER TABLE `parentsregister`
  MODIFY `ParentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paycatbreakdown`
--
ALTER TABLE `paycatbreakdown`
  MODIFY `breakdownid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `paymentcategory`
--
ALTER TABLE `paymentcategory`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paymentsmade`
--
ALTER TABLE `paymentsmade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payschoolbill`
--
ALTER TABLE `payschoolbill`
  MODIFY `schoolbillid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playnurresult`
--
ALTER TABLE `playnurresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- AUTO_INCREMENT for table `promotedtable`
--
ALTER TABLE `promotedtable`
  MODIFY `promoted` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proprietresscomment`
--
ALTER TABLE `proprietresscomment`
  MODIFY `int` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schclass`
--
ALTER TABLE `schclass`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `schooladmin`
--
ALTER TABLE `schooladmin`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schoolevents`
--
ALTER TABLE `schoolevents`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schoolinfo`
--
ALTER TABLE `schoolinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schoolresumes`
--
ALTER TABLE `schoolresumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schooltypes`
--
ALTER TABLE `schooltypes`
  MODIFY `typeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schstaff`
--
ALTER TABLE `schstaff`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `schstdstrack`
--
ALTER TABLE `schstdstrack`
  MODIFY `trackid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schstudent`
--
ALTER TABLE `schstudent`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  MODIFY `studentclassid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;

--
-- AUTO_INCREMENT for table `subjectcat`
--
ALTER TABLE `subjectcat`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
