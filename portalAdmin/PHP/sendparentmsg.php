<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';
//recipient: recipient, msg: msg, msgtype: msgtype

$msgtype = $_POST['msgtype'];
//recipient: recipient, msgreci: msgreci, msg: msg, msgtype: msgtype
$msg = $_POST['msg'];
$msgreci = $_POST['msgreci'];

if ($msgtype === "parentpw") {
        $gt = "select * from parentsregister";
        $ht = mysqli_query($w, $gt);
        //$phonenumber = "";
        while ($bh = mysqli_fetch_array($ht)) {
            $phonenumber = $bh['PhoneNumber'];
$email = $bh['Email'];
$password = $bh['Password'];
$msg = "Dear parent, your Havard Children school portal login is $email and password is $password";
//echo $email;
sendsms($phonenumber, $msg);
        }   
}

if ($msgtype === "SMS") {
    if ($msgreci === "All") {
        $gt = "select * from parentsregister";
        $ht = mysqli_query($w, $gt);
        $phonenumber = "";
        while ($bh = mysqli_fetch_array($ht)) {
            $phonenumber .= $bh['phoneNumber'];
        }
        sendsms($phonenumber, $msg);
    } else {
        $gt = "select * from schstudent where ClassID='$msgreci'";
        $ht = mysqli_query($w, $gt);
        $phonenum = "";
        while ($bh = mysqli_fetch_array($ht)) {
            $hts = $bh['schoolid'];
            $parid = getparidfromlink($hts);
            $parphone = getparphone($parid);
            $phonenum .= $parphone . ",";
        }
        sendsms($phonenum, $msg);
    }
}
if ($msgtype === "E-mail") {
    if ($msgreci === "All") {
        $gt = "select * from parentsregister";
        $ht = mysqli_query($w, $gt);
        $email = "";
        $count = 0;
        while ($bh = mysqli_fetch_array($ht)) {
            $count++;
            $email .= $bh['Email'].",";
        }
        echo $count . " parents messaged.";
        sendemail($email,"Havard Children School", $msg);
    } else {
        $gt = "select * from schstudent where ClassID='$msgreci'";
        $ht = mysqli_query($w, $gt);
        if (mysqli_num_rows($ht)<1){
            echo "No parent found";
            return;
        }
        $email = "";
        while ($bh = mysqli_fetch_array($ht)) {
            $hts = $bh['schoolid'];
            $parid = getparidfromlink($hts);
            $paremail = getparemail($parid);
            if (!strlen($paremail)<4){
            $email .= $paremail . ",";
            }
        }
        echo $email;
        if (strlen($email)<5){
            echo "No parent found";
            return;
        }
        sendemail($email, "Havard Children School", $msg);
    }
}

function sendemail($email, $subject, $message) {
    $headers = 'MIME-Version: 1.0'."\r\n";
    $headers .= 'Conten-type: text/htm; charset=iso-8859-1';
    $headers .= 'From: havard1801@gmail.com'. "\r\n".
    'Reply-To: havard1801@gmail.com'."\r\n".
    'X-Mailer: PHP/'. phpversion();
    $ht = mail($email, $subject, $message, $headers);
    echo "Email sent";
    //echo "send email to $email with message $message";
}

function sendsms($phonenumber,$message) {
   // $to = urlencode($to);
    $sender = urlencode("HavardCS");
    $mess = urlencode($message);
    $username = urlencode("havard1801@gmail.com");
    $password = urlencode("abrakadabra1");
    $phone = urlencode($phonenumber);

    $ch = file_get_contents("http://portal.bulksmsnigeria.net/api/?username=$username&password=$password&message=$mess&sender=$sender&mobiles=$phone");
/*
    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
    */
}

