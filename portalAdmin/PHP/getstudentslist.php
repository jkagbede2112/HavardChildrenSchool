<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'validateinput.php';
include 'databaseSQLconnectn.php';


$searchParameter = validate('searchParameter');

if ($searchParameter === "search") {
    $searchCriteria = validate('searchCriteria');
    $query = mysqli_query($w,"select * from schstudent where StudentName like '%$searchCriteria%' order by ClassID");
    if (mysqli_num_rows($query) < 1) {
        echo "No students";
    } else {
        while ($rez1 = mysqli_fetch_array($query)) {
            $sID = $rez1['StudentID'];
            $links = mysqli_query($w,"select * from linkages where StudentID ='$sID'");
            $gtr = mysqli_num_rows($links);

            echo "<tr><td>" . $rez1['StudentID'] . "</td><td><b>" . strtoupper($rez1['Surname']) . "</b> ". $rez1['Firstname'] ."</td><td>" . $rez1['ClassID'] . "</td><td>" . $rez1['EmailAddress'] . "</td><td>" . $gtr . " <a style=\"padding:1px\" data-toggle='modal' data-target='#viewSattaches' class=\"btn\" onclick =\"viewSAttaches('$sID')\">View</a></td><td><a style=\"padding:1px\" data-toggle='modal' data-target='#updateStudent' class=\"btn\" onclick=\"getstdInfo('$sID')\">Update</a></td></tr>";
        }
    }
} elseif ($searchParameter === "getlist") {
    try {
        $query = mysqli_query($w,"select * from schstudent order by ClassID LIMIT 20");
        if (mysqli_num_rows($query) < 1) {
            echo "No students";
        } else {
            while ($rez1 = mysqli_fetch_array($query)) {

                $sID = $rez1['StudentID'];
                $links = mysqli_query($w,"select * from linkages where StudentID ='$sID'");
                $gtr = mysqli_num_rows($links);

                echo "<tr><td>" . $rez1['StudentID'] . "</td><td><b>" . strtoupper($rez1['Surname']) . "</b> ". $rez1['Firstname'] ."</td><td>" . $rez1['ClassID'] . "</td><td>" . $rez1['EmailAddress'] . "</td><td>" . $gtr . " <a style=\"padding:1px\" data-toggle='modal' data-target='#viewSattaches' class=\"btn\" onclick =\"viewSAttaches('$sID')\">View</a></td><td><a style=\"padding:1px\" data-toggle='modal' data-target='#updateStudent' class=\"btn\" onclick=\"getstdInfo('$sID')\">Update</a></td></tr>";
            }
        }
    } catch (Exception $e) {
        echo "Application is busy";
    }
} elseif ($searchParameter === "filter") {
    $searchCriteria = $_POST['searchCriteria'];
    $query = mysqli_query($w,"select * from schstudent where ClassID = '$searchCriteria' order by ClassID");
    if (mysqli_num_rows($query) < 1) {
        echo "No students";
    } else {
        while ($rez1 = mysqli_fetch_array($query)) {

            $sID = $rez1['StudentID'];
            $links = mysqli_query($w,"select * from linkages where StudentID ='$sID'");
            $gtr = mysqli_num_rows($links);

            echo "<tr><td>" . $rez1['StudentID'] . "</td><td><b>" . strtoupper($rez1['Surname']) . "</b> ". $rez1['Firstname'] ."</td><td>" . $rez1['ClassID'] . "</td><td>" . $rez1['EmailAddress'] . "</td><td>" . $gtr . " <a style=\"padding:1px\" data-toggle='modal' data-target='#viewSattaches' class=\"btn\" onclick =\"viewSAttaches('$sID')\">View</a></td><td><a style=\"padding:1px\" data-toggle='modal' data-target='#updateStudent' class=\"btn\" onclick=\"getstdInfo('$sID')\">Update</a></td></tr>";
        }
    }
}

