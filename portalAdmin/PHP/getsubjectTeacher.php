<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';
error_reporting(0);

$d = mysqli_query($w,"select * from subjects order by SubjectID ASC");

while ($gads = mysqli_fetch_array($d)) {
    $teacherID = $gads['TeacherID'];
    $SubjectID = $gads['SubjectID'];
    $SubjectCategory = $gads['SubjectCategory'];
    $tName = $gads['TeacherID'];
    $SubjectName = $gads['SubjectName'];
    
    $h = mysqli_query($w,"select * from schstaff where StaffID='$tName'");
    $j = mysqli_fetch_array($h);
    
    $TeacherName = $j['StaffName'];
    if (strlen($TeacherName) < 1){
        echo "<tr><td><i style='color:red'>Unassigned</i></td><td>" . $SubjectCategory . "</td><td>" . $SubjectName . "</td></tr>";
    }else{
        echo "<tr><td>".$TeacherName."</td><td>" . $SubjectCategory . "</td><td>" . $SubjectName . "</td></tr>";
    }
}
