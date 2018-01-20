<?php
include 'PHP/databaseSQLconnectn.php';

session_start();
error_reporting(0);

$role = $_SESSION['Role'];
if ($role === "Teacher") {
    header('location:PortalTeachers.php');
} elseif ($role === "Admin") {
    
} elseif ($role === "Bursar") {
    header('location:schoolbursar.php');
} else {
    header('location:loginpane.php');
}
?>
<html>
    <head>

        <title><?php echo $schoolname ?> Parent Administrator</title>
        <style>
            .blackdottedline{
                border-style:dotted; 
                border-width:thin; 
                border-color:#000
            }
            .makeRed{
                color:#FF0066;
            }
            .fa-eye:hover{
                color:#00CC33;
                transition:.25s
            }
            .fasd:hover{
                padding-left:3px;
                color:#0093D9;
                transition:.25s;
            }
            .acSM{
                border-bottom-style: dotted;
                border-bottom-width:thin;
                border-color:#fff;
                padding-bottom: 3px;
            }
            body{
                margin:0px;
            }
            .bottomtotop { 
                transform:rotate(270deg); 
                height:80px;
            }
            .subfail{
                color:#CD277D;
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
            .d{
                padding:5px;
                font-size:12px;
                cursor: pointer
            }
            .d:hover{
                background-color:#fff;
                color:#005E8A;
                transition:0.25s;
            }
            .dAct{
                background-color:#548DA9;
                color:#fff;
                border-radius:2px;
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
            .subGrades{
                border-left-style:solid; 
                border-width:thin; 
                border-color:#BDD5DF;
                padding:2px
            }
            .asd{
                border-left-style:solid; 
                border-width:thin; 
                border-color:#BDD5DF;
                padding:2px
            }
            .subjName{
                border-bottom-style:solid; 
                border-bottom-width:thin; 
                border-color:#ec971f; 
                text-align: center; 
                height:3px;
            }
        </style>
        <link href="../CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="JS/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="JS/bootstrap.min.js" type="text/javascript"></script>
        <link href="../CSS/fa/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <script src="JS/summernote.min.js" type="text/javascript"></script>
        <link href="JS/summernote.css" rel="stylesheet" type="text/css"/>
        <!--<link href='https://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'> -->
    </head>
    <body>
        <div class="clearfix">
            <div class="pull-left menuitems" style="width:100px; background-color:#009CE8; min-height:100%; position:fixed; overflow-x: hidden; background-image: url('../images/background.jpg')">
                <div class="fa fa-university activemenu menustyling" id="hme" style="margin-top:80px" onclick="menuitems('#home', '#hme')">
                    <span class="dashmenu">Home</span>
                </div><br/>
                <div class="fa fa-graduation-cap menustyling" id="aclass" onclick="menuitems('#clazz', '#aclass')">
                    <span class="dashmenu">Class</span>
                </div><br/>
                <div class="fa fa-newspaper-o menustyling" id="nwsltters" onclick="menuitems('#newsletters', '#nwsltters')">
                    <span class="dashmenu">Newsletter</span>
                </div><br/>
                <div class="fa fa-users menustyling" id="prnts"  onclick="menuitems('#parents', '#prnts')">
                    <span class="dashmenu">Parents</span>
                </div><br/>
                <div class="fa fa-graduation-cap menustyling" id="stdnts" onclick="menuitems('#students', '#stdnts')">
                    <span class="dashmenu">Students</span>
                </div><br/>
                <div class="fa fa-pied-piper-alt menustyling" id="teachrs" onclick="menuitems('#teachers', '#teachrs')">
                    <span class="dashmenu">Teachers</span>
                </div><br/>
                <div class="fa fa-database menustyling" id="evnt" onclick="menuitems('#event', '#evnt')">
                    <span class="dashmenu">Events</span>
                </div><br/>
                <div class="fa fa-signal menustyling" id="grades" onclick="menuitems('#grade', '#grades')">
                    <span class="dashmenu">Analysis</span>
                </div><br/>
            </div>
            <div class="pull-right" style="width:calc(100% - 100px); background-color:#D0E0E8; min-height:100%">
                <div class="clearfix" style="height:50px; background-color:#005E8A; border-bottom-style: solid; border-bottom-width:thin; border-bottom-color:#000; box-shadow:0px 0px 1px #000">
                    <span class='pull-right' style="color:#fff; padding:10px; padding-top:12px; margin-right:20px; cursor:pointer">
                        <a href="logout.php"><i class="fa fa-power-off" style='font-size:20px; position:relative; color:#FFB3B3; text-shadow: 0px 1px 1px #000' title='Log out'></i>  </a>
                    </span>
                    <span class='pull-right' style="color:#fff; padding:10px; margin-right:20px; cursor:pointer">
                        <i class="fa fa-envelope" style='font-size:20px; position:relative' title='messages' onclick="menuitems('#messages', '#msg')">
                            <span class="iconsAbove" id='dmCount'></span>
                        </i>  
                    </span>
                    <span class='pull-right' style="color:#fff; padding:10px; margin-right:5px; cursor:pointer" title='ParentCount'>
                        <i class="fa fa-slideshare" style='font-size:20px; position:relative'>
                            <span class="iconsAbove" id="parentCount"></span>
                        </i>  
                    </span>
                    <span class='pull-right' style="color:#fff; padding:10px; margin-right:5px; cursor:pointer" title='Students'>
                        <i class="fa fa-graduation-cap" style='font-size:20px; position:relative'>
                            <span class="iconsAbove" id="stdcount"></span>
                        </i>  
                    </span>
                    <span class='pull-right' style="color:#fff; padding:10px; margin-right:5px; cursor:pointer" title='preregs'>
                        <i class="fa fa-list-alt" style='font-size:20px; position:relative' title='preregistered Students' onclick="menuitems('#preregs', '#preregs')">
                        </i>  
                    </span>
                </div>
                <div style="height:30px; color:#E3EDF2; font-size:12px; padding:7px; background-image: url('../images/background.jpg'); margin-bottom:20px; box-shadow:0px 0px 1px #000">
                    <div id="subMenu"></div>
                </div>
                <div style='margin:20px'>
                    <div class='row' style='margin:0px; display:none' id="grade">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Analysis
                        </div>
                        <div class="col-lg-10" style="height:auto; margin-bottom:5px;">
                            <div class="col-lg-12" style="padding:10px; margin-bottom:20px; background-color:rgba(255,255,255,0.2)">
                                <span style="margin-right:10px">
                                    <label>Search By</label>
                                    <select class="form-control" style="max-width:100px; display: inline" onchange="selectSearchBy(this.value)" id='searchCrit'>
                                        <option>Class</option>
                                        <option>Subject</option>
                                        <option>Student</option>
                                    </select>
                                </span>
                                <span id="gradeClass">
                                    <label>Class</label>
                                    <select style="max-width:150px; display: inline" class="form-control" id='searchClass'>
                                        <?php
                                        $d = mysqli_query($w, "select ClassName from schclass");
                                        while ($a = mysqli_fetch_array($d)) {
                                            echo "<option>" . $a['ClassName'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </span>
                                <span id="gradeSubject" style="display: none">
                                    <label>Subject</label>
                                    <input type="text" style="max-width:150px; display: inline" class="form-control" placeholder="SubjectID" maxlength="10" id='searchSubjectID'>
                                </span>
                                <span id="gradeStudent" style="display:none">
                                    <label>Student ID</label>
                                    <input type="text" style="max-width:150px; display: inline" class="form-control" placeholder="StudentID" maxlength='10' id='searchstudentID'>
                                </span>
                                <span style="margin-right:10px">
                                    <label>Term</label>
                                    <select class="form-control" style="max-width:80px; display: inline" onchange="selectSearchBy(this.value)" id='searchTerm'>
                                        <option>First</option>
                                        <option>Second</option>
                                        <option>Third</option>
                                    </select>
                                </span>
                                <span style="margin-right:10px">
                                    <label>Session</label>
                                    <select class="form-control" style="max-width:120px; display: inline" onchange="selectSearchBy(this.value)" id='searchSession'>
                                        <option>2015/2016</option>
                                        <option>2016/2017</option>
                                        <option>2017/2018</option>
                                    </select>
                                </span>
                                <input type="button" class="btn btn-success" value="Get results" onclick="getResults()">
                            </div>
                        </div>
                        <div class="col-lg-10" style="min-height:200px;">
                            <div class="col-lg-12" style="padding:10px; background-color:rgba(255,255,255,0.2)">
                                <table class="table table-striped" style="min-height:200px" id='gradeTable'>
                                    <tr style="height:100px; vertical-align: bottom; font-weight:bold">
                                        <td style="padding:2px; text-align:left; font-size:13px; font-family:verdana">
                                            <br/>
                                            <span>Second Term 2015/2016</span><br/>
                                            <span>AGBEDE Joseph Kayode</span><br/>
                                            <span>JSS 2A</span>
                                        </td>
                                        <td style="background-color:#D0E0E8; width:100px; text-align: center"><div class="bottomtotop">First Test</div></td>
                                        <td style="background-color:#C2D9E2; width:100px;"><div class="bottomtotop">Second Test</div></td>
                                        <td style="background-color:#D0E0E8; width:100px;"><div class="bottomtotop">Exam</div></td>
                                        <td style="background-color:#C2D9E2; width:100px;"><div class="bottomtotop">Total</div></td>
                                        <td style="background-color:#D0E0E8; width:100px;"><div class="bottomtotop">Grades</div></td>
                                        <td style="background-color:#C2D9E2; width:100px;"><div class="bottomtotop">Position</div></td>
                                        <td style="background-color:#D0E0E8; width:100px;"><div class="bottomtotop">Comment</div></td>
                                    </tr>
                                    <tr class="subjName">
                                        <td style="padding:2px"></td>
                                        <td class="asd">20%</td>
                                        <td class="asd">20%</td>
                                        <td class="asd">60%</td>
                                        <td class="asd">100%</td>
                                        <td class="asd">A - F</td>
                                        <td class="asd"></td>
                                        <td class="asd"></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class='row' style='margin:0px;' id="home">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Dashboard
                        </div>
                        <div class='col-lg-2 col-md-4 col-sm-12 col-xs-12' style='background-color:rgba(255,255,255,0.2); border-radius:2px; margin-bottom:20px; padding:0px; margin-right:10px;'>
                            <table class="table table-responsive table-hover" style="font-size:12px">
                                <tr class="point"><td >Parent Count</td><td style="background-color:#C5D9E2;font-weight:bold; text-align:center" id="pc">0</td></tr>
                                <tr class="point"><td >Student Count</td><td style="background-color:#C5D9E2;font-weight:bold; text-align:center" id="sc">0</td></tr>
                                <tr class="point"><td >Teacher Count</td><td style="background-color:#C5D9E2;font-weight:bold; text-align:center" id="tc">0</td></tr>
                                <tr class="point"><td >Assignments</td><td style="background-color:#C5D9E2;font-weight:bold; text-align:center" id="ass">0</td></tr>
                                <tr class="point"><td >Newsletters sent</td><td style="background-color:#C5D9E2;font-weight:bold; text-align:center" id="nls">0</td></tr>
                                <tr class="point"><td >Pre-registered Students</td><td style="background-color:#C5D9E2;font-weight:bold; text-align:center" id="prs">0</td></tr>
                            </table>
                        </div>
                        <div class='col-lg-6 col-md-4 col-sm-12 col-xs-12' style="padding:0px; padding-right:10px; margin-bottom:20px">
                            <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:10px">
                                Events
                            </div>
                            <div id="shownevents">

                            </div>
                        </div>
                        <div class='col-lg-3 col-md-4 col-sm-12 col-xs-12' style="padding:0px;padding-right:10px;">
                            <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:20px">
                                Term Calendar
                            </div>
                            <div style="background-color:rgba(255,255,255,0.2);padding:10px; border-radius:4px">
                                <table border="0" cellpadding="0" class='table table-responsive table-condensed table-striped' style='font-size:13px; font-family: verdana' id="ratifiedtimetable">

                                </table>    
                            </div>

                        </div>
                    </div>

                    <!-- newsletters preregs-->
                    <div class='row' style='margin:0px; display:none' id="newsletters">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Newsletters
                        </div>

                        <div class="col-lg-8" style="padding-left:0px; padding-right:5px">
                            <!-- Send message -->
                            <div style="padding:10px;margin-bottom:20px; border-radius:2px; background-color:rgba(255,255,255,0.2)">
                                <label style="margin-top:15px">Newsletter Subject</label>
                                <input  class="form-control"type="email" id="NLsubject">
                                <label style="margin-top:15px">Message</label>
                                <div id="NLmessage"></div>
                                <span class="btn btn-primary" style="margin-top:10px" onclick="sendNewsletters()"><i class="fa fa-envelope-o" style="margin-right:10px"></i>Mail Newsletter</span>
                                <span id="PmailMessage" style="margin-top:10px"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12" style="padding-left:0px; padding-right:5px">
                            <div style="font-family:raleway; font-size:15px; font-weight:bold; border-bottom-style:solid; border-bottom-width:thin; border-color:#C1D7E1; padding:10px; padding-left:0px; margin-bottom:20px">
                                Sent Newsletters
                            </div>
                            <div style="background-color:rgba(255,255,255,0.2); min-height:50px; padding:10px;">
                                <table class="table table-condensed table-striped table-hover" style=" font-size:14px" id="sentNewsletters">
                                    <tr><td>Holiday is over</td><td>12/10/2015</td></tr>
                                    <tr><td>New Term requirement</td><td>15/07/2015</td></tr>
                                </table> 
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

                    <div class='row' style='margin:0px; display:none' id="clazz">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Class
                        </div>
                        <div class="col-md-4" style="padding-left:0px; padding-right:5px">
                            <div style="padding:10px; margin-bottom:10px; border-radius:2px; background-color:rgba(255,255,255,0.2)">
                                <div style="font-family:raleway; font-size:15px; padding-bottom:10px; border-bottom-style:dotted; border-width:thin; margin-bottom:20px">
                                    Add Class
                                </div>
                                <div>
                                    <label>Class</label>
                                    <input class="form-control" placeholder="Class Name" id="ClassNames">
                                    <div style="margin-top:10px; width:100%" class="btn btn-success" onclick="createClass()">Create Class</div>
                                    <div id="classnid" style="margin-top:10px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-left:0px; padding-right:5px; margin-bottom:20px">
                            <div style="font-family:raleway; font-size:15px; font-weight:bold; border-bottom-style:solid; border-bottom-width:thin; border-color:#C1D7E1; padding:10px; padding-left:0px; margin-bottom:20px">
                                <span onclick="getclasses()" style="padding:10px; font-size:20px; cursor:pointer" title="Refresh Class list" class="fa fa-refresh"></span> Classes ( <?php
                                $f = mysqli_query($w, "select * from schclass");
                                echo mysqli_num_rows($f)
                                ?> )
                            </div>
                            <div style="background-color:rgba(255,255,255,0.2); min-height:50px; padding:10px;">
                                <table class="table table-condensed table-striped table-hover" style=" font-size:13px; font-family:verdana" id="allClasses">

                                </table> 
                            </div>
                        </div>
                        <div class="col-md-4" id="updateClassInfo" style="padding-left:0px; padding-right:5px">
                            <div style="font-family:raleway; font-size:15px; padding-bottom:10px; border-bottom-style:dotted; border-width:thin; margin-bottom:20px">
                                Assign Teacher
                            </div>
                            <div style="background-color:rgba(255,255,255,0.2); min-height:50px; padding:10px;">
                                <label>Class</label>
                                <input type="text" style="margin-bottom:10px" class="form-control" id="classghg" disabled="true">
                                <label>Select staff</label>
                                <select class="form-control" onchange="classReID.selectedIndex = this.selectedIndex" id="classRe">
                                    <?php
                                    $d = mysqli_query($w, "select * from schstaff");
                                    while ($f = mysqli_fetch_array($d)) {
                                        echo "<option>" . $f['StaffName'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <select class="form-control" id="classReID" onchange="classRe.selectedIndex = this.selectedIndex" style="display:none">
                                    <?php
                                    $h = mysqli_query($w, "select * from schstaff");
                                    while ($f = mysqli_fetch_array($h)) {
                                        echo "<option>" . $f['StaffID'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <div class="btn btn-success" style="margin-top:10px" onclick="updateClass()">Update Class</div>
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

                    <div class='row' style='margin:0px; display:none; background-color:rgba(255,255,255,0)' id="preregs">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px; color:#000">
                            Pre-Registered Students
                        </div>
                        <div class="col-lg-10" style="min-height:200px; padding:20px; border-radius:4px; background-color:rgba(255,255,255,0.4)">
                            <div style="max-height:500px; overflow-y:auto">
                                <table class="table table-striped table-condensed" style="font-family:verdana; font-size:13px">
                                    <tr style="font-weight:bold"><td>Student Name</td><td>Class</td><td>Home address</td><td>Contact Phone</td><td>Parent/Guardian</td><td>Registered Date</td></tr>
                                    <?php
                                    $fda = mysqli_query($w, "select * from preregisteredstudents order by SN desc");
                                    while ($s = mysqli_fetch_array($fda)) {
                                        echo "<tr><td>" . $s['Name'] . "</td><td>" . $s['Class'] . "</td><td>" . $s['Address'] . "</td><td>" . $s['PhoneNumber'] . "</td><td>" . $s['registeredBy'] . "</td><td>" . $s['RegDate'] . "</td></tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class='row' style='margin:0px; display:none' id="messages">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Messages
                        </div>
                        <div class="col-lg-10" style="min-height:200px;">
                            <!--
                            <div class="col-lg-3" style="font-size:17px; padding:10px; padding-left:0px; padding-right:0px; background-color:rgba(0,0,0,0.5)">
                                <div class=" col-lg-12 messages" id="dmtab" style="color:#fff; font-size:12px; padding:10px" onclick="loadDM()">Direct Message (<span style="color:#FCD039">2</span>)</div>
                                <div class=" col-lg-12 messages" style="color:#fff; font-size:12px; padding:10px" onclick="loadGM()" id="gmtab">General Message (<span style="color:#FCD039">1</span>)</div>
                            </div>
                            -->
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
                            <span id="parentcount"></span> Parents
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px; margin-bottom:10px; text-align:right; position:relative">
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="margin-right:10px">
                                <div class="col-lg-12 col-md-12" style="padding:0px">
                                    <span style="position:absolute; left:0px; top:10px; max-width:100px; padding:3px; padding-left:10px; padding-right:10px; background-color:#AAC7D5; color:#fff; border-radius:4px">

                                    </span>
                                    <span style="padding:10px; background-color:#E3EDF2; border-radius:5px;">
                                        <i class="fa fa-search" style="margin:5px; padding:5px; color:#0093D9"></i>
                                        <input type="text" placeholder="Parent Surname" id="parentsSearch" style="border:none;max-width: 200px; background-color:#E3EDF2; display:inline">
                                        <span style="padding:10px; background-color:#548DA9; color:#fff; cursor:pointer" onclick="getparents('search')">Search</span>
                                        <span onclick="getparents()" style="padding:10px; cursor:pointer" title="Refresh grid" class="fa fa-refresh"></span>
                                        <select style="max-width:200px; padding:5px; border:none" id="filterclass" onchange="searchBy(this.value)">
                                            <?php
                                            $d = mysqli_query($w, "select ClassName from schclass");
                                            while ($a = mysqli_fetch_array($d)) {
                                                echo "<option>" . $a['ClassName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-8" style="padding:0px; margin-bottom:20px">
                            <div class="col-lg-12" style="background-color:rgba(255,255,255,0.2);min-height:200px; position:relative">
                                <div style="margin-bottom:50px">
                                    <table class="table table-condensed table-striped table-hover" id="parentstable" style="font-size:14px; margin-top:10px">
                                    </table>
                                </div>

                                <div style="position:absolute; bottom:10px">
                                    <div id="parentspaginate">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" style="margin-top:20px; background-color:rgba(255,255,255,0.2);min-height:200px; max-height:400px; overflow-y:auto; position:relative">
                                <div style="padding-top:20px; font-family:raleway; font-weight:bold; color:#CD277D">Attachment Request(s)</div>
                                <div style="margin-top:10px">
                                    <div style="margin-bottom:50px">
                                        <table class="table table-condensed table-striped table-hover" id="linkagerequeststable" style="font-size:14px; margin-top:10px">
                                            <tr style="font-weight:bold; color:#005E8A"><td>Student</td><td>Class</td><td>Request By</td><td>Permission</td></tr>
                                            <tr><td colspan="4" style="text-align:center">No requests</td></tr>

                                        </table>
                                    </div>
                                    <div style="position:absolute; bottom:10px">
                                        <div id="parentspaginate">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12" style="padding:0px">
                            <!-- Send message -->
                            <div style="padding:10px; margin-bottom:20px; border-radius:2px; background-color:rgba(255,255,255,0.2)">
                                <div style="font-family:raleway; font-size:20px; margin-bottom:20px">
                                    Message Parents
                                </div>
                                <label style="margin-top:15px">Student group</label>
                                <select class="form-control" id="Pclass">
                                    <?php
                                    $d = mysqli_query($w, "select ClassName from schclass");
                                    while ($a = mysqli_fetch_array($d)) {
                                        echo "<option>" . $a['ClassName'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <label style="margin-top:15px">Subject</label>
                                <input  class="form-control"type="email" id="Psubject">
                                <label style="margin-top:15px">Message</label>
                                <div id="Pmessage"></div>
                                <span class="btn btn-primary" style="margin-top:10px" onclick="stdSendMail('parents')"><i class="fa fa-envelope-o" style="margin-right:10px"></i>Send Mail</span>
                                <div id="PamailMessage" style="margin-top:10px"></div>
                            </div>
                        </div>

                        <!-- Modal for emailing  data-toggle="modal" data-target="#emailspecificParents" grade -->
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

                    <div class='row' style='margin:0px; display: none' id="teachers">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            <span id="teachercount" style="display:none"></span> Teachers <span id="wtdh" style="font-size:20px"></span>
                        </div>
                        <div class="col-lg-12" id="tHome" style='padding-left:0px'>

                            <div class="col-lg-3 col-sm-12" style="min-height:200px; padding:5px; margin-bottom:20px; height:auto;">
                                <div style='background-color:rgba(255,255,255,0.2);padding:5px; '>
                                <div style="font-family:raleway; font-size:15px; font-weight:bold; border-bottom-style:solid; border-bottom-width:thin; border-color:#C1D7E1; padding:10px; padding-left:0px; margin-bottom:10px">
                                    Add a Staff
                                </div>

                                <div style='text-align:right; font-size:11px' id='addTnotification'></div>
                                <label> Name </label>
                                <input type="text" class="form-control" placeholder="Name" maxlength="39" id='teacherName'>
                                <label style="margin-top:10px"> Credentials </label>
                                <input type="text" class="form-control" placeholder="Credentials" maxlength="95" id='teachercredential'>
                                <label style="margin-top:10px"> Phone Number </label>
                                <input type="text" class="form-control" placeholder="Phone number" maxlength="14" id='teacherphone'>
                                <label style="margin-top:10px"> Email address </label>
                                <input type="text" class="form-control" placeholder="Email address" maxlength="40" id='teacheremail'>
                                <label style="margin-top:10px"> Address </label>
                                <textarea class="form-control" placeholder="Address" style="resize:none" maxlength="150" id='teacheraddress'></textarea>
                                <input type="button" class="btn btn-success" value="Register Teacher" style="margin-top:10px; margin-bottom:20px" onclick='AddTeacher()'>
                            </div>
                            </div>

                            <div class="col-md-4" style="padding:5px">
                                <div style="min-height:200px; margin-right:0px; margin-bottom:20px; padding:10px; background-color:rgba(255,255,255,0.2)">
                                    <div style="font-family:raleway; font-size:15px; font-weight:bold; border-bottom-style:solid; border-bottom-width:thin; border-color:#C1D7E1; padding:10px; padding-left:0px; margin-bottom:20px">
                                        <i class='fa fa-refresh' id='teacherList' onclick='teacherlist()'></i> Staff list
                                    </div>
                                    <div id='teacherslisting'>
                                    </div>
                                </div>
                                <div style="margin-top:20px; display:none">
                                    <div style="font-family:raleway; font-size:15px; font-weight:bold; margin-top:10px;  border-bottom-style:solid; border-bottom-width:thin; border-color:#C1D7E1; padding:10px; padding-left:0px; margin-bottom:20px">
                                        Staff setting
                                    </div>
                                    <label> Direct message to parents </label>
                                    <select class="form-control" id='TSdm'>
                                        <option>Disallow</option>
                                        <option selected>Allow</option>
                                    </select>
                                    <label style="margin-top:15px"> Take attendance </label>
                                    <select class="form-control" id='TSta'>
                                        <option>Disallow</option>
                                        <option selected>Allow</option>
                                    </select>
                                    <label style="margin-top:15px"> Issue Newsletters </label>
                                    <select class="form-control" style='margin-bottom:10px' id='TSin'>
                                        <option>Disallow</option>
                                        <option selected>Allow</option>
                                    </select>
                                    <input type='button' value='Apply setting to all' class='btn btn-success' style='margin-bottom:20px' onclick="saveteachersetting()">
                                    <br/>
                                    <div style='text-align:right'>
                                        <span class='btn btn-warning' style='margin-bottom:10px; padding:3px'>Manage exceptions</span>
                                    </div>
                                    <div id='teacherexception'>
                                        <span style='padding:5px; background-color:#fff; border-radius:4px'>
                                            <select style='border:none'>
                                                <option>Mr. Elegbeleye Emmanuel</option>
                                            </select>
                                            <input type='button' value ='manage'> 
                                        </span>
                                    </div>    
                                </div>
                            </div>

                            <div class="col-lg-5" style='padding:5px'>
                                <div class="col-lg-12 col-sm-12" id="staffupdate" style="padding:20px; margin-bottom:20px; position:relative; background-color:rgba(255,255,255,0.2); display:none">
                                    <i class="fa fa-close point" onclick="{
                                                $('#staffupdate').hide(300);
                                            }" style="position:absolute; right:10px; top:10px" title="Close"></i>
                                    <div style="font-family:raleway; font-size:20px; position:relative; margin-bottom:20px">
                                        Update Information
                                        <span style="position:absolute; left:0px; top:30px; display:none; font-size:12px; font-family:verdana" id="sName">Kayode Agbede</span>
                                    </div>
                                    <label style="margin-top:15px">Names</label>
                                    <input  class="form-control"type="text" placeholder="uSNames" id="uTNames" maxlength="75">
                                    <label style="margin-top:15px">Email</label>
                                    <input  class="form-control"type="email" placeholder="uSemail" id="uTEmail" maxlength="45">
                                    <label style="margin-top:15px">Phone number</label>
                                    <input  class="form-control"type="text" placeholder="uSNumber" id="uTNumber" maxlength="14">
                                    <label style="margin-top:15px">Credentials</label>
                                    <input  class="form-control"type="text" placeholder="uSCredentials" id="uTCredential" maxlength="95">
                                    <label style="margin-top:15px">Address</label>
                                    <input  class="form-control"type="text" placeholder="uSAddress" id="uTAddress">
                                    <span class="btn btn-primary" style="margin-top:10px" onclick="updateTeacher()"><i class="fa fa-envelope-o" style="margin-right:10px"></i>Update Information</span>
                                    <div id="PmailMessage" style="margin-top:10px"></div>
                                </div>
                                <div class="col-lg-12 col-sm-12" style="padding:10px;background-color:rgba(255,255,255,0.2)">
                                    <div style="font-family:raleway; font-size:20px; margin-bottom:20px">
                                        Message Staff
                                    </div>
                                    <label style="margin-top:15px">Subject</label>
                                    <input  class="form-control"type="email" id="Tsubject">
                                    <label style="margin-top:15px">Message</label>
                                    <div id="Tmessage"></div>
                                    <span class="btn btn-primary" style="margin-top:5px" onclick="stdSendMail('staff')"><i class="fa fa-envelope-o" style="margin-right:10px"></i>Send Mail</span>
                                    <div id="TmailMessage" style="margin-top:10px"></div>
                                </div>
                            </div>
                        </div>
                        <div  class="col-lg-12" style="min-height:200px; height:auto; margin-right:20px; padding-left:0px; display:none" id="tAssignments">
                            <div class="col-lg-4" style="min-height:200px; margin-right:0px; padding-left:0px">
                                <div class='col-lg-12 col-sm-12' style=" padding:10px; margin-bottom:10px; min-height:20px; border-radius:2px; background-color:rgba(255,255,255,0.2)">
                                    <span onclick="getAsses('All')" style="padding:10px; cursor:pointer" title="Refresh assignment grid" class="fa fa-refresh"></span>
                                    <input type='date' class='form-control' id='AssDate' style='padding:0px;border:none; max-width:140px; display:inline' onchange='getAsses("Date");'>
                                    <select class='form-control' style='max-width:150px; display:inline' id='AssClass'  onchange='getAsses("Class");'>
                                        <?php
                                        $d = mysqli_query($w, "select ClassName from schclass");
                                        while ($a = mysqli_fetch_array($d)) {
                                            echo "<option>" . $a['ClassName'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class='col-lg-12 col-sm-12' style="padding:20px; margin-bottom:20px; min-height:100px; background-color:rgba(255,255,255,0.2)">
                                    <table style='font-size:13px' class='table-condensed table table-striped' id="assignmentlist">

                                    </table>
                                </div>
                            </div>
                            <div class='col-md-8' id='assDescription' style='background-color:rgba(255,255,255,0.2); padding:10px; font-family:raleway;'>

                            </div>
                        </div>
                        <div  class="col-lg-12" style="min-height:200px; height:auto; display:none; margin-right:20px; margin-right:0px; padding-right:0px" id="tSubjects">
                            <div style="margin-bottom:10px; font-family:raleway; font-size:20px">Subjects</div>
                            <div class="col-lg-3 col-sm-12" style="padding:5px; position:relative; margin-bottom:20px; min-height:100px" id="assignmentlist">
                                <div style='background-color:rgba(255,255,255,0.2); padding:5px'>
                                <label style="margin-top:40px">Subject Name</label>
                                <input type="text" class="form-control" placeholder="Subject name" style="margin-bottom:10px" id="subName">
                                <label>Class</label>
                                <select class="form-control" style="margin-bottom:10px" id="subCategory">
                                    <?php
                                    $d = mysqli_query($w, "select ClassName from schclass");
                                    while ($a = mysqli_fetch_array($d)) {
                                        echo "<option>" . $a['ClassName'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <label>Status</label>
                                <select class="form-control" id="subStatus" style="margin-bottom:20px">
                                    <option>Mandatory</option>
                                    <option>Optional</option>
                                </select>
                                <span class="btn btn-success" onclick="addSubject()">Add Subject</span>
                                <div style="font-size:12px; font-family: verdana; margin-top:10px" id="ServerResponse"></div>
                            </div>
                            </div>
                            <div class="col-md-6" style='padding-left:0px'>
                                <div style="margin-bottom:10px">
                                    <span style="padding:10px; background-color:#E3EDF2; border-radius:2px;">
                                        <i class="fa fa-search" style="margin:5px; padding:5px; color:#0093D9"></i>
                                        <input type="text" placeholder="Subject Name" id="subjectSearch" style="border:none;max-width: 200px; background-color:#E3EDF2; display:inline">
                                        <span style="padding:10px; background-color:#548DA9; color:#fff; cursor:pointer" onclick="getsubjects('search')">Search</span>
                                        <span onclick="getsubjects('all')" style="padding:10px; cursor:pointer" title="Refresh grid" class="fa fa-refresh"></span>
                                        <select style="max-width:200px; padding:5px; border:none" id="filtersubclass" onchange="getsubjects('filter')">
                                            <?php
                                            $d = mysqli_query($w, "select ClassName from schclass");
                                            while ($a = mysqli_fetch_array($d)) {
                                                echo "<option>" . $a['ClassName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </span>
                                </div>
                                <div class="col-lg-12 col-sm-12" style="padding:20px; position:relative; margin-bottom:20px; min-height:100px; background-color:rgba(255,255,255,0.2)" id='subjectFisM'>
                                    <table class="table table-condensed table-striped table-responsive" style="font-size:13px; font-family:verdana" id='subjectsDis'>

                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3" style="min-height:120px; height:auto; position:relative; padding-bottom: 10px;  background-color:rgba(255,255,255,0.2)" id="updatesubject">
                                <i class="fa fa-close point" onclick="{
                                            $('#updatesubject').hide(300);
                                        }" style="position:absolute; right:10px; top:10px" title="Close"></i>
                                <div id="subjectSNDetail" style="display:none">4</div>
                                <label style="margin-top:40px">Subject Name</label>
                                <input type="text" class="form-control" placeholder="Subject name" style="margin-bottom:10px" id="updatesubjectname" disabled="true">
                                <label>Class</label>
                                <select class="form-control" style="margin-bottom:10px" id="updatesubjectclass" disabled="true">
                                    <?php
                                    $d = mysqli_query($w, "select ClassName from schclass");
                                    while ($a = mysqli_fetch_array($d)) {
                                        echo "<option>" . $a['ClassName'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <label>Assign Teacher</label>
                                <select class="form-control" style="margin-bottom:10px" id="assignSubjectTeacher" onchange="assignSubjectTeacherID.selectedIndex = this.selectedIndex">
                                    <?php
                                    $d = mysqli_query($w, "select StaffName from schstaff");
                                    while ($a = mysqli_fetch_array($d)) {
                                        echo "<option>" . $a['StaffName'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <select class="form-control" style="margin-bottom:10px; display:none" id="assignSubjectTeacherID" onchange="assignSubjectTeacher.selectedIndex = this.selectedIndex">
                                    <?php
                                    $d = mysqli_query($w, "select StaffID from schstaff");
                                    while ($a = mysqli_fetch_array($d)) {
                                        echo "<option>" . $a['StaffID'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <span class="btn btn-success" style="width:100%" onclick="updatesubjectTeachers()">Update</span>
                            </div>

                        </div>
                    </div>
                    <div class='row' style='margin:0px; display: none' id="event">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Events
                        </div>
                        <div class="col-lg-3" style="min-height:200px; margin-right:20px; margin-bottom:10px; background-color:rgba(255,255,255,0.2)">
                            <div style="text-align: right; padding:5px" id="eventnotification"></div>
                            <label style="margin-top:20px">Event Name</label>
                            <input style="margin-bottom:10px" type="text" class="form-control" placeholder="Event name" id="ceName">
                            <label>Description</label>
                            <textarea class="form-control" style="margin-bottom:10px; resize: none" id="ceDesc" maxlength="135"></textarea>
                            <label>Start Date</label>
                            <input style="margin-bottom:10px" type="date" class="form-control" id="cesDate">
                            <label>End Date</label>
                            <input style="margin-bottom:10px" type="date" class="form-control" id="ceeDate">
                            <label>Publish</label>
                            <select class="form-control" id="ePublish">
                                <option>Create Only</option>
                                <option>Create and Publish</option>
                            </select>
                            <input type="button" onclick="createSEvent()" value="Save Event" class="btn btn-success" style="margin-bottom: 20px; margin-top:20px">
                        </div>
                        <div class="col-lg-5" style="padding-left: 0px; margin-bottom:20px; position:relative" id="allevents">
                            <span style="position:absolute; top:-30px" id="loadingEv"></span>
                        </div>
                        <div class="col-lg-3" style="padding-left:0px">
                            <div style="font-family:raleway; font-size:20px; margin-bottom:20px">
                                Term Calender
                            </div>
                            <div style="background-color:rgba(255,255,255,0.2);padding:10px">
                                <label>Select Term</label>
                                <select class="form-control" style="margin-bottom: 10px" id="term">
                                    <option>First Term</option>
                                    <option>Second Term</option>
                                    <option>Third Term</option>
                                </select>
                                <label>Select Year</label>
                                <select class="form-control" style="margin-bottom: 10px" id="ttyear">
                                    <option>2015/2016</option>
                                    <option>2016/2017</option>
                                    <option>2017/2018</option>
                                </select>
                                <label>activity</label>
                                <input  class="form-control" type="text" placeholder="activity" style="margin-bottom: 10px" id="activity">
                                <label>Time</label>
                                <input type="text" class="form-control" placeholder="Time" style="margin-bottom: 10px" id="tttime">
                                <input type="button" value="add" class="btn btn-warning" onclick="addtimetable()">
                            </div>
                            <table id="schoolTermtable" class="table table-condensed table-hover" style="background-color:rgba(255,255,255,0.2); margin-top:20px; font-size:13px">

                            </table>
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
                                            <?php
                                            $d = mysqli_query($w, "select ClassName from schclass");
                                            while ($a = mysqli_fetch_array($d)) {
                                                echo "<option>" . $a['ClassName'] . "</option>";
                                            }
                                            ?>
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
                            <span id="studentcount"></span> Students
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
                                            <?php
                                            $d = mysqli_query($w, "select ClassName from schclass");
                                            while ($a = mysqli_fetch_array($d)) {
                                                echo "<option>" . $a['ClassName'] . "</option>";
                                            }
                                            ?>
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
                                        <?php
                                        $d = mysqli_query($w, "select ClassName from schclass");
                                        while ($a = mysqli_fetch_array($d)) {
                                            echo "<option>" . $a['ClassName'] . "</option>";
                                        }
                                        ?>
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
                                        <?php
                                        $d = mysqli_query($w, "select ClassName from schclass");
                                        while ($a = mysqli_fetch_array($d)) {
                                            echo "<option>" . $a['ClassName'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </span>
                                <div class="col-lg-12" style="min-height:200px; background-color:rgba(255,255,255,0.2); text-align:left; position:relative; margin-top:20px">
                                    <div style="font-family:raleway; font-size:20px; font-weight:bold; padding:20px; padding-left:0px; margin-bottom:20px">
                                        Students record
                                    </div>
                                    <div style="margin-bottom:50px">
                                        <div style="max-height:500px; overflow-y: auto">
                                            <table class="table table-condensed table-responsive table-striped" id="allstudentsinfo" style="font-size:14px; font-family:verdana; font-size:12px; margin-top:10px">
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

