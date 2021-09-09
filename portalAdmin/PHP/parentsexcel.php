<?php

ob_start();
ob_get_flush();
header ( "Content-type: application/vnd.ms-excel" );
header ( "Content-Disposition: attachment; filename=havardparents.xls" );

include 'databaseSQLconnectn.php';
include 'validateinput.php'; 

$tb = "<table class='table table-bordered table-condensed'>
<tr style='background-color:#ccc'><td></td><td>Parent Name</td><td>Phone</td><td>E-mail</td><td></td></tr>";
$tf = "select * from parentsregister";
$ht = mysqli_query($w,$tf);
$gtf = mysqli_num_rows($ht);
$count =1;
while ($jt = mysqli_fetch_array($ht)){
    $parentname = $jt['ParentSurname'] . " " . $jt['ParentFirstname'];
    $email = $jt['Email'];
    $password = $jt['Password'];
    $phone = $jt['PhoneNumber'];
    $tb .= "<tr><td>$count</td><td>$parentname</td><td>$phone</td><td>$email</td><td></td></tr>";
    $count++;
}
echo $tb . "</table>";

?>