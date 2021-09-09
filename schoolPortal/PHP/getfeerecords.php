<?php

include 'databaseSQLconnectn.php';

$drClass = $_POST['drClass'];
$drTerm = $_POST['drTerm'];
$drSession = $_POST['drSession'];
$substringClass = substr($drClass, 0, 3);
//echo "<tr><td colspan='6'><center>".$drClass." - ".$drTerm." - ".$drSession."</center></td></tr>";
//Get fees to be paid..
$hihihihi = mysqli_query($w,"select amount from fee_transaction where class_id='$drClass'");
$fee = 0;
$amountPaid = 0;
while ($h = mysqli_fetch_array($hihihihi)) {
    $fee += $h['amount'];
}
//echo $fee;
//get all students in class
$hed = mysqli_query($w,"select * from schstudent where ClassID='$drClass'");
if (mysqli_num_rows($hed) < 1) {
    echo "<tr><td colspan='6' style='color:red'><center>No Students found in this class</center></td></tr>";
}
$count = 1;

while ($as = mysqli_fetch_array($hed)) {
    $stdID = $as['StudentID'];
    $stdName = $as['Surname'] . " " . $as['Firstname'];
    $totAmount = gettotalpayments($stdID, $drTerm, $drSession);

    $boarding = computeaccomodation($stdID, $drTerm, $drSession);
    
    $aatp = $fee + $boarding;
    //echo $totAmount . "<br/>";
    $leftover = $aatp - $totAmount;
    if ($leftover < 1) {
        $msgpar = "<i class='fa fa-check' style='color:#238B69'></i>";
        echo "<tr style='background-color:#C0EFE0'><td>" . $count . "</td><td id=\"$count$stdID\">" . $stdName . "</td><td class='point' onclick='payhist(\"$stdID\"); transName(\"$count$stdID\",\"F$count\",\"TA$count\",\"LO$count\")'>Payment History</td><td id='F$count'><strike>N</strike>" . $aatp . "</td><td id='TA$count'><strike>N</strike>" . $totAmount . "</td><td id='LO$count'><strike>N</strike>" . $leftover . "</td><td>" . $msgpar . "</td></tr>";
    } else {
        $msgpar = "<i title='Message Parents' class='fa fa-comments point' style='color:#F3764B' onclick='fetPars(\"$stdID\")'></i>";
        echo "<tr><td>" . $count . "</td><td id=\"$count$stdID\">" . $stdName . "</td><td class='point' onclick='payhist(\"$stdID\"); transName(\"$count$stdID\",\"F$count\",\"TA$count\",\"LO$count\")'>Payment History</td><td id='F$count'><strike>N</strike>" . $aatp . "</td><td id='TA$count'><strike>N</strike>" . $totAmount . "</td><td id='LO$count'><strike>N</strike>" . $leftover . "</td><td>" . $msgpar . "</td></tr>";
    }
    $count++;
}

function gettotalpayments($stdID, $term, $session) {
    global $w;
    $gsd = "select amount from fee_transaction where Term='$term' and Session = '$session' and student_id='$stdID'";
    //return $gsd;
    $jij = mysqli_query($w,$gsd);
    $amountPaid = 0;
    if (mysqli_num_rows($jij) < 1) {
        $amountPaid = 0;
    }
    while ($aaaa = mysqli_fetch_array($jij)) {
        //echo $aaaa['amount'] . "<br/>";
        $amountPaid += $aaaa['amount'];
    }
    return $amountPaid;
}

function computeaccomodation($student_id, $term, $session) {
    global $w;
    $hihihihi = mysqli_query($w,"select amount from boarder where Session='$session' and Term='$term' and student_id='$student_id'");
    $feed = 0;
    if (mysqli_num_rows($hihihihi) < 1) {
        return $feed;
    } else {
        while ($h = mysqli_fetch_array($hihihihi)) {
            $feed += $h['amount'];
        }
        return $feed;
    }
}
