<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * to: to, cMsge: cMsge,
 */

$to = $_POST['to'];
$mesage = $_POST['cMsge'];
$studentID = $_POST['studentID'];
$subject = "Subject things";
$session = $_POST['session'];
$term = $_POST['term'];
$msgNow = $mesage ."<br/>". getpaymentTimeline($studentID, $session, $term) ."<br/>Kind regards,<br/>Amazing Grace International College<br/>";
       // echo $msgNow;
        

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Amazing Grace International College <info@amazinggrace.com>';
$headers .= 'Reply-To: School Administrator <info@amazinggrace.com>';

$mailer = mail($to, $subject, $msgNow, $headers);


function getpaymentTimeline($studentID, $session, $term) {
    $asd = mysql_query("select * from fee_transaction where student_id='$studentID' and Session='$session' and Term='$term' order by date desc");
    $count = 1;
    $paymentDetail = "<table><tr style='font-weight:bold; color:#238B69'><td></td><td>Payment Desc</td><td>Amount</td><td>ReceiptID</td><td>Date</td><td>Bank</td><td>Teller Number</td></tr>";
    while ($a = mysql_fetch_array($asd)) {
        $paymentDetail .= "<tr style=''><td style='font-weight:bold; color:#A88302'>" . $count . "</td><td>" . $a['description'] . "</td><td><strike>N</strike>" . $a['amount'] . "</td><td>" . $a['receiptID'] . "</td><td>" . $a['date'] . "</td><td style='color:#005E8A'>" . $a['Bank'] . "</td><td>" . $a['TellerNumber'] . "</td></tr>";
        $count++;
    }
    if (mysql_num_rows($asd) < 1) {
        $paymentDetail .= "<tr><td colspan='7' style='color:#ff0000; text-align:center'>No payment records found</td></tr>";
    }
    $paymentDetail .= "</table>";

    return $paymentDetail;
}