<?php
include 'databaseSQLconnectn.php';
include 'validateinput.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$ParentID = validate('parentID');
$StudentID = validate('studentID');

$d = mysqli_query($w,"Update linkages set Status = '1' where ParentID='$ParentID' and StudentID = '$StudentID'");
if ($d){
    echo "Allowed successfully";
}else{
    echo "Not successful";
}