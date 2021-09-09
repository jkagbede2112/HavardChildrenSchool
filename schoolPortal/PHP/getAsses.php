<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$whattodo = $_POST['wtp'];

if ($whattodo === "All") {
    $fd = mysqli_query($w,"select * from assignments order by SN DESC limit 10");
    $count = 1;
    while ($ads = mysqli_fetch_array($fd)) {
        $SN = $ads['SN'];
        $classid = $ads['ClassID'];
        $classname = getclassname($classid);
        echo "<tr><td>" . $count . "</td><td>" . $ads['Subject'] . "</td><td>" .$classname  . "</td><td>" . substr($ads['Date'], 0, 10) . "</td><td><i class='fa fa-eye point' title='See assignment' id=fafa$SN onclick='loadAsses(\"$SN\",\"#fafa$SN\")'></i></td></tr>";
        $count++;
    }
} elseif ($whattodo === "Date") {
    $datevalue = $_POST['dateValue'];
    $ygh = "select * from assignments where Date like '%$datevalue%' order by SN DESC limit 10";
    //echo ;
    $fd = mysqli_query($w,$ygh);
    $count = 1;
    while ($ads = mysqli_fetch_array($fd)) {
        $SN = $ads['SN'];
        echo "<tr><td>" . $count . "</td><td>" . $ads['Subject'] . "</td><td>" . $ads['StudentID'] . "</td><td>" . substr($ads['Date'], 0, 10) . "</td><td><i class='fa fa-eye point' title='See assignment' id=fafa$SN onclick='loadAsses(\"$SN\",\"#fafa$SN\")'></i></td></tr>";
        $count++;
    }
} elseif ($whattodo === "Class") {
    $datevalue = $_POST['dateValue'];
    $ygh = "select * from assignments where StudentID like '%$datevalue%' order by SN DESC limit 10";
    //echo ;
    $fd = mysqli_query($w, $ygh);
    $count = 1;
    while ($ads = mysqli_fetch_array($fd)) {
        $SN = $ads['SN'];
        echo "<tr><td>" . $count . "</td><td>" . $ads['Subject'] . "</td><td>" . $ads['StudentID'] . "</td><td>" . substr($ads['Date'], 0, 10) . "</td><td><i class='fa fa-eye point' title='See assignment' id=fafa$SN onclick='loadAsses(\"$SN\",\"#fafa$SN\")'></i></td></tr>";
        $count++;
    }
}