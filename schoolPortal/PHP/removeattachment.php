<?php

include 'databaseSQLconnectn.php';
/* 
 * Kayode Agbede 07055518205
 */

$parentID = $_POST['parentID'];
$studentID = $_POST['studentID'];

$removelinkage = mysql_query("delete from linkages where ParentID='$parentID' and StudentID='$studentID'");
if ($removelinkage){
    echo "1";
}else{
    echo "0";
}