<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$studentID = validate('studentID');
$surname = validate('surname');
$firstname = validate('firstname');
$email = $_POST['email'];
$homeaddy = validate('homeaddy');
$ASclass = $_POST['ASclass'];

$gct = mysqli_query($w,"select * from schclass where ClassName='$ASclass'");

if (mysqli_num_rows($gct) === 1) {
    $rtv = mysqli_fetch_array($gct);
    $tid = $rtv['ClassTeacher'];
    $in = "insert into schstudent (StudentID, Surname, Firstname, StudentName, ClassID, HomeAddress, EmailAddress) values ('$studentID','$surname','$firstname', '$surname','$ASclass','$homeaddy', '$email')";
    $inn = mysqli_query($in);
    if ($inn) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "<span style='color:#ff0000'>Not saved.</span>";
}
