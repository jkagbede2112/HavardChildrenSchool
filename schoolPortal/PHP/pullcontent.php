<?php
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$SN = $_POST['SN'];

$getsenderid = mysqli_query($w,"select MessageContent from portalmessage where SN='$SN'");
mysqli_query($w,"update portalmessage set status='1' where SN ='$SN'");
$pull = mysqli_fetch_array($getsenderid);

echo $pull['MessageContent'];