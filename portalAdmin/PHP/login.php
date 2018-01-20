<?php

include 'databaseSQLconnectn.php';

error_reporting(0);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$username = $_POST['username'];
$password = $_POST['password'];

$loginquery = mysqli_query($w,"select * from parentsregister where Email = '$username' and Password = '$password'");
$fetch = mysqli_fetch_array($loginquery);

if ($fetch) {
    $ParentID = $fetch['ParentID'];
    $ParentName = $fetch['ParentName'];
    $Email = $fetch['Email'];
    $PhoneNumber = $fetch['phoneNumber'];
    $emailsubscription = $fetch['emailnotification'];
    $newslettersubscription = $fetch['newslettersubscription'];
    
    session_start();
    $_SESSION['ParentName'] = $ParentName;
    $_SESSION['Email'] = $Email;
    $_SESSION['PhoneNumber'] = $PhoneNumber;
    $_SESSION['ParentID'] = $ParentID;
        $_SESSION['emailsubscription'] = $emailsubscription;
    $_SESSION['newsletters'] = $newslettersubscription;
    
    echo "success";
    
} else {
    echo "Invalid Username/Password";
}