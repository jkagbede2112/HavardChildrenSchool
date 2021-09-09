<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$recipientID = $_SESSION['Role'];
if (isset($_SESSION['parentID'])){
    $parentID = $_SESSION['ParentID'];
}
//
//echo $recipientID;
echo $recipientID;
$getsenderid = mysqli_query($w,"select * from portalmessage where Recipient='$recipientID' order by SN desc");

while ($get = mysqli_fetch_array($getsenderid)) {
    $teacherID = $get['senderID'];
    $datesent = $get['Date'];
    $status = $get['status'];

    if ($status === "1") {
        $foldericon = "fa-folder-open";
    } else {
        $foldericon = "fa-folder";
    }

    $sn = $get['SN'];
    $getsendername = mysqli_query($w,"select TeacherName from cts where TeacherID='$teacherID'");
    $getName = mysqli_fetch_array($getsendername);
    $senderRname = $getName['TeacherName'];
    if (strlen($senderRname) > 1) {
        echo nl2br("<tr style='cursor:pointer' onclick='pullcontent(\"$sn\")'><td class='message' id='dmsg$sn' onclick=\"applystyle('dmsg$sn')\"><i class='fa " . $foldericon . "' style='margin-right:5px'></i><b>" . $senderRname . "</b><br/><font style='font-size:10px; font-family:Montserrat'>" . $datesent . "</font></td></tr>");
    } else {
        $sendername = mysqli_query($w,"select ParentName from parentsregister where ParentID='$parentID'");
        $N = mysqli_fetch_array($sendername);
        $pName = $N['ParentName'];
        echo "<tr style='cursor:pointer' onclick='pullcontent(\"$sn\")'><td class='message' id='dmsg$sn' onclick=\"applystyle('dmsg$sn')\"><i class='fa " . $foldericon . "' style='margin-right:5px'></i><b>" . $pName . "</b><br/><font style='font-size:10px; font-family:Montserrat'>" . $datesent . "</font></td></tr>";
    }
}
