<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

$classid = validate("ascc");
$subjectcat = validate("ascsc");

$hjf = "insert into subjectcat (schooltypeid, subjectcatname) values ('$classid','$subjectcat')";
$jc = mysqli_query($w,$hjf);
if ($jc){
    echo "Saved";
}else{
    echo "Not saved";
}

/*
 * $d = mysqli_query($w, "select catid, subjectcatname from subjectcat order by subjectcatname asc");
 *                                      while ($a = mysqli_fetch_array($d)) {
                                            $catid = $a['catid'];
                                            echo "<option value='$catid'>" . $a['subjectcatname'] . "</option>";
                                        }
 */