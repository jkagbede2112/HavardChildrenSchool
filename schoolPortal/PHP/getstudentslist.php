<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';


$searchParameter = validate('searchParameter');

if ($searchParameter === "search") {
    $searchCriteria = validate('searchCriteria');
    $query = mysqli_query($w, "select * from schstudent where Firstname like '%$searchCriteria%' or Surname like '%$searchCriteria%' order by ClassID LIMIT 40");
    if (mysqli_num_rows($query) < 1) {
        echo "No students";
    } else {
        while ($rez1 = mysqli_fetch_array($query)) {
            $sID = $rez1['StudentID'];
            $links = mysqli_query($w, "select * from linkages where StudentID ='$sID'");
            $gtr = mysqli_num_rows($links);
            $classid = $rez1['ClassID'];
            $classname = getclassname($classid);

            echo "<tr><td>" . $rez1['schoolid'] . "</td><td><b>" . strtoupper($rez1['Surname']) . "</b> " . $rez1['Firstname'] . "</td><td>" . $classname . "</td><td>" . $rez1['dateofbirth'] . "</td><td>" . $gtr . " <a style=\"padding:1px\" data-toggle='modal' data-target='#viewSattaches' class=\"btn\" onclick =\"viewSAttaches('$sID')\">View</a></td><td><a style=\"padding:1px\" data-toggle='modal' data-target='#updateStudent' class=\"btn\" onclick=\"getstdInfo('$sID')\">Update</a></td></tr>";
        }
    }
} elseif ($searchParameter === "getlist") {
    try {
        $query = mysqli_query($w, "select * from schstudent order by ClassID ASC LIMIT 30");
        if (mysqli_num_rows($query) < 1) {
            echo "No students";
        } else {
            while ($rez1 = mysqli_fetch_array($query)) {

                $sID = $rez1['StudentID'];
                $links = mysqli_query($w, "select * from linkages where StudentID ='$sID'");
                $gtr = mysqli_num_rows($links);
                $classid = $rez1['ClassID'];
                $classname = getclassname($classid);

                echo "<tr><td>" . $rez1['schoolid'] . "</td><td><b>" . strtoupper($rez1['Surname']) . "</b> " . $rez1['Firstname'] . "</td><td>" . $classname . "</td><td>" . $rez1['dateofbirth'] . "</td><td>" . $gtr . " <a style=\"padding:1px\" data-toggle='modal' data-target='#viewSattaches' class=\"btn\" onclick =\"viewSAttaches('$sID')\">View</a></td><td><a style=\"padding:1px\" data-toggle='modal' data-target='#updateStudent' class=\"btn\" onclick=\"getstdInfo('$sID')\">Update</a></td></tr>";
            }
        }
    } catch (Exception $e) {
        echo "Application is busy";
    }
} elseif ($searchParameter === "filter") {
    $searchCriteria = $_POST['searchCriteria'];
    $query = mysqli_query($w, "select * from schstudent where ClassID = '$searchCriteria' order by ClassID");
    if (mysqli_num_rows($query) < 1) {
        echo "No students";
    } else {
        while ($rez1 = mysqli_fetch_array($query)) {

            $sID = $rez1['StudentID'];
            $links = mysqli_query($w, "select * from linkages where StudentID ='$sID'");
            $gtr = mysqli_num_rows($links);
            $classid = $rez1['ClassID'];
            $classname = getclassname($classid);

            echo "<tr><td>" . $rez1['schoolid'] . "</td><td><b>" . strtoupper($rez1['Surname']) . "</b> " . $rez1['Firstname'] . "</td><td>" . $classname . "</td><td>" . $rez1['dateofbirth'] . "</td><td>" . $gtr . " <a style=\"padding:1px\" data-toggle='modal' data-target='#viewSattaches' class=\"btn\" onclick =\"viewSAttaches('$sID')\">View</a></td><td><a style=\"padding:1px\" data-toggle='modal' data-target='#updateStudent' class=\"btn\" onclick=\"getstdInfo('$sID')\">Update</a></td></tr>";
        }
    }
}
