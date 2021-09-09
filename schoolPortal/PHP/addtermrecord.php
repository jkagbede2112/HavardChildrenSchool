<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$term = validate("term");
$yr = validate("yr");
$activity = validate("activity");
$ttime = validate("ttime");

$g = mysql_query($w, "insert into termcalendar (term, year, activity, timeframe) values ('$term','$yr','$activity','$ttime')");
if ($g){
    echo "<tr><td>".$activity."</td><td>".$ttime."</td></tr>";
}else{
    echo "Not saved";
}
