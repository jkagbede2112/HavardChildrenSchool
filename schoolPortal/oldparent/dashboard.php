<?php
session_start();
error_reporting(0);

$parentName = $_SESSION['ParentName'];
$parentID = $_SESSION['ParentID'];
$email = $_SESSION['Email'];
$phonenumber = $_SESSION['PhoneNumber'];
if (!$parentName) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Havard Children School</title>
        <script src="JS/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="../JS/mathgame.js" type="text/javascript"></script>
        <script src="JS/bootstrap.min.js" type="text/javascript"></script>
        <link href="../CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/pagedefinition.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/fa/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <!--<link href='https://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>-->
        <style>
            .blackdottedline{

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
            body{
                background-color:#009CE8;
                margin:0px;
            }
            .menuItem > span {
                padding:12px;
                color:#fff;
                cursor:pointer;
                font-weight:bold;
            }
            .menuItem > span:hover {
                background-image:linear-gradient(#1CB5FF,#009CE8);
                transition:0.25s;
                border-top-left-radius: 2px;
                border-top-right-radius: 2px;
            }
            .activemenu{
                background-image:linear-gradient(#1CB5FF,#009CE8);
            }
            .submenuitem{
                cursor:pointer;
            }
            .point{
                cursor:pointer;
            }
            .portalsubmenu{
                font-size:15px; 
                font-weight:bold; 
                color:#fff; 
                font-family:raleway;
                padding:10px;
                cursor:pointer;
            }
            .portalProfile{
                font-size:15px; 
                font-weight:bold; 
                color:#fff; 
                font-family:raleway;
                padding:10px;
                cursor:pointer;
            }
            .portalsubmenu:hover{
                background-color:#33B0ED;
                color:#000;
                transition:0.25s;
            }
            .portalmessage{
                font-size:15px; 
                font-weight:bold; 
                color:#fff; 
                font-family:raleway;
                padding:10px;
                cursor:pointer;
            }
            .messages{
                font-size:15px; 
                font-weight:bold; 
                color:#fff; 
                font-family:raleway;
                padding:10px;
                cursor:pointer;
            }
            .messages:hover{
                background-color:#33B0ED;
                color:#000;
                transition:0.25s;
            }
            .activeportal{
                background-color:#CD277D;
            }
            .submenuitem:hover{
                cursor:pointer;
                color:#fff;
                transition:0.5s;
            }
            .message:hover{
                background-color:rgba(0,0,0,0.1);
            }
            .activemsg{
                background-color:rgba(0,0,0,0.1);
            }
            .Amessage{
                background-color:rgba(0,0,0,0.1);
            }
        </style>
    </head>
    <body>
        <div style="">
            <div class='clearfix' style="height:150px; background-image:linear-gradient(#FCD651,#FBC715); padding-top:50px; padding-left:20px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:#fff">
                <span class="pull-right" style="margin-right:0px; background-color:rgba(0,0,0,0.5); padding:10px; padding-right:40px; color:#fff">
                    <?php
                    echo date("l, jS M Y");
                    ?>
                </span>
            </div>
        </div> 
        <?php
        session_start();
        $parid = $_SESSION['ParentID'];
        ?>
        <div class="col-lg-12" style="padding:20px 0px 10px 0px; background-image: url('../images/background.jpg'); height:50px">
            <div class="container-fluid menuItem">
                <span class="pportal activemenu" id="studentmenu" onclick="showPage('#studentmenucontent', '#studentmenu')">Student</span>
                <span class="pportal" id="schoolEvents" onclick="showPage('#schoolEvent', '#schoolEvents')">School Calender</span>
                <span class="pportal" id="accountsetting" onclick="showPage('#accountmenucontent', '#accountsetting')">Account setting</span>
                <span class="pportal" id="messageboard" onclick="showPage('#messageboardmenucontent', '#messageboard')">Message board</span>
                <span class="pportal" id="suportal" onclick="window.location = 'logout.php'">Sign Out</span>
            </div>
        </div>
        <div class="container" style="">
            <div id="verification status" style=" margin-top:60px; text-align:center; min-height:40px; font-family:raleway">Welcome <b><?php echo $parentName; ?></b></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.2); margin-bottom:50px; min-height:260px; border-bottom-left-radius: 10px; border-bottom-right-radius:10px; padding:30px">
                <div id="studentmenucontent">
                    <div class="col-lg-3" style="font-size:17px; padding:10px; padding-left:0px; padding-right:0px; background-color:rgba(0,0,0,0.8)">
                        <div class="portalsubmenu activeportal" onclick="showonly('#preregisterstudents', '#prereg')" id="prereg">Pre-register student</div>
                        <div class="portalsubmenu" onclick="showonly('#attachstudent', '#attachenrolled')" id="attachenrolled">Attach enrolled Student</div>
                        <div class="portalsubmenu" onclick="showonly('#viewstudent', '#viewstudentdata')" id="viewstudentdata">View Student</div>
                        <div class="portalsubmenu" onclick="showonly('#messageme', '#messageusnow')" id="messageusnow">Message Us</div>
                        <!--<div class="portalsubmenu" onclick="showonly('#resultme', '#checkresult');
                                loadstudentscombo();" id="checkresult">Check Result</div>
                        <div class="portalsubmenu" onclick="showonly('#braintrainI', '#braintrain')" id="braintrain">BrainExercise</div><br/>-->
                    </div>
                    <div class="col-lg-9" style="background-color:rgba(255,255,255,0.4); min-height:210px; padding:20px; border-radius:4px; position:relative">
                        <div class="col-lg-12" style="font-size:17px; padding:10px;">
                            <span style="position:absolute; right:5px; top:-10px; font-size:12px; color:#ff0000" id="servermessage"></span>
                            <div id="preregisterstudents">
                                <div style="font-size:30px; color:#000; font-family:raleway">Pre-register student</div><br/>
                                <div style="font-family:montserrat; font-size:14px">
                                    <label>Name</label>
                                    <input type="text" class="form-control" style="margin-bottom:10px" id='preregname'>
                                    <label>Class</label>
                                    <select class="form-control" style="margin-bottom:10px" id='preregclass'>
                                        
                                    </select>
                                    <label>Address</label>
                                    <input type="text" class="form-control" style="margin-bottom:10px" id='preregaddress'>
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" style="margin-bottom:10px" id='preregphone'>
                                    <input type="button" class="btn btn-success" onclick='preregisteration()' value="Register Student">
                                </div>
                            </div>
                            <div id="attachstudent" style="display:none">
                                <div style="font-size:30px; color:#000; font-family:raleway">Attach enrolled student</div><br/>
                                <div class="form-group">
                                    <label>Student ID</label>
                                    <input type="text" class="form-control" placeholder="studentID" id="attachstudentID">
                                    <br/>
                                    <input type="checkbox" value="yes" style="margin-right:5px;" id="solemnswear"><span style="font-family:verdana; font-size:13px;">I am a legal parent or guardian of the student I am trying to add.</span><br/>
                                    <a style="margin-top:10px; border-radius:2px; text-decoration:none; color:#fff; cursor:pointer; padding:10px;" class="btn btn-success" onclick="attachstudents('<?php echo $parentID ?>')">Attach student</a>
                                </div>
                            </div>
                            <div id="viewstudent" style="display:none">
                                <div style="font-size:30px; color:#000; font-family:raleway; position:relative">
                                    View Students
                                    <div style='position:absolute; font-size:12px; top:35px; left:5px; font-weight:bold' id="statistics"></div>
                                </div><br/>
                                <div style="margin-top:10px">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  style="font-weight:bold; color:#CD277D; font-size:16px; padding:0px">
                                        <label>Student Name</label>
                                        <select id="registeredstudentsID" style="display:none">

                                        </select>
                                        <select id="registeredstudents" class="form-control" onchange='getID(this.selectedIndex)'>

                                        </select>
                                        <div style="border-radius:2px; margin-top:5px; width:100%; text-decoration:none; color:#fff; cursor:pointer;" class="btn btn-success" onclick="loadstudentinfo()">View</div>
                                    </div>
                                    
                                </div>
                                <div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:40px; padding:0px; font-size:14px" id="studentinfotable">

                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                    Assignments
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse">
                                            <div class="panel-body" style="background-color:#33B0ED !important">
                                                <div id="assignedhw"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                                    Fees Transaction
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse">
                                            <div class="panel-body" style="background-color:#33B0ED !important">
                                                <label>Term</label>
                                                <select class="form-control" style="display:inline; max-width:200px" id="csfT">
                                                    <option>First Term</option>
                                                    <option>Second Term</option>
                                                    <option>Third Term</option>
                                                </select>
                                                <label>Session</label>
                                                <select class="form-control" style="display:inline; max-width:200px" id="csfS">
                                                    <?php
                                                    $year = date("Y")+1;
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
                                                <span class="btn btn-warning" onclick="payhist(registeredstudents.value)">Get Payment timeline</span>
                                                <hr style="margin:5px; padding:5px">
                                                <div style="max-height: 300px; overflow-y: auto" id="mycresult">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                    Result Checker
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse">
                                            <div class="panel-body" style="background-color:#33B0ED !important">
                                                <label>Term</label>
                                                <select class="form-control" id='stdterm' style="display:inline; max-width:200px">
                                                    <option>First Term</option>
                                                    <option>Second Term</option>
                                                    <option>Third Term</option>
                                                </select>
                                                <label>Session</label>
                                                <select class="form-control" id='stdsession' style="display:inline; max-width:200px">
                                                    <?php
                                                    $year = date("Y")+1;
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
                                                <span class="btn btn-warning" onclick='getresultpp()'>Get result</span>
                                            </div>
                                                <script>
                                                function getresultpp(){
                                                    var session = document.getElementById("stdsession").value;
                                                    var term = document.getElementById("stdterm").value;
                                                    var stdid = document.getElementById("registeredstudents").value;
                                                    //alert(session + " " + term + " " + stdid);
                                                    getobtainables(stdid, "cdcddttt", term, session,'midterm');
                                                }

                                                function getobtainables(studentid,placement, term, session, resulttype){
                                                    //alert(studentid + " " + placement + " " + term + " " + session + " " + resulttype);
                                                    var studentid = studentid;
                                                    //var placeholder = placement;
                                                    $.post("PHP/cummscores.php",{action:'getcumm', stdid:studentid, term:term, session:session, resulttype:resulttype}).done(function(data){
                                                    document.getElementById(placement).innerHTML = data;
                                                     //alert(data);
                                                    });
                                                }
                                                </script>
                                            <center>
                                            <table style='margin-top:10px; min-width:80%; font-size:12px; text-align:center' border='2'>
                                                                            <tr><td></td><td style='padding:2px'>TERM SCORE</td><td style='padding:2px'>CUMM. AVERAGE</td></tr>
                                                                            <tbody id='cdcddttt'>
                                                                                
                                                                            </tbody>
                                                                        </table></center>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                                    Comments
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse5" class="panel-collapse collapse">
                                            <div class="panel-body" style="background-color:#33B0ED !important">
                                                <label>Term</label>
                                                <select class="form-control" id='ddterm' style="display:inline; max-width:200px">
                                                    <option>First Term</option>
                                                    <option>Second Term</option>
                                                    <option>Third Term</option>
                                                </select>
                                                <label>Session</label>
                                                <select class="form-control" id='ddsession' style="display:inline; max-width:200px">
                                                    <?php
                                                    $year = date("Y")+1;
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
                                                <script>
                                                function pullcomments(term,session, stdid){
                                                    $.post("PHP/getcomments.php",{term:term, session:session, stdid:stdid}){
                                                        _v("parcommstd").innerHTML = data;
                                                    }
                                                }
                                                </script>
                                                <span class="btn btn-warning" onclick="pullcomments(ddterm.value, ddsession.value, registeredstudents.value)">Get Comments</span>
                                                <div style='padding:5px; margin-top:10px' id='parcommstd'>
                                                This is where the comments will be placed.
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                            </div>

                            <div id="messageme" style="display:none">
                            
                                <div style="font-size:30px; color:#000; font-family:raleway">Direct Message</div><br/>
                                <div class="form-group">
                                    <label>Message who?</label><br/>
                                    <select class="form-control" id='schoolAdminMessage'>
                                        <option>School Administrator</option>
                                    </select>
                                    <textarea style="resize: none; margin-top:10px" class="form-control" id='schoolAdminContent'></textarea>
                                    <a style="margin-top:10px; border-radius:2px; text-decoration:none; color:#fff; cursor:pointer; padding:10px;" class="btn btn-success" onclick="sendMessage()">Send Message</a>
                                </div>
                            </div>

                            <div id="resultme" style="display:none">
                                <div style="font-size:30px; color:#000; font-family:raleway">Check Result</div><br/>
                                <div class="form-group">
                                    <label>Result</label><br/>
                                    <select id="registeredstudentsIDre" style="display:none">

                                    </select>
                                    <select id="registeredstudentsre" class="form-control" onchange='getID(this.selectedIndex)'>

                                    </select>
                                    <a style="margin-top:10px; border-radius:2px; text-decoration:none; color:#fff; cursor:pointer; padding:10px;" class="btn btn-success" onclick="checkresult()">Check Result</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="accountmenucontent" style="display:none">
                    <div class="col-lg-3" style="font-size:17px; padding:10px; padding-left:0px; padding-right:0px; background-color:rgba(0,0,0,0.8)">
                        <div class="portalProfile activeportal">Update Profile</div>
                    </div>

                    <div class="col-lg-9" style="background-color:rgba(255,255,255,0.4); min-height:210px; padding:20px; border-radius:4px; position:relative">
                        <table class="table table-condensed table-responsive">
                            <tr><td>Names</td><td><input type="text" class="form-control" id="parentnames" value="<?php echo $parentName; ?>"></td></tr>

                            <tr><td>Phone Number</td><td><input type="text" class="form-control" id="parentphonenumber" value="<?php echo $phonenumber; ?>"></td></tr>
                            <tr><td>Email Address</td><td><input type="text" class="form-control" id="parentemailaddress" value="<?php echo $email; ?>" disabled title="Cannot modify verified email"></td></tr>
                            <tr><td>Email Notifications?</td><td><select class="form-control" id='emailparentnotification'><option>Yes please</option><option>No thanks</option></select></td></tr>
                            <tr><td>News letters</td><td><select class="form-control" id='newslettermailing'><option>Yes please</option><option>No thanks</option></select></td></tr>
                            <tr><td colspan="2"><div class="btn btn-success" style="width:100%" onclick="updateparentprofile()">Update Profile</div></td></tr>
                        </table>
                        <script>

                            document.getElementById("emailparentnotification").selectedIndex = <?php echo $_SESSION['emailsubscription'] ?>;
                            document.getElementById("newslettermailing").selectedIndex = <?php echo $_SESSION['newsletters']; ?>
                        </script>
                        <div style='margin-bottom:20px'><span class="btn btn-primary" onclick="loadattachedstudents(<?php echo "'" . $_SESSION['ParentID'] . "'"; ?>)"><i class='fa fa-users' style='margin-right:5px'></i>Load attached students</span></div>
                        <div>
                            <table class='table table-condensed table-hover table-responsive' id='loadattachedstudents'></table>
                            <!--<span data-toggle="modal" data-target=".bs-example-modal-sm" style="background-color:#F4BE04; cursor:pointer; color:#003955; padding:10px">Message Us</span>-->
                            <div class="modal fade bs-example-modal-sm" id="suggestion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                                <div class="modal-dialog modal-sm" role="document" style='font-face:verdana; font-size:12px'>
                                    <div class="modal-content">
                                        <div class="modal-header" style='background-color:#E8EEF4'>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h6><center><b>Message <br/><span id='teachername' style="font-weight:normal"></span></b></center></h6>
                                        </div>
                                        <div class="modal-body" style='background-color: #EFF8EF'>
                                            <div class="form-group">
                                                <span style="">
                                                    <label style="margin-top:20px">Email Address</label>
                                                    <input type="text" class="form-control" id="teacheremail" disabled="disabled">
                                                </span>
                                                <label style="margin-top:20px">Subject</label>
                                                <input type="text" class="form-control" id="parentsubject">
                                                <label style="margin-top:20px">Message</label>
                                                <textarea class="form-control" style="resize:none" id="parentmessage"></textarea>
                                                <input type="checkbox" value="robot" id="eminiS" hidden>
                                                <div class="btn btn-success" onclick="sendTeacherMail()" style="margin-top:20px; width:100%;"><i class="fa fa-envelope-o" style="margin-right:5px"></i> Send message </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" style='background-color:#E8EEF4'>
                                            <div id="serverSResponse" style="text-align: center"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="messageboardmenucontent" style="display:none">
                    <div class="col-lg-2" style="font-size:17px; padding:10px; padding-left:0px; padding-right:0px; background-color:rgba(0,0,0,0.8)">
                        <div class=" col-lg-12 messages" onclick="getnl()" id="newslettersmsg">Newsletter(s)</div>
                    </div>
                    <div class="col-lg-10" style="font-size:17px; padding:10px; padding-left:0px; padding-right:0px; min-height: 240px; background-color:rgba(255,255,255,0.4)">
                        <div id='newslettermessage' class='col-lg-12 col-md-12' style='display:none'>
                            <div class="col-lg-5" style='padding-right:0px; margin-bottom: 20px'>
                                <div style="font-family:raleway; font-size:15px; font-weight:bold; border-bottom-style:solid; border-bottom-width:thin; border-color:#C1D7E1; padding:10px; padding-left:0px; margin-bottom:20px">
                                    Received Newsletters
                                </div>
                                <div style="background-color:rgba(255,255,255,0.2); min-height:50px; padding:10px;">
                                    <table class="table table-condensed table-striped table-hover" style=" font-size:14px" id="sentNewsletters">

                                    </table> 
                                </div>
                            </div>
                            <div class="col-lg-7" style='padding-right:0px'>
                                <!-- Send message -->
                                <div style="padding:20px; padding-top:20px; margin-bottom:20px; min-height:300px; border-radius:2px; background-color:rgba(255,255,255,0.2)" id="nlContent">

                                </div>
                            </div>

                        </div>
                        <div id='messages' class='col-lg-12 col-md-12'>
                            <div class="col-lg-4" id="messageheader" style="padding-right:2px; border-right-style:dotted; border-right-width: thin; border-right-color:#fff">
                                <div style="max-height:200px; overflow-y:auto">
                                    <table class="table table-condensed" style="font-size:13px; border:none" id="msgprecursor"> 
                                        <tr style="cursor:pointer"><td class="message"><b>Mr. Gbadebo</b><br/><font style="font-size:10px; font-family:Montserrat">1st June 2015</font></td></tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-8" id="messagecontent">
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

                <div id='schoolEvent' style='display:none'>
                    <div class='col-lg-7 col-md-12 col-sm-12 col-xs-12' style='padding-left:0px; margin-bottom:30px;'>
                        <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:20px">
                            School Events
                        </div>
                        <div id="shownevents">

                        </div>
                    </div>
                    <div class='col-lg-5 col-md-12 col-sm-12 col-xs-12' style="padding-left:0px">
                        <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:20px">
                            Term Calendar
                        </div>
                        <div style="background-color:rgba(255,255,255,0.2);padding:10px; border-radius:4px">
                            <table border="0" cellpadding="0" class='table table-responsive table-condensed table-striped' style='font-size:13px; font-family: verdana' id="ratifiedtimetable">

                            </table>    
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script src="../JS/pageArrangement.js" type="text/javascript"></script>
        <script src="JS/ParentPortal.js" type="text/javascript"></script>
    </body>
</html>
