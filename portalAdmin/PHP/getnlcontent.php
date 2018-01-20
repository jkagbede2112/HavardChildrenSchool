<?php
include 'databaseSQLconnectn.php';
include 'validateinput.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$sn = validate("pullc");

$d = mysqli_query($w,"select * from newsletters where sn='$sn'");
$s = mysqli_fetch_array($d);
$z = $s['content'];
$a = $s['subject'];
$h = $s['datesent'];

$content= "<br/><font style='font-size:14px; font-weight:bold'>".$a . "</font><br/><br/>" .$z;

echo "<g>".$h."</g><br/><f>".$content."</f>";