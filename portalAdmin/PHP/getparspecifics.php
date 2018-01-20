<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'databaseSQLconnectn.php';

$parentID = $_POST['parentID'];

$getDets = mysqli_query($w,"select * from parentsregister where ParentID = '$parentID'");
$getter = mysqli_fetch_array($getDets);
$name = $getter['ParentName'];
$email = $getter['Email'];

echo "<a>".$name."</a><b>".$email."</b>";