<?php

include 'databaseSQLconnectn.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * classID:classID, assinee:assignee
 */
$classID = $_POST['classID'];
$Teacher = $_POST['assinee'];

$w = mysqli_query($w,"update schclass set ClassTeacher='$Teacher' where ClassName='$classID'");
if ($w){
    echo "Updated";
}else{
    echo "Not Saved";
}