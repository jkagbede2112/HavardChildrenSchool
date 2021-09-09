<?php

    include 'databaseSQLconnectn.php';
    include 'validateinput.php';

$action = $_POST['action'];
$reportcard = $_POST['reportcard'];
$reportcard = str_replace("id =","", $reportcard);
$reportcard = str_replace("id=","", $reportcard);
//$reportcard = preg_replace('/(<([^>]*))(id=("[^"]*"|[^" >]*))/','', $reportcard);
$classid = $_POST['classid'];
$restype = $_POST['restype'];
$stdid = $_POST['stdid'];
$sess = $_POST['sess'];
$term = $_POST['term'];
$reportentities = $reportcard;
//echo $reportentities;
//Save report card NEW APPROACH
$randomname = rand(500,999).chr(rand(80,100));
if ($term === "1st Term"){
	$tu = "1st";
}
if ($term === "2nd Term"){
	$tu = "2nd";
}
if ($term === "3rd Term"){
	$tu = "3rd";
}

if ($restype === "midterm"){
	$htg = "mt";
}else{
	$htg = "ft";
}

$my_db= "/PHP/RP/".$stdid.$classid.$tu.".txt";
$my_file= $_SERVER['DOCUMENT_ROOT']."HCS/portalAdmin/PHP/RP/".$htg.$stdid.$classid.$tu.".txt";

$handle = fopen($my_file,'w');
//writing to the file
$q = fwrite($handle, $reportentities);
if ($q){
	echo "Saved";
}
fclose($handle);
//echo "Written";
//

$savereport = "insert into oldreports (reportcard,classid,resulttype,studentid, session, term) values ('$my_file','$classid','$restype','$stdid','$sess','$term')";

$ht = mysqli_query($w,$savereport);
if ($ht){
	echo "Saved";
}else{
	$gt = "update oldreports set reportcard ='$my_file' where classid='$classid' and resulttype='$restype' and session='$sess' and term='$term'";
	$qa = mysqli_query($w,$gt);
	if ($qa){
		echo "Updated";
	}else{
		echo "Not updated";
	}
}

//$reportdecentities = html_entity_decode($reportentities);

//reportcard:reportcard, classid:classid, restype:restype, stdid:studentid, sess:sess, term:term


?>