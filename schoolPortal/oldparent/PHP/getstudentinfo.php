<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$studentID = $_POST['studentID'];
$retrieval = mysql_query("select * from schstudent where schoolid ='$studentID'");

if (mysql_num_rows($retrieval) > 0) {
    $pull = mysql_fetch_array($retrieval);
    
    $firstname = $pull['Firstname'];
    $lastname = $pull['Surname'];
    $studentName = "$lastname $firstname";
    $classID = $pull['ClassID'];
    
    //Get classname
     $h = "select ClassName from schclass where SN='$classID'";
    $j = mysql_query($h);
    $q = mysql_fetch_array($j);
    $classname = $q['ClassName'];
    
    //Get Attached class teacher..
    $f = mysql_query("select ClassTeacher from schclass where SN ='$classID'");
    $g = mysql_fetch_array($f);
    $tID = $g['ClassTeacher'];
    
    $g = mysql_query("select * from schstaff where StaffID = '$tID'");
    $ga = mysql_fetch_array($g);
    $TeacherN = $ga['StaffName'];
    $TeacherE = $ga['StaffEmail'];

    echo "<table class=\"table table-responsive table-hover table-condensed\">
                                            <tr><td style=\"font-weight:bold\">Name</td><td><b>" . $lastname . "</b> ".$firstname."</td></tr>
                                            <tr><td style=\"font-weight:bold\">Class</td><td>" . $classname . "</td></tr>
                                            <tr><td style=\"font-weight:bold\">Teacher</td><td>" . $TeacherN ." (<b>".$TeacherE."</b>)</td></tr>
                                        </table>";
} else {
    echo "<table style=\"margin-bottom:20px\"><tr><td>You have not selected a student</td></tr></table>";
}



