<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
eName:ceName, ceDesc:ceDesc, cesDate:cesDate, ceeDate:ceeDate, ePublish:ePublish
 *  */

$eventName = validate("eName");
$eventDescription = validate("ceDesc");
$estartDate = validate("cesDate");
$eendDate = validate("ceeDate");
$publishstatus = validate("ePublish");

$ins = "insert into schoolevents (eventName, eventDescription, startDate, endDate, publish) values "
        . "('$eventName','$eventDescription','$estartDate', '$eendDate','$publishstatus')";

$verify = mysqli_query($w,$ins);
//echo $ins;
if ($verify){
    if ($publishstatus === "1"){
    echo "2";
    }else{
        echo "1";
    }
}else{
    echo "0";
}
