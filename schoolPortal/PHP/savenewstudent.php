<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$studentID = validate('studentID');
$surname = validate('surname');
$middlename = $_POST['middlename'];
$firstname = validate('firstname');
$ASclass = $_POST['ASclass'];
$prevschools = $_POST['prevschools'];
$bloodgrp = $_POST['bloodgrp'];
$genotype = $_POST['genotype'];
$homeadd = $_POST['homeadd'];
$lga = $_POST['lga'];
$nationality = $_POST['nationality'];
$religion = $_POST['religion'];
$healthstatus = $_POST['healths'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$soo = $_POST['soo'];
$homeaddy = $_POST['homeaddy'];
$session = $_POST['session'];

$in = "insert into schstudent (schoolid, Surname, Middlename, Firstname, dateofbirth, gender, ClassID, HomeAddress, lga, stateoforigin, Prevschools, Bloodgroup, Genotype, nationality, religion, healthstatus) values ('$studentID','$surname','$middlename','$firstname', '$dob','$gender','$ASclass', '$homeadd','$lga','$soo','$prevschools','$bloodgrp','$genotype','$nationality','$religion','$healthstatus')";
//echo $in;
$inn = mysqli_query($w,$in);
if ($inn) {
    echo "1";
    //Get current session info
    //$session = getsession();
    $paymentstructure = getpaymentstructure($ASclass);
    //Save to added infoplan
    $jq = "insert into studentclassinfo (studentschoolid, session, paymentstructureid, classid) values ('$studentID','$session','$paymentstructure','$ASclass')";

    $jx = mysqli_query($w,$jq);
    //First get current session
    //insert into studenttrack table
    //$j = "insert into schstdstrack (studentid, session, classid) values ('$studentID','','')"
    
} else {
    echo "Not saved";
}

function getsession(){
    return "2018/2019";
}

function getpaymentstructure($classid){
    global $w;
    $g = "select paymentcatid from schclass where SN='$classid'";
    $as = mysqli_query($w,$g);
    $s = mysqli_fetch_array($as);
    $paycat = $s['paymentcatid'];
    return $paycat;
}