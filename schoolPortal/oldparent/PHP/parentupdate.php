<?php

include 'databaseSQLconnectn.php';
session_start();
$parentID = $_SESSION['ParentID'];

$parentName = $_POST["parentName"];
$parentphonenumber = $_POST["parentNumber"];
$emailsubscription = $_POST["emailNotification"];
$newslettersubscription = $_POST["newslettermailing"];


$updatestatement = mysql_query("update parentsregister set ParentName = '$parentName', phoneNumber = '$parentphonenumber', emailnotification='$emailsubscription', newslettersubscription='$newslettersubscription' where ParentID = '$parentID'");
if ($updatestatement) {
    $_SESSION['ParentName'] = $parentName;
    $_SESSION['PhoneNumber'] = $parentphonenumber;
    $_SESSION['emailsubscription'] = $emailsubscription;
    $_SESSION['newsletters'] = $newslettersubscription;
    
} else {
    echo "Failed";
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

