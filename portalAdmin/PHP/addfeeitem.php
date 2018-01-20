<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * feeclass:fee_class, feesession:fee_session, feeyear:fee_year, feeitem:fee_item, feeamount:fee_amount
 */
$feeclass = $_POST['feeclass'];
$feesession = $_POST['feesession'];
$feeyear = $_POST['feeyear'];
$feeitem = $_POST['feeitem'];
$feeamount = $_POST['feeamount'];
$feeamounta = str_replace(",", "", $feeamount);

//echo $feeclass . " - " . $feesession . " - " . $feeyear . " - " . $feeitem . " - " . $feeamounta;
if (strlen($feeamounta < 1)) {
    echo "Check fee";
} elseif (strlen($feeitem) < 2) {
    echo "Check item name";
} else {
    $asd = mysqli_query($w,"insert into fee_category (Class, Session, year, Item, Fee)"
            . " values('$feeclass','$feesession','$feeyear','$feeitem','$feeamounta')");
    if ($asd) {
        echo "Saved";
    } else {
        echo "Not saved";
    }
}
