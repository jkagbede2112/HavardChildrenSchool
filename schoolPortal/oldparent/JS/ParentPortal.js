/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * komooo@gmail.com
 */


function _(e) {
    return document.getElementById(e);
}

function loginportal(){
    var portalusername = document.getElementById("username").value;
    var portalpassword = document.getElementById("password").value;
    
    //console.log(portalusername + " " + portalpassword);
    $.post("../schoolPortal/PHP/login.php",{username:portalusername, password:portalpassword}).done(function(data){
        if (data === "1"){
            window.location = "dashboard.php";
        }
        
        if (data === "0"){
            alert("Verify your your email. click on the verify link in your email..");
        }
        
        if (data=== "-1"){
            alert("Invalid Username and password");
        }
    });
}

function payhist(val) {
    //alert(val);
    var term = _("csfT").value;
    var sess = _("csfS").value;
    //document.getElementById("mycresult").innerHTML = "<tr style='font-weight:bold; color:#238B69'><td></td><td>Payment Desc</td><td>Amount</td><td>ReceiptID</td><td>Date</td><td>Bank</td><td>Teller Number</td></tr>";
    $.post("PHP/getpaymenthistory.php", {val: val, term: term, session: sess}).done(function (data) {
        document.getElementById("mycresult").innerHTML = data;
        getBalance(val,term,sess);
    });
}

function getBalance(val,term,sess){
    $.post("PHP/getpaymentbalance.php",{val:val, term:term, session:sess}).done(function(data){
        //alert(data);
    });
}

function sendMessage(){
    var whom = document.getElementById("schoolAdminMessage").value;
    var cont = document.getElementById("schoolAdminContent").value;
    //alert(whom + " " + cont);
    $.post("PHP/sendMessage.php",{to:whom, content:cont}).done(function(data){
        alert(data);
    });
}

function preregisteration(){
    var name = document.getElementById("preregname").value;
    var phone = document.getElementById("preregphone").value;
    var classr =document.getElementById("preregclass").value;
    var address = document.getElementById("preregaddress").value;
    
    $.post("PHP/preregisterstd.php",{name:name, phone:phone, classr:classr, addreee:address}).done(function(data){
        alert(data);
    });
}

function attachstudents(parentID) {
    var studentID = document.getElementById("attachstudentID").value;
    if (studentID.length < 2) {
        alert("Invalid ID");
    } else {
        var parentID = parentID;
        $.post("PHP/attachstudent.php", {studentID: studentID, parentID: parentID}).done(function (data) {
            document.getElementById("servermessage").innerHTML = data;
        });
    }
}

function ratifiedtimetable() {
    $.post("../portalAdmin/PHP/rTimetable.php").done(function (data) {
        //console.log(data);
        document.getElementById("ratifiedtimetable").innerHTML = data;
    });
}

function getnlContent(toget) {
    $.post("../portalAdmin/PHP/getnlcontent.php", {pullc: toget}).done(function (data) {
        document.getElementById("nlContent").innerHTML = data;
    });
}

function getnl(sender) {
    $("#newslettermessage").show();
    $("#messages").hide();
     $(".messages").removeClass("activeportal");
    $("#newslettersmsg").addClass("activeportal");
    
    ratifiedtimetable();
    document.getElementById("sentNewsletters").innerHTML = "<tr style='background-color:#D0E0E8'><th>Subject</th><th>Date sent</th></tr>";
    $.post("../portalAdmin/PHP/getnl.php", {sender: sender}).done(function (data) {
        document.getElementById("sentNewsletters").innerHTML += data;
    });
}

function statistics() {
    $.post("PHP/getstats.php").done(function (data) {
        
        //document.getElementById("statistics").innerHTML = data;
        var content = data;
         var div = document.createElement('div');
         div.innerHTML = content;
         
         var requests = div.getElementsByTagName('r')[0];
         var approved = div.getElementsByTagName('a')[0];
         
        document.getElementById("statistics").innerHTML = requests.innerText + " requests, " + approved.innerText + " approved";
    });
}

function retrieveApproved() {
    $.post("PHP/approvedattachment.php").done(function (data) {
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
        //console.log(data);
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

function eventsDash() {
    document.getElementById("shownevents").innerHTML = "<i class=\"fa fa-spin fa-refresh\"></i> &nbsp; loading events";
    $.post("../portalAdmin/PHP/getEventsfp.php").done(function (data) {
        document.getElementById("shownevents").innerHTML = data;
        console.log("This fired");
    });
}

function showPage(wts, active) {
    
    $("#accountmenucontent").hide();
    $("#studentmenucontent").hide();
    $("#messageboardmenucontent").hide();
    $("#schoolEvent").hide();
    
    if (wts === "#schoolEvent"){
        ratifiedtimetable();
    }

    $(wts).show();
    $(".pportal").removeClass("activemenu");
    $(active).addClass("activemenu");
    eventsDash();
    //showPage('#messageboardmenucontent', '#messageboard')msgprecursor
}

function registerParent() {
    var firstname = document.getElementById("firstname").value;
    if (firstname) {
        var lastname = document.getElementById("lastname").value;
        if (lastname) {
            var emailaddress = document.getElementById("emailaddress").value;
            if (emailaddress) {
                var passwordd = document.getElementById("passwordsu").value;
                var retypedPassword = document.getElementById("passwordverify").value;
               
                if (passwordd.length < 4) {
                    document.getElementById("Message").innerHTML = "<font style='color:red'>Password must be more than 4 characters</font>";
                } else {
                    if (passwordd === retypedPassword) {
                        document.getElementById("Message").innerHTML = "<font style='color:black'>Please wait..</font>";

                        $.post("PHP/RegisterPortal.php", {
                            email: emailaddress,
                            firstname: firstname, 
                            lastname: lastname,
                            password: passwordd
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

function loadDM(parentID) {
    $("#newslettermessage").hide();
    $("#messages").show();
    
    document.getElementById("msgprecursor").innerHTML = "Please wait";
    $.post("PHP/loadmessages.php", {ParentID: parentID}).done(function (data) {
//        console.log(data);
        document.getElementById("msgprecursor").innerHTML = data;
        $(".messages").removeClass("activeportal");
        $("#dmtab").addClass("activeportal");
    });
}

function loadGM() {
    $("#newslettermessage").hide();
    $("#messages").show();
    var parentID = "All";
    document.getElementById("msgprecursor").innerHTML = "Please wait";
    $.post("PHP/loadmessages.php", {ParentID: parentID}).done(function (data) {
        //console.log(data);
        document.getElementById("msgprecursor").innerHTML = data;
        $(".messages").removeClass("activeportal");
        $("#gmtab").addClass("activeportal");
    });
}

function applystyle(id){
    
    $(".message").removeClass("activemsg");
    $("#"+id).addClass("activemsg");
}

function pullcontent(SN) {
    $.post("PHP/pullcontent.php", {SN: SN}).done(function (data) {
        document.getElementById("mailcontent").innerHTML = data;
    });
}

function checkresult(){
    alert("Not till end of term");
}

function showonly(whattoshow, idupdate) {
    $("#preregisterstudents").hide();
    $("#attachstudent").hide();
    $("#viewstudent").hide();
    $("#uniquepoints").hide();
    $("#messageme").hide();
    $("#braintrainI").hide();
    $("#resultme").hide();

    $(whattoshow).show();

    if (whattoshow === "#viewstudent") {
        //retrieveApproved();
        loadstudentscombo();
    }
    $(".portalsubmenu").removeClass("activeportal");
    $(idupdate).addClass("activeportal");
}

function loadstudentscombo() {
    //alert("Hi stdcombo");
    loadstudentsIDcombo();
    $.post("PHP/loadstudentscombo.php").done(function (data) {
        document.getElementById("registeredstudents").innerHTML = data;
        //document.getElementById("registeredstudentsre").innerHTML = data;
        //registeredstudents
    });
}

function  loadstudentsIDcombo() {
    $.post("PHP/loadstudentsIDcombo.php").done(function (data) {
        document.getElementById("registeredstudentsID").innerHTML = data;
        document.getElementById("registeredstudentsIDre").innerHTML = data;
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
    var studentID = document.getElementById("registeredstudents").value;
    $.post("PHP/getstudentinfo.php", {studentID: studentID}).done(function (data) {
        document.getElementById("studentinfotable").innerHTML = data;
        getassignment(studentID);
    });
}

function getassignment(studentid) {
    //alert(studentid);
    $.post("PHP/getassignment.php", {studentID: studentid}).done(function (data) {
        document.getElementById("assignedhw").innerHTML = data;
    });
}