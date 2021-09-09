<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

$action = validate("action");

if ($action === "teacherscomment") {
    //teacherid:a, session:b, term:c, studentid:d, comment:e
    $teacherid = validate("teacherid");
    $session = validate("session");
    $term = validate("term");
    $studentid = validate("studentid");
    $comment = validate("comment");
    $resulttype = validate("resulttype");

    $j = "insert into teacherscomment (teacherid, resulttype, session, term, studentid, comment) values ('$teacherid','$resulttype','$session','$term','$studentid','$comment')";
    $h = mysqli_query($w, $j);
    if ($h) {
        echo "Saved";
    } else {
        $h = "update teacherscomment set comment='$comment' where resulttype='$resulttype' and session='$session' and term='$term' and studentid='$studentid'";
        //echo $h;
        $cv = mysqli_query($w, $h);
        if ($cv) {
            echo "Updated";
        } else {
            echo "Cannot update";
        }
    }
}

if ($action === "proprietresscomment") {
    //teacherid:a, session:b, term:c, studentid:d, comment:e
    $session = validate("session");
    $term = validate("term");
    $studentid = validate("studentid");
    $comment = validate("comment");

    $j = "insert into proprietresscomment (session, term, stdid, comment) values ('$session','$term','$studentid','$comment')";
    $h = mysqli_query($w, $j);
    if ($h) {
        echo "Saved";
    } else {
        $h = "update proprietresscomment set comment='$comment' where session='$session' and term='$term' and stdid='$studentid'";
        //echo $h;
        $cv = mysqli_query($w, $h);
        if ($cv) {
            echo "Updated";
        } else {
            echo "Cannot update";
        }
    }
}