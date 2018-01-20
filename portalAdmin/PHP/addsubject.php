<?php
include 'validateinput.php';
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * subject:subject,subclass:subclass, status:status, subjectID:classSubstring
 * $subject = validate("subject");
$class = validate("subclass");
$status = validate("status");
$subjectID = validate("subjectID");
 */

$subject = ucfirst(validate("subject"));
$class = validate("subclass");
$status = validate("status");
$subjectID = validate("subjectID");

//echo ucfirst($subject) . " " . $class . " " . $subjectID . " " . $status;
$s = "insert into subjects (SubjectID,SubjectName,SubjectCategory,Compulsory) values ('$subjectID','$subject','$class','$status')";
//echo $s;
$a=mysqli_query($w,$s);
if ($a){
    echo "Subject added";
}else{
    echo "Subject not added";
}
