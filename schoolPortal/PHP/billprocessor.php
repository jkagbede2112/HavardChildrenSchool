<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

$madamsignature = "madamsignature.jpg";
$action = validate('action');

if ($action === "addasset"){
    //assetname:assetname, assetcat:assetcat, assetqty:assetqty
    $assname = validate("assetname");
    $assetcat = validate("assetcat");
    $assetqty = validate("assetqty");
    $qa = "insert into assetitems (assetname, assetcategory, quantity) values ('$assname','$assetcat','$assetqty')";
    $xz = mysqli_query($w, $qa);
    if ($xz){
        echo "Saved";
    }else{
        echo "Not saved";
    }
}

if ($action === "updatebillitems"){
    //itemid:b, catitem:catitems, amount:catamounts, paytype:catpaytypes
    $itemid = validate("itemid");
    $item = validate("catitem");
    $amount = validate("amount");
    $paytype = validate("paytype");

    $ht = "update paycatbreakdown set remark='$item', paytype='$paytype', amount='$amount' where breakdownid='$itemid'";
    echo $ht;
    $gt = mysqli_query($w,$ht);
    if ($gt){
        echo "Updated";
    }else{
        echo "Not updated";
    }
}

if ($action === "deletebillitems"){
    //itemid:b, catitem:catitems, amount:catamounts, paytype:catpaytypes
    $itemid = validate("itemid");

    $ht = "delete from paycatbreakdown where breakdownid='$itemid'";
    echo $ht;
    $gt = mysqli_query($w,$ht);
    if ($gt){
        echo "Deleted";
    }else{
        echo "Not deleted";
    }
}

if ($action === "addasscat"){
    $value = validate("value");
    $qa = "insert into assetcategory (assetcategory) values ('$value')";
    $qac = mysqli_query($w,$qa);
    if ($qac){
        echo "Asset category saved";
    }else{
        echo "Asset not saved";
    }
}

if ($action === "pulltbillz"){
    $val = validate("val");
    $aq = "select distinct(stdid) from paymentsmade where itemid='$val'";
    $ht = mysqli_query($w,$aq);
    $count = 1;
    if (mysqli_num_rows($ht)<1){
        echo "<tr><td colspan='5' style='text-align:center'>No records</td></tr>";
    }
    $amountexpected = 0;
    $amountpaidt = 0;
$gt = "";
    while ($j = mysqli_fetch_array($ht)){
        $stdid = $j['stdid'];
$stdname = getstudentnames($stdid);
$itemamount = getitemamount($val);
$amountpaid = getamountpaid($stdid, $val);
$outstand = $itemamount - $amountpaid;
if (strlen($stdname)>4){
    $amountexpected += $itemamount;
    $amountpaidt += $amountpaid;
    $gt .= "<tr><td>$count</td><td>$stdname</td><td>$itemamount</td><td>$amountpaid</td><td>$outstand</td></tr>";
$count++;
}
    }
    echo $gt . "<tr><td colspan='2'></td><td>$amountexpected</td><td>$amountpaidt</td><td></td></tr>";
}

function getstudentnames($a){
    global $w;
    $ji = "select * from schstudent where StudentID='$a'";
    $hu = mysqli_query($w,$ji);
    $qa = mysqli_fetch_array($hu);
    $name = $qa['Surname'] . " " . $qa['Middlename'] . " " . $qa['Firstname'];
    return $name;
}

function getamountpaid($stdid, $val){
     global $w;
    $k = mysqli_query($w,"select amountpaid from paymentsmade where itemid='$val' and stdid='$stdid'");
    $totalamount = 0;
    while($ji = mysqli_fetch_array($k)){
        $amount = $ji['amountpaid'];
        $totalamount += $amount;
    }
    
    return $totalamount;
}

function getitemamount($val){
    global $w;
    $k = mysqli_query($w,"select amount from paycatbreakdown where breakdownid='$val'");
    $ji = mysqli_fetch_array($k);
    $amount = $ji['amount'];
    return $amount;
}

if ($action === "pullbillitems"){
    $descrip = validate("catsel");
    $j = "select * from paycatbreakdown where description = '$descrip'";
    $q = mysqli_query($w, $j);
    while ($qa = mysqli_fetch_array($q)){
        $id = $qa['breakdownid'];
        $remark = $qa['remark'];
        echo "<option value='$id'>$remark</option>";
    }
}

if ($action === "applydiscount"){
    $term = validate("term");
    $session = validate("session");
    $amount = validate("amount");
    $studentid = validate("stdid");
    $hyt = "insert into discount (session, term, amount,stdid) values ('$session','$term','$amount','$studentid')";
    echo $hyt;
    $qgt = mysqli_query($w,$hyt);
    if ($qgt){
        echo "Discount applied";
    }else{
        $qa = "update discount set amount = '$amount' where session='$session' and term='$term' and stdid='$studentid'";
        $jqa= mysqli_query($w,$qa);
        if ($jqa){
            echo "Updated";
        }else{
            echo "Not updated";
        }
    }
}

//action:"paymentlog", payment:amtpayed, item:billitem, session:session, term:term, studentid:stdname
if ($action === "paymentlog") {
    $payment = validate("payment");
    $item = validate("item");
    $session = validate("session");
    $term = validate("term");
    $studentid = validate("studentid");
    $datef = date("Y-m-d");
    $jh = mysqli_query($w, "insert into paymentsmade (itemid, amountpaid, stdid, term, session, datv) values ('$item','$payment','$studentid','$term','$session','$datef')");
    if ($jh) {
        echo "Saved";
    } else {
        echo "Not saved";
    }
}

if ($action === "createbill") {
    //classid:classid, studentname:studentname, session:session, term:term
    $classid = validate("classid");
    $studentid = validate("studentname");
    $schoolid = getschoolid($studentid);
    $studentnam = getstudentnamefromsn($studentid);
    $studentname = strtoupper($studentnam);
    $session = validate("session");
    $term = validate("term");
    $classname = getclassnamefromid($classid);
    $paybreakdown = $classname . " - " . $session;
    $g = "select * from paycatbreakdown where description = '$paybreakdown'";
    $ht = mysqli_query($w, $g);
    $gg = "<b>$studentname</b><br>$classname - $session($term)<br><table class='table-striped table-bordered' style='width:100%; font-size:14px'>";
    while ($gy = mysqli_fetch_array($ht)) {
        $remark = $gy['remark'];
        $amount = $gy['amount'];
        $paytype = $gy['paytype'];
        $itemid = $gy['breakdownid'];
        $checkid = "bill" . rand(255, 599);
        $gg .= "<tr><td style='padding:5px'><input type='checkbox' id='$checkid' onclick='calcbill(\"$studentid\", \"$session\", \"$term\", \"$classid\",\"$checkid\",\"$itemid\")' style='padding:5px'></td><td style='padding:5px;'>$remark</td><td style='padding:5px;'>$amount</td><td style='padding:5px;'>$paytype</td></tr>";
    }
    echo $gg . "</table><br><input type='button' class='btn-warning' value='Generate student bill' onclick='generatestdbill()'>";
}

if ($action === "addbillitem") {
    //studentid:studentid, session:session, term:term, classid:classid, itemid:itemid
    $studentid = validate("studentid");
    $session = validate("session");
    $term = validate("term");
    $classid = validate("classid");
    $itemid = validate("itemid");
    $itemamount = getbillitemamount($itemid);
    $gf = mysqli_query($w, "insert into payschoolbill (studentid, session, term, billitemid, billitemamount) "
            . "values ('$studentid','$session','$term','$itemid','$itemamount')");
    if ($gf) {
        echo "Bill saved";
    } else {
        echo "Not saved";
    }
}

function getapplieddiscount($term, $session, $stdid){
    global $w;
    $f = "select * from discount where stdid='$stdid' and session='$session' and term='$term'";
    $q = mysqli_query($w,$f);
    if (mysqli_num_rows($q)<1){
        return "<tr><td colspan='3' style='text-align:center'>No applied discount</td></tr>";
    }else{
        
    $xd = mysqli_fetch_array($q);
    $amount = $xd['amount'];
    $dateadd = $xd['dateadded'];
    return "<tr><td> N $amount</td><td>$dateadd</td></tr>";
    }
}

function getdiscount($term, $session, $stdid){
    global $w;
    $f = "select * from discount where stdid='$stdid' and session='$session' and term='$term'";
    $q = mysqli_query($w,$f);
    if (mysqli_num_rows($q)<1){
        return "<tr><td colspan='3' style='text-align:center'>No applied discount</td></tr>";
    }else{
        
    $xd = mysqli_fetch_array($q);
    $amount = $xd['amount'];
    $dateadd = $xd['dateadded'];
    return $amount;
    }
}

if ($action === "delinvitem"){
    $itemid = validate("itemid");
    $h = mysqli_query($w, "delete from payschoolbill where billitemid='$itemid'");
    if ($h){
        echo "Item removed";
    }else{
        echo "";
    }
}

if ($action === "getbillinvoice") {
    $classid = validate("classid");
    $stdname = validate("stdname");
    $term = validate("term");
    $session = validate("sessiond");
    $studentname = getstudentnamefromsn($stdname);
    $discount = getapplieddiscount($term, $session, $stdname);
    //echo "$classid $stdname $term $session";
    $ht = "select * from payschoolbill where studentid='$stdname' and term='$term' and session='$session'";
    $it = mysqli_query($w, $ht);
    $itg = "<div style='font-size:25px; font-weight:600'>$studentname $stdname</div><table class='table-striped table-bordered' style='width:100%'><tr style='font-weight:bold; font-size:15px'><td></td><td class='pdfive'>Description</td><td class='pdfive'>Bill</td><td class='pdfive'>Paid</td><td class='pdfive'></td><td class='pdfive'>Make payment</td><td></td></tr>";
    $count = 1;
    while ($gq = mysqli_fetch_array($it)) {
        $billitem = $gq['billitemid'];
        $amount = $gq['billitemamount'];
        $paymentmade = getpaymentmade($billitem, $session, $term, $stdname);
       
        $amtleft = $amount - $paymentmade;
         $paymentmade = number_format($paymentmade, 2);
        $hgt = rand(1111, 9999);
        $billname = getbillitem($billitem);
        $amount = number_format($amount, 2);
        $amtleft = number_format($amtleft, 2);
        $itg .= "<tr style='font-size:13px'><td class='pdfive'>$count</td><td class='pdfive'>$billname</td><td class='pdfive'>₦ $amount</td><td class='pdfive'>₦ $paymentmade</td><td class='pdfive'>₦ $amtleft </td><td class='pdfive'>₦ <input type='text' size='4' id='$hgt'>"
                . "<input type='button' onclick='makepay(\"$hgt\", \"$billitem\", \"$session\", \"$term\", \"$stdname\")' value='Pay'>&nbsp; <i class='fa fa-times ptr' title='Delete item' onclick='actinvdel(\"#billinv$billitem\")'></i></td><td><input id='billinv$billitem' style='display:none' type='button' class='btn btn-warning' value='Delete' onclick='deleteinvitem($billitem)'></td></tr>";
        $count++;
    }
    echo $itg . "</table><hr style='border-style:dashed; border-color:#ccc'>
    <table>
<tr>
<td>
<label>Discount</label><br>
    <input type='text' size='4' id='feesdiscount' class='form-control' style='width:110px; background-color:#fff; margin-bottom:5px'>
    <input type='button' value='Apply discount' class='btn btn-success' onclick='appdisc(feesdiscount.value, \"$term\", \"$session\",\"$stdname\")'>
</td>
<td style='width:50px'></td>
<td style='background-color:rgba(0,0,0,0.2); width:500px; vertical-align:top'>
<table style='width:100%' border='1'>
<tr style='text-align:center; font-size:12px; font-family:verdana'>
<td style='padding:5px'>Discount</td>
<td>Date Applied</td>
</tr>
<tr id='discapp'>
$discount
</tr>
</table>
</td>
</tr>
    </table>";
}

if ($action === "getbillinvoicet") {
    $classid = validate("classid");
    $stdname = validate("stdname");
    $term = validate("term");
    $session = validate("sessiond");
    $studentname = getstudentnamefromsn($stdname);
    $classname = getclassnamefromid($classid);
    $invoice = getinvoice($stdname, $term, $session);
    $ht = "<div><span style='font-size:25px; color:#005E8A'>$studentname</span> $classname<br> $session - $term</div><hr style='margin-top:0px; margin-bottom:10px; border-style:dashed; border-color:#005E8A'><div style='text-align:center; color:#005E8A; font-weight:bold; font-size:15px;'>PAYMENT TIMELINE</div>";
    echo $ht;
    $j = "select distinct(datv) from paymentsmade where stdid='$stdname' and term='$term' and session='$session'";
    //echo $j;
    $it = mysqli_query($w, $j);
    $hid = mysqli_num_rows($it);
    echo $invoice;
    echo "<div class='col-md-6'><span style='font-size:18px'>$hid payment dates</span>";
    $r = "";
    while ($ti = mysqli_fetch_array($it)) {
        $udate = $ti['datv'];
        $utv = "select * from paymentsmade where term='$term' and session='$session' and stdid='$stdname' and datv='$udate'";
        $hq = mysqli_query($w, $utv);
        $ut = mysqli_num_rows($hq);
        $o = "<table class='table-striped table-bordered' style='width:100%; font-size:12px'><tr style='font-size:14px; font-weight:600'><td></td><td style='padding:5px'>Item</td><td style='padding:5px'>Amount</td></tr>";
        $count = 1;
        if (mysqli_num_rows($hq) < 1) {
            $o .= "<tr><td colspan='3'></td></tr></table>";
        }
        while ($vd = mysqli_fetch_array($hq)) {
            $itemid = $vd['itemid'];
            $amountpaid = number_format($vd['amountpaid'],2);
            $item = getitemdescript($itemid);
            $o .= "<tr><td style='padding:5px'>$count</td><td style='padding:5px'>$item</td><td style='padding:5px'>₦ $amountpaid</td></tr>";
            $count++;
        }
        $o .= "</table>";
        $r .= "<details style='background-color:rgba(0,0,0,0.1); margin-top:10px'>"
                . "<summary style='background-color:#005E8A; padding:5px; color:#fff; cursor:pointer'>$udate</summary>"
                . "<div style='padding:5px'> $o</div>"
                . "</details>";
        
    }
    echo $r . "</div>";
}

function getinvoice($stdname, $term, $session){
    global $w;
    $g = mysqli_query($w, "select * from payschoolbill where term='$term' and session='$session' and studentid='$stdname'");
    $hit= "<div class='col-md-6' style='padding-right:0px'><table class='table-bordered' style='width:100%; margin-top:10px'><tr style='background-color:#005E8A; color:#fff'><td></td><td style='padding:5px'>Description</td><td style='padding:5px'>Bill</td></tr>";
    $count = 1;
    while ($hg = mysqli_fetch_array($g)){
        $billitemid = $hg['billitemid'];
        $billitem = getbillitem($billitemid);
        $billitemamount = number_format($hg['billitemamount'],2);
        $hit .= "<tr style='font-size:12px'><td>$count</td><td style='padding:5px'>$billitem</td><td style='padding:5px'>₦ $billitemamount</td></tr>";
        $count++;
    }
    return $hit ."</table></div>";
}

function getitemdescript($itemid) {
    global $w;
    $qg = "select * from paycatbreakdown where breakdownid='$itemid'";
    $gt = mysqli_query($w, $qg);
    $q = mysqli_fetch_array($gt);
    $remark = $q['remark'];
    return $remark;
}

function getpaymentmade($itemid, $session, $term, $stdname) {
    global $w;
    $j = "select * from paymentsmade where itemid='$itemid' and session='$session' and term='$term' and stdid='$stdname'";
    //return $j;
    $h = mysqli_query($w, $j);
    $g = 0;
    while ($it = mysqli_fetch_array($h)) {
        $itemamount = $it['amountpaid'];
        $g += $itemamount;
    }
    return $g;
}

if ($action === "getreceipt") {
    //classid: classid, studentname: studentname, session: session, term: term
    $studentid = validate("studentname");
    $session = validate("session");
    $term = validate("term");
    $classid = validate("classid");
    $discount = getdiscount($term, $session, $studentid);
    //$itemid = validate("itemid");
    $studentname = getstudentnamefromsn($studentid);
    $classname = getclassnamefromid($classid);
    $h = "select * from payschoolbill where studentid='$studentid' and session='$session' and term='$term'";
    $j = mysqli_query($w, $h);
    $hvf = "<div style='font-size:25px; margin-bottom:10px'>$studentname <span style='font-size:14px'>$classname<br> $session - $term</span></div><table class='table-bordered table-striped' style='width:100%; font-size:13px'><tr style='font-weight:bold'><td style='padding:3px; width:10px'>S/No</td><td style='padding:5px'>Descriptions</td><td style='padding:5px'>Amount</td><td>Remark</td></tr>";
    $count = 1;
    $totalamount = 0;
    while ($jc = mysqli_fetch_array($j)) {
        $billitemid = $jc['billitemid'];
        $billitem = getbillitem($billitemid);
        $billingtype = getbilltype($billitemid);
        $amount = $jc['billitemamount'];
        $totalamount += $amount;
        $amount = number_format($amount, 2);
        $hvf .= "<tr><td style='padding:5px'>$count</td><td style='padding:5px'><span>$billitem</span></td><td style='padding:5px'>&#8358; $amount</td><td style='padding:5px'>$billingtype</td></tr>";
        $count++;
    }
$hdf = $totalamount;
    $totalamount = number_format($totalamount, 2);
    $amtpaid = getamtpaid($studentid, $term, $session);
    $amtleft = $hdf - ($amtpaid + $discount);
    echo $hvf . "<tr style='font-size:15px; font-weight:bold'><td></td><td style='padding:5px'>TOTAL</td><td style='padding:5px'>&#8358; $totalamount</td><td></td></tr>

    <tr style='font-size:15px; font-weight:bold'><td></td><td style='padding:5px'>PAID</td><td style='padding:5px'>₦ $amtpaid</td><td></td></tr>
<tr style='font-size:15px; font-weight:bold'><td></td><td style='padding:5px'>Discount</td><td style='padding:5px'>₦ $discount</td><td></td></tr>
    <tr style='font-size:15px; font-weight:bold'><td></td><td style='padding:5px'>OUTSTANDING</td><td style='padding:5px'>₦ $amtleft</td><td></td></tr></table><br><div style='font-size:12px; font-weight:bold'>"
    . "<ul>"
    . "<li>All payments made are non-refundable</li>"
    . "<li>All fees must be paid not later than one week of resumption</li>"
    . "<li>SCHOOL BANK ACCOUNT<br>UBA PLC/HAVARD CHILDREN SCHOOL/ ACCT. NO: 1016191638</li>"
    . "<li>SCHOOL BANK ACCOUNT:<br>FIRST BANK OF NIGERIA(FBN)/HAVARD CHILDREN SCHOOL/ ACCT. NO: 2023557170</li>"
    . "</ul>"
    . "<div style='margin-top:20px; text-align:right'>"
    . "<span style='position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></span>"
    . "</div>"
    . "</div>";
}

if ($action === "getbill") {
    //classid: classid, studentname: studentname, session: session, term: term
    $studentid = validate("studentname");
    $session = validate("session");
    $term = validate("term");
    $classid = validate("classid");
    //$itemid = validate("itemid");
    $studentname = getstudentnamefromsn($studentid);
    $classname = getclassnamefromid($classid);
    $h = "select * from payschoolbill where studentid='$studentid' and session='$session' and term='$term'";
    $j = mysqli_query($w, $h);
    $hvf = "<div style='font-size:25px; margin-bottom:10px'>$studentname <span style='font-size:14px'>$classname<br> $session - $term</span></div><table class='table-bordered table-striped' style='width:100%; font-size:13px'><tr style='font-weight:bold'><td style='padding:3px; width:10px'>S/No</td><td style='padding:5px'>Descriptions</td><td style='padding:5px'>Amount</td><td>Remark</td></tr>";
    $count = 1;
    $totalamount = 0;
    while ($jc = mysqli_fetch_array($j)) {
        $billitemid = $jc['billitemid'];
        $billitem = getbillitem($billitemid);
        $amount = $jc['billitemamount'];
        $totalamount += $amount;
        $amount = number_format($amount, 2);

        $billingtype = getbilltype($billitemid);
        $hvf .= "<tr><td style='padding:5px'>$count</td><td style='padding:5px'><span>$billitem</span></td><td style='padding:5px'>&#8358; $amount</td><td>$billingtype</td></tr>";
        $count++;
    }

    $totalamount = number_format($totalamount, 2);
    echo $hvf . "<tr style='font-size:15px; font-weight:bold'><td></td><td style='padding:5px'>TOTAL</td><td style='padding:5px'>&#8358; $totalamount</td><td></td></tr></table><br><div style='font-size:12px; font-weight:bold'>"
    . "<ul>"
    . "<li>All payments made are non-refundable</li>"
    . "<li>All fees must be paid not later than one week of resumption</li>"
    . "<li>SCHOOL BANK ACCOUNT<br>UBA PLC/HAVARD CHILDREN SCHOOL/ ACCT. NO: 1016191638</li>"
    . "<li>SCHOOL BANK ACCOUNT:<br>FIRST BANK OF NIGERIA(FBN)/HAVARD CHILDREN SCHOOL/ ACCT. NO: 2023557170</li>"
    . "</ul>"
    . "<div style='margin-top:20px; text-align:right'>"
    . "<span style='position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></span>"
    . "</div>"
    . "</div>";
}
//getbilltype
function getbilltype($billitemid) {
    global $w;
    $h = "select paytype from paycatbreakdown where breakdownid='$billitemid'";
    $j = mysqli_query($w, $h);
    $sw = mysqli_fetch_array($j);
    $desc = $sw['paytype'];
    return $desc;
}

function getbillitem($billitemid) {
    global $w;
    $h = "select remark from paycatbreakdown where breakdownid='$billitemid'";
    $j = mysqli_query($w, $h);
    $sw = mysqli_fetch_array($j);
    $desc = $sw['remark'];
    return $desc;
}

if ($action === "removebillitem") {
    $studentid = validate("studentid");
    $session = validate("session");
    $term = validate("term");
    $classid = validate("classid");
    $itemid = validate("itemid");
    $tg = "DELETE from payschoolbill where studentid='$studentid' and billitemid='$itemid' and session='$session'";
    $hg = mysqli_query($w, $tg);
    if ($hg) {
        echo "Item removed";
    }
}

function getbillitemamount($itemid) {
    global $w;
    $a = "select amount from paycatbreakdown where breakdownid = '$itemid'";
    $z = mysqli_query($w, $a);
    $k = mysqli_fetch_array($z);
    $amount = $k['amount'];
    return $amount;
}

function getclassnamefromid($id) {
    global $w;
    $g = "select ClassName from schclass where SN='$id'";
    $as = mysqli_query($w, $g);
    $t = mysqli_fetch_array($as);
    $classname = $t['ClassName'];
    return $classname;
}
