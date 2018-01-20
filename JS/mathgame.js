/*
 var score = 0;
 limiter = 1;
 level;
 timeAllowed;
 */
var questioncount = 0;
var level = 0;
var vectorJ = 0;

function statement() {
    document.getElementById("pregamecomment").innerHTML = "You have chosen to go <b>" + document.getElementById("selectedLevel").value + "</b> with game type <b>" + document.getElementById("vector").value + "</b>.";
    messagecontent();
}

//setInterval(function(){sumtin();},10000);

function questionincrement(){
    ++questioncount;
    var q = questioncount;
    if (q < 10){
        q = "0"+q;
    }
    document.getElementById("questioncount").innerHTML = q;
    if (q === 20){
        alert("We there");
    }
}

function sumtin() {
    questionincrement();
    var val1 = parseInt(Math.floor(Math.random() * 10000));
    var val2 = parseInt(Math.floor(Math.random() * 10000));
    document.getElementById("firstvalue").innerHTML = val1;
    document.getElementById("secondvalue").innerHTML = val2;
}

function messagecontent() {
    switch (level) {
        case 0:
            document.getElementById("pregamecomment").innerHTML += "<br> <span style='font-weight:bold; font-size:18px'>Answer 10</span> questions in 4 minutes";
            break;

        case 1:
            document.getElementById("pregamecomment").innerHTML += "<br> <span style=\"font-weight:bold; font-size:18px\">Answer 10</span> questions in 3 minutes";
            break;

        case 2:
            document.getElementById("pregamecomment").innerHTML += "<br> <span style=\"font-weight:bold; font-size:18px\">Answer 10</span> questions in 2 minutes";
            break;

        case 3:
            document.getElementById("pregamecomment").innerHTML += "<br> <span style=\"font-weight:bold; font-size:18px\">Answer 10</span> questions in 1 minute";
            break;

        case 4:
            document.getElementById("pregamecomment").innerHTML += "<br> <span style=\"font-weight:bold; font-size:18px\">Answer 10</span> questions in <span style=\"color:#990000; font-size:18px\">30 seconds</span>";
            break;
    }
    document.getElementById("pregamecomment").innerHTML += "<br><br><span style='padding:5px; color:#fff; border-radius:4px; background-color:#CD277D; cursor:pointer' onclick='startgaming()'>Start</span>";
}

function startgaming() {

}

function getindex() {
    level = document.getElementById("selectedLevel").selectedIndex;
}

function vector() {
    vectorJ = document.getElementById("vector").selectedIndex;
    switch (vectorJ) {
        case 0:
            mathelement = "+";
            break;

        case 1:
            mathelement = "-";
            break;

        case 2:
            mathelement = "*";
            break;

        case 3:
            mathelement = "/";
            break;

        case 4:
            mathelement = "%";
            break;

        case 5:
            mathelement = "^";
            break;
    }
}

function levelS() {
    level = parseInt(document.getElementById("level").value);
    switch (level) {
        case 1:
            timeAllowed = 10000;
            document.getElementById("level").innerHTML = level;
            break;

        case 2:
            timeAllowed = 6000;
            document.getElementById("level").innerHTML = level;
            break;

        case 3:
            timeAllowed = 3000;
            document.getElementById("level").innerHTML = level;
            break;

        default:
            timeAllowed = 1000;
            document.getElementById("level").innerHTML = level;
            break;
    }
//alert(playername + ", " +level + " has been chosen. You can proceed to table 2");
    document.getElementById("whatsup").innerHTML = "You are playing level " + level + ". You are required to answer the questions in " + timeAllowed / 1000 + " seconds";
    timing();
}
function countNumber() {
    limiter += 1;
    document.getElementById("quest").innerHTML = limiter;
    if (limiter == 20) {
//stop questioning
        clearInterval(qq);
    }
}

function generateValues() {
    document.getElementById("submitthis").disabled = false;
    document.getElementById("answer").value = "";
    document.getElementById("resp").innerHTML = "";
    fVal1 = Math.floor(Math.random() * 350);
    fVal2 = Math.floor(Math.random() * 350);
    document.getElementById("value1").value = fVal1;
    document.getElementById("value2").value = fVal2;
}

function computeVal() {
    fVal1 = parseInt(document.getElementById("value1").value);
    fVal2 = parseInt(document.getElementById("value2").value);
    tot = fVal1 + fVal2;
    response = parseInt(document.getElementById("answer").value);
    if (tot == response) {
        document.getElementById("resp").innerHTML = "You are correct";
        document.getElementById("resp").style.background = "green";
        score += 1;
        document.getElementById("score").innerHTML = score;
    } else {
        document.getElementById("resp").innerHTML = "You are wrong";
        document.getElementById("resp").style.background = "red";
        score += 0;
        document.getElementById("score").innerHTML = score;
    }
    document.getElementById("submitthis").disabled = true;
    countNumber();
    percentile();
}

function percentile() {
    if (score == 0) {
        document.getElementById("percentage").innerHTML = "0%";
    } else {
        percentage = ((score / limiter) * 100) + "%";
        document.getElementById("percentage").innerHTML = percentage;
    }
}
function timing() {
    qq = setInterval(function () {
        generateValues()
    }, timeAllowed);
}