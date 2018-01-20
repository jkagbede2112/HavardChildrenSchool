<?php

include 'databaseSQLconnectn.php';

$studentID = $_POST['studentID'];
$parentID = $_POST['parentID'];

$chh = mysql_query("select * from schstudent where StudentID='$studentID'");
if (mysql_num_rows($chh) < 1) {
    echo "Student ID does not exist. Please request proper studentID from school";
} else {
    $save = mysql_query("insert into linkages (ParentID, StudentID, Status) values('$parentID','$studentID','0')");

    if ($save) {
        echo "<font style='color:#000'>Attach request submitted. Awaiting school approval</font>";
    } else {
        $query = mysql_query("select * from linkages where ParentID = '$parentID' and StudentID = '$studentID'");
        $query1 = mysql_num_rows($query);
        if ($query1 > 0) {
            echo "<font style='color:#fff'>Awaiting school approval to attach</font>";
        } else {
            echo "Cannot add at this moment";
        }
    }
}




/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

