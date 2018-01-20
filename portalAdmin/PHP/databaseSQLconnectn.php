<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
mysql_connect("localhost","ogooluwa","6z7L9it2zH") or die ("<center><font style='color:red'><b>Cannot find host</b></font></center>");
mysql_select_db("ogooluwa_OOMC") or die ("<center><font style='color:red'><b>Cannot locate database</b></font></center>");
*/
$w = mysqli_connect("localhost","root","") or die ("<center><font style='color:red'><b>Cannot find host</b></font></center>");
mysqli_select_db($w, "HCS") or die ("<center><font style='color:red'><b>Cannot locate database</b></font></center>");

$schoolname = "Havard Children School";