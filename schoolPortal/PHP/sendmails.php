<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';
include 'mailer.php';

$sender = validate('sender');

if ($sender === 'students') {

    $GMclass = validate('GMclass');
    $GMsubject = validate('GMsubject');
    $GMmessage = validatemessage('GMmessage');

    if ($GMclass === "Everyone") {
        $sql = mysql_query("select EmailAddress from studentinfo");
    } else {
        $sql = mysql_query("select EmailAddress from schstudent where ClassID='$GMclass'");
    }
    $count = 0;
    while ($getter = mysql_fetch_array($sql)) {
        $emailaddress = $getter['EmailAddress'];
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: Amazing Grace International College <info@amazinggrace.com>';
        $headers .= 'Reply-To: School Administrator <info@amazinggrace.com>';

        if ($emailaddress) {
            $mailer = mail($emailaddress, $GMsubject, $GMmessage, $headers);
            ++$count;
        }
    }

    echo $count . " people messaged.";
} elseif ($sender === 'staff') {
    $sql = mysql_query("select * from schstaff");
    $count = 0;
    
    $subject = validate('Tsubject');
    $content = validate('Tmessage');
    
    while ($getter = mysql_fetch_array($sql)) {
        ++$count;
        $emailaddress = $getter['StaffEmail'];
        sendmail($emailaddress,$subject,$content);
    }
    
    echo $count . " staff messaged.";
} elseif ($sender === 'parents') {

    $Pclass = validate('Pclass');
    $Psubject = validate('Psubject');
    $Pmessage = validatemessage('Pmessage');

    if ($Pclass === "Everyone") {
        $sql = mysql_query("select Email from parentsregister");
        $count = 0;
        while ($getter = mysql_fetch_array($sql)) {
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
    } else {
        $sql = mysql_query("select StudentID from schstudent where ClassID='$Pclass'");
        $count = 0;
        while ($g = mysql_fetch_array($sql)) {
            $SID = $g['StudentID'];

            $getPID = mysql_query("select ParentID from linkages where StudentID ='$SID'");
            while ($GPID = mysql_fetch_array($getPID)) {
                $TID = $GPID['ParentID'];

                $getEmail = mysql_query("select Email from parentsregister where ParentID='$TID'");

                while ($epp = mysql_fetch_array($getEmail)) {
                    $em = $epp['Email'];
                    //echo $em;
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From: Sunshine Schools <info@sunshineschools.com>';
                    $headers .= 'Reply-To: School Administrator <admin@sunshineschools.com>';

                    if ($em) {
                        $mailer = mail($em, $Psubject, $Pmessage, $headers);
                        ++$count;
                    }
                }
            }
        }
        echo $count . " Parent(s) messaged";
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

