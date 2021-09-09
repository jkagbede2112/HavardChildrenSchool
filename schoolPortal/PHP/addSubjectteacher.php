<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * $d = mysql_query("select * from subjects order by SubjectCategory ASC");
 */

$stafftype = validate("stafftype");
$staffname = validate("name");
$staffphone = validate("phone");
$staffcredential = validate("credential");
$staffaddress = validate("address");
$staffID = "HCS" . rand(1000, 9999);
$staffemail = $_POST['email'];
$staffPassword = "HCS". rand(250, 999). chr(rand(45,66));

$hsf = "insert into schstaff (StaffID, StaffName, StaffEmail, StaffPhone, StaffCredentials, StaffAddress, StaffPassword, Role) "
        . "values('$staffID','$staffname','$staffemail','$staffphone','$staffcredential','$staffaddress','$staffPassword','$stafftype')";
$a = mysqli_query($w,$hsf);
if ($a) {
    echo "Saved";
    $message = "Dear " . $staffname . ",<br/><br/> An account has been created for you on the Amazing Grace ARSMaS School Portal. <br/><br/> Your username is - " . $staffemail .  "<br/>Your password is - ". $staffPassword ."<br/><br/> You can change your password upon login. <br/><br/> Regards,<br/>ARSMaS";
} else {
    //echo "This subject may have been saved earlier. We cannot save this subject against another name. Use the update feature in subjects section. Thanks";
echo "Staff may have already been registered. Email or phone number may already be on file.";
    
}
