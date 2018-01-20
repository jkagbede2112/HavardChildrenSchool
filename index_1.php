<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Amazing Grace.</title>
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
            <div class='clearfix' style="height:150px; background-image:linear-gradient(#FCD651,#FBC715); padding-top:50px; padding-left:20px;">
                <span>
                    <img src='images/logo.png'>
                </span>
                <span class="pull-right" style="margin-right:0px; background-color:rgba(0,0,0,0.5); padding:10px; padding-right:40px; color:#fff">
                    <?php
                    echo date("l, jS M Y");
                    ?>
                </span>
            </div>
        </div> 
        <div class="col-lg-12" style="padding:20px 0px 10px 0px; background-image:linear-gradient(#FBC715,#D3A503); height:50px">
            <div class="container-fluid menuItem">
                <span class="topmenu activemenu" onmouseover="refreshsubmenuitems('home');" onclick="showonlyfrommenu('#home','#homemenu')" id="homemenu">Home</span>
                <span class="topmenu" onmouseover="refreshsubmenuitems('aboutus');" onclick="showonlyfrommenu('#board','#aboutmenu')" id="aboutmenu">About Us</span>
                <span class="topmenu" onmouseover="refreshsubmenuitems('admission');" onclick="showonlyfrommenu('#admissionpolicy','#admissionmenu')" id="admissionmenu">Admission</span>
                <span class="topmenu" onmouseover="refreshsubmenuitems('facilities');" onclick="showonlyfrommenu('#ourfacilities','#ourfacilitiesmenu')" id="ourfacilitiesmenu">Our Facilities</span>
                <span class="topmenu" onmouseover="refreshsubmenuitems('informationdesk');" onclick="showonlyfrommenu('#home','#informationdeskmenu')" id="informationdeskmenu">Information Desk</span>
                <span class="topmenu" onmouseover="refreshsubmenuitems('curricular');" onclick="showonlyfrommenu('#extracurricular','#extracurricularmenu')" id="extracurricularmenu">Extra-Curricular</span>
                <span class="topmenu" onmouseover="refreshsubmenuitems('news');" onclick="showonlyfrommenu('#home','#newsmenu')" id="newsmenu">News</span>
                <span class="topmenu" onmouseover="refreshsubmenuitems('contact');" onclick="showonlyfrommenu('#address','#contactmenu')" id="contactmenu">Contact</span>
                <span class="topmenu" onmouseover="refreshsubmenuitems('gallery');" onclick="showonlyfrommenu('#home','#picturemenu')" id="picturemenu">Picture Gallery</span>
                <span><a href="#" target="_blank" style="text-decoration:none; color:#fff">Parent portal</a></span>
            </div>
        </div>
        <div class="col-lg-12" style="padding:6px 0px 10px 0px; background-image: url('images/background.jpg'); height:30px">
            <div class="container-fluid menusubItem" style="text-align: center; font-weight:bold; font-family:raleway; color:#003955;">
                <span style="background-color:#000; color:#DDF4FF; padding:5px; padding-left:20px; padding-right:20px" id="menuitems">
                    
                </span>
            </div>
        </div>
        <div class="col-lg-12" style="background-image:url('images/excursion.jpg'); background-size: cover; height:auto; min-height:200px">
            
        </div>
        <div class="col-lg-12">
            <div class="container" style="background-color:rgba(255,255,255,0.1); min-height:400px; padding:20px; margin-bottom:60px">
                <div style="padding:10px">
                    <div class="col-lg-6" style="line-height: 180%">
                        <div id="home" style="display:none">
                            <span style="font-family:raleway; font-size: 30px; color:#fff">
                                Welcome
                            </span>
                            <br/><br/>
                            <b>OUR VISION</b><br/>
                            Our vision for life is to inspire, inform, refine, reform, remold and transform children that have contact with us, in order to effect the positive change their world needs.
                            <br/><br/>
                            <b>OUR MISSION</b><br/>
                            To accomplish the vision, we do the following:
                            <ul>
                                <li>   
                                    Empower the pupil to develop as a rounded character – academically, morally, socially and spiritually;
                                </li>
                                <li>
                                    Provide opportunity for skill acquisition for personal and societal development;
                                </li>
                                <li>
                                    Guide the pupil to discover and pursue his purpose of existence;
                                </li>
                                <li>
                                    Direct the pupils to use and maximize their potentials;
                                </li>
                                <li>
                                    Give the pupils leadership opportunities and roles, as a change agent.
                                </li>
                            </ul>
                        </div>
                        <div id="board" style="display:none">
                            <span style="font-family:raleway; font-size: 30px; color:#fff">
                                BOARD OF GOVERNORS
                            </span>
                            <br/><br/>
                            <b>CHAIRMAN</b><br/>
                            Dr. Timothy Olatayo
                            <br/><br/>
                            <b>DIRECTOR</b><br/>
                            <ul>
                                <li>   
                                    Professor Mrs. Kenny Alebiosu
                                </li>
                                <li>
                                    Dr. Mrs. Olufunke Olaleye
                                </li>
                                <li>
                                    Dr. Samuel O. Odetunde
                                </li>
                                <li>
                                    Barr. Shola Desile
                                </li>
                            </ul>
                            <b>LEGAL ADVISER</b><br/>
                            Dr. Olaitan Lanre<br/><br/>
                            <b>MEDICAL ADVISER</b><br/>
                            Pastor Aliyu R. Taiwo (PHD)<br/>
                            Princess Taiwo Temitayo
                        </div>
                        <div id="ouroffer" style="display:none">
                            <span style="font-family:raleway; font-size: 30px; color:#fff">
                                OUR OFFER
                            </span>
                            <br/><br/>
                            Besides our great emphasis on high moral standard and training associated with it, we placed an equally significant emphasis on our curriculum.
                            Both the Junior and Senior Schools are strictly in compliance with the requirements of the National Policy on Education.
                            Show me your tolls and more importantly the tool handlers and I will tell the quality of the products they will both produce.
                            <br/><br/>
                            We have an acceptable teacher-student ratio. Our teachers are extraordinarily friendly.
                            Indeed, teachers are having a success- based progressive and legitimate relation with their students and pupils in sunshine.
                            Our High School teachers are on the high side academically.
                            <br/><br/>
                            Sunshine kiddies Teachers are not kidding about their business. The Gold teachers of De-Gold turn every child to a golden opportunity while the Diamond teachers make them shine like the diamond in the sky.
                        </div>
                        <div id="uniquepoints" style="display:none">
                            <span style="font-family:raleway; font-size: 30px; color:#fff">
                                OUR UNIQUE SELLING POINTS
                            </span>
                            <br/><br/>
                            <ul>
                                <li>Very attractive structures with serene environment conducive to learning.</li>
                                <li>High qualified and seasoned teachers.</li>
                                <li>Spacious, well furnished and adequate ventilated classrooms.</li>
                                <li>An appropriate teacher-student ratio.</li>
                                <li>Manageable class size.</li>
                                <li>Sporting facilities such as basketball, volleyball, football, table tennis etc.</li>
                                <li>Opportunities for vocational training.</li>
                                <li>Well equipped science laboratories, food and nutrition room and computer pool.</li>
                                <li>Ample opportunities for local and foreign excursion.</li>
                                <li>Transportation conveniences for students from different routes.</li>
                                <li>Unbeatable I.C.T facilities.</li>
                            </ul>
                        </div>
                        <div id="impressiveperformance" style="display:none">
                            <span style="font-family:raleway; font-size: 30px; color:#fff">
                                OUR IMPRESSIVE PERFORMANCE
                            </span>
                            <br/><br/>
                            <ul>
                                <li>Olympiad science competition: 2nd in Biology, 2nd in Chemistry, 2011.</li>
                                <li>2nd Position: N.T.A Ibadan quiz competition among secondary schools in Ibadan. (2006)</li>
                                <li>Over all best award of excellence: Ibadan cultural study summit. (2006)</li>
                                <li>2nd Position: Quiz, debate and play competition organized ny National Museum, Ibadan on National Museum Week .(2006)</li>
                                <li>2nd award winner: Ministry of restoration into holiness; Folayegbe Mosunmola Akintunde Ighodalo Bible Quiz Competition, (2006, November)</li>
                                <li>3rd award Winner: Oyo State Mathematics Competition</li>
                                <li>FRCN_Organized Valentine Programme “do you know true love” the school participated in the debate, dancing competition and poem rendition and came back with prizes. (feb. 2007)</li>
                                <li>1st position: Essay Writing Competition</li>
                                <li>3rd position Quiz Competition Organized by: the Matrix Club, University of Ibadan. (2006)</li>
                                <li>Olapade Agoro Leaders High School, Literary and debating day (dec. 2006)</li>
                                <li>1st position: Quiz Competition</li>
                                <li>1st position: Miming</li>
                                <li>3rd Position: Impromptu speech</li>
                                <li>3rd position: Debate</li>
                                <li>National Mathematical Olympiad – 1st position (2012)</li>
                                <li>Inter School Speech Competition- St. Theresa Seminary, Oke-Are, Ibadan- 3rd position (2013)</li>
                            </ul>
                        </div>
                        <div id="meetceo" style="display:none">
                            <span style="font-family:raleway; font-size: 30px; color:#fff">
                                PRINCESS TAIWO TEMITAYO
                            </span>
                            <br/><br/>
                            I have a dream……”that one day this school will live out the true meaning of her name and shine in every nation of the world.
                            I see possibility: it is possible. I have a dream that one day in this nation; people will no longer be judged rich by their stolen wealth but by their honest achievements and the strength and content of their character.” I have a vision!
                            <br/><br/>
                            <b>OUR VISION</b><br/>
                            Our vision for life is to inspire, inform, refine, reform, remold and transform children that have contact with us, in order to effect the positive change their world needs.
                            <br/><br/>
                            <b>OUR MISSION</b><br/>
                            To accomplish the vision, we do the following:
                            <ul>
                                <li>   
                                    Empower the pupil to develop as a rounded character – academically, morally, socially and spiritually;
                                </li>
                                <li>
                                    Provide opportunity for skill acquisition for personal and societal development;
                                </li>
                                <li>
                                    Guide the pupil to discover and pursue his purpose of existence;
                                </li>
                                <li>
                                    Direct the pupils to use and maximize their potentials;
                                </li>
                                <li>
                                    Give the pupils leadership opportunities and roles, as a change agent.
                                </li>
                            </ul>
                        </div>
                        <div id="admissionpolicy" style="display:none">
                            <span style="font-family:raleway; font-size: 30px; color:#fff">
                                ADMISSION POLICY
                            </span>
                            <br/><br/>
                            Getting into Sunshine is very simple, but never cheap, nor is it expensive. Take a form, take a qualifying examination, and come in with evidence of success in previous studies and with few other steps you are only a step away from entering into the warmth of the sun from the coldness elsewhere!
                            Visitors to sunshine usually have contact first with the security personnel that are taught to be polite and never fight back, even if insulted by guests.
                            <br/><br/>
                            Visiting parents and prospective clients are warmly received and promptly attended at the secretary’s desk within a reasonable short period of time.
                        </div>
                        <div id="ourfacilities" style="display:none">
                            <span style="font-family:raleway; font-size: 30px; color:#fff">
                                OUR FACILITIES
                            </span>
                            <br/><br/>
                            <b>Shuttle Convenience</b><br/>
                            The school assists students to get to school by the daily shuttle services she provides at a highly subsidized rate. Day students are taken from designated bus stops/routes.
                            This mainly cushions the effects of urban transportation problem with a view to curbing learning interruption. New buses replace the old ones from time to time. How else can we move you?
                            Our Hostel
                            <br/><br/>
                            <b>Our Hostel: another home to be at.</b><br/> It is almost a decade since our boarding system emerged. It is pretty hard to find one reason why we should not continue.
                            Sunshine hostel has an unbeatable record in ‘home transplant’. It could not have been more homely, yet we seek to get even more friendly and accommodating.
                            Home is where Sunshine hostel is! 
                        </div>
                        <div id="extracurricular" style="display:none">
                            <span style="font-family:raleway; font-size: 30px; color:#fff">
                                EXTRA–CURRICULAR
                            </span>
                            <br/><br/>
                            <b>Excursion</b><br/>
                            We stopped counting how many trips we have made, but certainly the last one to Lagos last year to behold space craft was inspiring.
                            <br/><br/>
                            <b>Excursion to Turkey</b><br/> Our first trip to Turkey is still a talk of the town. The second trip to Canada in 2013 was unforgettably terrific. Let’s not recount the pleasure of the first. 
                        </div>
                        <div id="address" style="display:block">
                            <span style="font-family:raleway; font-size: 30px; color:#fff">
                                ADDRESS
                            </span>
                            <br/><br/>
                            Sunshine International High School, NTC Road, Oke-Bola, Ibadan<br/>
                            Suburb<br/>
                            Oyo State<br/>
                            Nigeria<br/><br/>

                            <b>CONTACT</b><br/> 
                            info@sunshine.sc.ng<br/>
                            08060477490<br/>
                            http://www.sunshine.sc.ng<br/><br/>

                            <b>OTHER INFORMATION</b><br/> 
                            Where to find us<br/>
                            Sunshine De Silver, [A.K.A Sunshine Kiddies], Oke-Bola, Ibadan. <br/>
                            07037780709<br/><br/>
                            Sunshine De Gold, 9, Alaafin Avenue, Oluyole, Ibadan.<br/>
                            08097322440<br/><br/>
                            Sunshine Diamond, [Nursery, Primary & High School], Power – Line Junction, Eruwa Road, Ologuneru,  Ibadan.<br/>
                            09032290778<br/><br/>
                            Sun Crystal [Advanced Level School], Power-Line Junction, Eruwa Road, Ologuneru, Ibadan. 08062396621<br/><br/>
                            <span data-toggle="modal" data-target=".bs-example-modal-sm" style="background-color:#F4BE04; cursor:pointer; color:#003955; padding:10px">Message Us</span>
                            <div class="modal fade bs-example-modal-sm" id="suggestion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style='font-family:verdana; font-size:12px'>
                                <div class="modal-dialog modal-sm" role="document" style='font-face:verdana; font-size:12px'>
                                    <div class="modal-content">
                                        <div class="modal-header" style='background-color:#E8EEF4'>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4><center><b>Send us a quick message</b></center></h4>
                                        </div>
                                        <div class="modal-body" style='background-color: #EFF8EF'>
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" id="Sname">
                                                <label style="margin-top:20px">Email Address</label>
                                                <input type="text" class="form-control" id="Semail">
                                                <label style="margin-top:20px">Subject</label>
                                                <input type="text" class="form-control" id="Ssubject">
                                                <label style="margin-top:20px">Message</label>
                                                <textarea class="form-control" style="resize:none" id="Ssuggestion"></textarea>
                                                Message self <input type="checkbox" value="msgself" id="eminiS">
                                                <input type="checkbox" value="robot" id="eminiS" hidden>
                                                <div id="calculateBMI" class="btn btn-success" onclick="suggestion()" style="margin-top:20px; width:100%;"><i class="fa fa-envelope-o" style="margin-right:5px"></i> Send message </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" style='background-color:#E8EEF4'>
                                            <div id="serverSResponse" style="text-align: center"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" >
                        <div class='col-lg-1'>

                        </div>
                        <div class="col-lg-5" style="background-image:url('images/ceo.jpg'); min-height:290px; margin-top:60px; padding:0px; position:relative">
                            <div style='color:#FCD54E; background-color:rgba(0,0,0,0.8); padding:5px; text-align:center; position:absolute; width:100%; bottom:0px'>
                                Meet the CEO
                            </div>
                        </div>
                        <div class="col-lg-5" style="background-image:url('images/homepage1.jpg'); background-size:cover; margin-left:5px; min-height:290px; margin-top:60px">
                        </div>
                        <div class='col-lg-1'></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
