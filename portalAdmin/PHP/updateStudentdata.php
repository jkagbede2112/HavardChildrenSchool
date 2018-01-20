<?php
include 'databaseSQLconnectn.php';
include 'validateinput.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * sname:sname, fname:fname, classID:classID, address:address, stdemail:stdemail, id:id
 */
$fname = validate("fname");
$sname = validate("sname");
$classID = validate("classID");
$address = validate("address");
$stdemail = validate("stdemail");
$id = validate("id");
$fullname = $sname . " " . $fname;

$sender = mysqli_query($w,"update studentinfo set Surname='$sname', Firstname='$fname', ClassID='$classID', StudentName='$fullname', HomeAddress='$address', EmailAddress='$stdemail' where StudentID='$id'");
if ($sender){
    echo "Update sent";
}else{
    echo "Update not sent";
}