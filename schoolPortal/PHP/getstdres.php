<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

//stdclass:stdclass, stdterm:stdterm, stdsession:stdsession

$stdclass = validate("stdclass");
$stdterm = validate("stdterm");
$stdsession = validate("stdsession");

if ($stdclass === 3){
    //This checks students class. If 3 (Playgroup) or.. it pulls from playnurresult table
    $l = "select * from playnurresult where classid='$stdclass' and term='$stdterm' and session='$stdsession'";
    $j = mysqli_query($w,$l);
    $disp = "<tr style='font-weight:bold'><td></td><td>Name</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td></tr>";
    $count = 1;
    while ($sd = mysqli_fetch_array($j)){
        $studentid = $sd['studentid'];
        $term = $sd['term'];
        $subjectid = $sd['subjectid'];
        $result = $sd['result'];
        $studentname = getstudentname($studentid);
        $subject = getsubjectname($subjectid);
        $disp .= "<tr><td>$count</td><td>$studentname</td><td>$term</td><td>$term</td><td>$term</td></tr>";
        $count++;
    }
    echo $disp;
}

