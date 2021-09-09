<?php
include 'databaseSQLconnectn.php';
include 'validateinput.php';
session_start();
$teacherID = $_SESSION['TeacherID'];
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$g = mysqli_query($w,"select * from assignments where TeacherID='$teacherID' order by Date Desc");
while ($j = mysqli_fetch_array($g)){
    $classid = $j['ClassID'];
    $classname = getclassname($classid);
    echo "<tr><td>$classname</td><td>".$j['Date']."</td><td>View </td><td><i class='fa fa-times ptr' style='color:red' title='Delete Assignment'></i></td></tr>";
}