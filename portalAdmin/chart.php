
<?php
//classid=" + classid + "&subjectid="+subjectid+"&session"+session+"&term"+term
include 'PHP/databaseSQLconnectn.php';
include 'PHP/validateinput.php';

error_reporting(0);
$action = $_GET['action'];
$subjectname = '';
if ($action === "getgraphclass") {
    $classid = $_GET['classid'];
    $session = $_GET['session'];
    $termz = $_GET['termz'];
    $classname = getclassname($classid);
    $getstdnewapproach = getstdsclass($classid, $termz, $session);
    $getscoresnnewapproach = getscresclass($classid, $termz, $session);
    $getresultstabular = getstdsclasstabular($classid, $termz, $session);
    //echo $getstdnewapproach . " - " . $getscoresnnewapproach;
    echo "<span style='font-size:20px; font-weight:500'><div style='text-align:center'>PERFORMANCE REPORT</div>$classname <br>$session($termz) </span> . $getresultstabular";
}

if ($action === "getgraph") {
    $classid = $_GET['classid'];
    $subjectid = $_GET['subjectid'];
    $session = $_GET['session'];
    $termz = $_GET['termz'];
    $classname = getclassname($classid);
    $subjectname = getsubjectname($subjectid);
    $getstdnewapproach = getstds($classid, $subjectid, $termz, $session);
    $getscoresnnewapproach = getscres($classid, $subjectid, $termz, $session);
    $getresultstabular = getstdssubjecttabular($classid, $termz, $session, $subjectid);
    echo "<div style='text-align:center; margin-bottom:20px;font-size:18px'><div><span style='font-size:25px; font-weight:600'>$classname report <span style='font-size:14px'>($session - $termz)</span><br> $subjectname</span>$getresultstabular</div></div>";
}

function getcummaverage($term, $session, $classid, $stdid) {
    $firsttermscore = getscore($classid, $session, "1st term", $stdid);
    $secondtermscore = getscore($classid, $session, "2nd term", $stdid);
    $thirdtermscore = getscore($classid, $session, "3rd term", $stdid);
    $totalobtainable = gettotalpossiblescoresgperstd($stdid, $term, $session, $classid, 'fullterm');

    if ($term === "1st Term") {
        $ht = number_format(($firsttermscore/$totalobtainable)*100,2);
        return $ht;
    }

    if ($term === "2nd Term") {
        if ($firsttermscore <1){
            //$average = ceil(($firsttermscore + $secondtermscore) / 2);
        $ht = number_format(($secondtermscore/$totalobtainable)*100,2);
        return $ht;
        }else{
            $average = ceil(($firsttermscore + $secondtermscore) / 2);
        $ht = number_format((($average/$totalobtainable)*100),2);
        //return "45%";
        return $ht;
        }
    }

    if ($term === "3rd Term") {
        if ($firsttermscore < 1 && $secondtermscore < 1 && $thirdtermscore > 0){
            return number_format(($thirdtermscore/$totalobtainable)*100,2);
        }
        if ($firsttermscore < 1 && $secondtermscore > 0 && $thirdtermscore < 1){
            return number_format(($secondtermscore/$totalobtainable)*100,2);
        }
        if ($firsttermscore < 1 && $secondtermscore > 0 && $thirdtermscore > 0){
            $average = ceil(($secondtermscore + $thirdtermscore)/2);
            return number_format(($average/$totalobtainable)*100,2);
        }
        if ($firsttermscore > 0 && $secondtermscore < 1 && $thirdtermscore < 1){
            return number_format(($firsttermscore/$totalobtainable)*100,2);
        }
        if ($firsttermscore > 0 && $secondtermscore < 1 && $thirdtermscore > 0){
            $average = ceil(($firsttermscore + $thirdtermscore)/2);
            return number_format(($average/$totalobtainable)*100,2);
        }
        if ($firsttermscore > 0 && $secondtermscore > 0 && $thirdtermscore < 1){
            $average = ceil(($firsttermscore + $secondtermscore)/2);
            return number_format(($average/$totalobtainable)*100,2);
            //return 56;
        }
        if ($firsttermscore > 0 && $secondtermscore > 0 && $thirdtermscore > 0){
            $average = ceil(($firsttermscore + $secondtermscore + $thirdtermscore)/3);
            $ht = ($average/$totalobtainable)*100;
            $ft = number_format($ht,2);
            return $ht;
        }

/*
        if ($firsttermscore < 1 && $secondtermscore > 0 && $thirdtermscore > 0){
            $average = ceil(($secondtermscore + $thirdtermscore)/2);
            return number_format(($average/$totalobtainable)*100,2);
        }if ($firsttermscore > 0 && $secondtermscore < 1){
            $average = ceil(($firsttermscore + $thirdtermscore)/2);
            return number_format(($average/$totalobtainable)*100,2);
        }else{
            $average = ceil(($firsttermscore + $secondtermscore + $thirdtermscore) / 3);
        return 67;;
        //return number_format(($average/$totalobtainable)*100,2);
        }
      */  
    }
}

function getscore($classid, $session, $term, $stdid) {
    $firstca = getresultg($classid, $session, $term, 'first', $stdid);
    $secondca = getresultg($classid, $session, $term, 'second', $stdid);
    $thirdca = getresultg($classid, $session, $term, 'third', $stdid);
    $exam = getresultg($classid, $session, $term, 'exam', $stdid);
    $total = $firstca + $secondca + $thirdca + $exam;

    return $total;
}

function getresultg($classid, $session, $term, $reslttype, $stdid) {
    global $w;
    $h = "select result from playnurresult where classid='$classid' and session='$session' and term='$term' and firstsecondthirdexam='$reslttype' and studentid ='$stdid' order by dateadded desc";
    $g = mysqli_query($w, $h);
    $rez = 0;
    while($xs = mysqli_fetch_array($g)){
    $result = $xs['result'];
    $rez += $result;    
    }
    return $rez;
}



if ($action === "preparerecordclass") {
    
    $classid = $_GET['classid'];
    $session = $_GET['session'];
    $termz = $_GET['termz'];
    //echo "This prepares record class for $term and $sess and $clasid";

    $t = mysqli_query($w, "select * from schstudent where ClassID='$classid'");
    $result = "";
    $status = "";
    while ($gt = mysqli_fetch_array($t)) {
        $stdid = $gt['schoolid'];
        //$aggscore = getaggregateclassscore($classid, $termz, $session, $stdid);
        $aggscore = getcummaverage($termz, $session, $classid, $stdid);
        $j = mysqli_query($w, "insert into gradebyclass (studentid, classid, session, term, aggregatescore) values ('$stdid','$classid','$session','$termz','$aggscore')");
        if ($j) {
            $status = "<div style='font-size:25px; margin-top:20px; text-align:center'>Result has been prepared.</div>";
        } else {
            $ut = "update gradebyclass set aggregatescore='$aggscore' where studentid='$stdid' and classid='$classid' and session='$session' and term='$termz'";
            $gt = mysqli_query($w, $ut);
            if ($gt) {
                $status = "<div style='font-size:25px; margin-top:20px; text-align:center'>Result report has been re-prepared successfully <br><input type='button' class='btn btn-primary' onclick=\"getgraph('subject')\" value='Get Subject Graph' style='width:300px'></div>";
            } else {
                $status = "<div style='font-size:25px; margin-top:20px'>Class report re-preparation pended.</div>";
            }
        }
    }
    echo $status;
}

//$getstudentnames = getstudentsinorderofscores($classid);
//$getscoresinorder = getscores($subjectid, $classid, $termz, $session);

function getstdssubjecttabular($classid, $termz, $session, $subjectid) {
    global $w;
    $j = "select studentid,aggregatescore from gradebysubject where classid='$classid' and term='$termz' and session='$session' and subjectid='$subjectid' order by aggregatescore desc";
    $jh = mysqli_query($w, $j);
    $std = "<br><br><table class='table table-stripped table-condensed table-bordered'><tr style='font-weight:600; font-size:20px'><td></td><td>Student Name</td><td>Score (Highest to Lowest)</td></tr>";
    $count =1;
    while ($h = mysqli_fetch_array($jh)) {
        $sn = $h['studentid'];
        $scor = $h['aggregatescore'];
        $stdid = getstudentname($sn);
        $std .= "<tr style='font-size:12px'><td>$count</td><td>" . $stdid . "</td><td>$scor</td></tr>";
        $count++;
    }
    return $std."</table>";
}

function getstdsclasstabular($classid, $termz, $session) {
    global $w;
    $j = "select studentid,aggregatescore from gradebyclass where classid='$classid' and term='$termz' and session='$session' order by aggregatescore desc";
    $jh = mysqli_query($w, $j);
    $std = "<br><br><table class='table table-stripped table-condensed table-bordered'><tr style='font-weight:600; font-size:20px'><td></td><td>Student Name</td><td>Score (Highest to Lowest)</td></tr>";
    $count =1;
    while ($h = mysqli_fetch_array($jh)) {
        $sn = $h['studentid'];
        $scor = $h['aggregatescore'];
        $stdid = getstudentname($sn);
        $std .= "<tr style='font-size:12px'><td>$count</td><td>" . $stdid . "</td><td>$scor</td></tr>";
        $count++;
    }
    return $std."</table>";
}

function getstdsclass($classid, $termz, $session) {
    global $w;
    $j = "select studentid from gradebyclass where classid='$classid' and term='$termz' and session='$session' order by aggregatescore desc";
    $jh = mysqli_query($w, $j);
    $std = "";
    while ($h = mysqli_fetch_array($jh)) {
        $sn = $h['studentid'];
        $stdid = getstudentname($sn);
        $std .= "'" . $stdid . "',";
    }
    return $std;
}

function getscresclass($classid, $termz, $session) {
    global $w;
    $j = "select aggregatescore from gradebyclass where classid='$classid' and term='$termz' and session='$session' order by aggregatescore desc";
    $jh = mysqli_query($w, $j);
    $score = "";
    while ($h = mysqli_fetch_array($jh)) {
        $scor = $h['aggregatescore'];
        $score .= $scor . ",";
    }
    return $score;
}

function getscres($classid, $subjectid, $termz, $session) {
    global $w;
    $j = "select aggregatescore from gradebysubject where classid='$classid' and subjectid='$subjectid' and term='$termz' and session='$session' order by aggregatescore desc";
    $jh = mysqli_query($w, $j);
    $score = "";
    while ($h = mysqli_fetch_array($jh)) {
        $scor = $h['aggregatescore'];
        $score .= $scor . ",";
    }
    return $score;
}

function getstds($classid, $subjectid, $termz, $session) {
    global $w;
    $j = "select studentid from gradebysubject where classid='$classid' and subjectid='$subjectid' and term='$termz' and session='$session' order by aggregatescore desc";
    $jh = mysqli_query($w, $j);
    $std = "";
    while ($h = mysqli_fetch_array($jh)) {
        $sn = $h['studentid'];
        $stdid = getstudentname($sn);
        $std .= "'" . $stdid . "',";
    }
    return $std;
}

function gettotalpossiblescoresgperstd($stdid, $term, $session, $stdclass, $resulttype) {
    //return "$resulttype";
    global $w;
    $q = "select distinct(subjectid) from playnurresult where studentid='$stdid' and term='$term' and session='$session' and result > '0'";
    $a = mysqli_query($w, $q);

    //Get the 
    $vg = mysqli_num_rows($a);
    //return $vg;
    if ($resulttype === "midterm") {

        return ($vg * 40);
    } else {
        return ($vg * 100);
    }
}

function getcummaveragerr($term, $session, $classid, $stdid, $subjectid) {
    $firsttermscore = getscoreg($classid, $session, "1st term", $stdid, $subjectid);
    $secondtermscore = getscoreg($classid, $session, "2nd term", $stdid, $subjectid);
    $thirdtermscore = getscoreg($classid, $session, "3rd term", $stdid, $subjectid);
    //getcummaverage($term, $session, $classid)
    $totalobtainable = gettotalpossiblescoresgperstd($stdid, $term, $session, $classid, 'fullterm');

    //return $totalobtainable;
    if ($term === "1st Term") {
        //return number_format(($firsttermscore/$totalobtainable),2);
        return $firsttermscore;
    }
    if ($term === "2nd Term") {
        if ($firsttermscore <1){
            $average = ceil(($firsttermscore + $secondtermscore) / 2);
            return $secondtermscore;
        //return number_format(($secondtermscore/$totalobtainable),2);
        }else{
            $average = ceil(($firsttermscore + $secondtermscore) / 2);
        return number_format(($average),2);
        }
        
    }
    if ($term === "3rd Term") {
        if ($firsttermscore < 1 && $secondtermscore < 1){
            return $thirdtermscore;
        }
        if ($firsttermscore < 1 && $secondtermscore > 0){
            $average = ceil(($secondtermscore + $thirdtermscore)/2);
            return $average;
        }if ($firsttermscore > 0 && $secondtermscore < 1){
            $average = ceil(($firsttermscore + $thirdtermscore)/2);
            return $average;
        }else{
            $average = ceil(($firsttermscore + $secondtermscore + $thirdtermscore) / 3);
        return $average;
        }
        
    }
}

function getscoreg($classid, $session, $term, $stdid, $subjectid) {
    $firstca = getresultgg($classid, $session, $term, 'first', $stdid, $subjectid);
    $secondca = getresultgg($classid, $session, $term, 'second', $stdid, $subjectid);
    $thirdca = getresultgg($classid, $session, $term, 'third', $stdid, $subjectid);
    $exam = getresultgg($classid, $session, $term, 'exam', $stdid, $subjectid);
    $total = $firstca + $secondca + $thirdca + $exam;

    return $total;
}

function getresultgg($classid, $session, $term, $reslttype, $stdid, $subid) {
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

if ($action === "preparerecord") {
    $classid = $_GET['classid'];
    $subjectid = $_GET['subjectid'];
    $session = $_GET['session'];
    $termz = $_GET['termz'];
    $t = mysqli_query($w, "select * from schstudent where ClassID='$classid'");
    $result = "";
    $status = "";
    while ($gt = mysqli_fetch_array($t)) {
        $stdid = $gt['schoolid'];
        //$aggscore = getaggregatescore($subjectid, $classid, $termz, $session, $stdid);
        $aggscore =getcummaveragerr($termz, $session, $classid, $stdid, $subjectid);
        $j = mysqli_query($w, "insert into gradebysubject (studentid, subjectid, classid, session, term, aggregatescore) values ('$stdid','$subjectid','$classid','$session','$termz','$aggscore')");
        if ($j) {
            $status = "<div style='font-size:25px; margin-top:20px'>Result has been prepared.</div>";
        } else {
            $ut = "update gradebysubject set aggregatescore='$aggscore' where studentid='$stdid' and subjectid='$subjectid' and classid='$classid' and session='$session' and term='$termz'";
            $gt = mysqli_query($w, $ut);
            if ($gt) {
                $status = "<div style='font-size:25px; margin-top:20px; text-align:center'>Result report has been re-prepared successfully <br><input type='button' class='btn btn-primary' onclick=\"getgraph('subject')\" value='Get Subject Graph' style='width:300px'></div>";
            } else {
                $status = "<div style='font-size:25px; margin-top:20px'>Report re-preparation pended.</div>";
            }
        }
    }
    echo $status;
}

if ($action === "getgraph") {
    
}

function getstudentsinorderofscores($classid) {
    global $w, $classid, $subjectid, $session, $term;
    $t = mysqli_query($w, "select * from schstudent where ClassID='$classid'");
    $namelist = "";
    while ($gt = mysqli_fetch_array($t)) {
        $namelis = $gt['Surname'] . " " . $gt['Firstname'];
        $namelist .= "'$namelis',";
    }
    return $namelist;
}

function getscores($subjectid, $classid, $term, $session) {
    global $w;

    $t = mysqli_query($w, "select * from schstudent where ClassID='$classid'");
    $result = "";
    while ($gt = mysqli_fetch_array($t)) {
        $stdid = $gt['schoolid'];
        $res = getaggregatescore($subjectid, $classid, $term, $session, $stdid);
        $result .= $res . ",";
    }
    return $result;
}

function getaggregateclassscore($classid, $term, $session, $stdid) {
    global $w;
    $qw = "select result from playnurresult where studentid='$stdid' and term='$term' and session='$session'";
    $q = mysqli_query($w, $qw);
    $result = 0;
    while ($b = mysqli_fetch_array($q)) {
        $res = $b['result'];
        $result += $res;
    }
    return $result;
}

function getaggregatescore($sbjctid, $classid, $term, $session, $stdid) {
    global $w;
    $qw = "select result from playnurresult where studentid='$stdid' and term='$term' and session='$session' and subjectid='$sbjctid'";
    $q = mysqli_query($w, $qw);
    $result = 0;
    while ($b = mysqli_fetch_array($q)) {
        $res = $b['result'];
        $result += $res;
    }
    return $result;
}
?>

<canvas id='myChartvitals' width='400' height='250'></canvas>
<script>
    var ctx = document.getElementById('myChartvitals').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?= $getstdnewapproach ?>],
            datasets: [{
                    label: 'Studentnames',
                    data: [<?= $getscoresnnewapproach ?>],
                    backgroundColor: [
                        'rgba(21, 42, 63, 0.2)'
                    ],
                    borderColor: [
                        'rgba(21,42,63,1)'
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });
</script>