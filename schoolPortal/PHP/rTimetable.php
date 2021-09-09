<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$q = mysqli_query($w,"select * from termcalendar");

while ($w = mysqli_fetch_array($q)){
 echo "<tr><td>".$w['activity']."</td><td>".$w['timeframe']."</td></tr>";    
}

