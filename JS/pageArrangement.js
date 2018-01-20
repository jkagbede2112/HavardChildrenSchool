/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onload = function () {
    //console.log('This is done loading');
    //showPage("#conveyourimages");
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

function refreshsubmenuitems(loadwhat) {
    switch (loadwhat) {
        case "home":
            document.getElementById("menuitems").innerHTML = "<span class='submenuitem' onclick='showonlyfrommenu(home,homemenu)'>Welcome</span>";
            break;
        case "aboutus":
            document.getElementById("menuitems").innerHTML = "<span class='submenuitem' onclick='showonlyfrommenu(board,aboutmenu)'>Board</span> - <span class='submenuitem' onclick='showonlyfrommenu(ouroffer,aboutmenu)'>Our Offer</span> - <span class='submenuitem' onclick='showonlyfrommenu(impressiveperformance,aboutmenu)'>Our Performance</span> - <span class='submenuitem' onclick='showonlyfrommenu(uniquepoints,aboutmenu)'>Our unique selling points</span> - <span class='submenuitem' onclick='showonlyfrommenu(meetceo,aboutmenu)'>Meet the CEO</span>";
            break;
        case "admission":
            document.getElementById("menuitems").innerHTML = "<span class='submenuitem' onclick='showonlyfrommenu(admissionpolicy,admissionmenu)'>Admissions</span>";
            break;
        case "facilities":
            document.getElementById("menuitems").innerHTML = "<span class='submenuitem' onclick='showonlyfrommenu(ourfacilities,ourfacilitiesmenu)'>Facilities</span>";
            break;
        case "informationdesk":
            document.getElementById("menuitems").innerHTML = "<span class='submenuitem' onclick='showonlyfrommenu(ourfacilities,informationdesk)'>Information Desk</span>";
            break;
        case "news":
            document.getElementById("menuitems").innerHTML = "<span class='submenuitem' onclick='showonlyfrommenu(ourfacilities,news)'>News</span>";
            break;
        case "contact":
            document.getElementById("menuitems").innerHTML = "<span class='submenuitem' onclick='showonlyfrommenu(address, contactmenu)'>Contact</span>";
            break;
        case "gallery":
            document.getElementById("menuitems").innerHTML = "<span class='submenuitem' onclick='showonlyfrommenu(ourfacilities,picturemenu)'>Gallery</span>";
            break;
        case "curricular":
            document.getElementById("menuitems").innerHTML = "<span class='submenuitem' onclick='showonlyfrommenu(extracurricular,extracurricularmenu)'>Extra Curricular</span>";
    }
}

function showonlyfrommenu(whattoshow, classupdate) {
    $("#home").hide();
    $("#board").hide();
    $("#ouroffer").hide();
    $("#uniquepoints").hide();
    $("#impressiveperformance").hide();
    $("#meetceo").hide();
    $("#admissionpolicy").hide();
    $("#ourfacilities").hide();
    $("#extracurricular").hide();
    $("#address").hide();


    $(whattoshow).show(100);

    $(".topmenu").removeClass("activemenu");
    $(classupdate).addClass("activemenu");
}


function showonly(whattoshow, idupdate) {
    $("#preregisterstudents").hide();
    $("#attachstudent").hide();
    $("#viewstudent").hide();
    $("#uniquepoints").hide();
    $("#messageme").hide();

    $(whattoshow).show();

if (whattoshow === "#viewstudent"){
    console.log("checking for student");
}

    $(".portalsubmenu").removeClass("activeportal");
    $(idupdate).addClass("activeportal");
}
//
function showwhatPage(whattoshow, idupdate) {
    $("#loginportal").hide();
    $("#registerportal").hide();
    $(whattoshow).show(100);

    $(".pportal").removeClass("activemenu");
    $(idupdate).addClass("activemenu ");
}

function suggestion() {
    document.getElementById("serverSResponse").innerHTML = "Please wait...";
    var names = document.getElementById('Sname').value;
    var email = document.getElementById('Semail').value;
    var suggestion = document.getElementById('Ssuggestion').value;

    if (document.getElementById('eminiS').checked === true) {
        document.getElementById("serverSResponse").innerHTML = "<font style='color:red'><center>Thanks for the fill</center></font>";
    } else {
        $.post("PHP/suggestion.php", {
            name: names,
            email: email,
            suggestion: suggestion,
        })
                .done(function (data) {
                    if (data === "<center><font style='color:green'><b>Appointment request saved</b></font></center>") {
                        document.getElementById("serverSResponse").innerHTML = data;
                        clearsuggestion();
                    } else {
                        document.getElementById("serverSResponse").innerHTML = data;
                    }
                });
    }
}

function contact() {
    document.getElementById('contact').style.display = 'block';
    document.getElementById('content').style.display = 'none';
    $("#lnkcontent").removeClass("selectMenu");
    $("#lnkcontact").addClass("selectMenu");
}

function content() {
    document.getElementById('contact').style.display = 'none';
    document.getElementById('content').style.display = 'block';
    $("#lnkcontact").removeClass("selectMenu");
    $("#lnkcontent").addClass("selectMenu");
}
