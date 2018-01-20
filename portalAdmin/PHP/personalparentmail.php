<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

$recipient = validate('recipient');
$Mparentsubject = validate('Mparentsubject');
$parentmessage = validate('parentmessage');

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Sunshine Schools <info@sunshineschools.com>';
$headers .= 'Reply-To: School Administrator <admin@sunshineschools.com>';

$mailer = mail($recipient, $Mparentsubject, $parentmessage, $headers);

if ($mailer) {
    echo "1";
} else {
    echo "0";
}
