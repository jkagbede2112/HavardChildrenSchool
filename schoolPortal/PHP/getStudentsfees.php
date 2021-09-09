<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$classID = $_POST['classID'];
$jkjk = "select * from schstudent where ClassID ='$classID'";
$links = mysqli_query($w,$jkjk);

$requestID = $_POST["cv"];
//echo $jkjk;
if ($requestID === "1") {
    while ($gtr = mysqli_fetch_array($links)) {
        echo "<option>" . $gtr['Surname'] . " " . $gtr['Firstname'] . "</option>";
    }
    if (mysqli_num_rows($links) < 1) {
        echo "<option>No student(s) found</option>";
    }
}
if ($requestID === "2") {
    while ($gtr = mysqli_fetch_array($links)) {
        echo "<option>" . $gtr['StudentID'] . "</option>";
    }
    if (mysqli_num_rows($links) < 1) {
        echo "<option>-</option>";
    }
}
