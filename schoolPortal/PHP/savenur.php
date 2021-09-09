<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';
session_start();
$teacherID = $_SESSION['TeacherID'];

$action = validate("action");

if ($action === "playgroup") {
    //stdid: resStdname, term: term, session: session, classid: classid, subjectid: subjectid, result: playgres
    $studentid = validate("stdid");
    $term = validate("term");
    $session = validate("session");
    $classid = validate("classid");
    $subjectid = validate("subjectid");
    $result = validate("result");

    $a = "insert into playnurresult (studentid, term, session, classid, subjectid, result, teacherid) values ('$studentid','$term','$session','$classid','$subjectid','$result','$teacherID')";

    $z = mysqli_query($w, $a);
    if ($z) {
        echo "Saved";
    } else {
        $h = "update playnurresult set result='$result' where studentid='$studentid'";
        $b = mysqli_query($w, $h);
        if ($b) {
            echo "Result updated";
        } else {
            echo "Not saved";
        }
        //echo "Not saved";
    }
}

if ($action === "Nursery2") {
    //action:action, rescat:rescat, stdid: resStdname, term: term, session: session, 
    //classid: classid, subjectid: subjectid, result: playgres
    $resultcategory = validate("rescat");
    $stdid = validate("stdid");
    $term = validate("term");
    $session = validate("session");
    $classid = validate("classid");
    $subjectid = validate("subjectid");
    $result = validate("result");
    $z = "insert into playnurresult (studentid, term, session, classid, subjectid, firstsecondthirdexam, result, teacherid) values ('$stdid','$term','$session','$classid','$subjectid','$resultcategory','$result','$teacherID')";
    $h = mysqli_query($w, $z);
    if ($h) {
        echo "Saved";
    } else {
        //Attempt to update result
        $h = "update playnurresult set result='$result' where studentid='$stdid', term='$term', session='$session', subjectid='$subjectid'";
        $d = mysqli_query($w,$h);
        if ($d){
            echo "Result updated";
        }else{
            echo "Not saved";
        }
        //echo "Not saved";
    }
}

