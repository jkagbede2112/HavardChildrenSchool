<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * email:email, stdID:stdID, stat:stat
 */

$parentEmail = $_POST['email'];
$studentID = $_POST['stdID'];
$stat = $_POST['stat'];
$term = $_POST['term'];
$session = $_POST['session'];
$subject = "Payment details";

//echo $parentEmail . " " . $studentID . " " . $stat . " " . $term . " " . $session . " " . $subject;

if ($stat === "default") {
    $h = mysqli_query($w,"select defaultmessage from defaultmessage order by sn desc");
    $i = mysqli_fetch_array($h);

    $msg = $i['defaultmessage'];
    $paytimeline = getpaymentTimeline($studentID, $session, $term);
    $msgee = $msg . $paytimeline . "<br>Regards<br/>Amazing Grace International College";
    $qqg = sendmail($parentEmail, $subject, $msgee);
}

function sendmail($parentEmail, $subjct, $msgcontent) {
    $emailaddress = $parentEmail;
    $subject = $subjct;
    $message = $msgcontent;

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: Amazing Grace International College <info@amazinggrace.com>';
    $headers .= 'Reply-To: School Administrator <info@amazinggrace.com>';

    if ($emailaddress) {
        $mailer = mail($emailaddress, $subject, $message, $headers);
        if ($mailer){
            echo "Mail sent";
        }else{
            echo "Mail not sent";
        }
    }
}

function getpaymentTimeline($studentID, $session, $term) {
    $asd = mysqli_query($w,"select * from fee_transaction where student_id='$studentID' and Session='$session' and Term='$term' order by date desc");
    $count = 1;
    $paymentDetail = "<table><tr style='font-weight:bold; color:#238B69'><td></td><td>Payment Desc</td><td>Amount</td><td>ReceiptID</td><td>Date</td><td>Bank</td><td>Teller Number</td></tr>";
    while ($a = mysqli_fetch_array($asd)) {
        $paymentDetail .= "<tr style=''><td style='font-weight:bold; color:#A88302'>" . $count . "</td><td>" . $a['description'] . "</td><td><strike>N</strike>" . $a['amount'] . "</td><td>" . $a['receiptID'] . "</td><td>" . $a['date'] . "</td><td style='color:#005E8A'>" . $a['Bank'] . "</td><td>" . $a['TellerNumber'] . "</td></tr>";
        $count++;
    }
    if (mysqli_num_rows($asd) < 1) {
        $paymentDetail .= "<tr><td colspan='7' style='color:#ff0000; text-align:center'>No payment records found</td></tr>";
    }
    $paymentDetail .= "</table>";

    return $paymentDetail;
}
