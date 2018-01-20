<?php

include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$getPcount = mysqli_query($w,"select * from parentsregister");
$getstudentinfo = mysqli_query($w,"select * from studentinfo");
$getClassteachers = mysqli_query($w,"select * from cts");
$getPRS = mysqli_query($w,"select * from preregisteredstudents");
$getassignments = mysqli_query($w,"select * from assignments");

$getPcounts = mysqli_num_rows($getPcount);
$getPRSs = mysqli_num_rows($getPRS);
$getstudentinfos = mysqli_num_rows($getstudentinfo);
$getClassteacherss = mysqli_num_rows($getClassteachers);
$getassignmentss = mysqli_num_rows($getassignments);

echo "<a>".$getPcounts."</a><b>".$getstudentinfos."</b><c>".$getPRSs."</c><d>".$getClassteacherss."</d><e>".$getassignmentss."</e>";