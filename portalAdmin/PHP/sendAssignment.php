<?php
include 'validateinput.php';
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * subjectclass:subjectclass, Assignment:Assignment
 */
session_start();
$Rsc = validate("subjectclass");
$Assignment = validate("Assignment");

$ClassSubject = split("-",$Rsc);
$Class = $ClassSubject[0];
$Subject = $ClassSubject[1];
$teacherID = $_SESSION['TeacherID'];

//echo $Class . " " . $Subject;

$ga = mysqli_query($w,"insert into assignments (Subject, TeacherID, StudentID, Assignment) values('$Subject','$teacherID','$Class','$Assignment')");
if ($ga){
    echo "Assignment issued";
    //Send Parents email
}else{
    echo "Assignment not issued";
}