<?php
include 'PHP/databaseSQLconnectn.php';

session_start();
error_reporting(0);

$role = $_SESSION['Role'];
$teacherid = $_SESSION['TeacherID'];
if ($role === "Admin") {
    header('location:dashboard.php');
} elseif ($role === "Teacher") {
    
} elseif ($role === "Bursar") {
    header('location:schoolbursar.php');
}
?>
<html>
    <head>
        <script src="JS/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="JS/bootstrap.min.js" type="text/javascript"></script>
        <script src="JS/chart.js" type="text/javascript"></script>
        <link href="CSS/hcs.css" rel="stylesheet" type="text/css"/>
        <script src="JS/adminJS.js" type="text/javascript"></script>
        <script src="JS/putresults.js" type="text/javascript"></script>
        <title><?php echo $schoolname . ": " . $_SESSION['Name']; ?></title>
        <script>

            function proprietresscomment(session, term, stdid, comment) {
                //alert(d + " " + e);
                //alert("Proprietress comment triggered");
                var action = "proprietresscomment";
                $.post("PHP/comment.php", {action: action, session: session, term: term, studentid: stdid, comment: comment}).done(function (data) {
                    alert(data);
                });
            }
        </script>
        <style>
            body{
                margin:0px;
                background-color:#D0E0E8;
                font-family:verdana;
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
            .src{
                background-color:rgba(255,255,255,0.5);
                margin-right:5px;
                cursor:pointer;
                padding:4px;
                border-radius:4px;
                color:#88214A;
                font-size:12px
            }
            .src:hover{
                background-color:rgba(255,255,255,0.8);
                transition:0.5s;
            }
        </style>
        <link href="../CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/fa/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <script src="JS/summernote.min.js" type="text/javascript"></script>
        <link href="JS/summernote.css" rel="stylesheet" type="text/css"/>
    </head> 
    <body>
        <div class="clearfix">
            <div class="pull-left menuitems" style="z-index:2000;width:110px; background-color:#009CE8; min-height:100%; position:fixed; overflow-x: hidden; background-image: url('../images/background.jpg')">
                <img src='../images/schoollogo.png' width='80' style='position:absolute; top:10px; left:10px; z-index:50'>
                <div class="fa fa-university activemenu menustyling" id="hme" style="margin-top:80px" onclick="menuitems('#home', '#hme')">
                    <span class="dashmenu">Home</span>
                </div><br/>
                <div class="fa fa-newspaper-o menustyling" id="nwsltters" onclick="menuitems('#newsletters', '#nwsltters')">
                    <span class="dashmenu">Newsletter</span>
                </div><br/>
                <div class="fa fa-users menustyling" id="prnts"  onclick="menuitems('#parents', '#prnts')">
                    <span class="dashmenu">Assignments</span>
                </div><br/>
                <div class="fa fa-users menustyling" id="prntss"  onclick="menuitems('#resultsentry', '#prntss')">
                    <span class="dashmenu">Result Entry</span>
                </div><br/>
                <div class="fa fa-bar-chart menustyling" id="gs" onclick="menuitems('#gradesheet', '#gs')">
                    <span class="dashmenu">Score Graph</span>
                </div>
                <?php
                if ($_SESSION['ClassID'] !== "NCT") {
                    ?>
                    <div class="fa fa-slideshare menustyling" id="teachrs" onclick="menuitems('#teacherss', '#teachrs')">
                        <span class="dashmenu">Attendance</span>
                    </div><br/>
                    <!--
                    <div class="fa fa-pied-piper-alt menustyling" id="gs" onclick="menuitems('#gradesheet', '#gs')" style="display:none">
                        <span class="dashmenu">GradeSheet</span>
                    </div>-->
                    <?php
                }
                ?>
                <!--
                                <div class="fa fa-check menustyling" id="scre" onclick="menuitems('#scores', '#scre')">
                                    <span class="dashmenu">Results</span>
                                </div><br/>-->
                <div class="fa fa-database menustyling" id="Tsetting" onclick="menuitems('#grade', '#Tsetting')">
                    <span class="dashmenu">Result</span>
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
                    <span id="subMenu" class='pull-left'>

                    </span>
                    Welcome <?php echo " " . $_SESSION['Name']; ?>
                </div>
                <div style='margin:20px'>
                    <div class='row' style='margin:0px; background-color:#D0E0E8; min-height:600px' id="home">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Dashboard
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                            <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:20px">
                                Classes
                                <div id="classteachers" style='margin-top:10px'>
                                    <table style="font-family:verdana; width:100%; font-size:12px">
                                        <?php
                                        $ct = $_SESSION['TeacherID'];
                                        $d = mysqli_query($w, "select * from schclass where ClassTeacher='$ct' order by ClassName ASC");
                                        while ($a = mysqli_fetch_array($d)) {
                                            $fdf = $a['ClassName'];
                                            $classid = $a['SN'];
                                            $u = mysqli_query($w, "select * from schstudent where ClassID='$classid'");
                                            echo "<tr><td class='tcmnt' style='padding:5px'>" . $fdf . " [ " . mysqli_num_rows($u) . " students ]</td></tr>";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                            <!--
                            <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:20px">
                                Subject Teacher
                                <div id="subjectteachers">
                                    <table class="table table-responsive table-condensed table-hover" style="font-family:verdana; font-size:12px">
                            <?php
                            $ct = $_SESSION['TeacherID'];
                            $d = mysqli_query($w, "select * from subjects where TeacherID='$ct'");
                            while ($a = mysqli_fetch_array($d)) {
                                echo "<tr><td>" . $a['SubjectCategory'] . " - " . $a['SubjectName'] . "</td></tr>";
                            }
                            ?>
                                    </table>
                                </div>
                            </div>-->
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
                        <div class="col-lg-4" style='padding:0px'>
                            <div style="font-family:raleway; font-size:15px; font-weight:bold; border-bottom-style:solid; border-bottom-width:thin; border-color:#C1D7E1; padding:10px; padding-left:0px; margin-bottom:20px">
                                Sent Newsletters
                            </div>
                            <div style="background-color:rgba(255,255,255,0.2); min-height:50px; padding:10px;">
                                <table class="table table-condensed table-striped table-hover" style=" font-size:14px" id="sentNewsletters">

                                </table> 
                            </div>
                        </div>
                        <div class="col-lg-8" style='padding:0px'>
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

                        <div class="col-lg-8" style='padding:5px;'>
                            <!-- Send message -->
                            <div style="padding:10px;margin-bottom:20px; position:relative; border-radius:2px; background-color:rgba(255,255,255,0.2)">
                                <span id='assignmentstat' style='position:absolute; right:20px; top:10px; font-family:verdana; font-size:12px'></span>
                                <div style="font-family:raleway; font-size:20px; margin-bottom:20px">
                                    Issue Assignments
                                </div>
                                <label style="margin-top:15px">Student group</label>
                                <select class="form-control" id="assignClass">
                                    <?php
                                    $TID = $_SESSION['TeacherID'];
                                    $h = "select SN, ClassName from schclass where ClassTeacher='$TID'";
                                    $m = mysqli_query($w, $h);
                                    while ($j = mysqli_fetch_array($m)) {
                                        $sn = $j['SN'];
                                        $classname = $j['ClassName'];
                                        echo "<option value='$sn'>$classname</option>";
                                    }
                                    ?>
                                </select>
                                <label style="margin-top:15px">Assignment</label>
                                <textarea id="assignmentProp" class='form-control' rows='5' style='resize: none'></textarea>
                                <span class="btn btn-primary" style="margin-top:10px" onclick="issueAssignments()"><i class="fa fa-envelope-o" style="margin-right:10px"></i>Send Assignments</span>
                                <div id="PmailMessage" style="margin-top:10px"></div>
                            </div>
                        </div>
                        <div class="col-lg-4" style='padding:0px'>
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
                            <div class="modal-dialog modal-sm" role="document" style='font-family:verdana; font-size:12px'>
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
                            <script>
                                function savecollegeresult(subjectid, classid, session, term, stdid, score, cattype, teacherid, maxscore) {
                                    document.getElementById("resultsave").innerHTML = "Saving..";
                                    if (score > maxscore) {
                                        document.getElementById("resultsave").innerHTML = "<span style='color:red; font-weight:700'>Score cannot be greater than maximum score</span>";
                                        return;
                                    }
                                    //savecollegeresult('$subjectid','$classid','$session','$term','$stdid','this.value','$catype')
                                    //alert("Score " + score + " Subjectid -" + subjectid + " Classid - " + classid + " Session " + session + " Term " + term + " StudentID -" + stdid + " Cat type - " + cattype + " TeacherID -" + teacherid);
                                    $.post("PHP/collegeassistscripts.php", {action: 'saveresult', subjectid: subjectid, classid: classid, session: session, term: term, stdid: stdid, score: score, cattype: cattype, teacherid: teacherid}).done(function (data) {
                                        document.getElementById("resultsave").innerHTML = data;
                                    });
                                }
                            </script>
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
                    <div class='row' style='margin:0px; display:none' id="resultsentry">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Log results
                        </div>

                        <div class="col-lg-4" style='padding:5px;'>
                            <!-- Send message -->
                            <div style="padding:10px;margin-bottom:20px; position:relative; border-radius:2px; background-color:rgba(255,255,255,0.2)">
                                <span id='assignmentstat' style='position:absolute; right:20px; top:10px; font-family:verdana; font-size:12px'></span>
                                <label style="margin-top:15px">Result type</label>
                                <select id='subjectrestyped' class='form-control'>
                                    <option>Mid-term</option>
                                    <option>Full-term</option>
                                </select>
                                <label style="margin-top:15px">Class</label>
                                <script>
                                    function loadassignedsubject(a) {
                                        $.post("PHP/collegeassistscripts.php", {action: 'loadassigned', classid: a}).done(function (data) {
                                            //alert(data);
                                            document.getElementById("assignedSubject").innerHTML = data;
                                        });
                                    }
                                </script>
                                <select class="form-control" id="assignedClass" onchange='loadassignedsubject(this.value)'>
                                    <option>--Select--</option>
                                    <?php
                                    $TID = $_SESSION['TeacherID'];
                                    $h = "select SN, ClassName from schclass";
                                    $m = mysqli_query($w, $h);
                                    while ($j = mysqli_fetch_array($m)) {
                                        $sn = $j['SN'];
                                        $classname = $j['ClassName'];
                                        echo "<option value='$sn'>$classname</option>";
                                    }
                                    ?>
                                </select>
                                <label style='margin-top:15px'>Assigned Subject</label>
                                <select class="form-control" id="assignedSubject">

                                </select>
                                <label style='margin-top:15px'>Session</label>
                                <select class="form-control" id="subjectentrysession">
                                    <?php
                                    $year = date("Y") + 1;
                                    $yearlast = $year - 1;
                                    $a = 5;
                                    $d = 1;
                                    while ($a > 1) {
                                        echo "<option>$yearlast/$year</option>";
                                        $year = $year - $d;
                                        $yearlast = $year - 1;
                                        $a--;
                                        //$d++;
                                    }
                                    ?>
                                </select>
                                <label style='margin-top:15px'>Term</label>
                                <select class="form-control" id="subjectentryterm">
                                    <option>1st Term</option>
                                    <option>2nd Term</option>
                                    <option>3rd Term</option>
                                </select>
                                <input type='button' value='Log Entry' class='btn btn-success' style='margin-top:15px' onclick='searchlogresults()'>
                                <script>
                                    function searchlogresults() {
                                        var assclass = document.getElementById("assignedClass").value;
                                        var asssubject = document.getElementById("assignedSubject").value;
                                        var asssession = document.getElementById("subjectentrysession").value;
                                        var assterm = document.getElementById("subjectentryterm").value;
                                        var subjectrestype = document.getElementById("subjectrestyped").value;

if (asssubject === ""){
                                            document.getElementById("subspanel").innerHTML = "No subject selected";
    return;
}
                                        //alert(assclass + " " + asssubject + " " + asssession + " " + assterm);
                                        $.post("PHP/collegeassistscripts.php", {action: 'loadstudentspersubject', subjectrestype: subjectrestype, classid: assclass, subject: asssubject, session: asssession, term: assterm}).done(function (data) {
                                            document.getElementById("subspanel").innerHTML = data;
                                        });
                                    }
                                </script>
                                <div id="PmailMessage" style="margin-top:10px"></div>
                            </div>
                        </div>
                        <div class="col-lg-8" style='padding:0px'>
                            <!-- Send message -->
                            <div id='resultsave'></div>
                            <div style="font-family:raleway; font-size:20px; margin-bottom:10px; background-color:rgba(255,255,255,0.2)">

                            </div>
                            <div style="padding:5px; padding-top:20px; margin-bottom:20px; border-radius:2px; background-color:rgba(255,255,255,0.2)">
                                <div id='subspanel' style='margin-bottom:20px; font-size:20px'>

                                </div>
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
                        <div class='row' style='margin:0px; display: none' id="teacherss">
                            <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                                Attendance
                            </div>
                            <div class='row' style='padding-left:15px'>
                                <div class="col-lg-3" style="min-height:240px; height:auto; padding:5px">
                                    <div style="background-color:rgba(255,255,255,0.2); padding:10px">
                                        <label>Class</label>
                                        <select type='text' style="margin-bottom:10px" class='form-control' id="attclassid" onchange='respgc(this.value, "attnames")'>
                                            <option>--Select Class--</option>
                                            <?php
                                            $IDfT = $_SESSION['TeacherID'];
                                            $gg = mysqli_query($w, "select * from schclass where ClassTeacher='$IDfT'");
                                            while ($g = mysqli_fetch_array($gg)) {
                                                $cid = $g['SN'];
                                                echo "<option value='$cid'>" . $g['ClassName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <label>Name</label>
                                        <select class="form-control" style="margin-bottom:10px" id="attnames">

                                        </select>
                                        <label>Session</label>
                                        <select class="form-control" id="attsess" style='margin-bottom:10px'>
                                            <?php
                                            $year = date("Y") + 1;
                                            $yearlast = $year - 1;
                                            $a = 5;
                                            $d = 1;
                                            while ($a > 1) {
                                                echo "<option>$yearlast/$year</option>";
                                                $year = $year - $d;
                                                $yearlast = $year - 1;
                                                $a--;
                                                //$d++;
                                            }
                                            ?>
                                        </select>
                                        <label>Term</label>
                                        <select class="form-control" id="attterm" style="margin-bottom:10px">
                                            <option>1st Term</option>
                                            <option>2nd Term</option>
                                            <option>3rd Term</option>
                                        </select>
                                        <label>Days enrolled</label>
                                        <input type='text' class='form-control' id="attdaysenrolled">
                                        <label>Days absent</label>
                                        <input type='text' class='form-control' id="attdaysabsent" onblur='calcdaysprese(attdaysenrolled.value, this.value)'>
                                        <label>Days present</label>
                                        <input type='text' class='form-control' style="margin-bottom:10px" id="attdayspresent" onblur='calcdaysabs(attdaysenrolled.value, this.value)'>
                                        <input type="button" class="btn btn-success" value="Save attendance" style="width:100%" onclick="markattendance()"><div id='attserver'></div>
                                    </div>
                                </div>
                                <Script>
                                    function calcdaysprese(e, ab) {
                                        document.getElementById("attdayspresent").value = e - ab;
                                    }
                                    function calcdaysabs(e, ab) {
                                        document.getElementById("attdaysabsent").value = e - ab;
                                    }
                                </script>
                                <div class="col-lg-9" style="overflow-y:auto; padding:5px; font-family:raleway">
                                    <div style="background-color:rgba(255,255,255,0.4); border-radius:4px; padding:5px">
                                        <table style="width:100%; margin-bottom:10px">
                                            <tr style="text-align:center; background-color:rgba(0,0,0,0.2); border-radius:4px; padding:10px">
                                                <td>
                                                    <select type='text' style="margin-bottom:10px; display:inline-block; width:200px" class='form-control' id="pullattclass">
                                                        <?php
                                                        $IDfT = $_SESSION['TeacherID'];
                                                        $gg = mysqli_query($w, "select * from schclass where ClassTeacher='$IDfT'");
                                                        while ($g = mysqli_fetch_array($gg)) {
                                                            $sn = $g['SN'];
                                                            echo "<option value='$sn'>" . $g['ClassName'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <select class="form-control" id="pullattsession" style='margin-bottom:10px; display:inline-block; width:200px'>
                                                        <?php
                                                        $year = date("Y") + 1;
                                                        $yearlast = $year - 1;
                                                        $a = 5;
                                                        $d = 1;
                                                        while ($a > 1) {
                                                            echo "<option>$yearlast/$year</option>";
                                                            $year = $year - $d;
                                                            $yearlast = $year - 1;
                                                            $a--;
                                                            //$d++;
                                                        }
                                                        ?>
                                                    </select>
                                                    <input type="button" value="Pull attendance" class="btn btn-success" style=" width:150px" onclick='pullattendance()'>
                                                </td>
                                            </tr>
                                        </table>
                                        <table class="table table-condensed table-bordered">
                                            <tr style="font-size:14px; font-weight:500"><td></td><td>Name</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td></tr>
                                            <tbody id='attdisplay'>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='row' style='margin:0px; display: none' id="gradesheet">
                            <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                                Class/Score Graph processor
                            </div>
                            <script>
                                function selectgraphtype(a) {
                                    $("#classgraph").hide();
                                    $("#subjectgraph").hide();
                                    if (a === "Class Graph") {
                                        $("#classgraph").show();
                                    }

                                    if (a === "Subject Graph") {
                                        $("#subjectgraph").show();
                                    }
                                }
                            </script>
                            <div class='row' style='padding-left:15px'>
                                <div class="col-lg-3" style="min-height:240px; height:auto; padding:20px; margin-right:0px; background-color:rgba(255,255,255,0.2)">
                                    <label>
                                        Graph type
                                    </label>
                                    <select style='margin-bottom:10px' class='form-control' onchange="selectgraphtype(this.value)">
                                        <option>--Select--</option>
                                        <option>Class Graph</option>
                                        <option>Subject Graph</option>
                                    </select>
                                    <div id='subjectgraph' style='display:none'>
                                        <label>Class</label>
                                        <select type='text' style="margin-bottom:10px" id="resclassidbgt" class='form-control' onchange="loadClassGrade(this.value)">
                                            <option>--Select Class--</option>
                                            <?php
                                            $IDfT = $_SESSION['TeacherID'];
                                            $gg = mysqli_query($w, "select * from schclass where ClassTeacher='$IDfT'");
                                            while ($g = mysqli_fetch_array($gg)) {
                                                $sn = $g['SN'];
                                                echo "<option value='$sn'>" . $g['ClassName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <label>
                                            Subject
                                        </label>
                                        <select id='subjecttographbgt' class='form-control' style='margin-bottom:10px'>
                                            <option>--Select subject--</option>
                                        </select>
                                        <label>Session</label>
                                        <select class='form-control' style='margin-bottom:10px' id='sessionbgt'>
                                            <?php
                                            $year = date("Y") + 1;
                                            $yearlast = $year - 1;
                                            $a = 5;
                                            $d = 1;
                                            while ($a > 1) {
                                                echo "<option>$yearlast/$year</option>";
                                                $year = $year - $d;
                                                $yearlast = $year - 1;
                                                $a--;
                                                //$d++;
                                            }
                                            ?>
                                        </select>
                                        <label>Term</label>
                                        <select class='form-control' style='margin-bottom:10px' id='termbgt'>
                                            <option>1st Term</option>
                                            <option>2nd Term</option>
                                            <option>3rd Term</option>
                                        </select>
                                        <input type='button' class='btn btn-warning' onclick="preparegraphrecord('subject')" value='Prepare/Re-prepare graph records' style='width:100%; margin-bottom:5px'>
                                        <input type='button' class='btn btn-primary' onclick="getgraph('subject')" value='Get Subject Graph' style='width:100%'>
                                    </div>
                                    <script>
                                        function getgraph(a) {
                                            if (a === "subject") {
                                                var classid = document.getElementById("resclassidbgt").value;
                                                var subjectid = document.getElementById("subjecttographbgt").value;
                                                var session = document.getElementById("sessionbgt").value;
                                                var termz = document.getElementById("termbgt").value;
                                                var term = encodeURI(termz);
                                                var stringadd = "action=getgraph&classid=" + classid + "&subjectid=" + subjectid + "&session=" + session + "";
                                                var addstringadd = stringadd + "&termz=" + term;
                                                //alert(addstringadd);
                                                $("#graphhere").load("chart.php?" + addstringadd);
                                            }
                                            if (a === "class") {
                                                //alert("data will get graph for class");
                                                var classid = document.getElementById("classgradeclass").value;
                                                var session = document.getElementById("classgradesession").value;
                                                var termz = document.getElementById("classgradeterm").value;
                                                var term = encodeURI(termz);
                                                var stringadd = "action=getgraphclass&classid=" + classid + "&session=" + session + "";
                                                var addstringadd = stringadd + "&termz=" + term;
                                                //alert(addstringadd);
                                                $("#graphhere").load("chart.php?" + addstringadd);
                                            }
                                        }

                                        function preparegraphrecord(a) {
                                            if (a === "subject") {
                                                var classid = document.getElementById("resclassidbgt").value;
                                                var subjectid = document.getElementById("subjecttographbgt").value;
                                                var session = document.getElementById("sessionbgt").value;
                                                var termz = document.getElementById("termbgt").value;
                                                var term = encodeURI(termz);
                                                var stringadd = "action=preparerecord&classid=" + classid + "&subjectid=" + subjectid + "&session=" + session + "";

                                                var addstringadd = stringadd + "&termz=" + term;
                                                //alert(addstringadd);
                                                $("#graphhere").load("chart.php?" + addstringadd);
                                            }
                                            if (a === "class") {
                                                alert("This will prepare class");
                                                var classid = document.getElementById("classgradeclass").value;
                                                var session = document.getElementById("classgradesession").value;
                                                var termz = document.getElementById("classgradeterm").value;
                                                var term = encodeURI(termz);
                                                var stringadd = "action=preparerecordclass&classid=" + classid + "&subjectid=" + subjectid + "&session=" + session + "";
                                                var addstringadd = stringadd + "&termz=" + term;
                                                $("#graphhere").load("chart.php?" + addstringadd);
                                            }
                                        }

                                        function printDiv(divName) {
                                            var printContents = document.getElementById(divName).innerHTML;
                                            var originalContents = document.body.innerHTML;
                                            document.body.innerHTML = printContents;
                                            window.print();
                                            document.body.innerHTML = originalContents;
                                        }
                                    </script>
                                    <div id='classgraph' style='display:none'>
                                        <label>Class</label>
                                        <select type='text' style="margin-bottom:10px" id="classgradeclass" class='form-control' onchange="loadClassGrade(this.value)">
                                            <option>--Select class--</option>r
                                            <?php
                                            $IDfT = $_SESSION['TeacherID'];
                                            $gg = mysqli_query($w, "select * from schclass where ClassTeacher='$IDfT'");
                                            while ($g = mysqli_fetch_array($gg)) {
                                                $sn = $g['SN'];
                                                echo "<option value='$sn'>" . $g['ClassName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <label>Session</label>
                                        <select class='form-control' style='margin-bottom:10px' id='classgradesession'>
                                            <?php
                                            $year = date("Y") + 1;
                                            $yearlast = $year - 1;
                                            $a = 5;
                                            $d = 1;
                                            while ($a > 1) {
                                                echo "<option>$yearlast/$year</option>";
                                                $year = $year - $d;
                                                $yearlast = $year - 1;
                                                $a--;
                                                //$d++;
                                            }
                                            ?>
                                        </select>
                                        <label>Term</label>
                                        <select class='form-control' style='margin-bottom:10px' id='classgradeterm'>
                                            <option>1st Term</option>
                                            <option>2nd Term</option>
                                            <option>3rd Term</option>
                                        </select>
                                        <input type='button' class='btn btn-warning' onclick="preparegraphrecord('class')" value='Prepare/Re-prepare Class records' style='width:100%; margin-bottom:5px'>
                                        <input type='button' class='btn btn-primary' onclick="getgraph('class')" value='Get Class Graph' style='width:100%'>
                                    </div>
                                    <table class="table table-condensed table-responsive" id="loadClassMembers" style="font-size:13px; font-family:verdana">

                                    </table>
                                </div>
                                <div class="col-lg-9" style="background-color: rgba(255,255,255,0.5); padding:10px; min-height:200px">
                                    <div id='graphtitlehere'>
                                        <div style='text-align:left; text-align:center'>
                                            <span style='cursor:pointer; padding:5px;' class='btn btn-danger' onClick="printDiv('printgraph')"><i class='fa fa-book'></i> - Print report</span>
                                        </div>
                                    </div>
                                    <div id='printgraph'>
                                        <div id='graphhere'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?> 
                    <div class='row' style='margin:0px; display: none' id="scores">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Results
                        </div>
                        <div class='row' style='padding-left:15px'>
                            <div class="col-lg-3" style="min-height:240px; height:auto; padding:10px; padding-top:0px; background-color:rgba(255,255,255,0.2)">
                                <div style="text-align:center; padding:5px; background-color:rgba(0,0,0,0.3); margin-bottom:10px">
                                    <span class="src" onclick="reztype('bysubj', 'rezbysubj')">By Subject</span>
                                    <span class="src" onclick="reztype('bystud', 'rezbystud')">By Student</span>
                                </div>
                                <div id="rezbysubj">
                                    <script>
                                        function reztype(a, b) {
                                            $("#resultpanepersubject").hide();
                                            $("#resultpaneperstudent").hide();
                                            //
                                            $("#rezbysubj").hide();
                                            $("#rezbystud").hide();

                                            if (a === "bysubj") {
                                                $("#resultpanepersubject").show();
                                                $("#rezbysubj").show();
                                            }
                                            if (a === "bystud") {
                                                $("#resultpaneperstudent").show();
                                                $("#rezbystud").show();
                                            }
                                        }
                                    </script>
                                    <span style="display:nones">
                                        <label>Class</label>
                                        <select class="form-control" id="subjectTaughtwClassSN" style='margin-bottom:10px' onchange="pullclasssubjects(this.value)">
                                            <option>--Select Class--</option>
                                            <?php
                                            $k = "select SN, ClassName from schclass where ClassTeacher='$teacherid'";
                                            $j = mysqli_query($w, $k);
                                            while ($qa = mysqli_fetch_array($j)) {
                                                $classname = $qa['ClassName'];
                                                $sn = $qa['SN'];
                                                echo "<option value='$sn'>$classname</option>";
                                            }
                                            ?>
                                        </select>
                                    </span>
                                    <script>
                                        function pullclasssubjects(a) {
                                            var classid = a;
                                            if (classid === "3") {
                                                $("#catshowhide").hide();
                                                $("#rezpgscore").show();
                                                $("#rezgdscore").hide();
                                            } else {
                                                $("#catshowhide").show();
                                                $("#rezpgscore").hide();
                                                $("#rezgdscore").show();
                                            }
                                            $.post("PHP/pullsubjects.php", {classid: classid}).done(function (data) {
                                                document.getElementById("subjectTaughtwClass").innerHTML = data;
                                            });
                                            getstdsinclass(classid);
                                        }

                                        function getstdsinclass(classid) {
                                            //alert(classid);
                                            $.post("PHP/getstudentsinclass.php", {classid: classid}).done(function (data) {
                                                //alert(data);
                                                document.getElementById("resStdname").innerHTML = data;
                                            });
                                        }
                                    </script>
                                    <label>Subject</label>
                                    <select class="form-control" id="subjectTaughtwClass" style='margin-bottom:10px'>
                                        <?php
                                        $TID = $_SESSION['TeacherID'];
                                        //echo $TID;
                                        $f = mysqli_query($w, "Select * from subjects where TeacherID='$TID'");
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
                                    <select id="scTerm" class="form-control" style='margin-bottom:10px'>
                                        <option>1st Term</option>
                                        <option>2nd Term</option>
                                        <option>3rd Term</option>
                                    </select>
                                    <label>Session</label>
                                    <select class="form-control" id="scSess" style='margin-bottom:10px'>
                                        <?php
                                        $year = date("Y") + 1;
                                        $yearlast = $year - 1;
                                        $a = 5;
                                        $d = 1;
                                        while ($a > 1) {
                                            echo "<option>$yearlast/$year</option>";
                                            $year = $year - $d;
                                            $yearlast = $year - 1;
                                            $a--;
                                            //$d++;
                                        }
                                        ?>
                                    </select>
                                    <span id="catshowhide" style="display:none">
                                        <label>
                                            Category
                                        </label>
                                        <select class="form-control" id="cat5" onchange="chch()" style="margin-bottom:10px">
                                            <option>First Test</option>
                                            <option>Second Test</option>
                                            <option>Exam</option>
                                        </select>
                                    </span>
                                    <label>
                                        Student Name
                                    </label>
                                    <select class="form-control" id="resStdname" style="margin-bottom:10px">
                                    </select>
                                    <span id="rezpgscore" style="display:none">
                                        <label>
                                            Play group score
                                        </label>
                                        <select class="form-control" id="plyresopts">

                                        </select>
                                    </span>
                                    <span id="rezgdscore" style="display:none">
                                        <label>
                                            Score
                                        </label>
                                        <input type="text" class="form-control" id="grdresopts">
                                    </span>
                                    <div style="margin-top:30px">
                                        <input type="button" class="btn btn-success" value="Save score" onclick="savescore()">
                                    </div>
                                </div>
                                <div style="display:none" id="rezbystud">
                                    <label>Session</label>
                                    <select class="form-control" id="rbssession" style='margin-bottom:10px'>
                                        <?php
                                        $year = date("Y") + 1;
                                        $yearlast = $year - 1;
                                        $a = 5;
                                        $d = 1;
                                        while ($a > 1) {
                                            echo "<option>$yearlast/$year</option>";
                                            $year = $year - $d;
                                            $yearlast = $year - 1;
                                            $a--;
                                            //$d++;
                                        }
                                        ?>
                                    </select>
                                    <label>Term</label>
                                    <select id="rbsterm" class="form-control" style='margin-bottom:10px'>
                                        <option>1st Term</option>
                                        <option>2nd Term</option>
                                        <option>3rd Term</option>
                                    </select>
                                    <label>Class</label>
                                    <select id="rbsclass" class="form-control" style="margin-bottom:10px" onchange="getstds(this.value)">
                                        <option>--Select--</option>
                                        <?php
                                        $k = "select SN, ClassName from schclass where ClassTeacher='$teacherid'";
                                        $j = mysqli_query($w, $k);
                                        while ($qa = mysqli_fetch_array($j)) {
                                            $classname = $qa['ClassName'];
                                            $sn = $qa['SN'];
                                            echo "<option value='$sn'>$classname</option>";
                                        }
                                        ?>
                                    </select>
                                    <script>
                                        function getstds(a) {
                                            var classid = a;
                                            var searchKind = "getstds";
                                            $.post("PHP/getSubjects.php", {searchKind: searchKind, classid: classid}).done(function (data) {
                                                document.getElementById("rbsstdname").innerHTML = data;
                                            });
                                        }
                                    </script>
                                    <label>
                                        Student Name
                                    </label>
                                    <select class="form-control" id="rbsstdname" style="margin-bottom:10px">
                                    </select>
                                    <input type="button" value="Log Results" class="btn btn-success" onclick="logresults(rbsstdname.value, rbsterm.value, rbssession.value)">
                                </div>
                            </div>
                            <script>
                                function logresults(stdid, stdterm, stdsession) {
                                    var searchKind = "putresult";
                                    $.post("PHP/getSubjects.php", {searchKind: searchKind, stdid: stdid, term: stdterm, session: stdsession}).done(function (data) {
                                        document.getElementById("resultdisplaystudent").innerHTML = data;
                                    });
                                }
                            </script>
                            <div class="col-lg-9" style="min-height:310px; padding:5px; max-height:600px; overflow-y:auto; ">
                                <div style="background-color:rgba(255,255,255,0.2)" id='resultpanepersubject'>
                                    <div style="padding:5px; text-align:right; margin-top:5px">
                                        <span style="cursor:pointer; padding:5px; background-color:rgba(0,0,0,0.5); color:#ccc; border-radius:4px" onclick="getResultss()">Get result - By subject</span>
                                    </div>
                                    <div id="resultdisplay" style="background-color:rgba(255,255,255,0.5); padding:5px">

                                    </div>
                                </div>
                                <div style="background-color:rgba(255,255,255,0.2); display:none"  id='resultpaneperstudent'>
                                    <div style="padding:5px; text-align:right; margin-top:5px">
                                        <span style="cursor:pointer; padding:5px; background-color:rgba(0,0,0,0.5); color:#ccc; border-radius:4px" onclick="getResultss()">Get result - By student</span>
                                    </div>
                                    <div style="background-color:rgba(255,255,255,0.5); padding:5px" id="resultdisplaystudent">

                                    </div>
                                </div>
                            </div>
                            <script>
                                function getResultss() {
                                    var classid = document.getElementById("subjectTaughtwClassSN").value;
                                    var subject = document.getElementById("subjectTaughtwClass").value;
                                    var term = document.getElementById("scTerm").value;
                                    var session = document.getElementById("scSess").value;
                                    var action = "bysubject";
                                    $.post("PHP/getresult.php", {action: action, classid: classid, subjectid: subject, term: term, session: session}).done(function (data) {
                                        document.getElementById("resultdisplay").innerHTML = data;
                                    });
                                }
                            </script>
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
                    </div>
                    <div class='row' style='margin:0px; display:none' id="grade">
                        <div id='jsmenupage'>
                            <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                                JSS
                                <div class='col-md-12' style='padding:0px; font-size:12px'>
                                    <div class='col-md-4' style='background-color:rgba(255,255,255,0.1); padding:10px'>
                                        <label>Result type</label>
                                        <select class="form-control" style='margin-bottom:10px' id='resjsrt' onchange='selectdtype(this.value)'>
                                            <option>--Select--</option>
                                            <option value='midterm'>Mid-Term Result</option>
                                            <option value='terminal'>Terminal Result</option>
                                        </select>
                                        <label>Class</label>
                                        <select class='form-control' style='margin-bottom:10px' onchange='resgradec(this.value, "resjssn")' id='resjsc'>
                                            <option>--Select--</option>
                                            <?php
                                            $j = mysqli_query($w, "select * from schclass where schooltype='5' and ClassTeacher='$IDfT' order by ClassName asc");
                                            while ($qw = mysqli_fetch_array($j)) {
                                                $classname = $qw['ClassName'];
                                                $sn = $qw['SN'];
                                                echo "<option value='$sn'>$classname</option>";
                                            }
                                            ?>
                                        </select>
                                        <label>Student Name</label>
                                        <select class='form-control' style='margin-bottom:10px' id='resjssn'>
                                            <option>--Select Student name--</option>
                                        </select>
                                        <span class='col-md-6' style='padding:0px'>
                                            <label>Session</label>
                                            <select class='form-control' id='resjss'>
                                                <?php
                                                $year = date("Y") + 1;
                                                $yearlast = $year - 1;
                                                $a = 5;
                                                $d = 1;
                                                while ($a > 1) {
                                                    echo "<option>$yearlast/$year</option>";
                                                    $year = $year - $d;
                                                    $yearlast = $year - 1;
                                                    $a--;
                                                }
                                                ?>
                                            </select>
                                        </span>
                                        <span class='col-md-6' style='padding:0px'>
                                            <label>Term</label>
                                            <select id="resjst" class="form-control" style='margin-bottom:10px'>
                                                <option>1st Term</option>
                                                <option>2nd Term</option>
                                                <option>3rd Term</option>
                                            </select>
                                        </span>
                                        <input type='button' value='Put result' style='margin-top:10px' class='btn btn-success' onclick='putresjss()'>
                                    </div>
                                    <script>
                                        function selectdtype(a) {
                                            //alert(a);
                                            if (a === "midterm") {
                                                //$('#nurtattendance').hide();
                                                document.getElementById("gradeleveltype").innerHTML = "MID-TERM REPORT";
                                            } else {
                                                //$('#nurtattendance').show();
                                                document.getElementById("gradeleveltype").innerHTML = "TERMINAL/YEARLY REPORT";
                                            }
                                        }
                                    </script>
                                    <div class='col-md-8' style='background-color:rgba(255,255,255,0.1); padding:5px; text-align:center'>
                                        <center>
                                            <table style='background-color:#fff; padding:0px; font-size:12px; min-width:800px' border="1">
                                                <thead>
                                                    <tr>
                                                        <td style='text-align:center;position:relative; padding:10px'><span style='font-weight:bold; font-size:28px'><img src='../images/schoollogo.png' style='position:absolute; left:5px; top:10px; width:100px; font-size:45px'>HAVARD HIGH SCHOOL</span><br><div>Great Learning, Great Fun!</div>
                                                            <div>Plot 10/12 Taiwo Ogun street, KM 32 Along Lagos-Ibadan Express Way, Arepo, Ogun State.</div>
                                                            <div>Tel: 0803 569 6773, 0809 601 1244, E-mail: info@havardcs.com, Website: www.havardcs.com</div>
                                                            <div style='text-align: center; margin-top:20px; font-weight:600; font-size:16px' id='gradeleveltype'>TERMINAL/YEARLY REPORT</div>
                                                            <div style='text-align: center; margin-top:20px; font-weight:800; font-size:16px'>Junior Secondary School Report Sheet</div>
                                                            <span style='position:absolute; right:10px; top:10px; display:inline-block; border-style:solid; width:130px; height:130px' id='jssschlphoto'></span>
                                                            <table border='1' style='width:100%; font-size:12px; margin-top:10px'>
                                                                <tr>
                                                                    <td class='pad2'>I.D Number : <span id='idnumberntjs'style='font-weight:bold'></span></td><td colspan='2' class='pad2'>Student's Name : <span id='stdnamentjs' style='font-weight:bold'></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class='pad2'>Term : <span id='termntjs' style='font-weight:bold'></span></td><td class='pad2'>No. in a Class : <span id='classnumntjs' style='font-weight:bold'></span></td><td class='pad2'>Class Name : <span id='classnamentjs' style='font-weight:bold'></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class='pad2'>Academic Year : <span id='acayearntjs'style='font-weight:bold'></span></td><td colspan="2" class='pad2'>Teacher's name : <span id='teachnamentjs' style='font-weight:bold'></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" class='pad2'>Proprietress name : <span id='propnamentjs' style='font-weight:bold'></span></td><td class='pad2'>Class Arm : <span id='classarmjs'></span></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table style='font-size:11px; margin-top:10px; font-weight: 500; width:100%'>
                                                                <tr style='padding:10px'>
                                                                    <td style='width:50%; padding:10px'>
                                                                        <b style='font-size:20px'>ATTENDANCE</b>
                                                                        <table style='margin-top:10px; width:100%; font-size:12px; text-align:center' border='1'>
                                                                            <tr><td></td><td style='font-weight:bold'>1st Term</td><td style='font-weight:bold'>2nd Term</td><td style='font-weight:bold'>3rd Term</td></tr>
                                                                            <tbody id='attTablejss'>
                                                                                <tr><td>Days Enrolled</td><td>120</td><td></td><td></td></tr>
                                                                                <tr><td>Days Absent</td><td>118</td><td>0</td><td>0</td></tr>
                                                                                <tr><td>Days Present</td><td>118</td><td>0</td><td>0</td></tr>
                                                                            </tbody>

                                                                        </table>
                                                                    </td>
                                                                    <td style='text-align:center; padding:10px'>
                                                                <center>
                                                                    <table style='margin-top:10px; width:100%; font-size:12px; text-align:center' border='2'>
                                                                        <tr><td></td><td style='padding:2px'>TERM SCORE</td><td style='padding:2px'>CUMM. AVERAGE</td></tr>
                                                                        <tbody id='cdcdd'>

                                                                        </tbody>
                                                                    </table>
                                                                </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan='2' style='text-align:center; padding:10px'  id='dashjsscard'>
                                                        </td>
                                                    </tr>
                                            </table>
                                            </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                            </tr>
                                            </thead>

                                            </table>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id='ssmenupage' style='display:none'>
                            <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                                SSS
                                <div class='col-md-12' style='padding:0px; font-size:12px'>
                                    <div class='col-md-4' style='background-color:rgba(255,255,255,0.1); padding:10px'>
                                        <label>Result type</label>
                                        <select class="form-control" style='margin-bottom:10px' id='resssrt' onchange='selectdtype(this.value)'>
                                            <option>--Select--</option>
                                            <option value='midterm'>Mid-Term Result</option>
                                            <option value='terminal'>Terminal Result</option>
                                        </select>
                                        <?php
                                        $TID = $_SESSION['TeacherID'];
                                        ?>
                                        <label>Class</label>
                                        <select class='form-control' style='margin-bottom:10px' onchange='resgradec(this.value, "ressssn")' id='resssc'>
                                            <option>--Select--</option>
<?php
$TID = $_SESSION['TeacherID'];
$j = mysqli_query($w, "select * from schclass where schooltype='6' and ClassTeacher='$TID' order by ClassName asc");
while ($qw = mysqli_fetch_array($j)) {
    $classname = $qw['ClassName'];
    $sn = $qw['SN'];
    echo "<option value='$sn'>$classname</option>";
}
?>
                                        </select>
                                        <label>Student Name</label>
                                        <select class='form-control' style='margin-bottom:10px' id='ressssn'>
                                            <option>--Select Student name--</option>
                                        </select>
                                        <span class='col-md-6' style='padding:0px'>
                                            <label>Session</label>
                                            <select class='form-control' id='ressss'>
<?php
$year = date("Y") + 1;
$yearlast = $year - 1;
$a = 5;
$d = 1;
while ($a > 1) {
    echo "<option>$yearlast/$year</option>";
    $year = $year - $d;
    $yearlast = $year - 1;
    $a--;
}
?>
                                            </select>
                                        </span>
                                        <span class='col-md-6' style='padding:0px'>
                                            <label>Term</label>
                                            <select id="ressst" class="form-control" style='margin-bottom:10px'>
                                                <option>1st Term</option>
                                                <option>2nd Term</option>
                                                <option>3rd Term</option>
                                            </select>
                                        </span>
                                        <input type='button' value='Put result' style='margin-top:10px' class='btn btn-success' onclick='putressss()'>
                                    </div>
                                    <script>
                                        function selectdtype(a) {
                                            //alert(a);
                                            if (a === "midterm") {
                                                //$('#nurtattendance').hide();
                                                document.getElementById("gradeleveltype").innerHTML = "MID-TERM REPORT";
                                            } else {
                                                //$('#nurtattendance').show();
                                                document.getElementById("gradeleveltype").innerHTML = "TERMINAL/YEARLY REPORT";
                                            }
                                        }

                                        function updateofferedstat(stdid, subjid, classid, session, thisvalue) {
                                            
                                        document.getElementById("resultsave").innerHTML = "Setting result exception..";
                                            var action = 'updatesubjectoffered';
                                            $.post("PHP/collegeassistscripts.php", {action: action, classid: classid, subjectid: subjid, stdid: stdid, session: session, offervalue:thisvalue}).done(function (data) {
                                        document.getElementById("resultsave").innerHTML = data;
                                    });
                                        }
                                    </script>
                                    <div class='col-md-8' style='background-color:rgba(255,255,255,0.1); padding:5px; text-align:center'>
                                        <center>
                                            <table style='background-color:#fff; padding:0px; font-size:12px; min-width:800px' border="1">
                                                <thead>
                                                    <tr>
                                                        <td style='text-align:center;position:relative; padding:10px'><span style='font-weight:bold; font-size:28px'><img src='../images/schoollogo.png' style='position:absolute; left:5px; top:10px; width:100px; font-size:45px'>HAVARD HIGH SCHOOL</span><br><div>Great Learning, Great Fun!</div>
                                                            <div>Plot 10/12 Taiwo Ogun street, KM 32 Along Lagos-Ibadan Express Way, Arepo, Ogun State.</div>
                                                            <div>Tel: 0803 569 6773, 0809 601 1244, E-mail: info@havardcs.com, Website: www.havardcs.com</div>
                                                            <div style='text-align: center; margin-top:20px; font-weight:600; font-size:16px' id='gradeleveltype'>TERMINAL/YEARLY REPORT</div>
                                                            <div style='text-align: center; margin-top:20px; font-weight:800; font-size:16px'>Senior Secondary School Report Sheet</div>
                                                            <span style='position:absolute; right:10px; top:10px; display:inline-block; border-style:solid; width:130px; height:130px' id='sssschlphoto'></span>
                                                            <table border='1' style='width:100%; font-size:12px; margin-top:10px'>
                                                                <tr>
                                                                    <td class='pad2'>I.D Number : <span id='idnumberntss'style='font-weight:bold'></span></td><td colspan='2' class='pad2'>Student's Name : <span id='stdnamentss' style='font-weight:bold'></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class='pad2'>Term : <span id='termntss' style='font-weight:bold'></span></td><td class='pad2'>No. in a Class : <span id='classnumntss' style='font-weight:bold'></span></td><td class='pad2'>Class Name : <span id='classnamentss' style='font-weight:bold'></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class='pad2'>Academic Year : <span id='acayearntss'style='font-weight:bold'></span></td><td colspan="2" class='pad2'>Teacher's name : <span id='teachnamentss' style='font-weight:bold'></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" class='pad2'>Proprietress name : <span id='propnamentss' style='font-weight:bold'></span></td><td class='pad2'>Class Arm : <span id='classarmss'></span></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table style='font-size:11px; margin-top:10px; font-weight: 500; width:100%'>
                                                                <tr style='padding:10px'>
                                                                    <td style='width:50%; padding:10px'>
                                                                        <b style='font-size:20px'>ATTENDANCE</b>
                                                                        <table style='margin-top:10px; width:100%; font-size:12px; text-align:center' border='1'>
                                                                            <tr><td></td><td style='font-weight:bold'>1st Term</td><td style='font-weight:bold'>2nd Term</td><td style='font-weight:bold'>3rd Term</td></tr>
                                                                            <tbody id='attTablesss'>
                                                                                <tr><td>Days Enrolled</td><td></td><td></td><td></td></tr>
                                                                                <tr><td>Days Absent</td><td></td><td>0</td><td>0</td></tr>
                                                                                <tr><td>Days Present</td><td></td><td>0</td><td>0</td></tr>
                                                                            </tbody>

                                                                        </table>
                                                                    </td>
                                                                    <td style='text-align:center; padding:10px'>
                                                                <center>
                                                                    <table style='margin-top:10px; width:100%; font-size:12px; text-align:center' border='2'>
                                                                        <tr><td></td><td style='padding:2px'>TERM SCORE</td><td style='padding:2px'>CUMM. AVERAGE</td></tr>
                                                                        <tbody id='cdcddss'>

                                                                        </tbody>
                                                                    </table>
                                                                </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan='2' style='text-align:center; padding:10px'  id='dashssscard'>
                                                        </td>
                                                    </tr>
                                            </table>
                                            </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                            </tr>
                                            </thead>

                                            </table>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id='gmenupage' style='display:none'>
                            <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                                Grades 1- 6
                                <div class='col-md-12' style='padding:0px; font-size:12px'>
                                    <!-- Select Student -->
                                    <div class='col-md-4' style='background-color:rgba(255,255,255,0.1); padding:10px'>
                                        <label>Result type</label>
                                        <select class="form-control" style='margin-bottom:10px' id='resgradert' onchange='selectdtype(this.value)'>
                                            <option>--Select--</option>
                                            <option value='midterm'>Mid-Term Result</option>
                                            <option value='terminal'>Terminal Result</option>
                                        </select>
                                        <label>Class</label>
                                        <select class='form-control' style='margin-bottom:10px' onchange='resgradec(this.value, "resgradesn")' id='resgradec'>
                                            <option>--Select--</option>
<?php
$j = mysqli_query($w, "select * from schclass where schooltype='4' and ClassTeacher='$IDfT' order by ClassName asc");
while ($qw = mysqli_fetch_array($j)) {
    $classname = $qw['ClassName'];
    $sn = $qw['SN'];
    echo "<option value='$sn'>$classname</option>";
}
?>
                                        </select>
                                        <label>Student Name</label>
                                        <select class='form-control' style='margin-bottom:10px' id='resgradesn'>
                                            <option>--Select Student name--</option>
                                        </select>
                                        <span class='col-md-6' style='padding:0px'>
                                            <label>Session</label>
                                            <select class='form-control' id='resgrades'>
<?php
$year = date("Y") + 1;
$yearlast = $year - 1;
$a = 5;
$d = 1;
while ($a > 1) {
    echo "<option>$yearlast/$year</option>";
    $year = $year - $d;
    $yearlast = $year - 1;
    $a--;
}
?>
                                            </select>
                                        </span>
                                        <span class='col-md-6' style='padding:0px'>
                                            <label>Term</label>
                                            <select id="resgadet" class="form-control" style='margin-bottom:10px'>
                                                <option>1st Term</option>
                                                <option>2nd Term</option>
                                                <option>3rd Term</option>
                                            </select>
                                        </span>
                                        <input type='button' value='Put result' style='margin-top:10px' class='btn btn-success' onclick='putresgrade()'>
                                    </div>
                                    <script>
                                        function selectdtype(a) {
                                            //alert(a);
                                            if (a === "midterm") {
                                                //$('#nurtattendance').hide();
                                                document.getElementById("gradeleveltype").innerHTML = "MID-TERM REPORT";
                                            } else {
                                                //$('#nurtattendance').show();
                                                document.getElementById("gradeleveltype").innerHTML = "TERMINAL/YEARLY REPORT";
                                            }
                                        }
                                    </script>
                                    <div class='col-md-8' style='background-color:rgba(255,255,255,0.1); padding:5px; text-align:center'>
                                        <center>
                                            <table style='background-color:#fff; padding:0px; font-size:12px; min-width:800px' border="1">
                                                <thead>
                                                    <tr>
                                                        <td style='text-align:center;position:relative; padding:10px'><span style='font-weight:bold; font-size:28px'><img src='../images/schoollogo.png' style='position:absolute; left:5px; top:10px; width:100px; font-size:45px'>HAVARD CHILDREN SCHOOL</span><br><div>Great Learning, Great Fun!</div>
                                                            <div>Plot 38, Aribido Oshola Street, KM 32 Along Lagos-Ibadan Express Way, Arepo, Ogun State.</div>
                                                            <div>Tel: 0803 569 6773, 0809 601 1244, E-mail: info@havardcs.com, Website: www.havardcs.com</div>
                                                            <div style='text-align: center; margin-top:20px; font-weight:600; font-size:16px' id='gradeleveltype'>TERMINAL/YEARLY REPORT</div>
                                                            <div style='text-align: center; margin-top:20px; font-weight:800; font-size:16px'>Nursery Standard Based Report Sheet</div>
                                                            <span style='position:absolute; right:10px; top:10px; display:inline-block; border-style:solid; width:130px; height:130px' id='gradeschlphoto'></span>
                                                            <table border='1' style='width:100%; font-size:12px; margin-top:10px'>
                                                                <tr>
                                                                    <td class='pad2'>I.D Number : <span id='idnumberntpg'style='font-weight:bold'></span></td><td colspan='2' class='pad2'>Student's Name : <span id='stdnamentgd' style='font-weight:bold'></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class='pad2'>Term : <span id='termntgd' style='font-weight:bold'></span></td><td class='pad2'>No. in a Class : <span id='classnumntgd' style='font-weight:bold'></span></td><td class='pad2'>Class Name : <span id='classnamentgd' style='font-weight:bold'></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class='pad2'>Academic Year : <span id='acayearntpg'style='font-weight:bold'></span></td><td colspan="2" class='pad2'>Teacher's name : <span id='teachnamentgd' style='font-weight:bold'></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" class='pad2'>Proprietress name : <span id='propnamentgd' style='font-weight:bold'></span></td><td class='pad2'>Class Arm : <span id='classarmgd'></span></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table style='font-size:11px; margin-top:10px; font-weight: 500; width:100%'>
                                                                <tr style='padding:10px'>
                                                                    <td style='width:50%; padding:10px'>
                                                                        <b style='font-size:20px'>ATTENDANCE</b>
                                                                        <table style='margin-top:10px; width:100%; font-size:12px; text-align:center' border='1'>
                                                                            <tr><td></td><td style='font-weight:bold'>1st Term</td><td style='font-weight:bold'>2nd Term</td><td style='font-weight:bold'>3rd Term</td></tr>
                                                                            <tbody id='attTablegrade'>
                                                                                <tr><td>Days Enrolled</td><td>120</td><td></td><td></td></tr>
                                                                                <tr><td>Days Absent</td><td>118</td><td>0</td><td>0</td></tr>
                                                                                <tr><td>Days Present</td><td>118</td><td>0</td><td>0</td></tr>
                                                                            </tbody>

                                                                        </table>
                                                                    </td>
                                                                    <td style='text-align:center; padding:10px'>
                                                                <center>
                                                                    <table style='margin-top:10px; width:100%; font-size:12px; text-align:center' border='2'>
                                                                        <tr><td></td><td style='padding:2px'>TERM SCORE</td><td style='padding:2px'>CUMM. AVERAGE</td></tr>
                                                                        <tbody id='cdcdd'>

                                                                        </tbody>
                                                                    </table>
                                                                </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan='2' style='text-align:center; padding:10px'  id='dashgradecard'>
                                                        </td>
                                                    </tr>
                                            </table>
                                            </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                            </tr>
                                            </thead>

                                            </table>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='row' style='margin:0px; display:none' id="students">

                        <div class="modal fade bs-example-modal-sm" id="viewSattaches" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                            <div class="modal-dialog modal-sm" role="document" style='font-family:verdana; font-size:12px'>
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

