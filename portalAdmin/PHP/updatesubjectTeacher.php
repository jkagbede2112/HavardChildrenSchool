<?php

include 'databaseSQLconnectn.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$sn = $_POST['SN'];
$teacherID = $_POST['teacherID'];

$dadad = mysqli_query($w,"update subjects set TeacherID='$teacherID' where sn='$sn'");

if ($dadad){
    echo "Success! ";
    //Mail Teacher informing him of new subject added.
}else{
    echo "Failed";
}