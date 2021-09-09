<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

$action = validate("action");
session_start();
$parentID = $_SESSION['parentid'];

if ($action === "getstudentsinfo") {
    $fr = "select * from linkages where ParentID='$parentID'";
    $query = mysqli_query($w, $fr);
        if (mysqli_num_rows($query) < 1) {
            echo "<option>$fr</option>";
        } else {
            while ($rez1 = mysqli_fetch_array($query)) {
            $sID = $rez1['StudentID'];
            $classid = validate("classid");
            $po = "select * from schstudent where ClassID='$classid' and  schoolid ='$sID'";
    $q = mysqli_query($w,$po);
    if (mysqli_num_rows($q)<1){
        echo "<option>--No linked student found--</option>";
    }else{
        $h = mysqli_fetch_array($q);
        $studentname = $h['Surname'] . " " . $h['Firstname'];
        $studentid = $h['StudentID'];
        echo "<option value='$studentid'>$studentname</option>";
    }
        }
    }
    //getclassid
} else{
    //echo "<option>Kayode</option>";
    $parentID = $_POST['pID'];
    try {
        $query = mysqli_query($w, "select * from linkages where ParentID='$parentID'");
        if (mysqli_num_rows($query) < 1) {
            echo "No students";
        } else {
            echo "We";
            while ($rez1 = mysqli_fetch_array($query)) {
                $sID = $rez1['StudentID'];
                $links = mysqli_query($w, "select * from schstudent where schoolid ='$sID'");
                $gtr = mysqli_fetch_array($links);
                echo "<td>" . $gtr['StudentID'] . "</td><td>" . $gtr['StudentName'] . "</td><td>" . $gtr['ClassID'] . "</td></tr>";
            }
        }
    } catch (Exception $e) {
        echo "Application is busy";
    }
}
