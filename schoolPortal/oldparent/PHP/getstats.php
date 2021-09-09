<?php

include 'databaseSQLconnectn.php';

session_start();
try {
    
    $parentID = $_SESSION['ParentID'];
    $query = mysql_query("select * from linkages where ParentID = '$parentID'");
    $query1 = mysql_query("select * from linkages where ParentID = '$parentID' and status = '1'");
    $rez1 = mysql_num_rows($query);
    $rez2 = mysql_num_rows($query1);

    echo "<r>".$rez1."</r><a>".$rez2."</a>";
    //echo $rez1 . " requests, " . $rez2 . " approved";
} catch (Exception $e) {
    echo "Application is busy";
}


