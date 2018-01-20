<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$eventSN = validate("eventid");

$var = mysqli_query($w,"delete from schoolevents where SN ='$eventSN'");
if ($var){
    echo "Event deleted";
}else{
    echo "Event not deleted";
}