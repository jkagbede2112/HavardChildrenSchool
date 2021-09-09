<?php
include 'validateinput.php';
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$stdI = validate("sID");

$w = mysqli_query($w,"select * from schstudent where StudentID='$stdI'");

$d = mysqli_fetch_array($w);

$sname = $d['Surname'];
$fname = $d['Firstname'];
$hAddress = $d['HomeAddress'];
$eAddress = $d['EmailAddress'];
$ClassID = $d['ClassID'];
$sID = $d['StudentID'];
$imglink = $d['passportphoto'];

$gender = $d['gender'];
$soo = $d['stateoforigin'];
$nationality = $d['nationality'];
$bloodgroup = $d['Bloodgroup'];
$genotype = $d['Genotype'];
$healthstatus = $d['healthstatus'];

echo "<a>".$sname."</a><b>".$fname."</b><c>".$hAddress."</c><d>".$eAddress."</d><e>".$ClassID."</e><f>".$sID."</f><g>".$imglink."</g><h>".$gender."</h><i>".$soo."</i><j>".$nationality."</j><k>".$bloodgroup."</k><l>".$genotype."</l><m>".$healthstatus."</m>";