<?php
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$sgsd = $_POST['assID'];

$fas = mysqli_query($w,"select * from assignments where SN='$sgsd'");
$fs = mysqli_fetch_array($fas);

$datacontent = $fs['Assignment'];
$subject = $fs['Subject'];
$TeacherID = $fs['TeacherID'];
$StudentID = $fs['StudentID'];
$Date = $fs['Date'];

$fsj = mysqli_query($w,"select * from subjectteachers where TeacherID='$TeacherID'");
$s = mysqli_fetch_array($fsj);
$TeacherName = $s['TeacherName'];

echo "<d>".$subject."</d><f>".$Date."</f><g>".$datacontent."</g><h>".$StudentID."</h>";