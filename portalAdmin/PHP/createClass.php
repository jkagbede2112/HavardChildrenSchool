<?php

include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$classname = strtoupper($_POST['classname']);
$d = mysqli_query($w,"insert into schclass (ClassName) values ('$classname')");
if ($d){
    echo "Successful";
}else{
    echo "Not saved";
}