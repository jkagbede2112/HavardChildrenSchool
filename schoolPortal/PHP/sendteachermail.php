<?php

session_start();
$senderemail = $_SESSION['Email'];
$sendername = $_SESSION['ParentName'];
$teachermail = $_POST["teachermail"];
$mailsubject = $_POST["subject"];
$mailbody = $_POST["mailbody"];

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$mailer = mail($teachermail, $mailsubject, $mailbody, $headers);

if ($mailer){
    echo "eMail sent";
    mail($senderemail, $mailsubject, $mailbody, $headers);
}else{
    echo "eMail not sent";
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

