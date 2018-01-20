<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';
error_reporting(0);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function parseDatek($val) {
    //$q = $val.substr(0,3);
    $yr = substr($val, 0, 4);
    $mt = substr($val, 5, 2);
    $dy = substr($val, 8, 2);
    $wday = ordinalNumber($dy, intval($mt));
    return $wday . $yr;
}

function ordinalNumber($dy, $mth) {
    $a = ["th", "st", "nd", "rd", "th", "th", "th", "th", "th", "th"];
    $qq = ["-", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    $c = $dy % 10;
    $q = $a[$c];
    $mt = $qq[$mth];
    if ($c === "9") {
        return "9th of " . $mt;
    } else {
        return $dy . $q . " of " . $mt . " ";
    }
}

$c = mysqli_query($w,"select * from schoolevents where publish ='1' order by startDate asc");
while ($f = mysqli_fetch_array($c)) {
    $eventName = $f['eventName'];
    $eventDesc = $f['eventDescription'];
    $startDate = $f['startDate'];
    $endDate = $f['endDate'];
    $publish = $f['publish'];
    $sn = $f['SN'];
    $pubStat = "";

    //echo strtotime($startDate) ." < " .strtotime(date('y-m-d')) . "<br/><br/>";

    if ($endDate . length > 4) {
        if (strtotime($endDate) < strtotime(date('y-m-d'))) {
            if ($publish === "1") {
                $pubStat = "<span style='color:#666666'>Expired</span>";
            } else {
                $pubStat = "<span style='color:#666666'>( Date is in the past )</span>";
            }
        }
    } else {
        if (strtotime($startDate) < strtotime(date('y-m-d'))) {
            if ($publish === "1") {
                $pubStat = "<span style='color:#666666'>Expired</span>";
            } else {
                $pubStat = "<span style='color:#666666'>( Event date is in the past )</span>";
            }
        }
    }



    if ($endDate === "0000-00-00") {
        echo "<div class = \"eventContainer\" title='$eventDesc' id='$sn'>
        <span class = \"datepassed\">" . $pubStat . "</span>
        <div class = \"eventslist\" id = \"ename\">" . $eventName . "</div>
        <div class = \"eventDate\" id = \"edate\">" . parseDatek($startDate) . "</div>
        </div>";
    } else {
        echo "<div class = \"eventContainer\" title='$eventDesc' id='$sn'>
        <span class = \"datepassed\">" . $pubStat . "</span>
        <div class = \"eventslist\" id = \"ename\">" . $eventName . "</div>
        <div class = \"eventDate\" id = \"edate\">" . parseDatek($startDate) . " - " . parseDatek($endDate) . "</div>
        </div>";
    }
}