<?php

include 'PHP/databaseSQLconnectn.php';

$qcx = mysqli_query($w,"select * from playnurresult");
$ju = mysqli_num_rows($qcx);
echo "Total records $ju <br><br>";

$q = "select * from playnurresult group by studentid, classid, subjectid having count(*)>1";
$cd = mysqli_query($w,$q);
$h = mysqli_num_rows($cd);
echo "Duplicate records $h";
$ht = "<table style='width:100%;' border='1'><tr><td>id</td><td>stdid</td><td>classid</td><td>term</td><td>session</td><td>SubjectID</td><td>Result</td><td></td></tr>";
while ($hg = mysqli_fetch_array($cd)){

    $id = $hg['id'];
    $classid = $hg['classid'];
    $studentid = $hg['studentid'];
    $session = $hg['session'];
    $subjectid = $hg['subjectid'];
    $result = $hg['result'];
    $term = $hg['term'];

    $j = "delete from playnurresult where id='$id'";
    $asd = mysqli_query($w,$j);
    $ht .=  "<tr><td>$id</td><td>$classid</td><td>$term</td><td>$session</td><td>$subjectid</td></td><td>$result</td><td>Deleterec('$id')</td></tr>";
    
}
echo $ht ."</table>";