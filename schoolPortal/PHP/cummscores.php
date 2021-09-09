<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

error_reporting(0);
$action = $_POST['action'];
$studentid = $_POST['stdid'];
$term = $_POST['term'];
$session = $_POST['session'];
$resulttype = $_POST['resulttype'];

if ($action === "getcumm") {
        $action = $_POST['action'];
$studentid = $_POST['stdid'];
$term = $_POST['term'];
$session = $_POST['session'];
$resulttype = $_POST['resulttype'];
//echo $resulttype;
    //Get total scores from subjects
    $stdclass = getstclassidfromschoolid($studentid);
    $totalscorespossible = gettotalpossiblescoresgperstd($studentid, $term, $session, $stdclass, $resulttype);
    $totalscores = gettotalscoresg($studentid, $term, $session, $resulttype);
    //echo $studentid . " ---- ";

    $percentage = number_format((($totalscores / $totalscorespossible) * 100),2) . "%";
    //$cumav = getcummaverage($term, $session, $stdclass, $studentid, $subid);
    
    $hy = "select * from subjects where SubjectCategoryid='$stdclass'";
    $hqa = mysqli_query($w,$hy);
    
    //echo $stdclassss;
    //$stdclasss = "";
$avscore = "";
    while ($qwa = mysqli_fetch_array($hqa)){
        $subid = $qwa['sn'];
        $avscore .= $subid;
        // $stdclassss = $term ." - ". $session." - ". $stdclass." - ". $studentid." - ". $subid;
        $cumav = getcummaverage($term, $session, $stdclass, $studentid, $subid);
        $avscore .= $cumav.",";
    }

    $cumaver = getcummscor($studentid, $term, $session, $resulttype);
$pscor = number_format(($cumaver/$totalscorespossible)*100,2) . "%";
if ($resulttype === "midterm"){
    $prepcummtab = "<tr><td style='padding:5px; text-align:left'>TOTAL OBTAINABLE SCORE</td><td style='padding:5px'>$totalscorespossible</td><td>-</td></tr>"
            . "<tr><td style='padding:5px; text-align:left'>OBTAINED SCORE</td><td style='padding:5px'>$totalscores</td><td>-</td></tr>"
            . "<tr><td style='padding:5px; text-align:left'>PERCENTAGE (%)</td><td style='padding:5px'>$percentage</td><td>-</td></tr>";
}else{

    $prepcummtab = "<tr><td style='padding:5px; text-align:left'>TOTAL OBTAINABLE SCORE </td><td style='padding:5px'>$totalscorespossible</td><td>$totalscorespossible</td></tr>"
            . "<tr><td style='padding:5px; text-align:left'>OBTAINED SCORE</td><td style='padding:5px'>$totalscores</td><td>$cumaver</td></tr>"
            . "<tr><td style='padding:5px; text-align:left'>PERCENTAGE (%)</td><td style='padding:5px'>$percentage</td><td>$pscor</td></tr>";
}
    echo $prepcummtab;
    /*
    //Get total scores from subjects
    $stdclass = getstclassidfromschoolid($studentid);
    //gettotalpossiblescoresgperstd($stdid, $term, $session, $stdclass, $resulttype)
    $totalscorespossible = gettotalpossiblescoresgperstd($studentid, $term, $session, $stdclass, $resulttype);
    $totalscores = gettotalscoresg($studentid, $term, $session, $resulttype);

    $percentage = number_format((($totalscores / $totalscorespossible) * 100),2) . "%";
$cumaver = getcummscor($studentid, $term, $session, $resulttype);
$percscore = number_format(($cumaver/ $totalscorespossible)*100,2) . "%";
    $prepcummtab = "<tr><td style='padding:5px; text-align:left'>TOTAL OBTAINABLE SCORE</td><td style='padding:5px'>$totalscorespossible</td><td>$totalscorespossible</td></tr>"
            . "<tr><td style='padding:5px; text-align:left'>OBTAINED SCORE</td><td style='padding:5px'>$totalscores</td><td>$cumaver</td></tr>"
            . "<tr><td style='padding:5px; text-align:left'>PERCENTAGE (%)</td><td style='padding:5px'>$percentage</td><td>$percscore</td></tr>";
    echo $prepcummtab;*/
}

if ($action === "getcumms") {
    $action = $_POST['action'];
$studentid = $_POST['stdid'];
$term = $_POST['term'];
$session = $_POST['session'];
$resulttype = $_POST['resulttype'];
    //Get total scores from subjects
    $stdclass = getstclassidfromschoolid($studentid);
    $totalscorespossible = gettotalpossiblescoresgperstd($studentid, $term, $session, $stdclass, $resulttype);
    $totalscores = gettotalscoresg($studentid, $term, $session, $resulttype);
    //echo $studentid . " ---- ";

    $percentage = number_format((($totalscores / $totalscorespossible) * 100),2) . "%";
    //$cumav = getcummaverage($term, $session, $stdclass, $studentid, $subid);
    
    $hy = "select * from subjects where SubjectCategoryid='$stdclass'";
    $hqa = mysqli_query($w,$hy);
    
    //$stdclasss = "";
$avscore = "";
    while ($qwa = mysqli_fetch_array($hqa)){
        $subid = $qwa['sn'];
        $avscore .= $subid;
        // $stdclassss = $term ." - ". $session." - ". $stdclass." - ". $studentid." - ". $subid;
        $cumav = getcummaverage($term, $session, $stdclass, $studentid, $subid);
        $avscore .= $cumav.",";
    }

    $cumaver = getcummscor($studentid, $term, $session, $resulttype);
$pscor = number_format(($cumaver/$totalscorespossible)*100,2) . "%";
if ($resulttype === "midterm"){
    $prepcummtab = "<tr><td style='padding:5px; text-align:left'>TOTAL OBTAINABLE SCORE</td><td style='padding:5px'>$totalscorespossible</td><td>-</td></tr>"
            . "<tr><td style='padding:5px; text-align:left'>OBTAINED SCORE</td><td style='padding:5px'>$totalscores</td><td>-</td></tr>"
            . "<tr><td style='padding:5px; text-align:left'>PERCENTAGE (%)</td><td style='padding:5px'>$percentage</td><td>-</td></tr>";
}else{

    $prepcummtab = "<tr><td style='padding:5px; text-align:left'>TOTAL OBTAINABLE SCORE </td><td style='padding:5px'>$totalscorespossible</td><td>$totalscorespossible</td></tr>"
            . "<tr><td style='padding:5px; text-align:left'>OBTAINED SCORE</td><td style='padding:5px'>$totalscores</td><td>$cumaver</td></tr>"
            . "<tr><td style='padding:5px; text-align:left'>PERCENTAGE (%)</td><td style='padding:5px'>$percentage</td><td>$pscor</td></tr>";
}
    echo $prepcummtab;
}

function getcummscor($stdid, $term, $session, $resulttype){
    $firsty = gettotalscoresg($stdid, "1st Term", $session, $resulttype);
    $second = gettotalscoresg($stdid, "2nd Term", $session, $resulttype);
    $third =  gettotalscoresg($stdid, "3rd Term", $session, $resulttype);
    if ($term === "1st Term"){
        return $firsty;
    }
    if ($term === "2nd Term"){
        if ($firsty < 1){
            return $second;
        }else{
            $ht = ($firsty + $second)/2;
        return $ht;
        }
        
    }
    if ($term === "3rd Term"){
        if ($firsty < 1 && $second <1){
            return $third;
        }
        if ($firsty < 1 && $second > 0){
            $ht = ($second + $third)/2;
            return $ht;
        }
        if ($firsty > 0 && $second < 1){
            $ht = ($firsty + $third)/2;
            return $ht;
        }
        else{
            $ht = ($firsty + $second + $third)/3;
        return $ht;
        }
        
    }
}

function gettotalscoresgg($stdid, $term, $session, $resulttype) {
    global $w;
    
        $p = "select * from playnurresult where studentid='$stdid' and term='$term' and session='$session'";

    $q = mysqli_query($w, $p);
    $score = 0;
    while ($az = mysqli_fetch_array($q)) {
        $result = $az['result'];
        $score += $result;
    }
    return $score;
}

function getscoreq($classid, $session, $term, $stdid) {
    $firstca = getresultgq($classid, $session, $term, 'first', $stdid);
    $secondca = getresultgq($classid, $session, $term, 'second', $stdid);
    $thirdca = getresultgq($classid, $session, $term, 'third', $stdid);
    $exam = getresultexamq($classid, $session, $term, 'exam', $stdid);
    $total = $firstca + $secondca + $thirdca + $exam;

    return $total;
}

function getcummaver($term, $session, $classid, $stdid) {
    $firsttermscore = getscoreq($classid, $session, "1st term", $stdid);
    $secondtermscore = getscoreq($classid, $session, "2nd term", $stdid);
    $thirdtermscore = getscoreq($classid, $session, "3rd term", $stdid);
    //getcummaverage($term, $session, $classid)
    if ($term === "1st Term") {
        return $firsttermscore;
    }
    if ($term === "2nd Term") {
        $average = ceil(($firsttermscore + $secondtermscore) / 2);
        return $average;
    }
    if ($term === "3rd Term") {
        $average = ceil(($firsttermscore + $secondtermscore + $thirdtermscore) / 3);
        return $average;
    }
}


function getresultgq($classid, $session, $term, $reslttype, $stdid) {
    global $w;
    $h = "select result from playnurresult where classid='$classid' and session='$session' and term='$term' and firstsecondthirdexam='$reslttype' and studentid ='$stdid'";
    //return $h;
    $g = mysqli_query($w, $h);
    $result = 0;
    while($xs = mysqli_fetch_array($g)){
        $result += $xs['result'];
    }
    
    return $result;
}
function getresultexamq($classid, $session, $term, $reslttype, $stdid) {
    global $w;
    $h = "select result from playnurresult where classid='$classid' and session='$session' and term='$term' and firstsecondthirdexam='$reslttype' and studentid ='$stdid'";
    $g = mysqli_query($w, $h);
    $xs = mysqli_fetch_array($g);
    $result = 0;
    while($xs = mysqli_fetch_array($g)){
        $result += $xs['result'];
    }
    return $result;
}

function getcummaverage($term, $session, $classid, $stdid, $subjectid) {
    //return "$term $session $classid $stdid $subjectid is good";
    $firsttermscore = getscore($classid, $session, "1st term", $stdid, $subjectid);
    $secondtermscore = getscore($classid, $session, "2nd term", $stdid, $subjectid);
    $thirdtermscore = getscore($classid, $session, "3rd term", $stdid, $subjectid);
    //getcummaverage($term, $session, $classid)
    if ($term === "1st Term") {
        //return $firsttermscore;
    }
    if ($term === "2nd Term") {
        if ($firsttermscore < 1){
            //return $secondtermscore;
        }else{
        $average = ceil(($firsttermscore + $secondtermscore) / 2);
        //return $average;
            
        }
    }
    if ($term === "3rd Term") {
        $average = ceil(($firsttermscore + $secondtermscore + $thirdtermscore) / 3);
        return $average;
    }
}

function getscore($classid, $session, $term, $stdid, $subjectid) {
    $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subjectid);
    $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subjectid);
    $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subjectid);
    $exam = getresultexam($classid, $session, $term, 'exam', $stdid, $subjectid);
    $total = $firstca + $secondca + $thirdca + $exam;
//$total = "34";
    return "";
}

function getresultexam($classid, $session, $term, $reslttype, $stdid, $subid) {
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

function getresultg($classid, $session, $term, $reslttype, $stdid, $subid) {
    global $w;
    $h = "select result from playnurresult where classid='$classid' and session='$session' and term='$term' and firstsecondthirdexam='$reslttype' and studentid ='$stdid' and subjectid='$subid' order by dateadded desc";
    $g = mysqli_query($w, $h);
    $xs = mysqli_fetch_array($g);
    $result = $xs['result'];
    if (strlen($result) < 1) {
        $result = 0;
    }
    return $h;
}

function gettotalpossiblescoresgperstd($stdid, $term, $session, $stdclass, $resulttype) {
    //return "$resulttype";
    global $w;
    $q = "select distinct(subjectid) from playnurresult where studentid='$stdid' and term='$term' and session='$session' and result > '0'";
    $a = mysqli_query($w, $q);

    //Get the 
    $vg = mysqli_num_rows($a);
    //return $vg;
    if ($resulttype === "midterm") {

        return ($vg * 40);
    } else {
        return ($vg * 100);
    }
}

function gettotalpossiblescoresg($stdclass, $resulttype) {
    global $w;
    $q = "select * from subjects where SubjectCategoryid='$stdclass'";
    $a = mysqli_query($w, $q);
    $vg = mysqli_num_rows($a);
    if ($resulttype === "midterm") {

        return ($vg * 40);
    } else {
        return ($vg * 100);
    }
}

function gettotalscoresg($stdid, $term, $session, $resulttype) {
    global $w;
    if ($resulttype === "midterm") {
        $p = "select * from playnurresult where studentid='$stdid' and term='$term' and session='$session' and (firstsecondthirdexam = 'first' or firstsecondthirdexam='second' or firstsecondthirdexam = 'third')";
    } else {
        $p = "select * from playnurresult where studentid='$stdid' and term='$term' and session='$session'";
    }

    $q = mysqli_query($w, $p);
    $score = 0;
    while ($az = mysqli_fetch_array($q)) {
        $result = $az['result'];
        $score += $result;
    }
    return $score;
}
