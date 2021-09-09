<?php

ob_start();
ob_get_flush();
header ( "Content-type: application/vnd.ms-excel" );
header ( "Content-Disposition: attachment; filename=havardstudents.xls" );

include 'databaseSQLconnectn.php';
include 'validateinput.php'; 

$tb = "<table class='table table-bordered table-condensed'>
<tr style='background-color:#ccc'><td></td><td>Surname</td><td>Other name</td><td>First name</td>
<td>Gender</td><td>Date Of birth</td><td>Class</td><td>Genotype</td><td>Place of birth</td><td>State Of Origin</td><td>Nationality</td></tr>";
$tf = "select * from schstudent order by CLassID asc";
$ht = mysqli_query($w,$tf);
$gtf = mysqli_num_rows($ht);
$count =1;
while ($jt = mysqli_fetch_array($ht)){
    $surname = $jt['Surname'];
    $classid = $jt['ClassID'];
    $class = getclassname($classid);
    $othername = $jt['Middlename'];
    $firstname = $jt['Firstname'];
    $gender = $jt['gender'];
    $dob = $jt['dateofbirth'];
    $genotype = $jt['Genotype'];
    $placeofbirth = $jt[''];
    $soo = $jt['stateoforigin'];
    $nationality = $jt['nationality'];
    $tb .= "<tr><td>$count</td><td>$surname</td><td>$othername</td><td>$firstname</td><td>$gender</td><td>$dob</td><td>$class</td><td>$genotype</td><td>$placeofbirth</td><td>$soo</td><td>$nationality</td></tr>";
    $count++;
}
echo $tb . "</table>";

?>