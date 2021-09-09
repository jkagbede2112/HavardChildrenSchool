<?php
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$parentID = $_POST['ParentID'];

$getsenderid = mysql_query("select * from portalmessage where Recipient='$parentID'");

while ($get = mysql_fetch_array($getsenderid)){
    $teacherID = $get['senderID'];
    $datesent = $get['Date'];
    $status = $get['status'];
    
    if ($status === "1"){
        $foldericon = "fa-folder-open";
    }else{
        $foldericon ="fa-folder";
    }
    
    $sn = $get['SN'];
    $getsendername = mysql_query("select TeacherName from cts where TeacherID='$teacherID'");
    $getName = mysql_fetch_array($getsendername);
    $senderRname = $getName['TeacherName'];
    
    echo nl2br("<tr style='cursor:pointer' onclick='pullcontent(\"$sn\")'><td class='message' id='dmsg$sn' onclick=\"applystyle('dmsg$sn')\"><i class='fa ".$foldericon."' style='margin-right:5px'></i><b>".$senderRname."</b><br/><font style='font-size:10px; font-family:Montserrat'>".$datesent."</font></td></tr>");

    }
