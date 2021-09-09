<?php
include 'databaseSQLconnectn.php';
include 'validateinput.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * sname:sname, fname:fname, classID:classID, address:address, stdemail:stdemail, id:id
 */
 $action = validate("action");

if ($action === "removestd"){
	$id = validate("id");
	$hy = "delete from schstudent where StudentID='$id'";
$yt = mysqli_query($w, $hy);
if ($yt){
	echo "Student removed";
}else{
	echo "Student not removed this time";
}
	return;
}

if ($action === "updatestd"){
$fname = validate("fname");
$sname = validate("sname");
$classID = validate("classID");
$address = validate("address");
$stdemail = validate("stdemail");
$id = validate("id");
$fullname = $sname . " " . $fname;

$sender = mysqli_query($w,"update schstudent set Surname='$sname', Firstname='$fname', ClassID='$classID', HomeAddress='$address', EmailAddress='$stdemail' where StudentID='$id'");
if ($sender){
    echo "Update sent";
}else{
    echo "Update not sent";
}	
}