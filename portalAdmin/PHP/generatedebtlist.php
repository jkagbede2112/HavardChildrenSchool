<?php

include 'databaseSQLconnectn.php';


session_start();
$curr_session = $_SESSION['Curr_Session'];
$curr_term = $_SESSION['Curr_Term'];

$val = $_POST['wtd'];
$acc = "";

if ($val === "1") {
    //Regenerate Debtors list
    // echo "2 ";
    $p = mysqli_query($w,"select * from schstudent");
    while ($q = mysqli_fetch_array($p)) {
        $studentid = $q['StudentID'];
        $cl = $q['ClassID'];
        $classid = substr($q['ClassID'], 0, 3);
        //echo $classid . " - ";
        $schoolfees = computefees($classid, $curr_term, $curr_session);
        $getaccomodation = computeaccomodation($studentid, $curr_term, $curr_session);
        $feestopay = $schoolfees + $getaccomodation;
        $feespaid = computepaymentsmade($studentid, $curr_term, $curr_session);
        $amountleft = $feestopay - $feespaid;

        if ($feestopay > $feespaid) {
            $att = "insert into debtregister (StudentID, Term, Session, ClassID, amountExpected, Amountpaid, AmountOwed)"
                    . " values ('$studentid','$curr_term','$curr_session','$cl','$feestopay','$feespaid','$amountleft')";
            $sd = mysqli_query($w,$att);
            if ($sd) {
                $speak = "Debtors list re-generated. Click view list now";
            } else {
                $awe = "update debtregister set amountExpected ='$feestopay', ClassID='$cl', Amountpaid='$feespaid', AmountOwed='$amountleft' "
                        . "where StudentID='$studentid' and Term='$curr_term' and Session='$curr_session'";
                $hh = mysqli_query($w,$awe);
                if ($hh) {
                    $speak = "Defaulters list regenerated.";
                } else {
                    $speak = "No records";
                }
            }
        }
    }
    echo $speak;
} elseif ($val === "2") {
    echo "<tr style='font-weight:bold'><td></td><td>Student Name</td><td>Class</td><td>Term</td><td>Session</td><td>Amount To Pay</td><td>Amount Paid</td><td>Amount owed</td></tr>";
    $g = mysqli_query($w,"select * from debtregister");
    $count = 1;
    while ($q = mysqli_fetch_array($g)) {
        $StudentID = $q['StudentID'];
        $h = mysqli_query($w, "select * from schstudent where StudentID='$StudentID'");
        $a = mysqli_fetch_array($h);
        $StudentName = $a['Surname'] . " " . $a['Firstname'];
        $Class = $a['ClassID'];

        $pp = mysqli_query("select * from boarder where student_id='$StudentID' and term='$curr_term' and session='$curr_session'");
        if (mysqli_num_rows($pp) > 0) {
            echo "<tr><td>" . $count . "</td><td style='color:#ff0000'>" . $StudentName . "</td><td>" . $Class . "</td><td>" . $q['Term'] . "</td><td>" . $q['Session'] . "</td><td style='text-align:center;color:#005E8A'><i class='fa fa-home'></i>&nbsp;<strike>N</strike> " . $q['amountExpected'] . "</td><td style='text-align:center'><strike>N</strike> " . $q['Amountpaid'] . "</td><td style='text-align:center; color:#005E8A'><strike>N</strike> " . $q['AmountOwed'] . "</td></tr>";
        } else {
            echo "<tr><td>" . $count . "</td><td style='color:#ff0000'>" . $StudentName . "</td><td>" . $Class . "</td><td>" . $q['Term'] . "</td><td>" . $q['Session'] . "</td><td style='text-align:center;color:#005E8A'><strike>N</strike> " . $q['amountExpected'] . "</td><td style='text-align:center'><strike>N</strike> " . $q['Amountpaid'] . "</td><td style='text-align:center; color:#005E8A'><strike>N</strike> " . $q['AmountOwed'] . "</td></tr>";
        }
        $count++;
    }
    if (mysqli_num_rows($g) < 1) {
        echo "<tr><td colspan='6' style='color:#ff0000; text-align:center'>No debtors found</td></tr>";
    }
} else {
    echo "<tr style='font-weight:bold'><td></td><td>Student Name</td><td>Class</td><td>Term</td><td>Session</td><td>Amount To Pay</td><td>Amount Paid</td><td>Amount owed</td></tr>";

    $g = mysqli_query($w,"select * from debtregister where ClassID='$val'");
    $count = 1;
    while ($q = mysqli_fetch_array($g)) {
        $StudentID = $q['StudentID'];
        $h = mysqli_query($w,"select * from schstudent where StudentID='$StudentID'");
        $a = mysqli_fetch_array($h);
        $StudentName = $a['Surname'] . " " . $a['Firstname'];
        $Class = $a['ClassID'];

         $pp = mysqli_query($w,"select * from boarder where student_id='$StudentID' and term='$curr_term' and session='$curr_session'");
        if (mysqli_num_rows($pp) > 0) {
            echo "<tr><td>" . $count . "</td><td style='color:#ff0000'>" . $StudentName . "</td><td>" . $Class . "</td><td>" . $q['Term'] . "</td><td>" . $q['Session'] . "</td><td style='text-align:center;color:#005E8A'><i class='fa fa-home'></i>&nbsp;<strike>N</strike> " . $q['amountExpected'] . "</td><td style='text-align:center'><strike>N</strike> " . $q['Amountpaid'] . "</td><td style='text-align:center; color:#005E8A'><strike>N</strike> " . $q['AmountOwed'] . "</td></tr>";
        } else {
            echo "<tr><td>" . $count . "</td><td style='color:#ff0000'>" . $StudentName . "</td><td>" . $Class . "</td><td>" . $q['Term'] . "</td><td>" . $q['Session'] . "</td><td style='text-align:center;color:#005E8A'><strike>N</strike> " . $q['amountExpected'] . "</td><td style='text-align:center'><strike>N</strike> " . $q['Amountpaid'] . "</td><td style='text-align:center; color:#005E8A'><strike>N</strike> " . $q['AmountOwed'] . "</td></tr>";
        }

        $count++;
    }
    if (mysqli_num_rows($g) < 1) {
        echo "<tr><td colspan='6' style='color:#ff0000; text-align:center'>No debtors found in this search</td></tr>";
    }
}

function computefees($c, $t, $s) {
    global $w;
    $hihihihi = mysqli_query($w,"select Fee from fee_category where Session='$t' and Year='$s' and Class='$c'");
    $fee = 0;
    while ($h = mysqli_fetch_array($hihihihi)) {
        $fee += $h['Fee'];
    }
    return $fee;
}

function computeaccomodation($student_id, $term, $session) {
    global $w;
    $hihihihi = mysqli_query($w,"select amount from boarder where Session='$session' and Term='$term' and student_id='$student_id'");
    $fee = 0;
    if (mysqli_num_rows($hihihihi) < 1) {
        $fee = 0;
        return $fee;
    } else {
        while ($h = mysqli_fetch_array($hihihihi)) {
            $fee += $h['amount'];
        }
        return $fee;
    }
}

function computepaymentsmade($studentid, $term, $session) {
    $hihihihi = mysqli_query($w,"select amount from fee_transaction where Session='$session' and Term='$term' and student_id='$studentid'");
    $fee = 0;
    if (mysqli_num_rows($hihihihi) < 1) {
        $fee = 0;
        return $fee;
    } else {
        while ($h = mysqli_fetch_array($hihihihi)) {
            $fee += $h['amount'];
        }
        return $fee;
    }
}
