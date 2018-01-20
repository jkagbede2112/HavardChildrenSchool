<?php
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$val = $_POST['val'];
$curr_session = $_POST['session'];
$curr_term = $_POST['term'];

//echo $curr_session . " " . $curr_term;

$asd = mysqli_query($w,"select * from fee_transaction where student_id='$val' and Session='$curr_session' and Term='$curr_term' order by date desc");
$count = 1;
while ($a = mysqli_fetch_array($asd)){
    echo "<tr style=''><td style='font-weight:bold; color:#A88302'>".$count."</td><td>".$a['description']."</td><td><strike>N</strike>".$a['amount']."</td><td>".$a['receiptID']."</td><td>".$a['date']."</td><td style='color:#005E8A'>".$a['Bank']."</td><td>".$a['TellerNumber']."</td></tr>";
$count++;
}
if (mysqli_num_rows($asd)<1){
    echo "<tr><td colspan='7' style='color:#ff0000; text-align:center'>No payment records found</td></tr>";
}