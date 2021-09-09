<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';
//parid:parentid, stdid:stdid
$parid = $_POST['parid'];
$stdid = $_POST['stdid'];

$l = "insert into linkages (ParentID, StudentID, Status) values ('$parid','$stdid','1')";
$h = mysqli_query($w,$l);
if ($h){
    echo "Link done";
}else{
    echo "Link not made";
}