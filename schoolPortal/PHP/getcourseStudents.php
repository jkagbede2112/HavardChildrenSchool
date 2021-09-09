<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$whic = $_POST['whicGV'];

if ($whic === "1") {
    $subjectComponent = $_POST['subjectComponent'];
    session_start();
    $currterm = $_SESSION['Curr_Term'];
    $currsession = $_SESSION['Curr_Session'];
    $gd = split("-", $_POST['classSubject']);
    $a = mysqli_query($w,"select Compulsory, SubjectID from subjects where SubjectCategory='$gd[0]'");
    $q = mysqli_fetch_array($a);
    $subjectID = $q['SubjectID'];
    $_SESSION['subjectGrade'] = $subjectID;

    $stat = $q['Compulsory'];
    if ($stat === "Mandatory") {
        $h = mysqli_query($w,"select * from schstudent where ClassID='$gd[0]' order by Surname");
        $count = 1;
        while ($x = mysqli_fetch_array($h)) {
            $stuID = $x['StudentID'];
            $subjectID = $_POST['subjectsn'];
            $jgjg = "select * from grades where StudentID='$stuID' and SubjectID='$subjectID' and Term='$currterm' and Session='$currsession'";
            //echo $jgjg;

            $jh = mysqli_query($w,$jgjg);
            $hadv = mysqli_fetch_array($jh);

            $fT = $hadv['FirstTest'];
            if ($fT < 10 && $fT > 0) {
                $fT = "<span style='color:#ff0000'>0" . $fT . "</span>";
            } elseif ($fT === "0") {
                $fT = "<span style='color:#ff0000'>" . $fT . "</span>";
            }

            $sT = $hadv['SecondTest'];
            if ($sT < 10 && $fT > 0) {
                $sT = "<span style='color:#ff0000'>0" . $sT . "</span>";
            } elseif ($sT === "0") {
                $sT = "<span style='color:#ff0000'>" . $sT . "</span>";
            }

            $ex = $hadv['Exam'];
            if ($ex < 30) {
                $ex = "<span style='color:#ff0000'>" . $ex . "</span>";
            }

            $ce = $hadv['ClassExercise'];
            $ass = $hadv['Assignment'];
            $quiz = $hadv['Quiz'];
            $project = $hadv['Project'];

            echo "<tr><td>" . $count . "</td><td><b>" . strtoupper($x['Surname']) . "</b> " . $x['Firstname'] . "</td><td>" . $ce . "</td><td>" . $ass . "</td><td>" . $quiz . "</td><td>" . $fT . "</td><td>" . $sT . "</td><td>" . $project . "</td><td>" . $ex . "</td></tr>";
            $count++;
        }
    }
} elseif ($whic === "2") {
    //post back studentIDs
    $gd = split("-", $_POST['classSubject']);
    $a = mysqli_query($w,"select Compulsory, SubjectID from subjects where SubjectCategory='$gd[0]' and SubjectName='$gd[1]'");
    $q = mysqli_fetch_array($a);
    $subjectID = $q['SubjectID'];
    $_SESSION['subjectGrade'] = $subjectID;

    $stat = $q['Compulsory'];
    if ($stat === "Mandatory") {
        $h = mysqli_query($w,"select * from studentinfo where ClassID='$gd[0]' order by Surname");
        while ($x = mysqli_fetch_array($h)) {
            $stuID = $x['StudentID'];
            echo "<option>" . $stuID . "</option>";
            //echo "<tr><td>" . strtoupper($x['Surname']) . " " . $x['Firstname'] . "</td><td>" . $fT . "</td><td>" . $sT . "</td><td>" . $ex . "</td></tr>";
        }
    }
} elseif ($whic === "3") {
    //post back studentNamess
    $gd = split("-", $_POST['classSubject']);
    $a = mysqli_query($w,"select Compulsory, SubjectID from subjects where SubjectCategory='$gd[0]' and SubjectName='$gd[1]'");
    $q = mysqli_fetch_array($a);
    $subjectID = $q['SubjectID'];

    $_SESSION['subjectGrade'] = $subjectID;

    $stat = $q['Compulsory'];
    if ($stat === "Mandatory") {
        $h = mysqli_query($w,"select * from studentinfo where ClassID='$gd[0]' order by Surname");
        while ($x = mysqli_fetch_array($h)) {
            $stuSurname = $x['Surname'];
            $stuFirstname = $x['Firstname'];
            echo "<option>" . $stuSurname . " " . $stuFirstname . "</option>";
            //echo "<tr><td>" . strtoupper($x['Surname']) . " " . $x['Firstname'] . "</td><td>" . $fT . "</td><td>" . $sT . "</td><td>" . $ex . "</td></tr>";
        }
    }
}

