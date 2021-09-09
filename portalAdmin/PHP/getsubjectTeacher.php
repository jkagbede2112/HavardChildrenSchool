<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';
error_reporting(0);

$d = mysqli_query($w,"select * from subjects order by SubjectID ASC");

while ($gads = mysqli_fetch_array($d)) {
    $teacherID = $gads['TeacherID'];
    $SubjectID = $gads['SubjectID'];
    $SubjectCategory = $gads['SubjectCategoryid'];
    $classname = getsubjectclass($SubjectCategory);
    $tName = $gads['TeacherID'];
    $SubjectName = $gads['SubjectName'];
    
    $h = mysqli_query($w,"select * from schstaff where StaffID='$tName'");
    $j = mysqli_fetch_array($h);
    
    $TeacherName = $j['StaffName'];
    if (strlen($TeacherName) < 1){
        echo "<tr><td><i style='color:red'>Unassigned</i></td><td>" . $classname . "</td><td>" . $SubjectName . "</td></tr>";
    }else{
        echo "<tr><td>".$TeacherName."</td><td>" . $classname . "</td><td>" . $SubjectName . "</td></tr>";
    }
}

function getsubjectclass($subjectid){
    global $w;
    $a = "select ClassName from schclass where SN='$subjectid'";
    $b = mysqli_query($w, $a);
    $c = mysqli_fetch_array($b);
    $cname = $c['ClassName'];
    return $cname;
}
