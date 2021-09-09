<?php

include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$classname = strtoupper($_POST['classname']);
$classtype = $_POST['classtype'];
$q = "insert into schclass (ClassName, schooltype) values ('$classname','$classtype')";
echo $q;
$d = mysqli_query($w,$q);
if ($d){
    echo "Successful";
}else{
    echo "Not saved";
}