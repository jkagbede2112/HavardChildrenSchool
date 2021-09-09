<?php

include 'databaseSQLconnectn.php';

//term:term, session:session, resdate:resdate
$term = $_POST['term'];
$session = $_POST['session'];
$resdate = $_POST['resdate'];

//echo "$term and $session and $resdate";
$j = "insert into schoolresumes (term, session, nextermbegins) values ('$term', '$session', '$resdate')";
$qa = mysqli_query($w,$j);
if ($qa){
    echo "Resumption saved";
}else{
	$ht = "update schoolresumes set nextermbegins='$resdate' where term='$term' and session='$session'";
	$gt = mysqli_query($w,$ht);
	if ($gt){
		echo "Updated";
	}else{
		echo "Not updated";
	}
}