<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

$action = $_POST['action'];

if ($action === "addmedal") {
    //action:action,session:session, term:term, stdid:stdid, medal:medal
    $session = $_POST['session'];
    $term = $_POST['term'];
    $stdid = $_POST['stdid'];
    $medal = $_POST['medal'];
    $ju = "insert into classmedal (session, term, studentid, medal) values ('$session','$term','$stdid','$medal')";
    $qj = mysqli_query($w, $ju);
    if ($qj) {
        echo "Medal done";
    } else {
        $ha = "update classmedal set medal='$medal' where session='$session' and term='$term' and studentid='$stdid'";
        $ht = mysqli_query($w, $ha);
        if ($ht) {
            echo "class medal updated";
        }
    }
}

if ($action === "addproprietress") {
    $session = $_POST['session'];
    $term = $_POST['term'];
    $stdid = $_POST['stdid'];
    $comment = $_POST['comment'];
    //action:action,session:session, term:term, stdid:stdid, comment:comment
    $ju = "insert into proprietresscomment (session, term, stdid, comment) values ('$session','$term','$stdid','$comment')";
    $qj = mysqli_query($w, $ju);
    if ($qj) {
        echo "Proprietress added";
    } else {
        $ha = "update proprietresscomment set comment='$comment' where session='$session' and term='$term' and stdid='$stdid'";
        echo $ha;
        $ht = mysqli_query($w, $ha);
        if ($ht) {
            echo "Proprietress comment updated";
        }
    }
}

if ($action === "addothercomment") {
    $session = $_POST['session'];
    $term = $_POST['term'];
    $stdid = $_POST['stdid'];
    $comment = $_POST['comment'];
    //action:action,session:session, term:term, stdid:stdid, comment:comment
    $ju = "insert into othercomment (session, term, stdid, comment) values ('$session','$term','$stdid','$comment')";
    $qj = mysqli_query($w, $ju);
    if ($qj) {
        echo "Other comment done";
    } else {
        $ha = "update othercomment set comment='$comment' where session='$session' and term='$term' and stdid='$stdid'";
        $ht = mysqli_query($w, $ha);
        if ($ht) {
            echo "Other comment updated";
        }
    }
}