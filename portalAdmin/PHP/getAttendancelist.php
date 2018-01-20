<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
//$classID = $_SESSION['ClassID'];
$teacherID = $_SESSION['TeacherID'];
$classID = $_POST['classID'];
//echo date('d-m-Y');
$cd = mysqli_query($w,"select Surname, Firstname, StudentID from schstudent where ClassID='$classID' order by Surname ASC");

while ($g = mysqli_fetch_array($cd)) {
    $Surname = $g['Surname'];
    $Firstname = $g['Firstname'];
    $StudentID = $g['StudentID'];

    $day = 1;
    echo "<tr><td>" . $Surname . " " . $Firstname . " </td> ";
    while ($day < 32) {
        $dDay = date($day . '-m-Y');
        //echo $dDay."<br/>";

        $fasd = mysqli_query($w,"select Date from attendancesheet where Date='$dDay'");

        if (mysqli_num_rows($fasd) < 1) {
            echo "<td>-</td>";
        } else {
            $dad = mysqli_query($w,"select ClassID from attendancesheet where classID='$classID' and Date ='$dDay' and Present LIKE '%$StudentID%'");
            //echo $dad . "<br/>";
            $sds = mysqli_fetch_array($dad);
            if (mysqli_num_rows($dad) > 0) {
                echo "<td style='background-color:#C4FFC4; text-align:center; border-radius:20px'>P</td>";
            } else {
                echo "<td style='background-color:#FFA8A8; text-align:center; border-radius:20px;'>A</td>";
            }
        }
        $day++;
    }
    echo "</tr>";
}
 
