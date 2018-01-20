<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$to = $_POST['to'];
$cMsge = stripslashes($_POST['cMsge']);
$whattosh = $_POST['wtd'];

if ($whattosh === "1") {
    sendsms($to, $cMsge);
} elseif ($whattosh === "2") {
    getleftUnits();
}

function sendsms($to, $message) {
    $to = urlencode($to);
    $sender = "AmazngGrace";
    $message = urlencode(strip_tags("$message"));
    $from = urlencode("$sender");
    $api_username = urlencode("jkagbede@gmail.com");
    $apikey = "5bb956b300677d8dfc12bf741547c5c1cddb3418";

    $ch = curl_init("http://api.ebulksms.com:8080/sendsms?username=$api_username&apikey=$apikey&sender=$sender&messagetext=$message&flash=0&recipients=$to");
    //echo $hiiii;
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
}

function getleftUnits() {
    $ch = curl_init("http://api.ebulksms.com/balance/jkagbede@gmail.com/5bb956b300677d8dfc12bf741547c5c1cddb3418");
    $response = curl_exec($ch);
    curl_close($ch);

    var_dump($response);
}
