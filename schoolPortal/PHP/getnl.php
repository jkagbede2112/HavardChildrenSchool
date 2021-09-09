<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$y = mysqli_query($w,"select * from newsletters order by sn desc");
while ($d = mysqli_fetch_array($y)){
    $subject = $d['subject'];
    $date = $d['datesent'];
    $content = $d['content'];
    $sn = $d['sn'];
    
    echo "<tr onclick=\"getnlContent('$sn')\" class=\"point\"><td>".$subject."</td><td>".$date."</td></tr>";
}