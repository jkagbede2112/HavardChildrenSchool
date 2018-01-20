<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$recordID = validate("recordID");
$wtd = validate("wtd");

if ($wtd === "p") {
    $e = "update schoolevents set publish='1' where SN='$recordID'";
    //echo $e;
    $w = mysqli_query($w,$e);
    if ($w) {
        echo "Event now published";
    } else {
        echo "Publish failed";
    }
} else {
    $w = mysqli_query($w,"update schoolevents set publish='0' where SN='$recordID'");
    if ($w) {
        echo "Event now unpublished";
    } else {
        echo "Unpublish failed";
    }
}