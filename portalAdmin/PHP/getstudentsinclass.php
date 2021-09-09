<?php

include 'databaseSQLconnectn.php';

$classid = $_POST['classid'];

$ha = "select * from schstudent where ClassID='$classid' order by Surname desc";

$ja = mysqli_query($w,$ha);
while ($q = mysqli_fetch_array($ja)){
    $name = strtoupper($q['Surname']) . " " . $q['Middlename'] . " " . $q['Firstname'];
    $studentid = $q['schoolid'];
    echo "<option value='$studentid'>$name</option>";
}