<?php

include 'databaseSQLconnectn.php';
$parentID = strip_tags($_POST['parentID']);
//$parentID = "SUN8859FC";
session_start();
$parid = $_SESSION['ParentID'];

echo "<option>Hi there</option>";

$query1 = mysql_query($w, "select * from linkages where ParentID = '$parentID' and status = '1'");

while ($retrieval = mysql_fetch_array($query1)) {
    $studentID = $retrieval['StudentID'];
    $request = "select * from schstudent where StudentID = '$studentID'";

    $getstudentinfo = mysql_query($request);
    $pull = mysql_fetch_array($getstudentinfo);
    $studentName = $pull['Surname'] . " " . $pull['Firstname'];
    $schid = $pull['schoolid'];

    echo "<option value='$schid'>hi</option>";
}