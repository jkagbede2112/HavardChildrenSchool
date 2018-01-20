<?php
include 'PHP/databaseSQLconnectn.php';
$schoolname = "Amazing Grace International College, Ibadan";

session_start();
error_reporting(0);

$role = $_SESSION['Role'];
if ($role === "Admin") {
    header('location:dashboard.php');
} elseif ($role === "Teacher") {
    
}elseif($role === "Bursar"){
    header('location:schoolbursar.php');
} else {
    header('location:loginpane.php');
}
?>
<html>
    <head>
        <script src="JS/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="JS/bootstrap.min.js" type="text/javascript"></script>
        <title><?php echo $schoolname . ": " . $_SESSION['Name']; ?></title>
        <style>
            body{
                margin:0px;
            }
            .fa-refresh{
                cursor:pointer;
            }
            .de{
                color:#CD277D;
                padding:2px;
                border-radius:2px;
            }
            .de:hover{
                background-color:#CD277D;
                color:#fff;
            }
            .ac{
                color:#255625;
                padding:2px;
                border-radius:2px;
            }
            .ac:hover{
                color:#fff;
                background-color:#255625
            }
            .menuitems div:hover{
                background-color:rgba(0,0,0,0.2);
                transition:0.25s;
            }
            .menuitems{
                cursor:pointer;
                color:#fff;
            }
            .activemenu{
                background-color:rgba(0,0,0,0.2);
                color:#1CB5FF;
            }
            .activemsgtype{
                background-color:#005E8A;
                color:#003955;
            }
            .messages{
                cursor:pointer;
            }
            .activemsg{
                background-color:rgba(0,0,0,0.1);
            }
            .dashmenu{
                position:absolute; 
                color:#FCD039; 
                font-size:11px; 
                font-family:verdana; 
                top:45px;
            }
            .pl{
                margin:2px; 
                background-color:#C5D9E2; 
                cursor:pointer; 
                padding:5px;
                border-radius:2px;
            }
            .pl:hover{
                background-color:#005E8A;
                color:#FFF;
                transition:0.25s;
            }
            .pls{
                background-color:#005E8A !important;
                color:#FFF !important;
            }
            .menustyling{
                color:#E3EDF2 ; 
                font-size:22px !important; 
                padding:20px; 
                padding-left:30px; 
                padding-right:55px;
                position:relative
            }
            .point{
                cursor:pointer;
            }
            .ptr{
                cursor:pointer;
            }
            .eventslist{
                font-size:25px; 
                padding:20px; 
                padding-bottom:0px; 
                color:#A88302;
                font-family: 'Roboto', sans-serif;
            }
            .eventDate{
                font-size:14px; 
                padding-left:20px; 
                width:auto; 
                font-family:verdana; 
                color:#2C4C5B
            }
            .deleteevent{
                position:absolute; 
                right:13px; 
                top:8px; 
                color:#BDD5DF; 
                padding:3px
            }
            .deleteevent:hover{
                padding:3px;
                background-color:#BDD5DF;
                color:#CD277D;
                transition:0.5s
            }
            .updateevent{
                position:absolute; 
                right:35px; 
                top:9px; 
                color:#BDD5DF; 
                padding:3px;
            }
            .eventContainer{
                background-color:rgba(255,255,255,0.2); 
                min-height:100px;
                position:relative; 
                margin-bottom: 10px;
                cursor:pointer;
                border-radius:4px;
                border-style:solid;
                border-color:#C9DCE4;
                border-width:thin;
            }
            .eventContainer:hover{
                background-color:rgba(255,255,255,0.5);
                transition: 0.5s
            }
            .datepassed{
                position:absolute; 
                bottom:6px; 
                right:10px; 
                font-size:12px; 
                font-family:verdana; 
                color:#CD277D
            }
            .iconsAbove{
                color:#fff; 
                background-color:#c9302c; 
                padding:3px; 
                font-size:10px; 
                position:absolute; 
                right:-5px; 
                bottom:-5px; 
                border-radius:50%
            }
            .gS{
                border-left-style: dotted; 
                border-width:thin;
                border-color:#C5C5C5;
                text-align: center;
            }
        </style>
        <link href="../CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/fa/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <script src="JS/summernote.min.js" type="text/javascript"></script>
        <link href="JS/summernote.css" rel="stylesheet" type="text/css"/>
    </head> 
    <body>
        <div class="clearfix">
            <div class="pull-left menuitems" style="width:110px; background-color:#009CE8; min-height:100%; position:fixed; overflow-x: hidden; background-image: url('../images/background.jpg')">
                <div class="fa fa-university activemenu menustyling" id="hme" style="margin-top:80px" onclick="menuitems('#home', '#hme')">
                    <span class="dashmenu">Home</span>
                </div><br/>
                <div class="fa fa-newspaper-o menustyling" id="nwsltters" onclick="menuitems('#newsletters', '#nwsltters')">
                    <span class="dashmenu">Newsletter</span>
                </div><br/>
                <div class="fa fa-users menustyling" id="prnts"  onclick="menuitems('#parents', '#prnts')">
                    <span class="dashmenu">Assignments</span>
                </div><br/>
                <?php
                if ($_SESSION['ClassID'] !== "NCT") {
                    ?>

                    <div class="fa fa-slideshare menustyling" id="teachrs" onclick="menuitems('#teachers', '#teachrs')">
                        <span class="dashmenu">Attendance</span>
                    </div><br/>
                    <div class="fa fa-pied-piper-alt menustyling" id="gs" onclick="menuitems('#gradesheet', '#gs')" style="display:none">
                        <span class="dashmenu">GradeSheet</span>
                    </div>
                    <?php
                }
                ?>

                <div class="fa fa-check menustyling" id="scre" onclick="menuitems('#scores', '#scre')">
                    <span class="dashmenu">Scores</span>
                </div><br/>
                <div class="fa fa-database menustyling" id="Tsetting" onclick="menuitems('#tsetng', '#Tsetting')">
                    <span class="dashmenu">Setting</span>
                </div><br/>
            </div>
            <div class="pull-right" style="width:calc(100% - 110px); background-color:#D0E0E8; min-height:100%">
                <div class="clearfix" style="height:50px; background-color:#005E8A; border-bottom-style: solid; border-bottom-width:thin; border-bottom-color:#000; box-shadow:0px 0px 1px #000">
                    <span class='pull-right' style="color:#fff; padding:10px; padding-top:12px; margin-right:20px; cursor:pointer">
                        <a href="logout.php"><i class="fa fa-power-off" style='font-size:20px; position:relative; color:#FFB3B3; text-shadow: 0px 1px 1px #000' title='Log out'></i>  </a>
                    </span>
                    <span class='pull-right' style="color:#fff; padding:10px; margin-right:20px; cursor:pointer">
                        <i class="fa fa-envelope" style='font-size:20px; position:relative' title='messages' onclick="menuitems('#messages', '#msg')">
                            <span class="iconsAbove" id='dmCount'>2</span>
                        </i>  
                    </span>
                    <span class='pull-right' style="color:#fff; padding:10px; margin-right:5px; cursor:pointer; display:none" title='ParentCount'>
                        <i class="fa fa-slideshare" style='font-size:20px; position:relative'>
                            <span class="iconsAbove" id="parentCount">8</span>
                        </i>  
                    </span>
                    <span class='pull-right' style="color:#fff; padding:10px; margin-right:5px; cursor:pointer; display:none" title='Students'>
                        <i class="fa fa-graduation-cap" style='font-size:20px; position:relative'>
                            <span class="iconsAbove" id="stdcount">2</span>
                        </i>  
                    </span>

                </div>
                <div style="height:30px; color:#E3EDF2; font-size:12px; padding:7px; text-align: right; background-image: url('../images/background.jpg'); margin-bottom:20px; box-shadow:0px 0px 1px #000">
                    Welcome <?php echo " " . $_SESSION['Name']; ?>
                </div>
                <div style='margin:20px'>
                    <div class='row' style='margin:0px;' id="home">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Dashboard
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                            <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:20px">
                                Class Teacher
                                <div id="classteachers">
                                    <table class="table table-responsive table-condensed table-hover" style="font-family:verdana; font-size:12px">
                                        <?php
                                        $ct = $_SESSION['TeacherID'];
                                        $d = mysqli_query($w,"select * from schclass where ClassTeacher='$ct' order by ClassName ASC");
                                        while ($a = mysqli_fetch_array($d)) {
                                            $fdf = $a['ClassName'];
                                            $u = mysqli_query($w,"select * from schstudent where ClassID='$fdf'");
                                            
                                            echo "<tr><td>" . $fdf . " [ ".mysqli_num_rows($u)." students ]</td><td></td></tr>";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                            <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:20px">
                                Subject Teacher
                                <div id="subjectteachers">
                                    <table class="table table-responsive table-condensed table-hover" style="font-family:verdana; font-size:12px">
                                        <?php
                                        $ct = $_SESSION['TeacherID'];
                                        $d = mysqli_query($w,"select * from subjects where TeacherID='$ct'");
                                        while ($a = mysqli_fetch_array($d)) {
                                            echo "<tr><td>" . $a['SubjectCategory'] . " - " . $a['SubjectName'] . "</td></tr>";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class='col-lg-6 col-md-4 col-sm-12 col-xs-12'>
                            <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:20px">
                                Events
                            </div>
                            <div id="shownevents">

                            </div>
                        </div>
                        <div class='col-lg-3 col-md-4 col-sm-12 col-xs-12' style="padding-left:0px">
                            <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:20px">
                                Term Calendar
                            </div>
                            <div style="background-color:rgba(255,255,255,0.2);padding:10px; border-radius:4px">
                                <table border="0" cellpadding="0" class='table table-responsive table-condensed table-striped' style='font-size:13px; font-family: verdana' id="ratifiedtimetable">

                                </table>    
                            </div>

                        </div>
                    </div>
                    <!-- newsletters -->
                    <div class='row' style='margin:0px; display:none' id="newsletters">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Newsletters
                        </div>
                        <div class="col-lg-4">
                            <div style="font-family:raleway; font-size:15px; font-weight:bold; border-bottom-style:solid; border-bottom-width:thin; border-color:#C1D7E1; padding:10px; padding-left:0px; margin-bottom:20px">
                                Sent Newsletters
                            </div>
                            <div style="background-color:rgba(255,255,255,0.2); min-height:50px; padding:10px;">
                                <table class="table table-condensed table-striped table-hover" style=" font-size:14px" id="sentNewsletters">

                                </table> 
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <!-- Send message -->
                            <div style="padding:20px; padding-top:20px; margin-bottom:20px; min-height:300px; border-radius:2px; background-color:rgba(255,255,255,0.2)" id="nlContent">

                            </div>
                        </div>

                        <!-- Modal form for list and emailing -->
                        <div class="modal fade bs-example-modal-sm" id="suggestion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                            <div class="modal-dialog modal-sm" role="document" style='font-face:verdana; font-size:12px'>
                                <div class="modal-content">
                                    <div class="modal-header" style='background-color:#E8EEF4'>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h6><center><b>Attached Students<br/><span id='teachername' style="font-weight:normal"></span></b></center></h6>
                                    </div>
                                    <div class="modal-body" style='background-color: #EFF8EF' id="attachedStudents">
                                        <table class="table table-condensed table-striped" id="thelist" style="font-size:12px">

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of list and emailing -->
                    </div>
                    <div class='row' style='margin:0px; display:none' id="messages">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Messages
                        </div>
                        <div class="col-lg-10" style="min-height:200px;">
                            <div class="col-lg-12">
                                <div class="col-lg-4" id="messageheader" style="padding-right:2px; padding-left:10px; background-color:rgba(255,255,255,0.2)">
                                    <div style="max-height:200px; overflow-y:auto">
                                        <table class="table table-condensed" style="font-size:13px; border:none" id="msgprecursor"> 

                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-8" id="messagecontent" style="font-size:17px; padding:20px; min-height: 240px; background-color:rgba(255,255,255,0.4)">
                                    <div style="max-height:200px; overflow-y:auto">
                                        <span id="mailcontent" style="font-size:13px; font-family:montserrat, verdana" class="clearfix">
                                            <span class="pull-right" style="margin-right:10px; font-size:10px" id="messagedate">
                                                29th October 2015
                                            </span>
                                            <span id="messagebody">
                                                Please select a message
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row' style='margin:0px; display:none' id="parents">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Assignments
                        </div>

                        <div class="col-lg-8" style='margin-right:10px; padding:0px;'>
                            <!-- Send message -->
                            <div style="padding:20px; padding-top:20px; margin-bottom:20px; position:relative; border-radius:2px; background-color:rgba(255,255,255,0.2)">
                                <span id='assignmentstat' style='position:absolute; right:20px; top:10px; font-family:verdana; font-size:12px'></span>
                                <div style="font-family:raleway; font-size:20px; margin-bottom:20px">
                                    Issue Assignments
                                </div>
                                <label style="margin-top:15px">Student group</label>
                                <select class="form-control" id="assignClass">
                                    <?php
                                    $TID = $_SESSION['TeacherID'];
                                    echo $TID;
                                    $f = mysqli_query($w,"Select * from subjects where TeacherID='$TID'");
                                    while ($g = mysqli_fetch_array($f)) {
                                        echo "<option>" . $g['SubjectCategory'] . "-" . $g['SubjectName'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <label style="margin-top:15px">Message</label>
                                <textarea id="assignmentProp" class='form-control' rows='5' style='resize: none'></textarea>
                                <span class="btn btn-primary" style="margin-top:10px" onclick="issueAssignments()"><i class="fa fa-envelope-o" style="margin-right:10px"></i>Send Assignments</span>
                                <div id="PmailMessage" style="margin-top:10px"></div>
                            </div>
                        </div>
                        <div class="col-lg-3" style='padding:0px'>
                            <!-- Send message -->
                            <div style="font-family:raleway; font-size:20px; margin-bottom:7px">
                                Assignments Issued
                            </div>
                            <div style="padding:5px; padding-top:20px; margin-bottom:20px; border-radius:2px; background-color:rgba(255,255,255,0.2)">
                                <table class='table table-striped table-condensed table-hover' id='assignmentsPanel' style='font-size:12px; font-family:verdana'>

                                </table>
                            </div>
                        </div>

                        <!-- Modal for emailing  data-toggle="modal" data-target="#emailspecificParents" -->
                        <div class="modal fade bs-example-modal-sm" id="emailspecificParents" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                            <div class="modal-dialog modal-sm" role="document" style='font-face:verdana; font-size:12px'>
                                <div class="modal-content">
                                    <div class="modal-header" style='background-color:#E8EEF4'>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h6><center><b>Message <br/><span id='Mparentname' style="font-weight:normal">Mrs. Onireke </span></b></center></h6>
                                    </div>
                                    <div class="modal-body" style='background-color: #EFF8EF'>
                                        <div class="form-group">
                                            <span style="">
                                                <label style="margin-top:20px">Email Address</label>
                                                <input type="text" class="form-control" id="Mparentemail" disabled="disabled">
                                            </span>
                                            <label style="margin-top:20px">Subject</label>
                                            <input type="text" class="form-control" id="Mparentsubject">
                                            <label style="margin-top:20px">Message</label>
                                            <textarea class="form-control" style="resize:none" id="parentmessage"></textarea>
                                            <input type="checkbox" value="robot" id="eminiS" hidden>
                                            <div class="btn btn-success" onclick="MsendparentMail()" style="margin-top:20px; width:100%;"><i class="fa fa-envelope-o" style="margin-right:5px"></i> Send message </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style='background-color:#E8EEF4'>
                                        <div id="emailspecificParentsResponse" style="text-align: center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of modal for emailing -->

                        <!-- Modal form for list and emailing -->
                        <div class="modal fade bs-example-modal-sm" id="viewPattaches" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                            <div class="modal-dialog modal-sm" role="document" style='font-face:verdana; font-size:12px'>
                                <div class="modal-content">
                                    <div class="modal-header" style='background-color:#E8EEF4'>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h6><center><b>Attached Students<br/><span id='teachername' style="font-weight:normal"></span></b></center></h6>
                                    </div>
                                    <div class="modal-body" style='background-color: #EFF8EF' id="attachedStudents">
                                        <table class="table table-condensed table-striped" id="thelists" style="font-size:12px">

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of list and emailing -->
                    </div>

                    <?php
                    if ($_SESSION['ClassID'] !== "NCT") {
                        ?>
                        <!-- Attendance Sheet open only to Class Teachers -->
                        <div class='row' style='margin:0px; display: none' id="teachers">
                            <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                                Attendance
                            </div>
                            <div class='row' style='padding-left:15px'>
                                <div class="col-lg-3" style="min-height:240px; height:auto; padding:20px; margin-right:20px; background-color:rgba(255,255,255,0.2)">
                                    <label>Class</label>
                                    <select type='text' style="margin-bottom:10px" class='form-control' id="classID2Check">
                                        <?php
                                        $IDfT = $_SESSION['TeacherID'];
                                        $gg = mysqli_query($w,"select * from schclass where ClassTeacher='$IDfT'");
                                        while ($g = mysqli_fetch_array($gg)) {
                                            echo "<option>" . $g['ClassName'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <?php
                                    $t = mysqli_query($w,"select * from currentsession order by sn desc");
                                    $g = mysqli_fetch_array($t);
                                    ?>
                                    <label>Session</label>
                                    <input type='text' class='form-control' value="<?php echo $g['Session']; ?>" disabled style="margin-bottom:10px">
                                    <label>Current date</label>
                                    <input type='text' class='form-control' disabled value='<?php echo date('j-M-Y') ?>'>

                                </div>
                                <div class="col-lg-3" style="min-height:240px; max-height:400px; overflow-y:auto; margin-right:20px; background-color:rgba(255,255,255,0.2)">

                                    <div style="font-family:raleway; font-size:20px; font-weight:bold; padding-left:0px; margin-bottom:10px; margin-top:10px">
                                        <span class="btn btn-success" style="padding:5px; font-size:12px" onclick="getAttendance(classID2Check.value)" id="attendanceTaker">Take Attendance</span>
                                    </div>
                                    <table class="table table-striped table-condensed" id="attendanceP">

                                    </table>
                                </div>
                                <div class="col-lg-3" style="min-height:240px; height:auto; margin-right:20px; background-color:rgba(255,255,255,0.2)">
                                    <div style="font-family:raleway; font-size:16px; margin-top:10px">
                                        <span style="font-size:11px">I.P.A &nbsp; <input type="checkbox"> </span>Absent today.. &nbsp; &nbsp; 

                                    </div>
                                    <div style='max-height:200px; overflow-y: auto'>
                                        <table class="table table-condensed table-striped">
                                            <table class="table table-condensed table-striped" id="absentStudents" style="font-size:13px; font-family:verdana">
                                                <tr style="font-weight:bold"><td>StudentName</td><td>Inform Parents</td></tr>
                                            </table>
                                        </table> 
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12" style="padding-left:0px; padding-right:0px">
                                <div style="font-family:raleway; font-size:16px; margin-top:10px; margin-bottom: 10px">
                                    Attendance sheet <span style="margin-left:10px; padding:5px" class="btn btn-success" onclick="getAttendancelist(classID2Check.value)">Get Attendance list</span>
                                </div>
                                <div class="col-lg-12" style="min-height:240px; height:auto; margin-right:20px; background-color:rgba(255,255,255,0.2)">

                                    <table class="table table-condensed table-striped" id="attendaceRegister" style="margin-top:10px">
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                         <div class='row' style='margin:0px; display: none' id="gradesheet">
                            <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                                GradeSheet
                            </div>
                            <div class='row' style='padding-left:15px'>
                                <div class="col-lg-3" style="min-height:240px; height:auto; padding:20px; margin-right:0px; background-color:rgba(255,255,255,0.2)">
                                    <label>Class</label>
                                    <select type='text' style="margin-bottom:10px" class='form-control' onchange="loadClassGrade(this.value)">
                                        <?php
                                        $IDfT = $_SESSION['TeacherID'];
                                        $gg = mysqli_query($w,"select * from schclass where ClassTeacher='$IDfT'");
                                        while ($g = mysqli_fetch_array($gg)) {
                                            echo "<option>" . $g['ClassName'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <table class="table table-condensed table-responsive" id="loadClassMembers" style="font-size:13px; font-family:verdana">
                                        
                                    </table>
                                </div>
                                <div class="col-lg-8" style="background-color: rgba(255,255,255,0.5); min-height:200px">
                                    
                                </div>
                            </div>
                        </div>
                        
                        <?php
                    }
                    ?> 
                    <div class='row' style='margin:0px; display: none' id="scores">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Scores
                        </div>
                        <div class='row' style='padding-left:15px'>
                            <div class="col-lg-3" style="min-height:240px; height:auto; padding:20px; margin-right:20px; background-color:rgba(255,255,255,0.2)">
                                <span style="display:none">
                                    <label>SubjectNumber</label>
                                    <select class="form-control" id="subjectTaughtwClassSN" style='margin-bottom:10px' onchange="subjectTaughtwClass.selectedIndex = this.selectedIndex">
                                        <?php
                                        $TID = $_SESSION['TeacherID'];
                                        //echo $TID;
                                        $f = mysqli_query($w,"Select * from subjects where TeacherID='$TID'");
                                        while ($g = mysqli_fetch_array($f)) {
                                            echo "<option>" . $g['sn'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </span>
                                <label>Subject</label>
                                <select class="form-control" id="subjectTaughtwClass" style='margin-bottom:10px' onchange="subjectTaughtwClassSN.selectedIndex = this.selectedIndex">
                                    <?php
                                    $TID = $_SESSION['TeacherID'];
                                    //echo $TID;
                                    $f = mysqli_query($w,"Select * from subjects where TeacherID='$TID'");
                                    while ($g = mysqli_fetch_array($f)) {
                                        echo "<option>" . $g['SubjectCategory'] . "-" . $g['SubjectName'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <?php
                                $currterm = $_SESSION['Curr_Term'];
                                $currsession = $_SESSION['Curr_Session'];
                                ?>
                                <label>Term</label>
                                <input type='text' class='form-control' value="<?php echo $currterm ?>" id="scTerm" disabled style="margin-bottom:10px" title="Set by Administrator">
                                <label>Session</label>
                                <input type='text' class='form-control' value="<?php echo $currsession ?>" id="scSess" disabled="true" style='margin-bottom:10px' title="Set by Administrator">
                                <label>
                                    Category
                                </label>
                                <select class="form-control" id="cat5" onchange="chch()">
                                    <option>Class Exercise</option>
                                    <option>Assignment</option>
                                    <option>Quiz</option>
                                    <option>First Test</option>
                                    <option>Second Test</option>
                                    <option>Project</option>
                                    <option>Exam</option>
                                </select>
                                <div style="margin-top:30px">
                                    <input type='button' class='btn btn-toolbar' value='Assign Grades' onclick="getstudentsOffering(subjectTaughtwClassSN.value,cat5.value )">
                                    <span style="margin-left:10px; padding:5px" class="btn btn-success" onclick="getGradelist(subjectTaughtwClassSN.value)" style="margin-top:20px">Get Grade</span>

                                </div>

                            </div>
                            <div class="col-lg-6" style="min-height:310px; max-height:320px; overflow-y:auto; margin-right:20px; background-color:rgba(255,255,255,0.2)">
                                <div style="font-family:raleway; font-size:20px; font-weight:bold; padding-left:0px; margin-bottom:10px;">
                                </div>
                                <table class="table table-striped table-condensed" id="stuP" style='font-family:verdana; font-size:12px'>
                                    <tr style='font-weight:bold'><td></td><td>Name</td><td>1st</td><td>2nd</td><td>Exam</td></tr>
                                </table>
                            </div>
                            <div class="col-lg-3" style="min-height:240px; display:none; max-height:400px; overflow-y:auto; margin-right:20px; padding:0px">
                                <div style="font-size:18px; font-family:raleway; margin-bottom:10px">Assign Marks</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:10px; background-color:rgba(255,255,255,0.2)">

                                    <div style="font-family:raleway; font-size:20px; font-weight:bold; padding-left:0px; margin-bottom:10px; margin-top:10px">

                                        <select id='studentgradID' style='display:none'>
                                        </select>
                                        <select id='studentgradName' class='form-control' onchange='getstuID(this.selectedIndex)' style='margin-bottom:10px'>

                                        </select>
                                        <span class="btn btn-success" style="padding:5px; font-size:12px" onclick="assignGrades()">Select Student</span><br/>
                                        <table class='table table-condensed table-hover' style='margin-top:10px; font-family: verdana; font-size:12px'>
                                            <tr><td>1st Test</td><td><span style='margin-right:10px' id='getfirsttest'></span><input type='text' maxlength="2" style='width:40px;' id='setfirstTest'></td></tr>
                                            <tr><td>2nd Test</td><td><span style='margin-right:10px' id='getsecondtest'></span><input type='text' maxlength="2"  style='width:40px;' id='setsecondTest'></td></tr>
                                            <tr><td>Exam</td><td><span style='margin-right:10px' id='getexam'></span><input type='text' maxlength="3" style='width:40px;' id='setexam'></td></tr>
                                        </table>
                                        <span class="btn btn-success" style="padding:5px; font-size:12px" onclick="updateGrades()">Assign Grades</span><br/>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12" style="padding-left:0px; padding-right:0px">
                            <div style="font-family:raleway; font-size:16px; margin-top:10px; margin-bottom: 10px">
                                Grade sheet <span id="whatSubject"></span>
                            </div>
                            <div class="col-lg-12" style="min-height:240px; height:auto; margin-right:20px; background-color:rgba(255,255,255,0.2)">
                                <table class="table table-condensed table-striped table-hover" id="gradeRegister" style="margin-top:10px; font-size:13px; font-family:verdana">
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class='row' style='margin:0px; display:none' id="students">

                        <div class="modal fade bs-example-modal-sm" id="viewSattaches" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                            <div class="modal-dialog modal-sm" role="document" style='font-face:verdana; font-size:12px'>
                                <div class="modal-content">
                                    <div class="modal-header" style='background-color:#E8EEF4'>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h6><center><b>Attached Parents/Guardians<br/><span id='teachername' style="font-weight:normal"></span></b></center></h6>
                                    </div>
                                    <div class="modal-body" style='background-color: #EFF8EF' id="attachedStudents">
                                        <table class="table table-condensed table-striped" id="thelistsP" style="font-size:12px">

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade bs-example-modal-sm" id="updateStudent" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                            <div class="modal-dialog modal-sm" role="document" style='font-face:verdana; font-size:12px'>
                                <div class="modal-content">
                                    <div class="modal-header" style='background-color:#E8EEF4'>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h6><center><b>Update Student Information<br/><span id='teachername' style="font-weight:normal"></span></b></center></h6>
                                    </div>
                                    <div class="modal-body" style='background-color: #EFF8EF' id="attachedStudents">
                                        <i id="studentid" style="display: none"></i>
                                        <label>Surname</label>
                                        <input type="text" class="form-control" id="stdsurname">
                                        <label style="margin-top:20px">Firstname</label>
                                        <input type="text" class="form-control" id="stdfirstname">
                                        <label style="margin-top:20px">ClassID</label>
                                        <select class="form-control" id="stdclassid">
                                            <option>JSS1</option>
                                            <option>JSS2</option>
                                            <option>JSS3</option>
                                            <option>SSS1</option>
                                            <option>SSS2</option>
                                            <option>SSS3</option>
                                        </select>
                                        <label style="margin-top:20px">Home Address</label>
                                        <textarea class="form-control" id="stdaddress">
                                            
                                        </textarea>
                                        <label style="margin-top:20px">Email Address</label>
                                        <input type="text" class="form-control" style="margin-bottom:10px" id="stdemailaddress">
                                        <input type="button" class="btn btn-success" value="Update Information" onclick="updateStudent()">
                                        <div id="Updateresponse"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            <span id="studentcount">5</span> Students
                        </div>
                        <span style="background-color:rgba(0,0,0,0.4); color:#fff; padding:10px; cursor:pointer; position:relative" data-toggle="modal" data-target=".bs-example-modal-lg">

                            <i class="fa fa-envelope"></i> Group messaging</span><br><br>

                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color:#D0E0E8">
                                    <div style="padding:20px; padding-top:20px; margin-bottom:10px; border-radius:2px; background-color:rgba(255,255,255,0.2); position:relative" id="msgtab">
                                        <div style="font-family:raleway; font-size:20px; margin-bottom:20px">
                                            Group Messaging
                                        </div>
                                        <label style="margin-top:15px">Student group</label>
                                        <select class="form-control" id="GMclass">
                                            <option>Everyone</option>
                                            <option>JSS1</option>
                                            <option>JSS2</option>
                                            <option>JSS3</option>
                                            <option>SSS1</option>
                                            <option>SSS2</option>
                                            <option>SSS3</option>
                                        </select>
                                        <label style="margin-top:15px">Subject</label>
                                        <input  class="form-control"type="email" id="GMsubject">
                                        <label style="margin-top:15px">Message</label>
                                        <div id="GMmessage"></div>
                                        <span class="btn btn-primary" style="margin-top:10px" onclick="stdSendMail('students')"><i class="fa fa-envelope-o" style="margin-right:10px"></i>Send Mail</span>
                                        <div id="mailMessage" style="margin-top:10px"></div>
                                    </div>
                                    <div id="serverResponse" style="padding:10px; text-align:center"></div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px; margin-bottom:10px; position:relative">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-left:0px">

                                <div style="padding:20px; padding-top:20px; margin-bottom:20px; border-radius:2px; background-color:rgba(255,255,255,0.2)">
                                    <div style="font-family:raleway; font-size:20px; margin-bottom:20px">
                                        Add Student
                                    </div>
                                    <label>Student ID</label>
                                    <input class="form-control" type="text" placeholder="Identification" id="ASstudentid">
                                    <label style="margin-top:15px">Surname</label>
                                    <input class="form-control" type="text" placeholder="Student surname" id="ASsurname">
                                    <label style="margin-top:15px">Firstname</label>
                                    <input class="form-control" type="text" placeholder="Student Firstname" id="ASfirstname">
                                    <label style="margin-top:15px">Class</label>
                                    <select class="form-control" id="ASclass">
                                        <option>JSS1</option>
                                        <option>JSS2</option>
                                        <option>JSS3</option>
                                        <option>SSS1</option>
                                        <option>SSS2</option>
                                        <option>SSS3</option>
                                    </select>
                                    <label style="margin-top:15px">Email address</label>
                                    <input  class="form-control"type="email" placeholder="email" id="ASemail">
                                    <label style="margin-top:15px">Home Address</label>

                                    <textarea class="form-control" id="AShomeaddress"></textarea>
                                    <input type="button" class="btn btn-primary" value="GenerateID and save" style="margin-top:20px" onclick="ASsave()">
                                    <div id="returnedRez" style="margin-top:10px"></div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="padding:0px; text-align:right;">

                                <span style="padding:10px; background-color:#E3EDF2; border-radius:5px;">
                                    <i class="fa fa-search" style="margin:5px; padding:5px; color:#0093D9"></i>
                                    <input type="text" placeholder="Student name" id="studentsSearch" style="border:none;max-width: 200px; background-color:#E3EDF2; display:inline">
                                    <span style="padding:10px; background-color:#548DA9; color:#fff; cursor:pointer" onclick="getstudents('search')">Search</span>
                                    <span onclick="getstudentlist()" style="padding:10px; cursor:pointer" title="Refresh grid" class="fa fa-refresh"></span>
                                    <select style="max-width:200px; padding:5px; border:none" id="filterstdclass" onchange="getstudents('filter')">
                                        <option>Everyone</option>
                                        <option>JSS1</option>
                                        <option>JSS2</option>
                                        <option>JSS3</option>
                                        <option>SSS1</option>
                                        <option>SSS2</option>
                                        <option>SSS3</option>
                                    </select>
                                </span>
                                <div class="col-lg-12" style="min-height:200px; background-color:rgba(255,255,255,0.2); text-align:left; position:relative; margin-top:20px">
                                    <div style="font-family:raleway; font-size:20px; font-weight:bold; padding:20px; padding-left:0px; margin-bottom:20px">
                                        Students record
                                    </div>
                                    <div style="margin-bottom:50px">
                                        <div style="max-height:500px; overflow-y: auto">
                                            <table class="table table-condensed table-responsive table-striped" id="allstudentsinfo" style="font-size:14px; margin-top:10px">
                                                <tr style="font-weight:bold"><td>Student ID</td><td>Student Name</td><td>Class</td><td>Email Address</td><td>Links</td><td>Edit</td></tr>

                                            </table>
                                        </div>
                                    </div>

                                    <div style="position:absolute; bottom:10px">
                                        <div id="parentspaginate">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Modal form for list and emailing -->
                        <div class="modal fade bs-example-modal-sm" id="suggestion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                            <div class="modal-dialog modal-sm" role="document" style='font-face:verdana; font-size:12px'>
                                <div class="modal-content">
                                    <div class="modal-header" style='background-color:#E8EEF4'>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h6><center><b>Attached Students<br/><span id='teachername' style="font-weight:normal"></span></b></center></h6>
                                    </div>
                                    <div class="modal-body" style='background-color: #EFF8EF' id="attachedStudents">
                                        <table class="table table-condensed table-striped" id="thelist" style="font-size:12px">

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $("[data-toggle='popover']").popover();
                });

            </script>

            <script src="JS/adminJS.js" type="text/javascript"></script>
    </body>
</html>

