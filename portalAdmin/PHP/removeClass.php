<?php

include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$ctr = $_POST['tID'];

$asd = mysqli_query($w,"delete from schclass where SN = '$ctr'");
if ($asd){
    echo "Removed";
}else{
    echo "Not Removed";
}