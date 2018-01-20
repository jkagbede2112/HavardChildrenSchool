<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$classID = $_POST['classID'];
$fdf = mysqli_query($w,"select * from schstudent where classID='$classID'");
if (mysqli_num_rows($fdf) < 1) {
    echo "<tr><td colspan='3'>No student found</td></tr>";
}
$count = 1;
while ($a = mysqli_fetch_array($fdf)) {
    echo "<tr><td><span style='color:#3A6478'>" . $count . "</span></td><td><b><span style='color:#3A6478'>" . $a['Surname'] . "</span></b> " . $a['Firstname'] . "e</td><td><i class='fa fa-folder-o point' title='See grades'></i></td></tr>";
    $count++;
}