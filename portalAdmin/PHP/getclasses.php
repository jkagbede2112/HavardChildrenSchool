<?php

include 'databaseSQLconnectn.php';

$as = mysqli_query($w,"select * from schclass order by ClassName");
while ($gg = mysqli_fetch_array($as)) {
    if (strlen($gg['ClassTeacher']) < 1){
        $fs = "<span style='font-size:11px; color:red'>Unassigned</span>";
        $uid = $gg['SN'];
        echo "<tr><td>".$gg['ClassName']."</td><td>".$fs."</td><td class='point' onclick='deleteClass(\"$uid\")'><i class='fa fa-file-o'></i> Delete</td><td><i class='fa fa-user-plus point' title='Assign Class Teacher' style='color:#6C9EB7' onclick='updateClassdets(\"$uid\")'></i></td></tr>";
    }else{
        $fs = $gg['ClassTeacher'];
        $hd = mysqli_query($w, "select StaffName from schstaff where  StaffID= '$fs'");
        $a = mysqli_fetch_array($hd);
        $name = $a['StaffName'];
        
        $uid = $gg['SN'];
        echo "<tr><td>".$gg['ClassName']."</td><td><span style='color:#0000AA'>".$name."</span></td><td class='point' onclick='deleteClass(\"$uid\")'><i class='fa fa-file-o'></i> Delete</td><td onclick='updateClassdets(\"$uid\")'><i class='fa fa-sliders point' title='Update information' style='color:#6C9EB7'></i></td></tr>";
    }
}
