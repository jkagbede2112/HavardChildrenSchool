<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$senderemail = $_SESSION['Email'];
$sendername = $_SESSION['ParentName'];
$content = $_POST["content"];
$mail = $_POST['to'];
$parentID = $_SESSION['ParentID'];
$date = date("M/j/Y");
$content = "(Parent) - ".$date."<hr style=>" . $_POST['content'];

if ($mail === "School Administrator") {
    $had = mysql_query("insert into portalmessage (senderID, Recipient,  MessageContent, Date, Status) "
            . "value('$parentID','Admin','$content','$date','0')");
    if ($had){
        echo "Message sent";
    }
}
/*
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$mailer = mail($teachermail, $mailsubject, $mailbody, $headers);

if ($mailer) {
    echo "eMail sent";
    mail($senderemail, $mailsubject, $mailbody, $headers);
} else {
    echo "eMail not sent";
}
 * *
 */