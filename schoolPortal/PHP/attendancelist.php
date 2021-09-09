<?php

$classID = $_POST['classID'];

include 'databaseSQLconnectn.php';
$tday = date('j-m-Y');
session_start();
$teacherID = $_SESSION['TeacherID'];
//$classwo = $_SESSION['ClassID'];
$b = mysqli_query($w, "select * from schstudent where ClassID='$classID' order by Surname ASC");
$present = "";

while ($x = mysqli_fetch_array($b)) {
    $sID = $x['StudentID'];
    $fsID = "jka" . $sID;
    $csID = "c" . $sID;
    $hashed = "c" . $sID;
    $avs = "d".$sID;
    echo "<tr style='font-family:verdana; font-size:13px' id='$avs'><td><input id='$csID' type='checkbox' checked onclick='absentStudent(\"$sID\", \"$hashed\")'/> </td><td>" . $x['Surname'] . " " . $x['Firstname'] . "</td><td><span id='$fsID' onclick='confirmabsentism(\"$sID\",classID2Check.value)' style='display:none; padding:4px; background-color:#FF6666; border-radius:2px; cursor:pointer' title='Absent?'>Confirm</span></td></tr>";
$present .= $sID ."-";
}

$c = "insert into attendancesheet (ClassID, TeacherID, Date, Present, Absent) values ('$classID','$teacherID','$tday','$present','-') ";
$o = mysqli_query($w,$c);
if (!$o){
    $vf = "update attendancesheet set Present ='$present', Absent = '', TeacherID='$teacherID' where Date = '$tday' and ClassID='$classID'";
    mysqli_query($w,$vf);
}