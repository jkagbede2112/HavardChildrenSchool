<?php

include 'databaseSQLconnectn.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$searchKind = $_POST['searchKind'];

if ($searchKind === "filter") {
    $values = $_POST['value'];
    $fa = mysqli_query($w,"select * from subjects where SubjectCategory ='$values' order by SubjectName ASC");
    if (mysqli_num_rows($fa) < 1) {
        echo "No Records found";
    } else {
        $counter = 1;
        while ($ad = mysqli_fetch_array($fa)) {
            $subjectID = $ad['SubjectID'];
            $ada = $ad["sn"];
            $ddaa = mysqli_query($w,"select * from subjectteachers where SubjectID='$subjectID'");
            if (mysqli_num_rows($ddaa) > 0) {
                $hgh = mysqli_fetch_array($ddaa);
                $subjectTeacher = $hgh['TeacherName'];
                echo "<tr><td><b>" . $counter . "</b></td><td>" . $ad['SubjectCategory'] . "</td><td>" .
                $ad['SubjectName'] . "</td><td>" . $subjectTeacher .
                "</td><td><span onclick=\"updateSubject('$ada')\" class='point'>update</span></td><td>"
                . "<i class='point fa fa-close' onclick=\"deleteSubject('$ada')\"></i></td></tr>";
                $counter++;
            } else {
                $hgh = mysqli_fetch_array($ddaa);
                //$subjectTeacher = $hgh['TeacherName'];
                echo "<tr><td><b>" . $counter . "</b></td><td>" . $ad['SubjectCategory'] . "</td><td>" .
                $ad['SubjectName'] . "</td><td style='color:#ff0000; font-size:10px'>Unassigned</td>"
                . "<td onclick='updateSubject(\"$ada\")' class='point'>update</td><td>"
                . "<i class='point fa fa-close' onclick='deleteSubject(\"$ada\")'></i></td></tr>";
                $counter++;
            }
        }
    }
} elseif ($searchKind === "all") {
    $fa = mysqli_query($w,"select * from subjects order by SubjectCategory ASC");
    if (mysqli_num_rows($fa) < 1) {
        echo "No Records found";
    } else {
        $counter = 1;
        while ($ad = mysqli_fetch_array($fa)) {
            $subjectID = $ad['SubjectID'];
            $ada = $ad["sn"];
            $ddaa = mysqli_query($w,"select * from subjects where SubjectID = '$subjectID'");
            if (mysqli_num_rows($ddaa) > 0) {
                $hgh = mysqli_fetch_array($ddaa);
                $teacherID = $hgh['TeacherID'];
                
                if (strlen($teacherID) < 1) {
                    echo "<tr><td><b>" . $counter . "</b></td><td>" . $ad['SubjectCategory'] . "</td><td>" .
                    $ad['SubjectName'] . "</td><td><span style='color:#ff0000'>Unassigned".
                    "<span></td><td><span onclick=\"updateSubject('$ada')\" class='point'>update</span></td><td>"
                    . "<i class='point fa fa-close' onclick=\"deleteSubject('$ada')\"></i></td></tr>";
                } else {
                    $sdada = mysqli_query($w,"select * from schstaff where StaffID='$teacherID'");
                    $jjkj = mysqli_fetch_array($sdada);
                    $TeacherName = $jjkj['StaffName'];
                    echo "<tr><td><b>" . $counter . "</b></td><td>" . $ad['SubjectCategory'] . "</td><td>" .
                    $ad['SubjectName'] . "</td><td>" . $TeacherName .
                    "</td><td><span onclick=\"updateSubject('$ada')\" class='point'>update</span></td><td>"
                    . "<i class='point fa fa-close' onclick=\"deleteSubject('$ada')\"></i></td></tr>";
                }

                $counter++;
            } else {
                $hgh = mysqli_fetch_array($ddaa);
                //$subjectTeacher = $hgh['TeacherName'];
                echo "<tr><td><b>" . $counter . "</b></td><td>" . $ad['SubjectCategory'] . "</td><td>" .
                $ad['SubjectName'] . "</td><td style='color:#ff0000; font-size:10px'>Unassigned</td>"
                . "<td onclick='updateSubject(\"$ada\")' class='point'>update</td><td>"
                . "<i class='point fa fa-close' onclick='deleteSubject(\"$ada\")'></i></td></tr>";
                $counter++;
            }
        }
    }
} elseif ($searchKind === "search") {
    $value = $_POST['value'];
    $fa = mysqli_query($w,"select * from subjects where SubjectName like '%$value%' order by SubjectCategory ASC");
    if (mysqli_num_rows($fa) < 1) {
        echo "No Records found";
    } else {
        $counter = 1;
        while ($ad = mysqli_fetch_array($fa)) {
            $subjectID = $ad['SubjectID'];
            $ada = $ad["sn"];
            $ddaa = mysqli_query($w,"select * from subjectteachers where SubjectID='$subjectID'");
            if (mysqli_num_rows($ddaa) > 0) {
                $hgh = mysqli_fetch_array($ddaa);
                $subjectTeacher = $hgh['TeacherName'];
                echo "<tr><td><b>" . $counter . "</b></td><td>" . $ad['SubjectCategory'] . "</td><td>" .
                $ad['SubjectName'] . "</td><td>" . $subjectTeacher .
                "</td><td><span onclick=\"updateSubject('$ada')\" class='point'>update</span></td><td>"
                . "<i class='point fa fa-close' onclick=\"deleteSubject('$ada')\"></i></td></tr>";
                $counter++;
            } else {
                $hgh = mysqli_fetch_array($ddaa);
                //$subjectTeacher = $hgh['TeacherName'];
                echo "<tr><td><b>" . $counter . "</b></td><td>" . $ad['SubjectCategory'] . "</td><td>" .
                $ad['SubjectName'] . "</td><td style='color:#ff0000; font-size:10px'>Unassigned</td>"
                . "<td onclick='updateSubject(\"$ada\")' class='point'>update</td><td>"
                . "<i class='point fa fa-close' onclick='deleteSubject(\"$ada\")'></i></td></tr>";
                $counter++;
            }
        }
    }
}