/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Payment History
 */
$(document).ready(function () {
    $('#GMmessage').summernote({height: 150});
    $('#Pmessage').summernote({height: 150});
    $('#NLmessage').summernote({height: 150});
    $('#Tmessage').summernote({height: 150});
    $('#Dmessage').summernote({height: 150});
    $('.note-toolbar .note-toolbar .note-toolbar .note-para .dropdown-menu li:first, .note-toolbar .note-line-height').remove();
    eventsDash();
    statisticsg();
    getAssignmentsGiven();
    getFeesummary();
});

function sendDefMsge(emailq, sms) {
    var email = _("emailParent").value;
    var stdID = _("studentidM").innerHTML;
    var stat = "default";
    var term = _("drTerm").value;
    var session = _("drSession").value;
    if (_("EMpar").checked) {
        $.post("PHP/sendDef.php", {email: email, stdID: stdID, stat: stat, term: term, session: session}).done(function (data) {
            alert(data);
        });
    }
}

function saveDefaultMessage() {
    _("messageSample").innerHTML = $('#Dmessage').code();
    var message = $('#Dmessage').code();

    $.post("PHP/defMessage.php", {message: message}).done(function (data) {
        alert(data);
    });
}

function updateS() {
    _("messageSample").innerHTML = $('#Dmessage').code();
}

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

function _(e) {
    return document.getElementById(e);
}

function searchpaye(val, wtbo) {
//alert(val);
    $.post("PHP/searchpaymentq.php", {val: val, wtbo: wtbo}).done(function (data) {
        if (wtbo === "1") {
            _("11131").innerHTML = data;
        } else {
            _("554765").innerHTML = data;
        }
    });
}

function searchPay(columntosearch, searchval) {
    var sess = _("PRS").value;
    var term = _("PRT").value;
    var itv = _(searchval).value;
    //alert(itv);
    _("paymentThings").innerHTML = "Search result for " + itv + " in " + columntosearch;
    $.post("PHP/searchpayment.php", {sess: sess, term: term, columntosearch: columntosearch, searchval: itv}).done(function (data) {
//alert(data);
        _("Payday").innerHTML = data;
    });
}

function searchTel(columntosearch, searchval) {
    var sess = _("TRS").value;
    var term = _("TRT").value;
    var itv = _(searchval).value;
    //echo "<tr style='font-weight:bold'><td></td><td>Teller Number</td><td>Student Name</td><td>Class</td><td>Bank</td><td>Amount</td><td>Payment Date</td><td>Date Submitted</td><td>Term</td><td>Session</td><td>Receipt Issued</td></tr>";
    _("tellerDets").innerHTML = "<tr style='font-weight:bold'><td></td><td>Teller Number</td><td>Student Name</td><td>Class</td><td>Bank</td><td>Amount</td><td>Payment Date</td><td>Date Submitted</td><td>Term</td><td>Session</td><td>Receipt Issued</td></tr>";
    $.post("PHP/searchTeller.php", {sess: sess, term: term, columntosearch: columntosearch, searchval: itv}).done(function (data) {
//alert(data);
        _("tellerDets").innerHTML += data;
    });
}

function getfeehistory(val) {
    var sd = document.getElementById(val).value;
    //console.log(sd);
    //$('#PHP').show(100);
    var session = _("fee_sessionmp").value;
    var term = _("fee_termmp").value;
    var stdName = _("fee_studentname").value;
    var stdClass = _("hihihihi").value;
    _("phsnWc").innerHTML = stdName + " " + stdClass;
    _("stdhistory").innerHTML = "<tr style='font-weight:bold; color:#238B69'><td></td><td>Payment Desc</td><td>AmountPaid</td><td>ReceiptID</td><td>Date rcvd</td><td>BankName</td><td>TellerNumber</td></tr>";
    $.post("PHP/getpaymenthistory.php", {val: sd, term: term, session: session}).done(function (data) {
        _("stdhistory").innerHTML += data;
    });
    getbal(term, session, sd, "#baltopay", stdClass);
}

function checkoverflow(sdfa) {
    var stuballa = _("stuBalla").innerHTML;
    if (parseInt(sdfa) > parseInt(stuballa)) {
        _("amountexcess").innerHTML = "<span style='color:#ff0000; font-weight:bold'>( OVER- PAYMENT )</span>";
        _(sdfa).value = "";
    }
    if (parseInt(sdfa) < parseInt(stuballa)) {
        _("amountexcess").innerHTML = "<span style='color:#ff0000; font-weight:bold'>( INCOMPLETE- PAYMENT )</span>";
    }
    if (parseInt(sdfa) === parseInt(stuballa)) {
        _("amountexcess").innerHTML = "<span style='color:#2200ff; font-weight:bold'>COMPLETE</span>";
    }
}

function getbal(term, session, idtosearch, loctoputresult, stdclass) {
    _("baltopay").innerHTML = "Welcome";
    $.post("PHP/getbal.php", {term: term, session: session, idtosearch: idtosearch, stdclass: stdclass}).done(function (data) {
        _("baltopay").innerHTML = data;
    });
}

function searchPayments() {
    var term = _("PRT").value;
    var session = _("PRS").value;
    alert(term);
}

function subfee(val, d) {
    $("#feecategory").hide();
    $("#feesummaryq").hide();
    $("#feepayment").hide();
    $("#payregister").hide();
    $("#tellersummary").hide();
    $(val).show(100);
    $(".feemanagermenu").removeClass("afm");
    $(d).addClass("afm");
}

function makepayment() {
    var fee_bal = _("stuBalla").innerHTML - _("fee_amountmp").value;
    var fee_studentname = _("fee_studentname").value;
    var classidmp = _("hihihihi").value;
    var fee_studentnameIDmp = _("fee_studentnameID").value;
    var fee_amountmp = _("fee_amountmp").value;
    var fee_descriptionmp = _("fee_descriptionmp").value;
    var fee_termmp = _("fee_termmp").value;
    var fee_sessionmp = _("fee_sessionmp").value;
    var fee_receipt = _("fee_receiptnumber").value;
    var fee_datepaid = _("fee_datepaid").value;
    var fee_bank = _("fee_bank").value;
    var fee_teller = _("fee_tellernumber").value;
    if (classidmp === "-- Select Student Class --") {
        alert("Select class");
    } else {
        if (fee_studentnameIDmp.length < 1) {
            alert("Select student name");
        } else {
            if (fee_amountmp.length < 1) {
                alert("Enter a valid amount");
            } else {
                if (fee_receipt.length < 5) {
                    alert("Enter valid receipt number");
                } else {
                    if (fee_teller.length < 5) {
                        alert("Enter valid teller number");
                    } else {
                        $.post("PHP/makepayment.php", {fee_studentname: fee_studentname, fee_datepaid: fee_datepaid, fee_bank: fee_bank, fee_teller: fee_teller, classid: classidmp, fee_receipt: fee_receipt, fee_studentnameID: fee_studentnameIDmp, fee_amount: fee_amountmp, fee_description: fee_descriptionmp, fee_term: fee_termmp, fee_session: fee_sessionmp}).done(function (data) {
//alert(data);
                            var div = document.createElement("Div");
                            var content = data;
                            div.innerHTML = content;
                            var valu = div.getElementsByTagName("i")[0];
                            var valP = valu.innerText;
                            //alert(valP);
                            if (valP === "1") {
                                alert("Successfully paid in..");
                                var feepaid = div.getElementsByTagName("fp")[0];
                                var session = div.getElementsByTagName("s")[0];
                                var term = div.getElementsByTagName("t")[0];
                                var studentname = div.getElementsByTagName("nm")[0];
                                var teller = div.getElementsByTagName("tl")[0];
                                _("receipttprint").innerHTML = "Dear Parent, We confirm the payment of <strike>N</strike>" +
                                        feepaid.innerText + " for " + studentname.innerText + "'s " + session.innerText + " " + term.innerText + " school fees (TellerNo:" + teller.innerText + "). Balance is <strike>N</strike> " + fee_bal + ". Thanks.";
                            } else {
                                alert("Not paid in..");
                            }

                        });
                    }
                }
            }
        }
    }
}

function smsparents(stdid) {
    alert(stdid);
    var msge = _("575788").innerHTML;
    $.post("PHP/smsReceipt.php", {stdid: stdid, msge: msge}).done(function (data) {
        _("diditgo").innerHTML = data;
    });
}

function add_fee_category() {
    var fee_class = document.getElementById("fee_class").value;
    var fee_session = document.getElementById("fee_session").value;
    var fee_year = document.getElementById("fee_year").value;
    var fee_item = document.getElementById("fee_item").value;
    var fee_amount = document.getElementById("fee_amount").value;
    $.post("PHP/addfeeitem.php", {feeclass: fee_class, feesession: fee_session, feeyear: fee_year, feeitem: fee_item, feeamount: fee_amount}).done(function (data) {
        alert(data);
    });
}

function fetch_student(val) {
    $.post("PHP/getStudentsfees.php", {classID: val, cv: "1"}).done(function (data) {
        document.getElementById("fee_studentname").innerHTML = "<option>--Select Student--</option>";
        document.getElementById("fee_studentname").innerHTML += data;
        fetch_studentID();
    });
}

function getsmsc(from, to) {
    _(to).innerHTML = _(from).innerHTML;
}

function closePopover() {
    $("[data-toggle='smsreceipt']").popover('hide');
}

function sendCmsge(val, wts) {
    if (_("SMSpar").checked) {
        var to = _("smsParent").value;
        var cMsge = _("cMsge").value;
        if (val.length > 140) {
            var yesno = confirm("2 or more text messages will be sent. are you sure?");
            if (yesno === true) {
                $.post("PHP/sendSMS.php", {to: to, cMsge: cMsge, wtd: wts}).done(function (data) {
                    //alert(data);
                });
            } else {
                alert("Message not sent");
            }
        } else {
            $.post("PHP/sendSMS.php", {to: to, cMsge: cMsge, wtd: wts}).done(function (data) {
                alert(data);
            });
        }
    } else {
        var to = _("emailParent").value;
        var cMsge = _("cMsge").value;
        var studentID = _("studentidM").innerHTML;
        var session = _("drSession").value;
        var term = _("drTerm").value;
        $.post("PHP/sendmail.php", {to: to, cMsge: cMsge, session:session, term:term, studentID:studentID}).done(function (data) {
            alert(data);
        });
    }
}

function fetch_studentID() {
    var val = document.getElementById("hihihihi").value;
    $.post("PHP/getStudentsfees.php", {classID: val, cv: "2"}).done(function (data) {
        document.getElementById("fee_studentnameID").innerHTML = "<option>----</option>";
        document.getElementById("fee_studentnameID").innerHTML += data;
        //alert(data);
    });
}

function fetPars(stdID) {
    $("#mdt").show(100);
    _("studentidM").innerHTML = stdID;
    $.post("PHP/getPars.php", {stdID: stdID, val: "1"}).done(function (data) {
        document.getElementById("msgParent").innerHTML = data;
        fetParsPhone(stdID);

    });
}

function fetParsPhone(stdID) {
    $.post("PHP/getPars.php", {stdID: stdID, val: "2"}).done(function (data) {
        document.getElementById("smsParent").innerHTML = data;
        fetParsEmail(stdID);
    });
}

function fetParsEmail(stdID) {
    $.post("PHP/getPars.php", {stdID: stdID, val: "3"}).done(function (data) {
        document.getElementById("emailParent").innerHTML = data;
        //alert(data);
    });
}

function checkAccom() {
    if (_("fee_item").value === 1) {
        alert("Checked");
    } else {
        alert("Unchecked");
    }
    _("fee_item").disabled = true;
    alert("Work on this");
}

function payhist(val) {
    var term = _("drTerm").value;
    var sess = _("drSession").value;
    $('#PHP').show(100);
    document.getElementById("payhist").innerHTML = "<tr style='font-weight:bold; color:#238B69'><td></td><td>Payment Desc</td><td>Amount</td><td>ReceiptID</td><td>Date</td><td>Bank</td><td>Teller Number</td></tr>";
    $.post("PHP/getpaymenthistory.php", {val: val, term: term, session: sess}).done(function (data) {
        document.getElementById("payhist").innerHTML += data;
    });
}

function transName(val, pd, pm, b) {
    document.getElementById("histName").innerHTML = document.getElementById(val).innerHTML;
    document.getElementById("ATP").innerHTML = document.getElementById(pd).innerHTML;
    document.getElementById("AP").innerHTML = document.getElementById(pm).innerHTML;
    document.getElementById("Bal").innerHTML = document.getElementById(b).innerHTML;
}

function getfeerecords() {
    var drClass = _("drClass").value;
    var drTerm = _("drTerm").value;
    var drSession = _("drSession").value;
    $.post("PHP/getfeerecords.php", {drClass: drClass, drTerm: drTerm, drSession: drSession}).done(function (data) {
//alert(data);
        document.getElementById("feesummarym").innerHTML = "<tr style=\"font-weight:bold\"><td>SN</td><td>Students</td><td>History</td><td>Payment Due</td><td>Payment made</td><td>Bal(N)</td><td></td></tr>";
        document.getElementById("feesummarym").innerHTML += data;
    });
}

function getFeesummary() {
//alert("We");
    document.getElementById("feesummary").innerHTML = "<tr style=\"font-weight:bold\"><td></td><td>Class</td><td>Std Count</td><td>Paid</td><td>Unpaid</td></tr>";
    $.post("PHP/feesummary.php").done(function (data) {
//  alert(data);
        document.getElementById("feesummary").innerHTML += data;
    });
}

function putScore(subject, category, studentID, score) {
//alert("Subject Number is "+ subject + " class is " + category + " and studentID " + studentID + " score is " + score);
    $.post("PHP/updatescore.php", {subjectSN: subject, category: category, studentID: studentID, score: score}).done(function (data) {
//alert(data);
    });
}

function loadClassGrade(val) {
    $.post("PHP/getstudentsincat.php", {classID: val}).done(function (data) {
        document.getElementById("loadClassMembers").innerHTML = data;
    });
}

function getGradelist(subjectSN) {
//alert(subjectSN);
    document.getElementById("whatSubject").innerHTML = "[ <span style='font-size:12px; font-family:verdana'><b>" + document.getElementById("subjectTaughtwClass").value + "</b></span> ]";
    document.getElementById("gradeRegister").innerHTML = "<table><tr>\n\
<td>Name</td>\n\
<td>Class Exercise</td>\n\
<td>Assignment</td>\n\
<td>Quiz</td>\n\
<td>C.A.Test1</td>\n\
<td>C.A. Test2</td>\n\
<td>Project</td>\n\
<td>T.Exam</td>\n\
<td>T.Total</td>\n\
<td>ACAS</td>\n\
<td>Grade</td>\n\
<td>Remarks</td>\n\
</tr></table>";
    var rt = document.getElementById("subjectTaughtwClass").value;
    //alert(rt);
    $.post("PHP/getgradelist.php", {classSubject: rt, subjectSN: subjectSN}).done(function (data) {
//alert(data);
        document.getElementById("gradeRegister").innerHTML += data;
    });
}

function getResults() {
    var searchcrit = document.getElementById("searchCrit").value;
    var searchTerm = document.getElementById("searchTerm").value;
    var searchSession = document.getElementById("searchSession").value;
    if (searchcrit === "Class") {
        var searchClass = document.getElementById("searchClass").value;
        $.post("PHP/getGrade.php", {searchParam: searchcrit, studentClass: searchClass, studentID: searchClass, searchTerm: searchTerm, searchSession: searchSession}).done(function (data) {
            console.log(data);
            //Thsi works.. I will have to pour result
        });
    }
    if (searchcrit === "Subject") {
        var searchSubjectID = document.getElementById("searchSubjectID").value;
    }
    if (searchcrit === "Student") {

        var searchStudentID = document.getElementById("searchstudentID").value;
        if (!searchStudentID || searchStudentID.length < 4 || searchStudentID.length > 8) {
            alert("A valid Student ID is necessary");
        } else {
            $.post("PHP/getGrade.php", {searchParam: searchcrit, studentID: searchStudentID, searchTerm: searchTerm, searchSession: searchSession}).done(function (data) {
                if (data.length > 10) {
                    document.getElementById("gradeTable").innerHTML += data;
                    //document.getElementById("gradeTable").innerHTML += "<tr class='subjName'>" +
                    "<td style='padding:2px; text-align:left; font-size:13px; font-family:verdana' colspan='8'><br/>"
                    "<table class='table table-condensed' style='max-width:320px; font-family:verdana; font-size:12px; background-color:#EDF2F8'>" +
                            "<tr><td><b>Students in class :</b></td><td>37</td></tr>" +
                            "<tr><td><b>Tot. Score Obtainable:</b></td><td>400</td></tr>" +
                            "<tr><td><b>Total Score Obtained:</b></td><td>250</td></tr>" +
                            "<tr><td><b>Teacher's remarks:</b></td><td>Kayode is a studios boy.</td></tr></table><br/></td></tr>";
                }
            });
        }
    }
}

function selectSearchBy(val) {
    if (val === "Class") {
        crit("#gradeClass");
    }
    if (val === "Subject") {
        crit("#gradeSubject");
    }
    if (val === "Student") {
        crit("#gradeStudent");
    }
}

function crit(wtl) {
    $("#gradeClass").hide('50');
    $("#gradeSubject").hide('50');
    $("#gradeStudent").hide('50');
    $(wtl).show('50');
}

function addSubject() {
    document.getElementById("ServerResponse").innerHTML = "Please wait..";
    var subject = document.getElementById("subName").value;
    var subclass = document.getElementById("subCategory").value;
    var status = document.getElementById("subStatus").value;
    var classSubstring = subclass.substring(0, 4) + subject.substring(0, 4);
    $.post("PHP/addsubject.php", {subject: subject, subclass: subclass, status: status, subjectID: classSubstring}).done(function (data) {
        document.getElementById("ServerResponse").innerHTML = data;
    });
}

function issueAssignments() {
    document.getElementById("assignmentstat").innerHTML = "Please wait..";
    var subjectclass = document.getElementById("assignClass").value;
    var Assignment = document.getElementById("assignmentProp").value;
    if (Assignment.length < 2) {
        document.getElementById("assignmentstat").innerHTML = "<i style='color:#ff0000'>Review Assignment</i>";
    } else {
        $.post("PHP/sendAssignment.php", {subjectclass: subjectclass, Assignment: Assignment}).done(function (data) {
            document.getElementById("assignmentstat").innerHTML = data;
        });
    }

}

function loginBackend() {
    var user = document.getElementById("BEusername").value;
    var password = document.getElementById("BEpassword").value;
    $.post("PHP/loginAdmin.php", {user: user, password: password}).done(function (data) {
        document.getElementById("logininfo").innerHTML = data;
        if (data === "2") {
            document.getElementById("logininfo").innerHTML = "<span style='color:#ff0000'>Welcome Teacher</span>";
            //alert("Teacher");
            window.location = "PortalTeachers.php";
        }
        if (data === "1") {
            document.getElementById("logininfo").innerHTML = "<span style='color:#ff0000'>Welcome Admin</span>";
            //alert("Administrator");
            window.location = "dashboard.php";
        }
        if (data === "0") {
            document.getElementById("logininfo").innerHTML = "<span style='color:#ff0000'>Invalid Login</span>";
        }

    });
}

function absentStudent(sid, csid) {
    if (document.getElementById(csid).checked)
    {
        var vdv = 'jka' + sid;
//        vdv = vdv.toString();
        $("#" + vdv).hide(150);
    } else {
//show confirmation
        var vdv = 'jka' + sid;
//        vdv = vdv.toString();
        $("#" + vdv).show(150);
    }
}

function getAttendancelist(val) {
//<tr style='background-color:#1CB5FF'><td><select class='form-control' style='height:30px' id='attendancemonth'><option>January</option><option>February</option><option>March</option><option>April</option><option>May</option><option>June</option><option>July</option><option>August</option><option>September</option><option>October</option><option>November</option><option>December</option></select></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td></tr>
    document.getElementById("absentStudents").innerHTML = "";
    document.getElementById("attendaceRegister").innerHTML = "<tr style='background-color:#87ADC0'><td><select class='form-control' style='height:30px' id='attendancemonth'><option>January</option><option>February</option><option>March</option><option>April</option><option>May</option><option>June</option><option>July</option><option>August</option><option>September</option><option>October</option><option>November</option><option>December</option></select></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td></tr>";
    $.post("PHP/getAttendancelist.php", {classID: val}).done(function (data) {
        document.getElementById("attendaceRegister").innerHTML += data;
    });
}

function confirmabsentism(stdID, val) {
    var we = "d" + stdID;
    document.getElementById(we).setAttribute("disabled", true);
    $.post("PHP/confirmabsentism.php", {studentID: stdID, classID: val}).done(function (data) {
//console.log(data);
        document.getElementById("absentStudents").innerHTML += data;
    });
}

function deactPar(parID) {
    var wtds = "Deactivate";
    $.post("PHP/updateactivation.php", {parentID: parID, wtd: wtds}).done(function (data) {
        alert(data);
    });
}

function actPar(parID) {
    var wtd = "Activate";
    $.post("PHP/updateactivation.php", {parentID: parID, wtd: wtd}).done(function (data) {
        alert(data);
    });
}

function mlP(parID) {
    $.post("PHP/getparspecifics.php", {parentID: parID}).done(function (data) {
//alert(data);
        var content = data;
        var parser = document.createElement("div");
        parser.innerHTML = content;
        var name = parser.getElementsByTagName('a')[0];
        var email = parser.getElementsByTagName('b')[0];
        document.getElementById("Mparentname").innerHTML = name.innerText;
        document.getElementById("Mparentemail").value = email.innerText;
    });
}

function returnSummer() {
    var sHTML = $('#summernote').code();
    console.log(sHTML);
}

function attachstudents(parentID) {
    var studentID = document.getElementById("attachstudentID").value;
    if (studentID.length < 6 || studentID.length > 6) {
        alert("Invalid ID");
    } else {
        $parentID = parentID;
        $.post("PHP/attachstudent.php", {studentID: studentID, parentID: parentID}).done(function (data) {
            document.getElementById("servermessage").innerHTML = data;
            //console.log(data);
        });
    }
}

function clsmsgtab() {
    $("#msgtab").hide();
}

function searchBy(val) {
    console.log(val);
    document.getElementById("parentstable").innerHTML = "<tr style=\"font-weight:bold; background-color:#DAE6ED\"><td>Parent Name</td><td>eNotify</td><td>Phone</td><td>Email Address</td><td>Status</td><td>Student(s)</td></tr>";
    $.post("PHP/getparents.php", {searchCriteria: val}).done(function (data) {
        document.getElementById("parentstable").innerHTML += data;
    });
}

function stdSendMail(sender) {
    if (sender === "students") {
        document.getElementById("serverResponse").innerHTML = "Please wait...";
        var GMclass = document.getElementById("GMclass").value;
        var GMsubject = document.getElementById("GMsubject").value;
        var GMmessage = $('#GMmessage').code();
        $.post("PHP/sendmails.php", {GMclass: GMclass, GMsubject: GMsubject, GMmessage: GMmessage, sender: sender}).done(function (data) {
//console.log(data);
            document.getElementById("serverResponse").innerHTML = "<b>" + data + "</b>";
        });
    }
    if (sender === "parents") {
        document.getElementById("PamailMessage").innerHTML = "Please wait...";
        var pclass = document.getElementById("Pclass").value;
        var Psubject = document.getElementById("Psubject").value;
        var Pmessage = $('#Pmessage').code();
        $.post("PHP/sendmails.php", {Pclass: pclass, Psubject: Psubject, Pmessage: Pmessage, sender: sender}).done(function (data) {
//console.log(data);
            document.getElementById("PamailMessage").innerHTML = data;
            alert("Message sent");
        });
    }
    if (sender === "staff") {

        var Tsubject = document.getElementById("Tsubject").value;
        ;
        var Tmessage = $('#Tmessage').code();
        $.post("PHP/sendmails.php", {Tsubject: Tsubject, Tmessage: Tmessage, sender: sender}).done(function (data) {
//console.log(data);
            document.getElementById("TmailMessage").innerHTML = data;
            //alert("Message sent");
        });
    }
}

function ASsave() {
    var studentID = document.getElementById("ASstudentid").value;
    var surname = document.getElementById("ASsurname").value;
    var firstname = document.getElementById("ASfirstname").value;
    var ASclass = document.getElementById("ASclass").value;
    var email = document.getElementById("ASemail").value;
    var homeaddress = document.getElementById("AShomeaddress").value;
    $.post("PHP/savenewstudent.php", {studentID: studentID, surname: surname, firstname: firstname, ASclass: ASclass, email: email, homeaddy: homeaddress}).done(function (data) {
        console.log(data);
        switch (data) {
            case "0":
                document.getElementById("returnedRez").innerHTML = "<font style='color:#ff0000; font-size:12px'>Not saved</font>";
                break;
            case "1":
                document.getElementById("returnedRez").innerHTML = "<font style='color:#005E8A; font-size:12px'>Saved</font>";
                break;
            default:
                document.getElementById("returnedRez").innerHTML = data;
                break;
        }
    });
}

function statisticsg() {
    $.post("PHP/getstats.php").done(function (data) {

//document.getElementById("statistics").innerHTML = data;
        var content = data;
        var div = document.createElement('div');
        div.innerHTML = content;
        var requests = div.getElementsByTagName('r')[0];
        var approved = div.getElementsByTagName('a')[0];
        var studentcount = div.getElementsByTagName('s')[0];
        var teachercount = div.getElementsByTagName('q')[0];
        var parentcount = div.getElementsByTagName('w')[0];
        var msgcount = div.getElementsByTagName('m')[0];
        //document.getElementById("studentcount").innerHTML = studentcount.innerText;
        //document.getElementById("parentcount").innerHTML = parentcount.innerText;
        // document.getElementById("teachercount").innerHTML = teachercount.innerText;
        //document.getElementById("parentCount").innerHTML = parentcount.innerText;
        document.getElementById("stdcount").innerHTML = studentcount.innerText;
        document.getElementById("dmCount").innerHTML = msgcount.innerText;
        console.log(msgcount.innerText);
        //document.getElementById("statistics").innerHTML = requests.innerText + " requests, " + approved.innerText + " approved";
    });
}

function getAssignmentsGiven() {
    $.post("PHP/getAssignments.php").done(function (data) {
        document.getElementById("assignmentsPanel").innerHTML = data;
        console.log(data);
    });
}

function retrieveApproved(parentID) {
    $.post("PHP/approvedattachment.php", {parentID: parentID}).done(function (data) {
        document.getElementById("registeredstudents").innerHTML = data;
    });
}

function updateparentprofile() {
    var parentNames = document.getElementById("parentnames").value;
    var phoneNumber = document.getElementById("parentphonenumber").value;
    var emailparentnotification = document.getElementById("emailparentnotification").selectedIndex;
    var newslettermailing = document.getElementById("newslettermailing").selectedIndex;
    $.post("PHP/parentupdate.php", {
        parentName: parentNames,
        parentNumber: phoneNumber,
        emailNotification: emailparentnotification,
        newslettermailing: newslettermailing
    }).done(function (data) {
        console.log(data);
    });
}

function loadattachedstudents() {
    $.post("PHP/loadattachedstudents.php").done(function (data) {
        document.getElementById("loadattachedstudents").innerHTML = data;
    });
}

function removeattache(studentID, parentID) {
    $.post("PHP/removeattachment.php", {parentID: parentID, studentID: studentID}).done(function (data) {
        switch (data) {
            case 1:
                loadattachedstudents();
                break;
            case 0:
                loadattachedstudents();
                break;
        }
    });
}

function mailteacher(teacherMail, teacherName, parentName, parentEmail) {
    resetmailfields();
    document.getElementById("teachername").innerHTML = teacherName;
    document.getElementById("teacheremail").value = teacherMail;
}

function resetmailfields() {
    document.getElementById("parentsubject").value = "";
    document.getElementById("parentmessage").value = "";
}

function sendTeacherMail() {
    var teacheremail = document.getElementById("teacheremail").value;
    if (teacheremail) {
        var subject = document.getElementById("parentsubject").value;
        if (subject) {
            var mailcontent = document.getElementById("parentmessage").value;
            if (mailcontent) {
                $.post("PHP/sendteachermail.php", {teachermail: teacheremail, subject: subject, mailbody: mailcontent}).done(function (data) {
                    document.getElementById("serverSResponse").innerHTML = data
                });
            } else {
                document.getElementById("serverSResponse").innerHTML = "<font style='color:#ff0000; font-size:12px'>A mail body is required</font>";
            }
        } else {
            document.getElementById("serverSResponse").innerHTML = "<font style='color:#ff0000; font-size:12px'>A mail subject is required</font>";
        }
    } else {
        document.getElementById("serverSResponse").innerHTML = "<font style='color:#ff0000; font-size:12px'>An email address for teacher not found</font>";
    }
}

function showPage(wts, active) {
    $("#accountmenucontent").hide();
    $("#studentmenucontent").hide();
    $("#messageboardmenucontent").hide();
    $(wts).show();
    $(".pportal").removeClass("activemenu");
    $(active).addClass("activemenu");
    //showPage('#messageboardmenucontent', '#messageboard')msgprecursor
}

function registerParent() {
    var firstname = document.getElementById("firstname").value;
    if (firstname) {
        alert("FirstName next is last name");
        var lastname = document.getElementById("lastname").value;
        if (lastname) {
            alert("lastname next is email name");
            var emailaddress = document.getElementById("emailaddress").value;
            if (emailaddress) {
                alert("Email next is Password name");
                var passwordd = document.getElementById("password").value;
                var retypedPassword = document.getElementById("passwordverify").value;
                if (passwordd.length < 4) {
                    alert("Password next is last name");
                    document.getElementById("Message").innerHTML = "Your password needs to be 4 characters or more...";
                } else {
                    if (passwordd === retypedPassword) {
                        document.getElementById("Message").innerHTML = "<font style='color:black'>Please wait..</font>";
                        $.post("PHP/RegisterPortal.php", {
                            email: emailaddress,
                            name: firstname + " " + lastname,
                            password: password
                        }).done(function (data) {
                            document.getElementById("Message").innerHTML = data;
                        });
                    } else {
                        document.getElementById("Message").innerHTML = "Your passwords dont match";
                    }
                }
            } else {
                document.getElementById("Message").innerHTML = "Your email is required";
            }
        } else {
            document.getElementById("Message").innerHTML = "Your surnname is required";
        }
    } else {
        document.getElementById("Message").innerHTML = "Your firstname is required";
    }
}

function loadDM() {
    document.getElementById("mailcontent").innerHTML = "";
    document.getElementById("msgprecursor").innerHTML = "Please wait";
    $.post("PHP/loadmessages.php").done(function (data) {
//        console.log(data);
        document.getElementById("msgprecursor").innerHTML = data;
        $(".messages").removeClass("activemsgtype");
        $("#dmtab").addClass("activemsgtype");
    });
}

function getstat() {
    ratifiedtimetable();
    $.post("PHP/getallStates.php").done(function (data) {
//console.log(data);
        var content = data;
        var div = document.createElement('div');
        div.innerHTML = content;
        var parentcount = div.getElementsByTagName('a')[0];
        var studentcount = div.getElementsByTagName('b')[0];
        var preregisteredcount = div.getElementsByTagName('c')[0];
        var teachercount = div.getElementsByTagName('d')[0];
        var assignments = div.getElementsByTagName('e')[0];
        document.getElementById("pc").innerHTML = parentcount.innerText;
        document.getElementById("sc").innerHTML = studentcount.innerText;
        document.getElementById("tc").innerHTML = teachercount.innerText;
        document.getElementById("prs").innerHTML = preregisteredcount.innerText;
        document.getElementById("ass").innerHTML = assignments.innerText;
        document.getElementById("nls").innerHTML = "6";
    });
}

document.onload = getstat();
function loadGM() {
    document.getElementById("mailcontent").innerHTML = "";
    var parentID = "All";
    document.getElementById("msgprecursor").innerHTML = "Please wait";
    $.post("PHP/loadmessages.php", {ParentID: parentID}).done(function (data) {
        //console.log(data);
        document.getElementById("msgprecursor").innerHTML = data;
        $(".messages").removeClass("activemsgtype");
        $("#gmtab").addClass("activemsgtype");
    });
}

function applystyle(id) {

    $(".message").removeClass("activemsg");
    $("#" + id).addClass("activemsg");
}

function pullcontent(SN) {
    $.post("PHP/pullcontent.php", {SN: SN}).done(function (data) {
        document.getElementById("mailcontent").innerHTML = data;
    });
}

function loadmenu(whattoshow, idupdate) {
    $("#preregisterstudents").hide();
    $("#attachstudent").hide();
    $("#viewstudent").hide();
    $("#uniquepoints").hide();
    $("#messageme").hide();
    $("#braintrainI").hide();
    $(whattoshow).show();
    if (whattoshow === "#viewstudent") {
        loadstudentscombo();
    }
    $(".portalsubmenu").removeClass("activeportal");
    $(idupdate).addClass("activeportal");
}

function loadstudentscombo() {
    loadstudentsIDcombo();
    $.post("PHP/loadstudentscombo.php").done(function (data) {
        document.getElementById("registeredstudents").innerHTML = data;
        //registeredstudents
    });
}

function  loadstudentsIDcombo() {
    $.post("PHP/loadstudentsIDcombo.php").done(function (data) {
        document.getElementById("registeredstudentsID").innerHTML = data;
        //registeredstudents
    });
}

function displaystudentsinfo(studentinfo) {
//console.log(studentinfo + " We got this");
}

function getID(whatid) {
    document.getElementById("registeredstudentsID").selectedIndex = whatid;
}

function loadstudentinfo() {

    $("#HWA").show();
    $studentID = document.getElementById("registeredstudentsID").value;
    $.post("PHP/getstudentinfo.php", {studentID: $studentID}).done(function (data) {
        document.getElementById("studentinfotable").innerHTML = data;
        getassignment($studentID);
    });
}

function getassignment(studentid) {
    $.post("PHP/getassignment.php", {studentID: studentid}).done(function (data) {
        document.getElementById("assignedhw").innerHTML = data;
    });
}

function getparents(val) {
    if (val === "search") {
        var searchVal = document.getElementById("parentsSearch").value;
        document.getElementById("parentstable").innerHTML = "<tr style=\"font-weight:bold; background-color:#DAE6ED\"><td>Parent Name</td><td>eNotify</td><td>Phone</td><td>Email Address</td><td>Status</td><td>Student(s)</td></tr>";
        $.post("PHP/getparents.php", {searchCriteria: searchVal}).done(function (data) {
            document.getElementById("parentstable").innerHTML += data;
        });
    } else {
        paginategetparents();
        var searchVal = "All";
        document.getElementById("parentstable").innerHTML = "<tr style=\"font-weight:bold; background-color:#DAE6ED\"><td>Parent Name</td><td>eNotify</td><td>Phone</td><td>Email Address</td><td>Status</td><td>Student(s)</td></tr>";
        $.post("PHP/getparents.php", {searchCriteria: searchVal}).done(function (data) {
            document.getElementById("parentstable").innerHTML += data;
        });
    }
}

function getstudents(val) {
    if (val === "search") {
        var searchVal = document.getElementById("studentsSearch").value;
        var param = "search";
        document.getElementById("allstudentsinfo").innerHTML = "<tr style=\"font-weight:bold; background-color:#DAE6ED\"><td>Student ID</td><td>Student Name</td><td>Class</td><td>Email Address</td><td>Links</td><td>Edit</td></tr>";
        $.post("PHP/getstudentslist.php", {searchCriteria: searchVal, searchParameter: param}).done(function (data) {
            document.getElementById("allstudentsinfo").innerHTML += data;
            console.log(data);
        });
    } else if (val === "filter") {
        var searchVal = document.getElementById("filterstdclass").value;
        var param = "filter";
        document.getElementById("allstudentsinfo").innerHTML = "<tr style=\"font-weight:bold; background-color:#DAE6ED\"><td>Student ID</td><td>Student Name</td><td>Class</td><td>Email Address</td><td>Links</td><td>Edit</td></tr>";
        $.post("PHP/getstudentslist.php", {searchCriteria: searchVal, searchParameter: param}).done(function (data) {
            document.getElementById("allstudentsinfo").innerHTML += data;
        });
    } else {
//paginategetparents();
        var searchVal = "All";
        document.getElementById("allstudentsinfo").innerHTML = "<tr style=\"font-weight:bold; background-color:#DAE6ED\"><td>Parent Name</td><td>eNotify</td><td>Phone</td><td>Email Address</td><td>Status</td><td>Student(s)</td></tr>";
        $.post("PHP/getstudentslist.php", {searchCriteria: searchVal}).done(function (data) {
            document.getElementById("allstudentsinfo").innerHTML += data;
        });
    }
}

function paginategetparents() {
    $.post("PHP/paginateparents.php", {pV: "1"}).done(function (data) {
        document.getElementById("parentspaginate").innerHTML = data;
    });
}


function paginate(limit, offset, wo) {
    $(".pl").removeClass("pls");
    $(wo).addClass("pls");
    document.getElementById("parentstable").innerHTML = "<tr style=\"font-weight:bold\"><td>Parent Name</td><td>eNotification</td><td>Phone</td><td>Email Address</td><td>Status</td><td>Student(s)</td></tr>";
    $.post("PHP/paginateparents.php", {pV: "2", limit: limit, offset: offset}).done(function (data) {
        document.getElementById("parentstable").innerHTML += data;
        //console.log(data);
    });
}

function getstuID(stuName) {
    document.getElementById("studentgradID").selectedIndex = stuName;
}

function chch(){
    alert("Hi");
}

function getstudentsOffering(subjectSN, subjectComponent) {
    var sess = document.getElementById("scSess").value;
    var term = document.getElementById("scTerm").value;
    document.getElementById("stuP").innerHTML = "<tr style='font-weight:bold'><td></td><td>Name</td><td>C.E</td><td>Asgnmt</td><td>Quiz</td><td>1st</td><td>2nd</td><td>Projct</td><td>Exam</td></tr>";
    var rt = document.getElementById("subjectTaughtwClass").value;
    $.post("PHP/getcourseStudents.php", {subjectComponent:subjectComponent, subjectsn: subjectSN, classSubject: rt, whicGV: "1", sess: sess, term: term}).done(function (data) {
        document.getElementById("stuP").innerHTML += data;
        studentsOfferingID();
        studentsOfferingName();
        //alert(data);
    });
}

//$_SESSION['subjectGrade']
function assignGrades() {
    var studentgradID = document.getElementById("studentgradID").value;
    console.log(studentgradID);
    $.post("PHP/selectedSubject.php", {studentgradID: studentgradID}).done(function (data) {
        console.log(data);
        var content = data;
        var divg = document.createElement("div");
        divg.innerHTML = content;
        var FirstTest = divg.getElementsByTagName('v')[0];
        var SecondTest = divg.getElementsByTagName('c')[0];
        var Exam = divg.getElementsByTagName('x')[0];
        document.getElementById("getfirsttest").innerHTML = FirstTest.innerText;
        document.getElementById("getsecondtest").innerHTML = SecondTest.innerText;
        document.getElementById("getexam").innerHTML = Exam.innerText;
        document.getElementById("setfirstTest").value = FirstTest.innerText;
        document.getElementById("setsecondTest").value = SecondTest.innerText;
        document.getElementById("setexam").value = Exam.innerText;
    });
}

function updateGrades() {
    var reporterror = "";
    var test1 = document.getElementById("setfirstTest").value;
    var test2 = document.getElementById("setsecondTest").value;
    var exam = document.getElementById("setexam").value;
    var studentID = document.getElementById("studentgradID").value;
    //console.log(test1 + " " + test2 + " " + exam);

    if (test1 > 20 || test2 > 20 || exam > 60) {
        alert("Test scores cannot be more than 20. Exam score cannot be more than 60");
    } else {
        if (!test1 || !test2 || !exam) {
            alert("One or more fields not made");
        } else {
            $.post("PHP/updategrades.php", {test1: test1, test2: test2, exam: exam, studentgradID: studentID}).done(function (data) {
//console.log(data);
                alert(data);
            });
        }
    }
}

function updateClassdets(wtao) {
    $.post("PHP/updateClass.php", {wtao: wtao}).done(function (data) {
        document.getElementById("classghg").value = data;
    });
}

function updateClass() {
    var classID = document.getElementById("classghg").value;
    var assignee = document.getElementById("classReID").value;
    $.post("PHP/sendupdate.php", {classID: classID, assinee: assignee}).done(function (data) {
        alert(data);
    });
}

function studentsOfferingID() {
    var rt = document.getElementById("subjectTaughtwClass").value;
    $.post("PHP/getcourseStudents.php", {classSubject: rt, whicGV: "2"}).done(function (data) {
        document.getElementById("studentgradID").innerHTML = data;
    });
}

function createClass() {
    var classname = document.getElementById("ClassNames").value;
    $.post("PHP/createClass.php", {classname: classname}).done(function (data) {
        alert(data);
    });
}

function getclasses() {
    document.getElementById("allClasses").innerHTML = "<tr style='font-weight:bold'><td>Class</td><td>Teacher</td><td></td><td></td></tr>";
    $.post("PHP/getclasses.php").done(function (data) {
        document.getElementById("allClasses").innerHTML += data;
    });
}

function studentsOfferingName() {
    var rt = document.getElementById("subjectTaughtwClass").value;
    $.post("PHP/getcourseStudents.php", {classSubject: rt, whicGV: "3"}).done(function (data) {
        document.getElementById("studentgradName").innerHTML = data;
    });
}

function showdebtors(val) {
    $.post("PHP/generatedebtlist.php", {wtd: val}).done(function (data) {
        _("mradtable").innerHTML = data;
        //console.log(data);
    });
}

function masterRegister(val, ew) {
    if (val === "Debt Register") {
        _("MRDRT").innerHTML = "<span style=''>Debt Register <span style='padding:5px; color:#fff; background-color:#000; font-size:14px; cursor:pointer; border-radius:4px' onclick='showdebtors(\"1\");showdebtors(\"2\")'>( Re-Generate list )</span><span style='padding:5px; margin-left:10px; color:#fff; cursor:pointer; background-color:#000; font-size:14px; border-radius:4px' onclick='showdebtors(\"2\")'>Show list</span></span>"
    } else {
        _("MRDRT").innerHTML = val;
    }

    $("#MRAD").hide();
    $("#MRAP").hide();
    $("#MRAT").hide();
    if (ew === "mrpr1") {
        $("#MRAP").show();
    }

    if (ew === "mrtr1") {
        $("#MRAT").show();
    }

    if (ew === "mrdr1") {
        $("#MRAD").show();
    }

}

function menuitems(wts, cfw) {
    $("#clazz").hide();
    $("#subMenu").hide();
    $("#home").hide();
    $("#messages").hide();
    $("#parents").hide();
    $("#event").hide();
    $("#students").hide();
    $("#teachers").hide();
    $("#newsletters").hide();
    $("#grade").hide();
    $("#scores").hide();
    $("#preregs").hide();
    $("#gradesheet").hide();
    $("#feemngr").hide();
    $("#register").hide();
    $("#tsetng").hide();
    $(wts).show();
    $(".menustyling").removeClass("activemenu");
    $(cfw).addClass("activemenu");
    if (wts === "#parents") {
        getparents('1');
        linkagerequest();
    }
    if (wts === "#students") {
        getstudentlist();
    }

    if (wts === "#event") {
        loadSEvent();
    }

    if (wts === "#newsletters") {
        getnl();
    }

    if (wts === "#home") {
        eventsDash();
        ratifiedtimetable();
    }

    if (wts === "#messages") {
        loadDM();
    }

    if (wts === "#teachers") {
        $("#subMenu").hide();
        document.getElementById("subMenu").innerHTML = "<span class='point df acSM' id='teacherhome' onclick='cSM(\"#teacherhome\",\"#tHome\")'>Staff</span> &nbsp; &nbsp;  -   &nbsp; &nbsp; <span class='point df' id='teacherassignments' onclick='cSM(\"#teacherassignments\",\"#tAssignments\")'>Assignments</span> &nbsp; &nbsp;  -   &nbsp; &nbsp; <span class='point df' id='teachersubjects' onclick=\"cSM('#teachersubjects','#tSubjects')\">Subjects</span>";
        $("#subMenu").show(300);
        //$("").hide();
    }
}

function hidesubmenus() {
    $("#tHome").hide();
    $("#tAssignments").hide();
    $("#tSubjects").hide();
}

function cSM(decorW, wts) {
    hidesubmenus();
    $(".df").removeClass("acSM");
    $(decorW).addClass("acSM");
    $(wts).show();
    if (decorW === "#teacherhome") {
        document.getElementById("wtdh").innerHTML = "";
    }
    if (decorW === "#teacherassignments") {
        document.getElementById("wtdh").innerHTML = "- Assignments";
        getAsses("All");
    }
    if (decorW === "#teachersubjects") {
        document.getElementById("wtdh").innerHTML = "- Subjects";
    }
}

function getAsses(htp) {
//document.getElementById("").innerHTML = "WE do great";
    if (htp === "All") {
        $.post("PHP/getAsses.php", {wtp: htp}).done(function (data) {
            document.getElementById("assignmentlist").innerHTML = data;
        });
    }
    if (htp === "Date") {
        var assDateValue = document.getElementById("AssDate").value;
        //console.log(assDateValue);
        $.post("PHP/getAsses.php", {wtp: htp, dateValue: assDateValue}).done(function (data) {
            document.getElementById("assignmentlist").innerHTML = data;
        });
    }
    if (htp === "Class") {
        var assDateValue = document.getElementById("AssClass").value;
        //console.log(assDateValue);
        $.post("PHP/getAsses.php", {wtp: htp, dateValue: assDateValue}).done(function (data) {
            document.getElementById("assignmentlist").innerHTML = data;
        });
    }
}

function loadAsses(fa, wta) {
    $(".fa-eye").removeClass("makeRed");
    $(wta).addClass("makeRed");
    //assDescription
    $.post("PHP/getAssContent.php", {assID: fa}).done(function (data) {
        var div = document.createElement("Div");
        var content = data;
        div.innerHTML = content;
        var subject = div.getElementsByTagName('d')[0];
        var dateg = div.getElementsByTagName('f')[0];
        var datacontent = div.getElementsByTagName('g')[0];
        var teacherName = div.getElementsByTagName('h')[0];
        document.getElementById("assDescription").innerHTML = "<div><span style='font-size:25px'>" + subject.innerText + " ( <span style='font-size:14px'>" + teacherName.innerText + "</span> )</span></div><hr style='border-style:dashed; border-width:thin; border-color:#AAC7D5; margin:5px; margin-bottom:20px'/>" + datacontent.innerText + "<hr style='border-style:dashed; border-width:thin; border-color:#AAC7D5; margin:5px; margin-top:20px'/><div style='text-align:right'>" + dateg.innerText + "</div>";
        //subject.innerText + " - " + dateg.innerText + " - " + datacontent.innerText + " - " + teacherName.innerText;
    });
}

function viewAttaches(pID) {
    document.getElementById("thelists").innerHTML = "Please wait..";
    //console.log(pID);
    $.post("PHP/getstudents.php", {pID: pID}).done(function (data) {
//console.log(data);
        document.getElementById("thelists").innerHTML = data;
    });
}

function getAttendance(va) {
    var classID = va;
    //alert(classID);
    document.getElementById("attendanceP").innerHTML = "<tr style='font-family:verdana; font-size:13px; font-weight:bold'><td>Status</td><td>Student Name</td><td></td></tr>";
    $.post("PHP/attendancelist.php", {classID: classID}).done(function (data) {
        document.getElementById("attendanceP").innerHTML += data;
    });
}

function viewSAttaches(sID) {
    document.getElementById("thelistsP").innerHTML = "Please wait..";
    $.post("PHP/getAparents.php", {sID: sID}).done(function (data) {
        document.getElementById("thelistsP").innerHTML = data;
    });
}

function updateStudent() {
    document.getElementById("stdsurname").value;
    var sname = document.getElementById("stdsurname").value;
    var fname = document.getElementById("stdfirstname").value;
    var classID = document.getElementById("stdclassid").value;
    var address = document.getElementById("stdaddress").value;
    var stdemail = document.getElementById("stdemailaddress").value;
    var id = document.getElementById("studentid").innerHTML;
    $.post("PHP/updateStudentdata.php", {sname: sname, fname: fname, classID: classID, address: address, stdemail: stdemail, id: id}).done(function (data) {
        document.getElementById("Updateresponse").innerHTML = data;
    });
}

function getstdInfo(stdID) {
//document.getElementById("updateInfo").innerHTML = "Please wait..";
    $.post("PHP/getstdInfoforupdate.php", {sID: stdID}).done(function (data) {
//document.getElementById("thelistsP").innerHTML = data;
        console.log(data);
        var content = data;
        var div = document.createElement("div");
        div.innerHTML = content;
        var fname = div.getElementsByTagName('b')[0];
        var sname = div.getElementsByTagName('a')[0];
        var sclass = div.getElementsByTagName('e')[0];
        var address = div.getElementsByTagName('c')[0];
        var email = div.getElementsByTagName('d')[0];
        var studentid = div.getElementsByTagName('f')[0];
        document.getElementById("stdsurname").value = fname.innerText;
        document.getElementById("stdfirstname").value = sname.innerText;
        document.getElementById("stdclassid").value = sclass.innerText;
        document.getElementById("stdaddress").value = address.innerText;
        document.getElementById("stdemailaddress").value = email.innerText;
        document.getElementById("studentid").innerHTML = studentid.innerText;
    });
}

function linkagerequest() {

    document.getElementById("linkagerequeststable").innerHTML = "<tr style=\"font-weight:bold; color:#6A3A00; background-color:#FFEDD7;\"><td>Student</td><td>Class</td><td>Request By</td><td>Permission</td></tr>";
    $.post("PHP/getlinks.php").done(function (data) {
//console.log(data);
        document.getElementById("linkagerequeststable").innerHTML += data;
    });
}

function allowlink(parentID, studentID) {
    console.log("Fired");
    $.post("PHP/allowlink.php", {parentID: parentID, studentID: studentID}).done(function (data) {
        alert(data);
    });
}

function getstudentlist() {
    var val = "getlist";
    document.getElementById("allstudentsinfo").innerHTML = "<tr style=\"font-weight:bold; background-color:#C9DAE4\"><td>Student ID</td><td>Student Name</td><td>Class</td><td>Email Address</td><td>Links</td><td>Edit</td></tr>";
    $.post("PHP/getstudentslist.php", {searchParameter: val}).done(function (data) {
//console.log(data);
        document.getElementById("allstudentsinfo").innerHTML += data;
    });
}

function MsendparentMail() {
    var recipient = document.getElementById("Mparentemail").value;
    var Mparentsubject = document.getElementById("Mparentsubject").value;
    var parentmessage = document.getElementById("parentmessage").value;
    $.post("PHP/personalparentmail.php", {recipient: recipient, Mparentsubject: Mparentsubject, parentmessage: parentmessage}).done(function (data) {
        if (data === "1") {
            document.getElementById("emailspecificParentsResponse").innerHTML = "Message sent";
        } else {
            document.getElementById("emailspecificParentsResponse").innerHTML = "Message not sent";
        }
    });
}

function deleteClass(tID) {
    var asdaf = confirm("Are you sure you want to delete this class?");
    if (asdaf === true) {
        $.post("PHP/removeClass.php", {tID: tID}).done(function (data) {
            alert(data);
        });
    } else {

    }
}

//<table class='table table-striped table-condensed' style='font-size:12px; margin-bottom:10px' id='teacherslist'><tr><td colspan='3' style='text-align: center; padding:20px'>Click refresh to display list</td></tr></table>
function deleteClassT(tID) {
    var asdaf = confirm("Are you sure you want to remove this record?");
    if (asdaf === true) {
        $.post("PHP/removeTeacher.php", {tID: tID}).done(function (data) {
            alert(data);
            teacherlist()
        });
    } else {

    }
}

function teacherlist() {
    $("#teacherList").addClass("fa-spin");
    var req = "getlist";
    document.getElementById("teacherslisting").innerHTML = "<div style='font-family:verdana; font-size:12px; font-weight:700; margin-bottom:10px'>Staff</div><table class='table table-striped table-condensed' style='font-size:12px; margin-bottom:10px' id='teacherslist'><tr style=\"font-weight:bold; background-color:#D0E0E8; font-size:13px\"><td></td><td>Name</td><td>StaffID</td><td>Update</td></tr></table><div id='subjectTeacherList' style='margin-top:10px; margin-bottom:10px'></div>";
    $.post("PHP/getteachers.php", {wtd: req}).done(function (data) {
        document.getElementById("teacherslist").innerHTML += data;
        $("#teacherList").removeClass("fa-spin");
        subjectTeacherList();
    });
}

function updatesubjectTeachers() {
    var SN = document.getElementById("subjectSNDetail").innerHTML;
    var teacherID = document.getElementById("assignSubjectTeacherID").value;
    alert(SN + " - " + teacherID);
    $.post("PHP/updatesubjectTeacher.php", {SN: SN, teacherID: teacherID}).done(function (data) {
        alert(data);
    });
}

function updateSubject(val) {
    $("#updatesubject").show(250);
    $.post("PHP/updateSubject.php", {subjectSN: val}).done(function (data) {
//"<q>".$subjectID."</q><w>".$SubjectName."</w><e>".$subjectclass."</e>";
        var div = document.createElement("div");
        var content = data;
        div.innerHTML = content;
        var subjectName = div.getElementsByTagName("q")[0];
        var SubjectClass = div.getElementsByTagName("w")[0];
        var subjectTeacherID = div.getElementsByTagName("e")[0];
        var subjectTeacher = div.getElementsByTagName("f")[0];
        var SNDetail = div.getElementsByTagName("g")[0];
        document.getElementById("updatesubjectname").value = subjectName.innerText;
        document.getElementById("updatesubjectclass").value = SubjectClass.innerText;
        document.getElementById("assignSubjectTeacherID").value = subjectTeacherID.innerText;
        document.getElementById("assignSubjectTeacher").value = subjectTeacher.innerText;
        document.getElementById("subjectSNDetail").innerHTML = SNDetail.innerText;
    });
}

function getsubjects(vv) {
    if (vv === "filter") {
        var filterclass = document.getElementById("filtersubclass").value;
        $.post("PHP/getSubjects.php", {searchKind: vv, value: filterclass}).done(function (data) {
            document.getElementById("subjectFisM").innerHTML = "<table class=\"table table-condensed table-striped table-responsive\" style=\"font-size:13px; font-family:verdana\" id='subjectsDis'></table>";
            document.getElementById("subjectsDis").innerHTML += data;
            //console.log(data);
        });
    }
    if (vv === "all") {
        $.post("PHP/getSubjects.php", {searchKind: vv}).done(function (data) {
            document.getElementById("subjectFisM").innerHTML = "<table class=\"table table-condensed table-striped table-responsive\" style=\"font-size:13px; font-family:verdana\" id='subjectsDis'></table>";
            document.getElementById("subjectsDis").innerHTML += data;
            //console.log(data);
        });
    }
    if (vv === "search") {
        var searcher = document.getElementById("subjectSearch").value;
        $.post("PHP/getSubjects.php", {searchKind: vv, value: searcher}).done(function (data) {
            document.getElementById("subjectFisM").innerHTML = "<table class=\"table table-condensed table-striped table-responsive\" style=\"font-size:13px; font-family:verdana\" id='subjectsDis'></table>";
            document.getElementById("subjectsDis").innerHTML += data;
            //console.log(data);
        });
    }
}

function deleteSubject(num) {
    var c = confirm("Do you want to delete this subject?");
    if (c === true) {
        $.post("PHP/deleteSubject.php", {val: num}).done(function (data) {
            alert(data);
        });
    } else {
        alert("You chose to not delete");
    }
}

function subjectTeacherList() {
    document.getElementById("subjectTeacherList").innerHTML = "<div style='margin-top:40px;margin-bottom:20px; font-weight:bold;'>Staff by subject(s)</div><div style='max-height:400px; overflow-y:auto'><table class='table table-striped table-condensed' id='agasdd' style='font-family:verdana; margin-top:10px; font-size:12px'><tr style='font-weight:700'><td>Teacher Name</td><td>Class</td><td>Subject Name</td></tr></table></div>";
    $.post("PHP/getsubjectTeacher.php").done(function (data) {

        document.getElementById("agasdd").innerHTML += data;
    });
}

function checDD() {
    var classID = document.getElementById("teacherclassID").value;
    console.log(classID);
    if (classID === "Subject Teacher") {
        $("#subjectteachernio").show();
    } else {
        $("#subjectteachernio").hide();
    }
}

function AddTeacher() {
    var name = document.getElementById("teacherName").value;
    var phone = document.getElementById("teacherphone").value;
    var credential = document.getElementById("teachercredential").value;
    var address = document.getElementById("teacheraddress").value;
    var email = document.getElementById("teacheremail").value;
    if (name < 1 || phone < 1 || credential < 1 || address < 1 || email < 4) {
        document.getElementById("addTnotification").innerHTML = "<font style='color:#ff0000'>Fill all fields</font>";
    } else {
        $.post("PHP/addSubjectteacher.php", {name: name, email: email, phone: phone, credential: credential, address: address}).done(function (data) {
//console.log(data);
            alert(data);
        });
    }
}

function saveteachersetting() {
    var m = document.getElementById("TSdm").selectedIndex;
    var t = document.getElementById("TSta").selectedIndex;
    var i = document.getElementById("TSin").selectedIndex;
    $.post("PHP/teacherSetting.php", {dm: m, ta: t, nl: i}).done(function (data) {
        console.log(data);
    });
}

function loadSEvent() {
//document.getElementById("loadingEv").innerHTML = "<i class=\"fa fa-spin fa-refresh\"></i> &nbsp; loading events";
    $.post("PHP/getEvents.php").done(function (data) {
        document.getElementById("allevents").innerHTML = data;
        //document.getElementById("loadingEv").innerHTML = "";
    });
}

function createSEvent() {
    var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var ordinal = ["th", "st", "nd", "rd", "th", "th", "th", "th", "th"];
    //alert(month[1]);
    document.getElementById("eventnotification").innerHTML = "Please wait...";
    var ceName = document.getElementById("ceName").value;
    var ceDesc = document.getElementById("ceDesc").value;
    var cesDate = document.getElementById("cesDate").value;
    var ceeDate = document.getElementById("ceeDate").value;
    var ePublish = document.getElementById("ePublish").selectedIndex;
    //var smonth = month[cesD;
    console.log(ePublish);
    if (ePublish === 0) {
        var pubStat = "Unpublished";
    } else {
        var pubStat = "Published";
    }
    console.log(pubStat);
    if (cesDate) {
        var sMonth = month[cesDate.substring(5, 7) - 1];
        var sYear = cesDate.substring(0, 4);
        var d = cesDate.substring(8, 10);
        var od = ordinal[d % 10];
        if (d === "19") {
            var ov = "19th";
        } else {
            var ov = dy + ods;
        }
        var startD = ov + " of " + sMonth + " " + sYear;
    }

//EndDate resolver
    if (ceeDate) {
        var eMonth = month[ceeDate.substring(5, 7) - 1];
        var eYear = ceeDate.substring(0, 4);
        var dy = ceeDate.substring(8, 10);
        var ods = ordinal[dy % 10];
        if (dy === "19") {
            var ove = "19th";
        } else {
            var ove = dy + ods;
        }

        var endD = ove + " of " + eMonth + " " + eYear;
    }


    if (ceeDate) {
        var dRange = startD + " - " + endD;
    } else {
        var dRange = startD;
    }



    if (!ceName || !ceDesc || !cesDate) {
        document.getElementById("eventnotification").innerHTML = "<span style='font-size:12px;font-family:verdana; color:#CD277D'>Fill all fields</span>";
    } else {
        $.post("PHP/createevent.php", {eName: ceName, ceDesc: ceDesc, cesDate: cesDate, ceeDate: ceeDate, ePublish: ePublish}).done(function (data) {
            console.log(data);
            switch (data) {
                case "0":
                    document.getElementById("eventnotification").innerHTML = "<span style='font-size:12px;font-family:verdana; color:#CD277D'>Event not saved</span>";
                    break;
                case "1":
                    document.getElementById("eventnotification").innerHTML = "<span style='font-size:12px;font-family:verdana; color:#005E8A'>Saved but not published</span>";
                    document.getElementById("allevents").innerHTML += "<div class='eventContainer'>" +
                            "<span class=\"datepassed\">" + pubStat + "</span>" +
                            "<div class=\"eventslist\" id=\"ename\">" + ceName + "</div>" +
                            "<div class=\"eventDate\" id=\"edate\">" + dRange + "</div></div>";
                    break;
                case "2":
                    document.getElementById("eventnotification").innerHTML = "<span style='font-size:12px;font-family:verdana; color:#005E8A'>Saved and published</span>";
                    document.getElementById("allevents").innerHTML += "<div class='eventContainer'>" +
                            "<span class=\"datepassed\">" + pubStat + "</span>" +
                            "<div class=\"eventslist\" id=\"ename\">" + ceName + "</div>" +
                            "<div class=\"eventDate\" id=\"edate\">" + dRange + "</div></div>";
                    break;
                default:
                    document.getElementById("eventnotification").innerHTML = "<span style='font-size:12px;font-family:verdana; color:#CD277D'>May not have saved.</span>";
                    break;
            }
        });
    }

}

function deleteevent(val) {
    var result = confirm("Are you sure you want to delete event?");
    if (result) {
        $.post("PHP/deleteevent.php", {eventid: val}).done(function (data) {
            alert(data);
        });
    }
}

function getTeacherInfo(id) {
    $.post("PHP/getstaff.php", {sID: id}).done(function (data) {
        $("#staffupdate").show(300);
        var div = document.createElement("div");
        var content = data;
        div.innerHTML = content;
        //
        var credential = div.getElementsByTagName("q")[0];
        var email = div.getElementsByTagName("w")[0];
        var phone = div.getElementsByTagName("e")[0];
        var address = div.getElementsByTagName("r")[0];
        var names = div.getElementsByTagName("t")[0];
        document.getElementById("sName").innerHTML = id;
        //uNames
        document.getElementById("uTNames").value = names.innerText;
        document.getElementById("uTEmail").value = email.innerText;
        document.getElementById("uTNumber").value = phone.innerText;
        document.getElementById("uTCredential").value = credential.innerText;
        document.getElementById("uTAddress").value = address.innerText;
    });
}

function updateTeacher() {
    var id = document.getElementById("sName").innerHTML;
    var sName = document.getElementById("uTNames").value;
    var sEmail = document.getElementById("uTEmail").value;
    var sSNumber = document.getElementById("uTNumber").value;
    var sCredential = document.getElementById("uTCredential").value;
    var sAddress = document.getElementById("uTAddress").value;
    $.post("PHP/updatestaff.php", {sID: id, sName: sName, sEmail: sEmail, sNumber: sSNumber, sCredential: sCredential, sAddress: sAddress}).done(function (data) {
        console.log(data);
        if (data === "1") {
            alert("Updated successfully");
        } else {
            alert("Not updated");
        }
    });
}

function publishArticle(recordID, wtd) {
    $.post("PHP/updateevent.php", {recordID: recordID, wtd: wtd}).done(function (data) {
        alert(data);
    });
}

function sendNewsletters() {
    document.getElementById("PmailMessage").innerHTML = "Please wait...";
    var NLsub = document.getElementById('NLsubject').value;
    var message = $('#NLmessage').code();
    ;
    if (!NLsub || message.length < 4) {
        document.getElementById("PmailMessage").innerHTML = "<font style='color:#ff0000'>Please fill necessary fields</font>";
    } else {
        $.post("PHP/sendnewsletter.php", {NLsubject: NLsub, message: message}).done(function (data) {
            document.getElementById("PmailMessage").innerHTML = data;
        });
    }
}

function getnlContent(toget) {
    $.post("PHP/getnlcontent.php", {pullc: toget}).done(function (data) {
        document.getElementById("nlContent").innerHTML = data;
    });
}

function getnl(sender) {
    document.getElementById("sentNewsletters").innerHTML = "<tr style='background-color:#D0E0E8'><th>Subject</th><th>Date sent</th></tr>";
    $.post("PHP/getnl.php", {sender: sender}).done(function (data) {
        document.getElementById("sentNewsletters").innerHTML += data;
    });
}

function eventsDash() {
    document.getElementById("shownevents").innerHTML = "<i class=\"fa fa-spin fa-refresh\"></i> &nbsp; loading events";
    $.post("PHP/getEventsfp.php").done(function (data) {
        document.getElementById("shownevents").innerHTML = data;
    });
}

function addtimetable() {
    document.getElementById("schoolTermtable").innerHTML = "<tr><td colspan=2 style='font-weight:bold'>TERM CALENDAR</td></tr>";
    var term = document.getElementById("term").value;
    var yr = document.getElementById("ttyear").value;
    var activity = document.getElementById("activity").value;
    var tttime = document.getElementById("tttime").value;
    if (!term || !yr || !activity || !tttime) {
        alert("Fill all");
    } else {
        $.post("PHP/addtermrecord.php", {term: term, yr: yr, activity: activity, ttime: tttime}).done(function (data) {
//console.log(data);
            document.getElementById("schoolTermtable").innerHTML += data;
        });
    }
}

function ratifiedtimetable() {
    $.post("PHP/rTimetable.php").done(function (data) {
//console.log(data);
        document.getElementById("ratifiedtimetable").innerHTML = data;
    });
}