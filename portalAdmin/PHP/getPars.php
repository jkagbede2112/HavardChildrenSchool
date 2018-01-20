<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$stdID = $_POST['stdID'];
$val = $_POST['val'];


if ($val === "1") {
    $d = mysql_query("select ParentID from linkages where StudentID='$stdID'");
    while ($a = mysql_fetch_array($d)) {
        $g = $a['ParentID'];
        $ko = mysql_query("select ParentSurname, ParentFirstname from parentsregister where ParentID='$g'");
        $v = mysql_fetch_array($ko);
        echo "<option>" . $v['ParentSurname'] . " " . $v['ParentFirstname'] . "</option>";
    }
    if (mysql_num_rows($d) < 1) {
        echo "<option>No parent found</option>";
    }
}

if ($val === "2") {
    $d = mysqli_query($w,"select ParentID from linkages where StudentID='$stdID'");
    while ($a = mysqli_fetch_array($d)) {
        $g = $a['ParentID'];
        $ko = mysqli_query($w,"select phoneNumber from parentsregister where ParentID='$g'");
        $v = mysqli_fetch_array($ko);
        if (mysqli_num_rows($ko) < 1) {
            echo "<option>- No Number -</option>";
        } else {
            echo "<option>" . $v['phoneNumber'] . "</option>";
        }
    }
    if (mysqli_num_rows($d) < 1) {
        echo "<option>No numbers</option>";
    }
}

if ($val === "3") {
    $d = mysqli_query($w,"select ParentID from linkages where StudentID='$stdID'");
    while ($a = mysqli_fetch_array($d)) {
        $g = $a['ParentID'];
        $ko = mysqli_query($w,"select Email from parentsregister where ParentID='$g'");
        $v = mysqli_fetch_array($ko);
        echo "<option>" . $v['Email'] . "</option>";
    }
    if (mysqli_num_rows($d) < 1) {
        echo "<option>No numbers</option>";
    }
}