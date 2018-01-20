<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$Psubject = strip_tags($_POST['NLsubject']);
$Pmessage = $_POST['message'];

$sql = mysqli_query($w,"select Email from parentsregister where newslettersubscription='1'");
$count = 0;
while ($getter = mysqli_fetch_array($sql)) {
    $emailaddress = $getter['Email'];
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: Sunshine Schools <info@sunshineschools.com>';
    $headers .= 'Reply-To: School Administrator <admin@sunshineschools.com>';

    if ($emailaddress) {
        $mailer = mail($emailaddress, $Psubject, $Pmessage, $headers);
        ++$count;
    }
}
echo $count . " people messaged.";

    $h = mysqli_query($w,"insert into newsletters (subject, content) values ('$Psubject','$Pmessage')");
    if ($h){}else{}
