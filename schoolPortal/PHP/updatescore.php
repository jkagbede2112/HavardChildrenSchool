<?php
include 'databaseSQLconnectn.php';
session_start(0);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * subjectSN:subject,category:category,studentID:studentID,score:score
 * $_SESSION['Curr_Term'] = $efdf['Term'];
$_SESSION['Curr_Session'] = $efdf['Session'];
 */

$TeacherID = $_SESSION['TeacherID'];
$session = $_SESSION['Curr_Session'];
$term = $_SESSION['Curr_Term'];
$subjectSN = $_POST['subjectSN'];
$category = $_POST['category'];
$cate = substr($category, 0, 6);
$studentID = $_POST['studentID'];
$score = $_POST['score'];

//echo $session . "-". $term . " - " . $subjectSN . " - " . $category . " - " . $studentID . " - ". $score;

if ( $cate === "agGrCE"){
    $u = "ClassExercise";
    insertStatement($studentID, $TeacherID, $score, $u, $subjectSN, $term, $session);
 }elseif($cate === "agGrAs"){
    $u = "Assignment";
    insertStatement($studentID, $TeacherID, $score, $u, $subjectSN, $term, $session);
 }elseif($cate === "agGrQu"){
    $u = "quiz";
    insertStatement($studentID, $TeacherID, $score, $u, $subjectSN, $term, $session);
 }elseif($cate === "agGrC1"){
    $u = "FirstTest";
    insertStatement($studentID, $TeacherID, $score, $u, $subjectSN, $term, $session);
 }elseif($cate === "agGrC2"){
    $u = "SecondTest";
    insertStatement($studentID, $TeacherID, $score, $u, $subjectSN, $term, $session);
 }elseif($cate === "agGrPr"){
    $u = "Project";
    insertStatement($studentID, $TeacherID, $score, $u, $subjectSN, $term, $session);
 }elseif($cate === "agGrTE"){
    $u = "Exam";
    insertStatement($studentID, $TeacherID, $score, $u, $subjectSN, $term, $session);
 }

 function insertStatement($studentID, $TeacherID, $score, $u, $subjectSN, $term, $session){
     global $w;
     $classID = "JSS1";
     $hhg = "insert into grades (TeacherID, StudentID, ClassID, SubjectID, $u, Term, Session) "
             . "values ('$TeacherID', '$studentID', '$classID', '$subjectSN', '$score', '$term', '$session')";
     //echo $hhg;
     $f = mysqli_query($w,$hhg);
     if ($f){
         echo "Successfully inserted";
     }else{
         updatestatement($studentID, $TeacherID, $score, $u, $subjectSN, $term, $session);
     }
 }
 
 function updatestatement($studentID, $TeacherID, $score, $u, $subjectSN, $term, $session){
     global $w;
     $hihi = "Update grades set $u='$score' where TeacherID='$TeacherID' and Term='$term' and Session='$session' and StudentID='$studentID' and SubjectID='$subjectSN'";
     $jsd = mysqli_query($w,$hihi);
     if ($jsd){
         echo "Score Updated";
     }
 }