<?php
include 'databaseSQLconnectn.php';

function purify($string){
$h = $_POST[$string];
return $h;
}

$action = $_POST["action"];
if ($action === "savenew"){
  //pname:pname, religion:religion, action:action, occupation:occupation, offaddress:offaddress, phone:phonenumber, email:emailaddress, add:contactadd
  $pname = purify("pname");
  $lname = purify("lname");
  $parentname = $lname . " " . $pname;
$religion = purify("religion");
$occupation = purify("occupation");
$office = purify("offaddress");
$phone = purify("phone");
$email = purify("email");
$address = purify("add");
$password = chr(rand(64,80)).chr(rand(64,80)).chr(rand(64,80)).chr(rand(64,80)).chr(rand(64,80)).chr(rand(64,80));

$hq = "insert into parentsregister (ParentSurname, ParentFirstname, ParentName, Email, Password, phoneNumber, religion, status, emailnotification, newslettersubscription, officeaddress, occupation) values ('$lname','$pname','$parentname','$email','$password','$phone','$religion','1','1','1','$office','$occupation')";
$ja = mysqli_query($w,$hq);
if ($ja){
	echo "Saved.. Parent will be mailed";
}else{
	echo "Not saved";
}
}
