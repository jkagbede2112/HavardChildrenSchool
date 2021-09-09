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

$jhf = mysqli_query($w, "select * from currentsession order by sn desc");
$efdf = mysqli_fetch_array($jhf);
$_SESSION['Curr_Term'] = $efdf['Term'];
$_SESSION['Curr_Session'] = $efdf['Session'];

//echo $_SESSION['Curr_Term'];
//echo $_SESSION['Curr_Session'];
//echo $user . " - " . $password;
$q = mysqli_query($w, "select * from schooladmin where Username='$user' and Password='$password'");
$e = mysqli_fetch_array($q);
$id = mysqli_num_rows($q);

if ($id < 1) {
    $h = mysqli_query($w, "select * from schstaff where StaffEmail ='$user' and StaffPassword ='$password'");
    $p = mysqli_fetch_array($h);
    if (mysqli_num_rows($h) > 0) {
        $_SESSION['Role'] = $p['Role'];
        $_SESSION['Name'] = $p['StaffName'];
        $_SESSION['TeacherID'] = $p['StaffID'];
        $ssID = $p['StaffID'];

        $gg = mysqli_query($w, "select * from schclass where ClassTeacher='$ssID'");
        if (mysqli_num_rows($gg) > 0) {
            $o = mysqli_fetch_array($gg);
            $_SESSION['ClassID'] = $o['ClassName'];
        } else {
            $_SESSION['ClassID'] = "NCT";
        }

        $ss = substr($ssID, 0, 3);
        if ($ss === "HCS") {
            echo "3";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
} else {
    $_SESSION['Role'] = $e['Role'];
    $_SESSION['Name'] = $e['Name'];
    $_SESSION['TeacherID'] = $e['Role'];
    if ($e['Role'] === "Admin") {
        echo "1";
    }
}

