<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$searchCriteria = $_POST['searchCriteria'];

try {
    if ($searchCriteria === "All" || $searchCriteria === "Everyone") {
        $query = mysqli_query($w,"select * from parentsregister LIMIT 5");
        while ($rez1 = mysqli_fetch_array($query)) {
            if ($rez1['emailnotification'] === "1") {
                $notification = "N";
            } else {
                $notification = "Y";
            }
            $pID = $rez1['ParentID'];
            $links = mysqli_query($w,"select * from linkages where ParentID ='$pID'");
            $linkages = mysqli_num_rows($links);

            if ($rez1['status'] === "1") {
                $status = "<i class='fa fa-times ptr de' title='Deactivate' onclick='deactPar(\"$pID\")'></i> Active";
            } else {
                $status = "<i class='fa fa-check ptr ac' title='Activate' onclick='actPar(\"$pID\")'></i> Inactive";
            }

            $qry = mysqli_query($w,"select * from linkages where ParentID='$pID' and Status = '1'");
            $n = mysqli_num_rows($qry);

            echo "<td>" . $rez1['ParentName'] . "</td><td>" . $notification . "</td><td>" . $rez1['phoneNumber'] . "</td><td><i class='fa fa-envelope-o ptr' data-toggle=\"modal\" data-target=\"#emailspecificParents\" onclick='mlP(\"$pID\")' style='color:#00A5F4'></i>  - " . $rez1['Email'] . "</td><td>" . $status . "</td><td>" . $n . "/" . $linkages . " <a style=\"padding:1px\" data-toggle='modal' data-target='#viewPattaches' class=\"btn\" onclick =\"viewAttaches('$pID')\">View</a></td></tr>";
        }
    } elseif ($searchCriteria === "JSS1" || $searchCriteria === "JSS2" || $searchCriteria === "JSS3" || $searchCriteria === "SSS1" || $searchCriteria === "SSS2" || $searchCriteria === "SSS3") {
        $sql = mysqli_query($w,"select StudentID from schstudent where ClassID='$searchCriteria'");
        $count = 0;
        while ($g = mysqli_fetch_array($sql)) {
            $SID = $g['StudentID'];
            //echo $SID . " - ";

            $getPID = mysqli_query($w,"select ParentID from linkages where StudentID ='$SID'");
            while ($GPID = mysqli_fetch_array($getPID)) {
                $TID = $GPID['ParentID'];

                $links = mysqli_query($w,"select * from linkages where ParentID ='$TID'");
                $linkages = mysqli_num_rows($links);

                $qry = mysqli_query($w,"select * from linkages where ParentID='$TID' and Status = '1'");
                $n = mysqli_num_rows($qry);

                $getParents = mysqli_query($w,"select * from parentsregister where ParentID='$TID'");


                while ($rez1 = mysqli_fetch_array($getParents)) {
                    $pID = $rez1['ParentID'] ;
                    if ($rez1['emailnotification'] === "1") {
                        $notification = "N";
                    } else {
                        $notification = "Y";
                    }
                    if ($rez1['status'] === "1") {
                        $status = "<i class='fa fa-times ptr de' title='Deactivate' onclick='deactPar(\"$pID\")'></i> Active";
                    } else {
                        $status = "<i class='fa fa-check ptr ac' title='Activate' onclick='actPar(\"$pID\")'></i> Inactive";
                    }
                    echo "<td>" . $rez1['ParentName'] . "</td><td>" . $notification . "</td><td>" . $rez1['phoneNumber'] . "</td><td><i class='fa fa-envelope-o ptr' data-toggle=\"modal\" data-target=\"#emailspecificParents\" onclick='mlP(\"$pID\")' style='color:#00A5F4'></i>  - " . $rez1['Email'] . "</td><td>" . $status . "</td><td>" . $n . "/" . $linkages . " <a style=\"padding:1px\" data-toggle='modal' data-target='.bs-example-modal-sm' class=\"btn\" onclick =\"viewAttaches('$TID')\">View</a></td></tr>";
                }
            }
        }
    } else {
        $v = "select * from parentsregister where ParentName like '%$searchCriteria%'";
        $query = mysqli_query($w,$v);
        while ($rez1 = mysqli_fetch_array($query)) {
             $pID = $rez1['ParentID'];
            if ($rez1['emailnotification'] === "1") {
                $notification = "N";
            } else {
                $notification = "Y";
            }
            if ($rez1['status'] === "1") {
                $status = "<i class='fa fa-times ptr de' title='Deactivate' onclick='deactPar(\"$pID\")'></i> Active";
            } else {
                $status = "<i class='fa fa-check ptr ac' title='Activate' onclick='actPar(\"$pID\")'></i> Inactive";
            }
           
            $links = mysqli_query($w,"select * from linkages where ParentID ='$pID'");
            $linkages = mysqli_num_rows($links);

            $qry = mysqli_query($w,"select * from linkages where ParentID='$pID' and Status = '1'");
            $n = mysqli_num_rows($qry);

            echo "<td>" . $rez1['ParentName'] . "</td><td>" . $notification . "</td><td>" . $rez1['phoneNumber'] . "</td><td><i class='fa fa-envelope-o ptr' data-toggle=\"modal\" data-target=\"#emailspecificParents\" onclick='mlP(\"$pID\")' style='color:#00A5F4'></i>  - " . $rez1['Email'] . "</td><td>" . $status . "</td><td>" . $n . "/" . $linkages . " <a style=\"padding:1px\" data-toggle='modal' data-target='.bs-example-modal-sm' class=\"btn\" onclick =\"viewAttaches('$pID')\">View</a></td></tr>";
        }
    }
} catch (Exception $e) {
    echo "Application is busy";
}
