<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';


$action = $_POST['action'];
//echo $phonenumber . " We have it";
if ($action === "getparent") {
    $phonenumber = $_POST['phonenumber'];
    $q = "select * from parentsregister where phoneNumber='$phonenumber'";
    $g = mysqli_query($w, $q);
    $hc = mysqli_fetch_array($g);

    $parentid = $hc['ParentID'];
    $parentname = $hc['ParentSurname'] . " " . $hc['ParentFirstname'];

    echo "<div style='margin-top:10px'><span style='font-size:16px'>$parentname</span> <span id='paridattachee' style='display:none'>$parentid</span></div>";
}

if ($action === "getstudent") {
    //studentid:studentidc
    $studentid = $_POST['studentid'];
    //echo $studentid;
    $q = "select * from schstudent where schoolid='$studentid'";
    $g = mysqli_query($w, $q);
    $hc = mysqli_fetch_array($g);

    $schoolid = $hc['schoolid'];
    $stdname = $hc['Surname'] . " " . $hc['Firstname'];

    echo "<div style='margin-top:10px'><span style='font-size:16px'>$stdname</span> <span id='stdidattachee' style='display:none'>$schoolid</span></div>";
}
