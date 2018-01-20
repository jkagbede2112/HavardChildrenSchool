<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$parentID = $_SESSION['ParentID'];
$retrieval = mysql_query("select * from linkages where ParentID ='$parentID' and Status='1'");

$count = mysql_num_rows($retrieval);

if ($count < 1) {
    echo "<option>No student found</option>";
} else {
    
    echo "<option>0</option>";
    while($pull = mysql_fetch_array($retrieval)){
       $studentID = $pull['StudentID'];
    echo "<option>".$studentID."</option>"; 
    }  
}