<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

$classid = validate("classid");

$xq = "select * from subjects where SubjectCategoryid='$classid'";
$q = mysqli_query($w, $xq);
while ($z = mysqli_fetch_array($q)) {
    $sn = $z['sn'];
    $subjectname = $z['SubjectName'];
    echo "<option value='$sn'>$subjectname</option>";
}