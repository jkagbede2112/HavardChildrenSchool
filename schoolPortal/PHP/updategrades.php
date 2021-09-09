<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * test1: test1, test2: test2, exam: exam
 */

$test1 = $_POST['test1'];
$test2 = $_POST['test2'];
$exam = $_POST['exam'];
$studentgradID = $_POST['studentgradID'];

session_start();
$subjectcode = $_SESSION['subjectGrade'];
$curr_term = $_SESSION['Curr_Term'];
$curr_session = $_SESSION['Curr_Session'];
$teacherID = $_SESSION['TeacherID'];
$classID = substr($subjectcode, 0, 4);
$subjectID = $_SESSION['subjectGrade'];

//$ha = mysql_query("insert into grades (TeacherID,StudentID,ClassID,SubjectID,FirstTest, SecondTest, Exam, totalscore, Grade, Term, Session, publishStatus) "
// . "values('$teacherID','$studentgradID','$classID','$subjectcode','-','-','-','-','','$curr_term','$curr_session','')");

$fa = mysqli_query($w,"update grades set FirstTest='$test1', SecondTest='$test2', Exam = '$exam' where StudentID ='$studentgradID' and ClassID='$classID' and SubjectID='$subjectcode'");
if ($fa) {
    echo "Update successfull";
} else {
    echo "Not updated";
}