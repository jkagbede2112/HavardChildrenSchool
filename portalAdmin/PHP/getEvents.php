<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';
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

$c = mysqli_query($w,"select * from schoolevents order by startDate asc");
while ($f = mysqli_fetch_array($c)) {
    $eventName = $f['eventName'];
    $eventDesc = $f['eventDescription'];
    $startDate = $f['startDate'];
    $endDate = $f['endDate'];
    $publish = $f['publish'];
    $sn = $f['SN'];
    
    if ($publish === "1"){
        $pubStat = "Published <span onclick='publishArticle($sn,\"up\")' style='font-weight:bold'>( unpublish )</span>";
    }else{
        $pubStat = "Unpublished <span onclick='publishArticle($sn, \"p\")' style='font-weight:bold'>( publish )</span>";
    }

    if ($endDate === "0000-00-00") {
        echo "<div class = \"eventContainer\" title='$eventDesc' id='$sn'><i class = \"fa fa-times deleteevent\" onclick=\"deleteevent('$sn')\" title = \"Delete event\"></i>
        <i class = \"fa fa-pencil-square-o updateevent\" onclick=\"updateevent('$sn)\" title = \"Modify event\"></i>
        <span class = \"datepassed\">".$pubStat."</span>
        <div class = \"eventslist\" id = \"ename\">".$eventName."</div>
        <div class = \"eventDate\" id = \"edate\">".parseDatek($startDate)."</div>
        </div>";
    } else {
        echo "<div class = \"eventContainer\" title='$eventDesc' id='$sn'><i class = \"fa fa-times deleteevent\" onclick=\"deleteevent('$sn')\" title = \"Delete event\"></i>
        <i class = \"fa fa-pencil-square-o updateevent\" onclick=\"updateevent('$sn')\" title = \"Modify event\"></i>
        <span class = \"datepassed\">".$pubStat."</span>
        <div class = \"eventslist\" id = \"ename\">".$eventName."</div>
        <div class = \"eventDate\" id = \"edate\">".parseDatek($startDate) . " - " . parseDatek($endDate)."</div>
        </div>";
    }
}