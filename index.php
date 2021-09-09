<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Havard Children School</title>
        <link href="CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="JS/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="JS/bootstrap.min.js" type="text/javascript"></script>
        <script src="JS/pageArrangement.js" type="text/javascript"></script>
        <link href='https://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
        <style>
            body{
                background-color:#009CE8;
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
                background-image:linear-gradient(#DE4395,#CB237A);
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
            <div class='clearfix' style="height:100px; background-image:linear-gradient(#FCD651,#FBC715); padding-top:50px; padding-left:20px;">
                
                <span class="pull-right" style="margin-right:0px; background-color:rgba(0,0,0,0.5); padding:10px; padding-right:40px; color:#fff">
                    <?php
                    echo date("l, jS M Y");
                    ?>
                </span>
            </div>
        </div> 
        <div class="col-lg-12" style="padding:20px 0px 10px 0px; background-image:linear-gradient(#FBC715,#D3A503); height:50px">
            
        </div>
        <div class="col-lg-12" style="padding:6px 0px 10px 0px; background-image: url('images/background.jpg'); height:30px">
            <div class="container-fluid menusubItem" style="text-align: center; font-weight:bold; font-family:raleway; color:#003955;">
                
            </div>
        </div>
        <div class="col-lg-12" style="background-image:url('images/excursion.jpg'); background-size: cover; height:auto; min-height:60px">
            
        </div>
        <div class="col-lg-12">

            <div class="container" style="background-color:rgba(255,255,255,0.1); position:relative; min-height:400px; padding:20px; margin-bottom:60px">
                <span style='position:absolute; top:-35px; font-weight:bold; left:0px; font-size:30px; color:rgba(255,255,255,0.2)'>
                    Harvard Children School Portal
                </span>
                <div style="padding:10px">
                    <div class='col-md-4'>
                        </div>
                        <div class='col-md-4' style='text-align:center;'>
                            <span style='background-color:rgba(255,255,255,0.5); padding:40px; border-radius:10px; display:block; margin-bottom:10px;'>
                                <a href='schoolPortal'>Parent Login</a>
                            </span>
                            <span style='background-color:rgba(255,255,255,0.5); padding:40px; border-radius:10px; display:block;'>
                                <a href='portalAdmin'>Admin Login</a>
                            </span>
                        </div>
                        <div class='col-md-4'>
                        </div>
                </div>
            </div>
        </div>
    </body>
</html>
