<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sunshine group of schools.</title>
        <script src="../JS/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="../JS/pageArrangement.js" type="text/javascript"></script>
        <script src="../JS/bootstrap.min.js" type="text/javascript"></script>
        <link href="../CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/pagedefinition.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
        <style>
            body{
                background-color:#009CE8;
                margin:0px;
            }
            .menuItem > span {
                padding:12px;
                color:#fff;
                cursor:pointer;
                font-weight:bold;
            }
            .menuItem > span:hover {
                background-image:linear-gradient(#1CB5FF,#009CE8);
                transition:0.25s;
                border-top-left-radius: 2px;
                border-top-right-radius: 2px;
            }
            .activemenu{
                background-image:linear-gradient(#1CB5FF,#009CE8);
            }
            .submenuitem{
                cursor:pointer;
            }
            .submenuitem:hover{
                cursor:pointer;
                color:#fff;
                transition:0.5s;
            }
        </style>
    </head>
    <body>
        <div style="">
            <div class='clearfix' style="height:150px; background-image:linear-gradient(#FCD651,#FBC715); padding-top:50px; padding-left:20px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:#fff">
                <span class="pull-right" style="margin-right:0px; background-color:rgba(0,0,0,0.5); padding:10px; padding-right:40px; color:#fff">
                    <?php
                    echo date("l, jS M Y");
                    ?>
                </span>
            </div>
        </div> 
        <div class="col-lg-12" style="padding:20px 0px 10px 0px; background-image: url('../images/background.jpg'); height:50px">
            <div class="container-fluid menuItem">
                <span class="pportal activemenu" id="liportal" onclick="showwhatPage('#loginportal','#liportal')">Log in</span>
            </div>
        </div>
        <div class="container" style="">
            <div class="col-lg-12" style="background-color:rgba(255,255,255,0.2); margin-top:50px; margin-bottom:50px; min-height:300px; border-bottom-left-radius: 10px; border-bottom-right-radius:10px; padding:30px">
                <div class="col-lg-6" style="font-size:17px">
                    <div style="font-size:40px; font-weight:bold; color:#fff; font-family:raleway">Welcome Administrator</div><br/>
                    <div>Manage your school</div>
                    <div style="line-height:190% ">
                        
                    </div>
                </div>
                <div class="col-lg-6" style="background-color:rgba(255,255,255,0.4); padding:20px; border-radius:4px">
                    <div class="form-group" style="margin-top:20px; display:block" id="loginportal">
                        <div style="font-family:verdana;margin-top:20px; margin-bottom:20px; font-size:20px; font-weight:bold; color:#003955">Login</div>
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username here" id='username'><br/>
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" id='password'>
                        <input type="button" value="login to portal" class="btn btn-success" style="margin-top:20px" onclick='loginportal()'>
                        <div style="text-align:center">Forgot Username - Forgot Password</div>
                    </div>
                    <div class="form-group" style="margin-top:20px; display:none" id="registerportal">
                        <div style="font-family:verdana;margin-top:20px; margin-bottom:20px; font-size:20px; font-weight:bold; color:#003955">New to our portal? <br/>
                            <span style="font-size:14px; font-weight:normal">Do not use student names in the fields below. This form is to create an account for you, the parent, so use your own details to create this account. You will have an opportunity to attach your students to your account later.</span>
                        </div>
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Firstname" id="firstname"><br/>
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Surname" id="lastname"><br/>
                        <label>Email Address</label>
                        <input type="text" class="form-control" placeholder="Email" id="emailaddress"><br/>
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" id="password"><br/>
                        <label>Re-enter password</label>
                        <input type="password" class="form-control" placeholder="Password" id="passwordverify"><br/>
                        <span id="Message" style="color:#ff0000">Enter your details correctly</span><br/>
                        <input type="checkbox" value="registerRoboChecker" style="display:none">
                        <input type="button" value="Register" class="btn btn-success" style="margin-top:20px; margin-right:10px;" onclick="registerParent()">
                        <input type="button" value="login to portal" class="btn btn-warning" style="margin-top:20px" onclick="showwhatPage('#loginportal','#liportal')"><br/>
                    </div>
                    <div class="form-group" style="margin-top:20px; display:none" id="emailuserpassword">
                        <div style="font-family:verdana;margin-top:20px; margin-bottom:10px; font-size:20px; font-weight:bold; color:#003955">Forgot your password</div>
                        <label>Type your email address</label>
                        <input type="text" class="form-control" placeholder="Username here"><br/>
                        <input type="button" value="login to portal" class="btn btn-success" style="margin-top:20px">
                        <div style="text-align:center">Login</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
