<?php

include 'databaseSQLconnectn.php';

$sol = "<a href='http://www.uberit.org?app=uberschools&licensekey=uberapp768346F7HCSA' target='_blank' style='decoration:no-decoration;'>UberSchools - 2018</a>";

function getgradelevelproprietresscomment($restype, $stdid, $term, $session) {
    $stdclass = getstclassidfromschoolid($stdid);
    $totalscorespossible = gettotalpossiblescores($stdclass);
    $totalscores = gettotalscores($stdid, $term, $session);
    $score = ceil(($totalscores / $totalscorespossible) * 100);

return "";

    $comment = "";
    if ($score >= 90) {
        $comment = "Excellent";
    } elseif ($score >= 80 && $score <= 89) {
        $comment = "Very Good";
    } elseif ($score >= 70 && $score <= 79) {
        $comment = "Credit";
    } elseif ($score >= 60 && $score <= 69) {
        $comment = "Credit";
    } elseif ($score >= 50 && $score <= 59) {
        $comment = "Credit";
    } elseif ($score >= 40 && $score <= 49) {
        $comment = "Pass";
    } elseif ($score < 40) {
        $comment = "Fail";
    }
    return $comment;
}

function gettotalscores($stdid, $term, $session) {
    global $w;
    $p = "select * from playnurresult where studentid='$stdid' and term='$term' and session='$session'";

    $q = mysqli_query($w, $p);
    $score = 0;
    while ($az = mysqli_fetch_array($q)) {
        $result = $az['result'];
        $score += $result;
    }
    return $score;
}

function gettotalpossiblescores($stdclass) {
    global $w;
    $q = "select * from subjects where SubjectCategoryid='$stdclass'";
    $a = mysqli_query($w, $q);
    $vg = mysqli_num_rows($a);
    return ($vg * 100);
}

function getstclassidfromschoolid($schoolid) {
    global $w;
    $hg = "select ClassID from schstudent where schoolid='$schoolid'";
    $j = mysqli_query($w, $hg);
    $jq = mysqli_fetch_array($j);
    $k = $jq['ClassID'];
    return $k;
}

function getamtpaid($stdid, $term, $session) {
    global $w;
    $j = "select amountpaid from paymentsmade where stdid ='$stdid' and term='$term' and session='$session'";
    $hq = mysqli_query($w, $j);
    $amt = 0;
    while ($hqa = mysqli_fetch_array($hq)) {
        $amt += $hqa['amountpaid'];
    }
    return $amt;
}

function getamttopay($stdid, $term, $session) {
    global $w;
    $j = "select billitemamount from payschoolbill where studentid ='$stdid' and term='$term' and session='$session'";
    $hq = mysqli_query($w, $j);
    $amt = 0;
    while ($hqa = mysqli_fetch_array($hq)) {
        $amt += $hqa['billitemamount'];
    }
    return $amt;
}

function nexterm($term, $session) {
    global $w;
    $ht = "select nextermbegins from schoolresumes where term='$term' and session='$session'";
    $hi = mysqli_query($w, $ht);
    $qa = mysqli_fetch_array($hi);
    $termbegins = $qa['nextermbegins'];
    return $termbegins;
}

function getclasmedal($stdid, $term, $session) {
    global $w;
    $hf = "select * from classmedal where session='$session' and term='$term' and studentid='$stdid'";
    $qas = mysqli_query($w,$hf);
    $v = mysqli_fetch_array($qas);
    $medal = $v['medal'];
    return $medal;
}

function getothercomment($std, $term, $session) {
    global $w;
    $hf = "select * from othercomment where session='$session' and term='$term' and stdid='$std'";
    $qas = mysqli_query($w,$hf);
    $v = mysqli_fetch_array($qas);
    $medal = $v['comment'];
    
    return $medal;
}

function getparphone($parentid) {
    global $w;
    $j = "select phoneNumber from parentsregister where ParentID='$parentid'";
    $h = mysqli_query($w, $j);
    $u = mysqli_fetch_array($h);
    $phonenumber = $u['phoneNumber'];
    return $phonenumber;
}

function getparemail($parentid) {
    global $w;
    $j = "select Email from parentsregister where ParentID='$parentid'";
    $h = mysqli_query($w, $j);
    $u = mysqli_fetch_array($h);
    $email = $u['Email'];
    return $email;
}

function getparidfromlink($studentid) {
    global $w;
    $u = "select ParentID from linkages where StudentID='$studentid'";
    $h = mysqli_query($w, $u);
    $f = mysqli_fetch_array($h);
    $parentid = $f['ParentID'];
    return $parentid;
}

function getteacheridfromstudentid($stdid) {
    global $w;
    //getclassid
    $classid = getclassidfromschid($stdid);
    //get teacherid
    /*
      $j = "select teacherid from schclass where SN='$classid'";
      $i = mysqli_query($w, $j);
      $m = mysqli_fetch_array($i);
      $teacherid = $m['ClassTeacher'];

      $teachername = "select StaffName from schstaff where StaffID='$teacherid'";
      $hi = mysqli_query($w, $teachername);
      $p = mysqli_fetch_array($hi);
      $teachname = $p['StaffName'];
      return $teachname;
     * 
     */
    global $w;
    $j = "select ClassTeacher from schclass where SN='$classid'";
    $i = mysqli_query($w, $j);
    $m = mysqli_fetch_array($i);
    $teacherid = $m['ClassTeacher'];

    $teachername = "select StaffName from schstaff where StaffID='$teacherid'";
    $hi = mysqli_query($w, $teachername);
    $p = mysqli_fetch_array($hi);
    $teachname = $p['StaffName'];
    return $teachname;
    return "4";
}

function getteachercomment($std, $term, $session, $resulttype) {
    global $w;
    $j = "select * from teacherscomment where studentid='$std' and term='$term' and session='$session' and resulttype='$resulttype'";
    //echo $j;
    $s = mysqli_query($w, $j);
    $x = mysqli_fetch_array($s);
    $comment = $x['comment'];
    return $comment;
}


function getproprietresscomment($std, $term, $session) {
    global $w;
    $j = "select * from proprietresscomment where stdid='$std' and term='$term' and session='$session'";
    //echo $j;
    $s = mysqli_query($w, $j);
    $x = mysqli_fetch_array($s);
    $comment = $x['comment'];
    //return $j;
    return $comment;
}

function getclasstype($classid) {
    global $w;
    $h = "select schooltype, ClassName from schclass where SN='$classid'";
    $g = mysqli_query($w, $h);
    $a = mysqli_fetch_array($g);
    //$schooltype = $a['schooltype'];
    $classname = $a['ClassName'];
    return $classname;
}

function schooladdy() {
    global $w;
    $q = "select address from schoolinfo";
    $e = mysqli_query($w, $q);
    $r = mysqli_fetch_array($e);
    $t = $r['address'];
    return $t;
}

function getsignaturefromclassid($classid) {
    global $w;
    $j = "select ClassTeacher from schclass where SN='$classid'";
    $i = mysqli_query($w, $j);
    $m = mysqli_fetch_array($i);
    $teacherid = $m['ClassTeacher'];

    $teachersignature = "select signature from schstaff where StaffID='$teacherid'";
    $hi = mysqli_query($w, $teachersignature);
    $p = mysqli_fetch_array($hi);
    $signature = $p['signature'];
    return $signature;
}

function getteachername($classid) {
    global $w;
    $j = "select ClassTeacher from schclass where SN='$classid'";
    $i = mysqli_query($w, $j);
    $m = mysqli_fetch_array($i);
    $teacherid = $m['ClassTeacher'];

    $teachername = "select StaffName from schstaff where StaffID='$teacherid'";
    $hi = mysqli_query($w, $teachername);
    $p = mysqli_fetch_array($hi);
    $teachname = $p['StaffName'];
    return $teachname;
}

function getresult($classid, $session, $term, $studentid, $subjectid) {
    global $w;
    $h = "select result from playnurresult where studentid='$studentid' and term = '$term' and session = '$session' and classid='$classid' and subjectid='$subjectid' order by dateadded desc";
    $c = mysqli_query($w, $h);
    $u = mysqli_fetch_array($c);
    $res = $u['result'];
    if (strlen($res) < 1) {
        $res = "";
    }
    return "$res";
}

function getproprietresssignature() {
    global $w;
    $jut = "select signature from schoolinfo";
    $hq = mysqli_query($w, $jut);
    $uq = mysqli_fetch_array($hq);
    $signature = $uq['signature'];

    return "PHP/" . $signature;
}

function getstdcount($classid) {
    global $w;
    $h = "select count(*) as stdcount from schstudent where ClassID='$classid'";
    $j = mysqli_query($w, $h);
    $q = mysqli_fetch_array($j);
    $count = $q['stdcount'];
    return $count;
}

function getproprietress() {
    global $w;
    $j = "select * from schoolinfo";
    $i = mysqli_query($w, $j);
    $q = mysqli_fetch_array($i);
    $prop = $q['schoolproprietress'];
    return strtoupper($prop);
}

function getsubjectgroupname($id) {
    global $w;
    if ($id === "0") {

        return "Unclassified";
    }
    $qj = "select * from subjectcat where catid='$id'";
    $y = mysqli_query($w, $qj);
    $i = mysqli_fetch_array($y);
    $subjectcatname = $i['subjectcatname'];
    return $subjectcatname;
}

function getschooltype($classid) {
    global $w;
    $k = "select schooltype from schclass where SN='$classid'";
    $h = mysqli_query($w, $k);
    $i = mysqli_fetch_array($h);
    $schooltypeid = $i['schooltype'];
    //Get schooltype id
    $xf = "select typename from schooltypes where typeid='$schooltypeid'";
    $ki = mysqli_query($w, $xf);
    $q = mysqli_fetch_array($ki);
    $schooltypename = $q['typename'];
    return $schooltypename;
}

function getlga($studentid) {
    global $w;
    $j = "select * from lga where schoolid='$studentid'";
    $m = mysqli_query($w, $j);
    $g = mysqli_fetch_array($m);
    $lga = $g['lga'];
    return $lga;
}

function getstudentname($studentid) {
    global $w;
    $j = "select * from schstudent where schoolid='$studentid'";
    $m = mysqli_query($w, $j);
    $g = mysqli_fetch_array($m);
    $name = $g['Surname'] . " " . $g['Middlename'] . " " . $g['Firstname']; 
    return $name;
}

//getschoolid

function getschoolid($studentid) {
    global $w;
    $j = "select * from schstudent where StudentID='$studentid'";
    $m = mysqli_query($w, $j);
    $g = mysqli_fetch_array($m);
    $schoolid = $g['Surname'];
    return $schoolid;
}

function getstudentnamefromsn($studentid) {
    global $w;
    $j = "select * from schstudent where StudentID='$studentid'";
    $m = mysqli_query($w, $j);
    $g = mysqli_fetch_array($m);
    $name = $g['Surname'] . " " . $g['Firstname'];
    return $name;
}

function getstdgender($stdid) {
    global $w;
    $i = "select gender from schstudent where schoolid='$stdid'";
    $q = mysqli_query($w, $i);
    $u = mysqli_fetch_array($q);
    $gender = $u['gender'];
    return $gender;
}

function getstdhomeAdd($stdid) {
    global $w;
    $i = "select HomeAddress from schstudent where schoolid='$stdid'";
    $q = mysqli_query($w, $i);
    $u = mysqli_fetch_array($q);
    $HA = $u['HomeAddress'];
    return $HA;
}

function getnationality($stdid) {
    global $w;
    $i = "select nationality from schstudent where schoolid='$stdid'";
    $q = mysqli_query($w, $i);
    $u = mysqli_fetch_array($q);
    $HA = $u['nationality'];
    return $HA;
}

function gethealthstatus($stdid) {
    global $w;
    $i = "select healthstatus from schstudent where schoolid='$stdid'";
    $q = mysqli_query($w, $i);
    $u = mysqli_fetch_array($q);
    $HA = $u['healthstatus'];
    return $HA;
}

function getreligion($stdid) {
    global $w;
    $i = "select religion from schstudent where schoolid='$stdid'";
    $q = mysqli_query($w, $i);
    $u = mysqli_fetch_array($q);
    $HA = $u['religion'];
    return $HA;
}

function getgenotype($stdid) {
    global $w;
    $i = "select Genotype from schstudent where schoolid='$stdid'";
    $q = mysqli_query($w, $i);
    $u = mysqli_fetch_array($q);
    $HA = $u['Genotype'];
    return $HA;
}

function getprevschool($stdid) {
    global $w;
    $i = "select Prevschools from schstudent where schoolid='$stdid'";
    $q = mysqli_query($w, $i);
    $u = mysqli_fetch_array($q);
    $HA = $u['Prevschools'];
    return $HA;
}

function getstdstateoforigin($stdid) {
    global $w;
    $i = "select stateoforigin from schstudent where schoolid='$stdid'";
    $q = mysqli_query($w, $i);
    $u = mysqli_fetch_array($q);
    $soo = $u['stateoforigin'];
    return $soo;
}

function getdateofbirthfromschid($stdid) {
    global $w;
    $h = "select dateofbirth from schstudent where schoolid='$stdid'";
    $j = mysqli_query($w, $h);
    $k = mysqli_fetch_array($j);
    $dob = $k['dateofbirth'];
    return $dob;
}

function getsubjectcategoryname($sbjgrpid) {
    if ($sbjgrpid === "0") {
        return "Unclassified subject";
    }
    global $w;
    $q = "select subjectname from subjectcat where catid='$sbjgrpid'";
    $h = mysqli_query($w, $q);
    $b = mysqli_fetch_array($h);
    $subname = $b['subjectname'];
    return $subname;
}

function getclassidfromschid($stdid) {
    global $w;
    $h = "select ClassID from schstudent where schoolid='$stdid'";
    $j = mysqli_query($w, $h);
    $k = mysqli_fetch_array($j);
    $classid = $k['ClassID'];
    return $classid;
}

function getteachersnamefromid($id) {
    global $w;
    $j = "select StaffName from schstaff where StaffID='$id'";
    $q = mysqli_query($w, $j);
    $a = mysqli_fetch_array($q);
    $name = $a['StaffName'];
    //if ($name)
    return $name;
}

function validate($element) {
    $rcvd = $_POST[$element];

    $element = strip_tags($rcvd);
    $element = str_replace("'", "", $element);
    $element = str_replace('"', '', $element);
    $element = str_replace('|', '', $element);
    $element = str_replace('*', '', $element);
    $element = trim($element);
    return $element;
}

function validatemessage($email) {
    $rcvd = $_POST[$email];
    $element = strip_tags($rcvd, '<p><b><i><font><br/>');
    return $element;
}

function getclassname($classid) {
    global $w;
    $h = "select ClassName from schclass where SN='$classid'";
    $j = mysqli_query($w, $h);
    $q = mysqli_fetch_array($j);
    $classname = $q['ClassName'];
    return $classname;
}

function getsubjectname($subjectid) {
    global $w;
    $h = "select * from subjects where sn='$subjectid'";
    $x = mysqli_query($w, $h);
    $l = mysqli_fetch_array($x);
    $subjectname = $l['SubjectName'];
    return $subjectname;
}
