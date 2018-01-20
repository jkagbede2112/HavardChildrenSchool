<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'databaseSQLconnectn.php';

$d = mysqli_query($w,"select ClassName from schclass");
$count = 1;
while ($s = mysqli_fetch_array($d)){
    $class = $s['ClassName'];
    $ad = mysqli_query($w, "select * from schstudent where ClassID='$class'");
    $studentcount = mysqli_num_rows($ad);
    
    echo "<tr><td>".$count."</td><td>".$class."</td><td>".$studentcount."</td><td>N23,000</td><td>N1,200</td></tr>";
    $count++;
}
