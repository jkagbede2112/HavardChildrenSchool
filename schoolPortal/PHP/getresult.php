<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

$action = validate("action");
if ($action === "bysubject") {
    //action:action, classid: classid, subjectid: subject, term: term, session: session
    $classid = validate("classid");
    $subjectid = validate("subjectid");
    $session = validate("session");
    $term = validate("term");
    $subjectname = strtoupper(getsubjectname($subjectid));

    $currentsessionterm = "<span>$session $term</span>";
    $j = "select * from studentclassinfo where classid='$classid' and session='$session'";
    $n = mysqli_query($w, $j);
    if (mysqli_num_rows($n)<1){
        echo "<div style='text-align:right; font-family:verdana'>$session - $term</div>$subjectname<table class='table table-condensed table-bordered table-stripped' style='font-size:13px; font-family:verdana'><tr style='font-weight:600; background-color:#ccc'><td></td><td>Name</td><td>First Term</td><td>Second Term</td><td>Third Term</td></tr><tr><td colspan='5' style='text-align:center'>No records for the selected parameters</td></tr></table>";
        return;
    }
    $tab = "<span style='font-family:verdana'><div style='text-align:right'>$session - $term</div>$subjectname</span><table class='table table-condensed table-bordered table-stripped' style='font-size:13px; font-family:verdana'><tr style='font-weight:600; background-color:#ccc'><td></td><td>Name</td><td>First Term</td><td>Second Term</td><td>Third Term</td></tr>";
    $count = 1;
    while ($b = mysqli_fetch_array($n)) {
        $studentid = $b['studentschoolid'];
        $studentname = getstudentname($studentid);
        $tablename = "playnurresult";
        //Get first,second,third term result for subjectid in resulttable
        $ftr = getresultterm($studentid, "1st Term", $session, $subjectid, $tablename);
        $str = getresultterm($studentid, "2nd Term", $session, $subjectid, $tablename);
        $ttr = getresultterm($studentid, "3rd Term", $session, $subjectid, $tablename);
        $tab .= "<tr><td>$count</td><td>$studentname</td><td>$ftr</td><td>$str</td><td>$ttr</td></tr>";
        $count++;
    }
    echo $tab . "<tr></table>";
    //echo "we are searching results by subjects";
}

function getresultterm($stdid,$term,$session,$subjectid, $tablename){
    global $w;
    $a = "select result from $tablename where studentid='$stdid' and term='$term' and session='$session' and subjectid='$subjectid'";
    $j = mysqli_query($w,$a);
    $h = mysqli_fetch_array($j);
    $result = $h['result'];
    return $result;
}