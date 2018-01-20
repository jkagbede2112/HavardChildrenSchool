<?php

include 'databaseSQLconnectn.php';
//echo "We here";
$p = $_POST['pV'];
//echo $p;
//$p = 1;
$offset = 0;
if ($p === "1") {
    $count = 0;
    $limit = 5;
    $off = 5;

        $query = mysqli_query($w,"select * from parentsregister");
        $num = mysqli_num_rows($query);
        $pages = ceil($num / $limit);
        //echo $pages;

        while ($count < $pages) {
            $offset += $off;
            echo "<span class=\"pl\" id=\"p$count\" onclick=\"paginate($limit,$offset,'#p$count')\">" . ($count + 1) . "</span>";
            $count++;
        }

} elseif ($p === "2") {
    $limit = $_POST['limit'];
    //$limit = 2;
    $off = $_POST['offset'] - 5;
    //$off = 2;
    $numtoshow = 5;

    $query = mysqli_query($w,"select * from parentsregister limit $limit offset $off");

    while ($rez1 = mysqli_fetch_array($query)) {
        if ($rez1['emailnotification'] === "1") {
            $notification = "N";
        } else {
            $notification = "Y";
        }
        $pID = $rez1['ParentID'];
        $links = mysqli_query($w,"select * from linkages where parentID ='$pID'");
        $linkages = mysqli_num_rows($links);
        
        if ($rez1['status'] === "1") {
            $status = "<i class='fa fa-times ptr de' title='Deactivate' onclick='deactPar(\"$pID\")'></i> Active";
        } else {
            $status = "<i class='fa fa-check ptr ac' title='Activate' onclick='actPar(\"$pID\")'></i> Inactive";
        }
        
        $qry = mysqli_query($w,"select * from linkages where ParentID='$pID' and Status = '1'");
        $n = mysqli_num_rows($qry);

        echo "<td>" . $rez1['ParentName'] . "</td><td>" . $notification . "</td><td>" . $rez1['phoneNumber'] . "</td><td>" . $rez1['Email'] . "</td><td>" . $status . "</td><td>".$n."/" . $linkages . " <a style=\"padding:1px\" class=\"btn\" data-toggle='modal' data-target='.bs-example-modal-sm' onclick =\"viewAttaches('$pID')\">View</a></td></tr>";
    }
}
