<?php
include 'databaseSQLconnectn.php';
session_start();
$teacherID = $_SESSION['TeacherID'];
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$g = mysqli_query($w,"select * from assignments where TeacherID='$teacherID' order by Date Desc");
while ($j = mysqli_fetch_array($g)){
    echo "<tr><td>".$j['Subject']."-".$j['StudentID']."</td><td>".$j['Date']."</td><td><i class='fa fa-home ptr'></i></td></tr>";
}