<?php

include 'databaseSQLconnectn.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$stdID = $_POST['val'];
$drTerm = $_POST['term'];
$drSession = $_POST['session'];

$hed = mysql_query("select * from schstudent where StudentID='$stdID'");
$i = mysql_fetch_array($hed);
$stdClass = $i['ClassID'];
$substringClass = substr($stdClass, 0, 3);

$totPaid = gettotalpayments($stdID, $drTerm, $drSession);
$boarding = computeaccomodation($stdID, $drTerm, $drSession);
$fees = getFees($drTerm, $drSession, $substringClass);

$totAmountOwed = $boarding + $fees;
//echo $fees;
$totAmountPaid = $totPaid;
$balance = $totAmountOwed - $totAmountPaid;

echo "<table style='margin-top:10px'><tr><td><b>Amount due:</b> N".$totAmountOwed."</td><td><b>Amount paid:</b> N".$totAmountPaid."</td><td><b>Balance:</b> N".$balance."</td></tr></table>";

function getFees($drTerm, $drSession, $substringClass) {
    $hhsd = "select Fee from fee_category where Session='$drTerm' and Year='$drSession' and Class='$substringClass'";
    $hihihihi = mysql_query($hhsd);
    $fee = 0;
    $amountPaid = 0;
    while ($h = mysql_fetch_array($hihihihi)) {
        $fee += $h['Fee'];
    }
    return $fee;
}

function gettotalpayments($stdID, $term, $session) {
    $gsd = "select amount from fee_transaction where Term='$term' and Session = '$session' and student_id='$stdID'";
    //return $gsd;
    $jij = mysql_query($gsd);
    $amountPaid = 0;
    if (mysql_num_rows($jij) < 1) {
        $amountPaid = 0;
    }
    while ($aaaa = mysql_fetch_array($jij)) {
        //echo $aaaa['amount'] . "<br/>";
        $amountPaid += $aaaa['amount'];
    }
    return $amountPaid;
}

function computeaccomodation($student_id, $term, $session) {
    $hihihihi = mysql_query("select amount from boarder where Session='$session' and Term='$term' and student_id='$student_id'");
    $feed = 0;
    if (mysql_num_rows($hihihihi) < 1) {
        return $feed;
    } else {
        while ($h = mysql_fetch_array($hihihihi)) {
            $feed += $h['amount'];
        }
        return $feed;
    }
}
