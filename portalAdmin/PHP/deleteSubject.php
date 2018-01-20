<?php
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$val = $_POST['val'];
$s = mysqli_query($w,"delete from subjects where sn='$val'");
if ($s){
    echo "Deleted";
}