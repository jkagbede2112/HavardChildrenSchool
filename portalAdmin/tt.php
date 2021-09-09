
<?php
//classid=" + classid + "&subjectid="+subjectid+"&session"+session+"&term"+term
include 'PHP/databaseSQLconnectn.php';
include 'PHP/validateinput.php';

$action = $_GET['action'];
$classid = $_GET['classid'];
$subjectid = $_GET['subjectid'];
$session = $_GET['session'];
$termz = $_GET['termz'];

$classname = getclassname($classid);
//getsubjectname
$subjectname = getsubjectname($subjectid);

$getstudentnames = getstudentsinorderofscores($classid);
$getscoresinorder = getscores($subjectid, $classid, $termz, $session);

echo "<div style='text-align:center; margin-bottom:20px;font-size:18px'><div><span style='font-size:25px; font-weight:600'>$classname report</span></div> $subjectname - $session - $termz report</div>";

if ($action === "preparerecord"){
$subid = $subjectid;
$clasid = $classid;
$sess = $session;
$term = $termz;
//Get studentIDs 
$t = mysqli_query($w,"select * from schstudent where ClassID='$classid'");
    $result = "";
    while ($gt = mysqli_fetch_array($t)){
$stdid = $gt['schoolid'];
//Get aggregate score per student
$aggscore = getaggregatescore($subid, $clasid, $term, $session, $stdid);
//Insert students score in table
//echo "We are inserting the following - Studentid($stdid), subjectid($subid), Classid($clasid), Term($term), Session($session), Result($aggscore)";
$j = mysqli_query($w, "insert into gradebysubject (studentid, subjectid, classid, session, term, aggregatescore) values ('$stdid','$subid','$clasid','$session','$term','$aggscore')");
    }
if ($j){
    echo "<div style='font-size:25px; margin-top:20px'>Result has been prepared.</div>";
}else{
    $ut = "update gradebysubject set aggregatescore='$aggscore' where studentid='$stdid' and subjectid='$subid' and classid='$clasid' and session='$session' and term='$term'";
    echo "<br>".$ut;
    $gt = mysqli_query($w, $ut);
    if ($gt){
        echo "<div style='font-size:25px; margin-top:20px; text-align:center'>Result report has been re-prepared successfully <br><input type='button' class='btn btn-primary' onclick=\"getgraph('subject')\" value='Get Subject Graph' style='width:300px'></div>";
    }else{
        echo "<div style='font-size:25px; margin-top:20px'>Report re-preparation pended.</div>";
    }
    
}
}

function getstudentsinorderofscores($classid){
    global $w, $classid, $subjectid, $session, $term;
    $t = mysqli_query($w,"select * from schstudent where ClassID='$classid'");
    $namelist = "";
    while ($gt = mysqli_fetch_array($t)){
$namelis = $gt['Surname'] . " " . $gt['Firstname'];
$namelist .= "'$namelis',";
    }
    return $namelist;
}

function getscores($subjectid, $classid, $term, $session){
global $w;

$t = mysqli_query($w,"select * from schstudent where ClassID='$classid'");
    $result = "";
    while ($gt = mysqli_fetch_array($t)){
$stdid = $gt['schoolid'];
$res = getaggregatescore($subjectid, $classid, $term, $session, $stdid);
$result .= $res .",";
    }
    return $result;
}

function getaggregatescore($sbjctid, $classid, $term, $session, $stdid){
    global $w;
    $qw = "select result from playnurresult where studentid='$stdid' and term='$term' and session='$session' and subjectid='$sbjctid'";
    $q = mysqli_query($w, $qw);
    $result = 0;
    while ($b = mysqli_fetch_array($q)){
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
            labels: [<?= $getstudentnames ?>],
            datasets: [{
                    label: 'Studentnames',
                    data: [<?= $getscoresinorder ?>],
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