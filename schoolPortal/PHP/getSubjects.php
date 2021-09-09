<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

$searchKind = $_POST['searchKind'];

function pullatt($stdid, $sess, $term) {
    global $w;
    $g = "select * from attendancesheet where studentid='$stdid' and session='$sess' and term='$term'";
    //
    $j = mysqli_query($w, $g) or die("Badly written code");
    $b = mysqli_fetch_array($j);
    $de = $b['daysenrolled'];
    $present = $b['present'];
    $absent = $b['absent'];
    return "<b>DE -</b> $de, <b>DP -</b> $present, <b>DA -</b> $absent";
}

/*
  function getatt($qtype, $term, $stdid, $sess) {
  global $w;
  if ($qtype === "days enrolled") {
  $k1 = "select daysenrolled from attendancesheet where studentid='$stdid' and session='$sess' and term='1st Term'";
  $h1 = mysqli_query($w, $k1);
  $g1 = mysqli_fetch_array($h1);
  $de1 = $g1['daysenrolled'];

  $k2 = "select daysenrolled from attendancesheet where studentid='$stdid' and session='$sess' and term='2nd Term'";
  $h2 = mysqli_query($w, $k2);
  $g2 = mysqli_fetch_array($h2);
  $de2 = $g2['daysenrolled'];

  $k3 = "select daysenrolled from attendancesheet where studentid='$stdid' and session='$sess' and term='3rd Term'";
  $h3 = mysqli_query($w, $k3);
  $g3 = mysqli_fetch_array($h3);
  $de3 = $g3['daysenrolled'];
  return "</td><td>Days enrolled</td><td>$de1</td><td>$de2</td><td>$de3</td></tr>";
  }
  if ($qtype === "daysabsent") {
  $k1 = "select absent from attendancesheet where studentid='$stdid' and session='$sess' and term='1st Term'";
  $h1 = mysqli_query($w, $k1);
  $g1 = mysqli_fetch_array($h1);
  $de1 = $g1['absent'];

  $k2 = "select absent from attendancesheet where studentid='$stdid' and session='$sess' and term='2nd Term'";
  $h2 = mysqli_query($w, $k2);
  $g2 = mysqli_fetch_array($h2);
  $de2 = $g2['absent'];

  $k3 = "select absent from attendancesheet where studentid='$stdid' and session='$sess' and term='3rd Term'";
  $h3 = mysqli_query($w, $k3);
  $g3 = mysqli_fetch_array($h3);
  $de3 = $g3['absent'];
  return "</td><td>Days absent</td><td>$de1</td><td>$de2</td><td>$de3</td></tr>";
  }
  if ($qtype === "dayspresent") {
  $k1 = "select present from attendancesheet where studentid='$stdid' and session='$sess' and term='1st Term'";
  $h1 = mysqli_query($w, $k1);
  $g1 = mysqli_fetch_array($h1);
  $de1 = $g1['present'];

  $k2 = "select present from attendancesheet where studentid='$stdid' and session='$sess' and term='2nd Term'";
  $h2 = mysqli_query($w, $k2);
  $g2 = mysqli_fetch_array($h2);
  $de2 = $g2['present'];

  $k3 = "select present from attendancesheet where studentid='$stdid' and session='$sess' and term='3rd Term'";
  $h3 = mysqli_query($w, $k3);
  $g3 = mysqli_fetch_array($h3);
  $de3 = $g3['present'];
  return "</td><td>Days absent</td><td>$de1</td><td>$de2</td><td>$de3</td></tr>";
  }
  }
 * 
 */

if ($searchKind === "pullsubs") {
    $classid = $_POST['classid'];
    $g = "select * from subjects where SubjectCategoryid = '$classid' order by SubjectName asc";
    $y = mysqli_query($w, $g);
    while ($gd = mysqli_fetch_array($y)) {
        $subject = $gd['SubjectName'];
        $subid = $gd['sn'];
        echo "<option value='$subid'>$subject</option>";
    }
    //echo "<option>Mathematics</option>";
}


if ($searchKind === "pullattendance") {
    $classid = validate("classid");
    $session = validate("sessionid");
    //get all students in classid
    $k = "select * from schstudent where ClassID='$classid'";
    $a = mysqli_query($w, $k);
    $count = 1;
    while ($d = mysqli_fetch_array($a)) {
        $studentname = $d['Surname'] . " " . $d['Firstname'];
        $studentid = $d['schoolid'];
        $firstterm = pullatt($studentid, $session, '1st Term');
        $secondterm = pullatt($studentid, $session, '2nd Term');
        $thirdterm = pullatt($studentid, $session, '3rd Term');
        echo "<tr style='font-size:12px'><td>$count</td><td style='font-size:14px'>$studentname ($studentid)</td><td>$firstterm</td><td>$secondterm</td><td>$thirdterm</td></tr>";
        $count++;
    }
}

if ($searchKind === "putresult") {
    //searchKind: searchKind, stdid: stdid, term: stdterm, session:stdsession
    $stdid = validate("stdid");
    $term = validate("term");
    $session = validate("session");
    $classid = getclassidfromschid($stdid);
    $schooltype = getschooltype($classid);
    //echo "$schooltype";
    if ($schooltype === "Playgroup") {
        $table = "playnurresult";
        $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
        $aq = mysqli_query($w, $o);
        $studentname = getstudentname($stdid);
        $class = getclassname($classid);
        $prep = "<div style='font-size:20px'>$studentname</div>$class ($term)";
        while ($hq = mysqli_fetch_array($aq)) {
            $subjectgroupid = $hq['Subjectgroup'];
            $subjectgroupname = getsubjectgroupname($subjectgroupid);

            $termsess = $session . " " . $term;
            $prep .= "<table class='table table-condensed table-bordered'><tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='4'>$subjectgroupname </td></tr>";
            $s = "select * from subjects where Subjectgroup='$subjectgroupid'";
            $gt = mysqli_query($w, $s);
            $cnt = 1;
            while ($q = mysqli_fetch_array($gt)) {
                $subjectname = $q['SubjectName'];
                $subjectid = $q['sn'];
                //Check current result
                $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
                $result = getresult($classid, $session, $term, $stdid, $subjectid);
                $nuropts = "<select class='form-control' onchange='putnurez(\"nurez$cnt\",this.value, \"$stdid\", \"$subjectid\", \"$term\", \"$session\", \"$classid\")'><option>--</option><option></option><option>1</option><option>2</option><option>3</option><option>4</option><option>X</option><option>N</option><option>S</option><option>E</option><option>I</option></select>";
                //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
                $prep .= "<tr style='font-size:13px; font-family:verdana'><td style='width:20px'>$cnt</td><td>$subjectname</td><td style='width:60px' id='nurez$cnt'>$result</td><td style='width:60px'>$nuropts</td></tr>";
                $cnt++;
            }
        }
        echo $prep . "</table>";
    }
    if ($schooltype === "Reception") {
        $table = "playnurresult";
        $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
        $aq = mysqli_query($w, $o);
        $studentname = getstudentname($stdid);
        $class = getclassname($classid);
        $prep = "<div style='font-size:20px'>$studentname</div>$class ($term)";
        while ($hq = mysqli_fetch_array($aq)) {
            $subjectgroupid = $hq['Subjectgroup'];
            $subjectgroupname = getsubjectgroupname($subjectgroupid);

            $termsess = $session . " " . $term;
            $prep .= "<table class='table table-condensed table-bordered'><tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='4'>$subjectgroupname </td></tr>";
            $s = "select * from subjects where Subjectgroup='$subjectgroupid'";
            $gt = mysqli_query($w, $s);
            $cnt = 1;
            while ($q = mysqli_fetch_array($gt)) {
                $subjectname = $q['SubjectName'];
                $subjectid = $q['sn'];
                //Check current result
                $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
                $result = getresult($classid, $session, $term, $stdid, $subjectid);
                $nuropts = "<select class='form-control' onchange='putnurez(\"nurez$cnt\",this.value, \"$stdid\", \"$subjectid\", \"$term\", \"$session\", \"$classid\")'><option>--</option><option></option><option>1</option><option>2</option><option>3</option><option>4</option><option>X</option><option>N</option><option>S</option><option>E</option><option>I</option></select>";
                //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
                $prep .= "<tr style='font-size:13px; font-family:verdana'><td style='width:20px'>$cnt</td><td>$subjectname</td><td style='width:60px' id='nurez$cnt'>$result</td><td style='width:60px'>$nuropts</td></tr>";
                $cnt++;
            }
        }
        echo $prep . "</table>";
    }
    //$g = "select * from "
}

if ($searchKind === "saveatt") {
    //action:"saveatt",classid:classid, stdname:attname, term:attterm, sess:attsess, enrolled:daysenrolled, absent:daysabsent, present:dayspresent
    $classid = validate("classid");
    $stdname = validate("stdname");
    $term = validate("term");
    $session = validate("sess");
    $daysenrolled = validate("enrolled");
    $absent = validate("absent");
    $present = validate("present");

    //echo "$classid $stdname $term $session $daysenrolled $absent $present";
//Save attendance
    $p = "insert into attendancesheet (studentid, classid, daysenrolled, present, absent, session, term) values ('$stdname','$classid','$daysenrolled','$present','$absent','$session','$term')";

    $k = mysqli_query($w, $p);
    if ($k) {
        echo "Attendance saved";
    } else {
        $q = "update attendancesheet set absent ='$absent', present ='$present', daysenrolled='$daysenrolled' where studentid='$stdname' and session='$session' and term='$term'";
        //echo $q;
        $h = mysqli_query($w, $q);
        if ($h) {
            //echo $q;
            echo "Updated";
        } else {
            echo "Attendance not saved";
        }
    }
}

if ($searchKind === "filter") {
    $values = $_POST['value'];
    $fa = mysqli_query($w, "select * from subjects where SubjectCategoryid ='$values' order by SubjectName ASC");
    if (mysqli_num_rows($fa) < 1) {
        echo "No Records found";
    } else {
        $counter = 1;
        while ($ad = mysqli_fetch_array($fa)) {
            $subjectID = $ad['SubjectID'];
            $ada = $ad["sn"];
            $ddaa = mysqli_query($w, "select * from subjects where SubjectID='$subjectID'");
            if (mysqli_num_rows($ddaa) > 0) {
                $hgh = mysqli_fetch_array($ddaa);
                $subcode = $hgh['subjectcode'];
                $id = $hgh['TeacherID'];
                $subjectTeacher = getteachersnamefromid($id);
                if (strlen($subcode) > 2) {
                    echo "<tr><td><b>" . $counter . "</b></td><td></td><td>$subcode -" .
                    $ad['SubjectName'] . "</td><td>" . $subjectTeacher .
                    "</td><td><span onclick=\"updateSubject('$ada')\" class='point'>update</span></td><td>"
                    . "<i class='point fa fa-close' onclick=\"deleteSubject('$ada')\"></i></td></tr>";
                } else {
                    echo "<tr><td><b>" . $counter . "</b></td><td></td><td>" .
                    $ad['SubjectName'] . "</td><td>" . $subjectTeacher .
                    "</td><td><span onclick=\"updateSubject('$ada')\" class='point'>update</span></td><td>"
                    . "<i class='point fa fa-close' onclick=\"deleteSubject('$ada')\"></i></td></tr>";
                }

                $counter++;
            } else {
                $hgh = mysqli_fetch_array($ddaa);
                //$subjectTeacher = $hgh['TeacherName'];
                echo "<tr><td><b>" . $counter . "</b></td><td></td><td>" .
                $ad['SubjectName'] . "</td><td style='color:#ff0000; font-size:10px'>Unassigned</td>"
                . "<td onclick='updateSubject(\"$ada\")' class='point'>update</td><td>"
                . "<i class='point fa fa-close' onclick='deleteSubject(\"$ada\")'></i></td></tr>";
                $counter++;
            }
        }
    }
}

if ($searchKind === "all") {
    $fa = mysqli_query($w, "select * from subjects order by SubjectCategoryid ASC");
    if (mysqli_num_rows($fa) < 1) {
        echo "No Records found";
    } else {
        $counter = 1;
        while ($ad = mysqli_fetch_array($fa)) {
            $subjectID = $ad['SubjectID'];
            $ada = $ad["sn"];
            $ju = "select * from subjects";
            $ddaa = mysqli_query($w, $ju);
            //echo $ju;
            if (mysqli_num_rows($ddaa) > 0) {
                $hgh = mysqli_fetch_array($ddaa);
                $teacherID = $hgh['TeacherID'];
                //$class = getclass()

                if (strlen($teacherID) < 1) {
                    echo "<tr><td><b>" . $counter . "</b></td><td></td><td>" .
                    $ad['SubjectName'] . "</td><td><span style='color:#ff0000'>Unassigned" .
                    "<span></td><td><span onclick=\"updateSubject('$ada')\" class='point'>update</span></td><td>"
                    . "<i class='point fa fa-close' onclick=\"deleteSubject('$ada')\"></i></td></tr>";
                } else {
                    $sdada = mysqli_query($w, "select * from schstaff where StaffID='$teacherID'");
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
}

if ($searchKind === "search") {
    $value = $_POST['value'];
    $fa = mysqli_query($w, "select * from subjects where SubjectName like '%$value%' order by SubjectCategory ASC");
    if (mysqli_num_rows($fa) < 1) {
        echo "No Records found";
    } else {
        $counter = 1;
        while ($ad = mysqli_fetch_array($fa)) {
            $subjectID = $ad['SubjectID'];
            $ada = $ad["sn"];
            $ddaa = mysqli_query($w, "select * from subjectteachers where SubjectID='$subjectID'");
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

if ($searchKind === "getstds") {

    $classid = validate("classid");

    $j = "select * from schstudent where ClassID='$classid'";
    $ha = mysqli_query($w, $j);
    while ($q = mysqli_fetch_array($ha)) {
        $schoolid = $q['schoolid'];
        $stdname = $q['Surname'] . " " . $q['Firstname'];
        echo "<option value='$schoolid'>$stdname</option>";
    }
}