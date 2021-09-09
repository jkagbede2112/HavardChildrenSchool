<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

$classid = $_POST['classid'];
session_start();
$parentID = $_SESSION['parentid'];

$fr = "select * from linkages where ParentID='$parentID'";
    $query = mysqli_query($w, $fr);
        if (mysqli_num_rows($query) < 1) {
            echo "<option>--No linked student(s) found--</option>";
        } else {
            while ($rez1 = mysqli_fetch_array($query)) {
            $sID = $rez1['StudentID'];
            $classid = validate("classid");
            $po = "select * from schstudent where ClassID='$classid' and  schoolid ='$sID'";
    $q = mysqli_query($w,$po);
    if (mysqli_num_rows($q)<1){
        echo "<option>----</option>";
    }else{
        $h = mysqli_fetch_array($q);
        $studentname = $h['Surname'] . " " . $h['Firstname'];
        $studentid = $h['schoolid'];
        echo "<option value='$studentid'>$studentname</option>";
    }
        }
    }


/*
$ha = "select * from schstudent where ClassID='$classid' order by Surname desc";

$ja = mysqli_query($w,$ha);
while ($q = mysqli_fetch_array($ja)){
    $name = strtoupper($q['Surname']) . " " . $q['Middlename'] . " " . $q['Firstname'];
    $studentid = $q['schoolid'];
    echo "<option value='$studentid'>$name</option>";
}
*/