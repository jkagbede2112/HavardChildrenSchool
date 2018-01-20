<?php
$schoolname = "Havard Children School";

session_start();
error_reporting(0);

$role = $_SESSION['Role'];
if ($role === "Teacher") {
    header('location:PortalTeachers.php');
}elseif($role === "Admin"){
    header('location:dashboard.php');
} elseif($role === "Bursar") {
    header('location:schoolbursar.php');
}
?>
<html>
    <head>
        <script src="JS/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="JS/bootstrap.min.js" type="text/javascript"></script>
        <title><?php echo $schoolname ?> Portal</title>
        <style>
            body{
                margin:0px;
            }
            .fa-refresh{
                cursor:pointer;
            }
            .de{
                color:#CD277D;
                padding:2px;
                border-radius:2px;
            }
            .de:hover{
                background-color:#CD277D;
                color:#fff;
            }
            .ac{
                color:#255625;
                padding:2px;
                border-radius:2px;
            }
            .ac:hover{
                color:#fff;
                background-color:#255625
            }
            .menuitems div:hover{
                background-color:rgba(0,0,0,0.2);
                transition:0.25s;
            }
            .menuitems{
                cursor:pointer;
                color:#fff;
            }
            .activemenu{
                background-color:rgba(0,0,0,0.2);
                color:#1CB5FF;
            }
            .activemsgtype{
                background-color:#005E8A;
                color:#003955;
            }
            .messages{
                cursor:pointer;
            }
            .activemsg{
                background-color:rgba(0,0,0,0.1);
            }
            .dashmenu{
                position:absolute; 
                color:#FCD039; 
                font-size:12px; 
                font-family:verdana; 
                top:60px;
            }
            .pl{
                margin:2px; 
                background-color:#C5D9E2; 
                cursor:pointer; 
                padding:5px;
                border-radius:2px;
            }
            .pl:hover{
                background-color:#005E8A;
                color:#FFF;
                transition:0.25s;
            }
            .pls{
                background-color:#005E8A !important;
                color:#FFF !important;
            }
            .menustyling{
                color:#E3EDF2 ; 
                font-size:30px !important; 
                padding:25px; 
                padding-left:30px; 
                padding-right:40px;
                position:relative
            }
            .point{
                cursor:pointer;
            }
            .ptr{
                cursor:pointer;
            }
            .eventslist{
                font-size:25px; 
                padding:20px; 
                padding-bottom:0px; 
                color:#A88302;
                font-family: 'Roboto', sans-serif;
            }
            .eventDate{
                font-size:14px; 
                padding-left:20px; 
                width:auto; 
                font-family:verdana; 
                color:#2C4C5B
            }
            .deleteevent{
                position:absolute; 
                right:13px; 
                top:8px; 
                color:#BDD5DF; 
                padding:3px
            }
            .deleteevent:hover{
                padding:3px;
                background-color:#BDD5DF;
                color:#CD277D;
                transition:0.5s
            }
            .updateevent{
                position:absolute; 
                right:35px; 
                top:9px; 
                color:#BDD5DF; 
                padding:3px;
            }
            .eventContainer{
                background-color:rgba(255,255,255,0.2); 
                min-height:100px;
                position:relative; 
                margin-bottom: 10px;
                cursor:pointer;
                border-radius:4px;
                border-style:solid;
                border-color:#C9DCE4;
                border-width:thin;
            }
            .eventContainer:hover{
                background-color:rgba(255,255,255,0.5);
                transition: 0.5s
            }
            .datepassed{
                position:absolute; 
                bottom:6px; 
                right:10px; 
                font-size:12px; 
                font-family:verdana; 
                color:#CD277D
            }
        </style>
        <link href="../CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/fa/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <script src="JS/summernote.min.js" type="text/javascript"></script>
        <link href="JS/summernote.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    </head>
    <body>

        <div class="clearfix">
            <div class="pull-left menuitems" style="width:100px; background-color:#009CE8; min-height:100%; position:fixed; overflow-x: hidden; background-image: url('../images/background.jpg')">

            </div>
            <div class="pull-right" style="width:calc(100% - 100px); background-color:#D0E0E8; min-height:100%">
                <div class="clearfix" style="height:50px; background-color:#005E8A; border-bottom-style: solid; border-bottom-width:thin; border-bottom-color:#000; box-shadow:0px 0px 1px #000">


                </div>
                <div style="height:30px; color:#E3EDF2; font-size:12px; padding:7px; background-image: url('../images/background.jpg'); margin-bottom:20px; box-shadow:0px 0px 1px #000">
                    FlashCards plugin now available ( Learn more - Request plugin )
                </div>
                <div style='margin:20px'>
                    <div class='row' style='margin:0px;' id="messages">
                        <div class="col-lg-10" style="min-height:200px;">
                            <div class="col-lg-12">
                                <div class="col-lg-2" id="messageheader">

                                </div>
                                <div class="col-lg-8">
                                    <div style="font-family:raleway; font-size:30px; margin-bottom:20px; margin-top:60px">
                                        Login
                                    </div>
                                    <div style="font-size:17px; padding:20px; min-height: 240px; background-color:rgba(255,255,255,0.4); position:relative">
                                        <span style="position:absolute; top:10px; right:10px; font-size:12px; font-family:verdana" id="logininfo">
                                           
                                        </span>
                                        <div style="min-height:200px">
                                            <span style="font-size:13px; font-family:montserrat, verdana" class="clearfix">
                                                <span id="messagebody">
                                                    <label style="margin-top:20px">Username</label>
                                                    <input type="text" placeholder="Username" id="BEusername" class="form-control" style="margin-bottom:20px">
                                                    <label>Password</label>
                                                    <input type="password" placeholder="Password" id="BEpassword" class="form-control" style="margin-bottom:20px">
                                                    <span class="btn btn-success" onclick="loginBackend()">Login</span>
                                                    <div style="margin-top:10px; font-size:13px; font-family:verdana">
                                                        Forgotten your password? <span style="cursor:pointer">Click here</span>.
                                                    </div>
                                                </span>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $("[data-toggle='popover']").popover();
                });
            </script>
            <script src="JS/adminJS.js" type="text/javascript"></script>
    </body>
</html>

