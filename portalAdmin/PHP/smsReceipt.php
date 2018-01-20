<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$stdid = $_POST['stdid'];
$msge = $_POST['msge'];

$j = mysqli_query($w,"select * from linkages where StudentID='$stdid'");
while ($a = mysqli_fetch_array($j)) {
//$a = mysql_fetch_array($j);
    $p = $a['ParentID'];

    $ag = mysqli_query($w,"select * from parentsregister where parentid='$p'");
    $d = mysqli_fetch_array($ag);
    $phoneNu = $d['phoneNumber'];

    sendsms($phoneNu, $msge);

//echo $phoneNu;
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

    var_dump($response);
}
