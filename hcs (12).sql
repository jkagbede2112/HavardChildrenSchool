-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 01:47 PM
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
-- Table structure for table `assetcategory`
--

CREATE TABLE `assetcategory` (
  `id` int(11) NOT NULL,
  `assetcategory` varchar(50) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
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
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendancesheet`
--

INSERT INTO `attendancesheet` (`SN`, `studentid`, `classid`, `daysenrolled`, `present`, `absent`, `session`, `term`, `dateadded`) VALUES
(1, 'HHS2019/001', 32, 115, '111', '4', '2019/2020', '1st Term', '2019-10-18 19:09:24'),
(2, 'HHS2019/001', 44, 115, '111', '4', '2019/2020', '1st Term', '2019-10-21 11:39:02');

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
  `dateadded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradebysubject`
--

INSERT INTO `gradebysubject` (`gradeid`, `studentid`, `subjectid`, `classid`, `session`, `term`, `aggregatescore`, `dateadded`) VALUES
(1, 'HHS2019/003', 0, 33, '2019/2020', '1st Term', 0, '2019-10-15 13:27:36'),
(2, 'HHS2019/012', 0, 33, '2019/2020', '1st Term', 0, '2019-10-15 13:27:36'),
(3, 'HHS2019/036', 0, 33, '2019/2020', '1st Term', 0, '2019-10-15 13:27:36');

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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `datesent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`sn`, `content`, `subject`, `datesent`) VALUES
(1, '<div class="WordSection1">\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">Dear\nHonourable Parents,<o:p></o:p></span></p>\n\n<div>\n\n<table cellspacing="0" cellpadding="0" hspace="0" vspace="0" align="left">\n <tbody><tr>\n  <td valign="top" align="left" style="padding-top:0in;padding-right:0in;\n  padding-bottom:0in;padding-left:0in">\n  <p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify;line-height:\n  51.35pt;mso-line-height-rule:exactly;page-break-after:avoid;vertical-align:\n  baseline;mso-element:dropcap-dropped;mso-element-wrap:around;mso-element-anchor-vertical:\n  paragraph;mso-element-anchor-horizontal:column;mso-height-rule:exactly;\n  mso-element-linespan:3"><span style="font-size: 69pt; font-family: &quot;Courier New&quot;;">T<o:p></o:p></span></p>\n  </td>\n </tr>\n</tbody></table>\n\n</div>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">he Lord is\ntruly our Ebenezer for bringing us thus far since the beginning of this\nacademic session. It has been a wonderful year filled with exciting and\neducative activities. His banner over us knows no bound. God be praised\nforever!<o:p></o:p></span></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">I am very\npleased to welcome you to the third and final term of the 2017/2018 academic\nsession. This term represents the promotional term where all the terminal\nresults will be divided by three.<o:p></o:p></span></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">We want all\nour parents to work along with us in order to achieve an excellent performance\nand we equally promise not to relent on our effort. <o:p></o:p></span></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><b><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">GRADUATION AND PRIZE GIVING DAY<o:p></o:p></span></b></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">Itâ€™s that\ntime of the year when we bid our grade 6 pupils goodbye and welcome our Nursery\n2 pupils to grade 1. We also, on this day, award outstanding performances among\npupils and staff.<o:p></o:p></span></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><b><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">EXTRA CURRICULAR ACTIVITIES ~ CLUBS<o:p></o:p></span></b></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">We shall\nmaintain the same clubs ran in the previous term, so pupils can remain or\nchange to the club they desire.<o:p></o:p></span></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><b><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">FEES<o:p></o:p></span></b></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">I implore\nall to make payment on time. Kindly give school fees payment a priority among\nall other commitments. We cannot run the school smoothly without your prompt\npayment. May God continue to enrich your wallets.<o:p></o:p></span></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><b><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">SCHOOL BUS<o:p></o:p></span></b></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">Please\nendeavour to get your children ready as early as possible for pick-up so as not\nto cause delay and lateness for other pupils.<o:p></o:p></span></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><b><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">CORRESPONDENCE<o:p></o:p></span></b></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">All further\ncorrespondence with parents will be via email, phone and the communication\nbook.<o:p></o:p></span></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><b><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">TIMING <o:p></o:p></span></b></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">Life is all\nabout time. There is a right time for everything. Now is the time to put in the\nnecessary effort and ensure family values, culture, etiquettes and morals. This\nis the time to build the childâ€™s self-esteem and help him become confident and\nwell adjusted. Now is the time to create a literacy filled, emotionally safe\nenvironment and spend a quality time to assist homework, reinforce what was\nlearnt and encourage daily 20 minutes reading time. All these things are doable\nif your heart is in them. <o:p></o:p></span></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">Finally,\nyou will find the academic calendar and synopsis for this term attached with\nthis letter. Thank you for your support as we look forward to another\nsuccessful term. <o:p></o:p></span></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">Warm\ngreetings from all of us at HCS<o:p></o:p></span></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><v:shapetype id="_x0000_t75" coordsize="21600,21600" o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe" filled="f" stroked="f" style="font-family: &quot;Courier New&quot;;">\n <v:stroke joinstyle="miter">\n <v:formulas>\n  <v:f eqn="if lineDrawn pixelLineWidth 0">\n  <v:f eqn="sum @0 1 0">\n  <v:f eqn="sum 0 0 @1">\n  <v:f eqn="prod @2 1 2">\n  <v:f eqn="prod @3 21600 pixelWidth">\n  <v:f eqn="prod @3 21600 pixelHeight">\n  <v:f eqn="sum @0 0 1">\n  <v:f eqn="prod @6 1 2">\n  <v:f eqn="prod @7 21600 pixelWidth">\n  <v:f eqn="sum @8 21600 0">\n  <v:f eqn="prod @7 21600 pixelHeight">\n  <v:f eqn="sum @10 21600 0">\n </v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:f></v:formulas>\n <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect">\n <o:lock v:ext="edit" aspectratio="t">\n</o:lock></v:path></v:stroke></v:shapetype><v:shape id="_x0000_s1026" type="#_x0000_t75" style="position:absolute;\n left:0;text-align:left;margin-left:106.65pt;margin-top:7.1pt;width:151.5pt;\n height:73.6pt;z-index:-251656704">\n <v:imagedata src="file:///C:UsersKoolJayAppDataLocalTempmsohtmlclip1\01clip_image001.emz" o:title="" style="font-family: &quot;Courier New&quot;;">\n</v:imagedata></v:shape><!--[if gte mso 9]><xml>\n <o:OLEObject Type="Embed" ProgID="CorelDraw.Graphic.18" ShapeID="_x0000_s1026"\n  DrawAspect="Content" ObjectID="_1586245796">\n </o:OLEObject>\n</xml><![endif]--><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">Thank you.<o:p></o:p></span></p>\n\n<p class="MsoNormal" style="margin-bottom:6.0pt;text-align:justify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">&nbsp;<o:p></o:p></span></p>\n\n<p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:\njustify;line-height:normal"><b><span style="font-size: 13pt; font-family: &quot;Courier New&quot;;">&nbsp;&nbsp; <v:shape id="_x0000_i1025" type="#_x0000_t75" style="width:70.5pt;height:33pt">\n <v:imagedata src="file:///C:UsersKoolJayAppDataLocalTempmsohtmlclip1\01clip_image002.jpg" o:title="madam signature">\n</v:imagedata></v:shape><o:p></o:p></span></b></p>\n\n<p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:\njustify;line-height:normal"><b><span style="font-size: 13pt; font-family: &quot;Courier New&quot;;">Mrs.\nA. V. Ibiyemi<o:p></o:p></span></b></p>\n\n<p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:\njustify"><span style="font-size: 13pt; line-height: 107%; font-family: &quot;Courier New&quot;;">Proprietress<o:p></o:p></span></p>\n\n</div><p>\n\n<span style="font-size:13.0pt;mso-bidi-font-size:14.0pt;line-height:107%;\nfont-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:Calibri;\nmso-ansi-language:EN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA"><br clear="all" style="page-break-before:always;mso-break-type:section-break"></span></p>', 'Promotional Term Newsletter', '2018-04-26 10:05:05');

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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oldreports`
--

INSERT INTO `oldreports` (`reportid`, `classid`, `resulttype`, `studentid`, `session`, `term`, `reportcard`, `dateadded`) VALUES
(1, '--Select--', '--Select--', '--Select Student nam', '2019/2020', '1st Term', 'C:/xampp/htdocsHCS/portalAdmin/PHP/RP/ft--Select Student name----Select--1st.txt', '0000-00-00 00:00:00');

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
  `dateadded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `teacherid` varchar(14) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playnurresult`
--

INSERT INTO `playnurresult` (`id`, `studentid`, `term`, `session`, `classid`, `subjectid`, `firstsecondthirdexam`, `result`, `teacherid`, `dateadded`) VALUES
(1, 'HHS2019/001', '1st Term', '2019/2020', 44, '9', 'first', '10', 'HCS7555', '2019-10-21 10:55:19'),
(2, 'HHS2019/001', '1st Term', '2019/2020', 44, '9', 'second', '20', 'HCS7555', '2019-10-21 10:55:20'),
(3, 'HHS2019/001', '1st Term', '2019/2020', 44, '9', 'third', '10', 'HCS7555', '2019-10-21 10:55:21'),
(4, 'HHS2019/004', '1st Term', '2019/2020', 44, '9', 'first', '09', 'HCS7555', '2019-10-21 10:55:23'),
(5, 'HHS2019/004', '1st Term', '2019/2020', 44, '9', 'second', '09', 'HCS7555', '2019-10-21 10:55:25'),
(6, 'HHS2019/004', '1st Term', '2019/2020', 44, '9', 'third', '09', 'HCS7555', '2019-10-21 10:55:26'),
(7, 'HHS2019/010', '1st Term', '2019/2020', 44, '9', 'first', '05', 'HCS7555', '2019-10-21 10:55:31'),
(8, 'HHS2019/010', '1st Term', '2019/2020', 44, '9', 'second', '03', 'HCS7555', '2019-10-21 10:55:32'),
(9, 'HHS2019/010', '1st Term', '2019/2020', 44, '9', 'third', '07', 'HCS7555', '2019-10-21 10:55:36'),
(10, 'HHS2019/017', '1st Term', '2019/2020', 44, '9', 'first', '09', 'HCS7555', '2019-10-21 10:55:50'),
(11, 'HHS2019/017', '1st Term', '2019/2020', 44, '9', 'second', '12', 'HCS7555', '2019-10-21 10:55:52'),
(12, 'HHS2019/017', '1st Term', '2019/2020', 44, '9', 'third', '09', 'HCS7555', '2019-10-21 10:55:54'),
(13, 'HHS2019/001', '1st Term', '2019/2020', 44, '26', 'first', '09', 'HCS6807', '2019-10-21 10:57:00'),
(14, 'HHS2019/001', '1st Term', '2019/2020', 44, '26', 'second', '12', 'HCS6807', '2019-10-21 10:57:00'),
(15, 'HHS2019/004', '1st Term', '2019/2020', 44, '26', 'first', '0', 'HCS6807', '2019-10-21 10:57:04'),
(16, 'HHS2019/001', '1st Term', '2019/2020', 44, '26', 'third', '08', 'HCS6807', '2019-10-21 10:57:05'),
(18, 'HHS2019/004', '1st Term', '2019/2020', 44, '26', 'second', '0', 'HCS6807', '2019-10-21 10:57:10'),
(19, 'HHS2019/004', '1st Term', '2019/2020', 44, '26', 'third', '0', 'HCS6807', '2019-10-21 10:57:13'),
(20, 'HHS2019/010', '1st Term', '2019/2020', 44, '26', 'first', '0', 'HCS6807', '2019-10-21 10:57:15'),
(21, 'HHS2019/010', '1st Term', '2019/2020', 44, '26', 'second', '0', 'HCS6807', '2019-10-21 10:57:16'),
(22, 'HHS2019/010', '1st Term', '2019/2020', 44, '26', 'third', '0', 'HCS6807', '2019-10-21 10:57:16'),
(23, 'HHS2019/017', '1st Term', '2019/2020', 44, '26', 'first', '10', 'HCS6807', '2019-10-21 10:57:27'),
(24, 'HHS2019/017', '1st Term', '2019/2020', 44, '26', 'second', '20', 'HCS6807', '2019-10-21 10:57:28'),
(25, 'HHS2019/017', '1st Term', '2019/2020', 44, '26', 'third', '10', 'HCS6807', '2019-10-21 10:57:30'),
(27, 'HHS2019/001', '1st Term', '2019/2020', 44, '27', 'first', '10', 'HCS6807', '2019-10-21 10:57:49'),
(28, 'HHS2019/001', '1st Term', '2019/2020', 44, '27', 'second', '20', 'HCS6807', '2019-10-21 10:57:50'),
(29, 'HHS2019/001', '1st Term', '2019/2020', 44, '27', 'third', '10', 'HCS6807', '2019-10-21 10:57:51'),
(30, 'HHS2019/004', '1st Term', '2019/2020', 44, '27', 'first', '10', 'HCS6807', '2019-10-21 10:57:54'),
(31, 'HHS2019/004', '1st Term', '2019/2020', 44, '27', 'second', '20', 'HCS6807', '2019-10-21 10:57:55'),
(32, 'HHS2019/004', '1st Term', '2019/2020', 44, '27', 'third', '09', 'HCS6807', '2019-10-21 10:57:57'),
(33, 'HHS2019/010', '1st Term', '2019/2020', 44, '27', 'first', '08', 'HCS6807', '2019-10-21 10:57:59'),
(34, 'HHS2019/010', '1st Term', '2019/2020', 44, '27', 'second', '18', 'HCS6807', '2019-10-21 10:58:01'),
(35, 'HHS2019/010', '1st Term', '2019/2020', 44, '27', 'third', '02', 'HCS6807', '2019-10-21 10:58:02'),
(36, 'HHS2019/017', '1st Term', '2019/2020', 44, '27', 'first', '05', 'HCS6807', '2019-10-21 10:58:05'),
(37, 'HHS2019/017', '1st Term', '2019/2020', 44, '27', 'second', '17', 'HCS6807', '2019-10-21 10:58:06'),
(38, 'HHS2019/017', '1st Term', '2019/2020', 44, '27', 'third', '08', 'HCS6807', '2019-10-21 10:58:09'),
(39, 'HHS2019/001', '1st Term', '2019/2020', 44, '5', 'first', '10', 'HCS4826', '2019-10-21 10:59:00'),
(40, 'HHS2019/001', '1st Term', '2019/2020', 44, '5', 'second', '20', 'HCS4826', '2019-10-21 10:59:01'),
(41, 'HHS2019/001', '1st Term', '2019/2020', 44, '5', 'third', '10', 'HCS4826', '2019-10-21 10:59:02'),
(42, 'HHS2019/004', '1st Term', '2019/2020', 44, '5', 'first', '10', 'HCS4826', '2019-10-21 10:59:03'),
(43, 'HHS2019/004', '1st Term', '2019/2020', 44, '5', 'second', '20', 'HCS4826', '2019-10-21 10:59:03'),
(44, 'HHS2019/004', '1st Term', '2019/2020', 44, '5', 'third', '10', 'HCS4826', '2019-10-21 10:59:04'),
(45, 'HHS2019/010', '1st Term', '2019/2020', 44, '5', 'first', '04', 'HCS4826', '2019-10-21 10:59:06'),
(46, 'HHS2019/010', '1st Term', '2019/2020', 44, '5', 'second', '06', 'HCS4826', '2019-10-21 10:59:07'),
(47, 'HHS2019/010', '1st Term', '2019/2020', 44, '5', 'third', '08', 'HCS4826', '2019-10-21 10:59:09'),
(48, 'HHS2019/017', '1st Term', '2019/2020', 44, '5', 'first', '08', 'HCS4826', '2019-10-21 10:59:11'),
(49, 'HHS2019/017', '1st Term', '2019/2020', 44, '5', 'second', '09', 'HCS4826', '2019-10-21 10:59:12'),
(50, 'HHS2019/017', '1st Term', '2019/2020', 44, '5', 'third', '09', 'HCS4826', '2019-10-21 10:59:17'),
(51, 'HHS2019/001', '1st Term', '2019/2020', 44, '23', 'first', '0', 'HCS4826', '2019-10-21 10:59:29'),
(52, 'HHS2019/001', '1st Term', '2019/2020', 44, '23', 'second', '0', 'HCS4826', '2019-10-21 10:59:30'),
(53, 'HHS2019/001', '1st Term', '2019/2020', 44, '23', 'third', '0', 'HCS4826', '2019-10-21 10:59:31'),
(54, 'HHS2019/004', '1st Term', '2019/2020', 44, '23', 'first', '0', 'HCS4826', '2019-10-21 10:59:32'),
(55, 'HHS2019/004', '1st Term', '2019/2020', 44, '23', 'second', '0', 'HCS4826', '2019-10-21 10:59:32'),
(56, 'HHS2019/004', '1st Term', '2019/2020', 44, '23', 'third', '0', 'HCS4826', '2019-10-21 10:59:33'),
(57, 'HHS2019/010', '1st Term', '2019/2020', 44, '23', 'first', '0', 'HCS4826', '2019-10-21 10:59:34'),
(58, 'HHS2019/010', '1st Term', '2019/2020', 44, '23', 'second', '0', 'HCS4826', '2019-10-21 10:59:34'),
(59, 'HHS2019/010', '1st Term', '2019/2020', 44, '23', 'third', '0', 'HCS4826', '2019-10-21 10:59:34'),
(60, 'HHS2019/017', '1st Term', '2019/2020', 44, '23', 'first', '10', 'HCS4826', '2019-10-21 10:59:36'),
(61, 'HHS2019/017', '1st Term', '2019/2020', 44, '23', 'second', '12', 'HCS4826', '2019-10-21 10:59:38'),
(62, 'HHS2019/017', '1st Term', '2019/2020', 44, '23', 'third', '04', 'HCS4826', '2019-10-21 10:59:41'),
(63, 'HHS2019/004', '1st Term', '2019/2020', 44, '37', 'first', '10', 'HCS4693', '2019-10-21 11:19:56'),
(64, 'HHS2019/001', '1st Term', '2019/2020', 44, '37', 'first', '10', 'HCS4693', '2019-10-21 11:19:58'),
(65, 'HHS2019/001', '1st Term', '2019/2020', 44, '37', 'second', '10', 'HCS4693', '2019-10-21 11:19:59'),
(66, 'HHS2019/001', '1st Term', '2019/2020', 44, '37', 'third', '10', 'HCS4693', '2019-10-21 11:20:03'),
(72, 'HHS2019/004', '1st Term', '2019/2020', 44, '37', 'second', '02', 'HCS4693', '2019-10-21 11:31:29'),
(73, 'HHS2019/004', '1st Term', '2019/2020', 44, '37', 'third', '10', 'HCS4693', '2019-10-21 11:31:31'),
(74, 'HHS2019/010', '1st Term', '2019/2020', 44, '37', 'first', '03', 'HCS4693', '2019-10-21 11:31:33'),
(75, 'HHS2019/010', '1st Term', '2019/2020', 44, '37', 'second', '09', 'HCS4693', '2019-10-21 11:31:34'),
(76, 'HHS2019/010', '1st Term', '2019/2020', 44, '37', 'third', '09', 'HCS4693', '2019-10-21 11:31:36'),
(77, 'HHS2019/017', '1st Term', '2019/2020', 44, '37', 'first', '09', 'HCS4693', '2019-10-21 11:31:38'),
(78, 'HHS2019/017', '1st Term', '2019/2020', 44, '37', 'second', '09', 'HCS4693', '2019-10-21 11:31:39'),
(79, 'HHS2019/017', '1st Term', '2019/2020', 44, '37', 'third', '10', 'HCS4693', '2019-10-21 11:31:40'),
(80, 'HHS2019/001', '1st Term', '2019/2020', 44, '37', 'exam', '60', '', '2019-10-21 11:32:06'),
(81, 'HHS2019/004', '1st Term', '2019/2020', 44, '37', 'exam', '59', '', '2019-10-21 11:32:09'),
(82, 'HHS2019/010', '1st Term', '2019/2020', 44, '37', 'exam', '58', '', '2019-10-21 11:32:13'),
(84, 'HHS2019/017', '1st Term', '2019/2020', 44, '37', 'exam', '35', '', '2019-10-21 11:32:21'),
(85, 'HHS2019/001', '1st Term', '2019/2020', 44, '26', 'exam', '60', '', '2019-10-21 11:33:12'),
(86, 'HHS2019/004', '1st Term', '2019/2020', 44, '26', 'exam', '0', '', '2019-10-21 11:33:15'),
(87, 'HHS2019/010', '1st Term', '2019/2020', 44, '26', 'exam', '0', '', '2019-10-21 11:33:17'),
(88, 'HHS2019/017', '1st Term', '2019/2020', 44, '26', 'exam', '59', '', '2019-10-21 11:33:23'),
(89, 'HHS2019/001', '1st Term', '2019/2020', 44, '5', 'exam', '56', '', '2019-10-21 11:34:13'),
(90, 'HHS2019/004', '1st Term', '2019/2020', 44, '5', 'exam', '34', '', '2019-10-21 11:34:15'),
(91, 'HHS2019/010', '1st Term', '2019/2020', 44, '5', 'exam', '22', '', '2019-10-21 11:34:17'),
(92, 'HHS2019/017', '1st Term', '2019/2020', 44, '5', 'exam', '35', '', '2019-10-21 11:34:28'),
(93, 'HHS2019/001', '1st Term', '2019/2020', 44, '23', 'exam', '0', '', '2019-10-21 11:34:36'),
(94, 'HHS2019/004', '1st Term', '2019/2020', 44, '23', 'exam', '0', '', '2019-10-21 11:34:36'),
(95, 'HHS2019/010', '1st Term', '2019/2020', 44, '23', 'exam', '0', '', '2019-10-21 11:34:37'),
(96, 'HHS2019/017', '1st Term', '2019/2020', 44, '23', 'exam', '56', '', '2019-10-21 11:34:44');

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
  `registeredDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
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
(43, 'SSS 1 SCIENCEs', 6, '', 0, 'HCS2507', ''),
(44, 'SSS 1 ', 6, '', 0, 'HCS7555', ''),
(45, 'SSS 2', 6, '', 0, 'HCS4693', '');

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
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(26, 'Abimbola Ayodeji', 'HCS7555', 'Magboro', '08134327417', 'B.Ed', 'bimboladxtreme@gmail.com', 'HCS655A', 'images/teachersignature/duntoye.png', 'Teacher'),
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
  `dateSaved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schstudent`
--

INSERT INTO `schstudent` (`StudentID`, `schoolid`, `Surname`, `Middlename`, `Firstname`, `dateofbirth`, `gender`, `ClassID`, `HomeAddress`, `lga`, `stateoforigin`, `EmailAddress`, `Prevschools`, `Bloodgroup`, `Genotype`, `nationality`, `religion`, `healthstatus`, `passportphoto`, `dateSaved`) VALUES
(1, 'HHS2019/001', 'IBIYEMI', 'ESTHER', 'AYOMIDE', '2006-06-03', 'Female', 44, 'PLOT 38,ARIBIDO OSHOLA STREET,AREPO', 'ORIADE', 'OSUN', 'ibiyemiaa@yahoo.com, ibiyemibb', 'BABCOCK HIGH SCHOOL', 'B RHESUS', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'HEALTHY', '', '2019-10-09 14:52:57'),
(2, 'HHS2019/002', 'IBIYEMI', 'MARY', 'IFEOLUWA', '2007-07-28', 'Female', 31, 'PLOT 38, ARIBIDO OSHOLA STREET,AREPO', 'ORIADE', 'OSUN', 'ibiyemiaa@yahoo.com, ibiyemibb', 'BABCOCK HIGH SCHOOL', 'B RHESUS', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'VERY OKAY', '', '2019-10-09 15:11:28'),
(3, 'HHS2019/003', 'ODUKWE', 'DANIEL', 'CHUKWUEMEKA', '2005-05-03', 'Male', 33, '16,JOURNALIST PHASE 1 AREPO', 'KOSOFE', 'LAGOS', '', 'GREAT BLESSINGS SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'Good', '', '2019-10-10 08:38:54'),
(4, 'HHS2019/004', 'ODUKWE', '', 'DAVID', '2005-05-03', 'Male', 44, '16,JOURNALIST PHASE 1 AREPO', 'KOSOFE', 'LAGOS', '', 'GREAT BLESSINGS SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 08:46:27'),
(5, 'HHS2019/005', 'AKINGBESOTE', 'DIDEOLUWA', 'TEMITAYO', '2009-05-03', 'Female', 29, 'PLOT 37, BAYO OYEDE STREET, AREPO OGUN STATE', 'OJO LOCAL GOVERNMENT LAGO', 'LAGOS', 'tenniolaadeyemo@yahoo.com', 'FUTURE EDGE INTERNATIONAL SCHOOL.', 'AA', 'O+', 'NIGERIAN', 'CHRISTIANITY', 'Good', 'images/passportphoto/JS 1 Dide.jpg', '2019-10-10 08:50:36'),
(6, 'HHS2019/006', 'ALLI', 'SINMISOLA', 'ESTHER', '2009-06-26', 'Female', 29, '16,BAYO OYEDE STREET,AREPO OGUN STATE', 'IBADAN SOUTH EAST', 'OYO STATE', 'simeon07alli@yahoo.com', 'HAVARD CHILDREN SCHOOL', 'AA', 'O', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', 'images/passportphoto/JS 1 Sinmi.jpg', '2019-10-10 08:54:43'),
(7, 'HHS2019/007', 'SOLUADE', 'ANITA', 'OMOFOYINSOLA', '2009-09-25', 'Female', 29, 'PLOT 31,TAIWO OGUNS STREET, AREPO OGUN STATE', 'ABEOKUTA NORTH L.G', 'OGUN STATE', 'Hypumping@gmail.com', 'HAVARD CHILDREN SCHOOL', 'O POSITIVE', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'NORMAL', 'images/passportphoto/JS 1 Foyin.jpg', '2019-10-10 09:00:04'),
(8, 'HHS2019/008', 'ADEYI', 'ISAAC', 'IGOCHE', '2009-06-23', 'Male', 29, '2,MALACHAI CLOSE JOURNALIST PHASE 2', 'OTUKPO', 'BENUE STATE', 'achkwu.adeyi@gmail.com, adaade', 'HAVARD CHILDREN SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', 'images/passportphoto/JS 1 Isaac.jpg', '2019-10-10 09:08:38'),
(9, 'HHS2019/009', 'ADEYI', 'EMMANUEL', 'ADEYI', '2006-12-03', 'Male', 31, '2,MALACHAIN CLOSE JOURNALIST PHASE 2 AREPO', 'OTUKPO', 'BENUE STATE', 'achukwu.adeyi@gmail.com, adaad', 'CHAMPIONS SCHOOLS', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 09:14:00'),
(11, 'HHS2019/010', 'IWUAGWU', 'PRECIOUS', 'UGOMMA', '1999-09-02', 'Female', 44, 'THIS DAY AVENUE NUJ PHASE 1 AREPO', 'IKADRU', 'IMO STATE', 'nnenwa50@hotmail.com', 'SPRINGWORTH SCHOOL', 'O POSITIVE', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 09:40:46'),
(12, 'HHS2019/011', 'HUSSEIN', 'TOLUWANIMI', 'DEBORAH', '2008-05-18', 'Female', 30, 'PLOT 8,ASSOCIATION ROAD,VOERA ESTATE.AREPO', 'ATIBA', 'OYO STATE', 'ayan_hussein@yahoo.co.uk', 'SKYCREST HIGH SCHOOL', 'O POSITIVE', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 09:45:03'),
(13, 'HHS2019/012', 'KANU', 'FAVOUR', 'CHIOMA', '0000-00-00', 'Female', 33, 'NO2,SPORTS DAY AVENUE NUJ PHASE 1', '', '', '', '', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 09:49:59'),
(14, 'HHS2019/013', 'OSUAFOR', 'KAMSIYOCHUKWU', 'BRIANNA', '2008-11-29', 'Female', 29, 'NO 2,SPORTS DAY AVENUE NUJ PHASE 1 AREPO', 'AGUATA', 'ANAMBRA', 'uzoryellow@gmail.com', 'ROLE MODEL SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', 'images/passportphoto/JS 1 Kamsi.jpg', '2019-10-10 09:52:47'),
(15, 'HHS2019/014', 'OJEKEMI', 'ABIOLA', 'AYOOLUWATOMIWA', '2008-04-15', 'Male', 31, 'PLOT 1047 BALOGUN OLORUNFEMI CRESCENT AREPO OGUN STATE', 'AYEDADE', 'OSUN', 'deoluesq@yahoo.com, oluwatomis', 'WELL SPRING COLLEGE', 'B+', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'VERY WELL', '', '2019-10-10 09:56:59'),
(16, 'HHS2019/015', 'DAUDA', 'MOHAMMED', 'AHMED', '2009-05-10', 'Male', 29, '48,DARAMOLA OLU STREET, AREPO', 'KABBA/BUNU', 'KOGI STATE', 'LiyaLiya1@yahoo.com', 'OLIVE CRESCENT SCHOOL', 'O+', 'AA', 'NIGERIAN', 'ISLAM', 'HEALTHY+', '', '2019-10-10 10:03:01'),
(17, 'HHS2019/016', 'ERHABOR', 'ORIEKOSE', 'MARVELLOUS', '2008-04-07', 'Male', 31, 'BLOCK 27,THIS DAY STREET, JOURNALIST  ESTATE PHASE 1', 'ORHIOMWON', 'EDO', 'friday@markcelenz.com', 'LENS BRIDGE', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 10:26:04'),
(18, 'HHS2019/017', 'ABEGUNDE', 'IREOLUWATOMIWA', 'JOSHUA', '2005-12-18', 'Male', 44, '3A,OLUSOLA ONI STREET,BERA ESTATE,AREPO', 'AIYEKIRE', 'EKITI', 'olatunboto@hotmail.com', 'CHAMPIONS INTL SCHOOL', 'A', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 10:35:35'),
(19, 'HHS2019/018', 'ABEGUNDE', 'MOFIYINFOLUWA', 'PAUL', '2008-01-02', 'Male', 31, '3A,OLUSOLA ONI STREET,BERA ESTATE,AREPO.', 'AIYEKIRE', 'EKITI', 'olatunboto@hotmail.com', 'CHAMPIONS INTL SCHOOL', 'A', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 10:39:46'),
(20, 'HHS2019/019', 'ANIBABA', 'BOLARINWA', 'BIBABATIFE', '2007-08-07', 'Male', 31, '21B, THIS DAY AVENUE,JOURNALIST ESTATE PHASE 1', 'SURULERE', 'LAGOS STATE', 'Biolaajasaoluwa@gmail.com', 'CALVARY HIGH SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'PERFECT', '', '2019-10-10 10:43:24'),
(21, 'HHS2019/020', 'OREKOYA', 'OLUWADARASIMI', 'ADEMOLA', '2009-10-03', 'Male', 29, 'NO 2,JIMOH AKINSANYA STREET, AREPO.', 'IJEBU IFE', 'OGUN STATE', 'busbis04@yahoo.com', 'TRINITY KIDS SCHOOL', '', '', 'NIGERIAN', 'CHRISTIANITY', 'GOOD', '', '2019-10-10 10:47:01'),
(22, 'HHS2019/021', 'OBANLA', 'OLUWADAMILOLA', 'OBANLA', '2008-03-28', 'Male', 30, 'UNITY STREET HOUSE FOUR', 'AKOKO NORTH WEST', 'ONDO STATE', 'bunmiboyede.bb@gmail.com', 'KINGS COLLEGE LAGOS', 'O POSITIVE', 'AA', 'NIGERIAN', 'CHRISTIANITY', 'LESS STREESS', '', '2019-10-10 10:50:48'),
(23, 'HHS2019/022', 'ADEAGBO', 'ADESEWA', 'RODIYYAH', '2008-10-17', 'Female', 30, 'PLOT 2,UNIQUE ESTATE INAWA/ AREPO', 'ONA ARA', 'OYO STATE', 'adeyinkaadijatadeagbo@gmail.co', 'TAKBIR COLLEGE IBADAN', 'O POSITIVE', 'AS', 'NIGERIAN', 'ISLAM', 'GOOD', '', '2019-10-10 11:03:01'),
(24, 'HHS2019/023', 'AJIBOLA', 'EMMANUEL', 'OLUWADAMILOLA', '2008-04-01', 'Male', 30, '3,ALAAFIATAYO CLOSE HAVANNA ESTATE, AREPO TOWN', 'IKOLE', 'EKITI STATE', 'olusolaajibola@yahoo.com', 'WELL SPRING COLLEGE OMOLE PHASE 2', '', '', 'NIGERIAN', 'CHRISTIANITY', 'OKAY', '', '2019-10-10 12:59:46'),
(25, 'HHS2019/024', 'SHAOLA', 'OLAYINKA', 'SAMUEL', '2006-07-11', 'Male', 45, 'NO 31A,ASSOCIATION VOERA ESTATE AREPO', 'OBOKUN', 'OSUN', 'olayinkas@yahoo.com', 'ISOLOG SCHOOLS OJODU', 'O POSITIVE', 'AS', 'NIGERIAN', 'CHRISTIANITY', 'EXCELLENT', '', '2019-10-10 13:03:48'),
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
  `session` int(10) NOT NULL,
  `paymentstructureid` int(4) NOT NULL,
  `classid` varchar(2) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
-- Table structure for table `subjectexceptions`
--

CREATE TABLE `subjectexceptions` (
  `exceptionid` int(11) NOT NULL,
  `stdid` varchar(15) NOT NULL,
  `subjectid` varchar(8) NOT NULL,
  `classid` varchar(6) NOT NULL,
  `session` varchar(10) NOT NULL,
  `notoffered` int(1) NOT NULL,
  `datetimeadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectexceptions`
--

INSERT INTO `subjectexceptions` (`exceptionid`, `stdid`, `subjectid`, `classid`, `session`, `notoffered`, `datetimeadded`) VALUES
(9, 'HHS2019/004', '2', '32', '2019/2020', 0, '2019-10-17 14:55:04'),
(14, 'HHS2019/001', '4', '32', '2019/2020', 1, '2019-10-17 14:56:49'),
(19, 'HHS2019/001', '2', '32', '2019/2020', 0, '2019-10-17 14:58:51'),
(21, 'HHS2019/001', '3', '32', '2019/2020', 1, '2019-10-18 18:17:31'),
(29, 'HHS2019/010', '2', '32', '2019/2020', 0, '2019-10-19 13:53:31'),
(30, 'HHS2019/001', '26', '44', '2019/2020', 1, '2019-10-21 10:20:30'),
(39, 'HHS2019/004', '26', '44', '2019/2020', 0, '2019-10-21 10:21:26'),
(43, 'HHS2019/017', '26', '44', '2019/2020', 1, '2019-10-21 10:21:49'),
(46, 'HHS2019/010', '26', '44', '2019/2020', 0, '2019-10-21 10:22:31'),
(47, 'HHS2019/024', '25', '45', '2019/2020', 0, '2019-10-21 10:23:09'),
(48, 'HHS2019/024', '28', '45', '2019/2020', 1, '2019-10-21 10:23:18'),
(51, 'HHS2019/001', '27', '44', '2019/2020', 1, '2019-10-21 10:23:39'),
(54, 'HHS2019/004', '27', '44', '2019/2020', 1, '2019-10-21 10:23:45'),
(57, 'HHS2019/010', '27', '44', '2019/2020', 1, '2019-10-21 10:23:50'),
(60, 'HHS2019/017', '27', '44', '2019/2020', 1, '2019-10-21 10:23:57'),
(63, 'HHS2019/001', '5', '44', '2019/2020', 1, '2019-10-21 10:41:30'),
(66, 'HHS2019/004', '5', '44', '2019/2020', 1, '2019-10-21 10:41:38'),
(69, 'HHS2019/010', '5', '44', '2019/2020', 1, '2019-10-21 10:41:48'),
(72, 'HHS2019/017', '5', '44', '2019/2020', 1, '2019-10-21 10:41:57'),
(75, 'HHS2019/001', '23', '44', '2019/2020', 0, '2019-10-21 10:42:13'),
(78, 'HHS2019/004', '23', '44', '2019/2020', 0, '2019-10-21 10:42:21'),
(81, 'HHS2019/017', '23', '44', '2019/2020', 1, '2019-10-21 10:42:30'),
(85, 'HHS2019/010', '23', '44', '2019/2020', 0, '2019-10-21 10:42:38'),
(88, 'HHS2019/001', '9', '44', '2019/2020', 1, '2019-10-21 10:45:44'),
(91, 'HHS2019/004', '9', '44', '2019/2020', 1, '2019-10-21 10:45:56'),
(94, 'HHS2019/010', '9', '44', '2019/2020', 1, '2019-10-21 10:46:03'),
(97, 'HHS2019/017', '9', '44', '2019/2020', 1, '2019-10-21 10:46:07'),
(195, 'HHS2019/001', '37', '44', '2019/2020', 1, '2019-10-21 11:19:45'),
(196, 'HHS2019/004', '37', '44', '2019/2020', 1, '2019-10-21 11:19:56'),
(208, 'HHS2019/010', '37', '44', '2019/2020', 1, '2019-10-21 11:31:33'),
(211, 'HHS2019/017', '37', '44', '2019/2020', 1, '2019-10-21 11:31:38');

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
(2, '32Phys', 'SSS', 'Physics', '32', 0, 'Mandatory', 'HCS2507', '2019-10-15 14:52:06'),
(3, '32Chem', 'SSS', 'Chemistry', '32', 0, 'Mandatory', 'HCS1079', '2019-10-15 14:52:16'),
(4, '32Biol', 'SSS', 'Biology', '32', 0, 'Mandatory', 'HCS2507', '2019-10-15 14:52:21'),
(5, '44Math', '', 'Mathematics', '44', 0, 'Mandatory', 'HCS4826', '2019-10-21 10:00:14'),
(6, '45Math', '', 'Mathematics', '45', 0, 'Mandatory', 'HCS4826', '2019-10-21 10:00:19'),
(7, '45Engl', '', 'English Language', '45', 0, 'Mandatory', 'HCS7555', '2019-10-21 10:00:27'),
(9, '44Engl', '', 'English Language', '44', 0, 'Mandatory', 'HCS7555', '2019-10-21 10:00:31'),
(10, '29Engl', '', 'English Language', '29', 0, 'Mandatory', 'HCS4853', '2019-10-21 10:02:11'),
(11, '30Engl', '', 'English Language', '30', 0, 'Mandatory', 'HCS4853', '2019-10-21 10:02:15'),
(12, '31Engl', '', 'English Language', '31', 0, 'Mandatory', 'HCS7555', '2019-10-21 10:02:17'),
(13, '31Math', '', 'Mathematics', '31', 0, 'Mandatory', 'HCS5823', '2019-10-21 10:03:17'),
(14, '29Math', '', 'Mathematics', '29', 0, 'Mandatory', 'HCS5823', '2019-10-21 10:03:22'),
(15, '30Math', '', 'Mathematics', '30', 0, 'Mandatory', 'HCS5823', '2019-10-21 10:03:25'),
(17, '29Inte', '', 'Integrated science', '29', 0, 'Mandatory', 'HCS7430', '2019-10-21 10:09:03'),
(18, '30Inte', '', 'Integrated science', '30', 0, 'Mandatory', 'HCS7430', '2019-10-21 10:09:08'),
(19, '31Inte', '', 'Integrated science', '31', 0, 'Mandatory', 'HCS7430', '2019-10-21 10:09:15'),
(20, '31Busi', '', 'Business Studies', '31', 0, 'Mandatory', 'HCS7779', '2019-10-21 10:09:27'),
(21, '30Busi', '', 'Business Studies', '30', 0, 'Mandatory', 'HCS7779', '2019-10-21 10:09:31'),
(22, '29Busi', '', 'Business Studies', '29', 0, 'Mandatory', 'HCS7779', '2019-10-21 10:09:34'),
(23, '44Phys', '', 'Physics', '44', 0, 'Mandatory', 'HCS4826', '2019-10-21 10:09:50'),
(24, '45Phys', '', 'Physics', '45', 0, 'Mandatory', 'HCS4826', '2019-10-21 10:09:53'),
(25, '45Chem', '', 'Chemistry', '45', 0, 'Mandatory', 'HCS6807', '2019-10-21 10:09:59'),
(26, '44Chem', '', 'Chemistry', '44', 0, 'Mandatory', 'HCS6807', '2019-10-21 10:10:02'),
(27, '44Biol', '', 'Biology', '44', 0, 'Mandatory', 'HCS6807', '2019-10-21 10:10:09'),
(28, '45Biol', '', 'Biology', '45', 0, 'Mandatory', 'HCS6807', '2019-10-21 10:10:12'),
(29, '45Comm', '', 'Commerce', '45', 0, 'Mandatory', 'HCS9243', '2019-10-21 10:10:19'),
(30, '44Comm', '', 'Commerce', '44', 0, 'Mandatory', 'HCS9243', '2019-10-21 10:10:22'),
(31, '44Acco', '', 'Account', '44', 0, 'Mandatory', 'HCS9243', '2019-10-21 10:10:29'),
(32, '45Acco', '', 'Account', '45', 0, 'Mandatory', 'HCS9243', '2019-10-21 10:10:32'),
(33, '45Lite', '', 'Literature in English', '45', 0, 'Mandatory', 'HCS4853', '2019-10-21 10:10:56'),
(34, '44Lite', '', 'Literature in English', '44', 0, 'Mandatory', 'HCS4853', '2019-10-21 10:11:00'),
(35, '44Gove', '', 'Government', '44', 0, 'Mandatory', 'HCS2507', '2019-10-21 10:11:06'),
(36, '45Gove', '', 'Government', '45', 0, 'Mandatory', 'HCS2507', '2019-10-21 10:11:10'),
(37, '44Geog', '', 'Geography', '44', 0, 'Mandatory', 'HCS4693', '2019-10-21 11:16:05'),
(38, '45Geog', '', 'Geography', '45', 0, 'Mandatory', 'HCS4693', '2019-10-21 11:16:10'),
(39, '45Tech', '', 'Technical Drawing', '45', 0, 'Mandatory', 'HCS4693', '2019-10-21 11:16:21'),
(40, '44Tech', '', 'Technical Drawing', '44', 0, 'Mandatory', 'HCS4693', '2019-10-21 11:16:23'),
(41, '29Basi', '', 'Basic Technology', '29', 0, 'Mandatory', 'HCS4693', '2019-10-21 11:16:37'),
(42, '30Basi', '', 'Basic Technology', '30', 0, 'Mandatory', 'HCS4693', '2019-10-21 11:16:39'),
(43, '31Basi', '', 'Basic Technology', '31', 0, 'Mandatory', 'HCS4693', '2019-10-21 11:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `teacherscomment`
--

CREATE TABLE `teacherscomment` (
  `id` int(11) NOT NULL,
  `teacherid` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `studentid` varchar(15) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `resulttype` varchar(100) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherscomment`
--

INSERT INTO `teacherscomment` (`id`, `teacherid`, `session`, `term`, `studentid`, `comment`, `resulttype`, `dateadded`) VALUES
(1, 'HCS2507', '2019/2020', '1st Term', 'HHS2019/010', 'Please try again next time. You may get lucky', 'midterm', '2019-10-19 13:16:26'),
(4, 'HCS2507', '2019/2020', '1st Term', 'HHS2019/004', 'Keep it up my dear', 'midterm', '2019-10-19 13:20:27'),
(6, 'HCS2507', '2019/2020', '1st Term', 'HHS2019/001', 'You definitely can do better. oh yeah', 'midterm', '2019-10-19 13:56:26'),
(7, 'WILLIAMS, ', '2019/2020', '1st Term', 'HHS2019/035', '', 'midterm', '2019-10-21 10:19:28'),
(13, 'Abimbola A', '2019/2020', '1st Term', 'HHS2019/001', 'This is a brilliant performance. Keep it up', 'terminal', '2019-10-21 11:38:34');

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
-- Indexes for table `subjectexceptions`
--
ALTER TABLE `subjectexceptions`
  ADD PRIMARY KEY (`exceptionid`),
  ADD UNIQUE KEY `stdid` (`stdid`,`subjectid`,`classid`,`session`);

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
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `gradeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `reportid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
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
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
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
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
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
--
-- AUTO_INCREMENT for table `subjectexceptions`
--
ALTER TABLE `subjectexceptions`
  MODIFY `exceptionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `teacherscomment`
--
ALTER TABLE `teacherscomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
