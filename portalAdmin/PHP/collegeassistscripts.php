<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include 'validateinput.php';
include 'databaseSQLconnectn.php';
session_start();
$teacherid = $_SESSION['TeacherID'];

$action = $_POST['action'];

/*
 * 
  var action = 'updatesubjectoffered';
  $.post("PHP/collegeassistscript.php", {action: action, classid: classid, subjectid: subjid, stdid: stdid, session: session, offervalue:thisvalue
 */

if ($action === "updatesubjectoffered") {
    //classid: classid, subjectid: subjid, stdid: stdid, session: session, offervalue:thisvalue
    $classid = validate("classid");
    $subjectid = validate("subjectid");
    $stdid = validate("stdid");
    $session = validate("session");
    $value = validate("offervalue");

    if ($value === "0") {
        //Reset tests and exam scores.
        $cx = "update playnurresult set result='0' where studentid='$stdid' and session='$session' and subjectid='$subjectid'";
        $dx = mysqli_query($w, $cx);
        if ($dx) {
            echo "Updated";
        } else {
            echo "Not updated";
        }
    } else {
        echo "Student offering course";
    }

    $a = "insert into subjectexceptions (stdid, subjectid, classid, session, notoffered) values ('$stdid','$subjectid','$classid','$session','$value')";
    $b = mysqli_query($w, $a);
    if ($b) {
        echo "Saved";
    } else {
        $c = "update subjectexceptions set notoffered='$value' where stdid='$stdid' and subjectid='$subjectid' and classid='$classid' and session='$session'";
        $d = mysqli_query($w, $c);
        if ($d) {
            echo "Updated";
        } else {
            echo "Not updated";
        }
    }
}

if ($action === "loadassigned") {
    $classid = validate("classid");
    $TID = $_SESSION['TeacherID'];

    $a = "select * from subjects where SubjectCategoryid='$classid' and TeacherID='$TID'";
    $b = mysqli_query($w, $a);
    while ($c = mysqli_fetch_array($b)) {
        $sn = $c['sn'];
        $subject = $c['SubjectName'];
        echo "<option value='$sn'>$subject</option>";
    }
}

if ($action === "saveresult") {
    //subjectid:subjectid, classid: classid, session:session, term:term, stdid:stdid, score:score, cattype:cattype, teacherid:teacherid
    $subjectid = validate("subjectid");
    $classid = validate("classid");
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("stdid");
    $score = validate("score");
    $cattype = validate("cattype");
    $teacherid = validate("teacherid");

    $a = "insert into playnurresult (studentid, term, session, classid, subjectid, firstsecondthirdexam, result, teacherid) values ('$stdid','$term','$session','$classid','$subjectid','$cattype','$score','$teacherid')";
    $b = mysqli_query($w, $a);
    if ($b) {
        echo "Saved";
    } else {
        $c = "update playnurresult set result='$score' where studentid='$stdid' and term='$term' and session='$session' and subjectid='$subjectid' and firstsecondthirdexam='$cattype'";
        $d = mysqli_query($w, $c);
        if ($d) {
            echo "Updated";
        } else {
            echo "Not updated";
        }
    }
    
        //Update exceptions with values
        $value = '1';
        $ad = "insert into subjectexceptions (stdid, subjectid, classid, session, notoffered) values ('$stdid','$subjectid','$classid','$session','$value')";
    $bd = mysqli_query($w, $ad);
    if ($bd) {
        echo "Exception removed";
    } else {
        $cd = "update subjectexceptions set notoffered='$value' where stdid='$stdid' and subjectid='$subjectid' and classid='$classid' and session='$session'";
        $dd = mysqli_query($w, $cd);
        if ($dd) {
            echo "Ish";
        } else {
            echo "No ish";
        }
    }
    //End Update exceptions
}

function getstudentswithsubjectsft($subjectid, $classid, $session, $catype, $term, $teacherid) {

    global $w;
    $a = "select * from schstudent where ClassID='$classid'";
    //return "Yes"; saveresultnurt
    //$subject,$classid,$session, $subjectrestype, $term
    $b = mysqli_query($w, $a);
    $tab = "<table class='table table-striped' style='font-size:13px; margin-top:20px'><tr style='font-size:20px; font-weight:600' ><td></td><td>Name</td><td>CA (40)</td><td>Examination (60)</td><td>Total</td><td></td></tr>";
    $count = 0;
    while ($c = mysqli_fetch_array($b)) {
        ++$count;
        $stdid = $c['schoolid'];
        $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subjectid);
        $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subjectid);
        $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subjectid);
        $exam = getresultg($classid, $session, $term, 'exam', $stdid, $subjectid);
        $total = $firstca + $secondca + $thirdca;
        $totalwexam = $total + $exam;
        $stdname = $c['Surname'] . " " . $c['Middlename'] . " " . $c['Firstname'];
        $tab .= "<tr><td>$count</td><td>$stdname</td><td>$total</td><td><input type='text' value='$exam' size='10' onblur=\"savecollegeresult('$subjectid','$classid','$session','$term','$stdid',this.value,'exam','$teacherid','60')\"></td><td>$totalwexam</td><td><select style='padding:3px' onchange=\"updateofferedstat('$stdid', '$subjectid', '$classid', '$session',this.value)\"><option>--select--</option><option value='0' >Not Offered</option><option value='1' selected>Offered</option></select></td></tr>";
    }
    $tab .= "</table>";
    return $tab;
}

function getresultg($classid, $session, $term, $reslttype, $stdid, $subid) {
    global $w;
    $h = "select result from playnurresult where classid='$classid' and session='$session' and term='$term' and firstsecondthirdexam='$reslttype' and studentid ='$stdid' and subjectid='$subid' order by dateadded desc";
    $g = mysqli_query($w, $h);
    $xs = mysqli_fetch_array($g);
    $result = $xs['result'];
    if (strlen($result) < 1) {
        $result = 0;
    }
    return $result;
}

function getstudentswithsubjectsmt($subjectid, $classid, $session, $catype, $term, $teacherid) {
    global $w;
    $a = "select * from schstudent where ClassID='$classid'";
    //return "Yes"; saveresultnurt
    //$subject,$classid,$session, $subjectrestype, $term
    $b = mysqli_query($w, $a);
    $tab = "<table class='table table-striped' style='font-size:13px; margin-top:20px'><tr style='font-size:20px; font-weight:600' ><td></td><td>Name</td><td>1st CA (10)</td><td>2nd CA (20)</td><td>3rd CA (10)</td><td></td></tr>";
    $count = 0;
    while ($c = mysqli_fetch_array($b)) {
        ++$count;
        $stdid = $c['schoolid'];
        $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subjectid);
        $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subjectid);
        $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subjectid);
        $total = $firstca + $secondca + $thirdca;
        $offerstatus = "1";
        $offerstatus = getexceptiond($classid, $session, $subjectid, $stdid);
        echo $offerstatus;
        $stdname = $c['Surname'] . " " . $c['Middlename'] . " " . $c['Firstname'];
        if ($offerstatus === '1') {
            $tab .= "<tr><td>$count</td><td>$stdname</td><td><input type='text' size='5' value='$firstca' onblur=\"savecollegeresult('$subjectid','$classid','$session','$term','$stdid',this.value,'first','$teacherid', '10')\"></td><td><input type='text' size='5' value='$secondca' onblur=\"savecollegeresult('$subjectid','$classid','$session','$term','$stdid',this.value,'second','$teacherid','20')\"></td><td><input type='text' size='5' value='$thirdca' onblur=\"savecollegeresult('$subjectid','$classid','$session','$term','$stdid',this.value,'third','$teacherid','10')\"></td><td><select style='padding:3px' onchange=\"updateofferedstat('$stdid', '$subjectid', '$classid', '$session',this.value)\"><option>--select--</option><option value='0' >Not Offered</option><option value='1' selected>Offered</option></select></td></tr>";
        } else if ($offerstatus === '0') {
            $tab .= "<tr style='background-color:rgba(255,0,0,0.2)'><td>$count</td><td>$stdname</td><td><input type='text' size='5' value='$firstca' onblur=\"savecollegeresult('$subjectid','$classid','$session','$term','$stdid',this.value,'first','$teacherid', '10')\"></td><td><input type='text' size='5' value='$secondca' onblur=\"savecollegeresult('$subjectid','$classid','$session','$term','$stdid',this.value,'second','$teacherid','20')\"></td><td><input type='text' size='5' value='$thirdca' onblur=\"savecollegeresult('$subjectid','$classid','$session','$term','$stdid',this.value,'third','$teacherid','10')\"></td><td><select style='padding:3px' onchange=\"updateofferedstat('$stdid', '$subjectid', '$classid', '$session',this.value)\"><option>--select--</option><option value='0' selected>Not Offered</option><option value='1'>Offered</option></select></td></tr>";
        } else {
            $tab .= "<tr><td>$count</td><td>$stdname</td><td><input type='text' size='5' value='$firstca' onblur=\"savecollegeresult('$subjectid','$classid','$session','$term','$stdid',this.value,'first','$teacherid', '10')\"></td><td><input type='text' size='5' value='$secondca' onblur=\"savecollegeresult('$subjectid','$classid','$session','$term','$stdid',this.value,'second','$teacherid','20')\"></td><td><input type='text' size='5' value='$thirdca' onblur=\"savecollegeresult('$subjectid','$classid','$session','$term','$stdid',this.value,'third','$teacherid','10')\"></td><td><select style='padding:3px' onchange=\"updateofferedstat('$stdid', '$subjectid', '$classid', '$session',this.value)\"><option>--select--</option><option value='0'>Not Offered</option><option value='1'>Offered</option></select></td></tr>";
        }
    }
    $tab .= "</table>";
    return $tab;
}

function getexceptiond($classid, $session, $subjectid, $stdid) {
    global $w;
    $a = "select notoffered from subjectexceptions where stdid='$stdid' and subjectid='$subjectid' and classid='$classid'and session='$session'";
    //return $a ."<br><br>";
    $b = mysqli_query($w, $a);
    $c = mysqli_fetch_array($b);
    $offstatus = $c['notoffered'];
    return $offstatus;
}

function getclassnames($classid) {
    global $w;
    $a = "select * from schclass where SN='$classid'";
    $b = mysqli_query($w, $a);
    $c = mysqli_fetch_array($b);
    $classname = $c['ClassName'];
    return $classname;
}

if ($action === "loadstudentspersubject") {
    $classid = validate("classid");
    $classname = getclassnames($classid);
    $subject = validate("subject");
    $session = validate("session");
    $term = validate("term");
    $subjectrestype = validate("subjectrestype");

    echo "$classname - $subject <br> $session $term";
    //Get all students in class
    if ($subjectrestype === "Mid-term") {
        $students = getstudentswithsubjectsmt($subject, $classid, $session, $subjectrestype, $term, $teacherid);
        echo $students;
    }

    if ($subjectrestype === "Full-term") {
        //echo "Full term trigger";
        $students = getstudentswithsubjectsft($subject, $classid, $session, $subjectrestype, $term);
        echo $students;
    }
    //classid: assclass, subject:asssubject, session:asssession, term:assterm
} 