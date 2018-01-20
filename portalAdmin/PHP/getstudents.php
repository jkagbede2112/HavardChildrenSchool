<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

$parentID = $_POST['pID'];
try {
    $query = mysqli_query($w,"select * from linkages where ParentID='$parentID'");
    if (mysqli_num_rows($query) < 1) {
        echo "No students";
    } else {
        while ($rez1 = mysqli_fetch_array($query)) {
            $sID = $rez1['StudentID'];
            $links = mysqli_query($w,"select * from schstudent where StudentID ='$sID'");
            $gtr = mysqli_fetch_array($links);
            echo "<td>".$gtr['StudentID']."</td><td>" . $gtr['StudentName'] . "</td><td>" . $gtr['ClassID'] . "</td></tr>";
        }
    }
} catch (Exception $e) {
    echo "Application is busy";
}