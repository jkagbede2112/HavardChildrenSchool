<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$studentID = $_POST['studentID'];
$retrieval = mysqli_query($w,"select * from schstudent where StudentID ='$studentID'");
$c = mysqli_num_rows($retrieval);
echo "Yes.. this too shall pass";
if ( $c > 0) {
    $pull = mysqli_fetch_array($retrieval);
    $studentName = $pull['StudentName'];
    $classID = $pull['ClassID'];
    $classTeacherID = $pull['TeacherID'];
    
    $cst = mysqli_query($w,"select * from cts where TeacherID ='$classTeacherID'");
    $f = mysqli_fetch_array($cst);
    $tn = $f['TeacherName'];
    $te = $f['TeacherEmail'];

    echo "<table class=\"table table-responsive table-hover table-condensed\">
                                            <tr><td style=\"font-weight:bold\">Name</td><td>" . $studentName . "</td></tr>
                                            <tr><td style=\"font-weight:bold\">Class</td><td>" . $classID . "</td></tr>
                                            <tr><td style=\"font-weight:bold\">Teacher</td><td>" . $tn ." (<b>".$te."</b>)</td></tr>
                                            <tr><td style=\"font-weight:bold\">Teacher's Comment</td><td>Oluwaseun is quite hardworking. Bless him</td></tr>
                                        </table>";
} else {
    echo "<table style=\"margin-bottom:20px\"><tr><td>You have not selected a student</td></tr></table>";
}



