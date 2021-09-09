<?php

include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$message = $_POST['message'];

$h = mysqli_query($w,"insert into defaultmessage values('$message')");

if ($h){
    echo "inserted";
}else{
    echo "Not inserted";
}
