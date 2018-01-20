<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * sess:sess,term:term, columntosearch:columntosearch, searchval:searchval
 * <tr style='font-weight:bold'><td></td><td>Name</td><td>Class</td><td>Term</td><td>Session</td><td>Amount</td><td>ReceiptNumber</td></tr>
"<tr style='font-weight:bold'><td></td><td>Teller Number</td><td>Student Name</td><td>Class</td><td>Bank</td><td>Amount</td><td>Payment Date</td><td>Date Submitted</td><td>Term</td><td>Session</td><td>Receipt Issued</td></tr>";
 *  */

$sess = $_POST['sess'];
$term = $_POST['term'];
$columntosearch = $_POST['columntosearch'];
$searchval = strip_tags(trim($_POST['searchval']));

$h = "select * from fee_transaction where Term='$term' and Session='$sess' and $columntosearch ='$searchval' order by SN DESC limit 100";
$sdfk = mysqli_query($w,$h);
//echo "<tr style='font-weight:bold'><td></td><td>Name</td><td>Class</td><td>Term</td><td>Session</td><td>Amount</td><td>ReceiptNumber</td></tr>";
$count = 1;
while ($a = mysqli_fetch_array($sdfk)) {
    $stdID = $a['student_id'];
    $gg = mysqli_query($w,"select * from schstudent where StudentID ='$stdID'");
    $ji = mysqli_fetch_array($gg);
    $studentName = $ji['Surname'] . " " . $ji['Firstname'];
    echo "<tr><td>" . $count . "</td><td>".$a['TellerNumber']."</td><td style='color:#005E8A'>" . $studentName . "</td><td>" . $a['class_id'] . "</td><td>".$a['Bank']."</td><td>".$a['amount'] ."</td><td>".$a['DatePaid']."</td><td>".$a['date']."</td><td>" . $a['Term'] . "</td><td>" . $a['Session'] . "</td><td style='color:#005E8A'>" . $a['receiptID'] . "</td></tr>";
    $count++;
}
if (mysqli_num_rows($sdfk)<1){
    echo "<tr style='padding:20px'><td colspan='11' style='color:#ff0000; font-family:raleway; text-align:center; font-size:16px'><span style='font-weight:bold; color:#000'>ARSMaS</span> could not find result for <b>".$searchval."</b> in <b>".$columntosearch."</b> for <b>".$sess."</b> session in <b>".$term."</b></td></tr>";
}
/*
$sdfk = mysql_query("select * from fee_transaction order by SN desc");
echo "<tr style='font-weight:bold'><td></td><td>Name</td><td>Class</td><td>Term</td><td>Session</td><td>Amount</td><td>ReceiptNumber</td></tr>";
$count = 1;
while ($a = mysql_fetch_array($sdfk)) {
    $stdID = $a['student_id'];
    $gg = mysql_query("select * from schstudent where StudentID ='$stdID'");
    $ji = mysql_fetch_array($gg);
    $studentName = $ji['Surname'] . " " . $ji['Firstname'];

    echo "<tr><td>" . $count . "</td><td>" . $studentName . "</td><td>" . $a['class_id'] . "</td><td>" . $a['Term'] . "</td><td>" . $a['Session'] . "</td><td><strike>N</strike>" . $a['amount'] . "</td><td>" . $a['receiptID'] . "</td></tr>";

    $count++;
}
 * *
 */