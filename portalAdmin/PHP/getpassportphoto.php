<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

$stdid = $_POST['stdid'];

$g = "select passportphoto from schstudent where schoolid ='$stdid'";
$f = mysqli_query($w,$g);
$hz = mysqli_fetch_array($f);
$photo = "PHP/". $hz['passportphoto'];
echo $photo;