<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'databaseSQLconnectn.php';

$tid = $_POST['tID'];

$uasd = mysqli_query($w,"delete from schstaff where StaffID ='$tid'");
if ($uasd){
    echo "Removed";
}else{
    echo "Not removed";
}