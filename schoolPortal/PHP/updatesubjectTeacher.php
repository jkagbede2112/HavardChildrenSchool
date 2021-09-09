<?php

include 'databaseSQLconnectn.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//SN: SN, subjectcode:subjectcode, subjectname:subjectname, teacherID: teacherID
$sn = $_POST['SN'];
$subjectcode = $_POST['subjectcode'];
$subjectname = $_POST['subjectname'];
$teacherID = $_POST['teacherID'];

$ht = "update subjects set TeacherID='$teacherID', subjectcode='$subjectcode', SubjectName='$subjectname' where sn='$sn'";

$dadad = mysqli_query($w,$ht);

if ($dadad){
    echo "Success! ";
    //Mail Teacher informing him of new subject added.
}else{
    echo "Failed";
}