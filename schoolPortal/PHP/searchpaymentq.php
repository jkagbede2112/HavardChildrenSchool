<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * sess:sess,term:term, columntosearch:columntosearch, searchval:searchval
 * <tr style='font-weight:bold'><td></td><td>Name</td><td>Class</td><td>Term</td><td>Session</td><td>Amount</td><td>ReceiptNumber</td></tr>
 */

//$columntosearch = $_POST['columntosearch'];
$searchval = strip_tags(trim($_POST['val']));
$term = $_POST['term'];
$session = $_POST['session'];
//$wtbo = strip_tags(trim($_POST['wtbo']));

$j = mysqli_query($w,"select * from schstudent where ClassID='$searchval'");
if (mysqli_num_rows($j)<1){
    echo "<tr><td colspan='6' style='text-align:center'>No students in this class</td></tr>";
}
while ($yc = mysqli_fetch_array($j)){
    $stdid = $yc['StudentID'];
    $stdname = $yc['Surname'] . " " . $yc['Firstname'];
    $classname = $searchval;
    //Get paymentdetails.
    $op = "select amountpaid from paymentsmade where stdid='$stdid' and term='$term' and session='$session'";
    
    $ig = mysqli_query($w,$op);
    if (mysqli_num_rows($ig)<1){
    echo "<tr><td colspan='6' style='text-align:center'>No payments registered for this class</td></tr>";
}
    $amountpaid = 0;
    while($cf = mysqli_fetch_array($ig)){
$paid = $cf['amountpaid'];
$amountpaid += $paid;
    }
    $amtpp = "₦ " . number_format($amountpaid,2);
    echo "<tr><td></td><td>$stdname</td><td>$classname</td><td>$term</td><td>$session</td><td>$amtpp</td></tr>";
}
/*
    $h = "select * from fee_transaction where class_id ='$searchval'";
    $sdfk = mysqli_query($w,$h);
    echo "<tr style='font-weight:bold'><td></td><td>Name</td><td>Class</td><td>Term</td><td>Session</td><td>Amount</td><td>ReceiptNumber</td></tr>";
    $count = 1;
    while ($a = mysqli_fetch_array($sdfk)) {
        $stdID = $a['student_id'];
        $gg = mysqli_query($w,"select * from schstudent where StudentID ='$stdID'");
        $ji = mysqli_fetch_array($gg);
        $studentName = $ji['Surname'] . " " . $ji['Firstname'];
        echo "<tr><td>" . $count . "</td><td style='color:#005E8A'>" . $studentName . "</td><td>" . $a['class_id'] . "</td><td>" . $a['Term'] . "</td><td>" . $a['Session'] . "</td><td style='color:#A88302'><strike>N</strike> " . $a['amount'] . "</td><td style='color:#005E8A'>" . $a['receiptID'] . "</td></tr>";
        $count++;
    }
    if (mysqli_num_rows($sdfk) < 1) {
        echo "<tr><td colspan='5'>No records to show</td></tr>";
    }
*/
/*
$h = "select * from fee_transaction where classID ='$searchval'";
$sdfk = mysql_query($h);
echo "<tr style='font-weight:bold'><td></td><td>Name</td><td>Class</td><td>Term</td><td>Session</td><td>Amount</td><td>ReceiptNumber</td></tr>";
$count = 1;
while ($a = mysql_fetch_array($sdfk)) {
    $stdID = $a['student_id'];
    $gg = mysql_query("select * from schstudent where StudentID ='$stdID'");
    $ji = mysql_fetch_array($gg);
    $studentName = $ji['Surname'] . " " . $ji['Firstname'];
    echo "<tr><td>" . $count . "</td><td style='color:#005E8A'>" . $studentName . "</td><td>" . $a['class_id'] . "</td><td>" . $a['Term'] . "</td><td>" . $a['Session'] . "</td><td style='color:#A88302'><strike>N</strike> " . $a['amount'] . "</td><td style='color:#005E8A'>" . $a['receiptID'] . "</td></tr>";
    $count++;
}
if (mysql_num_rows($sdfk)<1){
    echo "<tr><td colspan='7' style='color:#ff0000; font-family:raleway; text-align:center; font-size:16px'><span style='font-weight:bold; color:#000'>ARSMaS</span> could not find result for <b>".$searchval."</b> in <b>".$columntosearch."</b> for <b>".$sess."</b> session in <b>".$term."</b></td></tr>";
}

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