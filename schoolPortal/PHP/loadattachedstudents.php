<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$parentID = "SUN4447QF";
session_start();
    $ParentName = $_SESSION['ParentName'];
    $ParentEmail = $_SESSION['Email'];
    $parentID = $_SESSION['ParentID'];
//echo "<tr><td onclick='removeattache(".$parentID.")'>$parentID</td><td></td></tr>";

$retrieval = mysql_query("select * from linkages where ParentID ='$parentID' and Status='1'");
$count = mysql_num_rows($retrieval);

if ($count < 1) {
    echo "<tr><td style='text-align:center; color:#ff0000; font-family:Montserrat; font-size:11px'>No approved linked student(s) found</td></tr>";
} else {
    while ($picker = mysql_fetch_array($retrieval)) {
        $studentID = $picker['StudentID'];

        $getstudentDets = mysql_query("select * from schstudent where schoolid='$studentID'");

        if ($getstudentDets) {
            $fetchdets = mysql_fetch_array($getstudentDets);
            $studentNames = $fetchdets['Surname'] . " " . $fetchdets['Firstname'];
            $ClassID = $fetchdets['ClassID'];
            $fe = mysql_query("select ClassName from schclass where SN='$ClassID'");
            $hy = mysql_fetch_array($fe);
            
            $studentClass = $hy['ClassName'];
            $i = mysql_query("select ClassTeacher from schclass where ClassName = '$ClassID'");
            $q = mysql_fetch_array($i);
            $teachrID = $q['ClassTeacher'];

            $getteacherDets = mysql_query("select * from schstaff where StaffID='$teachrID'");

            if ($getteacherDets) {
                $fetchteacherdets = mysql_fetch_array($getteacherDets);
                $teacherName = $fetchteacherdets['StaffName'];
                $teacherEmail = $fetchteacherdets['StaffEmail'];
            }
        }

        echo "<tr><td><i class='fa fa-bullseye' style='margin-right:10px'></i>" . $studentNames . " - " . $studentClass . "</td><td style='text-align:right'><span class='btn btn-danger' title='remove student' onclick='removeattache(\"$studentID\",\"$parentID\")'><i class='fa fa-user-times'></i></span></td><td><span data-toggle='modal' data-target='.bs-example-modal-sm' class='btn btn-warning' onclick='mailteacher(\"$teacherEmail\",\"$teacherName\",\"$ParentEmail\",\"$ParentName\")' title='" . $teacherName . "'><i class='fa fa-envelope' style='margin-right:5px'></i>Email teacher</span></td></tr>";
    }
}



