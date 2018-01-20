<?php

$toreturn = "";
$counter = 0;
//error_reporting(0);
/*
 * Developed by Joseph Kayode Agbede of www.jkagbede.com
 * for Sunshine Schools Ibadan
 */

include 'databaseSQLconnectn.php';
include 'mailer.php';

$firstname = strip_tags($_POST['firstname']);
if (empty($firstname)) {
    $counter += 1;
}

$lastname = strip_tags($_POST['lastname']);
if (empty($lastname)) {
    $counter += 1;
}

$parentname = $lastname . " " . $firstname;

//$randomAttache = rand(1000,9999) .chr(rand(65,90)).chr(rand(65,90)) ."&UniqueKey=".chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).rand(100000,999999)."&ParentKey=".chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).rand(100000,999999)."&SchoolKey=".chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).rand(100000,999999)."&SecurityKey=".chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).rand(100000,999999);
$parentID = "AGIC" . rand(1000, 9999) . chr(rand(65, 90)) . chr(rand(65, 90));
$randomAttache = $parentID . "&UniqueKey=" . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . rand(100000, 999999) . "&ParentKey=" . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90));

$password = strip_tags($_POST['password']);
$email = strip_tags($_POST["email"]);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    
} else {
    $toreturn .= "Invalid email address";
    $counter += 1;
}


if (empty($password)) {
    $counter += 1;
}

if ($counter > 0) {
    echo "<font style='color:red'><center> " . $toreturn . " </center></font>";
} else {
    $insertvalue = "insert into parentsregister (ParentID, ParentSurname, ParentFirstname, ParentName, Email, Password, phoneNumber, status) values ("
            . "'$parentID','$lastname','$firstname','$parentname','$email','$password','','0')";
    //echo $insertvalue;
    $goodSave = mysql_query($insertvalue);
    if ($goodSave) {
        $mailer =  '
            <div style="font-family:verdana; font-size:12px; color:#666666">
        <b>Dear Parent/Guardian,</b> <br/><br/>
        Thank you for taking the time out to register on Amazing Grace International School Parent Portal. You have successfully registered to SSPP - Sunshine School Parent Portal. Kindly click the button below to verify your email and complete your registeration.
        <br/><br/><br/>

        <center><a style="padding:10px; background-color:#009CE8; color:#fff" target="_blank" href="/sunshineschool/schoolPortal/PHP/verifyID.php?jumbotron=' . $randomAttache . '">Verify my email</a></center><br/><br/>
Your username is : <b>' . $email . '</b><br/>'
        . 'Your password is : <b>' . $password . '</b><br/>
<br/>
Now that you have registered, you may attach your students by logging in and clicking the "<b>Attach enrolled Student</b>" link. You will need to collect each student\'s PIN from the school office. <br/><br/>Remember this PIN is unique to you and the corresponding student, so make sure that you keep this PIN to yourself.<br/>
<br/>
Thank you again for signing up and we hope you enjoy using the Parent Portal <br/><br/>           
<b>Regards</b>,<br/>
            Amazing Grace International School (Do not reply)<br/>
            <a href = "http://www.uberit.org" target="_blank">ARSMaS</a>
            <br/><br/>';
        
        mail($email, "Parent signUp complete", $mailer);
        
        echo "Successfully registered..";
    } else {
        echo "This email may already have been registered.";
    }
}