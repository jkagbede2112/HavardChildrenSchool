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
  $msge = "Dear Parent, <br><br> An account has just been created for you on the Havard Children School Portal. Your login details are as follows: <br><br> <b>Username : </b>$email<br><b>Password : </b>$password<br><br>Kindly keep these details for future use.<br><br>Visit http://www.havardcs.com/hcs/ and click Parent Login for log in access.<br><br>Thank you.<br>Management <br><br><br><b>To Check Results:</b><br>
a. Click Results on the left pane of the browser<br>
b. Click the class group of your child(ren) from to the top right corner of your browser<br>
c. select result type: midterm or full term (Only Applicable For Nur 2 - Grade 6 Results)<br>
d. select Class, Pupil's name, session and term<br>
e. Click get result.<br><br>
<b>For Receipts, Bills and Payment Timeline</b><br>
a. Click Receipts/Bills from the left pane of the browser<br>
b. Click Receipts (or Payment timeline)<br>
b. Select class, Name of pupil, session and term<br>
c. click get receipt (This will Show you the bill and receipt)<br><br>

<b>For Newsletter:</b><br>
a. Click Newsletter from the left pane<br>
b. Select the newsletter you wish to read from the list of newsletters.<br><br>
Kindly reply this mail for further inquiries. <br><br><I>
NB: You can print results and bills/Receipts on the platform.</I><br>";
sendemail($email, "Welcome to Havard Children School Portal",$msge);
}else{
	echo "Not saved";
}
}


function sendemail($email, $subject, $message) {
    $headers = 'MIME-Version: 1.0'."\r\n";
    //$headers .= 'Conten-type: text/htm; charset=iso-8859-1';
    $headers .= "Content-type: text/html\r\n";
    $headers .= 'From: havard1801@gmail.com'. "\r\n".
    'Reply-To: havard1801@gmail.com'."\r\n".
    'X-Mailer: PHP/'. phpversion();
    $ht = mail($email, $subject, $message, $headers);
    echo "Email sent";
    //echo "send email to $email with message $message";
}

if ($action === "update"){
  //pname:pname, religion:religion, action:action, occupation:occupation, offaddress:offaddress, phone:phonenumber, email:emailaddress, add:contactadd
  $parid = purify("updateid");
  $pname = purify("pname");
  $lname = purify("lname");
  $parentname = $lname . " " . $pname;
$religion = purify("religion");
$occupation = purify("occupation");
$office = purify("offaddress");
$phone = purify("phone");
$email = purify("email");
$address = purify("add");
$password = purify("password");

$hq = "update parentsregister set ParentSurname='$lname', ParentFirstname='$pname', ParentName='$parentname', Email='$email', Password='$password', phoneNumber='$phone', religion='$religion' where ParentID='$parid'";

$ja = mysqli_query($w,$hq);
if ($ja){
	echo "updated";
}else{
	//echo "Not saved";
}
}

