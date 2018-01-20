<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'databaseSQLconnectn.php';

$parID = $_POST['parentID'];
$wtd = $_POST['wtd'];

if ($wtd === "Deactivate") {
    $up = mysqli_query($w,"Update parentsregister set status='0' where ParentID='$parID'");
    if ($up) {
        echo "Deactivation successful";
    } else {
        echo "Could not deactivate parent.";
    }
} else {
    $up = mysqli_query($w,"Update parentsregister set status='1' where ParentID='$parID'");
    if ($up) {
        echo "Activation successful";
    } else {
        echo "Could not activate parent.";
    }
}
