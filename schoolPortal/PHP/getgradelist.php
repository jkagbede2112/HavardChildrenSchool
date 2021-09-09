<?php

include 'databaseSQLconnectn.php';

session_start();
$subjectSN = $_POST['subjectSN'];
$currterm = $_SESSION['Curr_Term'];
$currsession = $_SESSION['Curr_Session'];
$gd = split("-", $_POST['classSubject']);

$a = mysqli_query($w,"select SubjectID from subjects where SubjectCategory='$gd[0]' and SubjectName='$gd[1]'");
$q = mysqli_fetch_array($a);
$subjectID = $q['SubjectID'];
$terms = ["First Term", "Second Term", "Third Term"];

$sss = "select StudentID, Surname, Firstname from schstudent where ClassID = '$gd[0]' order by Surname";
$adf = mysqli_query($w,$sss);
$studentID = "";
$fa = "";
error_reporting(0);
$c = 0;
while ($fa = mysqli_fetch_array($adf)) {
    $content = "";
    $studentID = $fa['StudentID'];
    $studentName = $fa['Surname'] . " " . $fa['Firstname'];
    $idCE = "agGrCE" . $c;
    $idA = "agGrAs" . $c;
    $idQ = "agGrQu" . $c;
    $idCA1 = "agGrC1" . $c;
    $idCA2 = "agGrC2" . $c;
    $idP = "agGrPr" . $c;
    $idTE = "agGrTE" . $c;
    $idTT = "agGrTT" . $c;
    $idAS = "agGRAS" . $c;
    $idAG = "" . $c;

    echo "<tr><td><b>" . $studentName . "</b></td>"
    . "<td><input type='text' size=3 maxlength=3 id='$idCE' value='" . getStudentScores('ClassExercise', $studentID, $subjectSN, $currterm, $currsession) . "' class='form-control' onchange=\"putScore('$subjectSN','$idCE','$studentID', this.value)\"></td>"
    . "<td><input type='text' size=3 maxlength=3 id='$idA' value='" . getStudentScores('Assignment', $studentID, $subjectSN, $currterm, $currsession) . "' class='form-control' onchange=\"putScore('$subjectSN','$idA','$studentID',this.value)\"></td>"
    . "<td><input type='text' size=3 maxlength=3 id='$idQ' value='" . getStudentScores('Quiz', $studentID, $subjectSN, $currterm, $currsession) . "' class='form-control' onchange=\"putScore('$subjectSN','$idQ','$studentID',this.value)\"></td>"
    . "<td><input type='text' size=3 maxlength=3 id='$idCA1' value='" . getStudentScores('FirstTest', $studentID, $subjectSN, $currterm, $currsession) . "' class='form-control' onchange=\"putScore('$subjectSN','$idCA1','$studentID',this.value)\"></td>"
    . "<td><input type='text' size=3 maxlength=3 id='$idCA2' value='" . getStudentScores('SecondTest', $studentID, $subjectSN, $currterm, $currsession) . "' class='form-control' onchange=\"putScore('$subjectSN','$idCA2','$studentID',this.value)\"></td>"
    . "<td><input type='text' size=3 maxlength=3 id='$idP' value='" . getStudentScores('Project', $studentID, $subjectSN, $currterm, $currsession) . "' class='form-control' onchange=\"putScore('$subjectSN','$idP','$studentID',this.value)\"></td>"
    . "<td><input type='text' size=3 maxlength=3 id='$idTE' value='" . getStudentScores('Exam', $studentID, $subjectSN, $currterm, $currsession) . "' class='form-control' onchange=\"putScore('$subjectSN','$idTE','$studentID',this.value)\"></td>"
    . "<td><input type='text' size=3 maxlength=3 id='$idTT' value='" . getStudentScores('totalscore', $studentID, $subjectSN, $currterm, $currsession) . "' class='form-control' onchange=\"putScore('$subjectSN','$idTT','$studentID',this.value)\"></td>"
    . "<td id='$idAS'>ACAS</td>"
    . "<td>A</td>"
    . "</tr>";
    //echo $studentName;
    /*
      $af = "";
      while ($c < sizeof($terms)) {
      $term = $terms[$c];
      $hf = "select FirstTest, SecondTest, Exam from grades where term='$term' and session='$currsession' and subjectID='$subjectID' and StudentID='$studentID'";

      $a = mysql_query($hf);
      $adv = mysql_fetch_array($a);
      $firstT = $adv['FirstTest'];
      $secondT = $adv['SecondTest'];
      $exam = $adv['Exam'];
      if (!$firstT && !$secondT && !$exam) {
      $sumTotal = "-";
      $grade = "-";
      } else {
      $sumTotal = $firstT + $secondT + $exam;
      $grade = getGrade($sumTotal);
      if ($sumTotal < 50 ){
      $sumTotal = "<span style='color:#ff0000'>".$sumTotal."</span>";
      }
      }

      if ($firstT === 0) {
      $firstT = "<span style='color:#ff0000'>".$firstT."</span>";
      }elseif($firstT >0 && $firstT <10){
      $firstT = "<span style='color:#ff0000'>0".$firstT."</span>";
      }
      if ($secondT === 0) {
      $secondT = "<span style='color:#ff0000'>".$secondT."</span>";
      }elseif($secondT > 0 && $secondT <10){
      $secondT = "<span style='color:#ff0000'>0".$secondT."</span>";
      }

      if ($exam < 30){
      $exam = "<span style='color:#ff0000'>".$exam."</span>";
      }
      $af .= "<td class='gS'>" . $firstT . "</td><td class='gS'>" . $secondT . "</td><td class='gS'>" . $exam . "</td><td class='gS'>" . $sumTotal . "</td><td class='gS'>" . $grade . "</td>";
      $c++;
      //echo $hf . "\n";
      }
      $afs = "<tr><td>*</td><td>" . $studentName . "</td>" . $af . "</tr>";
      echo $afs;
     */
    ++$c;
}

function hi() {
    echo "2";
}

function getStudentScores($tht, $stid, $susu, $his, $hers) {
    global $w;
    $hi = "select $tht from grades where StudentID='$stid' and SubjectID='$susu' and Term='$his' and session='$hers'";
    //return $hi;
    $hsa = mysqli_query($w,$hi);
    $j = mysqli_fetch_array($hsa);
    //$ja = $j[\" $tht\"];
    //$ja ="21";
    //return $ja;  
    return $j[$tht];
    //return "2";
}

//echo $fa . "\n";
function getGrade($d) {
    if ($d > 69 && $d < 101) {
        return "A";
    } elseif ($d >= 60 && $d <= 69) {
        return "B";
    } elseif ($d >= 50 && $d <= 59) {
        return "C";
    } elseif ($d >= 40 && $d <= 49) {
        return "D";
    } elseif ($d >= 0 && $d <= 40) {
        return "<span style='color:#ff0000'>F</span>";
    }
}
