<?php

include 'databaseSQLconnectn.php';
include 'validateinput.php';

function getteachersignature($classid) {
    //return $classid;
    global $w;
    //return $classid;
    $t = "select ClassTeacher from schclass where SN='$classid'";
    //return $t;
    $classteacher = mysqli_query($w, $t);
    $az = mysqli_fetch_array($classteacher);
    $teacherid = $az['ClassTeacher'];

    //Get signaturenursery
    $jut = "select signature from schstaff where StaffID = '$teacherid'";
    $hq = mysqli_query($w, $jut);
    $uq = mysqli_fetch_array($hq);
    $signature = $uq['signature'];

    return "PHP/" . $signature;
}

$action = validate("action");
$madamsignature = "madamsignature.jpg";
if ($action === "playgroup") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $classid = getclassidfromschid($stdid);
    if ($term === "3rd Term") {
        $addon = "<tr style='background-color:#ccc; padding:4px; text-align:center'><td colspan='4'>Promotion <select id='promstat'><option>Promoted</option><option>Promoted on trial</option><option>Advised to repeat</option></select><input type='text' id='promclass'><input type='button' value='Save details' onclick='promoteme(\"promstat\",\"promclass\", \"$stdid\",\"$session\")'></td></tr>";
    } else {
        $addon = "";
    }
    $resulttype = "";
    $table = "playnurresult";
    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
    $aq = mysqli_query($w, $o);
    $prep = "<table class='table table-condensed table-bordered'><tr style='font-size:15px; font-weight:bold'><td></td><td>Subject</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td></tr>";
    $sp = 1;
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
            $si = $subjectid;
            //Check current result
            $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
            //$result = getresult($classid, $session, $term, $stdid, $subjectid);
            $firsttermresult = getresult($classid, $session, '1st Term', $stdid, $subjectid);
            $secondtermresult = getresult($classid, $session, '2nd Term', $stdid, $subjectid);
            $thirdtermresult = getresult($classid, $session, '3rd Term', $stdid, $subjectid);
            //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
            $prep .= "<tr style='font-size:12px; font-family:verdana'><td style='width:20px'>$cnt</td><td style='padding:5px'><span>$subjectname</span></td><td>"
                    . "<center><input type='text' size='5' value='$firsttermresult' class='fcr' id='crcft$si$cnt' onblur=\"saveresult('$classid', '$session', '1st Term', '$stdid', '$subjectid', 'crcft$si$cnt')\"></center></td><td>"
                    . "<center><input id='crcst$si$cnt' type='text' value='$secondtermresult' size='5' class='fcr' onblur=\"saveresult('$classid', '$session', '2nd Term', '$stdid', '$subjectid', 'crcst$si$cnt')\"></td><td style='text-align:center'><center><input type='text' value='$thirdtermresult' id='crctt$si$cnt' size='5' onblur=\"saveresult('$classid', '$session', '3rd Term', '$stdid', '$subjectid','crctt$si$cnt')\"></center></td></tr>";
            $cnt++;
        }
        $sp++;
    }
    echo $prep . "</tbody></table>";
    //Get all comments
    $medal = getclasmedal($stdid, $term, $session);
    $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
    $othercomment = getothercomment($stdid, $term, $session);
    $teachersignature = getteachersignature($classid);
    $proprietresscomment = getproprietresscomment($stdid, $term, $session);
    //$proprietresscomment = "Good";
    $nextterm = nexterm($term, $session);
    $teacherid = getteacheridfromstudentid($stdid);
    $comments = "<table style='width:100%; margin-top:20px; font-size:12px'><tr><td></td><td></td><td></td><td></td><td></td></tr>";
    $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px' colspan='5'><b>Teacher's comment :</b> $teachercomment<input value='' style='width:600px; border-style:none' placeholder='Teacher comment here' onblur='teacherscomment(\"$teacherid\",\"$resulttype\",\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
    $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Proprietress comments :</b>  <input type='text' value='$proprietresscomment' style='width:600px; border-style:none' placeholder='Proprietress comment here' onblur='addproprietresscomment(\"$session\",\"$term\",\"$stdid\",this.value)'> </td></tr>$addon</table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:60px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress's Signature</span></div>";
    echo $comments;
}

if ($action === "reception") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $classid = getclassidfromschid($stdid);
    $resulttype = "";
    $table = "playnurresult";

    if ($term === "3rd Term") {
        $addon = "<tr style='background-color:#ccc; padding:4px; text-align:center'><td colspan='4'>Promotion <select id='promstat'><option>Promoted</option><option>Promoted on trial</option><option>Advised to repeat</option></select><input type='text' id='promclass'><input type='button' value='Save details' onclick='promoteme(\"promstat\",\"promclass\", \"$stdid\",\"$session\")'></td></tr>";
    } else {
        $addon = "";
    }
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
        $add = "rc";
        while ($q = mysqli_fetch_array($gt)) {
            $subjectname = $q['SubjectName'];
            $subjectid = $q['sn'];
            //Check current result
            $jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
            //$result = getresult($classid, $session, $term, $stdid, $subjectid);
            $firsttermresult = getresult($classid, $session, '1st Term', $stdid, $subjectid);
            $secondtermresult = getresult($classid, $session, '2nd Term', $stdid, $subjectid);
            $thirdtermresult = getresult($classid, $session, '3rd Term', $stdid, $subjectid);
            $teacherid = getteacheridfromstudentid($stdid);
            //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
            $prep .= "<tr style='font-size:13px; font-family:verdana'><td style='width:20px'>$cnt</td><td>$subjectname</td><td style='width:60px; text-align:center' id='nurez$cnt'><center><input type='text' value='$firsttermresult' id='crctt1$add$cnt' class='fcr' onblur=\"saveresult('$classid', '$session', '1st Term', '$stdid', '$subjectid','crctt1$add$cnt')\"></center></td><td style='width:60px;'><center><input type='text' value='$secondtermresult' id='crctt2$add$cnt' class='fcr' onblur=\"saveresult('$classid', '$session', '2nd Term', '$stdid', '$subjectid','crctt2$add$cnt')\"></center></td><td><center><input type='text' value='$thirdtermresult' id='crctt3$add$cnt' class='fcr' onblur=\"saveresult('$classid', '$session', '3rd Term', '$stdid', '$subjectid','crctt3$add$cnt')\"></center></td></tr>";
            $cnt++;
        }
    }
    echo $prep . "</table>";
    //Get all comments
    $medal = getclasmedal($stdid, $term, $session);
    $teachercommentq = getteachercomment($stdid, $term, $session, $resulttype);
    $othercomment = getothercomment($stdid, $term, $session);
    $teachersignature = getteachersignature($classid);
    $proprietresscomment = getproprietresscomment($stdid, $term, $session);
    $nextterm = nexterm($term, $session);
    $comments = "<table style='width:100%; margin-top:20px; font-size:11px; font-family:verdana'>";
    $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px'>Teacher's comment : $teachercommentq<input value='' style='width:400px; border-style:none' placeholder='Teacher comment here'  onblur='teacherscomment(\"$teacherid\",\"$resulttype\",\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
    $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b><input type='text' value='$proprietresscomment' style='width:600px; border-style:none' placeholder='Proprietress comment here' onblur='proprietresscomment(\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>$addon</table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:60px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress's Signature</span></div>";
    echo $comments;
}

if ($action === "nursery1") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $resulttype = "";
    $classid = getclassidfromschid($stdid);
    if ($term === "3rd Term") {
        $addon = "<tr style='background-color:#ccc; padding:4px; text-align:center'><td colspan='4'>Promotion <select id='promstat'><option>Promoted</option><option>Promoted on trial</option><option>Advised to repeat</option></select><input type='text' id='promclass'><input type='button' value='Save details' onclick='promoteme(\"promstat\",\"promclass\", \"$stdid\",\"$session\")'></td></tr>";
    } else {
        $addon = "";
    }
    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
    //echo $o;
    $aq = mysqli_query($w, $o);
    $prep = "<table class='table table-condensed table-bordered'>"
            . "<tr style='font-size:15px; font-weight:bold'><td></td><td>Subject</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td></tr>";
    $scnt = 1;
    //$subjectgroupid = $hq['Subjectgroup'];
    //$subjectgroupname = getsubjectgroupname($subjectgroupid);
    //$prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='5'>$subjectgroupname </td></tr>";
    $s = "select * from subjects where SubjectCategoryid='$classid'";
    $gt = mysqli_query($w, $s);
    $cnt = 1;
    $add = "no";
    while ($q = mysqli_fetch_array($gt)) {
        $subjectname = $q['SubjectName'];
        $subjectid = $q['sn'];
        //Check current result
        //$jc = "select result from playnurresult where term='$term' and session ='$session' and studentid='$stdid'";
        //$result = getresult($classid, $session, $term, $stdid, $subjectid);
        $firsttermresult = getresult($classid, $session, '1st Term', $stdid, $subjectid);
        $secondtermresult = getresult($classid, $session, '2nd Term', $stdid, $subjectid);
        $thirdtermresult = getresult($classid, $session, '3rd Term', $stdid, $subjectid);
        //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
        $prep .= "<tr style='font-size:13px; font-family:verdana'><td style='width:20px'>$cnt</td><td>$subjectname</td>"
                . "<td style='width:60px'>"
                . "<center><input type='text' value='$firsttermresult' class='form-control' id='crctt1$add$scnt$cnt' style='width:60px' onblur=\"saveresult('$classid', '$session', '1st Term', '$stdid', '$subjectid','crctt1$add$scnt$cnt')\"></center>"
                . "</td>"
                . "<td style='width:60px;'>"
                . "<center><input type='text' value='$secondtermresult' class='form-control' id='crctt2$add$scnt$cnt' style='width:60px' onblur=\"saveresult('$classid', '$session', '2nd Term', '$stdid', '$subjectid','crctt2$add$scnt$cnt')\"></center>"
                . "</td>"
                . "<td>"
                . "<center><input type='text' value='$thirdtermresult' class='form-control' id='crctt3$add$scnt$cnt' style='width:60px' onblur=\"saveresult('$classid', '$session', '3rd Term', '$stdid', '$subjectid','crctt3$add$scnt$cnt')\"></center>"
                . "</td>"
                . "</tr>";
        $cnt++;
    }
    $scnt++;
    echo $prep . "</table>";
    //Get all comments
    $medal = getclasmedal($stdid, $term, $session);
    $teachercomments = getteachercomment($stdid, $term, $session, $resulttype);
    $othercomment = getothercomment($stdid, $term, $session);
    $proprietresscomment = getproprietresscomment($stdid, $term, $session);
    $nextterm = nexterm($term, $session);
    $teachersignature = getteachersignature($classid);
    $teacherid = getteacheridfromstudentid($stdid);
    $comments = "<table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
    $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px'>Class medal</td><td colspan='4'><input type='text' value='$medal' style='width:400px; border-style:none' placeholder='Class medal' onblur='addmedal(\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
    $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px'>Other Observation/Comment</td><td colspan='4'><input type='text' value='$othercomment' style='width:400px; border-style:none' placeholder='Other Observation/Comment' onblur='addothercomment(\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
    $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px'>Teacher's comment :  $teachercomments<input value='' type='text' style='width:400px; border-style:none' placeholder='Teacher comment' onblur='teacherscomment(\"$teacherid\",\"$resulttype\",\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
    $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> <input type='text' value='$proprietresscomment' style='width:600px; border-style:none' placeholder='Proprietress comment here' onblur='proprietresscomment(\"$session\",\"$term\",\"$stdid\",this.value)'> </td></tr>$addon</table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:60px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress's Signature</span></div>";
    echo $comments;
}

if ($action === "nurseryt") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $resulttype = validate("resulttype");
    $classid = getclassidfromschid($stdid);

    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
    if ($term === "1st Term") {
        $prep = "<table class='table table-condensed table-bordered'>"
                . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>$term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        $addon = "";
    }
    if ($term === "2nd Term") {
        $prep = "<table class='table table-condensed table-bordered'>"
                . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>1st Term</td><td>2nd Term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
        $addon = "";
    }
    if ($term === "3rd Term") {
        $prep = "<table class='table table-condensed table-bordered'>"
                . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>1st Term</td><td>2nd Term</td><td>3rd Term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";

        $addon = "<tr style='background-color:#ccc; padding:4px; text-align:center'><td colspan='4'>Promotion <select id='promstat'><option>Promoted</option><option>Promoted on trial</option><option>Advised to repeat</option></select><input type='text' id='promclass'><input type='button' value='Save details' onclick='promoteme(\"promstat\",\"promclass\", \"$stdid\",\"$session\")'></td></tr>";
    }
    $aq = mysqli_query($w, $o);
    /*
      $prep = "<table class='table table-condensed table-bordered'>"
      . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>$term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>"; */
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

                $prep .= "<tr style='font-size:13px; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'><input id='cron$supval$cnt' type='text' size='3' value='$exam' onblur=\"saveresultnurt('$classid', '$session', '$term', '$stdid', '$subjectid','cron$supval$cnt','exam',60)\"></td><td style=''>$totalwexam</td><td>$mgrade</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$totalwexam</td></tr>";
            }
            if ($term === "2nd Term") {
                $firsttermscore = getresultexamterm($classid, $session, "1st Term", $stdid, $subjectid);
                $average = ($firsttermscore + $totalwexam) / 2;
                $prep .= "<tr style='font-size:13px; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'><input id='cron$supval$cnt' type='text' size='3' value='$exam' onblur=\"saveresultnurt('$classid', '$session', '$term', '$stdid', '$subjectid','cron$supval$cnt','exam', 60)\"></td><td style=''>$totalwexam</td><td>$mgrade</td><td>$firsttermscore</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$average</td></tr>";
            }
            if ($term === "3rd Term") {
                $firsttermscore = getresultexamterm($classid, $session, "1st Term", $stdid, $subjectid);
                $secondterm = getresultexamterm($classid, $session, "2nd Term", $stdid, $subjectid);
                $haveraged = number_format(($firsttermscore + $secondterm + $totalwexam) / 3, 2);
                $prep .= "<tr style='font-size:13px; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'><input id='cron$supval$cnt' type='text' size='3' value='$exam' onblur=\"saveresultnurt('$classid', '$session', '$term', '$stdid', '$subjectid','cron$supval$cnt','exam', 60)\"></td><td style=''>$totalwexam</td><td>$mgrade</td><td>$firsttermscore</td><td>$secondterm</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$haveraged</td></tr>";
            }
            /*
              $prep .= "<tr style='font-size:13px; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'><input id='cron$supval$cnt' type='text' size='3' value='$exam' onblur=\"saveresultnurt('$classid', '$session', '$term', '$stdid', '$subjectid','cron$supval$cnt','exam')\"></td><td style=''>$totalwexam</td><td>$mgrade</td><td>100</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$cummaverage</td></tr>"; */
            $cnt++;
        }
        $supval++;
    }
    echo $prep . "</table><table style='width:100%'><tr style='background-color:#ccc'><td><div style='text-align:center; padding:5px; font-size:12px; font-weight:bold;letter-spacing: 1px;'>RATING : >=90 = A+, 80-89=A, 70-79=B, 60-69=C, 50-59=D, 40-49=E, 40 & Below = W</div></td></td></table>";
    //Get all comments
    {
        $medal = getclasmedal($stdid, $term, $session);
        $teachercomments = getteachercomment($stdid, $term, $session, $resulttype);
        $teachercomment = $teachercomments;
        $othercomment = getothercomment($stdid, $term, $session);
        $proprietresscomment = getgradelevelproprietresscomment($stdid, $term, $session);
        $proprietresscomments = getgradelevelproprietresscomment($resulttype, $stdid, $term, $session);
        $proprietresscomment = urldecode($proprietresscomments);
        $nextterm = nexterm($term, $session);
        $teacherid = getteacheridfromstudentid($stdid);
        $teachersignature = getteachersignature($classid);
        $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
        $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Teacher's comment :</b> $teachercomments<input value='' style='width:400px'  onblur='teacherscomment(\"$teacherid\",\"$resulttype\",\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
        $comments .= "$addon </table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:60px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress's Signature</span></div>";
        echo $comments;
    }
}

function getresultexamterm($classid, $session, $term, $stdid, $subid) {
    $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subid);
    $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subid);
    $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subid);
    $exam = getresultexam($classid, $session, $term, 'exam', $stdid, $subid);
    $total = $firstca + $secondca + $thirdca + $exam;
    return " $total";
}

if ($action === "nursery2mid") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $resulttype = validate("resulttype");
    $classid = getclassidfromschid($stdid);

    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid' order by Subjectgroup ASC";
    $aq = mysqli_query($w, $o);
    $prep = "<table class='table table-condensed table-bordered'>"
            . "<tr style='font-size:12px; text-align:center; font-weight:bold'><td></td><td>Subject</td><td>Code</td><td>1st CA <br>10</td><td>2nd CA <br> 10</td><td>3rd CA <br> 20</td><td>Total</td><td>Grade</td><td>Term</td><td>Subject</td></tr>";
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
            $pry2grade = getgradeone($total); //getgrade($total);
            //fillrez = fillrez($studentid, $subjectid, $term, $session, $classid, $result);
            {
                $prep .= "<tr style='font-size:13px; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>"
                        . "<center><input type='text' size='2' value='$firstca' id='cron$add$supval$cnt' class='fcr form-control' onblur=\"saveresultnurt('$classid', '$session', '$term', '$stdid', '$subjectid','cron$add$supval$cnt','first', 10)\"></center>"
                        . "</td><td style=''>"
                        . "<center><input type='text' size='2' value='$secondca' class='form-control fcr' id='crtw$add$supval$cnt' onblur=\"saveresultnurt('$classid', '$session', '$term', '$stdid', '$subjectid','crtw$add$supval$cnt','second', 10)\"></center>"
                        . "</td><td>"
                        . "<center><input type='text' size='2' value='$thirdca' class='form-control fcr' id='crth$add$supval$cnt' onblur=\"saveresultnurt('$classid', '$session', '$term', '$stdid', '$subjectid','crth$add$supval$cnt','third', 20)\"></center>"
                        . "</td><td>$total</td><td>$pry2grade</td><td>$term</td><td></td></tr>";
                $cnt++;
            }
        }
        $supval++;
    }
    echo $prep . "</table><table style='width:100%'><tr style='background-color:#ccc; font-size:12px'><td><div style='text-align:center; padding:10px; font-weight:bold;letter-spacing: 1px;'>RATING : 35-40=A, 30-34=B, 25-29=C, 20-24=D, 0-19=E</div></td></td></table>";
    //Get all comments
    {
        $medal = getclasmedal($stdid, $term, $session);
        $teachercommentx = getteachercomment($stdid, $term, $session, $resulttype);
        $othercomment = getothercomment($stdid, $term, $session);
        $proprietresscomment = getgradelevelproprietresscomment($stdid, $term, $session);
        $proprietresscomments = getgradelevelproprietresscomment($resulttype, $stdid, $term, $session);
        $proprietresscomment = urldecode($proprietresscomments);
        $nextterm = nexterm($term, $session);
        $teachersignature = getteachersignature($classid);
        $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
        $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px' colspan='5'>Teacher's comment : $teachercommentx<input value='' style='width:400px'  onblur='teacherscomment(\"$teacherid\",\"$resulttype\",\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
        $comments .= "</table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:60px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress's Signature</span></div>";
        echo $comments;
    }
}

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

function getjsswexamone($total) {
    if ($total >= 75) {
        return "A1";
    }
    if ($total >= 70 and $total < 75) {
        return "B2";
    }
    if ($total >= 65 and $total < 70) {
        return "B3";
    }
    if ($total >= 55 and $total < 65) {
        return "C4";
    }
    if ($total >= 50 and $total < 55) {
        return "C5";
    }
    if ($total >= 45 and $total < 50) {
        return "C6";
    }
    if ($total >= 40 and $total < 45) {
        return "D7";
    }
    if ($total > 0 and $total <= 39) {
        return "F9";
    }
    if ($total === 0) {
        return "-";
    }
}

if ($action === "jss") {
    $session = validate("session");
    $term = validate("term");
    $stdid = validate("studentid");
    $classid = getclassidfromschid($stdid);
    $resulttype = validate("resulttype");
    $o = "select distinct(Subjectgroup) from subjects where SubjectCategoryid='$classid'";

    if ($term === "3rd Term") {
        $addon = "<tr style='background-color:#ccc; padding:4px; text-align:center'><td colspan='4'>Promotion <select id='promstat'><option>Promoted to</option><option>Promoted on trial to</option><option>Advised to repeat</option></select><input type='text' id='promclass'><input type='button' value='Save details' onclick='promoteme(\"promstat\",\"promclass\", \"$stdid\",\"$session\")'></td></tr>";
        ;
    } else {
        $addon = "";
    }

    $aq = mysqli_query($w, $o);
//If result is midterm
    if ($resulttype === "midterm") {
        $prep = "$resulttype<table class='table table-condensed table-bordered'>"
                . "<tr style='font-size:13px; text-align:center; font-weight:bold'><td></td><td>Subject</td><td>Code</td><td>1st CA <br>10</td><td>2nd CA <br> 20</td><td>3rd CA <br> 10</td><td>Total</td><td>Grade</td><td>Term</td><td>Subject</td></tr>";
        $supval = 1;
        while ($hq = mysqli_fetch_array($aq)) {
            $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='10' style='padding:5px'></td></tr>";
            $s = "select * from subjects where SubjectCategoryid='$classid'";
            //echo $s;
            $gt = mysqli_query($w, $s);
            $cnt = 1;
            $add = "gd";
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
                $total = $firstca + $secondca + $thirdca;
                $teacherid = getteacheridfromstudentid($stdid);
                $pry2grade = getgradeone($total); //getgrade($total);
                $pry2grade = getjsswexamone(($total / 40) * 100);
                $prep .= "<tr style='font-size:13px; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>"
                        . "<center>$firstca</center>"
                        . "</td><td style=''>"
                        . "<center>$secondca</center>"
                        . "</td><td>"
                        . "<center>$thirdca</center>"
                        . "</td><td>$total</td><td>$pry2grade</td><td>$term</td><td></td></tr>";
                $cnt++;
            }
            $supval++;
        }
        echo $prep . "</table><table style='width:100%; font-size:12px'><tr style='background-color:#ccc; font-size:12px'><td colspan='10'><div style='text-align:center; padding:10px; font-weight:bold;letter-spacing: 1px;'>RATING : 35-40=A, 30-34=B, 25-29=C, 20-24=D, 0-19=E</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercommenty = getteachercomment($stdid, $term, $session, 'midterm');
            $othercomment = getothercomment($stdid, $term, $session);
            $proprietresscomment = getgradelevelproprietresscomment($stdid, $term, $session);
            $nextterm = nexterm($term, $session);
            $teacherid = getteacheridfromstudentid($stdid);
            $teachersignature = getteachersignature($classid);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px' colspan='5'>Teacher's comment :  $teachercommenty<input style='width:400px'  onblur='teacherscomment(\"$teacherid\",\"$resulttype\",\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
            $comments .= "<tr class='tcmnt' style='display:none'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment </td></tr></table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:60px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress's Signature</span></div>";
            echo $comments;
        }
    }

    //If resulttype is terminal
    if ($resulttype === "terminal") {
        $prep = "<table class='table table-condensed table-bordered'>"
                . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>$term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
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

                $mgrade = getjsswexamone($totalwexam);
                $cummaverage = getcummaverage($term, $session, $classid, $stdid, $subjectid);

                $prep .= "<tr style='font-size:13px; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$cummaverage</td></tr>";
                $cnt++;
            }
            $supval++;
        }
        echo $prep . "</table><table style='width:100%'><tr style='background-color:#ccc'><td><div style='text-align:center; padding:5px; font-size:12px; font-weight:bold;letter-spacing: 1px;'>RATING : >=90 = A+, 80-89=A, 70-79=B, 60-69=C, 50-59=D, 40-49=E, 40 & Below = W</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
            $othercomment = getothercomment($stdid, $term, $session);
            $proprietresscomment = getgradelevelproprietresscomment($stdid, $term, $session);
            $teacherid = getteacheridfromstudentid($stdid);
            $teachersignature = getteachersignature($classid);
            $nextterm = nexterm($term, $session);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Teacher's comment :</b> $teachercomment<input value='' style='width:400px'  onblur='teacherscomment(\"$teacherid\",\"$resulttype\",\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
            $comments .= "<tr class='tcmnt' style='display:none'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b>  </td></tr>$addon</table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:60px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress's Signature</span></div>";
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

    if ($term === "3rd Term") {
        $addon = "<tr style='background-color:#ccc; padding:4px; text-align:center'><td colspan='4'>Promotion <select id='promstat'><option>Promoted to</option><option>Promoted on trial to</option><option>Advised to repeat</option></select><input type='text' id='promclass'><input type='button' value='Save details' onclick='promoteme(\"promstat\",\"promclass\", \"$stdid\",\"$session\")'></td></tr>";
    } else {
        $addon = "";
    }

    $aq = mysqli_query($w, $o);
//If result is midterm
    if ($resulttype === "midterm") {
        $prep = "<table class='table table-condensed table-bordered'>"
                . "<tr style='font-size:13px; text-align:center; font-weight:bold'><td></td><td>Subject</td><td>Code</td><td>1st CA <br>10</td><td>2nd CA <br> 20</td><td>3rd CA <br> 10</td><td>Total</td><td>Grade</td><td>Term</td><td>Subject</td></tr>";
        $supval = 1;
        while ($hq = mysqli_fetch_array($aq)) {
            $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='10' style='padding:5px'></td></tr>";
            $s = "select * from subjects where SubjectCategoryid='$classid'";
            //echo $s;
            $gt = mysqli_query($w, $s);
            $cnt = 1;
            $add = "gd";
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
                $total = $firstca + $secondca + $thirdca;
                $teacherid = getteacheridfromstdid($stdid);
                $pry2grade = getgradeone($total); //getgrade($total);
                $pry2grade = getjsswexamone(($total / 40) * 100);

                //Check if subject is an exception
                $aww = "select * from subjectexceptions where stdid='$stdid' and subjectid='$subjectid' and session='$session' and classid='$classid'";
                $bww = mysqli_query($w, $aww);
                $cww = mysqli_fetch_array($bww);
                $exception = $cww['notoffered'];

               // echo $aww . "<br> >> $exception << <br>";
                if (!isset($exception) || $exception === "1") {
                    $prep .= "<tr style='font-size:13px; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>"
                            . "<center>$firstca</center>"
                            . "</td><td style=''>"
                            . "<center>$secondca</center>"
                            . "</td><td>"
                            . "<center>$thirdca</center>"
                            . "</td><td>$total</td><td>$pry2grade</td><td>$term</td><td>Offered</td></tr>";
                    $cnt++;
                } else {
                    
                }
            }
            $supval++;
        }
        echo $prep . "</table><table style='width:100%; font-size:12px'><tr style='background-color:#ccc; font-size:12px'><td colspan='10'><div style='text-align:center; padding:10px; font-weight:bold;letter-spacing: 1px;'>RATING : 35-40=A, 30-34=B, 25-29=C, 20-24=D, 0-19=E</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercommenty = getteachercomment($stdid, $term, $session, 'midterm');
            $othercomment = getothercomment($stdid, $term, $session);
            $proprietresscomment = getgradelevelproprietresscomment($stdid, $term, $session);
            $nextterm = nexterm($term, $session);
            $teacherid = getteacheridfromstdid($stdid);
            $teachersignature = getteachersignature($classid);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px' colspan='5'>Teacher's comment :  $teachercommenty<input value='$teachercommenty' style='width:400px'  onblur='teacherscomment(\"$teacherid\",\"$resulttype\",\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
            $comments .= "<tr class='tcmnt' style='display:none'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment </td></tr></table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:60px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress's Signature</span></div>";
            echo $comments;
        }
    }

    //If resulttype is terminal
    if ($resulttype === "terminal") {
        $prep = "<table class='table table-condensed table-bordered'>"
                . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>$term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
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

                $mgrade = getjsswexamone($totalwexam);
                $cummaverage = getcummaverage($term, $session, $classid, $stdid, $subjectid);
                
                $aww = "select * from subjectexceptions where stdid='$stdid' and subjectid='$subjectid' and session='$session' and classid='$classid'";
                $bww = mysqli_query($w, $aww);
                $cww = mysqli_fetch_array($bww);
                $exception = $cww['notoffered'];

               // echo $aww . "<br> >> $exception << <br>";
                if (!isset($exception) || $exception === "1") {
                    
                $prep .= "<tr style='font-size:13px; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$supval</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'>$exam</td><td style=''>$totalwexam</td><td>$mgrade</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$cummaverage</td></tr>";
            $supval++;
                
                } else {
                    
                }

                $cnt++;
            }
        }
        echo $prep . "</table><table style='width:100%'><tr style='background-color:#ccc'><td><div style='text-align:center; padding:5px; font-size:12px; font-weight:bold;letter-spacing: 1px;'>RATING : >=90 = A+, 80-89=A, 70-79=B, 60-69=C, 50-59=D, 40-49=E, 40 & Below = W</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
            $othercomment = getothercomment($stdid, $term, $session);
            $proprietresscomment = getgradelevelproprietresscomment($stdid, $term, $session);
            $teacherid = getteacheridfromstudentid($stdid);
            $teachersignature = getteachersignature($classid);
            $nextterm = nexterm($term, $session);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Teacher's comment :</b> $teachercomment<input value='' style='width:400px'  onblur='teacherscomment(\"$teacherid\",\"$resulttype\",\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
            $comments .= "<tr class='tcmnt' style='display:none'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b>  </td></tr>$addon</table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:60px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress's Signature</span></div>";
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

    if ($term === "3rd Term") {
        $addon = "<tr style='background-color:#ccc; padding:4px; text-align:center'><td colspan='4'>Promotion <select id='promstat'><option>Promoted to</option><option>Promoted on trial to</option><option>Advised to repeat</option></select><input type='text' id='promclass'><input type='button' value='Save details' onclick='promoteme(\"promstat\",\"promclass\", \"$stdid\",\"$session\")'></td></tr>";
        ;
    } else {
        $addon = "";
    }

    $aq = mysqli_query($w, $o);
//If result is midterm
    if ($resulttype === "midterm") {
        $prep = "$resulttype<table class='table table-condensed table-bordered'>"
                . "<tr style='font-size:13px; text-align:center; font-weight:bold'><td></td><td>Subject</td><td>Code</td><td>1st CA <br>10</td><td>2nd CA <br> 10</td><td>3rd CA <br> 20</td><td>Total</td><td>Grade</td><td>Term</td><td>Subject</td></tr>";
        $supval = 1;
        while ($hq = mysqli_fetch_array($aq)) {
            $prep .= "<tr style='background-color:#ccc; font-weight:bold; font-size:12px'><td colspan='10' style='padding:5px'></td></tr>";
            $s = "select * from subjects where SubjectCategoryid='$classid'";
            //echo $s;
            $gt = mysqli_query($w, $s);
            $cnt = 1;
            $add = "gd";
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
                $total = $firstca + $secondca + $thirdca;
                $teacherid = getteacheridfromstudentid($stdid);
                $pry2grade = getgradeone($total); //getgrade($total);
                $prep .= "<tr style='font-size:13px; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>"
                        . "<center><input type='text' size='2' value='$firstca' id='cron$add$supval$cnt' class='fcr form-control' onblur=\"saveresultnurt('$classid', '$session', '$term', '$stdid', '$subjectid','cron$add$supval$cnt','first','10')\"></center>"
                        . "</td><td style=''>"
                        . "<center><input type='text' size='2' value='$secondca' class='form-control fcr' id='crtw$add$supval$cnt' onblur=\"saveresultnurt('$classid', '$session', '$term', '$stdid', '$subjectid','crtw$add$supval$cnt','second','10')\"></center>"
                        . "</td><td>"
                        . "<center><input type='text' size='2' value='$thirdca' class='form-control fcr' id='crth$add$supval$cnt' onblur=\"saveresultnurt('$classid', '$session', '$term', '$stdid', '$subjectid','crth$add$supval$cnt','third','20')\"></center>"
                        . "</td><td>$total</td><td>$pry2grade</td><td>$term</td><td></td></tr>";
                $cnt++;
            }
            $supval++;
        }
        echo $prep . "</table><table style='width:100%; font-size:12px'><tr style='background-color:#ccc; font-size:12px'><td colspan='10'><div style='text-align:center; padding:10px; font-weight:bold;letter-spacing: 1px;'>RATING : 35-40=A, 30-34=B, 25-29=C, 20-24=D, 0-19=E</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercommenty = getteachercomment($stdid, $term, $session, 'midterm');
            $othercomment = getothercomment($stdid, $term, $session);
            $proprietresscomment = getgradelevelproprietresscomment($stdid, $term, $session);
            $nextterm = nexterm($term, $session);
            $teacherid = getteacheridfromstudentid($stdid);
            $teachersignature = getteachersignature($classid);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt'><td style='font-weight:bold; padding:5px' colspan='5'>Teacher's comment :  $teachercommenty<input value='$teachercommenty' style='width:400px'  onblur='teacherscomment(\"$teacherid\",\"$resulttype\",\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
            $comments .= "<tr class='tcmnt' style='display:none'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b> $proprietresscomment </td></tr></table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:60px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress's Signature</span></div>";
            echo $comments;
        }
    }

    //If resulttype is terminal
    if ($resulttype === "terminal") {
        $prep = "<table class='table table-condensed table-bordered'>"
                . "<tr style='font-size:13px; text-align:left; font-weight:bold'><td></td><td>Subject</td><td>Code(s)</td><td>CA 40 <br>40</td><td>Exam <br> 60</td><td>Total <br> 100</td><td>Grade</td><td>$term</td><td style='width:20px'>$term Average Score In Class</td><td style='width:20px'>$term Highest Score In Class</td><td style='width:20px'>$term Lowest Score In Class</td><td style='width:20px'>Cumm. Average</td></tr>";
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

                $prep .= "<tr style='font-size:13px; font-family:verdana; text-align:center; font-size:12px'><td style='width:20px;padding:5px'>$cnt</td><td style='text-align:left'>&nbsp;  $subjectname</td><td style='width:60px'>$code</td><td style='width:60px'>$total</td><td style='text-align:center'><input id='cron$supval$cnt' type='text' size='3' value='$exam' onblur=\"saveresultnurt('$classid', '$session', '$term', '$stdid', '$subjectid','cron$supval$cnt','exam','60')\"></td><td style=''>$totalwexam</td><td>$mgrade</td><td>$totalwexam</td><td>$averagescore</td><td>$highestscore</td><td>$lowestscore</td><td>$cummaverage</td></tr>";
                $cnt++;
            }
            $supval++;
        }
        echo $prep . "</table><table style='width:100%'><tr style='background-color:#ccc'><td><div style='text-align:center; padding:5px; font-size:12px; font-weight:bold;letter-spacing: 1px;'>RATING : >=90 = A+, 80-89=A, 70-79=B, 60-69=C, 50-59=D, 40-49=E, 40 & Below = W</div></td></td></table>";
        //Get all comments
        {
            $medal = getclasmedal($stdid, $term, $session);
            $teachercomment = getteachercomment($stdid, $term, $session, $resulttype);
            $othercomment = getothercomment($stdid, $term, $session);
            $proprietresscomment = getgradelevelproprietresscomment($stdid, $term, $session);
            $teacherid = getteacheridfromstudentid($stdid);
            $teachersignature = getteachersignature($classid);
            $nextterm = nexterm($term, $session);
            $comments = "<div style='margin-top:20px'></div><table style='width:100%; margin-top:10px; font-size:12px'><tr><td></td><td></td><td></td><td></td></tr>";
            $comments .= "<tr class='tcmnt'><td style=' padding:5px' colspan='5'><b>Teacher's comment :</b> $teachercomment<input value='' style='width:400px'  onblur='teacherscomment(\"$teacherid\",\"$resulttype\",\"$session\",\"$term\",\"$stdid\",this.value)'></td></tr>";
            $comments .= "<tr class='tcmnt' style='display:none'><td style=' padding:5px' colspan='5'><b>Proprietress' comment :</b>  </td></tr>$addon</table><div style='margin-top:10px' colspan='5'><div style='margin-top:60px'><span style='display:inline-block; text-align:center'>   <span style='position:relative'><span style='position:absolute; bottom:5px; left:-20px'><img src='$teachersignature' width='150px' height='50px'></span>_________________________</span><br>Class Teacher's Signature</span><span style='margin-left:60px; display:inline-block; position:relative'><span style='position:absolute; bottom:20px; left:20px'><img src='$madamsignature' width='150px' height='50px'></span>_________________________<br>Proprietress's Signature</span></div>";
            echo $comments;
        }
    }
}

//getcummaverage($term, $session, $classid, $subjectid);
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
            if ($stdscore > 0) {
                $lowscore = $stdscore;
            }
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

function getcummscore($stdid, $classid, $session, $term, $subjectid) {
    $firstca = getresultg($classid, $session, $term, 'first', $stdid, $subjectid);
    $secondca = getresultg($classid, $session, $term, 'second', $stdid, $subjectid);
    $thirdca = getresultg($classid, $session, $term, 'third', $stdid, $subjectid);
    $exam = getresultexam($classid, $session, $term, 'exam', $stdid, $subjectid);
    $total = $firstca + $secondca + $thirdca + $exam;
    return $total;
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

function getresultgradelevel($classid, $session, $term, $reslttype, $stdid, $subid) {
    global $w;
    $h = "select result from playnurresult where classid='$classid' and session='$session' and term='$term' and firstsecondthirdexam='$reslttype' and studentid ='$stdid' and subjectid='$subid' order by dateadded desc";
//    echo $h;
    $g = mysqli_query($w, $h);
    $xs = mysqli_fetch_array($g);
    $result = $xs['result'];
    return $result;
}

function getresultxprit($classid, $session, $reslttype, $stdid, $subid) {
    global $w;
    $h = "select result from playnurresult where classid='$classid' and session='$session' and firstsecondthirdexam='$reslttype' and studentid ='$stdid' and subjectid='$subid'";
//    echo $h;
    $g = mysqli_query($w, $h);
    $xs = mysqli_fetch_array($g);
    $result = $xs['result'];
    if (strlen($result) < 1) {
        $result = "";
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
