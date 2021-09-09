<?php
include 'databaseSQLconnectn.php';
include 'validateinput.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$finder = mysqli_query($w,"select * from linkages where Status = '0'");
while ($getter = mysqli_fetch_array($finder)){
    $studentID = $getter['StudentID'];
    $parentID = $getter['ParentID'];
    $status = $getter['Status'];
    
    if ($status === "0"){
        $action = "<span onclick='allowlink(\"$parentID\",\"$studentID\")' style='cursor:pointer; padding:4px; background-color:#009966; color:#fff; font-size:13px; border-radius:2px'>Allow</span>";
    }else{
         $action = "<span onclick='denylink($parentID,$studentID)'>Deny</span>";
    }
    
    $parentDets = mysqli_query($w,"select ParentName from parentsregister where ParentID='$parentID'");
    $g = mysqli_fetch_array($parentDets);
    $parentName = $g['ParentName'];
    
    $studentDets = mysqli_query($w,"select Surname, Firstname, ClassID from schstudent where schoolid='$studentID'");
    $f = mysqli_fetch_array($studentDets);
    $StudentName = $f['Surname'] . " " .  $f['Firstname'];
    $StudentClass = $f['ClassID'];
    $classname = getclassname($StudentClass);
    
    echo "<tr><td>".$StudentName."</td><td>".$classname."</td><td>".$parentName."</td><td>".$action."</td></tr>";
}