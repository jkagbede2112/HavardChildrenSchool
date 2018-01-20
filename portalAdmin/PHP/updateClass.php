<?php

include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$wtao = $_POST['wtao'];

$fa = mysqli_query($w,"select * from schclass where SN='$wtao'");
$d = mysqli_fetch_array($fa);

$cN = $d['ClassName'];

echo $cN;