<?php

include 'databaseSQLconnectn.php';
error_reporting(0);
session_start();
try {
    
    $who = $_SESSION['Role'];
    //echo $who . " - ";
    $query = mysqli_query($w,"select * from linkages where ParentID = '$parentID'");
    $query1 = mysqli_query($w,"select * from linkages");
    $query2 = mysqli_query($w,"select * from schstudent");
    $query3 = mysqli_query($w,"select * from cts");
    $query4 = mysqli_query($w,"select * from parentsregister");
    
    if ($who === "Teacher"){
        $g = $_SESSION['TeacherID'];
        $query5 = mysqli_query($w,"select * from portalmessage where Recipient ='$g' and status='0'");
    }elseif($who === "Admin"){
        $query5 = mysqli_query($w,"select * from portalmessage where Recipient ='$who' and status='0'");
    }else{
        $parentID = $_SESSION['ParentID'];
        $query5 = mysqli_query("select * from portalmessage where Recipient ='$who' and status='0'");
    }

    $rez1 = mysqli_num_rows($query);
    $rez2 = mysqli_num_rows($query1);
    $rez3 = mysqli_num_rows($query2);
    $rez4 = mysqli_num_rows($query3);
    $rez5 = mysqli_num_rows($query4);
    $rez6 = mysqli_num_rows($query5);

    echo "<r>" . $rez1 . "</r><a>" . $rez2 . "</a><s>" . $rez3 . "</s><q>" . $rez4 . "</q><w>" . $rez5 . "</w><m>".$rez6."</m>";
//echo $rez6;    
//echo $rez1 . " requests, " . $rez2 . " approved";
} catch (Exception $e) {
    echo "Application is busy";
}


