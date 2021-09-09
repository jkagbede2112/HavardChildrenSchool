<?php
include 'PHP/databaseSQLconnectn.php';

session_start();
error_reporting(0);

$role = $_SESSION['Role'];
if ($role === "Admin") {
    header('location:dashboard.php');
} elseif ($role === "Teacher") {
    header('location:PortalTeachers.php');
} elseif ($role === "Bursar") {
    
}
?>
<html>
    <head>
        <script src="JS/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="JS/bootstrap.min.js" type="text/javascript"></script>
        <link href="CSS/hcs.css" rel="stylesheet" type="text/css"/>
        <title><?php echo $schoolname ?> Bursar</title>
        <style>
            ::-webkit-scrollbar{
                width:5px;
            }
            ::-webkit-scrollbar-track{
                background:rgba(255,255,255,0.2);
            }
            ::-webkit-scrollbar-thumb{
                background:#99BFD0;
            }
            .title{
                font-family:raleway; margin-bottom:10px; font-size:20px; color:#238B69
            }

            body{
                margin:0px;
                font-family:raleway;
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
            .feemanagermenu{
                padding:20px; 
                padding-top:30px;
                background-color:rgba(255,255,255,0.3); 
                border-radius:5px;
                cursor:pointer;
                transition:0.25s;
            }
            .feemanagermenu:hover{
                background-color:rgba(255,255,255,0.6); 
                transition:0.25s;
                color:#3A6478;
            }
            .afm{
                border-left-color:#F0AD4E;
                border-left-style:solid;
                background-color:rgba(255,255,255,0.8) !important;
                font-weight:bold;
                color:#005E8A;
            }
            .masterregStyle{
                background-color:rgba(255,255,255,0.9); 
                padding:10px; 
                margin-bottom:10px; 
                border-left-width: thick; 
                border-left-style:solid; 
                border-left-color:#5992AC;
                cursor:pointer;
                transition:0.5s
            }
            .masterregStyle:hover{
                border-left-color:#F0AD4E;
                color:#F0AD4E;
                transition:0.5s;
                //background-image:linear-gradient(#fff,#fff,#FEF2CB);
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
                <img src='../images/schoollogo.png' width='80' style='position:absolute; top:10px; left:10px; z-index:50'>
                <div class="fa fa-university activemenu menustyling" id="hme" style="margin-top:80px" onclick="menuitems('#home', '#hme')">
                    <span class="dashmenu">Home</span>
                </div><br/>
                <div class="fa fa-newspaper-o menustyling" id="nwsltters" onclick="menuitems('#newsletters', '#nwsltters')">
                    <span class="dashmenu">Newsletter</span>
                </div><br/>
                <div class="fa fa-newspaper-o menustyling" id="reg" onclick="menuitems('#register', '#reg')">
                    <span class="dashmenu">Registers</span>
                </div><br/>

                <div class="fa fa-money menustyling" id="feemanager" onclick="menuitems('#feemngr', '#feemanager');
                        getFeesummary();">
                    <span class="dashmenu" onclick="">Fee Mgt</span>
                </div><br/>
                <div class="fa fa-database menustyling" id="Tsetting" onclick="menuitems('#tsetng', '#Tsetting')">
                    <span class="dashmenu">Bill Processor</span>
                </div><br/>
            </div>
            <div class="pull-right" style="width:calc(100% - 110px); background-color:#D0E0E8; min-height:100%">
                <div class="clearfix" style="height:50px; background-color:#005E8A; border-bottom-style: solid; border-bottom-width:thin; border-bottom-color:#000; box-shadow:0px 0px 1px #000">
                    <span class='pull-right' style="color:#fff; padding:10px; padding-top:12px; margin-right:20px; cursor:pointer">
                        <a href="logout.php"><i class="fa fa-power-off" style='font-size:20px; position:relative; color:#FFB3B3; text-shadow: 0px 1px 1px #000' title='Log out'></i>  </a>
                    </span>
                    <span class='pull-right' style="color:#fff; display:none; padding:10px; margin-right:20px; cursor:pointer">
                        <i class="fa fa-envelope" style='font-size:20px; position:relative' title='messages' onclick="menuitems('#messages', '#msg')">
                            <span class="iconsAbove" id='dmCount'></span>
                        </i>  
                    </span>
                    <span class='pull-right' style="color:#fff; padding:10px; margin-right:5px; cursor:pointer; display:none" title='ParentCount'>
                        <i class="fa fa-slideshare" style='font-size:20px; position:relative'>
                            <span class="iconsAbove" id="parentCount"></span>
                        </i>  
                    </span>
                    <span class='pull-right' style="color:#fff; padding:10px; margin-right:5px; cursor:pointer; display:none" title='Students'>
                        <i class="fa fa-graduation-cap" style='font-size:20px; position:relative'>
                            <span class="iconsAbove" id="stdcount"></span>

                        </i>  
                    </span>
                </div>
                <div style="height:30px; color:#E3EDF2; font-size:12px; padding:7px; text-align: right; background-image: url('../images/background.jpg'); margin-bottom:20px; box-shadow:0px 0px 1px #000">
                    Welcome <?php echo " " . $_SESSION['Name']; ?> &nbsp; &nbsp; 
                </div>
                <div style='margin:20px'>
                    <div class='row' style='margin:0px;' id="home">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Dashboard
                        </div>
                        <script>
                            function loadpayschedule(session, location) {
                                $.post("PHP/paymentprocessor.php", {action: "displaypayschedule", session: session}).done(function (data) {
                                    document.getElementById(location).innerHTML = data;
                                });
                            }
                        </script>
                        <div class="col-md-4" style="padding-left:0px; padding-right:5px">
                            <select class="form-control" onchange="loadpayschedule(this.value, 'payschedulepane')">
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
                            <div class="col-md-12" style="padding:0px;">
                                <div style="background-color:rgba(255,255,255,0.2); max-height:600px; overflow-y: auto; padding:10px; font-size:12px" id="payschedulepane">
                                    <?php
                                    $k = "select * from paymentcategory order by paymentname asc";
                                    $q = mysqli_query($w, $k);
                                    while ($a = mysqli_fetch_array($q)) {
                                        $paymentname = $a['paymentname'];
                                        $paymentid = $a['categoryid'];

                                        echo "<div class='title'>$paymentname</div>";
                                        $vg = mysqli_query($w, "select * from paycatbreakdown where description='$paymentname'");
                                        $count = 1;
                                        $prep = "<table class='table table-condensed table-bordered table-striped' style='font-size:12px'><tr style='font-weight:600; font-size:13px'><td>S/N</td><td>Description</td><td>Amount</td><td>Remark</td></tr>";
                                        while ($kaz = mysqli_fetch_array($vg)) {
                                            $amount = $kaz['amount'];
                                            $remark = $kaz['remark'];
                                            $paytype = $kaz['paytype'];
                                            $prep .= "<tr><td>$count</td><td>$remark</td><td>$amount</td><td>$paytype</td></tr>";
                                            $count++;
                                        }
                                        echo $prep . "</table>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-left:0px; display:none">
                            <div style="font-family:raleway; font-size:20px; font-weight:bold; margin-bottom:20px">
                                <div>Fee Manager</div>
                                <div style="background-color:rgba(255,255,255,0.2);padding:10px; margin-top:10px; border-radius:4px; min-height:200px">
                                    <table class="table table-condensed table-striped" id="feesummary" style="font-size:12px; font-family:verdana">

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-8' style="padding:0px">
                            <div style="font-family:raleway; font-size:24px; font-weight:400; margin-bottom:5px">
                                Billing profiles
                            </div>
                            <div style="background-color:rgba(255,255,255,0.2); padding:10px">
                                <?php
                                $ga = "select * from paymentcategory order by dateadded desc";
                                $op = mysqli_query($w, $ga);
                                while ($bg = mysqli_fetch_array($op)) {
                                    $payname = $bg['paymentname'];
                                    $paydesc = $bg['paymentdescription'];
                                    $dateadded = $bg['dateadded'];
                                    echo "<span style='display:inline-block; background-color:rgba(0,0,0,0.1); border-radius:4px; padding:12px; font-size:18px; margin-right:5px'>$payname</span>";
                                }
                                ?>
                            </div>
                            <div id="shownevents">

                            </div>
                        </div>
                    </div>
                    <!-- Register -->
                    <div class='row' style='margin:0px; display:none' id="register">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Master Register
                        </div>
                        <div class="col-md-3" style=" padding-top:15px; margin-bottom:20px; min-height:100px">
                            <div style="background-color:rgba(255,255,255,0.4)">
                                <!--<div class="masterregStyle" id='mrbg1' onclick="masterRegister('Bill Generator', 'mrbg1')">Bill Generator</div>-->
                                <div class="masterregStyle" id="mrdr1" onclick="masterRegister('Debt Register', 'mrdr1')">Debt Register</div>
                                <div class="masterregStyle" id="mrpr1" onclick="masterRegister('Payment Register', 'mrpr1')">Payment Register</div>
                                <div class="masterregStyle" id='mrtr1' onclick="masterRegister('Income Per Income Head', 'mrtr1')">Income Per Income Head</div>
                                <div class="masterregStyle" onclick="masterRegister('Parent Register')" style='display:none'>Parent Register</div>
                            </div>
                        </div>
                        <div class="col-md-9" style="padding:0px">
                            <div id="MRDRT" style="font-family:raleway; font-size:20px; color:#A88302; font-weight:500; margin-bottom:10px">

                            </div>
                            <div id="MRDRC" style="background-color: rgba(255,255,255,0.4); min-height:100px; padding:10px">
                                <div id="MRAP" style="display:none; position:relative">
                                    <i class="fa fa-print point" style="right:10px; top:10px; position:absolute" onclick="printDiv('fh8j')" title="Print Payments Register"></i>
                                    <div id="qwerty">
                                        <select id="payterm">
                                            <option>First term</option>
                                            <option>Second term</option>
                                            <option>Third term</option>
                                        </select>
                                        <select id="paysession">
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
                                        <select class="form-control" style="max-width:200px; display:inline; margin-bottom:10px" id="fgh876">
                                            <?php
                                            $gg = mysqli_query($w, "select * from schclass order by ClassName ASC");
                                            while ($aa = mysqli_fetch_array($gg)) {
                                                $sn = $aa['SN'];
                                                echo "<option value='$sn'>" . $aa['ClassName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="btn btn-warning" onclick="searchpaye(fgh876.value, payterm.value, paysession.value)">Search Payment Register</span>
                                    </div>
                                    <div id='fh8j'>
                                        <div style='font-family:raleway; font-weight:bold; font-size:20px; text-align: center; margin-bottom:20px'><?php echo $schoolname ?><br>Payments Register<br></div>
                                        <table class="table table-condensed table-striped" style="font-size:12px; font-family:verdana">
                                            <tr style='font-weight:bold'><td></td><td>Name</td><td>Class</td><td>Term</td><td>Session</td><td>Amount</td></tr>
                                            <tbody  id="11131">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <script>
                                function pullbillcatopts(a){
                                    $.post("PHP/billprocessor.php",{catsel:a, action:'pullbillitems'}).done(function(data){
                                        document.getElementById("billcategoryoptions").innerHTML = data;
                                    });
                                }
                                </script>
                                <div id="MRAT" style="display:none; position:relative">
                                    <i class="fa fa-print point" style="right:10px; top:10px; position:absolute" onclick="printDiv('jjad')" title="Print Teller Register"></i>
                                    <div>
                                        <label>Category</label><br>
                                        <select class="form-control" style="max-width:300px; display:inline; margin-bottom:10px" id="y712377" onchange='pullbillcatopts(this.value)'>
                                        <option>-select-</option>
                                            <?php
                                            $gg = mysqli_query($w, "select distinct(description) from paycatbreakdown order by description ASC");
                                            while ($aa = mysqli_fetch_array($gg)) {
                                                echo "<option>" . $aa['description'] . "</option>";
                                            }
                                            ?>
                                        </select><br>
                                        <label>Category</label>
                                        <select style='max-width:300px; margin-bottom:10px' class='form-control' id='billcategoryoptions'>
                                         
                                        </select>
                                        <span class="btn btn-warning" style='max-width:300px' onclick="searchpayed(billcategoryoptions.value)">Search Teller Register</span>
                                    </div>
                                    <div id='jjad'>
                                        <div style='font-family:raleway; font-weight:bold; font-size:20px; text-align: center; margin-bottom:20px'><?php echo strtoupper($schoolname); ?><br>..<br></div>
Students not on this list have not made any payment.
                                        <table class="table table-condensed table-striped" style="font-size:12px; font-family:verdana" id="554765">
                                        <tr><td></td><td>Pupil's name</td><td>Amount</td><td>Paid</td><td>Outstanding</td></tr>
                                            <tbody id='tbillscontent'>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="MRAD" style="display:none; position:relative">
                                    <i class="fa fa-print point" style="right:10px; top:10px; position:absolute"  onclick="printDiv('hh11')"title="Print Debtor Register"></i>
                                    <div>
                                        <select id="debtterm">
                                            <option>First term</option>
                                            <option>Second term</option>
                                            <option>Third term</option>
                                        </select>
                                        <select id="debtsession">
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
                                        <select class="form-control" id="fads2" style="max-width:200px; display:inline; margin-bottom:10px">
                                            <?php
                                            $gg = mysqli_query($w, "select * from schclass order by ClassName ASC");
                                            while ($aa = mysqli_fetch_array($gg)) {
                                                $schvalue = $aa['SN'];
                                                echo "<option value='$schvalue'>" . $aa['ClassName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="btn btn-warning" onclick ='showdebtors(debtterm.value, debtsession.value,fads2.value)'>Search Defaulters Register</span>
                                    </div>
                                    <div id="hh11">
                                        <div style='font-family:raleway; font-weight:bold; font-size:20px; text-align: center; margin-bottom:20px'><?php echo strtoupper($schoolname) ?><br>Debtor's list<br></div>

                                        <table class="table table-condensed table-striped table-striped" style="font-family:verdana; font-size:13px">
                                            <tr style='font-weight:bold'><td></td><td>Name</td><td>Class</td><td>Term</td><td>Session</td><td>Bill</td><td>Paid</td><td>Debt</td><td></td></tr>
                                            <tbody id="mradtable">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of list and emailing -->
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
                    <div class='row' style='margin:0px; display:none' id="tsetng">
                        <div style="font-family:raleway; font-size:30px; margin-bottom:20px">
                            Bill processor
                        </div>
                        <div style='font-size:15px; margin-bottom:20px'>
                            <script>
                                function billproc(a, b) {
                                    $("#bpgeneratebill").hide();
                                    $("#bpprintbill").hide();
                                    $("#bppaybill").hide();
                                    $("#bpreceiptbill").hide();
                                    $("#bppaytbill").hide();
                                    $(b).show();

                                    $(".bp").removeClass("bpactive");
                                    $(a).addClass("bpactive");
                                }
                            </script>
                            <span class="bp bpactive" id='genbill' onclick="billproc('#genbill', '#bpgeneratebill')" style='background-color:rgba(0,0,0,0.4); color:#fff;'>Prepare Invoice</span>
                            <span class="bp" id='prntbill' onclick="billproc('#prntbill', '#bpprintbill')">Print Bill</span>
                            <span class="bp" id='paybill' onclick="billproc('#paybill', '#bppaybill')">Pay Invoice</span>
                            <span class="bp" id='receiptbill' onclick="billproc('#receiptbill', '#bpreceiptbill')">Receipts</span>
                            <span class="bp" id='timebill' onclick="billproc('#timebill', '#bppaytbill')">Payment timeline</span>
                        </div>
                        <script>
                            function getstdnames(classid, destination) {
                                $.post("PHP/getstudents.php", {action: "getstudentsinfo", classid: classid}).done(function (data) {
                                    //alert(data);
                                    document.getElementById(destination).innerHTML = data;
                                });
                            }
                        </script>
                        <div id="bpreceiptbill" style="display:none">
<div class="col-md-4">
                                <div style="min-height:200px; margin-bottom:10px; padding-top:15px; background-color:rgba(255,255,255,0.1)">
                                    <label>Class</label>
                                    <select class='form-control' id='gbclassr' style='margin-bottom:5px' onchange='getstdnames(this.value, "pullstdnamezzr")'>
                                        <option>--Select--</option>
                                        <?php
                                        $aq = "select * from schclass";
                                        $j = mysqli_query($w, $aq);

                                        while ($gt = mysqli_fetch_array($j)) {
                                            $sn = $gt['SN'];
                                            $classname = $gt['ClassName'];
                                            echo "<option value='$sn'>$classname</option>";
                                        }
                                        ?>
                                    </select>

                                    <label>Student Name</label>
                                    <select class='form-control' style='margin-bottom:5px' id='pullstdnamezzr'>
                                        <option>--Select Student--</option>
                                    </select>
                                    <label>Session</label>
                                    <select class='form-control' style='margin-bottom:5px' id='gbsessionr'>
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
                                    <label>Term</label>
                                    <select class='form-control' style='margin-bottom:5px' id='gbtermr'>
                                        <option>First term</option>
                                        <option>Second term</option>
                                        <option>Third term</option>
                                    </select>
                                    <input type='button' value='Get Receipt' class='btn btn-success' style='width:100%' onclick='getreceipt()'>
                                </div>
                            </div>
                            <div class='col-md-8' style='padding:5px'>
                                <div style="min-height:200px; margin-bottom:10px; padding:10px; background-color:rgba(255,255,255,0.8)">
                                    <input type='button' value='Print' onclick="printDiv('printinvois')"><hr style='margin-top:2px; border-color:#000; border-style:dashed'>
                                    <div id="printinvois" style="position:relative">
                                        <img src="../images/schoollogo.png" style="position:absolute; left:10px; top:20px; width:100px">
                                        <div style="text-align:center; font-weight:bold; font-family:verdana; font-size:14px">Havard High School</div>
                                        <div style="text-align:center; font-size:13px">"Great Learning, Great Fun!"</div>
                                        <div style="text-align:center; font-size:12px">Plot 10 & 12 Taiwo Oguns Street, KM 32 Along Lagos-Ibadan Express Way, Arepo, Ogun State</div>
                                        <div style="text-align:center; font-size:12px">Tel: 08035696773, 08096011244, Email: info@havardcs.com, website: www.havardcs.com</div>
                                        <div style="padding:5px; text-align:center; font-weight:bold; background-color:rgba(0,0,0,0.1); margin-top:10px; margin-bottom:10px">TERMLY SCHOOL RECEIPT</div>
                                        <div id="stdbillinvoices">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bppaybill" style="display:none">
                            <div class="col-md-4">
                                <div style="min-height:200px; margin-bottom:10px; padding-top:15px; background-color:rgba(255,255,255,0.1)">
                                    <label>Class</label>
                                    <select class='form-control' id='gbpbclass' style='margin-bottom:5px' onchange='getstdnames(this.value, "pullstdnamezzz")'>
                                        <option>--Select--</option>
                                        <?php
                                        $aq = "select * from schclass";
                                        $j = mysqli_query($w, $aq);

                                        while ($gt = mysqli_fetch_array($j)) {
                                            $sn = $gt['SN'];
                                            $classname = $gt['ClassName'];
                                            echo "<option value='$sn'>$classname</option>";
                                        }
                                        ?>
                                    </select>
                                    <label>Student Name</label>
                                    <select class='form-control' style='margin-bottom:5px' id='pullstdnamezzz'>
                                        <option>--Select Student--</option>
                                    </select>
                                    <label>Session</label>
                                    <select class='form-control' style='margin-bottom:5px' id='gbpbsession'>
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
                                    <label>Term</label>
                                    <select class='form-control' style='margin-bottom:5px' id='gbpbterm'>
                                        <option>First term</option>
                                        <option>Second term</option>
                                        <option>Third term</option>
                                    </select>
                                    <input type='button' value='Retrieve Invoice' class='btn btn-success' style='width:100%' onclick='getinvoicebill()'>
                                </div>
                            </div>
                            <script>
                            function deleteinvitem(a){

                            $.post("PHP/billprocessor.php",{action:"delinvitem",itemid:a}).done(function(data){
                                alert(data);
                            });   
                            }

function actinvdel(a){
    $(a).show();
}
                                function getinvoicebill() {
                                    var classid = document.getElementById("gbpbclass").value;
                                    var stdname = document.getElementById("pullstdnamezzz").value;
                                    var term = document.getElementById("gbpbterm").value;
                                    var sessiond = document.getElementById("gbpbsession").value;
                                    $.post("PHP/billprocessor.php", {action: "getbillinvoice", classid: classid, stdname: stdname, term: term, sessiond: sessiond}).done(function (data) {
                                        document.getElementById("stddbpayinvoice").innerHTML = data;
                                    });
                                }
                                function getinvoicebillt() {
                                    var classid = document.getElementById("gbpbclasst").value;
                                    var stdname = document.getElementById("pullstdnamezzzt").value;
                                    var term = document.getElementById("gbpbtermt").value;
                                    var sessiond = document.getElementById("gbpbsessiont").value;
                                    $.post("PHP/billprocessor.php", {action: "getbillinvoicet", classid: classid, stdname: stdname, term: term, sessiond: sessiond}).done(function (data) {
                                        document.getElementById("stddbpayinvoicet").innerHTML = data;
                                    });
                                }
                            </script>
                            <div class='col-md-8' style='padding:5px'>
                                <div style="min-height:200px; margin-bottom:10px; padding:10px; background-color:rgba(255,255,255,0.8)">
                                    <div id="printinvoi" style="position:relative">
                                        <div id="stddbpayinvoice">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bppaytbill" style="display:none">
                            <div class="col-md-4">
                                <div style="min-height:200px; margin-bottom:10px; padding-top:15px; background-color:rgba(255,255,255,0.1)">
                                    <label>Class</label>
                                    <select class='form-control' id='gbpbclasst' style='margin-bottom:5px' onchange='getstdnames(this.value, "pullstdnamezzzt")'>
                                        <option>--Select--</option>
                                        <?php
                                        $aq = "select * from schclass";
                                        $j = mysqli_query($w, $aq);

                                        while ($gt = mysqli_fetch_array($j)) {
                                            $sn = $gt['SN'];
                                            $classname = $gt['ClassName'];
                                            echo "<option value='$sn'>$classname</option>";
                                        }
                                        ?>
                                    </select>
                                    <label>Student Name</label>
                                    <select class='form-control' style='margin-bottom:5px' id='pullstdnamezzzt'>
                                        <option>--Select Student--</option>
                                    </select>
                                    <label>Session</label>
                                    <select class='form-control' style='margin-bottom:5px' id='gbpbsessiont'>
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
                                    <label>Term</label>
                                    <select class='form-control' style='margin-bottom:5px' id='gbpbtermt'>
                                        <option>First term</option>
                                        <option>Second term</option>
                                        <option>Third term</option>
                                    </select>
                                    <input type='button' value='Retrieve Invoice' getinvoicebill()class='btn btn-success' style='width:100%' onclick='getinvoicebillt()'>
                                </div>
                            </div>
                            <div class='col-md-8' style='padding:5px'>
                                <div class="col-md-12" style="min-height:200px; margin-bottom:10px; padding:5px; background-color:rgba(255,255,255,0.8)">
                                    <div id="printinvoi" style="position:relative">
                                        <div id="stddbpayinvoicet">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id='bpgeneratebill'>
                            <div class="col-md-3" style='padding:5px'>
                                <div style="min-height:200px; margin-bottom:10px; padding-top:15px; background-color:rgba(255,255,255,0.1)">
                                    <b>GENERATE BILL</b><hr style='margin-top:2px; border-color:#000; border-style:dashed'>
                                    <script>
                                        function createbill() {
                                            var classid = document.getElementById('cbclass').value;
                                            var studentname = document.getElementById('pullstdnamez').value;
                                            var session = document.getElementById('cbsession').value;
                                            var term = document.getElementById('cbterm').value;
                                            var action = "createbill";
                                            $.post("PHP/billprocessor.php", {action: action, classid: classid, studentname: studentname, session: session, term: term}).done(function (data) {
                                                document.getElementById('billitemshere').innerHTML = data;
                                            });
                                        }
                                        function getbill() {
                                            var classid = document.getElementById('gbclass').value;
                                            var studentname = document.getElementById('pullstdnamezz').value;
                                            var session = document.getElementById('gbsession').value;
                                            var term = document.getElementById('gbterm').value;
                                            var action = "getbill";
                                            $.post("PHP/billprocessor.php", {action: action, classid: classid, studentname: studentname, session: session, term: term}).done(function (data) {
                                                document.getElementById('stdbillinvoice').innerHTML = data;
                                            });
                                        }
                                        function getreceipt(){
                                            var classid = document.getElementById('gbclassr').value;
                                            var studentname = document.getElementById('pullstdnamezzr').value;
                                            var session = document.getElementById('gbsessionr').value;
                                            var term = document.getElementById('gbtermr').value;
                                            var action = "getreceipt";
                                            $.post("PHP/billprocessor.php", {action: action, classid: classid, studentname: studentname, session: session, term: term}).done(function (data) {
                                                document.getElementById('stdbillinvoices').innerHTML = data;
                                            });
                                        }
                                    </script>
                                    <label>Class</label>
                                    <select class='form-control' id='cbclass' style='margin-bottom:5px' onchange='getstdnames(this.value, "pullstdnamez")'>
                                        <option>--Select--</option>
                                        <?php
                                        $aq = "select * from schclass";
                                        $j = mysqli_query($w, $aq);

                                        while ($gt = mysqli_fetch_array($j)) {
                                            $sn = $gt['SN'];
                                            $classname = $gt['ClassName'];
                                            echo "<option value='$sn'>$classname</option>";
                                        }
                                        ?>
                                    </select>

                                    <label>Student Name</label>
                                    <select class='form-control' style='margin-bottom:5px' id='pullstdnamez'>
                                        <option>--Select Student--</option>
                                    </select>
                                    <label>Session</label>
                                    <select class='form-control' style='margin-bottom:5px' id='cbsession'>
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
                                    <label>Term</label>
                                    <select class='form-control' style='margin-bottom:5px' id='cbterm'>
                                        <option>First term</option>
                                        <option>Second term</option>
                                        <option>Third term</option>
                                    </select>
                                    <input type='button' value='Create Termly School Bill' class='btn btn-success' style='width:100%' onclick='createbill()'>
                                </div>
                            </div>
                            <div class='col-md-6' style='padding:5px'>
                                <div style="min-height:200px; margin-bottom:10px; padding-top:15px; background-color:rgba(255,255,255,0.1)">
                                    <b>BILL ITEMS...</b><hr style='margin-top:2px; border-color:#000; border-style:dashed'>
                                    <div id='billitemshere'>

                                    </div>
                                </div>
                            </div>

                            <!--
                            <div class="col-lg-6" style="min-height:200px; padding-top:15px; background-color:rgba(255,255,255,0.2)">
                                <div style='margin-top:10px;' id='messageSample'>
    
                                </div>
                                <div style='text-align: center'>
                                    <div style='text-align: left' id='Pmsge'>
                            <?php
                            $s = mysqli_query($w, "select * from defaultmessage order by sn desc");
                            $a = mysqli_fetch_array($s);

                            echo $a['defaultmessage'];
                            ?>
                                    </div>
                                    <hr style='border-color: #2E4E5D; border-style:dashed; border-width:thin'>
                                    <span style='color:red'>Student's payment timeline will be attached here</span>
                                </div>
                            </div>
                            -->
                        </div>
                        <div id='bpprintbill' style="display:none">
                            <div class="col-md-4">
                                <div style="min-height:200px; margin-bottom:10px; padding-top:15px; background-color:rgba(255,255,255,0.1)">
                                    <label>Class</label>
                                    <select class='form-control' id='gbclass' style='margin-bottom:5px' onchange='getstdnames(this.value, "pullstdnamezz")'>
                                        <option>--Select--</option>
                                        <?php
                                        $aq = "select * from schclass";
                                        $j = mysqli_query($w, $aq);

                                        while ($gt = mysqli_fetch_array($j)) {
                                            $sn = $gt['SN'];
                                            $classname = $gt['ClassName'];
                                            echo "<option value='$sn'>$classname</option>";
                                        }
                                        ?>
                                    </select>

                                    <label>Student Name</label>
                                    <select class='form-control' style='margin-bottom:5px' id='pullstdnamezz'>
                                        <option>--Select Student--</option>
                                    </select>
                                    <label>Session</label>
                                    <select class='form-control' style='margin-bottom:5px' id='gbsession'>
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
                                    <label>Term</label>
                                    <select class='form-control' style='margin-bottom:5px' id='gbterm'>
                                        <option>First term</option>
                                        <option>Second term</option>
                                        <option>Third term</option>
                                    </select>
                                    <input type='button' value='Get Bill' class='btn btn-success' style='width:100%' onclick='getbill()'>
                                </div>
                            </div>
                            <div class='col-md-8' style='padding:5px'>
                                <div style="min-height:200px; margin-bottom:10px; padding:10px; background-color:rgba(255,255,255,0.8)">
                                    <input type='button' value='Print' onclick="printDiv('printinvoixs')"><hr style='margin-top:2px; border-color:#000; border-style:dashed'>
                                    <div id="printinvoixs" style="position:relative">
                                        <img src="../images/schoollogo.png" style="position:absolute; left:10px; top:20px; width:100px">
                                        <div style="text-align:center; font-weight:bold; font-family:verdana; font-size:14px">Havard High School</div>
                                        <div style="text-align:center; font-size:13px">"Great Learning, Great Fun!"</div>
                                        <div style="text-align:center; font-size:12px">Plot 10 & 12 Taiwo Oguns Street, KM 32 Along Lagos-Ibadan Express Way, Arepo, Ogun State</div>
                                        <div style="text-align:center; font-size:12px">Tel: 08035696773, 08096011244, Email: info@havardcs.com, website: www.havardcs.com</div>
                                        <div style="padding:5px; text-align:center; font-weight:bold; background-color:rgba(0,0,0,0.1); margin-top:10px; margin-bottom:10px">TERMLY SCHOOL BILL</div>
                                        <div id="stdbillinvoice" style='display:block !important'>
hihihihiihi
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

                    <div class='row' style='margin:0px; display:none' id="feemngr">
                        <div style='margin-top:20px; margin-bottom:30px; padding:0px' class="col-lg-12 col-md-12 hidden-sm hidden-xs">
                            <span class='feemanagermenu afm' title='Fees Category' id="sf_ac" onclick="subfee('#feecategory', '#sf_ac')">
                                <i class="fa fa-user-plus" style="font-size:30px; color:#A88302"></i>
                                <span>Add category</span>
                            </span>&nbsp; 
                            <!--
                            <span class='feemanagermenu' title='Pay Fees' id="sf_pf" onclick="subfee('#feepayment', '#sf_pf')">
                                <i class="fa fa-leanpub" style="font-size:30px; color:#A88302"></i>
                                <span>Pay Fees</span>
                            </span>&nbsp;
                            <span class='feemanagermenu' title='Fee Summary' id="sf_fs" onclick="subfee('#feesummaryq', '#sf_fs')">
                                <i class="fa fa-user-plus" style="font-size:30px; color:#A88302"></i>
                                <span>Fee Summary</span>
                            </span>&nbsp;
                            <span class='feemanagermenu' title='View Payment register' id="sf_pr" onclick="subfee('#payregister', '#sf_pr')">
                                <i class="fa fa-user-plus" style="font-size:30px; color:#A88302"></i>
                                <span>Payment Register</span>
                            </span>&nbsp;
                            <span class='feemanagermenu' title='View Teller Register' id="sf_tl" onclick="subfee('#tellersummary', '#sf_tl')">
                                <i class="fa fa-user-plus" style="font-size:30px; color:#A88302"></i>
                                <span>Teller Register</span>
                            </span>
                            -->
                            <hr style='margin-top:40px; border-color:#5992AC; border-style:dotted'/>
                        </div>
                        <select class="hidden-lg hidden-md" style="padding:10px; font-size:20px">
                            <option><span onchange="subfee('#feecategory', '#sf_ac')">Add Category</span></option>
                            <option onchange="subfee('#feepayment', '#sf_pf')">Pay Fees</option>
                            <option onchange="subfee('#feesummaryq', '#sf_fs')">Fee Summary</option>
                            <option onchange="subfee('#payregister', '#sf_pr')">Payment Register</option>
                            <option onchange="subfee('#tellersummary', '#sf_tl')">Teller Register</option>
                        </select>

                        <div class="col-lg-12 col-md-12 col-sm-12" id="feecategory" style="padding-left:0px">
                            <div class="col-lg-4 col-md-6 col-sm-12" style="padding-top:0px; padding:5px; min-height:100px;">
                                <div style="background-color:rgba(255,255,255,0.2); padding:5px; margin-bottom:20px">
                                    <label>Class name</label>
                                    <select class='form-control' id='catname' style='margin-bottom:10px'>
                                        <?php
                                        $aq = "select * from schclass";
                                        $j = mysqli_query($w, $aq);

                                        while ($gt = mysqli_fetch_array($j)) {
                                            $sn = $gt['SN'];
                                            $classname = $gt['ClassName'];
                                            echo "<option>$classname</option>";
                                        }
                                        ?>
                                    </select>
                                    <label>Session</label>
                                    <input type='text' placeholder='e.g 2017/2018' class='form-control' id='catsession' style='margin-bottom:10px'>
                                    <label>Term</label>
                                    <select class='form-control' id='catterm' style='margin-bottom:10px'>
                                    <option value='ft'>First Term</option>
                                    <option value='st'>Second Term</option>
                                    <option value='tt'>Third Term</option>
                                    </select>
                                    <label>Category description</label>
                                    <textarea class='form-control' style='margin-bottom:10px' id='catdesc'></textarea>
                                    <input type="button" onclick="addcategory()" value="Add" class="btn btn-success" style="width:100%">
                                </div> 
                            </div>
                            <script>
                                function addcategory() {
                                    var catname = document.getElementById("catname").value;
                                    var description = document.getElementById("catdesc").value;
                                    var catterm = document.getElementById("catterm").value;
                                    var catsessio = document.getElementById("catsession").value;
                                    //var catsession =catsessio + catterm;
                                    var action = "addcategory";
                                    $.post("PHP/bursar.php", {action: action, catsession: catsessio, catterm:catterm, catname: catname, catdesc: description}).done(function (data) {
                                        alert(data);
                                    });
                                }
                            </script>
                            <div class="col-lg-4 col-md-6 col-sm-12" style="padding:5px; min-height:400px;">
                                <div style="background-color:rgba(255,255,255,0.2); padding:5px; margin-bottom:20px">
                                    <label>Category</label>
                                    <select id="cattype" class="form-control" style="margin-bottom:10px">

                                        <?php
                                        $gg = mysqli_query($w, "select * from paymentcategory order by  dateadded desc limit 50");
                                        while ($aa = mysqli_fetch_array($gg)) {
                                            $sessioname = $aa['session'];
                                            echo "<option>" . $aa['paymentname'] . " - " . $sessioname . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <label>Item </label>
                                    <input type="text" class="form-control" style="margin-bottom:10px" id="catitem">
                                    <label>Amount</label>
                                    <input type="number" class="form-control" style="margin-bottom:10px" id="catamount">
                                    <label>Payment type</label>
                                    <select class="form-control" style="margin-bottom:10px" id="catpaytype">
                                        <option>Optional</option>
                                        <option>Once</option>
                                        <option>Sessional</option>
                                        <option>Terminal</option>
                                    </select>
                                    <input type="button" onclick="addpaybreakdown()" value="Add" class="btn btn-success" style="width:100%">
                                </div> 
                            </div>
                            <script>
                                function addpaybreakdown() {
                                    var cat = document.getElementById("cattype").value;
                                    var catitem = document.getElementById("catitem").value;
                                    var catamount = document.getElementById("catamount").value;
                                    var catpaytype = document.getElementById("catpaytype").value;
                                    var action = "addfeebreakdown";
                                    $.post("PHP/bursar.php", {action: action, cat: cat, catitem: catitem, catamount: catamount, catpaytype: catpaytype}).done(function (data) {
                                        alert(data);
                                    });
                                }
                            </script>
                            <div class="col-md-4" style="padding-left:0px">
                                <div style="background-color:rgba(255,255,255,0.2); max-height:400px; overflow-y: auto; padding:10px; font-size:12px">
                                    <select class="form-control" onchange="loadpayschedule(this.value, 'payviewthings')">
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
                                    <div id='payviewthings'>
                                        <?php
                                        $k = "select * from paymentcategory order by paymentname asc";
                                        $q = mysqli_query($w, $k);
                                        while ($a = mysqli_fetch_array($q)) {
                                            $paymentname = $a['paymentname'];
                                            $paymentid = $a['categoryid'];

                                            echo "<div class='title'>$paymentname</div>";
                                            $vg = mysqli_query($w, "select * from paycatbreakdown where description='$paymentname'");
                                            $count = 1;
                                            $prep = "<table class='table table-condensed table-bordered table-striped' style='font-size:12px'><tr style='font-weight:600; font-size:13px'><td>S/N</td><td>Description</td><td>Amount</td><td>Remark</td><td></td></tr>";
                                            while ($kaz = mysqli_fetch_array($vg)) {
                                                $amount = $kaz['amount'];
                                                $remark = $kaz['remark'];
                                                $paytype = $kaz['paytype'];
                                                $prep .= "<tr><td>$count</td><td>$remark</td><td>$amount</td><td>$paytype</td><td><i class='fa fa-times'></i></td></tr>";
                                                $count++;
                                            }
                                            echo $prep . "</table>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -->
                        <div class="col-lg-12 col-md-12" style="padding-left:0px; display:none" id="tellersummary">
                            <div style="margin-bottom:10px; margin-top:10px; font-family:raleway; font-size:25px">Teller Register</div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.2); min-height:100px; padding:0px; padding-top:15px; margin-right:10px; margin-bottom:20px">
                                <div style="font-family:raleway; margin-bottom:20px; margin-left:10px; font-weight:bold; color:#005E8A">Search Teller Register</div>
                                <div style="margin-bottom:20px; margin-left:10px; margin-right:10px; border-bottom-style:solid; border-bottom-color:#C2D7E2;border-top-style:solid; border-width:thin; border-top-color:#C2D7E2; padding:15px; background-color:rgba(255,255,255,0.5);">
                                    <label>Term</label>
                                    <select class="form-control" style="margin-bottom:10px; max-width:200px; display:inline" id="TRT">
                                        <option>First Term</option>
                                        <option>Second Term</option>
                                        <option>Third Term</option>
                                    </select>
                                    <label>Session</label>
                                    <select class="form-control" style="margin-bottom:10px; max-width:200px; display:inline" id="TRS">
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
                                    <br>
                                    <input type="text" placeholder="Teller Number" id="TRTN" class="form-control" style="max-width:200px; display:inline">
                                    <span class="btn btn-warning" onclick="searchTel('TellerNumber', 'TRTN');">Search Teller Register</span>
                                    <input type="text" placeholder="Receipt Number" class="form-control" id="TRRN" style="max-width:200px; display:inline">
                                    <span class="btn btn-success" onclick="searchTel('receiptID', 'TRRN')">Search Receipt store</span>
                                    <select type="text" class="form-control" style="max-width:200px; display:inline" id="TRC" >
                                        <?php
                                        $gg = mysqli_query($w, "select * from schclass order by ClassName ASC");
                                        while ($aa = mysqli_fetch_array($gg)) {
                                            $classid = $aa['SN'];
                                            echo "<option value='$classid'>" . $aa['ClassName'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <span class="btn btn-success" onclick="searchTel('class_id', 'TRC')">Search Class</span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.2); min-height:100px; max-height:600px; overflow-y:auto">
                                    <table class="table table-condensed table-striped" style="font-size:12px; font-family:verdana" id="tellerDets">
                                        <?php
                                        $sdfk = mysqli_query($w, "select * from fee_transaction order by SN desc");
                                        echo "<tr style='font-weight:bold'><td></td><td>Teller Number</td><td>Student Name</td><td>Class</td><td>Bank</td><td>Amount</td><td>Payment Date</td><td>Date Submitted</td><td>Term</td><td>Session</td><td>Receipt Issued</td></tr>";
                                        $count = 1;
                                        while ($a = mysqli_fetch_array($sdfk)) {
                                            $stdID = $a['student_id'];
                                            $gg = mysqli_query($w, "select * from schstudent where StudentID ='$stdID'");
                                            $ji = mysqli_fetch_array($gg);
                                            $studentName = $ji['Surname'] . " " . $ji['Firstname'];
                                            $tellerNumber = $a['TellerNumber'];

                                            echo "<tr><td>" . $count . "</td><td>" . $tellerNumber . "</td><td>" . $studentName . "</td><td>" . $a['class_id'] . "</td><td>" . $a['Bank'] . "</td><td><strike>N</strike>" . $a['amount'] . "</td><td>" . $a['DatePaid'] . "</td><td>" . $a['date'] . "</td><td>" . $a['Term'] . "</td><td>" . $a['Session'] . "</td><td>" . $a['receiptID'] . "</td></tr>";

                                            $count++;
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-8" style="padding-left:0px; padding-top:10px; padding-right:0px">
                                <div style="margin-bottom:10px; display:none">
                                    <div style="background-color:rgba(255,255,255,0.2); padding:10px; position:relative">
                                        <i class="fa fa-close point" style="position:absolute; right:10px; top:10px" title="Close pane" onclick="$('#PHP').hide(100);"></i>
                                        <span style="margin-bottom:10px; margin-top:0px; font-family:raleway; font-size:25px">Payment History</span>
                                        <hr style="margin-top:10px">

                                        <table class="table table-condensed table-responsive table-striped" id="payhisth" style="font-family:verdana; margin-top:10px; font-size:12px">
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12" style="padding-left:0px; display:none" id="payregister">
                            <div style="margin-bottom:10px; margin-top:10px; font-family:raleway; font-size:25px" onclick="alert('receiptID', '#PRRN')">Payment Register</div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.2); min-height:100px; padding:0px; padding-top:15px; margin-right:10px; margin-bottom:20px">

                                <div style="padding-left:10px; padding-right:10px; padding-bottom:5px">
                                    <div style="font-family:raleway; margin-bottom:20px; font-weight:bold; color:#005E8A">Search Payment Register</div>
                                    <div style="margin-bottom:20px;border-bottom-style:solid; border-bottom-color:#C2D7E2;border-top-style:solid; border-width:thin; border-top-color:#C2D7E2; padding:15px; background-color:rgba(255,255,255,0.5);">
                                        <label>Term</label>
                                        <select class="form-control" style="margin-bottom:10px; max-width:200px; display:inline" id="PRT">
                                            <option>First Term</option>
                                            <option>Second Term</option>
                                            <option>Third Term</option>
                                        </select>
                                        <label>Session</label>
                                        <select class="form-control" style="margin-bottom:10px; max-width:200px; display:inline" id="PRS">
                                            <?php
                                                    $year = date("Y");
                                                    $yearlast = $year - 1;
                                                    $a = 4;
                                                    $d = 1;
                                                    while ($a > 1) {
                                                        echo "<option>$yearlast/$year</option>";
                                                        $year = date("Y") - $d;
                                                        $yearlast = $year - 1;
                                                        $a--;
                                                        $d++;
                                                    }
                                                    ?>
                                        </select>
                                        <br>
                                        <input type="text" placeholder="Teller Number" id="PRTN" class="form-control" style="max-width:200px; display:inline">
                                        <span class="btn btn-warning" onclick="searchPay('TellerNumber', 'PRTN');">Search Teller Register</span>
                                        <input type="text" placeholder="Receipt Number" class="form-control" id="PRRN" style="max-width:200px; display:inline">
                                        <span class="btn btn-success" onclick="searchPay('receiptID', 'PRRN')">Search Receipt store</span>
                                        <select type="text" class="form-control" style="max-width:200px; display:inline" id="PRC" >
                                            <?php
                                            $gg = mysqli_query($w, "select * from schclass order by ClassName ASC");
                                            while ($aa = mysqli_fetch_array($gg)) {
                                                echo "<option>" . $aa['ClassName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="btn btn-success" onclick="searchPay('class_id', 'PRC')">Search Class</span>
                                    </div>

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" max-height:600px; overflow-y:auto">
                                    <div id="paymentThings" style="font-family:raleway; font-size:18px; color:#005E8A; text-align: center"></div><hr style="margin:10px; padding:0px">
                                    <table class="table table-condensed table-striped" style="font-size:12px; font-family:verdana" id="Payday">
                                        <?php
                                        $sdfk = mysqli_query($w, "select * from fee_transaction order by SN desc");
                                        echo "<tr style='font-weight:bold'><td></td><td>Name</td><td>Class</td><td>Term</td><td>Session</td><td>Amount</td><td>ReceiptNumber</td></tr>";
                                        $count = 1;
                                        while ($a = mysqli_fetch_array($sdfk)) {
                                            $stdID = $a['student_id'];
                                            $gg = mysqli_query($w, "select * from schstudent where StudentID ='$stdID'");
                                            $ji = mysqli_fetch_array($gg);
                                            $studentName = $ji['Surname'] . " " . $ji['Firstname'];

                                            echo "<tr><td>" . $count . "</td><td>" . $studentName . "</td><td>" . $a['class_id'] . "</td><td>" . $a['Term'] . "</td><td>" . $a['Session'] . "</td><td><strike>N</strike>" . $a['amount'] . "</td><td>" . $a['receiptID'] . "</td></tr>";

                                            $count++;
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-8" style="padding-left:0px; padding-top:10px; padding-right:0px">
                                <div style="margin-bottom:10px; display:none">
                                    <div style="background-color:rgba(255,255,255,0.2); padding:10px; position:relative">
                                        <i class="fa fa-close point" style="position:absolute; right:10px; top:10px" title="Close pane" onclick="$('#PHP').hide(100);"></i>
                                        <span style="margin-bottom:10px; margin-top:0px; font-family:raleway; font-size:25px">Payment History</span>
                                        <hr style="margin-top:10px">
                                        <table class="table table-condensed table-responsive table-striped" id="payhisth" style="font-family:verdana; margin-top:10px; font-size:12px">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12" style="padding-left:0px; display:none" id="feesummaryq">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-left:0px; margin-bottom:15px">
                                <select id="drClass" class="form-control" style="max-width:150px; display:inline ">
                                    <?php
                                    $gg = mysqli_query($w, "select * from schclass order by ClassName ASC");
                                    while ($aa = mysqli_fetch_array($gg)) {
                                        $classid = $aa['SN'];
                                        echo "<option value='$classid'>" . $aa['ClassName'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <select id="drTerm" class="form-control" style="max-width:150px; display:inline">
                                    <option>First Term</option>
                                    <option>Second Term</option>
                                    <option>Third Term</option>
                                </select>
                                <select id="drSession" class="form-control" style="max-width:150px; display:inline">
                                    <?php
                                                    $year = date("Y");
                                                    $yearlast = $year - 1;
                                                    $a = 4;
                                                    $d = 1;
                                                    while ($a > 1) {
                                                        echo "<option>$yearlast/$year</option>";
                                                        $year = date("Y") - $d;
                                                        $yearlast = $year - 1;
                                                        $a--;
                                                        $d++;
                                                    }
                                                    ?>
                                </select>
                                <span class="btn btn-success" onclick="getfeerecords()">Display records</span>
                                <div style="margin-bottom:10px; margin-top:10px; font-family:raleway; font-size:25px">Fee Summary</div>
                                <div class="col-md-6" style="background-color:rgba(255,255,255,0.2); min-height:100px; margin-bottom:20px">
                                    <table class="table table-condensed table-striped" id="feesummarym" style="font-size:12px; font-family:verdana">
                                        <tr style="font-weight:bold"><td>SN</td><td>Students</td><td>History</td><td>Payment Due</td><td>Payment made</td><td>Bal(N)</td><td>Msge</td></tr>
                                    </table>
                                </div>
                                <div class="col-md-6" style="padding:10px;padding-top:0px">
                                    <div style="margin-bottom:10px; display:none" id="PHP">
                                        <div style="background-color:rgba(255,255,255,0.2); padding:10px; position:relative">
                                            <i class="fa fa-close point" style="position:absolute; right:10px; top:10px" title="Close pane" onclick="$('#PHP').hide(100);"></i>
                                            <span style="margin-bottom:10px; margin-top:0px; font-family:raleway; font-size:25px">Payment History</span>
                                            <span id="histName" style="font-family:verdana; font-size:12px; color:#F3764B; font-weight:bold"></span>
                                            <hr style="margin-top:10px">
                                            <div style='max-height:400px; overflow-y:auto'>
                                                <table class="table table-condensed table-responsive table-striped" id="payhist" style="font-family:verdana; font-size:12px">
                                                </table>
                                            </div>
                                            <table class="table table-condensed table-striped" style="font-family:verdana; font-size:12px">
                                                <tr><td style="font-weight:bold; color:#238B69; width:120px">Payment due</td><td id="ATP" style="font-size:17px; font-family:verdana">-</td><td></td></tr>
                                                <tr><td style="font-weight:bold; color:#238B69; width:120px">Payment made</td><td id="AP" style="font-size:17px; font-family:verdana">-</td><td></td></tr>
                                                <tr><td style="font-weight:bold; color:#238B69; width:120px">Balance</td><td id="Bal" style="font-size:17px; font-family:verdana">-</td><td></td></tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div style="background-color:rgba(255,255,255,0.2); padding:10px; position:relative; display:none" id="mdt">
                                        <i class="fa fa-close point" style="position:absolute; right:10px; top:10px" title="Close pane" onclick="$('#mdt').hide(100);"></i>
                                        <div style="margin-bottom:10px; margin-top:0px; font-family:raleway; font-size:25px">Message Parents</div>
                                        <div style="font-family:verdana; font-size:12px">
                                            <input type="radio" value="SMS" name="msgeK" id="SMSpar">SMS &nbsp; &nbsp; 
                                            <input type="radio" value="email" name="msgeK" id="EMpar" checked="true">Email <span id="studentidM"></span>
                                        </div>
                                        <hr style="margin-top:10px; margin-bottom:10px; border-color:#fff; border-style:dashed; border-width:thin"/>
                                        <select class="form-control" id="msgParent" style="margin-bottom: 10px; margin-top:10px" onchange="emailParent.selectedIndex = this.selectedIndex;
                                                smsParent.selectedIndex = this.selectedIndex">
                                        </select>
                                        <select class="form-control" id="smsParent" style="margin-bottom: 10px; margin-top:10px" onchange="emailParent.selectedIndex = this.selectedIndex;
                                                msgParent.selectedIndex = this.selectedIndex">
                                        </select>
                                        <select class="form-control" id="emailParent" style="margin-bottom: 10px; margin-top:10px" onchange="smsParent.selectedIndex = this.selectedIndex;
                                                msgParent.selectedIndex = this.selectedIndex">
                                        </select>
                                        <div class="form-control" style="margin-bottom:10px">
                                            <input type="text" placeholder="Message here.. Limit to 140 characters for SMS" id="cMsge" style="margin-bottom:10px; width:90%; border:none">| 
                                            <span id="wordcount" style="width:80px; padding:8px">0</span></div>
                                        <span class="btn btn-warning" onclick="sendDefMsge('emailParent', 'smsParent')">Send Default eMail</span>
                                        <span class="btn btn-warning" onclick="sendCmsge(cMsge.value, '1')">Send Customized SMS/eMail</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12" id="feepayment" style="padding-left:0px; display:none">
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div style="margin-bottom:10px; margin-top:10px; font-family:raleway; font-size:25px">Pay Fees</div>
                                <div>
                                    <label>Class</label>
                                    <select class="form-control" onchange="fetch_student(this.value);" style="margin-bottom:10px" id="hihihihi">
                                        <option>-- Select Student Class --</option>
                                        <?php
                                        $gg = mysqli_query($w, "select * from schclass order by ClassName ASC");
                                        while ($aa = mysqli_fetch_array($gg)) {
                                            $sn = $aa['SN'];
                                            echo "<option value='$sn'>" . $aa['ClassName'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <label>Name</label>
                                    <select class="form-control" id="fee_studentname" onchange="fee_studentnameID.selectedIndex = this.selectedIndex" style="margin-bottom:10px">
                                        <option>-- Select Student Name --</option>
                                    </select>
                                    <span style="display:none">
                                        <label>Name ID</label>
                                        <select class="form-control" id="fee_studentnameID">
                                            <option>-- Student ID --</option>
                                        </select>
                                    </span>
                                    <label>Term</label> <span style="font-family:verdana; font-size:12px"></span>
                                    <select class="form-control" style="margin-bottom:10px" id="fee_termmp">
                                        <option>First Term</option>
                                        <option>Second Term</option>
                                        <option>Third Term</option>
                                    </select>
                                    <label>Session</label>
                                    <select class="form-control" style="margin-bottom:10px" id="fee_sessionmp" id="fee_currentsession">
                                        <?php
                                                    $year = date("Y");
                                                    $yearlast = $year - 1;
                                                    $a = 4;
                                                    $d = 1;
                                                    while ($a > 1) {
                                                        echo "<option>$yearlast/$year</option>";
                                                        $year = date("Y") - $d;
                                                        $yearlast = $year - 1;
                                                        $a--;
                                                        $d++;
                                                    }
                                                    ?>
                                    </select>
                                    <label>Amount</label> <span id="amountexcess"></span>
                                    <input type="text" class="form-control" id="fee_amountmp" style="margin-bottom:10px" oninput="checkoverflow(this.value)" onclick="getfeehistory('fee_studentnameID');">
                                    <label>Receipt Number</label>
                                    <input type="text" class="form-control" id="fee_receiptnumber" style="margin-bottom:10px">
                                    <label>Date Paid</label>
                                    <input type="date" class="form-control" id="fee_datepaid" style="margin-bottom:10px">
                                    <label>Bank</label>
                                    <select class="form-control" id="fee_bank" style="margin-bottom:10px">
                                        <option>Access Bank</option>
                                        <option>Citibank</option>
                                        <option>Diamond Bank</option>
                                        <option>Ecobank Nigeria</option>
                                        <option>Fidelity Bank Nigeria</option>
                                        <option>First Bank of Nigeria</option>
                                        <option>First City Monument Bank</option>
                                        <option>FSDH Merchant Bank</option>
                                        <option>Guaranty Trust Bank</option>
                                        <option>Heritage Bank PLC</option>
                                        <option>Keystone Bank Limited</option>
                                        <option>Rand Merchant Bank</option>
                                        <option>Skye Bank</option>
                                        <option>Stanbic IBTC Bank Nigeria Limited</option>
                                        <option>Standard Chartered Bank</option>
                                        <option>Sterling Bank</option>
                                        <option>Suntrust Bank Nigeria</option>
                                        <option>Union Bank of Nigeria</option>
                                        <option>United Bank for Africa</option>
                                        <option>Unity Bank for Africa</option>
                                        <option>Unity Bank Plc</option>
                                        <option>Wema Bank</option>
                                        <option>Zenith Bank</option>
                                    </select>
                                    <label>Teller Number</label>
                                    <input type="text" class="form-control" id="fee_tellernumber" style="margin-bottom:10px">
                                    <label>Payment Description</label>
                                    <input type="text" class="form-control" id="fee_descriptionmp">
                                    <span class="btn btn-success" style="margin-top:10px" onclick="makepayment()">Make Payment and generate receipt</span>
                                    <span class="btn btn-warning" style="margin-top:10px"><i class="fa fa-print" style="margin-right:5px"></i>Print Receipt</span>

                                </div> 
                            </div>
                            <div class="col-md-8" style="padding-left:0px">
                                <div style="margin-bottom:10px; margin-top:10px; font-family:raleway; font-size:25px">Payment History( <span id="phsnWc" style="font-family:verdana; font-size:12px; color:#F3764B; font-weight:bold"></span> )</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style='background-color:rgba(255,255,255,0.2); margin-bottom:20px'>

                                    <div style=" min-height:100px; margin-bottom:10px; max-height:300px; padding-top:10px; overflow-y:auto">
                                        <table class="table table-condensed table-striped" style="font-size:12px; font-family:verdana" id="stdhistory">

                                        </table>
                                    </div>

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="baltopay" style="background-color:rgba(255,255,255,0.2); text-align: center; padding:20px; font-family:raleway; font-size:20px; margin-bottom:20px; font-weight:bold; color:#005E8A; min-height:100px; max-height:300px; overflow-y:auto">

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="baltopay" style="background-color:rgba(255,255,255,0.5); text-align: center; padding:20px; font-family:raleway; font-size:20px; margin-bottom:20px; font-weight:bold; color:#005E8A; min-height:100px; max-height:300px; overflow-y:auto; position:relative">
                                    <i class="fa fa-print point" title="Print Receipt" style="right:20px; font-size:14px; top:10px; position:absolute"></i>
                                    <i class="fa fa-recycle point" onclick="getsmsc('receipttprint', '575788')" title="Prepare SMS Receipt" style="right:80px; font-size:14px; top:10px; position:absolute"></i>
                                    <i class="fa fa-envelope point" data-container="body" data-toggle="smsreceipt" data-placement="bottom" data-content="<div id='575788' style='margin-bottom:10px; font-family:verdana; color:#2E4E5D; font-size:12px'><span style='color:red'>Prepare SMS receipt first</span></div><span class='btn btn-success'><i class='fa fa-refresh'></i></span>&nbsp; <span class='btn btn-warning' style='text-align:center' onclick='smsparents(fee_studentnameID.value)'> SMS Receipt</span><div id='diditgo'></div>" title="<i class='fa fa-close point' onclick='closePopover()' style='margin-right:10px; color:red'></i><b>SMS Receipt to parents</b>" style="right:50px; font-size:14px; top:10px; position:absolute"></i>
                                    <div><?php echo $schoolname ?></div>
                                    <div style="font-size:12px; margin-bottom:10px"><?php echo $schooladdress ?></div>
                                    <div id="receipttprint" style='font-size:13px; font-weight:600'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $("[data-toggle='popover']").popover();
                    $("[data-toggle='smsreceipt']").popover({html: true});
                });
            </script>

            <script src="JS/adminJS.js" type="text/javascript"></script>
            <div class="modal fade bs-example-modal-sm" id="updatebillitem" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                            <div class="modal-dialog modal-sm" role="document" style='font-face:verdana; font-size:12px'>
                                <div class="modal-content">
                                    <div class="modal-header" style='background-color:#E8EEF4'>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h6><center><b>Update Bill Profile<br/><span id='teachername' style="font-weight:normal"></span></b></center></h6>
                                    </div>
                                    <div class="modal-body" style='background-color: #EFF8EF' id="attachedStudents">
                                    <div id='inputherethings' style='margin-bottom:10px; font-size:25px'></div>
                                    <span id='inputherespecid' style='display:none'></span>
                                    <label>Item </label>
                                    <input type="text" class="form-control" style="margin-bottom:10px" id="catitems">
                                    <label>Amount</label>
                                    <input type="number" class="form-control" style="margin-bottom:10px" id="catamounts">
                                    <label>Payment type</label>
                                    <select class="form-control" style="margin-bottom:10px" id="catpaytypes">
                                        <option>Optional</option>
                                        <option>Once</option>
                                        <option>Sessional</option>
                                        <option>Terminal</option>
                                    </select>
                                    <input type="button" onclick="updatepaybreakdown()" value="Update" class="btn btn-success" style="width:100%">
                                    <input type="button" onclick="deletepaybreakdown()" value="Delete" class="btn btn-warning" style="width:100%">
                                </div>
                            </div>
                        </div>
    </body>
</html>

