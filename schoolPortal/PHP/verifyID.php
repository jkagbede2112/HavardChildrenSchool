<?php

$counter = 0;
$storyforthegods;
include 'databaseSQLconnectn.php';

$parentID = $_GET['jumbotron'];
$UniqueKey = $_GET['UniqueKey'];
$ParentKey = $_GET['ParentKey'];

if ($ParentKey . length < 3 || $ParentKey . length > 3) {
    $counter += 1;
    $storyforthegods = "Parent key is invalid";
}
if ($UniqueKey . length < 3 || $UniqueKey . length > 3) {
    $counter += 1;
    $storyforthegods = "Unique key is invalid";
}
if ($parentID . length < 9 || $parentID . length > 9) {
    $counter += 1;
    $storyforthegods = "ParentID is invalid";
}

$statement = "update parentsregister set status='1' where ParentID = '$parentID'";
$update = mysqli_query($w,$statement);

if ($update) {
    $retrieve = "select * from parentsregister where ParentID='$parentID'";
    $retrieveDetails = mysqli_query($w,$retrieve);
    if ($retrieveDetails) {
        $pull = mysqli_fetch_array($retrieveDetails);
        $parentName = $pull['ParentName'];
        $parentEmail = $pull['Email'];

        session_start();
        $_SESSION['parentName'] = $parentName;
        $_SESSION['parentEmail'] = $parentEmail;
        header('Location:../dashboard.php');
    } else {
        echo "Could not get parent details";
    }
} else {
    echo "Could not set fields";
}