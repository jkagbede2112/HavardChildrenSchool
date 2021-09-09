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

$loginquery = mysql_query("select * from parentsregister where Email = '$username' and Password = '$password'");
$fetch = mysql_fetch_array($loginquery);

if ($fetch) {
    $ParentID = $fetch['ParentID'];
    $ParentName = $fetch['ParentName'];
    $Email = $fetch['Email'];
    $PhoneNumber = $fetch['phoneNumber'];
    $emailsubscription = $fetch['emailnotification'];
    $newslettersubscription = $fetch['newslettersubscription'];
    $status = $fetch['status'];

    if ($status === "0") {
        echo "0";
    } else {
        session_start();
        $_SESSION['ParentName'] = $ParentName;
        $_SESSION['Email'] = $Email;
        $_SESSION['PhoneNumber'] = $PhoneNumber;
        $_SESSION['ParentID'] = $ParentID;
        $_SESSION['emailsubscription'] = $emailsubscription;
        $_SESSION['newsletters'] = $newslettersubscription;

        echo "1";
    }
} else {
    echo "-1";
}
//-1 = Invalid username/password.
//1 = succes 
// 0 = verify your email