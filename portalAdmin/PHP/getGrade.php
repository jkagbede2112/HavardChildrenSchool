<?php
include 'validateinput.php';
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
searchParam:searchcrit,studentID:searchStudentID, searchTerm:searchTerm, searchSession:searchSession
 * <option>Class</option>
                                        <option>Subject</option>
                                        <option>Student</option>
 * searchParam
 *  */

$searchParam = validate("searchParam");
if ($searchParam === "Class"){
    $classID = validate("studentID");
    $term = validate("searchTerm");
    $session = validate("searchSession");
 
    $d = "select * from grades where ClassID = '$classID', Term ='$term' and Session = '$session' order by SubjectID";
    echo $d;
}
if ($searchParam === "Student"){
    $studentID = validate("studentID");
    $term = validate("searchTerm");
    $session = validate("searchSession");
 
    $d = "select * from grades where StudentID = '$studentID' and Term ='$term' and Session = '$session' order by SubjectID";
    $q = mysqli_query($w,$d);
    while ($s = mysqli_fetch_array($q)){
        $sub = $s['SubjectID'];
        $firstTest = $s['FirstTest'];
        if ($firstTest < 10){
            $firstTest = "<span class='subfail'>"."0".$firstTest."</span>";
        }
        $secondTest = $s['SecondTest'];
        if ($secondTest < 10){
            $secondTest = "<span class='subfail'>"."0".$secondTest."</span>";
        }
        $exam = $s['Exam'];
        if ($exam < 30){
            $exam = "<span class='subfail'>".$exam."</span>";
        }
        $total = $firstTest + $secondTest + $exam;
        $grade = getGrade($total);
        if ($total > 49 && $total < 60){
           $comment = "Pass"; 
        }elseif($total > 59 && $total <=70){
            $comment = "Good";
        }elseif($total >= 70 && $total <=100){
            $comment = "Excellent";
        }else{
            $comment = "Fail";
        }
        
        
        $z = mysqli_query("select SubjectName from subjects where SubjectID='$sub'");
        $u = mysqli_fetch_array($z);
        $subjectName = $u['SubjectName'];
        
        echo "<tr class='subjName'><td>".$subjectName."</td><td class='subGrades'>".$firstTest."</td><td class='subGrades'>".$secondTest."</td><td class='subGrades'>".$exam."</td><td class='subGrades'>".$total."</td><td class='subGrades'>".$grade."</td><td class='subGrades'>NYA</td><td class='subGrades'>".$comment."</td></tr>";
    }
}

function getGrade($d){
    if ($d >69 && $d <101){
        return "A";
    }elseif($d >=60 && $d <=69){
        return "B";
    }elseif($d >=50 && $d <=59){
        return "C";
    }elseif($d >=40 && $d <=49){
        return "D";
    }elseif($d >=0 && $d <=40){
        return "F";
    }
}