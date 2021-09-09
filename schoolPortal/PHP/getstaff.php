<?php

include 'databaseSQLconnectn.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$fsd = $_POST['sID'];

$afdf = "select * from schstaff where StaffID='$fsd'";
$ee = mysqli_query($w,$afdf);

$ga = mysqli_fetch_array($ee);

$classID = $ga['StaffID'];
$credential = $ga['StaffCredentials'];
$teacherEmail = $ga['StaffEmail'];
$phoneNumber = $ga['StaffPhone'];
$address = $ga['StaffAddress'];
$teachername = $ga['StaffName'];
$teacherpassword = $ga['StaffPassword'];

echo "<q>".$credential."</q><w>".$teacherEmail."</w><e>".$phoneNumber."</e><r>".$address."</r><t>".$teachername."</t><v>$teacherpassword</v>";