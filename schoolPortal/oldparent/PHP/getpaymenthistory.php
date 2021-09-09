<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getstudentnamefromsn($studentid) {
    $j = "select * from schstudent where schoolid='$studentid'";
    $m = mysql_query($j);
    $g = mysql_fetch_array($m);
    $name = $g['Surname'] . " " . $g['Firstname'];
    return $name;
}

function getclassnamefromid($id) {
    $g = "select ClassName from schclass where SN='$id'";
    $as = mysql_query($g);
    $t = mysql_fetch_array($as);
    $classname = $t['ClassName'];
    return $classname;
}

function getinvoice($stdname, $term, $session){
    $query = "select * from payschoolbill where term='$term' and session='$session' and studentid='$stdname'";
    //echo $query;
    $g = mysql_query($query);
    $hit= "<div class='col-md-6' style='padding:5px; padding-top:0px'><div style='font-size:15px; font-weight:400; font-size:20px'>Invoice</div><table class='table-bordered' style='width:100%; margin-top:10px'>"
            . "<tr style='background-color:#005E8A; color:#fff; font-size:13px'><td></td><td style='padding:5px;'>Description</td><td style='padding:5px'>Bills</td></tr>";
    $count = 1;
    while ($hg = mysql_fetch_array($g)){
        $billitemid = $hg['billitemid'];
        $billitem = getbillitem($billitemid);
        $billitemamount = number_format($hg['billitemamount'],2);
        $hit .= "<tr style='font-size:12px'><td>$count</td><td style='padding:5px'>$billitem</td><td style='padding:5px'>₦ $billitemamount</td></tr>";
        $count++;
    }
    return $hit ."</table></div>";
}

function getbillitem($billitemid) {
    $h = "select remark from paycatbreakdown where breakdownid='$billitemid'";
    $j = mysql_query($h);
    $sw = mysql_fetch_array($j);
    $desc = $sw['remark'];
    return $desc;
}

function getitemdescript($itemid) {
    $qg = "select * from paycatbreakdown where breakdownid='$itemid'";
    $gt = mysql_query($qg);
    $q = mysql_fetch_array($gt);
    $remark = $q['remark'];
    return $remark;
}

session_start();
$studentid = $_POST['val'];
$session = $_POST['session'];
$term = $_POST['term'];
//Get Class ID
$h = "select ClassID from schstudent where schoolid='$studentid'";
$j = mysql_query($h);
$k = mysql_fetch_array($j);
$classid = $k['ClassID'];
//echo $curr_session . " " . $curr_term;

function getstsnfromschoolid($schoolid){
    $hg = "select StudentID from schstudent where schoolid='$schoolid'";
    $j = mysql_query($hg);
    $jq = mysql_fetch_array($j);
    $k = $jq['StudentID'];
    return $k;
}

$studentname = getstudentnamefromsn($studentid);
$studentsn = getstsnfromschoolid($studentid);
$classname = getclassnamefromid($classid);
$invoice = getinvoice($studentsn, $term, $session);

$j = "select distinct(datv) from paymentsmade where stdid='$studentsn' and term='$term' and session='$session'";

$it = mysql_query($j);
$hid = mysql_num_rows($it);
echo $invoice;
//echo "<div class='col-md-12'><span style='font-size:18px'>$hid payment dates</span><div>";
$r = "<div class='col-md-6' style='padding:0px'><div style='font-size:15px; font-weight:400; font-size:20px'>Payment timelineGbegi_123</div>";
while ($ti = mysql_fetch_array($it)) {
    $udate = $ti['datv'];
    $utv = "select * from paymentsmade where term='$term' and session='$session' and stdid='$studentsn' and datv='$udate'";
    $hq = mysql_query($utv);
    $ut = mysql_num_rows($hq);
    $o = "<table class='table-striped table-bordered' style='width:100%; font-size:12px'>"
            . "<tr style='font-size:14px; font-weight:600'><td></td><td style='padding:5px'>Item</td><td style='padding:5px'>Amount</td></tr>";
    $count = 1;
    if (mysql_num_rows($hq) < 1) {
        $o .= "<tr><td colspan='3'></td></tr>";
    }
    while ($vd = mysql_fetch_array($hq)) {
        $itemid = $vd['itemid'];
        $amountpaid = number_format($vd['amountpaid'], 2);
        $item = getitemdescript($itemid);
        $o .= "<tr><td style='padding:5px'>$count</td><td style='padding:5px'>$item</td><td style='padding:5px'>₦ $amountpaid</td></tr>";
        $count++;
    }
    $o .= "</table>";
    $r .= "<details style='background-color:rgba(0,0,0,0.1); margin-top:10px'>"
            . "<summary style='background-color:#005E8A; padding:5px; color:#fff; cursor:pointer; font-size:14px'>$udate</summary>"
            . "<div style='padding:5px'>$o</div>"
            . "</details>";
}
echo $r . "</div>";
