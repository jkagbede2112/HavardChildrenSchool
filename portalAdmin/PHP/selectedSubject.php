<?php
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$studentgradID = $_POST['studentgradID'];
session_start();
$subjectcode = $_SESSION['subjectGrade'];
$curr_term = $_SESSION['Curr_Term'];
$curr_session = $_SESSION['Curr_Session'];
$teacherID = $_SESSION['TeacherID'];
$classID = substr($subjectcode,0,4);

$b = mysqli_query($w,"select * from grades where StudentID='$studentgradID' and SubjectID='$subjectcode' and Term='$curr_term' and Session='$curr_session'");
if (mysqli_num_rows($b)>0){
   $gs = mysqli_fetch_array($b);
   
   $firstTest = $gs['FirstTest'];
   $secondTest = $gs['SecondTest'];
   $exam = $gs['Exam'];
   echo "<v>".$firstTest."</v><c>".$secondTest."</c><x>".$exam."</x>";
}else{
    $ha = mysqli_query("insert into grades (TeacherID,StudentID,ClassID,SubjectID,FirstTest, SecondTest, Exam, totalscore, Grade, Term, Session, publishStatus) "
            . "values('$teacherID','$studentgradID','$classID','$subjectcode','-','-','-','-','','$curr_term','$curr_session','')");
    echo "<v>-</v><c>-</c><x>-</x>";
}


