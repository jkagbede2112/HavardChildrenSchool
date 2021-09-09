<?php

include 'validateinput.php';
include 'databaseSQLconnectn.php';

$classid = validate("classid");
$classtype = getclasstype($classid);

//echo "$classid $classtype";

if ($classtype === "PLAYGROUP") {
    $report = "<table  style=\"background-color:#fff; border-style:solid; border-width:3px; border-color:#000; padding:0px; font-size:12px; position:relative; min-width:800px;\" border='5'>
    <img src=\"../images/schoollogores.png\" style='position:absolute; top:30%; z-index:200; left:0; right:0; margin-right:auto; margin-left:auto'>
                                                <thead>
                                                    <tr>
                                                        <td style='text-align:center;position:relative; padding:10px'><span style='font-weight:bold; font-size:28px'><img src='../images/schoollogo.png' style='position:absolute; left:5px; top:10px; width:100px; font-size:45px'>HAVARD CHILDREN SCHOOL</span><br><div>Great Learning, Great Fun!</div>
                                                            <div><?= schooladdy(); ?></div>
                                                            <div>Tel: 0803 569 6773, 0809 601 1244, E-mail: info@havardcs.com, Website: www.havardcs.com</div>
                                                            <div style='text-align: center; margin-top:20px; font-weight:600; font-size:16px'><span style='background-color:rgba(0,0,0,0.2) !important; padding:3px'>TERMINAL/YEARLY REPORT</span></div>
                                                            <div style='text-align: center; margin-top:20px; font-weight:800; font-size:16px'><span style='background-color:rgba(0,0,0,0.2) !important; padding:3px'>Nursery Standard Based Report Sheet</span></div>
                                                            <span style='position:absolute; right:10px; top:0px; display:inline-block; border-style:solid; width:130px; height:130px' id='pgphoto'>hihi</span>
                                                            <table border='1' style='width:100%; font-size:12px; margin-top:10px'>
                                                                <tr>
                                                                    <td>I.D Number : <span id='idnumberpg'style='font-weight:bold'></span></td><td colspan='2'>Student's Name : <span id='stdnamepg' style='font-weight:bold'></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Term : <span id='termpg' style='font-weight:bold'></span></td><td>No. in a Class : <span id='classnumpg' style='font-weight:bold'></span></td><td>Class Name : <span id='classnamepg' style='font-weight:bold'></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Academic Year : <span id='acayearpg'style='font-weight:bold'></span></td><td colspan='2'>Teacher's name : <span id='teachnamepg' style='font-weight:bold'></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan='2'>Proprietress name : <span id='propnamepg' style='font-weight:bold'></span></td><td>Class Arm : <span id='classarmpg'></span></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table style='font-size:11px; margin-top:10px; font-weight: 500; width:100%'>
                                                                <tr style='padding:10px'>
                                                                    <td style='width:50%; padding:10px'>
                                                                        <b>ACADEMIC PERFORMANCE KEY IS BASED ON EXIT LEVEL STANDARD</b><br>
                                                                        1 - Below grade level standard<br>
                                                                        2 - Approaching grade level standard.<br>
                                                                        3 - Meets grade level standard<br>
                                                                        4 - Advanced performance of grade level standard<br>
                                                                        X - Indicates the standard will be evaluated later in the ye,brar<br>
                                                                        N - Needs improvement, S - Satisfactory, E - Excellent<br>
                                                                        I - Inconsistent
                                                                    </td>
                                                                    <td style='text-align:center; padding:10px'>
                                                                <center>
                                                                    <b>ATTENDANCE</b>
                                                                    <table style='margin-top:10px; width:100%; font-size:12px; text-align:center' border='1'>
                                                                        <tr><td></td><td style='font-weight:bold'>1st Term</td><td style='font-weight:bold'>2nd Term</td><td style='font-weight:bold'>3rd Term</td>
                                                                        </tr>
                                                                        <tbody id='attTable'>

                                                                        </tbody>
                                                                    </table>
                                                                    <br>
                                                                    * May adversely affect academic achievement
                                                                </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan='2' style='text-align:center; padding:10px' id='dashrepcards'>
                                                        </td></tr>
                                            </table></td>
                                            </tr>
                                            </thead></table>";
    echo $report;
}
if ($classtype === "Primary"){
    
}
?>