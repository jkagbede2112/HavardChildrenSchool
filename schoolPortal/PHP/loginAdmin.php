<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user = validate("user");
$password = validate("password");

//echo $_SESSION['Curr_Term'];
//echo $_SESSION['Curr_Session'];
//echo $user . " - " . $password;
$q = mysqli_query($w,"select * from parentsregister where Email='$user' and Password='$password'");
$e = mysqli_fetch_array($q);
$id = mysqli_num_rows($q);

if ($id < 1) {
        echo "0";
} else {
    //$_SESSION['Role'] = $e['Role'];
    $_SESSION['Name'] = $e['ParentName'];
    $_SESSION['parentid'] = $e['ParentID'];
        echo "1";
}

