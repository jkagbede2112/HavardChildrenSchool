<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';
//recipient: recipient, msg: msg, msgtype: msgtype

$msgtype = $_POST['msgtype'];
//recipient: recipient, msgreci: msgreci, msg: msg, msgtype: msgtype
$msg = $_POST['msg'];
$msgreci = $_POST['msgreci'];

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
        while ($bh = mysqli_fetch_array($ht)) {
            $email .= $bh['Email'];
        }
        sendemail($email, $msg);
    } else {
        $gt = "select * from schstudent where ClassID='$msgreci'";
        $ht = mysqli_query($w, $gt);
        $email = "";
        while ($bh = mysqli_fetch_array($ht)) {
            $hts = $bh['schoolid'];
            $parid = getparidfromlink($hts);
            $paremail = getparemail($parid);
            $email .= $paremail . ",";
        }
        sendemail($email, $msg);
    }
}

function sendemail($email, $message) {
    echo "send email to $email with message $message";
}

function sendsms($phonenumber,$message) {
   // $to = urlencode($to);
    $sender = urlencode("HavardCS");
    $mess = urlencode($message);
    $username = urlencode("havard1801@gmail.com");
    $password = urlencode("abrakadabra1");
    $phone = urlencode($phonenumber);

    $ch = curl_init("http://portal.bulksmsnigeria.net/api/?username=$username&password=$password&message=$mess&sender=$sender&mobiles=$phone");

    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
    
}

