<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * name:name, phone:phone, classr:classr, addreee:address}
 */
session_start();
$stdentName = strip_tags($_POST['name']);
$phone = strip_tags($_POST["phone"]);
$class = strip_tags($_POST["classr"]);
$address = strip_tags($_POST["addreee"]);

if (strlen($stdentName) < 1 || strlen($phone) < 1 || strlen($class) < 1 || strlen($address) < 1) {
    echo "Please fill all fields";
} else {
    $savby = $_SESSION['ParentID'];

    $ad = mysql_query("insert into preregisteredstudents (Name, Class, Address, PhoneNumber, registeredBy)"
            . " values ('$stdentName','$class','$address','$phone','$savby')");
    if ($ad) {
        echo "Saved.. School has been notified too";
    }
}
