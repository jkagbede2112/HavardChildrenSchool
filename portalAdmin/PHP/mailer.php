<?php

function sendmail($emailaddress, $subject, $message) {
    
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: Sunshine Schools <info@sunshineschools.com>';
    $headers .= 'Reply-To: School Administrator <admin@sunshineschools.com>';

    $mailer = mail($emailaddress, $subject, $message, $headers);
    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

