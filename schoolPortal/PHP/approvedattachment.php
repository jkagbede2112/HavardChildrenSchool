<?php

include 'databaseSQLconnectn.php';
//$parentID = strip_tags($_POST['parentID']);
$parentID = "SUN8859FC";

$query1 = mysql_query("select * from linkages where ParentID = '$parentID' and status = '1'");

while ($retrieval = mysql_fetch_array($query1)) {

    $studentID = $retrieval['StudentID'];

    $request = "select * from studentinfo where StudentID = '$studentID'";

    $getstudentinfo = mysql_query($request);
    $pull = mysql_fetch_array($getstudentinfo);
    $studentName = $pull['StudentName'];

    echo "<option>" . $studentName . "</option>";
}