<?php
include 'validateinput.php';
include 'databaseSQLconnectn.php';
include 'mailer.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$name = validate("name");
$classID = validate("classID");
$phone = validate("phone");
$credential = validate("credential");
$address = validate("address");
$teacherID = "SUN".rand(1000,9999);
$teacherEmail = validate("email");

$password = "GB".chr(rand(65,70)).chr(rand(65,70)).rand(65,70).chr(rand(65,70))."egi";

//echo "insert into cts (TeacherID, ClassID, Credential, TeacherEmail, password, phoneNumber, Address, Privileged, TeacherName) values('$teacherID','$classID','$credential','$teacherEmail','$password','$phone','$address','1','$name')";
$insert = mysqli_query($w, "insert into cts (TeacherID, ClassID, Credential, TeacherEmail, password, phoneNumber, Address, Privileged, TeacherName) values('$teacherID','$classID','$credential','$teacherEmail','$password','$phone','$address','1','$name')");

if ($insert){
    echo "<span style='color:#000'>Sucessfully inserted</span>";
    $subje = "Account created";
    $message = "Dear ".$name .",<br/><br/>We just created an account for you on the school portal. <br/><br/> Your username is your email address:"
            .$teacherEmail." <br/>Your password is <br/>".$password."<br/>";
    sendmail($teacherEmail,$subje,$message);
}else{
    echo "<span style='color:#FF0000'>Not saved this time..</span>";
}