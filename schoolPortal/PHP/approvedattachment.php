<?php

include 'databaseSQLconnectn.php';
//$parentID = strip_tags($_POST['parentID']);
$parentID = "SUN8859FC";

$query1 = mysqli_query($w, "select * from linkages where ParentID = '$parentID' and status = '1'");

while ($retrieval = mysql_fetch_array($query1)) {

    $studentID = $retrieval['StudentID'];

    $request = "select * from studentinfo where StudentID = '$studentID'";

    $getstudentinfo = mysqli_query($w,$request);
    $pull = mysql_fetch_array($getstudentinfo);
    $studentName = $pull['StudentName'];

    echo "<option>" . $studentName . "</option>";
}