<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * classid:classid,fee_studentnameID:fee_studentnameID,fee_amount:fee_amount,fee_description:fee_description
 * classid:classid,fee_studentnameID:fee_studentnameID,fee_amount:fee_amount,fee_description:fee_description, fee_term:fee_term, fee_session:fee_session
fee_datepaid:fee_datepaid, fee_bank:fee_bank, fee_teller:fee_teller,
 *  */
$fee_studentname = $_POST['fee_studentname'];
$fee_bal = $_POST['fee_bal'];
$classid = $_POST['classid'];
$fee_studentnameID = $_POST['fee_studentnameID'];
$feeamount = $_POST['fee_amount'];
$fee_amount = str_replace(",", "", $feeamount);
$fee_description = $_POST['fee_description'];
$fee_term = $_POST['fee_term'];
$fee_session = $_POST['fee_session'];
$fee_receipt = $_POST['fee_receipt'];
$fee_datepaid = $_POST['fee_datepaid'];
$fee_bank = $_POST['fee_bank'];
$fee_teller = $_POST['fee_teller'];

if (strlen($fee_receipt) < 1) {
    echo "Receipt not entered.";
} else {
    $adfad = mysqli_query($w,"insert into fee_transaction (DatePaid, Bank, TellerNumber, student_id, class_id, description, Term, Session, amount, receiptID)"
            . " values ('$fee_datepaid','$fee_bank','$fee_teller','$fee_studentnameID','$classid','$fee_description','$fee_term','$fee_session','$fee_amount','$fee_receipt')");
    if ($adfad) {
        echo "<i>1</i><fp>".$fee_amount."</fp><s>".$fee_session."</s><t>".$fee_term."</t><nm>".$fee_studentname."</nm><tl>".$fee_teller."</tl>";
    } else {
        echo "<i>0</i>";
    }
}