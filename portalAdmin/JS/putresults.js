function getstddemographforput(stdid, sess, term, pp) {
    $.post("PHP/getreportcard.php", {action: "getdemograph", studentid: stdid, session: sess, term: term}).done(function (data) {
        var content = data;
        {
            var parser = document.createElement("div");
            parser.innerHTML = content;
            var studentid = parser.getElementsByTagName('a')[0];
            var stdname = parser.getElementsByTagName('b')[0];
            var term = parser.getElementsByTagName('c')[0];
            var classcount = parser.getElementsByTagName('d')[0];
            var classname = parser.getElementsByTagName('e')[0];
            var session = parser.getElementsByTagName('f')[0];
            var teacher = parser.getElementsByTagName('g')[0];
            var proprietress = parser.getElementsByTagName('h')[0];

            document.getElementById("stdname" + pp).innerHTML = stdname.innerText;
            document.getElementById("term" + pp).innerHTML = term.innerText;
            document.getElementById("classnum" + pp).innerHTML = classcount.innerText;
            document.getElementById("classname" + pp).innerHTML = classname.innerText;
            document.getElementById("acayear" + pp).innerHTML = session.innerText;
            document.getElementById("teachname" + pp).innerHTML = teacher.innerText;
            document.getElementById("propname" + pp).innerHTML = proprietress.innerText;
            document.getElementById("idnumber" + pp).innerHTML = studentid.innerText;
        }
    });
}

function putrespg(sessi, termm, studentids, restype) {
    //alert(restype);
    var sess = document.getElementById(sessi).value;
    var term = document.getElementById(termm).value;
    var studentid = document.getElementById(studentids).value;
    var action = restype;
    $.post("PHP/putreportcard.php", {action: action, session: sess, term: term, studentid: studentid}).done(function (data) {
        document.getElementById("dashrepcards").innerHTML = data;
    });
    getstddemographforput(studentid, sess, term, 'pg');
    getattendance(studentid, sess, term);//pgphoto
    getpassportphoto(studentid, "pgphoto");
}

function putresrec() {
    var sess = document.getElementById("ress").value;
    var studentid = document.getElementById("resrecsn").value;
    var term = document.getElementById("resrt").value;
    //alert(studentid + " " + sess + " " + term);
    var action = "reception";
    $.post("PHP/putreportcard.php", {action: action, session: sess, term: term, studentid: studentid}).done(function (data) {
        document.getElementById("dashrepcard").innerHTML = data;
    });
    getstddemograph(studentid, sess, term, 'r');
    getattendanceres(studentid, sess, term);//recphoto
    getpassportphoto(studentid, "recphoto");
}

function putresnur() {
    var sess = document.getElementById("resnurs").value;
    var term = document.getElementById("resnurt").value;
    var studentid = document.getElementById("resnursn").value;
    //alert(sess + " " + studentid + " " + term);
    var action = "nursery1";
    $.post("PHP/putreportcard.php", {action: action, session: sess, term: term, studentid: studentid}).done(function (data) {
        document.getElementById("dashnurocard").innerHTML = data;
        //alert(data);
    });
    getstddemograph(studentid, sess, term, 'no');
    getattendancenur(studentid, sess, term);
    getpassportphoto(studentid, "nurophoto");
}

function putresnurt() {
    var sess = document.getElementById("resnurts").value;
    var term = document.getElementById("resnurtt").value;
    var studentid = document.getElementById("resnurtsn").value;//
    var resulttype = document.getElementById("reztype").value;
    //alert(sess + " " + studentid + " " + term);
    if (resulttype === "midterm") {
        var action = "nursery2mid";
        $.post("PHP/putreportcard.php", {action: action, session: sess, term: term, studentid: studentid, resulttype: resulttype}).done(function (data) {
            document.getElementById("dashnurtcard").innerHTML = data;
            //alert(data);
        });
    }

    if (resulttype === "fullterm") {
        var action = "nurseryt";
        $.post("PHP/putreportcard.php", {action: action, session: sess, term: term, studentid: studentid, resulttype: resulttype}).done(function (data) {
            document.getElementById("dashnurtcard").innerHTML = data;
            //alert(data);
        });
    }

    getstddemograph(studentid, sess, term, 'nt');
    getattendancenurt(studentid, sess, term);
    getpassportphoto(studentid, "nurtphoto");
    //getobtainables(studentid, "cdcddttt", term, sess);
    getobtainabless(studentid, "cdcddttt", term, sess, resulttype);
}

function putresjss() {
    var sess = document.getElementById("resjss").value;
    var classt = document.getElementById("resjsc").value;
    var term = document.getElementById("resjst").value;
    var studentid = document.getElementById("resjssn").value;
    var resulttype = document.getElementById("resjsrt").value;
    var action = "jss";
    $.post("PHP/putreportcard.php", {action: action, session: sess, resulttype: resulttype, term: term, studentid: studentid}).done(function (data) {
        document.getElementById("dashjsscard").innerHTML = data;
    });
    getstddemographjss(studentid, sess, term, 'gd');
    getattendancejss(studentid, sess, term);
    getpassportphoto(studentid, "jssschlphoto");
    getobtainables(studentid, "cdcdd", term, sess, resulttype);
}

function putressss() {
    var sess = document.getElementById("ressss").value;
    var classt = document.getElementById("resssc").value;
    var term = document.getElementById("ressst").value;
    var studentid = document.getElementById("ressssn").value;
    var resulttype = document.getElementById("resssrt").value;
    //alert(sess + " " + studentid + " " + term + " " + resulttype + " " + classt);
    var action = "sss";
    $.post("PHP/putreportcard.php", {action: action, session: sess, resulttype: resulttype, term: term, studentid: studentid}).done(function (data) {
        //alert(data);
        document.getElementById("dashssscard").innerHTML = data;
    });
    getstddemographsss(studentid, sess, term, 'gd');
    getattendancesss(studentid, sess, term);
    getpassportphoto(studentid, "sssschlphoto");
    getobtainables(studentid, "cdcddss", term, sess, resulttype);
}

function putresgrade() {
    var sess = document.getElementById("resgrades").value;
    var classt = document.getElementById("resgradec").value;
    var term = document.getElementById("resgadet").value;
    var studentid = document.getElementById("resgradesn").value;
    var resulttype = document.getElementById("resgradert").value;
    //alert(sess + " " + studentid + " " + term + " " + resulttype + " " + classt);
    var action = "grade";
    $.post("PHP/putreportcard.php", {action: action, session: sess, resulttype: resulttype, term: term, studentid: studentid}).done(function (data) {
        document.getElementById("dashgradecard").innerHTML = data;
    });
    getstddemographgrade(studentid, sess, term, 'gd');
    getattendancegrade(studentid, sess, term);
    getpassportphoto(studentid, "jssschlphoto");
    getobtainables(studentid, "cdcdd", term, sess, resulttype);
}

function getobtainabless(studentid, placement, term, session, resulttype) {
    var studentid = studentid;
    //alert(session + " " + term + " " + resulttype);
    //var placeholder = placement;
    $.post("PHP/cummscores.php", {action: 'getcumms', stdid: studentid, term: term, session: session, resulttype:resulttype}).done(function (data) {
        document.getElementById(placement).innerHTML = data;
        //alert(data);
    });
}

function getobtainables(studentid, placement, term, session, resulttype) {
    var studentid = studentid;
    //var placeholder = placement;
    $.post("PHP/cummscores.php", {action: 'getcumm', stdid: studentid, term: term, session: session, resulttype:resulttype}).done(function (data) {
        document.getElementById(placement).innerHTML = data;
        //alert(data);
    });
}
