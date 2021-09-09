<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * term:term, session:session, idtosearch:idtosearch, loctoputresult:loctoputresult
 */
$session = $_POST['session'];
$term = $_POST['term'];
$idtosearch = $_POST['idtosearch'];
$stdclass = substr($_POST['stdclass'], 0, 3);

$hi = mysqli_query($w,"select amount from paycatbreakdown");
$fee = 0;
$amountPaid = 0;
while ($h = mysqli_fetch_array($hi)) {
    $fee += $h['amount'];
}
$paid = gettotalpayments($idtosearch, $term, $session);
$boarding = computeaccomodation($idtosearch, $term, $session);
$totaldue = $fee + $boarding;

echo "Total Fee is <strike>N</strike> " . $totaldue . " amount paid is <strike>N</strike> " . $paid . " amount expected is <br/><strike>N</strike><span style='color:#F3764B; font-size:25px' id='stuBalla'> " . ($totaldue - $paid) . "</span>";

function gettotalpayments($stdID, $term, $session) {
    global $w;
    $gsd = "select amount from fee_transaction where Term='$term' and Session = '$session' and student_id='$stdID'";
    //return $gsd;
    $jij = mysqli_query($w,$gsd);
    $amountPaid = 0;
    if (mysqli_num_rows($jij) < 1) {
        $amountPaid = 0;
    }
    while ($aaaa = mysqli_fetch_array($jij)) {
        //echo $aaaa['amount'] . "<br/>";
        $amountPaid += $aaaa['amount'];
    }
//return $gsd;    
    return $amountPaid;
}

function computeaccomodation($student_id, $term, $session) {
    global $w;
    $hihihihi = mysqli_query($w,"select amount from boarder where Session='$session' and Term='$term' and student_id='$student_id'");
    $feed = 0;
    if (mysqli_num_rows($hihihihi) < 1) {
        return $feed;
    } else {
        while ($h = mysql_fetch_array($w,$hihihihi)) {
            $feed += $h['amount'];
        }
        return $feed;
    }
}
