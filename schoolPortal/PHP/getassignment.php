<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$studentID = $_POST['studentID'];
$h = mysql_query("select ClassID from schstudent where StudentID='$studentID'");
$o = mysql_fetch_array($h);
$gv = $o['ClassID'];
$retrieval = mysql_query("select * from assignments where StudentID ='$studentID' or StudentID='$gv' order by Date DESC limit 10");
if (mysql_num_rows($retrieval) > 5) {
    $more = "true";
} else {
    $more = "false";
}
if (mysql_num_rows($retrieval) < 1){
    echo "<div><span style=\"font-weight:bold\">No Assignments</span></div>";
}


while ($q = mysql_fetch_array($retrieval)) {
    $subject = $q['Subject'];
    $Assignment = $q['Assignment'];
    $date = $q['Date'];

    echo "<div style=\"cursor:pointer\" title=\"Due date: ". $date."\"><span style=\"font-weight:bold\">" . $subject. " </span>" .$Assignment."<span style=\"font-weight:bold; font-size:11px\">( Assigned ".$date.")</span></div><hr style=\"margin:10px; border-color:#5EC2F2; border-style:dotted\">";
}
 if ($more === "true"){
     echo "<span style=\"padding:10px;\" class=\"btn btn-success\">More assignments</span>";
 }else{
 }