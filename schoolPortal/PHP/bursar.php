<?php

include "databaseSQLconnectn.php";
//action:action, catname:catname, catdesc:description

$action = $_POST["action"];

if ($action === "addcategory") {
    $catname = $_POST["catname"];
    $desc = $_POST["catdesc"];
    $sessiond = $_POST['catsession'];

   $ki = "insert into paymentcategory (paymentname, session, paymentdescription) values ('$catname','$sessiond','$desc')";
   $qa = mysqli_query($w,$ki);
   if ($qa){
       echo "Saved";
   }else{
       echo "Not saved";
   }
}
//action:action, cat:cat, catitem:catitem, catamount:catamount, catpaytype:catpaytype
if ($action === "addfeebreakdown"){
    $categoryid = $_POST['cat'];//e.gPrimary, Nursery,
    $catitem = $_POST['catitem'];//e.g Tuition, Lesson fee,
    $catamount = $_POST['catamount'];//e.g 24000, 45000
    $catpaytype = $_POST['catpaytype'];//Terminal, sessional, Optional, Mandatory
    
    $ql = "insert into paycatbreakdown (description, amount, remark, paytype) values ('$categoryid','$catamount','$catitem','$catpaytype')";
    echo $ql;
    $qz = mysqli_query($w, $ql);
    if ($qz){
        echo "Category saved";
    }else{
        echo "Category not saved";
    }
}