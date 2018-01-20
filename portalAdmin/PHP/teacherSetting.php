<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $dm = validate("dm");
 $nl = validate("nl");
 $ta = validate("ta");

 echo $dm . " " . $ta . " " . $nl;
 
 $h = mysqli_query($w,"update teachersetting set DirectMessaging = '$dm', TakeAttendance = '$ta', Newsletters = '$nl' where ");