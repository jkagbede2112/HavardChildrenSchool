<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

$wtd = validate("wtd");

if ($wtd === "getlist"){
    $get = mysqli_query($w,"select * from schstaff order by StaffName");
    
    while ($f = mysqli_fetch_array($get)){
        $fphon = $f['StaffPhone'];
        $fID = $f['StaffID'];
        echo "<tr title=\"$fphon\"><td><i class='fa fa-close point' title='Remove Staff' onclick='deleteClassT(\"$fID\")'></i></td><td>".$f['StaffName']."</td><td>".$f['StaffID']."</td><td><i class='point fasd' onclick='getTeacherInfo(\"$fID\")' title='Update ".$f['StaffName']. "'>Update</i></td></tr>";
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

