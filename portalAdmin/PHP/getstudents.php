<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

$action = validate("action");

if ($action === "delinkstd"){
    //parid:parid, stdid:stdid
    $parid = $_POST["parid"];
    $stdid = $_POST["stdid"];
    //echo "$parid $stdid";
    $a = "delete from linkages where ParentID='$parid' and StudentID='$stdid'";
    $b = mysqli_query($w, $a);
    if ($b){
        echo "Delink done";
    }
    //echo $a;
    return;
}

if ($action === "getstudentsinfo") {
    $classid = validate("classid");
    $q = mysqli_query($w,"select * from schstudent where ClassID='$classid'");
    while ($h = mysqli_fetch_array($q)){
        $studentname = $h['Surname'] . " " . $h['Firstname'];
        $studentid = $h['StudentID'];
        echo "<option value='$studentid'>$studentname</option>";
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
            //echo "We";
            while ($rez1 = mysqli_fetch_array($query)) {
                $sID = $rez1['StudentID'];
                $studentname = getstudentname($sID);
                $class = getclassidfromschid($sID);
                $classname = getclassname($class);
                //$links = mysqli_query($w, "select * from schstudent where schoolid ='$sID'");
                //$gtr = mysqli_fetch_array($links);
                echo "<td></td><td>" . $studentname . "</td><td>" . $classname . "</td><td><i class='fa fa-times ptr' style='color:red' title='unlink student' onclick='removelink(\"$parentID\",\"$sID\")'></i></td></tr>";
                //echo "<td>" . $gtr['StudentID'] . "</td><td>" . $gtr['StudentName'] . "</td><td>" . $gtr['ClassID'] . "</td></tr>";
            }
        }
    } catch (Exception $e) {
        echo "Application is busy";
    }
}
