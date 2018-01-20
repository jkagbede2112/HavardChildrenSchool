<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$sID = $_POST['sID'];
//echo "w";
$links = mysqli_query($w,"select * from linkages where StudentID ='$sID'");

while ($ww = mysqli_fetch_array($links)){
 $ParentID = $ww['ParentID'];
// echo $ParentID;

 $q = mysqli_query($w,"select * from parentsregister where ParentID='$ParentID'");
$dd = mysqli_fetch_array($q);
 $name = $dd['ParentName'];
 $email = $dd['Email'];
 
 echo "<tr><td>".$name."</td><td>".$email."</td></tr>";

}