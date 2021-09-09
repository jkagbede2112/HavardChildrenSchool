<?php

/*
 * 
 * formData.append("signaturephoto", signaturephoto);
                                                formData.append("staffid", id);
 */
include 'databaseSQLconnectn.php';

$staffid = $_POST['staffid'];
$pImage = $_FILES['signaturephoto']['name'];
$fileTmpLoc = $_FILES['signaturephoto']['tmp_name'];
$pfileSize = $_FILES['signaturephoto']['size'];
$pfileErrorMsg = $_FILES['signaturephoto']['error'];
$pfileType = $_FILES['signaturephoto']['type'];

$picturefolder = "images/teachersignature/$pImage";
$picturefoldersave = "images/teachersignature/$pImage";

if ($pfileType === "image/jpeg" || $pfileType === "image/gif" || $pfileType === "image/png" || $pfileType === "image/jpg") {
    $ws = move_uploaded_file($fileTmpLoc, $picturefolder);
    if ($ws) {
        $statmnt = "update schstaff set signature='$picturefolder' where StaffID='$staffid'";
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