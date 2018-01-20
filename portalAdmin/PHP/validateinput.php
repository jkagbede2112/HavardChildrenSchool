<?php
include 'databaseSQLconnectn.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validate($element){
    $rcvd = $_POST[$element];
    
    $element = strip_tags($rcvd);
    $element = str_replace("'","",$element);
    $element = str_replace('"','',$element);
    $element = str_replace('|','',$element);
    $element = str_replace('*','',$element);
    $element = trim($element);
    return $element;
}

function validatemessage($email){
    $rcvd = $_POST[$email];
    $element = strip_tags($rcvd,'<p><b><i><font><br/>');
    return $element;
}