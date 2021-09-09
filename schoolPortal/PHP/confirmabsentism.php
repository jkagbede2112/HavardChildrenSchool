<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
//$classID = $_SESSION['ClassID'];
$teacherID = $_SESSION['TeacherID'];
$studentid = $_POST['studentID'];
$studentidU = $studentid . "-";
$tday = date('j-m-Y');
$classID = $_POST['classID'];

$s = mysqli_query($w,"select Present, Absent from attendancesheet where ClassID = '$classID' and Date='$tday' and Present like '%$studentidU%'");
$a = mysqli_fetch_array($s);
$af = $a['Present'];

$gs = str_replace($studentid, "", $af);

//update present
$vfs = "update attendancesheet set Present ='$gs' where Date = '$tday' and ClassID='$classID'";
mysqli_query($w,$vfs);

//update absent list
$xs = $a['Absent'];
$sd = $studentidU . $xs;
$vf = "update attendancesheet set Absent ='$sd' where Date = '$tday' and ClassID='$classID'";
$hhg = mysqli_query($w,$vf);
if ($hhg){
    
    $sdd = mysqli_query($w, "select Surname, Firstname from schstudent where StudentID ='$studentid'");
    $jkd = mysqli_fetch_array($sdd);
    $namee = $jkd['Surname'] . " " . $jkd['Firstname'];
//echo $sdd;    
echo "<tr><td>".$namee."</td><td style='text-align:center'><i class='fa fa-envelope-o point' title='Message parents/guardians'></i></td></tr>";
}