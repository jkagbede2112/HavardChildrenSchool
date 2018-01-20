/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function showPage(wts, sts) {
    hideallPortal();
    $(wts).show();
    $(".pportal").removeClass("activemenu");
    $(sts).addClass("activemenu");
}

function hideallPortal() {
    $("#loginportal").hide();
    $("#registerportal").hide();
    $("#emailuserpassword").hide();
}

function checkpasswords() {
    if ($("#password").val().length < 5) {
        document.getElementById("Message").innerHTML = "Your password cannot be less than 5 characters";
    } else {
        if ($("#firstname").val().length < 2) {
            document.getElementById("Message").innerHTML = "Your firstname should be more than a character";
        } else {
            if ($("#lastname").val().length < 2) {
                document.getElementById("Message").innerHTML = "Your lastname should be more than a character";
            } else {
                if ($("#emailaddress").val().length < 6) {
                    document.getElementById("Message").innerHTML = "Your email should be more than 6 characters";
                } else {
                    if ($("#password").val() !== $("#passwordverify").val()) {
                        document.getElementById("Message").innerHTML = "Password fields do not match ";
                    } else {
                        registerPortalHandler();
                    }
                }
            }
        }
    }
}

function registerPortalHandler() {
    document.getElementById("Message").innerHTML = "Please wait...";
    var firstName = $("#firstname").val();
    var lastName = $("#lastname").val();
    var email = $("#emailaddress").val();
    var password = $("#password").val();

    $.post("PHP/RegisterPortal.php", {
        firstname: firstName,
        lastname: lastName,
        email: email,
        password: password
    })
            .done(function (data) {
                document.getElementById("Message").innerHTML = data;
            });
}

//LoggedIn to portal scripts
function showonly(pts, buttonstyling) {
    $("#preregisterstudents").hide();
    $("#attachstudent").hide();
    $("#viewstudent").hide();
    $("#messageme").hide();
    $("#braintrainI").hide();

    $(pts).show();

    $(".portalsubmenu").removeClass("activeportal");
    $(buttonstyling).addClass("activeportal");
}

function mainnavigation(tsw, mainbtnstyling) {
    $("#mainstudent").hide();
    $("#mainaccount").hide();
    $("#mainabout").hide();
    $("#events").hide();

    $(pts).show();

}