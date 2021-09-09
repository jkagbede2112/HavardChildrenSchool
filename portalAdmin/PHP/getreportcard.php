<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

$madamsignature = "madamsignature.jpg";
$action = validate("action");

function getpromotestat($stdid, $session) {
    global $w;
    $qa = "select comment from promotedtable where studentid='$stdid' and session='$session'";
    $qad = mysqli_query($w, $qa);
    $j = mysqli_fetch_array($qad);
    $comment = $j['comment'];
    $pres = "<tr><td style='text-align:center' colspan='3'><h4><b>$comment</b></h4></td></tr>";
    return $pres;
}

if ($action === "getoldstds") {
    //action:action, sess:sess, term:term, classid:classid}
    $sess = validate("sess");
    $term = validate("term");
    $classid = validate("classid");
//echo "<option>$sess $term $classid</option>";
    $gt = "select distinct(studentid) from oldreports where session='$sess' and term='$term' and classid='$classid'";
    $ht = mysqli_query($w, $gt);
    while ($ju = mysqli_fetch_array($ht)) {
        $studentid = $ju['studentid'];
        $studentname = getstudentname($studentid);
        echo "<option value='$studentid'>$studentname</option>";
    }
}

if ($action === "getoldreport") {
    //session: sess, resulttype: resulttype, term: term, studentid: studentid
    $session = validate("session");
    $term = validate("term");
    $studentid = validate("studentid");
    $resulttype = validate("resulttype");

    if ($resulttype === "midterm") {
        $gt = "select * from oldreports where session='$session' and term='$term' and studentid='$studentid' and resulttype='midterm'";
    } else {
        $gt = "select * from oldreports where session='$session' and term='$term' and studentid='$studentid' and resulttype!='midterm'";
    }
    $jq = mysqli_query($w, $gt);
    if (mysqli_num_rows($jq) < 1) {
        echo "No reports found";
        return;
    }
    $jy = mysqli_fetch_array($jq);
    $reportcard = $jy['reportcard'];
    //Opening a file
    $my_file = '$reportcard';
    try {
        if (file_exists($reportcard)) {

            $handle = fopen("$reportcard", "r");
            fclose($handle);
            $handlea = file_get_contents("$reportcard");
            echo $handlea;
        } else {
            echo "File not found";
        }
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }

    $reportmatter = $reportcard;
}

if ($action === "getdemograph") {
    //studentid: stdid, session: sess, term: term
    $stdid = validate("studentid");
    $session = validate("session");
    $term = validate("term");
    $StudentName = strtoupper(getstudentname($stdid));
    $classid = getclassidfromschid($stdid);
    $classname = getclassname($classid);
    $stdinclass = getstdcount($classid);
    $teachername = getteachername($classid);
    $proprietressname = getproprietress();
    echo "<a>$stdid</a><b>$StudentName</b><c>$term</c><d>$stdinclass</d><e>$classname</e><f>$session</f><g>$teachername</g><h>$proprietressname</h>";
}

function getde($stdid, $sess) {
    global $w;
    $q = mysqli_query($w, "select * from attendancesheet where studentid='$stdid' and session='$sess' and term='1st Term'");
    $a = mysqli_fetch_array($q);
    $de1 = $a['daysenrolled'];
    $da1 = $a['absent'];
    $dp1 = $a['present'];

    $q = mysqli_query($w, "select * from attendancesheet where studentid='$stdid' and session='$sess' and term='2nd Term'");
    $aq = mysqli_fetch_array($q);
    $de2 = $aq['daysenrolled'];
    $da2 = $aq['absent'];
    $dp2 = $aq['present'];

    $q = mysqli_query($w, "select * from attendancesheet where studentid='$stdid' and session='$sess' and term='3rd Term'");
    $ad = mysqli_fetch_array($q);
    $de3 = $ad['daysenrolled'];
    $da3 = $ad['absent'];
    $dp3 = $ad['present'];

    return "<tr><td style='text-align:left'>Days Enrolled</td><td>$de1</td><td>$de2</td><td>$de3</td></tr><tr><td style='text-align:left'>Days Absent</td><td>$da1</td><td>$da2</td><td>$da3</td></tr><tr><td style='text-align:left'>Days Present</td><td>$dp1</td><td>$dp2</td><td>$dp3</td></tr>";
}

if ($action === "reportcardattendance") {
    $stdid = validate("stdid");
    $sess = validate("sess");
    $term = validate("term");
    $de = getde($stdid, $sess);
    echo $de;
}

if ($action === "putplaygroup") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $classid = getclassidfromschid($stdid);

    $table = "playnurresult";
    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
    $aq = mysqli_query($w, $o);
    $prep = "<table class='table table-condensed table-bordered'><tr style='font-size:15px; font-weight:bold'><td></td><td>Subject</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td></tr>";
    while ($hq = mysqli_fetch_array($aq)) {
        $subjectgroupid = $hq['Subjectgroup'];
        $subjectgroupname = getsubjectgroupname($subjectgroupid);
        $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='5'>$subjectgroupname </td></tr>";
        $s = "select * from subjects where Subjectgroup='$subjectgroupid'";
        $gt = mysqli_query($w, $s);
        $cnt = 1;
        while ($q = mysqli_fetch_array($gt)) {
            $subjectname = $q['SubjectName'];
            $subjectid = $q['sn'];
            //Check current result
            $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
            //$result = getresult($classid, $session, $term, $stdid, $subjectid);
            $firsttermresult = getresult($classid, $session, '1st Term', $stdid, $subjectid);
            $secondtermresult = getresult($classid, $session, '2nd Term', $stdid, $subjectid);
            $thirdtermresult = getresult($classid, $session, '3rd Term', $stdid, $subjectid);
            //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
            $prep .= "<tr style='font-size:13px; font-family:verdana'><td style='width:20px'>$cnt</td><td>$subjectname</td><td style='width:60px; text-align:center' id='nurez$cnt'>$firsttermresult</td><td style='width:60px; text-align:center'>$secondtermresult</td><td style='text-align:center'>$thirdtermresult</td></tr>";
            $cnt++;
        }
    }
    echo $prep . "</table>";
}

if ($action === "playschool") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $classid = getclassidfromschid($stdid);
    if ($term === "3rd Term") {
        $pr = getpromotestat($stdid, $session);
    } else {
        $pr = "";
    }
    $table = "playnurresult";
    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
    $aq = mysqli_query($w, $o);
    $prep = "<table class='table table-condensed table-bordered'><tr style='font-size:15px; font-weight:bold'><td></td><td>Subject</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td></tr>";
    $sp = 1;
    while ($hq = mysqli_fetch_array($aq)) {

        $resulttype = "";
        $subjectgroupid = $hq['Subjectgroup'];
        $subjectgroupname = getsubjectgroupname($subjectgroupid);
        $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='5'>$subjectgroupname </td></tr>";
        $s = "select * from subjects where Subjectgroup='$subjectgroupid'";
        $gt = mysqli_query($w, $s);
        $cnt = 1;
        while ($q = mysqli_fetch_array($gt)) {
            $subjectname = $q['SubjectName'];
            $subjectid = $q['sn'];
            $si = $subjectid;
            //Check current result
            $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
            //$result = getresult($classid, $session, $term, $stdid, $subjectid);
            $firsttermresult = getresult($classid, $session, '1st Term', $stdid, $subjectid);
            $secondtermresult = getresult($classid, $session, '2nd Term', $stdid, $subjectid);
            $thirdtermresult = getresult($classid, $session, '3rd Term', $stdid, $subjectid);
            $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana'><td style='width:20px'>$cnt</td><td style='padding:5px'><span>$subjectname</span></td><td>"
                    . "<center>$firsttermresult</center></td><td>"
                    . "<center>$secondtermresult</td><td style='text-align:center'><center>$thirdtermresult</center></td></tr>";
            $cnt++;
        }
        $sp++;
    }
    echo $prep . "</tbody></table>";
    //Get all comments
    $medal = getclasmedal($stdid, $term, $session);
    $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
    $othercomment = getothercomment($stdid, $term, $session);
    $proprietresscomment = getproprietresscomment($stdid, $term, $session);
    $nextterm = nexterm($term, $session);
    $teacherid = getteacheridfromstudentid($stdid);
    $teachersignature = getteachersignature($classid);
    $proprietress = getproprietresssignature();
    //$proprietress
    $comments = "<table style='width:100%; margin-top:20px; font-size:12px'><tr><td></td><td></td><td></td><td></td><td></td></tr>";
    $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px' colspan='5'><b>Teacher's comment :</b> $teachercomment</td></tr>";
    $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment</td><td></td></tr>$pr</table><div style='margin-top:40px'><span style='background-color:rgba(0,0,0,0.2) !important; padding:3px'>Next Term begins : $nextterm</span></div><div style='margin-top:60px'><span style='display:inline-block; text-align:center; margin-right:50px'><span style='position:relative;'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:400px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></div>";
    echo $comments;
}

function getteachersignature($classid) {
    //return $classid;
    global $w;
    //return $classid;
    $t = "select ClassTeacher from schclass where SN='$classid'";
    //return $t;
    $classteacher = mysqli_query($w, $t);
    $az = mysqli_fetch_array($classteacher);
    $teacherid = $az['ClassTeacher'];

    //Get signature
    $jut = "select signature from schstaff where StaffID = '$teacherid'";
    $hq = mysqli_query($w, $jut);
    $uq = mysqli_fetch_array($hq);
    $signature = $uq['signature'];

    return "PHP/" . $signature;
    /*
      global $w;
      $j = "select signature from schstaff where StaffID='$teacherid'";
      $h = mysqli_query($w,$j);
      $qa = mysqli_fetch_array($h);
      $sign = $qa['signature'];
      return $j;
     * 
     */
}

if ($action === "reception") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $classid = getclassidfromschid($stdid);
    $resulttype = "";
    if ($term === "3rd Term") {
        $pr = getpromotestat($stdid, $session);
    } else {
        $pr = "";
    }
    $table = "playnurresult";
    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
    $aq = mysqli_query($w, $o);
    $prep = "<table class='table table-condensed table-bordered'><tr style='font-size:15px; font-weight:bold'><td></td><td>Subject</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td></tr>";
    while ($hq = mysqli_fetch_array($aq)) {
        $subjectgroupid = $hq['Subjectgroup'];
        $subjectgroupname = getsubjectgroupname($subjectgroupid);
        $prep .= "<tr style='font-weight:bold; font-size:12px'><td colspan='5'><div style='background-color:#ccc !important; '>$subjectgroupname</div></td></tr>";
        $s = "select * from subjects where Subjectgroup='$subjectgroupid'";
        $gt = mysqli_query($w, $s);
        $cnt = 1;
        while ($q = mysqli_fetch_array($gt)) {
            $subjectname = $q['SubjectName'];
            $subjectid = $q['sn'];
            //Check current result
            $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
            //$result = getresult($classid, $session, $term, $stdid, $subjectid);
            $firsttermresult = getresult($classid, $session, '1st Term', $stdid, $subjectid);
            $secondtermresult = getresult($classid, $session, '2nd Term', $stdid, $subjectid);
            $thirdtermresult = getresult($classid, $session, '3rd Term', $stdid, $subjectid);
            //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
            $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana'><td style='width:20px'>$cnt</td><td>$subjectname</td><td style='width:60px; text-align:center' id='nurez$cnt'>$firsttermresult</td><td style='width:60px; text-align:center'>$secondtermresult</td><td style='text-align:center'>$thirdtermresult</td></tr>";
            $cnt++;
        }
    }
    echo $prep . "</table>";
    //Get all comments
    $medal = getclasmedal($stdid, $term, $session);
    $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
    $othercomment = getothercomment($stdid, $term, $session);
    $proprietresscomment = getproprietresscomment($stdid, $term, $session);
    $nextterm = nexterm($term, $session);
    $teachersignature = getteachersignature($classid);
    $teacherid = getteacheridfromstudentid($stdid);
    $comments = "<table style='width:100%; margin-top:20px; font-size:12px'><tr><td></td><td></td><td></td><td></td><td></td></tr>";
    $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px' colspan='5'><b>Teacher's comment :</b> <input value='$teachercomment' style='width:600px; border-style:none' placeholder='Teacher comment here' onblur='teacherscomment(\"$teacherid\",\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
    $comments .= "<tr class='tcmnt'><td style='padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment</td><td></td></tr>$pr</table><div style='margin-top:10px'><span style='background-color:rgba(0,0,0,0.2) !important; padding:3px'>Next Term begins : $nextterm</span><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:400px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:-20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></div>";
    echo $comments;
}

if ($action === "nursery1") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    //echo "$session $term $stdid";
    if ($term === "3rd Term") {
        $pr = getpromotestat($stdid, $session);
    } else {
        $pr = "";
    }
    $resulttype = "";
    $classid = getclassidfromschid($stdid);
    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
    //echo $o;
    $aq = mysqli_query($w, $o);
    $prep = "<table class='table table-condensed table-bordered'>"
            . "<tr style='font-size:15px; font-weight:bold'><td></td><td>Subject</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td></tr>";
    while ($hq = mysqli_fetch_array($aq)) {
        $subjectgroupid = $hq['Subjectgroup'];
        $subjectgroupname = getsubjectgroupname($subjectgroupid);
        $prep .= "<tr style=' font-weight:bold; font-size:12px'><td colspan='5'><div style='background-color:#ccc !important;'>$subjectgroupname </div></td></tr>";
        $s = "select * from subjects where Subjectgroup='$subjectgroupid'";
        //echo $s;
        $gt = mysqli_query($w, $s);
        $cnt = 1;
        while ($q = mysqli_fetch_array($gt)) {
            $subjectname = $q['SubjectName'];
            $subjectid = $q['sn'];
            //Check current result
            $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
            //$result = getresult($classid, $session, $term, $stdid, $subjectid);
            $firsttermresult = getresult($classid, $session, '1st Term', $stdid, $subjectid);
            $secondtermresult = getresult($classid, $session, '2nd Term', $stdid, $subjectid);
            $thirdtermresult = getresult($classid, $session, '3rd Term', $stdid, $subjectid);
            //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
            $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana'><td style='width:20px'>$cnt</td><td>$subjectname</td><td style='width:60px; text-align:center' id='nurez$cnt'>$firsttermresult</td><td style='width:60px; text-align:center'>$secondtermresult</td><td style='text-align:center'>$thirdtermresult</td></tr>";
            $cnt++;
        }
    }
    echo $prep . "</table>";
    //Get all comments
    $medal = getclasmedal($stdid, $term, $session);
    $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
    $othercomment = getothercomment($stdid, $term, $session);
    $teachersignature = getteachersignature($classid);
    $proprietresscomment = getproprietresscomment($stdid, $term, $session);
    $nextterm = nexterm($term, $session);
    $comments = "<table style='width:100%; margin-top:10px; font-size:14px'><tr><td></td><td></td><td></td><td></td></tr>";
    $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px'>Class medal</td><td colspan='4'>$medal</td></tr>";
    $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px'>Other Observation/Comment</td><td colspan='4'>$othercomment</td></tr>";
    $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px'>Teacher's comment</td><td colspan='4'>$teachercomment</td></tr>";
    $comments .= "<tr class='tcmnt'><td  colspan='5' style=' padding:5px'><span style='font-weight:600'>Proprietress' comments :</span> $proprietresscomment</td></tr>$pr</table><div style='margin-top:10px'><span style='background-color:rgba(0,0,0,0.2) !important; padding:3px'>Next Term begins : $nextterm</span><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:400px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:-20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></div>";
    echo $comments;
}

if ($action === "nursery2") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $classid = getclassidfromschid($stdid);
    $resulttype = validate("restype");
    if ($term === "3rd Term") {
        $pr = getpromotestat($stdid, $session);
    } else {
        $pr = "";
    }
    if ($resulttype === "fullterm") {
        $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
        //echo "$term is well";
        $aq = mysqli_query($w, $o);
        if ($term === "1st Term") {
            $prep = "<table class='table table-condensed table-bordered'>"
                    . "<tr style='font-size:13px; font-weight:bold; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>$term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        }
        if ($term === "2nd Term") {
            $prep = "<table class='table table-condensed table-bordered'>"
                    . "<tr style='font-size:13px; font-weight:bold; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>1st Term</td><td>2nd Term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        }
        if ($term === "3rd Term") {
            $prep = "<table class='table table-condensed table-bordered'>"
                    . "<tr style='font-size:13px; font-weight:bold; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        }

        $supval = 1;
        while ($hq = mysqli_fetch_array($aq)) {
            $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='12' style='padding:5px'></td></tr>";
            $s = "select * from subjects where SubjectCategoryid='$classid'";
            //echo $s;
            $gt = mysqli_query($w, $s);
            $cnt = 1;
            while ($q = mysqli_fetch_array($gt)) {
                $subjectname = $q['SubjectName'];
                $subjectid = $q['sn'];
                //Check current result
                $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
                //$result = getresult($classid, $session, $term, $stdid, $subjectid);
                $code = getsubcode($subjectid);
                //getresultg($classid, $session, $term, $reslttype, $stdid, $subid)
                $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subjectid);
                $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subjectid);
                $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subjectid);
                $exam = getresultexam($classid, $session, $term, 'exam', $stdid, $subjectid);
                $total = $firstca + $secondca + $thirdca;
                $averagescore = getaveragesubjectscore($classid, $session, $term, $subjectid);
                $highestscore = gethighestscore($classid, $session, $term, $subjectid);
                $lowestscore = getlowestscore($classid, $session, $term, $subjectid);
                $totalwexam = $exam + $total;
                $mgrade = getfulltermgrade($totalwexam);
                $cummaverage = getcummaverage($term, $session, $classid, $stdid, $subjectid);
                /*
                 * function geta
                  $avscore = getavscore($session, $term, $subjectid);
                  $highscore = gethighscore($session, $term, $subjectid);
                  $lowscore = getlowscore($session, $term, $subjectid);
                  $cummaverage = cummaverage($session, $term, $subjectid);
                  $pry2grade = getgradewexamone($totalwexam); //getgrade($total);
                 * 
                 */
                //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
                if ($term === "1st Term") {
                    $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$totalwexam</td></tr>";
                }
                if ($term === "2nd Term") {
                    $firsttermscore = getresultexamterm($classid, $session, "1st Term", $stdid, $subjectid);
                    $average = ($firsttermscore + $totalwexam) / 2;
                    $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$firsttermscore</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$average</td></tr>";
                }
                if ($term === "3rd Term") {
                    $firsttermscore = getresultexamterm($classid, $session, "1st Term", $stdid, $subjectid);
                    $secondterm = getresultexamterm($classid, $session, "2nd Term", $stdid, $subjectid);
                    $average = number_format(($firsttermscore + $secondtermscore + $totalwexam) / 3, 2);
                    $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$firsttermscore</td><td>$secondterm</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$average</td></tr>";
                }
                $cnt++;
            }
            $supval++;
        }
        echo $prep . "</table><table style='width:100%'><tr style='background-color:#ccc !important'><td><div style='text-align:center; padding:5px; font-size:12px; font-weight:bold;letter-spacing: 1px;'>RATING : >=90 = A+, 80-89=A, 70-79=B, 60-69=C, 50-59=D, 40-49=E, Below 40= W</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
            $othercomment = getothercomment($stdid, $term, $session);
            $teachersignature = getteachersignature($classid);
            $proprietresscomments = getgradelevelproprietresscomment($resulttype, $stdid, $term, $session);
            $proprietresscomment = $proprietresscomments;
            $nextterm = nexterm($term, $session);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Teacher's comment :</b> $teachercomment</td></tr>";
            $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment </td></tr>$pr</table><div style='margin-top:10px' colspan='5'><span style='background-color:rgba(0,0,0,0.2) !important; padding:3px'>Next Term begins : $nextterm</span><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:400px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></div>";
            echo $comments;
        }
        return;
    }

    if ($resulttype === "midterm") {
        $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
        //echo $o;
        $aq = mysqli_query($w, $o);
        $prep = "<table class='table table-condensed table-bordered'>"
                . "<tr style='font-size:12px; text-align:center; font-weight:bold'><td></td><td>Subject</td><td>Code</td><td>1st CA <br>10</td><td>2nd CA <br> 10</td><td>3rd CA <br> 20</td><td>Total</td><td>Grade</td><td>Subject</td></tr>";
        $supval = 1;
        while ($hq = mysqli_fetch_array($aq)) {
            $subjectgroupid = $hq['Subjectgroup'];
            $subjectgroupname = getsubjectgroupname($subjectgroupid);
            $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='10' style='padding:5px'>$subjectgroupname </td></tr>";
            $s = "select * from subjects where SubjectCategoryid='$classid'";
            $gt = mysqli_query($w, $s);
            $cnt = 1;
            $add = "nur2";
            while ($q = mysqli_fetch_array($gt)) {
                $subjectname = $q['SubjectName'];
                $subjectid = $q['sn'];
                //Check current result
                $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
                //$result = getresult($classid, $session, $term, $stdid, $subjectid);
                $code = getsubcode($subjectid);
                $firstca = getresultgradelevel($classid, $session, $term, 'first', $stdid, $subjectid);
                $secondca = getresultgradelevel($classid, $session, $term, 'second', $stdid, $subjectid);
                $thirdca = getresultgradelevel($classid, $session, $term, 'third', $stdid, $subjectid);
                $total = $firstca + $secondca + $thirdca;
                $teacherid = getteacheridfromstudentid($stdid);
                $avescore = number_format((($total / 40) * 100), 2) . "%";
                $pry2grade = getgradeone($total); //getgrade($total);
                //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
                {
                    $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>"
                            . "<center>$firstca</center>"
                            . "</td><td style=''>"
                            . "<center>$secondca</center>"
                            . "</td><td>"
                            . "<center>$thirdca</center>"
                            . "</td><td>$total</td><td>$pry2grade</td><td>$avescore</td></tr>";
                    $cnt++;
                }
            }
            $supval++;
        }
        echo $prep . "</table><table style='width:100%'><tr style='background-color:#ccc; font-size:12px'><td><div style='text-align:center; padding:10px; font-weight:bold;letter-spacing: 1px;'>RATING : 35-40=A, 30-34=B, 25-29=C, 20-24=D, 0-19=Es</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercommentx = getteachercomment($stdid, $term, $session, $resulttype);
            $othercomment = getothercomment($stdid, $term, $session);
            $proprietresscomments = getgradelevelproprietresscomment($resulttype, $stdid, $term, $session);
            $proprietresscomment = $proprietresscomments;
            $teachersignature = getteachersignature($classid);
            $nextterm = nexterm($term, $session);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px' colspan='5'>Teacher's comment : $teachercommentx</td></tr>";
            $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment </td></tr></table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:400px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></div>";
            echo $comments;
        }
    }
}
/*
  function getfulltermgrade($score) {
  if ($score >= 90 and $score <= 100) {
  return "A+";
  }
  if ($score >= 80 and $score <= 89) {
  return "A";
  }
  if ($score >= 70 and $score <= 79) {
  return "B";
  }
  if ($score >= 60 and $score <= 69) {
  return "C";
  }
  if ($score >= 50 and $score <= 59) {
  return "D";
  }
  if ($score >= 40 and $score <= 49) {
  return "E";
  }
  if ($score < 40) {
  return "W";
  }
  }
 */

function getfulltermgrade($score) {
    if ($score >= 90 and $score <= 100) {
        return "A+";
    }
    if ($score >= 80 and $score <= 89) {
        return "A";
    }
    if ($score >= 70 and $score <= 79) {
        return "B";
    }
    if ($score >= 60 and $score <= 69) {
        return "C";
    }
    if ($score >= 50 and $score <= 59) {
        return "D";
    }
    if ($score >= 40 and $score <= 49) {
        return "E";
    }
    if ($score < 40) {
        return "W";
    }
}

function getresultgradelevel($classid, $session, $term, $reslttype, $stdid, $subid) {
    global $w;
    $h = "select result from playnurresult where classid='$classid' and session='$session' and term='$term' and firstsecondthirdexam='$reslttype' and studentid ='$stdid' and subjectid='$subid' order by dateadded desc";
//    echo $h;
    $g = mysqli_query($w, $h);
    $xs = mysqli_fetch_array($g);
    $result = $xs['result'];
    return $result;
}

if ($action === "jss") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $classid = getclassidfromschid($stdid);
    $resulttype = validate("resulttype");
    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid'";

    $aq = mysqli_query($w, $o);
//If result is midterm
    if ($resulttype === "midterm") {
        $prep = "<table class='table table-condensed table-bordered'>"
                . "<tr style='font-size:13px; text-align:center; font-weight:bold'><td></td><td>Subject</td><td>Code</td><td>1st CA <br>10</td><td>2nd CA <br> 20</td><td>3rd CA <br> 10</td><td>Total</td><td>Grade</td><td></td></tr>";
        $sc = 1;
        while ($hq = mysqli_fetch_array($aq)) {
            $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='10' style='padding:5px'>Hi there.. </td></tr>";
            $s = "select * from subjects where SubjectCategoryid='$classid'";
            //echo $s;
            $gt = mysqli_query($w, $s);
            $cnt = 1;
            while ($q = mysqli_fetch_array($gt)) {
                $subjectname = $q['SubjectName'];
                $subjectid = $q['sn'];
                //Check current result
                $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
                //$result = getresult($classid, $session, $term, $stdid, $subjectid);
                $code = getsubcode($subjectid);
                $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subjectid);
                $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subjectid);
                $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subjectid);
                $total = $firstca + $secondca + $thirdca;
                $pry2grade = getgradeone($total); //getgrade($total);
                $subpercent = (($total / 40) * 100) . "%";
                //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
                $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$firstca</td><td style=''>$secondca</td><td>$thirdca</td><td>$total</td><td>$pry2grade</td><td>$subpercent</td></tr>";
                $cnt++;
            }
            $sc++;
        }
        echo $prep . "</table><table style='width:100%'><tr style='background-color:#ccc !important'><td><div style='text-align:center; padding:5px; font-size:12px; font-weight:bold;letter-spacing: 1px;'>RATING : 36-40=A+, 32-35=A, 28-31=B, 24-27=C, 20-23=D, 16-19=E, 0-15=W</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
            $othercomment = getothercomment($stdid, $term, $session);
            $proprietresscomment = getgradelevelproprietresscomment($resulttype, $stdid, $term, $session);
            $teachersignature = getteachersignature($classid);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt' style='font-size:16px'><td style=' padding:5px' colspan='5'><b>Teacher's comment :</b> $teachercomment</td></tr>";
            $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment </td></tr></table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:400px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></div>";
            echo $comments;
        }
    }

    //If resulttype is terminal
    if ($resulttype === "terminal") {
        if ($term === "3rd Term") {
            $pr = getpromotestat($stdid, $session);
        } else {
            $pr = "";
        }
        if ($term === "1st Term") {
            $prep = "<table class='table table-condensed table-bordered'>"
                    . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>$term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        }
        if ($term === "2nd Term") {
            $prep = "<table class='table table-condensed table-bordered'>"
                    . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>1st Term</td><td>2nd Term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        }
        if ($term === "3rd Term") {
            $prep = "<table class='table table-condensed table-bordered'>"
                    . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        }
        $sc = 1;
        while ($hq = mysqli_fetch_array($aq)) {
            $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='12' style='padding:5px'></td></tr>";
            $s = "select * from subjects where SubjectCategoryid='$classid'";
            //echo $s;
            $gt = mysqli_query($w, $s);
            $cnt = 1;
            while ($q = mysqli_fetch_array($gt)) {
                $subjectname = $q['SubjectName'];
                $subjectid = $q['sn'];
                //Check current result
                $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
                //$result = getresult($classid, $session, $term, $stdid, $subjectid);
                $code = getsubcode($subjectid);
                $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subjectid);
                $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subjectid);
                $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subjectid);
                $exam = getresultg($classid, $session, $term, 'exam', $stdid, $subjectid);
                $total = $firstca + $secondca + $thirdca;
                $totalwexam = $exam + $total;
                //$avscore = getavscore($session, $term, $subjectid);
                $highscore = gethighscore($session, $term, $subjectid);
                $lowscore = getlowscore($session, $term, $subjectid);
                $cummaverage = cummaverage($session, $term, $subjectid);

                $averagescore = getaveragesubjectscore($classid, $session, $term, $subjectid);
                $highestscore = gethighestscore($classid, $session, $term, $subjectid);
                $lowestscore = getlowestscore($classid, $session, $term, $subjectid);
                $mgrade = getfulltermgrade($totalwexam);
                $av = ceil(($highestscore + $lowestscore) / 2);
                $cumscore = getcummaverage($term, $session, $classid, $stdid, $subjectid);

                $pry2grade = getgradewexamone($totalwexam); //getgrade($total);
                //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
                if ($term === "1st Term") {

                    $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$totalwexam</td></tr>";
                }
                if ($term === "2nd Term") {
                    $firsttermscore = getresultexamterm($classid, $session, "1st Term", $stdid, $subjectid);
                    if ($firsttermscore < 1) {
                        $average = $totalwexam;
                    } else {
                        $average = ($firsttermscore + $totalwexam) / 2;
                    }
                    $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$firsttermscore</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$average</td></tr>";
                }
                if ($term === "3rd Term") {
                    $firsttermscore = getresultexamterm($classid, $session, "1st Term", $stdid, $subjectid);
                    $secondterm = getresultexamterm($classid, $session, "2nd Term", $stdid, $subjectid);
                    if ($firsttermscore < 1) {
                        $average = ($secondtermscore + $totalwexam) / 2;
                    }
                    if ($secondtermscore < 1) {
                        $average = ($firsttermscore + $totalwexam) / 2;
                    } else {
                        $average = number_format(($firsttermscore + $secondtermscore + $totalwexam) / 3, 2);
                    }
                    $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$firsttermscore</td><td>$secondterm</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$average</td></tr>";
                }
                $cnt++;
            }
            $sc++;
        }
        echo $prep . "</table><table style='width:100%'><tr style='background-color:#ccc !important'><td><div style='text-align:center; padding:5px; font-size:12px; font-weight:bold;letter-spacing: 1px;'>RATING : >=90 = A+, 80-89=A, 70-79=B, 60-69=C, 50-59=D, 40-49=E, Below 40 = W</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
            $othercomment = getothercomment($stdid, $term, $session);
            $teachersignature = getteachersignature($classid);
            $proprietresscomment = getgradelevelproprietresscomment($resulttype, $stdid, $term, $session);
            $nextterm = nexterm($term, $session);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt' style='font-size:14px'><td style=' padding:5px' colspan='5'><b>Teacher's comment :</b> $teachercomment</td></tr>";
            $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment </td></tr></table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:400px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></div>";
            echo $comments;
        }
    }
}


if ($action === "sss") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $classid = getclassidfromschid($stdid);
    $resulttype = validate("resulttype");
    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid'";

    $aq = mysqli_query($w, $o);
//If result is midterm
    if ($resulttype === "midterm") {
        $prep = "<table class='table table-condensed table-bordered'>"
                . "<tr style='font-size:13px; text-align:center; font-weight:bold'><td></td><td>Subject</td><td>Code</td><td>1st CA <br>10</td><td>2nd CA <br> 20</td><td>3rd CA <br> 10</td><td>Total</td><td>Grade</td></tr>";
        $sc = 1;
        while ($hq = mysqli_fetch_array($aq)) {
            $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='10' style='padding:5px'></td></tr>";
            $s = "select * from subjects where SubjectCategoryid='$classid'";
            //echo $s;
            $gt = mysqli_query($w, $s);
            $cnt = 1;
            while ($q = mysqli_fetch_array($gt)) {
                $subjectname = $q['SubjectName'];
                $subjectid = $q['sn'];
                //Check current result
                $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
                //$result = getresult($classid, $session, $term, $stdid, $subjectid);
                $code = getsubcode($subjectid);
                $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subjectid);
                $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subjectid);
                $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subjectid);
                $total = $firstca + $secondca + $thirdca;
                $pry2grade = getgradewexamone(($total / 40) * 100); //getgrade($total);
                //$pry2grade = getjss($total); //getgrade($total);
                $subpercent = (($total / 40) * 100) . "%";
                //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
                //Check if subject is an exception
                $aww = "select * from subjectexceptions where stdid='$stdid' and subjectid='$subjectid' and session='$session' and classid='$classid'";
                $bww = mysqli_query($w, $aww);
                $cww = mysqli_fetch_array($bww);
                $exception = $cww['notoffered'];

                if ($total > 1) {
                    $prep .= "<tr style='font-size:13px; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>"
                            . "<center>$firstca</center>"
                            . "</td><td style=''>"
                            . "<center>$secondca</center>"
                            . "</td><td>"
                            . "<center>$thirdca</center>"
                            . "</td><td>$total</td><td>$pry2grade</td></tr>";
                    $cnt++;
                }
                // echo $aww . "<br> >> $exception << <br>";
                if (!isset($exception) || $exception === "1") {
                    
                } else {
                    
                }
            }
            $sc++;
        }
        echo $prep . "</table><table style='width:100%'><tr style='background-color:#ccc !important'><td><div style='text-align:center; padding:5px; font-size:12px; font-weight:bold;letter-spacing: 1px;'>RATING :36-40=A+, 32-35=A, 28-31=B, 24-27=C, 20-23=D, 16-19=E, 0-15=W</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
            $othercomment = getothercomment($stdid, $term, $session);
            $proprietresscomment = getgradelevelproprietresscomment($resulttype, $stdid, $term, $session);
            $teachersignature = getteachersignature($classid);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt' style='font-size:16px'><td style=' padding:5px' colspan='5'><b>Teacher's comment :</b> $teachercomment</td></tr>";
            $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment </td></tr></table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:400px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></div>";
            echo $comments;
        }
    }

    //If resulttype is terminal
    if ($resulttype === "terminal") {
        if ($term === "3rd Term") {
            $pr = getpromotestat($stdid, $session);
        } else {
            $pr = "";
        }
        if ($term === "1st Term") {
            $prep = "<table class='table table-condensed table-bordered'>"
                    . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>$term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        }
        if ($term === "2nd Term") {
            $prep = "<table class='table table-condensed table-bordered'>"
                    . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>1st Term</td><td>2nd Term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        }
        if ($term === "3rd Term") {
            $prep = "<table class='table table-condensed table-bordered'>"
                    . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        }
        $sc = 1;
        while ($hq = mysqli_fetch_array($aq)) {
            $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='12' style='padding:5px'></td></tr>";
            $s = "select * from subjects where SubjectCategoryid='$classid'";
            //echo $s;
            $gt = mysqli_query($w, $s);
            $cnt = 1;
            while ($q = mysqli_fetch_array($gt)) {
                $subjectname = $q['SubjectName'];
                $subjectid = $q['sn'];
                //Check current result
                $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
                //$result = getresult($classid, $session, $term, $stdid, $subjectid);
                $code = getsubcode($subjectid);
                $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subjectid);
                $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subjectid);
                $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subjectid);
                $exam = getresultg($classid, $session, $term, 'exam', $stdid, $subjectid);
                $total = $firstca + $secondca + $thirdca;
                $totalwexam = $exam + $total;
                //$avscore = getavscore($session, $term, $subjectid);
                $highscore = gethighscore($session, $term, $subjectid);
                $lowscore = getlowscore($session, $term, $subjectid);
                $cummaverage = cummaverage($session, $term, $subjectid);

                $averagescore = getaveragesubjectscore($classid, $session, $term, $subjectid);
                $highestscore = gethighestscore($classid, $session, $term, $subjectid);
                $lowestscore = getlowestscore($classid, $session, $term, $subjectid);
//$mgrade = getfulltermgrade($totalwexam);
                $mgrade = getgradewexamone($totalwexam);
                $av = ceil(($highestscore + $lowestscore) / 2);
                $cumscore = getcummaverage($term, $session, $classid, $stdid, $subjectid);

                $pry2grade = getgradewexamone($totalwexam); //getgrade($total);
                //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
                if ($term === "1st Term") {
                    if ($totalwexam > 0) {
                        $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$totalwexam</td></tr>";
                        $cnt++;
                    }
                }
                if ($term === "2nd Term") {
                    $firsttermscore = getresultexamterm($classid, $session, "1st Term", $stdid, $subjectid);
                    if ($firsttermscore < 1) {
                        $average = $totalwexam;
                    } else {
                        $average = ($firsttermscore + $totalwexam) / 2;
                    }
                    if ($totalwexam > 0) {
                        $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$firsttermscore</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$average</td></tr>";
                        $cnt++;
                    }
                }
                if ($term === "3rd Term") {
                    $firsttermscore = getresultexamterm($classid, $session, "1st Term", $stdid, $subjectid);
                    $secondterm = getresultexamterm($classid, $session, "2nd Term", $stdid, $subjectid);
                    if ($firsttermscore < 1) {
                        $average = ($secondtermscore + $totalwexam) / 2;
                    }
                    if ($secondtermscore < 1) {
                        $average = ($firsttermscore + $totalwexam) / 2;
                    } else {
                        $average = number_format(($firsttermscore + $secondtermscore + $totalwexam) / 3, 2);
                    }

                    if ($totalwexam > 0) {
                        $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$firsttermscore</td><td>$secondterm</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$average</td></tr>";
                        $cnt++;
                    } else {
                        
                    }
                }
            }
            $sc++;
        }
        echo $prep . "</table><table style='width:100%'><tr style='background-color:#ccc !important'><td><div style='text-align:center; padding:5px; font-size:12px; font-weight:bold;letter-spacing: 1px;'>RATING : >=90 = A+, 80-89=A, 70-79=B, 60-69=C, 50-59=D, 40-49=E, Below 40 = W</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
            $othercomment = getothercomment($stdid, $term, $session);
            $teachersignature = getteachersignature($classid);
            $proprietresscomment = getgradelevelproprietresscomment($resulttype, $stdid, $term, $session);
            $nextterm = nexterm($term, $session);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt' style='font-size:14px'><td style=' padding:5px' colspan='5'><b>Teacher's comment :</b> $teachercomment</td></tr>";
            $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment </td></tr></table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:400px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></div>";
            echo $comments;
        }
    }
}


if ($action === "grade") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $classid = getclassidfromschid($stdid);
    $resulttype = validate("resulttype");
    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid'";

    $aq = mysqli_query($w, $o);
//If result is midterm
    if ($resulttype === "midterm") {
        $prep = "<table class='table table-condensed table-bordered'>"
                . "<tr style='font-size:13px; text-align:center; font-weight:bold'><td></td><td>Subject</td><td>Code</td><td>1st CA <br>10</td><td>2nd CA <br> 10</td><td>3rd CA <br> 20</td><td>Total</td><td>Grade</td><td>Subject</td></tr>";
        $sc = 1;
        while ($hq = mysqli_fetch_array($aq)) {
            $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='10' style='padding:5px'></td></tr>";
            $s = "select * from subjects where SubjectCategoryid='$classid'";
            //echo $s;
            $gt = mysqli_query($w, $s);
            $cnt = 1;
            while ($q = mysqli_fetch_array($gt)) {
                $subjectname = $q['SubjectName'];
                $subjectid = $q['sn'];
                //Check current result
                $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
                //$result = getresult($classid, $session, $term, $stdid, $subjectid);
                $code = getsubcode($subjectid);
                $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subjectid);
                $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subjectid);
                $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subjectid);
                $total = $firstca + $secondca + $thirdca;
                $pry2grade = getgradeone($total); //getgrade($total);
                $subpercent = (($total / 40) * 100) . "%";
                //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
                $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$firstca</td><td style=''>$secondca</td><td>$thirdca</td><td>$total</td><td>$pry2grade</td><td>$subpercent</td></tr>";
                $cnt++;
            }
            $sc++;
        }
        echo $prep . "</table><table style='width:100%'><tr style='background-color:#ccc !important'><td><div style='text-align:center; padding:5px; font-size:12px; font-weight:bold;letter-spacing: 1px;'>RATING : 35-40=A, 30-34=B, 25-29=C, 20-24=D, 0-19=E</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
            $othercomment = getothercomment($stdid, $term, $session);
            $proprietresscomment = getgradelevelproprietresscomment($resulttype, $stdid, $term, $session);
            $teachersignature = getteachersignature($classid);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt' style='font-size:16px'><td style=' padding:5px' colspan='5'><b>Teacher's comment :</b> $teachercomment</td></tr>";
            $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment </td></tr></table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:400px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></div>";
            echo $comments;
        }
    }

    //If resulttype is terminal
    if ($resulttype === "terminal") {
        if ($term === "3rd Term") {
            $pr = getpromotestat($stdid, $session);
        } else {
            $pr = "";
        }
        if ($term === "1st Term") {
            $prep = "<table class='table table-condensed table-bordered'>"
                    . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>$term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        }
        if ($term === "2nd Term") {
            $prep = "<table class='table table-condensed table-bordered'>"
                    . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>1st Term</td><td>2nd Term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        }
        if ($term === "3rd Term") {
            $prep = "<table class='table table-condensed table-bordered'>"
                    . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        }
        $sc = 1;
        while ($hq = mysqli_fetch_array($aq)) {
            $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='12' style='padding:5px'></td></tr>";
            $s = "select * from subjects where SubjectCategoryid='$classid'";
            //echo $s;
            $gt = mysqli_query($w, $s);
            $cnt = 1;
            while ($q = mysqli_fetch_array($gt)) {
                $subjectname = $q['SubjectName'];
                $subjectid = $q['sn'];
                //Check current result
                $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
                //$result = getresult($classid, $session, $term, $stdid, $subjectid);
                $code = getsubcode($subjectid);
                $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subjectid);
                $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subjectid);
                $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subjectid);
                $exam = getresultg($classid, $session, $term, 'exam', $stdid, $subjectid);
                $total = $firstca + $secondca + $thirdca;
                $totalwexam = $exam + $total;
                //$avscore = getavscore($session, $term, $subjectid);
                $highscore = gethighscore($session, $term, $subjectid);
                $lowscore = getlowscore($session, $term, $subjectid);
                $cummaverage = cummaverage($session, $term, $subjectid);

                $averagescore = getaveragesubjectscore($classid, $session, $term, $subjectid);
                $highestscore = gethighestscore($classid, $session, $term, $subjectid);
                $lowestscore = getlowestscore($classid, $session, $term, $subjectid);
                $mgrade = getfulltermgrade($totalwexam);
                $av = ceil(($highestscore + $lowestscore) / 2);
                $cumscore = getcummaverage($term, $session, $classid, $stdid, $subjectid);

                $pry2grade = getgradewexamone($totalwexam); //getgrade($total);
                //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
                if ($term === "1st Term") {

                    $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$totalwexam</td></tr>";
                }
                if ($term === "2nd Term") {
                    $firsttermscore = getresultexamterm($classid, $session, "1st Term", $stdid, $subjectid);
                    if ($firsttermscore < 1) {
                        $average = $totalwexam;
                    } else {
                        $average = ($firsttermscore + $totalwexam) / 2;
                    }
                    $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$firsttermscore</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$average</td></tr>";
                }
                if ($term === "3rd Term") {
                    $firsttermscore = getresultexamterm($classid, $session, "1st Term", $stdid, $subjectid);
                    $secondterm = getresultexamterm($classid, $session, "2nd Term", $stdid, $subjectid);
                    if ($firsttermscore < 1) {
                        $average = ($secondtermscore + $totalwexam) / 2;
                    }
                    if ($secondtermscore < 1) {
                        $average = ($firsttermscore + $totalwexam) / 2;
                    } else {
                        $average = number_format(($firsttermscore + $secondtermscore + $totalwexam) / 3, 2);
                    }
                    $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$firsttermscore</td><td>$secondterm</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$average</td></tr>";
                }
                $cnt++;
            }
            $sc++;
        }
        echo $prep . "</table><table style='width:100%'><tr style='background-color:#ccc !important'><td><div style='text-align:center; padding:5px; font-size:12px; font-weight:bold;letter-spacing: 1px;'>RATING : >=90 = A+, 80-89=A, 70-79=B, 60-69=C, 50-59=D, 40-49=E, Below 40 = W</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
            $othercomment = getothercomment($stdid, $term, $session);
            $teachersignature = getteachersignature($classid);
            $proprietresscomment = getgradelevelproprietresscomment($resulttype, $stdid, $term, $session);
            $nextterm = nexterm($term, $session);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt' style='font-size:14px'><td style=' padding:5px' colspan='5'><b>Teacher's comment :</b> $teachercomment</td></tr>";
            $comments .= "<tr class='tcmnt' style='font-size:14px'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment</td></tr>$pr</table><div style='margin-top:10px; font-size:16px' colspan='5'><span style='background-color:rgba(0,0,0,0.2) !important; padding:3px'>Next Term begins : $nextterm</span><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:400px; display:inline-block; position:relative'><span style='position:absolute; bottom:25px; left:10px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></div>";
            echo $comments;
        }
    }
}

function getcummaverage($term, $session, $classid, $stdid, $subjectid) {
    $firsttermscore = getscore($classid, $session, "1st term", $stdid, $subjectid);
    $secondtermscore = getscore($classid, $session, "2nd term", $stdid, $subjectid);
    $thirdtermscore = getscore($classid, $session, "3rd term", $stdid, $subjectid);
    //getcummaverage($term, $session, $classid)
    if ($term === "1st Term") {
        return $firsttermscore;
    }
    if ($term === "2nd Term") {
        $average = ceil(($firsttermscore + $secondtermscore) / 2);
        return $average;
    }
    if ($term === "3rd Term") {
        $average = ceil(($firsttermscore + $secondtermscore + $thirdtermscore) / 3);
        return $average;
    }
}

function getscore($classid, $session, $term, $stdid, $subjectid) {
    $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subjectid);
    $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subjectid);
    $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subjectid);
    $exam = getresultexam($classid, $session, $term, 'exam', $stdid, $subjectid);
    $total = $firstca + $secondca + $thirdca + $exam;

    return $total;
}

function getresultg($classid, $session, $term, $reslttype, $stdid, $subid) {
    global $w;
    $h = "select result from playnurresult where classid='$classid' and session='$session' and term='$term' and firstsecondthirdexam='$reslttype' and studentid ='$stdid' and subjectid='$subid' order by dateadded desc";
    $g = mysqli_query($w, $h);
    $xs = mysqli_fetch_array($g);
    $result = $xs['result'];
    if (strlen($result) < 1) {
        $result = 0;
    }
    return $result;
}

function getlowestscore($classid, $session, $term, $subjectid) {
    global $w;
    $lowscore = 100;
    $gt = "select schoolid from schstudent where ClassID='$classid'";
    $uq = mysqli_query($w, $gt);
    while ($xd = mysqli_fetch_array($uq)) {
        $schoolid = $xd['schoolid'];
        $stdscore = getcummscore($schoolid, $classid, $session, $term, $subjectid);
        if ($stdscore < $lowscore && $stdscore > 0) {
            $lowscore = $stdscore;
        }
    }
    return $lowscore;
}

function gethighestscore($classid, $session, $term, $subjectid) {
    global $w;
    $highscore = 0;
    $gt = "select schoolid from schstudent where ClassID='$classid'";
    $uq = mysqli_query($w, $gt);
    while ($xd = mysqli_fetch_array($uq)) {
        $schoolid = $xd['schoolid'];
        $stdscore = getcummscore($schoolid, $classid, $session, $term, $subjectid);
        if ($stdscore > $highscore) {
            $highscore = $stdscore;
        }
    }
    return $highscore;
//$jt = "";
}

function getcummscore($stdid, $classid, $session, $term, $subjectid) {
    $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subjectid);
    $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subjectid);
    $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subjectid);
    $exam = getresultexam($classid, $session, $term, 'exam', $stdid, $subjectid);
    $total = $firstca + $secondca + $thirdca + $exam;
    return $total;
}

function getresultexamterm($classid, $session, $term, $stdid, $subid) {
    $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subid);
    $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subid);
    $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subid);
    $exam = getresultexam($classid, $session, $term, 'exam', $stdid, $subid);
    $total = $firstca + $secondca + $thirdca + $exam;
    return " $total";
}

function getresultexam($classid, $session, $term, $reslttype, $stdid, $subid) {
    global $w;
    $h = "select result from playnurresult where classid='$classid' and session='$session' and term='$term' and firstsecondthirdexam='$reslttype' and studentid ='$stdid' and subjectid='$subid' order by dateadded desc";
    $g = mysqli_query($w, $h);
    $xs = mysqli_fetch_array($g);
    $result = $xs['result'];
    if (strlen($result) < 1) {
        $result = 0;
    }
    return $result;
}

function getaveragesubjectscore($classid, $session, $term, $subjectid) {
    global $w;
//Get students in class
    $gt = "select schoolid from schstudent where ClassID='$classid'";
    $uq = mysqli_query($w, $gt);
    $studentcount = mysqli_num_rows($uq);
    $cumscores = 0;
    while ($xd = mysqli_fetch_array($uq)) {
        $schoolid = $xd['schoolid'];
        $stdscore = getcummscore($schoolid, $classid, $session, $term, $subjectid);
        $cumscores += $stdscore;
    }
    $averagescore = ceil($cumscores / $studentcount);
    return "$averagescore";
}

function gethighscore($session, $term, $subjectid) {
    global $w;
    return "45";
}

function getlowscore($session, $term, $subjectid) {
    global $w;
    return "10";
}

function cummaverage($session, $term, $subjectid) {
    global $w;
    return "15";
}

function getjsswexamone($total) {
    if ($total >= 75) {
        return "A1";
    }
    if ($total >= 70 and $total < 74) {
        return "B2";
    }
    if ($total >= 65 and $total < 69) {
        return "B3";
    }
    if ($total >= 55 and $total < 65) {
        return "C4";
    }
    if ($total >= 50 and $total < 54) {
        return "C5";
    }
    if ($total >= 45 and $total < 49) {
        return "C6";
    }
    if ($total >= 40 and $total < 44) {
        return "D7";
    }
    if ($total <= 39) {
        return "F9";
    }
}

function getgradewexamone($total) {
    if ($total >= 90) {
        return "A+";
    }
    if ($total >= 80 and $total < 90) {
        return "A";
    }
    if ($total >= 70 and $total <= 79) {
        return "B";
    }
    if ($total >= 60 and $total <= 69) {
        return "C";
    }
    if ($total >= 50 and $total <= 59) {
        return "D";
    }
    if ($total >= 40 and $total <= 49) {
        return "E";
    }
    if ($total < 40) {
        return "W";
    }
}

function getsubcode($subjectid) {
    global $w;
    $h = "select subjectcode from subjects where sn='$subjectid'";
    $q = mysqli_query($w, $h);
    $j = mysqli_fetch_array($q);
    $subjectcode = $j['subjectcode'];
    return $subjectcode;
}

function getresultx($classid, $session, $reslttype, $stdid, $subid) {
    global $w;
    $h = "select result from playnurresult where classid='$classid' and session='$session' and firstsecondthirdexam='$reslttype' and studentid ='$stdid' and subjectid='$subid'";
    $g = mysqli_query($w, $h);
    $xs = mysqli_fetch_array($g);
    $result = $xs['result'];
    if (strlen($result) < 1) {
        $result = 0;
    }
    return $result;
}

function getgradeone($totalresult) {
    if ($totalresult >= 35 and $totalresult <= 40) {
        return "A";
    }
    if ($totalresult >= 30 and $totalresult <= 34) {
        return "B";
    }
    if ($totalresult >= 25 and $totalresult <= 29) {
        return "C";
    }
    if ($totalresult >= 20 and $totalresult <= 24) {
        return "D";
    }
    if ($totalresult >= 0 and $totalresult <= 19) {
        return "E";
    }
}

function getjsspercentage($totalresult) {
    if ($totalresult >= 70 and $totalresult <= 100) {
        return "A";
    }
    if ($totalresult >= 50 and $totalresult <= 69) {
        return "C";
    }
    if ($totalresult >= 40 and $totalresult <= 49) {
        return "P";
    }
    if ($totalresult > 0 and $totalresult <= 39) {
        return "F";
    }
    if ($totalresult === 0) {
        return "-";
    }
}

function getjss($totalresult) {
    if ($totalresult >= 35 and $totalresult <= 40) {
        return "A";
    }
    if ($totalresult >= 30 and $totalresult <= 34) {
        return "B";
    }
    if ($totalresult >= 25 and $totalresult <= 29) {
        return "C";
    }
    if ($totalresult >= 20 and $totalresult <= 24) {
        return "D";
    }
    if ($totalresult >= 0 and $totalresult <= 19) {
        return "E";
    }
}

/*
 * $firstca = getresult($classid, $session, '1st Term', $stdid, $subjectid);
  $secondca = getresult($classid, $session, '2nd Term', $stdid, $subjectid);
  $thirdca = getresult($classid, $session, '3rd Term', $stdid, $subjectid);
 */
/*
  function getresult($classid, $session, $term, $stdid, $subjectid){
  global $w;
  return rand(0,20);
  }
 * 
 */

if ($action === "nursery") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $classid = getclassidfromschid($stdid);
    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
    $aq = mysqli_query($w, $o);
    $prep = "<table class='table table-condensed table-bordered'>"
            . "<tr style='font-size:15px; font-weight:bold'><td></td><td>Subject</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td></tr>";
    while ($hq = mysqli_fetch_array($aq)) {
        $subjectgroupid = $hq['Subjectgroup'];
        $subjectgroupname = getsubjectgroupname($subjectgroupid);
        $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='5'>$subjectgroupname </td></tr>";
        $s = "select * from subjects where Subjectgroup='$subjectgroupid'";
        $gt = mysqli_query($w, $s);
        $cnt = 1;
        while ($q = mysqli_fetch_array($gt)) {
            $subjectname = $q['SubjectName'];
            $subjectid = $q['sn'];
            //Check current result
            $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
            //$result = getresult($classid, $session, $term, $stdid, $subjectid);
            $firsttermresult = getresult($classid, $session, '1st Term', $stdid, $subjectid);
            $secondtermresult = getresult($classid, $session, '2nd Term', $stdid, $subjectid);
            $thirdtermresult = getresult($classid, $session, '3rd Term', $stdid, $subjectid);
            //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
            $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana'><td style='width:20px'>$cnt</td><td>$subjectname</td><td style='width:60px; text-align:center' id='nurez$cnt'>$firsttermresult</td><td style='width:60px; text-align:center'>$secondtermresult</td><td style='text-align:center'>$thirdtermresult</td></tr>";
            $cnt++;
        }
    }
    echo $prep . "</table>";
    //Get all comments
    $medal = getclasmedal($stdid, $term, $session);
    $teachercomment = getteachercomment($stdid, $term, $session);
    $teachersignature = getteachersignature($classid);
    $othercomment = getothercomment($stdid, $term, $session);
    $proprietresscomment = getproprietresscomment($stdid, $term, $session);
    $nextterm = nexterm($term, $session);
    $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px'><tr><td></td><td></td><td></td><td></td></tr>";
    $comments .= "<tr><td style='font-weight:bold'>Class medal</td><td colspan='4'>$medal</td></tr>";
    $comments .= "<tr><td style='font-weight:bold'>Other Observation/Comment</td><td colspan='4'>$othercomment</td></tr>";
    $comments .= "<tr><td style='font-weight:bold'>Teacher's comment</td><td colspan='4'>$teachercomment</td></tr>";
    $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment</td></tr></table><div style='margin-top:10px; font-size:16px' colspan='5'><span style='background-color:rgba(0,0,0,0.2) !important; padding:3px'>Next Term begins : $nextterm</span>div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:400px; display:inline-block; position:relative'><span style='position:absolute; bottom:25px; left:10px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></div>";
    echo $comments;
}

if ($action === "grade1") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $classid = getclassidfromschid($stdid);
    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
    $aq = mysqli_query($w, $o);
    $prep = "<table class='table table-condensed table-bordered'>"
            . "<tr style='font-size:15px; font-weight:bold'><td></td><td>Subject</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td></tr>";
    while ($hq = mysqli_fetch_array($aq)) {
        $subjectgroupid = $hq['Subjectgroup'];
        $subjectgroupname = getsubjectgroupname($subjectgroupid);
        $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='5'>$subjectgroupname </td></tr>";
        $s = "select * from subjects where Subjectgroup='$subjectgroupid'";
        $gt = mysqli_query($w, $s);
        $cnt = 1;
        while ($q = mysqli_fetch_array($gt)) {
            $subjectname = $q['SubjectName'];
            $subjectid = $q['sn'];
            //Check current result
            $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
            //$result = getresult($classid, $session, $term, $stdid, $subjectid);
            $firsttermresult = getresult($classid, $session, '1st Term', $stdid, $subjectid);
            $secondtermresult = getresult($classid, $session, '2nd Term', $stdid, $subjectid);
            $thirdtermresult = getresult($classid, $session, '3rd Term', $stdid, $subjectid);
            //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
            $prep .= "<tr style='font-size:13px; font-weight:bold; font-family:verdana'><td style='width:20px'>$cnt</td><td>$subjectname</td><td style='width:60px; text-align:center' id='nurez$cnt'>$firsttermresult</td><td style='width:60px; text-align:center'>$secondtermresult</td><td style='text-align:center'>$thirdtermresult</td></tr>";
            $cnt++;
        }
    }
    echo $prep . "</table>";
    //Get all comments
    $medal = getclasmedal($stdid, $term, $session);
    $teachercomment = getteachercomment($stdid, $term, $session);
    $teachersignature = getteachersignature($classid);
    $othercomment = getothercomment($stdid, $term, $session);
    $proprietresscomment = getproprietresscomment($stdid, $term, $session);
    $nextterm = nexterm($term, $session);
    $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px'><tr><td></td><td></td><td></td><td></td></tr>";
    $comments .= "<tr><td style='font-weight:bold' colspan='5'>Teacher's comment : $teachercomment</td></tr>";
    $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment</td></tr></table><div style='margin-top:10px; font-size:16px' colspan='5'><span style='background-color:rgba(0,0,0,0.2) !important; padding:3px'>Next Term begins : $nextterm</span><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:400px; display:inline-block; position:relative'><span style='position:absolute; bottom:25px; left:10px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress' Signature</span></div>";
    echo $comments;
}
