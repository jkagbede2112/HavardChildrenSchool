<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

$action = validate("action");

if ($action === "displaypayschedule") {
    $session = $_POST['session'];
    $k = "select * from paymentcategory where session='$session' order by paymentname asc";
    $q = mysqli_query($w, $k);
    while ($a = mysqli_fetch_array($q)) {
        $paymentname = $a['paymentname'];
        $paymentid = $a['categoryid'];

        echo "<div class='title'>$paymentname</div>";
        $paylist = $paymentname . " - " . $session;
        $vg = mysqli_query($w, "select * from paycatbreakdown where description='$paylist'");
        $count = 1;
        $prep = "<table class='table table-condensed table-bordered table-striped' style='font-size:12px'><tr style='font-weight:600; font-size:13px'><td>S/N</td><td>Description</td><td>Amount</td><td>Remark</td><td></td><td></td></tr>";
        while ($kaz = mysqli_fetch_array($vg)) {
            $id = $kaz['breakdownid'];
            $amount = $kaz['amount'];
            $remark = $kaz['remark'];
            $paytype = $kaz['paytype'];
            $prep .= "<tr><td>$count</td><td>$remark</td><td>$amount</td><td>$paytype</td><td style='cursor:pointer; font-weight:bold' data-toggle='modal' data-target='#updatebillitem' title='Update' onclick='ubillitem(\"$remark\",\"$id\")'>U or <i class='fa fa-times' style='color:red; cursor:pointer'></i></td></tr>";
            $count++;
        }
        echo $prep . "</table>";
    }
}