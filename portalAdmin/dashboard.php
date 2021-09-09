<?php
include 'PHP/databaseSQLconnectn.php';
include 'PHP/validateinput.php';

$propname = "<b>Mrs. A. V. Ibiyemi</b>";

session_start();
error_reporting(0);

$role = $_SESSION['Role'];
if ($role === "Teacher") {
    header('location:PortalTeachers.php');
} elseif ($role === "Admin") {
    
} elseif ($role === "Bursar") {
    header('location:schoolbursar.php');
} else {
    header('location:index.php');
}
?>
<script>
    function checkrtype(a) {
        //alert(a);
        if (a === "midterm") {
            $('#nurtattendance').hide();
        } else {
            $('#nurtattendance').show();
        }
    }
</script>
<html>
    <head>

        <title><?php echo $schoolname ?> Parent Administrator</title>
        <style>
            body{
                font-family:verdana;
            }
            .addtinfo{
                font-size:25px;
                margin-bottom:10px;
            }
            .addpat{
                background-color:rgba(255,255,255,0.4);
                padding:5px;
                font-size:11px;
                cursor:pointer;
                font-family:raleway
            }
            .addpat:hover{
                color:rgba(255,255,255,0.8);
                background-color:#5E6568;
            }
            .addpatsel{
                color:rgba(255,255,255,0.8);
                background-color:#5E6568;
            }
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
        <link href="CSS/hcs.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="clearfix">
            <div class="pull-left menuitems" style="width:100px; background-color:#009CE8; min-height:100%; position:fixed; overflow-x: hidden; background-image: url('../images/background.jpg'); z-index:1000">
                <img src='../images/schoollogo.png' width='80' style='position:absolute; top:10px; left:10px; z-index:50'>
                <div class="fa fa-university activemenu menustyling" id="hme" style="margin-top:80px" onClick="menuitems('#home', '#hme')">
                    <span class="dashmenu">Home</span>
                </div><br/>
                <div class="fa fa-graduation-cap menustyling" id="aclass" onClick="menuitems('#clazz', '#aclass')">
                    <span class="dashmenu">Class</span>
                </div><br/>
                <div class="fa fa-newspaper-o menustyling" id="nwsltters" onClick="menuitems('#newsletters', '#nwsltters')">
                    <span class="dashmenu">Newsletter</span>
                </div><br/>
                <div class="fa fa-users menustyling" id="prnts"  onclick="menuitems('#parents', '#prnts')">
                    <span class="dashmenu">Parents</span>
                </div><br/>
                <div class="fa fa-graduation-cap menustyling" id="stdnts" onClick="menuitems('#students', '#stdnts')">
                    <span class="dashmenu">Students</span>
                </div><br/>
                <div class="fa fa-pied-piper-alt menustyling" id="teachrs" onClick="menuitems('#teachers', '#teachrs')">
                    <span class="dashmenu">Staff</span>
                </div><br/>
                <div class="fa fa-database menustyling" id="evnt" onClick="menuitems('#event', '#evnt')">
                    <span class="dashmenu">Events</span>
                </div><br/>
                <div class="fa fa-signal menustyling" id="grades" onClick="menuitems('#grade', '#grades')">
                    <span class="dashmenu">Results</span>
                </div><br/>
                <div class="fa fa-signal menustyling" id="asset" onClick="menuitems('#assets', '#asset')">
                    <span class="dashmenu">Assets</span>
                </div><br/>
            </div>
            <div class="pull-right" style="width:calc(100% - 100px); background-color:#D0E0E8; min-height:100%">
                <div class="clearfix" style="height:50px; background-color:#005E8A; border-bottom-style: solid; border-bottom-width:thin; border-bottom-color:#000; box-shadow:0px 0px 1px #000">
                    <span class='pull-right' style="color:#fff; padding:10px; padding-top:12px; margin-right:20px; cursor:pointer">
                        <a href="logout.php"><i class="fa fa-power-off" style='font-size:20px; position:relative; color:#FFB3B3; text-shadow: 0px 1px 1px #000' title='Log out'></i>  </a>
                    </span>
                    <span class='pull-right' style="color:#fff; padding:10px; margin-right:20px; cursor:pointer">
                        <i class="fa fa-envelope" style='font-size:20px; position:relative' title='messages' onClick="menuitems('#messages', '#msg')">
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
                        <i class="fa fa-list-alt" style='font-size:20px; position:relative' title='preregistered Students' onClick="menuitems('#preregs', '#preregs')">
                        </i>
                    </span>
                </div>
                <div style="height:30px; color:#E3EDF2; font-size:12px; padding:7px; background-image: url('../images/background.jpg'); margin-bottom:20px; box-shadow:0px 0px 1px #000">
                    <div id="subMenu"></div>
                </div>
                <div style='margin:10px'>
                    <div class='row' style='margin:0px; display: none' id="assets">
                        <div class='col-md-3' style='background-color:rgba(0,0,0,0.1); min-height:250px; padding-top:10px'>
                            Add Asset Category<hr style='border-style:dashed; margin-top:5px'>
                            <label>Asset</label>
                            <input type='text' class='form-control' id='assname'>
                            <input type='button' class='btn btn-success' value='Add asset Category' onclick='addasscat(assname.value)' style='margin-top:5px; margin-bottom:10px; width:100%'>
                            <?php
                            $bt = "select * from assetcategory";
                            $ht = mysqli_query($w, $bt);
                            $hts = "<table class='table table-bordered'><tr style='font-size:13px; background-color:rgba(0,0,0,0.2)'><td></td><td>Asset Category</td></tr>";
                            $count = 1;
                            while ($aq = mysqli_fetch_array($ht)) {
                                $assetcat = $aq['assetcategory'];
                                $hts .= "<tr style='font-size:12px'><td>$count</td><td>$assetcat</td></tr>";
                            }
                            echo $hts . "</table>";
                            ?>
                        </div>
                        <div class='col-md-4' style='min-height:150px; padding-top:0px'>
                            <div style='background-color:rgba(0,0,0,0.1); min-height:100px; padding:5px'>
                                Add Asset<hr style='border-style:dashed; margin-top:5px'>
                                <label>Asset name</label>
                                <input type='text' class='form-control' id='assnamed'>
                                <label>Asset category</label>
                                <select class='form-control' id='asscated'>
                                    <?php
                                    $bt = "select * from assetcategory";
                                    $ht = mysqli_query($w, $bt);
                                    while ($jt = mysqli_fetch_array($ht)) {
                                        $assetcat = $jt['assetcategory'];
                                        $id = $jt['id'];
                                        echo "<option value='$id'>$assetcat</option>";
                                    }
                                    ?>
                                </select>
                                <label>Quantity</label>
                                <input type='text' class='form-control'  id='assqtyd'>
                                <input type='button' class='btn btn-success' value='Add asset' style='margin-top:10px' onclick='addasset()'>
                            </div>
                        </div>
                        <div class='col-md-5' style='background-color:rgba(0,0,0,0.1)'>
                            <div style='margin-bottom:30px'></div>
                            <b>ASSET CATEGORIES</b>
                            <table class='table table-condensed table-bordered' style='margin-bottom:20px; margin-top:20px'>
                                <tr style='font-weight:bold; font-size:14px'><td></td><td>Asset Category</td><td></td></tr>
                                <?php
                                $gx = "select * from assetcategory";
                                $jt = mysqli_query($w, $gx);
                                $count = 1;
                                while ($aq = mysqli_fetch_array($jt)) {
                                    $assid = $aq['id'];
                                    $assetcategory = $aq['assetcategory'];
                                    $assetname = pullasscatname($assetcategory);
                                    echo "<tr style='font-size:13px'><td>$count</td><td>$assetname</td><td><span class='btn btn-warning' onclick='deleteassetcat(\"$assid\")'>Delete category</span></td></tr>";
                                    $count++;
                                }
                                ?>
                            </table>
                            <b>ASSETS</b>
                            <table class='table table-bordered' style='font-size:13px; margin-top:20px'>
                                <tr style='font-weight:bold'><td></td><td>Asset</td><td>Asset Category</td><td>Quantity</td><td></td></tr>
                                <?php
                                $gx = "select * from assetitems";
                                $jt = mysqli_query($w, $gx);
                                $count = 1;
                                while ($aq = mysqli_fetch_array($jt)) {
                                    $assid = $aq['id'];
                                    $assname = $aq['assetname'];
                                    $assetcategory = $aq['assetcategory'];
                                    $assetname = pullassname($assetcategory);
                                    $quantity = $aq['quantity'];
                                    echo "<tr><td>$count</td><td>$assname</td><td>$assetname</td><td>$quantity</td><td><span class='btn btn-warning' onclick='deleteasset(\"$assid\")'>Delete</span></td></tr>";
                                    $count++;
                                }
                                ?>
                            </table>
                            <script>
                                function deleteasset(a) {
                                    $.post("PHP/billprocessor.php", {action: 'deleteasset', assetid: a}).done(function (data) {
                                        alert(data);
                                    });
                                }

                                function deleteassetcat(a) {
                                    $.post("PHP/billprocessor.php", {action: 'deleteassetcat', assetid: a}).done(function (data) {
                                        alert(data);
                                    });
                                }
                            </script>
                        </div>
                        <?php

                        function pullasscatname($q) {
                            global $w;
                            return $q;
                            $z = mysqli_query($w, "select assetcategory from assetcategory where id='$d'");
                            $ht = mysqli_fetch_array($z);
                            $cat = $ht['assetcategory'];
                            return $cat;
                        }

                        function pullassname($d) {
                            global $w;
                            $z = mysqli_query($w, "select assetcategory from assetcategory where id='$d'");
                            $ht = mysqli_fetch_array($z);
                            $cat = $ht['assetcategory'];
                            return $cat;
                        }
                        ?>
                        <script>

                            function addasset() {
                                var assetname = document.getElementById("assnamed").value;
                                var assetcategory = document.getElementById("asscated").value;
                                var assetqty = document.getElementById("assqtyd").value;

                                $.post("PHP/billprocessor.php", {action: "addasset", assetname: assetname, assetcat: assetcategory, assetqty: assetqty}).done(function (data) {
                                    alert(data);
                                });
                            }

                            function addasscat(a) {
                                $.post("PHP/billprocessor.php", {action: "addasscat", value: a}).done(function (data) {
                                    alert(data);
                                });
                            }
                        </script>
                    </div>
                    <div class='row' style='margin:0px; display:none' id="grade">
                        <div id='jsmenupage' style='display:none'>
                            <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                                J.S.S
                                <div class='col-md-12' style='padding:0px; font-size:12px'>
                                    <!-- Select Student -->
                                    <div class='col-md-4' style='background-color:rgba(255,255,255,0.1); padding:10px'>
                                        <label>Result type</label>
                                        <select class="form-control" style='margin-bottom:10px' id='ressssrt' onchange='checkresgradert(this.value)'>
                                            <option>--Select--</option>
                                            <option value='midterm'>Mid-Term Result</option>
                                            <option value='terminal'>Terminal Result</option>
                                        </select>
                                        <label>Class</label>
                                        <select class='form-control' style='margin-bottom:10px' onchange='resjssc(this.value, "ressssn")' id='ressssc'>
                                            <option>--Select--</option>
                                            <?php
                                            $j = mysqli_query($w, "select * from schclass where schooltype='5' order by ClassName asc");
                                            while ($qw = mysqli_fetch_array($j)) {
                                                $classname = $qw['ClassName'];
                                                $sn = $qw['SN'];
                                                echo "<option value='$sn'>$classname</option>";
                                            }
                                            ?>
                                        </select>
                                        <label>Student's Name</label>
                                        <select class='form-control' style='margin-bottom:10px' id='ressssn'>
                                            <option>--Select Student name--</option>
                                        </select>
                                        <span class='col-md-6' style='padding:0px'>
                                            <label>Session</label>
                                            <select class='form-control' id='resssss'>
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
                                        </span>
                                        <span class='col-md-6' style='padding:0px'>
                                            <label>Term</label>
                                            <select id="resssst" class="form-control" style='margin-bottom:10px'>
                                                <option>1st Term</option>
                                                <option>2nd Term</option>
                                                <option>3rd Term</option>
                                            </select>
                                        </span>
                                        <input type='checkbox' value='reccheck' id='gdcheck'>
                                        <label>School Identification (Legacy records)</label>
                                        <input type='textbox' class='form-control' style='margin-bottom:10px' placeholder='e.g PG6352' id='gdschid'>
                                        <input type='button' value='Get result' style='margin-top:10px' class='btn btn-success' onclick='getresjss()'>
                                        <input type='button' value='Save result' style='margin-top:10px' class='btn btn-warning' onclick="savereportcard('gradReslt', 'resgradec', 'resgradert', 'resgradesn', 'resgrades', 'resgadet')">
                                    </div>
                                    <div class='col-md-8' style='background-color:rgba(255,255,255,0.1); padding:5px; text-align:center'>
                                        <div style='text-align:left; text-align:center'>
                                            <span style='cursor:pointer; padding:5px;' class='btn btn-danger' onClick="printDiv('gradReslt')"><i class='fa fa-book'></i> - Print report</span>
                                        </div>
                                        <center>
                                            <div style="padding:5px;" id="gradReslt">
                                                <table style="background-color:#fff; border-style:solid; border-width:3px; border-color:#000; padding:0px; font-size:12px; position:relative; min-width:800px;" border='5'>
                                                    <img src="../images/schoollogores.png" style='position:absolute; top:30%; z-index:200; left:0; right:0; margin-right:auto; margin-left:auto'>
                                                    <thead>
                                                        <tr>
                                                            <td style='text-align:center;position:relative; padding:10px'><span style='font-weight:bold; font-size:28px'><img src='../images/schoollogo.png' style='position:absolute; left:5px; top:10px; width:100px; font-size:45px'>Havard High School</span><br><div>Great Learning, Great Fun!</div>
                                                                <div>Plot 10 & 12 Taiwo Oguns Street, KM 32 Along Lagos-Ibadan Express Way, Arepo, Ogun State.</div>
                                                                <div>Tel: 0803 569 6773, 0809 601 1244, E-mail: info@havardcs.com, Website: www.havardcs.com</div>
                                                                <div style='text-align: center; margin-top:20px; font-weight:600; font-size:16px'><span style='background-color:rgba(0,0,0,0.2) !important; padding:3px' id='gdleveltype'>TERMINAL/YEARLY REPORT</span></div>
                                                                <div style='text-align: center; margin-top:20px; font-weight:800; font-size:16px'></div>
                                                                <span style='position:absolute; right:10px; top:10px; display:inline-block; border-style:solid; width:130px; height:130px' id="jsspphoto"></span>
                                                                <table border='1' style='width:100%; font-size:14px; margin-top:10px'>
                                                                    <tr>
                                                                        <td class='pad2'>I.D Number : <span id='idnumberntjs' style='font-weight:bold'></span></td><td colspan='2' class='pad2'>Student's Name : <span id='stdnamentjs' style='font-weight:bold'></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='pad2'>Term : <span id='termntjs' style='font-weight:bold'></span></td><td class='pad2'>No. in a Class : <span id='classnumntjs' style='font-weight:bold'></span></td><td class='pad2'>Class Name : <span id='classnamentjs' style='font-weight:bold'></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='pad2'>Academic Year : <span id='acayearntjs'style='font-weight:bold'></span></td><td colspan="2" class='pad2'>Teacher's name : <span id='teachnamentjs' style='font-weight:bold'></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3" class='pad2'>Proprietress' name :  <?php echo $propname ?><span id='propnamentjs' style='font-weight:bold'></span></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    <script>
                                                        function checkresgradert(a) {
                                                            if (a === "midterm") {
                                                                $("#gdlevelattendance").hide();
                                                                document.getElementById("gdleveltype").innerHTML = "MIDTERM REPORT";
                                                            } else {
                                                                $("#gdlevelattendance").show();
                                                                document.getElementById("gdleveltype").innerHTML = "TERMINAL/YEARLY REPORT";
                                                            }
                                                        }
                                                    </script>
                                                    <tr>
                                                        <td>
                                                            <table style='font-size:11px; margin-top:10px; font-weight: 500; width:100%'>
                                                                <tr style='padding:10px'>
                                                                    <td style='width:50%; padding:10px'>
                                                                        <span id='gdlevelattendance'>
                                                                            <b style='font-size:20px'>ATTENDANCE</b>
                                                                            <table style='margin-top:10px; width:100%; font-size:12px; text-align:center' border='1'>
                                                                                <tr><td></td><td style='font-weight:bold'>1st Term</td><td style='font-weight:bold'>2nd Term</td><td style='font-weight:bold'>3rd Term</td></tr>
                                                                                <tbody id='attTablegrade'>
                                                                                    <tr><td style='text-align:left'>Days Enrolled</td><td>120</td><td style='text-align:left'></td><td></td></tr>
                                                                                    <tr><td style='text-align:left'>Days Absent</td><td>118</td><td>0</td><td>0</td></tr>
                                                                                    <tr><td style='text-align:left'>Days Present</td><td>118</td><td>0</td><td>0</td></tr>
                                                                                </tbody>

                                                                            </table>
                                                                        </span>
                                                                    </td>
                                                                    <td style='text-align:center; padding:10px'>
                                                                <center>
                                                                    <table style='margin-top:10px; width:100%; font-size:12px; text-align:center' border='2'>
                                                                        <tr><td></td><td style='padding:2px'>TERM SCORE</td><td style='padding:2px'>CUMM. AVERAGE</td></tr>
                                                                        <tbody id='cdcddjss'>

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
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id='ssmenupage' style='display:none'>
                            <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                                S.S.S
                                <div class='col-md-12' style='padding:0px; font-size:12px'>
                                    <!-- Select Student -->
                                    <div class='col-md-4' style='background-color:rgba(255,255,255,0.1); padding:10px'>
                                        <label>Result type</label>
                                        <select class="form-control" style='margin-bottom:10px' id='resjssrt' onchange='checkresjssrt(this.value)'>
                                            <option>--Select--</option>
                                            <option value='midterm'>Mid-Term Result</option>
                                            <option value='terminal'>Terminal Result</option>
                                        </select>
                                        <label>Class</label>
                                        <select class='form-control' style='margin-bottom:10px' onchange='ressssc(this.value, "resjsssn")' id='resjssc'>
                                            <option>--Select--</option>
                                            <?php
                                            $j = mysqli_query($w, "select * from schclass where schooltype='6' order by ClassName asc");
                                            while ($qw = mysqli_fetch_array($j)) {
                                                $classname = $qw['ClassName'];
                                                $sn = $qw['SN'];
                                                echo "<option value='$sn'>$classname</option>";
                                            }
                                            ?>
                                        </select>
                                        <label>Student's Name</label>
                                        <select class='form-control' style='margin-bottom:10px' id='resjsssn'>
                                            <option>--Select Student name--</option>
                                        </select>
                                        <span class='col-md-6' style='padding:0px'>
                                            <label>Session</label>
                                            <select class='form-control' id='resjsss'>
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
                                        </span>
                                        <span class='col-md-6' style='padding:0px'>
                                            <label>Term</label>
                                            <select id="resjsst" class="form-control" style='margin-bottom:10px'>
                                                <option>1st Term</option>
                                                <option>2nd Term</option>
                                                <option>3rd Term</option>
                                            </select>
                                        </span>
                                        <input type='checkbox' value='reccheck' id='gdcheck'>
                                        <label>School Identification (Legacy records)</label>
                                        <input type='textbox' class='form-control' style='margin-bottom:10px' placeholder='e.g PG6352' id='gdschid'>
                                        <input type='button' value='Get result' style='margin-top:10px' class='btn btn-success' onclick='getressss()'>
                                        <input type='button' value='Save result' style='margin-top:10px' class='btn btn-warning' onclick="savereportcard('gradReslt', 'resgradec', 'resgradert', 'resgradesn', 'resgrades', 'resgadet')">
                                    </div>
                                    <div class='col-md-8' style='background-color:rgba(255,255,255,0.1); padding:5px; text-align:center'>
                                        <div style='text-align:left; text-align:center'>
                                            <span style='cursor:pointer; padding:5px;' class='btn btn-danger' onClick="printDiv('jssReslt')"><i class='fa fa-book'></i> - Print report</span>
                                        </div>
                                        <center>
                                            <div style="padding:5px;" id="jssReslt">
                                                <table style="background-color:#fff; border-style:solid; border-width:3px; border-color:#000; padding:0px; font-size:12px; position:relative; min-width:800px;" border='5'>
                                                    <img src="../images/schoollogores.png" style='position:absolute; top:30%; z-index:200; left:0; right:0; margin-right:auto; margin-left:auto'>
                                                    <thead>
                                                        <tr>
                                                            <td style='text-align:center;position:relative; padding:10px'><span style='font-weight:bold; font-size:28px'><img src='../images/schoollogo.png' style='position:absolute; left:5px; top:10px; width:100px; font-size:45px'>Havard High School</span><br><div>Great Learning, Great Fun!</div>
                                                                <div>Plot 10 & 12 Taiwo Oguns Street, KM 32 Along Lagos-Ibadan Express Way, Arepo, Ogun State.</div>
                                                                <div>Tel: 0803 569 6773, 0809 601 1244, E-mail: info@havardcs.com, Website: www.havardcs.com</div>
                                                                <div style='text-align: center; margin-top:20px; font-weight:600; font-size:16px'><span style='background-color:rgba(0,0,0,0.2) !important; padding:3px' id='gdleveltypesss'>TERMINAL/YEARLY REPORT</span></div>
                                                                <div style='text-align: center; margin-top:20px; font-weight:800; font-size:16px'></div>
                                                                <span style='position:absolute; right:10px; top:10px; display:inline-block; border-style:solid; width:130px; height:130px' id="ssspphoto"></span>
                                                                <table border='1' style='width:100%; font-size:14px; margin-top:10px'>
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
                                                                        <td colspan="3" class='pad2'>Proprietress' name :  <?php echo $propname ?><span id='propnamentss' style='font-weight:bold'></span></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    <script>
                                                        function checkresgradert(a) {
                                                            if (a === "midterm") {
                                                                $("#gdlevelattendance").hide();
                                                                document.getElementById("gdleveltype").innerHTML = "MIDTERM REPORT";
                                                            } else {
                                                                $("#gdlevelattendance").show();
                                                                document.getElementById("gdleveltype").innerHTML = "TERMINAL/YEARLY REPORT";
                                                            }
                                                        }
                                                        function checkresjssrt(a) {
                                                            if (a === "midterm") {
                                                                $("#jslevelattendance").hide();
                                                                document.getElementById("jsleveltype").innerHTML = "MIDTERM REPORT";
                                                            } else {
                                                                $("#jslevelattendance").show();
                                                                document.getElementById("jsleveltype").innerHTML = "TERMINAL/YEARLY REPORT";
                                                            }
                                                        }
                                                    </script>
                                                    <tr>
                                                        <td>
                                                            <table style='font-size:11px; margin-top:10px; font-weight: 500; width:100%'>
                                                                <tr style='padding:10px'>
                                                                    <td style='width:50%; padding:10px'>
                                                                        <span id='gdlevelattendancesss'>
                                                                            <b style='font-size:20px'>ATTENDANCE</b>
                                                                            <table style='margin-top:10px; width:100%; font-size:12px; text-align:center' border='1'>
                                                                                <tr><td></td><td style='font-weight:bold'>1st Term</td><td style='font-weight:bold'>2nd Term</td><td style='font-weight:bold'>3rd Term</td></tr>
                                                                                <tbody id='attTablejss'>
                                                                                    <tr><td style='text-align:left'>Days Enrolled</td><td>120</td><td style='text-align:left'></td><td></td></tr>
                                                                                    <tr><td style='text-align:left'>Days Absent</td><td>118</td><td>0</td><td>0</td></tr>
                                                                                    <tr><td style='text-align:left'>Days Present</td><td>118</td><td>0</td><td>0</td></tr>
                                                                                </tbody>

                                                                            </table>
                                                                        </span>
                                                                    </td>
                                                                    <td style='text-align:center; padding:10px'>
                                                                <center>
                                                                    <table style='margin-top:10px; width:100%; font-size:12px; text-align:center' border='2'>
                                                                        <tr><td></td><td style='padding:2px'>TERM SCORE</td><td style='padding:2px'>CUMM. AVERAGE</td></tr>
                                                                        <tbody id='cdcddjs'>

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
                                            </div>
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
                                        <select class="form-control" style='margin-bottom:10px' id='resgradert' onchange='checkresgradert(this.value)'>
                                            <option>--Select--</option>
                                            <option value='midterm'>Mid-Term Result</option>
                                            <option value='terminal'>Terminal Result</option>
                                        </select>
                                        <label>Class</label>
                                        <select class='form-control' style='margin-bottom:10px' onchange='resgradec(this.value, "resgradesn")' id='resgradec'>
                                            <option>--Select--</option>
                                            <?php
                                            $j = mysqli_query($w, "select * from schclass where schooltype='4' order by ClassName asc");
                                            while ($qw = mysqli_fetch_array($j)) {
                                                $classname = $qw['ClassName'];
                                                $sn = $qw['SN'];
                                                echo "<option value='$sn'>$classname</option>";
                                            }
                                            ?>
                                        </select>
                                        <label>Student's Name</label>
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
                                                    //$d++;
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
                                        <input type='checkbox' value='reccheck' id='gdcheck'>
                                        <label>School Identification (Legacy records)</label>
                                        <input type='textbox' class='form-control' style='margin-bottom:10px' placeholder='e.g PG6352' id='gdschid'>
                                        <input type='button' value='Get result' style='margin-top:10px' class='btn btn-success' onclick='getresgrade()'>
                                        <input type='button' value='Save result' style='margin-top:10px' class='btn btn-warning' onclick="savereportcard('gradReslt', 'resgradec', 'resgradert', 'resgradesn', 'resgrades', 'resgadet')">
                                    </div>
                                    <div class='col-md-8' style='background-color:rgba(255,255,255,0.1); padding:5px; text-align:center'>
                                        <div style='text-align:left; text-align:center'>
                                            <span style='cursor:pointer; padding:5px;' class='btn btn-danger' onClick="printDiv('gradReslt')"><i class='fa fa-book'></i> - Print report</span>
                                        </div>
                                        <center>
                                            <div style="padding:5px;" id="gradReslt">
                                                <table style="background-color:#fff; border-style:solid; border-width:3px; border-color:#000; padding:0px; font-size:12px; position:relative; min-width:800px;" border='5'>
                                                    <img src="../images/schoollogores.png" style='position:absolute; top:30%; z-index:200; left:0; right:0; margin-right:auto; margin-left:auto'>
                                                    <thead>
                                                        <tr>
                                                            <td style='text-align:center;position:relative; padding:10px'><span style='font-weight:bold; font-size:28px'><img src='../images/schoollogo.png' style='position:absolute; left:5px; top:10px; width:100px; font-size:45px'>Havard High School</span><br><div>Great Learning, Great Fun!</div>
                                                                <div>Plot 10 & 12 Taiwo Oguns Street, KM 32 Along Lagos-Ibadan Express Way, Arepo, Ogun State.</div>
                                                                <div>Tel: 0803 569 6773, 0809 601 1244, E-mail: info@havardcs.com, Website: www.havardcs.com</div>
                                                                <div style='text-align: center; margin-top:20px; font-weight:600; font-size:16px'><span style='background-color:rgba(0,0,0,0.2) !important; padding:3px' id='gdleveltype'>TERMINAL/YEARLY REPORT</span></div>
                                                                <div style='text-align: center; margin-top:20px; font-weight:800; font-size:16px'></div>
                                                                <span style='position:absolute; right:10px; top:10px; display:inline-block; border-style:solid; width:130px; height:130px' id="gppfgots"></span>
                                                                <table border='1' style='width:100%; font-size:14px; margin-top:10px'>
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
                                                                        <td colspan="3" class='pad2'>Proprietress' name :  <?php echo $propname ?><span id='propnamentgd' style='font-weight:bold'></span></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    <script>
                                                        function checkresgradert(a) {
                                                            if (a === "midterm") {
                                                                $("#gdlevelattendance").hide();
                                                                document.getElementById("gdleveltype").innerHTML = "MIDTERM REPORT";
                                                            } else {
                                                                $("#gdlevelattendance").show();
                                                                document.getElementById("gdleveltype").innerHTML = "TERMINAL/YEARLY REPORT";
                                                            }
                                                        }
                                                    </script>
                                                    <tr>
                                                        <td>
                                                            <table style='font-size:11px; margin-top:10px; font-weight: 500; width:100%'>
                                                                <tr style='padding:10px'>
                                                                    <td style='width:50%; padding:10px'>
                                                                        <span id='gdlevelattendance'>
                                                                            <b style='font-size:20px'>ATTENDANCE</b>
                                                                            <table style='margin-top:10px; width:100%; font-size:12px; text-align:center' border='1'>
                                                                                <tr><td></td><td style='font-weight:bold'>1st Term</td><td style='font-weight:bold'>2nd Term</td><td style='font-weight:bold'>3rd Term</td></tr>
                                                                                <tbody id='attTablegrade'>
                                                                                    <tr><td style='text-align:left'>Days Enrolled</td><td>120</td><td style='text-align:left'></td><td></td></tr>
                                                                                    <tr><td style='text-align:left'>Days Absent</td><td>118</td><td>0</td><td>0</td></tr>
                                                                                    <tr><td style='text-align:left'>Days Present</td><td>118</td><td>0</td><td>0</td></tr>
                                                                                </tbody>

                                                                            </table>
                                                                        </span>
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
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class='row' style='margin:0px;' id="home">
                    <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                        Dashboard
                    </div>
                    <div class='col-md-2' style='background-color:rgba(255,255,255,0.2); border-radius:2px; margin-bottom:20px; padding:0px;'>
                        <table class="table table-responsive table-hover" style="font-size:12px">
                            <tr class="point"><td >Parent Count</td><td style="background-color:#C5D9E2;font-weight:bold; text-align:center" id="pc">0</td></tr>
                            <tr class="point"><td >Student Count</td><td style="background-color:#C5D9E2;font-weight:bold; text-align:center" id="sc">0</td></tr>
                            <tr class="point"><td >Teacher Count</td><td style="background-color:#C5D9E2;font-weight:bold; text-align:center" id="tc">0</td></tr>
                            <tr class="point"><td >Assignments</td><td style="background-color:#C5D9E2;font-weight:bold; text-align:center" id="ass">0</td></tr>
                            <tr class="point"><td >Newsletters sent</td><td style="background-color:#C5D9E2;font-weight:bold; text-align:center" id="nls">0</td></tr>
                            <tr class="point"><td >Pre-registered Student</td><td style="background-color:#C5D9E2;font-weight:bold; text-align:center" id="prs">0</td></tr>
                        </table>
                    </div>
                    <div class='col-md-6' style="padding:0px; padding-right:10px; margin-bottom:20px">
                        <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:10px">
                            Events
                        </div>
                        <div id="shownevents">

                        </div>
                    </div>
                    <div class='col-md-4' style="padding:0px;padding-right:10px;">
                        <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:20px">
                            Term Calendar
                        </div>
                        <div style="background-color:rgba(255,255,255,0.2);padding:10px; border-radius:4px">
                            <table border="0" cellpadding="0" class='table table-responsive table-condensed table-striped' style='font-size:13px; font-family: verdana' id="ratifiedtimetable">

                            </table>
                        </div>
                        <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:20px">
                            School resumes
                        </div>
                        <div style="background-color:rgba(255,255,255,0.2);padding:10px; border-radius:4px">
                            <table border="0" cellpadding="0" class='table table-responsive table-condensed table-striped' style='font-size:13px; font-family: verdana'>
                                <label>Term</label>
                                <select class='form-control' style='margin-bottom:10px' id='nxtresumeterm'>
                                    <option>1st Term</option>
                                    <option>2nd Term</option>
                                    <option>3rd Term</option>
                                </select>
                                <label>Session</label>
                                <select class='form-control' style='margin-bottom:10px' id='nxtresumesession'>
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
                                <label>Resumption date</label>
                                <input type='text' style='margin-bottom:10px' class='form-control' placeholder='Next Term Resumption date' id='nxtresumedate'>
                                <input type='button' class='btn btn-warning' value='Save Next Resumption Date' onclick='saveresumption(nxtresumeterm.value, nxtresumesession.value, nxtresumedate.value)'>
                            </table>
                        </div>
                    </div>
                </div>
                <script>
                    function saveresumption(a, b, c) {
                        alert(a + " " + b + " " + c);
                        var term = a;
                        var session = b;
                        var resdate = c;
                        $.post("PHP/nextresumption.php", {term: term, session: session, resdate: resdate}).done(function (data) {
                            alert(data);
                        });
                    }
                </script>
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
                            <span class="btn btn-primary" style="margin-top:10px" onClick="sendNewsletters()"><i class="fa fa-envelope-o" style="margin-right:10px"></i>Mail Newsletter</span>
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
                                    <h6><center><b>Attached Student<br/><span id='teachername' style="font-weight:normal"></span></b></center></h6>
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
                                <input class="form-control" placeholder="Class Name" id="ClassNames" style='margin-bottom:10px'>
                                <label>Class Type</label>
                                <select class='form-control' id='classtype'>
                                    <?php
                                    $qw = "select * from schooltypes";
                                    $aq = mysqli_query($w, $qw);
                                    while ($lo = mysqli_fetch_array($aq)) {
                                        $typeid = $lo['typeid'];
                                        $type = $lo['typename'];
                                        echo "<option value='$typeid'>$type</option>";
                                    }
                                    ?>
                                </select>
                                <div style="margin-top:10px; width:100%" class="btn btn-success" onClick="createClass()">Create Class</div>
                                <div id="classnid" style="margin-top:10px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-left:0px; padding-right:5px; margin-bottom:20px">
                        <div style="font-family:raleway; font-size:15px; font-weight:bold; border-bottom-style:solid; border-bottom-width:thin; border-color:#C1D7E1; padding:10px; padding-left:0px; margin-bottom:20px">
                            <span onClick="getclasses()" style="padding:10px; font-size:20px; cursor:pointer" title="Refresh Class list" class="fa fa-refresh"></span> Classes ( <?php
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
                            <select class="form-control" onChange="classReID.selectedIndex = this.selectedIndex" id="classRe">
                                <?php
                                $d = mysqli_query($w, "select * from schstaff");
                                while ($f = mysqli_fetch_array($d)) {
                                    echo "<option>" . $f['StaffName'] . "</option>";
                                }
                                ?>
                            </select>
                            <select class="form-control" id="classReID" onChange="classRe.selectedIndex = this.selectedIndex" style="display:none">
                                <?php
                                $h = mysqli_query($w, "select * from schstaff");
                                while ($f = mysqli_fetch_array($h)) {
                                    echo "<option>" . $f['StaffID'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="btn btn-success" style="margin-top:10px" onClick="updateClass()">Update Class</div>
                        </div>
                    </div>
                    <!-- Modal form for list and emailing -->
                    <div class="modal fade bs-example-modal-sm" id="suggestion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                        <div class="modal-dialog modal-sm" role="document" style='font-face:verdana; font-size:12px'>
                            <div class="modal-content">
                                <div class="modal-header" style='background-color:#E8EEF4'>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h6><center><b>Attached Student<br/><span id='teachername' style="font-weight:normal"></span></b></center></h6>
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
                        Pre-Registered Student
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
                    <div class="col-md-12" style="min-height:200px;">
                        <!--
                        <div class="col-lg-3" style="font-size:17px; padding:10px; padding-left:0px; padding-right:0px; background-color:rgba(0,0,0,0.5)">
                            <div class=" col-lg-12 messages" id="dmtab" style="color:#fff; font-size:12px; padding:10px" onclick="loadDM()">Direct Message (<span style="color:#FCD039">2</span>)</div>
                            <div class=" col-lg-12 messages" style="color:#fff; font-size:12px; padding:10px" onclick="loadGM()" id="gmtab">General Message (<span style="color:#FCD039">1</span>)</div>
                        </div>
                        -->
                        <script>
                            function msgopt(a) {
                                if (a === "SMS") {
                                    document.getElementById("mailcontent").innerHTML = "This sends SMS";
                                }
                                if (a === "E-mail") {
                                    document.getElementById("mailcontent").innerHTML = "This sends Email";
                                }
                            }
                        </script>
                        <div class="col-md-12">
                            <div class="col-md-4" id="messageheader" style="padding:20px;background-color:rgba(255,255,255,0.2)">
                                <div style="max-height:400px; overflow-y:auto">
                                    <div>
                                        <label>Message type</label>
                                        <select class='form-control' style='margin-bottom:10px' onchange="msgopt(this.value)">
                                            <option>--Select--</option>
                                            <option>SMS</option>
                                            <option>E-mail</option>
                                        </select>
                                        <label>Recipient</label>
                                        <select class='form-control' style='margin-bottom:10px' id='msgreci'>
                                            <option>Staff</option>
                                            <option>Parents</option>
                                        </select>
                                        <label>Category</label>
                                        <select class='form-control' style='margin-bottom:10px' id='msgcat'>
                                            <option>Grade 1</option>
                                            <option>Parents</option>
                                        </select>
                                        <input type="button" value="Confirm selection" onclick="confirmmsgrec()">
                                    </div>
                                    <script>
                                        function confirmmsgrec() {
                                            var rec = document.getElementById('msgreci').value;
                                            var cat = document.getElementById('msgcat').value;
                                            document.getElementById("mailrecipient").innerHTML = rec + " (" + cat + ") ";
                                        }
                                    </script>
                                    <!--
                                    <table class="table table-condensed" style="font-size:13px; border:none" id="msgprecursor">

                                    </table>-->
                                </div>
                            </div>
                            <div class="col-md-8" id="messagecontent" style="font-size:17px; padding:20px; min-height: 240px; background-color:rgba(255,255,255,0.4)">
                                <div style="max-height:200px; overflow-y:auto">
                                    <div id="mailrecipient">
                                        Recipients: Parents of Students in grade 1
                                    </div>
                                    <div id="mailcontent" style="font-size:13px; font-family:montserrat, verdana" class="clearfix">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='row' style='margin:0px; display:none' id="parents">
                    <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                        <span id="parentcount"></span> Parents
                    </div>
                    <div class='col-md-12' id='printparents' style='display:none'>
                        <div style='margin-bottom:30px; font-size:25px; text-align:center'>Havard High SchoolS<br>PARENTS</div>

                        <?php
                        echo "<table class='table table-bordered table-condensed'>
<tr style='background-color:#ccc'><td></td><td>Parent Name</td><td>Phone</td><td>E-mail</td><td></td></tr>";
                        $tf = "select * from parentsregister";
                        $ht = mysqli_query($w, $tf);
                        $gtf = mysqli_num_rows($ht);
                        $count = 1;
                        while ($jt = mysqli_fetch_array($ht)) {
                            $parentname = $jt['ParentSurname'] . " " . $jt['ParentFirstname'];
                            $email = $jt['Email'];
                            $password = $jt['Password'];
                            $phone = $jt['PhoneNumber'];
                            echo "<tr><td>$count</td><td>$parentname</td><td>$phone</td><td>$email</td><td></td></tr>";
                            $count++;
                        }
                        ?>
                        </table>
                    </div>
                    <script>
                        function msgPar() {
                            document.getElementById("modalTitleb").innerHTML = "<span style='font-size:22px'>Message parents</span>";
                            document.getElementById("modalBodyb").innerHTML = "";
                    </script>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px; margin-bottom:10px; text-align:right; position:relative">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="margin-right:10px">
                            <div class="col-lg-12 col-md-12" style="padding:0px">
                                <span style="left:0px; margin-right:5px; top:10px; min-width:100px; padding:3px; padding-left:10px; padding-right:10px; background-color:#AAC7D5; color:#fff; border-radius:4px; cursor:pointer" onclick="excelparents()">
                                    Excel
                                </span>
                                <span style="left:0px; margin-right:5px; top:10px; min-width:100px; padding:3px; padding-left:10px; padding-right:10px; background-color:#AAC7D5; color:#fff; border-radius:4px; cursor:pointer" onclick="printDiv('printparents')">
                                    Print
                                </span>
                                <span style="left:0px; margin-right:5px; top:10px; min-width:100px; padding:3px; padding-left:10px; padding-right:10px; background-color:#AAC7D5; color:#fff; border-radius:4px; cursor:pointer" data-toggle="modal" data-target="#emailspecificParents" onclick='msgPar()'>
                                    Message Parent
                                </span>
                                <span style="left:30px; margin-right:10px; top:10px; min-width:100px; padding:3px; padding-left:10px; padding-right:10px; background-color:#AAC7D5; color:#fff; border-radius:4px; cursor:pointer" data-toggle="modal" data-target="#attachstudents" onclick='msgPar()'>
                                    Attach Student
                                </span>
                                <span style="padding:10px; background-color:#E3EDF2; border-radius:5px;">
                                    <i class="fa fa-search" style="margin:5px; padding:5px; color:#0093D9"></i>
                                    <input type="text" placeholder="Parent Surname" id="parentsSearch" style="border:none;max-width: 200px; background-color:#E3EDF2; display:inline">
                                    <span style="padding:10px; background-color:#548DA9; color:#fff; cursor:pointer" onClick="getparents('search')">Search</span>
                                    <span onClick="getparents()" style="padding:10px; cursor:pointer" title="Refresh grid" class="fa fa-refresh"></span>
                                    <!--
                                    <select style="max-width:200px; padding:5px; border:none" id="filterclass" onChange="searchBy(this.value)">
                                    <?php
                                    $d = mysqli_query($w, "select * from schclass");
                                    while ($a = mysqli_fetch_array($d)) {
                                        $sn = $a['SN'];
                                        echo "<option value='$sn'>" . $a['ClassName'] . "</option>";
                                    }
                                    ?>
                                    </select>
                                    -->
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
                        <!--<div class="col-lg-12" style="margin-top:20px; background-color:rgba(255,255,255,0.2);min-height:200px; max-height:400px; overflow-y:auto; position:relative">
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
                        </div>-->
                    </div>
                    <div class="col-lg-4 col-md-12" style="padding:0px">
                        <!-- Send message -->
                        <div style="padding:10px; margin-bottom:20px; border-radius:2px; background-color:rgba(255,255,255,0.2)">
                            <div style="font-family:raleway; font-size:20px; margin-bottom:20px"><b>
                                    <span onclick="showparentu('#addnewpar')" style='cursor:pointer'>Add Parent</span> - 
                                    <span onclick="showparentu('#updatenewpar')" style='cursor:pointer'>Update Parent</span>
                            </div>
                            <script>
                                    function showparentu(a) {
                                        $("#addnewpar").hide();
                                        $("#updatenewpar").hide();
                                        $(a).show();
                                    }
                            </script>
                            <div id='addnewpar' style='background-color:rgba(0,0,0,0.1); padding:5px'>
                                <div style='text-align:right'>Add New Parent.</div>
                                <form>
                                    <label>First name</label>
                                    <input type='text' class='form-control' id='parName'>
                                    <label>Last name</label>
                                    <input type='text' class='form-control' id='parLName'>
                                    <label>Religion</label>
                                    <input type='text' class='form-control' id='parReligion'>
                                    <label>Occupation</label>
                                    <input type='text' class='form-control' id='parOccupation'>
                                    <label>Office Address</label>
                                    <input type='text' class='form-control' id='parOfficeaddress'>
                                    <label>Phone number</label>
                                    <input type='text' class='form-control' id='parPhonenumber'>
                                    <label>Email address</label>
                                    <input type='text' class='form-control' id='parEmail'>
                                    <label>Contact address</label>
                                    <input type='text' class='form-control' id='parContact'>
                                    <input type='button' class='btn btn-success' value='Save information' style='margin-top:10px' onclick='savePar()'>
                                    <input type='reset' class='btn btn-warning' value='Reset information' style='margin-top:10px'>
                                </form>
                            </div>
                            <div id='updatenewpar' style='display:none; background-color:rgba(0,150,255,0.2); padding:10px'>
                                <div style='text-align:right'>Update Parent information.</div> 
                                <span id='updateparid'></span>
                                <form>
                                    <label>First name</label>
                                    <input type='text' class='form-control' id='parNameu'>
                                    <label>Last name</label>
                                    <input type='text' class='form-control' id='parLNameu'>
                                    <label>Religion</label>
                                    <input type='text' class='form-control' id='parReligionu'>
                                    <label>Occupation</label>
                                    <input type='text' class='form-control' id='parOccupationu'>
                                    <label>Office Address</label>
                                    <input type='text' class='form-control' id='parOfficeaddressu'>
                                    <label>Phone number</label>
                                    <input type='text' class='form-control' id='parPhonenumberu'>
                                    <label>Email address</label>
                                    <input type='text' class='form-control' id='parEmailu'>
                                    <label>Password</label>
                                    <input type='text' class='form-control' id='parPassu'>
                                    <!--<label>Contact address</label>
                                    <input type='text' class='form-control' id='parContactu'>-->
                                    <input type='button' class='btn btn-success' value='Update information' style='margin-top:10px' onclick='updatePar()'>
                                    <input type='reset' class='btn btn-warning' value='Reset information' style='margin-top:10px'>
                                </form>
                            </div>
                            <script>
                                    function _v(a) {
                                        return document.getElementById(a);
                                    }

                                    function updatePar() {
                                        var updateid = _v("updateparid").innerHTML;
                                        //alert(updateid);
                                        var pname = _v("parNameu").value;
                                        var lname = _v("parLNameu").value;
                                        var religion = _v("parReligionu").value;
                                        var occupation = _v("parOccupationu").value;
                                        var offaddress = _v("parOfficeaddressu").value;
                                        var phonenumber = _v("parPhonenumberu").value;
                                        var emailaddress = _v("parEmailu").value;
                                        var password = _v("parPassu").value;
                                        var action = "update";
                                        $.post("PHP/parents.php", {pname: pname, updateid: updateid, lname: lname, religion: religion, action: action, occupation: occupation, offaddress: offaddress, password: password, phone: phonenumber, email: emailaddress}).done(function (data) {
                                            alert(data);
                                        });
                                    }

                                    function savePar() {
                                        var pname = _v("parName").value;
                                        var lname = _v("parLName").value;
                                        var religion = _v("parReligion").value;
                                        var occupation = _v("parOccupation").value;
                                        var offaddress = _v("parOfficeaddress").value;
                                        var phonenumber = _v("parPhonenumber").value;
                                        var emailaddress = _v("parEmail").value;
                                        var contactadd = _v("parContact").value;
                                        var action = "savenew";
                                        $.post("PHP/parents.php", {pname: pname, lname: lname, religion: religion, action: action, occupation: occupation, offaddress: offaddress, phone: phonenumber, email: emailaddress, add: contactadd}).done(function (data) {
                                            alert(data);
                                        });
                                    }

                            </script>
                        </div>
                    </div>

                    <!-- Modal for emailing  data-toggle="modal" data-target="#emailspecificParents" grade -->
                    <div class="modal fade bs-example-modal-md" id="emailspecificParents" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                        <div class="modal-dialog modal-md" role="document" style='font-face:verdana; font-size:12px'>
                            <div class="modal-content">
                                <div class="modal-header" style='background-color:#E8EEF4; font-size:24px' id='modalTitleb'>
                                    Message parents
                                </div>
                                <div class="modal-body" style='background-color: #EFF8EF' id='modalBodyb'>
                                    <label>Parent category</label>
                                    <select class="form-control" style="margin-bottom:10px" id="msgrecgi">
                                        <option>All</option>
                                        <?php
                                        $h = mysqli_query($w, "select * from schclass");
                                        while ($i = mysqli_fetch_array($h)) {
                                            $clasid = $i['SN'];
                                            $classname = $i['ClassName'];
                                            echo "<option value='$clasid'>$classname</option>";
                                        }
                                        ?>
                                    </select>
                                    <label>Message type</label>
                                    <select class="form-control" style="margin-bottom:10px" id="msgt">
                                        <option>SMS</option>
                                        <option>E-mail</option>
                                    </select>
                                    <div style="margin-bottom: 10px">
                                        <textarea rows="4" class="form-control" id="msgpartext"></textarea>
                                    </div>
                                    <input type="button" value="Send message" onclick="sndmsgepar()" class="btn btn-success">
                                    <input type="button" value="Send portal password" onclick="sndsmspw()" class="btn btn-success">
                                    <span id="sndmsgepar">

                                    </span>
                                </div>
                                <script>
                                        function sndsmspw() {
                                            document.getElementById("sndmsgepar").innerHTML = "Sending message...";
                                            var msgtype = "parentpw";
                                            var msg = document.getElementById("msgpartext").value;
                                            var msgreci = document.getElementById("msgrecgi").value;
                                            var recipient = "parentpw";
                                            $.post("PHP/sendparentmsg.php", {recipient: recipient, msgreci: msgreci, msg: msg, msgtype: msgtype}).done(function (data) {
                                                document.getElementById("sndmsgepar").innerHTML = data;
                                            });
                                        }

                                        function sndmsgepar() {
                                            document.getElementById("sndmsgepar").innerHTML = "Sending message...";
                                            var msgtype = document.getElementById("msgt").value;
                                            var msg = document.getElementById("msgpartext").value;
                                            var msgreci = document.getElementById("msgrecgi").value;
                                            var recipient = "parent";
                                            $.post("PHP/sendparentmsg.php", {recipient: recipient, msgreci: msgreci, msg: msg, msgtype: msgtype}).done(function (data) {
                                                document.getElementById("sndmsgepar").innerHTML = data;
                                            });
                                        }
                                </script>
                                <div class="modal-footer" style='background-color:#E8EEF4'>
                                    <div id="emailspecificParentsResponse" style="text-align: center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of modal for emailing -->
                    <div class="modal fade bs-example-modal-md" id="attachstudents" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                        <div class="modal-dialog modal-md" role="document" style='font-face:verdana; font-size:12px'>
                            <div class="modal-content">
                                <div class="modal-header" style='font-size:24px' id='modalTitleb'>
                                    Attach Student
                                </div>
                                <script>
                                        function getparentfromid(a) {
                                            var phonenumber = a;
                                            var action = "getparent";
                                            $.post("PHP/searchpar.php", {action: action, phonenumber: phonenumber}).done(function (data) {
                                                document.getElementById("parentinfo").innerHTML = data;
                                            });
                                        }
                                        function getstudentfromid(a) {
                                            var studentid = a;
                                            alert(studentid);
                                            var action = "getstudent";
                                            $.post("PHP/searchpar.php", {action: action, studentid: studentid}).done(function (data) {
                                                //alert(data);
                                                document.getElementById("stdinfo").innerHTML = data;
                                            });
                                        }
                                        function attachstdhere(a) {
                                            document.getElementById("attserver").innerHTML = "Linking... ";
                                            //document.getElementById("attserver").innerHTML = "Server information about link is here";
                                            var parentid = document.getElementById("paridattachee").innerHTML;
                                            var stdid = document.getElementById("stdidattachee").innerHTML;
                                            //document.getElementById("attserver").innerHTML = parentid + ' - ' + stdid;
                                            $.post("PHP/linkage.php", {parid: parentid, stdid: stdid}).done(function (data) {
                                                document.getElementById("attserver").innerHTML = data;
                                            });
                                        }

                                        function excelparents() {
                                            window.location.assign("PHP/parentsexcel.php");
                                        }

                                        function excelstudents() {
                                            window.location.assign("PHP/studentsexcel.php");
                                        }
                                </script>
                                <div class="modal-body" id='modalBodyb'>
                                    <div class="col-md-6" style="background-color:rgba(255,255,255,0.4); padding:10px">
                                        <label>
                                            Parent Phone number
                                        </label>  
                                        <input type="text" class="form-control" id="srchPName" style="margin-bottom:10px">
                                        <input type="button" style="width:100%" class="btn btn-warning" value="Search Parent phone" onclick="getparentfromid(srchPName.value)">
                                        <div id="parentinfo">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>
                                            Student ID
                                        </label>  
                                        <input type="text" class="form-control" id="srchSName" style="margin-bottom:10px">
                                        <input type="button" style="width:100%" class="btn btn-success" value="Search Student" onclick="getstudentfromid(srchSName.value)">
                                        <div id="stdinfo">

                                        </div>
                                    </div>
                                    <div class="col-md-12" style="text-align:center; margin-top:10px">
                                        <input type="button" value="Attach Student to parent" onclick="attachstdhere()" class="btn btn-success">
                                        <div id="attserver">

                                        </div>
                                    </div>
                                    <span id="sndmsgepar">

                                    </span>
                                </div>
                                <div class="modal-footer" style='background-color:#E8EEF4'>
                                    <div id="emailspecificParentsResponse" style="text-align: center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <span id="teachercount" style="display:none"></span> Staff <span id="wtdh" style="font-size:20px"></span>
                    </div>
                    <div class="col-lg-12" id="tHome" style='padding:0px'>

                        <div class="col-lg-3 col-sm-12" style="min-height:200px; padding:5px; margin-bottom:20px; height:auto;">
                            <div style='background-color:rgba(255,255,255,0.2);padding:5px; '>
                                <div style="font-family:raleway; font-size:15px; font-weight:bold; border-bottom-style:solid; border-bottom-width:thin; border-color:#C1D7E1; padding:10px; padding-left:0px; margin-bottom:10px">
                                    Add a Staff
                                </div>

                                <div style='text-align:right; font-size:11px' id='addTnotification'></div>
                                <label>Staff type</label>
                                <select class='form-control' id='teachertype'>
                                    <option>Teacher</option>
                                    <option>Bursar</option>
                                </select>
                                <label style="margin-top:10px"> Name </label>
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
                                <input type='button' value='Apply setting to all' class='btn btn-success' style='margin-bottom:20px' onClick="saveteachersetting()">
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
                                <i class="fa fa-close point" onClick="{
                                                $('#staffupdate').hide(300);
                                            }" style="position:absolute; right:10px; top:10px" title="Close"></i>
                                <div style="font-family:raleway; font-size:20px; position:relative; margin-bottom:20px">
                                    Update Information
                                    <span style="position:absolute; left:0px; top:30px; display:none; font-size:12px; font-family:verdana" id="sName">Kayode Agbede</span>
                                </div>
                                <label style="margin-top:15px">Names</label>
                                <input  class="form-control"type="text" placeholder="uSNames" id="uTNames" maxlength="75">
                                <label style="margin-top:15px">Email (Username)</label>
                                <input  class="form-control"type="email" placeholder="uSemail" id="uTEmail" maxlength="45">
                                <label style="margin-top:15px">Password</label>
                                <input type='text' class='form-control' id="uTPassword" style="padding:5px; background-color:rgba(255,255,255,0.8)">
                                <label style="margin-top:15px">Phone number</label>
                                <input  class="form-control"type="text" placeholder="uSNumber" id="uTNumber" maxlength="14">
                                <label style="margin-top:15px">Credentials</label>
                                <input  class="form-control"type="text" placeholder="uSCredentials" id="uTCredential" maxlength="95">
                                <label style="margin-top:15px">Address</label>
                                <input  class="form-control"type="text" placeholder="uSAddress" id="uTAddress">
                                <label style="margin-top:15px">Signature upload</label>
                                <input type="file" id="teachersign" class="form-control" style=" margin-bottom:10px" onchange="uploadsignature()">

                                <center><span style="width:300px; height:100px; background-color:rgba(255,255,255,0.2); display:inline-block" id="signaturehere"></center>

                                </span>
                                <span class="btn btn-primary" style="margin-top:10px; display:block" onClick="updateTeacher()"><i class="fa fa-envelope-o" style="margin-right:10px"></i>Update Information</span>
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
                                <span class="btn btn-primary" style="margin-top:5px" onClick="stdSendMail('staff')"><i class="fa fa-envelope-o" style="margin-right:10px"></i>Send Mail</span>
                                <div id="TmailMessage" style="margin-top:10px"></div>
                            </div>
                        </div>
                    </div>
                    <div  class="col-lg-12" style="min-height:200px; height:auto; margin-right:20px; padding-left:0px; display:none" id="tAssignments">
                        <div class="col-lg-4" style="min-height:200px; margin-right:0px; padding-left:0px">
                            <div class='col-lg-12 col-sm-12' style=" padding:10px; margin-bottom:10px; min-height:20px; border-radius:2px; background-color:rgba(255,255,255,0.2)">
                                <span onClick="getAsses('All')" style="padding:10px; cursor:pointer" title="Refresh assignment grid" class="fa fa-refresh"></span>
                                <input type='date' class='form-control' id='AssDate' style='padding:0px;border:none; max-width:140px; display:inline' onchange='getAsses("Date");'>
                                <select class='form-control' style='max-width:150px; display:inline' id='AssClass'  onchange='getAsses("Class");'>
                                    <?php
                                    $d = mysqli_query($w, "select * from schclass");
                                    while ($a = mysqli_fetch_array($d)) {
                                        $sn = $a['SN'];
                                        echo "<option value='$sn'>" . $a['ClassName'] . "</option>";
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
                    <div  class="col-lg-12" style="min-height:200px; height:auto; display:none; margin-right:20px; margin-right:0px; padding-right:0px; padding:0px" id="tSubjects">
                        <div style="margin-bottom:10px; font-family:raleway; font-size:20px">Subjects</div>

                        <div class="col-md-3" style="padding:5px; position:relative; margin-bottom:20px; min-height:100px" id="assignmentlist">
                            <div style='background-color:rgba(255,255,255,0.2); padding:5px'>
                                <label style="margin-top:40px">Subject Name</label>
                                <input type="text" class="form-control" placeholder="Subject name" style="margin-bottom:10px" id="subName">
                                <label>Class</label>
                                <select class="form-control" style="margin-bottom:10px" id="subCategory">
                                    <?php
                                    $d = mysqli_query($w, "select * from schclass");
                                    while ($a = mysqli_fetch_array($d)) {
                                        $val = $a['SN'];
                                        echo "<option value='$val'>" . $a['ClassName'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <label>Subject Code</label>
                                <input type='text' id='subcode' class='form-control' style='margin-bottom:10px'>
                                <label>Subject Category <span style='font-size:11px; cursor:pointer' data-toggle="modal" data-target="#subjectmodal">( Add new )</span></label>
                                <select class="form-control" style="margin-bottom:10px" id="subCategorys">
                                    <option></option>
                                    <?php
                                    $d = mysqli_query($w, "select catid, subjectcatname from subjectcat order by subjectcatname asc");
                                    while ($a = mysqli_fetch_array($d)) {
                                        $catid = $a['catid'];
                                        echo "<option value='$catid'>" . $a['subjectcatname'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <label>Status</label>
                                <select class="form-control" id="subStatus" style="margin-bottom:20px">
                                    <option>Mandatory</option>
                                    <option>Optional</option>
                                </select>
                                <span class="btn btn-success" onClick="addSubjectcollege()">Add Subject</span>
                                <div style="font-size:12px; font-family: verdana; margin-top:10px" id="ServerResponse"></div>
                            </div>
                        </div>
                        <div class="col-md-6" style='padding-left:0px; padding-right:5px'>
                            <div style="margin-bottom:10px">
                                <span style="padding:10px; background-color:#E3EDF2; border-radius:2px;">
                                    <i class="fa fa-search" style="margin:5px; padding:5px; color:#0093D9"></i>
                                    <input type="text" placeholder="Subject Name" id="subjectSearch" style="border:none;max-width: 200px; background-color:#E3EDF2; display:inline">
                                    <span style="padding:10px; background-color:#548DA9; color:#fff; cursor:pointer" onClick="getsubjectscollege('search')">Search</span>
                                    <span onClick="getsubjectscollege('all')" style="padding:10px; cursor:pointer" title="Refresh grid" class="fa fa-refresh"></span>
                                    <select style="max-width:200px; padding:5px; border:none" id="filtersubclass" onChange="getsubjectscollege('filter')">
                                        <?php
                                        $d = mysqli_query($w, "select * from schclass");
                                        while ($a = mysqli_fetch_array($d)) {
                                            $val = $a['SN'];
                                            echo "<option value='$val'>" . $a['ClassName'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </span>
                            </div>
                            <script>
                                    function getsubjectscollege(vv) {
                                        if (vv === "filter") {
                                            var filterclass = document.getElementById("filtersubclass").value;
                                            $.post("PHP/getSubjectscollege.php", {searchKind: vv, value: filterclass}).done(function (data) {
                                                document.getElementById("subjectFisM").innerHTML = "<table class=\"table table-condensed table-striped table-responsive\" style=\"font-size:13px; font-family:verdana\" id='subjectsDis'></table>";
                                                document.getElementById("subjectsDis").innerHTML += data;
                                                //console.log(data);
                                            });
                                        }
                                        if (vv === "all") {
                                            $.post("PHP/getSubjectscollege.php", {searchKind: vv}).done(function (data) {
                                                document.getElementById("subjectFisM").innerHTML = "<table class=\"table table-condensed table-striped table-responsive\" style=\"font-size:13px; font-family:verdana\" id='subjectsDis'></table>";
                                                document.getElementById("subjectsDis").innerHTML += data;
                                                //console.log(data);
                                            });
                                        }
                                        if (vv === "search") {
                                            var searcher = document.getElementById("subjectSearch").value;
                                            $.post("PHP/getSubjectscollege.php", {searchKind: vv, value: searcher}).done(function (data) {
                                                document.getElementById("subjectFisM").innerHTML = "<table class=\"table table-condensed table-striped table-responsive\" style=\"font-size:13px; font-family:verdana\" id='subjectsDis'></table>";
                                                document.getElementById("subjectsDis").innerHTML += data;
                                                //console.log(data);
                                            });
                                        }
                                    }
                            </script>
                            <div class="col-lg-12 col-sm-12" style="padding:20px; position:relative; margin-bottom:20px; min-height:100px; background-color:rgba(255,255,255,0.2)" id='subjectFisM'>
                                <table class="table table-condensed table-striped table-responsive" style="font-size:13px; font-family:verdana" id='subjectsDis'>

                                </table>
                            </div>
                        </div>
                        <div class="col-md-3" style="min-height:120px; height:auto; position:relative; padding-bottom: 10px;  background-color:rgba(255,255,255,0.2)" id="updatesubject">
                            <i class="fa fa-close point" onClick="{
                                            $('#updatesubject').hide(300);
                                        }" style="position:absolute; right:10px; top:10px" title="Close"></i>
                            <div id="subjectSNDetail" style="display:none"></div>
                            <label style="margin-top:40px">Subject Code</label>
                            <input type="text" class="form-control" placeholder="Subject Code" style="margin-bottom:10px" id="updatesubjectcode">
                            <label style="margin-top:0px">Subject Name</label>
                            <input type="text" class="form-control" placeholder="Subject name" style="margin-bottom:10px" id="updatesubjectname">
                            <!--
                            <label>Class</label>
                            <select class="form-control" style="margin-bottom:10px" id="updatesubjectclass">
                            <?php
                            $d = mysqli_query($w, "select * from schclass");
                            while ($a = mysqli_fetch_array($d)) {
                                $sn = $a['SN'];
                                echo "<option value='$sn'>" . $a['ClassName'] . "</option>";
                            }
                            ?>
                            </select>-->
                            <label>Assign Teacher</label>
                            <select class="form-control" style="margin-bottom:10px" id="assignSubjectTeacher" onChange="assignSubjectTeacherID.selectedIndex = this.selectedIndex">
                                <?php
                                $d = mysqli_query($w, "select StaffName from schstaff");
                                while ($a = mysqli_fetch_array($d)) {
                                    echo "<option>" . $a['StaffName'] . "</option>";
                                }
                                ?>
                            </select>
                            <select class="form-control" style="margin-bottom:10px; display:none" id="assignSubjectTeacherID" onChange="assignSubjectTeacher.selectedIndex = this.selectedIndex">
                                <?php
                                $d = mysqli_query($w, "select StaffID from schstaff");
                                while ($a = mysqli_fetch_array($d)) {
                                    echo "<option>" . $a['StaffID'] . "</option>";
                                }
                                ?>
                            </select>
                            <span class="btn btn-success" style="width:100%" onClick="updatesubjectTeachers()">Update</span>
                        </div>

                    </div>
                </div>
                <div class='row' style='margin:0px; display: none' id="event">
                    <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                        Events
                    </div>
                    <div class="col-lg-3" style="min-height:200px; margin-bottom:10px; background-color:rgba(255,255,255,0.2)">
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
                        <input type="button" onClick="createSEvent()" value="Save Event" class="btn btn-success" style="margin-bottom: 20px; margin-top:20px">
                    </div>
                    <div class="col-lg-6" style="padding-left: 0px; margin-bottom:20px; position:relative" id="allevents">
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
                            <input type="button" value="add" class="btn btn-warning" onClick="addtimetable()">
                        </div>
                        <table id="schoolTermtable" class="table table-condensed table-hover" style="background-color:rgba(255,255,255,0.2); margin-top:20px; font-size:13px">

                        </table>
                    </div>
                </div>
                <div class="modal fade bs-example-modal-md" id="subjectmodal">
                    <div class="modal-dialog modal-sm" role="document" style='font-family:verdana; font-size:12px'>
                        <div class="modal-content">
                            <div class="modal-body" style='background-color: #EFF8EF' id="subjbody">
                                <div style='margin-bottom:10px; font-weight:600; font-size:13px'>
                                    ADD SUBJECT CATEGORY
                                </div>
                                <label>Class</label>
                                <select class='form-control' id='ascc'>
                                    <?php
                                    $d = mysqli_query($w, "select * from schclass");
                                    while ($a = mysqli_fetch_array($d)) {
                                        $classid = $a['SN'];
                                        echo "<option value='$classid'>" . $a['ClassName'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <label style='margin-top:5px'>Subject Category</label>
                                <input type='text' class='form-control' id='ascsc'>
                                <input type='button' class='btn btn-success' value='Add Category' style='margin-top:10px' onclick='addnucat()'><span id='addsubj'></span>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                        function addnucat() {
                            var ascc = document.getElementById("ascc").value;
                            var ascsc = document.getElementById("ascsc").value;
                            $.post("PHP/addsubjectcategory.php", {ascc: ascc, ascsc: ascsc}).done(function (data) {
                                //alert(data);
                                document.getElementById("addsubj").innerHTML = data;
                            });
                        }

                </script>
                <div class='row' style='margin:0px; display:none' id="students">
                    <!-- Reports subject categories -->


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

                    <div class="modal fade bs-example-modal-md" id="updateStudent" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                        <div class="modal-dialog modal-md" role="document" style='font-face:verdana; font-size:12px'>
                            <div class="modal-content">
                                <div class="modal-header" style='background-color:#E8EEF4'>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h6><center><b>Update Student Information<br/><span id='teachername' style="font-weight:normal"></span></b></center></h6>
                                </div>
                                <script>
                                        function uploadpassport() {
                                            //alert("This uploads");
                                            var formData = new FormData();
                                            var stdid = document.getElementById("studentid").innerHTML;
                                            var imgtoupload = _v("upfile").files[0];
                                            var id = document.getElementById("studentid").innerHTML;
                                            formData.append("imgtoupload", imgtoupload);
                                            formData.append("stdid", stdid);

                                            var request = new XMLHttpRequest();
                                            request.upload.addEventListener("progress", uploadprogressHandler, false);
                                            request.addEventListener("load", uploadcompleteHandler, false);
                                            request.addEventListener("error", uploaderrorHandler, false);
                                            request.addEventListener("abort", uploadabortHandler, false);
                                            request.open("POST", "PHP/uploadphoto.php");
                                            request.send(formData);
                                        }

                                        function uploadsignature() {
                                            var formData = new FormData();
                                            var id = document.getElementById("sName").innerHTML;
                                            var signaturephoto = _v("teachersign").files[0];
                                            formData.append("signaturephoto", signaturephoto);
                                            formData.append("staffid", id);

                                            var request = new XMLHttpRequest();
                                            request.upload.addEventListener("progress", uploadprogressHandler, false);
                                            request.addEventListener("load", uploadcompletesign, false);
                                            request.open("POST", "PHP/uploadsignature.php");
                                            request.send(formData);
                                        }

                                        function uploadcompletesign(evt) {
                                            var serverr = evt.target.responseText;
                                            var srv = "PHP/" + serverr;
                                            //document.getElementById("srvupdate").innerHTML = serverr;
                                            var docpath = document.getElementById("upfile").value;
                                            alert(srv);
                                            document.getElementById("signaturehere").innerHTML = "<img src='" + srv + "' height='180px' width='180px'>";
                                        }

                                        function uploadprogressHandler(evt) {
                                            var v = Math.round((evt.loaded / evt.total) * 100) + "%";
                                            document.getElementById("srvupdate").innerHTML = v;
                                        }

                                        function uploadcompleteHandler(evt) {
                                            var serverr = evt.target.responseText;
                                            var srv = "PHP/" + serverr;
                                            //document.getElementById("srvupdate").innerHTML = serverr;
                                            var docpath = document.getElementById("upfile").value;
                                            alert(srv);
                                            document.getElementById("passprthere").innerHTML = "<img src='" + srv + "' height='180px' width='180px'>";
                                        }

                                        function uploaderrorHandler() {
                                            document.getElementById("srvupdate").innerHTML = "Could not upload file";
                                        }

                                        function uploadabortHandler() {
                                            document.getElementById("srvupdate").innerHTML = "Upload aborted";
                                        }
                                </script>
                                <div class="modal-body col-md-12" style='background-color: #EFF8EF' id="attachedStudents">
                                    <i id="studentid" style="display: none"></i>
                                    <center>
                                        <span style="display:inline-block; width:200px; height:200px; background-color:rgba(0,0,0,0.4)" id="passprthere">

                                        </span>
                                    </center><br>
                                    <div class='col-md-6'>
                                        <input type="file" id="upfile" value="Upload photo" onchange="uploadpassport()" class="form-control" style="margin-bottom:10px"> 
                                        <div id="srvupdate" style="text-align:center"></div><br>
                                        <label>Surname</label>
                                        <input type="text" class="form-control" id="stdsurname">
                                        <label style="margin-top:20px">Firstname</label>
                                        <input type="text" class="form-control" id="stdfirstname">
                                        <label style="margin-top:20px">Middlename</label>
                                        <input type="text" class="form-control" id="stdmiddlename">
                                        <label style="margin-top:20px">ClassID</label>
                                        <select class="form-control" id="stdclassid">
                                            <?php
                                            $d = mysqli_query($w, "select * from schclass");
                                            while ($a = mysqli_fetch_array($d)) {
                                                $stdid = $a['SN'];
                                                echo "<option value='$stdid'>" . $a['ClassName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <label style="margin-top:20px">Home Address</label>
                                        <textarea class="form-control" id="stdaddress">

                                        </textarea>
                                        <label style="margin-top:20px">Email Address</label>
                                        <input type="text" class="form-control" style="margin-bottom:10px" id="stdemailaddress">
                                        <input type="button" class="btn btn-success" value="Update" onClick="updateStudent()">
                                        <input type="button" class="btn btn-warning" value="Remove student" onClick="removeStudent()">
                                        <div id="Updateresponse"></div>
                                    </div>
                                    <div class='col-md-6' style='border-left-style:dashed; border-left-weight:thin; min-height:400px'>
                                        <label>Gender</label>
                                        <div id='stdgender' class='addtinfo'></div>
                                        <label>State of Origin</label>
                                        <div id='stdsoo' class='addtinfo'></div>
                                        <label>Nationality</label>
                                        <div  id='stdnationality' class='addtinfo'></div>
                                        <label>Blood Group</label>
                                        <div id='stdbloodgroup' class='addtinfo'></div>
                                        <label>Genotype</label>
                                        <div id='stdgenotype' class='addtinfo'></div>
                                        <label>Health Status</label>
                                        <div id='stdhealthstatus' class='addtinfo'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                        <span id="studentcount"></span> Student
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
                                    <span class="btn btn-primary" style="margin-top:10px" onClick="stdSendMail('students')"><i class="fa fa-envelope-o" style="margin-right:10px"></i>Send Mail</span>
                                    <div id="mailMessage" style="margin-top:10px"></div>
                                </div>
                                <div id="serverResponse" style="padding:10px; text-align:center"></div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px; margin-bottom:10px; position:relative">
                        <div class="col-md-3" style="padding:5px">
                            <span class="addpat addpatsel">Bio-Data</span>
                            <span class="addpat">Parents/Guardian</span>
                            <div style="padding:5px; padding-top:20px; margin-bottom:20px; border-radius:2px; background-color:rgba(255,255,255,0.2)">
                                <div style="font-family:raleway; font-size:20px; margin-bottom:20px">
                                    Add Student
                                </div>
                                <label>Student ID</label>
                                <input class="form-control" type="text" placeholder="Identification" id="ASstudentid">
                                <label style="margin-top:10px">Surname</label>
                                <input class="form-control" type="text" placeholder="Student surname" id="ASsurname">
                                <label style="margin-top:10px">Middle name</label>
                                <input class="form-control" type="text" placeholder="Student surname" id="ASmiddlename">
                                <label style="margin-top:10px">First name</label>
                                <input class="form-control" type="text" placeholder="Student Firstname" id="ASfirstname">
                                <label style="margin-top:10px">Sex</label>
                                <select class="form-control" id="ASsex">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                <label style='margin-top:10px'>Session</label>
                                <select class="form-control" id="ASSsession">
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
                                <label style="margin-top:10px">Date of birth</label>
                                <input class="form-control" type="date" id="ASDOB">
                                <label style="margin-top:10px">Place of birth</label>
                                <input class="form-control" type="text" id="ASPOB">
                                <label style="margin-top:10px">State of origin</label>
                                <input class="form-control" type="text" id="ASSOO">
                                <label style="margin-top:10px">Local Government Area</label>
                                <input class="form-control" type="text" id="ASLGA">
                                <label style="margin-top:10px">Class</label>
                                <select class="form-control" id="ASclass">
                                    <?php
                                    $d = mysqli_query($w, "select SN, ClassName from schclass");
                                    while ($a = mysqli_fetch_array($d)) {
                                        $sn = $a['SN'];
                                        echo "<option value='$sn'>" . $a['ClassName'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <label style="margin-top:10px">Nationality</label>
                                <input  class="form-control"type="text" id="ASNationality">
                                <label style="margin-top:10px">Religion</label>
                                <input  class="form-control"type="text" id="ASReligion">
                                <label style="margin-top:10px">Health status</label>
                                <input  class="form-control"type="text" id="ASHealthstatus">
                                <label style="margin-top:10px">Blood group</label>
                                <input  class="form-control"type="text" id="ASBloodgroup">
                                <label style="margin-top:10px">Genotype</label>
                                <input  class="form-control"type="text" id="ASGenotype">
                                <label style="margin-top:10px">Residential Address</label>

                                <textarea class="form-control" id="AShomeaddress"></textarea>
                                <label style="margin-top:10px">Previous school attended</label>
                                <input  class="form-control"type="text" placeholder="" id="ASPreviousschools">
                                <input type="button" class="btn btn-primary" value="GenerateID and save" style="margin-top:20px" onClick="ASsave()">
                                <div id="returnedRez" style="margin-top:10px"></div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="padding:0px; text-align:right;">
                            <span style="padding:10px; background-color:#E3EDF2; border-radius:5px;">
                                <i class="fa fa-search" style="margin:5px; padding:5px; color:#0093D9"></i>
                                <input type="text" placeholder="Student name" id="studentsSearch" style="border:none;max-width: 200px; background-color:#E3EDF2; display:inline">
                                <span style="padding:10px; background-color:#548DA9; color:#fff; cursor:pointer" onClick="getstudents('search')">Search</span>
                                <span onClick="getstudentlist()" style="padding:10px; cursor:pointer" title="Refresh grid" class="fa fa-refresh"></span>
                                <select style="max-width:200px; padding:5px; border:none" id="filterstdclass" onChange="getstudents('filter')">
                                    <?php
                                    $d = mysqli_query($w, "select * from schclass");
                                    while ($a = mysqli_fetch_array($d)) {
                                        $classname = $a['ClassName'];
                                        $val = $a['SN'];
                                        echo "<option value='$val'>" . $classname . "</option>";
                                    }
                                    ?>
                                </select>
                                <span style="left:0px; margin-right:5px; top:10px; min-width:100px; padding:3px; padding-left:10px; padding-right:10px; background-color:#AAC7D5; color:#fff; border-radius:4px; cursor:pointer" onclick="excelstudents()">
                                    Excel
                                </span>
                            </span>
                            <div class="col-lg-12" style="min-height:200px; background-color:rgba(255,255,255,0.2); text-align:left; padding:5px; position:relative; margin-top:5px">
                                <div style="font-family:raleway; font-size:20px; font-weight:400; padding:20px; padding-bottom:0px; padding-top:5px; padding-left:0px; margin-bottom:0px">
                                    Students record
                                </div>
                                <div style="margin-bottom:50px">
                                    <div style="max-height:500px; overflow-y: auto">
                                        <table class="table table-condensed table-responsive table-striped" style="font-size:14px; font-family:verdana; font-size:12px; margin-top:10px">
                                            <tr style="font-weight:bold"><td>Student ID</td><td>Student Name</td><td>Class</td><td>Date Of Birth</td><td>Links</td><td>Edit</td></tr>
                                            <tbody id="allstudentsinfo">
                                            </tbody>
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
                                <div class="modal-header" style='background-color:#E8EEF4' id='modalTitle'>
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
            }
            );

        </script>

        <script src="JS/adminJS.js" type="text/javascript"></script>
    </body>
</html>
