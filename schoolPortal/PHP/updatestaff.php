<?php
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *  sName:sName,sEmail:sEmail, sNumber:sSNumber,sCredential:sCredential, sAddress:sAddress
 */

$fsd = $_POST['sID'];
$sName = $_POST['sName'];
$sEmail = $_POST['sEmail'];
$sNumber = $_POST['sNumber'];
$sPasswor = $_POST['uTPassword'];
$sCredential = $_POST['sCredential'];
$sAddress = $_POST['sAddress'];

$dad = mysqli_query($w,"update schstaff set StaffName='$sName', StaffPassword='$sPasswor', StaffEmail='$sEmail', StaffCredentials='$sCredential', StaffPhone='$sNumber', StaffAddress='$sAddress' where StaffID='$fsd'");

if ($dad){
   echo "1"; 
}else{
    echo "0";
}
