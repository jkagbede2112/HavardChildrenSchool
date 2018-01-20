<?php
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$subjectteacherID = "AGIC5639";
//$sn="1";
$sn = $_POST['subjectSN'];
$f = mysqli_query($w,"select * from subjects where sn='$sn'");

$h = mysql_fetch_array($f);
$subjectID =$h['SubjectID'];
$SubjectName = $h['SubjectName'];
$subjectClass = $h['SubjectCategory'];
$subjectTeacherID = $h['TeacherID'];
$subjectSN = $h['sn'];

$j = mysqli_query($w,"select * from schstaff where StaffID='$subjectTeacherID'");
$p = mysqli_fetch_array($j);
$name = $p['StaffName'];

echo "<q>".$SubjectName."</q><w>".$subjectClass."</w><e>".$subjectTeacherID."</e><f>".$name."</f><g>".$subjectSN."</g>";