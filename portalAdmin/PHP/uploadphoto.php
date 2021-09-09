<?php

include 'databaseSQLconnectn.php';

$stdid = $_POST['stdid'];
$pImage = $_FILES['imgtoupload']['name'];
$fileTmpLoc = $_FILES['imgtoupload']['tmp_name'];
$pfileSize = $_FILES['imgtoupload']['size'];
$pfileErrorMsg = $_FILES['imgtoupload']['error'];
$pfileType = $_FILES['imgtoupload']['type'];

$picturefolder = "images/passportphoto/$pImage";
$picturefoldersave = "images/passportphoto/$pImage";

if ($pfileType === "image/jpeg" || $pfileType === "image/gif" || $pfileType === "image/png" || $pfileType === "image/jpg") {
    $ws = move_uploaded_file($fileTmpLoc, $picturefolder);
    if ($ws) {
        $statmnt = "update schstudent set passportphoto='$picturefolder' where StudentID='$stdid'";
        $q = mysqli_query($w,$statmnt)or die("This query is ill");
        if ($q) {
            echo "$picturefolder";
        } else {
            echo "Image uploaded but path not saved<br>";
        }
    } else {
        echo "Not uploaded<br>";
    }
} else {
    echo "File type not supported<br>";
}