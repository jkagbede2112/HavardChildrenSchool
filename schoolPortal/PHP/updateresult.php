<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

//action: action, classid: classid, score: score, result: resultshow, stdid: stdid, subjectid: subjectid, term: term, session: session
$action = validate("action");

if ($action === "SaveResult") {
    $classid = validate("classid");
    $score = validate("score");
    $result = validate("result");
    $stdid = validate("stdid");
    $subjectid = validate("subjectid");
    $term = validate("term");
    $session = validate("session");

    $h = "insert into playnurresult (studentid, term, session, classid, subjectid, firstsecondthirdexam, result, teacherid) values ('$stdid','$term','$session','$classid','$subjectid','','$score','')";

    $j = mysqli_query($w, $h);
    if ($j) {
        echo "Record saved";
    } else {
        //Attempt an update
        $vg = "update playnurresult set result='$score' where term ='$term' and session='$session' and subjectid='$subjectid' and studentid='$stdid'";
        echo $vg;
        $haq = mysqli_query($w, $vg);
        if ($haq) {
            echo $h;
        } else {
            echo "Not ";
        }
    }
}

if ($action === "SaveResultnurts") {
    $classid = validate("classid");
    $score = validate("score");
    $stdid = validate("stdid");
    $subjectid = validate("subjectid");
    $term = validate("term");
    $session = validate("session");
    $resulttype = validate("resulttype");
    //echo $score . " - your score - ";
    $h = "insert into playnurresult (studentid, term, session, classid, subjectid, firstsecondthirdexam, result, teacherid) values ('$stdid','$term','$session','$classid','$subjectid','$resulttype','$score','')";
echo $h;
    $j = mysqli_query($w, $h);
    if ($j) {
        echo "saved";
    } else {
        //Attempt an update
        $vg = "update playnurresult set result='$score' where term ='$term' and session='$session' and firstsecondthirdexam='$resulttype' and subjectid='$subjectid' and studentid='$stdid'";
        echo $vg;
        $haq = mysqli_query($w, $vg);
        if ($haq) {
            echo "updated";
        } else {
            echo "Not Saved/Updated";
        }
    }
}

if ($action === "grade") {
    $classid = validate("classid");
    $score = validate("score");
    $stdid = validate("stdid");
    $subjectid = validate("subjectid");
    $term = validate("term");
    $session = validate("session");
    $resulttype = validate("resulttype");
    //echo $score . " - your score - ";
    $h = "insert into playnurresult (studentid, term, session, classid, subjectid, firstsecondthirdexam, result, teacherid) values ('$stdid','$term','$session','$classid','$subjectid','$resulttype','$score','')";

    $j = mysqli_query($w, $h);
    if ($j) {
        echo "saved";
    } else {
        //Attempt an update
        $vg = "update playnurresult set result='$score' where term ='$term' and session='$session' and firstsecondthirdexam='$resulttype' and subjectid='$subjectid' and studentid='$stdid'";
        //echo $vg;
        $haq = mysqli_query($w, $vg);
        if ($haq) {
            echo $vg;
        } else {
            echo "Not ";
        }
    }
}